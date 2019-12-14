<?php


namespace app\home\controller;

use think\Db;
use think\db\Where;

class Institution extends Base
{
    /**
     * 中心机构
     */
    public function index()
    {
        $id=session('ins_id');
        $info = Db::name('institution')->where('id',$id)->find();
        //患者数量
        $info['patient_num'] = Db::name('patient')->where('ins_id',$id)->count();
        //机构成员数量
        $info['ins_mem_num'] = Db::name('institutions_member')->where('ins_id',$id)->count();
        return view('',[
            'info'=>$info,
        ]);
    }


    public function add()
    {
        if(request()->isPost()){
            $post=request()->post();
            if(!empty($post['id'])){
                $post['update_time']=date('Y-m-d H:i:s');
                $res = Db::name('institution')->update($post);
                if (!empty($res)) {
                    $info = array(
                        'code' => 1,
                        'msg' => "更新成功！",
                    );
                } else {
                    $info = array(
                        'code' => 0,
                        'msg' => "更新失败！",
                    );
                }
            }else {
                $post['create_time']=date('Y-m-d H:i:s');
                $res = Db::name('institution')->insertGetId($post);
                if (!empty($res)) {
                    $info = array(
                        'code' => 1,
                        'msg' => "添加成功！",
                    );
                } else {
                    $info = array(
                        'code' => 0,
                        'msg' => "添加失败！",
                    );
                }
            }
            return json($info);
        }else{
            $id = request()->get('id');
            $inf = Db::name('institution')->where('id',$id)->find();
            return view('',['info'=>$inf]);
        }
    }


    /**
     * 中心机构成员
     */
    public function member()
    {
        $info =Db::name('institution')->where('id', session('ins_id'))->field('id,name')->select();
        return view('',['info'=>$info,'title'=>'机构成员列表']);
    }
    /**
     * 机构成员加载数据
     */
    public function member_data()
    {
        $where=[];
        $data = request()->get();
        $page = $data['page'];
        $limit = 18;
        $start = ($page - 1) * $limit;
        $where['ins_id']=session('ins_id');
        if(!empty($data['user_name'])){
            $where['user_name']=['like','%'.$data['user_name'].'%'];
        }
        if(!empty($data['nick_name'])){
            $where['nick_name']=['like','%'.$data['nick_name'].'%'];
        }
        if(!empty($data['name'])){
            $where['name']=$data['name'];
        }
        $count = Db::name('institutions_member')
            ->alias('a')
            ->leftJoin('pre_institution b','a.ins_id=b.id')
            ->where(new Where($where))
            ->count();

        $lists =Db::name('institutions_member')
            ->alias('a')
            ->leftJoin('pre_institution b','a.ins_id=b.id')
            ->where(new Where($where))
            ->order('id desc')
            ->limit($start, $limit)
            ->field('a.*,b.name')
            ->select();
        $list = array();
        foreach ($lists as $v) {
            $list[] = $v;
        }
        $info = array(
            'code' => 0,
            'msg' => "",
            'count' => $count,
            'data' => $list
        );
        return json($info);
    }

    /**
     *
     * 添加机构成员
     */
    public function member_info()
    {
        if(request()->isPost()){
            $post=request()->post();
            $post['ins_id']=session('ins_id');
            if(!empty($post['user_name'])){
                $re=Db::name('institutions_member')->where('user_name',$post['user_name'])->find();
                if (!empty($re)) {
                    $info = array(
                        'code' => 0,
                        'msg' => "用户名已存在！",
                    );
                }
            }
            if(!empty($post['id'])){
                $post['update_time']=date('Y-m-d H:i:s');
                $res = Db::name('institutions_member')->update($post);
                if (!empty($res)) {
                    $info = array(
                        'code' => 1,
                        'msg' => "更新成功！",
                    );
                } else {
                    $info = array(
                        'code' => 0,
                        'msg' => "更新失败！",
                    );
                }
            }else {
                $post['password']=md5($post['password']);
                $post['create_time']=date('Y-m-d H:i:s');
                $res = Db::name('institutions_member')->insertGetId($post);
                if (!empty($res)) {
                    $info = array(
                        'code' => 1,
                        'msg' => "添加成功！",
                    );
                } else {
                    $info = array(
                        'code' => 0,
                        'msg' => "添加失败！",
                    );
                }
            }
            return json($info);
        }else{
            $id = request()->get('id');
            $inf = Db::name('institutions_member')->where('id',$id)->find();
            return view('',['info'=>$inf]);
        }
    }

    /**
     * 删除机构成员
     */
    public function member_destroy()
    {
        $post = request()->post();
        $res = Db::name('institutions_member')->delete($post['ids']);
        if(!empty($res)){
            return json(['code'=>0,'msg'=>'删除成功！']);
        }else{
            return json(['code'=>1,'msg'=>'删除失败！']);
        }
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
    public function respwd()
    {
        if($post =request()->post()){
            $post['password']=md5($post['password']);
            $post['update_time']=date('Y-m-d H:i:s');
            $re = Db::name('institutions_member')->update($post);
            if (!empty($re)) {
                $res = array(
                    'code' => 1,
                    'msg' => "更新成功！",
                );
            } else {
                $res = array(
                    'code' => 0,
                    'msg' => "更新失败！",
                );
            }
            return json($res);
        }
        $id = request()->get('id');
        $info =Db::name('institutions_member')->where('id',$id)->find();
        $ins =Db::name('institution')->where('id',$info['ins_id'])->find();
        $info['ins_name']=$ins['name'];

        return view('',['info'=>$info]);
    }

    /**
     * 详情
     * @return \think\response\View
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function detail()
    {
        $id = request()->get('id');
        $info = Db::name('institutions_member')->where('id',$id)->find();
        return view('',['info'=>$info]);
    }
}