<?php

class BlogComments extends CI_Model{
    
    var $tblName = 'post_comments';

    function __construct() {
        parent::__construct();
    }

    public function get_by_post($postID = null){
        if(!is_null($postID)){
            $query = $this->db
                    ->select('*')
                    ->where('status <> 0')
                    ->where('post_id', $postID)
                    ->get($this->tblName);
            return $query->result_array();
        }
        return null;
    }

    /* *************************************************************************
     * CRUD FUNCTIONS START
     * ******************************************************************** */

    public function getAll(): array {
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