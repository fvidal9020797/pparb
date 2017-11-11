<?php

  
 include "../Clases/Avicola.php";
 session_start();
 
 //include "page_avicola.php";
//print_r($_SESSION);

 
 if(!isset($_SESSION['datos_avicola']['Superficie'])){
	$sql_predio = "SELECT superficie FROM  v_parcela
				   WHERE  v_parcela.idregistro=".$_SESSION['idreg'];
	$predio = pg_query($cn,$sql_predio);
	$row_predio = pg_fetch_array ($predio);
	
}


 if(!isset($_SESSION['datos_avicola'])){ 
   // $vector_avicola = array();
     
    
	 $avicola0 = new Avicola(); 
	 $avicola1 = new Avicola();
	 $avicola2 = new Avicola();
	 $avicola3 = new Avicola();
	 $avicola4 = new Avicola();
	 $avicola5 = new Avicola();
	 
	 $avicola0 -> CargarAvicola($cn, $_SESSION['idreg'],0); 
	 $avicola1 -> CargarAvicola($cn, $_SESSION['idreg'],1); 
	 $avicola2 -> CargarAvicola($cn, $_SESSION['idreg'],2); 
	 $avicola3 -> CargarAvicola($cn, $_SESSION['idreg'],3); 
	 $avicola4 -> CargarAvicola($cn, $_SESSION['idreg'],4); 
	 $avicola5 -> CargarAvicola($cn, $_SESSION['idreg'],5); 
		
	$_SESSION['avicola0']=$avicola0;
	$_SESSION['avicola1']=$avicola1;
	$_SESSION['avicola2']=$avicola2;
	$_SESSION['avicola3']=$avicola3;
	$_SESSION['avicola4']=$avicola4;
	$_SESSION['avicola5']=$avicola5;
	

	//$_SESSION['$vector_avicola']=$vector_avicola;
	
	if(!isset($_SESSION['superficie337'])){
	   $superficie337=new SuperficieRegistro();
	   $superficie337->SuperficieRegistro337($cn, $_SESSION['idreg']); 
	   $_SESSION['superficie337']=$superficie337;
	}
	if(!isset($_SESSION['superficie502']) && $_SESSION['Causal']==2){
		$superficie502=new SuperficieRegistro();
		$superficie502->SuperficieRegistro502($cn, $_SESSION['idreg']); 
		$_SESSION['superficie502']=$superficie502;
	
	}
	
	 if(!isset($_SESSION['nombre_predio'])){
		$sql_predio = "SELECT parcelas.nombre,parcelas.superficie, codificadores.nombrecodificador FROM parcelas, registro, codificadores
		WHERE   parcelas.idtipoprop = codificadores.idcodificadores AND  registro.idparcela = parcelas.idparcela  and  registro.idregistro=".$_SESSION['idreg'];
		$predio = pg_query($cn,$sql_predio);
		$row_predio = pg_fetch_array ($predio);
		$_SESSION['nombre_predio']=$row_predio['nombre'];
	 }
         
         
         
         
         ///Compromiso de Produccion AVICOLA RCIA
if ($periodo == 1)
{
	$sql_ppgrcia1 = "select * from monitoreo.planproduccionavicola as ppg inner join monitoreo.monitoreo as m on ppg.idmonitoreo = m.idmonitoreo where anho = 1 and idregistro = ".$_SESSION['idreg'];
	$ppgrcia1 = pg_query($cn,$sql_ppgrcia1);
	$row_ppgrcia1 = pg_fetch_array ($ppgrcia1);

	$sql_ppgrcia2 = "select * from monitoreo.planproduccionavicola as ppg inner join monitoreo.monitoreo as m on ppg.idmonitoreo = m.idmonitoreo where anho = 2 and idregistro = ".$_SESSION['idreg'];
	$ppgrcia2 = pg_query($cn,$sql_ppgrcia2);
	$row_ppgrcia2 = pg_fetch_array ($ppgrcia2);

	$sql_ppgrcia3 = "select * from monitoreo.planproduccionavicola as ppg inner join monitoreo.monitoreo as m on ppg.idmonitoreo = m.idmonitoreo where anho = 3 and idregistro = ".$_SESSION['idreg'];
	$ppgrcia3 = pg_query($cn,$sql_ppgrcia3);
	$row_ppgrcia3 = pg_fetch_array ($ppgrcia3);

	$sql_ppgrcia4 = "select * from monitoreo.planproduccionavicola as ppg inner join monitoreo.monitoreo as m on ppg.idmonitoreo = m.idmonitoreo where anho = 4 and idregistro = ".$_SESSION['idreg'];
	$ppgrcia4 = pg_query($cn,$sql_ppgrcia4);
	$row_ppgrcia4 = pg_fetch_array ($ppgrcia4);

	$sql_ppgrcia5 = "select * from monitoreo.planproduccionavicola as ppg inner join monitoreo.monitoreo as m on ppg.idmonitoreo = m.idmonitoreo where anho = 5 and idregistro = ".$_SESSION['idreg'];
	$ppgrcia5 = pg_query($cn,$sql_ppgrcia5);
	$row_ppgrcia5 = pg_fetch_array ($ppgrcia5);
}
elseif ($periodo == 2)
{
	$sql_ppgrcia1 = "select * from monitoreo.planproduccionavicola as ppg inner join monitoreo.monitoreo as m on ppg.idmonitoreo = m.idmonitoreo where anho = 3 and idregistro = ".$_SESSION['idreg'];
	$ppgrcia1 = pg_query($cn,$sql_ppgrcia1);
	$row_ppgrcia1 = pg_fetch_array ($ppgrcia1);

	$sql_ppgrcia2 = "select * from monitoreo.planproduccionavicola as ppg inner join monitoreo.monitoreo as m on ppg.idmonitoreo = m.idmonitoreo where anho = 4 and idregistro = ".$_SESSION['idreg'];
	$ppgrcia2 = pg_query($cn,$sql_ppgrcia2);
	$row_ppgrcia2 = pg_fetch_array ($ppgrcia2);

	$sql_ppgrcia3 = "select * from monitoreo.planproduccionavicola as ppg inner join monitoreo.monitoreo as m on ppg.idmonitoreo = m.idmonitoreo where anho = 5 and idregistro = ".$_SESSION['idreg'];
	$ppgrcia3 = pg_query($cn,$sql_ppgrcia3);
	$row_ppgrcia3 = pg_fetch_array ($ppgrcia3);

	$sql_ppgrcia4 = "select * from monitoreo.planproduccionavicola as ppg inner join monitoreo.monitoreo as m on ppg.idmonitoreo = m.idmonitoreo where anho = 6 and idregistro = ".$_SESSION['idreg'];
	$ppgrcia4 = pg_query($cn,$sql_ppgrcia4);
	$row_ppgrcia4 = pg_fetch_array ($ppgrcia4);

	$sql_ppgrcia5 = "select * from monitoreo.planproduccionavicola as ppg inner join monitoreo.monitoreo as m on ppg.idmonitoreo = m.idmonitoreo where anho = 7 and idregistro = ".$_SESSION['idreg'];
	$ppgrcia5 = pg_query($cn,$sql_ppgrcia5);
	$row_ppgrcia5 = pg_fetch_array ($ppgrcia5);
}



	
 }
 
 
