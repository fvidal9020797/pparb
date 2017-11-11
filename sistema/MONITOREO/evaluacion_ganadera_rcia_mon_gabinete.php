<?php
include "../reportes/reporte_rcia_monitoreo_gabinete.php";


if(isset($_REQUEST['Imprimir']))
{

  $reg = intval($_REQUEST['reg']);
  $idmonitoreo = intval($_REQUEST['monit']);

  //echo $reg;
  //echo "   ";
  //echo $idmonitoreo;
  Imprimirmonitoreogabinete($reg,$idmonitoreo);
}

?>

<HTML>
<HEAD>
    <link href="uploadfile.css" rel="stylesheet">
<script src="jquery.uploadfile.min.js"></script>

  </HEAD>
 <BODY>
<div id="divgral" class="texto">

<!--<form action="tab_ganadero.php" method="POST" autocomplete="off" name="form-evalganadrciaMG2" id="form-evalganadrciaMG2" enctype="multipart/form-data" >-->
 <form action="tab_ganadero.php" method="POST" autocomplete="off" name="form-evalganadrciaMG2" id="form-evalganadrciaMG2" enctype="multipart/form-data" >
     <input id="anhoActivoMG_" type="hidden" value="<?php if(isset($_POST['anhoActivoMG_']) && ($_POST['anhoActivoMG_']>0)){echo $_POST['anhoActivoMG_']; }else{echo "0";} ?> " name="anhoActivoMG_">
     <input id="anhoActivoMG2_" type="hidden" value="<?php if(isset($_POST['anhoActivoMG2_']) ){echo $_POST['anhoActivoMG2_']; }else{echo "0";} ?> " name="anhoActivoMG2_">

</form>
 <form action="evaluacion_ganadera_rcia_mon_gabinete.php" method="POST" autocomplete="off" name="form-evalganadrciaMG" id="form-evalganadrciaMG" enctype="multipart/form-data" >
<input id="idperiodoG" type="hidden" value="<?php echo $periodo;?>" name="idperiodoG">

 <?php
   /* $anho="0";
    $sql_anho = "select *
	from monitoreo.monitoreo m   where   m.idregistro = ".$_SESSION['idreg']." and anho=".$_POST['anhoActivoMG_']."  order by anho asc  limit 1"  ;
	$mon_anho= pg_query($cn,$sql_anho);
    while ($row_anho = pg_fetch_assoc($mon_anho)){
        $anho=$row_anho["anho"];
    }

    //if(isset($_POST['anhoActivoMG_']) && ($_POST['anhoActivoMG_']>0)){echo " <script> window.location.href='#tabs-3';   </script> ";}

*/
 // echo "aaa AnhoAct1:".$_POST['anhoActivoMG2_']."-anhoActivoMG2:".$_POST['anhoActivoMG_']." -idreg".$_SESSION['idreg']." - 1eranho:".$anho." con=".$sql_anho ;
 //echo "ENtrooo 222";
if(isset($_POST['anhoActivoMG_']) && ($_POST['anhoActivoMG_']>0)){echo " <script> window.location.href='#tabs-4';   </script>  ";}
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
                    <td align="center"  ><button     id="idbtnMG1" name ="idbtnMG1" <?php if(isset($_POST['anhoActivoMG2_']) && ($_POST['anhoActivoMG2_']=='Año 2014')){echo " style='cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px; ' "; }else{echo "style='color:#000000;  padding: 8px 11px; ' ";} ?> type="button" value="0"  onClick="javascript:cambiarAnhoGab(this);"  >Año 2014</button></td>
                    <td align="center"  ><button      id="idbtnMG2" name ="idbtnMG2" <?php if(isset($_POST['anhoActivoMG2_']) && ($_POST['anhoActivoMG2_']=='Año 2015')){echo " style='cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;' "; }else{echo "style='color:#000000;  padding: 8px 11px; ' ";} ?> type="button" value="0"  onClick="javascript:cambiarAnhoGab(this);" >Año 2015</button></td>
                    <td align="center"  ><button    id="idbtnMG3" name ="idbtnMG3" <?php if(isset($_POST['anhoActivoMG2_']) && ($_POST['anhoActivoMG2_']=='Año 2016')){echo " style='cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;' ";  }else{echo "style='color:#000000;  padding: 8px 11px;' ";} ?> type="button" value="0"  onClick="javascript:cambiarAnhoGab(this);" >Año 2016</button></td>
                    <td align="center"  ><button    id="idbtnMG4" name ="idbtnMG4" <?php if(isset($_POST['anhoActivoMG2_']) && ($_POST['anhoActivoMG2_']=='Año 2017')){echo " style='cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;' "; }else{echo "style='color:#000000;  padding: 8px 11px;' ";} ?> type="button" value="0"  onClick="javascript:cambiarAnhoGab(this);" >Año 2017</button></td>
                    <td align="center"  ><button     id="idbtnMG5" name ="idbtnMG5" <?php if(isset($_POST['anhoActivoMG2_']) && ($_POST['anhoActivoMG2_']=='Año 2018')){echo " style='cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;' "; }else{echo "style='color:#000000;  padding: 8px 11px;' ";} ?> type="button" value="0"  onClick="javascript:cambiarAnhoGab(this);" >Año 2018</button></td>
                    </tr>

                <?php
                }
                elseif ($periodo == 2)
                {
                ?>
                    <tr>
                    <td align="center"   ><button      id="idbtnMG1_" name="idbtnMG1_" <?php if(isset($_POST['anhoActivoMG2_']) && ($_POST['anhoActivoMG2_']=='Año 2016')){echo " style='cursor:pointer;color:#000000;  background-color: #7fc345; padding: 8px 11px;' "; }else{echo "style='color:#000000;  padding: 8px 11px;' ";} ?>  onClick="javascript:cambiarAnhoGab(this);" type="button" value="0">Año 2016</button></td>
                    <td align="center"   ><button      id="idbtnMG2_" name="idbtnMG2_" <?php if(isset($_POST['anhoActivoMG2_']) && ($_POST['anhoActivoMG2_']=='Año 2017')){echo " style='cursor:pointer;color:#000000;  background-color: #7fc345; padding: 8px 11px;' "; }else{echo "style='color:#000000;  padding: 8px 11px;' ";} ?>  onClick="javascript:cambiarAnhoGab(this);" type="button" value="0">Año 2017</button></td>
                    <td align="center"   ><button     id="idbtnMG3_" name="idbtnMG3_" <?php if(isset($_POST['anhoActivoMG2_']) && ($_POST['anhoActivoMG2_']=='Año 2018')){echo " style='cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;' "; }else{echo "style='color:#000000;  padding: 8px 11px;' ";} ?>   onClick="javascript:cambiarAnhoGab(this);"  type="button" value="0">Año 2018</button></td>
                    <td align="center"   ><button    id="idbtnMG4_" name="idbtnMG4_" <?php if(isset($_POST['anhoActivoMG2_']) && ($_POST['anhoActivoMG2_']=='Año 2019')){echo " style='cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;' "; }else{echo "style='color:#000000;  padding: 8px 11px;' ";} ?>  onClick="javascript:cambiarAnhoGab(this);" type="button" value="0">Año 2019</button></td>
                    <td align="center"   ><button     id="idbtnMG5_" name="idbtnMG5_"  <?php if(isset($_POST['anhoActivoMG2_']) && ($_POST['anhoActivoMG2_']=='Año 2020')){echo " style='cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;' "; }else{echo "style='color:#000000;  padding: 8px 11px;' ";} ?>    onClick="javascript:cambiarAnhoGab(this);" type="button" value="0">Año 2020</button></td>
                    </tr>
                <?php
                } ?>


			</table>

		</td>
	</tr>

	<tr><td colspan="4"><hr></td></tr>

  <?php
  $sql_andff="";
  if(isset($_POST['anhoActivoMG_']) && ($_POST['anhoActivoMG_']>0)){
      $sql_andff= " and anho=".$_POST['anhoActivoMG_']; }
  else{$sql_andff=" order by  anho asc  limit 1" ;  }

  //echo $sql_andff;

  $sql_monff= "select * from monitoreo.monitoreo where   tipo=268 and estado = 1 and idregistro = ".$_SESSION['idreg'].$sql_andff;
  $mon_sqlff = pg_query($cn,$sql_monff);
  $row_monitff = pg_fetch_array ($mon_sqlff);

