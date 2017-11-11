<?php
//print_r($_POST);


if ((isset($_POST["MM_insert_rcia"])) && ($_POST["MM_insert_rcia"] == "form2") && (isset($_POST["submit_rcia"])) &&($_POST["submit_rcia"]))
{

	//echo "Entro por rcia";
	//exit;

			$_SESSION['datos_nota_rcia_puntaje']=$_POST;

			//echo $_SESSION['datos_nota_rcia_puntaje']['grupo'];


		 if ($_SESSION['datos_nota_rcia_puntaje']['citercia'] =='')
		 { trigger_error ("Debe Especificar el cite de la Nota", E_USER_ERROR);}

		 elseif ($_SESSION['datos_nota_rcia_puntaje']['grupo'] =='')
		 { trigger_error ("Debe Especificar el grupo de RCIA", E_USER_ERROR);}

		 elseif ($_SESSION['datos_nota_rcia_puntaje']['fechanotarcia'] =='')
		 { trigger_error ("Debe Especificar la fecha de la Nota", E_USER_ERROR);}


		 elseif ($_SESSION['datos_nota_rcia_puntaje']['destino'] ==0)
		 {   trigger_error ("Debe Especificar el Destinatario", E_USER_ERROR); }

		 elseif ($_SESSION['datos_nota_rcia_puntaje']['via1'] ==0)
		 {   trigger_error ("Debe Especificar al menos un intermediario de la Nota", E_USER_ERROR); }

		 elseif ($_SESSION['datos_nota_rcia_puntaje']['de1'] ==0)
		 {   trigger_error ("Debe Especificar el remitente de la Nota", E_USER_ERROR); }

		 elseif ($_SESSION['datos_nota_rcia_puntaje']['de1'] == $_SESSION['datos_nota_rcia_puntaje']['de2'])
		 {   trigger_error ("Los remitentes de la nota no pueden ser los mismos", E_USER_ERROR); }

		 elseif ($_SESSION['datos_nota_rcia_puntaje']['via1'] == $_SESSION['datos_nota_rcia_puntaje']['via2'])
		 {   trigger_error ("Los intermediarios no pueden ser los mimos ", E_USER_ERROR); }

		 elseif ( ($_SESSION['datos_nota_rcia_puntaje']['de1'] == $_SESSION['datos_nota_rcia_puntaje']['via1']) || ($_SESSION['datos_nota_rcia_puntaje']['de1'] == $_SESSION['datos_nota_rcia_puntaje']['via2'])  )
		 {   trigger_error ("Remitente e intermediario no pueden ser los mismos ", E_USER_ERROR); }

		 elseif ( ($_SESSION['datos_nota_rcia_puntaje']['de2'] == $_SESSION['datos_nota_rcia_puntaje']['via1']) || ($_SESSION['datos_nota_rcia_puntaje']['de2'] == $_SESSION['datos_nota_rcia_puntaje']['via2'])  )
		 {   trigger_error ("Remitente e intermediario no pueden ser los mismos ", E_USER_ERROR); }

		 elseif ( ($_SESSION['datos_nota_rcia_puntaje']['de1'] == $_SESSION['datos_nota_rcia_puntaje']['destino']) || ($_SESSION['datos_nota_rcia_puntaje']['de2'] == $_SESSION['datos_nota_rcia_puntaje']['destino'])  )
		 {   trigger_error ("Los remitentes no pueden ser los mismos que el destinatario ", E_USER_ERROR); }

		 elseif ( ($_SESSION['datos_nota_rcia_puntaje']['via1'] == $_SESSION['datos_nota_rcia_puntaje']['destino']) || ($_SESSION['datos_nota_rcia_puntaje']['via2'] == $_SESSION['datos_nota_rcia_puntaje']['destino'])  )
		 {   trigger_error ("Los intermediarios no pueden ser el mismo que el destinatario final ", E_USER_ERROR); }

		 elseif (trim($_SESSION['datos_nota_rcia_puntaje']['conteorcia'])==0)
		 {   trigger_error ("Debe existir al menos RCIA en la Nota", E_USER_ERROR); }


		 else // PASO TODAS LAS EXCEPCIONES
		 {

			 				// GUARDAMOS LA NOTA
							 $idfun = $_SESSION['MM_UserId'];
							 $obs = "";
							 $insertaux=sprintf("select * from f_nota_externa (%s, %s, %s, %s);",
															GetSQLValueString(trim($_SESSION['datos_nota_rcia_puntaje']['idnotaextm']), "int"),
															GetSQLValueString(trim($obs), "text"),
															GetSQLValueString(trim($idfun), "int"),
															GetSQLValueString(trim(strtoupper($_SESSION['datos_nota_rcia_puntaje']['citercia'])), "text"));
							 //echo $insertaux;
							 $Result = pg_query($cn, $insertaux);
							 $row_nota_ext = pg_fetch_array ($Result);
							 $idnota_ext= $row_nota_ext['f_nota_externa'];
							 $_SESSION['datos_nota_rcia_puntaje']['idnotaextm']=$idnota_ext;


							 // GUARDAMOS LA DERIVACION DE LA NOTA solo para visualizacion en el listado de notas
							 $fecharec = null;
							 $numder = 1;
							 $chekRCIAp=0;
																							if (empty($_SESSION['datos_nota_rcia_puntaje']['chkrciapuntaje']))
																						 {
																												 $chekRCIAp=0;
																							}
																						 else
																						 {
																													$chekRCIAp=100; // es una nota de puntaje rcia
																						 }

							 $insertaux1=sprintf("select * from f_derivar_nota_ext (%s, %s, %s, %s, %s, %s, %s, %s, %s);",
															GetSQLValueString(trim($_SESSION['datos_nota_rcia_puntaje']['idnotaextm']), "int"),
															GetSQLValueString($_SESSION['datos_nota_rcia_puntaje']['de1'], "int"),
															GetSQLValueString($_SESSION['datos_nota_rcia_puntaje']['destino'], "int"),
															GetSQLValueString($fecharec, "date"),
															GetSQLValueString($_SESSION['datos_nota_rcia_puntaje']['fechanotarcia'], "date"),
															GetSQLValueString($_SESSION['datos_nota_rcia_puntaje']['via1'], "int"),
															GetSQLValueString(trim($numder), "int"),
															GetSQLValueString($_SESSION['datos_nota_rcia_puntaje']['referencia'], "text"),
																																																			 $chekRCIAp);

							//echo $insertaux1;
							//exit;
							$Result1 = pg_query($cn, $insertaux1);


							//// guardamos la cabecera de la nota rcia donde guardamos la cabecera del puntaje
							$numero = 0;

							if (empty($_SESSION['datos_nota_rcia_puntaje']['puntajecampo']))
						 {
												 $chekpc=0;
							}
						 else
						 {
													$chekpc=1; // es una nota de puntaje de campo
						 }


							$insertaux2=sprintf("select * from monitoreo.ff_guardar_nota_rcia (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s);",
														 GetSQLValueString(trim($numero), "int"),
														 GetSQLValueString($_SESSION['datos_nota_rcia_puntaje']['grupo'], "text"),
														 GetSQLValueString($_SESSION['datos_nota_rcia_puntaje']['de1'], "int"),
														 GetSQLValueString($_SESSION['datos_nota_rcia_puntaje']['de2'], "int"),
														 GetSQLValueString($_SESSION['datos_nota_rcia_puntaje']['via1'], "int"),
														 GetSQLValueString($_SESSION['datos_nota_rcia_puntaje']['via2'], "int"),
														 GetSQLValueString($_SESSION['datos_nota_rcia_puntaje']['destino'], "int"),
														 GetSQLValueString($_SESSION['datos_nota_rcia_puntaje']['referencia'], "text"),
														 GetSQLValueString(trim($_SESSION['datos_nota_rcia_puntaje']['idnotaextm']), "int"),
														 $chekpc);

						 $Result2 = pg_query($cn, $insertaux2);




						 /// insertamos los puntajes de los rcias segun corresponda la nota de evaluacion gabinete
						 for ($i = 1; $i <=$_SESSION['datos_nota_rcia_puntaje']['conteorcia'] ; $i++) {

									 if ($chekpc==0)
									 {
												 if($_SESSION['datos_nota_rcia_puntaje']['idnotacamp'.$i] <> 0)
												 {
													 $ncamp = $_SESSION['datos_nota_rcia_puntaje']['idnotacamp'.$i];
												 }
												 else
												 {
														$ncamp = 0;
												 }
									 }
									 else
									 {
												$ncamp = $_SESSION['datos_nota_rcia_puntaje']['idnotaextm'];
									 }




															if(isset($_SESSION['datos_nota_rcia_puntaje']['idsolicitud'.$i]) && ($_SESSION['datos_nota_rcia_puntaje']['idsolicitud'.$i]!=""))
															{

																$insertarrciapuntuados=sprintf("select * from monitoreo.ff_guardar_puntuacion_rcia (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s);",
																							 GetSQLValueString(trim($_SESSION['datos_nota_rcia_puntaje']['idnotaextm']), "int"),
																							 GetSQLValueString($_SESSION['datos_nota_rcia_puntaje']['idsolicitud'.$i], "int"),
																							 GetSQLValueString($_SESSION['datos_nota_rcia_puntaje']['rciapresentado'.$i], "int"),
																							 GetSQLValueString($_SESSION['datos_nota_rcia_puntaje']['evalcpa'.$i], "text"),
																							 GetSQLValueString($_SESSION['datos_nota_rcia_puntaje']['evalcrebo'.$i], "text"),
																							 GetSQLValueString($_SESSION['datos_nota_rcia_puntaje']['gabcpa'.$i], "text"),
																							 GetSQLValueString($_SESSION['datos_nota_rcia_puntaje']['gabcrebo'.$i], "text"),
																							 GetSQLValueString($_SESSION['datos_nota_rcia_puntaje']['campcpa'.$i], "text"),
																							 GetSQLValueString($_SESSION['datos_nota_rcia_puntaje']['campcrebo'.$i], "text"),
																							 GetSQLValueString($_SESSION['datos_nota_rcia_puntaje']['observacionesr'.$i], "text"),
																							 $ncamp);

																							 //echo $insertaux2;
															 $Resultadorcia = pg_query($cn, $insertarrciapuntuados);


															 /// primero borramos las observaciones a las parcelas
															 $codigopar= $_SESSION['datos_nota_rcia_puntaje']['idparcela'.$i];
															 $borrar = pg_query($cn,"delete from parcelasestados where codigoparcela = '".$codigopar."'");

															 ///// ahora insertamos las observaciones del Predio que se hicieron en el Resultadorcia
															 for ($k=356; $k <= 359 ; $k++)
															 {
																 if (empty( $_SESSION['datos_nota_rcia_puntaje']['obs'.$i.$k]))
																 {

																 }
																 else
																	{
																		$insertar = pg_query($cn,"insert into parcelasestados values('".$codigopar."',".$k.")");
																 }
															 }
														 }

							}

							if (!(isset($_SESSION['ErrorThrown']) && $_SESSION['ErrorThrown'] != "")) {
								echo '<script>parent.document.location.href="MenuNotasExternas.php?aux=3&datosguardados=ok";</script>';
							}


			}



}


