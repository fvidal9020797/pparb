<?php
	include_once('../class_valoracion_alimentos.php');
	$IdMonitoreo=$_POST['idmonitoreo'];
	$ObjValoracion_Alimentos=new valoracion_alimentos();
	$ObjValoracion_Alimentos->idmonitoreo=$IdMonitoreo;
	$ObjValoracion_Alimentos->tipo="71";
	$ListaObj=$ObjValoracion_Alimentos->Obtener($ObjValoracion_Alimentos);
	$Result="";
	for ($i=0; $i < count($ListaObj) ; $i++) {
		$ObjValoracion_Alimentos=new valoracion_alimentos();
		$ObjValoracion_Alimentos=$ListaObj[$i];
		$Result=$Result.$ObjValoracion_Alimentos->puntuacion."!";
	}
	echo $Result;
?>
