<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    Class TutoresModel  extends CI_Model{

        function __construct(){

            parent::__construct();
            $this->load->database();
        }

        public function listar(){
            $this->db->select('personas.id, nacionaliidad, cedula, nombres, sexo, apellidos, email, cargo, 
            direccion, estado_id, municipio_id, parroquia_id, v_carnet, v_social, 
            fecha_nac, posee_carnet, telefono, telefono2, profesion, institucion_id, 
            activo, principal');
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