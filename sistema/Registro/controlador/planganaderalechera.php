<?php
	$parametro=split(":", $_POST['parametro']);
	switch ($parametro[0]) {
		case '1':
			include_once('../modelo/planganaderalechera.php');
			$planganaderalechera=new planganaderalechera();
			$planganaderalechera->idregistro=$parametro[1];
			echo $planganaderalechera->obtener($planganaderalechera);
			break;

		case '2':
			include_once('../modelo/planganaderalechera.php');
			$planganaderalechera=new planganaderalechera();
			$planganaderalechera->idregistro=$parametro[1];
			$planganaderalechera->anoplanganadera=$parametro[2];

			echo $planganaderalechera->obtener_linea_base_compromiso($planganaderalechera);

		break;
	}
?>