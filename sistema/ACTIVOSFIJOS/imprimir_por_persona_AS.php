<?php
//require_once $_SERVER['DOCUMENT_ROOT'] . '/sistema/config/config.php';


$idr_= (int)"84";
$idp_= (int)"84";
$idnr_=  "";
$idnp_=  "";

     //  $resultado="si"; 
    //$idr_= $_POST["cboregionalAS"];
    $idr_= 0;
    $idp_= $_POST["cboPersonalAS"];
    $idnr_="";
    $idnp_= $_POST["nameperAS"];
    
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
        imprimirPorRegionalAS($idr_,$idnr_);
    }
    
    if($idr_>0 && $idp_>0){
         // echo "IDR=".$idr_."NAMER=".$idnr_."IDPE=".$idp_."NAMEP=".$idnp_;
        imprimirPorsubGrupoAS($idr_,$idnr_, $idp_,$idnp_);
    }
    
    if($idr_==0 && $idp_>0){
        // echo "entro ambos";
        imprimirPorpersonalAS( $idp_,$idnp_);
    }
    
    
        

        
        
        
        
    function imprimirtodos(){
        require('ConexionImpresionesRegistro.php');
        $filename = "Reporte_por_personal.pdf";

         echo "entrooo2=".$id_;
	//Llamando las librerias
	require_once('http://localhost:8080/JavaBridge/java/Java.inc');
	require('../reportes/php-jru/php-jru.php');
	//Llamando la funcion JRU de la libreria php-jru
	$jru=new JRU();
	//Ruta del reporte compilado Jasper generado por IReports
       // echo "entrooo3=".$id_;

	$Reporte='C://xampp//htdocs//PPARB//sistema//reportes//activos-fijos//reprote_por_personal.jasper';
	//Ruta a donde deseo Guardar Mi archivo de salida Pdf
	$SalidaReporte='C://xampp//htdocs//PPARB//sistema//reportes//activos-fijos//'.$filename;
	//Parametro en caso de que el reporte no este parametrizado
	$Parametro=new java('java.util.HashMap');
 
    //$Parametro->put('URL_IMG', realpath('mdryt.jpg'));
	$Parametro->put("idasignacion", $id_);
 //echo "entrooo5=".$id_;
	$Cn= new ConexionImpresionesRegistro();
	$Conexion = $Cn->getConexion();
     
	$jru->runReportToPdfFile($Reporte,$SalidaReporte,$Parametro,$Conexion);
 
        $filename = "Reporte_por_personal.pdf";
        $file = "C:/xampp/htdocs/PPARB/sistema/reportes/activos-fijos/".$filename;
        
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/force-download");
      ///  header("Content-Length: 409600");
        header("Content-Transfer-Encoding: binary");
        readfile($file);
        
    }
  
    
     function imprimirPorRegionalAS($idr_ ,$idnr_  ){
       require('ConexionImpresionesRegistro.php');
        $filename = "Reporte_por_Personal.pdf";
 
	//Llamando las librerias
	require_once('http://localhost:8080/JavaBridge/java/Java.inc');
	require('../reportes/php-jru/php-jru.php');
	//Llamando la funcion JRU de la libreria php-jru
	$jru=new JRU();
	//Ruta del reporte compilado Jasper generado por IReports
       // echo "entrooo3=".$id_;

	$Reporte='C://xampp//htdocs//PPARB//sistema//reportes//activos-fijos//reprote_por_personal_regional.jasper';
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

        $filename = "Reporte_por_Personal.pdf";
        $file = "C:/xampp/htdocs/PPARB/sistema/reportes/activos-fijos/".$filename;
        
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/force-download");
      ///  header("Content-Length: 409600");
        header("Content-Transfer-Encoding: binary");
        readfile($file);

  }      
   
  
   function imprimirPorsubGrupoAS($idr_,$idnr_, $idp_,$idnp_ ){
       require('ConexionImpresionesRegistro.php');
        $filename = "Reporte_Acta_Asignacion.pdf";
 
	//Llamando las librerias
	require_once('http://localhost:8080/JavaBridge/java/Java.inc');
	require('../reportes/php-jru/php-jru.php');
	//Llamando la funcion JRU de la libreria php-jru
	$jru=new JRU();
	//Ruta del reporte compilado Jasper generado por IReports
       // echo "entrooo3=".$id_;

	$Reporte='C://xampp//htdocs//PPARB//sistema//reportes//activos-fijos//reprote_por_personal_regional_p_AS.jasper';
	//Ruta a donde deseo Guardar Mi archivo de salida Pdf
	$SalidaReporte='C://xampp//htdocs//PPARB//sistema//reportes//activos-fijos//'.$filename;
	//Parametro en caso de que el reporte no este parametrizado
	$Parametro=new java('java.util.HashMap');
 //echo "entrooo4=".$id_;
 
    //$Parametro->put('URL_IMG', realpath('mdryt.jpg'));
	$Parametro->put("idregional", $idr_); 
        $Parametro->put("nameregional", $idnr_ ); 
         $Parametro->put("idpersonal", $idp_); 
         $Parametro->put("namepersonal", $idnp_); 
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

        $filename = "Reporte_Acta_Asignacion.pdf";
        $file = "C:/xampp/htdocs/PPARB/sistema/reportes/activos-fijos/".$filename;
        
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/force-download");
      ///  header("Content-Length: 409600");
        header("Content-Transfer-Encoding: binary");
        readfile($file);

  }      
   
  
     function imprimirPorpersonalAS( $idp_,$idnp_ ){
       require('ConexionImpresionesRegistro.php');
        $filename = "Reporte_Acta_Asignacion.pdf";
 
	//Llamando las librerias
	require_once('http://localhost:8080/JavaBridge/java/Java.inc');
	require('../reportes/php-jru/php-jru.php');
	//Llamando la funcion JRU de la libreria php-jru
	$jru=new JRU();
	//Ruta del reporte compilado Jasper generado por IReports
       // echo "entrooo3=".$id_;

	$Reporte='C://xampp//htdocs//PPARB//sistema//reportes//activos-fijos//reprote_por_personal_regional_p2_AS.jasper';
	//Ruta a donde deseo Guardar Mi archivo de salida Pdf
	$SalidaReporte='C://xampp//htdocs//PPARB//sistema//reportes//activos-fijos//'.$filename;
	//Parametro en caso de que el reporte no este parametrizado
	$Parametro=new java('java.util.HashMap');
 //echo "entrooo4=".$id_;
 
    //$Parametro->put('URL_IMG', realpath('mdryt.jpg'));
	 
         $Parametro->put("idpersonal", $idp_); 
         $Parametro->put("namepersonal", $idnp_); 
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

        $filename = "Reporte_Acta_Asignacion.pdf";
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
 