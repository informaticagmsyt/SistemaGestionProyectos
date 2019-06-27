<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Maquinas extends CI_Controller{

  function __construct(){
    parent::__construct();
    $this->load->library('session');
    if(!is_logged_in()){
      redirect('index.php/login');
      
    }
    $this->load->helper('url');
    $this->load->model('MaquinasModel');
  }

  function listarMaquinas(){
    header('content-type: application/json; charset=utf-8');

    $json = json_encode($this->MaquinasModel->listarMaquinas());
    echo $json;
  }

  function getMaquinas(){
    $json = json_encode($this->MaquinasModel->getMaquinas(14));
    echo $json;
  }

  function registrarMaquinas(){
    $dataComplementos = $this->input->post('data');
    $datajson= json_decode($dataComplementos);
    
    foreach ($datajson as $maquina){
      $data = array(
        'conceptoMaquina' => $maquina->conceptoMaquina,
        'preciomaquinas'  => (float)$maquina->preciomaquinas,
        'cantidad'       => (int)$maquina->cantidad
      );
      $result = $this->MaquinasModel->registrarMaquinas($data);
      echo $result;
    }

  }

  public function busquedaMaquinas(){

    $result=$this->MaquinasModel->busquedaMaquinas($this->input->post_get('codigo'));
  
    $this->output
          ->set_content_type('application/json')
          ->set_output(json_encode($result));
  }
}

?>