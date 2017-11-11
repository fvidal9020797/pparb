<?php session_start();set_time_limit(5000); 
include "../cabecera.php";
	
if(!isset($_SESSION['idreg'])){
$idreg=$_POST['idreg']; $_SESSION['idreg']=$idreg;
}

/// select datos predio///
    $sql_parcela = "select * FROM v_parcela where idregistro=".$_SESSION['idreg'];
	$parcela = pg_query($cn,$sql_parcela);
	$row_parcela = pg_fetch_array ($parcela);
	//$num_parcela=pg_num_rows($parcela);
///datos sup///
	$sql_suprest = "select suptpfp,suptum, supdefilegal  FROM suprestitucion where idregistro=".$_SESSION['idreg'];
	$suprest = pg_query($cn,$sql_suprest);
	$row_suprest = pg_fetch_array ($suprest);
/// monto pago por tipo de propiedad
	$sql_monprop = "SELECT   ufvtipoprop.tpfpplazos, ufvtipoprop.tpfpcontado,  ufvtipoprop.tumplazos,  ufvtipoprop.tumcontado
					FROM ufvtipoprop, parcelas, registro
     				WHERE  ufvtipoprop.idtipopropiedad = parcelas.idtipoprop AND  parcelas.idparcela = registro.idparcela AND  registro.idregistro =".$_SESSION['idreg'];
	$monprop = pg_query($cn,$sql_monprop);
	$row_monprop = pg_fetch_array ($monprop);
	 //entidad Fianciera
	$sql_banco= "SELECT * FROM entidadbancaria where habilitado='H'";
	$banco = pg_query($cn,$sql_banco);
	$row_banco = pg_fetch_array ($banco);
	$num_banco=pg_num_rows($banco);
	//numero de cuotas canceladas
	//entidad Fianciera
	$sql_cuotas= "SELECT  pd.idpagodesmonte, valoresufv.valor_ufv, pd.montoinicial, pd.montoplazos, c.nombrecodificador, pd.cuotas, pd.idtipopago, pd.fechapreliquidacion
				FROM   pagopordesmonte pd,   valoresufv, codificadores c
				WHERE   pd.idvalorufv = valoresufv.idvalorufv AND  pd.idtipopago = c.idcodificadores and pd.idregistro=".$_SESSION['idreg'];
	$cuotas = pg_query($cn,$sql_cuotas);
	$row_cuotas = pg_fetch_array ($cuotas);
	$num_cuotas=pg_num_rows($cuotas);
	//TIPO DE PAGO
	$sql_modalidadPago= "SELECT pagopordesmonte.montoinicial, pagopordesmonte.montoplazos, c1.nombrecodificador AS modalidad,pagopordesmonte.cuotas
							FROM  pagopordesmonte, codificadores c1
							WHERE c1.idcodificadores = pagopordesmonte.idtipopago and pagopordesmonte.idregistro =".$_SESSION['idreg'];
	$modalidadPago = pg_query($cn,$sql_modalidadPago);
	$row_modalidadPago = pg_fetch_array ($modalidadPago);
	
	if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
	{ 	include_once('../scripts/error_handler.inc.php');
		// set to the user defined error handler
		$old_error_handler = set_error_handler("ErrorHandler");
		$datos_recibo=$_POST;
		session_register('datos_recibo');
		$insertaux=sprintf("select * from f_recibo  (%s, %s, %s, %s, %s, %s);",
										 GetSQLValueString($_SESSION['idreg'], "int"),
										 GetSQLValueString($_SESSION['datos_recibo']['numcuota'], "int"),
										 GetSQLValueString($_SESSION['datos_recibo']['entidad'], "int"),
										 GetSQLValueString($_SESSION['datos_recibo']['numboleta'], "text"),
										 GetSQLValueString($_SESSION['datos_recibo']['montocancelado'], "float"),
										 GetSQLValueString($_SESSION['datos_recibo']['FechaPago'], "int")); //id de la fecha de ufv
		$Result2 = pg_query($cn, $insertaux);	
		echo $insertaux;
		if (!(isset($_SESSION['ErrorThrown']) && $_SESSION['ErrorThrown'] != ""))  
		{ 
		   header("Location: N_Pago.php");
		}
	}
	//print_r($_SESSION);
