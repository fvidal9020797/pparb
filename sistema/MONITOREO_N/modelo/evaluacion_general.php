<?php
include_once('../../config/Conexion.php');
include_once('evaluacion_especifica.php');
class evaluacion_gral{
	public $idevalgral;
	public $parametrogral;
	public $ponderacion;
	public $tipoactividad;
	public $tipoevaluacion;
	public $orden;
	public $estado;
	public $evaluacion_especifica;
	public $list_evaluacion_especifica;
	function obtener(evaluacion_gral $evaluacion_gral){
		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$Sql="SELECT * FROM monitoreo.evaluaciongeneral WHERE estado=".$evaluacion_gral->estado." and tipoactividad=".$evaluacion_gral->tipoactividad." ORDER BY orden ASC";
		$Result=pg_query($cn,$Sql);
		$list_obj=array();
		$index=0;
		while($row = pg_fetch_row($Result)){
			$evaluacion_gralaux=new evaluacion_gral();
			$evaluacion_gralaux->idevalgral=$row[0];
			$evaluacion_gralaux->parametrogral=$row[1];
			$evaluacion_gralaux->ponderacion=$row[2];
			$evaluacion_gralaux->tipoactividad=$row[3];
			$evaluacion_gralaux->tipoevaluacion=$row[4];
			$evaluacion_gralaux->orden=$row[5];
			$evaluacion_gralaux->estado=$row[6];
			$evaluacion_especifica_aux=new evaluacion_especifica();
			$evaluacion_especifica_aux->idevalgral=$evaluacion_gralaux->idevalgral;
			$evaluacion_especifica_aux->tipopredio=$evaluacion_gral->evaluacion_especifica->tipopredio;
			$evaluacion_gralaux->list_evaluacion_especifica=$evaluacion_especifica_aux->obtener($evaluacion_especifica_aux);
			$list_obj[$index]=$evaluacion_gralaux;
			$index++;
		}
		return json_encode($list_obj,JSON_PRETTY_PRINT);
	}
}
?>