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
		case '3':
			include_once('../modelo/e_informe_evaluacion_rcia.php');
			$e_informe_evaluacion_rcia=new e_informe_evaluacion_rcia();
			$e_informe_evaluacion_rcia->idinformeevaluacion=$parametro[1];
			$e_informe_evaluacion_rcia->analisistecnico=$parametro[2];
			$e_informe_evaluacion_rcia->conclusiones=$parametro[3];
			$e_informe_evaluacion_rcia->recomendaciones=$parametro[4];
			echo $e_informe_evaluacion_rcia->modificar($e_informe_evaluacion_rcia);
			break;
		case '4':
			$data=$parametro[1].":".$parametro[2];
			print_r($data);
			$data=str_replace('data:image/png;base64,', '', $data);
			$data = str_replace(' ', '+', $data);
			$source=base64_decode($data);
			file_put_contents('image.png', $source);
			break;
		default:
			// code...
			break;
	}
?>