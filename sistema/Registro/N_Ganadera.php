<?php
include "../Clases/SuperficieRegistro.php";
session_start();

include "../cabecera.php";

/* ################### verificacion de fechasuscripcion############# */
  $sql_suscripcion = "SELECT r.idregistro, fecharegistro, fechasuscripcion
from registro as r full join fechasregistro as fr on r.idregistro = fr.idregistro
where r.idregistro =".$_SESSION['idreg'];

    $resultSuscripcion = pg_query($cn,$sql_suscripcion) ;
  $row_Suscripcion = pg_fetch_array ($resultSuscripcion);
  // $today = date("Y-m-d");
$fechasuscripcion = $row_Suscripcion['fechasuscripcion']; //from db
//echo "fecha subcripcion registro ".$fechasuscripcion;
$periodo1_time = date($today="2015-09-29");


$periodo=2;
if ($fechasuscripcion!="") {
$predio_time = Date('Y-m-d', strtotime($fechasuscripcion));
if($periodo1_time > $predio_time){
  $periodo=1;
}
}
// echo "periodo=".$periodo;
// echo "periodo1 time=".$periodo1_time;
// echo "predio time=".$predio_time;
include "page_ganadera.php";

//print_r($_SESSION);
?>
<HTML>
<HEAD><TITLE>Llenado de Datos Ganadera</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<LINK href="../css/mdryt.css" type=text/css rel=stylesheet>
<link rel="stylesheet" type="text/css" href="../css/button.css"/>
<script language="JavaScript" src="../scripts/funciones.js"></script>

<script languaje="Javascript">
<!--
document.write('<style type="text/css">div.ocultable{display: none;}</style>');
function cabezasganado(cab) {
		try {  //alert(cab);
		      var a=document.getElementById('SupActGan').value;
			  var b=document.getElementById('SupGanLegal').value;
			  if(cab>4171 && cab<4175)
			  {document.getElementById("CantGanDef").value=Math.round(a/5);
			  }else{
			  document.getElementById("CantGanDef").value=Math.round(a/2.5);
			  }document.getElementById("CantGanleg").value=Math.round(b/5);

			}catch(e) {
				alert(e);
			}
}

function Habilitar(seleccion,identificador) {  //TPFP =1 superficie es tpfp
		try {
		      if (seleccion.checked){
				   document.getElementById('TxtSist'+String(identificador)).disabled=false;
				// alert(identificador);
			   }else{
				   document.getElementById('TxtSist'+String(identificador)).disabled=true;
				  }
			}catch(e) {
				alert(e);
			}
}


function SumaVerticalG(nombre) {
		try { //nombre="suppastosembrado";

		      var a=document.getElementById(nombre+1).value;
			  var b=document.getElementById(nombre+2).value;
			  var c=document.getElementById(nombre+3).value;
			  var d=document.getElementById(nombre+4).value;
			  var e=document.getElementById(nombre+5).value;
  //alert(b);
			  if(a.trim()==""){a=0; }//document.getElementById("pretotalplantines"+fila).value=0;}
			  if(b.trim()==""){b=0; }//document.getElementById("preciomo"+fila).value=0;}
			  if(c.trim()==""){c=0; }//document.getElementById("preciomantenimiento"+fila).value=0;}
			  if(d.trim()==""){d=0; }//document.getElementById("precioseguimiento"+fila).value=0;}
			  if(e.trim()==""){e=0; }//document.getElementById("preciootrogastos"+fila).value=0;}

			  document.getElementById(nombre+'t').value=parseFloat(a)+parseFloat(b)+parseFloat(c)+parseFloat(d)+parseFloat(e);

			}catch(e) {
				alert(e);
			}
}


//-->
</script>
</head>
<?php
include_once('../scripts/body_handler.inc.php');
?>
<body>
<?php

$sql_suprest = "select suptpfp,suptum,supalitpfp,supalitum, supdefilegal,supprodali  FROM suprestitucion where idregistro=".$_SESSION['idreg'];
	$suprest = pg_query($cn,$sql_suprest);
	$row_suprest = pg_fetch_array ($suprest);
	$num_suprest=pg_num_rows($suprest);

$sql_supali = "select *  FROM superficiealimentos where idregistro=".$_SESSION['idreg'];
		$supali = pg_query($cn,$sql_supali);
		$row_supali = pg_fetch_array ($supali);
		//print_r($row_supali);

?>
	 <div id="oculto">
<div class="ocultable" id="texto1"><div id="volanta"></div></div></div>

