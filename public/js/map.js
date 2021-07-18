
var map;

function initialize() {

	var LatLng = new google.maps.LatLng(27.27471, 91.23963);
	
	var opts = {
    center: LatLng,
	zoom:16,
	mapTypeId:google.maps.MapTypeId.HYBRID
	}

	var maps = document.getElementById('googlemap')
	map = new google.maps.Map(maps, opts);

	google.maps.event.addListener(map,'click',function(event) {
        document.getElementById('lat').value = event.latLng.lat()
		document.getElementById('lon').value = event.latLng.lng()
    });

    var placeMarker = new google.maps.Marker({
    position:LatLng,
	map:map,
	draggable:true,
    title:"Mongar Dzongkhag!"
    });
    
    google.maps.event.addListener(map,'mousemove',function(event) {
	//To show the longtitude and lattitude
	document.getElementById('latlong').innerHTML = event.latLng.lat() + ', ' + event.latLng.lng()
    });
}
