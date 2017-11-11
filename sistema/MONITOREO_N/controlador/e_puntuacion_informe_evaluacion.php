<?php
$parametro=split(":", $_POST['parametro']);
switch ($parametro[0]) {
		case '1': //guardar
		include_once('../modelo/e_puntuacion_informe_evaluacion.php');
			$e_puntuacion_informe_evaluacion=new e_puntuacion_informe_evaluacion();
			$e_puntuacion_informe_evaluacion->idinformeevaluacion=$parametro[1];
			$e_puntuacion_informe_evaluacion->actividad=$parametro[2];
			$e_puntuacion_informe_evaluacion->notaobtenida=$parametro[3];
			$e_puntuacion_informe_evaluacion->superficie=$parametro[4];
			$e_puntuacion_informe_evaluacion->eliminar($e_puntuacion_informe_evaluacion);
			$e_puntuacion_informe_evaluacion->insertar($e_puntuacion_informe_evaluacion);
		break;
		case '2':
			include_once('../modelo/e_puntuacion_informe_evaluacion.php');
			$e_puntuacion_informe_evaluacion=new e_puntuacion_informe_evaluacion();
			$e_puntuacion_informe_evaluacion->idinformeevaluacion=$parametro[1];
			echo $e_puntuacion_informe_evaluacion->obtener($e_puntuacion_informe_evaluacion);
		break;
		case '3':
		break;
	default:
		break;
}
?>