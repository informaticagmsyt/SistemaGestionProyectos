      
        
    <div class="panel">
      <form  method="post" id="formpaso3">


      <div id="msj3"></div>
      
        <div class="panel-body">

            <h5 class="text-center">Datos de la Unidad de Producción
              </h5>
            <hr>

       
            <div class="row">
                <div class=" col-sm-1 ">
    
                    <label for="rif" class="col-md-3 control-label">Rif</label>
                  
                    <select class="custom-select form-control" id="rif" name="rif" required>
                     
                      <option value="J">J</option>
                      <option value="C">C</option>
                      <option value="V">V</option>
                      <option value="G">G</option>
                    </select>
                    </div>

                    <div class=" col-sm-4 ">
                      <div class="form-group ">
    <label for="rif" class=" control-label"> Numero Rif</label>
  
    <input class="custom-select form-control" id="numerorif" name="numerorif" required value="<?php if (isset( $datos->nombre_empresa))echo $datos->numero_rif;?>">
    
  </div>
    </div>
  
              <div class=" col-sm-4">
                  <div class="form-group ">
                  <label class="" for="nombrerazonsocial">Nombre o Razon Social</label>
                  <input type="text" placeholder=""
                  
                   id="nombrerazonsocial" 
                   value="<?php if (isset( $datos->nombre_empresa))echo $datos->nombre_empresa;?>"
                    name="nombrerazonsocial" class="form-control" required>
                </div>
              </div>
            </div>

            <div class="row">
                
    
                <div class="col-md-4">
                
                     
                  <div class="form-group">
                    <label>Estado </label>
                
                      <select class="custom-select form-control" id="estado" 
                      required
                      name="estado">
                        <option value=""
                        >Seleccione un estado</option>
                      </select>
                    
            </div>
                  </div>
  

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Municipo </label>
                  
                        <select 
                        
                        class="custom-select form-control" id="municipio" name="municipio"
                        required
                        data-msg-required= "Seleccione un Municipio"
                        >
                          <option value="">Seleccione un Municipio</option>
                        </select>
                      
              </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Parroquia </label>
                    
                          <select class="custom-select form-control" id="parroquia"
                          required
                          name="parroquia">
                            <option value="">Seleccione una parroquia</option>
                          </select>
                        
                </div>
                    </div>
              </div>

           
            <div class="row">
                <div class="col-md-3">
                        <label for="registrada">¿Esta Registrarda? <small>(La Empresa)</small> </label>
                        <select name="registrada" 
                        required
                        class="form-control">
                            <option value="true">Si</option>
                            <option value="false">No</option>
                        </select>
                </div>
                <div class="col-md-3">
                        <label for="codigo_situr">Codigo Situr</label>
                        <input type="text" 
                        value="<?php if (isset( $datos->codigo_situr))echo $datos->codigo_situr;?>"
                        required
                        class="form-control" id="codigo_situr" name="codigo_situr">
                </div>
                <div class="col-md-3">
                        <label for="codigo_sunagro">Codigo Sunagro</label>
                        <input type="text"
                        required
                        value="<?php if (isset( $datos->codigo_sunagro))echo $datos->codigo_sunagro;?>"
                         class="form-control" id="codigo_sunagro" name="codigo_sunagro" placeholder="00000000">
                </div>


                <div class="col-md-3">
                        <label for="inst_responsable">Institucion Responsable  </label>
                        <select name="inst_responsable" 
                        id="inst_responsable"
                        required
                        class="form-control">
                        
                        </select>
                </div>
             
                

                </div>
    </div>
</div>
