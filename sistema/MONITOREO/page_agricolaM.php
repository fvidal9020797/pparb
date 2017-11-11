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



/// obteniendo datos para combo cultivos
	$sql_combocultivos = "select * FROM cultivo as c Order by nombrecultivo";
	$combocultivo = pg_query($cn,$sql_combocultivos) ;
	$row_combocultivo = pg_fetch_array ($combocultivo);


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



//obteniendo datos de situacion actual agricola
	$sql_culinicial = "select pc.*, c.nombrecultivo FROM plancultivo as pc inner join cultivo as c on pc.idcultivo = c.idcultivo where anocultivo=0 and idregistro = ".$_SESSION['idreg'];
	$culinicial = pg_query($cn,$sql_culinicial);
	$row_culinicial = pg_fetch_array ($culinicial);


//obteniendo datos de compromiso de cultivos
							 if($periodo == 1)
						   {
								 $sql_culfinal = "select  p1.supverano AS supverano1,  p1.supinvierno AS supinvierno1, p2.supverano AS supverano2,  p2.supinvierno AS supinvierno2,
							 							 p3.supverano AS supverano3,  p3.supinvierno AS supinvierno3, p4.supverano AS supverano4,  p4.supinvierno AS supinvierno4,
							 							 p5.supverano AS supverano5,  p5.supinvierno AS supinvierno5, p1.idcultivo
							 						FROM plancultivo p1, plancultivo p2,  plancultivo p5,  plancultivo p4, plancultivo p3
							 						WHERE p1.idregistro = p2.idregistro AND  p1.idcultivo = p2.idcultivo AND p2.idcultivo = p3.idcultivo AND  p2.idregistro = p3.idregistro
							 						  AND p4.idcultivo = p5.idcultivo AND p4.idregistro = p5.idregistro AND p3.idcultivo = p4.idcultivo AND p3.idregistro = p4.idregistro
							 						  AND  p3.anocultivo = 3 AND  p1.anocultivo = 1 AND p2.anocultivo = 2 AND  p4.anocultivo = 4 AND p5.anocultivo = 5  AND p3.idregistro=".$_SESSION['idreg']."order by p1.idcultivo asc";
							 
							 
							 }
				  			 elseif ($periodo == 2)
								 {

										 $sql_culfinal =
									 	"
									 	select
									 		a.supverano AS supverano1,
									 		a.supinvierno AS supinvierno1,
									 		b.supverano AS supverano2,
									 		b.supinvierno AS supinvierno2,
									 		c.supverano AS supverano3,
									 		c.supinvierno AS supinvierno3,
									 		d.supverano AS supverano4,
									 		d.supinvierno AS supinvierno4,
									 		e.supverano AS supverano5,
									 		e.supinvierno AS supinvierno5,
									 		a.idcultivo
									 		from
									 		(select * from plancultivo
									 		where idregistro = ".$_SESSION['idreg']." and anocultivo = 3) as a
									 		full join
									 		(select * from plancultivo
									 		where idregistro = ".$_SESSION['idreg']." and anocultivo = 4) as b
									 		on a.idcultivo = b.idcultivo
									 		full join
									 		(select * from plancultivo
									 		where idregistro = ".$_SESSION['idreg']." and anocultivo = 5) as c
									 		on a.idcultivo = c.idcultivo
									 		full join
									 		(select * from plancultivo
									 		where idregistro = ".$_SESSION['idreg']." and anocultivo = 6) as d
									 		on a.idcultivo = d.idcultivo
									 		full join
									 		(select * from plancultivo
									 		where idregistro = ".$_SESSION['idreg']." and anocultivo = 7) as e
									 		on a.idcultivo = e.idcultivo order by a.idcultivo asc";
				          }


	$culfinal = pg_query($cn,$sql_culfinal);
	$row_culfinal = pg_fetch_array ($culfinal);
	$num_culfinal=pg_num_rows($culfinal);



