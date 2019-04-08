<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class ProyectoModel  extends CI_Model{


     

    function __construct(){

   
        parent::__construct();
   
 
    }
     

    public function findProyectosPersonas($cedula){


        $this->db->select('personas.id as id_persona, requerimientos.id as id_requerimiento');
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


    public function getAll(){


        $this->db->select('requerimientos.descripcion, codcaso,  proyectos.nombre as nombre_proyecto,categoria.descripcion as categoria,
        sub_categoria.descripcion as subcategoria, nombres, apellidos,
         personas.id as id_persona, requerimientos.id as id_requerimiento');
        $this->db->from('personas');
      
        $this->db->join('requerimiento_persona',
        'personas.id=requerimiento_persona.persona_id','inner');


        $this->db->join('requerimientos',
        'requerimientos.id=requerimiento_persona.requerimiento_id','inner');
      
        $this->db->join('categoria',
        'categoria.id=categoria_id','inner');

              
        $this->db->join('sub_categoria',
        'sub_categoria.id=sub_categoria_id','inner');

       $this->db->join('proyectos',
        'requerimientos.id=proyectos.requerimiento_id','inner');
     

        $query = $this->db->get();


        $row=$query->row();
        $index=array(); 
        $i=0;
        foreach ($query->result() as $row)
        {


            $index[]=$row;
   
         
       

        }
        if ($query->num_rows() > 0) {

            $response=array(
				"result"	=>true,
				"data"	=> $index,
			);

        }else{

            $response=array(
				"result"	=>false,
				"data"	=>null
			);
        }

        return $response;

    }
    
   
       public function registrar($data){
 


        $this->db->insert('proyectos',$data);

        //retorna el id
        return $this->db->insert_id();
        
    }



        
    function update($data,$id){

        $this->db->set($data);
        $this->db->where('id', $id);
       return $this->db->update('proyectos');

        }
    

    function getEstatusProyecto(){
    
      
        $this->db->select('*');
        
        $this->db->from('estatus_proyecto');
        
       
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
   
         

          $i++;
     

        }
        $obj->data=$index;


              return $obj;
           
        
    }
}