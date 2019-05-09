<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    Class TutoresModel  extends CI_Model{

        function __construct(){

            parent::__construct();
            $this->load->database();
        }

        public function listar(){
            //$this->select('nacionalidad','cedula','nombres','apellidos','cargo','email','telefono','cargo','institucion_id');
            $this->db->from('personas');
            $this->db->join('persona_perfil','personas.id=personas_id','inner');
            $this->db->where('perfil_id', 3);
            $query = $this->db->get();
            return $query->result();
        }

        public function registrar($persona_id){
            $datos = array(
                        'personas_id'=> $persona_id,
                        'perfil_id'=>3
                    );
            $this->date     = time();
            $this->db->insert('persona_perfil',$datos);
            return $this->db->insert_id();
        }

        public function obtener($id){
            $this->db->where('id',$id);
            $query = $this->db->get('personas');
            return $query->result();
        }
    }
?>