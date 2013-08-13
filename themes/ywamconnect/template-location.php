<?php

/* Template Name: Ywam Locations */

get_header();
$_GET['bid'] = 22;
?>


<div class="container">
<div class="col-lg-3" > 
	<?php get_sidebar('base'); ?>
 </div>
<div class="col-lg-6"> 
	<div class="container">
		<?php get_template_part('templates/map/map');?>
	</div> 
</div>
<div class="col-lg-3" > 
	 <?php get_sidebar('newsfeed');?>
	</div>
</div>

<?php get_footer(); ?>