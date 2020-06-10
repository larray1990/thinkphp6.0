<?php
declare (strict_types = 1);

namespace app\model;

use think\Model;

/**
 * @mixin think\Model
 */
class AuthGroupAccess extends Model
{
    public function authGroup()
    {
        return $this->belongsTo(AuthGroup::class,'group_id','id')->bind(['rules']);
    }
}
