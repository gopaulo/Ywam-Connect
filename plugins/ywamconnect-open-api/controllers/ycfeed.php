<?php
/*
Controller name: Ywam Connect Feed 
Controller description: Open API RESTful controller
*/
 
class JSON_API_YcFeed_Controller {
  

  function delete_feed() {
	global $json_api;
	$user = wp_get_current_user();
 	$uid = $user->ID;
 	extract($json_api->query->get(array('fid')));
 	$singlefeed = pods('feed',$fid);
 	if($singlefeed->display('postedby') != $uid) {
 		$json_api->error('Not authorized');
 	
 	}else {
 		$singlefeed->delete();
 		return array(
 			'id'=>$fid);
 	}


  }
  function post_feed() {
	global $json_api;
 	extract($json_api->query->get(array('postfeed')));
 	$user = wp_get_current_user();
 	$uid = $user->ID;
 	$param = array(
 		'name'=>$uid.'.'.date('m.d.Y.His').'.yc',
 		'author'=>$uid,
 		'feed'=>$postfeed,
 		'postedby'=>$uid,
 		'origin'=>1 //ywamconnect.com
 	);
 	$feed = pods('feed');
 	$userpods = pods('user',$uid);
  $avatar = $userpods->field('avatar.guid');
  if($avatar == '')
    $avatar = get_bloginfo('template_url').'/images/default_user.jpg';
 

 	$fid = $feed->add($param);
 	$output = array(
 	 'fid'=>$fid,
 	 'feed'=>$postfeed,
 	 'username'=>$user->display_name,
 	 'avatar'=>$avatar,
 	 'uid'=>$uid);

 	return $output;
  }

 
  
}
?>
