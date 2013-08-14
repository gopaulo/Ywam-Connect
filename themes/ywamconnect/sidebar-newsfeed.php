<?php   
wp_enqueue_script(
		'news-feed-post',
		get_stylesheet_directory_uri() . '/js/newsfeed.js',
		array( 'jquery' )
	);
?>
<h4 class="newsfeedh4"> News Feed</h4>
<form id="newsfeed_post">
<div class="row"> 
<textarea id="postfeed" name="postfeed"> </textarea>
	<div class="col-lg-2 well"><a href="#"><i class="icon-camera"> </i></a></div>
	<div class="col-lg-2 well"><a href="#"><i class="icon-map-marker"></i></a></div>
	<div class="col-lg-7"><a href="#" class="pull-right btn btn-info"> Post</a></div>
</div>
</form>
<ul id="newsfeed_list"> 
<?php $i = 1; ?>
  <?php include(locate_template('/templates/feed/single-feed.php')); ?> 
</ul>