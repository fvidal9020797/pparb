<?php
//include "page_ganaderaM.php";
//print_r($_SESSION);

include "../reportes/reporte_rcia_evaluacion.php";


if(isset($_REQUEST['Imprimir']))
{


  $idregistror = intval($_REQUEST['reg']);
  $ano = intval($_REQUEST['anoact']);
  $idmonitoreo = intval($_REQUEST['monit']);
 //echo "lecherrooo_año=".$ano." _idreg=".$idregistror." -idmon=".$idmonitoreo;
  Imprimirrciaevaluacion($idregistror,$ano,$idmonitoreo);
}


?>
<div class="texto">

  <form action="tab_agricola.php" method="POST" autocomplete="off" name="form-evalganadrcia2" id="form-evalganadrcia2" enctype="multipart/form-data" >
     <input id="anhoActivo_" type="hidden" value="<?php if(isset($_POST['anhoActivo_']) && ($_POST['anhoActivo_']>0)){echo $_POST['anhoActivo_']; }else{echo "0";} ?> " name="anhoActivo_">
     <input id="anhoActivo2_" type="hidden" value="<?php if(isset($_POST['anhoActivo2_']) ){echo $_POST['anhoActivo2_']; }else{echo "0";} ?> " name="anhoActivo2_">
 </form>


 <form action="evaluacion_agricola_rcia.php" method="POST" autocomplete="off" name="form-evalagricorcia" id="form-evalagricorcia" enctype="multipart/form-data" >
  <input id="idperiodo" type="hidden" value="<?php echo $periodo;?>" name="idperiodo">
  <input id="idtipoPredio" type="hidden" value="<?php echo $row_predio['idtipoprop'];?>" name="idtipoPredio">


  <?php
    if(isset($_POST['anhoActivo_']) && ($_POST['anhoActivo_']>0)){echo " <script> window.location.href='#tabs-3';   </script> ";}

     //echo "aaa AnhoAct1:".$_POST['anhoActivo2_']."-anhoActivo2:".$_POST['anhoActivo_']." -idreg".$_SESSION['idreg']." - 1eranho:".$anho  ;
   // echo "aaaaaxxxxxx".$row_predio['idtipoprop'];
    $idTipoPredio=$row_predio['idtipoprop'];
  ?>

 <table width="90%" border="0" class='taulaA' align="center">


	<tr class="texto_normal">
		<td colspan="2" id='blau'><span class="taulaH">Años de Valoración de Valoración del RCIA</span></td>
	</tr>

	<tr>
		<td colspan="4"><hr></td>
	</tr>

	<tr class="texto_normal">

		<td colspan="2" id='blau9'>

        <table width="100%" border="0">

                <?php
                if ($periodo == 1)
                {
                ?>
                    <tr>
                    <td align="center"  ><button     id="idbtn1" name ="idbtn1" <?php if(isset($_POST['anhoActivo2_']) && ($_POST['anhoActivo2_']=='Año 2014')){echo " style='cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px; ' "; }else{echo "style='color:#000000;  padding: 8px 11px; ' ";} ?> type="button" value="0"  onClick="javascript:cambiarAnho(this);"  >Año 2014</button></td>
                    <td align="center"  ><button      id="idbtn2" name ="idbtn2" <?php if(isset($_POST['anhoActivo2_']) && ($_POST['anhoActivo2_']=='Año 2015')){echo " style='cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;' "; }else{echo "style='color:#000000;  padding: 8px 11px; ' ";} ?> type="button" value="0"  onClick="javascript:cambiarAnho(this);" >Año 2015</button></td>
                    <td align="center"  ><button    id="idbtn3" name ="idbtn3" <?php if(isset($_POST['anhoActivo2_']) && ($_POST['anhoActivo2_']=='Año 2016')){echo " style='cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;' "; }else{echo "style='color:#000000;  padding: 8px 11px;' ";} ?> type="button" value="0"  onClick="javascript:cambiarAnho(this);" >Año 2016</button></td>
                    <td align="center"  ><button    id="idbtn4" name ="idbtn4" <?php if(isset($_POST['anhoActivo2_']) && ($_POST['anhoActivo2_']=='Año 2017')){echo " style='cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;' "; }else{echo "style='color:#000000;  padding: 8px 11px;' ";} ?> type="button" value="0"  onClick="javascript:cambiarAnho(this);" >Año 2017</button></td>
                    <td align="center"  ><button     id="idbtn5" name ="idbtn5" <?php if(isset($_POST['anhoActivo2_']) && ($_POST['anhoActivo2_']=='Año 2018')){echo " style='cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;' "; }else{echo "style='color:#000000;  padding: 8px 11px;' ";} ?> type="button" value="0"  onClick="javascript:cambiarAnho(this);" >Año 2018</button></td>
                    </tr>

                <?php
                }
                elseif ($periodo == 2)
                {
                ?>
                    <tr>
                    <td align="center"   ><button      id="idbtn1_" name="idbtn1_" <?php if(isset($_POST['anhoActivo2_']) && ($_POST['anhoActivo2_']=='Año 2016')){echo " style='cursor:pointer;color:#000000;  background-color: #7fc345; padding: 8px 11px;' "; }else{echo "style='color:#000000;  padding: 8px 11px; ' ";} ?>  onClick="javascript:cambiarAnho(this);" type="button" value="0">Año 2016</button></td>
                    <td align="center"   ><button      id="idbtn2_" name="idbtn2_" <?php if(isset($_POST['anhoActivo2_']) && ($_POST['anhoActivo2_']=='Año 2017')){echo " style='cursor:pointer;color:#000000;  background-color: #7fc345; padding: 8px 11px;' "; }else{echo "style='color:#000000;  padding: 8px 11px; ' ";} ?>  onClick="javascript:cambiarAnho(this);" type="button" value="0">Año 2017</button></td>
                    <td align="center"   ><button     id="idbtn3_" name="idbtn3_" <?php if(isset($_POST['anhoActivo2_']) && ($_POST['anhoActivo2_']=='Año 2018')){echo " style='cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;' "; }else{echo "style='color:#000000;  padding: 8px 11px;' ";} ?>   onClick="javascript:cambiarAnho(this);"  type="button" value="0">Año 2018</button></td>
                    <td align="center"   ><button    id="idbtn4_" name="idbtn4_" <?php if(isset($_POST['anhoActivo2_']) && ($_POST['anhoActivo2_']=='Año 2019')){echo " style='cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;' "; }else{echo "style='color:#000000;  padding: 8px 11px;' ";} ?>  onClick="javascript:cambiarAnho(this);" type="button" value="0">Año 2019</button></td>
                    <td align="center"   ><button     id="idbtn5_" name="idbtn5_"  <?php if(isset($_POST['anhoActivo2_']) && ($_POST['anhoActivo2_']=='Año 2020')){echo " style='cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;' "; }else{echo "style='color:#000000;  padding: 8px 11px;' ";} ?>    onClick="javascript:cambiarAnho(this);" type="button" value="0">Año 2020</button></td>
                    </tr>
                <?php
                } ?>


			</table>
		</td>
	</tr>

	<tr><td colspan="4"><hr></td></tr>

	<tr>
		<td height="14" colspan="4" id='blau'><span class="taulaH">1. Análisis de la Documentación Agricola</span></td>
	</tr>

	<tr><td colspan="4"><hr></td></tr>

	<tr>
		<td height="38" colspan="2">
			<table width="100%" height="63" border="0">
				<tr>
					<td height="17" colspan="2">
						<table width="100%"  height="68" border="0">
								<tr>
									<td align="middle" class="taulaA" id='blau2'>
													 <form action="evaluacion_ganadera_rcia.php" method="POST" autocomplete="off" name="form-add-evalganadrcia" id="form-add-evalganadrcia" enctype="multipart/form-data" >

                                                    <!--  <input name="submit3" type="button" class='cabecera2' value="Agregar Documento" onClick="javascript:onclick_agregarDetalle();" >-->
                                                     <!-- <input id="AddAnalisisdocganarcia" class="boton verde formaBoton" type="submit" value="Guardar" name="AddAnalisisdocganarcia" >-->
													  <input name="submit3" type="button" class='cabecera2' value="Eliminar Documento"  onClick="javascript:deleteRowRciaGral();">
                                                    </form>
									 </td>
								</tr>

								<tr>


									<td width="80%" rowspan="2" >
                                    <?php
                                        //-- empezamos  a sacar los "analisisdocumentacion"
                                        $sql_and="";
                                        if(isset($_POST['anhoActivo_']) && ($_POST['anhoActivo_']>0)){$sql_and= " and anho=".$_POST['anhoActivo_']; $_SESSION['anhoActivo_']=$_POST['anhoActivo_']; }else{$sql_and=" order by anho asc  limit 1" ;$_SESSION['anhoActivo_']=0;  }

                                        $sql_anho="select * from monitoreo.monitoreo m   where  m.tipo=267 and  m.estado = 1 and m.idregistro = ".$_SESSION['idreg'].$sql_and;
                                        $mon_anho= pg_query($cn,$sql_anho);
                                        $row_anho = pg_fetch_assoc($mon_anho);
                                        $anho=0;
                                        $anho=$row_anho["anho"];

                                        $monit = $row_anho["idmonitoreo"];
                                       // echo "consultaañoo=".$monit;

                                        $sql_docEvaluacion = "select *
			                                     from monitoreo.analisisdocumentacion as a inner join monitoreo.monitoreo as m on a.idmonitoreo = m.idmonitoreo inner join monitoreo.documentacion d on d.idDocumentacion=a.idDocumentacion
			                                        where    d.tipodocumento=70 and  m.tipo=267 and  m.idregistro = ".$_SESSION['idreg']." and m.estado=1  and anho=".$anho ;
                                        // echo "CONSULTADETALLE=:".$sql_docEvaluacion;
                                        $ct=0;


                                         $sql_camp="select * from monitoreo.predio_campania     where  estado = 1 and  idmonitoreo = ".$monit." ; ";

                                        $mon_camp= pg_query($cn,$sql_camp);
                                        $row_camp = pg_fetch_assoc($mon_camp);

                                        $campania_res=$row_camp["nrocampania"];

                                        ?>


                                        <table width="95%" id="segui1" border="1" class="taulaA">
    														          <tr  id="tr1" name="tr1" class="cabecera2" align="center">
    															          <td width="2%"></td>
    															          <!--<td width="13%">DOCUMENTACION</td>-->
    															          <td width="30%">DETALLE </td>
    															          <td width="18%">MONTO / CANTIDAD</td>
    															          <td width="35%">OBSERVACIONES</td>
                                                                          <td width="4%"></td>
    														          </tr>
                                                                      <tr class="cabecera2" align="center">
                                                                         <td colspan="4" width="90%">Compra de semilla certificada</td>
                                                                         <td width="4%"><input name="btn1" type="button" class='cabecera2' value="Agregar" onClick="javascript:onclick_agregarDetalle1();" ></td>
                                                                      </tr>
                                                                      <?php
                                                                    $rcia_docEvaluacion = pg_query($cn,$sql_docEvaluacion);
                                                                    while ($row_docEvaluacion = pg_fetch_assoc($rcia_docEvaluacion)  ){
                                                                    $ct++;
                                                                          if($row_docEvaluacion['iddocumentacion']==12){  //--- iddoc= 22 = Compra de semilla certificada
                                                                           ?>
                                                                            <tr><td height="24"><input type="checkbox" name="chk"/></td>
                                                                            <td><textarea  name="txtdetalle1-<?php echo $ct; ?>" id="txtdetalle1-<?php echo $ct; ?>" cols="40" rows="3" style="width: 380px;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
    															            <td><input name="txtmonto_cantidad1-<?php echo $ct; ?>" type="text" style="width:220px;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
    															            <td><textarea  name="txtobs1-<?php echo $ct; ?>" id="txtobs1-<?php echo $ct; ?>" cols="40" rows="3" style="width:450px;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
                                                                            </tr>
                                                                       <?php } } ?>
                                           </table>


                                                <table width="95%" id="segui2" border="1" class="taulaA">
                                                                  <tr id="tr1" name="tr1" class="cabecera2" align="center">
                                                                     <td colspan="4" width="90%">Adquisición de insumos</td>
                                                                     <td width="4%"><input name="btn1" type="button" class='cabecera2' value="Agregar" onClick="javascript:onclick_agregarDetalle2();" ></td>
                                                                  </tr>
                                                                <?php
                                                                $rcia_docEvaluacion = pg_query($cn,$sql_docEvaluacion);
                                                                while ($row_docEvaluacion = pg_fetch_assoc($rcia_docEvaluacion)  ){
                                                                $ct++;
                                                                      if($row_docEvaluacion['iddocumentacion']==13){  //--- iddoc= 13 Adquisición de insumos
                                                                       ?>
                                                                         <tr><td height="24"><input type="checkbox" name="chk"/></td>
                                                                        <td><textarea name="txtdetalle2-<?php echo $ct; ?>" id="txtdetalle2-<?php echo $ct; ?>" cols="40" rows="3" style="width: 380px;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
															            <td><input name="txtmonto_cantidad2-<?php echo $ct; ?>" type="text"  style="width:220px;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
															            <td><textarea  name="txtobs2-<?php echo $ct; ?>" id="txtobs2-<?php echo $ct; ?>" cols="40" rows="3" style="width:450px;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
                                                                        </tr>
                                                                   <?php }} ?>

                                                 </table>


                                                 <table width="95%" id="segui3" border="1" class="taulaA">
                                                                  <tr id="tr1" name="tr1" class="cabecera2" align="center">
                                                                     <td colspan="4" width="90%">Combustibles y lubricantes</td>
                                                                     <td width="4%"><input name="btn1" type="button" class='cabecera2' value="Agregar" onClick="javascript:onclick_agregarDetalle3();" ></td>
                                                                  </tr>
                                                                   <?php
                                                                    $rcia_docEvaluacion = pg_query($cn,$sql_docEvaluacion);
                                                                    while ($row_docEvaluacion = pg_fetch_assoc($rcia_docEvaluacion)  ){
                                                                    $ct++;
                                                                      if($row_docEvaluacion['iddocumentacion']==14){  //--- iddoc= 14 = Combustibles y lubricantes
                                                                       ?>
                                                                        <tr><td height="24"><input type="checkbox" name="chk"/></td>
                                                                        <td><textarea name="txtdetalle3-<?php echo $ct; ?>" id="txtdetalle3-<?php echo $ct; ?>" cols="40" rows="3" style="width: 380px;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
															            <td><input name="txtmonto_cantidad3-<?php echo $ct; ?>" type="text"  style="width:220px;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
															            <td><textarea  name="txtobs3-<?php echo $ct; ?>" id="txtobs3-<?php echo $ct; ?>" cols="40" rows="3" style="width:450px;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
                                                                        </tr>
                                                                   <?php }} ?>


                                                  </table>



                                                 <table width="95%" id="segui4" border="1" class="taulaA">
                                                                  <tr id="tr1" name="tr1" class="cabecera2" align="center">
                                                                     <td colspan="4" width="90%">Compra y/o alquiler de maquinaria</td>
                                                                     <td width="4%"><input name="btn1" type="button" class='cabecera2' value="Agregar" onClick="javascript:onclick_agregarDetalle4();" ></td>
                                                                  </tr>
                                                                    <?php
                                                                    $rcia_docEvaluacion = pg_query($cn,$sql_docEvaluacion);
                                                                    while ($row_docEvaluacion = pg_fetch_assoc($rcia_docEvaluacion)  ){
                                                                    $ct++;
                                                                      if($row_docEvaluacion['iddocumentacion']==15){  //--- iddoc= 15 = Compra y/o alquiler de maquinaria
                                                                       ?>
                                                                      <tr> <td height="24"><input type="checkbox" name="chk"/></td>
                                                                        <td><textarea  name="txtdetalle4-<?php echo $ct; ?>" id="txtdetalle4-<?php echo $ct; ?>" cols="40" rows="3" style="width: 380px;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
															            <td><input name="txtmonto_cantidad4-<?php echo $ct; ?>" type="text"  style="width:220px;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
															            <td><textarea  name="txtobs4-<?php echo $ct; ?>" id="txtobs4-<?php echo $ct; ?>" cols="40" rows="3" style="width:450px;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
                                                                    </tr>
                                                                   <?php }}ss ?>
                                                </table>



                                                <table width="95%" id="segui5" border="1" class="taulaA">
                                                        <tr id="tr1" name="tr1" class="cabecera2" align="center">
                                                            <td colspan="4" width="90%">Maquinaria de Siembra Directa</td>
                                                            <td width="4%"><input name="btn1" type="button" class='cabecera2' value="Agregar" onClick="javascript:onclick_agregarDetalle5();" ></td>
                                                        </tr>
                                                         <?php
                                                            $rcia_docEvaluacion = pg_query($cn,$sql_docEvaluacion);
                                                            while ($row_docEvaluacion = pg_fetch_assoc($rcia_docEvaluacion)  ){
                                                            $ct++;
                                                                      if($row_docEvaluacion['iddocumentacion']==16){  //--- iddoc= 16 = aquinaria de Siembra Directa
                                                                       ?>
                                                                     <tr>  <td height="24"><input type="checkbox" name="chk"/></td>
                                                                        <td><textarea  name="txtdetalle5-<?php echo $ct; ?>" id="txtdetalle5-<?php echo $ct; ?>" cols="40" rows="3" style="width: 380px;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
															            <td><input name="txtmonto_cantidad5-<?php echo $ct; ?>" type="text"  style="width:220px;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
															            <td><textarea  name="txtobs5-<?php echo $ct; ?>" id="txtobs5-<?php echo $ct; ?>" cols="40" rows="3" style="width:450px;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
                                                                    </tr>
                                                                   <?php }  } ?>
                                                  </table>



                                                 <table width="95%" id="segui6" border="1" class="taulaA">
                                                                  <tr id="tr1" name="tr1" class="cabecera2" align="center">
                                                                     <td colspan="4" width="90%">Documento de comercialización</td>
                                                                     <td width="4%"><input name="btn1" type="button" class='cabecera2' value="Agregar" onClick="javascript:onclick_agregarDetalle6();" ></td>
                                                                  </tr>
                                                                 <?php
                                                                $rcia_docEvaluacion = pg_query($cn,$sql_docEvaluacion);
                                                                while ($row_docEvaluacion = pg_fetch_assoc($rcia_docEvaluacion)  ){
                                                                $ct++;
                                                                    if($row_docEvaluacion['iddocumentacion']==17){  //--- iddoc= 17 = Documento de comercialización
                                                                    ?>
                                                                 <tr> <td height="24"><input type="checkbox" name="chk"/></td>
                                                                    <td><textarea  name="txtdetalle6-<?php echo $ct; ?>" id="txtdetalle6-<?php echo $ct; ?>" cols="40" rows="3" style="width: 380px;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
															        <td><input name="txtmonto_cantidad6-<?php echo $ct; ?>" type="text"  style="width:220px;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
															        <td><textarea  name="txtobs6-<?php echo $ct; ?>" id="txtobs6-<?php echo $ct; ?>" cols="40" rows="3" style="width:450px;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
                                                                 </tr>
                                                                <?php } } ?>

                                                </table>


                                                <table width="95%" id="segui7" border="1" class="taulaA">
                                                        <tr id="tr1" name="tr1" class="cabecera2" align="center">
                                                            <td colspan="4" width="90%">Adquisición de insumos ecológicos</td>
                                                            <td width="4%"><input name="btn1" type="button" class='cabecera2' value="Agregar" onClick="javascript:onclick_agregarDetalle7();" ></td>
                                                        </tr>
                                                         <?php
                                                        $rcia_docEvaluacion = pg_query($cn,$sql_docEvaluacion);
                                                        while ($row_docEvaluacion = pg_fetch_assoc($rcia_docEvaluacion)  ){
                                                        $ct++;
                                                            if($row_docEvaluacion['iddocumentacion']==18){  //--- iddoc= 18 =Adquisición de insumos ecológicos
                                                            ?>
                                                          <tr><td height="24"><input type="checkbox" name="chk"/></td>
                                                            <td><textarea  name="txtdetalle7-<?php echo $ct; ?>" id="txtdetalle7-<?php echo $ct; ?>" cols="40" rows="3" style="width: 380px;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
															<td><input name="txtmonto_cantidad7-<?php echo $ct; ?>" type="text"  style="width:220px;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
															<td><textarea  name="txtobs7-<?php echo $ct; ?>" id="txtobs7-<?php echo $ct; ?>" cols="40" rows="3" style="width:450px;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
                                                        </tr>
                                                        <?php } } ?>
                                                </table>



                                                <table width="95%" id="segui9" border="1" class="taulaA">
                                                        <tr id="tr1" name="tr1" class="cabecera2" align="center">
                                                            <td colspan="4" width="90%">Carta aclaratoria</td>
                                                            <td width="4%"><input name="btn1" type="button" class='cabecera2' value="Agregar" onClick="javascript:onclick_agregarDetalle9();" ></td>
                                                        </tr>
                                                         <?php
                                                        $rcia_docEvaluacion = pg_query($cn,$sql_docEvaluacion);
                                                        while ($row_docEvaluacion = pg_fetch_assoc($rcia_docEvaluacion)  ){
                                                        $ct++;
                                                            if($row_docEvaluacion['iddocumentacion']==20){  //--- iddoc= 20= Carta aclaratoria
                                                            ?>
                                                        <tr> <td height="24"><input type="checkbox" name="chk"/></td>
                                                            <td><textarea  name="txtdetalle9-<?php echo $ct; ?>" id="txtdetalle9-<?php echo $ct; ?>" cols="40" rows="3" style="width: 380px;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
															<td><input name="txtmonto_cantidad9-<?php echo $ct; ?>" type="text"  style="width:220px;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
															<td><textarea  name="txtobs9-<?php echo $ct; ?>" id="txtobs9-<?php echo $ct; ?>" cols="40" rows="3" style="width:450px;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
                                                        </tr>
                                                        <?php } } ?>

                                                </table>


                                                <table width="95%" id="segui10" border="1" class="taulaA">
                                                        <tr id="tr1" name="tr1" class="cabecera2" align="center">
                                                            <td colspan="4" width="90%">Memorias fotográficas </td>
                                                            <td width="4%"><input name="btn1" type="button" class='cabecera2' value="Agregar" onClick="javascript:onclick_agregarDetalle10();" ></td>
                                                        </tr>
                                                          <?php
                                                         $rcia_docEvaluacion = pg_query($cn,$sql_docEvaluacion);
                                                         while ($row_docEvaluacion = pg_fetch_assoc($rcia_docEvaluacion)  ){
                                                         $ct++;
                                                            if($row_docEvaluacion['iddocumentacion']==21){  //--- iddoc= 21 =Memorias fotográficas
                                                            ?>
                                                           <tr> <td height="24"><input type="checkbox" name="chk"/></td>
                                                            <td><textarea  name="txtdetalle10-<?php echo $ct; ?>" id="txtdetalle10-<?php echo $ct; ?>" cols="40" rows="3" style="width:380px;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
															<td><input name="txtmonto_cantidad10-<?php echo $ct; ?>" type="text"  style="width:220px;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
															<td><textarea  name="txtobs10-<?php echo $ct; ?>" id="txtobs10-<?php echo $ct; ?>" cols="40" rows="3" style="width: 450px;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
                                                            </tr>
                                                        <?php } } ?>

                                                </table>


                                                <table width="95%" id="segui8" border="1" class="taulaA">
                                                        <tr id="tr1" name="tr1" class="cabecera2" align="center">
                                                            <td colspan="4" width="90%">Otros</td>
                                                            <td width="4%"><input name="btn1" type="button" class='cabecera2' value="Agregar" onClick="javascript:onclick_agregarDetalle8();" ></td>
                                                        </tr>
                                                         <?php
                                                        $rcia_docEvaluacion = pg_query($cn,$sql_docEvaluacion);
                                                        while ($row_docEvaluacion = pg_fetch_assoc($rcia_docEvaluacion)  ){
                                                        $ct++;
                                                            if($row_docEvaluacion['iddocumentacion']==19){  //--- iddoc= 19 = Otros
                                                            ?>
                                                           <tr> <td height="24"><input type="checkbox" name="chk"/></td>
                                                            <td><textarea  name="txtdetalle8-<?php echo $ct; ?>" id="txtdetalle8-<?php echo $ct; ?>" cols="40" rows="3" style="width: 380px;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
                              <td><input name="txtmonto_cantidad8-<?php echo $ct; ?>" type="text"  style="width:220px;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
                              <td><textarea  name="txtobs8-<?php echo $ct; ?>" id="txtobs8-<?php echo $ct; ?>" cols="40" rows="3" style="width:450px;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
                                                            </tr>
                                                        <?php } } ?>
                                                </table>



									</td>
								</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>

	<tr><td colspan="4"><hr></td></tr>

	<tr>
		<td height="14" colspan="4" id='blau'><span class="taulaH">2. Tabla de Valoración Agricola RCIA</span></td>
	</tr>

	<tr><td colspan="4"><td></td></tr>



	<tr align="center">
		<td>




			<style type="text/css">
				table.tableizer-table {
					font-size: 12px;
					border: 1px solid #1e1c1c;
					font-family: Arial, Helvetica, sans-serif;
				}
				.tableizer-table td {

					padding: 4px;
					margin: 3px;
					border: 1px solid #1e1c1c;
				}
				.tableizer-table th {
					background-color: #032c02;
					color: #FFF;
					font-weight: bold;
				}
                .fondo1{
                    background-color: #ffffff;
                    color: #000000;
                }
			</style>

      <?php
            $sql_and="";

                if(isset($_POST['anhoActivo_']) && ($_POST['anhoActivo_']>0)){
                    $sql_and= " and anho=".$_POST['anhoActivo_'];
                   // $_SESSION['anhoActivo_']=$_POST['anhoActivo_'];
                }else{
                    $sql_and=" order by anho asc  limit 1" ;//$_SESSION['anhoActivo_']=0;
                 }

                $sql_anho="select * from monitoreo.monitoreo m   where  m.tipo=266 and  m.estado = 1 and  m.idregistro = ".$_SESSION['idreg'].$sql_and;
                $mon_anho= pg_query($cn,$sql_anho);
                $row_anho = pg_fetch_assoc($mon_anho);
                $anho=0;
                $anho=$row_anho["anho"];



                //**************************************************************************//
                //*************************************************************************//
                //    CULTIVOS PONDERACION VERANO COMPROMETIDOS







                //-- CULTIVOS COMPROMETIDOS     VERANOOOOO
                /*$sql_cultivos = "select c.idcultivo,c.nombrecultivo
			    from monitoreo.monitoreo m inner join monitoreo.plancultivo p on p.idmonitoreo=m.idmonitoreo inner join cultivo c on c.idcultivo=p.idcultivo
                where m.tipo=266 and m.estado = 1 and p.estado = 1 and p.comprometido=0 and m.idregistro  = ".$_SESSION['idreg']."  and m.anho=".$anho." order by c.nombrecultivo asc" ;
                */

                 $sql_cultivosVerano = "select c.idcultivo,c.nombrecultivo ,p.supveranoejecutado,p.supinviernoejecutado
			    from monitoreo.monitoreo m inner join monitoreo.plancultivo p on p.idmonitoreo=m.idmonitoreo inner join cultivo c on c.idcultivo=p.idcultivo
                where  supveranoejecutado>0  and   m.tipo=266 and m.estado = 1 and p.estado = 1 and p.comprometido=0 and m.idregistro  = ".$_SESSION['idreg']."  and m.anho=".$anho." order by c.nombrecultivo asc" ;

                $sql_cultivosVeranoCC  = " select * from plancultivo p
                inner join cultivo c on c.idcultivo=p.idcultivo and p.supverano>0
                and p.idregistro =".$_SESSION['idreg']."  and    anocultivo=".$anho."  order by c.nombrecultivo asc ;  " ;




               // echo "aaaabbb=".$idTipoPredio;
                //   echo "conx no comp=".$sql_cultivosVerano;
              //------------------------------ES PEQUEÑO O COMUNIDAD----------------------------------------
              //--------------------------------------------------------------------------------------------
               if($idTipoPredio==37 || $idTipoPredio==38  ){
                //   echo "--entroaquiii--";
                        $totalRows_cultivosVerano=0;
			$rcia_cultivos1 = pg_query($cn,$sql_cultivosVerano);
                        $totalRows_cultivosVerano= pg_num_rows($rcia_cultivos1);
                        $rcia_cultivos2 = pg_query($cn,$sql_cultivosVerano);
                        $rcia_cultivos2C = pg_query($cn,$sql_cultivosVerano);
                        $rcia_cultivos2C1 = pg_query($cn,$sql_cultivosVerano);
                        $rcia_cultivos2C2 = pg_query($cn,$sql_cultivosVerano);
                        $rcia_cultivos2C3 = pg_query($cn,$sql_cultivosVerano);
                        $rcia_cultivos2C4 = pg_query($cn,$sql_cultivosVerano);

                        $cultivos1 = pg_query($cn,$sql_cultivosVerano);
                        $cultivos2 = pg_query($cn,$sql_cultivosVerano);
                        $cultivos3 = pg_query($cn,$sql_cultivosVerano);
                        $cultivos4 = pg_query($cn,$sql_cultivosVerano);
                        $cultivos5 = pg_query($cn,$sql_cultivosVerano);
                        $cultivos6 = pg_query($cn,$sql_cultivosVerano);
                        $cultivos7 = pg_query($cn,$sql_cultivosVerano);
                        $cultivostotal = pg_query($cn,$sql_cultivosVerano);

                        $cultivos1_pon = pg_query($cn,$sql_cultivosVerano);

                          $cultivos1CC = pg_query($cn,$sql_cultivosVeranoCC);

                      ///--- FIN SACAR CULTIVOS COMPROMETIDOS


                         //-- CULTIVOS NO COMPROMETIDOS
                        $sql_cultivos_noVerano = "select c.idcultivo,c.nombrecultivo,p.supveranoejecutado,p.supinviernoejecutado
                                    from monitoreo.monitoreo m inner join monitoreo.plancultivo p on p.idmonitoreo=m.idmonitoreo inner join cultivo c on c.idcultivo=p.idcultivo
                        where supveranoejecutado>0  and  m.tipo=266  and ( p.supveranoejecutado>0 or p.supinviernoejecutado>0 ) and m.estado = 1 and p.estado = 1 and p.comprometido=1 and    m.idregistro  = ".$_SESSION['idreg']."  and m.anho=".$anho." order by c.nombrecultivo asc" ;
                      // echo "cccss=".$sql_cultivos_noVerano;





                        $totalRows_cultivos_noVerano=0;
                      //  echo ",cant=".$totalRows_cultivos_noVerano;
                        $rcia_cultivos1_no = pg_query($cn,$sql_cultivos_noVerano);
                        $totalRows_cultivos_noVerano= pg_num_rows($rcia_cultivos1_no);
                        $rcia_cultivos2_no = pg_query($cn,$sql_cultivos_noVerano);
                        $rcia_cultivos2_noC = pg_query($cn,$sql_cultivos_noVerano);
                        $rcia_cultivos2_noC1 = pg_query($cn,$sql_cultivos_noVerano);
                        $rcia_cultivos2_noC2 = pg_query($cn,$sql_cultivos_noVerano);
                        $rcia_cultivos2_noC3 = pg_query($cn,$sql_cultivos_noVerano);
                        $rcia_cultivos2_noC4 = pg_query($cn,$sql_cultivos_noVerano);

                        $cultivos1_no = pg_query($cn,$sql_cultivos_noVerano);
                        $cultivos2_no = pg_query($cn,$sql_cultivos_noVerano);
                        $cultivos3_no = pg_query($cn,$sql_cultivos_noVerano);
                       $cultivos4_no = pg_query($cn,$sql_cultivos_noVerano);
                        $cultivos5_no = pg_query($cn,$sql_cultivos_noVerano);
                        $cultivos6_no = pg_query($cn,$sql_cultivos_noVerano);
                        $cultivos7_no = pg_query($cn,$sql_cultivos_noVerano);
                        $cultivosTotal_no = pg_query($cn,$sql_cultivos_noVerano);
                         $cultivos1_no_pond = pg_query($cn,$sql_cultivos_noVerano);
                        $cultivos1_no_Super = pg_query($cn,$sql_cultivos_noVerano);

                      ///--- FIN SACAR CULTIVOS NO COMPROMETIDOS




                       ///---------COMPROMETIDOS INVIERNOOOO---------------
                        $sql_cultivosInvierno = "select c.idcultivo,c.nombrecultivo,p.supveranoejecutado,p.supinviernoejecutado
                        from monitoreo.monitoreo m inner join monitoreo.plancultivo p on p.idmonitoreo=m.idmonitoreo inner join cultivo c on c.idcultivo=p.idcultivo
                        where  supinviernoejecutado>0  and   m.tipo=266 and m.estado = 1 and p.estado = 1 and p.comprometido=0 and m.idregistro  = ".$_SESSION['idreg']."  and m.anho=".$anho." order by c.nombrecultivo asc" ;

                      // echo "conx no invvvvv=".$sql_cultivosInvierno;

                          $sql_cultivosVeranoCC_NO  = " select * from plancultivo p
                        inner join cultivo c on c.idcultivo=p.idcultivo and p.supinvierno>0
                        and p.idregistro =".$_SESSION['idreg']."  and    anocultivo=".$anho."  order by c.nombrecultivo asc ;  " ;

                 // echo "con invvvvv=".$sql_cultivosVeranoCC_NO;


                        $totalRows_cultivosInvierno=0;
                        $rcia_cultivos1_inv = pg_query($cn,$sql_cultivosInvierno);
                        $rcia_cultivos1_invC = pg_query($cn,$sql_cultivosInvierno);
                        $rcia_cultivos1_invC1 = pg_query($cn,$sql_cultivosInvierno);
                        $rcia_cultivos1_invC2 = pg_query($cn,$sql_cultivosInvierno);
                        $rcia_cultivos1_invC3 = pg_query($cn,$sql_cultivosInvierno);
                        $rcia_cultivos1_invC4 = pg_query($cn,$sql_cultivosInvierno);

                        $totalRows_cultivosInvierno= pg_num_rows($rcia_cultivos1_inv);
                        $rcia_cultivos2_inv = pg_query($cn,$sql_cultivosInvierno);


                        $cultivos1_inv = pg_query($cn,$sql_cultivosInvierno);
                       // $cultivos2_inv = pg_query($cn,$sql_cultivosInvierno);
                       // $cultivos3_inv = pg_query($cn,$sql_cultivosInvierno);
                       // $cultivos4_inv = pg_query($cn,$sql_cultivosInvierno);
                        $cultivos5_inv = pg_query($cn,$sql_cultivosInvierno);
                        $cultivos6_inv = pg_query($cn,$sql_cultivosInvierno);
                        $cultivos7_inv = pg_query($cn,$sql_cultivosInvierno);
                        $cultivosTotal_inv = pg_query($cn,$sql_cultivosInvierno);

                         $cultivos1_inv_pon = pg_query($cn,$sql_cultivosInvierno);

                      ///--- FIN SACAR CULTIVOS COMPROMETIDOS  INVIERNOOOO-----------






                          //-- CULTIVOS NO COMPROMETIDOS INVIERNOOOOO
                        $sql_cultivos_noInv = "select c.idcultivo,c.nombrecultivo  ,p.supveranoejecutado,p.supinviernoejecutado
                                    from monitoreo.monitoreo m inner join monitoreo.plancultivo p on p.idmonitoreo=m.idmonitoreo inner join cultivo c on c.idcultivo=p.idcultivo
                        where supinviernoejecutado>0  and  m.tipo=266  and ( p.supveranoejecutado>0 or p.supinviernoejecutado>0 ) and m.estado = 1 and p.estado = 1 and p.comprometido=1 and    m.idregistro  = ".$_SESSION['idreg']."  and m.anho=".$anho." order by c.nombrecultivo asc" ;
                      //echo "cccscxxs=".$sql_cultivos_noInv;


                        $totalRows_cultivos_noInv=0;
                      //  echo ",cant=".$totalRows_cultivos_noVerano;
                        $rcia_cultivos1_noInv = pg_query($cn,$sql_cultivos_noInv);
                        $totalRows_cultivos_noInv= pg_num_rows($rcia_cultivos1_noInv);
                        $rcia_cultivos2_noInv = pg_query($cn,$sql_cultivos_noInv);
                        $rcia_cultivos2_noInvC = pg_query($cn,$sql_cultivos_noInv);
                        $rcia_cultivos2_noInvC1 = pg_query($cn,$sql_cultivos_noInv);
                        $rcia_cultivos2_noInvC2 = pg_query($cn,$sql_cultivos_noInv);
                        $rcia_cultivos2_noInvC3 = pg_query($cn,$sql_cultivos_noInv);
                        $rcia_cultivos2_noInvC4 = pg_query($cn,$sql_cultivos_noInv);

                        $cultivos1_noInv = pg_query($cn,$sql_cultivos_noInv);
                        $cultivos2_noInv = pg_query($cn,$sql_cultivos_noInv);
                        $cultivos3_noInv = pg_query($cn,$sql_cultivos_noInv);
                        $cultivos4_noInv = pg_query($cn,$sql_cultivos_noInv);
                        $cultivos5_noInv = pg_query($cn,$sql_cultivos_noInv);
                        $cultivos6_noInv = pg_query($cn,$sql_cultivos_noInv);
                        $cultivos7_noInv = pg_query($cn,$sql_cultivos_noInv);
                        $cultivosTotal_noInv = pg_query($cn,$sql_cultivos_noInv);
                        $cultivos1_noInv_pon = pg_query($cn,$sql_cultivos_noInv);

                      ///--- FIN SACAR CULTIVOS NO COMPROMETIDOS INVIERNOOOOO






                      //-- SACANDO PONDERACIONES DE TABLA VALORACION DE ALIMENTOS
                       $sql_detEvaluacion = "select *
                                    from monitoreo.valoracionalimentos va inner join   monitoreo.monitoreo  m on  va.idmonitoreo = m.idmonitoreo
                                    where  va.tipo=70 and m.tipo=267 and  m.idregistro = ".$_SESSION['idreg']." and m.anho=".$anho." order by va.idtablavaloracion asc" ;
                                    $rcia_detEvaluacion = pg_query($cn,$sql_detEvaluacion);
                      //  echo "con=".$sql_detEvaluacion;

                        //-- PARA SACAR el iddetallevaloracion de  valoracion de alimentos q esta a lapar
                        //.-1
                        if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ $cultivoPtos1=$row_detallePtos["puntuacion"]; $idtablaval=$row_detallePtos["idtablavaloracion"]; }else{$cultivoPtos1="";$idtablaval1=0;}
                       // if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ $cultivoPtos2=$row_detallePtos["puntuacion"]; $idtablava2=$row_detallePtos["idtablavaloracion"]; }else{$cultivoPtos2="";$idtablaval2=0;}
                       // if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ $cultivoPtos3=$row_detallePtos["puntuacion"]; $idtablava3=$row_detallePtos["idtablavaloracion"]; }else{$cultivoPtos3="";$idtablaval3=0;}
                       // if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ $cultivoPtos4=$row_detallePtos["puntuacion"]; $idtablava4=$row_detallePtos["idtablavaloracion"]; }else{$cultivoPtos4="";$idtablaval4=0;}
                        if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ $cultivoPtos5=$row_detallePtos["puntuacion"]; $idtablava5=$row_detallePtos["idtablavaloracion"]; }else{$cultivoPtos5="";$idtablaval5=0;}
                        if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ $cultivoPtos6=$row_detallePtos["puntuacion"]; $idtablava6=$row_detallePtos["idtablavaloracion"]; }else{$cultivoPtos6="";$idtablaval6=0;}
                        if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ $cultivoPtos7=$row_detallePtos["puntuacion"]; $idtablava7=$row_detallePtos["idtablavaloracion"]; }else{$cultivoPtos7="";$idtablaval7=0;}



               }else{
                    //------------------------------MEDIANA Y EMPRESARIAL----------------------------------------
                    //--------------------------------------------------------------------------------------------

                         $totalRows_cultivosVerano=0;
			$rcia_cultivos1 = pg_query($cn,$sql_cultivosVerano);
                        $totalRows_cultivosVerano= pg_num_rows($rcia_cultivos1);
                        $rcia_cultivos2 = pg_query($cn,$sql_cultivosVerano);
                        $rcia_cultivos2C = pg_query($cn,$sql_cultivosVerano);
                        $rcia_cultivos2C1 = pg_query($cn,$sql_cultivosVerano);
                        $rcia_cultivos2C2 = pg_query($cn,$sql_cultivosVerano);
                        $rcia_cultivos2C3 = pg_query($cn,$sql_cultivosVerano);
                        $rcia_cultivos2C4 = pg_query($cn,$sql_cultivosVerano);

                        $cultivos1 = pg_query($cn,$sql_cultivosVerano);
                        $cultivos2 = pg_query($cn,$sql_cultivosVerano);
                        $cultivos3 = pg_query($cn,$sql_cultivosVerano);
                        $cultivos4 = pg_query($cn,$sql_cultivosVerano);
                        $cultivos5 = pg_query($cn,$sql_cultivosVerano);
                        $cultivos6 = pg_query($cn,$sql_cultivosVerano);
                        $cultivos7 = pg_query($cn,$sql_cultivosVerano);
                        $cultivostotal = pg_query($cn,$sql_cultivosVerano);

                        $cultivos1_pon = pg_query($cn,$sql_cultivosVerano);

                          $cultivos1CC = pg_query($cn,$sql_cultivosVeranoCC);

                      ///--- FIN SACAR CULTIVOS COMPROMETIDOS


                         //-- CULTIVOS NO COMPROMETIDOS
                        $sql_cultivos_noVerano = "select c.idcultivo,c.nombrecultivo,p.supveranoejecutado,p.supinviernoejecutado
                                    from monitoreo.monitoreo m inner join monitoreo.plancultivo p on p.idmonitoreo=m.idmonitoreo inner join cultivo c on c.idcultivo=p.idcultivo
                        where supveranoejecutado>0  and  m.tipo=266  and ( p.supveranoejecutado>0 or p.supinviernoejecutado>0 ) and m.estado = 1 and p.estado = 1 and p.comprometido=1 and    m.idregistro  = ".$_SESSION['idreg']."  and m.anho=".$anho." order by c.nombrecultivo asc" ;
                      // echo "cccss=".$sql_cultivos_noVerano;





                        $totalRows_cultivos_noVerano=0;
                      //  echo ",cant=".$totalRows_cultivos_noVerano;
                        $rcia_cultivos1_no = pg_query($cn,$sql_cultivos_noVerano);
                        $totalRows_cultivos_noVerano= pg_num_rows($rcia_cultivos1_no);
                        $rcia_cultivos2_no = pg_query($cn,$sql_cultivos_noVerano);
                        $rcia_cultivos2_noC = pg_query($cn,$sql_cultivos_noVerano);
                        $rcia_cultivos2_noC1 = pg_query($cn,$sql_cultivos_noVerano);
                        $rcia_cultivos2_noC2 = pg_query($cn,$sql_cultivos_noVerano);
                        $rcia_cultivos2_noC3 = pg_query($cn,$sql_cultivos_noVerano);
                        $rcia_cultivos2_noC4 = pg_query($cn,$sql_cultivos_noVerano);

                        $cultivos1_no = pg_query($cn,$sql_cultivos_noVerano);
                        $cultivos2_no = pg_query($cn,$sql_cultivos_noVerano);
                        $cultivos3_no = pg_query($cn,$sql_cultivos_noVerano);
                        $cultivos4_no = pg_query($cn,$sql_cultivos_noVerano);
                        $cultivos5_no = pg_query($cn,$sql_cultivos_noVerano);
                        $cultivos6_no = pg_query($cn,$sql_cultivos_noVerano);
                        $cultivos7_no = pg_query($cn,$sql_cultivos_noVerano);
                        $cultivosTotal_no = pg_query($cn,$sql_cultivos_noVerano);
                         $cultivos1_no_pond = pg_query($cn,$sql_cultivos_noVerano);
                        $cultivos1_no_Super = pg_query($cn,$sql_cultivos_noVerano);

                      ///--- FIN SACAR CULTIVOS NO COMPROMETIDOS




                       ///---------COMPROMETIDOS INVIERNOOOO---------------
                        $sql_cultivosInvierno = "select c.idcultivo,c.nombrecultivo,p.supveranoejecutado,p.supinviernoejecutado
                        from monitoreo.monitoreo m inner join monitoreo.plancultivo p on p.idmonitoreo=m.idmonitoreo inner join cultivo c on c.idcultivo=p.idcultivo
                        where  supinviernoejecutado>0  and   m.tipo=266 and m.estado = 1 and p.estado = 1 and p.comprometido=0 and m.idregistro  = ".$_SESSION['idreg']."  and m.anho=".$anho." order by c.nombrecultivo asc" ;

                      // echo "conx no invvvvv=".$sql_cultivosInvierno;

                          $sql_cultivosVeranoCC_NO  = " select * from plancultivo p
                        inner join cultivo c on c.idcultivo=p.idcultivo and p.supinvierno>0
                        and p.idregistro =".$_SESSION['idreg']."  and    anocultivo=".$anho."  order by c.nombrecultivo asc ;  " ;

                 // echo "con invvvvv=".$sql_cultivosVeranoCC_NO;


                        $totalRows_cultivosInvierno=0;
                        $rcia_cultivos1_inv = pg_query($cn,$sql_cultivosInvierno);
                        $rcia_cultivos1_invC = pg_query($cn,$sql_cultivosInvierno);
                        $rcia_cultivos1_invC1 = pg_query($cn,$sql_cultivosInvierno);
                        $rcia_cultivos1_invC2 = pg_query($cn,$sql_cultivosInvierno);
                        $rcia_cultivos1_invC3 = pg_query($cn,$sql_cultivosInvierno);
                        $rcia_cultivos1_invC4 = pg_query($cn,$sql_cultivosInvierno);

                        $totalRows_cultivosInvierno= pg_num_rows($rcia_cultivos1_inv);
                        $rcia_cultivos2_inv = pg_query($cn,$sql_cultivosInvierno);


                        $cultivos1_inv = pg_query($cn,$sql_cultivosInvierno);
                        $cultivos2_inv = pg_query($cn,$sql_cultivosInvierno);
                        $cultivos3_inv = pg_query($cn,$sql_cultivosInvierno);
                        $cultivos4_inv = pg_query($cn,$sql_cultivosInvierno);
                        $cultivos5_inv = pg_query($cn,$sql_cultivosInvierno);
                        $cultivos6_inv = pg_query($cn,$sql_cultivosInvierno);
                        $cultivos7_inv = pg_query($cn,$sql_cultivosInvierno);
                        $cultivosTotal_inv = pg_query($cn,$sql_cultivosInvierno);

                         $cultivos1_inv_pon = pg_query($cn,$sql_cultivosInvierno);

                      ///--- FIN SACAR CULTIVOS COMPROMETIDOS  INVIERNOOOO-----------






                          //-- CULTIVOS NO COMPROMETIDOS INVIERNOOOOO
                        $sql_cultivos_noInv = "select c.idcultivo,c.nombrecultivo  ,p.supveranoejecutado,p.supinviernoejecutado
                                    from monitoreo.monitoreo m inner join monitoreo.plancultivo p on p.idmonitoreo=m.idmonitoreo inner join cultivo c on c.idcultivo=p.idcultivo
                        where supinviernoejecutado>0  and  m.tipo=266  and ( p.supveranoejecutado>0 or p.supinviernoejecutado>0 ) and m.estado = 1 and p.estado = 1 and p.comprometido=1 and    m.idregistro  = ".$_SESSION['idreg']."  and m.anho=".$anho." order by c.nombrecultivo asc" ;
                      //echo "cccscxxs=".$sql_cultivos_noInv;


                        $totalRows_cultivos_noInv=0;
                      //  echo ",cant=".$totalRows_cultivos_noVerano;
                        $rcia_cultivos1_noInv = pg_query($cn,$sql_cultivos_noInv);
                        $totalRows_cultivos_noInv= pg_num_rows($rcia_cultivos1_noInv);
                        $rcia_cultivos2_noInv = pg_query($cn,$sql_cultivos_noInv);
                        $rcia_cultivos2_noInvC = pg_query($cn,$sql_cultivos_noInv);
                        $rcia_cultivos2_noInvC1 = pg_query($cn,$sql_cultivos_noInv);
                        $rcia_cultivos2_noInvC2 = pg_query($cn,$sql_cultivos_noInv);
                        $rcia_cultivos2_noInvC3 = pg_query($cn,$sql_cultivos_noInv);
                        $rcia_cultivos2_noInvC4 = pg_query($cn,$sql_cultivos_noInv);

                        $cultivos1_noInv = pg_query($cn,$sql_cultivos_noInv);
                        $cultivos2_noInv = pg_query($cn,$sql_cultivos_noInv);
                        $cultivos3_noInv = pg_query($cn,$sql_cultivos_noInv);
                        $cultivos4_noInv = pg_query($cn,$sql_cultivos_noInv);
                        $cultivos5_noInv = pg_query($cn,$sql_cultivos_noInv);
                        $cultivos6_noInv = pg_query($cn,$sql_cultivos_noInv);
                        $cultivos7_noInv = pg_query($cn,$sql_cultivos_noInv);
                        $cultivosTotal_noInv = pg_query($cn,$sql_cultivos_noInv);
                        $cultivos1_noInv_pon = pg_query($cn,$sql_cultivos_noInv);

                      ///--- FIN SACAR CULTIVOS NO COMPROMETIDOS INVIERNOOOOO






                      //-- SACANDO PONDERACIONES DE TABLA VALORACION DE ALIMENTOS
                       $sql_detEvaluacion = "select *
                                    from monitoreo.valoracionalimentos va inner join   monitoreo.monitoreo  m on  va.idmonitoreo = m.idmonitoreo
                                    where  va.tipo=70 and m.tipo=267 and  m.idregistro = ".$_SESSION['idreg']." and m.anho=".$anho." order by va.idtablavaloracion asc" ;
                                    $rcia_detEvaluacion = pg_query($cn,$sql_detEvaluacion);
                         //echo "conassss=".$sql_detEvaluacion;

                        //-- PARA SACAR el iddetallevaloracion de  valoracion de alimentos q esta a lapar
                        //.-1
                        if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ $cultivoPtos1=$row_detallePtos["puntuacion"]; $idtablava1=$row_detallePtos["idtablavaloracion"]; }else{$cultivoPtos1="";$idtablaval1=0;}
                        if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ $cultivoPtos2=$row_detallePtos["puntuacion"]; $idtablava2=$row_detallePtos["idtablavaloracion"]; }else{$cultivoPtos2="";$idtablaval2=0;}
                        if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ $cultivoPtos3=$row_detallePtos["puntuacion"]; $idtablava3=$row_detallePtos["idtablavaloracion"]; }else{$cultivoPtos3="";$idtablaval3=0;}
                        if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ $cultivoPtos4=$row_detallePtos["puntuacion"]; $idtablava4=$row_detallePtos["idtablavaloracion"]; }else{$cultivoPtos4="";$idtablaval4=0;}
                        if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ $cultivoPtos5=$row_detallePtos["puntuacion"]; $idtablava5=$row_detallePtos["idtablavaloracion"]; }else{$cultivoPtos5="";$idtablaval5=0;}
                        if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ $cultivoPtos6=$row_detallePtos["puntuacion"]; $idtablava6=$row_detallePtos["idtablavaloracion"]; }else{$cultivoPtos6="";$idtablaval6=0;}
                        if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ $cultivoPtos7=$row_detallePtos["puntuacion"]; $idtablava7=$row_detallePtos["idtablavaloracion"]; }else{$cultivoPtos7="";$idtablaval7=0;}


               }

                //-- para consultar el valor de los cultivos dimanicamente
                //$sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorli = ".$idtablaval." and d.idcultivo = ".;
                //$res_cultivo1= pg_query($cn,$sql_cultivo1);


                //echo " TIPO DE PREDIO 37  es pequeña  38 comunidad==".$idTipoPredio;
        ?>



     <?php
     // echo "ANTES=".$idTipoPredio;
        if($idTipoPredio==37 ||$idTipoPredio==38 ){ ///-------------------------PEQUEÑO Y COMUNIDAD--------------------
        //  echo "entroooooooo=".$idTipoPredio;
         //  echo "conassss=".$sql_detEvaluacion;
 //***************************************************************************************************************
 //***************************************************************************************************************
       ?>

      <table class="tableizer-table">


      <thead>

            <tr class="tableizer-firstrow">
                <th style="background:#fff; " ></th>
               <th   style="background:#fff; " rowspan="2"> </th>
               <th    rowspan="2">Sup. Compromiso Agricola</th>
               <?php
                if($totalRows_cultivosVerano>0 ||  $totalRows_cultivos_noVerano>0){
                   echo "<th colspan ='";  echo ($totalRows_cultivosVerano+$totalRows_cultivos_noVerano) ; echo "' >VERANO</th>";
                }
               ?>

               <?php
                if($totalRows_cultivosInvierno>0 ||  $totalRows_cultivos_noInv>0){
                   echo "<th colspan ='";  echo ($totalRows_cultivosInvierno+$totalRows_cultivos_noInv) ; echo "' >INVIERNO</th>";
                }
               ?>


          </tr>
        <tr class="tableizer-firstrow">
            <th   style="background:#fff; ">  </th>

              <?php //echo "total cult=".$totalRows_cultivos;
                if($totalRows_cultivosVerano>0){
                 //   echo "<th rowspan ='2'> CULTIVOS COMPROMETIDOS</th>";
                   echo "<th colspan ='";  echo $totalRows_cultivosVerano ; echo "' >CULTIVOS COMPROMETIDOS</th>";
                }
               ?>

                 <?php //echo "total cult=".$totalRows_cultivos;
                if($totalRows_cultivos_noVerano>0){
                 //   echo "<th rowspan ='2'>CULTIVOS NO COMPROMETIDOS</th>";
                   echo "<th colspan ='";  echo $totalRows_cultivos_noVerano ; echo "' >CULTIVOS NO COMPROMETIDOS</th>";
                }
               ?>


               <?php //echo "total cult=".$totalRows_cultivos;
                if($totalRows_cultivosInvierno>0){
                 //   echo "<th rowspan ='2'> CULTIVOS COMPROMETIDOS</th>";
                   echo "<th colspan ='";  echo $totalRows_cultivosInvierno ; echo "' >CULTIVOS COMPROMETIDOS</th>";
                }
               ?>

             <?php //echo "total cult=".$totalRows_cultivos;
                if($totalRows_cultivos_noInv>0){
                 //   echo "<th rowspan ='2'>CULTIVOS NO COMPROMETIDOS</th>";
                   echo "<th colspan ='";  echo $totalRows_cultivos_noInv ; echo "' >CULTIVOS NO COMPROMETIDOS</th>";
                }
               ?>
        </tr>

        <tr >
          <th   style="background:#fff; " > </th>
          <th  style="background:#fff; " > </th>
          <th id='suptotalc' name='suptotalc'  style="background:#75AF73; "><?php echo isset($_SESSION['datos_ganadero']['SupActAgri']) ? htmlspecialchars($_SESSION['datos_ganadero']['SupActAgri']) : $row_supali['supagricola'] ?></th>
          <?php

                while ( $row_cultivos2=pg_fetch_assoc($rcia_cultivos2C)){

                 echo " <th> "; echo $row_cultivos2["nombrecultivo"] ; echo " </th> ";
                } ?>

          <?php

                while ( $row_cultivos2_no=pg_fetch_assoc($rcia_cultivos2_noC)){

                 echo " <th> "; echo $row_cultivos2_no["nombrecultivo"] ; echo " </th> ";
                } ?>

           <?php

                while ( $row_cultivos1_inv=pg_fetch_assoc($rcia_cultivos1_invC)){

                 echo " <th> "; echo $row_cultivos1_inv["nombrecultivo"] ; echo " </th> ";

                } ?>

           <?php

                while ( $row_cultivos2_noINv=pg_fetch_assoc($rcia_cultivos2_noInvC)){

                 echo " <th> "; echo $row_cultivos2_noINv["nombrecultivo"] ; echo " </th> ";
                } ?>


            </tr>




        <tr >
          <th style="background:#fff; " > </th>
          <th  style="background:#fff; " > </th>
          <th>Superficie Producción Por Cultivo</th>


           <?php
                    $contador=1;
                  while ( $row_cultivos2=pg_fetch_assoc($rcia_cultivos2C3)){


                    $cultivos1CC_ = pg_query($cn,$sql_cultivosVeranoCC);
                    $row_c1_=pg_fetch_assoc($cultivos1CC_);


                   // echo "ccccc=".$row_c1_["supverano"];
                    echo " <th    style= 'background:#75AF73;' id='superificieProd$contador'  name='superificieProd$contador'  > ";  echo $row_cultivos2["supveranoejecutado"] ;  echo " </th> ";
                    $contador=$contador+1;
                  } ?>

            <?php
                    $contador=0;
                  while ( $row_cultivos2_no=pg_fetch_assoc($rcia_cultivos2_noC3)){
                      $cultivos1CC_ = pg_query($cn,$cultivos1_no_Super);
                     $contador=$contador+1;
                   echo " <th style= 'background:#75AF73; '  id='superificieProd_no$contador'    name='superificieProd_no$contador'    > ";   echo $row_cultivos2_no["supveranoejecutado"] ; echo " </th> ";
                  } ?>

             <?php
                    $contador=1;
                  while ( $row_cultivos1_inv=pg_fetch_assoc($rcia_cultivos1_invC3)){
                    $cultivos1CC_Inv = pg_query($cn,$sql_cultivosVeranoCC_NO);
                    $row_c1_Inv=pg_fetch_assoc($cultivos1CC_Inv);
                   echo " <th style= 'background:#75AF73; '  id='superificieProd_Inv$contador'  name='superificieProd_Inv$contador'   > ";  echo $row_cultivos1_inv["supinviernoejecutado"] ;   echo " </th> ";
                   $contador=$contador+1;

                  } ?>

             <?php
                    $contador=1;
                  while ( $row_cultivos2_noINv=pg_fetch_assoc($rcia_cultivos2_noInvC3)){
                   echo " <th style= 'background:#75AF73; ' id='superificieProd_Inv_no$contador'   name='superificieProd_Inv_no$contador'   > ";   echo $row_cultivos2_noINv['supinviernoejecutado'];   echo " </th> ";
                   $contador=$contador+1;
                  } ?>


            </tr>


         <tr >
          <th style="background:#fff; " > </th>
          <th  style="background:#fff; " > </th>
          <th>porcentaje de superficie(%)</th>
          <?php

                $idic=1;
                while ( $row_cultivos2=pg_fetch_assoc($rcia_cultivos2C2)){

                 echo " <th id='porsup".$idic."' name='porsup".$idic."' > "; echo $row_cultivos2["nombrecultivo"] ; echo " </th> ";
                 $idic=$idic+1;

                } ?>

          <?php
                $idic=1;
                while ( $row_cultivos2_no=pg_fetch_assoc($rcia_cultivos2_noC2)){
                 echo " <th id='porsup_no".$idic."' name='porsup_no".$idic."' >   "; echo $row_cultivos2_no["nombrecultivo"] ; echo " </th> ";
                 $idic=$idic+1;
                } ?>

           <?php
                $idic=1;
                while ( $row_cultivos1_inv=pg_fetch_assoc($rcia_cultivos1_invC2)){

                 echo " <th  id='porsup_inv".$idic."' name='porsup_inv".$idic."'  > "; echo $row_cultivos1_inv["nombrecultivo"] ; echo " </th> ";
                  $idic=$idic+1;
                } ?>

           <?php
                $idica=1;
                while ( $row_cultivos2_noINv=pg_fetch_assoc($rcia_cultivos2_noInvC2)){

                 echo " <th   id='porsup_inv_no".$idica."' name='porsup_inv_no".$idica."'   > "; echo $row_cultivos2_noINv["nombrecultivo"] ; echo " </th> ";
                  $idica=$idica+1;

                } ?>


            </tr>



          <tr >
            <th style="background:#fff; " > </th>
            <th  style="background:#fff; " > </th>
            <th>ponderacion de valoración</th>

            <?php
                $icult=0;
                while ( $row_cultivos1=pg_fetch_assoc($rcia_cultivos2C1)){
                        $icult=$icult+1;

                        $row_c1=pg_fetch_assoc($cultivos1_pon);
                        $sql_cultivo1=" select * from  monitoreo.ponderacionEvalAgricola d  where  d.idmonitoreo = ".$monit." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=1 and campania='verano'";
                        $res_cultivo1= pg_query($cn,$sql_cultivo1);
                        $res_cultivo1r="";
                        if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
                  ?>
                <td style='background:#75AF73; ' ><input onkeypress="return blockNonNumbers(this, event, true, false);"  onKeyUp="sumarTodasColumnas(); "  value="<?php echo  $res_cultivo1r["ponderacion"]; ?>"   name="superProd<?php echo $icult; ?>" id="superProd<?php echo $icult; ?>" type="text" class="boxBusqueda4" value="<?php echo " " ?>"    > </td>
                <?php

                } ?>


                <?php
                $icult=0;
                while ( $row_cultivos2_no=pg_fetch_assoc($rcia_cultivos2_noC1)){
                      $icult=$icult+1;

                    $row_c1=pg_fetch_assoc($cultivos1_no_pond);
                    $sql_cultivo1_no=" select * from  monitoreo.ponderacionEvalAgricola d  where  d.idmonitoreo = ".$monit." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=0 and campania='verano'";
                    // echo "consuta si2=".$sql_cultivo1_no;
                    $ressql_cultivo1= pg_query($cn,$sql_cultivo1_no);
                       $res_cultivo1r_no="";
                    if($res_cultivo1r_no=pg_fetch_assoc($ressql_cultivo1)){}else{$res_cultivo1r_no="";}

                    ?>
                <td style='background:#75AF73; ' ><input onkeypress="return blockNonNumbers(this, event, true, false); " onKeyUp="sumarTodasColumnas(); " value="<?php if(isset($res_cultivo1r_no["ponderacion"])){echo  $res_cultivo1r_no["ponderacion"];}  ?>" name="superProdNo<?php echo $icult; ?>" id="superProdNo<?php echo $icult; ?>" type="text" class="boxBusqueda4" value="<?php echo " " ?>"    > </td>
                <?php

                } ?>


           <?php
                $icult=0;
                while ( $row_cultivos1_inv=pg_fetch_assoc($rcia_cultivos1_invC1)){
                $icult=$icult+1;

                    $row_c1=pg_fetch_assoc($cultivos1_inv_pon);
                    $sql_cultivo1=" select * from  monitoreo.ponderacionEvalAgricola d  where  d.idmonitoreo = ".$monit." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=1 and campania='invierno'";
                    $res_cultivo1_inv= pg_query($cn,$sql_cultivo1);
                       $res_cultivo1r="";
                     // echo "cccinviero=".$sql_cultivo1;
                    if($res_cultivo1r=pg_fetch_assoc($res_cultivo1_inv)){}else{$res_cultivo1r="";}

                 ?>
                <td style='background:#75AF73; ' ><input  onkeypress="return blockNonNumbers(this, event, true, false); " onKeyUp="sumarTodasColumnas(); " value="<?php echo  $res_cultivo1r["ponderacion"]; ?>" name="superProdInv<?php echo $icult; ?>" id="superProdInv<?php echo $icult; ?>" type="text" class="boxBusqueda4" value="<?php echo " " ?>"      > </td>
                <?php

                } ?>

           <?php
                $icult=0;
                while ( $row_cultivos2_noINv=pg_fetch_assoc($rcia_cultivos2_noInvC1)){
                    $icult=$icult+1;
                     $row_c1=pg_fetch_assoc($cultivos1_noInv_pon);
                    $sql_cultivo1_no=" select * from  monitoreo.ponderacionEvalAgricola d  where  d.idmonitoreo = ".$monit." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=0 and campania='invierno'";
                   // echo "consuta si2=".$sql_cultivo1_no;
                    $ressql_cultivo1= pg_query($cn,$sql_cultivo1_no);
                       $res_cultivo1r_no="";
                    if($res_cultivo1r_no=pg_fetch_assoc($ressql_cultivo1)){}else{$res_cultivo1r_no="";}
                    ?>
                <td style='background:#75AF73; ' ><input  onkeypress="return blockNonNumbers(this, event, true, false); "  onKeyUp="sumarTodasColumnas(); " value="<?php if(isset($res_cultivo1r_no["ponderacion"])){echo  $res_cultivo1r_no["ponderacion"];}  ?>"   name="superProdInv_no<?php echo $icult; ?>" id="superProdInv_no<?php echo $icult; ?>" type="text" class="boxBusqueda4" value="<?php echo " " ?>"      > </td>
                <?php

                } ?>





              </tr>


         <tr >
          <th style="background:#fff;color:#000000; " ></th>
          <th  style="background:#fff;color:#000000; " >  </th>
          <th>Porcentaje  Ponderacion</th>
          <?php
                $cc=1;
                while ( $row_cultivos2=pg_fetch_assoc($rcia_cultivos2C4)){

                 echo " <th  > <input style='background-color: #032c02; font-weight: bold;  color:#fff; text-align:center; ' type='text'  readonly='true'  name='porpon$cc'  id='porpon$cc' value="; echo $row_cultivos2["nombrecultivo"] ; echo "> </th> ";
                 $cc= $cc +1;
                } ?>

          <?php
                $cc=1;
                while ( $row_cultivos2_no=pg_fetch_assoc($rcia_cultivos2_noC4)){

                 echo " <th  > <input style='background-color: #032c02; font-weight: bold;  color:#fff; text-align:center; ' type='text'  readonly='true'  id='porpon_no$cc'  name='porpon_no$cc'   value= "; echo $row_cultivos2_no["nombrecultivo"] ; echo "> </th> ";
                 $cc= $cc +1;
                 } ?>

           <?php
                $cc=1;
                while ( $row_cultivos1_inv=pg_fetch_assoc($rcia_cultivos1_invC4)){
                 echo " <th  > <input style='background-color: #032c02; font-weight: bold;  color:#fff; text-align:center; ' type='text'  readonly='true'  id='porponinv$cc'  name='porponinv$cc'  value="; echo $row_cultivos1_inv["nombrecultivo"] ; echo "> </th> ";
                 $cc= $cc +1;
                } ?>

           <?php
                $cc=1;
                while ( $row_cultivos2_noINv=pg_fetch_assoc($rcia_cultivos2_noInvC4)){

                 echo " <th  > <input style='background-color: #032c02; font-weight: bold;  color:#fff; text-align:center; ' type='text'  readonly='true' id='porponinv_no$cc'  name='porponinv_no$cc'  value="; echo $row_cultivos2_noINv["nombrecultivo"] ; echo "> </th> ";
                $cc= $cc +1;

                } ?>


            </tr>




            <tr style="height: 20px;">
                <td colspan="2" style="text-align: right; font-weight: bold;">
                    Tickear solo Para predios con una Sola Campaña(Region del Chaco), o Cultivos Peremnes <input   onClick="javascript:campania_uno(this);" type="checkbox" name="campania" id="campania"  <?php if($campania_res==1){echo "checked";} ?>  >
                </td>
            </tr>

          <tr class="tableizer-firstrow">
               <th colspan = "2" >Evaluación directriz Técnica General</th>
               <th  rowspan="3" style="width:150px; " > Valoración Máxima(%)</th>
               <?php
                if($totalRows_cultivosVerano>0 ||  $totalRows_cultivos_noVerano>0){
                   echo "<th colspan ='";  echo ($totalRows_cultivosVerano+$totalRows_cultivos_noVerano) ; echo "' >VERANO</th>";
                }
               ?>

               <?php
                if($totalRows_cultivosInvierno>0 ||  $totalRows_cultivos_noInv>0){
                   echo "<th colspan ='";  echo ($totalRows_cultivosInvierno+$totalRows_cultivos_noInv) ; echo "' >INVIERNO</th>";
                }
               ?>


          </tr>



        <tr class="tableizer-firstrow">
            <th  rowspan="2"> Evaluación directriz Técnica Generalx</th>
            <th  rowspan="2" > Evaluación directriz Técnica Especifica</th>

              <?php //echo "total cult=".$totalRows_cultivos;
                if($totalRows_cultivosVerano>0){
                 //   echo "<th rowspan ='2'> CULTIVOS COMPROMETIDOS</th>";
                   echo "<th colspan ='";  echo $totalRows_cultivosVerano ; echo "' >CULTIVOS COMPROMETIDOS</th>";
                }
               ?>

                 <?php //echo "total cult=".$totalRows_cultivos;
                if($totalRows_cultivos_noVerano>0){
                 //   echo "<th rowspan ='2'>CULTIVOS NO COMPROMETIDOS</th>";
                   echo "<th colspan ='";  echo $totalRows_cultivos_noVerano ; echo "' >CULTIVOS NO COMPROMETIDOS</th>";
                }
               ?>


               <?php //echo "total cult=".$totalRows_cultivos;
                if($totalRows_cultivosInvierno>0){
                 //   echo "<th rowspan ='2'> CULTIVOS COMPROMETIDOS</th>";
                   echo "<th colspan ='";  echo $totalRows_cultivosInvierno ; echo "' >CULTIVOS COMPROMETIDOS</th>";
                }
               ?>

             <?php //echo "total cult=".$totalRows_cultivos;
                if($totalRows_cultivos_noInv>0){
                 //   echo "<th rowspan ='2'>CULTIVOS NO COMPROMETIDOS</th>";
                   echo "<th colspan ='";  echo $totalRows_cultivos_noInv ; echo "' >CULTIVOS NO COMPROMETIDOS</th>";
                }
               ?>





        </tr>



        <tr >


          <?php

                while ( $row_cultivos2=pg_fetch_assoc($rcia_cultivos2)){

                 echo " <th> "; echo $row_cultivos2["nombrecultivo"] ; echo " </th> ";
                } ?>

          <?php

                while ( $row_cultivos2_no=pg_fetch_assoc($rcia_cultivos2_no)){

                 echo " <th> "; echo $row_cultivos2_no["nombrecultivo"] ; echo " </th> ";
                } ?>

           <?php

                while ( $row_cultivos1_inv=pg_fetch_assoc($rcia_cultivos1_inv)){

                 echo " <th> "; echo $row_cultivos1_inv["nombrecultivo"] ; echo " </th> ";

                } ?>

           <?php

                while ( $row_cultivos2_noINv=pg_fetch_assoc($rcia_cultivos2_noInv)){

                 echo " <th> "; echo $row_cultivos2_noINv["nombrecultivo"] ; echo " </th> ";
                } ?>





        </tr>
      </thead>


      <tbody style="text-align:center;">




                     <tr>

                         <td  >Superficie de siembra comprometida en el área deforestada sin autorización por cultivos estratégicos de acuerdo a programación (ha) </td>

                        <td>Superficie de siembra comprometida en el área deforestada sin autorización por cultivos estratégicos de acuerdo a programación (ha)</td> <td>70</td>

                            <?php
                                $icult=1;
                                while ( $icult<=$totalRows_cultivosVerano){
                                    $row_c1=pg_fetch_assoc($cultivos1);
                                    $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablaval." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=1 and campania='verano'";
                                    $res_cultivo1= pg_query($cn,$sql_cultivo1);

                                    $res_cultivo1r="";
                                    if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
                                    // echo "consuta1 111=".$sql_cultivo1;
                                 ?>
                             <td><input <?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75  ){echo "  readonly "; }  ?> name="doccomer<?php echo $icult; ?>"   id="doccomer<?php echo $icult; ?>" type="text" class="boxBusqueda4" value="<?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75 ){echo 70; }else{echo  $res_cultivo1r["puntuacioncultivo"];} ?>" onKeyUp="extractNumber(this,0,false);  promediar1(this,70); promediarverano(this,70,<?php echo $icult; ?>);" onKeyPress="return blockNonNumbers(this, event, true, false);  "    > </td>
                            <?php
                            $icult++; } ?>

                        <?php
                        $icult1_no=1;
                        while ( $icult1_no<=$totalRows_cultivos_noVerano){
                            $row_c1=pg_fetch_assoc($cultivos1_no);
                            $sql_cultivo1_no=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablaval." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=0 and campania='verano'";
                           // echo "consuta si2=".$sql_cultivo1_no;
                            $ressql_cultivo1= pg_query($cn,$sql_cultivo1_no);
                               $res_cultivo1r_no="";
                            if($res_cultivo1r_no=pg_fetch_assoc($ressql_cultivo1)){}else{$res_cultivo1r_no="";}
                           // echo "consuta1=".$sql_cultivo1_no." fech=".$res_cultivo1r_no[0];
                         ?>
                        <td><input <?php if($res_cultivo1r_no["idcultivo"]==75 || $res_cultivo1r_no["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75   ){echo "  readonly "; }  ?>  name="doccomer<?php echo $icult1_no."_no"; ?>" id="doccomer<?php echo $icult1_no."_no"; ?>" type="text" class="boxBusqueda4" value="<?php if($res_cultivo1r_no["idcultivo"]==75 || $res_cultivo1r_no["idcultivo"]==81  || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75 ){echo 70; }else{ if(isset($res_cultivo1r_no["puntuacioncultivo"])){echo  $res_cultivo1r_no["puntuacioncultivo"];} } ?>" onKeyUp="extractNumber(this,0,false); promediar1(this,70);  promediarverano_no(this,70,<?php echo $icult1_no; ?>); " onKeyPress="return blockNonNumbers(this, event, true, false);  "    > </td>

                    <?php
                    $icult1_no++; } ?>



                    <?php
                        $icult=1;

                        while ( $icult<=$totalRows_cultivosInvierno){
                            $row_c1=pg_fetch_assoc($cultivos1_inv);
                            $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablaval." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=1 and campania='invierno'";
                            $res_cultivo1_inv= pg_query($cn,$sql_cultivo1);
                               $res_cultivo1r="";
                            if($res_cultivo1r=pg_fetch_assoc($res_cultivo1_inv)){}else{$res_cultivo1r="";}
                            // echo "consuta1=".$sql_cultivo1;
                            ?>
                           <td><input name="doccomer_inv<?php echo $icult; ?>" id="doccomer_inv<?php echo $icult; ?>" type="text" class="boxBusqueda4" value="<?php echo  $res_cultivo1r["puntuacioncultivo"]; ?>" onKeyUp="extractNumber(this,0,false); promediar1(this,70);  promediarInvierno(this,70,<?php echo $icult; ?>);" onKeyPress="return blockNonNumbers(this, event, true, false);  "    > </td>

                 <?php
                    $icult++; } ?>




                    <?php
                        $icult1_no=1; //echo"aaaaaaa=".$totalRows_cultivos_noInv;
                        while ( $icult1_no<=$totalRows_cultivos_noInv){
                            $row_c1=pg_fetch_assoc($cultivos1_noInv);
                            $sql_cultivo1_no=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablaval." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=0 and campania='invierno'";
                           // echo "consuta si2=".$sql_cultivo1_no;
                            $ressql_cultivo1= pg_query($cn,$sql_cultivo1_no);
                               $res_cultivo1r_no="";
                            if($res_cultivo1r_no=pg_fetch_assoc($ressql_cultivo1)){}else{$res_cultivo1r_no="";}
                        //  echo "consuta1=".$sql_cultivo1_no." fechidcult=".$res_cultivo1r_no["idcultivo"];
                         ?>
                        <td><input  <?php if($res_cultivo1r_no["idcultivo"]==75 || $res_cultivo1r_no["idcultivo"]==81  || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75  ){echo "  readonly "; }  ?>  name="doccomer_no_inv<?php echo $icult1_no."_no"; ?>" id="doccomer_no_inv<?php echo $icult1_no."_no"; ?>" type="text" class="boxBusqueda4" value="<?php if($res_cultivo1r_no["idcultivo"]==75 || $res_cultivo1r_no["idcultivo"]==81  || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75 ){echo 70; }else{ if(isset($res_cultivo1r_no["puntuacioncultivo"])){echo  $res_cultivo1r_no["puntuacioncultivo"];}}  ?>" onKeyUp="extractNumber(this,0,false); promediar1(this,70); promediarInvierno_no(this,70,<?php echo $icult1_no; ?>); " onKeyPress="return blockNonNumbers(this, event, true, false);  "    > </td>

                    <?php
                    $icult1_no++; } ?>




                   </tr>







       <tr><td rowspan = "2">Aplicación de técnicas y tecnologías sostenibles: - Siembra directa.   -Rotacion de Cultivos</td><td>Compra de semilla certificada y/o, venta de producto (que demuestren rotación de cultivo)</td><td>15</td>

        <?php
            $icult=1;
            while ( $icult<=$totalRows_cultivosVerano){
                $row_c1=pg_fetch_assoc($cultivos5);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava5." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=1 and campania='verano'";
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                   $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
               // echo "consuta1=".$sql_cultivo1;
             ?>
           <td><input  <?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81  || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75 ){echo "  readonly "; }  ?>  name="aplicacion<?php echo $icult; ?>" id="aplicacion<?php echo $icult; ?>" type="text" class="boxBusqueda4" value="<?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81  || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75 ){echo 15; }else{  if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];} } ?>" onKeyUp="extractNumber(this,0,false); promediar5(this,15); promediarverano(this,30,<?php echo $icult; ?>);  " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
        <?php
        $icult++; } ?>


                <?php
            $icult=1;
            while ( $icult<=$totalRows_cultivos_noVerano){
                $row_c1=pg_fetch_assoc($cultivos5_no);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava5." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=0 and campania='verano'";
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                   $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
               // echo "consuta1=".$sql_cultivo1;
             ?>
           <td><input  <?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75  ){echo "  readonly "; }  ?>   name="aplicacion<?php echo $icult."_no"; ?>" id="aplicacion<?php echo $icult."_no"; ?>" type="text" class="boxBusqueda4" value="<?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81  || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75 ){echo 15; }else{  if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];}}  ?>" onKeyUp="extractNumber(this,0,false); promediar5(this,15); promediarverano_no(this,30,<?php echo $icult; ?>); " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
        <?php
        $icult++; } ?>



         <?php
            $icult=1;
            while ( $icult<=$totalRows_cultivosInvierno){
                $row_c1=pg_fetch_assoc($cultivos5_inv);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava5." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=1 and campania='invierno'";
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                   $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
               // echo "consuta1=".$sql_cultivo1;
             ?>
              <td><input  <?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81  || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75  ){echo "  readonly "; }  ?>  name="aplicacion_inv<?php echo $icult; ?>" id="aplicacion_inv<?php echo $icult; ?>" type="text" class="boxBusqueda4" value="<?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81  || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75  ){echo 15; }else{  if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];}}  ?>" onKeyUp="extractNumber(this,0,false); promediar5(this,15);promediarInvierno(this,30,<?php echo $icult; ?>);  " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
        <?php
        $icult++; } ?>


                <?php
            $icult=1;
            while ( $icult<=$totalRows_cultivos_noInv){
                $row_c1=pg_fetch_assoc($cultivos5_noInv);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava5." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=0 and campania='invierno'";
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                   $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
               // echo "consuta1=".$sql_cultivo1;
             ?>
              <td><input <?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81  || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75  ){echo "  readonly "; }  ?>  name="aplicacion_no_inv<?php echo $icult."_no"; ?>" id="aplicacion_no_inv<?php echo $icult."_no"; ?>" type="text" class="boxBusqueda4" value="<?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81  || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75  ){echo 15; }else{  if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];}}  ?>" onKeyUp="extractNumber(this,0,false); promediar5(this,15);promediarInvierno_no(this,30,<?php echo $icult; ?>);  " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
        <?php
        $icult++; } ?>





        </tr>

       <tr><td>Compra y/o alquiler de maquinaria y herramientas de siembra directa y/o insumos que demuestre siembra directa</td><td>15</td>

       <?php
            $icult=1;
            while ( $icult<=$totalRows_cultivosVerano){
                $row_c1=pg_fetch_assoc($cultivos6);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava6." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=1 and campania='verano'";
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                   $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
               // echo "consuta1=".$sql_cultivo1;
             ?>
           <td><input  <?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81  || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75 ){echo "  readonly "; }  ?>  name="maqHerra<?php echo $icult; ?>" id="maqHerra<?php echo $icult; ?>" type="text" class="boxBusqueda4" value="<?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81   || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75  ){echo 15; }else{  if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];}}  ?>" onKeyUp="extractNumber(this,0,false); promediar6(this,15); promediarverano(this,30,<?php echo $icult; ?>); " onKeyUp="extractNumber(this,0,false); " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
        <?php
        $icult++; } ?>


        <?php
        $icult=1;
        while ( $icult<=$totalRows_cultivos_noVerano){
                $row_c1=pg_fetch_assoc($cultivos6_no);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava6." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=0 and campania='verano'";
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                   $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
               // echo "consuta1=".$sql_cultivo1;
             ?>
        <td><input  <?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81  || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75 ){echo "  readonly "; }  ?>   name="maqHerra<?php echo $icult."_no"; ?>" id="maqHerra<?php echo $icult."_no"; ?>" type="text" class="boxBusqueda4" value="<?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81  || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75  ){echo 15; }else{ if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];} } ?>" onKeyUp="extractNumber(this,0,false); promediar6(this,15); promediarverano_no(this,30,<?php echo $icult; ?>); " onKeyUp="extractNumber(this,0,false); " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
        <?php
        $icult++; } ?>




         <?php
            $icult=1;
            while ( $icult<=$totalRows_cultivosInvierno){
                $row_c1=pg_fetch_assoc($cultivos6_inv);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava6." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=1 and campania='invierno'";
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                   $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
               // echo "consuta1=".$sql_cultivo1;
             ?>
              <td><input  <?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81  || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75  ){echo "  readonly "; }  ?>  name="maqHerra_inv<?php echo $icult; ?>" id="maqHerra_inv<?php echo $icult; ?>" type="text" class="boxBusqueda4" value="<?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81  || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75 ){echo 15; }else{  if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];}}  ?>" onKeyUp="extractNumber(this,0,false); promediar6(this,15); promediarInvierno(this,30,<?php echo $icult; ?>); " onKeyUp="extractNumber(this,0,false); " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
        <?php
        $icult++; } ?>


        <?php
        $icult=1;
        while ( $icult<=$totalRows_cultivos_noInv){
                $row_c1=pg_fetch_assoc($cultivos6_noInv);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava6." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=0 and campania='invierno'";
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                   $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
               // echo "consuta1=".$sql_cultivo1;
             ?>
              <td><input <?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81  || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75  ){echo "  readonly "; }  ?> name="maqHerra_no_inv<?php echo $icult."_no"; ?>" id="maqHerra_no_inv<?php echo $icult."_no"; ?>" type="text" class="boxBusqueda4" value="<?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75  ){echo 15; }else{ if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];}}  ?>" onKeyUp="extractNumber(this,0,false); promediar6(this,15);promediarInvierno_no(this,30,<?php echo $icult; ?>);  " onKeyUp="extractNumber(this,0,false); " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
        <?php
        $icult++; } ?>





       </tr>

       <tr><td  >Uso de abonos e insumos ecológicos. (*)</td> <td>Adquisición de insumos ecológicos</td><td>5</td>

       <?php
            $icult=1;
            while ( $icult<=$totalRows_cultivosVerano){
                $row_c1=pg_fetch_assoc($cultivos7);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava7." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=1 and campania='verano'";
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                   $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
               // echo "consuta1=".$sql_cultivo1;
             ?>
           <td><input  <?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81  || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75  ){echo "  readonly "; }  ?>  name="abonoIns<?php echo $icult; ?>" id="abonoIns<?php echo $icult; ?>" type="text" class="boxBusqueda4" value="<?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81   || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75  ){echo 0; }else{if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];}}  ?>"  onKeyUp="extractNumber(this,0,false); promediar7(this,5);  promediarverano(this,30,<?php echo $icult; ?>);  " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
        <?php
        $icult++; } ?>


        <?php
         $icult=1;
         while ( $icult<=$totalRows_cultivos_noVerano){
                $row_c1=pg_fetch_assoc($cultivos7_no);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava7." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=0 and campania='verano'";
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                   $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
               // echo "consuta1=".$sql_cultivo1;
             ?>
           <td><input   <?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81  || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75  ){echo "  readonly "; }  ?>  name="abonoIns<?php echo $icult."_no"; ?>" id="abonoIns<?php echo $icult."_no"; ?>" type="text" class="boxBusqueda4" value="<?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81  || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75 ){echo 0; }else{if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];}}  ?>"  onKeyUp="extractNumber(this,0,false); promediar7(this,5); promediarverano_no(this,30,<?php echo $icult; ?>);  " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
        <?php
        $icult++; } ?>



              <?php
            $icult=1;
            while ( $icult<=$totalRows_cultivosInvierno){
                $row_c1=pg_fetch_assoc($cultivos7_inv);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava7." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=1 and campania='invierno'";
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                   $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
               // echo "consuta1=".$sql_cultivo1;
             ?>
              <td><input name="abonoIns_inv<?php echo $icult; ?>" id="abonoIns_inv<?php echo $icult; ?>" type="text" class="boxBusqueda4" value="<?php if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];}  ?>"  onKeyUp="extractNumber(this,0,false); promediar7(this,5);  promediarInvierno(this,30,<?php echo $icult; ?>); " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
        <?php
        $icult++; } ?>


        <?php
         $icult=1;
         while ( $icult<=$totalRows_cultivos_noInv){
                $row_c1=pg_fetch_assoc($cultivos7_noInv);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava7." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=0 and campania='invierno'";
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                   $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
               // echo "consuta1=".$sql_cultivo1;
             ?>
              <td><input  <?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81  || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75  ){echo "  readonly "; }  ?>   name="abonoIns_no_inv<?php echo $icult."_no"; ?>" id="abonoIns_no_inv<?php echo $icult."_no"; ?>" type="text" class="boxBusqueda4" value="<?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81  || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75 ){echo 0; }else{ if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];}}  ?>"  onKeyUp="extractNumber(this,0,false); promediar7(this,5); promediarInvierno_no(this,30,<?php echo $icult; ?>);  " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
        <?php
        $icult++; } ?>



       </tr>

       <tr style="font-size: 9pt; font-weight: bold;" ><td colspan = "3">PONDERACION FINAL (%)</td>

            <?php
            $icult=1;
            while ( $icult<=$totalRows_cultivosVerano){
                $row_c1=pg_fetch_assoc($cultivostotal);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava7." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=1 and campania='verano'";
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                   $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
               // echo "consuta1=".$sql_cultivo1;
             ?>
              <td   > <input style="background-color: #fff; font-size: 9pt; font-weight: bold;  text-align:center; " readonly='true' name="totalc<?php echo $icult; ?>" id="totalc<?php echo $icult; ?>"   class="boxBusqueda4"      ></td>
        <?php
        $icult++; } ?>

         <?php
            $icult=1;
            while ( $icult<=$totalRows_cultivos_noVerano){
                $row_c1=pg_fetch_assoc($cultivosTotal_no);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava7." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=1 and campania='verano'";
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                   $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
               // echo "consuta1=".$sql_cultivo1;
             ?>
              <td > <input style="background-color: #fff; font-size: 9pt; font-weight: bold;  text-align:center; " readonly='true' name="totalnoc<?php echo $icult; ?>" id="totalnoc<?php echo $icult; ?>"  class="boxBusqueda4"     ></td>
        <?php
        $icult++; } ?>


         <?php
            $icult=1;
            while ( $icult<=$totalRows_cultivosInvierno){
                $row_c1=pg_fetch_assoc($cultivosTotal_inv);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava7." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=1 and campania='invierno'";
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                   $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
               // echo "consuta1=".$sql_cultivo1;
             ?>
              <td > <input style="background-color: #fff; font-size: 9pt; font-weight: bold; readonly='true'  text-align:center; "  name="totalInv<?php echo $icult; ?>" id="totalInv<?php echo $icult; ?>"   class="boxBusqueda4"     ></td>
        <?php
        $icult++; } ?>


            <?php
         $icult=1;
         while ( $icult<=$totalRows_cultivos_noInv){
                $row_c1=pg_fetch_assoc($cultivosTotal_noInv);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava7." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=0 and campania='invierno'";
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                   $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
               // echo "consuta1=".$sql_cultivo1;
             ?>
              <td  > <input style="background-color: #fff; font-size: 9pt; font-weight: bold;  text-align:center; "   name="totalInvNo<?php echo $icult ; ?>" id="totalInvNo<?php echo $icult ; ?>"   class="boxBusqueda4"   ></td>
        <?php
        $icult++; } ?>




       </tr>

        <tr>
            <td  style=" font-weight: bold;" colspan = "3">TOTAL GENERAL (%)</td>
            <td style=" font-weight: bold;"  style="font-size: 16dp; font-weight: bold;" id="totalgeneral_eval" name="totalgeneral_eval" colspan = "20">55</td>
        </tr>
      </tbody>

    </table>



 <?php
         //***************************************************************************************************************
 //***************************************************************************************************************
        }else   if($idTipoPredio==35 ||$idTipoPredio==36){ //--------------COMUNIDAD y pequeña------------------

       ?>



         <table class="tableizer-table">


      <thead>

            <tr class="tableizer-firstrow">
                <th style="background:#fff; " ></th>
               <th   style="background:#fff; " rowspan="2"> </th>
               <th    rowspan="2">Sup. Compromiso Agricola</th>
               <?php
                if($totalRows_cultivosVerano>0 ||  $totalRows_cultivos_noVerano>0){
                   echo "<th colspan ='";  echo ($totalRows_cultivosVerano+$totalRows_cultivos_noVerano) ; echo "' >VERANO</th>";
                }
               ?>

               <?php
                if($totalRows_cultivosInvierno>0 ||  $totalRows_cultivos_noInv>0){
                   echo "<th colspan ='";  echo ($totalRows_cultivosInvierno+$totalRows_cultivos_noInv) ; echo "' >INVIERNO</th>";
                }
               ?>


          </tr>
        <tr class="tableizer-firstrow">
            <th   style="background:#fff; ">  </th>

              <?php //echo "total cult=".$totalRows_cultivos;
                if($totalRows_cultivosVerano>0){
                 //   echo "<th rowspan ='2'> CULTIVOS COMPROMETIDOS</th>";
                   echo "<th colspan ='";  echo $totalRows_cultivosVerano ; echo "' >CULTIVOS COMPROMETIDOS</th>";
                }
               ?>

                 <?php //echo "total cult=".$totalRows_cultivos;
                if($totalRows_cultivos_noVerano>0){
                 //   echo "<th rowspan ='2'>CULTIVOS NO COMPROMETIDOS</th>";
                   echo "<th colspan ='";  echo $totalRows_cultivos_noVerano ; echo "' >CULTIVOS NO COMPROMETIDOS</th>";
                }
               ?>


               <?php //echo "total cult=".$totalRows_cultivos;
                if($totalRows_cultivosInvierno>0){
                 //   echo "<th rowspan ='2'> CULTIVOS COMPROMETIDOS</th>";
                   echo "<th colspan ='";  echo $totalRows_cultivosInvierno ; echo "' >CULTIVOS COMPROMETIDOS</th>";
                }
               ?>

             <?php //echo "total cult=".$totalRows_cultivos;
                if($totalRows_cultivos_noInv>0){
                 //   echo "<th rowspan ='2'>CULTIVOS NO COMPROMETIDOS</th>";
                   echo "<th colspan ='";  echo $totalRows_cultivos_noInv ; echo "' >CULTIVOS NO COMPROMETIDOS</th>";
                }
               ?>
        </tr>

        <tr >
          <th   style="background:#fff; " > </th>
          <th  style="background:#fff; " > </th>
          <th id='suptotalc' name='suptotalc'  style="background:#75AF73; "><?php echo isset($_SESSION['datos_ganadero']['SupActAgri']) ? htmlspecialchars($_SESSION['datos_ganadero']['SupActAgri']) : $row_supali['supagricola'] ?></th>
          <?php

                while ( $row_cultivos2=pg_fetch_assoc($rcia_cultivos2C)){

                 echo " <th> "; echo $row_cultivos2["nombrecultivo"] ; echo " </th> ";
                } ?>

          <?php

                while ( $row_cultivos2_no=pg_fetch_assoc($rcia_cultivos2_noC)){

                 echo " <th> "; echo $row_cultivos2_no["nombrecultivo"] ; echo " </th> ";
                } ?>

           <?php

                while ( $row_cultivos1_inv=pg_fetch_assoc($rcia_cultivos1_invC)){

                 echo " <th> "; echo $row_cultivos1_inv["nombrecultivo"] ; echo " </th> ";

                } ?>

           <?php

                while ( $row_cultivos2_noINv=pg_fetch_assoc($rcia_cultivos2_noInvC)){

                 echo " <th> "; echo $row_cultivos2_noINv["nombrecultivo"] ; echo " </th> ";
                } ?>


            </tr>




        <tr >
          <th style="background:#fff; " > </th>
          <th  style="background:#fff; " > </th>
          <th>Superficie Producción Por Cultivo</th>


           <?php
                    $contador=1;
                  while ( $row_cultivos2=pg_fetch_assoc($rcia_cultivos2C3)){


                    $cultivos1CC_ = pg_query($cn,$sql_cultivosVeranoCC);
                    $row_c1_=pg_fetch_assoc($cultivos1CC_);


                   // echo "ccccc=".$row_c1_["supverano"];
                    echo " <th    style= 'background:#75AF73;' id='superificieProd$contador'  name='superificieProd$contador'  > ";  echo $row_cultivos2["supveranoejecutado"] ;  echo " </th> ";
                    $contador=$contador+1;
                  } ?>

            <?php
                    $contador=0;
                  while ( $row_cultivos2_no=pg_fetch_assoc($rcia_cultivos2_noC3)){
                      $cultivos1CC_ = pg_query($cn,$cultivos1_no_Super);
                     $contador=$contador+1;
                   echo " <th style= 'background:#75AF73; '  id='superificieProd_no$contador'    name='superificieProd_no$contador'    > ";   echo $row_cultivos2_no["supveranoejecutado"] ; echo " </th> ";
                  } ?>

             <?php
                    $contador=1;
                  while ( $row_cultivos1_inv=pg_fetch_assoc($rcia_cultivos1_invC3)){
                    $cultivos1CC_Inv = pg_query($cn,$sql_cultivosVeranoCC_NO);
                    $row_c1_Inv=pg_fetch_assoc($cultivos1CC_Inv);
                   echo " <th style= 'background:#75AF73; '  id='superificieProd_Inv$contador'  name='superificieProd_Inv$contador'   > ";  echo $row_cultivos1_inv["supinviernoejecutado"] ;   echo " </th> ";
                   $contador=$contador+1;

                  } ?>

             <?php
                    $contador=1;
                  while ( $row_cultivos2_noINv=pg_fetch_assoc($rcia_cultivos2_noInvC3)){
                   echo " <th style= 'background:#75AF73; ' id='superificieProd_Inv_no$contador'   name='superificieProd_Inv_no$contador'   > ";   echo $row_cultivos2_noINv['supinviernoejecutado'];   echo " </th> ";
                   $contador=$contador+1;
                  } ?>


            </tr>


         <tr >
          <th style="background:#fff; " > </th>
          <th  style="background:#fff; " > </th>
          <th>porcentaje de superficie(%)</th>
          <?php
                $idic=1;
                while ( $row_cultivos2=pg_fetch_assoc($rcia_cultivos2C2)){

                 echo " <th id='porsup".$idic."' name='porsup".$idic."' > "; echo $row_cultivos2["nombrecultivo"] ; echo " </th> ";
                 $idic=$idic+1;

                } ?>

          <?php
                $idic=1;
                while ( $row_cultivos2_no=pg_fetch_assoc($rcia_cultivos2_noC2)){
                 echo " <th id='porsup_no".$idic."' name='porsup_no".$idic."' >   "; echo $row_cultivos2_no["nombrecultivo"] ; echo " </th> ";
                 $idic=$idic+1;
                } ?>

           <?php
                $idic=1;
                while ( $row_cultivos1_inv=pg_fetch_assoc($rcia_cultivos1_invC2)){

                 echo " <th  id='porsup_inv".$idic."' name='porsup_inv".$idic."'  > "; echo $row_cultivos1_inv["nombrecultivo"] ; echo " </th> ";
                  $idic=$idic+1;
                } ?>

           <?php
                $idica=1;
                while ( $row_cultivos2_noINv=pg_fetch_assoc($rcia_cultivos2_noInvC2)){

                 echo " <th   id='porsup_inv_no".$idica."' name='porsup_inv_no".$idica."'   > "; echo $row_cultivos2_noINv["nombrecultivo"] ; echo " </th> ";
                  $idica=$idica+1;

                } ?>


            </tr>



          <tr >
            <th style="background:#fff; " > </th>
            <th  style="background:#fff; " > </th>
            <th>ponderacion de valoración</th>

            <?php
                $icult=0;
                while ( $row_cultivos1=pg_fetch_assoc($rcia_cultivos2C1)){
                        $icult=$icult+1;

                        $row_c1=pg_fetch_assoc($cultivos1_pon);
                        $sql_cultivo1=" select * from  monitoreo.ponderacionEvalAgricola d  where  d.idmonitoreo = ".$monit." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=1 and campania='verano'";
                        $res_cultivo1= pg_query($cn,$sql_cultivo1);
                        $res_cultivo1r="";
                        if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
                  ?>
                <td style='background:#75AF73; ' ><input onkeypress="return blockNonNumbers(this, event, true, false);"  onKeyUp="sumarTodasColumnas(); "  value="<?php echo  $res_cultivo1r["ponderacion"]; ?>"   name="superProd<?php echo $icult; ?>" id="superProd<?php echo $icult; ?>" type="text" class="boxBusqueda4" value="<?php echo " " ?>"    > </td>
                <?php

                } ?>


                <?php
                $icult=0;
                while ( $row_cultivos2_no=pg_fetch_assoc($rcia_cultivos2_noC1)){
                      $icult=$icult+1;

                    $row_c1=pg_fetch_assoc($cultivos1_no_pond);
                    $sql_cultivo1_no=" select * from  monitoreo.ponderacionEvalAgricola d  where  d.idmonitoreo = ".$monit." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=0 and campania='verano'";
                    // echo "consuta si2=".$sql_cultivo1_no;
                    $ressql_cultivo1= pg_query($cn,$sql_cultivo1_no);
                       $res_cultivo1r_no="";
                    if($res_cultivo1r_no=pg_fetch_assoc($ressql_cultivo1)){}else{$res_cultivo1r_no="";}

                    ?>
                <td style='background:#75AF73; ' ><input onkeypress="return blockNonNumbers(this, event, true, false); " onKeyUp="sumarTodasColumnas(); " value="<?php if(isset($res_cultivo1r_no["ponderacion"])){echo  $res_cultivo1r_no["ponderacion"];}  ?>" name="superProdNo<?php echo $icult; ?>" id="superProdNo<?php echo $icult; ?>" type="text" class="boxBusqueda4" value="<?php echo " " ?>"    > </td>
                <?php

                } ?>


           <?php
                $icult=0;
                while ( $row_cultivos1_inv=pg_fetch_assoc($rcia_cultivos1_invC1)){
                $icult=$icult+1;

                    $row_c1=pg_fetch_assoc($cultivos1_inv_pon);
                    $sql_cultivo1=" select * from  monitoreo.ponderacionEvalAgricola d  where  d.idmonitoreo = ".$monit." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=1 and campania='invierno'";
                    $res_cultivo1_inv= pg_query($cn,$sql_cultivo1);
                       $res_cultivo1r="";
                     // echo "cccinviero=".$sql_cultivo1;
                    if($res_cultivo1r=pg_fetch_assoc($res_cultivo1_inv)){}else{$res_cultivo1r="";}

                 ?>
                <td style='background:#75AF73; ' ><input  onkeypress="return blockNonNumbers(this, event, true, false); " onKeyUp="sumarTodasColumnas(); " value="<?php echo  $res_cultivo1r["ponderacion"]; ?>" name="superProdInv<?php echo $icult; ?>" id="superProdInv<?php echo $icult; ?>" type="text" class="boxBusqueda4" value="<?php echo " " ?>"      > </td>
                <?php

                } ?>

           <?php
                $icult=0;
                while ( $row_cultivos2_noINv=pg_fetch_assoc($rcia_cultivos2_noInvC1)){
                    $icult=$icult+1;
                     $row_c1=pg_fetch_assoc($cultivos1_noInv_pon);
                    $sql_cultivo1_no=" select * from  monitoreo.ponderacionEvalAgricola d  where  d.idmonitoreo = ".$monit." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=0 and campania='invierno'";
                   // echo "consuta si2=".$sql_cultivo1_no;
                    $ressql_cultivo1= pg_query($cn,$sql_cultivo1_no);
                       $res_cultivo1r_no="";
                    if($res_cultivo1r_no=pg_fetch_assoc($ressql_cultivo1)){}else{$res_cultivo1r_no="";}
                    ?>
                <td style='background:#75AF73; ' ><input  onkeypress="return blockNonNumbers(this, event, true, false); "  onKeyUp="sumarTodasColumnas(); " value="<?php if(isset($res_cultivo1r_no["ponderacion"])){echo  $res_cultivo1r_no["ponderacion"];}  ?>"   name="superProdInv_no<?php echo $icult; ?>" id="superProdInv_no<?php echo $icult; ?>" type="text" class="boxBusqueda4" value="<?php echo " " ?>"      > </td>
                <?php

                } ?>





              </tr>


         <tr >
          <th style="background:#fff; " > </th>
          <th  style="background:#fff; " > </th>
          <th>Porcentaje  Ponderacion</th>
          <?php
                $cc=1;
                while ( $row_cultivos2=pg_fetch_assoc($rcia_cultivos2C4)){

                // echo " <th id='porpon$cc'  name='porpon$cc' > "; echo $row_cultivos2["nombrecultivo"] ; echo " </th> ";
                 echo " <th   > <input style='background-color: #032c02; font-weight: bold;  color:#fff; text-align:center; ' type='text'  readonly='true' name='porpon$cc'  id='porpon$cc' value="; echo $row_cultivos2["nombrecultivo"] ; echo "> </th> ";
                 $cc= $cc +1;
                } ?>

          <?php
                $cc=1;
                while ( $row_cultivos2_no=pg_fetch_assoc($rcia_cultivos2_noC4)){

                 echo " <th > <input style='background-color: #032c02; font-weight: bold;  color:#fff; text-align:center; ' type='text'  readonly='true'  id='porpon_no$cc'  name='porpon_no$cc'  value="; echo $row_cultivos2_no["nombrecultivo"] ; echo "> </th> ";
                 $cc= $cc +1;
                 } ?>

           <?php
                $cc=1;
                while ( $row_cultivos1_inv=pg_fetch_assoc($rcia_cultivos1_invC4)){
                 echo " <th  > <input style='background-color: #032c02; font-weight: bold;  color:#fff; text-align:center; ' type='text'  readonly='true' id='porponinv$cc'  name='porponinv$cc'  value="; echo $row_cultivos1_inv["nombrecultivo"] ; echo "> </th> ";
                 $cc= $cc +1;
                } ?>

           <?php
                $cc=1;
                while ( $row_cultivos2_noINv=pg_fetch_assoc($rcia_cultivos2_noInvC4)){

                 echo " <th  > <input style='background-color: #032c02; font-weight: bold;  color:#fff; text-align:center; ' type='text'  readonly='true' id='porponinv_no$cc'  name='porponinv_no$cc'  value="; echo $row_cultivos2_noINv["nombrecultivo"] ; echo "> </th> ";
                $cc= $cc +1;

                } ?>


            </tr>




            <tr style="height: 20px;">
                <td colspan="2" style="text-align: right; font-weight: bold;">
                    Tickear solo Para predios con una Sola Campaña(Region del Chaco), o Cultivos Peremnes <input   onClick="javascript:campania_uno(this);" type="checkbox" name="campania" id="campania"  <?php if($campania_res==1){echo "checked";} ?>  >
                </td>
            </tr>

          <tr class="tableizer-firstrow">
               <th colspan = "2" >Evaluación directriz Técnica General</th>
               <th  rowspan="3" style="width:150px; " > Valoración Máxima(%)</th>
               <?php
                if($totalRows_cultivosVerano>0 ||  $totalRows_cultivos_noVerano>0){
                   echo "<th colspan ='";  echo ($totalRows_cultivosVerano+$totalRows_cultivos_noVerano) ; echo "' >VERANO</th>";
                }
               ?>

               <?php
                if($totalRows_cultivosInvierno>0 ||  $totalRows_cultivos_noInv>0){
                   echo "<th colspan ='";  echo ($totalRows_cultivosInvierno+$totalRows_cultivos_noInv) ; echo "' >INVIERNO</th>";
                }
               ?>


          </tr>



        <tr class="tableizer-firstrow">
            <th  rowspan="2"> Evaluación directriz Técnica Generalx</th>
            <th  rowspan="2" > Evaluación directriz Técnica Especifica</th>

              <?php //echo "total cult=".$totalRows_cultivos;
                if($totalRows_cultivosVerano>0){
                 //   echo "<th rowspan ='2'> CULTIVOS COMPROMETIDOS</th>";
                   echo "<th colspan ='";  echo $totalRows_cultivosVerano ; echo "' >CULTIVOS COMPROMETIDOS</th>";
                }
               ?>

                 <?php //echo "total cult=".$totalRows_cultivos;
                if($totalRows_cultivos_noVerano>0){
                 //   echo "<th rowspan ='2'>CULTIVOS NO COMPROMETIDOS</th>";
                   echo "<th colspan ='";  echo $totalRows_cultivos_noVerano ; echo "' >CULTIVOS NO COMPROMETIDOS</th>";
                }
               ?>


               <?php //echo "total cult=".$totalRows_cultivos;
                if($totalRows_cultivosInvierno>0){
                 //   echo "<th rowspan ='2'> CULTIVOS COMPROMETIDOS</th>";
                   echo "<th colspan ='";  echo $totalRows_cultivosInvierno ; echo "' >CULTIVOS COMPROMETIDOS</th>";
                }
               ?>

             <?php //echo "total cult=".$totalRows_cultivos;
                if($totalRows_cultivos_noInv>0){
                 //   echo "<th rowspan ='2'>CULTIVOS NO COMPROMETIDOS</th>";
                   echo "<th colspan ='";  echo $totalRows_cultivos_noInv ; echo "' >CULTIVOS NO COMPROMETIDOS</th>";
                }
               ?>





        </tr>



        <tr >


          <?php

                while ( $row_cultivos2=pg_fetch_assoc($rcia_cultivos2)){

                 echo " <th> "; echo $row_cultivos2["nombrecultivo"] ; echo " </th> ";
                } ?>

          <?php

                while ( $row_cultivos2_no=pg_fetch_assoc($rcia_cultivos2_no)){

                 echo " <th> "; echo $row_cultivos2_no["nombrecultivo"] ; echo " </th> ";
                } ?>

           <?php

                while ( $row_cultivos1_inv=pg_fetch_assoc($rcia_cultivos1_inv)){

                 echo " <th> "; echo $row_cultivos1_inv["nombrecultivo"] ; echo " </th> ";

                } ?>

           <?php

                while ( $row_cultivos2_noINv=pg_fetch_assoc($rcia_cultivos2_noInv)){

                 echo " <th> "; echo $row_cultivos2_noINv["nombrecultivo"] ; echo " </th> ";
                } ?>





        </tr>
      </thead>


      <tbody style="text-align:center;">




                     <tr><td rowspan = "4">Superficie de siembra comprometida en el área deforestada sin autorización por cultivos estratégicos de acuerdo a programación (ha) </td>

                     <td>Documento de comercialización de la producción  </td> <td>30</td>

                    <?php
                        $icult=1;
                        while ( $icult<=$totalRows_cultivosVerano){
                            $row_c1=pg_fetch_assoc($cultivos1);
                            $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava1." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=1 and campania='verano'";
                            $res_cultivo1= pg_query($cn,$sql_cultivo1);

                            $res_cultivo1r="";
                            if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
                            //echo "consuta1=".$sql_cultivo1;
                         ?>
                     <td><input <?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75  ){echo "  readonly "; }  ?> name="doccomer<?php echo $icult; ?>"   id="doccomer<?php echo $icult; ?>" type="text" class="boxBusqueda4" value="<?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81  || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75  ){echo 30; }else{echo  $res_cultivo1r["puntuacioncultivo"];} ?>" onKeyUp="extractNumber(this,0,false);  promediar1(this,30); promediarverano(this,30,<?php echo $icult; ?>);" onKeyPress="return blockNonNumbers(this, event, true, false);  "    > </td>
                    <?php
                    $icult++; } ?>

                        <?php
                        $icult1_no=1;
                        while ( $icult1_no<=$totalRows_cultivos_noVerano){
                            $row_c1=pg_fetch_assoc($cultivos1_no);
                            $sql_cultivo1_no=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava1." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=0 and campania='verano'";
                           // echo "consuta si2=".$sql_cultivo1_no;
                            $ressql_cultivo1= pg_query($cn,$sql_cultivo1_no);
                               $res_cultivo1r_no="";
                            if($res_cultivo1r_no=pg_fetch_assoc($ressql_cultivo1)){}else{$res_cultivo1r_no="";}
                           // echo "consuta1=".$sql_cultivo1_no." fech=".$res_cultivo1r_no[0];
                         ?>
                        <td><input <?php if($res_cultivo1r_no["idcultivo"]==75 || $res_cultivo1r_no["idcultivo"]==81  || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75 ){echo "  readonly "; }  ?>  name="doccomer<?php echo $icult1_no."_no"; ?>" id="doccomer<?php echo $icult1_no."_no"; ?>" type="text" class="boxBusqueda4" value="<?php if($res_cultivo1r_no["idcultivo"]==75 || $res_cultivo1r_no["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75 ){echo 30; }else{ if(isset($res_cultivo1r_no["puntuacioncultivo"])){echo  $res_cultivo1r_no["puntuacioncultivo"];} } ?>" onKeyUp="extractNumber(this,0,false); promediar1(this,30);  promediarverano_no(this,30,<?php echo $icult1_no; ?>); " onKeyPress="return blockNonNumbers(this, event, true, false);  "    > </td>

                    <?php
                    $icult1_no++; } ?>



                    <?php
                        $icult=1;

                        while ( $icult<=$totalRows_cultivosInvierno){
                            $row_c1=pg_fetch_assoc($cultivos1_inv);
                            $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava1." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=1 and campania='invierno'";
                            $res_cultivo1_inv= pg_query($cn,$sql_cultivo1);
                               $res_cultivo1r="";
                            if($res_cultivo1r=pg_fetch_assoc($res_cultivo1_inv)){}else{$res_cultivo1r="";}
                            // echo "consuta1=".$sql_cultivo1;
                            ?>
                           <td><input name="doccomer_inv<?php echo $icult; ?>" id="doccomer_inv<?php echo $icult; ?>" type="text" class="boxBusqueda4" value="<?php echo  $res_cultivo1r["puntuacioncultivo"]; ?>" onKeyUp="extractNumber(this,0,false); promediar1(this,30);  promediarInvierno(this,30,<?php echo $icult; ?>);" onKeyPress="return blockNonNumbers(this, event, true, false);  "    > </td>

                 <?php
                    $icult++; } ?>




                    <?php
                        $icult1_no=1;
                        while ( $icult1_no<=$totalRows_cultivos_noInv){
                            $row_c1=pg_fetch_assoc($cultivos1_noInv);
                            $sql_cultivo1_no=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava1." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=0 and campania='invierno'";
                           // echo "consuta si2=".$sql_cultivo1_no;
                            $ressql_cultivo1= pg_query($cn,$sql_cultivo1_no);
                               $res_cultivo1r_no="";
                            if($res_cultivo1r_no=pg_fetch_assoc($ressql_cultivo1)){}else{$res_cultivo1r_no="";}
                             //echo "consuta1=".$sql_cultivo1_no;
                         ?>
                        <td><input  <?php if($res_cultivo1r_no["idcultivo"]==75 || $res_cultivo1r_no["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75   ){echo "  readonly "; }  ?>  name="doccomer_no_inv<?php echo $icult1_no."_no"; ?>" id="doccomer_no_inv<?php echo $icult1_no."_no"; ?>" type="text" class="boxBusqueda4" value="<?php if($res_cultivo1r_no["idcultivo"]==75 || $res_cultivo1r_no["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75 ){echo 30; }else{ if(isset($res_cultivo1r_no["puntuacioncultivo"])){echo  $res_cultivo1r_no["puntuacioncultivo"];}}  ?>" onKeyUp="extractNumber(this,0,false); promediar1(this,30); promediarInvierno_no(this,30,<?php echo $icult1_no; ?>); " onKeyPress="return blockNonNumbers(this, event, true, false);  "    > </td>

                    <?php
                    $icult1_no++; } ?>




                   </tr>

                   <tr><td>Compra de semilla certificada </td><td>20</td>
                           <?php
                        $icult=1;
                        while ( $icult<=$totalRows_cultivosVerano){
                            $row_c1=pg_fetch_assoc($cultivos2);
                            $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava2." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=1 and campania='verano'";
                           // echo "consuta si2=".$sql_cultivo1;
                            $res_cultivo1= pg_query($cn,$sql_cultivo1);
                            $res_cultivo1r="";
                            if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}

                        ?>
                          <td><input name="compSemilla<?php echo $icult; ?>" id="compSemilla<?php echo $icult; ?>" type="text" class="boxBusqueda4" value="<?php if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];}  ?>"  onKeyUp="extractNumber(this,0,false); promediar2(this,20); promediarverano(this,30,<?php echo $icult; ?>);"  onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
                    <?php
                    $icult++; } ?>


                     <?php
                        $icult=1;
                        while ( $icult<=$totalRows_cultivos_noVerano){
                            $row_c1=pg_fetch_assoc($cultivos2_no);
                            $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava2." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=0 and campania='verano'";
                          //  echo "consuta si2=".$sql_cultivo1;
                            $res_cultivo2_no= pg_query($cn,$sql_cultivo1);
                            $res_cultivo1r="";
                            if($res_cultivo1r=pg_fetch_assoc($res_cultivo2_no)){}else{$res_cultivo1r="";}
                            //echo " row0=".$res_cultivo1r[0];

                        ?>
                          <td><input <?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75  ){echo "  readonly "; }  ?>  name="compSemilla<?php echo $icult."_no"; ?>" id="compSemilla<?php echo $icult."_no"; ?>" type="text" class="boxBusqueda4" value="<?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75 ){echo 20; }else{  if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];} } ?>"  onKeyUp="extractNumber(this,0,false); promediar2(this,20); promediarverano_no(this,30,<?php echo $icult; ?>); " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
                    <?php
                    $icult++; } ?>





                          <?php
                        $icult=1;
                        while ( $icult<=$totalRows_cultivosInvierno){
                            $row_c1=pg_fetch_assoc($cultivos2_inv);
                            $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava2." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=1 and campania='invierno'";
                           // echo "consuta si2=".$sql_cultivo1;
                            $res_cultivo1= pg_query($cn,$sql_cultivo1);
                            $res_cultivo1r="";
                            if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}

                        ?>
                          <td><input name="compSemilla_inv<?php echo $icult; ?>" id="compSemilla_inv<?php echo $icult; ?>" type="text" class="boxBusqueda4" value="<?php if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];}  ?>"  onKeyUp="extractNumber(this,0,false); promediar2(this,20); promediarInvierno(this,30,<?php echo $icult; ?>); " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
                    <?php
                    $icult++; } ?>


                     <?php
                        $icult=1;
                        while ( $icult<=$totalRows_cultivos_noInv){
                            $row_c1=pg_fetch_assoc($cultivos2_noInv);
                            $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava2." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=0 and campania='invierno'";
                          //  echo "consuta si2=".$sql_cultivo1;
                            $res_cultivo2_no= pg_query($cn,$sql_cultivo1);
                            $res_cultivo1r="";
                            if($res_cultivo1r=pg_fetch_assoc($res_cultivo2_no)){}else{$res_cultivo1r="";}
                            //echo " row0=".$res_cultivo1r[0];

                        ?>
                          <td><input <?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75  ){echo "  readonly "; }  ?> name="compSemilla_no_inv<?php echo $icult."_no"; ?>" id="compSemilla_no_inv<?php echo $icult."_no"; ?>" type="text" class="boxBusqueda4" value="<?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75  ){echo 20; }else{  if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];}}  ?>"  onKeyUp="extractNumber(this,0,false); promediar2(this,20);promediarInvierno_no(this,30,<?php echo $icult; ?>);  " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
                    <?php
                    $icult++; } ?>





                   </tr>

                   <tr><td>Adquisición de insumos</td><td>15</td>
                     <?php
                        $icult=1;
                        while ( $icult<=$totalRows_cultivosVerano){
                            $row_c1=pg_fetch_assoc($cultivos3);
                            $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava3." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=1 and campania='verano'";
                            $res_cultivo1= pg_query($cn,$sql_cultivo1);
                            $res_cultivo1r=pg_fetch_assoc($res_cultivo1);
                        ?>
                       <td><input name="adquInsumo<?php echo $icult; ?>" id="adquInsumo<?php echo $icult; ?>" type="text" class="boxBusqueda4" value="<?php if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];}  ?>"  onKeyUp="extractNumber(this,0,false); promediar3(this,15);promediarverano(this,30,<?php echo $icult; ?>); " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
                    <?php
                    $icult++; } ?>


                     <?php
                        $icult=1;
                        while ( $icult<=$totalRows_cultivos_noVerano){
                            $row_c1=pg_fetch_assoc($cultivos3_no);
                            $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava3." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=0 and campania='verano'";
                            $res_cultivo1= pg_query($cn,$sql_cultivo1);
                            $res_cultivo1r=pg_fetch_assoc($res_cultivo1);
                        ?>
                       <td><input  <?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75 ){echo "  readonly "; }  ?> name="adquInsumo<?php echo $icult."_no"; ?>" id="adquInsumo<?php echo $icult."_no"; ?>" type="text" class="boxBusqueda4" value="<?php  if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75  ){echo 15; }else{ if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];}}  ?>"  onKeyUp="extractNumber(this,0,false); promediar3(this,15); promediarverano_no(this,30,<?php echo $icult; ?>);  " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
                    <?php
                    $icult++; } ?>



                    <?php
                        $icult=1;
                        while ( $icult<=$totalRows_cultivosInvierno){
                            $row_c1=pg_fetch_assoc($cultivos3_inv);
                            $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava3." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=1 and campania='invierno'";
                            $res_cultivo1= pg_query($cn,$sql_cultivo1);
                            $res_cultivo1r=pg_fetch_assoc($res_cultivo1);
                        ?>
                          <td><input name="adquInsumo_inv<?php echo $icult; ?>" id="adquInsumo_inv<?php echo $icult; ?>" type="text" class="boxBusqueda4" value="<?php if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];}  ?>"  onKeyUp="extractNumber(this,0,false); promediar3(this,15);promediarInvierno(this,30,<?php echo $icult; ?>); " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
                    <?php
                    $icult++; } ?>


                     <?php
                        $icult=1;
                        while ( $icult<=$totalRows_cultivos_noInv){
                            $row_c1=pg_fetch_assoc($cultivos3_noInv);
                            $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava3." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=0 and campania='invierno'";
                            $res_cultivo1= pg_query($cn,$sql_cultivo1);
                            $res_cultivo1r=pg_fetch_assoc($res_cultivo1);
                        ?>
                          <td><input <?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75  ){echo "  readonly "; }  ?>  name="adquInsumo_no_inv<?php echo $icult."_no"; ?>" id="adquInsumo_no_inv<?php echo $icult."_no"; ?>" type="text" class="boxBusqueda4" value="<?php  if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75 ){echo 15; }else{ if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];} } ?>"  onKeyUp="extractNumber(this,0,false); promediar3(this,15);promediarInvierno_no(this,30,<?php echo $icult; ?>); " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
                    <?php
                    $icult++; } ?>





                    </tr>

                   <tr><td> Combustibles y lubricantes</td><td>5</td>

                    <?php
                        $icult=1;
                        while ( $icult<=$totalRows_cultivosVerano){
                            $row_c1=pg_fetch_assoc($cultivos4);
                            $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava4." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=1 and campania='verano'";
                            $res_cultivo1= pg_query($cn,$sql_cultivo1);
                               $res_cultivo1r="";
                            if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
                           // echo "consuta1=".$sql_cultivo1;
                         ?>
                       <td><input <?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75 ){echo "  readonly "; }  ?>  name="combusible<?php echo $icult; ?>" id="combusible<?php echo $icult; ?>" type="text" class="boxBusqueda4"  value="<?php  if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75  ){echo 5; }else{ if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];} } ?>" onKeyUp="extractNumber(this,0,false); promediar4(this,5);promediarverano(this,30,<?php echo $icult; ?>); " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
                    <?php
                    $icult++; } ?>



                     <?php
                        $icult=1;
                        while ( $icult<=$totalRows_cultivos_noVerano){
                            $row_c1=pg_fetch_assoc($cultivos4_no);
                            $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava4." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=0 and campania='verano'";
                            $res_cultivo1= pg_query($cn,$sql_cultivo1);
                               $res_cultivo1r="";
                            if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
                           // echo "consuta1=".$sql_cultivo1;
                         ?>
                       <td><input <?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75 ){echo "  readonly "; }  ?> name="combusible<?php echo $icult."_no"; ?>" id="combusible<?php echo $icult."_no"; ?>" type="text" class="boxBusqueda4"  value="<?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75 ){echo 5; }else{ if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];}}  ?>" onKeyUp="extractNumber(this,0,false); promediar4(this,5);promediarverano_no(this,30,<?php echo $icult; ?>); " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
                    <?php
                    $icult++; } ?>



                     <?php
                        $icult=1;
                        while ( $icult<=$totalRows_cultivosInvierno){
                            $row_c1=pg_fetch_assoc($cultivos4_inv);
                            $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava4." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=1 and campania='invierno'";
                            $res_cultivo1= pg_query($cn,$sql_cultivo1);
                               $res_cultivo1r="";
                            if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
                           // echo "consuta1=".$sql_cultivo1;
                         ?>
                          <td><input    <?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75 ){echo "  readonly "; }  ?>  name="combusible_inv<?php echo $icult; ?>" id="combusible_inv<?php echo $icult; ?>" type="text" class="boxBusqueda4"  value="<?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75  ){echo 5; }else{  if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];}}  ?>" onKeyUp="extractNumber(this,0,false); promediar4(this,5);promediarInvierno(this,30,<?php echo $icult; ?>); " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
                    <?php
                    $icult++; } ?>



                     <?php
                        $icult=1;
                        while ( $icult<=$totalRows_cultivos_noInv){
                            $row_c1=pg_fetch_assoc($cultivos4_noInv);
                            $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava4." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=0 and campania='invierno'";
                            $res_cultivo1= pg_query($cn,$sql_cultivo1);
                               $res_cultivo1r="";
                            if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
                           // echo "consuta1=".$sql_cultivo1;
                         ?>
                          <td><input <?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75  ){echo "  readonly "; }  ?> name="combusible_no_inv<?php echo $icult."_no"; ?>" id="combusible_no_inv<?php echo $icult."_no"; ?>" type="text" class="boxBusqueda4"  value="<?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75 ){echo 5; }else{  if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];} } ?>" onKeyUp="extractNumber(this,0,false); promediar4(this,5);promediarInvierno_no(this,30,<?php echo $icult; ?>); " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
                    <?php
                    $icult++; } ?>




                   </tr>






       <tr><td rowspan = "2">Aplicación de técnicas y tecnologías sostenibles: - Siembra directa.   -Rotacion de Cultivos</td><td>Compra de semilla certificada y/o, venta de producto (que demuestren rotación de cultivo)</td><td>15</td>

        <?php
            $icult=1;
            while ( $icult<=$totalRows_cultivosVerano){
                $row_c1=pg_fetch_assoc($cultivos5);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava5." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=1 and campania='verano'";
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                   $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
               // echo "consuta1=".$sql_cultivo1;
             ?>
           <td><input  <?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75 ){echo "  readonly "; }  ?>  name="aplicacion<?php echo $icult; ?>" id="aplicacion<?php echo $icult; ?>" type="text" class="boxBusqueda4" value="<?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75  ){echo 15; }else{  if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];} } ?>" onKeyUp="extractNumber(this,0,false); promediar5(this,15); promediarverano(this,30,<?php echo $icult; ?>);  " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
        <?php
        $icult++; } ?>


                <?php
            $icult=1;
            while ( $icult<=$totalRows_cultivos_noVerano){
                $row_c1=pg_fetch_assoc($cultivos5_no);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava5." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=0 and campania='verano'";
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                   $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
               // echo "consuta1=".$sql_cultivo1;
             ?>
           <td><input  <?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75 ){echo "  readonly "; }  ?>   name="aplicacion<?php echo $icult."_no"; ?>" id="aplicacion<?php echo $icult."_no"; ?>" type="text" class="boxBusqueda4" value="<?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75 ){echo 15; }else{  if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];}}  ?>" onKeyUp="extractNumber(this,0,false); promediar5(this,15); promediarverano_no(this,30,<?php echo $icult; ?>); " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
        <?php
        $icult++; } ?>



         <?php
            $icult=1;
            while ( $icult<=$totalRows_cultivosInvierno){
                $row_c1=pg_fetch_assoc($cultivos5_inv);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava5." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=1 and campania='invierno'";
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                   $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
               // echo "consuta1=".$sql_cultivo1;
             ?>
              <td><input  <?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75 ){echo "  readonly "; }  ?>  name="aplicacion_inv<?php echo $icult; ?>" id="aplicacion_inv<?php echo $icult; ?>" type="text" class="boxBusqueda4" value="<?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75 ){echo 15; }else{  if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];}}  ?>" onKeyUp="extractNumber(this,0,false); promediar5(this,15);promediarInvierno(this,30,<?php echo $icult; ?>);  " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
        <?php
        $icult++; } ?>


                <?php
            $icult=1;
            while ( $icult<=$totalRows_cultivos_noInv){
                $row_c1=pg_fetch_assoc($cultivos5_noInv);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava5." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=0 and campania='invierno'";
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                   $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
               // echo "consuta1=".$sql_cultivo1;
             ?>
              <td><input <?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75  ){echo "  readonly "; }  ?>  name="aplicacion_no_inv<?php echo $icult."_no"; ?>" id="aplicacion_no_inv<?php echo $icult."_no"; ?>" type="text" class="boxBusqueda4" value="<?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75  ){echo 15; }else{  if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];}}  ?>" onKeyUp="extractNumber(this,0,false); promediar5(this,15);promediarInvierno_no(this,30,<?php echo $icult; ?>);  " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
        <?php
        $icult++; } ?>





        </tr>

       <tr><td>Compra y/o alquiler de maquinaria y herramientas de siembra directa y/o insumos que demuestre siembra directa</td><td>15</td>

       <?php
            $icult=1;
            while ( $icult<=$totalRows_cultivosVerano){
                $row_c1=pg_fetch_assoc($cultivos6);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava6." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=1 and campania='verano'";
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                   $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
               // echo "consuta1=".$sql_cultivo1;
             ?>
           <td><input  <?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75 ){echo "  readonly "; }  ?>  name="maqHerra<?php echo $icult; ?>" id="maqHerra<?php echo $icult; ?>" type="text" class="boxBusqueda4" value="<?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75 ){echo 15; }else{  if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];}}  ?>" onKeyUp="extractNumber(this,0,false); promediar6(this,15); promediarverano(this,30,<?php echo $icult; ?>); " onKeyUp="extractNumber(this,0,false); " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
        <?php
        $icult++; } ?>


        <?php
        $icult=1;
        while ( $icult<=$totalRows_cultivos_noVerano){
                $row_c1=pg_fetch_assoc($cultivos6_no);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava6." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=0 and campania='verano'";
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                   $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
               // echo "consuta1=".$sql_cultivo1;
             ?>
        <td><input  <?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75 ){echo "  readonly "; }  ?>   name="maqHerra<?php echo $icult."_no"; ?>" id="maqHerra<?php echo $icult."_no"; ?>" type="text" class="boxBusqueda4" value="<?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75 ){echo 15; }else{ if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];} } ?>" onKeyUp="extractNumber(this,0,false); promediar6(this,15); promediarverano_no(this,30,<?php echo $icult; ?>); " onKeyUp="extractNumber(this,0,false); " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
        <?php
        $icult++; } ?>




         <?php
            $icult=1;
            while ( $icult<=$totalRows_cultivosInvierno){
                $row_c1=pg_fetch_assoc($cultivos6_inv);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava6." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=1 and campania='invierno'";
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                   $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
               // echo "consuta1=".$sql_cultivo1;
             ?>
              <td><input  <?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75 ){echo "  readonly "; }  ?>  name="maqHerra_inv<?php echo $icult; ?>" id="maqHerra_inv<?php echo $icult; ?>" type="text" class="boxBusqueda4" value="<?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75 ){echo 15; }else{  if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];}}  ?>" onKeyUp="extractNumber(this,0,false); promediar6(this,15); promediarInvierno(this,30,<?php echo $icult; ?>); " onKeyUp="extractNumber(this,0,false); " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
        <?php
        $icult++; } ?>


        <?php
        $icult=1;
        while ( $icult<=$totalRows_cultivos_noInv){
                $row_c1=pg_fetch_assoc($cultivos6_noInv);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava6." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=0 and campania='invierno'";
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                   $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
               // echo "consuta1=".$sql_cultivo1;
             ?>
              <td><input <?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75 ){echo "  readonly "; }  ?> name="maqHerra_no_inv<?php echo $icult."_no"; ?>" id="maqHerra_no_inv<?php echo $icult."_no"; ?>" type="text" class="boxBusqueda4" value="<?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75 ){echo 15; }else{ if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];}}  ?>" onKeyUp="extractNumber(this,0,false); promediar6(this,15);promediarInvierno_no(this,30,<?php echo $icult; ?>);  " onKeyUp="extractNumber(this,0,false); " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
        <?php
        $icult++; } ?>





       </tr>

       <tr><td  >Uso de abonos e insumos ecológicos. (*)</td> <td>Adquisición de insumos ecológicos</td><td>5</td>

       <?php
            $icult=1;
            while ( $icult<=$totalRows_cultivosVerano){
                $row_c1=pg_fetch_assoc($cultivos7);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava7." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=1 and campania='verano'";
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                   $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
               // echo "consuta1=".$sql_cultivo1;
             ?>
           <td><input  <?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75 ){echo "  readonly "; }  ?>  name="abonoIns<?php echo $icult; ?>" id="abonoIns<?php echo $icult; ?>" type="text" class="boxBusqueda4" value="<?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75 ){echo 5; }else{if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];}}  ?>"  onKeyUp="extractNumber(this,0,false); promediar7(this,5);  promediarverano(this,30,<?php echo $icult; ?>);  " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
        <?php
        $icult++; } ?>


        <?php
         $icult=1;
         while ( $icult<=$totalRows_cultivos_noVerano){
                $row_c1=pg_fetch_assoc($cultivos7_no);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava7." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=0 and campania='verano'";
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                   $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
               // echo "consuta1=".$sql_cultivo1;
             ?>
           <td><input   <?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75 ){echo "  readonly "; }  ?>  name="abonoIns<?php echo $icult."_no"; ?>" id="abonoIns<?php echo $icult."_no"; ?>" type="text" class="boxBusqueda4" value="<?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75 ){echo 0; }else{if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];}}  ?>"  onKeyUp="extractNumber(this,0,false); promediar7(this,5); promediarverano_no(this,30,<?php echo $icult; ?>);  " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
        <?php
        $icult++; } ?>



              <?php
            $icult=1;
            while ( $icult<=$totalRows_cultivosInvierno){
                $row_c1=pg_fetch_assoc($cultivos7_inv);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava7." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=1 and campania='invierno'";
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                   $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
               // echo "consuta1=".$sql_cultivo1;
             ?>
              <td><input name="abonoIns_inv<?php echo $icult; ?>" id="abonoIns_inv<?php echo $icult; ?>" type="text" class="boxBusqueda4" value="<?php if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];}  ?>"  onKeyUp="extractNumber(this,0,false); promediar7(this,5);  promediarInvierno(this,30,<?php echo $icult; ?>); " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
        <?php
        $icult++; } ?>


        <?php
         $icult=1;
         while ( $icult<=$totalRows_cultivos_noInv){
                $row_c1=pg_fetch_assoc($cultivos7_noInv);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava7." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=0 and campania='invierno'";
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                   $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
               // echo "consuta1=".$sql_cultivo1;
             ?>
              <td><input  <?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75 ){echo "  readonly "; }  ?>   name="abonoIns_no_inv<?php echo $icult."_no"; ?>" id="abonoIns_no_inv<?php echo $icult."_no"; ?>" type="text" class="boxBusqueda4" value="<?php if($res_cultivo1r["idcultivo"]==75 || $res_cultivo1r["idcultivo"]==81 || $row_c1["idcultivo"]==81 || $row_c1["idcultivo"]==75 ){echo 0; }else{ if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];}}  ?>"  onKeyUp="extractNumber(this,0,false); promediar7(this,5); promediarInvierno_no(this,30,<?php echo $icult; ?>);  " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
        <?php
        $icult++; } ?>



       </tr>

       <tr style="font-size: 9pt; font-weight: bold;" ><td colspan = "3">PONDERACION FINAL (%)</td>

            <?php
            $icult=1;
            while ( $icult<=$totalRows_cultivosVerano){
                $row_c1=pg_fetch_assoc($cultivostotal);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava7." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=1 and campania='verano'";
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                   $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
               // echo "consuta1=".$sql_cultivo1;
             ?>
              <td  > <input style="background-color: #fff; font-size: 9pt; font-weight: bold;    text-align:center; " type='text'  readonly='true'   name="totalc<?php echo $icult; ?>" id="totalc<?php echo $icult; ?>"   class="boxBusqueda4"      ></td>
        <?php
        $icult++; } ?>

         <?php
            $icult=1;
            while ( $icult<=$totalRows_cultivos_noVerano){
                $row_c1=pg_fetch_assoc($cultivosTotal_no);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava7." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=1 and campania='verano'";
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                   $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
               // echo "consuta1=".$sql_cultivo1;
             ?>
              <td  > <input style="background-color: #fff; font-size: 9pt; font-weight: bold;   text-align:center; " readonly='true' name="totalnoc<?php echo $icult; ?>" id="totalnoc<?php echo $icult; ?>"  class="boxBusqueda4"     ></td>
        <?php
        $icult++; } ?>


         <?php
            $icult=1;
            while ( $icult<=$totalRows_cultivosInvierno){
                $row_c1=pg_fetch_assoc($cultivosTotal_inv);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava7." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=1 and campania='invierno'";
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                   $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
               // echo "consuta1=".$sql_cultivo1;
             ?>
              <td > <input style="background-color: #fff; font-size: 9pt; font-weight: bold;  text-align:center; " readonly='true' name="totalInv<?php echo $icult; ?>" id="totalInv<?php echo $icult; ?>"   class="boxBusqueda4"     ></td>
        <?php
        $icult++; } ?>


            <?php
         $icult=1;
         while ( $icult<=$totalRows_cultivos_noInv){
                $row_c1=pg_fetch_assoc($cultivosTotal_noInv);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava7." and d.idcultivo = ".$row_c1["idcultivo"]." and compromiso=0 and campania='invierno'";
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                   $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
               // echo "consuta1=".$sql_cultivo1;
             ?>
              <td > <input style="background-color: #fff; font-size: 9pt; font-weight: bold;  text-align:center; " readonly='true'  name="totalInvNo<?php echo $icult ; ?>" id="totalInvNo<?php echo $icult ; ?>"   class="boxBusqueda4"   ></td>
        <?php
        $icult++; } ?>




       </tr>

        <tr>
            <td  style=" font-weight: bold;" colspan = "3">TOTAL GENERAL (%)</td>
            <td style=" font-weight: bold;"  style="font-size: 16dp; font-weight: bold;" id="totalgeneral_eval" name="totalgeneral_eval" colspan = "20">55</td>
        </tr>
      </tbody>

    </table>






     <?php
         //***************************************FINNNNNNNNNNNNNNNNNNNNNNNNN MEDIANA EMPREASRIAL************************************************************************
        //***************************************************************************************************************

        }
       ?>



		</td>
	</tr>




