<?php
/**
 * Created by PhpStorm.
 * User: larray
 * Date: 2019/12/7
 * Time: 17:57
 */

namespace app\admin\controller;


use app\AdminBase;

class Error extends AdminBase
{
    public function __call()
    {
        return '控制器不存在，请检查是否生成';
    }
}