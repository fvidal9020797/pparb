<?php
session_start();
/* include "destroy_predio.php"; */
include "../valid.php";
$mensaje = "";

include "../reportes/sqlConsulta.php";
$getSql = new sqlConsulta();


include "../reportes/reporte_predio_agricola.php";
include "../reportes/reporte_predio_ganadero.php";
include "../reportes/reporte_predio_mixto.php";
include "../reportes/reporte_predio_refcon.php";
include "../reportes/reporte_predio_rechazado.php";
include "../reportes/reporte_predio_avicola.php";
include "../reportes/reporte_predio_porcino.php";
include "../reportes/reporte_predio_agricola739.php";
include "../reportes/reporte_predio_ganadero739.php";
include "../reportes/reporte_predio_mixto739.php";
include "../reportes/reporte_predio_avicola739.php";
include "../reportes/reporte_predio_porcino739.php";

//include "../Valid.php";

if(isset($_REQUEST['Imprimir_y']))
{

    $CodParcelas = $_REQUEST['codpar'];
    $sql_info = "select * from v_parcela where idparcela = '".$CodParcelas."'";

    $infocomp = $getSql->ejecutarSql($sql_info);
    $row_info = pg_fetch_array($infocomp);


    $CodReg = $row_info['idregistro'];
    $TipoPropiedad = $row_info['clasificacionprog'];
    $EstadoRegistroI = $row_info['estado'];


  /* ################### verificacion de fechasuscripcion############# */
  $sql_suscripcion = "SELECT r.idregistro, fecharegistro, fechasuscripcion
from registro as r full join fechasregistro as fr on r.idregistro = fr.idregistro
where r.idregistro =".$CodReg;

  $resultSuscripcion = pg_query($cn,$sql_suscripcion) ;
  //$row_Suscripcion = pg_fetch_array ($resultSuscripcion);

  $row_Suscripcion = $getSql->ejecutarSql($resultSuscripcion);

  $fechasuscripcion = $row_Suscripcion['fechasuscripcion']; //from db
  echo "fecha subcripcion registro ".$fechasuscripcion;
  $periodo1_time = date($today="2015-09-29");


$periodo=2;
if ($fechasuscripcion!="") {
$predio_time = Date('Y-m-d', strtotime($fechasuscripcion));
if($periodo1_time > $predio_time){
  $periodo=1;
}
}

  if (strcmp($EstadoRegistroI, "RECHAZADO") == 0) { //PREDIO RECHAZADO
    if ($periodo==1) {
      # code...
      ImprimirPredioRechazado($CodParcelas);
      }
      if ($periodo==2) {
      ImprimirPredioRechazado($CodParcelas);
  }
  }

  else{	//IMPRESION NORMAL
    switch ($TipoPropiedad) {

    case "Agricola":
    if ($periodo==1) {
      ImprimirPredioAgricola($CodParcelas);
        }
    if ($periodo==2) {
      ImprimirPredioAgricola739($CodParcelas);
        }
    break;

    case "Ganadera":
if ($periodo==1) {
      ImprimirPredioGanadero($CodParcelas);
    }
    if ($periodo==2) {
      ImprimirPredioGanadero739($CodParcelas);
    }
    break;

    case "Mixta Agropecuaria":
if ($periodo==1) {
      ImprimirPredioMixto($CodParcelas);
    }
    if ($periodo==2) {
      ImprimirPredioMixto739($CodParcelas);
    }
    break;

    case "Ganadera Lechera":
if ($periodo==1) {
      ImprimirPredioMixto($CodParcelas);
    }
    if ($periodo==2) {
      ImprimirPredioMixto739($CodParcelas);
    }
    break;

    case "Reforestacion y/o Proteccion":
    if ($periodo==1) {
      ImprimirPredioRefCon($CodParcelas);
    }
    if ($periodo==2) {
      ImprimirPredioRefCon($CodParcelas);
    }
    break;

    case "Forestal":
  if ($periodo==1) {
      ImprimirPredioRefCon($CodParcelas);
    }

  if ($periodo==2) {
      ImprimirPredioRefCon($CodParcelas);
    }
    break;

    case "Otras Actividades":
  if ($periodo==1) {
      ImprimirPredioRefCon($CodParcelas);
    }

  if ($periodo==2) {
      ImprimirPredioRefCon($CodParcelas);
    }
    break;

    case "Agricola-Avicola":
    if ($periodo==1) {
      ImprimirPredioAvicola($CodParcelas);
    }
    if ($periodo==2) {
      ImprimirPredioAvicola739($CodParcelas);
    }
    break;

    case "Agricola-Porcina":
    if ($periodo==1) {
      ImprimirPredioPorcino($CodParcelas);
    }
    if ($periodo==2) {
      ImprimirPredioPorcino739($CodParcelas);
    }
    break;

    default:
    }
  }

}



