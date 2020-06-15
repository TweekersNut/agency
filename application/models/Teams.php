<?php
class Teams extends CI_Model {

	private $name  = null;
	private $position  = null;
    private $social = null;
    private $status = null;
    private $tblName = "app_team_members";

    public function setName($name){
    	$this->name = $name;
    	return true;
    }

    public function getName(){
    	return $this->name;
    }

    public function setPosition($position){
    	$this->position = $position;
    	return true;
    }

    public function getPosition(){
    	return $this->position;
    }

    public function setSocial($links = []){
    	$this->social = json_encode($links);
    	return true;
    }

    public function getSocial(){
    	return json_decode($this->social,true);
    }

    public function setStatus($status){
    	$this->status = $status;
    	return true;
    }

    public function getStatus(){
    	return $this->status;
    }

    public function getAll(){
    	return $this->db->select('*')->where('status <>',0)->get($this->tblName)->result();
    }
}