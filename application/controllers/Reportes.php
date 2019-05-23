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
        $datos = $response['data'][0];

        $css = file_get_contents('./public/css/csstablas.css');

        $mpdf = new \Mpdf\Mpdf();

        $mpdf->SetHTMLHeader('
	   <div style="text-align: center; font-weight: bold; margin-buttom:20px;">

	   <br>
	   </div>');
        $mpdf->writeHTML($css, 1);
        $html = '
	   <div style="text-align: center; font-weight: bold; margin-buttom:20px;">
	   <img src="public/img/banner.png" alt="">
	   <br>
	   </div>

	   <table class="table" id="tabla">
	   <thead>
		   <tr>

			   <th colspan="4" class="headt" ><span class="center">Datos del proyecto   </span></th>
		   </tr>
	   </thead>

	   <tbody>
		   <tr>
			   <th class="titulo" ><strong>Nombre del Proyecto: </strong></th>
			   <td  colspan="3"> ' . $datos->nombre . '.          </td>

		   </tr>
		   <tr>
			   <th class="titulo" ><strong>Codigo: </strong></th>
			   <td  colspan="3">' . $datos->codcaso . '        </td>

		   </tr>

	 <tr>
			   <th class="titulo">Descripción del Proyecto: </th>
				   <td   colspan="3"> ' . $datos->descripcion . '</td>

	</tr>



		<tr>
			<th class="titulo"  colspan="2" >Categoria</th>
				<th   colspan="2">Ambito</th>
		</tr>
<tr>
<td colspan="2">
' . $datos->categoria . '
</td>
<td colspan="2">
' . $datos->subcategoria . '
</td>
</tr>

 <tr>
 <th class="titulo"  colspan="2" >Personas beneficiadas</th>
 <th   colspan="2">Población Beneficiada</th>
</tr>
<tr>
<td colspan="2">
' . $datos->personas_beneficiadas . '
</td>
<td colspan="2">
' . $datos->poblacion_beneficiada . '
</td>
</tr>



		   <tr>
		   <th class="titulo">Situación Actual: </th>
			   <td   colspan="3"> ' . $datos->estatus_proyecto . '</td>
		   </tr>

	 <tr>
		   <th colspan="4" class="headt" ><span class="center">Ubicación Geográfica</span></th>
	</tr>

	 <tr>
		   <th class="titulo">Estado: <strong> ' . $datos->estado . '</strong></th>



		   <th class="titulo">Municipio: <span> ' . $datos->municipio . '</span></td>

			   <td colspan="2"><strong>Parroquia: </strong>' . $datos->parroquia . ' </td>
	</tr>

	  <tr>


	<tr>
		   <th class="titulo">Dirección </th>
		   <td colspan="3">' . $datos->direccion . ' </td>
	 </tr>

		   <tr>


			   <th colspan="4" class="headt" ><span class="center">Datos del productor </span></th>
		   </tr>

		   <tr>
		   <th class="titulo">Nombres </th>
			   <td colspan="3">
			   ' . $datos->nombres . '  ' . $datos->apellidos . '
			   </td>
		   </tr>

	 <tr>
		<th class="titulo">Telefono:  </th>
			   <td colspan="3">' . $datos->telefono . '
			   </td>
	 </tr>
	
	 <tr>
		   <th class="titulo">Correo:  </th>
			   <td colspan="3">' . $datos->email . '  </td>
	  </tr>
	
	  <tr>
	  <th class="titulo">Profesión / Oficio <strong> </strong></th>



	  <th class="titulo">Sexo:<span> </span></td>

		  <td colspan="2"><strong>Fecha de Nacimiento		  </strong></td>
</tr>
		   <tr>

		   <tr>
		   <td class="titulo">' . $datos->profesion . '  </strong></td>
	 
	 
	 
		   <td class="titulo">' . $datos->sexo . '</td>
	 
			   <td colspan="2">' . $datos->fecha_nac . '	  </td>
	 </tr>
				<tr>
		   <th colspan="4" class="headt" ><span class="center"> Unidad de Producción </span></th>

		   </tr>

		   <tr>
		   <th class="titulo">Rif:  </th>
			   <td colspan="3">' . $datos->codrif . '-' . $datos->numero_rif . '</td>
		   </tr>

		   <tr>
		   <th class="titulo">Nombre empresa:  </th>
			   <td colspan="3">
			   ' . $datos->nombre_empresa . '
			   </td>
		   </tr>
		   <tr>
		   <th class="titulo">Teléfono:  </th>
			   <td colspan="3">  ' . $datos->telefono_empresa . '</td>
		   </tr>

		<tr>
		   <th class="titulo"> Codigo Situr </th>
	 
	 
	 
		   <th class="titulo">Codigo Sunagro</th>
	 
			   <th colspan="2">   Institución Responsable	  </th>
	 </tr>


	 <tr>
	 <td class="titulo">   ' .$datos->codigo_situr . ' </td>



	 <td class="titulo"> ' .$datos->codigo_sunagro. '</td>

		 <td colspan="2">   ' .$datos->institucion. '  </td>
</tr>



	   </tbody>
	   </table>

	';

	$html .=' 
	<br>  
	<div style="text-align: center; font-weight: bold; margin-buttom:20px;">
	<img src="public/img/banner.png" alt="">
	
	</div>	
	<table class="table" id="tabla">
	<tbody>	
			<tr>

				<th colspan="5" class="headt" ><span class="center">Espacios y Edificación
				</span></th>
			</tr>
				
			
			<tr>

			<th> Edificación </th>
			<th> Area de Terreno (M2) </th>
			<th> Area de Construcción (M2) </th>
			<th  colspan="2"> Instalaciones Sanitarias </th>
			</tr>

			<tr>

			<td> ' .$datos->institucion. 	' </td>
			<td> ' .$datos->area_terreno. 	' </td>
			<td> ' .$datos->edificacion. 	' </td>
			<td colspan="2"> ' .$datos->servicios_sanitarios. ' </td>
			</tr>

			<tr> 

			<td colspan="5">  Obervaciones </td>
			</tr>
			<tr> 
			<td colspan="5">  ' .$datos->observaciones. ' </td>
			</tr>
			<tr>

			<th colspan="5" class="headt" ><span class="center">Servicios Publicos

			</span></th>
		</tr>

					
		<tr>

		<th>  Aguas Blancas </th>
		<th> Vialidad </th>
		<th>Tiene Aseo Urbano </th>
		<th colspan="2"> Aguas Servidas </th>
		</tr>

		<tr>

		<th>' .$datos->acometida_agua_blanca . ' </th>
		<th> ' .$datos->vialidad. '</th>
		<th>' . $datos->aceo_urbano . ' </th>
		<th colspan="2"> Instalaciones Sanitarias' .$datos->acometida_agua_negra . ' </th>
		</tr>

		<tr>
		<th colspan="3">  Servicio de Gas </th>
		
		<th colspan="2">  Servicio Electrico </th>
		</tr>

		<tr>
		<th colspan="3">  ' . $datos->servicios_gas. '</th>
		
		<th colspan="2">  ' . $datos->servicio_electrico . ' </th>
		</tr>
		<tr>
		<th colspan="5" class="headt" ><span class="center"> Producción y Operatividad</span></th>
		

	</tr>

	<tr>

	<th> Capacidad de Produccion Instalada </th>
	<th> Capacidad de Produccion Actual </th>
	<th>Unidad ( metrica ) </th>
	<th colspan="2"> Funcionamiento Operativo</th>
	</tr>

	<tr>

	
	<tr>

	<td> ' . $datos->capacidad_instalada. ' </td>
	<td>  ' . $datos->cap_produccion_actual. '  </td>
	<td>' .  $datos->unidad_metrica. '  </td>
	<td colspan="2">  ' .  $datos->funcionamiento_operativo. '</td>
	</tr>

	
	<tr>

	<th colspan="5" class="headt" ><span class="center"> Inversión Fragmentada</span></th>
	<tr>

	<th> Infraestructura (Bs) </th>
	<th> Maquinaria, Equipos y Herramientas (Bs) </th>
	<th>Insumos, Equipos y Materias Primas (Bs)</th>
	<th>Fuerza de Trabajo (Bs)</th>
	<th>Servicios(Bs)</th>
	</tr>

	<tr>
	<td> 0 </td>
	<td> 0 </td>
	<td>0</td>
	<td>0</td>
	<td>0</td>
	</tr>

	<tr>
	<th colspan="5" class="headt" ><span class="center"> Inversión Total</span></th>
	</tr>

	<tr>
	<td  colspan="5"> 0 </td>

	</tr>

</tbody>
			</table>';
        $mpdf->WriteHTML($html);

        $mpdf->Output($datos->codcaso . '.pdf', 'I');

    }

}
