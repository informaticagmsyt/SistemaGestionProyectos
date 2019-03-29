<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class parroquiasModel  extends CI_Model{


        

    function __construct(){

   
        parent::__construct();
  

    }
    

    function get($id_municipio){
    
      
        $this->db->select('id_parroquia, id_municipio, parroquia');
        $this->db->from('parroquias');
        $this->db->where('id_municipio', $id_municipio);
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

            $index[$i]["id"]=$row->id_parroquia;
            $index[$i]["parroquia"]=$row->parroquia;

            
         

          $i++;
          $obj->error=array("code"=>"","message"=>"");
         $obj->comments="Recurso encontrado exitosamente";

        }
        $obj->data=$index;


              return $obj;
           
        
    }

    
   
}