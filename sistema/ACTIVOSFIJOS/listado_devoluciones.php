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
 



            <!-- Main -->
                    <section id="main" class="container 80%">
                        
                        <div class="texto" align="center; " style="margin-top:20px; padding: 0px;" >
                        <b>
                         LISTADO DE DEVOLUCIÓN DE ACTIVOS FIJOS                          
                        </b>
                            
                        </div>
                        <div class="texto"  align="center; " style="margin-top:-40px; padding: 0px; text-align: center;" >                        
                            <input  onclick="javascript:cargarListadoDevo(1,0,0);"   id="btnbuscar" style=" padding: 2px; text-align: center; width: 150px; " type="button" value="BUSCAR" />
                        </div>

                            <div class="box">
                                    <form method="post" action="#">
                                         
                                        <div class="row uniform" style="margin-top:0px;">
                                                <div class="12u" style="padding-top:0px; text-align:center; ">                                                                                                        
                                                    <table id="tableAsignacion" class="table1" >
                                                        <thead>
                                                                <tr>
                                                                         
                                                                    <th style="width:3%;" scope="col" abbr="Medium">#</th>
                                                                    <th scope="col" abbr="Starter" style="width:8%;">Codigo<input Style="height:20px;font-size:11px;" type="text" value="" name="buscarcoducab" id="buscarcod" >                                                                       
                                                                        </th>
                                                                        <th style="width:8%;" scope="col" abbr="Medium">Fecha<input Style="height:20px;font-size:11px;" type="text" value="" name="buscarcodm" id="buscarfecha"  > </th>                                                                        
                                                                        <th style="width:16%;" scope="col" abbr="Business">Personal <select name="buscargrupo" id="buscarpersonal"  Style="height:20px;font-size:11px;"  >   </select>  </th>                                                                         
                                                                        <th style="width:16%;" scope="col" abbr="Business">Observación </th>
                                                                        <th style="width:3%;" scope="col" abbr="Business">#Activos</th> 
                                                                        <th style="width:3%;" scope="col" abbr="Business">Ver</th> 
                                                                        <th style="width:3%;" scope="col" abbr="Business">Imprimir</th> 
                                                                </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td id="idloading" ><td>
                                                        </tr>
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
                <script src="devolucion_activos.js" type="text/javascript"></script>
                <script src="../libraries/jquery-1.10.3/jquery-1.10.3.ui.min.js"></script> 
                <link rel="stylesheet" href="../css/jquery-ui.css" />

	</body>
        
 <script language="JavaScript">

  cargarcomboListadoDevolucion(); 
   cargarListadoDevo(1,0,0);
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

$("#devol").css({'background':'#032C02'});


 $("#buscarcod").keypress(function(e) {
    if(e.which == 13) {
        cargarListadoDevo(1,0,0);
    }
});

 $("#buscarfecha").keypress(function(e) {
    if(e.which == 13) {
        cargarListadoDevo(1,0,0);
    }
});




 </script>
 
 
 <div id="nav">
                                                       
                                                        </div>
                                                    </div>
</html>