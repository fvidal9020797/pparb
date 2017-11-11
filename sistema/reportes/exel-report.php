<?php

/* Ejemplo 1 generando excel desde mysql con PHP
  @Autor: Breidy Billy Leanos
 */
require_once './Conexion.php';
$cn = Conexion::create();
$resultado = pg_query($cn->getConexion(), $sql);
//$nombrefila= pg_field_name($resultado,3);
//$nombretipodato= pg_field_type($resultado,3);

$registros = pg_num_rows($resultado);
$num_fields = pg_num_fields($resultado);
if ($registros > 0) {

    require_once '../libraries/PHPExcel/Classes/PHPExcel.php';
    //require_once '../libraries/PHPExcel/Classes/PHPExcel/Cell/AdvancedValueBinder.php';
    $objPHPExcel = new PHPExcel();
    $estiloTituloReporte = array(
        'font' => array(
            'name' => 'Verdana',
            'bold' => true,
            'italic' => false,
            'strike' => false,
            'size' => 16,
            'color' => array(
                'rgb' => 'FFFFFF'
            )
        ),
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array(
                'argb' => '023927')
        ),
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_NONE
            )
        ),
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            'rotation' => 0,
            'wrap' => false
        )
    );

    $estiloTituloColumnas = array(
        'font' => array(
            'name' => 'Arial',
            'bold' => true,
            'color' => array(
                'rgb' => 'FFFFFF'
            )
        ),
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
            'rotation' => 90,
            'startcolor' => array(
                'rgb' => '009966'
            ),
            'endcolor' => array(
                'argb' => 'FF431a5d'
            )
        ),
        'borders' => array(
            'top' => array(
                'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
                'color' => array(
                    'rgb' => '143860'
                )
            ),
            'bottom' => array(
                'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
                'color' => array(
                    'rgb' => '143860'
                )
            )
        ),
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            'wrap' => TRUE
        )
    );

    $estiloInformacion = new PHPExcel_Style();
    $estiloInformacion->applyFromArray(array(
        'font' => array(
            'name' => 'Arial',
            'color' => array(
                'rgb' => '000000'
            )
        ),
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array(
                'argb' => 'FFd9b7f4')
        ),
        'borders' => array(
            'left' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN,
                'color' => array(
                    'rgb' => '3a2a47'
                )
            )
        )
    ));
    //Informacion del excel
    $objPHPExcel->
            getProperties()
            ->setCreator("BLeanos")
            ->setLastModifiedBy("BLeanos")
            ->setTitle("by Breidy Billy Leanos")
            ->setSubject("nose")
            ->setDescription("Documento generado con PHPExcel")
            ->setKeywords("jesus  con  phpexcel")
            ->setCategory("cultivos");
    $idregistro = "";
    $i = 3;
    $i1 = $i - 1;
    $a = 65;
    $gloval_i=3;
    /* @var $filanumerica type */
    $filanumerica=array();
    $fil=strtoupper(chr(65 + ($num_fields/2))) ;
    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue($fil.'1', $titulo);
    $info_offset1 = 1;
    $info_columns1 = 0;
      $info_columns__1 = 0;
