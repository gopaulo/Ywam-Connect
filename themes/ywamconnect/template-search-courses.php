<?php

/* Template Name: Courses and Events */

get_header();
 ?>


<div class="container">
<div class="col-lg-2" > 
	<?php get_sidebar('search-courses'); ?>
 </div>
<div class="col-lg-10"> 
		<?php get_template_part('templates/map/map');?>
</div>

<?php get_footer(); ?>