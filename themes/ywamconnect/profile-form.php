<?php
$current_user = wp_get_current_user();
$uid = $current_user->ID;
if(isset($_GET['yid'])) {
	$uid = $_GET['yid'];
}
$userinfo = get_userdata($uid);
$user = pods('user',$uid);
?>
<div class="profile" id="theme-my-login<?php $template->the_instance(); ?>">
	<?php $template->the_action_template_message( 'profile' ); ?>
	<?php $template->the_errors(); ?>
	<form id="your-profile" action="<?php $template->the_action_url( 'profile' ); ?>" method="post">
		<?php wp_nonce_field( 'update-user_' . $uid); ?>
		
			<input type="hidden" name="from" value="profile" />
			<input type="hidden" name="checkuser_id" value="<?php echo $current_user->ID; ?>" />
		
		<div class="row">
		  <div class="col-lg-12">
			 <h4> About me </h4>
			 <p><?= $userinfo->user_description; ?> </p>
		</div>
		<div class="col-lg-5">
		<?php 
		$bases = $user->field('bases');
		if(sizeof($bases)>0) {
			?>
			<h4> <?= $userinfo->first_name;?> is Following </h4>
			 <ul class="profilelist">
			 	<?php
			 	$i =0;
			 	 
			 	 foreach($bases as $base):
			 	 	if($i > 4) break;
			 	 	$i++;
			 	  ?>
				 <li> <a href="<?= get_bloginfo('siteurl').'/base/'.$base['post_name'];?>"><?= $base['post_title'];?></a></li>
				<?php endforeach; ?>
				 <?php if(sizeof($bases) > 4): ?> 
				  <li> <a href="#"> <strong> See all </strong></a></li> 
				<?php endif; ?>
			 </ul><?php } ?>
			 <?php 
			 	 $events = loadFutureEvents($uid);
			 	 if(sizeof($events) > 0){ 
			 	 ?>
			<h4> <?= $userinfo->first_name;?> is attending these upcoming events </h4>
			<ul class="profilelist">
			<?php
			 	$i =0;
			 	 foreach($events as $event):
			 	 	if($i > 4) break;
			 	 	$i++;
			 	  ?>
				 <li> <a href="<?= get_bloginfo('siteurl');?>/event/<?= $event->post_name;?>"> <?= $event->post_title;?></a></li>
			<?php endforeach; ?>				
			 </ul> <?php } 

			  $ministries = $user->field('ministries');

			  if(!empty($ministries)) { ?>
			<h4> <?= $userinfo->first_name;?> and Ministries </h4>
			<ul class="profilelist">
				<?php
			 	$i =0;
			 	
			 	 foreach($ministries as $ministry):
			 	 	if($i > 4) break;
			 	 	$i++;
			 	  ?>
				 <li> <a href="<?= get_bloginfo('siteurl').'/ministry/'.$ministry['post_name'];?>"><?= $ministry['post_title'];?></a></li>
				<?php endforeach; ?>
				 <?php if(sizeof($ministries) > 4): ?> 
				  <li> <a href="#"> <strong> See all </strong></a></li> 
				<?php endif; ?>
			 </ul> <?php } ?>
			<h4> Friends</h4>	
			<div style="width:90%">
		 		<?php  get_template_part('templates/users/friends','list'); ?>
			</div>
			
		</div>
		<div class="col-lg-7">
		 	<h4> Photos </h4>
		 	<?php  get_template_part('templates/users/photo','list'); ?>
		</div>
		</div>
	</form>
</div>
