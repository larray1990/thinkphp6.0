<?php

use think\migration\Migrator;
use think\migration\db\Column;

class AuthRule extends Migrator
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
        $table = $this->table('auth_rule', array('engine' => 'InnoDB'));
        $table->addColumn('pid', 'integer', array('limit' => 11, 'default' => 0, 'comment' => '上级id'))
            ->addColumn('level', 'integer', array('limit' => 11, 'default' => 0, 'comment' => '等级'))
            ->addColumn('sort', 'integer', array('limit' => 11, 'default' => 0, 'comment' => '排序'))
            ->addColumn('rule', 'text', array( 'default' => '', 'comment' => '规则唯一标识'))
            ->addColumn('name', 'string', array('limit' => 200, 'default' => '', 'comment' => '规则中文名称'))
            ->addColumn('icon', 'string', array('limit' => 200, 'default' => '', 'comment' => '图标'))
            ->addColumn('type', 'boolean', array('limit' => 1, 'default' => 1, 'comment' => ''))
            ->addColumn('status', 'boolean', array('limit' => 1, 'default' => 0, 'comment' => '状态 1可用0禁用'))
            ->addColumn('remarks', 'text', array( 'default' => '', 'comment' => '备注'))
            ->addColumn('add_user', 'string', array('limit' => 200, 'default' => '', 'comment' => '操作员'))
            ->addColumn('condition', 'string', array('limit' => 200, 'default' => '', 'comment' => '规则表达式，为空表示存在就验证，不为空表示按照条件验证'))
            ->addIndex(array('rule'), array('unique' => true))
            ->create();
    }
}
