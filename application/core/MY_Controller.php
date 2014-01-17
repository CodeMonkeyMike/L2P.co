<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

  public function __construct() {
    parent::__construct();
    
    //Set the default layout and set navbar/footer to partials
    $this->template->set_partial('navbar', 'partials/_navbar')->set_partial('footer', 'partials/_footer');

  }
}