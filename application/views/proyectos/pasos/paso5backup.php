<div class="panel">
  
  
  
        <div id="msj5"></div>
        
          <div class="panel-body">
  
              <h5 class="text-center">Datos de Produccion y Operatividad

                </h5>
              <hr>
  
         
              <div class="row">
                <div class="col-md-3">
                  <label class="" for="capacidadinstalada"> 
                    Capacidad de Produccion Instalada    </label>
                  <input type="number" placeholder="" id="capacidadinstalada" 
                  value="<?php if (isset( $datos->capacidad_instalada))echo $datos->capacidad_instalada;?>"

                  required
                   name="capacidadinstalada" class="form-control" required>
                </div>

                <div class="col-md-3">
                  <label class="" for="produccionactual"> 
                    Capacidad de Produccion Actual   </label>
                  <input type="number" placeholder="" 
                  
                  value="<?php if (isset( $datos->cap_produccion_actual))echo $datos->cap_produccion_actual;?>"

                  id="produccionactual" 
                  required
                   name="produccionactual" class="form-control" required>
                </div>

                <div class="col-md-3">
                  <label for="unidadmedida">Unidad<small>  ( metrica )</small></label>
                      <select name="unidadmedida" class="form-control" id="unidadmedida">
                          <option value="lts">Litros</option>
                          <option value="Kg">Kilos</option>
                          <option value="m2">Metros cuadrados</option>
                          <option value="m3">Metros cubicos</option>
                           <option value="piezas">Piezas</option>
                          <option value="pares">Pares</option>
                      </select>
                </div>

                <div class="col-md-3">
                  <label class="" for="productoterminado"> 
                    Producto Terminado </label>
                  <input type="text" placeholder="ingrese el tipo de producto" 
                  
                  value="<?php if (isset( $datos->tip_producto_terminado))echo $datos->tip_producto_terminado;?>"

                  id="productoterminado" 
                  required
                   name="productoterminado" class="form-control" required>
                </div>

                <div class="col-md-3">
                  <label for="tiempoproduccion">Tiempo de Producción</label>
                      <select name="tiempoproduccion" class="form-control" id="tiempoproduccion">
                          <option value="30">Mensual</option>
                          <option value="90">Trimestral</option>
                          <option value="365">Anual</option>
                      </select>
                </div>

                 <div class="col-md-3">
                  <label class="" for="cantidadproducto"> 
                    Cantidad de Producto Terminado </label>
                  <input type="number" placeholder="ingrese total de producto" 
                  
                  value="<?php if (isset( $datos->cant_producto_terminado))echo $datos->cant_producto_terminado;?>"

                  id="cantidadproducto" 
                  required
                   name="cantidadproducto" class="form-control" required>
                </div>

                <div class="col-md-3">
                  <label for="unidadmedida">Unidad<small>  ( metrica )</small></label>
                      <select name="unidadmedida" class="form-control" id="unidadmedida">
                          <option value="lts">Litros</option>
                          <option value="Kg">Kilos</option>
                          <option value="m2">Metros cuadrados</option>
                          <option value="m3">Metros cubicos</option>
                           <option value="piezas">Piezas</option>
                          <option value="pares">Pares</option>
                      </select>     
              </div>

              <div class="col-md-3">
                <label for="funcionamientooperativo">Funcionamiento Operativo</label>
                    <select name="funcionamientooperativo" class="form-control"
                    id="funcionamientooperativo">
                        <option value="fase de prueba">Fase de Prueba  0% -- 20% </option>
                        <option value="activo con limitaciones">Activo con Limitaciones  21% -- 50% </option>
                        <option value="en recuperacion">En Recuperacion  51% -- 80% </option>
                        <option value="activo ">Activo  81% -- 100% </option>
                    </select>
            </div>
              </div>

              <h5 class="text-center">Asignar Tutor

              </h5>

              <div class="row">

                <div class="col-md-6">
                  <label for="tutor">Tutor</label>
                      <select name="tutor" class="form-control"  id="tutor">
                          <option value="0">No Asignar</option>
                        </select>
             
              </div>
              </div>
        
      </div>
  </div>
  