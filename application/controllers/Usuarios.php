<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Usuarios extends CI_Controller {
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
            $this->load->model('PersonasModel');
            $this->load->model('UsuariosModel');  
            if(!is_logged_in()){
                redirect('index.php/login');
            
            }
            $this->load->helper('url');
        }

        function nuevo(){
            $nombreUsuario = $this->session->userdata('user_data');
            $this->load->view('layout/header');
            $this->load->view('layout/nav');
            $User['nombreUser']=$nombreUsuario['nombre'];
            $this->load->view('layout/navar',$User);
            $this->load->view('layout/scriptjs');
            $this->load->view('usuarios/nuevo');
            $this->load->view('layout/footer');
        }

        function listado(){
            $nombreUsuario = $this->session->userdata('user_data');
            $this->load->view('layout/header');
            $this->load->view('layout/nav');
            $User['nombreUser']=$nombreUsuario['nombre'];
            $this->load->view('layout/navar',$User);

            $registros = $this->UsuariosModel->listar();
            $this->load->view('layout/scriptjs');
            $this->load->view('usuarios/listado',compact('registros'));
            
            $this->load->view('layout/footer');
        }
    }
?>