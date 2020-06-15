<?php

class Settings {
	
	protected $ci = null;

	public $tbl = "app_settings";

	function __construct(){
		$this->ci =& get_instance();
	}

	public function get($key) {
		if($this->keyExists(strtoupper($key)) === true){
			$result = $this->ci->db->select('*')->where('_key',strtoupper($key))->get($this->tbl)->row();
			return $result->_val;
		}
		return 'N/A';
	}

	public function set($key,$val) {
		if($this->keyExists($key) === false){
			if($this->ci->db->insert($this->tbl,[
				'_key' => strtoupper($key),
				'_val' => $val
			])){
				return true;
			}
		}
		return false;
	}

	public function del($key){
		if($this->keyExists($key) === true){
			if($this->ci->db->where('_key', strtoupper($key))->delete($this->tbl)){
				return true;
			}
		}
		return false;
	}

	private function keyExists($key) {
		$result = $this->ci->db->select()->where('_key',strtoupper($key))->get($this->tbl);
		if($result->num_rows() > 0){
			return true;
		}
		return false;
	}

}