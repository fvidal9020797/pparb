<?php
	////////////***********************/////////////////
	$sql_obser = "SELECT obsregistro FROM  registro  WHERE  registro.idregistro=".$_SESSION['idreg'];
	$obser = pg_query($cn,$sql_obser);
	$row_obser = pg_fetch_array ($obser);
$ley=0;
if(!isset($_SESSION['datos_bosque']))//no hay parcela registrada F
{
		$sql_predio = "SELECT parcelas.nombre,parcelas.superficie, codificadores.nombrecodificador FROM  parcelas, registro, codificadores
		WHERE   parcelas.idtipoprop = codificadores.idcodificadores AND  registro.idparcela = parcelas.idparcela  and  registro.idregistro=".$_SESSION['idreg'];
		$predio = pg_query($cn,$sql_predio);
		$row_predio = pg_fetch_array ($predio);
		$_SESSION['nombre_predio']=$row_predio['nombre'];

        if(!isset($_SESSION['idreg'])){
		   $idreg=0; $_SESSION['idreg']=$idreg;
		}
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
		$sql_supali="SELECT * FROM superficieregistro WHERE idtiposuperficie=219 AND idregistro=".$_SESSION['idreg'];
		$supali = pg_query($cn,$sql_supali);
		$row_supali= pg_fetch_array ($supali);

		$sql_Sels = "SELECT superficiesel.*,codificadores.nombrecodificador FROM superficiesel,codificadores
					 WHERE codificadores.idcodificadores=superficiesel.idparametrica and superficiesel.idregistro=".$_SESSION['idreg'];
		$Sels = pg_query($cn,$sql_Sels);
		$row_Sels = pg_fetch_array ($Sels);
		$totalRows_SELS = pg_num_rows($Sels);

		$sql_Especies = "SELECT especie.nombrecientifico,  especienombrecomun.nombrecomun, especierestituir.*,codificadores.nombrecodificador as nombre_espaciamiento
						 FROM especie, especienombrecomun, especierestituir,codificadores
						 WHERE especie.idespecie = especienombrecomun.idespecie AND
  especierestituir.idtipoesparcimiento = codificadores.idcodificadores AND especienombrecomun.idespeciecomun = especierestituir.idespeciecomun and especierestituir.idregistro=".$_SESSION['idreg'];
		$Especies = pg_query($cn,$sql_Especies);
		$row_Especies = pg_fetch_array ($Especies);
		$totalRows_Especies = pg_num_rows($Especies);

	/*******************************************validacion de articulo 5 pago si es menos de 10%***********************************/

	$res=revisar_art5($row_predio['nombrecodificador'],$row_predio['superficie'],$_SESSION['superficie337']->get_suptpfp(),$_SESSION['cod_parcela'],$_SESSION['superficie337']->get_supreftpfp(),$cn,$ley);

	if( $res['mensaje']==""&& $res['supreftpfp']==0){ unset($_SESSION['mensaje']); if(isset($_SESSION['verde'])){unset($_SESSION['verde']);}}
	else{ $_SESSION['mensaje']=$res['mensaje'];  $_SESSION['verde']=$res['verde'];}

	if($_SESSION['Causal']==2 && $_SESSION['superficie337']->get_suptpfp()==0 && $_SESSION['superficie502']->get_suptpfp() ){
	   $res=revisar_art5($row_predio['nombrecodificador'],$row_predio['superficie'],$_SESSION['superficie502']->get_suptpfp(),$_SESSION['cod_parcela'],$_SESSION['superficie502']->get_supreftpfp(),$cn,$ley);

		if(isset($_SESSION['verde']) && $_SESSION['verde']==2 ){ unset($_SESSION['mensaje']);unset($_SESSION['verde']);}
		else{ $_SESSION['mensaje']=$res['mensaje']; if(isset($_SESSION['verde'])){unset($_SESSION['verde']);}}
	}
		if(isset($_SESSION['verde']) && $_SESSION['verde']==2 ){ unset($_SESSION['mensaje']);unset($_SESSION['verde']);}
}
/*************************************************VALIDANDO SUPERFICIES****************************************************************/

