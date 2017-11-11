<?php
//include PHPExcel library
require_once "../libraries/PHPExcel/Classes/PHPExcel/IOFactory.php";

//load Excel template file
$objTpl = PHPExcel_IOFactory::load("templates/".$filename.".xlsx");
$objTpl->setActiveSheetIndex(0);  //set first sheet as active
 /* Ejemplo 1 generando excel desde mysql con PHP
  @Autor: Jesus Escobar Ovando
 */
require_once './Conexion.php';
$cn = Conexion::create();
   $resultado = pg_query($cn->getConexion(), $sql);
   $registros = pg_num_rows($resultado);
$num_fields = pg_num_fields($resultado);
$objTpl->getActiveSheet()->setCellValue('B3', "Al: ".date('Y-m-d'));  //set B3 to current date
$objTpl->getActiveSheet()->getStyle('C2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT); //C1 is right-justified

if ($registros > 0) {

       $i = 5;


     while ($registro = pg_fetch_object($resultado)) {

        $info_offset = 1;
        $info_columns = 0;

        while ($info_offset <= $num_fields) {

                $n = pg_field_name($resultado, $info_columns);
//
           $objTpl->getActiveSheet()->setCellValue('B'. $i, $n);
            $objTpl->getActiveSheet() ->setCellValue("C". $i, $registro->$n);
            $info_columns++ ;
               $info_offset++;
           $i++;
        }
    }







$objTpl->getActiveSheet()->getStyle('C4')->getAlignment()->setWrapText(true);  //set wrapped for some long text message

//$objTpl->getActiveSheet()->getColumnDimension('C')->setWidth(40);  //set column C width
//$objTpl->getActiveSheet()->getRowDimension('4')->setRowHeight(120);  //set row 4 height
//$objTpl->getActiveSheet()->getStyle('A4:C4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP); //A4 until C4 is vertically top-aligned

//prepare download
//$filename=mt_rand(1,100000).'.xls'; //just some random filename
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$filename.'.xls"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objTpl, 'Excel5');  //downloadable file is in Excel 2003 format (.xls)
$objWriter->save('php://output');  //send it to user, of course you can save it to disk also!

exit; //done.. exiting!
}
$mensaje = "NO HAY REGISTROS";
