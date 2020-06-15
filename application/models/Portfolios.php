<?php

class Portfolios extends CI_Model {

	private $tblName = "app_portfolios";
	private $tblTech = "app_portfolios_techused";
	private $tblCat = "app_portfolio_categories";
	
	function __construct(){
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
	
	private function getAll(){
		$this->db->select('*')
				->select($this->tblName . ".id as id")
				->select($this->tblCat . ".name as catName")
				->select($this->tblCat . ".id as catID")
				->select($this->tblCat . ".status as catStatus")
				->from($this->tblName)
				->join($this->tblCat, "{$this->tblCat}.id = {$this->tblName}.category")
				->where("{$this->tblName}.status", 1);
		$query = $this->db->get();
		return $query->result();
	}

	public function getAllCategories(){
		$this->db->select('*')
				->from($this->tblCat)
				->where('status',1);
		$query = $this->db->get();
		return $query->result();
	}

	public function getSinglePortfolio($projectName = null){
		if(is_numeric($projectName)){
			$project = urldecode($projectName);

			$this->db->select('*')
				->select($this->tblName . ".id as id")
				->select($this->tblCat . ".name as catName")
				->select($this->tblCat . ".id as catID")
				->select($this->tblCat . ".status as catStatus")
				->from($this->tblName)
				->join($this->tblCat, "{$this->tblCat}.id = {$this->tblName}.category")
				->where("{$this->tblName}.status", 1)
				->where("{$this->tblName}.id",$project);
			$query = $this->db->get();
			return $query->row();

		}
		return false;
	}

	public function getRecentPortfolio($count = 5){
		$this->db->select('*')
				->select($this->tblName . ".id as id")
				->select($this->tblCat . ".name as catName")
				->select($this->tblCat . ".id as catID")
				->select($this->tblCat . ".status as catStatus")
				->from($this->tblName)
				->join($this->tblCat, "{$this->tblCat}.id = {$this->tblName}.category")
				->where("{$this->tblName}.status", 1)
				->order_by("{$this->tblName}.id",'desc')
				->limit($count);
		$query = $this->db->get();
		return $query->result();
	}

	private function getAllPagination($limit, $start){
        $this->db->select('*')
				->select($this->tblName . ".id as id")
				->select($this->tblCat . ".name as catName")
				->select($this->tblCat . ".id as catID")
				->select($this->tblCat . ".status as catStatus")
				->from($this->tblName)
				->join($this->tblCat, "{$this->tblCat}.id = {$this->tblName}.category")
				->where("{$this->tblName}.status", 1)
				->limit($limit, $start);
		$query = $this->db->get();
		return $query->result();
    }

}