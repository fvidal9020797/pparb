<?php
include_once('../../config/Conexion.php');
include_once('error.php');
class funcionarioMonitoreo{
	public $idmonitoreo;
	public $idfuncionario;
	public $tiporegistrador;
	function obtener(funcionarioMonitoreo $funcionarioMonitoreo){
		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$Sql="SELECT * from monitoreo.funcionariomonitoreo where idmonitoreo=".$funcionarioMonitoreo->idmonitoreo." and idfuncionario=".$funcionarioMonitoreo->idfuncionario;
		//print_r($Sql);
		$Result=pg_query($cn,$Sql);
		if(pg_num_rows($Result)>0){
			$index=0;
			$listObj=array();
			while($row = pg_fetch_row($Result)){
				$funcionarioMonitoreo=new funcionarioMonitoreo();
				$funcionarioMonitoreo->idmonitoreo=$row[0];
				$funcionarioMonitoreo->idfuncionario=$row[1];
				$funcionarioMonitoreo->tiporegistrador=$row[2];
				$listObj[$index]=$funcionarioMonitoreo;
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