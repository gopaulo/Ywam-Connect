<?php
if(isset($_GET['yid'])) {
	$current_user = get_user_by('id',$uid);
}else $current_user =  wp_get_current_user();

$uid = $current_user->ID; 
//echo $uid;
?>
<div id="countryFlag">
	<img src="<?php bloginfo('template_url');?>/images/flags/flat/48/US.png"/> <br/>
	<img src="<?php bloginfo('template_url');?>/images/flags/flat/48/BR.png"/> </div> 

<img class="profilepic" src="<?php bloginfo('template_url');?>/images/default_user.jpg">
<h4> Andrew West </h4>

<div class="profiledivider"> </div>
<p class="profilep"> <span class="profilelabel"> Born: </span> 22/12/1988 </p>
<p class="profilep"> <span class="profilelabel"> Home Location: </span> 22/12/1988 </p>
<p class="profilep"> <span class="profilelabel"> Current Location: </span> 22/12/1988 </p>
<p class="profilep"> <span class="profilelabel"> Status: </span> 22/12/1988 </p>

<div class="profiledivider"> </div>
<p class="profilep"> <span class="profilelabel"> Attended DTS: </span> 22/12/1988 </p>
<p class="profilep"> <span class="profilelabel"> Interests: </span> 22/12/1988 </p>
<p class="profilep"> <span class="profilelabel"> Skills: </span> 22/12/1988 </p>
<p class="profilep"> <span class="profilelabel"> Sphere of Engagement: </span> 22/12/1988 </p>
<p class="profilep"> <span class="profilelabel"> Occupation: </span> 22/12/1988 </p>
<p class="profilep"> <span class="profilelabel"> Ministries: </span> 22/12/1988 </p>

<div class="profiledivider"> </div>
<p class="profilep"> <span class="profilelabel"> Email: </span> 22/12/1988 </p>
<p class="profilep"> <span class="profilelabel"> Web: </span> 22/12/1988 </p>
<p class="profilep"> <span class="profilelabel"> Phone: </span> 22/12/1988 </p>

<div class="profiledivider"> </div>
	   <a href="#" rel="tooltip" title="Add as friend"><img src="<?php bloginfo('template_url');?>/images/addfriend.jpg"> Add as friend</a>
