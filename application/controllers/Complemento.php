<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Complemento extends CI_Controller{
  
    function __construct(){
      parent::__construct();
      $this->load->library('session');
      if(!is_logged_in()){
        redirect('index.php/login');
        
      }
      $this->load->helper('url');
      $this->load->model('ComplementoModel');
    }

    function listarInsumos(){
      $json = json_encode($this->ComplementoModel->listarInsumos());
      echo $json;
    }

    function listarHerramientas(){
      //header('Access-Control-Allow-Origin: localhost:3000');
      //header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
      //header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
      header('content-type: application/json; charset=utf-8');

      $json = json_encode($this->ComplementoModel->listarHerramientas());
      echo $json;
    }

    function listarMaquinas(){
      $json = json_encode($this->ComplementoModel->listarMaquinas());
      echo $json;
    }

    function listarMobiliario(){
      $json = json_encode($this->ComplementoModel->listarMobiliario());
      echo $json;
    }

    function getInsumos(){
      $json = json_encode($this->ComplementoModel->getInsumos(3));
      echo $json;
    }

    function getHerramientas(){
      $json = json_encode($this->ComplementoModel->getHerramientas(4));
      echo $json;
    }

    function getMaquinas(){
      $json = json_encode($this->ComplementoModel->getMaquinas(14));
      echo $json;
    }

    function getMobiliario(){
      $json = json_encode($this->ComplementoModel->getMobiliario(5));
      echo $json;
    }

    function registrarInsumos(){
      $dataComplementos = $this->input->post('data');
      $datajson= json_decode($dataComplementos);
      
      foreach ($datajson as $insumo){
        $data = array(
          'conceptoInsumo' => $insumo->conceptoInsumo,
          'unidadmedida'   => $insumo->unidadmedida,
          'precioinsumos'  => $insumo->precioinsumos,
          'cantidad'       => $insumo->cantidad
        );
        $result = $this->ComplementoModel->registrarInsumos($data);
        echo $result;
      }

    }

    function registrarHerramientas(){
      $dataComplementos = $this->input->post('data');
      $datajson= json_decode($dataComplementos);
      
      foreach ($datajson as $herramienta){
        $data = array(
          'conceptoHerramienta' => $herramienta->conceptoHerramienta,
          'precioherramientas'  => $herramienta->precioherramientas,
          'cantidad'       => $herramienta->cantidad
        );
        $result = $this->ComplementoModel->registrarHerramientas($data);
        echo $result;

      }

    }

    function registrarMaquinas(){
      $dataComplementos = $this->input->post('data');
      $datajson= json_decode($dataComplementos);
      
      foreach ($datajson as $maquina){
        $data = array(
          'conceptoMaquina' => $maquina->conceptoMaquina,
          'preciomaquinas'  => $maquina->preciomaquinas,
          'cantidad'       => $maquina->cantidad
        );
        $result = $this->ComplementoModel->registrarMaquinas($data);
        echo $result;
      }

    }

    function registarMobiliario(){
      $dataComplementos = $this->input->post('data');
      $datajson= json_decode($dataComplementos);
      
      foreach ($datajson as $mobiliario){
        $data = array(
          'conceptoMobiliario' => $mobiliario->conceptoMobiliario,
          'preciomobiliarios'  => $mobiliario->preciomobiliarios,
          'cantidad'       => $mobiliario->cantidad
        );
        $result = $this->ComplementoModel->registrarMobiliario($data);
        echo $result;
      }

    }
}

?>