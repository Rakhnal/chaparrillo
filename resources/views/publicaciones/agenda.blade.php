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
<meta name="csrf_token" content="{{ csrf_token() }}">
<script src='agendaJs/core/locales/es.js'></script>
<script src='agendaJs/core/main.js'></script>
<script src='agendaJs/interaction/main.js'></script>
<script src='agendaJs/daygrid/main.js'></script>
<script src='agendaJs/list/main.js'></script>
<script src='agendaJs/google-calendar/main.js'></script>
<script>

    $(document).ready(function () {

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

                var eventos = new Array();

//                for (var i = 0; i < respuesta.length; i++) {
//                    alert(respuesta[i].title);
//                }

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

                    events: [
                        {
                            'title': 'Evento1',
                            'start': '2020-03-05',
                            'end': '2020-03-08'
                        }
                    ],

                    // THIS KEY WON'T WORK IN PRODUCTION!!!
                    // To make your own Google API key, follow the directions here:
                    googleCalendarApiKey: 'AIzaSyDcnW6WejpTOCffshGDDb4neIrXVUA1EAE',
                    eventClick: function (arg) {
                        // opens events in a popup window
                        arg.jsEvent.preventDefault() // don't navigate in main tab
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

<div class="col">
    <div class="row">
        <div class="col fondo mt-2 mb-2 agend">
            <div class="row h-100 parallax justify-content-center align-items-center" data-parallax="scroll" data-image-src="images/chaparrillo/elegidas/agenda.jpg">
                <h1 class="bolder">Agenda</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div id='loading'>Cargando...</div>
        <div class="col-6">
            <div class="mb-3" id="calendar">

            </div>
        </div>
        <div class="col-6">
            <div id="muestraEvento">

            </div>
        </div>

        <div id="respuesta">

        </div>
    </div>

</div>
@endsection
