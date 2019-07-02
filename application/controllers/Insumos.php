<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Insumos extends CI_Controller{

  function __construct(){
    parent::__construct();
    $this->load->library('session');
    if(!is_logged_in()){
      redirect('index.php/login');
      
    }
    $this->load->helper('url');
    $this->load->model('InsumosModel');
  }

  function listarInsumos(){
    header('content-type: application/json; charset=utf-8');

    $json = json_encode($this->InsumosModel->listarInsumos());
    echo $json;
  }

  function getInsumos(){
    $json = json_encode($this->InsumosModel->getInsumos(3));
    echo $json;
  }

  function registrarInsumos(){
    $dataComplementos = $this->input->post('data');
    $datajson= json_decode($dataComplementos);
    foreach ($datajson as $insumo){
      $data = array(
        'conceptoInsumo' => $insumo->conceptoInsumo,
        'unidadmedida'   => $insumo->unidadmedida,
        'precioinsumos'  => (float)$insumo->precioinsumos,
        'cantidad'       => (int)$insumo->cantidad,
        'id_proyecto' => $_SESSION['proyecto_id']
      );
      $result = $this->InsumosModel->registrarInsumos($data);
      echo $result;
    }

  }
  
  public function busquedaInsumos(){

    $result=$this->InsumosModel->busquedaInsumos($this->input->post_get('codigo'));
  
    $this->output
          ->set_content_type('application/json')
          ->set_output(json_encode($result));
  }

}
?>