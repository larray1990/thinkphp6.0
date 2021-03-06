<?php
/**
 * Created by PhpStorm.
 * User: larray
 * Date: 2019/9/26
 * Time: 23:04
 */

namespace app\admin\controller;

use app\model\Admin as AdminModel;
use app\model\AuthGroup;
use app\AdminBase;
use app\model\AuthGroupAccess;
use think\App;
use think\facade\Db;
use think\facade\Request;
use think\facade\Log;
use think\response\Json;
use think\response\Redirect;

class Admin extends AdminBase
{
    /**
     * 管理员管理列表
     */
    public function index()
    {
        $admin = AdminModel::column('id,username');
        return view()->assign(['title' => '管理员管理列表', 'admin' => $admin]);
    }

    /**
     * 加载数据
     * @return \think\response\Json
     * @throws \think\db\exception\DbException
     * @throws \think\exception\DbException
     */
    public function data()
    {
        $where = [];
        $data = $this->request_param();
        if (!empty($data['username'])) {
            $where[] = ['username', 'like', '%' . $data['username'] . '%'];
        }
        if (!empty($data['phone'])) {
            $where[] = ['phone', 'like', '%' . $data['phone'] . '%'];
        }
        if (!empty($data['sex'])) {
            $where[] = ['sex', '=', $data['sex']];
        }
        if (!empty($data['type'])) {
            $data['limit']=AdminModel::where($where)->count();
        }
        $list = AdminModel::with(['authGroupAccess', 'authGroup'])
                ->where($where)
                ->order('id desc')
                ->paginate($data['limit'])->each(function ($item, $key) {
                    if (!empty($item['province'])) {
                        $item['area'] = $item['province'] . '-' .$item['city'] . '-' . $item['county'];
                    } else {
                        $item['area'] = '-';
                    }
                    return $item;
                })->toArray();
        return json_info($list, ['all_num'=>3,'all_money'=>200]);
    }

