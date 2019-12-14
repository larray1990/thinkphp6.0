<?php
namespace zop;
require "ZopClient.php";
require "ZopProperties.php";
require "ZopRequest.php";

class ZopParm
{

    public function getZOP($companyid,$key,$url,$data){
        $properties = new ZopProperties($companyid, $key);
        $client = new ZopClient($properties);
        $request = new ZopRequest();
        $request->setUrl($url);
        $request->setData($data);
        $result= $client->execute($request);
        $result=json_decode($result);
        return $result;
    }
}