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
use think\facade\Log;
use think\facade\View;

class Permission extends AdminBase
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
        $data= [];
//        $data = request()->get();
//        if(!empty($data['name'])){
//            $where['name']=['like','%'.$data['name'].'%'];
//        }
//        $where['pid']=0;
        $dres1= Db::name('auth_rule')->where('pid',0)->order("sort asc")->field('id,pid,sort,name,rule,create_time')->select();
        foreach ($dres1 as $index => $item) {
            $data[]=$item;
            $dres2= Db::name('auth_rule')->where('pid',$item['id'])->order("sort asc")->field('id,pid,sort,name,rule,create_time')->select();
            foreach ($dres2 as $index1 => $item1) {
                $data[]=$item1;
                $dres3= Db::name('auth_rule')->where('pid',$item1['id'])->order("sort asc")->field('id,pid,sort,name,rule,create_time')->select();
                foreach ($dres3 as $index2 => $item2) {
                    $data[]=$item2;
                }
            }
        }
        return json_info(count($data),$data);
    }

    public function data2()
    {
        $data=[];
        $dres= Db::name('auth_rule')->order("level asc")->select();
        foreach ($dres as $index => $item) {
            $data[]=$item;
        }
        return json($dres);
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
        if(request()->isPost()){
            $post=request()->post();
            $post['add_user']=session('admin_name');
            if(!empty($post['id'])){
                $post['update_time']=date('Y-m-d H:i:s');
                $res = Db::name('auth_rule')->update($post);
                if (!empty($res)) {
                    return json_success("更新成功！");
                } else {
                    return json_error("更新失败！");
                }
            }else {
                unset($post['id']);
                $post['create_time']=date('Y-m-d H:i:s');
                $res = Db::name('auth_rule')->insertGetId($post);
                if (!empty($res)) {
                    return json_success("添加成功！");
                } else {
                    return json_error("添加失败！");
                }
            }
        }else {
            $info = Db::name('auth_rule')->where('id', request()->get('id'))->find();
            if(empty($info['sort'])){
                $sort=Db::name('auth_rule')->max("sort")+1;
                View::assign('showor',$sort);
            }
            $up_per = Db::name('auth_rule')->where("pid='0'")->order("sort asc")->field('id,name')->select();
            $auth_rules = array();
            foreach ($up_per as $key => $value) {
                $auth_rules[] = $value;
                $per_two = Db::name('auth_rule')->where("pid=".$value['id'])->order("sort asc")->field('id,name')->select();
                foreach ($per_two as $key2 => $value2) {
                    $per_two[$key2]['name'] = '  ├─ '.$value2['name'];
                    $auth_rules[] = $per_two[$key2];
                }
            }
            return view('', ['info' => $info, 'up_per' => $auth_rules]);
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
        $post = request()->post();
        $res = Db::name('auth_rule')->delete($post['ids']);
        if(!empty($res)){
            return json_success('删除成功！');
        }else{
            return json_error('删除失败！');
        }
    }

}