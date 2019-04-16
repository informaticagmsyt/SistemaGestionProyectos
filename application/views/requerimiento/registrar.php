<div class="container"> 

      <div class="panel">

        <div class="panel-body">

          <div class="row"> 

            <div class="col-md-11"> 
              <div class="wizard" id="wizard-basic">
                <div class="wizard-wrapper">
                  <ul class="wizard-steps">
                    <li data-target="#wizard-example-step1" class="wizard1 wizard" >
                      <span class="wizard-step-number">1</span>
                        <span class="wizard-step-complete"><i class="fa fa-check text-success"></i></span>
                        <span class="wizard-step-caption">
                          Paso 1
                        <span class="wizard-step-description">Identificación del Productor</span>
                      </span>
                      <!--End wizard-step-number-->
                    </li>
                    <!--End li-->

                    <li data-target="#wizard-example-step2" class="wizard2 wizard">
                      <span class="wizard-step-number">2</span>
                        <span class="wizard-step-complete"><i class="fa fa-check text-success"></i></span>
                        <span class="wizard-step-caption">
                          Paso 2
                        <span class="wizard-step-description">Datos del Requerimiento</span>
                      </span>
                      <!--End wizard-step-number-->
                    </li>
                    <!--End li-->
                  </ul>
                  <!--End ul-->
                </div>
                <!--End wizard-wrapper-->
              </div>
              <!--End wizard-->
            </div>
            <!--End col-->

          </div>
          <!--End row-->          
            
          <div class="wizard-content">
            <div class="wizard-pane" id="wizard-example-step1">
  
              <form  method="POST" role="form" id="formpaso1">

                <?php include'pasos/paso1.php'; ?>
    

                  <div class="pull-right">
                    <button type="submit" class="btn btn-primary  pull-right" id="btnpaso1" >Guardar y continuar</button>
                  </div>
              </form>
            </div>
            <!--End wizard-pane-->
 
            <div class="wizard-pane" id="wizard-example-step2">

              <form  method="post" id="formpaso2">
                
                <?php include'pasos/paso2.php'; ?>
                  <button type="button" class="btn btn-primary"
                    style="visibility:hidden"
                    data-wizard-action="next" id="paso2">Guardar y Continuar</button>

                    <div class="pull-right">
                      <button type="button" class="btn"  onclick="regresar(1)">Regresar</button>
                      <button type="submit" class="btn btn-primary" id="btnpaso2" >Guardar y Continuar</button>
                    </div>

              </form>
            </div>
            <!--End wizard-pane-->
          </div>
          <!--End wizard-content-->

          <div id="modal-success" class="modal fade modal-alert modal-success">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header"><i class="fa fa-check-circle"></i></div>
                  <div class="modal-title">Proyecto registrado exitosamente</div>
                    <div class="modal-body">
                      <h5>Numero de Caso: 
                        <br>
                        <strong id="codcaso"> </strong>
                      </h5>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-success"onclick="location.reload()" >OK</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>      

          <h4 class="text-center">Ingrese su requerimiento</h4>
          <hr>
        
          <div class="row">
                
                  <div class="col-sm-12">
                      <div class="form-group">
                          <label for="descripcion">Descripcion</label>
                          <textarea class="form-control" type="text" name="descripcion" id="descripcion" placeholder="Ingrese la descripcion del requerimiento" required data-msg-required="Ingrese la descripcion del requerimiento"></textarea>
                      </div>
                      <!---End Form-Group-->
                  </div>
                  <!--End Col-->
          </div>
          <!--End Row-->
        
          <div class="row">

                  <div class="col-sm-2">
                      <div class="form-group">
                          <label for="categoria">Categoria</label> <!--ESTO DEBE TRAER LOS DATOS DE LA TABLA CATEGORIAS-->
                          <select class="custom-select form-control" name="categoria" id="categoria">
                            <option value="AL">Asesoria legal</option>
                            <option value="AF">Asesoria financiera</option>
                          </select>  
                      </div>
                      <!---End Form-Group-->
                  </div>
                  <!--End Col-->

                  <div class="col-sm-2">
                      <div class="form-group">
                          <label for="subcategoria">Sub-categoria</label> <!--ESTO DEBE TRAER LOS DATOS DE LA TABLA SUB-CATEGORIAS-->
                          <select class="custom-select form-control" name="subcategoria" id="subcategoria">
                              <option value="J">Juridica</option>
                              <option value="C">Civil</option>
                          </select>
                      </div>
                      <!---End Form-Group-->
                  </div>
                  <!--End Col-->

                  <div class="col-sm-2">
                      <div class="form-group">
                          <label for="accion">Accion</label> <!--ESTO DEBE TRAER LOS DATOS DE LA TABLA ACCIONES-->
                          <select class="custom-select form-control" name="accion" id="accion">
                            <option value="recibido">Recibido</option>
                            <option value="remitido">Remitido</option>
                          </select>  
                      </div>
                      <!---End Form-Group-->
                  </div>
                  <!--End Col-->

          </div>
          <!--End Row-->

          <h4 class="text-center">Ubicacion del Requerimiento</h4>
          <hr>

          <div class="row">

                  <div class="col-sm-2">
                      <div class="form-group">
                          <label for="estado">Estado</label> <!--ESTO DEBE TRAER LOS DATOS DE LA TABLA ESTADOS-->
                          <select class="custom-select form-control" name="estado" id="estado">
                            <option value="distrito">Distrito Capital</option>
                            <option value="miranda">Miranda</option>
                          </select>  
                      </div>
                      <!---End Form-Group-->
                  </div>
                  <!--End Col-->

                  <div class="col-sm-2">
                      <div class="form-group">
                          <label for="municipio">Municipio</label> <!--ESTO DEBE TRAER LOS DATOS DE LA TABLA MUNICIPIOS-->
                          <select class="custom-select form-control" name="municipio" id="municipio">
                              <option value="libertador">Libertador</option>
                              <option value="guicaipuro">Guaicaipuro</option>
                          </select>
                      </div>
                      <!---End Form-Group-->
                  </div>
                  <!--End Col-->

                  <div class="col-sm-2">
                      <div class="form-group">
                          <label for="parroquia">Parroquia</label> <!--ESTO DEBE TRAER LOS DATOS DE LA TABLA PARROQUIAS-->
                          <select class="custom-select form-control" name="parroquia" id="parroquia">
                              <option value="san jose">San Jose</option>
                              <option value="boleita">Boleita</option>
                          </select>
                      </div>
                      <!---End Form-Group-->
                  </div>
                  <!--End Col-->

                  <div class="col-sm-2">
                      <div class="form-group">
                          <label for="ciudad">Ciudad</label>
                          <input type="text" placeholder="Ingrese una ciudad" id="ciudad" name="ciudad" class="form-control" required data-msg-required="Ingrese una ciudad">
                      </div>
                      <!---End Form-Group-->    
                  </div>
                  <!--End Col-->

                  <div class="col-sm-12">
                      <div class="form-group">
                          <label for="direccion">Direccion</label>
                          <textarea class="form-control" type="text" name="direccion" id="direccion" placeholder="Ingrese la direccion de su ubicacion" required data-msg-required="Ingrese la direccion de su ubicacion"></textarea>
                      </div>
                      <!---End Form-Group-->
                  </div>
                  <!--End Col-->

          </div>
          <!--End Row-->

          <h4 class="text-center">Responsable del Requerimiento</h4>
          <hr>

          <div class="row">

                  <div class="col-sm-2">
                      <div class="form-group">
                          <label for="tutor">Tutor</label> <!--ESTO DEBE TRAER LOS DATOS DE LA TABLA PERSONA>PERSONA_PERFIL>PERFILES-->
                          <input type="text" placeholder="Ingrese un tutor" id="tutor" name="tutor" class="form-control" required data-msg-required="Ingrese un tutor">
                      </div>
                      <!---End Form-Group-->    
                  </div>
                  <!--End Col-->

                  <div class="col-sm-4">
                      <div class="form-group">
                          <label for="ente">Ente</label> <!--ESTO DEBE TRAER LOS DATOS DE LA TABLA ENTES-->
                          <select class="custom-select form-control" name="ente" id="ente">
                              <option value="mincomuna">Ministerio del poder popular para las comunas y los movimientos sociales</option>
                              <option value="ffm">Frente Francisco de Miranda</option>
                          </select>
                      </div>
                      <!---End Form-Group-->
                  </div>
                  <!--End Col-->

                  <div class="col-sm-2">
                      <div class="form-group">
                          <label for="estatus">Estatus</label> <!--ESTO DEBE TRAER LOS DATOS DE LA TABLA ESTATUS-->
                          <select class="custom-select form-control" name="estatus" id="estatus">
                            <option value="recibido">Recibido</option>
                            <option value="remitido">Remitido</option>
                          </select>  
                      </div>
                      <!---End Form-Group-->
                  </div>
                  <!--End Col-->
          </div>
          <!--End Row-->

        </div>  
        <!--End panel-body-->
      </div>
      <!--End panel-->
        <div class="pull-right">
              <button class="btn btn-primary" type="submit">Guardar y continuar</button>
        </div>
        <!--End pull-right-->
  </div>
  <!--End Row-->      
</div>
<!--End container-->


<script>
  $(function() {
    $('#wizard-basic').pxWizard();
  });
</script>