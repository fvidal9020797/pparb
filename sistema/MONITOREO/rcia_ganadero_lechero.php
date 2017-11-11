<?php
//print_r($_SESSION);
?>


<div align="center" class="texto">


 <form action="rcia_ganadero_lechero.php" method="POST" id="form-ganaderia-leche-rcia" name="form-ganaderia-leche-rcia" enctype="multipart/form-data" >

   <b><big>GANADERO LECHERO</big></b><br>
   <b class="texto">Predio: <?php echo $_SESSION['nombre_predio'];?> Código: <?php echo $_SESSION['cod_parcela'];?> </b>

   <table width="95%" border="0" class='taulaA' align="center">

     <tr id="blau" class="texto_normal">
       <td colspan="3" id='blau2'><span class="taulaH">Superficies para la Producci&oacute;n de Alimentos (Ha)</span></td>
     </tr>

     <tr id="blau" class="texto_normal">
       <td colspan="3" id='blau6'>

  <table width="100%" border="1" cellspacing="0" class='taulaA'>

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
 		  <?php } ?>

 		</tr>

         <tr>
           <td class="cabecera2" id="blau16"><div align="center">Sup. en T.P.F.P.</div></td>
           <td class="cabecera2" id="blau16"><div align="center">Sup. T.U.M.</div></td>
 		  <?php if($_SESSION['Causal']==2){ ?>
           <td class="cabecera2" id="blau16"><div align="center">Sup. en T.P.F.P.</div></td>
           <td class="cabecera2" id="blau16"><div align="center">Sup. T.U.M.</div></td>
 		  <?php } ?>
         </tr>

         <tr id="blau">
           <td id="blau15"><div align="center">
             <input name="Superficie" type="text" class="boxVerde" id="Superficie"  onFocus="siguienteCampo ='FechaFin'" maxlength="10" value="<?php echo isset($_SESSION['datos_bosque']['Superficie']) ? htmlspecialchars($_SESSION['datos_bosque']['Superficie']) : $row_predio['superficie'];?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly >
           </div>
 		  </td>
           <td ><div align="center">
             <input type="text" name="supdefilegal" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie337']->get_suptotal();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supdefilegal">
           </div>
 		  </td>

 		  <?php if($_SESSION['Causal']==2){ ?>
           <td ><div align="center">
             <input type="text" name="suppas" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie502']->get_suptotal();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="suppas">
           </div>
 		  </td>
 		  <?php } ?>

           <td><div align="center">
             <input name="SupProdAli" type="text"  id="SupProdAli" class="boxVerde" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  maxlength="15"  value="<?php if(isset($_SESSION['Causal']) && $_SESSION['Causal']==2){echo $_SESSION['superficie337']->get_supproali()+$_SESSION['superficie502']->get_supproali();}else{ echo $_SESSION['superficie337']->get_supproali(); } ?>"  readonly>
           </div>
 		  </td>
           <td height="22"  id="blau7"><div align="center">
             <input type="text" name="supalitpfp" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie337']->get_supalitpfp();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supalitpfp">
           </div>
 		  </td>
           <td ><div align="center">
             <input type="text" name="supalitum" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie337']->get_supalitum();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supalitum">
           </div>
 		  </td>

 		  <?php if($_SESSION['Causal']==2){ ?>
           <td ><div align="center">
             <input type="text" name="supalitpfppas" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie502']->get_supalitpfp();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supalitpfppas">
           </div>
 		  </td>
           <td  id="blau7"><div align="center">
             <input type="text" name="supalitumpas" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie502']->get_supalitum();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supalitumpas">
           </div>
 		  </td>
 		  <?php } ?>

         </tr>

       </table>
 	 </td>
     </tr>

   </table>


   <td >&nbsp;</td>

 <table width="95%" border="0" class='taulaA' align="center">
       <tr class="texto_normal">
         <td width="55%" colspan="2" id='blau4'><span class="taulaH">Uso Actual en &aacute;reas deforestadas ilegales y/o con PAS. (Ha.)</span></td>
         <td width="45%" id='blau8' >&nbsp;</td>
       </tr>
       <tr class="texto_normal">
         <td colspan="3" id='blau13'><table width="86%" border="0" class='taulaA'>
           <tr id="blau3" >
             <td width="11%" id="blau11">Agricola: </td>
             <td width="20%" ><input disabled name="SupActAgri" type="text" class="boxBusqueda4" id="SupActAgri" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_ganadero']['SupActAgri']) ? htmlspecialchars($_SESSION['datos_ganadero']['SupActAgri']) : $row_supali['supagricola'] ?>" maxlength="15" readonly></td>
             <td width="11%" id="blau11">Barbecho: </td>
             <td width="11%"><input disabled name="SupActbar" type="text" class="boxBusqueda4" id="SupActbar" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_ganadero']['SupActbar']) ? htmlspecialchars($_SESSION['datos_ganadero']['SupActbar']) : $row_supali['supbarbecho']?>"  maxlength="15" readonly></td>
             <td width="11%" id="blau11">Descanso</td>
             <td width="11%"><input disabled name="SupActDes" type="text" class="boxBusqueda4" id="SupActDes" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_ganadero']['SupActDes']) ? htmlspecialchars($_SESSION['datos_ganadero']['SupActDes']) : $row_supali['supdescanso']?>" maxlength="15" readonly></td>
             <td width="11%" id="blau11">Ganadera</td>
             <td width="11%"><input disabled name="SupActGan" type="text" class="boxBusqueda4" id="SupActGan"onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_ganadero']['SupActGan']) ? htmlspecialchars($_SESSION['datos_ganadero']['SupActGan']) : $row_supali['supganadera'] ?>" maxlength="15" ></td>
           </tr>
         </table></td>
       </tr>
 </table>
 <td >&nbsp;</td>



 <table width="95%" border="0" class='taulaA' align="center">
 	<tr class="texto_normal">

 		<td colspan="2" id='blau12'>
 		  <table width="100%" border="0">
 			<tr>
 			  <td width="70%"><span class="taulaH">Actividades realizadas en la superdicie deforesta sin autorizacion y/o con P.A.S:</span></td>
 			  <td width="30%"><span class="taulaH">Cantidad de ganado existente en el predio por Sistema Productivos Línea Base:</span></td>
 			</tr>
 		  </table>
 		</td>
 	</tr>

     <tr class="texto_normal">
     <td colspan="2" id='blau9'>

 		<table width="100%" border="0">
 				  <tr>

 					<td width="70%">

 					<table width="100%" border="1" class='taulaA' id="dataTable5" >

 						<tr>
 			        <td width="10%" align="center" class="cabecera2" id="blau">ACTIVIDAD</td>

 			      <?php
 						 if($periodo == 1)
 						 {
 					  ?>
 			          <td width="7%" align="center" class="cabecera2" id="blau">Año 2014</td>
 			          <td width="7%" align="center" class="cabecera2" id="blau">Año 2015</td>
 			          <td width="7%" align="center" class="cabecera2" id="blau">Año 2016</td>
 			          <td width="7%" align="center" class="cabecera2" id="blau">Año 2017</td>
 			          <td width="7%" align="center" class="cabecera2" id="blau">Año 2018</td>
 			        <?php
 			  			 }
 			  			 elseif ($periodo == 2) {
 			  		  ?>
 			          <td width="7%" align="center" class="cabecera2" id="blau">Año 2016</td>
 			          <td width="7%" align="center" class="cabecera2" id="blau">Año 2017</td>
 			          <td width="7%" align="center" class="cabecera2" id="blau">Año 2018</td>
 			          <td width="7%" align="center" class="cabecera2" id="blau">Año 2019</td>
 			          <td width="7%" align="center" class="cabecera2" id="blau">Año 2020</td>
 			        <?php
 			          }
 			         ?>
 			        </tr>

 					  <!-- ACTIVIDADES REALIZADAS EN LA SUPERFICIE DESMONTADA  -->
 					  <?PHP
 							$sql_actividad = "select * from codificadores where idcodificadores > 327 and idcodificadores < 331 order by idcodificadores asc";
 							$actividad = pg_query($cn,$sql_actividad);
 							$row_actividad = pg_fetch_array ($actividad);

 					  do {   ?>


 					  <tr>

 						<td align="center" id="blau16"><?php echo $row_actividad['nombrecodificador']?></td>


 						<?php
 						$cont = 1;

 						if ($periodo == 1)
 						{
 							$anoacti = 1;
 						}
 						elseif ($periodo == 2)
 						{
 							$anoacti = 3;
 						}


 						do {

 							$sql_ano_activo = "select anho from monitoreo.monitoreo where estado = 1 and idregistro = ".$_SESSION['idreg']."and anho =".$anoacti;
 							$anoactivo = pg_query($cn,$sql_ano_activo) ;
 							$row_ano = pg_fetch_array ($anoactivo);
 							$totalRows_ano = pg_num_rows($anoactivo);
 							$anoactivomon = 0;
 							if($totalRows_ano>0)
 							{
 							$anoactivomon = $row_ano['anho'];
 							}

 						?>
 								<td align="center" id="blau16">
 									<span class="TituloCajaNegocios">
 										  <select name="<?php echo $row_actividad['idcodificadores'].'-comboact'.$cont?>" class="combos" <?php if ($anoactivomon==0) {?> disabled <?php }  ?> id='<?php echo $row_actividad['idcodificadores'].'-comboact'.$cont?>'>

 										  		<?php
 													$aux = $row_actrciaganadera['realizada'];
 													$auxano = $row_actrciaganadera['anho'];

 													if ($auxano == $anoacti)
 													{
 																if ($aux != null)
 																{
 																?>
 																	<option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>NO </option>
 																	<option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>SI</option>

 																<?php
 																}
 																else
 																{
 																?>

 																	<option value=0 >NO</option>
 																	<option value=1 >SI</option>

 																<?php
 																}

 																	if(isset($row_actrciaganadera )){ $row_actrciaganadera = pg_fetch_assoc($rcia_act_ganadera); }

 													}
 													else
 													{
 														?>
 														<option value=0 >NO</option>
 														<option value=1 >SI</option>
 													 <?php
 													}
 													?>


 										  </select>
 									</span>
 								</td>
 								<?php $cont = $cont + 1;
 								$anoacti = $anoacti + 1;
 						}
 						 while ($cont <= 5 );	?>

 						 <?php

 						 } while ($row_actividad = pg_fetch_assoc($actividad));?>

 					  </tr>

 					</table>

 					</td>

 					<td width="30%" rowspan="2" id='blau8' >

            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td colspan="2" class="cabecera2">Sistemas de Produccion Ganadera Lechera Linea Base</td>
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
                <td width="192">
                    <input disabled type="text" name="<?php echo 'TxtSist'.$row_SistProduccion['idcodificadores'];?>" id="<?php echo 'TxtSist'.$row_SistProduccion['idcodificadores'];?>" class="boxBusqueda3" <?php if( !(isset($_SESSION['datos_ganaderoL']["chk".$row_SistProduccion['idcodificadores']])) ) { if(isset($totalRows_SistProd) && $row_SistProd['idsistproductivo']!=$row_SistProduccion['idcodificadores']){echo 'disabled';}}?>   value="<?php if(isset($_SESSION['datos_ganaderoL']['TxtSist'.$valor])) { echo $_SESSION['datos_ganaderoL']['TxtSist'.$valor];} elseif( isset($row_SistProd['idsistproductivo']) && $row_SistProd['idsistproductivo']==$row_SistProduccion['idcodificadores'] ){ echo $row_SistProd['cantidad'];} ?>" >
                </td>
              </tr>
              <?php  } while ($row_SistProduccion = pg_fetch_assoc($SistProduccion));?>
            </table>

 					</td>

          </tr>


 			</table>
          </td>
   </tr>
  </table>
 <td >&nbsp;</td>



