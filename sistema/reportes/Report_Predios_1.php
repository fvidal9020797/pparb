<?php
session_start();
/* include "destroy_predio.php"; */
//include "../valid.php";
$mensaje = "";
/* inicio select departamento */
//include "./codificadores.php";
//include "./politico.php";
//include "./sqlConsulta.php";

 
  require_once $_SERVER['DOCUMENT_ROOT'] . '/sistema/config/config.php';
  require_once APPPATH.'../NOTICIAS/GestorNoticias.php';
 

include "./reporte_RCIA.php";
include "./reporte_RCIA739.php";
include "./reporte_Caratula.php";

//	print_r($_SESSION);
if(isset($_REQUEST['rcia']))
{

	 $CodigoParcelas= rtrim($_REQUEST['codigorcia']);
	 $Anio= $_REQUEST['comboAno2'];


         
	 $g=new GestorNoticias();
	 $resultSuscripcion=$g->buscarreg2($CodigoParcelas);	
                
	 /* $sql_suscripcion = "SELECT r.idregistro, fecharegistro, fechasuscripcion
					FROM parcelas as p inner join registro as r on p.idparcela = r.idparcela inner join fechasregistro as fr on fr.idregistro = r.idregistro
					where p.idparcela = '".$CodigoParcelas."'";*/

       
          //$resultSuscripcion = pg_query($cn,$sql_suscripcion) ;
	  $row_Suscripcion = pg_fetch_array ($resultSuscripcion);
	$fechasuscripcion = $row_Suscripcion['fechasuscripcion'];
	$periodo1_time = date($today="2015-09-29");

	$periodo=2;
	if ($fechasuscripcion!="") {
	$predio_time = Date('Y-m-d', strtotime($fechasuscripcion));
	if($periodo1_time > $predio_time){
	  $periodo=1;
	}
	}



	if($periodo == 1)
	{
          //  echo"imprimir rcia";
	 ImprimirRCIA($CodigoParcelas,$Anio);
	}
	elseif ($periodo == 2)
	{
           // echo"imprimir rcia  739";
	 ImprimirRCIA739($CodigoParcelas,$Anio);
	} 


}


if(isset($_REQUEST['caratula']))
{
   /* $CodParce= $_REQUEST['codigoCaratula'];
    $Anio= $_REQUEST['comboAno'];


    ImprimirCaratula($CodParce,$Anio);*/
}




if (isset($_REQUEST['report'])) {
     /* $caso = $_REQUEST['outputtype'];
    $case = $_REQUEST['caso'];

   $sql=$getSql->getcosultaByCaso($case);

   // echo $sql;
    // exit();
    switch ($caso) {
        case 'pdf':
            /* inicio descargar en pdf */
          /*  $estado = $_REQUEST['estado'];
            $filename = 'REPORT_PREDIOS_ALL';
            $japerReport = 'report_predios_all.jasper';
            $report_parametro_1 = NULL;
            $report_parametro_2 = NULL;
            $report_parametro_3 = NULL;
            $report_parametro_4 = NULL;
            $report_parametro_5 = NULL;
            if ($estado != "") {
                $japerReport = 'report_predios.jasper';
                $report_parametro_1 = $estado;
                $filename = 'REPORT_PREDIOS_' . $estado;
            }
            include("report.inc2.php");
*/
            /* fin descargar en pdf */
           // break;
        //case 'xls':
            /* inicio descargar en pdf */
              /* $titulo="REPORTE PREDIOS REGISTRADOS PPARB";
            $filename = 'REPORT_PREDIOS_ALL';
            include("./exel-report.php");
            break;
        case 'html':
            $mensaje = "Funcion no implementada";
            break;
        default:
            break;
    }*/
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
                <li><a href="#tabs-1">Reporte Predios</a></li>
				<li><a href="#tabs-2">Reporte Monitoreo RCIA</a></li>
                <li><a href="#tabs-3">Impresion de Carátulas</a></li>
            </ul>



            <div id="tabs-1">
                <div class="menubar-main" align="center">
                    <h1></h1>
                  <div class="" align="center">
                <h1>Generador de reporte de Predios</h1>
                <form  method="post" id="form" action="Report_Predios.php">
                    <div id="general_filter">
                        <fieldset>
                            <LEGEND>Seleccionar datos para mostrar</LEGEND>
                            <UL>
                                <li> <strong>Seleccionar Todos Los Campos </strong> <input type="checkbox" id="checkAll" name="" value=""> </li>

				                              <LI id="campos">
                                     <div class="col-9-1 ">
                                        <p align="center"><STRONG >Datos generales del predio</STRONG></p>
                                        <?php echo $getSql->getCulumnaNames("report_predios"); ?>
                                     </div>



                                                                      <div class="col-9-1 ">
                                					<p align="center"> <STRONG>Datos de superficie del predio</STRONG></p>
                                                                 <?php echo $getSql->getCulumnaNames("report_superficies"); ?>
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

                        <input type="hidden" value="report_general" name="caso">
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
				<div class="" align="center">
			    <h1>Reporte de Cumplimiento Individual Anual</h1>
                <form  method="post" id="form" action="Report_Predios.php">
                    <div id="general_filter">

                        <fieldset >
                            <legend>Imprimir Formulario RCIA</legend>
                            <ul>
                                 <li>
																			<label style="float: left;padding-left: 6px;padding-right: 6px">CODIGO DE PARCELA</label>
																			<input type="text" class="" id="codigorcia" name="codigorcia" value=""/>
                                </li>

																<li>
																		<label style="float: left;padding-left: 6px;padding-right: 6px">AÑO</label>

																		<SELECT NAME="comboAno2" style="width: 100px" >
																						<OPTION VALUE="1">2014</OPTION>
																						<OPTION VALUE="2">2015</OPTION>
																						<OPTION VALUE="3">2016</OPTION>
																						<OPTION VALUE="4">2017</OPTION>
																						<OPTION VALUE="5">2018</OPTION>
																		</SELECT>

																</li>



                            </ul>

                        </fieldset>
                    </div>

                    <p>
                        <input type="submit" id="printrcia" name="rcia" value="IMPRIMIR" class="limebutton ui-state-default ui-corner-all">
                    </p>
                </form>
				</div>
				</div>
			</div>



           <div id="tabs-3">

             <div class="menubar-main" align="center">
                <div class="" align="center">
                <h1>IMPRESION DE CARATULAS</h1>
                <form  method="post" id="form" action="Report_Predios.php">
                    <div id="general_filter">

                        <fieldset >
                            <legend>Imprimir Carátulas </legend>
                            <ul>
                                 <li>
                                    <label style="float: left;padding-left: 6px;padding-right: 6px">CODIGO DE PARCELA</label>
                                    <input type="text" class="" id="codigoCaratula" name="codigoCaratula" value=""/>
                                </li>


                                <li>
                                    <label style="float: left;padding-left: 6px;padding-right: 6px">AÑO</label>

                                    <SELECT NAME="comboAno" style="width: 100px" >
                                            <OPTION VALUE="2013">2013</OPTION>
                                            <OPTION VALUE="2014">2014</OPTION>
                                            <OPTION VALUE="2015">2015</OPTION>
                                    </SELECT>

                                </li>


                            </ul>

                        </fieldset>
                    </div>

                    <p>
                        <input type="submit" id="printCaratula" name="caratula" value="IMPRIMIR CARATULA" class="limebutton ui-state-default ui-corner-all">
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
