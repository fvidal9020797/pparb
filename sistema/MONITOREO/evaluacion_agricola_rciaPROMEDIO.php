<?php
//include "page_ganaderaM.php";
//print_r($_SESSION);

include "../reportes/reporte_rcia_evaluacion.php";


if(isset($_REQUEST['Imprimir']))
{


  $idregistror = intval($_REQUEST['reg']);
  $ano = intval($_REQUEST['anoact']);
  $idmonitoreo = intval($_REQUEST['monit']);

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

  <?php
    if(isset($_POST['anhoActivo_']) && ($_POST['anhoActivo_']>0)){echo " <script> window.location.href='#tabs-3';   </script> ";}

     //echo "aaa AnhoAct1:".$_POST['anhoActivo2_']."-anhoActivo2:".$_POST['anhoActivo_']." -idreg".$_SESSION['idreg']." - 1eranho:".$anho  ;

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
                                        //echo "consultaañoo=".$sql_anho;

                                        $sql_docEvaluacion = "select *
			                            from monitoreo.analisisdocumentacion as a inner join monitoreo.monitoreo as m on a.idmonitoreo = m.idmonitoreo inner join monitoreo.documentacion d on d.idDocumentacion=a.idDocumentacion
			                            where    d.tipodocumento=70 and  m.tipo=267 and  m.idregistro = ".$_SESSION['idreg']." and m.estado=1  and anho=".$anho ;
                                        // echo "CONSULTADETALLE=:".$sql_docEvaluacion;
                                        $ct=0;   ?>


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
                                                                        <td><textarea class="CSSTextArea" name="txtdetalle1-<?php echo $ct; ?>" id="txtdetalle1-<?php echo $ct; ?>" cols="40" rows="3" style="width: 380px;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
															            <td><input name="txtmonto_cantidad1-<?php echo $ct; ?>" type="text" class="boxBusqueda" style="width:220px;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
															            <td><textarea class="CSSTextArea" name="txtobs1-<?php echo $ct; ?>" id="txtobs1-<?php echo $ct; ?>" cols="40" rows="3" style="width:450px;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
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
                                                                        <td><textarea class="CSSTextArea" name="txtdetalle2-<?php echo $ct; ?>" id="txtdetalle2-<?php echo $ct; ?>" cols="40" rows="3" style="width: 380px;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
															            <td><input name="txtmonto_cantidad2-<?php echo $ct; ?>" type="text" class="boxBusqueda" style="width:220px;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
															            <td><textarea class="CSSTextArea" name="txtobs2-<?php echo $ct; ?>" id="txtobs2-<?php echo $ct; ?>" cols="40" rows="3" style="width:450px;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
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
                                                                        <td><textarea class="CSSTextArea" name="txtdetalle3-<?php echo $ct; ?>" id="txtdetalle3-<?php echo $ct; ?>" cols="40" rows="3" style="width: 380px;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
															            <td><input name="txtmonto_cantidad3-<?php echo $ct; ?>" type="text" class="boxBusqueda" style="width:220px;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
															            <td><textarea class="CSSTextArea" name="txtobs3-<?php echo $ct; ?>" id="txtobs3-<?php echo $ct; ?>" cols="40" rows="3" style="width:450px;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
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
                                                                        <td><textarea class="CSSTextArea" name="txtdetalle4-<?php echo $ct; ?>" id="txtdetalle4-<?php echo $ct; ?>" cols="40" rows="3" style="width: 380px;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
															            <td><input name="txtmonto_cantidad4-<?php echo $ct; ?>" type="text" class="boxBusqueda" style="width:220px;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
															            <td><textarea class="CSSTextArea" name="txtobs4-<?php echo $ct; ?>" id="txtobs4-<?php echo $ct; ?>" cols="40" rows="3" style="width:450px;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
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
                                                                        <td><textarea class="CSSTextArea" name="txtdetalle5-<?php echo $ct; ?>" id="txtdetalle5-<?php echo $ct; ?>" cols="40" rows="3" style="width: 380px;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
															            <td><input name="txtmonto_cantidad5-<?php echo $ct; ?>" type="text" class="boxBusqueda" style="width:220px;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
															            <td><textarea class="CSSTextArea" name="txtobs5-<?php echo $ct; ?>" id="txtobs5-<?php echo $ct; ?>" cols="40" rows="3" style="width:450px;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
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
                                                                    <td><textarea class="CSSTextArea" name="txtdetalle6-<?php echo $ct; ?>" id="txtdetalle6-<?php echo $ct; ?>" cols="40" rows="3" style="width: 380px;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
															        <td><input name="txtmonto_cantidad6-<?php echo $ct; ?>" type="text" class="boxBusqueda" style="width:220px;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
															        <td><textarea class="CSSTextArea" name="txtobs6-<?php echo $ct; ?>" id="txtobs6-<?php echo $ct; ?>" cols="40" rows="3" style="width:450px;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
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
                                                            <td><textarea class="CSSTextArea" name="txtdetalle7-<?php echo $ct; ?>" id="txtdetalle7-<?php echo $ct; ?>" cols="40" rows="3" style="width: 380px;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
															<td><input name="txtmonto_cantidad7-<?php echo $ct; ?>" type="text" class="boxBusqueda" style="width:220px;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
															<td><textarea class="CSSTextArea" name="txtobs7-<?php echo $ct; ?>" id="txtobs7-<?php echo $ct; ?>" cols="40" rows="3" style="width:450px;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
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
                                                            <td><textarea class="CSSTextArea" name="txtdetalle8-<?php echo $ct; ?>" id="txtdetalle8-<?php echo $ct; ?>" cols="40" rows="3" style="width: 380px;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
															<td><input name="txtmonto_cantidad8-<?php echo $ct; ?>" type="text" class="boxBusqueda" style="width:220px;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
															<td><textarea class="CSSTextArea" name="txtobs8-<?php echo $ct; ?>" id="txtobs8-<?php echo $ct; ?>" cols="40" rows="3" style="width:450px;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
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
                                                            <td><textarea class="CSSTextArea" name="txtdetalle9-<?php echo $ct; ?>" id="txtdetalle9-<?php echo $ct; ?>" cols="40" rows="3" style="width: 380px;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
															<td><input name="txtmonto_cantidad9-<?php echo $ct; ?>" type="text" class="boxBusqueda" style="width:220px;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
															<td><textarea class="CSSTextArea" name="txtobs9-<?php echo $ct; ?>" id="txtobs9-<?php echo $ct; ?>" cols="40" rows="3" style="width:450px;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
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
                                                            <td><textarea class="CSSTextArea" name="txtdetalle10-<?php echo $ct; ?>" id="txtdetalle10-<?php echo $ct; ?>" cols="40" rows="3" style="width:380px;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
															<td><input name="txtmonto_cantidad10-<?php echo $ct; ?>" type="text" class="boxBusqueda" style="width:220px;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
															<td><textarea class="CSSTextArea" name="txtobs10-<?php echo $ct; ?>" id="txtobs10-<?php echo $ct; ?>" cols="40" rows="3" style="width: 450px;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
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

	<tr><td colspan="4"><hr></td></tr>


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

                //-- CULTIVOS COMPROMETIDOS
                $sql_cultivos = "select c.idcultivo,c.nombrecultivo
			    from monitoreo.monitoreo m inner join monitoreo.plancultivo p on p.idmonitoreo=m.idmonitoreo inner join cultivo c on c.idcultivo=p.idcultivo
                where m.tipo=266 and m.estado = 1 and p.estado = 1 and p.comprometido=0 and m.idregistro  = ".$_SESSION['idreg']."  and m.anho=".$anho." order by c.nombrecultivo asc" ;

                $totalRows_cultivos=0;
			          $rcia_cultivos1 = pg_query($cn,$sql_cultivos);
                $totalRows_cultivos= pg_num_rows($rcia_cultivos1);
                $rcia_cultivos2 = pg_query($cn,$sql_cultivos);

                $cultivos1 = pg_query($cn,$sql_cultivos);
                $cultivos2 = pg_query($cn,$sql_cultivos);
                $cultivos3 = pg_query($cn,$sql_cultivos);
                $cultivos4 = pg_query($cn,$sql_cultivos);
                $cultivos5 = pg_query($cn,$sql_cultivos);
                $cultivos6 = pg_query($cn,$sql_cultivos);
                $cultivos7 = pg_query($cn,$sql_cultivos);

              ///--- FIN SACAR CULTIVOS COMPROMETIDOS


                 //-- CULTIVOS NO COMPROMETIDOS
                $sql_cultivos_no = "select c.idcultivo,c.nombrecultivo
			    from monitoreo.monitoreo m inner join monitoreo.plancultivo p on p.idmonitoreo=m.idmonitoreo inner join cultivo c on c.idcultivo=p.idcultivo
                where m.tipo=266 and m.estado = 1 and p.estado = 1 and p.comprometido=1 and m.idregistro  = ".$_SESSION['idreg']."  and m.anho=".$anho." order by c.nombrecultivo asc" ;

                $totalRows_cultivos_no=0;
		$rcia_cultivos1_no = pg_query($cn,$sql_cultivos_no);
                $totalRows_cultivos_no= pg_num_rows($rcia_cultivos1_no);
                $rcia_cultivos2_no = pg_query($cn,$sql_cultivos_no);

                $cultivos1_no = pg_query($cn,$sql_cultivos_no);
                $cultivos2_no = pg_query($cn,$sql_cultivos_no);
                $cultivos3_no = pg_query($cn,$sql_cultivos_no);
                $cultivos4_no = pg_query($cn,$sql_cultivos_no);
                $cultivos5_no = pg_query($cn,$sql_cultivos_no);
                $cultivos6_no = pg_query($cn,$sql_cultivos_no);
                $cultivos7_no = pg_query($cn,$sql_cultivos_no);

              ///--- FIN SACAR CULTIVOS NO COMPROMETIDOS



              //-- SACANDO PONDERACIONES DE TABLA VALORACION DE ALIMENTOS
               $sql_detEvaluacion = "select *
			    from monitoreo.valoracionalimentos va inner join   monitoreo.monitoreo  m on  va.idmonitoreo = m.idmonitoreo
			    where  va.tipo=70 and  m.idregistro = ".$_SESSION['idreg']." and m.anho=".$anho ;
			    $rcia_detEvaluacion = pg_query($cn,$sql_detEvaluacion);
              //  echo "con=".$sql_detEvaluacion;

                //-- PARA SACAR el iddetallevaloracion de  valoracion de alimentos q esta a lapar
                //.-1
                if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ $cultivoPtos1=$row_detallePtos["puntuacion"]; $idtablaval=$row_detallePtos["idtablavaloracion"]; }else{$cultivoPtos1="";$idtablaval1=0;}
                if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ $cultivoPtos2=$row_detallePtos["puntuacion"]; $idtablava2=$row_detallePtos["idtablavaloracion"]; }else{$cultivoPtos2="";$idtablaval2=0;}
                if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ $cultivoPtos3=$row_detallePtos["puntuacion"]; $idtablava3=$row_detallePtos["idtablavaloracion"]; }else{$cultivoPtos3="";$idtablaval3=0;}
                if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ $cultivoPtos4=$row_detallePtos["puntuacion"]; $idtablava4=$row_detallePtos["idtablavaloracion"]; }else{$cultivoPtos4="";$idtablaval4=0;}
                if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ $cultivoPtos5=$row_detallePtos["puntuacion"]; $idtablava5=$row_detallePtos["idtablavaloracion"]; }else{$cultivoPtos5="";$idtablaval5=0;}
                if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ $cultivoPtos6=$row_detallePtos["puntuacion"]; $idtablava6=$row_detallePtos["idtablavaloracion"]; }else{$cultivoPtos6="";$idtablaval6=0;}
                if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ $cultivoPtos7=$row_detallePtos["puntuacion"]; $idtablava7=$row_detallePtos["idtablavaloracion"]; }else{$cultivoPtos7="";$idtablaval7=0;}


                //-- para consultar el valor de los cultivos dimanicamente
                //$sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorli = ".$idtablaval." and d.idcultivo = ".;
                //$res_cultivo1= pg_query($cn,$sql_cultivo1);



        ?>
      <table class="tableizer-table">


      <thead>
        <tr class="tableizer-firstrow">
            <th colspan = "3"> Evaluación directriz Técnica General</th>
            <th colspan = "2"> Evaluación directriz Técnica Especifica</th>
              <?php //echo "total cult=".$totalRows_cultivos;
                if($totalRows_cultivos>0){
                 //   echo "<th rowspan ='2'> CULTIVOS COMPROMETIDOS</th>";
                   echo "<th colspan ='";  echo $totalRows_cultivos ; echo "' >CULTIVOS COMPROMETIDOS</th>";
                }
               ?>

                 <?php //echo "total cult=".$totalRows_cultivos;
                if($totalRows_cultivos_no>0){
                 //   echo "<th rowspan ='2'>CULTIVOS NO COMPROMETIDOS</th>";
                   echo "<th colspan ='";  echo $totalRows_cultivos_no ; echo "' >CULTIVOS NO COMPROMETIDOS</th>";
                }
               ?>

            <th rowspan = "2"> Ponderación (%)</th>
        </tr>

        <tr >
          <th>Parámetro</th>
          <th colspan = "2">Valoración (%)</th>
          <th>Parámetro</th>
          <th>Valoración  (%)</th>
          <?php

                while ( $row_cultivos2=pg_fetch_assoc($rcia_cultivos2)){

                 echo " <th> "; echo $row_cultivos2["nombrecultivo"] ; echo " </th> ";
                } ?>

          <?php

                while ( $row_cultivos2_no=pg_fetch_assoc($rcia_cultivos2_no)){

                 echo " <th> "; echo $row_cultivos2_no["nombrecultivo"] ; echo " </th> ";
                } ?>


        </tr>
      </thead>


      <tbody style="text-align:center;">

       <tr><td rowspan = "4">Superficie de siembra comprometida en el área deforestada sin autorización por cultivos estratégicos de acuerdo a programación (ha) </td><td rowspan = "4">De 0 al 100% de forma directa en relación a la superficie programada</td><td rowspan = "4">70</td><td>Documento de comercialización de la producción  </td> <td>30</td>
        <?php
            $icult=1;

            while ( $icult<=$totalRows_cultivos){
                $row_c1=pg_fetch_assoc($cultivos1);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablaval." and d.idcultivo = ".$row_c1["idcultivo"];
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                   $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
               // echo "consuta1=".$sql_cultivo1;
             ?>
            <td><input name="doccomer<?php echo $icult; ?>" id="doccomer<?php echo $icult; ?>" type="text" class="boxBusqueda4" value="<?php echo  $res_cultivo1r["puntuacioncultivo"]; ?>" onKeyUp="extractNumber(this,0,false);  " onKeyPress="return blockNonNumbers(this, event, true, false);  "    > </td>

        <?php
        $icult++; } ?>

            <?php
            $icult1_no=1;
            while ( $icult1_no<=$totalRows_cultivos_no){
                $row_c1=pg_fetch_assoc($cultivos1_no);
                $sql_cultivo1_no=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablaval." and d.idcultivo = ".$row_c1["idcultivo"];
               // echo "consuta si2=".$sql_cultivo1_no;
                $ressql_cultivo1= pg_query($cn,$sql_cultivo1_no);
                   $res_cultivo1r_no="";
                if($res_cultivo1r_no=pg_fetch_assoc($ressql_cultivo1)){}else{$res_cultivo1r_no="";}
               // echo "consuta1=".$sql_cultivo1_no." fech=".$res_cultivo1r_no[0];
             ?>
            <td><input name="doccomer<?php echo $icult1_no."_no"; ?>" id="doccomer<?php echo $icult1_no."_no"; ?>" type="text" class="boxBusqueda4" value="<?php if(isset($res_cultivo1r_no["puntuacioncultivo"])){echo  $res_cultivo1r_no["puntuacioncultivo"];}  ?>" onKeyUp="extractNumber(this,0,false); promediar1(this,30); " onKeyPress="return blockNonNumbers(this, event, true, false);  "    > </td>

        <?php
        $icult1_no++; } ?>


       <td> <input   ReadOnly="true" name="doccomerPonderacion" id="doccomerPonderacion"  value="<?php  echo $cultivoPtos1;  ?>"   type="text" class="boxBusqueda4"  onKeyUp="extractNumber(this,0,false); " onKeyPress="return blockNonNumbers(this, event, true, false); "    >   </td></tr>

       <tr><td>Compra de semilla certificada </td><td>20</td>
               <?php
            $icult=1;
            while ( $icult<=$totalRows_cultivos){
                $row_c1=pg_fetch_assoc($cultivos2);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava2." and d.idcultivo = ".$row_c1["idcultivo"];
               // echo "consuta si2=".$sql_cultivo1;
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}

            ?>
              <td><input name="compSemilla<?php echo $icult; ?>" id="compSemilla<?php echo $icult; ?>" type="text" class="boxBusqueda4" value="<?php if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];}  ?>"  onKeyUp="extractNumber(this,0,false); promediar2(this,20); " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
        <?php
        $icult++; } ?>


         <?php
            $icult=1;
            while ( $icult<=$totalRows_cultivos_no){
                $row_c1=pg_fetch_assoc($cultivos2_no);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava2." and d.idcultivo = ".$row_c1["idcultivo"];
              //  echo "consuta si2=".$sql_cultivo1;
                $res_cultivo2_no= pg_query($cn,$sql_cultivo1);
                $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo2_no)){}else{$res_cultivo1r="";}
                //echo " row0=".$res_cultivo1r[0];

            ?>
              <td><input name="compSemilla<?php echo $icult."_no"; ?>" id="compSemilla<?php echo $icult."_no"; ?>" type="text" class="boxBusqueda4" value="<?php if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];}  ?>"  onKeyUp="extractNumber(this,0,false); promediar2(this,20); " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
        <?php
        $icult++; } ?>




       <td> <input ReadOnly="true" name="compSemillaPonderacion" id="compSemillaPonderacion"   value="<?php   echo $cultivoPtos2;  ?>"   type="text" class="boxBusqueda4"  onKeyUp="extractNumber(this,0,false); " onKeyPress="return blockNonNumbers(this, event, true, false); "    >   </td></tr>

       <tr><td>Adquisición de insumos</td><td>15</td>
         <?php
            $icult=1;
            while ( $icult<=$totalRows_cultivos){
                $row_c1=pg_fetch_assoc($cultivos3);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava3." and d.idcultivo = ".$row_c1["idcultivo"];
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                $res_cultivo1r=pg_fetch_assoc($res_cultivo1);
            ?>
              <td><input name="adquInsumo<?php echo $icult; ?>" id="adquInsumo<?php echo $icult; ?>" type="text" class="boxBusqueda4" value="<?php if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];}  ?>"  onKeyUp="extractNumber(this,0,false); promediar3(this,15);" onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
        <?php
        $icult++; } ?>


         <?php
            $icult=1;
            while ( $icult<=$totalRows_cultivos_no){
                $row_c1=pg_fetch_assoc($cultivos3_no);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava3." and d.idcultivo = ".$row_c1["idcultivo"];
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                $res_cultivo1r=pg_fetch_assoc($res_cultivo1);
            ?>
              <td><input name="adquInsumo<?php echo $icult."_no"; ?>" id="adquInsumo<?php echo $icult."_no"; ?>" type="text" class="boxBusqueda4" value="<?php if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];}  ?>"  onKeyUp="extractNumber(this,0,false); promediar3(this,15);" onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
        <?php
        $icult++; } ?>




        <td> <input ReadOnly="true" name="adquInsumoPonderacion" id="adquInsumoPonderacion"    value="<?php   echo $cultivoPtos3;  ?>"   type="text" class="boxBusqueda4"  onKeyUp="extractNumber(this,0,false); " onKeyPress="return blockNonNumbers(this, event, true, false); "    >   </td></tr>

       <tr><td> Combustibles y lubricantes</td><td>5</td>

        <?php
            $icult=1;
            while ( $icult<=$totalRows_cultivos){
                $row_c1=pg_fetch_assoc($cultivos4);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava4." and d.idcultivo = ".$row_c1["idcultivo"];
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                   $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
               // echo "consuta1=".$sql_cultivo1;
             ?>
              <td><input name="combusible<?php echo $icult; ?>" id="combusible<?php echo $icult; ?>" type="text" class="boxBusqueda4"  value="<?php if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];}  ?>" onKeyUp="extractNumber(this,0,false); promediar4(this,5);" onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
        <?php
        $icult++; } ?>



         <?php
            $icult=1;
            while ( $icult<=$totalRows_cultivos_no){
                $row_c1=pg_fetch_assoc($cultivos4_no);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava4." and d.idcultivo = ".$row_c1["idcultivo"];
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                   $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
               // echo "consuta1=".$sql_cultivo1;
             ?>
              <td><input name="combusible<?php echo $icult."_no"; ?>" id="combusible<?php echo $icult."_no"; ?>" type="text" class="boxBusqueda4"  value="<?php if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];}  ?>" onKeyUp="extractNumber(this,0,false); promediar4(this,5);" onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
        <?php
        $icult++; } ?>



       <td> <input ReadOnly="true" name="combusiblePonderacion" id="combusiblePonderacion"     value="<?php   echo $cultivoPtos4;  ?>"   type="text" class="boxBusqueda4"  onKeyUp="extractNumber(this,0,false); " onKeyPress="return blockNonNumbers(this, event, true, false); "    >   </td></tr>

       <tr><td rowspan = "2">Aplicación de técnicas y tecnologías sostenibles: - Siembra directa.   -Rotacion de Cultivos</td><td rowspan = "2">De acuerdo a grados de aplicación: 1 Tecnica = 50%  2 Tecnicas= 100%</td><td rowspan = "2">30</td><td>Compra de semilla certificada y/o, venta de producto (que demuestren rotación de cultivo)</td><td>15</td>

        <?php
            $icult=1;
            while ( $icult<=$totalRows_cultivos){
                $row_c1=pg_fetch_assoc($cultivos5);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava5." and d.idcultivo = ".$row_c1["idcultivo"];
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                   $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
               // echo "consuta1=".$sql_cultivo1;
             ?>
              <td><input name="aplicacion<?php echo $icult; ?>" id="aplicacion<?php echo $icult; ?>" type="text" class="boxBusqueda4" value="<?php if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];}  ?>" onKeyUp="extractNumber(this,0,false); promediar5(this,15); " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
        <?php
        $icult++; } ?>


                <?php
            $icult=1;
            while ( $icult<=$totalRows_cultivos_no){
                $row_c1=pg_fetch_assoc($cultivos5_no);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava5." and d.idcultivo = ".$row_c1["idcultivo"];
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                   $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
               // echo "consuta1=".$sql_cultivo1;
             ?>
              <td><input name="aplicacion<?php echo $icult."_no"; ?>" id="aplicacion<?php echo $icult."_no"; ?>" type="text" class="boxBusqueda4" value="<?php if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];}  ?>" onKeyUp="extractNumber(this,0,false); promediar5(this,15); " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
        <?php
        $icult++; } ?>



        <td> <input ReadOnly="true" name="aplicacionPonderacion" id="aplicacionPonderacion"   value="<?php   echo $cultivoPtos5;  ?>"   type="text" class="boxBusqueda4"   onKeyUp="extractNumber(this,0,false); " onKeyPress="return blockNonNumbers(this, event, true, false); "    >   </td></tr>

       <tr><td>Compra y/o alquiler de maquinaria y herramientas de siembra directa y/o insumos que demuestre siembra directa</td><td>15</td>

       <?php
            $icult=1;
            while ( $icult<=$totalRows_cultivos){
                $row_c1=pg_fetch_assoc($cultivos6);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava6." and d.idcultivo = ".$row_c1["idcultivo"];
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                   $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
               // echo "consuta1=".$sql_cultivo1;
             ?>
              <td><input name="maqHerra<?php echo $icult; ?>" id="maqHerra<?php echo $icult; ?>" type="text" class="boxBusqueda4" value="<?php if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];}  ?>" onKeyUp="extractNumber(this,0,false); promediar6(this,15); " onKeyUp="extractNumber(this,0,false); " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
        <?php
        $icult++; } ?>


        <?php
        $icult=1;
        while ( $icult<=$totalRows_cultivos_no){
                $row_c1=pg_fetch_assoc($cultivos6_no);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava6." and d.idcultivo = ".$row_c1["idcultivo"];
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                   $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
               // echo "consuta1=".$sql_cultivo1;
             ?>
              <td><input name="maqHerra<?php echo $icult."_no"; ?>" id="maqHerra<?php echo $icult."_no"; ?>" type="text" class="boxBusqueda4" value="<?php if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];}  ?>" onKeyUp="extractNumber(this,0,false); promediar6(this,15); " onKeyUp="extractNumber(this,0,false); " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
        <?php
        $icult++; } ?>



       <td> <input ReadOnly="true" name="maqHerraPonderacion" id="maqHerraPonderacion"  value="<?php   echo $cultivoPtos6;  ?>"  type="text" class="boxBusqueda4"   onKeyUp="extractNumber(this,0,false); " onKeyPress="return blockNonNumbers(this, event, true, false); "    >   </td></tr>

       <tr><td colspan = "2">Uso de abonos e insumos ecológicos. (*)</td><td>5</td><td>Adquisición de insumos ecológicos</td><td>5</td>

       <?php
            $icult=1;
            while ( $icult<=$totalRows_cultivos){
                $row_c1=pg_fetch_assoc($cultivos7);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava7." and d.idcultivo = ".$row_c1["idcultivo"];
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                   $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
               // echo "consuta1=".$sql_cultivo1;
             ?>
              <td><input name="abonoIns<?php echo $icult; ?>" id="abonoIns<?php echo $icult; ?>" type="text" class="boxBusqueda4" value="<?php if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];}  ?>"  onKeyUp="extractNumber(this,0,false); promediar7(this,5);  " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
        <?php
        $icult++; } ?>


        <?php
         $icult=1;
         while ( $icult<=$totalRows_cultivos_no){
                $row_c1=pg_fetch_assoc($cultivos7_no);
                $sql_cultivo1=" select * from  monitoreo.detallevalorcultivo d  where  d.idtablavalorali = ".$idtablava7." and d.idcultivo = ".$row_c1["idcultivo"];
                $res_cultivo1= pg_query($cn,$sql_cultivo1);
                   $res_cultivo1r="";
                if($res_cultivo1r=pg_fetch_assoc($res_cultivo1)){}else{$res_cultivo1r="";}
               // echo "consuta1=".$sql_cultivo1;
             ?>
              <td><input name="abonoIns<?php echo $icult."_no"; ?>" id="abonoIns<?php echo $icult."_no"; ?>" type="text" class="boxBusqueda4" value="<?php if(isset($res_cultivo1r["puntuacioncultivo"])){echo  $res_cultivo1r["puntuacioncultivo"];}  ?>"  onKeyUp="extractNumber(this,0,false); promediar7(this,5);  " onKeyPress="return blockNonNumbers(this, event, true, false); "    > </td>
        <?php
        $icult++; } ?>


       <td> <input ReadOnly="true" name="abonoInsPonderacion" id="abonoInsPonderacion"    value="<?php   echo $cultivoPtos7;  ?>"   type="text" class="boxBusqueda4"   onKeyUp="extractNumber(this,0,false); " onKeyPress="return blockNonNumbers(this, event, true, false); "    >   </td></tr>

       <tr><td colspan = "<?php echo $totalRows_cultivos+$totalRows_cultivos_no+5;?>">PONDERACION FINAL (%)</td><td id="totalgeneral" ></td></tr>
      </tbody>

    </table>







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
<input id="totalCultivo" type="hidden" value="<?php echo $totalRows_cultivos;?>" name="totalCultivo">
<input id="totalCultivo_no" type="hidden" value="<?php echo $totalRows_cultivos_no;?>" name="totalCultivo_no">

