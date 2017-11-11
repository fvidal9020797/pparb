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
if (isset($_REQUEST['report-cultivo-list'])) {
    $caso = $_REQUEST['outputtype'];
    $case = $_REQUEST['caso'];
    $sql = $getSql->getcosultaByCaso($case);
    switch ($caso) {
        case 'pdf':
            /* inicio descargar en pdf */
            $estado = $_REQUEST['estado'];
            $filename = 'report_cultivo_producir_all';
            $japerReport = 'report_cultivo_producir_all.jasper';
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
            /* inicio descargar en pdf */
            $titulo = "REPORTE DE CULTIVOS";
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
if (isset($_REQUEST['report-cultivo-groupby'])) {
    $caso = $_REQUEST['outputtype'];
    switch ($caso) {
        case 'pdf':
            /* inicio descargar en pdf */
            $estado = $_REQUEST['estado'];
            $filename = 'report_cultivo_producir_superficies';
            $japerReport = 'report_cultivo_producir_superficies.jasper';
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
            $mensaje = "Funcion no implementada";
            break;
        case 'html':
            $mensaje = "Funcion no implementada";
            break;
        default:
            break;
    }
}
if (isset($_REQUEST['report-by'])) {
    $caso = $_REQUEST['outputtype'];
    $case = $_REQUEST['case'];
    switch ($caso) {
        case 'pdf':
            /* inicio descargar en pdf */
            if ($case == "tipopago") {
                $filename = 'report_preliquidacion_por_tipopago';
                $japerReport = 'report_preliquidacion_por_tipopago.jasper';
            } elseif ($case == "clasificacion") {
                $filename = 'report_superficies_por_clasificacion';
                $japerReport = 'report_superficies_por_clasificacion.jasper';
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
        <script src="../libraries/jquery-ui-1.10.2/ui/jquery.ui.core.js"></script>
        <script src="../libraries/jquery-ui-1.10.2/ui/jquery.ui.widget.js"></script>
        <script src="../libraries/jquery-ui-1.10.2/ui/jquery.ui.datepicker.js"></script>
        <script src="../scripts/politico.js"></script>
        <script src="../scripts/checkall.js"></script>
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
        <div id="tabs">
            <ul>
                <li><a href="#tabs-1">Listado de Cultivos Comprometidos</a></li>
                <li><a href="#tabs-2">Listado Cultivos por Superficie</a></li>
            </ul>
            <div id="tabs-1">
                <div class="menubar-main" align="center">
                    <h1></h1>
                    <div class="" align="center">
                        <h1>Reporte personalizado de Cultivos Comprometidos</h1>
                        <form  method="post" id="form" action="Report_Cultivos.php">
                            <div id="general_filter">
                                <fieldset>
                                    <LEGEND>Seleccionar datos para mostrar</LEGEND>
                                    <UL>
                                        <li> <strong>Seleccionar Todos Los Campos </strong> <input type="checkbox" id="checkAll" name="" value=""> </li>
                                        <li id="campos">
                                            <?php echo $getSql->getCulumnaNames("report_cultivos"); ?>

                                        </LI>
                                    </UL>
                                </fieldset>
                                <fieldset >
                                    <legend>Seleccionar de datos para filtrar</legend>
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
                                            <label for="oficina">FECHA DE REGISTRO:</label>
                                            <input type="text" class="date-left" id="inicio" name="inicio" value=""/> <label style="float: left;padding-left: 6px;padding-right: 6px">Hasta</label><input class="date-left" type="text" id="fin" name="fin" value=""/>
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
                                <input type="hidden" value="report_cultivos" name="caso">
                                <input id="send" type="submit" name="report-cultivo-list" value="Mostrar Reportes" class="limebutton ui-state-default ui-corner-all">
                                <input type="reset" value="Borrar" class="limebutton ui-state-default ui-corner-all">
                            </p>
                        </form>

                    </div>
                </div>

            </div>
            <div id="tabs-2">
                <div class="menubar-main" align="center">
                    <h1></h1>
                    <div class="" align="center">
                        <h1>Reporte Total de Superficies por Cultivo Comprometido</h1>
                        <form  method="post" id="form" action="Report_Cultivos.php">
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
                                <input type="hidden" value="especie" name="case">
                                <input id="send" type="submit" name="report-cultivo-groupby" value="Mostrar Reportes" class="limebutton ui-state-default ui-corner-all">
                                <input type="button" onclick="window.open('/limesurvey/index.php/admin/statistics/sa/surveyid/14961', '_top')" value="Borrar" class="limebutton ui-state-default ui-corner-all">
                            </p>
                        </form>

                    </div>

                </div>
            </div>
            <div id="carga" align="center">
                <h1 style="color: red"> <?php echo $mensaje; ?>  </h1>
            </div>
        </div>

    </body>
</html>
