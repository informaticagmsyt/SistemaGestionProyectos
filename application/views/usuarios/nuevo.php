<div class="container">


    <div class="wizard" id="wizard-basic">
        <div class="wizard-wrapper">
            <ul class=wizard-steps>
                <li data-target="#wizard-example-step1">
                    <span class="wizard-step-number">1</span>
                    <span class="wizard-step-complete"><i class="fa fa-check text-success"></i></span>
                    <span class="wizard-step-caption">
                        Paso 1
                        <span class="wizard-step-description">Datos de la Persona</span>
                    </span>
                </li>

                <li data-target="#wizard-example-step2">
                    <span class="wizard-step-number">2</span>
                    <span class="wizard-step-complete"><i class="fa fa-check text-success"></i></span>
                    <span class="wizard-step-caption">
                        Paso 2
                        <span class="wizard-step-description">Datos de Usuario</span>
                    </span>
                </li>
            </ul>
            
        </div>
        <!--End Wizard-wrapper-->
        <div class="wizard-content">
            <div class="wizard-pane" id="wizard-example-step1">
                <div class="panel">
                <form method="POST" class="form-help-text" role="form" id="formPersona">
                    <div class="panel-body">
                        
                        <div class="row form-group">

                                <div class="col-sm-2">
                                    <label for="nacionalidad">Nacionalidad</label>
                                    <select class="custom-select form-control" name="nacionalidad" id="nacionalidad" required>
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
                        <!--End row form-group-->

                        <!--Identificación--->
                        <h4 class="text-center">Identificación</h4>
                        <hr>

                        <div class="row form-group">
                            
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
                                    <select class="custom-select form-control" name="sexo" id="sexo" required>
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
                        <!--End row form-group-->

                        <div class="row form-group">
                            
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
                        <!--End row form-group-->
                        <hr>

                        <div class="row form-group">

                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="institucion_id">Institucion a la que Pertenece</label>
                                    <select class="form-control custom-select" name="institucion_id" id="institucion_id" required data-msg-required="Seleccione una Institución">
                                        <option value="">Seleccione una institución</option>
                                    </select>
                                </div>
                                <!--End Form-gorup-->
                            </div>
                            <!--End Col-->

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="cargo">Cargo que ejerce</label>
                                    <select class="form-control custom-select" name="cargo" id="cargo">
                                        <option value="0">Seccione Cargo</option>
                                        <option value="Director">Director</option>
                                        <option value="Coordinador">Coordinador</option>
                                        <option value="Empleado">Empleado</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <!--End row form-group-->

                        <!--Ubicación-->
                        <h4 class="text-center">Ubicación</h4>
                        <hr>

                        <div class="row form-group">

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="estado_id">Estado</label>
                                    <select class="custom-select form-control" name="estado_id" id="estado_id" required data-msg-required="Seleccione un Estado">
                                        <option value="">Seleccione un estado</option>
                                    </select>
                                </div>
                                <!--End Form-Group-->
                            </div>
                            <!--End Col-->

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="municipio_id">Municipio</label>
                                    <select class="custom-select form-control" name="municipio_id" id="municipio_id" required data-msg-required="Seleccione un Municipio">
                                        <option value="">Seleccione un Municipio</option>
                                    </select>
                                </div>
                                <!--End Form-Group-->
                            </div>
                            <!--End Col-->

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="parroquia_id">Parroquia</label>
                                    <select class="custom-select form-control" name="parroquia_id" id="parroquia_id" required data-msg-required="Seleccione un Parroquia">
                                        <option value="">Seleccione una Parroquia</option>
                                    </select>
                                </div>
                                <!--End Form-Group-->
                            </div>
                            <!--End Col-->

                        </div>
                        <!--End row form-group-->

                        <div class="row form-group">

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="direccion">Dirección</label>
                                    <textarea name="direccion" id="direccion" required data-msg-required="Ingrese una Dirección" class="form-control"></textarea>
                                </div>
                                <!--End Form-Group-->
                            </div>
                            <!--End Col-->

                        </div>
                        <!--End row form-group-->

                    </div>
                    <!--End Panel-body-->
                </div>
                <!--End Panel-->
                <div class="pull-right">
                    <button class="btn btn-primary" type="submit" >Guardar y continuar</button>
                </div>
                </form>
                <!--End Pull-right-->
            </div>
            <!--End Wizard-pane step1-->

            <div class="wizard-pane" id="wizard-example-step2">
                <div class="panel">
                    <div class="panel-body" style="padding-top:6rem; padding-bottom:6rem;">
                       <form id="form_usuario" class="form-help-text">
                        
                            <div class="row form-group">
                                    <div class="col-md-4" style="text-align:right;">
                                        <label for="usuario">Usuario:</label>
                                    </div>
                                    <!--End Col-->
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="usuario" name="usuario" required disabled>
                                    </div>
                                    <!--End Col-->
                            </div>
                            <!--End row form-group -->

                            <div class="row form-group">

                                    <div class="col-md-4" style="text-align:right;">
                                        <label for="clave">Clave:</label>
                                    </div>
                                    <!--End Col-->
                                
                                    <div class="col-md-4">
                                        <input type="password" class="form-control" id="clave" required name="clave">
                                    </div>
                                    <!--End Col-->
                
                            </div>
                            <!--End row form-group-->

                            <div class="row form-group">

                                <div class="col-md-4" style="text-align:right;">
                                    <label for="clavec">Confirmar Clave:</label>
                                </div>
                                <!--End Col-->
                                
                                <div class="col-md-4">
                                    <input type="password" class="form-control" id="clavec" required name="clavec">
                                </div>
                                <!--End Col-->
                            </div>
                            <!--End row form-group-->

                            <div class="row form-group">
                                <div class="col-md-4" style="text-align:right;">
                                    <label for="tipo_usuario">Tipo de Usuario:</label>
                                </div>
                                <!--End Col-->

                                <div class="col-md-4">
                                    <select name="tipo_usuario" id="tipo_usuario" class="form-control custom-select" required>
                                        <option value="">Seleccione un Tipo de Usuario</option>
                                    </select>
                                </div>
                                <!--End Col-->
                              
                            </div>
                            <!--End row form-group-->
                       
                    </div>
                    <!--End Panel-Body-->
                </div>
                <!--End Panel-->
                
                <div class="pull-right">
                    <button class="btn btn-primary" id="submitUsuario" type="submit">Guardar y continuar</button>
                </div>
                </form>
                <div class="pull-left">
                    <button class="btn"  data-wizard-action="prev">Regresar</button>
                </div>
                
            </div>
            <!--End Wizard-pane step2-->
        </div>
        <!--End Wizard-content-->
    
    </div>
    <!--End Wizard-->

    <div id="modal" class="modal fade modal-alert modal-success">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><i class="fa fa-check-circle"></i></div>
                <div class="modal-title">Persona Registrada</div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button class="btn btn-success" data-dismiss="modal">OK</button>
                </div>
            </div>
            <!--End Modal Content-->
        </div>
        <!--End Modal dialog-->
    </div>
    <!--End Modal-->
