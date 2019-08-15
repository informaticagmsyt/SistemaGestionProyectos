
<style>
#btnconsultar{
  display:none;

}
</style>
<div class="container">
<div id="msj"></div>
<div class="row">
<div class="col-md-4 col-md-offset-5">


<a href="<?php echo base_url(""); ?>proyectos/editar/<?php echo $datos->requerimiento_id;?>" class="btn btn-success btn-md"> Editar proyecto</a>

</div>

</div>
<br>
<form  method="get"  action="../ver/<?php echo $datos->requerimiento_id;?>" id="formeditar" >




<div class="panel-group panel-group-info" id="accordion-example-info">
  <div class="panel">
    <div class="panel-heading">
      <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example-warning" href="#collapseOne-warning">
       Datos del Productor   -  <small> Click aqui para desplegar</small>
      </a>
    </div>
    <div id="collapseOne-warning" class="panel-collapse collapse ">
      <div class="panel-body">
          
<?php include'pasos/paso1.php'; 

?>
      </div>
    </div>
  </div>
  <div class="panel">
    <div class="panel-heading">
      <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example-warning" href="#collapseTwo-warning">
        Datos del Proyecto  <?php echo $datos->codcaso ?>  <small class="pull-right"> Creado: <?php echo $datos->fecha;?></small> 
      </a>
    </div>
    <div id="collapseTwo-warning" class="panel-collapse collapse collapse2 in">
      <div class="panel-body">
          
<?php include'pasos/paso2.php'; ?>
<?php include'pasos/paso3.php'; ?>
<?php include'pasos/paso4.php'; ?>
<?php include'pasos/paso5.php'; ?>
<?php include'pasos/paso6.php'; ?>
      </div>
    </div>
  </div>



  <div class="panel">
      <div class="panel-heading">
        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example-warning"
        onclick="$('.collapse2').removeClass('in')"
        
        href="#collapseThree-warning">
          Integrantes del Proyecto <small class="pull-right"> </small> 
        </a>
      </div>
      <div id="collapseThree-warning" class="panel-collapse collapse ">

        <div class="panel-body">
            
            <table class="table" id="tablaintegrante">
            <caption> <button type="button" class="btn btn-primary"
              data-toggle="modal" data-target="#modalIntegrante"
              
              >+ Agregar Integrante  </button></caption>
            <thead>
              <tr>
                <th>#</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Cedula</th>
                <th>Telefono</th>
              </tr>
            </thead>
            <tbody>
              <?php

              if($integrantes['result']){
              $data=$integrantes['data'];
              $i=0;
              foreach ($data as $valor) {
                
                $i++;?>
              <tr>

                <th scope="row"> <?php echo $i; ?></th>
                <td> <?php echo $valor->nombres?></td>
                <td><?php echo $valor->apellidos ?></td>
                <td><?php echo $valor->cedula ?></td>
                <td><?php echo $valor->telefono ?></td>
              </tr>
              <?php }} ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>


<div class="modal" id="modalIntegrante">
    <div class="modal-dialog">
      <div class="modal-content">
        
