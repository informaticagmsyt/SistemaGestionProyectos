function recorrerForms(lista){
    var dataForm = []; //DATA GENERAL PARA GUARDAR TODOS LOS FORMULARIOS(FILAS)
    //CANTIDAD DE FORMULARIOS(FILAS)QUE HAY

    //OBTENIENDO LOS FORMULARIOS QUE HAY DENTRO DE LA LISTA
    let filasForms = $(lista + ' li form');
    //LONGITUD(CANTIDAD) DE FORMULARIOS(FILAS) QUE SE OBTUVO
    let nfilas = filasForms.length;

    //* ACTIVAR / DESACTIVAR FUNCCION
    
    //RECORRER EL NUMERO DE FILAS
    for(let i = 0; i < nfilas; i++){

        let formFila = filasForms[i]; //FORMULARIO(FILA) QUE TOMA EN EL RECORRIDO
        let elementosForm = formFila.elements; //ELEMENTOS(ITEMS) QUE TRAE EL FORMULARIO
        var datosFila = {}//OBJETO DONDE SE GUARDARAN LOS DATOS DE LOS ELEMENTOS

        //RECORRER EL NUMERO DE ELMENTOS QUE TRAE EL FORMULARIO
        for(let j = 0; j < elementosForm.length; j++){
            let elemento = elementosForm[j] //ELEMENTO QUE TOMA EN EL RECORRIDO
            let elementoName = elemento.name //NOMBRE DEL ELEMENTO
            let elementoValue = elemento.value //VALUE(VALOR) QUE TIENE EL ELEMENTO
            
            //CONDICIONANDO QUE EN CASO QUE NO SEA EL ELEMENTO DE TIPO BUTTON
            if(elemento.tagName != 'BUTTON'){
                //AGREGAR AL OBJETO DE LOS DATOS QUE SE VAN RECORRIENDO DANDOLE
                //COMO LLAVE EL NOMBRE(NAME) DEL ELEMENTO(INPUT) Y COMO CONTENIDO EL VALOR(VALUE)
                datosFila[`${elementoName}`] = elementoValue;
            }
        }
        //MOSTRAR POR CONSOLA EL OBJETO QUE CONTIENE 
        //LOS DATOS ACTUALES A ESTE RECORRIDO(CICLO FOR)
        //console.log(datosFila);
        
        //AGREGAR OBJETO DE DATOS A LA DATA GENERAL DE LOS FORMULARIOS
        dataForm.push(datosFila); 
    }
    //MOSTRAR POR CONSOLA TODA LA DATA OBTENIDA
    //console.log(dataForm)

    //ROTORNAR DATA
    return dataForm;
    /**/
}   


function eleminarForm(lista,li){
    //OBTENIENDO CANTIDAD DE FILAS QUE HAY EN LA LISTA
    let cantFilas = $(lista + ' li').length;
    //SI HAY MAS DE UNA FILA ELMINA LA FILA
    if(cantFilas > 1){
        li.remove();//ELMINIAR FILA 
        
    }else{ // SINO  HAY MAS DE UNA FILA
        //OBTENER EL FORMULARIO DE LA FILA
        let form = li.find('form');
        form[0].reset(); //VACIAR(RESETEAR) FORMULARIO
    }
}


function registrarComplementos(){
 
  let data = {}
  data['Insumos'] = recorrerForms('#listaInsumos')
  data['Herramientas'] = recorrerForms('#listaEquipostrabajo') 
  data['Maquinas'] = recorrerForms('#listaEquipostecno')
  data['Mobiliario'] = recorrerForms('#listaEquiposcomp')

  //console.log('Data general de complementos: ',data)

  $.ajax({
    type:'POST',
    url: urlbase + 'Complementos/registrarComplementos',
    data: 'data='+ JSON.stringify(data),
    success: function(r){
      if(r.status){
        console.log(r.complementosRegistrados)
        $(".wizard-pane,  .wizard").removeClass( "active" )
        $(".wizard6").addClass( "active" )
        $("#wizard-example-step6").addClass( "active" )
        $(".wizard5").addClass( " completed" )
        $("#btnpaso5").removeClass("disabled")
      }
    },
    beforeSend: function(){
      $("#btnpaso5").text("Guardando...")
      $("#btnpaso5").addClass("disabled")
    }
  })
}




