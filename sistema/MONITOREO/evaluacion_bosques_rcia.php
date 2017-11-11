<?php
//include "page_ganaderaM.php";
//print_r($_SESSION);

?>
<div class="texto">

 <form action="tab_bosques.php" method="POST" autocomplete="off" name="form-evalbosrcia2" id="form-evalbosrcia2" enctype="multipart/form-data" >
     <input id="anhoActivo_" type="hidden" value="<?php if(isset($_POST['anhoActivo_']) && ($_POST['anhoActivo_']>0)){echo $_POST['anhoActivo_']; }else{echo "0";} ?> " name="anhoActivo_">
     <input id="anhoActivo2_" type="hidden" value="<?php if(isset($_POST['anhoActivo2_']) ){echo $_POST['anhoActivo2_']; }else{echo "0";} ?> " name="anhoActivo2_">
 </form>


 <form action="evaluacion_bosques_rcia.php" method="POST" autocomplete="off" name="form-evalbosrcia" id="form-evalbosrcia" enctype="multipart/form-data" >

  <input id="idperiodo" type="hidden" value="<?php echo $periodo;?>" name="idperiodo">
     
  <?php
    if(isset($_POST['anhoActivo_']) && ($_POST['anhoActivo_']>0)){echo " <script> window.location.href='#tabs-3';   </script> ";}
    // echo "aaa AnhoAct1:".$_POST['anhoActivo2_']."-anhoActivo2:".$_POST['anhoActivo_']." -idreg".$_SESSION['idreg']." - periodo:".$periodo  ;
    
    
    
     //-- empezamos  a sacar valoracion bosques 
    
    $sql_and="";
    if(isset($_POST['anhoActivo_']) && ($_POST['anhoActivo_']>0)){$sql_and= " and anho=".$_POST['anhoActivo_']; $_SESSION['anhoActivo_']=$_POST['anhoActivo_']; }else{$sql_and=" order by anho asc  limit 1" ;$_SESSION['anhoActivo_']=0;  }

    $sql_anho="select * from monitoreo.monitoreo m   where  m.tipo=267 and  m.estado = 1 and m.idregistro = ".$_SESSION['idreg'].$sql_and;
    $mon_anho= pg_query($cn,$sql_anho);
    $row_anho = pg_fetch_assoc($mon_anho);
    $anho=0;
    $anho=$row_anho["anho"];

    $monit = $row_anho["idmonitoreo"];
    //echo "consultaañoo=".$sql_anho;
 //echo "aaa AnhoAct1:".$_POST['anhoActivo2_']."-anhoActivo2:".$_POST['anhoActivo_']." -idreg".$_SESSION['idreg']." - periodo:".$periodo." idmon=".$monit  ;
    
    $sql_bosquesEvaluacion = "select *  from monitoreo.valoracionbosques  where  idmonitoreo=".$monit." order by idvalorbosques asc " ;
    //echo "connn=".$sql_bosquesEvaluacion;
       $rcia_bosquesEvaluacion= pg_query($cn,$sql_bosquesEvaluacion);
       
      $idarea1="";
      $idespecies1="";
      $idcplantines1="";
      $iddocrespaldo1="";
      $idotros1="";
       if($row_bosquesEvaluacion = pg_fetch_assoc($rcia_bosquesEvaluacion)){
           $idarea1=$row_bosquesEvaluacion["puntuacion"];
       }
       if($row_bosquesEvaluacion = pg_fetch_assoc($rcia_bosquesEvaluacion)){
           $idespecies1=$row_bosquesEvaluacion["puntuacion"];
       }
       if($row_bosquesEvaluacion = pg_fetch_assoc($rcia_bosquesEvaluacion)){
           $idcplantines1=$row_bosquesEvaluacion["puntuacion"];
       }
       if($row_bosquesEvaluacion = pg_fetch_assoc($rcia_bosquesEvaluacion)){
           $iddocrespaldo1=$row_bosquesEvaluacion["puntuacion"];
       }
       if($row_bosquesEvaluacion = pg_fetch_assoc($rcia_bosquesEvaluacion)){
           $idotros1=$row_bosquesEvaluacion["puntuacion"];
       }
       
       
    // echo "CONSULTADETALLE=:".$sql_docEvaluacion;
     
    
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
                    <td align="center"  ><button     id="idbtn1_" name ="idbtn1_" <?php if(isset($_POST['anhoActivo2_']) && ($_POST['anhoActivo2_']=='Año 2016')){echo " style='cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px; ' "; }else{echo "style='color:#000000;  padding: 8px 11px; ' ";} ?> onClick="javascript:cambiarAnho(this);" type="button" value="0"   >Año 2016</button></td>                    
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
		<td height="14" colspan="4" id='blau'><span class="taulaH">1. TABLA DE VALORACION</span></td>
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

      <table class="tableizer-table">
          <thead><tr class="tableizer-firstrow"><th>CRITERIOS A EVALUAR</th><th>VALORACION</th><th>PUNTUACION</th></tr></thead>
          <tbody style="text-align:center;">
           <tr><td>AREA RESTITUIDA</td><td>25</td><td><input value ="<?php echo $idarea1;?>" name="idarea" id="idarea" type="text" class="boxBusqueda4"  onKeyUp="extractNumber(this,0,false);validar(this,25);" onKeyPress="return blockNonNumbers(this, event, true, false);"></td></tr>
           <tr><td>ESPECIES UTILIZADAS</td><td>25</td><td><input value ="<?php echo $idespecies1;?>" name="idespecies"  id="idespecies"  type="text" class="boxBusqueda4"  onKeyUp="extractNumber(this,0,false);validar(this,25);" onKeyPress="return blockNonNumbers(this, event, true, false);"></td></tr>
           <tr><td>CANTIDAD DE PLANTINES</td><td>20</td><td><input value ="<?php echo $idcplantines1;?>" name="idcplantines"  id="idcplantines"  type="text" class="boxBusqueda4"  onKeyUp="extractNumber(this,0,false);validar(this,20);" onKeyPress="return blockNonNumbers(this, event, true, false);"></td></tr>
           <tr><td>DOCUMENTOS DE RESPALDO</td><td>30</td><td><input value ="<?php echo $iddocrespaldo1;?>" name="iddocrespaldo" id="iddocrespaldo" type="text" class="boxBusqueda4"  onKeyUp="extractNumber(this,0,false);validar(this,30);" onKeyPress="return blockNonNumbers(this, event, true, false);"></td></tr>
           <tr><td>OTROS DOCUMENTOS</td><td>10</td><td><input value ="<?php echo $idotros1;?>" name="idotros"  id="idotros"  type="text" class="boxBusqueda4"  onKeyUp="extractNumber(this,0,false);validar(this,10);" onKeyPress="return blockNonNumbers(this, event, true, false);"></td></tr>
           <tr><td>PUNTUACION FINAL</td><td></td><td id="totalBosques" ></td></tr>
          </tbody>
      </table>



		</td>
	</tr>














