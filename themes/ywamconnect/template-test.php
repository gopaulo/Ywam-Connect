<?php

/* Template Name: Form Tester  */

get_header();
?>


<div class="container">
   <div class="col-lg-8">
   	<div id="imageevent"> </div>
   		<p class="profilep"> <span class="profilelabel"> Time & Date: </span> 22/12/1988 </p>	
   		<p class="profilep"> <span class="profilelabel"> Location: </span> 22/12/1988 </p>
   		<p class="profilep"> <span class="profilelabel"> Cost: </span> 22/12/1988 </p>
   		<p class="profilep"> <span class="profilelabel"> Posted By: </span> 22/12/1988 </p>
   		<p class="profilep"> <span class="profilelabel"> More Info: </span> 22/12/1988 </p>
   		<p class="profilep"> Description </p>
   </div>
   <div class="col-lg-4">
    <h4> People Attending this event <small> (100)</small></h4>
    <ul id="peopleAttending">

    </ul>
    <p> Are you attending this event? <a href="#" class="btn btn-small btn-success"> Yes </a> <a href="#" class="btn btn-small btn-danger"> No </a></p>
    <h4> Promo Video </h4>
    <div id="promovideo">
    </div>
   </div>
</div>

<?php get_footer(); ?>