/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Comprueba si las contraseñas del formulario de registro son iguales
function samePasswords() {

    if ($('#passPpal').val() === $('#passVal').val()) {

        $('#passPpal').css('border', 'none');
        $('#passVal').css('border', 'none');
        $('#passPpal').css('border-bottom', '1px solid white');
        $('#passVal').css('border-bottom', '1px solid white');

    } else {
        $('#passPpal').css('border', '1px solid red');
        $('#passVal').css('border', '1px solid red');

        return false;
    }

    if ($('#latitudInput').val() === null || $('#latitudInput').val() === "" || $('#longitudInput').val() === null || $('#longitudInput').val() === "") {
        toastr.error('Falta seleccionar la ubicación en el mapa', '¡Error!');

        return false;

    }

    return true;
}

// Comprueba si las contraseñas del formulario de editar usuario son iguales
function samePasswordsEU() {

    if ($('#passw').val() === $('#passw2').val()) {

        $('#passw').css('border', 'none');
        $('#passw2').css('border', 'none');
        $('#passw').css('border-bottom', '1px solid white');
        $('#passw2').css('border-bottom', '1px solid white');

    } else {
        $('#passw').css('border', '1px solid red');
        $('#passw2').css('border', '1px solid red');

        return false;
    }
    return true;
}

function googleSearch() {
    window.location = 'http://www.google.com/search?q=site:proyectochaparrillo.es ' + $("#searchtext").val();
    return false;
}

$(document).ready(function () {

    $('.second-button').on('click', function () {

        $('.animated-icon2').toggleClass('open');
    });

});