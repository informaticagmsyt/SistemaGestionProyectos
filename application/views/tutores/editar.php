<?php
  $datos = array();
//INGRESANDO DATOS DE LA PERSONA EN EL ARRAY 
 foreach ($registro as $persona) {
   $datos['id'] =  $persona->id;
   $datos['nacionalidad'] = $persona->nacionaliidad;
   $datos['cedula'] =  $persona->cedula;
   $datos['nombres'] =  $persona->nombres;
   $datos['sexo'] = $persona->sexo;
   $datos['apellidos'] =  $persona->apellidos;
   $datos['email'] = $persona->email;
   $datos['cargo'] = $persona->cargo;
   $datos['direccion'] = $persona->direccion;
   $datos['estado_id'] = $persona->estado_id;
   $datos['municipio_id'] = $persona->municipio_id;
   $datos['parroquia_id'] = $persona->parroquia_id;
   $datos['v_carnet'] = $persona->v_carnet;
   $datos['v_social'] = $persona->v_social;
   $datos['fecha_nac'] = $persona->fecha_nac;
   $datos['posee_carnet'] = $persona->posee_carnet;
   $datos['telefono'] = $persona->telefono;
   $datos['telefono2'] = $persona->telefono2;
   $datos['profesion'] = $persona->profesion;
   $datos['institucion_id'] = $persona->institucion_id;
 }

 ?>

