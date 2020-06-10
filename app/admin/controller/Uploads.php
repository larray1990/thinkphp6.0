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
use think\facade\Request;

class Uploads extends AdminBase
{
    /**
     * 上传图片
     */
    public function uploadImage(){
        $data=Request::get();
        if ($data['type']=='images') {
            $im_url='http://www.img.com/shop_img/';
            // $im_url='http://fimage.qd256.com/shop_img/';
            return $this->upload('images', $im_url);
        } else {
            $im_url='http://www.fvideo.com/shop_video/';
            // $im_url='http://fvideo.qd256.com/shop_video/';
            return $this->upload('video', $im_url);
        }
    }

    protected function upload($rootPath, $filepath)
    {
        $file = $this->request->file('file');
        $file_name=substr(md5(explode('.', $file->getOriginalName())[0]), 0, 1);
        try {
            return json_success('上传成功！', [
                'path' => $filepath.trim(Filesystem::disk($rootPath)->putFile($file_name, $file, 'md5')),  //保存路径
                // 'path' => trim('/'.Filesystem::disk('public')->putFileAs( $filepath.'/'.date('Ymd'), $file,$file->getOriginalName())),  //使用原文件名保存路径
                'savename'=>$file->getOriginalName(),
            ]);
        } catch (ValidateException $e) {
            return json_error($e->getMessage());
        }
    }
}
