 <style>
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}

input[type=number] { -moz-appearance:textfield; }
 </style>
   
  <div class="container"> 
  <div class="row"> 

 <div class="col-md-11"> 

<div class="wizard" id="wizard-basic">
  <div class="wizard-wrapper">
    <ul class="wizard-steps">
      <li data-target="#wizard-example-step1">
        <span class="wizard-step-number">1</span>
        <span class="wizard-step-complete"><i class="fa fa-check text-success"></i></span>
        <span class="wizard-step-caption">
          Paso 1
          <span class="wizard-step-description">Identificación del Productor</span>
        </span>
      </li>
      <li data-target="#wizard-example-step2">
        <span class="wizard-step-number">2</span>
        <span class="wizard-step-complete"><i class="fa fa-check text-success"></i></span>
        <span class="wizard-step-caption">
         Paso 2
          <span class="wizard-step-description">Datos del Proyecto</span>
        </span>
      </li>
      <li data-target="#wizard-example-step3">
        <span class="wizard-step-number">3</span>
        <span class="wizard-step-complete"><i class="fa fa-check text-success"></i></span>
        <span class="wizard-step-caption">
          Paso 3
          <span class="wizard-step-description">Datos de la Unidad de Producción</span>
        </span>
      </li>
      <li data-target="#wizard-example-step3">
        <span class="wizard-step-number">4</span>
        <span class="wizard-step-complete"><i class="fa fa-check text-success"></i></span>
        <span class="wizard-step-caption">
          Paso 4
          <span class="wizard-step-description">Datos de espacios y edificación</span>
        </span>
      </li>
      <li data-target="#wizard-example-step4">
        <span class="wizard-step-number">5</span>
        <span class="wizard-step-complete"><i class="fa fa-check text-success"></i></span>
        <span class="wizard-step-caption">
        Fin
        <span class="wizard-step-description">Datos de Producción y Operatividad</span>  

        </span>
      </li>
    </ul>
  </div>

  <div class="wizard-content">
    <div class="wizard-pane" id="wizard-example-step1">
  
    <form  method="POST" role="form" id="formpaso1">


    
      <div class="panel">
      <div id="msj"></div>
      
        <div class="panel-body">
      
            <div class="row">
                <div class=" col-sm-2 ">
                    <label for="grid-input-5" class="col-md-3 control-label">Nacionalidad</label>
                
                      <select class="custom-select form-control" id="nacionaliidad" name="nacionaliidad">
                       
                        <option>V</option>
                        <option>E</option>
                      </select>
                    </div>
              <div class="col-sm-4">
                <label class="" for="grid-input-11">Cedula</label>
                <input type="number" placeholder="Cedula" id="cedula"  name="cedula" class="form-control" required>
              </div>
              <div class=" col-sm-4">
                  <label class="" for="grid-input-11"></label>
                  <br>
                  <button type="button" class="btn btn-primary" onclick="consultarPersona()">Consultar</button>
              </div>
            </div>
     
            <!---Identificación -->
            <h4 class="text-center">Identificación </h4>
            <hr>
            <div class="row">
              <div class="col-md-3">
                  <div class="form-group ">
                      <label>Nombres</label>
                  <input type="text" placeholder="Nombres" id="nombres" name="nombres" class="form-control" required
                  data-msg-required= "Ingrese un nombre">
                </div>
                </div>

              <div class="col-md-3">
                  <div class="form-group ">
                      <label>Apellidos</label>
                  <input type="text" placeholder="apellidos" id="apellidos"  name="apellidos"
                  data-msg-required= "Ingrese un Apellido"
                   class="form-control" required>
                </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                    <label for="" class=" control-label">Sexo</label>
                
                      <select class="custom-select form-control" id="sexo" name="sexo">
                       
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                      </select>
                    </div>
                    </div>
                <div class="col-md-4">
                    <div class="form-group">
               <label> Fecha de Nacimiento</label>
               
           
           
           <div class="input-group date form_date col-md-8" data-date="" data-date-format="dd-mm-yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
               <input class="form-control" size="5" type="text" id="fechanac" name="fecha_nac" value="" >
               <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span><i class="far fa-trash-alt"></i></span>
               <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span><i class="far fa-calendar-alt"></i></span>
               </div>
                                             
           
           
               </div>
               </div>
            </div>
                <!---Identificación -->


             <!---************************ -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group ">
                            <label>Telefono</label>
                        <input type="number" placeholder="telefono" id="telefono"
                        data-msg-required= "Ingrese un numero de teléfono"
                         name="telefono" class="form-control" required>
                      </div>
                      </div>
      
                    <div class="col-md-3">
                        <div class="form-group ">
                            <label>Telefono 2</label>
                        <input type="number" placeholder="telefono 2" id="telefono2"  name="telefono2" class="form-control" >
                      </div>
                      </div>
      

                      <div class="col-md-5">
                          <div class="form-group ">
                              <label>Email</label>
                          <input type="email" 
                          data-msg-required= "Ingrese un email"

                          placeholder="email@test.com" id="email"  name="email" class="form-control" required>
                        </div>
                        </div>
                  </div>
                    <!---************************ -->

                    <hr>

                     <!---************************ -->
                <div class="row">
                  <div class="col-md-3">
                      <div class="form-group ">
                          <label>Profesión / Oficio</label>
                      <input type="text" placeholder="profesión"
                       id="profesion" name="profesion" 
                       class="form-control typeahead" required>
                    </div>
                    </div>
    
                  <div class="col-md-3">
                  
                       
                          <div class="form-group">
                            <label>Posee Cartne de la patria</label>
                        
                              <select class="custom-select form-control" id="posee_carnet" name="posee_carnet">
                               
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                              </select>
                            
                    </div>
                    </div>
    

                    <div class="col-md-3">
                        <div class="form-group ">
                            <label>Código Carnet de la Patria</label>
                        <input type="text" placeholder="" id="v_carnet"  name="v_carnet" class="form-control">
                      </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Posee Cartne de la patria</label>
                      
                            <select class="custom-select form-control" id="v_social" name="v_social">
                             
                              <option value="clap">Estructura Clap</option>
                              <option value="consejo comunal">Consejo Comunal</option>
                              <option value="jefe de calle">Jefe de Calle</option>
                              <option value="ffm">FFM</option>
                              <option value="otro">Otros</option>
                            </select>
                          
                  </div>
                      </div>
                </div>
                  <!---************************ -->
                  <h4 class="text-center">Ubicación </h4>
                  <hr>

                              <!---************************ -->
                <div class="row">
                
    
                  <div class="col-md-4">
                  
                       
                    <div class="form-group">
                      <label>Estado </label>
                  
                        <select class="custom-select form-control" id="estado_id" 
                        required
                        name="estado_id">
                          <option value=""
                          >Seleccione un estado</option>
                        </select>
                      
              </div>
                    </div>
    

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Municipo </label>
                    
                          <select 
                          
                          class="custom-select form-control" id="municipio_id" name="municipio_id"
                          required
                          data-msg-required= "Seleccione un Municipio"
                          >
                            <option value="">Seleccione un Municipio</option>
                          </select>
                        
                </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Parroquia </label>
                      
                            <select class="custom-select form-control" id="parroquia_id"
                            required
                            name="parroquia_id">
                              <option value="">Seleccione una parroquia</option>
                            </select>
                          
                  </div>
                      </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
              
                      <div class="form-group ">
                          <label>Dirección de Habitación</label>
                      <textarea 
                      id="direccion" 
                      value=""
                      data-msg-required= "Ingrese una direccion"
                       name="direccion" class="form-control" required > </textarea> 
                  

                  </div>
                </div>
          </div>
        </div>

        <div class="pull-right">
        <button type="submit" class="btn btn-primary  pull-right" id="btnpaso1" >Guardar y continuar</button>

          <button type="button" class="btn btn-primary"
            style="visibility:hidden"
           data-wizard-action="next" id="paso1">Guardar y continuar</button>
        </div>
      </div>
      </form>
    </div>
    <div class="wizard-pane" id="wizard-example-step2">


    <div class="panel">
      <form  method="post" id="formpaso2">


      <div id="msj2"></div>
      
        <div class="panel-body">

        <h5 class="text-center">Datos del Proyecto</h5>
                  <hr>

                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>Nombre del proyecto</label>
                        <input type="text" placeholder="nombre" id="nombrep"
                        data-msg-required= "Ingrese un numero de teléfono"
                         name="nombrep" class="form-control" required>
                      </div>
                      </div>
      
                    <div class="col-md-6">
                   
                      <div class="form-group">
                        <label>Estatus del Proyecto </label>
                    
                          <select class="custom-select form-control" 
                          id="estatus_proyecto_id" 
                          name="estatus_proyecto_id">
                            <option value="0">Seleccione un opcion</option>
                          </select>
                        
                      </div>
      

                      
                  </div>
      </div>


      <div class="row">
        <div class="col-md-6">
            <div class="form-group ">
                <label>Categoria</label>

                <select class="custom-select form-control" 
                id="categoria_id" 
                name="categoria_id">
                  <option value="">Seleccione un opcion</option>
                </select>
          </div>
          </div>

        <div class="col-md-6">
       
          <div class="form-group">
            <label>Sub Categoria </label>
        
              <select class="custom-select form-control" 
              id="sub_categoria_id" 
              name="sub_categoria_id">
                <option value="">Seleccione un opcion</option>
              </select>
            
          </div>


          
      </div>
