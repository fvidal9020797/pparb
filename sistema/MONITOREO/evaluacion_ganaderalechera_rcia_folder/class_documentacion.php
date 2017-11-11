<?php
	include_once('../../config/Conexion.php');
	class documentacion{
		public $iddocumentacion;
		public $nombredocumentacion;
		public $tipodocumento;
		public $orden;
		function listar(){
			$Con= Conexion::create();
			$cn=$Con->getConexion();
			$array_documentacion = array();
			$i=0;
			$Sql="select * from monitoreo.documentacion where tipodocumento=101 order by orden asc";
			$Result=pg_query($cn,$Sql);
			while ($Row=pg_fetch_assoc($Result)){
				$_documentacion=new documentacion();
				$_documentacion->iddocumentacion=$Row['iddocumentacion'];
				$_documentacion->nombredocumentacion=$Row['nombredocumentacion'];
				$_documentacion->tipodocumento=$Row['tipodocumento'];
				$array_documentacion[$i]=$_documentacion;
				$i++;
			}
			return $array_documentacion;
		}
	}
?>