</table>


<table>

    <tr>
      <input id="guardarAnalisisdocAgricorcia" class="boton verde formaBoton" type="submit" value="Guardar" name="guardarAnalisisdocAgricorcia" >
    </tr>

    <tr>
        <a></a>
    </tr>


    <tr>
      <form action="evaluacion_agricola_rcia.php" method="post" name="form" >
       <input name='Imprimir' type='submit' class='boton verde formaBoton' id='Imprimir' value='Imprimir Evaluacion'>
       <input id="anoact" type="hidden" value="<?php echo $_POST['anhoActivo_'];?>" name="anoact">
       <input id="reg" type="hidden" value="<?php echo $_SESSION['idreg'];?>" name="reg">
       <input id="monit" type="hidden" value="<?php echo $monit;?>" name="monit">
      </form>
    </tr>

</table>




<input type="hidden" name="MM_insert" value="formevaluacionrcia" />
<input id="conteoC" type="hidden" value="<?php echo $ct;?>" name="conteoC">
<input id="anhoActivo" type="hidden" value="<?php if(isset($_POST['anhoActivo_']) && ($_POST['anhoActivo_']>0)){echo $_POST['anhoActivo_']; }else{echo "0";} ?> " name="anhoActivo">
<input id="anhoActivo2" type="hidden" value="<?php if(isset($_POST['anhoActivo2_']) ){echo $_POST['anhoActivo2_']; }else{echo "0";} ?> " name="anhoActivo2">
<input id="totalCultivo" type="hidden" value="<?php echo $totalRows_cultivosVerano;?>" name="totalCultivo">
<input id="totalCultivo_no" type="hidden" value="<?php echo $totalRows_cultivos_noVerano;?>" name="totalCultivo_no">

