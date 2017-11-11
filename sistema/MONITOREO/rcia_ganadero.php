<?php
//print_r($_SESSION);
?>


<div align="center" class="texto">

<form action="ganadero_rcia.php" method="POST" name = "form-ganaderarcia" autocomplete="off" id="form-ganaderarcia" enctype="multipart/form-data" >


  <b><big>GANADERO </big></b><br>
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
							$sql_actividad = "select * from codificadores where idcodificadores > 299 and idcodificadores < 303 order by idcodificadores asc";
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
							<td colspan="2" class="cabecera2">Sistemas de Producción Ganadera En el Predio Linea Base</td>
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
								<td width="192">
								  <input type="text" disabled name="<?php echo 'TxtSist'.$row_SistProduccion['idcodificadores'];?>" class="boxBusqueda3" <?php if( !(isset($_SESSION['datos_ganadero']["chk".$row_SistProduccion['idcodificadores']])) ) { if(isset($totalRows_SistProd) && $row_SistProd['idsistproductivo']!=$row_SistProduccion['idcodificadores']){echo 'disabled';}}?>  id="<?php echo 'TxtSist'.$row_SistProduccion['idcodificadores'];?>" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="document.forms[0].submit()" value="<?php if(isset($_SESSION['datos_ganadero']['TxtSist'.$valor])) { echo $_SESSION['datos_ganadero']['TxtSist'.$valor];} elseif( isset($row_SistProd['idsistproductivo']) && $row_SistProd['idsistproductivo']==$row_SistProduccion['idcodificadores'] ){ echo $row_SistProd['cantidad'];} ?>" >
								 </td>
							  </tr>
						  <?php
            }
            while ($row_SistProduccion = pg_fetch_assoc($SistProduccion));?>
					</table>

					</td>


         </tr>








         <tr>

         <td width="70%">

         <table width="100%" border="1" class='taulaA' id="dataTable5" >

           <tr>
             <td width="10%" align="center" class="cabecera2" id="blau">Sistema de Produccion Ganadera</td>

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
                 $sql_SistProduccion2 = "Select * From \"codificadores\" Where \"idclasificador\"=13 Order by \"idcodificadores\"";
                 $SistProduccion2 = pg_query($cn,$sql_SistProduccion2) ;
                 $row_SistProduccion2 = pg_fetch_array ($SistProduccion2);

           do {   ?>


           <tr>

           <td align="center" id="blau16"><?php echo $row_SistProduccion2['nombrecodificador']?></td>


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


             $sql_valor_sistema = " select sp.cantidad from monitoreo.sistemaproduccion as sp inner join monitoreo.monitoreo as m on sp.idmonitoreo = m.idmonitoreo
                                    where idregistro = ".$_SESSION['idreg']." and m.anho = ".$anoacti." and sp.idsistproductivo =".$row_SistProduccion2['idcodificadores'];
             $valorsistema = pg_query($cn,$sql_valor_sistema);
             $row_cantidad = pg_fetch_array($valorsistema);



           ?>
               <td align="center" id="blau16">
                    <input id="<?php echo $row_SistProduccion2['idcodificadores'].'-'.$cont?>" name="<?php echo $row_SistProduccion2['idcodificadores'].'-'.$cont?>" <?php if ($anoactivomon==0) {?> disabled <?php }  ?>  type="text" class="boxBusqueda4" id="suppastoejecutado5" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php  if($row_cantidad['cantidad'] == null){ echo ('0');} else{ echo $row_cantidad['cantidad']; } ?>">
               </td>
               <?php $cont = $cont + 1;
               $anoacti = $anoacti + 1;
           }
            while ($cont <= 5 );	?>

            <?php

            } while ($row_SistProduccion2 = pg_fetch_assoc($SistProduccion2));?>

           </tr>

         </table>

         </td>

        </tr>












			</table>
         </td>
  </tr>
 </table>
<td >&nbsp;</td>


