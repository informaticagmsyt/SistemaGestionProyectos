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


    public function getAll($param='ALL'){

            $session = $this->session->userdata('user_data');
            

        $this->db->select(' requerimientos.descripcion, telefono,telefono2, personas.direccion, entes.descripcion as institucion, codcaso, estado,municipio,parroquia, 
        proyectos.nombre as nombre_proyecto,estatus_proyecto.descripcion as estatus_proyecto,
        
        categoria.descripcion as categoria,proyectos.*,
        sub_categoria.descripcion as subcategoria, nombres, apellidos,
         personas.id as id_persona,personas.email, requerimientos.id as id_requerimiento');
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

        $this->db->join('estados',
        'estados.id_estado=requerimientos.estado_id','inner');

        $this->db->join('municipios',
        'municipios.id_municipio=requerimientos.municipio_id','inner');

        $this->db->join('parroquias',
        'parroquias.id_parroquia=requerimientos.parroquia_id','inner');

        $this->db->join('estatus_proyecto',
        'estatus_proyecto.id=estatus_proyecto_id','inner');
     
        $this->db->join('entes','ente_id=entes.id','inner');
       
        $this->db->where('principal', true);

        if($param<>'ALL'){

            $this->db->where('personas.id', $session['personas_id']);
        }

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

    public function registrarPersonal($data){
       $result = $this->db->insert('personal_proyecto',$data);
        
        $obj = new stdClass;
        if($result){
            $obj->registrado = true;
        }else{
            $obj->registrado = false;
        }
          
        return $obj;
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




    public function getProyectoId($id){


        $this->db->select("proyectos.id as proyecto_id, ente_id, entes.descripcion as institucion, to_char(requerimientos.fecha_creacion, 'DD-MM-YYYY ') as fecha, requerimiento_persona.requerimiento_id, requerimientos.descripcion,requerimientos.categoria_id,tutor_id,requerimientos.sub_categoria_id, personas.*,codcaso,  proyectos.*,
        categoria.descripcion as categoria,estado,municipio,parroquia,
        sub_categoria.descripcion as subcategoria, nombres, apellidos,estatus_proyecto.descripcion as estatus_proyecto,
         personas.id as id_persona, requerimientos.id as id_requerimiento");
        $this->db->from('personas');
      
        $this->db->join('requerimiento_persona',
        'personas.id=requerimiento_persona.persona_id','inner');


        $this->db->join('requerimientos',
        'requerimientos.id=requerimiento_persona.requerimiento_id','inner');
      
        $this->db->join('categoria',
        'categoria.id=categoria_id','inner');

              
        $this->db->join('estados',
        'estados.id_estado=requerimientos.estado_id','inner');

        $this->db->join('municipios',
        'municipios.id_municipio=requerimientos.municipio_id','inner');

        $this->db->join('parroquias',
        'parroquias.id_parroquia=requerimientos.parroquia_id','inner');

        $this->db->join('sub_categoria',
        'sub_categoria.id=sub_categoria_id','inner');

       $this->db->join('proyectos',
        'requerimientos.id=proyectos.requerimiento_id','inner');


        $this->db->join('estatus_proyecto',
        'estatus_proyecto.id=estatus_proyecto_id','inner');
        $this->db->join('entes','ente_id=entes.id','inner');
        $this->db->where('requerimientos.id', $id);
     
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
}