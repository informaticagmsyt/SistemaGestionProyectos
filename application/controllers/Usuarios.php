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

        public function registrarPersona(){
        
            $datos = array(
                'nacionaliidad' 	=>  $this->input->post('nacionaliidad'),
                'nombres' 			=>  $this->input->post('nombres'),
                'apellidos' 		=>  $this->input->post('apellidos'),
                'email' 			=>  $this->input->post('email'),
                'cedula'			=>  $this->input->post('cedula'),
                'sexo' 				=>  $this->input->post('sexo'),
                'direccion'			=>  $this->input->post('direccion'),
                'estado_id' 		=>  $this->input->post('estado_id'),
                'municipio_id' 		=>  $this->input->post('municipio_id'),
                'parroquia_id' 		=>  $this->input->post('parroquia_id'),
                'v_carnet' 			=>  "",
                'v_social' 			=>  "",
                'fecha_nac' 		=>  $this->input->post('fecha_nac'), 
                'posee_carnet'		=>  "", 
                'telefono'			=>  $this->input->post('telefono'), 
                'telefono2'			=>  $this->input->post('telefono2'), 
                'profesion' 		=>  "", 
                'institucion_id'	=>  $this->input->post('institucion_id'),
                'cargo'             =>  $this->input->post('cargo'),
                'principal'			=>  true
                );
            
            //Consultar si existe alguna persona ya registrada con la cedula ingresada
            $result = $this->PersonasModel->find($datos['cedula']);

            //en caso de que ya exista retornar false 
            if( $result['result'] == true){
                
                $this->output
                ->set_output($result['result']);            
            }else{               

                //*
                $result=$this->PersonasModel->registrar($datos);
                $r  =  "ID_Persona: ".$result."<br>"."Cedula: ".$datos['cedula'];
                
                $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($r));
                /**/
            }
            
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


        function getPerfiles(){
            $result=$this->UsuariosModel->perfiles();

	        $this->output
            ->set_content_type('application/json')
		    ->set_output(json_encode($result));
        }

        function registrar(){
            $result = $this->PersonasModel->find($this->input->post('usuario'));
            $row = $result['data'];
            //var_dump($row);
            $datos = array (
                "cedula" =>  $this->input->post('usuario'),
                "clave" =>  $this->input->post('clave'),
                "personas_id" => $row->id,
                "estatus" =>  true
            );

            $res = $this->UsuariosModel->find($datos['cedula']);
            if($res['result'] != true){
            $this->UsuariosModel->registrarPersona_perfil($row->id); 
            $r = $this->UsuariosModel->registrarUsuario($datos);

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($r));
            }else{
                $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(false));
            }
        }

        
    }
?>