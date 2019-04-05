

getCategoria("#categoria_id")
getEstatusProyecto("#estatus_proyecto_id")

 $("#formpaso1").validate();

document.querySelector("#formpaso1").addEventListener("submit", function(e){

 
        e.preventDefault();    //stop form from submitting

        var validate=   $("#formpaso1").valid();

        if(validate){

          regitrarPaso1()
        }
     
       

          
         });


         /*****PASO 2 */
         document.querySelector("#formpaso2").addEventListener("submit", function(e){
               e.preventDefault();    //stop form from submitting
           var validate=   $("#formpaso2").valid();
            if(validate){
  
            regitrarPaso2()
          }
               
              
           });
  


                    /*****PASO 3 */
         document.querySelector("#formpaso3").addEventListener("submit", function(e){
          e.preventDefault();    //stop form from submitting
      var validate=   $("#formpaso3").valid();
       if(validate){

       regitrarPaso3()
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
          $("#paso1").click()
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
      $("#paso2").click()
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
       $("#paso3").click()
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