$(document).ready(function () {

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(Sacalugar, nofunciona);
        } else {
            alert("En este navegador no rula la geolocalización");
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
            // var vercalle = new google.maps.StreetViewPanorama(document.getElementById("map"), calle);

            var marca = new google.maps.Marker({
                position: mapa,
                map: PintaMapa
            });
        }
        
        function nofunciona(position) {
            alert("Aqui no funciona na");
        };
        
});