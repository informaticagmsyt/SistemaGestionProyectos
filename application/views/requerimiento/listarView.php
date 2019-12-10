<style>
.dataTables_length{

color:black;
}
</style>

<div class="table-info">
  <table class="table table-striped table-bordered" id="datatablesProyectos"  style="width:100%"
  cellspacing="0" align="center">
    <thead>
      <tr>
        <th>id</th>
        <th>Estado</th>
        <th>Descripcion</th>
        <th>Categoria</th>
        <th>cedula</th>
        <th>Solicitante</th>
        <th>Codigo Proyecto</th> 
        <th>Acciones</th>
      </tr>
    </thead>
   
  </table>
</div>
<script> var urlbase="<?php echo base_url("index.php/"); ?>"; </script>
<script>






var idioma_espanol = {
            "sProcessing":     "Procesando...",
        "sLengthMenu": 'Mostrar <select>'+
            '<option value="10">10</option>'+
            '<option value="20">20</option>'+
            '<option value="30">30</option>'+
            '<option value="40">40</option>'+
            '<option value="50">50</option>'+
            '<option value="-1">All</option>'+
            '</select> registros',    
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando del (_START_ al _END_) de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Filtrar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Por favor espere - cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
        }

        listar(idioma_espanol);
function listar(idioma_espanol) {

   var table= $('#datatablesProyectos').dataTable({
      "language": idioma_espanol,
      "ajax":{

    "method":"GET",
    "url":urlbase+"Requerimientos/getAll"

      },
      "columns":[
      {"data":"id"},
      {"data":"estado"},
      {"data":"descripcion"},
      {"data":"categoria"},
      {"data":"cedula"},
      { 

"render":
function (data, type, row )
  {

    return (row['nombres'] + ' ' +  row['apellidos'] );
  }

},
{"data":"codcaso"},
{"defaultContent":  " <button type='button' class='ver btn btn-primary'><i class='fas fa-search'></i></button> "+
    " <button type='button' class='editar btn btn-info'><i class='far fa-edit'></i></button> "+
    " <button type='button' class='verpdf btn btn-default'  ><i class='fas fa-clipboard-list'></i></button> "}

      ]
    });

    $('#datatablesProyectos_wrapper .table-caption').text('Proyectos Registrados');
    $('#datatablesProyectos_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');

    data_editar("#datatablesProyectos tbody",table);
    data_ver ("#datatablesProyectos tbody",table)
    data_verpdf  ("#datatablesProyectos tbody",table)
  }

  


        function data_editar  (tbody,table){
 var urlbase="<?php echo base_url(""); ?>"

$(tbody).on("click", "button.editar",function(){

//var data=table.row($(this).parents("tr") ).data();
var id =$(this).parents("tr")[0].children[0].innerText 

window.location=urlbase+"proyectos/editar/"+id+"";         

});
        }


        function data_ver (tbody,table){
 var urlbase="<?php echo base_url(""); ?>"

$(tbody).on("click", "button.ver",function(){

//var data=table.row($(this).parents("tr") ).data();
var id =$(this).parents("tr")[0].children[0].innerText 

window.location=urlbase+"proyectos/ver/"+id+"";         

});
        }


        
        function data_verpdf (tbody,table){
 var urlbase="<?php echo base_url(""); ?>"

$(tbody).on("click", "button.verpdf",function(){

//var data=table.row($(this).parents("tr") ).data();
var id =$(this).parents("tr")[0].children[0].innerText 

window.location=urlbase+"reportes/pdfproyecto/"+id+"";         

});
        }
</script>