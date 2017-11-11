<?php
	include_once('../../config/Conexion.php');
	include_once('error.php');
class superficiealimentos{
	public $idsupalimentos;
	public $idregistro;
	public $supagricola;
	public $supganadera;
	public $supbarbecho;
	public $supdescanso;
	public $supganlegal;
	public function obtener_superficie_alimentos(superficiealimentos $superficiealimentos){
		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$Sql="select * from superficiealimentos where idregistro = ".$superficiealimentos->idregistro;
		$Result=pg_query($cn,$Sql);
		if(pg_num_rows($Result)>0){
			$index=0;
			$listObj=array();
			while($row = pg_fetch_row($Result)) {
				$superficiealimentos=new superficiealimentos();
				$superficiealimentos->idsupalimentos=$row[0];
				$superficiealimentos->idregistro=$row[1];
				$superficiealimentos->supagricola=$row[2];
				$superficiealimentos->supganadera=$row[3];
				$superficiealimentos->supbarbecho=$row[4];
				$superficiealimentos->supdescanso=$row[5];
				$superficiealimentos->supganlegal=$row[6];
				$listObj[$index]=$superficiealimentos;
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