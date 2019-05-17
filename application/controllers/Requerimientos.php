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
	
		$this->load->library('session');
		$this->load->model('RequerimientosModel');
        $this->load->model('PersonasModel');
		if(!is_logged_in()){
			redirect('index.php/login');
			
		}
	}
	/**END FUCTION CONSTRUCT**/

	public function registrar()
	{
		$nombreUsuario = $this->session->userdata('user_data');
		$this->load->view('layout/header');
		$this->load->view('layout/nav');
		$User['nombreUser']=$nombreUsuario['nombre'];
		$this->load->view('layout/navar',$User);
		$this->load->view('layout/scriptjs');
		$this->load->view('requerimiento/registrar');

	}
	/**END FUCTION REGISTRAR**/

	public function  regitrarPaso1()
	{

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
	/**END FUNCTION REGISTRARPASO1**/

	public function registrarPaso2()
	{
	
	}

	public function consultar()
	{
		$nombreUsuario = $this->session->userdata('user_data');
		$this->load->view('layout/header');
		$this->load->view('layout/nav');
		$User['nombreUser']=$nombreUsuario['nombre'];
		$this->load->view('layout/navar',$User);
		$this->load->view('layout/scriptjs');
		$this->load->view('requerimiento/consultar');
	}
	/**END FUNCTION CONSULTAR**/
}
/**END CLASS**/