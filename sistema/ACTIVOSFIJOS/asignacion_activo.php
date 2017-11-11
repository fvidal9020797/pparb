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
		<title>Asignacion de Activos fijos </title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
                <link rel="stylesheet" href="activo.css" />
                <link rel="stylesheet" href="loading.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    
	</head>
	<body>
        <input id="idAsg" type="hidden" value='<?php echo $_GET['id'] ?>'>
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
                            <big> <label class="accionm"><span class="accionsombra" id="idtitulo" style="font-size:16px; ">NUEVO</span></label> ASGINACIÓN DE ACTIVOS FIJOS</big>
                        </b>
                        </div>

                            <div class="box">
                                    <form method="post" action="#">
                                        
                                        
                                         <div class="row uniform 50%">
                                             
                                                    <div class="6u 12u(mobilep)">
                                                        
                                                         <div class="row uniform 50%">
                                                              <div  style="width: 35%;" >
                                                                   <span>Codigo Asignación:</span>                                                                    
                                                                </div>
                                                               <div  style="width: 50%; text-align:left;padding-left:0px;" >
                                                                   <input  disabled="disabled" type="text" name="txtcoducab" required="required" id="txtcoducab" value="" placeholder="" />
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="6u 12u(mobilep)">
                                                         <div class="row uniform 50%">
                                                               <div  style="width: 32%;" >
                                                                   <span>Fecha Asignación:</span>                                                                    
                                                                </div>
                                                              <div  style="width: 52%;text-align:left; margin-left:10px;padding-left: 5px; ">                                                                  
                                                                  <input   type="text" name="txtfecha" required="required" id="txtfecha" value=""   placeholder="" />
                                                                </div>
                                                            </div>
                                                    </div>
                                            </div>
                                        
                                          <div class="row uniform 50% " >
                                                    <div class="6u 12u(mobilep)">
                                                           <div class="row uniform 50%">
                                                               <div  style="width: 18%;" >
                                                                    <span>Personal:</span> 
                                                                </div>
                                                               <div  style="width: 80%;" >
                                                                    <select id="cboPersonal" > 
                                                                    </select> 
                                                                </div>                                                              
                                                            </div>
                                                        
                                                    </div>
                                             
                                             
                                                    <div class="6u 12u(mobilep)" >
                                                           
                                                           
                                                             <div class="row uniform 50%">
                                                                 <div  style="width: 22%;" >
                                                                     <span>Departamento:</span>
                                                                 </div>
                                                               <div  style="width: 65%;" >
                                                                    <select onchange="javascript:cargarcomboregional(0,this.value);"  id="cbodpto" >
                                                                      <option  value="volvo">Coordinacion</option> 
                                                                    </select> 
                                                                </div>
                                                              <div  style="width: 12%;text-align:left; margin-left:0px;padding-left: 5px; ">
                                                                    <input       name="btndpto"  id="btndpto" type="button" value="+" style=" padding: 3px; text-align: center; width: 60px; " >
                                                                </div> 
                                                            </div>   
                                                             
                                                    </div>
                                                    
                                            </div>
                                        
                                      <div class="row uniform 50%">
                                                    <div class="6u 12u(mobilep)">                                                          
                                                           <div class="row uniform 50%">
                                                                 <div  style="width: 18%;" >
                                                                     <span>Area:</span>
                                                                 </div>
                                                               <div  style="width: 65%;" >
                                                                    <select   id="cboarea" >
                                                                      <option  value="volvo">Coordinacion</option> 
                                                                    </select> 
                                                                </div>
                                                              <div  style="width: 12%;text-align:left; margin-left:0px;padding-left: 5px; ">
                                                                    <input       name="btndpto"  id="btndpto" type="button" value="+" style=" padding: 3px; text-align: center; width: 60px; " >
                                                                </div> 
                                                            </div>                                                          
                                                    </div>
                                                    <div class="6u 12u(mobilep)">
                                                    
                                                        
                                                        <div class="row uniform 50%">
                                                               <div  style="width: 22%;" >
                                                                     <span>Regional:</span>
                                                                 </div>
                                                               <div  style="width: 65%;" >
                                                                    <select  id="cboregional" >
                                                                      <option value="volvo">Nuevo</option>
                                                                        <option value="saab">Usado</option> 
                                                                        <option value="saab">Otros</option> 
                                                                    </select> 
                                                                </div>
                                                             <div  style="width: 12%;text-align:left; margin-left:0px;padding-left: 5px; ">
                                                                       <input    name="btnregional"  id="btnregional" type="button" value="+" style=" padding: 3px; text-align: center; width: 60px; " >
                                                                </div>
                                                            </div>
                                                        
                                                        
                                                           
                                                    </div>
                                            </div>
                                         <div class="row uniform 50%">
                                                    <div class="12u">
                                                        <span>Lista de Activos Fijos Asignados:</span> 
                                                         <input   onclick="javascript:lanzaraddactivo();"   name="btnadd"  id="btnadd" type="button" value="Agregar" style=" margin-bottom: 5px; padding: 1px;height:25px; text-align: center; width: 100px; font-size:9px;  font-family:  text-decoration: none; Helvetica, sans-serif;" >
                                                          <input   onclick="javascript:deleteRow1('tableActivo');"   name="btndel"  id="btndel" type="button" value="Eliminar" style=" margin-bottom: 5px; padding: 1px;height:25px; text-align: center; width: 100px; font-size:9px;  font-family:  text-decoration: none; Helvetica, sans-serif;" >
                                                           <table id="tableActivo" name="tableActivo" class="table1" >
                                                            <thead>
                                                                    <tr>

                                                                        <th style="width:4%;" scope="col" abbr="Medium">#</th>    
                                                                            <th style="width:3%;" scope="col" abbr="Business">x</th>-
                                                                            <th style="width:11%;" scope="col" abbr="Medium">Codigo Ucab </th>
                                                                            <th style="width:11%;" scope="col" abbr="Business">Codigo Mdryt </th> 
                                                                            <th style="width:55%;" scope="col" abbr="Business">Nombre Activo Fijo  </th>                                                                             
                                                                            <th style="width:14%;" scope="col" abbr="Business"> Estado Asignado </th> 
                                                                    </tr>
                                                            </thead>
                                                        <tbody>
                                                       <!-- <tr>
                                                            <td>1</td> 
                                                            <td style=" vertical-align: middle;" ><input style="transform: scale(1.5);  vertical-align: middle; text-align:center;    height:15px;  border:none font-size:15px; box-shadow: 0px 0px 0px rgba(0, 0, 0, 0); -webkit-box-shadow: 0px 0px 0px rgba(0, 0, 0, 0); -moz-box-shadow: 0px 0px 0px rgba(0, 0, 0, 0); " type="checkbox"></input> </td> 
                                                            <td>002</td>
                                                            <td>00044</td>
                                                            <td>  nombre</td>                                                            
                                                        </tr>-->
                                                        </tbody>
                                                    </table>
                                                        
                                                        
                                                    </div>
                                            </div>
                                        
                                        
                                         
                                         
                                            <div class="row uniform 50%">
                                                    <div class="12u">
                                                        <span>Observación:</span> 
                                                        <textarea name="message" id="message" placeholder="" rows="2"  ></textarea>
                                                    </div>
                                            </div>
                                          <div id="idLoading">
                                            <div id="div_load" style ="display:none;" class="loading">Loading&#8230;</div>
                                          </div>
                                               
                                            <div class="row uniform">
                                                <div class="12u" style="padding-top:10px; text-align:center; ">
                                                            <ul class="actions align-center">
                                                                <li><input   id="btnguardarind" onclick="javascript:guardarasignacion();"  style=" padding: 5px; text-align: center; height:50px; width: 210px; " type="button" value="GUARDAR" /></li>  
                                                                <li><input   id="Back" onclick="javascript:volver();"  style=" padding: 5px; text-align: center; height:50px; width: 210px; " type="button" value="VOLVER" /></li>                              
                                                                <li><input   id="btnguardarimp" onclick="javascript:guardarasignacionimprimir();"  style=" padding: 5px; text-align: center; height:50px; width: 210px; " type="button" value="GUARDAR E IMPRIMIR" /></li>                       
                                                                <li>
                                                                    <form name="form3"   action="imprimir_ascta_asignacion.php" align="middle">
                                                                        </form>
                                                                    <form name="form4"   method="post" action="listado_asignacion.php" align="middle">
                                                                        <input type="hidden" value="84" name="idasig" id="idasig"  >
                                                                         
                                                                     </form>
                                                                 </li>
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
   
      <script src="smoke.js-master/smoke.min.js" type="text/javascript"></script>
    <script src="smoke.js-master/smoke.js" type="text/javascript"></script>
    <link href="smoke.js-master/smoke.css" rel="stylesheet" type="text/css" />
 <script src="asignacion_activos.js" type="text/javascript"></script>
 <!--<script src="../libraries/jquery-1.10.3/jquery-1.10.3.ui.min.js"></script>
 <script src="../libraries/jquery-1.10.3/jquery-1.10.3.ui.min.js"></script> -->          
  <script src="../libraries/jquery-validate-1.13.1/jquery-validate-1.13.1.js"></script>
 <script src="../libraries/jquery-1.10.3/jquery-1.10.2.min.js"></script>
