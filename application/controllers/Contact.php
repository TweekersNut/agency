<?php
class Contact extends Frontend_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('Contacts');
	}

	public function index(){
		/**
		* Meta/SEO Data.
		**/
		$data['page_title'] = ucfirst(__CLASS__) ." | ". $this->settings->get('app_name');

		/**
		* Page Data.
		**/

		$data['phones'] = json_decode($this->settings->get('contact_phones'),true);
		$data['mails'] = json_decode($this->settings->get('contact_mails'),true);
		$data['locations'] = json_decode($this->settings->get('contact_locations'),true);

		$this->render_header($data);
		$this->render_menu($data);
		$this->load->view('contact/index',$data);
		$this->render_footer($data);
	}

	/**
	**	Ajax Callable Functions.
	**/
	public function processFormRequest(){
		$responce = [];
		if($this->input->post('action') && $this->input->post('action') == 'submit_contact_qry'){
			$validations = [
				[
					'field' => 'f_name',
					'label' => 'First Name',
					'rules' => 'required|trim|min_length[3]|max_length[35]|alpha'
				],
				[
					'field' => 'l_name',
					'label' => 'Last Name',
					'rules' => 'trim|min_length[2]|max_length[35]|alpha'
				],
				[
					'field' => 'email',
					'label' => 'E-Mail',
					'rules' => 'required|valid_email|max_length[50]|is_unique['.$this->Contacts->getTblName().'.email]'
				],
				[
					'field' => 'message',
					'label' => 'Message',
					'rules' => 'required|min_length[10]|max_length[500]'
				]
			];
			$this->form_validation->set_rules($validations);
			if($this->form_validation->run() === false){
				$responce = ['status' => 0, 'msg' => [$this->form_validation->error_array()]];
			}else{
				$this->Contacts->setFirstName($this->input->post('f_name'));
				$this->Contacts->setLastName($this->input->post('l_name'));
				$this->Contacts->setEmail($this->input->post('email'));
				$this->Contacts->setMessage($this->input->post('message'));
				$this->Contacts->setStatus(1);

				$queryID = $this->Contacts->insert();

				if(!is_null($queryID) && is_numeric($queryID)){
					$responce = ['status' => 1, 'msg' => $this->lang->line('success_contact_qry')];
				}else{
					$responce = ['status' => 0, 'msg' => $this->lang->line('err_contact_qry')];
				}
			}
		}else{
			$responce = ['status' => 0, 'msg' => $this->lang->line('invalid_req')];
		}
		echo json_encode($responce);
		return;
	}

}