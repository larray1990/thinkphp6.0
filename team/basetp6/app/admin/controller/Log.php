<?php
/**
 * Created by PhpStorm.
 * User: larray
 * Date: 2019/12/12
 * Time: 15:21
 */

namespace app\admin\controller;


use app\AdminBase;
use app\model\AdminLog;

class Log extends AdminBase
{
    public function index()
    {
        return view()->assign(['title'=>'日志管理列表']);
    }

    public function data()
    {
        $where = [];
        $data = $this->request->post();
        if(!empty($data['username'])){
            $where[]=['username','like','%'.$data['username'].'%'];
        }
        $list = AdminLog::where($where)
            ->order('id desc')
            ->paginate($data['limit'])->toArray();
        return json_info($list);
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
        $res = AdminLog::destroy($post['ids']);
        if(!empty($res)){
            insert_admin_log("删除成功！");
            return json_success('删除成功！');
        }else{
            insert_admin_log("删除失败！");
            return json_error('删除失败！');
        }
    }
}