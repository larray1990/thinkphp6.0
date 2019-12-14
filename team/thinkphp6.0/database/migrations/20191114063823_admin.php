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
        $table = $this->table('admin', array('engine' => 'InnoDB'));
        $table->addColumn('username', 'string', array('limit' => 50, 'default' => '', 'comment' => '用户名，登陆使用'))
            ->addColumn('password', 'string', array('limit' => 32, 'default' => '', 'comment' => '用户密码'))
            ->addColumn('password_reset_token', 'string', array('limit' => 32, 'default' => '', 'comment' => '秘钥'))
            ->addColumn('fullname', 'string', array('limit' => 50, 'default' => '', 'comment' => '姓名'))
            ->addColumn('phone', 'string', array('limit' => 50, 'default' => '', 'comment' => '手机号'))
            ->addColumn('access_token', 'string', array('limit' => 32, 'default' => '', 'comment' => 'token'))
            ->addColumn('email', 'string', array('limit' => 32, 'default' => '', 'comment' => '邮箱'))
            ->addColumn('sex', 'integer', array('limit' => 5, 'default' => '', 'comment' => '性别 1：男  2：女'))
            ->addColumn('file_name', 'string', array('limit' => 200, 'default' => '', 'comment' => '文件名'))
            ->addColumn('pic', 'string', array('limit' => 200, 'default' => '', 'comment' => '文件名路径'))
            ->addColumn('province', 'integer', array('limit' => 11, 'default' => '', 'comment' => '省'))
            ->addColumn('city', 'integer', array('limit' => 11, 'default' => '', 'comment' => '市'))
            ->addColumn('county', 'integer', array('limit' => 11, 'default' => '', 'comment' => '县'))
            ->addColumn('town', 'integer', array('limit' => 11, 'default' => '', 'comment' => '乡'))
            ->addColumn('login_times', 'integer', array('limit' => 10, 'default' => 0, 'comment' => '登陆次数'))
            ->addColumn('login_ip', 'string', array('limit' => 20, 'default' => 0, 'comment' => 'IP地址'))
            ->addColumn('login_time', 'datetime', array('default' => 0, ' comment' => '登陆时间'))
            ->addColumn('last_login_ip', 'string', array('limit' => 20, 'default' => 0, 'comment' => '最后登录IP'))
            ->addColumn('last_login_time', 'datetime', array('default' => 0, 'comment' => '最后登录时间'))
            ->addColumn('user_agent', 'string', array('limit' => 200, 'default' => '', 'comment' => 'user_agent'))
            ->addColumn('is_admin', 'boolean', array('limit' => 1, 'default' => 0, 'comment' => '是否管理员 1是0否'))
            ->addColumn('status', 'boolean', array('limit' => 1, 'default' => 0, 'comment' => '状态 1可用0禁用'))
            ->addColumn('remarks', 'text', array( 'default' => '', 'comment' => '备注'))
            ->addColumn('add_user', 'string', array('limit' => 200, 'default' => '', 'comment' => '操作员'))
            ->addColumn('is_delete', 'boolean', array('limit' => 1, 'default' => 0, 'c omment' => '删除状态，1已删除'))
            ->addIndex(array('username'), array('unique' => true))
            ->create();
    }
}