<script src="../libraries/jquery-1.10.3/jquery-1.10.3.ui.min.js"></script>
<link rel="stylesheet" href="../css/jquery-ui.css" />
<script language="JavaScript" src="../scripts/funciones.js"></script>
<LINK href="../css/mdryt.css" type=text/css rel=stylesheet>
<link rel="stylesheet" type="text/css" href="../css/button.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	</body>
      
 
        
        
<div id="dialogo5" class="ventana" style="  padding-top: -10px; display:none;  " title="GESTION">
    <label class="accionm">Acción: <span class="accionsombra" id="idaccion1">Nuevo</span></label>
    <form  style=" margin-top:-20px;padding-top: -10px;"  id="form" action="/sistema/reportes/Report_Predios_1.php" method="POST" name="form-asignacion" id="form-asignacion" class="cmxform" >

 				<div id="data" align="center">
				<div class="col plomo" style="height:150px;" ><!--
				<div align="center" ><strong>ASIGNACIÓN DE TÉCNICOS PARA MONITOREO</strong></div> -->
					<div class="left-content" >

 					   <input id="tipo" type="hidden" value='a'>
 					   <div class="line" ></div>
                                            <div class="left" >
                                                <div id="divdpto" style="display:block;">
                                                    <div class="left-text" ><span>Departamento:</span></div> 
                                                    <select id="cbodptonew" >
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
                           <input type="button"  onclick="javascript:guardarcomboAsignacion(tipo.value);"  value="GUARDAR" name="rcia" id="printrcia" style=" padding: 3px; text-align: center; width: 150px; text-size:10px; height:40px; ">                            
                           <input style=" padding: 3px; text-align: center; width: 150px; text-size:10px; height:40px; " onclick="javascript:cancelar5();"  id="cerrar" name="cerrar"  type="button" role="button" aria-disabled="false" value="Cerrar">
                             
                        </div>
                    </div>
                </form>

