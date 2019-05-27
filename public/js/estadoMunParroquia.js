

$( document ).ready(function() {
    estado("#estado_id") 

    estado("#estado") 
    


    $("#estado_id2").change(function() {
         
            
      if(this.value!="")
      municipio(this.value,"#municipio_id")
     else           
  $("#municipio_id").html("<option value=''>Seleccione un Municipio<option>");

  });
        $("#estado_id").change(function() {
         
            
            if(this.value!="")
            municipio(this.value,"#municipio_id")
           else           
        $("#municipio_id").html("<option value=''>Seleccione un Municipio<option>");

        });

        
        $("#estado").change(function() {
         
            
          if(this.value!="")
          municipio(this.value,"#municipio")
         else           
      $("#municipio").html("<option value=''>Seleccione un Municipio<option>");

      });



      
      $("#municipio").change(function() {
         
            
        if(this.value!="")
        parroquia(this.value,"#parroquia")
       else           
      $("#parroquia").html("<option value=''>Seleccione una Parroquia<option>");

    });
        $("#municipio_id").change(function() {
         
            
            if(this.value!="")
            parroquia(this.value,"#parroquia_id")
           else           
          $("#parroquia_id").html("<option value=''>Seleccione una Parroquia<option>");

        });

       

});

function estado(selector) {

   var data={
     
   }
   
   $.ajax({
     url: urlbase+"EstadosC/get" ,
     type: "GET",
     dataType: "JSON",
     data: data,
     success: function(res) {
       console.log(res)

   if(res.response.status="ok"){
  var data =res.data;

  var html='';

    for (var i in data) {
 
        html='<option value='+data[i].id+'>'+data[i].estado+'</option>';
        $(selector).append(html)
    }

     
   }
   
   
   
   
     }
       }).fail(function(re){
   console.log(re.responseText)
       
       });
   
   }


   function municipio(id,selector) {

    var data={
      id_estado:id
    }
    
    $.ajax({
      url: urlbase+"MunicipiosC/get" ,
      type: "GET",
      dataType: "JSON",
      data: data,
      beforeSend: function(data){

    $(selector).html("<option>Cargando...<option>");
      },
      success: function(res) {
        console.log(res)
 
    if(res.response.status="ok"){
   var data =res.data;
 
   var html='';
   
 $(selector+' option').each(function()  {$(this).remove(); });

 html='<option value="">Seleccione un Municipio</option>';
 $(selector).append(html)
     for (var i in data) {
  
        
         html='<option value='+data[i].id+'>'+data[i].municipio+'</option>';
         $(selector).append(html)
     }
 
      
    }
    
    
    
    
      }
        }).fail(function(re){
    console.log(re.responseText)
        
        });
    
    }



    function parroquia(id,selector) {

        var data={
          id_parroquia:id
        }
        
        $.ajax({
          url: urlbase+"ParroquiasC/get" ,
          type: "GET",
          dataType: "JSON",
          data: data,
          beforeSend: function(data){
    
        $(selector).html("<option>Cargando...<option>");
          },
          success: function(res) {
            console.log(res)
     
        if(res.response.status="ok"){
       var data =res.data;
     
       var html='';
     $(selector+' option').each(function()  {$(this).remove(); });

      
        html='<option value="">Seleccione una Parroquia</option>';
        $(selector).append(html)
         for (var i in data) {
      
             html='<option value='+data[i].id+'>'+data[i].parroquia+'</option>';
             $(selector).append(html)
         }
     
          
        }
        
        
        
        
          }
            }).fail(function(re){
        console.log(re.responseText)
            
            });
        
        }