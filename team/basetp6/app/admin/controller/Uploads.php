<?php
/**
 * Created by PhpStorm.
 * User: larray
 * Date: 2019/11/10
 * Time: 17:39
 */

namespace app\admin\controller;

use app\AdminBase;
use think\facade\Filesystem;
use think\exception\ValidateException;

class Uploads extends AdminBase
{
    /**
     * 上传图片
     */
    public function uploadImage(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = $this->request->file('file');
        try{
            $res = [
                'code' => 0,
                'msg' => '上传成功！',
                'data'=>[
                    'src' => '/'.Filesystem::disk('public')->putFile('uploads/images',$file),  //保存路径
//                    'name' => Filesystem::disk('public')->path(),  //文件名
//                    'name' => $file->getPathname(),  //文件名
                ]
            ];
        }catch (ValidateException $e){
            $res = [
                'code' => 1,
                'msg' => $e->getMessage(),
            ];
        }
        return json($res);
    }
    /**
     * 上传视频
     */
    public function uploadVideo(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = $this->request->file('file');
        try{
            $res = [
                'code' => 0,
                'msg' => '上传成功！',
                'data'=>[
                    'src' => '/'.Filesystem::disk('public')->putFile('uploads/images',$file),  //保存路径
//                    'name' => $file->getInfo('name'),  //文件名
                ]
            ];
        }catch (ValidateException $e){
            $res = [
                'code' => 1,
                'msg' => $e->getMessage(),
            ];
        }
        return json($res);
    }
    /**
     * 上传文件
     */
    public function uploadFiles(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = $this->request->file('file');
        try{
            $res = [
                'code' => 0,
                'msg' => '上传成功！',
                'data'=>[
                    'src' => '/'.Filesystem::disk('public')->putFile('uploads/files',$file),  //保存路径
//                    'name' => $file->getInfo('name'),  //文件名
                ]
            ];
        }catch (ValidateException $e){
            $res = [
                'code' => 1,
                'msg' => $e->getMessage(),
            ];
        }
        return json($res);
    }
}