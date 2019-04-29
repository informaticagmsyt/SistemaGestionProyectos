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
    
}