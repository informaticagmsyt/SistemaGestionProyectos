<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class MaquinasModel  extends CI_Model{

  private $id_maquina;

  function __construct(){
    parent::__construct();
    $this->id_maquina = 3;
  }

  function listarMaquinas(){
    $this->db->select('*');
    $this->db->from('complementos');
    $this->db->where('id_tipo_complemento',$this->id_maquina);
    $query = $this->db->get();
    return $query->result();
  }

  function getMaquinas($id){
    $this->db->select('*');
    $this->db->from('complementos');
    $this->db->where('id',$id);
    $this->db->where('id_tipo_complemento',$this->id_maquina);
    $query = $this->db->get();
    return $query->result();
  }

  function registrarMaquinas($data){
    $datos = array(
      'concepto' => $data['conceptoMaquina'],
      'precio' => $data['preciomaquinas'],
      'cantidad' => $data['cantidad'],
      'id_tipo_complemento' => $this->id_maquina,
      'id_proyecto' => 0
    );
    $result = $this->db->insert('proyecto_complementos',$datos);
    return $result;
  }
  
  function busquedaMaquinas($complemento){
  
    $search = $complemento;
    $SCAPE="%' ESCAPE '!' LIMIT 5";
    $sql = "SELECT id, descripcion FROM complementos WHERE id_tipo_complemento = $this->id_maquina AND descripcion LIKE '%" 
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