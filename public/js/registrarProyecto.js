

 $("#formpaso1").validate();

document.querySelector("#formpaso1").addEventListener("submit", function(e){
  
        e.preventDefault();    //stop form from submitting
        regitrarPaso1()
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
          $("#btnpaso1").text("Guardar y continuar")
          if(res.result){

        $("#msj").after('<div class="alert alert-success mensaje"><strong ><p style="text-align: center">'+
                             res.mensaje+'</p></strong> </div>');
        window.setTimeout(function () {
        $(".mensaje").fadeOut(3000, function () {
          $("#paso1").click()
        });
        }, 2000);

          }else{


            $("#msj").after('<div class="alert alert-danger mensaje"><strong ><p style="text-align: center">'+
                  res.mensaje+'</p></strong> </div>');
          window.setTimeout(function () {
          $(".mensaje").fadeOut(3000, function () {
          });
          }, 5000);
          }
       
      
      
      
      
        }
          }).fail(function(re){
            $("#btnpaso1").text("Guardar y continuar")
      console.log(re.responseText)
          
          });



}