<?php
namespace app\admin\model;

use think\Model;

class Admin extends Model
{
    //验证用户名和密码
    public function check($post){
        $info = $this->where('name',$post['username'])->find();
        if ($info) {
            $info2 = $this->checkPwd($post['password'],$info['salt'],$info['password']);
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
    public function checkPwd($print_pwd,$sql_salt,$sql_pwd){
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

    public function setPwd($pwd=''){
        $salt = md5(uniqid(microtime()));          //生成密码盐 ，存入数据库 salt字段
        $password = md5($salt . md5($pwd));   //使密码盐与输入的密码值结合，生成新的密码，存入数据库password字段
        $data = array(
            'salt'     => $salt,
            'password' => $password
        );
        return $data;
    }
}