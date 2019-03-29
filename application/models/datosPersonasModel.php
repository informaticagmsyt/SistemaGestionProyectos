<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class datosPersonasModel  extends CI_Model{


        

    function __construct(){

   
        parent::__construct();
  

    }
    

    function getDataPersona($cedula){
    
      
        $this->db->select('nacionalidad, cedula, pais_origen, nacionalidad2, tx_primer_nombre, 
        tx_segundo_nombre, tx_primer_apellido, tx_segundo_apellido, fec_nacimiento, 
        fec_registro, codigo_objecion, codigo_oficina, edo_civil, naturalizado, 
        sexo');
        $this->db->from('datos_personas');
      
 
        $this->db->where('cedula', $cedula);


        $query = $this->db->get();

        $row=$query->row();
        $obj = new stdClass;
        
  
        if ($query->num_rows() > 0) {
      
            $obj->response=array(
                "status"=>"ok",
                "http_code"=>200
            );
           $obj->data=array(
            "nacionalidad"=>$row->nacionalidad,
            "cedula"=>$row->cedula,
            "nombres"=>$row->tx_primer_nombre." ".$row->tx_segundo_nombre,
            "apellidos"=>$row->tx_primer_apellido." ".$row->tx_segundo_apellido,
            "fec_nacimiento"=>$row->fec_nacimiento,
            "sexo"=>$row->sexo,
          );
          $obj->error=array("code"=>"","message"=>"");
         $obj->comments="Recurso encontrado exitosamente";

             

              return $obj;
           
        } else {
            
            $obj->response=array(
                "status"=>"Not Found",
                "http_code"=>404
            );
           $obj->data=array();
           $obj->error=array("code"=>"","message"=>"");
           $obj->comments="No se encotraron resultados";
           return $obj;

        }
    }

    
   
}