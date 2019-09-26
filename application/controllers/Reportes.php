<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reportes extends CI_Controller
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
        $this->load->model('ComplementosModel');
		$this->load->helper('file');
        if (!is_logged_in()) {
            redirect('index.php/login');

        }
    }

    public function index()
    {

    }

    public function excelProyecto()
    {

        $response = $this->ProyectoModel->getAll();

        $data = $response['data'];
        $objPHPExcel = new PHPExcel();
        //Propiedades de Documento
        $objPHPExcel->getProperties()->setCreator("Saber y Trabajo")->setDescription("Reporte de Proyectos");

        //Establecemos la pestaña activa y nombre a la pestaña
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setTitle("Proyectos");

        //$gdImage = imagecreatefrompng('images/logo.png');//Logotipo
        $objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
        $objDrawing->setName('Logotipo');
        $objDrawing->setDescription('Logotipo');
        //$objDrawing->setImageResource($gdImage);
        $objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
        $objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
        $objDrawing->setHeight(100);
        $objDrawing->setCoordinates('A1');
        $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

        $fila = 7; //Establecemos en que fila inciara a imprimir los datos

        $estiloTituloReporte = array(
            'font' => array(
                'name' => 'Arial',
                'bold' => true,
                'italic' => false,
                'strike' => false,
                'size' => 13,
            ),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
            ),
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_NONE,
                ),
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ),
        );

        $estiloTituloColumnas = array(
            'font' => array(
                'name' => 'Arial',
                'bold' => true,
                'size' => 10,
                'color' => array(
                    'rgb' => 'FFFFFF',
                ),
            ),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => '538DD5'),
            ),
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                ),
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ),
        );

        $estiloInformacion = new PHPExcel_Style();
        $estiloInformacion->applyFromArray(array(
            'font' => array(
                'name' => 'Arial',
                'color' => array(
                    'rgb' => '000000',
                ),
            ),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
            ),
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                ),
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ),
        ));

        $objPHPExcel->getActiveSheet()->getStyle('A1:E4')->applyFromArray($estiloTituloReporte);
        $objPHPExcel->getActiveSheet()->getStyle('A6:R6')->applyFromArray($estiloTituloColumnas);

        $objPHPExcel->getActiveSheet()->setCellValue('B3', 'REPORTE DE PROYECTOS');
        $objPHPExcel->getActiveSheet()->mergeCells('B3:D3');

        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $objPHPExcel->getActiveSheet()->setCellValue('A6', 'ID');

        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
        $objPHPExcel->getActiveSheet()->setCellValue('B6', 'Nombre del Proyecto');

        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
        $objPHPExcel->getActiveSheet()->setCellValue('C6', 'Descripción del Proyecto:');

        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
        $objPHPExcel->getActiveSheet()->setCellValue('D6', 'Estado');

        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
        $objPHPExcel->getActiveSheet()->setCellValue('E6', 'Municipio');

        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
        $objPHPExcel->getActiveSheet()->setCellValue('F6', 'Parroquia');

        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
        $objPHPExcel->getActiveSheet()->setCellValue('G6', 'Dirección');

        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
        $objPHPExcel->getActiveSheet()->setCellValue('H6', 'Situación Actual');

        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
        $objPHPExcel->getActiveSheet()->setCellValue('I6', 'Nombre del Productor');

        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
        $objPHPExcel->getActiveSheet()->setCellValue('J6', 'Correo');

        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(10);
        $objPHPExcel->getActiveSheet()->setCellValue('K6', 'RIF');

        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(10);
        $objPHPExcel->getActiveSheet()->setCellValue('L6', 'Nombre de la empresa');

        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
        $objPHPExcel->getActiveSheet()->setCellValue('M6', 'Telefono del Productor');

        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(10);
        $objPHPExcel->getActiveSheet()->setCellValue('N6', 'Categoria');

        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(10);
        $objPHPExcel->getActiveSheet()->setCellValue('O6', 'subcategoria');

        $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(10);
        $objPHPExcel->getActiveSheet()->setCellValue('P6', 'codcaso');

        $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(10);
        $objPHPExcel->getActiveSheet()->setCellValue('Q6', 'personas beneficiadas');

        $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(10);
        $objPHPExcel->getActiveSheet()->setCellValue('R6', 'Poblacion Beneficiada');
        //Recorremos los resultados de la consulta y los imprimimos

        foreach ($data as $key => $value) {

            $objPHPExcel->getActiveSheet()->setCellValue('A' . $fila, $value->id_requerimiento);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $fila, $value->nombre_proyecto);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $fila, $value->descripcion);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $fila, $value->estado);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $fila, $value->municipio);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $fila, $value->parroquia);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $fila, $value->direccion);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $fila, $value->estatus_proyecto);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $fila, $value->nombres . " " . $value->apellidos);
            $objPHPExcel->getActiveSheet()->setCellValue('J' . $fila, $value->email);
            $objPHPExcel->getActiveSheet()->setCellValue('K' . $fila, $value->codrif . $value->numero_rif);
            $objPHPExcel->getActiveSheet()->setCellValue('M' . $fila, $value->telefono . "-" . $value->telefono2);
            $objPHPExcel->getActiveSheet()->setCellValue('N' . $fila, $value->categoria);
            $objPHPExcel->getActiveSheet()->setCellValue('O' . $fila, $value->subcategoria);
            $objPHPExcel->getActiveSheet()->setCellValue('P' . $fila, $value->codcaso);
            $objPHPExcel->getActiveSheet()->setCellValue('Q' . $fila, $value->personas_beneficiadas);
            $objPHPExcel->getActiveSheet()->setCellValue('R' . $fila, $value->poblacion_beneficiada);

            $fila++; //Sumamos 1 para pasar a la siguiente fila
            # code...
        }

        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header('Content-Disposition: attachment;filename="Proyectos.xlsx"');
        header('Cache-Control: max-age=0');
        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $writer->save('php://output');

    }

    public function pdfproyecto()
    {

        $id = $data['segmento'] = $this->uri->segment(3);
        $response = $this->ProyectoModel->getProyectoId($id);
        $responseCom = $this->ComplementosModel->getComplementosProyectoId($id);
        
        $datos = $response['data'][0];
        $dataCom = $responseCom['data'];
        
        $htmlCom =array(
            'insumos' => '',
            'herramientas' => '',
            'maquinas' => '',
            'mobiliario' => ''
        );
        foreach($dataCom as $com)
        {
            if($com->id_tipo_complemento == 1)
            {
                $htmlCom['insumos'].='
                '.$com->concepto.', 
                ';
            }
            else if($com->id_tipo_complemento == 2)
            {
                $htmlCom['herramientas'].='
                '.$com->concepto.', 
                ';
            }
            else if($com->id_tipo_complemento == 3)
            {
                $htmlCom['maquinas'].='
                '.$com->concepto.', 
                ';
            }
            else if($com->id_tipo_complemento == 4)
            {
                $htmlCom['mobiliario'].='
                '.$com->concepto.', 
                ';
            }
        }


            $imagenes = get_filenames(APPPATH."storage/$id/");
            $url=base_url()."application/storage/$id/";

        $css = file_get_contents('./public/css/csstablas.css');

        $mpdf = new \Mpdf\Mpdf();

        $mpdf->writeHTML($css, 1);
        $html = '
	   	<div>
	   		<img src="public/img/banner.png">
	   	</div>

	   	<table class="tabla" id="tabla">
		<tbody>	   
		   	<tr>
				<th colspan="6" class="headt" style="color: #fff"> Datos del proyecto </th>
		   	</tr>

		   	<tr>
			   <th class="titulo" > Nombre del Proyecto: </th>
			   <td colspan="6"> ' . $datos->nombre . '.</td>
		   	</tr>

		   	<tr>
			   <th class="titulo" > Codigo: </th>
			   <td colspan="6">' . $datos->codcaso . '</td>
		   	</tr>

	 		<tr>
			   <th class="titulo"> Descripción del Proyecto: </th>
			   <td colspan="6"> ' . $datos->descripcion . '</td>
			</tr>

			<tr>
				<th class="titulo"  colspan="3" > Categoria </th>
				<th class ="titulo" colspan="3"> Ambito </th>
			</tr>

			<tr>
				<td colspan="3">' . $datos->categoria . '</td>
				<td colspan="3">' . $datos->subcategoria . '</td>
			</tr>

 			<tr>
 				<th class="titulo"  colspan="3" > Personas beneficiadas </th>
 				<th class="titulo" colspan="3"> Población Beneficiada </th>
			</tr>

			<tr>
				<td colspan="3">' . $datos->personas_beneficiadas . '</td>
				<td colspan="3">' . $datos->poblacion_beneficiada . '</td>
			</tr>

			<tr>
			   <th class="titulo">Situación Actual: </th>
			   <td colspan="6">' . $datos->estatus_proyecto . '</td>
		   	</tr>

	 		<tr>
		   	   <th colspan="6" class="headt" style="color: #fff"> Ubicación Geográfica </th>
			</tr>

	 		<tr>
		   		<th class="titulo">Estado: ' . $datos->estado . '</th>
				<th class="titulo">Municipio: ' . $datos->municipio . '</th>
				<th class="titulo" colspan="6">Parroquia: ' . $datos->parroquia . '</th>
			</tr>
		
			<tr>
		   		<th class="titulo">Dirección: </th>
		   		<td colspan="6"><strong>' . $datos->direccion . '</strong></td>
	 		</tr>

		   	<tr>
				<th colspan="6" class="headt" style="color: #fff">Datos del productor </th>
		   	</tr>

			<tr>
		   		<th class="titulo">Nombres y Apellidos: </th>
			   	<td colspan="6">' . $datos->nombres . '  ' . $datos->apellidos . '</td>
		   	</tr>

	 		<tr>
				<th class="titulo">Telefono:  </th>
			   	<td colspan="6">' . $datos->telefono . '</td>
	 		</tr>
	
	 		<tr>
		   		<th class="titulo"> Correo: </th>
			   	<td colspan="6">' . $datos->email . '</td>
	  		</tr>
	
	  		<tr>
	  			<th class="titulo">Profesión / Oficio </th>
				<th class="titulo">Sexo: </th>
				<th class="titulo" colspan="6"> Fecha de Nacimiento </th>
			</tr>
		
			<tr>
		   		<td class="titulo">' . $datos->profesion . '</td>
	 			<td class="titulo">' . $datos->sexo . '</td>
	 			<td colspan="6">' . $datos->fecha_nac . '</td>
	 		</tr>

			<tr>
		   		<th colspan="6" class="headt" style="color: #fff"> Unidad de Producción </th>
			</tr>

		   	<tr>
		   		<th class="titulo"> Rif:  </th>
			   	<td colspan="6">' . $datos->codrif . '-' . $datos->numero_rif . '</td>
		   	</tr>

		   	<tr>
		   		<th class="titulo"> Nombre empresa:  </th>
			   	<td colspan="6">' . $datos->nombre_empresa . '</td>
		   	</tr>

		   	<tr>
		   		<th class="titulo"> Teléfono:  </th>
			   	<td colspan="6">' . $datos->telefono . '</td>
		   	</tr>

			<tr>
		   		<th class="titulo"> Codigo Situr </th>
				<th class="titulo">Codigo Sunagro</th>
	 			<th class="titulo" colspan="6"> Institución Responsable </th>
	 		</tr>

			<tr>
	 			<td>' .$datos->codigo_situr . '</td>
				<td>' .$datos->codigo_sunagro. '</td>
				<td colspan="6">' .$datos->institucion. '</td>
			</tr>

            <tr>
				<th colspan="6" class="headt" style="color: #fff"> Espacios y Edificación </th>
			</tr>

			<tr>
				<th class="titulo"> Edificación </th>
				<th class="titulo"> Area de Terreno (M2) </th>
				<th class="titulo"> Area de Construcción (M2) </th>
                <th class="titulo"> Area de Almacenamiento (M2) </th>
				<th class="titulo" colspan="3"> Instalaciones Sanitarias </th>
			</tr>

			<tr>
				<td> ' .$datos->edificacion. 	' </td>
				<td> ' .$datos->area_terreno. 	' </td>
				<td> ' .$datos->area_construccion. 	' </td>
                <td>'.$datos->area_almacenamiento.'</td>
				<td colspan="3">' .$datos->servicios_sanitarios. '</td>
			</tr>

			<tr> 
				<th class="titulo" colspan="6"> Obervaciones </th>
			</tr>

			<tr> 
				<td colspan="6">' .$datos->observaciones. '</td>
			</tr>

			<tr>
				<th colspan="6" class="headt" style="color: #fff"> Servicios Publicos </th>
			</tr>
			
			<tr>
				<th class="titulo"> Aguas Blancas </th>
				<th class="titulo"> Vialidad </th>
				<th class="titulo"> Tiene Aseo Urbano </th>
				<th class="titulo" colspan="3"> Aguas Servidas </th>
			</tr>

			<tr>
				<td>' .$datos->acometida_agua_blanca . '</td>
				<td> ' .$datos->vialidad. '</td>
				<td>' . $datos->aceo_urbano . '</td>
				<td colspan="3">' .$datos->acometida_agua_negra . '</td>
			</tr>

			<tr>
				<th class="titulo" colspan="3"> Servicio de Gas </th>
				<th class="titulo" colspan="4"> Servicio Electrico </th>
			</tr>

			<tr>
				<td colspan="3">  ' . $datos->servicios_gas. '</td>
				<td colspan="4">  ' . $datos->servicio_electrico . '</td>
			</tr>
        
			<tr>
				<th colspan="6" class="headt" style="color: #fff"> Producción y Operatividad </th>
			</tr>

            <tr>
				<th class="titulo"> Materia Prima e Insumos </th>
                <th class="titulo"> Herramientas y Equipos de Trabajo </th>
                <th class="titulo"> Maquinas y Equipos Tecnologicos </th>
                <th class="titulo" colspan="3"> Mobiliario y Equipos Complementarios </th>
                    <tr>
                        <td>'.$htmlCom['insumos'].'</td>
                        <td>'.$htmlCom['herramientas'].' </td>
                        <td>'.$htmlCom['maquinas'].'</td>
                        <td colspan="3">'.$htmlCom['mobiliario'].'</td>
                    </tr>
            </tr>
        
			<!--tr>
				<th colspan="6" class="headt" style="color: #fff"> Estructura de Costos </th>
			</tr>

			<tr>
				<th class="titulo"> Materia Prima e Insumos </th>
				<th class="titulo"> Herramientas y Equipos de Trabajo </th>
				<th class="titulo"> Maquinas y Equipos Tecnologicos </th>
				<th class="titulo"> Mobiliario y Equipos Complementarios </th>
				<th class="titulo"> Mano de Obra </th>
				<th class="titulo"> Servicios </th>
			</tr>

			<tr>
				<td>' . $datos->costoinsumo. ' Bs</td>
				<td>' . $datos->costoherramientas. ' Bs</td>
				<td>' . $datos->costomaquinas. ' Bs</td>
				<td>' . $datos->costomobiliario. ' Bs</td>
				<td>' . $datos->costomanodeobra. ' Bs</td>
				<td>' . $datos->costoservicio. ' Bs</td>
			</tr>

			<tr>
				<th colspan="6" class="headt" style="color: #fff"> Inversión Total </th>
			</tr>

			<tr>
				<td  colspan="6">' . $datos->monto. ' Bs</td>
			</tr>

                <tr>
                <th colspan="6" class="headt" style="color: #fff"> Imagenes</th>
            </tr>

            <tr>';

        
        foreach ($imagenes as $key => $value) {
                  
                
            $html .=" <tr><td  colspan='6'> <img src='".$url.$value."'   >  </td></tr> ";


           } 
   

    $html .=' </tr>
		</tbody>
		</table>';
     $mpdf->WriteHTML($html);

   $mpdf->Output($datos->nombre . '.pdf', 'I');

    }

}
