$(document).ready(function () {

    function geolocalizar() {

        GMaps.geolocate({

            success: function (position) {

                lat = position.coords.latitude;
                lng = position.coords.longitude;

                map = new GMaps({
                    el: '.map',
                    lat: lat,
                    lng: lng
                });

                map.addMarker({
                    lat: lat,
                    lng: lng,
                    label: 'You',
                    icon: {
                        path: google.maps.SymbolPath.CIRCLE,
                        scale: 20,
                        strokeColor: '#008B8B',
                        fillColor: '#008B8B',
                        fillOpacity: 0.4
                    }
                });
            },

            error: function (error) {

                alert('Error geolocalización: ' + error.message);

            },

            not_supported: function () {

                alert("La geolocalización no es soportada en este navegador");

            }

        });
    }
    
    $('.eventos').load(geolocalizar);
    $('.map').html("");
});