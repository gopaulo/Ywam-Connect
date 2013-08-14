<?php

  $bid = $_GET['bid'];
  $base = get_post($bid);
   $ministries = get_list_for_base($bid,'ministry');
    $current_user = wp_get_current_user();

?>
<a href="#addministrymodal" data-toggle="modal" class="pull-right addbtn"> Add Ministry </a>

<h3 style="padding-top: 0px;margin-top:0px;" >Ministries - <?=$base->post_title;?></h3>
<ul id="eventlist" class="row">
<?php foreach($ministries as $ministry): ?>
  <li class="singleevent col-lg-4" data-id="<?= $ministry->ID;?>"> 
	  <img src="<?php bloginfo('template_url');?>/images/default_event.jpg">
	   <div class="imagecaption">
	   	 <h4> <?= $ministry->post_title; ?></h4> 
<?php if(!is_following('ministries',$current_user->ID,$ministry->ID)): ?>
<a href="#" class="followministry btn btn-info btn-mini" data-follow='1' data-name="<?= $ministry->post_title;?>" data-id="<?= $ministry->ID;?>"><i class="icon-heart"> </i><span> Follow <?= $ministry->post_title; ?> </span></a>
<?php else: ?>
<a href="#" class="followministry btn btn-default btn-mini" data-follow='0' data-name="<?= $ministry->post_title;?>" data-id="<?= $ministry->ID;?>"><i class="icon-heart-empty"> </i> <span>Unfollow  <?= $ministry->post_title; ?></span> </a>
<?php endif; ?>	   	 <!-- <p class="datecaption"> June 18,2013 </p>-->
	   </div>
  </li>
 <?php endforeach; ?> 
</ul>