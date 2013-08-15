<?php

  wp_enqueue_script('videojs', get_bloginfo('template_url').'/js/controllers/video.js', 'jquery', '1.1', true);

  $bid = $_GET['bid'];
  $base = get_post($bid);
  $termfull = get_term_by('slug',$term,'video_category');
   $videos = get_list_for_base($bid,'video','video_category',$termfull->term_id);
?>
<a href="#addvideomodal" data-toggle="modal" class="pull-right addbtn"> Add Video </a>

<h3 style="padding-top: 0px;margin-top:0px;" >Videos - <?=$base->post_title;?> <small> <?= $termfull->name; ?></small></h3>
<ul id="eventlist" class="row">
<?php foreach($videos as $video):
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($video->ID), 'large');
	$thumb= $thumb[0]; 
	if($thumb == ''){
		$thumb = get_bloginfo('template_url').'/imags/default_video.jpg';
	}
	$thumb = get_bloginfo('template_url').'/includes/timthumb.php?src='.$thumb.'&w=300&h=170';
 ?>
  <li class="singlevideo col-lg-3" data-id="<?= $video->ID; ?>"> 
   	<a href="javascript://" class="viewvideo" data-id="<?= $video->ID; ?>">
	  <img src="<?=  $thumb ?>">
	   <div class="imagecaption">
	   	 <h4> <?= $video->post_title;?> </h4> 
	   	  <p class="datecaption">  <?= date('F jS, Y',strtotime($video->post_date)); ?></p>
	   	  <p class="datecaption"> by <a href="<?php bloginfo('siteurl');?>/profile/?yid=<?= $video->uid; ?>"> <?= $video->author;?></a> </p>
	   </div>
	   </a>
  </li>
 <?php endforeach; ?>
</ul>