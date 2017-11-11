<?php
include "page_ganaderaEvaluacion.php";
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
<HTML>
  <HEAD>
  </HEAD>
 <BODY>
<div id="divgral" class="texto">

<!--<form action="tab_ganadero.php" method="POST" autocomplete="off" name="form-evalganadrcia2" id="form-evalganadrcia2" enctype="multipart/form-data" >-->
 <form action="tab_ganadero.php" method="POST" autocomplete="off" name="form-evalganadrcia2" id="form-evalganadrcia2" enctype="multipart/form-data" >
     <input id="anhoActivo_" type="hidden" value="<?php if(isset($_POST['anhoActivo_']) && ($_POST['anhoActivo_']>0)){echo $_POST['anhoActivo_']; }else{echo "0";} ?> " name="anhoActivo_">
     <input id="anhoActivo2_" type="hidden" value="<?php if(isset($_POST['anhoActivo2_']) ){echo $_POST['anhoActivo2_']; }else{echo "0";} ?> " name="anhoActivo2_">
</form>
 <form action="evaluacion_ganadera_rcia.php" method="POST" autocomplete="off" name="form-evalganadrcia" id="form-evalganadrcia" enctype="multipart/form-data" >

  <input id="idperiodo" type="hidden" value="<?php echo $periodo;?>" name="idperiodo">
  <input id="idtipoPredio" type="hidden" value="<?php echo $row_predio['idtipoprop'];?>" name="idtipoPredio">


 <?php
   /* $anho="0";
    $sql_anho = "select *
	from monitoreo.monitoreo m   where   m.idregistro = ".$_SESSION['idreg']." and anho=".$_POST['anhoActivo_']."  order by anho asc  limit 1"  ;
	$mon_anho= pg_query($cn,$sql_anho);
    while ($row_anho = pg_fetch_assoc($mon_anho)){
        $anho=$row_anho["anho"];
    }
    //if(isset($_POST['anhoActivo_']) && ($_POST['anhoActivo_']>0)){echo " <script> window.location.href='#tabs-3';   </script> ";}
*/
//echo "aaa AnhoAct1:".$_POST['anhoActivo2_']."-anhoActivo2:".$_POST['anhoActivo_']." -idreg".$_SESSION['idreg']." - 1eranho:".$anho." con=".$sql_anho ;
if(isset($_POST['anhoActivo_']) && ($_POST['anhoActivo_']>0)){
  echo " <script> window.location.href='#tabs-3';</script>";
}
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
													  <input name="submit3" type="button" class='cabecera2' value="Eliminar Documento" onClick="javascript:deleteRowRciaGralganadero();">
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
                                                    //echo $sql_anho;
                                                    $mon_anho= pg_query($cn,$sql_anho);
                                                    $row_anho = pg_fetch_assoc($mon_anho);
                                                    $anho=0;
                                                    $anho=$row_anho["anho"];
                                                    //echo "consultaañoo=".$sql_anho;
                                                    $monit = $row_anho["idmonitoreo"];

                                                    $sql_docEvaluacion = "select *
			                                        from monitoreo.analisisdocumentacion as a inner join monitoreo.monitoreo as m on a.idmonitoreo = m.idmonitoreo inner join monitoreo.documentacion d on d.idDocumentacion=a.idDocumentacion
			                                        where    d.tipodocumento=71 and  m.tipo=267 and  m.idregistro = ".$_SESSION['idreg']." and m.estado=1  and anho=".$anho ;
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

                                                 </table>

                                                <table width="95%" id="segui2" border="1" class="taulaA">
                                                                  <tr id="tr1" name="tr1" class="cabecera2" align="center">
                                                                     <td colspan="4" width="90%">Razas mejoradas</td>
                                                                     <td width="4%"><input name="btn1" type="button" class='cabecera2' value="Agregar" onClick="javascript:onclick_agregarDetalle2g();" ></td>
                                                                  </tr>
                                                                <?php
                                                                $rcia_docEvaluacion = pg_query($cn,$sql_docEvaluacion);
                                                                while ($row_docEvaluacion = pg_fetch_assoc($rcia_docEvaluacion)  ){
                                                                $ct++;
                                                                      if($row_docEvaluacion['iddocumentacion']==1){  //--- iddoc= 22 = uso de alimentos suplementarios
                                                                       ?>
                                                                         <tr><td width="2%" height="24"><input type="checkbox" name="chk"/></td>
                                                                            <td width="30%"><textarea  name="txtdetalle2-<?php echo $ct; ?>" id="txtdetalle2-<?php echo $ct; ?>" cols="40" rows="3" style="width: 99%;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
                                                                            <td width="18%" ><input name="txtmonto_cantidad2-<?php echo $ct; ?>" type="text"  style="width:99%;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
                                                                            <td width="35%" ><textarea  name="txtobs2-<?php echo $ct; ?>" id="txtobs2-<?php echo $ct; ?>" cols="40" rows="3" style="width:99%;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
                                                                        </tr>
                                                                   <?php }} ?>

                                                 </table>

                                                 <table width="95%" id="segui3" border="1" class="taulaA">
                                                                  <tr id="tr1" name="tr1" class="cabecera2" align="center">
                                                                     <td colspan="4" width="90%">Ensilado de forrajes</td>
                                                                     <td width="4%"><input name="btn1" type="button" class='cabecera2' value="Agregar" onClick="javascript:onclick_agregarDetalle3g();" ></td>
                                                                  </tr>
                                                                   <?php
                                                                    $rcia_docEvaluacion = pg_query($cn,$sql_docEvaluacion);
                                                                    while ($row_docEvaluacion = pg_fetch_assoc($rcia_docEvaluacion)  ){
                                                                    $ct++;
                                                                      if($row_docEvaluacion['iddocumentacion']==2){  //--- iddoc= 22 = uso de alimentos suplementarios
                                                                       ?>
                                                                        <tr><td width="2%" height="24"><input type="checkbox" name="chk"/></td>
                                                                            <td width="30%" ><textarea  name="txtdetalle3-<?php echo $ct; ?>" id="txtdetalle3-<?php echo $ct; ?>" cols="40" rows="3" style="width: 99%;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
                                                                            <td width="18%" ><input name="txtmonto_cantidad3-<?php echo $ct; ?>" type="text" style="width:99%;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
                                                                            <td  width="35%" ><textarea  name="txtobs3-<?php echo $ct; ?>" id="txtobs3-<?php echo $ct; ?>" cols="40" rows="3" style="width:99%;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
                                                                        </tr>
                                                                   <?php }} ?>


                                                  </table>
                                                  <table width="95%" id="segui4" border="1" class="taulaA">
                                                                  <tr id="tr1" name="tr1" class="cabecera2" align="center">
                                                                     <td colspan="4" width="90%">Uso de alimentos suplementarios</td>
                                                                     <td width="4%"><input name="btn1" type="button" class='cabecera2' value="Agregar" onClick="javascript:onclick_agregarDetalle4g();" ></td>
                                                                  </tr>
                                                                  <?php
                                                                $rcia_docEvaluacion = pg_query($cn,$sql_docEvaluacion);
                                                                while ($row_docEvaluacion = pg_fetch_assoc($rcia_docEvaluacion)  ){
                                                                $ct++;
                                                                      if($row_docEvaluacion['iddocumentacion']==22){  //--- iddoc= 22 = uso de alimentos suplementarios
                                                                       ?>
                                                                        <tr><td  width="2%" height="24"><input type="checkbox" name="chk"/></td>
                                                                        <td  width="30%"><textarea  name="txtdetalle4-<?php echo $ct; ?>" id="txtdetalle4-<?php echo $ct; ?>" cols="40" rows="3" style="width:99%;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
                                                                        <td width="18%" > <input name="txtmonto_cantidad4-<?php echo $ct; ?>" type="text"  style="width:99%;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
                                                                        <td width="35%" ><textarea name="txtobs4-<?php echo $ct; ?>" id="txtobs4-<?php echo $ct; ?>" cols="40" rows="3" style="width:99%;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
                                                                        </tr>
                                                                   <?php } } ?>
                                                 </table>


                                                 <table width="95%" id="segui5" border="1" class="taulaA">
                                                                 <tr id="tr1" name="tr1" class="cabecera2" align="center">
                                                                    <td colspan="4" width="90%">Implementacion y/o Mantenimiento de Pasturas</td>
                                                                    <td width="4%"><input name="btn1" type="button" class='cabecera2' value="Agregar" onClick="javascript:onclick_agregarDetalle5g();" ></td>
                                                                 </tr>
                                                                 <?php
                                                               $rcia_docEvaluacion = pg_query($cn,$sql_docEvaluacion);
                                                               while ($row_docEvaluacion = pg_fetch_assoc($rcia_docEvaluacion)  ){
                                                               $ct++;
                                                                     if($row_docEvaluacion['iddocumentacion']==34){  //--- iddoc= 22 = uso de alimentos suplementarios
                                                                      ?>
                                                                       <tr><td  width="2%" height="24"><input type="checkbox" name="chk"/></td>
                                                                       <td  width="30%"><textarea   name="txtdetalle5-<?php echo $ct; ?>" id="txtdetalle5-<?php echo $ct; ?>" cols="40" rows="3" style="width:99%;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
                                         <td width="18%" > <input name="txtmonto_cantidad5-<?php echo $ct; ?>" type="text"   style="width:99%;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
                                         <td width="35%" ><textarea   name="txtobs5-<?php echo $ct; ?>" id="txtobs5-<?php echo $ct; ?>" cols="40" rows="3" style="width:99%;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
                                                                       </tr>
                                                                  <?php } } ?>
                                                </table>





                                                 <table width="95%" id="segui6" border="1" class="taulaA">
                                                                  <tr id="tr1" name="tr1" class="cabecera2" align="center">
                                                                     <td colspan="4" width="90%">Potreros alambrados, Cercas Eléctricas, saleros</td>
                                                                     <td width="4%"><input name="btn1" type="button" class='cabecera2' value="Agregar" onClick="javascript:onclick_agregarDetalle6g();" ></td>
                                                                  </tr>
                                                                    <?php
                                                                    $rcia_docEvaluacion = pg_query($cn,$sql_docEvaluacion);
                                                                    while ($row_docEvaluacion = pg_fetch_assoc($rcia_docEvaluacion)  ){
                                                                    $ct++;
                                                                      if($row_docEvaluacion['iddocumentacion']==3){  //--- iddoc= 22 = uso de alimentos suplementarios
                                                                       ?>
                                                                      <tr>   <td width="2%" height="24"><input type="checkbox" name="chk"/></td>
                                                                             <td width="30%" ><textarea   name="txtdetalle6-<?php echo $ct; ?>" id="txtdetalle6-<?php echo $ct; ?>" cols="40" rows="3" style="width: 99%;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
                                                                            <td width="18%" ><input name="txtmonto_cantidad6-<?php echo $ct; ?>" type="text"   style="width:99%;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
                                                                            <td width="35%" ><textarea   name="txtobs6-<?php echo $ct; ?>" id="txtobs6-<?php echo $ct; ?>" cols="40" rows="3" style="width:99%;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
                                                                    </tr>
                                                                   <?php }} ?>
                                                </table>

                                                <table width="95%" id="segui7" border="1" class="taulaA">
                                                        <tr id="tr1" name="tr1" class="cabecera2" align="center">
                                                            <td colspan="4" width="90%">Atajados, pozos, noques, tanques, bebederos</td>
                                                            <td width="4%"><input name="btn1" type="button" class='cabecera2' value="Agregar" onClick="javascript:onclick_agregarDetalle7g();" ></td>
                                                        </tr>
                                                         <?php
                                                            $rcia_docEvaluacion = pg_query($cn,$sql_docEvaluacion);
                                                            while ($row_docEvaluacion = pg_fetch_assoc($rcia_docEvaluacion)  ){
                                                            $ct++;
                                                                      if($row_docEvaluacion['iddocumentacion']==4){  //--- iddoc= 22 = uso de alimentos suplementarios
                                                                       ?>
                                                                     <tr>  <td width="2%" height="24"><input type="checkbox" name="chk"/></td>
                                                                        <td width="30%" ><textarea   name="txtdetalle7-<?php echo $ct; ?>" id="txtdetalle7-<?php echo $ct; ?>" cols="40" rows="3" style="width:99%;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
                                                                        <td width="18%" ><input name="txtmonto_cantidad7-<?php echo $ct; ?>" type="text"   style="width:99%;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
                                                                        <td width="35%" ><textarea   name="txtobs7-<?php echo $ct; ?>" id="txtobs7-<?php echo $ct; ?>" cols="40" rows="3" style="width:99%;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
                                                                    </tr>
                                                                   <?php }  } ?>
                                                  </table>


                                                <table width="95%" id="segui8" border="1" class="taulaA">
                                                        <tr id="tr1" name="tr1" class="cabecera2" align="center">
                                                            <td colspan="4" width="90%">Corral, Brete, Cepo, balanza, cargadero</td>
                                                            <td width="4%"><input name="btn1" type="button" class='cabecera2' value="Agregar" onClick="javascript:onclick_agregarDetalle8g();" ></td>
                                                        </tr>
                                                         <?php
                                                        $rcia_docEvaluacion = pg_query($cn,$sql_docEvaluacion);
                                                        while ($row_docEvaluacion = pg_fetch_assoc($rcia_docEvaluacion)  ){
                                                        $ct++;
                                                            if($row_docEvaluacion['iddocumentacion']==6){  //--- iddoc= 22 = uso de alimentos suplementarios
                                                            ?>
                                                          <tr><td width="2%"  height="24"><input type="checkbox" name="chk"/></td>
                                                                <td width="30%" ><textarea   name="txtdetalle8-<?php echo $ct; ?>" id="txtdetalle8-<?php echo $ct; ?>" cols="40" rows="3" style="width: 99%;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
                                                                <td width="18%" ><input name="txtmonto_cantidad8-<?php echo $ct; ?>" type="text"   style="width:99%;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
                                                                <td width="35%" ><textarea   name="txtobs8-<?php echo $ct; ?>" id="txtobs8-<?php echo $ct; ?>" cols="40" rows="3" style="width:99%;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
                                                        </tr>
                                                        <?php } } ?>
                                                </table>
                                                <table width="95%" id="segui9" border="1" class="taulaA">
                                                        <tr id="tr1" name="tr1" class="cabecera2" align="center">
                                                            <td colspan="4" width="90%">Certificado y/o Acta de Vacunación del SENASAG.</td>
                                                            <td width="4%"><input name="btn1" type="button" class='cabecera2' value="Agregar" onClick="javascript:onclick_agregarDetalle9g();" ></td>
                                                        </tr>
                                                         <?php
                                                        $rcia_docEvaluacion = pg_query($cn,$sql_docEvaluacion);
                                                        while ($row_docEvaluacion = pg_fetch_assoc($rcia_docEvaluacion)  ){
                                                        $ct++;
                                                            if($row_docEvaluacion['iddocumentacion']==7){  //--- iddoc= 22 = uso de alimentos suplementarios
                                                            ?>
                                                           <tr> <td width="2%" height="24"><input type="checkbox" name="chk"/></td>
                                                                <td width="30%" ><textarea   name="txtdetalle9-<?php echo $ct; ?>" id="txtdetalle9-<?php echo $ct; ?>" cols="40" rows="3" style="width: 99%;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
                                                                <td width="18%" ><input name="txtmonto_cantidad9-<?php echo $ct; ?>" type="text"   style="width:99%;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
                                                                <td  width="35%"  ><textarea   name="txtobs9-<?php echo $ct; ?>" id="txtobs9-<?php echo $ct; ?>" cols="40" rows="3" style="width:99%;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
                                                            </tr>
                                                        <?php } } ?>
                                                </table>
                                                <table width="95%" id="segui10" border="1" class="taulaA">
                                                        <tr id="tr1" name="tr1" class="cabecera2" align="center">
                                                            <td colspan="4" width="90%">Compra de Ganado</td>
                                                            <td width="4%"><input name="btn1" type="button" class='cabecera2' value="Agregar" onClick="javascript:onclick_agregarDetalle10g();" ></td>
                                                        </tr>
                                                         <?php
                                                        $rcia_docEvaluacion = pg_query($cn,$sql_docEvaluacion);
                                                        while ($row_docEvaluacion = pg_fetch_assoc($rcia_docEvaluacion)  ){
                                                        $ct++;
                                                            if($row_docEvaluacion['iddocumentacion']==8){  //--- iddoc= 22 = uso de alimentos suplementarios
                                                            ?>
                                                        <tr> <td   width="2%" height="24"><input type="checkbox" name="chk"/></td>
                                                                <td width="30%" ><textarea   name="txtdetalle10-<?php echo $ct; ?>" id="txtdetalle10-<?php echo $ct; ?>" cols="40" rows="3" style="width:99%;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
                                                                <td width="18%"  ><input name="txtmonto_cantidad10-<?php echo $ct; ?>" type="text"   style="width:99%;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
                                                                <td width="35%"  ><textarea   name="txtobs10-<?php echo $ct; ?>" id="txtobs10-<?php echo $ct; ?>" cols="40" rows="3" style="width:99%;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
                                                        </tr>
                                                        <?php } } ?>

                                                </table>
                                                <table width="95%" id="segui11" border="1" class="taulaA">
                                                        <tr id="tr1" name="tr1" class="cabecera2" align="center">
                                                            <td colspan="4" width="90%">Venta de Ganado</td>
                                                            <td width="4%"><input name="btn1" type="button" class='cabecera2' value="Agregar" onClick="javascript:onclick_agregarDetalle11g();" ></td>
                                                        </tr>
                                                          <?php
                                                         $rcia_docEvaluacion = pg_query($cn,$sql_docEvaluacion);
                                                         while ($row_docEvaluacion = pg_fetch_assoc($rcia_docEvaluacion)  ){
                                                         $ct++;
                                                            if($row_docEvaluacion['iddocumentacion']==9){  //--- iddoc= 10 = insumo agropecupario
                                                            ?>
                                                           <tr> <td width="2%" height="24"><input type="checkbox" name="chk"/></td>
                                                                 <td width="30%" ><textarea   name="txtdetalle11-<?php echo $ct; ?>" id="txtdetalle11-<?php echo $ct; ?>" cols="40" rows="3" style="width:99%;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
                                                                <td width="18%" ><input name="txtmonto_cantidad11-<?php echo $ct; ?>" type="text"   style="width:99%;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
                                                                <td width="35%" ><textarea   name="txtobs11-<?php echo $ct; ?>" id="txtobs11-<?php echo $ct; ?>" cols="40" rows="3" style="width: 99%;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
                                                            </tr>
                                                        <?php } } ?>

                                                </table>
                                                <table width="95%" id="segui12" border="1" class="taulaA">
                                                        <tr id="tr1" name="tr1" class="cabecera2" align="center">

                                                            <td colspan="4" width="90%">Insumos Agropecuarios</td>
                                                            <td width="4%"><input name="btn1" type="button" class='cabecera2' value="Agregar" onClick="javascript:onclick_agregarDetalle12g();" ></td>
                                                        </tr>
                                                                <?php
                                                                $rcia_docEvaluacion = pg_query($cn,$sql_docEvaluacion);
                                                                 while ($row_docEvaluacion = pg_fetch_assoc($rcia_docEvaluacion)  ){
                                                                      $ct++;
                                                                    if($row_docEvaluacion['iddocumentacion']==10){  //--- iddoc= 22 = uso de alimentos suplementarios
                                                                    ?>
                                                                   <tr> <td width="2%" height="24"><input type="checkbox" name="chk"/></td>
                                                                    <td width="30%" ><textarea   name="txtdetalle12-<?php echo $ct; ?>" id="txtdetalle12-<?php echo $ct; ?>" cols="40" rows="3" style="width:99%;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
                                                                    <td width="18%" ><input name="txtmonto_cantidad12-<?php echo $ct; ?>" type="text"   style="width:99%;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
                                                                    <td width="35%" ><textarea   name="txtobs12-<?php echo $ct; ?>" id="txtobs12-<?php echo $ct; ?>" cols="40" rows="3" style="width:99%;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
                                                                  </tr>
                                                                <?php }  } ?>
										                            </table>


                                                <table width="95%" id="segui13" border="1" class="taulaA">
                                                        <tr id="tr1" name="tr1" class="cabecera2" align="center">

                                                            <td colspan="4" width="90%">Otros</td>
                                                            <td width="4%"><input name="btn1" type="button" class='cabecera2' value="Agregar" onClick="javascript:onclick_agregarDetalle13g();" ></td>
                                                        </tr>
                                                                <?php
                                                                $rcia_docEvaluacion = pg_query($cn,$sql_docEvaluacion);
                                                                 while ($row_docEvaluacion = pg_fetch_assoc($rcia_docEvaluacion)  ){
                                                                      $ct++;
                                                                    if($row_docEvaluacion['iddocumentacion']==11){  //--- iddoc= 11 = otros
                                                                    ?>
                                                                   <tr> <td width="2%" height="24"><input type="checkbox" name="chk"/></td>
                                                                        <td width="30%" ><textarea   name="txtdetalle13-<?php echo $ct; ?>" id="txtdetalle13-<?php echo $ct; ?>" cols="40" rows="3" style="width:99%;"><?php echo $row_docEvaluacion['detallecotenido']; ?></textarea></td>
                                                                        <td  width="18%" ><input name="txtmonto_cantidad13-<?php echo $ct; ?>" type="text"   style="width:99%;"   value="<?php echo $row_docEvaluacion['montocantidad']; ?>"></td>
                                                                        <td width="35%" ><textarea   name="txtobs13-<?php echo $ct; ?>" id="txtobs13-<?php echo $ct; ?>" cols="40" rows="3" style="width:99%;" > <?php echo $row_docEvaluacion['observaciones']; ?>  </textarea></td>
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

               if($idTipoPredio==37 || $idTipoPredio==38  )  // ES PEQUENA O COMUNIDAD
               {

                 //echo "aaaaaxxx:".$idmonitoreo2."--";
                 $sql_detEvaluacion = "select *
          from monitoreo.valoracionalimentos va inner join   monitoreo.monitoreo  m on  va.idmonitoreo = m.idmonitoreo
          where  va.tipo=71 and va.idevalespecif > 35 and  m.tipo=267 and  m.idregistro = ".$_SESSION['idreg']." and m.idmonitoreo=".$idmonitoreo2." order by va.idtablavaloracion asc";
          $rcia_detEvaluacion = pg_query($cn,$sql_detEvaluacion);
                 //echo "conSULTAAAA=".$sql_detEvaluacion;
              ?>

                  <table class="tableizer-table">
                          <thead>
                              <tr class="tableizer-firstrow">
                                <th colspan = "2">Evaluación directriz Técnica General</th>
                                <th rowspan = "2">Ponderación (%)</th>
                              </tr>

                              <tr>
                                <th>Parámetro</th>
                                <th>Valoración (%)</th>
                              </tr>
                          </thead>


                          <tbody style="text-align:center;">
                              <tr>
                                <td id="peg1" name="peg1" type="text"> Superficie pastos cultivados de piso y/o corte (ha). </td>
                                <td  id="pvg1" name="pvg1" value="30" >30</td>
                                <td><input name="psuppastoscultivados" id="psuppastoscultivados" type="text" class="boxBusqueda4" value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>" onKeyUp="extractNumber(this,0,false);promediar(this,30,1);" onKeyPress="return blockNonNumbers(this, event, true, false); "  onblur="sumatoria_ganaderopeque(); "  ></td>
                              </tr>


                              <tr>
                                <td id="peg2" name="peg2" type="text"> Aplicación de Tecnicas y Tecnologías Sostenibles: -Uso de Alimentos Suplementarios. - Razas Mejoraras. - Ensilado de Forrajes. </td>
                                <td  id="pvg2" name="pvg2" value="30" >10</td>
                                <td><input name="ptecnicas" id="ptecnicas" type="text" class="boxBusqueda4" value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>" onKeyUp="extractNumber(this,0,false);promediar(this,10,1);" onKeyPress="return blockNonNumbers(this, event, true, false); "  onblur="sumatoria_ganaderopeque(); "  ></td>
                              </tr>

                              <tr>
                                <td id="peg3" name="peg3" type="text"> Potreros con alambrada en el área deforestada sin autorización e instalación de Saleros. </td>
                                <td  id="pvg3" name="pvg3" value="30" >20</td>
                                <td><input name="ppotreros" id="ppotreros" type="text" class="boxBusqueda4" value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>" onKeyUp="extractNumber(this,0,false);promediar(this,20,1);" onKeyPress="return blockNonNumbers(this, event, true, false); "  onblur="sumatoria_ganaderopeque(); "  ></td>
                              </tr>

                              <tr>
                                <td id="peg4" name="peg4" type="text"> Total cabezas de ganado mayor en el área deforestada. </td>
                                <td  id="pvg4" name="pvg4" value="30" >40</td>
                                <td><input name="pcabezas" id="pcabezas" type="text" class="boxBusqueda4" value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>" onKeyUp="extractNumber(this,0,false);promediar(this,40,1);" onKeyPress="return blockNonNumbers(this, event, true, false); "  onblur="sumatoria_ganaderopeque(); "  ></td>
                              </tr>

                              <tr>
                                <td colspan = "2">PUNTUACION FINAL</td>
                                <td><input name="puntuacionfinalp" id="puntuacionfinalp"  disabled type="text" class="boxBusqueda4"  value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>" onKeyUp="extractNumber(this,0,false);sumatoria_ganaderopeque();" onKeyPress="return blockNonNumbers(this, event, true, false);" onblur="sumatoria_ganaderopeque(); "   ></td></tr>


                          </tbody>


                    </table>
              <?php
               }
               else
               {


                 $sql_detEvaluacion = "select *

          from monitoreo.valoracionalimentos va inner join   monitoreo.monitoreo  m on  va.idmonitoreo = m.idmonitoreo
          where  va.tipo=71 and  m.tipo=267 and  m.idregistro = ".$_SESSION['idreg']." and m.idmonitoreo=".$idmonitoreo2." order by va.idtablavaloracion asc" ;
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

                        <tr><td id="eg1" name="eg1" type="text"> Superficie pastos cultivados de piso y/o corte (ha). </td><td  id="vg1" name="vg1" value="30" >30</td><td id="ee1" name="ee1" >Superficie pastos cultivados de piso y/o corte (ha).</td><td  id="ve1" name="ve1" >30</td> <td><input name="suppastoscultivados" id="suppastoscultivados" type="text" class="boxBusqueda4" value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>" onKeyUp="extractNumber(this,0,false);promediar(this,30,2);" onKeyPress="return blockNonNumbers(this, event, true, false); "  onblur="sumatoria_ganaderogrande(); "  ></td> </tr>
                        <tr><td id="eg2" name="eg2" rowspan = "3" >Aplicación de técnicas y tecnologías sostenibles: (1 Técnica = 30 %; 2 Técnicas = 70 %; 3 Técnicas = 100%) </td><td id="vg2" name="vg2" rowspan = "3">10</td> <td  id="ee2" name="ee2" >Uso de alimentos suplementarios</td><td id="ve2" name="ve2"  rowspan = "3">10</td><td><input name="alimentosuple" id="alimentosuple" type="text" class="boxBusqueda4" value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>"  onKeyUp="extractNumber(this,0,false); promediar(this,4,2); sumatoria_ganaderogrande();" onKeyPress="return blockNonNumbers(this, event, true, false); " onblur="sumatoria_ganaderogrande();"  onchange="sumatoria_ganaderogrande(); "></td></tr>
                        <tr><td id="ee3" name="ee3">Razas mejoradas</td><td><input name="razasmejoradas" id="razasmejoradas" type="text" class="boxBusqueda4" value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>" onKeyUp="extractNumber(this,0,false); sumatoria_ganaderogrande();promediar(this,4,2);" onKeyPress="return blockNonNumbers(this, event, true, false);" onblur="sumatoria_ganaderogrande(); "    ></td></tr>
                        <tr><td id="ee4" name="ee4" >Ensilado de forrajes</td><td><input name="enlisadosforraje" id="enlisadosforraje" type="text" class="boxBusqueda4" value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>"  onKeyUp="extractNumber(this,0,false); sumatoria_ganaderogrande();promediar(this,4,2);" onKeyPress="return blockNonNumbers(this, event, true, false);" onblur="sumatoria_ganaderogrande(); "   ></td></tr>
                        <tr><td id="eg3" name="eg3" rowspan = "4">Potreros con alambrada en el área deforestada s/autorización e instalación de saleros. </td><td id="vg3" name="vg3" rowspan = "4">20</td><td id="ee5" name="ee5" >Potreros alambrados, Cercas Eléctricas, saleros </td><td>4</td><td><input name="potrerosalam" id="potrerosalam"  type="text" class="boxBusqueda4"  value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>" onKeyUp="extractNumber(this,0,false);promediar(this,4,2);" onKeyPress="return blockNonNumbers(this, event, true, false);" onblur="sumatoria_ganaderogrande();   "></td></tr>
                        <tr><td id="ee6" name="ee6" >Atajados, pozos, noques, tanques, bebederos</td><td>4</td><td><input name="atajados" id="atajados" type="text" class="boxBusqueda4"  onKeyUp="extractNumber(this,0,false);promediar(this,4,2);" value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>"onKeyPress="return blockNonNumbers(this, event, true, false);sumatoria_ganaderogrande();" onblur="sumatoria_ganaderogrande(); "   ></td></tr>
                        <tr><td id="ee7" name="ee7" >Corral </td><td>6</td><td><input name="corral" id="corral"  type="text" class="boxBusqueda4"  onKeyUp="extractNumber(this,0,false);promediar(this,6,2);" value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>" onKeyPress="return blockNonNumbers(this, event, true, false); " onblur="sumatoria_ganaderogrande(); "   ></td></tr>
                        <tr><td id="ee8" name="ee8" >Brete, Cepo, balanza, cargadero</td><td>6</td><td><input name="brete"  id="brete" type="text" class="boxBusqueda4" value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>" onKeyUp="extractNumber(this,0,false);promediar(this,6,2); " onKeyPress="return blockNonNumbers(this, event, true, false);" onblur="sumatoria_ganaderogrande(); "   ></td></tr>
                        <tr><td id="eg4" name="eg4" rowspan = "3" >Total cabezas de  ganado mayor en el área deforestada. (Relación directa de acuerdo a metas programadas)</td><td rowspan = "3">40</td><td  id="ee9" name="ee9" >Certificación de Vacunación del SENASAG.</td><td>15</td><td><input name="certificadosenasag" id="certificadosenasag"  type="text" class="boxBusqueda4" value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>" onKeyUp="extractNumber(this,0,false);promediar(this,15,2);" onKeyPress="return blockNonNumbers(this, event, true, false);" onblur="sumatoria_ganaderogrande(); "    ></td></tr>
                        <tr><td id="ee10" name="ee10" >Compra y Venta de animales.</td><td>15</td><td><input name="compraventaganado" id="compraventaganado" type="text" class="boxBusqueda4"  onKeyUp="extractNumber(this,0,false);promediar(this,15,2);" value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>" onKeyPress="return blockNonNumbers(this, event, true, false);" onblur="sumatoria_ganaderogrande(); "    > </td></tr>
                        <tr><td id="ee11" name="ee11" >Insumos pecuarios.</td><td>10</td><td><input name="insumospecuarios" id="insumospecuarios" type="text" class="boxBusqueda4"  value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>" onKeyUp="extractNumber(this,0,false);promediar(this,10,2);" onKeyPress="return blockNonNumbers(this, event, true, false);" onblur="sumatoria_ganaderogrande(); "   ></td></tr>
                        <tr><td colspan = "4">PUNTUACION FINAL</td><td><input name="puntuacionfinala" id="puntuacionfinala"  disabled type="text" class="boxBusqueda4"  value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>" onKeyUp="extractNumber(this,0,false);sumatoria_ganaderogrande();" onKeyPress="return blockNonNumbers(this, event, true, false);" onblur="sumatoria_ganaderogrande(); "   ></td></tr>
                       </tbody>
               </table>
              <?php
               }
            ?>
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
              <form action="evaluacion_ganadera_rcia.php" method="post" name="form" >
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


<!--</form>-->
</form>

<div style="height:20px;" ></div>



</div>

<script language="javascript" type="text/javascript">

var tp = document.getElementById('idtipoPredio').value;
//alert (tp);


if (tp == 36 || tp == 35)
 {
   //alert ('ENTRA A GRANDE');
  sumatoria_ganaderogrande();
}
else
{
  //alert ('ENTRA A peque');
 sumatoria_ganaderopeque();
}


function promediar(obj,param,tip) {
  // alert('valor='+obj.value+'  - parametro='+param);
   if(obj.value>param){
      alert('El valor tiene que ser Menor o igual a '+param);
      obj.value=param;

   }
   else
   {

   }

   if(tip==1)
   {
      sumatoria_ganaderopeque();
   }
   else if (tip==2)
   {
      //alert ('llega sumatoria');
      sumatoria_ganaderogrande();

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
    document.getElementById("form-evalganadrcia2").submit();
}

function establecer_anos(){
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
                url:   'evaluacion_ganadera_rcia_Ajax.php',
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




 function onclick_agregarDetalle1g() {
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

            input3.setAttribute('cols', '33');
            input3.setAttribute('rows', '4');
            input3.setAttribute('style', 'width: 99%;');
            td3.setAttribute('width', '30%');
            input3.setAttribute('id', 'txtdetalle1-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad1-'+contadorC);

             input4.setAttribute('style', 'width: 99%;');
             td4.setAttribute('width', '18%');
            input4.setAttribute('id', 'txtmonto_cantidad1-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs1-'+contadorC);

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


function onclick_agregarDetalle2g() {
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

            input3.setAttribute('cols', '33');
            input3.setAttribute('rows', '4');
            input3.setAttribute('style', 'width: 99%;');
            td3.setAttribute('width', '30%');
            input3.setAttribute('id', 'txtdetalle2-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad2-'+contadorC);

            input4.setAttribute('style', 'width: 99%;');
             td4.setAttribute('width', '18%');
            input4.setAttribute('id', 'txtmonto_cantidad2-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs2-'+contadorC);

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



function onclick_agregarDetalle3g() {
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

            input3.setAttribute('cols', '33');
            input3.setAttribute('rows', '4');
              input3.setAttribute('style', 'width: 99%;');
            td3.setAttribute('width', '30%');
            input3.setAttribute('id', 'txtdetalle3-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad3-'+contadorC);

              input4.setAttribute('style', 'width: 99%;');
             td4.setAttribute('width', '18%');
            input4.setAttribute('id', 'txtmonto_cantidad3-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs3-'+contadorC);

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


function onclick_agregarDetalle4g() {
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

            input3.setAttribute('cols', '33');
            input3.setAttribute('rows', '4');
             input3.setAttribute('style', 'width: 99%;');
            td3.setAttribute('width', '30%');
            input3.setAttribute('id', 'txtdetalle4-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad4-'+contadorC);

             input4.setAttribute('style', 'width: 99%;');
             td4.setAttribute('width', '18%');
            input4.setAttribute('id', 'txtmonto_cantidad4-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs4-'+contadorC);

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




function onclick_agregarDetalle5g() {
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

            input3.setAttribute('cols', '40');
            input3.setAttribute('rows', '4');
            input3.setAttribute('style', 'width: 99%;');
            td3.setAttribute('width', '30%');
            input3.setAttribute('id', 'txtdetalle5-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad5-'+contadorC);

             input4.setAttribute('style', 'width: 99%;');
             td4.setAttribute('width', '18%');
            input4.setAttribute('id', 'txtmonto_cantidad5-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs5-'+contadorC);

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




function onclick_agregarDetalle6g() {
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

            input3.setAttribute('cols', '40');
            input3.setAttribute('rows', '4');
             input3.setAttribute('style', 'width: 99%;');
            td3.setAttribute('width', '30%');
            input3.setAttribute('id', 'txtdetalle6-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad6-'+contadorC);

              input4.setAttribute('style', 'width: 99%;');
             td4.setAttribute('width', '18%');
            input4.setAttribute('id', 'txtmonto_cantidad6-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs6-'+contadorC);

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




function onclick_agregarDetalle7g() {
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

            input3.setAttribute('cols', '33');
            input3.setAttribute('rows', '4');
             input3.setAttribute('style', 'width: 99%;');
            td3.setAttribute('width', '30%');
            input3.setAttribute('id', 'txtdetalle7-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad7-'+contadorC);

              input4.setAttribute('style', 'width: 99%;');
             td4.setAttribute('width', '18%');
            input4.setAttribute('id', 'txtmonto_cantidad7-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs7-'+contadorC);

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




function onclick_agregarDetalle8g() {
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

            input3.setAttribute('cols', '40');
            input3.setAttribute('rows', '4');
            input3.setAttribute('id', 'txtdetalle8-'+contadorC);
              input3.setAttribute('style', 'width: 99%;');
            td3.setAttribute('width', '30%');
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad8-'+contadorC);

            input4.setAttribute('style', 'width: 99%;');
            td4.setAttribute('width', '18%');
            input4.setAttribute('id', 'txtmonto_cantidad8-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs8-'+contadorC);

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



function onclick_agregarDetalle9g() {
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

            input3.setAttribute('cols', '40');
            input3.setAttribute('rows', '4');
              input3.setAttribute('style', 'width: 99%;');
            td3.setAttribute('width', '30%');
            input3.setAttribute('id', 'txtdetalle9-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad9-'+contadorC);

            input4.setAttribute('style', 'width: 99%;');
             td4.setAttribute('width', '18%');
            input4.setAttribute('id', 'txtmonto_cantidad9-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs9-'+contadorC);

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



function onclick_agregarDetalle10g() {
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

            input3.setAttribute('cols', '40');
            input3.setAttribute('rows', '4');
            input3.setAttribute('style', 'width: 99%;');
            td3.setAttribute('width', '30%');
            input3.setAttribute('id', 'txtdetalle10-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad10-'+contadorC);

           input4.setAttribute('style', 'width: 99%;');
             td4.setAttribute('width', '18%');
            input4.setAttribute('id', 'txtmonto_cantidad10-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs10-'+contadorC);

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











function onclick_agregarDetalle11g() {
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

            input3.setAttribute('cols', '40');
            input3.setAttribute('rows', '4');
           input3.setAttribute('style', 'width: 99%;');
            td3.setAttribute('width', '30%');
            input3.setAttribute('id', 'txtdetalle11-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad11-'+contadorC);

           input4.setAttribute('style', 'width: 99%;');
             td4.setAttribute('width', '18%');
            input4.setAttribute('id', 'txtmonto_cantidad11-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs11-'+contadorC);

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


function onclick_agregarDetalle12g() {
    //alert('entro tr1');
           var contadorC = 0;

            contadorC = parseInt(document.getElementById('conteoC').value);
            contadorC = contadorC+1;
            document.getElementById('conteoC').value = contadorC;

            tabla = document.getElementById('segui12');

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
            input3.setAttribute('name', 'txtdetalle12-'+contadorC);

            input3.setAttribute('cols', '40');
            input3.setAttribute('rows', '4');
           input3.setAttribute('style', 'width: 99%;');
            td3.setAttribute('width', '30%');
            input3.setAttribute('id', 'txtdetalle12-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad12-'+contadorC);

           input4.setAttribute('style', 'width: 99%;');
             td4.setAttribute('width', '18%');
            input4.setAttribute('id', 'txtmonto_cantidad12-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs12-'+contadorC);

            input5.setAttribute('cols', '40');
            input5.setAttribute('rows', '3');
           input5.setAttribute('style', 'width: 99%;');
            td5.setAttribute('width', '35%');
             input5.setAttribute('id', 'txtobs12-'+contadorC);
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



function onclick_agregarDetalle13g() {
    //alert('entro tr1');
           var contadorC = 0;

            contadorC = parseInt(document.getElementById('conteoC').value);
            contadorC = contadorC+1;
            document.getElementById('conteoC').value = contadorC;

            tabla = document.getElementById('segui13');


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
            input3.setAttribute('name', 'txtdetalle13-'+contadorC);

            input3.setAttribute('cols', '40');
            input3.setAttribute('rows', '4');
           input3.setAttribute('style', 'width: 99%;');
            td3.setAttribute('width', '30%');
            input3.setAttribute('id', 'txtdetalle13-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad13-'+contadorC);

           input4.setAttribute('style', 'width: 99%;');
             td4.setAttribute('width', '18%');
            input4.setAttribute('id', 'txtmonto_cantidad13-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs13-'+contadorC);

            input5.setAttribute('cols', '40');
            input5.setAttribute('rows', '3');
           input5.setAttribute('style', 'width: 99%;');
            td5.setAttribute('width', '35%');
             input5.setAttribute('id', 'txtobs13-'+contadorC);
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
function deleteRowRciaGralganadero(){
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
    deleteRowRcia('segui12');
    deleteRowRcia('segui13');

}

function deleteRowRcia(tableID) {
   var yea=document.getElementById(tableID).rows.length;

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


function sumatoria_ganaderogrande(){

/*
     a=0;
     b=0;
     c=0;



     if(document.getElementById('alimentosuple').value.length>0){
       a=parseInt(document.getElementById('alimentosuple').value);
     }
     if(document.getElementById('razasmejoradas').value.length>0){
       b=parseInt(document.getElementById('razasmejoradas').value);
     }
     if(document.getElementById('enlisadosforraje').value.length>0){
       c=parseInt(document.getElementById('enlisadosforraje').value);
     }


     if((a+b+c)>10){
       //obj.value=0; //0;0;
       alert('La sumatoria de los 3 campos tiene que ser Menor o igual a '+10);
    }else{

    } */

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
     if(document.getElementById('enlisadosforraje').value.length>0){
       suma=suma+parseInt(document.getElementById('enlisadosforraje').value);
    }
     if(document.getElementById('potrerosalam').value.length>0){
       suma=suma+parseInt(document.getElementById('potrerosalam').value);
    }
     if(document.getElementById('atajados').value.length>0){
       suma=suma+parseInt(document.getElementById('atajados').value);
    }
      if(document.getElementById('corral').value.length>0){
       suma=suma+parseInt(document.getElementById('corral').value);
    }
      if(document.getElementById('brete').value.length>0){
       suma=suma+parseInt(document.getElementById('brete').value);
    }
    if(document.getElementById('certificadosenasag').value.length>0){
       suma=suma+parseInt(document.getElementById('certificadosenasag').value);
    }

     if(document.getElementById('compraventaganado').value.length>0){
       suma=suma+parseInt(document.getElementById('compraventaganado').value);
    }
     if(document.getElementById('insumospecuarios').value.length>0){
       suma=suma+parseInt(document.getElementById('insumospecuarios').value);
    }
    document.getElementById('puntuacionfinala').value=suma;

   // alert(suma ); onchange   onblur

}



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
     if(document.getElementById('enlisadosforraje').value.length>0){
       suma=suma+parseInt(document.getElementById('enlisadosforraje').value);
    }
     if(document.getElementById('potrerosalam').value.length>0){
       suma=suma+parseInt(document.getElementById('potrerosalam').value);
    }
     if(document.getElementById('atajados').value.length>0){
       suma=suma+parseInt(document.getElementById('atajados').value);
    }
      if(document.getElementById('corral').value.length>0){
       suma=suma+parseInt(document.getElementById('corral').value);
    }
      if(document.getElementById('brete').value.length>0){
       suma=suma+parseInt(document.getElementById('brete').value);
    }
    if(document.getElementById('certificadosenasag').value.length>0){
       suma=suma+parseInt(document.getElementById('certificadosenasag').value);
    }

     if(document.getElementById('compraventaganado').value.length>0){
       suma=suma+parseInt(document.getElementById('compraventaganado').value);
    }
     if(document.getElementById('insumospecuarios').value.length>0){
       suma=suma+parseInt(document.getElementById('insumospecuarios').value);
    }
    document.getElementById('puntuacionfinal').value=suma;

   // alert(suma ); onchange   onblur

}
 window.scrollBy(0, -1000);
//function subir(){
    //alert('jj');
   // window.scrollBy(0, -1000);
//}

function sumatoria_ganaderopeque(){
    suma=0;

    if(document.getElementById('psuppastoscultivados').value.length>0){
       suma=suma+parseInt(document.getElementById('psuppastoscultivados').value);
    }
    if(document.getElementById('ptecnicas').value.length>0){
       suma=suma+parseInt(document.getElementById('ptecnicas').value);
    }
     if(document.getElementById('ppotreros').value.length>0){
       suma=suma+parseInt(document.getElementById('ppotreros').value);
    }
     if(document.getElementById('pcabezas').value.length>0){
       suma=suma+parseInt(document.getElementById('pcabezas').value);
    }

//alert('aqui');
    if(suma > 100){
       document.getElementById('puntuacionfinalp').value=100;
    }
    else
    {
     document.getElementById('puntuacionfinalp').value=suma;
    }



}

// window.scrollBy(0, -1000);






 function recargar_anos(){

    var idperiodo=document.getElementById('idperiodo').value;
        var parametros = {
            "tarea" : "establecerAnos"
        };
        $.ajax({
                data:  parametros,
                url:   'evaluacion_ganadera_rcia_Ajax.php',
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
</script>
   <!--<input name="submit3" type="button"  value="Agregar Documento" onClick="javascript:sumatoria_ganadero();" >-->
</BODY></HTML>
