$(document).ready(function () {

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(Sacalugar, nofunciona);
        } else {
            alert("Este navegador no soporta geolocalización");
        }

        function Sacalugar(position) {
            var latitud = position.coords.latitude;
            var longitud = position.coords.longitude;
            var mapa = new google.maps.LatLng(latitud, longitud);

            var ColocaMapa = {
                zoom: 15,
                center: mapa,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            var PintaMapa = new google.maps.Map(document.getElementById("map"), ColocaMapa);
            var PintaMapa2 = new google.maps.Map(document.getElementById("map2"), ColocaMapa);
            var PintaMapa3 = new google.maps.Map(document.getElementById("mapaRegistro"), ColocaMapa);
            // var vercalle = new google.maps.StreetViewPanorama(document.getElementById("map"), calle);

            var marca = new google.maps.Marker({
                position: mapa,
                icon: "images/icons/location.svg",
                map: PintaMapa
            });
            
            var marca2 = new google.maps.Marker({
                position: mapa,
                icon: "images/icons/location.svg",
                map: PintaMapa2
            });
            
            var marca3 = new google.maps.Marker({
                position: mapa,
                icon: "images/icons/location.svg",
                map: PintaMapa3
            });
        }
        
        function nofunciona(position) {
            alert("Error al cargar");
        };
        
});
