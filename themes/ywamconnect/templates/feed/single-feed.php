<?php
$current = wp_get_current_user();
$user = pods('user',$singlefeed->postedby);
$avatar = $user->field('avatar.guid');
if($avatar == '')
	$avatar = get_bloginfo('template_url').'/images/default_user.jpg';
$avatar = get_bloginfo('template_url').'/includes/timthumb.php?src='.$avatar.'&w=38&h=38f';
$feed = pods('feed',$singlefeed->id);
?>
<li class="feed_single" data-id="<?= $singlefeed->id;?>">
  <div class="row">
 	<div class="col-lg-3 feeduser"> 
 	 	<a href="<?php bloginfo('siteurl');?>/profile/?yid=<?= $singlefeed->postedby;?>"> 
 	 		<img src="<?= $avatar; ?>">
	 	</a>
	 </div>
 	<div class="col-lg-9"> 
 	   <div class="row"> 
	 	   <div class="col-lg-12 feed_user"><a href="<?= get_bloginfo('siteurl');?>/profile/?yid=<?= $singlefeed->postedby;?>"><?=$singlefeed->display_name;?></a>
	 	   		<!--<small> @location </small> -->
	 	   		<?php if($current->ID == $singlefeed->postedby): ?>
	 	   			 <button type="button" class="close pull-right deletefeed" data-id="<?= $singlefeed->id;?>" aria-hidden="true">&times;</button>
	 	   		<?php endif; ?>
	 	   		<small class="feed_time"> <?= date('H:i',strtotime($singlefeed->created));?> @<?=$feed->display('origin.name');?></small>
		   	</div>
	   	</div>
	   	<div class="row">
		   	 <div class="col-lg-12">
		   	  <p class="feed"> <?= $singlefeed->feed; ?> </p>
		   	 </div>
	   	</div>
 	</div>
  </div>
</li>