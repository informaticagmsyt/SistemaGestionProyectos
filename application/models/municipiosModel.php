<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class MunicipiosModel  extends CI_Model{


         

    function __construct(){

   
        parent::__construct();
   

    }
    

    function get($id_estado){
    
       
        $this->db->select('id_municipio, id_estado, municipio');
         $this->db->from('municipios');
        $this->db->where('id_estado', $id_estado);
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

            $index[$i]["id"]=$row->id_municipio;
            $index[$i]["municipio"]=$row->municipio;

            
         

          $i++;
          $obj->error=array("code"=>"","message"=>"");
         $obj->comments="Recurso encontrado exitosamente";

        }
        $obj->data=$index;


              return $obj;
           
        
    }

    
   
}