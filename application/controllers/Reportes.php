<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {

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
        $this->load->model('ProyectoModel');
		$this->load->model('RequerimientosModel');
		$this->load->model('ProfesionModel');
		$this->load->model('DatosPersonasModel');
		$this->load->model('PersonasModel');

		
		if(!is_logged_in()){
			redirect('index.php/login');
			
		}
	}


	public function index()
	{

	}


	
	public function pdfproyecto(){

		$id=$data['segmento'] = $this->uri->segment(3);
		$response=$this->ProyectoModel->getProyectoId($id);
		$datos=$response['data'][0];
	

		$css=file_get_contents('./public/css/csstablas.css');
	
	   $mpdf = new \Mpdf\Mpdf();
	
	   $mpdf->SetHTMLHeader('
	   <div style="text-align: center; font-weight: bold; margin-buttom:20px;">

	   <br>
	   </div>');
	   $mpdf->writeHTML($css,1);
	   $html='   
	   <div style="text-align: center; font-weight: bold; margin-buttom:20px;">
	   <img src="public/img/banner.png" alt="">
	   <br>
	   </div>
	 
	   <table class="table" id="tabla">
	   <thead>
		   <tr>
			   <th>Datos del proyecto</th>
		   </tr>
	   </thead>
	
	   <tbody>
		   <tr>
			   <td><strong>Nombre del Proyecto: </strong> '.$datos->nombre.'</td>
		   </tr>
	
		   <tr>
			   <td><strong>Descripción del Proyecto: </strong>
				   <p> '.$datos->descripcion.'</p>
			   </td>
		   </tr>
		   <tr>
			   <td><strong>Situación Actual: </strong> '.$datos->estatus_proyecto.'</td>
		   </tr>
	
		   <tr>
			   <td><strong>Estado: </strong>'.$datos->estado.' </td>
		   </tr>
		   <tr>
			   <td><strong>Municipio: </strong>'.$datos->municipio.' </td>
		   </tr>
		   <tr>
			   <td><strong>Parroquia: </strong>'.$datos->parroquia.' </td>
		   </tr>
	
		   <tr>
		   <td><strong>Dirección: </strong>'.$datos->direccion.' </td>
	   </tr>
		   <tr>
			   <th>Datos del productor</th>
		   </tr>
	
		   <tr>
			   <td><strong>Nombre: </strong>
			   '.$datos->nombres.'  '.$datos->apellidos.'
			   </td>
		   </tr>
	
		   <tr>
			   <td><strong> Telefono: </strong>'.$datos->telefono.' 
			   </td>
		   </tr>
		   <tr>
			   <td><strong>Correo: </strong>'.$datos->email.'  </td>
		   </tr>
		   <tr>
			   <th>Datos de la Unidad de Producción</th>
		   </tr>
	
		   <tr>
			   <td><strong>Rif :</strong>'.$datos->codrif.'-'.$datos->numero_rif.'</td>
		   </tr>
	
		   <tr>
			   <td><strong> Nombre :</strong>
			   '.$datos->nombre_empresa.'
			   </td>
		   </tr>
		   <tr>
			   <td><strong>Teléfono:</strong>   '.$datos->telefono_empresa.'</td>
		   </tr>
	
		   <tr>
			   <th>Seguimiento y Control
			   </th>
	
	
		   </tr>
	
		   <tr>
			   <td><strong> Obsersavación :</strong>
			   </td>
		   </tr>
		   <tr>
			   <td><strong>Recomendaciones:</strong> </td>
		   </tr>
	
	
	   </tbody>
	
	</table>
	';
	   
		$mpdf->WriteHTML($html);
	
		$mpdf->Output('reporte.pdf','I');
	
				}
	
}