// Inmovilizar paneles
//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,3);
    while ($info_offset1 <= $num_fields) {

        if ($info_columns1>25) {
             $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue(strtoupper(chr(65).chr(65 + $info_columns__1)) . $i1, pg_field_name($resultado, $info_columns1));

           // echo strtoupper(chr(65).chr(65 + $info_columns__1));
          $objPHPExcel->getActiveSheet()->getColumnDimension(strtoupper(chr(65).chr(65 + $info_columns__1)))->setWidth(20);
         $nombretipodato= pg_field_type($resultado,$info_columns1);

         if ($nombretipodato=="numeric" ||$nombretipodato=="float8") {
           array_push($filanumerica,strtoupper(chr(65).chr(65 + $info_columns__1)));
        }
          $info_columns__1++;
        }  else {
           // echo strtoupper(chr(65 + $info_columns1));
               $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue(strtoupper(chr(65 + $info_columns1)) . $i1, pg_field_name($resultado, $info_columns1));
        // $objPHPExcel->getActiveSheet()->getColumnDimension(strtoupper(chr(65+$info_columns1)))->setAutoSize(true);

        $objPHPExcel->getActiveSheet()->getColumnDimension(strtoupper(chr(65 + $info_columns1)))->setWidth(20);

             $nombretipodato= pg_field_type($resultado,$info_columns1);

        if ($nombretipodato=="numeric" ||$nombretipodato=="float8") {
           array_push($filanumerica,strtoupper(chr(65 + $info_columns1)));
        }

        }

         $info_columns1++;
        $info_offset1++;

    }
   // exit();
    while ($registro = pg_fetch_object($resultado)) {

        $info_offset = 1;
        $info_columns = 0;
        $info_columns__ = 0;

        while ($info_offset <= $num_fields) {
            if ($info_columns>25) {
                $n = pg_field_name($resultado, $info_columns);
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue(strtoupper(chr(65).chr(65 + $info_columns__)) . $i, $registro->$n);
//                  $objPHPExcel->getActiveSheet()->getStyle(strtoupper(chr(65+$info_columns)).$i)->applyFromArray($styleArray);

            // $objPHPExcel->setActiveSheetIndex(0)->getColumnDimension($i)->setAutoSize(TRUE);
            // $objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(20);

          if ($info_offset<=2) {
              $objPHPExcel->getActiveSheet()->getStyle(strtoupper(chr(65).chr(65+$info_columns__)).$i)->getNumberFormat()->setFormatCode('0');
              }
               $info_columns__++ ;
            }else{
            $n = pg_field_name($resultado, $info_columns);
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue(strtoupper(chr(65 + $info_columns)) . $i, $registro->$n);
//                  $objPHPExcel->getActiveSheet()->getStyle(strtoupper(chr(65+$info_columns)).$i)->applyFromArray($styleArray);

            // $objPHPExcel->setActiveSheetIndex(0)->getColumnDimension($i)->setAutoSize(TRUE);
            // $objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(20);

          if ($info_offset<=2) {
              $objPHPExcel->getActiveSheet()->getStyle(strtoupper(chr(65+$info_columns)).$i)->getNumberFormat()->setFormatCode('0');
              }

            }
            $info_columns++ ;
               $info_offset++;

        }


        $i++;
        $gloval_i=$i;
    }
    if ($info_columns1>26) {
          $e = strtoupper(chr(65).chr(65 + $info_columns__1 - 1));
    }else{
         $e = strtoupper(chr(65 + $info_columns1 - 1));
    }


    $objPHPExcel->getActiveSheet()->getStyle('A1:' . $e . '1')->applyFromArray($estiloTituloReporte);
    //   $objPHPExcel->getActiveSheet()->getStyle('A2:'.$e.'2')->applyFromArray($estiloTituloReporte);
    // $objPHPExcel->getActiveSheet()->getStyle('A3:'.$e.'3')->applyFromArray($estiloTituloReporte);
    //  $objPHPExcel->getActiveSheet()->getStyle('A4:'.$e.'4')->applyFromArray($estiloTituloReporte);
    $objPHPExcel->getActiveSheet()->getStyle('A2:' . $e . '2')->applyFromArray($estiloTituloColumnas);
///$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A3:".$e.($i-1));
    // Set the page layout view as page layout

    $objPHPExcel->getActiveSheet()->getSheetView()->setView(PHPExcel_Worksheet_SheetView::SHEETVIEW_PAGE_BREAK_PREVIEW);
   foreach( $filanumerica as $value )
{
       $g=$gloval_i-1;
       $formula1 = '=SUMA('.$value.'3:'.$value.$g.')';
//          $objPHPExcel->setActiveSheetIndex(0)
//                    ->setCellValue($value. $gloval_i, $formula1);
//       $formula = $objPHPExcel->getActiveSheet(0)->getCell($value. $gloval_i)->getValue();
//       $internalFormula = PHPExcel_Calculation::getInstance()->_translateFormulaToEnglish($formula);


       $formula ='=SUMA('.$value.'3:'.$value.$g.')';
$internalFormula = PHPExcel_Calculation::getInstance()->_translateFormulaToEnglish($formula);
$objPHPExcel->getActiveSheet(0)->setCellValue($value. $gloval_i,$internalFormula);
//$objPHPExcel->getActiveSheet()->getCell($value. $gloval_i)->getCalculatedValue();
//
  //     echo "Value is $formula <br />";
}
  //  exit();
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="'.$titulo.'.xlsx"');
    header('Cache-Control: max-age=0');

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');
    exit;
}
$mensaje = "NO HAY REGISTROS";
