<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu{

    private $array_menu;

    public function __construct($array){

        $this->array_menu=$array;
    }

    public function construirMenu(){

       $ret_menu="<nav><ul>";

        foreach($this->array_menu as $opcion){
            $ret_menu.="<li>".$opcion."</li>";

        }

        $ret_menu.="</ul></nav>";

      return  $ret_menu;
    }
}
?>