<?php
/**
 * Created by PhpStorm.
 * User: larray
 * Date: 2019/11/9
 * Time: 9:52
 */
declare (strict_types = 1);
namespace app;


use think\App;

class HomeBase extends BaseController
{
    public function __construct(App $app)
    {
        parent::__construct($app);
    }

}