<table width="95%" class="taulaA" border="1" cellspacing="0">

  <tr align="center">
    <td colspan="2" rowspan="2" width="18%"  class="cabecera2">Situacion Actual Ganadera</td>
    <td width="2%" rowspan="17" >&nbsp;</td>
    <td colspan="11" class="cabecera2">Plan de Producción Ganadera Lechera en 5 años Sistema Mejorado</td>
  </tr>

  <tr align="center"  >

    <?php
     if($periodo == 1)
     {
    ?>
            <td  class="cabecera2">&nbsp;</td>
            <td  class="cabecera2">Programado Año 2014</td>
            <td  class="celdaAmarilla">Ejecutado Año 2014</td>
            <td  class="cabecera2">Programado Año 2015</td>
            <td  class="celdaAmarilla">Ejecutado Año 2015</td>
            <td  class="cabecera2">Programado Año 2016</td>
            <td  class="celdaAmarilla">Ejecutado Año 2016</td>
            <td  class="cabecera2">Programado Año 2017</td>
            <td  class="celdaAmarilla">Ejecutado Año 2017</td>
            <td  class="cabecera2">Programado Año 2018</td>
            <td  class="celdaAmarilla">Ejecutado Año 2018</td>
      <?php
       }
       elseif ($periodo == 2) {
      ?>
            <td  class="cabecera2">&nbsp;</td>
            <td  class="cabecera2">Programado Año 2016</td>
            <td  class="celdaAmarilla">Ejecutado Año 2016</td>
            <td  class="cabecera2">Programado Año 2017</td>
            <td  class="celdaAmarilla">Ejecutado Año 2017</td>
            <td  class="cabecera2">Programado Año 2018</td>
            <td  class="celdaAmarilla">Ejecutado Año 2018</td>
            <td  class="cabecera2">Programado Año 2019</td>
            <td  class="celdaAmarilla">Ejecutado Año 2019</td>
            <td  class="cabecera2">Programado Año 2020</td>
            <td  class="celdaAmarilla">Ejecutado Año 2020</td>
            <?php
              }

              ////////////////////////
              if ($periodo == 1)
              {
                $sql_ano_1_activo = "select anho from monitoreo.monitoreo where estado = 1 and idregistro = ".$_SESSION['idreg']."and anho = 1";
                $ano1activo = pg_query($cn,$sql_ano_1_activo) ;
                $row_ano_1 = pg_fetch_array ($ano1activo);
                $ano_1 = $row_ano_1['anho'];

                $sql_ano_2_activo = "select anho from monitoreo.monitoreo where estado = 1 and idregistro = ".$_SESSION['idreg']."and anho = 2";
                $ano2activo = pg_query($cn,$sql_ano_2_activo) ;
                $row_ano_2 = pg_fetch_array ($ano2activo);
                $ano_2 = $row_ano_2['anho'];

                $sql_ano_3_activo = "select anho from monitoreo.monitoreo where estado = 1 and idregistro = ".$_SESSION['idreg']."and anho = 3";
                $ano3activo = pg_query($cn,$sql_ano_3_activo) ;
                $row_ano_3 = pg_fetch_array ($ano3activo);
                $ano_3 = $row_ano_3['anho'];

                $sql_ano_4_activo = "select anho from monitoreo.monitoreo where estado = 1 and idregistro = ".$_SESSION['idreg']."and anho = 4";
                $ano4activo = pg_query($cn,$sql_ano_4_activo) ;
                $row_ano_4 = pg_fetch_array ($ano4activo);
                $ano_4 = $row_ano_4['anho'];

                $sql_ano_5_activo = "select anho from monitoreo.monitoreo where estado = 1 and idregistro = ".$_SESSION['idreg']."and anho = 5";
                $ano5activo = pg_query($cn,$sql_ano_5_activo) ;
                $row_ano_5 = pg_fetch_array ($ano5activo);
                $ano_5 = $row_ano_5['anho'];
              }
              elseif ($periodo == 2)
              {
                $sql_ano_1_activo = "select anho from monitoreo.monitoreo where estado = 1 and idregistro = ".$_SESSION['idreg']."and anho = 3";
                $ano1activo = pg_query($cn,$sql_ano_1_activo) ;
                $row_ano_1 = pg_fetch_array ($ano1activo);
                $ano_1 = $row_ano_1['anho'];

                $sql_ano_2_activo = "select anho from monitoreo.monitoreo where estado = 1 and idregistro = ".$_SESSION['idreg']."and anho = 4";
                $ano2activo = pg_query($cn,$sql_ano_2_activo) ;
                $row_ano_2 = pg_fetch_array ($ano2activo);
                $ano_2 = $row_ano_2['anho'];

                $sql_ano_3_activo = "select anho from monitoreo.monitoreo where estado = 1 and idregistro = ".$_SESSION['idreg']."and anho = 5";
                $ano3activo = pg_query($cn,$sql_ano_3_activo) ;
                $row_ano_3 = pg_fetch_array ($ano3activo);
                $ano_3 = $row_ano_3['anho'];

                $sql_ano_4_activo = "select anho from monitoreo.monitoreo where estado = 1 and idregistro = ".$_SESSION['idreg']."and anho = 6";
                $ano4activo = pg_query($cn,$sql_ano_4_activo) ;
                $row_uno_4 = pg_fetch_array ($ano4activo);
                $ano_4 = $row_ano_4['anho'];

                $sql_ano_5_activo = "select anho from monitoreo.monitoreo where estado = 1 and idregistro = ".$_SESSION['idreg']."and anho = 7";
                $ano5activo = pg_query($cn,$sql_ano_5_activo) ;
                $row_ano_5 = pg_fetch_array ($ano5activo);
                $ano_5 = $row_ano_5['anho'];
              }

             ?>

  </tr>

  <tr >
    <td colspan="2" class="taulaH">En Area de Deforestada Ilegal y/o P.A.S.:</td>
    <td colspan="11" class="taulaH">En Area de Deforestada Ilegal y/o P.A.S.:</td>
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
    <td align="center">--</td>
    <td align="center">--</td>
    <td align="center">--</td>
    <td align="center">--</td>
  </tr>

  <tr align="left" >
    <td align="rigth" class="celdaCelesteClaro">Superficie Pastos Cultivados</td>
    <td class="TituloCajaNegocios"><label>
      <input disabled name="suppassembrado0" type="text" class="boxBusqueda4" id="suppassembrado0" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo isset($_SESSION['datos_ganaderoL']['suppassembrado0']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['suppassembrado0']) : $row_ppg0['suppassembrado'] ?>">
    </label></td>
    <td align="rigth" class="celdaCelesteClaro">Superficie Pastos Cultivados</td>
    <td class="TituloCajaNegocios"><input disabled name="suppassembrado1" type="text" class="boxBusqueda4" id="suppassembrado1" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  onChange="SumaVerticalG('suppassembrado')" value="<?php echo isset($_SESSION['datos_ganaderoL']['suppassembrado1']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['suppassembrado1']) : $row_ppg1['suppassembrado'] ?>"></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_1 == 1)||($ano_1 == 3))==false){?> disabled <?php }?> name="suppasejecut1" type="text" class="boxBusqueda4" id="suppasejecut1" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia1['suppastocultivado'] == null){ echo ('0');} else{ echo $row_ppgrcia1['suppastocultivado']; } ?> "></td>
    <td class="TituloCajaNegocios"><input disabled name="suppassembrado2" type="text" class="boxBusqueda4" id="suppassembrado2" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="SumaVerticalG('suppassembrado')" value="<?php echo isset($_SESSION['datos_ganaderoL']['suppassembrado2']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['suppassembrado2']) : $row_ppg2['suppassembrado'] ?>" ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_2 == 2)||($ano_2 == 4))==false){?> disabled <?php }?> name="suppasejecut2" type="text" class="boxBusqueda4" id="suppasejecut2" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia2['suppastocultivado'] == null){ echo ('0');} else{ echo $row_ppgrcia2['suppastocultivado']; } ?>"></td>
    <td class="TituloCajaNegocios"><input disabled name="suppassembrado3" type="text" class="boxBusqueda4" id="suppassembrado3" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="SumaVerticalG('suppassembrado')" value="<?php echo isset($_SESSION['datos_ganaderoL']['suppassembrado3']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['suppassembrado3']) : $row_ppg3['suppassembrado'] ?>" ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_3 == 3)||($ano_3 == 5))==false){?> disabled <?php }?> name="suppasejecut3" type="text" class="boxBusqueda4" id="suppasejecut3" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia3['suppastocultivado'] == null){ echo ('0');} else{ echo $row_ppgrcia3['suppastocultivado']; } ?>"></td>
    <td class="TituloCajaNegocios"><input disabled name="suppassembrado4" type="text" class="boxBusqueda4" id="suppassembrado4" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="SumaVerticalG('suppassembrado')" value="<?php echo isset($_SESSION['datos_ganaderoL']['suppassembrado4']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['suppassembrado4']) : $row_ppg4['suppassembrado'] ?>" ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_4 == 4)||($ano_4 == 6))==false){?> disabled <?php }?>  name="suppasejecut4" type="text" class="boxBusqueda4" id="suppasejecut4" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia4['suppastocultivado'] == null){ echo ('0');} else{ echo $row_ppgrcia4['suppastocultivado']; } ?>"></td>
    <td class="TituloCajaNegocios"><input disabled name="suppassembrado5" type="text" class="boxBusqueda4" id="suppassembrado5" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="SumaVerticalG('suppassembrado')"  value="<?php echo isset($_SESSION['datos_ganaderoL']['suppassembrado5']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['suppassembrado5']) : $row_ppg5['suppassembrado'] ?>"></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_5 == 5)||($ano_5 == 7))==false){?> disabled <?php }?> name="suppasejecut5" type="text" class="boxBusqueda4" id="suppasejecut5" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia5['suppastocultivado'] == null){ echo ('0');} else{ echo $row_ppgrcia5['suppastocultivado']; } ?>"></td>
  </tr>

  <tr align="left" >
    <td colspan="2" align="left" class="taulaH">En La Totalidad de Predio:</td>
    <td colspan="11" align="left" class="taulaH">En La Totalidad de Predio:</td>
    </tr>

  <tr align="left" >

    <td align="left" class="celdaCelesteClaro">Sistema Ordeño(Manual/Mecanico)</td>
    <td class="TituloCajaNegocios">
      <select disabled name="<?php echo 'sistemaordeno0'; ?>" class="combos" id='<?php echo 'sistemaordeno0'; ?>'>
       <?php if( isset($_SESSION['datos_ganaderoL']['sistemaordeno0'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['sistemaordeno0']);}else{ $aux=$row_ppg0['sistemaordeno'] ;}?>
        <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Manual</option>
        <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>Mecanico</option>
      </select>
    </td>

    <td align="left" class="celdaCelesteClaro">Sistema Ordeño(Manual/Mecanico)</td>
    <td class="TituloCajaNegocios">
      <select disabled name="sistemaordeno1" class="combos" id="sistemaordeno1">
      <?php if( isset($_SESSION['datos_ganaderoL']['sistemaordeno1'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['sistemaordeno1']);}else{ $aux=$row_ppg1['sistemaordeno'] ;}?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Manual</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>Mecanico</option>
      </select>
    </td>

    <td class="TituloCajaNegocios">
      <select <?php if ((($ano_1 == 1)||($ano_1 == 3))==false){?> disabled <?php }?> name="sistemaordenoejec1" class="combos" id="sistemaordenoejec1">
      <?php  $aux=$row_ppgrcia1['sistemaordeno'] ;?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Manual</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>Mecanico</option>
      </select>
    </td>


    <td class="TituloCajaNegocios"><select disabled name="sistemaordeno2" class="combos" id="sistemaordeno2">
      <?php if( isset($_SESSION['datos_ganaderoL']['sistemaordeno2'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['sistemaordeno2']);}else{ $aux=$row_ppg2['sistemaordeno'] ;}?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Manual</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>Mecanico</option>
    </select></td>
    <td class="TituloCajaNegocios">
      <select <?php if ((($ano_2 == 2)||($ano_2 == 4))==false){?> disabled <?php }?> name="sistemaordenoejec2" class="combos" id="sistemaordenoejec2">
      <?php  $aux=$row_ppgrcia2['sistemaordeno'] ;?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Manual</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>Mecanico</option>
      </select>
    </td>

    <td class="TituloCajaNegocios"><select disabled name="sistemaordeno3" class="combos" id="sistemaordeno3">
      <?php if( isset($_SESSION['datos_ganaderoL']['sistemaordeno3'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['sistemaordeno3']);}else{ $aux=$row_ppg3['sistemaordeno'] ;}?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Manual</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>Mecanico</option>
    </select></td>
    <td class="TituloCajaNegocios">
      <select <?php if ((($ano_3 == 3)||($ano_3 == 5))==false){?> disabled <?php }?> name="sistemaordenoejec3" class="combos" id="sistemaordenoejec3">
      <?php  $aux=$row_ppgrcia3['sistemaordeno'] ;?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Manual</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>Mecanico</option>
      </select>
    </td>

    <td class="TituloCajaNegocios"><select disabled  name="sistemaordeno4" class="combos" id="sistemaordeno4">
      <?php if( isset($_SESSION['datos_ganaderoL']['sistemaordeno4'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['sistemaordeno4']);}else{ $aux=$row_ppg4['sistemaordeno'] ;}?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Manual</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>Mecanico</option>
    </select></td>
    <td class="TituloCajaNegocios">
      <select <?php if ((($ano_4 == 4)||($ano_4 == 6))==false){?> disabled <?php }?> name="sistemaordenoejec4" class="combos" id="sistemaordenoejec4">
      <?php  $aux=$row_ppgrcia4['sistemaordeno'] ;?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Manual</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>Mecanico</option>
      </select>
    </td>

    <td class="TituloCajaNegocios"><select  disabled name="sistemaordeno5" class="combos" id="sistemaordeno5">
      <?php if( isset($_SESSION['datos_ganaderoL']['sistemaordeno5'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['sistemaordeno5']);}else{ $aux=$row_ppg5['sistemaordeno'] ;}?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Manual</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>Mecanico</option>
    </select></td>
    <td class="TituloCajaNegocios">
      <select <?php if ((($ano_5== 5)||($ano_5 == 7))==false){?> disabled <?php }?> name="sistemaordenoejec5" class="combos" id="sistemaordenoejec5">
      <?php  $aux=$row_ppgrcia5['sistemaordeno'] ;?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Manual</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>Mecanico</option>
      </select>
    </td>

  </tr>

  <tr align="left" >
    <td align="left" class="celdaCelesteClaro">Galpones (uni)</td>
    <td class="TituloCajaNegocios"><select disabled name="<?php echo 'galpon0'; ?>" class="combos" id='<?php echo 'galpon0'; ?>'>
      <?php if( isset($_SESSION['datos_ganaderoL']['galpon0'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['galpon0']);}else{ $aux=$row_ppg0['galpon'] ;}?>
      <option value=0  <?php if( $aux==0){echo 'selected' ;}?> >NO</option>
      <option value=1 <?php if( $aux==1){echo 'selected' ;}?>>SI</option>
    </select>    </td>
    <td align="left" class="celdaCelesteClaro">Galpones (uni)</td>
    <td class="TituloCajaNegocios"><input disabled name="galpon1" type="text" class="boxBusqueda4" id="galpon1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="SumaVerticalG('galpon')"  value="<?php echo isset($_SESSION['datos_ganaderoL']['galpon1']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['galpon1']) : $row_ppg1['galpon'] ?>"></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_1 == 1)||($ano_1 == 3))==false){?> disabled <?php }?> name="galponejec1" type="text" class="boxBusqueda4" id="galponejec1" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia1['galpon'] == null){ echo ('0');} else{ echo $row_ppgrcia1['galpon']; } ?> "></td>
    <td class="TituloCajaNegocios"><input disabled name="galpon2" type="text" class="boxBusqueda4" id="galpon2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="SumaVerticalG('galpon')" value="<?php echo isset($_SESSION['datos_ganaderoL']['galpon2']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['galpon2']) : $row_ppg2['galpon'] ?>" ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_2 == 2)||($ano_2 == 4))==false){?> disabled <?php }?> name="galponejec2" type="text" class="boxBusqueda4" id="galponejec2" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia2['galpon'] == null){ echo ('0');} else{ echo $row_ppgrcia2['galpon']; } ?> "></td>
    <td class="TituloCajaNegocios"><input disabled name="galpon3" type="text" class="boxBusqueda4" id="galpon3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="SumaVerticalG('galpon')" value="<?php echo isset($_SESSION['datos_ganaderoL']['galpon3']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['galpon3']) : $row_ppg3['galpon'] ?>" ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_3 == 3)||($ano_3 == 5))==false){?> disabled <?php }?> name="galponejec3" type="text" class="boxBusqueda4" id="galponejec3" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia3['galpon'] == null){ echo ('0');} else{ echo $row_ppgrcia3['galpon']; } ?> "></td>
    <td class="TituloCajaNegocios"><input disabled name="galpon4" type="text" class="boxBusqueda4" id="galpon4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="SumaVerticalG('galpon')" value="<?php echo isset($_SESSION['datos_ganaderoL']['galpon4']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['galpon4']) : $row_ppg4['galpon'] ?>" ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_4 == 4)||($ano_4 == 6))==false){?> disabled <?php }?> name="galponejec4" type="text" class="boxBusqueda4" id="galponejec4" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia4['galpon'] == null){ echo ('0');} else{ echo $row_ppgrcia4['galpon']; } ?> "></td>
    <td class="TituloCajaNegocios"><input disabled name="galpon5" type="text" class="boxBusqueda4" id="galpon5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="SumaVerticalG('galpon')" value="<?php echo isset($_SESSION['datos_ganaderoL']['galpon5']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['galpon5']) : $row_ppg5['galpon'] ?>" ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_5 == 5)||($ano_5 == 7))==false){?> disabled <?php }?> name="galponejec5" type="text" class="boxBusqueda4" id="galponejec5" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia5['galpon'] == null){ echo ('0');} else{ echo $row_ppgrcia5['galpon']; } ?> "></td>
  </tr>


  <tr align="left" >
    <td align="left" class="celdaCelesteClaro">Tanques Enfriamiento(uni)</td>
    <td class="TituloCajaNegocios"><select disabled name="<?php echo 'tanqueenfriamiento0'; ?>" class="combos" id='<?php echo 'tanqueenfriamiento0'; ?>'>
      <?php if( isset($_SESSION['datos_ganaderoL']['tanqueenfriamiento0'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['tanqueenfriamiento0']);}else{ $aux=$row_ppg0['tanqueenfriamiento'] ;}?>
      <option value=0  <?php if( $aux==0){echo 'selected' ;}?> >NO</option>
      <option value=1 <?php if( $aux==1){echo 'selected' ;}?>>SI</option>
    </select>    </td>
    <td align="left" class="celdaCelesteClaro">Tanques Enfriamiento(uni)</td>
    <td class="TituloCajaNegocios"><input disabled name="tanqueenfriamiento1" type="text" class="boxBusqueda4" id="tanqueenfriamiento1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="SumaVerticalG('tanqueenfriamiento')" value="<?php echo isset($_SESSION['datos_ganaderoL']['tanqueenfriamiento1']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['tanqueenfriamiento1']) :  $row_ppg1['tanqueenfriamiento'] ?>" ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_1 == 1)||($ano_1 == 3))==false){?> disabled <?php }?> name="tanqueenfejec1" type="text" class="boxBusqueda4" id="tanqueenfejec1" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia1['tanqueenfriamiento'] == null){ echo ('0');} else{ echo $row_ppgrcia1['tanqueenfriamiento']; } ?> "></td>
    <td class="TituloCajaNegocios"><input disabled name="tanqueenfriamiento2" type="text" class="boxBusqueda4" id="tanqueenfriamiento2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="SumaVerticalG('tanqueenfriamiento')" value="<?php echo isset($_SESSION['datos_ganaderoL']['tanqueenfriamiento2']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['tanqueenfriamiento2']) :  $row_ppg2['tanqueenfriamiento'] ?>" ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_2 == 2)||($ano_2 == 4))==false){?> disabled <?php }?> name="tanqueenfejec2" type="text" class="boxBusqueda4" id="tanqueenfejec2" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia2['tanqueenfriamiento'] == null){ echo ('0');} else{ echo $row_ppgrcia2['tanqueenfriamiento']; } ?> "></td>
    <td class="TituloCajaNegocios"><input disabled name="tanqueenfriamiento3" type="text" class="boxBusqueda4" id="tanqueenfriamiento3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="SumaVerticalG('tanqueenfriamiento')" value="<?php echo isset($_SESSION['datos_ganaderoL']['tanqueenfriamiento3']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['tanqueenfriamiento3']) :  $row_ppg3['tanqueenfriamiento'] ?>" ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_3 == 3)||($ano_3 == 5))==false){?> disabled <?php }?> name="tanqueenfejec3" type="text" class="boxBusqueda4" id="tanqueenfejec3" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia3['tanqueenfriamiento'] == null){ echo ('0');} else{ echo $row_ppgrcia3['tanqueenfriamiento']; } ?> "></td>
    <td class="TituloCajaNegocios"><input disabled name="tanqueenfriamiento4" type="text" class="boxBusqueda4" id="tanqueenfriamiento4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="SumaVerticalG('tanqueenfriamiento')" value="<?php echo isset($_SESSION['datos_ganaderoL']['tanqueenfriamiento4']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['tanqueenfriamiento4']) :  $row_ppg4['tanqueenfriamiento'] ?>" ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_4 == 4)||($ano_4 == 6))==false){?> disabled <?php }?> name="tanqueenfejec4" type="text" class="boxBusqueda4" id="tanqueenfejec4" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia4['tanqueenfriamiento'] == null){ echo ('0');} else{ echo $row_ppgrcia4['tanqueenfriamiento']; } ?> "></td>
    <td class="TituloCajaNegocios"><input disabled name="tanqueenfriamiento5" type="text" class="boxBusqueda4" id="tanqueenfriamiento5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="SumaVerticalG('tanqueenfriamiento')" value="<?php echo isset($_SESSION['datos_ganaderoL']['tanqueenfriamiento5']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['tanqueenfriamiento5']) :  $row_ppg5['tanqueenfriamiento'] ?>" ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_5 == 5)||($ano_5 == 7))==false){?> disabled <?php }?> name="tanqueenfejec5" type="text" class="boxBusqueda4" id="tanqueenfejec5" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia5['tanqueenfriamiento'] == null){ echo ('0');} else{ echo $row_ppgrcia5['tanqueenfriamiento']; } ?> "></td>
  </tr>




  <tr align="left" >
    <td align="left" class="celdaCelesteClaro">Silos Para Forraje(uni)</td>
    <td class="TituloCajaNegocios"><select disabled name="<?php echo 'siloforraje0'; ?>" class="combos" id='<?php echo 'siloforraje0'; ?>'>
      <?php if( isset($_SESSION['datos_ganaderoL']['siloforraje0'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['siloforraje0']);}else{ $aux=$row_ppg0['siloforraje'] ;}?>
      <option value=0  <?php if( $aux==0){echo 'selected' ;}?> >NO</option>
      <option value=1 <?php if( $aux==1){echo 'selected' ;}?>>SI</option>
    </select>   </td>
    <td align="left" class="celdaCelesteClaro">Silos Para Forraje(uni)</td>
    <td class="TituloCajaNegocios"><input disabled name="siloforraje1" type="text" class="boxBusqueda4" id="siloforraje1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="SumaVerticalG('siloforraje')" value="<?php echo isset($_SESSION['datos_ganaderoL']['siloforraje1']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['siloforraje1']) : $row_ppg1['siloforraje'] ?>" ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_1 == 1)||($ano_1 == 3))==false){?> disabled <?php }?> name="siloforrajeejec1" type="text" class="boxBusqueda4" id="siloforrajeejec1" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia1['siloforraje'] == null){ echo ('0');} else{ echo $row_ppgrcia1['siloforraje']; } ?> "></td>
    <td class="TituloCajaNegocios"><input disabled name="siloforraje2" type="text" class="boxBusqueda4" id="siloforraje2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="SumaVerticalG('siloforraje')" value="<?php echo isset($_SESSION['datos_ganaderoL']['siloforraje2']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['siloforraje2']) : $row_ppg2['siloforraje'] ?>" ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_2 == 2)||($ano_2 == 4))==false){?> disabled <?php }?> name="siloforrajeejec2" type="text" class="boxBusqueda4" id="siloforrajeejec2" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia2['siloforraje'] == null){ echo ('0');} else{ echo $row_ppgrcia2['siloforraje']; } ?> "></td>
    <td class="TituloCajaNegocios"><input disabled name="siloforraje3" type="text" class="boxBusqueda4" id="siloforraje3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="SumaVerticalG('siloforraje')" value="<?php echo isset($_SESSION['datos_ganaderoL']['siloforraje3']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['siloforraje3']) : $row_ppg3['siloforraje'] ?>" ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_3 == 3)||($ano_3 == 5))==false){?> disabled <?php }?> name="siloforrajeejec3" type="text" class="boxBusqueda4" id="siloforrajeejec3" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia3['siloforraje'] == null){ echo ('0');} else{ echo $row_ppgrcia3['siloforraje']; } ?> "></td>
    <td class="TituloCajaNegocios"><input disabled name="siloforraje4" type="text" class="boxBusqueda4" id="siloforraje4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="SumaVerticalG('siloforraje')" value="<?php echo isset($_SESSION['datos_ganaderoL']['siloforraje4']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['siloforraje4']) : $row_ppg4['siloforraje'] ?>" ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_4 == 4)||($ano_4 == 6))==false){?> disabled <?php }?> name="siloforrajeejec4" type="text" class="boxBusqueda4" id="siloforrajeejec4" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia4['siloforraje'] == null){ echo ('0');} else{ echo $row_ppgrcia4['siloforraje']; } ?> "></td>
    <td class="TituloCajaNegocios"><input disabled name="siloforraje5" type="text" class="boxBusqueda4" id="siloforraje5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="SumaVerticalG('siloforraje')" value="<?php echo isset($_SESSION['datos_ganaderoL']['siloforraje5']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['siloforraje5']) : $row_ppg5['siloforraje'] ?>" ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_5 == 5)||($ano_5 == 7))==false){?> disabled <?php }?> name="siloforrajeejec5" type="text" class="boxBusqueda4" id="siloforrajeejec5" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia5['siloforraje'] == null){ echo ('0');} else{ echo $row_ppgrcia5['siloforraje']; } ?> "></td>
  </tr>



  <tr align="left" >
    <td align="left" class="celdaCelesteClaro">Certificado Tuberculosis </td>
    <td><span class="TituloCajaNegocios">
      <select disabled name="<?php echo 'certtuberculosis0'; ?>" class="combos" id='<?php echo 'certtuberculosis0'; ?>'>
        <?php if( isset($_SESSION['datos_ganaderoL']['certtuberculosis0'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['certtuberculosis0']);}else{ $aux=$row_ppg0['certtuberculosis'] ;}?>
        <option value=0  <?php if( $aux==0){echo 'selected' ;}?> >NO</option>
        <option value=1 <?php if( $aux==1){echo 'selected' ;}?>>SI</option>
      </select>
    </span></td>
    <td align="left" class="celdaCelesteClaro">Certificado Tuberculosis </td>
    <td><span class="TituloCajaNegocios">
      <select disabled name="<?php echo 'certtuberculosis1'; ?>" class="combos" id='<?php echo 'certtuberculosis1'; ?>'>
        <?php if( isset($_SESSION['datos_ganaderoL']['certtuberculosis1'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['certtuberculosis1']);}else{ $aux=$row_ppg1['certtuberculosis'] ;}?>
        <option value=0  <?php if( $aux==0){echo 'selected' ;}?> >NO</option>
        <option value=1 <?php if( $aux==1){echo 'selected' ;}?>>SI</option>
      </select>
    </span></td>
    <td class="TituloCajaNegocios">
      <select <?php if ((($ano_1== 1)||($ano_1 == 3))==false){?> disabled <?php }?> name="certtuberculosisejec1" class="combos" id="certtuberculosisejec1">
      <?php  $aux=$row_ppgrcia1['certtuberculosis'] ;?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>NO</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>SI</option>
      </select>
    </td>


    <td><span class="TituloCajaNegocios">
      <select disabled name="<?php echo 'certtuberculosis2'; ?>" class="combos" id='<?php echo 'certtuberculosis2'; ?>'>
        <?php if( isset($_SESSION['datos_ganaderoL']['certtuberculosis2'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['certtuberculosis2']);}else{ $aux=$row_ppg2['certtuberculosis'] ;}?>
        <option value=0  <?php if( $aux==0){echo 'selected' ;}?> >NO</option>
        <option value=1 <?php if( $aux==1){echo 'selected' ;}?>>SI</option>
      </select>
    </span></td>
    <td class="TituloCajaNegocios">
      <select <?php if ((($ano_2== 2)||($ano_2 == 4))==false){?> disabled <?php }?> name="certtuberculosisejec2" class="combos" id="certtuberculosisejec2">
      <?php  $aux=$row_ppgrcia2['certtuberculosis'] ;?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>NO</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>SI</option>
      </select>
    </td>

    <td><span class="TituloCajaNegocios">
      <select disabled name="<?php echo 'certtuberculosis3'; ?>" class="combos" id='<?php echo 'certtuberculosis3'; ?>'>
        <?php if( isset($_SESSION['datos_ganaderoL']['certtuberculosis3'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['certtuberculosis3']);}else{ $aux=$row_ppg3['certtuberculosis'] ;}?>
        <option value=0  <?php if( $aux==0){echo 'selected' ;}?> >NO</option>
        <option value=1 <?php if( $aux==1){echo 'selected' ;}?>>SI</option>
      </select>
    </span></td>
    <td class="TituloCajaNegocios">
      <select <?php if ((($ano_3== 3)||($ano_3 == 5))==false){?> disabled <?php }?> name="certtuberculosisejec3" class="combos" id="certtuberculosisejec3">
      <?php  $aux=$row_ppgrcia3['certtuberculosis'] ;?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>NO</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>SI</option>
      </select>
    </td>

    <td><span class="TituloCajaNegocios">
      <select disabled name="<?php echo 'certtuberculosis4'; ?>" class="combos" id='<?php echo 'certtuberculosis4'; ?>'>
        <?php if( isset($_SESSION['datos_ganaderoL']['certtuberculosis4'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['certtuberculosis4']);}else{ $aux=$row_ppg4['certtuberculosis'] ;}?>
        <option value=0  <?php if( $aux==0){echo 'selected' ;}?> >NO</option>
        <option value=1 <?php if( $aux==1){echo 'selected' ;}?>>SI</option>
      </select>
    </span></td>
    <td class="TituloCajaNegocios">
      <select <?php if ((($ano_4== 4)||($ano_4 == 6))==false){?> disabled <?php }?> name="certtuberculosisejec4" class="combos" id="certtuberculosisejec4">
      <?php  $aux=$row_ppgrcia4['certtuberculosis'] ;?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>NO</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>SI</option>
      </select>
    </td>
    <td><span class="TituloCajaNegocios">
      <select disabled name="<?php echo 'certtuberculosis5'; ?>" class="combos" id='<?php echo 'certtuberculosis5'; ?>'>
        <?php if( isset($_SESSION['datos_ganaderoL']['certtuberculosis5'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['certtuberculosis5']);}else{ $aux=$row_ppg5['certtuberculosis'] ;}?>
        <option value=0  <?php if( $aux==0){echo 'selected' ;}?> >NO</option>
        <option value=1 <?php if( $aux==1){echo 'selected' ;}?>>SI</option>
      </select>
    </span></td>
    <td class="TituloCajaNegocios">
      <select <?php if ((($ano_5== 5)||($ano_5 == 7))==false){?> disabled <?php }?> name="certtuberculosisejec5" class="combos" id="certtuberculosisejec5">
      <?php  $aux=$row_ppgrcia5['certtuberculosis'] ;?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>NO</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>SI</option>
      </select>
    </td>
  </tr>


  <tr align="left" >
    <td align="left" class="celdaCelesteClaro">Certificado Brucelosis</td>
    <td><span class="TituloCajaNegocios">
      <select disabled name="<?php echo 'certbrucelosis0'; ?>" class="combos" id='<?php echo 'certbrucelosis0'; ?>'>
        <?php if( isset($_SESSION['datos_ganaderoL']['certbrucelosis0'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['certbrucelosis0']);}else{ $aux=$row_ppg0['certbrucelosis'] ;}?>
        <option value=0  <?php if( $aux==0){echo 'selected' ;}?> >NO</option>
        <option value=1 <?php if( $aux==1){echo 'selected' ;}?>>SI</option>
      </select>
      </span>      </td>

    <td align="left" class="celdaCelesteClaro">Certificado Brucelosis</td>
    <td><span class="TituloCajaNegocios">
      <select disabled name="<?php echo 'certbrucelosis1'; ?>" class="combos" id='<?php echo 'certbrucelosis1'; ?>'>
        <?php if( isset($_SESSION['datos_ganaderoL']['certbrucelosis1'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['certbrucelosis1']);}else{ $aux=$row_ppg1['certbrucelosis'] ;}?>
        <option value=0  <?php if( $aux==0){echo 'selected' ;}?> >NO</option>
        <option value=1 <?php if( $aux==1){echo 'selected' ;}?>>SI</option>
      </select>
    </span></td>

    <td class="TituloCajaNegocios">
      <select <?php if ((($ano_1== 1)||($ano_1 == 3))==false){?> disabled <?php }?> name="certbrucelosisejec1" class="combos" id="certbrucelosisejec1">
      <?php  $aux=$row_ppgrcia1['certbrucelosis'] ;?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>NO</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>SI</option>
      </select>
    </td>


    <td><span class="TituloCajaNegocios">
      <select disabled name="<?php echo 'certbrucelosis2'; ?>" class="combos" id='<?php echo 'certbrucelosis2'; ?>'>
        <?php if( isset($_SESSION['datos_ganaderoL']['certbrucelosis2'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['certbrucelosis2']);}else{ $aux=$row_ppg2['certbrucelosis'] ;}?>
        <option value=0  <?php if( $aux==0){echo 'selected' ;}?> >NO</option>
        <option value=1 <?php if( $aux==1){echo 'selected' ;}?>>SI</option>
      </select>
    </span></td>
    <td class="TituloCajaNegocios">
      <select <?php if ((($ano_2== 2)||($ano_2 == 4))==false){?> disabled <?php }?> name="certbrucelosisejec2" class="combos" id="certbrucelosisejec2">
      <?php  $aux=$row_ppgrcia2['certbrucelosis'] ;?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>NO</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>SI</option>
      </select>
    </td>

    <td><span class="TituloCajaNegocios">
      <select disabled name="<?php echo 'certbrucelosis3'; ?>" class="combos" id='<?php echo 'certbrucelosis3'; ?>'>
        <?php if( isset($_SESSION['datos_ganaderoL']['certbrucelosis3'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['certbrucelosis3']);}else{ $aux=$row_ppg3['certbrucelosis'] ;}?>
        <option value=0  <?php if( $aux==0){echo 'selected' ;}?> >NO</option>
        <option value=1 <?php if( $aux==1){echo 'selected' ;}?>>SI</option>
      </select>
    </span></td>
    <td class="TituloCajaNegocios">
      <select <?php if ((($ano_3== 3)||($ano_3 == 5))==false){?> disabled <?php }?> name="certbrucelosisejec3" class="combos" id="certbrucelosisejec3">
      <?php  $aux=$row_ppgrcia3['certbrucelosis'] ;?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>NO</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>SI</option>
      </select>
    </td>

    <td><span class="TituloCajaNegocios">
      <select disabled name="<?php echo 'certbrucelosis4'; ?>" class="combos" id='<?php echo 'certbrucelosis4'; ?>'>
        <?php if( isset($_SESSION['datos_ganaderoL']['certbrucelosis4'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['certbrucelosis4']);}else{ $aux=$row_ppg4['certbrucelosis'] ;}?>
        <option value=0  <?php if( $aux==0){echo 'selected' ;}?> >NO</option>
        <option value=1 <?php if( $aux==1){echo 'selected' ;}?>>SI</option>
      </select>
    </span></td>
    <td class="TituloCajaNegocios">
      <select <?php if ((($ano_4== 4)||($ano_4 == 6))==false){?> disabled <?php }?> name="certbrucelosisejec3" class="combos" id="certbrucelosisejec3">
      <?php  $aux=$row_ppgrcia4['certbrucelosis'] ;?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>NO</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>SI</option>
      </select>
    </td>

    <td><span class="TituloCajaNegocios">
      <select disabled name="<?php echo 'certbrucelosis5'; ?>" class="combos" id='<?php echo 'certbrucelosis5'; ?>'>
        <?php if( isset($_SESSION['datos_ganaderoL']['certbrucelosis5'])){ $aux=htmlspecialchars($_SESSION['datos_ganaderoL']['certbrucelosis5']);}else{ $aux=$row_ppg5['certbrucelosis'] ;}?>
        <option value=0  <?php if( $aux==0){echo 'selected' ;}?> >NO</option>
        <option value=1 <?php if( $aux==1){echo 'selected' ;}?>>SI</option>
      </select>
    </span></td>
    <td class="TituloCajaNegocios">
      <select <?php if ((($ano_5== 5)||($ano_5 == 7))==false){?> disabled <?php }?> name="certbrucelosisejec5" class="combos" id="certbrucelosisejec5">
      <?php  $aux=$row_ppgrcia5['certbrucelosis'] ;?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>NO</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>SI</option>
      </select>
    </td>
  </tr>



  <tr align="left" >
    <td class="celdaCelesteClaro" align="left">Cabezas Ganado Produccion (Uni)</td>
    <td><input disabled name="cabganprod0" type="text" class="boxBusqueda4" id="cabganprod0" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo isset($_SESSION['datos_ganaderoL']['cabganprod0']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['cabganprod0']) : $row_ppg0['cabganprod'] ?>" ></td>
    <td class="celd aCelesteClaro" align="left">Cabezas Ganado Produccion (Uni)</td>
    <td><input disabled name="cabganprod1" type="text" class="boxBusqueda4" id="cabganprod1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['cabganprod1']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['cabganprod1']) : $row_ppg1['cabganprod'] ?>" ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_1 == 1)||($ano_1 == 3))==false){?> disabled <?php }?> name="cabganprodeje1" type="text" class="boxBusqueda4" id="cabganprodeje1" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia1['cabganprod'] == null){ echo ('0');} else{ echo $row_ppgrcia1['cabganprod']; } ?> "></td>
    <td><input disabled name="cabganprod2" type="text" class="boxBusqueda4" id="cabganprod2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['cabganprod2']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['cabganprod2']) : $row_ppg2['cabganprod'] ?>" ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_2 == 2)||($ano_2 == 4))==false){?> disabled <?php }?> name="cabganprodeje2" type="text" class="boxBusqueda4" id="cabganprodeje2" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia2['cabganprod'] == null){ echo ('0');} else{ echo $row_ppgrcia2['cabganprod']; } ?> "></td>
    <td><input disabled name="cabganprod3" type="text" class="boxBusqueda4" id="cabganprod3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['cabganprod3']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['cabganprod3']) : $row_ppg3['cabganprod'] ?>" ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_3 == 3)||($ano_3 == 5))==false){?> disabled <?php }?> name="cabganprodeje3" type="text" class="boxBusqueda4" id="cabganprodeje3" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia3['cabganprod'] == null){ echo ('0');} else{ echo $row_ppgrcia3['cabganprod']; } ?> "></td>
    <td><input disabled name="cabganprod4" type="text" class="boxBusqueda4" id="cabganprod4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['cabganprod4']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['cabganprod4']) : $row_ppg4['cabganprod'] ?>" ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_4 == 4)||($ano_4 == 6))==false){?> disabled <?php }?> name="cabganprodeje4" type="text" class="boxBusqueda4" id="cabganprodeje4" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia4['cabganprod'] == null){ echo ('0');} else{ echo $row_ppgrcia4['cabganprod']; } ?> "></td>
    <td><input disabled name="cabganprod5" type="text" class="boxBusqueda4" id="cabganprod5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['cabganprod5']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['cabganprod5']) : $row_ppg5['cabganprod'] ?>" ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_5 == 5)||($ano_5 == 7))==false){?> disabled <?php }?> name="cabganprodeje5" type="text" class="boxBusqueda4" id="cabganprodeje5" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia5['cabganprod'] == null){ echo ('0');} else{ echo $row_ppgrcia5['cabganprod']; } ?> "></td>
  </tr>



  <tr align="left" >
    <td class="celdaCelesteClaro" align="left">Cabezas Ganando Descarte (10%)</td>
    <td><input ndisabled ame="cabgandescar0" type="text" class="boxBusqueda4" id="cabgandescar0" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['cabgandescar0']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['cabgandescar0']) : $row_ppg0['cabgandescar'] ?>" ></td>
    <td class="celdaCelesteClaro" align="left">Cabezas Ganando Descarte (10%)</td>
    <td><input disabled name="cabgandescar1" type="text" class="boxBusqueda4" id="cabgandescar1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['cabgandescar1']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['cabgandescar1']) : $row_ppg1['cabgandescar']  ?>" ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_1 == 1)||($ano_1 == 3))==false){?> disabled <?php }?> name="cabgandescareje1" type="text" class="boxBusqueda4" id="cabgandescareje1" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia1['cabgandescar'] == null){ echo ('0');} else{ echo $row_ppgrcia1['cabgandescar']; } ?> "></td>
    <td><input disabled name="cabgandescar2" type="text" class="boxBusqueda4" id="cabgandescar2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['cabgandescar2']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['cabgandescar2']) : $row_ppg2['cabgandescar']  ?>" ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_2 == 2)||($ano_2 == 4))==false){?> disabled <?php }?> name="cabgandescareje2" type="text" class="boxBusqueda4" id="cabgandescareje2" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia2['cabgandescar'] == null){ echo ('0');} else{ echo $row_ppgrcia2['cabgandescar']; } ?> "></td>
    <td><input disabled name="cabgandescar3" type="text" class="boxBusqueda4" id="cabgandescar3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['cabgandescar3']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['cabgandescar3']) : $row_ppg3['cabgandescar']  ?>" ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_3 == 3)||($ano_3 == 5))==false){?> disabled <?php }?> name="cabgandescareje3" type="text" class="boxBusqueda4" id="cabgandescareje3" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia3['cabgandescar'] == null){ echo ('0');} else{ echo $row_ppgrcia3['cabgandescar']; } ?> "></td>
    <td><input disabled name="cabgandescar4" type="text" class="boxBusqueda4" id="cabgandescar4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['cabgandescar4']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['cabgandescar4']) : $row_ppg4['cabgandescar']  ?>" ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_4 == 4)||($ano_4 == 6))==false){?> disabled <?php }?> name="cabgandescareje4" type="text" class="boxBusqueda4" id="cabgandescareje4" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia4['cabgandescar'] == null){ echo ('0');} else{ echo $row_ppgrcia4['cabgandescar']; } ?> "></td>
    <td><input disabled name="cabgandescar5" type="text" class="boxBusqueda4" id="cabgandescar5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['cabgandescar5']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['cabgandescar5']) : $row_ppg5['cabgandescar']  ?>" ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_5 == 5)||($ano_5 == 7))==false){?> disabled <?php }?> name="cabgandescareje5" type="text" class="boxBusqueda4" id="cabgandescareje5" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia5['cabgandescar'] == null){ echo ('0');} else{ echo $row_ppgrcia5['cabgandescar']; } ?> "></td>
  </tr>

  <tr align="left" >
    <td class="celdaCelesteClaro" align="left">Produccion Promedio de  Carne(Kg/Hato)</td>
    <td><input disabled name="prodcarne0" type="text" class="boxBusqueda4" id="prodcarne0" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['prodcarne0']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['prodcarne0']) : $row_ppg0['prodcarne']  ?>" ></td>
    <td class="celdaCelesteClaro" align="left">Produccion Promedio de  Carne(Kg/Hato)</td>
    <td><input disabled name="prodcarne1" type="text" class="boxBusqueda4" id="prodcarne1" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['prodcarne1']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['prodcarne1']) : $row_ppg1['prodcarne'] ?>" ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_1 == 1)||($ano_1 == 3))==false){?> disabled <?php }?> name="prodcarneeje1" type="text" class="boxBusqueda4" id="prodcarneeje1" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia1['prodcarne'] == null){ echo ('0');} else{ echo $row_ppgrcia1['prodcarne']; } ?> "></td>
    <td><input disabled name="prodcarne2" type="text" class="boxBusqueda4" id="prodcarne2" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['prodcarne2']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['prodcarne2']) : $row_ppg2['prodcarne'] ?>" ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_2 == 2)||($ano_2 == 4))==false){?> disabled <?php }?> name="prodcarneeje2" type="text" class="boxBusqueda4" id="prodcarneeje2" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia2['prodcarne'] == null){ echo ('0');} else{ echo $row_ppgrcia2['prodcarne']; } ?> "></td>
    <td><input disabled name="prodcarne3" type="text" class="boxBusqueda4" id="prodcarne3" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['prodcarne3']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['prod3arne3']) : $row_ppg3['prodcarne'] ?>" ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_3 == 3)||($ano_3 == 5))==false){?> disabled <?php }?> name="prodcarneeje3" type="text" class="boxBusqueda4" id="prodcarneeje3" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia3['prodcarne'] == null){ echo ('0');} else{ echo $row_ppgrcia3['prodcarne']; } ?> "></td>
    <td><input disabled name="prodcarne4" type="text" class="boxBusqueda4" id="prodcarne4" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['prodcarne4']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['prodcarne4']) : $row_ppg4['prodcarne'] ?>"></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_4 == 4)||($ano_4 == 6))==false){?> disabled <?php }?> name="prodcarneeje4" type="text" class="boxBusqueda4" id="prodcarneeje4" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia4['prodcarne'] == null){ echo ('0');} else{ echo $row_ppgrcia4['prodcarne']; } ?> "></td>
    <td><input disabled name="prodcarne5" type="text" class="boxBusqueda4" id="prodcarne5" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_ganaderoL']['prodcarne5']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['prodcarne5']) : $row_ppg5['prodcarne'] ?>"  ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_5 == 5)||($ano_5 == 7))==false){?> disabled <?php }?> name="prodcarneeje5" type="text" class="boxBusqueda4" id="prodcarneeje5" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia5['prodcarne'] == null){ echo ('0');} else{ echo $row_ppgrcia5['prodcarne']; } ?> "></td>
  </tr>

  <tr align="left" >
    <td class="celdaCelesteClaro" align="left">Produccion Promedio de Leche(Lt/Hato)</td>
    <td><input disabled name="prodleche0" type="text" class="boxBusqueda4" id="prodleche0" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['prodleche0']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['prodleche0']) : $row_ppg0['prodleche'] ?>" ></td>
    <td class="celdaCelesteClaro" align="left">Produccion Promedio de Leche(Lt/Hato)</td>
    <td><input disabled name="prodleche1" type="text" class="boxBusqueda4" id="prodleche1" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['prodleche1']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['prodleche1']) : $row_ppg1['prodleche'] ?>" ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_1 == 1)||($ano_1 == 3))==false){?> disabled <?php }?> name="prodlecheeje1" type="text" class="boxBusqueda4" id="prodlecheeje1" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia1['prodleche'] == null){ echo ('0');} else{ echo $row_ppgrcia1['prodleche']; } ?> "></td>
    <td><input disabled name="prodleche2" type="text" class="boxBusqueda4" id="prodleche2" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['prodleche2']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['prodleche2']) : $row_ppg2['prodleche'] ?>" ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_2 == 2)||($ano_2 == 4))==false){?> disabled <?php }?> name="prodlecheeje2" type="text" class="boxBusqueda4" id="prodlecheeje2" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia2['prodleche'] == null){ echo ('0');} else{ echo $row_ppgrcia2['prodleche']; } ?> "></td>
    <td><input disabled name="prodleche3" type="text" class="boxBusqueda4" id="prodleche3" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['prodleche3']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['prodleche3']) : $row_ppg3['prodleche'] ?>" ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_3 == 3)||($ano_3 == 5))==false){?> disabled <?php }?> name="prodlecheeje3" type="text" class="boxBusqueda4" id="prodlecheeje3" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia3['prodleche'] == null){ echo ('0');} else{ echo $row_ppgrcia3['prodleche']; } ?> "></td>
    <td><input disabled name="prodleche4" type="text" class="boxBusqueda4" id="prodleche4" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['prodleche4']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['prodleche4']) : $row_ppg4['prodleche'] ?>" ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_4 == 4)||($ano_4 == 6))==false){?> disabled <?php }?> name="prodlecheeje4" type="text" class="boxBusqueda4" id="prodlecheeje4" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia4['prodleche'] == null){ echo ('0');} else{ echo $row_ppgrcia4['prodleche']; } ?> "></td>
    <td><input disabled name="prodleche5" type="text" class="boxBusqueda4" id="prodleche5" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['prodleche5']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['prodleche5']) : $row_ppg5['prodleche'] ?>" ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_5 == 5)||($ano_5 == 7))==false){?> disabled <?php }?> name="prodlecheeje5" type="text" class="boxBusqueda4" id="prodlecheeje5" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia5['prodleche'] == null){ echo ('0');} else{ echo $row_ppgrcia5['prodleche']; } ?> "></td>
  </tr>

  <tr align="left" >
    <td class="celdaCelesteClaro" align="left">Produccion Total de Leche(Lt/año)</td>
    <td><input disabled name="prodtotleche0" type="text" class="boxBusqueda4" id="prodtotleche0" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['prodtotleche0']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['prodtotleche0']) : $row_ppg0['prodtotleche'] ?>" ></td>
    <td class="celdaCelesteClaro" align="left">Produccion Total de Leche(Lt/año)</td>
    <td><input disabled name="prodtotleche1" type="text" class="boxBusqueda4" id="prodtotleche1" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['prodtotleche1']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['prodtotleche1']) : $row_ppg1['prodtotleche'] ?>" ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_1 == 1)||($ano_1 == 3))==false){?> disabled <?php }?> name="prodtotlecheejec1" type="text" class="boxBusqueda4" id="prodtotlecheejec1" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia1['prodtotleche'] == null){ echo ('0');} else{ echo $row_ppgrcia1['prodtotleche']; } ?> "></td>
    <td><input disabled name="prodtotleche2" type="text" class="boxBusqueda4" id="prodtotleche2" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['prodtotleche2']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['prodtotleche2']) : $row_ppg2['prodtotleche'] ?>" ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_2 == 2)||($ano_2 == 4))==false){?> disabled <?php }?> name="prodtotlecheejec2" type="text" class="boxBusqueda4" id="prodtotlecheejec2" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia2['prodtotleche'] == null){ echo ('0');} else{ echo $row_ppgrcia2['prodtotleche']; } ?> "></td>
    <td><input disabled name="prodtotleche3" type="text" class="boxBusqueda4" id="prodtotleche3" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['prodtotleche3']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['prodtotleche3']) : $row_ppg3['prodtotleche'] ?>" ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_3 == 3)||($ano_3 == 5))==false){?> disabled <?php }?> name="prodtotlecheejec3" type="text" class="boxBusqueda4" id="prodtotlecheejec3" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia3['prodtotleche'] == null){ echo ('0');} else{ echo $row_ppgrcia3['prodtotleche']; } ?> "></td>
    <td><input disabled name="prodtotleche4" type="text" class="boxBusqueda4" id="prodtotleche4" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['prodtotleche4']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['prodtotleche4']) : $row_ppg4['prodtotleche'] ?>" ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_4 == 4)||($ano_4 == 6))==false){?> disabled <?php }?> name="prodtotlecheejec4" type="text" class="boxBusqueda4" id="prodtotlecheejec4" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia4['prodtotleche'] == null){ echo ('0');} else{ echo $row_ppgrcia4['prodtotleche']; } ?> "></td>
    <td><input disabled name="prodtotleche5" type="text" class="boxBusqueda4" id="prodtotleche5" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganaderoL']['prodtotleche5']) ? htmlspecialchars($_SESSION['datos_ganaderoL']['prodtotleche5']) : $row_ppg5['prodtotleche'] ?>" ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_5 == 5)||($ano_5 == 7))==false){?> disabled <?php }?> name="prodtotlecheejec5" type="text" class="boxBusqueda4" id="prodtotlecheejec5" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia5['prodtotleche'] == null){ echo ('0');} else{ echo $row_ppgrcia5['prodtotleche']; } ?> "></td>
  </tr>
  </table>


<table border="0" width="95%" class="taulaA" align="center">
  <tr>
    <td width="11%"><span class="taulaH">5. Observaciones:</span></td>
    <td width="89%" rowspan="2"><textarea name="RGanaderaLecheraObservaciones" id="RGanaderaLecheraObservaciones" cols="110" rows="4"><?php echo trim($row_obser['obsregistro']);?></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<p><br>
  <input id="guardarstepganlechrcia" class="boton verde formaBoton" type="submit" value="Guardar" name="guardarstepganlechrcia">
</p>
</form>
</div>
