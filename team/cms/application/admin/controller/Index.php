<?php
/**
 * Created by PhpStorm.
 * User: larray
 * Date: 2019/9/26
 * Time: 23:04
 */
namespace app\admin\controller;

use think\Db;

class Index extends Base
{
    /**
     * 后台模板布局
     */
    public function index()
    {
        $admin_id = session('admin_id');
        if (empty($admin_id)) {
            return redirect('login/login');
        }
        return view();
    }

    /**
     * 首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function console()
    {
        return view();
    }

    /**
     * 修改个人信息
     * @return think\response\Json|\think\response\View
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function info()
    {
        if($post = request()->post()){
            if($post['__token__']==session('__token__')){
                unset($post['file']);
                unset($post['__token__']);
            }else{
                return json_error('非法提交！');
            }
            $post['id']=session('admin_id');
            $post['update_time']=date('Y-m-d H:i:s');
            $res = Db::name('admin')->update($post);
            if (!empty($res)) {
                adminLog('更新成功！',db('admin')->getLastSql());
                return json_success('更新成功！');
            } else {
                adminLog('更新失败！',db('admin')->getLastSql());
                return json_error('更新失败！');
            }
        }
        $admin_id =session('admin_id');
        $info = Db::name('admin')->where('id',$admin_id)->find();
        $role = db('role')->order("show_order")->field("id,name")->select();
        return view('',[
            'info'=>$info,
            'role'=>$role
        ]);
    }

    /**
     * 修改密码
     * @return \think\response\Json|\think\response\View
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function password()
    {
        if($post =request()->post()){
            $id = session('admin_id');
            $info =Db::name('admin')->where('id',$id)->find();
            if ($info['password']!=md5($info['salt'] . md5($post['oldPassword']))) {
                return json_error('原密码不正确！');
            }
            unset($post['oldPassword']);
            unset($post['repassword']);
            $pos['password']=md5($info['salt'] . md5($post['password']));
            $pos['id']=$id;
            $pos['update_time']=date('Y-m-d H:i:s');
            $re = Db::name('admin')->update($pos);
            if (!empty($re)) {
                adminLog('修改密码成功！',db('admin')->getLastSql());
                return json_success('修改密码成功！');
            } else {
                adminLog('修改密码失败！',db('admin')->getLastSql());
                return json_error('修改密码失败！');
            }
        }
        return view();
    }

    /**
     * exharts显示
     * @return \think\response\Json
     */
    public function data1()
    {
        $data = [
            'tooltip' => ['trigger' => "axis"],
            'calculable' => !0,
            'legend' => ['data' => ["访问量", "下载量", "平均访问量"]],
            'xAxis' => [
                [
                    'type' => "category",
                    'data' => ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"]
                ]
            ],
            'yAxis' => [
                [
                    'type' => "value",
                    'name' => "访问量",
                    'splitNumber' => 6,
                    'axisLabel' => [
                        'formatter' => "{value} 万"
                    ],
                ],
                [
                    'type' => "value",
                    'name' => "下载量",
                    'axisLabel' => [
                        'formatter' => "{value} 万"
                    ]
                ]
            ],
            'series' => [
                [
                    'name' => "访问量",
                    'type' => "line",
                    'data' => [900, 850, 950, 1e3, 1100, 1050, 1e3, 1150, 1250, 1370, 1250, 1100]
                ], [
                    'name' => "下载量",
                    'type' => "line",
                    'yAxisIndex' => 1,
                    'data' => [850, 850, 800, 950, 1e3, 950, 950, 1150, 1100, 1240, 1e3, 950]
                ],
                [
                    'name' => "平均访问量",
                    'type' => "line",
                    'data' => [870, 850, 850, 950, 1050, 1e3, 980, 1150, 1e3, 1300, 1150, 1e3]
                ]
            ]
        ];
        return json_success("添加成功！", $data);
    }

    /**
     * 清除缓存
     * @return \think\response\Json
     */
    public function cache()
    {
        if(delete_dir_file(env('RUNTIME_PATH').'cache/') && delete_dir_file(env('RUNTIME_PATH').'temp/')){
            return json_success("清除缓存成功！");
        }else{
            return json_success("清除缓存失败！");
        }
    }
}
