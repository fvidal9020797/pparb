<?php
include_once('../../config/Conexion.php');
include_once('error.php');
class ll_monitoreo_agricola{
	public $idllenadoagricola;
	public $idmonitoreo;
	public $cultivo;
	public $anocultivo;
	public $supejecutada;
	public $produccionobt;
	public $campana;
	public $comprometido;
	public $estado;
	function obtener(ll_monitoreo_agricola $ll_monitoreo_agricola){//parametro: idmonitoreo, año
		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$Sql="	select * 
			 	from 
					monitoreo.ll_monitoreo_agricola 
				where 
					idllenadoagricola=COALESCE(".$ll_monitoreo_agricola->idllenadoagricola.",idllenadoagricola) and 
					idmonitoreo=COALESCE(".$ll_monitoreo_agricola->idmonitoreo.",idmonitoreo) and 
					cultivo=COALESCE(".$ll_monitoreo_agricola->cultivo.",cultivo) and 
					anocultivo=COALESCE(".$ll_monitoreo_agricola->anocultivo.",anocultivo) and 
					supejecutada=COALESCE(".$ll_monitoreo_agricola->supejecutada.",supejecutada) and 
					produccionobt=COALESCE(".$ll_monitoreo_agricola->produccionobt.",produccionobt) and 
					campana =COALESCE(".$ll_monitoreo_agricola->campana.",campana) and  
					comprometido=COALESCE (".$ll_monitoreo_agricola->comprometido.",comprometido) and 
					estado=COALESCE(".$ll_monitoreo_agricola->estado.",estado)";
		$Result=pg_query($cn,$Sql);
		if(pg_num_rows($Result)>-1){
			$index=0;
			$listObj=array();
			while($row = pg_fetch_row($Result)){
				$ll_monitoreo_agricola=new ll_monitoreo_agricola();
				$ll_monitoreo_agricola->idllenadoagricola=$row[0];
				$ll_monitoreo_agricola->idmonitoreo=$row[1];
				$ll_monitoreo_agricola->cultivo=$row[2];
				$ll_monitoreo_agricola->anocultivo=$row[3];
				$ll_monitoreo_agricola->supejecutada=$row[4];
				$ll_monitoreo_agricola->produccionobt=$row[5];
				$ll_monitoreo_agricola->campana=$row[6];
				$ll_monitoreo_agricola->comprometido=$row[7];
				$ll_monitoreo_agricola->estado=$row[8];
				$listObj[$index]=$ll_monitoreo_agricola;
				$index++;
			}
			return json_encode($listObj,JSON_PRETTY_PRINT);
		}else{
			$error=new error();
			$error->codigo=204;
			$error->mensaje="no se ha encontrado coincidencias";
			return json_encode($error,JSON_PRETTY_PRINT);
		}
	}
}
?>