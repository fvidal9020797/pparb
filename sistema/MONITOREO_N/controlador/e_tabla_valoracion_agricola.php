<?php
$parametro=split(":", $_POST['parametro']);
switch ($parametro[0]) {
		case '1':
			include_once('../modelo/e_tabla_valoracion_agricola.php');
			$e_tabla_valoracion_agricola=new e_tabla_valoracion_agricola();
			$e_tabla_valoracion_agricola->idinformeevaluacion=$parametro[1];
			$e_tabla_valoracion_agricola->idevaluacionespecif=$parametro[2];
			$e_tabla_valoracion_agricola->idcultivo=$parametro[3];
			$e_tabla_valoracion_agricola->puntuacion=$parametro[4];
			$e_tabla_valoracion_agricola->fojas=$parametro[5];
			$e_tabla_valoracion_agricola->produccion=$parametro[6];
			$e_tabla_valoracion_agricola->comprometido=$parametro[7];
			$e_tabla_valoracion_agricola->campana=$parametro[8];
			$e_tabla_valoracion_agricola->estado=1;
			echo $e_tabla_valoracion_agricola->insertar($e_tabla_valoracion_agricola);
		break;
		case '2':
			include_once('../modelo/e_tabla_valoracion_agricola.php');
			$e_tabla_valoracion_agricola=new e_tabla_valoracion_agricola();
			$e_tabla_valoracion_agricola->idtablavaloracionagricola="NULL";
			$e_tabla_valoracion_agricola->idinformeevaluacion=$parametro[1];
			$e_tabla_valoracion_agricola->idevaluacionespecif="NULL";
			$e_tabla_valoracion_agricola->idcultivo="NULL";
			$e_tabla_valoracion_agricola->puntuacion="NULL";
			$e_tabla_valoracion_agricola->fojas="NULL";
			$e_tabla_valoracion_agricola->produccion="NULL";
			$e_tabla_valoracion_agricola->comprometido="NULL";
			$e_tabla_valoracion_agricola->campana="NULL";
			$e_tabla_valoracion_agricola->estado="NULL";
			echo $e_tabla_valoracion_agricola->obtener($e_tabla_valoracion_agricola);
		break;
		case '3':
			include_once('../modelo/e_tabla_valoracion_agricola.php');
			$e_tabla_valoracion_agricola=new e_tabla_valoracion_agricola();
			$e_tabla_valoracion_agricola->idinformeevaluacion=$parametro[1];
			$e_tabla_valoracion_agricola->eliminar($e_tabla_valoracion_agricola);
		break;
		case '4':
			include_once('../modelo/e_tabla_valoracion_agricola.php');
			// $data=$parametro[1].":".$parametro[2];
			// $data=str_replace('data:image/png;base64,', '', $data);
			// $data = str_replace(' ', '+', $data);
			// $source=base64_decode($data);
			// file_put_contents('asd.png', $source);
			$e_tabla_valoracion_agricola=new e_tabla_valoracion_agricola();
			$e_tabla_valoracion_agricola->idinformeevaluacion=$parametro[1];
			$e_tabla_valoracion_agricola->img=$parametro[2].":".$parametro[3];
			$e_tabla_valoracion_agricola->ModificarGuardarImagenEvaluacionAgricola($e_tabla_valoracion_agricola);
		break;
	default:
		break;
}
?>