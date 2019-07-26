<div class="panel">



  <div id="msj2"></div>

  <div class="panel-body">

    <h5 class="text-center">Datos del Proyecto</h5>
    <hr>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group ">
          <label>Nombre del proyecto</label>
          <input type="text" placeholder="nombre" value="<?php if (isset( $datos->profesion))echo $datos->nombre;?>"
            id="nombrep" data-msg-required="Ingrese un numero de teléfono" name="nombrep" class="form-control" required>
        </div>
      </div>

      <div class="col-md-6">

        <div class="form-group">
          <label>Estatus del Proyecto </label>

          <select class="custom-select form-control" id="estatus_proyecto_id" required name="estatus_proyecto_id">
            <option value="">Seleccione un opcion</option>
          </select>

        </div>

      </div>
    </div>




    <div class="row">
      <div class="col-md-6">
        <div class="form-group ">
          <label>Categoria</label>

          <select class="custom-select form-control" id="categoria_id" name="categoria_id" required>
            <option value="">Seleccione un opcion</option>
          </select>
        </div>
      </div>

      <div class="col-md-6">

        <div class="form-group">
          <label>Sub Categoria </label>

          <select class="custom-select form-control" id="sub_categoria_id" name="sub_categoria_id" required>
            <option value="">Seleccione un opcion</option>
          </select>

        </div>

      </div>
    </div>

    <hr>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group ">
          <label>Personas beneficiadas</label>
          <input type="number"
            value="<?php if (isset( $datos->personas_beneficiadas))echo $datos->personas_beneficiadas;?>"
            placeholder="personasbenificiadas" id="personasbenificiadas" name="personasbenificiadas"
            class="form-control" required>
        </div>
      </div>

      <div class="col-md-6">

        <div class="form-group ">
          <label>Población Beneficiada</label>
          <input type="number" placeholder="" id="poblacion"
            value="<?php if (isset( $datos->poblacion_beneficiada))echo $datos->poblacion_beneficiada;?>"
            name="poblacion" class="form-control" required>
        </div>

      </div>
    </div>

    <div class="row">
      <hr>
      <div class="col-md-12">
        <div class="form-group ">
          <label>Descripcion del Proyecto</label>

          <textarea id="descripcion" data-msg-required="Ingrese una descripcion" name="descripcion" class="form-control"
            required> <?php if (isset( $datos->descripcion))echo $datos->descripcion;?></textarea>
        </div>
      </div>

      <input type="hidden" id="cedula2" name="cedula2">
      <input type="hidden" id="cedula2" name="cedula2">
      <input type="hidden" id="idproyecto" name="idrequerimiento">
    </div>


    <!--h5 class="text-center">Inversión Solicitada</h5>

    <hr>
  
    <div class="row">
      <div class="col-md-2">
        <div class="form-group ">
          <label>Infraestructura (Bs)        </label>
          <input type="text" 
            id="infraestructura" 
            data-msg-required="Ingrese un monto" 
            name="infraestructura" class="form-control" 
            value="<?php if (isset( $datos->infraestructurabs))echo $datos->infraestructurabs;?>"
             
             required>
        </div>
      </div>

      <div class="col-md-4">

        <div class="form-group">
          <label>Maquinaria,
            Equipos y
            Herramientas
            (Bs) </label>

            <input type="text"
            id="maquinariasEquipos"
             data-msg-required="Ingrese un monto" 
             name="maquinariasEquipos" class="form-control" 
             value="<?php if (isset( $datos->maquinariasbs))echo $datos->maquinariasbs;?>"
             
              
              required>
        </div>

      </div>


      <div class="col-md-3">

        <div class="form-group">
          <label>Insumos
            y
            Materias Primas
            (Bs) </label>

            <input type="text"
            id="insumosMateriaPrima"
             data-msg-required="Ingrese un monto" 
             name="insumosMateriaPrima" class="form-control"
             value="<?php if (isset( $datos->insumos_materiasbs))echo $datos->insumos_materiasbs;?>"

                required>
        </div>

      </div>

      
      <div class="col-md-3">

        <div class="form-group">
          <label>Fuerza de
            Trabajo
            (Bs) </label>

            <input type="text"
            id="FuerzaTrabajo" 
            data-msg-required="Ingrese un monto" 
            name="FuerzaTrabajo" class="form-control" 
            value="<?php if (isset( $datos->fuerza_trabajo))echo $datos->fuerza_trabajo;?>"
             
             required>
        </div>

      </div>

      <div class="col-md-3">

            <div class="form-group">
              <label>Servicios
                (Bs) </label>
      
                <input type="text"
                id="mservicios"
                 data-msg-required="Ingrese un monto"
                  name="mservicios" class="form-control"
                  value="<?php if (isset( $datos->servicios))echo $datos->servicios;?>"
                    
                    required>
            </div>

      </div>
          
      <div class="col-md-3">

        <div class="form-group">
            <label>Calculo de tiempo: </label>
      
                <select class="custom-select form-control" id="tiempoinversion" name="tiempoinversion" required>
                  <option value="">Seleccione un opción</option>
                  <option value="30">Mensual</option>
                  <option value="90">Trimestral</option>
                  <option value="365">Anual</option>
                </select>
        </div>

      </div>

      <div class="col-md-4">

        <div class="form-group">
            <label> Inversion Total
              (Bs) </label>
    
              <input type="text"
              id="inversionTotal" 
              data-msg-required="Ingrese un monto" 
              name="inversionTotal" class="form-control" 
              value="<?php if (isset( $datos->monto))echo $datos->monto;?>"
               
               required>
        </div>
          
      </div>
    </div--> 
  </div>
</div>