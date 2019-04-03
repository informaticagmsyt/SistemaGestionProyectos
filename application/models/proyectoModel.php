<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class proyectoModel  extends CI_Model{


     

    function __construct(){

   
        parent::__construct();
   

    }
    

    public function findProyectosPersonas($cedula){


        $this->db->select('personas.id as id_persona, requerimientos.id as id_requerimiento, proyectos.id as id_proyectos');
        $this->db->from('personas');
      
        $this->db->join('requerimiento_persona',
        'personas.id=requerimiento_persona.persona_id','inner');

        $this->db->join('requerimientos',
        'requerimientos.id=requerimiento_persona.requerimiento_id','inner');

        $this->db->join('proyectos',
        'requerimientos.id=proyectos.requerimiento_id','inner');
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