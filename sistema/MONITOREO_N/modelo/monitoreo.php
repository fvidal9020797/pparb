<?php
include_once('../../config/Conexion.php');
class monitoreo{
	public $idmonitoreo;
	public $idregistro;
	public $año;
	public $tipo;
	public $estado;
	public $nota;
	public $valoracion;
	public $numeroinforme;
	public $oficina;
	function listar(monitoreo $monitoreo){// lista de monitoreos por predio
		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$Sql="select * from monitoreo.monitoreo where idregistro=".$monitoreo->idregistro." ORDER BY anho ASC";
		$Result=pg_query($cn,$Sql);
		//print_r("asdasd".pg_num_rows($Result));
		if(pg_num_rows($Result)>-1){
			$index=0;
			$listObj=array();
			while($row = pg_fetch_row($Result)){
				$monitoreo=new monitoreo();
				$monitoreo->idmonitoreo=$row[0];
				$monitoreo->idregistro=$row[1];
				$monitoreo->año=$row[2];
				$monitoreo->tipo=$row[3];
				$monitoreo->estado=$row[4];
				$monitoreo->nota=$row[5];
				$monitoreo->valoracion=$row[6];
				$monitoreo->numeroinforme=$row[7];
				$monitoreo->oficina=$row[8];
				$listObj[$index]=$monitoreo;
				$index++;
			}
			return json_encode($listObj,JSON_PRETTY_PRINT);
		}else{
			return "error";
		}
	}
	function listar_tipos_monitoreos(monitoreo $monitoreo){// lista de monitoreo por año
		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$Sql="select * from monitoreo.monitoreo where idregistro=".$monitoreo->idregistro." and anho=".$monitoreo->anho;
		$Result=pg_query($cn,$Sql);
		if(pg_num_rows($Result)>0){
			$index=0;
			$listObj=array();
			while($row = pg_fetch_row($Result)){
				$monitoreo=new monitoreo();
				$monitoreo->idmonitoreo=$row[0];
				$monitoreo->idregistro=$row[1];
				$monitoreo->año=$row[2];
				$monitoreo->tipo=$row[3];
				$monitoreo->estado=$row[4];
				$monitoreo->nota=$row[5];
				$monitoreo->valoracion=$row[6];
				$monitoreo->numeroinforme=$row[7];
				$monitoreo->oficina=$row[8];
				$listObj[$index]=$monitoreo;
				$index++;
			}
			return json_encode($listObj,JSON_PRETTY_PRINT);
		}else{
			return "error";
		}
	}
}
?>