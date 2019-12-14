<?php
declare (strict_types = 1);

namespace app\model;

use think\Model;

/**
 * @mixin think\Model
 */
class AdminLog extends Model
{
    protected $table='pre_admin_log';
    protected $pk='id';
    //
}
