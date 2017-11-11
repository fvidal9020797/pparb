<?php
include_once('../../config/Conexion.php');
class v_parcela{
	public $idregistro;
	public $idparcela;
	public $nombre;
	public $con;
	function listar(){
		# code...
	}
	function obtener(v_parcela $v_parcela){
		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$Sql="select * from v_parcela where idregistro=".$v_parcela->idregistro;
		$Result=pg_query($cn,$Sql);
		while($row = pg_fetch_row($Result)) {
			$v_parcela=new v_parcela();
			$v_parcela->idregistro=$row[0];
			$v_parcela->idparcela=$row[1];
			$v_parcela->nombre=$row[2];
		}
		return json_encode($v_parcela,JSON_PRETTY_PRINT);
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