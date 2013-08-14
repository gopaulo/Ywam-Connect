<?php

/* Template Name: User Profile */

get_header();
 ?>


<div class="container">
<div class="col-lg-2" > 
	<?php get_sidebar('user'); ?>
 </div>
<div class="col-lg-8"> 
	<div class="container">
			  <?php
	  if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		the_content();// Your loop code
	endwhile;
else :
	echo wpautop( 'Sorry, no posts were found' );
endif;
?>
	</div> 
</div>
<div class="col-lg-2" > 
	 <?php get_sidebar('newsfeed');?>
	</div>
</div>

<?php get_footer(); ?>