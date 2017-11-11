<?php

  session_start();
 include "../Valid.php";

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */?>
<header style="background:#75AF73; ">
                       
                
 <ul class="nav"> 
                <li   ><a  id="regunol" href="listado_activo.php">Activos Fijos</a>
                    <ul>
                        <li><a id="reguno" href="registro_activo_uno.php">Nuevo Activo Fijo(Individual)</a></li>                                                  
                        <li><a id="reggrup" href="registro_activo_grupal.php">Nuevo Activo Fijo(Grupal)</a></li>
                    </ul>
                </li>
                 
                <li><a id="asigl" href="listado_asignacion.php">Asignación</a>
                    <ul>
                        <li><a id="asig" href="asignacion_activo.php?id=0">Nuevo Asignación</a></li>                          
                    </ul>
                </li>
                <li><a id="devol" href="listado_devoluciones.php">Devolución</a>
                    <ul>
                        <li><a id="devo" href="devolucion_activo.php">Nueva Devolución</a></li>                          
                    </ul>
                </li>
                
                <li><a id="histl" href="listado_Historial.php">Historial</a></li>
                <li><a id="hist" href="reportes_activosfijos.php">Reportes</a></li>
                <!--<li><a href="../Admin.php?id=10" >Salir</a></li>-->

                
</ul>
            </header>

<script language="JavaScript">
  //document.getElementById("titleBar").style="display:none;";
 </script>