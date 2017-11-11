<?php
//print_r($_SESSION);

?>
<script language="JavaScript">
function lanzarSubmenu1(idfila){
   window.open("especiesM.php?idfilapadre="+idfila+"","Elegir Especies","width=600,height=500,scrollbars=YES,toolbar=no,status=no");
}

function habilitarfilarestitucion(seleccion,identificador) {
		try {
		      if (seleccion.checked)
          {
				   document.getElementById("supejecutada"+String(identificador)).disabled=false;
				   document.getElementById("cantplantinejecutado"+String(identificador)).disabled=false;
				   document.getElementById("observacionesejecutado"+String(identificador)).disabled=false;
           document.getElementById("anorestituirejecutado"+String(identificador)).disabled=false;
           document.getElementById("idtipoesparcimientoejecutado"+String(identificador)).disabled=false;
			    }
          else
          {
				   document.getElementById("supejecutada"+String(identificador)).disabled=true;
           document.getElementById("cantplantinejecutado"+String(identificador)).disabled=true;
           document.getElementById("observacionesejecutado"+String(identificador)).disabled=true;
           document.getElementById("anorestituirejecutado"+String(identificador)).disabled=true;
           document.getElementById("idtipoesparcimientoejecutado"+String(identificador)).disabled=true;
			    }

			}
      catch(e)
      {
				alert(e);
			}
}





</script>


<div align="center" >

<form action="bosques_rcia.php" method="POST" name = "form-bosquercia" autocomplete="off" id="form-bosquercia" enctype="multipart/form-data">


   <b><big>RESTITUCIÓN DE BOSQUES </big></b><br>
   <b class="texto">Predio: <?php echo $_SESSION['nombre_predio'];?> Código: <?php echo $_SESSION['cod_parcela'];?> </b>



