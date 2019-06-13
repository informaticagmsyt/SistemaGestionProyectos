<div class="panel">
  
  
  
        <div id="msj5"></div>
        
          <div class="panel-body">
  
                <h5 class="text-center">Datos de Produccion y Operatividad</h5>
                <div style="display: flex; justify-content: flex-end;">
                <button type="button" id="addInsumo" class="btn btn-primary"><i class="fas fa-plus"></i></button>  
                </div>
              <hr>
  
                <ul id="listaInsumos" style="list-style: none">
                  <li>
                  <div class="form-group row">

                      <div class="col-sm-4">
                        <label>Concepto (Actividad / Rubro)</label>
                        <input type="text" class="form-control">
                      </div>

                      <div class="col-sm-3">
                        <label>Unidad de Medida</label>
                        <input type="text" class="form-control">
                      </div>

                      <div class="col-sm-3">
                        <label>Precio Unitario(Bs)</label>
                        <input type="text" class="form-control">
                      </div>

                      <div class="col-sm-2">
                        <label>Cantidad</label>
                        <input type="text" class="form-control">
                      </div>

                  </div>
                </li>
              </ul>
             
        
      </div>
  </div>
  <script>
    //DANDO EVENTO AL BOTON PARA AGREGAR OTRA FILA
    $('#addInsumo').click(function(){
        //OBTENIENDO LA LISTA DE INSUMOS
        var listaInsumos = $('#listaInsumos');
        //OBTENER LA PRIMERA FILA BUSCANDOLA EN LA LISTA DE INSUMOS
        var insumo = listaInsumos.find('li:first').clone();
        //AÑADIENDO FILA CLONADA A LA LISTA
        insumo.appendTo('#listaInsumos');  
      })    
  </script>
  