<form  method="post"  id="formIntegrante" >
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title"> Agregar Integrantes</h4>
        </div>
        <div class="modal-body">
        
          <div class="row">
        <div class="col-md-6">

          
          <div class="input-group">
            <input type="text" class="form-control integrante" 
              name="cedula"
              id="cedulai"
            placeholder="Cedula">
            
            <span class="input-group-btn">
              <button type="button" class="btn btn-default">Consultar</button>
            </span>
            
          </div>
          

        </div>


          </div>


          <div class="row">
              <div class="col-md-6">
      
                
                <div class="input-group">
                  
                  <label for="nombrei" class="col-md-2">Nombre</label>
                  
                  <input type="text" class="form-control integrante" name="nombres" placeholder="Nombre" id="nombrei" required>
                  
                
                  
                </div>
                
      
              </div>
      
              <div class="col-md-6">
      
                
                  <div class="input-group">
                    
                    <label for="nombrei" class="col-md-2">Apellido</label>
                    
                    <input type="text" class="form-control integrante" name="apellidos"
                      placeholder="Apellido" id="apellidoi" required>
                    
                  
                    
                  </div>
                  
        
                </div>
      
                </div>

                <div class="row">
                    <div class="col-md-6">
            
                      
                      <div class="input-group">
                        
                        <label for="nombrei" class="col-md-2">Telefono</label>
                        
                        <input type="text" class="form-control integrante" 
                        name="telefono"
                        placeholder="telefono" id="telefonoi" required>
                        
                      
                        
                      </div>
                      
            
                    </div>
            
                    <div class="col-md-6">
            
                      
                        <div class="input-group">
                          
                          <label for="nombrei" class="col-md-2">Cargo</label>
                          
                          <input type="text" class="form-control integrante" 
                          placeholder="Cargo" id="cargoi"
                          name="cargo"
                          required>
                          
                        
                          
                        </div>
                        
              
                      </div>
            
                      </div>

                      <div class="row">
                      <div class="col-md-12">
                          <label for="profesioni" class="col-md-2">Profesión</label>
                          
                          <input type="text" class="form-control integrante typeahead" 
                          placeholder="profesion" id="profesioni"
                          name="profesion"
                          required>
                          
                      </div>

                      </div>

                      <div class="row">
                      <div class="col-md-6">
                    <div class="form-group">
                    <label for="" class=" control-label">Sexo</label>
                
                      <select class="custom-select form-control integrante" 
                      id="sexoi" name="sexo">
                       
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                      </select>
                    </div>

                      </div>
                    <div class="col-md-6">
                    <div class="form-group">
               <label> Fecha de Nacimiento</label>
               
           
           
           <div class="input-group date form_date col-md-8" data-date="" data-date-format="dd-mm-yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
               <input class="form-control integrante" size="5" type="date" id="fechanac" name="fecha_nac"        value=" " >
               <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span><i class="far fa-trash-alt"></i></span>
               <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span><i class="far fa-calendar-alt"></i></span>
               </div>
                                             
           
           
               </div>
               </div>
               

                    </div>
<input type="hidden"  id="idrequerimiento"  name="idrequerimiento"  value="<?php echo $datos->requerimiento_id;?>" >
<input type="hidden"  id="proyecto_id"  name="proyecto_id"  value="<?php echo $datos->proyecto_id;?>" >

        </div>
        <div class="modal-footer">
          <button type="button" class="btn" data-dismiss="modal">Salir</button>
          <button type="button" onclick="agregarIntegrante()" 
          class="btn btn-primary">Guardar</button>
        </div>
     
      </div>
    </div>
  </div>

<input type="hidden"  id="idrequerimiento1"  name="idrequerimientoi"  value="<?php echo $datos->requerimiento_id;?>" >
<input type="hidden"  id="personas_id1"  name="personas_idi"  value="<?php echo $datos->id_persona;?>" >

<input type="hidden"  id="proyecto_id1"  name="proyecto_idi"  value="<?php echo $datos->proyecto_id;?>" >

<input type="hidden"  id="estado_id1"  name="estado_idi"  value="<?php echo $datos->estado_id;?>" >
<input type="hidden"  id="municipio_id1"  name="municipio_idi"  value="<?php echo $datos->municipio_id;?>" >
<input type="hidden"  id="parroquia_id1"  name="parroquia_idi"  value="<?php echo $datos->parroquia_id;?>" >
</form>

<a href="<?php echo base_url("proyectos/cargarImagenes/$idproyecyo")?>"  class="btn btn-default">Subir Imagenes</a>
<div class="row">
  <div class="col-xs-6 col-md-3">

    <a href="#" class="thumbnail">
        <?php 

                  if(empty(!$imagenes))
                  foreach ($imagenes as $key => $value) {
                    # code...
                
        ?>
      <img src="<?php echo $url. $value   ?>" alt="...">
      <?php  }
        ?>
    </a>
  </div>
  ...
</div>

</div>

