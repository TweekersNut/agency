<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_blog extends CI_Migration {

	/**
	 * Name of the table to be used in this migration!
	 *
	 * @var string
	 */
	protected $_table_name = "blog";

	public function up()
	{
		$this->dbforge->add_field([
			'id' => [
				'type' => 'bigint',
				'unsigned' => true,
				'auto_increment' => true
			],
			'title' => [
				'type' => 'text'
			],
			'blurb' => [
				'type' => 'varchar',
				'constraint' => 150
			],
			'content' => [
				'type' => 'longtext'
			],
			'avatar' => [
				'type' => 'varchar',
				'constraint' => 255,
			],
			'thumbnail' => [
				'type' => 'varchar',
				'constraint' => 255
			],
			'category' => [
				'type' => 'bigint'
			],
			'author' => [
				'type' => 'bigint'
			],
			'tags' => [
				'type' => 'varchar',
				'constraint' => 255
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