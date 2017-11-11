<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of codificadores
 *
 * @author Billy Leanos
 */



class GestorMonitoreo {
	protected $cn;
    //put your code here
	function __construct() {
		require_once APPPATH.'/config/Conexion.php';
		$this->cn = Conexion::create();
	}
function deletePredio($id )
	{
		$sql="UPDATE predio SET estado='D' WHERE id_predio=".$id;

		return $this->cn->ejecutarSqlObject($sql);
	}


	function guardarMonitoreo(
    $idmonitoreo,
    $idregistro,
    $anho ,
    $tipo ,
    $estado ,
    $nota ,
    $valoracion ,
    $agenteauxiliar  ,
    $oficina ){

		$sql="SELECT * from monitoreo.ff_monitoreo(".$idmonitoreo.",".$idregistro .","
			.$anho .",".$tipo .",".$estado .",".$nota .","
			.$valoracion.",". $agenteauxiliar .",".$oficina.")";
    //echo $sql;
   //exit();
		return $this->cn->ejecutarSqlObject($sql);
 	}


function asignarTecnicos($idmonitoreo, $bosques,$alimentos){
 $tiporegistrador=0;
if ($bosques!="") {
	 $tiporegistrador=137;
	$sql="SELECT * from monitoreo.ff_funcionariomonitoreo(".$idmonitoreo.",".$bosques .",".$tiporegistrador.")";
  // echo $sql;
  // exit();
$this->cn->ejecutarSqlObject($sql);
}
if ($alimentos!="") {
	 $tiporegistrador=138;
	$sql="SELECT * from monitoreo.ff_funcionariomonitoreo(".$idmonitoreo.",".$alimentos .",".$tiporegistrador.")";
$this->cn->ejecutarSqlObject($sql);
  // echo $sql;
  // exit();
}

return ;
 }


 function guardar_imagen_monitoreo(
    $idimagen,
    $idmonitoreo,
    $imagen , 
    $estado)
	{

		$sql="SELECT * from monitoreo.ff_guardar_imagen_monitoreo(".$idimagen.",".$idmonitoreo .",'"
			.$imagen ."',".$estado.");";
               //  echo "sql=".$sql;
		return $this->cn->ejecutarSqlObject($sql);
 	}

 
 
function guardarObs(
    $idmonitoreo,
    $tipo ,
    $obs,
    $estado)
	{

		$sql="SELECT * from monitoreo.ff_obs(".$idmonitoreo.",".$tipo .",'"
			.$obs ."',".$estado.")";
		return $this->cn->ejecutarSqlObject($sql);
 	}


