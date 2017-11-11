<?php
	$parametro=split(":", $_POST['parametro']);
	switch ($parametro[0]) {
		case '1':
			include_once('../modelo/v_registro.php');
			$v_parcela=new v_parcela();
			$v_parcela->idregistro=$parametro[1];
			echo $v_parcela->obtener($v_parcela);
			break;
		default:
			// code...
			break;
	}
?>