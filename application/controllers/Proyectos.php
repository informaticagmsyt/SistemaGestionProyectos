<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyectos extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct(){

		parent::__construct();
	
		$this->load->library('session');
		$this->load->model('ProyectoModel');
		$this->load->model('RequerimientosModel');
		$this->load->model('ProfesionModel');
		$this->load->model('DatosPersonasModel');
		$this->load->model('PersonasModel');
		if(!is_logged_in()){
			redirect('login');
			
		}
	}


	public function index()
	{
		$nombreUsuario = $this->session->userdata('user_data');
		$this->load->view('layout/header');
		$this->load->view('layout/nav');
		$User['nombreUser']=$nombreUsuario['nombre'];
		$this->load->view('layout/navar',$User);
		
		$this->load->view('layout/scriptjs');
		$this->load->view('proyectos/listarView');
		$this->load->view('layout/footer');
	}




public function registrar()
{

	
	/*$resultProyectos=$this->ProyectoModel->findProyectosPersonas('19969774');
	$this->output
	->set_content_type('application/json')
	->set_output(json_encode($resultProyectos));*/


    $nombreUsuario = $this->session->userdata('user_data');
    $this->load->view('layout/header');
    $this->load->view('layout/nav');
    $User['nombreUser']=$nombreUsuario['nombre'];
    $this->load->view('layout/navar',$User);
    
    $this->load->view('layout/scriptjs');
    $this->load->view('proyectos/registrar');

}


public function getProfesion(){

	$result=$this->ProfesionModel->getProfesion($this->input->post_get('codigo'));

	$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($result));

}

public function getDatosPersonasJSON(){

	if(!empty($this->input->post_get('cedula'))) { 
		
		$_SESSION['requerimiento_id']=NULL;
		$_SESSION['proyecto_id']=NULL;
		$_SESSION['persona_id']=NULL;
		$_SESSION['cedula']=NULL;
					

		//ver si tine prroyectos
		$resultProyectos=$this->ProyectoModel->findProyectosPersonas($this->input->post('cedula'));
		if(!$resultProyectos['result']){

			$obj=$this->DatosPersonasModel->getDataPersona($this->input->post_get('cedula'));

		}else{
			$obj = new stdClass;
			$obj->response=array(
                "status"=>"ok",
                "http_code"=>404
            );
           $obj->data=array(
			$resultProyectos
          );
          $obj->error=array("code"=>"","message"=>"");
          $obj->comments="Esta persona ya posee un proyecto registrado";

             

               $obj;
		}

	$this->output
        ->set_content_type('application/json')
		->set_output(json_encode($obj));
		
	}

}

