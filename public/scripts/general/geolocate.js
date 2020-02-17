$(document).ready(function () {

    var marcadorRegistro;

    var MapaRegistro;

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(Sacalugar, nofunciona);
    } else {
        alert("Este navegador no soporta geolocalización");
    }
    
    $('#btnreset').on('click', resetMarker);

    function Sacalugar(position) {
        var latitud = position.coords.latitude;
        var longitud = position.coords.longitude;
        var mapa = new google.maps.LatLng(latitud, longitud);

        var ColocaMapa = {
            zoom: 15,
            center: mapa,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        if (document.getElementById("map") != null) {
            var PintaMapa = new google.maps.Map(document.getElementById("map"), ColocaMapa);

            var marca = new google.maps.Marker({
                position: mapa,
                icon: "images/icons/location.svg",
                map: PintaMapa
            });
        }

        if (document.getElementById("map2") != null) {
            var PintaMapa = new google.maps.Map(document.getElementById("map2"), ColocaMapa);

            var marca = new google.maps.Marker({
                position: mapa,
                icon: "images/icons/location.svg",
                map: PintaMapa
            });
        }

        if (document.getElementById("mapaRegistro") != null) {
            MapaRegistro = new google.maps.Map(document.getElementById("mapaRegistro"), ColocaMapa);

            marcadorRegistro = new google.maps.Marker({
                position: mapa,
                icon: "images/icons/location.svg",
                map: PintaMapa
            });
        }
        
        google.maps.event.addListener(MapaRegistro, "click", mapClick);
        // var vercalle = new google.maps.StreetViewPanorama(document.getElementById("map"), calle);
        
        localStorage.setItem('latitud', latitud);
        localStorage.setItem('longitud', longitud);
    }

    function markerCoords(markerobject) {
        google.maps.event.addListener(markerobject, 'dragend', function (evt) {
            infoWindow.setOptions({
                content: '<p>Marker dropped: Current Lat: ' + evt.latLng.lat().toFixed(3) + ' Current Lng: ' + evt.latLng.lng().toFixed(3) + '</p>'
            });
            infoWindow.open(map, markerobject);
        });

        google.maps.event.addListener(markerobject, 'drag', function (evt) {
            console.log("marker is being dragged");
        });
    }

    function mapClick(event) {

        // get lat/lon of click
        var clickLat = event.latLng.lat();
        var clickLon = event.latLng.lng();

        // show in alert box
        alert(clickLat + "" + clickLon);

        marcadorRegistro = new google.maps.Marker({
            position: new google.maps.LatLng(clickLat, clickLon),
            icon: "images/icons/location.svg",
            map: MapaRegistro
        });

        google.maps.event.clearListeners(MapaRegistro, 'click');
    }
    
    // Reinicia el marcador del mapa de Registro
    function resetMarker() {
        google.maps.event.addListener(MapaRegistro, "click", mapClick);
        
        marcadorRegistro.setMap(null);
    }

    function nofunciona(position) {
        alert("Error al cargar");
    }

});
