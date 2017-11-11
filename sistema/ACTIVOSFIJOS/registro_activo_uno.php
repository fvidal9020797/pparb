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
	</head>
	<body>
		<div id="page-wrapper" style="background-color: #E8F0E8;">

                    <!-- Header -->
 
          <?php    
                    include "menuPrincipal.php";
                    ?>
                    
 
	
                    <div style="height: 40px;" >
 
	 
                    </div>
 



            <!-- Main -->
                    <section id="main" class="container 75%">
                        
                        <div class="texto" align="center; " style="margin-bottom:10px; margin-left: -10px;" >
                        <b>
                            <big> <label class="accionm"><span class="accionsombra" id="idtitulo" style="font-size:16px; ">NUEVO</span></label> REGISTRO DE ACTIVOS FIJOS (Individual)</big>
                        </b>
                        </div>

                            <div class="box">
                                    <form method="post" action="#">
                                        
                                          <div class="row uniform 50%">
                                             
                                                    <div class="6u 12u(mobilep)">
                                                        
                                                         <div class="row uniform 50%">
                                                               <div  style="width: 48%;" >
                                                                   <span>Código Ucab:</span>  
                                                                   <input  disabled="disabled" type="text" name="txtcoducab" required="required" id="txtcoducab" value="" placeholder="" />
                                                                </div>
                                                              <div  style="width: 48%;text-align:left; margin-left:10px;padding-left: 5px; ">
                                                                  <span>Código Mdryt:</span>  
                                                                    <input type="text" name="idcodigomdryt" required="required" id="idcodigomdryt" value="" onkeypress="return blockNonNumbers_a(this, event, true, false);" placeholder="" />
                                                                </div>
                                                            </div>
                                                        
                                                    </div>
                                             
                                             
                                                    <div class="6u 12u(mobilep)" >
                                                          <span> .</span> 
                                                           
                                                          <div class="row uniform 50%">
                                                               <div  style="width: 32%;" >
                                                                   <span>Fecha de Compra:</span>                                                                    
                                                                </div>
                                                              <div  style="width: 51%;text-align:left; margin-left:10px;padding-left: 5px; ">                                                                  
                                                                  <input   type="text" name="txtfecha" required="required" id="txtfecha" value=""   placeholder="" readonly="true"/>
                                                                </div>
                                                            </div>
                                                          
                                                          
                                                             
                                                    </div> 
                                                    
                                            </div>
                                        
                                         <div class="row uniform 50%">
                                                    <div class="6u 12u(mobilep)" >
                                                          <div class="row uniform 50%">
                                                                 <div  style="width: 20%;" >
                                                                     <span>Nombre:</span>
                                                                 </div>
                                                               <div  style="width: 65%;" >
                                                                    <select onchange="javascript:bloquearcombos();"  id="cbonameg" name="cbonameg" >
                                                                      <option value="volvo">Coordinacion</option> 
                                                                    </select> 
                                                                </div>
                                                             <div  style="width: 15%;text-align:left; margin-left:0px;padding-left: 5px; ">
                                                                    <input    name="btnnamea"  id="btnnamea" type="button" value="+" style=" padding: 3px; text-align: center; width: 60px; " >
                                                                </div>
                                                            </div>
                                                        
                                                    </div>
                                                     <div class="6u 12u(mobilep)">
                                                        
                                                          <div class="row uniform 50%">
                                                               <div  style="width: 18%;" >
                                                                    <span>Grupo:</span> 
                                                                </div>
                                                               <div  style="width: 67%;" >
                                                                    <select onchange="javascript:cargarcombosubgrupo(0,this.value);" id="cbogrupo" >
                                                                       
                                                                    </select> 
                                                                </div>
                                                               <div  style="width: 15%;text-align:left; margin-left:0px;padding-left: 5px; ">
                                                                    <input    name="btngrupo"  id="btngrupo" type="button" value="+" style=" padding: 3px; text-align: center; width: 60px; " >
                                                                </div>
                                                            </div>
                                                         
                                                     
                                                    </div>
                                            </div>
                                        
                                            <div class="row uniform 50%">
                                                    <div class="6u 12u(mobilep)">
                                                          
                                                           <div class="row uniform 50%">
                                                                 <div  style="width: 20%;" >
                                                                     <span>Observación:</span>
                                                                 </div>
                                                               <div  style="width: 65%;" >
                                                                    <select id="cboObs" >
                                                                      <option value="volvo">Coordinacion</option> 
                                                                    </select> 
                                                                </div>
                                                             <div  style="width: 15%;text-align:left; margin-left:0px;padding-left: 5px; ">
                                                                    <input  style="display:none;"  name="btnObs"  id="btnObs" type="button" value="+" style=" padding: 3px; text-align: center; width: 60px; " >
                                                                </div>
                                                            </div>
                                                          
                                                    </div>
                                                    <div class="6u 12u(mobilep)">
                                                    
                                                            <div class="row uniform 50%">
                                                              <div  style="width: 18%;" >
                                                                    <span>Sub-Grupo:</span> 
                                                                </div>
                                                               <div  style="width: 67%;" >
                                                                    <select id="cbosubgrupo" >
                                                                      <option value="volvo">Volvo</option>
                                                                      <option value="saab">Saab</option>
                                                                      <option value="mercedes">Mercedes</option>
                                                                      <option value="audi">Audi</option>
                                                                    </select> 
                                                                </div>
                                                              <div  style="width: 15%;text-align:left; margin-left:0px;padding-left: 5px; ">
                                                                      <input    name="btnsubgrupo"  id="btnsubgrupo" type="button" value="+" style=" padding: 3px; text-align: center; width: 60px; " >
                                                                </div>
                                                            </div>
                                                    
                                                        
                                                        
                                                           
                                                    </div>
                                                <div class="6u 12u(mobilep)">
                                                    <div class="row uniform 50%">
                                                               <div  style="width: 18%;" >
                                                                     <span>Estado:</span>
                                                                 </div>
                                                               <div  style="width: 67%;" >
                                                                    <select  id="cboestado" >
                                                                      <option value="volvo">Nuevo</option>
                                                                        <option value="saab">Usado</option> 
                                                                        <option value="saab">Otros</option> 
                                                                    </select> 
                                                                </div>
                                                             <div  style="width: 15%;text-align:left; margin-left:0px;padding-left: 5px; ">
                                                                       <input    name="btnestado"  id="btnestado" type="button" value="+" style=" padding: 3px; text-align: center; width: 60px; display:none;" >
                                                                </div>
                                                            </div>

                                                 </div>
                                            </div>
                                        
                                        
                                            <!--<div class="row uniform 50%">
                                                    <div class="12u">
                                                            <input type="text" name="subject" id="subject" value="" placeholder="Subject" />
                                                    </div>
                                            </div> -->
                                            <div class="row uniform 50%">
                                                    <div class="12u">
                                                        <span>Caracteristicas:</span> 
                                                        <textarea name="message" id="message" placeholder="" rows="2"  ></textarea>
                                                    </div>
                                            </div>
                                            <div class="row uniform">
                                                <div class="12u" style="padding-top:10px; text-align:center; ">
                                                            <ul class="actions align-center">
                                                                <li><input id="btnguardarind" onclick="javascript:guardarIndividual();"  style=" padding: 5px; text-align: center; height:50px; width: 250px; " type="button" value="GUARDAR" /></li>
                                                            </ul>
                                                    </div>
                                            </div>
                                    </form>
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
        
 
<div id="dialogo2" class="ventana" style="  padding-top: -10px; display:none;  " title="GESTION">
    <label class="accionm">Acción: <span class="accionsombra" id="idaccion1">Nuevo</span></label>
    <form  style=" margin-top:-20px;padding-top: -10px;"  id="form" action="/sistema/reportes/Report_Predios_1.php" method="POST" name="form-asignacion" id="form-asignacion" class="cmxform" >

 				<div id="data" align="center">
				<div id="recuadro" class="col plomo" style="height:150px;" ><!--
				<div align="center" ><strong>ASIGNACIÓN DE TÉCNICOS PARA MONITOREO</strong></div> -->
					<div class="left-content" >

 					   <input id="tipo" type="hidden" value='grupo'>
 					<div class="line" ></div>
					<div class="left" >
                                             <div id="divdpto" style="display:block;">
                                                    <div class="left-text" ><span>Grupo:</span></div> 
                                                    <select id="cbogruponew" >
                                                                          <option value="volvo">Coordinacion</option> 
                                                     </select> 
                                                </div>
 						<div class="left-text" ><span>Nombre/Descripción:</span></div>
                                            <div  ><input   id="nombreg" name="nombreg" type="text" value=""  ></div>
 					</div>
 					<div class="line" ></div>
					 
                                   <div class="line-2" ></div>
					<div class="left" >
 						  
         				<div class="right-text">
                                             
 
                            <br>
                            <p style="color: red; text-align: left; text-align:center; " id="msjError"> </p> 
                            </div>
 
			 </div>

                </div>
               </div>
            </div>
                     
                   <div  style="text-align: right; margin-top:20px; ">
                        <div class="ui-dialog-buttonset">
                           <input type="button"  onclick="javascript:guardarcombo(tipo.value);"  value="GUARDAR" name="rcia" id="printrcia" style=" padding: 3px; text-align: center; width: 150px; text-size:10px; height:40px; ">                            
                           <input style=" padding: 3px; text-align: center; width: 150px; text-size:10px; height:40px; " onclick="javascript:cancelar();"  id="cerrar" name="cerrar"  type="button" role="button" aria-disabled="false" value="Cerrar">
                             
                        </div>
                    </div>
                </form>

