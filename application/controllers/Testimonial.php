<?php

class Testimonial extends Frontend_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('Testimonials');
	}

	public function index(){
		echo "Render all testimonials";
	}
}