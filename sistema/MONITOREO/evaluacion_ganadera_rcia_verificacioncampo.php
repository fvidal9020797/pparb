<?php
$idTipoPredio=$row_predio['idtipoprop'];
$sql_and2="";
  if(isset($_POST['anhoActivoV_C1_']) && ($_POST['anhoActivoV_C1_']>0)){
     $sql_and2= " and anho=".$_POST['anhoActivoV_C1_'];
   }
  else{
    $sql_and2=" order by  anho asc  limit 1" ;
  }
 $sql_mon1= "select idmonitoreo from monitoreo.monitoreo where tipo=269 and estado = 1 and idregistro = ".$_SESSION['idreg'].$sql_and2;
  $mon_sql = pg_query($cn,$sql_mon1);
  $row_monit = pg_fetch_array ($mon_sql);
  $idmonitoreo2=$row_monit["idmonitoreo"];
  //echo $_POST['anhoActivoV_C1_'];
if(isset($_POST['anhoActivoV_C1_']) && ($_POST['anhoActivoV_C1_']>0)){
  echo "<script>
          window.location.href='#tabs-5';
        </script> ";
  }
?>
<script>
$(document).ready(function(){
    //establecer_anosVC();
    //Obtener();
  if($("#idmonitoreo").val()!=""){
    establecer_anosVC();
    Obtener();
  }
  else{
   establecer_anosVC();
  }
});
 function pestana_ganadero(){
     window.location.href="#tabs-5";
 }
