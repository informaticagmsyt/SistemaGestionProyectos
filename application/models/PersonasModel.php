<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class PersonasModel  extends CI_Model{


        public $nombre;
        public $apellido;
        public $email;
        public $contra;

    function __construct(){

   
        parent::__construct();
  

    }
    
    public function registrar($data){
        $datos = array(
            'nacionaliidad' => $data['nacionaliidad'],
            'nombres' => $data['nombres'],
            'apellidos' => $data['apellidos'],
            'email' => $data['email'],
            'cedula' => $data['cedula'],
            'sexo' => $data['sexo'],
            'direccion' =>$data['direccion'],
            'estado_id' => $data['estado_id'],
            'municipio_id' => $data['municipio_id'],
            'parroquia_id' =>$data['parroquia_id'],
            'v_carnet' =>$data['v_carnet'],
            'v_social' => $data['v_social'],
            'fecha_nac' => $data['posee_carnet'], 
            'posee_carnet'=>  $data['posee_carnet'], 
            'telefono'=>  $data['telefono'], 
            'telefono2'=>  $data['telefono2'], 
            'profesion' =>$data['profesion'], 
            'institucion_id'=> $data['institucion_id'],
            'principal'=> $data['principal']
            );
            //a
           
            $this->date     = time();
        //$this->db->insert('users',$this);
        $this->db->insert('personas',$datos);

        return $this->db->insert_id();
        
    }
 

    
   
}