</div>

<div class="row">
  <hr>
  <div class="col-md-12">
      <div class="form-group ">
          <label>Descripcion del Proyecto</label>

          <textarea 
          id="descripcion" 
          value=""
          data-msg-required= "Ingrese una descripcion"
           name="descripcion" class="form-control" required > </textarea> 
    </div>
    </div>

    <input type="hidden"  id="cedula2"  name="cedula2"  >
    <input type="hidden"  id="cedula2"  name="cedula2"  >
    <input type="hidden"  id="idrequerimiento"  name="idrequerimiento"  >
    <input type="hidden"  id="idproyecto"  name="idrequerimiento"  >
</div>
      </div>
      <button type="button" class="btn btn-primary"
      style="visibility:hidden"
      data-wizard-action="next" id="paso2">Guardar y Continuar</button>

      <div class="pull-right">
        <button type="button" class="btn" data-wizard-action="prev">Regresar</button>
        <button type="submit" class="btn btn-primary" id="btnpaso2" >Guardar y Continuar</button>
      </div>
    </form>
    </div>

  </div>
    <div class="wizard-pane" id="wizard-example-step3">

    <div class="panel">
      <form  method="post" id="formpaso3">


      <div id="msj3"></div>
      
        <div class="panel-body">

            <h5 class="text-center">Datos de la Unidad de Producción
              </h5>
            <hr>

       
            <div class="row">
                <div class=" col-sm-2 ">
                    <label for="grid-input-5" class="col-md-3 control-label">Rif</label>
                
                      <select class="custom-select form-control" id="rif" name="rif">
                       
                        <option value="J">J</option>
                        <option value="C">C</option>
                        <option value="V">V</option>
                        <option value="G">G</option>
                      </select>
                    </div>
              <div class="col-sm-4">
                <label class="" for="grid-input-11">Numero de Rif</label>
                <input type="number" placeholder="" id="numerorif"  name="numerorif" class="form-control" required>
              </div>
              <div class=" col-sm-6">
                  <div class="form-group ">
                  <label class="" for="grid-input-11">Nombre o Razon Social</label>
                  <input type="text" placeholder="" id="nombrerazonsocial"  name="nombrerazonsocial" class="form-control" required>
                </div>
              </div>
            </div>

            <div class="row">
                
    
                <div class="col-md-4">
                
                     
                  <div class="form-group">
                    <label>Estado </label>
                
                      <select class="custom-select form-control" id="estado" 
                      required
                      name="estado_id">
                        <option value=""
                        >Seleccione un estado</option>
                      </select>
                    
            </div>
                  </div>
  

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Municipo </label>
                  
                        <select 
                        
                        class="custom-select form-control" id="municipio" name="municipio_id"
                        required
                        data-msg-required= "Seleccione un Municipio"
                        >
                          <option value="">Seleccione un Municipio</option>
                        </select>
                      
              </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Parroquia </label>
                    
                          <select class="custom-select form-control" id="parroquia"
                          required
                          name="parroquia_id">
                            <option value="">Seleccione una parroquia</option>
                          </select>
                        
                </div>
                    </div>
              </div>

           
            <div class="row">
                <div class="col-md-3">
                        <label for="formGroupExampleInput">¿Esta Registrarda? <small>(La Empresa)</small> </label>
                        <select name="registrada" class="form-control">
                            <option value="true">Si</option>
                            <option value="false">No</option>
                        </select>
                </div>
                <div class="col-md-3">
                        <label for="formGroupExampleInput">Codigo Situr</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="codigo_situr">
                </div>
                <div class="col-md-3">
                        <label for="formGroupExampleInput">Codigo Sunagro</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="codigo_sunagro" placeholder="00000000">
                </div>
                <div class="col-md-3">
                        <label for="formGroupExampleInput">Institucion Responsable</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="inst_responsable" required>
                </div>
                

                </div>
    </div>
