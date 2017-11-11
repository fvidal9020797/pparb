<?php
session_start();
/* include "destroy_predio.php"; */
include "../valid.php";
$mensaje = "";
/* inicio select departamento */
include "./codificadores.php";
include "./politico.php";
include "./sqlConsulta.php";


$codificador=new codificadores();
$politico=new politico();
$getSql=new sqlConsulta();

 
        
//	print_r($_SESSION);
 
if (isset($_REQUEST['report'])) {
        
    $caso = $_REQUEST['outputtype'];
    $case = $_REQUEST['caso'];
  // echo "SQLL=".$case;
     $sql=$getSql->getcosultaByCaso($case);
   // echo "SQLL=".$sql;
    // exit();
      switch ($caso) {
        case 'pdf':
            
            $estado = $_REQUEST['estado'];
            $filename = 'REPORT_PREDIOS_ALL';
            $japerReport = 'report_remitidas_inra.jasper';
            $report_parametro_1 = NULL;
            $report_parametro_2 = NULL;
            $report_parametro_3 = NULL;
            $report_parametro_4 = NULL;
            $report_parametro_5 = NULL;
          /*  if ($estado != "") {
                $japerReport = 'report_predios.jasper';
                $report_parametro_1 = $estado;
                $filename = 'REPORT_PREDIOS_' . $estado;
            }*/
            include("report.inc2.php");

             
            break;
        case 'xls':
            
               $titulo="REPORTE CARPETAS ENVIADAS AL INRA";
            $filename = 'report_remitidas_inra';
            include("./exel-report.php");
            break;
        case 'html':
            $mensaje = "Funcion no implementada";
            break;
        default:
            break;
    }  
}
/* inicio descargar en pdf */

