<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/sistema/config/config.php';
require_once APPPATH . '/MONITOREO/gestorMonitoreo.php';



/// obteniendo datos del Predio General
		$sql_predio = "SELECT *	FROM  registro,   parcelas
					   WHERE registro.idparcela = parcelas.idparcela and registro.idregistro=".$_SESSION['idreg'];
		$predio = pg_query($cn,$sql_predio);
		$row_predio = pg_fetch_array ($predio);
		$totalRows_predio = pg_num_rows($predio);

		if($totalRows_predio>0){
			$cod_parcela=$row_predio['idparcela'];
		    $nombrepredio = $row_predio['nombre'];
		}
		else
		{
		$cod_parcela="";
		}

		$_SESSION['cod_parcela']=$cod_parcela;
		$_SESSION['nombre_predio']=$nombrepredio;

/// obteniendo datos de ley 337
		$superficie337=new SuperficieRegistro();
		$superficie337->SuperficieRegistro337($cn, $_SESSION['idreg']);
		$_SESSION['superficie337']=$superficie337;

/// obteniendo datos de Ley 502
		$superficie502=new SuperficieRegistro();
		$superficie502->SuperficieRegistro502($cn, $_SESSION['idreg']);
		$_SESSION['superficie502']=$superficie502;

/// Obteniendo datos de Superficie de alimentos
	$sql_supali = "select supagricola,supganadera, supbarbecho,supdescanso  FROM superficiealimentos where idregistro=".$_SESSION['idreg'];
	$supali = pg_query($cn,$sql_supali);
	$row_supali = pg_fetch_array ($supali);


///sistemas de produccion
$sql3="Select * From \"codificadores\" Where \"idclasificador\"=13 Order by \"nombrecodificador\"";
$rs3=pg_query($cn,$sql3);
$total= pg_num_rows($rs3);



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



///Compromiso de Produccion Ganadera
$sql_ppg0 = "select *  FROM planganaderalechera where anoplanganadera=0 and idregistro=".$_SESSION['idreg'];
$ppg0 = pg_query($cn,$sql_ppg0);
$row_ppg0 = pg_fetch_array ($ppg0);

	if ($periodo == 1)
	{
		$sql_ppg1 = "select *  FROM planganaderalechera where anoplanganadera=1 and idregistro=".$_SESSION['idreg'];
		$ppg1 = pg_query($cn,$sql_ppg1);
		$row_ppg1 = pg_fetch_array ($ppg1);

		$sql_ppg2 = "select *  FROM planganaderalechera where anoplanganadera=2 and idregistro=".$_SESSION['idreg'];
		$ppg2 = pg_query($cn,$sql_ppg2);
		$row_ppg2 = pg_fetch_array ($ppg2);

		$sql_ppg3 = "select *  FROM planganaderalechera where anoplanganadera=3 and idregistro=".$_SESSION['idreg'];
		$ppg3 = pg_query($cn,$sql_ppg3);
		$row_ppg3 = pg_fetch_array ($ppg3);

		$sql_ppg4 = "select *  FROM planganaderalechera where anoplanganadera=4 and idregistro=".$_SESSION['idreg'];
		$ppg4 = pg_query($cn,$sql_ppg4);
		$row_ppg4 = pg_fetch_array ($ppg4);

		$sql_ppg5 = "select *  FROM planganaderalechera where anoplanganadera=5 and idregistro=".$_SESSION['idreg'];
		$ppg5 = pg_query($cn,$sql_ppg5);
		$row_ppg5 = pg_fetch_array ($ppg5);
	}
	elseif ($periodo == 2)
	{
		$sql_ppg1 = "select *  FROM planganaderalechera where anoplanganadera=3 and idregistro=".$_SESSION['idreg'];
		$ppg1 = pg_query($cn,$sql_ppg1);
		$row_ppg1 = pg_fetch_array ($ppg1);

		$sql_ppg2 = "select *  FROM planganaderalechera where anoplanganadera=4 and idregistro=".$_SESSION['idreg'];
		$ppg2 = pg_query($cn,$sql_ppg2);
		$row_ppg2 = pg_fetch_array ($ppg2);

		$sql_ppg3 = "select *  FROM planganaderalechera where anoplanganadera=5 and idregistro=".$_SESSION['idreg'];
		$ppg3 = pg_query($cn,$sql_ppg3);
		$row_ppg3 = pg_fetch_array ($ppg3);

		$sql_ppg4 = "select *  FROM planganaderalechera where anoplanganadera=6 and idregistro=".$_SESSION['idreg'];
		$ppg4 = pg_query($cn,$sql_ppg4);
		$row_ppg4 = pg_fetch_array ($ppg4);

		$sql_ppg5 = "select *  FROM planganaderalechera where anoplanganadera=7 and idregistro=".$_SESSION['idreg'];
		$ppg5 = pg_query($cn,$sql_ppg5);
		$row_ppg5 = pg_fetch_array ($ppg5);
	}


