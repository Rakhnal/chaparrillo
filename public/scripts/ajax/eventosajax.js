$(document).ready(function () {

//Cabecera obligatoria para solventar lo del csrf de Laravel.
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

//Primer ejemplo. Al pulsar el botón se lanza el controlador.
    $('.b-modify').click(function () {
        //var parametros = {"id": this.val()};

        var parametros = $(this).attr('data-user');
        var token = '{{ csrf_token() }}';

        $.ajax({
            url: 'modificarEventos',
            data: {parametros, _token: token},
            dataType: "application/json",
            proccessData: false,
            type: 'post',
            success: function (response) {
                //alert(response);
                var evento = JSON.stringify(response);

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

});