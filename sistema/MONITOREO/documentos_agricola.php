<?php
include "page_agricolaM.php";
//print_r($_SESSION);
?>

<div class="texto">
 <form action="documentos_agricola.php" method="POST" autocomplete="off" name="form-docagrircia" id="form-docagrircia" enctype="multipart/form-data" >



 <table width="90%" border="0" class='taulaA' align="center">


  <tr class="texto_normal">
    <td id='blau8'>&nbsp;</td>
    <td colspan="2" id='blau'><span class="taulaH">Actividad Agricola</span></td>
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

					$sql_documentos = "select * from codificadores where idclasificador = 35 and orden = 1 order by idcodificadores asc";
					$documentos = pg_query($cn,$sql_documentos);
					$row_documentos = pg_fetch_array ($documentos);
					$totalRows_documentos = pg_num_rows($documentos);

			  do
        {
    		?>
    			  <tr>
                  <td align="center" id="blau16"><?php echo $row_documentos['nombrecodificador']?> </td>

                  <?php

                  $cont = 1;

                  if ($periodo == 1)
                  {
                    $anoacti = 1;
                  }
                  elseif ($periodo == 2)
                  {
                    $anoacti = 3;
                  }

                  while ($cont <= 5)
                  {

                    $sql_ano_activo = "select anho from monitoreo.monitoreo where estado = 1 and idregistro = ".$_SESSION['idreg']."and anho =".$anoacti;
                    $anoactivo = pg_query($cn,$sql_ano_activo) ;
                    $row_ano = pg_fetch_array ($anoactivo);
                    $totalRows_ano = pg_num_rows($anoactivo);
                    $anoactivomon = 0;
                    if($totalRows_ano>0)
                    {
                    $anoactivomon = $row_ano['anho'];
                    }

                  ?>
                    <td align="center" id="blau16">
          						<span class="TituloCajaNegocios">
          						  <select name="<?php echo $row_documentos['idcodificadores'].'-'.$cont?>" class="combos" <?php if ($anoactivomon==0) {?> disabled <?php }  ?>  id="<?php echo $row_documentos['idcodificadores'].'-'.$cont?>">


                          <?php
                          $aux = $row_docrciaagricola['presento'];
                          $auxano = $row_docrciaagricola['anho'];

                          if ($auxano == $anoacti)
                          {
                                if ($aux != null)
                                {
                                ?>
                                  <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>NO </option>
                                  <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>SI</option>

                                <?php
                                }
                                else
                                {
                                ?>

                                  <option value=0 >NO</option>
                                  <option value=1 >SI</option>

                                <?php
                                }

                                  if(isset($row_docrciaagricola )){ $row_docrciaagricola = pg_fetch_assoc($rcia_doc_agricola); }

                          }
                          else
                          {
                            ?>
                            <option value=0 >NO</option>
                            <option value=1 >SI</option>
                           <?php
                          }
                          ?>




          						  </select>
          						</span>
          					</td>

                  <?php
                  $cont = $cont+1;
                  $anoacti = $anoacti + 1;
                  }
                  ?>

            </tr>

   			  <?php
       }
       while ($row_documentos = pg_fetch_assoc($documentos));?>





			</table>

			</td>


		   </tr>
		</table>
    </td>
  </tr>

  <tr class="texto_normal">
    <td id='blau8'>&nbsp;</td>
    <td colspan="2" id='blau'><span class="taulaH">Otros (Herramientas menores, repuestos para maquinaria, etc.):</span></td>
  </tr>


  <tr class="texto_normal">
    <td id='blau8'>&nbsp;</td>
    <td colspan="2" id='blau'><textarea name="ObservacionDocAgricolas" id="ObservacionDocAgricolas" cols="200" rows="5"><?php echo trim($obsagricolarciadoc['obs']);?></textarea></td>
  </tr>

</table>

          <input id="guardarstepdocagrircia" class="boton verde formaBoton" type="submit" value="Guardar" name="guardarstepdocagrircia">
</form>
</div>
