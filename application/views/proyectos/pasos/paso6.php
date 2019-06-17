<div class="panel">
  
  
  
        <div id="msj6"></div>
        
	        <div class="panel-body">
	          	<!-- INICIO MANO DE OBRA -->
	          	<h5 class="text-center"> Mano de Obra </h5>
	          	<hr>

	          	<div class="row">
	          		
	          		<div class="col-md-3">
	          			<label for="tipocargo" class="control-label"> Tipo de Cargo </label>
	          			<input class="form-control" type="text" name="personaloperativo" value="Personal Operativo" readonly>
	          			<br>
	          			<input class="form-control" type="text" name="personalmantenimiento" value="Personal de Mantenimiento" readonly>
	          			<br>
	          			<input class="form-control" type="text" name="personaladministrativo" value="Personal de Administración" readonly>
	          		</div>
	          		<div class="col-md-3">
	          			<label for="cantidad" class="control-label"> Cantidad </label>
	          			<input class="form-control" type="number" name="cantidadperop" required>
	          			<br>
	          			<input class="form-control" type="number" name="cantidadperman" required>
	          			<br>
	          			<input class="form-control" type="number" name="cantidadperadmin" required>
	          		</div>
	          		<div class="col-md-3">
						<label for="salariominimo" class="control-label"> Salario Minimo </label>
		          		<div class="input-group">
	  						<span class="input-group-addon">Bs</span>
	  						<input class="form-control" id="salariominimo" name="salariominimo" value="65000" type="number" readonly>
						</div>
						<br>
						<div class="input-group">
	  						<span class="input-group-addon">Bs</span>
	  						<input class="form-control" id="salariominimo" name="salariominimo" value="65000" type="number" readonly>
						</div>
						<br>
						<div class="input-group">
	  						<span class="input-group-addon">Bs</span>
	  						<input class="form-control" id="salariominimo" name="salariominimo" value="65000" type="number" readonly>
						</div>
					</div>

	          	</div>

	          	<h5 class="text-center"> Estructura de Costos </h5>
	          	<hr>

	          	<div class="row">
	          		<div class="col-md-3">
	          			<label for="insumos" class="control-label"> Materia Prima e Insumos </label>
	          			<div class="input-group">
	          				<span class="input-group-addon">Bs</span>
	          				<input class="form-control" type="number" name="costoInsumo" readonly><!-- Aqui va la sumatoria de la cantidad mas el precio de los insumos en el paso 5 -->
	          			</div>	
	          		</div>

	          		<div class="col-md-3">
	          			<label for="herramientas" class="control-label"> Herramientas y Equipos de Trabajo </label>
	          			<div class="input-group">
	          				<span class="input-group-addon">Bs</span>
	          				<input class="form-control" type="number" name="costoHerramientas" readonly><!-- Aqui va la sumatoria de la cantidad mas el precio de las herramientas de trabajo en el paso 5 -->
	          			</div>	
	          		</div>

	          		<div class="col-md-3">
	          			<label for="maquinas" class="control-label"> Maquinas y Equipos Técnologicos </label>
	          			<div class="input-group">
	          				<span class="input-group-addon">Bs</span>
	          				<input class="form-control" type="number" name="costoMaquinas" readonly><!-- Aqui va la sumatoria de la cantidad mas el precio de los maquinas tecnologicas en el paso 5 -->
	          			</div>	
	          		</div>

	          		<div class="col-md-4">
	          			<label for="mobiliario" class="control-label"> Mobiliario y Equipos Complementarios </label>
	          			<div class="input-group">
	          				<span class="input-group-addon">Bs</span>
	          				<input class="form-control" type="number" name="costoMobiliario" readonly><!-- Aqui va la sumatoria de la cantidad mas el precio de los mobiliario en el paso 5 -->
	          			</div>	
	          		</div>

	          		<div class="col-md-3">
	          			<label for="manodeobra" class="control-label"> Mano de Obra </label>
	          			<div class="input-group">
	          				<span class="input-group-addon">Bs</span>
	          				<input class="form-control" type="number" name="costoManodeobra" readonly><!-- Aqui va la sumatoria de la cantidad mas el precio de la mano de obra en el paso 6 -->
	          			</div>	
	          		</div>

	          		<div class="col-md-3">
	          			<label for="servicios" class="control-label"> Servicios Públicos </label>
	          			<div class="input-group">
	          				<span class="input-group-addon">Bs</span>
	          				<input class="form-control" type="number" name="costoServicio" ><!-- Aqui va la sumatoria de la cantidad mas el precio de los servicios en el paso 4 -->
	          			</div>	
	          		</div>
	          	</div>

	        </div>

</div>

<script>
//* INSERTE SCRIPTS AQUI

/**/       
</script>
  