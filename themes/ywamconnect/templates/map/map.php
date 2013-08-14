 <script src=""></script>
 <?php 

  wp_enqueue_script('gmaps', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', array(), '3', true); 
  wp_enqueue_script('markermanager', 'http://google-maps-utility-library-v3.googlecode.com/svn/trunk/markermanager/src/markermanager.js"', array('gmaps'), '3', true); 

  ?> 
<div id="map-canvas"> </div>
<?php


 //action exception: single location markers
 $location = $_GET['location'];
 $locationdesc = $_GET['locationdesc'];
 $locationdesc  = str_replace(array("\r","\n"),"",$locationdesc);
 

?>
<script>
$ = jQuery;
	var map;
	var mgr; 
	function initialize() {
		google.maps.visualRefresh = true;

		var obj = {};
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function(position) {
				obj.latitude = position.coords.latitude;
				obj.longitude = position.coords.longitude;

				console.log('obj', obj);
				var mapOptions = {
					zoom: 8,
					center: new google.maps.LatLng(obj.latitude, obj.longitude),
					mapTypeId: google.maps.MapTypeId.ROADMAP
				};

				map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

					var markerlist = [] ; 

						mgr = new MarkerManager(map);
						google.maps.event.addListener(mgr, 'loaded', function() {
								//for (var i = 0; i < 1000; i++) {
							var marker_test = false;
							<?php if ($location): ?>
									var marker = new google.maps.Marker({
										position: new google.maps.LatLng(<?=$location ?>),
										animation: google.maps.Animation.DROP,
										// animation disabled because it slows down performance
										name: 'single location'
									});
									 marker_test = {
										location: '<?=$location ?>',
										name: 'single',
										type: 'base'
									};
								markerlist.push(marker);
								var infowindow = new google.maps.InfoWindow({
									content: "<?= $locationdesc; ?>"
								});
								google.maps.event.addListener(marker, 'click', function() {
									infowindow.open(map, marker);
								});
									map.setCenter(marker.getPosition());
									mgr.addMarker(marker, 0);
								//}
								mgr.refresh();
							 <?php endif; ?>
							 if(marker_test)
							 	amplify.store('markers',marker_test);
							 var eventmap = jQuery.Event("maploaded");
							 $(document).trigger(eventmap)
					
			    });
			
			});
		}
	}
	jQuery('body').ready(function(e) {
		console.log('loaded');
		$('#map-canvas').height($(document).height()-140);
		initialize();
 
	});
</script>
