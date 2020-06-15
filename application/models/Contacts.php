<?php

class Contacts extends CI_Model {

	private $f_name  = null;
	private $l_name  = null;
    private $email = null;
    private $message = null;
    private $status = null;
    private $tblName = "app_". __CLASS__;

    public function getTblName(){
    	return $this->tblName;
    }

    public function setFirstName($f_name){
    	$this->f_name = $f_name;
    	return true;
    }

    public function getFirstName(){
    	return $this->f_name;
    }

    public function setLastName($l_name){
    	$this->l_name = $l_name;
    	return true;
    }

    public function getLastName(){
    	return $this->l_name;
    }

    public function setEmail($email){
    	$this->email = $email;
    	return true;
    }

    public function getEmail(){
    	return $this->email;
    }

    public function setMessage($msg){
    	$this->message = $msg;
    	return true;
    }

    public function getMessage(){
    	return $this->message;
    }

    public function setStatus($status){
    	$this->status = $status;
    	return true;
    }

    public function getStatus(){
    	return $this->status;
    }

    public function insert(){
    	$contactFormData = [
    		'f_name' => $this->getFirstName(),
    		'l_name' => $this->getLastName(),
    		'email' => $this->getEmail(),
    		'message' => $this->getMessage(),
    		'status' => $this->getStatus()
    	];

    	if($this->db->insert($this->tblName,$contactFormData)){
    		return $this->db->insert_id();
    	}
    	return false;
    }
}