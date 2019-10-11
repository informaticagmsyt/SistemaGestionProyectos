<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class ComplementosModel  extends CI_Model{

  function __construct(){
    parent::__construct();
  }

  function registrarComplementos($data){
    $datos = array(
      'concepto' => $data['concepto'],
      "unidadMedida" => $data['unidadMedida'],
      'precio' => $data['precio'],
      'cantidad' => $data['cantidad'],
      'id_tipo_complemento' => $data['id_tipo_complemento'],
      'id_proyecto' => $data['id_proyecto']
    );
    $result = $this->db->insert('proyecto_complementos',$datos);
    $obj = new stdClass;
    if($result){
      $obj->complemento = $data['concepto'];
      $obj->status = "registrado";
      return $obj;
    }else{
      $obj->complemento = $data['concepto'];
      $obj->status = "Error al registrar";
      return $obj;
    }
    
  }

  function listar_todos(){
    $this->db->select('*');
    $this->db->from('complementos');
    $query = $this->db->get();
    return $query->result();
  }

  function listar_tipo($id){
    $this->db->select('*');
    $this->db->from('complementos');
    $this->db->where('id_tipo_complemento',$id);
    $query = $this->db->get();
    return $query->result();
  }

  function listar_mano_obra($id){
    $this->db->select('*');
    $this->db->from('personal_proyecto');
    $this->db->where('id_proyecto',$id);
    $query = $this->db->get();
    return $query->result();
  }
  function busquedaComplementos($complemento,$id){
  
    $search = $complemento;
    $SCAPE="%') ESCAPE '!' LIMIT 5";
    $sql = "SELECT id, descripcion FROM complementos WHERE id_tipo_complemento = '$id' AND descripcion LIKE upper('%"
    .$this->db->escape_like_str($search).$SCAPE;

    $query=$this->db->query($sql);

    $objeto = [];
    
    if ($query->num_rows() > 0) {
        
      $key=0;
      foreach ($query->result() as $row){

        $objeto[$key]['name']=$row->descripcion;
        $objeto[$key]['id']=$row->id;
        $key++;
                                
      }
      return  $mensaje = array('msj' =>
      'Registro Encontrado',
        'find' => true,
        'datos' => $complemento,
        'obj' =>   $objeto);

    } else {
        
      return $mensaje = array('msj' =>
        'Registro no Encontrado',
        'find' => false,
        'datos' => 0,
        'obj' =>  $complemento);

    }
  }
 
  function getComplementosProyectoId($id){
    $this->db->select('proyecto_complementos.*, tipos_complementos.descripcion as nombrecomplemento');
    $this->db->from('proyecto_complementos');
    $this->db->join('proyectos',
    'proyecto_complementos.id_proyecto=proyectos.id','inner');
    $this->db->join('tipos_complementos',
    'tipos_complementos.id=id_tipo_complemento','inner'); 
    $this->db->where('proyectos.requerimiento_id',$id);
    $query = $this->db->get();
    
    $row=$query->row();
    $index=array(); 
    
    foreach ($query->result() as $row){
      $index[]=$row;
    }
    if ($query->num_rows() > 0) {

      $response=array(
      "result"	=>true,
      "data"	=> $index,
      );

    }else{

      $response=array(
        "result"	=>false,
        "data"	=>null
      );

    }

    return $response;
  }

}