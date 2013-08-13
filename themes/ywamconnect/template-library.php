<?php

/* Template Name: Library Search  */

get_header();
?>


<div class="container">
	<div class="col-lg-3" > 
		<?php get_sidebar('library-left'); ?>
	 </div>
	<div class="col-lg-6"> 
		<div class="container">
			<?php get_template_part('templates/library/main');?>
		</div> 
	</div>
	<div class="col-lg-3" > 
	 <?php get_sidebar('library-right');?>
	</div>
</div>

<?php get_footer(); ?>