 	function getTecnicos($idregistro,$anho,$tipo){
$sql="SELECT fm.idmonitoreo, fm.idfuncionario, fm.tiporegistrador, m.estado,m.oficina
  FROM monitoreo.funcionariomonitoreo fm, monitoreo.monitoreo m
where fm.idmonitoreo=m.idmonitoreo  and  idregistro=".$idregistro."  and anho=".$anho." and tipo=".$tipo;
	return $this->cn->ejecutarSqlObject($sql);
}


function guardar_produccion_agricola_rcia(
$cultivo,
$ano,
$monitoreo,
$supvereje,
$supinvieje,
$prodver,
$prodinv,
$comprometido,
$estado
)
{
		$sql="SELECT * from monitoreo.ff_guardar_produccion_agricola_rcia(".$cultivo.",".$ano .",".$monitoreo .",".$supvereje.",".$supinvieje .",".$prodver.",".$prodinv.",".$comprometido .",".$estado.")";
		return $this->cn->ejecutarSqlObject($sql);
}

function guardar_produccion_agricola_rcia_nc(
$cultivo,
$ano,
$monitoreo,
$supvereje,
$supinvieje,
$prodver,
$prodinv,
$comprometido,
$estado
)
{
		$sql="SELECT * from monitoreo.ff_guardar_produccion_agricola_rcia_nc(".$cultivo.",".$ano .",".$monitoreo .",".$supvereje.",".$supinvieje .",".$prodver.",".$prodinv.",".$comprometido .",".$estado.")";
		return $this->cn->ejecutarSqlObject($sql);
}



function guardar_actividad_rcia(
$codactividad,
$realiza,
$descr,
$idmonitoreo,
$anho
)
{
		$sql="SELECT * from monitoreo.ff_guardar_actividad(".$codactividad .",".$realiza .",'".$descr."',".$idmonitoreo .",".$anho.");";
		return $this->cn->ejecutarSqlObject($sql);

}

function guardar_actividad_rcia_cultivo_monitoreo(
$codactividad,
$realiza,
$descr,
$camp,
$idplancultmon
)
{
		$sql="SELECT * from monitoreo.ff_guardar_actividad_mon_cultivo(".$codactividad .",".$realiza .",'".$descr."','".$camp ."',".$idplancultmon.");";
		return $this->cn->ejecutarSqlObject($sql);

}


function guardar_doc_presentados_rcia(
$codactividad,
$presenta,
$monitoreo,
$ano,
$tipodoc
)
{
		$sql="select * from monitoreo.ff_guardar_docpresentados_rcia(".$codactividad .",".$presenta .",'".$monitoreo."','".$ano ."',".$tipodoc.");";
		return $this->cn->ejecutarSqlObject($sql);
}


function guardar_produccion_ganadera_rcia(
  $idmonitoreo,
  $suppastonatural,
  $suppastocultivado,
  $potrero,
  $pozas,
  $saleros,
  $bebederos,
  $brete,
  $corral,
  $forraje,
  $compraganado,
  $cantternero,
  $cantganado,
  $cantganadopie,
  $cantganadofaineo,
  $cantprodcarne,
  $ano
)
{
		$sql="SELECT * from monitoreo.ff_guardar_produccion_ganadera_rcia(".$idmonitoreo.",".$suppastonatural .",".$suppastocultivado .",".$potrero.",".$pozas .",".$saleros.",".$bebederos.",".$brete .",".$corral.",".$forraje.",".$compraganado .",".$cantternero.",".$cantganado .",".$cantganadopie.",".$cantganadofaineo.",".$cantprodcarne .",".$ano.")";
		return $this->cn->ejecutarSqlObject($sql);
}





function guardar_restitucion_bosques_rcia(
	$idesprest,
  $monitoreo,
  $especiecomun,
  $ano,
  $tiporestitucion,
  $suprest,
  $espaciamiento,
  $cantplant,
  $obs
)
{
		$sql="SELECT * from monitoreo.ff_guardar_restitucion_bosques_rcia(".$idesprest.",".$monitoreo.",".$especiecomun .",".$ano .",".$tiporestitucion.",".$suprest .",".$espaciamiento.",".$cantplant.",'".$obs ."')";
		return $this->cn->ejecutarSqlObject($sql);
}




function guardar_selsejecutado(
	$monitoreo,
  $compromiso,
  $tiposel,
  $suptpfp,
  $suptum,
	$suptpfppas,
  $suptumpas
)
{
		$sql="SELECT * from monitoreo.ff_guardar_supselsejecutadas(".$monitoreo.",".$compromiso.",".$tiposel.",".$suptpfp.",".$suptum.",".$suptpfppas.",".$suptumpas.")";
		return $this->cn->ejecutarSqlObject($sql);
}


function guardar_superficiemonitoreo(
	$monitoreo,
  $tiposuperficie,
  $superficie
)
{
		$sql="SELECT * from monitoreo.ff_guardar_superficiesmonitoreo(".$monitoreo.",".$tiposuperficie.",".$superficie.")";
		return $this->cn->ejecutarSqlObject($sql);
}




 function ejecute($sql){

 	return $this->cn->ejecutarSql($sql);
 }




