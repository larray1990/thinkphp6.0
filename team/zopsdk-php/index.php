<?php
require "ZopParm.php";
use zop\ZopParm;
/*$config=[
    'orderId'=>'',  //平台订单号     必填
    'shopKey'=>'',   //店铺key     必填
    'orderType'=>'',  //订单类型(0代表普通订单1代表代收货款)     必填
    'collectionMoney'=>'',  //如果orderType=0，不需要传；如果orderType=1，必传，大于0，小于等于10000，单位：元
    'receiveMan'=>'',  //收件人     必填
    'receivePhone'=>'', //收件人电话(电话和手机号码二选一)
    'receiveMobile'=>'', //收件人手机(电话和手机号码二选一)
    'receiveZip'=>'',  //收件邮编
    'receiveProvince'=>'',  //收件省     必填
    'receiveCity'=>'', //收件市     必填
    'receiveCounty'=>'',//收件区县     必填
    'receiveTown'=>'',//收件镇（第四级）非必填
    'receiveAddress'=>'', //收件详细地址     必填
    'receiveCompany'=>'',//收件人单位
    'sendMan'=>'',//发件人     必填
    'sendPhone'=>'',//发件人电话(电话和手机号码二选一)
    'sendMobile'=>'',//发件人手机(电话和手机号码二选一)
    'sendProvince'=>'',//发件省     必填
    'sendCity'=>'',//发件市     必填
    'sendCounty'=>'',//发件区     必填
    'sendAddress'=>'',//发件地址     必填
    'sendCompany'=>'',//发件单位
    'sendZip'=>'',//发件邮编
    'orderDate'=>'',//下单时间     必填
    'payDate'=>'',//付款时间
    'payment'=>'',//实付金额
    'sellerMessage'=>'',//卖家备注
    'buyerMessage'=>'',//买家备注
    'goodInfoList'=>'',//以下是订单中的商品信息（一个订单可以有多个商品信息）
];*/
    /**
     * 获取单号
     */
    function getBillCode(){
        $data='{"data":{"content":{"branchId":"","buyer":"","collectMoneytype":"CNY","collectSum":"12.00","freight":"10.00","id":"xfs2018031500002222333","orderSum":"0.00","orderType":"1","otherCharges":"0.00","packCharges":"1.00","premium":"0.50","price":"126.50","quantity":"2","receiver":{"address":"育德路XXX号","area":"501022","city":"四川省,XXX,XXXX","company":"XXXX有限公司","email":"yyj@abc.com","id":"130520142097","im":"yangyijia-abc","mobile":"136*****321","name":"XXX","phone":"010-222***89","zipCode":"610012"},"remark":"请勿摔货","seller":"","sender":{"address":"华新镇华志路XXX号","area":"310118","city":"上海,上海市,青浦区","company":"XXXXX有限公司","email":"ll@abc.com","endTime":1369033200000,"id":"131*****010","im":"1924656234","mobile":"1391***5678","name":"XXX","phone":"021-87***321","startTime":1369022400000,"zipCode":"610012"},"size":"12,23,11","tradeId":"2701843","type":"1","typeId":"","weight":"0.753"},"datetime":"2019-10-15 16:55:35","partner":"test","verify":"ZTO123"}}';
//        $data='{"data":{"shopKey":"T3BlbktER0pfMjAxNzUxNzEyMjAyODI=","buyerMessage":"买家备注","collectionMoney":null,"goodInfoList":[{"goodsPath":"商品图片地址","unitPrice":1.02,"skuPropertiesName":"机身颜色:黑色;手机套餐:官方标配","goodsTitle":"商品名称","goodsNum":2},{"goodsPath":"商品图片地址","unitPrice":1.02,"skuPropertiesName":"机身颜色:黑色;手机套餐:官方标配","goodsTitle":"商品名称","goodsNum":2}],"orderDate":"2019-01-02 10:21:00","orderId":"121dd","orderType":0,"payDate":null,"receiveAddress":"收件地址","receiveCity":"收件市","receiveCompany":"收件单位","receiveCounty":"收件区","receiveMan":"收件人名字","receiveMobile":"收件手机号码","receivePhone":"收件电话","receiveProvince":"收件省","receiveTown":"收件镇","receiveZip":"收件邮编","sellerMessage":"卖家备注","sendAddress":"发件地址","sendCity":"发件市","sendCompany":"发件单位","sendCounty":"发件区","sendMan":"发件人名字","sendMobile":"发件手机号码","sendPhone":"发件电话","sendProvince":"发件省","sendZip":"发件邮编"}}';
        $model=new ZopParm();
        $result=$model->getZOP('kfpttestCode','kfpttestkey==','http://58.40.16.120:9001/submitOrderCode',$data);
//        $result=$model->getZOP('ztoOrderTest','enRvMTIzc2lnbndoeA==','http://58.40.16.122:8080/exposeServicePushOrderService',$data);
        var_dump($result);die;
        if ($result->result == "true") {
            echo '
        <table style="width:100%;line-height:24px;border-collapse:collapse;font-size:14px;">
        <tr><th style="border:1px solid #ddd;padding:10px;background-color:#f5f5f5;">订单ID</th><td style="border:1px solid #ddd;padding:10px;">' . $result->data->orderId . '</td></tr>
        <tr><th style="border:1px solid #ddd;padding:10px;background-color:#f5f5f5;">单号</th><td style="border:1px solid #ddd;padding:10px;">' . $result->data->billCode . '</td></tr>
        <tr><th style="border:1px solid #ddd;padding:10px;background-color:#f5f5f5;">订单编号</th><td style="border:1px solid #ddd;padding:10px;">' . $result->data->update . '</td></tr>
        <tr><th style="border:1px solid #ddd;padding:10px;background-color:#f5f5f5;">网点编号</th><td style="border:1px solid #ddd;padding:10px;">' . $result->data->siteCode . '</td></tr>
        <tr><th style="border:1px solid #ddd;padding:10px;background-color:#f5f5f5;">网点名称</th><td style="border:1px solid #ddd;padding:10px;">' . $result->data->siteName . '</td></tr>
        </table>
        ';
        }else{
            echo $result->message;
        }
    }
    /**
     * 获取单号
     */
    function getPrint(){
        $data='{"data":{"shopKey":"RDFCRjBBOURENUNDNUIzQjkxRkE3NzcyMjM4RjUwQ0I=","buyerMessage":"买家备注","collectionMoney":null,"goodInfoList":[{"goodsPath":"商品图片地址","unitPrice":1.02,"skuPropertiesName":"机身颜色:黑色;手机套餐:官方标配","goodsTitle":"商品名称","goodsNum":2},{"goodsPath":"商品图片地址","unitPrice":1.02,"skuPropertiesName":"机身颜色:黑色;手机套餐:官方标配","goodsTitle":"商品名称","goodsNum":2}],"orderDate":"2019-01-02 10:21:00","orderId":"121dd","orderType":0,"payDate":null,"receiveAddress":"收件地址","receiveCity":"收件市","receiveCompany":"收件单位","receiveCounty":"收件区","receiveMan":"收件人名字","receiveMobile":"收件手机号码","receivePhone":"收件电话","receiveProvince":"收件省","receiveTown":"收件镇","receiveZip":"收件邮编","sellerMessage":"卖家备注","sendAddress":"发件地址","sendCity":"发件市","sendCompany":"发件单位","sendCounty":"发件区","sendMan":"发件人名字","sendMobile":"发件手机号码","sendPhone":"发件电话","sendProvince":"发件省","sendZip":"发件邮编"}}';
//        $data='{"request":{"partnerCode":"321442342342","printChannel":"ZTO-WECHAT-SCANPRINT","printType":"QRCODE_EPRINT","printerId":"rrwwwe","printParam":{"elecAccount":"test","elecPwd":"ZTO123","paramType":"NOELEC_MARK","printBagaddr":"南京","printMark":"230-"},"receiver":{"address":"haha","city":"北京市","county":"优衣","mobile":"17887878987","name":"海哥","phone":"0231-89080980","prov":"北京"},"sender":{"address":"华新镇","city":"上海市","county":"青浦区","mobile":"115667656765","name":"牛哥","phone":"0231-8969876","prov":"上海"}}}';
        $model=new ZopParm();
        $result=$model->getZOP('383c7ed2a3484adeb746971d903e2039','29dcde0a6dde','http://japi.zto.cn/exposeServicePushOrderService',$data);
        var_dump($result);die;
        if ($result->result == "true") {
            echo '
            <table style="width:100%;line-height:24px;border-collapse:collapse;font-size:14px;">
            <tr><th style="border:1px solid #ddd;padding:10px;background-color:#f5f5f5;">订单ID</th><td style="border:1px solid #ddd;padding:10px;">' . $result->data->orderId . '</td></tr>
            <tr><th style="border:1px solid #ddd;padding:10px;background-color:#f5f5f5;">单号</th><td style="border:1px solid #ddd;padding:10px;">' . $result->data->billCode . '</td></tr>
            <tr><th style="border:1px solid #ddd;padding:10px;background-color:#f5f5f5;">订单编号</th><td style="border:1px solid #ddd;padding:10px;">' . $result->data->update . '</td></tr>
            <tr><th style="border:1px solid #ddd;padding:10px;background-color:#f5f5f5;">网点编号</th><td style="border:1px solid #ddd;padding:10px;">' . $result->data->siteCode . '</td></tr>
            <tr><th style="border:1px solid #ddd;padding:10px;background-color:#f5f5f5;">网点名称</th><td style="border:1px solid #ddd;padding:10px;">' . $result->data->siteName . '</td></tr>
            </table>
            ';
        }else{
            echo $result->message;
        }
    }


getBillCode();
//getPrint();