//  echo $sql_monff;

  $fechainf = $row_monitff["fechainforme"];
  $numeroinf = $row_monitff["numeroinforme"];
   ?>



  <tr>
    <td>
        <table>
          <tr class="taulaA"  id='blau3'>
              <td align="right" id="blau3">NUMERO DE INFORME:</td>
              <td  id='blau3' >
                  <input id="correlativoinforme" name="correlativoinforme" type="text"
                   value="<?php echo $numeroinf;?>"/>
              </td>
          </tr>

          <tr class="taulaA"  id='blau3'>
                          <td align="right" id="blau3">FECHA INFORME:</td>
                          <td colspan="3"  align="left" id='blau3'>
                                          <input id="fechainforme" name="fechainforme" type="text"
                                          required="required" placeholder="" autofocus="" title=""
                                          value="<?php echo $fechainf;?>"/>

                          </td>
          </tr>

        </table>
      </td>
  </tr>



	<tr>
		<td height="14" colspan="4" id='blau'><span class="taulaH">Tabla de Valoración Ganadera RCIA</span></td>
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
                if(isset($_POST['anhoActivoMG_']) && ($_POST['anhoActivoMG_']>0)){
                    $sql_and2= " and anho=".$_POST['anhoActivoMG_']; }
                else{$sql_and2=" order by  anho asc  limit 1" ;  }

                $sql_mon1= "select idmonitoreo from monitoreo.monitoreo where   tipo=268 and estado = 1 and idregistro = ".$_SESSION['idreg'].$sql_and2;
                $mon_sql = pg_query($cn,$sql_mon1);
                $row_monit = pg_fetch_array ($mon_sql);
                $idmonitoreo2=$row_monit["idmonitoreo"];

                //echo "aaaaaxxx:".$idmonitoreo2."--";
                $sql_detEvaluacion = "select *
			    from monitoreo.valoracionalimentos va inner join   monitoreo.monitoreo  m on  va.idmonitoreo = m.idmonitoreo
			    where  va.tipo=71 and  m.tipo=268 and  m.idregistro = ".$_SESSION['idreg']." and m.idmonitoreo=".$idmonitoreo2." order by va.idtablavaloracion asc" ;
			    $rcia_detEvaluacion = pg_query($cn,$sql_detEvaluacion);
                //echo "conSULTAAAA=".$sql_detEvaluacion;


                if(isset($_POST['anhoActivoMG']) && ($_POST['anhoActivoMG']>0)){
                $sql_andG= " and anho=".$_POST['anhoActivoMG'];
               // $_SESSION['anhoActivoC']=$_POST['anhoActivoC'];
                }else{
                    $sql_andG=" order by anho asc  limit 1 " ;//$_SESSION['anhoActivoC']=0;
                 }

                $sql_anhoG="select * from monitoreo.monitoreo m   where  m.tipo=268 and  m.estado = 1 and  m.idregistro = ".$_SESSION['idreg'].$sql_andG;
                $mon_anhoG= pg_query($cn,$sql_anhoG);
                $row_anhoG = pg_fetch_assoc($mon_anhoG);
                $anhoG=0;
                $anhoG=$row_anho["anho"];

               $sql_cultivos_obsG = "select * from monitoreo.observacion  ob inner join   monitoreo.monitoreo m on m.idmonitoreo = ob.idmonitoreo where  m.tipo=268 and  m.idregistro= ".$_SESSION['idreg']." and m.idmonitoreo=".$idmonitoreo2." ;" ;
               // echo "ccssscfff=".$sql_cultivos_obsG;
		            $r_agricolaGG= pg_query($cn,$sql_cultivos_obsG);
                 $r_agricolaG=pg_fetch_assoc($r_agricolaGG);
                 
                 
                 $sql_planGabineteLineabase = "   select * from planproduccionganadera where idregistro = ".$_SESSION['idreg']." and anoprodganadera=0  ;" ;
                  //echo "ccssscfff=".$sql_planGabinete;
		            $r_planGabineteLbase= pg_query($cn,$sql_planGabineteLineabase);
                $rowganaderaLBase=pg_fetch_assoc($r_planGabineteLbase);
                $valorLbase=$rowganaderaLBase["suppastosembrado"];
                $valorLbaseG=$rowganaderaLBase["cantganado"]+$rowganaderaLBase["cantternero"];                
                
                $añoini=0;
                if ($periodo == 1)
                {
                    $añoini=1;
                }
                elseif ($periodo == 2)
                {
                    $añoini=3;
                }
                
                
                $valorLbaseSuma=0;
                        
                for ($j = $añoini; $j < $_POST['anhoActivoMG_']; $j++){
                   
                      $sql_planGabinete = "   select * from planproduccionganadera where idregistro = ".$_SESSION['idreg']." and anoprodganadera= ".$j."  ;" ;
                      $r_planGabinete= pg_query($cn,$sql_planGabinete);
                      $totalRGab= pg_num_rows($r_planGabinete);
                      if($totalRGab>0){
                          $rowganaderaS=pg_fetch_assoc($r_planGabinete);
                          $valorLbaseSuma=$valorLbaseSuma.$rowganaderaS["suppastosembrado"];
                          //echo "añoo=".$j."--valor=".$valorLbaseSuma."_";
                      }
                      
                }

                $sql_planGabinete = "   select * from planproduccionganadera where idregistro = ".$_SESSION['idreg']." and anoprodganadera= ".$_POST['anhoActivoMG_']."  ;" ;
                  //echo "ccssscfff=".$sql_planGabinete;
		            $r_planGabinete= pg_query($cn,$sql_planGabinete);
                $rowganadera=pg_fetch_assoc($r_planGabinete);
               // echo "añoo actuali=".$rowganadera["suppastosembrado"]; 


                $sql_detEvaluacionMG = " select * from monitoreo.evaluacion_mon_gabinete va inner join monitoreo.monitoreo m on va.idmonitoreo = m.idmonitoreo
			             where  m.idmonitoreo=".$idmonitoreo2." order by va.ideval_mon_gabiente asc" ;
			                $rcia_detEvaluacionMG = pg_query($cn,$sql_detEvaluacionMG);

                  //echo "respuestaaa=".$sql_detEvaluacion;
                $cuantg1_1=0;
                $alcanzadoMG1=0;
                $fuentesMG1="";

                $cuantg2_2=0;
                $alcanzadoMG2=0;
                $fuentesMG2="";

                $cuantg3_3=0;
                $alcanzadoMG3=0;
                $fuentesMG3="";

                $cuantg4_4=0;
                $alcanzadoMG4=0;
                $fuentesMG4="";

                $cuantg5_5=0;
                $alcanzadoMG5=0;
                $fuentesMG5="";

                $cuantg6_6=0;
                $alcanzadoMG6=0;
                $fuentesMG6="";

                $cuantg7_7=0;
                $alcanzadoMG7=0;
                $fuentesMG7="";

                if( $row_detallePtosMG= pg_fetch_array ($rcia_detEvaluacionMG)){
                    $cuantg1_1=$row_detallePtosMG["cuantificado"];
                    $alcanzadoMG1=$row_detallePtosMG["alcanzado"];
                    $fuentesMG1=$row_detallePtosMG["fuentes"];
                }

                if( $row_detallePtosMG= pg_fetch_array ($rcia_detEvaluacionMG)){
                    $cuantg2_2=$row_detallePtosMG["cuantificado"];
                    $alcanzadoMG2=$row_detallePtosMG["alcanzado"];
                    $fuentesMG2=$row_detallePtosMG["fuentes"];
                }
                if( $row_detallePtosMG= pg_fetch_array ($rcia_detEvaluacionMG)){
                    $cuantg3_3=$row_detallePtosMG["cuantificado"];
                    $alcanzadoMG3=$row_detallePtosMG["alcanzado"];
                    $fuentesMG3=$row_detallePtosMG["fuentes"];
                }

                if( $row_detallePtosMG= pg_fetch_array ($rcia_detEvaluacionMG)){
                    $cuantg4_4=$row_detallePtosMG["cuantificado"];
                    $alcanzadoMG4=$row_detallePtosMG["alcanzado"];
                    $fuentesMG4=$row_detallePtosMG["fuentes"];
                }

                if( $row_detallePtosMG= pg_fetch_array ($rcia_detEvaluacionMG)){
                    $cuantg5_5=$row_detallePtosMG["cuantificado"];
                    $alcanzadoMG5=$row_detallePtosMG["alcanzado"];
                    $fuentesMG5=$row_detallePtosMG["fuentes"];
                }

                if( $row_detallePtosMG= pg_fetch_array ($rcia_detEvaluacionMG)){
                    $cuantg6_6=$row_detallePtosMG["cuantificado"];
                    $alcanzadoMG6=$row_detallePtosMG["alcanzado"];
                    $fuentesMG6=$row_detallePtosMG["fuentes"];
                }

                if( $row_detallePtosMG= pg_fetch_array ($rcia_detEvaluacionMG)){
                    $cuantg7_7=$row_detallePtosMG["cuantificado"];
                    $alcanzadoMG7=$row_detallePtosMG["alcanzado"];
                    $fuentesMG7=$row_detallePtosMG["fuentes"];
                }



                $sql_imagen_mon = " select * from monitoreo.imagen_monitoreo m
                where  m.idmonitoreo=".$idmonitoreo2." ;" ;
                $rcia_imagen_mon = pg_query($cn,$sql_imagen_mon);

               $row_imagen_mon= pg_fetch_array ($rcia_imagen_mon);
               //echo "aaaaaa=".$row_imagen_mon["img_dir"];
             /*  $ip = $row_imagen_mon["img_dir"]; // some IP address
                $iparr = split ("\/", $ip);
                $cantidad=count($iparr);
                  print "$iparr[$cantidad] <br />";*/






            ?>
			<table class="tableizer-table">
				<thead>
				<tr class="tableizer-firstrow">
                                        <th rowspan = "2" > Nro </th>
					<th rowspan = "2" > Parámetros Monitoreados </th>
					<th rowspan = "2" > Comprometido </th>
                                        <th rowspan = "2" > Cuantificado </th>
                                        <th  colspan="2" >Porcentaje(%)</th>
                                        <th rowspan = "2" > Fuente Secundaria </th>
				</tr>

				<tr>
					   <th >Ref (%)</th>
                                        <th  >Alcanzado(%) </th>
				</tr>

				</thead>
			<tbody style="text-align:center;">
                            <tr><td  id="vmg1" name="vmg1" value="30" >1</td><td id="eemg1" name="ee1" >Pastos (ha).</td><td >  <input value="<?php  echo $rowganadera["suppastosembrado"]+$valorLbase+$valorLbaseSuma;    ?> " id="comg1" name="comg1" type="text" class="boxBusqueda4" style="text-align: center; "   >  </td><td id="cuantg1" name="cuantg1"  ><input name="cuantg1_1" id="cuantg1_1" type="text" class="boxBusqueda4" value="<?php  echo $cuantg1_1; ?> "   onKeyUp="extractNumber(this,4,false);sumarFormula1(this);"   > </td><td  id="veg1" name="veg1" >30</td> <td><input name="alcanzadoMG1" id="alcanzadoMG1" type="text" class="boxBusqueda4"     value="<?php  echo  $alcanzadoMG1;  ?>" onKeyUp="extractNumber(this,4,false);promediarMG(this,30);" onKeyPress="return blockNonNumbers(this, event, true, false); "  onblur="sumatoriaAlcanzado(); "  ></td>  <td> <input    name="fuentesMG1" id="fuentesMG1" type="text" class="boxBusqueda3" value="<?php  echo  $fuentesMG1;  ?>"     ></td>  </tr>
                            <tr> <td id="vmg2" name="vmg2"  >2</td> <td  id="ee2" name="eemg2" >Uso de alimentos suplementarios</td><td ><input value="<?php  echo "0";    ?> "  id="comg2" name="comg2"  type="text" class="boxBusqueda4" style="text-align: center; "   > </td><td id="cuantg2" name="cuantg2"  > <input value="<?php  echo $cuantg2_2;    ?> " name="cuantg2_2" id="cuantg2_2" type="text" class="boxBusqueda4"  onKeyUp="extractNumber(this,4,false);sumarFormula2(this);" > </td><td id="veg2" name="veg2"  rowspan = "3">10</td><td><input name="alcanzadoMG2" id="alcanzadoMG2" type="text" class="boxBusqueda4" value="<?php  echo $alcanzadoMG2 ?>"  onKeyUp="extractNumber(this,0,false); sumatoria_ganaderoMG2(this,10);" onKeyPress="return blockNonNumbers(this, event, true, false);sumatoriaAlcanzado(); " onblur="sumatoria_ganaderoMG2(this,10); "  onchange="sumatoriaAlcanzado(); "></td> <td><input name="fuentesMG2" id="fuentesMG2" type="text" class="boxBusqueda3" value="<?php   echo $fuentesMG2;  ?>" ></td> </tr>
                            <tr><td id="vmg2" name="vmg3"  >3</td> <td id="ee3" name="eemg3">Razas mejoradas</td> <td > <input value="<?php  echo  "0";    ?> " id="comg3" name="comg3" type="text" class="boxBusqueda4" style="text-align: center; "    > </td> <td id="cuant3" name="cuantg3"  > <input value="<?php  echo $cuantg3_3;    ?> " onKeyUp="extractNumber(this,4,false);sumarFormula3(this);" name="cuantg3_3" id="cuantg3_3" type="text" class="boxBusqueda4" > </td> <td><input name="alcanzadoMG3" id="alcanzadoMG3" type="text" class="boxBusqueda4" value="<?php  echo $alcanzadoMG3;  ?>" onKeyUp="extractNumber(this,0,false); sumatoria_ganaderoMG2(this,10);sumatoriaAlcanzado();" onKeyPress="return blockNonNumbers(this, event, true, false);" onblur="sumatoria_ganaderoMG2(this,10); "    ></td> <td><input name="fuentesMG3" id="fuentesMG3" type="text" class="boxBusqueda3" value="<?php  echo $fuentesMG3; ?>"     ></td> </tr>
                            <tr><td id="vmg4" name="vmg4"  >4</td> <td id="ee4" name="eemg4" >Ensilado de forrajes</td><td > <input value="<?php  echo $rowganadera["forraje"];    ?> "  id="comg4" name="comg4"  type="text" class="boxBusqueda4" style="text-align: center; "   ></td><td id="cuant4" name="cuantg4"  > <input     onKeyUp="extractNumber(this,4,false);sumarFormula4(this);" name="cuantg4_4" id="cuantg4_4" type="text" class="boxBusqueda4" value="<?php  echo $cuantg4_4; ?>"     > </td><td><input name="alcanzadoMG4" id="alcanzadoMG4" type="text" class="boxBusqueda4" value="<?php  echo $alcanzadoMG4;  ?>"  onKeyUp="extractNumber(this,0,false); sumatoria_ganaderoMG2(this,10);sumatoriaAlcanzado();" onKeyPress="return blockNonNumbers(this, event, true, false);" onblur="sumatoria_ganaderoMG2(this,10); "   ></td>  <td><input name="fuentesMG4" id="fuentesMG4" type="text" class="boxBusqueda3" value="<?php  echo $fuentesMG4;  ?>"     ></td>  </tr>
                            <tr><td id="vmg5" name="vmg5"  >5</td><td id="ee5" name="eemg5" >Potreros alambrados </td><td > <input value="<?php  echo $rowganadera["potrero"];    ?> "  id="comg5" name="comg5"  type="text" class="boxBusqueda4" style="text-align: center; "   >  </td><td id="cuant5" name="cuantg5"  > <input   onKeyUp="extractNumber(this,4,false);sumarFormula5(this);" value="<?php  echo $cuantg5_5;    ?> " name="cuantg5_5" id="cuantg5_5" type="text" class="boxBusqueda4" > </td><td id="veg3" name="veg3" rowspan = "2"  >20</td><td><input name="alcanzadoMG5" id="alcanzadoMG5"  type="text" class="boxBusqueda4"  value="<?php   echo $alcanzadoMG5;  ?>" onKeyUp="extractNumber(this,0,false);sumatoria_ganaderoMG3(this,20);sumatoriaAlcanzado();" onKeyPress="return blockNonNumbers(this, event, true, false);"  ></td> <td><input name="fuentesMG5" id="fuentesMG5" type="text" class="boxBusqueda3" value="<?php echo $fuentesMG5;  ?>"     ></td>  </tr>
                            <tr><td id="vmg6" name="vmg6"  >6</td><td id="ee6" name="eemg6" >Saleros</td><td >  <input value="<?php  echo $rowganadera["saleros"];    ?> "  id="comg6" name="comg6"  type="text" class="boxBusqueda4" style="text-align: center; "     > </td> <td><input  onKeyUp="extractNumber(this,4,false);sumarFormula6(this);"  name="cuantg6_6" id="cuantg6_6" type="text" class="boxBusqueda4" value="<?php echo $cuantg6_6;  ?>"     ></td> <td><input name="alcanzadoMG6" id="alcanzadoMG6" type="text" class="boxBusqueda4"  onKeyUp="extractNumber(this,0,false);sumatoria_ganaderoMG3(this,20);sumatoriaAlcanzado(); " value="<?php   echo $alcanzadoMG6; ?>"onKeyPress="return blockNonNumbers(this, event, true, false);sumatoria_ganaderoMG3(this,20); " onblur=""   ></td>  <td><input name="fuentesMG6" id="fuentesMG6" type="text" class="boxBusqueda3" value="<?php echo $fuentesMG6; ?>"     ></td> </tr>
                            <tr><td id="vmg7" name="vmg7"  >7</td><td id="ee7" name="eemg7" >Cabeza de ganado mayor </td><td  > <input value="<?php  echo $rowganadera["cantganado"]+$valorLbaseG;    ?> "  id="comg7" name="comg7"  type="text" class="boxBusqueda4" style="text-align: center; "   >  </td><td id="veg3" name="veg3" > <input  onKeyUp="extractNumber(this,4,false);sumarFormula7(this);" name="cuantg7_7" id="cuantg7_7" type="text" class="boxBusqueda4" value="<?php  echo $cuantg7_7; ?>"     ></td><td>40</td><td><input name="alcanzadoMG7" id="alcanzadoMG7"  type="text" class="boxBusqueda4"  onKeyUp="extractNumber(this,0,false); promediarMG(this,40);sumatoriaAlcanzado(); " value="<?php  echo $alcanzadoMG7;  ?>" onKeyPress="return blockNonNumbers(this, event, true, false); sumatoriaAlcanzado();"    ></td>   <td><input name="fuentesMG7" id="fuentesMG7" type="text" class="boxBusqueda3" value="<?php echo $fuentesMG7;   ?>"     ></td> </tr>
                            <tr><td id="vmg8" name="vmg8"  >8</td><td colspan = "3" aling="left" >TOTAL</td> <td id="totalref" name="totalref" >100</td> <td  name="puntuacionfinalMG" id="puntuacionfinalMG"  disabled type="text"   value="0"    > </td></tr>
			</tbody>

			</table>

		</td>
	</tr>




