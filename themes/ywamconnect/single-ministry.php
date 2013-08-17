<?php

 
get_header();
$video = pods('ministry',$post->ID);
$bid = $video->field('base.ID');
$_GET['bid'] = $bid;
?>


<div class="container">
<div class="col-lg-2" > 
<div  id="sidebar-left" >
	<?php get_sidebar('base'); ?>
	</div>
 </div>
<div class="col-lg-8"> 
		<?php get_template_part('templates/ministries/single');?>
</div>
<div class="col-lg-2" > 
  <?php if (is_user_logged_in()): ?>
	 <?php get_sidebar('newsfeed');?>
	<?php else : ?>
	 <?php get_sidebar('home');?>
	<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>