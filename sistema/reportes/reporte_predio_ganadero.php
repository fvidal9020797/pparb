<?php 

function ImprimirPredioGanadero($CodigoParcela)
	{
		require('ConexionImpresionesRegistro.php');
			//Obtener Fecha de Hoy
	$fecha = time ();
	$fecha_partir1=date ( "h" , $fecha ) ;
	$fecha_partir2=date ( "i" , $fecha ) ;
	$fecha_partir4=date ( "s" , $fecha ) ;
	$fecha_partir3=$fecha_partir1-1;
	$reporte="Formulario_Ganadero";
    $filename = "Formulario_Ganadero.pdf";
		
	//Llamando las librerias
	require_once('http://localhost:8080/JavaBridge/java/Java.inc');
	require('php-jru/php-jru.php');
	//Llamando la funcion JRU de la libreria php-jru
	$jru=new JRU();
	//Ruta del reporte compilado Jasper generado por IReports
	$Reporte='C://xampp//htdocs//PPARB//sistema//reportes//reportes//Ganadera//Predio_Ganadero.jasper';
	//Ruta a donde deseo Guardar Mi archivo de salida Pdf
	$SalidaReporte='C://xampp//htdocs//PPARB//sistema//reportes//reportes//'.$filename; 
	//Parametro en caso de que el reporte no este parametrizado
	$Parametro=new java('java.util.HashMap');
	
    //$Parametro->put('URL_IMG', realpath('mdryt.jpg'));
	$Parametro->put("CODIGO_PARCELA", $CodigoParcela); 
	
	//Funcion de Conexion a mi Base de datos tipo MySql
	$Cn= new ConexionImpresionesRegistro();
	$Conexion = $Cn->getConexion();
	$jru->runReportToPdfFile($Reporte,$SalidaReporte,$Parametro,$Conexion);

       
	

        $filename = "Formulario_Ganadero.pdf";
        $file = "C:/xampp/htdocs/PPARB/sistema/reportes/reportes/".$filename;
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/force-download");
      //  header("Content-Length: 409600");
        header("Content-Transfer-Encoding: binary");
        readfile($file);
        
        
}
	
	

?>