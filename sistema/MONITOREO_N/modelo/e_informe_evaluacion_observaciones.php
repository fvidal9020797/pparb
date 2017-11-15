<?php
include_once('../../config/Conexion.php');
include_once('error.php');
class e_informe_evaluacion_observaciones{
	public $idinformeevaluacion;
	public $idactividad;
	public $observaciones;
	function insertar(e_informe_evaluacion_observaciones $e_informe_evaluacion_observaciones){
		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$Sql="
			insert 
			into monitoreo.e_informe_evaluacion_observaciones 
			values
			(
				".$e_informe_evaluacion_observaciones->idinformeevaluacion.",
				".$e_informe_evaluacion_observaciones->idactividad.",
				'".$e_informe_evaluacion_observaciones->observaciones."'
			)";
		pg_query($cn,$Sql);
	}
	function obtener(e_informe_evaluacion_observaciones $e_informe_evaluacion_observaciones){
		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$Sql="
			SELECT * 
			FROM  monitoreo.e_informe_evaluacion_observaciones 
			WHERE 
				idinformeevaluacion=COALESCE(".$e_informe_evaluacion_observaciones->idinformeevaluacion.",idinformeevaluacion)and
				idactividad=COALESCE(".$e_informe_evaluacion_observaciones->idactividad.",idactividad)
			";
		$Result=pg_query($cn,$Sql);
		if(pg_num_rows($Result)>0){
			while($row = pg_fetch_row($Result)) {
				$e_informe_evaluacion_observaciones=new e_informe_evaluacion_observaciones();
				$e_informe_evaluacion_observaciones->idinformeevaluacion=$row[0];
				$e_informe_evaluacion_observaciones->idactividad=$row[1];
				$e_informe_evaluacion_observaciones->observaciones=$row[2];
			}
			return json_encode($e_informe_evaluacion_observaciones,JSON_PRETTY_PRINT);
		}else{
			$error=new error();
			$error->codigo=204;
			$error->mensaje="no se ha encontrado coincidencias";
			return json_encode($error,JSON_PRETTY_PRINT);
		}
	}
	function eliminar(e_informe_evaluacion_observaciones $e_informe_evaluacion_observaciones){
		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$Sql="
			delete 
			from monitoreo.e_informe_evaluacion_observaciones 
			where 
				idinformeevaluacion=".$e_informe_evaluacion_observaciones->idinformeevaluacion." and
				idactividad=".$e_informe_evaluacion_observaciones->idactividad." 
			";
		pg_query($cn,$Sql);
	}
}
?>