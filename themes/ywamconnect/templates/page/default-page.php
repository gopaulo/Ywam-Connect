<?php
// Load controllers (js)

?>
<div class="container_home">
<div class="col-lg-2" > 
  <?php get_sidebar('page-left'); ?>
  </div>
<div class="col-lg-8"> 
	<div class="container">
	  <?php
	  if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		echo '<h2> '.get_the_title().'</h2>';
		the_content();// Your loop code
	endwhile;
else :
	echo wpautop( 'Sorry, no posts were found' );
endif;
?>
	</div> 
</div>
<div class="col-lg-2" > 
<?php dynamic_sidebar('page-right');?>
 	</div>
</div>