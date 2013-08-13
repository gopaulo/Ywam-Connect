<div id="map-canvas"> </div>
<?php
 $action =$_GET['action'];
 $location = $_GET['location'];
?>
<script>
$ = jQuery;
	var map;
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

				<?php if ($location): ?>
						mgr = new MarkerManager(map);
						google.maps.event.addListener(mgr, 'loaded', function() {
								//for (var i = 0; i < 1000; i++) {
									var marker = new google.maps.Marker({
										position: new google.maps.LatLng(<?=$location ?>),
										animation: google.maps.Animation.DROP,
										// animation disabled because it slows down performance
										title: "Random marker "
									});
								var infowindow = new google.maps.InfoWindow({
									content: 'Testing	'
								});
								google.maps.event.addListener(marker, 'click', function() {
									infowindow.open(map, marker);
								});
									map.setCenter(marker.getPosition());
									mgr.addMarker(marker, 0);
								//}
								mgr.refresh();
			    });
			 <?php endif; ?>
			});
		}
	}
	jQuery(document).ready(function(e) {
		$('#map-canvas').height($(document).height()-122);
		initialize();
 
	});
</script>
