<?php
  wp_enqueue_script('followersjs', get_bloginfo('template_url').'/js/controllers/followers.js', 'jquery', '1.1', true);


  $bid = $_GET['bid'];
  $base = get_post($bid);
  $termfull = get_term_by('slug',$term,'event_category');
  $followers = get_followers($bid);
  $current_user = wp_get_current_user();
  $uid = $current_user->ID;
?>
<p class="pull-right addbtn follownumber">Total of <span class="totalusers"> <?= sizeof($followers);?></span> people following this base </p>

<h3 style="padding-top: 0px;margin-top:0px;" >People - <?=$base->post_title;?></h3>
<ul id="followerlist" class="row">
	<? foreach($followers as $follower): ?>
	<li class="singlefollower col-lg-6" data-id="<?= $follower->user_id; ?>"> 
	 <div class="row">
	   <div class="col-lg-4">
			<a href="<?php bloginfo('siteurl');?>/profile/?yid=<?= $follower->user_id;?>"><img src="<?php bloginfo('template_url');?>/images/default_user.jpg"></a>
	  </div>
	   <div class="col-lg-8 userdatacaption">
	   <? if($follower->user_id != $uid){  ?>
	     <? if(!is_friend($uid,$follower->user_id)): ?>
	  	 <a href="#" class="addfriend" rel="tooltip" title="Add as friend" data-friend="0" data-id="<?= $follower->user_id; ?>"><img src="<?php bloginfo('template_url');?>/images/addfriend.jpg"></a>
	  		 <?php else: ?>
	  	 <a href="#" class="addfriend" rel="tooltip" title="Unfriend" data-friend="1" data-id="<?= $follower->user_id; ?>"><img src="<?php bloginfo('template_url');?>/images/unfriend.jpg"></a>
		   <?php endif; ?>
		<?php } ?>
	    <a href="<?php bloginfo('siteurl');?>/profile/?yid=<?= $follower->user_id;?>" class="usernamecaption"><?= $follower->display_name;?> </a> 
	   	  <p class="locationusercaption"> Current Location:  </p>
	   </div>
	</li>
	<?php endforeach; ?> 
</ul>