// OBTENIENDO DATOS DE LA OBSERVACIoN DEL RCIA
	$sql_observacion = "select *
	from monitoreo.observacion as o inner join monitoreo.monitoreo as m on o.idmonitoreo = m.idmonitoreo
	where o.tipo = 5 and idregistro = ".$_SESSION['idreg'];
	$rcia_observacion = pg_query($cn,$sql_observacion);
	$obsganaderarcia = pg_fetch_array($rcia_observacion);



// OBTENIENDO DATOS DE ACTIVIDADES RCIAS GANADERAS
	if($periodo == 1)
	{
		$sql_actganaderarcia = "select a.nombreactividad, a.realizada, m.anho
		from monitoreo.actividades as a inner join monitoreo.monitoreo as m on a.idmonitoreo = m.idmonitoreo
		where m.idregistro = ".$_SESSION['idreg']." and a.idmonitoreo > 0 and nombreactividad > 327 and nombreactividad < 331 and m.anho <6
		order by a.nombreactividad asc, m.anho asc";
	}
	elseif ($periodo == 2)
	{
		$sql_actganaderarcia = "	select a.nombreactividad, a.realizada, m.anho
			from monitoreo.actividades as a inner join monitoreo.monitoreo as m on a.idmonitoreo = m.idmonitoreo
			where m.idregistro = ".$_SESSION['idreg']." and a.idmonitoreo > 0 and  nombreactividad > 327 and nombreactividad < 331 and m.anho > 2
			order by a.nombreactividad asc, m.anho asc";
	}
	$rcia_act_ganadera = pg_query($cn,$sql_actganaderarcia);
	$row_actrciaganadera =  pg_fetch_array ($rcia_act_ganadera);
	$num_act_ganadera = pg_num_rows($rcia_act_ganadera);





