<?php
//print_r($_POST);

$sistema = 2;
if(isset($_SESSION['idprereg'])){ //definido preregistro

			if ( ($_SESSION['idprereg'] <= 10426)  && ($_SESSION['idprereg'] > 0) )
			{
			 $sistema = 1;
			}
 }
 elseif (isset($_POST['idprereg'])) //no esta definida preregistro
 {
			 if ($_POST['idprereg'] <= 10426 && ($_POST['idprereg'] > 0) )
			 {
				$sistema = 1;
			 }
 }


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1") && ($_POST["submit"]))
{

	     $_SESSION['datos_prediopre']=$_POST;
					// aqui validamos datos generales del predio//
					if(isset($_SESSION['datos_prediopre']['Codigo'])){ $id_prereg=$_SESSION['datos_prediopre']['Codigo'];}
					if (isset($_SESSION['datos_prediopre']['Departamento']) && $_SESSION['datos_prediopre']['Departamento'] ==0 )
					{ trigger_error ("Se debe seleccionar el municipio al que pertenece el Predio", E_USER_ERROR);			}
					elseif ($_SESSION['datos_prediopre']['TipoPredio'] ==0)
					{   trigger_error ("Se Debe Especificar El Tipo de Propiedad del Predio", E_USER_ERROR); }
					elseif (  ($_SESSION['datos_prediopre']['Superficie']) <  ($_SESSION['datos_prediopre']['Superficiedef'])  )
					{   trigger_error ("La superfice Deforestada Ilegal no puede ser Mayor a la Superficie Total del Predio", E_USER_ERROR); }
					elseif ($_SESSION['datos_prediopre']['Actividad'] ==0)
					{   trigger_error ("Se Debe Especificar La Actividad del Predio", E_USER_ERROR); }
					elseif ($_SESSION['datos_prediopre']['Asesoramiento'] ==0)
					{ trigger_error ("Se Debe Especificar Quien Asesoro el Preregistro del Predio", E_USER_ERROR); }
					// aqui validamos representante legal o propietario//
					elseif ( ($sistema == 2) && ($_SESSION['datos_prediopre']['IdRepLegal'] ==0) )
					{
						trigger_error ("Se Debe Especificar el Representante Legal y / o beneficiario", E_USER_ERROR);
					}
					// aqui validamos datos del preregistro //
					elseif ($_SESSION['datos_prediopre']['Auxiliar'] =="")
					{ trigger_error ("Se Debe Especificar el nombre del Agente Auxiliar", E_USER_ERROR); }
					elseif ($_SESSION['datos_prediopre']['RespVDRA'] ==0)
					{ trigger_error ("Se Debe Especificar el Tecnico que realizo el Preregistro", E_USER_ERROR); }
					elseif ($_SESSION['datos_prediopre']['OfRegistro'] ==0)
					{ trigger_error ("Se Debe Especificar la Oficina en la que se esta Preregistrando el Predio", E_USER_ERROR); }

			else{
				  $est=0;
					if ( ($_SESSION['datos_prediopre']['plano']==1) && ($_SESSION['datos_prediopre']['cd']==1) && ($_SESSION['datos_prediopre']['docddpp']==1) )
					{
						$est=1;
					}

					$pe = 0;
					$dep="";
					 if(isset($_SESSION['datos_prediopre']['Departamento'])){$dep=$_SESSION['datos_prediopre']['Departamento']; $Departamento=$_SESSION['datos_prediopre']['Departamento']; $_SESSION['Departamento']=$Departamento;}
					 else{$dep=$_SESSION['Departamento'];}


					if ($sistema == 1)
					{
					$insertaux=sprintf("select * from preregistro.f_guardar_preregistro (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s);",
												 GetSQLValueString(trim($_SESSION['datos_prediopre']['Codigo']), "int"),
												 GetSQLValueString(trim(strtoupper($_SESSION['datos_prediopre']['NombrePredio'])), "text"),
												 GetSQLValueString(trim($dep), "int"),
												 GetSQLValueString(trim($_SESSION['datos_prediopre']['Superficie']), "double"),
												 GetSQLValueString(trim($_SESSION['datos_prediopre']['Superficiedef']), "double"),
												 GetSQLValueString(trim($est), "int"),
												 GetSQLValueString($_SESSION['datos_prediopre']['fecharec'], "date"),
												 GetSQLValueString($_SESSION['datos_prediopre']['TipoPredio'], "int"),
												 GetSQLValueString($_SESSION['datos_prediopre']['Actividad'], "int"),
												 GetSQLValueString($_SESSION['datos_prediopre']['Asesoramiento'], "int"),
												 GetSQLValueString(trim($_SESSION['datos_prediopre']['OfRegistro']), "int"),
												 GetSQLValueString(trim(strtoupper ($_SESSION['datos_prediopre']['Auxiliar'])), "text"),
												 GetSQLValueString(trim($_SESSION['datos_prediopre']['RespVDRA']), "int"),
											 	 GetSQLValueString(trim(strtoupper($_SESSION['datos_prediopre']['codPreregistroRegional'])), "text"),
                                                                                                 GetSQLValueString(trim($pe), "int"));

					// echo"con1=".$insertaux;
                                        $Result2 = pg_query($cn, $insertaux);
					$row_parcela = pg_fetch_array ($Result2);
					$cod_parcela=$row_parcela['f_guardar_preregistro'];
					$_SESSION['idprereg']=$cod_parcela;



					$insertaux2=sprintf("select * from preregistro.f_guardar_persona (%s, %s, %s, %s, %s, %s);",
												 GetSQLValueString(trim($cod_parcela), "int"),
												 GetSQLValueString(trim(strtoupper($_SESSION['datos_prediopre']['nombeneficiario'])), "text"),
												 GetSQLValueString($_SESSION['datos_prediopre']['tipodoc'], "int"),
												 GetSQLValueString(trim(strtoupper($_SESSION['datos_prediopre']['numdoc'])), "text"),
												 GetSQLValueString(trim(strtoupper($_SESSION['datos_prediopre']['telefono'])), "text"),
												 GetSQLValueString(trim(strtoupper($_SESSION['datos_prediopre']['email'])), "text"));
					$Result3 = pg_query($cn, $insertaux2);


					$insertaux3=sprintf("select * from preregistro.f_guardar_requisitos (%s, %s, %s, %s, %s);",
												 GetSQLValueString(trim($cod_parcela), "int"),
												 GetSQLValueString(trim(strtoupper($_SESSION['datos_prediopre']['plano'])), "int"),
												 GetSQLValueString(trim(strtoupper($_SESSION['datos_prediopre']['cd'])), "int"),
												 GetSQLValueString(trim(strtoupper($_SESSION['datos_prediopre']['formulario'])), "int"),
												 GetSQLValueString(trim(strtoupper($_SESSION['datos_prediopre']['docddpp'])), "int"));
					$Result4 = pg_query($cn, $insertaux3);
					}

					elseif ( $sistema == 2 )
					{

						$insertaux=sprintf("select * from preregistro.f_guardar_preregistro (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s);",
													 GetSQLValueString(trim($_SESSION['datos_prediopre']['Codigo']), "int"),
													 GetSQLValueString(trim(strtoupper($_SESSION['datos_prediopre']['NombrePredio'])), "text"),
													 GetSQLValueString(trim($dep), "int"),
													 GetSQLValueString(trim($_SESSION['datos_prediopre']['Superficie']), "double"),
													 GetSQLValueString(trim($_SESSION['datos_prediopre']['Superficiedef']), "double"),
													 GetSQLValueString(trim($est), "int"),
													 GetSQLValueString($_SESSION['datos_prediopre']['fecharec'], "date"),
													 GetSQLValueString($_SESSION['datos_prediopre']['TipoPredio'], "int"),
													 GetSQLValueString($_SESSION['datos_prediopre']['Actividad'], "int"),
													 GetSQLValueString($_SESSION['datos_prediopre']['Asesoramiento'], "int"),
													 GetSQLValueString(trim($_SESSION['datos_prediopre']['OfRegistro']), "int"),
													 GetSQLValueString(trim(strtoupper ($_SESSION['datos_prediopre']['Auxiliar'])), "text"),
													 GetSQLValueString(trim($_SESSION['datos_prediopre']['RespVDRA']), "int"),
												 	 GetSQLValueString($_SESSION['datos_prediopre']['IdRepLegal'],"int"),
                                                                                                        GetSQLValueString(trim(strtoupper($_SESSION['datos_prediopre']['codPreregistroRegional'])), "text"));

						 //echo"con2=".$insertaux;
                                                 $Result2 = pg_query($cn, $insertaux);
						$row_parcela = pg_fetch_array ($Result2);
						$cod_parcela=$row_parcela['f_guardar_preregistro'];
						$_SESSION['idprereg']=$cod_parcela;
						//echo $insertaux;


						$insertaux3=sprintf("select * from preregistro.f_guardar_requisitos (%s, %s, %s, %s, %s);",
													 GetSQLValueString(trim($cod_parcela), "int"),
													 GetSQLValueString(trim(strtoupper($_SESSION['datos_prediopre']['plano'])), "int"),
													 GetSQLValueString(trim(strtoupper($_SESSION['datos_prediopre']['cd'])), "int"),
													 GetSQLValueString(trim(strtoupper($_SESSION['datos_prediopre']['formulario'])), "int"),
													 GetSQLValueString(trim(strtoupper($_SESSION['datos_prediopre']['docddpp'])), "int"));
						$Result4 = pg_query($cn, $insertaux3);
					}


					if (!(isset($_SESSION['ErrorThrown']) && $_SESSION['ErrorThrown'] != "")) {
				 	  echo '<script>parent.document.location.href="MenuPreregistro.php?aux=3&datosguardados=ok";</script>';
				 }
		}
}



