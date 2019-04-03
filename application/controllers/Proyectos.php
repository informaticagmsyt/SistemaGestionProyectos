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
		$this->load->model('proyectomodel');
		$this->load->model('profesionModel');
		$this->load->model('datospersonasmodel');
		$this->load->model('personasmodel');
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
		$this->load->view('requerimiento/requerimientoview');
		$this->load->view('layout/footer');
	}




public function registrar()
{
    $nombreUsuario = $this->session->userdata('user_data');
    $this->load->view('layout/header');
    $this->load->view('layout/nav');
    $User['nombreUser']=$nombreUsuario['nombre'];
    $this->load->view('layout/navar',$User);
    
    $this->load->view('layout/scriptjs');
    $this->load->view('proyectos/registrar');
    $this->load->view('layout/footer');
}


public function getProfesion(){

	$result=$this->profesionModel->getProfesion($this->input->post_get('codigo'));

	$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($result));

}

public function getDatosPersonasJSON(){

	if(!empty($this->input->post_get('cedula'))) { 

		//ver si tine prroyectos
		$resultProyectos=$this->proyectomodel->findProyectosPersonas($this->input->post('cedula'));
		if(!$resultProyectos['result']){

			$obj=$this->datospersonasmodel->getDataPersona($this->input->post_get('cedula'));

		}else{
			$obj = new stdClass;
			$obj->response=array(
                "status"=>"ok",
                "http_code"=>404
            );
           $obj->data=array(
         
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

	//ver si tine proyectos
	$resultProyectos=$this->proyectomodel->findProyectosPersonas($this->input->post('cedula'));
	if(!$resultProyectos['result']){

	//consultar si esta en la tabla personas
	$resultPersonas=$this->personasmodel->find($this->input->post('cedula'));

	//Actualizar
	if($resultPersonas['result']){

		
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
			'institucion_id'	=> 0,
			'principal'			=> true
			);

			
		$result=$this->personasmodel->actualizar($datos,$resultPersonas['data']->id);

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
		'profesion' 		=>$this->input->post('profesion'), 
		'institucion_id'	=>0,
		'principal'			=> true
		);

					$result=$this->personasmodel->registrar($datos);



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

}

