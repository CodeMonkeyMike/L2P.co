<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "site";
$route['404_override'] = '';

//Value $1 = guide_id value $2 = guide_name
$route['guide/(:num)(:any)'] = "guide/index/$1$2";
$route['guide/game_by_system/(:num)(:any)'] = "guide/game_by_system/$1$2";

/* End of file routes.php */
/* Location: ./application/config/routes.php */