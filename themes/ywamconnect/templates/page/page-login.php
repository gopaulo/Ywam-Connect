<?php

get_header();
?>
<style>
 body {
 	background: url(images/people_bg.jpg);
 }
</style>
<div id="widebarwrapper">
    <div id="widebarinside">
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
</div>
<?php get_footer() ?>