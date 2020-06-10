<?php
/**
 * Created by PhpStorm.
 * User: larray
 * Date: 2019/9/26
 * Time: 23:04
 */
namespace app\admin\controller;

use app\model\Admin;
use app\AdminBase;
use think\captcha\facade\Captcha;
use think\exception\ValidateException;
use think\facade\Db;
use think\facade\Session;
use app\model\AuthGroupAccess;
use app\model\AuthGroup;

class Login extends AdminBase {
    /**
     * 生成验证码
     *
     * @return \think\Response
     */
    public function verify()
    {
        return Captcha::create();
    }

    /**
     * 登录
     *
     * @return \think\response\Json|\think\response\Redirect|\think\response\View|void
     */
    public function index()
    {
        if(session('?admin_id') && session('admin_id')>0){
            return redirect((string)url('index/index'));
        }
        if($this->request->isPost()){
            $post= $this->request_param();
            // $check = $this->request->checkToken('__token__');
            // if(false === $check) {
            //     return json_error('token过期！请刷新页面！');
            // }
            if( !captcha_check($post['vercode']))
            {
                return json_error('验证码输入错误，请重新输入！');
            }else{
                if ($info=Admin::check($post)){
                    session('admin_id',$info['id']);
                    session('admin_name',$info['username']);
                    session('admin_full_name',$info['fullname']);
                    //超级管理员
                    $group_id=AuthGroupAccess::where('uid',$info['id'])->value('group_id');
                    session('role_id',$group_id);
                    if($group_id==1){
                        session('type',1);
                    }else{
                        session('type',$info['id']);
                    }
                    insert_admin_log('登录成功');
                    return json_success('登录成功！');
                }else{
                    insert_admin_log('用户名或密码错误！！');
                    return json_error('用户名或密码错误！！');
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
        if (Session::clear()==null) {
            insert_admin_log("退出成功！");
            return json_success("退出成功！");
        } else {
            insert_admin_log("退出失败！");
            return json_error("退出失败！");
        }
    }

    /**
     * 注册
     */
    public function register()
    {
        return view('',['title'=>'注册']);
    }

}