<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_settings_tbl extends CI_Migration {

	/**
	 * Name of the table to be used in this migration!
	 *
	 * @var string
	 */
	protected $_table_name = "settings";

	public function up()
	{
		$this->dbforge->add_field([
			'id' => [
				'type' => 'bigint',
				'unsigned' => true,
				'auto_increment' => true
			],
			'_key' => [
				'type' => 'varchar',
				'constraint' => 255
			],
			'_val' => [
				'type' => 'longtext'
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

		$defaultValues = "INSERT INTO `app_".$this->_table_name."` (`_key`, `_val`, `status`, `created_at`, `updated_at`) VALUES 
							('APP_NAME', 'Agency', '1', current_timestamp(), current_timestamp()); ";
		$this->db->query($defaultValues);
	}

	public function down()
	{
		$this->dbforge->drop_table($this->_table_name, TRUE);
	}

}

?>