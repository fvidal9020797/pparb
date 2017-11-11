<?php
include_once('../../config/Conexion.php');
class codificadores{
	public $idcodificadores;
	public $idclasificador;
	public $nombrecodificador;
	public $orden;
	function listar(){// lista de oficinas
		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$Sql="select * from codificadores where idclasificador=20";
		$Result=pg_query($cn,$Sql);
		if(pg_num_rows($Result)>0){
			$index=0;
			$listObj=array();
			while($row = pg_fetch_row($Result)){
				$codificadores=new codificadores();
				$codificadores->idcodificadores=$row[0];
				$codificadores->idclasificador=$row[1];
				$codificadores->nombrecodificador=$row[2];
				$codificadores->orden=$row[3];
				$listObj[$index]=$codificadores;
				$index++;
			}
			return json_encode($listObj,JSON_PRETTY_PRINT);
		}else{
			return "error";
		}
	}


	function listar_codificadores(codificadores $codificadores){// listado
		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$Sql="select * from codificadores where idclasificador=".$codificadores->idclasificador. " and orden = " .$codificadores->orden. " order by idcodificadores asc";

		$Result=pg_query($cn,$Sql);

		if(pg_num_rows($Result)>0){
			$index=0;
			$listObj=array();
			while($row = pg_fetch_row($Result)){
				$codificadores=new codificadores();
				$codificadores->idcodificadores=$row[0];
				$codificadores->idclasificador=$row[1];
				$codificadores->nombrecodificador=$row[2];
				$codificadores->orden=$row[3];
				$listObj[$index]=$codificadores;
				$index++;
			}
			return json_encode($listObj,JSON_PRETTY_PRINT);
		}else{
			return "error";
		}
	}  


	function listar_codificadores_sin_orden(codificadores $codificadores){// listado
		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$Sql="select * from codificadores where idclasificador=".$codificadores->idclasificador. " order by idcodificadores asc";

		$Result=pg_query($cn,$Sql);

		if(pg_num_rows($Result)>0){
			$index=0;
			$listObj=array();
			while($row = pg_fetch_row($Result)){
				$codificadores=new codificadores();
				$codificadores->idcodificadores=$row[0];
				$codificadores->idclasificador=$row[1];
				$codificadores->nombrecodificador=$row[2];
				$codificadores->orden=$row[3];
				$listObj[$index]=$codificadores;
				$index++;
			}
			return json_encode($listObj,JSON_PRETTY_PRINT);
		}else{
			return "error";
		}
	}  
	function listar_por_codificadores(codificadores $codificadores){// listar por codificadores
		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$Sql="select * from codificadores where idcodificadores=".$codificadores->idcodificadores;
		$Result=pg_query($cn,$Sql);
		if(pg_num_rows($Result)>0){
			$index=0;
			$listObj=array();
			while($row = pg_fetch_row($Result)){
				$codificadores=new codificadores();
				$codificadores->idcodificadores=$row[0];
				$codificadores->idclasificador=$row[1];
				$codificadores->nombrecodificador=$row[2];
				$codificadores->orden=$row[3];
				$listObj[$index]=$codificadores;
				$index++;
			}
			return json_encode($listObj,JSON_PRETTY_PRINT);
		}else{
			return "error";
		}
	}

	function agregar($value=''){
		# code...
	}
	function modificar($value=''){
		# code...
	}
	function eliminar($value=''){
		# code...
	}
}
?>