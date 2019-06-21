<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class ComplementoModel  extends CI_Model{

  function __construct(){
    parent::__construct();
  }
  //LISTADOS DE COMPLEMENTOS SEGUN SU TIPO

  function listarInsumos(){
    $this->db->select('*');
    $this->db->from('complementos');
    $this->db->where('id_tipo_complemento',1);
    $query = $this->db->get();
    return $query->result();
  }

  function listarHerramientas(){
    $this->db->select('*');
    $this->db->from('complementos');
    $this->db->where('id_tipo_complemento',2);
    $query = $this->db->get();
    return $query->result();
  }

  function listarMaquinas(){
    $this->db->select('*');
    $this->db->from('complementos');
    $this->db->where('id_tipo_complemento',3);
    $query = $this->db->get();
    return $query->result();
  }

  function listarMobiliario(){
    $this->db->select('*');
    $this->db->from('complementos');
    $this->db->where('id_tipo_complemento',4);
    $query = $this->db->get();
    return $query->result();
  }
  
  //OBTENCION DE COMPLEMENTO SEGUN SU TIPO

  function getInsumos($id){
    $this->db->select('*');
    $this->db->from('complementos');
    $this->db->where('id',$id);
    $this->db->where('id_tipo_complemento',1);
    $query = $this->db->get();
    return $query->result();
  }

  function getHerramientas($id){
    $this->db->select('*');
    $this->db->from('complementos');
    $this->db->where('id',$id);
    $this->db->where('id_tipo_complemento',2);
    $query = $this->db->get();
    return $query->result();
  }
  
  function getMaquinas($id){
    $this->db->select('*');
    $this->db->from('complementos');
    $this->db->where('id',$id);
    $this->db->where('id_tipo_complemento',3);
    $query = $this->db->get();
    return $query->result();
  }

  function getMobiliario($id){
    $this->db->select('*');
    $this->db->from('complementos');
    $this->db->where('id',$id);
    $this->db->where('id_tipo_complemento',4);
    $query = $this->db->get();
    return $query->result();
  }
  

  //REGISTRAR COMPLEMENTO SEGUN SU TIPO
  function registrarInsumos($data){
    $datos = array(
      'conceptoInsumo' => $data['conceptoInsumo'],
      'unidadmedida' => $data['unidadmedida'],
      'precioinsumos' => $data['precioinsumos'],
      'cantidad' => $data['cantidad']
    );
    return $datos;
  }

  function registrarHerramientas($data){
    $datos = array(
      'conceptoHerramienta' => $data['conceptoHerramienta'],
      'precioherramientas' => $data['precioherramientas'],
      'cantidad' => $data['cantidad']
    );
    return $datos;
  }

  function registrarMaquinas($data){
    $datos = array(
      'conceptoMaquina' => $data['conceptoMaquina'],
      'preciomaquinas' => $data['preciomaquinas'],
      'cantidad' => $data['cantidad']
    );

    return $query->result();
  }

  function registrarMobiliario($data){
    $datos = array(
      'conceptoMobiliario' => $data['conceptoMobiliario'],
      'preciomobiliarios' => $data['preciomobiliarios'],
      'cantidad' => $data['cantidad']
    );

    return $datos;
  }

}
?>