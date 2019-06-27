<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Herramientas extends CI_Controller{

  function __construct(){
    parent::__construct();
    $this->load->library('session');
    if(!is_logged_in()){
      redirect('index.php/login');
      
    }
    $this->load->helper('url');
    $this->load->model('HerramientasModel');
  }

  function listarHerramientas(){
    //header('Access-Control-Allow-Origin: localhost:3000');
    //header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    //header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('content-type: application/json; charset=utf-8');

    $json = json_encode($this->HerramientasModel->listarHerramientas());
    echo $json;
  }

  function getHerramientas(){
    $json = json_encode($this->HerramientasModel->getHerramientas(4));
    echo $json;
  }

  function registrarHerramientas(){
    $dataComplementos = $this->input->post('data');
    $datajson= json_decode($dataComplementos);
    
    foreach ($datajson as $herramienta){
      $data = array(
        'conceptoHerramienta' => $herramienta->conceptoHerramienta,
        'precioherramientas'  => (float)$herramienta->precioherramientas,
        'cantidad'       => (int)$herramienta->cantidad
      );
      $result = $this->HerramientasModel->registrarHerramientas($data);
      echo $result;

    }

  }

  public function busquedaHerramientas(){

    $result=$this->HerramientasModel->busquedaHerramientas($this->input->post_get('codigo'));
  
    $this->output
          ->set_content_type('application/json')
          ->set_output(json_encode($result));
  }

}
?>