<?php
	include_once('../../config/Conexion.php');
	class analisis_documentacion{
		public $id_analisis_documentacion;
		public $idmonitoreo;
		public $iddocumentacion;
		public $detalle_contenido;
		public $monto_cantidad;
		public $observaciones;
		function Obtener($documentacion,$idMonitoreo){
			$Con= Conexion::create();
			$cn=$Con->getConexion();
			$array_analisis_documentacion = array();
			$i=0;
			$Sql="select * from monitoreo.analisisdocumentacion where iddocumentacion=".$documentacion->iddocumentacion." and idmonitoreo=".$idMonitoreo;
			$Result=pg_query($cn,$Sql);
			while ($Row=pg_fetch_assoc($Result)){
				$analisis_documentacion=new analisis_documentacion();
				$analisis_documentacion->id_analisis_documentacion=$Row['idanalisisdocumentacion'];
				$analisis_documentacion->idmonitoreo=$Row['idmonitoreo'];
				$analisis_documentacion->iddocumentacion=$Row['iddocumentacion'];
				$analisis_documentacion->detalle_contenido=$Row['detallecotenido'];
				$analisis_documentacion->monto_cantidad=$Row['montocantidad'];
				$analisis_documentacion->observaciones=$Row['observaciones'];
				$array_analisis_documentacion[$i]=$analisis_documentacion;
				$i++;
			}
			return $array_analisis_documentacion;
		}
		function Eliminar($documentacion){
			$Con= Conexion::create();
			$cn=$Con->getConexion();
			$Sql="delete from monitoreo.analisisdocumentacion where iddocumentacion=".$documentacion->iddocumentacion." and idmonitoreo=".$documentacion->idmonitoreo;
			pg_query($cn,$Sql);
		}
		function Agregar($documentacion){
			$Con= Conexion::create();
			$cn=$Con->getConexion();
			$Sql="insert into monitoreo.analisisdocumentacion (idmonitoreo, iddocumentacion, detallecotenido, montocantidad, observaciones) values(".$documentacion->idmonitoreo.",".$documentacion->iddocumentacion.",'".$documentacion->detalle_contenido."','".$documentacion->monto_cantidad."','".$documentacion->observaciones."')";
			pg_query($cn,$Sql);	
		}
	}
?>