if (isset($_REQUEST['historial'])) {
    $codParcela = $_REQUEST['codParcela'];
    $sql = "Select * FROM report_general  where \"ID PARCELA\"='" . $codParcela . "'";
    $resultadoSql = $getSql->ejecutarSql($sql);
    $codRegistro = "";

    $sqlaa = "select * from v_parcela as r inner join agenteauxiliar as aa on r.numregprof = aa.numregprof where r.idparcela ='" . $codParcela . "'";
    $ressqlaa = $getSql->ejecutarSql($sqlaa);
    $registroaa = pg_fetch_array($ressqlaa);


    ?>
    <!DOCTYPE html>
    <HTML>
        <HEAD><TITLE>Reporte</TITLE>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <link href="../css/mdryt.css" type="text/css" rel="stylesheet">
            <link rel="stylesheet" href="../css/jquery-ui.css">
            <script src="../libraries/jquery-ui-1.10.2/jquery-1.9.1.js"></script>
            <script src="../scripts/jquery-ui.js"></script>
            <link rel="stylesheet" href="/resources/demos/style.css">
            <script src="../libraries/jquery-ui-1.10.2/ui/jquery.ui.core.js"></script>
            <script src="../libraries/jquery-ui-1.10.2/ui/jquery.ui.widget.js"></script>
            <script src="../libraries/jquery-ui-1.10.2/ui/jquery.ui.datepicker.js"></script>
            <script src="../scripts/politico.js"></script>
            <script src="../scripts/checkall.js"></script>
            <link rel="stylesheet" type="text/css" href="../css/button.css" />


            <script>
                $(document).ready(function() {
                    $('#form').submit(function() {
                        // show that something is loading
                        $('#response').html("");
                    });

                });

            </script>

            <script>
                $(function() {
                    $("#tabs").tabs({
                    });
                    $("#tabs ul li a").click(function() {
                        document.getElementById("carga").innerHTML = '';
                    });
                    $("#send").click(function() {
                        document.getElementById("carga").innerHTML = '';
                    });
                });

            </script>
        </head>

        <BODY>
            <div class="menubar-main" align="center">

                  <div class="" align="center">

                      <div id="general_filter1">
                                <fieldset>

                                    <?php

                                    while ($registro = pg_fetch_array($resultadoSql)) {
                                        $codRegistro = $registro["ID REGISTRO"];

                                        ?>
                                        <div class="CSSTable" >
                                            <table >
                                                <tr>

                                                    <td >
                                                        <h1 align="center" style=" margin: 0px" >
                                                            DATOS GENERALES DEL PREDIO  :  <?php echo $registro["NOMBRE PREDIO"]; ?>
                                                        </h1 >
                                                    </td>

                                                </tr>
                                                </TABLE>

                                                <table >
                                                <tr>
                                                  <td >
                                                      <h1 align="center" style=" margin: 0px" >
                                                          CODIGO PARCELA: <?php echo $registro["ID PARCELA"]; ?>
                                                      </h1 >
                                                  </td>
                                                </tr>
                                            </TABLE>

                                            <table >
                                                <tr>
                                                    <td>

                                                    </td>
                                                    <td>

                                                    </td>
                                                    <td>

                                                    </td>
                                                    <td>

                                                    </td>
                                                    <td>

                                                    </td>
                                                    <td>

                                                    </td>
                                                </tr>

                                                <tr>

                                                    <td class="t">
                                                        <STRONG>DEPARTAMENTO:</STRONG>
                                                    </td>
                                                    <td class="d">
                                                        <?php echo $registro["DEPARTAMENTO"]; ?>
                                                    </td>



                                                    <td class="t">
                                                        <STRONG>PROVINCIA:</STRONG>
                                                    </td>
                                                    <td class="d">
                                                        <?php echo $registro["PROVINCIA"]; ?>
                                                    </td>


                                                    <td class="t">
                                                        <STRONG>MUNICIPIO:</STRONG>
                                                    </td>
                                                    <td class="d">
                                                        <?php echo $registro["MUNICIPIO"]; ?>
                                                    </td>

                                                </tr>


                                                <tr>


                                                    <td class="t">
                                                        <STRONG>TIPO PROPIEDAD:</STRONG>
                                                    </td>
                                                    <td class="d">
                                                        <?php echo $registro["TIPO PROPIEDAD"]; ?>
                                                    </td>

                                                    <td class="t">
                                                        <STRONG>ACTIVIDAD:</STRONG>
                                                    </td>
                                                    <td class="d">
                                                        <?php echo $registro["ACTIVIDAD"]; ?>
                                                    </td>

                                                    <td class="t">
                                                        <STRONG>ACTIVIDAD PARA EL PROGRAMA:</STRONG>
                                                    </td>
                                                    <td class="d">
                                                        <?php echo $registroaa["clasificacionprog"]; ?>
                                                    </td>


                                                </tr>


                                                <tr>
                                                        <td class="t">
                                                            <STRONG>ESTADO DE PREDIO:</STRONG>
                                                        </td>

                                                        <td class="d"

                                                          <?php
                                                          if (trim($registro['ESTADO'])=="HABILITADO")
                                                          {
                                                          ?>
                                                            bgcolor="#7fc345"	<?php
                                                          }
                                                          elseif (trim($registro['ESTADO'])=="RECHAZADO")
                                                          {?>
                                                            bgcolor="#f74d59"	<?php
                                                          } elseif (trim($registro['ESTADO'])=="Boleta Preliquidacion Generada")
                                                          { ?>
                                                             bgcolor="#f4f87d" <?php
                                                           } elseif (trim($registro['ESTADO'])=="EN EVALUACION")
                                                            { ?>
                                                              bgcolor="#ffcc66" <?php
                                                            } elseif (trim($registro['ESTADO'])=="SUSPENSION TEMPORAL")
                                                             { ?>
                                                               bgcolor="#FE642E" <?php
                                                              } elseif (trim($registro['ESTADO'])=="CANCELADO")
                                                               { ?>
                                                                  bgcolor="#FE2E2E" <?php
                                                                }

                                                                ?>
                                                                >
                                                                <?php
                                                                echo  $registro['ESTADO'];
                                                                  ?>


                                                        </td>

                                                        <td class="t">
                                                            <STRONG>ASESORAMIENTO:</STRONG>
                                                        </td>
                                                        <td class="d">
                                                            <?php echo $registro["ASESORAMIENTO"]; ?>
                                                        </td>

                                                        <td class="t" >
                                                            <STRONG>SITUACION JURIDICA:</STRONG>
                                                        </td>
                                                        <td class="d">
                                                            <?php echo $registro["SITUACION JURIDICA"]; ?>
                                                        </td>

                                                </tr>



                                                <tr>
                                                    <td class="t">
                                                        <STRONG>SUPERFICIE TOTAL(Ha):</STRONG>
                                                    </td>
                                                    <td class="d">
                                                        <?php echo $registro["SUP TOTAL"]; ?>
                                                    </td>

                                                    <td class="t">
                                                        <STRONG>SUPERFICIE DEFORESTADA ILEGAL(Ha):</STRONG>
                                                    </td>
                                                    <td class="d">
                                                        <?php echo $registro["SUP DEFORESTADA ILEGAL"]; ?>
                                                    </td>
                                                    <td class="t">
                                                        <STRONG>SUPERFICIE PAS(Ha):</STRONG>
                                                    </td>
                                                    <td class="d">
                                                        <?php echo $registro["SUP PAS"]; ?>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td class="t">
                                                        <STRONG>NOMBRE REPRESENTANTE LEGAL:</STRONG>
                                                    </td>
                                                    <td class="d">
                                                        <?php echo $registro["REPRESENTANTE NOMBRE"]; ?>
                                                    </td>

                                                    <td class="t">
                                                        <STRONG>TELEFONO REPRESENTANTE:</STRONG>
                                                    </td>
                                                    <td class="d">
                                                        <?php echo $registro["REPRESENTANTE TELEFONO"]; ?>
                                                    </td>
                                                    <td class="t">
                                                        <STRONG>CORREO ELECTRONICO REPRESENTANTE :</STRONG>
                                                    </td>
                                                    <td class="d">
                                                        <?php echo $registro["REPRESENTANTE EMAIL"]; ?>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td class="t">
                                                        <STRONG>NOMBRE AGENTE AUXILIAR:</STRONG>
                                                    </td>
                                                    <td class="d">
                                                        <?php echo $registroaa["nombreaa"]; ?>
                                                    </td>

                                                    <td class="t">
                                                        <STRONG>CODIGO AGENTE AUXILIAR:</STRONG>
                                                    </td>
                                                    <td class="d">
                                                        <?php echo $registroaa["numregprof"]; ?>
                                                    </td>
                                                    <td class="t">
                                                        <STRONG>TELEFONO AGENTE AUXILIAR :</STRONG>
                                                    </td>
                                                    <td class="d">
                                                        <?php echo $registroaa["numtelfaa"]; ?>
                                                    </td>

                                                </tr>

                                                <?php
                                                $sqldivfus = "Select tipo from div_fus where id_padre = " . $codRegistro . " or id_hijo = ".$codRegistro." limit 1";

                                                $resultadodivfus = $getSql->ejecutarSql($sqldivfus);
                                                $regdivfu = pg_fetch_array($resultadodivfus);
                                                $numdivfus = pg_num_rows($resultadodivfus);
                                                ?>


                                                <tr>
                                                   <td>
                                                     <STRONG>OBSERVACION MUTACIONES:</STRONG>
                                                   </td>
                                                   <td <?php if($numdivfus > 0){ ?> bgcolor="#cc9999" <?php } ?> >

                                                        <?php

                                                        if($numdivfus > 0)
                                                        {
                                                          if($regdivfu['tipo'] == 0)
                                                          {
                                                              echo 'PREDIO FUSIONADO';
                                                          }
                                                          else if ($regdivfu['tipo'] == 1)
                                                          {
                                                              echo 'PREDIO DIVIDIDO';
                                                          }

                                                        }
                                                        else
                                                        {
                                                            echo '';
                                                        }


                                                        ?>
                                                   </td>


                                                  <td>
                                                        <a name="benef" class="benef" href="javascript:;"><image  width="28" src="../images/logosdos/persona.png"/> </a>  <STRONG>Ver Beneficiarios:</STRONG>
                                                  </td>

                                                </tr>


                                            </table>
                                        </div>

                                        <?php
                                    }
                                    ?>
                                </fieldset>
                        </div>
                    </div>


                <fieldset >
                        <legend align="center" >HISTORIAL CARPETA</legend>

                <div id="tabs">
                    <ul>

                      <?php if (!isset($_REQUEST['mostrartabla3']))
                      {
                      ?>
                          <li><a href="#tabs-1">ETAPA DE REGISTRO</a></li>
                      <?php
                      }
                      else
                      {
                          ?>
                          <li><a href="#tabs-1">ETAPA DE REGISTRO</a></li>
                      <?php
                      }
                        ?>

                        <li><a href="#tabs-2">ETAPA DE MONITOREO</a></li>

                        <?php if (isset($_REQUEST['mostrartabla3']))
                        {
                        ?>
                          <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab" tabindex="0" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="true"><a href="#tabs-3" aria-selected="true" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-3">SOLICITUDES</a></li>
                        <?php
                        }
                        else
                        {
                            ?>
                          <li><a href="#tabs-3" aria-selected="true" >SOLICITUDES</a></li>
                        <?php
                        }
                          ?>


                        <li><a href="#tabs-4">MUTACIONES</a></li>
                    </ul>

                    <div id="tabs-1">
                          <?php include "historial_registro.php"; ?>
                    </div>

                    <div id="tabs-2">
                          <?php include "historial_monitoreo.php"; ?>
                    </div>

                    <div id="tabs-3">
                            <?php include "historial_solicitudes.php"; ?>
                    </div>

                    <div id="tabs-4">
                            <?php include "historial_fusion_division.php"; ?>
                    </div>



                </div>

              </fieldset>


            </div> <!-- FIN DEL DIV PRINCIPAL -->


            <script type="text/javascript">





            $(document).ready(function(){ <!-- --------> ejecuta el script jquery cuando el documento ha terminado de cargarse -->

            $(".benef").click(function() { <!-- ------> al pulsar (.click) el boton 1 (#b1) -->
                              // recorremos todos los valores...

              var   aCustomers=""  ;


                $("#dialogobeneficiarios").dialog({ <!--  ------> muestra la ventana  -->
                width: 800,  <!-- -------------> ancho de la ventana -->
                height: 500,<!--  -------------> altura de la ventana -->
                show: "scale", <!-- -----------> animación de la ventana al aparecer -->
                hide: "scale", <!-- -----------> animación al cerrar la ventana -->
                resizable: "false", <!-- ------> fija o redimensionable si ponemos este valor a "true" -->
                position: "top",<!--  ------> posicion de la ventana en la pantalla (left, top, right...) -->
                modal: "true", <!-- ------------> si esta en true bloquea el contenido de la web mientras la ventana esta activa (muy elegante) -->
              opacity: 90,
               closeOnEscape: false,
                    open: function(event, ui) { $(".ui-dialog-titlebar-close").hide();},

              });

            });

            $("#b2").click(function() {
            $("#dialogobeneficiarios").dialog({
                width: 590,
                height: 370,
                show: "scale",
                hide: "scale",
                resizable: "false",
                position: "center"
              });
            });
            $("#b3").click(function() {
              $("#dialogo3").dialog({
                width: 590,
                height: 370,
                show: "blind",
                hide: "shake",
                resizable: "false",
                position: "center"
              });
            });
            });



            function cancelar(){
               $("#dialogobeneficiarios").dialog("close");
            }
            </script>



            <div id="dialogobeneficiarios" class="ventana" style="height:200px;" title="LISTA DE BENEFICIARIOS">



              <div class="CSSTable" >
                  <a> BENEFICIARIOS</a>
                  <table >
                      <tr>
                          <td>
                          <strong>N</strong>
                          </td>
                          <td>
                          <strong>CI</strong>
                          </td>
                          <td>
                          <strong>APELLIDOS Y NOMBRES </strong>
                          </td>
                          <td>
                          <strong>DIRECCION</strong>
                          </td>
                          <td>
                          <strong>TELEFONO</strong>
                          </td>
                          <td>
                          <strong>CORREO ELECTRONICO</strong>
                          </td>
                      </tr>


              <?php
              $sqlben = "select * from parcelabeneficiario as pb inner join v_persona as p on pb.idpersona = p.idpersona where pb.idparcela ='" . $codParcela . "'";
              //echo ($sqlben);
              $ressqlben = $getSql->ejecutarSql($sqlben);
              //$beneficiarios = pg_fetch_array($ressqlben);


              $i = 1;
              while ($registrobene = pg_fetch_array($ressqlben)) {
              ?>


                                              <tr>

                                                  <td class="d">
                                                      <?php echo $i; ?>
                                                  </td>

                                                  <td class="d">
                                                      <?php echo $registrobene["noidentidad"]; ?>
                                                  </td>
                                                   <td class="d">
                                                      <?php echo $registrobene["nomcompleto"]; ?>
                                                  </td>
                                                     <td class="d">
                                                      <?php echo $registrobene["direcciondom"]; ?>
                                                  </td>
                                                  <td class="d">
                                                   <?php echo $registrobene["telefono"]; ?>
                                                 </td>
                                                 <td class="d">
                                                  <?php echo $registrobene["email"]; ?>
                                                </td>


                                              </tr>

                                  <?php
                                  $i = $i + 1;
                              }
                              ?>
              </table>
              </div>


            <div  style="text-align: right; margin-top:20px; ">
                  <div class="ui-dialog-buttonset">
                    <input  onclick="javascript:cancelar();"  id="cerrar" name="cerrar"  type="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" role="button" aria-disabled="false" value="Cerrar">

                  </div>
            </div>

    		</div>








        </body>
    </html>
    <?php



}

else
 {

    echo $mensaje = "NO PERMITIDO";
}
?>
