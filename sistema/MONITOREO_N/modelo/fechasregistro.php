<?php
include_once('../../config/Conexion.php');
class fechasregistro{
	public $idregistro;
	public $fechasuscripcion;
	function obtener(fechasregistro $fechasregistro){
		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$Sql="select idregistro, fechasuscripcion from fechasregistro where idregistro=".$fechasregistro->idregistro;
		$Result=pg_query($cn,$Sql);
		while($row = pg_fetch_row($Result)) {
			$fechasregistro=new fechasregistro();
			$fechasregistro->idregistro=$row[0];
			$fechasregistro->fechasuscripcion=$row[1];
		}
		return json_encode($fechasregistro,JSON_PRETTY_PRINT);
	}
}
?>