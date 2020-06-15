<?php

class Portfolio extends Frontend_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('Portfolios');
	}

	public function index(){
		$data['page_title'] = ucfirst(__CLASS__) ." | ". $this->settings->get('app_name');
		$data["links"] = '';
		/*$paginationConfig = array();
		$paginationConfig['base_url'] = base_url('portfolio/index');
		$paginationConfig['total_rows'] = count($this->Portfolios->getAll());
		$paginationConfig['per_page'] = $this->settings->get('pagination_perpage');
		$paginationConfig['uri_segment'] = 3;

		$paginationConfig['full_tag_open'] = "<ul class='pagination'>";
		$paginationConfig['full_tag_close'] ="</ul>";
		$paginationConfig['num_tag_open'] = "<li class='page-item'>";
		$paginationConfig['num_tag_close'] = '</li>';
		$paginationConfig['cur_tag_open'] = "<li class='page-item disabled'><li class='page-item active'><a class='page-link' href='#'>";
		$paginationConfig['cur_tag_close'] = "<span class='sr-only'>(current)</span></a></li>";
		$paginationConfig['next_tag_open'] = "<li class='page-item'>";
		$paginationConfig['next_tagl_close'] = "</li>";
		$paginationConfig['prev_tag_open'] = "<li class='page-item'>";
		$paginationConfig['prev_tagl_close'] = "</li>";
		$paginationConfig['first_tag_open'] = "<li class='page-item'>";
		$paginationConfig['first_tagl_close'] = "</li>";
		$paginationConfig['last_tag_open'] = "<li class='page-item'>";
		$paginationConfig['last_tagl_close'] = "</li>";
		$paginationConfig['attributes'] = array('class' => 'page-link');

		$this->pagination->initialize($paginationConfig);
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

		$data["links"] = $this->pagination->create_links();

		$data['portfolio_items'] = $this->Portfolios->getAll($paginationConfig['per_page'],$page); */
		$data['portfolio_items'] = $this->Portfolios->getAll();
		$data['portfolio_cat_items'] = $this->Portfolios->getAllCategories();
		
		$this->render_header($data);
		$this->render_menu($data);
		$this->load->view('portfolio/index',$data);
		$this->render_footer($data);
	}

	public function read(){
		$getProjectID = $this->uri->segment(3);
		
		$data['page_title'] = ucfirst(__CLASS__) ." | ".urldecode($this->uri->segment(4))." | ". $this->settings->get('app_name');
		
		$data['portfolio_item'] = $this->Portfolios->getSinglePortfolio($getProjectID); 
		
		$this->render_header($data);
		$this->render_menu($data);
		$this->load->view('portfolio/read',$data);
		$this->render_footer($data);	
	}

}