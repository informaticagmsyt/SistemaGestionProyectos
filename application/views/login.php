<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
  
  <title>Sistema Gestion Proyectos</title>
  <!-- Core stylesheets -->
  <link href="<?php echo base_url()?>public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url()?>public/css/pixeladmin.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url()?>public/css/widgets.min.css" rel="stylesheet" type="text/css">

  <!-- Theme -->
  <link href="<?php echo base_url()?>public/css/themes/clean.min.css" rel="stylesheet" type="text/css">

  <!-- Pace.js -->
  <script src="<?php echo base_url()?>public/pace/pace.min.js"></script>

  <!-- Custom styling -->
  <style>
    .page-signin-header {
      box-shadow: 0 2px 2px rgba(0,0,0,.05), 0 1px 0 rgba(0,0,0,.05);
    }

    .page-signin-header .btn {
      position: absolute;
      top: 12px;
      right: 15px;
    }

    html[dir="rtl"] .page-signin-header .btn {
      right: auto;
      left: 15px;
    }

    .page-signin-container {
      width: auto;
      margin: 30px 10px;
    }

    .page-signin-container form {
      border: 0;
      box-shadow: 0 2px 2px rgba(0,0,0,.05), 0 1px 0 rgba(0,0,0,.05);
    }

    @media (min-width: 544px) {
      .page-signin-container {
        width: 350px;
        margin: 60px auto;
      }
    }

    .page-signin-social-btn {
      width: 40px;
      padding: 0;
      line-height: 40px;
      text-align: center;
      border: none !important;
    }

    #page-signin-forgot-form { display: none; }
  </style>
  <!-- / Custom styling -->
</head>
<body>
  <div class="page-signin-header p-a-2 text-sm-center bg-white">

    <span class="px-demo-logo bg-primary m-t-0">
    <span class="px-demo-logo-1"></span>
    <span class="px-demo-logo-2"></span>
    <span class="px-demo-logo-3"></span><span class="px-demo-logo-4"></span>
    <span class="px-demo-logo-5"></span><span class="px-demo-logo-6"></span>
    <span class="px-demo-logo-7"></span><span class="px-demo-logo-8"></span>
    <span class="px-demo-logo-9"></span></span>Sistema de Gestión de Proyectos Socio-Productivos
    
  </div>

  <!-- Sign In form -->

  <div class="page-signin-container" id="page-signin-form">
    <h2 class="m-t-0 m-b-4 text-xs-center font-weight-semibold font-size-20">Iniciar Sesión </h2>

    <div id="msj">

</div>
    <form id="login"  class="panel p-a-4">
      <fieldset class=" form-group form-group-lg">
        <input type="text" class="form-control" placeholder="Usuario" name="cedula" 
        required
      
        data-msg-required= "Este campo es Requerido."
        >
      </fieldset>

      <fieldset class=" form-group form-group-lg">
        <input type="password" class="form-control" placeholder="contraseña"  name="clave" required
        data-msg-required= "Ingrese una contraseña."
       

        >
      </fieldset>

  <br>

      <button type="submit" class="btn btn-block btn-lg btn-primary m-t-3"> Ingresar</button>
    </form>





  <!-- / Sign In form -->

  <!-- Reset form -->


  <!-- / Reset form -->

  <!-- ==============================================================================
  |
  |  SCRIPTS
  |
  =============================================================================== -->

  <!-- jQuery -->
  <script src="<?php echo base_url()?>public/js/jquery-3.3.1.min.js"></script>
  <script src="<?php echo base_url()?>public/js/jquery.validate.js"></script>
  <script src="<?php echo base_url()?>public/js/messages_es.min.js"></script>
  <script src="<?php echo base_url()?>public/js/popper.min.js"></script>
 

  <script>
  
  $("#login").validate();
    // -------------------------------------------------------------------------
    $("#login").submit(function(event) {
    

  
event.preventDefault();
var validate=   $("#login").valid();

if(validate){
$.ajax({
  url: "<?php echo base_url("index.php/login/verificarUsuario"); ?>" ,
  type: "POST",
  dataType: "JSON",
  data: $("form").serialize(),
  success: function(res) {

console.log(res)
if(res.response){
  window.location = "<?php echo base_url()  ?>";


}else{

  $("#msj").after('<div class="alert alert-danger mensaje"><strong ><p style="text-align: center"> Usuario o contraseña es incorrecta</p></strong> </div>');
        window.setTimeout(function () {
            $(".mensaje").fadeOut(3000, function () {
            });
        }, 2000);
}




  }
    }).fail(function(re){
console.log(re.responseText)
    
    });

  }
});

  </script>
</body>
</html>
