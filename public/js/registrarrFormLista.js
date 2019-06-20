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

// FUNCTION PARA ENVIAR AL SERVIDOR(PHP) LA
function registrarForms(lista){
    let data = recorrerForms(lista);
    let json = "data=" + JSON.stringify(data);
    console.log(data);
    
    /* REGISTRAR MEDIANTE AJAX
    $.ajax({
        type: "POST",
        url: "controlador",
        data: json,
        success: function(res){
            console.log(res);
        },
    });
    */
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