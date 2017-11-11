<?php
class SuperficieRegistro{
 private $suptotal=0;
 private $suptpfp=0;
 private $suptum=0;
 private $supreftpfp=0;
 private $supreftum=0;
 private $supselstpfpref=0;
 private $supselstpfpfcon=0;
 private $supselstumref=0;
 private $supselstumcon=0;
 private $supmejoratpfp=0;
 private $supmejoratum=0;

 private $supalitpfp=0;
 private $supalitum=0;



 function SuperficieRegistro337($cn, $idreg){

		$sql_superficie = "SELECT * FROM v_ley_337 WHERE idregistro=".$idreg;
		$superficie = pg_query($cn,$sql_superficie);
		$row_superficie = pg_fetch_array ($superficie);

	  $this->suptotal=$row_superficie['supdefilegal'];

		$this->suptpfp=$row_superficie['suptpfp'];
		$this->supreftpfp=$row_superficie['supreftpfp'];
		$this->supselstpfpref=$row_superficie['supselstpfpref'];
		$this->supselstpfpfcon=$row_superficie['supselstpfpfcon'];
		$this->supmejoratpfp=$row_superficie['supmejoratpfp'];

		$this->suptum=$row_superficie['suptum'];
		$this->supreftum=$row_superficie['supreftum'];
		$this->supselstumref=$row_superficie['supselstumref'];
		$this->supselstumcon=$row_superficie['supselstumcon'];
		$this->supmejoratum=$row_superficie['supmejoratum'];


		$sql_superficie = "SELECT * FROM v_ley_alimentos WHERE idregistro=".$idreg;
		$superficie = pg_query($cn,$sql_superficie);
		$row_superficie = pg_fetch_array ($superficie);

		$this->supalitpfp=$row_superficie['supalitpfp'];
		$this->supalitum=$row_superficie['supalitum'];

  }

  function SuperficieRegistro502($cn, $idreg){
	  $sql_superficie = "SELECT * FROM v_ley_502 WHERE idregistro=".$idreg;
		$superficie = pg_query($cn,$sql_superficie);
		$row_superficie = pg_fetch_array ($superficie);
	  $this->suptotal=$row_superficie['suppas'];

		$this->suptpfp=$row_superficie['suptpfppas'];
		$this->supreftpfp=$row_superficie['supreftpfppas'];
		$this->supselstpfpref=$row_superficie['supselstpfprefpas'];
		$this->supselstpfpfcon=$row_superficie['supselstpfpfconpas'];
		$this->supmejoratpfp=$row_superficie['supmejoratpfppas'];

		$this->suptum=$row_superficie['suptumpas'];
		$this->supreftum=$row_superficie['supreftumpas'];
		$this->supselstumref=$row_superficie['supselstumrefpas'];
		$this->supselstumcon=$row_superficie['supselstumconpas'];
		$this->supmejoratum=$row_superficie['supmejoratumpas'];

		$sql_superficie = "SELECT * FROM v_ley_alimentos WHERE idregistro=".$idreg;
		$superficie = pg_query($cn,$sql_superficie);
		$row_superficie = pg_fetch_array ($superficie);

		$this->supalitpfp=$row_superficie['supalitpfppas'];
		$this->supalitum=$row_superficie['supalitumpas'];
	 }

 function calcularvalores($sup_tpfp, $sup_tum, $sup_reftpfp, $sup_reftum){

  $this->suptotal=round(($sup_tpfp+$sup_tum)*10000)/10000;
	$this->suptpfp=round($sup_tpfp*10000)/10000;
	$this->suptum=round($sup_tum*10000)/10000;
	$this->supreftpfp=round($sup_reftpfp*10000)/10000;
	$this->supreftum=round($sup_reftum*10000)/10000;

	$this->calcularSupAlimento();

 }
 function calcularSupAlimento(){
   $this->supalitpfp=round(($this->suptpfp - $this->supreftpfp - $this->supmejoratpfp - $this->supselstpfpref)*10000)/10000;
   $this->supalitum=round(($this->suptum - $this->supreftum - $this->supmejoratum - $this->supselstumref)*10000)/10000;

 }

