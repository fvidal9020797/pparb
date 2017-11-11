<?php

//include "page_ganadera_lechera.php";

include "page_ganaderaEvaluacion.php";
//print_r($_SESSION);
include "../reportes/reporte_rcia_evaluacion.php";


if(isset($_REQUEST['Imprimir']))
{


  $idregistror = intval($_REQUEST['reg']);
  $ano = intval($_REQUEST['anoact']);
  $idmonitoreo = intval($_REQUEST['monit']);

  //echo $ano;
	Imprimirrciaevaluacion($idregistror,$ano,$idmonitoreo);
}


?>
<div class="texto">

 <form action="tab_ganadero_lechero.php" method="POST" autocomplete="off" name="form-evalganadrcia2" id="form-evalganadrcia2" enctype="multipart/form-data" >
     <input id="anhoActivo_" type="hidden" value="<?php if(isset($_POST['anhoActivo_']) && ($_POST['anhoActivo_']>0)){echo $_POST['anhoActivo_']; }else{echo "0";} ?> " name="anhoActivo_">
     <input id="anhoActivo2_" type="hidden" value="<?php if(isset($_POST['anhoActivo2_']) ){echo $_POST['anhoActivo2_']; }else{echo "0";} ?> " name="anhoActivo2_">
</form>

 <form action="evaluacion_ganaderalechera_rcia.php" method="POST" autocomplete="off" name="form-evalganadrcia" id="form-evalganadrcia" enctype="multipart/form-data" >
