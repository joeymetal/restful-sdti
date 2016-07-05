<?php

use Phinx\Migration\AbstractMigration;

class Users extends AbstractMigration
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
     *  ->addIndex(array('username'), array('unique' => true, 'name' => 'idx_users_username'))
     * 
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {   
        // create the table
        #$table = $this->table('users' , ['engine' => 'MyISAM'];
        
        $users = $this->table('users', ['engine' => 'MyISAM']);
        $users->addColumn('username', 'string', array('limit' => 20))
              ->addColumn('password', 'string', array('limit' => 100))
              ->addColumn('password_salt', 'string', array('limit' => 40))
              ->addColumn('email', 'string', array('limit' => 100))
              ->addColumn('first_name', 'string', array('limit' => 30))
              ->addColumn('last_name', 'string', array('limit' => 30))
              ->addColumn('apikey', 'string', array('limit' => 40))
              ->addColumn('token', 'string', array('limit' => 40))
              ->addColumn('token_expire', 'datetime')
              ->addColumn('last_ip', 'string', array('limit' => 40))
              ->addColumn('last_login', 'datetime')
              ->addColumn('created', 'datetime')
              ->addColumn('updated', 'datetime', array('null' => true))
              ->addIndex(array('username', 'email'), array('unique' => true))
              ->save();
              
        // $table->addColumn('username', 'string')
        //       ->addColumn('password', 'string')
        //       ->addColumn('name', 'string')
        //       ->addColumn('apikey', 'string')
        //       ->addColumn('token', 'char')
        //       ->addColumn('token_expire', 'datetime')
        //       ->addColumn('created', 'datetime')
        //       ->addColumn('updated', 'datetime')
        //       ->addIndex(array('username', 'email'), array('unique' => true))
        //       ->create();
    }
}
