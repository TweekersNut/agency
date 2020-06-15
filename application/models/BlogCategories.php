<?php

class BlogCategories extends CI_Model {

    var $tblName = 'blog_categories';

    function __construct() {
        parent::__construct();
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