function cambiarAnhoVC(obj){
  document.getElementById('anhoActivoVC').value=obj.value;
  document.getElementById('anhoActivoVC2').value=obj.innerHTML;
  document.getElementById('anhoActivoV_C1_').value=obj.value;
  document.getElementById('anhoActivoV_C2_').value=obj.innerHTML;
  document.getElementById("form-VerfCamp").submit();
}
function Obtener(){
  $.ajax({
    url:'folder_evaluacion_ganadera_rcia_verificacioncampo/Obtener_Tabla_Verificacion_Campo.php',
    type:'POST',
    data:{
      idmonitoreo: $("#idmonitoreo").val()
    },
    success: function (data){
      data=data.split("!");
      if(data.length==10){
        $("#v_c_suppastoscultivados").val(data[0]);
        $("#v_c_alimentosuple").val(data[1]);
        $("#v_c_razasmejoradas").val(data[2]);
        $("#v_c_enlisadosforraje").val(data[3]);
        $("#v_c_potrerosalam").val(data[4]);
        $("#v_c_atajados").val(data[5]);
        $("#v_c_corral").val(data[6]);
        $("#v_c_brete").val(data[7]);
        $("#v_c_certificadosenasag").val(data[8]);
      }
      else{
        $("#v_c_suppastoscultivados").val(data[0]);
        $("#v_c_alimentosuple").val(data[1]);
        $("#v_c_razasmejoradas").val(data[2]);
        $("#v_c_enlisadosforraje").val(data[3]);
        $("#v_c_potrerosalam").val(data[4]);
        $("#v_c_atajados").val(data[5]);
        $("#v_c_corral").val(data[6]);
        $("#v_c_brete").val(data[7]);
        $("#v_c_certificadosenasag").val(data[8]);
        $("#v_c_compraventaganado").val(data[9]);
        $("#v_c_insumospecuarios").val(data[10]);
      }
      sumatoria_ganadero();
    }
  });
}
function sumatoria_ganadero2(obj,param){
     a=0;
     b=0;
     c=0;
     if(document.getElementById('v_c_alimentosuple').value.length>0){
       a=parseInt(document.getElementById('v_c_alimentosuple').value);
     }
     if(document.getElementById('v_c_razasmejoradas').value.length>0){
       b=parseInt(document.getElementById('v_c_razasmejoradas').value);
     }
     if(document.getElementById('v_c_enlisadosforraje').value.length>0){
       c=parseInt(document.getElementById('v_c_enlisadosforraje').value);
     }
     var res=a+b+c;
     if((res)>param){
       obj.value=0; //0;0;
       alert('La sumatoria de los 3 campos tiene que ser Menor o igual a '+param);
    }else{
        }
    suma=0;
    try{
      if(document.getElementById('v_c_suppastoscultivados').value.length>0){
       suma=suma+parseInt(document.getElementById('v_c_suppastoscultivados').value);
      }
    }catch(err){}
    try{
       if(document.getElementById('v_c_alimentosuple').value.length>0){
        suma=suma+parseInt(document.getElementById('v_c_alimentosuple').value);
        }
    }catch(err){}
      try{
       if(document.getElementById('v_c_razasmejoradas').value.length>0){
         suma=suma+parseInt(document.getElementById('v_c_razasmejoradas').value);
      }
    }catch(err){}
    try{
      if(document.getElementById('v_c_enlisadosforraje').value.length>0){
        suma=suma+parseInt(document.getElementById('v_c_enlisadosforraje').value);
      }
    }catch(err){}
    try{
      if(document.getElementById('v_c_potrerosalam').value.length>0){
       suma=suma+parseInt(document.getElementById('v_c_potrerosalam').value);
       }
    }catch(err){}
    try{
      if(document.getElementById('v_c_atajados').value.length>0){
       suma=suma+parseInt(document.getElementById('v_c_atajados').value);
      }
    }catch(err){}
    try{
      if(document.getElementById('v_c_corral').value.length>0){
       suma=suma+parseInt(document.getElementById('v_c_corral').value);
      }
    }catch(err){}
    try{
       if(document.getElementById('v_c_brete').value.length>0){
       suma=suma+parseInt(document.getElementById('v_c_brete').value);
       }
    }catch(err){}
    try{
      if(document.getElementById('v_c_certificadosenasag').value.length>0){
         suma=suma+parseInt(document.getElementById('v_c_certificadosenasag').value);
      }
    }catch(err){}
    try{
      if(document.getElementById('v_c_compraventaganado').value.length>0){
       suma=suma+parseInt(document.getElementById('v_c_compraventaganado').value);
    }
    }catch(err){}
    try{
       if(document.getElementById('v_c_insumospecuarios').value.length>0){
       suma=suma+parseInt(document.getElementById('v_c_insumospecuarios').value);
      }
    }catch(err){}
    document.getElementById('v_c_puntuacionfinal').value=suma;
}
function sumatoria_ganadero(){
  suma=0;
    try{
      if(document.getElementById('v_c_suppastoscultivados').value.length>0){
        suma=suma+parseInt(document.getElementById('v_c_suppastoscultivados').value);
      }
    }catch(err){}
    try{
       if(document.getElementById('v_c_alimentosuple').value.length>0){
        suma=suma+parseInt(document.getElementById('v_c_alimentosuple').value);
        }
    }catch(err){}
      try{
       if(document.getElementById('v_c_razasmejoradas').value.length>0){
         suma=suma+parseInt(document.getElementById('v_c_razasmejoradas').value);
      }
    }catch(err){}
    try{
      if(document.getElementById('v_c_enlisadosforraje').value.length>0){
        suma=suma+parseInt(document.getElementById('v_c_enlisadosforraje').value);
      }
    }catch(err){}
    try{
      if(document.getElementById('v_c_potrerosalam').value.length>0){
       suma=suma+parseInt(document.getElementById('v_c_potrerosalam').value);
       }
    }catch(err){}
    try{
      if(document.getElementById('v_c_atajados').value.length>0){
       suma=suma+parseInt(document.getElementById('v_c_atajados').value);
      }
    }catch(err){}
    try{
      if(document.getElementById('v_c_corral').value.length>0){
       suma=suma+parseInt(document.getElementById('v_c_corral').value);
      }
    }catch(err){}
    try{
       if(document.getElementById('v_c_brete').value.length>0){
       suma=suma+parseInt(document.getElementById('v_c_brete').value);
       }
    }catch(err){}
    try{
      if(document.getElementById('v_c_certificadosenasag').value.length>0){
         suma=suma+parseInt(document.getElementById('v_c_certificadosenasag').value);
      }
    }catch(err){}
    try{
      if(document.getElementById('v_c_compraventaganado').value.length>0){
       suma=suma+parseInt(document.getElementById('v_c_compraventaganado').value);
    }
    }catch(err){}
    try{
       if(document.getElementById('v_c_insumospecuarios').value.length>0){
       suma=suma+parseInt(document.getElementById('v_c_insumospecuarios').value);
      }
    }catch(err){}
    document.getElementById('v_c_puntuacionfinal').value=suma;
}
/*function recargar_anosVC(){
    var idperiodo=document.getElementById('idperiodo').value;
        var parametros = {
            "tarea" : "establecerAnos"
        };
        $.ajax({
                data:  parametros,
                url:   'evaluacion_ganadera_rcia_Ajax.php',
                type:  'post',
                beforeSend: function () {
                 //$("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response1) {
                  debugger;
                   // alert('resp:'+response1);
                    response1 = response1.substring(0, response1.length - 1);
                    resultado1=response1.split("|");
                    ii=0;
                    for(i=0; i<resultado1.length;i++){
                        // alert(resultado1[i]);

                        if((resultado1[i]==1 && idperiodo==1) || (resultado1[i]==3 && idperiodo==2)){
                             if(document.getElementById("v_c_idbtn1")){
                                butt1 = document.getElementById("v_c_idbtn1");
                                butt1.disabled = false;
                                if(i==0 && document.getElementById('anhoActivoVC').value==0)  {
                                    document.getElementById('v_c_idbtn1').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345;padding: 8px 11px; ');
                                    document.getElementById('anhoActivoVC').value=resultado1[i];
                                    document.getElementById('anhoActivoVC2').value=resultado1[i];

                                }
                                document.getElementById('v_c_idbtn1').value=resultado1[i];
                                if(ii==0){
                                    document.getElementById('v_c_idbtn1').click();
                                    // alert('v_c_idbtn1');
                                }
                                ii++;
                            }
                            if(document.getElementById("v_c_idbtn1_")){
                                butt11 = document.getElementById("v_c_idbtn1_");
                                butt11.disabled = false;
                                 if(i==0 && document.getElementById('anhoActivoVC').value==0 )  {
                                   document.getElementById('v_c_idbtn1_').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345; padding: 8px 11px; ');
                                   document.getElementById('anhoActivoVC').value=resultado1[i];
                                   document.getElementById('anhoActivoVC2').value=resultado1[i];

                                 }
                                 document.getElementById('v_c_idbtn1_').value=resultado1[i];
                                  if(ii==0){
                                  document.getElementById('v_c_idbtn1_').click();
                                   //alert('v_c_idbtn1_');
                                }
                                ii++;
                            }
                        }
                      if((resultado1[i]==2 && idperiodo==1) || (resultado1[i]==4 && idperiodo==2)){
                             if(document.getElementById("v_c_idbtn2")){
                                but2 = document.getElementById("v_c_idbtn2");
                                but2.disabled = false;
                                if(i==0 && document.getElementById('anhoActivoVC').value==0 )  {
                                    document.getElementById('v_c_idbtn2').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345; padding: 8px 11px;');
                                    document.getElementById('anhoActivoVC').value=resultado1[i];
                                    document.getElementById('anhoActivoVC2').value=resultado1[i];

                                }
                                document.getElementById('v_c_idbtn2').value=resultado1[i];
                                 if(ii==0){
                                   // alert('v_c_idbtn2');
                                   document.getElementById('v_c_idbtn2').click();
                                 }
                                ii++;
                             }
                            if(document.getElementById("v_c_idbtn2_")){
                                but22 = document.getElementById("v_c_idbtn2_");
                                but22.disabled = false;
                                if(i==0 && document.getElementById('anhoActivoVC').value==0 )  {
                                   document.getElementById('v_c_idbtn2_').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345; padding: 8px 11px;');
                                   document.getElementById('anhoActivoVC').value=resultado1[i];
                                   document.getElementById('anhoActivoVC2').value=resultado1[i];

                                 }
                                 document.getElementById('v_c_idbtn2_').value=resultado1[i];
                                  if(ii==0){
                                     // alert('v_c_idbtn2_');
                                      document.getElementById('v_c_idbtn2_').click();
                                 }
                                ii++;
                             }

                        }
                       if((resultado1[i]==3 && idperiodo==1) || (resultado1[i]==5 && idperiodo==2)){
                             if(document.getElementById("v_c_idbtn3")){
                                 but3 = document.getElementById("v_c_idbtn3");
                                 but3.disabled = false;
                                   if(i==0 && document.getElementById('anhoActivoVC').value==0 )  {
                                    document.getElementById('v_c_idbtn3').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345; padding: 8px 11px;');
                                    document.getElementById('anhoActivoVC').value=resultado1[i];
                                    document.getElementById('anhoActivoVC2').value=resultado1[i];

                                 }
                                  document.getElementById('v_c_idbtn3').value=resultado1[i];
                                   if(ii==0){
                                     //alert('v_c_idbtn3');
                                       document.getElementById('v_c_idbtn3').click();
                                     }
                                ii++;
                            }
                            if(document.getElementById("v_c_idbtn3_")){
                                but33 = document.getElementById("v_--c_idbtn3_");
                                but33.disabled = false;

                                 if(i==0 && document.getElementById('anhoActivoVC').value==0 )  {
                                   document.getElementById('v_c_idbtn3_').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345;padding: 8px 11px; ');
                                   document.getElementById('anhoActivoVC').value=resultado1[i];
                                   document.getElementById('anhoActivoVC2').value=resultado1[i];

                                 }
                                 document.getElementById('v_c_idbtn3_').value=resultado1[i];
                                 if(ii==0){
                                    //alert('v_c_idbtn3_');
                                     document.getElementById('v_c_idbtn3_').click();
                                   }
                                ii++;
                            }
                        }

                       if((resultado1[i]==4 && idperiodo==1) || (resultado1[i]==6 && idperiodo==2)){
                            if(document.getElementById("v_c_idbtn4")){
                                  but4 = document.getElementById("v_c_idbtn4");
                                  but4.disabled = false;
                                   if(i==0 && document.getElementById('anhoActivoVC').value==0)  {
                                    document.getElementById('v_c_idbtn4').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345;padding: 8px 11px;');
                                    document.getElementById('anhoActivoVC').value=resultado1[i];
                                    document.getElementById('anhoActivoVC2').value=resultado1[i];

                                 }
                                 document.getElementById('v_c_idbtn4').value=resultado1[i];
                                 if(ii==0){
                                   // alert('v_c_idbtn4');
                                    document.getElementById('v_c_idbtn4').click();
                                 }
                                ii++;
                            }
                            if(document.getElementById("v_c_idbtn4_")){
                                 but44 = document.getElementById("v_c_idbtn4_");
                                 but44.disabled = false;
                                  if(i==0 && document.getElementById('anhoActivoVC').value==0)  {
                                   document.getElementById('v_c_idbtn4_').setAttribute('style', 'cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;');
                                   document.getElementById('anhoActivoVC').value=resultado1[i];
                                   document.getElementById('anhoActivoVC2').value=resultado1[i];

                                 }
                                 document.getElementById('v_c_idbtn4_').value=resultado1[i];
                                 if(ii==0){
                                  //alert('v_c_idbtn4_');
                                   document.getElementById('v_c_idbtn4_').click();
                                  }
                                ii++;
                            }
                        }
                       if((resultado1[i]==5 && idperiodo==1) || (resultado1[i]==7 && idperiodo==2)){
                            if(document.getElementById("v_c_idbtn5")){
                               but5 = document.getElementById("v_c_idbtn5");
                              but5.disabled = false;
                               if(i==0 && document.getElementById('anhoActivo').value==0 )  {
                                    document.getElementById('v_c_idbtn5').setAttribute('style', 'cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;');
                                    document.getElementById('anhoActivoVC').value=resultado1[i];
                                    document.getElementById('anhoActivoVC2').value=resultado1[i];

                                 }
                                document.getElementById('v_c_idbtn5').value=resultado1[i];
                                 if(ii==0){
                                  //alert('v_c_idbtn5');
                                   document.getElementById('v_c_idbtn5').click();
                                  }
                                ii++;
                            }
                            if(document.getElementById("v_c_idbtn5_")){
                                 but55 = document.getElementById("v_c_idbtn5_");
                                but55.disabled = false;
                                 if(i==0 && document.getElementById('anhoActivo').value==0)  {
                                   document.getElementById('v_c_idbtn5_').setAttribute('style', 'cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;');
                                   document.getElementById('anhoActivoVC').value=resultado1[i];
                                   document.getElementById('anhoActivoVC2').value=resultado1[i];

                                 }
                                 document.getElementById('v_c_idbtn5_').value=resultado1[i];
                                 if(ii==0){
                                   //alert('v_c_idbtn5_');
                                    document.getElementById('v_c_idbtn5_').click();
                                   }
                                ii++;
                            }
                        }
                    }
                }
        });
       //alert('entroo año2');
}*/
function establecer_anosVC(){
    window.scrollBy(0, -1000);
        if(document.getElementById("v_c_idbtn1")){
            butt1 = document.getElementById("v_c_idbtn1");
            butt1.disabled = true;
        }

       if(document.getElementById("v_c_idbtn1_")){
           butt11 = document.getElementById("v_c_idbtn1_");
           butt11.disabled = true;
        }
        if(document.getElementById("v_c_idbtn2")){
            but2 = document.getElementById("v_c_idbtn2");
            but2.disabled = true;
         }
        if(document.getElementById("v_c_idbtn2_")){
            but22 = document.getElementById("v_c_idbtn2_");
            but22.disabled = true;
            }

        if(document.getElementById("v_c_idbtn3")){
                but3 = document.getElementById("v_c_idbtn3");
                but3.disabled = true;
         }
        if(document.getElementById("v_c_idbtn3_")){
            but33 = document.getElementById("v_c_idbtn3_");
            but33.disabled = true;
        }
        if(document.getElementById("v_c_idbtn4")){
                but4 = document.getElementById("v_c_idbtn4");
                but4.disabled = true;
        }
        if(document.getElementById("v_c_idbtn4_")){
                but44 = document.getElementById("v_c_idbtn4_");
                but44.disabled = true;
        }
        if(document.getElementById("v_c_idbtn5")){
            but5 = document.getElementById("v_c_idbtn5");
            but5.disabled = true;
        }
        if(document.getElementById("v_c_idbtn5_")){
            but55 = document.getElementById("v_c_idbtn5_");
            but55.disabled = true;
        }
        var idperiodo=document.getElementById('idperiodo').value;
          var parametros = {
            "tarea" : "establecerAnos"
        };
        $.ajax({
                data:  parametros,
                url:   'evaluacion_ganadera_verificacion_campo_Ajax.php',
                type:  'post',
                beforeSend: function () {
                      //  $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response1) {
                  debugger;
                   // alert('resp:'+response1);
                    response1 = response1.substring(0, response1.length - 1);
                    resultado1=response1.split("|");

                    for(i=0; i<resultado1.length;i++){
                        // alert(resultado1[i]);

                       if((resultado1[i]==1 && idperiodo==1) || (resultado1[i]==3 && idperiodo==2)){
                             if(document.getElementById("v_c_idbtn1")){
                                butt1 = document.getElementById("v_c_idbtn1");
                                butt1.disabled = false;
                                if(i==0 && document.getElementById('anhoActivoVC').value==0)  {
                                    document.getElementById('v_c_idbtn1').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345;padding: 8px 11px; ');
                                    document.getElementById('anhoActivoVC').value=resultado1[i];
                                    document.getElementById('anhoActivoVC2').value=resultado1[i];
                                }
                                document.getElementById('v_c_idbtn1').value=resultado1[i];
                                // document.getElementById('v_c_idbtn1').click();
                            }
                            if(document.getElementById("v_c_idbtn1_")){
                                butt11 = document.getElementById("v_c_idbtn1_");
                                butt11.disabled = false;
                                 if(i==0 && document.getElementById('anhoActivoVC').value==0 )  {
                                   document.getElementById('v_c_idbtn1_').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345; padding: 8px 11px; ');
                                   document.getElementById('anhoActivoVC').value=resultado1[i];
                                   document.getElementById('anhoActivoVC2').value=resultado1[i];
                                 }
                                 document.getElementById('v_c_idbtn1_').value=resultado1[i];
                                // document.getElementById('v_c_idbtn1_').click();
                            }
                        }
                      if((resultado1[i]==2 && idperiodo==1) || (resultado1[i]==4 && idperiodo==2)){
                             if(document.getElementById("v_c_idbtn2")){
                                but2 = document.getElementById("v_c_idbtn2");
                                but2.disabled = false;
                                if(i==0 && document.getElementById('anhoActivoVC').value==0 )  {
                                    document.getElementById('v_c_idbtn2').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345; padding: 8px 11px;');
                                    document.getElementById('anhoActivoVC').value=resultado1[i];
                                    document.getElementById('anhoActivoVC2').value=resultado1[i];
                                }
                                document.getElementById('v_c_idbtn2').value=resultado1[i];
                             }
                            if(document.getElementById("v_c_idbtn2_")){
                                but22 = document.getElementById("v_c_idbtn2_");
                                but22.disabled = false;
                                if(i==0 && document.getElementById('anhoActivoVC').value==0 )  {
                                   document.getElementById('v_c_idbtn2_').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345; padding: 8px 11px;');
                                   document.getElementById('anhoActivoVC').value=resultado1[i];
                                   document.getElementById('anhoActivoVC2').value=resultado1[i];
                                 }
                                 document.getElementById('v_c_idbtn2_').value=resultado1[i];
                             }
                        }
                   if((resultado1[i]==3 && idperiodo==1) || (resultado1[i]==5 && idperiodo==2)){
                             if(document.getElementById("v_c_idbtn3")){
                                 but3 = document.getElementById("v_c_idbtn3");
                                 but3.disabled = false;
                                   if(i==0 && document.getElementById('anhoActivoVC').value==0 )  {
                                    document.getElementById('v_c_idbtn3').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345; padding: 8px 11px;');
                                    document.getElementById('anhoActivoVC').value=resultado1[i];
                                    document.getElementById('anhoActivoVC2').value=resultado1[i];
                                 }
                                  document.getElementById('v_c_idbtn3').value=resultado1[i];
                            }
                            if(document.getElementById("v_c_idbtn3_")){
                                but33 = document.getElementById("v_c_idbtn3_");
                                but33.disabled = false;

                                 if(i==0 && document.getElementById('anhoActivoVC').value==0 )  {
                                   document.getElementById('v_c_idbtn3_').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345;padding: 8px 11px; ');
                                   document.getElementById('anhoActivoVC').value=resultado1[i];
                                   document.getElementById('anhoActivoVC2').value=resultado1[i];
                                 }
                                 document.getElementById('v_c_idbtn3_').value=resultado1[i];
                            }
                        }

                      if((resultado1[i]==4 && idperiodo==1) || (resultado1[i]==6 && idperiodo==2)){
                            if(document.getElementById("v_c_idbtn4")){
                                  but4 = document.getElementById("v_c_idbtn4");
                                  but4.disabled = false;
                                   if(i==0 && document.getElementById('anhoActivoVC').value==0)  {
                                    document.getElementById('v_c_idbtn4').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345;padding: 8px 11px;');
                                    document.getElementById('anhoActivoVC').value=resultado1[i];
                                    document.getElementById('anhoActivoVC2').value=resultado1[i];
                                 }
                                 document.getElementById('v_c_idbtn4').value=resultado1[i];
                            }
                            if(document.getElementById("v_c_idbtn4_")){
                                 but44 = document.getElementById("v_c_idbtn4_");
                                 but44.disabled = false;
                                  if(i==0 && document.getElementById('anhoActivoVC').value==0)  {
                                   document.getElementById('v_c_idbtn4_').setAttribute('style', 'cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;');
                                   document.getElementById('anhoActivoVC').value=resultado1[i];
                                   document.getElementById('anhoActivoVC2').value=resultado1[i];
                                 }
                                 document.getElementById('v_c_idbtn4_').value=resultado1[i];
                            }
                        }
                      if((resultado1[i]==5 && idperiodo==1) || (resultado1[i]==7 && idperiodo==2)){
                            if(document.getElementById("v_c_idbtn5")){
                               but5 = document.getElementById("v_c_idbtn5");
                              but5.disabled = false;
                               if(i==0 && document.getElementById('anhoActivoVC').value==0 )  {
                                    document.getElementById('v_c_idbtn5').setAttribute('style', 'cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;');
                                    document.getElementById('anhoActivoVC').value=resultado1[i];
                                    document.getElementById('anhoActivoVC2').value=resultado1[i];
                                 }
                                document.getElementById('v_c_idbtn5').value=resultado1[i];
                            }
                            if(document.getElementById("v_c_idbtn5_")){
                                 but55 = document.getElementById("v_c_idbtn5_");
                                but55.disabled = false;
                                 if(i==0 && document.getElementById('anhoActivoVC').value==0)  {
                                   document.getElementById('v_c_idbtn5_').setAttribute('style', 'cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;');
                                   document.getElementById('anhoActivoVC').value=resultado1[i];
                                   document.getElementById('anhoActivoVC2').value=resultado1[i];
                                 }
                                 document.getElementById('v_c_idbtn5_').value=resultado1[i];
                            }
                        }
                    }
                }
        });
}
function AcualizarTablaValoracion(){
  $.ajax({
    url:'folder_evaluacion_ganadera_rcia_verificacioncampo/Actualizar_tabla_verificacion_campo.php',
    type:'POST',
    data:{
      idmonitoreo: $("#idmonitoreo").val(),
      listaValoracion: RecogerDatosTabla()
    },
    success: function (data){
      alertify.success('Success: Correcto' );
    }
  });
}
function RecogerDatosTabla(){
  var Result="";
  if($("#idtipopredio").val()=="37"|| $("#idtipopredio").val()=="38"){
    Result=Result+"40!"+$("#v_c_suppastoscultivados").val()+":";
    Result=Result+"41!"+$("#v_c_alimentosuple").val()+":";
    Result=Result+"42!"+$("#v_c_razasmejoradas").val()+":";
    Result=Result+"43!"+$("#v_c_enlisadosforraje").val()+":";
    Result=Result+"44!"+$("#v_c_potrerosalam").val()+":";
    Result=Result+"45!"+$("#v_c_atajados").val()+":";
    Result=Result+"46!"+$("#v_c_corral").val()+":";
    Result=Result+"47!"+$("#v_c_brete").val()+":";
    Result=Result+"48!"+$("#v_c_certificadosenasag").val()+":";
    Result=Result+"50!"+$("#v_c_compraventaganado").val()+":";
    Result=Result+"51!"+$("#v_c_insumospecuarios").val()+":";
  }
  else{
    Result=Result+"40!"+$("#v_c_suppastoscultivados").val()+":";
    Result=Result+"41!"+$("#v_c_alimentosuple").val()+":";
    Result=Result+"42!"+$("#v_c_razasmejoradas").val()+":";
    Result=Result+"43!"+$("#v_c_enlisadosforraje").val()+":";
    Result=Result+"44!"+$("#v_c_potrerosalam").val()+":";
    Result=Result+"45!"+$("#v_c_atajados").val()+":";
    Result=Result+"46!"+$("#v_c_corral").val()+":";
    Result=Result+"47!"+$("#v_c_brete").val()+":";
    Result=Result+"49!"+$("#v_c_certificadosenasag").val()+":";
  }
  return Result;
}
</script>
 <form action="tab_ganadero.php" method="POST" autocomplete="off" name="form-VerfCamp" id="form-VerfCamp" enctype="multipart/form-data" >
     <input id="anhoActivoV_C1_" type="hidden" value="<?php if(isset($_POST['anhoActivoV_C1_']) && ($_POST['anhoActivoV_C1_']>0)){echo $_POST['anhoActivoV_C1_']; }else{echo "0";} ?>" name="anhoActivoV_C1_">
     <input id="anhoActivoV_C2_" type="hidden" value="<?php if(isset($_POST['anhoActivoV_C2_']) ){echo $_POST['anhoActivoV_C2_']; }else{echo "0";} ?> " name="anhoActivoV_C2">

