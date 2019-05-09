
<div class="table-info">
    <table class="table table-bordered table-hover"  id="datatablesUsuarios">
        <thead>
            <th>Usuario</th>
            <th>Nombres y apellidos</th>
            <th>Institucion</th>
            <th>Perfil</th>
        </thead>
        <tbody>
        <?php foreach($registros as $usuario){ ?>
            <tr>
                <td><?php echo $usuario->cedula?></td>
                <td><?php echo $usuario->nombres."\n".$usuario->apellidos?></td>
                <td><?php echo $usuario->institucion_id?></td>
                <td><?php echo $usuario->descripcion?></td>
            </tr>
        <?php } ?>    
        </tbody>
    </table>
</div>
<!--End Table-Info -->
<script type="text/javascript">

    //*
    var idioma_espanol = {
            "sProcessing":     "Procesando...",
        "sLengthMenu": 'Mostrar <select class="form-control input-sm" name="datatablesUsuarios_length">'+
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
    /**/
  $('#datatablesUsuarios').DataTable({
    "language": idioma_espanol
  });

  $('#datatablesUsuarios_wrapper .table-caption').text('Usuarios Registrados');
  $('#datatablesUsuarios_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');
  $('select[name=datatablesUsuarios_length]').addClass('custom-select');


</script>