if(isset($_POST['suptum']) || isset($_SESSION['datos_bosque']) )
{  $mensajeerror="";
   if(isset($_POST['suptum'])){
	   $datos_bosque=$_POST;
	   $_SESSION['datos_bosque']=$datos_bosque;
   }
  /*****************************************************************************/
  ///////////////////////////validaciones337///////////////////////////////////////
  /*****************************************************************************/
  if($_SESSION['Causal']==0 ||$_SESSION['Causal']==2 ){
	  /****************** Calculando Sels Totales **************************/
	  if(isset($_SESSION['datos_bosque']['conteoSEL'])){	//existe sels
			   $_SESSION['superficie337']->reinicializarSelsR();
				$_SESSION['superficie337']->reinicializarSelsC();
				for ($i = 1; $i <=$_SESSION['datos_bosque']['conteoSEL'] ; $i++) {
					   if(isset($_SESSION['datos_bosque']['tiposel'.$i])){
							if($_SESSION['datos_bosque']['tiposel'.$i]==105){
								$_SESSION['superficie337']->sumarselsR($_SESSION['datos_bosque']['supseltpfp'.$i],$_SESSION['datos_bosque']['supseltum'.$i]);
							  }else{
								$_SESSION['superficie337']->sumarselsC($_SESSION['datos_bosque']['supseltpfp'.$i],$_SESSION['datos_bosque']['supseltum'.$i]);
							 }
						}
				}
		}

  	 /****************************************************MEJORAS ********************************************************/

	 $_SESSION['superficie337']->reinicializarMejora();

	 for ($i = 142; $i <=145 ; $i++) {
	   if(isset($_SESSION['datos_bosque']['chk'.$i])){
	        $_SESSION['superficie337']->sumarMejoras($_SESSION['datos_bosque']['supmejoratpfp'.$i],$_SESSION['datos_bosque']['supmejoratum'.$i]);
		 }
	  }
	  if(isset($_SESSION['datos_bosque']['chk239'])){
	  	$_SESSION['superficie337']->sumarMejoras($_SESSION['datos_bosque']['supmejoratpfp239'],$_SESSION['datos_bosque']['supmejoratum239']);
	  }
	   if(isset($_SESSION['datos_bosque']['chk256'])){
	  	$_SESSION['superficie337']->sumarMejoras($_SESSION['datos_bosque']['supmejoratpfp256'],$_SESSION['datos_bosque']['supmejoratum256']);
	  }
	 /******************************************calculo de art 5 y restitucion **************************************************/
		 $ley=337;
		 $res=revisar_art5($_SESSION['datos_bosque']['TipoProp'],$_SESSION['datos_bosque']['Superficie'],$_SESSION['datos_bosque']['suptpfp'],$_SESSION['cod_parcela'],$_SESSION['datos_bosque']['supreftpfp'],$cn,$ley);

		$_SESSION['datos_bosque']['supreftpfp']=$res['supreftpfp'];

		if( $res['verde']==2){unset($_SESSION['mensaje']);unset($_SESSION['verde']);}
		else{ $_SESSION['mensaje']=$res['mensaje'];  $_SESSION['verde']=$res['verde'];}

		if($_SESSION['datos_bosque']['supreftum']<=0){$_SESSION['datos_bosque']['supreftum']=0;}

	/******************************************** Calculando Superficies Totales ************************************************/
	/****************************************************************************************************************************/

	  $_SESSION['superficie337']->calcularvalores($_SESSION['datos_bosque']['suptpfp'],$_SESSION['datos_bosque']['suptum'],$_SESSION['datos_bosque']['supreftpfp'],$_SESSION['datos_bosque']['supreftum']);

	 $mensajeerror=$_SESSION['superficie337']->Validar();

   }

  /*****************************************************************************/
  ////////////////////    */Validaciones512/*    ///////////////////////////////
  /*****************************************************************************/

   if($_SESSION['Causal']==2){
   /********************* Calculando Sels Totales *****************************/
	 if(isset($_SESSION['datos_bosque']['conteoSEL'])){	//existe sels
			   $_SESSION['superficie502']->reinicializarSelsR();
				$_SESSION['superficie502']->reinicializarSelsC();
				for ($i = 1; $i <=$_SESSION['datos_bosque']['conteoSEL'] ; $i++) {
					   if(isset($_SESSION['datos_bosque']['tiposel'.$i])){
							if($_SESSION['datos_bosque']['tiposel'.$i]==105){
								$_SESSION['superficie502']->sumarselsR($_SESSION['datos_bosque']['supseltpfppas'.$i],$_SESSION['datos_bosque']['supseltumpas'.$i]);
							  }else{
								$_SESSION['superficie502']->sumarselsC($_SESSION['datos_bosque']['supseltpfppas'.$i],$_SESSION['datos_bosque']['supseltumpas'.$i]);
							 }
						}
				}
		}

  	 /********************************************MEJORAS ********************************************************/

	 $_SESSION['superficie502']->reinicializarMejora();

	 for ($i = 142; $i <=145 ; $i++) {
	   if(isset($_SESSION['datos_bosque']['chk'.$i])){

	       $_SESSION['superficie502']->sumarMejoras($_SESSION['datos_bosque']['supmejoratpfppas'.$i],$_SESSION['datos_bosque']['supmejoratumpas'.$i]);
		 }
	  }

	  if(isset($_SESSION['datos_bosque']['chk239'])){

	       $_SESSION['superficie502']->sumarMejoras($_SESSION['datos_bosque']['supmejoratpfppas239'],$_SESSION['datos_bosque']['supmejoratumpas239']);
		 }
		  if(isset($_SESSION['datos_bosque']['chk256'])){

	       $_SESSION['superficie502']->sumarMejoras($_SESSION['datos_bosque']['supmejoratpfppas256'],$_SESSION['datos_bosque']['supmejoratumpas256']);
		 }
	/************************************calculo de art 5 y restitucion ******************************************/
	 $ley=502;
	 $res=revisar_art5($_SESSION['datos_bosque']['TipoProp'],$_SESSION['datos_bosque']['Superficie'],$_SESSION['datos_bosque']['suptpfppas'],$_SESSION['cod_parcela'],$_SESSION['datos_bosque']['supreftpfppas'],$cn,$ley);

	$_SESSION['datos_bosque']['supreftpfppas']=$res['supreftpfp'];

	if( $res['mensaje']=="" && $_SESSION['superficie502']->get_suptpfp()==0 && $_SESSION['superficie502']->get_suptpfp()>0)
		{unset($_SESSION['mensaje']); unset($_SESSION['verde']);}
	elseif( $_SESSION['superficie337']->get_suptpfp()==0 && $_SESSION['superficie502']->get_suptpfp()>0){ $_SESSION['mensaje']=$res['mensaje'];  $_SESSION['verde']=$res['verde'];}

	if($_SESSION['datos_bosque']['supreftum']<=0){$_SESSION['datos_bosque']['supreftum']=0;}
	/******************************************** Calculando Superficies Totales ************************************************/
	/***************************************************************************************************************************/

	$_SESSION['superficie502']->calcularvalores($_SESSION['datos_bosque']['suptpfppas'],$_SESSION['datos_bosque']['suptumpas'],$_SESSION['datos_bosque']['supreftpfppas'],$_SESSION['datos_bosque']['supreftumpas']);

   }

	 ////////////validaciones///////////////////////////////
if ((isset($_POST["New_Predio"])) && ($_POST["New_Predio"] == "Guardar")){

	   /*********************************Validando Especies a Restituir****************************************/

	    $ErrorAnoEspecies="NO"; $ErrorSupEspecies="NO"; $ErrorPrecioEspecies="NO";
		 for ($i = 1; $i <=$_SESSION['datos_bosque']['conteoEspecie'] ; $i++) {
		   if(isset($_SESSION['datos_bosque']['anorestituir'.$i])){
				 if($_SESSION['datos_bosque']['anorestituir'.$i]<=0 || trim($_SESSION['datos_bosque']['anorestituir'.$i])=="" || $_SESSION['datos_bosque']['mesini'.$i]<0 || trim($_SESSION['datos_bosque']['mesini'.$i])=="" || $_SESSION['datos_bosque']['mesfin'.$i]<0 || trim($_SESSION['datos_bosque']['mesfin'.$i])==""){
				   $ErrorAnoEspecies="YES";
				 }
				 if($_SESSION['datos_bosque']['suprestituir'.$i]<=0 || trim($_SESSION['datos_bosque']['suprestituir'.$i])==""){
				   $ErrorSupEspecies="YES";
				 }
				 if($_SESSION['datos_bosque']['pretotalplantines'.$i]<=0 || trim($_SESSION['datos_bosque']['pretotalplantines'.$i])==""){
				   $ErrorPrecioEspecies="YES";
				 }
			  }
		  }
		if($mensajeerror!="") {
		 trigger_error($mensajeerror, E_USER_ERROR);   }
		elseif ($_SESSION ['datos_bosque']['Superficie']<$_SESSION ['datos_bosque']['supdefilegal'])
		{ $mensajeerror="Verifique: La Superficie Deforestada Ilegal no puede ser mayor que la Superficie General de Predio "; }
	    elseif ($_SESSION ['datos_bosque']['Superficie']<$_SESSION ['datos_bosque']['supprodali'])
		{ $mensajeerror="Verifique: La Superficie de Producci�n de Alimentos no puede ser mayor que la Superficie General de Predio "; }
		elseif($ErrorAnoEspecies=="YES")
	 	 { $mensajeerror="Existe un registro de Especie a Restituir con Anio, Mes Inicial o Mes final sin valor "; }
		elseif($ErrorSupEspecies=="YES")
		 { $mensajeerror="Existe un registro de Especie a Restituir con superficie cero"; }
		elseif($ErrorPrecioEspecies=="YES")
	 	 {  $mensajeerror="Existe un registro de Especie a Restituir con Precio Total cero"; }
		elseif($_SESSION['Causal']==1 && $_SESSION ['datos_bosque']['supdefilegal']==0)
		 { $mensajeerror="Verifique: La Superficie Deforestada Ilegal no puede ser igual a cero ";}
		elseif($_SESSION['Causal']==1 && $_SESSION ['datos_bosque']['suptpfprest']>($_SESSION['datos_bosque']['supreftpfp']+$_SESSION['datos_bosque']['supreftum']))
		 {	$mensajeerror="Verifique: La Suma de Superficie de Especies a Restituir es mayor que la Suma de Superficie a Restituir ";}
		elseif($_SESSION['Causal']==1 && round($_SESSION ['datos_bosque']['suptpfprestsel'],4)>round(($_SESSION['datos_bosque']['supselstpfpref']+$_SESSION['datos_bosque']['supselstumref'])*10000,4)/10000)
		 {$mensajeerror="Verifique: La Suma de Superficie de Especies en SEL's Restituir es mayor a la registrada en punto 2.Servidumbres Ecologicas Legales";}
		elseif ($_SESSION['Causal']==2){
			$mensaje=$_SESSION['superficie502']->Validar();
			if($mensaje!="")
		       {trigger_error($mensaje, E_USER_ERROR);  }
			elseif ($_SESSION ['datos_bosque']['Superficie']<$_SESSION ['datos_bosque']['suppas'])
		    {$mensajeerror="Verifique: La Superficie registrada con Proceso Administrativo Sancionatorio no puede ser mayor que la Superficie General de Predio ";}
			elseif($_SESSION['datos_bosque']['Superficie'] && $_SESSION ['datos_bosque']['supdefilegal']==0 && $_SESSION ['datos_bosque']['suppas']==0)
			 { $mensajeerror="Verifique: La Superficie Deforestada Ilegal y la Superficie PAS no puede ser igual a cero "; }
			elseif($_SESSION ['datos_bosque']['suptpfprest']>($_SESSION['datos_bosque']['supreftpfp']+$_SESSION['datos_bosque']['supreftum']+$_SESSION['datos_bosque']['supreftpfppas']+$_SESSION['datos_bosque']['supreftumpas']))
		   		{$mensajeerror="Verifique: La Suma de Superficie de Especies a Restituir es mayor que la Suma de Superficie a Restituir "; }
		    elseif($_SESSION ['datos_bosque']['suptpfprestsel']>($_SESSION['datos_bosque']['supselstpfprefpas']+$_SESSION['datos_bosque']['supselstumrefpas']+$_SESSION['datos_bosque']['supselstpfpref']+$_SESSION['datos_bosque']['supselstumref']))
		   		{$mensajeerror="Verifique: La Suma de Superficie de Especies en SEL's Restituir es mayor a la registrada en punto 2.Servidumbres Ecologicas Legales";}

		 }
	if ($mensajeerror!="")
	     {  trigger_error($mensajeerror, E_USER_ERROR);
	}else{
		  //////*************************Grabando Superficies General*****************************////////////
		 $_SESSION['superficie337']->Grabar($cn,337,$_SESSION['idreg'],$_SESSION['datos_bosque']['supprodali']) ;
		 if($_SESSION['Causal']==2){
			$_SESSION['superficie502']->Grabar($cn,502,$_SESSION['idreg'],$_SESSION['datos_bosque']['supprodali']) ;
		 }
		 	echo $_SESSION['datos_bosque']['supprodali'];
		/*************************Grabando superfies SEL******************************////////
		$result=pg_query($cn,"delete from superficiesel where idregistro=".$_SESSION['idreg']);
		 if($_SESSION['datos_bosque']['conteoSEL']>0){

			  for ($i = 1; $i <=$_SESSION['datos_bosque']['conteoSEL'] ; $i++) {
				if(isset($_SESSION['datos_bosque']['idtiposel'.$i])){
					if($_SESSION['Causal']==2){
						        if($_SESSION['datos_bosque']['supseltpfp'.$i]==""){$_SESSION['datos_bosque']['supseltpfp'.$i]=0;}    //B
								if($_SESSION['datos_bosque']['supseltum'.$i]==""){$_SESSION['datos_bosque']['supseltum'.$i]=0; }    //C
								if($_SESSION['datos_bosque']['supseltpfp'.$i]==""){$_SESSION['datos_bosque']['supseltpfppas'.$i]=0;}    //B
								if($_SESSION['datos_bosque']['supseltum'.$i]==""){$_SESSION['datos_bosque']['supseltumpas'.$i]=0; }    //C
								if($_SESSION['datos_bosque']['supseltpfp'.$i]==0 && $_SESSION['datos_bosque']['supseltum'.$i]==0 && $_SESSION['datos_bosque']['supseltpfppas'.$i]==0 && $_SESSION['datos_bosque']['supseltumpas'.$i]==0){
								 trigger_error ("Es necesario introducir la superficie de TPFP, sup en TUM o P.A.S. para las SEL's", E_USER_ERROR);
								}else{
									$insertaux=sprintf("select * from f_SupSEl (%s, %s, %s, %s, %s, %s, %s);",
																		 GetSQLValueString(trim($_SESSION['idreg']), "int"),
																		 GetSQLValueString(trim($_SESSION['datos_bosque']['idtiposel'.$i]), "int"),//parametrica
																		 GetSQLValueString(trim($_SESSION['datos_bosque']['tiposel'.$i]), "int"), //tipo sel
																		 GetSQLValueString($_SESSION['datos_bosque']['supseltpfp'.$i], "double"),//
																		 GetSQLValueString($_SESSION['datos_bosque']['supseltum'.$i], "double"),
																		 GetSQLValueString($_SESSION['datos_bosque']['supseltpfppas'.$i], "double"),
																		 GetSQLValueString($_SESSION['datos_bosque']['supseltumpas'.$i], "double"));
									//echo $insertaux;
									$Result2 = pg_query($cn, $insertaux);
								  }


					}else{
							    if($_SESSION['datos_bosque']['supseltpfp'.$i]==""){$_SESSION['datos_bosque']['supseltpfp'.$i]=0;}    //B
								if($_SESSION['datos_bosque']['supseltum'.$i]==""){$_SESSION['datos_bosque']['supseltum'.$i]=0; }    //C

								if($_SESSION['datos_bosque']['supseltpfp'.$i]==0 && $_SESSION['datos_bosque']['supseltum'.$i]==0 ){
								 trigger_error ("Es necesario introducir la superficie de TPFP, sup en TUM o P.A.S. para las SEL's", E_USER_ERROR);
								}else{

									$insertaux=sprintf("select * from f_SupSEl (%s, %s, %s, %s, %s, %s, %s);",
																		 GetSQLValueString(trim($_SESSION['idreg']), "int"),
																		 GetSQLValueString(trim($_SESSION['datos_bosque']['idtiposel'.$i]), "int"),//parametrica
																		 GetSQLValueString(trim($_SESSION['datos_bosque']['tiposel'.$i]), "int"), //tipo sel
																		 GetSQLValueString($_SESSION['datos_bosque']['supseltpfp'.$i], "double"),//
																		 GetSQLValueString($_SESSION['datos_bosque']['supseltum'.$i], "double"),
																		 GetSQLValueString(0, "double"),
																		 GetSQLValueString(0, "double"));
									//echo $insertaux;
									$Result2 = pg_query($cn, $insertaux);
								  }

					}
				}
			 }
		}
		 /*************************Grabando superfies Mejoras******************************////////
			 $result=pg_query($cn,"delete from mejora where idregistro=".$_SESSION['idreg']);

			 for ($i = 142; $i <=145 ; $i++) {

				 if(isset($_SESSION['datos_bosque']["chk".$i])){
					 if($_SESSION['Causal']==2){
						  $insertaux=sprintf("select * from f_SupMejora (%s, %s, %s,%s, %s, %s);",
																GetSQLValueString(trim($_SESSION['idreg']), "int"),
																GetSQLValueString(trim($i), "int"),//idmejora
																GetSQLValueString($_SESSION['datos_bosque']['supmejoratpfp'.$i], "double"),
																GetSQLValueString($_SESSION['datos_bosque']['supmejoratum'.$i], "double"),
																GetSQLValueString($_SESSION['datos_bosque']['supmejoratpfppas'.$i], "double"),
																GetSQLValueString($_SESSION['datos_bosque']['supmejoratumpas'.$i], "double")); //superficie
					  }else{
					  	   $insertaux=sprintf("select * from f_SupMejora (%s, %s, %s,%s, %s, %s);",
																GetSQLValueString(trim($_SESSION['idreg']), "int"),
																GetSQLValueString(trim($i), "int"),//idmejora
																GetSQLValueString($_SESSION['datos_bosque']['supmejoratpfp'.$i], "double"),
																GetSQLValueString($_SESSION['datos_bosque']['supmejoratum'.$i], "double"),
																GetSQLValueString(0, "double"),
																GetSQLValueString(0, "double")); //superficie

					  }
						 $Result2 = pg_query($cn, $insertaux);
					}
			  }

			   if(isset($_SESSION['datos_bosque']["chk239"])){
					 if($_SESSION['Causal']==2){
						  $insertaux=sprintf("select * from f_SupMejora (%s, %s, %s,%s, %s, %s);",
																GetSQLValueString(trim($_SESSION['idreg']), "int"),
																GetSQLValueString(trim(239), "int"),//idmejora
																GetSQLValueString($_SESSION['datos_bosque']['supmejoratpfp239'], "double"),
																GetSQLValueString($_SESSION['datos_bosque']['supmejoratum239'], "double"),
																GetSQLValueString($_SESSION['datos_bosque']['supmejoratpfppas239'], "double"),
																GetSQLValueString($_SESSION['datos_bosque']['supmejoratumpas239'], "double")); //superficie
					  }else{
					  	   $insertaux=sprintf("select * from f_SupMejora (%s, %s, %s,%s, %s, %s);",
																GetSQLValueString(trim($_SESSION['idreg']), "int"),
																GetSQLValueString(trim(239), "int"),//idmejora
																GetSQLValueString($_SESSION['datos_bosque']['supmejoratpfp239'], "double"),
																GetSQLValueString($_SESSION['datos_bosque']['supmejoratum239'], "double"),
																GetSQLValueString(0, "double"),
																GetSQLValueString(0, "double")); //superficie

					  }
						 $Result2 = pg_query($cn, $insertaux);
				}

				if(isset($_SESSION['datos_bosque']["chk256"])){
					 if($_SESSION['Causal']==2){
						  $insertaux=sprintf("select * from f_SupMejora (%s, %s, %s,%s, %s, %s);",
																GetSQLValueString(trim($_SESSION['idreg']), "int"),
																GetSQLValueString(trim(256), "int"),//idmejora
																GetSQLValueString($_SESSION['datos_bosque']['supmejoratpfp256'], "double"),
																GetSQLValueString($_SESSION['datos_bosque']['supmejoratum256'], "double"),
																GetSQLValueString($_SESSION['datos_bosque']['supmejoratpfppas256'], "double"),
																GetSQLValueString($_SESSION['datos_bosque']['supmejoratumpas256'], "double")); //superficie
					  }else{
					  	   $insertaux=sprintf("select * from f_SupMejora (%s, %s, %s,%s, %s, %s);",
																GetSQLValueString(trim($_SESSION['idreg']), "int"),
																GetSQLValueString(trim(256), "int"),//idmejora
																GetSQLValueString($_SESSION['datos_bosque']['supmejoratpfp256'], "double"),
																GetSQLValueString($_SESSION['datos_bosque']['supmejoratum256'], "double"),
																GetSQLValueString(0, "double"),
																GetSQLValueString(0, "double")); //superficie

					  }
						 $Result2 = pg_query($cn, $insertaux);
				}




				/* INSERTANDO ESCENARIOS O ALTERNATIVAS DE RESTITUCION DE RESTITUCION  */

				$datosdel = "delete from escenariosreforestacion where idregistro = ".$_SESSION['idreg'];
				$Result2 = pg_query($cn, $datosdel);
				/* ESCENARIO UNO */
				if(isset($_SESSION['datos_bosque']["chk321"])){

					if($_SESSION['Causal']==2){
						 $insertaux=sprintf("select * from f_guardar_escenarios (%s, %s, %s,%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s );",
															 GetSQLValueString(trim($_SESSION['idreg']), "int"),
															 GetSQLValueString(trim(321), "int"),//idescenario
															 GetSQLValueString($_SESSION['datos_bosque']['suprest321'], "double"), //337
															 GetSQLValueString($_SESSION['datos_bosque']['indcomp321'], "int"),
															 GetSQLValueString(0,"double"), //barbecho conservar 337
															 GetSQLValueString(0,"int"), // plantines existentes 337
															 GetSQLValueString($_SESSION['datos_bosque']['suprestpas321'], "double"), //502
															 GetSQLValueString($_SESSION['datos_bosque']['indcomppas321'], "int"),
															 GetSQLValueString(0,"double"), //barbecho conservar 502
															 GetSQLValueString(0,"int"), // plantines existentes 502
															 GetSQLValueString($_SESSION['datos_bosque']['suprestfuera321'],"double"), //fuera
															 GetSQLValueString($_SESSION['datos_bosque']['indcompfuera321'], "int"),
															 GetSQLValueString(0,"double"),
															 GetSQLValueString(0,"int"));
					  }
						else
						{
							$insertaux=sprintf("select * from f_guardar_escenarios (%s, %s, %s,%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s );",
 															 GetSQLValueString(trim($_SESSION['idreg']), "int"),
 															 GetSQLValueString(trim(321), "int"),//idescenario
 															 GetSQLValueString($_SESSION['datos_bosque']['suprest321'], "double"), //337
 															 GetSQLValueString($_SESSION['datos_bosque']['indcomp321'], "int"),
 															 GetSQLValueString(0,"double"), //barbecho conservar 337
 															 GetSQLValueString(0,"int"), // plantines existentes 337
 															 GetSQLValueString(0, "double"), //502
 															 GetSQLValueString(0, "int"),
 															 GetSQLValueString(0,"double"), //barbecho conservar 502
 															 GetSQLValueString(0,"int"), // plantines existentes 502
 															 GetSQLValueString($_SESSION['datos_bosque']['suprestfuera321'],"double"), //fuera
 															 GetSQLValueString($_SESSION['datos_bosque']['indcompfuera321'], "int"),
															 GetSQLValueString(0,"double"),
 															 GetSQLValueString(0,"int"));
					 }
						$Result2 = pg_query($cn, $insertaux);
				}

				/* ESCENARIO DOS */
				if(isset($_SESSION['datos_bosque']["chk322"])){

					if($_SESSION['Causal']==2){
						 $insertaux=sprintf("select * from f_guardar_escenarios (%s, %s, %s,%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s );",
															 GetSQLValueString(trim($_SESSION['idreg']), "int"),
															 GetSQLValueString(trim(322), "int"),//idescenario
															 GetSQLValueString($_SESSION['datos_bosque']['suprest322'], "double"), //337
															 GetSQLValueString($_SESSION['datos_bosque']['indcomp322'], "int"),
															 GetSQLValueString(0,"double"), //barbecho conservar 337
															 GetSQLValueString(0,"int"), // plantines existentes 337
															 GetSQLValueString($_SESSION['datos_bosque']['suprestpas322'], "double"), //502
															 GetSQLValueString($_SESSION['datos_bosque']['indcomppas322'], "int"),
															 GetSQLValueString(0,"double"), //barbecho conservar 502
															 GetSQLValueString(0,"int"), // plantines existentes 502
															 GetSQLValueString($_SESSION['datos_bosque']['suprestfuera322'],"double"), //fuera
															 GetSQLValueString($_SESSION['datos_bosque']['indcompfuera322'],"int"),
															 GetSQLValueString(0,"double"),
															 GetSQLValueString(0,"int"));
						}
						else
						{
							$insertaux=sprintf("select * from f_guardar_escenarios (%s, %s, %s,%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s );",
															 GetSQLValueString(trim($_SESSION['idreg']), "int"),
															 GetSQLValueString(trim(322), "int"),//idescenario
															 GetSQLValueString($_SESSION['datos_bosque']['suprest322'], "double"), //337
															 GetSQLValueString($_SESSION['datos_bosque']['indcomp322'], "int"),
															 GetSQLValueString(0,"double"), //barbecho conservar 337
															 GetSQLValueString(0,"int"), // plantines existentes 337
															 GetSQLValueString(0, "double"), //502
															 GetSQLValueString(0, "int"),
															 GetSQLValueString(0,"double"), //barbecho conservar 502
															 GetSQLValueString(0,"int"), // plantines existentes 502
															 GetSQLValueString($_SESSION['datos_bosque']['suprestfuera322'],"double"), //fuera
															 GetSQLValueString($_SESSION['datos_bosque']['indcompfuera322'],"int"),
															 GetSQLValueString(0,"double"),
															 GetSQLValueString(0,"int"));
					 }
						$Result2 = pg_query($cn, $insertaux);
				}


				/* ESCENARIO DOS alternativa b */
				if(isset($_SESSION['datos_bosque']["chk342"])){
					if($_SESSION['Causal']==2){
					  $insertaux=sprintf("select * from f_guardar_escenarios (%s, %s, %s,%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s );",
														 GetSQLValueString(trim($_SESSION['idreg']), "int"),
														 GetSQLValueString(trim(342), "int"),//idescenario
														 GetSQLValueString($_SESSION['datos_bosque']['suprest342'], "double"), //337
														 GetSQLValueString($_SESSION['datos_bosque']['indcomp342'], "int"),
														 GetSQLValueString($_SESSION['datos_bosque']['supbarcon342'],"double"), //barbecho conservar 337
														 GetSQLValueString(0,"int"), // plantines existentes 337
														 GetSQLValueString($_SESSION['datos_bosque']['suprestpas342'], "double"), //502
														 GetSQLValueString($_SESSION['datos_bosque']['indcomppas342'], "int"),
														 GetSQLValueString($_SESSION['datos_bosque']['supbarconpas342'],"double"), //barbecho conservar 502
														 GetSQLValueString(0,"int"), // plantines existentes 502
														 GetSQLValueString($_SESSION['datos_bosque']['suprestfuera342'],"double"), //fuera
														 GetSQLValueString($_SESSION['datos_bosque']['indcompfuera342'],"int"),
														 GetSQLValueString($_SESSION['datos_bosque']['supbarconfuera342'],"double"), //barbecho conservar fuera
														 GetSQLValueString(0,"int"));
						}
						else
						{
							$insertaux=sprintf("select * from f_guardar_escenarios (%s, %s, %s,%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s );",
															 GetSQLValueString(trim($_SESSION['idreg']), "int"),
															 GetSQLValueString(trim(342), "int"),//idescenario
															 GetSQLValueString($_SESSION['datos_bosque']['suprest342'], "double"), //337
															 GetSQLValueString($_SESSION['datos_bosque']['indcomp342'], "int"),
															 GetSQLValueString($_SESSION['datos_bosque']['supbarcon342'],"double"), //barbecho conservar 337
															 GetSQLValueString(0,"int"), // plantines existentes 337
															 GetSQLValueString(0, "double"), //502
															 GetSQLValueString(0, "int"),
															 GetSQLValueString(0,"double"), //barbecho conservar 502
															 GetSQLValueString(0,"int"), // plantines existentes 502
															 GetSQLValueString($_SESSION['datos_bosque']['suprestfuera342'],"double"), //fuera
															 GetSQLValueString($_SESSION['datos_bosque']['indcompfuera342'],"int"),
															 GetSQLValueString($_SESSION['datos_bosque']['supbarconfuera342'],"double"), //barbecho conservar fuera
															 GetSQLValueString(0,"int"));
					 }
						$Result2 = pg_query($cn, $insertaux);
				}



				/* ESCENARIO TRES */
				if(isset($_SESSION['datos_bosque']["chk323"])){

					if($_SESSION['Causal']==2){
						$insertaux=sprintf("select * from f_guardar_escenarios (%s, %s, %s,%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s );",
														 GetSQLValueString(trim($_SESSION['idreg']), "int"),
														 GetSQLValueString(trim(323), "int"),//idescenario
														 GetSQLValueString($_SESSION['datos_bosque']['suprest323'], "double"), //337
														 GetSQLValueString($_SESSION['datos_bosque']['indcomp323'], "int"),
														 GetSQLValueString(0,"double"), //barbecho conservar 337
														 GetSQLValueString($_SESSION['datos_bosque']['indexi323'],"int"), // plantines existentes 337
														 GetSQLValueString($_SESSION['datos_bosque']['suprestpas323'], "double"), //502
														 GetSQLValueString($_SESSION['datos_bosque']['indcomppas323'], "int"),
														 GetSQLValueString(0,"double"), //barbecho conservar 502
														 GetSQLValueString($_SESSION['datos_bosque']['indexipas323'],"int"), // plantines existentes 502
														 GetSQLValueString($_SESSION['datos_bosque']['suprestfuera323'],"double"), //fuera
														 GetSQLValueString($_SESSION['datos_bosque']['indcompfuera323'],"int"),
														 GetSQLValueString(0,"double"), //barbecho conservar 502
														 GetSQLValueString($_SESSION['datos_bosque']['indexifuera323'],"int"));
						}
						else
						{
							$insertaux=sprintf("select * from f_guardar_escenarios (%s, %s, %s,%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s );",
															 GetSQLValueString(trim($_SESSION['idreg']), "int"),
															 GetSQLValueString(trim(323), "int"),//idescenario
															 GetSQLValueString($_SESSION['datos_bosque']['suprest323'], "double"), //337
															 GetSQLValueString($_SESSION['datos_bosque']['indcomp323'], "int"),
															 GetSQLValueString(0,"double"), //barbecho conservar 337
															 GetSQLValueString($_SESSION['datos_bosque']['indexi323'],"int"), // plantines existentes 337
															 GetSQLValueString(0,"double"), //502
															 GetSQLValueString(0,"int"),
															 GetSQLValueString(0,"double"), //barbecho conservar 502
															 GetSQLValueString(0,"int"), // plantines existentes 502
															 GetSQLValueString($_SESSION['datos_bosque']['suprestfuera323'],"double"), //fuera
															 GetSQLValueString($_SESSION['datos_bosque']['indcompfuera323'],"int"),
															 GetSQLValueString(0,"double"), //barbecho conservar 502
															 GetSQLValueString($_SESSION['datos_bosque']['indexifuera323'],"int"));
					 }
						$Result2 = pg_query($cn, $insertaux);
				}


		  /*************************Grabando superfies especies******************************////////
		   if($_SESSION['datos_bosque']['conteoEspecie']>0){
			  $result=pg_query($cn,"delete from especierestituir where idregistro=".$_SESSION['idreg']);
			  for ($i = 1; $i <=$_SESSION['datos_bosque']['conteoEspecie'] ; $i++) {
			     if(isset($_SESSION['datos_bosque']['anorestituir'.$i])){
						$insertaux=sprintf("select * from f_EspecieRestituir (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s);",
                                                                                            GetSQLValueString($_SESSION['datos_bosque']['anorestituir'.$i], "int"),
                                                                                            GetSQLValueString($_SESSION['datos_bosque']['idtiporestitucion'.$i], "int"),
                                                                                            GetSQLValueString($_SESSION['datos_bosque']['idespeciecomun'.$i], "int"),
                                                                                            GetSQLValueString(trim($_SESSION['idreg']), "int"),
                                                                                            GetSQLValueString($_SESSION['datos_bosque']['mesini'.$i], "int"),
                                                                                            GetSQLValueString($_SESSION['datos_bosque']['mesfin'.$i], "int"),
                                                                                            GetSQLValueString($_SESSION['datos_bosque']['suprestituir'.$i], "double"),
                                                                                            GetSQLValueString($_SESSION['datos_bosque']['cantplantin'.$i], "int"),
                                                                                            GetSQLValueString($_SESSION['datos_bosque']['idtipoesparcimiento'.$i], "int"),
                                                                                            GetSQLValueString($_SESSION['datos_bosque']['precioplantin'.$i], "double"),
                                                                                            GetSQLValueString($_SESSION['datos_bosque']['preciomo'.$i], "double"),
                                                                                            GetSQLValueString($_SESSION['datos_bosque']['preciomantenimiento'.$i], "double"),
                                                                                            GetSQLValueString($_SESSION['datos_bosque']['precioseguimiento'.$i], "double"),
                                                                                            GetSQLValueString($_SESSION['datos_bosque']['preciootrogastos'.$i], "double"),
                                                                                            GetSQLValueString($_SESSION['datos_bosque']['pretotalplantines'.$i], "double"));
						//echo $insertaux;
					$Result2 = pg_query($cn, $insertaux);
				}
			  }
			}
		$a="update registro set obsregistro='".$_SESSION['datos_bosque']['RObservacion']."' where idregistro=".$_SESSION['idreg'];
		//echo $a;
		$Result2 = pg_query($cn, $a);
		/************************ Verificando si no Existe Errores**********************/
		  if (!(isset($_SESSION['ErrorThrown']) && $_SESSION['ErrorThrown'] != ""))
			{
			/*	*/echo '<script>parent.document.location.href="Formulario001.php?aux=2&datosguardados=1";</script>';
				$BoletaPago="ok"; $_SESSION['BoletaPago']=$BoletaPago;

			}

	    ////////////fin Gabado de datos////////////////
       }
  }


}





?>
