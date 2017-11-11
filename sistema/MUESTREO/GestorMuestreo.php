<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of codificadores
 *
 * @author billy leanos
 */

class GestorMuestreo {
	protected $cn;
    //put your code here
	function __construct() {
		require_once APPPATH.'/config/Conexion.php';
		$this->cn = Conexion::create();
	}

    function guardarMuestreo( $inid,    $indecripcion, $departamento,$inanho ,   $tipomuestreo, $infecha,$inestado){
       $sql=" select save_muestreo(
           ".$inid.",
           '".$indecripcion."' ,
            ".$departamento.",
             ".$inanho.",
           ".$tipomuestreo.",
           '".$infecha."',
           ".$inestado."
           ) as id";
// echo $sql;
return $this->cn->ejecutarSql($sql);
}
  function getMuestreos(){
       $sql=" select mt.*,ms.totalmuestra from (select m.*,t.totalpredios from (SELECT mu.id, mu.descripcion, p.nombrepolitico as departamento, mu.anho, c.nombrecodificador as tipo, mu.fecha, mu.estado, mu.elinimado
  FROM muestreo mu,codificadores c ,politico p where c.idcodificadores=mu.tipo and p.idpolitico=mu.departamento and estado=1 and elinimado isnull)as m left join
  (SELECT muestreoid,count(muestreoid) as totalpredios from muestreo_registro group by muestreoid)as t on m.id=t.muestreoid)as mt left join
  (SELECT muestreoid,count(muestreoid) as totalmuestra from muestreo_registro where seleccionado=1 group by muestreoid)as ms on mt.id=ms.muestreoid  order by id;";
// echo $sql;
return $this->cn->ejecutarSql($sql);
}
function eliminarMuestreo($id ){
    $sql="update muestreo set estado=0
 WHERE id=".$id;
    return $this->cn->ejecutarSql($sql);
}

function getDataMuestreo($inid){
$sql="select mt.*,ms.totalmuestra from (select m.*,t.totalpredios from (SELECT mu.id, mu.descripcion, p.nombrepolitico as departamento, mu.anho, c.nombrecodificador as tipo, mu.fecha, mu.estado, mu.elinimado, mu.n, mu.k, mu.xxmin, mu.xxmax, mu.r, mu.l
  FROM muestreo mu,codificadores c ,politico p where c.idcodificadores=mu.tipo and p.idpolitico=mu.departamento and estado=1 and elinimado isnull and id=".$inid." )as m left join
  (SELECT muestreoid,count(muestreoid) as totalpredios from muestreo_registro group by muestreoid)as t on m.id=t.muestreoid)as mt left join
  (SELECT muestreoid,count(muestreoid) as totalmuestra from muestreo_registro where seleccionado=1 group by muestreoid)as ms on mt.id=ms.muestreoid  order by id";
return $this->cn->ejecutarSql($sql);
}