<div align="center" class="texto">
<form action="N_Ganadera.php" method="POST" name="formulario" autocomplete="off"  enctype="multipart/form-data" >
  <b><big>III. PRODUCCION DE ALIMENTOS </big></b><br>

    <b class="texto">Predio: <?php echo $_SESSION['nombre_predio'];?> Código: <?php echo $_SESSION['cod_parcela'];?> </b>

  <table width="95%" border="0" class='taulaA' align="center">
    <tr id="blau">
      <td width="144%" height="14" colspan="3"><hr></td>
    </tr>
    <tr id="blau" class="texto_normal">
      <td colspan="3" id='blau2'><span class="taulaH">1. Superficie para la Producci&oacute;n de Alimentos (Ha)</span></td>
    </tr>
    <tr id="blau" class="texto_normal">
      <td colspan="3" id='blau6'><table width="100%" border="1" cellspacing="0" class='taulaA'>
        <tr>
          <td rowspan="2" class="cabecera2" id="blau15"><div align="center">Sup. Total Predio</div></td>
          <td  rowspan="2" class="cabecera2" ><div align="center">Sup. Deforestada (Ha. ): </div></td>
           <?php if($_SESSION['Causal']==2){ ?>
          <td  rowspan="2" class="cabecera2" ><div align="center">Sup. P.A.S. (ha.):</div></td>
           <?php } ?>
          <td  rowspan="2" class="cabecera2" ><div align="center">Sup. Prod. Alimentos: </div></td>
          <td colspan="2" class="cabecera2" id="blau15"><div align="center">Prod Alimento Sup. Deforestada (ha.):            </div></td>
            <?php if($_SESSION['Causal']==2){ ?>
          <td colspan="2" class="cabecera2"><div align="center">Prod Alimento Sup. P.A.S. (ha.):            </div></td>
            <?php }?>
          </tr>
        <tr>
          <td class="cabecera2" id="blau16"><div align="center">Sup. en T.P.F.P.</div></td>
          <td class="cabecera2"><div align="center">Sup. T.U.M.</div></td>
         <?php if($_SESSION['Causal']==2){ ?>
          <td class="cabecera2" id="blau16"><div align="center">Sup. en T.P.F.P.</div></td>
          <td class="cabecera2"><div align="center">Sup. T.U.M.</div></td>
         <?php } ?>
          </tr>
        <tr id="blau">
          <td id="blau15"><div align="center">
            <input name="Superficie" type="text" class="boxVerde" id="Superficie"  onFocus="siguienteCampo ='FechaFin'" maxlength="10" value="<?php echo isset($_SESSION['datos_bosque']['Superficie']) ? htmlspecialchars($_SESSION['datos_bosque']['Superficie']) : $row_predio['superficie'];?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly >
          </div></td>
          <td ><div align="center">
            <input type="text" name="supdefilegal" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie337']->get_suptotal();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supdefilegal">
          </div></td>
          <?php if($_SESSION['Causal']==2){ ?>
          <td ><div align="center">
            <input type="text" name="suppas" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie502']->get_suptotal();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="suppas">
          </div></td>
          <?php }?>
          <td ><div align="center">
            <input name="SupProdAli" type="text"  id="SupProdAli" class="boxVerde" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  maxlength="15"  value="<?php if(isset($_SESSION['Causal']) && $_SESSION['Causal']==2)
		                {echo $_SESSION['superficie337']->get_supproali()+$_SESSION['superficie502']->get_supproali();}
				 else{ echo $_SESSION['superficie337']->get_supproali(); } ?>"  readonly>
          </div></td>
          <td height="22"  id="blau7"><div align="center">
            <input type="text" name="supalitpfp" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie337']->get_supalitpfp();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supalitpfp">
          </div></td>
          <td ><div align="center">
            <input type="text" name="supalitum" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie337']->get_supalitum();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supalitum">
          </div></td>
           <?php if($_SESSION['Causal']==2){ ?>
          <td ><div align="center">
            <input type="text" name="supalitpfppas" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie502']->get_supalitpfp();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supalitpfppas">
          </div></td>
          <td  id="blau7"><div align="center">
            <input type="text" name="supalitumpas" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie502']->get_supalitum();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supalitumpas">
          </div></td>
          <?php } ?>
          </tr>
      </table></td>
    </tr>
  </table>


  <table width="95%" border="0" class='taulaA' align="center">
      <tr class="texto_normal">
        <td id='blau4'><span class="taulaH">2. Uso Actual en &aacute;reas deforestadas ilegales (Ha)</span></td>
        <td width="45%" id='blau8' >&nbsp;</td>
      </tr>
      <tr class="texto_normal">
        <td colspan="2" id='blau13'><table width="86%" border="0" class='taulaA'>
          <tr id="blau3" >
            <td width="11%" id="blau11">Agricola: </td>
            <td width="20%" ><input name="SupActAgri" type="text" class="boxBusqueda4m" id="SupActAgri" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_ganadero']['SupActAgri']) ? htmlspecialchars($_SESSION['datos_ganadero']['SupActAgri']) : $row_supali['supagricola'] ?>" maxlength="15" readonly ></td>
            <td width="11%" id="blau11">Barbecho: </td>
            <td width="11%"><input name="SupActbar" type="text" class="boxBusqueda4" id="SupActbar" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_ganadero']['SupActbar']) ? htmlspecialchars($_SESSION['datos_ganadero']['SupActbar']) : $row_supali['supbarbecho']?>"  maxlength="15"></td>
            <td width="11%" id="blau11">Descanso</td>
            <td width="11%"><input name="SupActDes" type="text" class="boxBusqueda4m" id="SupActDes" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_ganadero']['SupActDes']) ? htmlspecialchars($_SESSION['datos_ganadero']['SupActDes']) : $row_supali['supdescanso']?>" maxlength="15" readonly></td>
            <td width="11%" id="blau11">Ganadera</td>
            <td width="11%"><input name="SupActGan" type="text" class="boxBusqueda4" id="SupActGan" onChange="cabezasganado(<?php echo $_SESSION['Departamento']?>)"  onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_ganadero']['SupActGan']) ? htmlspecialchars($_SESSION['datos_ganadero']['SupActGan']) : $row_supali['supganadera'] ?>" maxlength="15" ></td>
          </tr>
        </table></td>
      </tr>

      <tr class="texto_normal">
    <td width="55%" id='blau'><span class="taulaH">3. Datos Predio fuera de Area deforestada Ilegal (Sin sup. de mejoras): </span></td>
    <td width="45%" rowspan="4" id='blau8' ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="2" class="cabecera2">Sistemas de Produccion Ganadera En el Predio</td>
      </tr>
      <?php

	$sql_SistProduccion = "Select * From \"codificadores\" Where \"idclasificador\"=13 Order by \"nombrecodificador\"";
    $SistProduccion = pg_query($cn,$sql_SistProduccion) ;
	$row_SistProduccion = pg_fetch_array ($SistProduccion);

