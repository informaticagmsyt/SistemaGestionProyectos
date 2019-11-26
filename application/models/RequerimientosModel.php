<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class RequerimientosModel  extends CI_Model{


      

    function __construct(){

   
        parent::__construct();
   

    }
    
        
    public function registrar($data){


    $this->db->insert('requerimientos',$data);

    //retorna el id
    return $this->db->insert_id();

        
    }
 
    public function requerimientoPersona($data){


        $this->db->insert('requerimiento_persona',$data);
    
        //retorna el id
         return $this->db->insert_id();
    
            
        }

        function update($data,$id){

        $this->db->set($data);
        $this->db->where('id', $id);
       return $this->db->update('requerimientos');

        }


    function categoriaGet($id){
    
      
        $this->db->select('*');
        $this->db->from('categoria');
        $this->db->where('requerimiento_id', $id);
     $query = $this->db->get();

        $row=$query->row();
        $obj = new stdClass;
        
  
 
        $index=array(); 
        $i=0;      
        foreach ($query->result() as $row)
        {
      

            $obj->response=true;

            $index[$i]["id"]=$row->id;
            $index[$i]["descripcion"]=$row->descripcion;
            $index[$i]["requerimiento_id"]=$row->requerimiento_id;
         

          $i++;
     

        }
        $obj->data=$index;


              return $obj;
           
        
    }

    public function getAllRequerimientos(){

$query="SELECT  requerimientos.id, categoria.descripcion as categoria, requerimientos.descripcion, personas.direccion,
categoria_id, sub_categoria_id, ente_id, personas.estado_id, personas.municipio_id, 
personas.parroquia_id, estatus_id, accion_id, ciudad, tutor_id, user_id,  nombres, apellidos,personas.cedula,
codcaso, origen_id, fecha_creacion, fecha_actualizacion, estado,municipio,parroquia,  categoria.requerimiento_id as idrq
FROM public.requerimientos

INNER JOIN categoria ON 

categoria_id=categoria.id

INNER JOIN requerimiento_persona ON 

requerimientos.id=requerimiento_persona.requerimiento_id

INNER JOIN personas ON 
personas.id=requerimiento_persona.persona_id

INNER JOIN estados ON
estados.id_estado=personas.estado_id

INNER JOIN municipios ON
municipios.id_municipio=personas.municipio_id

INNER JOIN parroquias ON 
parroquias.id_parroquia=personas.parroquia_id
WHERE categoria.requerimiento_id =2
";

$query = $this->db->query($query);

return $query->result() ;

    }

    function getSubCategoria($id){
    
      
        $this->db->select('*');
        $this->db->where('categoria_id', $id);
        $this->db->from('sub_categoria');
        
       
     $query = $this->db->get();

        $row=$query->row();
        $obj = new stdClass;
        
  
 
        $index=array(); 
        $i=0;      
        foreach ($query->result() as $row)
        {
      

            $obj->response=true;

            $index[$i]["id"]=$row->id;
            $index[$i]["descripcion"]=$row->descripcion;
            $index[$i]["categoria_id"]=$row->categoria_id;
         

          $i++;
     

        }
        $obj->data=$index;


              return $obj;
           
        
    }


    function generarCodigoCaso(){

        $this->db->select_max('id');
        $query = $this->db->get('requerimientos'); 
        $row=$query->row();
        $fecha=date("dmys");
       $idf= $row->id+1;
        $id=str_pad( $idf, 6, "0", STR_PAD_LEFT);

        $codigoCaso=array("codigoCaso"=>"CAS-".$fecha.$id);
      return $codigoCaso;
    }

    public function findRequerimientoPersonas($cedula){


      $this->db->select('personas.id as id_persona');
      $this->db->from('personas');
    
      

      $this->db->where('cedula', $cedula);
   

      $query = $this->db->get();


      $row=$query->row();
      if ($query->num_rows() > 0) {

          $response=array(
      "result"	=>true,
      "data"	=>$row
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