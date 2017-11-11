<?php
include_once('../../../config/Conexion.php');
class v_funcionario{
	public $idfuncionario;
	public $cargo;
	public $nombre;
	function Obtener(v_funcionario $_v_funcionario){
		$Con= Conexion::create();
		$cn=$Con->getConexion();
		$Sql="select * from v_funcionario where cargo=".$_v_funcionario->cargo." order by nomcompleto ASC ";
		$Result=pg_query($cn,$Sql);
		$i=0;
		$list_v_funcionario = array();
		while ($row = pg_fetch_assoc($Result)) {
			$_v_funcionario=new v_funcionario();
			$_v_funcionario->idfuncionario=$row['idfuncionario'];
			$_v_funcionario->cargo=$row['cargo'];
			$_v_funcionario->nombre=$row['nomcompleto'];
			$list_v_funcionario[$i]=$_v_funcionario;
			$i++;
		}
		return $list_v_funcionario;
	}
}
?>