<input id="idperiodo" type="hidden" value="<?php echo $periodo;?>" name="idperiodo">
 <?php
    if(isset($_POST['anhoActivo_']) && ($_POST['anhoActivo_']>0)){echo " <script> window.location.href='#tabs-3'; </script> ";}

 ?>



 <table width="90%" border="0" class='taulaA' align="center">
	<tr class="texto_normal">
		<td colspan="2" id='blau'><span class="taulaH">Años de Valoración de Valoración del XX RCIA</span></td>
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
                    <td align="center"  ><button    id="idbtn3" name ="idbtn3" <?php if(isset($_POST['anhoActivo2_']) && ($_POST['anhoActivo2_']=='Año 2016')){echo " style='cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;' ";  }else{echo "style='color:#000000;  padding: 8px 11px;' ";} ?> type="button" value="0"  onClick="javascript:cambiarAnho(this);" >Año 2016</button></td>
                    <td align="center"  ><button    id="idbtn4" name ="idbtn4" <?php if(isset($_POST['anhoActivo2_']) && ($_POST['anhoActivo2_']=='Año 2017')){echo " style='cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;' "; }else{echo "style='color:#000000;  padding: 8px 11px;' ";} ?> type="button" value="0"  onClick="javascript:cambiarAnho(this);" >Año 2017</button></td>
                    <td align="center"  ><button     id="idbtn5" name ="idbtn5" <?php if(isset($_POST['anhoActivo2_']) && ($_POST['anhoActivo2_']=='Año 2018')){echo " style='cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;' "; }else{echo "style='color:#000000;  padding: 8px 11px;' ";} ?> type="button" value="0"  onClick="javascript:cambiarAnho(this);" >Año 2018</button></td>
                    </tr>

                <?php
                }
                elseif ($periodo == 2)
                {
                ?>
                    <tr>
                    <td align="center"   ><button      id="idbtn1_" name="idbtn1_" <?php if(isset($_POST['anhoActivo2_']) && ($_POST['anhoActivo2_']=='Año 2016')){echo " style='cursor:pointer;color:#000000;  background-color: #7fc345; padding: 8px 11px;' "; }else{echo "style='color:#000000;  padding: 8px 11px;' ";} ?>  onClick="javascript:cambiarAnho(this);" type="button" value="0">Año 2016</button></td>
                    <td align="center"   ><button      id="idbtn2_" name="idbtn2_" <?php if(isset($_POST['anhoActivo2_']) && ($_POST['anhoActivo2_']=='Año 2017')){echo " style='cursor:pointer;color:#000000;  background-color: #7fc345; padding: 8px 11px;' "; }else{echo "style='color:#000000;  padding: 8px 11px;' ";} ?>  onClick="javascript:cambiarAnho(this);" type="button" value="0">Año 2017</button></td>
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
		<td height="14" colspan="4" id='blau'><span class="taulaH">1. Análisis de la Documentación Ganadera</span></td>
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

                                                     <!--<input name="submit3" type="button" class='cabecera2' value="Agregar Documento" onClick="javascript:onclick_agregarDetalle();" >-->
                                                     <!-- <input id="AddAnalisisdocganarcia" class="boton verde formaBoton" type="submit" value="Guardar" name="AddAnalisisdocganarcia" >-->
													  <input name="submit3" type="button" class='cabecera2' value="Eliminar Documento" onClick="javascript:deleteRowRciaGral();">
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
                                                    //echo "consultaañoo=".$sql_anho;
                                                    $monit = $row_anho["idmonitoreo"];

                                                    $sql_docEvaluacion = "select *
			                                        from monitoreo.analisisdocumentacion as a inner join monitoreo.monitoreo as m on a.idmonitoreo = m.idmonitoreo inner join monitoreo.documentacion d on d.idDocumentacion=a.idDocumentacion
			                                        where    d.tipodocumento=101 and  m.tipo=267 and  m.idregistro = ".$_SESSION['idreg']." and m.estado=1  and anho=".$anho ;
                                                   // echo "CONSULTADETALLE=:".$sql_docEvaluacion;
                                                   $ct=0;
			                                       /* $rcia_docEvaluacion = pg_query($cn,$sql_docEvaluacion);
                                                     while ($row_docEvaluacion = pg_fetch_assoc($rcia_docEvaluacion)  ){
                                                          $ct++;*/  ?>

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
                                                                     <td colspan="4" width="90%">Uso de alimentos suplementarios</td>
                                                                     <td width="4%"><input name="btn1" type="button" class='cabecera2' value="Agregar" onClick="javascript:onclick_agregarDetalle1();" ></td>
                                                                  </tr>
                                                                  <?php
                                                                $rcia_docEvaluacion = pg_query($cn,$sql_docEvaluacion);
                                                                while ($row_docEvaluacion = pg_fetch_assoc($rcia_docEvaluacion)  ){
                                                                $ct++;
                                                                      if($row_docEvaluacion['iddocumentacion']==23){  //--- iddoc= 23 =Uso de alimentos suplementarios
                                                                       ?>
                                                                        <tr><td  width="2%" height="24"><input type="checkbox" name="chk"/></td>
                                                                        <td  width="30%"><textarea class="CSSTextArea" name="txtdetalle1-<?php echo $ct; ?>" id="txtdetalle1-<?php echo $ct; ?>" cols="40" rows="3" style="width:99%;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
															            <td width="18%" > <input name="txtmonto_cantidad1-<?php echo $ct; ?>" type="text" class="boxBusqueda" style="width:99%;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
															            <td width="35%" ><textarea class="CSSTextArea" name="txtobs1-<?php echo $ct; ?>" id="txtobs1-<?php echo $ct; ?>" cols="40" rows="3" style="width:99%;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
                                                                        </tr>
                                                                   <?php } } ?>
                                                 </table>
                                                <table width="95%" id="segui2" border="1" class="taulaA">
                                                                  <tr id="tr1" name="tr1" class="cabecera2" align="center">
                                                                     <td colspan="4" width="90%">Razas mejoradas</td>
                                                                     <td width="4%"><input name="btn1" type="button" class='cabecera2' value="Agregar" onClick="javascript:onclick_agregarDetalle2();" ></td>
                                                                  </tr>
                                                                <?php
                                                                $rcia_docEvaluacion = pg_query($cn,$sql_docEvaluacion);
                                                                while ($row_docEvaluacion = pg_fetch_assoc($rcia_docEvaluacion)  ){
                                                                $ct++;
                                                                      if($row_docEvaluacion['iddocumentacion']==24){  //--- iddoc= 24 = Razas mejoradas
                                                                       ?>
                                                                         <tr><td width="2%" height="24"><input type="checkbox" name="chk"/></td>
                                                                            <td width="30%"><textarea class="CSSTextArea" name="txtdetalle2-<?php echo $ct; ?>" id="txtdetalle2-<?php echo $ct; ?>" cols="40" rows="3" style="width: 99%;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
                                                                            <td width="18%" ><input name="txtmonto_cantidad2-<?php echo $ct; ?>" type="text" class="boxBusqueda" style="width:99%;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
                                                                            <td width="35%" ><textarea class="CSSTextArea" name="txtobs2-<?php echo $ct; ?>" id="txtobs2-<?php echo $ct; ?>" cols="40" rows="3" style="width:99%;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
                                                                        </tr>
                                                                   <?php }} ?>

                                                 </table>
                                                 <table width="95%" id="segui3" border="1" class="taulaA">
                                                                  <tr id="tr1" name="tr1" class="cabecera2" align="center">
                                                                     <td colspan="4" width="90%">Ensilado de forrajes</td>
                                                                     <td width="4%"><input name="btn1" type="button" class='cabecera2' value="Agregar" onClick="javascript:onclick_agregarDetalle3();" ></td>
                                                                  </tr>
                                                                   <?php
                                                                    $rcia_docEvaluacion = pg_query($cn,$sql_docEvaluacion);
                                                                    while ($row_docEvaluacion = pg_fetch_assoc($rcia_docEvaluacion)  ){
                                                                    $ct++;
                                                                      if($row_docEvaluacion['iddocumentacion']==25){  //--- iddoc= 25 =Ensilado de forrajes
                                                                       ?>
                                                                        <tr><td width="2%" height="24"><input type="checkbox" name="chk"/></td>
                                                                            <td width="30%" ><textarea class="CSSTextArea" name="txtdetalle3-<?php echo $ct; ?>" id="txtdetalle3-<?php echo $ct; ?>" cols="40" rows="3" style="width: 99%;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
                                                                            <td width="18%" ><input name="txtmonto_cantidad3-<?php echo $ct; ?>" type="text" class="boxBusqueda" style="width:99%;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
                                                                            <td  width="35%" ><textarea class="CSSTextArea" name="txtobs3-<?php echo $ct; ?>" id="txtobs3-<?php echo $ct; ?>" cols="40" rows="3" style="width:99%;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
                                                                        </tr>
                                                                   <?php }} ?>


                                                  </table>
                                                 <table width="95%" id="segui4" border="1" class="taulaA">
                                                                  <tr id="tr1" name="tr1" class="cabecera2" align="center">
                                                                     <td colspan="4" width="90%">Certificado y/o Acta de vacunación contra la fiebre aftosa</td>
                                                                     <td width="4%"><input name="btn1" type="button" class='cabecera2' value="Agregar" onClick="javascript:onclick_agregarDetalle4();" ></td>
                                                                  </tr>
                                                                    <?php
                                                                    $rcia_docEvaluacion = pg_query($cn,$sql_docEvaluacion);
                                                                    while ($row_docEvaluacion = pg_fetch_assoc($rcia_docEvaluacion)  ){
                                                                    $ct++;
                                                                      if($row_docEvaluacion['iddocumentacion']==26){  //--- iddoc= 23 = Uso de alimentos suplementarios
                                                                       ?>
                                                                      <tr>   <td width="2%" height="24"><input type="checkbox" name="chk"/></td>
                                                                             <td width="30%" ><textarea class="CSSTextArea" name="txtdetalle4-<?php echo $ct; ?>" id="txtdetalle4-<?php echo $ct; ?>" cols="40" rows="3" style="width: 99%;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
                                                                            <td width="18%" ><input name="txtmonto_cantidad4-<?php echo $ct; ?>" type="text" class="boxBusqueda" style="width:99%;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
                                                                            <td width="35%" ><textarea class="CSSTextArea" name="txtobs4-<?php echo $ct; ?>" id="txtobs4-<?php echo $ct; ?>" cols="40" rows="3" style="width:99%;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
                                                                    </tr>
                                                                   <?php }}ss ?>
                                                </table>
                                                <table width="95%" id="segui5" border="1" class="taulaA">
                                                        <tr id="tr1" name="tr1" class="cabecera2" align="center">
                                                            <td colspan="4" width="90%">Certificado o algún documento que acredite el uso inmunológico contra Brucelosis.</td>
                                                            <td width="4%"><input name="btn1" type="button" class='cabecera2' value="Agregar" onClick="javascript:onclick_agregarDetalle5();" ></td>
                                                        </tr>
                                                         <?php
                                                            $rcia_docEvaluacion = pg_query($cn,$sql_docEvaluacion);
                                                            while ($row_docEvaluacion = pg_fetch_assoc($rcia_docEvaluacion)  ){
                                                            $ct++;
                                                                      if($row_docEvaluacion['iddocumentacion']==27){  //--- iddoc= 27 = Certificado de libre de Brucelosis
                                                                       ?>
                                                                     <tr>  <td width="2%" height="24"><input type="checkbox" name="chk"/></td>
                                                                        <td width="30%" ><textarea class="CSSTextArea" name="txtdetalle5-<?php echo $ct; ?>" id="txtdetalle5-<?php echo $ct; ?>" cols="40" rows="3" style="width:99%;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
                                                                        <td width="18%" ><input name="txtmonto_cantidad5-<?php echo $ct; ?>" type="text" class="boxBusqueda" style="width:99%;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
                                                                        <td width="35%" ><textarea class="CSSTextArea" name="txtobs5-<?php echo $ct; ?>" id="txtobs5-<?php echo $ct; ?>" cols="40" rows="3" style="width:99%;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
                                                                    </tr>
                                                                   <?php }  } ?>
                                                  </table>
                                                 <table width="95%" id="segui6" border="1" class="taulaA">
                                                                  <tr id="tr1" name="tr1" class="cabecera2" align="center">
                                                                     <td colspan="4" width="90%">Certificado de libre de Tuberculosis</td>
                                                                     <td width="4%"><input name="btn1" type="button" class='cabecera2' value="Agregar" onClick="javascript:onclick_agregarDetalle6();" ></td>
                                                                  </tr>
                                                                 <?php
                                                                $rcia_docEvaluacion = pg_query($cn,$sql_docEvaluacion);
                                                                while ($row_docEvaluacion = pg_fetch_assoc($rcia_docEvaluacion)  ){
                                                                $ct++;
                                                                    if($row_docEvaluacion['iddocumentacion']==28){  //--- iddoc= 28 = Certificado de libre de Brucelosis
                                                                    ?>
                                                                 <tr> <td width="2%" height="24"><input type="checkbox" name="chk"/></td>
                                                                    <td width="30%" ><textarea class="CSSTextArea" name="txtdetalle6-<?php echo $ct; ?>" id="txtdetalle6-<?php echo $ct; ?>" cols="40" rows="3" style="width: 99%;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
                                                                    <td width="18%" ><input name="txtmonto_cantidad6-<?php echo $ct; ?>" type="text" class="boxBusqueda" style="width:99%;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
                                                                    <td width="35%" ><textarea class="CSSTextArea" name="txtobs6-<?php echo $ct; ?>" id="txtobs6-<?php echo $ct; ?>" cols="40" rows="3" style="width:99%;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
                                                                 </tr>
                                                                <?php } } ?>

                                                </table>
                                                <table width="95%" id="segui7" border="1" class="taulaA">
                                                        <tr id="tr1" name="tr1" class="cabecera2" align="center">
                                                            <td colspan="4" width="90%">Producción Lechera</td>
                                                            <td width="4%"><input name="btn1" type="button" class='cabecera2' value="Agregar" onClick="javascript:onclick_agregarDetalle7();" ></td>
                                                        </tr>
                                                         <?php
                                                        $rcia_docEvaluacion = pg_query($cn,$sql_docEvaluacion);
                                                        while ($row_docEvaluacion = pg_fetch_assoc($rcia_docEvaluacion)  ){
                                                        $ct++;
                                                            if($row_docEvaluacion['iddocumentacion']==29){  //--- iddoc= 29 = Producción Lechera
                                                            ?>
                                                          <tr><td width="2%"  height="24"><input type="checkbox" name="chk"/></td>
                                                                <td width="30%" ><textarea class="CSSTextArea" name="txtdetalle7-<?php echo $ct; ?>" id="txtdetalle7-<?php echo $ct; ?>" cols="40" rows="3" style="width: 99%;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
                                                                <td width="18%" ><input name="txtmonto_cantidad7-<?php echo $ct; ?>" type="text" class="boxBusqueda" style="width:99%;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
                                                                <td width="35%" ><textarea class="CSSTextArea" name="txtobs7-<?php echo $ct; ?>" id="txtobs7-<?php echo $ct; ?>" cols="40" rows="3" style="width:99%;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
                                                        </tr>
                                                        <?php } } ?>
                                                </table>
                                                <table width="95%" id="segui8" border="1" class="taulaA">
                                                        <tr id="tr1" name="tr1" class="cabecera2" align="center">
                                                            <td colspan="4" width="90%">Certificados y/o acta de Vacunación del SENASAG.</td>
                                                            <td width="4%"><input name="btn1" type="button" class='cabecera2' value="Agregar" onClick="javascript:onclick_agregarDetalle8();" ></td>
                                                        </tr>
                                                         <?php
                                                        $rcia_docEvaluacion = pg_query($cn,$sql_docEvaluacion);
                                                        while ($row_docEvaluacion = pg_fetch_assoc($rcia_docEvaluacion)  ){
                                                        $ct++;
                                                            if($row_docEvaluacion['iddocumentacion']==30){  //--- iddoc= 22 = uso de alimentos suplementarios
                                                            ?>
                                                           <tr> <td width="2%" height="24"><input type="checkbox" name="chk"/></td>
                                                                <td width="30%" ><textarea class="CSSTextArea" name="txtdetalle8-<?php echo $ct; ?>" id="txtdetalle8-<?php echo $ct; ?>" cols="40" rows="3" style="width: 99%;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
                                                                <td width="18%" ><input name="txtmonto_cantidad8-<?php echo $ct; ?>" type="text" class="boxBusqueda" style="width:99%;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
                                                                <td  width="35%"  ><textarea class="CSSTextArea" name="txtobs8-<?php echo $ct; ?>" id="txtobs8-<?php echo $ct; ?>" cols="40" rows="3" style="width:99%;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
                                                            </tr>
                                                        <?php } } ?>
                                                </table>
                                                <table width="95%" id="segui9" border="1" class="taulaA">
                                                        <tr id="tr1" name="tr1" class="cabecera2" align="center">
                                                            <td colspan="4" width="90%">Insumos pecuarios.</td>
                                                            <td width="4%"><input name="btn1" type="button" class='cabecera2' value="Agregar" onClick="javascript:onclick_agregarDetalle9();" ></td>
                                                        </tr>
                                                         <?php
                                                        $rcia_docEvaluacion = pg_query($cn,$sql_docEvaluacion);
                                                        while ($row_docEvaluacion = pg_fetch_assoc($rcia_docEvaluacion)  ){
                                                        $ct++;
                                                            if($row_docEvaluacion['iddocumentacion']==31){  //--- iddoc= 31 =Insumos pecuarios.
                                                            ?>
                                                        <tr> <td   width="2%" height="24"><input type="checkbox" name="chk"/></td>
                                                                <td width="30%" ><textarea class="CSSTextArea" name="txtdetalle9-<?php echo $ct; ?>" id="txtdetalle9-<?php echo $ct; ?>" cols="40" rows="3" style="width:99%;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
                                                                <td width="18%"  ><input name="txtmonto_cantidad9-<?php echo $ct; ?>" type="text" class="boxBusqueda" style="width:99%;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
                                                                <td width="35%"  ><textarea class="CSSTextArea" name="txtobs9-<?php echo $ct; ?>" id="txtobs9-<?php echo $ct; ?>" cols="40" rows="3" style="width:99%;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
                                                        </tr>
                                                        <?php } } ?>

                                                </table>
                                                <table width="95%" id="segui10" border="1" class="taulaA">
                                                        <tr id="tr1" name="tr1" class="cabecera2" align="center">
                                                            <td colspan="4" width="90%">Infraestructura e instalaciones para ordeño</td>
                                                            <td width="4%"><input name="btn1" type="button" class='cabecera2' value="Agregar" onClick="javascript:onclick_agregarDetalle10();" ></td>
                                                        </tr>
                                                          <?php
                                                         $rcia_docEvaluacion = pg_query($cn,$sql_docEvaluacion);
                                                         while ($row_docEvaluacion = pg_fetch_assoc($rcia_docEvaluacion)  ){
                                                         $ct++;
                                                            if($row_docEvaluacion['iddocumentacion']==32){  //--- iddoc= 10 = insumo agropecupario
                                                            ?>
                                                           <tr> <td width="2%" height="24"><input type="checkbox" name="chk"/></td>
                                                                 <td width="30%" ><textarea class="CSSTextArea" name="txtdetalle10-<?php echo $ct; ?>" id="txtdetalle10-<?php echo $ct; ?>" cols="40" rows="3" style="width:99%;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
                                                                <td width="18%" ><input name="txtmonto_cantidad10-<?php echo $ct; ?>" type="text" class="boxBusqueda" style="width:99%;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
                                                                <td width="35%" ><textarea class="CSSTextArea" name="txtobs10-<?php echo $ct; ?>" id="txtobs10-<?php echo $ct; ?>" cols="40" rows="3" style="width: 99%;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
                                                            </tr>
                                                        <?php } } ?>

                                                </table>
                                                <table width="95%" id="segui11" border="1" class="taulaA">
                                                        <tr id="tr1" name="tr1" class="cabecera2" align="center">

                                                            <td colspan="4" width="90%">Otros.</td>
                                                            <td width="4%"><input name="btn1" type="button" class='cabecera2' value="Agregar" onClick="javascript:onclick_agregarDetalle11();" ></td>
                                                        </tr>
                                                                <?php
                                                                $rcia_docEvaluacion = pg_query($cn,$sql_docEvaluacion);
                                                                 while ($row_docEvaluacion = pg_fetch_assoc($rcia_docEvaluacion)  ){
                                                                    if($row_docEvaluacion['iddocumentacion']==33){  //--- iddoc= 22 = uso de alimentos suplementarios
                                                                    ?>
                                                                   <tr> <td width="2%" height="24"><input type="checkbox" name="chk"/></td>
                                                                    <td width="30%" ><textarea class="CSSTextArea" name="txtdetalle11-<?php echo $ct; ?>" id="txtdetalle11-<?php echo $ct; ?>" cols="40" rows="3" style="width:99%;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
                                                                    <td width="18%" ><input name="txtmonto_cantidad11-<?php echo $ct; ?>" type="text" class="boxBusqueda" style="width:99%;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
                                                                    <td width="35%" ><textarea class="CSSTextArea" name="txtobs11-<?php echo $ct; ?>" id="txtobs11-<?php echo $ct; ?>" cols="40" rows="3" style="width:99%;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
                                                                  </tr>
                                                                <?php }  } ?>
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
		<td height="14" colspan="4" id='blau'><span class="taulaH">2. Tabla de Valoración Ganadera RCIA</span></td>
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
			</style>

                        <?php
                            $sql_and2="";
                            if(isset($_POST['anhoActivo_']) && ($_POST['anhoActivo_']>0)){
                                $sql_and2= " and anho=".$_POST['anhoActivo_']; }
                            else{$sql_and2=" order by  anho asc  limit 1" ;  }

                            $sql_mon1= "select idmonitoreo from monitoreo.monitoreo where   tipo=267 and estado = 1 and idregistro = ".$_SESSION['idreg'].$sql_and2;
                            $mon_sql = pg_query($cn,$sql_mon1);
                            $row_monit = pg_fetch_array ($mon_sql);
                            $idmonitoreo2=$row_monit["idmonitoreo"];

                            //echo "aaaaaxxx:".$idmonitoreo2."--";
                            $sql_detEvaluacion = "                                        select va.*
                                                                    from monitoreo.valoracionalimentos va inner join   monitoreo.monitoreo  m on  va.idmonitoreo = m.idmonitoreo
                                                                    inner join monitoreo.evaluacionespecifica as ve on idevalespecif = idevaluacionespecifica
                                                                    inner join monitoreo.evaluaciongeneral as eg on ve.idevalgral = eg.idevalgral
                                                                    where  va.tipo=101 and  m.tipo=267 and  m.idregistro = ".$_SESSION['idreg']." and m.idmonitoreo=".$idmonitoreo2. "
                                                                    order by eg.idevalgral asc, va.idevalespecif asc";
                                        $rcia_detEvaluacion = pg_query($cn,$sql_detEvaluacion);

                        ?>

			<table class="tableizer-table">
				<thead>
				<tr class="tableizer-firstrow">
					<th colspan = "2">Evaluación directriz Técnica General</th>
					<th colspan = "2">Evaluación directriz Técnica Especifica</th>
					<th rowspan = "2">Ponderación (%)</th>
				</tr>

				<tr>
					<th>Parámetro</th>
					<th>Valoración (%)</th>
					<th>Parámetro</th>
					<th>Valoración (%)</th>
				</tr>

				</thead>
			<tbody style="text-align:center;">

			 <tr><td>Superficie pastos cultivados de piso y/o corte (ha). </td><td>30</td><td>Superficie pastos cultivados de piso y/o corte (ha).</td><td>30</td> <td><input name="suppastoscultivados" id="suppastoscultivados"  type="text" class="boxBusqueda4" value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>"  onKeyUp="extractNumber(this,0,false);promediar(this,30);" onKeyPress="return blockNonNumbers(this, event, true, false);" onblur="sumatoria_ganadero(); " ></td> </tr>
			 <tr><td rowspan = "3" >Aplicación de técnicas y tecnologías sostenibles: (1 Técnica = 30 %; 2 Técnicas = 70 %; 3 Técnicas = 100%) </td><td rowspan = "3">15</td> <td>Uso de alimentos suplementarios</td><td rowspan = "3">15</td><td><input name="alimentosuple" id="alimentosuple"  type="text" class="boxBusqueda4"  value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>" onKeyUp="extractNumber(this,0,false); sumatoria_ganadero2(this,15);" onKeyPress="return blockNonNumbers(this, event, true, false);" onblur="sumatoria_ganadero();" onchange="sumatoria_ganadero(); " ></td></tr>
			 <tr><td>Razas mejoradas</td><td><input name="razasmejoradas" id="razasmejoradas" type="text" class="boxBusqueda4"  value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>" onKeyUp="extractNumber(this,0,false);sumatoria_ganadero2(this,15);" onKeyPress="return blockNonNumbers(this, event, true, false);"  onblur="sumatoria_ganadero2(this,15);" onchange="sumatoria_ganadero2(this,15); " ></td></tr>
			 <tr><td>Ensilado de forrajes</td><td><input name="ensiladosforraje" id="ensiladosforraje" type="text" class="boxBusqueda4"  value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>" onKeyUp="extractNumber(this,0,false);sumatoria_ganadero2(this,15);" onKeyPress="return blockNonNumbers(this, event, true, false);"  onblur="sumatoria_ganadero2(this,15);" onchange="sumatoria_ganadero2(this,15); "></td></tr>
			 <tr><td rowspan = "3">Sanidad Animal mediante Inmunológicos. </td><td rowspan = "3">10</td><td>Certificado de Vacunacion contra la fiebre aftosa. </td><td>5</td><td><input  name="aftosa" id="aftosa" type="text" class="boxBusqueda4" value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>"  onKeyUp="extractNumber(this,0,false);promediar(this,5);" onKeyPress="return blockNonNumbers(this, event, true, false);" onblur="sumatoria_ganadero(); " ></td></tr>
			 <tr><td>Certificado o Algun Documento que acredite el uso inmunológico contra o libre de Brucelosis</td><td>2</td><td><input name="tuberculosis" id="tuberculosis"   type="text" class="boxBusqueda4" value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>"  onKeyUp="extractNumber(this,0,false);promediar(this,2);" onKeyPress="return blockNonNumbers(this, event, true, false);" onblur="sumatoria_ganadero(); " ></td></tr>
			 <tr><td>Certificacion de libre de Tuberculosis (emitido por los laboratorios autorizados o prueba de tuberculina) </td><td>3</td><td><input name="bruce" id="bruce" type="text" class="boxBusqueda4" value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>"  onKeyUp="extractNumber(this,0,false);promediar(this,3);" onKeyPress="return blockNonNumbers(this, event, true, false);" onblur="sumatoria_ganadero(); "></td></tr>
			 <tr>  <td>Produccion Lechera</td> <td>15</td>  <td>Documento de Comercializacion Lechera y/o derivados</td><td>15</td><td><input name="comerciolechera"  id="comerciolechera"  type="text" class="boxBusqueda4"  value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>" onKeyUp="extractNumber(this,0,false);;promediar(this,15);" onKeyPress="return blockNonNumbers(this, event, true, false);" onblur="sumatoria_ganadero(); "></td></tr>

       <tr><td rowspan = "3" >Total cabezas de  ganado mayor en el área deforestada. (Relación directa de acuerdo a metas programadas)</td><td rowspan = "3">30</td>
         <td>Certificación y/o acta de Vacunación del SENASAG.</td>
         <td>10</td>
         <td><input name="vacunasenasag" id="vacunasenasag" type="text" class="boxBusqueda4" value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>"  onKeyUp="extractNumber(this,0,false);promediar(this,10);" onKeyPress="return blockNonNumbers(this, event, true, false);" onblur="sumatoria_ganadero(); " ></td>
       </tr>


        <tr>
          <td>Insumos Pecuarios.</td>
          <td>10</td>
          <td><input name="insumospecuarios" id="insumospecuarios" type="text" class="boxBusqueda4"  value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>" onKeyUp="extractNumber(this,0,false);promediar(this,10);" onKeyPress="return blockNonNumbers(this, event, true, false);"  onblur="sumatoria_ganadero(); " ></td>
        </tr>

        <tr>
           <td>Descarte de Ganado.</td>
           <td>10</td>
           <td><input name="descarteganados" id="descarteganados" type="text" class="boxBusqueda4"  value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>" onKeyUp="extractNumber(this,0,false);promediar(this,10);" onKeyPress="return blockNonNumbers(this, event, true, false);"  onblur="sumatoria_ganadero(); " ></td>
         </tr>



       <tr><td>Infraestructura e Instalaciones para ordeño (Sistema de Ordeño, Galpon de Ordeño, Tanque de Enfriamiento)</td> <td>10</td>  <td>Infraestructura e Instalaciones para Ordeño</td><td>10</td><td><input name="infraestructura" id="infraestructura" type="text" class="boxBusqueda4" value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>" onKeyUp="extractNumber(this,0,false);promediar(this,10);" onKeyPress="return blockNonNumbers(this, event, true, false);" onblur="sumatoria_ganadero(); "></td></tr>


       <tr><td colspan = "4">PUNTUACION FINAL</td><td><input name="puntuacionfinal" id="puntuacionfinal" type="text" class="boxBusqueda4"  onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"></td></tr>



    	</tbody>

			</table>

		</td>
	</tr>




</table>

<table>

    <tr>
      <input id="guardarAnalisisdocganarcia" class="boton verde formaBoton" type="submit" value="Guardar" name="guardarAnalisisdocganarcia" >
    </tr>

    <tr>
        <a></a>
    </tr>


    <tr>
      <form action="evaluacion_ganaderalechera_rcia.php" method="post" name="form" >
       <input name='Imprimir' type='submit' class='boton verde formaBoton' id='Imprimir' value='Imprimir Evaluacion'>

       <input id="reg" type="hidden" value="<?php echo $_SESSION['idreg'];?>" name="reg">
       <input id="monit" type="hidden" value="<?php echo $monit;?>" name="monit">

       <?php
           if (($_POST['anhoActivo_'])==0 )
           {
             $sql_mon= "select idmonitoreo, anho from monitoreo.monitoreo where   tipo=267 and estado = 1 and idregistro = ".$_SESSION['idreg']." order by anho asc limit 1";
             $sqlanoacti = pg_query($cn,$sql_mon) ;
             $rowanoacti = pg_fetch_array($sqlanoacti);
             $rowano = $rowanoacti['anho'];
           }
           else
            {
              $rowano = $_POST['anhoActivo_'];
           }
       ?>

       <input id="anoact" type="hidden" name="anoact" value="<?php echo $rowano;?>">


      </form>
    </tr>

</table>

<input type="hidden" name="MM_insert" value="formevaluacionrcia" />
<input id="conteoC" type="hidden" value="<?php echo $ct;?>" name="conteoC">
<input id="anhoActivo" type="hidden" value="<?php if(isset($_POST['anhoActivo_']) && ($_POST['anhoActivo_']>0)){echo $_POST['anhoActivo_']; }else{echo "0";} ?> " name="anhoActivo">
<input id="anhoActivo2" type="hidden" value="<?php if(isset($_POST['anhoActivo2_']) ){echo $_POST['anhoActivo2_']; }else{echo "0";} ?> " name="anhoActivo2">

 </form>


<div style="height:20px;" ></div>



</div>


<script language="javascript" type="text/javascript">

 function onclick_agregarDetalle() {



            tabla = document.getElementById('segui');

            tr = document.createElement('tr');
            tr.setAttribute('id', 'tempTr01');
            tabla.appendChild(tr);


            td1 = document.createElement('td');
            td1.setAttribute('style', ' height:24px; ');
            input1 = document.createElement('input');
            input1.setAttribute('type', 'checkbox');
            input1.setAttribute('name', 'chk1');
            td1.appendChild(input1);

            td2 = document.createElement('td');
            input2 = document.createElement('select');
            input2.setAttribute('type', 'text');
            input2.setAttribute('id', 'temptxtContacto');
            input2.setAttribute('class', 'combos');

             objOption = new Option('ELEGIR ...', '0');
            input2.add(objOption);
              objOption = new Option('Uso de alimentos suplementarios', '0');
            input2.add(objOption);

            objOption = new Option('Razas mejoradas', '0');
            input2.add(objOption);

              objOption = new Option('Ensilado de forrajes', '0');
            input2.add(objOption);

              objOption = new Option('Potreros alambrados, Cercas Eléctricas, saleros ', '0');
            input2.add(objOption);

              objOption = new Option('Atajados, pozos, noques, tanques, bebederos', '0');
            input2.add(objOption);

              objOption = new Option('Corral ', '0');
            input2.add(objOption);

            objOption = new Option('Brete, Cepo, balanza, cargadero ', '0');
            input2.add(objOption);

            objOption = new Option('Certificados de Vacunación del SENASAG. ', '0');
            input2.add(objOption);

            objOption = new Option('Compra de Ganado ', '0');
            input2.add(objOption);

            objOption = new Option('Venta de Ganado ', '0');
            input2.add(objOption);

            objOption = new Option('Insumos Agropecuarios ', '0');
            input2.add(objOption);

            objOption = new Option('Otros', '0');
            input2.add(objOption);


            td2.appendChild(input2);

            td3 = document.createElement('td');
            input3 = document.createElement('textarea');
            input3.setAttribute('name', 'chk1');
            input3.setAttribute('class', 'CSSTextArea');
            input3.setAttribute('cols', '55');
            input3.setAttribute('rows', '4');
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'chk2');
            input4.setAttribute('class', 'boxBusqueda');
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'chk2');
            input5.setAttribute('class', 'CSSTextArea');
            input5.setAttribute('cols', '55');
            input5.setAttribute('rows', '4');
            td5.appendChild(input5);



            tr.appendChild(td1);
            tr.appendChild(td2);
            tr.appendChild(td3);
            tr.appendChild(td4);
            tr.appendChild(td5);



}



