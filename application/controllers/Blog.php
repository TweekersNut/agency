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

			
			$data['page_title'] = ucfirst(__METHOD__) ." | ". $data['post_data']['title'] ." | ". $this->settings->get('app_name');

            $this->render_header($data);
            $this->render_menu($data);
            $this->load->view('blog/read',$data);
            $this->render_footer($data);

        }else{
            show_404();
        }
	}

	public function category(){
		$id = $this->uri->segment(3);
		if(is_numeric($id)){
			$data['page_title'] = ucfirst(__CLASS__) ." | ". $this->settings->get('app_name');
        
			$paginationConfig = array();
			$paginationConfig['base_url'] = base_url('blog/category/'. $id . '/'. $this->uri->segment(4));
			$paginationConfig['total_rows'] = count($this->blogModel->getAllByCategory($id));
			$paginationConfig['per_page'] = $this->settings->get('pagination_perpage');
			$paginationConfig['uri_segment'] = 5;

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
			$page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;

			$data["links"] = $this->pagination->create_links();
			
			$data['blog_posts'] = $this->blogModel->getAllByCategoryPagination($id,$paginationConfig['per_page'],$page); 

			$this->render_header($data);
			$this->render_menu($data);
			$this->load->view('blog/index',$data);
			$this->render_footer($data);

		}else{
			show_404();
		}
	}

	public function search(){
		$string = $this->uri->segment(3);
		if(!is_null($string) && urldecode($string)){

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
			$validations = array(
                array(
                    'field' => 'name',
                    'label' => 'Name',
                    'rules' => 'required|min_length[4]|max_length[35]',
                ),
            
                array(
                    'field' => 'email',
                    'label' => 'E-Mail',
                    'rules' => 'required|valid_email',
                ),
                array(
                    'field' => 'comment',
                    'label' => 'Post Comment',
                    'rules' => 'required|trim|min_length[10]|max_length[500]',
                )
			);
			$this->form_validation->set_rules($validations);
            if ($this->form_validation->run() == false) {
                $resp = array('status' => 0, 'msg' => [$this->form_validation->error_array()]);
            } else {
				if($this->input->post('user_id') == 0){
					if($this->blogCommentsModel->add([
						'user_id' => $this->input->post('user_id'),
						'post_id' => $this->input->post('post_id'),
						'comment' => $this->input->post('comment', true),
						'status' => ($this->settings->get('blog_comment_moderation') == 1) ? 0 : 1,
						'name' => $this->input->post('name'),
						'email' => $this->input->post('email'),
						'ip' => $this->input->ip_address()
					])){
						$resp = ['status' => 1, 'msg' => 'Comment Posted.'];
					}else{
						$resp = ['status' => 0, 'msg' => 'Something went wrong while posting comment. Please try again later.'];
					}
				}else{
					if($this->blogCommentsModel->add([
						'user_id' => $this->input->post('user_id'),
						'post_id' => $this->input->post('post_id'),
						'comment' => $this->input->post('comment',true),
						'status' => ($this->settings->get('blog_comment_moderation') == 1) ? 0 : 1,
					])){
						$resp = ['status' => 1, 'msg' => 'Comment Posted.'];
					}else{
						$resp = ['status' => 0, 'msg' => 'Something went wrong while posting comment. Please try again later.'];
					}
				}
			}
		}else{
			$resp = ['status' => 0, 'msg' => 'Invalid request. Please try again.'];
		}
		echo json_encode($resp);
        return;
	 }
    
}
