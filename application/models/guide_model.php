<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guide_model extends CI_Model {
  
  public function get_guide($guide_id){
    //Gets all information needed to make a guide
    $data['guide_details'] = $this->get_guide_details($guide_id);
    $data['guide_content'] = $this->get_guide_content($guide_id);
    $data['guide_author'] = $this->get_guide_author($data['guide_details']['user_id']);
    $data['system_name'] = $this->get_system($data['guide_details']['system_id']);
    $data['similar_guides'] = $this->get_similar_guides($data['guide_details']['system_id']);

    return $data;
  }
  public function get_guide_details($guide_id){
    $guide_details = $this->db//possible modify for efficiency
        ->select('*')
        ->from('guide')
        ->where('guide_id',$guide_id)
        ->get()->row_array();
    return $guide_details;
  }
  public function get_guide_content($guide_id){
    $guide_content = $this->db//possible modify for efficiency
        ->select('*')
        ->from('guide_content')
        ->where('guide_id',$guide_id)
        ->get()->result_array();
    return $guide_content;
  }
  public function get_games_by_system($system_id){
    $games = $this->db//possible modify for efficiency
        ->select('*')
        ->from('game')
        ->where('system_id',$system_id)
        ->get()->result_array();
    return $games;
  }
  public function get_guides_by_game($game_id){
    $guides = $this->db//possible modify for efficiency
        ->select('*')
        ->from('guide')
        ->where('game_id',$game_id)
        ->get()->result_array();
    return $guides;
  }
  public function get_system($system_id){
    $guide_system = $this->db
        ->select('system_name')
        ->from('system')
        ->where('system_id',$system_id)
        ->get()->row_array();
    return $guide_system['system_name'];//seems like a hack would like to change
  }
  public function get_guide_author($user_id){
    $guide_author = $this->db//possible modify for efficiency
        ->select('*')
        ->from('user')
        ->where('user_id',$user_id)
        ->get()->row_array();
    return $guide_author;
  }
  public function set_game($new_game){
    $exists = $this->db
        ->from('system')
        ->where('system_id', $new_game['system_id'])
        ->count_all_results();
    if($exists == 1){
      return;
    }else{
      $this->db->insert('game', $new_game);
      return;
    }
  }
  public function set_system($new_system){
    $exists = $this->db
        ->from('system')
        ->where('system_id', $new_system['system_id'])
        ->count_all_results();
    if($exists == 1){
      return;
    } else {
      $this->db->insert('system', $new_system);
      return;
    }
  }
  public function create_guide($new_guide){
    $new_game = array(
      'game_id' => $new_guide['game_id'],
      'system_id' => $new_guide['system_id'],
      'game_name' => $new_guide['game_name']
      );
    $this->set_game($new_game);

    $new_system = array(
      'system_id' => $new_guide['system_id'],
      'system_name' => $new_guide['system_name']
      );
    $this->set_system($new_system);
    
    $new_index = array(
      'game_id' => $new_guide['game_id'],
      'system_id' => $new_guide['system_id'],
      'guide_name' => $new_guide['guide_name'],
      'user_id' => 1
      );
    $this->db->insert('guide', $new_index);
    $guide_id = $this->db->insert_id();

    $new_content = array_slice($new_guide,5);
    for($i=1;$i <= count($new_content)/2;$i++){
      $content_insert = array(
          'unique_id' => $i,
          'guide_id' => $guide_id,
          'content_title' => $new_content['content_title'. $i],
          'content' => $new_content['content'. $i]
        );
      $this->db->insert('guide_content', $content_insert);
    }
    return $guide_id;
  }
  public function get_similar_guides($system_id){
    $similar_guides = $this->db//possible modify for efficiency
        ->select('guide_id,guide_name')
        ->limit(5)
        ->from('guide')
        ->where('system_id', $system_id)
        ->get()->result_array();

    return $similar_guides;
  }
  public function get_guide_list_search(){
    $guide_list =  array(
      array(
        'guide_id'  => '1',
        'guide_name'  =>  'Supafun zurg rush strat',
        'game' => 'Starcraft 2',
        'image' =>  'http://lorempixel.com/output/abstract-q-c-40-40-1.jpg'
        ),
      array(
        'guide_id'  => '1',
        'guide_name'  =>  'Supafun zurg rush strat',
        'game' => 'Starcraft 2',
        'image' =>  'http://lorempixel.com/output/abstract-q-c-40-40-1.jpg'
        ),
      array(
        'guide_id'  => '1',
        'guide_name'  =>  'Supafun zurg rush strat',
        'game' => 'Starcraft 2',
        'image' =>  'http://lorempixel.com/output/abstract-q-c-40-40-1.jpg'
        ),
      array(
        'guide_id'  => '1',
        'guide_name'  =>  'Supafun zurg rush strat',
        'game' => 'Starcraft 2',
        'image' =>  'http://lorempixel.com/output/abstract-q-c-40-40-1.jpg'
        )
      );
    return $guide_list;
  }
}