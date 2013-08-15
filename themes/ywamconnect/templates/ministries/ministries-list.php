<?php

  wp_enqueue_script('ministryjs', get_bloginfo('template_url').'/js/controllers/ministry.js', 'jquery', '1.1', true);

  $bid = $_GET['bid'];
  $base = get_post($bid);
   $ministries = get_list_for_base($bid,'ministry');
    $current_user = wp_get_current_user();

?>
<a href="#addministrymodal" data-toggle="modal" class="pull-right addbtn"> Add Ministry </a>

<h3 style="padding-top: 0px;margin-top:0px;" >Ministries - <?=$base->post_title;?></h3>
<ul id="eventlist" class="row">
<?php foreach($ministries as $ministry): 
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($ministry->ID), 'large');
  
  if($thumb == ''){
    $thumb = get_bloginfo('template_url').'/images/default_ministry.jpg';
  }else $thumb= $thumb[0]; 
  $thumb = get_bloginfo('template_url').'/includes/timthumb.php?src='.$thumb.'&w=300&h=170';?>
  <li class="singleevent col-lg-4" data-id="<?= $ministry->ID;?>"> 
  <a href="#" class="viewministry" data-id="<?= $ministry->ID;?>"> 
	  <img src="<?= $thumb; ?>">
	   <div class="imagecaption">
	   	 <h4> <?= $ministry->post_title; ?></h4> 
<?php if(!is_following('ministries',$current_user->ID,$ministry->ID)): ?>
<a href="#" class="followministry btn btn-info btn-mini" data-follow='1' data-name="<?= $ministry->post_title;?>" data-id="<?= $ministry->ID;?>"><i class="icon-heart"> </i><span> Follow <?= $ministry->post_title; ?> </span></a>
<?php else: ?>
<a href="#" class="followministry btn btn-default btn-mini" data-follow='0' data-name="<?= $ministry->post_title;?>" data-id="<?= $ministry->ID;?>"><i class="icon-heart-empty"> </i> <span>Unfollow  <?= $ministry->post_title; ?></span> </a>
<?php endif; ?>	   	 <!-- <p class="datecaption"> June 18,2013 </p>-->
	   </div>
     </a>
  </li>
 <?php endforeach; ?> 
</ul>