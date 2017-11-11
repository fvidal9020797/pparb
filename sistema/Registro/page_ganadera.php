<?php
///sistemas de produccion
$sql3="Select * From \"codificadores\" Where \"idclasificador\"=13 Order by \"nombrecodificador\"";
$rs3=pg_query($cn,$sql3);
$total= pg_num_rows($rs3);

///////////mostrar la superficie total predio/////////////
    if(!isset($_SESSION['datos_bosque']['Superficie'])){
	    $sql_predio = "SELECT superficie FROM  v_parcela
					   WHERE  v_parcela.idregistro=".$_SESSION['idreg'];
		$predio = pg_query($cn,$sql_predio);
		$row_predio = pg_fetch_array ($predio);

	}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1"))
{
	   $datos_ganadero=$_POST;
	   $_SESSION['datos_ganadero']=$datos_ganadero;

	   ///validando datos
	    if($_SESSION['datos_ganadero']['SupActAgri']=="")	{$_SESSION['datos_ganadero']['SupActAgri']=0;}
		if($_SESSION['datos_ganadero']['SupActbar']=="")	{$_SESSION['datos_ganadero']['SupActbar']=0;}
		if($_SESSION['datos_ganadero']['SupActDes']=="")	{$_SESSION['datos_ganadero']['SupActDes']=0;}
		if($_SESSION['datos_ganadero']['SupActGan']=="")	{$_SESSION['datos_ganadero']['SupActGan']=0;}
		if($_SESSION['datos_ganadero']['SupGanLegal']=="")	{$_SESSION['datos_ganadero']['SupGanLegal']=0;}
		$prodalidesf=0;
        $_SESSION['datos_ganadero']['CantGanDef']=round($_SESSION['datos_ganadero']['SupActGan']/2.5);
		$_SESSION['datos_ganadero']['CantGanleg']=round($_SESSION['datos_ganadero']['SupGanLegal']/5);
		$prodalidesf=floatval($_SESSION['datos_ganadero']['SupActAgri']+$_SESSION['datos_ganadero']['SupActbar']+$_SESSION['datos_ganadero']['SupActDes']+$_SESSION['datos_ganadero']['SupActGan']);

		$supcomparar=0;
   ////////////////////////mensajes de error//////////////////////////////
	   if(round($_SESSION['datos_ganadero']['SupProdAli'],4)> $_SESSION['datos_ganadero']['supdefilegal']){
	   $supcomparar=round($_SESSION['datos_ganadero']['SupProdAli'],4);
	   }else{
			$supcomparar=round($_SESSION['datos_ganadero']['supdefilegal'],4);
	   }

		if( round(floatval($prodalidesf),4)>round($supcomparar,4)){
	      trigger_error (" La Sumatoria de Sup. de Uso ACTUAL en Area Deforestada ilegal no debe ser mayor a la Sup. Deforestada Ilegal ", E_USER_ERROR);
         }elseif($_POST['submit']=='Guardar'){
			//guardar superficies Predio fuera de Area deforestada Ilegal  $_SESSION['datos_ganadero']['']
			 $insertaux=sprintf("select * from f_alimentos(%s, %s, %s, %s, %s, %s);",
			 						GetSQLValueString($_SESSION['idreg'], "int"),
									GetSQLValueString($_SESSION['datos_ganadero']['SupActAgri'], "double"),
									GetSQLValueString($_SESSION['datos_ganadero']['SupActGan'], "double"),
									GetSQLValueString($_SESSION['datos_ganadero']['SupActbar'], "double"),
									GetSQLValueString($_SESSION['datos_ganadero']['SupActDes'], "double"),
									GetSQLValueString($_SESSION['datos_ganadero']['SupGanLegal'], "double"));
			 $Result2 = pg_query($cn, $insertaux);
				//echo $insertaux;
			//guardar compromisos
			 // $anhos=5;
			 // if ($_SESSION['datos_ganadero']['periodo']==2) {	$anhos=7;}
			  $anho=0;
			for ($i = 0; $i <=5 ; $i++) {
				if ($_SESSION['datos_ganadero']['periodo']==2) {
					if ($anho==1) {$anho=3;}
				}
				 $insertaux=sprintf("select * from  f_ganadera(%s, %s, %s, %s,%s, %s, %s, %s,%s, %s, %s, %s,%s, %s, %s, %s,%s);",
									 GetSQLValueString($_SESSION['idreg'], "int"),
									 GetSQLValueString($_SESSION['datos_ganadero']['suppastosembrado'.$i], "double"),
									 GetSQLValueString( isset($_SESSION['datos_ganadero']['suppastonatural'.$i]) ? htmlspecialchars($_SESSION['datos_ganadero']['suppastonatural'.$i]) : 0 , "double"),
									 GetSQLValueString($_SESSION['datos_ganadero']['potrero'.$i], "int"),
									 GetSQLValueString($_SESSION['datos_ganadero']['pozas'.$i], "int"),
									 GetSQLValueString($_SESSION['datos_ganadero']['saleros'.$i], "int"),
									 GetSQLValueString($_SESSION['datos_ganadero']['bebederos'.$i], "int"),
									 GetSQLValueString($_SESSION['datos_ganadero']['brete'.$i], "int"),
									 GetSQLValueString($_SESSION['datos_ganadero']['corral'.$i], "int"),
									 GetSQLValueString($_SESSION['datos_ganadero']['forraje'.$i], "int"),
									 GetSQLValueString(isset($_SESSION['datos_ganadero']['compraganado'.$i]) ? htmlspecialchars($_SESSION['datos_ganadero']['compraganado'.$i]) : 0, "int"),
									 GetSQLValueString($_SESSION['datos_ganadero']['cantganado'.$i], "int"),
									 GetSQLValueString($_SESSION['datos_ganadero']['cantternero'.$i], "int"),
									 GetSQLValueString(isset($_SESSION['datos_ganadero']['cantganadofaineo'.$i]) ? htmlspecialchars($_SESSION['datos_ganadero']['cantganadofaineo'.$i]) : 0, "int"),
									 GetSQLValueString(isset($_SESSION['datos_ganadero']['cantganadopie'.$i]) ? htmlspecialchars($_SESSION['datos_ganadero']['cantganadopie'.$i]) : 0, "int"),
									 GetSQLValueString($_SESSION['datos_ganadero']['cantprodcarne'.$i], "double"),
									 $anho);
				 $Result2 = pg_query($cn, $insertaux);
				//echo $insertaux ;
				 $anho++;
			}//for
			////sistema de Produccion Ganadera
			$i=1;
			$Result1 = pg_query($cn,"delete from sistprodganadera where idsistproductivo in (Select idcodificadores From codificadores Where idclasificador=13) and idregistro=".$_SESSION['idreg']);
			$sql3="Select * From codificadores Where idclasificador=13 Order by nombrecodificador";
			$rs3=pg_query($cn,$sql3);
			$row_rs3= pg_fetch_array ($rs3);
			$total1= pg_num_rows($rs3);


			 while($i<=$total1)
			 { $aux=$row_rs3['idcodificadores'];
			   if(isset($_SESSION['datos_ganadero']['chk'.$aux]))
				{  $insertUSR = sprintf("select * from ModSistProdGanadera (%s, %s, %s);",
										   GetSQLValueString($_SESSION['idreg'], "int"),
										   GetSQLValueString($aux, "int"),
										   GetSQLValueString($_SESSION['datos_ganadero']['TxtSist'.$aux], "int"));
				 echo $insertUSR;
				$Result1 = pg_query($cn, $insertUSR);
				}
				$i=$i+1;
				$row_rs3 = pg_fetch_assoc($rs3);
			 }

			 $a="update registro set obsregistro='".$_SESSION['datos_ganadero']['RObservacion']."' where idregistro=".$_SESSION['idreg'];
//      		echo $a;
			$Result2 = pg_query($cn, $a);

		    	 ////si no hay error guardar
		  if (!(isset($_SESSION['ErrorThrown']) && $_SESSION['ErrorThrown'] != ""))
			{  echo '<script>parent.document.location.href="Formulario001.php?aux=4&datosguardados=ok";</script>';
		    }
	   }//if post
}else{
 if(!isset($_SESSION['datos_ganadero'])){

	$sql_ppg0 = "select *  FROM planproduccionganadera where anoprodganadera=0 and idregistro=".$_SESSION['idreg'];
	$ppg0 = pg_query($cn,$sql_ppg0);
	$row_ppg0 = pg_fetch_array ($ppg0);
	if ($periodo==1) {
		# code...

	$sql_ppg1 = "select *  FROM planproduccionganadera where anoprodganadera=1 and idregistro=".$_SESSION['idreg'];
	$ppg1 = pg_query($cn,$sql_ppg1);
	$row_ppg1 = pg_fetch_array ($ppg1);

	$sql_ppg2 = "select *  FROM planproduccionganadera where anoprodganadera=2 and idregistro=".$_SESSION['idreg'];
	$ppg2 = pg_query($cn,$sql_ppg2);
	$row_ppg2 = pg_fetch_array ($ppg2);

	$sql_ppg3 = "select *  FROM planproduccionganadera where anoprodganadera=3 and idregistro=".$_SESSION['idreg'];
	$ppg3 = pg_query($cn,$sql_ppg3);
	$row_ppg3 = pg_fetch_array ($ppg3);

	$sql_ppg4 = "select *  FROM planproduccionganadera where anoprodganadera=4 and idregistro=".$_SESSION['idreg'];
	$ppg4 = pg_query($cn,$sql_ppg4);
	$row_ppg4 = pg_fetch_array ($ppg4);

	$sql_ppg5 = "select *  FROM planproduccionganadera where anoprodganadera=5 and idregistro=".$_SESSION['idreg'];
	$ppg5 = pg_query($cn,$sql_ppg5);
	$row_ppg5 = pg_fetch_array ($ppg5);
}
	if ($periodo==2) {
		# code...

	$sql_ppg1 = "select *  FROM planproduccionganadera where anoprodganadera=3 and idregistro=".$_SESSION['idreg'];
	$ppg1 = pg_query($cn,$sql_ppg1);
	$row_ppg1 = pg_fetch_array ($ppg1);

	$sql_ppg2 = "select *  FROM planproduccionganadera where anoprodganadera=4 and idregistro=".$_SESSION['idreg'];
	$ppg2 = pg_query($cn,$sql_ppg2);
	$row_ppg2 = pg_fetch_array ($ppg2);

	$sql_ppg3 = "select *  FROM planproduccionganadera where anoprodganadera=5 and idregistro=".$_SESSION['idreg'];
	$ppg3 = pg_query($cn,$sql_ppg3);
	$row_ppg3 = pg_fetch_array ($ppg3);

	$sql_ppg4 = "select *  FROM planproduccionganadera where anoprodganadera=6 and idregistro=".$_SESSION['idreg'];
	$ppg4 = pg_query($cn,$sql_ppg4);
	$row_ppg4 = pg_fetch_array ($ppg4);

	$sql_ppg5 = "select *  FROM planproduccionganadera where anoprodganadera=7 and idregistro=".$_SESSION['idreg'];
	$ppg5 = pg_query($cn,$sql_ppg5);
	$row_ppg5 = pg_fetch_array ($ppg5);
}
	// $sql_ppg6 = "select *  FROM planproduccionganadera where anoprodganadera=6 and idregistro=".$_SESSION['idreg'];
	// $ppg6 = pg_query($cn,$sql_ppg6);
	// $row_ppg6 = pg_fetch_array ($ppg6);

	// $sql_ppg7 = "select *  FROM planproduccionganadera where anoprodganadera=7 and idregistro=".$_SESSION['idreg'];
	// $ppg7 = pg_query($cn,$sql_ppg7);
	// $row_ppg7 = pg_fetch_array ($ppg7);

	if(!isset($_SESSION['superficie337'])){
		if(!isset($_SESSION['superficie337'])){
		   $superficie337=new SuperficieRegistro();
		   $superficie337->SuperficieRegistro337($cn, $_SESSION['idreg']);
		   $_SESSION['superficie337']=$superficie337;

		}
		if(!isset($_SESSION['superficie502']) && $_SESSION['Causal']==2){
			$superficie502=new SuperficieRegistro();
		    $superficie502->SuperficieRegistro502($cn, $_SESSION['idreg']);
		    $_SESSION['superficie502']=$superficie502;

		}
	}
	 if(!isset($_SESSION['nombre_predio'])){
	    $sql_predio = "SELECT parcelas.nombre,parcelas.superficie, codificadores.nombrecodificador FROM  parcelas, registro, codificadores
		WHERE   parcelas.idtipoprop = codificadores.idcodificadores AND  registro.idparcela = parcelas.idparcela  and  registro.idregistro=".$_SESSION['idreg'];
		$predio = pg_query($cn,$sql_predio);
		$row_predio = pg_fetch_array ($predio);
		$_SESSION['nombre_predio']=$row_predio['nombre'];
	 }

 }

}
// print_r($_SESSION);

  	$sql_supali = "select *  FROM superficiealimentos where idregistro=".$_SESSION['idreg'];
	$supali = pg_query($cn,$sql_supali);
	$row_supali = pg_fetch_array ($supali);

	$sql_obser = "select obsregistro from  registro where  registro.idregistro=".$_SESSION['idreg'];
	$obser = pg_query($cn,$sql_obser);
	$row_obser = pg_fetch_array ($obser);

?>
