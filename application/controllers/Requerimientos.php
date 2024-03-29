<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Requerimientos extends CI_Controller {

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
		$this->load->model('RequerimientosModel');
		$this->load->model('ProfesionModel');
		$this->load->model('DatosPersonasModel');
		$this->load->library('session');
		$this->load->model('PersonasModel');

		
		if(!is_logged_in()){
			redirect('index.php/login');
			
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
		
		$this->load->view('requerimiento/requerimientoView');
		$this->load->view('layout/footer');
	}



	public function verRequerimientos(){
		$nombreUsuario = $this->session->userdata('user_data');
		$this->load->view('layout/header');
		$this->load->view('layout/nav');
		$User['nombreUser']=$nombreUsuario['nombre'];
		$this->load->view('layout/navar',$User);
		
		$this->load->view('layout/scriptjs');
		$this->load->view('requerimiento/listarView');
		$this->load->view('layout/footer');
	}
	public function getAll(){

	$data=	$this->RequerimientosModel->getAllRequerimientos();

	$response=array(
		"result"	=>true,
		"data"	=>$data,
		);
	$this->output
	->set_content_type('application/json')
	->set_output(json_encode($response));
	}
	public function registrar()
	{

		$resultPersonas=$this->RequerimientosModel->findRequerimientoPersonas($this->input->post('cedula'));
		//no esta en la tabla personas
		if(!$resultPersonas['result']){

				//insertar
				$cadena_f=$this->input->post('fecha_nac');
				$fecha = DateTime::createFromFormat('Y-m-d', $cadena_f);
				$data = array(
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
					'fecha_nac' 		=> $this->input->post('fecha_nac'), 
					'posee_carnet'		=> $this->input->post('posee_carnet'), 
					'telefono'			=> $this->input->post('telefono'), 
					'telefono2'			=> $this->input->post('telefono2'), 
					'profesion' 		=>$this->input->post('profesion'), 
					'cargo'	=> '',
					'institucion_id'	=>0,
					'principal'			=> true
		);



		$User = $this->session->userdata('user_data');

			
					$this->PersonasModel->registrar($data);

					$codigoCaso=	$this->RequerimientosModel->generarCodigoCaso();

					$datos = array(
						'descripcion'           =>$this->input->post('descripcion'),
						"codcaso"	=>	$codigoCaso['codigoCaso'],
						'categoria_id'         	=>$this->input->post('categoria_id'),
						'sub_categoria_id'      =>$this->input->post('sub_categoria_id'),
						'user_id'           	=>$User['id']	);
			
					$idrequerimiento=$this->RequerimientosModel->registrar($datos);

					//aqui se relaciona las persona con el requerimiento
					$this->RequerimientosModel->requerimientoPersona(
					array(
					'requerimiento_id'=>$idrequerimiento,
					'persona_id'=>$resultPersonas['data']->id_persona
	
					));

					$response=array(
						"result"	=>true,
						"mensaje"	=>"Se guardaron los cambios Exitosamente",
						);
					

						$this->output
						->set_content_type('application/json')
						->set_output(json_encode($response));
		}else{
			//actualizar
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
				'fecha_nac' 		=> $this->input->post('fecha_nac'), 
				'posee_carnet'		=> $this->input->post('posee_carnet'), 
				'telefono'			=> $this->input->post('telefono'), 
				'telefono2'			=> $this->input->post('telefono2'), 
				'profesion' 		=> $this->input->post('profesion'), 
				'cargo'	=> '',
				'institucion_id'	=> 0,
				'principal'			=> true
				);
	
				
			$result=$this->PersonasModel->actualizar($datos,$resultPersonas['data']->id_persona);


			$User = $this->session->userdata('user_data');
			$codigoCaso=	$this->RequerimientosModel->generarCodigoCaso();

			$data = array(
				'descripcion'           =>$this->input->post('descripcion'),
				"codcaso"	=>	$codigoCaso['codigoCaso'],
				'categoria_id'         	=>$this->input->post('categoria_id'),
				'sub_categoria_id'      =>$this->input->post('sub_categoria_id'),
				'user_id'           	=>$User['id']	);
		
	$idrequerimiento=$this->RequerimientosModel->registrar($data);

				//aqui se relaciona las persona con el requerimiento
				$this->RequerimientosModel->requerimientoPersona(
				array(
				'requerimiento_id'=>$idrequerimiento,
				'persona_id'=>$resultPersonas['data']->id_persona

				));

			$response=array(
				"result"	=>true,
				"mensaje"	=>"Se guardaron los cambios Exitosamente",
				);
			$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));


		}

	
	}
}
