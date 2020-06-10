<?php
/**
 * Created by PhpStorm.
 * User: larray
 * Date: 2019/11/12
 * Time: 17:51
 */

namespace app\admin\controller;

use app\AdminBase;
use app\model\AuthGroup;
use think\facade\App;

class System extends AdminBase
{
    public function index()
    {
        return view('',['title'=>'配置管理']);
    }


    public function data(){
        $where = [];
        $data = $this->request_param();
        if(!empty($data['title'])){
            $where[]=['title','like','%'.$data['title'].'%'];
        }
        if (!empty($data['type'])) {
            $data['limit']=AuthGroup::where($where)->count();
        }
        $list = AuthGroup::where($where)
            ->order('id desc')
            ->paginate($data['limit'])->toArray();
        return json_info($list);
    }

    public function destroy(){
        $data=$this->request_param();
        return json_success('fddjjjk',$data);
    }


}

