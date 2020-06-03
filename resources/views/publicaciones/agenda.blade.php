<?php

use App\Clases\conexion;
use App\Clases\Auxiliares\Constantes;

session()->put("actPage", Constantes::AGENDA);
?>
@extends('../general/base')

@section('titulo')
Agenda
@endsection

@section('contenido')

<link href="css/agenda/agenda_style.css" type="text/css" rel="stylesheet">
<link href='agendaJs/core/main.css' rel='stylesheet' />
<link href='agendaJs/daygrid/main.css' rel='stylesheet' />
<link href='agendaJs/list/main.css' rel='stylesheet' />
<link href='css/agenda/magnific-popup.css' rel='stylesheet' />
<meta name="csrf_token" content="{{ csrf_token() }}">



<div class="col">
    <div class="row mt-3">
        <div id='loading'>Cargando...</div>
        <div class="col-xl-6 col-md-12">
            <div class="mb-3" id="calendar">

            </div>
        </div>
        <div class="col-xl-6 col-md-12">
            <div id="muestraEvento" class="row">
                <div class="col">
                    <div class="info-event row">
                        <div class="col">
                            <div class="row justify-content-center">
                                <a id="img-enlace" class="image-popup-no-margins" href="">
                                    <img src="" id="img-agenda" alt="Portada evento" class="img-fluid image-popup-no-margins">
                                </a>
                            </div>

                        </div>

                        <div class="textoAgenda col">
                            <div class="row">
                                <div id="nomb-event" ></div>
                            </div>
                            <div class="row">
                                <div id="localizacion" ></div>
                            </div>

                        </div>

                    </div>
                    <div id="desc-agenda" class="desc-agenda mt-3">

                    </div>
                    <div id="mapaAgenda" class="">

                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

<script>
//Script para mostrar agenda
    $(document).ready(function () {
        $('#img-agenda').hide();

        var token = '{{csrf_token()}}';
        var parametros = {
            "_token": token
        };
        $.ajax({
            url: "mostrarEventos",
            data: parametros,
            type: "post",
            success: function (response) {
                var respuesta = JSON.parse(response);
                var calendarEl = document.getElementById('calendar');
                var initialLocaleCode = 'es';
                var calendar = new FullCalendar.Calendar(calendarEl, {

                    plugins: ['interaction', 'dayGrid', 'list', 'googleCalendar'],
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,listYear'
                    },
                    locale: initialLocaleCode,
                    displayEventTime: false, // don't show the time column in list view

                    events: respuesta,
                    eventColor: '#8F7E4F',
                    // THIS KEY WON'T WORK IN PRODUCTION!!!
                    // To make your own Google API key, follow the directions here:
                    googleCalendarApiKey: 'AIzaSyDcnW6WejpTOCffshGDDb4neIrXVUA1EAE',
                    eventClick: function (arg) {
                        // opens events in a popup window
                        $('#img-agenda').show();
                        arg.jsEvent.preventDefault() // don't navigate in main tab

                        for (var i = 0; i < respuesta.length; i++) {
                            if (arg.event.title == respuesta[i].title) {
                                var eventoMostrar = respuesta[i];
                            }
                        }
                        $('#img-agenda').attr('src', 'data:image/png;base64,' + eventoMostrar.imagen);
                        $('#nomb-event').html('<h4>Evento:</h4> ' + eventoMostrar.title);
                        $('#localizacion').html('<h4>Localización:</h4> ' + eventoMostrar.localizacion);
                        $('#desc-agenda').html('<h4>Descripción:</h4>' + eventoMostrar.descripcion);

                        var tam = $('#desc-agenda').outerHeight();
                        $('#mapaAgenda').css({height: 'calc(350px - ' + tam + 'px)'});
                        $('#img-enlace').attr('href', 'data:image/png;base64,' + eventoMostrar.imagen);

                        PintarMapa(eventoMostrar.latitud, eventoMostrar.longitud);

                    },
                    loading: function (bool) {
                        document.getElementById('loading').style.display =
                                bool ? 'block' : 'none';
                    }

                });
                calendar.render();
            },
            statusCode: {
                404: function () {
                    alert('web not found');
                }
            },
            error: function (x, xs, xt) {
//                window.open(JSON.stringify(x));
                alert('error: ' + JSON.stringify(x) + "\n error string: " + xs + "\n error throwed: " + xt);
            }
        });
    });


</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.image-popup-no-margins').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
            closeBtnInside: false,
            fixedContentPos: true,
            mainClass: 'mfp-no-margins mfp-with-zoom',
            image: {
                verticalFit: true
            },
            zoom: {
                enabled: true,
                duration: 300
            }
        });
    });
</script>
<script src='agendaJs/jquery.magnific-popup.min.js'></script>
<script src='agendaJs/core/locales/es.js'></script>
<script src='agendaJs/core/main.js'></script>
<script src='agendaJs/interaction/main.js'></script>
<script src='agendaJs/daygrid/main.js'></script>
<script src='agendaJs/list/main.js'></script>
<script src='agendaJs/google-calendar/main.js'></script>
<script src="scripts/general/cargarMapa.js"></script>

@endsection
