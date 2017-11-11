<?php
//print_r($_POST);



if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "insertarnota") )
{


				$_SESSION['der_doc']=$_POST;
				$idsolicitudrec = $_SESSION['der_doc']['idsolicitud'];
				$idremitente = $_SESSION['MM_UserId'];
				$codigop = $_SESSION['der_doc']['codigopar'];



					/// INSERTAMOS LA NOTA
						$nl = 'null';
						$insertaux=sprintf("select * from f_nota_externa (%s, %s, %s, %s);",
													 0,
													 $nl,
													 GetSQLValueString(trim($idremitente), "int"),
													 GetSQLValueString(trim(strtoupper($_SESSION['der_doc']['cite'])), "text"));

						 //echo $insertaux;
						$Result = pg_query($cn, $insertaux);


						$row_nota_ext = pg_fetch_array ($Result);
						$idnota_ext= $row_nota_ext['f_nota_externa'];
						//$_SESSION['der_doc']['idnotaext']=$idnota_ext;
						//echo $idnota_ext;


						/// INSERTAMOS LA PRIMER DERIVACION
						$insertaux1=sprintf("select * from f_derivar_nota_ext (%s, %s, %s, %s, %s, %s, %s, %s, %s);",
													 $idnota_ext,
													 $idremitente,
													 GetSQLValueString($_SESSION['der_doc']['combodestinatario'], "int"),
													 $nl,
													 GetSQLValueString($_SESSION['der_doc']['fechader'], "date"),
													 GetSQLValueString($_SESSION['der_doc']['comboaccion'], "int"),
													 1,
													 GetSQLValueString($_SESSION['der_doc']['proveido'], "text"),
	                         0);

													 //echo $insertaux1;
 												//	exit;
						  $Result1 = pg_query($cn, $insertaux1);


							//// INSERTAMOS LA CARPETA DE LA NOTA
							$insertUSR2=sprintf("insert into detallenotaext values(%s,%s,%s);",
																											$idsolicitudrec,
																											$idnota_ext,
																											GetSQLValueString(trim($_SESSION['der_doc']['obsrecepcion']), "text"));

																											//echo $insertUSR2;

							$Result2 = pg_query($cn, $insertUSR2);




							/////// ACTUALIZAMOS EL ESTADO DE LA CARPETA
							$estado = $_SESSION['der_doc']['comboestadosol'];
							$act = "update solicitudrecepcionada set estado = ". $estado."  where idsolicitudrecepcionada=".$idsolicitudrec;
							$sqlactualizar = pg_query($cn,$act);


							echo '<script>alert("Solicitud derivada Exitosamente")</script>';

							echo '<script>window.opener.document.location.href="seguimiento_historial.php?historial=1&mostrartabla3=ok&codParcela='.$codigop.'"</script>';

							echo '<script>	 window.close();</script>';


}

if ((isset($_POST["MM_updt"])) && ($_POST["MM_updt"] == "guardarobs") )  // actualizamos la derivacion
{
						//actualizamos la observacion
						$_SESSION['der_doc']=$_POST;
						$idsolicitud = $_SESSION['der_doc']['idsolicitud'];
						$idnot = $_SESSION['der_doc']['idnota'];
						$obs = $_SESSION['der_doc']['obsupdt'];
						$codigop = $_SESSION['der_doc']['codigopar'];

						$estado = $_SESSION['der_doc']['comboestadosol'];


						if ($idnot == 0) {  // es una recepcion

							$insertUSR2="update solicitudrecepcionada set observaciones = '". $obs."' , estado = ". $estado."  where  idsolicitudrecepcionada=".$idsolicitud;
							//echo $insertUSR2;
							//exit;
							$Result2 = pg_query($cn, $insertUSR2);

						}
						else {  // es una nota derivada
							$insertUSR2="update detallenotaext set observacion = '". $obs."'  where idnotaext= ".$idnot." and  idsolicitudext=".$idsolicitud;
							$Result2 = pg_query($cn, $insertUSR2);

							// ACTUALIZAMOS EL ESTADO DE LA CARPETA

							$act = "update solicitudrecepcionada set estado = ". $estado."  where idsolicitudrecepcionada=".$idsolicitud;

							$sqlactualizar = pg_query($cn,$act);
						}




						echo '<script>alert("Se actualizo Correctamente los datos de la solicitud")</script>';

						echo '<script>window.opener.document.location.href="seguimiento_historial.php?historial=1&mostrartabla3=ok&codParcela='.$codigop.'"</script>';

						echo '<script>	 window.close();</script>';

}


?>