</form>


<div style="height:20px;" ></div>



</div>






<script language="javascript" type="text/javascript">



 function sumarcolumna( indice) {
     //alert(indice);
    //alert('valor='+obj.value+'  - parametro='+param);

    suma1=0;

      /*if(document.getElementById('doccomer'+indice).value.length>0){
          suma1=suma1+parseInt(document.getElementById('doccomer'+indice).value);
      }
      if(document.getElementById('compSemilla'+indice).value.length>0){
          suma1=suma1+parseInt(document.getElementById('compSemilla'+indice).value);
      }
      if(document.getElementById('adquInsumo'+indice).value.length>0){
          suma1=suma1+parseInt(document.getElementById('adquInsumo'+indice).value);
      }
      if(document.getElementById('combusible'+indice).value.length>0){
          suma1=suma1+parseInt(document.getElementById('combusible'+indice).value);
      }
      if(document.getElementById('aplicacion'+indice).value.length>0){
          suma1=suma1+parseInt(document.getElementById('aplicacion'+indice).value);
      }
      if(document.getElementById('maqHerra'+indice).value.length>0){
          suma1=suma1+parseInt(document.getElementById('maqHerra'+indice).value);
      }
      if(document.getElementById('abonoIns'+indice).value.length>0){
          suma1=suma1+parseInt(document.getElementById('abonoIns'+indice).value);
      }

      document.getElementById('totalc'+indice).innerHTML=suma1; */

}





 function promediarverano_no(obj,param,indice) {


    suma1=0;
       tipopredio=0;
    // alert(document.getElementById('idtipoPredio').value);
    tipopredio=document.getElementById('idtipoPredio').value;
    if(tipopredio==37 ||tipopredio==38 ){  //if(true) // if(true ){ //pequeña y comindad
        if(document.getElementById('doccomer'+indice+'_no').value.length>0){
          suma1=suma1+parseInt(document.getElementById('doccomer'+indice+'_no').value);
      }

      if(document.getElementById('aplicacion'+indice+'_no').value.length>0){
          suma1=suma1+parseInt(document.getElementById('aplicacion'+indice+'_no').value);
      }
      if(document.getElementById('maqHerra'+indice+'_no').value.length>0){
          suma1=suma1+parseInt(document.getElementById('maqHerra'+indice+'_no').value);
      }
      if(document.getElementById('abonoIns'+indice+'_no').value.length>0){
          suma1=suma1+parseInt(document.getElementById('abonoIns'+indice+'_no').value);
      }

    }else{

        if(document.getElementById('doccomer'+indice+'_no').value.length>0){
          suma1=suma1+parseInt(document.getElementById('doccomer'+indice+'_no').value);
      }
      if(document.getElementById('compSemilla'+indice+'_no').value.length>0){
          suma1=suma1+parseInt(document.getElementById('compSemilla'+indice+'_no').value);
      }
      if(document.getElementById('adquInsumo'+indice+'_no').value.length>0){
          suma1=suma1+parseInt(document.getElementById('adquInsumo'+indice+'_no').value);
      }
      if(document.getElementById('combusible'+indice+'_no').value.length>0){
          suma1=suma1+parseInt(document.getElementById('combusible'+indice+'_no').value);
      }
      if(document.getElementById('aplicacion'+indice+'_no').value.length>0){
          suma1=suma1+parseInt(document.getElementById('aplicacion'+indice+'_no').value);
      }
      if(document.getElementById('maqHerra'+indice+'_no').value.length>0){
          suma1=suma1+parseInt(document.getElementById('maqHerra'+indice+'_no').value);
      }
      if(document.getElementById('abonoIns'+indice+'_no').value.length>0){
          suma1=suma1+parseInt(document.getElementById('abonoIns'+indice+'_no').value);
      }


    }

      document.getElementById('totalnoc'+indice).value=suma1;


   sumarTodasColumnas();
}

 function promediarverano(obj,param,indice) {

 // alert('aaaa');
    suma1=0;

         // alert(document.getElementById('idtipoPredio').value);
    tipopredio=document.getElementById('idtipoPredio').value;
    if(tipopredio==37 ||tipopredio==38 ){  //pequeña y comindad//if(tipopredio==37 ||tipopredio==38 ){ //pequeña y comindad

          if(document.getElementById('doccomer'+indice).value.length>0){
                suma1=suma1+parseInt(document.getElementById('doccomer'+indice).value);
            }

            if(document.getElementById('aplicacion'+indice).value.length>0){
                suma1=suma1+parseInt(document.getElementById('aplicacion'+indice).value);
            }
            if(document.getElementById('maqHerra'+indice).value.length>0){
                suma1=suma1+parseInt(document.getElementById('maqHerra'+indice).value);
            }
            if(document.getElementById('abonoIns'+indice).value.length>0){
                suma1=suma1+parseInt(document.getElementById('abonoIns'+indice).value);
            }


     }else{
            if(document.getElementById('doccomer'+indice).value.length>0){
            suma1=suma1+parseInt(document.getElementById('doccomer'+indice).value);
            }
            if(document.getElementById('compSemilla'+indice).value.length>0){
                suma1=suma1+parseInt(document.getElementById('compSemilla'+indice).value);
            }
            if(document.getElementById('adquInsumo'+indice).value.length>0){
                suma1=suma1+parseInt(document.getElementById('adquInsumo'+indice).value);
            }
            if(document.getElementById('combusible'+indice).value.length>0){
                suma1=suma1+parseInt(document.getElementById('combusible'+indice).value);
            }
            if(document.getElementById('aplicacion'+indice).value.length>0){
                suma1=suma1+parseInt(document.getElementById('aplicacion'+indice).value);
            }
            if(document.getElementById('maqHerra'+indice).value.length>0){
                suma1=suma1+parseInt(document.getElementById('maqHerra'+indice).value);
            }
            if(document.getElementById('abonoIns'+indice).value.length>0){
                suma1=suma1+parseInt(document.getElementById('abonoIns'+indice).value);
            }
     }



     // f=0;
   //  f=document.getElementById('porpon'+indice).innerHTML;
      //alert( suma1);
      //suma1
      document.getElementById('totalc'+indice).value=suma1;
     // alert(suma1);


    //  document.getElementById('totalc'+indice).innerHTML=suma1;

   sumarTodasColumnas();

}



 function promediarInvierno(obj,param,indice) {


    suma1=0;

        tipopredio=0;
    // alert(document.getElementById('idtipoPredio').value);
    tipopredio=document.getElementById('idtipoPredio').value;

    //---------------------------------------------------------------------------------//
    //---------------pequeña y comunidad------------------------------
   // alert('aaa');
    if(tipopredio==37 ||tipopredio==38 ){  //if(true)
         // if(true ){ //pequeña y comindad

          if(document.getElementById('doccomer_inv'+indice).value.length>0){
          suma1=suma1+parseInt(document.getElementById('doccomer_inv'+indice).value);
            }

            if(document.getElementById('aplicacion_inv'+indice).value.length>0){
                suma1=suma1+parseInt(document.getElementById('aplicacion_inv'+indice).value);
            }
            if(document.getElementById('maqHerra_inv'+indice).value.length>0){
                suma1=suma1+parseInt(document.getElementById('maqHerra_inv'+indice).value);
            }
            if(document.getElementById('abonoIns_inv'+indice).value.length>0){
                suma1=suma1+parseInt(document.getElementById('abonoIns_inv'+indice).value);
            }

     }else{

             if(document.getElementById('doccomer_inv'+indice).value.length>0){
          suma1=suma1+parseInt(document.getElementById('doccomer_inv'+indice).value);
            }
            if(document.getElementById('compSemilla_inv'+indice).value.length>0){
                suma1=suma1+parseInt(document.getElementById('compSemilla_inv'+indice).value);
            }
            if(document.getElementById('adquInsumo_inv'+indice).value.length>0){
                suma1=suma1+parseInt(document.getElementById('adquInsumo_inv'+indice).value);
            }
            if(document.getElementById('combusible_inv'+indice).value.length>0){
                suma1=suma1+parseInt(document.getElementById('combusible_inv'+indice).value);
            }
            if(document.getElementById('aplicacion_inv'+indice).value.length>0){
                suma1=suma1+parseInt(document.getElementById('aplicacion_inv'+indice).value);
            }
            if(document.getElementById('maqHerra_inv'+indice).value.length>0){
                suma1=suma1+parseInt(document.getElementById('maqHerra_inv'+indice).value);
            }
            if(document.getElementById('abonoIns_inv'+indice).value.length>0){
                suma1=suma1+parseInt(document.getElementById('abonoIns_inv'+indice).value);
            }
     }


      document.getElementById('totalInv'+indice).value=suma1;

   sumarTodasColumnas();

}

 function promediarInvierno_no(obj,param,indice) {

    suma1=0;
         tipopredio=0;
    // alert(document.getElementById('idtipoPredio').value);
    tipopredio=document.getElementById('idtipoPredio').value;

    //---------------------------------------------------------------------------------//
    //---------------pequeña y comunidad------------------------------
   // alert('aaa');
    if(tipopredio==37 ||tipopredio==38 ){  //if(true)
        //if(true){ //pequeña y comindad
        if(document.getElementById('doccomer_no_inv'+indice+'_no').value.length>0){
          suma1=suma1+parseInt(document.getElementById('doccomer_no_inv'+indice+'_no').value);
        }

      if(document.getElementById('aplicacion_no_inv'+indice+'_no').value.length>0){
          suma1=suma1+parseInt(document.getElementById('aplicacion_no_inv'+indice+'_no').value);
      }
      if(document.getElementById('maqHerra_no_inv'+indice+'_no').value.length>0){
          suma1=suma1+parseInt(document.getElementById('maqHerra_no_inv'+indice+'_no').value);
      }
      if(document.getElementById('abonoIns_no_inv'+indice+'_no').value.length>0){
          suma1=suma1+parseInt(document.getElementById('abonoIns_no_inv'+indice+'_no').value);
      }
    }
    else{
        if(document.getElementById('doccomer_no_inv'+indice+'_no').value.length>0){
         suma1=suma1+parseInt(document.getElementById('doccomer_no_inv'+indice+'_no').value);
        }
         if(document.getElementById('compSemilla_no_inv'+indice+'_no').value.length>0){
            suma1=suma1+parseInt(document.getElementById('compSemilla_no_inv'+indice+'_no').value);
        }
        if(document.getElementById('adquInsumo_no_inv'+indice+'_no').value.length>0){
            suma1=suma1+parseInt(document.getElementById('adquInsumo_no_inv'+indice+'_no').value);
        }
        if(document.getElementById('combusible_no_inv'+indice+'_no').value.length>0){
            suma1=suma1+parseInt(document.getElementById('combusible_no_inv'+indice+'_no').value);
        }
        if(document.getElementById('aplicacion_no_inv'+indice+'_no').value.length>0){
            suma1=suma1+parseInt(document.getElementById('aplicacion_no_inv'+indice+'_no').value);
        }
        if(document.getElementById('maqHerra_no_inv'+indice+'_no').value.length>0){
            suma1=suma1+parseInt(document.getElementById('maqHerra_no_inv'+indice+'_no').value);
        }
        if(document.getElementById('abonoIns_no_inv'+indice+'_no').value.length>0){
            suma1=suma1+parseInt(document.getElementById('abonoIns_no_inv'+indice+'_no').value);
        }

    }


      document.getElementById('totalInvNo'+indice).value=suma1;

    sumarTodasColumnas();

}





 function promediar1(obj,param,indice) {
    //alert('valor='+obj.value+'  - parametro='+param);
    if(obj.value>param){
       alert('El valor tiene que ser Menor o igual a '+param);
       obj.value=param;

    }else{


        }


}


 function promediar2(obj,param) {
    //alert('valor='+obj.value+'  - parametro='+param);
    if(obj.value>param){
       alert('El valor tiene que ser Menor o igual a '+param);
       obj.value=param;

    }else{
        }

}


 function promediar3(obj,param) {
    //alert('valor='+obj.value+'  - parametro='+param);
    if(obj.value>param){
       alert('El valor tiene que ser Menor o igual a '+param);
       obj.value=param;

    }else{
        }


}


 function promediar4(obj,param) {
    //alert('valor='+obj.value+'  - parametro='+param);
    if(obj.value>param){
       alert('El valor tiene que ser Menor o igual a '+param);
       obj.value=param;

    }else{


        }

}


 function promediar5(obj,param,cantc) {
    //alert('valor='+obj.value+'  - parametro='+param);
    if(obj.value>param){
       alert('El valor tiene que ser Menor o igual a '+param);
       obj.value=param;

    }else{


        }


}


 function promediar6(obj,param) {
    //alert('valor='+obj.value+'  - parametro='+param);
    if(obj.value>param){
       alert('El valor tiene que ser Menor o igual a '+param);
       obj.value=param;

    }else{


        }

}


 function promediar7(obj,param) {
    //alert('valor='+obj.value+'  - parametro='+param);
    if(obj.value>param){
       alert('El valor tiene que ser Menor o igual a '+param);
       obj.value=param;

    }else{


        }


}




