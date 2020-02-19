$(document).on ("click",".b-modify", function() {

//Cabecera obligatoria para solventar lo del csrf de Laravel.
//    $.ajaxSetup({
//        headers: {
//            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//        }
//    });
 
//Primer ejemplo. Al pulsar el botón se lanza el controlador.
//    $('.b-modify').click(function () {
        var token = '{{csrf_token()}}';
        var parametros = {
            "ide":$(this).attr('data-id'),
            "_token":token
        };
        
        alert($(this).attr('data-id'));
        
        $.ajax({
            url: "modificarEvento",
            data: parametros,
            type: "post",
            success: function (response) {
                alert(response);
                $(".respuesta").html(response);

            },
            statusCode: {
                404: function () {
                    alert('web not found');
                }
            },
            error: function (x, xs, xt) {
//                window.open(JSON.stringify(x));
                alert('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
            }
        });
    });

