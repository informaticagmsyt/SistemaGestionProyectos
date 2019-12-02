
<div class="container">
<div class="row">
<div class="col-md-11 col-sm-8">

<form class="form-horizontal" id="form-tarea " method="POST"  action="<?php echo base_url() ?>tareas/saveEdit">
  <div class="form-group form-group-lg">
    <div class="col-md-3"></div>
    <div class="col-md-9">
    
    </div>
  </div>
  <div class="form-group form-group-lg">
    <label for="grid-input-lg-1" class="col-md-3 control-label">Titulo de la tarea</label>
    <div class="col-md-9">
      <input type="text" class="form-control" id="grid-input-lg-1" 
      id="titulo" name="titulo" value=" <?php echo $tarea->titulo_tarea ?>" required
      placeholder="Titulo">
      <small class="text-muted"> Agregue el titulo de la tarea</small>
    </div>
  </div>
  <div class="form-group form-group-lg">
    <label for="grid-input-lg-2" class="col-md-3 control-label">Estatus</label>
    <div class="col-md-9">
      <select class="form-control" id="estatus" name="estatus">
  
      </select>
    </div>
  </div>
  <div class="form-group form-group-lg">
    <label for="grid-input-lg-1" class="col-md-3 control-label">Descripción</label>
    <div class="col-md-9">
      <textarea class="form-control" id="grid-input-lg-1" placeholder="descripcion"
      
      name="descripcion" required> <?php echo $tarea->descripcion ?>
        </textarea>
    </div>
    <input type="hidden" class="form-control" name="id" value="<?php echo $id?>" >
    
  </div>

  <div class="row">
<div class="col-md-4  col-md-offset-3">

        <div class="form-group">
        <label> Fecha de Inicio</label>



        <div class="input-group date form_date col-md-8" data-date="" data-date-format="dd-mm-yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
        <input class="form-control" size="5" type="text" id="fechanac" name="fecha_inicio"         value="<?php echo  date("d-m-Y", strtotime( $tarea->fecha_creacion  )); ?> "  required>
        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span><i class="far fa-trash-alt"></i></span>
        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span><i class="far fa-calendar-alt"></i></span>
        </div>
                


        </div>
      </div>
 

      <div class="col-md-4">

        <div class="form-group">
        <label> Fecha Fin</label>



        <div class="input-group date form_date col-md-8" data-date="" data-date-format="dd-mm-yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
        <input class="form-control" size="5" type="text" id="fecha_fin" name="fecha_fin"        value="<?php echo  date("d-m-Y", strtotime( $tarea->fecha_fin  )); ?>" required>
        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span><i class="far fa-trash-alt"></i></span>
        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span><i class="far fa-calendar-alt"></i></span>
        </div>
                


        </div>
      </div>
      </div>
  <div class="col-md-4 col-md-offset-6">
<button class="btn btn-primary" type="submit"> Guardar  </button>
  </div>
</form>

</div>
</div>

</div>

<script>
var estatus='<?php echo $tarea->estatus?>';
geTarea(estatus)
$('.form_date').datetimepicker({
	language:  'es',
	weekStart: 1,
	todayBtn:  1,
	autoclose: 1,
	todayHighlight: 1,
	startView: 2,
	minView: 2,
	forceParse: 0
});
function geTarea(estatus) {

var data={

}

$.ajax({
  url: urlbase+"Tareas/getEstatus" ,
  type: "GET",
  dataType: "JSON",
  data: data,
  beforeSend: function(data){

$("#estatus").html("<option>Cargando...<option>");
  },
  success: function(res) {
    console.log(res)


var data =res.data;

var html='';
$("#estatus").html("")

html='<option value="">Seleccione</option>';
$("#estatus").append(html)
 for (var i in data) {
   var select=""
if(data[i].descripcion==estatus){
  select="selected"

}
     html='<option value='+data[i].id+ '  '+select+'>'+data[i].descripcion+'</option>';
     select=""
     $("#estatus").append(html)
 }

  





  }
    }).fail(function(re){
console.log(re.responseText)
    
    });

}
</script>
