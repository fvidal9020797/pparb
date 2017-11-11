<?php  

///////////mostrar la superficie total predio/////////////
if(!isset($_SESSION['datos_porcina']['Superficie'])){
	$sql_predio = "SELECT superficie FROM  v_parcela
				   WHERE  v_parcela.idregistro=".$_SESSION['idreg'];
	$predio = pg_query($cn,$sql_predio);
	$row_predio = pg_fetch_array ($predio);
	
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
	   $datos_=$_POST;
	   $_SESSION['datos_porcina']=$datos_; 
	  
	   
	   $_SESSION['porcina0']-> ActualizarValores(0, $_SESSION['datos_porcina']['supcultivo0'], $_SESSION['datos_porcina']['supinfraestuctura0'],$_SESSION['datos_porcina']['corralapareamiento0'], $_SESSION['datos_porcina']['corralgestacion0'], $_SESSION['datos_porcina']['corralmaternidad0'], $_SESSION['datos_porcina']['corraldestete0'], $_SESSION['datos_porcina']['corralcrecimiento0'], $_SESSION['datos_porcina']['RegSanitario0'], $_SESSION['datos_porcina']['vientresp0'], $_SESSION['datos_porcina']['capacidadp0'], $_SESSION['datos_porcina']['lechonesvientre0'], $_SESSION['datos_porcina']['cerdosventavientre0'], $_SESSION['datos_porcina']['pesopromedioventa0'], $_SESSION['datos_porcina']['prodcarnep0']);
	  
	   
	  for ($i = 1; $i <=5 ; $i++) { 
	       $_SESSION['porcina'.$i]-> ActualizarValores($i, 0, 0,$_SESSION['datos_porcina']['corralapareamiento'.$i], $_SESSION['datos_porcina']['corralgestacion'.$i], $_SESSION['datos_porcina']['corralmaternidad'.$i], $_SESSION['datos_porcina']['corraldestete'.$i], $_SESSION['datos_porcina']['corralcrecimiento'.$i], $_SESSION['datos_porcina']['RegSanitario'.$i], 0, $_SESSION['datos_porcina']['capacidadp'.$i], $_SESSION['datos_porcina']['lechonesvientre'.$i], $_SESSION['datos_porcina']['cerdosventavientre'.$i], 0, $_SESSION['datos_porcina']['prodcarnep'.$i]);
		}
	   
	   ///validando datos
	    if($_SESSION['datos_porcina']['SupActAgri']=="")	{$_SESSION['datos_porcina']['SupActAgri']=0;}   
		if($_SESSION['datos_porcina']['SupActbar']=="")	{$_SESSION['datos_porcina']['SupActbar']=0;}   
		if($_SESSION['datos_porcina']['SupActDes']=="")	{$_SESSION['datos_porcina']['SupActDes']=0;}    
		if($_SESSION['datos_porcina']['SupActGan']=="")	{$_SESSION['datos_porcina']['SupActGan']=0;} 
			
       ////////////////////////mensajes de error////////////////////////////// 
	   if(round($_SESSION['datos_porcina']['SupProdAli'],4)> $_SESSION['datos_porcina']['supdefilegal']){
	  		 $supcomparar=round($_SESSION['datos_porcina']['SupProdAli'],4);
	   }else{
			$supcomparar=round($_SESSION['datos_porcina']['supdefilegal'],4);
	   }
		
		 if( round(floatval($_SESSION['datos_porcina']['SupProdAli']),4)>round($supcomparar,4)){ 
	      trigger_error (" La Sumatoria de Sup. de Uso ACTUAL en Area Deforestada ilegal no debe ser mayor a la Sup. Deforestada Ilegal ", E_USER_ERROR);	
         }elseif($_POST['submit']=='Guardar'){  
			//guardar superficies Predio fuera de Area deforestada Ilegal  $_SESSION['datos_porcina']['']
			 $insertaux=sprintf("select * from f_alimentos(%s, %s, %s, %s, %s, %s);",
			 						GetSQLValueString($_SESSION['idreg'], "int"),
									GetSQLValueString($_SESSION['datos_porcina']['SupActAgri'], "double"),
									GetSQLValueString($_SESSION['datos_porcina']['SupActGan'], "double"),
									GetSQLValueString($_SESSION['datos_porcina']['SupActbar'], "double"),
									GetSQLValueString($_SESSION['datos_porcina']['SupActDes'], "double"),
									0);
			 $Result2 = pg_query($cn, $insertaux);
				//echo $insertaux;
			//guardar compromisos
			
			for ($i = 0; $i <=5 ; $i++) {
				$_SESSION['porcina'.$i]->Grabar($cn,$i);
			}
			////sistema de Produccion Ganadera
			$sql_SistProduccion = "Select idcodificadores From codificadores Where (idclasificador=30 or idclasificador=31) Order by idcodificadores";
			$SistProduccion = pg_query($cn,$sql_SistProduccion) ;
			$row_SistProduccion = pg_fetch_array ($SistProduccion);
			 
			 do{
				$i=$row_SistProduccion['idcodificadores'];
			   if(isset($_SESSION['datos_porcina']['chk'.$i])){
					 $insertaux=sprintf("select * from f_sistemaproduccion (%s, %s, %s, %s);",
															 GetSQLValueString(trim($_SESSION['idreg']), "int"),
															 GetSQLValueString($i, "int"),//idtipodoc
															 GetSQLValueString($_SESSION['datos_porcina']['TxtSist'.$i], "int"),1); //observaciones
				}else{
					 $insertaux=sprintf("select * from f_sistemaproduccion (%s, %s, %s, %s);",
															 GetSQLValueString(trim($_SESSION['idreg']), "int"),
															 GetSQLValueString($i, "int"),//idtipodoc
															 GetSQLValueString(0, "int"),0); //observaciones
				
				}
				//echo $insertaux;
				$Result2 = pg_query($cn, $insertaux);
			  }while ($row_SistProduccion = pg_fetch_assoc($SistProduccion));
					  
					  	
			 
			 $a="update registro set obsregistro='".$_SESSION['datos_porcina']['RObservacion']."' where idregistro=".$_SESSION['idreg'];
			$Result2 = pg_query($cn, $a);
			 
		    	 ////si no hay error guardar
		  /**/if (!(isset($_SESSION['ErrorThrown']) && $_SESSION['ErrorThrown'] != ""))  
			{  echo '<script>parent.document.location.href="Formulario001.php?aux=8&datosguardados=ok";</script>';
		    } 
	   }//if post
}else{
 if(!isset($_SESSION['datos_porcina'])){ 
   // $vector_porcina = array();
	 $porcina0 = new Porcina(); 
	 $porcina1 = new Porcina();
	 $porcina2 = new Porcina();
	 $porcina3 = new Porcina();
	 $porcina4 = new Porcina();
	 $porcina5 = new Porcina();
	 
	 $porcina0 -> CargarPorcina($cn, $_SESSION['idreg'],0); 
	 $porcina1 -> CargarPorcina($cn, $_SESSION['idreg'],1); 
	 $porcina2 -> CargarPorcina($cn, $_SESSION['idreg'],2); 
	 $porcina3 -> CargarPorcina($cn, $_SESSION['idreg'],3); 
	 $porcina4 -> CargarPorcina($cn, $_SESSION['idreg'],4); 
	 $porcina5 -> CargarPorcina($cn, $_SESSION['idreg'],5); 
		
	$_SESSION['porcina0']=$porcina0;
	$_SESSION['porcina1']=$porcina1;
	$_SESSION['porcina2']=$porcina2;
	$_SESSION['porcina3']=$porcina3;
	$_SESSION['porcina4']=$porcina4;
	$_SESSION['porcina5']=$porcina5;
	

	//$_SESSION['$vector_porcina']=$vector_porcina;
	
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
	
	 if(!isset($_SESSION['nombre_predio'])){
		$sql_predio = "SELECT parcelas.nombre,parcelas.superficie, codificadores.nombrecodificador FROM parcelas, registro, codificadores
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