<?php 
include "../Clases/SuperficieRegistro.php";
include "../Clases/Avicola.php";
session_start();

include "../cabecera.php";
include "page_avicola.php";

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
			 }else{
			   document.getElementById('TxtSist'+String(identificador)).disabled=true;
			  }
		}catch(e) {   
			alert(e);   
		}   
}  //'eclosionpesadas','eclosionlivianas','eclosionpesadas'

function Calcular() {  //TPFP =1 superficie es tpfp  ocument.formu.valora[marcado].value
	try {  //seleccion =document.formulario.grupo[1].value;// document.formu.valora[i].checked
			alert(seleccion);
		 /* if (seleccion.checked){
			   document.getElementById('TxtSist'+String(identificador)).disabled=false;
			 }else{
			   document.getElementById('TxtSist'+String(identificador)).disabled=true;
			  }*/
		}catch(e) {   
			alert(e);   
		}   
}
function getRadioButtonSelectedValue(ctrl)
{
    for(i=0;i<ctrl.length;i++)
        if(ctrl[i].checked) return ctrl[i].value;
}

function HabilitarFila(seleccion,identificador, identificador2) {  
	try {  a=getRadioButtonSelectedValue(document.formulario.grupo);
		 // alert(a);
		  if (a=="eclosionpesadas"){
		  //alert(a);
			   //document.getElementById('TxtSist'+String(identificador)).=false;
			   document.getElementById('eclosionpesadas0').readOnly=false;
			   document.getElementById('eclosionpesadas1').readOnly=false;
			   document.getElementById('eclosionpesadas2').readOnly=false;
			   document.getElementById('eclosionpesadas3').readOnly=false;
			   document.getElementById('eclosionpesadas4').readOnly=false;
			   document.getElementById('eclosionpesadas5').readOnly=false;
			   
			   document.getElementById('eclosionpesadas0').setAttribute('class','boxBusqueda4'); 
			   document.getElementById('eclosionpesadas1').setAttribute('class','boxBusqueda4m');
			   document.getElementById('eclosionpesadas2').setAttribute('class','boxBusqueda4');
			   document.getElementById('eclosionpesadas3').setAttribute('class','boxBusqueda4');
			   document.getElementById('eclosionpesadas4').setAttribute('class','boxBusqueda4');
			   document.getElementById('eclosionpesadas5').setAttribute('class','boxBusqueda4');
			   
			   
			   document.getElementById('eclosionlivianas0').readOnly=true;
			   document.getElementById('eclosionlivianas1').readOnly=true;
			   document.getElementById('eclosionlivianas2').readOnly=true;
			   document.getElementById('eclosionlivianas3').readOnly=true;
			   document.getElementById('eclosionlivianas4').readOnly=true;
			   document.getElementById('eclosionlivianas5').readOnly=true;
			   
			    document.getElementById('eclosionlivianas0').value=0;
			   document.getElementById('eclosionlivianas1').value=0;
			   document.getElementById('eclosionlivianas2').value=0;
			   document.getElementById('eclosionlivianas3').value=0;
			   document.getElementById('eclosionlivianas4').value=0;
			   document.getElementById('eclosionlivianas5').value=0;
		
			   document.getElementById('eclosionlivianas0').setAttribute('class','boxBusqueda4m'); 
			   document.getElementById('eclosionlivianas1').setAttribute('class','boxBusqueda4m');
			   document.getElementById('eclosionlivianas2').setAttribute('class','boxBusqueda4m');
			   document.getElementById('eclosionlivianas3').setAttribute('class','boxBusqueda4m');
			   document.getElementById('eclosionlivianas4').setAttribute('class','boxBusqueda4m');
			   document.getElementById('eclosionlivianas5').setAttribute('class','boxBusqueda4m');
			   
			   MultiplicacionFila('cantpollobbventa','eclosionpesadas');
			  
		   }else{
			   //alert(a);
			   document.getElementById('eclosionpesadas0').readOnly=true;
			   document.getElementById('eclosionpesadas1').readOnly =false;
			   document.getElementById('eclosionpesadas2').readOnly=true;
			   document.getElementById('eclosionpesadas3').readOnly=true;
			   document.getElementById('eclosionpesadas4').readOnly=true;
			   document.getElementById('eclosionpesadas5').readOnly=true;
			   
			   document.getElementById('eclosionpesadas0').setAttribute('class','boxBusqueda4m'); 
			   document.getElementById('eclosionpesadas1').setAttribute('class','boxBusqueda4m');
			   document.getElementById('eclosionpesadas2').setAttribute('class','boxBusqueda4m');
			   document.getElementById('eclosionpesadas3').setAttribute('class','boxBusqueda4m');
			   document.getElementById('eclosionpesadas4').setAttribute('class','boxBusqueda4m');
			   document.getElementById('eclosionpesadas5').setAttribute('class','boxBusqueda4m');
			   
			   
			   document.getElementById('eclosionlivianas0').readOnly=false;
			   document.getElementById('eclosionlivianas1').readOnly=false;
			   document.getElementById('eclosionlivianas2').readOnly=false;
			   document.getElementById('eclosionlivianas3').readOnly=false;
			   document.getElementById('eclosionlivianas4').readOnly=false;
			   document.getElementById('eclosionlivianas5').readOnly=false;
			   
			   document.getElementById('eclosionpesadas0').value=0;
			   document.getElementById('eclosionpesadas1').value=0;
			   document.getElementById('eclosionpesadas2').value=0;
			   document.getElementById('eclosionpesadas3').value=0;
			   document.getElementById('eclosionpesadas4').value=0;
			   document.getElementById('eclosionpesadas5').value=0;
		
			   document.getElementById('eclosionlivianas0').setAttribute('class','boxBusqueda4'); 
			   document.getElementById('eclosionlivianas1').setAttribute('class','boxBusqueda4m');
			   document.getElementById('eclosionlivianas2').setAttribute('class','boxBusqueda4');
			   document.getElementById('eclosionlivianas3').setAttribute('class','boxBusqueda4');
			   document.getElementById('eclosionlivianas4').setAttribute('class','boxBusqueda4');
			   document.getElementById('eclosionlivianas5').setAttribute('class','boxBusqueda4');
			   
			   MultiplicacionFila('cantpollobbventa','eclosionlivianas');
			  
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

function MultiplicacionFila(nombre,nombreporcentaje) {   
		try { //nombre="suppastosembrado"; 
		      
			  var base=document.getElementById(nombre+0).value;
			  var a=document.getElementById(nombre+1).value;
			  var b=document.getElementById(nombre+2).value;
			  var c=document.getElementById(nombre+3).value;
			  var d=document.getElementById(nombre+4).value;
			  var e=document.getElementById(nombre+5).value;
			  
			 // var basep=document.getElementById(nombreporcentaje+0).value;
			  var ap=document.getElementById(nombreporcentaje+1).value;
			  var bp=document.getElementById(nombreporcentaje+2).value;
			  var cp=document.getElementById(nombreporcentaje+3).value;
			  var dp=document.getElementById(nombreporcentaje+4).value;
			  var ep=document.getElementById(nombreporcentaje+5).value;
			  //alert(base);
			  
			  if(base.trim()==""){base=0; }
			  if(a.trim()==""){a=0; }
			  if(b.trim()==""){b=0; }
			  if(c.trim()==""){c=0; }
			  if(d.trim()==""){d=0; }
			  if(e.trim()==""){e=0; } 
			  
			  if(ap.trim()==""){ap=0; }
			  if(bp.trim()==""){bp=0; }
			  if(cp.trim()==""){cp=0; }
			  if(dp.trim()==""){dp=0; }
			  if(ep.trim()==""){ep=0; } 
			  			  
			  a=0;
			  b=Math.round(parseFloat(base)+parseFloat(base*bp/100));
			  c=Math.round(parseFloat(b)+parseFloat(b*cp/100));
			  d=Math.round(parseFloat(c)+parseFloat(c*dp/100));
			  e=Math.round(parseFloat(d)+parseFloat(d*ep/100)); 
			  			
			  document.getElementById(nombre+1).value=a;
			  document.getElementById(nombre+2).value=b;
			  document.getElementById(nombre+3).value=c;
			  document.getElementById(nombre+4).value=d;
			  document.getElementById(nombre+5).value=e;
			  
			  //document.getElementById(nombre+'t').value=parseFloat(a)+parseFloat(b)+parseFloat(c)+parseFloat(d)+parseFloat(e);
			  
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
		
?>
	 <div id="oculto">
<div class="ocultable" id="texto1"><div id="volanta"></div></div></div>
	
<div align="center" class="texto">
<form action="N_Avicola.php" method="POST" name="formulario" autocomplete="off"  enctype="multipart/form-data" >
  <b><big>III. PRODUCCION DE ALIMENTOS </big></b><b><big> - AVICOLA</big></b><br>

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
            <input name="Superficie" type="text" class="boxVerde" id="Superficie"  onFocus="siguienteCampo ='FechaFin'" maxlength="10" value="<?php echo isset($_SESSION['datos_avicola']['Superficie']) ? htmlspecialchars($_SESSION['datos_avicola']['Superficie']) : $row_predio['superficie'];?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly >
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
        <td id='blau4'><span class="taulaH">2. Uso Actual en &aacute;reas deforestadas ilegales  y/o P.A.S.(Ha)</span></td>
        <td width="45%" id='blau8' >&nbsp;</td>
      </tr>
      <tr class="texto_normal">
        <td colspan="2" id='blau13'><table width="95%" border="0" class='taulaA'>
          <tr id="blau3" >
            <td width="11%" id="blau11">Agricola: </td>
            <td width="20%" ><input name="SupActAgri" type="text" class="boxBusqueda4" id="SupActAgri" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_avicola']['SupActAgri']) ? htmlspecialchars($_SESSION['datos_avicola']['SupActAgri']) : $row_supali['supagricola'] ?>" maxlength="15" ></td>
            <td width="11%" id="blau11">Barbecho: </td>
            <td width="11%"><input name="SupActbar" type="text" class="boxBusqueda4" id="SupActbar" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_avicola']['SupActbar']) ? htmlspecialchars($_SESSION['datos_avicola']['SupActbar']) : $row_supali['supbarbecho']?>"  maxlength="15" readonly></td>
            <td width="11%" id="blau11">Descanso</td>
            <td width="11%"><input name="SupActDes" type="text" class="boxBusqueda4" id="SupActDes" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_avicola']['SupActDes']) ? htmlspecialchars($_SESSION['datos_avicola']['SupActDes']) : $row_supali['supdescanso']?>" maxlength="15" readonly></td>
            <td width="11%" id="blau11">Ganadera</td>
            <td width="11%"><input name="SupActGan" type="text" class="boxBusqueda4" id="SupActGan" onChange="cabezasganado(<?php echo $_SESSION['Departamento']?>)"  onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_avicola']['SupActGan']) ? htmlspecialchars($_SESSION['datos_avicola']['SupActGan']) : $row_supali['supganadera'] ?> " readonly maxlength="15" ></td>
          </tr>
        </table></td>
      </tr>
      
      <tr class="texto_normal">
    <td width="55%" id='blau'><span class="taulaH">3.Sistemas de Produccion Avicola En el Predio (Anual)</span></td>
    <td width="45%" id='blau8' >&nbsp;</td>
      </tr>
  
  <tr >
    <td colspan="2" ><table width="40%" border="0" cellspacing="0" cellpadding="0">
      
      <?php 
	$sql_SistProduccion = "Select * From codificadores Where idclasificador=29 Order by idcodificadores";
    $SistProduccion = pg_query($cn,$sql_SistProduccion) ;
	$row_SistProduccion = pg_fetch_array ($SistProduccion);

do{
	  $valor=$row_SistProduccion['idcodificadores'];
	  if(!isset($_SESSION['datos_avicola'])){
	    $sql_SistProd = "SELECT sistemaproduccion.* FROM sistemaproduccion 
					   WHERE  sistemaproduccion.idregistro=".$_SESSION['idreg']." and sistemaproduccion.idsistemaproduccion=".$valor;
		$SistProd = pg_query($cn,$sql_SistProd);
		$row_SistProd = pg_fetch_array ($SistProd);
		$totalRows_SistProd = pg_num_rows($SistProd);
	  }
    ?>
      <tr class="negre">
        <td width="283"><?php echo $row_SistProduccion['nombrecodificador'];?></td>
        <td width="95"><input type="checkbox"  onChange="Habilitar(this,'<?php echo $row_SistProduccion['idcodificadores'];?>')" <?php if(isset($_SESSION['datos_avicola']["chk".$row_SistProduccion['idcodificadores']])){echo 'checked';}elseif(isset($totalRows_SistProd) && $row_SistProd['idsistemaproduccion']==$row_SistProduccion['idcodificadores']){echo 'checked';}?>  name="<?php echo "chk".$row_SistProduccion['idcodificadores'];?>"/>
            <input type="text" name="<?php echo 'TxtSist'.$row_SistProduccion['idcodificadores'];?>" class="boxBusqueda4" <?php if( !(isset($_SESSION['datos_avicola']["chk".$row_SistProduccion['idcodificadores']])) ) { if(isset($totalRows_SistProd) && $row_SistProd['idsistemaproduccion']!=$row_SistProduccion['idcodificadores']){echo 'disabled';}}?>  id="<?php echo 'TxtSist'.$row_SistProduccion['idcodificadores'];?>" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="document.forms[0].submit()" value="<?php if(isset($_SESSION['datos_avicola']['TxtSist'.$valor])) { echo $_SESSION['datos_avicola']['TxtSist'.$valor];} elseif( isset($row_SistProd['idsistemaproduccion']) && $row_SistProd['idsistemaproduccion']==$row_SistProduccion['idcodificadores'] ){ echo $row_SistProd['cantidadproduccion'];} ?>" ></td>
      </tr>
      <?php  } while ($row_SistProduccion = pg_fetch_assoc($SistProduccion));?>
    </table></td>
    </tr>
  </table>
    
<table width="95%" class="taulaA" border="1" cellspacing="0">
  <tr align="center">
    <td colspan="3" rowspan="2" class="cabecera2"> Situacion Actual Avicola</td>
    <td width="2%" rowspan="17" >&nbsp;</td>
    <td colspan="6" class="cabecera2">Plan de producción avicola en 5 años sistema mejorado</td>
    </tr>
   <tr align="center">
    <td width="20%" class="cabecera2">&nbsp;</td>
     
    <?php
    
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
        
    
	 if($periodo == 1)
	 {
	?>
                        <td  class="cabecera2">2014</td>                        
                        <td  class="cabecera2">2015</td>                        
                        <td  class="cabecera2">2016</td>                        
                        <td  class="cabecera2">2017</td>                        
                        <td  class="cabecera2">2018</td>                        				 
		<?php
		 }
		 elseif ($periodo == 2) {
		?>                       
                        <td  class="cabecera2">2016</td>                        
                        <td  class="cabecera2">2017</td>                        
                        <td  class="cabecera2">2018</td>                        
                        <td  class="cabecera2">2019</td>                        
                        <td  class="cabecera2">2020</td>                        				 
		<?php
			}
?> 
                        
    </tr>
  <tr >
    <td colspan="3" class="taulaH">En Area de Deforestada Ilegal y/o P.A.S.:</td>
    <td colspan="6"  class="taulaH">En Area de Deforestada Ilegal y/o P.A.S .:</td>
    </tr>
  
  <tr >
    <td width="20%" colspan="2" class="celdaCelesteClaro" >Superficie de cultivos para la alimentación avícola (opcional) (ha) </td>
    <td width="7%" align="center" class="celdaCelesteClaro" ><input name="supcultivo0" type="text" class="boxBusqueda4" id="supcultivo0" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola0']->get_supcultavicola(); ?>"></td>
    <td align="center" class="celdaCelesteClaro" >--</td>
    <td align="center" class="celdaCelesteClaro" >--</td>
    <td align="center" class="celdaCelesteClaro" >--</td>
    <td align="center" class="celdaCelesteClaro" >--</td>
    <td align="center" class="celdaCelesteClaro" >--</td>
    <td align="center" class="celdaCelesteClaro" >--</td>
    </tr>
  
  <tr align="center" >
    <td colspan="3" align="left" class="taulaH">En La Totalidad de Predio:     </td>
    <td class="taulaH" colspan="6"  align="left">En La Totalidad de Predio:     </td>
    </tr>
  <tr align="center" >
    <td colspan="2" align="left" class="celdaCelesteClaro">Superficie total de infraestructura productiva en el predio (ha)</td>
    <td class="celdaCelesteClaro"><input name="supinfraestuctura" type="text" class="boxBusqueda4" id="supinfraestuctura" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola0']->get_supinfraestuctura(); ?>"></td>
    <td class="celdaCelesteClaro" >--</td>
    <td class="celdaCelesteClaro" >--</td>
    <td class="celdaCelesteClaro" >--</td>
    <td class="celdaCelesteClaro" >--</td>
    <td class="celdaCelesteClaro" >--</td>
    <td class="celdaCelesteClaro" >--</td>
  </tr>
  <tr align="center" >
    <td colspan="2" align="left" class="celdaCelesteClaro">Registro Sanitario</td>
    <td class="celdaCelesteClaro"><label>
      <select name="RegSanitario0" id="RegSanitario0" class="combos" >
      <?php $aux=$_SESSION['avicola0']->get_registrosanitario(); ?>
        <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Elegir....</option>
        <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>Vigente</option>
        <option value="2" <?php if( $aux=="2"){echo 'selected' ;}?>>Vencido</option>
        <option value="3" <?php if( $aux=="3"){echo 'selected' ;}?>>Adecuado</option>
        <option value="4" <?php if( $aux=="4"){echo 'selected' ;}?>>Sin Registro</option>
      </select>
    </label></td>
    <td class="celdaCelesteClaro" align="left">Registro Sanitario</td>
    <td class="celdaCelesteClaro"><select name="RegSanitario1" id="RegSanitario1" class="combos"  >
      <?php $aux=$_SESSION['avicola1']->get_registrosanitario(); ?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Elegir....</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>Vigente</option>
      <option value="2" <?php if( $aux=="2"){echo 'selected' ;}?>>Vencido</option>
      <option value="3" <?php if( $aux=="3"){echo 'selected' ;}?>>Adecuado</option>
      <option value="4" <?php if( $aux=="4"){echo 'selected' ;}?>>Sin Registro</option>
    </select></td>
    <td class="celdaCelesteClaro"><select name="RegSanitario2" id="RegSanitario2" class="combos" >
      <?php $aux=$_SESSION['avicola2']->get_registrosanitario(); ?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Elegir....</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>Vigente</option>
      <option value="2" <?php if( $aux=="2"){echo 'selected' ;}?>>Vencido</option>
      <option value="3" <?php if( $aux=="3"){echo 'selected' ;}?>>Adecuado</option>
      <option value="4" <?php if( $aux=="4"){echo 'selected' ;}?>>Sin Registro</option>
    </select></td>
    <td class="celdaCelesteClaro"><select name="RegSanitario3" id="RegSanitario3" class="combos" >
      <?php $aux=$_SESSION['avicola3']->get_registrosanitario(); ?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Elegir....</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>Vigente</option>
      <option value="2" <?php if( $aux=="2"){echo 'selected' ;}?>>Vencido</option>
      <option value="3" <?php if( $aux=="3"){echo 'selected' ;}?>>Adecuado</option>
      <option value="4" <?php if( $aux=="4"){echo 'selected' ;}?>>Sin Registro</option>
    </select></td>
    <td class="celdaCelesteClaro"><select name="RegSanitario4" id="RegSanitario4" class="combos" >
      <?php $aux=$_SESSION['avicola4']->get_registrosanitario(); ?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Elegir....</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>Vigente</option>
      <option value="2" <?php if( $aux=="2"){echo 'selected' ;}?>>Vencido</option>
      <option value="3" <?php if( $aux=="3"){echo 'selected' ;}?>>Adecuado</option>
      <option value="4" <?php if( $aux=="4"){echo 'selected' ;}?>>Sin Registro</option>
    </select></td>
    <td class="celdaCelesteClaro"><select name="RegSanitario5" id="RegSanitario5" class="combos" >
      <?php $aux=$_SESSION['avicola5']->get_registrosanitario(); ?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Elegir....</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>Vigente</option>
      <option value="2" <?php if( $aux=="2"){echo 'selected' ;}?>>Vencido</option>
      <option value="3" <?php if( $aux=="3"){echo 'selected' ;}?>>Adecuado</option>
      <option value="4" <?php if( $aux=="4"){echo 'selected' ;}?>>Sin Registro</option>
    </select></td>
    </tr>
  
  <tr align="center" class="taulaH">
    <td height="6" colspan="3" align="left" ></td>
    <td colspan="6" align="left" ></td>
    </tr>
  <tr align="center" >
    <td class="celdaCelesteClaro" align="left">Porcentaje de eclosión (80% base)
      Reproductoras  PESADAS</td>
    <td class="celdaCelesteClaro" align="left"><p>
        <label>
          <input type="radio" name="grupo" value="eclosionpesadas" id="eclosionpesadas" onChange="HabilitarFila(this,'eclosionpesadas','eclosionlivianas')" <?php $aux=$_SESSION['avicola0']->get_eclosionpesadas(); if($aux>0){ echo 'checked' ;} ?> >
        </label>
        
      </p></td>
    <td class="celdaCelesteClaro"><input name="eclosionpesadas0" type="text"  id="eclosionpesadas0" onChange="MultiplicacionFila('cantpollobbventa','eclosionpesadas')" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola0']->get_eclosionpesadas(); ?>" <?php if($aux<=0){ echo 'readOnly'; echo ' class="boxBusqueda4m"';}else{echo ' class="boxBusqueda4"';} ?>  ></td>
    <td class="celdaCelesteClaro" align="left">Porcentaje de eclosión REPRODUCTORAS PESADAS</td>
    <td class="celdaCelesteClaro"><input name="eclosionpesadas1" type="text" id="eclosionpesadas1"  onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola1']->get_eclosionpesadas(); ?>" <?php if($aux<=0){ echo 'readonly'; echo ' class="boxBusqueda4m"';}else{echo ' class="boxBusqueda4"';} ?> ></td>
    <td class="celdaCelesteClaro"><input name="eclosionpesadas2" type="text"  id="eclosionpesadas2" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola2']->get_eclosionpesadas(); ?>" <?php if($aux<=0){ echo 'readOnly'; echo ' class="boxBusqueda4m"';}else{echo ' class="boxBusqueda4"';} ?> onChange="MultiplicacionFila('cantpollobbventa','eclosionpesadas')"></td>
    <td class="celdaCelesteClaro"><input name="eclosionpesadas3" type="text"  id="eclosionpesadas3" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola3']->get_eclosionpesadas(); ?>" <?php if($aux<=0){ echo 'readOnly'; echo ' class="boxBusqueda4m"';}else{echo ' class="boxBusqueda4"';} ?> onChange="MultiplicacionFila('cantpollobbventa','eclosionpesadas')"></td>
    <td class="celdaCelesteClaro"><input name="eclosionpesadas4" type="text"  id="eclosionpesadas4" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola4']->get_eclosionpesadas(); ?>" <?php if($aux<=0){ echo 'readOnly'; echo ' class="boxBusqueda4m"';}else{echo ' class="boxBusqueda4"';} ?> onChange="MultiplicacionFila('cantpollobbventa','eclosionpesadas')"></td>
    <td class="celdaCelesteClaro"><input name="eclosionpesadas5" type="text"  id="eclosionpesadas5" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola5']->get_eclosionpesadas(); ?>" <?php if($aux<=0){ echo 'readOnly'; echo ' class="boxBusqueda4m"';}else{echo ' class="boxBusqueda4"';} ?> onChange="MultiplicacionFila('cantpollobbventa','eclosionpesadas')"></td>
    </tr>
  <tr align="center" >
    <td align="left" class="celdaCelesteClaro">Porcentaje de eclosión (30% base)
      Reproductoras LIVIANAS</td>
    <td align="left" class="celdaCelesteClaro"><input type="radio" name="grupo" value="eclosionlivianas" id="eclosionlivianas" onChange="HabilitarFila(this,'eclosionlivianas','eclosionpesadas')" <?php $aux1=$_SESSION['avicola0']->get_eclosionlivianas(); if($aux1>0){ echo 'checked' ;} ?> ></td>
    <td class="celdaCelesteClaro"><input name="eclosionlivianas0" type="text"  id="eclosionlivianas0" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo $_SESSION['avicola0']->get_eclosionlivianas(); ?>" <?php if($aux1<=0){ echo 'readOnly'; echo ' class="boxBusqueda4m"';}else{echo ' class="boxBusqueda4"';} ?>></td>
    <td class="celdaCelesteClaro" align="left">Porcentaje de eclosión 
      REPRODUCTORAS LIVIANAS</td>
    <td class="celdaCelesteClaro"><input name="eclosionlivianas1" type="text" id="eclosionlivianas1" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo $_SESSION['avicola1']->get_eclosionlivianas(); ?>" <?php if($aux1<=0){ echo 'readOnly'; echo ' class="boxBusqueda4m"';}else{echo ' class="boxBusqueda4"';} ?>></td>
    <td class="celdaCelesteClaro"><input name="eclosionlivianas2" type="text" id="eclosionlivianas2" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo $_SESSION['avicola2']->get_eclosionlivianas(); ?>" <?php if($aux1<=0){ echo 'readOnly'; echo ' class="boxBusqueda4m"';}else{echo ' class="boxBusqueda4"';} ?> onChange="MultiplicacionFila('cantpollobbventa','eclosionlivianas')"></td>
    <td class="celdaCelesteClaro"><input name="eclosionlivianas3" type="text" id="eclosionlivianas3" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola3']->get_eclosionlivianas(); ?>" <?php if($aux1<=0){ echo 'readOnly'; echo ' class="boxBusqueda4m"';}else{echo ' class="boxBusqueda4"';} ?> onChange="MultiplicacionFila('cantpollobbventa','eclosionlivianas')"></td>
    <td class="celdaCelesteClaro"><input name="eclosionlivianas4" type="text" id="eclosionlivianas4" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola4']->get_eclosionlivianas(); ?>" <?php if($aux1<=0){ echo 'readOnly'; echo ' class="boxBusqueda4m"';}else{echo ' class="boxBusqueda4"';} ?> onChange="MultiplicacionFila('cantpollobbventa','eclosionlivianas')"></td>
    <td class="celdaCelesteClaro"><input name="eclosionlivianas5" type="text" id="eclosionlivianas5" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola5']->get_eclosionlivianas(); ?>" <?php if($aux1<=0){ echo 'readOnly'; echo ' class="boxBusqueda4m"';}else{echo ' class="boxBusqueda4"';} ?> onChange="MultiplicacionFila('cantpollobbventa','eclosionlivianas')"></td>
    </tr>
  <tr align="center" >
    <td colspan="2" align="left" class="celdaCelesteClaro">Cantidad de pollos bb a la venta/año</td>
    <td class="celdaCelesteClaro">
      <input name="cantpollobbventa0" type="text" class="boxBusqueda4" id="cantpollobbventa0" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo $_SESSION['avicola0']->get_cantpollobbventa(); ?>" onChange="HabilitarFila(this,'eclosionlivianas','eclosionpesadas')"  >  </td>
    <td class="celdaCelesteClaro" align="left">Cantidad de pollos bb a la venta/año</td>
    <td class="celdaCelesteClaro">
      <input name="cantpollobbventa1" type="text" class="boxBusqueda4m" id="cantpollobbventa1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo $_SESSION['avicola1']->get_cantpollobbventa(); ?>" readonly> </td>
    <td class="celdaCelesteClaro">
      <input name="cantpollobbventa2" type="text" class="boxBusqueda4" id="cantpollobbventa2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola2']->get_cantpollobbventa(); ?>" readonly> </td>
    <td class="celdaCelesteClaro">
      <input name="cantpollobbventa3" type="text" class="boxBusqueda4" id="cantpollobbventa3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola3']->get_cantpollobbventa(); ?>" readonly> </td>
    <td class="celdaCelesteClaro">
      <input name="cantpollobbventa4" type="text" class="boxBusqueda4" id="cantpollobbventa4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola4']->get_cantpollobbventa(); ?>" readonly> </td>
    <td class="celdaCelesteClaro">
      <input name="cantpollobbventa5" type="text" class="boxBusqueda4" id="cantpollobbventa5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola5']->get_cantpollobbventa(); ?>" readonly> </td>
  </tr>
  <tr align="center" class="taulaH" >
    <td height="6" colspan="3" align="left" ></td>
    <td colspan="6" align="left" ></td>
    </tr>
  <tr align="center" >
    <td colspan="2" align="left" class="celdaCelesteClaro">Porcentaje Mortalidad (10% base)
      PARRILLEROS</td>
    <td class="celdaCelesteClaro"><input name="mortalidadparrillero0" type="text" class="boxBusqueda4" id="mortalidadparrillero0" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola0']->get_mortalidadparrillero(); ?>" ></td>
    <td class="celdaCelesteClaro" align="left">Porcentaje Mortalidad (%) PARRILLEROS</td>
    <td class="celdaCelesteClaro"><input name="mortalidadparrillero1" type="text" class="boxBusqueda4m" id="mortalidadparrillero1" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola1']->get_mortalidadparrillero(); ?>" readonly></td>
    <td class="celdaCelesteClaro"><input name="mortalidadparrillero2" type="text" class="boxBusqueda4" id="mortalidadparrillero2" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola2']->get_mortalidadparrillero(); ?>" onChange="MultiplicacionFila('cantpolloventa','mortalidadparrillero')" ></td>
    <td class="celdaCelesteClaro"><input name="mortalidadparrillero3" type="text" class="boxBusqueda4" id="mortalidadparrillero3" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola3']->get_mortalidadparrillero(); ?>" onChange="MultiplicacionFila('cantpolloventa','mortalidadparrillero')"></td>
    <td class="celdaCelesteClaro"><input name="mortalidadparrillero4" type="text" class="boxBusqueda4" id="mortalidadparrillero4" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola4']->get_mortalidadparrillero(); ?>" onChange="MultiplicacionFila('cantpolloventa','mortalidadparrillero')"></td>
    <td class="celdaCelesteClaro"><input name="mortalidadparrillero5" type="text" class="boxBusqueda4" id="mortalidadparrillero5" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola5']->get_mortalidadparrillero(); ?>" onChange="MultiplicacionFila('cantpolloventa','mortalidadparrillero')"></td>
  </tr>
  <tr align="center" >
    <td colspan="2" align="left" class="celdaCelesteClaro">Cantidad de pollos a la venta/año</td>
    <td class="celdaCelesteClaro"><input name="cantpolloventa0" type="text" class="boxBusqueda4" id="cantpolloventa0" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo $_SESSION['avicola0']->get_cantpolloventa(); ?>" onChange="MultiplicacionFila('cantpolloventa','mortalidadparrillero')" ></td>
    <td class="celdaCelesteClaro" align="left">Cantidad de pollos a la venta/año</td>
    <td class="celdaCelesteClaro"><input name="cantpolloventa1" type="text" class="boxBusqueda4m" id="cantpolloventa1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola1']->get_cantpolloventa(); ?>" readonly></td>
    <td class="celdaCelesteClaro"><input name="cantpolloventa2" type="text" class="boxBusqueda4" id="cantpolloventa2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola2']->get_cantpolloventa(); ?>" readonly></td>
    <td class="celdaCelesteClaro"><input name="cantpolloventa3" type="text" class="boxBusqueda4" id="cantpolloventa3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola3']->get_cantpolloventa(); ?>" readonly></td>
    <td class="celdaCelesteClaro"><input name="cantpolloventa4" type="text" class="boxBusqueda4" id="cantpolloventa4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola4']->get_cantpolloventa(); ?>" readonly></td>
    <td class="celdaCelesteClaro"><input name="cantpolloventa5" type="text" class="boxBusqueda4" id="cantpolloventa5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola5']->get_cantpolloventa(); ?>" readonly></td>
    </tr>
  
  <tr align="center" class="taulaH">
    <td colspan="3" height="6" align="left"></td>
    <td colspan="6" align="left"></td>
    </tr>
  <tr align="center" class="celdaCelesteClaro">
    <td colspan="2" align="left">Porcentaje Postura (80% base)
      PONEDORAS</td>
    <td><input name="posturaponedoras0" type="text" class="boxBusqueda4" id="posturaponedoras0" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola0']->get_posturaponedoras(); ?>"></td>
    <td align="left">Porcentaje Postura (%) PONEDORAS</td>
    <td><input name="posturaponedoras1" type="text" class="boxBusqueda4m" id="posturaponedoras1" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola1']->get_posturaponedoras(); ?>"></td>
    <td><input name="posturaponedoras2" type="text" class="boxBusqueda4" id="posturaponedoras2" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola2']->get_posturaponedoras(); ?>" onChange="MultiplicacionFila('canthuevoventa','posturaponedoras')"></td>
    <td><input name="posturaponedoras3" type="text" class="boxBusqueda4" id="posturaponedoras3" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola3']->get_posturaponedoras(); ?>" onChange="MultiplicacionFila('canthuevoventa','posturaponedoras')"></td>
    <td><input name="posturaponedoras4" type="text" class="boxBusqueda4" id="posturaponedoras4" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola4']->get_posturaponedoras(); ?>" onChange="MultiplicacionFila('canthuevoventa','posturaponedoras')"></td>
    <td><input name="posturaponedoras5" type="text" class="boxBusqueda4" id="posturaponedoras5" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola5']->get_posturaponedoras(); ?>" onChange="MultiplicacionFila('canthuevoventa','posturaponedoras')"></td>
  </tr>
  
  <tr align="center" class="celdaCelesteClaro">
    <td colspan="2" align="left">Cantidad de huevos a la venta/año</td>
    <td class="opcion"><span class="celdaCelesteClaro">
      <input name="canthuevoventa0" type="text" class="boxBusqueda4" id="canthuevoventa0" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola0']->get_canthuevoventa(); ?>" onChange="MultiplicacionFila('canthuevoventa','posturaponedoras')">
    </span></td>
    <td align="left">Cantidad de huevos a la venta/año</td>
    <td class="opcion"><span class="celdaCelesteClaro">
      <input name="canthuevoventa1" type="text" class="boxBusqueda4m" id="canthuevoventa1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola1']->get_canthuevoventa(); ?>" readonly>
    </span></td>
    <td class="opcion"><span class="celdaCelesteClaro">
      <input name="canthuevoventa2" type="text" class="boxBusqueda4" id="canthuevoventa2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola2']->get_canthuevoventa(); ?>" readonly>
    </span></td>
    <td class="opcion"><span class="celdaCelesteClaro">
      <input name="canthuevoventa3" type="text" class="boxBusqueda4" id="canthuevoventa3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola3']->get_canthuevoventa(); ?>" readonly>
    </span></td>
    <td class="opcion"><span class="celdaCelesteClaro">
      <input name="canthuevoventa4" type="text" class="boxBusqueda4" id="canthuevoventa4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola4']->get_canthuevoventa(); ?>" readonly>
    </span></td>
    <td class="opcion"><span class="celdaCelesteClaro">
      <input name="canthuevoventa5" type="text" class="boxBusqueda4" id="canthuevoventa5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola5']->get_canthuevoventa(); ?>" readonly>
    </span></td>
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