function numero(txt) {
    if (txt.value != '') {
    var b = /^[0-9\-]*$/;
    return b.test(txt);
    }
}


 function pestana_ganadero(){
     window.location.href="#tabs-3";
 }


function cambiarAnho(obj){
   // alert('aa:'+obj.getAttribute('ID') );
     document.getElementById('anhoActivo').value=obj.value;
     document.getElementById('anhoActivo2').value=obj.innerHTML;
       document.getElementById('anhoActivo_').value=obj.value;
     document.getElementById('anhoActivo2_').value=obj.innerHTML;

    //alert(obj.innerHTML);
   // alert(document.getElementById('anhoActivo').value);
    document.getElementById("form-evalganadrcia2").submit();
}

function establecer_anos(){
       //alert('entra aqui AGRICOLA');

    window.scrollBy(0, -1000);
        if(document.getElementById("idbtn1")){
            butt1 = document.getElementById("idbtn1");
            butt1.disabled = true;
        }

       if(document.getElementById("idbtn1_")){
           butt11 = document.getElementById("idbtn1_");
           butt11.disabled = true;
        }
        if(document.getElementById("idbtn2")){
            but2 = document.getElementById("idbtn2");
            but2.disabled = true;
         }
        if(document.getElementById("idbtn2_")){
            but22 = document.getElementById("idbtn2_");
            but22.disabled = true;
            }

        if(document.getElementById("idbtn3")){
                but3 = document.getElementById("idbtn3");
                but3.disabled = true;
         }
        if(document.getElementById("idbtn3_")){
            but33 = document.getElementById("idbtn3_");
            but33.disabled = true;
        }

        if(document.getElementById("idbtn4")){
                but4 = document.getElementById("idbtn4");
                but4.disabled = true;
        }
        if(document.getElementById("idbtn4_")){
                but44 = document.getElementById("idbtn4_");
                but44.disabled = true;
        }

        if(document.getElementById("idbtn5")){
            but5 = document.getElementById("idbtn5");
            but5.disabled = true;
        }
        if(document.getElementById("idbtn5_")){
                but55 = document.getElementById("idbtn5_");
            but55.disabled = true;
        }


    var idperiodo=document.getElementById('idperiodo').value;
        var parametros = {
            "tarea" : "establecerAnos"
        };
        $.ajax({
                data:  parametros,
                url:   'evaluacion_agricola_rcia_Ajax.php',
                type:  'post',
                beforeSend: function () {
                      //  $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response1) {
                   // alert('resp:'+response1);
                    response1 = response1.substring(0, response1.length - 1);
                    //alert(response1);
                    resultado1=response1.split("|");

                    for(i=0; i<resultado1.length;i++){
                         // alert(resultado1[i]);

                        if((resultado1[i]==1 && idperiodo==1) || (resultado1[i]==3 && idperiodo==2)){
                             if(document.getElementById("idbtn1")){
                                butt1 = document.getElementById("idbtn1");
                                butt1.disabled = false;
                                if(i==0 && document.getElementById('anhoActivo').value==0)  {
                                    document.getElementById('idbtn1').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345;padding: 8px 11px; ');
                                    document.getElementById('anhoActivo').value=resultado1[i];
                                    document.getElementById('anhoActivo_').value=resultado1[i];
                                }
                                document.getElementById('idbtn1').value=resultado1[i];
                            }
                            if(document.getElementById("idbtn1_")){
                                butt11 = document.getElementById("idbtn1_");
                                butt11.disabled = false;
                                 if(i==0 && document.getElementById('anhoActivo').value==0 )  {
                                   document.getElementById('idbtn1_').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345; padding: 8px 11px; ');
                                   document.getElementById('anhoActivo').value=resultado1[i];
                                   document.getElementById('anhoActivo_').value=resultado1[i];
                                 }
                                 document.getElementById('idbtn1_').value=resultado1[i];
                            }
                        }
                      if((resultado1[i]==2 && idperiodo==1) || (resultado1[i]==4 && idperiodo==2)){
                             if(document.getElementById("idbtn2")){
                                but2 = document.getElementById("idbtn2");
                                but2.disabled = false;
                                if(i==0 && document.getElementById('anhoActivo').value==0 )  {
                                    document.getElementById('idbtn2').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345; padding: 8px 11px;');
                                    document.getElementById('anhoActivo').value=resultado1[i];
                                    document.getElementById('anhoActivo_').value=resultado1[i];
                                }
                                document.getElementById('idbtn2').value=resultado1[i];
                             }
                            if(document.getElementById("idbtn2_")){
                                but22 = document.getElementById("idbtn2_");
                                but22.disabled = false;
                                if(i==0 && document.getElementById('anhoActivo').value==0 )  {
                                   document.getElementById('idbtn2_').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345; padding: 8px 11px;');
                                   document.getElementById('anhoActivo').value=resultado1[i];
                                   document.getElementById('anhoActivo_').value=resultado1[i];
                                 }
                                 document.getElementById('idbtn2_').value=resultado1[i];
                             }

                        }
                       if((resultado1[i]==3 && idperiodo==1) || (resultado1[i]==5 && idperiodo==2)){
                             if(document.getElementById("idbtn3")){
                                 but3 = document.getElementById("idbtn3");
                                 but3.disabled = false;
                                   if(i==0 && document.getElementById('anhoActivo').value==0 )  {
                                    document.getElementById('idbtn3').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345; padding: 8px 11px;');
                                    document.getElementById('anhoActivo').value=resultado1[i];
                                    document.getElementById('anhoActivo_').value=resultado1[i];
                                 }
                                  document.getElementById('idbtn3').value=resultado1[i];
                            }
                            if(document.getElementById("idbtn3_")){
                                but33 = document.getElementById("idbtn3_");
                                but33.disabled = false;

                                 if(i==0 && document.getElementById('anhoActivo').value==0 )  {
                                   document.getElementById('idbtn3_').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345;padding: 8px 11px; ');
                                   document.getElementById('anhoActivo').value=resultado1[i];
                                   document.getElementById('anhoActivo_').value=resultado1[i];
                                 }
                                 document.getElementById('idbtn3_').value=resultado1[i];
                            }
                        }

                     if((resultado1[i]==4 && idperiodo==1) || (resultado1[i]==6 && idperiodo==2)){
                            if(document.getElementById("idbtn4")){
                                  but4 = document.getElementById("idbtn4");
                                  but4.disabled = false;
                                   if(i==0 && document.getElementById('anhoActivo').value==0)  {
                                    document.getElementById('idbtn4').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345;padding: 8px 11px;');
                                    document.getElementById('anhoActivo').value=resultado1[i];
                                    document.getElementById('anhoActivo_').value=resultado1[i];
                                 }
                                 document.getElementById('idbtn4').value=resultado1[i];
                            }
                            if(document.getElementById("idbtn4_")){
                                 but44 = document.getElementById("idbtn4_");
                                 but44.disabled = false;
                                  if(i==0 && document.getElementById('anhoActivo').value==0)  {
                                   document.getElementById('idbtn4_').setAttribute('style', 'cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;');
                                   document.getElementById('anhoActivo').value=resultado1[i];
                                   document.getElementById('anhoActivo_').value=resultado1[i];
                                 }
                                 document.getElementById('idbtn4_').value=resultado1[i];
                            }
                        }
                    if((resultado1[i]==5 && idperiodo==1) || (resultado1[i]==7 && idperiodo==2)){
                            if(document.getElementById("idbtn5")){
                               but5 = document.getElementById("idbtn5");
                              but5.disabled = false;
                               if(i==0 && document.getElementById('anhoActivo').value==0 )  {
                                    document.getElementById('idbtn5').setAttribute('style', 'cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;');
                                    document.getElementById('anhoActivo').value=resultado1[i];
                                    document.getElementById('anhoActivo_').value=resultado1[i];
                                 }
                                document.getElementById('idbtn5').value=resultado1[i];
                            }
                            if(document.getElementById("idbtn5_")){
                                 but55 = document.getElementById("idbtn5_");
                                but55.disabled = false;
                                 if(i==0 && document.getElementById('anhoActivo').value==0)  {
                                   document.getElementById('idbtn5_').setAttribute('style', 'cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;');
                                   document.getElementById('anhoActivo').value=resultado1[i];
                                   document.getElementById('anhoActivo_').value=resultado1[i];
                                 }
                                 document.getElementById('idbtn5_').value=resultado1[i];
                            }


                        }


                    }


                }
        });
       //alert('entroo año2');

}

