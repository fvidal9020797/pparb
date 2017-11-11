<?php

if(isset($_POST['Codigo'])){
	$datos_predio=$_POST;
	$_SESSION['datos_predio']=$datos_predio;
}
if ((isset($_POST["New_Predio"])) && ($_POST["New_Predio"] == "Guardar"))
{
 if($_POST['New_Predio']=='Guardar'){

			/////////////////validacion de datos obligatorios///////////////
			if(isset($_SESSION['datos_predio']['Codigo'])){ $cod_par=$_SESSION['datos_predio']['Codigo'];}
			if (isset($_SESSION['datos_predio']['Departamento']) && $_SESSION['datos_predio']['Departamento'] ==0 )
			{   trigger_error ("Se debe seleccionar el municipio al que pertenece el Predio", E_USER_ERROR); }
			elseif (trim($_SESSION['datos_predio']['NombrePredio']) =="")
			{   trigger_error ("Se Debe Especificar El Nombre del Predio", E_USER_ERROR); }
			elseif (trim($_SESSION['datos_predio']['Superficie']) =="")
			{ trigger_error ("Se Debe Especificar La Superficie Total del Predio", E_USER_ERROR); }
			elseif ($_SESSION['datos_predio']['TipoPredio'] ==0)
			{   trigger_error ("Se Debe Especificar El Tipo de Propiedad del Predio", E_USER_ERROR); }
			elseif ($_SESSION['datos_predio']['Situacion'] ==0)
			{ trigger_error ("Se Debe Especificar La Situacion Juridica del Predio", E_USER_ERROR); }
			elseif ($_SESSION['datos_predio']['Actividad'] ==0)
			{   trigger_error ("Se Debe Especificar La Actividad del Predio", E_USER_ERROR); }
			elseif ($_SESSION['datos_predio']['Asesoramiento'] ==0)
			{ trigger_error ("Se Debe Especificar Quien Asesoro para el Registro del Predio", E_USER_ERROR); }
			elseif ($_SESSION['datos_predio']['Actividad2'] ==0)
			{   trigger_error ("Se Debe Especificar La Actividad del Predio Para el Compromiso con el programa", E_USER_ERROR); }
			elseif ($_SESSION['datos_predio']['SectorProductivo'] ==0)
			{   trigger_error ("Se Debe Especificar El Sector Productivo del Predio", E_USER_ERROR); }
			elseif ($_SESSION['datos_predio']['SectorSocial'] ==0)
			{ trigger_error ("Se Debe Especificar el Sector Social del Predio", E_USER_ERROR); }
			elseif(!( (isset($_SESSION['datos_predio']['51']) && trim($_SESSION['datos_predio']['51'])!="")  or
			          (isset($_SESSION['datos_predio']['52']) && trim($_SESSION['datos_predio']['52'])!="") or
					  (isset($_SESSION['datos_predio']['53']) && trim($_SESSION['datos_predio']['53'])!="") or
					  (isset($_SESSION['datos_predio']['54']) && trim($_SESSION['datos_predio']['54'])!="") or
					  (isset($_SESSION['datos_predio']['55']) && trim($_SESSION['datos_predio']['55'])!="") )){trigger_error ("Se Debe Especificar al menos un Documento que acredite derecho propietario", E_USER_ERROR);}
			elseif ($_SESSION['datos_predio']['IdRepLegal'] ==0)
			{ trigger_error ("Se Debe Especificar quien el es Representante Legal del Predio", E_USER_ERROR); }
			elseif (trim($_SESSION['datos_predio']['Notificacion']) =="")
			{   trigger_error ("Se Debe Especificar La Direccion para Notificacion del Predio", E_USER_ERROR); }
			elseif ($_SESSION['datos_predio']['conteo'] ==0)
			{ trigger_error ("Se Debe Especificar al menos un Beneficiario del Predio", E_USER_ERROR); }
			elseif ($_SESSION['datos_predio']['Auxiliar'] =="")
			{ trigger_error ("Se Debe Especificar al Agente Auxiliar", E_USER_ERROR); }
			elseif ($_SESSION['datos_predio']['RespABT'] ==0)
			{ trigger_error ("Se Debe Especificar al Responsabe Tecnico ABT", E_USER_ERROR); }
			elseif ($_SESSION['datos_predio']['RespVDRA'] ==0)
			{ trigger_error ("Se Debe Especificar al Responsabe Tecnico VDRA", E_USER_ERROR); }
			elseif ($_SESSION['datos_predio']['OfRegistro'] ==0)
			{ trigger_error ("Se Debe Especificar la Oficina en la que se esta Registrando el Predio", E_USER_ERROR); }
			elseif (  ($_SESSION['datos_predio']['OfRegistro'] ==127) && (trim(strtoupper($_SESSION['datos_predio']['codprereg'])) == "")   )
			{
				trigger_error ("Se Debe Anotar el Codigo de Preregistro de la Carpeta", E_USER_ERROR);
			}

			else{   $estado=136;  $Causal=0;
				  	if(isset($_SESSION['datos_predio']['estado'])&& $_SESSION['datos_predio']['estado'] != "" && $_SESSION['datos_predio']['estado']!=146 )
						{
							$estado=$_SESSION['datos_predio']['estado'];
						}
					elseif(isset($_SESSION['datos_predio']['estado'])&& $_SESSION['datos_predio']['estado']==146 )
					{
						$estado=136;
					}
					//pedio rechazado
					if (isset($_SESSION['datos_predio']['66']) or isset($_SESSION['datos_predio']['67']) or isset($_SESSION['datos_predio']['68']) or isset($_SESSION['datos_predio']['69']) or isset($_SESSION['datos_predio']['225']))
					{
						$estado=146;	$Causal=1;
					}
					//ley 502 PAS
					elseif(isset($_SESSION['datos_predio']['162']) or isset($_SESSION['datos_predio']['163']) or isset($_SESSION['datos_predio']['164']) or isset($_SESSION['datos_predio']['165']) or isset($_SESSION['datos_predio']['186']))
					{
						$Causal=2;
					}


				 $_SESSION['Causal']=$Causal;
				 $dep="";
				  if(isset($_SESSION['datos_predio']['Departamento'])){$dep=$_SESSION['datos_predio']['Departamento']; $Departamento=$_SESSION['datos_predio']['Departamento']; $_SESSION['Departamento']=$Departamento;}
				  else{$dep=$_SESSION['Departamento'];}
				  //echo $estado;
					$insertaux=sprintf("select * from f_predio (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s,%s, %s, %s);",
												 GetSQLValueString(trim(strtoupper($_SESSION['datos_predio']['Codigo'])), "text"),
												 GetSQLValueString(trim($dep), "int"),
												 GetSQLValueString(trim(strtoupper($_SESSION['datos_predio']['NombrePredio'])), "text"),
												 GetSQLValueString(trim($_SESSION['datos_predio']['Superficie']), "double"),
												 GetSQLValueString($_SESSION['datos_predio']['TipoPredio'], "int"),
												 GetSQLValueString($_SESSION['datos_predio']['Situacion'], "int"),
												 GetSQLValueString($_SESSION['datos_predio']['Actividad'], "int"),
												 GetSQLValueString($_SESSION['datos_predio']['Asesoramiento'], "int"),
												 GetSQLValueString(trim($_SESSION['datos_predio']['IdRepLegal']), "int"),
												 GetSQLValueString(trim(strtoupper ($_SESSION['datos_predio']['Notificacion'])), "text"),
												 GetSQLValueString(trim(strtoupper ($_SESSION['datos_predio']['NumPoder'])), "text"),
												 GetSQLValueString(trim(strtoupper ($_SESSION['datos_predio']['Auxiliar'])), "text"),
												 GetSQLValueString(trim($_SESSION['datos_predio']['RespABT']), "int"),
												 GetSQLValueString(trim($_SESSION['datos_predio']['RespVDRA']), "int"),
												 GetSQLValueString(trim($estado), "int"),
												 GetSQLValueString(trim($_SESSION['datos_predio']['OfRegistro']), "int"),
												 GetSQLValueString(trim($_SESSION['datos_predio']['RObservacion']), "text"),
												 GetSQLValueString(trim($_SESSION['idreg']), "int"),
												 GetSQLValueString(trim($_SESSION['datos_predio']['SectorProductivo']), "int"),
												 GetSQLValueString(trim($_SESSION['datos_predio']['SectorSocial']), "int"),
												 GetSQLValueString(trim($_SESSION['datos_predio']['Actividad2']), "int"),
												 GetSQLValueString(trim(strtoupper($_SESSION['datos_predio']['codprereg'])), "int"));
			         $Result2 = pg_query($cn, $insertaux);
					//echo $insertaux;
					$row_parcela = pg_fetch_array ($Result2);
					$cod_parcela=$row_parcela['f_predio'];
					//echo $cod_parcela."sss";
					$_SESSION['cod_parcela']=$cod_parcela;

					///hallando el idreg
					if(!isset($_SESSION['idreg']) || $_SESSION['idreg']<=0)
					{	$Result2 = pg_query($cn, "select idregistro from registro where idparcela='".$cod_parcela."'");
						$row_parcela = pg_fetch_array ($Result2);
						$idreg=$row_parcela['idregistro'];
						$_SESSION['idreg']=$idreg;
					}
					 /////////////elimar todos los propietarios////////////////////
					$Result2 = pg_query($cn, "delete from parcelabeneficiario where idparcela='".$cod_parcela."'");
					 /////////////insertar a los propietarios actuales////////////

					for ($i = 1; $i <=$_SESSION['datos_predio']['conteo'] ; $i++) {
						 if(isset($_SESSION['datos_predio']['idp'.$i]) && $_SESSION['datos_predio']['idp'.$i]!=""){
							 $insertUSR2=sprintf("insert into parcelabeneficiario values(%s,%s,%s);",
												 GetSQLValueString($_SESSION['datos_predio']['idp'.$i], "int"),
												 GetSQLValueString($_SESSION['cod_parcela'], "text"),0);

							 $Result2 = pg_query($cn, $insertUSR2);
							 //echo $insertUSR2;
						 }
					}
					/////insertando a los miembros de la comunidad
					for ($i = 1; $i <=$_SESSION['datos_predio']['conteoA'] ; $i++) {
						 if(isset($_SESSION['datos_predio']['idpA'.$i]) && $_SESSION['datos_predio']['idpA'.$i]!=""){
							 $insertUSR2=sprintf("insert into parcelabeneficiario values(%s,%s,%s);",
												 GetSQLValueString($_SESSION['datos_predio']['idpA'.$i], "int"),
												 GetSQLValueString($_SESSION['cod_parcela'], "text"),1);

							 $Result2 = pg_query($cn, $insertUSR2);
							// echo $insertUSR2;
						 }
					}
					//insertando los documentos presentados
					//$result=pg_query($cn,"delete from docpresentados where idparcela='".$cod_parcela."'");
					//echo "delete from docpresentados where idparcela='".$cod_parcela."'";
					$sql_documento = "Select idcodificadores From codificadores Where idclasificador=3 Order by idcodificadores";
					$documento = pg_query($cn,$sql_documento) ;
					$row_documento = pg_fetch_array ($documento);

					 do
					 {
					    $i=$row_documento['idcodificadores'];
					   if(isset($_SESSION['datos_predio'][$i])){
						     $insertaux=sprintf("select * from f_DocPresentado (%s, %s, %s, %s);",
																	 GetSQLValueString(trim($_SESSION['cod_parcela']), "text"),
																	 GetSQLValueString($i, "int"),//idtipodoc
																	 GetSQLValueString(trim(strtoupper ($_SESSION['datos_predio'][$i])), "text"),1); //observaciones
						}
						else
						{
							 $insertaux=sprintf("select * from f_DocPresentado (%s, %s, %s, %s);",
																	 GetSQLValueString(trim($_SESSION['cod_parcela']), "text"),
																	 GetSQLValueString($i, "int"),//idtipodoc
																	 GetSQLValueString(" ", "text"),0); //observaciones

						}
						//echo $insertaux;
						$Result2 = pg_query($cn, $insertaux);
					  }while ($row_documento = pg_fetch_assoc($documento));

					 /// insertando causales de rechazo
					$result=pg_query($cn,"delete from causalesrechazo where idregistro=".$_SESSION['idreg']);
					//echo $result;
					//exit;
					$sql_documento = "Select idcodificadores From \"codificadores\" Where \"idclasificador\"=7 Order by \"idcodificadores\"";
					$documento = pg_query($cn,$sql_documento) ;
					$row_documento = pg_fetch_array ($documento);

					 do{
					    $i=$row_documento['idcodificadores'];

					   if(isset($_SESSION['datos_predio'][$i]))
						 {
						     $insertaux=sprintf("select * from f_CausalesRechazo (%s, %s, %s);",
																	 GetSQLValueString(trim($_SESSION['idreg']), "int"),
																	 GetSQLValueString($i, "int"),//idtipodoc
																	 GetSQLValueString(trim(strtoupper ($_SESSION['datos_predio'][$i])), "text")); //observaciones
							 //echo $insertaux;
							 	$Result2 = pg_query($cn, $insertaux);
						}

					  }while ($row_documento = pg_fetch_assoc($documento));

					 //insertando las superficies de rechazo total y parcial
					 if(isset($_SESSION['datos_predio']['suprechazadaT'])){
					 		 $insertaux=sprintf("select * from f_SupGeneral (%s, %s, %s);",
													 GetSQLValueString(259, "int"),
													 GetSQLValueString($_SESSION['idreg'], "int"),
													 GetSQLValueString($_SESSION['datos_predio']['suprechazadaT'], "double"));

							$Result2 = pg_query($cn, $insertaux);
					 }
					 if(isset($_SESSION['datos_predio']['suprechazadaP'])){
					        $insertaux=sprintf("select * from f_SupGeneral (%s, %s, %s);",
													 GetSQLValueString(260, "int"),
													 GetSQLValueString($_SESSION['idreg'], "int"),
													 GetSQLValueString($_SESSION['datos_predio']['suprechazadaP'], "double"));
							$Result2 = pg_query($cn, $insertaux);

					 }

				if(isset($_SESSION['cod_par'])){session_unregister('cod_par');}

				if (!(isset($_SESSION['ErrorThrown']) && $_SESSION['ErrorThrown'] != ""))
					{ /*echo '<script>window.top.location.href="Formulario001.php?aux=1"; window.close();</script>';*/
					 	echo '<script>parent.document.location.href="Formulario001.php?aux=1&datosguardados=ok";</script>';
					}
		}
  }
}elseif(!isset($_SESSION['datos_predio']))
{      //no hay parcela registrada
        if(!isset($_SESSION['idreg'])){
			$idreg=0; $_SESSION['idreg']=$idreg;
		}

        $sql_predio = "SELECT *	FROM  registro,   parcelas
					   WHERE registro.idparcela = parcelas.idparcela and registro.idregistro=".$_SESSION['idreg'];
		$predio = pg_query($cn,$sql_predio);
		$row_predio = pg_fetch_array ($predio);
		$totalRows_predio = pg_num_rows($predio);

		if($totalRows_predio>0){
			$cod_parcela=$row_predio['idparcela'];
			}else{$cod_parcela="";}
		$_SESSION['cod_parcela']=$cod_parcela;

		$sql_funcvdra = "SELECT fr.idfuncionario FROM  funcionarioregistro as fr,   funcionario as f
					   WHERE fr.idfuncionario = f.idfuncionario and (f.cargo=137 or f.cargo=189)  and fr.idregistro=".$_SESSION['idreg'];
		$funcvdra = pg_query($cn,$sql_funcvdra);
		$row_funcvdra = pg_fetch_array ($funcvdra);



		$sql_funcabt = "SELECT fr.idfuncionario	FROM  funcionarioregistro as fr,   funcionario as f
					   WHERE fr.idfuncionario = f.idfuncionario and (cargo=138 or cargo=183)  and fr.idregistro=".$_SESSION['idreg'];
		$funcabt = pg_query($cn,$sql_funcabt);
		$row_funcabt = pg_fetch_array ($funcabt);

		$sql_representante = "Select nombre1, nombre2, apellidopat, apellidomat, direcciondom, telefono, email, direccionnotificacion, numdocpoder, persona.idpersona FROM parcelas INNER JOIN registro ON parcelas.idparcela=registro.idparcela LEFT JOIN representante ON parcelas.idparcela=representante.idparcela LEFT JOIN persona ON persona.idpersona=representante.idpersona where representante.vigente='H' and parcelas.idparcela='".$_SESSION['cod_parcela']."'";
		$representante = pg_query($cn,$sql_representante);
		$row_representante = pg_fetch_array ($representante);
		$nombrerepresentate=trim($row_representante['nombre1'])." ".trim($row_representante['nombre2'])." ".trim($row_representante['apellidopat'])." ".trim($row_representante['apellidomat']);
		//echo "ssss".$sql_representante;

		$sql_beneficiarios = "Select * FROM parcelabeneficiario as pb,persona LEFT JOIN codificadores ON codificadores.idcodificadores=persona.idtipopersona WHERE  persona.idpersona=pb.idpersona and persona.idpersona NOT IN (Select idpersona FROM funcionario) AND pb.poblador=0  AND pb.idparcela='".$_SESSION['cod_parcela']."' Order by nombre1,apellidopat";
		$beneficiarios = pg_query($cn,$sql_beneficiarios);
		$row_beneficiarios = pg_fetch_array ($beneficiarios);
		$totalRows_beneficiarios = pg_num_rows($beneficiarios);
		//echo  $sql_beneficiarios;
		$sql_pago = "Select * FROM superficieregistro WHERE idregistro=".$_SESSION['idreg'];
		$pago = pg_query($cn,$sql_pago);
		$totalRows_pago = pg_num_rows($pago);
		if($totalRows_pago>0){
			$BoletaPago="ok"; $_SESSION['BoletaPago']=$BoletaPago;
		}
		//verificando si existe pas elseif(isset($_SESSION['datos_predio']['162']) or isset($_SESSION['datos_predio']['163']) or isset($_SESSION['datos_predio']['164']) or isset($_SESSION['datos_predio']['165']) or isset($_SESSION['datos_predio']['186'])){$Causal=2; }
		$sql_consulta = "Select * From causalesrechazo Where  idrechazo>161 and idrechazo<187 and  idregistro=".$_SESSION['idreg'];
		$consulta = pg_query($cn,$sql_consulta) ;
		$row_consulta = pg_fetch_array ($consulta);
		$totalRows_consulta = pg_num_rows($consulta);
		if($totalRows_consulta>0){
		  $_SESSION['Causal']=2;
		}


}
//*******************************************************************************************************************//
//*********************************************GENERAR CODIGO DE PARCELA*********************************************//
		if(isset($_GET['Departamento'])){
		  $Departamento=$_GET["Departamento"];
		   $_SESSION['Departamento']=$Departamento;
		}
//********************************************* FIN DE GENERACION CODIGO PARCELA *********************************************

$sql_obser = "SELECT obsregistro FROM  registro
			   WHERE  registro.idregistro=".$_SESSION['idreg'];
$obser = pg_query($cn,$sql_obser);
$row_obser = pg_fetch_array ($obser);

$sql_suprechazadaT = "SELECT  * FROM  superficieregistro
			   WHERE  idtiposuperficie=259 and idregistro=".$_SESSION['idreg']." order by idtiposuperficie ";
$suprechazadaT = pg_query($cn,$sql_suprechazadaT);
$row_suprechazadaT = pg_fetch_array ($suprechazadaT);

$sql_suprechazadaP = "SELECT  * FROM  superficieregistro
			   WHERE  idtiposuperficie=260 and idregistro=".$_SESSION['idreg']." order by idtiposuperficie ";
$suprechazadaP = pg_query($cn,$sql_suprechazadaP);
$row_suprechazadaP = pg_fetch_array ($suprechazadaP);

?>