</div>
<!--End Container-->
<script> var urlbase="<?php echo base_url("index.php/"); ?>"; </script>
<script src="<?php echo base_url()?>public/js/estadoMunParroquia.js"></script>
<script src="<?php echo base_url()?>public/js/entes.js"></script>
<script>
  $(function() {
    $('#wizard-basic').pxWizard();
  });
  entes('#institucion_id');
  perfiles('#tipo_usuario');
    $('#formPersona').validate();

    $('#formPersona').submit(function(e){
        e.preventDefault();
        if($(this).valid()){
        //* Registrar datos mediante ajax 
        $.ajax({
            url: urlbase+"Usuarios/registrarPersona",
            type: "POST",
            dataType: "JSON",
            data: $('#formPersona').serialize(),
            beforeSend: function(data){
            },
            success: function(res) {
                if(res != true){
                    $('#usuario').val($('#cedula').val());
                    
                    //* Mostrar Modal en caso de que registre una nueva persona
                    $('#modal').removeClass('modal-danger');
                    $('#modal').addClass('modal-success');
                    $('#modal .btn').removeClass('btn-danger');
                    $('#modal .btn').addClass('btn-success');
                    $('#modal .fa').removeClass('fa-times-circle');
                    $('#modal .fa').addClass('fa-check-circle');
                    $('#modal .modal-title').html('Persona registrada');
                    $('#modal .modal-body').html(res);
                    $('#modal .btn').attr("onclick","$('.wizard').pxWizard('goNext');");
                    $('#modal').modal('show');
                    /**/
                }else{
                    $('#usuario').val($('#cedula').val());
                    $('.wizard').pxWizard('goNext');
                }
            }
            }).fail(function(re){
                console.log(re.responseText)
            });
           
        }
    });

    $('#form_usuario').validate();
    /* pxValidate 2da forma
     $('#form_usuario').pxValidate({
       // 'usuario':{
       //   required: true
       // },
        'clave': {
          required: true,
          minlength: 6,
          maxlength: 20
        },
        'clavec': {
          required: true,
          minlength: 6,
          equalTo: '#clave'
        },
       // 'tipo_usuario':{
       //     required:true
       // }
        });
        /**/
        
    $('#form_usuario').submit(function(e){
        e.preventDefault();
        
        if($(this).valid()){
            var clave = $('#clave').val();
            var clavec = $('#clavec').val();
            if(clavec != clave ){
                alert('La confirmacion de clave no coincide')
            }else{
                $('#usuario').removeAttr('disabled');   
                //console.log($(this).serialize());
                //* registrar usuario ajax
                $.ajax({
                url:urlbase+"Usuarios/registrar",
                type:"post",
                dataType:"JSON",
                data:$(this).serialize(),
                success:function(res){
                    $('#usuario').attr('disabled',"");  
                    if(res == false){
                        $('#modal').removeClass('modal-success');
                        $('#modal').addClass('modal-danger');
                        $('#modal .btn').removeClass('btn-success');
                        $('#modal .btn').addClass('btn-danger');
                        $('#modal .fa').removeClass('fa-check-circle');
                        $('#modal .fa').addClass('fa-times-circle');
                        $('#modal .modal-title').html('Error');
                        $('#modal .modal-body').html("El Usuario ya se encuentra registrado");
                        $('#modal .btn').attr("onclick","$('.wizard').pxWizard('goPrev');");
                        $('#modal').modal('show');                     
                        //alert("el usuario ya se encuentra registrado");
                    }else{
                        $('#modal').removeClass('modal-danger');
                        $('#modal').addClass('modal-success');
                        $('#modal .btn').removeClass('btn-danger');
                        $('#modal .btn').addClass('btn-success');
                        $('#modal .fa').removeClass('fa-times-circle');
                        $('#modal .fa').addClass('fa-check-circle');
                        $('#modal .modal-title').html('Usuario Registrado');
                        $('#modal .modal-body').html("ID del usuario: "+res);
                        $('#modal .btn').attr("onclick","location.href='listado';");
                        $('#modal').modal('show');
                        //alert("usuario registrado \n ID: "+res);
                        
                    }
                }
                }).fail(function(res){
                    $('#usuario').attr('disabled',"");  
                    alert(res.responseText);
                });
                /**/
            }
            
        }
        
        
        
        });
        

function consultarPersona() {
 var cedula =$("#cedula").val()
 $('#formPersona')[0].reset();
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
    $("#cedula").val(data.cedula)
    $("#nombres").val(data.nombres)
    $("#apellidos").val(data.apellidos)
    setValueSelect("sexo",data.sexo)
    $("#fechanac").val(data.fec_nacimiento)
  
    if(res.data.datapersona){
   var datapersona = res.data.datapersona;
            setValueSelect("institucion_id",datapersona.institucion_id)
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


function perfiles(selector) {

var data={
}
$.ajax({
   
  url: urlbase+"usuarios/getPerfiles" ,
  type: "GET",
  dataType: "JSON",
  data: data,
  success: function(res) {
    console.log(res)

if(res.response.status="ok"){
var data =res.data;

var html='';

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
</script>