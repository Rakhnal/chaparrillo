$(document).ready(function () {

    $('#b-mapa').click(function () {
         $("#blur").css("filter", "blur(5px)");
    });
    
    $('#salir').click(function (){
        $("#blur").css("filter", "none");
    });

});