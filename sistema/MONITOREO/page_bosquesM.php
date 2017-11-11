<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/sistema/config/config.php';
require_once APPPATH . '/MONITOREO/gestorMonitoreo.php';
$ley=0;

if(!isset($_SESSION['datos_bosque']))
{

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
		    $nombrepredio = $row_predio['nombre'];
			}else{$cod_parcela="";}
		$_SESSION['cod_parcela']=$cod_parcela;


		   $superficie337=new SuperficieRegistro();
		   $superficie337->SuperficieRegistro337($cn, $_SESSION['idreg']);
		   $_SESSION['superficie337']=$superficie337;


			$superficie502=new SuperficieRegistro();
		    $superficie502->SuperficieRegistro502($cn, $_SESSION['idreg']);
		    $_SESSION['superficie502']=$superficie502;


				/// obteniendo periodo del predio
					$sql_fechas = "select r.idregistro, fecharegistro, fechasuscripcion
									from registro as r full join fechasregistro as fr on r.idregistro = fr.idregistro
									where r.idregistro =".$_SESSION['idreg'];
					$resultSuscripcion = pg_query($cn,$sql_fechas) ;
					$row_Suscripcion = pg_fetch_array ($resultSuscripcion);
					$fechasuscripcion = $row_Suscripcion['fechasuscripcion'];
					$periodo1_time = date($today="2015-09-29");

					$periodo=2;
					if ($fechasuscripcion!="") {
					$predio_time = Date('Y-m-d', strtotime($fechasuscripcion));
					if($periodo1_time > $predio_time){
						$periodo=1;
					}
					}



		$sql_supali="SELECT * FROM superficieregistro WHERE idtiposuperficie=219 AND idregistro=".$_SESSION['idreg'];
		$supali = pg_query($cn,$sql_supali);
		$row_supali= pg_fetch_array ($supali);

		$sql_Sels = "SELECT superficiesel.*,codificadores.nombrecodificador FROM superficiesel,codificadores
					 WHERE codificadores.idcodificadores=superficiesel.idparametrica and superficiesel.idregistro=".$_SESSION['idreg']." order by idtiposel asc, idparametrica asc";
		$Sels = pg_query($cn,$sql_Sels);
		$row_Sels = pg_fetch_array ($Sels);
		$totalRows_SELS = pg_num_rows($Sels);


		$sql_SelsPAS = "SELECT superficiesel.*,codificadores.nombrecodificador FROM superficiesel,codificadores
					 WHERE codificadores.idcodificadores=superficiesel.idparametrica and superficiesel.idregistro=".$_SESSION['idreg']." order by idtiposel asc, idparametrica asc";
		$SelsPAS = pg_query($cn,$sql_SelsPAS);
		$row_SelsPAS = pg_fetch_array ($SelsPAS);
		$totalRows_SELSPAS = pg_num_rows($SelsPAS);






		$sql_Especies = "SELECT especie.nombrecientifico,  especienombrecomun.nombrecomun, especierestituir.*,codificadores.nombrecodificador as nombre_espaciamiento
						 FROM especie, especienombrecomun, especierestituir,codificadores
						 WHERE especie.idespecie = especienombrecomun.idespecie AND
  especierestituir.idtipoesparcimiento = codificadores.idcodificadores AND especienombrecomun.idespeciecomun = especierestituir.idespeciecomun and especierestituir.idregistro=".$_SESSION['idreg'];
		$Especies = pg_query($cn,$sql_Especies);
		$row_Especies = pg_fetch_array ($Especies);
		$totalRows_Especies = pg_num_rows($Especies);


}

$sql_obser = "SELECT obsregistro FROM  registro
			   WHERE  registro.idregistro=".$_SESSION['idreg'];
$obser = pg_query($cn,$sql_obser);
$row_obser = pg_fetch_array ($obser);