establecer_anos();






 function onclick_agregarDetalle1() {
    //alert('entro tr1');
           var contadorC = 0;

            contadorC = parseInt(document.getElementById('conteoC').value);
            contadorC = contadorC+1;
            document.getElementById('conteoC').value = contadorC;

            tabla = document.getElementById('segui1');

            trc = document.createElement('tr');
            trc.setAttribute('id', 'tempTr01'+contadorC);

            tabla.appendChild(trc);

            td1 = document.createElement('td');
            td1.setAttribute('style', ' height:24px; ');
            input1 = document.createElement('input');
            input1.setAttribute('type', 'checkbox');
            input1.setAttribute('name', 'chk'+contadorC);
            input1.setAttribute('id', 'chk'+contadorC);
            td1.appendChild(input1);



           // td2.appendChild(input2);

            td3 = document.createElement('td');
            input3 = document.createElement('textarea');
            input3.setAttribute('name', 'txtdetalle1-'+contadorC);
            input3.setAttribute('cols', '40');
            input3.setAttribute('rows', '4');
            input3.setAttribute('style', 'width: 380px;');
            input3.setAttribute('id', 'txtdetalle1-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad1-'+contadorC);
            input4.setAttribute('style', 'width: 220px;');
            input4.setAttribute('id', 'txtmonto_cantidad1-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs1-'+contadorC);
            input5.setAttribute('cols', '40');
            input5.setAttribute('rows', '3');
            input5.setAttribute('style', 'width: 450px;');
             input5.setAttribute('id', 'txtobs1-'+contadorC);
            td5.appendChild(input5);

             td6 = document.createElement('td');

           // td5.appendChild(input5);



            trc.appendChild(td1);
           // trc.appendChild(td2);
            trc.appendChild(td3);
            trc.appendChild(td4);
            trc.appendChild(td5);
            trc.appendChild(td6);


}


