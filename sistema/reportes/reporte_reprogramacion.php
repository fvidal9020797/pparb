<?php

function imprimirformularioreprogramacion($CodigoParcela,$actividad,$periodo)
	{
echo('llego aqui');

    require('ConexionImpresionesRegistro.php');
		//include "../ConexionImpresionesRegistro.php";
    $filename = "Formulario_Reprogramacion.pdf";


	//Llamando las librerias
	require_once('http://localhost:8080/JavaBridge/java/Java.inc');
	require('php-jru/php-jru.php');
	//Llamando la funcion JRU de la libreria php-jru
	$jru=new JRU();



	switch ($actividad) {

	case "Agricola":
	if ($periodo==1) {
					$Reporte='C://xampp//htdocs//PPARB//sistema//reportes//reportes-reprogramacion//Agricola//Predio_Agricola.jasper';
			}
	if ($periodo==2) {
					$Reporte='C://xampp//htdocs//PPARB//sistema//reportes//reportes-reprogramacion//Agricola739//Predio_Agricola.jasper';
			}
	break;

	case "Ganadera":
if ($periodo==1) {
					$Reporte='C://xampp//htdocs//PPARB//sistema//reportes//reportes-reprogramacion//Ganadera//Predio_Ganadero.jasper';
	}
	if ($periodo==2) {
					$Reporte='C://xampp//htdocs//PPARB//sistema//reportes//reportes-reprogramacion//Ganadera739//Predio_Ganadero.jasper';
	}
	break;

	case "Mixta Agropecuaria":
if ($periodo==1) {
					$Reporte='C://xampp//htdocs//PPARB//sistema//reportes//reportes-reprogramacion//Mixta//Predio_Mixto.jasper';
	}
	if ($periodo==2) {
					$Reporte='C://xampp//htdocs//PPARB//sistema//reportes//reportes-reprogramacion//Mixta//Predio_Mixto.jasper';
	}
	break;

	case "Ganadera Lechera":
if ($periodo==1) {
					$Reporte='C://xampp//htdocs//PPARB//sistema//reportes//reportes-reprogramacion//Mixta//Predio_Mixto.jasper';
	}
	if ($periodo==2) {
				$Reporte='C://xampp//htdocs//PPARB//sistema//reportes//reportes-reprogramacion//Mixta//Predio_Mixto.jasper';
	}
	break;

	case "Reforestacion y/o Proteccion":
	if ($periodo==1) {
				$Reporte='C://xampp//htdocs//PPARB//sistema//reportes//reportes-reprogramacion//ReforestacionConservacion//Predio_RefCon.jasper';
	}
	if ($periodo==2) {
				$Reporte='C://xampp//htdocs//PPARB//sistema//reportes//reportes-reprogramacion//ReforestacionConservacion739//Predio_RefCon.jasper';
	}
	break;

	case "Forestal":
if ($periodo==1) {
			$Reporte='C://xampp//htdocs//PPARB//sistema//reportes//reportes-reprogramacion//ReforestacionConservacion//Predio_RefCon.jasper';
	}

if ($periodo==2) {
		$Reporte='C://xampp//htdocs//PPARB//sistema//reportes//reportes-reprogramacion//ReforestacionConservacion739//Predio_RefCon.jasper';
	}
	break;

	case "Otras Actividades":
if ($periodo==1) {
				$Reporte='C://xampp//htdocs//PPARB//sistema//reportes//reportes-reprogramacion//ReforestacionConservacion//Predio_RefCon.jasper';
	}

if ($periodo==2) {
				$Reporte='C://xampp//htdocs//PPARB//sistema//reportes//reportes-reprogramacion//ReforestacionConservacion739//Predio_RefCon.jasper';
	}
	break;

	case "Agricola-Avicola":
	if ($periodo==1) {
			$Reporte='C://xampp//htdocs//PPARB//sistema//reportes//reportes-reprogramacion//Avicola//Predio_Avicola.jasper';
	}
	if ($periodo==2) {
		$Reporte='C://xampp//htdocs//PPARB//sistema//reportes//reportes-reprogramacion//Avicola739//Predio_Avicola.jasper';
	}
	break;

	case "Agricola-Porcina":
	if ($periodo==1) {
				$Reporte='C://xampp//htdocs//PPARB//sistema//reportes//reportes-reprogramacion//Porcino//Predio_Porcino.jasper';
	}
	if ($periodo==2) {
			$Reporte='C://xampp//htdocs//PPARB//sistema//reportes//reportes-reprogramacion//Porcino739//Predio_Porcino.jasper';
	}
	break;

	default:
	}


	//Ruta del reporte compilado Jasper generado por IReports
	//$Reporte='C://xampp//htdocs//PPARB//sistema//reportes//reportes//Mixta//Predio_Mixto.jasper';
	//Ruta a donde deseo Guardar Mi archivo de salida Pdf
	$SalidaReporte='C://xampp//htdocs//PPARB//sistema//reportes//reportes-reprogramacion//'.$filename;




	//Parametro en caso de que el reporte no este parametrizado
	$Parametro=new java('java.util.HashMap');

    //$Parametro->put('URL_IMG', realpath('mdryt.jpg'));
	$Parametro->put("CODIGO_PARCELA", $CodigoParcela);

	$Cn= new ConexionImpresionesRegistro();
	$Conexion = $Cn->getConexion();
	$jru->runReportToPdfFile($Reporte,$SalidaReporte,$Parametro,$Conexion);




        $filename = "Formulario_Reprogramacion.pdf";


        $file = "C:/xampp/htdocs/PPARB/sistema/reportes/reportes-reprogramacion/".$filename;
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/force-download");
       // header("Content-Length: 409600");
        header("Content-Transfer-Encoding: binary");
        readfile($file);


}



?>
