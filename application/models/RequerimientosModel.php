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


    function categoriaGet(){
    
      
        $this->db->select('*');
        $this->db->from('categoria');
       
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

}