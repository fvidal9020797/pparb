<?php
session_start();
/* include "destroy_predio.php"; */
include "../valid.php";
$mensaje = "";
include "./codificadores.php";
include "./politico.php";
include "./sqlConsulta.php";
$codificador = new codificadores();
$politico = new politico();
$getSql = new sqlConsulta();
if (isset($_REQUEST['reportpagos'])) {
    $caso = $_REQUEST['outputtype'];
    $case = $_REQUEST['caso'];
    $sql = $getSql->getcosultaByCaso($case);
    switch ($caso) {
        case 'pdf':
            /* inicio descargar en pdf */
            $estado = $_REQUEST['estado'];
            $filename = 'REPORT_PAGOS_ALL';
            $japerReport = 'report_pagos_general_all.jasper';
            $report_parametro_1 = NULL;
            $report_parametro_2 = NULL;
            $report_parametro_3 = NULL;
            $report_parametro_4 = NULL;
            $report_parametro_5 = NULL;
            if ($estado != "") {
                $japerReport = 'report_superficies_general.jasper';
                $report_parametro_1 = $estado;
                $filename = 'REPORT_SUPERFICIES_' . $estado;
            }
            include("report.inc.php");

            /* fin descargar en pdf */

            break;
        case 'xls':
            $titulo = "INFORME TOTAL DE PREDIOS REGISTRADOS PPARB";
            $filename = 'REPORT_PREDIOS_ALL';
            include("./exel-report.php");
            break;
        case 'html':
            $mensaje = "Funcion no implementada";
            break;
        default:
            break;
    }
}
if (isset($_REQUEST['report_estado_cuentas'])) {
    $caso = $_REQUEST['outputtype'];
    $case = $_REQUEST['caso'];
    $sql = $getSql->getcosultaByCaso($case);
    switch ($caso) {
        case 'pdf':
            /* inicio descargar en pdf */
            $estado = $_REQUEST['estado'];
            $filename = 'REPORT_PAGOS_ALL';
            $japerReport = 'report_pagos_general_all.jasper';
            $report_parametro_1 = NULL;
            $report_parametro_2 = NULL;
            $report_parametro_3 = NULL;
            $report_parametro_4 = NULL;
            $report_parametro_5 = NULL;
            if ($estado != "") {
                $japerReport = 'report_superficies_general.jasper';
                $report_parametro_1 = $estado;
                $filename = 'REPORT_SUPERFICIES_' . $estado;
            }
            include("report.inc.php");

            /* fin descargar en pdf */

            break;
        case 'xls':
            $titulo = "REPORTE DE ESTADO DE CUENTAS PPARB";
            $filename = 'REPORTE DE ESTADO DE CUENTAS PPARB';
            include("./exel-report.php");
            break;
        case 'html':
            $mensaje = "Funcion no implementada";
            break;
        default:
            break;
    }
}
if (isset($_REQUEST['report-by2'])) {
    $caso = $_REQUEST['outputtype'];
    $case = $_REQUEST['case'];
    switch ($caso) {
        case 'pdf':
            /* inicio descargar en pdf */
            if ($case == "tipopago") {

                $filename = 'report_pagos_por_tipopago';
                $japerReport = 'report_pagos_por_tipopago.jasper';
            } elseif ($case == "tipopropiedad") {
                $filename = 'report_pagos_por_tipopropiedad';
                $japerReport = 'report_pagos_por_tipopropiedad.jasper';
            } elseif ($case == "juridica") {
                $filename = 'report_superficies_por_juridica';
                $japerReport = 'report_superficies_por_juridica.jasper';
            } elseif ($case == "asesoramiento") {
                $filename = 'report_superficies_por_asesoramiento';
                $japerReport = 'report_superficies_por_asesoramiento.jasper';
            } elseif ($case == "tipopropiedad") {
                $filename = 'report_superficies_por_tipopropiedad';
                $japerReport = 'report_superficies_por_tipopropiedad.jasper';
            } elseif ($case == "resumen") {
                $filename = 'report_superficies_general_resumen';
                $japerReport = 'report_superficies_general_resumen.jasper';
            }

            $report_parametro_1 = NULL;
            $report_parametro_2 = NULL;
            $report_parametro_3 = NULL;
            $report_parametro_4 = NULL;
            $report_parametro_5 = NULL;

            include("report.inc.php");

            /* fin descargar en pdf */

            break;
        case 'xls':
            $mensaje = "Funcion no implementada";
            break;
        case 'html':
            $mensaje = "Funcion no implementada";
            break;
        default:
            break;
    }
}
/* inicio descargar en pdf */
?>
<!DOCTYPE html>
<HTML>
    <HEAD><TITLE>Reporte</TITLE>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link href="../css/mdryt.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" href="../css/jquery-ui.css">
        <script src="../libraries/jquery-ui-1.10.2/jquery-1.9.1.js"></script>
        <!--<script src="../scripts/jquery-1.10.2.js"></script>-->
        <!--<link rel="stylesheet" href="../libraries/jquery-ui-1.10.2/themes/base/jquery.ui.all.css">-->
        <script src="../scripts/jquery-ui.js"></script>
        <link rel="stylesheet" href="/resources/demos/style.css">
         <script src="../scripts/politico.js"></script>
        <script src="../scripts/checkall.js"></script>
        <script>
            $(function() {
                $("#tabs").tabs();
            });
        </script>
        <script src="../libraries/jquery-ui-1.10.2/ui/jquery.ui.core.js"></script>
        <script src="../libraries/jquery-ui-1.10.2/ui/jquery.ui.widget.js"></script>
        <script src="../libraries/jquery-ui-1.10.2/ui/jquery.ui.datepicker.js"></script>
        <script>
            $(function() {
                $("#inicio").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    /*  minDate: 0,*/
                    maxDate: "+5y +1M +10D",
                    dateFormat: "yy-mm-dd"
                });
                $("#fin").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    /* minDate: 0, */
                    maxDate: "+5y +1M +10D",
                    dateFormat: "yy-mm-dd"
                });

                $("#inicio1").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    /*  minDate: 0,*/
                    maxDate: "+5y +1M +10D",
                    dateFormat: "yy-mm-dd"
                });
                $("#fin1").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    /* minDate: 0, */
                    maxDate: "+5y +1M +10D",
                    dateFormat: "yy-mm-dd"
                });
            });
        </script>
        <script>
            $(function() {
                $("#inicio_2").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    /*  minDate: 0,*/
                    maxDate: "+5y +1M +10D",
                    dateFormat: "yy-mm-dd"
                });
                $("#fin_2").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    /* minDate: 0, */
                    maxDate: "+5y +1M +10D",
                    dateFormat: "yy-mm-dd"
                });

                $("#inicio1_2").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    /*  minDate: 0,*/
                    maxDate: "+5y +1M +10D",
                    dateFormat: "yy-mm-dd"
                });
                $("#fin1_2").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    /* minDate: 0, */
                    maxDate: "+5y +1M +10D",
                    dateFormat: "yy-mm-dd"
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#form').submit(function() {
                    // show that something is loading
                    $('#response').html("");
                });

            });

        </script>
  <script>
        $(document).ready(function() {
    $('#checkAll23').change(function() {
        // alert('llego'); // $('#campos :checkbox').attr('checked', this.checked);
       var div = document.getElementById("campos23");
       //// var div = $(this).parent().parent().parent().parent().parent().parent();
       //// alert(data);
       var inputs = div.getElementsByTagName("input");
       for (var i = 0, len = inputs.length; i < len; ++i) {
           // alert(inputs[i].type); if (inputs[i].type == "checkbox") {
          inputs[i].checked = this.checked;
            } })
    });
