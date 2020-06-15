<?php
class About extends Frontend_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['page_title'] = ucfirst(__CLASS__) ." | ". $this->settings->get('app_name');

		$this->render_header($data);
		$this->render_menu($data);
		$this->load->view('about/index',$data);
		$this->render_footer($data);
	}
}