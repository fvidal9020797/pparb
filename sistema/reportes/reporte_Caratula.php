<?php 

function ImprimirCaratula($CodigoParcela,$Ano)
	{
	
	    echo $CodigoParcela;
    echo $Ano;
	
	
    require('ConexionImpresionesRegistro.php');
    $filename = "Caratula.pdf";
		
	//Llamando las librerias
	require_once('http://localhost:8080/JavaBridge/java/Java.inc');
	require('php-jru/php-jru.php');
	//Llamando la funcion JRU de la libreria php-jru
	$jru=new JRU();
	//Ruta del reporte compilado Jasper generado por IReports
	$Reporte='C://xampp//htdocs//PPARB//sistema//reportes//caratulas-predios//Formulario_Caratula.jasper';
	//Ruta a donde deseo Guardar Mi archivo de salida Pdf
	$SalidaReporte='C://xampp//htdocs//PPARB//sistema//reportes//caratulas-predios//'.$filename; 
	//Parametro en caso de que el reporte no este parametrizado
	$Parametro=new java('java.util.HashMap');
	
    //$Parametro->put('URL_IMG', realpath('mdryt.jpg'));
	$Parametro->put("idparcela", $CodigoParcela); 
	$Parametro->put("ano", $Ano); 
	
	$Cn= new ConexionImpresionesRegistro();
	$Conexion = $Cn->getConexion();
	$jru->runReportToPdfFile($Reporte,$SalidaReporte,$Parametro,$Conexion);

       
	

        $filename = "Caratula.pdf";
        $file = "C:/xampp/htdocs/PPARB/sistema/reportes/caratulas-predios/".$filename;
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/force-download");
       // header("Content-Length: 409600");
        header("Content-Transfer-Encoding: binary");
        readfile($file); 
        
        
}
	
	

?>