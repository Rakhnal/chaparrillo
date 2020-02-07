$(document).ready(function () {

//Cabecera obligatoria para solventar lo del csrf de Laravel.
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

//Primer ejemplo. Al pulsar el botón se lanza el controlador.
    $('#myajax').click(function () {

        var parametros = {
            "nombre": "DAW2",
            "caj": $('#caja').val()
        };
        $.ajax({
            url: 'miJqueryAjax',
            //data:{'nombre':"DAW2"},
            data: parametros,
            type: 'post',
            success: function (response) {
                //alert(response);
                $(".respuesta1").html(response);

            },
            statusCode: {
                404: function () {
                    alert('web not found');
                }
            },
            error: function (x, xs, xt) {
                window.open(JSON.stringify(x));
                //alert('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
            }
        });
    });

//Segundo ejemplo. Al ir escribiendo se lanza el controlador dos.
    $("#caja").on('keyup', function () {

        //$(".respuesta").html($("#caja").val());

        var parametros = {
            "nombre": "DAW2",
            "caj": $('#caja').val()
        };
        $.ajax({
            url: 'miJqueryAjax',
            //data:{'nombre':"DAW2"},
            data: parametros,
            type: 'post',
            success: function (response) {
                //alert(response);
                $(".respuesta2").html(response);

            },
            statusCode: {
                404: function () {
                    alert('web not found');
                }
            },
            error: function (x, xs, xt) {
                window.open(JSON.stringify(x));
                //alert('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
            }
        });

    }).keyup();

});