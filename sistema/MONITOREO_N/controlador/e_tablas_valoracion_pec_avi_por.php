<?php
	$parametro=split(":", $_POST['parametro']);
	switch ($parametro[0]) {
		case '1':
			include_once('../modelo/e_tablas_valoracion_pec_avi_por.php');
			$e_tablas_valoracion_pec_avi_por=new e_tablas_valoracion_pec_avi_por();
			$e_tablas_valoracion_pec_avi_por->idinformeevaluacion=$parametro[1];
			$e_tablas_valoracion_pec_avi_por->idevaluacionespecifica=$parametro[2];
			$e_tablas_valoracion_pec_avi_por->ponderacion=$parametro[3];
			$e_tablas_valoracion_pec_avi_por->fojas=$parametro[4];
			$e_tablas_valoracion_pec_avi_por->tipoactividad=$parametro[5];
			$e_tablas_valoracion_pec_avi_por->estado=1;
			echo $e_tablas_valoracion_pec_avi_por->insertar($e_tablas_valoracion_pec_avi_por);
			break;
		case '2':
			include_once('../modelo/e_tablas_valoracion_pec_avi_por.php');
			$e_tablas_valoracion_pec_avi_por=new e_tablas_valoracion_pec_avi_por();
			$e_tablas_valoracion_pec_avi_por->idinformeevaluacion=$parametro[1];
			$e_tablas_valoracion_pec_avi_por->tipoactividad=$parametro[2];
			echo $e_tablas_valoracion_pec_avi_por->obtener($e_tablas_valoracion_pec_avi_por);
			break;
		case '3': 
			include_once('../modelo/e_tablas_valoracion_pec_avi_por.php');
			$e_tablas_valoracion_pec_avi_por=new e_tablas_valoracion_pec_avi_por();
			$e_tablas_valoracion_pec_avi_por->idinformeevaluacion=$parametro[1];
			$e_tablas_valoracion_pec_avi_por->tipoactividad=$parametro[2];
			$e_tablas_valoracion_pec_avi_por->eliminar($e_tablas_valoracion_pec_avi_por);
		break;	
		default:
			// code...
			break;
	}
?>