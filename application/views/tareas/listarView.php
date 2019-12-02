


<div class="container">

  <div class="row">
    <div class="col-md-2 col-md-offset-10">

    <button class="btn btn-primary  btn-block" onclick="location.href='tareas/nueva/<?php echo $_REQUEST['id']?>'" > Nueva Tarea </button>

  </div>
  </div>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>#</th>
      <th>Titulo</th>
      <th>Tarea</th>
      <th>Estatus</th>
      <th>Fecha Incio</th>
      <th>Fecha Fin</th>
      <th>Acciones</th>

    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($tareas as $key => $value) {
      # code...

    
    ?>
    <tr>
      <th scope="row"><?php echo $key + 1 ?></th>
      <td><?php echo $value->titulo_tarea ?></td>
      <td><?php echo $value->descripcion ?></td>
      <td><?php echo $value->estatus ?></td>
      <td><?php echo  date("d-m-Y", strtotime( $value->fecha_creacion  )); ?></td>
      <td><?php echo   date("d-m-Y", strtotime( $value->fecha_fin  ));  ?></td>
      <td><button class="btn btn-info" onclick="location.href='tareas/editar?id=<?php echo $value->id ?>'" > Editar </button>
    
    </td>
    </tr>
    <?php 
    }
?>
  </tbody>
</table>
</div>