<?php 

//Obtener Fecha de Hoy
	  //$filename = "default-filename.pdf";
	 // $japerReport = "default-filename.jasper";
		
	//Llamando las librerias
	require_once('http://localhost:8080/JavaBridge/java/Java.inc');
	require('php-jru/php-jru.php');
	//Llamando la funcion JRU de la libreria php-jru
	$jru=new JRU();
	//Ruta del reporte compilado Jasper generado por IReports
	$Reporte='C://xampp//htdocs//PPARB//sistema//reportes//jasper//'.$japerReport;
	//Ruta a donde deseo Guardar Mi archivo de salida Pdf
	$SalidaReporte='C://xampp//htdocs//PPARB//sistema//reportes//tmp//'.$filename; 
	//Parametro en caso de que el reporte no este parametrizado
	$Parametro=new java('java.util.HashMap');
		if($report_parametro_1){
    //$Parametro->put('URL_IMG', realpath('mdryt.jpg'));
	$Parametro->put("report_parametro_1", $report_parametro_1); 
	}
			if($report_parametro_2){
    //$Parametro->put('URL_IMG', realpath('mdryt.jpg'));
	$Parametro->put("report_parametro_1", $report_parametro_1); 
	}

			if($report_parametro_2){
    //$Parametro->put('URL_IMG', realpath('mdryt.jpg'));
	$Parametro->put("report_parametro_2", $report_parametro_2); 
	}

			if($report_parametro_3){
    //$Parametro->put('URL_IMG', realpath('mdryt.jpg'));
	$Parametro->put("report_parametro_3", $report_parametro_3); 
	}
		if($report_parametro_4){
    //$Parametro->put('URL_IMG', realpath('mdryt.jpg'));
	$Parametro->put("report_parametro_4", $report_parametro_4); 
	}
		if($report_parametro_5){
    //$Parametro->put('URL_IMG', realpath('mdryt.jpg'));
	$Parametro->put("report_parametro_5", $report_parametro_5); 
	}

	//Funcion de Conexion a mi Base de datos tipo MySql
	$Conexion= new	JdbcConnection("org.postgresql.Driver","jdbc:postgresql://localhost:5432/dbrestitucion","postgres","Insidei7.");
	//Generamos la Exportacion del reporte
        if ($caso=='pdf') {
    $jru->runReportToPdfFile($Reporte,$SalidaReporte,$Parametro,$Conexion->getConnection());
    //$filename.='pdf';
    $file = "C:/xampp/htdocs/PPARB/sistema/reportes/tmp/".$filename;
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/force-download");
      //  header("Content-Length: 409600");
        header("Content-Transfer-Encoding: binary");
        readfile($file);
        }  
if ($caso=='xls') {
    $jru->runReportToXlsFile($Reporte,$SalidaReporte,$Parametro,$Conexion->getConnection());
    //$filename.='xls';
    $file = "C:/xampp/htdocs/PPARB/sistema/reportes/tmp/".$filename;
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/vnd.ms-excel");
         header("Content-Disposition: attachment; filename=output.xls");
       // header("Content-Length: 409600");
        readfile($file);
        unlink($file);
    
}
	

        

?>