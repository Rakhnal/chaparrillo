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

    var marcadorEU;
    var MapaEU;
    
    

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(Sacalugar, nofunciona);
    } else {
        toastr.error('Este navegador no soporta geolocalización', '¡Error!');
    }
    $('#btnresetEU').on('click', resetMarkerEU);
    

    function Sacalugar(position) {

        var latitud;
        var longitud;
        
        if (null !== document.getElementById("latitudInputEU") && document.getElementById("latitudInputEU").value !== "") {
            latitud = document.getElementById("latitudInputEU").value;
            longitud = document.getElementById("longitudInputEU").value;
        } else {
            latitud = position.coords.latitude;
            longitud = position.coords.longitude;
        }

        var mapa = new google.maps.LatLng(latitud, longitud);
        var mapa2 = new google.maps.LatLng(document.getElementById("latitudEvent").value, document.getElementById("longitudEvent").value);

        var ColocaMapa = {
            zoom: 15,
            center: mapa,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        
        var ColocaMapa2 = {
            zoom: 15,
            center: mapa2,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        if (document.getElementById("mapaEditUs") !== null) {
            MapaEU = new google.maps.Map(document.getElementById("mapaEditUs"), ColocaMapa);

            marcadorEU = new google.maps.Marker({
                position: mapa,
                icon: "images/icons/location.svg",
                map: MapaEU
            });
            
        }
        // var vercalle = new google.maps.StreetViewPanorama(document.getElementById("map"), calle);

        localStorage.setItem('latitud', latitud);
        localStorage.setItem('longitud', longitud);
    }
    function mapClickEU(event) {

        // get lat/lon of click
        var clickLat = event.latLng.lat();
        var clickLon = event.latLng.lng();

        $('#latitudInputEU').val(clickLat);
        $('#longitudInputEU').val(clickLon);

        marcadorEU = new google.maps.Marker({
            position: new google.maps.LatLng(clickLat, clickLon),
            icon: "images/icons/location.svg",
            map: MapaEU
        });

        google.maps.event.clearListeners(MapaEU, 'click');
    }
    // Reinicia el marcador del mapa de Registro

    function resetMarkerEU() {
        google.maps.event.addListener(MapaEU, "click", mapClickEU);

        $('#latitudInputEU').val(null);
        $('#longitudInputEU').val(null);

        marcadorEU.setMap(null);
    }

    function nofunciona(position) {
        toastr.error('No tienes activado la geolocalización, algunas características dejarán de funcionar', '¡Error!');
    }

});
