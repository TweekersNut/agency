<?php

class Blogs extends CI_Model {

    var $tblName = 'blog';

    function __construct() {
        parent::__construct();
    }

    public function __call($name, $arguments) { 
		if($name == 'getAll') {
			switch(count($arguments)){
				case 2:
					return	$this->getAllPagination($arguments[0],$arguments[1]);
				break;
				case 0:
					return  $this->getAll();
				break;
			}	
		}
    } 

    public function get($id = null){
        if(!is_null($id)){
            $this->db->select('*')
                    ->join('blog_categories', ''.$this->tblName.'.category = blog_categories.id')
                    ->from($this->tblName)
                    ->where("{$this->tblName}.id", $id);
            $query = $this->db->get();
		    return $query->row_array();
        }
        return null;
    }

    public function getLatestPosts(){
        $this->db->select('*')
                ->from($this->tblName)
				->where('status', 1)
                ->order_by('id', 'desc')
                ->limit(3,0);

        $query = $this->db->get();
        return $query->result_array();
    }
    
    private function getAllPagination($limit, $start){
        $this->db->select('*')
				->from($this->tblName)
				->where("status", 1)
				->limit($limit, $start);
		$query = $this->db->get();
		return $query->result_array();
    }

    /* *************************************************************************
     * CRUD FUNCTIONS START
     * ******************************************************************** */

    private function getAll(): array {
        $query = $this->db
                ->select('*')
                ->where('status <>', 0)
                ->get($this->tblName);
        return $query->result_array();
    }

    public function add(array $data = array()): ?int {
        if (count($data) > 0 && !empty($data)) {
            if ($this->db->insert($this->tblName, $data)) {
                return $this->db->insert_id();
            }
        }
        return false;
    }

    public function update(int $id = null, array $data = array()): bool {
        if (count($data) > 0 && !empty($data)) {
            $this->db->set($data);
            $this->db->where('id', $id);
            if ($this->db->update($this->tblName)) {
                return true;
            }
        }
        return false;
    }

    public function remove(int $id = null): bool {
        if (!is_null($id) && is_numeric($id)) {
            $this->db->where('id', $id);
            if ($this->db->delete($this->tblName)) {
                return true;
            }
        }
        return false;
    }

    public function flushAll(): bool {
        if ($this->db->empty_table($this->tblName)) {
            return true;
        }
        return false;
    }

    /* *********************************************************************
     * CRUD FUNCTIONS END
     * ******************************************************************** */

}