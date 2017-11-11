 <?php
///////////mostrar la superficie total predio/////////////
    //if(!isset($_SESSION['datos_ganaderoL']['Superficie'])){
	    $sql_predio = "SELECT superficie FROM  v_parcela
					   WHERE  v_parcela.idregistro=".$_SESSION['idreg'];
		$predio = pg_query($cn,$sql_predio);
		$row_predio = pg_fetch_array ($predio);
	//}


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
	   $datos_ganaderoL=$_POST;
	   $_SESSION['datos_ganaderoL']=$datos_ganaderoL;
	    if($_SESSION['datos_ganaderoL']['SupActAgri']==""){$_SESSION['datos_ganaderoL']['SupActAgri']=0;}   
		if($_SESSION['datos_ganaderoL']['SupActbar']==""){$_SESSION['datos_ganaderoL']['SupActbar']=0; }   
		if($_SESSION['datos_ganaderoL']['SupActDes']==""){$_SESSION['datos_ganaderoL']['SupActDes']=0; }    
		if($_SESSION['datos_ganaderoL']['SupActGan']==""){$_SESSION['datos_ganaderoL']['SupActGan']=0; } 
		if($_SESSION['datos_ganaderoL']['SupGanLegal']==""){$_SESSION['datos_ganaderoL']['SupGanLegal']=0; } 
        $_SESSION['datos_ganaderoL']['CantGanDef']=round($_SESSION['datos_ganaderoL']['SupActGan']/2.5);
		$_SESSION['datos_ganaderoL']['CantGanleg']=round($_SESSION['datos_ganaderoL']['SupGanLegal']/5);
		$prodali=$_SESSION['datos_ganaderoL']['SupActAgri']+$_SESSION['datos_ganaderoL']['SupActbar']+$_SESSION['datos_ganaderoL']['SupActDes']+$_SESSION['datos_ganaderoL']['SupActGan']; 
		$supcomparar=0;
	   ////////////////////////mensajes de error////////////////////////////// 
	    if(round($_SESSION['datos_ganaderoL']['SupProdAli'],4)> $_SESSION['datos_ganaderoL']['supdefilegal']){
		   $supcomparar=round($_SESSION['datos_ganaderoL']['SupProdAli'],4);
	   }else{
			$supcomparar=round($_SESSION['datos_ganaderoL']['supdefilegal'],4);
	   }
	   
	   if( round($prodali,4)>round($supcomparar,4)){ 
	      trigger_error ("La Sumatoria de Sup. de Uso ACTUAL en Area Deforestada ilegal no debe ser mayor a la Sup. Deforestada Ilegal", E_USER_ERROR);	
        }elseif($_POST['submit']=='Guardar'){  
		
	    	//guardar superficies Predio fuera de Area deforestada Ilegal  $_SESSION['datos_ganaderoL']['']
			$insertaux=sprintf("select * from f_alimentos(%s, %s, %s, %s, %s, %s);",
			 						GetSQLValueString($_SESSION['idreg'], "int"),
									GetSQLValueString(round($_SESSION['datos_ganaderoL']['SupActAgri'],4), "double"),
									GetSQLValueString(round($_SESSION['datos_ganaderoL']['SupActGan'],4), "double"),
									GetSQLValueString(round($_SESSION['datos_ganaderoL']['SupActbar'],4), "double"),
									GetSQLValueString(round($_SESSION['datos_ganaderoL']['SupActDes'],4), "double"),
									GetSQLValueString(round($_SESSION['datos_ganaderoL']['SupGanLegal'],4), "double"));
				$Result2 = pg_query($cn, $insertaux);
			//echo $insertaux;
			//guardar compromisos

				$anho=0;
			
			for ($i = 0; $i <=5 ; $i++) {

	if ($_SESSION['datos_ganaderoL']['periodo']==2) {
					if ($anho==1) {$anho=3;}
				}
					 $insertaux=sprintf("select * from  f_ganaderaL(%s, %s, %s, %s,%s, %s, %s, %s,%s, %s, %s, %s,%s, %s,%s);",
									 GetSQLValueString($_SESSION['idreg'], "int"),
									 GetSQLValueString(round($_SESSION['datos_ganaderoL']['suppassembrado'.$i],4), "double"),
									 GetSQLValueString(isset($_SESSION['datos_ganaderoL']['suppasnatural'.$i]) ? htmlspecialchars(round($_SESSION['datos_ganaderoL']['suppasnatural'.$i],4)) : 0 , "double"),
									 GetSQLValueString($_SESSION['datos_ganaderoL']['sistemaordeno'.$i], "int"),
									 GetSQLValueString($_SESSION['datos_ganaderoL']['galpon'.$i], "int"),
									 GetSQLValueString($_SESSION['datos_ganaderoL']['tanqueenfriamiento'.$i], "int"),
									 GetSQLValueString($_SESSION['datos_ganaderoL']['siloforraje'.$i], "int"),
									 GetSQLValueString($_SESSION['datos_ganaderoL']['certtuberculosis'.$i], "int"),
									 GetSQLValueString($_SESSION['datos_ganaderoL']['certbrucelosis'.$i], "int"),
									 GetSQLValueString($_SESSION['datos_ganaderoL']['cabganprod'.$i], "int"),
									 GetSQLValueString($_SESSION['datos_ganaderoL']['cabgandescar'.$i], "int"),
									 GetSQLValueString($_SESSION['datos_ganaderoL']['prodcarne'.$i], "double"),
									 GetSQLValueString(isset($_SESSION['datos_ganaderoL']['prodleche'.$i]) ? htmlspecialchars($_SESSION['datos_ganaderoL']['prodleche'.$i]) : 0, "double"),
									GetSQLValueString(isset($_SESSION['datos_ganaderoL']['prodtotleche'.$i]) ? htmlspecialchars($_SESSION['datos_ganaderoL']['prodtotleche'.$i]) : 0, "double"),
									 $anho);
				 $Result2 = pg_query($cn, $insertaux);
				//echo $insertaux ;
				 $anho++;
				
			}//for
			 
			/////////////////////////////sistemas de produccion ganadera
			$Result1 = pg_query($cn,"delete from sistprodganadera where idsistproductivo in (Select idcodificadores From codificadores Where idclasificador=27)  and idregistro=".$_SESSION['idreg']);
				///sistemas de produccion 
			$sql3="Select * From codificadores Where idclasificador=27 Order by nombrecodificador";
			$rs3=pg_query($cn,$sql3);
			$row_rs3= pg_fetch_array ($rs3);
			$total= pg_num_rows($rs3);
		    $i=1; 
			
			 while($i<=$total)		
			 {  $aux=$row_rs3['idcodificadores'];
			    if(isset($_SESSION['datos_ganaderoL']['chk'.$aux]))		   
				{  $insertUSR = sprintf("select * from ModSistProdGanadera (%s, %s, %s);",
										   GetSQLValueString($_SESSION['idreg'], "int"),
										   GetSQLValueString($aux, "int"),
										   GetSQLValueString($_SESSION['datos_ganaderoL']['TxtSist'.$aux], "int"));
				 $Result1 = pg_query($cn, $insertUSR);
				}
				$row_rs3 = pg_fetch_assoc($rs3); 
				$i=$i+1;
			 }	
			 $a="update registro set obsregistro='".$_SESSION['datos_ganaderoL']['RObservacion']."' where idregistro=".$_SESSION['idreg'];
		//echo $a;
     		$Result2 = pg_query($cn, $a);
			 
		    	 ////si no hay error guardar
		  if (!(isset($_SESSION['ErrorThrown']) && $_SESSION['ErrorThrown'] != ""))  
			{  echo '<script>parent.document.location.href="Formulario001.php?aux=5&datosguardados=ok";</script>';
		    } 
	   }//if post
}else{
 if(!isset($_SESSION['datos_ganaderoL'])){ 
		
	$sql_ppg0 = "select *  FROM planganaderalechera where anoplanganadera=0 and idregistro=".$_SESSION['idreg'];
	$ppg0 = pg_query($cn,$sql_ppg0);
	$row_ppg0 = pg_fetch_array ($ppg0);  
	
		if ($periodo==1) {
		# code...
	
	$sql_ppg1 = "select *  FROM planganaderalechera where anoplanganadera=1 and idregistro=".$_SESSION['idreg'];
	$ppg1 = pg_query($cn,$sql_ppg1);
	$row_ppg1 = pg_fetch_array ($ppg1);  
	
	$sql_ppg2 = "select *  FROM planganaderalechera where anoplanganadera=2 and idregistro=".$_SESSION['idreg'];
	$ppg2 = pg_query($cn,$sql_ppg2);
	$row_ppg2 = pg_fetch_array ($ppg2);  
	
	$sql_ppg3 = "select *  FROM planganaderalechera where anoplanganadera=3 and idregistro=".$_SESSION['idreg'];
	$ppg3 = pg_query($cn,$sql_ppg3);
	$row_ppg3 = pg_fetch_array ($ppg3);  
	
	$sql_ppg4 = "select *  FROM planganaderalechera where anoplanganadera=4 and idregistro=".$_SESSION['idreg'];
	$ppg4 = pg_query($cn,$sql_ppg4);
	$row_ppg4 = pg_fetch_array ($ppg4);  
	
	$sql_ppg5 = "select *  FROM planganaderalechera where anoplanganadera=5 and idregistro=".$_SESSION['idreg'];
	$ppg5 = pg_query($cn,$sql_ppg5);
	$row_ppg5 = pg_fetch_array ($ppg5);  
	}


		if ($periodo==2) {
		# code...
	
	$sql_ppg1 = "select *  FROM planganaderalechera where anoplanganadera=3 and idregistro=".$_SESSION['idreg'];
	$ppg1 = pg_query($cn,$sql_ppg1);
	$row_ppg1 = pg_fetch_array ($ppg1);  
	
	$sql_ppg2 = "select *  FROM planganaderalechera where anoplanganadera=4 and idregistro=".$_SESSION['idreg'];
	$ppg2 = pg_query($cn,$sql_ppg2);
	$row_ppg2 = pg_fetch_array ($ppg2);  
	
	$sql_ppg3 = "select *  FROM planganaderalechera where anoplanganadera=5 and idregistro=".$_SESSION['idreg'];
	$ppg3 = pg_query($cn,$sql_ppg3);
	$row_ppg3 = pg_fetch_array ($ppg3);  
	
	$sql_ppg4 = "select *  FROM planganaderalechera where anoplanganadera=6 and idregistro=".$_SESSION['idreg'];
	$ppg4 = pg_query($cn,$sql_ppg4);
	$row_ppg4 = pg_fetch_array ($ppg4);  
	
	$sql_ppg5 = "select *  FROM planganaderalechera where anoplanganadera=7 and idregistro=".$_SESSION['idreg'];
	$ppg5 = pg_query($cn,$sql_ppg5);
	$row_ppg5 = pg_fetch_array ($ppg5);  
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
	
	 if(!isset($_SESSION['nombre_predio'])){
	    $sql_predio = "SELECT parcelas.nombre,parcelas.superficie, codificadores.nombrecodificador FROM  parcelas, registro, codificadores
		WHERE   parcelas.idtipoprop = codificadores.idcodificadores AND  registro.idparcela = parcelas.idparcela  and  registro.idregistro=".$_SESSION['idreg'];
		$predio = pg_query($cn,$sql_predio);
		$row_predio = pg_fetch_array ($predio);
		$_SESSION['nombre_predio']=$row_predio['nombre'];
	 }
 }

}

    $sql_supali = "select *  FROM superficiealimentos where idregistro=".$_SESSION['idreg'];
	$supali = pg_query($cn,$sql_supali);
	$row_supali = pg_fetch_array ($supali);
	
	$sql_obser = "SELECT obsregistro FROM  registro
			   WHERE  registro.idregistro=".$_SESSION['idreg'];
	$obser = pg_query($cn,$sql_obser);
	$row_obser = pg_fetch_array ($obser);
?>