<?php
if(isset($_GET['yid'])) {
	$current_user = get_user_by('id',$uid);
}else $current_user =  wp_get_current_user();

$uid = $current_user->ID; 
echo $uid;
?>

 - user sidebar