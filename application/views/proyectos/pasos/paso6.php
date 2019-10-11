<div class="panel">
  
  
  
        <div id="msj6"></div>
        
	        <div class="panel-body">
	          	<!-- INICIO MANO DE OBRA -->
	          	<h5 class="text-center"> Mano de Obra</h5>
	          	<hr>

	          	<div class="row">
				  <?php
						 $cantidadperop ='';
						 $cantidadperman ='';
						 $cantidadperadmin ='';
						 $totalmanoobra = 0;
						                                                     
                          if( isset($mano_obra))
                                                           
                            foreach ($mano_obra as $key => $value) {
								if ($value->tipo_cargo == 'Personal operativo'){
									$cantidadperop = $value->cant_personal;
								} elseif ($value->tipo_cargo == 'Personal de Mantenimiento'){
									$cantidadperman = $value->cant_personal;
								} elseif ($value->tipo_cargo == 'Personal de Administracion'){
									$cantidadperadmin = $value->cant_personal;
								}
							$totalmanoobra +=	$value->cant_personal * $value->salario;
							}
                                                              ?>
	          			<div class="col-md-3">
	          				<label for="tipocargo" class="control-label"> Tipo de Cargo </label>
	          				<input class="form-control" type="text" name="personaloperativo" value="Personal Operativo" disabled>
	          				<br>
	          				<input class="form-control" type="text" name="personalmantenimiento" value="Personal de Mantenimiento" disabled>
	          				<br>
	          				<input class="form-control" type="text" name="personaladministrativo" value="Personal de Administración" disabled>
	          			</div>

	          			<div class="col-md-3">
	          				<label for="cantidad" class="control-label"> Cantidad </label>
	          				<input class="form-control" type="number"  id="cantidadperop" name="cantidadperop" value ='<?php if( isset($mano_obra)) echo $cantidadperop; ?>'  required> 
	          				<br>
	          				<input class="form-control" type="number" id="cantidadperman" name="cantidadperman" value ='<?php if( isset($mano_obra)) echo $cantidadperman; ?>'required>
	          				<br>
	          				<input class="form-control" type="number" id="cantidadperadmin" name="cantidadperadmin" value ='<?php if( isset($mano_obra)) echo $cantidadperadmin; ?>'required>
	          			</div>

	          			<div class="col-md-3">
									<label for="salariominimo" class="control-label"> Salario Minimo </label>
		          		<div class="input-group">
	  								<span class="input-group-addon">Bs</span>
	  								<input class="form-control" id="salariominimo_perop" name="salariominimo" value="65000" type="number" disabled>
									</div>
									<br>
									<div class="input-group">
	  								<span class="input-group-addon">Bs</span>
	  								<input class="form-control" id="salariominimo_perman" name="salariominimo" value="65000" type="number" disabled>
									</div>
									<br>
									<div class="input-group">
	  								<span class="input-group-addon">Bs</span>
	  								<input class="form-control" id="salariominimo_peradmin" name="salariominimo" value="65000" type="number" disabled>
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
							  <input class="form-control" id="costoInsumo" type="number" name="costoInsumo" readonly value="<?php if(isset($totalMateriaP ))
							  echo $totalMateriaP ?>"><!-- Aqui va la sumatoria de la cantidad mas el precio de los insumos en el paso 5 -->
	          			</div>	
	          		</div>

	          		<div class="col-md-3">
	          			<label for="herramientas" class="control-label"> Herramientas y Equipos de Trabajo </label>
	          			<div class="input-group">
	          				<span class="input-group-addon">Bs</span>
	          				<input class="form-control" id="costoHerramientas" type="number" name="costoHerramientas" readonly value="<?php if(isset($totalHerramientas ))
							  echo $totalHerramientas ?>"><!-- Aqui va la sumatoria de la cantidad mas el precio de las herramientas de trabajo en el paso 5 -->
	          			</div>	
	          		</div>

	          		<div class="col-md-3">
	          			<label for="maquinas" class="control-label"> Maquinas y Equipos Técnologicos </label>
	          			<div class="input-group">
	          				<span class="input-group-addon">Bs</span>
	          				<input class="form-control" type="number" id="costoMaquinas" name="costoMaquinas" readonly value="<?php if(isset($totalMaquinarias ))
							  echo $totalMaquinarias ?>"><!-- Aqui va la sumatoria de la cantidad mas el precio de los maquinas tecnologicas en el paso 5 -->
	          			</div>	
	          		</div>

	          		<div class="col-md-4">
	          			<label for="mobiliario" class="control-label"> Mobiliario y Equipos Complementarios </label>
	          			<div class="input-group">
	          				<span class="input-group-addon">Bs</span>
	          				<input class="form-control" type="number" id="costoMobiliario" name="costoMobiliario" readonly value="<?php if(isset($totalMobiliario ))
							  echo $totalMobiliario ?>"> <!-- Aqui va la sumatoria de la cantidad mas el precio de los mobiliario en el paso 5 -->
	          			</div>	
	          		</div>

	          		<div class="col-md-3">
	          			<label for="manodeobra" class="control-label"> Mano de Obra </label>
	          			<div class="input-group">
	          				<span class="input-group-addon">Bs</span>
	          				<input class="form-control" type="number" id="costoManodeobra" name="costoManodeobra" value ='<?php if( isset($mano_obra)) echo $totalmanoobra; ?>' readonly><!-- Aqui va la sumatoria de la cantidad mas el precio de la mano de obra en el paso 6 -->
	          			</div>	
	          		</div>

	          		<div class="col-md-3">
	          			<label for="servicios" class="control-label"> Servicios Públicos </label>
	          			<div class="input-group">
	          				<span class="input-group-addon">Bs</span>
	          				<input class="form-control" type="number" name="costoServicio" required><!-- Aqui va la sumatoria de la cantidad mas el precio de los servicios en el paso 4 -->
	          			</div>	
	          		</div>
	          	</div>

	        </div>

</div>

<script>
//* INSERTE SCRIPTS AQUI
function agregar_costos_complementos(insumos,herramientas,maquinas,mobiliario){
	$('#costoInsumo').val(insumos)
	$('#costoHerramientas').val(herramientas)
	$('#costoMaquinas').val(maquinas)
	$('#costoMobiliario').val(mobiliario)

}

$('#cantidadperop').keyup(Calcular_ManodeObra)
$('#cantidadperman').keyup(Calcular_ManodeObra)
$('#cantidadperadmin').keyup(Calcular_ManodeObra)

function Calcular_ManodeObra(){
	let costoperop =  0
	if(parseInt( $('#cantidadperop').val() )){
		costoperop = parseInt($('#cantidadperop').val()) * parseInt($('#salariominimo_perop').val())
	}
	let costoperman = 0
	if(parseInt( $('#cantidadperman').val() )){
		costoperman = parseInt($('#cantidadperman').val()) * parseInt($('#salariominimo_perman').val())
	}
	let costoperadmin = 0
	if(parseInt( $('#cantidadperadmin').val() )){
		costoperadmin = parseInt($('#cantidadperadmin').val()) * parseInt($('#salariominimo_peradmin').val())
	}
	let costo = parseInt(costoperop) + parseInt(costoperman) + parseInt(costoperadmin)
	console.log(costo)
	$('#costoManodeobra').val(costo)
}

/**/       
</script>
  