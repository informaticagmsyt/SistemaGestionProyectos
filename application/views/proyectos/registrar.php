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
      <li data-target="#wizard-example-step1" class="wizard1 wizard" >
        <span class="wizard-step-number">1</span>
        <span class="wizard-step-complete"><i class="fa fa-check text-success"></i></span>
        <span class="wizard-step-caption">
          Paso 1
          <span class="wizard-step-description">Identificación del Productor</span>
        </span>
      </li>
      <li data-target="#wizard-example-step2" class="wizard2 wizard">
        <span class="wizard-step-number">2</span>
        <span class="wizard-step-complete"><i class="fa fa-check text-success"></i></span>
        <span class="wizard-step-caption">
         Paso 2
          <span class="wizard-step-description">Datos del Proyecto</span>
        </span>
      </li>
      <li data-target="#wizard-example-step3" class="wizard3 wizard">
        <span class="wizard-step-number">3</span>
        <span class="wizard-step-complete"><i class="fa fa-check text-success"></i></span>
        <span class="wizard-step-caption">
          Paso 3
          <span class="wizard-step-description">Datos de la Unidad de Producción</span>
        </span>
      </li>
      <li data-target="#wizard-example-step4" class="wizard4 wizard">
        <span class="wizard-step-number">4</span>
        <span class="wizard-step-complete"><i class="fa fa-check text-success"></i></span>
        <span class="wizard-step-caption">
          Paso 4
          <span class="wizard-step-description">Datos de espacios y edificación</span>
        </span>
      </li>
      <li data-target="#wizard-example-step5" class="wizard5 wizard">
        <span class="wizard-step-number">5</span>
        <span class="wizard-step-complete"><i class="fa fa-check text-success"></i></span>
        <span class="wizard-step-caption">
        Paso 5
        <span class="wizard-step-description">Datos de Producción y Operatividad</span>  

        </span>
      </li>
      <li data-target="#wizard-example-step6" class="wizard6 wizard">
        <span class="wizard-step-number">6</span>
        <span class="wizard-step-complete"><i class="fa fa-check text-success"></i></span>
        <span class="wizard-step-caption">
        Fin
        <span class="wizard-step-description">Mano de Obra e Inversion Total</span>  

        </span>
      </li>
    </ul>
  </div>

  <div class="wizard-content">
    <div class="wizard-pane" id="wizard-example-step1">
  
    <form  method="POST" role="form" id="formpaso1">

        <?php include'pasos/paso1.php'; ?>
    

        <div class="pull-right">
        <button type="submit" class="btn btn-primary  pull-right" id="btnpaso1" >Guardar y continuar</button>

          <!--<button type="button" class="btn btn-primary"
            style="visibility:hidden"
           data-wizard-action="next" id="paso1">Guardar y continuar</button>-->
        </div>
      </form>
      </div>
 
 
    <div class="wizard-pane" id="wizard-example-step2">
      <form  method="post" id="formpaso2">
        <?php include'pasos/paso2.php'; ?>

      <button type="button" class="btn btn-primary"
      style="visibility:hidden"
      data-wizard-action="next" id="paso2">Guardar y Continuar</button>

      <div class="pull-right">
        <button type="button" class="btn"  onclick="regresar(1)">Regresar</button>
        <button type="submit" class="btn btn-primary" id="btnpaso2" >Guardar y Continuar</button>
      </div>

    </form>

  </div>
    
    <div class="wizard-pane" id="wizard-example-step3">
      <form  method="post" id="formpaso3">
    
        <?php include'pasos/paso3.php'; ?>
    
        <button type="button" class="btn btn-primary"
        style="visibility:hidden"
        data-wizard-action="next" id="paso3">Guardar y Continuar</button>

        <div class="pull-right">
        <button type="button" class="btn"  onclick="regresar(2)">Regresar</button>
        <button type="submit" class="btn btn-primary" id="btnpaso3" >Guardar y Continuar</button>
        </div>
      </form>
    </div>


    
    <div class="wizard-pane" id="wizard-example-step4">
      <form  method="post" id="formpaso4">
      
  
        <?php include'pasos/paso4.php'; ?>
      
          <button type="button" class="btn btn-primary"
          style="visibility:hidden"
          data-wizard-action="next" id="paso4">Guardar y Continuar</button>
  
          <div class="pull-right">
          <button type="button" class="btn"   onclick="regresar(3)">Regresar</button>
          <button type="submit" class="btn btn-primary" id="btnpaso4" >Guardar y Continuar</button>
          </div>
        </form>
      </div>
    
    <div class="wizard-pane" id="wizard-example-step5">

        <!--<form  method="post" id="formpaso5">-->
  
          <?php include'pasos/paso5.php'; ?>
        <div id="msj5"></div>
        


      <div class="pull-right">
   
        <button type="button" class="btn"   onclick="regresar(4)">Regresar</button>
        <button type="submit" class="btn btn-primary" id="btnpaso5">Guardar y Continuar</button>
      </div>

        <!-- </form> -->
    </div>

    <div class="wizard-pane" id="wizard-example-step6">

        <form  method="post" id="formpaso6">
  
          <?php include'pasos/paso6.php'; ?>
        <div id="msj6"></div>
  

      <div class="pull-right">
        <button type="button" class="btn"   onclick="regresar(5)">Regresar</button>
        <button 
          type="submit" 
          class="btn btn-primary btnfinal" 
          id="btnpaso6"
          data-wizard-action="finish"  
        >Guardar</button>
      </div>
        </form>
    </div>
        