function getMuestraByMuestreo($inid,$inseleccionado){
    $sql=" SELECT r.*,
   mr.cp, mr.sr, mr.a, mr.ug, mr.ts,
    mr.estrado,
    mr.ponderacion,
    mr.seleccionado
FROM report_general r,
    muestreo_registro mr
WHERE
     mr.registroid = r.\"ID REGISTRO\"
     AND mr.muestreoid =".$inid;
     if ($inseleccionado!="") {
       $sql.="and mr.seleccionado=".$inseleccionado;
     }
     return $this->cn->ejecutarSql($sql);

}



   function getTipoMuestreo( $inid){
       $sql=" select nombrecodificador as tipo from codificadores where idcodificadores=
           ".$inid;
// echo $sql;
return $this->cn->ejecutarSql($sql);
}
function getIntervalosDeClase($listaUniverso,$idmuestreo){
   $sr;
   $N = count ($listaUniverso);
   foreach ($listaUniverso as $key => $val) {
    $predio=pg_fetch_array($this->cn->ejecutarSql($sql="select *from Report_general where \"ID PARCELA\"='".$val."'"));

    $sr[]=$predio['SUP DEFORESTADA ILEGAL']+$predio['SUP PAS'];
}
$k=ceil(1+log($N, 2));
$ls=max($sr);
$li=min($sr);
$R=$ls-$li;
$L=$R/$k;
$limite=$li;
$limites;
$i=1;
$i_1=1;

while ( $limite<= $ls) {
    $limites[$i]['li']=$limite;
    $limite=$limite+$L;
    $limites[$i]['ls']=$limite;
    // $limites[$i]['p']=$p;
    // echo $i.".- li=".$limites[$i]['li']."- ls=".$limites[$i]['ls'] .";valor=".$limites[$i]['p'];
    // echo "<br>";
    $i++;
    // $p=$p+5;
}
$countLimites=count($limites);
$p=30/$countLimites;
$ponderacion=$p;
$sqlpd="DELETE FROM intervalos
 WHERE muestreoid= ".$idmuestreo.";";
 $this->cn->ejecutarSql($sqlpd);
while ( $i_1<= $countLimites) {

    $limites[$i_1]['p']=$ponderacion;
    // echo $i_1.".- li=".$limites[$i_1]['li']."- ls=".$limites[$i_1]['ls'] .";valor=".$limites[$i_1]['p'];
    // echo "<br>";
    $sqlp="INSERT INTO intervalos(muestreoid, nro, li, ls, valor)
    VALUES (".$idmuestreo.", ".$i_1.", ".$limites[$i_1]['li'].", ".$limites[$i_1]['ls'].", ".$limites[$i_1]['p'].");"  ;
   $this->cn->ejecutarSql($sqlp);
    $ponderacion=$ponderacion+$p;
    $i_1++;
}

// echo " Valores de las variables para ponderacion por superficie de desmonte";
// echo "<br>";
// echo " N=".$N;
// echo "<br>";
// echo " K=".$k;
// echo "<br>";
// echo " xmax=".$ls;
// echo "<br>";
// echo " xmin=".$li;
// echo "<br>";
// echo " L=".$L;
// echo "<br>";
// echo " ls=".$ls;
// echo "<br>";
// echo " li=".$li;
// echo "<br>";
// echo " R=".$R;
// echo "<br>";
 $sql=" UPDATE muestreo
   SET n=".$N.", k=".$k.", xxmin=".$li.", xxmax=".$ls.", r=".$R.", l=".$L."  WHERE id=".$idmuestreo.";";
// echo $sql;
 $this->cn->ejecutarSql($sql);
return $limites;
}

function getPonderacionCP($tipo){
    $total=0;
    switch ($tipo) {
        case 'Empresarial':
        $total= $total+50;
        break;
        case 'Mediana':
        $total= $total+40;
        break;
        case 'Pequeña':
        $total= $total+20;
        break;
        case 'Comunidad':
        $total= $total+5;
        break;
        default:
        break;

    }
    return $total;
}
function getPonderacionA($actividad){
    $total=2;
    switch ($actividad) {
        case 'Ganadera':
        $total= 10;
        break;
        case 'Agricola':
        $total= 7;
        break;
        case 'Mixta Agropecuaria':
        $total= 4;
        break;
        // case 'Comunidad o TIOC':
        // $total= $total+3;
        // break;
        // case 'Otras':
        // $total= $total+2;
        // break;
        default:
        break;
    }
    return $total;
}

// function getPonderacionA(actividad){
//     $total=0;
//     switch ($actividad) {
//         case 'Ganadera':
//         $total= $total+10;
//         break;
//         case 'Agricola':
//         $total= $total+7;
//         break;
//         case 'Mixta Agropecuaria':
//         $total= $total+4;
//         break;
//         case 'Otras':
//         $total= $total+2;
//         break;
//         default:
//         break;
//     }
//     return $total
// }


function getPonderacionUG($ubicacionGoegrafica){
    $total=3;
    switch ($ubicacionGoegrafica) {
        case 'NORTE':
        $total=5;
        break;
        case 'ESTE':
        $total=5;
        break;
        case 'CHIQUITANIA':
        $total=4;
        break;
        case 'CHACO':
        $total=3;
        break;
        default:
        break;

    }
      return $total;
}
function getPonderacionTS($supTpfp,$supTum){
    $total=0;
    if ($supTpfp>0 && $supTum>0) {
        $total= 5;
    }elseif ($supTpfp>0 && $supTum==0) {
        $total= 4;
    }elseif ($supTpfp==0 && $supTum>0) {
       $total=3;
   }

   return $total;
}


