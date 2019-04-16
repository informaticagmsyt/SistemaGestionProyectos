
    <div class="panel">

  
  
        <div id="msj2"></div>
        
          <div class="panel-body">
  
          <h5 class="text-center">Datos del Requerimiento</h5>
                    <hr>
  
                    <div class="row">
                      <div class="col-md-6">
                          <div class="form-group ">
                              <label>Nombre del Requerimiento</label>
                          <input type="text" placeholder="nombrereq" id="nombrereq"
                          data-msg-required= "Ingrese un nombre"
                           name="nombrereq" class="form-control" required>
                        </div>
                        </div>
        
                      <div class="col-md-6">
                     
                        <div class="form-group">
                          <label>Estatus del Requerimiento </label>
                      
                            <select class="custom-select form-control" 
                            id="estatus_requerimiento_id" 
                            name="estatus_requerimiento_id">
                              <option value="0">Seleccione un opcion</option>
                            </select>
                          
                        </div>
        
  
                        
                    </div>
        </div>
  


  
        <div class="row">
          <div class="col-md-6">
              <div class="form-group ">
                  <label>Categoria</label>
  
                  <select class="custom-select form-control" 
                  id="categoria_id" 
                  name="categoria_id"              required>
                    <option value="">Seleccione un opcion</option>
                  </select>
            </div>
            </div>
  
          <div class="col-md-6">
         
            <div class="form-group">
              <label>Sub Categoria </label>
          
                <select class="custom-select form-control" 
                id="sub_categoria_id" 
                name="sub_categoria_id"              required>
                  <option value="">Seleccione un opcion</option>
                </select>
            </div>
          
          </div>  

  <div class="row">
    <hr>
    <div class="col-md-12">
        <div class="form-group ">
            <label>Descripcion del Proyecto</label>
  
            <textarea 
            id="descripcion" 
            value=""
            data-msg-required= "Ingrese una descripcion"
             name="descripcion" class="form-control" required > </textarea> 
      </div>
      </div>
  
      <input type="hidden"  id="cedula2"  name="cedula2"  >
      <input type="hidden"  id="cedula2"  name="cedula2"  >
      <input type="hidden"  id="idrequerimiento"  name="idrequerimiento"  >
      <input type="hidden"  id="idproyecto"  name="idrequerimiento"  >
  </div>
        </div>
  
      
    </div>
