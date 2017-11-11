<?php
include_once('../../config/Conexion.php');
class r_general{
	public $idregistro;
	public $nombrepredio;
	public $idparcela;
	public $subpredio;
	public $supproali;
	public $tipoProp;
	public $clasificacion;
	function obtener(r_general $r_general){
		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$Sql='select idregistro, nombrepredio, idparcela, suppredio, supproali, "TipoProp", "Clasificacion" as cla  from r_general where idregistro='.$r_general->idregistro;
		$Result=pg_query($cn,$Sql);
		while($row = pg_fetch_row($Result)) {
			$r_general=new r_general();
			$r_general->idregistro=$row[0];
			$r_general->nombrepredio=$row[1];
			$r_general->idparcela=$row[2];
			$r_general->subpredio=$row[3];
			$r_general->supproali=$row[4];
			$r_general->tipoProp=$row[5];
			$r_general->clasificacion=$row[6];
		}
		return json_encode($r_general,JSON_PRETTY_PRINT);
	}
}
?>