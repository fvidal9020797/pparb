<?php 
class nota{
 private $idnota=0;
 private $idunidad=0;
 private $idremitente=0;
 private $idvia=0;
 
 private $iddestinatario=0;
 private $idregistrador=0;
 
 private $nnota="";
 private $fechanota=""; 
 private $fecharegnota="";	
 private $fecharecepcionado="";	
 private $obsnota="";
  
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
 function ActualizarValores($idesta, $idrem, $iddest,$nota, $fechan, $obnota,$id_via, $id_registrador){
	 		
	    $this->idunidad=$idesta;
		$this->idremitente=$idrem;
		$this->iddestinatario=$iddest;
		$this->nnota=$nota;
		$this->fechanota=$fechan;
		$this->obsnota=$obnota;
		$this->idvia=$id_via;
		$this->idregistrador=$id_registrador;
		
		
  }
  
  function get_idunidad(){
     return $this->idunidad;
  }
  function get_idremitente(){
     return $this->idremitente;
  }
  function get_iddestinatario(){
     return $this->iddestinatario;
  }  		
  function get_idvia(){
     return $this->idvia;
  }
  function getnnota(){ 
     return $this->nnota;
  }
  function get_fechanota(){
     return $this->fechanota;
  }
  function get_dianota(){
  	
	 $fecha=explode("-",$this->fechanota);
	 $res=$fecha[2];
	  return $res;
  }
  function get_mesnota(){
     $fecha=explode("-",$this->fechanota);
	 $res=$fecha[1];
     return $res;
  }
  function get_annonota(){
     $fecha=explode("-",$this->fechanota);
     return $fecha[0];
  }
  function get_fecharegnota(){
     return $this->fecharegnota;
  }
  function get_obsnota(){
     return $this->obsnota;
  } 
  function get_idnota(){
     return $this->idnota;
  }
    function get_fecharecepcionado(){
     return $this->fecharecepcionado;
  } 
  
    function get_idregistrador(){
     return $this->idregistrador;
  }
 
  function Grabar($cn){
         $insertaux=sprintf("select * from f_nota(%s, %s, %s, %s, %s, %s, %s, %s, %s, %s);",
					 GetSQLValueString($this->idnota, "int"),
					 GetSQLValueString($this->idunidad, "int"),
					 GetSQLValueString($this->idremitente, "int"),
					 GetSQLValueString($this->iddestinatario, "double"),
					 GetSQLValueString(trim($this->nnota), "text"),
					 GetSQLValueString(trim($this->fechanota), "text"),
					 GetSQLValueString(trim($this->fecharegnota), "text"),
					 GetSQLValueString(trim($this->obsnota), "text"),
 					 GetSQLValueString($this->idvia, "int"),
					 GetSQLValueString($this->idregistrador, "int"));
			
			$Result2 = pg_query($cn, $insertaux);
			//echo $insertaux;
			$row_Result2 = pg_fetch_array ($Result2);
			$this->idnota=$row_Result2['f_nota'];
	}
	
	function  RecepcionarNota($cn,$destinatario){
		 $insertaux=sprintf("select * from  f_recepcionarnota(%s,%s);",
				 GetSQLValueString($this->idnota, "int"),
				 GetSQLValueString($destinatario, "int"));
		//echo $insertaux;
		$Result2 = pg_query($cn, $insertaux);
		$this->fecharecepcionado=date("Y").'-'.date("m").'-'.date("d");
	}
}

?>
