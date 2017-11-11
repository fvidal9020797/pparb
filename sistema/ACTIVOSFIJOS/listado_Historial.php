<?php

?>

<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html >
	<head>
		<title>Activos fijos - UCAB</title>
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
 
	
                    <div style="height: 35px;" >
 
	 
                    </div>
 



            <!-- Main <section id="main" class="container 100%"> -->
                    <section id="main" style="width:100%" >
                        
                        <div class="texto" align="center; " style="margin-top:20px; padding: 0px;" >
                        <b>
                         HISTORIAL DE ACTIVOS FIJOS                          
                        </b>
                            
                        </div>
                        <div class="texto"  align="center; " style="margin-top:-40px; padding: 0px; text-align: center;" >                        
                            <input  onclick="javascript:cargarListadoHistorial(1,0,0);"   id="btnbuscar" style=" padding: 2px; text-align: center; width: 150px; " type="button" value="BUSCAR" />
                        </div>

                            <div class="box">
                                    <form method="post" action="#">
                                         
                                        <div class="row uniform" style="margin-top:0px;">
                                                <div class="12u" style="padding-top:0px; text-align:center; ">                                                                                                        
                                                    <table id="tableHistorial" class="table1" >
                                                        <thead>
                                                                <tr>
                                                                         
                                                                    <th style="width:3%;" scope="col" abbr="Medium">#</th>
                                                                    <th style="width:5%;" scope="col" abbr="Business">Asig/Devo</th> 
                                                                    <th scope="col" abbr="Starter" style="width:7%;">Codigo Ucab<input Style="height:20px;font-size:11px;" type="text" value="" name="buscarcoducab" id="buscarcoducab" > </th>
                                                                        <th style="width:7%;" scope="col" abbr="Medium">Codigo Mdryt<input Style="height:20px;font-size:11px;" type="text" value="" name="buscarcodm" id="buscarcodm"  > </th>
                                                                         <th style="width:8%;" scope="col" abbr="Medium">Fecha<input Style="height:20px;font-size:11px;" type="text" value="" name="buscarfecha" id="buscarfecha"  > </th> 
                                                                        <th style="width:9%;" scope="col" abbr="Business">Nombre Activo<input  Style="height:20px;font-size:11px;" type="text" value="" name="buscarnombre" id="buscarnombre"  > </th> 
                                                                        <th style="width:9%;" scope="col" abbr="Business">Grupo <select name="buscargrupo" id="buscargrupo"  Style="height:20px;font-size:11px;"  >   </select>  </th> 
                                                                        <th style="width:9%;" scope="col" abbr="Business">Sub-Grupo <select  name="buscarsubgrupo" id="buscarsubgrupo"  Style="height:20px;font-size:11px;"  >   </select>  </th>                                                                        
                                                                        <th style="width:8%;" scope="col" abbr="Business">Estado<select  name="buscares"  id="buscares"   Style="height:20px;font-size:11px;"  >   </select>  </th>
                                                                        <th style="width:9%;" scope="col" abbr="Business">Personal<select  name="buscarpersonal"  id="buscarpersonal"  Style="height:20px;font-size:11px;"  >   </select>  </th>
                                                                        <th style="width:9%;" scope="col" abbr="Business">Departamento<select  name="buscardpto"  id="buscardpto"  Style="height:20px;font-size:11px;"  >   </select>  </th>
                                                                        <th style="width:9%;" scope="col" abbr="Business">Regional<select  name="buscarregional"  id="buscarregional"  Style="height:20px;font-size:11px;"  >   </select>  </th>
                                                                        <th style="width:9%;" scope="col" abbr="Business">Asignado<select  name="buscarasig"  id="buscarasig"   Style="height:20px;font-size:11px;"  >   </select>  </th>
                                                                        <!--<th style="width:5%;" scope="col" abbr="Business">Accion </th>-->
                                                                        <th style="width:5%;" scope="col" abbr="Business">Imp. </th>
                                                                </tr>
                                                        </thead>
                                                        <tbody>
                                                       <!-- <tr>
                                                            <td>1</td>
                                                             <td>004401-21  </td>
                                                            <td>nombre</td>
                                                            <td>grupo nombre</td>
                                                            <td>grupo nombre</td>
                                                            <td>grupo nombre</td>
                                                            <td>grupo nombre</td>
                                                            <td>grupo nombre</td>
                                                            <td style="padding:0px;  ">
                                                                <img src="../images/logosdos/editar.png" onclick="javascript:nuevaFila();"      style="margin-bottom:-6px;width:25px;height:25px; cursor:pointer; padding-bottom:-10px; " alt="Agregar"/>                                                                  
                                                            </td>
                                                        </tr>-->
                                                        </tbody>
                                                    </table>
                                                    <div id="idLoading">
                                                        <div id="div_load" style ="display:none;" class="loading"> </div>
                                                     </div>
                                                     <div class="CSSbordebajo">
                                                      
                                                     </div>
                                                    <div class="pagination" style="margin-bottom: 15px;">
                                                    <div class="pages" id="idPaginado" >
                                                       
                                                     </div>
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
                        <script src="listado_historial.js" type="text/javascript"></script>
                        <script src="../libraries/jquery-1.10.3/jquery-1.10.3.ui.min.js"></script> 
                <link rel="stylesheet" href="../css/jquery-ui.css" />
                

	</body>
        
 <script language="JavaScript">

  cargarcomboHistorialTodos(); 
  cargarListadoHistorial(1,0,0);
 </script>
 
   <script language="JavaScript">

     
      $(function() {
        $("#buscarfecha").datepicker({
            changeMonth: true,
            changeYear: true,
            maxDate: "+5y +1M +10D",
            dateFormat: "yy-mm-dd"
        });

    });

 $("#histl").css({'background':'#032C02'});
 
 
 
 
  $("#buscarcoducab").keypress(function(e) {
    if(e.which == 13) {
        cargarListadoHistorial(1,0,0);
    }
});


  $("#buscarcodm").keypress(function(e) {
    if(e.which == 13) {
        cargarListadoHistorial(1,0,0);
    }
});


  $("#buscarfecha").keypress(function(e) {
    if(e.which == 13) {
        cargarListadoHistorial(1,0,0);
    }
});


  $("#buscarnombre").keypress(function(e) {
    if(e.which == 13) {
        cargarListadoHistorial(1,0,0);
    }
});


 
 </script>
 
 
 <div id="nav">
                                                       
                                                        </div>
                                                    </div>
</html>