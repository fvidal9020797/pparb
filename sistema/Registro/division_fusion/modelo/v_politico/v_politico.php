<?php
include_once('../../../config/Conexion.php');
class v_politico{
	public $cod;
	public $comp;
	function listar(){
		$Con= Conexion::create();
		$cn=$Con->getConexion();
		$Sql="SELECT * FROM v_politico ORDER BY comp";
		$Result=pg_query($cn,$Sql);
		$i=0;
		$list_v_politico = array();
		while ($row = pg_fetch_assoc($Result)) {
			$_v_politico=new v_politico();
			$_v_politico->cod=$row['cod'];
			$_v_politico->comp=$row['comp'];
			$list_v_politico[$i]=$_v_politico;
			$i++;
		}
		return $list_v_politico;
	}
}