    function entes(selector) {
    
        var data={
          
        }
        
        $.ajax({
            url: urlbase+"Entes/get" ,
            type: "GET",
            dataType: "JSON",
            data: data,
            success: function(res) {
                console.log(res)
        
                if(res.response.status="ok"){
                    var data =res.data;
            
                    var html='';
            
                    for (var i in data) {
                    
                        html='<option value="'+data[i].descripcion+'">'+data[i].descripcion+'</option>';
                        $(selector).append(html)
                    }
                }
        
             }
            }).fail(function(re){
                console.log(re.responseText)
    
                });
        
    }
