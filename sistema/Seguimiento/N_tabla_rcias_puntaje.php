<script>

function preguntaeliminar(nom,gest){
   if (confirm('¿Esta Seguro que desea eliminar el RCIA del predio '+nom.value+' de la Gestion '+gest.value+' ?'))
   	{return true;}
   else
   	{alert("Tarea Cancelada");return false;}
}

function ponerfoco(nu)
{
  document.getElementById("idparcela"+nu).focus();
}




</script>


<table id="notasrcia"  <?php if(isset($_SESSION['datos_nota_rcia_puntaje']['chkrciapuntaje']) && $_SESSION['datos_nota_rcia_puntaje']['chkrciapuntaje']<>0){?> style="display:table-row" <?php } else { ?>  style="display:none"; <?php } ?> width="90%" border="0" class='taulaA' align="center" cellspacing="0">

		<tr >
			  <td height="14" colspan="4" id='blau'><span class="taulaH">1. Datos Generales</span></td>
		</tr>

		<tr><td colspan="4"><hr></td></tr>

		<tr >
				<td id='blau'>
						<table width="100%" cellspacing="0"   border="0">


                <tr class="taulaA">
                    <td align="right" id='blau3'>CODIGO DE NOTA:</td>
                    <td width="60%" id='blau'><input name="idnotaextm" type="text" class="boxRojo"  id="idnotaextm"
                       value="<?php if(isset($_SESSION['datos_nota_rcia_puntaje']['idnotaextm']) && $_SESSION['datos_nota_rcia_puntaje']['idnotaextm']!="") {echo $_SESSION['datos_nota_rcia_puntaje']['idnotaextm'];}else{echo "0";}?> " maxlength="50" readonly>
                     </td>
                </tr>

                <tr class="taulaA">
                    <td align="right" id='blau3'>CITE:</td>
                    <td colspan="3"  align="left" id='blau3'>
                        <input id="citercia" name="citercia" type="text" class="boxBusqueda" value="<?php echo isset($_SESSION['datos_nota_rcia_puntaje']['citercia']) ? htmlspecialchars($_SESSION['datos_nota_rcia_puntaje']['citercia']) : "";?>"/>
                    </td>
                </tr>

                <tr class="taulaA">
                    <td align="right" id='blau3'>GRUPO:</td>
                    <td colspan="3"  align="left" id='blau2'>
                        <input id="grupo" name="grupo" type="text" class="boxBusqueda" value="<?php echo isset($_SESSION['datos_nota_rcia_puntaje']['grupo']) ? htmlspecialchars($_SESSION['datos_nota_rcia_puntaje']['grupo']) : "";?>"/>
                    </td>
                </tr>



                <tr class="taulaA"  id='blau3'>
                                <td align="right" id="blau3">Fecha:</td>
                                <td colspan="3"  align="left" id='blau3'>
                                                <input id="fechanotarcia" name="fechanotarcia" type="text"
                                                placeholder="" autofocus="" title=""
                                                value="<?php echo isset($_SESSION['datos_nota_rcia_puntaje']['fechanotarcia']) ? htmlspecialchars($_SESSION['datos_nota_rcia_puntaje']['fechanotarcia']) : "";?>"/>

                                </td>
                </tr>

                <tr class="taulaA"  id='blau3'>
                    <td align="right" id="blau3">A:</td>
                    <td ><select name="destino" class="combos" id="destino">
                      <option value=0>ELEGIR ...</option>
                            <?php
                      $sql_funcionario ="Select idfuncionario,nombre1,apellidopat From persona INNER JOIN funcionario ON persona.idpersona=funcionario.idpersona INNER JOIN codificadores ON funcionario.cargo=codificadores.idcodificadores Where estadofun='A' and idfuncionario > 0 ORDER BY nombre1";
                      $funcionario = pg_query($cn,$sql_funcionario) ;
                      $row_funcionario = pg_fetch_array ($funcionario);

                      do {   ?>
                      <option value="<?php echo $row_funcionario['idfuncionario']?>"
                        <?php  if(isset($_SESSION['datos_nota_rcia_puntaje']['destino']) && $_SESSION['datos_nota_rcia_puntaje']['destino']== $row_funcionario['idfuncionario']){
                              echo " selected";
                      }elseif(isset($row_notamonitoreo['dest']) && $row_notamonitoreo['dest']== $row_funcionario['idfuncionario']){	echo " selected";} ?>
                       > <?php echo $row_funcionario['nombre1']." ".$row_funcionario['apellidopat'] ?></option>
                      <?php } while ($row_funcionario = pg_fetch_assoc($funcionario));	?>
                    </select></td>
                </tr>

                <tr class="taulaA"  id='blau3'>
                    <td align="right" id="blau3">VIA:</td>
                    <td ><select name="via1" class="combos" id="via1">
                      <option value=0>ELEGIR ...</option>
                            <?php
                      $sql_funcionario ="Select idfuncionario,nombre1,apellidopat From persona INNER JOIN funcionario ON persona.idpersona=funcionario.idpersona INNER JOIN codificadores ON funcionario.cargo=codificadores.idcodificadores Where estadofun='A' and idfuncionario > 0 ORDER BY nombre1";
                      $funcionario = pg_query($cn,$sql_funcionario) ;
                      $row_funcionario = pg_fetch_array ($funcionario);

                      do {   ?>
                      <option value="<?php echo $row_funcionario['idfuncionario']?>"
                        <?php  if(isset($_SESSION['datos_nota_rcia_puntaje']['via1']) && $_SESSION['datos_nota_rcia_puntaje']['via1']== $row_funcionario['idfuncionario']){
                              echo " selected";
                      }elseif(isset($row_notamonitoreo['via1']) && $row_notamonitoreo['via1']== $row_funcionario['idfuncionario']){	echo " selected";} ?>
                       > <?php echo $row_funcionario['nombre1']." ".$row_funcionario['apellidopat'] ?></option>
                      <?php } while ($row_funcionario = pg_fetch_assoc($funcionario));	?>
                    </select></td>
                </tr>


                <tr class="taulaA"  id='blau3'>
                    <td align="right" id="blau3">VIA:</td>
                    <td ><select name="via2" class="combos" id="via2">
                      <option value=0>ELEGIR ...</option>
                            <?php
                      $sql_funcionario ="Select idfuncionario,nombre1,apellidopat From persona INNER JOIN funcionario ON persona.idpersona=funcionario.idpersona INNER JOIN codificadores ON funcionario.cargo=codificadores.idcodificadores Where estadofun='A' and idfuncionario > 0 ORDER BY nombre1";
                      $funcionario = pg_query($cn,$sql_funcionario) ;
                      $row_funcionario = pg_fetch_array ($funcionario);

                      do {   ?>
                      <option value="<?php echo $row_funcionario['idfuncionario']?>"
                        <?php  if(isset($_SESSION['datos_nota_rcia_puntaje']['via2']) && $_SESSION['datos_nota_rcia_puntaje']['via2']== $row_funcionario['idfuncionario']){
                              echo " selected";
                      }elseif(isset($row_notamonitoreo['via2']) && $row_notamonitoreo['via2']== $row_funcionario['idfuncionario']){	echo " selected";} ?>
                       > <?php echo $row_funcionario['nombre1']." ".$row_funcionario['apellidopat'] ?></option>
                      <?php } while ($row_funcionario = pg_fetch_assoc($funcionario));	?>
                    </select></td>
                </tr>

                <tr class="taulaA"  id='blau3'>
                    <td align="right" id="blau3">DE:</td>
                    <td ><select name="de1" class="combos" id="de1">
                      <option value=0>ELEGIR ...</option>
                            <?php
                      $sql_funcionario ="Select idfuncionario,nombre1,apellidopat From persona INNER JOIN funcionario ON persona.idpersona=funcionario.idpersona INNER JOIN codificadores ON funcionario.cargo=codificadores.idcodificadores Where estadofun='A' and idfuncionario > 0 ORDER BY nombre1";
                      $funcionario = pg_query($cn,$sql_funcionario) ;
                      $row_funcionario = pg_fetch_array ($funcionario);

                      do {   ?>
                      <option value="<?php echo $row_funcionario['idfuncionario']?>"
                        <?php  if(isset($_SESSION['datos_nota_rcia_puntaje']['de1']) && $_SESSION['datos_nota_rcia_puntaje']['de1']== $row_funcionario['idfuncionario']){
                              echo " selected";
                      }elseif(isset($row_notamonitoreo['de1']) && $row_notamonitoreo['de1']== $row_funcionario['idfuncionario']){	echo " selected";} ?>
                       > <?php echo $row_funcionario['nombre1']." ".$row_funcionario['apellidopat'] ?></option>
                      <?php } while ($row_funcionario = pg_fetch_assoc($funcionario));	?>
                    </select></td>
                </tr>

                <tr class="taulaA"  id='blau3'>
                    <td align="right" id="blau3">DE:</td>
                    <td ><select name="de2" class="combos" id="de2">
                      <option value=0>ELEGIR ...</option>
                            <?php
                      $sql_funcionario ="Select idfuncionario,nombre1,apellidopat From persona INNER JOIN funcionario ON persona.idpersona=funcionario.idpersona INNER JOIN codificadores ON funcionario.cargo=codificadores.idcodificadores Where estadofun='A' and idfuncionario > 0 ORDER BY nombre1";
                      $funcionario = pg_query($cn,$sql_funcionario) ;
                      $row_funcionario = pg_fetch_array ($funcionario);

                      do {   ?>
                      <option value="<?php echo $row_funcionario['idfuncionario']?>"
                        <?php  if(isset($_SESSION['datos_nota_rcia_puntaje']['de2']) && $_SESSION['datos_nota_rcia_puntaje']['de2']== $row_funcionario['idfuncionario']){
                              echo " selected";
                      }elseif(isset($row_notamonitoreo['de2']) && $row_notamonitoreo['de2']== $row_funcionario['idfuncionario']){	echo " selected";} ?>
                       > <?php echo $row_funcionario['nombre1']." ".$row_funcionario['apellidopat'] ?></option>
                      <?php } while ($row_funcionario = pg_fetch_assoc($funcionario));	?>
                    </select></td>
                </tr>


                <tr class="taulaA"  id='blau3'>
                    <td align="right" id="blau3">REFERENCIA:</td>
                    <td colspan="3"  align="left" id='blau3'>
                        <input id="referencia" class="CSSTextArea" name="referencia" type="text" value="<?php echo isset($_SESSION['datos_nota_rcia_puntaje']['referencia']) ? htmlspecialchars($_SESSION['datos_nota_rcia_puntaje']['referencia']) : "";?>"/>
                    </td>
                </tr>


								<tr class="taulaA"  id='blau3'>
										<td align="right" id="blau3">CON PUNTUACION DE CAMPO:</td>
										<td colspan="3"  align="left" id='blau3'>
											<input  style="width:20px; height:20px; vertical-align:top;" type="checkbox" id="puntajecampo" name="puntajecampo" value="check"
											<?php if (!(empty($_SESSION['datos_nota_rcia_puntaje']['tiponota']))) { if($_SESSION['datos_nota_rcia_puntaje']['tiponota']==1 ){ echo " checked='checked' ";}  } ?> >
										</td>
								</tr>



						</table>
				</td>
		</tr>

		<tr><td colspan="4"><hr></td></tr>




		<tr>
				<td height="14" colspan="4" id='blau'><span class="taulaH">2. Lista de RCIAS</span></td>
		</tr>



    <tr>

        <td height="38" colspan="2">

            <table width="100%" height="63" border="0">

            <tr>
                  <td height="17" colspan="2">
                    <table width="100%" height="68" border="0">


                            <tr>
                                    <td align="middle" class="taulaA" id='blau2'>
                                        <input name="submit3" type="submit" class='boton verde formaBoton' value="Agregar RCIA" onClick='lanzarSubmenu();return false;'>


                                        <input type="hidden" name="MM_insert_rcia" value="form2" />
                                        <input name="submit_rcia" type="submit" class='boton verde formaBoton' value="Guardar">

                                    </td>

                            </tr>





                            <tr>
                                  <td>


                                                                          <table id="rciaspuntajes" width="100%"  border="1" class="taulaA">
                                                                                <tr class="cabecera2" align="center">
                                                                                    <td >Nº </td>
                                                                                    <td onclick="javascript:recontarIndice();">CODIGO PREDIO </td>
                                                                                    <td >NOMBRE PREDIO </td>
                                                                                    <td >GESTION </td>
                                                                                    <td >RCIA PRESENTADO </td>
                                                                                    <td >EVAL. CPA </td>
                                                                                    <td >EVAL. CREBO </td>
                                                                                    <td >GAB. CPA </td>
                                                                                    <td >GAB. CREBO </td>
                                                                                    <td >CAMPO CPA </td>
                                                                                    <td >CAMPO CREBO </td>
                                                                                    <td >ESTADOS</td>
                                                                                    <td >OBSERVACIONES</td>
                                                                                    <td ></td>
                                                                                </tr>

                                                                                <?php
                                                                                if(isset($_SESSION['datos_nota_rcia_puntaje']['conteorcia']))
                                                                                {
																																									//echo "entra por coteo existente";
																																									$numrcia=$_SESSION['datos_nota_rcia_puntaje']['conteorcia'];}

                                                                                else
                                                                                {
                                                                                  $numrcia=$total_row_detalle_puntuacion;
																																									//echo "entra por conteo que no existe";
                                                                                }

																																								//echo $numrcia;


                                                                   		          for ($i = 1; $i <=$numrcia ; $i++) {

                                                                                  if(isset($_SESSION['datos_nota_rcia_puntaje']['idsolicitud'.$i]) || isset($row_detallepuntuacion['idnotasmonitoreo']))
                                                                                  {
                                                                                ?>
                                                                                <tr >

                                                                                    <td height="24" style="width: 10dp"> <?php echo $i ?> </td>
                                                                                    <td><input id="<?php echo 'idparcela'.$i; ?>" name="<?php echo 'idparcela'.$i; ?>" type="text" class="boxBusqueda2" readonly value="<?php echo isset($_SESSION['datos_nota_rcia_puntaje']['idparcela'.$i]) ? htmlspecialchars($_SESSION['datos_nota_rcia_puntaje']['idparcela'.$i]) : trim($row_detallepuntuacion['idparcela']) ;?>"></td>
                                                                                    <td><input name="<?php echo 'nombre'.$i; ?>" type="text" readonly class="boxBusqueda"  value="<?php echo isset($_SESSION['datos_nota_rcia_puntaje']['nombre'.$i]) ? htmlspecialchars($_SESSION['datos_nota_rcia_puntaje']['nombre'.$i]) : trim($row_detallepuntuacion['nombre']) ;?>"></td>
																																										<td><input name="<?php echo 'gestion'.$i; ?>" type="text" readonly class="boxBusqueda4"  value="<?php echo isset($_SESSION['datos_nota_rcia_puntaje']['gestion'.$i]) ? htmlspecialchars($_SESSION['datos_nota_rcia_puntaje']['gestion'.$i]) : trim($row_detallepuntuacion['anosolicitud']) ;?>"></td>

																																										<td>

																																											<?php $auxr = isset($_SESSION['datos_nota_rcia_puntaje']['rciapresentado'.$i]) ? htmlspecialchars($_SESSION['datos_nota_rcia_puntaje']['rciapresentado'.$i]) : trim($row_detallepuntuacion['rciapresentado']) ;?>

																																											<select name="<?php echo 'rciapresentado'.$i; ?>" class="combos" id="<?php echo 'rciapresentado'.$i; ?>">
																																	                      <option value=0>ELEGIR ...</option>
																																												<option value=1 <?php if( $auxr=="1"){echo 'selected' ;}?> >PRIMER </option>
																																												<option value=2 <?php if( $auxr=="2"){echo 'selected' ;}?> >SEGUNDO </option>
																																												<option value=3 <?php if( $auxr=="3"){echo 'selected' ;}?> >TERCERO </option>
																																												<option value=4 <?php if( $auxr=="4"){echo 'selected' ;}?> >CUARTO </option>
																																												<option value=5 <?php if( $auxr=="5"){echo 'selected' ;}?> >QUINTO </option>
																																	                    </select>



																																										</td>




																																										<td><input name="<?php echo 'evalcpa'.$i; ?>" type="text"  class="boxBusqueda5"    value="<?php echo isset($_SESSION['datos_nota_rcia_puntaje']['evalcpa'.$i]) ? htmlspecialchars($_SESSION['datos_nota_rcia_puntaje']['evalcpa'.$i]) : trim($row_detallepuntuacion['evalcpa']) ;?>"   ></td>
																																										<td><input name="<?php echo 'evalcrebo'.$i; ?>" type="text"  class="boxBusqueda5"  value="<?php echo isset($_SESSION['datos_nota_rcia_puntaje']['evalcrebo'.$i]) ? htmlspecialchars($_SESSION['datos_nota_rcia_puntaje']['evalcrebo'.$i]) : trim($row_detallepuntuacion['evalcrebo']) ;?>"></td>
																																										<td><input name="<?php echo 'gabcpa'.$i; ?>" type="text" class="boxBusqueda5"     value="<?php echo isset($_SESSION['datos_nota_rcia_puntaje']['gabcpa'.$i]) ? htmlspecialchars($_SESSION['datos_nota_rcia_puntaje']['gabcpa'.$i]) : trim($row_detallepuntuacion['gabcpa']) ;?>"></td>
																																										<td><input name="<?php echo 'gabcrebo'.$i; ?>" type="text" class="boxBusqueda5"    value="<?php echo isset($_SESSION['datos_nota_rcia_puntaje']['gabcrebo'.$i]) ? htmlspecialchars($_SESSION['datos_nota_rcia_puntaje']['gabcrebo'.$i]) : trim($row_detallepuntuacion['gabcrebo']) ;?>"></td>
																																										<td><input name="<?php echo 'campcpa'.$i; ?>" type="text" class="boxBusqueda5"    value="<?php echo isset($_SESSION['datos_nota_rcia_puntaje']['campcpa'.$i]) ? htmlspecialchars($_SESSION['datos_nota_rcia_puntaje']['campcpa'.$i]) : trim($row_detallepuntuacion['campcpa']) ;?>"></td>
																																										<td><input name="<?php echo 'campcrebo'.$i; ?>" type="text" class="boxBusqueda5"   value="<?php echo isset($_SESSION['datos_nota_rcia_puntaje']['campcrebo'.$i]) ? htmlspecialchars($_SESSION['datos_nota_rcia_puntaje']['campcrebo'.$i]) : trim($row_detallepuntuacion['campcrebo']) ;?>"></td>

																																										<td>




																																												<?php
																																												$nombreestados = pg_query($cn,"select * from codificadores where idclasificador = 42 and orden = 1 order by idcodificadores asc");
																																												$row_nombreestado = pg_fetch_array ($nombreestados);


																																												for ($k=356; $k <= 357 ; $k++) {

																																													$estadosselec = pg_query($cn,"select * from parcelasestados where codigoparcela = '".$row_detallepuntuacion['idparcela']."'  and idestadoobs =".$k);
																																													$tieneestado = pg_num_rows($estadosselec);
																																												?>
																																												<div>


																																												<input type="checkbox" name="<?php echo 'obs'.$i.$k; ?>" <?php if($tieneestado > 0){ echo " checked='checked' ";}?> > <?php echo $row_nombreestado['nombrecodificador'] ; ?>




																																											</div>

																																												<?php
																																												$row_nombreestado = pg_fetch_array($nombreestados);
																																												}
																																												 ?>


																																										</td>

																																										<td >
                                                                                          <textarea class="CSSTextArea" name="<?php echo 'observacionesr'.$i; ?>" id="<?php echo 'observacionesr'.$i; ?>" cols="55" rows="4"><?php echo isset($_SESSION['datos_nota_rcia_puntaje']['observacionesr'.$i]) ? htmlspecialchars(trim($_SESSION['datos_nota_rcia_puntaje']['observacionesr'.$i])) : trim($row_detallepuntuacion['observaciones']);?></textarea>
                                                                                    </td>

																																									<!--  <td height="24"> -->

																																										<td>
																																												 <!--<input type="checkbox" name="chk" style="display:none"/> -->


																																												<form align="middle" action="N_NotaExterna.php" method="post" name="form1" onSubmit="return preguntaeliminar(pred,anor)">
																																										         <input name="submit_eliminar" type="submit"  value="Eliminar" >
																																										         <input name="idnotaextm" value="<?php echo $_SESSION['datos_nota_rcia_puntaje']['idnotaextm'];?>" type="hidden">
																																														 <input name="idsoldel" value="<?php echo isset($_SESSION['datos_nota_rcia_puntaje']['idsolicitud'.$i]) ? htmlspecialchars($_SESSION['datos_nota_rcia_puntaje']['idsolicitud'.$i]) : trim($row_detallepuntuacion['idsolicitudrcia']) ?>" type="hidden">

																																														 	 <input name="pred" value="<?php echo isset($_SESSION['datos_nota_rcia_puntaje']['nombre'.$i]) ? htmlspecialchars($_SESSION['datos_nota_rcia_puntaje']['nombre'.$i]) : trim($row_detallepuntuacion['nombre']) ;?>" type="hidden">
																																														 <input name="anor" value="<?php echo isset($_SESSION['datos_nota_rcia_puntaje']['gestion'.$i]) ? htmlspecialchars($_SESSION['datos_nota_rcia_puntaje']['gestion'.$i]) : trim($row_detallepuntuacion['anosolicitud']) ;?>" type="hidden">
                                                                                             <input name="cont" value="<?php echo isset($_SESSION['datos_nota_rcia_puntaje']['conteorcia']) ? htmlspecialchars($_SESSION['datos_nota_rcia_puntaje']['conteorcia']) : trim($total_row_detalle_puntuacion) ;?>" type="hidden">

																																												</form>



																																									  </td>





                                                                                    <td style="display:none" ><input  name="<?php echo 'idsolicitud'.$i; ?>" id="<?php echo 'idsolicitud'.$i; ?>" type="text" class="boxBusqueda2" readonly value="<?php echo isset($_SESSION['datos_nota_rcia_puntaje']['idsolicitud'.$i]) ? htmlspecialchars($_SESSION['datos_nota_rcia_puntaje']['idsolicitud'.$i]) : trim($row_detallepuntuacion['idsolicitudrcia']) ?>"   ></td >

                                                                                    <td style="display:none" ><input  name="<?php echo 'idnotacamp'.$i; ?>" id="<?php echo 'idnotacamp'.$i; ?>" type="text" class="boxBusqueda2" readonly value="<?php echo isset($_SESSION['datos_nota_rcia_puntaje']['idnotacamp'.$i]) ? htmlspecialchars($_SESSION['datos_nota_rcia_puntaje']['idnotacamp'.$i]) : trim($row_detallepuntuacion['numnotacamp']) ?>"   ></td >
                                                                                </tr>

                                                                                <?php

                                                                                if(!isset($_SESSION['datos_nota_rcia_puntaje']['conteorcia']) && isset($row_detallepuntuacion))
                                                                                    {
                                                                                      $row_detallepuntuacion = pg_fetch_assoc($detallepuntuacion);
                                                                                    }

                                                                                   }
                                                                                 }

                                                                                   ?>

                                                                              <input type="hidden" name="conteorcia" id="conteorcia" value="<?php echo isset($_SESSION['datos_nota_rcia_puntaje']['conteorcia']) ? htmlspecialchars($_SESSION['datos_nota_rcia_puntaje']['conteorcia']) : $total_row_detalle_puntuacion ?>">

                                                                            </td>


                                                                        </table>






                                  </td>
                            </tr>


                      </table>
            </tr>


            </table>
        </td>
   </tr>


    <tr><td colspan="4"><hr></td></tr>

    <tr>

      <td align="center">
        <input type="hidden" name="MM_insert_rcia" value="form2" />
        <input name="submit_rcia" type="submit" class='boton verde formaBoton' value="Guardar">
      </td>


    </tr>



</table>
