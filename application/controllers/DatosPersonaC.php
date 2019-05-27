<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DatosPersonaC extends CI_Controller {

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

		$this->load->model('DatosPersonasmodel');
		if(!is_logged_in()){
			redirect('index.php/login');
			
		}
	}


	public function index(){
	

	}





public function findJSON(){
		//devuelve un objeto JSON para consumir por AJAX
	if(!empty($this->input->post_get('cedula'))) { 

		
	$result=$this->DatosPersonasmodel->getDataPersona($this->input->post_get('cedula'));

	$this->output
        ->set_content_type('application/json')
		->set_output(json_encode($result));
	
	}	

	}

	public function find(){

		if(!empty($this->input->post_get('cedula'))) { 
		$result=$this->DatosPersonasmodel->getDataPersona($this->input->post_get('cedula'));
			
		//devuelve un objeto array para consumir por PHP
		//echo $result->data['nombres'];
			return $result;

		}

	}
}