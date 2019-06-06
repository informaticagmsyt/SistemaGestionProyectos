<div class="panel">
  
  
  
        <div id="msj4"></div>
        
          <div class="panel-body">
  
              <h5 class="text-center">Datos de espacios y edificación
                </h5>
              <hr>
  
         
              <div class="row">
                  <div class=" col-md-3 ">
                 <label for="edificacion" class="control-label">Edificación
                          <small>(Face Constructiva)</small>
                        </label>
                    
                          <select class="custom-select form-control"
                           id="edificacion" name="edificacion" required>
                           
                            <option value="Culminada">Culminada</option>
                            <option value="Estructura">Estructura</option>
                            <option value="Cerramiento">Cerramiento</option>
                            <option value="Acabado">Acabado</option>
                          </select>
                      </div>
                <div class="col-md-3">
                  <label class="" for="areaterreno"> 
                    Area de Terreno    <small>(M2)</small> </label>
                  <input type="number"
                  
                  value="<?php if (isset( $datos->area_terreno))echo $datos->area_terreno;?>"
                   placeholder="" id="areaterreno" 
                  required
                   name="areaterreno" class="form-control" required>
                </div>
                <div class=" col-md-3">
                    <div class="form-group ">
                    <label class="" for="areaconstruccion"> Area de Construcción   
                        <small>(M2)</small></label>
                    <input type="number" placeholder=""
                    value="<?php if (isset( $datos->area_construccion))echo $datos->area_construccion;?>"
                     id="areaconstruccion"  name="areaconstruccion" class="form-control" required>
                  </div>
                </div>

                <div class="col-md-3">
                  <label class="" for="poseealmacenamiento"> 
                    Posee lugar para almacenar materia prima?   </label>
                  <select name="poseealmacenamiento" class="form-control" id="poseealmacenamiento">
                          <option value="Si">Si</option>
                          <option value="No">No</option>
                  </select>
                </div>

                <div class=" col-md-3">
                    <div class="form-group ">
                    <label class="" for="areaalmacenamiento"> Area de Almacenamiento   
                        <small>(M2)</small></label>
                    <input type="number" placeholder=""
                    value="<?php if (isset( $datos->area_almacenamiento))echo $datos->area_almacenamiento;?>"
                     id="areaalmacenamiento"  name="areaalmacenamiento" class="form-control" required>
                  </div>
                </div>

                <div class=" col-md-3 ">
                   
                  <label for="edificacion" class="" >Instalaciones Sanitarias</label>
                
                      <select class="custom-select form-control" id="instalaciones" name="instalaciones" required>
                       
                        <option value="Activas">Activas</option>
                        <option value="Inoperativas">Inoperativas</option>
                        <option value="En Construcción">En Construcción</option>
                        <option value="No posee">No posee</option>
                      </select>
                  </div>
              </div>
  
              <div class="row">
                  
      
                  <div class="col-md-12">
                      <label for="observaciones">Observaciones</label>
                    <textarea 
                      required
                    
                      class="form-control" id="observaciones" name="observaciones"><?php if (isset( $datos->observaciones))echo $datos->observaciones;?> </textarea> 
            
                    </div>
    
  
           
  
                </div>
                <h5 class="text-center">
                    Servicios Publicos
                  </h5>
                <hr>
    
             
              <div class="row">
                  <div class="col-md-4">
                          <label for="acometida">Acometida <small>Aguas Blancas</small> </label>
                          <select name="acometida" 
                          id="acometida"
                          required
                          class="form-control">
                              <option value="posee">Posee</option>
                              <option value="no posee">No Posee</option>
                              <option value="En construccion">Construccion</option>
                          </select>
                  </div>
                  <div class="col-md-4">
                        
                  
                          <label for="vialidad">Vialidad  </label>
                          <select name="vialidad" 
                          id="vialidad"
                          required
                          class="form-control">
                              <option value="Tierra">Tierra</option>
                              <option value="Granzon">Granzon</option>
                              <option value="Azfalto">Azfalto</option>
                              <option value="Cemento">Cemento</option>
                        
                          </select>
              
                  </div>
                  <div class="col-md-4">
                        
                  
                      <label for="aseourbano">Tiene Aseo Urbano 
                       
                      </label>
                      <select name="aseourbano" 
                      id="aseourbano"
                      required
                      class="form-control">
                          <option value="si">Si</option>
                          <option value="no">No</option>
                         
                    
                      </select>
          
              </div>
                
                  
  
                  </div>


                  <div class="row">
                      <div class="col-md-4">
                              <label for="servicioelectrico"> Servicio Electrico Acometida <small>acometida</small> </label>
                              <select name="servicioelectrico" 
                              id="servicioelectrico"
                              required
                              class="form-control">
                                  <option value="posee">Posee</option>
                                  <option value="no posee">No Posee</option>
                                  <option value="En construccion">Construccion</option>
                              </select>
                      </div>
                      <div class="col-md-4">
                            
                      
                              <label for="serviciogas"> 
                                  Servicio de Gas  </label>
                              <select name="serviciogas" 
                              id="serviciogas"
                              required
                              class="form-control">
                                  <option value="Directo">Directo</option>
                                  <option value="Bombona">Bombona</option>
                                  <option value="no posee">No posee</option>
                     
                            
                              </select>
                  
                      </div>
                      <div class="col-md-4">
                          <label for="acometidaservidas">Acometida <small>Aguas Servidas</small> </label>
                          <select name="acometidaservidas"  
                          id="acometidaservidas"
                          required
                          class="form-control">
                              <option value="posee">Posee</option>
                              <option value="no posee">No Posee</option>
                              <option value="En construccion">Construccion</option>
                          </select>
                  </div>
                    
                      
      
                      </div>
      </div>
  </div>
  