    /**
     * 表单的添加和修改
     * @return \think\response\Json|\think\response\View
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function form()
    {
        if (Request::isPost()) {
            $post = $this->request_param();
            $post['add_user'] = session('admin_id');
            if (!empty($post['id'])) {
                $data = AdminModel::find($post['id']);
                if ($data['username'] != $post['username']) {
                    $req = AdminModel::where('username', $post['username'])->find();
                    if ($req) {
                        Log::record('账号已存在！');
                        return json_error('账号已存在！');
                    }
                }
                if ($data['password'] !== $post['password']) {
                    $data = AdminModel::setPwd($post['password']);
                    $post['password'] = $data['password'];
                    $post['password_reset_token'] = $data['token'];
                }
                $result = AdminModel::update($post);
                if ($result == true) {
                    AuthGroupAccess::update(['group_id' => $post['group_id']], ['uid' => $post['id']]);
                    Log::record('更新成功！');
                    insert_admin_log('更新成功！');
                    return json_success("更新成功！");
                } else {
                    Log::record('更新失败！');
                    insert_admin_log('更新失败！');
                    return json_error('更新失败！');
                }
            } else {
                $req = AdminModel::where('username', $post['username'])->find();
                if ($req) {
                    Log::record('账号已存在！');
                    return json_error('账号已存在！');
                }
                $dat = AdminModel::setPwd($post['password']);
                $post['password'] = $dat['password'];
                $post['password_reset_token'] = $dat['token'];
                $result = AdminModel::create($post);
                if ($result == true) {
                    AuthGroupAccess::create(['uid' => $result->id, 'group_id' => $post['group_id']]);
                    Log::record('添加成功！');
                    insert_admin_log('添加成功！');
                    return json_success("添加成功！");
                } else {
                    Log::record('添加失败！');
                    insert_admin_log('添加失败！');
                    return json_error('添加失败！');
                }
            }
        } else {
            $info = AdminModel::with(['authGroupAccess', 'authGroup'])->where('id', Request::get('id'))->find();
            $role = collect(AuthGroup::where('status', '1')->field("id,title")->select())->toArray();
            return view()->assign(['info' => $info, 'role' => $role]);
        }
    }


    /**
     * 详情
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|\think\response\View
     * @throws \think\Db::name\exception\DataNotFoundException
     * @throws \think\Db::name\exception\ModelNotFoundException
     * @throws \think\exception\Db::nameException
     */
    public function show()
    {
        $info = AdminModel::with(['authGroupAccess', 'authGroup'])
            ->where('id', Request::get('id'))
            ->find();
        $info['area'] = $info['province'] . '-' . $info['city'] . '-' . $info['county'];
        $info['sex'] = $info['sex'] == '1' ? '男' : '女';
        return view()->assign(['info' => $info]);
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
        $res = AdminModel::destroy($post['id']);
        if (!empty($res)) {
            AuthGroupAccess::where('uid', 'in', $post['id'])->delete();
            Log::record('删除成功！');
            insert_admin_log('删除成功！');
            return json_success('删除成功！');
        } else {
            Log::record('添加失败！');
            insert_admin_log('删除失败！');
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
        if (Request::isPost()) {
            $data = $this->request_param();
            if (!empty($data['id'])) {
                $res = AdminModel::update(['id'=>$data['id'],$data['name']=>$data['value']]);
                if (!empty($res)) {
                    insert_admin_log('修改状态成功！');
                    return json_success("修改状态成功！");
                } else {
                    insert_admin_log('修改状态失败！');
                    return json_error("修改状态失败！");
                }
            }
        }
    }

    /**
     * @return \think\response\Json
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function checkAdmin()
    {
        if (Request::isPost()) {
            $data = $this->request_param();
            if (!empty($data['id'])) {
                $res = AdminModel::update(['id'=>$data['id'],$data['name']=>$data['value']]);
                if (!empty($res)) {
                    insert_admin_log('修改管理员状态成功！');
                    return json_success("修改管理员状态成功！");
                } else {
                    insert_admin_log('修改管理员状态失败！');
                    return json_error("修改管理员状态失败！");
                }
            }
        }
    }

    /**
     * 修改个人信息
     * @return think\response\Json|\think\response\View
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function info()
    {
        if ($post = $this->request_param()) {
            Db::startTrans();
            try {
                AdminModel::find(session('admin_id'))->together(['authGroupAccess'])->save($post);
                Db::commit();
                insert_admin_log('更新成功！');
                return json_success("更新成功！");
            } catch (\Exception $e) {
                // 回滚事务
                Db::rollback();
                insert_admin_log('更新失败！');
                return json_error('更新失败！');
            }
        }
        $info = AdminModel::with(['authGroupAccess', 'authGroup'])
            ->where('id', session('admin_id'))
            ->find();
        $role = AuthGroup::where('status', 1)->order("id desc")->field("id,title")->select();
        return view()->assign(['info' => $info, 'role' => $role]);
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
    public function password()
    {
        if ($post = $this->request_param()) {
            $id = session('admin_id');
            $info = AdminModel::where('id', $id)->find();
            if ($info['password'] != md5($info['password_reset_token'] . md5($post['oldPassword']))) {
                return json_error('原密码不正确！');
            }
            unset($post['oldPassword']);
            unset($post['repassword']);
            $pos['password'] = md5($info['password_reset_token'] . md5($post['password']));
            $pos['id'] = $id;
            $re = AdminModel::update($pos);
            if (!empty($re)) {
                insert_admin_log('修改密码成功！');
                return json_success('修改密码成功！');
            } else {
                insert_admin_log('修改密码失败！');
                return json_error('修改密码失败！');
            }
        }
        return view();
    }

    /**
     * 编辑单元格
     */
    public function edit()
    {
        if (Request::isPost()) {
            $data = $this->request_param();
            $data[$data['name']]=$data['value'];
            unset($data['name']);
            unset($data['value']);
            if (!empty($data['id'])) {
                $res = AdminModel::update($data);
                if (!empty($res)) {
                    Log::write('更新单元格成功！');
                    insert_admin_log('更新单元格成功！');
                    return json_success("更新单元格成功！");
                } else {
                    Log::write('更新单元格失败！');
                    insert_admin_log('更新单元格失败！');
                    return json_error("更新单元格失败！");
                }
            }
        }
    }

    /**
     * 导入Excel
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\Json|\think\response\View
     * @throws \think\Exception
     * @throws \think\Db::name\exception\DataNotFoundException
     * @throws \think\Db::name\exception\ModelNotFoundException
     * @throws \think\exception\Db::nameException
     * @throws \think\exception\PDOException
     */
    public function import()
    {
        if (Request::isPost()) {
            $post = $this->request_param();
            $file_path = env('ROOT_PATH') . '/public' . $post['pic'];
            $info = importExecl($file_path);
            $info = array_splice($info, 1);
            $data = [];
            foreach ($info as $index => $datum) {
                $arr = [];
                $arr['name'] = $datum['A'];
                $arr['contacts'] = $datum['B'];
                $arr['phone'] = $datum['C'];
                $arr['email'] = $datum['D'];
                $arr['ip'] = $datum['E'];
                if (empty($arr['password'])) {
                    $data1 = AdminModel::setPwd('123456');
                    $arr['password'] = $data1['password'];
                    $arr['password_reset_token'] = $data1['token'];
                }
                $arr['sex'] = 1;
                $data[] = $arr;
            }
            $res = AdminModel::insertAll($data);
            if (!empty($res)) {
                Log::record('导入数据成功！');
                insert_admin_log('导入数据成功！');
                return json_success("导入数据成功！");
            } else {
                Log::record('导入数据失败！');
                insert_admin_log('导入数据失败！');
                return json_error("导入数据失败！");
            }
        }
        return view();
    }

    /**
     * 导出Excel
     * @throws \think\Db::name\exception\DataNotFoundException
     * @throws \think\Db::name\exception\ModelNotFoundException
     * @throws \think\exception\Db::nameException
     */
    public function outExcel()
    {
        $data = [
            'A1' => '用户名',
            'B1' => '姓名',
            'C1' => '手机号',
            'D1' => '邮件',
            'E1' => 'ip',
            'F1' => '办公电话',
        ];
        $info = Db::name('admin')->select();
        $i = 2;
        foreach ($info as $index => $item) {
            $data['A' . $i] = $item['name'];
            $data['B' . $i] = $item['contacts'];
            $data['C' . $i] = ' ' . $item['phone'];
            $data['D' . $i] = $item['email'];
            $data['E' . $i] = $item['ip'];
            $data['F' . $i] = $item['office_phone'];
            $i++;
        }
        exportExcel($data, '打卡机.xlsx', ['freezePane' => 'A2']);
    }

    public function mail()
    {
        $message = "<style>td {width:50%;}tr {height: 50px;border:1px dashed lightblue;;}</style>
                    <table border='1' style='border-collapse:collapse;border: lightblue solid 2px;text-align:center;'>
                        <tr><td>工资月份</td><td>9</td></tr>
                        <tr>    <td>入职时间</td><td>2019-5-10</td></tr>
                        <tr>    <td>姓名</td><td>张三</td></tr>
                        <tr>    <td>基本工资</td><td>6800</td></tr>
                        <tr>    <td>出勤天数</td><td>26</td></tr>
                        <tr>    <td>业绩考核</td><td>23</td></tr>
                        <tr>    <td>奖金</td><td></td></tr>
                        <tr>    <td>加班时间</td><td></td></tr>
                        <tr>    <td>薪资变动</td><td></td></tr>
                        <tr>    <td>请假天数</td><td></td></tr>
                        <tr>    <td>公休</td><td></td></tr>
                        <tr>    <td>迟到扣款</td><td></td></tr>
                        <tr>    <td>缺卡扣款</td><td></td></tr>
                        <tr>    <td>社保扣费</td><td></td></tr>
                        <tr>    <td>旷工</td><td></td></tr>
                        <tr>    <td>应发工资</td><td></td></tr>
                        <tr>    <td>个人所得税扣费</td><td></td></tr>
                        <tr>    <td>实发工资</td><td>6800</td></tr>
                    </table>";
        sendEmail('809414504@qq.com', '工资条', '上师大', $message);
    }
}
