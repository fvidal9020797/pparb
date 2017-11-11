<?php
include "../Clases/SuperficieRegistro.php";
session_start();
include "../cabecera.php";
include "FuncionesRegistro.php";
include "page_bosques.php";

if(isset($_SESSION['datos_pago'])){unset($_SESSION['datos_pago']);}
if(isset($_SESSION['sup_deforestadaPago'])){unset($_SESSION['sup_deforestadaPago']);}

//print_r($_SESSION);
?>
<HTML>
<HEAD><TITLE>Llenado de Datos Contratos</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<LINK href="../css/mdryt.css" type=text/css rel=stylesheet>
<link rel="stylesheet" type="text/css" href="../css/button.css"/>
<script language="JavaScript" src="../scripts/funciones.js?aux=1"></script>
<script language="JavaScript" src="../scripts/FuncionesBosques.js?aux=1"></script>
<script language="JavaScript">
function lanzarSubmenu1(){
   window.open("especies.php","Elegir Especies","width=430,height=600,scrollbars=YES,toolbar=no,status=no");
}

function lanzarSubmenu2(){
   window.open("elegir_sel.php","Elegir SEL","width=500,height=270,scrollbars=AUTO,toolbar=no,status=no");
}

function abrirCenso(){
   window.open("especiescenso.php","Elegir Especies","width=430,height=600,scrollbars=AUTO,toolbar=no,status=no");
}


function habilitarescenario(seleccion,identificador) {  //TPFP =1 superficie es tpfp
	try
    {
		  if (seleccion.checked)
      {
			   document.getElementById(String(identificador)).style.display = "block";
			  // alert(document.getElementById(String(identificador)).value);
		  }
      else
      {
        document.getElementById(String(identificador)).style.display = "none";
        document.getElementById(String(identificador+'f')).style.display = "none";
        document.getElementById(identificador+'f1').checked = "";
      }

		}
    catch(e)
     {
			alert(e);
		}
	}



  function habilitarfueraregular(seleccion,identificador) {  //TPFP =1 superficie es tpfp
  	try
      {

        if (seleccion.checked)
        {
             document.getElementById(String(identificador)).style.display = "table-row";
  		  }
        else
        {
             document.getElementById(String(identificador)).style.display = "none";
        }

  		}
      catch(e)
      {
  			alert(e);
  		}

}



function calcular321(celda1,celda2,celda3,celda4)
{
  try {
        var valorcelda = document.getElementById(celda1).value;
        var cantidad=(valorcelda/2);
        document.getElementById(celda2).value=cantidad;
        document.getElementById(celda3).value=cantidad;
        document.getElementById(celda4).value= Math.round(cantidad * 64);
      }catch(e) {
        alert(e);
    }
}



function calcular322(celda1,celda2)
{
  try {
        var valorcelda = document.getElementById(celda1).value;
        document.getElementById(celda2).value= Math.round(valorcelda * 38);
      }catch(e) {
        alert(e);
    }
}


function calcular342(celda1,celda2)
{
    try {
          var valorcelda = document.getElementById(celda1).value;
          document.getElementById(celda2).value= Math.round(valorcelda * 38);
        }catch(e) {
          alert(e);
      }
}





function calcularescenariotres(valor1,valor2,valor3)
{
  try {
        var valorcelda = document.getElementById(valor1).value;
        document.getElementById(valor2).value= Math.round(valorcelda * 26);
        document.getElementById(valor3).value= Math.round(valorcelda * 38);
      }catch(e) {
        alert(e);
    }
}



