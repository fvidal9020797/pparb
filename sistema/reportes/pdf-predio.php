<?php
$this->load->library('');
require_once(dirname(__FILE__) . '/../libraries/PHPExcel/Settings.php');

$rendererName = PHPExcel_Settings::PDF_RENDERER_MPDF;
$rendererLibraryPath = dirname(__FILE__) . '/../libraries/mpdf';

$objPHPExcel = new PHPExcel();
  $hostname_mdryt = "localhost";
	$port = 5432;
	$database_mdryt = "dbrestitucion";
        $users="Administrador";
        $p="Adabyron52.";
 $cn = pg_connect("host={$hostname_mdryt} port={$port} dbname={$database_mdryt} user={$users} password={$p}") or trigger_error("Nombre de Usuario o Contrase�a  no v�lidos.",FATAL);
 //$conexion = pg_connect ("jdbc:postgresql://localhost:5432/dbrestitucion?user=Administrador&password=Adabyron52.");  
 //$sql = "SELECT * FROM r_general";

 $resultado = pg_query($cn, $sql);
 $nombrefila= pg_field_name($resultado,1);

 $registros = pg_num_rows ($resultado);
  $num_fields = pg_num_fields($resultado);
$objPHPExcel->getProperties()->setCreator("TEST PDF")
  ->setLastModifiedBy("TEST")
  ->setTitle("TEST PDF")
  ->setSubject("TEST PDF")
  ->setDescription("TEST PDF")
  ->setKeywords("TEST PDF")
  ->setCategory("TEST PDF");

$objPHPExcel->setActiveSheetIndex(0);

// Field names in the first row
$fields = $resultado->list_fields();
$col = 0;
foreach ($fields as $field)
{
 $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
 $col++;
}

// Fetching the table data
$row = 2;
foreach($query->result() as $data)
{
 $col = 0;
 foreach ($fields as $field)
 {
  $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
  $col++;
 }

 $row++;
}

$objPHPExcel->setActiveSheetIndex(0);

if (!PHPExcel_Settings::setPdfRenderer(
  $rendererName,
  $rendererLibraryPath
 ))
{
 die(
  'NOTICE: Please set the $rendererName and $rendererLibraryPath values' .
  '<br />' .
  'at the top of this script as appropriate for your directory structure' . '<br/>' .
  $rendererName . '<br/>' .
  $rendererLibraryPath . '<br/>'
 );
}

// Redirect output to a client’s web browser (PDF)
header('Content-Type: application/pdf');
header('Content-Disposition: attachment;filename="'.$file_name.'.pdf"');
header('Cache-Control: max-age=0');

$objWriter = IOFactory::createWriter($objPHPExcel, 'PDF');
$objWriter->save('php://output');