<?php
//require_once $_SERVER['DOCUMENT_ROOT'] . '/sistema/config/config.php';


$id_= (int)"84";
       $resultado="si"; 
    $id_= $_POST["idasig"];
    $id_=(int)$id_;
      //echo "entrooo1=".$id_;
        
        require('ConexionImpresionesRegistro.php');
        $filename = "Acta_devolucion.pdf";

         //echo "entrooo2=".$id_;
	//Llamando las librerias
	require_once('http://localhost:8080/JavaBridge/java/Java.inc');
	require('../reportes/php-jru/php-jru.php');
	//Llamando la funcion JRU de la libreria php-jru
	$jru=new JRU();
	//Ruta del reporte compilado Jasper generado por IReports
        //echo "entrooo3=".$id_;

	$Reporte='C://xampp//htdocs//PPARB//sistema//reportes//activos-fijos//acta_devolucion.jasper';
	//Ruta a donde deseo Guardar Mi archivo de salida Pdf
	$SalidaReporte='C://xampp//htdocs//PPARB//sistema//reportes//activos-fijos//'.$filename;
	//Parametro en caso de que el reporte no este parametrizado
	$Parametro=new java('java.util.HashMap');
 //echo "entrooo4=".$id_;
 
    //$Parametro->put('URL_IMG', realpath('mdryt.jpg'));
	$Parametro->put("idasignacion", $id_);
 //echo "entrooo5=".$id_;
	$Cn= new ConexionImpresionesRegistro();
	$Conexion = $Cn->getConexion();
        
        // echo "entrooo6=".$id_;
        // echo "repor=".$Reporte;
        // echo "salrepor=".$SalidaReporte;
        // echo "para=".$Parametro;
        // echo "conx=".$Conexion;
         
	$jru->runReportToPdfFile($Reporte,$SalidaReporte,$Parametro,$Conexion);


 //echo "entrooo7=".$id_;

        $filename = "Acta_devolucion.pdf";
        $file = "C:/xampp/htdocs/PPARB/sistema/reportes/activos-fijos/".$filename;
        
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/force-download");
      ///  header("Content-Length: 409600");
        header("Content-Transfer-Encoding: binary");
        readfile($file);

        
        
?>

<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
 