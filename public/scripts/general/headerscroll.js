/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
window.onscroll = function () {
    scrollFunction();
};

function scrollFunction() {
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        document.getElementById("header").style.minHeight = "25px";
        document.getElementById("imgLogo").style.width = "70px";
        document.getElementById("logomovil").style.width = "70px";

        if (document.getElementById("imgPerfil") !== null) {
            document.getElementById("imgPerfil").style.width = "80px";
            document.getElementById("imgPerfil").style.height = "50px";
        }
    } else {
        document.getElementById("header").style.minHeight = "100px";
        document.getElementById("imgLogo").style.width = "70px";
        document.getElementById("logomovil").style.width = "70px";
        if (document.getElementById("imgPerfil") !== null) {
            document.getElementById("imgPerfil").style.width = "125px";
            document.getElementById("imgPerfil").style.height = "70px";
        }
    }
}