<div class="container">

    <form method="POST" role="form" id="formTutor">

    <div class="panel">

        <div class="panel-body">
            <input type="text" name="id" value="<?php echo $datos['id']; ?>" hidden>
            <div class="row">

                    <div class="col-sm-2">
                        <label for="nacionalidad">Nacionalidad</label>
                        <select class="custom-select form-control" name="nacionalidad" id="nacionalidad" disabled>
                            <option value="V">V</option>
                            <option value="E">E</option>
                        </select>
                    </div>
                    <!--End Col-->

                    <div class="col-sm-4">
                        <label for="cedula">Cédula</label>
                        <input class="form-control" type="text" id="cedula" name="cedula" placeholder="Cédula" required data-msg-required="Este campo es obligatorio" value="<?php echo $datos['cedula']; ?>" disabled>
                    </div>
                    <!--End Col-->

                    <div class="col-sm-4">
                        <label for=""></label>
                        <br>
                        <button class="btn btn-primary" onclick="consultarPersona();" type="button" disabled>Consultar</button>
                    </div>
                    <!--End Col-->
            </div>
            <!--End Row-->

            <!--Identificación--->
            <h4 class="text-center">Identificación</h4>
            <hr>

            <div class="row">
                
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="nombres">Nombres</label>
                        <input class="form-control" type="text" name="nombres" id="nombres" placeholder="Nombres" required data-msg-required="Ingrese un nombre" value="<?php echo $datos['nombres']; ?>">
                    </div>
                    <!---End Form-Group-->
                </div>
                <!--End Col-->

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        <input class="form-control" type="text" name="apellidos" id="apellidos" placeholder="Apellidos" required data-msg-required="Ingrese un Apellido" value="<?php echo $datos['apellidos']; ?>">
                    </div>
                    <!---End Form-Group-->
                </div>
                <!--End Col-->

                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="sexo">Sexo</label>
                        <select class="custom-select form-control" name="sexo" id="sexo">
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>
                    <!---End Form-Group-->
                </div>
                <!--End Col-->

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="fecha_nac">Fecha de nacimiento</label>
                        <div class="input-group date form_date col-md-8" data-date="" data-date-format="dd-mm-yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                            <input class="form-control" size="5" id="fecha_nac" name="fecha_nac" value="" type="date">
                            <!--<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span><i class="far fa-trash-alt"></i></span>-->
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span><i class="far fa-calendar-alt"></i></span>
                        </div>
                    </div>
                    <!---End Form-Group-->
                </div>
                <!---End Col-->

            </div>
            <!--End Row-->

            <div class="row">
                
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text" placeholder="telefono" id="telefono" name="telefono" class="form-control" required data-msg-required= "Ingrese un numero de teléfono" value="<?php echo $datos['telefono']; ?>">
                    </div>
                    <!--End Form-group-->
                </div>
                <!--End Col-->

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="telefono2">Telefono 2</label>
                        <input type="text" placeholder="telefono 2" id="telefono2"  name="telefono2" class="form-control" value="<?php echo $datos['telefono2']; ?>">
                    </div>
                    <!--End Form-group-->
                </div>
                <!--End Col-->

                <div class="col-sm-5">
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="email" placeholder="email@test.com" id="email"  name="email" class="form-control" required data-msg-required= "Ingrese un email" value="<?php echo $datos['email']; ?>">
                    </div>
                    <!--End Form-group-->
                </div>
                <!--End Col-->

            </div>
            <!--End Row-->
            <hr>

            <div class="row">

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="profesion">Prefesión / Oficio</label>
                        <input type="text" placeholder="Prefesión u Oficio" id="profesion" name="profesion" class="form-control typeahead" required data-msg-required="Ingrese una Profesion u Oficio" value="<?php echo $datos['profesion']; ?>">
                    </div>
                    <!--End Form-Group-->
                </div>
                <!--End Col-->

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="posee_carnet">¿Posee Carnet de la Patria?</label>
                        <select class="custom-select form-control" id="posee_carnet" name="posee_carnet">
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>
                    <!--End Form-Group-->
                </div>
                <!--End Col-->

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="v_carnet">Código Carnet de la Patria</label>
                        <input type="text" placeholder="Codigo del Carnet de la Patria" id="v_carnet"  name="v_carnet" class="form-control" value="<?php echo $datos['v_carnet']; ?>">
                    </div>
                    <!--End Form-Group-->
                </div>
                <!--End Col-->

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="v_social">Vinculación Social</label>
                        <select class="custom-select form-control" name="v_social" id="v_social">
                            <option value="clap">Estructura Clap</option>
                            <option value="consejo comunal">Consejo Comunal</option>
                            <option value="jefe de calle">Jefe de Calle</option>
                            <option value="ffm">FFM</option>
                            <option value="otro">Otros</option>
                        </select>
                    </div>
                    <!--End Form-Group-->
                </div>
                <!--End Col-->

            </div>
            <!--End Row-->

            <!--Ubicación-->
            <h4 class="text-center">Ubicación</h4>
            <hr>

            <div class="row">

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="estado_id">Estado</label>
                        <select class="custom-select form-control" name="estado_id" id="estado_id">
                            <option value="0">Seleccione un estado</option>
                        </select>
                    </div>
                    <!--End Form-Group-->
                </div>
                <!--End Col-->

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="municipio_id">Municipio</label>
                        <select class="custom-select form-control" name="municipio_id" id="municipio_id">
                            <option value="">Seleccione un Municipio</option>
                        </select>
                    </div>
                    <!--End Form-Group-->
                </div>
                <!--End Col-->

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="parroquia_id">Parroquia</label>
                        <select class="custom-select form-control" name="parroquia_id" id="parroquia_id">
                            <option value="">Seleccione una Parroquia</option>
                        </select>
                    </div>
                    <!--End Form-Group-->
                </div>
                <!--End Col-->

            </div>
            <!--End Row-->

            <div class="row">

                <div class="col-sm-12">
                    <div class="form-group">
                        <textarea name="direccion" id="direccion" required data-msg-required="Ingrese una Dirección" class="form-control" ><?php echo $datos['direccion']; ?></textarea>
                    </div>
                    <!--End Form-Group-->
                </div>
                <!--End Col-->

            </div>
            <!--End Row-->

        </div>
        <!--End Panel-body-->
        <div class="pull-right">
            <button class="btn btn-primary" type="submit">Guardar y continuar</button>
        </div>
    </div>
    <!--End Panel-->

