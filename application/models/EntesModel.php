<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class EntesModel  extends CI_Model{


        

    function __construct(){

   
        parent::__construct();
   

    }
    

    function get(){
    
       
        $this->db->select('id, descripcion');
         $this->db->from('entes');

         $query = $this->db->get();
 
       
        $obj = new stdClass;
        
  
 
        $index=array(); 
        $i=0;      
        foreach ($query->result() as $row)
        {
      

            $obj->response=array(
                "status"=>"ok",
                "http_code"=>200
            );

            $index[$i]["id"]=$row->id;
            $index[$i]["descripcion"]=$row->descripcion;

            
         

          $i++;
          $obj->error=array("code"=>"","message"=>"");
         $obj->comments="Recurso encontrado exitosamente";

        }
        $obj->data=$index;


              return $obj;
           
        
    }

    
   
}