<table id="notasext"  width="90%" border="0" class='taulaA' align="center" cellspacing="0" <?php if(isset($_SESSION['datos_nota_rcia_puntaje']['chkrciapuntaje']) && $_SESSION['datos_nota_rcia_puntaje']['chkrciapuntaje']<>0){?> style="display:none" <?php } else { ?>  style="display:table-row"; <?php } ?> >

		<tr >
			  <td height="14" colspan="4" id='blau'><span class="taulaH">1. Datos Generales de la Nota</span></td>
		</tr>

		<tr><td colspan="4"><hr></td></tr>

		<tr >
				<td id='blau'>
						<table width="100%" cellspacing="0"   border="0">


                <tr class="taulaA">
                    <td align="right" id='blau3'>CODIGO DE NOTA:</td>
                    <td width="60%" id='blau'><input name="idnotaext" type="text" class="boxRojo"  id="idnotaext"
                       value="<?php if(isset($_SESSION['datos_nota_ext']['idnotaext']) && $_SESSION['datos_nota_ext']['idnotaext']!="") {echo $_SESSION['datos_nota_ext']['idnotaext'];}else{echo "0";}?> " maxlength="50" readonly>
                     </td>
                </tr>

                <tr class="taulaA">
                    <td align="right" id='blau3'>CITE:</td>
                    <td colspan="3"  align="left" id='blau3'>
                        <input id="cite" name="cite" type="text" class="boxBusqueda" value="<?php echo isset($_SESSION['datos_nota_ext']['cite']) ? htmlspecialchars($_SESSION['datos_nota_ext']['cite']) : "";?>"/>
                    </td>
                </tr>



                <tr class="taulaA"  id='blau3'>
                                <td align="right" id="blau3">Fecha Derivacion:</td>
                                <td colspan="3"  align="left" id='blau3'>
                                                <input id="fechaderiv" name="fechaderiv" type="text"
                                                 placeholder="" autofocus="" title=""
                                                value="<?php echo isset($_SESSION['datos_nota_ext']['fechaderiv']) ? htmlspecialchars($_SESSION['datos_nota_ext']['fechaderiv']) : "";?>"/>

                                </td>
                </tr>

                <tr class="taulaA"  id='blau3'>
                    <td align="right" id="blau3">REMITENTE:</td>
                    <td ><select name="comboremitente" class="combos" id="comboremitente">
                      <option value=0>ELEGIR ...</option>
                            <?php
                      $sql_funcionario ="Select idfuncionario,nombre1,apellidopat From persona INNER JOIN funcionario ON persona.idpersona=funcionario.idpersona INNER JOIN codificadores ON funcionario.cargo=codificadores.idcodificadores Where estadofun='A' and idfuncionario > 0 ORDER BY nombre1";
                      $funcionario = pg_query($cn,$sql_funcionario) ;
                      $row_funcionario = pg_fetch_array ($funcionario);

                      do {   ?>
                      <option value="<?php echo $row_funcionario['idfuncionario']?>"
                        <?php  if(isset($_SESSION['datos_nota_ext']['comboremitente']) && $_SESSION['datos_nota_ext']['comboremitente']== $row_funcionario['idfuncionario']){
                              echo " selected";
                      }elseif(isset($row_notaext['remitente']) && $row_notaext['remitente']== $row_funcionario['idfuncionario']){	echo " selected";} ?>
                       > <?php echo $row_funcionario['nombre1']." ".$row_funcionario['apellidopat'] ?></option>
                      <?php } while ($row_funcionario = pg_fetch_assoc($funcionario));	?>
                    </select></td>
                </tr>

                <tr class="taulaA"  id='blau3'>
                    <td align="right" id="blau3">DERIVAR RCIA:</td>
                    <td > <table  >
                            <tr>

                              <td>
                                 <input  style="width:20px; height:20px; vertical-align:top;" type="checkbox" name="rciachk" value="check"
                                 onChange="mostraropcionrcia(this);"
                                 <?php if (!(empty($_SESSION['datos_nota_ext']['rciachk']))) { if($_SESSION['datos_nota_ext']['rciachk']==268 || $_SESSION['datos_nota_ext']['rciachk']==269 || $_SESSION['datos_nota_ext']['rciachk']==266 || $_SESSION['datos_nota_ext']['rciachk']==267 ){ echo " checked='checked' ";}  } ?> >
                              </td>



                              <td name = "opcionrcia" id="opcionrcia" <?php if(isset($_SESSION['datos_nota_ext']['rciachk']) && $_SESSION['datos_nota_ext']['rciachk']<>0){?> style="display:table-row" <?php } else { ?>  style="display:none"; <?php } ?>>
                                <select name="comboaccionrcia" class="combos" id="comboaccionrcia">
                                <option value=0>ELEGIR ...</option>
                                      <?php
                                $sql_accionrcia ="select idcodificadores, nombrecodificador from codificadores as c where idclasificador = 33 order by idcodificadores asc";
                                $accionrcia = pg_query($cn,$sql_accionrcia) ;
                                $row_accionrcia = pg_fetch_array ($accionrcia);

                                do {   ?>
                                <option value="<?php echo $row_accionrcia['idcodificadores']?>"

                                  <?php  if(isset($_SESSION['datos_nota_ext']['rciachk']) && $_SESSION['datos_nota_ext']['rciachk']== $row_accionrcia['idcodificadores']){
                                        echo " selected";
                                }elseif(isset($row_notaext['accionrcia']) && $row_notaext['accionrcia']== $row_accion['idcodificadores']){	echo " selected";} ?>

                                 > <?php echo $row_accionrcia['nombrecodificador'] ?></option>
                                <?php } while ($row_accionrcia = pg_fetch_assoc($accionrcia));	?>
                                </select>
                              </td>

                            </tr>
                        </table>
                    </td>
                </tr>




                <tr class="taulaA"  id='blau3'>
                    <td align="right" id="blau3">ACCION:</td>
                    <td ><select name="comboaccion" class="combos" id="comboaccion">
                      <option value=0>ELEGIR ...</option>
                            <?php
                      $sql_accion ="select idcodificadores, nombrecodificador from codificadores as c where idclasificador = 39";
                      $accion = pg_query($cn,$sql_accion) ;
                      $row_accion = pg_fetch_array ($accion);

                      do {   ?>
                      <option value="<?php echo $row_accion['idcodificadores']?>"

                        <?php  if(isset($_SESSION['datos_nota_ext']['comboaccion']) && $_SESSION['datos_nota_ext']['comboaccion']== $row_accion['idcodificadores']){
                              echo " selected";
                      }elseif(isset($row_notaext['accion']) && $row_notaext['accion']== $row_accion['idcodificadores']){	echo " selected";} ?>

                       > <?php echo $row_accion['nombrecodificador'] ?></option>
                      <?php } while ($row_accion = pg_fetch_assoc($accion));	?>
                    </select></td>
                </tr>


                <tr class="taulaA"  id='blau3'>
                    <td align="right" id="blau3">DESTINATARIO:</td>
                    <td ><select name="combodestinatario" class="combos" id="combodestinatario">
                      <option value=0>ELEGIR ...</option>
                            <?php
                      $sql_funcionario ="Select idfuncionario,nombre1,apellidopat From persona INNER JOIN funcionario ON persona.idpersona=funcionario.idpersona INNER JOIN codificadores ON funcionario.cargo=codificadores.idcodificadores Where estadofun='A' and idfuncionario > 0 ORDER BY nombre1";
                      $funcionario = pg_query($cn,$sql_funcionario) ;
                      $row_funcionario = pg_fetch_array ($funcionario);

                      do {   ?>
                      <option value="<?php echo $row_funcionario['idfuncionario']?>"
                        <?php  if(isset($_SESSION['datos_nota_ext']['combodestinatario']) && $_SESSION['datos_nota_ext']['combodestinatario']== $row_funcionario['idfuncionario']){
                              echo " selected";
                      }elseif(isset($row_notaext['destinatario']) && $row_notaext['destinatario']== $row_funcionario['idfuncionario']){	echo " selected";} ?>
                       > <?php echo $row_funcionario['nombre1']." ".$row_funcionario['apellidopat'] ?></option>
                      <?php } while ($row_funcionario = pg_fetch_assoc($funcionario));	?>
                    </select></td>
                </tr>


                <tr class="taulaA"  id='blau3'>
                    <td align="right" id="blau3">PROVEIDO:</td>
                    <td colspan="3"  align="left" id='blau3'>
                        <input id="proveido" class="CSSTextArea" name="proveido" type="text" value="<?php echo isset($_SESSION['datos_nota_ext']['proveido']) ? htmlspecialchars($_SESSION['datos_nota_ext']['proveido']) : "";?>"/>
                    </td>
                </tr>



						</table>
				</td>
		</tr>

		<tr><td colspan="4"><hr></td></tr>




		<tr>
				<td height="14" colspan="4" id='blau'><span class="taulaH">2. Lista de Solicitud(es) o Nota(s) a derivar</span></td>
		</tr>



    <tr>

        <td height="38" colspan="2">

            <table width="100%" height="63" border="0">

            <tr>
                  <td height="17" colspan="2">
                    <table width="100%" height="68" border="0">


                      <tr>
                            <td align="middle" class="taulaA" id='blau2'>
                            <input type="hidden" name="MM_insert" value="form1" />
                            <input name="submit" type="submit" class='boton verde formaBoton' value="Guardar">


                                <?php
                                if  (isset($_SESSION['datos_nota_ext']['idnotaext']) && $_SESSION['datos_nota_ext']['idnotaext']!="")
                                {
                                ?>
                                    <form action="N_NotaExterna.php" method="post" name="form1" >
                                    <input name="Imprimir" type="submit" class='boton verde formaBoton' value="Imprimir">
                                   </form>
                                <?php
                               }
                                ?>


                            <br>
                            <br>
                            </td>

                          </tr>


                            <tr>
                                    <td align="middle" class="taulaA" id='blau2'>
                                        <input name="submit3" type="button" class='cabecera2' value="Agregar Documento"onClick='lanzarSubmenu();return false;'>
                                        <input name="submit3" type="button" class='cabecera2' value="Eliminar Documento" onClick="eliminarfilas()">

                                    </td>
                            </tr>


                            <tr>
                                  <td>

                                    <table width="95%" id="segui" border="1" class="taulaA">
                                          <tr class="cabecera2" align="center">
                                              <td width="2%"></td>
                                              <td width="2%"></td>
                                              <td width="13%" onclick="javascript:recontarIndice();">CODIGO PARCELA </td>
                                              <td width="25%">NOMBRE PREDIO </td>
                                              <td width="20%">TIPO DE SOLICITUD</td>
                                              <td width="40%">ESTADO</td>
                                          </tr>

                                          <?php
                                          if(isset($_SESSION['datos_nota_ext']['conteo']))
                                          {
																						//echo "entra por coteo existente";
																						$num=$_SESSION['datos_nota_ext']['conteo'];
																					}
                                          else
                                          {
																						$num=$total_row_detalle_nota;
																						//echo "entra por conteo que no existe";
																					}


																					//echo $num;


                                          for ($i = 1; $i <=$num ; $i++) {

                                            if(isset($_SESSION['datos_nota_ext']['idsolicitud'.$i]) || isset($row_detallenotaext['idnotaext']))
                                            {
                                          ?>
                                          <tr >
<!--                                                          <td height="24"></td>-->
                                              <td height="24" style="width: 10dp"> </td>
                                                      <td height="24"><input type="checkbox" name="chk"/></td>

                                                      <td><input name="<?php echo 'idparcela'.$i; ?>" type="text" class="boxBusqueda" readonly value="<?php echo isset($_SESSION['datos_nota_ext']['idparcela'.$i]) ? htmlspecialchars($_SESSION['datos_nota_ext']['idparcela'.$i]) : trim($row_detallenotaext['idparcela']) ;?>"></td>

                                                      <td><input name="<?php echo 'nombre'.$i; ?>" type="text" readonly class="boxBusqueda2"  value="<?php echo isset($_SESSION['datos_nota_ext']['nombre'.$i]) ? htmlspecialchars($_SESSION['datos_nota_ext']['nombre'.$i]) : trim($row_detallenotaext['nombreparcela']) ;?>"></td>

                                                      <td><input name="<?php echo 'estado'.$i; ?>" type="text" class="boxBusqueda" readonly value="<?php echo isset($_SESSION['datos_nota_ext']['estado'.$i]) ? htmlspecialchars($_SESSION['datos_nota_ext']['estado'.$i]) : trim($row_detallenotaext['nombresolicitud']) ;?>"></td>

                                                      <td >
                                                      <textarea class="CSSTextArea" name="<?php echo 'observacionesr'.$i; ?>" id="<?php echo 'observacionesr'.$i; ?>" cols="55" rows="4"><?php echo isset($_SESSION['datos_nota_ext']['observacionesr'.$i]) ? htmlspecialchars(trim($_SESSION['datos_nota_ext']['observacionesr'.$i])) : trim($row_detallenotaext['observacion']);?></textarea>
                                                      </td>

                                                      <td style="display:none"><input  name="<?php echo 'idsolicitud'.$i; ?>" id="<?php echo 'idsolicitud'.$i; ?>" type="text" class="boxBusqueda2" readonly value="<?php echo isset($_SESSION['datos_nota_ext']['idsolicitud'.$i]) ? htmlspecialchars($_SESSION['datos_nota_ext']['idsolicitud'.$i]) : trim($row_detallenotaext['idsolicitudext']) ?>"   ></td >
                                          </tr>

                                          <?php

                                          if(!isset($_SESSION['datos_nota_ext']['conteo']) && isset($row_detallenotaext))
                                              {
                                                $row_detallenotaext = pg_fetch_assoc($detallenotaext);
                                              }

                                             }
                                           }

                                             ?>

                                        <input type="hidden" name="conteo" id="conteo" value="<?php echo isset($_SESSION['datos_nota_ext']['conteo']) ? htmlspecialchars($_SESSION['datos_nota_ext']['conteo']) : $total_row_detalle_nota ?>">

                                      </td>


                                  </table>







                                  </td>
                            </tr>


                      </table>
            </tr>

            <tr>
                  <td width="10%"> <p><span class="taulaH">3. Observaciones:</span></p></td>
                  <td width="90%"><textarea class="CSSTextArea2" name="neobservacion" id="neobservacion" cols="110" rows="4"><?php echo isset($_SESSION['datos_nota_ext']['neobservacion']) ? htmlspecialchars($_SESSION['datos_nota_ext']['neobservacion']) : "";?></textarea></td>
            </tr>
            </table>
        </td>
   </tr>


    <tr><td colspan="4"><hr></td></tr>

    <tr>

      <td align="center">
        <input type="hidden" name="MM_insert" value="form1" />
        <input name="submit" type="submit" class='boton verde formaBoton' value="Guardar">
      </td>


    </tr>

</table>
