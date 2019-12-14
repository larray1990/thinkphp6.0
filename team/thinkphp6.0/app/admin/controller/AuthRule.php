<?php
/**
 * Created by PhpStorm.
 * User: larray
 * Date: 2019/9/26
 * Time: 23:04
 */

namespace app\admin\controller;

use app\AdminBase;
use think\facade\Log;
use think\facade\Request;
use app\model\AuthRule AS AuthRuleModel;
class AuthRule extends AdminBase
{
    /**
     * 列表页面
     * @return \think\response\View
     */
    public function index()
    {
        return view('index',['title'=>'权限管理']);
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
        /*$data= [];
        $dres1= Db::name('auth_rule')->where('pid',0)->order("sort asc")->field('id,pid,sort,name,rule,status,create_time')->select();
        foreach ($dres1 as $index => $item) {
            $data[]=$item;
            $dres2= Db::name('auth_rule')->where('pid',$item['id'])->order("sort asc")->field('id,pid,sort,name,rule,status,create_time')->select();
            foreach ($dres2 as $index1 => $item1) {
                $data[]=$item1;
                $dres3= Db::name('auth_rule')->where('pid',$item1['id'])->order("sort asc")->field('id,pid,sort,name,rule,status,create_time')->select();
                foreach ($dres3 as $index2 => $item2) {
                    $data[]=$item2;
                }
            }
        }*/
        $where=[];
        $data = $this->request->post();
        if(!empty($data['name'])){
            $where[]=['title|name','like','%'.$data['name'].'%'];
        }
        $data=AuthRuleModel::where($where)->order('sort asc,name asc')->field('id,pid,sort,name,title,status,create_time')->paginate($data['limit'])->toArray();
        return json_info($data);
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
            $post['add_user']=session('admin_name');
            if(!empty($post['id'])){
                $post['update_time']=date('Y-m-d H:i:s');
                $res = AuthRuleModel::update($post);
                if (!empty($res)) {
                    return json_success("更新成功！");
                } else {
                    return json_error("更新失败！");
                }
            }else {
                unset($post['id']);
                $post['create_time']=date('Y-m-d H:i:s');
                if($post['pid']==0){
                    $post['level']=1;
                }else{
                    $value=AuthRuleModel::where('id',$post['pid'])->value('level');
                    $post['level']=$value+1;
                }
                $res = AuthRuleModel::create($post);
                if (!empty($res)) {
                    return json_success("添加成功！");
                } else {
                    return json_error("添加失败！");
                }
            }
        }else {
            $info = AuthRuleModel::where('id', $this->request->get('id'))->find();
            $sort=AuthRuleModel::max("sort");
            if(!empty($info['id'])){
                $asort=$info['sort'];
            }else{
                $asort=$sort+1;
            }
            $up_per = AuthRuleModel::where(['pid'=>0])->order("sort asc")->field('id,title')->select()->toArray();
            $auth_rules = array();
            foreach ($up_per as $key => $value) {
                $auth_rules[] = $value;
                $per_two = AuthRuleModel::where(['pid'=>$value['id']])->order("sort asc")->field('id,title')->select()->toArray();
                if(!empty($per_two)){
                    foreach ($per_two as $key2 => $value2) {
                        $value2['title'] = '  ├─ '.$value2['title'];
                        $auth_rules[] = $value2;
                    }
                }
            }
            return view('', ['info' => $info, 'up_per' => $auth_rules,'showor'=>$asort]);
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
        $res = AuthRuleModel::destroy($post['ids']);
        if(!empty($res)){
            return json_success('删除成功！');
        }else{
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
                $admin = AuthRuleModel::find($id);
                $status = ($admin['status'] == 1) ? 0 : 1;
                $res = AuthRuleModel::update(['id'=>$id,'status'=>$status]);
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

    /**
     * 编辑单元格
     */
    public function edit()
    {
        if (Request::isPost()) {
            $data = Request::post();
            if (!empty($data['id'])) {
                $res = AuthRuleModel::update($data);
                if (!empty($res)) {
                    Log::write('更新单元格成功');
                    insert_admin_log("更新单元格成功！");
                    return json_success("更新单元格成功！");
                } else {
                    Log::write('更新单元格失败');
                    insert_admin_log("更新单元格失败！");
                    return json_error("更新单元格失败！");
                }
            }
        }
    }

}