function onclick_agregarDetalle2() {
    //alert('entro tr1');
           var contadorC = 0;

            contadorC = parseInt(document.getElementById('conteoC').value);
            contadorC = contadorC+1;
            document.getElementById('conteoC').value = contadorC;

            tabla = document.getElementById('segui2');

            trc = document.createElement('tr');
            trc.setAttribute('id', 'tempTr01'+contadorC);

            tabla.appendChild(trc);

            td1 = document.createElement('td');
            td1.setAttribute('style', ' height:24px; ');
            input1 = document.createElement('input');
            input1.setAttribute('type', 'checkbox');
            input1.setAttribute('name', 'chk'+contadorC);
            input1.setAttribute('id', 'chk'+contadorC);
            td1.appendChild(input1);



           // td2.appendChild(input2);

            td3 = document.createElement('td');
            input3 = document.createElement('textarea');
            input3.setAttribute('name', 'txtdetalle2-'+contadorC);
            input3.setAttribute('cols', '40');
            input3.setAttribute('rows', '4');
            input3.setAttribute('style', 'width: 380px;');
            input3.setAttribute('id', 'txtdetalle2-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad2-'+contadorC);
            input4.setAttribute('style', 'width: 220px;');
            input4.setAttribute('id', 'txtmonto_cantidad2-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs2-'+contadorC);
            input5.setAttribute('cols', '40');
            input5.setAttribute('rows', '3');
            input5.setAttribute('style', 'width: 450px;');
             input5.setAttribute('id', 'txtobs2-'+contadorC);
            td5.appendChild(input5);

             td6 = document.createElement('td');

           // td5.appendChild(input5);



            trc.appendChild(td1);
           // trc.appendChild(td2);
            trc.appendChild(td3);
            trc.appendChild(td4);
            trc.appendChild(td5);
            trc.appendChild(td6);


}



