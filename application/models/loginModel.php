<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class loginModel  extends CI_Model{


        public $nombre;
        public $apellido;
        public $email;
        public $contra;

    function __construct(){

   
        parent::__construct();
        $this->load->library('session');

    }
    

    function verificar($user,$contra){
    
      

        $this->db->select('usuarios.cedula,clave,usuarios.personas_id,usuarios.id, nombres, apellidos,perfil_id');
        $this->db->from('usuarios');
      
        $this->db->join('personas','usuarios.personas_id=personas.id','inner');
        $this->db->join('persona_perfil','persona_perfil.personas_id=personas.id','inner');
        $this->db->where('usuarios.cedula', $user);
        $this->db->where('clave', $contra);

        $query = $this->db->get();

        $row=$query->row();
        if ($query->num_rows() == 1) {
      
            $data=array('user_data'=>array(
                'user'=>$row->cedula,
                'nombre'=>$row->nombres." ".$row->apellidos,
                'id'=>$row->id,
                'perfil_id'=>$row->perfil_id,
                'personas_id'=>$row->personas_id,
           )
            );
            $this->session->set_userdata($data);

            return true;
        } else {
            $this->session->unset_userdata('user_data');
            return false;

        }
    }

    
   
}