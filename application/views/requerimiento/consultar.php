<div class="container"> 
  
  <div class="row"> 

    <div class="col-md-11"> 
      
      <div class="panel">
  
        <div id="msj"></div>
      
          <div class="panel-body">

            <div id="identificacion">
              <h4 class="text-center">Consultar por Cedula</h4>
              <hr>
      
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

              <div id="codigocaso">
              <h4 class="text-center">Consultar por Codigo de Caso</h4>
              <hr>
      
              <div class="row ">

                <div class="col-sm-4">
                
                  <label class="" for="grid-input-11">Codigo de Caso</label>
                    <input type="number" placeholder="Codigo" id="codcaso"  name="codigocaso" class="form-control" required>
                </div>
                <!--END COL-SM-4-->

                <div class=" col-sm-4">
                  <label class="" for="grid-input-11"></label>
                  <br>
                  <button type="button" class="btn btn-primary" onclick="getEstatusProyecto()">Consultar</button>
                </div>
                <!--END COL-SM-4-->
              </div>
              <!--END ROW-->