</table>


 <table width="90%" border="0" class='taulaA' align="center">
  <tr>
    <td width="11%"><span class="taulaH">Observaciones:</span></td>
	<td colspan="3" align="left" id='blau' ><textarea name="RObservacionesGanadero_gabinete" id="RObservacionesGanadero_gabinete" cols="110" rows="4" style="resize: none;" ><?php echo trim($r_agricolaG['obs']);?></textarea></td>

  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
 <tr align="center">
      <td colspan="7" align="center">
          <div style="text-align: center;" ><H2>Cargar Imagen.! </h2></DIV>
      </td>
  </tr>
  <tr align="center">
      <TD   colspan="7">
            <div   >
            <table class="CSSTable center"  style="width:60%">
           <form action="index.php" name="form" method="get">
           <input type="hidden" class="" name="action" value="nuevo">
           <tr>
             </strong></td>
             <td><strong>NOMBRE
             </strong></td>
             <td style="height: 35px;text-align: center; " align="center" >
             <a align="center" id="nuevoMG" href="javascript:;" class="boton verde formaBoton" >CARGAR</a>
             </td>
             </tr>
           </form>

           <tr  align="center">
             <td id="tabla_img_dir" width="15%"><?php if( isset($row_imagen_mon["img_dir"]) ){echo  trim($row_imagen_mon["img_dir"]) ;}else{echo "";} ?></td>
             <td width="5%" style=" text-align: center; ">
              <a TARGET="_blank" name="descargar"  id="descargar"  class="monitoreo"  <?php if( isset($row_imagen_mon["img_dir"]) ){ if(strlen(trim($row_imagen_mon["img_dir"]))>1 ){echo "href='".trim($row_imagen_mon["img_dir"])."'";}}else{echo "x";} ?>   ><image width="19"  src="../images/descargar.png"/></a>
              </td>
             </tr>
               <tr>

               </tr>
           </table>
            </div>
      </TD>
  </tr>
  <tr>
      <td style="height:10px;">
      </td>
  </tr>


