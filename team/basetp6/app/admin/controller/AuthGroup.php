<?php
/**
 * Created by PhpStorm.
 * User: larray
 * Date: 2019/9/26
 * Time: 23:04
 */
namespace app\admin\controller;

use app\AdminBase;
use think\facade\Db;
use think\facade\View;
use app\model\AuthGroup as AuthGroupModel;
use app\model\AuthRule;
class AuthGroup extends AdminBase
{
    /**
     * 列表页面
     * @return \think\response\View
     */
    public function index()
    {
        return view('',['title'=>'角色管理列表']);
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
        $data = $this->request->post();
        if(!empty($data['title'])){
            $where[]=['title','like','%'.$data['title'].'%'];
        }
        $list = AuthGroupModel::where($where)
            ->order('id asc')
            ->paginate($data['limit'])->toArray();
        return json_info($list);
    }

    /**
     * 添加
     * @return \think\response\View
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function form()
    {
        if($this->request->isPost()){
            $post=$this->request->post();
            if(!empty($post['id'])){
                $post['update_time']=date('Y-m-d H:i:s');
                $res = AuthGroupModel::update($post);
                if (!empty($res)) {
                    return json_success("更新成功！");
                } else {
                    return json_error("更新失败！");
                }
            }else {
                unset($post['id']);
                $post['create_time']=date('Y-m-d H:i:s');
                $res = AuthGroupModel::create($post);
                if (!empty($res)) {
                    return json_success("添加成功！");
                } else {
                    return json_error("添加失败！");
                }
            }
        }else {
            $info = AuthGroupModel::where('id', $this->request->get('id'))->find();
            return view('', ['info' => $info]);
        }
    }

    /**
     * 赋权
     * @return \think\response\View
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function power()
    {
        if($this->request->isPost()){
            $data=$this->request->post();
            $data['rules']=implode(',',$data['rules']);
            $data['update_time']=date('Y-m-d H:i:s');
            $res = AuthGroupModel::update($data);
            if ($res) {
                $action="角色赋权成功！";
                insert_admin_log($action);
                return json_success($action);
            }else{
                $action="角色赋权失败！";
                insert_admin_log($action);
                return json_error($action);
            }
        }else {
            $id = $this->request->get('id');
            $role_info = AuthGroupModel::find($id)->toArray();
            $role_info['rules']=explode(',',$role_info['rules']);
            $auth_infoA = AuthRule::where("pid='0'")->whereRaw('status=1')->order("sort asc")->field('id,title')->select()->toArray();
            $auth_infoA_ids=$auth_infoB_ids=[];
            //遍历一级权限，得到 所有一级权限的 ids  =》 二级权限
            foreach ($auth_infoA as $k_aiA => &$v_aiA) {
                $v_aiA['num']=AuthRule::where('pid',$v_aiA['id'])->count();
                $auth_infoA_ids[] = $v_aiA['id'];
            }
            $auth_infoB = AuthRule::where('pid','in',$auth_infoA_ids)->whereRaw('status=1')->order("sort asc")->field('id,title,pid')->select()->toArray();
            //遍历二级权限，得到 所有二级权限的 ids  =》 三级权限
            foreach ($auth_infoB as $k_aiB => $v_aiB) {
                $auth_infoB_ids[] = $v_aiB['id'];
            }
            $auth_infoC = AuthRule::where('pid','in',$auth_infoB_ids)->whereRaw('status=1')->order("sort asc")->field('id,title,pid')->select()->toArray();
            return view('power',['role_info'=>$role_info,'auth_infoA'=>$auth_infoA,'auth_infoB'=>$auth_infoB,'auth_infoC'=>$auth_infoC]);
        }
    }

    /**
     * 删除
     * @return \think\response\Json
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function destroy()
    {
        $post = $this->request->post();
        $res = AuthGroupModel::destroy($post['ids']);
        if(!empty($res)){
            insert_admin_log("删除成功！");
            return json_success('删除成功！');
        }else{
            insert_admin_log("删除失败！");
            return json_error('删除失败！');
        }
    }
    /**
     * 修改状态
     * @return \think\response\Json
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function state()
    {
        if ($this->request->isPost()) {
            $id = $this->request->post('id');
            if (!empty($id)) {
                $admin = AuthGroupModel::find($id);
                $status = ($admin['status'] == 1) ? 0 : 1;
                $res = AuthGroupModel::update(['id'=>$id,'status'=>$status]);
                if (!empty($res)) {
                    insert_admin_log("修改状态成功！");
                    return json_success("修改状态成功！");
                } else {
                    insert_admin_log("修改状态失败！");
                    return json_error("修改状态失败！");
                }
            }
        }
    }
}