<div class="panel">
  
  
  
        <div id="msj5"></div>
        
          <div class="panel-body">
            <!--<button class="btn btn-warning" id="btn-paso5-test">RegistrarTest</button>
            <hr>-->

            <div class="panel-group panel-group-success" id="acordion-materiales">
              
              <div class="panel">
                
                <div class="panel-heading">
                  <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example-success" href="#collapse-insumos">
                  MATERIA PRIMA E INSUMOS
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

                              <?php
                                   $totalMateriaP=0;                         
                                if($complementos['result'])
                                
                                foreach ($complementos['data'] as $key => $value) {



                                  if($value->id_tipo_complemento==1) {

                                    $totalMateriaP+=$value->precio* $value->cantidad;

                                  ?> 

                              <div class="col-sm-3">
                                <label>Concepto (Actividad / Rubro)</label>
                                <input type="text" name="conceptoInsumo" class="form-control" required value="<?php      echo $value->concepto;?>">
                              </div>

                              <div class="col-sm-3">
                                <label>Unidad de Medida</label>
                                <input type="text" name="conceptoInsumo" class="form-control" required value="<?php      echo $value->unidadMedida;?>">
                              </div>

                              <div class="col-sm-3">
                                <label>Precio Unitario(Bs)</label>
                                <input name="precioinsumos" type="text" class="form-control" required value="<?php      echo $value->precio;?>">
                              </div>

                              <div class="col-sm-2">
                                <label>Cantidad</label>
                                <input name="cantidad" type="text" class="form-control" required  value="<?php      echo $value->cantidad;?>" >
                              </div>
                              <div class="col-sm-1">
                                <label for=""></label>
                                <br>
                                <button 
                                  type="button" 
                                  class="btn btn-danger" 
                                  name="btn-rmv-fila" 
                                  onclick="eleminarForm('#listaInsumos',$(this).parent().parent().parent().parent())"
                                  > <i class="fa fa-minus"></i> </button>
                              </div>


                          

                               <?php  }} 
                               
                              ?> 

                              <div class="col-sm-3">
                                <label>Concepto (Actividad / Rubro)</label>
                                <input type="text" name="conceptoInsumo" class="form-control" required>
                              </div>

                              <div class="col-sm-3">
                                <label>Unidad de Medida</label>
                                <select id="unidadmedida" name="unidadmedida" class="form-control" required>
                                  <option value="lts">Litros</option>
                                  <option value="Kg">Kilos</option>
                                  <option value="sacos">Saco</option>
                                  <option value="bulto">Bulto</option>
                                  <option value="Caja">Cajas</option>
                                </select>
                              </div>

                              <div class="col-sm-3">
                                <label>Precio Unitario(Bs)</label>
                                <input name="precioinsumos" type="text" class="form-control" required>
                              </div>

                              <div class="col-sm-2">
                                <label>Cantidad</label>
                                <input name="cantidad" type="text" class="form-control" required>
                              </div>
                              <div class="col-sm-1">
                                <label for=""></label>
                                <br>
                                <button 
                                  type="button" 
                                  class="btn btn-danger" 
                                  name="btn-rmv-fila" 
                                  onclick="eleminarForm('#listaInsumos',$(this).parent().parent().parent().parent())"
                                  > <i class="fa fa-minus"></i> </button>
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

                          <?php
                                    $totalHerramientas=0;                         
                                if($complementos['result'])
                                
                                foreach ($complementos['data'] as $key => $value) {
                                  if($value->id_tipo_complemento==2) {
                                    $totalHerramientas+=$value->precio* $value->cantidad;
                                  ?>
                                  <div class="col-sm-4">
                                <label>Concepto (Herramienta / Equipo)</label>
                                <input name="conceptoHerramienta" type="text" class="form-control" required value="<?php      echo $value->concepto;?>">
                              </div>

                              <div class="col-sm-3">
                                <label>Precio Unitario(Bs)</label>
                                <input name="precioherramientas" type="text" class="form-control" required value="<?php      echo $value->precio;?>">
                              </div>

                              <div class="col-sm-2">
                                <label>Cantidad</label>
                                <input name="cantidad" type="text" class="form-control" required value="<?php      echo $value->cantidad;?>">
                              </div>
                              <div class="col-sm-1">
                                <label for=""></label>
                                <br>
                                <button 
                                  type="button" 
                                  class="btn btn-danger" 
                                  name="btn-rmv-fila" 
                                  onclick="eleminarForm('#listaEquipostrabajo',$(this).parent().parent().parent().parent())"
                                  > <i class="fa fa-minus"></i> </button>
                              </div>
                            <?php  }}  ?>
                              <div class="col-sm-4">
                                <label>Concepto (Herramienta / Equipo)</label>
                                <input name="conceptoHerramienta" type="text" class="form-control" required>
                              </div>

                              <div class="col-sm-3">
                                <label>Precio Unitario(Bs)</label>
                                <input name="precioherramientas" type="text" class="form-control" required>
                              </div>

                              <div class="col-sm-2">
                                <label>Cantidad</label>
                                <input name="cantidad" type="text" class="form-control" required>
                              </div>
                              <div class="col-sm-1">
                                <label for=""></label>
                                <br>
                                <button 
                                  type="button" 
                                  class="btn btn-danger" 
                                  name="btn-rmv-fila" 
                                  onclick="eleminarForm('#listaEquipostrabajo',$(this).parent().parent().parent().parent())"
                                  > <i class="fa fa-minus"></i> </button>
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
                          <?php
                                                   $totalMaquinarias=0;                          
                            if($complementos['result'])
                                                           
                            foreach ($complementos['data'] as $key => $value) {
                              if($value->id_tipo_complemento==3) {

                                $totalMaquinarias+=$value->precio* $value->cantidad;
                                                              ?>
                                                              <div class="col-sm-4">
                                <label>Concepto (Maquina / Equipo)</label>
                                <input name="conceptoMaquina" type="text" class="form-control" required value="<?php      echo $value->concepto;?>">
                              </div>

                              <div class="col-sm-3">
                                <label>Precio Unitario(Bs)</label>
                                <input name="preciomaquinas" type="text" class="form-control" required value="<?php      echo $value->precio;?>">
                              </div>

                              <div class="col-sm-2">
                                <label>Cantidad</label>
                                <input name="cantidad" type="text" class="form-control" required value="<?php      echo $value->cantidad;?>">
                              </div>
                              <div class="col-sm-1">
                                <label for=""></label>
                                <br>
                                <button 
                                  type="button" 
                                  class="btn btn-danger" 
                                  name="btn-rmv-fila" 
                                  onclick="eleminarForm('#listaEquipostecno',$(this).parent().parent().parent().parent())"
                                  > <i class="fa fa-minus"></i> </button>
                              </div>
                            <?php  }}  ?>
                              <div class="col-sm-4">
                                <label>Concepto (Maquina / Equipo)</label>
                                <input name="conceptoMaquina" type="text" class="form-control" required>
                              </div>

                              <div class="col-sm-3">
                                <label>Precio Unitario(Bs)</label>
                                <input name="preciomaquinas" type="text" class="form-control" required>
                              </div>

                              <div class="col-sm-2">
                                <label>Cantidad</label>
                                <input name="cantidad" type="text" class="form-control" required>
                              </div>
                              <div class="col-sm-1">
                                <label for=""></label>
                                <br>
                                <button 
                                  type="button" 
                                  class="btn btn-danger" 
                                  name="btn-rmv-fila" 
                                  onclick="eleminarForm('#listaEquipostecno',$(this).parent().parent().parent().parent())"
                                  > <i class="fa fa-minus"></i> </button>
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
                          <?php
                               $totalMobiliario=0;                              
                            if($complementos['result'])
                                                            
                            foreach ($complementos['data'] as $key => $value) {
                              if($value->id_tipo_complemento==4) {
                                $totalMobiliario+=$value->precio* $value->cantidad;
                                ?>
                                 <div class="col-sm-4">
                                <label>Concepto (Mobiliario / Equipo)</label>
                                <input name="conceptoMobiliario" type="text" class="form-control" required value="<?php      echo $value->concepto;?>">
                              </div>
                              
                              <div class="col-sm-3">
                                <label>Precio Unitario(Bs)</label>
                                <input name="preciomobiliarios" type="text" class="form-control" required value="<?php      echo $value->precio;?>">
                              </div>

                              <div class="col-sm-2">
                                <label>Cantidad</label>
                                <input name="cantidad" type="text" class="form-control" required value="<?php      echo $value->cantidad;?>">
                              </div>
                              <div class="col-sm-1">
                                <label for=""></label>
                                <br>
                                <button 
                                  type="button" 
                                  class="btn btn-danger" 
                                  name="btn-rmv-fila" 
                                  onclick="eleminarForm('#listaEquiposcomp',$(this).parent().parent().parent().parent())"
                                  > <i class="fa fa-minus"></i> </button>
                              </div>
                                                        <?php  }}  ?>
                              <div class="col-sm-4">
                                <label>Concepto (Mobiliario / Equipo)</label>
                                <input name="conceptoMobiliario" type="text" class="form-control" required>
                              </div>
                              
                              <div class="col-sm-3">
                                <label>Precio Unitario(Bs)</label>
                                <input name="preciomobiliarios" type="text" class="form-control" required>
                              </div>

                              <div class="col-sm-2">
                                <label>Cantidad</label>
                                <input name="cantidad" type="text" class="form-control" required>
                              </div>
                              <div class="col-sm-1">
                                <label for=""></label>
                                <br>
                                <button 
                                  type="button" 
                                  class="btn btn-danger" 
                                  name="btn-rmv-fila" 
                                  onclick="eleminarForm('#listaEquiposcomp',$(this).parent().parent().parent().parent())"
                                  > <i class="fa fa-minus"></i> </button>
                              </div>
                          </div>
                        </form>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>          
            </div>
          </div>
          
</div>
  <script src="<?php echo base_url()?>/public/js/complementos.js"></script>

<script>
</script>
  