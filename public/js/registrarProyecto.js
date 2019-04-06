

 $("#formpaso1").validate();

document.querySelector("#formpaso1").addEventListener("submit", function(e){
  
        e.preventDefault();    //stop form from submitting
        regitrarPaso1()
});





function regitrarPaso1(){

    console.log($("#formpaso1").serialize())
  
   
      $.ajax({
        url: urlbase+"Proyectos/regitrarPaso1" ,
        type: "POST",
        dataType: "JSON",
        data: $("#formpaso1").serialize(),
        beforeSend: function(data){
  
      //$(selector).html("<option>Cargando...<option>");
        },
        success: function(res) {
          console.log(res)
        }
          }).fail(function(re){
      console.log(re.responseText)
          
          });



}