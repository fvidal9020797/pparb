<?php
//print_r($_POST);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2") && ($_POST["submit"]))
{
				$_SESSION['rec_doc']=$_POST;
				$campo = $_SESSION['rec_doc']['prereg'];

					if ($_SESSION['rec_doc']['idtiposolicitud'] == 0)
					{
						 $mensaje="Se debe especificar el tipo de solicitud";
					 }
					 elseif ($_SESSION['rec_doc']['comboremitente'] == 0) {
					 	$mensaje="Se debe especificar la Persona que recepciono la Solicitud";
					 }

			else{

					$idfun = $_SESSION['MM_UserId'];
					$esta = 1;


					$pregunta="select idsolicitudrecepcionada from solicitudrecepcionada where codigoparcela = '".$_SESSION['rec_doc']['prereg']."'
										and (tiposolicitud = 5 or tiposolicitud = 12) and anosolicitud = ".$_SESSION['rec_doc']['anhorcia'];
					$respreg = pg_query($cn, $pregunta);
					//$filapreg = pg_fetch_array ($respreg);
					$totalresp = pg_num_rows($respreg);
					//echo $totalresp;
					//exit;

						$aaa = GetSQLValueString(trim($_SESSION['rec_doc']['anhorcia']), "int")+2013;

					if ($totalresp > 0)
					{
						 $mensaje="EXISTE RCIA RECEPCIONADO PARA LA GESTION : ".$aaa;
						 echo '<script>alert("EXISTE UN RCIA RECEPCIONADO PARA LA GESTION ")</script>';
					}
					else
				  {

						$insertaux=sprintf("select * from f_guardar_solicitud_recepcionada(%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s);",
													 GetSQLValueString(trim(strtoupper($_SESSION['rec_doc']['prereg'])), "text"),
													 GetSQLValueString(trim($idfun), "int"),
													 GetSQLValueString(trim($_SESSION['rec_doc']['fecharec']), "date"),
													 GetSQLValueString(trim($_SESSION['rec_doc']['idtiposolicitud']), "int"),
													 GetSQLValueString(trim($_SESSION['rec_doc']['anhorcia']), "int"),
													 GetSQLValueString(trim(strtoupper($_SESSION['rec_doc']['obsrecepcion'])), "text"),
													 GetSQLValueString(trim(strtoupper($_SESSION['rec_doc']['nombreRecepcionado'])), "text"),
													 GetSQLValueString(trim($esta), "int"),
													 GetSQLValueString(trim(strtoupper($_SESSION['rec_doc']['cite'])), "text"),
													 GetSQLValueString(trim($_SESSION['rec_doc']['idtipodictamen']), "int"),
													 GetSQLValueString(trim($_SESSION['rec_doc']['comboremitente']), "int"));
						//	echo $insertaux;
						 $Resultsol = pg_query($cn, $insertaux);
						 $row_sol = pg_fetch_array ($Resultsol);
						 $idnota_recepcionadass=$row_sol['f_guardar_solicitud_recepcionada'];
						 $campo = $_SESSION['rec_doc']['prereg'];
						 switch (GetSQLValueString(trim($_SESSION['rec_doc']['idtipodictamen']), "int")) {
								case '316':
									$Sql="update registro set estado=240 where idparcela=".GetSQLValueString(trim(strtoupper($_SESSION['rec_doc']['prereg'])), "text");
									pg_query($cn, $Sql);
									break;
								case '317':
									$Sql="update registro set estado=347 where idparcela=".GetSQLValueString(trim(strtoupper($_SESSION['rec_doc']['prereg'])), "text");
									pg_query($cn, $Sql);
									break;
								case '349':
									$Sql="update registro set estado=135 where idparcela=".GetSQLValueString(trim(strtoupper($_SESSION['rec_doc']['prereg'])), "text");
									pg_query($cn, $Sql);
									break;

									case '350':
										$Sql="update registro set estado=135 where idparcela=".GetSQLValueString(trim(strtoupper($_SESSION['rec_doc']['prereg'])), "text");
										pg_query($cn, $Sql);
										break;

								default:
									# code...
									break;
							}
							 $mensaje="Datos Registrados Exitosamente";

								echo '<script>alert("Solicitud, Nota o RCIA Recepcionado Exitosamente")</script>';
								echo '<script>	 window.close();</script>';

					}





					}

}
?>
