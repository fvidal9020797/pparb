<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of codificadores
 *
 * @author jesus escobar
 */

class GestorDocumentos {
	protected $cn;
    //put your code here
	function __construct() {
		require_once APPPATH.'/config/Conexion.php';
		$this->cn = Conexion::create();
	}

 function guardarDocumento($idregistro, $nombredocumento, $ruta, $fecharegistro, $tipodocumento, $idfuncionario,$estado){
	$sql="INSERT INTO documentos( idregistro, nombredocumento, ruta, fecharegistro, 
            tipodocumento, idfuncionario, estado)
    VALUES (".$idregistro.",'".$nombredocumento."','".$ruta."','".$fecharegistro."',".$tipodocumento.",".$idfuncionario.",".$estado.")";
	return $this->cn->ejecutarSql($sql);
}
function borrarDocumento($idregistro,$nombredocumento, $idfuncionario ){
	$sql="DELETE FROM documentos
 WHERE idregistro=".$idregistro." and nombredocumento='".$nombredocumento."' and idfuncionario=".$idfuncionario.";";
	return $this->cn->ejecutarSql($sql);
}
 	
}
?>
