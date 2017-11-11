<?php
	$parametro=split(":", $_POST['parametro']);
	switch ($parametro[0]) {
		case '1':
			include_once('../modelo/ll_monitoreo_agricola.php');
			$ll_monitoreo_agricola=new ll_monitoreo_agricola();
			$ll_monitoreo_agricola->idllenadoagricola="NULL";
			$ll_monitoreo_agricola->idmonitoreo=$parametro[1];
			$ll_monitoreo_agricola->cultivo="NULL";
			$ll_monitoreo_agricola->anocultivo=$parametro[2];
			$ll_monitoreo_agricola->supejecutada="NULL";
			$ll_monitoreo_agricola->produccionobt="NULL";
			$ll_monitoreo_agricola->campana="NULL";
			$ll_monitoreo_agricola->comprometido="NULL";
			$ll_monitoreo_agricola->estado="NULL";
			echo $ll_monitoreo_agricola->obtener($ll_monitoreo_agricola);
			break;
		case '2':
			include_once('../modelo/ll_monitoreo_agricola.php');
			$ll_monitoreo_agricola=new ll_monitoreo_agricola();
			$ll_monitoreo_agricola->idllenadoagricola="NULL";
			$ll_monitoreo_agricola->idmonitoreo=$parametro[1];
			$ll_monitoreo_agricola->cultivo=$parametro[2];
			$ll_monitoreo_agricola->anocultivo=$parametro[3];
			$ll_monitoreo_agricola->supejecutada="NULL";
			$ll_monitoreo_agricola->produccionobt="NULL";
			$ll_monitoreo_agricola->campana="'".$parametro[4]."'";
			$ll_monitoreo_agricola->comprometido="'".$parametro[5]."'";
			$ll_monitoreo_agricola->estado=1;
			echo $ll_monitoreo_agricola->obtener($ll_monitoreo_agricola);
			break;
		default:
			// code...
			break;
	}
?>