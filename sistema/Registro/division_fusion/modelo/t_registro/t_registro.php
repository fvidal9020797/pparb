<?php
include_once('../../../config/Conexion.php');
class t_registro{
	public $idregistro;
	public $estado;
	function modifica_estado(t_registro $_t_registro){
		$Con= Conexion::create();
		$cn=$Con->getConexion();
		$Sql="update registro set estado=".$_t_registro->estado." where idregistro=".$_t_registro->idregistro;
		pg_query($cn,$Sql);
	}
}