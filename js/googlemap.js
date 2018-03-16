function initMap() {
	var kino = {
		lat: 58.37821,
		lng: 26.73054732
	};

	var map = new google.maps.Map(document.getElementById('google'), {
		zoom: 15,
		center: kino,
    mapTypeId: 'satellite'
	});

	var marker = new google.maps.Marker({
		position: kino,
		animation: google.maps.Animation.BOUNCE,
		map: map
	});

	var infowindow = new google.maps.InfoWindow({
		content: '<div style="text-align: center;"><a style="color: #000;">Kino Cinamon Tasku keskuses</a></div>'
	});

	marker.addListener('click', function() {
		map.setZoom(16);
		map.setCenter(kino);
		infowindow.open(map, marker);
	});
}
