<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobiliario extends CI_Controller{
  
    function __construct(){
      parent::__construct();
      $this->load->library('session');
      if(!is_logged_in()){
        redirect('index.php/login');
        
      }
      $this->load->helper('url');
      $this->load->model('MobiliarioModel');
    }

    function listarMobiliario(){
      header('content-type: application/json; charset=utf-8');

      $json = json_encode($this->MobiliarioModel->listarMobiliario());
      echo $json;
    }

    function getMobiliario(){
      $json = json_encode($this->MobiliarioModel->getMobiliario(5));
      echo $json;
    }

    function registarMobiliario(){
      $dataComplementos = $this->input->post('data');
      $datajson= json_decode($dataComplementos);
      
      foreach ($datajson as $mobiliario){
        $data = array(
          'conceptoMobiliario' => $mobiliario->conceptoMobiliario,
          'preciomobiliarios'  => (float)$mobiliario->preciomobiliarios,
          'cantidad'       => (int)$mobiliario->cantidad,
          'id_proyecto' => $_SESSION['proyecto_id']
        );
        $result = $this->MobiliarioModel->registrarMobiliario($data);
        echo $result;
      }

    }

    public function busquedaMobiliario(){

      $result=$this->MobiliarioModel->busquedaMobiliario($this->input->post_get('codigo'));
    
      $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($result));
    }
}