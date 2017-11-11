<?php
include_once('../../../config/Conexion.php');
class t_representante{
	public $idpersona;
	public $idparcela;
	public $dirNotificacion;
	public $num_doc_poder;
	function Obtener(t_representante $_t_representante){
		$Con= Conexion::create();
		$cn=$Con->getConexion();
		$Sql="select * from representante where idparcela='".$_t_representante->idparcela."'";
		$Result=pg_query($cn,$Sql);
		while ($row = pg_fetch_row($Result)) {
			$_t_representante=new t_representante();
			$_t_representante->idpersona=$row[0];
			$_t_representante->idparcela=$row[1];
			$_t_representante->dirNotificacion=$row[2];
			$_t_representante->num_doc_poder=$row[3];
		}
		return $_t_representante;
	}
}
?>