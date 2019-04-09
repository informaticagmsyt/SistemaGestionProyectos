<div class="container">

    <form method="POST" role="form" id="formTutor">

    <div class="panel">

        <div class="panel-body">
            
            <div class="row">

                    <div class="col-sm-2">
                        <label for="nacionalidad">Nacionalidad</label>
                        <select class="custom-select form-control" name="nacionalidad" id="nacionalidad">
                            <option value="V">V</option>
                            <option value="E">E</option>
                        </select>
                    </div>
                    <!--End Col-->

                    <div class="col-sm-4">
                        <label for="cedula">Cédula</label>
                        <input class="form-control" type="text" id="cedula" name="cedula" placeholder="Cédula" required data-msg-required="Este campo es obligatorio">
                    </div>
                    <!--End Col-->

                    <div class="col-sm-4">
                        <label for=""></label>
                        <br>
                        <button class="btn btn-primary" onclick="consultarPersona();" type="button">Consultar</button>
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
                        <input class="form-control" type="text" name="nombres" id="nombres" placeholder="Nombres" required data-msg-required="Ingrese un nombre">
                    </div>
                    <!---End Form-Group-->
                </div>
                <!--End Col-->

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        <input class="form-control" type="text" name="apellidos" id="apellidos" placeholder="Apellidos" required data-msg-required="Ingrese un Apellido">
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
                        <label for="fechanac">Fecha de nacimiento</label>
                        <div class="input-group date form_date col-md-8" data-date="" data-date-format="dd-mm-yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                            <input class="form-control" size="5" id="fechanac" name="fecha_nac" value="" type="date" >
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
                        <input type="text" placeholder="telefono" id="telefono" name="telefono" class="form-control" required data-msg-required= "Ingrese un numero de teléfono">
                    </div>
                    <!--End Form-group-->
                </div>
                <!--End Col-->

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="telefono2">Telefono 2</label>
                        <input type="text" placeholder="telefono 2" id="telefono2"  name="telefono2" class="form-control">
                    </div>
                    <!--End Form-group-->
                </div>
                <!--End Col-->

                <div class="col-sm-5">
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="email" placeholder="email@test.com" id="email"  name="email" class="form-control" required data-msg-required= "Ingrese un email">
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
                        <input type="text" placeholder="Prefesión u Oficio" id="profesion" name="profesion" class="form-control typeahead" required data-msg-required="Ingrese una Profesion u Oficio">
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
                        <input type="text" placeholder="Codigo del Carnet de la Patria" id="v_carnet"  name="v_carnet" class="form-control">
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
                        <label for="municipio_id"></label>
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
                        <textarea name="direccion" id="direccion" required data-msg-required="Ingrese una Dirección" class="form-control"></textarea>
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
        url: urlbase+"Tutores/registrarDatos" ,
        type: "POST",
        dataType: "JSON",
        data: $('#formTutor').serialize(),
        beforeSend: function(data){

        },
        success: function(res) {
          //alert(res)
          swal({
            title: "Tutor Registrado",
            text: res,
            icon: "success",
            button: "Aceptar",
            }). then((value) => {location.href="<?php echo base_url(); ?>index.php/Tutores/listado";});
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

</script>