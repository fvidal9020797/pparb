<?php
include_once('../../config/Conexion.php');
include_once('error.php');
class e_puntuacion_informe_evaluacion{
	public $idinformeevaluacion;
	public $actividad;
	public $notaobtenida;
	public $superficie;
	public $peso;
	public $valoracion;
	function obtener(e_puntuacion_informe_evaluacion $e_puntuacion_informe_evaluacion){
		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$Sql="
			select * 
				from 
					monitoreo.e_puntuacion_informe_evaluacion
				where
					idinformeevaluacion=".$e_puntuacion_informe_evaluacion->idinformeevaluacion."order by actividad ASC";
		$Result=pg_query($cn,$Sql);
		if(pg_num_rows($Result)>0){
			$list_obj=array();
			$index=0;
			while($row = pg_fetch_row($Result)){
				$e_puntuacion_informe_evaluacion=new e_puntuacion_informe_evaluacion();
				$e_puntuacion_informe_evaluacion->idinformeevaluacion=$row[0];
				$e_puntuacion_informe_evaluacion->actividad=$row[1];
				$e_puntuacion_informe_evaluacion->notaobtenida=$row[2];
				$e_puntuacion_informe_evaluacion->superficie=$row[3];
				$e_puntuacion_informe_evaluacion->peso=$row[4];
				$e_puntuacion_informe_evaluacion->valoracion=$row[5];
				$list_obj[$index]=$e_puntuacion_informe_evaluacion;
				$index++;
			}
			return json_encode($list_obj,JSON_PRETTY_PRINT);
		}else{
			$error=new error();
			$error->codigo=204;
			$error->mensaje="no se ha encontrado coincidencias";
			return json_encode($error,JSON_PRETTY_PRINT);
		}
	}
	function insertar(e_puntuacion_informe_evaluacion $e_puntuacion_informe_evaluacion){
		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$Sql="
			select * from monitoreo.ff_guardar_actualizar_e_puntuacion_informe_evaluacion(
				".$e_puntuacion_informe_evaluacion->idinformeevaluacion.",
				".$e_puntuacion_informe_evaluacion->actividad.",
				".$e_puntuacion_informe_evaluacion->notaobtenida.",
				".$e_puntuacion_informe_evaluacion->superficie.
			")";
		
		pg_query($cn,$Sql);
	}
	function eliminar(e_puntuacion_informe_evaluacion $e_puntuacion_informe_evaluacion){
		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$Sql="
			delete 
			from
				monitoreo.e_puntuacion_informe_evaluacion
			where
				idinformeevaluacion=".$e_puntuacion_informe_evaluacion->idinformeevaluacion." and
				actividad=".$e_puntuacion_informe_evaluacion->actividad."
			";
		pg_query($cn,$Sql);
	}
}
?>