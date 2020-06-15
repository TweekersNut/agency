<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_portfolios extends CI_Migration {

	/**
	 * Name of the table to be used in this migration!
	 *
	 * @var string
	 */
	protected $_table_name = "portfolios";

	public function up()
	{
		$this->dbforge->add_field([
			'id' => [
				'type' => 'bigint',
				'unsigned' => true,
				'auto_increment' => true
			],
			'project_name' => [
				'type' => 'text',
			],
			'description' => [
				'type' => 'longtext'
			],
			'screenshots' => [
				'type' => 'longtext',
				'default' => '[]'
			],
			'problem' => [
				'type' => 'longtext',
			],
			'solution' => [
				'type' => 'longtext'
			],
			'tech_used' => [
				'type' => 'longtext',
				'default' => '[]'
			],
			'client' => [
				'type' => 'text'
			],
			'budget' => [
				'type' => 'bigint',
				'default' => 0
			],
			'category' => [
				'type' => 'bigint'
			],
			'date' => [
				'type' => 'date'
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