<?php

class Testimonials extends CI_Model {

    var $tblName = 'testimonials';

    function __construct() {
        parent::__construct();
    }

    /* ***********************************************************************
     * CRUD FUNCTIONS START
     * ******************************************************************** */

    public function getAll(){
        $query = $this->db->
                            select('*')
                            ->from($this->tblName)
                            ->where('status',1)
                            ->order_by('id', 'desc')
                            ->get();
        return $query->result_array();
    }

    public function add(array $data = array()): ?int {
        if (count($data) > 0 && !empty($data)) {
            if ($this->db->insert($this->tblName, $data)) {
                return $this->db->insert_id();
            }
        }
        return null;
    }

    public function update(int $id = null, array $fields = array()): bool {
        if (!is_null($id)) {
            if (count($fields) > 0 && !empty($fields)) {
                $this->db->set($fields);
                $this->db->where('id', $id);
                if ($this->db->update($this->tblName)) {
                    return true;
                }
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