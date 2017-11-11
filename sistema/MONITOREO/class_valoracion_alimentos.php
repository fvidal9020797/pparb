<?php
	include_once('../../config/Conexion.php');
	class valoracion_alimentos{
		public $idtablavaloracion;
		public $idmonitoreo;
		public $idevalespecif;
		public $puntuacion;
		public $tipo;
		function Obtener($valoracion_alimentos){
			$Con= Conexion::create();
			$cn=$Con->getConexion();
			$array_valoracion_alimentos = array();
			$i=0;
			$Sql="select * from monitoreo.valoracionalimentos where idmonitoreo='".$valoracion_alimentos->idmonitoreo."' and tipo=".$valoracion_alimentos->tipo."";
			$Result=pg_query($cn,$Sql);
			while ($Row=pg_fetch_assoc($Result)){
				$valoraciom_alimentos=new valoracion_alimentos();
				$valoraciom_alimentos->idtablavaloracion=$Row['idtablavaloracion'];
				$valoraciom_alimentos->idmonitoreo=$Row['idmonitoreo'];
				$valoraciom_alimentos->idevalespecif=$Row['idevalespecif'];
				$valoraciom_alimentos->puntuacion=$Row['puntuacion'];
				$valoraciom_alimentos->tipo=$Row['tipo'];
				$array_valoracion_alimentos[$i]=$valoraciom_alimentos;
				$i++;
			}
			return $array_valoracion_alimentos;
		}
		function Eliminar($valoracion_alimentos){
			$Con= Conexion::create();
			$cn=$Con->getConexion();
			$Sql="delete from monitoreo.valoracionalimentos where idmonitoreo=".$valoracion_alimentos->idmonitoreo." and tipo=".$valoracion_alimentos->tipo."";
			pg_query($cn,$Sql);
		}
		function Agregar($valoracion_alimentos){
			$Con=Conexion::create();
			$cn=$Con->getConexion();
			$Sql="insert into monitoreo.valoracionalimentos(idmonitoreo, idevalespecif, puntuacion, tipo)values(".$valoracion_alimentos->idmonitoreo.",".$valoracion_alimentos->idevalespecif.",".$valoracion_alimentos->puntuacion.",".$valoracion_alimentos->tipo.")";
			pg_query($cn,$Sql);	
		}
	}
?>