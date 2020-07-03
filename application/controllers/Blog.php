<?php
class Blog extends Frontend_Controller {

	function __construct(){
		parent::__construct();

		
    }
    
    public function index(){
        /**
		* Meta/SEO Data.
		**/
        $data['page_title'] = ucfirst(__CLASS__) ." | ". $this->settings->get('app_name');
        
		$paginationConfig = array();
		$paginationConfig['base_url'] = base_url('blog/index');
		$paginationConfig['total_rows'] = count($this->blogModel->getAll());
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

		$data['blog_posts'] = $this->blogModel->getAll($paginationConfig['per_page'],$page); 

		$this->render_header($data);
		$this->render_menu($data);
		$this->load->view('blog/index',$data);
		$this->render_footer($data);
    }

    public function read(){
        $id = $this->uri->segment(3);
        if(is_numeric($id)){
            $data['post_data'] = $this->blogModel->get($this->uri->segment(3));
			$data['blog_categories'] = $this->blogCategoriesModel->getAll();
			$data['blog_post_comments'] = $this->blogCommentsModel->get_by_post($this->uri->segment(3));

            $this->render_header($data);
            $this->render_menu($data);
            $this->load->view('blog/read',$data);
            $this->render_footer($data);

        }else{
            show_404();
        }
	}
	
	/**
	 * Ajax Functions
	 */
	
	 public function processPostComment(){
		$resp = array();
        if($this->input->is_ajax_request()){
			$resp = ['status' => 1, 'msg' => 'got request'];
		}else{
			$resp = ['status' => 0, 'msg' => 'Invalid request. Please try again.'];
		}
		echo json_encode($resp);
        return;
	 }
    
}
