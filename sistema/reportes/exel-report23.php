<?php
 /* Ejemplo 1 generando excel desde mysql con PHP
    @Autor: Carlos Hernan Aguilar Hurtado
 */
require_once './Conexion.php';
$cn=  Conexion::create();



 $resultado = pg_query($cn->getConexion(), $sql);
 $nombrefila= pg_field_name($resultado,1);

 $registros = pg_num_rows ($resultado);
  $num_fields = pg_num_fields($resultado);
 if ($registros > 0) {
     /** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

date_default_timezone_set('Europe/London');
   /** PHPExcel_IOFactory */
require_once dirname(__FILE__) . '../../libraries/PHPExcel/Classes/PHPExcel/IOFactory.php';


echo date('H:i:s') , " Load from Excel5 template" , EOL;
$objReader = PHPExcel_IOFactory::createReader('Excel5');
$objPHPExcel = $objReader->load("../libraries/PHPExcel/templates/30template.xls");
    
   //Informacion del excel
   $objPHPExcel->
    getProperties()
        ->setCreator("jescobar8711")
        ->setLastModifiedBy("jescobar8711")
        ->setTitle("Exportar excel desde mysql")
        ->setSubject("Cultivo")
        ->setDescription("Documento generado con PHPExcel")
        ->setKeywords("jesus  con  phpexcel")
        ->setCategory("cultivos");    
 
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
                  
                  
                  $objPHPExcel->getActiveSheet()->getStyle(strtoupper(chr(65+$info_columns)).$i)->getNumberFormat()->setFormatCode('0');
                  $objPHPExcel->getActiveSheet()->getColumnDimension(strtoupper(chr(65+$info_columns)))->setAutoSize(true);
//                  $objPHPExcel->getActiveSheet()->getStyle(strtoupper(chr(65+$info_columns)).$i)->applyFromArray($styleArray);
                  $info_offset++; $info_columns++;
        }
     
  
      $i++;
       
   }

//$objPHPExcel->getActiveSheet()->removeRow($baseRow-1,1);


//echo date('H:i:s') , " Write to Excel5 format" , EOL;

//$objWriter->save(str_replace('.php', '.xls', __FILE__));
//echo date('H:i:s') , " File written to " , str_replace('.php', '.xls', pathinfo(__FILE__, PATHINFO_BASENAME)) , EOL;
 header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="ejemplo1.xls"');
header('Cache-Control: max-age=0');
 
//$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;

// Echo memory peak usage
//echo date('H:i:s') , " Peak memory usage: " , (memory_get_peak_usage(true) / 1024 / 1024) , " MB" , EOL;

// Echo done
//echo date('H:i:s') , " Done writing file" , EOL;
//echo 'File has been created in ' , getcwd() , EOL;

}
$mensaje="NO HAY REGISTROS";
