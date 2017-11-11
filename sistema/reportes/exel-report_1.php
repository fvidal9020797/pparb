<?php
 /* Ejemplo 1 generando excel desde mysql con PHP
    @Autor: Carlos Hernan Aguilar Hurtado
 */
  $hostname_mdryt = "localhost";
	$port = 5432;
	$database_mdryt = "dbrestitucion";
        $users="Administrador";
        $p="jesus";
 $cn = pg_connect("host={$hostname_mdryt} port={$port} dbname={$database_mdryt} user={$users} password={$p}") or trigger_error("Nombre de Usuario o Contrase�a  no v�lidos.",FATAL);
 //$conexion = pg_connect ("jdbc:postgresql://localhost:5432/dbrestitucion?user=Administrador&password=Adabyron52.");  
 //$sql = "SELECT * FROM r_cultivo";

 $resultado = pg_query($cn, $sql);
 $nombrefila= pg_field_name($resultado,1);

 $registros = pg_num_rows ($resultado);
  $num_fields = pg_num_fields($resultado);
 if ($registros > 0) {
   require_once '../libraries/PHPExcel/Classes/PHPExcel.php';
   $objPHPExcel = new PHPExcel();
    
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
                 $info_offset++; $info_columns++;
        }
     
  
      $i++;
       
   }
   header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="ejemplo1.xls"');
header('Cache-Control: max-age=0');
 
$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
$objWriter->save('php://output');
exit;

}
$mensaje="NO HAY REGISTROS";
