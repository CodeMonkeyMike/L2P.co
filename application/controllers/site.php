<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends MY_Controller {

  public function __construct() {
    parent::__construct();
    
    $this->load->model('Site_model');
  }
  public function index(){
    $data['top_list'] = $this->Site_model->get_top_list();
    $data['twitter_feed'] = $this->Site_model->get_twitter_feed();

    $this->template->set('js_files', array('home.js','feed-api.js'));

    $this->template->title('Site Page!')->build('site/site_view', $data);
  }
  public function test(){
    $this->template->title('Test Page!')->build('site/test_view');
  }
}