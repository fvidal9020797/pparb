<?php 




function ImprimirPredioAgricola739($CodigoParcela)
	{
	require('ConexionImpresionesRegistro.php');
    
	//Obtener Fecha de Hoy
    $filename = "Formulario_Agricola739.pdf";
		
	//Llamando las librerias
	require_once('http://localhost:8080/JavaBridge/java/Java.inc');
	require('php-jru/php-jru.php');
	//Llamando la funcion JRU de la libreria php-jru
	$jru=new JRU();
	//Ruta del reporte compilado Jasper generado por IReports
	$Reporte='C://xampp//htdocs//PPARB//sistema//reportes//reportes//Agricola739//Predio_Agricola.jasper';
	//Ruta a donde deseo Guardar Mi archivo de salida Pdf
	$SalidaReporte='C://xampp//htdocs//PPARB//sistema//reportes//reportes//'.$filename; 
	//Parametro en caso de que el reporte no este parametrizado
	$Parametro=new java('java.util.HashMap');
	
    //$Parametro->put('URL_IMG', realpath('mdryt.jpg'));
	$Parametro->put("CODIGO_PARCELA", $CodigoParcela); 
	
	
	//Funcion de Conexion a mi Base de datos tipo MySql
	$Cn= new ConexionImpresionesRegistro();
	$Conexion = $Cn->getConexion();
	
	//$Conexion= new	JdbcConnection("org.postgresql.Driver","jdbc:postgresql://localhost:5432/dbrestitucionDSW","Administrador","Insidei5.");
	//Generamos la Exportacion del reporte
	$jru->runReportToPdfFile($Reporte,$SalidaReporte,$Parametro,$Conexion);

       
	

        $filename = "Formulario_Agricola739.pdf";
        $file = "C:/xampp/htdocs/PPARB/sistema/reportes/reportes/".$filename;
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/force-download");
       // header("Content-Length: 409600");
        header("Content-Transfer-Encoding: binary");
        readfile($file);
        
        
}
	
	

?>