// OBTENIENDO DATOS DEL MONITOREO RCIA AGRICOLA
if($periodo == 1)
{
	$sql_rciaagricola1= "select m.idregistro as idr1 ,pc.idmonitoreo as mon1, pc.idcultivo as c1, pc.supveranoejecutado as ve1, pc.supinviernoejecutado as ie1, pc.produccionver as pv1, pc.produccioninv as pi1
	from monitoreo.plancultivo as pc inner join monitoreo.monitoreo as m on m.idmonitoreo = pc.idmonitoreo
	where pc.anocultivo = 1 and pc.comprometido = 0 and m.idregistro = ".$_SESSION['idreg']." order by c1 asc";
	$rcia_agricola1 = pg_query($cn,$sql_rciaagricola1);
	$row_rciaagricola1 =  pg_fetch_array ($rcia_agricola1);

	$sql_rciaagricola2= "select m.idregistro as idr2, pc.idmonitoreo as mon2, pc.idcultivo as c2, pc.supveranoejecutado as ve2, pc.supinviernoejecutado as ie2, pc.produccionver as pv2, pc.produccioninv as pi2
	from monitoreo.plancultivo as pc inner join monitoreo.monitoreo as m on m.idmonitoreo = pc.idmonitoreo
	where pc.anocultivo = 2 and pc.comprometido = 0 and m.idregistro = ".$_SESSION['idreg']." order by c2 asc";
	$rcia_agricola2 = pg_query($cn,$sql_rciaagricola2);
	$row_rciaagricola2 =  pg_fetch_array ($rcia_agricola2);

	$sql_rciaagricola3= "select m.idregistro as idr3, pc.idmonitoreo as mon3, pc.idcultivo as c3, pc.supveranoejecutado as ve3, pc.supinviernoejecutado as ie3, pc.produccionver as pv3, pc.produccioninv as pi3
	from monitoreo.plancultivo as pc inner join monitoreo.monitoreo as m on m.idmonitoreo = pc.idmonitoreo
	where pc.anocultivo = 3 and pc.comprometido = 0 and m.idregistro = ".$_SESSION['idreg']." order by c3 asc";
	$rcia_agricola3 = pg_query($cn,$sql_rciaagricola3);
	$row_rciaagricola3 =  pg_fetch_array ($rcia_agricola3);

	$sql_rciaagricola4= "select  m.idregistro as idr4, pc.idmonitoreo as mon4, pc.idcultivo as c4, pc.supveranoejecutado as ve4, pc.supinviernoejecutado as ie4, pc.produccionver as pv4, pc.produccioninv as pi4
	from monitoreo.plancultivo as pc inner join monitoreo.monitoreo as m on m.idmonitoreo = pc.idmonitoreo
	where pc.anocultivo = 4 and pc.comprometido = 0 and m.idregistro = ".$_SESSION['idreg']." order by c4 asc";
	$rcia_agricola4 = pg_query($cn,$sql_rciaagricola4);
	$row_rciaagricola4 =  pg_fetch_array ($rcia_agricola4);

	$sql_rciaagricola5= "select m.idregistro as idr5, pc.idmonitoreo as mon5, pc.idcultivo as c5, pc.supveranoejecutado as ve5, pc.supinviernoejecutado as ie5, pc.produccionver as pv5, pc.produccioninv as pi5
	from monitoreo.plancultivo as pc inner join monitoreo.monitoreo as m on m.idmonitoreo = pc.idmonitoreo
	where pc.anocultivo = 5 and pc.comprometido = 0 and m.idregistro = ".$_SESSION['idreg']." order by c5 asc";
	$rcia_agricola5 = pg_query($cn,$sql_rciaagricola5);
	$row_rciaagricola5 =  pg_fetch_array ($rcia_agricola5);

 }
 elseif ($periodo == 2)
 {
	 $sql_rciaagricola1= "select m.idregistro as idr1 ,pc.idmonitoreo as mon1, pc.idcultivo as c1, pc.supveranoejecutado as ve1, pc.supinviernoejecutado as ie1, pc.produccionver as pv1, pc.produccioninv as pi1
 	from monitoreo.plancultivo as pc inner join monitoreo.monitoreo as m on m.idmonitoreo = pc.idmonitoreo
 	where pc.anocultivo = 3 and pc.comprometido = 0 and m.idregistro = ".$_SESSION['idreg']." order by c1 asc";
 	$rcia_agricola1 = pg_query($cn,$sql_rciaagricola1);
 	$row_rciaagricola1 =  pg_fetch_array ($rcia_agricola1);

 	$sql_rciaagricola2= "select m.idregistro as idr2, pc.idmonitoreo as mon2, pc.idcultivo as c2, pc.supveranoejecutado as ve2, pc.supinviernoejecutado as ie2, pc.produccionver as pv2, pc.produccioninv as pi2
 	from monitoreo.plancultivo as pc inner join monitoreo.monitoreo as m on m.idmonitoreo = pc.idmonitoreo
 	where pc.anocultivo = 4 and pc.comprometido = 0 and m.idregistro = ".$_SESSION['idreg']." order by c2 asc";
 	$rcia_agricola2 = pg_query($cn,$sql_rciaagricola2);
 	$row_rciaagricola2 =  pg_fetch_array ($rcia_agricola2);

 	$sql_rciaagricola3= "select m.idregistro as idr3, pc.idmonitoreo as mon3, pc.idcultivo as c3, pc.supveranoejecutado as ve3, pc.supinviernoejecutado as ie3, pc.produccionver as pv3, pc.produccioninv as pi3
 	from monitoreo.plancultivo as pc inner join monitoreo.monitoreo as m on m.idmonitoreo = pc.idmonitoreo
 	where pc.anocultivo = 5 and pc.comprometido = 0 and m.idregistro = ".$_SESSION['idreg']." order by c3 asc";
 	$rcia_agricola3 = pg_query($cn,$sql_rciaagricola3);
 	$row_rciaagricola3 =  pg_fetch_array ($rcia_agricola3);

 	$sql_rciaagricola4= "select  m.idregistro as idr4, pc.idmonitoreo as mon4, pc.idcultivo as c4, pc.supveranoejecutado as ve4, pc.supinviernoejecutado as ie4, pc.produccionver as pv4, pc.produccioninv as pi4
 	from monitoreo.plancultivo as pc inner join monitoreo.monitoreo as m on m.idmonitoreo = pc.idmonitoreo
 	where pc.anocultivo = 6 and pc.comprometido = 0 and m.idregistro = ".$_SESSION['idreg']." order by c4 asc";
 	$rcia_agricola4 = pg_query($cn,$sql_rciaagricola4);
 	$row_rciaagricola4 =  pg_fetch_array ($rcia_agricola4);

 	$sql_rciaagricola5= "select m.idregistro as idr5, pc.idmonitoreo as mon5, pc.idcultivo as c5, pc.supveranoejecutado as ve5, pc.supinviernoejecutado as ie5, pc.produccionver as pv5, pc.produccioninv as pi5
 	from monitoreo.plancultivo as pc inner join monitoreo.monitoreo as m on m.idmonitoreo = pc.idmonitoreo
 	where pc.anocultivo = 7 and pc.comprometido = 0 and m.idregistro = ".$_SESSION['idreg']." order by c5 asc";
 	$rcia_agricola5 = pg_query($cn,$sql_rciaagricola5);
 	$row_rciaagricola5 =  pg_fetch_array ($rcia_agricola5);

 }




