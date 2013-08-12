<?php get_header();  ?>
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
<?php get_footer(); ?>