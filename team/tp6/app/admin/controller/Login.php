<?php
/**
 * Created by PhpStorm.
 * User: larray
 * Date: 2019/9/26
 * Time: 23:04
 */
namespace app\admin\controller;

use app\admin\model\Admin;
use think\captcha\Captcha;
use think\Db;
use think\facade\Request;

class Login extends Base
{
    /**
     * 生成验证码
     *
     * @return \think\Response
     */
    public function verify()
    {
        $config = [
            'fontSize' => 30,  // 验证码字体大小
            'length' => 4, // 验证码位数
            'useNoise' => false, // 关闭验证码杂点
        ];
        $captcha = new Captcha($config);
        return $captcha->entry();
    }

    /**
     * 登录
     *
     * @return \think\response\Json|\think\response\Redirect|\think\response\View|void
     */
    public function login()
    {
        if(session('?admin_id') && session('admin_id')>0){
            return redirect('index/index');
        }
        $admin =new Admin();
        if(Request::isPost()){
            $post= Request::post();
            if($post['__token__']==session('__token__')){
                unset($post['file']);
                unset($post['__token__']);
            }else{
                return json_error('非法提交！');
            }
            if( !captcha_check($post['vercode']))
            {
                return json_error('验证码输入错误，请重新输入！');
            }else{
                if ($info=$admin->check($post)){
                    session('admin_id',$info['id']);
                    session('admin_name',$info['name']);
                    session('admin_role_id',$info['role_id']);
                    session('admin_contacts',$info['contacts']);
                    //超级管理员
                    $role_id =$admin->where('up_id',0)->value('role_id');
                    session('admin_super_role_id',$role_id);

                    $last_time_data = array(
                        "last_time" => "{$info['time']}",
                        "time"      => date("Y-m-d H:i:s"),
                        "last_ip"   => "{$info['ip']}",
                        "ip"        => request()->ip(),
                        "id"        => "{$info['id']}"
                    );
                    $admin->update($last_time_data);
                    adminLog("用户【".$info['name']."】登录",$admin->getLastSql(),$info['name'],$info['id']);
                    return json_success('登录成功！');
                }else{
                    return json_error('用户名或密码错误！');
                }
            }
        }

        return view();
    }

    /**
     * 退出
     */
    public function logout()
    {
        session_unset();
        session_destroy();
        return redirect('@admin/login/login');
    }

    /**
     * 注册
     */
    public function register()
    {
        return view('',['title'=>'注册']);
    }

}