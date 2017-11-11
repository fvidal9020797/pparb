<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/sistema/config/config.php';
/* include "destroy_predio.php"; */
// include "../valid.php";
$mensaje = "";
// include "./codificadores.php";
// include "./politico.php";
// include "./sqlConsulta.php";
// $codificador = new codificadores();
// $politico = new politico();
// $getSql = new sqlConsulta();


if (isset($_REQUEST['action'])) {
    $caso = $_REQUEST['outputtype'];
    // $case = $_REQUEST['caso'];
    // $sql = $getSql->getcosultaByCaso($case);
    switch ($caso) {
        case 'pdf':
            /* inicio descargar en pdf */
            $id = intval($_REQUEST['id']);
             // echo $id;
          // echo  gettype($id);
             // exit();
        require_once APPPATH .'/reportes/ConexionImpresionesRegistro.php';
            //Obtener Fecha de Hoy
    $fecha = time (); 
    $fecha_partir1=date ( "h" , $fecha ) ;
    $fecha_partir2=date ( "i" , $fecha ) ;
    $fecha_partir4=date ( "s" , $fecha ) ;
    $fecha_partir3=$fecha_partir1-1;
    $reporte="Report_muestreo";
    $filename = "Report_muestreo.pdf";
        
    //Llamando las librerias
    require_once('http://localhost:8080/JavaBridge/java/Java.inc');
    require('php-jru/php-jru.php');
    //Llamando la funcion JRU de la libreria php-jru
    $jru=new JRU();
    //Ruta del reporte compilado Jasper generado por IReports
    $Reporte='C://xampp//htdocs//PPARB//sistema//reportes//jasper//Report_muestreo.jasper';
    //Ruta a donde deseo Guardar Mi archivo de salida Pdf
    $SalidaReporte='C://xampp//htdocs//PPARB//sistema//reportes//tmp//'.$filename; 
    //Parametro en caso de que el reporte no este parametrizado
    $Parametro=new java('java.util.HashMap');
    
   // $Parametro->put('URL_IMG', realpath('mdryt.jpg'));
    $Parametro->put("report_parametro_1", $id); 
    
    //Funcion de Conexion a mi Base de datos tipo MySql
    $Cn= new ConexionImpresionesRegistro();
    $Conexion = $Cn->getConexion();
    $jru->runReportToPdfFile($Reporte,$SalidaReporte,$Parametro,$Conexion);

       
    

        // $filename = "Formulario_Ganadero.pdf";
        $file = "C:/xampp/htdocs/PPARB/sistema/reportes/tmp/".$filename;
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/force-download");
      //  header("Content-Length: 409600");
        header("Content-Transfer-Encoding: binary");
        readfile($file);
        
        



            // $filename = 'REPORT_MUESTREO';
            // $japerReport = 'report_muestreo.jasper';
            // $report_parametro_1 = NULL;
            // $report_parametro_2 = NULL;
            // $report_parametro_3 = NULL;
            // $report_parametro_4 = NULL;
            // $report_parametro_5 = NULL;
            // if ($id != "") {
            //     $japerReport = 'report_muestreo.jasper';
            //     $report_parametro_1 = $id;
            //     $filename = 'REPORT_MUESTREO_' . $id;
            // }
            // include("report.inc.php");

            /* fin descargar en pdf */

            break;
        case 'xls':
            $titulo = "INFORME TOTAL DE PREDIOS REGISTRADOS PPARB";
            $filename = 'REPORT_PREDIOS_ALL';
            include("./exel-report.php");
            break;
        case 'html':
            $mensaje = "Funcion no implementada";
            break;
        default:
            break;
    }
}

?>