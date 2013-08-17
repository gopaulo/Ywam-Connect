<?php

/* Template Name: Form Tester  */

get_header();
?>


<div class="container">
   <? $feeds = loadFeeds(1); 
   print_r($feeds);
   ?>
</div>

<?php get_footer(); ?>