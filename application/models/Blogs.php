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

    public function relatedPosts($catID = null){
        if(!is_null($catID)){
            $query = $this->db
                    ->select('*')
                    ->from($this->tblName)
                    ->where('category',$catID)
                    ->limit(3)
                    ->order_by('id', 'desc')
                    ->get();
            return $query->result_array();
        }
        return null;
    }
    
    private function getAllPagination($limit, $start){
        $this->db->select('*')
				->from($this->tblName)
                ->where("status", 1)
                ->order_by('id', 'desc')
				->limit($limit, $start);
		$query = $this->db->get();
		return $query->result_array();
    }

    public function getAllByCategory($catID = 0){
        
        $this->db->select('*')
				->from($this->tblName)
                ->where("status", 1)
                ->where('category', $catID)
                ->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result_array();
    }

    public function getAllByCategoryPagination($catID = 0,$_limit = 0, $start = 0){
        
        $this->db->select('*')
				->from($this->tblName)
                ->where("status", 1)
                ->where('category', $catID)
                ->order_by('id', 'desc')
				->limit($_limit, $start);
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
                ->order_by('id', 'desc')
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