?>


<div align="center" class="texto">

<form action="ganadero_rcia.php" method="POST" name = "form-ganaderarcia" autocomplete="off" id="form-ganaderarcia" enctype="multipart/form-data" >


  <b><big>AGRICOLA AVICOLA </big></b><br>
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
            <input type="text" name="supdefilegal" class="boxBusqueda4"  value="<?php echo $_SESSION['superficie337']->get_suptotal();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supdefilegal">
          </div>
		  </td>

		  <?php if($_SESSION['Causal']==2){ ?>
          <td ><div align="center">
            <input type="text" name="suppas" class="boxBusqueda4"  value="<?php echo $_SESSION['superficie502']->get_suptotal();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="suppas">
          </div>
		  </td>
		  <?php } ?>

          <td><div align="center">
            <input name="SupProdAli" type="text"  id="SupProdAli" class="boxVerde" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  maxlength="15"  value="<?php if(isset($_SESSION['Causal']) && $_SESSION['Causal']==2){echo $_SESSION['superficie337']->get_supproali()+$_SESSION['superficie502']->get_supproali();}else{ echo $_SESSION['superficie337']->get_supproali(); } ?>"  readonly>
          </div>
		  </td>
          <td height="22"  id="blau7"><div align="center">
            <input type="text" name="supalitpfp" class="boxBusqueda4"  value="<?php echo $_SESSION['superficie337']->get_supalitpfp();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supalitpfp">
          </div>
		  </td>
          <td ><div align="center">
            <input type="text" name="supalitum" class="boxBusqueda4"  value="<?php echo $_SESSION['superficie337']->get_supalitum();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supalitum">
          </div>
		  </td>

		  <?php if($_SESSION['Causal']==2){ ?>
          <td ><div align="center">
            <input type="text" name="supalitpfppas" class="boxBusqueda4"  value="<?php echo $_SESSION['superficie502']->get_supalitpfp();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supalitpfppas">
          </div>
		  </td>
          <td  id="blau7"><div align="center">
            <input type="text" name="supalitumpas" class="boxBusqueda4"  value="<?php echo $_SESSION['superficie502']->get_supalitum();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supalitumpas">
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

<table width="95%" border="0" class='taulaA' align="center" >
      <tr class="texto_normal">
        <td width="55%" colspan="2" id='blau4'><span class="taulaH">Sistemas de Produccion Avicola En el Predio (Anual)</span></td>
        <td width="45%" id='blau8' >&nbsp;</td>
      </tr>
        <tr >
    <td colspan="2" ><table width="55%" border="0" cellspacing="0" cellpadding="0">
      
         <?php 
            $sql_SistProduccion = "Select * From codificadores Where idclasificador=29 Order by idcodificadores";
            $SistProduccion = pg_query($cn,$sql_SistProduccion) ;
            $row_SistProduccion = pg_fetch_array ($SistProduccion);
                //echo "cons=".$sql_SistProduccion;
           /// echo "MIVAR".$mivariable;
            do{
              $valor=$row_SistProduccion['idcodificadores'];
              if(!isset($_SESSION['datos_avicola'])){
                $sql_SistProd = "SELECT sistemaproduccion.* FROM sistemaproduccion 
                                               WHERE  sistemaproduccion.idregistro=".$_SESSION['idreg']." and sistemaproduccion.idsistemaproduccion=".$valor;
                    $SistProd = pg_query($cn,$sql_SistProd);
                   // echo "conssss=".$_SESSION['datos_avicola'];
                    $row_SistProd = pg_fetch_array ($SistProd);
                    $totalRows_SistProd = pg_num_rows($SistProd);
              }
           ?>
              <tr class="negre">
                <td width="263"><?php echo $row_SistProduccion['nombrecodificador'];?></td>
                <td width="120"> 
                    <input disabled="" type="text" name="<?php echo 'TxtSist'.$row_SistProduccion['idcodificadores'];?>" class="boxBusqueda4" <?php if( !(isset($_SESSION['datos_avicola']["chk".$row_SistProduccion['idcodificadores']])) ) { if(isset($totalRows_SistProd) && $row_SistProd['idsistemaproduccion']!=$row_SistProduccion['idcodificadores']){echo 'disabled';}}?>  id="<?php echo 'TxtSist'.$row_SistProduccion['idcodificadores'];?>" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" onChange="document.forms[0].submit()" value="<?php if(isset($_SESSION['datos_avicola']['TxtSist'.$valor])) { echo $_SESSION['datos_avicola']['TxtSist'.$valor];} elseif( isset($row_SistProd['idsistemaproduccion']) && $row_SistProd['idsistemaproduccion']==$row_SistProduccion['idcodificadores'] ){ echo $row_SistProd['cantidadproduccion'];} ?>" ></td>
              </tr>
              <?php  } while ($row_SistProduccion = pg_fetch_assoc($SistProduccion));?>
            </table></td>
        </tr>
</table>

<br>



<table width="95%" class="taulaA" border="1" cellspacing="0">
  <tr align="center">
    <td colspan="3" rowspan="2" class="cabecera2"> Situacion Actual Avicolae </td>
    <td width="2%" rowspan="17" >&nbsp;</td>
    <td colspan="11" class="cabecera2">Plan de producción avicola en 5 años sistema mejorado</td>
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
        $sql_ano_1_activo = "select anho from monitoreo.monitoreo where estado = 1 and idregistro = ".$_SESSION['idreg']." and anho = 1";
        $ano1activo = pg_query($cn,$sql_ano_1_activo) ;
        $row_ano_1 = pg_fetch_array ($ano1activo);
        $ano_1 = $row_ano_1['anho'];

        $sql_ano_2_activo = "select anho from monitoreo.monitoreo where estado = 1 and idregistro = ".$_SESSION['idreg']." and anho = 2";
        $ano2activo = pg_query($cn,$sql_ano_2_activo) ;
        $row_ano_2 = pg_fetch_array ($ano2activo);
        $ano_2 = $row_ano_2['anho'];

        $sql_ano_3_activo = "select anho from monitoreo.monitoreo where estado = 1 and idregistro = ".$_SESSION['idreg']." and anho = 3";
        $ano3activo = pg_query($cn,$sql_ano_3_activo) ;
        $row_ano_3 = pg_fetch_array ($ano3activo);
        $ano_3 = $row_ano_3['anho'];

        $sql_ano_4_activo = "select anho from monitoreo.monitoreo where estado = 1 and idregistro = ".$_SESSION['idreg']." and anho = 4";
        $ano4activo = pg_query($cn,$sql_ano_4_activo) ;
        $row_ano_4 = pg_fetch_array ($ano4activo);
        $ano_4 = $row_ano_4['anho'];

        $sql_ano_5_activo = "select anho from monitoreo.monitoreo where estado = 1 and idregistro = ".$_SESSION['idreg']." and anho = 5";
        $ano5activo = pg_query($cn,$sql_ano_5_activo) ;
        $row_ano_5 = pg_fetch_array ($ano5activo);
        $ano_5 = $row_ano_5['anho'];
      }
      elseif ($periodo == 2)
      {
        $sql_ano_1_activo = "select anho from monitoreo.monitoreo where estado = 1 and idregistro = ".$_SESSION['idreg']." and anho = 3";
        $ano1activo = pg_query($cn,$sql_ano_1_activo) ;
        $row_ano_1 = pg_fetch_array ($ano1activo);
        $ano_1 = $row_ano_1['anho'];
       

        $sql_ano_2_activo = "select anho from monitoreo.monitoreo where estado = 1 and idregistro = ".$_SESSION['idreg']." and anho = 4";
        $ano2activo = pg_query($cn,$sql_ano_2_activo) ;
        $row_ano_2 = pg_fetch_array ($ano2activo);
        $ano_2 = $row_ano_2['anho'];

        $sql_ano_3_activo = "select anho from monitoreo.monitoreo where estado = 1 and idregistro = ".$_SESSION['idreg']." and anho = 5";
        $ano3activo = pg_query($cn,$sql_ano_3_activo) ;
        $row_ano_3 = pg_fetch_array ($ano3activo);
        $ano_3 = $row_ano_3['anho'];

        $sql_ano_4_activo = "select anho from monitoreo.monitoreo where estado = 1 and idregistro = ".$_SESSION['idreg']." and anho = 6";
        $ano4activo = pg_query($cn,$sql_ano_4_activo) ;
         $ano4Cant= mysqli_num_rows($cn,$sql_ano_4_activo) ;      
        $row_uno_4 = pg_fetch_array($ano4activo);
        $ano_4 = $row_uno_4['anho'];

        $sql_ano_5_activo = "select anho from monitoreo.monitoreo where estado = 1 and idregistro = ".$_SESSION['idreg']." and anho = 7";
        $ano5activo = pg_query($cn,$sql_ano_5_activo) ;
        $row_ano_5 = pg_fetch_array ($ano5activo);
        $ano_5 = $row_ano_5['anho'];
      }

		 ?>
 </tr>
    
    
  <tr >
    <td colspan="3" class="taulaH">En Area de Deforestada Ilegal y/o P.A.S.: </td>
    <td colspan="11"  class="taulaH">En Area de Deforestada Ilegal y/o P.A.S .:</td>
  </tr>
  
  <tr >
    <td width="20%" colspan="2" class="celdaCelesteClaro" >Superficie de cultivos para la alimentación avícola (opcional) (ha) </td>
    <td width="7%" align="center" class="celdaCelesteClaro" ><input disabled="disabled" name="supcultivo0" type="text" class="boxBusqueda4" id="supcultivo0"    value="<?php echo $_SESSION['avicola0']->get_supcultavicola(); ?>"></td>
    <td align="center" class="celdaCelesteClaro" >--</td>
    <td align="center" class="celdaCelesteClaro" >--</td>
    <td align="center" class="celdaAmarilla" >--</td>
    <td align="center" class="celdaCelesteClaro" >--</td>
    <td align="center" class="celdaAmarilla" >--</td>
    <td align="center" class="celdaCelesteClaro" >--</td>
    <td align="center" class="celdaAmarilla" >--</td>
    <td align="center" class="celdaCelesteClaro" >--</td>
    <td align="center" class="celdaAmarilla" >--</td>
    <td align="center" class="celdaCelesteClaro" >--</td>
    <td align="center" class="celdaAmarilla" >--</td>
    </tr>

    
    
    
  <tr align="center" >
    <td colspan="3" align="left" class="taulaH">En La Totalidad de Predio:     </td>
    <td class="taulaH" colspan="11"  align="left">En La Totalidad de Predio:     </td>
    </tr>
  <tr align="center" >
    <td colspan="2" align="left" class="celdaCelesteClaro">Superficie total de infraestructura productiva en el predio (ha)</td>
    <td class="celdaCelesteClaro"><input disabled="disabled" name="supinfraestuctura" type="text" class="boxBusqueda4" id="supinfraestuctura" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola0']->get_supinfraestuctura(); ?>"></td>
    <td class="celdaCelesteClaro" >--</td>
    <td class="celdaCelesteClaro" >--</td>
    <td class="celdaAmarilla" >--</td>
    <td class="celdaCelesteClaro" >--</td>
    <td class="celdaAmarilla" >--</td>
    <td class="celdaCelesteClaro" >--</td>
    <td class="celdaAmarilla" >--</td>
    <td class="celdaCelesteClaro" >--</td>
    <td class="celdaAmarilla" >--</td>
    <td class="celdaCelesteClaro" >--</td>
    <td class="celdaAmarilla" >--</td>
  </tr>
  <tr align="center" >
    <td colspan="2" align="left" class="celdaCelesteClaro">Registro Sanitario</td>
    <td class="celdaCelesteClaro"><label>
      <select disabled="disabled" name="RegSanitario0" id="RegSanitario0" class="combos" >
      <?php $aux=$_SESSION['avicola0']->get_registrosanitario(); ?>
        <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Elegir....</option>
        <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>Vigente</option>
        <option value="2" <?php if( $aux=="2"){echo 'selected' ;}?>>Vencido</option>
        <option value="3" <?php if( $aux=="3"){echo 'selected' ;}?>>Adecuado</option>
        <option value="4" <?php if( $aux=="4"){echo 'selected' ;}?>>Sin Registro</option>
      </select>
    </label></td>
    
    
    <td class="celdaCelesteClaro" align="left">Registro Sanitario</td>
    <td class="celdaCelesteClaro"><select disabled="" name="RegSanitario1" id="RegSanitario1" class="combos"  >
      <?php $aux=$_SESSION['avicola1']->get_registrosanitario(); ?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Elegir....</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>Vigente</option>
      <option value="2" <?php if( $aux=="2"){echo 'selected' ;}?>>Vencido</option>
      <option value="3" <?php if( $aux=="3"){echo 'selected' ;}?>>Adecuado</option>
      <option value="4" <?php if( $aux=="4"){echo 'selected' ;}?>>Sin Registro</option>
    </select></td>
    
     <td class="celdaAmarilla"><select <?php if ((($ano_1 == 1)||($ano_1 == 3))==false){?> disabled <?php }?> name="ERegSanitario1" id="ERegSanitario1" class="combos"  >
      <?php if($row_ppgrcia1['registrosanitario'] == null){ $aux='0' ;} else{ $aux= $row_ppgrcia1['registrosanitario']; }  ?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Elegir....</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>Vigente</option>
      <option value="2" <?php if( $aux=="2"){echo 'selected' ;}?>>Vencido</option>
      <option value="3" <?php if( $aux=="3"){echo 'selected' ;}?>>Adecuado</option>
      <option value="4" <?php if( $aux=="4"){echo 'selected' ;}?>>Sin Registro</option>
    </select></td>
     
    <td class="celdaCelesteClaro"><select disabled="" name="RegSanitario2" id="RegSanitario2" class="combos" >
      <?php $aux=$_SESSION['avicola2']->get_registrosanitario(); ?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Elegir....</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>Vigente</option>
      <option value="2" <?php if( $aux=="2"){echo 'selected' ;}?>>Vencido</option>
      <option value="3" <?php if( $aux=="3"){echo 'selected' ;}?>>Adecuado</option>
      <option value="4" <?php if( $aux=="4"){echo 'selected' ;}?>>Sin Registro</option>
    </select></td>
    
    <td class="celdaAmarilla"><select  <?php if ((($ano_2 == 2)||($ano_2 == 4))==false){?> disabled <?php }?>  name="ERegSanitario2" id="ERegSanitario2" class="combos" >
      <?php if($row_ppgrcia2['registrosanitario'] == null){ $aux='0' ;} else{ $aux= $row_ppgrcia2['registrosanitario']; }  ?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Elegir....</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>Vigente</option>
      <option value="2" <?php if( $aux=="2"){echo 'selected' ;}?>>Vencido</option>
      <option value="3" <?php if( $aux=="3"){echo 'selected' ;}?>>Adecuado</option>
      <option value="4" <?php if( $aux=="4"){echo 'selected' ;}?>>Sin Registro</option>
    </select></td>
    
    <td class="celdaCelesteClaro"><select  disabled="" name="RegSanitario3" id="RegSanitario3" class="combos" >
      <?php $aux=$_SESSION['avicola3']->get_registrosanitario(); ?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Elegir....</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>Vigente</option>
      <option value="2" <?php if( $aux=="2"){echo 'selected' ;}?>>Vencido</option>
      <option value="3" <?php if( $aux=="3"){echo 'selected' ;}?>>Adecuado</option>
      <option value="4" <?php if( $aux=="4"){echo 'selected' ;}?>>Sin Registro</option>
    </select></td>
    
     <td class="celdaAmarilla"><select  <?php if ((($ano_3 == 3)||($ano_3 == 5))==false){?> disabled <?php }?>  name="ERegSanitario3" id="ERegSanitario3" class="combos" >
      <?php if($row_ppgrcia3['registrosanitario'] == null){ $aux='0' ;} else{ $aux= $row_ppgrcia3['registrosanitario']; }  ?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Elegir....</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>Vigente</option>
      <option value="2" <?php if( $aux=="2"){echo 'selected' ;}?>>Vencido</option>
      <option value="3" <?php if( $aux=="3"){echo 'selected' ;}?>>Adecuado</option>
      <option value="4" <?php if( $aux=="4"){echo 'selected' ;}?>>Sin Registro</option>
    </select></td>
    
    <td class="celdaCelesteClaro"><select  disabled="" name="RegSanitario4" id="RegSanitario4" class="combos" >
      <?php $aux=$_SESSION['avicola4']->get_registrosanitario(); ?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Elegir....</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>Vigente</option>
      <option value="2" <?php if( $aux=="2"){echo 'selected' ;}?>>Vencido</option>
      <option value="3" <?php if( $aux=="3"){echo 'selected' ;}?>>Adecuado</option>
      <option value="4" <?php if( $aux=="4"){echo 'selected' ;}?>>Sin Registro</option>
    </select></td>
    
      <td class="celdaAmarilla"><select  <?php if ((($ano_4 == 4)||($ano_4 == 6))==false){?> disabled <?php }?>  name="ERegSanitario4" id="ERegSanitario4" class="combos" >
      <?php if($row_ppgrcia4['registrosanitario'] == null){ $aux='0' ;} else{ $aux= $row_ppgrcia4['registrosanitario']; }  ?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Elegir....</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>Vigente</option>
      <option value="2" <?php if( $aux=="2"){echo 'selected' ;}?>>Vencido</option>
      <option value="3" <?php if( $aux=="3"){echo 'selected' ;}?>>Adecuado</option>
      <option value="4" <?php if( $aux=="4"){echo 'selected' ;}?>>Sin Registro</option>
    </select></td>
    
    <td class="celdaCelesteClaro"><select disabled="" name="RegSanitario5" id="RegSanitario5" class="combos" >
      <?php $aux=$_SESSION['avicola5']->get_registrosanitario(); ?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Elegir....</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>Vigente</option>
      <option value="2" <?php if( $aux=="2"){echo 'selected' ;}?>>Vencido</option>
      <option value="3" <?php if( $aux=="3"){echo 'selected' ;}?>>Adecuado</option>
      <option value="4" <?php if( $aux=="4"){echo 'selected' ;}?>>Sin Registro</option>
    </select></td>
    
     <td class="celdaAmarilla"><select <?php if ((($ano_5 == 5)||($ano_5 == 7))==false){?> disabled <?php }?> name="ERegSanitario5" id="ERegSanitario5" class="combos" >
      <?php if($row_ppgrcia5['registrosanitario'] == null){ $aux='0' ;} else{ $aux=$row_ppgrcia5['registrosanitario']; }  ?>
      <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>Elegir....</option>
      <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>Vigente</option>
      <option value="2" <?php if( $aux=="2"){echo 'selected' ;}?>>Vencido</option>
      <option value="3" <?php if( $aux=="3"){echo 'selected' ;}?>>Adecuado</option>
      <option value="4" <?php if( $aux=="4"){echo 'selected' ;}?>>Sin Registro</option>
    </select></td>
    
    </tr>
  
  <tr align="center" class="taulaH">
    <td height="6" colspan="3" align="left" ></td>
    <td colspan="11" align="left" ></td>
    </tr>
  <tr align="center" >
    <td class="celdaCelesteClaro" align="left">Porcentaje de eclosión (80% base)
      Reproductoras  PESADAS</td>
    <td class="celdaCelesteClaro" align="left"><p>
        <!--<label>
          <input type="radio" name="grupo" value="eclosionpesadas" id="eclosionpesadas" onChange="HabilitarFila(this,'eclosionpesadas','eclosionlivianas')" <?php $aux=$_SESSION['avicola0']->get_eclosionpesadas(); if($aux>0){ echo 'checked' ;} ?> >
        </label>-->
        
      </p></td>
    <td class="celdaCelesteClaro"><input disabled="" name="eclosionpesadas0" type="text"  id="eclosionpesadas0" onChange="MultiplicacionFila('cantpollobbventa','eclosionpesadas')" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola0']->get_eclosionpesadas(); ?>" <?php if($aux<=0){ echo 'readOnly'; echo ' class="boxBusqueda4"';}else{echo ' class="boxBusqueda4"';} ?>  ></td>
    <td class="celdaCelesteClaro" align="left">Porcentaje de eclosión REPRODUCTORAS PESADAS</td>
    <td class="celdaCelesteClaro"><input disabled="" name="eclosionpesadas1" type="text" id="eclosionpesadas1"  onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola1']->get_eclosionpesadas(); ?>" <?php if($aux<=0){ echo 'readonly'; echo ' class="boxBusqueda4"';}else{echo ' class="boxBusqueda4"';} ?> ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_1 == 1)||($ano_1 == 3))==false){?> disabled <?php }?> name="Eeclosionpesadas1" type="text" class="boxBusqueda4" id="Eeclosionpesadas1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia1['eclosionpesadas'] == null){ echo ('0');} else{ echo $row_ppgrcia1['eclosionpesadas']; } ?> " ></td>
    <td class="celdaCelesteClaro"><input disabled="" name="eclosionpesadas2" type="text"  id="eclosionpesadas2" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola2']->get_eclosionpesadas(); ?>" <?php if($aux<=0){ echo 'readOnly'; echo ' class="boxBusqueda4"';}else{echo ' class="boxBusqueda4"';} ?> onChange="MultiplicacionFila('cantpollobbventa','eclosionpesadas')"></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_2 == 2)||($ano_2 == 4))==false){?> disabled <?php }?>  name="Eeclosionpesadas2" type="text" class="boxBusqueda4" id="Eeclosionpesadas2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia2['eclosionpesadas'] == null){ echo ('0');} else{ echo $row_ppgrcia2['eclosionpesadas']; } ?> " ></td>
    <td class="celdaCelesteClaro"><input disabled="" name="eclosionpesadas3" type="text"  id="eclosionpesadas3" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola3']->get_eclosionpesadas(); ?>" <?php if($aux<=0){ echo 'readOnly'; echo ' class="boxBusqueda4"';}else{echo ' class="boxBusqueda4"';} ?> onChange="MultiplicacionFila('cantpollobbventa','eclosionpesadas')"></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_3 == 3)||($ano_3 == 5))==false){?> disabled <?php }?> name="Eeclosionpesadas3" type="text" class="boxBusqueda4" id="Eeclosionpesadas3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia3['eclosionpesadas'] == null){ echo ('0');} else{ echo $row_ppgrcia3['eclosionpesadas']; } ?> " ></td>
    <td class="celdaCelesteClaro"><input disabled="" name="eclosionpesadas4" type="text"  id="eclosionpesadas4" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola4']->get_eclosionpesadas(); ?>" <?php if($aux<=0){ echo 'readOnly'; echo ' class="boxBusqueda4"';}else{echo ' class="boxBusqueda4"';} ?> onChange="MultiplicacionFila('cantpollobbventa','eclosionpesadas')"></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_4 == 4)||($ano_4 == 6))==false){?> disabled <?php }?> name="Eeclosionpesadas4" type="text" class="boxBusqueda4" id="Eeclosionpesadas4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia4['eclosionpesadas'] == null){ echo ('0');} else{ echo $row_ppgrcia4['eclosionpesadas']; } ?> " ></td>
    <td class="celdaCelesteClaro"><input disabled="" name="eclosionpesadas5" type="text"  id="eclosionpesadas5" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola5']->get_eclosionpesadas(); ?>" <?php if($aux<=0){ echo 'readOnly'; echo ' class="boxBusqueda4"';}else{echo ' class="boxBusqueda4"';} ?> onChange="MultiplicacionFila('cantpollobbventa','eclosionpesadas')"></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_5 == 5)||($ano_5 == 7))==false){?> disabled <?php }?> name="Eeclosionpesadas5" type="text" class="boxBusqueda4" id="Eeclosionpesadas5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia5['eclosionpesadas'] == null){ echo ('0');} else{ echo $row_ppgrcia5['eclosionpesadas']; } ?> " ></td>
    
    </tr>
  <tr align="center" >
    <td align="left" class="celdaCelesteClaro">Porcentaje de eclosión (30% base)
      Reproductoras LIVIANAS</td>
    <td align="left" class="celdaCelesteClaro"></td>
    <td class="celdaCelesteClaro"><input disabled="" name="eclosionlivianas0" type="text"  id="eclosionlivianas0" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo $_SESSION['avicola0']->get_eclosionlivianas(); ?>" <?php if($aux1<=0){ echo 'readOnly'; echo ' class="boxBusqueda4"';}else{echo ' class="boxBusqueda4"';} ?>></td>
    <td class="celdaCelesteClaro" align="left">Porcentaje de eclosión 
      REPRODUCTORAS LIVIANAS</td>
    <td class="celdaCelesteClaro"><input disabled="" name="eclosionlivianas1" type="text" id="eclosionlivianas1" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo $_SESSION['avicola1']->get_eclosionlivianas(); ?>" <?php if($aux1<=0){ echo 'readOnly'; echo ' class="boxBusqueda4"';}else{echo ' class="boxBusqueda4"';} ?>></td>
     <td class="celdaAmarilla"><input <?php if ((($ano_1 == 1)||($ano_1 == 3))==false){?> disabled <?php }?> name="Eeclosionlivianas1" type="text" class="boxBusqueda4" id="Eeclosionlivianas1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia1['eclosionlivianas'] == null){ echo ('0');} else{ echo $row_ppgrcia1['eclosionlivianas']; } ?> " ></td>
    <td class="celdaCelesteClaro"><input disabled="" name="eclosionlivianas2" type="text" id="eclosionlivianas2" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo $_SESSION['avicola2']->get_eclosionlivianas(); ?>" <?php if($aux1<=0){ echo 'readOnly'; echo ' class="boxBusqueda4"';}else{echo ' class="boxBusqueda4"';} ?> onChange="MultiplicacionFila('cantpollobbventa','eclosionlivianas')"></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_2 == 2)||($ano_2 == 4))==false){?> disabled <?php }?> name="Eeclosionlivianas2" type="text" class="boxBusqueda4" id="Eeclosionlivianas2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia2['eclosionlivianas'] == null){ echo ('0');} else{ echo $row_ppgrcia2['eclosionlivianas']; } ?> " ></td>
    <td class="celdaCelesteClaro"><input disabled="" name="eclosionlivianas3" type="text" id="eclosionlivianas3" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola3']->get_eclosionlivianas(); ?>" <?php if($aux1<=0){ echo 'readOnly'; echo ' class="boxBusqueda4"';}else{echo ' class="boxBusqueda4"';} ?> onChange="MultiplicacionFila('cantpollobbventa','eclosionlivianas')"></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_3 == 3)||($ano_3 == 5))==false){?> disabled <?php }?> name="Eeclosionlivianas3" type="text" class="boxBusqueda4" id="Eeclosionlivianas3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia3['eclosionlivianas'] == null){ echo ('0');} else{ echo $row_ppgrcia3['eclosionlivianas']; } ?> " ></td>
    <td class="celdaCelesteClaro"><input disabled="" name="eclosionlivianas4" type="text" id="eclosionlivianas4" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola4']->get_eclosionlivianas(); ?>" <?php if($aux1<=0){ echo 'readOnly'; echo ' class="boxBusqueda4"';}else{echo ' class="boxBusqueda4"';} ?> onChange="MultiplicacionFila('cantpollobbventa','eclosionlivianas')"></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_4 == 4)||($ano_4 == 6))==false){?> disabled <?php }?> name="Eeclosionlivianas4" type="text" class="boxBusqueda4" id="Eeclosionlivianas4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia4['eclosionlivianas'] == null){ echo ('0');} else{ echo $row_ppgrcia4['eclosionlivianas']; } ?> " ></td>
    <td class="celdaCelesteClaro"><input disabled="" name="eclosionlivianas5" type="text" id="eclosionlivianas5" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola5']->get_eclosionlivianas(); ?>" <?php if($aux1<=0){ echo 'readOnly'; echo ' class="boxBusqueda4"';}else{echo ' class="boxBusqueda4"';} ?> onChange="MultiplicacionFila('cantpollobbventa','eclosionlivianas')"></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_5 == 5)||($ano_5 == 7))==false){?> disabled <?php }?> name="Eeclosionlivianas5" type="text" class="boxBusqueda4" id="Eeclosionlivianas5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value=" <?php  if($row_ppgrcia5['eclosionlivianas'] == null){ echo ('0');} else{ echo $row_ppgrcia5['eclosionlivianas']; } ?> " ></td>
    </tr>
  <tr align="center" >
    <td colspan="2" align="left" class="celdaCelesteClaro">Cantidad de pollos bb a la venta/año</td>
    <td class="celdaCelesteClaro">
        <input disabled="disabled" name="cantpollobbventa0" type="text" class="boxBusqueda4" id="cantpollobbventa0" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo $_SESSION['avicola0']->get_cantpollobbventa(); ?>" onChange="HabilitarFila(this,'eclosionlivianas','eclosionpesadas')"  >  </td>
    <td class="celdaCelesteClaro" align="left">Cantidad de pollos bb a la venta/año</td>
    <td class="celdaCelesteClaro">
      <input disabled="" name="cantpollobbventa1" type="text" class="boxBusqueda4" id="cantpollobbventa1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo $_SESSION['avicola1']->get_cantpollobbventa(); ?>" readonly> </td>
    <td class="celdaAmarilla"><input <?php if ((($ano_1 == 1)||($ano_1 == 3))==false){?> disabled <?php }?> name="Ecantpollobbventa1" type="text" class="boxBusqueda4" id="Ecantpollobbventa1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia1['cantpollobbventa'] == null){ echo ('0');} else{ echo $row_ppgrcia1['cantpollobbventa']; } ?> " ></td>
    <td class="celdaCelesteClaro">
      <input disabled="" name="cantpollobbventa2" type="text" class="boxBusqueda4" id="cantpollobbventa2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola2']->get_cantpollobbventa(); ?>" readonly> </td>
    <td class="celdaAmarilla"><input <?php if ((($ano_2 == 2)||($ano_2 == 4))==false){?> disabled <?php }?> name="Ecantpollobbventa2" type="text" class="boxBusqueda4" id="Ecantpollobbventa2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia2['cantpollobbventa'] == null){ echo ('0');} else{ echo $row_ppgrcia2['cantpollobbventa']; } ?> " ></td>
    <td class="celdaCelesteClaro">
      <input disabled="" name="cantpollobbventa3" type="text" class="boxBusqueda4" id="cantpollobbventa3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola3']->get_cantpollobbventa(); ?>" readonly> </td>
    <td class="celdaAmarilla"><input <?php if ((($ano_3 == 3)||($ano_3 == 5))==false){?> disabled <?php }?> name="Ecantpollobbventa3" type="text" class="boxBusqueda4" id="Ecantpollobbventa3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia3['cantpollobbventa'] == null){ echo ('0');} else{ echo $row_ppgrcia3['cantpollobbventa']; } ?> " ></td>
    
    <td class="celdaCelesteClaro">
      <input disabled="" name="cantpollobbventa4" type="text" class="boxBusqueda4" id="cantpollobbventa4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola4']->get_cantpollobbventa(); ?>" readonly> </td>
     
      <td class="celdaAmarilla"><input <?php if ((($ano_4 == 4)||($ano_4 == 6))==false){?> disabled <?php }?> name="Ecantpollobbventa4" type="text" class="boxBusqueda4" id="Ecantpollobbventa4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia4['cantpollobbventa'] == null){ echo ('0');} else{ echo $row_ppgrcia4['cantpollobbventa']; } ?> " ></td>
     
    <td class="celdaCelesteClaro">
     <input disabled="" name="cantpollobbventa5" type="text" class="boxBusqueda4" id="cantpollobbventa5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola5']->get_cantpollobbventa(); ?>" readonly> </td>
     
      <td class="celdaAmarilla"><input <?php if ((($ano_5 == 5)||($ano_5 == 7))==false){?> disabled <?php }?> name="Ecantpollobbventa5" type="text" class="boxBusqueda4" id="Ecantpollobbventa5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia5['cantpollobbventa'] == null){ echo ('0');} else{ echo $row_ppgrcia5['cantpollobbventa']; } ?> " ></td>
  </tr>
  <tr align="center" class="taulaH" >
    <td height="6" colspan="3" align="left" ></td>
    <td colspan="11" align="left" ></td>
    </tr>
  <tr align="center" >
    <td colspan="2" align="left" class="celdaCelesteClaro">Porcentaje Mortalidad (10% base)
      PARRILLEROS</td>
    <td class="celdaCelesteClaro"><input disabled="" name="mortalidadparrillero0" type="text" class="boxBusqueda4" id="mortalidadparrillero0" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola0']->get_mortalidadparrillero(); ?>" ></td>
    <td class="celdaCelesteClaro" align="left">Porcentaje Mortalidad (%) PARRILLEROS</td>
    <td class="celdaCelesteClaro"><input disabled="" name="mortalidadparrillero1" type="text" class="boxBusqueda4" id="mortalidadparrillero1" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola1']->get_mortalidadparrillero(); ?>" readonly></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_1 == 1)||($ano_1 == 3))==false){?> disabled <?php }?> name="Emortalidadparrillero1" type="text" class="boxBusqueda4" id="Emortalidadparrillero1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia1['mortalidadparrillero'] == null){ echo ('0');} else{ echo $row_ppgrcia1['mortalidadparrillero']; } ?> " ></td>
    <td class="celdaCelesteClaro"><input disabled="" name="mortalidadparrillero2" type="text" class="boxBusqueda4" id="mortalidadparrillero2" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola2']->get_mortalidadparrillero(); ?>" onChange="MultiplicacionFila('cantpolloventa','mortalidadparrillero')" ></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_2 == 2)||($ano_2 == 4))==false){?> disabled <?php }?> name="Emortalidadparrillero2" type="text" class="boxBusqueda4" id="Emortalidadparrillero2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia2['mortalidadparrillero'] == null){ echo ('0');} else{ echo $row_ppgrcia2['mortalidadparrillero']; } ?> " ></td>
    <td class="celdaCelesteClaro"><input disabled="" name="mortalidadparrillero3" type="text" class="boxBusqueda4" id="mortalidadparrillero3" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola3']->get_mortalidadparrillero(); ?>" onChange="MultiplicacionFila('cantpolloventa','mortalidadparrillero')"></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_3 == 3)||($ano_3 == 5))==false){?> disabled <?php }?> name="Emortalidadparrillero3" type="text" class="boxBusqueda4" id="Emortalidadparrillero3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia3['mortalidadparrillero'] == null){ echo ('0');} else{ echo $row_ppgrcia3['mortalidadparrillero']; } ?> " ></td>
    <td class="celdaCelesteClaro"><input disabled="" name="mortalidadparrillero4" type="text" class="boxBusqueda4" id="mortalidadparrillero4" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola4']->get_mortalidadparrillero(); ?>" onChange="MultiplicacionFila('cantpolloventa','mortalidadparrillero')"></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_4 == 4)||($ano_4 == 6))==false){?> disabled <?php }?> name="Emortalidadparrillero4" type="text" class="boxBusqueda4" id="Emortalidadparrillero4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia4['mortalidadparrillero'] == null){ echo ('0');} else{ echo $row_ppgrcia4['mortalidadparrillero']; } ?> " ></td>
    <td class="celdaCelesteClaro"><input disabled="" name="mortalidadparrillero5" type="text" class="boxBusqueda4" id="mortalidadparrillero5" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola5']->get_mortalidadparrillero(); ?>" onChange="MultiplicacionFila('cantpolloventa','mortalidadparrillero')"></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_5 == 5)||($ano_5 ==7))==false){?> disabled <?php }?> name="Emortalidadparrillero5" type="text" class="boxBusqueda4" id="Emortalidadparrillero5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia5['mortalidadparrillero'] == null){ echo ('0');} else{ echo $row_ppgrcia5['mortalidadparrillero']; } ?> " ></td>
    
  </tr>
  <tr align="center" >
    <td colspan="2" align="left" class="celdaCelesteClaro">Cantidad de pollos a la venta/año</td>
    <td class="celdaCelesteClaro"><input disabled="" name="cantpolloventa0" type="text" class="boxBusqueda4" id="cantpolloventa0" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo $_SESSION['avicola0']->get_cantpolloventa(); ?>" onChange="MultiplicacionFila('cantpolloventa','mortalidadparrillero')" ></td>
    <td class="celdaCelesteClaro" align="left">Cantidad de pollos a la venta/año</td>
    <td class="celdaCelesteClaro"><input disabled="" name="cantpolloventa1" type="text" class="boxBusqueda4" id="cantpolloventa1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola1']->get_cantpolloventa(); ?>" readonly></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_1 == 1)||($ano_1 == 3))==false){?> disabled <?php }?> name="Ecantpolloventa1" type="text" class="boxBusqueda4" id="Ecantpolloventa1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia1['cantpolloventa'] == null){ echo ('0');} else{ echo $row_ppgrcia1['cantpolloventa']; } ?> " ></td>
    <td class="celdaCelesteClaro"><input disabled="" name="cantpolloventa2" type="text" class="boxBusqueda4" id="cantpolloventa2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola2']->get_cantpolloventa(); ?>" readonly></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_2 == 2)||($ano_2 == 4))==false){?> disabled <?php }?> name="Ecantpolloventa2" type="text" class="boxBusqueda4" id="Ecantpolloventa2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia2['cantpolloventa'] == null){ echo ('0');} else{ echo $row_ppgrcia2['cantpolloventa']; } ?> " ></td>
    <td class="celdaCelesteClaro"><input disabled="" name="cantpolloventa3" type="text" class="boxBusqueda4" id="cantpolloventa3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola3']->get_cantpolloventa(); ?>" readonly></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_3 == 3)||($ano_3 == 5))==false){?> disabled <?php }?> name="Ecantpolloventa3" type="text" class="boxBusqueda4" id="Ecantpolloventa3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia3['cantpolloventa'] == null){ echo ('0');} else{ echo $row_ppgrcia3['cantpolloventa']; } ?> " ></td>
    
    <td class="celdaCelesteClaro"><input disabled="" name="cantpolloventa4" type="text" class="boxBusqueda4" id="cantpolloventa4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola4']->get_cantpolloventa(); ?>" readonly></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_4 == 4)||($ano_4 == 6))==false){?> disabled <?php }?> name="Ecantpolloventa4" type="text" class="boxBusqueda4" id="Ecantpolloventa4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia4['cantpolloventa'] == null){ echo ('0');} else{ echo $row_ppgrcia4['cantpolloventa']; } ?> " ></td>
    
    <td class="celdaCelesteClaro"><input disabled="" name="cantpolloventa5" type="text" class="boxBusqueda4" id="cantpolloventa5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola5']->get_cantpolloventa(); ?>" readonly></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_5 == 5)||($ano_5 ==7))==false){?> disabled <?php }?> name="Ecantpolloventa5" type="text" class="boxBusqueda4" id="Ecantpolloventa5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia5['cantpolloventa'] == null){ echo ('0');} else{ echo $row_ppgrcia5['cantpolloventa']; } ?> " ></td>
    
    </tr>
  
  <tr align="center" class="taulaH">
    <td colspan="3" height="6" align="left"></td>
    <td colspan="11" align="left"></td>
    </tr>
  <tr align="center" class="celdaCelesteClaro">
    <td colspan="2" align="left">Porcentaje Postura (80% base)
      PONEDORAS</td>
    <td><input disabled="disabled" name="posturaponedoras0" type="text" class="boxBusqueda4" id="posturaponedoras0" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola0']->get_posturaponedoras(); ?>"></td>
    <td align="left">Porcentaje Postura (%) PONEDORAS</td>
    <td><input disabled="" name="posturaponedoras1" type="text" class="boxBusqueda4" id="posturaponedoras1" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola1']->get_posturaponedoras(); ?>"></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_1 == 1)||($ano_1 == 3))==false){?> disabled <?php }?> name="Eposturaponedoras1" type="text" class="boxBusqueda4" id="Eposturaponedoras1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia1['posturaponedoras'] == null){ echo ('0');} else{ echo $row_ppgrcia1['posturaponedoras']; } ?> " ></td>
    <td><input disabled="" name="posturaponedoras2" type="text" class="boxBusqueda4" id="posturaponedoras2" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola2']->get_posturaponedoras(); ?>" onChange="MultiplicacionFila('canthuevoventa','posturaponedoras')"></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_2 == 2)||($ano_2 == 4))==false){?> disabled <?php }?> name="Eposturaponedoras2" type="text" class="boxBusqueda4" id="Eposturaponedoras2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia2['posturaponedoras'] == null){ echo ('0');} else{ echo $row_ppgrcia2['posturaponedoras']; } ?> " ></td>
    <td><input disabled="" name="posturaponedoras3" type="text" class="boxBusqueda4" id="posturaponedoras3" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola3']->get_posturaponedoras(); ?>" onChange="MultiplicacionFila('canthuevoventa','posturaponedoras')"></td>
     <td class="celdaAmarilla"><input <?php if ((($ano_3 == 3)||($ano_3 == 5))==false){?> disabled <?php }?> name="Eposturaponedoras3" type="text" class="boxBusqueda4" id="Eposturaponedoras3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia3['posturaponedoras'] == null){ echo ('0');} else{ echo $row_ppgrcia3['posturaponedoras']; } ?> " ></td>
    <td><input disabled="" name="posturaponedoras4" type="text" class="boxBusqueda4" id="posturaponedoras4" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola4']->get_posturaponedoras(); ?>" onChange="MultiplicacionFila('canthuevoventa','posturaponedoras')"></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_4 == 4)||($ano_4 == 6))==false){?> disabled <?php }?> name="Eposturaponedoras4" type="text" class="boxBusqueda4" id="Eposturaponedoras4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia4['posturaponedoras'] == null){ echo ('0');} else{ echo $row_ppgrcia4['posturaponedoras']; } ?> " ></td>
    
    <td><input disabled="" name="posturaponedoras5" type="text" class="boxBusqueda4" id="posturaponedoras5" onKeyUp="extractNumber(this,1,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola5']->get_posturaponedoras(); ?>" onChange="MultiplicacionFila('canthuevoventa','posturaponedoras')"></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_1 == 1)||($ano_1 == 3))==false){?> disabled <?php }?> name="Eposturaponedoras5" type="text" class="boxBusqueda4" id="Eposturaponedoras5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia5['posturaponedoras'] == null){ echo ('0');} else{ echo $row_ppgrcia5['posturaponedoras']; } ?> " ></td>
    
  </tr>
  
  <tr align="center" class="celdaCelesteClaro">
    <td colspan="2" align="left">Cantidad de huevos a la venta/año</td>
    <td class="opcion"><span class="celdaCelesteClaro">
            <input disabled="" name="canthuevoventa0" type="text" class="boxBusqueda4" id="canthuevoventa0" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola0']->get_canthuevoventa(); ?>" onChange="MultiplicacionFila('canthuevoventa','posturaponedoras')">
    </span></td>
    <td align="left">Cantidad de huevos a la venta/año</td>
    <td class="opcion"><span class="celdaCelesteClaro">
      <input disabled="" name="canthuevoventa1" type="text" class="boxBusqueda4" id="canthuevoventa1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola1']->get_canthuevoventa(); ?>" readonly>
    </span></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_1 == 1)||($ano_1 == 3))==false){?> disabled <?php }?> name="Ecanthuevoventa1" type="text" class="boxBusqueda4" id="Ecanthuevoventa1" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia1['canthuevoventa'] == null){ echo ('0');} else{ echo $row_ppgrcia1['canthuevoventa']; } ?> " ></td>
    
    <td class="opcion"><span class="celdaCelesteClaro">
      <input disabled="" name="canthuevoventa2" type="text" class="boxBusqueda4" id="canthuevoventa2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola2']->get_canthuevoventa(); ?>" readonly>
    </span></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_2 == 2)||($ano_2 == 4))==false){?> disabled <?php }?> name="Ecanthuevoventa2" type="text" class="boxBusqueda4" id="Ecanthuevoventa2" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia2['canthuevoventa'] == null){ echo ('0');} else{ echo $row_ppgrcia2['canthuevoventa']; } ?> " ></td>
    
    <td class="opcion"><span class="celdaCelesteClaro">
      <input disabled="" name="canthuevoventa3" type="text" class="boxBusqueda4" id="canthuevoventa3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola3']->get_canthuevoventa(); ?>" readonly>
    </span></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_3 == 3)||($ano_3 == 5))==false){?> disabled <?php }?> name="Ecanthuevoventa3" type="text" class="boxBusqueda4" id="Ecanthuevoventa3" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia3['canthuevoventa'] == null){ echo ('0');} else{ echo $row_ppgrcia3['canthuevoventa']; } ?> " ></td>
    
    <td class="opcion"><span class="celdaCelesteClaro">
      <input disabled="" name="canthuevoventa4" type="text" class="boxBusqueda4" id="canthuevoventa4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola4']->get_canthuevoventa(); ?>" readonly>
    </span></td>
    
    <td class="celdaAmarilla"><input <?php if ((($ano_4 == 4)||($ano_4 == 6))==false){?> disabled <?php }?> name="Ecanthuevoventa4" type="text" class="boxBusqueda4" id="Ecanthuevoventa4" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia4['canthuevoventa'] == null){ echo ('0');} else{ echo $row_ppgrcia4['canthuevoventa']; } ?> " ></td>
    
    <td class="opcion"><span class="celdaCelesteClaro">
      <input disabled="" name="canthuevoventa5" type="text" class="boxBusqueda4" id="canthuevoventa5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"   value="<?php echo $_SESSION['avicola5']->get_canthuevoventa(); ?>" readonly>
    </span></td>
    <td class="celdaAmarilla"><input <?php if ((($ano_1 == 1)||($ano_1 == 3))==false){?> disabled <?php }?> name="Ecanthuevoventa5" type="text" class="boxBusqueda4" id="Ecanthuevoventa5" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_ppgrcia5['canthuevoventa'] == null){ echo ('0');} else{ echo $row_ppgrcia5['canthuevoventa']; } ?> " ></td>
    
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
