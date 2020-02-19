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

    if ($('#latitud').val() === null || $('#latitud').val() === "" || $('#longitud').val() === null || $('#longitud').val() === "") {
        
        alert("Falta seleccionar la ubicación en el mapa");
        
        return false;
        
    }

    return true;
}