// OBTENIENDO DATOS DE LA OBSERVACION DEL RCIA AGRICOLA
	$sql_observacion = "select *
	from monitoreo.observacion as o inner join monitoreo.monitoreo as m on o.idmonitoreo = m.idmonitoreo
	where o.tipo = 3 and idregistro = ".$_SESSION['idreg'];
	$rcia_observacion = pg_query($cn,$sql_observacion);
	$obsagricolarcia = pg_fetch_array($rcia_observacion);


// OBTENIENDO DATOS DE ACTIVIDADES AGRICOLAS

if($periodo == 1)
{
	$sql_actagrircia = "select a.nombreactividad, a.realizada, m.anho
	from monitoreo.actividades as a inner join monitoreo.monitoreo as m on a.idmonitoreo = m.idmonitoreo
	where m.idregistro = ".$_SESSION['idreg']." and a.idmonitoreo > 0 and nombreactividad > 295 and nombreactividad < 300 and m.anho <6
	order by a.nombreactividad asc, m.anho";
}
elseif ($periodo == 2)
{
	$sql_actagrircia = "	select a.nombreactividad, a.realizada, m.anho
		from monitoreo.actividades as a inner join monitoreo.monitoreo as m on a.idmonitoreo = m.idmonitoreo
		where m.idregistro = ".$_SESSION['idreg']." and a.idmonitoreo > 0 nombreactividad > 295 and nombreactividad < 300 and m.anho > 2
		order by a.nombreactividad asc, m.anho";
}

	$rcia_act_agricola = pg_query($cn,$sql_actagrircia);
	$row_actrciaagricola =  pg_fetch_array ($rcia_act_agricola);
	$num_act_agricola = pg_num_rows($rcia_act_agricola);



