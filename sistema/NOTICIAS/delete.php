<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/sistema/config/config.php';
require_once APPPATH . '/NOTICIAS/GestorNoticias.php';
$gestdocumentos=new GestorNoticias();
$output_dir = "IMAGENES/";
if(isset($_POST["op"]) && $_POST["op"] == "delete" && isset($_POST['name']))
{

	$fileName =$_POST['name'];
	$filePath = $output_dir.intval($_POST['key1'])."/". $fileName;
	
	 if (file_exists($filePath)) 
	 {
         unlink($filePath);
     }
     $gestdocumentos->borrarImagen(intval($_POST['key1']), $fileName);
	 echo "Deleted File ".$fileName."<br>";
}

?>