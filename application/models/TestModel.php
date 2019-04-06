<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class TestModel  extends CI_Model{


        public $nombre;
        public $apellido;
        public $email;
        public $date;

    function __construct(){

   
        parent::__construct();
 
    }
    
    function crearUsuario($data){

        $datos = array(
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'email' => $data['email'],
            'date' => 'NOW',
            );
            //a
            $this->nombre="Jhonatan";
            $this->apellido="Jhonatan";
            $this->email="Jhonatan";
            $this->date     = time();
        //$this->db->insert('users',$this);
        $this->db->insert('users',$datos);

    }
    function getUsurios(){
      $query=  $this->db->get('users');
    }
}