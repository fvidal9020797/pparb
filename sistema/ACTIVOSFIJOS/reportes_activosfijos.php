<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/sistema/config/config.php';
?>

<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html >
	<head>
		<title>Activos fijos - (Individual)</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" /> 
                 <link rel="stylesheet" href="activo.css" /> 
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
                
                
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
 
        
          <script language="JavaScript">
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
	<body>
        <div id="page-wrapper" style="background-color: #E8F0E8;">

            <!-- Header -->
        
            <?php    
            include "menuPrincipal.php";
            ?>



            <div style="height: 35px;" >


            </div>




<!-- Main -->
        <section id="main" class="container 90%">

            
             <div id="tabs">
            <ul>
                <li><a href="#tabs-1">Reporte Por Activos</a></li>
		<li><a href="#tabs-2">Reporte Por Personal</a></li>
                <li><a href="#tabs-3">Reporte Por Activos-Personal</a></li>
                <li><a href="#tabs-4">Reporte Actas Asignacion General</a></li>
               
            </ul>



            <div id="tabs-1">
                <div class="menubar-main" align="center">
                    <h1></h1>
                  <div class="" align="center">
                <h1>Generador de reporte de Activos Fijos</h1>
                <form  method="post" id="formactivos" name="formactivos" action="imprimir_por_activos.php">
                    <input type="hidden"  value="Elegir.." name="namegrupo" id="namegrupo" >
                    <input type="hidden"  value="Elegir.."  name="namesub"  id="namesub"  >
                    <div id="general_filter">
                         
                        <fieldset >
                            <legend>Seleccionar datos para filtrar</legend>
                                 <div class="row uniform 50%">
                                    <div  style="width: 30%; text-align: right;" >
                                              <span>Grupo:</span> 
                                          </div>
                                         <div  style="width: 50%;" >
                                              <select onchange="javascript:cargarcombosubgrupoReport(0,this.value);" id="cbogrupo"  name="cbogrupo" >

                                              </select> 
                                          </div>                                                               
                                 </div>
                            
                                <div class="row uniform 50%">
                                    <div  style="width: 30%; text-align: right;" >
                                               <span>Sub-Grupo:</span> 
                                          </div>
                                         <div  style="width: 50%;" >
                                              <select  onchange="javascript:cargarnamesub();" id="cbosubgrupo" name="cbosubgrupo" >
                                                  <option>Elegir...</option> 
                                              </select> 
                                          </div>                                                               
                                 </div>
                            
                            
                        </fieldset>
                        <!--<fieldset>
                            <legend>Opciones de salida</legend>
                            <ul> 
                                <li>
                                    <label>Seleccionar el formato de salida:</label><br>
                                    
                                </li>
                            </ul>
                            <div  style="margin: 0 auto;  width: 200px;height: 60px;margin-top:  -30px; " >
                                <div class="row uniform 50%" style="height: 60px;margin-top:  -50px;"> 
                            <div class="row uniform 50%" style="height: 60px;">
                                    <div  style="width: 40%;  text-align: right; height: 60px; margin-top:  -30px; " >
                                             <input   type="radio" checked="checked" value="pdf" name="outputtype" id="outputtypepdf">                                    
                                          </div>
                                         <div  style="width: 50%; text-align: left; margi:-10px ;height: 60px;margin-top:  -30px; " >
                                             <label for="outputtypepdf" style="cursor: pointer;" >PDF</label>
                                          </div>                                                               
                                 </div>
                                
                                 <div class="row uniform 50%">
                                    <div  style="width: 40%;   text-align: right;margin-top:  -30px; " >
                                            <input    type="radio"   checked="checked" value="xls" name="outputtype" id="outputtypexls">
                                          </div>
                                         <div  style="width: 50%; text-align: left; margin-top:  -30px;  " >
                                             <label for="outputtypexls" style="cursor: pointer;" >EXCEL</label>
                                          </div>                                                               
                                 </div>
                            
                                 </div>
                                 </div>
                            
                        </fieldset>-->
                    </div>
                    <!-- where the response will be displayed -->

                    <p>

                        <input type="hidden" value="report_general" name="caso">
                        <!--<input type="submit" id="send" name="report" value="Mostrar Reportes" class="limebutton ui-state-default ui-corner-all">-->
                         <input type="button"  onclick="document.getElementById('formactivos').submit();"  value="IMPRIMIR REPORTE" name="rcia" id="printrcia" style=" padding: 1px; text-align: center; width: 200px; text-size:10px; height:40px; ">                            
                    </p>

                </form>
            </div>
 <div id='response'>
                <h1 style="color: red"> <?php //echo $mensaje; ?>  </h1>
            </div>
                </div>

            </div>



	 <div id="tabs-2">

			 <div class="menubar-main" align="center">
				<div class="" align="center">
		  
                                     <h1>Generador de reporte de Activos Fijos</h1>
                <form  method="post" id="formactivos2" name="formactivos2" action="imprimir_por_persona.php">
                    <input type="hidden"  value="Elegir.." name="nameper" id="nameper" >                     
                    <input type="hidden"  value="Elegir.."  name="nameregional"  id="nameregional"  >
                    <div id="general_filter">
                         
                        <fieldset >
                            <legend>Seleccionar datos para filtrar</legend>
                                 <div class="row uniform 50%">
                                    <div  style="width: 30%; text-align: right;" >
                                              <span>Regional:</span> 
                                          </div>
                                         <div  style="width: 50%;" >
                                              <select  onchange="javascript:cargarnameregional();" id="cboregional"  name="cboregional" >

                                              </select> 
                                          </div>                                                               
                                 </div>
                            
                                <div class="row uniform 50%">
                                    <div  style="width: 30%; text-align: right;" >
                                               <span>Personal::</span> 
                                          </div>
                                         <div  style="width: 50%;" >
                                              <select  onchange="javascript:cargarnamepersonal();" id="cboPersonal" name="cboPersonal" >
                                                  <option>Elegir...</option> 
                                              </select> 
                                          </div>                                                               
                                 </div>
                            
                            
                        </fieldset>
                   
                    </div>
                    <!-- where the response will be displayed -->

                    <p>

                        <input type="hidden" value="report_general" name="caso">
                        <!--<input type="submit" id="send" name="report" value="Mostrar Reportes" class="limebutton ui-state-default ui-corner-all">-->
                         <input type="button"  onclick="document.getElementById('formactivos2').submit();"  value="IMPRIMIR REPORTE" name="rcia" id="printrcia" style=" padding: 1px; text-align: center; width: 200px; text-size:10px; height:40px; ">                            
                    </p>

                </form>
                                     
                                    
                    </div>
                    </div>
	   </div>
 


 <div id="tabs-3">

			 <div class="menubar-main" align="center">
				<div class="" align="center">
		  
                            <h1>Generador de reporte de Activos Fijos</h1>
                            <form  method="post" id="formactivos3" name="formactivos3" action="imprimir_por_activo_persona.php">
                            <input type="hidden"  value="Elegir.." name="namereg2" id="namereg2" >
                            <input type="hidden"  value="Elegir.."  name="namea"  id="namea"  >
                            <div id="general_filter">
                         
                        <fieldset >
                            <legend>Seleccionar datos para filtrar</legend>
                                 <div class="row uniform 50%">
                                    <div  style="width: 30%; text-align: right;" >
                                              <span>Regional:</span> 
                                          </div>
                                     
                                     <div  style="width: 50%;" >
                                              <select  onchange="javascript:cargarregional2();"  id="cboregional2" name="cboregional2" >
                                                  <option>Elegir..</option> 
                                              </select> 
                                          </div>    
                                                                                                    
                                 </div>
                            
                                <div class="row uniform 50%">
                                    <div  style="width: 30%; text-align: right;" >
                                               <span>Activo Fijo:</span> 
                                          </div>
                                          <div  style="width: 50%;" >
                                              <select  onchange="javascript:cargarnamea();"   id="cboactivo"  name="cboactivo" >
                                                    <option>Elegir..</option>
                                              </select> 
                                          </div>                                                               
                                 </div>
                            
                            
                        </fieldset>
                   
                    </div>
                    <!-- where the response will be displayed -->

                    <p>

                        <input type="hidden" value="report_general" name="caso">
                        <!--<input type="submit" id="send" name="report" value="Mostrar Reportes" class="limebutton ui-state-default ui-corner-all">-->
                         <input type="button"  onclick="document.getElementById('formactivos3').submit();"  value="IMPRIMIR REPORTE" name="rcia3" id="printrcia" style=" padding: 1px; text-align: center; width: 200px; text-size:10px; height:40px; ">                            
                    </p>

                </form>
                                     
                                    
                    </div>
                    </div>
	   </div>
 


                 
                 
            <div id="tabs-4">

                    <div class="menubar-main" align="center">
                        <div class="" align="center">		  
                        <h1>Generador de reporte de Actas de Asignación</h1>
                                
                        <form  method="post" id="formactivosAS" name="formactivosAS" action="imprimir_por_persona_AS.php">
                            <input type="hidden"  value="Elegir.." name="nameperAS" id="nameperAS" >                     
                            <input type="hidden"  value="Elegir.."  name="nameregionalAS"  id="nameregionalAS"  >
                            <div id="general_filter">

                                <fieldset >
                                    <legend>Seleccionar datos para filtrar</legend>
                                         <div class="row uniform 50%" style="height: 2px;">
                                            <div  style="width: 30%; text-align: right;  height: 2px;"  >
                                                
                                               </div>
                                                                                                           
                                         </div>

                                        <div class="row uniform 50%">
                                            <div  style="width: 30%; text-align: right;" >
                                                       <span>Personal:</span> 
                                                  </div>
                                                 <div  style="width: 50%;" >
                                                      <select  onchange="javascript:cargarnamepersonalAS();" id="cboPersonalAS" name="cboPersonalAS" >
                                                          <option>Elegir..</option> 
                                                      </select> 
                                                  </div>                                                               
                                         </div>


                                </fieldset>

                            </div>
                            <!-- where the response will be displayed -->

                            <p>
                                <input type="hidden" value="report_general" name="caso">
                                <!--<input type="submit" id="send" name="report" value="Mostrar Reportes" class="limebutton ui-state-default ui-corner-all">-->
                                 <input type="button"  onclick="document.getElementById('formactivosAS').submit();"  value="IMPRIMIR REPORTE" name="rciaAS" id="printrciaAS" style=" padding: 1px; text-align: center; width: 200px; text-size:10px; height:40px; ">                            
                            </p>

                        </form>


                        </div>
                    </div>
	    </div>
 

                 
                 
            <div id="carga" align="center">
                <h1 style="color: red"> <?php //echo $mensaje; ?>  </h1>
            </div>
        </div>
            
            
            
            
            
            

        </section>

<!-- Footer -->


        </div>

        <!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollgress.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
                        
                          
    <!-- <script src="../libraries/jquery-ui-1.10.2/jquery-1.9.1.js"></script>-->
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />   
    <LINK href="../css/mdryt-jebus.css" type=text/css rel=stylesheet>     
    <link rel="stylesheet" href="../css/jquery-ui.css" />
    <!--<script src="/sistema/libraries/jquery-1.10.3//jquery-1.10.2.min.js"></script>-->
    <script src="../libraries/jquery-1.10.3/jquery-1.10.3.ui.min.js"></script>           
    <script src="../libraries/jquery-validate-1.13.1/jquery-validate-1.13.1.js"></script>
      <script src="smoke.js-master/smoke.min.js" type="text/javascript"></script>
    <script src="smoke.js-master/smoke.js" type="text/javascript"></script>
    <link href="smoke.js-master/smoke.css" rel="stylesheet" type="text/css" />
 <script src="registro_activo.js" type="text/javascript"></script>

	</body>
        
 
 
 
 
 
 <script language="JavaScript">
  $("#hist").css({'background':'#032C02'});
 
   cargarcomboreporte();
   
   
 </script>


</html>
