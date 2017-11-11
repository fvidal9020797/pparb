<?php session_start();
	include "../cabecera.php";
    include "../reportes/Formulario_Pago_Parametro.php";


	
//////////////primero guardamos si es que existe guardar//////////
if (isset($_POST["submit"])&& $_POST["submit"]="Guardar") 
	{ 	$datos_recibo=$_POST;
		$_SESSION['datos_recibo']=$datos_recibo;
		for ($i = 1; $i <=$_SESSION['datos_recibo']['num_recibo'] ; $i++) {
		// $aux=$_SESSION['datos_recibo']['fila'];
		 if(isset($_SESSION['datos_recibo']['FechaPago'.$i])){
			if(isset($_SESSION['datos_recibo']['idpago'.$i])){$idpago=$_SESSION['datos_recibo']['idpago'.$i];}
			 else{$idpago=0;}
				$insertaux=sprintf("select * from f_recibo  (%s, %s, %s, %s, %s, %s, %s);",
												 GetSQLValueString($_SESSION['idreg'], "int"),
												 GetSQLValueString($_SESSION['datos_recibo']['numerocuota'.$i], "int"),
												 GetSQLValueString($_SESSION['datos_recibo']['entidad'], "int"),
												 GetSQLValueString($_SESSION['datos_recibo']['nboleta'.$i], "text"),
												 GetSQLValueString($_SESSION['datos_recibo']['montodeposito'.$i], "date"),
												 GetSQLValueString($_SESSION['datos_recibo']['FechaPago'.$i], "int"),
												 GetSQLValueString($idpago, "int")); //id de la fecha de ufv
				$Result2 = pg_query($cn, $insertaux);	
				//echo $insertaux;
			}
		}
		if (!(isset($_SESSION['ErrorThrown']) && $_SESSION['ErrorThrown'] != ""))  
			{ 
			 /*echo '<script>parent.document.location.href="Formulario001.php?aux=6&datosguardados=ok";</script>';
			 echo '<script>alert("datos guardados correctamente");</script>';*/
			$datosguardados=1;
			}
			
		if(isset($_SESSION['datos_recibo'])){unset($_SESSION['datos_recibo']);}
		
	}
	
		


//////////////////////luego leemos los datos directamente de la base//////////////
if(!isset($_SESSION['idreg'])){
$idreg=$_POST['idreg']; $_SESSION['idreg']=$idreg;
}
$datosguardados=0;
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
	$sql_monprop = "SELECT   ufvtipoprop.tpfpplazos, ufvtipoprop.tpfpcontado,  ufvtipoprop.tumplazos,  ufvtipoprop.tumcontado, registro.idregion
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
	//plan pago 
	/*$sql_cuotas= "SELECT  pd.idplanpago, valoresufv.valor_ufv, pd.montoinicial, ((pd.montototal-pd.montoinicial)/ pd.cuotas) as montoplazos, c.nombrecodificador, pd.cuotas, pd.idtipopago, pd.fechapreliquidacion
				FROM   planpago pd,   valoresufv, codificadores c
				WHERE   pd.idvalorufv = valoresufv.idvalorufv AND  pd.idtipopago = c.idcodificadores and pd.idregistro=".$_SESSION['idreg'];*/
	$sql_cuotas="select * from pagosrealizados where idregistro=".$_SESSION['idreg']." Order By numerocuota Asc";
	$cuotas = pg_query($cn,$sql_cuotas);
	$row_cuotas = pg_fetch_array ($cuotas);
	$num_cuotas=pg_num_rows($cuotas);
	//TIPO DE PAGO
	
	$sql_modalidadPago= "SELECT p.montoinicial, ((p.montototal-p.montoinicial)/p.cuotas)as montoplazos, c1.nombrecodificador AS modalidad,p.cuotas,p.montototal
							FROM  planpago as p, codificadores c1
							WHERE c1.idcodificadores = p.idtipopago and p.idregistro=".$_SESSION['idreg'];
	$modalidadPago = pg_query($cn,$sql_modalidadPago);
	$row_modalidadPago = pg_fetch_array ($modalidadPago);


