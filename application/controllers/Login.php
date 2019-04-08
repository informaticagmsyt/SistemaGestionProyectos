<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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

		$this->load->model('LoginModel');
			
		$this->load->helper('url');
	
	
	}

	public function index()
	{



		$this->load->view('login');

    }

    
	public function verificarUsuario()
	{
		if($this->LoginModel->verificar($this->input->post('cedula'),
																$this->input->post('clave'))){

																	echo json_encode( array("response"=>true));

																}else{
														
																	echo json_encode( array("response"=>false));
																}

    }
		function logout(){
			$this->session->unset_userdata('user_data');
			redirect('index.php/login');
    }
}
