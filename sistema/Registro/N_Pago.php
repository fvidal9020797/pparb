<?php
include "../Clases/SuperficieRegistro.php";
session_start();


    include "../cabecera.php";
    include "../reportes/Formulario_Preliquidacion.php";
	//seleccionar si la boleta de preliquidacion ya fue emitida
	include"page_pago.php";

	print_r($_SESSION);
if(isset($_REQUEST['Imprimir']))
{ 	$CodigoParcelas=$row_parcela['idparcela'];
	Formulario_Preliquidacion.ImprimirPreliquidacion($CodigoParcelas);
}
?>
<HTML>
<HEAD><TITLE>Llenado de Datos Contratos</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="../css/button.css"/>
<LINK href="../css/mdryt.css" type=text/css rel=stylesheet>
<script language="JavaScript" src="../scripts/funcionesRecibo.js">


</script>

<style type="text/css">
.demo {
	-moz-border-radius: 0px 0px 10px 10px;
	-webkit-border-radius: 0px 0px 10px 10px;
	border-radius: 0px 0px 10px 10px;
	}
</style>
<script language="JavaScript">
function pregunta(){
   if (confirm('¿Estas seguro de Habilitar la Parcela ?'))
   	{document.form3.submit();return true;}
   else
   	{alert("No envio");return false;}
}


</script>
</HEAD>
<?php
include_once('../scripts/body_handler.inc.php');
?>
<body>


          <table width="90%" align="center" border="0">
            <tr>
              <td width="92%" class="texto" align="center"><b><big>IMPRIMIR PLAN DE PAGOS </big></b> <br>
