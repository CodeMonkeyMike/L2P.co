<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account_model extends CI_Model {

  public function create_user($new_user){
    $user = $this->db->select('*')
        ->from('user')
        ->where('user_name', $new_user['user_name'])
        ->or_where('email', $new_user['email'])
        ->get()->row_array();
    if(!$user){
      $user_insert = array(
          'user_name' => $new_user['user_name'],
          'email' => $new_user['email'],
          'password' => hash('sha256', $new_user['password'])
        );
      $this->db->insert('user', $user_insert);
      $user_id = $this->db->insert_id();
      
      return $user_id;
    }else{
      return false;
    }
  }

  public function login_user($new_user){
    $user_name = $new_user['user_name'];
    $password = hash('sha256', $new_user['password']);

    $user = $this->db->select('*')
        ->from('user')
        ->where('user_name', $user_name)
        ->where('password', $password)
        ->get()->row_array();

    if(count($user) === 0) {
      return false;
    }

    $new_session = array(
    'user_data' => array(
        'user_name' => $user['user_name'],
        'email'     => $user['email'],
        'logged_in' => TRUE
      )
    );
    $this->session->set_userdata($new_session);

    return $user;
  }

  public function get_user($user_id){
    $guide_details = $this->db
        ->select('*')
        ->from('user')
        ->where('user_id',$user_id)
        ->get()->row_array();

    if(count($user) === 0) {
      return false;
    }
    return $user;
  }

  public function get_account_feed(){
    $account_feed  = array(
      array(
        'title' =>  'Darsiders',
        'content' =>  'Darksiders take on the apocalypse ditches both literal and metaphoric interpretations of the prophesied end of humanity in favor of a world populated by hulking warriors with badass steeds and questionable hair styles. The end of days is a rough place, but IGN is here to help you survive -- well help make Armageddon a breeze.',
        'image' =>  'http://oyster.ignimgs.com/wordpress/stg.ign.com/2012/08/darksiders-136x77.jpg'
        ),
      array(
        'title' =>  'Darsiders',
        'content' =>  'Darksiders take on the apocalypse ditches both literal and metaphoric interpretations of the prophesied end of humanity in favor of a world populated by hulking warriors with badass steeds and questionable hair styles. The end of days is a rough place, but IGN is here to help you survive -- well help make Armageddon a breeze.',
        'image' =>  'http://oyster.ignimgs.com/wordpress/stg.ign.com/2012/08/darksiders-136x77.jpg'
        ),
      array(
        'title' =>  'Darsiders',
        'content' =>  'Darksiders take on the apocalypse ditches both literal and metaphoric interpretations of the prophesied end of humanity in favor of a world populated by hulking warriors with badass steeds and questionable hair styles. The end of days is a rough place, but IGN is here to help you survive -- well help make Armageddon a breeze.',
        'image' =>  'http://oyster.ignimgs.com/wordpress/stg.ign.com/2012/08/darksiders-136x77.jpg'
        ),
      array(
        'title' =>  'Darsiders',
        'content' =>  'Darksiders take on the apocalypse ditches both literal and metaphoric interpretations of the prophesied end of humanity in favor of a world populated by hulking warriors with badass steeds and questionable hair styles. The end of days is a rough place, but IGN is here to help you survive -- well help make Armageddon a breeze.',
        'image' =>  'http://oyster.ignimgs.com/wordpress/stg.ign.com/2012/08/darksiders-136x77.jpg'
        ),
      array(
        'title' =>  'Darsiders',
        'content' =>  'Darksiders take on the apocalypse ditches both literal and metaphoric interpretations of the prophesied end of humanity in favor of a world populated by hulking warriors with badass steeds and questionable hair styles. The end of days is a rough place, but IGN is here to help you survive -- well help make Armageddon a breeze.',
        'image' =>  'http://oyster.ignimgs.com/wordpress/stg.ign.com/2012/08/darksiders-136x77.jpg'
        )
      );
    return $account_feed;
  }
}