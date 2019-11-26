


<form id="registrarRequerimiento"> 
<div class="panel">
      <div id="msj"></div>
      
        <div class="panel-body">
      
            <div class="row ">
                <div class=" col-sm-2 ">
                    <label for="grid-input-5" class="col-md-3 control-label">Nacionalidad</label>
                
                      <select class="custom-select form-control" id="nacionaliidad" name="nacionaliidad">
                       
                        <option>V</option>
                        <option>E</option>
                      </select>
                    </div>
              <div class="col-sm-4">
                <label class="" for="grid-input-11">Cedula</label>
                <input type="number" placeholder="Cedula" id="cedula" 
                 name="cedula" 
                 value="<?php if (isset( $datos->cedula))echo $datos->cedula;?>"
                 class="form-control disabled" required>
              </div>
              <div class=" col-sm-4">
                  <label class="" for="grid-input-11"></label>
                  <br>
                  <button type="button" class="btn btn-primary"
                  id="btnconsultar"
                   onclick="consultarPersona()">Consultar</button>
              </div>
            </div>
            <div id="identificacion">
            <!---Identificación -->
            <h4 class="text-center">Identificación </h4>
            <hr>
            <div class="row">
              <div class="col-md-3">
                  <div class="form-group ">
                      <label>Nombres</label>
                  <input type="text" placeholder="Nombres" id="nombres"
                  value="<?php if (isset( $datos->nombres))echo $datos->nombres;?>"
                   name="nombres" class="form-control" required
                  data-msg-required= "Ingrese un nombre">
                </div>
                </div>

              <div class="col-md-3">
                  <div class="form-group ">
                      <label>Apellidos</label>
                  <input type="text" placeholder="apellidos"
                  value="<?php if (isset( $datos->apellidos))echo $datos->apellidos;?>"
                   id="apellidos"  name="apellidos"
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
               <input class="form-control" size="5" type="text" id="fechanac" name="fecha_nac"        value="<?php if (isset( $datos->fecha_nac))echo $datos->fecha_nac;?>" >
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
                        value="<?php if (isset( $datos->telefono))echo $datos->telefono;?>"
                         name="telefono" class="form-control" required>
                      </div>
                      </div>
      
                    <div class="col-md-3">
                        <div class="form-group ">
                            <label>Telefono 2</label>
                        <input type="number" placeholder="telefono 2" 
                        value="<?php if (isset( $datos->telefono2))echo $datos->telefono2;?>"
                        id="telefono2"  name="telefono2" class="form-control" >
                      </div>
                      </div>
      

                      <div class="col-md-5">
                          <div class="form-group ">
                              <label>Email</label>
                          <input type="email" 
                          data-msg-required= "Ingrese un email"

                          placeholder="email@test.com" id="email"
                          value="<?php if (isset( $datos->email))echo $datos->email;?>"
                            name="email" class="form-control" required>
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
                       class="form-control typeahead"
                       value="<?php if (isset( $datos->profesion))echo $datos->profesion;?>"
                        required>
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
                        <input type="text" placeholder="" id="v_carnet" 
                        value="<?php if (isset( $datos->v_carnet))echo $datos->v_carnet;?>"
                         name="v_carnet" class="form-control">
                      </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Estructura a la que pertenece</label>
                      
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
                      type="text"
                      id="direccion" 
   
                      data-msg-required= "Ingrese una direccion"
                       name="direccion" class="form-control" required > <?php if (isset( $datos->direccion))echo $datos->direccion;?></textarea>
                  

                  </div>
                </div>
          </div>

         </div>
        </div>
    </div>
     

 
  
<div class="panel">



  <div id="msj2"></div>

  <div class="panel-body">

    <h5 class="text-center">Datos del Requrimiento</h5>
    <hr>



    <div class="row">
      <div class="col-md-6">
        <div class="form-group ">
          <label>Categoria</label>

          <select class="custom-select form-control" id="categoria_id" name="categoria_id" required>
            <option value="">Seleccione un opcion</option>
          </select>
        </div>
      </div>

      <div class="col-md-6">

        <div class="form-group">
          <label>Sub Categoria </label>

          <select class="custom-select form-control" id="sub_categoria_id" name="sub_categoria_id" required>
            <option value="">Seleccione un opcion</option>
          </select>

        </div>

      </div>
    </div>


  

    <div class="row">

      <div class="col-md-12">
        <div class="form-group ">
          <label>Descripcion del Proyecto</label>

          <textarea id="descripcion" data-msg-required="Ingrese una descripcion" name="descripcion" class="form-control"
            required> <?php if (isset( $datos->descripcion))echo $datos->descripcion;?></textarea>
        </div>
      </div>


    <div class="row">
<div class="col-md-4 ">
      </div>
      <div class="col-md-4 ">
      
      <span class="input-group-btn">
     
        <button type="submit" id="guardar" class="btn btn-large btn-block btn-info">Guardar</button>
        
      </span>
      
      </div>
      </div>
</form> 


      <input type="hidden" id="cedula2" name="cedula2">
      <input type="hidden" id="cedula2" name="cedula2">
      <input type="hidden" id="idproyecto" name="idrequerimiento">
    </div>

  </div>
</div>
<script src="<?php echo base_url()?>public/js/estadoMunParroquia.js"></script>
<script src="<?php echo base_url()?>public/js/registrarRequerimiento.js"></script>

 

<script>



$("#registrarRequerimiento").validate();


$( "#registrarRequerimiento" ).submit(function( e ) {



      e.preventDefault();    //stop form from submitting

      var validate=   $("#registrarRequerimiento").valid();

      if(validate){
      regitrarRequerimiento();
      
      }
   
     

        
       });