</div>


        
        

<div id="context"  >
        <ul>
            <li><a class="monitoreo"  id="grupo" idaccion="Nuevo" href="#">Nuevo</a></li>
            <li><a class="monitoreo" id="grupo" idaccion="Editar" href="#">Editar</a></li>
            <li><a href="javascript:eliminarGrupo();">Eliminar</a></li>
        </ul>
    </div>


<div id="contextsub"  >
        <ul>
            <li><a class="monitoreo" id="subgrupo" idaccion="Nuevo" href="#">Nuevo</a></li>
            <li><a class="monitoreo" id="subgrupo" idaccion="Editar" href="#">Editar</a></li>
             <li><a href="javascript:eliminarsubGrupo(2);">Eliminar</a></li>
        </ul>
    </div>  

<div id="contextestado"  >
        <ul>
            <li><a class="monitoreo" id="estado" idaccion="Nuevo" href="#">Nuevo</a></li>
            <li><a class="monitoreo" id="estado" idaccion="Editar" href="#">Editar</a></li>
             <li><a href="javascript:eliminarEstado(2);">Eliminar</a></li>
        </ul>
    </div>  
 
<div id="contextobs"  >
        <ul>
            <li><a class="monitoreo" id="obs" idaccion="Nuevo" href="#">Nuevo</a></li>
            <li><a class="monitoreo" id="obs" idaccion="Editar" href="#">Editar</a></li>
            <li><a href="javascript:eliminarArea(2);">Eliminar</a></li>
        </ul>
    </div> 
 <input id="idregistro" type="hidden" value='0'>
 
 
 
 
 <div id="contextnamea"  >
        <ul>
            <li><a class="monitoreo" id="namea" idaccion="Nuevo" href="#">Nuevo</a></li>
            <li><a class="monitoreo" id="namea" idaccion="Editar" href="#">Editar</a></li>
            <li><a href="javascript:eliminarNombre();">Eliminar</a></li>
        </ul>
    </div> 
  
 
 
 
 <script language="JavaScript">
  $("#regunol").css({'background':'#032C02'});
  cargarcomboTodos();
  
  
  $(function() {
        $("#txtfecha").datepicker({
            changeMonth: true,
            changeYear: true,
            maxDate: "+5y +1M +10D",
            dateFormat: "yy-mm-dd"
        });

    });
    
 </script>


</html>
