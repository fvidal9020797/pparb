<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of codificadores
 *
 * @author Billy Leanos
 */

class GestorRegistro {
	protected $cn;
    //put your code here
	function __construct() {
		require_once APPPATH.'/config/Conexion.php';
		$this->cn = Conexion::create();
	}

  function getDataregistro( $idregistro ,$table){
	$sql="SELECT *FROM ".$table." where idregistro=".$idregistro;
return $this->cn->ejecutarSql($sql);
}

function getDataParcela( $idparcela ,$table){
	$sql="SELECT *FROM ".$table." where idparcela='".$idparcela."'";

return $this->cn->ejecutarSql($sql);
}
function getDataParcela1( $idparcela ,$table){
	$sql="SELECT *FROM ".$table." where idparcela='".$idparcela."'";
	return  $sql;

}
function getDatosPredioAll($idpredio){
		$sql="SELECT *FROM report_general where \"ID REGISTRO\"=".$idpredio;
return $this->cn->ejecutarSql($sql);
}


function getDatosPredioAllObject($codparcela,$nombre,$departamento){
		$sql="SELECT *FROM report_general where \"ID REGISTRO\"<>0 ";
if ($codparcela!="") {
	$sql.=" and \"ID PARCELA\"like'%".$codparcela."%' ";
}
if ($nombre!="") {
	$sql.=" and \"NOMBRE PREDIO\" Ilike '%".$nombre."%' ";
}
if ($departamento!="") {
	$sql.=" and \"DEPARTAMENTO\"='".$departamento."' ";
}
return $this->cn->ejecutarSqlObject($sql);
}


///// obtener datos de especies y nombre cientifico
function getDatosEspeciesAllObject($comun,$cientifico){
		$sql="select especienombrecomun.idespecie, especie.nombrecientifico, especienombrecomun.nombrecomun, especienombrecomun.idespeciecomun FROM  public.especie, public.especienombrecomun where especie.idespecie = especienombrecomun.idespecie ";
if ($comun!="") {
	$sql.=" and nombrecomun like '%.$comun.%' ";
}
if ($cientifico!="") {
	$sql.=" or nombrecientifico like '%.$cientifico.%' ";
}

return $this->cn->ejecutarSqlObject($sql);
}







}
?>
