<?php
	$datos=$_POST['params'];
  $array_datos=split(":", $datos);
	switch ($array_datos[0]) {
		case '1':
			include_once('sistema/NOTICIAS/noticias.php');
			$noticias=new noticias();
			echo $noticias->listar();
			break;
    case '2':
      include_once('sistema/NOTICIAS/noticias.php');
      $noticias=new noticias();
      $noticias->id=$array_datos[1];
      echo $noticias->obtener($noticias);
      break;
		default:
			# code...
			break;
	}
?>