</div>

    
        <button type="button" class="btn btn-primary"
        style="visibility:hidden"
        data-wizard-action="next" id="paso3">Guardar y Continuar</button>

        <div class="pull-right">
        <button type="button" class="btn" data-wizard-action="prev">Regresar</button>
        <button type="submit" class="btn btn-primary" id="btnpaso3" >Guardar y Continuar</button>
        </div>
      </form>
    </div>
    <div class="wizard-pane" id="wizard-example-step4">
      <h4>Finish</h4>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
      </p>
      <div class="pull-right">
        <button type="button" class="btn" data-wizard-action="prev">Prev</button>
        <button type="button" class="btn btn-primary" data-wizard-action="finish">Finish</button>
      </div>
    </div>
  </div>
</div>
</div>


</div>
</div>
<script> var urlbase="<?php echo base_url("index.php/"); ?>"; </script>
<script src="<?php echo base_url()?>public/js/estadoMunParroquia.js"></script>
<script src="<?php echo base_url()?>public/js/registrarProyecto.js"></script>
<script>

  $(function() {
    $('#wizard-basic').pxWizard();
  });

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

    $(".prev").addClass("fas fa-chevron-left")
    
    $(".next").addClass("fas fa-chevron-right")


   
    
    var $input = $('#profesion').typeahead({
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






function consultarPersona() {
 var cedula =$("#cedula").val()
if(cedula.length<4)
alert("Ingrese un cédula correcta")
var data={
  cedula:cedula
}

$.ajax({
  url: urlbase+"DatosPersonaC/findJSON" ,
  type: "POST",
  dataType: "JSON",
  data: data,
  success: function(res) {
    console.log(res)
   var data= res.data
   console.log(data)
if(res.response.status="ok"){

    $("#nombres").val(data.nombres)
    $("#apellidos").val(data.apellidos)
    setValueSelect("sexo",data.sexo)
    $("#fechanac").val(data.fec_nacimiento)
  
    if(res.data.datapersona){
   var datapersona = res.data.datapersona;

            setValueSelect("estado_id", datapersona.estado_id)
            municipio( datapersona.estado_id,"#municipio_id") 

            parroquia(datapersona.municipio_id,"#parroquia_id") 

            setTimeout(function(){
              setValueSelect("municipio_id", datapersona.municipio_id)
             setValueSelect("parroquia_id", datapersona.parroquia_id)
            }, 1000);
       
        $("#telefono").val(datapersona.telefono)
        $("#telefono2").val(datapersona.telefono2)
        $("#direccion").val(datapersona.direccion)
        $("#profesion").val(datapersona.profesion)
        $("#v_carnet").val(datapersona.v_carnet)
        $("#email").val(datapersona.email)
      
    }
  
}




  }
    }).fail(function(re){
console.log(re.responseText)
    
    });

}

</script>