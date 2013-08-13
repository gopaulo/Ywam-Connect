<?php

  $bid = $_GET['bid'];
  $base = get_post($bid);
  $termfull = get_term_by('slug',$term,'video_category');
?>
<a href="#addvideomodal" data-toggle="modal" class="pull-right addbtn"> Add Video </a>

<h3 style="padding-top: 0px;margin-top:0px;" >Videos - <?=$base->post_title;?> <small> <?= $termfull->name; ?></small></h3>
<ul id="eventlist" class="row">
  <li class="singlevideo col-lg-3" data-id="0"> 
	  <img src="<?php bloginfo('template_url');?>/images/default_video.jpg">
	   <div class="imagecaption">
	   	 <h4> Video Name </h4> 
	   	  <p class="datecaption"> June 18,2013 </p>
	   	  <p class="datecaption"> by <a href="<?php bloginfo('siteurl');?>/profile/"> Ywam User</a> </p>
	   </div>
  </li>
  <li class="singlevideo col-lg-3" data-id="0"> 
	  <img src="<?php bloginfo('template_url');?>/images/default_video.jpg">
	   <div class="imagecaption">
	   	 <h4> Video Name </h4> 
	   	  <p class="datecaption"> June 18,2013 </p>
	   	  <p class="datecaption"> by <a href="<?php bloginfo('siteurl');?>/profile/"> Ywam User</a> </p>
	   </div>
  </li>
  <li class="singlevideo col-lg-3" data-id="0"> 
	  <img src="<?php bloginfo('template_url');?>/images/default_video.jpg">
	   <div class="imagecaption">
	   	 <h4> Video Name </h4> 
	   	  <p class="datecaption"> June 18,2013 </p>
	   	  <p class="datecaption"> by <a href="<?php bloginfo('siteurl');?>/profile/"> Ywam User</a> </p>
	   </div>
  </li>
  <li class="singlevideo col-lg-3" data-id="0"> 
	  <img src="<?php bloginfo('template_url');?>/images/default_video.jpg">
	   <div class="imagecaption">
	   	 <h4> Video Name </h4> 
	   	  <p class="datecaption"> June 18,2013 </p>
	   	  <p class="datecaption"> by <a href="<?php bloginfo('siteurl');?>/profile/"> Ywam User</a> </p>
	   </div>
  </li>
  <li class="singlevideo col-lg-3" data-id="0"> 
	  <img src="<?php bloginfo('template_url');?>/images/default_video.jpg">
	   <div class="imagecaption">
	   	 <h4> Video Name </h4> 
	   	  <p class="datecaption"> June 18,2013 </p>
	   	  <p class="datecaption"> by <a href="<?php bloginfo('siteurl');?>/profile/"> Ywam User</a> </p>
	   </div>
  </li>
  <li class="singlevideo col-lg-3" data-id="0"> 
	  <img src="<?php bloginfo('template_url');?>/images/default_video.jpg">
	   <div class="imagecaption">
	   	 <h4> Video Name </h4> 
	   	  <p class="datecaption"> June 18,2013 </p>
	   	  <p class="datecaption"> by <a href="<?php bloginfo('siteurl');?>/profile/"> Ywam User</a> </p>
	   </div>
  </li>
  <li class="singlevideo col-lg-3" data-id="0"> 
	  <img src="<?php bloginfo('template_url');?>/images/default_video.jpg">
	   <div class="imagecaption">
	   	 <h4> Video Name </h4> 
	   	  <p class="datecaption"> June 18,2013 </p>
	   	  <p class="datecaption"> by <a href="<?php bloginfo('siteurl');?>/profile/"> Ywam User</a> </p>
	   </div>
  </li>
  <li class="singlevideo col-lg-3" data-id="0"> 
	  <img src="<?php bloginfo('template_url');?>/images/default_video.jpg">
	   <div class="imagecaption">
	   	 <h4> Video Name </h4> 
	   	  <p class="datecaption"> June 18,2013 </p>
	   	  <p class="datecaption"> by <a href="<?php bloginfo('siteurl');?>/profile/"> Ywam User</a> </p>
	   </div>
  </li>
 
</ul>