?>
<HTML>
<HEAD><TITLE>Llenado de Datos Contratos</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<LINK href="../css/mdryt.css" type=text/css rel=stylesheet>
<script>
function numcuotas(tipo,cuota){
		var a=tipo.value;
		var ufv=document.getElementById('valor_ufv').value;
		var cTufv= document.getElementById('pcontadoufvT').value;
		var pTufv=document.getElementById('pplazoufvT').value;
		
		if(cTufv.trim==""){cTufv=0;}
		if(pTufv.trim==""){pTufv=0;}
		
		var cTbs=Math.round(parseFloat(cTufv)*parseFloat(ufv)*100)/100;
		var pTbs=Math.round(parseFloat(pTufv)*parseFloat(ufv)*100)/100;
		//alert(ufv);
		switch(a)
		{
			case '96': //mesual
				cuota.value=24;
				document.getElementById('pcontadoufv').value=Math.round(parseFloat(pTufv)/2*100)/100;
				document.getElementById('pcontadobs').value=Math.round(parseFloat(pTbs)/2*100)/100;
				document.getElementById('pplazoufv').value=Math.round(parseFloat(pTufv/2)/24*100)/100;
				document.getElementById('pplazobs').value=Math.round(parseFloat(pTbs/2)/24*100)/100; 
				
				break;
			case '97': //trimestral
				cuota.value=8;
				document.getElementById('pcontadoufv').value=Math.round(parseFloat(pTufv)/2*100)/100;
				document.getElementById('pcontadobs').value=Math.round(parseFloat(pTbs)/2*100)/100;
				document.getElementById('pplazoufv').value=Math.round(parseFloat(pTufv/2)/8*100)/100;
				document.getElementById('pplazobs').value=Math.round(parseFloat(pTbs/2)/8*100)/100; 

				 break;
			 case '98': //semestral
				 cuota.value=4;
				document.getElementById('pcontadoufv').value=Math.round(parseFloat(pTufv)/2*100)/100;
				document.getElementById('pcontadobs').value=Math.round(parseFloat(pTbs)/2*100)/100;
				document.getElementById('pplazoufv').value=Math.round(parseFloat(pTufv/2)/4*100)/100;
				document.getElementById('pplazobs').value=Math.round(parseFloat(pTbs/2)/4*100)/100; 
	
				break;
			 case '99': //anual
				cuota.value=2;
				document.getElementById('pcontadoufv').value=Math.round(parseFloat(pTufv)/2*100)/100;
				document.getElementById('pcontadobs').value=Math.round(parseFloat(pTbs)/2*100)/100;
				document.getElementById('pplazoufv').value=Math.round(parseFloat(pTufv/2)/2*100)/100;
				document.getElementById('pplazobs').value=Math.round(parseFloat(pTbs/2)/2*100)/100; 
	
				 break;
			 case '100': //pago unico
				cuota.value=0;
				document.getElementById('pcontadoufv').value=Math.round(parseFloat(pTufv)/2*100)/100;
				document.getElementById('pcontadobs').value=Math.round(parseFloat(pTbs)/2*100)/100;
				document.getElementById('pplazoufv').value=0;
				document.getElementById('pplazobs').value=0;

				 break;
			 case '104': //dos pagos
				cuota.value=1;
				document.getElementById('pcontadoufv').value=Math.round(parseFloat(pTufv)/2*100)/100;
				document.getElementById('pcontadobs').value=Math.round(parseFloat(pTbs)/2*100)/100;
				document.getElementById('pplazoufv').value=Math.round(parseFloat(pTufv/2)*100)/100;
				document.getElementById('pplazobs').value=Math.round(parseFloat(pTbs/2)*100)/100; 
	
				 break;
			default:
			    cuota.value=0;
				document.getElementById('pcontadoufv').value=0;
				document.getElementById('pcontadobs').value=0;
				document.getElementById('pplazoufv').value=0;
				document.getElementById('pplazobs').value=0;
		}
		//alert(tipo.value);
	}
