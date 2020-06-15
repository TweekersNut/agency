<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_users extends CI_Migration {

	/**
	 * Name of the table to be used in this migration!
	 *
	 * @var string
	 */
	protected $_table_name = "users";

	public function up()
	{
		$this->dbforge->add_field([
			'id' => [
				'type' => 'bigint',
				'unsigned' => true,
				'auto_increment' => true
			],
			'f_name' => array(
                'type' => 'TEXT'
            ),
            'l_name' => array(
                'type' => 'TEXT'
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => 100
            ),
            'phone' => array(
                'type' => 'VARCHAR',
                'constraint' => 16
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
            ),
            'username' => array(
                'type' => 'VARCHAR',
                'constraint' => 35,
                'unique' => true
            ),
            'avatar' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'default' => base_url('assets/img/avatar/default.png')
            ),
            'role_id' => array(
                'type' => 'INT',
                'default' => 0
            ),
            'last_login' => array(
                'type' => 'DATETIME'
            ),
            'last_login_ip' => array(
                'type' => 'VARCHAR',
                'constraint' => 15
            ),
            'account_key' => array(
                'type' => 'VARCHAR',
                'constraint' => 10
			),
			'bio' => array(
				'type' => 'VARCHAR',
				'constraint' => 255
			),
			'status' => [
				'type' => 'char',
				'constraint' => 1,
				'default' => 0
			]
		]);

		$this->dbforge->add_key('id',true);
		$this->dbforge->add_field("`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");
		$this->dbforge->add_field("`updated_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");
		$this->dbforge->create_table($this->_table_name, TRUE);
		
		$this->load->model('UsersRole', 'usersRoleModel');

		$defaultData = array(
            array(
                'f_name' => 'Admin',
                'l_name' => 'istrator',
                'email' => 'administrator@yopmail.com',
                'password' => encrypt("Qwerty@1234"),
                'username' => 'admin',
                'role_id' => $this->usersRoleModel->getSuperAdmin(),
                'last_login' => date("Y-m-d h:i:s"),
                'last_login_ip' => $this->input->ip_address(),
                'account_key' => generateAccountKey(),
                'status' => 1
            )
        );
        $this->db->insert_batch($this->_table_name, $defaultData);
	}

	public function down()
	{
		$this->dbforge->drop_table($this->_table_name, TRUE);
	}

}

?>