// OBTENIENDO DATOS DE ACTIVIDADES AGRICOL.
	/* $sql_actagrircia = "select a.nombreactividad, a.realizada
	from monitoreo.actividades as a inner join monitoreo.monitoreo as m on a.idmonitoreo = m.idmonitoreo
	where m.idregistro = ".$_SESSION['idreg']." and a.idmonitoreo > 0
	order by m.anho ";
	$rcia_act_agricola = pg_query($cn,$sql_actagrircia);
	$row_actrciaagricola =  pg_fetch_array ($rcia_act_agricola);
	$num_act_agricola = pg_num_rows($rcia_act_agricola);  */


/////// obtener los datos de los documentos presentados
if($periodo == 1)
{
	$sql_docpreagrircia = "select dp.nombredocumento, dp.presento, m.anho
from monitoreo.docpresentadosrcia as dp inner join monitoreo.monitoreo as m on dp.idmonitoreo = m.idmonitoreo
where m.idregistro = ".$_SESSION['idreg']." and nombredocumento >281 and nombredocumento < 287 or nombredocumento = 332 and m.anho < 6
order by dp.nombredocumento asc, m.anho asc";
}
elseif ($periodo == 2)
{
	$sql_docpreagrircia = "select dp.nombredocumento, dp.presento, m.anho
	from monitoreo.docpresentadosrcia as dp inner join monitoreo.monitoreo as m on dp.idmonitoreo = m.idmonitoreo
	where m.idregistro = ".$_SESSION['idreg']." and nombredocumento >281 and nombredocumento < 287 or nombredocumento = 332 and m.anho > 2
	order by dp.nombredocumento asc, m.anho asc";
}

	$rcia_doc_agricola = pg_query($cn,$sql_docpreagrircia);
	$row_docrciaagricola =  pg_fetch_array ($rcia_doc_agricola);
	$num_doc_agricola = pg_num_rows($row_docrciaagricola);


// OBTENIENDO DATOS DE LA OBSERVACION DEL RCIA AGRICOLA
		$sql_observaciondocgan = "select *
		from monitoreo.observacion as o inner join monitoreo.monitoreo as m on o.idmonitoreo = m.idmonitoreo
		where o.tipo = 31 and idregistro = ".$_SESSION['idreg'];
		$rcia_observaciondocgan = pg_query($cn,$sql_observaciondocgan);
		$obsagricolarciadoc = pg_fetch_array($rcia_observaciondocgan);




/////// obteniendo cantidad de cultivos no comprometidos ejecutados en RCIA.

 $sql_cultivonocomp = "select m.idregistro, mpc.idcultivo, c.nombrecultivo
											from monitoreo.plancultivo as mpc inner join monitoreo.monitoreo as m on m.idmonitoreo = mpc.idmonitoreo
											inner join cultivo as c on mpc.idcultivo = c.idcultivo
											where mpc.comprometido = 1 and m.idregistro = ".$_SESSION['idreg']."
											group by m.idregistro, mpc.idcultivo, c.nombrecultivo order by mpc.idcultivo asc";


	$cultivoncomp = pg_query($cn,$sql_cultivonocomp);
	$row_cultivonocomp = pg_fetch_array ($cultivoncomp);
	$num_cultnocomp=pg_num_rows($cultivoncomp);


