<?php

use think\migration\Migrator;
use think\migration\db\Column;

class AuthGroupAccess extends Migrator
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
        $table = $this->table('auth_group', array('engine' => 'InnoDB'));
        $table->addColumn('uid', 'integer', array('limit' => 11, 'default' => '', 'comment' => '用户id'))
            ->addColumn('group_id', 'integer', array('limit' => 11, 'default' => 0, 'comment' => '用户组id'))
            ->addIndex(array('uid'), array('unique' => true))
            ->addIndex(array('group_id'), array('unique' => true))
            ->create();
    }
}
