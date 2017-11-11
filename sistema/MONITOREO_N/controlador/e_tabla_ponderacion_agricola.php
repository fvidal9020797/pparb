<?php
$parametro=split(":", $_POST['parametro']);
	switch ($parametro[0]) {
		case '1'://obtener
			include_once('../modelo/e_tabla_ponderacion_agricola.php');
			$e_tabla_ponderacion_agricola=new e_tabla_ponderacion_agricola();
			$e_tabla_ponderacion_agricola->idponderacion="NULL";
			$e_tabla_ponderacion_agricola->idinformeevaluacion=$parametro[1];
			$e_tabla_ponderacion_agricola->idcultivo=$parametro[2];
			$e_tabla_ponderacion_agricola->porcponderacion="NULL";
			$e_tabla_ponderacion_agricola->ponderacion="NULL";
			$e_tabla_ponderacion_agricola->notacultivo="NULL";
			$e_tabla_ponderacion_agricola->campana="'".$parametro[3]."'";
			$e_tabla_ponderacion_agricola->comprometido="'".$parametro[4]."'";
			$e_tabla_ponderacion_agricola->estado=1;
			echo $e_tabla_ponderacion_agricola->obtener($e_tabla_ponderacion_agricola);
			break;
		case '2':
			include_once('../modelo/e_tabla_ponderacion_agricola.php');
			$e_tabla_ponderacion_agricola=new e_tabla_ponderacion_agricola();
			$e_tabla_ponderacion_agricola->idinformeevaluacion=$parametro[1];
			$e_tabla_ponderacion_agricola->idcultivo=$parametro[2];
			$e_tabla_ponderacion_agricola->porcponderacion=$parametro[3];
			$e_tabla_ponderacion_agricola->ponderacion=$parametro[4];
			$e_tabla_ponderacion_agricola->notacultivo=$parametro[5];
			$e_tabla_ponderacion_agricola->campana=$parametro[6];
			$e_tabla_ponderacion_agricola->comprometido=$parametro[7];
			$e_tabla_ponderacion_agricola->estado=1;
			$e_tabla_ponderacion_agricola->eliminar($e_tabla_ponderacion_agricola);
			echo $e_tabla_ponderacion_agricola->insertar($e_tabla_ponderacion_agricola);
			break;
		default:
			break;
	}
?>