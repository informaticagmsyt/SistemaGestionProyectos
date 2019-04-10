<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Tutores extends CI_Controller {

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
            $this->load->model('TutoresModel');
            $this->load->model('PersonasModel');
            if(!is_logged_in()){
                redirect('index.php/login');
                
            }
            $this->load->helper('url');
        }

        public function listado(){
            
            $nombreUsuario = $this->session->userdata('user_data');
            $this->load->view('layout/header');
            $this->load->view('layout/nav');
            $User['nombreUser']=$nombreUsuario['nombre'];
            $this->load->view('layout/navar',$User);
            
            $this->load->view('layout/scriptjs');
            $registros = $this->TutoresModel->listar();
            $this->load->view('tutores/listado',compact('registros'));
            
            $this->load->view('layout/footer');
        }

        public function registrar(){
            
            $nombreUsuario = $this->session->userdata('user_data');
            $this->load->view('layout/header');
            $this->load->view('layout/nav');
            $User['nombreUser']=$nombreUsuario['nombre'];
            $this->load->view('layout/navar',$User);
            
            $this->load->view('layout/scriptjs');
            $this->load->view('tutores/registrar');
            $this->load->view('layout/footer');
        }

        public function registrarDatos(){
        
            $datos = array(
                'nacionaliidad' 	=> $this->input->post('nacionaliidad'),
                'nombres' 			=> $this->input->post('nombres'),
                'apellidos' 		=> $this->input->post('apellidos'),
                'email' 			=> $this->input->post('email'),
                'cedula'			=> $this->input->post('cedula'),
                'sexo' 				=> $this->input->post('sexo'),
                'direccion'			=>$this->input->post('direccion'),
                'estado_id' 		=> $this->input->post('estado_id'),
                'municipio_id' 		=> $this->input->post('municipio_id'),
                'parroquia_id' 		=>$this->input->post('parroquia_id'),
                'v_carnet' 			=>$this->input->post('v_carnet'),
                'v_social' 			=> $this->input->post('v_social'),
                'fecha_nac' 		=> $this->input->post('fecha_nac'), 
                'posee_carnet'		=>  $this->input->post('posee_carnet'), 
                'telefono'			=>  $this->input->post('telefono'), 
                'telefono2'			=>  $this->input->post('telefono2'), 
                'profesion' 		=>$this->input->post('profesion'), 
                'institucion_id'	=>0,
                'principal'			=> true
                );
            
            //Consultar si existe alguna persona ya registrada con la cedula ingresada
            $result = $this->PersonasModel->find($datos['cedula']);

            //en caso de que ya exista retornar false 
            if( $result['result'] == true){
                
                $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($result['result']));
            
            }else{               

                $result=$this->PersonasModel->registrar($datos);
                $result_perfil = $this->TutoresModel->registrar($result);
                $r  =  "ID_Persona:".$result."\nID_Perfil:".$result_perfil;
                
                $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($r));
    
            }
            
        }

        public function editar(){
            $data['segmento'] = $this->uri->segment(3);
            
            $nombreUsuario = $this->session->userdata('user_data');
            $this->load->view('layout/header');
            $this->load->view('layout/nav');
            $User['nombreUser']=$nombreUsuario['nombre'];
            $this->load->view('layout/navar',$User);
            $this->load->view('layout/scriptjs');

            
            if (!$data['segmento']) {  
                echo "<script>alert('Error')</script>";
              }else{
                $registro = $this->TutoresModel->obtener($data['segmento']);
                $this->load->view('tutores/editar',compact('registro'));
              }

            $this->load->view('layout/footer');
        }

        public function actualizarDatos(){
            $datos = array(
                'nombres' 			=> $this->input->post('nombres'),
                'apellidos' 		=> $this->input->post('apellidos'),
                'email' 			=> $this->input->post('email'),                
                'sexo' 				=> $this->input->post('sexo'),
                'direccion'			=>$this->input->post('direccion'),
                'estado_id' 		=> $this->input->post('estado_id'),
                'municipio_id' 		=> $this->input->post('municipio_id'),
                'parroquia_id' 		=>$this->input->post('parroquia_id'),
                'v_carnet' 			=>$this->input->post('v_carnet'),
                'v_social' 			=> $this->input->post('v_social'),
                'fecha_nac' 		=> $this->input->post('fecha_nac'), 
                'posee_carnet'		=>  $this->input->post('posee_carnet'), 
                'telefono'			=>  $this->input->post('telefono'), 
                'telefono2'			=>  $this->input->post('telefono2'), 
                'profesion' 		=>$this->input->post('profesion'), 
                'institucion_id'	=>0,
                'principal'			=> true
                );

            $id = $this->input->post('id');   
            $result=$this->PersonasModel->actualizar($datos,$id);
            //$result_perfil = $this->TutoresModel->registrar($result);
            //$r  =  "ID_Persona:".$result;
            
            $this->output
	        ->set_content_type('application/json')
            ->set_output(json_encode($result));
        }

        public function getJSON(){


        $registros = $this->TutoresModel->listar();
        $this->output
	        ->set_content_type('application/json')
            ->set_output(json_encode( $registros));
        }
    }

?>