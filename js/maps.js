function initialize() {
	var myLatLng={lat: 45.6868138, lng: 9.178672799999958}
    var centro={lat: 45.6910447, lng: 9.179511}
            var mapOptions = {
                center: centro,
                zoom: 13,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                scrollwheel: false,
                draggable: true,
                panControl: true,
                zoomControl: true,
                mapTypeControl: false,
                scaleControl: true,
                streetViewControl: true,
                overviewMapControl: true,
                rotateControl: true,
            };
            var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
			marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(45.6868138, 9.178672799999958)});
			infowindow = new google.maps.InfoWindow({content:"<b>IIS Jean Monnet</b>" });
			google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});
			infowindow.open(map,marker);
		
		
        }
        google.maps.event.addDomListener(window, 'load', initialize);