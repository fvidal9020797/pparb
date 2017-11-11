<?php
include_once('../../config/Conexion.php');
include_once('error.php');
class ll_monitoreo_superficie_agricola{
	public $idmonitoreo;
	public $sup_prod_agricola;
	public $estado;
	function insertar_actualizar(ll_monitoreo_superficie_agricola $ll_monitoreo_superficie_agricola){
		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$Sql="select * from monitoreo.ff_guardar_superficie_agricola(".$ll_monitoreo_superficie_agricola->idmonitoreo.",".$ll_monitoreo_superficie_agricola->sup_prod_agricola.",".$ll_monitoreo_superficie_agricola->estado.")";
		pg_query($cn,$Sql);
	}
	function obtener(ll_monitoreo_superficie_agricola $ll_monitoreo_superficie_agricola){
		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$Sql="SELECT * FROM  monitoreo.ll_monitoreo_superficie_agricola WHERE idmonitoreo=".$ll_monitoreo_superficie_agricola->idmonitoreo;
		$Result=pg_query($cn,$Sql);
		if(pg_num_rows($Result)>0){
			$index=0;
			$listObj=array();
			while($row = pg_fetch_row($Result)) {
				$ll_monitoreo_superficie_agricola=new ll_monitoreo_superficie_agricola();
				$ll_monitoreo_superficie_agricola->idmonitoreo=$row[0];
				$ll_monitoreo_superficie_agricola->sup_prod_agricola=$row[1];
				$ll_monitoreo_superficie_agricola->estado=$row[2];
				$listObj[$index]=$ll_monitoreo_superficie_agricola;
				$index++;
			}
			return json_encode($listObj,JSON_PRETTY_PRINT);
		}else{
			$error=new error();
			$error->codigo=204;
			$error->mensaje="no se ha encontrado coincidencias";
			return json_encode($error,JSON_PRETTY_PRINT);
		}
	}
}	
?>