</table>

<input id="guardarstepdocbosquesrcia" class="boton verde formaBoton" type="submit" value="Guardar" name="guardarstepdocbosquesrcia">
<input id="printstepdocbosquesrcia" class="boton verde formaBoton" type="submit" value="Imprimir Evaluacion" name="printstepdocbosquesrcia">



<input type="hidden" name="MM_insert" value="formevaluacionrcia" />
<input id="conteoC" type="hidden" value="<?php echo $ct;?>" name="conteoC">
<input id="anhoActivo" type="hidden" value="<?php if(isset($_POST['anhoActivo_']) && ($_POST['anhoActivo_']>0)){echo $_POST['anhoActivo_']; }else{echo "0";} ?> " name="anhoActivo">
<input id="anhoActivo2" type="hidden" value="<?php if(isset($_POST['anhoActivo2_']) ){echo $_POST['anhoActivo2_']; }else{echo "0";} ?> " name="anhoActivo2">
<input id="totalCultivo" type="hidden" value="<?php echo $totalRows_cultivos;?>" name="totalCultivo">
</form>


<div style="height:20px;" ></div>



</div>



<script language="javascript" type="text/javascript">
 
 function numero(txt) {
    if (txt.value != '') {
    var b = /^[0-9\-]*$/;
    return b.test(txt);
    }
}



 function validar(obj,param) {
    //alert('valor='+obj.value+'  - parametro='+param);
    if(obj.value>param){
       alert('El valor tiene que ser Menor o igual a '+param);
       obj.value=param;

    }else{

        }
 
 sumar();
 
}



