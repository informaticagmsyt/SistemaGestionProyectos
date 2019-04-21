<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

        function __construct(){

			parent::__construct();
			$this->load->helper('mihelper');
			$this->load->helper('form');
			$this->load->model('testmodel');
			$this->load->library('mpdf');
        }


	public function index()
	{
		$this->load->library('menu',array('inicio','Contacto','cursos'));
		$data['mi_menu']=$this->menu->construirMenu();
		$dato['string']="Helloooo";
		$this->load->view('test/testView',$data);
	}

	public function recibirdatos()
	{
		$data =array ("nombre"=>$this->input->post('nombre'),
		"apellido"=>$this->input->post('apellido'),
		"email"=>$this->input->post('email'),
		"date",'NOW');

		$this->testmodel->crearUsuario($data);
	
	}

	public function mpdf()
	{
			$mpdf = new \Mpdf\Mpdf();
			$css=file_get_contents('./public/css/csstablas.css');


			$mpdf->SetHTMLHeader('
<div style="text-align: center; font-weight: bold;">
    My document
</div>');
				$mpdf->writeHTML($css,1);
			$html='<table class="table" id="tabla">
			<thead>
			  <tr>
				<th>#</th>
				<th>Column heading</th>
				<th>Column heading</th>
				<th>Column heading</th>
			  </tr>
			</thead>
			<tbody>
			  <tr class="active">
				<th scope="row">1</th>
				<td>Column content</td>
				<td>Column content</td>
				<td>Column content</td>
			  </tr>
			  <tr>
				<th scope="row">2</th>
				<td>Column content</td>
				<td>Column content</td>
				<td>Column content</td>
			  </tr>
			  <tr class="success">
				<th scope="row">3</th>
				<td>Column content</td>
				<td>Column content</td>
				<td>Column content</td>
			  </tr>
			  <tr>
				<th scope="row">4</th>
				<td>Column content</td>
				<td>Column content</td>
				<td>Column content</td>
			  </tr>
			  <tr class="info">
				<th scope="row">5</th>
				<td>Column content</td>
				<td>Column content</td>
				<td>Column content</td>
			  </tr>
			  <tr>
				<th scope="row">6</th>
				<td>Column content</td>
				<td>Column content</td>
				<td>Column content</td>
			  </tr>
			  <tr class="warning">
				<th scope="row">7</th>
				<td>Column content</td>
				<td>Column content</td>
				<td>Column content</td>
			  </tr>
			  <tr>
				<th scope="row">8</th>
				<td>Column content</td>
				<td>Column content</td>
				<td>Column content</td>
			  </tr>
			  <tr class="danger">
				<th scope="row">9</th>
				<td>Column content</td>
				<td>Column content</td>
				<td>Column content</td>
			  </tr>
			</tbody>
		  </table>';
			//$mpdf->WriteHTML($css,\Mpdf\HTMLParserMode::HEADER_CSS);
			$mpdf->WriteHTML($html);

		  $mpdf->Output('reporte.pdf','I');
	}


	public function html()
	{
			
		$this->load->view('test/html');
	}


}
