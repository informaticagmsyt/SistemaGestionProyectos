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
        <th>Nombre del Proyecto</th>
        <th>Descripcion</th>
        <th>Categoria</th>
        <th>Tutor</th>
        <th>Solicitante</th>
        <th>Codigo Proyecto</th>
        <th>Acciones</th>
      </tr>
    </thead>

  </table>
</div>


<div class="modal " id="modal-tutor">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Asignar Tutor</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" id="idproyecto">
        <div class="form-group">
                          <label>Tutor</label>
                      
                            <select class="custom-select form-control" id="tutor" name="tutor">
                                <?php 
                                foreach ($tutores as $key => $value) {
                                 # code...<
                       
                                ?>
                                <option value="<?php  echo $value->id?>"><?php   echo     $value->nombres." ".   $value->apellidos; ?> </option>
                         
                                <?php }?>
                              </select>
                          
                  </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="guardarTutor()">Guardar</button>
      </div>
    </div>
  </div>
</div>



<script> var urlbase="<?php echo base_url("index.php/"); ?>";
          var tieneTutor="";

          <?php
if (isset($_REQUEST['tutor'])) {

    ?>
       tieneTutor="?tutor=<?php echo $_REQUEST['tutor']; ?>";

       <?php
}

?>


</script>
<script>


function guardarTutor(){
var idproyecto = $("#idproyecto").val();
var idtutor= $("#tutor").val();

let param={
  tutor:idtutor,
  id:idproyecto
}

 
$.ajax({
            url: urlbase+"proyectos/guardarTutor" ,
            type: "POST",
            dataType: "JSON",
            data: param,
            success: function(res) {
                console.log(res)
              location.reload()
              $("#modal-tutor").modal("hide")
        
             }
            }).fail(function(re){
                console.log(re.responseText)
    
                });

}



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
    "url":urlbase+"Proyectos/getAllProyecto"+tieneTutor,
    "dataSrc": function ( d ) {
        if(!d.result){
          return d;
        }else{
          return d.data;
        }
        console.log(d)

      },

      },
      "columns":[
      {"data":"id_requerimiento"},
      {"data":"nombre_proyecto"},
      {"data":"descripcion"},
      {"data":"categoria"},
      {"data":"tutor"},
      {

"render":
function (data, type, row )
  {

    return (row['nombres'] + ' ' +  row['apellidos'] );
  }

},
{"data":"codcaso"},
{"defaultContent":  " <button type='button' class='ver btn btn-primary'  data-toggle='tooltip' data-placement='top' title='Ver Proyecto'><i class='fas fa-search'></i></button> "+
    " <button type='button' class='editar btn btn-info' data-toggle='tooltip' data-placement='top' title='Editar'><i class='far fa-edit'></i></button> "+
    " <button type='button' class='verpdf btn btn-default'  data-toggle='tooltip' data-placement='top' title='Reporte PDF' ><i class='fas fa-clipboard-list'></i></button> "+
    " <button type='button' class='tutor btn btn-success' data-toggle='tooltip' data-placement='top' title='Asignar Tutor'><i class='far fa-edit'></i></button> "+
    " <button type='button' class='tareas btn btn-default'  data-toggle='tooltip' data-placement='top' title='Tareas'  ><i class='fas fa-address-book'></i></button> "}

      ]
    });

    $('#datatablesProyectos_wrapper .table-caption').text('Proyectos Registrados');
    $('#datatablesProyectos_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');

    data_editar("#datatablesProyectos tbody",table);
    data_ver ("#datatablesProyectos tbody",table);
    data_verpdf  ("#datatablesProyectos tbody",table);
    tareas ("#datatablesProyectos tbody",table);
    asignarTutor ("#datatablesProyectos tbody",table);

  }




        function data_editar  (tbody,table){
 var urlbase="<?php echo base_url(""); ?>"

$(tbody).on("click", "button.editar",function(){

//var data=table.row($(this).parents("tr") ).data();
var id =$(this).parents("tr")[0].children[0].innerText

window.location=urlbase+"proyectos/editar/"+id+"";

});
        }

function asignarTutor(tbody,table){
  var urlbase="<?php echo base_url(""); ?>"
  
$(tbody).on("click", "button.tutor",function(){

//var data=table.row($(this).parents("tr") ).data();
var id =$(this).parents("tr")[0].children[0].innerText;
$("#modal-tutor").modal("show");
$("#idproyecto").val(id);

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

        function tareas (tbody,table){
 var urlbase="<?php echo base_url(""); ?>"

$(tbody).on("click", "button.tareas",function(){

//var data=table.row($(this).parents("tr") ).data();
var id =$(this).parents("tr")[0].children[0].innerText

window.location=urlbase+"tareas?id="+id+"";

});
        }
        $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>