function sumar(){
    
       suma1=0;
 
    if(document.getElementById('idarea').value.length>0){
        suma1=suma1+parseInt(document.getElementById('idarea').value);
    }
    if(document.getElementById('idespecies').value.length>0){
        suma1=suma1+parseInt(document.getElementById('idespecies').value);
    }
    if(document.getElementById('idcplantines').value.length>0){
        suma1=suma1+parseInt(document.getElementById('idcplantines').value);
    }
    if(document.getElementById('iddocrespaldo').value.length>0){
        suma1=suma1+parseInt(document.getElementById('iddocrespaldo').value);
    }
    if(document.getElementById('idotros').value.length>0){
       suma1=suma1+parseInt(document.getElementById('idotros').value);
    }
     
    document.getElementById('totalBosques').innerHTML=suma1;
}

sumar();

function cambiarAnho(obj){
   // alert('aa:'+obj.getAttribute('ID') );
     document.getElementById('anhoActivo').value=obj.value;
     document.getElementById('anhoActivo2').value=obj.innerHTML;
       document.getElementById('anhoActivo_').value=obj.value;
     document.getElementById('anhoActivo2_').value=obj.innerHTML;

     //alert(obj.innerHTML);
   // alert(document.getElementById('anhoActivo').value);
    document.getElementById("form-evalbosrcia2").submit();
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
                url:   'evaluacion_bosques_rcia_Ajax.php',
                type:  'post',
                beforeSend: function () {
                      //  $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response1) {
                    if(response1.length>1){
                         response1 = response1.substring(0, response1.length - 1);
                         resultado1=response1.split("|");
                    }else{
                        resultado1="";
                    }
                   
                    // alert('resp:'+response1);
                    
                      //  alert('vector='+resultado1);
                       // alert('len='+resultado1.length);
                    for(i=0; i<resultado1.length;i++){
                       //  alert('bucle='+resultado1[i]);

                       if((resultado1[i]==1 && idperiodo==1) || (resultado1[i]==3 && idperiodo==2)){ //resultado1[i]
                             if(document.getElementById("idbtn1")){
                                // alert('entro1');
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
                               // alert('entro1_');
                                butt11 = document.getElementById("idbtn1_");
                                butt11.disabled = false;
                                 if(i==0 && document.getElementById('anhoActivo').value==0 )  {
                                 // alert('entro colo='+document.getElementById('anhoActivo').value);
                                   document.getElementById('idbtn1_').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345; padding: 8px 11px; ');
                                   document.getElementById('anhoActivo').value=resultado1[i];
                                   document.getElementById('anhoActivo_').value=resultado1[i];
                                   
                                 }
                                 document.getElementById('idbtn1_').value=resultado1[i];
                            }
                        }
                       if((resultado1[i]==2 && idperiodo==1) || (resultado1[i]==4 && idperiodo==2)){//resultado1[i]
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
                                   //alert('entro colo='+document.getElementById('anhoActivo').value);
                                 }
                                 document.getElementById('idbtn2_').value=resultado1[i];
                             }

                        }
                        if((resultado1[i]==3 && idperiodo==1) || (resultado1[i]==5 && idperiodo==2)){ //resultado1[i]
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
                                  // alert('entro colo='+document.getElementById('anhoActivo').value);
                                 }
                                 document.getElementById('idbtn3_').value=resultado1[i];
                            }
                        }

                       if((resultado1[i]==4 && idperiodo==1) || (resultado1[i]==6 && idperiodo==2)){//resultado1[i]
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
                                   //alert('entro colo='+document.getElementById('anhoActivo').value);
                                 }
                                 document.getElementById('idbtn4_').value=resultado1[i];
                            }
                        }
                       if((resultado1[i]==5 && idperiodo==1) || (resultado1[i]==7 && idperiodo==2)){//resultado1[i]
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
                                 //  alert('entro colo='+document.getElementById('anhoActivo').value);
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





</script>
