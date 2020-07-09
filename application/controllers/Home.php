<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Frontend_Controller {

	
	function __construct(){
		parent::__construct();

		/**
		** Load Models
		**/
		$this->load->model('Portfolios');
	}

	public function index(){

		$data['recent_portfolio_items'] = $this->Portfolios->getRecentPortfolio();
		$data['blog_posts'] = $this->blogModel->getLatestPosts();
		$data['testimonials'] = $this->testimonialsModel->getAll();

		$this->render_header($data);
		$this->render_menu($data);
		$this->load->view('home/index',$data);
		$this->render_footer($data);
	}
}