  function get_suptotal(){
     return $this->suptotal;
  }
  function get_suptpfp(){
     return $this->suptpfp;
  }
  function get_suptum(){
     return $this->suptum;
  }
  function get_supreftpfp(){
     return $this->supreftpfp;
  }
  function get_supreftum(){
     return $this->supreftum;
  }
  function get_supselstpfpref(){
     return $this->supselstpfpref;
  }
  function get_supselstpfpfcon(){
     return $this->supselstpfpfcon;
  }
  function get_supselstumref(){
     return $this->supselstumref;
  }
   function get_supselstumcon(){
     return $this->supselstumcon;
  }
  function get_supmejoratpfp(){
     return $this->supmejoratpfp;
  }
  function get_supmejoratum(){
     return $this->supmejoratum;
  }

  //// alimentos////
  function get_supproali(){
     return $this-> supalitpfp + $this->supalitum;
  }
  function get_supalitpfp(){
     return $this->supalitpfp;
  }
   function get_supalitum(){
     return $this->supalitum;
  }


  /////funciones mejoras

   function reinicializarMejora(){
     $this->supmejoratpfp=0;
	 $this->supmejoratum=0;
   }

   function sumarMejoras($sup_tpfp, $sup_tum) {
       if($sup_tpfp==""){$sup_tpfp=0;}
	   if($sup_tum==""){$sup_tum=0;}
	   $this->supmejoratpfp=round(($this->supmejoratpfp+$sup_tpfp)*10000,4)/10000;
	   $this->supmejoratum=round(($this->supmejoratum+$sup_tum)*10000,4)/10000;
	   //$this->calcularSupAlimento();
   }

  /// funciones Sels

  function reinicializarSelsR(){
     $this->supselstpfpref=0;
	 $this->supselstumref=0;
   }

   function sumarselsR($sup_tpfp, $sup_tum) {
       if($sup_tpfp==""){$sup_tpfp=0;}
	   if($sup_tum==""){$sup_tum=0;}
	   $this->supselstpfpref=round(($this->supselstpfpref+$sup_tpfp)*10000,4)/10000;
	   $this->supselstumref=round(($this->supselstumref+$sup_tum)*10000,4)/10000;
	   //$this->calcularSupAlimento();
   }

   function reinicializarSelsC(){
     $this->supselstpfpfcon=0;
	 $this->supselstumcon=0;
   }

   function sumarselsC($sup_tpfp, $sup_tum) {
       if($sup_tpfp==""){$sup_tpfp=0;}
	   if($sup_tum==""){$sup_tum=0;}
	   $this->supselstpfpfcon=round(($this->supselstpfpfcon+$sup_tpfp)*10000,4)/10000;
	   $this->supselstumcon=round(($this->supselstumcon+$sup_tum)*10000,4)/10000;
   }

   function get_supreforestar(){
        $a=round(($this->supreftpfp + $this->supreftum + $this->supreftpfp + $this->supselstpfpref + $this->supselstumref)*10000,4)/10000;
	   return $a;
   }

   function Validar(){
        $mensaje="";
		 if ($this->supalitpfp<0)
			{   $mensaje="Verifique: La Superficie de Produccion de Alimentos en TPFP no puede ser negativa"; }
		 elseif ($this->supalitum<0)
			{   $mensaje="Verifique: La Superficie de Produccion de Alimentos en TUM no puede ser negativa"; }
		 return  $mensaje;
	}