 //-- analisis evaluacion de  documentacion -- ///

function guardar_doc_Analisis_evaluacion_rcia(
$idmonitorio2,
$iddoc,
$detallecontenido,
$monto_cant,
$obse
)
{
        //    echo "antes 2";
		$sql="select * from monitoreo.ff_guardar_evaluaciondoc_gan_rcia(".$idmonitorio2 .",".$iddoc .",'".$detallecontenido."','".$monto_cant ."','".$obse."');";
         //$sql="select idanalisisdocumentacion as  ff_guardar_evaluaciondoc_gan_rcia from monitoreo.analisisdocumentacion limit 1; ";                
               // echo "connxxx=".$sql;
		return $this->cn->ejecutarSqlObject($sql);
}


function guardar_evaluacionAlimentos_gan_rcia(
$idmonitoreo,
$idvalespecif,
$puntuacion,
$tipo
)
{
		$sql="select * from monitoreo.ff_guardar_evaluacionAlimentos_gan_rcia(".$idmonitoreo .",".$idvalespecif .",".$puntuacion.",".$tipo.");";
      // echo "consulta:".$sql;
//return $this->cn->ejecutarSqlObject($sql);
return $this->cn->ejecutarSql($sql);

}


function guardar_evaluacionAlimentos_gan_rcia2(
$idmonitoreo,
$idvalespecif,
$puntuacion,
$tipo
)
{
		$sql="select * from monitoreo.ff_guardar_evaluacionAlimentos_gan_rcia(".$idmonitoreo .",".$idvalespecif .",".$puntuacion.",".$tipo.");";
     // echo "consulta:".$sql;
return $this->cn->ejecutarSqlObject($sql);
//return $this->cn->ejecutarSql($sql);
}



function guardar_evaluacionMon_gabinete(
$idmonitoreo,
$idvalespecif,
$comprometido_ ,
$cuantificado_,
$alcanzado_,
$fuentes_ )
{
     $sql="select * from monitoreo.ff_guardar_evaluacionGanadero_gabienete_rcia(".$idmonitoreo .",".$idvalespecif .",".$comprometido_.",".$cuantificado_.",".$alcanzado_.",'".$fuentes_."');";
     //echo "consulta:".$sql;
return $this->cn->ejecutarSqlObject($sql);
//return $this->cn->ejecutarSql($sql);
}





function guardar_detallevalorcultivo_agri_rcia(
$idtablavalorli,
$idcultivo,
$puntuacioncultivo,
$compromiso,
$campaña
)
{
	$sql="select * from monitoreo.ff_guardar_detallevalorcultivo_agri_rcia(".$idtablavalorli .",".$idcultivo .",".$puntuacioncultivo.",".$compromiso.",'".$campaña."');";
            // echo "cccc=".$sql;
        return $this->cn->ejecutarSqlObject($sql);
}

function guardar_ponderacioncultivo_agri_rcia(
$idmonitoreo1,
$ponderacion1 ,
$idcultivo, 
$compromiso,
$campaña,
$ponFinal,
$porcPon       
)
{
	$sql="select * from monitoreo.ff_guardar_ponderacionEvalAgricola(".$idmonitoreo1 .",".$ponderacion1.",".$idcultivo .",".$compromiso.",'".$campaña."',".$porcPon.",".$ponFinal.");";
        // echo "cccc=".$sql;
        return $this->cn->ejecutarSqlObject($sql);
}



function guardarEvaluacionMonitoreo(
    $idmonitoreo,
    $idevalgral,
    $valoracion ){

        $sql="SELECT * from monitoreo.ff_guardar_valoracionbosques_rcia(".$idmonitoreo.",".$idevalgral .",".$valoracion.")";
        //echo $sql;
        //exit();
        return $this->cn->ejecutarSqlObject($sql);
    }


		function guardar_produccion_ganadera_lechera_rcia(
		  $idmonitoreo,
		  $suppastonatural,
		  $suppastocultivado,
			$sistemaordeno,
			$galpones,
			$tanques,
			$silos,
			$certtuber,
			$certbruce,
			$cabganprod,
			$cabgandes,
			$prodpromcarne,
			$prodpromleche,
			$prodtotalleche,
		  $ano
		)
		{
				$sql="SELECT * from monitoreo.ff_guardar_produccion_ganadera_lechera_rcia(".$idmonitoreo.",".$suppastonatural .",".$suppastocultivado .",".$sistemaordeno.",".$galpones .",".$tanques.",".$silos.",".$certtuber .",".$certbruce.",".$cabganprod.",".$cabgandes .",".$prodpromcarne.",".$prodpromleche .",".$prodtotalleche.",".$ano.")";
				//echo $sql;
				return $this->cn->ejecutarSqlObject($sql);

		}



function guardar_produccion_avicola_rcia(
  $idmonitoreo,
  $supcultavi,
  $supinfra,
  $sanitario,
  $pesadas,
  $livianas,
  $mortalidad,
  $posstura,
  $pollovente,
  $huevoventa,
  $bbventa,
  $ano
)
{
		$sql="SELECT * from monitoreo.ff_guardar_planproduccionavicola(".$idmonitoreo.",".$ano.",".$supcultavi .",".$supinfra .",".$sanitario.",".$pesadas.",".$livianas .",".$mortalidad.",".$posstura.",".$pollovente .",".$huevoventa.",".$bbventa.")";
              //  echo "Consulta=".$sql;
		return $this->cn->ejecutarSqlObject($sql);
}


function guardar_sistema_ganadero_rcia(
  $idsistproduc,
  $idmonitoreo,
  $canti
)
{
		$sql="SELECT * from monitoreo.ff_guardar_sistema_productivo(".$idsistproduc.",".$idmonitoreo.",".$canti.")";
		return $this->cn->ejecutarSqlObject($sql);
}



function guardarcampania(
$idmonitoreo,
$campania )
    {

            $sql="SELECT * from monitoreo.ff_guardar_predio_campania(".$idmonitoreo.",".$campania.")";
           // echo "ccc=".$sql;
            return $this->cn->ejecutarSqlObject($sql);
    }

        


}



 



?>
