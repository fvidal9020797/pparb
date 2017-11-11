<?php
	$parametro=split(":", $_POST['parametro']);
	switch ($parametro[0]) {
		case '1':
			include_once('../modelo/planproduccionganadera.php');
			$planproduccionganadera=new planproduccionganadera();
			$planproduccionganadera->idregistro=$parametro[1];
			$planproduccionganadera->anoprodganadera=$parametro[2];

			echo $planproduccionganadera->obtener_indicadores($planproduccionganadera);

		break;

		case '2':
			include_once('../modelo/planproduccionganadera.php');
			$planproduccionganadera=new planproduccionganadera();
			$planproduccionganadera->idregistro=$parametro[1];
			$planproduccionganadera->anoprodganadera=$parametro[2];

			echo $planproduccionganadera->obtener_linea_base_compromiso($planproduccionganadera);

		break;


	}
?>