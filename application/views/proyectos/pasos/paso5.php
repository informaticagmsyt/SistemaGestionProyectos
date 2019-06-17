<div class="panel">
  
  
  
        <div id="msj5"></div>
        
          <div class="panel-body">
            <button class="btn btn-warning" id="btn-paso5-test">RegistrarTest</button>
            <hr>
                <?php
                //*
                ?>
            <div class="panel-group panel-group-success" id="acordion-materiales">
              
              <div class="panel">
                
                <div class="panel-heading">
                  <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example-success" href="#collapse-insumos">
                  Materia Prima e Insumos
                  </a>
                </div>
                
                <div id="collapse-insumos" class="panel-collapse collapse">
                  <div class="panel-body">
                    <div style="display: flex; justify-content: flex-end;">
                      <button type="button" id="addInsumo" class="btn btn-primary"><i class="fas fa-plus"></i></button>  
                    </div>
                    <ul id="listaInsumos" style="list-style: none">
                      <li>
                        <form>
                          <div class="form-group row">

                              <div class="col-sm-4">
                                <label>Concepto (Actividad / Rubro)</label>
                                <input type="text" name="conceptoInsumo" class="form-control">
                              </div>

                              <div class="col-sm-3">
                                <label>Unidad de Medida</label>
                                <input name="unidadmedida" type="text" class="form-control">
                              </div>

                              <div class="col-sm-3">
                                <label>Precio Unitario(Bs)</label>
                                <input name="precio" type="text" class="form-control">
                              </div>

                              <div class="col-sm-2">
                                <label>Cantidad</label>
                                <input name="cantidad" type="text" class="form-control">
                              </div>

                          </div>
                        </form>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- FIN MATERIA PRIMA E INSUMOS -->

              <div class="panel">
                
                <div class="panel-heading">
                  <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example-success" href="#collapse-herramientas">
                  HERRAMIENTAS Y EQUIPOS DE TRABAJO
                  </a>
                </div>
                
                <div id="collapse-herramientas" class="panel-collapse collapse">
                  <div class="panel-body">
                    <div style="display: flex; justify-content: flex-end;">
                      <button type="button" id="addEquipostrabajo" class="btn btn-primary"><i class="fas fa-plus"></i></button>  
                    </div>
                    
                    <ul id="listaEquipostrabajo" style="list-style: none">
                      <li>
                        <form>
                          <div class="form-group row">

                              <div class="col-sm-4">
                                <label>Concepto (Herramienta / Equipo)</label>
                                <input name="conceptoHerraminenta" type="text" class="form-control">
                              </div>

                              <div class="col-sm-3">
                                <label>Precio Unitario(Bs)</label>
                                <input name="precio" type="text" class="form-control">
                              </div>

                              <div class="col-sm-2">
                                <label>Cantidad</label>
                                <input name="cantidad" type="text" class="form-control">
                              </div>

                          </div>
                        </form>
                      </li>
                    </ul>

                  </div>
                </div>
              </div>
              <!-- FIN HERRAMIENTAS Y EQUIPOS DE TRABAJO -->

              <div class="panel">
                
                <div class="panel-heading">
                  <a  class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example-success" href="#collapse-maquinas">
                    MAQUINAS Y EQUIPOS TECNOLOGICOS
                  </a>
                </div>

                <div id="collapse-maquinas" class="panel-collapse collapse">
                  <div class="panel-body">
                    <div style="display: flex; justify-content: flex-end;">
                    <button type="button" id="addEquipostecno" class="btn btn-primary"><i class="fas fa-plus"></i></button>  
                    </div>        
                    <ul id="listaEquipostecno" style="list-style: none">
                      <li>
                        <form>
                          <div class="form-group row">

                              <div class="col-sm-4">
                                <label>Concepto (Maquina / Equipo)</label>
                                <input name="conceptoMaquina" type="text" class="form-control">
                              </div>

                              <div class="col-sm-3">
                                <label>Precio Unitario(Bs)</label>
                                <input name="precio" type="text" class="form-control">
                              </div>

                              <div class="col-sm-2">
                                <label>Cantidad</label>
                                <input name="cantidad" type="text" class="form-control">
                              </div>

                          </div>
                        </form>
                      </li>
                    </ul>
                  </div>
                </div>

              </div>
              <!-- FIN MAQUINAS Y EQUIPOS TECNOLOGICOS -->

              <div class="panel">
                
                <div class="panel-heading">
                  <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example-success" href="#collapse-mobiliario">
                    MOBILIARIO Y EQUIPOS COMPLEMENTARIOS
                  </a>
                </div>

                <div id="collapse-mobiliario" class="panel-collapse collapse">
                  <div class="panel-body">
                    <div style="display: flex; justify-content: flex-end;">
                    <button type="button" id="addEquiposcomp" class="btn btn-primary"><i class="fas fa-plus"></i></button>  
                    </div>

                    <ul id="listaEquiposcomp" style="list-style: none">
                      <li>
                        <form>
                          <div class="form-group row">

                              <div class="col-sm-4">
                                <label>Concepto (Mobiliario / Equipo)</label>
                                <input name="conceptoMobiliario" type="text" class="form-control">
                              </div>
                              
                              <div class="col-sm-3">
                                <label>Precio Unitario(Bs)</label>
                                <input name="precio" type="text" class="form-control">
                              </div>

                              <div class="col-sm-2">
                                <label>Cantidad</label>
                                <input name="cantidad" type="text" class="form-control">
                              </div>

                          </div>
                        </form>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>          

            </div>
            <?php /**/ ?>

                <?php 
                /*
                ?>
              <!-- INICIO MOBILIARIO Y EQUIPOS COMPLEMENTARIOS -->
              <h5 class="text-center">Mobiliario y Equipos Complementarios</h5>
                <div style="display: flex; justify-content: flex-end;">
                <button type="button" id="addEquiposcomp" class="btn btn-primary"><i class="fas fa-plus"></i></button>  
                </div>
              <hr>
  
              <ul id="listaEquiposcomp" style="list-style: none">
                <li>
                  <form>
                    <div class="form-group row">

                        <div class="col-sm-4">
                          <label>Concepto (Mobiliario / Equipo)</label>
                          <input name="conceptoMobiliario" type="text" class="form-control">
                        </div>
                        
                        <div class="col-sm-3">
                          <label>Precio Unitario(Bs)</label>
                          <input name="precio" type="text" class="form-control">
                        </div>

                        <div class="col-sm-2">
                          <label>Cantidad</label>
                          <input name="cantidad" type="text" class="form-control">
                        </div>

                    </div>
                  </form>
                </li>
              </ul>

          
          <?php  /**/
          ?>
          </div>
          
</div>
  <script src="<?php echo base_url()?>/public/js/registrarrFormLista.js"></script>

<script>
//*MATERIA PRIMA E INSUMOS    
    //DANDO EVENTO AL BOTON PARA AGREGAR OTRA FILA
    $('#addInsumo').click(function(){
        //OBTENIENDO LA LISTA DE INSUMOS
        var listaInsumos = $('#listaInsumos');
        //OBTENER LA PRIMERA FILA BUSCANDOLA EN LA LISTA DE INSUMOS
        var insumo = listaInsumos.find('li:first').clone();
        //OBTENER FORMULARIO DENTRO DE LA LISTA
        var form = insumo.find('form');
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
      var form = equipostrabajo.find('form');
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
      form[0].reset();
      equiposcomp.appendTo('#listaEquiposcomp');
    })
/**/     

$('#btn-paso5-test').click(function(){
  //BOTON PROVISIONAL MIENTRAS SE ARMA TODA LA ESTRUCTURA
  registrarForms('#listaInsumos');
  registrarForms('#listaEquipostrabajo');
  registrarForms('#listaEquipostecno');
  registrarForms('#listaEquiposcomp');
  
})

/**/       
</script>
  