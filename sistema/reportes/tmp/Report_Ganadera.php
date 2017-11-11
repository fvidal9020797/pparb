<?php
session_start();
/* include "destroy_predio.php"; */
include "../valid.php";
$mensaje = "";
$sql_list = 'select idcodificadores,nombrecodificador from codificadores
where idclasificador=21';
$list = pg_query($cn, $sql_list);
//$row_list= pg_fetch_array ($list);
$select_estado = '<select id="estado" name="estado">';
$select_estado.='<option value="">TODOS</option>';
while ($row = pg_fetch_array($list)) {
    $select_estado.='<option value="' . $row['nombrecodificador'] . '">' . $row['nombrecodificador'] . '</option>';
}
$select_estado.='</select>';

 if (isset($_REQUEST['report-prodganadera-list'])) {
    $caso = $_REQUEST['outputtype'];
    switch ($caso) {
        case 'pdf':
            /* inicio descargar en pdf */
            $estado = "";
            $filename = 'report_produccion_ganadera_all';
            $japerReport = 'report_produccion_ganadera_all1.jasper';
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
if (isset($_REQUEST['report-prodganadera-groupby'])) {
    $caso = $_REQUEST['outputtype'];
    switch ($caso) {
        case 'pdf':
            /* inicio descargar en pdf */
            $estado = $_REQUEST['estado'];
            $filename = 'report_produccion_ganadera_por_cantidad';
            $japerReport = 'report_produccion_ganadera_por_cantidad.jasper';
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
if (isset($_REQUEST['report-ganadera-list'])) {
    $caso = $_REQUEST['outputtype'];
    switch ($caso) {
        case 'pdf':
            /* inicio descargar en pdf */
            $estado = $_REQUEST['estado'];
            $filename = 'report_sitema_ganado_all';
            $japerReport = 'report_sitema_ganado_all.jasper';
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
if (isset($_REQUEST['report-ganadera-groupby'])) {
    $caso = $_REQUEST['outputtype'];
    switch ($caso) {
        case 'pdf':
            /* inicio descargar en pdf */
            $estado = $_REQUEST['estado'];
            $filename = 'report_sistema_ganadera_por_cantidad';
            $japerReport = 'report_sistema_ganadera_por_cantidad.jasper';
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
        <script src="../scripts/jquery-1.10.2.js"></script>
        <script src="../scripts/jquery-ui.js"></script>
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script>
            $(function() {
                $("#tabs").tabs();
            });
        </script>
    </head>

    <BODY>
        <div id="tabs">
            <ul>
                <li><a href="#tabs-1">Sistema Producción Ganadera</a></li>
                <li><a href="#tabs-2">Total Sistema Producción Ganadera</a></li>
                <li><a href="#tabs-3">Producción Ganadera</a></li>
                <li><a href="#tabs-4">Total Producción Ganadera</a></li>
            </ul>
            <div id="tabs-1">
                <div class="menubar-main" align="center">
                    <h1></h1>
                    <div class="" align="center"> 
                        <h1>Sistema Producción Ganadera</h1>
                        <form  method="post" id="form" action="Report_Ganadera.php"> 
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
                                <input type="submit" name="report-ganadera-list" value="Mostrar Reportes" class="limebutton ui-state-default ui-corner-all">
                                <input type="button" onclick="window.open('/limesurvey/index.php/admin/statistics/sa/surveyid/14961', '_top')" value="Borrar" class="limebutton ui-state-default ui-corner-all">
                            </p>
                        </form>

                    </div>


                    <div id="carga" >
                        <h1 style="color: red"> <?php echo $mensaje; ?>  </h1>
                    </div>
                </div>

            </div>
            <div id="tabs-2">
                <div class="menubar-main" align="center">
                    <h1></h1>
                    <div class="" align="center"> 
                        <h1>Total Sistema Producción Ganadera</h1>
                        <form  method="post" id="form" action="Report_Ganadera.php"> 
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
                                <input type="submit" name="report-ganadera-groupby" value="Mostrar Reportes" class="limebutton ui-state-default ui-corner-all">
                                <input type="button" onclick="window.open('/limesurvey/index.php/admin/statistics/sa/surveyid/14961', '_top')" value="Borrar" class="limebutton ui-state-default ui-corner-all">
                            </p>
                        </form>

                    </div>


                    <div id="carga" >
                        <h1 style="color: red"> <?php echo $mensaje; ?>  </h1>
                    </div>
                </div>
            </div>
            <div id="tabs-3">
                <div class="menubar-main" align="center">
                    <h1></h1>
                    <div class="" align="center"> 
                        <h1>Producción Ganadera</h1>
                        <form  method="post" id="form" action="Report_Ganadera.php"> 
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
                                <input type="submit" name="report-prodganadera-list" value="Mostrar Reportes" class="limebutton ui-state-default ui-corner-all">
                                <input type="button" onclick="window.open('/limesurvey/index.php/admin/statistics/sa/surveyid/14961', '_top')" value="Borrar" class="limebutton ui-state-default ui-corner-all">
                            </p>
                        </form>

                    </div>


                    <div id="carga" >
                        <h1 style="color: red"> <?php echo $mensaje; ?>  </h1>
                    </div>
                </div>

            </div>
            
         <div id="tabs-4">
                <div class="menubar-main" align="center">
                    <h1></h1>
                    <div class="" align="center"> 
                        <h1>Total Producción Ganadera</h1>
                        <form  method="post" id="form" action="Report_Ganadera.php"> 
                            <div id="general_filter">
                                <fieldset >
                                    <legend>Selección de datos</legend>
                                    <ul>
                                        <li>
                                            <label for="estado">ESTADO:</label>
                                            <?php echo $select_estado; ?>  
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
                                        
                                        </li>
                                    </ul>
                                </fieldset>
                            </div>
                            <p>
                                <input type="submit" name="report-prodganadera-groupby" value="Mostrar Reportes" class="limebutton ui-state-default ui-corner-all">
                                <input type="button" onclick="window.open('/limesurvey/index.php/admin/statistics/sa/surveyid/14961', '_top')" value="Borrar" class="limebutton ui-state-default ui-corner-all">
                            </p>
                        </form>

                    </div>


                    <div id="carga" >
                        <h1 style="color: red"> <?php echo $mensaje; ?>  </h1>
                    </div>
                </div>

            </div>
        
        </div>
        
    </body>
</html>
