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
            </li>
            <!--END LI-->
            
            <li data-target="#wizard-example-step2" class="wizard2 wizard">
              <span class="wizard-step-number">2</span>
              <span class="wizard-step-complete"><i class="fa fa-check text-success"></i></span>
              <span class="wizard-step-caption">
              Paso 2
              <span class="wizard-step-description">Datos del Requerimiento</span>
            </li>
            <!--END LI-->
          </ul>
          <!--END UL-->
      </div>
      <!--END WIZARD-->

      <div class="wizard-content">
        
        <div class="wizard-pane" id="wizard-example-step1">
  
          <form  method="POST" role="form" id="formpaso1">

            <?php include'pasos/paso1.php'; ?>
    
            <div class="pull-right">
              <button type="submit" class="btn btn-primary  pull-right" id="btnpaso1" >Guardar y continuar</button>
            </div>
            <!--END PULL-RIGHT-->
          </form>
          <!--END FORM-->
        
        </div>
        <!--END WIZARD-PANE-->  
 
        <div class="wizard-pane" id="wizard-example-step2">
          
          <form  method="POST" role="form" id="formpaso2">
            
            <?php include'pasos/paso2.php'; ?>
      
            <button type="button" class="btn btn-primary" style="visibility:hidden" data-wizard-action="next" id="paso2">Guardar y Continuar</button>

            <div class="pull-right">
              <button type="button" class="btn"  onclick="regresar(1)">Regresar</button>
              <button type="submit" class="btn btn-primary" id="btnpaso2" >Guardar y Continuar</button>
            </div>
            <!--END PULL-RIGHT-->    
          </form>
          <!--END FORM-->
        
        </div>
        <!--END WIZARD-PANE-->
        
        <div id="modal-success" class="modal fade modal-alert modal-success">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header"><i class="fa fa-check-circle"></i></div>
              <div class="modal-title">Requerimiento registrado exitosamente</div>
              <div class="modal-body">
                <h5>Numero de Caso: 
                  <br>
                  <strong id="codcaso"> </strong>
                </h5>
              </div>
              <!--END MODAL-BODY-->
              <div class="modal-footer">
                <button type="button" class="btn btn-success"onclick="location.reload()" >OK</button>
              </div>
              <!--END MODAL-FOOTER-->
            </div>
            <!--END MODAL-CONTENT-->
          </div>
          <!--END MODAL-DIALOG-->
        </div>
        <!--END MODAL-SUCCESS-->
      </div>
      <!--END WIZARD-CONTENT-->
    </div>
    <!--END COL-MD-11-->
  </div>
  <!--END ROW-->
</div>
<!--END CONTAINER-->

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

  $("#msj").after('<div class="alert alert-danger mensaje"><strong >'+
   ' <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <p style="text-align: center">'+
                         res.comments+'</p></strong>'+ 
                         
      '</div>');
  
}else{
  $("#msj").after('<div class="alert alert-danger mensaje"><strong >'+
   ' <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <p style="text-align: center">'+
                         res.comments+'</p></strong>'+ 
                         
      '</div>');

}




  }
    }).fail(function(re){
console.log(re.responseText)
    
    });

}

</script>