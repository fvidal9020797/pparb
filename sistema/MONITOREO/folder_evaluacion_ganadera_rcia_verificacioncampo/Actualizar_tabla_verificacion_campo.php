<?php
	include_once('../class_valoracion_alimentos.php');
	$IdMonitoreo=$_POST['idmonitoreo'];
	$ListaValoracion=$_POST['listaValoracion'];
	$ObjValoracion_Alimentos=new valoracion_alimentos();
	$ObjValoracion_Alimentos->idmonitoreo=$IdMonitoreo;
	$ObjValoracion_Alimentos->tipo="71";
	$ObjValoracion_Alimentos->Eliminar($ObjValoracion_Alimentos);
	$ListaValoraciones=split(':',$ListaValoracion);
	for ($i=0; $i < count($ListaValoraciones)-1; $i++) {
		$VectorListaValoraciones=split('!',$ListaValoraciones[$i]);
		$ObjValoracion_Alimentos=new valoracion_alimentos();
		$ObjValoracion_Alimentos->idmonitoreo=$IdMonitoreo;
		$ObjValoracion_Alimentos->idevalespecif=$VectorListaValoraciones[0];
		$ObjValoracion_Alimentos->puntuacion=$VectorListaValoraciones[1];
		$ObjValoracion_Alimentos->tipo="71";
		$ObjValoracion_Alimentos->Agregar($ObjValoracion_Alimentos);
	}
?>