do{
	  $valor=$row_SistProduccion['idcodificadores'];
	  if(!isset($_SESSION['datos_ganadero'])){
	    $sql_SistProd = "SELECT sistprodganadera.* FROM sistprodganadera
					   WHERE  sistprodganadera.idregistro=".$_SESSION['idreg']." and sistprodganadera.idsistproductivo=".$valor;
		$SistProd = pg_query($cn,$sql_SistProd);
		$row_SistProd = pg_fetch_array ($SistProd);
		$totalRows_SistProd = pg_num_rows($SistProd);
	  }
    ?>
      <tr class="negre">
        <td width="197"><?php echo $row_SistProduccion['nombrecodificador'];?></td>
        <td width="192"><input type="checkbox"  onChange="Habilitar(this,'<?php echo $row_SistProduccion['idcodificadores'];?>')" <?php if(isset($_SESSION['datos_ganadero']["chk".$row_SistProduccion['idcodificadores']])){echo 'checked';}elseif(isset($totalRows_SistProd) && $row_SistProd['idsistproductivo']==$row_SistProduccion['idcodificadores']){echo 'checked';}?>  name="<?php echo "chk".$row_SistProduccion['idcodificadores'];?>"/>
            <input type="text" name="<?php echo 'TxtSist'.$row_SistProduccion['idcodificadores'];?>" class="boxBusqueda3" <?php if( !(isset($_SESSION['datos_ganadero']["chk".$row_SistProduccion['idcodificadores']])) ) { if(isset($totalRows_SistProd) && $row_SistProd['idsistproductivo']!=$row_SistProduccion['idcodificadores']){echo 'disabled';}}?>  id="<?php echo 'TxtSist'.$row_SistProduccion['idcodificadores'];?>" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="document.forms[0].submit()" value="<?php if(isset($_SESSION['datos_ganadero']['TxtSist'.$valor])) { echo $_SESSION['datos_ganadero']['TxtSist'.$valor];} elseif( isset($row_SistProd['idsistproductivo']) && $row_SistProd['idsistproductivo']==$row_SistProduccion['idcodificadores'] ){ echo $row_SistProd['cantidad'];} ?>" ></td>
      </tr>
      <?php  } while ($row_SistProduccion = pg_fetch_assoc($SistProduccion));?>
    </table></td>
      </tr>
  <tr class="texto_normal">
    <td id='blau'><table width="37%" border="0" class='taulaA'>
      <tr>
        <td width="40%" id="blau">Sup. Ganadera:</td>
        <td width="60%" ><input name="SupGanLegal" type="text" class="boxBusqueda4" id="SupGanLegal" onChange="cabezasganado(<?php echo $_SESSION['Departamento']?>)" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  maxlength="15" value="<?php echo isset($_SESSION['datos_ganadero']['SupGanLegal']) ? htmlspecialchars($_SESSION['datos_ganadero']['SupGanLegal']) : $row_supali['supganlegal']  ?>"></td>
      </tr>
    </table></td>
    </tr>
  <tr class="texto_normal">
    <td id='blau9'><span class="taulaH">4.Cabezas de Ganado a considerar:</span></td>
    </tr>
  <tr >
    <td ><table width="100%" border="0" class="taulaA" >
      <tr>
        <td width="27%" class="celdaVerdeClaro" >Ganado Sup Deforestada: </td>
        <td width="25%" class="celdaVerdeClaro" ><input name="CantGanDef" type="text" class="boxBusqueda4" id="CantGanDef" maxlength="15" value="<?php if(isset($_SESSION['Departamento']) && ($_SESSION['Departamento']==4172 ||$_SESSION['Departamento']==4173 || $_SESSION['Departamento']==4174 || $_SESSION['Departamento']==3931 || $_SESSION['Departamento']==3943 || $_SESSION['Departamento']==3945 || $_SESSION['Departamento']==3932) ){echo isset($_SESSION['datos_ganadero']['SupActGan']) ? htmlspecialchars(round($_SESSION['datos_ganadero']['SupActGan']/5)) : round($row_supali['supganadera']/5);} else{echo isset($_SESSION['datos_ganadero']['SupActGan']) ? htmlspecialchars(round($_SESSION['datos_ganadero']['SupActGan']/2.5)) : round($row_supali['supganadera']/2.5);} ?>"></td>
        <td width="25%" class="celdaVerdeClaro" >Ganado Sup. Fuera del Area deforestada: </td>
        <td width="23%" class="celdaVerdeClaro" ><input name="CantGanleg" type="text" class="boxBusqueda4" id="CantGanleg" maxlength="15" value="<?php echo isset($_SESSION['datos_ganadero']['SupGanLegal']) ? htmlspecialchars(round($_SESSION['datos_ganadero']['SupGanLegal']/5)) : round($row_supali['supganlegal']/5)  ?>"></td>
        </tr>
      </table></td>
    </tr>
  </table>
