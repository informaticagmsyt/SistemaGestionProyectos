<div class="panel">
  
  
  
        <div id="msj5"></div>
        
          <div class="panel-body">
                <!-- INICIO MATERIA PRIMA E INSUMOS -->  
                <h5 class="text-center">Materia Prima e Insumos</h5>
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
              <!-- FIN MATERIA PRIMA E INSUMOS -->

              <!-- INICIO HERRAMIENTAS Y EQUIPOS DE TRABAJO -->
              <h5 class="text-center">Herramientas y Equipos de Trabajo</h5>
                <div style="display: flex; justify-content: flex-end;">
                <button type="button" id="addEquipostrabajo" class="btn btn-primary"><i class="fas fa-plus"></i></button>  
                </div>
              <hr>
  
              <ul id="listaEquipostrabajo" style="list-style: none">
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
              <!-- FIN HERRAMIENTAS Y EQUIPOS DE TRABAJO -->

              <!-- INICIO HERRAMIENTAS Y EQUIPOS TECNOLOGICOS -->
              <h5 class="text-center">Herramientas y Equipos Tecnologicos</h5>
                <div style="display: flex; justify-content: flex-end;">
                <button type="button" id="addEquipostecno" class="btn btn-primary"><i class="fas fa-plus"></i></button>  
                </div>
              <hr>
  
              <ul id="listaEquipostecno" style="list-style: none">
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
              <!-- FIN HERRAMIENTAS Y EQUIPOS TECNOLOGICOS -->

              <!-- INICIO MOBILIARIO Y EQUIPOS COMPLEMENTARIOS -->
              <h5 class="text-center">Mobiliario y Equipos Complementarios</h5>
                <div style="display: flex; justify-content: flex-end;">
                <button type="button" id="addEquiposcomp" class="btn btn-primary"><i class="fas fa-plus"></i></button>  
                </div>
              <hr>
  
              <ul id="listaEquiposcomp" style="list-style: none">
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
//*MATERIA PRIMA E INSUMOS    
    //DANDO EVENTO AL BOTON PARA AGREGAR OTRA FILA
    $('#addInsumo').click(function(){
        //OBTENIENDO LA LISTA DE INSUMOS
        var listaInsumos = $('#listaInsumos');
        //OBTENER LA PRIMERA FILA BUSCANDOLA EN LA LISTA DE INSUMOS
        var insumo = listaInsumos.find('li:first').clone();
        //AÑADIENDO FILA CLONADA A LA LISTA
        insumo.appendTo('#listaInsumos');  
      })
/**/

//*HERRAMIENTAS Y EQUIPOS DE TRABAJO
    $('#addEquipostrabajo').click(function()
    {
      var listaEquipostrabajo = $('#listaEquipostrabajo');
      var equipostrabajo = listaEquipostrabajo.find('li:first').clone();
      equipostrabajo.appendTo('#listaEquipostrabajo');
    })
/**/

//*HERRAMIENTAS Y EQUIPOS TECNOLOGICOS
    $('#addEquipostecno').click(function()
    {
      var listaEquipostecno = $('#listaEquipostecno');
      var equipostecno = listaEquipostecno.find('li:first').clone();
      equipostecno.appendTo('#listaEquipostecno');
    })
/**/

//*MOBILIARIO Y EQUIPOS COMPLEMENTARIOS
    $('#addEquiposcomp').click(function()
    {
      var listaEquiposcomp = $('#listaEquiposcomp');
      var equiposcomp = listaEquiposcomp.find('li:first').clone();
      equiposcomp.appendTo('#listaEquiposcomp');
    })
/**/       
  </script>
  