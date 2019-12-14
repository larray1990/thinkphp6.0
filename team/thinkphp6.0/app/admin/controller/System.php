<?php
/**
 * Created by PhpStorm.
 * User: larray
 * Date: 2019/11/12
 * Time: 17:51
 */

namespace app\admin\controller;

use app\AdminBase;
use think\facade\App;

class System extends AdminBase
{
    public function index()
    {
        return view();
    }

    public function config()
    {
        return view();
    }


}