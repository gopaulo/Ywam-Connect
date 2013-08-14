<?php

  $bid = $_GET['bid'];
  $base = get_post($bid);
  $termfull = get_term_by('slug',$term,'event_category');
  $events = get_list_for_base($bid,'event','event_category',$termfull->term_id);
 ?>
<a href="#addeventmodal" data-toggle="modal" class="pull-right addbtn"> Add Event </a>

<h3 style="padding-top: 0px;margin-top:0px;" >Upcoming Events - <?=$base->post_title;?> <small> <?= $termfull->name; ?></small></h3>
<ul id="eventlist" class="row">
 <?php foreach($events as $event): ?>
  <li class="singleevent col-lg-4" data-id="<?= $event->ID;?>"> 
	  <img src="<?php bloginfo('template_url');?>/images/default_event.jpg">
	   <div class="imagecaption">
	   	 <h4> <?= $event->post_title;?> </h4> 
	   	  <p class="datecaption"> <?= date('F jS, Y',strtotime($event->post_date)); ?></p>
	   </div>
  </li>
 <?php endforeach; ?>
</ul>