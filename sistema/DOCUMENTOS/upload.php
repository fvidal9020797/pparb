<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/sistema/config/config.php';
require_once APPPATH . '/DOCUMENTOS/GestorDocumentos.php';
$gestdocumentos=new GestorDocumentos();
$output_dir = "REGISTROS/";

if(isset($_FILES["myfile"]))
{
	$idreg=intval($_POST["key1"]);
		$tipo=intval($_POST["key2"]);
	
	if(!is_dir($output_dir.$idreg)){
	@mkdir($output_dir.$idreg, 0700);
	}
	$output_dir .=$idreg."/";
	//$date=new date('Y/m/d H:i:s');
	$hoy=date('Y').date('m').date('d').date('H').date('i').date('s');
	
		$nombre=$idreg."-".$tipo."-".$hoy;
	$ret = array();

	$error =$_FILES["myfile"]["error"];
	//You need to handle  both cases
	//If Any browser does not support serializing of multiple files using FormData() 
	if(!is_array($_FILES["myfile"]["name"])) //single file
	{
	
		$trozos = explode(".", $_FILES["myfile"]["name"]); 
		$extension = end($trozos);
 	 	$fileName = $nombre.".".$extension;
 		move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$fileName);
    	$ret[]= $fileName;
    	
    	$gestdocumentos->guardarDocumento($idreg, $fileName, $extension, date('Y/m/d H:i:s'), $tipo, $_SESSION['MM_UserId'],1);
	}
	else  //Multiple files, file[]
	{
	  $fileCount = count($_FILES["myfile"]["name"]);
	  for($i=0; $i < $fileCount; $i++)
	  {
	  	
		$trozos = explode(".", $_FILES["myfile"]["name"][$i]); 
		$extension = end($trozos);
 	 	$fileName = $nombre.".".$extension;
		move_uploaded_file($_FILES["myfile"]["tmp_name"][$i],$output_dir.$fileName);

	  	$ret[]= $fileName;
	  $gestdocumentos->guardarDocumento($idreg, $fileName, $extension, date('Y/m/d H:i:s'), $tipo, $_SESSION['MM_UserId'],1);
	  }
	
	}
    echo json_encode($ret);
 }
 ?>