if (isset($_REQUEST['reportDevuelta'])) {
        
    $caso = $_REQUEST['outputtype'];
    $case = $_REQUEST['caso'];
        
     $sql=$getSql->getcosultaByCaso($case);
   // echo "SQLL=".$sql;
    // exit();
      switch ($caso) {
        case 'pdf':
            
            $estado = $_REQUEST['estado'];
            $filename = 'REPORT_PREDIOS_ALL';
            $japerReport = 'report_remitidas_inra.jasper';
            $report_parametro_1 = NULL;
            $report_parametro_2 = NULL;
            $report_parametro_3 = NULL;
            $report_parametro_4 = NULL;
            $report_parametro_5 = NULL;
        
            include("report.inc2.php");

             
            break;
        case 'xls':
            
               $titulo="REPORTE CARPETAS DEVUELTAS DEL INRA";
            $filename = 'report_devueltas_inra';
            include("./exel-report.php");
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
        <link rel="stylesheet" href="../libraries/jquery-ui-1.10.2/demos/style.css">
        <script src="../libraries/jquery-ui-1.10.2/ui/jquery.ui.core.js"></script>
        <script src="../libraries/jquery-ui-1.10.2/ui/jquery.ui.widget.js"></script>
        <script src="../libraries/jquery-ui-1.10.2/ui/jquery.ui.datepicker.js"></script>
        <script src="../scripts/politico.js"></script>
        <script src="../scripts/checkall.js"></script>
<script>
	$(function() {
		$( "#inicio" ).datepicker({
			 changeMonth: true,
                        changeYear: true,
                      /*  minDate: 0,*/
                        maxDate: "+5y +1M +10D",
                        dateFormat:"yy-mm-dd"
		});
                $( "#fin" ).datepicker({
			 changeMonth: true,
                        changeYear: true,
                       /* minDate: 0, */
                        maxDate: "+5y +1M +10D",
                        dateFormat:"yy-mm-dd"
		});
                
                $( "#inicio2" ).datepicker({
			 changeMonth: true,
                        changeYear: true,
                      /*  minDate: 0,*/
                        maxDate: "+5y +1M +10D",
                        dateFormat:"yy-mm-dd"
		});
                
                $( "#fin2" ).datepicker({
			 changeMonth: true,
                        changeYear: true,
                       /* minDate: 0, */
                        maxDate: "+5y +1M +10D",
                        dateFormat:"yy-mm-dd"
		});
                
	});
	</script>

      <script>
$(document).ready(function(){
    $('#form').submit(function(){
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
                <li><a href="#tabs-1">Carpetas Remitidas al INRA</a></li>
		<li><a href="#tabs-2">Carpetas Devueltas del INRA</a></li> 
            </ul>



            <div id="tabs-1">
                <div class="menubar-main" align="center">
                    <h1></h1>
                  <div class="" align="center">
                <h1>Reporte Personalizado Carpetas Remitidas al INRA</h1>
                <form  method="post" id="form" action="Report_carpertas_inra.php">
                    <div id="general_filter">
                        <fieldset>
                            <LEGEND>Seleccionar datos para mostrar</LEGEND>
                            <UL>
                                <li> <strong>Seleccionar Todos Los Campos </strong> <input type="checkbox" id="checkAll" name="" value=""> </li>

				                              <LI id="campos">
                                     <div class="col-9-1 ">
                                        <p align="center"><STRONG >Datos generales</STRONG></p>
                                        <?php echo $getSql->getCulumnaNames("report_emitidas_inra"); ?>
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
                                    <label for="oficina">OFICINA:</label>
                                    <?php echo $codificador->getByClasificador(20); ?>
                                </li>

                                 <li>
                                    <label for="oficina">FECHA DE ENVIO:</label>
                                    <input type="text" class="date-left" id="inicio" name="inicio" value=""/> <label style="float: left;padding-left: 6px;padding-right: 6px">Hasta</label><input class="date-left" type="text" id="fin" name="fin" value=""/>
                                </li>
                                  
                                <li id="register">

                                 </li>
                            </ul>
                        </fieldset>
                        <fieldset style="display: none;">
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

                        <input type="hidden" value="report_remitidas_inra" name="caso">
                        <input type="submit" id="send" name="report" value="Mostrar Reportes" class="limebutton ui-state-default ui-corner-all">
                        <input type="reset" value="Borrar" class="limebutton ui-state-default ui-corner-all">

                    </p>

                </form>
            </div>
 <div id='response'>
                <h1 style="color: red"> <?php echo $mensaje; ?>  </h1>
            </div>
                </div>

            </div>



	     <div id="tabs-2">
                <div class="menubar-main" align="center">
                    <h1></h1>
                  <div class="" align="center">
                <h1>Reporte Personalizado Carpetas Devueltas del INRA</h1>
                <form  method="post" id="form" action="Report_carpertas_inra.php">
                    <div id="general_filter">
                        <fieldset>
                            <LEGEND>Seleccionar datos para mostrar</LEGEND>
                            <UL>
                                <li> <strong>Seleccionar Todos Los Campos </strong> <input type="checkbox" id="checkAll2" name="" value=""> </li>

				                              <LI id="campos2">
                                     <div class="col-9-1 ">
                                        <p align="center"><STRONG >Datos generales</STRONG></p>
                                        <?php echo $getSql->getCulumnaNames("report_devueltas_inra"); ?>
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
                                    <label for="oficina">OFICINA:</label>
                                    <?php echo $codificador->getByClasificador(20); ?>
                                </li>

                                 <li>
                                    <label for="oficina">FECHA NOTA RECIBIDA:</label>
                                    <input type="text" class="date-left" id="inicio2" name="inicio2" value=""/> <label style="float: left;padding-left: 6px;padding-right: 6px">Hasta</label><input class="date-left" type="text" id="fin2" name="fin2" value=""/>
                                </li>
                                  
                                <li id="register">

                                 </li>
                            </ul>
                        </fieldset>
                        <fieldset style="display: none;">
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

                        <input type="hidden" value="report_devueltas_inra" name="caso">
                        <input type="submit" id="send" name="reportDevuelta" value="Mostrar Reportes" class="limebutton ui-state-default ui-corner-all">
                        <input type="reset" value="Borrar" class="limebutton ui-state-default ui-corner-all">

                    </p>

                </form>
            </div>
 <div id='response'>
                <h1 style="color: red"> <?php echo $mensaje; ?>  </h1>
            </div>
                </div>

            </div>


            <div id="carga" align="center">
                <h1 style="color: red"> <?php echo $mensaje; ?>  </h1>
            </div>
        </div>
</body>
</html>
