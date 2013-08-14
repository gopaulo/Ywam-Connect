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
	$output['script'] = get_bloginfo('template_url').'/js/controllers/base.js';
	return $output;;
  }

function followBase() {
 global $json_api;
  extract($json_api->query->get(array('bid')));
	 $output = array();
	 $current_user = wp_get_current_user();
	 add_to_user('bases',$current_user->ID,$bid);
	 return $output;
}

function friend(){
	 global $json_api;
	  extract($json_api->query->get(array('uid')));
	 $output = array();
	 $current_user = wp_get_current_user();
	 add_to_user('friends',$current_user->ID,$uid);
	  $output['uid'] = $uid;
	 $output['img'] =  get_bloginfo('template_url').'/images/unfriend.jpg';
	 return $output;
}
function unfriend() {
 global $json_api;
	  extract($json_api->query->get(array('uid')));
	 $output = array();
	 $current_user = wp_get_current_user();
	 remove_from_user('friends',$current_user->ID,$uid);
	 $output['uid'] = $uid;
	 $output['img'] =  get_bloginfo('template_url').'/images/addfriend.jpg';
	 return $output;
}



function unfollowBase(){
 global $json_api;
	  extract($json_api->query->get(array('bid')));
	 $output = array();
	 $current_user = wp_get_current_user();
	 remove_from_user('bases',$current_user->ID,$bid);
	 return $output;
}


function followMinistry() {
 global $json_api;
  extract($json_api->query->get(array('bid')));
	 $output = array();
	 $current_user = wp_get_current_user();
	 add_to_user('ministries',$current_user->ID,$bid);
	 return $output;
}

function unfollowMinistry(){
 global $json_api;
	  extract($json_api->query->get(array('uid')));
	 $output = array();
	 $current_user = wp_get_current_user();
	 remove_from_user('ministries',$current_user->ID,$uid);
	 return $output;
}


function attendEvent() {
 global $json_api;
  extract($json_api->query->get(array('eid')));
	 $output = array();
	 $current_user = wp_get_current_user();
	 add_to_user('attending',$current_user->ID,$eid);
	 return $output;
}

function unAttendEvent(){
 global $json_api;
	  extract($json_api->query->get(array('eid')));
	 $output = array();
	 $current_user = wp_get_current_user();
	 remove_from_user('attending',$current_user->ID,$eid);
	 return $output;
}
}
?>
