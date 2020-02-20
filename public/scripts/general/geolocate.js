$(document).ready(function () {

    toastr.options = {
        "debug": false,
        "positionClass": "toast-bottom-right",
        "onclick": null,
        "fadeIn": 300,
        "fadeOut": 1000,
        "timeOut": 5000,
        "extendedTimeOut": 1000,
        "preventDuplicates": true
    };

    var marcadorRegistro;
    var marcadorEvento1;

    var MapaRegistro;
    var MapaEvento;

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(Sacalugar, nofunciona);
    } else {
        toastr.error('Este navegador no soporta geolocalización', '¡Error!');
    }

    $('#btnreset').on('click', resetMarker);
    $('#btnreset2').on('click', resetMarker2);

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
            MapaEvento = new google.maps.Map(document.getElementById("map"), ColocaMapa);

            marcadorEvento1 = new google.maps.Marker({
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
        google.maps.event.addListener(MapaEvento, "click", mapClick2);
        // var vercalle = new google.maps.StreetViewPanorama(document.getElementById("map"), calle);
        
        localStorage.setItem('latitud', latitud);
        localStorage.setItem('longitud', longitud);
    }

    function mapClick(event) {

        // get lat/lon of click
        var clickLat = event.latLng.lat();
        var clickLon = event.latLng.lng();
        
        $('#latitudInput').val(clickLat);
        $('#longitudInput').val(clickLon);

        marcadorRegistro = new google.maps.Marker({
            position: new google.maps.LatLng(clickLat, clickLon),
            icon: "images/icons/location.svg",
            map: MapaRegistro
        });

        google.maps.event.clearListeners(MapaRegistro, 'click');
    }
    
    function mapClick2(event) {

        // get lat/lon of click
        var clickLat = event.latLng.lat();
        var clickLon = event.latLng.lng();
        
        $('#latitud').val(clickLat);
        $('#longitud').val(clickLon);

        marcadorEvento1 = new google.maps.Marker({
            position: new google.maps.LatLng(clickLat, clickLon),
            icon: "images/icons/location.svg",
            map: MapaEvento
        });

        google.maps.event.clearListeners(MapaEvento, 'click');
    }

    // Reinicia el marcador del mapa de Registro
    function resetMarker() {
        google.maps.event.addListener(MapaRegistro, "click", mapClick);
        
        $('#latitudInput').val(null);
        $('#longitudInput').val(null);

        marcadorRegistro.setMap(null);
    }
    
    function resetMarker2() {
        google.maps.event.addListener(MapaEvento, "click", mapClick2);
        
        $('#latitud').val(null);
        $('#longitud').val(null);

        marcadorEvento1.setMap(null);
    }

    function nofunciona(position) {
        toastr.error('No tienes activado la geolocalización, algunas características dejarán de funcionar', '¡Error!');
    }

});