function getPonderacionSR($supdesforestada,$intervalos){
    $total=0;
    $sr= $supdesforestada;
    $totalintevalos = count($intervalos);
    $i=1;
    while ( $i<= $totalintevalos) {
     if (($intervalos[$i]['li'] >= $sr) && ($sr <=$intervalos[$i]['ls'])) {
      return   $total= $intervalos[$i]['p'];
     }
     $i++;
 }
 return $total;
}
function getEstracto($total1){
    $estrato=0;


     if ((0 <= $total1) && ($total1 <=35)) {
      return  $estrato=1;
      }
      if ((35 <= $total1) && ($total1 <=55)) {
      return  $estrato=2;
      }
      if ((55 <= $total1) && ($total1 <=75)) {
      return  $estrato=3;
      }
      if ((75 <= $total1) && ($total1 <=100)) {
      return  $estrato=4;
      }
 return $estrato;
}
function getPonderacion($idmuestreo,$listaUniverso,$tipo){

    $total=0;

    $intervalos=  $this->getIntervalosDeClase($listaUniverso,$idmuestreo);
$resultado;
$c=1;
    foreach ($listaUniverso as $key => $val) {
        $predio=pg_fetch_array($this->cn->ejecutarSql($sql="select *from Report_general where \"ID PARCELA\"='".$val."'"));

        $CP=  $this->getPonderacionCP($predio['TIPO PROPIEDAD']);

        $SR= $this->getPonderacionSR($predio['SUP DEFORESTADA ILEGAL'] + $predio['SUP PAS'],$intervalos);

        $A=  $this->getPonderacionA($predio['ACTIVIDAD']);

        $zonaProductiva=pg_fetch_array($this->cn->ejecutarSql($sql="select zona_productiva.nombre as zonaproductiva from zona_productiva_politico ,zona_productiva,report_general,parcelas where zona_productiva_politico.zona_productivaid=zona_productiva.id and report_general.\"ID PARCELA\"=parcelas.idparcela and parcelas.idpolitico=zona_productiva_politico.politicoid and report_general.\"ID PARCELA\"='".$val."'"));


        $UG=  $this->getPonderacionUG($zonaProductiva['zonaproductiva']);

        $TS=  $this->getPonderacionTS($predio['SUP DEFORESTADA ILEGAL'],$predio['SUP PAS']);
        $totalt=$CP+$SR+$A+$UG+$TS;
        $estrato= $this->getEstracto($totalt);
         // echo "estrato nro=".$estrato;
         //  echo "<BR>";
        // $resultado[$estrato][]['predio']=$predio;
        // $resultado[$estrato][]['ponderacion']=$totalt;
        // $resultado[$estrato][]['estrato']=$estrato;
        $resultado['universo'][]= $predio;
        $resultado[$estrato][]= array('predio'=>$predio,'ponderacion'=>$totalt,'estrato'=>$estrato);
     // echo "CODIGO PREDIO :".$val.", CP=".$CP.", SR=".$SR.", A=".$A.", UG=".$UG.", TS=".$TS.", TOTAL=".$totalt."  ";
     // echo "<BR>";
$sql="INSERT INTO muestreo_registro(
            muestreoid, registroid, estrado, excepcion, ponderacion, cp, sr, a, ug, ts)
    VALUES (".$idmuestreo.", ".$predio['ID REGISTRO'].",".$estrato.", null, ".$totalt.", ".$CP.", ".$SR.", ".$A.", ".$UG.", ".$TS.");";
    $this->cn->ejecutarSql($sql);
    $c++;
    }
    // var_dump($resultado);
   // echo "CATIDAD POR ESTRACTO<BR>";
   //    echo $contestrato1=@$resultado[1]==""?0:ceil(count($resultado[1]));
   //  echo "<BR>";
   //  echo $contestrato2=@$resultado[2]==""?0:ceil(count($resultado[2]));
   //  echo "<BR>";
   //  echo $contestrato3=@$resultado[3]==""?0:ceil(count($resultado[3]));
   //  echo "<BR>";
   //  echo $contestrato4=@$resultado[4]==""?0:ceil(count($resultado[4]));
   //  echo "<BR>";
   // echo "N POR ESTRACTOS<BR>";
