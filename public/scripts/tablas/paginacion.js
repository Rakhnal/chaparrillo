/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$('#validateTable').DataTable({
    "paging": true,
    "pagingType": "numbers",
    "language": {
        "lengthMenu": "Mostrando _MENU_ filas por página",
        "zeroRecords": "Nada encontrado - Lo sentimos",
        "info": "Mostrando la página _PAGE_ de _PAGES_",
        "infoEmpty": "No se han encontrado registros",
        "infoFiltered": "(filtrado con _MAX_ registros totales)",
        "search": "Buscar:"
    }
});
$('.dataTables_length').addClass('bs-select');