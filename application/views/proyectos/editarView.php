
<style>
#btnconsultar{
  display:none;

}
</style>
<div class="container">


<form  method="post"  action="../GuardarEdit" id="formeditar" >


<div class="panel-group panel-group-warning" id="accordion-example-warning">
  <div class="panel">
    <div class="panel-heading">
      <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example-warning" href="#collapseOne-warning">
       Datos del Productor  
      </a>
    </div>
    <div id="collapseOne-warning" class="panel-collapse collapse in ">
      <div class="panel-body">
          
<?php include'pasos/paso1.php'; 

?>
      </div>
    </div>
  </div>
  <div class="panel">
    <div class="panel-heading">
      <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example-warning" href="#collapseTwo-warning">
        Datos del Proyecto  <?php echo $datos->codcaso ?>
      </a>
    </div>
    <div id="collapseTwo-warning" class="panel-collapse collapse in">
      <div class="panel-body">
          
<?php include'pasos/paso2.php'; ?>
<?php include'pasos/paso3.php'; ?>
<?php include'pasos/paso4.php'; ?>
<?php include'pasos/paso5.php'; ?>
<?php include'pasos/paso6.php'; ?>
      </div>
    </div>
  </div>

</div>




<input type="hidden"  id="idrequerimiento"  name="idrequerimiento"  value="<?php echo $datos->requerimiento_id;?>" >
<input type="hidden"  id="personas_id"  name="personas_id"  value="<?php echo $datos->id_persona;?>" >

<input type="hidden"  id="proyecto_id"  name="proyecto_id"  value="<?php echo $datos->proyecto_id;?>" >

<div class="row">
<div class="col-md-4 col-md-offset-5">
<button type="submit" class="btn btn-success btn-lg"> Guardar Cambios</button>
</div>

</div>

</form>
</div>

<script> var urlbase="<?php echo base_url("index.php/"); ?>"; </script>

<script src="<?php echo base_url()?>public/js/estadoMunParroquia.js"></script>
<script src="<?php echo base_url()?>public/js/registrarProyecto.js"></script>

<script>
$(function() {
    $("#cedula").attr("readonly",'');
    $("#nacionaliidad").attr("readonly",'');
    


$("#categoria_id").change(function() {
         
            
         if(this.value!="")
         getSubCategoria(this.value,"#sub_categoria_id")
        else           
       $("#sub_categoria_id").html("<option value=''>Seleccione una opcion<option>");
       
       });   
setTimeout(function(){
    setValueSelect("estado_id", <?php echo $datos->estado_id?> )
    setValueSelect("estado",<?php echo $datos->estado_id?>)
 
   }, 1000);

            municipio(  <?php  echo $datos->estado_id ?>,"#municipio_id") 

            parroquia(<?php  echo $datos->municipio_id ?>,"#parroquia_id") 
            
            municipio(  <?php  echo $datos->estado_id ?>,"#municipio") 

            parroquia(<?php  echo $datos->municipio_id ?>,"#parroquia") 

            
            getSubCategoria(<?php  echo $datos->categoria_id ?>,"#sub_categoria_id")
            setTimeout(function(){
                
                
                
                setValueSelect("inst_responsable",'<?php  echo $datos->ente_id ?>' )  

                 setValueSelect("estatus_proyecto_id",'<?php  echo $datos->estatus_proyecto_id ?>' )  
                    setValueSelect("acometida",'<?php  echo $datos->acometida_agua_blanca ?>' )  
                    setValueSelect("acometidaservidas",'<?php  echo $datos->acometida_agua_negra ?>' )  
                    setValueSelect("instalaciones",'<?php  echo $datos->servicios_sanitarios ?>' )     
                    setValueSelect("edificacion",'<?php  echo $datos->edificacion ?>' )
                    setValueSelect("rif",'<?php  echo $datos->codrif ?>' )
                    setValueSelect("aseourbano",'<?php  echo $datos->aceo_urbano ?>' )
                    setValueSelect("vialidad",'<?php  echo $datos->vialidad ?>' )
                    setValueSelect("aseourbano",'<?php  echo $datos->aceo_urbano ?>' )
                    setValueSelect("instalaciones",'<?php  echo $datos->servicios_sanitarios ?>' )
                    setValueSelect("servicioelectrico",'<?php  echo $datos->servicio_electrico ?>' )
                    setValueSelect("serviciogas",'<?php  echo $datos->servicios_gas ?>' )
                    setValueSelect("tutor",'<?php  echo $datos->tutor_id ?>' )
                    
                    setValueSelect("funcionamientooperativo",'<?php  echo $datos->funcionamiento_operativo ?>' )
                    setValueSelect("unidadmedida",'<?php  echo $datos->unidad_metrica ?>' )
       

     
                setValueSelect("sexo",'<?php  echo $datos->sexo ?>' )
                setValueSelect("v_social",'<?php  echo $datos->v_social ?>' )
                setValueSelect("posee_carnet",'<?php  echo $datos->posee_carnet ?>' )
                setValueSelect("categoria_id",<?php  echo $datos->categoria_id ?>)
                setValueSelect("sub_categoria_id",<?php  echo $datos->sub_categoria_id ?>)
                setValueSelect("municipio_id",<?php  echo $datos->municipio_id ?>)
                setValueSelect("parroquia_id", <?php  echo $datos->parroquia_id ?>)    
                       
                setValueSelect("municipio",<?php  echo $datos->municipio_id ?>)
                setValueSelect("parroquia", <?php  echo $datos->parroquia_id ?>)

            }, 2000);
        });
</script>