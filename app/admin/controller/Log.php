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
use think\facade\Log as LogM;

class Log extends AdminBase
{
    public function index()
    {
        return view()->assign(['title'=>'日志管理列表']);
    }

    public function data()
    {
        $where = [];
        $post = $this->request_param();
        $data=format_date($post);
        if(!empty($data['username'])){
            $where[]=['username','like','%'.$data['username'].'%'];
        }
        if(!empty($data['recog'])){
            $where[]=['create_time','between',[strtotime($data['recog_start']),strtotime($data['recog_end'])]];
        }
        if (!empty($data['type'])) {
            $data['limit']=AdminLog::where($where)->count();
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
        $post = $this->request_param();
        $res = AdminLog::destroy($post['id']);
        if(!empty($res)){
            LogM::record('删除成功！');
            insert_admin_log("删除成功！");
            return json_success('删除成功！');
        }else{
            LogM::record('删除失败！');
            insert_admin_log("删除失败！");
            return json_error('删除失败！');
        }
    }
}