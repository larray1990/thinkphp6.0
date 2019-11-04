<?php
namespace app\api\controller;

use think\Controller;
header("Access-Control-Allow-Origin:*");

class Upload extends Controller
{
    /**
     * 初始化
     */
    protected function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        header('Content-type: application/json');
        header("Access-Control-Allow-Origin:*");
        // 响应类型
        header('Access-Control-Allow-Methods:OPTIONS, GET, POST');
        // 响应头设置
        header('Access-Control-Allow-Headers:x-requested-with, content-type');
    }
    /**
     * 上传图片
     */
    public function uploadImage(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');
        // 移动到框架应用根目录/uploads/ 目录下
        $info = $file->move( './uploads/image/');
        if($info){
            // 成功上传后 获取上传信息
            $res = [
                'code' => 0,
                'msg' => '上传成功！',
                'data'=>[
                    'src' => '/uploads/image/'.$info->getSaveName(),  //保存路径
                    'name' => $info->getInfo('name'),  //文件名
                ]
            ];
        }else{
            // 上传失败获取错误信息
            $res = [
                'code' => 2,
                'msg' => $file->getError(),
            ];
        }
        return json($res);
    }
    /**
     * 上传视频
     */
    public function uploadVideo(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');
        // 移动到框架应用根目录/uploads/ 目录下
        $info = $file->move( './uploads/video/');
        if($info){
            // 成功上传后 获取上传信息
            $res = [
                'code' => 0,
                'msg' => '上传成功！',
                'data'=>[
                    'src' => '/uploads/video/'.$info->getSaveName(),  //保存路径
                    'name' => $info->getInfo('name'),  //文件名
                ]
            ];
        }else{
            // 上传失败获取错误信息
            $res = [
                'code' => 2,
                'msg' => $file->getError(),
            ];
        }
        return json($res);
    }
    /**
     * 上传文件
     */
    public function uploadFiles(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');
        // 移动到框架应用根目录/uploads/ 目录下
        $info = $file->move( './uploads/file/');
        if($info){
            // 成功上传后 获取上传信息
            $res = [
                'code' => 0,
                'msg' => '上传成功！',
                'data'=>[
                    'src' => '/uploads/file/'.$info->getSaveName(),  //保存路径
                    'name' => $info->getInfo('name'),  //文件名
                ]
            ];
        }else{
            // 上传失败获取错误信息
            $res = [
                'code' => 2,
                'msg' => $file->getError(),
            ];
        }
        return json($res);
    }
}