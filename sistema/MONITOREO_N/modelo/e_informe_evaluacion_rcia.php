<?php
include_once('../../config/Conexion.php');
include_once('error.php');
class e_informe_evaluacion_rcia{
	public $idinformeevaluacion;
	public $idmonitoreo;
	public $idoficina;
	public $cite;
	public $fechainforme;
	public $analisistecnico;
	public $conclusiones; 
	public $recomendaciones;
	public $estado;
	function insertar(e_informe_evaluacion_rcia $e_informe_evaluacion_rcia){
		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$sqlgenerarcorrelativo = "select * from monitoreo.f_generarcorrelativo_informe(".$e_informe_evaluacion_rcia->idoficina.",".explode("/",$e_informe_evaluacion_rcia->fechainforme)[2].", 267)";
		$correlativocite = pg_query($cn,$sqlgenerarcorrelativo);
		$correcite = pg_fetch_array($correlativocite);
		$e_informe_evaluacion_rcia->cite = $correcite['f_generarcorrelativo_informe'];
		$Sql="insert into monitoreo.e_informe_evaluacion_rcia (idmonitoreo,idoficina,cite,fechainforme,estado)values(".$e_informe_evaluacion_rcia->idmonitoreo.",".$e_informe_evaluacion_rcia->idoficina.",'".$e_informe_evaluacion_rcia->cite."','".$e_informe_evaluacion_rcia->fechainforme."',".$e_informe_evaluacion_rcia->estado.")";
		pg_query($cn,$Sql);
	}
	function modificar(e_informe_evaluacion_rcia $e_informe_evaluacion_rcia){
		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$Sql="
			update monitoreo.e_informe_evaluacion_rcia 
			set 
				analisistecnico='".$e_informe_evaluacion_rcia->analisistecnico."',
				conclusiones='".$e_informe_evaluacion_rcia->conclusiones."',
				recomendaciones='".$e_informe_evaluacion_rcia->recomendaciones."'
			where idinformeevaluacion=".$e_informe_evaluacion_rcia->idinformeevaluacion."";
		pg_query($cn,$Sql);
	}
	function obtener(e_informe_evaluacion_rcia $e_informe_evaluacion_rcia){
		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$Sql="SELECT * FROM  monitoreo.e_informe_evaluacion_rcia WHERE idmonitoreo=".$e_informe_evaluacion_rcia->idmonitoreo;
		$Result=pg_query($cn,$Sql);
		if(pg_num_rows($Result)>0){
			while($row = pg_fetch_row($Result)) {
				$e_informe_evaluacion_rcia=new e_informe_evaluacion_rcia();
				$e_informe_evaluacion_rcia->idinformeevaluacion=$row[0];
				$e_informe_evaluacion_rcia->idmonitoreo=$row[1];
				$e_informe_evaluacion_rcia->idoficina=$row[2];
				$e_informe_evaluacion_rcia->cite=$row[3];
				$e_informe_evaluacion_rcia->fechainforme=$row[4];
				$e_informe_evaluacion_rcia->analisistecnico=$row[5];
				$e_informe_evaluacion_rcia->conclusiones=$row[6];
				$e_informe_evaluacion_rcia->recomendaciones=$row[7];
				$e_informe_evaluacion_rcia->estado=$row[8];
			}
			return json_encode($e_informe_evaluacion_rcia,JSON_PRETTY_PRINT);
		}else{
			$error=new error();
			$error->codigo=204;
			$error->mensaje="no se ha encontrado coincidencias";
			return json_encode($error,JSON_PRETTY_PRINT);
		}
	}
}
?>