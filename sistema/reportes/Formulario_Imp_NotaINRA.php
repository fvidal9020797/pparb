<?php


function ImprimirNotaINRA($idnota)
	{
	require('ConexionImpresionesRegistro.php');

    $filename = "Nota_de_RemisionINRA.pdf";

	require_once('http://localhost:8080/JavaBridge/java/Java.inc');
	require('php-jru/php-jru.php');
	//Llamando la funcion JRU de la libreria php-jru
	$jru=new JRU();
	//Ruta del reporte compilado Jasper generado por IReports
	$Reporte='C://xampp//htdocs//PPARB//sistema//reportes//reporte-notas//Formulario_Nota_INRA.jasper';
	//Ruta a donde deseo Guardar Mi archivo de salida Pdf
	$SalidaReporte='C://xampp//htdocs//PPARB//sistema//reportes//reporte-notas//'.$filename;
	//Parametro en caso de que el reporte no este parametrizado
	$Parametro=new java('java.util.HashMap');

    //$Parametro->put('URL_IMG', realpath('mdryt.jpg'));
	$Parametro->put("ParametroIdNota", $idnota);


	$Cn= new ConexionImpresionesRegistro();
	$Conexion = $Cn->getConexion();
	//$jru->runReportToRtfFile($Reporte,$SalidaReporte,$Parametro,$Conexion);
	$jru->runReportToPdfFile($Reporte,$SalidaReporte,$Parametro,$Conexion);
	//$jru->runReportToOdtFile($Reporte,$SalidaReporte,$Parametro,$Conexion);



        $filename = "Nota_de_RemisionINRA.pdf";
        $file = "C:/xampp/htdocs/PPARB/sistema/reportes/reporte-notas/".$filename;
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/force-download");
       // header("Content-Length: 409600");
        header("Content-Transfer-Encoding: binary");
        readfile($file);


}



?>
