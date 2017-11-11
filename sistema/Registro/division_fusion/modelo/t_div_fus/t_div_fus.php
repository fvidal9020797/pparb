<?php
include_once('../../../config/Conexion.php');
class t_div_fus{
	public $id;
	public $id_padre;
	public $id_hijo;
	public $fecha;
	public $tipo;
	function guardar(t_div_fus $_t_div_fus){
		$Con= Conexion::create();
		$cn=$Con->getConexion();
		$Sql="insert into div_fus(id_padre,id_hijo,fecha,tipo)values(".$_t_div_fus->id_pardre.",".$_t_div_fus->id_hijo.",'".$_t_div_fus->fecha."','".$_t_div_fus->tipo."')";
		pg_query($cn,$Sql);
	}
	function listar_padres(){
		$Con= Conexion::create();
		$cn=$Con->getConexion();
		$Sql="SELECT DISTINCT id_padre,fecha FROM div_fus where tipo='0' ORDER BY fecha";
		$Result=pg_query($cn,$Sql);
		$i=0;
		$list_t_div_fus = array();
		while ($row = pg_fetch_assoc($Result)) {
			$_t_div_fus=new t_div_fus();
			$_t_div_fus->id_padre=$row['id_padre'];
			$_t_div_fus->fecha=$row['fecha'];
			$list_t_div_fus[$i]=$_t_div_fus;
			$i++;
		}
		return $list_t_div_fus;
	}
	function obtener_hijos(t_div_fus $_t_div_fus){
		$Con= Conexion::create();
		$cn=$Con->getConexion();
		$Sql="SELECT id_hijo FROM div_fus where id_padre=".$_t_div_fus->id_padre;
		$Result=pg_query($cn,$Sql);
		$i=0;
		$list_t_div_fus = array();
		while ($row = pg_fetch_assoc($Result)) {
			$_t_div_fus=new t_div_fus();
			$_t_div_fus->id_hijo=$row['id_hijo'];
			$list_t_div_fus[$i]=$_t_div_fus;
			$i++;
		}
		return $list_t_div_fus;
	}
}
?>
