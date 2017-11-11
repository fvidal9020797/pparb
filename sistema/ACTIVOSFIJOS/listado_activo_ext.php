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
 
            <header>
                       
 
            </header>
              
 

            <!-- Main -->
                    <section id="main" class="container 80%">
                        
                        <div class="texto" align="center; " style="margin-top:20px; padding: 0px;" >
                        <b>
                         LISTADO DE ACTIVOS FIJOS                          
                        </b>
                            
                        </div>
                        <div class="texto"  align="center; " style="margin-top:-40px; padding: 0px; text-align: center;" >                        
                            <input  onclick="javascript:cargarListadoActivo_ext(1,0,0);"   id="btnbuscar" style=" padding: 2px; text-align: center; width: 150px; " type="button" value="BUSCAR" />
                        </div>

                            <div class="box">
                                    <form method="post" action="#">
                                         
                                        <div class="row uniform" style="margin-top:0px;">
                                                <div class="12u" style="padding-top:0px; text-align:center; ">                                                                                                        
                                                    <table id="tableActivo" class="table1" >
                                                        <thead>
                                                                <tr>
                                                                         
                                                                    <th style="width:3%; font-size:10px;" scope="col" abbr="Medium">#</th>
                                                                    <th scope="col" abbr="Starter" style="width:8%; font-size:10px; ">Codigo Ucab<input Style="height:20px; font-size:10px;" type="text" value="" name="buscarcoducab" id="buscarcoducab" >  </th>
                                                                        <th style="width:8%; font-size:10px;" scope="col" abbr="Medium">Codigo Mdryt<input Style="height:20px;" type="text" value="" name="buscarcodm" id="buscarcodm"  > </th>
                                                                        <th style="width:15%; font-size:10px; " scope="col" abbr="Business">Nombre<input  Style="height:20px; font-size:10px; " type="text" value="" name="buscarnombre" id="buscarnombre"  > </th> 
                                                                        <th style="width:15%; font-size:10px; " scope="col" abbr="Business">Grupo <select name="buscargrupo" id="buscargrupo"  Style="height:20px; font-size:10px;"  >   </select>  </th> 
                                                                        <th style="width:15%; font-size:10px;" scope="col" abbr="Business">Sub-Grupo <select  name="buscarsubgrupo" id="buscarsubgrupo"  Style="height:20px; font-size:10px;"  >   </select>  </th>
                                                                        <th style="width:13%; font-size:10px; " scope="col" abbr="Business">Observación<select  name="buscarobs"  id="buscarobs"  Style="height:20px; font-size:10px;"  >   </select>  </th>
                                                                         <th style="width:13%; font-size:10px;" scope="col" abbr="Business">Estado<select  name="buscares"  id="buscares"   Style="height:20px; font-size:10px; display:none; "  >   </select>  </th>                                                                        
                                                                </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                             <td>004401-21  </td>
                                                            <td>nombre</td>
                                                            <td>grupo nombre</td>
                                                            <td>grupo nombre</td>
                                                            <td>grupo nombre</td>
                                                            <td>grupo nombre</td>
                                                            <td>grupo nombre</td>
                                                             
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
                            <script src="smoke.js-master/smoke.min.js" type="text/javascript"></script>
    <script src="smoke.js-master/smoke.js" type="text/javascript"></script>
    <link href="smoke.js-master/smoke.css" rel="stylesheet" type="text/css" />
    
     <script src="asignacion_activos.js" type="text/javascript"></script>

	</body>
        
 <script language="JavaScript">

  cargarcomboListadoTodos(); 
  cargarListadoActivo_ext(1,0,0);
 </script>
 <div id="nav">
                                                       
                                                        </div>
                                                    </div>

 
</html>