<table width="95%" border="0" class='taulaA'  align="center" cellspacing="0">
  <tr>
    <td colspan="5" id="blau"><span class="taulaH">1. Datos Area Deforestada Ilegal y a Reforestar</span></td>
  </tr>

  <tr id="blau">
    <td width="23%" align="right">Superficie Total Predio:</td>
    <td width="23%"><input name="Superficie" type="text" class="boxBusqueda4m" id="Superficie"  onFocus="siguienteCampo ='FechaFin'" maxlength="10" value="<?php echo isset($_SESSION['datos_bosque']['Superficie']) ? htmlspecialchars($_SESSION['datos_bosque']['Superficie']) : $row_predio['superficie'];?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly >
      <input type="hidden" name="TipoProp" id="TipoProp" value="<?php echo isset($_SESSION['datos_bosque']['TipoProp']) ? htmlspecialchars($_SESSION['datos_bosque']['TipoProp']) : $row_predio['nombrecodificador']?>"></td>
    <td width="18%">&nbsp;</td>
  </tr>

	<tr >
		<td colspan="5">
			<table width="100%" border="0" cellspacing="2" cellpadding="0" >
			<tr>
				<td >
					<table width="100%" border="0" cellspacing="0" cellpadding="0" >
						<tr>
							<td>
								<table width="100%" border="1" cellspacing="0" cellpadding="0" class="taulaA">

									<tr >
									  <td colspan="3" class="cabecera2" >1.1. Area Deforestada Ilegal y a Reforestar ley 337.</td>
									</tr>


									<tr class="TituloCajaNegocios">
									  <td>Superficie Deforestada Ilegal: (Ha)</td>
									  <td> <input type="text" name="supdefilegal" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie337']->get_suptotal();?>" id="supdefilegal" readonly></td>
									  <td align = "center"> Tipos de Areas a Reforestar</td>
									  <td align = "center"> Superficie a Reforestar Comprometida</td>
									  <td align = "center"> Superficie Reforestada Ejecutada</td>
									</tr>

									<tr align = "center">
									  <td rowspan ="2" id="blau15"><div align="left">Tierras de Producción Permanente (TPFP)(Ha):</div></td>
									  <td rowspan ="2" id="blau15" ><input type="text" name="suptpfp" class="boxBusqueda4m" value="<?php echo $_SESSION['superficie337']->get_suptpfp();?>"  id="suptpfp" readonly> </td>
									  <td >Rest. TPFP(&gt;= 10%)(Ha):</td>
									  <td ><input type="text" name="supreftpfp" id="supreftpfp" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie337']->get_supreftpfp();?>" readonly>  </td>
									  <td ><input type="text" readonly name="supreftpfpEje" id="supreftpfpEje" class="boxBusqueda4"  value="<?php  if($supmr1['supregistromonitoreo'] == null){ echo ('0');} else{ echo $supmr1['supregistromonitoreo']; }  ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);">  </td>
									</tr>

									<tr align = "center">
									  <td >SEL a Reforestar(Ha):</td>
									  <td><input type="text" name="supselstpfpref" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie337']->get_supselstpfpref();?>" readonly id="supselstpfpref"> </td>
									  <td ><input type="text" readonly name="supreftpfpselEje" id="supreftpfpselEje" class="boxBusqueda4"  value="<?php  if($supmr2['supregistromonitoreo'] == null){ echo ('0');} else{ echo $supmr2['supregistromonitoreo']; }  ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);">  </td>
									</tr >

									<tr align = "center" class="TituloCajaNegocios">
										<td rowspan ="2" id="blau15"><div align="left">Tierras de Uso Múltiple (TUM)(Ha):</div></td>
										<td rowspan ="2" id="blau15"><input type="text" name="suptum" class="boxBusqueda4m" onChange="document.forms[0].submit()"  value="<?php echo $_SESSION['superficie337']->get_suptum();?>" readonly id="suptum"></td>
										<td >Restitución TUM (Ha):</td>
										<td ><input type="text" name="supreftum" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie337']->get_supreftum();?>" readonly id="supreftum"></td>
										<td ><input type="text" readonly name="supreftumEje" id="supreftumEje" class="boxBusqueda4"  value="<?php  if($supmr3['supregistromonitoreo'] == null){ echo ('0');} else{ echo $supmr3['supregistromonitoreo']; }  ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" >  </td>
									</tr >

									<tr align = "center" class="TituloCajaNegocios">
									  <td >SEL a Reforestar(Ha):</td>
									  <td ><input type="text" name="supselstumref" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie337']->get_supselstumref();?>" readonly id="supselstumref"></td>
									  <td ><input type="text" readonly name="supreftumpselEje" id="supreftumpselEje" class="boxBusqueda4"  value="<?php  if($supmr4['supregistromonitoreo'] == null){ echo ('0');} else{ echo $supmr4['supregistromonitoreo']; }  ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" >  </td>
									</tr >

								</table>
							</td>
						</tr>
					</table>
				</td>

				 <?php if($_SESSION['Causal']==2){ ?>

				<td width="50%">
					<table  border="0">
						<tr>
							<td>

							<table border="1" cellspacing="0" cellpadding="0" class="taulaA">

									<tr >
									  <td colspan="3" class="cabecera2" >1.1. Area con Proceso Administrativo Sancionatorio.</td>
									</tr>


									<tr align = "center" class="TituloCajaNegocios">
									  <td >Superficie P.A.S: (Ha)</td>
									  <td > <input type="text" name="suppas" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie502']->get_suptotal();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="suppas"></td>
									  <td > Tipos de Areas a Reforestar</td>
									  <td > Superficie a Reforestar Comprometida en PAS</td>
									  <td > Superficie Reforestada Ejecutada en PAS</td>
									</tr>

									<tr align = "center">
									  <td rowspan ="2" id="blau15"><div align="left">Tierras de Producción Permanente (TPFP)(Ha):</div></td>
									  <td rowspan ="2" ><input type="text" name="suptpfppas" readonly class="boxBusqueda4m" onChange="document.getElementById('action').value=2;document.forms[0].submit();" value="<?php echo $_SESSION['superficie502']->get_suptpfp();?>" id="suptpfppas"> </td>
									  <td >Rest. TPFP(&gt;= 10%)(Ha):</td>
									  <td ><input type="text" name="supreftpfppas" id="supreftpfppas" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie502']->get_supreftpfp();?>" onChange="document.forms[0].submit()" readonly ></td>
									  <td ><input type="text" readonly name="supreftpfppasEje" id="supreftpfppasEje" class="boxBusqueda4"  value="<?php  if($supmr1m['supregistromonitoreo'] == null){ echo ('0');} else{ echo $supmr1m['supregistromonitoreo']; }  ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);">  </td>
									</tr>

									<tr align = "center">
									  <td >SEL a Reforestar(Ha):</td>
									  <td><input type="text" name="supselstpfprefpas" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie502']->get_supselstpfpref();?>"  readonly id="supselstpfprefpas"></td>
									  <td ><input type="text" readonly name="supreftpfpselpasEje" id="supreftpfpselpasEje" class="boxBusqueda4"  value="<?php  if($supmr2m['supregistromonitoreo'] == null){ echo ('0');} else{ echo $supmr2m['supregistromonitoreo']; }  ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);">  </td>
									</tr >

									<tr align = "center" class="TituloCajaNegocios">
										<td rowspan ="2" id="blau15"><div align="left">Tierras de Uso Múltiple (TUM)(Ha):</div></td>
										<td rowspan ="2"><input type="text" name="suptumpas" readonly class="boxBusqueda4m" onChange="document.forms[0].submit()"  value="<?php echo $_SESSION['superficie502']->get_suptum();?>"  id="suptumpas"></td>
										<td >Restitución TUM (Ha):</td>
										<td ><input type="text" name="supreftumpas" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie502']->get_supreftum();?>"  readonly id="supreftumpas"></td>
										<td ><input type="text" readonly name="supreftumpasEje" id="supreftumpasEje" class="boxBusqueda4"  value="<?php  if($supmr3m['supregistromonitoreo'] == null){ echo ('0');} else{ echo $supmr3m['supregistromonitoreo']; }  ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" >  </td>
									</tr >

									<tr align = "center" class="TituloCajaNegocios">
									  <td >SEL a Reforestar(Ha):</td>
									  <td ><input type="text" name="supselstumrefpas" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie502']->get_supselstumref();?>" readonly id="supselstumrefpas"></td>
									  <td ><input type="text" readonly name="supreftumpselpasEje" id="supreftumpselpasEje" class="boxBusqueda4"  value="<?php  if($supmr4m['supregistromonitoreo'] == null){ echo ('0');} else{ echo $supmr4m['supregistromonitoreo']; }  ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" >  </td>
									</tr >

							  </table>
							</td>
						</tr>
					</table>

				</td>
			</tr>
		 <?php } //fin PAS?>


			</table>
		</td>
    </tr>

  <tr>
    <td colspan="5"><hr></td>
  </tr>

  <tr>
    <td colspan="5" align="center" id='blau'>

	<table width="100%" border="0" cellspacing="0" cellpadding="0">

      <tr>
        <td height="12"><span class="taulaH">2. Servidumbres Ecológicas Legales</span></td>
        <td><span class="taulaH">3. Mejoras</span></td>
      </tr>

      <tr>

        <td width="70%">
			<table  width="96%" border="1" cellspacing="0" cellpadding="0" class="taulaA">

				<!-- Esto es sel SIN PAS-->
				<tr>
					<td>


						   <tr align="center">
							  <td colspan = "7"><span class="taulaH">SEL a Reforestar o Conservar en Áreas de desmonte Ilegal</span></td>
							</tr>

							<tr align="center">
							  <td colspan = "4" class="cabecera2">COMPROMETIDO</td>
							  <td colspan = "2" class="cabecera2">EJECUTADO</td>
							</tr>


							<tr align="center">
							  <td class="cabecera2">TIPO DE SERVIDUMBRE</td>
							  <td class="cabecera2">SUPERFICIE EN TPFP</td>
							  <td class="cabecera2">SUPERFICIE EN TUM </td>
							  <td class="cabecera2">RESTITUCION / CONSERVACION</td>
							  <td class="cabecera2">SUPERFICIE EN TPFP</td>
							  <td class="cabecera2">SUPERFICIE EN TUM </td>
							</tr>

							<?php  if(isset($_SESSION['datos_bosque']['conteoSEL']))
									 {
                     $num=$_SESSION['datos_bosque']['conteoSEL'];
                   }
									 else
									 {
                    $num=$totalRows_SELS;
                   }
