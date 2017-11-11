<?php  
   
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{   // print_r($_POST);
	 $datos_nota=$_POST;
	 $_SESSION['datos_nota']=$datos_nota; 
	 $fechaseg=$_SESSION['datos_nota']['annoIni']."/".$_SESSION['datos_nota']['mesIni']."/".$_SESSION['datos_nota']['diaIni'];
	// echo $fechaseg;
	 $_SESSION['nota']-> ActualizarValores($_SESSION['datos_nota']['idunidad'], $_SESSION['datos_nota']['idremitente'], $_SESSION['datos_nota']['iddestinatario'], $_SESSION['datos_nota']['nota'], $fechaseg, $_SESSION['datos_nota']['RObservacion']);
		
		
	if (trim($_SESSION['datos_nota']['nota'])== "" )
	{   trigger_error ("Se debe registrar el numero de nota", E_USER_ERROR); }
	elseif ($_SESSION['datos_nota']['idremitente']==0)
	{   trigger_error ("Se Debe Especificar al funcionario que remite la nota", E_USER_ERROR); }
	elseif ($_SESSION['datos_nota']['iddestinatario']==0)
	{   trigger_error ("Se Debe Especificar al funcionario al que se remite la nota", E_USER_ERROR); }
	elseif (trim($_SESSION['datos_nota']['conteo'])==0)
	{   trigger_error ("Debe existir al menos un predio acumulado a la nota", E_USER_ERROR); }
	else{
		$_SESSION['nota']-> Grabar($cn);
		
		/////////////elimar todos los propietarios////////////////////
		
		/*$Result2 = pg_query($cn, "delete from detallenota where idnota=".$_SESSION['nota']->get_idnota());
		
		/////////////insertar a los propietarios actuales////////////
		
		for ($i = 1; $i <=$_SESSION['datos_nota']['conteo'] ; $i++) {
			 if(isset($_SESSION['datos_nota']['idreg'.$i]) && $_SESSION['datos_nota']['idreg'.$i]!=""){
				 $insertUSR2=sprintf("insert into detallenota values(%s,%s,%s);",
									 GetSQLValueString($_SESSION['datos_nota']['idreg'.$i], "int"),
									 GetSQLValueString($_SESSION['nota']->get_idnota(), "int"),
									 GetSQLValueString(trim($_SESSION['datos_nota']['observacionesr'.$i]), "text"));
				
				 $Result2 = pg_query($cn, $insertUSR2);
				 echo $insertUSR2;
			 }
			// echo 'idreg'.$i;
		}*/
	
	}
	  
	
	 ////si no hay error guardar
				 
		/*  if (!(isset($_SESSION['ErrorThrown']) && $_SESSION['ErrorThrown'] != ""))  
			{  echo '<script>parent.document.location.href="Formulario001.php?aux=7&datosguardados=ok";</script>';
		    } 
	   }//if post*/
}else{
     
	 if(!isset($_SESSION['idnot'])){
	   if(isset($_GET['idnot'])){
			$idnot=$_GET['idnot'];
	   }else{
			$idnot=0;
	   }
	   $_SESSION['idnot']=$idnot;
	 }
   
	 if(isset($_POST['nota'])){ 
	    echo $_SESSION['nota']->getnnota();
	 	 $fechaseg=$_SESSION['datos_nota']['annoIni']."/".$_SESSION['datos_nota']['mesIni']."/".$_SESSION['datos_nota']['diaIni'];
	  
	    $_SESSION['nota']-> ActualizarValores($_SESSION['datos_nota']['idunidad'], $_SESSION['datos_nota']['idremitente'], $_SESSION['datos_nota']['iddestinatario'],$_SESSION['datos_nota']['nota'],$fechaseg,$_SESSION['datos_nota']['RObservacion']);
		   
	 }elseif(!isset($_SESSION['nota'])){ 
	     	
		 $nota = new nota(); 
		 $nota -> Cargarnota($cn, $_SESSION['idnot']); 
		 $_SESSION['nota']=$nota;
		  // echo "hola".$_SESSION['idreg'];
	  }
	 
	    $sql_carpetas = "Select * FROM detallenota as sr,registro as r,parcelas as p  
	   					WHERE p.idparcela=r.idparcela and sr.idregistro=r.idregistro and sr.idnota=".$_SESSION['idnot'];
		$carpetas = pg_query($cn,$sql_carpetas);
		$row_carpetas = pg_fetch_array ($carpetas);
		$totalRows_carpetas = pg_num_rows($carpetas);
	 
}
 print_r($_SESSION);



?>