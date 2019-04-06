<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class ProyectoModel  extends CI_Model{


        public $nombre;
        public $apellido;
        public $email;
        public $contra;

    function __construct(){

   
        parent::__construct();
        $this->load->library('session');

    }
    

 

    
   
}