// obtener observacion RCIA Bosques
	$sql_observacionbosques = "select *
	from monitoreo.observacion as o inner join monitoreo.monitoreo as m on o.idmonitoreo = m.idmonitoreo
	where o.tipo = 2 and idregistro = ".$_SESSION['idreg'];
	$rcia_observacionbosques = pg_query($cn,$sql_observacionbosques);
	$obsbosquercia = pg_fetch_array($rcia_observacionbosques);


// obtener restitucion Bosques rcia
	$sql_especiesrestituirbosques = "select er.*, ec.nombrecomun
	from monitoreo.especiesrestituidas as er inner join monitoreo.monitoreo as m on er.idmonitoreo = m.idmonitoreo
  left join especienombrecomun as ec on ec.idespeciecomun = er.idespeciecomun
	where m.idregistro = ".$_SESSION['idreg']."	order by er.idespeciesrestituidas";
	$rcia_restbosquesrcia = pg_query($cn,$sql_especiesrestituirbosques);
	$row_restbosquesrcia = pg_fetch_array($rcia_restbosquesrcia);


	///////////////////// DOCUMENTOS PRESENTADOS RCIA bosques
		if($periodo == 1)
		{
			$sql_docprebosquercia = "select dp.nombredocumento, dp.presento, m.anho
		from monitoreo.docpresentadosrcia as dp inner join monitoreo.monitoreo as m on dp.idmonitoreo = m.idmonitoreo
		where m.idregistro = ".$_SESSION['idreg']." and nombredocumento >291 and nombredocumento < 296 or nombredocumento = 331 and m.anho < 6
		order by dp.nombredocumento asc, m.anho asc";
		}
		elseif ($periodo == 2)
		{
			$sql_docprebosquercia = "select dp.nombredocumento, dp.presento, m.anho
			from monitoreo.docpresentadosrcia as dp inner join monitoreo.monitoreo as m on dp.idmonitoreo = m.idmonitoreo
			where m.idregistro = ".$_SESSION['idreg']." and nombredocumento >291 and nombredocumento < 296 or nombredocumento = 331 and m.anho > 2
			order by dp.nombredocumento asc, m.anho asc";
		}

			$rcia_doc_bosque = pg_query($cn,$sql_docprebosquercia);
			$row_docrciabosque=  pg_fetch_array ($rcia_doc_bosque);


		// OBTENIENDO DATOS DE LA OBSERVACION DOCUMENTOS PRESENTADOS RCIA BOSQUES
				$sql_observaciondoc = "select *
				from monitoreo.observacion as o inner join monitoreo.monitoreo as m on o.idmonitoreo = m.idmonitoreo
				where o.tipo = 21 and idregistro = ".$_SESSION['idreg'];
				$rcia_observaciondoc = pg_query($cn,$sql_observaciondoc);
				$obsbosquerciadoc = pg_fetch_array($rcia_observaciondoc);


      //// OBTENER DATOS DE LAS SEL ejecutadas RCIA
      $sql_supselejecutada = "select se.idtipocompromiso, se.idtiposel, sum(se.supseltpfp) as supseltpfp, sum(se.supseltum) as supseltum, sum(supseltpfppas) as supseltpfppas, sum(supseltumpas) as supseltumpas
      from monitoreo.supselsejecutada as se inner join monitoreo.monitoreo as m on se.idmonitoreo = m.idmonitoreo
      where m.idregistro =".$_SESSION['idreg']."
      group by se.idtipocompromiso, se.idtiposel, se.supseltpfp, se.supseltum, se.supseltpfppas, se.supseltumpas order by idtipocompromiso asc, idtiposel asc";
      $rcia_supseleje = pg_query($cn,$sql_supselejecutada);
      $supselejecutadarcia = pg_fetch_array($rcia_supseleje);

      $sql_supselejecutadapas = "select se.idtipocompromiso, se.idtiposel, sum(se.supseltpfp) as supseltpfp, sum(se.supseltum) as supseltum, sum(supseltpfppas) as supseltpfppas, sum(supseltumpas) as supseltumpas
      from monitoreo.supselsejecutada as se inner join monitoreo.monitoreo as m on se.idmonitoreo = m.idmonitoreo
      where m.idregistro =".$_SESSION['idreg']."
      group by se.idtipocompromiso, se.idtiposel, se.supseltpfp, se.supseltum, se.supseltpfppas, se.supseltumpas order by idtipocompromiso asc, idtiposel asc";
      $rcia_supselejepas = pg_query($cn,$sql_supselejecutadapas);
      $supselejecutadarciapas = pg_fetch_array($rcia_supselejepas);

      /////// DATOS DE REGISTRO DE SUPERFICIES RESTITUIDAS TOTALES MONITOREO
      ///// sin pas
      $sql_1 = "select idtiposuperficie, supregistromonitoreo from monitoreo.superficieregistromonitoreo as sm inner join monitoreo.monitoreo as m
      on sm.idmonitoreo = m.idmonitoreo where idtiposuperficie = 200 and m.idregistro = ".$_SESSION['idreg'];
      $rcia_1 = pg_query($cn,$sql_1);
      $supmr1 = pg_fetch_array($rcia_1);

      $sql_2 = "select idtiposuperficie, supregistromonitoreo from monitoreo.superficieregistromonitoreo as sm inner join monitoreo.monitoreo as m
      on sm.idmonitoreo = m.idmonitoreo where idtiposuperficie = 201 and m.idregistro = ".$_SESSION['idreg'];
      $rcia_2 = pg_query($cn,$sql_2);
      $supmr2 = pg_fetch_array($rcia_2);

      $sql_3 = "select idtiposuperficie, supregistromonitoreo from monitoreo.superficieregistromonitoreo as sm inner join monitoreo.monitoreo as m
      on sm.idmonitoreo = m.idmonitoreo where idtiposuperficie = 202 and m.idregistro = ".$_SESSION['idreg'];
      $rcia_3 = pg_query($cn,$sql_3);
      $supmr3 = pg_fetch_array($rcia_3);

      $sql_4 = "select idtiposuperficie, supregistromonitoreo from monitoreo.superficieregistromonitoreo as sm inner join monitoreo.monitoreo as m
      on sm.idmonitoreo = m.idmonitoreo where idtiposuperficie = 204 and m.idregistro = ".$_SESSION['idreg'];
      $rcia_4 = pg_query($cn,$sql_4);
      $supmr4 = pg_fetch_array($rcia_4);

      ///// con pas
      $sql_1m = "select idtiposuperficie, supregistromonitoreo from monitoreo.superficieregistromonitoreo as sm inner join monitoreo.monitoreo as m
      on sm.idmonitoreo = m.idmonitoreo where idtiposuperficie = 211 and m.idregistro = ".$_SESSION['idreg'];
      $rcia_1m = pg_query($cn,$sql_1m);
      $supmr1m = pg_fetch_array($rcia_1m);

      $sql_2m = "select idtiposuperficie, supregistromonitoreo from monitoreo.superficieregistromonitoreo as sm inner join monitoreo.monitoreo as m
      on sm.idmonitoreo = m.idmonitoreo where idtiposuperficie = 212 and m.idregistro = ".$_SESSION['idreg'];
      $rcia_2m = pg_query($cn,$sql_2m);
      $supmr2m = pg_fetch_array($rcia_2m);

      $sql_3m = "select idtiposuperficie, supregistromonitoreo from monitoreo.superficieregistromonitoreo as sm inner join monitoreo.monitoreo as m
      on sm.idmonitoreo = m.idmonitoreo where idtiposuperficie = 213 and m.idregistro = ".$_SESSION['idreg'];
      $rcia_3m = pg_query($cn,$sql_3m);
      $supmr3m = pg_fetch_array($rcia_3m);

      $sql_4m = "select idtiposuperficie, supregistromonitoreo from monitoreo.superficieregistromonitoreo as sm inner join monitoreo.monitoreo as m
      on sm.idmonitoreo = m.idmonitoreo where idtiposuperficie = 215 and m.idregistro = ".$_SESSION['idreg'];
      $rcia_4m = pg_query($cn,$sql_4m);
      $supmr4m = pg_fetch_array($rcia_4m);




?>
