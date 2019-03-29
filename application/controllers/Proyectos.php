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
	$result=$this->datospersonasmodel->getDataPersona($this->input->post_get('cedula'));

	$this->output
        ->set_content_type('application/json')
		->set_output(json_encode($result));
		
	}

}

}

