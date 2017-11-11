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


if (isset($_REQUEST['report'])) {
    $caso = $_REQUEST['outputtype'];
    switch ($caso) {
        case 'pdf':
            /* inicio descargar en pdf */
            $estado = $_REQUEST['estado'];
            $filename = 'REPORT_SUPERFICIES_ALL';
            $japerReport = 'report_superficies_general_all.jasper';
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
            if ($case == "estado") {
            $filename = 'report_superficies_por_estado';
            $japerReport = 'report_superficies_por_estado.jasper';
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
                <li><a href="#tabs-1">Listar Superficies</a></li>
                <li><a href="#tabs-2">Superficies Por Estados</a></li>
                <li><a href="#tabs-3">Superficies Por Clasificación</a></li>
                <li><a href="#tabs-4">Superficies Por Situación Jurídica</a></li>
                <li><a href="#tabs-5">Superficies Por Asesoramiento</a></li>
                <li><a href="#tabs-6">Superficies Por Tipo de Propiedad</a></li>
                <li><a href="#tabs-7">Resumen de Superficies de Predios</a></li>
            </ul>
            <div id="tabs-1">
                <div class="menubar-main" align="center">
                    <h1></h1>
                    <div class="" align="center"> 
                        <h1>Listar Predios con Superficies</h1>
                        <form  method="post" id="form" action="Report_Superficies.php"> 
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
                                <input type="submit" name="report" value="Mostrar Reportes" class="limebutton ui-state-default ui-corner-all">
                                <input type="button" onclick="" value="Borrar" class="limebutton ui-state-default ui-corner-all">
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
                        <h1>Superficie Total Por Estado del Predio</h1>
                        <form  method="post" id="form" action="Report_Superficies.php"> 
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
                                <input type="hidden" value="estado" name="case">
                                <input type="submit" name="report-by" value="Mostrar Reportes" class="limebutton ui-state-default ui-corner-all">
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
                        <h1>Superficie Total Por Estado Clasificacion de la Propiedad</h1>
                        <form  method="post" id="form" action="Report_Superficies.php"> 
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
                                <input type="hidden" value="clasificacion" name="case">
                                <input type="submit" name="report-by" value="Mostrar Reportes" class="limebutton ui-state-default ui-corner-all">
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
                        <h1>Superficie Total Por Situación Juridica</h1>
                        <form  method="post" id="form" action="Report_Superficies.php"> 
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
                                <input type="hidden" value="juridica" name="case">
                                <input type="submit" name="report-by" value="Mostrar Reportes" class="limebutton ui-state-default ui-corner-all">
                                <input type="button" onclick="window.open('/limesurvey/index.php/admin/statistics/sa/surveyid/14961', '_top')" value="Borrar" class="limebutton ui-state-default ui-corner-all">
                            </p>
                        </form>

                    </div>


                    <div id="carga" >
                        <h1 style="color: red"> <?php echo $mensaje; ?>  </h1>
                    </div>
                </div>
            </div>
             <div id="tabs-5">
                 <div class="menubar-main" align="center">
                    <h1></h1>
                    <div class="" align="center"> 
                        <h1>Superficie Total Por Asesoramiento</h1>
                        <form  method="post" id="form" action="Report_Superficies.php"> 
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
                                <input type="hidden" value="asesoramiento" name="case">
                                <input type="submit" name="report-by" value="Mostrar Reportes" class="limebutton ui-state-default ui-corner-all">
                                <input type="button" onclick="window.open('/limesurvey/index.php/admin/statistics/sa/surveyid/14961', '_top')" value="Borrar" class="limebutton ui-state-default ui-corner-all">
                            </p>
                        </form>

                    </div>


                    <div id="carga" >
                        <h1 style="color: red"> <?php echo $mensaje; ?>  </h1>
                    </div>
                </div>
            </div>
                       <div id="tabs-6">
                 <div class="menubar-main" align="center">
                    <h1></h1>
                    <div class="" align="center"> 
                        <h1>Superficie Total Por Tipo de Propiedad</h1>
                        <form  method="post" id="form" action="Report_Superficies.php"> 
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
                                <input type="submit" name="report-by" value="Mostrar Reportes" class="limebutton ui-state-default ui-corner-all">
                                <input type="button" onclick="window.open('/limesurvey/index.php/admin/statistics/sa/surveyid/14961', '_top')" value="Borrar" class="limebutton ui-state-default ui-corner-all">
                            </p>
                        </form>

                    </div>


                    <div id="carga" >
                        <h1 style="color: red"> <?php echo $mensaje; ?>  </h1>
                    </div>
                </div>
            </div>
              <div id="tabs-7">
                 <div class="menubar-main" align="center">
                    <h1></h1>
                    <div class="" align="center"> 
                        <h1>Resumen de Superficies de Predios</h1>
                        <form  method="post" id="form" action="Report_Superficies.php"> 
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
                                <input type="hidden" value="resumen" name="case">
                                <input type="submit" name="report-by" value="Mostrar Reportes" class="limebutton ui-state-default ui-corner-all">
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
