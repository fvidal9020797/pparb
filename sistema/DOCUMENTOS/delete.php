<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/sistema/config/config.php';
require_once APPPATH . '/DOCUMENTOS/GestorDocumentos.php';
$gestdocumentos=new GestorDocumentos();
$output_dir = "REGISTROS/";
if(isset($_POST["op"]) && $_POST["op"] == "delete" && isset($_POST['name']))
{

	$fileName =$_POST['name'];
	$filePath = $output_dir.intval($_POST['key1'])."/". $fileName;
	
	 if (file_exists($filePath)) 
	 {
         unlink($filePath);
     }
     $gestdocumentos->borrarDocumento(intval($_POST['key1']), $fileName,$_SESSION['MM_UserId']);
	 echo "Deleted File ".$fileName."<br>";
}

?>