<?php
//require_once $_SERVER['DOCUMENT_ROOT'] . '/sistema/config/config.php';


$idr_= (int)"84";
$idp_= (int)"84";
$idnr_=  "";
$idnp_=  "";

     //  $resultado="si"; 
    $idr_= $_POST["cboregional2"];
    $idp_= $_POST["cboactivo"];
    $idnr_= $_POST["namereg2"];
    $idnp_= $_POST["namea"];
    
      if($idr_==0){
        $idnr_="(Todos)";
    }
     if($idp_==0){
        $idnp_="(Todos)";
    }
     
    $idr_=(int)$idr_;
    $idp_=(int)$idp_;
    
    
    
      if($idr_==0 && $idp_==0){
       // echo "entro todos";
        imprimirtodos();
    }
    if($idr_>0 && $idp_==0){
        //echo "entro grupo";
        imprimirPorRegional($idr_,$idnr_);
    }
    
     if($idr_>0 && $idp_>0){
        // echo "entro ambos";
        imprimirPorsubGrupo($idr_,$idnr_, $idp_,$idnp_);
    }
    
     if($idr_==0 && $idp_>0){
        // echo "entro ambos";
        imprimirPorpersonal( $idp_,$idnp_);
    }
    
    
        

        
        
        
        
    function imprimirtodos(){
        require('ConexionImpresionesRegistro.php');
        $filename = "reprote_por_activos_personal.pdf";

        // echo "entrooo2=".$id_;
	//Llamando las librerias
	require_once('http://localhost:8080/JavaBridge/java/Java.inc');
	require('../reportes/php-jru/php-jru.php');
	//Llamando la funcion JRU de la libreria php-jru
	$jru=new JRU();
	//Ruta del reporte compilado Jasper generado por IReports
       // echo "entrooo3=".$id_;

	$Reporte='C://xampp//htdocs//PPARB//sistema//reportes//activos-fijos//reprote_por_act_per.jasper';
	//Ruta a donde deseo Guardar Mi archivo de salida Pdf
	$SalidaReporte='C://xampp//htdocs//PPARB//sistema//reportes//activos-fijos//'.$filename;
	//Parametro en caso de que el reporte no este parametrizado
	$Parametro=new java('java.util.HashMap');
 
    //$Parametro->put('URL_IMG', realpath('mdryt.jpg'));
	//$Parametro->put("idasignacion", $id_);
 //echo "entrooo5=".$id_;
	$Cn= new ConexionImpresionesRegistro();
	$Conexion = $Cn->getConexion();
     
	$jru->runReportToPdfFile($Reporte,$SalidaReporte,$Parametro,$Conexion);
 
        $filename = "reprote_por_activos_personal.pdf";
        $file = "C:/xampp/htdocs/PPARB/sistema/reportes/activos-fijos/".$filename;
        
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/force-download");
      ///  header("Content-Length: 409600");
        header("Content-Transfer-Encoding: binary");
        readfile($file);
        
    }
  
    
     function imprimirPorRegional($idr_ ,$idnr_  ){
       require('ConexionImpresionesRegistro.php');
        $filename = "reprote_por_activos_personal.pdf";
 
	//Llamando las librerias
	require_once('http://localhost:8080/JavaBridge/java/Java.inc');
	require('../reportes/php-jru/php-jru.php');
	//Llamando la funcion JRU de la libreria php-jru
	$jru=new JRU();
	//Ruta del reporte compilado Jasper generado por IReports
       // echo "entrooo3=".$id_;

	$Reporte='C://xampp//htdocs//PPARB//sistema//reportes//activos-fijos//reprote_por_act_per_regional.jasper';
	//Ruta a donde deseo Guardar Mi archivo de salida Pdf
	$SalidaReporte='C://xampp//htdocs//PPARB//sistema//reportes//activos-fijos//'.$filename;
	//Parametro en caso de que el reporte no este parametrizado
	$Parametro=new java('java.util.HashMap');
 //echo "entrooo4=".$id_;
 
    //$Parametro->put('URL_IMG', realpath('mdryt.jpg'));
	$Parametro->put("idregional", $idr_); 
        $Parametro->put("nameregional", $idnr_); 
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

        $filename = "reprote_por_activos_personal.pdf";
        $file = "C:/xampp/htdocs/PPARB/sistema/reportes/activos-fijos/".$filename;
        
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/force-download");
      ///  header("Content-Length: 409600");
        header("Content-Transfer-Encoding: binary");
        readfile($file);

  }      
   
  
   function imprimirPorsubGrupo($idr_,$idnr_, $idp_,$idnp_ ){
       require('ConexionImpresionesRegistro.php');
        $filename = "reprote_por_activos_personal.pdf";
 
	//Llamando las librerias
	require_once('http://localhost:8080/JavaBridge/java/Java.inc');
	require('../reportes/php-jru/php-jru.php');
	//Llamando la funcion JRU de la libreria php-jru
	$jru=new JRU();
	//Ruta del reporte compilado Jasper generado por IReports
       // echo "entrooo3=".$id_;

	$Reporte='C://xampp//htdocs//PPARB//sistema//reportes//activos-fijos//reprote_por_act_per_regional2.jasper';
	//Ruta a donde deseo Guardar Mi archivo de salida Pdf
	$SalidaReporte='C://xampp//htdocs//PPARB//sistema//reportes//activos-fijos//'.$filename;
	//Parametro en caso de que el reporte no este parametrizado
	$Parametro=new java('java.util.HashMap');
 //echo "entrooo4=".$id_;
 
    //$Parametro->put('URL_IMG', realpath('mdryt.jpg'));
	$Parametro->put("idregional", $idr_); 
        $Parametro->put("nameregional", $idnr_ ); 
          $Parametro->put("idactivo", $idp_); 
         $Parametro->put("nameactivo", $idnp_); 
 //echo "entrooo5=".$id_;
	$Cn= new ConexionImpresionesRegistro();
	$Conexion = $Cn->getConexion();
        
         // echo "idregl=".$idr_;
         // echo "nameregional=".$idr_;
         // echo "idregl=".$idr_;
         // echo "idregl=".$idr_;
          
        // echo "repor=".$Reporte;
        // echo "salrepor=".$SalidaReporte;
        // echo "para=".$Parametro;
        // echo "conx=".$Conexion;
         
	$jru->runReportToPdfFile($Reporte,$SalidaReporte,$Parametro,$Conexion);


 //echo "entrooo7=".$id_;

        $filename = "reprote_por_activos_personal.pdf";
        $file = "C:/xampp/htdocs/PPARB/sistema/reportes/activos-fijos/".$filename;
        
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/force-download");
      ///  header("Content-Length: 409600");
        header("Content-Transfer-Encoding: binary");
        readfile($file);

  }      
   
  
     function imprimirPorpersonal( $idp_,$idnp_ ){
       require('ConexionImpresionesRegistro.php');
        $filename = "reprote_por_activos_personal.pdf";
 
	//Llamando las librerias
	require_once('http://localhost:8080/JavaBridge/java/Java.inc');
	require('../reportes/php-jru/php-jru.php');
	//Llamando la funcion JRU de la libreria php-jru
	$jru=new JRU();
	//Ruta del reporte compilado Jasper generado por IReports
       // echo "entrooo3=".$id_;

	$Reporte='C://xampp//htdocs//PPARB//sistema//reportes//activos-fijos//reprote_por_act_per_regional3.jasper';
	//Ruta a donde deseo Guardar Mi archivo de salida Pdf
	$SalidaReporte='C://xampp//htdocs//PPARB//sistema//reportes//activos-fijos//'.$filename;
	//Parametro en caso de que el reporte no este parametrizado
	$Parametro=new java('java.util.HashMap');
 //echo "entrooo4=".$id_;
 
    //$Parametro->put('URL_IMG', realpath('mdryt.jpg'));
	 
         $Parametro->put("idactivo", $idp_); 
         $Parametro->put("nameactivo", $idnp_); 
 //echo "entrooo5=".$id_;
	$Cn= new ConexionImpresionesRegistro();
	$Conexion = $Cn->getConexion();
        
         // echo "idregl=".$idr_;
         // echo "nameregional=".$idr_;
         // echo "idregl=".$idr_;
         // echo "idregl=".$idr_;
          
        // echo "repor=".$Reporte;
        // echo "salrepor=".$SalidaReporte;
        // echo "para=".$Parametro;
        // echo "conx=".$Conexion;
         
	$jru->runReportToPdfFile($Reporte,$SalidaReporte,$Parametro,$Conexion);


 //echo "entrooo7=".$id_;

        $filename = "reprote_por_activos_personal.pdf";
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
 