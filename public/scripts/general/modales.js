$(document).ready(function () {

    $('.blurmodal').click(function () {
         $("#blur").css("filter", "blur(5px)");
    });
    
    $('.salir').click(function (){
        $("#blur").css("filter", "none");
    });
    
});