<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Role extends Migrator
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
        $table = $this->table('role', array('engine' => 'Innodb'));
        $table->addColumn('up_id', 'integer', array('limit' => 11, 'default' =>'', 'comment' => '上一级'))
            ->addColumn('show_order', 'integer', array('limit' => 11, 'default' =>'', 'comment' => '排序'))
            ->addColumn('permis_ids', 'text', array('limit' => 0, 'default' => '', 'comment' => '权限id集合'))
            ->addColumn('ac_path', 'text', array('limit' => 0, 'default' => '', 'comment' => '方法路径'))
            ->addColumn('ac_menu', 'text', array('limit' => 0, 'default' => '', 'comment' => '菜单路径'))
            ->addColumn('add_user', 'string', array('limit' => 11, 'default' => '', 'comment' => '操作员'))
            ->addColumn('create_time', 'string', array('limit' => 20,'default' => 0, 'comme nt' => '创建时间'))
            ->addColumn('update_time', 'sting', array('limit' => 20,'default' => 0, 'comme nt' => '更新时间'))
            ->create();
    }
}
