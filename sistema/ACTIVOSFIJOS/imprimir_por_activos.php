<?php
//require_once $_SERVER['DOCUMENT_ROOT'] . '/sistema/config/config.php';


$idg_= (int)"84";
$ids_= (int)"84";
$idng_=  "";
$idsg_=  "";

     //  $resultado="si"; 
    $idg_= $_POST["cbogrupo"];
    $ids_= $_POST["cbosubgrupo"];
    $idng_= $_POST["namegrupo"];
    $idsg_= $_POST["namesub"];
    
    //echo "aaa".$idng_;
    
    if($idg_==0){
        $idng_="(Todos)";
    }
     if($ids_==0){
        $idsg_="(Todos)";
    }
     
    $idg_=(int)$idg_;
    $ids_=(int)$ids_;
    // echo "entroo idg=".$idg_."   idsg=".$ids_;
    
    if($idg_==0 && $ids_==0){
        echo "entro todos";
        imprimirtodos();
    }
    if($idg_>0 && $ids_==0){
        echo "entro grupo";
        imprimirPorGrupo($idg_,$idng_);
    }
    
     if($idg_>0 && $ids_>0){
         echo "entro ambos";
        imprimirPorsubGrupo($idg_,$idng_,$ids_,$idsg_);
    }
        
       
        
        
  function imprimirtodos(){
       require('ConexionImpresionesRegistro.php');
        $filename = "Reporte_por_activo.pdf";
 
       //  $caso = $_REQUEST['outputtype'];
         
	//Llamando las librerias
	require_once('http://localhost:8080/JavaBridge/java/Java.inc');
	require('../reportes/php-jru/php-jru.php');
	//Llamando la funcion JRU de la libreria php-jru
	$jru=new JRU();
	//Ruta del reporte compilado Jasper generado por IReports
       // echo "entrooo3=".$id_;

	$Reporte='C://xampp//htdocs//PPARB//sistema//reportes//activos-fijos//reprote_por_asctivos.jasper';
	//Ruta a donde deseo Guardar Mi archivo de salida Pdf
	$SalidaReporte='C://xampp//htdocs//PPARB//sistema//reportes//activos-fijos//'.$filename;
	//Parametro en caso de que el reporte no este parametrizado
	$Parametro=new java('java.util.HashMap');
 //echo "entrooo4=".$id_;
 
    //$Parametro->put('URL_IMG', realpath('mdryt.jpg'));
	/*$Parametro->put("idgrupo", $idg_);
        $Parametro->put("idsubgrupo", $ids_);
        $Parametro->put("namegrupo", $idng_);
        $Parametro->put("namesub", $idsg_);*/
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

        $filename = "Reporte_por_activo.pdf";
        $file = "C:/xampp/htdocs/PPARB/sistema/reportes/activos-fijos/".$filename;
        
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/force-download");
      ///  header("Content-Length: 409600");
        header("Content-Transfer-Encoding: binary");
        readfile($file);

  }      
   
  
   function imprimirPorGrupo($idg_ ,$idng_  ){
       require('ConexionImpresionesRegistro.php');
        $filename = "Reporte_por_activo.pdf";
 
	//Llamando las librerias
	require_once('http://localhost:8080/JavaBridge/java/Java.inc');
	require('../reportes/php-jru/php-jru.php');
	//Llamando la funcion JRU de la libreria php-jru
	$jru=new JRU();
	//Ruta del reporte compilado Jasper generado por IReports
       // echo "entrooo3=".$id_;

	$Reporte='C://xampp//htdocs//PPARB//sistema//reportes//activos-fijos//reprote_por_asctivos_grupo.jasper';
	//Ruta a donde deseo Guardar Mi archivo de salida Pdf
	$SalidaReporte='C://xampp//htdocs//PPARB//sistema//reportes//activos-fijos//'.$filename;
	//Parametro en caso de que el reporte no este parametrizado
	$Parametro=new java('java.util.HashMap');
 //echo "entrooo4=".$id_;
 
    //$Parametro->put('URL_IMG', realpath('mdryt.jpg'));
	$Parametro->put("idgrupo", $idg_); 
        $Parametro->put("namegrupo", $idng_); 
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

        $filename = "Reporte_por_activo.pdf";
        $file = "C:/xampp/htdocs/PPARB/sistema/reportes/activos-fijos/".$filename;
        
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/force-download");
      ///  header("Content-Length: 409600");
        header("Content-Transfer-Encoding: binary");
        readfile($file);

  }      
   
    function imprimirPorsubGrupo($idg_ ,$idng_,$ids_ ,$idsg_  ){
       require('ConexionImpresionesRegistro.php');
        $filename = "Reporte_por_activo.pdf";
 
	//Llamando las librerias
	require_once('http://localhost:8080/JavaBridge/java/Java.inc');
	require('../reportes/php-jru/php-jru.php');
	//Llamando la funcion JRU de la libreria php-jru
	$jru=new JRU();
	//Ruta del reporte compilado Jasper generado por IReports
       // echo "entrooo3=".$id_;

	$Reporte='C://xampp//htdocs//PPARB//sistema//reportes//activos-fijos//reprote_por_asctivos_subgrupo.jasper';
	//Ruta a donde deseo Guardar Mi archivo de salida Pdf
	$SalidaReporte='C://xampp//htdocs//PPARB//sistema//reportes//activos-fijos//'.$filename;
	//Parametro en caso de que el reporte no este parametrizado
	$Parametro=new java('java.util.HashMap');
 //echo "entrooo4=".$id_;
 
    //$Parametro->put('URL_IMG', realpath('mdryt.jpg'));
	$Parametro->put("idgrupo", $idg_); 
        $Parametro->put("idsubgrupo", $ids_); 
         $Parametro->put("namegrupo", $idng_); 
         $Parametro->put("namesub", $idsg_); 
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

        $filename = "Reporte_por_activo.pdf";
        $file = "C:/xampp/htdocs/PPARB/sistema/reportes/activos-fijos/".$filename;
        
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/force-download");
      ///  header("Content-Length: 409600");
        header("Content-Transfer-Encoding: binary");
        readfile($file);

  }      
   
  
?>

<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
 