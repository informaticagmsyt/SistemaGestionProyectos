<div class="panel">
  
  <div id="msj"></div>
      
    <div class="panel-body">
      
      <div class="row ">

        <div class=" col-sm-2 ">

          <label for="grid-input-5" class="col-md-3 control-label">Nacionalidad</label>    
            <select class="custom-select form-control" id="nacionaliidad" name="nacionaliidad">
              <option>V</option>
              <option>E</option>
            </select>
            <!--END CUSTOM-SELECT-->
        </div>
        <!--END COL-SM-2-->

        <div class="col-sm-4">
                
          <label class="" for="grid-input-11">Cedula</label>
            <input type="number" placeholder="Cedula" id="cedula"  name="cedula" class="form-control" required>
        </div>
        <!--END COL-SM-4-->

        <div class=" col-sm-4">
          <label class="" for="grid-input-11"></label>
          <br>
          <button type="button" class="btn btn-primary" onclick="consultarPersona()">Consultar</button>
        </div>
        <!--END COL-SM-4-->
      </div>
      <!--END ROW-->

      <div id="identificacion">
        <h4 class="text-center">Identificación </h4>
        <hr>
      <div class="row">
        
        <div class="col-md-3">
                  
          <div class="form-group">
            <label>Nombres</label>
            <input type="text" placeholder="Nombres" id="nombres" name="nombres" class="form-control" required data-msg-required= "Ingrese un nombre">
          </div>
          <!--END FORM-GROUP-->
        </div>
        <!--END COL-MD-3-->

        <div class="col-md-3">
                  
          <div class="form-group">
            <label>Apellidos</label>
            <input type="text" placeholder="apellidos" id="apellidos"  name="apellidos" data-msg-required= "Ingrese un Apellido" class="form-control" required>
          </div>
          <!--END FORM-GROUP-->
        </div>
        <!--END COL-MD-3-->

        <div class="col-md-2">

          <div class="form-group">
              <label for="" class=" control-label">Sexo</label>
                <select class="custom-select form-control" id="sexo" name="sexo">
                  <option value="M">Masculino</option>
                  <option value="F">Femenino</option>
                </select>
                <!--END SELECT-->
          </div>
          <!--END FORM-GROUP-->
        </div>
        <!--END COL-MD-2-->

        <div class="col-md-4">

          <div class="form-group">
            <label> Fecha de Nacimiento</label>
              <div class="input-group date form_date col-md-8" data-date="" data-date-format="dd-mm-yyyy" data-link-field="dtp_input2" data-link-format=" yyyy-mm-dd">
                <input class="form-control" size="5" type="text" id="fechanac" name="fecha_nac" value="" >
                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span><i class="far fa-trash-alt"></i></span>
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span><i class="far fa-calendar-alt"></i></span>
              </div>
              <!--END INPUT-GROUP-->
          </div>
          <!--END FORM-GROUP-->
        </div>
        <!--END COL-MD-4-->
      </div>
      <!--END ROW-->

      <div class="row">
        
        <div class="col-md-3">
          
          <div class="form-group ">
            <label>Telefono</label>
            <input type="number" placeholder="telefono" id="telefono" data-msg-required= "Ingrese un numero de teléfono" name="telefono" class="form-control" required>
          </div>
          <!--END FORM-GROUP-->
        </div>
        <!--END COL-MD-3-->
      
        <div class="col-md-3">
                       
          <div class="form-group ">
            <label>Telefono 2</label>
            <input type="number" placeholder="telefono 2" id="telefono2"  name="telefono2" class="form-control" >
          </div>
          <!--END FORM-GROUP-->
        </div>
        <!--END COL-MD-3-->
        
        <div class="col-md-5">
          <div class="form-group ">
            <label>Email</label>
            <input type="email" data-msg-required="Ingrese un email" placeholder="email@test.com" id="email"  name="email" class="form-control" required>
          </div>
          <!--END FORM-GROUP-->
        </div>
        <!--END COL-MD-5-->
      </div>
      <!--END ROW-->
      
      <hr>
      
      <div class="row">

        <div class="col-md-3">
                      
          <div class="form-group ">
            <label>Profesión / Oficio</label>
            <input type="text" placeholder="profesión" id="profesion" name="profesion" class="form-control typeahead" required>
          </div>
          <!--END FORM-GROUP-->
        </div>
        <!--END COL-MD-3-->

        <div class="col-md-3">
                  
          <div class="form-group">
            <label>Posee Carnet de la patria</label>
              <select class="custom-select form-control" id="posee_carnet" name="posee_carnet">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
              </select>
              <!--END SELECT-->
          </div>
          <!--END FORM-GROUP-->
        </div>
        <!--END COL-MD-3-->
        
        <div class="col-md-3">
          
          <div class="form-group ">
            <label>Código Carnet de la Patria</label>
              <input type="text" placeholder="" id="v_carnet"  name="v_carnet" class="form-control">
          </div>
          <!--END FORM-GROUP-->
        </div>
        <!--END COL-MD-3-->

        <div class="col-md-3">
                        
          <div class="form-group">
            <label>Movimiento Social al que pertenece</label>
              <select class="custom-select form-control" id="v_social" name="v_social">
                <option value="clap">Estructura Clap</option>
                <option value="consejo comunal">Consejo Comunal</option>
                <option value="jefe de calle">Jefe de Calle</option>
                <option value="ffm">FFM</option>
                <option value="otro">Otros</option>
              </select>
              <!--END SELECT-->
          </div>
          <!--END FORM-GROUP-->
        </div>
        <!--END COL-MD-3-->
      </div>
      <!--END ROW-->

      <h4 class="text-center">Ubicación </h4>
      
      <hr>

      <div class="row">
        
        <div class="col-md-4">
          
          <div class="form-group">
            <label>Estado</label>
              <select class="custom-select form-control" id="estado_id" name="estado_id">
                <option value="">Seleccione un estado</option>
              </select>
              <!--END SELECT-->
          </div>
          <!--END FORM-GROUP-->
        </div>
        <!--END COL-MD-4-->
        
        <div class="col-md-4">
          
          <div class="form-group">
            <label>Municipo</label>
              <select class="custom-select form-control" id="municipio_id" name="municipio_id" data-msg-required="Seleccione un Municipio">
                <option value="">Seleccione un Municipio</option>
              </select>
              <!--END SELECT-->
          </div>
          <!--END FORM-GROUP-->
        </div>
        <!--END COL-MD-4-->
        
        <div class="col-md-4">
          
          <div class="form-group">
            <label>Parroquia</label>
              <select class="custom-select form-control" id="parroquia_id" name="parroquia_id">
                <option value="">Seleccione una parroquia</option>
              </select>
              <!--END SELECT-->
          </div>
          <!--END FORM-GROUP-->
        </div>
        <!--END COL-MD-4-->
      </div>
      <!--END ROW-->

      <div class="row">
                  
        <div class="col-md-12">
          
          <div class="form-group ">
            <label>Dirección de Habitación</label>
              <textarea id="direccion" value="" data-msg-required="Ingrese una direccion" name="direccion" class="form-control" required> </textarea> 
          </div>
          <!--END FORM-GROUP-->
        </div>
        <!--END COL-MD-12-->
      </div>
      <!--END ROW-->
    </div>
    <!--END PANEL-BODY-->
</div>
<!--END PANEL-->