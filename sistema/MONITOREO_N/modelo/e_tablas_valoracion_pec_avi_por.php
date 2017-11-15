 <?php
include_once('../../config/Conexion.php');
include_once('error.php');
class e_tablas_valoracion_pec_avi_por{
	public $idtablavaloracionpec;
	public $idinformeevaluacion;
	public $idevaluacionespecifica;
	public $ponderacion;
	public $fojas;
	public $tipoactividad;
	public $estado;
	function insertar(e_tablas_valoracion_pec_avi_por $e_tablas_valoracion_pec_avi_por){
		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$Sql="
			insert into monitoreo.e_tablas_valoracion_pec_avi_por 
			(
				idinformeevaluacion,
				idevaluacionespecifica,
				ponderacion,fojas,
				tipoactividad, 
				estado
			)
			values(
				".$e_tablas_valoracion_pec_avi_por->idinformeevaluacion.",
				".$e_tablas_valoracion_pec_avi_por->idevaluacionespecifica.",
				".$e_tablas_valoracion_pec_avi_por->ponderacion.",
				'".$e_tablas_valoracion_pec_avi_por->fojas."',
				".$e_tablas_valoracion_pec_avi_por->tipoactividad.",
				".$e_tablas_valoracion_pec_avi_por->estado.")";
		pg_query($cn,$Sql);
	}
	function obtener(e_tablas_valoracion_pec_avi_por $e_tablas_valoracion_pec_avi_por){
		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$Sql="
			SELECT * 
			FROM  monitoreo.e_tablas_valoracion_pec_avi_por 
			WHERE 
				idinformeevaluacion=".$e_tablas_valoracion_pec_avi_por->idinformeevaluacion." and
				tipoactividad=".$e_tablas_valoracion_pec_avi_por->tipoactividad;
		$Result=pg_query($cn,$Sql);
		if(pg_num_rows($Result)>0){
			$index=0;
			$listObj=array();
			while($row = pg_fetch_row($Result)) {
				$e_tablas_valoracion_pec_avi_por=new e_tablas_valoracion_pec_avi_por();
				$e_tablas_valoracion_pec_avi_por->idtablavaloracionpec=$row[0];
				$e_tablas_valoracion_pec_avi_por->idinformeevaluacion=$row[1];
				$e_tablas_valoracion_pec_avi_por->idevaluacionespecifica=$row[2];
				$e_tablas_valoracion_pec_avi_por->ponderacion=$row[3];
				$e_tablas_valoracion_pec_avi_por->fojas=$row[4];
				$e_tablas_valoracion_pec_avi_por->tipoactividad=$row[5];
				$e_tablas_valoracion_pec_avi_por->estado=$row[6];
				$listObj[$index]=$e_tablas_valoracion_pec_avi_por;
				$index++;
			}
			return json_encode($listObj,JSON_PRETTY_PRINT);
			return $listObj;
		}else{
			$error=new error();
			$error->codigo=204;
			$error->mensaje="no se ha encontrado coincidencias";
			return json_encode($error,JSON_PRETTY_PRINT);
		}
	}
	function eliminar(e_tablas_valoracion_pec_avi_por $e_tablas_valoracion_pec_avi_por){
		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$Sql="
			delete 
			from monitoreo.e_tablas_valoracion_pec_avi_por 
			where 
				idinformeevaluacion=".$e_tablas_valoracion_pec_avi_por->idinformeevaluacion." and
				tipoactividad=".$e_tablas_valoracion_pec_avi_por->tipoactividad;
		pg_query($cn,$Sql);
	}
}
?>