	function Grabar($cn,$ley,$idreg, $supali, $supfuer){

		 if($ley==337)

     {

		    $insertaux=sprintf("select * from f_SupGeneral (%s, %s, %s);",
													 GetSQLValueString(197, "int"),
													 GetSQLValueString($idreg, "int"),
													 GetSQLValueString($this->suptotal, "double"));

			 $Result2 = pg_query($cn, $insertaux);

			 $insertaux=sprintf("select * from f_SupGeneral (%s, %s, %s);",
													 GetSQLValueString(198, "int"),
													 GetSQLValueString($idreg, "int"),
													 GetSQLValueString($this->suptpfp, "double"));
		     $Result2 = pg_query($cn, $insertaux);
			 $insertaux=sprintf("select * from f_SupGeneral (%s, %s, %s);",
													 GetSQLValueString(199, "int"),
													 GetSQLValueString($idreg, "int"),
													 GetSQLValueString($this->suptum, "double"));
		     $Result2 = pg_query($cn, $insertaux);
			 $insertaux=sprintf("select * from f_SupGeneral (%s, %s, %s);",
													 GetSQLValueString(200, "int"),
													 GetSQLValueString($idreg, "int"),
													 GetSQLValueString($this->supreftpfp, "double"));
		     $Result2 = pg_query($cn, $insertaux);
			 $insertaux=sprintf("select * from f_SupGeneral (%s, %s, %s);",
													 GetSQLValueString(201, "int"),
													 GetSQLValueString($idreg, "int"),
													 GetSQLValueString($this->supreftum, "double"));
		     $Result2 = pg_query($cn, $insertaux);
			 $insertaux=sprintf("select * from f_SupGeneral (%s, %s, %s);",
													 GetSQLValueString(202, "int"),
													 GetSQLValueString($idreg, "int"),
													 GetSQLValueString($this->supselstpfpref, "double"));
		     $Result2 = pg_query($cn, $insertaux);
			 $insertaux=sprintf("select * from f_SupGeneral (%s, %s, %s);",
													 GetSQLValueString(203, "int"),
													 GetSQLValueString($idreg, "int"),
													 GetSQLValueString($this->supselstpfpfcon, "double"));
		     $Result2 = pg_query($cn, $insertaux);
			 $insertaux=sprintf("select * from f_SupGeneral (%s, %s, %s);",
													 GetSQLValueString(204, "int"),
													 GetSQLValueString($idreg, "int"),
													 GetSQLValueString($this->supselstumref, "double"));
		     $Result2 = pg_query($cn, $insertaux);
			 $insertaux=sprintf("select * from f_SupGeneral (%s, %s, %s);",
													 GetSQLValueString(205, "int"),
													 GetSQLValueString($idreg, "int"),
													 GetSQLValueString($this->supselstumcon, "double"));
		     $Result2 = pg_query($cn, $insertaux);
			 $insertaux=sprintf("select * from f_SupGeneral (%s, %s, %s);",
													 GetSQLValueString(206, "int"),
													 GetSQLValueString($idreg, "int"),
													 GetSQLValueString($this->supmejoratpfp, "double"));
		     $Result2 = pg_query($cn, $insertaux);
			 $insertaux=sprintf("select * from f_SupGeneral (%s, %s, %s);",
													 GetSQLValueString(207, "int"),
													 GetSQLValueString($idreg, "int"),
													 GetSQLValueString($this->supmejoratum, "double"));
		     $Result2 = pg_query($cn, $insertaux);
			 $insertaux=sprintf("select * from f_SupGeneral (%s, %s, %s);",
													 GetSQLValueString(220, "int"),
													 GetSQLValueString($idreg, "int"),
													 GetSQLValueString($this->supalitpfp, "double"));
		     $Result2 = pg_query($cn, $insertaux);
			 $insertaux=sprintf("select * from f_SupGeneral (%s, %s, %s);",
													 GetSQLValueString(221, "int"),
													 GetSQLValueString($idreg, "int"),
													 GetSQLValueString($this->supalitum, "double"));
		     $Result2 = pg_query($cn, $insertaux);
		 }

     else{
		 	$insertaux=sprintf("select * from f_SupGeneral (%s, %s, %s);",
													 GetSQLValueString(208, "int"),
													 GetSQLValueString($idreg, "int"),
													 GetSQLValueString($this->suptotal, "double"));
		     $Result2 = pg_query($cn, $insertaux);
			 $insertaux=sprintf("select * from f_SupGeneral (%s, %s, %s);",
													 GetSQLValueString(209, "int"),
													 GetSQLValueString($idreg, "int"),
													 GetSQLValueString($this->suptpfp, "double"));
		     $Result2 = pg_query($cn, $insertaux);
			 $insertaux=sprintf("select * from f_SupGeneral (%s, %s, %s);",
													 GetSQLValueString(210, "int"),
													 GetSQLValueString($idreg, "int"),
													 GetSQLValueString($this->suptum, "double"));
		     $Result2 = pg_query($cn, $insertaux);
			 $insertaux=sprintf("select * from f_SupGeneral (%s, %s, %s);",
													 GetSQLValueString(211, "int"),
													 GetSQLValueString($idreg, "int"),
													 GetSQLValueString($this->supreftpfp, "double"));
		     $Result2 = pg_query($cn, $insertaux);
			 $insertaux=sprintf("select * from f_SupGeneral (%s, %s, %s);",
													 GetSQLValueString(212, "int"),
													 GetSQLValueString($idreg, "int"),
													 GetSQLValueString($this->supreftum, "double"));
		     $Result2 = pg_query($cn, $insertaux);
			 $insertaux=sprintf("select * from f_SupGeneral (%s, %s, %s);",
													 GetSQLValueString(213, "int"),
													 GetSQLValueString($idreg, "int"),
													 GetSQLValueString($this->supselstpfpref, "double"));
		     $Result2 = pg_query($cn, $insertaux);
			 $insertaux=sprintf("select * from f_SupGeneral (%s, %s, %s);",
													 GetSQLValueString(214, "int"),
													 GetSQLValueString($idreg, "int"),
													 GetSQLValueString($this->supselstpfpfcon, "double"));
		     $Result2 = pg_query($cn, $insertaux);
			 $insertaux=sprintf("select * from f_SupGeneral (%s, %s, %s);",
													 GetSQLValueString(215, "int"),
													 GetSQLValueString($idreg, "int"),
													 GetSQLValueString($this->supselstumref, "double"));
		     $Result2 = pg_query($cn, $insertaux);
			 $insertaux=sprintf("select * from f_SupGeneral (%s, %s, %s);",
													 GetSQLValueString(216, "int"),
													 GetSQLValueString($idreg, "int"),
													 GetSQLValueString($this->supselstumcon, "double"));
		     $Result2 = pg_query($cn, $insertaux);
			 $insertaux=sprintf("select * from f_SupGeneral (%s, %s, %s);",
													 GetSQLValueString(217, "int"),
													 GetSQLValueString($idreg, "int"),
													 GetSQLValueString($this->supmejoratpfp, "double"));
		     $Result2 = pg_query($cn, $insertaux);
			 $insertaux=sprintf("select * from f_SupGeneral (%s, %s, %s);",
													 GetSQLValueString(218, "int"),
													 GetSQLValueString($idreg, "int"),
													 GetSQLValueString($this->supmejoratum, "double"));
		     $Result2 = pg_query($cn, $insertaux);
			 $insertaux=sprintf("select * from f_SupGeneral (%s, %s, %s);",
													 GetSQLValueString(222, "int"),
													 GetSQLValueString($idreg, "int"),
													 GetSQLValueString($this->supalitpfp, "double"));
		     $Result2 = pg_query($cn, $insertaux);
			 $insertaux=sprintf("select * from f_SupGeneral (%s, %s, %s);",
													 GetSQLValueString(223, "int"),
													 GetSQLValueString($idreg, "int"),
													 GetSQLValueString($this->supalitum, "double"));
		     $Result2 = pg_query($cn, $insertaux);

		 }

      $insertaux=sprintf("select * from f_SupGeneral (%s, %s, %s);",
                         GetSQLValueString(343, "int"),
                         GetSQLValueString($idreg, "int"),
                         GetSQLValueString($supfuer, "double"));
       $Result2 = pg_query($cn, $insertaux);


		$insertaux=sprintf("select * from f_SupGeneral (%s, %s, %s);",
													 GetSQLValueString(219, "int"),
													 GetSQLValueString($idreg, "int"),
													 GetSQLValueString($supali, "double"));

		$Result2 = pg_query($cn, $insertaux);


	}
}

?>