?>
                   <input type="hidden" name="cantidadsels" id="cantidadsels" value="<?php echo $num; ?>">
<?php
					 for ($i = 1; $i <=$num ; $i++) {
					 if(isset($_SESSION['datos_bosque']['idtiposel'.$i]) || isset($row_Sels['idtiposel'])){

					 ?>
							<tr >
							  <td ><input size="80" disabled name="<?php echo 'nombsel'.$i; ?>" type="text" class="boxBusquedam"  value="<?php echo isset($_SESSION['datos_bosque']['nombsel'.$i]) ? htmlspecialchars($_SESSION['datos_bosque']['nombsel'.$i]) : trim($row_Sels['nombrecodificador']) ;?> "></td>
							  <td ><input disabled name="<?php echo 'supseltpfp'.$i; ?>" type="text" class="boxBusqueda4m" value="<?php echo isset($_SESSION['datos_bosque']['supseltpfp'.$i]) ? htmlspecialchars($_SESSION['datos_bosque']['supseltpfp'.$i]) : trim($row_Sels['supseltpfp']) ?>" ></td>
							  <td ><input disabled name="<?php echo 'supseltum'.$i; ?>" type="text" class="boxBusqueda4m" value="<?php echo isset($_SESSION['datos_bosque']['supseltum'.$i]) ? htmlspecialchars($_SESSION['datos_bosque']['supseltum'.$i]) : trim($row_Sels['supseltum']) ?>" ></td>

							<td width="507"><select name="<?php echo 'tiposel'.$i; ?>" class="combos" id="<?php echo 'tiposel'.$i; ?>"  >
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

							  <td  width="84"><input name="<?php echo 'supseltpfpEjecutado'.$i; ?>" type="text" class="boxBusqueda4" value="<?php  if($supselejecutadarcia['supseltpfp'] == null){ echo ('0');} else{ echo $supselejecutadarcia['supseltpfp']; }  ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"></td>
							  <td  width="83"><input name="<?php echo 'supseltumEjecutado'.$i; ?>" type="text" class="boxBusqueda4" value="<?php  if($supselejecutadarcia['supseltum'] == null){ echo ('0');} else{ echo $supselejecutadarcia['supseltum']; }  ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"></td>


							 <?php if(!isset($_SESSION['datos_bosque']['conteoSELs']) && isset($row_Sels)){$row_Sels = pg_fetch_assoc($Sels); $supselejecutadarcia = pg_fetch_assoc($rcia_supseleje);   }
								}

              } ?>


							</tr>
					</td>
				</tr>

				  <tr>
					<td colspan="7"><hr></td>
				  </tr>

				<!-- Esto es sel CON PAS-->
				<tr>

				    <?php if($_SESSION['Causal']==2){  ?>

					<td>
							<tr align="center">
							  <td colspan = "7"><span class="taulaH">SEL a Reforestar o Conservar en Áreas con P.A.S.</span></td>
							</tr>

							<tr align="center">
							  <td colspan = "4" class="cabecera2">COMPROMETIDO</td>
							  <td colspan = "2" class="cabecera2">EJECUTADO</td>
							</tr>


							<tr align="center">
							  <td class="cabecera2">TIPO DE SERVIDUMBRE PAS</td>
							  <td class="cabecera2">SUPERFICIE EN TPFP PAS</td>
							  <td class="cabecera2">SUPERFICIE EN TUM PAS</td>
							  <td class="cabecera2">RESTITUCION / CONSERVACION</td>
							  <td class="cabecera2">SUPERFICIE EN TPFP PAS</td>
							  <td class="cabecera2">SUPERFICIE EN TUM PAS</td>
							</tr>

							<?php  if(isset($_SESSION['datos_bosque']['conteoSEL']))
									 {$num2=$_SESSION['datos_bosque']['conteoSEL'];}
									 else
									 {$num2=$totalRows_SELSPAS;}

					 for ($i = 1; $i <=$num2 ; $i++) {
					 if(isset($_SESSION['datos_bosque']['idtiposel'.$i]) || isset($row_SelsPAS['idtiposel'])){

					 ?>
							<tr >
							  <td ><input size="80" disabled name="<?php echo 'nombsel'.$i; ?>" type="text" class="boxBusquedam"  value="<?php echo isset($_SESSION['datos_bosque']['nombsel'.$i]) ? htmlspecialchars($_SESSION['datos_bosque']['nombsel'.$i]) : trim($row_SelsPAS['nombrecodificador']) ;?> "></td>
							  <td ><input disabled name="<?php echo 'supseltpfppas'.$i; ?>" type="text" class="boxBusqueda4m" value="<?php echo isset($_SESSION['datos_bosque']['supseltpfppas'.$i]) ? htmlspecialchars($_SESSION['datos_bosque']['supseltpfppas'.$i]) : trim($row_SelsPAS['supseltpfppas']) ?>" ></td>
							  <td ><input disabled name="<?php echo 'supseltumpas'.$i; ?>" type="text" class="boxBusqueda4m" value="<?php echo isset($_SESSION['datos_bosque']['supseltumpas'.$i]) ? htmlspecialchars($_SESSION['datos_bosque']['supseltumpas'.$i]) : trim($row_SelsPAS['supseltumpas']) ?>" ></td>

							<td width="507"><select  name="<?php echo 'tiposel'.$i; ?>" class="combos" id="<?php echo 'tiposel'.$i; ?>"  >
								  <?php
							 ///cambiar este codigo
							$sql_clasificador2 ="Select * From codificadores Where idclasificador=15 Order by nombrecodificador";
							$clasificador2 = pg_query($cn,$sql_clasificador2) ;
							$row_clasificador2 = pg_fetch_array ($clasificador2);

					  do {   ?>
							<option value="<?php echo $row_clasificador2['idcodificadores']?>"
							<?php  if(isset($_SESSION['datos_bosque']['tiposel'.$i])&&($_SESSION['datos_bosque']['tiposel'.$i]== $row_clasificador2['idcodificadores'])){
														echo " selected";
									}elseif(isset($row_SelsPAS['idtiposel']) && $row_SelsPAS['idtiposel']== $row_clasificador2['idcodificadores']){	echo " selected";}?>
							 > <?php echo $row_clasificador2['nombrecodificador']?></option>
								  <?php } while ($row_clasificador2 = pg_fetch_assoc($clasificador2));?>
								</select>
							<input type="hidden" name="<?php echo 'idtiposel'.$i; ?>" id="<?php echo 'idtiposel'.$i; ?>" value="<?php echo isset($_SESSION['datos_bosque']['idtiposel'.$i]) ? htmlspecialchars($_SESSION['datos_bosque']['idtiposel'.$i]) : trim($row_SelsPAS['idparametrica']) ?>">
							</td>

							  <td  width="84"><input name="<?php echo 'supseltpfppasEjecutado'.$i; ?>" type="text" class="boxBusqueda4" value="<?php  if($supselejecutadarciapas['supseltpfppas'] == null){ echo ('0');} else{ echo $supselejecutadarciapas['supseltpfppas']; }  ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"></td>
							  <td  width="83"><input name="<?php echo 'supseltumpasEjecutado'.$i; ?>" type="text" class="boxBusqueda4" value="<?php  if($supselejecutadarciapas['supseltumpas'] == null){ echo ('0');} else{ echo $supselejecutadarciapas['supseltumpas']; }  ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"></td>

							 <?php if(!isset($_SESSION['datos_bosque']['conteoSELs']) && isset($row_SelsPAS)){$row_SelsPAS = pg_fetch_assoc($SelsPAS); $supselejecutadarciapas = pg_fetch_assoc($rcia_supselejepas); }
								}} ?>


							</tr>
					</td>
					<?php } ?>
				</tr>

			</table>
	    </td>

        <td width="30%">
			<table  border="1" cellspacing="0" cellpadding="0">
				<tr>
					<td colspan="1" rowspan="2" align="right" class="cabecera2">&nbsp;</td>
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

			    <tr>
						<td id="blau" class="taulaA"><?php echo $row_mejora['nombrecodificador'];?></td>

						<td  id="blau">
						<input type="text"  readonly class="boxBusqueda4m" name="<?php echo "supmejoratpfp".$row_mejora['idcodificadores'];?>" id="<?php echo "supmejoratpfp".$row_mejora['idcodificadores'];?>"
						value="<?php if(isset($_SESSION['datos_bosque']["supmejoratpfp".$valor])) { echo $_SESSION['datos_bosque']["supmejoratpfp".$valor];} elseif( isset($row_mejoras['idmejora']) && $row_mejoras['idmejora']==$row_mejora['idcodificadores'] ){ echo $row_mejoras['supmejoratpfp'];} ?>" >
						</td>

						<td id="blau">
						<input type="text" readonly class="boxBusqueda4m" name="<?php echo "supmejoratum".$row_mejora['idcodificadores'];?>" id="<?php echo "supmejoratum".$row_mejora['idcodificadores'];?>"
						value="<?php if(isset($_SESSION['datos_bosque']["supmejoratum".$valor])) { echo $_SESSION['datos_bosque']["supmejoratum".$valor];} elseif( isset($row_mejoras['idmejora']) && $row_mejoras['idmejora']==$row_mejora['idcodificadores'] ){ echo $row_mejoras['supmejoratum'];} ?>" >
						</td>


						<?php if($_SESSION['Causal']==2){  ?>

						<td  id="blau">
						<input type="text" readonly class="boxBusqueda4m" name="<?php echo "supmejoratpfppas".$row_mejora['idcodificadores'];?>" id="<?php echo "supmejoratpfppas".$row_mejora['idcodificadores'];?>"
						value="<?php if(isset($_SESSION['datos_bosque']["supmejoratpfppas".$valor])) { echo $_SESSION['datos_bosque']["supmejoratpfppas".$valor];} elseif( isset($row_mejoras['idmejora']) && $row_mejoras['idmejora']==$row_mejora['idcodificadores'] ){ echo $row_mejoras['supmejoratpfppas'];} ?>" >
						</td>

						<td id="blau">
						<input type="text" readonly class="boxBusqueda4m" name="<?php echo "supmejoratumpas".$row_mejora['idcodificadores'];?>" id="<?php echo "supmejoratumpas".$row_mejora['idcodificadores'];?>"
						value="<?php if(isset($_SESSION['datos_bosque']["supmejoratumpas".$valor])) { echo $_SESSION['datos_bosque']["supmejoratumpas".$valor];} elseif( isset($row_mejoras['idmejora']) && $row_mejoras['idmejora']==$row_mejora['idcodificadores'] ){ echo $row_mejoras['supmejoratumpas'];} ?>" >
						</td>
						<?php } ?>

				</tr>
				<?php  } while ($row_mejora = pg_fetch_assoc($mejora));?>
			</table>

		</td>
      </tr>
    </table>
	</td>
  </tr>


  <tr>
    <td colspan="5"><hr></td>
  </tr>



  <tr class="texto_normal">
    <td colspan="2" id='blau'><span class="taulaH">4. Periodo y Especies a Restituir</span></td>
    <td colspan="2" id='blau'>

	  <div style="display:none" >
       <select  name="espaciamiento" class="combos" id="espaciamiento">
         <?php
		  ///cambiar este codigo
		   $sql_clasificador ="Select * From codificadores Where idclasificador=9 and orden = 1 Order by nombrecodificador";
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

    <table width="100%" class="taulaA" id="especiesM" border="1" cellspacing="0" cellpadding="0" >

	  <tr class="cabecera2" align="center">
		<td colspan = "9" >COMPROMETIDO</td>
		<td colspan = "8" >EJECUTADO</td>
      </tr>


	  <tr class="cabecera2" align="center">
        <td>A&Ntilde;O</td>
        <td>MES INICIO</td>
        <td>MES FINAL</td>
        <td>NOMBRE CIENTIFICO</td>
        <td>NOMBRE COMUN</td>
        <td>SUPERFICIE</td>
    		<td>ESPACIA.</td>
        <td>CANTIDAD PLANTINES</td>
    		<td>TIPO RESTITUCION</td>

        <td>SI</td>
        <td>AÑO</td>
        <td>ESPECIE</td>
        <td> + </td>
        <td>SUPERFICIE</td>
    		<td>ESPACIAMIENTO</td>
    		<td>CANT. PLANTINES</td>
    		<td>OBSERVACIONES</td>


      </tr>

      <?php
	     $suptpfprestsel=0; $suptpfprest=0;
	     if(isset($_SESSION['datos_bosque']['conteoEspecie']))
		 {$num=$_SESSION['datos_bosque']['conteoEspecie'];}
		 else
		 {$num=$totalRows_Especies;} ?>

			<input type="hidden" name="numeroespecies" id="numeroespecies" value="<?php echo $num; ?>"></td>

		<?php
		 for ($i = 1; $i <=$num ; $i++) {
		 if(isset($_SESSION['datos_bosque']['idespeciecomun'.$i]) || isset($row_Especies['idtiporestitucion'])){

		 ?>
      <tr id="blau2" >

        <!-- COMPROMISO DE REFORESTACION -->

        <td width="2%">
          <select name="<?php echo 'anorestituir'.$i; ?>" id="<?php echo 'anorestituir'.$i; ?>" disabled class="combos" >
            <?php $aux= isset($_SESSION['datos_bosque']['anorestituir'.$i]) ? htmlspecialchars($_SESSION['datos_bosque']['anorestituir'.$i]) : trim($row_Especies['anorestituir']); ?>
            <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Elegir...</option>
            <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>2014</option>
            <option value="2" <?php if( $aux=="2"){echo 'selected' ;}?>>2015</option>
            <option value="3" <?php if( $aux=="3"){echo 'selected' ;}?>>2016</option>
            <option value="4" <?php if( $aux=="4"){echo 'selected' ;}?>>2017</option>
            <option value="5" <?php if( $aux=="5"){echo 'selected' ;}?>>2018</option>
          </select>
        </td>




        <td width="3%" ><input size="3" name="<?php echo 'mesini'.$i; ?>" id="<?php echo 'mesini'.$i; ?>" type="text"  value="<?php echo isset($_SESSION['datos_bosque']['mesini'.$i]) ? htmlspecialchars($_SESSION['datos_bosque']['mesini'.$i]) : trim($row_Especies['mesini']) ?>" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  disabled ></td>
        <td width="3%" ><input size="3" name="<?php echo 'mesfin'.$i; ?>" id=name="<?php echo 'mesfin'.$i; ?>" type="text" value="<?php echo isset($_SESSION['datos_bosque']['mesfin'.$i]) ? htmlspecialchars($_SESSION['datos_bosque']['mesfin'.$i]) : trim($row_Especies['mesfin']) ?>" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" disabled ></td>
        <td width="12%"><input name="<?php echo 'nombrecientifico'.$i; ?>" id="<?php echo 'nombrecientifico'.$i; ?>" type="text" class="boxBusquedam"  value="<?php echo isset($_SESSION['datos_bosque']['nombrecientifico'.$i]) ? htmlspecialchars($_SESSION['datos_bosque']['nombrecientifico'.$i]) : trim($row_Especies['nombrecientifico']) ;?> " disabled ></td>
        <td width="10%"><input name="<?php echo 'nombrecomun'.$i; ?>" id="<?php echo 'nombrecomun'.$i; ?>" type="text" class="boxBusquedam"  value="<?php echo isset($_SESSION['datos_bosque']['nombrecomun'.$i]) ? htmlspecialchars($_SESSION['datos_bosque']['nombrecomun'.$i]) : trim($row_Especies['nombrecomun']) ;?> " disabled ></td>
        <td width="6%" ><input size="6" name="<?php echo 'suprestituir'.$i; ?>" id="<?php echo 'suprestituir'.$i; ?>" type="text" class="boxBusqueda1m" onChange="<?php echo 'CantPlantin(idtipoesparcimiento'.$i.','.$i.')'; ?>" value="<?php echo isset($_SESSION['datos_bosque']['suprestituir'.$i]) ? htmlspecialchars(trim($_SESSION['datos_bosque']['suprestituir'.$i])) : trim($row_Especies['suprestituir']);?> " onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" disabled ></td>

        <td width="8%" class = "celdaApagada"><select  name="<?php echo 'idtipoesparcimiento'.$i; ?>" disabled class="combos" id="<?php echo 'idtipoesparcimiento'.$i; ?>" onChange="<?php echo "CantPlantin(this,".$i.")";?>" >
                <?php
          		  $sql_clasificador ="Select * From codificadores Where idclasificador=9 and  orden = 1 Order by nombrecodificador";
          			$clasificador = pg_query($cn,$sql_clasificador) ;
          			$row_clasificador = pg_fetch_array ($clasificador);
          		  do {   ?>
                    <option value="<?php echo $row_clasificador['idcodificadores']?>"
                          <?php  if(isset($_SESSION['datos_bosque']['idtipoesparcimiento'.$i])&&($_SESSION['datos_bosque']['idtipoesparcimiento'.$i]== $row_clasificador['idcodificadores'])){
          											echo " selected";
          						}elseif(isset($row_Especies['idtipoesparcimiento']) && $row_Especies['idtipoesparcimiento']== $row_clasificador['idcodificadores']){	echo " selected";}?>
                           > <?php echo $row_clasificador['nombrecodificador']?></option>
                    <?php } while ($row_clasificador = pg_fetch_assoc($clasificador));?>
              </select>
		    </td>

        <td width="5%"> <input size="5" name="<?php echo 'cantplantin'.$i; ?>" id="<?php echo 'cantplantin'.$i; ?>" disabled type="text" class="boxBusqueda1m"  value="<?php echo isset($_SESSION['datos_bosque']['cantplantin'.$i]) ? htmlspecialchars(trim($_SESSION['datos_bosque']['cantplantin'.$i])) : trim($row_Especies['cantplantin']) ;?> " onChange="<?php echo 'Subtotalplantin('.$i.')';?>" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"></td>

		    <td width="7%" class = "celdaApagada">

          <select   name="<?php echo 'idtiporestitucion'.$i; ?>"  class="combos"  id="<?php echo 'idtiporestitucion'.$i; ?>"  onChange="document.forms[0].submit()" >
          <?php
        		   if(isset($_SESSION['datos_bosque']['idtiporestitucion'.$i]))
               {
        		       if($_SESSION['datos_bosque']['idtiporestitucion'.$i]==113)
                      {
                        $suptpfprest=$suptpfprest+$_SESSION['datos_bosque']['suprestituir'.$i];
        				      }
                   else
                     {
                       $suptpfprestsel=$suptpfprestsel+$_SESSION['datos_bosque']['suprestituir'.$i];
                     }
        		  }
              else
              {
        			   if($row_Especies['idtiporestitucion']==113)
                   {
                      $suptpfprest=$suptpfprest+$row_Especies['suprestituir'];//tpfp
        				   }
                   else
                   {
                     $suptpfprestsel=$suptpfprestsel+$row_Especies['suprestituir'];
                   }
        			}
        		   //(((((((((((/cambiar este codigo
        		  $sql_clasificador ="Select * From codificadores Where idclasificador=17 and orden = 1 Order by nombrecodificador";
        			$clasificador = pg_query($cn,$sql_clasificador) ;
        			$row_clasificador = pg_fetch_array ($clasificador);

        		  do {   ?>
                  <option value="<?php echo $row_clasificador['idcodificadores']?>"
                        <?php  if(isset($_SESSION['datos_bosque']['idtiporestitucion'.$i])&&($_SESSION['datos_bosque']['idtiporestitucion'.$i]== $row_clasificador['idcodificadores'])){
        											echo " selected";
        						}elseif(isset($row_Especies['idtiporestitucion']) && $row_Especies['idtiporestitucion']== $row_clasificador['idcodificadores']){	echo " selected";}?>
                         > <?php echo $row_clasificador['nombrecodificador']?></option>
                  <?php
                }
              while ($row_clasificador = pg_fetch_assoc($clasificador));?>
            </select>

            <input type="hidden" name="<?php echo 'idespeciecomun'.$i; ?>" id="<?php echo 'idespeciecomun'.$i; ?>" value="<?php echo isset($_SESSION['datos_bosque']['idespeciecomun'.$i]) ? htmlspecialchars($_SESSION['datos_bosque']['idespeciecomun'.$i]) : trim($row_Especies['idespeciecomun']) ?>">
	     </td>


       <!--- CUMPLIMIENTO AL COMPROMISO COMPROMISO DE REFORESTACION -->
       <td width="2%">
         <input type='checkbox' name="<?php echo 'chkhab'.$i; ?>" id="<?php echo 'chkhab'.$i; ?>" onChange="habilitarfilarestitucion(this,'<?php echo $i;?>')" />
       </td>

       <td width="2%">
         <select name="<?php echo 'anorestituirejecutado'.$i; ?>"  disabled="true" id="<?php echo 'anorestituirejecutado'.$i; ?>"  class="combos" >
           <?php $aux= $row_restbosquesrcia['anorestituir']; ?>
           <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Elegir...</option>
           <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>2014</option>
           <option value="2" <?php if( $aux=="2"){echo 'selected' ;}?>>2015</option>
           <option value="3" <?php if( $aux=="3"){echo 'selected' ;}?>>2016</option>
           <option value="4" <?php if( $aux=="4"){echo 'selected' ;}?>>2017</option>
           <option value="5" <?php if( $aux=="5"){echo 'selected' ;}?>>2018</option>
         </select>


       </td>


     <td width="5%">
        <input size="19" name="<?php echo 'nombrecomunejecutado'.$i; ?>" disabled='true' id="<?php echo 'nombrecomunejecutado'.$i; ?>" type="text" class="boxBusquedam"  value="<?php  if($row_restbosquesrcia['nombrecomun'] == null){ echo ('');} else{ echo $row_restbosquesrcia['nombrecomun']; }  ?>" >
     </td>

     <td width="5%">
        <input type='image' src='../images/adda.gif' title="Agregar Especies" alt='Especies' border='1' onClick='lanzarSubmenu1(<?php echo $i; ?>);return false;'>

        <input type="hidden" name="<?php echo 'idespeciecomunreforestada'.$i; ?>" id="<?php echo 'idespeciecomunreforestada'.$i; ?>" value="<?php  if($row_restbosquesrcia['idespeciecomun'] == null){ echo ('0');} else{ echo $row_restbosquesrcia['idespeciecomun']; }  ?>">
        <input type="hidden" name="<?php echo 'idespecierestituida'.$i; ?>" id="<?php echo 'idespecierestituida'.$i; ?>" value="<?php  if($row_restbosquesrcia['idespeciesrestituidas'] == null){ echo ('0');} else{ echo $row_restbosquesrcia['idespeciesrestituidas']; }  ?>">
     </td>


		 <td width="6%">
       <input size="6" name="<?php echo 'supejecutada'.$i; ?>" id="<?php echo 'supejecutada'.$i; ?>" disabled="true" type="text" class="boxBusqueda1m" value="<?php  if($row_restbosquesrcia['suprestituir'] == null){ echo ('0');} else{ echo $row_restbosquesrcia['suprestituir']; }  ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" >
     </td>

		 <td width="6%"><select  name="<?php echo 'idtipoesparcimientoejecutado'.$i; ?>" class="combos" disabled="true" id="<?php echo 'idtipoesparcimientoejecutado'.$i; ?>" >
          <?php
		    $sql_clasificador ="Select * From codificadores Where idclasificador=9 and orden = 1 Order by nombrecodificador";
			$clasificador = pg_query($cn,$sql_clasificador) ;
			$row_clasificador = pg_fetch_array ($clasificador);

		  do {   ?>
          <option value="<?php echo $row_clasificador['idcodificadores']?>"
                <?php  if(isset($row_restbosquesrcia['idespaciamiento'])&&($row_restbosquesrcia['idespaciamiento']== $row_clasificador['idcodificadores'])){
											echo " selected";
						}elseif(isset($row_restbosquesrcia['idespaciamiento']) && $row_restbosquesrcia['idespaciamiento']== $row_clasificador['idcodificadores']){	echo " selected";}?>
                 > <?php echo $row_clasificador['nombrecodificador']?></option>
          <?php } while ($row_clasificador = pg_fetch_assoc($clasificador));?>
        </select>
		</td>


     <td width="5%"><input size="7" name="<?php echo 'cantplantinejecutado'.$i; ?>" disabled="true" id="<?php echo 'cantplantinejecutado'.$i; ?>" type="text" class="boxBusqueda1m"  value="<?php  if($row_restbosquesrcia['cantplantin'] == null){ echo ('0');} else{ echo $row_restbosquesrcia['cantplantin']; }  ?>" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"></td>
		 <td width="20%"><input size="36" name="<?php echo 'observacionesejecutado'.$i; ?>" disabled="true" id="<?php echo 'observacionesejecutado'.$i; ?>" type="text" class="boxBusqueda1m"  value=" <?php  if($row_restbosquesrcia['observaciones'] == null){ echo ('');} else{ echo $row_restbosquesrcia['observaciones']; }  ?> "  ></td>

      </tr>
      <?php if(!isset($_SESSION['datos_bosque']['conteoEspecie']) && isset($row_Especies)){$row_Especies = pg_fetch_assoc($Especies);  $row_restbosquesrcia = pg_fetch_assoc($rcia_restbosquesrcia);  }
		 }} ?>
	</table>

	</td>
  </tr>

  <tr>
    <td colspan="5"><hr></td>
  </tr>

  <tr>
    <td width="11%" align="right" id='blau5'>Sup. Total en TPFP:</td>
    <td width="25%"><input type="text" name="suptpfprest" class="boxBusqueda4m" onChange="document.forms[0].submit()" value="" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  id="suptpfprest" readonly></td>
    <td colspan="2" align="right">Sup. Total en SEL:</td>
    <td align="left"><input type="text" name="suptpfprestsel" class="boxBusqueda4m" onChange="document.forms[0].submit()" value="" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  id="suptpfprestsel" readonly></td>
  </tr>

  <tr>
    <td colspan="5" align="right" id='blau6'><hr></td>
  </tr>

  <tr>
    <td id='blau3'><span class="taulaH">5. Observaciones:</span></td>
    <td colspan="4" rowspan="2" id='blau3'><textarea name="RBosquesObservacion" id="RBosquesObservacion" cols="110" rows="4"><?php echo trim($obsbosquercia['obs']);?></textarea></td>
  </tr>



</table>

<input id="guardarstepbosquercia" class="boton verde formaBoton" type="submit" value="Guardar" name="guardarstepbosquercia">

</form>
</div>
