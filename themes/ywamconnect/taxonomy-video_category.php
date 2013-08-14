<?php get_header(); 

$archive = true;
if(isset($_GET['bid'])) { 
  $archive = false;
}

?>


<div class="container">
<div class="col-lg-2" > 
	<?php get_sidebar('base'); ?>
 </div>
<div class="col-lg-8"> 
	<div class="container">
	<?php if($archive):
		get_template_part('templates/videos/videos','list');
	else :
		get_template_part('templates/videos/videos','list');
	endif; ?>
		
	</div> 
</div>
<div class="col-lg-2" > 
	 <?php get_sidebar('newsfeed');?>
	</div>
</div>

<?php get_footer(); ?>