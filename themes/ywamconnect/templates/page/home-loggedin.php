<?php
// Load controllers (js)

?>
<div class="container">
<div class="col-lg-3" > 
	<div  class="sidebar" data-spy="affix" data-offset-top="200">
	<?php get_sidebar('home'); ?>
	</div>
 </div>
<div class="col-lg-6"> 
	<div class="container">
		<?php get_template_part('templates/map/map');?>
	</div> 
</div>
<div class="col-lg-3" > 
	<div  class="sidebar" data-spy="affix" data-offset-top="200">
	 <?php get_sidebar('newsfeed');?>
	 </div>
	</div>
</div>