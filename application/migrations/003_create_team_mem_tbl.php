<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_team_mem_tbl extends CI_Migration {

	/**
	 * Name of the table to be used in this migration!
	 *
	 * @var string
	 */
	protected $_table_name = "team_members";

	public function up()
	{
		$this->dbforge->add_field([
			'id' => [
				'type' => 'bigint',
				'unsigned' => true,
				'auto_increment' => true
			],
			'name' => [
				'type' => 'text',
			],
			'position' => [
				'type' => 'text'
			],
			'avatar' => [
				'type' => 'varchar',
				'constraint' => 255,
				'default' => base_url('assets/img/avatar/default.jpg')
			],
			'social' => [
				'type' => 'longtext',
				 'default' => '{"fb":"","insta":"","twitter":"","youtube":""}',
			],
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
	}

	public function down()
	{
		$this->dbforge->drop_table($this->_table_name, TRUE);
	}

}

?>