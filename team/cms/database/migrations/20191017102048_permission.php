<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Permission extends Migrator
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
        $table = $this->table('permission', array('engine' => 'Innodb'));
        $table->addColumn('name', 'string', array('limit' => 100, 'default' => '', 'comment' => '权限名称'))
            ->addColumn('up_id', 'integer', array('limit' => 11, 'default' =>'', 'comment' => '上一级'))
            ->addColumn('show_order', 'integer', array('limit' => 11, 'default' =>'', 'comment' => '排序'))
            ->addColumn('con_name', 'string', array('limit' => 128, 'default' => '', 'comment' => '控制器名称'))
            ->addColumn('fun_name', 'string', array('limit' => 128, 'default' => '', 'comment' => '方法名称'))
            ->addColumn('ca_path', 'string', array('limit' => 128, 'default' => '', 'comment' => '全路径名称'))
            ->addColumn('icon', 'string', array('limit' => 128, 'default' => '', 'comment' => '图标'))
            ->addColumn('add_user', 'string', array('limit' => 11, 'default' => '', 'comment' => '操作员'))
            ->addColumn('create_time', 'string', array('limit' => 20,'default' => 0, 'comme nt' => '创建时间'))
            ->addColumn('update_time', 'sting', array('limit' => 20,'default' => 0, 'comme nt' => '更新时间'))
            ->addIndex(array('name'), array('unique' => true))
            ->create();
    }
}
