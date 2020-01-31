/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).mousemove(function(event){
    if (event.pageX > 750) {
        document.body.style.backgroundColor = "#E9D985";
    } else {
        document.body.style.backgroundColor = "#93C572";
    }
});