</form>
<input id="anhoActivoVC" type="hidden" value="<?php if(isset($_POST['anhoActivoV_C1_']) && ($_POST['anhoActivoV_C1_']>0)){echo $_POST['anhoActivoV_C1_']; }else{echo "0";} ?>" name="anhoActivoV_C1_">
<input id="anhoActivoVC2" type="hidden" value="<?php if(isset($_POST['anhoActivoV_C2_']) ){echo $_POST['anhoActivoV_C2_']; }else{echo "0";} ?> " name="anhoActivoV_C2_">

<input type="hidden" id="idmonitoreo" value="<?php echo $idmonitoreo2 ?>"></input>
<input type="hidden" id="idtipopredio" value="<?php echo $idTipoPredio ?>"></input>

<table width="90%" border="1" class='taulaA' align="center">
  <tr class="texto_normal">
    <td colspan="2" id='blau'><span class="taulaH">Años de Valoración de Valoración del RCIA</span></td>
  </tr>
  <tr>
    <td colspan="4"></td>
  </tr>
  <tr class="texto_normal">
    <td colspan="2" id='blau9'>
      <table width="100%" border="0">
                <?php
                if ($periodo == 1)
                {
                ?>
                    <tr>
                    <td align="center"  ><button     id="v_c_idbtn1" name ="v_c_idbtn1" <?php if(isset($_POST['anhoActivoV_C1_']) && ($_POST['anhoActivoV_C1_']=='1')){echo " style='cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px; ' "; }else{echo "style='color:#000000;  padding: 8px 11px; ' ";} ?> type="button" value="0"  onClick="javascript:cambiarAnhoVC(this);"  >Año 2014</button></td>
                    <td align="center"  ><button      id="v_c_idbtn2" name ="v_c_idbtn2" <?php if(isset($_POST['anhoActivoV_C1_']) && ($_POST['anhoActivoV_C1_']=='2')){echo " style='cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;' "; }else{echo "style='color:#000000;  padding: 8px 11px; ' ";} ?> type="button" value="0"  onClick="javascript:cambiarAnhoVC(this);" >Año 2015</button></td>
                    <td align="center"  ><button    id="v_c_idbtn3" name ="v_c_idbtn3" <?php if(isset($_POST['anhoActivoV_C1_']) && ($_POST['anhoActivoV_C1_']=='3')){echo " style='cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;' ";  }else{echo "style='color:#000000;  padding: 8px 11px;' ";} ?> type="button" value="0"  onClick="javascript:cambiarAnhoVC(this);" >Año 2016</button></td>
                    <td align="center"  ><button    id="v_c_idbtn4" name ="v_c_idbtn4" <?php if(isset($_POST['anhoActivoV_C1_']) && ($_POST['anhoActivoV_C1_']=='4')){echo " style='cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;' "; }else{echo "style='color:#000000;  padding: 8px 11px;' ";} ?> type="button" value="0"  onClick="javascript:cambiarAnhoVC(this);" >Año 2017</button></td>
                    <td align="center"  ><button     id="v_c_idbtn5" name ="v_c_idbtn5" <?php if(isset($_POST['anhoActivoV_C1_']) && ($_POST['anhoActivoV_C1_']=='5')){echo " style='cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;' "; }else{echo "style='color:#000000;  padding: 8px 11px;' ";} ?> type="button" value="0"  onClick="javascript:cambiarAnhoVC(this);" >Año 2018</button></td>
                    </tr>

                <?php
                }
                elseif ($periodo == 2)
                {
                ?>
                    <tr>
                    <td align="center"   ><button      id="v_c_idbtn1_" name="v_c_idbtn1_" <?php if(isset($_POST['anhoActivoV_C1_']) && ($_POST['anhoActivoV_C1_']=='Año 2016')){echo " style='cursor:pointer;color:#000000;  background-color: #7fc345; padding: 8px 11px;' "; }else{echo "style='color:#000000;  padding: 8px 11px;' ";} ?>  onClick="javascript:cambiarAnhoVC(this);" type="button" value="0">Año 2016</button></td>
                    <td align="center"   ><button      id="v_c_idbtn2_" name="v_c_idbtn2_" <?php if(isset($_POST['anhoActivoV_C1_']) && ($_POST['anhoActivoV_C1_']=='Año 2017')){echo " style='cursor:pointer;color:#000000;  background-color: #7fc345; padding: 8px 11px;' "; }else{echo "style='color:#000000;  padding: 8px 11px;' ";} ?>  onClick="javascript:cambiarAnhoVC(this);" type="button" value="0">Año 2017</button></td>
                    <td align="center"   ><button     id="v_c_idbtn3_" name="v_c_idbtn3_" <?php if(isset($_POST['anhoActivoV_C1_']) && ($_POST['anhoActivoV_C1_']=='Año 2018')){echo " style='cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;' "; }else{echo "style='color:#000000;  padding: 8px 11px;' ";} ?>   onClick="javascript:cambiarAnhoVC(this);"  type="button" value="0">Año 2018</button></td>
                    <td align="center"   ><button    id="v_c_idbtn4_" name="v_c_idbtn4_" <?php if(isset($_POST['anhoActivoV_C1_']) && ($_POST['anhoActivoV_C1_']=='Año 2019')){echo " style='cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;' "; }else{echo "style='color:#000000;  padding: 8px 11px;' ";} ?>  onClick="javascript:cambiarAnhoVC(this);" type="button" value="0">Año 2019</button></td>
                    <td align="center"   ><button     id="v_c_idbtn5_" name="v_c_idbtn5_"  <?php if(isset($_POST['anhoActivoV_C1_']) && ($_POST['anhoActivoV_C1_']=='Año 2020')){echo " style='cursor:pointer;color:#000000;  background-color: #7fc345;padding: 8px 11px;' "; }else{echo "style='color:#000000;  padding: 8px 11px;' ";} ?>    onClick="javascript:cambiarAnhoVC(this);" type="button" value="0">Año 2020</button></td>
                    </tr>
                <?php
                } ?>
      </table>
    </td>
  </tr>
  <tr>
    <td height="14" colspan="4" id='blau'><span class="taulaH">2. Tabla de Valoración Ganadera RCIA</span></td>
  </tr>
  <?php
    if($idTipoPredio==37 || $idTipoPredio==38){ //pequeña - comunidad
  ?>
      <tr>
      <td>
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
                        <tr>
                          <td id="eg1" name="eg1" type="text"> Superficie pastos cultivados de piso y/o corte (ha). </td>
                          <td  id="vg1" name="vg1" value="30" >30</td>
                          <td id="ee1" name="ee1" >Superficie pastos cultivados de piso y/o corte (ha).</td>
                          <td  id="ve1" name="ve1" >30</td>
                          <td><input name="v_c_suppastoscultivados" id="v_c_suppastoscultivados" type="text" class="boxBusqueda4" value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>" onKeyUp="extractNumber(this,0,false);promediar(this,30);" onKeyPress="return blockNonNumbers(this, event, true, false); "  onblur="sumatoria_ganadero(); "  ></td>
                        </tr>
                        <tr>
                          <td id="eg2" name="eg2" rowspan = "3" >Aplicación de técnicas y tecnologías sostenibles: (1 Técnica = 30 %; 2 Técnicas = 70 %; 3 Técnicas = 100%) </td><td id="vg2" name="vg2" rowspan = "3">10</td>
                          <td  id="ee2" name="ee2" >Uso de alimentos suplementarios</td><td id="ve2" name="ve2"  rowspan = "3">10</td>
                          <td><input name="v_c_alimentosuple" id="v_c_alimentosuple" type="text" class="boxBusqueda4" value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>"  onKeyUp="extractNumber(this,0,false); sumatoria_ganadero2(this,10);" onKeyPress="return blockNonNumbers(this, event, true, false); " onblur="sumatoria_ganadero2(this,10);"  onchange="sumatoria_ganadero(); "></td>
                        </tr>
                        <tr>
                          <td id="ee3" name="ee3">Razas mejoradas</td>
                          <td><input name="v_c_razasmejoradas" id="v_c_razasmejoradas" type="text" class="boxBusqueda4" value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>" onKeyUp="extractNumber(this,0,false); sumatoria_ganadero2(this,10);" onKeyPress="return blockNonNumbers(this, event, true, false);" onblur="sumatoria_ganadero2(this,10); "    ></td>
                        </tr>
                        <tr>
                          <td id="ee4" name="ee4" >Ensilado de forrajes</td>
                          <td><input name="v_c_enlisadosforraje" id="v_c_enlisadosforraje" type="text" class="boxBusqueda4" value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>"  onKeyUp="extractNumber(this,0,false); sumatoria_ganadero2(this,10);" onKeyPress="return blockNonNumbers(this, event, true, false);" onblur="sumatoria_ganadero2(this,10);"></td>
                        </tr>
                        <tr>
                          <td id="eg3" name="eg3" rowspan = "4">Potreros con alambrada en el área deforestada s/autorización e instalación de saleros. </td>
                          <td id="vg3" name="vg3" rowspan = "4">20</td><td id="ee5" name="ee5" >Potreros alambrados, Cercas Eléctricas, saleros </td>
                          <td>4</td>
                          <td><input name="v_c_potrerosalam" id="v_c_potrerosalam"  type="text" class="boxBusqueda4"  value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>" onKeyUp="extractNumber(this,0,false);promediar(this,4);" onKeyPress="return blockNonNumbers(this, event, true, false);" onblur="sumatoria_ganadero();   "></td>
                        </tr>
                        <tr>
                          <td id="ee6" name="ee6" >atajados, pozos, noques, tanques, bebederos</td>
                          <td>4</td>
                          <td><input name="v_c_atajados" id="v_c_atajados" type="text" class="boxBusqueda4"  onKeyUp="extractNumber(this,0,false);promediar(this,4);" value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>"onKeyPress="return blockNonNumbers(this, event, true, false);sumatoria_ganadero();" onblur="sumatoria_ganadero(); "   ></td>
                        </tr>
                        <tr>
                          <td id="ee7" name="ee7" >corral </td>
                          <td>6</td>
                          <td><input name="v_c_corral" id="v_c_corral"  type="text" class="boxBusqueda4"  onKeyUp="extractNumber(this,0,false);promediar(this,6);" value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>" onKeyPress="return blockNonNumbers(this, event, true, false); " onblur="sumatoria_ganadero(); "   ></td>
                        </tr>
                        <tr>
                          <td id="ee8" name="ee8" >brete, Cepo, balanza, cargadero</td><td>6</td>
                          <td><input name="v_c_brete"  id="v_c_brete" type="text" class="boxBusqueda4" value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>" onKeyUp="extractNumber(this,0,false);promediar(this,6); " onKeyPress="return blockNonNumbers(this, event, true, false);" onblur="sumatoria_ganadero(); "   ></td>
                        </tr>
                        <tr>
                          <td id="eg4" name="eg4" rowspan = "3" >Total cabezas de  ganado mayor en el área deforestada. (Relación directa de acuerdo a metas programadas)</td>
                          <td rowspan = "3">40</td>
                          <td  id="ee9" name="ee9" >Certificación de Vacunación del SENASAG.</td>
                          <td>15</td>
                          <td><input name="v_c_certificadosenasag" id="v_c_certificadosenasag"  type="text" class="boxBusqueda4" value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>" onKeyUp="extractNumber(this,0,false);promediar(this,15);" onKeyPress="return blockNonNumbers(this, event, true, false);" onblur="sumatoria_ganadero(); "    ></td>
                        </tr>
                        <tr>
                          <td id="ee10" name="ee10" >Compra y Venta de animales.</td>
                          <td>15</td>
                          <td><input name="v_c_compraventaganado" id="v_c_compraventaganado" type="text" class="boxBusqueda4"  onKeyUp="extractNumber(this,0,false);promediar(this,15);" value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>" onKeyPress="return blockNonNumbers(this, event, true, false);" onblur="sumatoria_ganadero(); "    > </td>
                        </tr>
                        <tr>
                          <td id="ee11" name="ee11" >Insumos pecuarios.</td>
                          <td>10</td>
                          <td><input name="v_c_insumospecuarios" id="v_c_insumospecuarios" type="text" class="boxBusqueda4"  value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>" onKeyUp="extractNumber(this,0,false);promediar(this,10);" onKeyPress="return blockNonNumbers(this, event, true, false);" onblur="sumatoria_ganadero(); "   ></td>
                        </tr>
                        <tr>
                          <td colspan = "4">PUNTUACION FINAL</td>
                          <td><input name="v_c_puntuacionfinal" id="v_c_puntuacionfinal"  disabled type="text" class="boxBusqueda4"  value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>" onKeyUp="extractNumber(this,0,false);sumatoria_ganadero();" onKeyPress="return blockNonNumbers(this, event, true, false);" onblur="sumatoria_ganadero(); "   ></td>
                        </tr>
                      </tbody>
               </table>
    </td>
    </tr>
  <?php
    }else{
  ?>
    <tr>
      <td>
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
                        <tr>
                          <td id="eg1" name="eg1" type="text"> Superficie pastos cultivados de piso y/o corte (ha). </td>
                          <td  id="vg1" name="vg1" value="30" >30</td>
                          <td id="ee1" name="ee1" >Superficie pastos cultivados de piso y/o corte (ha).</td>
                          <td  id="ve1" name="ve1">30</td>
                          <td><input name="v_c_suppastoscultivados" id="v_c_suppastoscultivados" type="text" class="boxBusqueda4" value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>" onKeyUp="extractNumber(this,0,false);promediar(this,30);" onKeyPress="return blockNonNumbers(this, event, true, false); "  onblur="sumatoria_ganadero(); "  ></td>
                        </tr>
                        <tr>
                          <td id="eg2" name="eg2" rowspan="3">Aplicación de técnicas y tecnologías sostenibles: (1 Técnica = 30 %; 2 Técnicas = 70 %; 3 Técnicas = 100%)</td>
                          <td id="vg2" name="vg2" rowspan = "3">10</td>
                          <td  id="ee2" name="ee2" >Uso de alimentos suplementarios</td>
                          <td id="ve2" name="ve2"  rowspan = "3">10</td>
                          <td><input name="v_c_alimentosuple" id="v_c_alimentosuple" type="text" class="boxBusqueda4" value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>"  onKeyUp="extractNumber(this,0,false); sumatoria_ganadero2(this,10);" onKeyPress="return blockNonNumbers(this, event, true, false); " onblur="sumatoria_ganadero2(this,10);"  onchange="sumatoria_ganadero(); "></td>
                        </tr>
                        <tr>
                          <td id="ee3" name="ee3">Razas mejoradas</td>
                          <td><input name="v_c_razasmejoradas" id="v_c_razasmejoradas" type="text" class="boxBusqueda4" value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>" onKeyUp="extractNumber(this,0,false); sumatoria_ganadero2(this,10);" onKeyPress="return blockNonNumbers(this, event, true, false);" onblur="sumatoria_ganadero2(this,10); "    ></td>
                        </tr>
                        <tr>
                          <td id="ee4" name="ee4" >Ensilado de forrajes</td>
                          <td><input name="v_c_enlisadosforraje" id="v_c_enlisadosforraje" type="text" class="boxBusqueda4" value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>"  onKeyUp="extractNumber(this,0,false); sumatoria_ganadero2(this,10);" onKeyPress="return blockNonNumbers(this, event, true, false);" onblur="sumatoria_ganadero2(this,10); "   ></td>
                        </tr>
                        <tr>
                          <td id="eg3" name="eg3" rowspan = "4">Potreros con alambrada en el área deforestada s/autorización e instalación de saleros. </td>
                          <td id="vg3" name="vg3" rowspan = "4">20</td>
                          <td id="ee5" name="ee5" >Potreros alambrados, Cercas Eléctricas, saleros </td>
                          <td>4</td>
                          <td><input name="v_c_potrerosalam" id="v_c_potrerosalam"  type="text" class="boxBusqueda4"  value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>" onKeyUp="extractNumber(this,0,false);promediar(this,4);" onKeyPress="return blockNonNumbers(this, event, true, false);" onblur="sumatoria_ganadero();   "></td>
                        </tr>
                        <tr>
                          <td id="ee6" name="ee6" >atajados, pozos, noques, tanques, bebederos</td>
                          <td>4</td>
                          <td><input name="atajados" id="v_c_atajados" type="text" class="boxBusqueda4"  onKeyUp="extractNumber(this,0,false);promediar(this,4);" value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>"onKeyPress="return blockNonNumbers(this, event, true, false);sumatoria_ganadero();" onblur="sumatoria_ganadero(); "   ></td>
                        </tr>
                        <tr>
                          <td id="ee7" name="ee7" >corral</td>
                          <td>6</td>
                          <td><input name="v_c_corral" id="v_c_corral"  type="text" class="boxBusqueda4"  onKeyUp="extractNumber(this,0,false);promediar(this,6);" value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>" onKeyPress="return blockNonNumbers(this, event, true, false); " onblur="sumatoria_ganadero(); "   ></td></tr>
                        <tr>
                          <td id="ee8" name="ee8" >brete, Cepo, balanza, cargadero</td>
                          <td>6</td>
                          <td><input name="v_c_brete"  id="v_c_brete" type="text" class="boxBusqueda4" value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>" onKeyUp="extractNumber(this,0,false);promediar(this,6); " onKeyPress="return blockNonNumbers(this, event, true, false);" onblur="sumatoria_ganadero(); "   ></td>
                        </tr>
                        <tr>
                          <td id="eg4" name="eg4" rowspan = "0" >Total cabezas de  ganado mayor en el área deforestada. (Relación directa de acuerdo a metas programadas)</td>
                          <td rowspan = "0">40</td>
                          <td  id="ee9" name="ee9" >Certificación de Vacunación del SENASAG.</td>
                          <td>40</td>
                          <td><input name="v_c_certificadosenasag" id="v_c_certificadosenasag"  type="text" class="boxBusqueda4" value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>" onKeyUp="extractNumber(this,0,false);promediar(this,40);" onKeyPress="return blockNonNumbers(this, event, true, false);" onblur="sumatoria_ganadero();"></td>
                        </tr>
                        <tr>
                          <td colspan = "2">PUNTUACION FINAL</td>
                          <td><input name="v_c_puntuacionfinal" id="v_c_puntuacionfinal"  disabled type="text" class="boxBusqueda4"  value="<?php  if( $row_detallePtos= pg_fetch_array ($rcia_detEvaluacion)){ echo $row_detallePtos["puntuacion"];  }  ?>" onKeyUp="extractNumber(this,0,false);sumatoria_ganadero();" onKeyPress="return blockNonNumbers(this, event, true, false);" onblur="sumatoria_ganadero(); "   ></td>
                        </tr>
                       </tbody>

               </table>
    </td>
    </tr>
  <?php
    }
  ?>
</table>
<table>
  <tr>
    <input class="boton verde formaBoton" type="button" value="Guardar" onclick="AcualizarTablaValoracion()" >
  </tr>
  <tr>
    <a></a>
  </tr>
  <tr>
    <!--<form action="evaluacion_ganadera_rcia33.php" method="post" name="form" >
      <input name='Imprimir' type='submit' class='boton verde formaBoton' id='Imprimir' value='Imprimir Evaluacion'>
      <input id="anoact" type="hidden" value="<?php //echo $_POST['anhoActivo_'];?>" name="anoact">
      <input id="reg" type="hidden" value="<?php //echo $_SESSION['idreg'];?>" name="reg">
      <input id="monit" type="hidden" value="<?php //echo $monit;?>" name="monit">
    </form>-->
  </tr>
</table>
