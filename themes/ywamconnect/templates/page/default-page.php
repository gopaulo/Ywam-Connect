<?php
// Load controllers (js)

?>
<div class="container">
<div class="col-lg-2" > 
	<div  class="sidebar" data-spy="affix" data-offset-top="200">
	  <?php get_sidebar ('page-left'); ?>
  </div>
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
	<div  class="sidebar" data-spy="affix" data-offset-top="200">
		<?php dynamic_sidebar('page-right');?>
 	</div>
	</div>
</div>