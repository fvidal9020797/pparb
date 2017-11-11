<?php
//print_r($_POST);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1") && (isset($_POST["submit"])) &&($_POST["submit"]))
{


	     $_SESSION['datos_nota_ext']=$_POST;


					if ($_SESSION['datos_nota_ext']['comboremitente'] ==0)
					{ trigger_error ("Debe Especificar el Remitente", E_USER_ERROR);			}
					elseif ($_SESSION['datos_nota_ext']['combodestinatario'] ==0)
					{   trigger_error ("Debe Especificar el Destinatario", E_USER_ERROR); }
					elseif ($_SESSION['datos_nota_ext']['comboaccion'] ==0)
					{   trigger_error ("Debe Especificar la Accion de la Nota a Derivar", E_USER_ERROR); }
					elseif ($_SESSION['datos_nota_ext']['combodestinatario'] == $_SESSION['datos_nota_ext']['comboremitente'])
					{   trigger_error ("El Destinatario no puede ser el mismo del Remitente", E_USER_ERROR); }
					elseif (trim($_SESSION['datos_nota_ext']['conteo'])==0)
					{   trigger_error ("Debe existir al menos un Solicitud en la Nota", E_USER_ERROR); }

			else{


					// GUARDAMOS LA NOTA
					$idfun = $_SESSION['MM_UserId'];

					//echo $_SESSION['datos_nota_ext']['idnotaext'];
					//exit;


					$insertaux=sprintf("select * from f_nota_externa (%s, %s, %s, %s);",
												 GetSQLValueString(trim($_SESSION['datos_nota_ext']['idnotaext']), "int"),
												 GetSQLValueString(trim(strtoupper($_SESSION['datos_nota_ext']['neobservacion'])), "text"),
												 GetSQLValueString(trim($idfun), "int"),
											 	 GetSQLValueString(trim(strtoupper($_SESSION['datos_nota_ext']['cite'])), "text"));
					//echo $insertaux;
					//exit;
					$Result = pg_query($cn, $insertaux);
					$row_nota_ext = pg_fetch_array ($Result);
					$idnota_ext= $row_nota_ext['f_nota_externa'];
					$_SESSION['datos_nota_ext']['idnotaext']=$idnota_ext;

					// GUARDAMOS LA DERIVACION DE LA NOTA
					$fecharec = null;
					$numder = 1;
                                          $chekRCIA=0;
                                        if (empty($_SESSION['datos_nota_ext']['rciachk']))
																				{
                                                   $chekRCIA=0;
                                        }
																				else
																				{
                                                    $chekRCIA=$_SESSION['datos_nota_ext']['comboaccionrcia'];
                                        }
																				$_SESSION['datos_nota_ext']['comboaccionrcia'] = $chekRCIA;

                                        //trigger_error ("Connnn=".$chekRCIA, E_USER_ERROR);
					$insertaux1=sprintf("select * from f_derivar_nota_ext (%s, %s, %s, %s, %s, %s, %s, %s, %s);",
												 GetSQLValueString(trim($_SESSION['datos_nota_ext']['idnotaext']), "int"),
												 GetSQLValueString($_SESSION['datos_nota_ext']['comboremitente'], "int"),
												 GetSQLValueString($_SESSION['datos_nota_ext']['combodestinatario'], "int"),
												 GetSQLValueString($fecharec, "date"),
												 GetSQLValueString($_SESSION['datos_nota_ext']['fechaderiv'], "date"),
												 GetSQLValueString($_SESSION['datos_nota_ext']['comboaccion'], "int"),
												 GetSQLValueString(trim($numder), "int"),
												 GetSQLValueString($_SESSION['datos_nota_ext']['proveido'], "text"),
                                                                                                 $chekRCIA);



					  $Result1 = pg_query($cn, $insertaux1);
                                            $row_derivacion = pg_fetch_array ($Result1);
                                            $idderivacion= $row_derivacion['f_derivar_nota_ext'];
                                            $_SESSION['datos_nota_ext']['idder']=$idderivacion;



                                            // INSERTAMOS LAS SOLICITUDES DE LA NOTA
                                            $Resultdelete = pg_query($cn, "delete from detallenotaext where idnotaext=".$_SESSION['datos_nota_ext']['idnotaext']);
                                            //$chekRCIA= 0$_SESSION['datos_nota_ext']['rciachk'];
                                            $chekRCIA=0;
                                            if (empty( $_SESSION['datos_nota_ext']['rciachk'])){
                                                   $chekRCIA=0;
                                                  }else{
                                                    $chekRCIA=$_SESSION['datos_nota_ext']['comboaccionrcia'];
                                                    }

                                            $idaccion=0;
                                            $idaccion=GetSQLValueString($_SESSION['datos_nota_ext']['comboaccion'], "int");

                                            $general="conteno=".$_SESSION['datos_nota_ext']['conteo'];

						for ($i = 1; $i <=$_SESSION['datos_nota_ext']['conteo'] ; $i++) {
                                                        $general=$general."- indice=".$i;
                                                             if(isset($_SESSION['datos_nota_ext']['idsolicitud'.$i]) && ($_SESSION['datos_nota_ext']['idsolicitud'.$i]!="")){

                                                             $insertUSR2=sprintf("insert into detallenotaext values(%s,%s,%s);",
                                                                                                     GetSQLValueString($_SESSION['datos_nota_ext']['idsolicitud'.$i], "int"),
                                                                                                     GetSQLValueString($_SESSION['datos_nota_ext']['idnotaext'], "int"),
                                                                                                     GetSQLValueString(trim($_SESSION['datos_nota_ext']['observacionesr'.$i]), "text"));

                                                              $Result2 = pg_query($cn, $insertUSR2);
                                                             // oobtenemos el check de rciachk
                                                             //
                                                              if($chekRCIA<>0 && $idaccion==315){
                                                                    //--- GUARDAR MONITOREO ---
                                                                   $idSol =$_SESSION['datos_nota_ext']['idsolicitud'.$i];//@$_POST["Codigo"];

                                                                   $insertUSR3= " select s.anosolicitud,p.idregistro from solicitudrecepcionada s inner join v_parcela as p on p.idparcela = s.codigoparcela where p.idregistro > 0 and s.idsolicitudrecepcionada=".$idSol;
                                                                   $Result3 = pg_query($cn, $insertUSR3);
                                                                   $row_accion3 = pg_fetch_array ($Result3);
                                                                   $anho_= 0;
                                                                   $idReg_= 0;
                                                                   $anho_= $row_accion3['anosolicitud']; // saco año de la solicitud
                                                                   $idReg_= $row_accion3['idregistro'];


                                                                   // sacar oficina del usuario logeado
                                                                   $oficina=0;
                                                                   $iddest_= GetSQLValueString($_SESSION['datos_nota_ext']['combodestinatario'], "int");
                                                                   $insertUSR4= " select * from funcionario   where idfuncionario=".$iddest_;
                                                                   $Result4 = pg_query($cn, $insertUSR4);
                                                                   $row_accion4 = pg_fetch_array ($Result4);
                                                                   $oficina = $row_accion4['oficina'];
                                                                   $tipoFun_ = $row_accion4['cargo'];
                                                                   $tipoFunres_ = $row_accion4['idunidad'];


                                                                   $valoracion=0;
                                                                   $idmonitoreo=0;
                                                                   $nota=0;
                                                                   $estado_=1;
                                                                   $agenteauxiliar="null";
																																	 $fechainf="null";

																																	 //echo $chekRCIA;
																																	 //exit;

																																	 /////// para pasar llenado y evaluacion de rcia
																																	 if($chekRCIA==266 || $chekRCIA==267 )
																																	 {
																																				 //--GUARDAR MONITOREO TIPO 266 LLENADO DE RCIA CON SUS GUARDAR FUNCIOANRIOS
																																				 $sql5="SELECT * from monitoreo.ff_monitoreo(".$idmonitoreo.",".$idReg_ .","
																																				 .$anho_ .",266,".$estado_ .",".$nota .","
																																				 .$valoracion.",".$agenteauxiliar.",".$oficina.",".$fechainf.")";

																																				 //echo $sql5;
																																				 //exit;
																																				 $Result5 = pg_query($cn, $sql5);
																																				 $row_accion5 = pg_fetch_array ($Result5);
																																				 $idmon = $row_accion5[0];

																																					$bosques_=0;
																																					$alimentos=0 ;
																																					if($tipoFun_==138){
																																							 $bosques_=$iddest_;
																																					}else{
																																							if($tipoFun_==137 || $tipoFunres_==252){
																																								$alimentos=$iddest_;
																																							}
																																					}
																																					$tiporegistrador=0;

																																					if($bosques_!=0){
																																							$tiporegistrador=137;
																																							$sql6="SELECT * from monitoreo.ff_funcionariomonitoreo(".$idmon.",".$bosques_.",".$tiporegistrador.")";
																																							$Result6 = pg_query($cn, $sql6);
																																					}

																																					 if($alimentos!=0){
																																							$tiporegistrador=138;
																																							$sql7="SELECT * from monitoreo.ff_funcionariomonitoreo(".$idmon.",".$alimentos.",".$tiporegistrador.")";
																																							$Result7_= pg_query($cn, $sql7);
																																					}

																																				 $sql5="SELECT * from monitoreo.ff_monitoreo(".$idmonitoreo.",".$idReg_ .","
																																				 .$anho_ .",267,".$estado_ .",".$nota .","
																																				 .$valoracion.",".$agenteauxiliar.",".$oficina.",".$fechainf.")";
																																				 $Result5 = pg_query($cn, $sql5);
																																				 $row_accion5 = pg_fetch_array ($Result5);
																																				 $idmon = $row_accion5[0];


																																				 $bosques_=0;
																																				 $alimentos=0 ;
																																				 if($tipoFun_==138){
																																							$bosques_=$iddest_;
																																				 }else{
																																						 if($tipoFun_==137 || $tipoFunres_==252){
																																							 $alimentos=$iddest_;
																																						 }
																																				 }

																																				 $tiporegistrador=0;
																																					if($bosques_!=0){
																																						 $tiporegistrador=137;
																																						 $sql6="SELECT * from monitoreo.ff_funcionariomonitoreo(".$idmon.",".$bosques_.",".$tiporegistrador.")";
																																						 $Result6 = pg_query($cn, $sql6);
																																					}
																																					if($alimentos!=0){
																																						 $tiporegistrador=138;
																																						 $sql7="SELECT * from monitoreo.ff_funcionariomonitoreo(".$idmon.",".$alimentos.",".$tiporegistrador.")";
																																						 $Result7_= pg_query($cn, $sql7);
																																					}
																																	 }


																																	 ///////// PARA DERIVAR MONITOREO DE GABINETE
																																	 if($chekRCIA==268 )
																																	 {
																																				 //--GUARDAR MONITOREO TIPO 268 MONITOREO DE GABINETE DE RCIA CON SUS GUARDAR FUNCIOANRIOS
																																				 $sql5="SELECT * from monitoreo.ff_monitoreo(".$idmonitoreo.",".$idReg_ .","
																																				 .$anho_ .",268,".$estado_ .",".$nota .","
																																				 .$valoracion.",".$agenteauxiliar.",".$oficina.",".$fechainf.")";
																																				 $Result5 = pg_query($cn, $sql5);
																																				 $row_accion5 = pg_fetch_array ($Result5);
																																				 $idmon = $row_accion5[0];

																																					$bosques_=0;
																																					$alimentos=0 ;
																																					if($tipoFun_==138){
																																							 $bosques_=$iddest_;
																																					}else{
																																							if($tipoFun_==137 || $tipoFunres_==251){
																																								$alimentos=$iddest_;
																																							}
																																					}
																																					$tiporegistrador=0;

																																					if($bosques_!=0){
																																							$tiporegistrador=137;
																																							$sql6="SELECT * from monitoreo.ff_funcionariomonitoreo(".$idmon.",".$bosques_.",".$tiporegistrador.")";
																																							$Result6 = pg_query($cn, $sql6);
																																					}

																																					 if($alimentos!=0){
																																							$tiporegistrador=138;
																																							$sql7="SELECT * from monitoreo.ff_funcionariomonitoreo(".$idmon.",".$alimentos.",".$tiporegistrador.")";
																																							$Result7_= pg_query($cn, $sql7);
																																					}

																																	 }

																																	 /////// PARA DERIVAR VERIFICACION DE CAMPO
																																	 if($chekRCIA==269)
																																	 {
																																				 //--GUARDAR MONITOREO TIPO 268 LLENADO DE RCIA CON SUS GUARDAR FUNCIOANRIOS
																																				 $sql5="SELECT * from monitoreo.ff_monitoreo(".$idmonitoreo.",".$idReg_ .","
																																				 .$anho_ .",269,".$estado_ .",".$nota .","
																																				 .$valoracion.",".$agenteauxiliar.",".$oficina.",".$fechainf.")";
																																				 $Result5 = pg_query($cn, $sql5);
																																				 $row_accion5 = pg_fetch_array ($Result5);
																																				 $idmon = $row_accion5[0];

																																					$bosques_=0;
																																					$alimentos=0 ;
																																					if($tipoFun_==138){
																																							 $bosques_=$iddest_;
																																					}else{
																																							if($tipoFun_==137 || $tipoFunres_==252){
																																								$alimentos=$iddest_;
																																							}
																																					}
																																					$tiporegistrador=0;

																																					if($bosques_!=0){
																																							$tiporegistrador=137;
																																							$sql6="SELECT * from monitoreo.ff_funcionariomonitoreo(".$idmon.",".$bosques_.",".$tiporegistrador.")";
																																							$Result6 = pg_query($cn, $sql6);
																																					}

																																					 if($alimentos!=0){
																																							$tiporegistrador=138;
																																							$sql7="SELECT * from monitoreo.ff_funcionariomonitoreo(".$idmon.",".$alimentos.",".$tiporegistrador.")";
																																							$Result7_= pg_query($cn, $sql7);
																																					}
																																				 $sql5="SELECT * from monitoreo.ff_monitoreo(".$idmonitoreo.",".$idReg_ .","
																																				 .$anho_ .",269,".$estado_ .",".$nota .","
																																				 .$valoracion.",".$agenteauxiliar.",".$oficina.",".$fechainf.")";
																																				 $Result5 = pg_query($cn, $sql5);
																																				 $row_accion5 = pg_fetch_array ($Result5);
																																				 $idmon = $row_accion5[0];
																																	 }



                                                                    // -- FIN
                                                                } //-- fin if check
							 }

						}//-- end for
                                               //  trigger_error ($general, E_USER_ERROR);


						if (!(isset($_SESSION['ErrorThrown']) && $_SESSION['ErrorThrown'] != "")) {
							echo '<script>parent.document.location.href="MenuNotasExternas.php?aux=3&datosguardados=ok";</script>';
						}

					}
}



