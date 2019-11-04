<?php
/**
 * 管理员操作记录
 * @param string $action
 * @param string $sql
 * @param string $name
 * @param string $id
 * @param string $bz
 */
function adminLog($action='',$sql='',$name='',$id='',$bz=''){
    /*构造基本数据*/
    $data['sql_cont'] = $sql;
    if ($id != '') {
        $data['admin_id'] = $id;
    }else{
        $data['admin_id'] = session('admin_id');
    }
    if ($name != '') {
        $data['name'] = $name;
    }else{
        $data['name'] = session('admin_name');
    }
    $data['create_time'] = date('Y-m-d H:i:s');
    $data['ip'] = request()->ip();
    $data['action'] = $action;
    $data['remarks'] = $bz;
    $data['update_time'] = date('Y-m-d H:i:s');
    /*构造sql级别*/
    $data['db_level'] = '0';
    if(stristr($data['sql_cont'],'insert')) $data['db_level']='1';
    if(stristr($data['sql_cont'],'delete')) $data['db_level']='2';
    if(stristr($data['sql_cont'],'update')) $data['db_level']='3';
    if(stristr($data['sql_cont'],'select')) $data['db_level']='4';
    /*插入数据*/
    db('admin_log')->insert($data);
}