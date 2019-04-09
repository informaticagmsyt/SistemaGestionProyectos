<div class="container">
    
    <div class="panel">
    
        <h4 class="panel-title">Listado de los Tutores</h4>

        <div class="panel-body">



            <table class="table table-hover table-bordered">
                <thead>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Proyectos Asignados</th>
                    <th>Cargo</th>
                    <th>Institución a la que Pertenece</th>
                </thead>
                <tbody>
                    <?php foreach($registros as $persona){ ?>
                    <tr>
                        <td><?php echo $persona->nombres?></td>
                        <td><?php echo $persona->apellidos?></td>
                        <td><?php echo $persona->email?></td>
                        <td><?php echo $persona->telefono?></td>
                        <td><ul id="proyectos" style>
                            
                            </ul>
                        </td>
                        <td><?php echo $persona->cargo?></td>
                        <td><?php echo $persona->institucion_id?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
        <!--End Panel-body-->
    </div>
    <!--End Panel-->

</div>
<!--End Container-->

<script type="text/javascript">
  $('.table').DataTable();
</script>
<script>
var x = document.getElementById('proyectos');
x.innerHTML = '<li>proyecto1</li>';
</script>