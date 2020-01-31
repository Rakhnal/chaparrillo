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
        document.getElementById("header").style.height = "25px";
        document.getElementById("logomovil").style.width = "75px";
        document.getElementById("logomovil").style.height = "60px";
        document.getElementById("btnUser").style.width = "25px";
        document.getElementById("btnUser").style.height = "25px";
        document.getElementById("logomovil").style.zIndex = "10";
        document.getElementById("logomovil").style.marginLeft = "45px";
        document.getElementById("logomovil").style.marginTop = "-95px";
        document.getElementById("logomovil").style.position = "fixed";
    } else {
        document.getElementById("header").style.height = "100px";
        document.getElementById("logomovil").style.width = "325px";
        document.getElementById("logomovil").style.height = "325px";
        document.getElementById("btnUser").style.width = "35px";
        document.getElementById("btnUser").style.height = "35px";
        document.getElementById("logomovil").style.zIndex = "15";
        document.getElementById("logomovil").style.marginLeft = "38%";
        document.getElementById("logomovil").style.marginTop = "0px";
        document.getElementById("logomovil").style.position = "absolute";
    }
}
