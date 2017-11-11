<?php
	$parametro=split(":", $_POST['parametro']);
	switch ($parametro[0]) {
		case '1':
			include_once('../modelo/ll_monitoreo_superficie_agricola.php');
			$ll_monitoreo_superficie_agricola=new ll_monitoreo_superficie_agricola();
			$ll_monitoreo_superficie_agricola->idmonitoreo=$parametro[1];
			$ll_monitoreo_superficie_agricola->sup_prod_agricola=$parametro[2];
			$ll_monitoreo_superficie_agricola->estado=1;
			echo $ll_monitoreo_superficie_agricola->insertar_actualizar($ll_monitoreo_superficie_agricola);
			break;
		case '2':
			include_once('../modelo/ll_monitoreo_superficie_agricola.php');
			$ll_monitoreo_superficie_agricola=new ll_monitoreo_superficie_agricola();
			$ll_monitoreo_superficie_agricola->idmonitoreo=$parametro[1];
			echo $ll_monitoreo_superficie_agricola->obtener($ll_monitoreo_superficie_agricola);
			break;
		default:
			// code...
			break;
	}
?>