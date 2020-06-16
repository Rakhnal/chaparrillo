/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var MapaEvento2;


function PintarMapa(latitud, longitud) {

    var mapa2 = new google.maps.LatLng(latitud, longitud);
    
    var ColocaMapa3 = {
        zoom: 2,
        center: mapa2,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    
    if (document.getElementById("mapalugar") != null) {
        MapaEvento2 = new google.maps.Map(document.getElementById("mapalugar"), ColocaMapa3);
        

        marcadorEvento2 = new google.maps.Marker({
            position: mapa2,
            icon: "images/icons/location.svg",
            map: MapaEvento2
        });

        
    }



}


