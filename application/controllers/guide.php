<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guide extends MY_Controller {

  public function __construct() {
    parent::__construct();
    
    $this->load->model('Guide_model');
  }
  public function index($guide_id, $guide_name){
    if($guide_id){
      //Gets all info needed to make a guide
      $data = $this->Guide_model->get_guide($guide_id);

      $this->template->title('Guides Page!')->build('guide/guide_view', $data);
    }else{
      redirect('/');
    }
  }
  public function create_guide(){
    $this->template->set('js_files', array('tiny_mce/tiny_mce.js','default.js','create-guide.js','submit-guide.js'));

    if($this->input->post()){
      //Create new guide
      $new_guide = $this->input->post();
      $guide_id = $this->Guide_model->create_guide($new_guide);

      //View the new guide
      redirect('/guide/'. $guide_id .'/'. url_title($new_guide['guide_name']));
    }
    $this->template->title('Create Guides Page!')->build('guide/create_guide_view');
  }
  public function find_guide(){
    $data['guide_list'] = $this->Guide_model->get_guide_list_search();

    $this->template->title('Find Guides Page!')->build('guide/find_guide_view', $data);
  }
  public function game_by_system($system_id, $system_name){
    $this->template->set('js_files', array('game-by-system.js'));

    $data['games'] = $this->Guide_model->get_games_by_system($system_id);

    $this->template->title('Guide By System Page!')->build('guide/game_by_system_view', $data);
  }
  public function ajax_get_guides(){
    if($this->input->post()){
      $game_id = $this->input->post();
      $result = json_encode($this->Guide_model->get_guides_by_game($game_id['game_id']));
      //Sends data back to the ajax post
      die($result);
    }
  }
}