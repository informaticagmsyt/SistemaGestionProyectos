<div class="wizard" id="wizard-basic">
  <!--div class="wizard-wrapper">
    <ul class="wizard-steps">
      <li data-target="#wizard-example-step1">
        <span class="wizard-step-number">1</span>
        <span class="wizard-step-complete"><i class="fa fa-check text-success"></i></span>
        <span class="wizard-step-caption">
          Requerimiento
          <span class="wizard-step-description">Registrar un requerimiento para un proyecto</span>
        </span>
      </li>
      <li data-target="#wizard-example-step2">
        <span class="wizard-step-number">2</span>
        <span class="wizard-step-complete"><i class="fa fa-check text-success"></i></span>
        <span class="wizard-step-caption">
          Tipo de asesoria
          <span class="wizard-step-description">Ingrese el tipo de requerimiento</span>
        </span>
      </li>
      <li data-target="#wizard-example-step3">
        <span class="wizard-step-number">3</span>
        <span class="wizard-step-complete"><i class="fa fa-check text-success"></i></span>
        <span class="wizard-step-caption">
          Step 3
          <span class="wizard-step-description">Third step description. Lorem ipsum dolor sit amet</span>
        </span>
      </li>
      <li data-target="#wizard-example-step4">
        <span class="wizard-step-number">4</span>
        <span class="wizard-step-complete"><i class="fa fa-check text-success"></i></span>
        <span class="wizard-step-caption">
          Finish
        </span>
      </li>
    </ul>
  </div-->
  <div class="wizard-content">
    <div class="container">
      <h4 class="text-center">Ingrese su requerimiento</h4>
      <hr>
        
        <div class="row">
                
                <div class="col-sm-1">
                    <div class="form-group">
                        <label for="nombres">Descripcion</label>
                        <input class="form-control" type="text" name="descripcion" id="descripcion" placeholder="Descripcion" required data-msg-required="Ingrese la descripcion del requerimiento">
                    </div>
                    <!---End Form-Group-->
                </div>
                <!--End Col-->

                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="categoria">Categoria</label> <!--ESTO DEBE TRAER LOS DATOS DE LA TABLA CATEGORIAS-->
                        <select class="custom-select form-control" name="categoria" id="categoria">
                          <option value="AL">Asesoria legal</option>
                          <option value="AF">Asesoria financiera</option>
                    </div>
                    <!---End Form-Group-->
                </div>
                <!--End Col-->

                <div class="col-sm-3">
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

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="fechanac">Fecha de nacimiento</label>
                        <div class="input-group date form_date col-md-8" data-date="" data-date-format="dd-mm-yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                            <input class="form-control" size="5" id="fechanac" name="fecha_nac" value="" type="date" >
                            <!--<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span><i class="far fa-trash-alt"></i></span>-->
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span><i class="far fa-calendar-alt"></i></span>
                        </div>
                    </div>
                    <!---End Form-Group-->
                </div>
                <!---End Col-->

            </div>
            <!--End Row-->
      
        <button type="button" class="btn" data-wizard-action="prev">Prev</button>
        <button type="button" class="btn btn-primary" data-wizard-action="finish">Finish</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(function() {
    $('#wizard-basic').pxWizard();
  });
</script>