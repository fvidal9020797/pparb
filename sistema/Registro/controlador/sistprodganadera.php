<?php
	$parametro=split(":", $_POST['parametro']);
	switch ($parametro[0]) {
		case '1':
			include_once('../modelo/sistprodganadera.php');
			$sistprodganadera=new sistprodganadera();
			$sistprodganadera->idregistro=$parametro[1];
			$sistprodganadera->idclasificador=$parametro[2];
			echo $sistprodganadera->listar_sistemas_codificadores($sistprodganadera);
			break;

	}
?>