C&oacute;digo Parcela: <?php echo $row_parcela['idparcela']; ?> </td>
              <td width="8%" align="">
              <form action="N_Pago.php" method="post" name="form" >
               <input name='Imprimir' type='submit' class='boton verde formaBoton' id='Imprimir' value='Imprimir'>
              </form>
              </td>
            </tr>
          </table>

          <table width="90%" border="0" class='taulaA' align="center" cellspacing="0">
            <tr>
              <td height="14" colspan="4"><hr></td>
            </tr>
            <tr class="texto_normal">
              <td colspan="4" id='blau'><span class="taulaH">1. Datos Predio</span></td>
            </tr>
            <tr class="texto_normal">
              <td width="19%"  id='blau'>NOMBRE PREDIO:<br> UBICACION GEOGRAFICA:              </td>
              <td width="37%" class="texto" id='blau'><?php echo  "   ".$row_parcela['nombre']; ?><br><?php echo $row_parcela['comp']; ?>              </td>
              <td width="19%"  id='blau'>TIPO PROPIEDAD:<br>
              SITUACION JURIDICA:
              <br>
              ACTIVIDAD:<br>              </td>
              <td width="25%" class="texto" id='blau'><?php echo $row_parcela['TipoProp']; ?>
              <br>

              <?php echo $row_parcela['SitJur']; ?>
              <br>
              <?php echo $row_parcela['Clasificacion']; ?></td>
            </tr>
            <tr class="texto_normal">
              <td colspan="4" id='blau'><span class="taulaH">2. Datos Sobre Superficie Deforestada Ilegal:</span></td>
            </tr>
            <tr class="texto_normal">
              <td colspan="4" id='blau6'><table width="100%" border="0" class='taulaA'>

                <tr>
                  <td width="11%"  id="blau">Sup. Def. Ilegal: </td>
                  <td width="15%" ><?php echo $_SESSION['superficie337']->get_suptotal().' ha.'?></td>
                  <td width="11%"  id="blau">Sup. en T.P.F.P.: </td>
                  <td width="13%"><?php echo $_SESSION['superficie337']->get_suptpfp().' ha.'?></td>
                  <td width="10%"  id="blau">Sup. T.U.M.: </td>
                  <td width="15%"><?php echo $_SESSION['superficie337']->get_suptum() .' ha.'?></td>
                </tr>
              </table>
                <table width="100%" class="taulaA" border="1"  cellspacing="0">
                  <tr>
                    <td width="7%" rowspan="6"   id="blau">&nbsp;</td>
                    <td rowspan="2" class="cabecera2"  id="blau">&nbsp;</td>
                    <td height="43" colspan="2" align="center" class="cabecera2" ><span >ART. 6 LEY 337 SANCION ADMINISTRATIVA POR DESMONTE SIN AUTORIZACION MONTO EN UFV</span></td>
                    <td width="9%" rowspan="6"  id="blau"><p>
                      <input type="hidden" name="valor_ufv" id="valor_ufv" value="<?php echo $row_ufv['valor_ufv']; ?>" />
                    </p>
                      <p class="boxRojo" align="center"><?php if(trim($row_ufv['valor_ufv'])==""){echo "Solicite al Administrador del Sistema que se actualice la UFV para el dia de hoy";}?> </p></td>
                    <td rowspan="2" class="cabecera2"  id="blau">&nbsp;</td>
                    <td colspan="2" class="cabecera2"><span >CALCULO APROXIMADO DE PAGO DE ACUERDO AL DESMONTE TIPO DE CAMBIO UFV DE: </span><span class="celdaAmarilla"><?php echo $row_ufv['valor_ufv'].' Bs.';?></span><span > DEL DIA </span><span class="celdaAmarilla"><?php echo $row_ufv['fecha_ufv']; ?></span></td>
                    <td width="7%" rowspan="6" >&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="15%" class="cabecera2" ><span >CONTADO</span></td>
                    <td width="18%" class="cabecera2"  id="blau">PLAZOS</td>
                    <td class="cabecera2" ><span >CONTADO</span></td>
                    <td class="cabecera2"  id="blau">PLAZOS</td>
                  </tr>
                  <tr>
                    <td  id="blau">TPFP</td>
                    <td ><span ><?php echo $row_monprop['tpfpcontado']*$_SESSION['superficie337']->get_suptpfp().' UFV'; ?></span></td>
                    <td  id="blau"><?php echo $row_monprop['tpfpplazos']*$_SESSION['superficie337']->get_suptpfp().' UFV'; ?></td>
                    <td  id="blau">Monto Bs. T.P.F.P.: </td>
                    <td><span ><?php echo (round(floatval($row_monprop['tpfpcontado']*$_SESSION['superficie337']->get_suptpfp()*$row_ufv['valor_ufv'])*100)/100).' Bs'; ?></span></td>
                    <td  id="blau"><?php echo (round(floatval($row_monprop['tpfpplazos']*$_SESSION['superficie337']->get_suptpfp()*$row_ufv['valor_ufv'])*100)/100).' Bs'; ?></td>
                  </tr>
                  <tr>
                    <td  id="blau">TUM</td>
                    <td ><span ><?php echo $row_monprop['tumcontado']*$_SESSION['superficie337']->get_suptum().' UFV';?></span></td>
                    <td  id="blau"><?php echo $row_monprop['tumplazos']*$_SESSION['superficie337']->get_suptum().' UFV';?></td>
                    <td  id="blau">Monto Bs. T.U.M.: </td>
                    <td><span ><?php echo (round(floatval($row_monprop['tumcontado']*$_SESSION['superficie337']->get_suptum()*$row_ufv['valor_ufv'])*100)/100).' Bs'; ?></span></td>
                    <td  id="blau"><?php echo (round(floatval($row_monprop['tumplazos']*$_SESSION['superficie337']->get_suptum()*$row_ufv['valor_ufv'])*100)/100).' Bs'; ?></td>
                  </tr>
                  <tr class="TituloCajaNegocios">
                    <td class="TituloCajaNegocios" id="blau3">Total:</td>
                    <td ><input name="pcontadoufvT2" type="text" class="boxBusqueda4" id="pcontadoufvT2" value="<?php $contufv=(($row_monprop['tpfpcontado']*$_SESSION['superficie337']->get_suptpfp())+($row_monprop['tumcontado']*$_SESSION['superficie337']->get_suptum())); echo (round($contufv*100)/100).' UFV';  ?>"  maxlength="15" readonly></td>
                    <td><input name="pplazoufvT2" type="text" class="boxBusqueda4" id="pplazoufvT2" value="<?php $plazoufv=($row_monprop['tpfpplazos']*$_SESSION['superficie337']->get_suptpfp())+($row_monprop['tumplazos']*$_SESSION['superficie337']->get_suptum()); echo (round($plazoufv*100)/100).' UFV' ; ?>"  maxlength="15" readonly></td>
                    <td  id="blau3">Total:</td>
                    <td><input name="pcontadobsT2" type="text" class="boxBusqueda4" id="pcontadobsT2" value=" <?php echo (round(floatval($contufv*$row_ufv['valor_ufv'])*100)/100).' Bs'; ?>"  maxlength="15" disabled></td>
                    <td id="blau3"><input name="pcontadobsT4" type="text" class="boxBusqueda4" id="pcontadobsT4" value=" <?php echo (round(floatval($plazoufv*$row_ufv['valor_ufv'])*100)/100).' Bs'; ?>"  maxlength="15" disabled></td>
                  </tr>
                  <tr class="TituloCajaNegocios">
                    <td width="7%"  id="blau">Total Con Descuento</td>
                    <td><input name="pcontadoufvT" type="text" class="boxBusqueda4" id="pcontadoufvT" value="<?php $tot =(($row_monprop['tpfpcontado']*$_SESSION['superficie337']->get_suptpfp())+($row_monprop['tumcontado']*$_SESSION['superficie337']->get_suptum()))-($_SESSION['sup_defPago']*$row_monprop['tumcontado']); echo (round($tot*100)/100);  ?>"  maxlength="15" readonly></td>
                    <td><input name="pplazoufvT" type="text" class="boxBusqueda4" id="pplazoufvT" value="<?php $tot1=($row_monprop['tpfpplazos']*$_SESSION['superficie337']->get_suptpfp())+($row_monprop['tumplazos']*$_SESSION['superficie337']->get_suptum())-($_SESSION['sup_defPago']*$row_monprop['tumplazos']); echo (round($tot1*100)/100); ?>"  maxlength="15" readonly></td>
                    <td width="9%"  id="blau">Total Con Descuento</td>
                    <td width="16%"><input name="pcontadobsT" type="text" class="boxBusqueda4" id="pcontadobsT" value=" <?php echo (round(floatval($tot*$row_ufv['valor_ufv'])*100)/100).' Bs'; ?>"  maxlength="15" disabled></td>
                  <td width="14%" id="blau"><input name="pcontadobsT3" type="text" class="boxBusqueda4" id="pcontadobsT3" value=" <?php echo (round(floatval($tot1*$row_ufv['valor_ufv'])*100)/100).' Bs'; ?>"  maxlength="15" disabled></td>
                  </tr>
              </table>
              </td>
            </tr>
            <tr class="texto_normal">
              <td colspan="4" id='blau'><span class="taulaH">3. Seleccionar la modalidad de Pago</span></td>
            </tr>


            <tr>
              <td height="38" colspan="4"><?php if($mensaje==1){
			  echo "No Se puede realizar la Boleta de Preliquidación ya que no se cuenta con el numero de Familias de la comunidad";
			  }elseif($mensaje==2){ echo "No Corresponde realizar pago de esta propiedad. De acuerdo al  Art. 6 paragrafo II de la Ley 337 Donde se Eximen de Pago en el caso de las pequeña propiedad la exencion de la multa de hasta veinte hectarias desmontadas, se dara siempre que el predio tenga una superficie igual o menor a cincuenta ha."; ?>

				 <form align="middle" action="N_Pago.php" method="post" name="form3" onSubmit="return pregunta()">
                  <input type='image' src='../images/habilitar.png' onClick="this.form3.submit()">
                  <input type="hidden" name="Habilitar" value="Pagos">
                 </form>

             <?php

			 $causal = pg_query($cn,"select * from eliminarBoletaPago (".$_SESSION['idreg'].")");
			 }

       elseif($mensaje==3){ echo "No Corresponde realizar pago de esta propiedad. De acuerdo al  Art. 6 paragrafo III de la Ley 502 Donde se Eximen de Pago los desmontes realizados por beneficiarios de propiedades colectivas hasta una superficie de 20 hs  por unidad familiar.";
			  echo '<br>';
			  echo " En este Predio la Superficie Deforestada Exenta de pago es:  ".$_SESSION['sup_defPago']."ha.  ya que cuenta con ".$row_comunidad['nfamilia']." Familias."; ?>
			  <form align="middle" action="N_Pago.php" method="post" name="form3" onSubmit="return pregunta()">
                  <input type='image' src='../images/habilitar.png' onClick="this.form3.submit()">
                  <input type="hidden" name="Habilitar" value="Pagos">
              </form>

             <?php $causal = pg_query($cn,"select * from eliminarBoletaPago (".$_SESSION['idreg'].")");
			  }


        elseif($mensaje==6){ echo "una superficie de 20 hs  por unidad familiar.";
         echo '<br>';
         echo " En este Predio l"; ?>
         <form align="middle" action="N_Pago.php" method="post" name="form3" onSubmit="return pregunta()">
                   <input type='image' src='../images/habilitar.png' onClick="this.form3.submit()">
                   <input type="hidden" name="Habilitar" value="Pagos">
               </form>

              <?php $causal = pg_query($cn,"select * from eliminarBoletaPago (".$_SESSION['idreg'].")");
         }






        else{
			   if($mensaje==4){$a=($_SESSION['superficie337']->get_suptotal()-$_SESSION['sup_defPago']);echo "No Corresponde realizar pago de esta propiedad. De acuerdo al  Art. 6 paragrafo III de la Ley 502 Donde se Eximen de Pago en el caso de las pequeña propiedad la exencion de la multa de hasta veinte hectarias desmontadas, se dara siempre que el predio tenga una superfici igual o menor a cincuenta ha. ".'<br>'." El predio debe pagar la multa sobre: ".$a." ha.";}
			   elseif($mensaje==5){$a=($_SESSION['superficie337']->get_suptotal()-$_SESSION['sup_defPago']);echo "No Corresponde realizar pago de esta propiedad en la Totalidad. De acuerdo al  Art. 6 paragrafo III de la Ley 502 Donde se Eximen de Pago los desmontes realizados por beneficiarios de propiedades colectivas hasta una superficie de 20 hs  por unidad familiar. ".'<br>'." El predio debe pagar la multa sobre:".$a." ha.";}
			 ?>

                <form action="N_Pago.php" method="POST" name="formulario" enctype="multipart/form-data" onSubmit="return valida(this);">
              <table width="100%" border="0" class='<?php if($existe>0){ echo "taulaH";}else{echo "taulaA";} ?>'>
                <tr>
                  <td width="11%"  id="blau">Modalidad de Pago:</td>
                  <td width="15%" ><select onChange=" <?php echo 'numcuota(TipoPago,'.date("Y").','.date("m").','.date("d").')';?>"  name="TipoPago" class="combos" id="TipoPago" >
                   <option value=0>ELEGIR ...</option>
                    <?php

		       do {   ?>
                    <option value="<?php echo $row_TipoPago['idcodificadores'];?>"
                <?php  if(isset($_SESSION['datos_pago']['TipoPago'])&&($_SESSION['datos_pago']['TipoPago'] == $row_TipoPago['idcodificadores'])){
											echo " selected";
				       }elseif ( isset($row_preliquidacion['idtipopago']) && $row_TipoPago['idcodificadores']==$row_preliquidacion['idtipopago']){
						      echo " selected";
											} ?>
                 > <?php echo $row_TipoPago['nombrecodificador'];?></option>
                    <?php } while ($row_TipoPago = pg_fetch_assoc($TipoPago));?>
                  </select></td>
                  <td colspan="4" class="boxRojo" > <?php if($existe==1){ echo "BOLETA DE PRELIQUIDACION YA EMITIDA EN FECHA ".$row_preliquidacion['fechapreliquidacion']." Con valor de ufv=".$row_preliquidacion['valor_ufv'];} elseif($existe==2){echo" BOLETA DE PRELIQUIDACION ACTUALIZADA AL DIA DE HOY"; } ?></td>
                </tr>
                <tr>
                  <td colspan="6"  id="blau"><hr></td>
                </tr>
                <tr>
                  <td colspan="2"  align="center" id="blau2">&nbsp;</td>
                  <td width="11%"  id="blau2">&nbsp;</td>
                  <td width="13%">&nbsp;</td>
                  <td width="25%" colspan="2" align="center" id="blau2">&nbsp;</td>
                </tr>
              </table>
              <table align="center" width="97%" border="1" cellspacing="0" cellpadding="0" class="taulaA" id="dataTable">
                <tr align="center">
                  <td width="10%" class="cabecera2">Numero de Cuota</td>
                  <td width="30%" class="cabecera2">Monto UFV</td>
                  <td width="30%" class="cabecera2">Monto Aproximado en Bs</td>
                  <td width="30%" class="cabecera2">Fecha Aproximada de Pago</td>
                </tr>
                <?php

				 if((isset($_SESSION['datos_pago']['num_pago']) && $_SESSION['datos_pago']['num_pago']>0)|| (isset($num_cuotas) && $num_cuotas>0)){
				   if(isset($_SESSION['datos_pago']['num_pago'])&&($_SESSION['datos_pago']['num_pago']>0))
					 {$num=$_SESSION['datos_pago']['num_pago'];}
					 else
					 {$num=$num_cuotas; $row_cuotas = pg_fetch_assoc($cuotas);}
				 ?>
                <tr >
                  <td>1</td>
                  <td><input name="montoinicial" type="text" class="boxBusqueda4" id="montoinicial" onChange="extractNumber(this,2,false)" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_pago']['montoinicial']) ? htmlspecialchars($_SESSION['datos_pago']['montoinicial']) : $row_preliquidacion['montoinicial'];?>"  maxlength="15" readonly></td>
                  <td><input name="montoinicialbs" type="text" class="boxBusqueda4" id="montoinicialbs" onChange="extractNumber(this,2,false)" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_pago']['montoinicialbs']) ? htmlspecialchars($_SESSION['datos_pago']['montoinicialbs']) : (round(floatval($row_preliquidacion['montoinicial']*$row_preliquidacion['valor_ufv'])*100)/100);?>"  maxlength="15" readonly></td>
                  <td><input name="<?php echo 'fechacuota0'; ?>" type="text" class="boxBusqueda4" id="<?php echo 'fechacuota0'; ?>"   value="<?php echo isset($_SESSION['datos_pago']['fechacuota0']) ? htmlspecialchars($_SESSION['datos_pago']['fechacuota0']) : $row_preliquidacion['fechapreliquidacion'];?>"  maxlength="15"  ></td>
                </tr>
                <?php
				//if(!isset($_SESSION['datos_pago']['numerocuota']) && isset($row_cuotas)){$row_cuotas = pg_fetch_assoc($cuotas);}

				for ($i = 2; $i <=$num ; $i++) { ?>
                <tr >
                  <td ><input name="<?php echo 'numerocuota'.$i; ?>2" type="text" m class="boxBusqueda4" id="<?php echo 'numerocuota'.$i; ?>2" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_pago']['numerocuota'.$i]) ? htmlspecialchars($_SESSION['datos_pago']['numerocuota'.$i]) : $row_cuotas['numerocuota'];?>"  maxlength="15"></td>
                  <td ><input name="<?php echo 'montoxcuota'.$i; ?>" type="text" class="boxBusqueda4" id="<?php echo 'montoxcuota'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_pago']['montoxcuota'.$i]) ? htmlspecialchars($_SESSION['datos_pago']['montoxcuota'.$i]) : $row_cuotas['montoxcuota']; ?>"  maxlength="15"></td>
                  <td  ><input name="<?php echo 'montoxcuotabs'.$i; ?>" type="text" class="boxBusqueda4" id="<?php echo 'montoxcuotabs'.$i; ?>" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_pago']['montoxcuotabs'.$i]) ? htmlspecialchars($_SESSION['datos_pago']['montoxcuotabs'.$i]) : (round(floatval($row_cuotas['montoxcuota']*$row_preliquidacion['valor_ufv'])*100)/100) ; ?>"  maxlength="15" ></td>
                  <td ><input name="<?php echo 'fechacuota'.$i; ?>" type="text" class="boxBusqueda4" id="<?php echo 'fechacuota'.$i; ?>"   value="<?php echo isset($_SESSION['datos_pago']['fechacuota'.$i]) ? htmlspecialchars($_SESSION['datos_pago']['fechacuota'.$i]) : $row_cuotas['fechacuota'];?>"  maxlength="15"  ></td>
                  <?php
			       if(!isset($_SESSION['datos_pago']['numerocuota']) && isset($row_cuotas)){$row_cuotas = pg_fetch_assoc($cuotas);}
				 }
				}

			?>
                </tr>
              </table>
              <table align="center" width="97%" border="1" cellspacing="0" cellpadding="0" class="taulaA" id="dataTable2">


                <tr >
                  <td width="10%" >Total</td>
                  <td width="30%" ><input name="montototal" type="text" class="boxBusqueda4" id="montototal" onChange="extractNumber(this,2,false)" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_pago']['montototal']) ? htmlspecialchars($_SESSION['datos_pago']['montototal']) : $row_preliquidacion['montototal'];?>"  maxlength="15" readonly></td>
                  <td width="30%"  ><input name="montototalbs" type="text" class="boxBusqueda4" id="montototalbs" value="<?php echo isset($_SESSION['datos_pago']['montototalbs']) ? htmlspecialchars ($_SESSION['datos_pago']['montototalbs']) : (round(floatval($row_preliquidacion['montototal']*$row_preliquidacion['valor_ufv'])*100)/100);?>"  maxlength="15" readonly></td>
                  <td width="30%" >&nbsp;</td>
                </tr>
              </table>
              <p align="center">
                <input id="cuota" name="cuota" type="hidden" value="<?php if(isset($_SESSION['datos_pago']['cuota'])){ echo $_SESSION['datos_pago']['cuota'];}elseif(isset($num_cuotas)){echo $num_cuotas;} ?>" />
                <input id="num_pago" name="num_pago" type="hidden" value="<?php echo isset($_SESSION['datos_pago']['num_pago']) ? htmlspecialchars($_SESSION['datos_pago']['num_pago']) :0;?>" />
                <input type="hidden" name="ufv" value="<?php echo $row_ufv['idvalorufv'];?>" />
                <input type="hidden" name="MM_insert" value="form1" />

                <?php if(trim($row_ufv['valor_ufv'])!=""){
                echo "<input name='submit' type='submit' class='boton verde formaBoton' value='Guardar'>";
                  }?>
              </p>
              </form>            </td>

             <?php }?></tr>
          </table>
          <p><br>
            <br><br>
            <br>
          </p>

        </div>
<?php include "../foot.php";?>
</BODY></HTML>
