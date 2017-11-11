<?php

//print_r($_POST);


	  if(isset($_POST['idnotaext'])){ // si no hay datos en esa session
		//	 echo " <hr> vino para recepcionar";

		//print_r($_POST);

			  if(isset($_POST['idderivar'])&& $_POST['idderivar']=="1"){
						// metodo update para recepcionar
						$insertaux2=sprintf("select * from f_derivar_nota_ext_Recepcionar(%s);",
													 GetSQLValueString(trim($_POST['idnotaext']), "int"));
													// echo "consulta:".$insertaux2;
						  $Result2 = pg_query($cn, $insertaux2);
			 				$row_derivacion2 = pg_fetch_array ($Result2);
			 				$idderivacion2= $row_derivacion2['f_derivar_nota_ext_recepcionar'];
			 				$_SESSION['idder2']=$idderivacion2;
						//	echo "resultado consulta:".$idderivacion2;
							if($idderivacion2>0){
							//	trigger_error ("siii Recepcionar Nota !!", E_USER_ERROR);
								$mensaje="Recepcion Exitosa!!!!!";
							//	echo "entroo a hacerrrrrrrrrrrrr;";
							//	trigger_error (" Recepcionar Nota !!", E_USER_ERROR);
							}else{
							//	echo " errorrrrrrrrrrrrr";
								 trigger_error ("Error al  Recepcionar Nota !!", E_USER_ERROR);
							}
				}else{
				//	echo " <hr> Noooo recepcionar    ";
				}
		 }else{
			//  echo " <hr> Nooo recepcionar ";
		 }
//print_r($_POST);


	if ((isset($_POST["MM_insert2"])) && ($_POST["MM_insert2"] == "formularioDerivar") )
	{

					 //print_r($_POST);

			$_SESSION['datos_nota_ext_d']=$_POST;
			$_SESSION['datos_nota_ext_d']['mensajeDerivar1']="derivo";

			//echo "vaaaaa:".$_SESSION['datos_nota_ext_d']['mensajeDerivar1'];


			 if(isset($_SESSION['datos_nota_ext_d']['idnotaext']))
			 {
				 $id_notaext=$_SESSION['datos_nota_ext_d']['idnotaext'];
			 }

			 if ($_SESSION['datos_nota_ext_d']['comboremitente'] ==0)
			 { trigger_error ("Debe Especificar el Remitente", E_USER_ERROR);			}
			 elseif ($_SESSION['datos_nota_ext_d']['combodestinatario'] ==0)
			 {   trigger_error ("Debe Especificar el Destinatario", E_USER_ERROR); }
			 elseif ($_SESSION['datos_nota_ext_d']['comboaccion'] ==0)
			 {   trigger_error ("Debe Especificar la Accion de la Nota a Derivar", E_USER_ERROR); }
			 elseif ($_SESSION['datos_nota_ext_d']['combodestinatario'] == $_SESSION['datos_nota_ext_d']['comboremitente'])
			 {   trigger_error ("El Destinatario no puede ser el mismo del Remitente", E_USER_ERROR); }
			 elseif ($_SESSION['datos_nota_ext_d']['fechaderivn']== "" )
			 {   trigger_error ("Debe Especificar la Fecha de Derivacion", E_USER_ERROR); }

	 else{
			 // GUARDAMOS LA DERIVACION DE LA NOTA

			 $fecharec = null;
			 $numder = 0;

			 $chekRCIA=0;
				 if (empty($_SESSION['datos_nota_ext_d']['rciachk']))
				{
										$chekRCIA=0;
				 }
				else
				{
										 $chekRCIA=$_SESSION['datos_nota_ext']['comboaccionrcia'];
				 }
				//$_SESSION['datos_nota_ext']['comboaccionrcia'] = $chekRCIA;


			 $insertaux3=sprintf("select * from f_derivar_nota_ext (%s, %s, %s, %s, %s, %s, %s, %s, %s);",
											GetSQLValueString(trim($_SESSION['datos_nota_ext_d']['idnotaext']), "int"),
											GetSQLValueString($_SESSION['datos_nota_ext_d']['comboremitente'], "int"),
											GetSQLValueString($_SESSION['datos_nota_ext_d']['combodestinatario'], "int"),
											GetSQLValueString($fecharec, "date"),
											GetSQLValueString($_SESSION['datos_nota_ext_d']['fechaderivn'], "date"),
											GetSQLValueString($_SESSION['datos_nota_ext_d']['comboaccion'], "int"),
											GetSQLValueString(trim($numder), "int"),
											GetSQLValueString($_SESSION['datos_nota_ext_d']['proveido'], "text"),
																				$chekRCIA);

																				//echo $insertaux3;
																				//echo '<script>alert('.$insertaux3.')</script>';
																			//  exit();

				 $Result3 = pg_query($cn, $insertaux3);
				 $row_derivacion3 = pg_fetch_array ($Result3);
				 $idderivacion3= $row_derivacion3['f_derivar_nota_ext'];
				 $_SESSION['datos_nota_ext_d']['idder']=$idderivacion3;

					if($idderivacion3>0){
					//	trigger_error ("siii Recepcionar Nota !!", E_USER_ERROR);
						$mensaje2="Derivacion Guardada Exitosa!!!!!";
					}else{
						 trigger_error ("Erro al  Recepcionar Nota !!", E_USER_ERROR);
					}
				/* if (!(isset($_SESSION['ErrorThrown']) && $_SESSION['ErrorThrown'] != "")) {
					 echo '<script>parent.document.location.href="MenuNotasExternas.php?aux=3&datosguardados=ok";</script>';
				 }*/

			 }
	}
	else
	{
		//print_r($_POST);
				$_SESSION['datos_nota_ext_d']['mensajeDerivar1']="mm";
	}



