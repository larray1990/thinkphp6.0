<?php
namespace app\admin\controller;

use think\App;
use think\Controller;
use think\Db;
use think\facade\Session;


class Base extends Controller
{
    function __construct(App $app = null)
    {
        Session::start();
        header("Cache-control: private");  // history.back返回后输入框值丢失问题
        parent::__construct($app);
        $this->getMenu();
    }

    /*
     * 初始化操作
     */
    public function initialize()
    {
        //过滤不需要登陆的行为
        if(!in_array(request()->action(),array('login','logout','verify','register'))){
            if (session('admin_id') > 0) {
                $this->admin_id = session('admin_id');
            }else {
                (request()->action() == 'index') && $this->redirect( url('Login/login'));
                $this->error('请先登录', url('Login/login'));
            }
        }
    }

    /**
     * 获取菜单栏
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getMenu()
    {
        $role_info =Db::name('role')->where('id',session('admin_role_id'))->find();
        /*
        * 定义数组，来存储左侧菜单
        */
        $ld_arr = array();

        /*
        * 定义权限数组，该用户所有的权限都会在本数组中
        */
        $permissions_data = array();

        /*
        * 以 "|" 符号分割为数组，得到的数组就是 每个一级权限下的数据
        */
        $data_one_arr = explode('|',$role_info['permis_ids']);
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
            $ld_arr[] = Db::name('permission')->where('id',$data_two_arr[0])->field('name,ca_path,icon')->find();
            unset($data_two_arr[0]);
            $two_ids=[];
            /*
            * 遍历二级权限
            */
            foreach ($data_two_arr as $k_vdoa => $v_vdoa) {
                /*
                * 将每条数据  以 ":" 符号分割为数组
                */
                $data_fun_arr = explode(':',$v_vdoa);
                //获得二级栏目id集合
                $two_ids[]=$data_fun_arr[0];
            }
            $ld_arr[$k_doa]['child'] = Db::name('permission')->where('id','in',$two_ids)->field('name,ca_path,icon')->select();
        }
        $this->assign('ld_arr',$ld_arr);
    }

    /**
     * @param string $fangfa
     * @param string $table
     * @param array $data
     * @return \think\response\Json
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function dataChange(string $fangfa,string $table,array $data=[]){
        switch ($fangfa){
            case 'update':
                $data['update_time']=date('Y-m-d H:i:s');
                $info=\think\Db::name($table)->update($data);
                break;
            case 'insert':
                $data['create_time']=date('Y-m-d H:i:s');
                $info=\think\Db::name($table)->insertGetId($data);
                break;
            case 'insertAll':
                foreach ($data as $index => &$datum) {
                    $datum['create_time']=date('Y-m-d H:i:s');
                }
                $info=\think\Db::name($table)->insertAll($data);
                break;
            case 'delete':
                $info=\think\Db::name($table)->delete($data);
                break;
        }
        return $info;
    }

}