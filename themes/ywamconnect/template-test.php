<?php

/* Template Name: Form Tester  */

get_header();
?>


<div class="container">
   <div class="col-lg-8">
   	<div id="imageministry"> </div>
   		<p class="profilep"> <span class="profilelabel"> Started: </span><span id="date">  </span></p>	
   		<p class="profilep"> <span class="profilelabel"> Email: </span> <span id="email">  </span> </p>
   		<p class="profilep"> <span class="profilelabel"> Website: </span> <span id="website">  </span> </p>
      <p class="profilep"> <span class="profilelabel"> Phone: </span> <span id="phone">  </span> </p>
   		<p class="profilep"> <span class="profilelabel"> Posted By: </span> <span id="postedby">  </span> </p>
   		<p class="profilep" id="description"> </p>
   </div>
   <div class="col-lg-4">
    <h4> People Following this ministry <small> (<span id="number">100</span>)</small></h4>
    <ul id="peopleFollowing">

    </ul>
    <h4> Ministry Video </h4>
    <div id="ministryVideo">
    </div>
   </div>
</div>

<?php get_footer(); ?>