</div>
<!--End Container-->
<script> var urlbase="<?php echo base_url("index.php/"); ?>"; </script>
<script src="<?php echo base_url()?>public/js/estadoMunParroquia.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

$(function() {
  $('#wizard-basic').pxWizard();
});

$("#formTutor").validate();

$('#formTutor').submit(function(e){
  
    e.preventDefault(); 

    //Arreglo que servira para enviar data mediante AJAX
    //data = []
    
    //* Recorrer los elementos del formulario
    var elements = document.querySelector('#formTutor').elements;
    console.log('---------ELEMENTS------------')
    for (var i = 0; i < elements.length ; i++) {
         var tagName = elements[i].tagName //tipo de elemento
         //console.log(tagName)
         //validar el tipo de elemento
         if(tagName == 'SELECT' || tagName == 'INPUT' || tagName == 'TEXTAREA'){
         var name = elements[i].name // nombre del elemento
         var value = elements[i].value // contenido del elemento
         console.log(tagName+"-> "+name+"="+value)
         //data.push(value) // agregar elemento al arreglo 'data'
         }
    }
    /**/
    
    /* Recorrer y mostrar Data 
    console.log('----------DATA-------------')
    for(var i = 0; i < data.length; i++){
            console.log(data[i])
         }
    /**/

    $.ajax({
        url: urlbase+"Tutores/actualizarDatos" ,
        type: "POST",
        dataType: "JSON",
        data: $('#formTutor').serialize(),
        beforeSend: function(data){

        },
        success: function(res) {
          //alert(res)
          if(res != 1){    
          swal({
            title: "Error al Actualizar Tutor",
            text:res,
            icon: "error",
            button: "Aceptar",
            }); 
          }else{
            swal({
            title: "Tutor Actualizado",
            icon: "success",
            button: "Aceptar",
            }). then((value) => {location.href="<?php echo base_url(); ?>index.php/Tutores/listado";});
          }
        }
          }).fail(function(re){
            console.log(re.responseText)
          });

});
/*
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
/**/
  $(".prev").addClass("fas fa-chevron-left")
  
  $(".next").addClass("fas fa-chevron-right")


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
 //console.log(data)
if(res.response.status="ok"){

$("#nombres").val(data.nombres)
$("#apellidos").val(data.apellidos)
setValueSelect("sexo",data.sexo)
$("#fechanac").val(data.fec_nacimiento)

}

}
  }).fail(function(re){
console.log(re.responseText)
  
  });

}

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



</script>

<script>
    //* Asignando los value a los elementos 
    $('#nacionalidad').val("<?php echo $datos['nacionalidad']; ?>")
    $('#sexo').val("<?php echo $datos['sexo']; ?>");
    $('#posee_carnet').val("<?php echo $datos['posee_carnet'];?>");
    $('#v_social').val("<?php echo $datos['v_social']; ?>");
    $('#fecha_nac').val("<?php echo $datos['fecha_nac']; ?>");
    /**/

    //* Cargando los estados, municipios y parroquias
    estado('#estado_id')
    parroquia(<?php echo $datos['municipio_id'] ?>,"#parroquia_id");
    municipio(<?php echo $datos['estado_id'] ?>,"#municipio_id");
    /**/

    //* Funccion que servira para dar value a algunos elementos que se escriben despues de preparar el documento (estados,municipios, parrquias)
    function values(value,selector){
        $(document).ready(function(){
            $(selector).val(value);
            //console.log("Selector:"+selector+"\nValue:"+value)
        });
    }
    /**/

    //* Asignando a los value mediante la funccion Values
    values(<?php echo $datos['estado_id']; ?>,"#estado_id")
    values(<?php echo $datos['municipio_id']; ?>,"#municipio_id")
    values(<?php echo $datos['parroquia_id']; ?>,"#parroquia_id")
    /**/
  
</script>