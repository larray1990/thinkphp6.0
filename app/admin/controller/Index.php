<?php
/**
 * Created by PhpStorm.
 * User: larray
 * Date: 2019/9/26
 * Time: 23:04
 */
namespace app\admin\controller;

use app\AdminBase;
use app\service\QrcodeServer;
use Endroid\QrCode\QrCode;
use think\facade\App;
use think\facade\Cache;
use think\facade\Db;
use think\facade\View;

class Index extends AdminBase
{
    /**
     * 后台模板布局
     */
    public function index()
    {
        return view();
    }

    /**
     * 首页
     * @return \think\response\View
     */
    public function welcome()
    {
        $this->main();
        return view();
    }


    /**
     * exharts显示
     * @return \think\response\Json
     */
    public function data1()
    {
        $data = [
            'tooltip' => ['trigger' => "axis"],
            'calculable' => !0,
            'legend' => ['data' => ["访问量", "下载量", "平均访问量"]],
            'xAxis' => [
                [
                    'type' => "category",
                    'data' => ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"]
                ]
            ],
            'yAxis' => [
                [
                    'type' => "value",
                    'name' => "访问量",
                    'splitNumber' => 6,
                    'axisLabel' => [
                        'formatter' => "{value} 万"
                    ],
                ],
                [
                    'type' => "value",
                    'name' => "下载量",
                    'axisLabel' => [
                        'formatter' => "{value} 万"
                    ]
                ]
            ],
            'series' => [
                [
                    'name' => "访问量",
                    'type' => "line",
                    'data' => [900, 850, 950, 1e3, 1100, 1050, 1e3, 1150, 1250, 1370, 1250, 1100]
                ], [
                    'name' => "下载量",
                    'type' => "line",
                    'yAxisIndex' => 1,
                    'data' => [850, 850, 800, 950, 1e3, 950, 950, 1150, 1100, 1240, 1e3, 950]
                ],
                [
                    'name' => "平均访问量",
                    'type' => "line",
                    'data' => [870, 850, 850, 950, 1050, 1e3, 980, 1150, 1e3, 1300, 1150, 1e3]
                ]
            ]
        ];
        return json_success('加载成功！', $data);
    }

    /**
     * 清除缓存
     * @return \think\response\Json
     */
    public function cache()
    {
        if (delete_dir_file(App::getRuntimePath())) {
            return json_success("清除缓存成功！");
        } else {
            return json_error("清除缓存失败！");
        }
    }
    /**
     * @return string
     * @throws \think\db\exception\BindParamException
     * @throws \think\db\exception\PDOException
     * 主页面
     */
    public function main()
    {
        $version = Db::query('SELECT VERSION() AS ver');
        $config = Cache::get('main_config');
        if (!$config) {
            $config  = [
                'url'             => $_SERVER['HTTP_HOST'],
                'document_root'   => $_SERVER['DOCUMENT_ROOT'],
                'document_protocol'=> $_SERVER['SERVER_PROTOCOL'],
                'server_os'       => PHP_OS,
                'server_port'     => $_SERVER['SERVER_PORT'],
                'server_ip'       => $_SERVER['REMOTE_ADDR'],
                'server_soft'     => $_SERVER['SERVER_SOFTWARE'],
                'server_file'     => $_SERVER['SCRIPT_FILENAME'],
                'php_version'     => PHP_VERSION,
                'mysql_version'   => $version[0]['ver'],
                'max_upload_size' => ini_get('upload_max_filesize'),
            ];
            Cache::set('main_config', $config, 3600);
        }
        return View::assign('config', $config);
    }

    public function qrcode()
    {
        $config = [
            'url'         => 'https://www.layui.com?_='.mt_rand(1000, 9000),
            'title'         => true,
            'title_content' => '你好，朋友！',
            'logo'          => true,
            'logo_url'      => app()->getRootPath().'public/static/admin/img/logo.png',
            'logo_size'     => 70,
        ];
        echo $this->create_qrcode($config);

        exit;
    }
}
