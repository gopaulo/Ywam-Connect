<?php
// Load controllers (js)

?>
<div class="container">
<div class="col-lg-3" > 
	<?php get_sidebar('home'); ?>
 </div>
<div class="col-lg-6"> 
	<div class="container">
		<?php get_template_part('templates/map/map');?>
	</div> 
</div>
<div class="col-lg-3" > 
	 <?php get_sidebar('newsfeed');?>
	</div>
</div>