function onclick_agregarDetalle3() {
    //alert('entro tr1');
           var contadorC = 0;

            contadorC = parseInt(document.getElementById('conteoC').value);
            contadorC = contadorC+1;
            document.getElementById('conteoC').value = contadorC;

            tabla = document.getElementById('segui3');

            trc = document.createElement('tr');
            trc.setAttribute('id', 'tempTr01'+contadorC);

            tabla.appendChild(trc);

            td1 = document.createElement('td');
            td1.setAttribute('style', ' height:24px; ');
            input1 = document.createElement('input');
            input1.setAttribute('type', 'checkbox');
            input1.setAttribute('name', 'chk'+contadorC);
            input1.setAttribute('id', 'chk'+contadorC);
            td1.appendChild(input1);



           // td2.appendChild(input2);

            td3 = document.createElement('td');
            input3 = document.createElement('textarea');
            input3.setAttribute('name', 'txtdetalle3-'+contadorC);
            input3.setAttribute('cols', '40');
            input3.setAttribute('rows', '4');
            input3.setAttribute('style', 'width: 380px;');
            input3.setAttribute('id', 'txtdetalle3-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad3-'+contadorC);
            input4.setAttribute('style', 'width: 220px;');
            input4.setAttribute('id', 'txtmonto_cantidad3-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs3-'+contadorC);
            input5.setAttribute('cols', '40');
            input5.setAttribute('rows', '3');
            input5.setAttribute('style', 'width: 450px;');
             input5.setAttribute('id', 'txtobs3-'+contadorC);
            td5.appendChild(input5);

             td6 = document.createElement('td');

           // td5.appendChild(input5);



            trc.appendChild(td1);
           // trc.appendChild(td2);
            trc.appendChild(td3);
            trc.appendChild(td4);
            trc.appendChild(td5);
            trc.appendChild(td6);


}


function onclick_agregarDetalle4() {
    //alert('entro tr1');
           var contadorC = 0;

            contadorC = parseInt(document.getElementById('conteoC').value);
            contadorC = contadorC+1;
            document.getElementById('conteoC').value = contadorC;

            tabla = document.getElementById('segui4');

            trc = document.createElement('tr');
            trc.setAttribute('id', 'tempTr01'+contadorC);

            tabla.appendChild(trc);

            td1 = document.createElement('td');
            td1.setAttribute('style', ' height:24px; ');
            input1 = document.createElement('input');
            input1.setAttribute('type', 'checkbox');
            input1.setAttribute('name', 'chk'+contadorC);
            input1.setAttribute('id', 'chk'+contadorC);
            td1.appendChild(input1);



           // td2.appendChild(input2);

            td3 = document.createElement('td');
            input3 = document.createElement('textarea');
            input3.setAttribute('name', 'txtdetalle4-'+contadorC);
            input3.setAttribute('cols', '40');
            input3.setAttribute('rows', '4');
            input3.setAttribute('style', 'width: 380px;');
            input3.setAttribute('id', 'txtdetalle4-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad4-'+contadorC);
            input4.setAttribute('style', 'width: 220px;');
            input4.setAttribute('id', 'txtmonto_cantidad4-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs4-'+contadorC);
            input5.setAttribute('cols', '40');
            input5.setAttribute('rows', '3');
            input5.setAttribute('style', 'width: 450px;');
             input5.setAttribute('id', 'txtobs4-'+contadorC);
            td5.appendChild(input5);

             td6 = document.createElement('td');

           // td5.appendChild(input5);



            trc.appendChild(td1);
           // trc.appendChild(td2);
            trc.appendChild(td3);
            trc.appendChild(td4);
            trc.appendChild(td5);
            trc.appendChild(td6);


}




function onclick_agregarDetalle5() {
    //alert('entro tr1');
           var contadorC = 0;

            contadorC = parseInt(document.getElementById('conteoC').value);
            contadorC = contadorC+1;
            document.getElementById('conteoC').value = contadorC;

            tabla = document.getElementById('segui5');

            trc = document.createElement('tr');
            trc.setAttribute('id', 'tempTr01'+contadorC);

            tabla.appendChild(trc);

            td1 = document.createElement('td');
            td1.setAttribute('style', ' height:24px; ');
            input1 = document.createElement('input');
            input1.setAttribute('type', 'checkbox');
            input1.setAttribute('name', 'chk'+contadorC);
            input1.setAttribute('id', 'chk'+contadorC);
            td1.appendChild(input1);



           // td2.appendChild(input2);

            td3 = document.createElement('td');
            input3 = document.createElement('textarea');
            input3.setAttribute('name', 'txtdetalle5-'+contadorC);
            input3.setAttribute('cols', '40');
            input3.setAttribute('rows', '4');
            input3.setAttribute('style', 'width: 380px;');
            input3.setAttribute('id', 'txtdetalle5-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad5-'+contadorC);
            input4.setAttribute('style', 'width: 220px;');
            input4.setAttribute('id', 'txtmonto_cantidad5-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs5-'+contadorC);
            input5.setAttribute('cols', '40');
            input5.setAttribute('rows', '3');
            input5.setAttribute('style', 'width: 450px;');
             input5.setAttribute('id', 'txtobs5-'+contadorC);
            td5.appendChild(input5);

             td6 = document.createElement('td');

           // td5.appendChild(input5);



            trc.appendChild(td1);
           // trc.appendChild(td2);
            trc.appendChild(td3);
            trc.appendChild(td4);
            trc.appendChild(td5);
            trc.appendChild(td6);


}




function onclick_agregarDetalle6() {
    //alert('entro tr1');
           var contadorC = 0;

            contadorC = parseInt(document.getElementById('conteoC').value);
            contadorC = contadorC+1;
            document.getElementById('conteoC').value = contadorC;

            tabla = document.getElementById('segui6');

            trc = document.createElement('tr');
            trc.setAttribute('id', 'tempTr01'+contadorC);

            tabla.appendChild(trc);

            td1 = document.createElement('td');
            td1.setAttribute('style', ' height:24px; ');
            input1 = document.createElement('input');
            input1.setAttribute('type', 'checkbox');
            input1.setAttribute('name', 'chk'+contadorC);
            input1.setAttribute('id', 'chk'+contadorC);
            td1.appendChild(input1);



           // td2.appendChild(input2);

            td3 = document.createElement('td');
            input3 = document.createElement('textarea');
            input3.setAttribute('name', 'txtdetalle6-'+contadorC);
            input3.setAttribute('cols', '40');
            input3.setAttribute('rows', '4');
            input3.setAttribute('style', 'width: 380px;');
            input3.setAttribute('id', 'txtdetalle6-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad6-'+contadorC);
            input4.setAttribute('style', 'width: 220px;');
            input4.setAttribute('id', 'txtmonto_cantidad6-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs6-'+contadorC);
            input5.setAttribute('cols', '40');
            input5.setAttribute('rows', '3');
            input5.setAttribute('style', 'width: 450px;');
             input5.setAttribute('id', 'txtobs6-'+contadorC);
            td5.appendChild(input5);

             td6 = document.createElement('td');

           // td5.appendChild(input5);

            trc.appendChild(td1);
           // trc.appendChild(td2);
            trc.appendChild(td3);
            trc.appendChild(td4);
            trc.appendChild(td5);
            trc.appendChild(td6);


}




function onclick_agregarDetalle7() {
    //alert('entro tr1');
           var contadorC = 0;

            contadorC = parseInt(document.getElementById('conteoC').value);
            contadorC = contadorC+1;
            document.getElementById('conteoC').value = contadorC;

            tabla = document.getElementById('segui7');

            trc = document.createElement('tr');
            trc.setAttribute('id', 'tempTr01'+contadorC);

            tabla.appendChild(trc);

            td1 = document.createElement('td');
            td1.setAttribute('style', ' height:24px; ');
            input1 = document.createElement('input');
            input1.setAttribute('type', 'checkbox');
            input1.setAttribute('name', 'chk'+contadorC);
            input1.setAttribute('id', 'chk'+contadorC);
            td1.appendChild(input1);

           // td2.appendChild(input2);

            td3 = document.createElement('td');
            input3 = document.createElement('textarea');
            input3.setAttribute('name', 'txtdetalle7-'+contadorC);
            input3.setAttribute('cols', '40');
            input3.setAttribute('rows', '4');
            input3.setAttribute('style', 'width: 380px;');
            input3.setAttribute('id', 'txtdetalle7-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad7-'+contadorC);
            input4.setAttribute('style', 'width: 220px;');
            input4.setAttribute('id', 'txtmonto_cantidad7-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs7-'+contadorC);
            input5.setAttribute('cols', '40');
            input5.setAttribute('rows', '3');
            input5.setAttribute('style', 'width: 450px;');
             input5.setAttribute('id', 'txtobs7-'+contadorC);
            td5.appendChild(input5);

             td6 = document.createElement('td');

           // td5.appendChild(input5);

            trc.appendChild(td1);
           // trc.appendChild(td2);
            trc.appendChild(td3);
            trc.appendChild(td4);
            trc.appendChild(td5);
            trc.appendChild(td6);
}




function onclick_agregarDetalle8() {
    //alert('entro tr1');
           var contadorC = 0;

            contadorC = parseInt(document.getElementById('conteoC').value);
            contadorC = contadorC+1;
            document.getElementById('conteoC').value = contadorC;

            tabla = document.getElementById('segui8');

            trc = document.createElement('tr');
            trc.setAttribute('id', 'tempTr01'+contadorC);

            tabla.appendChild(trc);

            td1 = document.createElement('td');
            td1.setAttribute('style', ' height:24px; ');
            input1 = document.createElement('input');
            input1.setAttribute('type', 'checkbox');
            input1.setAttribute('name', 'chk'+contadorC);
            input1.setAttribute('id', 'chk'+contadorC);
            td1.appendChild(input1);

           // td2.appendChild(input2);

            td3 = document.createElement('td');
            input3 = document.createElement('textarea');
            input3.setAttribute('name', 'txtdetalle8-'+contadorC);
            input3.setAttribute('cols', '40');
            input3.setAttribute('rows', '4');
            input3.setAttribute('style', 'width: 380px;');
            input3.setAttribute('id', 'txtdetalle8-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad8-'+contadorC);
            input4.setAttribute('style', 'width: 220px;');
            input4.setAttribute('id', 'txtmonto_cantidad8-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs8-'+contadorC);
            input5.setAttribute('cols', '40');
            input5.setAttribute('rows', '3');
            input5.setAttribute('style', 'width: 450px;');
             input5.setAttribute('id', 'txtobs8-'+contadorC);
            td5.appendChild(input5);

             td6 = document.createElement('td');

           // td5.appendChild(input5);

            trc.appendChild(td1);
           // trc.appendChild(td2);
            trc.appendChild(td3);
            trc.appendChild(td4);
            trc.appendChild(td5);
            trc.appendChild(td6);
}



function onclick_agregarDetalle9() {
    //alert('entro tr1');
           var contadorC = 0;

            contadorC = parseInt(document.getElementById('conteoC').value);
            contadorC = contadorC+1;
            document.getElementById('conteoC').value = contadorC;

            tabla = document.getElementById('segui9');

            trc = document.createElement('tr');
            trc.setAttribute('id', 'tempTr01'+contadorC);

            tabla.appendChild(trc);

            td1 = document.createElement('td');
            td1.setAttribute('style', ' height:24px; ');
            input1 = document.createElement('input');
            input1.setAttribute('type', 'checkbox');
            input1.setAttribute('name', 'chk'+contadorC);
            input1.setAttribute('id', 'chk'+contadorC);
            td1.appendChild(input1);

           // td2.appendChild(input2);

            td3 = document.createElement('td');
            input3 = document.createElement('textarea');
            input3.setAttribute('name', 'txtdetalle9-'+contadorC);
            input3.setAttribute('cols', '40');
            input3.setAttribute('rows', '4');
            input3.setAttribute('style', 'width: 380px;');
            input3.setAttribute('id', 'txtdetalle9-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad9-'+contadorC);
            input4.setAttribute('style', 'width: 220px;');
            input4.setAttribute('id', 'txtmonto_cantidad9-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs9-'+contadorC);
            input5.setAttribute('cols', '40');
            input5.setAttribute('rows', '3');
            input5.setAttribute('style', 'width: 450px;');
             input5.setAttribute('id', 'txtobs9-'+contadorC);
            td5.appendChild(input5);

             td6 = document.createElement('td');

           // td5.appendChild(input5);

            trc.appendChild(td1);
           // trc.appendChild(td2);
            trc.appendChild(td3);
            trc.appendChild(td4);
            trc.appendChild(td5);
            trc.appendChild(td6);
}



function onclick_agregarDetalle10() {
    //alert('entro tr1');
           var contadorC = 0;

            contadorC = parseInt(document.getElementById('conteoC').value);
            contadorC = contadorC+1;
            document.getElementById('conteoC').value = contadorC;

            tabla = document.getElementById('segui10');

            trc = document.createElement('tr');
            trc.setAttribute('id', 'tempTr01'+contadorC);

            tabla.appendChild(trc);

            td1 = document.createElement('td');
            td1.setAttribute('style', ' height:24px; ');
            input1 = document.createElement('input');
            input1.setAttribute('type', 'checkbox');
            input1.setAttribute('name', 'chk'+contadorC);
            input1.setAttribute('id', 'chk'+contadorC);
            td1.appendChild(input1);

           // td2.appendChild(input2);

            td3 = document.createElement('td');
            input3 = document.createElement('textarea');
            input3.setAttribute('name', 'txtdetalle10-'+contadorC);
            input3.setAttribute('cols', '40');
            input3.setAttribute('rows', '4');
            input3.setAttribute('style', 'width: 380px;');
            input3.setAttribute('id', 'txtdetalle10-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad10-'+contadorC);
            input4.setAttribute('style', 'width: 220px;');
            input4.setAttribute('id', 'txtmonto_cantidad10-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs10-'+contadorC);
            input5.setAttribute('cols', '40');
            input5.setAttribute('rows', '3');
            input5.setAttribute('style', 'width: 450px;');
             input5.setAttribute('id', 'txtobs10-'+contadorC);
            td5.appendChild(input5);

             td6 = document.createElement('td');

           // td5.appendChild(input5);

            trc.appendChild(td1);
           // trc.appendChild(td2);
            trc.appendChild(td3);
            trc.appendChild(td4);
            trc.appendChild(td5);
            trc.appendChild(td6);
}




function deleteRowRciaGral(){

    deleteRowRcia('segui1');
    deleteRowRcia('segui2');
    deleteRowRcia('segui3');
    deleteRowRcia('segui4');
    deleteRowRcia('segui5');
    deleteRowRcia('segui6');
    deleteRowRcia('segui7');
    deleteRowRcia('segui8');
    deleteRowRcia('segui9');
    deleteRowRcia('segui10');

}

function deleteRowRcia(tableID) {
   var yea=document.getElementById(tableID).rows.length;
    //alert(yea);
    try {
			  var tableD = document.getElementById(tableID);
			for(var ii=0; ii< yea; ii++) {
					var rowD = tableD.rows[ii];
					var chkboxD = rowD.cells[0].childNodes[0];
					if(null != chkboxD && true == chkboxD.checked) {
						tableD.deleteRow(ii);
					//	rowCount--;
                         contadorD = parseInt(document.getElementById('conteoC').value);
                        contadorD = contadorD-1;
                        //document.getElementById('conteoC').value = contadorD;

						ii--;
					}
			   }

		}catch(ee) {
			//alert("errorrrr:"+ee);
		}
         var yea=document.getElementById(tableID).rows.length;
//alert(yea);

}


function sumatoria_agricola(){
    suma=0;

    if(document.getElementById('doccomerPonderacion').value.length>0){
       suma=suma+parseInt(document.getElementById('doccomerPonderacion').value);
    }
    if(document.getElementById('compSemillaPonderacion').value.length>0){
       suma=suma+parseInt(document.getElementById('compSemillaPonderacion').value);
    }
     if(document.getElementById('adquInsumoPonderacion').value.length>0){
       suma=suma+parseInt(document.getElementById('adquInsumoPonderacion').value);
    }
     if(document.getElementById('combusiblePonderacion').value.length>0){
       suma=suma+parseInt(document.getElementById('combusiblePonderacion').value);
    }
     if(document.getElementById('aplicacionPonderacion').value.length>0){
       suma=suma+parseInt(document.getElementById('aplicacionPonderacion').value);
    }
     if(document.getElementById('maqHerraPonderacion').value.length>0){
       suma=suma+parseInt(document.getElementById('maqHerraPonderacion').value);
    }
      if(document.getElementById('abonoInsPonderacion').value.length>0){
       suma=suma+parseInt(document.getElementById('abonoInsPonderacion').value);
    }

    document.getElementById('totalgeneral').innerHTML=suma;

}
 window.scrollBy(0, -1000);
//function subir(){
    //alert('jj');
   // window.scrollBy(0, -1000);
