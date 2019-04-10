

getCategoria("#categoria_id")
getEstatusProyecto("#estatus_proyecto_id")
getTutores("#tutor")
getEntes("#inst_responsable")
 $("#formpaso1").validate();

document.querySelector("#formpaso1").addEventListener("submit", function(e){

 
        e.preventDefault();    //stop form from submitting

        var validate=   $("#formpaso1").valid();

        if(validate){

          regitrarPaso1()
        }
     
       

          
         });


         /*****PASO 2 */
         $("#formpaso2").validate();

         document.querySelector("#formpaso2").addEventListener("submit", function(e){
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


        /*****PASO 5 */
        $("#formpaso4").validate();
        document.querySelector("#formpaso4").addEventListener("submit", function(e){
          e.preventDefault();    //stop form from submitting
      var validate=   $("#formpaso4").valid();
        if(validate){

        regitrarPaso4()
      }
               
      });

             /*****PASO 5 */
             $("#formpaso5").validate();
             document.querySelector("#formpaso5").addEventListener("submit", function(e){
               e.preventDefault();    //stop form from submitting
           var validate=   $("#formpaso5").valid();
             if(validate){
     
             regitrarPaso5()
           }
          
      });
         $("#categoria_id").change(function() {
         
            
          if(this.value!="")
          getSubCategoria(this.value,"#sub_categoria_id")
         else           
      $("#sub_categoria_id").html("<option value=''>Seleccione una opcion<option>");

      });

 
     




 

function regitrarPaso1(){

 
  
   
      $.ajax({
        url: urlbase+"Proyectos/regitrarPaso1" ,
        type: "POST",
        dataType: "JSON",
        data: $("#formpaso1").serialize(),
        beforeSend: function(data){
  $("#btnpaso1").text("Guardando...")
      //$(selector).html("<option>Cargando...<option>");
        },
        success: function(res) {
        
          if(res.result){

        $("#msj").after('<div class="alert alert-success mensaje"><strong ><p style="text-align: center">'+
                             res.mensaje+'</p></strong> </div>');
        window.setTimeout(function () {
        $(".mensaje").fadeOut(3000, function () {
          $("#btnpaso1").text("Guardar y continuar")
      

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


function regitrarPaso2(){

 
 $("#cedula2").val($("#cedula").val())
   
  $.ajax({
    url: urlbase+"Proyectos/regitrarPaso2" ,
    type: "POST",
    dataType: "JSON",
    data: $("#formpaso2").serialize(),
  
    beforeSend: function(data){
$("#btnpaso2").text("Guardando...")
  //$(selector).html("<option>Cargando...<option>");
    },
    success: function(res) {
    
      if(res.result){

    $("#msj2").after('<div class="alert alert-success mensaje"><strong ><p style="text-align: center">'+
                         res.mensaje+'</p></strong> </div>');
    window.setTimeout(function () {
    $(".mensaje").fadeOut(3000, function () {
      $("#btnpaso2").text("Guardar y continuar")

      $(".wizard-pane,  .wizard").removeClass( "active" );
      $(".wizard3").addClass( "active " );
      $(".wizard2").addClass( " completed" );
      $("#wizard-example-step3").addClass( "active" );
     //$("#paso2").click()
     return false;
    });
    }, 2000);

      localStorage.setItem('idproyecto', res.idproyecto);
      localStorage.setItem('idrequerimiento', res.idrequerimiento);
      }else{


        $("#msj2").after('<div class="alert alert-danger mensaje"><strong ><p style="text-align: center">'+
              res.mensaje+'</p></strong> </div>');
      window.setTimeout(function () {
      $(".mensaje").fadeOut(3000, function () {
        $("#btnpaso2").text("Guardar y continuar")
      });
      }, 5000);
      }
   
  
  
  
  
    }
      }).fail(function(re){
        $("#btnpaso2").text("Guardar y continuar")
  console.log(re.responseText)
  alert("Ocurrio un error")
      });



}



function regitrarPaso3(){


    
   $.ajax({
     url: urlbase+"Proyectos/regitrarPaso3" ,
     type: "POST",
     dataType: "JSON",
     data: $("#formpaso3").serialize(),
   
     beforeSend: function(data){
 $("#btnpaso3").text("Guardando...")
   //$(selector).html("<option>Cargando...<option>");
     },
     success: function(res) {
     
       if(res.result){
 
     $("#msj3").after('<div class="alert alert-success mensaje"><strong ><p style="text-align: center">'+
                          res.mensaje+'</p></strong> </div>');
     window.setTimeout(function () {
     $(".mensaje").fadeOut(3000, function () {
       $("#btnpaso3").text("Guardar y continuar")
       $(".wizard-pane,  .wizard").removeClass( "active" );
       $(".wizard4").addClass( "active" );
       $(".wizard3").addClass( " completed" );
       $("#wizard-example-step4").addClass( "active" );
     });
     }, 2000);
 
       localStorage.setItem('idproyecto', res.idproyecto);
       localStorage.setItem('idrequerimiento', res.idrequerimiento);
       }else{
 
 
         $("#msj3").after('<div class="alert alert-danger mensaje"><strong ><p style="text-align: center">'+
               res.mensaje+'</p></strong> </div>');
       window.setTimeout(function () {
       $(".mensaje").fadeOut(3000, function () {
         $("#btnpaso3").text("Guardar y continuar")
       });
       }, 5000);
       }
    
   
   
   
   
     }
       }).fail(function(re){
         alert("Ocurrio un error")
         $("#btnpaso3").text("Guardar y continuar")
   console.log(re.responseText)
       
       });
 
 
 
 }
 

 function regitrarPaso4(){


    
  $.ajax({
    url: urlbase+"Proyectos/regitrarPaso4" ,
    type: "POST",
    dataType: "JSON",
    data: $("#formpaso4").serialize(),
  
    beforeSend: function(data){
$("#btnpaso4").text("Guardando...")
  //$(selector).html("<option>Cargando...<option>");
    },
    success: function(res) {
    
      if(res.result){

    $("#msj4").after('<div class="alert alert-success mensaje"><strong ><p style="text-align: center">'+
                         res.mensaje+'</p></strong> </div>');
    window.setTimeout(function () {
    $(".mensaje").fadeOut(3000, function () {
      $("#btnpaso4").text("Guardar y continuar")
      $(".wizard-pane,  .wizard").removeClass( "active" );
      $(".wizard5").addClass( "active" );
      $("#wizard-example-step5").addClass( "active" );
      $(".wizard4").addClass( " completed" );
    });
    }, 2000);

      }else{


        $("#msj4").after('<div class="alert alert-danger mensaje"><strong ><p style="text-align: center">'+
              res.mensaje+'</p></strong> </div>');
      window.setTimeout(function () {
      $(".mensaje").fadeOut(3000, function () {
        $("#btnpaso4").text("Guardar y continuar")
      });
      }, 5000);
      }
   
  
  
  
  
    }
      }).fail(function(re){
        alert("Ocurrio un error")
        $("#btnpaso4").text("Guardar y continuar")
  console.log(re.responseText)
      
      });



}


function regitrarPaso5(){


    
  $.ajax({
    url: urlbase+"Proyectos/regitrarPaso5" ,
    type: "POST",
    dataType: "JSON",
    data: $("#formpaso5").serialize(),
  
    beforeSend: function(data){
$("#btnpaso5").text("Guardando...")
$("#btnpaso5").addClass("disabled")
  //$(selector).html("<option>Cargando...<option>");
    },
    success: function(res) {
    
      if(res.result){

        $("#modal-success").modal('show')
        $("#codcaso").text(res.codigoCaso)

    $("#msj5").after('<div class="alert alert-success mensaje"><strong ><p style="text-align: center">'+
                         res.mensaje+'</p></strong> </div>');
    window.setTimeout(function () {
    $(".mensaje").fadeOut(3000, function () {
      $("#btnpaso5").text("Guardar")
      $(".wizard-pane,  .wizard").removeClass( "active" );
      $(".wizard5").addClass( "active" );
      $("#wizard-example-step5").addClass( "active" );
      $(".wizard5").addClass( " completed" );
    });
    }, 2000);

      }else{


        $("#msj5").after('<div class="alert alert-danger mensaje"><strong ><p style="text-align: center">'+
              res.mensaje+'</p></strong> </div>');
      window.setTimeout(function () {
      $(".mensaje").fadeOut(3000, function () {
        $("#btnpaso5").text("Guardar ")
      });
      }, 5000);
      }
   
  
  
  
  
    }
      }).fail(function(re){
        alert("Ocurrio un error")
        $("#btnpaso5").text("Guardar")
        $("#btnpaso5").removeClass("disabled")
  console.log(re.responseText)
      
      });



}


function getCategoria(selector) {

  var data={
  
  }
  
  $.ajax({
    url: urlbase+"Proyectos/getCategoria" ,
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


  function getEntes(selector) {

    var data={
    
    }
    
    $.ajax({
      url: urlbase+"Entes/get" ,
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
  
  
    html='<option value="">Seleccione una Institucion</option>';
    $(selector).append(html)
     for (var i in data) {
  
         html='<option value='+data[i].id+'>'+data[i].descripcion+'</option>';
         $(selector).append(html)
     }
  
      
    }else{
      html='<option value="0">Seleccione una Institucion</option>';
      $(selector).append(html)
    }
    
    
    
    
      }
        }).fail(function(re){
          html='<option value="0">Seleccione una Institucion</option>';
          $(selector).append(html)
    console.log(re.responseText)
        
        });
    
    }

  
function getTutores(selector) {

  var data={
  
  }
  
  $.ajax({
    url: urlbase+"Tutores/getJSON" ,
    type: "GET",
    dataType: "JSON",
    data: data,
    beforeSend: function(data){

  $(selector).html("<option>Cargando...<option>");
    },
    success: function(res) {
      console.log(res)

 var data =res;

 var html='';
$(selector+' option').each(function()  {$(this).remove(); });


  html='<option value="0">Sin Asignar</option>';
  $(selector).append(html)
   for (var i in data) {

       html='<option value='+data[i].id+'>'+data[i].nombres+' '+data[i].apellidos+'</option>';
       $(selector).append(html)
   }

    
  
  
  
  
  
    }
      }).fail(function(re){
        $(selector+' option').each(function()  {$(this).remove(); });


  html='<option value="0">Sin Asignar</option>';
  $(selector).append(html)
  console.log(re.responseText)
      
      });
  
  }

  function getEstatusProyecto(selector) {

    var data={
    
    }
    
    $.ajax({
      url: urlbase+"Proyectos/getEstatusProyecto" ,
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

    function regresar(paso){
    var wizard=".wizard"+paso
      $(".wizard-pane,  .wizard").removeClass( "active" );
      $(wizard).addClass( "active" );
      $("#wizard-example-step"+paso+"").addClass( "active" );

      $(wizard).removeClass( " completed" );
console.log(wizard)
    }