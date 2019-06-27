<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class InsumosModel  extends CI_Model{

  private $id_insumo;

  function __construct(){
    parent::__construct();
    $this->id_insumo = 1;
  }

  function listarInsumos(){
    $this->db->select('*');
    $this->db->from('complementos');
    $this->db->where('id_tipo_complemento',$this->id_insumo);
    $query = $this->db->get();
    return $query->result();
  }

  function getInsumos($id){
    $this->db->select('*');
    $this->db->from('complementos');
    $this->db->where('id',$id);
    $this->db->where('id_tipo_complemento',$this->id_insumo);
    $query = $this->db->get();
    return $query->result();
  }

  function registrarInsumos($data){
    $datos = array(
      'concepto' => $data['conceptoInsumo'],
      'unidadMedida' => $data['unidadmedida'],
      'precio' => $data['precioinsumos'],
      'cantidad' => $data['cantidad'],
      'id_tipo_complemento' => $this->id_insumo,
      'id_proyecto' => 0
    );
    $result = $this->db->insert('proyecto_complementos',$datos);
    return $result;
  }

  function busquedaInsumos($complemento){
  
    $search = $complemento;
    $SCAPE="%') ESCAPE '!' LIMIT 5";
    $sql = "SELECT id, descripcion FROM complementos WHERE id_tipo_complemento = $this->id_insumo AND descripcion LIKE upper('%" 
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