</div>
      
        
        

<div id="contextdpto"  >
        <ul>
            <li><a class="monitoreo"  id="dpto" idaccion="Nuevo" href="#">Nuevo</a></li>
            <li><a class="monitoreo" id="dpto" idaccion="Editar" href="#">Editar</a></li>
            <li><a href="javascript:eliminarGrupo(2);">Eliminar</a></li>
        </ul>
    </div>


<div id="contextregional"  >
        <ul>
            <li><a class="monitoreo" id="regional" idaccion="Nuevo" href="#">Nuevo</a></li>
            <li><a class="monitoreo" id="regional" idaccion="Editar" href="#">Editar</a></li>
             <li><a href="javascript:eliminarsubGrupo(2);">Eliminar</a></li>
        </ul>
    </div>  

 
 
 <input id="idregistro" type="hidden" value='0'>
 
 
 
 <script language="JavaScript">
    
   cargarcomboTodosAS();
   
      $(function() {
        $("#txtfecha").datepicker({
            changeMonth: true,
            changeYear: true,
            maxDate: "+5y +1M +10D",
            dateFormat: "yy-mm-dd"
        });

    });
 $("#asigl").css({'background':'#032C02'});
 
 </script>
 <script>
    $( document ).ready(function() {
        debugger;
     if($("#idAsg").val()!="0"){
         
        $("#btndel").css({
            "display":"none"
        });
     }else{
         $("#Back").css({
            "display":"none"
        });
     }
    });
    function volver(){
        window.location.href='listado_asignacion.php';     
    }


  </script>
<input id="conteo" type="hidden" value="0" name="conteo">

</html>
