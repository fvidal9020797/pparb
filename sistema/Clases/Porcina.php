<?php 
class Porcina{
  
  
 private $anoplanporcina=0;
 private $supculporcina=0;
 private $supinfraestructurap=0;
 
 private $corralapareamiento=0;
 private $corralgestacion=0;
 private $corralmaternidad=0;
 private $corraldestete=0;
 private $corralcrecimiento=0;
 private $registrosanitariop=0;
 private $vientresp=0;
 private $capacidadp=0;
 
  private $lechonesvientre=0;
  private $cerdosventavientre=0;
  private $pesopromedioventa=0;
  private $prodcarnep=0;
 
 private $idregis=0;

 function CargarPorcina($cn, $idregis,$anno){
	 	
	 	$this->idregis=$idregis;
		
		$sql_porcina = "SELECT * FROM planproduccionporcina WHERE anoplanporcina=".$anno." and idregistro=".$idregis;
		$porcina = pg_query($cn,$sql_porcina);
		$row_porcina = pg_fetch_array ($porcina);
		if($row_porcina>0){
		
			$this->anoplanporcina=$row_porcina['anoplanporcina'];
			
			$this->supculporcina=$row_porcina['supculporcina'];
			$this->supinfraestructurap=$row_porcina['supinfraestructurap'];
			$this->corralapareamiento=$row_porcina['corralapareamiento'];
			$this->corralgestacion=$row_porcina['corralgestacion'];
			$this->corralmaternidad=$row_porcina['corralmaternidad'];
	
			$this->corraldestete=$row_porcina['corraldestete'];
			$this->corralcrecimiento=$row_porcina['corralcrecimiento'];
			$this->registrosanitariop=$row_porcina['registrosanitariop']; 
			$this->vientresp=$row_porcina['vientresp'];
			$this->capacidadp=$row_porcina['capacidadp']; 
			
			$this->lechonesvientre=$row_porcina['lechonesvientre'];
		  	$this->cerdosventavientre=$row_porcina['cerdosventavientre'];
		  	$this->pesopromedioventa=$row_porcina['pesopromedioventa'];
		  	$this->prodcarnep=$row_porcina['prodcarnep'];
		}
  }
 function ActualizarValores($anno, $culporcina, $supinfra,$corralapa, $corralgest, $corralmat, $corraldes, $corralcre, $RegisSanitario, $vientre, $capacidad, $lechones, $cerdosvent, $pesoprom, $prodcarne){
	 		
	    $this->anoplanporcina=$anno;
		$this->supculporcina=$culporcina;
		$this->supinfraestructurap=$supinfra;
		$this->corralapareamiento=$corralapa;
		$this->corralgestacion=$corralgest;
		$this->corralmaternidad=$corralmat;

		$this->corraldestete=$corraldes;
		$this->corralcrecimiento=$corralcre;
		$this->corralapareamiento=$corralapa; 
		$this->registrosanitariop=$RegisSanitario;
		$this->vientresp=$vientre;
		$this->capacidadp=$capacidad; 
		
		$this->lechonesvientre=$lechones;
		$this->cerdosventavientre=$cerdosvent;
		$this->pesopromedioventa=$pesoprom;
		$this->prodcarnep=$prodcarne;
		
  }

  function get_anoplanporcina(){
     return $this->anoplanporcina;
  }
  function get_supculporcina(){
     return $this->supculporcina;
  }
  function get_supinfraestructurap(){
     return $this->supinfraestructurap;
  }
  function get_corralapareamiento(){
     return $this->corralapareamiento;
  }
  function get_corralgestacion(){
     return $this->corralgestacion;
  }
  function get_corralmaternidad(){
     return $this->corralmaternidad;
  }
  function get_corraldestete(){
     return $this->corraldestete;
  }
  function get_corralcrecimiento(){
     return $this->corralcrecimiento;
  }
  function get_registrosanitariop(){
     return $this->registrosanitariop;
  }

  function get_vientresp(){
     return $this->vientresp;
  }
  function get_capacidadp(){
     return $this->capacidadp;
  }
  function get_lechonesvientre(){
     return $this->lechonesvientre;
  }
  function get_cerdosventavientre(){
     return $this->cerdosventavientre;
  }
  function get_pesopromedioventa(){
     return $this->pesopromedioventa;
  }
  function get_prodcarnep(){
     return $this->prodcarnep;
  }	
		
  /////funciones mejoras
 
   function reinicializarAvicola(){
     $this->anoplanporcina=0;
	 $this->supculporcina=0;
	 $this->supinfraestructurap=0;
	 
	 $this->corralapareamiento=0;
	 $this->corralgestacion=0;
	 $this->corralmaternidad=0;
	 $this->corraldestete=0;
	 $this->corralcrecimiento=0;
	 $this->corralapareamiento=0;
	 $this->vientresp=0;
	 $this->capacidadp=0;
	 
	$this->lechonesvientre=0;
	$this->cerdosventavientre=0;
	$this->pesopromedioventa=0;
	$this->prodcarnep=0;
   }
	 
   function Grabar($cn){
		    $insertaux=sprintf("select * from  f_porcina(%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s);",
					 GetSQLValueString($this->idregis, "int"),
					 GetSQLValueString($this->anoplanporcina, "int"),
					 GetSQLValueString($this->supculporcina, "double"),
					 GetSQLValueString($this->supinfraestructurap, "double"),
					 GetSQLValueString($this->corralapareamiento, "int"),
					 GetSQLValueString($this->corralgestacion, "int"),
					 GetSQLValueString($this->corralmaternidad, "int"),
					 GetSQLValueString($this->corraldestete, "int"),
					 GetSQLValueString($this->corralcrecimiento, "int"),
					 GetSQLValueString($this->registrosanitariop, "int"),
					 GetSQLValueString($this->vientresp, "int"),
					 GetSQLValueString($this->capacidadp, "int"),
					 GetSQLValueString($this->lechonesvientre, "int"),
					 GetSQLValueString($this->cerdosventavientre, "int"),
					 GetSQLValueString($this->pesopromedioventa, "double"),
					 GetSQLValueString($this->prodcarnep, "double"));
			//		 echo $insertaux;
			$Result2 = pg_query($cn, $insertaux);
	}
}

?>
