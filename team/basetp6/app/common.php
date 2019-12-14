<?php
    // 应用公共文件
    use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
    use PhpOffice\PhpSpreadsheet\Reader\Xls;
    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
    use PhpOffice\PhpSpreadsheet\Cell\DataType;
    use PhpOffice\PhpSpreadsheet\Style\Fill;
    use PhpOffice\PhpSpreadsheet\Style\Color;
    use PhpOffice\PhpSpreadsheet\Style\Alignment;
    use PhpOffice\PhpSpreadsheet\Style\Border;
    use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
    use AlibabaCloud\Client\AlibabaCloud;
    use AlibabaCloud\Client\Exception\ClientException;
    use AlibabaCloud\Client\Exception\ServerException;
    use PHPMailer\PHPMailer\PHPMailer;
    use think\facade\Db;

    /**
     * 使用PHPEXECL导入
     *
     * @param string $file 文件地址
     * @param int $sheet 工作表sheet(传0则获取第一个sheet)
     * @param int $columnCnt 列数(传0则自动获取最大列)
     * @param array $options 操作选项
     *                          array mergeCells 合并单元格数组
     *                          array formula    公式数组
     *                          array format     单元格格式数组
     *
     * @return array
     * @throws Exception
     */
    function importExecl($file = '', $sheet = 0, $columnCnt = 0, &$options = [])
    {
        try {
            /* 转码 */
            $file = iconv("utf-8", "gb2312", $file);

            if (empty($file) OR !file_exists($file)) {
                throw new \Exception('文件不存在!');
            }
            /** @var Xlsx $objRead */
            $objRead = IOFactory::createReader('Xlsx');

            if (!$objRead->canRead($file)) {
                /** @var Xls $objRead */
                $objRead = IOFactory::createReader('Xls');

                if (!$objRead->canRead($file)) {
                    throw new \Exception('只支持导入Excel文件！');
                }
            }
            /* 如果不需要获取特殊操作，则只读内容，可以大幅度提升读取Excel效率 */
            empty($options) && $objRead->setReadDataOnly(true);
            /* 建立excel对象 */
            $obj = $objRead->load($file);
            /* 获取指定的sheet表 */
            $currSheet = $obj->getSheet($sheet);

            if (isset($options['mergeCells'])) {
                /* 读取合并行列 */
                $options['mergeCells'] = $currSheet->getMergeCells();
            }
            if (0 == $columnCnt) {
                /* 取得最大的列号 */
                $columnH = $currSheet->getHighestColumn();
                /* 兼容原逻辑，循环时使用的是小于等于 */
                $columnCnt = Coordinate::columnIndexFromString($columnH);
            }
            /* 获取总行数 */
            $rowCnt = $currSheet->getHighestRow();
            $data = [];
            /* 读取内容 */
            for ($_row = 1; $_row <= $rowCnt; $_row++) {
                $isNull = true;
                for ($_column = 1; $_column <= $columnCnt; $_column++) {
                    $cellName = Coordinate::stringFromColumnIndex($_column);
                    $cellId = $cellName . $_row;
                    $cell = $currSheet->getCell($cellId);
                    if (isset($options['format'])) {
                        /* 获取格式 */
                        $format = $cell->getStyle()->getNumberFormat()->getFormatCode();
                        /* 记录格式 */
                        $options['format'][$_row][$cellName] = $format;
                    }
                    if (isset($options['formula'])) {
                        /* 获取公式，公式均为=号开头数据 */
                        $formula = $currSheet->getCell($cellId)->getValue();
                        if (0 === strpos($formula, '=')) {
                            $options['formula'][$cellName . $_row] = $formula;
                        }
                    }
                    if (isset($format) && 'm/d/yyyy' == $format) {
                        /* 日期格式翻转处理 */
                        $cell->getStyle()->getNumberFormat()->setFormatCode('yyyy/mm/dd');
                    }
                    $data[$_row][$cellName] = trim($currSheet->getCell($cellId)->getFormattedValue());
                    if (!empty($data[$_row][$cellName])) {
                        $isNull = false;
                    }
                }
                /* 判断是否整行数据为空，是的话删除该行数据 */
                if ($isNull) {
                    unset($data[$_row]);
                }
            }
            return $data;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * Excel导出，TODO 可继续优化
     *
     * @param array $datas 导出数据，格式['A1' => 'XXXX公司报表', 'B1' => '序号']
     * @param string $fileName 导出文件名称
     * @param array $options 操作选项，例如：
     *                           bool   print       设置打印格式
     *                           string freezePane  锁定行数，例如表头为第一行，则锁定表头输入A2
     *                           array  setARGB     设置背景色，例如['A1', 'C1']
     *                           array  setWidth    设置宽度，例如['A' => 30, 'C' => 20]
     *                           bool   setBorder   设置单元格边框
     *                           array  mergeCells  设置合并单元格，例如['A1:J1' => 'A1:J1']
     *                           array  formula     设置公式，例如['F2' => '=IF(D2>0,E42/D2,0)']
     *                           array  format      设置格式，整列设置，例如['A' => 'General']
     *                           array  alignCenter 设置居中样式，例如['A1', 'A2']
     *                           array  bold        设置加粗样式，例如['A1', 'A2']
     *                           string savePath    保存路径，设置后则文件保存到服务器，不通过浏览器下载
     */
    function exportExcel($datas, $fileName = '', $options = [])
    {
        try {
            if (empty($datas)) {
                return false;
            }
            set_time_limit(0);
            /** @var Spreadsheet $objSpreadsheet */
            $objSpreadsheet = app(Spreadsheet::class);
            /* 设置默认文字居左，上下居中 */
            $styleArray = [
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_LEFT,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
            ];
            $objSpreadsheet->getDefaultStyle()->applyFromArray($styleArray);
            /* 设置Excel Sheet */
            $activeSheet = $objSpreadsheet->setActiveSheetIndex(0);

            /* 打印设置 */
            if (isset($options['print']) && $options['print']) {
                /* 设置打印为A4效果 */
                $activeSheet->getPageSetup()->setPaperSize(PageSetup:: PAPERSIZE_A4);
                /* 设置打印时边距 */
                $pValue = 1 / 2.54;
                $activeSheet->getPageMargins()->setTop($pValue / 2);
                $activeSheet->getPageMargins()->setBottom($pValue * 2);
                $activeSheet->getPageMargins()->setLeft($pValue / 2);
                $activeSheet->getPageMargins()->setRight($pValue / 2);
            }
            /* 行数据处理 */
            foreach ($datas as $sKey => $sItem) {
                /* 默认文本格式 */
                $pDataType = DataType::TYPE_STRING;
                /* 设置单元格格式 */
                if (isset($options['format']) && !empty($options['format'])) {
                    $colRow = Coordinate::coordinateFromString($sKey);
                    /* 存在该列格式并且有特殊格式 */
                    if (isset($options['format'][$colRow[0]]) &&
                        NumberFormat::FORMAT_GENERAL != $options['format'][$colRow[0]]) {
                        $activeSheet->getStyle($sKey)->getNumberFormat()
                            ->setFormatCode($options['format'][$colRow[0]]);

                        if (false !== strpos($options['format'][$colRow[0]], '0.00') &&
                            is_numeric(str_replace(['￥', ','], '', $sItem))) {
                            /* 数字格式转换为数字单元格 */
                            $pDataType = DataType::TYPE_NUMERIC;
                            $sItem = str_replace(['￥', ','], '', $sItem);
                        }
                    } elseif (is_int($sItem)) {
                        $pDataType = DataType::TYPE_NUMERIC;
                    }
                }
                $activeSheet->setCellValueExplicit($sKey, $sItem, $pDataType);
                /* 存在:形式的合并行列，列入A1:B2，则对应合并 */
                if (false !== strstr($sKey, ":")) {
                    $options['mergeCells'][$sKey] = $sKey;
                }
            }
            unset($datas);
            /* 设置锁定行 */
            if (isset($options['freezePane']) && !empty($options['freezePane'])) {
                $activeSheet->freezePane($options['freezePane']);
                unset($options['freezePane']);
            }
            /* 设置宽度 */
            if (isset($options['setWidth']) && !empty($options['setWidth'])) {
                foreach ($options['setWidth'] as $swKey => $swItem) {
                    $activeSheet->getColumnDimension($swKey)->setWidth($swItem);
                }
                unset($options['setWidth']);
            }
            /* 设置背景色 */
            if (isset($options['setARGB']) && !empty($options['setARGB'])) {
                foreach ($options['setARGB'] as $sItem) {
                    $activeSheet->getStyle($sItem)
                        ->getFill()->setFillType(Fill::FILL_SOLID)
                        ->getStartColor()->setARGB(Color::COLOR_YELLOW);
                }
                unset($options['setARGB']);
            }
            /* 设置公式 */
            if (isset($options['formula']) && !empty($options['formula'])) {
                foreach ($options['formula'] as $fKey => $fItem) {
                    $activeSheet->setCellValue($fKey, $fItem);
                }
                unset($options['formula']);
            }
            /* 合并行列处理 */
            if (isset($options['mergeCells']) && !empty($options['mergeCells'])) {
                $activeSheet->setMergeCells($options['mergeCells']);
                unset($options['mergeCells']);
            }
            /* 设置居中 */
            if (isset($options['alignCenter']) && !empty($options['alignCenter'])) {
                $styleArray = [
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                ];
                foreach ($options['alignCenter'] as $acItem) {
                    $activeSheet->getStyle($acItem)->applyFromArray($styleArray);
                }
                unset($options['alignCenter']);
            }
            /* 设置加粗 */
            if (isset($options['bold']) && !empty($options['bold'])) {
                foreach ($options['bold'] as $bItem) {
                    $activeSheet->getStyle($bItem)->getFont()->setBold(true);
                }
                unset($options['bold']);
            }
            /* 设置单元格边框，整个表格设置即可，必须在数据填充后才可以获取到最大行列 */
            if (isset($options['setBorder']) && $options['setBorder']) {
                $border = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN, // 设置border样式
                            'color' => ['argb' => 'FF000000'], // 设置border颜色
                        ],
                    ],
                ];
                $setBorder = 'A1:' . $activeSheet->getHighestColumn() . $activeSheet->getHighestRow();
                $activeSheet->getStyle($setBorder)->applyFromArray($border);
                unset($options['setBorder']);
            }
            $fileName = !empty($fileName) ? $fileName : (date('YmdHis') . '.xlsx');
            if (!isset($options['savePath'])) {
                /* 直接导出Excel，无需保存到本地，输出07Excel文件 */
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header(
                    "Content-Disposition:attachment;filename=" . iconv(
                        "utf-8", "GB2312//TRANSLIT", $fileName
                    )
                );
                header('Cache-Control: max-age=0');//禁止缓存
                $savePath = 'php://output';
            } else {
                $savePath = $options['savePath'];
            }
            ob_clean();
            ob_start();
            $objWriter = IOFactory::createWriter($objSpreadsheet, 'Xlsx');
            $objWriter->save($savePath);
            /* 释放内存 */
            $objSpreadsheet->disconnectWorksheets();
            unset($objSpreadsheet);
            ob_end_flush();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * 格式化字节大小
     * @param number $size 字节数
     * @param string $delimiter 数字和单位分隔符
     * @return string            格式化后的带单位的大小
     */
    function format_bytes($size, $delimiter = '')
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
        for ($i = 0; $size >= 1024 && $i < 5; $i++) $size /= 1024;
        return round($size, 2) . $delimiter . $units[$i];
    }

    /**
     * 获取地区
     * @param $province
     * @param $city
     * @param $county
     * @return array
     */
    function getArea($province, $city, $county)
    {
        $json_string = file_get_contents('./static/admin/extend/select/data.js');
        $domain = strstr($json_string, '{');
        $newstr = substr($domain, 0, strlen($domain) - 1);
        $newstr = str_replace('val:', '', $newstr);
        $newstr = str_replace('items:', '', $newstr);
        $newstr = str_replace('{', '', $newstr);
        $newstr = str_replace('}', '', $newstr);
        $newstr = str_replace('"', '', $newstr);
        $newstr = explode(',', $newstr);
        $area = [];
        foreach ($newstr as $k => $item) {
            $area[] = explode(':', $item);
        }
        $data = [];
        foreach ($area as $v) {
            if ($v[1] == $province) {
                $data['province'] = trim($v[0]);
            }
            if ($v[1] == $city) {
                $data['city'] = trim($v[0]);
            }
            if ($v[1] == $county) {
                $data['county'] = trim($v[0]);
            }
        }
        return $data;
    }

    /**
     * curl请求
     * @param $url
     * @param $postFields
     * @return mixed
     * @throws Exception
     */
    function curl($url, $postFields = array())
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FAILONERROR, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //https请求
        if (strlen($url) > 5 && strtolower(substr($url, 0, 5)) == 'https') {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        }
        if (is_array($postFields) && count($postFields) > 0) {
            $postBodyString = '';
            $postMultipart = false;
            foreach ($postFields as $k => $v) {
                //判断是不是文件上传
                //文件上传用multipart/form-data，否则用www-form-urlencoded
                if ("@" != substr($v, 0, 1)) {
                    $postBodyString .= "$k=" . urlencode($v) . "&";
                } else {
                    $postMultipart = true;
                }
            }
            unset($k, $v);
            curl_setopt($ch, CURLOPT_POST, true);
            if ($postMultipart) {
                curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
            } else {
                curl_setopt($ch, CURLOPT_POSTFIELDS, substr($postBodyString, 0, -1));
            }
        }
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            throw new Exception(curl_error($ch), 0);
        } else {
            $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if (200 !== $httpStatusCode) {
                throw new Exception($response, $httpStatusCode);
            }
        }
        curl_close($ch);
        return $response;
    }


    /**
     * @function    sendEmail
     * @intro        发送邮件（带附件）
     * @param $email     接收邮箱
     * @param $title     邮件标题
     * @param $from_name     发件人
     * @param $content     邮件内容
     * @param $attachmentFile     附件 （string | array）
     * @return  array
     */
    function sendEmail($email = '', $title = '', $from_name = '', $content = '', $attachmentFile = '')
    {
        $mail = new PHPMailer;
        $mail->isSMTP();  // 使用SMTP服务
    //        $mail->SMTPDebug = 2;  //是否启用smtp的debug进行调试 开发环境建议开启 生产环境注释掉即可 默认关闭debug调试模式
    //        $mail->Debugoutput = 'html';
        $mail->CharSet = 'UTF-8';// 编码格式为utf8，不设置编码的话，中文会出现乱码
        $mail->Host = config('phpmailer.Host');// 发送方的SMTP服务器地址
        $mail->Port = config('phpmailer.Port');//端口号  25, 465 or 587
        $mail->SMTPAuth = true;// 是否使用身份验证
        $mail->Username = config('phpmailer.Username');//发件邮箱用户名
        $mail->Password = config('phpmailer.Password');//发件邮箱密码
        $mail->setFrom($from_name);// 设置发件人信息
        $mail->addReplyTo($from_name);// 设置回复人信息
        $mail->addAddress($email);// 设置收件人信息
    //        $mail->IsHTML(true);
        $mail->Subject = $title;// 邮件标题
        $mail->msgHTML($content);// 邮件正文
    //        $mail->AltBody = $content;//设置纯文本方式显示的正文内容
        //$mail->addCC("xxx@163.com");// 设置邮件抄送人，可以只写地址，上述的设置也可以只写地址(这个人也能收到邮件)
        //$mail->addBCC("xxx@163.com");// 设置秘密抄送人(这个人也能收到邮件)
        if (is_array($attachmentFile)) {
            for ($i = 0; $i < count($attachmentFile); $i++) {
                $mail->addAttachment($attachmentFile[$i], 'Filename' . $i);//这里可以是多维数组，然后循环附件的文件和名称
            }
        } else {
            if ($attachmentFile != '') {
                //Attach an image file
                $mail->addAttachment($attachmentFile, 'Filename');
            }
        }
        //发送邮件
        if (!$mail->send()) {
            $status = 0;
            $data = "邮件发送失败" . $mail->ErrorInfo;;
        } else {
            $status = 1;
            $data = "邮件发送成功";
        }
        return ['status' => $status, 'data' => $data];//返回值（可选）
    }

    /**
     * setPdf 输出PDF
     * @param string $content 文件内容
     * @param array $title 文件名称
     * @author Mr.Lv   3063306168@qq.com
     */
    function setPdf($content, $title)
    {
        $logo = env('root_path') . 'public/static/images/logo.jpg';
        require env('root_path') . 'vendor/tecnickcom/tcpdf/tcpdf.php';
        $pdf = new \Tcpdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor("作者");//设置作者
        $pdf->SetTitle($title);
        $pdf->SetSubject('TCPDF Tutorial');
        //$pdf->SetKeywords('TCPDF, PDF, example, test, guide');//设置关键字
        // 是否显示页眉
        $pdf->setPrintHeader(false);
        // 设置页眉显示的内容
        //$pdf->SetHeaderData($logo, 60, '', '');
        // 设置页眉字体
        //$pdf->setHeaderFont(Array('deja2vusans', '', '12'));
        // 页眉距离顶部的距离
        $pdf->SetHeaderMargin('5');
        // 是否显示页脚
        //$pdf->setPrintFooter(true);
        // 设置页脚显示的内容
        //$pdf->setFooterData(array(0,64,0), array(0,64,128));
        // 设置页脚的字体
        //$pdf->setFooterFont(Array('dejavusans', '', '10'));
        // 设置页脚距离底部的距离
        //$pdf->SetFooterMargin('10');
        // 设置默认等宽字体
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        // 设置行高
        $pdf->setCellHeightRatio(1.5);
        // 设置左、上、右的间距
        $pdf->SetMargins('15', '15', '15');
        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        // 设置字体
        $pdf->SetFont('simhei', '', 12, '', true);
        // 设置是否自动分页 距离底部多少距离时分页
        //$pdf->SetAutoPageBreak(TRUE, '15');
        // 设置图像比例因子
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        //$pdf->setFontSubsetting(true);
        $pdf->AddPage("A4", "Landscape", true, true);
        //$pdf->writeHTML($content);//HTML生成PDF
        $pdf->writeHTML('<img src="' . $logo . '" width="95"><br>' . $content, true, false, true, false, '');//设置logo
        //$pdf->writeHTMLCell(0, 0, '', '', $content, 0, 1, 0, true, '', true);
        $showType = 'I';//PDF输出的方式。I，在浏览器中打开；D，以文件形式下载；F，保存到服务器中；S，以字符串形式输出；E：以邮件的附件输出。
        $pdf->Output("pdf.pdf", $showType);
        exit();
    }

    /**
     * 验证码(阿里云短信)
     * @param $mobile
     * @param $code
     * @param $tempId
     * @return array
     * @throws ClientException
     */
    function smsVerify($mobile, $code, $tempId)
    {
        AlibabaCloud::accessKeyClient(config('app.aliyunsms.access_key_id'), config('app.aliyunsms.access_key_secret'))
            ->regionId('cn-hangzhou')//replace regionId as you need（这个地方是发短信的节点，默认即可，或者换成你想要的）
            ->asGlobalClient();
        $data = [];
        try {
            $result = AlibabaCloud::rpcRequest()
                ->product('Dysmsapi')
                //->scheme('https') //https | http（如果域名是https，这里记得开启）
                ->version('2017-05-25')
                ->action('SendSms')
                ->method('POST')
                ->options([
                    'query' => [
                        'PhoneNumbers' => $mobile,
                        'SignName' => config('app.aliyunsms.sign_name'),
                        'TemplateCode' => $tempId,
                        'TemplateParam' => json_encode(['code' => $code]),
                    ],
                ])
                ->request();
            $res = $result->toArray();
            if ($res['Code'] == 'OK') {
                $data['status'] = 1;
                $data['info'] = $res['Message'];
            } else {
                $data['status'] = 0;
                $data['info'] = $res['Message'];
            }
            return $data;
        } catch (ClientException $e) {
            $data['status'] = 0;
            $data['info'] = $e->getErrorMessage();
            return $data;
        } catch (ServerException $e) {
            $data['status'] = 0;
            $data['info'] = $e->getErrorMessage();
            return $data;
        }
    }

    /***
     * 定义接口成功消息
     * @param $data
     * @param string $message
     * @return \think\response\Json
     */
    function json_success($message = '', $data = [])
    {
        $result = [
            'code' => 1,
            'msg' => $message,
            'data' => $data,
        ];
        return json($result);
    }


    /***
     * 定义接口失败消息
     * @param string $data
     * @param $message
     * @return \think\response\Json
     */
    function json_error($message, $data = [])
    {
        $result = [
            'code' => 0,
            'msg' => $message,
            'data' => $data
        ];
        return json($result);
    }

    /**
     * 加载数据接口
     * @param $res
     * @param $data
     * @return \think\response\Json
     */
    function json_info($data,$all=[])
    {
        $result = [
            'code' => 0,
            'count' => $data['total'],
            'data' => $data['data'],
            'all'=>$all
        ];
        return json($result);
    }
    if (!function_exists('isMobile')) {
        function isMobile()
        {
            if (isset ($_SERVER['HTTP_X_WAP_PROFILE'])) {
                return true;
            }
            if (isset ($_SERVER['HTTP_VIA'])) {
                return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
            }
            if (isset ($_SERVER['HTTP_USER_AGENT'])) {
                $clientkeywords = array('nokia',
                    'sony',
                    'ericsson',
                    'mot',
                    'samsung',
                    'htc',
                    'sgh',
                    'lg',
                    'sharp',
                    'sie-',
                    'philips',
                    'panasonic',
                    'alcatel',
                    'lenovo',
                    'iphone',
                    'ipod',
                    'blackberry',
                    'meizu',
                    'android',
                    'netfront',
                    'symbian',
                    'ucweb',
                    'windowsce',
                    'palm',
                    'operamini',
                    'operamobi',
                    'openwave',
                    'nexusone',
                    'cldc',
                    'midp',
                    'wap',
                    'mobile'
                );
                if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
                    return true;
                }
            }
            if (isset ($_SERVER['HTTP_ACCEPT'])) {
                if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
                    return true;
                }
            }
            return false;
        }
    }

    /**
     * 循环删除目录和文件
     * @param string $dir_name
     * @return bool
     */
    function delete_dir_file($dir_name) {
        $result = false;
        if(is_dir($dir_name)){
            if ($handle = opendir($dir_name)) {
                while (false !== ($item = readdir($handle))) {
                    if ($item != '.' && $item != '..') {
                        if (is_dir($dir_name . '/' . $item)) {
                            delete_dir_file($dir_name . '/' . $item);
                        } else {
                            unlink($dir_name . '/' . $item);
                        }
                    }
                }
                closedir($handle);
                if (rmdir($dir_name)) {
                    $result = true;
                }
            }
        }

        return $result;
    }

    /**
     * 保存后台用户行为
     * @param string $remark 日志备注
     */
    function insert_admin_log($remark)
    {
        if (session('?admin_id')) {
            \app\model\AdminLog::insert([
                'admin_id'    => session('admin_id'),
                'username'    => session('admin_name'),
                'useragent'   => request()->server('HTTP_USER_AGENT'),
                'ip'          => request()->ip(),
                'url'         => request()->url(true),
                'method'      => request()->method(),
                'type'        => request()->type(),
                'param'       => json_encode(request()->param()),
                'remark'      => $remark,
                'create_time' => time(),
            ]);
        }
    }
