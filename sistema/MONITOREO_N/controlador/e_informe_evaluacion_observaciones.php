<?php
$parametro=split(":", $_POST['parametro']);
switch ($parametro[0]) {
		case '1': //guardar
		include_once('../modelo/e_informe_evaluacion_observaciones.php');
			$e_informe_evaluacion_observaciones=new e_informe_evaluacion_observaciones();
			$e_informe_evaluacion_observaciones->idinformeevaluacion=$parametro[1];
			$e_informe_evaluacion_observaciones->idactividad=$parametro[2];
			$e_informe_evaluacion_observaciones->observaciones=$parametro[3];
			$e_informe_evaluacion_observaciones->eliminar($e_informe_evaluacion_observaciones);
			$e_informe_evaluacion_observaciones->insertar($e_informe_evaluacion_observaciones);
		break;
		case '2':
			include_once('../modelo/e_informe_evaluacion_observaciones.php');
			$e_informe_evaluacion_observaciones=new e_informe_evaluacion_observaciones();
			$e_informe_evaluacion_observaciones->idinformeevaluacion=$parametro[1];
			$e_informe_evaluacion_observaciones->idactividad=$parametro[2];
			echo $e_informe_evaluacion_observaciones->obtener($e_informe_evaluacion_observaciones);
		break;
		case '3':
		break;
	default:
		break;
}
?>