</table>






        <table>

            <tr>
              <input id="guardarMon_Gabinete" class="boton verde formaBoton" type="submit" value="Guardar" name="guardarMon_Gabinete" >
            </tr>

            <tr>
                <a></a>
            </tr>


            <tr>
              <form action="evaluacion_ganadera_rcia_mon_gabinete.php" method="post" name="form" >
               <input id="anoact" type="hidden" value="<?php echo $_POST['anhoActivoMG_'];?>" name="anoact">
               <input id="reg" type="hidden" value="<?php echo $_SESSION['idreg'];?>" name="reg">
               <input id="monit" type="hidden" value="<?php echo $monit;?>" name="monit">
              </form>
            </tr>


            <tr>
              <form action="evaluacion_ganadera_rcia_mon_gabinete.php" method="post" name="form" >
               <input name='Imprimir' type='submit' class='boton verde formaBoton' id='Imprimir' value='Imprimir Informe'>
               <input id="reg" type="hidden" value="<?php echo $_SESSION['idreg'];?>" name="reg">
               <input id="monit" type="hidden" value="<?php echo $idmonitoreo2;?>" name="monit">
              </form>
            </tr>



        </table>





<input type="hidden" name="MM_insert" value="formevaluacionrcia" />
<input id="conteoC" type="hidden" value="<?php echo $ct;?>" name="conteoC">
<input id="anhoActivoMG" type="hidden" value="<?php if(isset($_POST['anhoActivoMG_']) && ($_POST['anhoActivoMG_']>0)){echo $_POST['anhoActivoMG_']; }else{echo "0";} ?> " name="anhoActivoMG">
<input id="anhoActivoMG2" type="hidden" value="<?php if(isset($_POST['anhoActivoMG2_']) ){echo $_POST['anhoActivoMG2_']; }else{echo "0";} ?> " name="anhoActivoMG2">
 <input id="imagen_dir" type="hidden" value="<?php if( isset($row_imagen_mon["img_dir"]) ){echo trim($row_imagen_mon["img_dir"]);}else{echo "0";} ?>"     name="imagen_dir">

<!--</form>-->
</form>

<div style="height:20px;" ></div>



</div>

<script language="javascript" type="text/javascript">

//sumatoria_ganaderoMG();  siiii estaba
$(function() {
    $("#fechainforme").datepicker({
        changeMonth: true,
        changeYear: true,
        maxDate: "+5y +1M +10D",
        dateFormat: "yy-mm-dd"
    });

});





function sumarFormula1(obj){
    suma1=0;
     if(obj.value>0 && obj.value<=  document.getElementById('comg1').value){
        if(document.getElementById('comg1').value==0){
          suma1=0;
         }else if(obj.value>document.getElementById('comg1').value){
             suma1=30;
         }else{
            suma1= obj.value/document.getElementById('comg1').value;
            suma1=suma1*(30);
        }
   }else{
       obj.value=document.getElementById('comg1').value;

   }
   document.getElementById('alcanzadoMG1').value=Math.round(suma1); //suma1.toFixed(2);

   sumatoriaAlcanzado();
}


function sumarFormula2(obj){
    suma1=0;
    if(obj.value>=0){
        if(obj.value==1){
          suma1=(3)*(1);
         }else{
            suma1=0;
        }
    }
   document.getElementById('alcanzadoMG2').value=suma1.toFixed(2);

   sumatoriaAlcanzado();
}


function sumarFormula3(obj){
    suma1=0;
    if(obj.value>=0){
        if(obj.value==1){
          suma1=(3)*(1);
         }else{
            suma1=0;
        }
   }
   document.getElementById('alcanzadoMG3').value=suma1.toFixed(2);

   sumatoriaAlcanzado();
}


function sumarFormula4(obj){
    suma1=0;
     if(obj.value>=0){
        if(obj.value==1){
          suma1=(3)*(1);
         }else{
            suma1=0;
        }
   }
   document.getElementById('alcanzadoMG4').value=suma1.toFixed(2);
   sumatoriaAlcanzado();
}

function sumarFormula5(obj){
    suma1=0;
     if(obj.value>=0){
        if(document.getElementById('comg5').value==0){
          suma1=0;
         }else if(obj.value>0){
             suma1= obj.value/document.getElementById('comg5').value *(5*2);
         }
   }
   document.getElementById('alcanzadoMG5').value=suma1.toFixed(2);

   sumatoriaAlcanzado();
}

function sumarFormula6(obj){
    suma1=0;
    if(obj.value>=0){
        if(document.getElementById('comg6').value==0){
          suma1=0;
         }else if(obj.value>0){
             suma1= obj.value/document.getElementById('comg6').value *(5*2);
         }
   }
   document.getElementById('alcanzadoMG6').value=suma1.toFixed(2);

   sumatoriaAlcanzado();
}


function sumarFormula7(obj){
    suma1=0;
     if(obj.value>=0){
        if(document.getElementById('comg7').value==0){
          suma1=0;
         }else if(obj.value>document.getElementById('comg7').value){
             suma1=40;
         }else{
            suma1= obj.value/document.getElementById('comg7').value;
            suma1=suma1*(40);
        }
   }
   document.getElementById('alcanzadoMG7').value=suma1.toFixed(2);
   sumatoriaAlcanzado();
}

function promediarMG(obj,param) {
  // alert('valor='+obj.value+'  - parametro='+param);
   if(obj.value>param){
      alert('El valor tiene que ser Menor o igual a '+param);
      obj.value=param;

   }
   else
   {

   }
sumatoria_ganaderoMG();
}



sumatoriaAlcanzado();

function numero(txt) {
    if (txt.value != '') {
    var b = /^[0-9\-]*$/;
    return b.test(txt);
    }
}


 function pestana_ganadero(){
     window.location.href="#tabs-4";
 }


function cambiarAnhoGab(obj){
   // alert('aa:'+obj.getAttribute('ID') );
     document.getElementById('anhoActivoMG').value=obj.value;
     document.getElementById('anhoActivoMG2').value=obj.innerHTML;
       document.getElementById('anhoActivoMG_').value=obj.value;
     document.getElementById('anhoActivoMG2_').value=obj.innerHTML;

    //alert(obj.innerHTML);
   // alert(document.getElementById('anhoActivoMG').value);
    document.getElementById("form-evalganadrciaMG2").submit();
}

