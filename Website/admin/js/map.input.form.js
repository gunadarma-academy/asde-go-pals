var map;
var markers = [];
	
function initMap() {
	var depok = {lat: -6.40248440, lng: 106.79424050};
	map = new google.maps.Map(document.getElementById('map-canvas'), {
		zoom: 15,
		center: depok,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	});

	// This event listener will call addMarker() when the map is clicked.
	map.addListener('click', function(event) {
		deleteMarkers();
		addMarker(event.latLng);
		document.getElementById('latitude').value=event.latLng.lat();
		document.getElementById('longitude').value=event.latLng.lng();
	});
}
		
function addMarker(location) {
	var marker = new google.maps.Marker({
		position: location,
		map: map
	});
	markers.push(marker);
}
		
function setMapOnAll(map) {
	for (var i = 0; i < markers.length; i++) {
	  markers[i].setMap(map);
	}
}
		
function clearMarkers() {
	setMapOnAll(null);
}
		
function deleteMarkers() {
	clearMarkers();
	markers = [];
}