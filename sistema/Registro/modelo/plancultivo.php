<?php
	include_once('../../config/Conexion.php');
	include_once('error.php');


class plancultivo{
	
	public $anocultivo;
	public $idcultivo;
	public $idregistro;
	public $supverano;
	public $supinvierno;

	public $nombrecultivo;




	public function obtener_cultivos(plancultivo $plancultivo){

		$Con=Conexion::create();
		$cn=$Con->getConexion();

		$Sql="select pc.*, c.nombrecultivo from plancultivo as pc inner join cultivo as c on pc.idcultivo = c.idcultivo where idregistro = ".$plancultivo->idregistro." and anocultivo = ".$plancultivo->anocultivo;


		$Result=pg_query($cn,$Sql);

		if(pg_num_rows($Result)>0){
			$index=0;
			$listObj=array();
			while($row = pg_fetch_row($Result)) {
				$plancultivo=new plancultivo();
				$plancultivo->anocultivo=$row[0];
				$plancultivo->idcultivo=$row[1];
				$plancultivo->idregistro=$row[2];
				$plancultivo->supverano=$row[3];
				$plancultivo->supinvierno=$row[4];
				$plancultivo->nombrecultivo=$row[5];
				$listObj[$index]=$plancultivo;
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