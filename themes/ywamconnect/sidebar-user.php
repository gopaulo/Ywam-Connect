<?php
$current_user = wp_get_current_user();
$uid = $current_user->ID;
if(isset($_GET['yid'])) {
	$uid = $_GET['yid'];
}
$userinfo = get_userdata($uid);
$user = pods('user',$uid);

$avatar = $user->field('avatar.guid');
if($avatar == '')
	$avatar = get_bloginfo('template_url').'/images/default_user.jpg';
$avatar = get_bloginfo('template_url').'/includes/timthumb.php?src='.$avatar.'&w=105&h=105'

?>
<div id="countryFlag">
	<img src="<?php bloginfo('template_url');?>/images/flags/flat/48/<?= $user->field('home_country');?>.png"/> <br/>
	<img src="<?php bloginfo('template_url');?>/images/flags/flat/48/<?= $user->field('current_country');?>.png"/> </div> 

<img class="profilepic" src="<?= $avatar; ?>">
<h4> <?= $userinfo->first_name;?> <?= $userinfo->last_name;?> </h4>

<div class="profiledivider"> </div>
<p class="profilep"> <span class="profilelabel"> Born: </span> <?= $user->display('born');?> </p>
<p class="profilep"> <span class="profilelabel"> Home Location: </span>  <?= $user->field('home_country');?></p>
<p class="profilep"> <span class="profilelabel"> Current Location: </span><?= $user->field('current_city');?>, <?= $user->field('current_country');?> </p>
<p class="profilep"> <span class="profilelabel"> Status: </span> <?= $user->field('user_status.name');?> </p>

<div class="profiledivider"> </div>
<p class="profilep"> <span class="profilelabel"> Attended DTS: </span>  <?php
$courses = $user->field('courses');
foreach($courses as $course):
	echo '<span class="course"><a href="'.get_bloginfo('siteurl').'/course/'.$course['post_name'].'">'.$course['post_title'].'</a> </span>';
endforeach;
?>  </p>
<p class="profilep"> <span class="profilelabel"> Interests: </span> <?php
$interests = $user->field('interests');
foreach($interests as $interest):
	echo '<span class="interests"><a href="'.get_bloginfo('siteurl').'/view?interest='.$interest['id'].'">'.$interest['name'].'</a> </span>';
endforeach;
?> </p>
<p class="profilep"> <span class="profilelabel"> Skills: </span> <?php
$skills = $user->field('skills');
foreach($skills as $skill):
	echo '<span class="skills"><a href="'.get_bloginfo('siteurl').'/view?skill='.$skill['id'].'">'.$skill['name'].'</a> </span>';
endforeach;
?>  </p>
<p class="profilep"> <span class="profilelabel"> Sphere of Engagement: </span> <?php
$spheres = $user->field('spheres');
foreach($spheres as $sphere):
	echo '<span class="spheres"><a href="'.get_bloginfo('siteurl').'/view?sphere='.$sphere['id'].'">'.$sphere['name'].'</a> </span>';
endforeach;
?> </p>
<p class="profilep"> <span class="profilelabel"> Occupation: </span> <?php
$occupations = $user->field('occupation');
foreach($occupations as $occupation):
	echo '<span class="occupations"><a href="'.get_bloginfo('siteurl').'/view?occupation='.$occupation['id'].'">'.$occupation['name'].'</a> </span>';
endforeach;
?>  </p>

<div class="profiledivider"> </div>
<? if($user->field('hide_email') != '1'): ?>
<p class="profilep"> <span class="profilelabel"> Email: </span> <?= $userinfo->user_email;?> </p>
<?php endif; ?>

<p class="profilep"> <span class="profilelabel"> Web: </span> <?= $userinfo->user_url;?></p>
<p class="profilep"> <span class="profilelabel"> Phone: </span> <?= $user->display('phone');?> </p>
<div class="profiledivider"> </div>

<? if($current_user->ID != $uid){  ?>
	     <? if(!is_friend($uid,$current_user->ID)): ?>
	  	 <a href="#" class="addfriendprofile" rel="tooltip" title="Add as friend" data-friend="0" data-id="<?= $follower->user_id; ?>"><img src="<?php bloginfo('template_url');?>/images/addfriend.jpg"> Add as friend</a>
	  		 <?php else: ?>
	  	 <a href="#" class="addfriendprofile" rel="tooltip" title="Unfriend" data-friend="1" data-id="<?= $follower->user_id; ?>"><img src="<?php bloginfo('template_url');?>/images/unfriend.jpg"> Unfriend</a>
		   <?php endif; ?>
		<?php }else { ?> 
 <a href="#" class="editprofile" rel="tooltip" title="Edit your profile"  data-id="<?= $uid; ?>">Edit Profile</a>
		
		<?php } ?>

