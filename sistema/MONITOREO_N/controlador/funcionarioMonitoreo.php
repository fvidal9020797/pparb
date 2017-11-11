<?php
	$parametro=split(":", $_POST['parametro']);
	switch ($parametro[0]) {
		case '1':
			include_once('../modelo/funcionarioMonitoreo.php');
			$funcionarioMonitoreo=new funcionarioMonitoreo();
			$funcionarioMonitoreo->idmonitoreo=$parametro[1];
			$funcionarioMonitoreo->idfuncionario=$parametro[2];
			echo $funcionarioMonitoreo->obtener($funcionarioMonitoreo);
			break;
	}
?>