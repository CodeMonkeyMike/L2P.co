<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends MY_Controller {

  public function __construct() {
    parent::__construct();
    
    $this->load->model('Guide_model');
    $this->load->model('Account_model');
  }
  public function index(){
    $data['account_feed'] = $this->Account_model->get_account_feed();
    $data['guide_author'] = $this->Guide_model->get_guide_author();

    $this->template->title('Account page!')->build('account/account_view', $data);
  }
  public function signup(){
    if($this->input->post()){
      $result = json_encode($this->Account_model->create_user($this->input->post()));
      //Sends data back to the ajax post
      die($result);
    }else{
      redirect('/');
    }
  }
  public function login(){
    if($this->input->post()){
      $result = json_encode($this->Account_model->login_user($this->input->post()));
      //Sends data back to the ajax post
      die($result);
    }else{
      redirect('/');
    }
  }
  public function logout(){
    $this->session->sess_destroy();
  }
}