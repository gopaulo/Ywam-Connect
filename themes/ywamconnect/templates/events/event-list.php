<?php

  $bid = $_GET['bid'];
  $base = get_post($bid);
  $termfull = get_term_by('slug',$term,'event_category');
?>
<a href="#addeventmodal" data-toggle="modal" class="pull-right addbtn"> Add Event </a>

<h3 style="padding-top: 0px;margin-top:0px;" >Upcoming Events - <?=$base->post_title;?> <small> <?= $termfull->name; ?></small></h3>
<ul id="eventlist" class="row">
  <li class="singleevent col-lg-4" data-id="0"> 
	  <img src="<?php bloginfo('template_url');?>/images/default_event.jpg">
	   <div class="imagecaption">
	   	 <h4> Event Name </h4> 
	   	  <p class="datecaption"> June 18,2013 </p>
	   </div>
  </li>
  <li class="singleevent col-lg-4" data-id="0"> 
	  <img src="<?php bloginfo('template_url');?>/images/default_event.jpg">
	   <div class="imagecaption">
	   	 <h4> Event Name </h4> 
	   	  <p class="datecaption"> June 18,2013 </p>
	   </div>
  </li>
  <li class="singleevent col-lg-4" data-id="0"> 
	  <img src="<?php bloginfo('template_url');?>/images/default_event.jpg">
	   <div class="imagecaption">
	   	 <h4> Event Name </h4> 
	   	  <p class="datecaption"> June 18,2013 </p>
	   </div>
  </li>
  <li class="singleevent col-lg-4" data-id="0"> 
	  <img src="<?php bloginfo('template_url');?>/images/default_event.jpg">
	   <div class="imagecaption">
	   	 <h4> Event Name </h4> 
	   	  <p class="datecaption"> June 18,2013 </p>
	   </div>
  </li>
  <li class="singleevent col-lg-4" data-id="0"> 
	  <img src="<?php bloginfo('template_url');?>/images/default_event.jpg">
	   <div class="imagecaption">
	   	 <h4> Event Name </h4> 
	   	  <p class="datecaption"> June 18,2013 </p>
	   </div>
  </li>
</ul>