<table width="95%" border="1" class='taulaA' align="center">
   <tr class="texto_normal">
        <td colspan="16" id='blau4'><span class="taulaH">Resultados Obtenidos (Sistema de Cria, Recria y engorde)</span></td>
   </tr>


  <tr align="center">
    <td colspan="2" rowspan="2" class="cabecera2">Linea Base</td>
    <td width="2%" rowspan="19" >&nbsp;</td>
    <td colspan="13" class="cabecera2">Resultados Alcanzados</td>
  </tr>

  <tr align="center">
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
					<td class="cabecera2">Total Programado</td>
					<td class="celdaAmarilla">Total Ejecutado</td>
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
					<td class="cabecera2">Total Programado</td>
					<td class="celdaAmarilla">Total Ejecutado</td>
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
    <td colspan="13" class="taulaH">En Area de Deforestada Ilegal y/o P.A.S.:</td>
  </tr>

  <tr >
    <td class="celdaCelesteClaro" >Sup. Pastos Naturales </td>
    <td align="left"class="celdaCelesteClaro" ><input name="suppastonatural0" type="text" class="boxBusqueda4" id="suppastonatural0" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo isset($_SESSION['datos_ganadero']['suppastonatural0']) ? htmlspecialchars($_SESSION['datos_ganadero']['suppastonatural0']) : $row_ppg0['suppastonatural'] ?>" disabled></td>
    <td class="celdaCelesteClaro" >Sup. Pastos Naturales </td>
    <td align="left"class="celdaCelesteClaro" >--</td>
    <td align="left"class="celdaAmarilla" >--</td>
    <td align="left"class="celdaCelesteClaro" >--</td>
    <td align="left"class="celdaAmarilla" >--</td>
    <td align="left"class="celdaCelesteClaro" >--</td>
    <td align="left"class="celdaAmarilla" >--</td>
	<td align="left"class="celdaCelesteClaro" >--</td>
	<td align="left"class="celdaAmarilla" >--</td>
	<td align="left"class="celdaCelesteClaro" >--</td>
	<td align="left"class="celdaAmarilla" >--</td>
	<td align="left"class="celdaCelesteClaro" >--</td>
	<td align="left"class="celdaAmarilla" >--</td>
  </tr>

  <tr align="center" >
    <td class="celdaCelesteClaro" align="left">Sup. Pastos Cultivados</td>
    <td class="celdaCelesteClaro"><label>
      <input name="suppastosembrado0" type="text" class="boxBusqueda4" id="suppastosembrado0" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo isset($_SESSION['datos_ganadero']['suppastosembrado0']) ? htmlspecialchars($_SESSION['datos_ganadero']['suppastosembrado0']) : $row_ppg0['suppastosembrado'] ?>" disabled>
    </label></td>
    <td class="celdaCelesteClaro" align="left">Sup. Pastos Cultivados</td>
    <td class="celdaCelesteClaro"><input name="suppastosembrado1" type="text" class="boxBusqueda4" id="suppastosembrado1" onChange="SumaVerticalG('suppastosembrado')" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo isset($_SESSION['datos_ganadero']['suppastosembrado1']) ? htmlspecialchars($_SESSION['datos_ganadero']['suppastosembrado1']) : $row_ppg1['suppastosembrado'] ?>" disabled></td>
        <td class="celdaAmarilla"><input <?php if ((($ano_1 == 1)||($ano_1 == 3))==false){?> disabled <?php }?> name="suppastoejecutado1" type="text" class="boxBusqueda4" id="suppastoejecutado1" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia1['suppastocultivado'] == null){ echo ('0');} else{ echo $row_ppgrcia1['suppastocultivado']; } ?> "></td>
	<td class="celdaCelesteClaro"><input name="suppastosembrado2" type="text" class="boxBusqueda4" id="suppastosembrado2" onChange="SumaVerticalG('suppastosembrado')" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['suppastosembrado2']) ? htmlspecialchars($_SESSION['datos_ganadero']['suppastosembrado2']) : $row_ppg2['suppastosembrado'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_2 == 2)||($ano_2 == 4))==false){?> disabled <?php }?> name="suppastoejecutado2" type="text" class="boxBusqueda4" id="suppastoejecutado2" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia2['suppastocultivado'] == null){ echo ('0');} else{ echo $row_ppgrcia2['suppastocultivado']; } ?>"></td>
	<td class="celdaCelesteClaro"><input name="suppastosembrado3" type="text" class="boxBusqueda4" id="suppastosembrado3" onChange="SumaVerticalG('suppastosembrado')" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['suppastosembrado3']) ? htmlspecialchars($_SESSION['datos_ganadero']['suppastosembrado3']) : $row_ppg3['suppastosembrado'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_3 == 3)||($ano_3 == 5))==false){?> disabled <?php }?> name="suppastoejecutado3" type="text" class="boxBusqueda4" id="suppastoejecutado3" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia3['suppastocultivado'] == null){ echo ('0');} else{ echo $row_ppgrcia3['suppastocultivado']; } ?>"></td>
	<td class="celdaCelesteClaro"><input name="suppastosembrado4" type="text" class="boxBusqueda4" id="suppastosembrado4" onChange="SumaVerticalG('suppastosembrado')" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['suppastosembrado4']) ? htmlspecialchars($_SESSION['datos_ganadero']['suppastosembrado4']) : $row_ppg4['suppastosembrado'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_4 == 4)||($ano_4 == 6))==false){?> disabled <?php }?>  name="suppastoejecutado4" type="text" class="boxBusqueda4" id="suppastoejecutado4" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia4['suppastocultivado'] == null){ echo ('0');} else{ echo $row_ppgrcia4['suppastocultivado']; } ?>"></td>
	<td class="celdaCelesteClaro"><input name="suppastosembrado5" type="text" class="boxBusqueda4" id="suppastosembrado5" onChange="SumaVerticalG('suppastosembrado')" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo isset($_SESSION['datos_ganadero']['suppastosembrado5']) ? htmlspecialchars($_SESSION['datos_ganadero']['suppastosembrado5']) : $row_ppg5['suppastosembrado'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_5 == 5)||($ano_5 == 7))==false){?> disabled <?php }?> name="suppastoejecutado5" type="text" class="boxBusqueda4" id="suppastoejecutado5" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia5['suppastocultivado'] == null){ echo ('0');} else{ echo $row_ppgrcia5['suppastocultivado']; } ?>"></td>
	<td class="celdaCelesteClaro"><input name="suppastosembradot" type="text" class="boxBusqueda4" id="suppastosembradot" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly   value="<?php echo isset($_SESSION['datos_ganadero']['suppastosembradot']) ? htmlspecialchars($_SESSION['datos_ganadero']['suppastosembradot']) : $row_ppg1['suppastosembrado']+$row_ppg2['suppastosembrado']+$row_ppg3['suppastosembrado']+$row_ppg4['suppastosembrado']+$row_ppg5['suppastosembrado'] ?>"></td>
		<td class="celdaAmarilla"><input name="suppastoejecutadot" type="text" class="boxBusqueda4" id="suppastoejecutadot" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" "></td>
  </tr>

  <tr align="left">
    <td colspan="2" align="left" class="taulaH"> En La Totalidad de Predio:</td>
    <td colspan="13" align="left" class="taulaH"> En La Totalidad de Predio:</td>
    </tr>

  <tr align="left">
    <td class="celdaCelesteClaro" align="left">Potreros con Alambrada (uni)</td>
    <td class="celdaCelesteClaro"><input name="potrero0" type="text" class="boxBusqueda4" id="potrero0" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo isset($_SESSION['datos_ganadero']['potrero0']) ? htmlspecialchars($_SESSION['datos_ganadero']['potrero0']) : $row_ppg0['potrero'] ?>" disabled ></td>
    <td class="celdaCelesteClaro" align="left">Potreros con Alambrada (uni)</td>
    <td class="celdaCelesteClaro"><input name="potrero1" type="text" class="boxBusqueda4" id="potrero1" onChange="SumaVerticalG('potrero')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['potrero1']) ? htmlspecialchars($_SESSION['datos_ganadero']['potrero1']) : $row_ppg1['potrero'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_1 == 1)||($ano_1 == 3))==false){?> disabled <?php }?> name="potreroM1" type="text" class="boxBusqueda4" id="potreroM1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia1['potrero'] == null){ echo ('0');} else{ echo $row_ppgrcia1['potrero']; } ?> " ></td>
    <td class="celdaCelesteClaro"><input name="potrero2" type="text" class="boxBusqueda4" id="potrero2" onChange="SumaVerticalG('potrero')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['potrero2']) ? htmlspecialchars($_SESSION['datos_ganadero']['potrero2']) : $row_ppg2['potrero'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_2 == 2)||($ano_2 == 4))==false){?> disabled <?php }?>  name="potreroM2" type="text" class="boxBusqueda4" id="potreroM2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia2['potrero'] == null){ echo ('0');} else{ echo $row_ppgrcia2['potrero']; } ?> " ></td>
	<td class="celdaCelesteClaro"><input name="potrero3" type="text" class="boxBusqueda4" id="potrero3" onChange="SumaVerticalG('potrero')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['potrero3']) ? htmlspecialchars($_SESSION['datos_ganadero']['potrero3']) : $row_ppg3['potrero'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_3 == 3)||($ano_3 == 5))==false){?> disabled <?php }?> name="potreroM3" type="text" class="boxBusqueda4" id="potreroM3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia3['potrero'] == null){ echo ('0');} else{ echo $row_ppgrcia3['potrero']; } ?> " ></td>
	<td class="celdaCelesteClaro"><input name="potrero4" type="text" class="boxBusqueda4" id="potrero4" onChange="SumaVerticalG('potrero')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['potrero4']) ? htmlspecialchars($_SESSION['datos_ganadero']['potrero4']) : $row_ppg4['potrero'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_4 == 4)||($ano_4 == 6))==false){?> disabled <?php }?> name="potreroM4" type="text" class="boxBusqueda4" id="potreroM4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia4['potrero'] == null){ echo ('0');} else{ echo $row_ppgrcia4['potrero']; } ?> " ></td>
	<td class="celdaCelesteClaro"><input name="potrero5" type="text" class="boxBusqueda4" id="potrero5" onChange="SumaVerticalG('potrero')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['potrero5']) ? htmlspecialchars($_SESSION['datos_ganadero']['potrero5']) : $row_ppg5['potrero'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_5 == 5)||($ano_5 == 7))==false){?> disabled <?php }?> name="potreroM5" type="text" class="boxBusqueda4" id="potreroM5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia5['potrero'] == null){ echo ('0');} else{ echo $row_ppgrcia5['potrero']; } ?> " ></td>
	<td class="celdaCelesteClaro"><input name="potrerot" type="text" class="boxBusqueda4" id="potrerot" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['potrerot']) ? htmlspecialchars($_SESSION['datos_ganadero']['potrerot']) :  $row_ppg1['potrero'] +$row_ppg2['potrero']+$row_ppg3['potrero']+$row_ppg4['potrero']+$row_ppg5['potrero'] ?>" disabled></td>
		<td class="celdaAmarilla"><input name="potreromt" type="text" class="boxBusqueda4" id="potreromt" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="" ></td>
  </tr>

  <tr align="left">
    <td class="celdaCelesteClaro" align="left">Aguada, Pozas, Atajados (uni)</td>
    <td class="celdaCelesteClaro"><input name="pozas0" type="text" class="boxBusqueda4" id="pozas0" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['pozas0']) ? htmlspecialchars($_SESSION['datos_ganadero']['pozas0']) : $row_ppg0['pozas'] ?>" disabled></td>
    <td class="celdaCelesteClaro" align="left">Aguada, Pozas, Atajados (uni)</td>
    <td class="celdaCelesteClaro"><input name="pozas1" type="text" class="boxBusqueda4" id="pozas1" onChange="SumaVerticalG('pozas')"  onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo isset($_SESSION['datos_ganadero']['pozas1']) ? htmlspecialchars($_SESSION['datos_ganadero']['pozas1']) : $row_ppg1['pozas'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_1 == 1)||($ano_1 == 3))==false){?> disabled <?php }?> name="pozasM1" type="text" class="boxBusqueda4" id="pozasM1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia1['pozas'] == null){ echo ('0');} else{ echo $row_ppgrcia1['pozas']; } ?> " ></td>
	<td class="celdaCelesteClaro"><input name="pozas2" type="text" class="boxBusqueda4" id="pozas2" onChange="SumaVerticalG('pozas')"  onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['pozas2']) ? htmlspecialchars($_SESSION['datos_ganadero']['pozas2']) : $row_ppg2['pozas'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_2 == 2)||($ano_2 == 4))==false){?> disabled <?php }?> name="pozasM2" type="text" class="boxBusqueda4" id="pozasM2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia2['pozas'] == null){ echo ('0');} else{ echo $row_ppgrcia2['pozas']; } ?> " ></td>
	<td class="celdaCelesteClaro"><input name="pozas3" type="text" class="boxBusqueda4" id="pozas3" onChange="SumaVerticalG('pozas')"  onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['pozas3']) ? htmlspecialchars($_SESSION['datos_ganadero']['pozas3']) : $row_ppg3['pozas'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_3 == 3)||($ano_3 == 5))==false){?> disabled <?php }?> name="pozasM3" type="text" class="boxBusqueda4" id="pozasM3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia3['pozas'] == null){ echo ('0');} else{ echo $row_ppgrcia3['pozas']; } ?> " ></td>
	<td class="celdaCelesteClaro"><input name="pozas4" type="text" class="boxBusqueda4" id="pozas4" onChange="SumaVerticalG('pozas')"  onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['pozas4']) ? htmlspecialchars($_SESSION['datos_ganadero']['pozas4']) : $row_ppg4['pozas'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_4 == 4)||($ano_4 == 6))==false){?> disabled <?php }?>  name="pozasM4" type="text" class="boxBusqueda4" id="pozasM4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia4['pozas'] == null){ echo ('0');} else{ echo $row_ppgrcia4['pozas']; } ?> " ></td>
	<td class="celdaCelesteClaro"><input name="pozas5" type="text" class="boxBusqueda4" id="pozas5" onChange="SumaVerticalG('pozas')"  onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['pozas5']) ? htmlspecialchars($_SESSION['datos_ganadero']['pozas5']) : $row_ppg5['pozas'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_5 == 5)||($ano_5 == 7))==false){?> disabled <?php }?>  name="pozasM5" type="text" class="boxBusqueda4" id="pozasM5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia5['pozas'] == null){ echo ('0');} else{ echo $row_ppgrcia5['pozas']; } ?> " ></td>
	<td class="celdaCelesteClaro"><input name="pozast" type="text" class="boxBusqueda4" id="pozast" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo isset($_SESSION['datos_ganadero']['pozast']) ? htmlspecialchars($_SESSION['datos_ganadero']['pozast']) : $row_ppg1['pozas']+$row_ppg2['pozas']+$row_ppg3['pozas']+$row_ppg4['pozas']+$row_ppg5['pozas'] ?>" disabled></td>
		<td class="celdaAmarilla"><input name="pozasmt" type="text" class="boxBusqueda4" id="pozasmt" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="" ></td>
 </tr>

  <tr align="left">
    <td class="celdaCelesteClaro" align="left">Saleros(uni)</td>
    <td class="celdaCelesteClaro"><input name="saleros0" type="text" class="boxBusqueda4" id="saleros0"  onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['saleros0']) ? htmlspecialchars($_SESSION['datos_ganadero']['saleros0']) : $row_ppg0['saleros'] ?>" disabled></td>
    <td class="celdaCelesteClaro" align="left">Saleros(uni)</td>
    <td class="celdaCelesteClaro"><input name="saleros1" type="text" class="boxBusqueda4" id="saleros1" onChange="SumaVerticalG('saleros')"  onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['saleros1']) ? htmlspecialchars($_SESSION['datos_ganadero']['saleros1']) :  $row_ppg1['saleros'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_1 == 1)||($ano_1 == 3))==false){?> disabled <?php }?> name="salerosM1" type="text" class="boxBusqueda4" id="salerosM1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia1['saleros'] == null){ echo ('0');} else{ echo $row_ppgrcia1['saleros']; } ?> " ></td>
	<td class="celdaCelesteClaro"><input name="saleros2" type="text" class="boxBusqueda4" id="saleros2" onChange="SumaVerticalG('saleros')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['saleros2']) ? htmlspecialchars($_SESSION['datos_ganadero']['saleros2']) :  $row_ppg2['saleros'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_2 == 2)||($ano_2 == 4))==false){?> disabled <?php }?> name="salerosM2" type="text" class="boxBusqueda4" id="salerosM2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia2['saleros'] == null){ echo ('0');} else{ echo $row_ppgrcia2['saleros']; } ?>" ></td>
	<td class="celdaCelesteClaro"><input name="saleros3" type="text" class="boxBusqueda4" id="saleros3" onChange="SumaVerticalG('saleros')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['saleros3']) ? htmlspecialchars($_SESSION['datos_ganadero']['saleros3']) :  $row_ppg3['saleros'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_3 == 3)||($ano_3 == 5))==false){?> disabled <?php }?> name="salerosM3" type="text" class="boxBusqueda4" id="salerosM3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia3['saleros'] == null){ echo ('0');} else{ echo $row_ppgrcia3['saleros']; } ?>" ></td>
	<td class="celdaCelesteClaro"><input name="saleros4" type="text" class="boxBusqueda4" id="saleros4" onChange="SumaVerticalG('saleros')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['saleros4']) ? htmlspecialchars($_SESSION['datos_ganadero']['saleros4']) :  $row_ppg4['saleros'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_4 == 4)||($ano_4 == 6))==false){?> disabled <?php }?>  name="salerosM4" type="text" class="boxBusqueda4" id="salerosM4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia4['saleros'] == null){ echo ('0');} else{ echo $row_ppgrcia4['saleros']; } ?>" ></td>
	<td class="celdaCelesteClaro"><input name="saleros5" type="text" class="boxBusqueda4" id="saleros5" onChange="SumaVerticalG('saleros')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['saleros5']) ? htmlspecialchars($_SESSION['datos_ganadero']['saleros5']) :  $row_ppg5['saleros'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_5 == 5)||($ano_5 == 7))==false){?> disabled <?php }?>  name="salerosM5" type="text" class="boxBusqueda4" id="salerosM5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia5['saleros'] == null){ echo ('0');} else{ echo $row_ppgrcia5['saleros']; } ?>" ></td>
	<td class="celdaCelesteClaro"><input name="salerost" type="text" class="boxBusqueda4" id="salerost" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['salerost']) ? htmlspecialchars($_SESSION['datos_ganadero']['salerost']) :   $row_ppg1['saleros']+ $row_ppg2['saleros']+ $row_ppg3['saleros']+ $row_ppg4['saleros']+ $row_ppg5['saleros'] ?>"  disabled></td>
		<td class="celdaAmarilla"><input name="salerosmt" type="text" class="boxBusqueda4" id="salerosmt" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="" ></td>
  </tr>

  <tr align="left">
    <td class="celdaCelesteClaro" align="left">Bebederos(uni)</td>
    <td class="celdaCelesteClaro"><input name="bebederos0" type="text" class="boxBusqueda4" id="bebederos0"  onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['bebederos0']) ? htmlspecialchars($_SESSION['datos_ganadero']['bebederos0']) :  $row_ppg0['bebederos'] ?>" disabled></td>
    <td class="celdaCelesteClaro" align="left">Bebederos(uni)</td>
    <td class="celdaCelesteClaro"><input name="bebederos1" type="text" class="boxBusqueda4" id="bebederos1" onChange="SumaVerticalG('bebederos')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['bebederos1']) ? htmlspecialchars($_SESSION['datos_ganadero']['bebederos1']) : $row_ppg1['bebederos'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_1 == 1)||($ano_1 == 3))==false){?> disabled <?php }?> name="bebederosM1" type="text" class="boxBusqueda4" id="bebederosM1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia1['bebederos'] == null){ echo ('0');} else{ echo $row_ppgrcia1['bebederos']; } ?> " ></td>
	<td class="celdaCelesteClaro"><input name="bebederos2" type="text" class="boxBusqueda4" id="bebederos2" onChange="SumaVerticalG('bebederos')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['bebederos2']) ? htmlspecialchars($_SESSION['datos_ganadero']['bebederos2']) : $row_ppg2['bebederos'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_2 == 2)||($ano_2 == 4))==false){?> disabled <?php }?> name="bebederosM2" type="text" class="boxBusqueda4" id="bebederosM2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia2['bebederos'] == null){ echo ('0');} else{ echo $row_ppgrcia2['bebederos']; } ?>" ></td>
	<td class="celdaCelesteClaro"><input name="bebederos3" type="text" class="boxBusqueda4" id="bebederos3" onChange="SumaVerticalG('bebederos')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['bebederos3']) ? htmlspecialchars($_SESSION['datos_ganadero']['bebederos3']) : $row_ppg3['bebederos'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_3 == 3)||($ano_3 == 5))==false){?> disabled <?php }?> name="bebederosM3" type="text" class="boxBusqueda4" id="bebederosM3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia3['bebederos'] == null){ echo ('0');} else{ echo $row_ppgrcia3['bebederos']; } ?>" ></td>
	<td class="celdaCelesteClaro"><input name="bebederos4" type="text" class="boxBusqueda4" id="bebederos4" onChange="SumaVerticalG('bebederos')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['bebederos4']) ? htmlspecialchars($_SESSION['datos_ganadero']['bebederos4']) : $row_ppg4['bebederos'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_4 == 4)||($ano_4 == 6))==false){?> disabled <?php }?>  name="bebederosM4" type="text" class="boxBusqueda4" id="bebederosM4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia4['bebederos'] == null){ echo ('0');} else{ echo $row_ppgrcia4['bebederos']; } ?>" ></td>
	<td class="celdaCelesteClaro"><input name="bebederos5" type="text" class="boxBusqueda4" id="bebederos5" onChange="SumaVerticalG('bebederos')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['bebederos5']) ? htmlspecialchars($_SESSION['datos_ganadero']['bebederos5']) : $row_ppg5['bebederos'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_5 == 5)||($ano_5 == 7))==false){?> disabled <?php }?>  name="bebederosM5" type="text" class="boxBusqueda4" id="bebederosM5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia5['bebederos'] == null){ echo ('0');} else{ echo $row_ppgrcia5['bebederos']; } ?>" ></td>
	<td class="celdaCelesteClaro"><input name="bebederost" type="text" class="boxBusqueda4" id="bebederost" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  readonly  value="<?php echo isset($_SESSION['datos_ganadero']['bebederost']) ? htmlspecialchars($_SESSION['datos_ganadero']['bebederost']) : $row_ppg1['bebederos']+$row_ppg2['bebederos']+$row_ppg3['bebederos']+$row_ppg4['bebederos']+$row_ppg5['bebederos'] ?>"></td>
		<td class="celdaAmarilla"><input name="bebederosMt" type="text" class="boxBusqueda4" id="bebederosMt" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="" ></td>
  </tr>

  <tr align="left">
    <td class="celdaCelesteClaro" align="left">Brete (uni)</td>
    <td class="celdaCelesteClaro"><input name="brete0" type="text" class="boxBusqueda4" id="brete0" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['brete0']) ? htmlspecialchars($_SESSION['datos_ganadero']['brete0']) : $row_ppg0['brete'] ?>" disabled></td>
    <td class="celdaCelesteClaro" align="left">Brete (uni)</td>
    <td class="celdaCelesteClaro"><input name="brete1" type="text" class="boxBusqueda4" id="brete1" onChange="SumaVerticalG('brete')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['brete1']) ? htmlspecialchars($_SESSION['datos_ganadero']['brete1']) : $row_ppg1['brete'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_1 == 1)||($ano_1 == 3))==false){?> disabled <?php }?> name="breteM1" type="text" class="boxBusqueda4" id="breteM1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia1['brete'] == null){ echo ('0');} else{ echo $row_ppgrcia1['brete']; } ?>" ></td>
	<td class="celdaCelesteClaro"><input name="brete2" type="text" class="boxBusqueda4" id="brete2" onChange="SumaVerticalG('brete')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['brete2']) ? htmlspecialchars($_SESSION['datos_ganadero']['brete2']) : $row_ppg2['brete'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_2 == 2)||($ano_2 == 4))==false){?> disabled <?php }?> name="breteM2" type="text" class="boxBusqueda4" id="breteM2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia2['brete'] == null){ echo ('0');} else{ echo $row_ppgrcia2['brete']; } ?>" ></td>
	<td class="celdaCelesteClaro"><input name="brete3" type="text" class="boxBusqueda4" id="brete3" onChange="SumaVerticalG('brete')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['brete3']) ? htmlspecialchars($_SESSION['datos_ganadero']['brete3']) : $row_ppg3['brete'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_3 == 3)||($ano_3 == 5))==false){?> disabled <?php }?> name="breteM3" type="text" class="boxBusqueda4" id="breteM3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia3['brete'] == null){ echo ('0');} else{ echo $row_ppgrcia3['brete']; } ?>" ></td>
	<td class="celdaCelesteClaro"><input name="brete4" type="text" class="boxBusqueda4" id="brete4" onChange="SumaVerticalG('brete')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['brete4']) ? htmlspecialchars($_SESSION['datos_ganadero']['brete4']) : $row_ppg4['brete'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_4 == 4)||($ano_4 == 6))==false){?> disabled <?php }?>  name="breteM4" type="text" class="boxBusqueda4" id="breteM4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia4['brete'] == null){ echo ('0');} else{ echo $row_ppgrcia4['brete']; } ?>" ></td>
	<td class="celdaCelesteClaro"><input name="brete5" type="text" class="boxBusqueda4" id="brete5" onChange="SumaVerticalG('brete')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo isset($_SESSION['datos_ganadero']['brete5']) ? htmlspecialchars($_SESSION['datos_ganadero']['brete5']) : $row_ppg5['brete'] ?>"disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_5 == 5)||($ano_5 == 7))==false){?> disabled <?php }?>  name="breteM5" type="text" class="boxBusqueda4" id="breteM5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia5['brete'] == null){ echo ('0');} else{ echo $row_ppgrcia5['brete']; } ?>" ></td>
	<td class="celdaCelesteClaro"><input name="bretet" type="text" class="boxBusqueda4" id="bretet" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  readonly  value="<?php echo isset($_SESSION['datos_ganadero']['bretet']) ? htmlspecialchars($_SESSION['datos_ganadero']['bretet']) : $row_ppg1['brete']+$row_ppg2['brete']+$row_ppg3['brete']+$row_ppg4['brete']+$row_ppg5['brete'] ?>"></td>
		<td class="celdaAmarilla"><input name="breteMt" type="text" class="boxBusqueda4" id="breteMt" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="" ></td>
  </tr>

  <tr align="left">
    <td class="celdaCelesteClaro" align="left">Corral(uni)</td>
    <td class="celdaCelesteClaro"><input name="corral0" type="text" class="boxBusqueda4" id="corral0" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['corral0']) ? htmlspecialchars($_SESSION['datos_ganadero']['corral0']) : $row_ppg0['corral'] ?>" disabled></td>
    <td class="celdaCelesteClaro" align="left">Corral(uni)</td>
    <td class="celdaCelesteClaro"><input name="corral1" type="text" class="boxBusqueda4" id="corral1" onChange="SumaVerticalG('corral')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['corral1']) ? htmlspecialchars($_SESSION['datos_ganadero']['corral1']) : $row_ppg1['corral'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_1 == 1)||($ano_1 == 3))==false){?> disabled <?php }?> name="corralM1" type="text" class="boxBusqueda4" id="corralM1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia1['corral'] == null){ echo ('0');} else{ echo $row_ppgrcia1['corral']; } ?>" ></td>
	<td class="celdaCelesteClaro"><input name="corral2" type="text" class="boxBusqueda4" id="corral2" onChange="SumaVerticalG('corral')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['corral2']) ? htmlspecialchars($_SESSION['datos_ganadero']['corral2']) : $row_ppg2['corral'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_2 == 2)||($ano_2 == 4))==false){?> disabled <?php }?> name="corralM2" type="text" class="boxBusqueda4" id="corralM2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia2['corral'] == null){ echo ('0');} else{ echo $row_ppgrcia2['corral']; } ?>" ></td>
	<td class="celdaCelesteClaro"><input name="corral3" type="text" class="boxBusqueda4" id="corral3" onChange="SumaVerticalG('corral')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['corral3']) ? htmlspecialchars($_SESSION['datos_ganadero']['corral3']) : $row_ppg3['corral'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_3 == 3)||($ano_3 == 5))==false){?> disabled <?php }?> name="corralM3" type="text" class="boxBusqueda4" id="corralM3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia3['corral'] == null){ echo ('0');} else{ echo $row_ppgrcia3['corral']; } ?>" ></td>
	<td class="celdaCelesteClaro"><input name="corral4" type="text" class="boxBusqueda4" id="corral4" onChange="SumaVerticalG('corral')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['corral4']) ? htmlspecialchars($_SESSION['datos_ganadero']['corral4']) : $row_ppg4['corral'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_4 == 4)||($ano_4 == 6))==false){?> disabled <?php }?>  name="corralM4" type="text" class="boxBusqueda4" id="corralM4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia4['corral'] == null){ echo ('0');} else{ echo $row_ppgrcia4['corral']; } ?>" ></td>
	<td class="celdaCelesteClaro"><input name="corral5" type="text" class="boxBusqueda4" id="corral5" onChange="SumaVerticalG('corral')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['corral5']) ? htmlspecialchars($_SESSION['datos_ganadero']['corral5']) : $row_ppg5['corral'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_5 == 5)||($ano_5 == 7))==false){?> disabled <?php }?>  name="corralM5" type="text" class="boxBusqueda4" id="corralM5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia5['corral'] == null){ echo ('0');} else{ echo $row_ppgrcia5['corral']; } ?>" ></td>
	<td class="celdaCelesteClaro"><input name="corralt" type="text" class="boxBusqueda4" id="corralt" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly  value="<?php echo isset($_SESSION['datos_ganadero']['corralt']) ? htmlspecialchars($_SESSION['datos_ganadero']['corralt']) : $row_ppg1['corral']+$row_ppg2['corral']+$row_ppg3['corral']+$row_ppg4['corral']+$row_ppg5['corral'] ?>" ></td>
		<td class="celdaAmarilla"><input name="corralMt" type="text" class="boxBusqueda4" id="corralMt" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="" ></td>
  </tr>

  <tr align="left">
    <td class="celdaCelesteClaro" align="left">Silo Para Forraje (uni)</td>
    <td class="celdaCelesteClaro"><input name="forraje0" type="text" class="boxBusqueda4" id="forraje0" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo isset($_SESSION['datos_ganadero']['forraje0']) ? htmlspecialchars($_SESSION['datos_ganadero']['forraje0']) : $row_ppg0['forraje'] ?>" disabled></td>
    <td class="celdaCelesteClaro" align="left">Silo Para Forraje (uni)</td>
    <td class="celdaCelesteClaro"><input name="forraje1" type="text" class="boxBusqueda4" id="forraje1" onChange="SumaVerticalG('forraje')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['forraje1']) ? htmlspecialchars($_SESSION['datos_ganadero']['forraje1']) : $row_ppg1['forraje'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_1 == 1)||($ano_1 == 3))==false){?> disabled <?php }?> name="forrajeM1" type="text" class="boxBusqueda4" id="forrajeM1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia1['forraje'] == null){ echo ('0');} else{ echo $row_ppgrcia1['forraje']; } ?> " ></td>
	<td class="celdaCelesteClaro"><input name="forraje2" type="text" class="boxBusqueda4" id="forraje2" onChange="SumaVerticalG('forraje')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['forraje2']) ? htmlspecialchars($_SESSION['datos_ganadero']['forraje2']) : $row_ppg2['forraje'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_2 == 2)||($ano_2 == 4))==false){?> disabled <?php }?> name="forrajeM2" type="text" class="boxBusqueda4" id="forrajeM2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia2['forraje'] == null){ echo ('0');} else{ echo $row_ppgrcia2['forraje']; } ?> " ></td>
	<td class="celdaCelesteClaro"><input name="forraje3" type="text" class="boxBusqueda4" id="forraje3" onChange="SumaVerticalG('forraje')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['forraje3']) ? htmlspecialchars($_SESSION['datos_ganadero']['forraje3']) : $row_ppg3['forraje'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_3 == 3)||($ano_3 == 5))==false){?> disabled <?php }?> name="forrajeM3" type="text" class="boxBusqueda4" id="forrajeM3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia3['forraje'] == null){ echo ('0');} else{ echo $row_ppgrcia3['forraje']; } ?> " ></td>
	<td class="celdaCelesteClaro"><input name="forraje4" type="text" class="boxBusqueda4" id="forraje4" onChange="SumaVerticalG('forraje')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['forraje4']) ? htmlspecialchars($_SESSION['datos_ganadero']['forraje4']) : $row_ppg4['forraje'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_4 == 4)||($ano_4 == 6))==false){?> disabled <?php }?>  name="forrajeM4" type="text" class="boxBusqueda4" id="forrajeM4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia4['forraje'] == null){ echo ('0');} else{ echo $row_ppgrcia4['forraje']; } ?> " ></td>
	<td class="celdaCelesteClaro"><input name="forraje5" type="text" class="boxBusqueda4" id="forraje5" onChange="SumaVerticalG('forraje')" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['forraje5']) ? htmlspecialchars($_SESSION['datos_ganadero']['forraje5']) : $row_ppg5['forraje'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_5 == 5)||($ano_5 == 7))==false){?> disabled <?php }?>  name="forrajeM5" type="text" class="boxBusqueda4" id="forrajeM5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia5['forraje'] == null){ echo ('0');} else{ echo $row_ppgrcia5['forraje']; } ?> " ></td>
	<td class="celdaCelesteClaro"><input name="forrajet" type="text" class="boxBusqueda4" id="forrajet" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['forrajet']) ? htmlspecialchars($_SESSION['datos_ganadero']['forrajet']) : $row_ppg1['forraje']+$row_ppg2['forraje']+$row_ppg3['forraje']+$row_ppg4['forraje']+$row_ppg5['forraje'] ?>" disabled></td>
		<td class="celdaAmarilla"><input name="forrajeMt" type="text" class="boxBusqueda4" id="forrajeMt" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="" ></td>
  </tr>



  <tr align="left">
    <td height="25" align="left" class="celdaCelesteClaro">Compra de Ganado en cabezas(opcional)</td>
    <td class="opcion">--</td>
    <td align="left" class="celdaCelesteClaro">Compra de Ganado en cabezas(opcional)</td>
    <td class="celdaCelesteClaro"><input name="compraganado1" type="text" class="boxBusqueda4" id="compraganado1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['compraganado1']) ? htmlspecialchars($_SESSION['datos_ganadero']['compraganado1']) : $row_ppg1['compraganado'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_1 == 1)||($ano_1 == 3))==false){?> disabled <?php }?> name="compraganadoM1" type="text" class="boxBusqueda4" id="compraganadoM1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia1['compraganado'] == null){ echo ('0');} else{ echo $row_ppgrcia1['compraganado']; } ?> "></td>
	<td class="celdaCelesteClaro"><input name="compraganado2" type="text" class="boxBusqueda4" id="compraganado2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['compraganado2']) ? htmlspecialchars($_SESSION['datos_ganadero']['compraganado2']) : $row_ppg2['compraganado'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_2 == 2)||($ano_2 == 4))==false){?> disabled <?php }?> name="compraganadoM2" type="text" class="boxBusqueda4" id="compraganadoM2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia2['compraganado'] == null){ echo ('0');} else{ echo $row_ppgrcia2['compraganado']; } ?> "></td>
	<td class="celdaCelesteClaro"><input name="compraganado3" type="text" class="boxBusqueda4" id="compraganado3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['compraganado3']) ? htmlspecialchars($_SESSION['datos_ganadero']['compraganado3']) : $row_ppg3['compraganado'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_3 == 3)||($ano_3 == 5))==false){?> disabled <?php }?> name="compraganadoM3" type="text" class="boxBusqueda4" id="compraganadoM3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia3['compraganado'] == null){ echo ('0');} else{ echo $row_ppgrcia3['compraganado']; } ?> "></td>
	<td class="celdaCelesteClaro"><input name="compraganado4" type="text" class="boxBusqueda4" id="compraganado4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['compraganado4']) ? htmlspecialchars($_SESSION['datos_ganadero']['compraganado4']) : $row_ppg4['compraganado'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_4 == 4)||($ano_4 == 6))==false){?> disabled <?php }?>  name="compraganadoM4" type="text" class="boxBusqueda4" id="compraganadoM4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia4['compraganado'] == null){ echo ('0');} else{ echo $row_ppgrcia4['compraganado']; } ?> "></td>
	<td class="celdaCelesteClaro"><input name="compraganado5" type="text" class="boxBusqueda4" id="compraganado5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['compraganado5']) ? htmlspecialchars($_SESSION['datos_ganadero']['compraganado5']) : $row_ppg5['compraganado'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_5 == 5)||($ano_5 == 7))==false){?> disabled <?php }?>  name="compraganadoM5" type="text" class="boxBusqueda4" id="compraganadoM5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia5['compraganado'] == null){ echo ('0');} else{ echo $row_ppgrcia5['compraganado']; } ?> "></td>
	<td class="celdaCelesteClaro">--</td>
		<td class="celdaAmarilla">--</td>
  </tr>

  <tr align="left">
    <td class="celdaCelesteClaro" align="left">Cabezas Terneros</td>
    <td class="celdaCelesteClaro"><input name="cantternero0" type="text" class="boxBusqueda4" id="cantternero0" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantternero0']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantternero0']) : $row_ppg0['cantternero'] ?>" disabled></td>
    <td class="celdaCelesteClaro" align="left">Cabezas Terneros</td>
    <td class="celdaCelesteClaro"><input name="cantternero1" type="text" class="boxBusqueda4" id="cantternero1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantternero1']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantternero1']) : $row_ppg1['cantternero']  ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_1 == 1)||($ano_1 == 3))==false){?> disabled <?php }?>  name="cantterneroM1" type="text" class="boxBusqueda4" id="cantterneroM1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia1['cantternero'] == null){ echo ('0');} else{ echo $row_ppgrcia1['cantternero']; } ?> " ></td>
	<td class="celdaCelesteClaro"><input name="cantternero2" type="text" class="boxBusqueda4" id="cantternero2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantternero2']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantternero2']) : $row_ppg2['cantternero']  ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_2 == 2)||($ano_2 == 4))==false){?> disabled <?php }?> name="cantterneroM2" type="text" class="boxBusqueda4" id="cantterneroM2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia2['cantternero'] == null){ echo ('0');} else{ echo $row_ppgrcia2['cantternero']; } ?> " ></td>
	<td class="celdaCelesteClaro"><input name="cantternero3" type="text" class="boxBusqueda4" id="cantternero3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantternero3']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantternero3']) : $row_ppg3['cantternero']  ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_3 == 3)||($ano_3 == 5))==false){?> disabled <?php }?> name="cantterneroM3" type="text" class="boxBusqueda4" id="cantterneroM3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="  <?php  if($row_ppgrcia3['cantternero'] == null){ echo ('0');} else{ echo $row_ppgrcia3['cantternero']; } ?> " ></td>
	<td class="celdaCelesteClaro"><input name="cantternero4" type="text" class="boxBusqueda4" id="cantternero4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantternero4']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantternero4']) : $row_ppg4['cantternero']  ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_4 == 4)||($ano_4 == 6))==false){?> disabled <?php }?>  name="cantterneroM4" type="text" class="boxBusqueda4" id="cantterneroM4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="  <?php  if($row_ppgrcia4['cantternero'] == null){ echo ('0');} else{ echo $row_ppgrcia4['cantternero']; } ?> " ></td>
	<td class="celdaCelesteClaro"><input name="cantternero5" type="text" class="boxBusqueda4" id="cantternero5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantternero5']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantternero5']) : $row_ppg5['cantternero']  ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_5 == 5)||($ano_5 == 7))==false){?> disabled <?php }?> name="cantterneroM5" type="text" class="boxBusqueda4" id="cantterneroM5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="  <?php  if($row_ppgrcia5['cantternero'] == null){ echo ('0');} else{ echo $row_ppgrcia5['cantternero']; } ?> " ></td>
	<td class="celdaCelesteClaro">--</td>
		<td class="celdaAmarilla">--</td>
  </tr>


  <tr align="left">
    <td class="celdaCelesteClaro" align="left">Cabezas de Ganado Mayor</td>
    <td class="celdaCelesteClaro"><input name="cantganado0" type="text" class="boxBusqueda4" id="cantganado0" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantganado0']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantganado0']) : $row_ppg0['cantganado']  ?>" disabled></td>
    <td class="celdaCelesteClaro" align="left">Cabezas de Ganado Mayor</td>
    <td class="celdaCelesteClaro"><input name="cantganado1" type="text" class="boxBusqueda4" id="cantganado1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantganado1']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantganado1']) : $row_ppg1['cantganado'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_1 == 1)||($ano_1 == 3))==false){?> disabled <?php }?> name="cantganadoM1" type="text" class="boxBusqueda4" id="cantganadoM1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="  <?php  if($row_ppgrcia1['cantganado'] == null){ echo ('0');} else{ echo $row_ppgrcia1['cantganado']; } ?>  " ></td>
	<td class="celdaCelesteClaro"><input name="cantganado2" type="text" class="boxBusqueda4" id="cantganado2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantganado2']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantganado2']) : $row_ppg2['cantganado'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_2 == 2)||($ano_2 == 4))==false){?> disabled <?php }?> name="cantganadoM2" type="text" class="boxBusqueda4" id="cantganadoM2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia2['cantganado'] == null){ echo ('0');} else{ echo $row_ppgrcia2['cantganado']; } ?> " ></td>
	<td class="celdaCelesteClaro"><input name="cantganado3" type="text" class="boxBusqueda4" id="cantganado3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantganado3']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantganado3']) : $row_ppg3['cantganado'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_3 == 3)||($ano_3 == 5))==false){?> disabled <?php }?> name="cantganadoM3" type="text" class="boxBusqueda4" id="cantganadoM3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia3['cantganado'] == null){ echo ('0');} else{ echo $row_ppgrcia3['cantganado']; } ?> " ></td>
	<td class="celdaCelesteClaro"><input name="cantganado4" type="text" class="boxBusqueda4" id="cantganado4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantganado4']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantganado4']) : $row_ppg4['cantganado'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_4 == 4)||($ano_4 == 6))==false){?> disabled <?php }?>  name="cantganadoM4" type="text" class="boxBusqueda4" id="cantganadoM4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia4['cantganado'] == null){ echo ('0');} else{ echo $row_ppgrcia4['cantganado']; } ?> " ></td>
	<td class="celdaCelesteClaro"><input name="cantganado5" type="text" class="boxBusqueda4" id="cantganado5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_ganadero']['cantganado5']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantganado5']) : $row_ppg5['cantganado'] ?>"  disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_5 == 5)||($ano_5 == 7))==false){?> disabled <?php }?> name="cantganadoM5" type="text" class="boxBusqueda4" id="cantganadoM5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia5['cantganado'] == null){ echo ('0');} else{ echo $row_ppgrcia5['cantganado']; } ?> " ></td>
	<td class="celdaCelesteClaro">--</td>
		<td class="celdaAmarilla">--</td>
  </tr>

  <tr align="left">
    <td class="celdaCelesteClaro" align="left">Cant de Ganado en pie para la venta</td>
    <td class="celdaCelesteClaro">--</td>
    <td class="celdaCelesteClaro" align="left">Cant de Ganado en pie para la venta</td>
    <td class="celdaCelesteClaro"><input name="cantganadopie1" type="text" class="boxBusqueda4" id="cantganadopie1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantganadopie1']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantganadopie1']) : $row_ppg1['cantganadopie'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_1 == 1)||($ano_1 == 3))==false){?> disabled <?php }?> name="cantganadopieM1" type="text" class="boxBusqueda4" id="cantganadopieM1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia1['cantganadopie'] == null){ echo ('0');} else{ echo $row_ppgrcia1['cantganadopie']; } ?>" ></td>
	<td class="celdaCelesteClaro"><input name="cantganadopie2" type="text" class="boxBusqueda4" id="cantganadopie2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantganadopie2']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantganadopie2']) : $row_ppg2['cantganadopie'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_2 == 2)||($ano_2 == 4))==false){?> disabled <?php }?> name="cantganadopieM2" type="text" class="boxBusqueda4" id="cantganadopieM2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia2['cantganadopie'] == null){ echo ('0');} else{ echo $row_ppgrcia2['cantganadopie']; } ?> " ></td>
	<td class="celdaCelesteClaro"><input name="cantganadopie3" type="text" class="boxBusqueda4" id="cantganadopie3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantganadopie3']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantganadopie3']) : $row_ppg3['cantganadopie'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_3 == 3)||($ano_3 == 5))==false){?> disabled <?php }?> name="cantganadopieM3" type="text" class="boxBusqueda4" id="cantganadopieM3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia3['cantganadopie'] == null){ echo ('0');} else{ echo $row_ppgrcia3['cantganadopie']; } ?> " ></td>
	<td class="celdaCelesteClaro"><input name="cantganadopie4" type="text" class="boxBusqueda4" id="cantganadopie4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantganadopie4']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantganadopie4']) : $row_ppg4['cantganadopie'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_4 == 4)||($ano_4 == 6))==false){?> disabled <?php }?>  name="cantganadopieM4" type="text" class="boxBusqueda4" id="cantganadopieM4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia4['cantganadopie'] == null){ echo ('0');} else{ echo $row_ppgrcia4['cantganadopie']; } ?> " ></td>
	<td class="celdaCelesteClaro"><input name="cantganadopie5" type="text" class="boxBusqueda4" id="cantganadopie5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantganadopie5']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantganadopie5']) : $row_ppg5['cantganadopie'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_5 == 5)||($ano_5 == 7))==false){?> disabled <?php }?> name="cantganadopieM5" type="text" class="boxBusqueda4" id="cantganadopieM5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia5['cantganadopie'] == null){ echo ('0');} else{ echo $row_ppgrcia5['cantganadopie']; } ?>" ></td>
	<td class="celdaCelesteClaro">--</td>
		<td class="celdaAmarilla">--</td>

  </tr>

  <tr align="left">
    <td  align="left" class="celdaCelesteClaro">Cantidad Ganado para Faeneo</td>
    <td class="celdaCelesteClaro">--</td>
    <td  align="left" class="celdaCelesteClaro">Cantidad Ganado para Faeneo</td>
    <td class="celdaCelesteClaro"><input name="cantganadofaineo1" type="text" class="boxBusqueda4" id="cantganadofaineo1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantganadofaineo1']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantganadofaineo1']) : $row_ppg1['cantganadofaineo'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_1 == 1)||($ano_1 == 3))==false){?> disabled <?php }?>  name="cantganadofaineoM1" type="text" class="boxBusqueda4" id="cantganadofaineoM1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia1['cantganadofaineo'] == null){ echo ('0');} else{ echo $row_ppgrcia1['cantganadofaineo']; } ?> " ></td>
	<td class="celdaCelesteClaro"><input name="cantganadofaineo2" type="text" class="boxBusqueda4" id="cantganadofaineo2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantganadofaineo2']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantganadofaineo2']) : $row_ppg2['cantganadofaineo'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_2 == 2)||($ano_2 == 4))==false){?> disabled <?php }?> name="cantganadofaineoM2" type="text" class="boxBusqueda4" id="cantganadofaineoM2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia2['cantganadofaineo'] == null){ echo ('0');} else{ echo $row_ppgrcia2['cantganadofaineo']; } ?> " ></td>
	<td class="celdaCelesteClaro"><input name="cantganadofaineo3" type="text" class="boxBusqueda4" id="cantganadofaineo3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantganadofaineo3']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantganadofaineo3']) : $row_ppg3['cantganadofaineo'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_3 == 3)||($ano_3 == 5))==false){?> disabled <?php }?> name="cantganadofaineoM3" type="text" class="boxBusqueda4" id="cantganadofaineoM3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia3['cantganadofaineo'] == null){ echo ('0');} else{ echo $row_ppgrcia3['cantganadofaineo']; } ?> " ></td>
	<td class="celdaCelesteClaro"><input name="cantganadofaineo4" type="text" class="boxBusqueda4" id="cantganadofaineo4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantganadofaineo4']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantganadofaineo4']) : $row_ppg4['cantganadofaineo'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_4 == 4)||($ano_4 == 6))==false){?> disabled <?php }?>  name="cantganadofaineoM4" type="text" class="boxBusqueda4" id="cantganadofaineoM4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia4['cantganadofaineo'] == null){ echo ('0');} else{ echo $row_ppgrcia4['cantganadofaineo']; } ?>" ></td>
	<td class="celdaCelesteClaro"><input name="cantganadofaineo5" type="text" class="boxBusqueda4" id="cantganadofaineo5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantganadofaineo5']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantganadofaineo5']) : $row_ppg5['cantganadofaineo'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_5 == 5)||($ano_5 == 7))==false){?> disabled <?php }?> name="cantganadofaineoM5" type="text" class="boxBusqueda4" id="cantganadofaineoM5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia5['cantganadofaineo'] == null){ echo ('0');} else{ echo $row_ppgrcia5['cantganadofaineo']; } ?>" ></td>
	<td class="celdaCelesteClaro">--</td>
		<td class="celdaAmarilla">--</td>
  </tr>

  <tr align="left">
    <td class="celdaCelesteClaro" align="left">Produccion de carne</td>
    <td class="celdaCelesteClaro"><input name="cantprodcarne0" type="text" class="boxBusqueda4" id="cantprodcarne0" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantprodcarne0']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantprodcarne0']) : $row_ppg0['cantprodcarne'] ?>" disabled></td>
    <td class="celdaCelesteClaro" align="left">Produccion de carne</td>
    <td class="celdaCelesteClaro"><input name="cantprodcarne1" type="text" class="boxBusqueda4" id="cantprodcarne1" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantprodcarne1']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantprodcarne1']) : $row_ppg1['cantprodcarne'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_1 == 1)||($ano_1 == 3))==false){?> disabled <?php }?> name="cantprodcarneM1" type="text" class="boxBusqueda4" id="cantprodcarneM1" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia1['cantprodcarne'] == null){ echo ('0');} else{ echo $row_ppgrcia1['cantprodcarne']; } ?> " ></td>
	<td class="celdaCelesteClaro"><input name="cantprodcarne2" type="text" class="boxBusqueda4" id="cantprodcarne2" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantprodcarne2']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantprodcarne2']) : $row_ppg2['cantprodcarne'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_2 == 2)||($ano_2 == 4))==false){?> disabled <?php }?> name="cantprodcarneM2" type="text" class="boxBusqueda4" id="cantprodcarneM2" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia2['cantprodcarne'] == null){ echo ('0');} else{ echo $row_ppgrcia2['cantprodcarne']; } ?>" ></td>
	<td class="celdaCelesteClaro"><input name="cantprodcarne3" type="text" class="boxBusqueda4" id="cantprodcarne3" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantprodcarne3']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantprodcarne3']) : $row_ppg3['cantprodcarne'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_3 == 3)||($ano_3 == 5))==false){?> disabled <?php }?> name="cantprodcarneM3" type="text" class="boxBusqueda4" id="cantprodcarneM3" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia3['cantprodcarne'] == null){ echo ('0');} else{ echo $row_ppgrcia3['cantprodcarne']; } ?>" ></td>
	<td class="celdaCelesteClaro"><input name="cantprodcarne4" type="text" class="boxBusqueda4" id="cantprodcarne4" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantprodcarne4']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantprodcarne4']) : $row_ppg4['cantprodcarne'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_4 == 4)||($ano_4 == 6))==false){?> disabled <?php }?>  name="cantprodcarneM4" type="text" class="boxBusqueda4" id="cantprodcarneM4" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia4['cantprodcarne'] == null){ echo ('0');} else{ echo $row_ppgrcia4['cantprodcarne']; } ?>" ></td>
	<td class="celdaCelesteClaro"><input name="cantprodcarne5" type="text" class="boxBusqueda4" id="cantprodcarne5" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_ganadero']['cantprodcarne5']) ? htmlspecialchars($_SESSION['datos_ganadero']['cantprodcarne5']) : $row_ppg5['cantprodcarne'] ?>" disabled></td>
		<td class="celdaAmarilla"><input <?php if ((($ano_5 == 5)||($ano_5 == 7))==false){?> disabled <?php }?> name="cantprodcarneM5" type="text" class="boxBusqueda4" id="cantprodcarneM5" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia5['cantprodcarne'] == null){ echo ('0');} else{ echo $row_ppgrcia5['cantprodcarne']; } ?>" ></td>
	<td class="celdaCelesteClaro">--</td>
		<td class="celdaAmarilla">--</td>
  </tr>

</table>


<table border="0" width="95%" class="taulaA" align="center">
  <tr>
    <td width="11%"><span class="taulaH">5. Observaciones RCIA Ganadero:</span></td>
    <td width="89%" rowspan="2"><textarea name="RGanaderaObservaciones" id="RGanaderaObservaciones" cols="110" rows="4"><?php echo trim($obsganaderarcia['obs']);?></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

<p><br>
  <input id="guardarstepganrcia" class="boton verde formaBoton" type="submit" value="Guardar" name="guardarstepganrcia">
</p>
</form>

</div>
