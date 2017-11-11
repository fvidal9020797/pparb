<?php
///............. consultas varias......................../////////////////////////
	$sql_cultivo0 = "select * FROM cultivo as c Order by nombrecultivo";
	$cultivo0 = pg_query($cn,$sql_cultivo0) ;
	$row_cultivo0 = pg_fetch_array ($cultivo0);
	$totalRows_cultivo0 = pg_num_rows($cultivo0);

	
	$sql_agricola = "SELECT codificadores.nombrecodificador, parcelas.nombre
					FROM  codificadores, parcelas, registro
					WHERE codificadores.idcodificadores = parcelas.idclasificacion and codificadores.nombrecodificador='Agricola' and parcelas.idparcela = registro.idparcela and idregistro=".$_SESSION['idreg'];
					
	$agricola = pg_query($cn,$sql_agricola) ;
	//$row_agricola = pg_fetch_array ($agricola);
	$totalRows_agricola = pg_num_rows($agricola);
	
	///////////mostrar la superficie total predio/////////////
    if(!isset($_SESSION['datos_bosque']['Superficie'])){
	    $sql_predio = "SELECT superficie FROM  v_parcela
					   WHERE  v_parcela.idregistro=".$_SESSION['idreg'];
		$predio = pg_query($cn,$sql_predio);
		$row_predio = pg_fetch_array ($predio);
	}
	if(!isset($_SESSION['nombre_predio'])){
	    $sql_predio = "SELECT parcelas.nombre,parcelas.superficie, codificadores.nombrecodificador FROM  parcelas, registro, codificadores
		WHERE   parcelas.idtipoprop = codificadores.idcodificadores AND  registro.idparcela = parcelas.idparcela  and  registro.idregistro=".$_SESSION['idreg'];
		$predio = pg_query($cn,$sql_predio);
		$row_predio = pg_fetch_array ($predio);
		$_SESSION['nombre_predio']=$row_predio['nombre'];
	 }
	
	
	
//+++++++++++++ validaciones +++++++++++++++++++++++++++++++
/**********************************************************/

