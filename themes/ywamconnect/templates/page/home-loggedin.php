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
		 		<?php while($bases->fetch()): 

		 		$locationdesc = '<div class=\'popupmap\'> <h4><a class=\'popuptitle\' href=\''.get_bloginfo('siteurl').'/base/'.$bases->display('post_name').'\'>';
				$locationdesc.= $bases->display('post_title').'</a></h4>';
				$locationdesc.='<p class=\'profilep\'> <span class=\'profilelabel\'> Email: </span> '.$bases->display('email').'</p><p class=\'profilep\'> <span class=\'profilelabel\'> Web: </span> '.$bases->display('website').' </p><p class=\'profilep\'> <span class=\'profilelabel\'> Phone: </span> '.$bases->display('phone').' </p>';
				$locationdesc.='</div>';?>

			 		 marker = new google.maps.Marker({
											position: new google.maps.LatLng(<?=$bases->display("latlong"); ?>),
											//animation: google.maps.Animation.DROP,
											// animation disabled because it slows down performance
											name: '<?= $bases->display("post_title"); ?>',
											bid: '<?= $bases->field("ID"); ?>',
											icon: '<?= get_bloginfo("template_url")."/images/icons/blue.png"; ?>'
										});
					 marker_test = {
						location: '<?=$bases->display("latlong"); ?>',
						name: '<? $bases->display("post_title"); ?>',
						type: 'base'
					};
					console.log('marker',marker);
					//markerlist.push(marker_test);
			 		 infowindow = new google.maps.InfoWindow({

									content: "<?= $locationdesc; ?>"
								});
					google.maps.event.addListener(marker, 'click', function() {
						console.log('open',marker.bid);
						$('#sidebar-left').animate({
							left:'-350px'
						},300,function(ok){
							$.ajax({
								type: "POST",
								url: $wpapi + 'loadSidebar',
								data: {
									bid: marker.bid
								}
							}).done(function(res){
								console.log('function',res);
								$('#sidebar-left').html(res.html);
								//load controller dynamically
								for(var i=0;i<res.script.length;i++){ 
									$.getScript(res.script[i]);
								}
								$('input[name="bid"]').each(function(k) {
									$(this).val(marker.bid);
									});
 
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
