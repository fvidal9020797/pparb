<?php

function ImprimirRCIA($CodigoParcela, $ano)
	{
    require('ConexionImpresionesRegistro.php');
    $filename = "Formulario_RCIA.pdf";

	//Llamando las librerias
	require_once('http://localhost:8080/JavaBridge/java/Java.inc');
	require('php-jru/php-jru.php');
	//Llamando la funcion JRU de la libreria php-jru
	$jru=new JRU();
	//Ruta del reporte compilado Jasper generado por IReports


	$Reporte='C://xampp//htdocs//PPARB//sistema//reportes//reportes-monitoreo//RCIA//'.$ano.'//Predio_RCIA.jasper';
	//Ruta a donde deseo Guardar Mi archivo de salida Pdf
	$SalidaReporte='C://xampp//htdocs//PPARB//sistema//reportes//reportes-monitoreo//'.$filename;
	//Parametro en caso de que el reporte no este parametrizado
	$Parametro=new java('java.util.HashMap');

    //$Parametro->put('URL_IMG', realpath('mdryt.jpg'));
	$Parametro->put("CODIGO_PARCELA", $CodigoParcela);

	$Cn= new ConexionImpresionesRegistro();
	$Conexion = $Cn->getConexion();
	$jru->runReportToPdfFile($Reporte,$SalidaReporte,$Parametro,$Conexion);




        $filename = "Formulario_RCIA.pdf";
        $file = "C:/xampp/htdocs/PPARB/sistema/reportes/reportes-monitoreo/".$filename;
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/force-download");
       // header("Content-Length: 409600");
        header("Content-Transfer-Encoding: binary");
        readfile($file);


}





?>
