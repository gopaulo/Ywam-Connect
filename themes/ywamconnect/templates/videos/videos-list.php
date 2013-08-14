<?php

  $bid = $_GET['bid'];
  $base = get_post($bid);
  $termfull = get_term_by('slug',$term,'video_category');
   $videos = get_list_for_base($bid,'video','video_category',$termfull->term_id);
?>
<a href="#addvideomodal" data-toggle="modal" class="pull-right addbtn"> Add Video </a>

<h3 style="padding-top: 0px;margin-top:0px;" >Videos - <?=$base->post_title;?> <small> <?= $termfull->name; ?></small></h3>
<ul id="eventlist" class="row">
<?php foreach($videos as $video): ?>
  <li class="singlevideo col-lg-3" data-id="<?= $video->ID; ?>"> 
	  <img src="<?php bloginfo('template_url');?>/images/default_video.jpg">
	   <div class="imagecaption">
	   	 <h4> <?= $video->post_title;?> </h4> 
	   	  <p class="datecaption">  <?= date('F jS, Y',strtotime($video->post_date)); ?></p>
	   	  <p class="datecaption"> by <a href="<?php bloginfo('siteurl');?>/profile/?yid=<?= $video->uid; ?>"> <?= $video->author;?></a> </p>
	   </div>
  </li>
 <?php endforeach; ?>
</ul>