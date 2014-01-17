<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site_model extends CI_Model {

  public function get_top_games(){
    $top_games = $this->db
        ->select('game_id,game_name')
        ->limit(5)
        ->from('game')
        ->get()->result_array();
    return $top_games;
  }
  public function get_top_list(){
    $top_games = $this->get_top_games();
    foreach($top_games as $top_game){
      $top_guides = array(
          'game_name' => $top_game['game_name'],
          'game_id' => $top_game['game_id']
        );
      $top_guides[] = $this->db
          ->select('guide_id,guide_name')
          ->limit(5)
          ->from('guide')
          ->where('game_id',$top_game['game_id'])
          ->get()->result_array();
      $top_list[] = $top_guides;
    }
    return $top_list;
  }
  public function get_twitter_feed(){
    if (file_exists('twitter_result.data')) {
      $data = unserialize(file_get_contents('twitter_result.data'));
      if ($data['timestamp'] > time() - 10 * 60) {
        $twitter_result = $data['twitter_result'];
      } else { // cache doesn't exist or is older than 10 mins
        $twitter_result = file_get_contents('https://api.twitter.com/1/statuses/user_timeline.rss?screen_name=CodeMonkeyMZ'); // or whatever your API call is

        $twitter_result = array ('twitter_result' => $twitter_result, 'timestamp' => time());
        file_put_contents('twitter_result.data', serialize($twitter_result));
        $twitter_result = $twitter_result['twitter_result'];
      }
    }

    $final_feed = $this->getFeed($twitter_result);
    return $final_feed;
  }
  public function tago($time) {
    $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
    $lengths = array("60","60","24","7","4.35","12","10");

    $now = time();

    $difference = $now - $time;
    $tense = "ago";

    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
      $difference /= $lengths[$j];
    }

    $difference = round($difference);

     if($difference != 1) {
        $periods[$j].= "s";
     }

    return "$difference $periods[$j] ago ";
  }
  public function getFeed($content) {
    $x = new SimpleXmlElement($content);

    $i = 0;
    foreach($x->channel->item as $entry) if ($i < 10) {
      $twtdate = $entry->pubDate;
      $twtdate = strtotime($twtdate);
      $tweet = preg_replace('/(https?:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}\/?[a-zA-Z0-9\-]*)/','<a href="$1" target="_blank">$1</a>',$entry->description);
      $tweet = str_replace("CodeMonkeyMZ:", "", $tweet);
      $twitter_feed = "<div class='tweet'>" . $tweet . "&nbsp;<a href='$entry->link'><span class='twtdate'>".$this->tago($twtdate)."</span></a></div>";
      $feed_result[$i] = $twitter_feed;

      $i +=1;
    }
    return $feed_result;
  }
}