function establecer_anosMG(){
      //  alert('entroo año1');

    window.scrollBy(0, -1000);
        if(document.getElementById("idbtnMG1")){
            butt1 = document.getElementById("idbtnMG1");
            butt1.disabled = true;
        }

       if(document.getElementById("idbtnMG1_")){
           butt11 = document.getElementById("idbtnMG1_");
           butt11.disabled = true;
        }
        if(document.getElementById("idbtnMG2")){
            but2 = document.getElementById("idbtnMG2");
            but2.disabled = true;
         }
        if(document.getElementById("idbtnMG2_")){
            but22 = document.getElementById("idbtnMG2_");
            but22.disabled = true;
            }

        if(document.getElementById("idbtnMG3")){
                but3 = document.getElementById("idbtnMG3");
                but3.disabled = true;
         }
        if(document.getElementById("idbtnMG3_")){
            but33 = document.getElementById("idbtnMG3_");
            but33.disabled = true;
        }

        if(document.getElementById("idbtnMG4")){
                but4 = document.getElementById("idbtnMG4");
                but4.disabled = true;
        }
        if(document.getElementById("idbtnMG4_")){
                but44 = document.getElementById("idbtnMG4_");
                but44.disabled = true;
        }

        if(document.getElementById("idbtnMG5")){
            but5 = document.getElementById("idbtnMG5");
            but5.disabled = true;
        }
        if(document.getElementById("idbtnMG5_")){
                but55 = document.getElementById("idbtnMG5_");
            but55.disabled = true;
        }

var idperiodoG=document.getElementById('idperiodoG').value;


        var parametros = {
            "tarea" : "establecerAnosG"
        };
        $.ajax({
                data:  parametros,
                url:   'evaluacion_ganadera_rcia_mon_gabinete_Ajax.php',
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

                       if((resultado1[i]==1 && idperiodoG==1) || (resultado1[i]==3 && idperiodoG==2)){
                             if(document.getElementById("idbtnMG1")){
                                butt1 = document.getElementById("idbtnMG1");
                                butt1.disabled = false;
                                if(i==0 && document.getElementById('anhoActivoMG').value==0)  {
                                    document.getElementById('idbtnMG1').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345;padding: 8px 11px; ');
                                    document.getElementById('anhoActivoMG').value=resultado1[i].trim();
                                    document.getElementById('anhoActivoMG_').value=resultado1[i].trim();
                                }
                                document.getElementById('idbtnMG1').value=resultado1[i].trim();
                                // document.getElementById('idbtnMG1').click();
                            }
                            if(document.getElementById("idbtnMG1_")){
                                butt11 = document.getElementById("idbtnMG1_");
                                butt11.disabled = false;
                                 if(i==0 && document.getElementById('anhoActivoMG').value==0 )  {
                                   document.getElementById('idbtnMG1_').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345; padding: 8px 11px; ');
                                   document.getElementById('anhoActivoMG').value=resultado1[i].trim();
                                   document.getElementById('anhoActivoMG_').value=resultado1[i].trim();
                                 }
                                 document.getElementById('idbtnMG1_').value=resultado1[i].trim();
                                // document.getElementById('idbtnMG1_').click();
                            }
                        }
                      if((resultado1[i]==2 && idperiodoG==1) || (resultado1[i]==4 && idperiodoG==2)){
                             if(document.getElementById("idbtnMG2")){
                                but2 = document.getElementById("idbtnMG2");
                                but2.disabled = false;
                                if(i==0 && document.getElementById('anhoActivoMG').value==0 )  {
                                    document.getElementById('idbtnMG2').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345; padding: 8px 11px;');
                                    document.getElementById('anhoActivoMG').value=resultado1[i].trim();
                                    document.getElementById('anhoActivoMG_').value=resultado1[i].trim();
                                }
                                document.getElementById('idbtnMG2').value=resultado1[i].trim();
                             }
                            if(document.getElementById("idbtnMG2_")){
                                but22 = document.getElementById("idbtnMG2_");
                                but22.disabled = false;
                                if(i==0 && document.getElementById('anhoActivoMG').value==0 )  {
                                   document.getElementById('idbtnMG2_').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345; padding: 8px 11px;');
                                   document.getElementById('anhoActivoMG').value=resultado1[i].trim();
                                   document.getElementById('anhoActivoMG_').value=resultado1[i].trim();
                                 }
                                 document.getElementById('idbtnMG2_').value=resultado1[i].trim();
                             }

                        }
                   if((resultado1[i]==3 && idperiodoG==1) || (resultado1[i]==5 && idperiodoG==2)){
                             if(document.getElementById("idbtnMG3")){
                                 but3 = document.getElementById("idbtnMG3");
                                 but3.disabled = false;
                                   if(i==0 && document.getElementById('anhoActivoMG').value==0 )  {
                                    document.getElementById('idbtnMG3').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345; padding: 8px 11px;');
                                    document.getElementById('anhoActivoMG').value=resultado1[i].trim();
                                    document.getElementById('anhoActivoMG_').value=resultado1[i].trim();
                                 }
                                  document.getElementById('idbtnMG3').value=resultado1[i].trim();
                            }
                            if(document.getElementById("idbtnMG3_")){
                                but33 = document.getElementById("idbtnMG3_");
                                but33.disabled = false;

                                 if(i==0 && document.getElementById('anhoActivoMG').value==0 )  {
                                   document.getElementById('idbtnMG3_').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345;padding: 8px 11px; ');
                                   document.getElementById('anhoActivoMG').value=resultado1[i].trim();
                                   document.getElementById('anhoActivoMG_').value=resultado1[i].trim();
                                 }
                                 document.getElementById('idbtnMG3_').value=resultado1[i].trim();
                            }
                        }

                      if((resultado1[i]==4 && idperiodoG==1) || (resultado1[i]==6 && idperiodoG==2)){
                            if(document.getElementById("idbtnMG4")){
                                  but4 = document.getElementById("idbtnMG4");
                                  but4.disabled = false;
                                   if(i==0 && document.getElementById('anhoActivoMG').value==0)  {
                                    document.getElementById('idbtnMG4').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345;padding: 8px 11px;');
                                    document.getElementById('anhoActivoMG').value=resultado1[i].trim();
                                    document.getElementById('anhoActivoMG_').value=resultado1[i].trim();
                                 }
                                 document.getElementById('idbtnMG4').value=resultado1[i].trim();
                            }
                            if(document.getElementById("idbtnMG4_")){
                                 but44 = document.getElementById("idbtnMG4_");
                                 but44.disabled = false;
                                  if(i==0 && document.getElementById('anhoActivoMG').value==0)  {
                                   document.getElementById('idbtnMG4_').setAttribute('style', 'cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;');
                                   document.getElementById('anhoActivoMG').value=resultado1[i].trim();
                                   document.getElementById('anhoActivoMG_').value=resultado1[i].trim();
                                 }
                                 document.getElementById('idbtnMG4_').value=resultado1[i];
                            }
                        }
                      if((resultado1[i]==5 && idperiodoG==1) || (resultado1[i]==7 && idperiodoG==2)){
                            if(document.getElementById("idbtnMG5")){
                               but5 = document.getElementById("idbtnMG5");
                              but5.disabled = false;
                               if(i==0 && document.getElementById('anhoActivoMG').value==0 )  {
                                    document.getElementById('idbtnMG5').setAttribute('style', 'cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;');
                                    document.getElementById('anhoActivoMG').value=resultado1[i].trim();
                                    document.getElementById('anhoActivoMG_').value=resultado1[i].trim();
                                 }
                                document.getElementById('idbtnMG5').value=resultado1[i].trim();
                            }
                            if(document.getElementById("idbtnMG5_")){
                                 but55 = document.getElementById("idbtnMG5_");
                                but55.disabled = false;
                                 if(i==0 && document.getElementById('anhoActivoMG').value==0)  {
                                   document.getElementById('idbtnMG5_').setAttribute('style', 'cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;');
                                   document.getElementById('anhoActivoMG').value=resultado1[i].trim();
                                   document.getElementById('anhoActivoMG_').value=resultado1[i].trim();
                                 }
                                 document.getElementById('idbtnMG5_').value=resultado1[i].trim();
                            }


                        }


                    }


                }
        });
       //alert('entroo año2');

}

establecer_anosMG();




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


