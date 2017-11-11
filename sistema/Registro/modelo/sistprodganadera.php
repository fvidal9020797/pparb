<?php
	include_once('../../config/Conexion.php');
	include_once('error.php');


class sistprodganadera{

	public $idsistproductivo;
	public $idregistro;
	public $cantidad;

	public $idcodificadores;
	public $idclasificador;
	public $nombrecodificador;



	public function listar_sistemas_codificadores(sistprodganadera $sistprodganadera){

		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$Sql= "
		select b.idcodificadores, b.idclasificador, b.nombrecodificador, a.cantidad from
		(select * 
		from sistprodganadera
		where idregistro =".$sistprodganadera->idregistro.") as a
		full join
		(select * 
		from codificadores where idclasificador = ".$sistprodganadera->idclasificador.") as b
		on a.idsistproductivo = b.idcodificadores
		where b.idcodificadores is not null
		order by nombrecodificador asc";

		$Result=pg_query($cn,$Sql);
		if(pg_num_rows($Result)>0){
			$index=0;
			$listObj=array();
			while($row = pg_fetch_row($Result)) {
				$sistprodganadera=new sistprodganadera();
				$sistprodganadera->idcodificadores=$row[0];
				$sistprodganadera->idclasificador=$row[1];
				$sistprodganadera->nombrecodificador=$row[2];
				$sistprodganadera->cantidad=$row[3];
				$listObj[$index]=$sistprodganadera;
				$index++;
			}
			return json_encode($listObj,JSON_PRETTY_PRINT);
			return $listObj;
		}else{
			$error=new error();
			$error->codigo=204;
			$error->mensaje="no se ha encontrado coincidencias";
			return json_encode($error,JSON_PRETTY_PRINT);
		}
	}





}
?>