</script>
<script language="JavaScript" src="../scripts/funciones.js"></script>
<style type="text/css">
.demo {
	-moz-border-radius: 0px 0px 10px 10px;
	-webkit-border-radius: 0px 0px 10px 10px;
	border-radius: 0px 0px 10px 10px;
	}
</style>
</HEAD>
<BODY>

        <div align="center" class="texto">
       
          <p><br>
          <b><big>IMPRIMIR PLAN DE PAGOS </big></b>
          <br>
          C&oacute;digo Parcela: <?php echo $row_parcela['idparcela']; ?> </p>
          <table width="90%" border="0" class='taulaA' align="center" cellspacing="0">
            <tr>
              <td height="14" colspan="4"><hr></td>
            </tr>
            <tr class="texto_normal">
              <td colspan="4" id='blau2'><span class="taulaH">1. Datos Predio</span></td>
            </tr>
            <tr class="texto_normal">
              <td width="19%" class="noborder" id='blau2'>NOMBRE PREDIO:<br>
                UBICACION GEOGRAFICA: </td>
              <td width="37%" class="texto" id='blau2'><?php echo  "   ".$row_parcela['nombre']; ?><br>
                  <?php echo $row_parcela['comp']; ?> </td>
              <td width="19%" class="noborder" id='blau2'>TIPO PROPIEDAD:<br>
                SITUACION JURIDICA: <br>
                ACTIVIDAD:<br>
              </td>
              <td width="25%" class="texto" id='blau2'><?php echo $row_parcela['TipoProp']; ?> <br>
                  <?php echo $row_parcela['SitJur']; ?> <br>
                  <?php echo $row_parcela['Clasificacion']; ?></td>
            </tr>
            <tr class="texto_normal">
              <td colspan="4" id='blau2'><span class="taulaH">2. Datos Sobre Superficie Deforestada Ilegal - Modalidad de Pago:</span></td>
            </tr>
            <tr class="texto_normal">
              <td colspan="4" id='blau6'><table width="100%" border="0" class='taulaA'>
                  <tr>
                    <td class="noborder" id="blau3">Sup. Def. Ilegal: </td>
                    <td ><?php echo isset($row_suprest['supdefilegal']) ? htmlspecialchars($row_suprest['supdefilegal'].' ha.') : '' .'ha.'?></td>
                    <td class="noborder" id="blau3">Sup. en T.P.F.P.: </td>
                    <td><?php echo isset($row_suprest['suptpfp']) ? htmlspecialchars($row_suprest['suptpfp'].' ha.') : '' .'ha.'?></td>
                    <td class="noborder" id="blau3">Sup. T.U.M.: </td>
                    <td><?php echo isset($row_suprest['suptum']) ? htmlspecialchars($row_suprest['suptum'].' ha.') : '' .'ha.'?></td>
                  </tr>
                  <tr>
                    <td class="noborder" id="blau4">Modalidad de Pago: </td>
                    <td ><?php echo isset($row_modalidadPago['modalidad']) ? htmlspecialchars($row_modalidadPago['modalidad']) : '' ?></td>
                    <td class="noborder" id="blau4">Monto Inicial a Pagar:</td>
                    <td><?php echo isset($row_modalidadPago['montoinicial']) ? htmlspecialchars($row_modalidadPago['montoinicial'].' UFV' ) : '0'.' UFV' ?></td>
                    <td class="noborder" id="blau4">Numero de cuotas a Pagar</td>
                    <td><?php echo isset($row_modalidadPago['cuotas']) ? htmlspecialchars($row_modalidadPago['cuotas']) : '' ?></td>
                  </tr>
                  <tr>
                    <td width="11%" class="noborder" id="blau">&nbsp;</td>
                    <td width="15%" >&nbsp;</td>
                    <td width="11%" class="noborder" id="blau">&nbsp;</td>
                    <td width="13%">&nbsp;</td>
                    <td width="11%" class="noborder" id="blau">Monto por cuotas a Pagar</td>
                    <td width="13%"><?php echo isset($row_modalidadPago['montoplazos']) ? htmlspecialchars($row_modalidadPago['montoplazos'].' UFV') : '0'.' UFV' ?></td>
                  </tr>
              </table></td>
            </tr>
            <tr class="texto_normal">
              <td colspan="4" id='blau7'><span class="taulaH">3. Datos Recibo de Pago</span></td>
            </tr>
            <tr>
              <td height="38" colspan="4"><form action="N_Recibo.php" method="POST" name="formulario" enctype="multipart/form-data" onSubmit="return valida(this);">
                  <table width="100%" border="0" class='taulaA'>
                    <tr>
                      <td width="15%" class="noborder" id="blau10">Entidad Bancaria:</td>
                      <td width="37%" ><?php echo $row_banco['nombreentidad'].' - '.$row_banco['numerocuenta']?></td>
                      <td width="15%"><span class="noborder">Numero de Cuotas Canceladas: </span></td>
                      <td width="14%" class="noborder" id="blau10"><?php $num_banco=$num_banco-1;  echo $num_banco?></td>
                      <td width="19%"><select name="FechaPago0" disabled class="combos" id="FechaPago0" >
                          <?php $monto_ufv;
						    //monto UFV
					$sql_ufv= "SELECT * FROM valoresufv order by fecha_ufv desc";
					$ufv = pg_query($cn,$sql_ufv);
					$row_ufv = pg_fetch_array ($ufv);

		 	    do {   ?>
                          <option value="<?php echo $row_ufv['idvalorufv']?>"
                <?php  if(isset($_SESSION['datos_recibo']['FechaPago']) && ($_SESSION['datos_recibo']['FechaPago'] == $row_ufv['idvalorufv'])){
											echo " selected"; $monto_ufv=$row_ufv['valor_ufv'];
				       }else{$monto_ufv=$row_ufv['valor_ufv'];
					   }
				 ?>
                 > <?php echo $row_ufv['fecha_ufv'].' valor ufv :'.$row_ufv['valor_ufv']?></option>
                          <?php } while ($row_ufv = pg_fetch_assoc($ufv));?>
                      </select></td>
                    </tr>
                    <tr>
                      <td height="22" colspan="5" class="noborder" id="blau9"><table width="97%" border="1" cellspacing="0" cellpadding="0" class="taulaA" id="sels">
                          <tr align="center">
                            <td class="cabecera2">&nbsp;</td>
                            <td class="cabecera2">Fecha Cancelación</td>
                            <td class="cabecera2">Numero de Cuota Cancelada</td>
                            <td class="cabecera2">Monto cancelado en Bs</td>
                            <td width="162" class="cabecera2">Numero de Boleta Pago</td>
                            <td width="135" class="cabecera2">Pago Aproximado en UFV </td>
                            <td width="261" class="cabecera2">Imprimir Boleta</td>
                          </tr>
                          <?php 
				 if(isset($_SESSION['datos_recibo']['num_recibo'])&&($_SESSION['datos_recibo']['num_recibo']>0))
					 {$num=$_SESSION['datos_recibo']['num_recibo'];}
					 else
					 {$num=$num_cuotas;}
					
					 for ($i = 1; $i <=$num ; $i++) { 
					 if(isset($_SESSION['datos_recibo']['num_recibo'])|| (isset($num_cuotas) && $num_cuotas>0)){
				 ?>
                          <tr >
                            <td width="29"><input type="checkbox" name="chk"/></td>
                            <td width="183"><select name="<?php echo 'FechaPago'.$i; ?>" onChange=" <?php echo 'actualizavalor('.$i.')'; ?>" class="combos" id="<?php echo 'FechaPago'.$i; ?>" >
                                <?php $monto_ufv=0;
						    //monto UFV
					$sql_ufv= "SELECT * FROM valoresufv order by fecha_ufv desc ";
					$ufv = pg_query($cn,$sql_ufv);
					$row_ufv = pg_fetch_array ($ufv);

		 	    do {   ?>
                                <option value="<?php echo $row_ufv['idvalorufv']?>"
                <?php  if(isset($_SESSION['datos_recibo']['FechaPago'.$i]) && ($_SESSION['datos_recibo']['FechaPago'.$i] == $row_ufv['idvalorufv'])){
								echo " selected"; $monto_ufv=$row_ufv['valor_ufv'];
				       }elseif(isset($row_cuotas['idcultivo']) && $row_cuotas['idcultivo']== $row_ufv['idvalorufv']){	
					            echo " selected";$monto_ufv=$row_ufv['valor_ufv'];
					   }
					   
				 ?>
                 > <?php echo $row_ufv['fecha_ufv'].' valor ufv :'.$row_ufv['valor_ufv']?></option>
                                <?php } while ($row_ufv = pg_fetch_assoc($ufv));?>
                              </select>
                                <input type="hidden" name="<?php echo 'montoufv'.$i; ?>" onChange=" <?php echo 'actualizavalor('.$i.')'; ?>"  id= "<?php echo 'montoufv'.$i; ?>" value="<?php echo $monto_ufv;?>" /></td>
                            <td  width="158"><input name="<?php echo 'numerocuota'.$i; ?>" type="text" class="boxBusqueda4" id="<?php echo 'numerocuota'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_recibo']['numerocuota'.$i]) ? htmlspecialchars($_SESSION['datos_recibo']['numerocuota'.$i]) : $row_cuotas['numerocuota'] ?>"  maxlength="15"></td>
                            <td  width="199"><input name="<?php echo 'montodeposito'.$i; ?>" type="text" class="boxBusqueda4" id="<?php echo 'montodeposito'.$i; ?>" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_recibo']['montodeposito'.$i]) ? htmlspecialchars($_SESSION['datos_recibo']['montodeposito'.$i]) : $row_cuotas['montodeposito'] ?>"  maxlength="15" ></td>
                            <td><input name="<?php echo 'nboleta'.$i; ?>" type="text" class="boxBusqueda4" id="<?php echo 'nboleta'.$i; ?>"   value="<?php echo isset($_SESSION['datos_recibo']['nboleta'.$i]) ? htmlspecialchars($_SESSION['datos_recibo']['nboleta'.$i]) : $row_cuotas['nboleta']?>"  maxlength="15"  ></td>
                            <td><input name="<?php echo 'paproxbs'.$i; ?>" type="text" class="boxBusqueda4" id="<?php echo 'paproxbs'.$i; ?>" value="<?php echo isset($_SESSION['datos_recibo']['paproxbs'.$i]) ? htmlspecialchars($_SESSION['datos_pago']['paproxbs'.$i]) : ($row_cuotas['montodeposito']/$monto_ufv) ?>"  maxlength="15" readonly></td>
                            <td></td>
                          </tr>
                          <?php 
			 if(!isset($_SESSION['datos_pago']['numerocuota']) && isset($row_cuotas)){$row_cuotas = pg_fetch_assoc($cuotas);}
				}
				}
			  
			?>
                      </table></td>
                    </tr>
                  </table>
                <table width="100%" border="0">
                    <tr>
                      <td width="35%">&nbsp;</td>
                      <td width="10%" class="taulaA"><input name="submit2" type="button" class='cabecera2' value="Añadir" onClick="addRowRecibo('dataTable','num_cul0')">
                          <input id="num_recibo" name="num_recibo" type="hidden" value="<?php echo isset($_SESSION['datos_recibo']['num_recibo']) ? htmlspecialchars($_SESSION['datos_recibo']['num_recibo']) :$num_cuotas?>" /></td>
                      <td width="10%" class="taulaA"><input name="submit3" type="button" class='cabecera2' value="Eliminar" onClick="deleteRow('dataTable')"></td>
                      <td width="10%"><input type="hidden" name="entidad" value="<?php echo $row_banco['identidadbancario'] ;?>" />
                          <input name="submit" type="submit" class='cabecera2' value="Guardar"></td>
                      <td width="35%">&nbsp;</td>
                    </tr>
                  </table>
                <p align="center">&nbsp;</p>
              </form></td>
            </tr>
          </table>
          <p><br>
            <br><br>
            <br>
          </p>
        
        </div>
    <?php include "../foot.php";?>
</BODY></HTML>