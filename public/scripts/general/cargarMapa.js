/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var MapaEvento2;

$('#btnreset3').on('click', resetMarker3);

function PintarMapa(latitud, longitud) {


    var mapa2 = new google.maps.LatLng(latitud, longitud);

    var ColocaMapa2 = {
        zoom: 15,
        center: mapa2,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    if (document.getElementById("map2") != null) {
        MapaEvento2 = new google.maps.Map(document.getElementById("map2"), ColocaMapa2);

        marcadorEvento2 = new google.maps.Marker({
            position: mapa2,
            icon: "images/icons/location.svg",
            map: MapaEvento2
        });

        google.maps.event.addListener(MapaEvento2, "click", mapClick3);
    }



}

function mapClick3(event) {

    // get lat/lon of click
    var clickLat = event.latLng.lat();
    var clickLon = event.latLng.lng();

    $('#latitudEvent').val(clickLat);
    $('#longitudEvent').val(clickLon);

    marcadorEvento2 = new google.maps.Marker({
        position: new google.maps.LatLng(clickLat, clickLon),
        icon: "images/icons/location.svg",
        map: MapaEvento2
    });

    google.maps.event.clearListeners(MapaEvento2, 'click');
}

function resetMarker3() {
    google.maps.event.addListener(MapaEvento2, "click", mapClick3);

    $('#latitudEvent').val(null);
    $('#longitudEvent').val(null);

    marcadorEvento2.setMap(null);
}