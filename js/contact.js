jQuery(document).ready(
	function()
	{
		var center_address='401 sunset ave windsor ontario';
		var myCenter=false;
		var otherLatLon=false;
		var marker;
		var update_needed=false;
		var marker2=false;
		var geocoder = new google.maps.Geocoder();
		var map=false;
		var poly=false;
		
		function initializeMarkers()
		{
			var mapProp = {
			  center:myCenter,
			  zoom:15,
			  mapTypeId:google.maps.MapTypeId.ROADMAP
			}; // end mapProp.

			map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

			marker=new google.maps.Marker({
			  position:myCenter,
			  animation:google.maps.Animation.BOUNCE
			  });
			  
			  marker.setMap(map);
			  
			marker2=new google.maps.Marker({
			  position:myCenter,
			  animation:google.maps.Animation.BOUNCE
			  });

			  marker2.setMap(map);
		} // end initialize function

		// Asynchronously gets the position(latitude,longitude) from center address.
		// when the position comes from the Google Maps service, the points get shown.
		function initialize()
		{
			geocoder.geocode({'address': center_address },
					function(results,status)
					{
						if (status==google.maps.GeocoderStatus.OK)
						{
							myCenter = results[0].geometry.location;
							initializeMarkers();
						}
					}
				);
		}
		
		function drawLineBetweenMarkers()
		{
			//Intialize the Path Array
			var path = new google.maps.MVCArray();
	 
			//Intialize the Direction Service
			var service = new google.maps.DirectionsService();
	 
			if (poly)
				poly.setMap(null); // remove from map.
				
			poly = new google.maps.Polyline({ 'map': map, 'strokeColor': 'rgb('
			+Math.round(Math.random()*255)+","+Math.round(Math.random()*255)+","+
			Math.round(Math.random()*255)+")"});
			
			var lat_lng = [myCenter,otherLatLon];
	 
			//Loop and Draw Path Route between the Points on MAP
			var src = otherLatLon;
			var des = myCenter;
			path.push(src);
			poly.setPath(path);
			
			service.route({
				origin: src,
				destination: des,
				travelMode: google.maps.TravelMode.DRIVING
			}, function (result, status) {
				if (status == google.maps.DirectionsStatus.OK) {
					//Set the Path Stroke Color
					
					//1616 university ave west windsor
					for (var i = 0, len = result.routes[0].overview_path.length; i < len; i++) {
						path.push(result.routes[0].overview_path[i]);
					}
				}
			});
		}
		
		function update_if_needed()
		{
			// don't do anything more if an update is not needed.
			if (!update_needed)
				return;

			update_needed=false;
			geocoder.geocode({'address': jQuery('#address').val() },
				function(results,status)
				{
					if (status==google.maps.GeocoderStatus.OK)
					{
						otherLatLon = results[0].geometry.location;
						
						marker2.setPosition( otherLatLon );
						//alert("moved marker.");
						
						
						// rezoom the map to fit it on the 2 markers.
						var bounds = new google.maps.LatLngBounds();
						bounds.extend(myCenter);
						bounds.extend(otherLatLon);
						map.fitBounds(bounds);
						map.panToBounds(bounds);
						
						drawLineBetweenMarkers();
					}
				}
			);
		}
		
		// initialize the map.
		initialize();
		
		// call back as keys are typed into the address field.
		jQuery('#address').keyup(function()
		{
			update_needed=true;
		});
		
		// periodically update the map if it was updated.(every 2500ms)
		window.setInterval(update_if_needed,2500);
	}
 );