</form>


<div style="height:20px;" ></div>



</div>






<script language="javascript" type="text/javascript">


 function promediar1(obj,param) {
   // alert('valor='+obj.value+'  - parametro='+param);
    if(obj.value>param){
       alert('El valor tiene que ser Menor o igual a '+param);
       obj.value=param;

    }else{


        }

    cantCult=0;
    cantCult=document.getElementById('totalCultivo').value;
    suma1=0;
    for (var i = 1; i<= cantCult; ++i) {
            if(document.getElementById("doccomer"+i).value.length>0){
                suma1=suma1+parseInt(document.getElementById('doccomer'+i).value);
               // alert("doccomer"+i+"--"+suma1);
            }
    }

//-- NO COMPROMETIDOS
    cantCult_no=0;
    cantCult_no=document.getElementById('totalCultivo_no').value;
    suma2=0;
    // alert("cantidad="+cantCult_no);
    for (var ii = 1; ii<= cantCult_no; ++ii) {
       // alert(document.getElementById('doccomer'+ii+"_no").value);
           if(document.getElementById("doccomer"+ii+"_no").value.length>0){
                suma2=suma2+parseInt(document.getElementById('doccomer'+ii+"_no").value);
            }
    }

    totalc=document.getElementById('totalCultivo').value;
    totalc_no=document.getElementById('totalCultivo_no').value;
    //document.getElementById('doccomerPonderacion').value=Math.round(suma1/(parseInt(totalc)) );
   // alert("suma1="+suma1+"- suma2="+suma2+" -total1="+totalc+" -total2="+totalc_no);
    document.getElementById('doccomerPonderacion').value=Math.round((suma1+suma2)/(parseInt(totalc)+parseInt(totalc_no)) );

    sumatoria_agricola();
}


 function promediar2(obj,param) {
    //alert('valor='+obj.value+'  - parametro='+param);
    if(obj.value>param){
       alert('El valor tiene que ser Menor o igual a '+param);
       obj.value=param;

    }else{
        }

    cantCult=0;
    cantCult=document.getElementById('totalCultivo').value;
    suma1=0;
    for (var i = 1; i<= cantCult; ++i) {
            if(document.getElementById("compSemilla"+i).value.length>0){
                suma1=suma1+parseInt(document.getElementById('compSemilla'+i).value);

            }
    }


    //-- NO COMPROMETIDOS
    cantCult_no=0;
    cantCult_no=document.getElementById('totalCultivo_no').value;
    suma2=0;
    // alert("cantidad="+cantCult_no);
    for (var ii = 1; ii<= cantCult_no; ++ii) {
       // alert(document.getElementById('doccomer'+ii+"_no").value);
           if(document.getElementById("compSemilla"+ii+"_no").value.length>0){
                suma2=suma2+parseInt(document.getElementById('compSemilla'+ii+"_no").value);
            }
    }

    totalc=document.getElementById('totalCultivo').value;
    totalc_no=document.getElementById('totalCultivo_no').value;
    document.getElementById('compSemillaPonderacion').value=Math.round((suma1+suma2)/(parseInt(totalc)+parseInt(totalc_no)) );


   //totalc=document.getElementById('totalCultivo').value;
    //document.getElementById('compSemillaPonderacion').value=Math.round(suma1/parseInt(totalc));

    sumatoria_agricola();
}


 function promediar3(obj,param) {
    //alert('valor='+obj.value+'  - parametro='+param);
    if(obj.value>param){
       alert('El valor tiene que ser Menor o igual a '+param);
       obj.value=param;

    }else{
        }

    cantCult=0;
    cantCult=document.getElementById('totalCultivo').value;
    suma1=0;
    for (var i = 1; i<= cantCult; ++i) {
            if(document.getElementById("adquInsumo"+i).value.length>0){
                suma1=suma1+parseInt(document.getElementById('adquInsumo'+i).value);
               // alert("doccomer"+i+"--"+suma1);
            }
    }


    //-- NO COMPROMETIDOS
    cantCult_no=0;
    cantCult_no=document.getElementById('totalCultivo_no').value;
    suma2=0;
    // alert("cantidad="+cantCult_no);
    for (var ii = 1; ii<= cantCult_no; ++ii) {
       // alert(document.getElementById('doccomer'+ii+"_no").value);
           if(document.getElementById("adquInsumo"+ii+"_no").value.length>0){
                suma2=suma2+parseInt(document.getElementById('adquInsumo'+ii+"_no").value);
            }
    }

    totalc=document.getElementById('totalCultivo').value;
    totalc_no=document.getElementById('totalCultivo_no').value;
    document.getElementById('adquInsumoPonderacion').value=Math.round((suma1+suma2)/(parseInt(totalc)+parseInt(totalc_no)) );


  // totalc=document.getElementById('totalCultivo').value;
   //  document.getElementById('adquInsumoPonderacion').value=Math.round(suma1/parseInt(totalc));

    sumatoria_agricola();
}


 function promediar4(obj,param) {
    //alert('valor='+obj.value+'  - parametro='+param);
    if(obj.value>param){
       alert('El valor tiene que ser Menor o igual a '+param);
       obj.value=param;

    }else{


        }

    cantCult=0;
    cantCult=document.getElementById('totalCultivo').value;
    suma1=0;
    for (var i = 1; i<= cantCult; ++i) {
            if(document.getElementById("combusible"+i).value.length>0){
                suma1=suma1+parseInt(document.getElementById('combusible'+i).value);
            }
    }


        //-- NO COMPROMETIDOS
    cantCult_no=0;
    cantCult_no=document.getElementById('totalCultivo_no').value;
    suma2=0;
    // alert("cantidad="+cantCult_no);
    for (var ii = 1; ii<= cantCult_no; ++ii) {
       // alert(document.getElementById('doccomer'+ii+"_no").value);
           if(document.getElementById("combusible"+ii+"_no").value.length>0){
                suma2=suma2+parseInt(document.getElementById('combusible'+ii+"_no").value);
            }
    }

    totalc=document.getElementById('totalCultivo').value;
    totalc_no=document.getElementById('totalCultivo_no').value;
    document.getElementById('combusiblePonderacion').value=Math.round((suma1+suma2)/(parseInt(totalc)+parseInt(totalc_no)) );


   // document.getElementById('combusiblePonderacion').value=suma1;
   // totalc=document.getElementById('totalCultivo').value;
   //  document.getElementById('combusiblePonderacion').value=Math.round(suma1/parseInt(totalc));

    sumatoria_agricola();
}


 function promediar5(obj,param) {
    //alert('valor='+obj.value+'  - parametro='+param);
    if(obj.value>param){
       alert('El valor tiene que ser Menor o igual a '+param);
       obj.value=param;

    }else{


        }

    cantCult=0;
    cantCult=document.getElementById('totalCultivo').value;
    suma1=0;
    for (var i = 1; i<= cantCult; ++i) {
            if(document.getElementById("aplicacion"+i).value.length>0){
                suma1=suma1+parseInt(document.getElementById('aplicacion'+i).value);
               // alert("doccomer"+i+"--"+suma1);
            }
    }

    //-- NO COMPROMETIDOS
    cantCult_no=0;
    cantCult_no=document.getElementById('totalCultivo_no').value;
    suma2=0;
    // alert("cantidad="+cantCult_no);
    for (var ii = 1; ii<= cantCult_no; ++ii) {
       // alert(document.getElementById('doccomer'+ii+"_no").value);
           if(document.getElementById("aplicacion"+ii+"_no").value.length>0){
                suma2=suma2+parseInt(document.getElementById('aplicacion'+ii+"_no").value);
            }
    }

    totalc=document.getElementById('totalCultivo').value;
    totalc_no=document.getElementById('totalCultivo_no').value;
    document.getElementById('aplicacionPonderacion').value=Math.round((suma1+suma2)/(parseInt(totalc)+parseInt(totalc_no)) );


    // document.getElementById('aplicacionPonderacion').value=suma1;
    // totalc=document.getElementById('totalCultivo').value;
    // document.getElementById('aplicacionPonderacion').value=Math.round(suma1/parseInt(totalc));
    sumatoria_agricola();
}


 function promediar6(obj,param) {
    //alert('valor='+obj.value+'  - parametro='+param);
    if(obj.value>param){
       alert('El valor tiene que ser Menor o igual a '+param);
       obj.value=param;

    }else{


        }

    cantCult=0;
    cantCult=document.getElementById('totalCultivo').value;
    suma1=0;
    for (var i = 1; i<= cantCult; ++i) {
            if(document.getElementById("maqHerra"+i).value.length>0){
                suma1=suma1+parseInt(document.getElementById('maqHerra'+i).value);
            }
    }


    //-- NO COMPROMETIDOS
    cantCult_no=0;
    cantCult_no=document.getElementById('totalCultivo_no').value;
    suma2=0;
    // alert("cantidad="+cantCult_no);
    for (var ii = 1; ii<= cantCult_no; ++ii) {
       // alert(document.getElementById('doccomer'+ii+"_no").value);
           if(document.getElementById("maqHerra"+ii+"_no").value.length>0){
                suma2=suma2+parseInt(document.getElementById('maqHerra'+ii+"_no").value);
            }
    }

    totalc=document.getElementById('totalCultivo').value;
    totalc_no=document.getElementById('totalCultivo_no').value;
    document.getElementById('maqHerraPonderacion').value=Math.round((suma1+suma2)/(parseInt(totalc)+parseInt(totalc_no)) );



   // document.getElementById('maqHerraPonderacion').value=suma1;
//   totalc=document.getElementById('totalCultivo').value;
  //   document.getElementById('maqHerraPonderacion').value=Math.round(suma1/parseInt(totalc));
    sumatoria_agricola();
}


 function promediar7(obj,param) {
    //alert('valor='+obj.value+'  - parametro='+param);
    if(obj.value>param){
       alert('El valor tiene que ser Menor o igual a '+param);
       obj.value=param;

    }else{


        }

    cantCult=0;
    cantCult=document.getElementById('totalCultivo').value;
    suma1=0;
    for (var i = 1; i<= cantCult; ++i) {
            if(document.getElementById("abonoIns"+i).value.length>0){
                suma1=suma1+parseInt(document.getElementById('abonoIns'+i).value);

            }
    }

    //-- NO COMPROMETIDOS
    cantCult_no=0;
    cantCult_no=document.getElementById('totalCultivo_no').value;
    suma2=0;
    // alert("cantidad="+cantCult_no);
    for (var ii = 1; ii<= cantCult_no; ++ii) {
       // alert(document.getElementById('doccomer'+ii+"_no").value);
           if(document.getElementById("abonoIns"+ii+"_no").value.length>0){
                suma2=suma2+parseInt(document.getElementById('abonoIns'+ii+"_no").value);
            }
    }

    totalc=document.getElementById('totalCultivo').value;
    totalc_no=document.getElementById('totalCultivo_no').value;
    document.getElementById('abonoInsPonderacion').value=Math.round((suma1+suma2)/(parseInt(totalc)+parseInt(totalc_no)) );



   // document.getElementById('abonoInsPonderacion').value=suma1;
    //totalc=document.getElementById('totalCultivo').value;
    // document.getElementById('abonoInsPonderacion').value=Math.round(suma1/parseInt(totalc));
    sumatoria_agricola();
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
      // alert('entroo año1');

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
            input3.setAttribute('class', 'CSSTextArea');
            input3.setAttribute('cols', '40');
            input3.setAttribute('rows', '4');
            input3.setAttribute('style', 'width: 380px;');
            input3.setAttribute('id', 'txtdetalle1-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad1-'+contadorC);
            input4.setAttribute('class', 'boxBusqueda');
            input4.setAttribute('style', 'width: 220px;');
            input4.setAttribute('id', 'txtmonto_cantidad1-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs1-'+contadorC);
            input5.setAttribute('class', 'CSSTextArea');
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
            input3.setAttribute('class', 'CSSTextArea');
            input3.setAttribute('cols', '40');
            input3.setAttribute('rows', '4');
            input3.setAttribute('style', 'width: 380px;');
            input3.setAttribute('id', 'txtdetalle2-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad2-'+contadorC);
            input4.setAttribute('class', 'boxBusqueda');
            input4.setAttribute('style', 'width: 220px;');
            input4.setAttribute('id', 'txtmonto_cantidad2-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs2-'+contadorC);
            input5.setAttribute('class', 'CSSTextArea');
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
            input3.setAttribute('class', 'CSSTextArea');
            input3.setAttribute('cols', '40');
            input3.setAttribute('rows', '4');
            input3.setAttribute('style', 'width: 380px;');
            input3.setAttribute('id', 'txtdetalle3-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad3-'+contadorC);
            input4.setAttribute('class', 'boxBusqueda');
            input4.setAttribute('style', 'width: 220px;');
            input4.setAttribute('id', 'txtmonto_cantidad3-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs3-'+contadorC);
            input5.setAttribute('class', 'CSSTextArea');
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
            input3.setAttribute('class', 'CSSTextArea');
            input3.setAttribute('cols', '40');
            input3.setAttribute('rows', '4');
            input3.setAttribute('style', 'width: 380px;');
            input3.setAttribute('id', 'txtdetalle4-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad4-'+contadorC);
            input4.setAttribute('class', 'boxBusqueda');
            input4.setAttribute('style', 'width: 220px;');
            input4.setAttribute('id', 'txtmonto_cantidad4-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs4-'+contadorC);
            input5.setAttribute('class', 'CSSTextArea');
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
            input3.setAttribute('class', 'CSSTextArea');
            input3.setAttribute('cols', '40');
            input3.setAttribute('rows', '4');
            input3.setAttribute('style', 'width: 380px;');
            input3.setAttribute('id', 'txtdetalle5-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad5-'+contadorC);
            input4.setAttribute('class', 'boxBusqueda');
            input4.setAttribute('style', 'width: 220px;');
            input4.setAttribute('id', 'txtmonto_cantidad5-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs5-'+contadorC);
            input5.setAttribute('class', 'CSSTextArea');
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
            input3.setAttribute('class', 'CSSTextArea');
            input3.setAttribute('cols', '40');
            input3.setAttribute('rows', '4');
            input3.setAttribute('style', 'width: 380px;');
            input3.setAttribute('id', 'txtdetalle6-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad6-'+contadorC);
            input4.setAttribute('class', 'boxBusqueda');
            input4.setAttribute('style', 'width: 220px;');
            input4.setAttribute('id', 'txtmonto_cantidad6-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs6-'+contadorC);
            input5.setAttribute('class', 'CSSTextArea');
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
            input3.setAttribute('class', 'CSSTextArea');
            input3.setAttribute('cols', '40');
            input3.setAttribute('rows', '4');
            input3.setAttribute('style', 'width: 380px;');
            input3.setAttribute('id', 'txtdetalle7-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad7-'+contadorC);
            input4.setAttribute('class', 'boxBusqueda');
            input4.setAttribute('style', 'width: 220px;');
            input4.setAttribute('id', 'txtmonto_cantidad7-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs7-'+contadorC);
            input5.setAttribute('class', 'CSSTextArea');
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
            input3.setAttribute('class', 'CSSTextArea');
            input3.setAttribute('cols', '40');
            input3.setAttribute('rows', '4');
            input3.setAttribute('style', 'width: 380px;');
            input3.setAttribute('id', 'txtdetalle8-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad8-'+contadorC);
            input4.setAttribute('class', 'boxBusqueda');
            input4.setAttribute('style', 'width: 220px;');
            input4.setAttribute('id', 'txtmonto_cantidad8-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs8-'+contadorC);
            input5.setAttribute('class', 'CSSTextArea');
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
            input3.setAttribute('class', 'CSSTextArea');
            input3.setAttribute('cols', '40');
            input3.setAttribute('rows', '4');
            input3.setAttribute('style', 'width: 380px;');
            input3.setAttribute('id', 'txtdetalle9-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad9-'+contadorC);
            input4.setAttribute('class', 'boxBusqueda');
            input4.setAttribute('style', 'width: 220px;');
            input4.setAttribute('id', 'txtmonto_cantidad9-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs9-'+contadorC);
            input5.setAttribute('class', 'CSSTextArea');
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
            input3.setAttribute('class', 'CSSTextArea');
            input3.setAttribute('cols', '40');
            input3.setAttribute('rows', '4');
            input3.setAttribute('style', 'width: 380px;');
            input3.setAttribute('id', 'txtdetalle10-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad10-'+contadorC);
            input4.setAttribute('class', 'boxBusqueda');
            input4.setAttribute('style', 'width: 220px;');
            input4.setAttribute('id', 'txtmonto_cantidad10-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs10-'+contadorC);
            input5.setAttribute('class', 'CSSTextArea');
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


 sumatoria_agricola();


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




</script>
