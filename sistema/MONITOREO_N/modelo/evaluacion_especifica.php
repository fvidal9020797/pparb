<?php
include_once('../../config/Conexion.php');
class evaluacion_especifica{
	public $idevaluacionespecifica;
	public $idevalgral;
	public $parametroespecifico;
	public $valoracion;
	public $orden;
	public $estado;
	public $tipopredio;
	function obtener(evaluacion_especifica $evaluacion_especifica){
		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$Sql="select * from monitoreo.evaluacionespecifica where estado=1 and idevalgral=".$evaluacion_especifica->idevalgral." and tipopredio='".$evaluacion_especifica->tipopredio."' ORDER BY orden asc";
		$list_obj=array();
		$index=0;
		$Result=pg_query($cn,$Sql);
		while($row = pg_fetch_row($Result)){
			$evaluacion_especifica=new evaluacion_especifica();
			$evaluacion_especifica->idevaluacionespecifica=$row[0];
			$evaluacion_especifica->idevalgral=$row[1];
			$evaluacion_especifica->parametroespecifico=$row[2];
			$evaluacion_especifica->valoracion=$row[3];
			$evaluacion_especifica->orden=$row[4];
			$evaluacion_especifica->estado=$row[5];
			$evaluacion_especifica->tipopredio=$row[6];
			$list_obj[$index]=$evaluacion_especifica;
			$index++;
		}
		return $list_obj;
	}
}
?>