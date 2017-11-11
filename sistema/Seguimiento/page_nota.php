<?php
   //print_r($_POST);
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1") && ($_POST["submit"]))
{

	 $datos_nota=$_POST;
	 $_SESSION['datos_nota']=$datos_nota;
	 $fechaseg=$_SESSION['datos_nota']['annoIni']."-".$_SESSION['datos_nota']['mesIni']."-".$_SESSION['datos_nota']['diaIni'];

	 $_SESSION['nota']-> ActualizarValores($_SESSION['datos_nota']['idunidad'], $_SESSION['datos_nota']['idremitente'], $_SESSION['datos_nota']['iddestinatario'], $_SESSION['datos_nota']['nota'], $fechaseg, $_SESSION['datos_nota']['RObservacion'], $_SESSION['datos_nota']['idvia'],$_SESSION['datos_nota']['idregistrador']);


	if (trim($_SESSION['datos_nota']['nota'])== "" )
	{   trigger_error ("Se debe registrar el numero de nota", E_USER_ERROR); }
	elseif ($_SESSION['datos_nota']['idunidad']==0)
	{   trigger_error ("Se Debe la Unidad de destino", E_USER_ERROR); }
	elseif ($_SESSION['datos_nota']['idremitente']==0)
	{   trigger_error ("Se Debe Especificar al funcionario que remite la nota", E_USER_ERROR); }
	elseif ($_SESSION['datos_nota']['iddestinatario']==0)
	{   trigger_error ("Se Debe Especificar al funcionario al que se remite la nota", E_USER_ERROR); }
	elseif (trim($_SESSION['datos_nota']['conteo'])==0)
	{   trigger_error ("Debe existir al menos un predio acumulado a la nota", E_USER_ERROR); }
	else{
		$_SESSION['nota']-> Grabar($cn,$_SESSION['idnot']);


		/////////////elimar todos las detalles de la nota////////////////////

		$Result2 = pg_query($cn, "delete from detallenota where idnota=".$_SESSION['nota']->get_idnota());

		/////////////insertar el detalle de la nota////////////

		// var_dump($_SESSION['datos_nota']);
		// exit();
		for ($i = 1; $i <=$_SESSION['datos_nota']['conteo'] ; $i++) {

			 if(isset($_SESSION['datos_nota']['idreg'.$i]) && ($_SESSION['datos_nota']['idreg'.$i]!="")){


				 $upda = ("update detallenota set estado ='A' where idregistro = ".$_SESSION['datos_nota']['idreg'.$i]);
				 $res = pg_query($cn, $upda);

				 $est = 'U';
				 $insertUSR2=sprintf("insert into detallenota values(%s,%s,%s,%s);",
									 GetSQLValueString($_SESSION['datos_nota']['idreg'.$i], "int"),
									 GetSQLValueString($_SESSION['nota']->get_idnota(), "int"),
									 GetSQLValueString(trim($_SESSION['datos_nota']['observacionesr'.$i]), "text"),
								 	 GetSQLValueString(trim($est), "text"));

				 $Result2 = pg_query($cn, $insertUSR2);

			 }

		}



	}

	   if (!(isset($_SESSION['ErrorThrown']) && $_SESSION['ErrorThrown'] != ""))
		{

		  echo '<script>parent.document.location.href="MenuNotasInternas.php?aux=3&datosguardados=ok";</script>';

		}


}


// recepcionar nota
elseif ( isset($_POST["submit2"]))
 {

	   $datos_nota=$_POST;
	   $_SESSION['datos_nota']=$datos_nota;
	   $_SESSION['nota']-> RecepcionarNota($cn,$_SESSION['MM_UserId']);
	   /*if (!(isset($_SESSION['ErrorThrown']) && $_SESSION['ErrorThrown'] != ""))
			{  echo '<script>parent.document.location.href="MenuSeguimiento.php?aux=2&datosguardados=ok";</script>';} */
		$mensaje="Nota Recepcionada";

}

else
{

	if(!isset($_SESSION['idnot'])){
		   if(isset($_POST['idnot'])){
				$idnot=$_POST['idnot'];
				if(isset($_GET['hab'])){if($_POST['fecharecepcionado']!=""){$habilitar=3;}else{$habilitar=$_GET['hab']; }
				                        $_SESSION['habilitar']=$habilitar;}

		   }else{
				$idnot=0;
		   }
		   $_SESSION['idnot']=$idnot;
	 }


	 if(isset($_POST['nota'])){
	 	$fechaseg=$_SESSION['datos_nota']['annoIni']."-".$_SESSION['datos_nota']['mesIni']."-".$_SESSION['datos_nota']['diaIni'];

	    $_SESSION['nota']-> ActualizarValores($_SESSION['datos_nota']['idunidad'], $_SESSION['datos_nota']['idremitente'], $_SESSION['datos_nota']['iddestinatario'],$_SESSION['datos_nota']['nota'],$fechaseg,$_SESSION['datos_nota']['RObservacion']);

	 }
   elseif(!isset($_SESSION['nota']))
   {
		 $nota = new nota();
		 $nota -> Cargarnota($cn, $_SESSION['idnot']);
		 $_SESSION['nota']=$nota;
	  }

	   $sql_carpetas = "Select sr.*,sr.observacionregistro as obs,p.nombre,p.idparcela, c.nombrecodificador as estado FROM detallenota as sr,registro as r,parcelas as p, codificadores as c
	   					WHERE p.idparcela=r.idparcela and sr.idregistro=r.idregistro and c.idcodificadores=r.estado  and sr.idnota=".$_SESSION['idnot'];
		$carpetas = pg_query($cn,$sql_carpetas);
		$row_carpetas = pg_fetch_array ($carpetas);
		$totalRows_carpetas = pg_num_rows($carpetas);


		if(isset($_POST['copia'])){
			 $idnot=0;
			 $_SESSION['idnot']=$idnot;
	  }



}



?>
