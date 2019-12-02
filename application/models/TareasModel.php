<?php

Class TareasModel  extends CI_Model{


    function __construct(){

   
        parent::__construct();
   

    }
    
public function estatus(){

    

    $this->db->select('*');
    $this->db->from('estatus');
    
    $query = $this->db->get();


 


        $response=array(
            "result"	=>true,
            "data"	=>$query->result() 
        );

        return $response;
}


public function registrarTarea($data){
    $result = $this->db->insert('tareas',$data);
    return $this->db->insert_id();
}



public function getTareas($id){

    

    $this->db->select('tareas.id, requerimiento_id, tutor_id, titulo_tarea, tareas.descripcion, user_id, 
    fecha_creacion, fecha_fin, estatus_id, id_observacion, fecha_inicio,estatus.descripcion as estatus');
    $this->db->from('tareas');
    $this->db->join('estatus',
    'estatus_id=estatus.id','inner');
    $this->db->where('requerimiento_id', $id);
    $query = $this->db->get();


 

        return $query->result();
    }

    

public function getTarea($id){

    

    $this->db->select('tareas.id, requerimiento_id, tutor_id, titulo_tarea, tareas.descripcion, user_id, 
    fecha_creacion, fecha_fin, estatus_id, id_observacion, fecha_inicio,estatus.descripcion as estatus');
    $this->db->from('tareas');
    $this->db->join('estatus',
    'estatus_id=estatus.id','inner');
    $this->db->where('tareas.id', $id);
    $query = $this->db->get();


 

        return $query->row();
    }
 public function editarTarea($data,$id){
    $this->db->set($data);
    $this->db->where('id', $id);
   return $this->db->update('tareas');

 }
    public function getIdtareas($id){

    

        $this->db->select('requerimiento_id');
        $this->db->from('tareas');

        $this->db->where('tareas.id', $id);
        $query = $this->db->get();
    
        $row=$query->row();
     
    
            return     $row->requerimiento_id;
        }

        public function nombreProyecto($id){

    

            $this->db->select('nombre');
            $this->db->from('proyectos');
    
            $this->db->where('requerimiento_id', $id);
            $query = $this->db->get();
        
            $row=$query->row();
         
        
                return     $row->nombre;
            }
}

