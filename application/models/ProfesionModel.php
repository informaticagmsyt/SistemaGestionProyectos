<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class ProfesionModel  extends CI_Model{


        public $nombre;
        public $apellido;
        public $email;
        public $contra;

    function __construct(){

   
        parent::__construct();
        $this->load->library('session');

    }
    

    function getProfesion($prefesion){
    
      
        $search = $prefesion;
        $SCAPE="%' ESCAPE '!' LIMIT 5";
        $sql = "SELECT id_profesion, desc_profesion FROM profesion_oficio WHERE desc_profesion LIKE '%" 
        .$this->db->escape_like_str($search).$SCAPE;

        $query=$this->db->query($sql);
 
        $objeto = [];
        if ($query->num_rows() > 0) {
      

          
                $key=0;
                foreach ($query->result() as $row)
                {
                 
                
                    

                        $objeto[$key]['name']=$row->desc_profesion;
                        $objeto[$key]['id']=$row->id_profesion;
                      
                        $key++;
                                    
                }


              return  $mensaje = array('msj' => 'Registro Encontrado',
                'find' => true,
                'datos' => $prefesion,
                'obj' =>   $objeto);

           
        } else {
            
         return   $mensaje = array('msj' => 'Registro no Encontrado',
                    'find' => false,
                    'datos' => 0,
                    'obj' =>  $prefesion);

        }
    }

    
   
}