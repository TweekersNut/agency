<?php

class Team extends Frontend_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('Teams');
	}

	public function index(){
		$data['page_title'] = ucfirst(__CLASS__) ." | ". $this->settings->get('app_name');
		
		$data['team_members'] = $this->Teams->getAll();

		$this->render_header($data);
		$this->render_menu($data);
		$this->load->view('team/index',$data);
		$this->render_footer($data);
	}
}