</script>
        <script>
            $(function() {
                $("#tabs").tabs();
            });
        </script>
    </head>

    <BODY>
        <div id="tabs">
            <ul>
                <li><a href="#tabs-3">Reporte de Pagos</a></li>
                <li><a href="#tabs-6">Estado de Cuentas</a></li>
              <!--  <li><a href="#tabs-4">Pagos por tipo de Propiedad</a></li>
                <li><a href="#tabs-5">Pagos por tipo de Pago</a></li> -->
            </ul>

            <div id="tabs-3">
                <div class="menubar-main" align="center">
                    <h1></h1>
                    <div class="" align="center">
                        <h1>Reporte Personalizado de Pagos Realizados</h1>
                        <form  method="post" id="form3" action="Report_Pagos.php">
                            <div id="general_filter">
                                <fieldset>
                                    <LEGEND>Seleccionar Datos Para Mostrar</LEGEND>
                                   <UL>
                                    <li> <strong>Seleccionar Todos Los Campos </strong> <input type="checkbox" id="checkAll" name="" value=""> </li>
                                        <li id="campos">
                                            <?php echo $getSql->getCulumnaNames("report_pagos"); ?>

                                        </LI>
                                    </UL>
                                </fieldset>
                                <fieldset >
                                    <legend>Selección de datos para filtrar</legend>
                                    <ul>
                                        <li>
                                            <?php echo $politico->getDeptoByPais(1); ?>
                                        </li>
                                        <li id="prov">

                                        </li>
                                        <li id="mun">

                                        </li>
                                        <li>
                                            <label for="estado">TIPO DE PROPIEDAD:</label>
                                            <?php echo $codificador->getByClasificador(1) ?>
                                        </li>
                                        <li>
                                            <label for="estado">ACTIVIDAD DEL PREDIO:</label>
                                            <?php echo $codificador->getByClasificador(8) ?>
                                        </li>
                                        <li>
                                            <label for="oficina">ASESORAMIENTO:</label>
                                            <?php echo $codificador->getByClasificador(16); ?>
                                        </li>
                                        <li>
                                            <label for="oficina">SITUACION JURIDICA:</label>
                                            <?php echo $codificador->getByClasificador(2); ?>
                                        </li>
                                        <li>
                                            <label for="oficina">FECHA DE REGISTRO DE PREDIO:</label>
                                            <input type="text" class="date-left" id="inicio_2" name="inicio" value=""/> <label style="float: left;padding-left: 6px;padding-right: 6px">Hasta</label><input class="date-left" type="text" id="fin_2" name="fin" value=""/>
                                        </li>
                                        <li>
                                            <label for="estado">TIPO DE PAGO:</label>
                                            <?php echo $codificador->getByClasificador(14); ?>
                                        </li>
                                        <li>
                                            <label for="oficina">FECHA DE DEPOSITO:</label>
                                            <input type="text" class="date-left" id="inicio1_2" name="inicio1" value=""/> <label style="float: left;padding-left: 6px;padding-right: 6px">Hasta</label><input class="date-left" type="text" id="fin1_2" name="fin1" value=""/>
                                        </li>
                                        <li>
                                            <label for="oficina">FECHA DE REGISTRO DE PAGO:</label>
                                            <input type="text" class="date-left" id="inicio1" name="inicio2" value=""/> <label style="float: left;padding-left: 6px;padding-right: 6px">Hasta</label><input class="date-left" type="text" id="fin1" name="fin2" value=""/>
                                        </li>
                                        <li>
                                            <label for="estado">ESTADO DE PREDIO:</label>
                                            <?php echo $codificador->getByClasificador(21); ?>
                                        </li>
                                        <li>
                                            <label for="oficina">OFICINA:</label>
                                            <?php echo $codificador->getByClasificador(20); ?>
                                        </li>

                                    </ul>
                                </fieldset>
                                <fieldset>
                                    <legend>Opciones de salida</legend>
                                    <ul>


                                        <li>
                                            <label>Seleccionar el formato de salida:</label>
                                            <input type="radio" checked="checked" value="pdf" name="outputtype" id="outputtypepdf">
                                            <label for="outputtypepdf">PDF</label>

                                            <input type="radio" checked="checked" value="xls" name="outputtype" id="outputtypexls">
                                            <label for="outputtypexls">EXCEL</label>

                                        </li>
                                    </ul>
                                </fieldset>
                            </div>
                            <p>
                                <input type="hidden" value="report_pagos" name="caso">
                                <input type="submit" name="reportpagos" value="Mostrar Reportes" class="limebutton ui-state-default ui-corner-all">
                                <input type="reset" value="Borrar" class="limebutton ui-state-default ui-corner-all">
                            </p>
                        </form>

                    </div>
                    <div id='response'>
                        <h1 style="color: red"> <?php echo $mensaje; ?>  </h1>
                    </div>
                </div>
            </div>
             <div id="tabs-6">
                <div class="menubar-main" align="center">
                    <h1></h1>
                  <div class="" align="center">
                <h1>Reporte Estado de Cuentas</h1>
                <form  method="post" id="form" action="Report_Pagos.php">
                    <div id="general_filter">
                        <fieldset>
                            <LEGEND>Seleccionar datos para mostrar</LEGEND>
                            <UL>
                                <li> <strong>Seleccionar Todos Los Campos </strong> <input type="checkbox" id="checkAll23" name="" value=""> </li>

                 <LI id="campos23">
                                     <div class="col-9-1 ">
                                     <p align="center"><STRONG >Datos generales del predio</STRONG>
                                             </p>
                                 <?php echo $getSql->getCulumnaNames("report_estado_cuentas"); ?>
                                             </div>

                                      <div class="col-9-1 ">
                                     <p align="center"><STRONG >Datos de estado de cuentas</STRONG>
                                             </p>
                                 <?php echo $getSql->getCulumnaNames("report_estado_cuentas1"); ?>
                                             </div>

                                      <div class="col-9-1 ">
                    <p align="center"><STRONG>Datos del representante legal del predio</STRONG></p>
                <?php echo $getSql->getCulumnaNames("report_representante"); ?>
                                              </div>
                                      <div class="col-9-1 ">
                                        <p align="center"><STRONG>Datos del Tecnico Registrador ABT</STRONG></p>
                <?php echo $getSql->getCulumnaNames("report_funcionario_abt"); ?>
                                    </div>
                                      <div class="col-9-1 ">
                                        <p align="center"><STRONG>Datos del Tecnico Registrador VDRA</STRONG></p>
                <?php echo $getSql->getCulumnaNames("report_funcionario_vdra"); ?>
                                      </div>
                                      </LI>

                            </UL>
                        </fieldset>
                        <fieldset >
                            <legend>Seleccionar datos para filtrar</legend>
                            <ul>
                                   <li>
                                    <?php echo $politico->getDeptoByPais(1); ?>
                                </li>
                                <li id="prov">

                                </li>
                                 <li id="mun">

                                </li>
                                  <li>
                                    <label for="estado">TIPO DE PREDIO:</label>
                                    <?php echo $codificador->getByClasificador(1) ?>
                                </li>
                                 <li>
                                    <label for="estado">ACTIVIDAD DEL PREDIO:</label>
                                    <?php echo $codificador->getByClasificador(8) ?>
                                </li>
                                <li>
                                    <label for="oficina">ASESORAMIENTO:</label>
                                    <?php echo $codificador->getByClasificador(16); ?>
                                </li>
                                <li>
                                    <label for="oficina">SITUACION JURIDICA:</label>
                                    <?php echo $codificador->getByClasificador(2); ?>
                                </li>
                                <li>
                                    <label for="estado">ESTADO DE PREDIO:</label>
                                    <?php echo $codificador->getByClasificador(21); ?>
                                </li>

                                 <li>
                                    <label for="oficina">OFICINA:</label>
                                    <?php echo $codificador->getByClasificador(20); ?>
                                </li>

                                 <li>
                                    <label for="oficina">FECHA DE REGISTRO:</label>
                                    <input type="text" class="date-left" id="inicio" name="inicio" value=""/> <label style="float: left;padding-left: 6px;padding-right: 6px">Hasta</label><input class="date-left" type="text" id="fin" name="fin" value=""/>
                                </li>
                                  <li>
                                      <label>TECNICO REGISTRADOR: </label>
                                    <?php echo $codificador->getByRegistrador(19); ?>
                                  </li>
                                <li id="register">

                                 </li>
                            </ul>
                        </fieldset>
                        <fieldset>
                            <legend>Opciones de salida</legend>
                            <ul>


                                <li>
                                    <label>Seleccionar el formato de salida:</label>
                                    <input type="radio" checked="checked" value="pdf" name="outputtype" id="outputtypepdf">
                                    <label for="outputtypepdf">PDF</label>
                                       <input type="radio" checked="checked" value="xls" name="outputtype" id="outputtypexls">
                                    <label for="outputtypexls">EXCEL</label>

                                </li>
                            </ul>
                        </fieldset>
                    </div>
                    <!-- where the response will be displayed -->

                    <p>

                        <input type="hidden" value="report_estado_cuentas" name="caso">
                        <input type="submit" id="send" name="report_estado_cuentas" value="Mostrar Reportes" class="limebutton ui-state-default ui-corner-all">
                        <input type="reset" value="Borrar" class="limebutton ui-state-default ui-corner-all">

                    </p>

                </form>
            </div>
 <div id='response'>
                <h1 style="color: red"> <?php echo $mensaje; ?>  </h1>
            </div>
                </div>

            </div>

            <!--
            <div id="tabs-4">
                <div class="menubar-main" align="center">
                    <h1></h1>
                    <div class="" align="center">
                        <h1>Pagos por tipo de Propiedad</h1>
                        <form  method="post" id="form4" action="Report_Pagos.php">
                            <div id="general_filter">

                                <fieldset>
                                    <legend>Opciones de salida</legend>
                                    <ul>


                                        <li>
                                            <label>Seleccionar el formato de salida:</label>
                                            <input type="radio" checked="checked" value="pdf" name="outputtype" id="outputtypepdf">
                                            <label for="outputtypepdf">PDF</label>

                                        </li>
                                    </ul>
                                </fieldset>
                            </div>
                            <p>
                                <input type="hidden" value="tipopropiedad" name="case">
                                <input type="submit" name="report-by2" value="Mostrar Reportes" class="limebutton ui-state-default ui-corner-all">
                                <input type="button" onclick="window.open('/limesurvey/index.php/admin/statistics/sa/surveyid/14961', '_top')" value="Borrar" class="limebutton ui-state-default ui-corner-all">
                            </p>
                        </form>

                    </div>


                    <div id="carga" >
                        <h1 style="color: red"> <?php //echo $mensaje; ?>  </h1>
                    </div>
                </div>
            </div>

            <div id="tabs-5">
                <div class="menubar-main" align="center">
                    <h1></h1>
                    <div class="" align="center">
                        <h1>Pagos por tipo de Pago</h1>
                        <form  method="post" id="form5" action="Report_Pagos.php">
                            <div id="general_filter">

                                <fieldset>
                                    <legend>Opciones de salida</legend>
                                    <ul>


                                        <li>
                                            <label>Seleccionar el formato de salida:</label>
                                            <input type="radio" checked="checked" value="pdf" name="outputtype" id="outputtypepdf">
                                            <label for="outputtypepdf">PDF</label>

                                        </li>
                                    </ul>
                                </fieldset>
                            </div>
                            <p>
                                <input type="hidden" value="tipopago" name="case">
                                <input type="submit" name="report-by2" value="Mostrar Reportes" class="limebutton ui-state-default ui-corner-all">
                                <input type="button" onclick="window.open('/limesurvey/index.php/admin/statistics/sa/surveyid/14961', '_top')" value="Borrar" class="limebutton ui-state-default ui-corner-all">
                            </p>
                        </form>

                    </div>


                    <div id="carga" >
                        <h1 style="color: red"> <?php //echo $mensaje; ?>  </h1>
                    </div>
                </div>
              </div>
            -->



        </div>
    </body>
</html>