else
{

		if(!isset($_SESSION['idprereg'])){
					$idprereg=0;

				 if(isset($_POST['idprereg']))
				 {
					$idprereg=$_POST['idprereg'];
				 }

				 $_SESSION['idprereg']=$idprereg;
				// echo "lll".$_SESSION['idprereg'];
		 }


      if($_SESSION['idprereg']>0)
			{

				 $sql_predio = "select pre.*, req.plano, req.cd, req.formulario, req.docpropietario
										 FROM  preregistro.preregistro as pre left join preregistro.requisitos as req on pre.idpreregistro = req.idpreregistro
										 WHERE pre.idpreregistro=".$_SESSION['idprereg'];
				 
                                // echo "con selec=".$sql_predio;
                                  $predio = pg_query($cn,$sql_predio);
				 $row_predio = pg_fetch_array ($predio);
				 $totalRows_predio = pg_num_rows($predio);
				 $_SESSION['datos_prediopre']['Codigo'] = $row_predio['idpreregistro'];
				 $_SESSION['datos_prediopre']['Departamento'] = $row_predio['municipio'];
				 $_SESSION['datos_prediopre']['NombrePredio'] = $row_predio['nombrepredio'];
				 $_SESSION['datos_prediopre']['Superficie'] = $row_predio['superficietotal'];
				 $_SESSION['datos_prediopre']['Superficiedef'] = $row_predio['superficiedeforestada'];
				 $_SESSION['datos_prediopre']['TipoPredio'] = $row_predio['tipopropiedad'];
				 $_SESSION['datos_prediopre']['Actividad'] = $row_predio['clasificacion'];
				 $_SESSION['datos_prediopre']['Asesoramiento'] = $row_predio['asesoramiento'];
				 $_SESSION['datos_prediopre']['fecharec'] = $row_predio['fecharecepcion'];
				 $_SESSION['datos_prediopre']['IdRepLegal'] = $row_predio['idpersona'];
				 $_SESSION['datos_prediopre']['docddpp'] = $row_predio['docpropietario'];
				 $_SESSION['datos_prediopre']['plano'] = $row_predio['plano'];
				 $_SESSION['datos_prediopre']['cd'] = $row_predio['cd'];
				 $_SESSION['datos_prediopre']['formulario'] = $row_predio['formulario'];
				 $_SESSION['datos_prediopre']['Auxiliar'] = $row_predio['agenteaux'];
				 $_SESSION['datos_prediopre']['RespVDRA'] = $row_predio['funcionario'];
				 $_SESSION['datos_prediopre']['OfRegistro'] = $row_predio['oficina'];
                                 $_SESSION['datos_prediopre']['codPreregistroRegional'] =  $row_predio['codpreregistroregional'];


			/*	 $sql_listadoderivado="select d.*, f.idfuncionario, p.nomcompleto
				 from preregistro.derivacionprereg as d inner join funcionario as f on d.idfuncionario = f.idfuncionario inner join v_persona as p on p.idpersona = f.idpersona
				 where idpreregistro = ".$_SESSION['idprereg'] ;
				 $listadoderivado = pg_query($cn,$sql_listadoderivado);
				 $row_listadoderivado = pg_fetch_array ($listadoderivado);
			   $totalRows_derivado = pg_num_rows($listadoderivado); */


				  if( $sistema == 1 )
					{

						$sql_representanteant = "select * from preregistro.personapre as per where per.idpreregistro =" .$_SESSION['idprereg'];
						$representanteant = pg_query($cn,$sql_representanteant);
						$row_representanteant = pg_fetch_array ($representanteant);
					//	$_SESSION['datos_prediopre']['ReprLegal']=$row_representanteant[''];


					}else
					{
						$sql_representante = "Select pre.idpreregistro, nombre1, nombre2, apellidopat, apellidomat, direcciondom, telefono, email, p.idpersona
						FROM preregistro.preregistro as pre inner join persona as p on p.idpersona = pre.idpersona where pre.idpreregistro =" .$_SESSION['idprereg'];
						$representante = pg_query($cn,$sql_representante);
						$row_representante = pg_fetch_array ($representante);
						$nombrerepresentate=trim($row_representante['nombre1'])." ".trim($row_representante['nombre2'])." ".trim($row_representante['apellidopat'])." ".trim($row_representante['apellidomat']);
				     $_SESSION['datos_prediopre']['ReprLegal']=$nombrerepresentate;
						 $_SESSION['datos_prediopre']['Direccion']= trim($row_representante['direcciondom']);
						 $_SESSION['datos_prediopre']['IdRepLegal']= trim($row_representante['idpersona']);
						 $_SESSION['datos_prediopre']['Email']= trim($row_representante['email']);
						 $_SESSION['datos_prediopre']['Telefono']= trim($row_representante['telefono']);
					}

		 }


}





?>
