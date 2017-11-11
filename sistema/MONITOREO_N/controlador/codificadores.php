<?php
	$parametro=split(":", $_POST['parametro']);
	include_once('../modelo/codificadores.php');
	switch ($parametro[0]) {
		case '1': // solo para oficina
			$codificadores= new codificadores();
			echo $codificadores->listar($codificadores);
			break;
		case '2': //clasificador y orden
			$codificadores= new codificadores();
			$codificadores->orden=$parametro[1];
			$codificadores->idclasificador=$parametro[2];
			echo $codificadores->listar_codificadores($codificadores);
			break;

		case '3':  // solo clasificador
			$codificadores= new codificadores();
			$codificadores->idclasificador=$parametro[1];
			echo $codificadores->listar_codificadores_sin_orden($codificadores);
			break;  

		case '4':  // solo codificador
			$codificadores= new codificadores();
			$codificadores->idcodificadores=$parametro[1];
			echo $codificadores->listar_por_codificadores($codificadores);
			break;	

		default:
			// code...
			break;
	}
?>