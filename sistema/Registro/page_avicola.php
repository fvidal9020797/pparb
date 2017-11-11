<?php  

///////////mostrar la superficie total predio/////////////
if(!isset($_SESSION['datos_avicola']['Superficie'])){
	$sql_predio = "SELECT superficie FROM  v_parcela
				   WHERE  v_parcela.idregistro=".$_SESSION['idreg'];
	$predio = pg_query($cn,$sql_predio);
	$row_predio = pg_fetch_array ($predio);
	
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
	   $datos_avicola=$_POST;
	   $_SESSION['datos_avicola']=$datos_avicola; 
	 // $_SESSION['avicola0']-> ActualizarValores(0, 0, 0, 0, 1, 1, 2, 3, 4, 5, 6);
	 $_SESSION['avicola0']-> ActualizarValores(0, $_SESSION['datos_avicola']['supcultivo0'], $_SESSION['datos_avicola']['supinfraestuctura'],$_SESSION['datos_avicola']['RegSanitario0'], $_SESSION['datos_avicola']['eclosionpesadas0'], $_SESSION['datos_avicola']['eclosionlivianas0'], $_SESSION['datos_avicola']['mortalidadparrillero0'], $_SESSION['datos_avicola']['posturaponedoras0'], $_SESSION['datos_avicola']['cantpolloventa0'], $_SESSION['datos_avicola']['canthuevoventa0'], $_SESSION['datos_avicola']['cantpollobbventa0']);
	  
         
             /// obteniendo periodo del predio
	$sql_fechas = "select r.idregistro, fecharegistro, fechasuscripcion
					from registro as r full join fechasregistro as fr on r.idregistro = fr.idregistro
					where r.idregistro =".$_SESSION['idreg'];
	$resultSuscripcion = pg_query($cn,$sql_fechas) ;
	$row_Suscripcion = pg_fetch_array ($resultSuscripcion);
	$fechasuscripcion = $row_Suscripcion['fechasuscripcion'];
	$periodo1_time = date($today="2015-09-29");

	$periodo=2;
	if ($fechasuscripcion!="") {
	$predio_time = Date('Y-m-d', strtotime($fechasuscripcion));
	if($periodo1_time > $predio_time){
		$periodo=1;
	}
	}
        
	   $anoperdos = 3;
          //   trigger_error (" AÑO PERIODO= ".$periodo, E_USER_ERROR);	
	  for ($i = 1; $i <=5 ; $i++) { 
                 if ($periodo == 1)
                {                 
                  $ano = $i;
                }
                elseif ($periodo == 2)
                {                 
                  $ano = $anoperdos;
                }

	       //$_SESSION['avicola'.$i]-> ActualizarValores($i, 0, 0,$_SESSION['datos_avicola']['RegSanitario'.$i], $_SESSION['datos_avicola']['eclosionpesadas'.$i], $_SESSION['datos_avicola']['eclosionlivianas'.$i], $_SESSION['datos_avicola']['mortalidadparrillero'.$i], $_SESSION['datos_avicola']['posturaponedoras'.$i], $_SESSION['datos_avicola']['cantpolloventa'.$i], $_SESSION['datos_avicola']['canthuevoventa'.$i], $_SESSION['datos_avicola']['cantpollobbventa'.$i]);
                $_SESSION['avicola'.$i]-> ActualizarValores($ano, 0, 0,$_SESSION['datos_avicola']['RegSanitario'.$i], $_SESSION['datos_avicola']['eclosionpesadas'.$i], $_SESSION['datos_avicola']['eclosionlivianas'.$i], $_SESSION['datos_avicola']['mortalidadparrillero'.$i], $_SESSION['datos_avicola']['posturaponedoras'.$i], $_SESSION['datos_avicola']['cantpolloventa'.$i], $_SESSION['datos_avicola']['canthuevoventa'.$i], $_SESSION['datos_avicola']['cantpollobbventa'.$i]);
		
                $anoperdos = $anoperdos + 1;
                }
	   
	   ///validando datos
	    if($_SESSION['datos_avicola']['SupActAgri']=="")	{$_SESSION['datos_avicola']['SupActAgri']=0;}   
		if($_SESSION['datos_avicola']['SupActbar']=="")	{$_SESSION['datos_avicola']['SupActbar']=0;}   
		if($_SESSION['datos_avicola']['SupActDes']=="")	{$_SESSION['datos_avicola']['SupActDes']=0;}    
		if($_SESSION['datos_avicola']['SupActGan']=="")	{$_SESSION['datos_avicola']['SupActGan']=0;} 
			
       ////////////////////////mensajes de error////////////////////////////// 
	   if(round($_SESSION['datos_avicola']['SupProdAli'],4)> $_SESSION['datos_avicola']['supdefilegal']){
	  		 $supcomparar=round($_SESSION['datos_avicola']['SupProdAli'],4);
	   }else{
			$supcomparar=round($_SESSION['datos_avicola']['supdefilegal'],4);
	   }
		
		 if( round(floatval($_SESSION['datos_avicola']['SupProdAli']),4)>round($supcomparar,4)){ 
	      trigger_error (" La Sumatoria de Sup. de Uso ACTUAL en Area Deforestada ilegal no debe ser mayor a la Sup. Deforestada Ilegal ", E_USER_ERROR);	
         }elseif($_POST['submit']=='Guardar'){  
			//guardar superficies Predio fuera de Area deforestada Ilegal  $_SESSION['datos_avicola']['']
			 $insertaux=sprintf("select * from f_alimentos(%s, %s, %s, %s, %s, %s);",
			 						GetSQLValueString($_SESSION['idreg'], "int"),
									GetSQLValueString($_SESSION['datos_avicola']['SupActAgri'], "double"),
									GetSQLValueString($_SESSION['datos_avicola']['SupActGan'], "double"),
									GetSQLValueString($_SESSION['datos_avicola']['SupActbar'], "double"),
									GetSQLValueString($_SESSION['datos_avicola']['SupActDes'], "double"),
									0);
			 $Result2 = pg_query($cn, $insertaux);
				//echo $insertaux;
			//guardar compromisos
			
			for ($i = 0; $i <=5 ; $i++) {
				$_SESSION['avicola'.$i]->Grabar($cn,$i);
			}
			////sistema de Produccion Ganadera
			$sql_SistProduccion = "Select idcodificadores From codificadores Where idclasificador=29 Order by idcodificadores";
			$SistProduccion = pg_query($cn,$sql_SistProduccion) ;
			$row_SistProduccion = pg_fetch_array ($SistProduccion);
			 
			 do{
				$i=$row_SistProduccion['idcodificadores'];
			   if(isset($_SESSION['datos_avicola']['chk'.$i])){
					 $insertaux=sprintf("select * from f_sistemaproduccion (%s, %s, %s, %s);",
															 GetSQLValueString(trim($_SESSION['idreg']), "int"),
															 GetSQLValueString($i, "int"),//idtipodoc
															 GetSQLValueString($_SESSION['datos_avicola']['TxtSist'.$i], "int"),1); //observaciones
				}else{
					 $insertaux=sprintf("select * from f_sistemaproduccion (%s, %s, %s, %s);",
															 GetSQLValueString(trim($_SESSION['idreg']), "int"),
															 GetSQLValueString($i, "int"),//idtipodoc
															 GetSQLValueString(0, "int"),0); //observaciones
				
				}
				//echo $insertaux;
				$Result2 = pg_query($cn, $insertaux);
			  }while ($row_SistProduccion = pg_fetch_assoc($SistProduccion));
					  
					  	
			 
			 $a="update registro set obsregistro='".$_SESSION['datos_avicola']['RObservacion']."' where idregistro=".$_SESSION['idreg'];
			$Result2 = pg_query($cn, $a);
			 
		    	 ////si no hay error guardar
		  /**/if (!(isset($_SESSION['ErrorThrown']) && $_SESSION['ErrorThrown'] != ""))  
			{  echo '<script>parent.document.location.href="Formulario001.php?aux=7&datosguardados=ok";</script>';
		    } 
	   }//if post
}else{
 if(!isset($_SESSION['datos_avicola'])){ 
   // $vector_avicola = array();
     
    
	 $avicola0 = new Avicola(); 
	 $avicola1 = new Avicola();
	 $avicola2 = new Avicola();
	 $avicola3 = new Avicola();
	 $avicola4 = new Avicola();
	 $avicola5 = new Avicola();
	 
	 $avicola0 -> CargarAvicola($cn, $_SESSION['idreg'],0); 
	 $avicola1 -> CargarAvicola($cn, $_SESSION['idreg'],1); 
	 $avicola2 -> CargarAvicola($cn, $_SESSION['idreg'],2); 
	 $avicola3 -> CargarAvicola($cn, $_SESSION['idreg'],3); 
	 $avicola4 -> CargarAvicola($cn, $_SESSION['idreg'],4); 
	 $avicola5 -> CargarAvicola($cn, $_SESSION['idreg'],5); 
		
	$_SESSION['avicola0']=$avicola0;
	$_SESSION['avicola1']=$avicola1;
	$_SESSION['avicola2']=$avicola2;
	$_SESSION['avicola3']=$avicola3;
	$_SESSION['avicola4']=$avicola4;
	$_SESSION['avicola5']=$avicola5;
	

	//$_SESSION['$vector_avicola']=$vector_avicola;
	
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