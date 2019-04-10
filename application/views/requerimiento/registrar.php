<div class="container">

      <div class="panel">

        <div class="panel-body">

          <h4 class="text-center">Ingrese su requerimiento</h4>
          <hr>
        
          <div class="row">
                
                  <div class="col-sm-12">
                      <div class="form-group">
                          <label for="nombres">Descripcion</label>
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

                  <div class="col-sm-3">
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
<!--End container-->


<script>
  $(function() {
    $('#wizard-basic').pxWizard();
  });
</script>