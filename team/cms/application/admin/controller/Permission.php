<?php
/**
 * Created by PhpStorm.
 * User: larray
 * Date: 2019/9/26
 * Time: 23:04
 */

namespace app\admin\controller;

use think\Db;
use think\db\Where;
use think\facade\Log;

class Permission extends Base
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
        $dres1= Db::name('permission')->where('pid',0)->order("show_order asc")->field('id,pid,show_order,name,con_name,ca_path,create_time')->select();
        foreach ($dres1 as $index => $item) {
            $data[]=$item;
            $dres2= Db::name('permission')->where('pid',$item['id'])->order("show_order asc")->field('id,pid,show_order,name,con_name,ca_path,create_time')->select();
            foreach ($dres2 as $index1 => $item1) {
                $data[]=$item1;
                $dres3= Db::name('permission')->where('pid',$item1['id'])->order("show_order asc")->field('id,pid,show_order,name,con_name,ca_path,create_time')->select();
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
        $dres= Db::name('permission')->order("level asc")->select();
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
                $res = Db::name('permission')->update($post);
                if (!empty($res)) {
                    return json_success("更新成功！");
                } else {
                    return json_error("更新失败！");
                }
            }else {
                unset($post['id']);
                $post['create_time']=date('Y-m-d H:i:s');
                $res = Db::name('permission')->insertGetId($post);
                if (!empty($res)) {
                    return json_success("添加成功！");
                } else {
                    return json_error("添加失败！");
                }
            }
        }else {
            $info = Db::name('permission')->where('id', request()->get('id'))->find();
            if(empty($info['show_order'])){
                $show_order=Db::name('permission')->max("show_order")+1;
                $this->assign('showor',$show_order);
            }
            $up_per = Db::name('permission')->where("pid='0'")->order("show_order asc")->field('id,name')->select();
            $permissions = array();
            foreach ($up_per as $key => $value) {
                $permissions[] = $value;
                $per_two = Db::name('permission')->where("pid=".$value['id'])->order("show_order asc")->field('id,name')->select();
                foreach ($per_two as $key2 => $value2) {
                    $per_two[$key2]['name'] = '  ├─ '.$value2['name'];
                    $permissions[] = $per_two[$key2];
                }
            }
            return view('', ['info' => $info, 'up_per' => $permissions]);
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
        $res = Db::name('permission')->delete($post['ids']);
        if(!empty($res)){
            return json_success('删除成功！');
        }else{
            return json_error('删除失败！');
        }
    }

}