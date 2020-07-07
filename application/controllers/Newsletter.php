<?php 
class Newsletter extends Frontend_Controller {

	function __construct(){
		parent::__construct();
    }

    public function subscribe(){
        echo "Render newsletters subscribe view.";
    }

    public function unsubscribe(){
        echo "Render unsubscribe view.";
    }

 
    /********************************************************
     * AJAX FUNCTIONS
     ********************************************************/

     public function processSubscribe(){
        $resp = array();
        if($this->input->is_ajax_request()){
            $validations = array(
                array(
                    'field' => 'email',
                    'label' => 'E-Mail',
                    'rules' => 'required|valid_email|is_unique[newsletters.email]',
                ),
            );
            $this->form_validation->set_rules($validations);
            if ($this->form_validation->run() == false) {
                $resp = array('status' => 0, 'msg' => [$this->form_validation->error_array()]);
            } else {
                if($this->newsletterModel->add([
                    'email' => $this->input->post('email'),
                    'ip' => $this->input->ip_address(),
                    'status' => 1
                ])){
                    $resp = ['status' => 1, 'msg' => 'You have taken part in newsletters.'];
                }else{
                    $resp = ['status' => 0, 'msg' => 'Something went wrong while processing request. Please try again later.'];
                }
            }
        }
        echo json_encode($resp);
        exit();
     }

     public function processUnsubscribe(){
        $resp = array();
        if($this->input->is_ajax_request()){
            if($this->newsletterModel->update($this->input->post('id'),[
                'status' => 0
            ])){
                $resp = ['status' => 1, 'msg' => 'You have succesfully un-subscribed from newsletters.'];
            }else{
                $resp = ['status' => 0, 'msg' => 'Something went wrong while processing request. Please try again later.'];
            }
        }
        echo json_encode($resp);
        exit();
     }
    
}