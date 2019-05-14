<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tareas extends CI_Controller {

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
		$this->load->view('tareas/listarView');
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



		

		public function getAllProyecto(){
			$response=	$this->ProyectoModel->getAll('tutor');

			$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
			
		
		}


		
public function  nueva(){

 $id=$data['segmento'] = $this->uri->segment(3);
if(!empty( $id)){

	
    $nombreUsuario = $this->session->userdata('user_data');
    $this->load->view('layout/header');
    $this->load->view('layout/nav');
    $User['nombreUser']=$nombreUsuario['nombre'];
    $this->load->view('layout/navar',$User);
    
    $this->load->view('layout/scriptjs');
    $this->load->view('tareas/nuevaView');

}else{
	redirect('/tareas');

}

}


	


}

