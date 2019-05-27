<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class UsuariosModel extends CI_Model{

    function __construct(){

   
        parent::__construct();
   

    }

    function listar(){
        //*
        $this->db->from('persona_perfil');
        $this->db->join('personas','personas.id=personas_id','inner');
        $this->db->join('perfiles','perfiles.id=perfil_id','inner');
        $this->db->where('cod_perfil',1);
        /**/
        $query = $this->db->get();
        return $query->result();
    } 

    function perfiles(){
              
             $this->db->from('perfiles');
             $this->db->where('cod_perfil',1);
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
    
        public function registrarPersona_perfil($persona_id){
            $datos = array(
                        'personas_id'=> $persona_id,
                        'perfil_id'=>1
                    );
            $this->date     = time();
            $this->db->insert('persona_perfil',$datos);
            return $this->db->insert_id();
        }

        public function registrarUsuario($datos){
            $data = array(
                "cedula" => $datos['cedula'],
                "clave" => $datos['clave'],
                "personas_id" => $datos['personas_id'],
                "estatus" => $datos['estatus']
            );
            $this->db->insert('usuarios',$data);
            return $this->db->insert_id();
        }

        public function find($cedula){
            $this->db->from('usuarios');
            $this->db->where('cedula',$cedula);
            $query = $this->db->get();
            $row=$query->row();
             if ($query->num_rows() > 0) {

             return  array('result'=>true,
                'data'=>  $row);
             }else{

             return  array('result'=>false,
                ' data'=>  null);
             }
            }
}