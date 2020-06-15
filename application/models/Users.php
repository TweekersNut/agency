<?php

class Users extends CI_Model {

    public $tblName = 'users';

    function __construct() {
        parent::__construct();
    }

    public function data(string $user = null): ?array {
        if (!is_null($user)) {
            $this->db->select('*');
            $this->db->select("{$this->tblName}.id as id,{$this->tblName}.status as status,{$this->tblName}.created_at as created_at,{$this->tblName}.updated_at as updated_at");
            $this->db->select('users_role.id as roleID,users_role.name as roleName,users_role.status as roleStatus');
            if (is_numeric($user)) {
                //fetch by id
                $this->db->where($this->tblName . '.id', $user);
            } else if (sanitize($user, 'email')) {
                //fetch by email
                $this->db->where($this->tblName . '.email', $user);
            }
            $this->db->join('users_role', $this->tblName . '.role_id = users_role.id');
            $query = $this->db->get($this->tblName);
            return $query->row_array();
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