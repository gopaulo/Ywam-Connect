<?php
// Load controllers (js)

$params = array('limit'=>-1);
$bases = pods('base',$params);
?>
<div class="container">
<div class="col-lg-2" > 
	<div  id="sidebar-left" >
	<?php get_sidebar('home'); ?>
	</div>
 </div>
<div class="col-lg-8"> 
 		<?php get_template_part('templates/map/map');?>
</div>
<div class="col-lg-2" > 
	<div  class="sidebar" data-spy="affix" data-offset-top="200">
	 <?php get_sidebar('newsfeed');?>
	 </div>
	</div>
</div>

	<script>
	$ = jQuery;
		

		 jQuery(document).ready(function(ev){
		 	$(document).on('maploaded',function(k){
		 		var map  = window.map;
		 		var mgr = window.mgr;
		 		var markerlist =  amplify.store('markers');
		 		var marker =  '',
		 		infowindow =   '';
		 		<?php while($bases->fetch()): ?>
			 		 marker = new google.maps.Marker({
											position: new google.maps.LatLng(<?=$bases->display("latlong"); ?>),
											//animation: google.maps.Animation.DROP,
											// animation disabled because it slows down performance
											name: '<?= $bases->display("post_title"); ?>',
											bid: '<?= $bases->field("ID"); ?>'
										});
					 marker_test = {
						location: '<?=$bases->display("latlong"); ?>',
						name: '<? $bases->display("post_title"); ?>',
						type: 'base'
					};
					console.log('marker',marker);
					//markerlist.push(marker_test);
			 		 infowindow = new google.maps.InfoWindow({
									content: '<h4><a href="<?= get_bloginfo('siteurl');?>/base/<?= $bases->display('post_name');?>"><?= $bases->display('post_title');?></a></h4><?= str_replace(array("\r","\n"),"",$bases->display("post_content")); ?>'
								});
					google.maps.event.addListener(marker, 'click', function() {
						console.log('open',marker.bid);
						$('#sidebar-left').animate({
							left:'-350px'
						},300,function(ok){
							$.ajax({
								url: $wpapi + 'loadSidebar',
								data: {
									bid: marker.bid
								}
							}).done(function(res){
								console.log('function',res);
								$('#sidebar-left').html(res.html);
								//load controller dynamically
								$.getScript(res.script);
								$('#sidebar-left').animate({
								left:'0px'
							},300);
							});
							
						});
						infowindow.open(map, marker);
					});
					mgr.addMarker(marker, 0);
	 			<?php endwhile; ?>
		 		 
		 	});
		 	
		 });
		</script>