elseif ((isset($_POST["submit_eliminar"])) &&($_POST["submit_eliminar"]))
{



					$eliminar['eliminarsolicitud'] = $_POST;
					$del = $eliminar['eliminarsolicitud']['idsoldel'];
					$cont = $eliminar['eliminarsolicitud']['cont'];

					$_SESSION['datos_nota_rcia_puntaje']['conteorcia'] = $cont;

					if ($_SESSION['datos_nota_rcia_puntaje']['tiponota']==0) //ELIMINAR NOTA SIN PUNTUACION DE CAMPO
					{
							//echo("nota sin ounbtuacuoin de campo");
							$verificar = pg_query($cn,"select numnotacamp from monitoreo.notaspuntuacionrcia where idsolicitudrcia = ".$del);
							$row_verificar = pg_fetch_array($verificar);
							//echo ($row_verificar['numnotacamp']);

							if ($row_verificar['numnotacamp'] != 0)
							{
								echo '<script>alert("NO SE PUEDE ELIMINAR: EL RCIA SE ENCUENTRA REGISTRADO EN LA NOTA DE CAMPO N° :'.$row_verificar['numnotacamp'].' ");</script>';
							}
							else
							{
								$borrar = pg_query($cn,"delete from monitoreo.notaspuntuacionrcia where idsolicitudrcia = ".$del);
								$_SESSION['datos_nota_rcia_puntaje']['conteorcia'] = $cont-1;
								echo '<script>alert("SE ELIMINO EL RCIA CORRECTAMENTE DE LA NOTA");</script>';




							}

					}
					else  //ELIMINAR NOTA CON PUNTUACION DE CAMPO;
					{

							$upd = pg_query($cn,"update monitoreo.notaspuntuacionrcia set campcpa = '' , campcrebo = '', numnotacamp=0 where idsolicitudrcia = " .$del);
							$_SESSION['datos_nota_rcia_puntaje']['conteorcia'] = $cont-1;
							echo '<script>alert("SE ELIMINO EL RCIA CORRECTAMENTE DE LA NOTA");</script>';
					}



}




	 if(!isset($_SESSION['datos_nota_rcia_puntaje']['idnotaextm']))
	 {

		 		if(isset($_POST['idnotaextm']))
				{
				 $idnotext=$_POST['idnotaextm'];
				}
				else
				{
				 $idnotext=0;
				}

				$_SESSION['datos_nota_rcia_puntaje']['idnotaextm']=$idnotext;
		}



	 if($_SESSION['datos_nota_rcia_puntaje']['idnotaextm']>0)
	 {

			$sql_nota_monit = "select m.*, n.cite, e.rcia, e.fechaderivacion as fecharecepcion from notasexternas as n inner join  monitoreo.notasmonitoreo as m on n.idnotaext = m.idnotaext inner join derivacionnotaext as e on e.idnotaext = n.idnotaext where m.idnotaext = " .$_SESSION['datos_nota_rcia_puntaje']['idnotaextm'];
			$nota_monitoreo = pg_query($cn,$sql_nota_monit);
			$row_notamonitoreo = pg_fetch_array ($nota_monitoreo);

			$_SESSION['datos_nota_rcia_puntaje']['grupo'] = $row_notamonitoreo['grupo'];
			$_SESSION['datos_nota_rcia_puntaje']['referencia'] = $row_notamonitoreo['referencia'];
			$_SESSION['datos_nota_rcia_puntaje']['citercia'] = $row_notamonitoreo['cite'];
			$_SESSION['datos_nota_rcia_puntaje']['fechanotarcia'] = $row_notamonitoreo['fecharecepcion'];
			$_SESSION['datos_nota_rcia_puntaje']['tiponota'] = $row_notamonitoreo['tiponota'];

			$_SESSION['datos_nota_rcia_puntaje']['chkrciapuntaje'] = $row_notamonitoreo['rcia'];



			$sql_detalle_puntuacion_rcia = "
								select v.idparcela, v.nombre, (r.anosolicitud)::numeric+2013 as anosolicitud, p.rciapresentado, p.evalcpa, p.evalcrebo, p.gabcpa,
								p.gabcrebo, p.campcpa, p.campcrebo, p.observaciones, p.idsolicitudrcia, p.idnotasmonitoreo,	p.numnotacamp
								 from monitoreo.notaspuntuacionrcia as p inner join solicitudrecepcionada as r on p.idsolicitudrcia = r.idsolicitudrecepcionada
								 inner join v_parcela as v on r.codigoparcela = v.idparcela
								 where idnotasmonitoreo = ".$_SESSION['datos_nota_rcia_puntaje']['idnotaextm']. "
								 or numnotacamp = ".$_SESSION['datos_nota_rcia_puntaje']['idnotaextm']. "
								 order by p.orden asc ";

								 //echo $sql_detalle_puntuacion_rcia;
								 //exit;

			$detallepuntuacion = pg_query($cn,$sql_detalle_puntuacion_rcia);
			$row_detallepuntuacion = pg_fetch_array ($detallepuntuacion);
			$total_row_detalle_puntuacion = pg_num_rows($detallepuntuacion);

			//echo $total_row_detalle_puntuacion;


			//$_SESSION['datos_nota_rcia_puntaje']['conteorcia']=$total_row_detalle_puntuacion;


	 }

	 else {
	 		$total_row_detalle_puntuacion = 0;
	 }




?>
