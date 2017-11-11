<?php
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.8.0, 2014-03-02
 */

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once dirname(__FILE__) . '../../libraries/PHPExcel/Classes/PHPExcel.php';


//	Change these values to select the Rendering library that you wish to use
//		and its directory location on your server
//$rendererName = PHPExcel_Settings::PDF_RENDERER_TCPDF;
//$rendererName = PHPExcel_Settings::PDF_RENDERER_MPDF;
$rendererName = PHPExcel_Settings::PDF_RENDERER_DOMPDF;
//$rendererLibrary = 'tcPDF5.9';
//$rendererLibrary = 'dompdf';
$rendererLibrary = 'dompdf';
$rendererLibraryPath = dirname(__FILE__).'../../libraries/PDF/' . $rendererLibrary;


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("PDF Test Document")
							 ->setSubject("PDF Test Document")
							 ->setDescription("Test document for PDF, generated using PHP classes.")
							 ->setKeywords("pdf php")
							 ->setCategory("Test result file");


// Add some data
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
 if ($registros > 0) {
     
     
  $i = 6;
   $i1=$i-1;
   $a=65;
   $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('C2', $titulo);
    $info_offset1  = 1;
         $info_columns1  = 0;

        while ($info_offset1 <= $num_fields) {
                  $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue(strtoupper(chr(65+$info_columns1)).$i1,pg_field_name($resultado,$info_columns1));
                 $info_offset1++; $info_columns1++;
        }
   while ($registro = pg_fetch_object ($resultado)) {
        
          $info_offset  = 1;
         $info_columns  = 0;

        while ($info_offset <= $num_fields) {
             $n=pg_field_name($resultado,$info_columns);
                  $objPHPExcel->setActiveSheetIndex(0)
                         
            ->setCellValue(strtoupper(chr(65+$info_columns)).$i,$registro->$n);
                 $info_offset++; $info_columns++;
               // echo strtoupper(chr(65+$info_columns)).$i;
                //echo $registro->$n;
                //echo '//';
        }
      //echo '</br>';
  
      $i++;
       
   }
}
//exit();
//$objPHPExcel->setActiveSheetIndex(0)
//            ->setCellValue('A1', 'Hello')
//            ->setCellValue('B2', 'world!')
//            ->setCellValue('C1', 'Hello')
//            ->setCellValue('D2', 'world!');
//
//// Miscellaneous glyphs, UTF-8
//$objPHPExcel->setActiveSheetIndex(0)
//            ->setCellValue('A4', 'Miscellaneous glyphs')
//            ->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Simple');
$objPHPExcel->getActiveSheet()->setShowGridLines(false);

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


if (!PHPExcel_Settings::setPdfRenderer(
		$rendererName,
		$rendererLibraryPath
	)) {
	die(
		'NOTICE: Please set the $rendererName and $rendererLibraryPath values' .
		'<br />' .
		'at the top of this script as appropriate for your directory structure'
	);
}


// Redirect output to a client’s web browser (PDF)
header('Content-Type: application/pdf');
header('Content-Disposition: attachment;filename="01simple1.pdf"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');
 $objWriter->save(__DIR__."/test1.xls");
$objWriter->save('php://output');
exit;
