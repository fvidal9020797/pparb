<?php
include_once('../../../config/Conexion.php');
class t_fecharegistro{
	public $idregistro;
	public $fechasuscripcion;
	function Obtener(t_fecharegistro $_t_fecharegistro){
		$Con= Conexion::create();
		$cn=$Con->getConexion();
		$Sql="select * from fechasregistro where idregistro=".$_t_fecharegistro->idregistro;
		$Result=pg_query($cn,$Sql);
		while ($row = pg_fetch_row($Result)) {
			$_t_fecharegistro=new t_fecharegistro();
			$_t_fecharegistro->idregistro=$row[0];
			$_t_fecharegistro->fechasuscripcion=$row[1];
				
		}
		return $_t_fecharegistro;
	}
	function guardar(t_fecharegistro $_t_fecharegistro){
		$Con= Conexion::create();
		$cn=$Con->getConexion();
		$Sql="insert into fechasregistro values(".$_t_fecharegistro->idregistro.",'".$_t_fecharegistro->fechasuscripcion."')";
		pg_query($cn,$Sql);
	}
}
?>