<?php
include_once('../../config/Conexion.php');
include_once('error.php');
class e_tabla_ponderacion_agricola{
	public $idponderacion;
	public $idinformeevaluacion;
	public $idcultivo;
	public $porcponderacion;
	public $ponderacion;
	public $notacultivo;
	public $campana;
	public $comprometido;
	public $estado;
	function obtener(e_tabla_ponderacion_agricola $e_tabla_ponderacion_agricola){
		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$Sql="select * 
				from 
					monitoreo.e_tabla_ponderacion_agricola
				where
					idponderacion=COALESCE(".$e_tabla_ponderacion_agricola->idponderacion.",idponderacion)and
			  		idinformeevaluacion=COALESCE(".$e_tabla_ponderacion_agricola->idinformeevaluacion.",idinformeevaluacion) and 
			  		idcultivo=COALESCE(".$e_tabla_ponderacion_agricola->idcultivo.",idcultivo)and
			  		porcponderacion=COALESCE(".$e_tabla_ponderacion_agricola->porcponderacion.",porcponderacion)and
			  		ponderacion=COALESCE(".$e_tabla_ponderacion_agricola->ponderacion.",ponderacion)and
			  		notacultivo=COALESCE(".$e_tabla_ponderacion_agricola->notacultivo.",notacultivo)and
			  		campana=COALESCE(".$e_tabla_ponderacion_agricola->campana.",campana)and
			  		comprometido=COALESCE(".$e_tabla_ponderacion_agricola->comprometido.",comprometido)and
			  		estado=COALESCE(".$e_tabla_ponderacion_agricola->estado.",estado)";
		$Result=pg_query($cn,$Sql);
		if(pg_num_rows($Result)>0){
			$list_obj=array();
			$index=0;
			while($row = pg_fetch_row($Result)){
				$e_tabla_ponderacion_agricola=new e_tabla_ponderacion_agricola();
				$e_tabla_ponderacion_agricola->idponderacion=$row[0];
				$e_tabla_ponderacion_agricola->idinformeevaluacion=$row[1];
				$e_tabla_ponderacion_agricola->idcultivo=$row[2];
				$e_tabla_ponderacion_agricola->porcponderacion=$row[3];
				$e_tabla_ponderacion_agricola->ponderacion=$row[4];
				$e_tabla_ponderacion_agricola->notacultivo=$row[5];
				$e_tabla_ponderacion_agricola->campana=$row[6];
				$e_tabla_ponderacion_agricola->comprometido=$row[7];
				$e_tabla_ponderacion_agricola->estado=$row[8];
				$list_obj[$index]=$e_tabla_ponderacion_agricola;
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
	function insertar(e_tabla_ponderacion_agricola $e_tabla_ponderacion_agricola){
		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$Sql="
			insert
			into 
				monitoreo.e_tabla_ponderacion_agricola(
					idinformeevaluacion,
					idcultivo,
					porcponderacion,
					ponderacion,
					notacultivo,
					campana,
					comprometido,
					estado
				)
			values(
				".$e_tabla_ponderacion_agricola->idinformeevaluacion.",
				".$e_tabla_ponderacion_agricola->idcultivo.",
				".$e_tabla_ponderacion_agricola->porcponderacion.",
				".$e_tabla_ponderacion_agricola->ponderacion.",
				".$e_tabla_ponderacion_agricola->notacultivo.",
				'".$e_tabla_ponderacion_agricola->campana."',
				'".$e_tabla_ponderacion_agricola->comprometido."',
				".$e_tabla_ponderacion_agricola->estado.
			")";
		pg_query($cn,$Sql);
	}
	function eliminar(e_tabla_ponderacion_agricola $e_tabla_ponderacion_agricola){
		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$Sql="
			delete 
			from
				monitoreo.e_tabla_ponderacion_agricola
			where
				idinformeevaluacion=".$e_tabla_ponderacion_agricola->idinformeevaluacion." and
				idcultivo=".$e_tabla_ponderacion_agricola->idcultivo." and
				campana='".$e_tabla_ponderacion_agricola->campana."' and
				comprometido='".$e_tabla_ponderacion_agricola->comprometido."'
			";
		pg_query($cn,$Sql);
	}
}
?>