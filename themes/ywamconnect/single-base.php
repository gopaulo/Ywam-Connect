<?php

/* Template Name: Home */

get_header();
$_GET['base'] = $post;
 ?>


<div class="container">
<div class="col-lg-2" > 
<div  id="sidebar-left" >
	<?php get_sidebar('base'); ?>
	</div>
 </div>
<div class="col-lg-8"> 
		<?php get_template_part('templates/map/map');?>
</div>
<div class="col-lg-2" > 
	 <?php get_sidebar('newsfeed');?>
	</div>
</div>

<?php get_footer(); ?>