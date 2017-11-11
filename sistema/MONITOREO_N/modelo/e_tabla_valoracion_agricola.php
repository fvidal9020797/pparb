<?php
include_once('../../config/Conexion.php');
include_once('error.php');
class e_tabla_valoracion_agricola{
	public $idtablavaloracionagricola;
	public $idinformeevaluacion;
	public $idevaluacionespecif;
	public $idcultivo;
	public $puntuacion;
	public $fojas;
	public $produccion;
	public $comprometido;
	public $campana;
	public $estado;
	function obtener(e_tabla_valoracion_agricola $e_tabla_valoracion_agricola){
		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$Sql="select * 
		 	from 
				monitoreo.e_tablas_valoracion_agricola
			where 
				idtablavaloracionagricola=COALESCE(".$e_tabla_valoracion_agricola->idtablavaloracionagricola.",idtablavaloracionagricola) and 
				idinformeevaluacion=COALESCE(".$e_tabla_valoracion_agricola->idinformeevaluacion.",idinformeevaluacion) and 
				idevaluacionespecif=COALESCE(".$e_tabla_valoracion_agricola->idevaluacionespecif.",idevaluacionespecif) and 
				idcultivo=COALESCE(".$e_tabla_valoracion_agricola->idcultivo.",idcultivo) and 
				puntuacion=COALESCE(".$e_tabla_valoracion_agricola->puntuacion.",puntuacion) and 
				fojas=COALESCE(".$e_tabla_valoracion_agricola->fojas.",fojas) and 
				produccion =COALESCE(".$e_tabla_valoracion_agricola->produccion.",produccion) and  
				comprometido=COALESCE(".$e_tabla_valoracion_agricola->comprometido.",comprometido) and 
				campana=COALESCE(".$e_tabla_valoracion_agricola->campana.",campana) and 
				estado=COALESCE(".$e_tabla_valoracion_agricola->estado.",estado)";
		$Result=pg_query($cn,$Sql);
		if(pg_num_rows($Result)>0){
			$list_obj=array();
			$index=0;
			while($row = pg_fetch_row($Result)){
				$e_tabla_valoracion_agricola=new e_tabla_valoracion_agricola();
				$e_tabla_valoracion_agricola->idtablavaloracionagricola=$row[0];
				$e_tabla_valoracion_agricola->idinformeevaluacion=$row[1];
				$e_tabla_valoracion_agricola->idevaluacionespecif=$row[2];
				$e_tabla_valoracion_agricola->idcultivo=$row[3];
				$e_tabla_valoracion_agricola->puntuacion=$row[4];
				$e_tabla_valoracion_agricola->fojas=$row[5];
				$e_tabla_valoracion_agricola->produccion=$row[6];
				$e_tabla_valoracion_agricola->comprometido=$row[7];
				$e_tabla_valoracion_agricola->campana=$row[8];
				$e_tabla_valoracion_agricola->estado=$row[9];
				$list_obj[$index]=$e_tabla_valoracion_agricola;
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
	function insertar(e_tabla_valoracion_agricola $e_tabla_valoracion_agricola){
		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$Sql="
			insert
			into 
				monitoreo.e_tablas_valoracion_agricola(
					idinformeevaluacion,
					idevaluacionespecif,
					idcultivo,
					puntuacion,
					fojas,
					produccion,
					comprometido,
					campana,
					estado
				)
			values(
				".$e_tabla_valoracion_agricola->idinformeevaluacion.",
				".$e_tabla_valoracion_agricola->idevaluacionespecif.",
				".$e_tabla_valoracion_agricola->idcultivo.",
				".$e_tabla_valoracion_agricola->puntuacion.",
				'".$e_tabla_valoracion_agricola->fojas."',
				'".$e_tabla_valoracion_agricola->produccion."',
				'".$e_tabla_valoracion_agricola->comprometido."',
				'".$e_tabla_valoracion_agricola->campana."',
				".$e_tabla_valoracion_agricola->estado.
			")";
		pg_query($cn,$Sql);
	}
	function eliminar(e_tabla_valoracion_agricola $e_tabla_valoracion_agricola){
		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$Sql="
			delete
			from
				monitoreo.e_tablas_valoracion_agricola
			where
				idinformeevaluacion=".$e_tabla_valoracion_agricola->idinformeevaluacion."";
		pg_query($cn,$Sql);
	}
}
?>