public function  regitrarPaso1(){


	if(empty($_SESSION['cedula'])){

 $_SESSION['cedula']= $this->input->post('cedula');

	}


	$resultProyectos=$this->ProyectoModel->findProyectosPersonas($this->input->post('cedula'));
	if(!$resultProyectos['result']){

	//consultar si esta en la tabla personas
	$resultPersonas=$this->PersonasModel->find($this->input->post('cedula'));

	//Actualizar
	if($resultPersonas['result']){

		$cadena_f=$this->input->post('fecha_nac');
		$fecha = DateTime::createFromFormat('Y-m-d', $cadena_f);
		$datos = array(
			'nacionaliidad' 	=> $this->input->post('nacionaliidad'),
			'nombres' 			=> $this->input->post('nombres'),
			'apellidos' 		=> $this->input->post('apellidos'),
			'email' 			=> $this->input->post('email'),
			'cedula'			=> $this->input->post('cedula'),
			'sexo' 				=> $this->input->post('sexo'),
			'direccion'			=> $this->input->post('direccion'),
			'estado_id' 		=> $this->input->post('estado_id'),
			'municipio_id' 		=> $this->input->post('municipio_id'),
			'parroquia_id' 		=> $this->input->post('parroquia_id'),
			'v_carnet' 			=> $this->input->post('v_carnet'),
			'v_social' 			=> $this->input->post('v_social'),
			'fecha_nac' 		=> $fecha, 
			'posee_carnet'		=> $this->input->post('posee_carnet'), 
			'telefono'			=> $this->input->post('telefono'), 
			'telefono2'			=> $this->input->post('telefono2'), 
			'profesion' 		=> $this->input->post('profesion'), 
			'institucion_id'	=> 0,
			'principal'			=> true
			);

			
		$result=$this->PersonasModel->actualizar($datos,$resultPersonas['data']->id);

		if($result){

			$response=array(
				"result"	=>true,
				"mensaje"	=>"Se guardaron los cambios exitosamente"
			);


		}else{

			$response=array(
				"result"	=>false,
				"mensaje"	=>"Ocurrio un error, no se logro Guardar"
			);
		}
	
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode($response));

	}else{
	//insertar
	$cadena_f=$this->input->post('fecha_nac');
	$fecha = DateTime::createFromFormat('Y-m-d', $cadena_f);
	$datos = array(
		'nacionaliidad' 	=> $this->input->post('nacionaliidad'),
		'nombres' 			=> $this->input->post('nombres'),
		'apellidos' 		=> $this->input->post('apellidos'),
		'email' 			=> $this->input->post('email'),
		'cedula'			=> $this->input->post('cedula'),
		'sexo' 				=> $this->input->post('sexo'),
		'direccion'			=> $this->input->post('direccion'),
		'estado_id' 		=> $this->input->post('estado_id'),
		'municipio_id' 		=> $this->input->post('municipio_id'),
		'parroquia_id' 		=> $this->input->post('parroquia_id'),
		'v_carnet' 			=> $this->input->post('v_carnet'),
		'v_social' 			=> $this->input->post('v_social'),
		'fecha_nac' 		=> 	$fecha, 
		'posee_carnet'		=> $this->input->post('posee_carnet'), 
		'telefono'			=> $this->input->post('telefono'), 
		'telefono2'			=> $this->input->post('telefono2'), 
		'profesion' 		=>$this->input->post('profesion'), 
		'institucion_id'	=>0,
		'principal'			=> true
		);

					$idpersona=$this->PersonasModel->registrar($datos);

					$data=array("perfil_id"=>4,
								"personas_id"=>	$idpersona);


					$this->PersonasModel->registrarPersonaPerfil($data);
					$response=array(
					"result"	=>true,
					"mensaje"	=>"Se guardaron los cambios Exitosamente",
					);



					$this->output
					->set_content_type('application/json')
					->set_output(json_encode($response));

	}


			}else{
			//tiene proyectos
			$response=array(
			"result"	=>false,
			"mensaje"	=>"Ya existe un requerimiento registrado con esta cedula".$this->input->post('cedula') ,
			);

			$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
			}

		}

		public function  regitrarPaso2(){

		
	
		$user=	$this->session->userdata('user_data');

		$actualizar=false;
		if(!empty($_SESSION['requerimiento_id'])){
		
			$actualizar=true;
			
		   }
		   if($actualizar){

			$datos = array(
				'descripcion'           =>$this->input->post('descripcion'),
				'categoria_id'         	=>$this->input->post('categoria_id'),
				'sub_categoria_id'      =>$this->input->post('sub_categoria_id'),
				'user_id'           =>$user['id']						


		);

		//Actualizo paso
		$this->ProyectoModel->update(
		array("nombre"=>$this->input->post('nombrep'),
		"personas_beneficiadas"=>$this->input->post('personasbenificiadas'),
		"poblacion_beneficiada"=>$this->input->post('poblacion')
	),
		
		$_SESSION['proyecto_id']);


			$Urequerimiento=$this->RequerimientosModel->update($datos,$_SESSION['requerimiento_id']);
			if($Urequerimiento){
				$response=array(
					"result"	=>true,
					"mensaje"	=>"Se Actualizaron los datos exitosamente",
			
					);
				}

			else{

				$response=array(
					"result"	=>false,
					"mensaje"	=>"Ocurrio un Error al intentar actualizar",
			
					);

			}

			$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));

		    }else{


		  	   
			$datos = array(
						'descripcion'           =>$this->input->post('descripcion'),
						'categoria_id'         	=>$this->input->post('categoria_id'),
						'sub_categoria_id'      =>$this->input->post('sub_categoria_id'),
						'user_id'           	=>$user['id']						
		
	 
				);

				
			$idrequerimiento=$this->RequerimientosModel->registrar($datos);

			$resultpersonas=$this->PersonasModel->find($_SESSION['cedula']);
			$idpersonas=$resultpersonas['data']->id;


			//aqui se relaciona las persona con el requerimiento
			$this->RequerimientosModel->requerimientoPersona(
				array(
				'requerimiento_id'=>$idrequerimiento,
				'persona_id'=>$idpersonas

			));

			

			if($idrequerimiento>0){

				$idproyecto=$this->ProyectoModel->registrar(
					
					array("nombre"			=>$this->input->post('nombrep'),
					"personas_beneficiadas" =>$this->input->post('personasbenificiadas'),
					"poblacion_beneficiada" =>$this->input->post('poblacion'),
					"requerimiento_id"		=>$idrequerimiento)

					);
				

			}

			//creo session temporal para los id
			$_SESSION['requerimiento_id']=$idrequerimiento;
			$_SESSION['proyecto_id']=$idproyecto;
			$_SESSION['persona_id']=$idpersonas;
			

			if($idproyecto>0){

			$response=array(
				"result"	=>true,
				"mensaje"	=>"Se guardaron los datos exitosamente",
				"idproyecto"=>$idproyecto,
				"idrequerimiento"=>$idrequerimiento
				);
			}

			
			$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
		}
		}


		
		public function  regitrarPaso3(){

			$datos = array(
				
				'municipio_id'         	=>$this->input->post('municipio_id'),
				'parroquia_id'     		=>$this->input->post('parroquia_id'),
				'estado_id'      		=>$this->input->post('estado_id'),
				"ente_id"=>   $this->input->post('inst_responsable')
								


		);

		
		$idrequerimiento=$this->RequerimientosModel->update($datos,$_SESSION['requerimiento_id']);

		$datos=		array(
			"codrif"				=>$this->input->post('rif'),
			"numero_rif"			=>$this->input->post('numerorif'),
			"nombre_empresa"		=>$this->input->post('nombrerazonsocial'),
			"empresa_registrada"	=>$this->input->post('registrada'),
			"codigo_situr"			=>$this->input->post('codigo_situr'),
			"codigo_sunagro"		=>$this->input->post('codigo_sunagro'),
			
		);
		$idproyecto=$this->ProyectoModel->update($datos,$_SESSION['proyecto_id']);
	
			
			if($idproyecto>0){
				$response=array(
					"result"	=>true,
					"mensaje"	=>"Se guardaron los datos exitosamente",
					"idproyecto"=>$idproyecto,
					"idrequerimiento"=>$idrequerimiento
					);

			}else{

				$response=array(
					"result"	=>false,
					"mensaje"	=>"Ocurrio un Error al intentar actualizar",
			
					);	
			}

						
			$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
	
		}


				
		public function  regitrarPaso4(){

			$datos = array(
				
				'edificacion'        		 =>$this->input->post('edificacion'),
				'area_terreno'      		 =>$this->input->post('areaterreno'),
				'servicios_sanitarios'       =>$this->input->post('instalaciones'),
				"observaciones"				 =>$this->input->post('observaciones'),
				"acometida_agua_blanca"		 =>$this->input->post('acometida'),
				"aceo_urbano"		 		 =>$this->input->post('aseourbano'),
				"servicio_electrico"		 =>$this->input->post('servicioelectrico'),
				"servicios_gas"		 		 =>$this->input->post('serviciogas'),
				"acometida_agua_negra"		 =>$this->input->post('acometidaservidas')
			
				// $this->input->post('inst_responsable')
								


		);

		$idproyecto=$this->ProyectoModel->update($datos,$_SESSION['proyecto_id']);
	
			
			if($idproyecto>0){
				$response=array(
					"result"	=>true,
					"mensaje"	=>"Se guardaron los datos exitosamente",

					);

			}else{

				$response=array(
					"result"	=>false,
					"mensaje"	=>"Ocurrio un Error al intentar actualizar",
			
					);	
			}

						
			$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
	
		}



		public function  regitrarPaso5(){
	
			$codigoCaso=	$this->RequerimientosModel->generarCodigoCaso();
		
			$datosr = array(
				"codcaso"	=>	$codigoCaso['codigoCaso'],
				"tutor_id" 	=>	$this->input->post('tutor'),
	
		);
		
		$this->RequerimientosModel->update($datosr,$_SESSION['requerimiento_id']);


						$datos = array(
							
							'capacidad_instalada'        		 =>$this->input->post('capacidadinstalada'),
							'cap_produccion_actual'      		 =>$this->input->post('produccionactual'),
							'unidad_metrica'       				 =>$this->input->post('unidadmedida'),
							"funcionamiento_operativo"			 =>$this->input->post('funcionamientooperativo'),
					
				
							// $this->input->post('inst_responsable')
											
			
			
					);
			
				
					$idproyecto=$this->ProyectoModel->update($datos,$_SESSION['proyecto_id']);
				
						
						if($idproyecto>0){
							$response=array(
								"result"	=>true,
								"mensaje"	=>"Se guardaron los datos exitosamente",
								"codigoCaso"=>$codigoCaso['codigoCaso']
			
								);


			
						}else{
			
							$response=array(
								"result"	=>false,
								"mensaje"	=>"Ocurrio un Error al intentar actualizar",
						
								);	
						}
			
						$_SESSION['requerimiento_id']=NULL;
						$_SESSION['proyecto_id']=NULL;
						$_SESSION['persona_id']=NULL;
						$_SESSION['cedula']=NULL;
									
						$this->output
						->set_content_type('application/json')
						->set_output(json_encode($response));
				
					}
			
			

		public function getCategoria(){
			$response=	$this->RequerimientosModel->categoriaGet();

			$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
			
		
		}

		public function getSubCategoria(){
			$response=	$this->RequerimientosModel->getSubCategoria($this->input->get('id'));

			$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
			
		
		}


		

		public function getAllProyecto(){
			$response=	$this->ProyectoModel->getAll();

			$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
			
		
		}
		public function getEstatusProyecto(){
			$response=	$this->ProyectoModel->getEstatusProyecto();

			$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
			
		
		}
}

