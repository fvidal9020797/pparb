<?php
	$parametro=split(":", $_POST['parametro']);
	switch ($parametro[0]) {
		case '1':
			include_once('../modelo/e_informe_evaluacion_rcia.php');
			$e_informe_evaluacion_rcia=new e_informe_evaluacion_rcia();
			$e_informe_evaluacion_rcia->idmonitoreo=$parametro[1];
			$e_informe_evaluacion_rcia->idoficina=$parametro[2];
			$e_informe_evaluacion_rcia->cite=$parametro[3];
			$e_informe_evaluacion_rcia->fechainforme=$parametro[4];
			$e_informe_evaluacion_rcia->estado=1;//1: habilitado
			echo $e_informe_evaluacion_rcia->insertar($e_informe_evaluacion_rcia);
			break;
		case '2':
			include_once('../modelo/e_informe_evaluacion_rcia.php');
			$e_informe_evaluacion_rcia=new e_informe_evaluacion_rcia();
			$e_informe_evaluacion_rcia->idmonitoreo=$parametro[1];
			echo $e_informe_evaluacion_rcia->obtener($e_informe_evaluacion_rcia);
			break;
		default:
			// code...
			break;
	}
?>