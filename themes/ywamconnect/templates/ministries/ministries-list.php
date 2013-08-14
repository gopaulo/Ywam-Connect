<?php

  $bid = $_GET['bid'];
  $base = get_post($bid);
   $ministries = get_list_for_base($bid,'ministry');
?>
<a href="#addministrymodal" data-toggle="modal" class="pull-right addbtn"> Add Ministry </a>

<h3 style="padding-top: 0px;margin-top:0px;" >Ministries - <?=$base->post_title;?></h3>
<ul id="eventlist" class="row">
<?php foreach($ministries as $ministry): ?>
  <li class="singleevent col-lg-4" data-id="<?= $ministry->ID;?>"> 
	  <img src="<?php bloginfo('template_url');?>/images/default_event.jpg">
	   <div class="imagecaption">
	   	 <h4> <?= $ministry->post_title; ?></h4> 
	   	 <!-- <p class="datecaption"> June 18,2013 </p>-->
	   </div>
  </li>
 <?php endforeach; ?> 
</ul>