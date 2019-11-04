<?php

use think\migration\Migrator;
use think\migration\db\Column;

class AdminLog extends Migrator
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
        $table = $this->table('admin_log', array('engine' => 'Innodb'));
        $table->addColumn('name', 'string', array('limit' => 15, 'default' => '', 'comment' => '操作人'))
            ->addColumn('admin_id', 'integer', array('limit' => 11, 'default' =>'', 'comment' => '用户id'))
            ->addColumn('ip', 'string', array('limit' => 64, 'default' =>'', 'comment' => 'ip'))
            ->addColumn('action', 'string', array('limit' => 120, 'default' => '', 'comment' => '操作名称'))
            ->addColumn('sql_cont', 'text', array('limit' => 0, 'default' => '', 'comment' => 'sql内容'))
            ->addColumn('db_level', 'integer', array('limit' => 10, 'default' => '', 'comment' => '数据等级'))
            ->addColumn('create_time', 'string', array('limit' => 20,'default' => 0, 'comme nt' => '创建时间'))
            ->addColumn('update_time', 'sting', array('limit' => 20,'default' => 0, 'comme nt' => '更新时间'))
            ->create();
    }
}
