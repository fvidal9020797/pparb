<?php 
include "../Clases/SuperficieRegistro.php";
include "../Clases/Porcina.php";
session_start();

include "../cabecera.php";
include "page_porcina.php";

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
function CalcularCate()  {  //TPFP =1 superficie es tpfp 
		try { 		      
			 valor=Math.round((document.getElementById('TxtSist238').value)/9);
			 
		      
		      if(valor>=500){
			     document.getElementById('TxtSist234').value=valor;
				 document.getElementById('TxtSist235').value='';
				 document.getElementById('TxtSist236').value='';
				 document.getElementById('TxtSist234').disabled=false;
				 document.getElementById('TxtSist235').disabled=true;
				 document.getElementById('TxtSist236').disabled=true;
				 document.getElementById('chk234').checked=1;
				 document.getElementById('chk235').checked=0;
				 document.getElementById('chk236').checked=0;
				 //alert(valor);
			  } else{
			  		if(valor>=100 ){
					     document.getElementById('TxtSist234').value='';
						 document.getElementById('TxtSist235').value=valor;
						 document.getElementById('TxtSist236').value='';
						 document.getElementById('TxtSist234').disabled=true;
						 document.getElementById('TxtSist235').disabled=false;
						 document.getElementById('TxtSist236').disabled=true;
				         document.getElementById('chk234').checked=0;
						 document.getElementById('chk235').checked=1;
						 document.getElementById('chk236').checked=0;
					  }else{
					      if(valor>=0){
							 document.getElementById('TxtSist234').value='';
						 	 document.getElementById('TxtSist235').value='';
						 	 document.getElementById('TxtSist236').value=valor;
							 document.getElementById('TxtSist234').disabled=true;
							 document.getElementById('TxtSist235').disabled=true;
							 document.getElementById('TxtSist236').disabled=false;
							 
							 document.getElementById('chk234').checked=0;
							 document.getElementById('chk235').checked=0;
							 document.getElementById('chk236').checked=1;
						 }
					  }
			  }
		     
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

	$sql_supali = "select *  FROM superficiealimentos where idregistro=".$_SESSION['idreg'];
	$supali = pg_query($cn,$sql_supali);
	$row_supali = pg_fetch_array ($supali);
	//print_r($row_supali);
?>
	 <div id="oculto">
<div class="ocultable" id="texto1"><div id="volanta"></div></div></div>
	
<div align="center" class="texto">
<form action="N_Porcina.php" method="POST" name="formulario" autocomplete="off"  enctype="multipart/form-data" >
  <b><big>III. PRODUCCION DE ALIMENTOS </big></b> -<b><big>  PORCINA</big></b><br>

    <b class="texto">Predio: <?php echo $_SESSION['nombre_predio'];?> Código: <?php echo $_SESSION['cod_parcela'];?> </b>
  
  <table width="95%" border="0" class='taulaA' align="center">
 
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
            <input name="Superficie" type="text" class="boxVerde" id="Superficie"  onFocus="siguienteCampo ='FechaFin'" maxlength="10" value="<?php echo isset($_SESSION['datos_porcina']['Superficie']) ? htmlspecialchars($_SESSION['datos_porcina']['Superficie']) : $row_predio['superficie'];?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly >
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
        <td colspan="2" id='blau4'><span class="taulaH">2. Uso Actual en &aacute;reas deforestadas ilegales  y/o P.A.S.(Ha)</span></td>
        <td id='blau8' >&nbsp;</td>
      </tr>
      <tr class="texto_normal">
        <td colspan="3" id='blau13'><table width="90%" border="0" class='taulaA'>
          <tr id="blau3" >
            <td width="11%" id="blau11">Agricola: </td>
            <td width="20%" ><input name="SupActAgri" type="text" class="boxBusqueda4" id="SupActAgri" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_porcina']['SupActAgri']) ? htmlspecialchars($_SESSION['datos_porcina']['SupActAgri']) : $row_supali['supagricola'] ?>" maxlength="15" ></td>
            <td width="11%" id="blau11">Barbecho: </td>
            <td width="11%"><input name="SupActbar" type="text" class="boxBusqueda4m" id="SupActbar" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_porcina']['SupActbar']) ? htmlspecialchars($_SESSION['datos_porcina']['SupActbar']) : $row_supali['supbarbecho']?>"  maxlength="15" readonly></td>
            <td width="11%" id="blau11">Descanso</td>
            <td width="11%"><input name="SupActDes" type="text" class="boxBusqueda4m" id="SupActDes" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_porcina']['SupActDes']) ? htmlspecialchars($_SESSION['datos_porcina']['SupActDes']) : $row_supali['supdescanso']?>" maxlength="15" readonly></td>
            <td width="11%" id="blau11">Ganadera</td>
            <td width="11%"><input name="SupActGan" type="text" class="boxBusqueda4m" id="SupActGan" onChange="cabezasganado(<?php echo $_SESSION['Departamento']?>)"  onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_porcina']['SupActGan']) ? htmlspecialchars($_SESSION['datos_porcina']['SupActGan']) : $row_supali['supganadera'] ?> " readonly maxlength="15" ></td>
          </tr>
        </table></td>
      </tr>
      
      <tr class="texto_normal">
    <td width="25%" id='blau'><span class="taulaH">3.Sistemas de Producción Porcina En el Predio </span></td>
    <td width="24%" id='blau'><span class="taulaH">4.Categorizacion Unidad Animal </span></td>
    <td width="26%" id='blau8' >&nbsp;</td>
      </tr>
  
  <tr >
    <td ><table width="98%" border="0" cellspacing="0" cellpadding="0">
      
      <?php 
	$sql_SistProduccion = "Select * From codificadores Where idclasificador=30 Order by idcodificadores";
    $SistProduccion = pg_query($cn,$sql_SistProduccion) ;
	$row_SistProduccion = pg_fetch_array ($SistProduccion);

do{
	  $valor=$row_SistProduccion['idcodificadores'];
	  if(!isset($_SESSION['datos_porcina'])){
	    $sql_SistProd = "SELECT sistemaproduccion.* FROM sistemaproduccion 
					   WHERE  sistemaproduccion.idregistro=".$_SESSION['idreg']." and sistemaproduccion.idsistemaproduccion=".$valor;
		$SistProd = pg_query($cn,$sql_SistProd);
		$row_SistProd = pg_fetch_array ($SistProd);
		$totalRows_SistProd = pg_num_rows($SistProd);
	  }
    ?>
      <tr class="negre">
        <td width="197"><?php echo $row_SistProduccion['nombrecodificador'];?></td>
        <td width="98"><input type="checkbox"  onChange="Habilitar(this,'<?php echo $row_SistProduccion['idcodificadores'];?>')" <?php if(isset($_SESSION['datos_porcina']["chk".$row_SistProduccion['idcodificadores']])){echo 'checked';}elseif(isset($totalRows_SistProd) && $row_SistProd['idsistemaproduccion']==$row_SistProduccion['idcodificadores']){echo 'checked';}?>  name="<?php echo "chk".$row_SistProduccion['idcodificadores'];?>"/>
            <input type="text" name="<?php echo 'TxtSist'.$row_SistProduccion['idcodificadores'];?>" class="boxBusqueda4" <?php if( !(isset($_SESSION['datos_porcina']["chk".$row_SistProduccion['idcodificadores']])) ) { if(isset($totalRows_SistProd) && $row_SistProd['idsistemaproduccion']!=$row_SistProduccion['idcodificadores']){echo 'disabled';}}?>  id="<?php echo 'TxtSist'.$row_SistProduccion['idcodificadores'];?>" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="document.forms[0].submit()" value="<?php if(isset($_SESSION['datos_porcina']['TxtSist'.$valor])) { echo $_SESSION['datos_porcina']['TxtSist'.$valor];} elseif( isset($row_SistProd['idsistemaproduccion']) && $row_SistProd['idsistemaproduccion']==$row_SistProduccion['idcodificadores'] ){ echo $row_SistProd['cantidadproduccion'];} ?>" ></td>
        </tr>
      <?php  } while ($row_SistProduccion = pg_fetch_assoc($SistProduccion));?>
    </table>      </td>
    <td ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <?php 
	$sql_SistProduccion = "Select * From codificadores Where idclasificador=31 and idcodificadores!=238 Order by idcodificadores";
    $SistProduccion = pg_query($cn,$sql_SistProduccion) ;
	$row_SistProduccion = pg_fetch_array ($SistProduccion);

do{
	  $valor=$row_SistProduccion['idcodificadores'];
	  if(!isset($_SESSION['datos_porcina'])){
	    $sql_SistProd = "SELECT sistemaproduccion.* FROM sistemaproduccion 
					   WHERE  sistemaproduccion.idregistro=".$_SESSION['idreg']." and sistemaproduccion.idsistemaproduccion=".$valor;
		$SistProd = pg_query($cn,$sql_SistProd);
		$row_SistProd = pg_fetch_array ($SistProd);
		$totalRows_SistProd = pg_num_rows($SistProd);
	  }
    ?>
      <tr class="negre">
        <td width="197" height="22"><?php echo $row_SistProduccion['nombrecodificador'];?></td>
        <td width="192"><input type="checkbox"  onChange="Habilitar(this,'<?php echo $row_SistProduccion['idcodificadores'];?>')" <?php if(isset($_SESSION['datos_porcina']["chk".$row_SistProduccion['idcodificadores']])){echo 'checked';}elseif(isset($totalRows_SistProd) && $row_SistProd['idsistemaproduccion']==$row_SistProduccion['idcodificadores']){echo 'checked';}?>  name="<?php echo "chk".$row_SistProduccion['idcodificadores'];?>" id="<?php echo "chk".$row_SistProduccion['idcodificadores'];?>"/>
            <input type="text" name="<?php echo 'TxtSist'.$row_SistProduccion['idcodificadores'];?>" class="boxBusqueda4" <?php if( !(isset($_SESSION['datos_porcina']["chk".$row_SistProduccion['idcodificadores']])) ) { if(isset($totalRows_SistProd) && $row_SistProd['idsistemaproduccion']!=$row_SistProduccion['idcodificadores']){echo 'disabled';}}?>  id="<?php echo 'TxtSist'.$row_SistProduccion['idcodificadores'];?>" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="document.forms[0].submit()" value="<?php if(isset($_SESSION['datos_porcina']['TxtSist'.$valor])) { echo $_SESSION['datos_porcina']['TxtSist'.$valor];} elseif( isset($row_SistProd['idsistemaproduccion']) && $row_SistProd['idsistemaproduccion']==$row_SistProduccion['idcodificadores'] ){ echo $row_SistProd['cantidadproduccion'];} ?>" ></td>
      </tr>
      <?php  } while ($row_SistProduccion = pg_fetch_assoc($SistProduccion));?>
    </table></td>
    <td width="26%" id='blau8' ><table width="93%" border="0">
      <tr class="negre">
        <td><span class="taulaH">Num. Total de cerdos </span></td>
        <td>
        <?php $sql_SistProd = "SELECT sistemaproduccion.* FROM sistemaproduccion 
					   WHERE  idregistro=".$_SESSION['idreg']." and idsistemaproduccion=238";
		$SistProd = pg_query($cn,$sql_SistProd);
		$row_SistProd = pg_fetch_array ($SistProd);
        ?>
        <input name="TxtSist238" type="text" class="boxBusqueda4" onChange="CalcularCate()" id="TxtSist238" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php if(isset($_SESSION['datos_porcina']['TxtSist238'])) { echo $_SESSION['datos_porcina']['TxtSist238'];} elseif( isset($row_SistProd['idsistemaproduccion']) ){ echo $row_SistProd['cantidadproduccion'];} ?>"  maxlength="15" >
            <input style="visibility:hidden" type="checkbox" checked name="<?php echo "chk238";?>"/></td>
      </tr>
      <tr class="negre">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr class="negre">
        <td width="46%"><span class="taulaH"> Total vientres en el predio </span></td>
        <td width="54%"><span class="opcion">
          <input name="vientresp0" type="text" class="boxBusqueda4" id="vientresp0" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina0']->get_vientresp(); ?>">
        </span></td>
      </tr>
    </table></td>
  </tr>
  </table>
<table width="95%" class="taulaA" border="1" cellspacing="0">
  <tr align="center" >
    <td colspan="2" rowspan="2" class="cabecera2"> Situacion Actual Porcina</td>
    <td width="2%" rowspan="17" >&nbsp;</td>
    <td colspan="6" class="cabecera2">Plan de producción avicola en 5 años sistema mejorado</td>
    </tr>
  <tr align="center"  >
    <td width="20%" class="cabecera2">Descripción</td>
    <td  class="cabecera2">2014</td>
    <td  class="cabecera2">2015</td>
    <td  class="cabecera2">2016</td>
    <td  class="cabecera2">2017</td>
    <td class="cabecera2">2018</td>
    </tr>
  <tr >
    <td colspan="2" class="taulaH">En Area de Deforestada Ilegal y/o P.A.S.:</td>
    <td colspan="6"  class="taulaH">En Area de Deforestada Ilegal y/o P.A.S .:</td>
    </tr>
  <tr >
    <td width="20%" class="celdaCelesteClaro" >Superficie de cultivos para la alimentación PORCICOLA (opcional) </td>
    <td width="10%"  class="celdaCelesteClaro" ><input name="supcultivo0" type="text" class="boxBusqueda4" id="supcultivo0" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina0']->get_supculporcina(); ?>"></td>
    <td align="center" class="celdaCelesteClaro" >&nbsp;</td>
    <td align="center" class="celdaCelesteClaro" >--</td>
    <td align="center" class="celdaCelesteClaro" >--</td>
    <td align="center" class="celdaCelesteClaro" >--</td>
    <td align="center" class="celdaCelesteClaro" >--</td>
    <td align="center" class="celdaCelesteClaro" >--</td>
    </tr>
  
  <tr align="left" >
    <td colspan="2" align="left" class="taulaH">En La Totalidad de Predio:     </td>
    <td class="taulaH" colspan="6"  align="left">En La Totalidad de Predio:     </td>
    </tr>
  <tr align="left" >
    <td class="celdaCelesteClaro">Superficie total de infraestructura productiva en el predio </td>
    <td class="celdaCelesteClaro"><label>
      <input name="supinfraestuctura0" type="text" class="boxBusqueda4" id="supinfraestuctura0" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina0']->get_supinfraestructurap(); ?>">
    </label></td>
    <td class="celdaCelesteClaro">&nbsp;</td>
    <td align="center" class="celdaCelesteClaro" >--</td>
    <td align="center" class="celdaCelesteClaro" >--</td>
    <td align="center" class="celdaCelesteClaro" >--</td>
    <td align="center" class="celdaCelesteClaro" >--</td>
    <td align="center" class="celdaCelesteClaro" >--</td>
  </tr>
  <tr align="left" >
    <td class="celdaCelesteClaro" align="left">Corral de apareamiento</td>
    <td class="celdaCelesteClaro"><label>
        <span class="opcion">
      <input name="corralapareamiento0" type="text" class="boxBusqueda4" id="corralapareamiento0" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina0']->get_corralapareamiento(); ?>" maxlength="3">
      </span></label></td>
    <td class="celdaCelesteClaro" align="left">Corral de apareamiento</td>
    <td class="celdaCelesteClaro"><span class="opcion">
      <input name="corralapareamiento1" type="text" class="boxBusqueda4m" id="corralapareamiento1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina1']->get_corralapareamiento(); ?>" maxlength="3" readonly>
    </span></td>
    <td class="celdaCelesteClaro"><span class="opcion">
      <input name="corralapareamiento2" type="text" class="boxBusqueda4" id="corralapareamiento2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina2']->get_corralapareamiento(); ?>" maxlength="3">
    </span></td>
    <td class="celdaCelesteClaro"><span class="opcion">
      <input name="corralapareamiento3" type="text" class="boxBusqueda4" id="corralapareamiento3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina3']->get_corralapareamiento(); ?>" maxlength="3">
    </span></td>
    <td class="celdaCelesteClaro"><span class="opcion">
      <input name="corralapareamiento4" type="text" class="boxBusqueda4" id="corralapareamiento4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina4']->get_corralapareamiento(); ?>" maxlength="3">
    </span></td>
    <td class="celdaCelesteClaro"><span class="opcion">
      <input name="corralapareamiento5" type="text" class="boxBusqueda4" id="corralapareamiento5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina5']->get_corralapareamiento(); ?>" maxlength="3">
    </span></td>
    </tr>
  
  <tr align="left">
    <td class="celdaCelesteClaro" align="left">Corrales de gestación</td>
    <td class="celdaCelesteClaro"><span class="TituloCajaNegocios"><span class="opcion">
      <input name="corralgestacion0" type="text" class="boxBusqueda4" id="corralgestacion0" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina0']->get_corralgestacion(); ?>" maxlength="3">
      </span></span></td>
    <td class="celdaCelesteClaro" align="left">Corrales de gestación</td>
    <td class="celdaCelesteClaro"><span class="opcion">
      <input name="corralgestacion1" type="text" class="boxBusqueda4m" id="corralgestacion1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina1']->get_corralgestacion(); ?>" maxlength="3" readonly>
    </span></td>
    <td class="celdaCelesteClaro"><span class="opcion">
      <input name="corralgestacion2" type="text" class="boxBusqueda4" id="corralgestacion2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina2']->get_corralgestacion(); ?>" maxlength="3">
    </span></td>
    <td class="celdaCelesteClaro"><span class="opcion">
      <input name="corralgestacion3" type="text" class="boxBusqueda4" id="corralgestacion3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina3']->get_corralgestacion(); ?>" maxlength="3">
    </span></td>
    <td class="celdaCelesteClaro"><span class="opcion">
      <input name="corralgestacion4" type="text" class="boxBusqueda4" id="corralgestacion4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina4']->get_corralgestacion(); ?>" maxlength="3">
    </span></td>
    <td class="celdaCelesteClaro"><span class="opcion">
      <input name="corralgestacion5" type="text" class="boxBusqueda4" id="corralgestacion5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina5']->get_corralgestacion(); ?>" maxlength="3">
    </span></td>
    </tr>
  <tr align="left" >
    <td class="celdaCelesteClaro" align="left">Corrales de maternidad</td>
    <td class="celdaCelesteClaro"><span class="TituloCajaNegocios"><span class="opcion">
      <input name="corralmaternidad0" type="text" class="boxBusqueda4" id="corralmaternidad0" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina0']->get_corralmaternidad(); ?>" maxlength="3">
      </span></span></td>
    <td class="celdaCelesteClaro" align="left">Corrales de maternidad</td>
    <td class="celdaCelesteClaro"><span class="opcion">
      <input name="corralmaternidad1" type="text" class="boxBusqueda4m" id="corralmaternidad1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina1']->get_corralmaternidad(); ?>" maxlength="3" readonly>
    </span></td>
    <td class="celdaCelesteClaro"><span class="opcion">
      <input name="corralmaternidad2" type="text" class="boxBusqueda4" id="corralmaternidad2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina2']->get_corralmaternidad(); ?>" maxlength="3">
    </span></td>
    <td class="celdaCelesteClaro"><span class="opcion">
      <input name="corralmaternidad3" type="text" class="boxBusqueda4" id="corralmaternidad3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina3']->get_corralmaternidad(); ?>" maxlength="3">
    </span></td>
    <td class="celdaCelesteClaro"><span class="opcion">
      <input name="corralmaternidad4" type="text" class="boxBusqueda4" id="corralmaternidad4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina4']->get_corralmaternidad(); ?>" maxlength="3">
    </span></td>
    <td class="celdaCelesteClaro"><span class="opcion">
      <input name="corralmaternidad5" type="text" class="boxBusqueda4" id="corralmaternidad5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina5']->get_corralmaternidad(); ?>" maxlength="3">
    </span></td>
    </tr>
  <tr align="left">
    <td class="celdaCelesteClaro" align="left">Corrales destete</td>
    <td class="celdaCelesteClaro"><span class="TituloCajaNegocios"><span class="opcion">
      <input name="corraldestete0" type="text" class="boxBusqueda4" id="corraldestete0" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina0']->get_corraldestete(); ?>" maxlength="3">
      </span></span></td>
    <td class="celdaCelesteClaro" align="left">Corrales destete</td>
    <td class="celdaCelesteClaro"><span class="opcion">
      <input name="corraldestete1" type="text" class="boxBusqueda4m" id="corraldestete1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina1']->get_corraldestete(); ?>" maxlength="3" readonly>
    </span></td>
    <td class="celdaCelesteClaro"><span class="opcion">
      <input name="corraldestete2" type="text" class="boxBusqueda4" id="corraldestete2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina2']->get_corraldestete(); ?>" maxlength="3">
    </span></td>
    <td class="celdaCelesteClaro"><span class="opcion">
      <input name="corraldestete3" type="text" class="boxBusqueda4" id="corraldestete3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina3']->get_corraldestete(); ?>" maxlength="3">
    </span></td>
    <td class="celdaCelesteClaro"><span class="opcion">
      <input name="corraldestete4" type="text" class="boxBusqueda4" id="corraldestete4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina4']->get_corraldestete(); ?>" maxlength="3">
    </span></td>
    <td class="celdaCelesteClaro"><span class="opcion">
      <input name="corraldestete5" type="text" class="boxBusqueda4" id="corraldestete5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina5']->get_corraldestete(); ?>" maxlength="3">
    </span></td>
    </tr>
  <tr align="left" >
    <td class="celdaCelesteClaro" align="left">Corrales (crecimiento - acabado)</td>
    <td class="celdaCelesteClaro"><span class="TituloCajaNegocios"><span class="opcion">
      <input name="corralcrecimiento0" type="text" class="boxBusqueda4" id="corralcrecimiento0" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina0']->get_corralcrecimiento(); ?>" maxlength="3">
      </span></span></td>
    <td class="celdaCelesteClaro" align="left">Corrales (crecimiento - acabado)</td>
    <td class="celdaCelesteClaro"><span class="opcion">
      <input name="corralcrecimiento1" type="text" class="boxBusqueda4m" id="corralcrecimiento1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina1']->get_corralcrecimiento(); ?>" maxlength="3" readonly>
    </span></td>
    <td class="celdaCelesteClaro"><span class="opcion">
      <input name="corralcrecimiento2" type="text" class="boxBusqueda4" id="corralcrecimiento2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina2']->get_corralcrecimiento(); ?>" maxlength="3">
    </span></td>
    <td class="celdaCelesteClaro"><span class="opcion">
      <input name="corralcrecimiento3" type="text" class="boxBusqueda4" id="corralcrecimiento3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina3']->get_corralcrecimiento(); ?>" maxlength="3">
    </span></td>
    <td class="celdaCelesteClaro"><span class="opcion">
      <input name="corralcrecimiento4" type="text" class="boxBusqueda4" id="corralcrecimiento4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina4']->get_corralcrecimiento(); ?>" maxlength="3">
    </span></td>
    <td class="celdaCelesteClaro"><span class="opcion">
      <input name="corralcrecimiento5" type="text" class="boxBusqueda4" id="corralcrecimiento5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina5']->get_corralcrecimiento(); ?>" maxlength="3">
    </span></td>
    </tr>
  <tr align="left" >
    <td class="celdaCelesteClaro" align="left">Registro sanitario del predio</td>
    <td class="celdaCelesteClaro"><select name="RegSanitario0" id="RegSanitario0" class="combos" >
      <?php $aux=$_SESSION['porcina0']->get_registrosanitariop(); ?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Elegir....</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>Vigente</option>
      <option value="2" <?php if( $aux=="2"){echo 'selected' ;}?>>Vencido</option>
      <option value="3" <?php if( $aux=="3"){echo 'selected' ;}?>>Adecuado</option>
      <option value="4" <?php if( $aux=="4"){echo 'selected' ;}?>>Sin Registro</option>
    </select></td>
    <td class="celdaCelesteClaro" align="left">Registro sanitario</td>
    <td class="celdaCelesteClaro"><select name="RegSanitario1" id="RegSanitario1" class="combos"   >
        <?php $aux=$_SESSION['porcina1']->get_registrosanitariop(); ?>
        <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Elegir....</option>        
    </select></td>
    <td class="celdaCelesteClaro"><select name="RegSanitario2" id="RegSanitario2" class="combos" >
        <?php $aux=$_SESSION['porcina2']->get_registrosanitariop(); ?>
        <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Elegir....</option>
        <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>Vigente</option>
        <option value="2" <?php if( $aux=="5"){echo 'selected' ;}?>>Renovación</option>
        <option value="3" <?php if( $aux=="6"){echo 'selected' ;}?>>Aprobación</option>
        <option value="4" <?php if( $aux=="7"){echo 'selected' ;}?>>Inicio del trámite</option>
    </select></td>
    <td class="celdaCelesteClaro"><select name="RegSanitario3" id="RegSanitario3" class="combos" >
        <?php $aux=$_SESSION['porcina3']->get_registrosanitariop(); ?>
        <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Elegir....</option>
        <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>Vigente</option>
        <option value="2" <?php if( $aux=="5"){echo 'selected' ;}?>>Renovación</option>
        <option value="3" <?php if( $aux=="6"){echo 'selected' ;}?>>Aprobación</option>
        <option value="4" <?php if( $aux=="7"){echo 'selected' ;}?>>Inicio del trámite</option>
    </select></td>
    <td class="celdaCelesteClaro"><select name="RegSanitario4" id="RegSanitario4" class="combos" >
        <?php $aux=$_SESSION['porcina4']->get_registrosanitariop(); ?>
        <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Elegir....</option>
        <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>Vigente</option>
        <option value="2" <?php if( $aux=="5"){echo 'selected' ;}?>>Renovación</option>
        <option value="3" <?php if( $aux=="6"){echo 'selected' ;}?>>Aprobación</option>
        <option value="4" <?php if( $aux=="7"){echo 'selected' ;}?>>Inicio del trámite</option>
    </select></td>
    <td class="celdaCelesteClaro"><select name="RegSanitario5" id="RegSanitario5" class="combos" >
        <?php $aux=$_SESSION['porcina5']->get_registrosanitariop(); ?>
        <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Elegir....</option>
        <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>Vigente</option>
        <option value="2" <?php if( $aux=="5"){echo 'selected' ;}?>>Renovación</option>
        <option value="3" <?php if( $aux=="6"){echo 'selected' ;}?>>Aprobación</option>
        <option value="4" <?php if( $aux=="7"){echo 'selected' ;}?>>Inicio del trámite</option>
    </select></td>
  </tr>
  
  <tr align="left" class="celdaCelesteClaro">
    <td class="celdaCelesteClaro" align="left">Capacidad máx. de carga animal</td>
    <td class="opcion"><input name="capacidadp0" type="text" class="boxBusqueda4" id="capacidadp0" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina0']->get_capacidadp(); ?>"></td>
    <td align="left">Capacidad máx. de carga animal</td>
    <td class="opcion"><input name="capacidadp1" type="text" class="boxBusqueda4m" id="capacidadp1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina1']->get_capacidadp(); ?>" readonly></td>
    <td class="opcion"><input name="capacidadp2" type="text" class="boxBusqueda4" id="capacidadp2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina2']->get_capacidadp(); ?>"></td>
    <td class="opcion"><input name="capacidadp3" type="text" class="boxBusqueda4" id="capacidadp3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina3']->get_capacidadp(); ?>"></td>
    <td class="opcion"><input name="capacidadp4" type="text" class="boxBusqueda4" id="capacidadp4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina4']->get_capacidadp(); ?>"></td>
    <td class="opcion"><input name="capacidadp5" type="text" class="boxBusqueda4" id="capacidadp5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina5']->get_capacidadp(); ?>"></td>
  </tr>
  <tr align="left" class="celdaCelesteClaro">
    <td class="celdaCelesteClaro" align="left">Promedio lechones Nacidos Vivos por vientre </td>
    <td class="opcion"><input name="lechonesvientre0" type="text" class="boxBusqueda4" id="lechonesvientre0" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina0']->get_lechonesvientre(); ?>"></td>
    <td align="left">Promedio lechones Nacidos Vivos por vientre </td>
    <td class="opcion"><input name="lechonesvientre1" type="text" class="boxBusqueda4m" id="lechonesvientre1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina1']->get_lechonesvientre(); ?>" readonly></td>
    <td class="opcion"><input name="lechonesvientre2" type="text" class="boxBusqueda4" id="lechonesvientre2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina2']->get_lechonesvientre(); ?>"></td>
    <td class="opcion"><input name="lechonesvientre3" type="text" class="boxBusqueda4" id="lechonesvientre3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina3']->get_lechonesvientre(); ?>"></td>
    <td class="opcion"><input name="lechonesvientre4" type="text" class="boxBusqueda4" id="lechonesvientre4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina4']->get_lechonesvientre(); ?>"></td>
    <td class="opcion"><input name="lechonesvientre5" type="text" class="boxBusqueda4" id="lechonesvientre5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina5']->get_lechonesvientre(); ?>"></td>
  </tr>
  <tr align="left" class="celdaCelesteClaro">
    <td class="celdaCelesteClaro" align="left">Promedio CERDOS a la venta/vientre </td>
    <td class="opcion"><input name="cerdosventavientre0" type="text" class="boxBusqueda4" id="cerdosventavientre0" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina0']->get_cerdosventavientre(); ?>"></td>
    <td align="left">Promedio CERDOS a la venta/vientre </td>
    <td class="opcion"><input name="cerdosventavientre1" type="text" class="boxBusqueda4m" id="cerdosventavientre1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina1']->get_cerdosventavientre(); ?>" readonly></td>
    <td class="opcion"><input name="cerdosventavientre2" type="text" class="boxBusqueda4" id="cerdosventavientre2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina2']->get_cerdosventavientre(); ?>"></td>
    <td class="opcion"><input name="cerdosventavientre3" type="text" class="boxBusqueda4" id="cerdosventavientre3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina3']->get_cerdosventavientre(); ?>"></td>
    <td class="opcion"><input name="cerdosventavientre4" type="text" class="boxBusqueda4" id="cerdosventavientre4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina4']->get_cerdosventavientre(); ?>"></td>
    <td class="opcion"><input name="cerdosventavientre5" type="text" class="boxBusqueda4" id="cerdosventavientre5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina5']->get_cerdosventavientre(); ?>"></td>
    </tr>
  
  <tr align="left" class="celdaCelesteClaro">
    <td class="celdaCelesteClaro" align="left">Peso vivo promedio a la venta </td>
    <td class="opcion"><input name="pesopromedioventa0" type="text" class="boxBusqueda4" id="pesopromedioventa0" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina0']->get_pesopromedioventa(); ?>"></td>
    <td align="left">Peso vivo promedio a la venta </td>
    <td align="center" >--</td>
    <td align="center" >--</td>
    <td align="center" >--</td>
    <td align="center" >--</td>
    <td align="center" >--</td>
  </tr>
  <tr align="left" class="celdaCelesteClaro">
    <td class="celdaCelesteClaro" align="left">Producción carne (kg/año)</td>
    <td class="opcion"><span class="celdaCelesteClaro">
      <input name="prodcarnep0" type="text" class="boxBusqueda4" id="prodcarnep0" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina0']->get_prodcarnep(); ?>">
    </span></td>
    <td align="left">Producción carne (kg/año)</td>
    <td class="opcion"><input name="prodcarnep1" type="text" class="boxBusqueda4m" id="prodcarnep1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina1']->get_prodcarnep(); ?>" readonly></td>
    <td class="opcion"><input name="prodcarnep2" type="text" class="boxBusqueda4" id="prodcarnep2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina2']->get_prodcarnep(); ?>"></td>
    <td class="opcion"><input name="prodcarnep3" type="text" class="boxBusqueda4" id="prodcarnep3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina3']->get_prodcarnep(); ?>"></td>
    <td class="opcion"><input name="prodcarnep4" type="text" class="boxBusqueda4" id="prodcarnep4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina4']->get_prodcarnep(); ?>"></td>
    <td class="opcion"><input name="prodcarnep5" type="text" class="boxBusqueda4" id="prodcarnep5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['porcina5']->get_prodcarnep(); ?>"></td>
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
  <input name="submit" type="submit" class='boton verde formaBoton' value="Guardar">
</p>
</form>
<?php include "../foot.php";?>
</div>
</BODY></HTML>