///// obteniendo datos de cultivos no comprometidos
if($periodo == 1)
{
	$sql_rciaagricolanc1= "select m.idregistro as idr1 ,pc.idmonitoreo as mon1, pc.idcultivo as c1, pc.supveranoejecutado as ve1, pc.supinviernoejecutado as ie1, pc.produccionver as pv1, pc.produccioninv as pi1
	from monitoreo.plancultivo as pc inner join monitoreo.monitoreo as m on m.idmonitoreo = pc.idmonitoreo
	where pc.anocultivo = 1 and pc.comprometido = 1 and m.idregistro = ".$_SESSION['idreg']." order by c1 asc";
	$rcia_agricolanc1 = pg_query($cn,$sql_rciaagricolanc1);
	$row_rciaagricolanc1 =  pg_fetch_array ($rcia_agricolanc1);

	$sql_rciaagricolanc2= "select m.idregistro as idr2, pc.idmonitoreo as mon2, pc.idcultivo as c2, pc.supveranoejecutado as ve2, pc.supinviernoejecutado as ie2, pc.produccionver as pv2, pc.produccioninv as pi2
	from monitoreo.plancultivo as pc inner join monitoreo.monitoreo as m on m.idmonitoreo = pc.idmonitoreo
	where pc.anocultivo = 2 and pc.comprometido = 1 and m.idregistro = ".$_SESSION['idreg']." order by c2 asc";
	$rcia_agricolanc2 = pg_query($cn,$sql_rciaagricolanc2);
	$row_rciaagricolanc2 =  pg_fetch_array ($rcia_agricolanc2);

	$sql_rciaagricolanc3= "select m.idregistro as idr3, pc.idmonitoreo as mon3, pc.idcultivo as c3, pc.supveranoejecutado as ve3, pc.supinviernoejecutado as ie3, pc.produccionver as pv3, pc.produccioninv as pi3
	from monitoreo.plancultivo as pc inner join monitoreo.monitoreo as m on m.idmonitoreo = pc.idmonitoreo
	where pc.anocultivo = 3 and pc.comprometido = 1 and m.idregistro = ".$_SESSION['idreg']." order by c3 asc";
	$rcia_agricolanc3 = pg_query($cn,$sql_rciaagricolanc3);
	$row_rciaagricolanc3 =  pg_fetch_array ($rcia_agricolanc3);

	$sql_rciaagricolanc4= "select  m.idregistro as idr4, pc.idmonitoreo as mon4, pc.idcultivo as c4, pc.supveranoejecutado as ve4, pc.supinviernoejecutado as ie4, pc.produccionver as pv4, pc.produccioninv as pi4
	from monitoreo.plancultivo as pc inner join monitoreo.monitoreo as m on m.idmonitoreo = pc.idmonitoreo
	where pc.anocultivo = 4 and pc.comprometido = 1 and m.idregistro = ".$_SESSION['idreg']." order by c4 asc";
	$rcia_agricolanc4 = pg_query($cn,$sql_rciaagricolanc4);
	$row_rciaagricolanc4 =  pg_fetch_array ($rcia_agricolanc4);

	$sql_rciaagricolanc5= "select m.idregistro as idr5, pc.idmonitoreo as mon5, pc.idcultivo as c5, pc.supveranoejecutado as ve5, pc.supinviernoejecutado as ie5, pc.produccionver as pv5, pc.produccioninv as pi5
	from monitoreo.plancultivo as pc inner join monitoreo.monitoreo as m on m.idmonitoreo = pc.idmonitoreo
	where pc.anocultivo = 5 and pc.comprometido = 1 and m.idregistro = ".$_SESSION['idreg']." order by c5 asc";
	$rcia_agricolanc5 = pg_query($cn,$sql_rciaagricolanc5);
	$row_rciaagricolanc5 =  pg_fetch_array ($rcia_agricolanc5);

 }
 elseif ($periodo == 2)
 {
	 $sql_rciaagricolanc1= "select m.idregistro as idr1 ,pc.idmonitoreo as mon1, pc.idcultivo as c1, pc.supveranoejecutado as ve1, pc.supinviernoejecutado as ie1, pc.produccionver as pv1, pc.produccioninv as pi1
 	from monitoreo.plancultivo as pc inner join monitoreo.monitoreo as m on m.idmonitoreo = pc.idmonitoreo
 	where pc.anocultivo = 3 and pc.comprometido = 1 and m.idregistro = ".$_SESSION['idreg']." order by c1 asc";
 	$rcia_agricolanc1 = pg_query($cn,$sql_rciaagricolanc1);
 	$row_rciaagricolanc1 =  pg_fetch_array ($rcia_agricolanc1);

 	$sql_rciaagricolanc2= "select m.idregistro as idr2, pc.idmonitoreo as mon2, pc.idcultivo as c2, pc.supveranoejecutado as ve2, pc.supinviernoejecutado as ie2, pc.produccionver as pv2, pc.produccioninv as pi2
 	from monitoreo.plancultivo as pc inner join monitoreo.monitoreo as m on m.idmonitoreo = pc.idmonitoreo
 	where pc.anocultivo = 4 and pc.comprometido = 1 and m.idregistro = ".$_SESSION['idreg']." order by c2 asc";
 	$rcia_agricolanc2 = pg_query($cn,$sql_rciaagricolanc2);
 	$row_rciaagricolanc2 =  pg_fetch_array ($rcia_agricolanc2);

 	$sql_rciaagricolanc3= "select m.idregistro as idr3, pc.idmonitoreo as mon3, pc.idcultivo as c3, pc.supveranoejecutado as ve3, pc.supinviernoejecutado as ie3, pc.produccionver as pv3, pc.produccioninv as pi3
 	from monitoreo.plancultivo as pc inner join monitoreo.monitoreo as m on m.idmonitoreo = pc.idmonitoreo
 	where pc.anocultivo = 5 and pc.comprometido = 1 and m.idregistro = ".$_SESSION['idreg']." order by c3 asc";
 	$rcia_agricolanc3 = pg_query($cn,$sql_rciaagricolanc3);
 	$row_rciaagricolanc3 =  pg_fetch_array ($rcia_agricolanc3);

 	$sql_rciaagricolanc4= "select  m.idregistro as idr4, pc.idmonitoreo as mon4, pc.idcultivo as c4, pc.supveranoejecutado as ve4, pc.supinviernoejecutado as ie4, pc.produccionver as pv4, pc.produccioninv as pi4
 	from monitoreo.plancultivo as pc inner join monitoreo.monitoreo as m on m.idmonitoreo = pc.idmonitoreo
 	where pc.anocultivo = 6 and pc.comprometido = 1 and m.idregistro = ".$_SESSION['idreg']." order by c4 asc";
 	$rcia_agricolanc4 = pg_query($cn,$sql_rciaagricolanc4);
 	$row_rciaagricolanc4 =  pg_fetch_array ($rcia_agricolanc4);

 	$sql_rciaagricolanc5= "select m.idregistro as idr5, pc.idmonitoreo as mon5, pc.idcultivo as c5, pc.supveranoejecutado as ve5, pc.supinviernoejecutado as ie5, pc.produccionver as pv5, pc.produccioninv as pi5
 	from monitoreo.plancultivo as pc inner join monitoreo.monitoreo as m on m.idmonitoreo = pc.idmonitoreo
 	where pc.anocultivo = 7 and pc.comprometido = 1 and m.idregistro = ".$_SESSION['idreg']." order by c5 asc";
 	$rcia_agricolanc5 = pg_query($cn,$sql_rciaagricolanc5);
 	$row_rciaagricolanc5 =  pg_fetch_array ($rcia_agricolanc5);

 }


?>