else
{

			//$_SESSION['datos_nota_ext']['idnotaext']=$_SESSION['datos_nota_ext']['idnotaext'];
			//$idnotext=0;
			if(!isset($_SESSION['datos_nota_ext']['idnotaext']))
			{
					 if(isset($_POST['idnotaext']))
					 {
						$idnotext=$_POST['idnotaext'];
					 }
					 else
					 {
						$idnotext=0;
					 }
					 $_SESSION['datos_nota_ext']['idnotaext']=$idnotext;
			 }






			if($_SESSION['datos_nota_ext']['idnotaext']>0)
			{

				 $sql_nota = "select * from
										 	 notasexternas as e inner join (select * from derivacionnotaext where idnotaext = " .$_SESSION['datos_nota_ext']['idnotaext']."
										 order by numderivado desc limit 1) as b on e.idnotaext = b.idnotaext";

				 $nota_ext = pg_query($cn,$sql_nota);
				 $row_notaext = pg_fetch_array ($nota_ext);

				 $_SESSION['datos_nota_ext'] = $row_notaext;
				 $_SESSION['datos_nota_ext']['fechaderiv'] = $row_notaext['fechaderivacion'];
				 $_SESSION['datos_nota_ext']['neobservacion'] = $row_notaext['observaciones'];
				 $_SESSION['datos_nota_ext']['cite'] = $row_notaext['cite'];
         $_SESSION['datos_nota_ext']['rciachk'] = $row_notaext['rcia'];

			}



			$sql_detalle_nota_externa = "select d.idsolicitudext, d.idnotaext, p.idparcela, p.nombre as nombreparcela, t.nombresolicitud || ' '|| (s.anosolicitud+2013)::text as nombresolicitud, d.observacion
								from detallenotaext as d inner join solicitudrecepcionada as s on d.idsolicitudext = s.idsolicitudrecepcionada
								inner join parcelas as p on p.idparcela = s.codigoparcela
								inner join tiposolicitud as t on t.idsolicitud = s.tiposolicitud
								WHERE d.idnotaext=".$_SESSION['datos_nota_ext']['idnotaext']. "order by d.iddetallenotaext asc    ";   /// order by nombreparcela

			$detallenotaext = pg_query($cn,$sql_detalle_nota_externa);
			$row_detallenotaext = pg_fetch_array ($detallenotaext);
			$total_row_detalle_nota = pg_num_rows($detallenotaext);




		   //// para copiar
		   if(isset($_POST['copia'])){
			 $idnotext=0;
			 $_SESSION['datos_nota_ext']['idnotaext']=$idnotext;
       }



}





?>