$("#categoria_id").change(function() {
         
            
  if(this.value!="")
  getSubCategoria(this.value,"#sub_categoria_id")
 else           
$("#sub_categoria_id").html("<option value=''>Seleccione una opcion<option>");

});



getCategoria('#categoria_id')


  function getSubCategoria(id,selector) {

    var data={
    id:id
    }
    
    $.ajax({
      url: urlbase+"Proyectos/getSubCategoria" ,
      type: "GET",
      dataType: "JSON",
      data: data,
      beforeSend: function(data){
  
    $(selector).html("<option>Cargando...<option>");
      },
      success: function(res) {
        console.log(res)
  
    if(res.response){
   var data =res.data;
  
   var html='';
  $(selector+' option').each(function()  {$(this).remove(); });
  
  
    html='<option value="">Seleccione una opcion</option>';
    $(selector).append(html)
     for (var i in data) {
  
         html='<option value='+data[i].id+'>'+data[i].descripcion+'</option>';
         $(selector).append(html)
     }
  
      
    }
    
    
    
    
      }
        }).fail(function(re){
    console.log(re.responseText)
        
        });
    
    }

function getCategoria(selector) {

  var data={
  
  }
  
  $.ajax({
    url: urlbase+"Proyectos/getCategoriaRequerimiento" ,
    type: "GET",
    dataType: "JSON",
    data: data,
    beforeSend: function(data){

  $(selector).html("<option>Cargando...<option>");
    },
    success: function(res) {
      console.log(res)

  if(res.response){
 var data =res.data;

 var html='';
$(selector+' option').each(function()  {$(this).remove(); });


  html='<option value="">Seleccione una Categoria</option>';
  $(selector).append(html)
   for (var i in data) {

       html='<option value='+data[i].id+'>'+data[i].descripcion+'</option>';
       $(selector).append(html)
   }

    
  }
  
  
  
  
    }
      }).fail(function(re){
  console.log(re.responseText)
      
      });
  
  }

  $(function() {
    $('#wizard-basic').pxWizard();
  });

  function consultarPersona() {
 var cedula =$("#cedula").val()
if(cedula.length<4)
alert("Ingrese un cédula correcta")
var data={
  cedula:cedula
}

$.ajax({
  url: urlbase+"proyectos/getDatosPersonasJSON" ,
  type: "POST",
  dataType: "JSON",
  data: data,
  success: function(res) {
    console.log(res)
   var data= res.data
   console.log(data)
if(res.response.status="ok" && res.response.http_code==200){
  $("#identificacion").removeClass("form-loading");
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
  
}else if(res.response.status="ok" && res.response.http_code==404){

  if(res.data.datapersona){
   var datapersona = res.data.datapersona;

            setValueSelect("estado_id", datapersona.estado_id)
            municipio( datapersona.estado_id,"#municipio_id") 

            parroquia(datapersona.municipio_id,"#parroquia_id") 

            setTimeout(function(){
              setValueSelect("municipio_id", datapersona.municipio_id)
             setValueSelect("parroquia_id", datapersona.parroquia_id)
            }, 1000);
            $("#nombres").val(datapersona.nombres)
    $("#apellidos").val(datapersona.apellidos)
        $("#telefono").val(datapersona.telefono)
        $("#telefono2").val(datapersona.telefono2)
        $("#direccion").val(datapersona.direccion)
        $("#profesion").val(datapersona.profesion)
        $("#v_carnet").val(datapersona.v_carnet)
        $("#email").val(datapersona.email)
      
    }else{

 
  window.setTimeout(function () {
    $(".mensaje").fadeOut(3000, function () {
  $("#msj").after('<div class="alert alert-danger mensaje"><strong >'+
   ' <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <p style="text-align: center">'+
                         res.comments+'</p></strong>'+ 
                         
      '</div>');

    });
    }, 2000);

  }
  
}else{


      window.setTimeout(function () {
    $(".mensaje").fadeOut(3000, function () {

      $("#msj").after('<div class="alert alert-danger mensaje"><strong >'+
   ' <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <p style="text-align: center">'+
                         res.comments+'</p></strong>'+ 
                         
      '</div>');
  
    });
    }, 2000);

}




  }
    }).fail(function(re){
console.log(re.responseText)
    
    });

}




function regitrarRequerimiento(){

 
  
   
      $.ajax({
        url: urlbase+"Requerimientos/registrar" ,
        type: "POST",
        dataType: "JSON",
        data: $("#registrarRequerimiento,textarea").serialize(),
        beforeSend: function(data){
  $("#guardar").text("Guardando...")
      //$(selector).html("<option>Cargando...<option>");
        },
        success: function(res) {
        
          if(res.result){
              window.location= urlbase+"Requerimientos/verRequerimientos";
        $("#msj").after('<div class="alert alert-success mensaje"><strong ><p style="text-align: center">'+
                             res.mensaje+'</p></strong> </div>');
        window.setTimeout(function () {
        $(".mensaje").fadeOut(3000, function () {
          $("#guardar").text("Guardar y continuar")
      

          $(".wizard-pane,  .wizard").removeClass( "active" );
          $(".wizard2").addClass( "active " );
          $(".wizard1").addClass( " completed" );
          $("#wizard-example-step2").addClass( "active" );

        });
        }, 2000);

          }else{


            $("#msj").after('<div class="alert alert-danger mensaje"><strong ><p style="text-align: center">'+
                  res.mensaje+'</p></strong> </div>');
          window.setTimeout(function () {
          $(".mensaje").fadeOut(3000, function () {
            $("#btnpaso1").text("Guardar y continuar")
          });
          }, 5000);
          }
       
      
      
      
      
        }
          }).fail(function(re){
            $("#btnpaso1").text("Guardar y continuar")
      console.log(re.responseText)
      alert("Ocurrio un error")
          });



}

</script>