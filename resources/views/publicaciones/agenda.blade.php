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

<link href="css/administracion/admin_style.css" type="text/css" rel="stylesheet">
<link href='agenda/core/main.css' rel='stylesheet' />
<link href='agenda/daygrid/main.css' rel='stylesheet' />
<link href='agenda/list/main.css' rel='stylesheet' />
<meta name="csrf_token" content="{{ csrf_token() }}">
<script src='agenda/core/locales/es.js'></script>
<script src='agenda/core/main.js'></script>
<script src='agenda/interaction/main.js'></script>
<script src='agenda/daygrid/main.js'></script>
<script src='agenda/list/main.js'></script>
<script src='agenda/google-calendar/main.js'></script>
<script>

    document.addEventListener('DOMContentLoaded', function () {
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
            // http://fullcalendar.io/docs/google_calendar/
            googleCalendarApiKey: 'AIzaSyDcnW6WejpTOCffshGDDb4neIrXVUA1EAE',
            eventClick: function (arg) {
                // opens events in a popup window
                window.open(arg.event.url, 'google-calendar-event', 'width=700,height=600');
                arg.jsEvent.preventDefault() // don't navigate in main tab
            },
            loading: function (bool) {
                document.getElementById('loading').style.display =
                        bool ? 'block' : 'none';
            }

        });
        calendar.render();
    });

</script>
<style>

    #loading {
        display: none;
        position: absolute;
        top: 10px;
        right: 10px;
    }

    #calendar {
        max-width: 900px;
        margin: 0 auto;
    }

</style>

<div class="col">
    <div class="row">
        <div class="col">
            <nav>
                <div class="breadcrumb" id="migas">
                    <div class="breadcrumb-item">Usuario</div>
                    <div class="breadcrumb-item active">Agenda</div>
                </div>
            </nav>
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