<script> var urlbase="<?php echo base_url("index.php/"); ?>";



</script>

<script src="<?php echo base_url()?>public/js/estadoMunParroquia.js"></script>
<script src="<?php echo base_url()?>public/js/registrarProyecto.js"></script>

<script>









  
      
  var $input = $('#profesioni').typeahead({
	    source:  function (query, process) {
        return $.get(urlbase+'proyectos/getProfesion', { codigo: query, action:"searchClient" }, function (data) {
        		//console.log(data);
            if(data.find){
              return process(data.obj);
            }else{
           
              var result= [{id: "0",
               name:+query,
              nombre:query}];
              console.log(result)
              return process(result);
            }
	           
	        });
      }
 
  });

 



  function agregarIntegrante(){

 

   var datos={
     nombres:$("#nombrei").val(),
     apellidos:$("#apellidoi").val(),
     cedula:$("#cedulai").val(),
     cargo:$("#cargoi").val(),
     telefono:$("#telefonoi").val(),
     profesion:$("#profesioni").val(),
     fecha_nac:$("#fechanac").val(),
     sexo:$("#sexoi").val(),
     idrequerimiento:"<?php echo $datos->requerimiento_id;?>",
     parroquia_id:"<?php echo $datos->parroquia_id;?>",
     municipio_id:"<?php echo $datos->municipio_id;?>" ,
     estado_id:"<?php echo $datos->estado_id;?>"



   }
$.ajax({
  url: urlbase+"Proyectos/agregarIntegrante" ,
  type: "POST",
  dataType: "JSON",
  data: datos,
  beforeSend: function(data){
//$("#btnpaso1").text("Guardando...")
//$(selector).html("<option>Cargando...<option>");
  },
  success: function(res) {
  console.log(res)
    if(res.result){
      getIntegrantes()
      $("#modalIntegrante").modal("hide")
  $("#msj").after('<div class="alert alert-success mensaje"><strong ><p style="text-align: center">'+
                       res.mensaje+'</p></strong> </div>');
  window.setTimeout(function () {
  $(".mensaje").fadeOut(3000, function () {
    $("#btnpaso1").text("Guardar y continuar")


  });
  }, 2000);

    }else{
      $("#modalIntegrante").modal("hide")

      $("#msj").after('<div class="alert alert-danger mensaje"><strong ><p style="text-align: center">'+
            res.mensaje+'</p></strong> </div>');
    window.setTimeout(function () {
    $(".mensaje").fadeOut(3000, function () {
   
    });
    }, 5000);
    }
 




  }
    }).fail(function(re){
  
console.log(re.responseText)
alert("Ocurrio un error")
    });



}


function getIntegrantes(){

 

var datos={
  idrequerimiento:"<?php echo $datos->requerimiento_id;?>"


}
$.ajax({
url: urlbase+"Proyectos/getIntegratesJSON" ,
type: "POST",
dataType: "JSON",
data: datos,
beforeSend: function(data){
//$("#btnpaso1").text("Guardando...")
//$(selector).html("<option>Cargando...<option>");
},
success: function(res) {
console.log(res)
 if(res.result){

  var data=res.data;
 var i=1;
 $('#tablaintegrante > tbody:last').html('')
  for (let index = 0,i=1; index < data.length; index++) {
     element = data[index];
    console.log(element.cedula)

    var html='<tr>';
    html+='<td>'+i+'</td>';
html+='<td>'+element.nombres+'</td>';


html+='<td>'+element.apellidos+'</td>';


html+='<td>'+element.cedula+'</td>';



html+='<td>'+element.telefono+'</td>';
html+='</tr>'
$('#tablaintegrante > tbody:last').append(html);
i++;
  }



  

 }





}
 }).fail(function(re){

console.log(re.responseText)
alert("Ocurrio un error")
 });



}







    $("#cedula").attr("readonly",'');
    $("#nacionaliidad").attr("readonly",'');
    $(".form-control").attr("disabled",true);
    $(".integrante").attr("disabled",false);

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
</script>