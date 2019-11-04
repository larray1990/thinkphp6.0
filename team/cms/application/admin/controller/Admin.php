<?php
/**
 * Created by PhpStorm.
 * User: larray
 * Date: 2019/9/26
 * Time: 23:04
 */
namespace app\admin\controller;

use app\admin\model\Admin as AdminModel;
use think\Db;
use think\db\Where;
use think\facade\Cache;

class Admin extends Base
{
    public function index()
    {
        return view()->assign(['title'=>'管理员管理']);
    }

    /**
     * 加载数据
     * @return \think\response\Json
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function data()
    {
        $where = [];
        $data = request()->post();
        $page = $data['page'];
        $limit = 18;
        $start = ($page - 1) * $limit;
        if(session('admin_role_id')!=session('admin_super_role_id')){
            $where['up_id']=session('admin_id');
        }
        if(!empty($data['name'])){
            $where['name']=['like','%'.$data['name'].'%'];
        }
        if(!empty($data['email'])){
            $where['email']=['like','%'.$data['email'].'%'];
        }
        if(!empty($data['sex'])){
            $where['sex']=$data['sex'];
        }
        $count = db('admin')
            ->where(new Where($where))
            ->count();
        $lists = db('admin')
            ->where(new Where($where))
            ->order('id asc')
            ->limit($start, $limit)
            ->select();
        $list = array();
        foreach ($lists as &$v) {
            if(session('admin_role_id')==session('admin_super_role_id')) {
                $v['role_name'] = db('role')->where('id', $v['role_id'])->value('name');
            }else{
                $v['role_name']='';
            }
            $ara =getArea($v['province'],$v['city'],$v['county']);
            $v['area']=$ara['province'].'-'.$ara['city'].'-'.$ara['county'];
            $list[] = $v;
        }
        return json_info($count,$list);
    }


    /**
     * 表单的添加和修改
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\Json|\think\response\View
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function form()
    {
        if(request()->isPost()){
            $post=request()->post();
            $admin=new AdminModel();
            if($post['__token__']==session('__token__')){
                unset($post['file']);
                unset($post['__token__']);
            }else{
                return json_error('非法提交！');
            }
            if(empty($post['id'])){
                unset($post['id']);
            }
            $post['add_user']=session('admin_name');
            if(!empty($post['id'])){
                $data = $admin->find($post['id']);
                if($data['name']!=$post['name']){
                    $req = $admin->where('name',$post['name'])->find();
                    if($req){
                        return json_error('账号已存在！');
                    }
                }
                if($data['password']!==$post['password']){
                    $data =$admin->setPwd($post['password']);
                    $post['password'] = $data['password'];
                    $post['salt'] = $data['salt'];
                }
                $post['update_time']=date('Y-m-d H:i:s');
                $res = db('admin')->update($post);
                if (!empty($res)) {
                    adminLog("更新成功",db('admin')->getLastSql());
                    return json_success("更新成功！");
                } else {
                    adminLog("更新失败",db('admin')->getLastSql());
                    return json_error('更新失败！');
                }
            }else {
                $req = $admin->where('name',$post['name'])->find();
                if($req){
                    return json_error('账号已存在！');
                }
                $dat =$admin->setPwd($post['password']);
                $post['password'] = $dat['password'];
                $post['salt'] = $dat['salt'];
                $post['time']=date('Y-m-d H:i:s');
                $post['ip']=request()->ip();
                $post['up_id'] = session('admin_id');
                $post['create_time']=date('Y-m-d H:i:s');
                $res = db('admin')->insertGetId($post);
                if (!empty($res)) {
                    adminLog("用户【".$post['name']."】添加成功",$admin->getLastSql(),$post['name']);
                    return json_success("添加成功！");
                } else {
                    adminLog("用户【".$post['name']."】添加失败",$admin->getLastSql(),$post['name']);
                    return json_error('添加失败！');
                }
            }
        }else {
            $info = db('admin')->where('id', request()->get('id'))->find();
            if (session('admin_role_id') != session('admin_super_role_id')) {
                $user_id = session('admin_id');
                $user_ids = db('admin')->where(array('up_id'=>$user_id))->column('id');
                if (!in_array(request()->get('id'), $user_ids)) {
                    echo "严重警告，您已越权！";
                    die();
                }
                $where['up_id'] = ['eq',session('admin_role_id')];
                $role = db('role')->where($where)->order("show_order")->field("id,name")->select();
            }else{
                $role = db('role')->order("show_order")->field("id,name")->select();
            }
            return view('', ['info' => $info, 'role' => $role]);
        }
    }


    /**
     * 详情
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|\think\response\View
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function show()
    {
        $info = db('admin')->where('id', request()->get('id'))->find();
        $ara =getArea($info['province'],$info['city'],$info['county']);
        $info['area']=$ara['province'].'-'.$ara['city'].'-'.$ara['county'];
        $info['sex']=$info['sex']=='1'?'男':'女';
        $info['role_name']=db('role')->where('id',$info['role_id'])->value('name');
        return view('', ['info' => $info]);
    }

    /**
     * 删除
     * @return \think\response\Json
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function destroy()
    {
        $post = request()->post();
        $res = db('admin')->delete($post['ids']);
        if(!empty($res)){
            return json_success('删除成功！');
        }else{
            return json_error('删除失败！');
        }
    }

    /**
     * 导入Excel
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\Json|\think\response\View
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function import()
    {
        if (request()->isPost()) {
            $post = request()->post();
            $admin=new AdminModel();
            $file_path=env('ROOT_PATH').'/public'.$post['pic'];
            $info=importExecl($file_path);
            $info=array_splice($info,1);
            $data=[];
            foreach ($info as $index => $datum) {
                $arr=[];
                $arr['name']=$datum['A'];
                $arr['contacts']=$datum['B'];
                $arr['phone']=$datum['C'];
                $arr['email']=$datum['D'];
                $arr['ip']=$datum['E'];
                if(empty($arr['password'])){
                    $data1 =$admin->setPwd('123456');
                    $arr['password'] = $data1['password'];
                    $arr['salt'] = $data1['salt'];
                }
                $arr['create_time']=date('Y-m-d H:i:s');
                $arr['time']=date('Y-m-d H:i:s');
                $arr['up_id'] = session('admin_id');
                $arr['sex'] = 1;
                $data[]=$arr;
            }
            $res = $admin->insertAll($data);
            if (!empty($res)) {
                adminLog("用户【" . session('admin_name'). "】导入数据成功", $admin->getLastSql());
                return json_success("导入数据成功！");
            } else {
                adminLog("用户【" . session('admin_name') . "】导入数据失败", $admin->getLastSql());
                return json_error("导入数据失败！");
            }
        }
        return view();
    }

    /**
     * 导出Excel
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function outExcel()
    {
        $data=[
            'A1'=>'用户名',
            'B1'=>'姓名',
            'C1'=>'手机号',
            'D1'=>'邮件',
            'E1'=>'ip',
            'F1'=>'办公电话',
        ];
        $info=db('admin')->select();
        $i=2;
        foreach ($info as $index => $item) {
            $data['A'.$i]=$item['name'];
            $data['B'.$i]=$item['contacts'];
            $data['C'.$i]=' '.$item['phone'];
            $data['D'.$i]=$item['email'];
            $data['E'.$i]=$item['ip'];
            $data['F'.$i]=$item['office_phone'];
            $i++;
        }
        exportExcel($data,'打卡机.xlsx',['freezePane'=>'A2']);
    }

    public function mail()
    {
        $message = "<style>td {width:50%;}tr {height: 50px;border:1px dashed lightblue;;}</style>
                    <table border='1' style='border-collapse:collapse;border: lightblue solid 2px;text-align:center;'>
                        <tr><td>工资月份</td><td>9</td></tr>
                        <tr>    <td>入职时间</td><td>2019-5-10</td></tr>
                        <tr>    <td>姓名</td><td>张三</td></tr>
                        <tr>    <td>基本工资</td><td>6800</td></tr>
                        <tr>    <td>出勤天数</td><td>26</td></tr>
                        <tr>    <td>业绩考核</td><td>23</td></tr>
                        <tr>    <td>奖金</td><td></td></tr>
                        <tr>    <td>加班时间</td><td></td></tr>
                        <tr>    <td>薪资变动</td><td></td></tr>
                        <tr>    <td>请假天数</td><td></td></tr>
                        <tr>    <td>公休</td><td></td></tr>
                        <tr>    <td>迟到扣款</td><td></td></tr>
                        <tr>    <td>缺卡扣款</td><td></td></tr>
                        <tr>    <td>社保扣费</td><td></td></tr>
                        <tr>    <td>旷工</td><td></td></tr>
                        <tr>    <td>应发工资</td><td></td></tr>
                        <tr>    <td>个人所得税扣费</td><td></td></tr>
                        <tr>    <td>实发工资</td><td>6800</td></tr>
                    </table>";
        sendEmail('809414504@qq.com','工资条','上师大',$message);

    }
}
