<?php 
class Avicola{
 private $anoplanavicola=0;
 private $supcultavicola=0;
 private $supinfraestuctura=0;
 
 private $registrosanitario=0;
 private $eclosionpesadas=0;
 private $eclosionlivianas=0;
 private $mortalidadparrillero=0;
 private $posturaponedoras=0;
 private $cantpolloventa=0;
 private $canthuevoventa=0;
 private $cantpollobbventa=0;
 
 private $idregis=0;

 function CargarAvicola($cn, $idregis,$anno){
	 	
	 	$this->idregis=$idregis;
		
		$sql_avicola = "SELECT * FROM planproduccionavicola WHERE anoplanavicola=".$anno." and idregistro=".$idregis;
		$avicola = pg_query($cn,$sql_avicola);
		$row_avicola = pg_fetch_array ($avicola);
		if($row_avicola>0){
		
			$this->anoplanavicola=$row_avicola['anoplanavicola'];
			
			$this->supcultavicola=$row_avicola['supcultavicola'];
			$this->supinfraestuctura=$row_avicola['supinfraestuctura'];
			$this->registrosanitario=$row_avicola['registrosanitario'];
			$this->eclosionpesadas=$row_avicola['eclosionpesadas'];
			$this->eclosionlivianas=$row_avicola['eclosionlivianas'];
	
			$this->mortalidadparrillero=$row_avicola['mortalidadparrillero'];
			$this->posturaponedoras=$row_avicola['posturaponedoras'];
			$this->cantpolloventa=$row_avicola['cantpolloventa'];
			$this->canthuevoventa=$row_avicola['canthuevoventa'];
			$this->cantpollobbventa=$row_avicola['cantpollobbventa']; 
		}
  }
 function ActualizarValores($anno, $culavicola, $supinfra,$regsanitario, $eclopesadas, $ecloliviana, $mortalidad, $postura, $canpollo, $canhuevo, $canpollobb){
	 		
	    $this->anoplanavicola=$anno;
		$this->supcultavicola=$culavicola;
		$this->supinfraestuctura=$supinfra;
		$this->registrosanitario=$regsanitario;
		$this->eclosionpesadas=$eclopesadas;
		$this->eclosionlivianas=$ecloliviana;

		$this->mortalidadparrillero=$mortalidad;
		$this->posturaponedoras=$postura;
		$this->cantpolloventa=$canpollo;
		$this->canthuevoventa=$canhuevo;
		$this->cantpollobbventa=$canpollobb; 
		
  }

  function get_anoplanavicola(){
     return $this->anoplanavicola;
  }
  function get_supcultavicola(){
     return $this->supcultavicola;
  }
  function get_supinfraestuctura(){
     return $this->supinfraestuctura;
  }
  function get_registrosanitario(){
     return $this->registrosanitario;
  }
  function get_eclosionpesadas(){
     return $this->eclosionpesadas;
  }
  function get_eclosionlivianas(){
     return $this->eclosionlivianas;
  }
  function get_mortalidadparrillero(){
     return $this->mortalidadparrillero;
  }
  function get_posturaponedoras(){
     return $this->posturaponedoras;
  }
  function get_cantpolloventa(){
     return $this->cantpolloventa;
  }
   function get_canthuevoventa(){
     return $this->canthuevoventa;
  }
  function get_cantpollobbventa(){
     return $this->cantpollobbventa;
  }
   
  /////funciones mejoras
 
   function reinicializarAvicola(){
     $this->anoplanavicola=0;
	 $this->supcultavicola=0;
	 $this->supinfraestuctura=0;
	 
	 $this->registrosanitario=0;
	 $this->eclosionpesadas=0;
	 $this->eclosionlivianas=0;
	 $this->mortalidadparrillero=0;
	 $this->posturaponedoras=0;
	 $this->cantpolloventa=0;
	 $this->canthuevoventa=0;
	 $this->cantpollobbventa=0;
   }
	 
   function Grabar($cn){
		    $insertaux=sprintf("select * from  f_avicola(%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s);",
					 GetSQLValueString($this->idregis, "int"),
					 GetSQLValueString($this->anoplanavicola, "int"),
					 GetSQLValueString($this->supcultavicola, "double"),
					 GetSQLValueString($this->supinfraestuctura, "double"),
					 GetSQLValueString($this->registrosanitario, "int"),
					 GetSQLValueString($this->eclosionpesadas, "int"),
					 GetSQLValueString($this->eclosionlivianas, "int"),
					 GetSQLValueString($this->mortalidadparrillero, "int"),
					 GetSQLValueString($this->posturaponedoras, "int"),
					 GetSQLValueString($this->cantpolloventa, "int"),
					 GetSQLValueString($this->canthuevoventa, "int"),
					 GetSQLValueString($this->cantpollobbventa, "int"));
			//		 echo $insertaux;
			$Result2 = pg_query($cn, $insertaux);
	}
}

?>
