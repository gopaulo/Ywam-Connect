<?php
/*
Controller name: Ywam Connect
Controller description: Open API RESTful controller
*/
require_once(ABSPATH . '/wp-admin/includes/admin.php');

class JSON_API_YwamConnect_Controller {
  
  function loadSideBar(){
  		global $json_api;
	  
	  extract($json_api->query->get(array('bid')));
		
	ob_start();
	get_sidebar('base');
	$sidebar = ob_get_contents();
	ob_end_clean();    
	$output['html'] = $sidebar;
	$output['script'] = array(
		get_bloginfo('template_url').'/js/controllers/base.js',
		get_bloginfo('template_url').'/js/controllers/video.js',
		get_bloginfo('template_url').'/js/controllers/event.js'
		);
	return $output;;
  }

function uploadBanner() {

	$output = array(); 
 	global $json_api;
 	extract($json_api->query->get(array('eid')));
  	 $attach_id = media_handle_upload("file", $eid);
	  if ( is_wp_error($attach_id) ) {
        $json_api->error($attach_id);
       
    }
    update_post_meta($eid, '_thumbnail_id', $attach_id);
    $attachment_data = array(
    'ID' => $attach_id
    );
    wp_update_post($attachment_data);
    echo $attach_id;
    return '';
	 
}

function deleteObject() {
  global $json_api;
  extract($json_api->query->get(array('type','id')));
  $output = array();
  deleteObject($type,$id);
  return $output;
}
function followBase() {
 global $json_api;
  extract($json_api->query->get(array('bid')));
	 $output = array();
	 $current_user = wp_get_current_user();
	 add_to_user('bases',$current_user->ID,$bid);
	 $output['uid'] = $current_user->ID;
	 $output['username'] = $current_user->display_name;
	 $output['userlink'] = get_bloginfo('siteurl').'/profile/?yid='.$current_user->ID;
	 $output['useravatar'] = get_bloginfo('template_url').'/images/default_user.jpg';
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


function editVideo() {
  $output = array();
  global $json_api;
  extract($json_api->query->get(array('id','bid','category','headingvideo','videolink','description'))); 
  $current_user = wp_get_current_user();
  $uid = $current_user->ID;

  $parms = array(
    'post_title'=> $headingvideo,
    'post_content'=>$description,
    'video_link'=>$videolink,
    'base'=>$bid);
   $pods = pods('video',$id);
    $pods->save($parms);
   wp_set_post_terms($id,$category,'video_category',false);
   $output['id']= $id;
  return $output;
}

function saveEditVideo() {
  $output = array();
  global $json_api;
  extract($json_api->query->get(array('bid','category','headingvideo','videolink','description'))); 
  $current_user = wp_get_current_user();
  $uid = $current_user->ID;

  $parms = array(
  	'post_title'=> $headingvideo,
  	'post_content'=>$description,
  	'video_link'=>$videolink,
  	'base'=>$bid);
 	 $pods = pods('video');
   $new_video =  $pods->add($parms);
   wp_publish_post($new_video);
   wp_set_post_terms($new_video,$category,'video_category',true);
   $output['id']= $new_video;
  return $output;
}

function editMinistry() {
 $output = array();
  global $json_api;
  extract($json_api->query->get(array('id','uid','bid','videolink','description','facebook','twitter','heading','website','start_day','start_month','start_year','email','phone'))); 
  $params = array(
    'base'=>$bid,
    'post_title'=>$heading,
    'facebook'=>$facebook,
    'twitter'=>$twitter,
    'post_content'=>$description,
    'phone'=>$phone,
    'email'=>$email,
    'video_link'=>$videolink,
    'starting_date'=> $start_month.'/'.$start_day.'/'.$start_year,
    'website'=>$website,
    'post_author'=>$uid
  );
  $pods = pods('ministry',$id);
  $pods->save($params);

  $output['eid'] = $id;

  return $output;
}

function saveEditMinistry() {
 $output = array();
  global $json_api;
  extract($json_api->query->get(array('uid','bid','videolink','description','facebook','twitter','heading','website','start_day','start_month','start_year','email','phone'))); 
  $params = array(
  	'base'=>$bid,
  	'post_title'=>$heading,
  	'facebook'=>$facebook,
  	'twitter'=>$twitter,
  	'post_content'=>$description,
  	'phone'=>$phone,
  	'email'=>$email,
  	'video_link'=>$videolink,
  	'starting_date'=> $start_month.'/'.$start_day.'/'.$start_year,
  	'website'=>$website,
  	'post_author'=>$uid
  );
  $pods = pods('ministry');
  $new_ministry = $pods->add($params);
  wp_publish_post($new_ministry);

  $output['eid'] = $new_ministry;

  return $output;
}

function editEvent() {
  $output = array();
  global $json_api;
  extract($json_api->query->get(array('id','uid','bid','category','cost','videolink','description','heading','website','start_day','start_month','start_year','time','ending_day','ending_month','ending_year'))); 
  $params = array(
    'base'=>$bid,
    'post_title'=>$heading,
    'post_content'=>$description,
    'video_link'=>$videolink,
    'starting_date'=> $start_month.'/'.$start_day.'/'.$start_year,
    'time_event'=> $time,
    'ending_date'=>$ending_month.'/'.$ending_day.'/'.$ending_year,
    'cost'=>$cost,
    'website'=>$website,
    'post_author'=>$uid
  );
  $pods = pods('event',$id);
  $pods->save($params);
  wp_set_post_terms($id,$category,'event_category',false);
  
  $output['eid'] = $id;

  return $output;
}

function saveEditEvent() {
 $output = array();
  global $json_api;
  extract($json_api->query->get(array('uid','bid','category','cost','videolink','description','heading','website','start_day','start_month','start_year','time','ending_day','ending_month','ending_year'))); 
  $params = array(
  	'base'=>$bid,
  	'post_title'=>$heading,
  	'post_content'=>$description,
  	'video_link'=>$videolink,
  	'starting_date'=> $start_month.'/'.$start_day.'/'.$start_year,
  	'time_event'=> $time,
  	'ending_date'=>$ending_month.'/'.$ending_day.'/'.$ending_year,
  	'cost'=>$cost,
  	'website'=>$website,
  	'post_author'=>$uid
  );
  $pods = pods('event');
  $new_event = $pods->add($params);
   wp_publish_post($new_event);

  wp_set_post_terms($new_event,$category,'event_category',true);
  
  $output['eid'] = $new_event;

  return $output;
}

 
function oEmbedYC(){
global $json_api;
  extract($json_api->query->get(array('url','width','height'))); 
  return oEmbedYC($url,$width,$height);
}

function loadObject(){
  global $json_api;
  extract($json_api->query->get(array('type','id'))); 
  return loadObject($type,$id);;
}
function unfollowBase(){
 global $json_api;
	  extract($json_api->query->get(array('bid')));
	 $output = array();
	 $current_user = wp_get_current_user();
	 remove_from_user('bases',$current_user->ID,$bid);
	 $output['uid'] = $current_user->ID;
	 return $output;
}


function followMinistry() {
    global $json_api;
    extract($json_api->query->get(array('mid')));
    $output = array();
    $current_user = wp_get_current_user();
    add_to_user('ministries',$current_user->ID,$mid);

    $userk = pods('user',$current_user->ID);
    $img = $userk->field('avatar.guid');
    if($img == '')
    $img = get_bloginfo('template_url').'/images/default_user.jpg';
    $html .='<li class="col-lg-2 singleattending" data-id="'.$current_user->ID.'" rel="tooltip" title="'.$current_user->display_name.'"><a rel="tooltip" title="'.$current_user->display_name.'" href="'.get_bloginfo('siteurl').'/profile/?yid='.$current_user->ID.'"><img src="'.$img.'" style="width:100%;"/></a></li>';
    $output['uid']= $current_user->ID;
    $output['html']= $html;
	 return $output;
}

function unfollowMinistry(){
    global $json_api;
    extract($json_api->query->get(array('mid')));
    $output = array();
    $current_user = wp_get_current_user();
    remove_from_user('ministries',$current_user->ID,$mid);

    $output['uid']= $current_user->ID;
    
    return $output;
}


function attendEvent() {
 global $json_api;
  extract($json_api->query->get(array('eid')));
  $output = array();
  $current_user = wp_get_current_user();
  add_to_user('attending',$current_user->ID,$eid);
  $output['uid'] = $current_user->ID;
  $user = pods('user',$current_user->ID);
  $avatar = $user->field('avatar.guid');
  if($avatar == '')
    $avatar = get_bloginfo('template_url').'/images/default_user.jpg';
  $output['html'] ='<li class="col-lg-2 singleattending" data-id="'.$current_user->ID.'" rel="tooltip" title="'.$current_user->display_name.'"><img src="'.$avatar.'" style="width: 100%;"/></li>';

  return $output;
}

function unAttendEvent(){
 global $json_api;
	  extract($json_api->query->get(array('eid')));
    $output = array();
    $current_user = wp_get_current_user();
    remove_from_user('attending',$current_user->ID,$eid);
    $output['uid'] = $current_user->ID;
    $user = pods('user',$current_user->ID);
    $avatar = $user->field('avatar.guid');
    if($avatar == '')
      $avatar = get_bloginfo('template_url').'/images/default_user.jpg';
    $output['html'] ='<li class="col-lg-2 singleattending" data-id="'.$current_user->ID.'" rel="tooltip" title="'.$current_user->display_name.'"><img src="'.$avatar.'" style="width: 100%;"/></li>';

	 return $output;
}
}
?>
