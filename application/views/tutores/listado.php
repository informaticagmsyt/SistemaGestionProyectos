<!--<div class="container">-->
    
    <!--<div class="panel">-->
    
        <!--<h4 class="panel-title">Listado de los Tutores</h4>-->

        <!--<div class="panel-body">-->


            <div class="table-info">
                <table class="table table-hover table-bordered" id="datatablesTutores">
                    <thead>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Proyectos Asignados</th>
                        <th>Cargo</th>
                        <th>Institución a la que Pertenece</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        <?php foreach($registros as $persona){ ?>
                        <tr>
                            <td><?php echo $persona->nombres?></td>
                            <td><?php echo $persona->apellidos?></td>
                            <td><?php echo $persona->email?></td>
                            <td><?php echo $persona->telefono?></td>
                            <td>
                                <a href="">Proyecto 1</a>
                                <br>
                                <a href="">Proyecto 2</a>
                            </td>
                            <td><?php echo $persona->cargo?></td>
                            <td><?php echo $persona->institucion_id?></td>
                            <td>
                            <a href="#" class="btn btn-info"><i class="fas fa-  search"></i></a>
                            <a href="<?php echo base_url(); ?>index.php/Tutores/editar/<?php echo $persona->personas_id ?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        <!--</div>-->
        <!--End Panel-body-->
    <!--</div>-->
    <!--End Panel-->

<!--</div>-->
<!--End Container-->

<script type="text/javascript">

    //*
    var idioma_espanol = {
            "sProcessing":     "Procesando...",
        "sLengthMenu": 'Mostrar <select class="form-control input-sm" name="datatablesTutores_length">'+
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
  $('#datatablesTutores').DataTable({
    "language": idioma_espanol
  });

  $('#datatablesTutores_wrapper .table-caption').text('Tutores Registrados');
  $('#datatablesTutores_wrapper .dataTables_filter input').attr('placeholder', 'Buscar...');
  $('select[name=datatablesTutores_length]').addClass('custom-select');


</script>