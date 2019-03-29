<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class municipiosC extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct(){

		parent::__construct();
	
		$this->load->library('session');

		$this->load->model('municipiosmodel');
		if(!is_logged_in()){
			redirect('index.php/login');
			
		}
	}


	public function index(){
	

	}





public function get(){
		//devuelve un objeto JSON para consumir por AJAX
        if(!empty($this->input->post_get('id_estado'))) { 
            
	$result=$this->municipiosmodel->get($this->input->post_get('id_estado'));

	$this->output
        ->set_content_type('application/json')
		->set_output(json_encode($result));
	
		
        }
	}


}