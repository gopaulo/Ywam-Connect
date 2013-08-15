<?php
$current_user = wp_get_current_user();
$uid = $current_user->ID;
if(isset($_GET['yid'])) {
	$uid = $_GET['yid'];
}
$userinfo = get_userdata($uid);
$user = pods('user',$uid);
$friends = $user->field('friends');
$counter = 0 ;
?>
<ul id="friendlist" class="row">
 <?php foreach($friends as $friend):
 if($counter > 18) break;
 $counter++;
 $user = pods('user',$friend['ID']);
	$avatar = $user->field('avatar.guid');
if($avatar == '')
$avatar = get_bloginfo('template_url').'/images/default_user.jpg';
  ?>
 <li class="col-lg-2"> <a href="<?= get_bloginfo('siteurl');?>/profile/?yid=<?= $friend['ID'];?>" rel="tooltip" title="<?= $friend['display_name'];?>"><div class="pic"><img src="<?= $avatar; ?>" style="width: 100%;" /> </div></a></li>
<?php endforeach; ?>
</ul>
 