if(isset($_POST['idnotaext'])){
	$idnotaexterna=$_POST['idnotaext'] ;
}else{
	$idnotaexterna=0;
}





$sql_unidad= " SELECT  count(idderivado)as cant from derivacionnotaext where  idderivado in(select idderivado from derivacionnotaext where  idnotaext = ".$idnotaexterna." and fecharecepcion is null order by fechaderivacion asc limit 1);  ";
//echo "  conn:".$sql_unidad;
//echo "<hr>";

$unidad = pg_query($cn,$sql_unidad) ;
//echo "  cant2:".pg_num_rows($unidad);
//$valorDerivada=$row_unidad['nombrecodificador']
$row_unidad = pg_fetch_array ($unidad);

//echo "valor:".$row_unidad['cant'];
$valorDerivada=$row_unidad['cant'];

if(isset($_POST['idguardarDerivacion'])){
	$mensaje3="Derivacion Guardada Exitosa!!!!!";
	 //trigger_error ("siii Derivar Nota !!", E_USER_ERROR);
	// echo "siiiiiiii aal guardar derivacion:".$mensaje3;
}
else
{
//	echo "errorrrrrr aal guardar derivacion";
}








if ((isset($_POST["MM_insert3"])) && ($_POST["MM_insert3"] == "formulariodetalle") )
{
//trigger_error ("entro guardar obs", E_USER_ERROR);
	     $_SESSION['datos_nota_ext_d']=$_POST;


					if(isset($_SESSION[ 'datos_nota_ext_d']['idnotaext']))
					{
						$id_notaext=$_SESSION[ 'datos_nota_ext_d']['idnotaext'];
					}


					// GUARDAMOS LA NOTA
					$idfun = $_SESSION['MM_UserId'];
						// INSERTAMOS LAS SOLICITUDES DE LA NOTA
					//	$Resultdelete = pg_query($cn, "delete from detallenotaext where idnotaext=".$_SESSION[ 'datos_nota_ext_d']['idnotaext']);

						for ($i = 1; $i <=$_SESSION[ 'datos_nota_ext_d']['conteo'] ; $i++) {

									if(isset($_SESSION[ 'datos_nota_ext_d']['idsolicitud'.$i]) && ($_SESSION[ 'datos_nota_ext_d']['idsolicitud'.$i]!="")){

								 $insertUSR2=sprintf("select * from f_actualizar_solicitud(%s,%s,%s);",
													 GetSQLValueString($_SESSION[ 'datos_nota_ext_d']['idsolicitud'.$i], "int"),
													 GetSQLValueString($_SESSION[ 'datos_nota_ext_d']['idnotaext'], "int"),
													 GetSQLValueString(trim($_SESSION[ 'datos_nota_ext_d']['observacionesr'.$i]), "text"));
												//	 echo $insertUSR2;
								 $Result2 = pg_query($cn, $insertUSR2);

			           $row_solicitud2 = pg_fetch_array ($Result2);
			           $idsolext= $row_solicitud2['f_actualizar_solicitud'];
			         //  $_SESSION['datos_nota_ext_d']['idder']=$idderivacion3;
			            if($idsolext>0){
			              //echo "sii guardoo".$idsolext;
										$mensaje4="Solicitud(es) o Nota(s)  Guardados Exitosamente !!";
			            }else{
			            //  echo "noo guardoooo";
									//	trigger_error ("noo guardoooo", E_USER_ERROR);
			            }


							 }

						}

						if (!(isset($_SESSION['ErrorThrown']) && $_SESSION['ErrorThrown'] != "")) {
						//	echo '<script>parent.document.location.href="MenuNotasExternas.php?aux=3&datosguardados=ok";</script>';
						}


}







?>
