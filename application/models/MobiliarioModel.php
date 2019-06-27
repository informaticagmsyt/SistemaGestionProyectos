<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class MobiliarioModel  extends CI_Model{
  
  private $id_mobiliario;

  function __construct(){
    parent::__construct();
    $this->id_mobiliario = 4;
  }
  
  function listarMobiliario(){
    $this->db->select('*');
    $this->db->from('complementos');
    $this->db->where('id_tipo_complemento',$this->id_mobiliario);
    $query = $this->db->get();
    return $query->result();
  }

  function getMobiliario($id){
    $this->db->select('*');
    $this->db->from('complementos');
    $this->db->where('id',$id);
    $this->db->where('id_tipo_complemento',$this->id_mobiliario);
    $query = $this->db->get();
    return $query->result();
  }

  function registrarMobiliario($data){
    $datos = array(
      'concepto' => $data['conceptoMobiliario'],
      'precio' => $data['preciomobiliarios'],
      'cantidad' => $data['cantidad'],
      'id_tipo_complemento' => $this->id_mobiliario,
      'id_proyecto' => 0
    );
    $result = $this->db->insert('proyecto_complementos',$datos);
    return $result;
  }

  function busquedaMobiliario($complemento){
  
    $search = $complemento;
    $SCAPE="%' ESCAPE '!' LIMIT 5";
    $sql = "SELECT id, descripcion FROM complementos WHERE id_tipo_complemento = $this->id_mobiliario AND descripcion LIKE '%" 
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

}

?>