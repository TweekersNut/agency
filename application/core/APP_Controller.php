<?php

class APP_Controller extends CI_Controller  {

        public function __construct(){
				parent::__construct();
				
				$this->load->helper('string');
				$this->load->helper('app');

				$this->load->model('Users','usersModel');
				$this->load->model('Blogs','blogModel');
				$this->load->model('BlogCategories','blogCategoriesModel');
				$this->load->model('BlogComments','blogCommentsModel');
				$this->load->model('Newsletters', 'newsletterModel');
				$this->load->model('Testimonials','testimonialsModel');
        }
}

class Frontend_Controller extends APP_Controller{

	public function __construct(){
		parent::__construct();

		//Header settings.
		$this->settings->set('app_author','TweekersNut Network');
		$this->settings->set('app_description','Replace app description here.');
		$this->settings->set('app_keywords', 'replace,keywords,here');
		$this->settings->set('app_type','company');
		$this->settings->set('pagination_perpage', '10');
		//Contact Page settings.
		$this->settings->set('contact_mails', '["abc@yopmail.com","fear@yopmail.com"]');
		$this->settings->set('contact_phones','["+919878","+919988"]');
		//footer settings.
		$this->settings->set('app_copyright','&copy; TweekersNut Network');

		$this->load->library("pagination");
	}

	public function render_header($data = []){
		$this->load->view('includes/header',$data);
	}


	public function render_menu($data = []){
		$this->load->view('includes/menu',$data);	
	}

	public function render_footer($data = []){
		$data['copyrights'] = $this->settings->get('app_copyright');
		$this->load->view('includes/footer',$data);
	}

}

class Admin_Controller extends APP_Controller{

	public function __construct(){
		parent::__construct();
	}

}