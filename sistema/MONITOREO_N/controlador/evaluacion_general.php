<?php
$parametro=split(":", $_POST['parametro']);
//echo $_POST['parametro'];
	switch ($parametro[0]) {
		case '1':
			include_once('../modelo/evaluacion_general.php');
			$evaluacion_general=new evaluacion_gral();
			$evaluacion_general->evaluacion_especifica=new evaluacion_especifica();
			switch ($parametro[2]) {
				case '71':
					$parametro[1]=="Mediana" ? $evaluacion_general->evaluacion_especifica->tipopredio="ME":$evaluacion_general->evaluacion_especifica->tipopredio="PC";	
					break;
				case '101':
					$evaluacion_general->evaluacion_especifica->tipopredio="T";
					break;
				case '70':
					$parametro[1]=="Mediana" ? $evaluacion_general->evaluacion_especifica->tipopredio="ME":$evaluacion_general->evaluacion_especifica->tipopredio="PC";	
					break;
			}
			$evaluacion_general->tipoactividad=(int)$parametro[2];
			$evaluacion_general->estado=1;
			//print_r($evaluacion_general);
			echo $evaluacion_general->obtener($evaluacion_general);
			break;
		default:
			break;
	}
?>