<div id="modal-success" class="modal fade modal-alert modal-success">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"><i class="fa fa-check-circle"></i></div>
      <div class="modal-title">Proyecto registrado exitosamente</div>
      <div class="modal-body">
        <h5>Numero de Caso: 
          <br>
          <strong id="codcaso"> </strong>
        </h5>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success"onclick="location.reload()" >OK</button>
      </div>
    </div>
  </div>
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


try {


$("#formpaso1").validate();


$( "#formpaso1" ).submit(function( e ) {



      e.preventDefault();    //stop form from submitting

      var validate=   $("#formpaso1").valid();

      if(validate){

        regitrarPaso1()
      }
   
     

        
       });


       /*****PASO 2 */
       $("#formpaso2").validate();

       
$( "#formpaso2" ).submit(function( e ) {
             e.preventDefault();    //stop form from submitting
         var validate=   $("#formpaso2").valid();
          if(validate){

          regitrarPaso2()
        }
             
            
         });



                  /*****PASO 3 */
                  $("#formpaso3").validate();
       document.querySelector("#formpaso3").addEventListener("submit", function(e){
        e.preventDefault();    //stop form from submitting
    var validate=   $("#formpaso3").valid();
     if(validate){

     regitrarPaso3()
   }
        
       
    });


      /*****PASO 4 */
      $("#formpaso4").validate();
      document.querySelector("#formpaso4").addEventListener("submit", function(e){
        e.preventDefault();    //stop form from submitting
    var validate=   $("#formpaso4").valid();
      if(validate){

      regitrarPaso4()
    }
             
    });

           /*****PASO 5 */
            $('#btnpaso5').click(function(){
              registrarComplementos()
            })

          /* $("#formpaso5").validate();
           document.querySelector("#formpaso5").addEventListener("submit", function(e){
             e.preventDefault();    //stop form from submitting
         var validate=   $("#formpaso5").valid();
           if(validate){
   
           regitrarPaso5()
         }
        
    });*/





    /*****PASO 6 */
    $("#formpaso6").validate();
      document.querySelector("#formpaso6").addEventListener("submit", function(e){
      e.preventDefault();    //stop form from submitting
      var validate=   $("#formpaso6").valid();
      if(validate){
        let data = $("#formpaso6").serialize()
        //console.log('data :', data);
        $.ajax({
          url: urlbase+'Proyectos/registrarPaso6',
          type:'POST',
          data,
          success: function (r){
            alert('Registro completado con exito')
            console.log('r :', r);
            location.href = urlbase 
          }
        }).fail(function(e){
          alert('ERROR INTERNO EN EL SERVIDOR/BACKEND');
          console.log('error :', e.responseText)
        })
      }
        
    });
      


  } catch (error) {
 
    console.error(error)
  }

</script>