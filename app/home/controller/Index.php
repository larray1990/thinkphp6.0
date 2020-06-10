<?php
declare (strict_types = 1);

namespace app\home\controller;

use app\HomeBase;


class Index extends HomeBase 
{
    public function index()
    {
        return view();
    }
}