function onclick_agregarDetalle12() {
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
            input3.setAttribute('class', 'CSSTextArea');
            input3.setAttribute('cols', '40');
            input3.setAttribute('rows', '4');
           input3.setAttribute('style', 'width: 99%;');
            td3.setAttribute('width', '30%');
            input3.setAttribute('id', 'txtdetalle12-'+contadorC);
            td3.appendChild(input3);

            td4 = document.createElement('td');
            input4 = document.createElement('input');
            input4.setAttribute('name', 'txtmonto_cantidad12-'+contadorC);
            input4.setAttribute('class', 'boxBusqueda');
           input4.setAttribute('style', 'width: 99%;');
             td4.setAttribute('width', '18%');
            input4.setAttribute('id', 'txtmonto_cantidad12-'+contadorC);
            td4.appendChild(input4);

            td5 = document.createElement('td');
            input5 = document.createElement('textarea');
            input5.setAttribute('name', 'txtobs12-'+contadorC);
            input5.setAttribute('class', 'CSSTextArea');
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
    deleteRowRcia('segui12');

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


function sumatoria_ganaderoMG2(obj,param){

     a=0;
     b=0;
     c=0;
     /*if(document.getElementById('alcanzadoMG2').value.length>0){
       a=parseInt(document.getElementById('alcanzadoMG2').value);
     }
     if(document.getElementById('alcanzadoMG3').value.length>0){
       b=parseInt(document.getElementById('alcanzadoMG3').value);
     }
     if(document.getElementById('alcanzadoMG4').value.length>0){
       c=parseInt(document.getElementById('alcanzadoMG4').value);
     }

     if((a+b+c)>param){
       obj.value=0; //0;0;
       alert('La sumatoria de los 3 campos tiene que ser Menor o igual a '+param);
    }else{


        }

    suma=0;


    document.getElementById('puntuacionfinalMG').value=suma;*/

   // alert(suma ); onchange   onblur

}

function sumatoria_ganaderoMG3(obj,param){

     a=0;
     b=0;

    /* if(document.getElementById('alcanzadoMG5').value.length>0){
       a=parseInt(document.getElementById('alcanzadoMG5').value);
     }
     if(document.getElementById('alcanzadoMG6').value.length>0){
       b=parseInt(document.getElementById('alcanzadoMG6').value);
     }


     if((a+b )>param){
       obj.value=0; //0;0;
       alert('La sumatoria de los 2 campos tiene que ser Menor o igual a '+param);
    }else{


        }

    suma=0;


    document.getElementById('puntuacionfinalMG').value=suma;*/

   // alert(suma ); onchange   onblur

}




function sumatoria_ganaderoMG(){
    suma=0;

   /* if(document.getElementById('suppastoscultivadosG').value.length>0){
       suma=suma+parseInt(document.getElementById('suppastoscultivadosG').value);
    }
    if(document.getElementById('alimentosupleG').value.length>0){
       suma=suma+parseInt(document.getElementById('alimentosupleG').value);
    }
     if(document.getElementById('razasmejoradasMG').value.length>0){
       suma=suma+parseInt(document.getElementById('razasmejoradasMG').value);
    }
     if(document.getElementById('enlisadosforrajeMG').value.length>0){
       suma=suma+parseInt(document.getElementById('enlisadosforrajeMG').value);
    }
     if(document.getElementById('potrerosalamMG').value.length>0){
       suma=suma+parseInt(document.getElementById('potrerosalamMG').value);
    }
     if(document.getElementById('atajadosMG').value.length>0){
       suma=suma+parseInt(document.getElementById('atajadosMG').value);
    }
      if(document.getElementById('corralG').value.length>0){
       suma=suma+parseInt(document.getElementById('corralG').value);
    }

    if(document.getElementById('certificadosenasagG').value.length>0){
       suma=suma+parseInt(document.getElementById('certificadosenasagG').value);
    }*/


   // document.getElementById('puntuacionfinalMG').value=suma;

   // alert(suma ); onchange   onblur

}
 window.scrollBy(0, -1000);
//function subir(){
    //alert('jj');
   // window.scrollBy(0, -1000);
//}

function recargar_anosMG2(){

   // alert('aaaa');
     var idperiodoG=document.getElementById('idperiodoG').value;
        var parametros = {
            "tarea" : "establecerAnosG"
        };
        $.ajax({
                data:  parametros,
                url:   'evaluacion_ganadera_rcia_mon_gabinete_Ajax.php',
                type:  'post',
                beforeSend: function () {
                      //  $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response1) {
                    //alert(response1);
                     response1 = response1.substring(0, response1.length - 1);
                    resultado1=response1.split("|");
                   // alert(resultado1);
                    ii=0;
                    for(i=0; i<resultado1.length;i++){
                        // alert(resultado1[i]);

                        if((resultado1[i]==1 && idperiodoG==1) || (resultado1[i]==3 && idperiodoG==2)){
                             if(document.getElementById("idbtnMG1")){
                                butt1 = document.getElementById("idbtnMG1");
                                butt1.disabled = false;
                                if(i==0 && document.getElementById('anhoActivoMG').value==0)  {
                                    document.getElementById('idbtnMG1').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345;padding: 8px 11px; ');
                                    document.getElementById('anhoActivoMG').value=resultado1[i];
                                    document.getElementById('anhoActivoMG_').value=resultado1[i];

                                }
                                document.getElementById('idbtnMG1').value=resultado1[i];
                                if(ii==0){
                                     document.getElementById('idbtnMG1').click();
                                   //  alert('idbtnMG1');
                                }
                                ii++;
                            }
                            if(document.getElementById("idbtnMG1_")){
                                butt11 = document.getElementById("idbtnMG1_");
                                butt11.disabled = false;
                                 if(i==0 && document.getElementById('anhoActivoMG').value==0 )  {
                                   document.getElementById('idbtnMG1_').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345; padding: 8px 11px; ');
                                   document.getElementById('anhoActivoMG').value=resultado1[i];
                                   document.getElementById('anhoActivoMG_').value=resultado1[i];

                                 }
                                 document.getElementById('idbtnMG1_').value=resultado1[i];
                                  if(ii==0){
                                   document.getElementById('idbtnMG1_').click();
                                  // alert('idbtnMG1_');
                                }
                                ii++;
                            }
                        }
                      if((resultado1[i]==2 && idperiodoG==1) || (resultado1[i]==4 && idperiodoG==2)){
                             if(document.getElementById("idbtnMG2")){
                                but2 = document.getElementById("idbtnMG2");
                                but2.disabled = false;
                                if(i==0 && document.getElementById('anhoActivoMG').value==0 )  {
                                    document.getElementById('idbtnMG2').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345; padding: 8px 11px;');
                                    document.getElementById('anhoActivoMG').value=resultado1[i];
                                    document.getElementById('anhoActivoMG_').value=resultado1[i];

                                }
                                document.getElementById('idbtnMG2').value=resultado1[i];
                                 if(ii==0){
                                    // alert('idbtnMG2');
                                    document.getElementById('idbtnMG2').click();
                                 }
                                ii++;
                             }
                            if(document.getElementById("idbtnMG2_")){
                                but22 = document.getElementById("idbtnMG2_");
                                but22.disabled = false;
                                if(i==0 && document.getElementById('anhoActivoMG').value==0 )  {
                                   document.getElementById('idbtnMG2_').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345; padding: 8px 11px;');
                                   document.getElementById('anhoActivoMG').value=resultado1[i];
                                   document.getElementById('anhoActivoMG_').value=resultado1[i];

                                 }
                                 document.getElementById('idbtnMG2_').value=resultado1[i];
                                  if(ii==0){
                                      // alert('idbtnMG2_');
                                      document.getElementById('idbtnMG2_').click();
                                 }
                                ii++;
                             }

                        }
                       if((resultado1[i]==3 && idperiodoG==1) || (resultado1[i]==5 && idperiodoG==2)){
                             if(document.getElementById("idbtnMG3")){
                                 but3 = document.getElementById("idbtnMG3");
                                 but3.disabled = false;
                                   if(i==0 && document.getElementById('anhoActivoMG').value==0 )  {
                                    document.getElementById('idbtnMG3').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345; padding: 8px 11px;');
                                    document.getElementById('anhoActivoMG').value=resultado1[i];
                                    document.getElementById('anhoActivoMG_').value=resultado1[i];

                                 }
                                  document.getElementById('idbtnMG3').value=resultado1[i];
                                   if(ii==0){
                                     // alert('idbtnMG3');
                                       document.getElementById('idbtnMG3').click();
                                     }
                                ii++;
                            }
                            if(document.getElementById("idbtnMG3_")){
                                but33 = document.getElementById("idbtnMG3_");
                                but33.disabled = false;

                                 if(i==0 && document.getElementById('anhoActivoMG').value==0 )  {
                                   document.getElementById('idbtnMG3_').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345;padding: 8px 11px; ');
                                   document.getElementById('anhoActivoMG').value=resultado1[i];
                                   document.getElementById('anhoActivoMG_').value=resultado1[i];

                                 }
                                 document.getElementById('idbtnMG3_').value=resultado1[i];
                                 if(ii==0){
                                    // alert('idbtnMG3_');
                                      document.getElementById('idbtnMG3_').click();
                                   }
                                ii++;
                            }
                        }

                       if((resultado1[i]==4 && idperiodoG==1) || (resultado1[i]==6 && idperiodoG==2)){
                            if(document.getElementById("idbtnMG4")){
                                  but4 = document.getElementById("idbtnMG4");
                                  but4.disabled = false;
                                   if(i==0 && document.getElementById('anhoActivoMG').value==0)  {
                                    document.getElementById('idbtnMG4').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345;padding: 8px 11px;');
                                    document.getElementById('anhoActivoMG').value=resultado1[i];
                                    document.getElementById('anhoActivoMG_').value=resultado1[i];

                                 }
                                 document.getElementById('idbtnMG4').value=resultado1[i];
                                 if(ii==0){
                                    // alert('idbtnMG4');
                                     document.getElementById('idbtnMG4').click();
                                 }
                                ii++;
                            }
                            if(document.getElementById("idbtnMG4_")){
                                 but44 = document.getElementById("idbtnMG4_");
                                 but44.disabled = false;
                                  if(i==0 && document.getElementById('anhoActivoMG').value==0)  {
                                   document.getElementById('idbtnMG4_').setAttribute('style', 'cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;');
                                   document.getElementById('anhoActivoMG').value=resultado1[i];
                                   document.getElementById('anhoActivoMG_').value=resultado1[i];

                                 }
                                 document.getElementById('idbtnMG4_').value=resultado1[i];
                                 if(ii==0){
                                  // alert('idbtnMG4_');
                                    document.getElementById('idbtnMG4_').click();
                                  }
                                ii++;
                            }
                        }
                       if((resultado1[i]==5 && idperiodoG==1) || (resultado1[i]==7 && idperiodoG==2)){
                            if(document.getElementById("idbtnMG5")){
                               but5 = document.getElementById("idbtnMG5");
                              but5.disabled = false;
                               if(i==0 && document.getElementById('anhoActivoMG').value==0 )  {
                                    document.getElementById('idbtnMG5').setAttribute('style', 'cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;');
                                    document.getElementById('anhoActivoMG').value=resultado1[i];
                                    document.getElementById('anhoActivoMG_').value=resultado1[i];

                                 }
                                document.getElementById('idbtnMG5').value=resultado1[i];
                                 if(ii==0){
                                  // alert('idbtnMG5');
                                    document.getElementById('idbtnMG5').click();
                                  }
                                ii++;
                            }
                            if(document.getElementById("idbtnMG5_")){
                                 but55 = document.getElementById("idbtnMG5_");
                                but55.disabled = false;
                                 if(i==0 && document.getElementById('anhoActivoMG').value==0)  {
                                   document.getElementById('idbtnMG5_').setAttribute('style', 'cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;');
                                   document.getElementById('anhoActivoMG').value=resultado1[i];
                                   document.getElementById('anhoActivoMG_').value=resultado1[i];

                                 }
                                 document.getElementById('idbtnMG5_').value=resultado1[i];
                                 if(ii==0){
                                   // alert('idbtnMG5_');
                                   document.getElementById('idbtnMG5_').click();
                                   }
                                ii++;
                            }


                        }


                    }




                }
      });
}

 function recargar_anosMG(){

    var idperiodoG=document.getElementById('idperiodoG').value;
        var parametros = {
            "tarea" : "establecerAnosG"
        };
        $.ajax({
                data:  parametros,
                url:   'evaluacion_ganadera_rcia_mon_gabinete_Ajax.php',
                type:  'post',
                beforeSend: function () {
                      //  $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response1) {
                    alert('resp:'+response1);
                    response1 = response1.substring(0, response1.length - 1);
                    resultado1=response1.split("|");
                    ii=0;
                    for(i=0; i<resultado1.length;i++){
                        // alert(resultado1[i]);

                        if((resultado1[i]==1 && idperiodoG==1) || (resultado1[i]==3 && idperiodoG==2)){
                             if(document.getElementById("idbtnMG1")){
                                butt1 = document.getElementById("idbtnMG1");
                                butt1.disabled = false;
                                if(i==0 && document.getElementById('anhoActivoMG').value==0)  {
                                    document.getElementById('idbtnMG1').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345;padding: 8px 11px; ');
                                    document.getElementById('anhoActivoMG').value=resultado1[i];
                                    document.getElementById('anhoActivoMG_').value=resultado1[i];

                                }
                                document.getElementById('idbtnMG1').value=resultado1[i];
                                if(ii==0){
                                   // document.getElementById('idbtnMG1').click();
                                     alert('idbtnMG1');
                                }
                                ii++;
                            }
                            if(document.getElementById("idbtnMG1_")){
                                butt11 = document.getElementById("idbtnMG1_");
                                butt11.disabled = false;
                                 if(i==0 && document.getElementById('anhoActivoMG').value==0 )  {
                                   document.getElementById('idbtnMG1_').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345; padding: 8px 11px; ');
                                   document.getElementById('anhoActivoMG').value=resultado1[i];
                                   document.getElementById('anhoActivoMG_').value=resultado1[i];

                                 }
                                 document.getElementById('idbtnMG1_').value=resultado1[i];
                                  if(ii==0){
                                 // document.getElementById('idbtnMG1_').click();
                                   alert('idbtnMG1_');
                                }
                                ii++;
                            }
                        }
                      if((resultado1[i]==2 && idperiodoG==1) || (resultado1[i]==4 && idperiodoG==2)){
                             if(document.getElementById("idbtnMG2")){
                                but2 = document.getElementById("idbtnMG2");
                                but2.disabled = false;
                                if(i==0 && document.getElementById('anhoActivoMG').value==0 )  {
                                    document.getElementById('idbtnMG2').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345; padding: 8px 11px;');
                                    document.getElementById('anhoActivoMG').value=resultado1[i];
                                    document.getElementById('anhoActivoMG_').value=resultado1[i];

                                }
                                document.getElementById('idbtnMG2').value=resultado1[i];
                                 if(ii==0){
                                     alert('idbtnMG2');
                                 //  document.getElementById('idbtnMG2').click();
                                 }
                                ii++;
                             }
                            if(document.getElementById("idbtnMG2_")){
                                but22 = document.getElementById("idbtnMG2_");
                                but22.disabled = false;
                                if(i==0 && document.getElementById('anhoActivoMG').value==0 )  {
                                   document.getElementById('idbtnMG2_').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345; padding: 8px 11px;');
                                   document.getElementById('anhoActivoMG').value=resultado1[i];
                                   document.getElementById('anhoActivoMG_').value=resultado1[i];

                                 }
                                 document.getElementById('idbtnMG2_').value=resultado1[i];
                                  if(ii==0){
                                       alert('idbtnMG2_');
                                      //document.getElementById('idbtnMG2_').click();
                                 }
                                ii++;
                             }

                        }
                       if((resultado1[i]==3 && idperiodoG==1) || (resultado1[i]==5 && idperiodoG==2)){
                             if(document.getElementById("idbtnMG3")){
                                 but3 = document.getElementById("idbtnMG3");
                                 but3.disabled = false;
                                   if(i==0 && document.getElementById('anhoActivoMG').value==0 )  {
                                    document.getElementById('idbtnMG3').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345; padding: 8px 11px;');
                                    document.getElementById('anhoActivoMG').value=resultado1[i];
                                    document.getElementById('anhoActivoMG_').value=resultado1[i];

                                 }
                                  document.getElementById('idbtnMG3').value=resultado1[i];
                                   if(ii==0){
                                      alert('idbtnMG3');
                                      // document.getElementById('idbtnMG3').click();
                                     }
                                ii++;
                            }
                            if(document.getElementById("idbtnMG3_")){
                                but33 = document.getElementById("idbtnMG3_");
                                but33.disabled = false;

                                 if(i==0 && document.getElementById('anhoActivoMG').value==0 )  {
                                   document.getElementById('idbtnMG3_').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345;padding: 8px 11px; ');
                                   document.getElementById('anhoActivoMG').value=resultado1[i];
                                   document.getElementById('anhoActivoMG_').value=resultado1[i];

                                 }
                                 document.getElementById('idbtnMG3_').value=resultado1[i];
                                 if(ii==0){
                                     alert('idbtnMG3_');
                                   //  document.getElementById('idbtnMG3_').click();
                                   }
                                ii++;
                            }
                        }

                       if((resultado1[i]==4 && idperiodoG==1) || (resultado1[i]==6 && idperiodoG==2)){
                            if(document.getElementById("idbtnMG4")){
                                  but4 = document.getElementById("idbtnMG4");
                                  but4.disabled = false;
                                   if(i==0 && document.getElementById('anhoActivoMG').value==0)  {
                                    document.getElementById('idbtnMG4').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345;padding: 8px 11px;');
                                    document.getElementById('anhoActivoMG').value=resultado1[i];
                                    document.getElementById('anhoActivoMG_').value=resultado1[i];

                                 }
                                 document.getElementById('idbtnMG4').value=resultado1[i];
                                 if(ii==0){
                                     alert('idbtnMG4');
                                    //document.getElementById('idbtnMG4').click();
                                 }
                                ii++;
                            }
                            if(document.getElementById("idbtnMG4_")){
                                 but44 = document.getElementById("idbtnMG4_");
                                 but44.disabled = false;
                                  if(i==0 && document.getElementById('anhoActivoMG').value==0)  {
                                   document.getElementById('idbtnMG4_').setAttribute('style', 'cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;');
                                   document.getElementById('anhoActivoMG').value=resultado1[i];
                                   document.getElementById('anhoActivoMG_').value=resultado1[i];

                                 }
                                 document.getElementById('idbtnMG4_').value=resultado1[i];
                                 if(ii==0){
                                   alert('idbtnMG4_');
                                  // document.getElementById('idbtnMG4_').click();
                                  }
                                ii++;
                            }
                        }
                       if((resultado1[i]==5 && idperiodoG==1) || (resultado1[i]==7 && idperiodoG==2)){
                            if(document.getElementById("idbtnMG5")){
                               but5 = document.getElementById("idbtnMG5");
                              but5.disabled = false;
                               if(i==0 && document.getElementById('anhoActivoMG').value==0 )  {
                                    document.getElementById('idbtnMG5').setAttribute('style', 'cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;');
                                    document.getElementById('anhoActivoMG').value=resultado1[i];
                                    document.getElementById('anhoActivoMG_').value=resultado1[i];

                                 }
                                document.getElementById('idbtnMG5').value=resultado1[i];
                                 if(ii==0){
                                   alert('idbtnMG5');
                                  // document.getElementById('idbtnMG5').click();
                                  }
                                ii++;
                            }
                            if(document.getElementById("idbtnMG5_")){
                                 but55 = document.getElementById("idbtnMG5_");
                                but55.disabled = false;
                                 if(i==0 && document.getElementById('anhoActivoMG').value==0)  {
                                   document.getElementById('idbtnMG5_').setAttribute('style', 'cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;');
                                   document.getElementById('anhoActivoMG').value=resultado1[i];
                                   document.getElementById('anhoActivoMG_').value=resultado1[i];

                                 }
                                 document.getElementById('idbtnMG5_').value=resultado1[i];
                                 if(ii==0){
                                    alert('idbtnMG5_');
                                   // document.getElementById('idbtnMG5_').click();
                                   }
                                ii++;
                            }


                        }


                    }


                }
        });
       //alert('entroo año2');

}



function sumatoriaAlcanzado(){
    suma=0;

      if(document.getElementById('alcanzadoMG1').value.length>0){
       suma=suma+parseFloat(document.getElementById('alcanzadoMG1').value);
    }
    if(document.getElementById('alcanzadoMG2').value.length>0){
       suma=suma+parseFloat(document.getElementById('alcanzadoMG2').value);
    }
     if(document.getElementById('alcanzadoMG3').value.length>0){
       suma=suma+parseFloat(document.getElementById('alcanzadoMG3').value);
    }
     if(document.getElementById('alcanzadoMG4').value.length>0){
       suma=suma+parseFloat(document.getElementById('alcanzadoMG4').value);
    }
     if(document.getElementById('alcanzadoMG5').value.length>0){
       suma=suma+parseFloat(document.getElementById('alcanzadoMG5').value);
    }
     if(document.getElementById('alcanzadoMG6').value.length>0){
       suma=suma+parseFloat(document.getElementById('alcanzadoMG6').value);
    }
      if(document.getElementById('alcanzadoMG7').value.length>0){
       suma=suma+parseFloat(document.getElementById('alcanzadoMG7').value);
    }



    document.getElementById('puntuacionfinalMG').innerHTML=Math.round(suma); //suma.toFixed(2); ;


}



</script>



    <script type="text/javascript">


$(document).ready(function(){ <!-- --------> ejecuta el script jquery cuando el documento ha terminado de cargarse -->

    $("#nuevoMG").click(function() { <!-- ------> al pulsar (.click) el boton 1 (#b1) -->
                        // recorremos todos los valores...
              var   aCustomers=""  ;
              //alert("cliccc");
        //  var idreg=$(this).attr("idreg");
        //  var  causal=$(this).attr("causal");
        //     var actividad=$(this).attr("actividad");
        // a=$(this).parent().parent();
        //     $("#codigo").val(codigoparcela);
        //     $("#nombre").val(nombrepredio);
        //     $("#actividad").val(actividad);
        //     $("#33").val("");
        //     $("#anho").val("");
        // alert(codigoparcela);    alert(nombrepredio);   alert(actividad);    alert(idreg);

        $("#dialogo2").dialog({ <!--  ------> muestra la ventana  -->
            width: 600,  <!-- -------------> ancho de la ventana -->
            height: 350,<!--  -------------> altura de la ventana -->
            show: "scale", <!-- -----------> animación de la ventana al aparecer -->
            hide: "scale", <!-- -----------> animación al cerrar la ventana -->
            resizable: "false", <!-- ------> fija o redimensionable si ponemos este valor a "true" -->
            position: "top",<!--  ------> posicion de la ventana en la pantalla (left, top, right...) -->
            modal: "true", <!-- ------------> si esta en true bloquea el contenido de la web mientras la ventana esta activa (muy elegante) -->
        opacity: 0.9,
         closeOnEscape: false,
          open: function(event, ui) { $(".ui-dialog-titlebar-close").hide(); },
        buttons: {
"Cerrar": function () {
$(this).dialog("close");
//location.href="index.php?action=editar&id="+$('#ct_id').val();
   // alert("editar cargar tabla=");
}
}
        });

    });
    $("#b1").click(function() { <!-- ------> al pulsar (.click) el boton 1 (#b1) -->
        $("#dialogo").dialog({ <!--  ------> muestra la ventana  -->
            width: 300,  <!-- -------------> ancho de la ventana -->
            height: 300,<!--  -------------> altura de la ventana -->
            show: "scale", <!-- -----------> animación de la ventana al aparecer -->
            hide: "scale", <!-- -----------> animación al cerrar la ventana -->
            resizable: "false", <!-- ------> fija o redimensionable si ponemos este valor a "true" -->
            position: "top",<!--  ------> posicion de la ventana en la pantalla (left, top, right...) -->
            modal: "true" <!-- ------------> si esta en true bloquea el contenido de la web mientras la ventana esta activa (muy elegante) -->
        });

    });
$("#b2").click(function() {
    $("#dialogo2").dialog({
            width: 300,
            height: 280,
            show: "scale",
            hide: "scale",
            resizable: "false",
            position: "center"
        });
    });
$("#b3").click(function() {
        $("#dialogo3").dialog({
            width: 300,
            height: 370,
            show: "blind",
            hide: "shake",
            resizable: "false",
            position: "center"
        });
    });
});


    </script>


<div id="dialogo" class="ventana" title="Dialogo Modal">
        </div>

        <div id="dialogo2" class="ventana" title=""   style="height:180px;" >

         <form   action="index.php" method="POST" name="login" id="form" >

                <div id="data" align="center">
                <div class="col plomo" style="height:200px;" >
                <div align="center" ><strong>CARGAR IMAGENES</strong></div>
                    <div class="left-content" >


                        <div class="line" ></div>
                    <div class="left" >

                   Seleccionar Documento:

<div id="mulitplefileuploader">Subir</div>

<div id="status"></div>
<script>
$(document).ready(function()
{

var settings = {
    url: "upload.php",
    dragDrop:true,
    multiple:false,
    fileName: "myfile",
    allowedTypes:"jpg,png,gif",
    returnType:"json",
     doneStr:"Cargado !",
  extErrorStr:"Solo puedes realizar carga de Imagenes! ",
  uploadErrorStr:"Ocurrio un error al carga. Intentelo de nuevo!",

     onSuccess:function(files,data,xhr)
    {
                 var idreg_=$('#reg').val();
                // var idreg2_=$('#anhoActivoMG').val();

            $('#imagen_dir').val('IMAGENES_GABINETE/'+idreg_+'/'+data);
        // alert('IMAGENES_GABINETE/'+idreg_+'/'+data);
        $('#tabla_img_dir').text('IMAGENES_GABINETE/'+idreg_+'/'+data)  ;
        $('#descargar').attr('href', 'IMAGENES_GABINETE/'+idreg_+'/'+data);

    },
    showDelete:true,
    onSubmit:function(s,t){
      var id=$('#ct_id').val();
      if (id=="") {
        return false;
      };

        return true;
    },
    deleteCallback: function(data,pd)
    {
       // alert("borrando..!");
        var id=$('#reg').val();
         var id2=$('#anhoActivoMG').val();
        for(var i=0;i<data.length;i++)
        {
            $.post("delete.php",{op:"delete",name:data[i],key1:id,key2: id2.trim()},
            function(resp, textStatus, jqXHR)
            {
                //Show Message
                $("#status").append("<div>File Deleted</div>");

                // var idreg_=$('#reg').val();
                // var idreg2_=$('#anhoActivoMG').val();

              //  $('#imagen_dir').val('IMAGENES_GABINETE/'+idreg_+'/'+data);
                // alert('IMAGENES_GABINETE/'+idreg_+'/'+data);
                $('#tabla_img_dir').text('')  ;
                 $('#imagen_dir').val('')  ;

               // $('#descargar').attr('href', '#');
                $("descargar").removeAttr("href");


            });
         }
        pd.statusbar.hide(); //You choice to hide/not.

},
 dynamicFormData: function()
{
    var idreg=$('#reg').val();
     var idreg2=$('#anhoActivoMG').val();
    // idreg=idreg+","+idreg2;
    // alert("idreg==="+idreg);
    var data ={ key1: idreg,key2: idreg2.trim() };
    return data;
}
,


}
var uploalerdObj = $("#mulitplefileuploader").uploadFile(settings);
//alert("resuestaaa="+uploadObj);

});
</script>

                    </div>


                    </div>
                </div>

</div>

                </form>

        </div>


   <!--<input name="submit3" type="button"  value="Agregar Documento" onClick="javascript:sumatoria_ganaderoMG();" >-->
</BODY></HTML>
