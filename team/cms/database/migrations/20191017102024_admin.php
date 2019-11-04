<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Admin extends Migrator
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table('admin', array('engine' => 'Innodb'));
        $table->addColumn('username', 'string', array('limit' => 15, 'default' => '', 'comment' => '用户名，登陆使用'))
            ->addColumn('password', 'string', array('limit' => 64, 'default' => '', 'comment' => '用户密码'))
            ->addColumn('salt', 'string', array('limit' => 64, 'default' =>'', 'comment' => '密码盐'))
            ->addColumn('contacts', 'string', array('limit' => 64, 'default' =>'', 'comment' => '昵称'))
            ->addColumn('phone', 'string', array('limit' => 11, 'default' =>'', 'comment' => '手机号'))
            ->addColumn('sex', 'integer', array('limit' => 2, 'default' =>'', 'comment' => '性别'))
            ->addColumn('office_phone', 'string', array('limit' => 64, 'default' =>'', 'comment' => '办公电话'))
            ->addColumn('email', 'string', array('limit' => 64, 'default' =>'', 'comment' => '邮件'))
            ->addColumn('file_name', 'string', array('limit' => 64, 'default' =>'', 'comment' => '上传文件名'))
            ->addColumn('pic', 'string', array('limit' => 64, 'default' =>'', 'comment' => '上传地址'))
            ->addColumn('province', 'string', array('limit' => 64, 'default' =>'', 'comment' => '省'))
            ->addColumn('city', 'string', array('limit' => 64, 'default' =>'', 'comment' => '市'))
            ->addColumn('county', 'string', array('limit' => 64, 'default' =>'', 'comment' => '区/县'))
            ->addColumn('town', 'string', array('limit' => 64, 'default' =>'', 'comment' => '乡'))
            ->addColumn('up_id', 'integer', array('limit' => 11, 'default' =>'', 'comment' => '上一级'))
            ->addColumn('role_id', 'integer', array('limit' => 11, 'default' =>'', 'comment' => '角色id'))
            ->addColumn('last_time', 'string', array('limit' => 20, 'default' => '', 'comment' => '上次登录时间'))
            ->addColumn('time', 'string', array('limit' => 20, 'default' => '', 'comment' => '登录时间'))
            ->addColumn('last_ip', 'integer', array('limit' => 11, 'default' => 0, 'comment' => '最后登录IP'))
            ->addColumn('ip', 'string', array('limit' => 64, 'default' => '', 'comment' => '登录IP'))
            ->addColumn('add_user', 'string', array('limit' => 11, 'default' => '', 'comment' => '操作员'))
            ->addColumn('is_delete', 'boolean', array('limit' => 1, 'default' => 0, 'comment' => '删除状态，1已删除'))
            ->addColumn('create_time', 'string', array('limit' => 20,'default' => 0, 'comme nt' => '创建时间'))
            ->addColumn('update_time', 'sting', array('limit' => 20,'default' => 0, 'comme nt' => '更新时间'))
            ->addIndex(array('username'), array('unique' => true))
            ->create();
    }
}
