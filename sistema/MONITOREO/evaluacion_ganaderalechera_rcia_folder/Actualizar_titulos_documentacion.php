<?php
	include_once('class_documentacion_analisis.php');
	$DatosTitulosDocumentacion=$_POST['datos_analisis_documentacion'];
	$idmonitor=$_POST['idmonitoreo'];
	$idDocumentos=$_POST['ids_documentos'];
	for ($i=0;$i<count(split('[!]', $idDocumentos))-1; $i++) { 
		$obj_documentacion_analisis=new analisis_documentacion();
		$obj_documentacion_analisis->idmonitoreo=$idmonitor;
		$obj_documentacion_analisis->iddocumentacion=split('[!]', $idDocumentos)[$i];
		$obj_documentacion_analisis->Eliminar($obj_documentacion_analisis);
	}
	$DatosCortados=split('[!]', $DatosTitulosDocumentacion);
	for ($i=0; $i < count($DatosCortados)-1; $i++) { 
		$DatosObtenidos=split('[_]', $DatosCortados[$i]);
		$obj_documentacion_analisis=new analisis_documentacion();
		$obj_documentacion_analisis->idmonitoreo=$DatosObtenidos[0];
		$obj_documentacion_analisis->iddocumentacion=$DatosObtenidos[1];
		$obj_documentacion_analisis->detalle_contenido=trim($DatosObtenidos[2]);
		$obj_documentacion_analisis->monto_cantidad=trim($DatosObtenidos[3]);
		$obj_documentacion_analisis->observaciones=trim($DatosObtenidos[4]);
		$obj_documentacion_analisis->Agregar($obj_documentacion_analisis);
	}
?>
