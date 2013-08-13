<?php

/* Template Name: Home */

get_header();
?>


<?php  if(is_user_logged_in()) : ?>
	<?php get_template_part('templates/page/home','loggedin'); ?>
<?php else: ?>
	<?php get_template_part('templates/page/home','loggedout'); ?>
<?php endif; ?>

<?php get_footer(); ?>