///Compromiso de Produccion Ganadera RCIA
if ($periodo == 1)
{
	$sql_ppgrcia1 = "select * from monitoreo.planproduccionganaderalechera as ppg inner join monitoreo.monitoreo as m on ppg.idmonitoreo = m.idmonitoreo where anho = 1 and idregistro = ".$_SESSION['idreg'];
	$ppgrcia1 = pg_query($cn,$sql_ppgrcia1);
	$row_ppgrcia1 = pg_fetch_array ($ppgrcia1);



	$sql_ppgrcia2 = "select * from monitoreo.planproduccionganaderalechera as ppg inner join monitoreo.monitoreo as m on ppg.idmonitoreo = m.idmonitoreo where anho = 2 and idregistro = ".$_SESSION['idreg'];
	$ppgrcia2 = pg_query($cn,$sql_ppgrcia2);
	$row_ppgrcia2 = pg_fetch_array ($ppgrcia2);

	$sql_ppgrcia3 = "select * from monitoreo.planproduccionganaderalechera as ppg inner join monitoreo.monitoreo as m on ppg.idmonitoreo = m.idmonitoreo where anho = 3 and idregistro = ".$_SESSION['idreg'];
	$ppgrcia3 = pg_query($cn,$sql_ppgrcia3);
	$row_ppgrcia3 = pg_fetch_array ($ppgrcia3);

	$sql_ppgrcia4 = "select * from monitoreo.planproduccionganaderalechera as ppg inner join monitoreo.monitoreo as m on ppg.idmonitoreo = m.idmonitoreo where anho = 4 and idregistro = ".$_SESSION['idreg'];
	$ppgrcia4 = pg_query($cn,$sql_ppgrcia4);
	$row_ppgrcia4 = pg_fetch_array ($ppgrcia4);

	$sql_ppgrcia5 = "select * from monitoreo.planproduccionganaderalechera as ppg inner join monitoreo.monitoreo as m on ppg.idmonitoreo = m.idmonitoreo where anho = 5 and idregistro = ".$_SESSION['idreg'];
	$ppgrcia5 = pg_query($cn,$sql_ppgrcia5);
	$row_ppgrcia5 = pg_fetch_array ($ppgrcia5);
}
elseif ($periodo == 2)
{
	$sql_ppgrcia1 = "select * from monitoreo.planproduccionganaderalechera as ppg inner join monitoreo.monitoreo as m on ppg.idmonitoreo = m.idmonitoreo where anho = 3 and idregistro = ".$_SESSION['idreg'];
	$ppgrcia1 = pg_query($cn,$sql_ppgrcia1);
	$row_ppgrcia1 = pg_fetch_array ($ppgrcia1);

	$sql_ppgrcia2 = "select * from monitoreo.planproduccionganaderalechera as ppg inner join monitoreo.monitoreo as m on ppg.idmonitoreo = m.idmonitoreo where anho = 4 and idregistro = ".$_SESSION['idreg'];
	$ppgrcia2 = pg_query($cn,$sql_ppgrcia2);
	$row_ppgrcia2 = pg_fetch_array ($ppgrcia2);

	$sql_ppgrcia3 = "select * from monitoreo.planproduccionganaderalechera as ppg inner join monitoreo.monitoreo as m on ppg.idmonitoreo = m.idmonitoreo where anho = 5 and idregistro = ".$_SESSION['idreg'];
	$ppgrcia3 = pg_query($cn,$sql_ppgrcia3);
	$row_ppgrcia3 = pg_fetch_array ($ppgrcia3);

	$sql_ppgrcia4 = "select * from monitoreo.planproduccionganaderalechera as ppg inner join monitoreo.monitoreo as m on ppg.idmonitoreo = m.idmonitoreo where anho = 6 and idregistro = ".$_SESSION['idreg'];
	$ppgrcia4 = pg_query($cn,$sql_ppgrcia4);
	$row_ppgrcia4 = pg_fetch_array ($ppgrcia4);

	$sql_ppgrcia5 = "select * from monitoreo.planproduccionganaderalechera as ppg inner join monitoreo.monitoreo as m on ppg.idmonitoreo = m.idmonitoreo where anho = 7 and idregistro = ".$_SESSION['idreg'];
	$ppgrcia5 = pg_query($cn,$sql_ppgrcia5);
	$row_ppgrcia5 = pg_fetch_array ($ppgrcia5);
}



///////////////////// DOCUMENTOS PRESENTADOS RCIA GANADERO
	if($periodo == 1)
	{
		$sql_docpreganarcia = "select dp.nombredocumento, dp.presento, m.anho
	from monitoreo.docpresentadosrcia as dp inner join monitoreo.monitoreo as m on dp.idmonitoreo = m.idmonitoreo
	where m.idregistro = ".$_SESSION['idreg']." and ((nombredocumento >286 and nombredocumento < 292) or (nombredocumento >332 and nombredocumento < 337) ) and m.anho < 6
	order by dp.nombredocumento asc, m.anho asc";
	}
	elseif ($periodo == 2)
	{
		$sql_docpreganarcia = "select dp.nombredocumento, dp.presento, m.anho
		from monitoreo.docpresentadosrcia as dp inner join monitoreo.monitoreo as m on dp.idmonitoreo = m.idmonitoreo
		where m.idregistro = ".$_SESSION['idreg']." and ((nombredocumento >286 and nombredocumento < 292) or (nombredocumento >332 and nombredocumento < 337) ) and m.anho > 2
		order by dp.nombredocumento asc, m.anho asc";
	}

		$rcia_doc_ganadera = pg_query($cn,$sql_docpreganarcia);
		$row_docrciaganadera =  pg_fetch_array ($rcia_doc_ganadera);
		$num_doc_ganadera = pg_num_rows($row_docrciaganadera);







?>
