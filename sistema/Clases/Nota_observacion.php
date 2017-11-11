<?php 
/*
class nota_observacion {
	
	protected $cn;
    //put your code here
	function __construct() {
		require_once '../config/Conexion.php';
		$this->cn = Conexion::create();
	}

 function GuardarNotaObservacion($idregistro, $solicitante, $tiposolicitud, $fecharegistro, $detalleobs, $cn){
	$sql= sprintf("select f_observacion_nota(".$idregistro."','".$solicitante."','".$tiposolicitud."',".$fecharegistro.",".$detalleobs.")");
	//return $this->cn->ejecutarSql($sql);
	return  pg_query($cn, $sql);
}

}*/



class nota_observacion{
 private $idobservacion=0;
 private $idregistro=0;
 private $solicitante="";
 private $idtiposolicitud=0; 
 private $fechanotaobs=""; 
 private $fechanotaobssis="";	
 private $detallenotaobservacion="";
 private $estado="";
  
  
  function get_idobservacion(){
     return $this->idobservacion;
  }
  function get_idregistro(){
     return $this->idregistro;
  }
  function get_solicitante(){
     return $this->solicitante;
  }  		
  function get_idtiposolicitud(){
     return $this->idtiposolicitud;
  }
  function get_fechanotaobs(){ 
     return $this->fechanotaobs;
  }
  function get_fechanotaobssis(){
     return $this->fechanotaobssis;
  }


  function get_detallenotaobservacion(){
     return $this->detallenotaobservacion;
  } 
  
  function get_estado(){
     return $this->estado;
  } 

  

   function Cargarnota($cn, $idseg){
	 	
	 	$this->idnota=$idseg;
		
		$sql_nota = "SELECT * FROM nota WHERE idnota=".$idseg;
		$nota = pg_query($cn,$sql_nota);
		$row_nota = pg_fetch_array ($nota);
		
		if($row_nota>0){
			
			$this->idunidad=$row_nota['idunidad'];
			$this->idremitente=$row_nota['idremitente'];
			$this->iddestinatario=$row_nota['iddestinatario'];
			$this->idvia=$row_nota['idvia'];
			$this->nnota=$row_nota['nnota'];
			$this->fechanota=$row_nota['fechanota'];
			$this->fecharegnota=$row_nota['fecharegnota'];
			$this->fecharecepcionado=$row_nota['fecharecepcionado'];
			$this->obsnota=$row_nota['obsnota'];
			
		}else{
		     $this->fechanota=date("Y").'-'.date("m").'-'.date("d");
		     $this->fecharegnota=date("Y").'-'.date("m").'-'.date("d");
		}
			
  }
  
  
  
   function ActualizarValoresNotaObservacion($idnotaobs,$idreg, $solicit, $idtiposol,$fechanotaob, $obsnota, $estad){
	 	$this->idobservacion = $idnotaobs;
	    $this->idregistro=$idreg;
		$this->solicitante=$solicit;
		$this->idtiposolicitud=$idtiposol;
		$this->fechanotaobs=$fechanotaob;
		$this->detallenotaobservacion=$obsnota;
		$this->estado= $estad;
		
  }
  
  
 
  function GuardarNotaObservacion($cn){
         $insertaux=sprintf("select * from f_observacion_nota(%s, %s, %s, %s, %s, %s, %s);",
					 GetSQLValueString($this->idobservacion, "int"),
					 GetSQLValueString($this->idregistro, "int"),
					 GetSQLValueString(trim($this->solicitante), "text"),
					 GetSQLValueString($this->idtiposolicitud, "int"),
					 GetSQLValueString(trim($this->fechanotaobs), "text"),
					 GetSQLValueString(trim($this->detallenotaobservacion), "text"),
					 GetSQLValueString(trim($this->estado), "int"));
			
			$Result2 = pg_query($cn, $insertaux);
			$row_Result2 = pg_fetch_array ($Result2);
			$this->idnota=$row_Result2['f_observacion_nota'];
	}
	
	
	
} 

?>