//}


 //sumatoria_agricola();


 function recargar_anos2(){
 var idperiodo=document.getElementById('idperiodo').value;
        var parametros = {
            "tarea" : "establecerAnos"
        };
        $.ajax({
                data:  parametros,
                url:   'evaluacion_agricola_rcia_Ajax.php',
                type:  'post',
                beforeSend: function () {
                      //  $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response1) {
                   // alert('resp:'+response1);
                    response1 = response1.substring(0, response1.length - 1);
                    resultado1=response1.split("|");
                    ii=0;
                    for(i=0; i<resultado1.length;i++){
                        // alert(resultado1[i]);

                         if((resultado1[i]==1 && idperiodo==1) || (resultado1[i]==3 && idperiodo==2)){
                             if(document.getElementById("idbtn1")){
                                butt1 = document.getElementById("idbtn1");
                                butt1.disabled = false;
                                if(i==0 && document.getElementById('anhoActivo').value==0)  {
                                    document.getElementById('idbtn1').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345;padding: 8px 11px; ');
                                    document.getElementById('anhoActivo').value=resultado1[i];
                                    document.getElementById('anhoActivo_').value=resultado1[i];
                                }
                                document.getElementById('idbtn1').value=resultado1[i];
                                 if(ii==0){
                                    document.getElementById('idbtn1').click();
                                    // alert('idbtn1');
                                }
                                ii++;
                            }
                            if(document.getElementById("idbtn1_")){
                                butt11 = document.getElementById("idbtn1_");
                                butt11.disabled = false;
                                 if(i==0 && document.getElementById('anhoActivo').value==0 )  {
                                   document.getElementById('idbtn1_').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345; padding: 8px 11px; ');
                                   document.getElementById('anhoActivo').value=resultado1[i];
                                   document.getElementById('anhoActivo_').value=resultado1[i];
                                 }
                                 document.getElementById('idbtn1_').value=resultado1[i];
                                  if(ii==0){
                                  document.getElementById('idbtn1_').click();
                                   //alert('idbtn1_');
                                }
                                ii++;
                            }
                        }
                       if((resultado1[i]==2 && idperiodo==1) || (resultado1[i]==4 && idperiodo==2)){
                             if(document.getElementById("idbtn2")){
                                but2 = document.getElementById("idbtn2");
                                but2.disabled = false;
                                if(i==0 && document.getElementById('anhoActivo').value==0 )  {
                                    document.getElementById('idbtn2').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345; padding: 8px 11px;');
                                    document.getElementById('anhoActivo').value=resultado1[i];
                                    document.getElementById('anhoActivo_').value=resultado1[i];
                                }
                                document.getElementById('idbtn2').value=resultado1[i];
                                 if(ii==0){
                                   // alert('idbtn2');
                                   document.getElementById('idbtn2').click();
                                 }
                                ii++;
                             }
                            if(document.getElementById("idbtn2_")){
                                but22 = document.getElementById("idbtn2_");
                                but22.disabled = false;
                                if(i==0 && document.getElementById('anhoActivo').value==0 )  {
                                   document.getElementById('idbtn2_').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345; padding: 8px 11px;');
                                   document.getElementById('anhoActivo').value=resultado1[i];
                                   document.getElementById('anhoActivo_').value=resultado1[i];
                                 }
                                 document.getElementById('idbtn2_').value=resultado1[i];
                                  if(ii==0){
                                     // alert('idbtn2_');
                                      document.getElementById('idbtn2_').click();
                                 }
                                ii++;
                             }

                        }
                       if((resultado1[i]==3 && idperiodo==1) || (resultado1[i]==5 && idperiodo==2)){
                             if(document.getElementById("idbtn3")){
                                 but3 = document.getElementById("idbtn3");
                                 but3.disabled = false;
                                   if(i==0 && document.getElementById('anhoActivo').value==0 )  {
                                    document.getElementById('idbtn3').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345; padding: 8px 11px;');
                                    document.getElementById('anhoActivo').value=resultado1[i];
                                    document.getElementById('anhoActivo_').value=resultado1[i];
                                 }
                                  document.getElementById('idbtn3').value=resultado1[i];
                                  if(ii==0){
                                     //alert('idbtn3');
                                       document.getElementById('idbtn3').click();
                                     }
                                ii++;
                            }
                            if(document.getElementById("idbtn3_")){
                                but33 = document.getElementById("idbtn3_");
                                but33.disabled = false;

                                 if(i==0 && document.getElementById('anhoActivo').value==0 )  {
                                   document.getElementById('idbtn3_').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345;padding: 8px 11px; ');
                                   document.getElementById('anhoActivo').value=resultado1[i];
                                   document.getElementById('anhoActivo_').value=resultado1[i];
                                 }
                                 document.getElementById('idbtn3_').value=resultado1[i];
                                  if(ii==0){
                                    //alert('idbtn3_');
                                     document.getElementById('idbtn3_').click();
                                   }
                                ii++;
                            }
                        }

                       if((resultado1[i]==4 && idperiodo==1) || (resultado1[i]==6 && idperiodo==2)){
                            if(document.getElementById("idbtn4")){
                                  but4 = document.getElementById("idbtn4");
                                  but4.disabled = false;
                                   if(i==0 && document.getElementById('anhoActivo').value==0)  {
                                    document.getElementById('idbtn4').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345;padding: 8px 11px;');
                                    document.getElementById('anhoActivo').value=resultado1[i];
                                    document.getElementById('anhoActivo_').value=resultado1[i];
                                 }
                                 document.getElementById('idbtn4').value=resultado1[i];
                                  if(ii==0){
                                   // alert('idbtn4');
                                    document.getElementById('idbtn4').click();
                                 }
                                ii++;
                            }
                            if(document.getElementById("idbtn4_")){
                                 but44 = document.getElementById("idbtn4_");
                                 but44.disabled = false;
                                  if(i==0 && document.getElementById('anhoActivo').value==0)  {
                                   document.getElementById('idbtn4_').setAttribute('style', 'cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;');
                                   document.getElementById('anhoActivo').value=resultado1[i];
                                   document.getElementById('anhoActivo_').value=resultado1[i];
                                 }
                                 document.getElementById('idbtn4_').value=resultado1[i];
                                  if(ii==0){
                                  //alert('idbtn4_');
                                   document.getElementById('idbtn4_').click();
                                  }
                                ii++;
                            }
                        }
                       if((resultado1[i]==5 && idperiodo==1) || (resultado1[i]==7 && idperiodo==2)){
                            if(document.getElementById("idbtn5")){
                               but5 = document.getElementById("idbtn5");
                              but5.disabled = false;
                               if(i==0 && document.getElementById('anhoActivo').value==0 )  {
                                    document.getElementById('idbtn5').setAttribute('style', 'cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;');
                                    document.getElementById('anhoActivo').value=resultado1[i];
                                    document.getElementById('anhoActivo_').value=resultado1[i];
                                 }
                                document.getElementById('idbtn5').value=resultado1[i];
                                if(ii==0){
                                  //alert('idbtn5');
                                   document.getElementById('idbtn5').click();
                                  }
                                ii++;
                            }
                            if(document.getElementById("idbtn5_")){
                                 but55 = document.getElementById("idbtn5_");
                                but55.disabled = false;
                                 if(i==0 && document.getElementById('anhoActivo').value==0)  {
                                   document.getElementById('idbtn5_').setAttribute('style', 'cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;');
                                   document.getElementById('anhoActivo').value=resultado1[i];
                                   document.getElementById('anhoActivo_').value=resultado1[i];
                                 }
                                 document.getElementById('idbtn5_').value=resultado1[i];
                                  if(ii==0){
                                   //alert('idbtn5_');
                                    document.getElementById('idbtn5_').click();
                                   }
                                ii++;
                            }


                        }


                    }


                }
        });
 }

 sumarTodasColumnas();

function sumarTodasColumnas(){
     // alert('sumar');
      indice=1;
      //alert(document.getElementById('doccomer'+indice).value);

    Total_=0;
     Total_=parseFloat(Total_);


    tipopredio=0;
    // alert(document.getElementById('idtipoPredio').value);
    tipopredio=document.getElementById('idtipoPredio').value;

    //---------------------------------------------------------------------------------//
    //---------------pequeña y comunidad------------------------------
   // alert('aaa');
    if(tipopredio==37 ||tipopredio==38 ){  //if(true)

       // alert('pequeñaa');
        sumar=0.0;
        sumar2=0.0;
        sumar3=0.0;
        sumar4=0.0;
        sumar5=0.0;
        sumar6=0.0;
        sumar7=0.0;
        while(document.getElementById('doccomer'+indice)){
             sumar=0.0;
        sumar2=0.0;
        sumar3=0.0;
        sumar4=0.0;
        sumar5=0.0;
        sumar6=0.0;
        sumar7=0.0;
            //alert(document.getElementById('doccomer'+indice).value);
            //alert(indice);

             if(document.getElementById('doccomer'+indice).value.length>0){
              sumar=sumar+parseInt(document.getElementById('doccomer'+indice).value);
             }


             if(document.getElementById('aplicacion'+indice).value.length>0){
               sumar5=sumar5+parseInt(document.getElementById('aplicacion'+indice).value);
             }
             if(document.getElementById('maqHerra'+indice).value.length>0){
                 sumar6=sumar6+parseInt(document.getElementById('maqHerra'+indice).value);
             }
             if(document.getElementById('abonoIns'+indice).value.length>0){
                sumar7=sumar7+parseInt(document.getElementById('abonoIns'+indice).value);
             }


         //   alert('si1');


            a=0;
            b=0;
            t=0;
            a=document.getElementById('superificieProd'+indice).innerHTML;
             b=document.getElementById('suptotalc').innerHTML;

              t=(a*100)/b;

              document.getElementById('porsup'+indice).innerHTML= Math.round(t*100)/100;
            //alert('aaaa=');

             d=document.getElementById('superProd'+indice).value;

            e=Math.round(t);
            e=((e*0.5*d)/100)/100;

//alert('si2');

            if(document.getElementById('campania').checked){
                document.getElementById('porpon'+indice).value=(Math.round(e*10000)/10000)*2;
            }else{
                document.getElementById('porpon'+indice).value=Math.round(e*10000)/10000;
            }




           f=document.getElementById('porpon'+indice).value;
          // alert(f);
           sumt=sumar+sumar2+sumar3+sumar4+sumar5+sumar6+sumar7;
           f=parseFloat(f);
           sumt=parseFloat(sumt);
            //alert(sumt);
           sumt=f*sumt;
           // alert(sumt);
           sumt=Math.round(sumt*100)/100;
          // alert(sumt);
           document.getElementById('totalc'+indice).value=sumt;
           Total_=Total_+sumt;


            indice=indice+1;
           // alert("cantidad de p");
        }

         indice=1;
        while(document.getElementById('doccomer'+indice+'_no')){

               sumar=0;
               sumar2=0;
               sumar3=0;
               sumar4=0;
               sumar5=0;
               sumar6=0;
               sumar7=0;


                 if(document.getElementById('doccomer'+indice+'_no').value.length>0){
                  sumar=sumar+parseInt(document.getElementById('doccomer'+indice+'_no').value);
                }

                 if(document.getElementById('aplicacion'+indice+'_no').value.length>0){
                  sumar5=sumar5+parseInt(document.getElementById('aplicacion'+indice+'_no').value);
                }
                 if(document.getElementById('maqHerra'+indice+'_no').value.length>0){
                  sumar6=sumar6+parseInt(document.getElementById('maqHerra'+indice+'_no').value);
                }
                 if(document.getElementById('abonoIns'+indice+'_no').value.length>0){
                  sumar7=sumar7+parseInt(document.getElementById('abonoIns'+indice+'_no').value);
                }






                a=0;
               b=0;
               t=0;
               a=document.getElementById('superificieProd_no'+indice).innerHTML;
               b=document.getElementById('suptotalc').innerHTML;

               t=(a*100)/b;

               document.getElementById('porsup_no'+indice).innerHTML= Math.round(t*100)/100;


               d=document.getElementById('superProdNo'+indice).value;

               e=Math.round(t);
               e=((e*0.5*d)/100)/100;


            if(document.getElementById('campania').checked){
                document.getElementById('porpon_no'+indice).value=(Math.round(e*10000)/10000)*2;
            }else{
              document.getElementById('porpon_no'+indice).value=Math.round(e*10000)/10000;
            }





              f=document.getElementById('porpon_no'+indice).value;
             // alert(f);
              sumt=sumar+sumar2+sumar3+sumar4+sumar5+sumar6+sumar7;
              f=parseFloat(f);
              sumt=parseFloat(sumt);
               //alert(f);
              sumt=f*sumt;
              //alert(sumt);
              sumt=Math.round(sumt*100)/100;
              //alert(sumt);


               document.getElementById('totalnoc'+indice).value=sumt;
               Total_=Total_+sumt;

              // alert('indice='+sumar);
                indice=indice+1;
           }

      indice=1;
        while(document.getElementById('doccomer_inv'+indice)){

               sumar=0;
               sumar2=0;
               sumar3=0;
               sumar4=0;
               sumar5=0;
               sumar6=0;
               sumar7=0;

               if(document.getElementById('doccomer_inv'+indice).value.length>0){
                  sumar=sumar+parseInt(document.getElementById('doccomer_inv'+indice).value);
                }

                if(document.getElementById('aplicacion_inv'+indice).value.length>0){
                  sumar5=sumar5+parseInt(document.getElementById('aplicacion_inv'+indice).value);
                }
                if(document.getElementById('maqHerra_inv'+indice).value.length>0){
                  sumar6=sumar6+parseInt(document.getElementById('maqHerra_inv'+indice).value);
                }
                if(document.getElementById('abonoIns_inv'+indice).value.length>0){
                  sumar7=sumar7+parseInt(document.getElementById('abonoIns_inv'+indice).value);
                }











                   a=0;
               b=0;
               t=0;
               a=document.getElementById('superificieProd_Inv'+indice).innerHTML;
                b=document.getElementById('suptotalc').innerHTML;

                  t=(a*100)/b;

                document.getElementById('porsup_inv'+indice).innerHTML= Math.round(t*100)/100;

              // alert('indice='+sumar);


                d=document.getElementById('superProdInv'+indice).value;

               e=Math.round(t);
               e=((e*0.5*d)/100)/100;


                if(document.getElementById('campania').checked){
                    document.getElementById('porponinv'+indice).value=(Math.round(e*10000)/10000)*2;
                }else{
                   document.getElementById('porponinv'+indice).value=Math.round(e*10000)/10000;
                }



                f=document.getElementById('porponinv'+indice).value;
             // alert(f);
              sumt=sumar+sumar2+sumar3+sumar4+sumar5+sumar6+sumar7;
              f=parseFloat(f);
              sumt=parseFloat(sumt);
               //alert(f);
              sumt=f*sumt;
              //alert(sumt);
              sumt=Math.round(sumt*100)/100;
              //alert(sumt);


               document.getElementById('totalInv'+indice).value=sumt;
               Total_=Total_+sumt;




                indice=indice+1;

              // alert('indice='+sumar);

           }


        indice=1;
        while(document.getElementById('doccomer_no_inv'+indice+'_no')){

               sumar=0;
               sumar2=0;
               sumar3=0;
               sumar4=0;
               sumar5=0;
               sumar6=0;
               sumar7=0;

               if(document.getElementById('doccomer_no_inv'+indice+'_no').value.length>0){
                 sumar=sumar+parseInt(document.getElementById('doccomer_no_inv'+indice+'_no').value);
                }

                if(document.getElementById('aplicacion_no_inv'+indice+'_no').value.length>0){
                 sumar5=sumar5+parseInt(document.getElementById('aplicacion_no_inv'+indice+'_no').value);
                }
                if(document.getElementById('maqHerra_no_inv'+indice+'_no').value.length>0){
                 sumar6=sumar6+parseInt(document.getElementById('maqHerra_no_inv'+indice+'_no').value);
                }
                if(document.getElementById('abonoIns_no_inv'+indice+'_no').value.length>0){
                  sumar7=sumar7+parseInt(document.getElementById('abonoIns_no_inv'+indice+'_no').value);
                }












               a=0;
               b=0;
               t=0;
               a=document.getElementById('superificieProd_Inv_no'+indice).innerHTML;
               b=document.getElementById('suptotalc').innerHTML;

               t=(a*100)/b;

               document.getElementById('porsup_inv_no'+indice).innerHTML= Math.round(t*100)/100;

               // alert('indice='+sumar);


                d=document.getElementById('superProdInv_no'+indice).value;

               e=Math.round(t);
               e=((e*0.5*d)/100)/100;


                if(document.getElementById('campania').checked){
                   document.getElementById('porponinv_no'+indice).value=(Math.round(e*10000)/10000)*2;
                }else{
                   document.getElementById('porponinv_no'+indice).value=Math.round(e*10000)/10000;
                }



                f=document.getElementById('porponinv_no'+indice).value;
             // alert(f);
              sumt=sumar+sumar2+sumar3+sumar4+sumar5+sumar6+sumar7;
              f=parseFloat(f);
              sumt=parseFloat(sumt);
               //alert(f);
              sumt=f*sumt;
              //alert(sumt);
              sumt=Math.round(sumt*100)/100;
              //alert(sumt);


               document.getElementById('totalInvNo'+indice).value=sumt;
               Total_=Total_+sumt;




                indice=indice+1;


              //  alert('indice='+sumar);

           }



    }else if(tipopredio==35 ||tipopredio==36 ){
        //---------------------------------------------------------------------------------//
    //---------------MEDIANA y EMPRESARIAL------------------------------
   // alert('medianaaa');

         indice=1;
        while(document.getElementById('doccomer'+indice)){
            sumar=0.0;
        sumar2=0.0;
        sumar3=0.0;
        sumar4=0.0;
        sumar5=0.0;
        sumar6=0.0;
        sumar7=0.0;
            //alert(document.getElementById('doccomer'+indice).value);
            // alert("comer="+indice);

             if(document.getElementById('doccomer'+indice).value.length>0){
              sumar=sumar+parseInt(document.getElementById('doccomer'+indice).value);
             }

             if(document.getElementById('compSemilla'+indice).value.length>0){
                sumar2=sumar2+parseInt(document.getElementById('compSemilla'+indice).value);
             }
             if(document.getElementById('adquInsumo'+indice).value.length>0){
                sumar3=sumar3+parseInt(document.getElementById('adquInsumo'+indice).value);
             }
             if(document.getElementById('combusible'+indice).value.length>0){
               sumar4=sumar4+parseInt(document.getElementById('combusible'+indice).value);
             }
             if(document.getElementById('aplicacion'+indice).value.length>0){
               sumar5=sumar5+parseInt(document.getElementById('aplicacion'+indice).value);
             }
             if(document.getElementById('maqHerra'+indice).value.length>0){
                 sumar6=sumar6+parseInt(document.getElementById('maqHerra'+indice).value);
             }
             if(document.getElementById('abonoIns'+indice).value.length>0){
                sumar7=sumar7+parseInt(document.getElementById('abonoIns'+indice).value);
             }


            a=0;
            b=0;
            t=0;
            a=document.getElementById('superificieProd'+indice).innerHTML;
             b=document.getElementById('suptotalc').innerHTML;

              t=(a*100)/b;

              document.getElementById('porsup'+indice).innerHTML= Math.round(t*100)/100;
            //alert('aaaa=');

             d=document.getElementById('superProd'+indice).value;

            e=Math.round(t);
            e=((e*0.5*d)/100)/100;



               if(document.getElementById('campania').checked){
                   document.getElementById('porpon'+indice).value=(Math.round(e*10000)/10000)*2;
                }else{
                    document.getElementById('porpon'+indice).value=Math.round(e*10000)/10000;
                }




           f=document.getElementById('porpon'+indice).value;
          // alert(f);
          sumt=0;
           sumt=sumar+sumar2+sumar3+sumar4+sumar5+sumar6+sumar7;
           f=parseFloat(f);
           sumt=parseFloat(sumt);
          // alert(sumt+"_indice="+indice);
         //   alert(f);
         //   alert(sumt);
           sumt=f*sumt;
             //alert(sumt);
           sumt=Math.round(sumt*100)/100;
          // alert(sumt);
           document.getElementById('totalc'+indice).value=sumt;
           Total_=Total_+sumt;

           // alert("aa="+sumt);
           // alert("bb"+document.getElementById('totalc'+indice).value);
            indice=indice+1;
           // alert("cantidad de p");
        }

         indice=1;
        while(document.getElementById('doccomer'+indice+'_no')){
   // alert("comer_no="+indice);
               sumar=0;
               sumar2=0;
               sumar3=0;
               sumar4=0;
               sumar5=0;
               sumar6=0;
               sumar7=0;


                 if(document.getElementById('doccomer'+indice+'_no').value.length>0){
                  sumar=sumar+parseInt(document.getElementById('doccomer'+indice+'_no').value);
                }
                 if(document.getElementById('compSemilla'+indice+'_no').value.length>0){
                  sumar2=sumar2+parseInt(document.getElementById('compSemilla'+indice+'_no').value);
                }
                 if(document.getElementById('adquInsumo'+indice+'_no').value.length>0){
                  sumar3=sumar3+parseInt(document.getElementById('adquInsumo'+indice+'_no').value);
                }
                 if(document.getElementById('combusible'+indice+'_no').value.length>0){
                  sumar4=sumar4+parseInt(document.getElementById('combusible'+indice+'_no').value);
                }
                 if(document.getElementById('aplicacion'+indice+'_no').value.length>0){
                  sumar5=sumar5+parseInt(document.getElementById('aplicacion'+indice+'_no').value);
                }
                 if(document.getElementById('maqHerra'+indice+'_no').value.length>0){
                  sumar6=sumar6+parseInt(document.getElementById('maqHerra'+indice+'_no').value);
                }
                 if(document.getElementById('abonoIns'+indice+'_no').value.length>0){
                  sumar7=sumar7+parseInt(document.getElementById('abonoIns'+indice+'_no').value);
                }






                a=0;
               b=0;
               t=0;
               a=document.getElementById('superificieProd_no'+indice).innerHTML;
                b=document.getElementById('suptotalc').innerHTML;

                 t=(a*100)/b;

                 document.getElementById('porsup_no'+indice).innerHTML= Math.round(t*100)/100;


               d=document.getElementById('superProdNo'+indice).value;

               e=Math.round(t);
               e=((e*0.5*d)/100)/100;


                if(document.getElementById('campania').checked){
                   document.getElementById('porpon_no'+indice).value=(Math.round(e*10000)/10000)*2;
                }else{
                   document.getElementById('porpon_no'+indice).value=Math.round(e*10000)/10000;
                }



                f=document.getElementById('porpon_no'+indice).value;
             // alert(f);
              sumt=sumar+sumar2+sumar3+sumar4+sumar5+sumar6+sumar7;
              f=parseFloat(f);
              sumt=parseFloat(sumt);
               //alert(f);
              sumt=f*sumt;
              //alert(sumt);
              sumt=Math.round(sumt*100)/100;
              //alert(sumt);


               document.getElementById('totalnoc'+indice).value=sumt;
               Total_=Total_+sumt;

              // alert('indice='+sumar);
                indice=indice+1;
           }

      indice=1;
        while(document.getElementById('doccomer_inv'+indice)){

               sumar=0;
               sumar2=0;
               sumar3=0;
               sumar4=0;
               sumar5=0;
               sumar6=0;
               sumar7=0;

               if(document.getElementById('doccomer_inv'+indice).value.length>0){
                  sumar=sumar+parseInt(document.getElementById('doccomer_inv'+indice).value);
                }
                if(document.getElementById('compSemilla_inv'+indice).value.length>0){
                  sumar2=sumar2+parseInt(document.getElementById('compSemilla_inv'+indice).value);
                }
                if(document.getElementById('adquInsumo_inv'+indice).value.length>0){
                  sumar3=sumar3+parseInt(document.getElementById('adquInsumo_inv'+indice).value);
                }
                if(document.getElementById('combusible_inv'+indice).value.length>0){
                   sumar4=sumar4+parseInt(document.getElementById('combusible_inv'+indice).value);
                }
                if(document.getElementById('aplicacion_inv'+indice).value.length>0){
                  sumar5=sumar5+parseInt(document.getElementById('aplicacion_inv'+indice).value);
                }
                if(document.getElementById('maqHerra_inv'+indice).value.length>0){
                  sumar6=sumar6+parseInt(document.getElementById('maqHerra_inv'+indice).value);
                }
                if(document.getElementById('abonoIns_inv'+indice).value.length>0){
                  sumar7=sumar7+parseInt(document.getElementById('abonoIns_inv'+indice).value);
                }











                   a=0;
               b=0;
               t=0;
               a=document.getElementById('superificieProd_Inv'+indice).innerHTML;
                b=document.getElementById('suptotalc').innerHTML;

                  t=(a*100)/b;

                document.getElementById('porsup_inv'+indice).innerHTML= Math.round(t*100)/100;

              // alert('indice='+sumar);


                d=document.getElementById('superProdInv'+indice).value;

               e=Math.round(t);
               e=((e*0.5*d)/100)/100;


                if(document.getElementById('campania').checked){
                   document.getElementById('porponinv'+indice).value=(Math.round(e*10000)/10000)*2;
                }else{
                    document.getElementById('porponinv'+indice).value=Math.round(e*10000)/10000;
                }


                f=document.getElementById('porponinv'+indice).value;
             // alert(f);
              sumt=sumar+sumar2+sumar3+sumar4+sumar5+sumar6+sumar7;
              f=parseFloat(f);
              sumt=parseFloat(sumt);
               //alert(f);
              sumt=f*sumt;
              //alert(sumt);
              sumt=Math.round(sumt*100)/100;
              //alert(sumt);


               document.getElementById('totalInv'+indice).value=sumt;
               Total_=Total_+sumt;




                indice=indice+1;

              // alert('indice='+sumar);

           }


        indice=1;
        while(document.getElementById('doccomer_no_inv'+indice+'_no')){

               sumar=0;
               sumar2=0;
               sumar3=0;
               sumar4=0;
               sumar5=0;
               sumar6=0;
               sumar7=0;

               if(document.getElementById('doccomer_no_inv'+indice+'_no').value.length>0){
                 sumar=sumar+parseInt(document.getElementById('doccomer_no_inv'+indice+'_no').value);
                }
                if(document.getElementById('compSemilla_no_inv'+indice+'_no').value.length>0){
                 sumar2=sumar2+parseInt(document.getElementById('compSemilla_no_inv'+indice+'_no').value);
                }
                if(document.getElementById('adquInsumo_no_inv'+indice+'_no').value.length>0){
                  sumar3=sumar3+parseInt(document.getElementById('adquInsumo_no_inv'+indice+'_no').value);
                }
                if(document.getElementById('combusible_no_inv'+indice+'_no').value.length>0){
                 sumar4=sumar4+parseInt(document.getElementById('combusible_no_inv'+indice+'_no').value);
                }
                if(document.getElementById('aplicacion_no_inv'+indice+'_no').value.length>0){
                 sumar5=sumar5+parseInt(document.getElementById('aplicacion_no_inv'+indice+'_no').value);
                }
                if(document.getElementById('maqHerra_no_inv'+indice+'_no').value.length>0){
                 sumar6=sumar6+parseInt(document.getElementById('maqHerra_no_inv'+indice+'_no').value);
                }
                if(document.getElementById('abonoIns_no_inv'+indice+'_no').value.length>0){
                  sumar7=sumar7+parseInt(document.getElementById('abonoIns_no_inv'+indice+'_no').value);
                }












               a=0;
               b=0;
               t=0;
               a=document.getElementById('superificieProd_Inv_no'+indice).innerHTML;
               b=document.getElementById('suptotalc').innerHTML;

               t=(a*100)/b;

               document.getElementById('porsup_inv_no'+indice).innerHTML= Math.round(t*100)/100;

               // alert('indice='+sumar);


                d=document.getElementById('superProdInv_no'+indice).value;

               e=Math.round(t);
               e=((e*0.5*d)/100)/100;


                if(document.getElementById('campania').checked){
                   document.getElementById('porponinv_no'+indice).value=(Math.round(e*10000)/10000)*2;
                }else{
                   document.getElementById('porponinv_no'+indice).value=Math.round(e*10000)/10000;
                }



                f=document.getElementById('porponinv_no'+indice).value;
             // alert(f);
              sumt=sumar+sumar2+sumar3+sumar4+sumar5+sumar6+sumar7;
              f=parseFloat(f);
              sumt=parseFloat(sumt);
               //alert(f);
              sumt=f*sumt;
              //alert(sumt);
              sumt=Math.round(sumt*100)/100;
              //alert(sumt);


               document.getElementById('totalInvNo'+indice).value=sumt;
               Total_=Total_+sumt;




                indice=indice+1;


              //  alert('indice='+sumar);

           }

    }

  //  alert(document.getElementById('doccomer'+indice).value);

 document.getElementById('totalgeneral_eval').innerHTML=Math.round(Total_);



}

function campania_uno(obj){
    if(document.getElementById('campania').checked){
       sumarTodasColumnas();
    }else{
       sumarTodasColumnas();
    }
}

</script>
