<?php

  $bid = $_GET['bid'];
  $base = get_post($bid);
  $termfull = get_term_by('slug',$term,'event_category');
?>
<p class="pull-right addbtn follownumber">Total of <span class="totalusers"> X </span> people following this base </p>

<h3 style="padding-top: 0px;margin-top:0px;" >People - <?=$base->post_title;?></h3>
<ul id="eventlist" class="row">
	<li class="singlefollower col-lg-6" data-id="0"> 
	 <div class="row">
	   <div class="col-lg-4">
			<a href="<?php bloginfo('siteurl');?>/profile/"><img src="<?php bloginfo('template_url');?>/images/default_user.jpg"></a>
	  </div>
	   <div class="col-lg-8 userdatacaption">
	   <a href="#" class="addfriend" rel="tooltip" title="Add as friend"><img src="<?php bloginfo('template_url');?>/images/addfriend.jpg"></a>
	   	 <a href="<?php bloginfo('siteurl');?>/profile/" class="usernamecaption"> User Name </a> 
	   	  <p class="locationusercaption"> Current Location:  </p>
	   </div>
	</li>
	<li class="singlefollower col-lg-6" data-id="0"> 
	 <div class="row">
	   <div class="col-lg-4">
			<a href="<?php bloginfo('siteurl');?>/profile/"><img src="<?php bloginfo('template_url');?>/images/default_user.jpg"></a>
	  </div>
	   <div class="col-lg-8 userdatacaption">
	   <a href="#" class="addfriend" rel="tooltip" title="Add as friend"><img src="<?php bloginfo('template_url');?>/images/addfriend.jpg"></a>
	   	 <a href="<?php bloginfo('siteurl');?>/profile/" class="usernamecaption"> User Name </a> 
	   	  <p class="locationusercaption"> Current Location:  </p>
	   </div>
	</li>
	<li class="singlefollower col-lg-6" data-id="0"> 
	 <div class="row">
	   <div class="col-lg-4">
			<a href="<?php bloginfo('siteurl');?>/profile/"><img src="<?php bloginfo('template_url');?>/images/default_user.jpg"></a>
	  </div>
	   <div class="col-lg-8 userdatacaption">
	   <a href="" class="addfriend" rel="tooltip" title="Add as friend"><img src="<?php bloginfo('template_url');?>/images/addfriend.jpg"></a>
	   	 <a href="<?php bloginfo('siteurl');?>/profile/" class="usernamecaption"> User Name </a> 
	   	  <p class="locationusercaption"> Current Location:  </p>
	   </div>
	</li>
	<li class="singlefollower col-lg-6" data-id="0"> 
	 <div class="row">
	   <div class="col-lg-4">
			<a href="<?php bloginfo('siteurl');?>/profile/"><img src="<?php bloginfo('template_url');?>/images/default_user.jpg"></a>
	  </div>
	   <div class="col-lg-8 userdatacaption">
	   <a href="#" class="addfriend" rel="tooltip" title="Add as friend"><img src="<?php bloginfo('template_url');?>/images/addfriend.jpg"></a>
	   	 <a href="<?php bloginfo('siteurl');?>/profile/" class="usernamecaption"> User Name </a> 
	   	  <p class="locationusercaption"> Current Location:  </p>
	   </div>
	</li>


</ul>