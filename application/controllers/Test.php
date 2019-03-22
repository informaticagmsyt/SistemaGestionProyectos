<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

        function __construct(){

			parent::__construct();
			$this->load->helper('mihelper');
			$this->load->helper('form');
			$this->load->model('testmodel');
        }


	public function index()
	{
		$this->load->library('menu',array('inicio','Contacto','cursos'));
		$data['mi_menu']=$this->menu->construirMenu();
		$dato['string']="Helloooo";
		$this->load->view('test/testView',$data);
	}

	public function recibirdatos()
	{
		$data =array ("nombre"=>$this->input->post('nombre'),
		"apellido"=>$this->input->post('apellido'),
		"email"=>$this->input->post('email'),
		"date",'NOW');

		$this->testmodel->crearUsuario($data);
	
	}
}