//*MATERIA PRIMA E INSUMOS    
    //DANDO EVENTO AL BOTON PARA AGREGAR OTRA FILA
    $('#addInsumo').click(function(){
        //OBTENIENDO LA LISTA DE INSUMOS
        var listaInsumos = $('#listaInsumos');
        //OBTENER LA PRIMERA FILA BUSCANDOLA EN LA LISTA DE INSUMOS
        var insumo = listaInsumos.find('li:first').clone();
        //OBTENER FORMULARIO DENTRO DE LA LISTA
        var form = insumo.find('form');
        //OBTENER INPUT PARA AUTOCOMPLETADO
        let input = form.find('input[name=conceptoInsumo]');
        //DARLE LA FUNCION DE BUSQUEDA AL INPUT DEL CONCEPTO
        //
        //RESETEAR(VACIAR) FORMULARIO
        form[0].reset();
        //AÑADIENDO FILA CLONADA A LA LISTA
        insumo.appendTo('#listaInsumos');  
      })
/**/

//*HERRAMIENTAS Y EQUIPOS DE TRABAJO
    $('#addEquipostrabajo').click(function()
    {
      var listaEquipostrabajo = $('#listaEquipostrabajo');
      var equipostrabajo = listaEquipostrabajo.find('li:first').clone();
      var form = listaEquipostrabajo.find('form');
      form[0].reset();
      equipostrabajo.appendTo('#listaEquipostrabajo');
    })
/**/

//*MAQUINAS Y EQUIPOS TECNOLOGICOS
    $('#addEquipostecno').click(function()
    {
      var listaEquipostecno = $('#listaEquipostecno');
      var equipostecno = listaEquipostecno.find('li:first').clone();
      var form = listaEquipostecno.find('form');
      let input = form.find('input[name=conceptoMaquina]');
      form[0].reset();
      equipostecno.appendTo('#listaEquipostecno');
    })
/**/

//*MOBILIARIO Y EQUIPOS COMPLEMENTARIOS
    $('#addEquiposcomp').click(function()
    {
      var listaEquiposcomp = $('#listaEquiposcomp');
      var equiposcomp = listaEquiposcomp.find('li:first').clone();
      var form = listaEquiposcomp.find('form');
      let input = form.find('input[name=conceptoMobiliario]');
      form[0].reset();
      equiposcomp.appendTo('#listaEquiposcomp');
    })
/**/     

  //FUNCION PARA BUSCAR POSIBLES RELACIONES AL TIPIEAR EN EL INPUTS
  var busquedaInsumo = $('input[name=conceptoInsumo]').typeahead({
    source:  function (query, process) {
      return $.get(urlbase + 'Complementos/busquedaInsumos', { codigo: query, action:"searchClient" }, 
        function (data) {
        //console.log(data);
          if(data.find){
            return process(data.obj);
          }
        });
      }
     
    });

  var busquedaHerramienta =  $('input[name=conceptoHerramienta]:first').typeahead({
    source:  function (query, process) {
    return $.get(urlbase + 'Complementos/busquedaHerramientas', { codigo: query, action:"searchClient" }, 
    function (data) {
    //console.log(data);
      if(data.find){
        return process(data.obj);
        }
          });
        }
     
    });

  var busquedaMaquina =  $('input[name=conceptoMaquina]').typeahead({
    source:  function (query, process) {
      return $.get(urlbase + 'Complementos/busquedaMaquinas', { codigo: query, action:"searchClient" }, function (data) {
          //console.log(data);
          if(data.find){
            return process(data.obj);
          }
        });
      }
     
    });

  var busquedaMobiliario = $('input[name=conceptoMobiliario]').typeahead({
    source:  function (query, process) {
    return $.get(urlbase + 'Complementos/busquedaMobiliario', { codigo: query, action:"searchClient" }, function (data) {
    //console.log(data);
      if(data.find){
        return process(data.obj);
        }
          });
        }
     
    });
