<?php
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
			}else{
				$cod_parcela="";
			}
		$_SESSION['cod_parcela']=$cod_parcela;

// TECNICOS FORMULARIO RCIA
	$sql_funcvdra = "SELECT fm.idmonitoreo, fm.idfuncionario, fm.tiporegistrador, m.estado
  FROM monitoreo.funcionariomonitoreo fm, monitoreo.monitoreo m
where fm.idmonitoreo=m.idmonitoreo and fm.tiporegistrador=138 and  m.idregistro=".$_SESSION['idreg']." and m.tipo=266";
		$funcvdra = pg_query($cn,$sql_funcvdra);
		$row_funcvdra = pg_fetch_array ($funcvdra);

$sql_funcabt ="SELECT fm.idmonitoreo, fm.idfuncionario, fm.tiporegistrador, m.estado
  FROM monitoreo.funcionariomonitoreo fm, monitoreo.monitoreo m
where fm.idmonitoreo=m.idmonitoreo and fm.tiporegistrador=137 and  m.idregistro=".$_SESSION['idreg']."  and m.tipo=266";
			$funcabt = pg_query($cn,$sql_funcabt);
		$row_funcabt = pg_fetch_array ($funcabt);
//TECNICOS FORMULARIO CAMPO

		$sql_funcvdrac = "SELECT fm.idmonitoreo, fm.idfuncionario, fm.tiporegistrador, m.estado
  FROM monitoreo.funcionariomonitoreo fm, monitoreo.monitoreo m
where fm.idmonitoreo=m.idmonitoreo and fm.tiporegistrador=138 and  m.idregistro=".$_SESSION['idreg']." and m.tipo=269";
		$funcvdrac = pg_query($cn,$sql_funcvdrac);
		$row_funcvdrac = pg_fetch_array ($funcvdrac);

$sql_funcabtc ="SELECT fm.idmonitoreo, fm.idfuncionario, fm.tiporegistrador, m.estado
  FROM monitoreo.funcionariomonitoreo fm, monitoreo.monitoreo m
where fm.idmonitoreo=m.idmonitoreo and fm.tiporegistrador=137 and  m.idregistro=".$_SESSION['idreg']."  and m.tipo=269";
			$funcabtc = pg_query($cn,$sql_funcabtc);
		$row_funcabtc = pg_fetch_array ($funcabtc);
	//REPRESENTANTE
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
		//verificando si existe agente auxiliar para monitoreo
		$sql_consulta = "Select * From monitoreo.monitoreo Where  estado=1 idregistro=".$_SESSION['idreg']." and tipo=266";
		$consulta = pg_query($cn,$sql_consulta) ;
		$row_consulta = pg_fetch_array ($consulta);
		$totalRows_consulta = pg_num_rows($consulta);
		if($totalRows_consulta>0){
		 $_SESSION['datos_predio']['Auxiliar']=$row_consulta['agenteauxiliar'];
		}

// }
//*******************************************************************************************************************//
//*********************************************GENERAR CODIGO DE PARCELA*********************************************//
		if(isset($_GET['Departamento'])){
		  $Departamento=$_GET["Departamento"];
		   $_SESSION['Departamento']=$Departamento;
		}
//********************************************* FIN DE GENERACION CODIGO PARCELA *********************************************


$sql_obser = "SELECT o.* FROM  monitoreo.observacion o, monitoreo.monitoreo m
			   WHERE  o.idmonitoreo=m.idmonitoreo  and  m.idregistro=".$_SESSION['idreg']." and o.tipo=1";
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

// OFICINA RCIA
	$sql_ofrcia = "SELECT *  FROM monitoreo.monitoreo m
	where   m.idregistro=".$_SESSION['idreg']." and m.tipo=266 and  m.estado=1 order by idmonitoreo";
		$ofrcia = pg_query($cn,$sql_ofrcia);


			$totalRows_consulta = pg_num_rows($ofrcia);
		if($totalRows_consulta>0){
			$row_ofrcia = pg_fetch_array ($ofrcia);
		 $_SESSION['ofrcia']=$row_ofrcia['oficina'];
		}
// OFICINA CAMPO
	 $sql_ofcampo = "SELECT *  FROM monitoreo.monitoreo m
	where   m.idregistro=".$_SESSION['idreg']." and m.tipo=269 and  m.estado=1 order by idmonitoreo";
		$ofcampo = pg_query($cn,$sql_ofcampo);
			$totalRows_consulta = pg_num_rows($ofcampo);
		if($totalRows_consulta>0){
			$row_ofcampo = pg_fetch_array ($ofcampo);
		 $_SESSION['ofcampo']=$row_ofcampo['oficina'];
		}
unset($_SESSION['tipo_266']);
unset($_SESSION['tipo_269']);
		 $sql_tipo266 = "SELECT *  FROM monitoreo.monitoreo m
			where   m.idregistro=".$_SESSION['idreg']." and tipo=266 and  m.estado=1 order by tipo,anho asc";
		$tipo266 = pg_query($cn,$sql_tipo266);
			$totalRows_consulta2 = pg_num_rows($tipo266);
		if($totalRows_consulta2>0){
			 while( $row1 = pg_fetch_array($tipo266) ) {

		 $_SESSION['tipo_266'][]=$row1['anho'];
		}
	}

		 $sql_tipo269 = "SELECT *  FROM monitoreo.monitoreo m
			where   m.idregistro=".$_SESSION['idreg']." and tipo=269 and  m.estado=1 order by tipo,anho asc";
		$tipo269 = pg_query($cn,$sql_tipo269);
			$totalRows_consulta1 = pg_num_rows($tipo269);
		if($totalRows_consulta1>0){
			 while( $row2 = pg_fetch_array($tipo269) ) {

		 $_SESSION['tipo_269'][]=$row2['anho'];
		}}


?>
