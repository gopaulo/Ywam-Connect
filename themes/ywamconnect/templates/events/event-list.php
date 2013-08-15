<?php
  wp_enqueue_script('eventjs', get_bloginfo('template_url').'/js/controllers/event.js', 'jquery', '1.1', true);


  $bid = $_GET['bid'];
  $base = get_post($bid);
  $termfull = get_term_by('slug',$term,'event_category');
  $events = get_list_for_base($bid,'event','event_category',$termfull->term_id);
 ?>
<a href="#addeventmodal" data-toggle="modal" class="pull-right addbtn"> Add Event </a>

<h3 style="padding-top: 0px;margin-top:0px;" >Upcoming Events - <?=$base->post_title;?> <small> <?= $termfull->name; ?></small></h3>
<ul id="eventlist" class="row">
 <?php foreach($events as $event): 

  $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($event->ID), 'large');
  $thumb= $thumb[0]; 
  if($thumb == ''){
    $thumb = get_bloginfo('template_url').'/imags/default_event.jpg';
  }
  $thumb = get_bloginfo('template_url').'/includes/timthumb.php?src='.$thumb.'&w=300&h=170';
  ?>
  <li class="singleevent col-lg-4" data-id="<?= $event->ID;?>"> 
   <a href="javascript://" class="viewevent" data-id="<?= $event->ID;?>"> 
  	  <img src="<?= $thumb;?>">
  	   <div class="imagecaption">
  	   	 <h4> <?= $event->post_title;?> </h4> 
  	   	  <p class="datecaption"> <?= date('F jS, Y - g a',strtotime(get_post_meta($event->ID,'starting_date',true).' '.get_post_meta($event->ID,'time_event',true))); ?></p>
  	   </div>
     </a>
  </li>
 <?php endforeach; ?>
</ul>