sumatoria_ganadero();

function promediar(obj,param) {
  // alert('valor='+obj.value+'  - parametro='+param);
   if(obj.value>param){
      alert('El valor tiene que ser Menor o igual a '+param);
      obj.value=param;

   }
   else
   {

   }
sumatoria_ganadero();
}


function sumatoria_ganadero2(obj,param){

     a=0;
     b=0;
     c=0;
     if(document.getElementById('alimentosuple').value.length>0){
       a=parseInt(document.getElementById('alimentosuple').value);
     }
     if(document.getElementById('razasmejoradas').value.length>0){
       b=parseInt(document.getElementById('razasmejoradas').value);
     }
     if(document.getElementById('ensiladosforraje').value.length>0){
       c=parseInt(document.getElementById('ensiladosforraje').value);
     }

     if((a+b+c)>param){
       obj.value=0; //0;0;
       alert('La sumatoria de los 3 campos tiene que ser Menor o igual a '+param);
    }else{


        }
    sumatoria_ganadero();
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
                url:   'evaluacion_ganadera_lechera_rcia_Ajax.php',
                type:  'post',
                beforeSend: function () {
                      //  $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response1) {
                   // alert('resp:'+response1);
                    response1 = response1.substring(0, response1.length - 1);
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
                                // document.getElementById('idbtn1').click();
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
                                // document.getElementById('idbtn1_').click();
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






function sumatoria_ganadero(){
    suma=0;

    if(document.getElementById('suppastoscultivados').value.length>0){
       suma=suma+parseInt(document.getElementById('suppastoscultivados').value);
    }
    if(document.getElementById('alimentosuple').value.length>0){
       suma=suma+parseInt(document.getElementById('alimentosuple').value);
    }
     if(document.getElementById('razasmejoradas').value.length>0){
       suma=suma+parseInt(document.getElementById('razasmejoradas').value);
    }
     if(document.getElementById('ensiladosforraje').value.length>0){
       suma=suma+parseInt(document.getElementById('ensiladosforraje').value);
    }
     if(document.getElementById('aftosa').value.length>0){
       suma=suma+parseInt(document.getElementById('aftosa').value);
    }
     if(document.getElementById('tuberculosis').value.length>0){
       suma=suma+parseInt(document.getElementById('tuberculosis').value);
    }

      if(document.getElementById('bruce').value.length>0){
       suma=suma+parseInt(document.getElementById('bruce').value);
    }
    if(document.getElementById('comerciolechera').value.length>0){
       suma=suma+parseInt(document.getElementById('comerciolechera').value);
    }

     if(document.getElementById('vacunasenasag').value.length>0){
       suma=suma+parseInt(document.getElementById('vacunasenasag').value);
    }
     if(document.getElementById('insumospecuarios').value.length>0){
       suma=suma+parseInt(document.getElementById('insumospecuarios').value);
    }

    if(document.getElementById('infraestructura').value.length>0){
       suma=suma+parseInt(document.getElementById('infraestructura').value);
    }

    if(document.getElementById('descarteganados').value.length>0){
       suma=suma+parseInt(document.getElementById('descarteganados').value);
    }


    if(suma > 100)
    {
      suma = 100;
      document.getElementById('puntuacionfinal').value=suma;
    }
    else
    {
     document.getElementById('puntuacionfinal').value=suma;
    }



   // alert(suma ); onchange   onblur

}
 window.scrollBy(0, -1000);
//function subir(){
    //alert('jj');
   // window.scrollBy(0, -1000);
//}




 function recargar_anos(){

    var idperiodo=document.getElementById('idperiodo').value;
        var parametros = {
            "tarea" : "establecerAnos"
        };
        $.ajax({
                data:  parametros,
                url:   'evaluacion_ganadera_lechera_rcia_Ajax.php',
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
       //alert('entroo año2');

}



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
             td1.setAttribute('width', '2%');
            td1.appendChild(input1);



           // td2.appendChild(input2);

            td3 = document.createElement('td');
            input3 = document.createElement('textarea');
            input3.setAttribute('name', 'txtdetalle1-'+contadorC);
            input3.setAttribute('class', 'CSSTextArea');
            input3.setAttribute('cols', '33');
            input3.setAttribute('rows', '4');
            input3.setAttribute('style', 'width: 99%;');
            td3.setAttribute('width', '30%');
            input3.setAttribute('id', 'txtdetalle1-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad1-'+contadorC);
            input4.setAttribute('class', 'boxBusqueda');
             input4.setAttribute('style', 'width: 99%;');
             td4.setAttribute('width', '18%');
            input4.setAttribute('id', 'txtmonto_cantidad1-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs1-'+contadorC);
            input5.setAttribute('class', 'CSSTextArea');
            input5.setAttribute('cols', '40');
            input5.setAttribute('rows', '3');
           input5.setAttribute('style', 'width: 99%;');
            td5.setAttribute('width', '35%');
             input5.setAttribute('id', 'txtobs1-'+contadorC);
            td5.appendChild(input5);

             td6 = document.createElement('td');
              td6.setAttribute('width', '4%');

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
            td1.setAttribute('width', '2%');
            td1.appendChild(input1);



           // td2.appendChild(input2);

            td3 = document.createElement('td');
            input3 = document.createElement('textarea');
            input3.setAttribute('name', 'txtdetalle2-'+contadorC);
            input3.setAttribute('class', 'CSSTextArea');
            input3.setAttribute('cols', '33');
            input3.setAttribute('rows', '4');
            input3.setAttribute('style', 'width: 99%;');
            td3.setAttribute('width', '30%');
            input3.setAttribute('id', 'txtdetalle2-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad2-'+contadorC);
            input4.setAttribute('class', 'boxBusqueda');
            input4.setAttribute('style', 'width: 99%;');
             td4.setAttribute('width', '18%');
            input4.setAttribute('id', 'txtmonto_cantidad2-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs2-'+contadorC);
            input5.setAttribute('class', 'CSSTextArea');
            input5.setAttribute('cols', '40');
            input5.setAttribute('rows', '3');
            input5.setAttribute('style', 'width: 99%;');
             input5.setAttribute('id', 'txtobs2-'+contadorC);
              td5.setAttribute('width', '35%');
            td5.appendChild(input5);

             td6 = document.createElement('td');
             td6.setAttribute('width', '4%');

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
             td1.setAttribute('width', '2%');
            td1.appendChild(input1);



           // td2.appendChild(input2);

            td3 = document.createElement('td');
            input3 = document.createElement('textarea');
            input3.setAttribute('name', 'txtdetalle3-'+contadorC);
            input3.setAttribute('class', 'CSSTextArea');
            input3.setAttribute('cols', '33');
            input3.setAttribute('rows', '4');
              input3.setAttribute('style', 'width: 99%;');
            td3.setAttribute('width', '30%');
            input3.setAttribute('id', 'txtdetalle3-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad3-'+contadorC);
            input4.setAttribute('class', 'boxBusqueda');
              input4.setAttribute('style', 'width: 99%;');
             td4.setAttribute('width', '18%');
            input4.setAttribute('id', 'txtmonto_cantidad3-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs3-'+contadorC);
            input5.setAttribute('class', 'CSSTextArea');
            input5.setAttribute('cols', '40');
            input5.setAttribute('rows', '3');
            input5.setAttribute('style', 'width: 99%;');
             td5.setAttribute('width', '35%');
             input5.setAttribute('id', 'txtobs3-'+contadorC);
            td5.appendChild(input5);

             td6 = document.createElement('td');
              td6.setAttribute('width', '4%');

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
             td1.setAttribute('width', '2%');
            td1.appendChild(input1);



           // td2.appendChild(input2);

            td3 = document.createElement('td');
            input3 = document.createElement('textarea');
            input3.setAttribute('name', 'txtdetalle4-'+contadorC);
            input3.setAttribute('class', 'CSSTextArea');
            input3.setAttribute('cols', '33');
            input3.setAttribute('rows', '4');
             input3.setAttribute('style', 'width: 99%;');
            td3.setAttribute('width', '30%');
            input3.setAttribute('id', 'txtdetalle4-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad4-'+contadorC);
            input4.setAttribute('class', 'boxBusqueda');
             input4.setAttribute('style', 'width: 99%;');
             td4.setAttribute('width', '18%');
            input4.setAttribute('id', 'txtmonto_cantidad4-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs4-'+contadorC);
            input5.setAttribute('class', 'CSSTextArea');
            input5.setAttribute('cols', '40');
            input5.setAttribute('rows', '3');
            input5.setAttribute('style', 'width: 99%;');
            td5.setAttribute('width', '35%');
             input5.setAttribute('id', 'txtobs4-'+contadorC);
            td5.appendChild(input5);

             td6 = document.createElement('td');
             td6.setAttribute('width', '4%');

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
             td1.setAttribute('width', '2%');
            td1.appendChild(input1);



           // td2.appendChild(input2);

            td3 = document.createElement('td');
            input3 = document.createElement('textarea');
            input3.setAttribute('name', 'txtdetalle5-'+contadorC);
            input3.setAttribute('class', 'CSSTextArea');
            input3.setAttribute('cols', '40');
            input3.setAttribute('rows', '4');
            input3.setAttribute('style', 'width: 99%;');
            td3.setAttribute('width', '30%');
            input3.setAttribute('id', 'txtdetalle5-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad5-'+contadorC);
            input4.setAttribute('class', 'boxBusqueda');
             input4.setAttribute('style', 'width: 99%;');
             td4.setAttribute('width', '18%');
            input4.setAttribute('id', 'txtmonto_cantidad5-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs5-'+contadorC);
            input5.setAttribute('class', 'CSSTextArea');
            input5.setAttribute('cols', '40');
            input5.setAttribute('rows', '3');
            input5.setAttribute('style', 'width: 99%;');
            td5.setAttribute('width', '35%');
             input5.setAttribute('id', 'txtobs5-'+contadorC);
            td5.appendChild(input5);

             td6 = document.createElement('td');
             td6.setAttribute('width', '4%');

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
             td1.setAttribute('width', '2%');
            td1.appendChild(input1);



           // td2.appendChild(input2);

            td3 = document.createElement('td');
            input3 = document.createElement('textarea');
            input3.setAttribute('name', 'txtdetalle6-'+contadorC);
            input3.setAttribute('class', 'CSSTextArea');
            input3.setAttribute('cols', '40');
            input3.setAttribute('rows', '4');
             input3.setAttribute('style', 'width: 99%;');
            td3.setAttribute('width', '30%');
            input3.setAttribute('id', 'txtdetalle6-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad6-'+contadorC);
            input4.setAttribute('class', 'boxBusqueda');
              input4.setAttribute('style', 'width: 99%;');
             td4.setAttribute('width', '18%');
            input4.setAttribute('id', 'txtmonto_cantidad6-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs6-'+contadorC);
            input5.setAttribute('class', 'CSSTextArea');
            input5.setAttribute('cols', '40');
            input5.setAttribute('rows', '3');
            input5.setAttribute('style', 'width: 99%;');
            td5.setAttribute('width', '35%');
             input5.setAttribute('id', 'txtobs6-'+contadorC);
            td5.appendChild(input5);

             td6 = document.createElement('td');
             td6.setAttribute('width', '4%');

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
             td1.setAttribute('width', '2%');
            td1.appendChild(input1);

           // td2.appendChild(input2);

            td3 = document.createElement('td');
            input3 = document.createElement('textarea');
            input3.setAttribute('name', 'txtdetalle7-'+contadorC);
            input3.setAttribute('class', 'CSSTextArea');
            input3.setAttribute('cols', '33');
            input3.setAttribute('rows', '4');
             input3.setAttribute('style', 'width: 99%;');
            td3.setAttribute('width', '30%');
            input3.setAttribute('id', 'txtdetalle7-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad7-'+contadorC);
            input4.setAttribute('class', 'boxBusqueda');
              input4.setAttribute('style', 'width: 99%;');
             td4.setAttribute('width', '18%');
            input4.setAttribute('id', 'txtmonto_cantidad7-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs7-'+contadorC);
            input5.setAttribute('class', 'CSSTextArea');
            input5.setAttribute('cols', '40');
            input5.setAttribute('rows', '3');
            input5.setAttribute('style', 'width: 99%;');
            td5.setAttribute('width', '35%');
             input5.setAttribute('id', 'txtobs7-'+contadorC);
            td5.appendChild(input5);

             td6 = document.createElement('td');
            td6.setAttribute('width', '4%');
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
             td1.setAttribute('width', '2%');

            td1.appendChild(input1);

           // td2.appendChild(input2);

            td3 = document.createElement('td');
            input3 = document.createElement('textarea');
            input3.setAttribute('name', 'txtdetalle8-'+contadorC);
            input3.setAttribute('class', 'CSSTextArea');
            input3.setAttribute('cols', '40');
            input3.setAttribute('rows', '4');
            input3.setAttribute('id', 'txtdetalle8-'+contadorC);
              input3.setAttribute('style', 'width: 99%;');
            td3.setAttribute('width', '30%');
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad8-'+contadorC);
            input4.setAttribute('class', 'boxBusqueda');
            input4.setAttribute('style', 'width: 99%;');
            td4.setAttribute('width', '18%');
            input4.setAttribute('id', 'txtmonto_cantidad8-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs8-'+contadorC);
            input5.setAttribute('class', 'CSSTextArea');
            input5.setAttribute('cols', '40');
            input5.setAttribute('rows', '3');
            input5.setAttribute('style', 'width: 99%;');
            td5.setAttribute('width', '35%');
            input5.setAttribute('id', 'txtobs8-'+contadorC);
            td5.appendChild(input5);

             td6 = document.createElement('td');
             td6.setAttribute('width', '4%');

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
            td1.setAttribute('width', '2%');
            td1.appendChild(input1);

           // td2.appendChild(input2);

            td3 = document.createElement('td');
            input3 = document.createElement('textarea');
            input3.setAttribute('name', 'txtdetalle9-'+contadorC);
            input3.setAttribute('class', 'CSSTextArea');
            input3.setAttribute('cols', '40');
            input3.setAttribute('rows', '4');
              input3.setAttribute('style', 'width: 99%;');
            td3.setAttribute('width', '30%');
            input3.setAttribute('id', 'txtdetalle9-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad9-'+contadorC);
            input4.setAttribute('class', 'boxBusqueda');
            input4.setAttribute('style', 'width: 99%;');
             td4.setAttribute('width', '18%');
            input4.setAttribute('id', 'txtmonto_cantidad9-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs9-'+contadorC);
            input5.setAttribute('class', 'CSSTextArea');
            input5.setAttribute('cols', '40');
            input5.setAttribute('rows', '3');
           input5.setAttribute('style', 'width: 99%;');
            td5.setAttribute('width', '35%');
             input5.setAttribute('id', 'txtobs9-'+contadorC);
            td5.appendChild(input5);

             td6 = document.createElement('td');
              td6.setAttribute('width', '4%');

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
            td1.setAttribute('width', '2%');
            td1.appendChild(input1);

           // td2.appendChild(input2);

            td3 = document.createElement('td');
            input3 = document.createElement('textarea');
            input3.setAttribute('name', 'txtdetalle10-'+contadorC);
            input3.setAttribute('class', 'CSSTextArea');
            input3.setAttribute('cols', '40');
            input3.setAttribute('rows', '4');
            input3.setAttribute('style', 'width: 99%;');
            td3.setAttribute('width', '30%');
            input3.setAttribute('id', 'txtdetalle10-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad10-'+contadorC);
            input4.setAttribute('class', 'boxBusqueda');
           input4.setAttribute('style', 'width: 99%;');
             td4.setAttribute('width', '18%');
            input4.setAttribute('id', 'txtmonto_cantidad10-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs10-'+contadorC);
            input5.setAttribute('class', 'CSSTextArea');
            input5.setAttribute('cols', '40');
            input5.setAttribute('rows', '3');
           input5.setAttribute('style', 'width: 99%;');
             td5.setAttribute('width', '35%');
             input5.setAttribute('id', 'txtobs10-'+contadorC);
            td5.appendChild(input5);

             td6 = document.createElement('td');
            td6.setAttribute('width', '4%');
           // td5.appendChild(input5);

            trc.appendChild(td1);
           // trc.appendChild(td2);
            trc.appendChild(td3);
            trc.appendChild(td4);
            trc.appendChild(td5);
            trc.appendChild(td6);
}


function onclick_agregarDetalle11() {
    //alert('entro tr1');
           var contadorC = 0;

            contadorC = parseInt(document.getElementById('conteoC').value);
            contadorC = contadorC+1;
            document.getElementById('conteoC').value = contadorC;

            tabla = document.getElementById('segui11');

            trc = document.createElement('tr');
            trc.setAttribute('id', 'tempTr01'+contadorC);

            tabla.appendChild(trc);

            td1 = document.createElement('td');
            td1.setAttribute('style', ' height:24px; ');
            input1 = document.createElement('input');
            input1.setAttribute('type', 'checkbox');
            input1.setAttribute('name', 'chk'+contadorC);
            input1.setAttribute('id', 'chk'+contadorC);
            td1.setAttribute('width', '2%');
            td1.appendChild(input1);

           // td2.appendChild(input2);

            td3 = document.createElement('td');
            input3 = document.createElement('textarea');
            input3.setAttribute('name', 'txtdetalle11-'+contadorC);
            input3.setAttribute('class', 'CSSTextArea');
            input3.setAttribute('cols', '40');
            input3.setAttribute('rows', '4');
           input3.setAttribute('style', 'width: 99%;');
            td3.setAttribute('width', '30%');
            input3.setAttribute('id', 'txtdetalle11-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad11-'+contadorC);
            input4.setAttribute('class', 'boxBusqueda');
           input4.setAttribute('style', 'width: 99%;');
             td4.setAttribute('width', '18%');
            input4.setAttribute('id', 'txtmonto_cantidad11-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs11-'+contadorC);
            input5.setAttribute('class', 'CSSTextArea');
            input5.setAttribute('cols', '40');
            input5.setAttribute('rows', '3');
           input5.setAttribute('style', 'width: 99%;');
            td5.setAttribute('width', '35%');
             input5.setAttribute('id', 'txtobs11-'+contadorC);
            td5.appendChild(input5);

             td6 = document.createElement('td');
            td6.setAttribute('width', '4%');
           // td5.appendChild(input5);

            trc.appendChild(td1);
           // trc.appendChild(td2);
            trc.appendChild(td3);
            trc.appendChild(td4);
            trc.appendChild(td5);
            trc.appendChild(td6);
}


function deleteRowRciaGral(){
//alert('dfsdsdsd');
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
    deleteRowRcia('segui11');

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



</script>
