<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_users_role extends CI_Migration {

	/**
	 * Name of the table to be used in this migration!
	 *
	 * @var string
	 */
	protected $_table_name = "users_role";

	public function up()
	{
		$this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ),
            'name' => array(
                'type' => 'TEXT'
            ),
            'def' => array(
                'type' => 'CHAR',
                'constraint' => 1,
                'default' => 0
            ),
            'status' => array(
                'type' => 'CHAR',
                'constraint' => 1,
                'default' => 1
            )
		));
		
		$this->dbforge->add_key('id',true);
		$this->dbforge->add_field("`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");
		$this->dbforge->add_field("`updated_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");
		$this->dbforge->create_table($this->_table_name, TRUE);

		$defaultData = array(
            array(
                'name' => 'Administrator',
                'def' => 0
			),
			array(
				'name' => 'User',
				'def' => 1
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