<table width="95%" class="taulaA" border="1" cellspacing="0">
  <tr align="center">
    <td colspan="2" rowspan="2" class="cabecera2">Situacion Actual Ganadera</td>
    <td width="2%" rowspan="19" >&nbsp;</td>
    <td colspan="7" class="cabecera2">Plan de Producción Ganadera en 5 años Sistema Mejorado</td>
    </tr>
  <tr align="center">
    <td width="15%" class="cabecera2">&nbsp;</td>
    <?php if ($periodo==1) {  ?>

    <td width="10%" class="cabecera2">2014</td>
    <td width="10%" class="cabecera2">2015</td>
       <?php   }?>
    <td width="10%" class="cabecera2">2016</td>
    <td width="10%" class="cabecera2">2017</td>
    <td width="10%" class="cabecera2">2018</td>
     <?php if ($periodo==2) {  ?>
      <td width="10%" class="cabecera2">2019</td>
    <td width="10%" class="cabecera2">2020</td>
      <?php   }?>
    <td width="10%" class="cabecera2">Total</td>
  </tr>
  <tr >
    <td colspan="2" class="taulaH">En Area de Deforestada Ilegal y/o P.A.S.:</td>
    <td colspan="7" class="taulaH">En Area de Deforestada Ilegal y/o P.A.S.:</td>
    </tr>
  <tr >
    <td class="celdaCelesteClaro" >Sup. Pastos Naturales </td>
    <td align="left"class="celdaCelesteClaro" ><input name="suppastonatural0" type="text" class="boxBusqueda4" id="suppastonatural0" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo isset($_SESSION['datos_ganadero']['suppastonatural0']) ? htmlspecialchars($_SESSION['datos_ganadero']['suppastonatural0']) : $row_ppg0['suppastonatural'] ?>"></td>
    <td class="celdaCelesteClaro" >Sup. Pastos Naturales </td>
    <td align="left"class="celdaCelesteClaro" >--</td>
    <td align="left"class="celdaCelesteClaro" >--</td>
    <td align="left"class="celdaCelesteClaro" >--</td>
    <td align="left"class="celdaCelesteClaro" >--</td>
    <td align="left"class="celdaCelesteClaro" >--</td>
    <td align="left"class="celdaCelesteClaro" >--</td>
  </tr>
  <tr align="center" >
    <td class="celdaCelesteClaro" align="left">Sup. Pastos Cultivados</td>
    <td class="celdaCelesteClaro"><label>
      <input name="suppastosembrado0" type="text" class="boxBusqueda4" id="suppastosembrado0" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo isset($_SESSION['datos_ganadero']['suppastosembrado0']) ? htmlspecialchars($_SESSION['datos_ganadero']['suppastosembrado0']) : $row_ppg0['suppastosembrado'] ?>">
    </label></td>
    <td class="celdaCelesteClaro" align="left">Sup. Pastos Cultivados</td>

    <td class="celdaCelesteClaro"><input name="suppastosembrado1" type="text" class="boxBusqueda4" id="suppastosembrado1" onChange="SumaVerticalG('suppastosembrado')" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo isset($_SESSION['datos_ganadero']['suppastosembrado1']) ? htmlspecialchars($_SESSION['datos_ganadero']['suppastosembrado1']) : $row_ppg1['suppastosembrado'] ?>"></td>
    <td class="celdaCelesteClaro"><input name="suppastosembrado2" type="text" class="boxBusqueda4" id="suppastosembrado2" onChange="SumaVerticalG('suppastosembrado')" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['suppastosembrado2']) ? htmlspecialchars($_SESSION['datos_ganadero']['suppastosembrado2']) : $row_ppg2['suppastosembrado'] ?>" ></td>

    <td class="celdaCelesteClaro"><input name="suppastosembrado3" type="text" class="boxBusqueda4" id="suppastosembrado3" onChange="SumaVerticalG('suppastosembrado')" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['suppastosembrado3']) ? htmlspecialchars($_SESSION['datos_ganadero']['suppastosembrado3']) : $row_ppg3['suppastosembrado'] ?>" ></td>
    <td class="celdaCelesteClaro"><input name="suppastosembrado4" type="text" class="boxBusqueda4" id="suppastosembrado4" onChange="SumaVerticalG('suppastosembrado')" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['suppastosembrado4']) ? htmlspecialchars($_SESSION['datos_ganadero']['suppastosembrado4']) : $row_ppg4['suppastosembrado'] ?>" ></td>
    <td class="celdaCelesteClaro"><input name="suppastosembrado5" type="text" class="boxBusqueda4" id="suppastosembrado5" onChange="SumaVerticalG('suppastosembrado')" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo isset($_SESSION['datos_ganadero']['suppastosembrado5']) ? htmlspecialchars($_SESSION['datos_ganadero']['suppastosembrado5']) : $row_ppg5['suppastosembrado'] ?>"></td>

    <td class="celdaCelesteClaro"><input name="suppastosembradot" type="text" class="boxBusqueda4" id="suppastosembradot" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly   value="<?php echo isset($_SESSION['datos_ganadero']['suppastosembradot']) ? htmlspecialchars($_SESSION['datos_ganadero']['suppastosembradot']) : $row_ppg1['suppastosembrado']+$row_ppg2['suppastosembrado']+$row_ppg3['suppastosembrado']+$row_ppg4['suppastosembrado']+$row_ppg5['suppastosembrado'] ?>"></td>
    </tr>
  <tr align="left">
    <td colspan="2" align="left" class="taulaH"> En La Totalidad de Predio:</td>
    <td colspan="7" align="left" class="taulaH"> En La Totalidad de Predio:</td>
    </tr>
  <tr align="left">
    <td class="celdaCelesteClaro" align="left">Potreros con Alambrada (uni)</td>
    <td class="celdaCelesteClaro"><input name="potrero0" type="text" class="boxBusqueda4" id="potrero0" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo isset($_SESSION['datos_ganadero']['potrero0']) ? htmlspecialchars($_SESSION['datos_ganadero']['potrero0']) : $row_ppg0['potrero'] ?>"></td>
    <td class="celdaCelesteClaro" align="left">Potreros con Alambrada (uni)</td>
    <td class="celdaCelesteClaro"><input name="potrero1" type="text" class="boxBusqueda4" id="potrero1" onChange="SumaVerticalG('potrero')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['potrero1']) ? htmlspecialchars($_SESSION['datos_ganadero']['potrero1']) : $row_ppg1['potrero'] ?>" ></td>
    <td class="celdaCelesteClaro"><input name="potrero2" type="text" class="boxBusqueda4" id="potrero2" onChange="SumaVerticalG('potrero')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['potrero2']) ? htmlspecialchars($_SESSION['datos_ganadero']['potrero2']) : $row_ppg2['potrero'] ?>" ></td>
    <td class="celdaCelesteClaro"><input name="potrero3" type="text" class="boxBusqueda4" id="potrero3" onChange="SumaVerticalG('potrero')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['potrero3']) ? htmlspecialchars($_SESSION['datos_ganadero']['potrero3']) : $row_ppg3['potrero'] ?>" ></td>
    <td class="celdaCelesteClaro"><input name="potrero4" type="text" class="boxBusqueda4" id="potrero4" onChange="SumaVerticalG('potrero')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['potrero4']) ? htmlspecialchars($_SESSION['datos_ganadero']['potrero4']) : $row_ppg4['potrero'] ?>" ></td>
    <td class="celdaCelesteClaro"><input name="potrero5" type="text" class="boxBusqueda4" id="potrero5" onChange="SumaVerticalG('potrero')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['potrero5']) ? htmlspecialchars($_SESSION['datos_ganadero']['potrero5']) : $row_ppg5['potrero'] ?>" ></td>
    <td class="celdaCelesteClaro"><input name="potrerot" type="text" class="boxBusqueda4" id="potrerot" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['potrerot']) ? htmlspecialchars($_SESSION['datos_ganadero']['potrerot']) :  $row_ppg1['potrero'] +$row_ppg2['potrero']+$row_ppg3['potrero']+$row_ppg4['potrero']+$row_ppg5['potrero'] ?>" readonly></td>
  </tr>
  <tr align="left">
    <td class="celdaCelesteClaro" align="left">Aguada, Pozas, Atajados (uni)</td>
    <td class="celdaCelesteClaro"><input name="pozas0" type="text" class="boxBusqueda4" id="pozas0" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['pozas0']) ? htmlspecialchars($_SESSION['datos_ganadero']['pozas0']) : $row_ppg0['pozas'] ?>" ></td>
    <td class="celdaCelesteClaro" align="left">Aguada, Pozas, Atajados (uni)</td>
    <td class="celdaCelesteClaro"><input name="pozas1" type="text" class="boxBusqueda4" id="pozas1" onChange="SumaVerticalG('pozas')"  onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo isset($_SESSION['datos_ganadero']['pozas1']) ? htmlspecialchars($_SESSION['datos_ganadero']['pozas1']) : $row_ppg1['pozas'] ?>"></td>
    <td class="celdaCelesteClaro"><input name="pozas2" type="text" class="boxBusqueda4" id="pozas2" onChange="SumaVerticalG('pozas')"  onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['pozas2']) ? htmlspecialchars($_SESSION['datos_ganadero']['pozas2']) : $row_ppg2['pozas'] ?>" ></td>
    <td class="celdaCelesteClaro"><input name="pozas3" type="text" class="boxBusqueda4" id="pozas3" onChange="SumaVerticalG('pozas')"  onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['pozas3']) ? htmlspecialchars($_SESSION['datos_ganadero']['pozas3']) : $row_ppg3['pozas'] ?>" ></td>
    <td class="celdaCelesteClaro"><input name="pozas4" type="text" class="boxBusqueda4" id="pozas4" onChange="SumaVerticalG('pozas')"  onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['pozas4']) ? htmlspecialchars($_SESSION['datos_ganadero']['pozas4']) : $row_ppg4['pozas'] ?>" ></td>
    <td class="celdaCelesteClaro"><input name="pozas5" type="text" class="boxBusqueda4" id="pozas5" onChange="SumaVerticalG('pozas')"  onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['pozas5']) ? htmlspecialchars($_SESSION['datos_ganadero']['pozas5']) : $row_ppg5['pozas'] ?>" ></td>
    <td class="celdaCelesteClaro"><input name="pozast" type="text" class="boxBusqueda4" id="pozast" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo isset($_SESSION['datos_ganadero']['pozast']) ? htmlspecialchars($_SESSION['datos_ganadero']['pozast']) : $row_ppg1['pozas']+$row_ppg2['pozas']+$row_ppg3['pozas']+$row_ppg4['pozas']+$row_ppg5['pozas'] ?>" readonly></td>
  </tr>
  <tr align="left">
    <td class="celdaCelesteClaro" align="left">Saleros(uni)</td>
    <td class="celdaCelesteClaro"><input name="saleros0" type="text" class="boxBusqueda4" id="saleros0"  onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['saleros0']) ? htmlspecialchars($_SESSION['datos_ganadero']['saleros0']) : $row_ppg0['saleros'] ?>" ></td>
    <td class="celdaCelesteClaro" align="left">Saleros(uni)</td>
    <td class="celdaCelesteClaro"><input name="saleros1" type="text" class="boxBusqueda4" id="saleros1" onChange="SumaVerticalG('saleros')"  onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['saleros1']) ? htmlspecialchars($_SESSION['datos_ganadero']['saleros1']) :  $row_ppg1['saleros'] ?>" ></td>
    <td class="celdaCelesteClaro"><input name="saleros2" type="text" class="boxBusqueda4" id="saleros2" onChange="SumaVerticalG('saleros')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['saleros2']) ? htmlspecialchars($_SESSION['datos_ganadero']['saleros2']) :  $row_ppg2['saleros'] ?>" ></td>
    <td class="celdaCelesteClaro"><input name="saleros3" type="text" class="boxBusqueda4" id="saleros3" onChange="SumaVerticalG('saleros')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['saleros3']) ? htmlspecialchars($_SESSION['datos_ganadero']['saleros3']) :  $row_ppg3['saleros'] ?>" ></td>
        <td class="celdaCelesteClaro"><input name="saleros4" type="text" class="boxBusqueda4" id="saleros4" onChange="SumaVerticalG('saleros')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['saleros4']) ? htmlspecialchars($_SESSION['datos_ganadero']['saleros4']) :  $row_ppg4['saleros'] ?>" ></td>
    <td class="celdaCelesteClaro"><input name="saleros5" type="text" class="boxBusqueda4" id="saleros5" onChange="SumaVerticalG('saleros')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['saleros5']) ? htmlspecialchars($_SESSION['datos_ganadero']['saleros5']) :  $row_ppg5['saleros'] ?>" ></td>
    <td class="celdaCelesteClaro"><input name="salerost" type="text" class="boxBusqueda4" id="salerost" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['salerost']) ? htmlspecialchars($_SESSION['datos_ganadero']['salerost']) :   $row_ppg1['saleros']+ $row_ppg2['saleros']+ $row_ppg3['saleros']+ $row_ppg4['saleros']+ $row_ppg5['saleros'] ?>"  readonly></td>
  </tr>
  <tr align="left">
    <td class="celdaCelesteClaro" align="left">Bebederos(uni)</td>
    <td class="celdaCelesteClaro"><input name="bebederos0" type="text" class="boxBusqueda4" id="bebederos0"  onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['bebederos0']) ? htmlspecialchars($_SESSION['datos_ganadero']['bebederos0']) :  $row_ppg0['bebederos'] ?>" ></td>
    <td class="celdaCelesteClaro" align="left">Bebederos(uni)</td>
    <td class="celdaCelesteClaro"><input name="bebederos1" type="text" class="boxBusqueda4" id="bebederos1" onChange="SumaVerticalG('bebederos')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['bebederos1']) ? htmlspecialchars($_SESSION['datos_ganadero']['bebederos1']) : $row_ppg1['bebederos'] ?>" ></td>
    <td class="celdaCelesteClaro"><input name="bebederos2" type="text" class="boxBusqueda4" id="bebederos2" onChange="SumaVerticalG('bebederos')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['bebederos2']) ? htmlspecialchars($_SESSION['datos_ganadero']['bebederos2']) : $row_ppg2['bebederos'] ?>" ></td>
    <td class="celdaCelesteClaro"><input name="bebederos3" type="text" class="boxBusqueda4" id="bebederos3" onChange="SumaVerticalG('bebederos')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['bebederos3']) ? htmlspecialchars($_SESSION['datos_ganadero']['bebederos3']) : $row_ppg3['bebederos'] ?>" ></td>
    <td class="celdaCelesteClaro"><input name="bebederos4" type="text" class="boxBusqueda4" id="bebederos4" onChange="SumaVerticalG('bebederos')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['bebederos4']) ? htmlspecialchars($_SESSION['datos_ganadero']['bebederos4']) : $row_ppg4['bebederos'] ?>" ></td>
    <td class="celdaCelesteClaro"><input name="bebederos5" type="text" class="boxBusqueda4" id="bebederos5" onChange="SumaVerticalG('bebederos')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['bebederos5']) ? htmlspecialchars($_SESSION['datos_ganadero']['bebederos5']) : $row_ppg5['bebederos'] ?>" ></td>
    <td class="celdaCelesteClaro"><input name="bebederost" type="text" class="boxBusqueda4" id="bebederost" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  readonly  value="<?php echo isset($_SESSION['datos_ganadero']['bebederost']) ? htmlspecialchars($_SESSION['datos_ganadero']['bebederost']) : $row_ppg1['bebederos']+$row_ppg2['bebederos']+$row_ppg3['bebederos']+$row_ppg4['bebederos']+$row_ppg5['bebederos'] ?>"></td>
  </tr>
  <tr align="left">
    <td class="celdaCelesteClaro" align="left">Brete (uni)</td>
    <td class="celdaCelesteClaro"><input name="brete0" type="text" class="boxBusqueda4" id="brete0" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['brete0']) ? htmlspecialchars($_SESSION['datos_ganadero']['brete0']) : $row_ppg0['brete'] ?>" ></td>
    <td class="celdaCelesteClaro" align="left">Brete (uni)</td>
    <td class="celdaCelesteClaro"><input name="brete1" type="text" class="boxBusqueda4" id="brete1" onChange="SumaVerticalG('brete')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['brete1']) ? htmlspecialchars($_SESSION['datos_ganadero']['brete1']) : $row_ppg1['brete'] ?>" ></td>
    <td class="celdaCelesteClaro"><input name="brete2" type="text" class="boxBusqueda4" id="brete2" onChange="SumaVerticalG('brete')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['brete2']) ? htmlspecialchars($_SESSION['datos_ganadero']['brete2']) : $row_ppg2['brete'] ?>" ></td>
    <td class="celdaCelesteClaro"><input name="brete3" type="text" class="boxBusqueda4" id="brete3" onChange="SumaVerticalG('brete')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['brete3']) ? htmlspecialchars($_SESSION['datos_ganadero']['brete3']) : $row_ppg3['brete'] ?>" ></td>
    <td class="celdaCelesteClaro"><input name="brete4" type="text" class="boxBusqueda4" id="brete4" onChange="SumaVerticalG('brete')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['brete4']) ? htmlspecialchars($_SESSION['datos_ganadero']['brete4']) : $row_ppg4['brete'] ?>" ></td>
    <td class="celdaCelesteClaro"><input name="brete5" type="text" class="boxBusqueda4" id="brete5" onChange="SumaVerticalG('brete')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo isset($_SESSION['datos_ganadero']['brete5']) ? htmlspecialchars($_SESSION['datos_ganadero']['brete5']) : $row_ppg5['brete'] ?>"></td>
    <td class="celdaCelesteClaro"><input name="bretet" type="text" class="boxBusqueda4" id="bretet" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  readonly  value="<?php echo isset($_SESSION['datos_ganadero']['bretet']) ? htmlspecialchars($_SESSION['datos_ganadero']['bretet']) : $row_ppg1['brete']+$row_ppg2['brete']+$row_ppg3['brete']+$row_ppg4['brete']+$row_ppg5['brete'] ?>"></td>
  </tr>
  <tr align="left">
    <td class="celdaCelesteClaro" align="left">Corral(uni)</td>
    <td class="celdaCelesteClaro"><input name="corral0" type="text" class="boxBusqueda4" id="corral0" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['corral0']) ? htmlspecialchars($_SESSION['datos_ganadero']['corral0']) : $row_ppg0['corral'] ?>" ></td>
    <td class="celdaCelesteClaro" align="left">Corral(uni)</td>
    <td class="celdaCelesteClaro"><input name="corral1" type="text" class="boxBusqueda4" id="corral1" onChange="SumaVerticalG('corral')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['corral1']) ? htmlspecialchars($_SESSION['datos_ganadero']['corral1']) : $row_ppg1['corral'] ?>" ></td>
    <td class="celdaCelesteClaro"><input name="corral2" type="text" class="boxBusqueda4" id="corral2" onChange="SumaVerticalG('corral')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['corral2']) ? htmlspecialchars($_SESSION['datos_ganadero']['corral2']) : $row_ppg2['corral'] ?>" ></td>
    <td class="celdaCelesteClaro"><input name="corral3" type="text" class="boxBusqueda4" id="corral3" onChange="SumaVerticalG('corral')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['corral3']) ? htmlspecialchars($_SESSION['datos_ganadero']['corral3']) : $row_ppg3['corral'] ?>" ></td>
    <td class="celdaCelesteClaro"><input name="corral4" type="text" class="boxBusqueda4" id="corral4" onChange="SumaVerticalG('corral')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['corral4']) ? htmlspecialchars($_SESSION['datos_ganadero']['corral4']) : $row_ppg4['corral'] ?>" ></td>
    <td class="celdaCelesteClaro"><input name="corral5" type="text" class="boxBusqueda4" id="corral5" onChange="SumaVerticalG('corral')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['corral5']) ? htmlspecialchars($_SESSION['datos_ganadero']['corral5']) : $row_ppg5['corral'] ?>" ></td>
    <td class="celdaCelesteClaro"><input name="corralt" type="text" class="boxBusqueda4" id="corralt" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly  value="<?php echo isset($_SESSION['datos_ganadero']['corralt']) ? htmlspecialchars($_SESSION['datos_ganadero']['corralt']) : $row_ppg1['corral']+$row_ppg2['corral']+$row_ppg3['corral']+$row_ppg4['corral']+$row_ppg5['corral'] ?>" ></td>
  </tr>
  <tr align="left">
    <td class="celdaCelesteClaro" align="left">Silo Para Forraje (uni)</td>
    <td class="celdaCelesteClaro"><input name="forraje0" type="text" class="boxBusqueda4" id="forraje0" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo isset($_SESSION['datos_ganadero']['forraje0']) ? htmlspecialchars($_SESSION['datos_ganadero']['forraje0']) : $row_ppg0['forraje'] ?>" ></td>
    <td class="celdaCelesteClaro" align="left">Silo Para Forraje (uni)</td>
    <td class="celdaCelesteClaro"><input name="forraje1" type="text" class="boxBusqueda4" id="forraje1" onChange="SumaVerticalG('forraje')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['forraje1']) ? htmlspecialchars($_SESSION['datos_ganadero']['forraje1']) : $row_ppg1['forraje'] ?>" ></td>
    <td class="celdaCelesteClaro"><input name="forraje2" type="text" class="boxBusqueda4" id="forraje2" onChange="SumaVerticalG('forraje')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['forraje2']) ? htmlspecialchars($_SESSION['datos_ganadero']['forraje2']) : $row_ppg2['forraje'] ?>" ></td>
   <td class="celdaCelesteClaro"><input name="forraje3" type="text" class="boxBusqueda4" id="forraje3" onChange="SumaVerticalG('forraje')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['forraje3']) ? htmlspecialchars($_SESSION['datos_ganadero']['forraje3']) : $row_ppg3['forraje'] ?>" ></td>
    <td class="celdaCelesteClaro"><input name="forraje4" type="text" class="boxBusqueda4" id="forraje4" onChange="SumaVerticalG('forraje')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['forraje4']) ? htmlspecialchars($_SESSION['datos_ganadero']['forraje4']) : $row_ppg4['forraje'] ?>" ></td>
    <td class="celdaCelesteClaro"><input name="forraje5" type="text" class="boxBusqueda4" id="forraje5" onChange="SumaVerticalG('forraje')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['forraje5']) ? htmlspecialchars($_SESSION['datos_ganadero']['forraje5']) : $row_ppg5['forraje'] ?>" ></td>
 <td class="celdaCelesteClaro"><input name="forrajet" type="text" class="boxBusqueda4" id="forrajet" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['forrajet']) ? htmlspecialchars($_SESSION['datos_ganadero']['forrajet']) : $row_ppg1['forraje']+$row_ppg2['forraje']+$row_ppg3['forraje']+$row_ppg4['forraje']+$row_ppg5['forraje'] ?>" readonly></td>
  </tr>
  <tr align="left">
    <td height="25" align="left" class="celdaCelesteClaro">Compra de Ganado en cabezas(opcional)</td>
    <td class="opcion">--</td>
    <td align="left" class="celdaCelesteClaro">Compra de Ganado en cabezas(opcional)</td>
    <td class="opcion"><input name="compraganado1" type="text" class="boxBusqueda4" id="compraganado1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['compraganado1']) ? htmlspecialchars($_SESSION['datos_ganadero']['compraganado1']) : $row_ppg1['compraganado'] ?>" ></td>
    <td class="opcion"><input name="compraganado2" type="text" class="boxBusqueda4" id="compraganado2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['compraganado2']) ? htmlspecialchars($_SESSION['datos_ganadero']['compraganado2']) : $row_ppg2['compraganado'] ?>" ></td>
    <td class="opcion"><input name="compraganado3" type="text" class="boxBusqueda4" id="compraganado3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['compraganado3']) ? htmlspecialchars($_SESSION['datos_ganadero']['compraganado3']) : $row_ppg3['compraganado'] ?>" ></td>
    <td class="opcion"><input name="compraganado4" type="text" class="boxBusqueda4" id="compraganado4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['compraganado4']) ? htmlspecialchars($_SESSION['datos_ganadero']['compraganado4']) : $row_ppg4['compraganado'] ?>" ></td>
    <td class="opcion"><input name="compraganado5" type="text" class="boxBusqueda4" id="compraganado5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['compraganado5']) ? htmlspecialchars($_SESSION['datos_ganadero']['compraganado5']) : $row_ppg5['compraganado'] ?>" ></td>
    <td class="opcion">--</td>
  </tr>
  <tr align="left">
    <td class="celdaCelesteClaro" align="left">Cabezas Terneros</td>
    <td class="opcion"><input name="cantternero0" type="text" class="boxBusqueda4" id="cantternero0" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantternero0']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantternero0']) : $row_ppg0['cantternero'] ?>" ></td>
    <td class="celdaCelesteClaro" align="left">Cabezas Terneros</td>
    <td class="opcion"><input name="cantternero1" type="text" class="boxBusqueda4" id="cantternero1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantternero1']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantternero1']) : $row_ppg1['cantternero']  ?>" ></td>
    <td class="opcion"><input name="cantternero2" type="text" class="boxBusqueda4" id="cantternero2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantternero2']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantternero2']) : $row_ppg2['cantternero']  ?>" ></td>
    <td class="opcion"><input name="cantternero3" type="text" class="boxBusqueda4" id="cantternero3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantternero3']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantternero3']) : $row_ppg3['cantternero']  ?>" ></td>
    <td class="opcion"><input name="cantternero4" type="text" class="boxBusqueda4" id="cantternero4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantternero4']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantternero4']) : $row_ppg4['cantternero']  ?>" ></td>
    <td class="opcion"><input name="cantternero5" type="text" class="boxBusqueda4" id="cantternero5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantternero5']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantternero5']) : $row_ppg5['cantternero']  ?>" ></td>
   <td class="opcion">--</td>
  </tr>
  <tr align="left">
    <td class="celdaCelesteClaro" align="left">Cabezas de Ganado Mayor</td>
    <td class="opcion"><input name="cantganado0" type="text" class="boxBusqueda4" id="cantganado0" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantganado0']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantganado0']) : $row_ppg0['cantganado']  ?>" ></td>
    <td class="celdaCelesteClaro" align="left">Cabezas de Ganado Mayor</td>
    <td class="opcion"><input name="cantganado1" type="text" class="boxBusqueda4" id="cantganado1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantganado1']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantganado1']) : $row_ppg1['cantganado'] ?>" ></td>
    <td class="opcion"><input name="cantganado2" type="text" class="boxBusqueda4" id="cantganado2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantganado2']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantganado2']) : $row_ppg2['cantganado'] ?>" ></td>
    <td class="opcion"><input name="cantganado3" type="text" class="boxBusqueda4" id="cantganado3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantganado3']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantganado3']) : $row_ppg3['cantganado'] ?>" ></td>
    <td class="opcion"><input name="cantganado4" type="text" class="boxBusqueda4" id="cantganado4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantganado4']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantganado4']) : $row_ppg4['cantganado'] ?>"></td>
    <td class="opcion"><input name="cantganado5" type="text" class="boxBusqueda4" id="cantganado5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_ganadero']['cantganado5']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantganado5']) : $row_ppg5['cantganado'] ?>"  ></td>
    <td class="opcion">--</td>
  </tr>
  <tr align="left">
    <td class="celdaCelesteClaro" align="left">Cant de Ganado en pie para la venta</td>
    <td class="opcion">--</td>
    <td class="celdaCelesteClaro" align="left">Cant de Ganado en pie para la venta</td>
    <td class="opcion"><input name="cantganadopie1" type="text" class="boxBusqueda4" id="cantganadopie1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantganadopie1']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantganadopie1']) : $row_ppg1['cantganadopie'] ?>" ></td>
    <td class="opcion"><input name="cantganadopie2" type="text" class="boxBusqueda4" id="cantganadopie2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantganadopie2']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantganadopie2']) : $row_ppg2['cantganadopie'] ?>" ></td>
    <td class="opcion"><input name="cantganadopie3" type="text" class="boxBusqueda4" id="cantganadopie3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantganadopie3']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantganadopie3']) : $row_ppg3['cantganadopie'] ?>" ></td>
    <td class="opcion"><input name="cantganadopie4" type="text" class="boxBusqueda4" id="cantganadopie4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantganadopie4']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantganadopie4']) : $row_ppg4['cantganadopie'] ?>" ></td>
    <td class="opcion"><input name="cantganadopie5" type="text" class="boxBusqueda4" id="cantganadopie5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantganadopie5']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantganadopie5']) : $row_ppg5['cantganadopie'] ?>" ></td>
    <td class="opcion">--</td>
  </tr>
  <tr align="left">
    <td  align="left" class="celdaCelesteClaro">Cantidad Ganado para Faeneo</td>
    <td class="opcion">--</td>
    <td  align="left" class="celdaCelesteClaro">Cantidad Ganado para Faeneo</td>
    <td class="opcion"><input name="cantganadofaineo1" type="text" class="boxBusqueda4" id="cantganadofaineo1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantganadofaineo1']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantganadofaineo1']) : $row_ppg1['cantganadofaineo'] ?>" ></td>
    <td class="opcion"><input name="cantganadofaineo2" type="text" class="boxBusqueda4" id="cantganadofaineo2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantganadofaineo2']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantganadofaineo2']) : $row_ppg2['cantganadofaineo'] ?>" ></td>
    <td class="opcion"><input name="cantganadofaineo3" type="text" class="boxBusqueda4" id="cantganadofaineo3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantganadofaineo3']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantganadofaineo3']) : $row_ppg3['cantganadofaineo'] ?>" ></td>
    <td class="opcion"><input name="cantganadofaineo4" type="text" class="boxBusqueda4" id="cantganadofaineo4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantganadofaineo4']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantganadofaineo4']) : $row_ppg4['cantganadofaineo'] ?>" ></td>
    <td class="opcion"><input name="cantganadofaineo5" type="text" class="boxBusqueda4" id="cantganadofaineo5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantganadofaineo5']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantganadofaineo5']) : $row_ppg5['cantganadofaineo'] ?>" ></td>

    <td class="opcion">--</td>
  </tr>
  <tr align="left">
    <td class="celdaCelesteClaro" align="left">Produccion de carne</td>
    <td class="opcion"><input name="cantprodcarne0" type="text" class="boxBusqueda4" id="cantprodcarne0" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantprodcarne0']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantprodcarne0']) : $row_ppg0['cantprodcarne'] ?>" ></td>
    <td class="celdaCelesteClaro" align="left">Produccion de carne</td>
    <td class="opcion"><input name="cantprodcarne1" type="text" class="boxBusqueda4" id="cantprodcarne1" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantprodcarne1']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantprodcarne1']) : $row_ppg1['cantprodcarne'] ?>" ></td>
    <td class="opcion"><input name="cantprodcarne2" type="text" class="boxBusqueda4" id="cantprodcarne2" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantprodcarne2']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantprodcarne2']) : $row_ppg2['cantprodcarne'] ?>" ></td>
    <td class="opcion"><input name="cantprodcarne3" type="text" class="boxBusqueda4" id="cantprodcarne3" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantprodcarne3']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantprodcarne3']) : $row_ppg3['cantprodcarne'] ?>" ></td>
    <td class="opcion"><input name="cantprodcarne4" type="text" class="boxBusqueda4" id="cantprodcarne4" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantprodcarne4']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantprodcarne4']) : $row_ppg4['cantprodcarne'] ?>" ></td>
    <td class="opcion"><input name="cantprodcarne5" type="text" class="boxBusqueda4" id="cantprodcarne5" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantprodcarne5']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantprodcarne5']) : $row_ppg5['cantprodcarne'] ?>" ></td>
    <td class="opcion">--</td>
  </tr>
  </table>
<table border="0" width="95%" class="taulaA" align="center">
  <tr>
    <td width="11%"><span class="taulaH">5. Observaciones:</span></td>
    <td width="89%" rowspan="2"><textarea name="RObservacion" id="RObservacion" cols="110" rows="4"><?php echo trim($row_obser['obsregistro']);?></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<p><br>
  <input type="hidden" name="MM_insert" value="form1" />
  <input type="hidden" name="periodo" value="<?php echo $periodo; ?>" />
  <input name="submit" type="submit" class='boton verde formaBoton' value="Guardar">
</p>
</form>
<?php include "../foot.php";?>
</div>
</BODY></HTML>
