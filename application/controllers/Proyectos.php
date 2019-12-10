<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proyectos extends CI_Controller
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
        $this->load->model('TutoresModel');
        $this->load->model('PersonasModel');
        $this->load->helper('file');

        $this->load->model('ComplementosModel');

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
        $tutores = $this->TutoresModel->listar();
        $this->load->view('layout/scriptjs');
        $this->load->view('proyectos/listarView', compact('tutores'));
        $this->load->view('layout/footer');
    }

    public function guardarTutor()
    {
		$result=$this->RequerimientosModel->asignarTutor(array("tutor_id"=>$_POST['tutor']),$_POST['id']);

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($result));
    }

    public function registrar()
    {

        /*$resultProyectos=$this->ProyectoModel->findProyectosPersonas('19969774');
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($resultProyectos));*/

        $nombreUsuario = $this->session->userdata('user_data');
        $this->load->view('layout/header');
        $this->load->view('layout/nav');
        $User['nombreUser'] = $nombreUsuario['nombre'];
        $this->load->view('layout/navar', $User);

        $this->load->view('layout/scriptjs');
        $this->load->view('proyectos/registrar');

    }

    public function getProfesion()
    {

        $result = $this->ProfesionModel->getProfesion($this->input->post_get('codigo'));

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($result));

    }

    public function getDatosPersonasJSON()
    {

        if (!empty($this->input->post_get('cedula'))) {

            $_SESSION['requerimiento_id'] = null;
            $_SESSION['proyecto_id'] = null;
            $_SESSION['persona_id'] = null;
            $_SESSION['cedula'] = null;

            //ver si tine prroyectos
            $resultProyectos = $this->ProyectoModel->findProyectosPersonas($this->input->post('cedula'));
            if (!$resultProyectos['result']) {

                $obj = $this->DatosPersonasModel->getDataPersona($this->input->post_get('cedula'));

            } else {
                $obj = new stdClass;
                $obj->response = array(
                    "status" => "ok",
                    "http_code" => 404,
                );
                $obj->data = array(
                    $resultProyectos,
                );
                $obj->error = array("code" => "", "message" => "");
                $obj->comments = "Esta persona ya posee un proyecto registrado";

                $obj;
            }

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($obj));

        }

    }

    public function regitrarPaso1()
    {

        if (empty($_SESSION['cedula'])) {

            $_SESSION['cedula'] = $this->input->post('cedula');

        }

        $resultProyectos = $this->ProyectoModel->findProyectosPersonas($this->input->post('cedula'));
        if (!$resultProyectos['result']) {

            //consultar si esta en la tabla personas
            $resultPersonas = $this->PersonasModel->find($this->input->post('cedula'));

            //Actualizar
            if ($resultPersonas['result']) {

                $cadena_f = $this->input->post('fecha_nac');
                $fecha = DateTime::createFromFormat('Y-m-d', $cadena_f);
                $datos = array(
                    'nacionaliidad' => $this->input->post('nacionaliidad'),
                    'nombres' => $this->input->post('nombres'),
                    'apellidos' => $this->input->post('apellidos'),
                    'email' => $this->input->post('email'),
                    'cedula' => $this->input->post('cedula'),
                    'sexo' => $this->input->post('sexo'),
                    'direccion' => $this->input->post('direccion'),
                    'estado_id' => $this->input->post('estado_id'),
                    'municipio_id' => $this->input->post('municipio_id'),
                    'parroquia_id' => $this->input->post('parroquia_id'),
                    'v_carnet' => $this->input->post('v_carnet'),
                    'v_social' => $this->input->post('v_social'),
                    'fecha_nac' => $this->input->post('fecha_nac'),
                    'posee_carnet' => $this->input->post('posee_carnet'),
                    'telefono' => $this->input->post('telefono'),
                    'telefono2' => $this->input->post('telefono2'),
                    'profesion' => $this->input->post('profesion'),
                    'cargo' => '',
                    'institucion_id' => 0,
                    'principal' => true,
                );

                $result = $this->PersonasModel->actualizar($datos, $resultPersonas['data']->id);

                if ($result) {

                    $response = array(
                        "result" => true,
                        "mensaje" => "Se guardaron los cambios exitosamente",
                    );

                } else {

                    $response = array(
                        "result" => false,
                        "mensaje" => "Ocurrio un error, no se logro Guardar",
                    );
                }

                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($response));

            } else {
                //insertar
                $cadena_f = $this->input->post('fecha_nac');
                $fecha = DateTime::createFromFormat('Y-m-d', $cadena_f);
                $datos = array(
                    'nacionaliidad' => $this->input->post('nacionaliidad'),
                    'nombres' => $this->input->post('nombres'),
                    'apellidos' => $this->input->post('apellidos'),
                    'email' => $this->input->post('email'),
                    'cedula' => $this->input->post('cedula'),
                    'sexo' => $this->input->post('sexo'),
                    'direccion' => $this->input->post('direccion'),
                    'estado_id' => $this->input->post('estado_id'),
                    'municipio_id' => $this->input->post('municipio_id'),
                    'parroquia_id' => $this->input->post('parroquia_id'),
                    'v_carnet' => $this->input->post('v_carnet'),
                    'v_social' => $this->input->post('v_social'),
                    'fecha_nac' => $this->input->post('fecha_nac'),
                    'posee_carnet' => $this->input->post('posee_carnet'),
                    'telefono' => $this->input->post('telefono'),
                    'telefono2' => $this->input->post('telefono2'),
                    'profesion' => $this->input->post('profesion'),
                    'cargo' => '',
                    'institucion_id' => 0,
                    'principal' => true,
                );

                $idpersona = $this->PersonasModel->registrar($datos);

                $data = array("perfil_id" => 4,
                    "personas_id" => $idpersona);

                $this->PersonasModel->registrarPersonaPerfil($data);
                $response = array(
                    "result" => true,
                    "mensaje" => "Se guardaron los cambios Exitosamente",
                );

                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($response));

            }

        } else {
            //tiene proyectos
            $response = array(
                "result" => false,
                "mensaje" => "Ya existe un requerimiento registrado con esta cedula" . $this->input->post('cedula'),
            );

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
        }

    }

    public function regitrarPaso2()
    {

        $user = $this->session->userdata('user_data');

        $actualizar = false;
        if (!empty($_SESSION['requerimiento_id'])) {

            $actualizar = true;

        }
        if ($actualizar) {

            $datos = array(
                'descripcion' => $this->input->post('descripcion'),
                'categoria_id' => $this->input->post('categoria_id'),
                'sub_categoria_id' => $this->input->post('sub_categoria_id'),

                'user_id' => $user['id'],

            );

            //Actualizo paso
            $this->ProyectoModel->update(
                array("nombre" => $this->input->post('nombrep'),
                    "personas_beneficiadas" => $this->input->post('personasbenificiadas'),
                    "poblacion_beneficiada" => $this->input->post('poblacion'),
                    "estatus_proyecto_id" => $this->input->post('estatus_proyecto_id'),

                    //"infraestructurabs"=>$this->input->post('infraestructura'),
                    //"maquinariasbs"=>$this->input->post('maquinariasEquipos'),
                    //"insumos_materiasbs" =>$this->input->post('insumosMateriaPrima'),
                    //"fuerza_trabajo" =>$this->input->post('FuerzaTrabajo'),
                    //"servicios" =>$this->input->post('mservicios'),
                    //"monto" =>$this->input->post('inversionTotal')

                ),

                $_SESSION['proyecto_id']);

            $Urequerimiento = $this->RequerimientosModel->update($datos, $_SESSION['requerimiento_id']);
            if ($Urequerimiento) {
                $response = array(
                    "result" => true,
                    "mensaje" => "Se Actualizaron los datos exitosamente",

                );
            } else {

                $response = array(
                    "result" => false,
                    "mensaje" => "Ocurrio un Error al intentar actualizar",

                );

            }

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));

        } else {

            $datos = array(
                'descripcion' => $this->input->post('descripcion'),
                'categoria_id' => $this->input->post('categoria_id'),
                'sub_categoria_id' => $this->input->post('sub_categoria_id'),
                'user_id' => $user['id'],

            );

            $idrequerimiento = $this->RequerimientosModel->registrar($datos);

            $resultpersonas = $this->PersonasModel->find($_SESSION['cedula']);
            $idpersonas = $resultpersonas['data']->id;

            //aqui se relaciona las persona con el requerimiento
            $this->RequerimientosModel->requerimientoPersona(
                array(
                    'requerimiento_id' => $idrequerimiento,
                    'persona_id' => $idpersonas,

                ));

            if ($idrequerimiento > 0) {

                $idproyecto = $this->ProyectoModel->registrar(

                    array("nombre" => $this->input->post('nombrep'),
                        "personas_beneficiadas" => $this->input->post('personasbenificiadas'),
                        "poblacion_beneficiada" => $this->input->post('poblacion'),
                        "estatus_proyecto_id" => $this->input->post('estatus_proyecto_id'),
                        //"infraestructurabs"=>$this->input->post('infraestructura'),
                        //"maquinariasbs"=>$this->input->post('maquinariasEquipos'),
                        //"insumos_materiasbs" =>$this->input->post('insumosMateriaPrima'),
                        //"fuerza_trabajo" =>$this->input->post('FuerzaTrabajo'),
                        //"servicios" =>$this->input->post('mservicios'),
                        //"monto" =>$this->input->post('inversionTotal'),

                        "requerimiento_id" => $idrequerimiento)

                );

            }

            //creo session temporal para los id
            $_SESSION['requerimiento_id'] = $idrequerimiento;
            $_SESSION['proyecto_id'] = $idproyecto;
            $_SESSION['persona_id'] = $idpersonas;

            if ($idproyecto > 0) {

                $response = array(
                    "result" => true,
                    "mensaje" => "Se guardaron los datos exitosamente",
                    "idproyecto" => $idproyecto,
                    "idrequerimiento" => $idrequerimiento,
                );
            }

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
        }
    }

    public function regitrarPaso3()
    {

        $datos = array(

            'municipio_id' => $this->input->post('municipio'),
            'parroquia_id' => $this->input->post('parroquia'),
            'estado_id' => $this->input->post('estado'),
            "ente_id" => $this->input->post('inst_responsable'),

        );

        $idrequerimiento = $this->RequerimientosModel->update($datos, $_SESSION['requerimiento_id']);

        $datos = array(
            "codrif" => $this->input->post('rif'),
            "numero_rif" => $this->input->post('numerorif'),
            "nombre_empresa" => $this->input->post('nombrerazonsocial'),
            "empresa_registrada" => $this->input->post('registrada'),
            "codigo_situr" => $this->input->post('codigo_situr'),
            "codigo_sunagro" => $this->input->post('codigo_sunagro'),

        );
        $idproyecto = $this->ProyectoModel->update($datos, $_SESSION['proyecto_id']);

        if ($idproyecto > 0) {
            $response = array(
                "result" => true,
                "mensaje" => "Se guardaron los datos exitosamente",
                "idproyecto" => $idproyecto,
                "idrequerimiento" => $idrequerimiento,
            );

        } else {

            $response = array(
                "result" => false,
                "mensaje" => "Ocurrio un Error al intentar actualizar",

            );
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));

    }

    public function regitrarPaso4()
    {

        $codigoCaso = $this->RequerimientosModel->generarCodigoCaso();

        $datosr = array(
            "codcaso" => $codigoCaso['codigoCaso'],
            "tutor_id" => 0,

        );

        $this->RequerimientosModel->update($datosr, $_SESSION['requerimiento_id']);
        $datos = array(

            'edificacion' => $this->input->post('edificacion'),
            'area_terreno' => $this->input->post('areaterreno'),
            'area_construccion' => $this->input->post('areaconstruccion'),
            'area_almacenamiento' => $this->input->post('areaalmacenamiento'),
            'servicios_sanitarios' => $this->input->post('instalaciones'),
            "observaciones" => $this->input->post('observaciones'),
            "acometida_agua_blanca" => $this->input->post('acometida'),
            "aceo_urbano" => $this->input->post('aseourbano'),
            "servicio_electrico" => $this->input->post('servicioelectrico'),
            'vialidad' => $this->input->post('vialidad'),
            "servicios_gas" => $this->input->post('serviciogas'),
            "acometida_agua_negra" => $this->input->post('acometidaservidas'),

            //"ente_id"         =>             $this->input->post('inst_responsable')

        );

        $idproyecto = $this->ProyectoModel->update($datos, $_SESSION['proyecto_id']);

        if ($idproyecto > 0) {
            $response = array(
                "result" => true,
                "mensaje" => "Se guardaron los datos exitosamente",

            );

        } else {

            $response = array(
                "result" => false,
                "mensaje" => "Ocurrio un Error al intentar actualizar",

            );
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));

    }

    public function regitrarPaso5()
    {

        $codigoCaso = $this->RequerimientosModel->generarCodigoCaso();

        $datosr = array(
            "codcaso" => $codigoCaso['codigoCaso'],
            "tutor_id" => $this->input->post('tutor'),

        );

        $this->RequerimientosModel->update($datosr, $_SESSION['requerimiento_id']);

        $datos = array(

            'capacidad_instalada' => $this->input->post('capacidadinstalada'),
            'cap_produccion_actual' => $this->input->post('produccionactual'),
            'unidad_metrica' => $this->input->post('unidadmedida'),
            "funcionamiento_operativo" => $this->input->post('funcionamientooperativo'),

            // $this->input->post('inst_responsable')

        );

        $idproyecto = $this->ProyectoModel->update($datos, $_SESSION['proyecto_id']);

        if ($idproyecto > 0) {
            $response = array(
                "result" => true,
                "mensaje" => "Se guardaron los datos exitosamente",
                "codigoCaso" => $codigoCaso['codigoCaso'],

            );

        } else {

            $response = array(
                "result" => false,
                "mensaje" => "Ocurrio un Error al intentar actualizar",

            );
        }

        $_SESSION['requerimiento_id'] = null;
        //$_SESSION['proyecto_id']=NULL;
        $_SESSION['persona_id'] = null;
        $_SESSION['cedula'] = null;

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));

    }

    public function registrarPaso6()
    {
        $salario = 65000;

        $dato1 = array(
            "tipo_cargo" => "Personal operativo",
            "cant_personal" => $this->input->post('cantidadperop'),
            "salario" => $salario,
            "id_proyecto" => $_SESSION['requerimiento_id'],
        );

        $dato2 = array(
            "tipo_cargo" => "Personal de Mantenimiento",
            "cant_personal" => $this->input->post('cantidadperman'),
            "salario" => $salario,
            "id_proyecto" => $_SESSION['requerimiento_id'],
        );

        $dato3 = array(
            "tipo_cargo" => "Personal de Administracion",
            "cant_personal" => $this->input->post('cantidadperadmin'),
            "salario" => $salario,
            "id_proyecto" => $_SESSION['requerimiento_id'],
        );

        $personal = [$dato1, $dato2, $dato3];

        for ($i = 0; $i < 3; $i++) {
            $this->ProyectoModel->registrarPersonal($personal[$i]);
        }

        $costos = array(
            "costoinsumo" => $this->input->post('costoInsumo'),
            "costoherramientas" => $this->input->post('costoHerramientas'),
            "costomaquinas" => $this->input->post('costoMaquinas'),
            "costomobiliario" => $this->input->post('costoMobiliario'),
            "costomanodeobra" => $this->input->post('costoManodeobra'),
            "costoservicio" => $this->input->post('costoServicio'),
        );

        $idproyecto = $this->ProyectoModel->update($costos, $_SESSION['proyecto_id']);

        $obj = new stdClass;
        $obj->msj = "registro completado";

        $_SESSION['proyecto_id'] = null;
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($obj));
    }

    public function getCategoria()
    {
        $response = $this->RequerimientosModel->categoriaGet(1);

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));

    }

    public function getCategoriaRequerimiento()
    {
        $response = $this->RequerimientosModel->categoriaGet(2);

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));

    }

    public function getSubCategoria()
    {
        $response = $this->RequerimientosModel->getSubCategoria($this->input->get('id'));

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));

    }

    public function getAllProyecto()
    {
        if (isset($_REQUEST['tutor'])) {
            $response = $this->ProyectoModel->getAll('ALL', $_REQUEST['tutor']);

        } else {
            $response = $this->ProyectoModel->getAll();

        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));

    }
    public function getEstatusProyecto()
    {
        $response = $this->ProyectoModel->getEstatusProyecto();

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));

    }

    public function editar()
    {

        $id = $data['segmento'] = $this->uri->segment(3);
        if (!empty($id)) {
            $nombreUsuario = $this->session->userdata('user_data');
            $this->load->view('layout/header');
            $this->load->view('layout/nav');
            $User['nombreUser'] = $nombreUsuario['nombre'];
            $this->load->view('layout/navar', $User);
            $response = $this->ProyectoModel->getProyectoId($id);
            $integrantes = $this->PersonasModel->getIntegrante($id);
            $complementos = $this->ComplementosModel->getComplementosProyectoId($id);
            $mano_obra = $this->ComplementosModel->listar_mano_obra($id);
            $datos = $response['data'][0];

            $this->load->view('layout/scriptjs');
            $this->load->view('proyectos/editarView', compact('datos', 'integrantes', 'complementos', 'mano_obra')); //compact('datos','integrantes','imagenes','url','idproyecyo','complementos')
        } else {
            redirect('/proyectos');

        }

    }

    public function GuardarEdit()
    {

        $user = $this->session->userdata('user_data');
        $datosP = array(
            'nacionaliidad' => $this->input->post('nacionaliidad'),
            'nombres' => $this->input->post('nombres'),
            'apellidos' => $this->input->post('apellidos'),
            'email' => $this->input->post('email'),

            'sexo' => $this->input->post('sexo'),
            'direccion' => $this->input->post('direccion'),
            'estado_id' => $this->input->post('estado_id'),
            'municipio_id' => $this->input->post('municipio_id'),
            'parroquia_id' => $this->input->post('parroquia_id'),
            'v_carnet' => $this->input->post('v_carnet'),
            'v_social' => $this->input->post('v_social'),
            'fecha_nac' => $this->input->post('fecha_nac'),
            'posee_carnet' => $this->input->post('posee_carnet'),
            'telefono' => $this->input->post('telefono'),
            'telefono2' => $this->input->post('telefono2'),
            'profesion' => $this->input->post('profesion'),
            'institucion_id' => 0,
            'principal' => true,
        );

        $result = $this->PersonasModel->actualizar($datosP, $this->input->post('personas_id'));

        $datos = array(

            'municipio_id' => $this->input->post('municipio'),
            'parroquia_id' => $this->input->post('parroquia'),
            'estado_id' => $this->input->post('estado'),
            "ente_id" => $this->input->post('inst_responsable'),
            'descripcion' => $this->input->post('descripcion'),
            'categoria_id' => $this->input->post('categoria_id'),
            'sub_categoria_id' => $this->input->post('sub_categoria_id'),
            'user_id' => $user['id'],

        );

        $idrequerimiento = $this->RequerimientosModel->update($datos, $this->input->post('idrequerimiento'));

        $datapro = array("nombre" => $this->input->post('nombrep'),
            "personas_beneficiadas" => $this->input->post('personasbenificiadas'),
            "poblacion_beneficiada" => $this->input->post('poblacion'),
            "codrif" => $this->input->post('rif'),
            "numero_rif" => $this->input->post('numerorif'),
            "nombre_empresa" => $this->input->post('nombrerazonsocial'),
            "empresa_registrada" => $this->input->post('registrada'),
            "codigo_situr" => $this->input->post('codigo_situr'),
            "codigo_sunagro" => $this->input->post('codigo_sunagro'),
            'edificacion' => $this->input->post('edificacion'),
            'area_terreno' => $this->input->post('areaterreno'),
            'servicios_sanitarios' => $this->input->post('instalaciones'),
            "observaciones" => $this->input->post('observaciones'),
            "acometida_agua_blanca" => $this->input->post('acometida'),
            "aceo_urbano" => $this->input->post('aseourbano'),

            "estatus_proyecto_id" => $this->input->post('estatus_proyecto_id'),
            "servicio_electrico" => $this->input->post('servicioelectrico'),
            "servicios_gas" => $this->input->post('serviciogas'),
            "acometida_agua_negra" => $this->input->post('acometidaservidas'),
            'capacidad_instalada' => $this->input->post('capacidadinstalada'),
            'cap_produccion_actual' => $this->input->post('produccionactual'),
            'unidad_metrica' => $this->input->post('unidadmedida'),
            "funcionamiento_operativo" => $this->input->post('funcionamientooperativo'),

            //"infraestructurabs"=>$this->input->post('infraestructura'),
            //"maquinariasbs"=>$this->input->post('maquinariasEquipos'),
            //"insumos_materiasbs" =>$this->input->post('insumosMateriaPrima'),
            //"fuerza_trabajo" =>$this->input->post('FuerzaTrabajo'),
            //"servicios" =>$this->input->post('mservicios'),
            //"monto" =>$this->input->post('inversionTotal')

        );

        $result = $this->ProyectoModel->update($datapro, $this->input->post('proyecto_id'));
        if ($result) {
            redirect('/proyectos');
        } else {

            redirect('/proyectos/editar/' . $this->input->post('idrequerimiento'));
        }

    }

    public function ver()
    {

        $id = $data['segmento'] = $this->uri->segment(3);
        if (!empty($id)) {

            $complementos = $this->ComplementosModel->getComplementosProyectoId($id);
            $imagenes = get_filenames(APPPATH . "storage/$id/");
            $url = base_url() . "application/storage/$id/";

            $nombreUsuario = $this->session->userdata('user_data');
            $this->load->view('layout/header');
            $this->load->view('layout/nav');
            $User['nombreUser'] = $nombreUsuario['nombre'];
            $this->load->view('layout/navar', $User);
            $response = $this->ProyectoModel->getProyectoId($id);
            $datos = $response['data'][0];
            $idproyecyo = $id;
            $integrantes = $this->PersonasModel->getIntegrante($id);
            $mano_obra = $this->ComplementosModel->listar_mano_obra($id);
            $this->load->view('layout/scriptjs');
            $this->load->view('proyectos/verView', compact('datos', 'integrantes', 'imagenes', 'url', 'idproyecyo', 'complementos', 'mano_obra'));

        } else {
            redirect('/proyectos');

        }

    }

    public function agregarIntegrante()
    {

        $datos = array(
            'nacionaliidad' => 'V',
            'nombres' => $this->input->post('nombres'),
            'apellidos' => $this->input->post('apellidos'),
            'email' => '',
            'cedula' => $this->input->post('cedula'),
            'sexo' => $this->input->post('sexo'),
            'direccion' => '',
            'estado_id' => $this->input->post('estado_id'),
            'municipio_id' => $this->input->post('municipio_id'),
            'parroquia_id' => $this->input->post('parroquia_id'),
            'v_carnet' => '',
            'v_social' => '',
            'fecha_nac' => $this->input->post('fecha_nac'),
            'posee_carnet' => 0,
            'telefono' => $this->input->post('telefono'),
            'telefono2' => 0,
            'profesion' => $this->input->post('profesion'),
            'institucion_id' => 0,
            'principal' => false,
        );

//consultar si esta en la tabla personas
        $resultPersonas = $this->PersonasModel->find($this->input->post('cedula'));

        if (!$resultPersonas['result']) {
            $idpersona = $this->PersonasModel->registrar($datos);

            $data = array("perfil_id" => 5,
                "personas_id" => $idpersona);

            $this->PersonasModel->registrarPersonaPerfil($data);
            $response = array(
                "result" => true,
                "mensaje" => "Se guardaron los cambios Exitosamente",
            );

            //aqui se relaciona las persona con el requerimiento
            $this->RequerimientosModel->requerimientoPersona(
                array(
                    'requerimiento_id' => $this->input->post('idrequerimiento'),
                    'persona_id' => $idpersona,

                ));
        } else {
            $response = array(
                "result" => false,
                "mensaje" => "Ya exite un registro con esta cedula",
            );
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));

    }

    public function getIntegratesJSON()
    {

        $result = $this->PersonasModel->getIntegrante($this->input->post('idrequerimiento'));
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($result));

    }

    public function cargarImagenes()
    {
        $id = $data['segmento'] = $this->uri->segment(3);
        $nombreUsuario = $this->session->userdata('user_data');
        $this->load->view('layout/header');
        $this->load->view('layout/nav');
        $User['nombreUser'] = $nombreUsuario['nombre'];
        $this->load->view('layout/navar', $User);
        $this->load->view('layout/scriptjs');
        $this->load->view('proyectos/imagenesView', compact('id'));

    }

    public function subirImagenes()
    {

        $id = $data['segmento'] = $this->uri->segment(3);
        $Cempresa = APPPATH . 'storage/' . $id;
        if (!file_exists($Cempresa)) {
            mkdir($Cempresa, 0777, true);
        }

        $config['upload_path'] = $Cempresa;

        /*
         *Formatos permitidos
         */
        $config['allowed_types'] = 'gif|jpg|png|jpeg|csv|xls|xlsb|xlsm|xlsx|xlt|xltm|xltx|odf|ott|sxw|odf|sxm|mml|odp|otp|sxi|sti|odg|otg|ods|ots|sxc|stc|pdf|eps|pot|potm|potx|pps|ppsm|ppsx|ppt|pptm|pptx|doc|docm|docx|dot|dotm|dotx|wps|rtf|text|txt|wpd|wps';

        /*
         *Nombre del archivo
         */
        $config['file_name'] = "img" . $id;
        //  $config['allowed_types'] = "*";
        $config['max_size'] = 10000;
        /*     $config['max_width']            = 1024;
        $config['max_height']           = 768;*/

        $this->load->library('upload', $config);

        $data = $this->upload->data('file');

        if (!$this->upload->do_upload('file')) {
            $data = array('result' => false,
                'error' => $this->upload->display_errors());

        } else {
            $data = array('result' => true,

                'upload_data' => $this->upload->data());

        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }
}
