<?php
	include_once('../../config/Conexion.php');
	include_once('error.php');
class cultivo{
	public $idcultivo;
	public $nombrecultivo;
	public function obtener(cultivo $cultivo){
		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$Sql="SELECT * FROM  cultivo where idcultivo=".$cultivo->idcultivo;
		$Result=pg_query($cn,$Sql);
		if(pg_num_rows($Result)>0){
			$index=0;
			$listObj=array();
			while($row = pg_fetch_row($Result)) {
				$cultivo=new cultivo();
				$cultivo->idcultivo=$row[0];
				$cultivo->nombrecultivo=$row[1];
				$listObj[$index]=$cultivo;
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


	public function listar_cultivos(){
		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$Sql="SELECT * FROM  cultivo ";
		$Result=pg_query($cn,$Sql);
		if(pg_num_rows($Result)>0){
			$index=0;
			$listObj=array();
			while($row = pg_fetch_row($Result)) {
				$cultivo=new cultivo();
				$cultivo->idcultivo=$row[0];
				$cultivo->nombrecultivo=$row[1];
				$listObj[$index]=$cultivo;
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