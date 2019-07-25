<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Complementos extends CI_Controller{

  private $id_tipo_insumos;
  private $id_tipo_herramientas;
  private $id_tipo_maquinas;
  private $id_tipo_mobiliario;

  function __construct(){
    parent::__construct();
    $this->load->library('session');
    if(!is_logged_in()){
      redirect('index.php/login');
      
    }
    $this->load->helper('url');
    $this->load->model('ComplementosModel');

    $this->id_tipo_insumos = 1;
    $this->id_tipo_herramientas = 2;
    $this->id_tipo_maquinas = 3;
    $this->id_tipo_mobiliario = 4;
  }

  function registrarComplementos(){
    $dataComplementos = $this->input->post('data');
    $dataComplementos = json_decode($dataComplementos);
    $costos = array(
      'insumos' => 0,
      'herramientas' => 0,
      'maquinas' => 0,
      'mobiliario' => 0
    );

    $registrosInsumos = [];
    foreach ($dataComplementos->Insumos as $complemento){
      $datos = array(
        'concepto' => $complemento->conceptoInsumo,
        "unidadMedida" => $complemento->unidadmedida,
        'precio' => $complemento->precioinsumos,
        'cantidad' => $complemento->cantidad,
        'id_tipo_complemento' => $this->id_tipo_insumos,
        'id_proyecto' =>  $_SESSION['proyecto_id']
      );
      $result = $this->ComplementosModel->registrarComplementos($datos);
      array_push($registrosInsumos,$result);

      $costos['insumos'] = $costos['insumos'] + ($complemento->precioinsumos * $complemento->cantidad); 
    }

    $registrosHerramientas = [];
    foreach ($dataComplementos->Herramientas as $complemento){
      $datos = array(
        'concepto' => $complemento->conceptoHerramienta,
        "unidadMedida" => "",
        'precio' => $complemento->precioherramientas,
        'cantidad' => $complemento->cantidad,
        'id_tipo_complemento' => $this->id_tipo_herramientas,
        'id_proyecto' =>  $_SESSION['proyecto_id']
      );
      $result = $this->ComplementosModel->registrarComplementos($datos);
      array_push($registrosHerramientas,$result);

      $costos['herramientas'] = $costos['herramientas'] + ($complemento->precioherramientas * $complemento->cantidad); 
   }

   $registrosMaquinas = [];
    foreach ($dataComplementos->Maquinas as $complemento){
      $datos = array(
        'concepto' => $complemento->conceptoMaquina,
        "unidadMedida" => "",
        'precio' => $complemento->preciomaquinas,
        'cantidad' => $complemento->cantidad,
        'id_tipo_complemento' => $this->id_tipo_maquinas,
        'id_proyecto' =>  $_SESSION['proyecto_id']
      );
      $result = $this->ComplementosModel->registrarComplementos($datos);
      array_push($registrosMaquinas,$result);

      $costos['maquinas'] = $costos['maquinas'] + ($complemento->preciomaquinas * $complemento->cantidad); 
   }

   $registrosMobiliario = [];
    foreach ($dataComplementos->Mobiliario as $complemento){
      $datos = array(
        'concepto' => $complemento->conceptoMobiliario,
        "unidadMedida" => "",
        'precio' => $complemento->preciomobiliarios,
        'cantidad' => $complemento->cantidad,
        'id_tipo_complemento' => $this->id_tipo_mobiliario,
        'id_proyecto' =>  $_SESSION['proyecto_id']
      );
      $result = $this->ComplementosModel->registrarComplementos($datos);
      array_push($registrosMobiliario,$result);

      $costos['mobiliario'] = $costos['mobiliario'] + ($complemento->preciomobiliarios * $complemento->cantidad); 
    }

    $registros = array(
      "Insumos" => $registrosInsumos,
      "Herramientas" => $registrosHerramientas,
      "Maquinas" => $registrosMaquinas,
      "Mobiliario" => $registrosMobiliario
    );

    $obj = new stdClass;
    $obj->Complementos_Registrados = $registros;
    $obj->Costos_generales_complementos = $costos;
    $obj->status = true;
    $this->output->set_content_type('application/json')->set_output(json_encode($obj));
  }
  
  /**
   * ===============================================================
   * LISTAR COMPLEMENTOS, Y LISTAR SEGUN SU TIPO DE COMPLEMENTO
   * ===============================================================
   */

  function listar_todos(){
    $result = $this->ComplementosModel->listar_todos();
    $this->output->set_content_type('application/json')->set_output(json_encode($result));
  }

  function listar_insumos(){
    $result = $this->ComplementosModel->listar_tipo($this->id_tipo_insumos);
    $this->output->set_content_type('application/json')->set_output(json_encode($result));
  }

  function listar_herramientas(){
    $result = $this->ComplementosModel->listar_tipo($this->id_tipo_herramientas);
    $this->output->set_content_type('application/json')->set_output(json_encode($result));
  }

  function listar_maquinas(){
    $result = $this->ComplementosModel->listar_tipo($this->id_tipo_maquinas);
    $this->output->set_content_type('application/json')->set_output(json_encode($result));
  }

  function listar_mobiliario(){
    $result = $this->ComplementosModel->listar_tipo($this->id_tipo_mobiliario);
    $this->output->set_content_type('application/json')->set_output(json_encode($result));
  }

   /**
   * ===============================================================
   *        BUQUEDA DE LOS TIPOS DE COMPLEMENTOS
   * ===============================================================
   */

  public function busquedaInsumos(){

    $result=$this->ComplementosModel->busquedaComplementos(
      $this->input->post_get('codigo'),
      $this->id_tipo_insumos
    );
  
    $this->output
          ->set_content_type('application/json')
          ->set_output(json_encode($result));
  }

  public function busquedaHerramientas(){

    $result=$this->ComplementosModel->busquedaComplementos(
      $this->input->post_get('codigo'),
      $this->id_tipo_herramientas
    );
  
    $this->output
          ->set_content_type('application/json')
          ->set_output(json_encode($result));
  }

  public function busquedaMaquinas(){

    $result=$this->ComplementosModel->busquedaComplementos(
      $this->input->post_get('codigo'),
      $this->id_tipo_maquinas
    );
  
    $this->output
          ->set_content_type('application/json')
          ->set_output(json_encode($result));
  }

  public function busquedaMobiliario(){

    $result=$this->ComplementosModel->busquedaComplementos(
      $this->input->post_get('codigo'),
      $this->id_tipo_mobiliario
    );
  
    $this->output
          ->set_content_type('application/json')
          ->set_output(json_encode($result));
  }

}