</script>
</HEAD>
<?php
include_once('../scripts/body_handler.inc.php');
?>
<body>
<div align="center" >
<form action="N_Bosques.php" method="POST" name="formulario"  autocomplete="off"  enctype="multipart/form-data">
<b class="texto"><big>II. RESTITUCION DE BOSQUES</big><br> Predio: <?php echo $_SESSION['nombre_predio'];?> Código: <?php echo $_SESSION['cod_parcela'];?> </b>
<table width="95%" border="0" class='taulaA'  align="center" cellspacing="0">
  <tr>
    <td colspan="5" id="blau"><span class="taulaH">1. Datos Area Deforestada Ilegal y a Reforestar</span></td>
  </tr>
  <tr id="blau">

    <td colspan="2" align="left" class="<?php if(isset($_SESSION['mensaje'])&& isset($_SESSION['verde'])){ if( $_SESSION['verde']==0){echo "celdaRojo";}else{echo "celdaAmarilla";}}?>" ><?php if(isset($_SESSION['mensaje'])){echo $_SESSION['mensaje']; if($_SESSION['superficie337']->get_supreftpfp()>0 && $_SESSION['verde']==1){echo " - SI ESTE PREDIO FUE REGISTRADO CON UNA VERSION ANTERIOR DEL SISTEMA, HAGA CLICK EN GUARDAR PARA QUE SE APLIQUE EL CAMBIO";}}?></td>
    <td width="23%" align="right">Superficie Total Predio:</td>
    <td width="23%"><input name="Superficie" type="text" class="boxBusqueda4m" id="Superficie"  onFocus="siguienteCampo ='FechaFin'" maxlength="10" value="<?php echo isset($_SESSION['datos_bosque']['Superficie']) ? htmlspecialchars($_SESSION['datos_bosque']['Superficie']) : $row_predio['superficie'];?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly >
      <input type="hidden" name="TipoProp" id="TipoProp" value="<?php echo isset($_SESSION['datos_bosque']['TipoProp']) ? htmlspecialchars($_SESSION['datos_bosque']['TipoProp']) : $row_predio['nombrecodificador']?>"></td>
    <td width="18%">&nbsp;</td>

  </tr>
  <tr >
    <td colspan="5"><table width="100%" border="0" cellspacing="2" cellpadding="0" >
      <tr >
        <td ><table width="100%" border="0" cellspacing="0" cellpadding="0" >
          <tr  >
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="taulaA">
                <tr > </tr>
                <tr >
                  <td colspan="3" class="cabecera2" >1.1. Area Deforestada Ilegal y a Reforestar ley 337.</td>
                </tr>
                <tr class="TituloCajaNegocios">
                  <td width="33%" >Superficie Deforestada Ilegal: (Ha)</td>
                  <td colspan="2"><input type="text" name="supdefilegal" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie337']->get_suptotal();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supdefilegal">
                    (A=B+C)</td>
                </tr>
                <tr >
                  <td ><div align="left">Tierras de Producción Permanente (TPFP)(Ha):</div></td>
                  <td width="17%" ><input type="text" name="suptpfp" class="boxBusqueda4" value="<?php echo $_SESSION['superficie337']->get_suptpfp();?>"  onChange="document.getElementById('action').value=1;document.forms[0].submit();" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  id="suptpfp">
                    (B)</td>
                  <td width="50%"   align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="taulaA">
                      <tr id="blau13" >
                        <td width="59%">Rest. TPFP(&gt;= 10%)(Ha):</td>
                        <td width="41%"><input type="text" name="supreftpfp" id="supreftpfp" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie337']->get_supreftpfp();?>" onChange="document.forms[0].submit()" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  >
                          (B1)</td>
                      </tr>
                      <tr >
                        <td>SEL a Reforestar(Ha):</td>
                        <td><input type="text" name="supselstpfpref" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie337']->get_supselstpfpref();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supselstpfpref">
                          (B2)</td>
                      </tr>
                      <tr id="blau13" >
                        <td>Mejoras(Ha): </td>
                        <td><input type="text" name="supmejorastpfp" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie337']->get_supmejoratpfp();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supmejorastpfp">
                          (B3)</td>
                      </tr>
                  </table></td>
                </tr>
                <tr class="TituloCajaNegocios" >
                  <td id="blau15"><div align="left">Tierras de Uso Múltiple (TUM)(Ha):</div></td>
                  <td id="blau15"><input type="text" name="suptum" class="boxBusqueda4" onChange="document.forms[0].submit()"  value="<?php echo $_SESSION['superficie337']->get_suptum();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" id="suptum">
                    (C)</td>
                  <td  align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="taulaA">
                      <tr>
                        <td class="TituloCajaNegocios">Restitución TUM (Ha):</td>
                        <td class="TituloCajaNegocios"><input type="text" name="supreftum" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie337']->get_supreftum();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supreftum">
                          (C1)</td>
                      </tr>
                      <tr>
                        <td class="TituloCajaNegocios">SEL a Reforestar (Ha):</td>
                        <td class="TituloCajaNegocios"><input type="text" name="supselstumref" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie337']->get_supselstumref();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supselstumref">
                          (C2)</td>
                      </tr>
                      <tr id="blau16">
                        <td width="170" class="TituloCajaNegocios">Mejoras (Ha):</td>
                        <td width="118" class="TituloCajaNegocios"><input type="text" name="supmejorastum" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie337']->get_supmejoratum();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supmejorastum">
                          (C3)</td>
                      </tr>
                  </table></td>
                </tr>
            </table></td>
          </tr>
        </table></td>
        <?php if($_SESSION['Causal']==2){ ?>
        <td width="50%"><table  border="0">
          <tr  >
            <td><table border="0" cellspacing="0" cellpadding="0" class="taulaA">

                <tr >
                  <td colspan="3" class="cabecera2" >1.1. Area con Proceso Administrativo Sancionatorio.</td>
                </tr>
                <tr class="TituloCajaNegocios">
                  <td width="33%" >Superficie P.A.S: (Ha)</td>
                  <td colspan="2">                    <input type="text" name="suppas" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie502']->get_suptotal();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="suppas">
                    (A'=B'+C')</td>
                </tr>
                <tr >
                  <td ><div align="left">Tierras de Producción Permanente (TPFP)(Ha):</div></td>
                  <td width="18%" ><input type="text" name="suptpfppas" class="boxBusqueda4" onChange="document.getElementById('action').value=2;document.forms[0].submit();" value="<?php echo $_SESSION['superficie502']->get_suptpfp();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  id="suptpfppas">
                    (B')</td>
                  <td width="49%"   align="center"><table width="100%"   border="0" cellspacing="0" cellpadding="0" class="taulaA">
                      <tr id="blau14" >
                        <td width="56%">Rest. TPFP (&gt;= 10%)(Ha):</td>
                        <td width="44%"><input type="text" name="supreftpfppas" id="supreftpfppas" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie502']->get_supreftpfp();?>" onChange="document.forms[0].submit()" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  >
                          (B1)</td>
                      </tr>
                      <tr >
                        <td>SEL a Reforestar(Ha):</td>
                        <td><input type="text" name="supselstpfprefpas" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie502']->get_supselstpfpref();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supselstpfprefpas">
                          (B2)</td>
                      </tr>
                      <tr id="blau14" >
                        <td>Mejoras(Ha): </td>
                        <td><input type="text" name="supmejorastpfppas" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie502']->get_supmejoratpfp();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supmejorastpfppas">
                          (B3)</td>
                      </tr>
                  </table></td>
                </tr>
                <tr class="TituloCajaNegocios" >
                  <td id="blau17"><div align="left">Tierras de Uso Múltiple (TUM)(Ha):</div></td>
                  <td id="blau17"><input type="text" name="suptumpas" class="boxBusqueda4" onChange="document.forms[0].submit()"  value="<?php echo $_SESSION['superficie502']->get_suptum();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" id="suptumpas">
                    (C')</td>
                  <td  align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="taulaA">
                      <tr>
                        <td class="TituloCajaNegocios">Restitución TUM (Ha):</td>
                        <td class="TituloCajaNegocios"><input type="text" name="supreftumpas" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie502']->get_supreftum();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supreftumpas">
                          (C1)</td>
                      </tr>
                      <tr>
                        <td class="TituloCajaNegocios">SEL a Reforestar(Ha):</td>
                        <td class="TituloCajaNegocios"><input type="text" name="supselstumrefpas" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie502']->get_supselstumref();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supselstumrefpas">
                          (C2)</td>
                      </tr>
                      <tr id="blau18">
                        <td width="56%" class="TituloCajaNegocios">Mejoras(Ha):</td>
                        <td width="118" class="TituloCajaNegocios"><input type="text" name="supmejorastumpas" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie502']->get_supmejoratum();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supmejorastumpas">
                          (C3)</td>
                      </tr>
                  </table></td>
                </tr>

                      </table></td>
          </tr>
        </table></td>
      </tr>
      <?php } //fin PAS?>
      <tr width="50%">
        <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="taulaA">
          <tr >
            <td colspan="6" ></td>
          </tr>

  <tr >
    <td colspan="6" class="cabecera2" >1.2 Superfie Deforestada Ilegal para la Produccion de Alimentos</td>
  </tr>
  <tr  class="TituloCajaNegocios">
    <td width="29%"  ><div align="right">Superficie para Producción de Alimentos: (Ha)</div></td>
    <td width="21%" ><input type="text" name="supprodali" class="boxBusqueda4m"
    value="<?php if(!isset($_SESSION['datos_bosque'])){echo $row_supali['supregistro'];}
	             elseif(isset($_SESSION['Causal']) && $_SESSION['Causal']==2){echo $_SESSION['superficie337']->get_supproali()+$_SESSION['superficie502']->get_supproali();}
				 else{ echo $_SESSION['superficie337']->get_supproali(); }?>"
    onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supprodali">
      <?php if($_SESSION['Causal']==2){ echo "(E)=(E1+E2+E3+E4)";}else{ echo "(E)=(E1+E2)"; }?></td>
    <td width="50%" colspan="3" ><table width="450" border="0" cellspacing="0" cellpadding="0" class="taulaA" >
      <tr id="blau11" class="TituloCajaNegocios">
        <td >En TPFP (Ha):</td>
        <td ><input type="text" name="supalitpfp" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie337']->get_supalitpfp();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supalitpfp">
          (E1)=(B-B1-B2-B3)</td>
      </tr>
      <tr id="blau11" class="TituloCajaNegocios">
        <td>En Tierras de Uso Múltiple(Ha):</td>
        <td><input type="text" name="supalitum" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie337']->get_supalitum();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supalitum">
          (E2)=(C-C1-C2-C3)</td>
      </tr>
      <?php if($_SESSION['Causal']==2){ ?>
      <tr class="TituloCajaNegocios">
        <td>Superficie TPFP P.A.S.(Ha):</td>
        <td><input type="text" name="supalitpfppas" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie502']->get_supalitpfp();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supalitpfppas">
          (E3)=(B'-B'1-B'2-B'3)</td>
      </tr>
      <tr id="blau11" class="TituloCajaNegocios">
        <td>Superficie TUM P.A.S.(Ha):</td>
        <td><input type="text" name="supalitumpas" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie502']->get_supalitum();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supalitumpas">
          (E4)=(C'-C'1-C'2-C'3)</td>
      </tr>
      <?php }?>
    </table></td>
  </tr>
        </table></td>
        </tr>
    </table>      </td>
    </tr>
  <tr>
    <td colspan="5"><hr></td>
  </tr>

  <tr>
    <td colspan="5" align="center" id='blau'><table width="100%" border="0" cellspacing="0" cellpadding="0">

      <tr>
        <td height="12"><span class="taulaH">2. Servidumbres Ecológicas Legales</span></td>
        <td><span class="taulaH">3. Mejoras</span></td>
      </tr>
      <tr>
        <td width="55%" height="108">

        <p><span class="borderLBRgris">
          <input type='image' src='../images/adda.gif' title="Agregar SEL" alt='SEL' border='1' onClick='lanzarSubmenu2();return false;'>
          </span>
                  <input name="submit3" type="button" class='cabecera2' value="Eliminar SEL" onClick="deleteRow('sels');document.forms[0].submit();">
                  <input type="hidden" name="conteoSEL" id="conteoSEL" value="<?php echo isset($_SESSION['datos_bosque']['conteoSEL']) ? htmlspecialchars($_SESSION['datos_bosque']['conteoSEL']) : $totalRows_SELS ?>">
        </p>

              <table width="96%" border="1" cellspacing="0" cellpadding="0" class="taulaA" id="sels">
                <tr align="center">
                  <td class="cabecera2">&nbsp;</td>
                  <td rowspan="2" class="cabecera2">TIPO DE SERVIDUMBRE</td>
                  <td colspan="2" class="cabecera2">SEL DEFORESTADA ILEGAL</td>
                 <?php if($_SESSION['Causal']==2){  ?>
                  <td colspan="2" class="cabecera2">SEL PAS</td>
                 <?php } ?>
                  <td rowspan="2" class="cabecera2">RESTITUCION / CONSERVACION</td>
                </tr>
                <tr align="center">
                  <td class="cabecera2">&nbsp;</td>

                  <td class="cabecera2">SUPERFICIE EN TPFP</td>
                  <td class="cabecera2">SUPERFICIE EN TUM </td>
                  <?php if($_SESSION['Causal']==2){  ?>
                  <td class="cabecera2">SUPERFICIE EN TPFP PAS</td>
                  <td class="cabecera2">SUPERFICIE EN TUM PAS</td>
                  <?php } ?>
                  </tr>
                <?php  if(isset($_SESSION['datos_bosque']['conteoSEL']))
						 {$num=$_SESSION['datos_bosque']['conteoSEL'];}
						 else
						 {$num=$totalRows_SELS;}

		 for ($i = 1; $i <=$num ; $i++) {
		 if(isset($_SESSION['datos_bosque']['idtiposel'.$i]) || isset($row_Sels['idtiposel'])){

		 ?>
                <tr >
                  <td width="22"><input type="checkbox" name="chk"/></td>
                  <td width="304"><input name="<?php echo 'nombsel'.$i; ?>" type="text" readonly class="boxBusqueda"  value="<?php echo isset($_SESSION['datos_bosque']['nombsel'.$i]) ? htmlspecialchars($_SESSION['datos_bosque']['nombsel'.$i]) : trim($row_Sels['nombrecodificador']) ;?> "></td>

                  <td  width="95"><input name="<?php echo 'supseltpfp'.$i; ?>" type="text" class="boxBusqueda4" value="<?php echo isset($_SESSION['datos_bosque']['supseltpfp'.$i]) ? htmlspecialchars($_SESSION['datos_bosque']['supseltpfp'.$i]) : trim($row_Sels['supseltpfp']) ?>" onChange="document.forms[0].submit()" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"></td>
                  <td  width="88"><input name="<?php echo 'supseltum'.$i; ?>" type="text" class="boxBusqueda4" value="<?php echo isset($_SESSION['datos_bosque']['supseltum'.$i]) ? htmlspecialchars($_SESSION['datos_bosque']['supseltum'.$i]) : trim($row_Sels['supseltum']) ?>" onChange="document.forms[0].submit()" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"></td>
                  <?php if($_SESSION['Causal']==2){  ?>
                  <td  width="84"><input name="<?php echo 'supseltpfppas'.$i; ?>" type="text" class="boxBusqueda4" value="<?php echo isset($_SESSION['datos_bosque']['supseltpfppas'.$i]) ? htmlspecialchars($_SESSION['datos_bosque']['supseltpfppas'.$i]) : trim($row_Sels['supseltpfppas']) ?>" onChange="document.forms[0].submit()" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"></td>
                  <td  width="83"><input name="<?php echo 'supseltumpas'.$i; ?>" type="text" class="boxBusqueda4" value="<?php echo isset($_SESSION['datos_bosque']['supseltumpas'.$i]) ? htmlspecialchars($_SESSION['datos_bosque']['supseltumpas'.$i]) : trim($row_Sels['supseltumpas']) ?>" onChange="document.forms[0].submit()" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"></td>
                  <?php } ?>
                  <td width="507"><select name="<?php echo 'tiposel'.$i; ?>" class="combos" id="<?php echo 'tiposel'.$i; ?>"  onChange="document.forms[0].submit()" >
                      <?php
			 	 ///cambiar este codigo
				$sql_clasificador ="Select * From codificadores Where idclasificador=15 Order by nombrecodificador";
				$clasificador = pg_query($cn,$sql_clasificador) ;
				$row_clasificador = pg_fetch_array ($clasificador);

		  do {   ?>
                <option value="<?php echo $row_clasificador['idcodificadores']?>"
                <?php  if(isset($_SESSION['datos_bosque']['tiposel'.$i])&&($_SESSION['datos_bosque']['tiposel'.$i]== $row_clasificador['idcodificadores'])){
											echo " selected";
						}elseif(isset($row_Sels['idtiposel']) && $row_Sels['idtiposel']== $row_clasificador['idcodificadores']){	echo " selected";}?>
                 > <?php echo $row_clasificador['nombrecodificador']?></option>
                      <?php } while ($row_clasificador = pg_fetch_assoc($clasificador));?>
                    </select>
                <input type="hidden" name="<?php echo 'idtiposel'.$i; ?>" id="<?php echo 'idtiposel'.$i; ?>" value="<?php echo isset($_SESSION['datos_bosque']['idtiposel'.$i]) ? htmlspecialchars($_SESSION['datos_bosque']['idtiposel'.$i]) : trim($row_Sels['idparametrica']) ?>">
                </td>
                  <?php if(!isset($_SESSION['datos_bosque']['conteoSELs']) && isset($row_Sels)){$row_Sels = pg_fetch_assoc($Sels);}
		 }} ?>
                </tr>
              </table>          </td>
        <td width="35%">
          <table  border="1" cellspacing="0" cellpadding="0">
          <tr>
            <td colspan="2" rowspan="2" align="right" class="cabecera2">&nbsp;</td>
            <td colspan="2" align="center" class="cabecera2">AREA DEFORESTADA ILEGAL</td>
           <?php if($_SESSION['Causal']==2){  ?>
            <td colspan="2" align="center" class="cabecera2">MEJORA   P.A.S.</td>
            <?php } ?>
          </tr>
          <tr>
            <td class="cabecera2">Mejora TPFP</td>
            <td class="cabecera2">Mejora TUM</td>
            <?php if($_SESSION['Causal']==2){  ?>
            <td class="cabecera2">Mejora TPFP</td>
            <td class="cabecera2">Mejora TUM</td>
            <?php } ?>
          </tr>
          <?php

	$sql_mejora = "Select * From codificadores Where idclasificador=24 Order by nombrecodificador";
    $mejora = pg_query($cn,$sql_mejora) ;
	$row_mejora = pg_fetch_array ($mejora);

do{
	  $valor=$row_mejora['idcodificadores'];
	  if(!isset($_SESSION['datos_bosque'])){
			$sql_mejoras = "SELECT mejora.* FROM mejora WHERE mejora.idregistro=".$_SESSION['idreg']." and mejora.idmejora=".$valor;
			$mejoras = pg_query($cn,$sql_mejoras);
			$row_mejoras = pg_fetch_array ($mejoras);
			$totalRows_mejoras = pg_num_rows($mejoras);
	  }
    ?>
          <tr >
            <td id="blau" class="taulaA"><?php echo $row_mejora['nombrecodificador'];?></td>
            <td  id="blau"><input type="checkbox"  onChange="habilitarmejoras(this,'<?php echo $row_mejora['idcodificadores'];?>',<?php echo $_SESSION['Causal'] ?>)" <?php if(isset($_SESSION['datos_bosque']["chk".$row_mejora['idcodificadores']])){echo 'checked';}elseif(isset($totalRows_mejoras) && $row_mejoras['idmejora']==$row_mejora['idcodificadores']){echo 'checked';}?>  name="<?php echo "chk".$row_mejora['idcodificadores'];?>"/></td>
            <td  id="blau">
            <input type="text" name="<?php echo "supmejoratpfp".$row_mejora['idcodificadores'];?>" id="<?php echo "supmejoratpfp".$row_mejora['idcodificadores'];?>"
			<?php if( !isset($_SESSION['datos_bosque']["chk".$row_mejora['idcodificadores']]) ){
			        if(isset($totalRows_mejoras) && $row_mejoras['idmejora']!=$row_mejora['idcodificadores']){echo 'disabled'; echo " class='boxBusqueda4m'";}
				    elseif(isset($totalRows_mejoras)){echo "class='boxBusqueda4'"; }
					else{ echo "class='boxBusqueda4m'";}
				  }else{echo "class='boxBusqueda4'"; }
				 ?>
            onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="document.forms[0].submit()"
            value="<?php if(isset($_SESSION['datos_bosque']["supmejoratpfp".$valor])) { echo $_SESSION['datos_bosque']["supmejoratpfp".$valor];} elseif( isset($row_mejoras['idmejora']) && $row_mejoras['idmejora']==$row_mejora['idcodificadores'] ){ echo $row_mejoras['supmejoratpfp'];} ?>" >            </td>

            <td id="blau"><input type="text" name="<?php echo "supmejoratum".$row_mejora['idcodificadores'];?>" id="<?php echo "supmejoratum".$row_mejora['idcodificadores'];?>"
			<?php if( !isset($_SESSION['datos_bosque']["chk".$row_mejora['idcodificadores']]) ){
			        if(isset($totalRows_mejoras) && $row_mejoras['idmejora']!=$row_mejora['idcodificadores']){echo 'disabled'; echo " class='boxBusqueda4m'";}
				    elseif(isset($totalRows_mejoras)){echo "class='boxBusqueda4'"; }
					else{ echo "class='boxBusqueda4m'";}
				  }else{echo "class='boxBusqueda4'"; }
				 ?>
            onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="document.forms[0].submit()"
            value="<?php if(isset($_SESSION['datos_bosque']["supmejoratum".$valor])) { echo $_SESSION['datos_bosque']["supmejoratum".$valor];} elseif( isset($row_mejoras['idmejora']) && $row_mejoras['idmejora']==$row_mejora['idcodificadores'] ){ echo $row_mejoras['supmejoratum'];} ?>" > </td>
            <?php if($_SESSION['Causal']==2){  ?>

            <td  id="blau"><input type="text" name="<?php echo "supmejoratpfppas".$row_mejora['idcodificadores'];?>" id="<?php echo "supmejoratpfppas".$row_mejora['idcodificadores'];?>"
			<?php if( !isset($_SESSION['datos_bosque']["chk".$row_mejora['idcodificadores']]) ){
			        if(isset($totalRows_mejoras) && $row_mejoras['idmejora']!=$row_mejora['idcodificadores']){echo 'disabled'; echo " class='boxBusqueda4m'";}
				    elseif(isset($totalRows_mejoras)){echo "class='boxBusqueda4'"; }
					else{ echo "class='boxBusqueda4m'";}
				  }else{echo "class='boxBusqueda4'"; }
				 ?>
            onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="document.forms[0].submit()"
            value="<?php if(isset($_SESSION['datos_bosque']["supmejoratpfppas".$valor])) { echo $_SESSION['datos_bosque']["supmejoratpfppas".$valor];} elseif( isset($row_mejoras['idmejora']) && $row_mejoras['idmejora']==$row_mejora['idcodificadores'] ){ echo $row_mejoras['supmejoratpfppas'];} ?>" ></td>

            <td id="blau"><input type="text" name="<?php echo "supmejoratumpas".$row_mejora['idcodificadores'];?>" id="<?php echo "supmejoratumpas".$row_mejora['idcodificadores'];?>"
			<?php if( !isset($_SESSION['datos_bosque']["chk".$row_mejora['idcodificadores']]) ){
			        if(isset($totalRows_mejoras) && $row_mejoras['idmejora']!=$row_mejora['idcodificadores']){echo 'disabled'; echo " class='boxBusqueda4m'";}
				    elseif(isset($totalRows_mejoras)){echo "class='boxBusqueda4'"; }
					else{ echo "class='boxBusqueda4m'";}
				  }else{echo "class='boxBusqueda4'"; }
				 ?>
            onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="document.forms[0].submit()"
            value="<?php if(isset($_SESSION['datos_bosque']["supmejoratumpas".$valor])) { echo $_SESSION['datos_bosque']["supmejoratumpas".$valor];} elseif( isset($row_mejoras['idmejora']) && $row_mejoras['idmejora']==$row_mejora['idcodificadores'] ){ echo $row_mejoras['supmejoratumpas'];} ?>" ></td>
            <?php } ?>

          </tr>
 <?php  } while ($row_mejora = pg_fetch_assoc($mejora));?>
        </table></td>
      </tr>
    </table></td>
  </tr>



  <?php
          $sql_estado = "Select * FROM registro WHERE idregistro =".$_SESSION['idreg'];
          $estado = pg_query($cn,$sql_estado) ;
          $row_estado = pg_fetch_array ($estado);
   ?>


    <?php

    $varsuptpfp = $_SESSION['superficie337']->get_suptpfp();

    $varsuptpfppas = -1;
    if($_SESSION['Causal']==2)
        {
          $varsuptpfppas = $_SESSION['superficie502']->get_suptpfp();
        }

    ?>


   <tr>
     <td colspan="5"><hr></td>
   </tr>

   <?php
   $sql_alternativaref = "Select * FROM codificadores WHERE idclasificador=41 Order by nombrecodificador";
   $alternativaref = pg_query($cn,$sql_alternativaref) ;
   $row_alternativaref = pg_fetch_array ($alternativaref);
   ?>

    <tr <?php if ( (($varsuptpfp == 0)  || ($row_estado['estado'] == 166 )) || (($varsuptpfppas == 0)  || ($row_estado['estado'] == 166 )) ){?>  style="display:none"  <?php } ?> class="texto_normal">


        <td colspan="5" id='blau'><span class="taulaH">4. Escenarios o Alternativas de Restitucion en TPFP </span>
            <table width="30%" class="taulaA" border="0" colspan="3" >
                  <?php
                  do {
                    $sql_escenarios = "select * from escenariosreforestacion where idregistro=".$_SESSION['idreg']." and tipoescenario=".$row_alternativaref['idcodificadores'];;
                    $escenarios = pg_query($cn,$sql_escenarios);
                    $row_escenario = pg_fetch_array ($escenarios);
                  ?>
                  <tr >
                  <td width="80%">
                    <?php echo $row_alternativaref['nombrecodificador'];?>
                  </td>
                  <td width="20%">
                    <input type="checkbox"  onChange="habilitarescenario(this,'<?php echo $row_alternativaref['idcodificadores'];?>');"  <?php  if(isset($_SESSION['datos_bosque']["chk".$row_alternativaref['idcodificadores']])){ echo 'checked';}   elseif($row_escenario['tipoescenario']==$row_alternativaref['idcodificadores']){echo 'checked';}  ?>   name="<?php echo "chk".$row_alternativaref['idcodificadores'];?>"/>
                    <!--<input <?php  //if($row_escenario['tipoescenario']==$row_alternativaref['idcodificadores']){echo 'enabled';} else { echo 'disabled'; }  ?> class="cabecera2" type="button"  onClick="eliminarescenario(<?php //echo $row_alternativaref['idcodificadores'] ?>);" value="Eliminar"> -->
                  </td>
                  </tr>
                  <?php } while ($row_alternativaref = pg_fetch_assoc($alternativaref));	?>

            </table>
        </td>

    </tr>


    <?php
    $sql_escenariouno = "select * from escenariosreforestacion where idregistro=".$_SESSION['idreg']." and tipoescenario=321";
    $escenariouno = pg_query($cn,$sql_escenariouno);
    $row_escenariouno = pg_fetch_array ($escenariouno);
    ?>
     <tr class="texto_normal">
        <td <?php if($_SESSION['Causal']==2){ echo 'width="48%"'; } else { echo 'width="24%"';} ?> align="left" id='blau'>

            <table <?php if($row_escenariouno['idregistro']>0){?> style="display:block" <?php } else { ?>  style="display:none"; <?php } ?> class="taulaA" id="321" border="1" cellspacing="0" >

                <tr>
                      <td colspan="4" >
                          <strong>A) ESCENARIO ÁREA SIN CONBERTURA BOSCOSA</strong> <br>
                           Habilitar Rest. Fuera <input type="checkbox"  onchange="habilitarfueraregular(this,'321f')"  <?php if($row_escenariouno['suprestituirfuera']>0){ echo 'checked';} ?>  id="321f1" name="321f1"/>
                      </td>
                </tr>

                <tr class="cabecera2" align="center" >
                  <td colspan="4">Area Deforestada Ilegal </td>
                  <?php if($_SESSION['Causal']==2){  ?>
                  <td colspan="4">Area con PAS </td>
                  <?php } ?>

                </tr>

                <tr class="cabecera2" align="center">
                      <td >Sup. TPFP Ha</td>
                      <td >Sup. Rest. (5%)</td>
                      <td >Sup. Reg. Nat. (5%)</td>
                      <td >Cant. Ind. Comp.</td>
                  <?php if($_SESSION['Causal']==2){  ?>
                      <td >Sup. TPFP Ha</td>
                      <td >Sup. Rest. (5%)</td>
                      <td >Sup. Reg. Nat. (5%)</td>
                      <td >Cant. Ind. Comp.</td>
                  <?php } ?>
                </tr>

                <tr>
                      <td>
                        <input id="suprest321" name="suprest321" type="text" class="boxBusqueda4"
                        onkeyup="extractNumber(this,4,false);"
                        onkeypress="return blockNonNumbers(this, event, true, false);"
                        value="<?php if(isset($_SESSION['datos_bosque']["suprest321"])) { echo $_SESSION['datos_bosque']["suprest321"];} elseif($row_escenariouno['suprestituir337']!=null){ echo $row_escenariouno["suprestituir337"]; } else { echo 0; } ?> "
                        onChange="calcular321('suprest321','suprest','supregnat','indcomp321');" >
                      </td>
                      <td> <input readonly name="suprest" id="suprest" type="text" class="boxBusqueda4"  value=" <?php if(isset($_SESSION['datos_bosque']["suprest321"])) { echo ($_SESSION['datos_bosque']["suprest321"]/2);} elseif($row_escenariouno['suprestituir337']!=null){ echo ($row_escenariouno["suprestituir337"]/2); } else { echo 0; }  ?> "> </td>
                      <td> <input readonly name="supregnat" id="supregnat" type="text" class="boxBusqueda4"  value=" <?php if(isset($_SESSION['datos_bosque']["suprest321"])) { echo ($_SESSION['datos_bosque']["suprest321"]/2);} elseif($row_escenariouno['suprestituir337']!=null){ echo ($row_escenariouno["suprestituir337"]/2); } else { echo 0; } ?>  "> </td>
                      <td> <input id="indcomp321" onkeypress="return blockNonNumbers(this, event, true, false);" onkeyup="extractNumber(this,4,false);" name="indcomp321" type="text" class="boxBusqueda4"  value=" <?php if(isset($_SESSION['datos_bosque']["indcomp321"])) { echo $_SESSION['datos_bosque']["indcomp321"];} elseif($row_escenariouno['cantplantcomp337']!=null){ echo $row_escenariouno["cantplantcomp337"]; } else { echo 0; } ?>"> </td>

                  <?php if($_SESSION['Causal']==2){  ?>
                      <td>
                        <input id="suprestpas321" name="suprestpas321" type="text" class="boxBusqueda4"
                        onkeyup="extractNumber(this,4,false);"
                        onkeypress="return blockNonNumbers(this, event, true, false);"
                        value="<?php if(isset($_SESSION['datos_bosque']["suprestpas321"])) { echo $_SESSION['datos_bosque']["suprestpas321"];} elseif($row_escenariouno['suprestituir502']!=null){ echo $row_escenariouno["suprestituir502"]; }  else { echo 0; } ?> "
                        onChange="calcular321('suprestpas321','suprestpas','supregnatpas','indcomppas321');" >
                      </td>
                      <td> <input readonly name="suprestpas" id="suprestpas" type="text" class="boxBusqueda4"  value=" <?php if(isset($_SESSION['datos_bosque']["suprestpas321"])) { echo ($_SESSION['datos_bosque']["suprestpas321"]/2);} elseif($row_escenariouno['suprestituir502']!=null){ echo ($row_escenariouno["suprestituir502"]/2); } else { echo 0; } ?>  "> </td>
                      <td> <input readonly name="supregnatpas" id="supregnatpas" type="text" class="boxBusqueda4"  value=" <?php if(isset($_SESSION['datos_bosque']["suprestpas321"])) { echo ($_SESSION['datos_bosque']["suprestpas321"]/2);} elseif($row_escenariouno['suprestituir502']!=null){ echo ($row_escenariouno["suprestituir502"]/2); } else { echo 0; } ?> "> </td>
                      <td> <input id="indcomppas321" name="indcomppas321" onkeypress="return blockNonNumbers(this, event, true, false);" onkeyup="extractNumber(this,4,false);" type="text"  class="boxBusqueda4"  value=" <?php if(isset($_SESSION['datos_bosque']["indcomppas321"])) { echo $_SESSION['datos_bosque']["indcomppas321"];} elseif($row_escenariouno['cantplantcomp502']!=null){ echo $row_escenariouno["cantplantcomp502"]; } else { echo 0; } ?>" > </td>
                  <?php } ?>
            </table>



        </td>

        <td colspan="1" align="left" id='blau'>
            <table <?php if($row_escenariouno['suprestituirfuera']>0){?> style="display:block" <?php } else { ?>  style="display:none"; <?php } ?> class="taulaA" id="321f" border="1" cellspacing="0" >
                <tr>
                      <td colspan="4"> <br><br></td>
                </tr>

                <tr class="cabecera2" align="center" >
                    <td colspan="4">Fuera del Desmonte Ilegal (Antes 31/12/2011)</td>
                </tr>

                <tr class="cabecera2" align="center">
                      <td >Sup. TPFP Ha</td>
                      <td >Sup. Rest. (5%)</td>
                      <td >Sup. Reg. Nat. (5%)</td>
                      <td >Cant. Ind. Comp.</td>
                </tr>

                <tr>
                  <td>
                    <input id="suprestfuera321" name="suprestfuera321" type="text" class="boxBusqueda4"
                    onkeyup="extractNumber(this,4,false);"
                    onkeypress="return blockNonNumbers(this, event, true, false);"
                    value="<?php if(isset($_SESSION['datos_bosque']["suprestfuera321"])) { echo $_SESSION['datos_bosque']["suprestfuera321"];} elseif($row_escenariouno['suprestituirfuera']!=null){ echo $row_escenariouno["suprestituirfuera"]; } else { echo 0; }  ?> "
                    onChange="calcular321('suprestfuera321','suprestfuera','supregnatfuera','indcompfuera321');" >
                  </td>
                  <td > <input readonly name="suprestfuera" id="suprestfuera" type="text" class="boxBusqueda4"  value=" <?php if(isset($_SESSION['datos_bosque']["suprestfuera321"])) { echo ($_SESSION['datos_bosque']["suprestfuera321"]/2);} elseif($row_escenariouno['suprestituirfuera']!=null){ echo ($row_escenariouno["suprestituirfuera"]/2); } else { echo 0; } ?>  "> </td>
                  <td > <input readonly name="supregnatfuera" id="supregnatfuera" type="text" class="boxBusqueda4"  value=" <?php if(isset($_SESSION['datos_bosque']["suprestfuera321"])) { echo ($_SESSION['datos_bosque']["suprestfuera321"]/2);} elseif($row_escenariouno['suprestituirfuera']!=null){ echo ($row_escenariouno["suprestituirfuera"]/2); } else { echo 0; } ?> "> </td>
                  <td > <input id="indcompfuera321" name="indcompfuera321" onkeypress="return blockNonNumbers(this, event, true, false);" onkeyup="extractNumber(this,4,false);" type="text"  class="boxBusqueda4"  value=" <?php if(isset($_SESSION['datos_bosque']["indcompfuera321"])) { echo $_SESSION['datos_bosque']["indcompfuera321"];} elseif($row_escenariouno['suprestituirfuera']!=null){ echo $row_escenariouno["suprestituirfuera"]; } else { echo 0; } ?>" > </td>
                </tr>
            </table>
        </td>

    </tr>


    <?php
    $sql_escenariodos = "select * from escenariosreforestacion where idregistro=".$_SESSION['idreg']." and tipoescenario=322";
    $escenariodos = pg_query($cn,$sql_escenariodos);
    $row_escenariodos = pg_fetch_array ($escenariodos);
    ?>
    <tr >
      <td <?php if($_SESSION['Causal']==2){ echo 'width="39%"'; } else { echo 'width="20%"';}  ?>  align="left" id='blau'>
          <table <?php if($row_escenariodos['idregistro']>0){?> style="display:block" <?php } else { ?>  style="display:none"; <?php } ?> class="taulaA" id="322" border="1" cellspacing="0" >

              <tr>
                    <td colspan="4" >
                        <strong>B.1) AREA CON BARBECHO (REF. DENTRO DEL BARBECHO)</strong> <br>
                         Habilitar Rest. Fuera <input type="checkbox"  onchange="habilitarfueraregular(this,'322f')"  id="322f1" name="322f1"/>
                    </td>
              </tr>

              <tr class="cabecera2" align="center" >
                <td colspan="2">Area Deforestada Ilegal</td>
                  <?php if($_SESSION['Causal']==2){  ?>
                <td colspan="2">Area con PAS</td>
                <?php } ?>
              </tr>

              <tr class="cabecera2" align="center">
                    <td >Sup. Restituir Barbecho TPFP (Ha.)</td>
                    <td >Cant. Ind. Comp.</td>
                <?php if($_SESSION['Causal']==2){  ?>
                    <td >Sup. Restituir Barbecho TPFP (Ha.)</td>
                    <td >Cant. Ind. Comp.</td>
                <?php } ?>
              </tr>

              <tr>
                    <td>
                      <input id="suprest322" name="suprest322" type="text" class="boxBusqueda4"
                      onkeyup="extractNumber(this,4,false);"
                      onkeypress="return blockNonNumbers(this, event, true, false);"
                      value="<?php if(isset($_SESSION['datos_bosque']["suprest322"])) { echo $_SESSION['datos_bosque']["suprest322"];} elseif($row_escenariodos['suprestituir337']!=null){ echo $row_escenariodos["suprestituir337"]; } else { echo 0; } ?> "
                      onChange="calcular322('suprest322','indcomp322');" >
                    </td>
                    <td> <input id="indcomp322" name="indcomp322" onkeypress="return blockNonNumbers(this, event, true, false);" onkeyup="extractNumber(this,4,false);" type="text" class="boxBusqueda4"  value=" <?php if(isset($_SESSION['datos_bosque']["indcomp322"])) { echo $_SESSION['datos_bosque']["indcomp322"];} elseif($row_escenariodos['cantplantcomp337']!=null){ echo $row_escenariodos["cantplantcomp337"]; } else { echo 0; } ?>"> </td>

                <?php if($_SESSION['Causal']==2){  ?>
                    <td>
                      <input id="suprestpas322" name="suprestpas322" type="text" class="boxBusqueda4"
                      onkeyup="extractNumber(this,4,false);"
                      onkeypress="return blockNonNumbers(this, event, true, false);"
                      value="<?php if(isset($_SESSION['datos_bosque']["suprestpas322"])) { echo $_SESSION['datos_bosque']["suprestpas322"];} elseif($row_escenariodos['suprestituir502']!=null){ echo $row_escenariodos["suprestituir502"]; } else { echo 0; } ?> "
                      onChange="calcular322('suprestpas322','indcomppas322');" >
                    </td>
                    <td> <input id="indcomppas322" name="indcomppas322" onkeypress="return blockNonNumbers(this, event, true, false);" onkeyup="extractNumber(this,4,false);" type="text" class="boxBusqueda4"  value=" <?php if(isset($_SESSION['datos_bosque']["indcomppas322"])) { echo $_SESSION['datos_bosque']["indcomppas322"];} elseif($row_escenariodos['cantplantcomp502']!=null){ echo $row_escenariodos["cantplantcomp502"]; } else { echo 0; } ?>"> </td>
                <?php } ?>
              </tr>
          </table>
      </td>


      <td align="left" >
          <table <?php if($row_escenariodos['idregistro']>0){?> style="display:block" <?php } else { ?>  style="display:none"; <?php } ?> class="taulaA" id="322f" border="1" cellspacing="0" >

              <tr>
                    <td colspan="2" > <br><br></td>
              </tr>

              <tr class="cabecera2" align="center" >
                <td colspan="2">Fuera del Desmonte Ilegal (Antes 31/12/2011)</td>
              </tr>

              <tr class="cabecera2" align="center">
                    <td >Sup. Restituir Barbecho TPFP (Ha.)</td>
                    <td >Cant. Ind. Comp.</td>
              </tr>

              <tr>
                <td>
                  <input id="suprestfuera322" name="suprestfuera322" type="text" class="boxBusqueda4"
                  onkeyup="extractNumber(this,4,false);"
                  onkeypress="return blockNonNumbers(this, event, true, false);"
                  value="<?php if(isset($_SESSION['datos_bosque']["suprestfuera322"])) { echo $_SESSION['datos_bosque']["suprestfuera322"];} elseif($row_escenariodos['suprestituirfuera']!=null){ echo $row_escenariodos["suprestituirfuera"]; } else { echo 0; } ?> "
                  onChange="calcular322('suprestfuera322','indcompfuera322');" >
                </td>
                <td> <input id="indcompfuera322" name="indcompfuera322" onkeypress="return blockNonNumbers(this, event, true, false);" onkeyup="extractNumber(this,4,false);" type="text" class="boxBusqueda4"  value=" <?php if(isset($_SESSION['datos_bosque']["indcompfuera322"])) { echo $_SESSION['datos_bosque']["indcompfuera322"];} elseif($row_escenariodos['cantplantfuera']!=null){ echo $row_escenariodos["cantplantfuera"]; } else { echo 0; } ?>"> </td>
              </tr>
          </table>
      </td>

    </tr>


    <?php
    $sql_escenariodosb = "select * from escenariosreforestacion where idregistro=".$_SESSION['idreg']." and tipoescenario=342";
    $escenariodosb = pg_query($cn,$sql_escenariodosb);
    $row_escenariodosb = pg_fetch_array ($escenariodosb);
    ?>
    <tr>

      <td align="left" id='blau'>

        <table <?php if($row_escenariodosb['idregistro']>0){?> style="display:block" <?php } else { ?>  style="display:none"; <?php } ?> class="taulaA" id="342" border="1" cellspacing="0" >

          <tr>
                <td colspan="6" >
                    <strong>B.2) ESCENARIO AREA CON BARBECHO (REFORESTACION FUERA DEL BARBECHO)</strong> <br>
                     Habilitar Rest. Fuera <input type="checkbox"  onchange="habilitarfueraregular(this,'342f')"  id="342f1" name="342f1"/>
                </td>
          </tr>


          <tr class="cabecera2" align="center" >
            <td colspan="3">Area Deforestada Ilegal</td>
              <?php if($_SESSION['Causal']==2){  ?>
            <td colspan="3">Area con PAS</td>
            <?php } ?>
          </tr>

          <tr class="cabecera2" align="center">
                <td >Sup. Barbecho TPFP a Conservar (Ha.)</td>
                <td >Sup. Restituir</td>
                <td >Cant. Ind. Comp.</td>
            <?php if($_SESSION['Causal']==2){  ?>
                <td >Sup. Barbecho TPFP a Conservar (Ha.)</td>
                <td >Sup. Restituir</td>
                <td >Cant. Ind. Comp.</td>
            <?php } ?>
          </tr>

          <tr>
                <td>
                  <input id="supbarcon342" name="supbarcon342" type="text" class="boxBusqueda4"
                  onkeyup="extractNumber(this,4,false);"
                  onkeypress="return blockNonNumbers(this, event, true, false);"
                  value="<?php if(isset($_SESSION['datos_bosque']["supbarcon342"])) { echo $_SESSION['datos_bosque']["supbarcon342"];} elseif($row_escenariodosb['supbarbechoconservar337']!=null){ echo $row_escenariodosb["supbarbechoconservar337"]; } else { echo 0; } ?> " >
                </td>
                <td>
                  <input id="suprest342" name="suprest342" type="text" class="boxBusqueda4"
                  onkeyup="extractNumber(this,4,false);"
                  onkeypress="return blockNonNumbers(this, event, true, false);"
                  value="<?php if(isset($_SESSION['datos_bosque']["suprest342"])) { echo $_SESSION['datos_bosque']["suprest342"];} elseif($row_escenariodosb['suprestituir337']!=null){ echo $row_escenariodosb["suprestituir337"]; }  else { echo 0; } ?> "
                  onChange="calcular342('suprest342','indcomp342');" >
                </td>
                <td> <input id="indcomp342" name="indcomp342" onkeypress="return blockNonNumbers(this, event, true, false);" onkeyup="extractNumber(this,4,false);" type="text" class="boxBusqueda4"  value=" <?php if(isset($_SESSION['datos_bosque']["indcomp342"])) { echo $_SESSION['datos_bosque']["indcomp342"];} elseif($row_escenariodosb['cantplantcomp337']!=null){ echo $row_escenariodosb["cantplantcomp337"]; } else { echo 0; } ?>"> </td>

            <?php if($_SESSION['Causal']==2){  ?>
                  <td>
                    <input id="supbarconpas342" name="supbarconpas342" type="text" class="boxBusqueda4"
                    onkeyup="extractNumber(this,4,false);"
                    onkeypress="return blockNonNumbers(this, event, true, false);"
                    value="<?php if(isset($_SESSION['datos_bosque']["supbarconpas342"])) { echo $_SESSION['datos_bosque']["supbarconpas342"];} elseif($row_escenariodosb['supbarbechoconservar502']!=null){ echo $row_escenariodosb["supbarbechoconservar502"]; } else { echo 0; } ?> " >
                  </td>
                  <td>
                    <input id="suprestpas342" name="suprestpas342" type="text" class="boxBusqueda4"
                    onkeyup="extractNumber(this,4,false);"
                    onkeypress="return blockNonNumbers(this, event, true, false);"
                    value="<?php if(isset($_SESSION['datos_bosque']["suprestpas342"])) { echo $_SESSION['datos_bosque']["suprestpas342"];} elseif($row_escenariodosb['suprestituir502']!=null){ echo $row_escenariodosb["suprestituir502"]; } else { echo 0; } ?> "
                    onChange="calcular342('suprestpas342','indcomppas342');" >
                  </td>
                  <td> <input id="indcomppas342" name="indcomppas342" onkeypress="return blockNonNumbers(this, event, true, false);" onkeyup="extractNumber(this,4,false);" type="text" class="boxBusqueda4"  value=" <?php if(isset($_SESSION['datos_bosque']["indcomppas342"])) { echo $_SESSION['datos_bosque']["indcomppas342"];} elseif($row_escenariodosb['cantplantcomp502']!=null){ echo $row_escenariodosb["cantplantcomp502"]; } else { echo 0; }  ?>"> </td>

            <?php } ?>
          </tr>

        </table>
      </td>



      <td align="left" id='blau'>

        <table <?php if($row_escenariodosb['idregistro']>0){?> style="display:block" <?php } else { ?>  style="display:none"; <?php } ?> class="taulaA" id="342f" border="1" cellspacing="0" >
          <tr>
                <td colspan="3" > <br></td>
          </tr>

          <tr class="cabecera2" align="center" >
            <td colspan="3">Fuera del Desmonte Ilegal</td>
          </tr>

          <tr class="cabecera2" align="center">
                <td >Sup. Barbecho TPFP a Conservar (Ha.)</td>
                <td >Sup. Restituir</td>
                <td >Cant. Ind. Comp.</td>
          </tr>

          <tr>
            <td>
              <input id="supbarconfuera342" name="supbarconfuera342" type="text" class="boxBusqueda4"
              onkeyup="extractNumber(this,4,false);"
              onkeypress="return blockNonNumbers(this, event, true, false);"
              value="<?php if(isset($_SESSION['datos_bosque']["supbarconfuera342"])) { echo $_SESSION['datos_bosque']["supbarconfuera342"];} elseif($row_escenariodosb['supbarbechoconservarfuera']!=null){ echo $row_escenariodosb["supbarbechoconservarfuera"]; } else { echo 0; } ?> " >
            </td>

            <td>
              <input id="suprestfuera342" name="suprestfuera342" type="text" class="boxBusqueda4"
              onkeyup="extractNumber(this,4,false);"
              onkeypress="return blockNonNumbers(this, event, true, false);"
              value="<?php if(isset($_SESSION['datos_bosque']["suprestfuera342"])) { echo $_SESSION['datos_bosque']["suprestfuera342"];} elseif($row_escenariodosb['suprestituirfuera']!=null){ echo $row_escenariodosb["suprestituirfuera"]; } else { echo 0; }  ?> "
              onChange="calcular342('suprestfuera342','indcompfuera342');" >
            </td>
            <td> <input id="indcompfuera342" name="indcompfuera342" onkeypress="return blockNonNumbers(this, event, true, false);" onkeyup="extractNumber(this,4,false);" type="text" class="boxBusqueda4"  value=" <?php if(isset($_SESSION['datos_bosque']["indcompfuera342"])) { echo $_SESSION['datos_bosque']["indcompfuera342"];} elseif($row_escenariodosb['cantplantfuera']!=null){ echo $row_escenariodosb["cantplantfuera"]; }  else { echo 0; } ?>"> </td>
          </tr>

        </table>
      </td>




    </tr>


    <?php
    $sql_escenariotres = "select * from escenariosreforestacion where idregistro=".$_SESSION['idreg']." and tipoescenario=323";
    $escenariotres = pg_query($cn,$sql_escenariotres);
    $row_escenariotres = pg_fetch_array ($escenariotres);
    ?>
    <tr >
      <td align="left" id='blau'>

        <table <?php if($row_escenariotres['idregistro']>0){?> style="display:block" <?php } else { ?>  style="display:none"; <?php } ?> class="taulaA" id="323" border="1" cellspacing="0" >
          <tr>
                <td colspan="6" >
                    <strong>C) ESCENARIO SISTEMA SILVOPASTORIL</strong> <br>
                     Habilitar Rest. Fuera <input type="checkbox"  onchange="habilitarfueraregular(this,'323f')"  id="323f1" name="323f1"/>
                </td>
          </tr>



              <tr class="cabecera2" align="center" >
                <td colspan="3">Area Deforestada Ilegal</td>
                  <?php if($_SESSION['Causal']==2){  ?>
                <td colspan="3">Area con PAS</td>
                <?php } ?>
              </tr>

              <tr class="cabecera2" align="center">
                    <td >Sup. Restituir TPFP</td>
                    <td >Cant. Arboles Existentes</td>
                    <td >Plantines Comprometidos</td>
                <?php if($_SESSION['Causal']==2){  ?>
                    <td >Sup. Restituir TPFP</td>
                    <td >Cant. Arboles Existentes</td>
                    <td >Plantines Comprometidos</td>
                <?php } ?>
              </tr>

              <tr>
                    <td>
                      <input id="suprest323" name="suprest323" type="text" class="boxBusqueda4"
                      onkeyup="extractNumber(this,4,false);"
                      onkeypress="return blockNonNumbers(this, event, true, false);"
                      value="<?php if(isset($_SESSION['datos_bosque']["suprest323"])) { echo $_SESSION['datos_bosque']["suprest323"];} elseif($row_escenariotres['suprestituir337']!=null){ echo $row_escenariotres["suprestituir337"]; }  ?> "
                      onChange="calcularescenariotres('suprest323','indexi323','indcomp323');" >
                    </td>
                    <td> <input id="indexi323" name="indexi323" onkeypress="return blockNonNumbers(this, event, true, false);" onkeyup="extractNumber(this,4,false);" type="text" class="boxBusqueda4"  value=" <?php if(isset($_SESSION['datos_bosque']["indexi323"])) { echo $_SESSION['datos_bosque']["indexi323"];} elseif($row_escenariotres['cantplantexistentes337']!=null){ echo $row_escenariotres["cantplantexistentes337"]; }  ?>"> </td>
                    <td> <input id="indcomp323" name="indcomp323" onkeypress="return blockNonNumbers(this, event, true, false);" onkeyup="extractNumber(this,4,false);" type="text" class="boxBusqueda4"  value=" <?php if(isset($_SESSION['datos_bosque']["indcomp323"])) { echo $_SESSION['datos_bosque']["indcomp323"];} elseif($row_escenariotres['cantplantcomp337']!=null){ echo $row_escenariotres["cantplantcomp337"]; }  ?>"> </td>

                <?php if($_SESSION['Causal']==2){  ?>
                    <td>
                      <input id="suprestpas323" name="suprestpas323" type="text" class="boxBusqueda4"
                      onkeyup="extractNumber(this,4,false);"
                      onkeypress="return blockNonNumbers(this, event, true, false);"
                      value="<?php if(isset($_SESSION['datos_bosque']["suprestpas323"])) { echo $_SESSION['datos_bosque']["suprestpas323"];} elseif($row_escenariotres['suprestituir502']!=null){ echo $row_escenariotres["suprestituir502"]; }  ?> "
                      onChange="calcularescenariotres('suprestpas323','indexipas323','indcomppas323');" >
                    </td>
                    <td> <input id="indexipas323" name="indexipas323" onkeypress="return blockNonNumbers(this, event, true, false);" onkeyup="extractNumber(this,4,false);" type="text" class="boxBusqueda4"  value=" <?php if(isset($_SESSION['datos_bosque']["indexipas323"])) { echo $_SESSION['datos_bosque']["indexipas323"];} elseif($row_escenariotres['cantplantexistentes502']!=null){ echo $row_escenariotres["cantplantexistentes502"]; }  ?>"> </td>
                    <td> <input id="indcomppas323" name="indcomppas323"onkeypress="return blockNonNumbers(this, event, true, false);"  onkeyup="extractNumber(this,4,false);" type="text" class="boxBusqueda4"  value=" <?php if(isset($_SESSION['datos_bosque']["indcomppas323"])) { echo $_SESSION['datos_bosque']["indcomppas323"];} elseif($row_escenariotres['cantplantcomp502']!=null){ echo $row_escenariotres["cantplantcomp502"]; }  ?>"> </td>
                <?php } ?>

          </table>
      </td>


      <td align="left" id='blau'>

        <table <?php if($row_escenariotres['idregistro']>0){?> style="display:block" <?php } else { ?>  style="display:none"; <?php } ?> class="taulaA" id="323f" border="1" cellspacing="0" >
          <tr>
                <td colspan="3" > <br> </td>
          </tr>

              <tr class="cabecera2" align="center" >
                <td colspan="3">Fuera del Desmonte Ilegal</td>
              </tr>

              <tr class="cabecera2" align="center">
                    <td >Sup. Restituir TPFP</td>
                    <td >Cant. Arboles Existentes</td>
                    <td >Plantines Comprometidos</td>
              </tr>

              <tr>
                <td>
                  <input id="suprestfuera323" name="suprestfuera323" type="text" class="boxBusqueda4"
                  onkeyup="extractNumber(this,4,false);"
                  onkeypress="return blockNonNumbers(this, event, true, false);"
                  value="<?php if(isset($_SESSION['datos_bosque']["suprestfuera323"])) { echo $_SESSION['datos_bosque']["suprestfuera323"];} elseif($row_escenariotres['suprestituirfuera']!=null){ echo $row_escenariotres["suprestituirfuera"]; }  ?> "
                  onChange="calcularescenariotres('suprestfuera323','indexifuera323','indcompfuera323');" >
                </td>
                <td> <input id="indexifuera323" name="indexifuera323" onkeypress="return blockNonNumbers(this, event, true, false);" onkeyup="extractNumber(this,4,false);" type="text" class="boxBusqueda4"  value=" <?php if(isset($_SESSION['datos_bosque']["indexifuera323"])) { echo $_SESSION['datos_bosque']["indexifuera323"];} elseif($row_escenariotres['cantplantexistentesfuera']!=null){ echo $row_escenariotres["cantplantexistentesfuera"]; }  ?>"> </td>
                <td> <input id="indcompfuera323" name="indcompfuera323"onkeypress="return blockNonNumbers(this, event, true, false);"  onkeyup="extractNumber(this,4,false);" type="text" class="boxBusqueda4"  value=" <?php if(isset($_SESSION['datos_bosque']["indcompfuera323"])) { echo $_SESSION['datos_bosque']["indcompfuera323"];} elseif($row_escenariotres['cantplantfuera']!=null){ echo $row_escenariotres["cantplantfuera"]; }  ?>"> </td>
                <!--<td> <input type="image" border="1" onclick="abrirCenso();return false;" alt="Censo" title="Censo" src="../images/adda.gif"> </td>-->
              </tr>

          </table>
      </td>





    </tr>




  <tr>
    <td colspan="5"><hr></td>
  </tr>
  <tr class="texto_normal">
    <td colspan="2" id='blau'><span class="taulaH">5. Periodo y Especies a Restituir</span></td>
    <td colspan="2" id='blau'>
    <?php
	$ref=$_SESSION['superficie337']->get_supreforestar();
	if($_SESSION['Causal']==2)
	   {
	   $ref=$ref+$_SESSION['superficie502']->get_supreforestar();
	   }

	if($_SESSION['Actividad'] == 'Forestal')
		{
		  $ref=1;
		}

	if(1>0){
	  ?>
    <span class="borderLBRgris">
      <input type='image' src='../images/adda.gif' title="Agregar Especies" alt='Especies' border='1' onClick='lanzarSubmenu1();return false;'>
          <input name="submit4" type="button" class='cabecera2' value="Eliminar Especies" onClick="deleteRowEspecies('especies')">
    </span>
     <?php }
	  ?>

	  <div style="display:none" >
       <select  name="espaciamiento" class="combos" id="espaciamiento">
         <?php
		  ///cambiar este codigo
		   $sql_clasificador ="Select * From codificadores Where idclasificador=9 Order by nombrecodificador";
			$clasificador = pg_query($cn,$sql_clasificador) ;
			$row_clasificador = pg_fetch_array ($clasificador);

		  do {   ?>
         <option value="<?php echo $row_clasificador['idcodificadores']?>"
                 > <?php echo $row_clasificador['nombrecodificador']?></option>
         <?php } while ($row_clasificador = pg_fetch_assoc($clasificador));?>
       </select>
     </div>




	 </td>
  </tr>
  <tr>
    <td colspan="5" align="right" id='blau'>
    <table width="100%" class="taulaA" id="especies" border="1" cellspacing="0" cellpadding="0" >
      <tr class="cabecera2" align="center">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>A&Ntilde;O</td>
        <td>MES INICIO</td>
        <td>MES FINAL</td>
        <td>NOMBRE CIENTIFICO</td>
        <td>NOMBRE COMUN</td>
        <td>SUPERFICIE</td>
        <td>ESPACIA.</td>
        <td>CANTIDAD PLANTINES</td>
        <td>PRECIO UNITARIO</td>
        <td>PRECIO PLANTINES</td>
        <td>PRECIO MANO OBRA</td>
        <td>PRECIO MANTENIMIENTO</td>
        <td>PRECIO SEGUIMIENTO</td>
        <td>PRECIO OTROS</td>
        <td>TIPO RESTITUCION</td>
        <td>Total</td>
      </tr>
      <?php
	     $suptpfprestsel=0; $suptpfprest=0;
	     if(isset($_SESSION['datos_bosque']['conteoEspecie']))
		 {$num=$_SESSION['datos_bosque']['conteoEspecie'];}
		 else
		 {$num=$totalRows_Especies;}
		// echo $num;
		 for ($i = 1; $i <=$num ; $i++) {
		 if(isset($_SESSION['datos_bosque']['idespeciecomun'.$i]) || isset($row_Especies['idtiporestitucion'])){

		 ?>
      <tr id="blau2" >
        <td width="2%" height="25"><input type="checkbox" name="chk"/></td>
        <td width="2%"><span class="borderLBRgris">
          <input type='image' src='../images/copiara.gif' title="copiar fila" alt='Especies' border='1' onClick="<?php echo "CopyRow(".$i.");return false;"; ?>" >
        </span></td>

        <td width="2%">

		      <select name="<?php echo 'anorestituir'.$i; ?>" id="<?php echo 'anorestituir'.$i; ?>" class="combos" >
				<?php $aux= isset($_SESSION['datos_bosque']['anorestituir'.$i]) ? htmlspecialchars($_SESSION['datos_bosque']['anorestituir'.$i]) : trim($row_Especies['anorestituir']); ?>
				<option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Elegir...</option>
				<option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>2014</option>
				<option value="2" <?php if( $aux=="2"){echo 'selected' ;}?>>2015</option>
				<option value="3" <?php if( $aux=="3"){echo 'selected' ;}?>>2016</option>
				<option value="4" <?php if( $aux=="4"){echo 'selected' ;}?>>2017</option>
				<option value="5" <?php if( $aux=="5"){echo 'selected' ;}?>>2018</option>
			  </select>

		</td>

        <td width="4%"><input name="<?php echo 'mesini'.$i; ?>" id="<?php echo 'mesini'.$i; ?>" type="text" class="boxBusqueda5" value="<?php echo isset($_SESSION['datos_bosque']['mesini'.$i]) ? htmlspecialchars($_SESSION['datos_bosque']['mesini'.$i]) : trim($row_Especies['mesini']) ?>" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"></td>
        <td width="3%"><input name="<?php echo 'mesfin'.$i; ?>" id=name="<?php echo 'mesfin'.$i; ?>" type="text" class="boxBusqueda5" value="<?php echo isset($_SESSION['datos_bosque']['mesfin'.$i]) ? htmlspecialchars($_SESSION['datos_bosque']['mesfin'.$i]) : trim($row_Especies['mesfin']) ?>" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"></td>
        <td width="12%"><input name="<?php echo 'nombrecientifico'.$i; ?>" id="<?php echo 'nombrecientifico'.$i; ?>" type="text" readonly class="boxBusqueda"  value="<?php echo isset($_SESSION['datos_bosque']['nombrecientifico'.$i]) ? htmlspecialchars($_SESSION['datos_bosque']['nombrecientifico'.$i]) : trim($row_Especies['nombrecientifico']) ;?> "></td>
        <td width="10%"><input name="<?php echo 'nombrecomun'.$i; ?>" id="<?php echo 'nombrecomun'.$i; ?>" type="text" readonly class="boxBusqueda4"  value="<?php echo isset($_SESSION['datos_bosque']['nombrecomun'.$i]) ? htmlspecialchars($_SESSION['datos_bosque']['nombrecomun'.$i]) : trim($row_Especies['nombrecomun']) ;?> "></td>
        <td width="6%"><input name="<?php echo 'suprestituir'.$i; ?>" id="<?php echo 'suprestituir'.$i; ?>" type="text" class="boxBusqueda1" onChange="<?php echo 'CantPlantin(idtipoesparcimiento'.$i.','.$i.')'; ?>" value="<?php echo isset($_SESSION['datos_bosque']['suprestituir'.$i]) ? htmlspecialchars(trim($_SESSION['datos_bosque']['suprestituir'.$i])) : trim($row_Especies['suprestituir']);?> " onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"></td>

        <td width="8%"><select  name="<?php echo 'idtipoesparcimiento'.$i; ?>" class="combos" id="<?php echo 'idtipoesparcimiento'.$i; ?>" onChange="<?php echo "CantPlantin(this,".$i.")";?>" >
          <?php
		  ///cambiar este codigo
		   $sql_clasificador ="Select * From codificadores Where idclasificador=9 Order by nombrecodificador";
			$clasificador = pg_query($cn,$sql_clasificador) ;
			$row_clasificador = pg_fetch_array ($clasificador);

		  do {   ?>
          <option value="<?php echo $row_clasificador['idcodificadores']?>"
                <?php  if(isset($_SESSION['datos_bosque']['idtipoesparcimiento'.$i])&&($_SESSION['datos_bosque']['idtipoesparcimiento'.$i]== $row_clasificador['idcodificadores'])){
											echo " selected";
						}elseif(isset($row_Especies['idtipoesparcimiento']) && $row_Especies['idtipoesparcimiento']== $row_clasificador['idcodificadores']){	echo " selected";}?>
                 > <?php echo $row_clasificador['nombrecodificador']?></option>
          <?php } while ($row_clasificador = pg_fetch_assoc($clasificador));?>
        </select></td>
        <td width="5%"><input name="<?php echo 'cantplantin'.$i; ?>" id="<?php echo 'cantplantin'.$i; ?>" readonly type="text" class="boxBusqueda1"  value="<?php echo isset($_SESSION['datos_bosque']['cantplantin'.$i]) ? htmlspecialchars(trim($_SESSION['datos_bosque']['cantplantin'.$i])) : trim($row_Especies['cantplantin']) ;?> " onChange="<?php echo 'Subtotalplantin('.$i.')';?>" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"></td>
        <td width="5%"><input name="<?php echo 'precioplantin'.$i; ?>" id="<?php echo 'precioplantin'.$i; ?>" type="text" onChange="<?php echo 'PrecioPlantin('.$i.')';?>"  class="boxBusqueda1"  value="<?php echo isset($_SESSION['datos_bosque']['precioplantin'.$i]) ? htmlspecialchars(trim($_SESSION['datos_bosque']['precioplantin'.$i])) : trim($row_Especies['precioplantin']);?> " onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"></td>
        <td width="5%"><input name="<?php echo 'pretotalplantines'.$i; ?>" id="<?php echo 'pretotalplantines'.$i; ?>" type="text" class="boxBusqueda1" readonly onChange="<?php echo 'Subtotalplantin('.$i.')';?>" value="<?php echo isset($_SESSION['datos_bosque']['pretotalplantines'.$i]) ? htmlspecialchars(trim($_SESSION['datos_bosque']['pretotalplantines'.$i])) : trim($row_Especies['pretotalplantines']);?> "></td>
        <td width="6%"><input name="<?php echo 'preciomo'.$i; ?>" id="<?php echo 'preciomo'.$i; ?>" type="text"  class="boxBusqueda1" onChange="<?php echo 'Subtotalplantin('.$i.')';?>" value="<?php echo isset($_SESSION['datos_bosque']['preciomo'.$i]) ? htmlspecialchars(trim($_SESSION['datos_bosque']['preciomo'.$i])) : trim($row_Especies['preciomo']);?> " onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"></td>
        <td width="8%"><input name="<?php echo 'preciomantenimiento'.$i; ?>" id="<?php echo 'preciomantenimiento'.$i; ?>"  type="text"  class="boxBusqueda1" onChange="<?php echo 'Subtotalplantin('.$i.')';?>" value="<?php echo isset($_SESSION['datos_bosque']['preciomantenimiento'.$i]) ? htmlspecialchars(trim($_SESSION['datos_bosque']['preciomantenimiento'.$i])) : trim($row_Especies['preciomantenimiento']);?> " onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"></td>
        <td width="8%"><input name="<?php echo 'precioseguimiento'.$i; ?>" id="<?php echo 'precioseguimiento'.$i; ?>" type="text"  class="boxBusqueda1" onChange="<?php echo 'Subtotalplantin('.$i.')';?>" value="<?php echo isset($_SESSION['datos_bosque']['precioseguimiento'.$i]) ? htmlspecialchars(trim($_SESSION['datos_bosque']['precioseguimiento'.$i])) : trim($row_Especies['precioseguimiento']);?> " onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"></td>
        <td width="5%"><input name="<?php echo 'preciootrogastos'.$i; ?>" id="<?php echo 'preciootrogastos'.$i; ?>" type="text"  class="boxBusqueda1" onChange="<?php echo 'Subtotalplantin('.$i.')';?>" value="<?php echo isset($_SESSION['datos_bosque']['preciootrogastos'.$i]) ? htmlspecialchars(trim($_SESSION['datos_bosque']['preciootrogastos'.$i])) : trim($row_Especies['preciootrogastos']);?> " onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"></td>
        <td width="7%"><select name="<?php echo 'idtiporestitucion'.$i; ?>"  class="combos" id="<?php echo 'idtiporestitucion'.$i; ?>"  onChange="document.forms[0].submit()" >
          <?php
		  ///superficies total a restituir
		   if(isset($_SESSION['datos_bosque']['idtiporestitucion'.$i])){
		      if($_SESSION['datos_bosque']['idtiporestitucion'.$i]==113){ $suptpfprest=$suptpfprest+$_SESSION['datos_bosque']['suprestituir'.$i];
				 }else{ $suptpfprestsel=$suptpfprestsel+$_SESSION['datos_bosque']['suprestituir'.$i];}
		   }else{
			   if($row_Especies['idtiporestitucion']==113){  $suptpfprest=$suptpfprest+$row_Especies['suprestituir'];//tpfp
				 }else{ $suptpfprestsel=$suptpfprestsel+$row_Especies['suprestituir'];}
			}
		   //(((((((((((/cambiar este codigo
		    $sql_clasificador ="Select * From codificadores Where idclasificador=17 Order by nombrecodificador";
			$clasificador = pg_query($cn,$sql_clasificador) ;
			$row_clasificador = pg_fetch_array ($clasificador);

		  do {   ?>
          <option value="<?php echo $row_clasificador['idcodificadores']?>"
                <?php  if(isset($_SESSION['datos_bosque']['idtiporestitucion'.$i])&&($_SESSION['datos_bosque']['idtiporestitucion'.$i]== $row_clasificador['idcodificadores'])){
											echo " selected";
						}elseif(isset($row_Especies['idtiporestitucion']) && $row_Especies['idtiporestitucion']== $row_clasificador['idcodificadores']){	echo " selected";}?>
                 > <?php echo $row_clasificador['nombrecodificador']?></option>
          <?php } while ($row_clasificador = pg_fetch_assoc($clasificador));?>
        </select>
              <input type="hidden" name="<?php echo 'idespeciecomun'.$i; ?>" id="<?php echo 'idespeciecomun'.$i; ?>" value="<?php echo isset($_SESSION['datos_bosque']['idespeciecomun'.$i]) ? htmlspecialchars($_SESSION['datos_bosque']['idespeciecomun'.$i]) : trim($row_Especies['idespeciecomun']) ?>"></td>
        <td width="6%"><input name="<?php echo 'presubtotal'.$i; ?>" id="<?php echo 'presubtotal'.$i; ?>" type="text" class="boxBusqueda1" readonly  value="<?php echo isset($_SESSION['datos_bosque']['presubtotal'.$i]) ? htmlspecialchars($_SESSION['datos_bosque']['pretotalplantines'.$i]+$_SESSION['datos_bosque']['preciomo'.$i]+$_SESSION['datos_bosque']['preciomantenimiento'.$i]+$_SESSION['datos_bosque']['precioseguimiento'.$i]+$_SESSION['datos_bosque']['preciootrogastos'.$i]) : $row_Especies['pretotalplantines']+$row_Especies['preciomo']+$row_Especies['preciomantenimiento']+$row_Especies['precioseguimiento']+$row_Especies['preciootrogastos'];?> "></td>
      </tr>
      <?php if(!isset($_SESSION['datos_bosque']['conteoEspecie']) && isset($row_Especies)){$row_Especies = pg_fetch_assoc($Especies);}
		 }} ?>
    </table>
        <input type="hidden" name="conteoEspecie" id="conteoEspecie" value="<?php echo isset($_SESSION['datos_bosque']['conteoEspecie']) ? htmlspecialchars($_SESSION['datos_bosque']['conteoEspecie']) : $totalRows_Especies ?>"></td>
  </tr>
  <tr>
    <td colspan="5"><hr></td>
  </tr>

  <tr>
    <td width="11%" align="right" id='blau5'>Sup. Total en TPFP:</td>
    <td width="25%"><input type="text" name="suptpfprest" class="boxBusqueda4m" onChange="document.forms[0].submit()" value="<?php echo isset($_SESSION['datos_bosque']['suptpfprest']) ? htmlspecialchars($_SESSION['datos_bosque']['suptpfprest']) : $suptpfprest;?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  id="suptpfprest" readonly></td>
    <td colspan="2" align="right">Sup. Total en SEL:</td>
    <td align="left"><input type="text" name="suptpfprestsel" class="boxBusqueda4m" onChange="document.forms[0].submit()" value="<?php echo isset($_SESSION['datos_bosque']['suptpfprestsel']) ? htmlspecialchars($_SESSION['datos_bosque']['suptpfprestsel']) : $suptpfprestsel;?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  id="suptpfprestsel" readonly></td>
  </tr>
  <tr>
    <td colspan="5" align="right" id='blau6'><hr></td>
    </tr>
  <tr>
    <td id='blau3'><span class="taulaH">5. Observaciones:</span></td>
    <td colspan="4" rowspan="2" id='blau3'><textarea name="RObservacion" id="RObservacion" cols="110" rows="4"><?php echo trim($row_obser['obsregistro']);?></textarea></td>
    </tr>
  <tr>
    <td id='blau7'>&nbsp;</td>
  </tr>
</table>
<br>
<input name="New_Predio" type="submit" class='boton verde formaBoton' value="Guardar">

<input id="action" name="action" type="hidden" class='cabecera2' value="0">

</form>
<?php include "../foot.php";?>
</div>
</BODY></HTML>