if(isset($_POST['SupActAgri']) && ($_SESSION['Actividad']=="Agricola" || $_SESSION['Actividad']=="Mixta Agropecuaria"|| $_SESSION['Actividad']=="Agricola-Avicola" || $_SESSION['Actividad']=="Agricola-Porcina")) 	
{  $datos_agricola=$_POST; 
  $_SESSION['datos_agricola']=$datos_agricola; 
    
  //validaciones superficies alimentos
  if($_SESSION['datos_agricola']['SupActAgri']==""){$_SESSION['datos_agricola']['SupActAgri']=0;}   
  if($_SESSION['datos_agricola']['SupActbar']==""){$_SESSION['datos_agricola']['SupActbar']=0; }   
  if($_SESSION['datos_agricola']['SupActDes']==""){$_SESSION['datos_agricola']['SupActDes']=0; }    
  if($_SESSION['datos_agricola']['SupActGan']==""){$_SESSION['datos_agricola']['SupActGan']=0; }  
  $_SESSION['datos_agricola']['Sup0TotVer']=0; 
  $_SESSION['datos_agricola']['Sup0TotInv']=0;
 /* $_SESSION['datos_agricola']['SupTotVer1']=$_SESSION['datos_agricola']['SupTotVer2']=$_SESSION['datos_agricola']['SupTotVer3']=$_SESSION['datos_agricola']['SupTotVer4']=$_SESSION['datos_agricola']['SupTotVer5']=0;
  $_SESSION['datos_agricola']['SupTotInv1']=$_SESSION['datos_agricola']['SupTotInv2']=$_SESSION['datos_agricola']['SupTotInv3']=$_SESSION['datos_agricola']['SupTotInv4']=$_SESSION['datos_agricola']['SupTotInv5']=0;*/
  
  $prodali=$_SESSION['datos_agricola']['SupActAgri']+$_SESSION['datos_agricola']['SupActbar']+$_SESSION['datos_agricola']['SupActDes']+$_SESSION['datos_agricola']['SupActGan'];
  $cultInicial=0; //verifica si no se ha seeccionado un cultivo si es 0 si se selecciono si es 1 hay al menos un registro q esta sin seleccionar cultivo
  $valorInicial=0; //verifica si se selecciono un cultivo pero no se coloco superficie
  $cultCompromiso=0; //verifica si no se ha seeccionado un cultivo
  $valorCompromiso=0; //verifica si se selecciono un cultivo pero no se coloco superficie
   // +++++++validando datos de cultivo inicial++++++++++++++++++++++
       
	   if($_SESSION['datos_agricola']['num_cul0']>0){
		  for ($i = 1; $i <=$_SESSION['datos_agricola']['num_cul0'] ; $i++) { 
			if(isset($_SESSION['datos_agricola']['cultivo0'.$i])){  //si existe fila
				 if($_SESSION['datos_agricola']['cultivo0'.$i]>0){ // existe registro de cultivo
					if(trim($_SESSION['datos_agricola']['SupVerano0'.$i])==""){$_SESSION['datos_agricola']['SupVerano0'.$i]=0;}   
					if(trim($_SESSION['datos_agricola']['SupInvierno0'.$i])==""){$_SESSION['datos_agricola']['SupInvierno0'.$i]=0;}   
					if( $_SESSION['datos_agricola']['SupVerano0'.$i]==0 && $_SESSION['datos_agricola']['SupInvierno0'.$i]==0){$valorInicial=1;}
					 $_SESSION['datos_agricola']['Sup0TotVer']=$_SESSION['datos_agricola']['Sup0TotVer']+$_SESSION['datos_agricola']['SupVerano0'.$i];
					 $_SESSION['datos_agricola']['Sup0TotInv']=$_SESSION['datos_agricola']['Sup0TotInv']+$_SESSION['datos_agricola']['SupInvierno0'.$i];
				  }elseif($_SESSION['datos_agricola']['cultivo0'.$i]==0){$cultInicial=1; } 
				  
			  }
		   }
		}
	//++++++++++n validando datos de compromiso 5 años

	   if($_SESSION['datos_agricola']['num_cul']>0){
	     
		  for ($i = 1; $i <=$_SESSION['datos_agricola']['num_cul'] ; $i++) { 
		    if(isset($_SESSION['datos_agricola']['cultivo'.$i])){
				if($_SESSION['datos_agricola']['cultivo'.$i]>0){ 
					 if( $_SESSION['datos_agricola']['SupVerano1'.$i]==0 && $_SESSION['datos_agricola']['SupInvierno1'.$i]==0 && $_SESSION['datos_agricola']['SupVerano2'.$i]==0 && $_SESSION['datos_agricola']['SupInvierno2'.$i]==0 && $_SESSION['datos_agricola']['SupVerano3'.$i]==0 && $_SESSION['datos_agricola']['SupInvierno3'.$i]==0 && $_SESSION['datos_agricola']['SupVerano4'.$i]==0 && $_SESSION['datos_agricola']['SupInvierno4'.$i]==0 && $_SESSION['datos_agricola']['SupVerano5'.$i]==0 && $_SESSION['datos_agricola']['SupInvierno5'.$i]==0){$valorCompromiso=1;}
					 
				  }elseif($_SESSION['datos_agricola']['cultivo'.$i]==0){$cultCompromiso=1;}
					
			  }
		   }//for
		} //if
		
    //////////////fin validacion compromiso	
	$supcomparar=0;
   ////////////////////////mensajes de error////////////////////////////// 
   if(round($_SESSION['datos_agricola']['SupProdAli'],4)> $_SESSION['datos_agricola']['supdefilegal']){
	   $supcomparar=round($_SESSION['datos_agricola']['SupProdAli'],4);
   }else{
        $supcomparar=round($_SESSION['datos_agricola']['supdefilegal'],4);
   }
   
   if( round($prodali,4)>round($supcomparar,4)){ 
		  trigger_error ("La Sumatoria de Sup. de Uso ACTUAL en Area Deforestada ilegal no debe ser mayor a la Sup. Deforestada Ilegal", E_USER_ERROR);	
   }elseif($cultInicial==1 ){ 
		trigger_error ("Debe seleccionar un tipo de Cultivo en Situacion Actual Agricola", E_USER_ERROR);	
   }elseif($valorInicial==1 ){ 
		trigger_error ("Debe Colocar una superficie en la campana de verano o invierno en Situacion Actual Agricola", E_USER_ERROR);	
   }elseif($_SESSION['datos_agricola']['Sup0TotVer']> round($supcomparar,4)){ 
   trigger_error ("El total de la superficie declarada en Situacion Actual agricola campana de Verano no puede ser mayor a la superficie de Produccion de Alimentos", E_USER_ERROR);	
   }elseif( $_SESSION['datos_agricola']['Sup0TotInv']> round($supcomparar,4)){ 
	trigger_error ("El total de la superficie declarada en Situacion Actual agricola campana de Invierno no puede ser mayor a la superficie de Produccion de Alimentos", E_USER_ERROR);	
   
   }elseif($_SESSION['datos_agricola']['num_cul']==0 ){ 
	trigger_error ("Debe Introducir al menos un cultivo en el Plan de Produccion Agricola para cinco años", E_USER_ERROR);	
   }elseif($valorCompromiso==1 ){ 
	trigger_error ("Debe Colocar una superficie en la campana de verano o invierno en el Plan de Produccion Agricola", E_USER_ERROR);	
    
   }elseif($cultCompromiso==1 ){ 
	trigger_error ("Debe seleccionar un tipo de Cultivo en el Plan de Produccion Agricola", E_USER_ERROR);	
	 }elseif(floatval($_SESSION['datos_agricola']['SupTotVer1'])> floatval($_SESSION['datos_agricola']['SupProdAli'])){ 
   trigger_error ($_SESSION['datos_agricola']['SupTotVer1']."El total de la superficie agricola campana de Verano en el primer año no puede ser mayor a la superficie de Produccion de Alimentos".$_SESSION['datos_agricola']['SupProdAli'], E_USER_ERROR);	
    }elseif($_SESSION['datos_agricola']['SupTotInv1']> $_SESSION['datos_agricola']['SupProdAli']){ 
	trigger_error ("El total de la superficie agricola campana de Invierno en el primer año no puede ser mayor a la superficie de Produccion de Alimentos", E_USER_ERROR);	
     
	 }elseif( $_SESSION['datos_agricola']['SupTotVer2']> $_SESSION['datos_agricola']['SupProdAli']){ 
   trigger_error ("El total de la superficie agricola campana de Verano en el Segundo año no puede ser mayor a la superficie de Produccion de Alimentos", E_USER_ERROR);	
    }elseif( $_SESSION['datos_agricola']['SupTotInv2']> $_SESSION['datos_agricola']['SupProdAli']){ 
	trigger_error ("El total de la superficie agricola campana de Invierno en el Segundo año no puede ser mayor a la superficie de Produccion de Alimentos", E_USER_ERROR);	
     
	 }elseif( $_SESSION['datos_agricola']['SupTotVer3']> $_SESSION['datos_agricola']['SupProdAli']){ 
   trigger_error ("El total de la superficie agricola campana de Verano en el tercer año no puede ser mayor a la superficie de Produccion de Alimentos", E_USER_ERROR);	
    }elseif( $_SESSION['datos_agricola']['SupTotInv3']> $_SESSION['datos_agricola']['SupProdAli']){ 
	trigger_error ("El total de la superficie agricola campana de Invierno en el tercer año no puede ser mayor a la superficie de Produccion de Alimentos", E_USER_ERROR);	
     
	 }elseif( $_SESSION['datos_agricola']['SupTotVer4']> $_SESSION['datos_agricola']['SupProdAli']){ 
   trigger_error ("El total de la superficie agricola campana de Verano en el cuarto año no puede ser mayor a la superficie de Produccion de Alimentos", E_USER_ERROR);	
    }elseif( $_SESSION['datos_agricola']['SupTotInv4']> $_SESSION['datos_agricola']['SupProdAli']){ 
	trigger_error ("El total de la superficie agricola campana de Invierno en el cuarto año no puede ser mayor a la superficie de Produccion de Alimentos", E_USER_ERROR);	
     
	 }elseif( $_SESSION['datos_agricola']['SupTotVer5']> $_SESSION['datos_agricola']['SupProdAli']){ 
   trigger_error ("El total de la superficie agricola campana de Verano en el quinto año no puede ser mayor a la superficie de Produccion de Alimentos", E_USER_ERROR);	
    }elseif( $_SESSION['datos_agricola']['SupTotInv5']> $_SESSION['datos_agricola']['SupProdAli']){ 
	trigger_error ("El total de la superficie agricola campana de Invierno en el quinto año no puede ser mayor a la superficie de Produccion de Alimentos", E_USER_ERROR);	
    ////////////////////////////////////////////////////////////////////
		/////************************************************************///
		////////////////////////////////////////////////////////////////////
    ////////////////////no existe error registramos////////////////////////////////////////
	}elseif($_POST['submit']=='Guardar'){
	    pg_query($cn,"delete from auxiliar where registro=".$_SESSION['idreg']);
		
	    //GUARDAMOS LA SUPERFICIES ALIMENTOS 
	    $aux=$_SESSION['datos_agricola']['SupActAgri'].','.$_SESSION['datos_agricola']['SupActGan'].','.$_SESSION['datos_agricola']['SupActbar'].','.$_SESSION['datos_agricola']['SupActDes'].',0';
		$insertaux=sprintf("insert into auxiliar values(%s, %s, %s);",
									 GetSQLValueString($_SESSION['idreg'], "int"),
									 GetSQLValueString("superficiealimentos", "text"),
									 GetSQLValueString($aux,"text"));
			//echo $insertaux;						
		$Result2 = pg_query($cn, $insertaux);
        ///GUARDAMOS LOS DATOS AGRICOLAS
	    if($_SESSION['datos_agricola']['num_cul0']>0 && $_SESSION['datos_agricola']['num_cul']>0){ 
		   /////////// llenando agricolasituacion actual///////////////////
		 //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++/
		for ($i = 1; $i <=$_SESSION['datos_agricola']['num_cul0'] ; $i++) {
			
				 if(isset($_SESSION['datos_agricola']['cultivo0'.$i])&& $_SESSION['datos_agricola']['cultivo0'.$i]>0){
					 if($_SESSION['datos_agricola']['cultivo0'.$i]!=0){
						$insertaux=sprintf("insert into auxiliar values(%s, %s, %s);",
											 GetSQLValueString($_SESSION['idreg'], "int"),
											 GetSQLValueString("plancultivo", "text"),
											 GetSQLValueString('0,'.$_SESSION['datos_agricola']['cultivo0'.$i].','.$_SESSION['idreg'].','.$_SESSION['datos_agricola']['SupVerano0'.$i].','.$_SESSION['datos_agricola']['SupInvierno0'.$i], "text"));
				$Result2 = pg_query($cn, $insertaux);
					 }
				  }
		 
			}
		  //////////////llenado del plan 5 años//////////////////////////////
		  //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++/
		    for ($i = 1; $i <=$_SESSION['datos_agricola']['num_cul'] ; $i++) {
			if(isset($_SESSION['datos_agricola']['cultivo'.$i])&& $_SESSION['datos_agricola']['cultivo'.$i]>0){
				if($_SESSION['datos_agricola']['cultivo'.$i]!=0){
				  $insertaux=sprintf("insert into auxiliar values(%s, %s, %s);",
										 GetSQLValueString($_SESSION['idreg'], "int"),
										 GetSQLValueString("plancultivo", "text"),
										 GetSQLValueString('1,'.GetSQLValueString($_SESSION['datos_agricola']['cultivo'.$i],"int").','.$_SESSION['idreg'].','.  $_SESSION['datos_agricola']['SupVerano1'.$i].','.$_SESSION['datos_agricola']['SupInvierno1'.$i], "text"));
			$Result2 = pg_query($cn, $insertaux);
				   $insertaux=sprintf("insert into auxiliar values(%s, %s, %s);",
										 GetSQLValueString($_SESSION['idreg'], "int"),
										 GetSQLValueString("plancultivo", "text"),
										 GetSQLValueString('2,'.GetSQLValueString($_SESSION['datos_agricola']['cultivo'.$i],"int").','.$_SESSION['idreg'].','. $_SESSION['datos_agricola']['SupVerano2'.$i].','. $_SESSION['datos_agricola']['SupInvierno2'.$i], "text"));
			$Result2 = pg_query($cn, $insertaux);
			 $insertaux=sprintf("insert into auxiliar values(%s, %s, %s);",
										 GetSQLValueString($_SESSION['idreg'], "int"),
										 GetSQLValueString("plancultivo", "text"),
										 GetSQLValueString('3,'.GetSQLValueString($_SESSION['datos_agricola']['cultivo'.$i],"int").','.$_SESSION['idreg'].','.  $_SESSION['datos_agricola']['SupVerano3'.$i].','. $_SESSION['datos_agricola']['SupInvierno3'.$i], "text"));
			$Result2 = pg_query($cn, $insertaux);
					$insertaux=sprintf("insert into auxiliar values(%s, %s, %s);",
										 GetSQLValueString($_SESSION['idreg'], "int"),
										 GetSQLValueString("plancultivo", "text"),
										 GetSQLValueString('4,'.GetSQLValueString($_SESSION['datos_agricola']['cultivo'.$i],"int").','.$_SESSION['idreg'].','. $_SESSION['datos_agricola']['SupVerano4'.$i].','. $_SESSION['datos_agricola']['SupInvierno4'.$i], "text"));
			$Result2 = pg_query($cn, $insertaux);
					$insertaux=sprintf("insert into auxiliar values(%s, %s, %s);",
										 GetSQLValueString($_SESSION['idreg'], "int"),
										 GetSQLValueString("plancultivo", "text"),
										 GetSQLValueString('5,'.GetSQLValueString($_SESSION['datos_agricola']['cultivo'.$i],"int").','.$_SESSION['idreg'].','. $_SESSION['datos_agricola']['SupVerano5'.$i].','. $_SESSION['datos_agricola']['SupInvierno5'.$i], "text"));
			$Result2 = pg_query($cn, $insertaux);
				 }
				}	
			 } //for
			///////////////************fin*******************/////////
			
    	$a="update registro set obsregistro='".$_SESSION['datos_agricola']['RObservacion']."' where idregistro=".$_SESSION['idreg'];
		//echo $a;
		$Result2 = pg_query($cn, $a);
		
		} ///if guardar datos agricolas
	  ////si no hay error guardar
		if (!(isset($_SESSION['ErrorThrown']) && $_SESSION['ErrorThrown'] != ""))  
			{  $insertUSR2=sprintf("select * from f_agricola (%s);",
										 GetSQLValueString($_SESSION['idreg'], "int"));
			   $Result2 = pg_query($cn, $insertUSR2);
			   $result=pg_query($cn,"delete from auxiliar where registro=".$_SESSION['idreg']);
			   echo '<script>parent.document.location.href="Formulario001.php?aux=3&datosguardados=ok";</script>';
		    } 
     }	// else de guardar
}//Validacion
//sino hay datos guardados
if(!isset($_SESSION['datos_agricola'])){

	$sql_supali = "select supagricola,supganadera, supbarbecho,supdescanso  FROM superficiealimentos where idregistro=".$_SESSION['idreg'];
	$supali = pg_query($cn,$sql_supali);
	$row_supali = pg_fetch_array ($supali);
	
	$sql_culinicial = "select * FROM plancultivo where anocultivo=0 and idregistro=".$_SESSION['idreg'];
	$culinicial = pg_query($cn,$sql_culinicial);
	$row_culinicial = pg_fetch_array ($culinicial);
	$num_culinicial=pg_num_rows($culinicial);
      
        
	
	$sql_culfinal = "SELECT  p1.supverano AS supverano1,  p1.supinvierno AS supinvierno1, p2.supverano AS supverano2,  p2.supinvierno AS supinvierno2, 
							 p3.supverano AS supverano3,  p3.supinvierno AS supinvierno3, p4.supverano AS supverano4,  p4.supinvierno AS supinvierno4, 
							 p5.supverano AS supverano5,  p5.supinvierno AS supinvierno5, p1.idcultivo
						FROM plancultivo p1, plancultivo p2,  plancultivo p5,  plancultivo p4, plancultivo p3
						WHERE p1.idregistro = p2.idregistro AND  p1.idcultivo = p2.idcultivo AND p2.idcultivo = p3.idcultivo AND  p2.idregistro = p3.idregistro 
						  AND p4.idcultivo = p5.idcultivo AND p4.idregistro = p5.idregistro AND p3.idcultivo = p4.idcultivo AND p3.idregistro = p4.idregistro
						  AND  p3.anocultivo = 3 AND  p1.anocultivo = 1 AND p2.anocultivo = 2 AND  p4.anocultivo = 4 AND p5.anocultivo = 5 							  AND p3.idregistro=".$_SESSION['idreg'];
	$culfinal = pg_query($cn,$sql_culfinal);
	$row_culfinal = pg_fetch_array ($culfinal);
	$num_culfinal=pg_num_rows($culfinal);

}

//print_r($_SESSION);

    $sql_supali = "select *  FROM superficiealimentos where idregistro=".$_SESSION['idreg'];
	$supali = pg_query($cn,$sql_supali);
	$row_supali = pg_fetch_array ($supali);
	
	$sql_obser = "SELECT obsregistro FROM  registro
			   WHERE  registro.idregistro=".$_SESSION['idreg'];
	$obser = pg_query($cn,$sql_obser);
	$row_obser = pg_fetch_array ($obser);
	
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
	

?>