$porcentaje1=0.10;
$porcentaje2=0.30;
$porcentaje3=0.50;
$porcentaje4=0.70;
if ($tipo==306) {
$porcentaje1=0.02;
$porcentaje2=0.10;
$porcentaje3=0.20;
$porcentaje4=0.30;
}

   $contestrato1=@$resultado[1]==""?0:ceil(count($resultado[1])*$porcentaje1);
   //  echo "<BR>";
    $contestrato2=@$resultado[2]==""?0:ceil(count($resultado[2])*$porcentaje2);
   //  echo "<BR>";
    $contestrato3=@$resultado[3]==""?0:ceil(count($resultado[3])*$porcentaje3);
   //  echo "<BR>";
    $contestrato4=@$resultado[4]==""?0:ceil(count($resultado[4])*$porcentaje4);
   //  echo "<BR>";




$resultado['estratos']=array('estrato1'=>$contestrato1,'estrato2'=>$contestrato2,'estrato3'=>$contestrato3,'estrato4'=>$contestrato4);

$muestra1=@$resultado[1]==""?null:array_rand($resultado[1],$contestrato1);
$muestra2=@$resultado[2]==""?null:array_rand($resultado[2],$contestrato2);
$muestra3=@$resultado[3]==""?null:array_rand($resultado[3],$contestrato3);
$muestra4=@$resultado[4]==""?null:array_rand($resultado[4],$contestrato4);
// echo "<BR>ASSSSSSSSSSSSSSSSSSSSSSSSSSSSS";
//  echo "<BR>";
// var_dump(@$resultado[1][$muestra1]);
// echo "<BR>ASSSSSSSSSSSSSSSSSSSSSSSSSSSSS";
//  echo "<BR>";
// var_dump(@$resultado[2][$muestra2]);
// echo "<BR>ASSSSSSSSSSSSSSSSSSSSSSSSSSSS";
//  echo "<BR>";
// var_dump(@$resultado[3][$muestra3]);
//     echo "<BR>ASSSSSSSSSSSSSSSSSSSSSSSSSSS";
//      echo "<BR>";
// var_dump(@$resultado[4][$muestra4]);
//  echo "<BR>ASSSSSSSSSSSSSSSSSSSSSSSSSSS";
//   echo "<BR>";
$totalcountm1=count($muestra1);
 if ($totalcountm1 > 0) {
  $con1=0;
 while ( $con1< $totalcountm1) {
  $val1=$muestra1;
  if($totalcountm1>1){
    $val1=$muestra1[$con1];
  }
    # code...
    $sql1="UPDATE muestreo_registro
   SET   seleccionado=1
 WHERE muestreoid=".$idmuestreo." and registroid=".$resultado[1][$val1]['predio']['ID REGISTRO'].";";
 $this->cn->ejecutarSql($sql1);
  $con1++;
}
}





$totalcountm2=count($muestra2);
 if ($totalcountm2 > 0) {
  $con2=0;
 while ( $con2< $totalcountm2) {
  $val2=$muestra2;
  if($totalcountm2>1){
    $val2=$muestra2[$con2];
  }
    # code...
    $sql2="UPDATE muestreo_registro
   SET   seleccionado=1
 WHERE muestreoid=".$idmuestreo." and registroid=".$resultado[2][$val2]['predio']['ID REGISTRO'].";";
 $this->cn->ejecutarSql($sql2);
  $con2++;
}
}




$totalcountm3=count($muestra3);
 if ($totalcountm3 > 0) {
  $con3=0;
 while ( $con3< $totalcountm3) {
  $val3=$muestra3;
  if($totalcountm3>1){
    $val3=$muestra3[$con3];
  }
    # code...
    $sql3="UPDATE muestreo_registro
   SET   seleccionado=1
 WHERE muestreoid=".$idmuestreo." and registroid=".$resultado[3][$val3]['predio']['ID REGISTRO'].";";
 $this->cn->ejecutarSql($sql3);
  $con3++;
}
}

$totalcountm4=count($muestra4);
 if ($totalcountm4 > 0) {
  $con4=0;
 while ( $con4< $totalcountm4) {
  $val4=$muestra4;
  if($totalcountm4>1){
    $val4=$muestra4[$con4];
  }
    # code...
    $sql4="UPDATE muestreo_registro
   SET   seleccionado=1
 WHERE muestreoid=".$idmuestreo." and registroid=".$resultado[4][$val4]['predio']['ID REGISTRO'].";";
 $this->cn->ejecutarSql($sql4);
  $con4++;
}
}


$resultado['muestras']=array('muestra1'=>@$muestra1,'muestra2'=>$muestra2,'muestra3'=>$muestra3,'muestra4'=>$muestra4);

 // var_dump($resultado['muestras']);
return $resultado;
}



}
?>
