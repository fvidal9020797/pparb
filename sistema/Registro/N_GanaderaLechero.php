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

include "page_ganaderalechero.php";



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

//-->
</script>
</head>
<?php
include_once('../scripts/body_handler.inc.php');
?>
<body>
<?php

$sql_suprest = "select suptpfp,suptum,supalitpfp,supalitum,  supdefilegal,supprodali   FROM suprestitucion where idregistro=".$_SESSION['idreg'];
	$suprest = pg_query($cn,$sql_suprest);
	$row_suprest = pg_fetch_array ($suprest);
	$num_suprest=pg_num_rows($suprest);

$sql_supali = "select * FROM superficiealimentos where idregistro=".$_SESSION['idreg'];
		$supali = pg_query($cn,$sql_supali);
		$row_supali = pg_fetch_array ($supali);

?>
	 <div id="oculto">
<div class="ocultable" id="texto1"><div id="volanta"></div></div></div>
	 <?php
// *********************************************************************************************************************************************
?>
<div align="center" class="texto">

 <b><big>III. PRODUCCION DE ALIMENTOS </big></b><br>

    <b class="texto">Predio: <?php echo $_SESSION['nombre_predio'];?> Código: <?php echo $_SESSION['cod_parcela'];?> </b>

 <form action="N_GanaderaLechero.php" method="POST" name="formulario" enctype="multipart/form-data" >
  <table width="95%" border="0" class='taulaA' align="center">
    <tr id="blau2">
      <td width="144%" height="14" colspan="3"><hr></td>
    </tr>
    <tr id="blau2" class="texto_normal">
      <td colspan="3" id='blau3'><span class="taulaH">1. Superficie para la Producci&oacute;n de Alimentos (Ha)</span></td>
    </tr>
    <tr id="blau2" class="texto_normal">
      <td colspan="3" id='blau6'><table width="100%" border="1" cellspacing="0" class='taulaA'>
        <tr>
          <td rowspan="2" class="cabecera2" id="blau15"><div align="center">Sup. Total Predio</div></td>
          <td  rowspan="2" class="cabecera2" ><div align="center">Sup. Deforestada (Ha. ): </div></td>
          <?php if($_SESSION['Causal']==2){ ?>
          <td  rowspan="2" class="cabecera2" ><div align="center">Sup. P.A.S. (ha.):</div></td>
          <?php } ?>
          <td  rowspan="2" class="cabecera2" ><div align="center">Sup. Prod. Alimentos: </div></td>
          <td colspan="2" class="cabecera2" id="blau15"><div align="center">Prod Alimento Sup. Deforestada (ha.): </div></td>
          <?php if($_SESSION['Causal']==2){ ?>
          <td colspan="2" class="cabecera2"><div align="center">Prod Alimento Sup. P.A.S. (ha.): </div></td>
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
        <tr id="blau7">
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
          <td height="22"  id="blau10"><div align="center">
              <input type="text" name="supalitpfp" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie337']->get_supalitpfp();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supalitpfp">
          </div></td>
          <td ><div align="center">
              <input type="text" name="supalitum" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie337']->get_supalitum();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supalitum">
          </div></td>
          <?php if($_SESSION['Causal']==2){ ?>
          <td ><div align="center">
              <input type="text" name="supalitpfppas" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie502']->get_supalitpfp();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supalitpfppas">
          </div></td>
          <td  id="blau10"><div align="center">
              <input type="text" name="supalitumpas" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie502']->get_supalitum();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supalitumpas">
          </div></td>
          <?php } ?>
        </tr>
      </table></td>
    </tr>
  </table>


    <table width="95%" border="0" class='taulaA' align="center">
    <tr class="texto_normal">
      <td colspan="2" id='blau5'><span class="taulaH">2. Uso Actual en &aacute;reas deforestadas ilegales (Ha)</span></td>
    </tr>
    <tr class="texto_normal">
      <td colspan="2" id='blau4'><table width="86%" border="0" class='taulaA'>
        <tr id="blau8" >
          <td width="11%" id="blau11">Agricola: </td>
          <td width="20%" ><input name="SupActAgri" type="text" class="boxBusqueda4m" id="SupActAgri" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_ganaderoL']['SupActAgri']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['SupActAgri']) : $row_supali['supagricola'] ?>" maxlength="15" readonly></td>
          <td width="11%" id="blau11">Barbecho: </td>
          <td width="11%"><input name="SupActbar" type="text" class="boxBusqueda4m" id="SupActbar" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_ganaderoL']['SupActbar']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['SupActbar']) : $row_supali['supbarbecho']?>"  maxlength="15" readonly></td>
          <td width="11%" id="blau11">Descanso</td>
          <td width="11%"><input name="SupActDes" type="text" class="boxBusqueda4m" id="SupActDes" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_ganaderoL']['SupActDes']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['SupActDes']) : $row_supali['supdescanso']?>" maxlength="15" readonly></td>
          <td width="11%" id="blau11">Ganadera</td>
          <td width="11%"><input name="SupActGan" type="text" class="boxBusqueda4" id="SupActGan" onChange="cabezasganado(<?php echo $_SESSION['Departamento']?>)"  onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_ganaderoL']['SupActGan']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['SupActGan']) : $row_supali['supganadera'] ?>" maxlength="15" ></td>
        </tr>
      </table></td>
      </tr>
    <tr class="texto_normal">
    <td width="55%" id='blau'><span class="taulaH">3. Datos Predio fuera de Area deforestada Ilegal (Sin sup. de mejoras)</span></td>
    <td width="45%" rowspan="4" id='blau6'><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="2" class="cabecera2">Sistemas de Produccion Ganadera</td>
      </tr>
      <?php

	$sql_SistProduccion = "Select * From codificadores Where idclasificador=27 Order by nombrecodificador";
    $SistProduccion = pg_query($cn,$sql_SistProduccion) ;
	$row_SistProduccion = pg_fetch_array ($SistProduccion);

do{
	  $valor=$row_SistProduccion['idcodificadores'];
	  if(!isset($_SESSION['datos_ganaderoL'])){
	    $sql_SistProd = "SELECT sistprodganadera.* FROM sistprodganadera
					   WHERE  sistprodganadera.idregistro=".$_SESSION['idreg']." and sistprodganadera.idsistproductivo=".$valor;
		$SistProd = pg_query($cn,$sql_SistProd);
		$row_SistProd = pg_fetch_array ($SistProd);
		$totalRows_SistProd = pg_num_rows($SistProd);
	  }
    ?>
      <tr class="negre">
        <td width="197"><?php echo $row_SistProduccion['nombrecodificador'];?></td>
        <td width="192"><input type="checkbox"  onChange="Habilitar(this,'<?php echo $row_SistProduccion['idcodificadores'];?>')" <?php if(isset($_SESSION['datos_ganaderoL']["chk".$row_SistProduccion['idcodificadores']])){echo 'checked';}elseif(isset($totalRows_SistProd) && $row_SistProd['idsistproductivo']==$row_SistProduccion['idcodificadores']){echo 'checked';}?>  name="<?php echo "chk".$row_SistProduccion['idcodificadores'];?>"/>
            <input type="text" name="<?php echo 'TxtSist'.$row_SistProduccion['idcodificadores'];?>" id="<?php echo 'TxtSist'.$row_SistProduccion['idcodificadores'];?>" class="boxBusqueda3" <?php if( !(isset($_SESSION['datos_ganaderoL']["chk".$row_SistProduccion['idcodificadores']])) ) { if(isset($totalRows_SistProd) && $row_SistProd['idsistproductivo']!=$row_SistProduccion['idcodificadores']){echo 'disabled';}}?>   onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="document.forms[0].submit()" value="<?php if(isset($_SESSION['datos_ganaderoL']['TxtSist'.$valor])) { echo $_SESSION['datos_ganaderoL']['TxtSist'.$valor];} elseif( isset($row_SistProd['idsistproductivo']) && $row_SistProd['idsistproductivo']==$row_SistProduccion['idcodificadores'] ){ echo $row_SistProd['cantidad'];} ?>" ></td>
      </tr>
      <?php  } while ($row_SistProduccion = pg_fetch_assoc($SistProduccion));?>
    </table></td>
    </tr>
  <tr class="texto_normal">
    <td id='blau'><table width="97%" border="0" class='taulaA'>
      <tr>
        <td width="17%" height="23" id="blau">Sup. Ganadera:</td>
        <td width="83%" ><input name="SupGanLegal" type="text" class="boxBusqueda4" id="SupGanLegal" onChange="cabezasganado(<?php echo $_SESSION['Departamento']?>)"  onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  maxlength="15" value="<?php echo isset($_SESSION['datos_ganaderoL']['SupGanLegal']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['SupGanLegal']) : $row_supali['supganlegal']  ?>"></td>
        </tr>
    </table></td>
    </tr>
  <tr class="texto_normal">
    <td id='blau9'><span class="taulaH">4.Cabezas de Ganado a considerar:</span></td>
    </tr>
  <tr >
    <td ><table width="97%" border="0" class="taulaA" >
      <tr>
        <td width="22%" class="celdaVerdeClaro" >Ganado Sup Deforestada: </td>
        <td width="27%" class="celdaVerdeClaro" ><input name="CantGanDef" type="text" class="boxBusqueda4m" id="CantGanDef" maxlength="15" value="<?php if(isset($_SESSION['Departamento']) && ($_SESSION['Departamento']==4172 ||$_SESSION['Departamento']==4173 || $_SESSION['Departamento']==4174) ){echo isset($_SESSION['datos_ganaderoL']['SupActGan']) ? htmlspecialchars(round($_SESSION['datos_ganaderoL']['SupActGan']/5)) : round($row_supali['supganadera']/5);} else{echo isset($_SESSION['datos_ganaderoL']['SupActGan']) ? htmlspecialchars(round($_SESSION['datos_ganaderoL']['SupActGan']/2.5)) : round($row_supali['supganadera']/2.5);} ?>"></td>
        <td width="24%" class="celdaVerdeClaro" >Ganado Sup Sin Deforestar: </td>
        <td width="27%" class="celdaVerdeClaro" ><input name="CantGanleg" type="text" class="boxBusqueda4m" id="CantGanleg" maxlength="15" value="<?php echo isset($_SESSION['datos_ganaderoL']['SupGanLegal']) ? htmlspecialchars(round($_SESSION['datos_ganaderoL']['SupGanLegal']/5)) : round($row_supali['supganlegal']/5)  ?>"></td>
        </tr>
      </table></td>
    </tr>
  </table>
<table width="95%" class="taulaA" border="1" cellspacing="0">
  <tr align="center">
    <td colspan="2" rowspan="2" width="18%"  class="cabecera2">Situacion Actual Ganadera</td>
    <td width="2%" rowspan="17" >&nbsp;</td>
    <td colspan="7" class="cabecera2">Plan de Producción Ganadera Lechera en 5 años Sistema Mejorado</td>
    </tr>
  <tr align="center"  >
    <td width="15%" class="cabecera2">&nbsp;</td>
    <?php if ($periodo==1) {  ?>
    <td width="8%" class="cabecera2">2014</td>
    <td width="8%" class="cabecera2">2015</td>
    <?php } ?>
    <td width="8%" class="cabecera2">2016</td>
    <td width="8%" class="cabecera2">2017</td>
    <td width="8%" class="cabecera2">2018</td>
<?php if ($periodo==2) {  ?>
    <td width="8%" class="cabecera2">2019</td>
    <td width="8%" class="cabecera2">2020</td>
<?php } ?>
    <td width="8%" class="cabecera2">Total</td>
  </tr>
  <tr >
    <td colspan="2" class="taulaH">En Area de Deforestada Ilegal y/o P.A.S.:</td>
    <td colspan="7" class="taulaH">En Area de Deforestada Ilegal y/o P.A.S.:</td>
    </tr>
  <tr >
    <td class="celdaCelesteClaro" >Superficie Pastos Naturales</td>
    <td align="center"><input name="suppasnatural0" type="text" class="boxBusqueda4" id="suppasnatural0" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo isset($_SESSION['datos_ganaderoL']['suppasnatural0']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['suppasnatural0']) : $row_ppg0['suppasnatural'] ?>"></td>
    <td class="celdaCelesteClaro" >Superficie Pastos Naturales</td>
    <td align="center">--</td>
    <td align="center">--</td>
    <td align="center">--</td>
    <td align="center">--</td>
    <td align="center">--</td>
    <td align="center">--</td>
  </tr>
  <tr align="left" >
    <td align="rigth" class="celdaCelesteClaro">Superficie Pastos Cultivados</td>
    <td class="TituloCajaNegocios"><label>
      <input name="suppassembrado0" type="text" class="boxBusqueda4" id="suppassembrado0" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo isset($_SESSION['datos_ganaderoL']['suppassembrado0']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['suppassembrado0']) : $row_ppg0['suppassembrado'] ?>">
    </label></td>
    <td align="rigth" class="celdaCelesteClaro">Superficie Pastos Cultivados</td>
    <td class="TituloCajaNegocios"><input name="suppassembrado1" type="text" class="boxBusqueda4" id="suppassembrado1" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  onChange="SumaVerticalG('suppassembrado')" value="<?php echo isset($_SESSION['datos_ganaderoL']['suppassembrado1']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['suppassembrado1']) : $row_ppg1['suppassembrado'] ?>"></td>
    <td class="TituloCajaNegocios"><input name="suppassembrado2" type="text" class="boxBusqueda4" id="suppassembrado2" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="SumaVerticalG('suppassembrado')" value="<?php echo isset($_SESSION['datos_ganaderoL']['suppassembrado2']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['suppassembrado2']) : $row_ppg2['suppassembrado'] ?>" ></td>
    <td class="TituloCajaNegocios"><input name="suppassembrado3" type="text" class="boxBusqueda4" id="suppassembrado3" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="SumaVerticalG('suppassembrado')" value="<?php echo isset($_SESSION['datos_ganaderoL']['suppassembrado3']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['suppassembrado3']) : $row_ppg3['suppassembrado'] ?>" ></td>
    <td class="TituloCajaNegocios"><input name="suppassembrado4" type="text" class="boxBusqueda4" id="suppassembrado4" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="SumaVerticalG('suppassembrado')" value="<?php echo isset($_SESSION['datos_ganaderoL']['suppassembrado4']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['suppassembrado4']) : $row_ppg4['suppassembrado'] ?>" ></td>
    <td class="TituloCajaNegocios"><input name="suppassembrado5" type="text" class="boxBusqueda4" id="suppassembrado5" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="SumaVerticalG('suppassembrado')"  value="<?php echo isset($_SESSION['datos_ganaderoL']['suppassembrado5']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['suppassembrado5']) : $row_ppg5['suppassembrado'] ?>"></td>
    <td class="TituloCajaNegocios"><input name="suppassembradot" type="text" class="boxBusqueda4" id="suppassembradot" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly   value="<?php echo isset($_SESSION['datos_ganaderoL']['suppassembradot']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['suppassembradot']) : $row_ppg1['suppassembrado']+$row_ppg2['suppassembrado']+$row_ppg3['suppassembrado']+$row_ppg4['suppassembrado']+$row_ppg5['suppassembrado'] ?>"></td>
    </tr>
  <tr align="left" >
    <td colspan="2" align="left" class="taulaH">En La Totalidad de Predio:</td>
    <td colspan="7" align="left" class="taulaH">En La Totalidad de Predio:</td>
    </tr>
  <tr align="left" >
    <td align="left" class="celdaCelesteClaro">Sistema Ordeño(Manual/Mecanico)</td>
    <td class="TituloCajaNegocios">

    <select name="<?php echo 'sistemaordeno0'; ?>" class="combos" id='<?php echo 'sistemaordeno0'; ?>'>
     <?php if( isset($_SESSION['datos_ganaderoL']['sistemaordeno0'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['sistemaordeno0']);}else{ $aux=$row_ppg0['sistemaordeno'] ;}?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Manual</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>Mecanico</option>
    </select></td>
    <td align="left" class="celdaCelesteClaro">Sistema Ordeño(Manual/Mecanico)</td>
    <td class="TituloCajaNegocios"><select name="sistemaordeno1" class="combos" id="sistemaordeno1">
      <?php if( isset($_SESSION['datos_ganaderoL']['sistemaordeno1'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['sistemaordeno1']);}else{ $aux=$row_ppg1['sistemaordeno'] ;}?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Manual</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>Mecanico</option>
    </select></td>
    <td class="TituloCajaNegocios"><select name="sistemaordeno2" class="combos" id="sistemaordeno2">
      <?php if( isset($_SESSION['datos_ganaderoL']['sistemaordeno2'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['sistemaordeno2']);}else{ $aux=$row_ppg2['sistemaordeno'] ;}?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Manual</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>Mecanico</option>
    </select></td>
    <td class="TituloCajaNegocios"><select name="sistemaordeno3" class="combos" id="sistemaordeno3">
      <?php if( isset($_SESSION['datos_ganaderoL']['sistemaordeno3'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['sistemaordeno3']);}else{ $aux=$row_ppg3['sistemaordeno'] ;}?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Manual</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>Mecanico</option>
    </select></td>
    <td class="TituloCajaNegocios"><select name="sistemaordeno4" class="combos" id="sistemaordeno4">
      <?php if( isset($_SESSION['datos_ganaderoL']['sistemaordeno4'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['sistemaordeno4']);}else{ $aux=$row_ppg4['sistemaordeno'] ;}?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Manual</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>Mecanico</option>
    </select></td>
    <td class="TituloCajaNegocios"><select name="sistemaordeno5" class="combos" id="sistemaordeno5">
      <?php if( isset($_SESSION['datos_ganaderoL']['sistemaordeno5'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['sistemaordeno5']);}else{ $aux=$row_ppg5['sistemaordeno'] ;}?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Manual</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>Mecanico</option>
    </select></td>
    <td class="TituloCajaNegocios">&nbsp;</td>
  </tr>
  <tr align="left" >
    <td align="left" class="celdaCelesteClaro">Galpones (uni)</td>
    <td class="TituloCajaNegocios"><select name="<?php echo 'galpon0'; ?>" class="combos" id='<?php echo 'galpon0'; ?>'>
      <?php if( isset($_SESSION['datos_ganaderoL']['galpon0'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['galpon0']);}else{ $aux=$row_ppg0['galpon'] ;}?>
      <option value=0  <?php if( $aux==0){echo 'selected' ;}?> >NO</option>
      <option value=1 <?php if( $aux==1){echo 'selected' ;}?>>SI</option>
    </select>    </td>
    <td align="left" class="celdaCelesteClaro">Galpones (uni)</td>
    <td class="TituloCajaNegocios"><input name="galpon1" type="text" class="boxBusqueda4" id="galpon1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="SumaVerticalG('galpon')"  value="<?php echo isset($_SESSION['datos_ganaderoL']['galpon1']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['galpon1']) : $row_ppg1['galpon'] ?>"></td>
    <td class="TituloCajaNegocios"><input name="galpon2" type="text" class="boxBusqueda4" id="galpon2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="SumaVerticalG('galpon')" value="<?php echo isset($_SESSION['datos_ganaderoL']['galpon2']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['galpon2']) : $row_ppg2['galpon'] ?>" ></td>
    <td class="TituloCajaNegocios"><input name="galpon3" type="text" class="boxBusqueda4" id="galpon3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="SumaVerticalG('galpon')" value="<?php echo isset($_SESSION['datos_ganaderoL']['galpon3']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['galpon3']) : $row_ppg3['galpon'] ?>" ></td>
    <td class="TituloCajaNegocios"><input name="galpon4" type="text" class="boxBusqueda4" id="galpon4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="SumaVerticalG('galpon')" value="<?php echo isset($_SESSION['datos_ganaderoL']['galpon4']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['galpon4']) : $row_ppg4['galpon'] ?>" ></td>
    <td class="TituloCajaNegocios"><input name="galpon5" type="text" class="boxBusqueda4" id="galpon5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="SumaVerticalG('galpon')" value="<?php echo isset($_SESSION['datos_ganaderoL']['galpon5']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['galpon5']) : $row_ppg5['galpon'] ?>" ></td>
    <td class="TituloCajaNegocios"><input name="galpont" type="text" class="boxBusqueda4" id="galpont" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo isset($_SESSION['datos_ganaderoL']['galpont']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['galpont']) : $row_ppg1['galpon']+$row_ppg2['galpon']+$row_ppg3['galpon']+$row_ppg4['galpon']+$row_ppg5['galpon'] ?>" readonly></td>
  </tr>
  <tr align="left" >
    <td align="left" class="celdaCelesteClaro">Tanques Enfriamiento(uni)</td>
    <td class="TituloCajaNegocios"><select name="<?php echo 'tanqueenfriamiento0'; ?>" class="combos" id='<?php echo 'tanqueenfriamiento0'; ?>'>
      <?php if( isset($_SESSION['datos_ganaderoL']['tanqueenfriamiento0'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['tanqueenfriamiento0']);}else{ $aux=$row_ppg0['tanqueenfriamiento'] ;}?>
      <option value=0  <?php if( $aux==0){echo 'selected' ;}?> >NO</option>
      <option value=1 <?php if( $aux==1){echo 'selected' ;}?>>SI</option>
    </select>    </td>
    <td align="left" class="celdaCelesteClaro">Tanques Enfriamiento(uni)</td>
    <td class="TituloCajaNegocios"><input name="tanqueenfriamiento1" type="text" class="boxBusqueda4" id="tanqueenfriamiento1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="SumaVerticalG('tanqueenfriamiento')" value="<?php echo isset($_SESSION['datos_ganaderoL']['tanqueenfriamiento1']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['tanqueenfriamiento1']) :  $row_ppg1['tanqueenfriamiento'] ?>" ></td>
    <td class="TituloCajaNegocios"><input name="tanqueenfriamiento2" type="text" class="boxBusqueda4" id="tanqueenfriamiento2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="SumaVerticalG('tanqueenfriamiento')" value="<?php echo isset($_SESSION['datos_ganaderoL']['tanqueenfriamiento2']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['tanqueenfriamiento2']) :  $row_ppg2['tanqueenfriamiento'] ?>" ></td>
    <td class="TituloCajaNegocios"><input name="tanqueenfriamiento3" type="text" class="boxBusqueda4" id="tanqueenfriamiento3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="SumaVerticalG('tanqueenfriamiento')" value="<?php echo isset($_SESSION['datos_ganaderoL']['tanqueenfriamiento3']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['tanqueenfriamiento3']) :  $row_ppg3['tanqueenfriamiento'] ?>" ></td>
    <td class="TituloCajaNegocios"><input name="tanqueenfriamiento4" type="text" class="boxBusqueda4" id="tanqueenfriamiento4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="SumaVerticalG('tanqueenfriamiento')" value="<?php echo isset($_SESSION['datos_ganaderoL']['tanqueenfriamiento4']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['tanqueenfriamiento4']) :  $row_ppg4['tanqueenfriamiento'] ?>" ></td>
    <td class="TituloCajaNegocios"><input name="tanqueenfriamiento5" type="text" class="boxBusqueda4" id="tanqueenfriamiento5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="SumaVerticalG('tanqueenfriamiento')" value="<?php echo isset($_SESSION['datos_ganaderoL']['tanqueenfriamiento5']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['tanqueenfriamiento5']) :  $row_ppg5['tanqueenfriamiento'] ?>" ></td>
    <td class="TituloCajaNegocios"><input name="tanqueenfriamientot" type="text" class="boxBusqueda4" id="tanqueenfriamientot" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['tanqueenfriamientot']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['tanqueenfriamientot']) :   $row_ppg1['tanqueenfriamiento']+ $row_ppg2['tanqueenfriamiento']+ $row_ppg3['tanqueenfriamiento']+ $row_ppg4['tanqueenfriamiento']+ $row_ppg5['tanqueenfriamiento'] ?>"  readonly></td>
  </tr>
  <tr align="left" >
    <td align="left" class="celdaCelesteClaro">Silos Para Forraje(uni)</td>
    <td class="TituloCajaNegocios"><select name="<?php echo 'siloforraje0'; ?>" class="combos" id='<?php echo 'siloforraje0'; ?>'>
      <?php if( isset($_SESSION['datos_ganaderoL']['siloforraje0'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['siloforraje0']);}else{ $aux=$row_ppg0['siloforraje'] ;}?>
      <option value=0  <?php if( $aux==0){echo 'selected' ;}?> >NO</option>
      <option value=1 <?php if( $aux==1){echo 'selected' ;}?>>SI</option>
    </select>   </td>
    <td align="left" class="celdaCelesteClaro">Silos Para Forraje(uni)</td>
    <td class="TituloCajaNegocios"><input name="siloforraje1" type="text" class="boxBusqueda4" id="siloforraje1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="SumaVerticalG('siloforraje')" value="<?php echo isset($_SESSION['datos_ganaderoL']['siloforraje1']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['siloforraje1']) : $row_ppg1['siloforraje'] ?>" ></td>
    <td class="TituloCajaNegocios"><input name="siloforraje2" type="text" class="boxBusqueda4" id="siloforraje2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="SumaVerticalG('siloforraje')" value="<?php echo isset($_SESSION['datos_ganaderoL']['siloforraje2']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['siloforraje2']) : $row_ppg2['siloforraje'] ?>" ></td>
    <td class="TituloCajaNegocios"><input name="siloforraje3" type="text" class="boxBusqueda4" id="siloforraje3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="SumaVerticalG('siloforraje')" value="<?php echo isset($_SESSION['datos_ganaderoL']['siloforraje3']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['siloforraje3']) : $row_ppg3['siloforraje'] ?>" ></td>
    <td class="TituloCajaNegocios"><input name="siloforraje4" type="text" class="boxBusqueda4" id="siloforraje4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="SumaVerticalG('siloforraje')" value="<?php echo isset($_SESSION['datos_ganaderoL']['siloforraje4']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['siloforraje4']) : $row_ppg4['siloforraje'] ?>" ></td>
    <td class="TituloCajaNegocios"><input name="siloforraje5" type="text" class="boxBusqueda4" id="siloforraje5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="SumaVerticalG('siloforraje')" value="<?php echo isset($_SESSION['datos_ganaderoL']['siloforraje5']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['siloforraje5']) : $row_ppg5['siloforraje'] ?>" ></td>
    <td class="TituloCajaNegocios"><input name="siloforrajet" type="text" class="boxBusqueda4" id="siloforrajet" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  readonly  value="<?php echo isset($_SESSION['datos_ganaderoL']['siloforrajet']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['siloforrajet']) : $row_ppg1['siloforraje']+$row_ppg2['siloforraje']+$row_ppg3['siloforraje']+$row_ppg4['siloforraje']+$row_ppg5['siloforraje'] ?>"></td>
  </tr>
  <tr align="left" >
    <td align="left" class="celdaCelesteClaro">Certificado Tuberculosis </td>
    <td><span class="TituloCajaNegocios">
      <select name="<?php echo 'certtuberculosis0'; ?>" class="combos" id='<?php echo 'certtuberculosis0'; ?>'>
        <?php if( isset($_SESSION['datos_ganaderoL']['certtuberculosis0'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['certtuberculosis0']);}else{ $aux=$row_ppg0['certtuberculosis'] ;}?>
        <option value=0  <?php if( $aux==0){echo 'selected' ;}?> >NO</option>
        <option value=1 <?php if( $aux==1){echo 'selected' ;}?>>SI</option>
      </select>
    </span></td>
    <td align="left" class="celdaCelesteClaro">Certificado Tuberculosis </td>
    <td><span class="TituloCajaNegocios">
      <select name="<?php echo 'certtuberculosis1'; ?>" class="combos" id='<?php echo 'certtuberculosis1'; ?>'>
        <?php if( isset($_SESSION['datos_ganaderoL']['certtuberculosis1'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['certtuberculosis1']);}else{ $aux=$row_ppg1['certtuberculosis'] ;}?>
        <option value=0  <?php if( $aux==0){echo 'selected' ;}?> >NO</option>
        <option value=1 <?php if( $aux==1){echo 'selected' ;}?>>SI</option>
      </select>
    </span></td>
    <td><span class="TituloCajaNegocios">
      <select name="<?php echo 'certtuberculosis2'; ?>" class="combos" id='<?php echo 'certtuberculosis2'; ?>'>
        <?php if( isset($_SESSION['datos_ganaderoL']['certtuberculosis2'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['certtuberculosis2']);}else{ $aux=$row_ppg2['certtuberculosis'] ;}?>
        <option value=0  <?php if( $aux==0){echo 'selected' ;}?> >NO</option>
        <option value=1 <?php if( $aux==1){echo 'selected' ;}?>>SI</option>
      </select>
    </span></td>
    <td><span class="TituloCajaNegocios">
      <select name="<?php echo 'certtuberculosis3'; ?>" class="combos" id='<?php echo 'certtuberculosis3'; ?>'>
        <?php if( isset($_SESSION['datos_ganaderoL']['certtuberculosis3'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['certtuberculosis3']);}else{ $aux=$row_ppg3['certtuberculosis'] ;}?>
        <option value=0  <?php if( $aux==0){echo 'selected' ;}?> >NO</option>
        <option value=1 <?php if( $aux==1){echo 'selected' ;}?>>SI</option>
      </select>
    </span></td>
    <td><span class="TituloCajaNegocios">
      <select name="<?php echo 'certtuberculosis4'; ?>" class="combos" id='<?php echo 'certtuberculosis4'; ?>'>
        <?php if( isset($_SESSION['datos_ganaderoL']['certtuberculosis4'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['certtuberculosis4']);}else{ $aux=$row_ppg4['certtuberculosis'] ;}?>
        <option value=0  <?php if( $aux==0){echo 'selected' ;}?> >NO</option>
        <option value=1 <?php if( $aux==1){echo 'selected' ;}?>>SI</option>
      </select>
    </span></td>
    <td><span class="TituloCajaNegocios">
      <select name="<?php echo 'certtuberculosis5'; ?>" class="combos" id='<?php echo 'certtuberculosis5'; ?>'>
        <?php if( isset($_SESSION['datos_ganaderoL']['certtuberculosis5'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['certtuberculosis5']);}else{ $aux=$row_ppg5['certtuberculosis'] ;}?>
        <option value=0  <?php if( $aux==0){echo 'selected' ;}?> >NO</option>
        <option value=1 <?php if( $aux==1){echo 'selected' ;}?>>SI</option>
      </select>
    </span></td>
    <td align="center">--</td>
  </tr>
  <tr align="left" >
    <td align="left" class="celdaCelesteClaro">Certificado Brucelosis</td>
    <td><span class="TituloCajaNegocios">
      <select name="<?php echo 'certbrucelosis0'; ?>" class="combos" id='<?php echo 'certbrucelosis0'; ?>'>
        <?php if( isset($_SESSION['datos_ganaderoL']['certbrucelosis0'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['certbrucelosis0']);}else{ $aux=$row_ppg0['certbrucelosis'] ;}?>
        <option value=0  <?php if( $aux==0){echo 'selected' ;}?> >NO</option>
        <option value=1 <?php if( $aux==1){echo 'selected' ;}?>>SI</option>
      </select>
      </span>      </td>
    <td align="left" class="celdaCelesteClaro">Certificado Brucelosis</td>
    <td><span class="TituloCajaNegocios">
      <select name="<?php echo 'certbrucelosis1'; ?>" class="combos" id='<?php echo 'certbrucelosis1'; ?>'>
        <?php if( isset($_SESSION['datos_ganaderoL']['certbrucelosis1'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['certbrucelosis1']);}else{ $aux=$row_ppg1['certbrucelosis'] ;}?>
        <option value=0  <?php if( $aux==0){echo 'selected' ;}?> >NO</option>
        <option value=1 <?php if( $aux==1){echo 'selected' ;}?>>SI</option>
      </select>
    </span></td>
    <td><span class="TituloCajaNegocios">
      <select name="<?php echo 'certbrucelosis2'; ?>" class="combos" id='<?php echo 'certbrucelosis2'; ?>'>
        <?php if( isset($_SESSION['datos_ganaderoL']['certbrucelosis2'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['certbrucelosis2']);}else{ $aux=$row_ppg2['certbrucelosis'] ;}?>
        <option value=0  <?php if( $aux==0){echo 'selected' ;}?> >NO</option>
        <option value=1 <?php if( $aux==1){echo 'selected' ;}?>>SI</option>
      </select>
    </span></td>
    <td><span class="TituloCajaNegocios">
      <select name="<?php echo 'certbrucelosis3'; ?>" class="combos" id='<?php echo 'certbrucelosis3'; ?>'>
        <?php if( isset($_SESSION['datos_ganaderoL']['certbrucelosis3'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['certbrucelosis3']);}else{ $aux=$row_ppg3['certbrucelosis'] ;}?>
        <option value=0  <?php if( $aux==0){echo 'selected' ;}?> >NO</option>
        <option value=1 <?php if( $aux==1){echo 'selected' ;}?>>SI</option>
      </select>
    </span></td>
    <td><span class="TituloCajaNegocios">
      <select name="<?php echo 'certbrucelosis4'; ?>" class="combos" id='<?php echo 'certbrucelosis4'; ?>'>
        <?php if( isset($_SESSION['datos_ganaderoL']['certbrucelosis4'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['certbrucelosis4']);}else{ $aux=$row_ppg4['certbrucelosis'] ;}?>
        <option value=0  <?php if( $aux==0){echo 'selected' ;}?> >NO</option>
        <option value=1 <?php if( $aux==1){echo 'selected' ;}?>>SI</option>
      </select>
    </span></td>
    <td><span class="TituloCajaNegocios">
      <select name="<?php echo 'certbrucelosis5'; ?>" class="combos" id='<?php echo 'certbrucelosis5'; ?>'>
        <?php if( isset($_SESSION['datos_ganaderoL']['certbrucelosis5'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['certbrucelosis5']);}else{ $aux=$row_ppg5['certbrucelosis'] ;}?>
        <option value=0  <?php if( $aux==0){echo 'selected' ;}?> >NO</option>
        <option value=1 <?php if( $aux==1){echo 'selected' ;}?>>SI</option>
      </select>
    </span></td>
    <td align="center">--</td>
  </tr>
  <tr align="left" >
    <td class="celdaCelesteClaro" align="left">Cabezas Ganado Produccion (Uni)</td>
    <td><input name="cabganprod0" type="text" class="boxBusqueda4" id="cabganprod0" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo isset($_SESSION['datos_ganaderoL']['cabganprod0']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['cabganprod0']) : $row_ppg0['cabganprod'] ?>" ></td>
    <td class="celdaCelesteClaro" align="left">Cabezas Ganado Produccion (Uni)</td>
    <td><input name="cabganprod1" type="text" class="boxBusqueda4" id="cabganprod1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['cabganprod1']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['cabganprod1']) : $row_ppg1['cabganprod'] ?>" ></td>
    <td><input name="cabganprod2" type="text" class="boxBusqueda4" id="cabganprod2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['cabganprod2']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['cabganprod2']) : $row_ppg2['cabganprod'] ?>" ></td>
    <td><input name="cabganprod3" type="text" class="boxBusqueda4" id="cabganprod3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['cabganprod3']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['cabganprod3']) : $row_ppg3['cabganprod'] ?>" ></td>
    <td><input name="cabganprod4" type="text" class="boxBusqueda4" id="cabganprod4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['cabganprod4']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['cabganprod4']) : $row_ppg4['cabganprod'] ?>" ></td>
    <td><input name="cabganprod5" type="text" class="boxBusqueda4" id="cabganprod5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['cabganprod5']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['cabganprod5']) : $row_ppg5['cabganprod'] ?>" ></td>
    <td align="center">--</td>
  </tr>
  <tr align="left" >
    <td class="celdaCelesteClaro" align="left">Cabezas Ganando Descarte (10%)</td>
    <td><input name="cabgandescar0" type="text" class="boxBusqueda4" id="cabgandescar0" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['cabgandescar0']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['cabgandescar0']) : $row_ppg0['cabgandescar'] ?>" ></td>
    <td class="celdaCelesteClaro" align="left">Cabezas Ganando Descarte (10%)</td>
    <td><input name="cabgandescar1" type="text" class="boxBusqueda4" id="cabgandescar1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['cabgandescar1']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['cabgandescar1']) : $row_ppg1['cabgandescar']  ?>" ></td>
    <td><input name="cabgandescar2" type="text" class="boxBusqueda4" id="cabgandescar2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['cabgandescar2']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['cabgandescar2']) : $row_ppg2['cabgandescar']  ?>" ></td>
    <td><input name="cabgandescar3" type="text" class="boxBusqueda4" id="cabgandescar3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['cabgandescar3']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['cabgandescar3']) : $row_ppg3['cabgandescar']  ?>" ></td>
    <td><input name="cabgandescar4" type="text" class="boxBusqueda4" id="cabgandescar4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['cabgandescar4']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['cabgandescar4']) : $row_ppg4['cabgandescar']  ?>" ></td>
    <td><input name="cabgandescar5" type="text" class="boxBusqueda4" id="cabgandescar5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['cabgandescar5']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['cabgandescar5']) : $row_ppg5['cabgandescar']  ?>" ></td>
    <td align="center">--</td>
  </tr>
  <tr align="left" >
    <td class="celdaCelesteClaro" align="left">Produccion Promedio de  Carne(Kg/Hato)</td>
    <td><input name="prodcarne0" type="text" class="boxBusqueda4" id="prodcarne0" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['prodcarne0']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['prodcarne0']) : $row_ppg0['prodcarne']  ?>" ></td>
    <td class="celdaCelesteClaro" align="left">Produccion Promedio de  Carne(Kg/Hato)</td>
    <td><input name="prodcarne1" type="text" class="boxBusqueda4" id="prodcarne1" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['prodcarne1']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['prodcarne1']) : $row_ppg1['prodcarne'] ?>" ></td>
    <td><input name="prodcarne2" type="text" class="boxBusqueda4" id="prodcarne2" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['prodcarne2']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['prodcarne2']) : $row_ppg2['prodcarne'] ?>" ></td>
    <td><input name="prodcarne3" type="text" class="boxBusqueda4" id="prodcarne3" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['prodcarne3']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['prodcarne3']) : $row_ppg3['prodcarne'] ?>" ></td>
    <td><input name="prodcarne4" type="text" class="boxBusqueda4" id="prodcarne4" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['prodcarne4']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['prodcarne4']) : $row_ppg4['prodcarne'] ?>"></td>
    <td><input name="prodcarne5" type="text" class="boxBusqueda4" id="prodcarne5" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_ganaderoL']['prodcarne5']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['prodcarne5']) : $row_ppg5['prodcarne'] ?>"  ></td>
    <td align="center">--</td>
  </tr>
  <tr align="left" >
    <td class="celdaCelesteClaro" align="left">Produccion Promedio de Leche(Lt/Hato)</td>
    <td><input name="prodleche0" type="text" class="boxBusqueda4" id="prodleche0" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['prodleche0']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['prodleche0']) : $row_ppg0['prodleche'] ?>" ></td>
    <td class="celdaCelesteClaro" align="left">Produccion Promedio de Leche(Lt/Hato)</td>
    <td><input name="prodleche1" type="text" class="boxBusqueda4" id="prodleche1" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['prodleche1']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['prodleche1']) : $row_ppg1['prodleche'] ?>" ></td>
    <td><input name="prodleche2" type="text" class="boxBusqueda4" id="prodleche2" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['prodleche2']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['prodleche2']) : $row_ppg2['prodleche'] ?>" ></td>
    <td><input name="prodleche3" type="text" class="boxBusqueda4" id="prodleche3" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['prodleche3']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['prodleche3']) : $row_ppg3['prodleche'] ?>" ></td>
    <td><input name="prodleche4" type="text" class="boxBusqueda4" id="prodleche4" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['prodleche4']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['prodleche4']) : $row_ppg4['prodleche'] ?>" ></td>
    <td><input name="prodleche5" type="text" class="boxBusqueda4" id="prodleche5" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['prodleche5']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['prodleche5']) : $row_ppg5['prodleche'] ?>" ></td>
    <td align="center">--</td>
  </tr>
  <tr align="left" >
    <td class="celdaCelesteClaro" align="left">Produccion Total de Leche(Lt/año)</td>
    <td><input name="prodtotleche0" type="text" class="boxBusqueda4" id="prodtotleche0" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['prodtotleche0']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['prodtotleche0']) : $row_ppg0['prodtotleche'] ?>" ></td>
    <td class="celdaCelesteClaro" align="left">Produccion Total de Leche(Lt/año)</td>
    <td><input name="prodtotleche1" type="text" class="boxBusqueda4" id="prodtotleche1" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['prodtotleche1']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['prodtotleche1']) : $row_ppg1['prodtotleche'] ?>" ></td>
    <td><input name="prodtotleche2" type="text" class="boxBusqueda4" id="prodtotleche2" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['prodtotleche2']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['prodtotleche2']) : $row_ppg2['prodtotleche'] ?>" ></td>
    <td><input name="prodtotleche3" type="text" class="boxBusqueda4" id="prodtotleche3" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['prodtotleche3']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['prodtotleche3']) : $row_ppg3['prodtotleche'] ?>" ></td>
    <td><input name="prodtotleche4" type="text" class="boxBusqueda4" id="prodtotleche4" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['prodtotleche4']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['prodtotleche4']) : $row_ppg4['prodtotleche'] ?>" ></td>
    <td><input name="prodtotleche5" type="text" class="boxBusqueda4" id="prodtotleche5" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['prodtotleche5']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['prodtotleche5']) : $row_ppg5['prodtotleche'] ?>" ></td>
    <td align="center">--</td>
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
<?php pg_close($cn); ?>
</div>
</BODY></HTML>
