<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_post_comments extends CI_Migration {

	/**
	 * Name of the table to be used in this migration!
	 *
	 * @var string
	 */
	protected $_table_name = "post_comments";

	public function up()
	{
		$this->dbforge->add_field([
			'id' => [
				'type' => 'bigint',
				'unsigned' => true,
				'auto_increment' => true
			],
			'user_id' => [
				'type' => 'bigint',
				'default' => 0
			],
			'post_id' => [
				'type' => 'bigint',
				'default' => 0
			],
			'comment' => [
				'type' => 'longtext',
				'default' => ''
			],
			'status' => [
				'type' => 'char',
				'constraint' => 1,
				'default' => 0
			]
		]);

		$this->dbforge->add_field('id');
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