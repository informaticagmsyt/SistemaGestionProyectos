<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class estadosModel  extends CI_Model{


        

    function __construct(){

   
        parent::__construct();
  

    }
    

    function get(){
    
      
        $this->db->select(' id_estado, estado');
        $this->db->from('estados');
       
     $query = $this->db->get();

        $row=$query->row();
        $obj = new stdClass;
        
  
 
        $index=array(); 
        $i=0;      
        foreach ($query->result() as $row)
        {
      

            $obj->response=array(
                "status"=>"ok",
                "http_code"=>200
            );

            $index[$i]["id"]=$row->id_estado;
            $index[$i]["estado"]=$row->estado;

            
         

          $i++;
          $obj->error=array("code"=>"","message"=>"");
         $obj->comments="Recurso encontrado exitosamente";

        }
        $obj->data=$index;


              return $obj;
           
        
    }

    
   
}