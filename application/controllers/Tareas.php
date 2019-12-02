<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tareas extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *         http://example.com/index.php/welcome
     *    - or -
     *         http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {

        parent::__construct();

        $this->load->library('session');
        $this->load->model('ProyectoModel');
        $this->load->model('RequerimientosModel');
        $this->load->model('ProfesionModel');
        $this->load->model('DatosPersonasModel');
        $this->load->model('PersonasModel');
        $this->load->model('TareasModel');

        if (!is_logged_in()) {
            redirect('login');

        }
    }

    public function index()
    {
        $nombreUsuario = $this->session->userdata('user_data');
        $this->load->view('layout/header');
        $this->load->view('layout/nav');
        $User['nombreUser'] = $nombreUsuario['nombre'];
        $this->load->view('layout/navar', $User);

        $tareas = $this->TareasModel->getTareas($_REQUEST['id']);
        $nombreProyecto = $this->TareasModel->nombreProyecto($_REQUEST['id']);
        $this->load->view('layout/scriptjs');
        $this->load->view('tareas/listarView', compact('tareas', 'nombreProyecto'));
        $this->load->view('layout/footer');
    }

    public function registrar()
    {

        $id = $this->TareasModel->registrarTarea(array("estatus_id" => $_REQUEST['estatus'],
            'titulo_tarea' => $_REQUEST['titulo'],
			"descripcion" => $_REQUEST['descripcion'],
			'fecha_creacion' => $_REQUEST['fecha_inicio'],
            "fecha_fin" => $_REQUEST['fecha_fin'],
            "requerimiento_id" => $_REQUEST['requerimiento_id']));
        $idRequerimiento = $this->TareasModel->getIdtareas($id);
        redirect('tareas?id=' . $idRequerimiento);
    }

    public function getAllProyecto()
    {
        $response = $this->ProyectoModel->getAll('tutor');

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));

    }

    public function getEstatus()
    {

        $response = $this->TareasModel->estatus();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function nueva()
    {

        $id = $data['segmento'] = $this->uri->segment(3);
        if (!empty($id)) {

            $requerimiento_id = $id;
            $nombreUsuario = $this->session->userdata('user_data');
            $this->load->view('layout/header');
            $this->load->view('layout/nav');
            $User['nombreUser'] = $nombreUsuario['nombre'];
            $this->load->view('layout/navar', $User);
			$nombreProyecto = $this->TareasModel->nombreProyecto(   $id);

            $this->load->view('layout/scriptjs');
            $this->load->view('tareas/nuevaView', compact('requerimiento_id','nombreProyecto'));

        } else {
            redirect('/tareas');

        }

	}
	
	public function editar()
    {

        $id = $_REQUEST['id'];
        if (!empty($id)) {

            $requerimiento_id = $id;
            $nombreUsuario = $this->session->userdata('user_data');
            $this->load->view('layout/header');
            $this->load->view('layout/nav');
            $User['nombreUser'] = $nombreUsuario['nombre'];
            $this->load->view('layout/navar', $User);
			$tarea=$this->TareasModel->getTarea($id);
			$this->load->view('layout/scriptjs');

            $this->load->view('tareas/editar', compact('id','tarea'));
		
        } else {
            redirect('/tareas');

        }

    }

	public function saveEdit(){
		$id = $_REQUEST['id'];
		$this->TareasModel->editarTarea(array("estatus_id" => $_REQUEST['estatus'],
		'titulo_tarea' => $_REQUEST['titulo'],
		"descripcion" => $_REQUEST['descripcion'],
		'fecha_creacion' => $_REQUEST['fecha_inicio'],
            "fecha_fin" => $_REQUEST['fecha_fin']),$id);
		$idRequerimiento = $this->TareasModel->getIdtareas($id);

        redirect('tareas?id=' . $idRequerimiento);
	}
}
