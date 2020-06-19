/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var MapaEvento2;


function PintarMapa(latitud, longitud, num) {

    var mapa2 = new google.maps.LatLng(latitud, longitud);
    
    var ColocaMapa3 = {
        zoom: 3,
        center: mapa2,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    
    if (document.getElementById("mapalugar"+num) !== null) {
        MapaEvento2 = new google.maps.Map(document.getElementById("mapalugar"+num), ColocaMapa3);
        

        marcadorEvento2 = new google.maps.Marker({
            position: mapa2,
            icon: "images/icons/location.svg",
            map: MapaEvento2
        });

        
    }



}


