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

class Role extends AdminBase
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
        $data = request()->get();
        if(session('admin_role_id')!=session('admin_super_role_id')){
            $where['pid']=session('admin_role_id');
        }
        if(!empty($data['name'])){
            $where['name']=['like','%'.$data['name'].'%'];
        }
        $lin =$this->getlimit($data['page'],$data['limit']);
        $count = Db::name('')
            ->where($where)
            ->count();
        $list = Db::name('auth_group')
            ->where($where)
            ->order('id asc')
            ->limit($lin[0], $lin[1])
            ->select();
        return json_info($count,$list);
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
                $res = Db::name('auth_group')->update($post);
                if (!empty($res)) {
                    return json_success("更新成功！");
                } else {
                    return json_error("更新失败！");
                }
            }else {
                unset($post['id']);
                $post['sort']=Db::name('auth_group')->where('pid',session('admin_role_id'))->max("sort")+1;
                $post['pid']=session('admin_role_id');
                $post['create_time']=date('Y-m-d H:i:s');
                $res = Db::name('auth_group')->insertGetId($post);
                if (!empty($res)) {
                    return json_success("添加成功！");
                } else {
                    return json_error("添加失败！");
                }
            }
        }else {
            $info = Db::name('auth_group')->where('id', request()->get('id'))->find();
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
        if(request()->isPost()){
            $data=request()->post();
            $one_id =$two_id= $fun_id =[];
            $one_id=$data['one_id'];
            $two_id=$data['two_id'];
            $fun_id=$data['fun_id'];
            /*
            * 首先要排除人为 只选择了 方法，而没有选择 二级菜单 和一级菜单这种情况，来做追加二级菜单的 逻辑处理
            */
            foreach ($fun_id as $k_threeid => $v_threeid) {
                /*
                * 根据方法id 来获取 其 二级id
                 * 判断 本二级菜单 id 是否在 一级菜单数组中，如果不在，则追加到一级菜单数组中
                */
                $permiss_twoid = Db::name('auth_rule')->where("id",'in',$v_threeid)->value('pid');
                if (!in_array($permiss_twoid,$two_id)) {
                    $two_id[] = $permiss_twoid;
                }
            }
            /*
            * 定义 ac_path 字段默认值
             * 遍历 传过来的 二级菜单 id 来获取 控制器，并追加到 $ac_path 字符串后面
            */
            $ac_path = '';
            foreach ($two_id as $k_two => $v_two) {
                /*
                * 根据二级菜单id 来获取 其相应参数
                */
                $per_arr = Db::name('auth_rule')->where("id",'in',$v_two)->field('id,pid,con_name')->select();
                $per_arr = $per_arr[0];
                /*
                * 获取二级菜单的上级id
                */
                $per_upid = $per_arr['pid'];

                /*
                * 将二级菜单控制器名称 追加到字符串后，并追加“,”
                */
                $ac_path .= $per_arr['con_name'].',';

                /*
                * 判断 本二级菜单 id 是否在 一级菜单数组中，如果不在，则追加到一级菜单数组中
                */
                if (!in_array($per_upid,$one_id)) {
                    $one_id[] = $per_upid;
                }
            }
            /*
            * 去掉 ac_path 最右侧的字符串
            */
            $ac_path = rtrim($ac_path,',');

            /*
            * 定义 permis_ids 字段默认值
             * 遍历 一级 权限
            */
            $permis_ids = '';
            foreach ($one_id as $k_oneid => $v_oneid) {
                /*
                * 追加 一级菜单 ，并链接上 '&' 符号
                */
                $permis_ids .= $v_oneid.'&';

                /*
                * 根据 一级数组 的 id 来查询数据表中所有 属于本 一级权限的 二级权限
                */
                $two_ids_arr = Db::name('auth_rule')->where("pid",'in',$v_oneid)->order("sort asc")->field('id')->select();

                /*
                * 遍历 查询出来的 数据表中所有 属于本 一级权限的 二级权限
                */
                foreach ($two_ids_arr as $k_tia => $v_tia) {
                    /*
                    * 挨个判断 所有的 二级权限 是否 在 管理员 选择的 二级权限中
                    */
                    if (in_array($v_tia['id'],$two_id)) {
                        /*
                        * 追加 二级菜单 ，并链接上 ':' 符号
                        */
                        $permis_ids .= $v_tia['id'].':';

                        /*
                        * 如果 在的话 ，则 根据 二级权限 id 来 获取数据表中 所有的 属于本二级权限的 方法id
                        */
                        $fun_ids_arr = Db::name('auth_rule')->where("pid",'in',$v_tia['id'])->order("sort asc")->field('id')->select();

                        /*
                        * 遍历 查询出来的 数据表中所有 属于本 二级权限的 方法权限
                        */
                        foreach ($fun_ids_arr as $k_fia => $v_fia) {
                            /*
                            * 挨个判断 所有的 方法 是否 在 管理员 选择的 方法中
                            */
                            if (in_array($v_fia['id'],$fun_id)) {
                                /*
                                * 如果 在的话 ，则 拼接 permis_ids 字符串，并链接上 ',' 符号
                                */
                                $permis_ids .= $v_fia['id'].',';
                            }
                        }
                        /*
                        * 去掉 permis_ids 最右侧的字符串 ','
                        */
                        $permis_ids = rtrim($permis_ids,',');
                        /*
                        * 链接上 '&' 符号
                        */
                        $permis_ids .= '&';
                    }
                }

                /*
                * 去掉 permis_ids 最右侧的字符串 '&'
                */
                $permis_ids = rtrim($permis_ids,'&');
                /*
                * 链接上 '|' 符号
                */
                $permis_ids .= '|';
            }

            /*
            * 去掉 permis_ids 最右侧的字符串 '|'  ，得到最终 字符串
            */
            $permis_ids = rtrim($permis_ids,'|');
            /*
            * 组建 数组
            */
            $arr = array(
                'id' => $data['id'],
                'permis_ids' => $permis_ids,
                'ac_path' => $ac_path
            );
            /*
            * 更新数据
            */
            $arr['update_time']=date('Y-m-d H:i:s');
            $res = Db::name('auth_group')->update($arr);

            if ($res) {
                $action="角色赋权成功！";
                $return_data = [
                    'code' => 1,
                    'msg' => $action,
                ];
            }else{
                $action="角色赋权失败！";
                $return_data = [
                    'code' => 0,
                    'msg' => $action,
                ];
            }
            adminLog($action,Db::name('auth_group')->getLastSql());
            return json($return_data);
        }else {
            $id = request()->get('id');
            /**
             * 创建返回的数组
             */
            $return_data = array();
            if (session('admin_role_id') != session('admin_super_role_id')) {
                $user_role_id = session('admin_role_id');
                $user_role_ids = Db::name('auth_group')->where(array('pid'=>$user_role_id))->column('id');
                if (!in_array($id, $user_role_ids)) {
                    $return_data['msg'] = "您已越权";
                    $return_data['code'] = 0;
                    return json($return_data);
                }
            }

            /*
            * 查询本角色的id 名称 所拥有的权限 等信息
            */
            $role_info = Db::name('auth_group')->find($id);

            /*
            * 新建三个数组 ，把 该角色 所拥有的权限 分开
            */
            $one_ids = array();
            $two_ids = array();
            $fun_ids = array();

            /*
            * 得到对应的权限字符串
            */
            $data_permis_ids = $role_info['permis_ids'];
            /*
            * 以 "|" 符号分割为数组，得到的数组就是 每个一级权限下的数据
            */
            $data_one_arr = explode('|',$data_permis_ids);

            /*
            * 遍历 每个 一级权限模块
            */
            foreach ($data_one_arr as $k_doa => $v_doa) {

                /*
                * 将每条数据  以 "&" 符号分割为数组
                */
                $data_two_arr = explode('&',$v_doa);
                /*
                * 分割数组后的第一个数组为 一级权限，将本数组 赋值到 $one_ids 数组中
                */
                $one_ids[] = $data_two_arr[0];
                /*
                * 删除 一级权限
                */
                unset($data_two_arr[0]);
                /*
                * 遍历二级权限
                */
                foreach ($data_two_arr as $k_vdoa => $v_vdoa) {
                    /*
                    * 将每条数据  以 ":" 符号分割为数组
                    */
                    $data_fun_arr = explode(':',$v_vdoa);
                    /*
                    * 分割数组后的第一个数组为 一级权限，将本数组 赋值到 $one_ids 数组中
                    */
                    $two_ids[] = $data_fun_arr[0];
                    /*
                    * 删除 二级权限
                    */
                    unset($data_fun_arr[0]);

                    foreach ($data_fun_arr as $k_dfa => $v_dfa) {
                        /*
                        * 将每条数据  以 "," 符号分割为数组
                        */
                        $data_function_arr = explode(',',$v_dfa);
                        /*
                        * 遍历每条数据
                        */
                        foreach ($data_function_arr as $k_dfas => $v_dfas) {
                            /*
                            * 判断本条数据 是否有值，如果有值，则进行数组追加
                            */
                            if (!empty($v_dfas) && isset($v_dfas)) {
                                array_push($fun_ids,$v_dfas);
                            }
                        }
                    }
                }
            }
            /*
            * 前台传值  一级权限、二级权限、方法
            */
            $this->assign('one_ids',$one_ids);
            $this->assign('two_ids',$two_ids);
            $this->assign('fun_ids',$fun_ids);
            /*
            * 前台传值 角色名称
            */
            $this->assign('role_info',$role_info);
            /*
            * 定义该用户所拥有的一级权限、二级权限、方法
            */
            $auth_infoA = array();
            $auth_infoB = array();
            $auth_infoC = array();

            /*
            * 判断是否为超级管理员,只有超级管理员的 pid 才会是0
            */
            // if (session(SESSION_ADMIN_ROLE_ID) != session(SESSION_ADMIN_SUPER_ROLE_ID)) {
            if (!empty($role_info['pid'])) {
                /*
                * 如果不是超级管理员时
                */
                $user_permis_ids = Db::name('auth_group')->where(array('id'=>$role_info['pid']))->value('permis_ids');
                /*
                * 以 "|" 符号分割为数组，得到的数组就是 每个一级权限下的数据
                */
                $user_one_arr = explode('|',$user_permis_ids);
                // 遍历 每个 一级权限模块
                foreach ($user_one_arr as $k_uoa => $v_uoa) {
                    //将每条数据  以 "&" 符号分割为数组
                    $user_two_arr = explode('&',$v_uoa);
                    // 分割数组后的第一个数组为 一级权限，将本数组 赋值到 $one_ids 数组中
                    $auth_infoA[] = Db::name('auth_rule')->where(array('id'=>$user_two_arr[0]))->field('id,name')->select()[0];
                    //删除 一级权限
                    unset($user_two_arr[0]);
                    //遍历二级权限
                    foreach ($user_two_arr as $k_uta => $v_uta) {
                        //将每条数据  以 ":" 符号分割为数组
                        $user_fun_arr = explode(':',$v_uta);
                        /*
                        * 分割数组后的第一个数组为 一级权限，将本数组 赋值到 $one_ids 数组中
                        */
                        $auth_infoB[] = Db::name('auth_rule')->where(array('id'=>$user_fun_arr[0]))->field('id,name,pid')->select()[0];;
                        /*
                        * 删除 二级权限
                        */
                        unset($user_fun_arr[0]);
                        foreach ($user_fun_arr as $k_ufa => $v_ufa) {
                            /*
                            * 将每条数据  以 "," 符号分割为数组
                            */
                            $user_function_arr = explode(',',$v_ufa);
                            /*
                            * 遍历每条数据
                            */
                            foreach ($user_function_arr as $k_ufas => $v_ufas) {
                                /*
                                * 判断本条数据 是否有值，如果有值，则进行数组追加
                                */
                                if (!empty($v_ufas) && isset($v_ufas)) {
                                    $auth_infoC[] = Db::name('auth_rule')->where(array('id'=>$v_ufas))->field('id,name,pid')->select()[0];;
                                }
                            }
                        }
                    }
                }
            }else{
                /*
                 * 如果是超级管理员时
                * 一级权限 数据
                */
                $auth_infoA = Db::name('auth_rule')->where("pid='0'")->order("sort asc")->field('id,name')->select();

                /*
                * 遍历一级权限，得到 所有一级权限的 ids  =》 二级权限
                */
                foreach ($auth_infoA as $k_aiA => &$v_aiA) {
                    $v_aiA['num']=Db::name('auth_rule')->where('pid',$v_aiA['id'])->count();
                    $auth_infoA_ids[] = $v_aiA['id'];
                }
                $auth_infoB = Db::name('auth_rule')->where('pid','in',$auth_infoA_ids)->order("sort asc")->field('id,name,pid')->select();
                /*
                * 遍历二级权限，得到 所有二级权限的 ids  =》 三级权限
                */
                foreach ($auth_infoB as $k_aiB => $v_aiB) {
                    $auth_infoB_ids[] = $v_aiB['id'];
                }
                $auth_infoC = Db::name('auth_rule')->where('pid','in',$auth_infoB_ids)->order("sort asc")->field('id,name,pid')->select();
            }
            $this->assign(['auth_infoA'=>$auth_infoA,'auth_infoB'=>$auth_infoB,'auth_infoC'=>$auth_infoC]);
            return view();
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
        $res = Db::name('auth_group')->delete($post['ids']);
        if(!empty($res)){
            return json_success('删除成功！');
        }else{
            return json_error('删除失败！');
        }
    }

}