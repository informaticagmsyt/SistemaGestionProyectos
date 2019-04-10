<div class="wizard" id="wizard-basic">
  
  <div class="wizard-content">

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
          </div>
          <!--End Row-->

        </div>  
        <!--End panel-body-->
      </div>
      <!--End panel-->
        <div class="pull-right">
              <button class="btn btn-primary" type="submit">Guardar y continuar</button>
        </div>
    </div>
    <!--End conatainer-->
  </div>
  <!--End wizar-content-->
</div>
<!--End wizard-->

<script>
  $(function() {
    $('#wizard-basic').pxWizard();
  });
</script>