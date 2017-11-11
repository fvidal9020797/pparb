<?php
include "page_ganaderaM.php";
//print_r($_SESSION);

?>
<div class="texto">
 <form action="documentos_evaluacion.php" method="POST" autocomplete="off" name="form-docganarcia" id="form-docganarcia" enctype="multipart/form-data" >


  
 <table width="90%" border="0" class='taulaA' align="center">


  <tr class="texto_normal">
    <td id='blau8'>&nbsp;</td>
    <td colspan="2" id='blau'><span class="taulaH">Analisis de Documentación</span></td>
  </tr>

  <tr class="texto_normal">
    <td id='blau4'>&nbsp;</td>
    <td colspan="2" id='blau9'>
		<table width="100%" border="0"> 
		  <tr>
			<td width="49%">

			<table width="100%" border="1" class='taulaA' id="dataTable5" >

            <?php
            if ($periodo == 1)
            {
            ?>
                <tr>
                <td align="center" class="cabecera2" id="blau13">DOCUMENTOS PRESENTADOS</td>
                <td align="center" class="cabecera2" id="blau13">Año 2014</td>
                <td align="center" class="cabecera2" id="blau13">Año 2015</td>
                <td align="center" class="cabecera2" id="blau13">Año 2016</td>
                <td align="center" class="cabecera2" id="blau13">Año 2017</td>
                <td align="center" class="cabecera2" id="blau13">Año 2018</td>
                </tr>

            <?php
            }
            elseif ($periodo == 2)
            {
            ?>
            <tr>
            <td align="center" class="cabecera2" id="blau13">DOCUMENTOS PRESENTADOS</td>
            <td align="center" class="cabecera2" id="blau13">Año 2016</td>
            <td align="center" class="cabecera2" id="blau13">Año 2017</td>
            <td align="center" class="cabecera2" id="blau13">Año 2018</td>
            <td align="center" class="cabecera2" id="blau13">Año 2019</td>
            <td align="center" class="cabecera2" id="blau13">Año 2020</td>
            </tr>
             <?php
            }
             
            ?>
    		<tr>
                  <td align="center" id="blau16"></td> 
                  <td align="center" id="blau16">          						
                       <button type="button" value="Detalle Doc"> Detalle Doc</button>                                
                   </td>
                  <td align="center" id="blau16">          						
                       <button type="button" value="Detalle Doc"> Detalle Doc</button>                                
                   </td>
                    <td align="center" id="blau16">          						
                       <button type="button" value="Detalle Doc"> Detalle Doc</button>                                
                   </td>
                    <td align="center" id="blau16">          						
                       <button type="button" value="Detalle Doc"> Detalle Doc</button>                                
                   </td>
                    <td align="center" id="blau16">          						
                       <button type="button" value="Detalle Doc"> Detalle Doc</button>                                
                   </td>                  
             </tr> 
			</table>



			</td>
		   </tr>
		</table>
    </td>
  </tr>

  <tr class="texto_normal">
    <td id='blau8'>&nbsp;</td>
    <td colspan="2" id='blau'><span class="taulaH">Detalle Analisis de Documentación de Respaldo en RCIA (2016):</span></td>
 
  </tr>
  <tr class="texto_normal">
   <td></td> 
   <td>
  <button type="button" value="0"  onclick="return onclick_agregarDetalle()" > Agregar Detalle</button>      
    </td>
  </tr>

   

</table>
 
<table id="tabladetalle" width="100%" border="0"   >
        <tr>
        <td></td>
          <td align="center" class="cabecera2" id="blau13">DOCUMENTACION</td>
          <td align="center" class="cabecera2" id="blau13">DETALLE DE CONTENIDO</td>
          <td align="center" class="cabecera2" id="blau13">MONTO/CANITDAD</td>
          <td align="center" class="cabecera2" id="blau13">OBSERVACION</td>
          
        </tr>
        <tr>
            <td></td>
            <td align="center" id="blau16"><span  style=" border: 1px solid #d0d0d0;   height: auto;  margin: 0 auto;  overflow: hidden; text-align: left; " > <input style=" border: 1px solid #d0d0d0;   height: auto;  margin: 0 auto;  overflow: hidden; text-align: left; width:250px;" type="text" value="ejemplo"></input> </span> </td>
             <td id='blau'><textarea width="90%" rows="2" name="ObservacionDocGanaderas"  id="ObservacionDocGanaderas"  > Ejemplo</textarea></td>
             <td id='blau'><textarea  rows="2" name="ObservacionDocGanaderas"  id="ObservacionDocGanaderas"  > Ejemplo</textarea></td>
             <td id='blau'><textarea  rows="2" name="ObservacionDocGanaderas"  id="ObservacionDocGanaderas"  > Ejemplo</textarea></td>
        </tr>
 </table>

          <input id="guardarstepdocganarcia" class="boton verde formaBoton" type="submit" value="Guardar" name="guardarstepdocganarcia">
</form>


<div style="height:20px;" ></div>



</div>


<script language="javascript" type="text/javascript">
   function onclick_agregarDetalle() {
      alert("sii") ;
      
 }
    
</script>