if(isset($_REQUEST['imprimir']))
{ 
	$CodigoParcelas=$row_parcela['idparcela'];
	$CodigoDePago= intval($_REQUEST['idpago'])	;
	Formulario_Pago_Parametro.ImprimirBoletaPago($CodigoParcelas,$CodigoDePago);
}

?>
<HTML>
<HEAD><TITLE>Recibo</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<LINK href="../css/mdryt.css" type=text/css rel=stylesheet>
<script language="JavaScript" src="../scripts/funciones.js"></script>
<script language="javascript" >
</script>
</HEAD>
<?php 
include_once('../scripts/body_handler.inc.php');
?>
<body>
<?php


		?>
        <div align="center" class="texto">
       
          <p><br>
          <b><big>RECIBO DE PAGO</big></b>
          <br>
          </p>
          <table width="90%" border="0">
            <tr>
              <td width="50%" align="right" class="celdaCelesteOscuro">C&oacute;digo Parcela: <?php echo $row_parcela['idparcela']." / "; ?></td>
              <td width="50%" class="celdaCelesteOscuro"> Código <?php echo $row_monprop['idregion']; ?></td>
            </tr>
          </table>
          <table width="90%" border="0" class='taulaA' align="center" cellspacing="0">
            <tr>
              <td height="14" colspan="4"><hr></td>
            </tr>
            <tr class="texto_normal">
              <td colspan="4" id='blau2'><span class="taulaH">1. Datos Predio</span></td>
            </tr>
            <tr class="texto_normal">
              <td width="19%" class="noborder" id='blau2'>NOMBRE PREDIO:<br> UBICACION GEOGRAFICA:              </td>
              <td width="37%" class="texto" id='blau2'><?php echo  "   ".$row_parcela['nombre']; ?><br><?php echo $row_parcela['comp']; ?>              </td>
              <td width="14%" class="noborder" id='blau2'>TIPO PROPIEDAD:<br>
              SITUACION JURIDICA:
              <br>
              ACTIVIDAD:<br>              </td>
              <td width="30%" class="texto" id='blau2'><?php echo $row_parcela['TipoProp']; ?>
              <br>
              
              <?php echo $row_parcela['SitJur']; ?>
              <br>
              <?php echo $row_parcela['Clasificacion']; ?></td>
            </tr>
            <tr class="texto_normal">
              <td colspan="4" id='blau2'><span class="taulaH">2. Datos Sobre Superficie Deforestada Ilegal - Modalidad de Pago:</span></td>
            </tr>
            <tr class="texto_normal">
              <td colspan="4" id='blau6'><table width="100%" border="0" class='taulaA'>
                <tr>
                  <td width="11%" class="noborder" id="blau3">Sup. Def. Ilegal: </td>
                  <td width="15%" ><?php echo isset($row_suprest['supdefilegal']) ? htmlspecialchars($row_suprest['supdefilegal'].' ha.') : '' .'ha.'?></td>
                  <td class="noborder" id="blau3">Sup. en T.P.F.P.: </td>
                  <td><?php echo isset($row_suprest['suptpfp']) ? htmlspecialchars($row_suprest['suptpfp'].' ha.') : '' .'ha.'?></td>
                  <td class="noborder" id="blau3">Sup. T.U.M.: </td>
                  <td><?php echo isset($row_suprest['suptum']) ? htmlspecialchars($row_suprest['suptum'].' ha.') : '' .'ha.'?></td>
                </tr>
                <tr>
                  <td colspan="6" class="noborder" id="blau5">&nbsp;</td>
                </tr>
                <tr>
                  <td class="TituloCajaNegocios" id="blau4">Monto Total a Pagar: </td>
                  <td class="TituloCajaNegocios" ><?php echo isset($row_modalidadPago['montototal']) ? htmlspecialchars(round(floatval($row_modalidadPago['montototal']*100)/100).' UFV') : ''.' UFV' ?></td>
                  <td class="TituloCajaNegocios" id="blau4">Modalidad de Pago:</td>
                  <td class="TituloCajaNegocios"><?php echo isset($row_modalidadPago['modalidad']) ? htmlspecialchars($row_modalidadPago['modalidad']) : '' ?></td>
                  <td class="TituloCajaNegocios" id="blau4">Numero de cuotas a Pagar</td>
                  <td class="TituloCajaNegocios"><?php echo isset($row_modalidadPago['cuotas']) ? htmlspecialchars($row_modalidadPago['cuotas']) : '' ?></td>
                </tr>
                <tr>
                  <td colspan="2" class="TituloCajaNegocios" id="blau">&nbsp;</td>
                  <td width="11%" class="TituloCajaNegocios" id="blau">Monto Inicial a Pagar:</td>
                  <td width="13%" class="TituloCajaNegocios"><?php echo isset($row_modalidadPago['montoinicial']) ? htmlspecialchars((round($row_modalidadPago['montoinicial']*100)/100).' UFV' ) : '0'.' UFV' ?></td>
                  <td width="11%" class="TituloCajaNegocios" id="blau">Monto por cuotas a Pagar</td>
                  <td width="13%" class="TituloCajaNegocios"><?php echo isset($row_modalidadPago['montoplazos']) ? htmlspecialchars((round(floatval($row_modalidadPago['montoplazos'])*100)/100).' UFV') : '0'.' UFV' ?></td>
                </tr>
              </table></td>
            </tr>
            <tr class="texto_normal">
              <td id='blau7'><span class="taulaH">3. Datos Recibo de Pago</span></td>
              <td colspan="3" id='blau7'><span class="boxRojo">
                <?php if(trim($datosguardados)>0){echo "Datos Guardados Exitosamente!!";}?>
              </span></td>
            </tr>
            <tr>
              <td height="38" colspan="4">
             <form action="N_Recibo.php" method="POST"  name="formulario" enctype="multipart/form-data" onSubmit="return valida(this);">
              <table width="100%" border="0" class='taulaA' cellspacing="0" cellpadding="0">
                <tr>
                  <td width="15%" class="noborder" id="blau10">Entidad Bancaria:</td>
                  <td width="37%" ><?php echo $row_banco['nombreentidad'].' - '.$row_banco['numerocuenta']?></td>
                  <td width="15%">&nbsp;</td>
                  <td width="14%" class="noborder" id="blau10"><input type="hidden" name="entidad" value="<?php echo $row_banco['identidadbancario'] ;?>" /></td>
                  <td width="19%">
                   <?php
				    $sql_ufv= "SELECT * FROM valoresufv order by fecha_ufv desc";
					$ufv = pg_query($cn,$sql_ufv);
					$row_ufv = pg_fetch_array ($ufv);
                     ?>
                                  
                  <select name="FechaPago0" class="combos" id="FechaPago0" disabled >
                  <option value=0>ELEGIR ...</option>
                    <?php 	
                  do {   ?>
                    <option value="<?php echo  $row_ufv['idvalorufv']?>"
                         
                         > <?php echo $row_ufv['fecha_ufv'].' valor ufv :'.$row_ufv['valor_ufv'];?></option>
                    <?php } while ($row_ufv = pg_fetch_assoc($ufv));?>
                  </select>                  </td>
                </tr>
                <tr>
                  <td height="22" colspan="5" class="noborder" id="blau9"><table width="97%" border="1" align="center" cellspacing="0" cellpadding="0" class="taulaA" id="dataTable">
                    <tr align="center">
                      <td width="3%" class="cabecera2">&nbsp;</td>
                      <td width="22%" class="cabecera2">Fecha Cancelación</td>
                      <td width="7%" class="cabecera2">Numero de Cuota </td>
                      <td width="14%" class="cabecera2">Numero de Boleta Pago</td>
                      <td width="10%" class="cabecera2">Monto cancelado en Bs</td>
                      <td width="18%" class="cabecera2">Pago Aproximado en UFV </td>
                      <td width="18%" class="cabecera2">Numero de Recibo</td>
                      <td width="8%" class="cabecera2">Imprimir</td>
                    </tr>
                   
                 <?php 
				 if(isset($_SESSION['datos_recibo']['num_recibo'])&&($_SESSION['datos_recibo']['num_recibo']>0))
					 {$num=$_SESSION['datos_recibo']['num_recibo'];}
					 else
					 {$num=$num_cuotas;}
					 $totbolivianos=0; $totUfv=0;
					 for ($i = 1; $i <=$num ; $i++) { 
					 if(isset($_SESSION['datos_recibo']['num_recibo'])|| (isset($num_cuotas) && $num_cuotas>0)){
					 
				 ?>
                   
                    <tr >
                      <td >&nbsp;</td>
                      <td ><select name="<?php echo 'FechaPago'.$i; ?>" onChange=" <?php echo 'actualizavalor('.$i.')'; ?>" class="boxBusqueda3m" id="<?php echo 'FechaPago'.$i; ?>" >
                        <?php $monto_ufv=1;
						    //monto UFV
					$sql_ufv= "SELECT * FROM valoresufv order by fecha_ufv desc ";
					$ufv = pg_query($cn,$sql_ufv);
					$row_ufv = pg_fetch_array ($ufv);

		 	    do {   ?>
                        <option value="<?php echo $row_ufv['idvalorufv']?>"
                <?php  if(isset($_SESSION['datos_recibo']['FechaPago'.$i]) && ($_SESSION['datos_recibo']['FechaPago'.$i] == $row_ufv['idvalorufv'])){
								echo " selected"; $monto_ufv=$row_ufv['valor_ufv'];
				       }elseif(isset($row_cuotas['fechadeposito']) && $row_cuotas['fechadeposito']== $row_ufv['fecha_ufv']){	
					            echo " selected"; $monto_ufv=$row_ufv['valor_ufv'];
					   }
					   
				 ?>
                 > <?php echo $row_ufv['fecha_ufv'].' valor ufv :'.$row_ufv['valor_ufv']?></option>
                        <?php } while ($row_ufv = pg_fetch_assoc($ufv));?>
                      </select>
                      <input type="hidden" name="<?php echo 'montoufv'.$i; ?>" onChange=" <?php echo 'actualizavalor('.$i.')'; ?>"  id= "<?php echo 'montoufv'.$i; ?>" value="<?php echo $monto_ufv;?>" ></td>
                      <td  ><input name="<?php echo 'numerocuota'.$i; ?>" type="text" m class="boxBusqueda4" id="<?php echo 'numerocuota'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_recibo']['numerocuota'.$i]) ? htmlspecialchars($_SESSION['datos_recibo']['numerocuota'.$i]) : $row_cuotas['numerocuota'] ?>"  maxlength="15"></td>
                      <td ><input name="<?php echo 'nboleta'.$i; ?>" type="text" class="boxBusqueda3" id="<?php echo 'nboleta'.$i; ?>"   value="<?php echo isset($_SESSION['datos_recibo']['nboleta'.$i]) ? htmlspecialchars($_SESSION['datos_recibo']['nboleta'.$i]) : $row_cuotas['nboleta']?>"  maxlength="15"  ></td>
                       
                      <td><input name="<?php echo 'montodeposito'.$i; ?>" type="text" class="boxBusqueda4" id="<?php echo 'montodeposito'.$i; ?>" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php  $aux=0;if(isset($_SESSION['datos_recibo']['montodeposito'.$i])){ $aux=$_SESSION['datos_recibo']['montodeposito'.$i]; }else{ $aux=$row_cuotas['montodeposito'] ;} $totbolivianos=$aux+$totbolivianos; echo $aux  ?>"  maxlength="15" ></td>
                      <td><input name="<?php echo 'paproxufv'.$i; ?>" type="text" class="boxBusqueda4" id="<?php  'paproxufv'.$i; ?>" value="<?php if(isset($_SESSION['datos_recibo']['paproxufv'.$i])){$aux=$_SESSION['datos_recibo']['paproxufv'.$i];}else{ $aux=round($row_cuotas['montodeposito']/$monto_ufv*100)/100;} $totUfv=$totUfv+$aux; echo $aux;?>"  maxlength="15" readonly>
                      <input type="hidden" name="<?php echo 'idpago'.$i; ?>" value="<?php echo $row_cuotas['idpago'] ;?>" />
                      <input type="hidden" name="<?php echo 'fila'; ?>" value="<?php echo $i ;?>" />
                      <input type="hidden" name="entidad" value="<?php echo $row_banco['identidadbancario'] ;?>" /></td>
                      <td><?php echo  $row_cuotas['idrecibo']  ;?></td>
                      
					  <td>
					  <a href="N_Recibo.php?imprimir=1&idpago=<?php echo $row_cuotas['idpago'] ;?>"><img src='../images/b_imp.png'>  </img> </a>
					  </td>					  
					  </tr>

                     <?php 
			 if(!isset($_SESSION['datos_recibo']['numerocuota']) && isset($row_cuotas)){$row_cuotas = pg_fetch_assoc($cuotas);}
				}
				  
				}
			  
			?>
                  </table>
                    <table width="97%" border="1" cellspacing="0" align="center" cellpadding="0" class="taulaA" id="dataTable2">
                      
                     
                      <tr >
                        <td width="8" >&nbsp;</td>
                        <td width="269" >&nbsp;</td>
                        <td width="85" >&nbsp;</td>
                        <td width="153" >&nbsp;</td>
                        <td width="110" ><input name="monto_totbs2" type="text" readonly class="boxBusqueda4" id="monto_totbs2" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo $totbolivianos; ?>"  maxlength="15" ></td>
                        <td width="203"><input name="monto_totbs" type="text" class="boxBusqueda4" id="monto_totbs" value="<?php echo  $totUfv;?>"  maxlength="15" readonly></td>
                        <td width="289">.</td>
                      </tr>
                    </table>
                  <p>&nbsp;</p></td>
                </tr>
              </table>
              <table width="100%" border="0">
                <tr>
                  <td width="35%">&nbsp;</td>
                  <td width="10%" class="taulaA"><input name="submit2" type="button" class='cabecera2' value="Añadir Fila" onClick="addRowRecibo('dataTable','num_recibo')">
                      <input id="num_recibo" name="num_recibo" type="hidden" value="<?php echo isset($_SESSION['datos_recibo']['num_recibo']) ? htmlspecialchars($_SESSION['datos_recibo']['num_recibo']) :$num_cuotas?>" /></td>
                  <td width="10%" class="taulaA"><input name="submit3" type="button" class='cabecera2' value="Eliminar Fila" onClick="deleteRow('dataTable')"></td>
                  <td width="10%" class="taulaA">
                  <input name="submit" type="submit" class='cabecera2' value="Guardar" ></td>
                 
                  <td width="35%">&nbsp;</td>
                </tr>
              </table>  </form> 
              <p align="center">&nbsp;</p>              </td>
            </tr>
          </table>
          <p>&nbsp;</p>
</div>
</BODY><body><div align="center" class="texto"><p>&nbsp;</p></td>
                </tr>
              </table>
              
              <p align="center">&nbsp;</p>              </td>
            </tr>
          </table>
          
          
          <p>&nbsp;</p>
</div>
<?php include "../foot.php";
	
?>  
</BODY></HTML>