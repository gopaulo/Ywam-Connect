<?php
/*
Controller name: Ywam Connect
Controller description: Open API RESTful controller
*/

class JSON_API_YwamConnect_Controller {
  
  function loadSideBar(){
  		global $json_api;
	  
	  extract($json_api->query->get(array('bid')));
		
	ob_start();
	get_sidebar('base');
	$sidebar = ob_get_contents();
	ob_end_clean();    
	$output['html'] = $sidebar;
	return $output;;
  }
}

?>
