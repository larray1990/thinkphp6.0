<?php
declare (strict_types = 1);

namespace app\model;

use think\Model;

/**
 * @mixin think\Model
 */
class Admin extends Model
{
    //验证用户名和密码
    public static function check($post){
        $info = self::where('username',$post['username'])->find();
        if ($info) {
            $last_time_data = array(
                "login_times" => $info['login_times']+1,
                "login_time" => date("Y-m-d H:i:s"),
                "login_ip"        => request()->ip(),
                "last_login_time" => $info['login_time'],
                "last_login_ip"   => $info['login_ip'],
                "user_agent"      =>request()->server('HTTP_USER_AGENT'),
                "id"        => $info['id']
            );
            self::update($last_time_data);
            $info2 = self::checkPwd($post['password'],$info['password_reset_token'],$info['password']);
            if ($info2) {
                return $info;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    /*校验密码*/
    public static function checkPwd($print_pwd,$sql_salt,$sql_pwd){
        /*
        加盐值方法：
        $salt = md5(uniqid(microtime()));   生成密码盐 ，存入数据库 salt字段
        $password = md5($salt . md5($password));   使密码盐与输入的密码值结合，生成新的密码，存入数据库password字段
        */
        $print_pwd2 = md5($sql_salt . md5($print_pwd));         //给输入的密码值加上当时注册时的盐值
        if ($print_pwd2 == $sql_pwd) {                          //判断输入的密码 和数据库里的密码是否一致
            return true;
        }else{
            return false;
        }
    }

    public static function setPwd($pwd=''){
        $salt = md5(uniqid(microtime()));          //生成密码盐 ，存入数据库 salt字段
        $password = md5($salt . md5($pwd));   //使密码盐与输入的密码值结合，生成新的密码，存入数据库password字段
        $data = array(
            'password_reset_token'     => $salt,
            'password' => $password
        );
        return $data;
    }
    public function authGroupAccess()
    {
        return $this->belongsTo(AuthGroupAccess::class, 'id', 'uid')->bind(['group_id']);
    }

    public function authGroup()
    {
        return $this->belongsTo(AuthGroup::class, 'group_id', 'id')->bind(['title']);
    }
}
