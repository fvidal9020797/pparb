<fieldset > HISTORIAL DE FUSIONES:
                                            <div class="CSSTable" >
                                                <table >
                                                    <tr>
                                                        <td>
                                                        <strong>N°</strong>
                                                        </td>
                                                        <td>
                                                        <strong>CODIGO PARCELA </strong>
                                                        </td>
                                                        <td>
                                                        <strong>PREDIO </strong>
                                                        </td>
                                                        <td>
                                                        <strong>MUNICIPIO </strong>
                                                        </td>
                                                        <td>
                                                        <strong>SUP. TOTAL </strong>
                                                        </td>
                                                        <td>
                                                        <strong>TIPO DE PROPIEDAD </strong>
                                                        </td>
                                                        <td>
                                                        <strong>ACTIVIDAD </strong>
                                                        </td>
                                                        <td>
                                                        <strong>FECHA FUSION </strong>
                                                        </td>
                                                        <td>
                                                        <strong>ESTADO </strong>
                                                        </td>
                                                        <td>
                                                        <strong>Imprimir Form 001</strong>
                                                        </td>
                                                    </tr>


                                                    <?php

                                                    $sqlidpadre = "select df.id_padre
                                                    from div_fus as df inner join r_general as r on df.id_padre = r.idregistro
                                                    where df.tipo = '0' and (df.id_padre = ".$codRegistro." or df.id_hijo = ". $codRegistro. " ) limit 1";
                                                    $resulidpadre =  $getSql->ejecutarSql($sqlidpadre);
                                                    $idpadrefusion = pg_fetch_array($resulidpadre);
                                                    $numid = pg_num_rows($resulidpadre);
                                                    $idpadre = $idpadrefusion['id_padre'];

                                                    //echo $sqlidpadre;
                                                    //exit;

                                                    if($numid > 0)
                                                    {

                                                      $sqlfus = "
                                                      select * from
                                                      (select r.idparcela, r.nombrepredio, r.municipio, r.suppredio,  r.".'"TipoProp"'." as tp, r.".'"Clasificacion"'." as cla, df.fecha,'Nuevo Predio Fusionado'::text as p
                                                      from div_fus as df inner join r_general as r on df.id_padre = r.idregistro
                                                      where df.tipo = '0' and df.id_padre = ".$codRegistro." or df.id_hijo = ".$codRegistro."
                                                      limit 1) as x
                                                      union
                                                      (select  r.idparcela, r.nombrepredio, r.municipio, r.suppredio,  r.".'"TipoProp"'." as tp, r.".'"Clasificacion"'." as cla, df.fecha, 'Predio Original Fusionado'::text as p
                                                      from div_fus as df inner join r_general as r on df.id_hijo = r.idregistro
                                                      where df.tipo = '0' and df.id_padre = ".$idpadre." or df.id_hijo = ".$idpadre.")
                                                      order by p asc";


                                                      $resultadofus = $getSql->ejecutarSql($sqlfus);

                                                        $i = 1;
                                                        while ($registrofus = pg_fetch_array($resultadofus)) {
                                                        ?>


                                                                                                          <tr>

                                                                                                              <td >
                                                                                                                  <?php echo $i; ?>
                                                                                                              </td>

                                                                                                              <td >
                                                                                                                  <?php echo $registrofus["idparcela"]; ?>
                                                                                                              </td>

                                                                                                              <td >
                                                                                                                  <?php echo $registrofus["nombrepredio"]; ?>
                                                                                                              </td>

                                                                                                              <td >
                                                                                                                  <?php echo $registrofus["municipio"]; ?>
                                                                                                              </td>

                                                                                                              <td >
                                                                                                                  <?php echo $registrofus["suppredio"]; ?>
                                                                                                              </td>

                                                                                                              <td >
                                                                                                                  <?php echo $registrofus["tp"]; ?>
                                                                                                              </td>

                                                                                                               <td >
                                                                                                                  <?php echo $registrofus["cla"]; ?>
                                                                                                              </td>

                                                                                                              <td >
                                                                                                                 <?php echo $registrofus["fecha"]; ?>
                                                                                                             </td>

                                                                                                             <td bgcolor="#cc9999" >
                                                                                                                <STRONG> <?php echo $registrofus["p"]; ?> </STRONG>
                                                                                                            </td>

                                                                                                            <td >
                                                                                                              <div style="text-align:center;">
                                                                                                                  <form align = "middle" action="seguimiento_historial.php" method="post" name="form4">
                                                                                                                  <input id='Imprimir' name='Imprimir' type='image' width="28" src="../images/logosdos/impresora2.png" value="Imprimir" alt="Imprimir">
                                                                                                                  <input type="hidden" name="codpar" value="<?php echo $registrofus['idparcela']; ?>">
                                                                                                                  </form>
                                                                                                              </div>
                                                                                                           </td>


                                                                                                          </tr>

                                                                                              <?php
                                                                                              $i = $i + 1;
                                                                                          }

                                                              }
                                                                                          ?>


                                                </table>
                                            </div>
</fieldset >

<fieldset > SEGUIMIENTO SOLICITUD DE FUSION
                                            <div class="CSSTable" >
                                                <table >
                                                    <tr>
                                                        <td>
                                                        <strong>N</strong>
                                                        </td>
                                                        <td>
                                                        <strong>Tipo de Solicitud </strong>
                                                        </td>
                                                        <td>
                                                        <strong>Detalle de la Solicitud </strong>
                                                        </td>
                                                        <td>
                                                        <strong>Fecha Recepcion Solicitud </strong>
                                                        </td>
                                                        <td>
                                                        <strong>N Nota de Derivacion </strong>
                                                        </td>
                                                        <td>
                                                        <strong>Fecha Derivacion </strong>
                                                        </td>
                                                        <td>
                                                        <strong>Remitente </strong>
                                                        </td>
														                            <td>
                                                        <strong>Proveido</strong>
                                                        </td>
                                                        <td>
                                                        <strong>Destinatario</strong>
                                                        </td>
                                                        <td>
                                                        <strong>Fecha de Recepcion</strong>
                                                        </td>

                                                    </tr>


                                                    <?php

                                                    $sqlsolext = "
                                                    select t.nombresolicitud || ' ' || coalesce(c.nombrecodificador,'')  as nombresolicitud,
                                                    s.fecharecepcion as fechanota,
                                                    s.observaciones,
                                                    der.fechaderivacion,
                                                    der.fecharecepcion,
                                                    d.idnotaext,
                                                    der.proveido,
                                                    f1.nomcompleto as remitente,
                                                     f2.nomcompleto as destinatario,
                                                     der.numderivado
                                                    from solicitudrecepcionada as s
                                                    inner join tiposolicitud as t on s.tiposolicitud = t.idsolicitud
                                                    inner join registro as r on r.idparcela = s.codigoparcela
                                                    full join detallenotaext as d on d.idsolicitudext = s.idsolicitudrecepcionada
                                                    left join codificadores as c on s.tipodictamen = c.idcodificadores
                                                    full join derivacionnotaext as der on der.idnotaext = d.idnotaext
                                                    full join v_funcionario_general as f1 on f1.idfuncionario = der.remitente
                                                    full join v_funcionario_general as f2 on f2.idfuncionario = der.destinatario
                                                    where idregistro = " . $codRegistro . " and (s.tiposolicitud = 7 )
                                                    order by d.idnotaext asc, der.numderivado asc, der.fecharecepcion
                                                    "   ;
                                                    $resultadoSolext = $getSql->ejecutarSql($sqlsolext);

                                                      $i = 1;
                                                      while ($registro9 = pg_fetch_array($resultadoSolext)) {
                                                      ?>


                                                                                                        <tr>

                                                                                                            <td >
                                                                                                                <?php echo $i; ?>
                                                                                                            </td>

                                                                                                            <td >
                                                                                                                <?php echo $registro9["nombresolicitud"]; ?>
                                                                                                            </td>

                                                                                                            <td >
                                                                                                                <?php echo $registro9["observaciones"]; ?>
                                                                                                            </td>

                                                                                                            <td >
                                                                                                                <?php echo $registro9["fechanota"]; ?>
                                                                                                            </td>

                                                                                                            <td >
                                                                                                                <?php echo $registro9["idnotaext"]; ?>
                                                                                                            </td>

                                                                                                             <td >
                                                                                                                <?php echo $registro9["fechaderivacion"]; ?>
                                                                                                            </td>

                                                                                                            <td >
                                                                                                               <?php echo $registro9["remitente"]; ?>
                                                                                                           </td>

                                                                                                            <td >
                                                                                                                <?php echo $registro9["proveido"]; ?>
                                                                                                            </td>

                                                                                                             <td >
                                                                                                              <?php echo $registro9["destinatario"]; ?>
                                                                                                             </td>

                                                                                                             <td>
                                                                                                              <?php echo $registro9["fecharecepcion"]; ?>
                                                                                                             </td>




                                                                                                        </tr>

                                                                                            <?php
                                                                                            $i = $i + 1;
                                                                                        }
                                                                                        ?>




                                                </table>
                                            </div>
</fieldset >

<fieldset > HITORIAL DE DIVISIONES:
                                            <div class="CSSTable" >
                                                <table >
                                                    <tr>
                                                        <td>
                                                        <strong>N°</strong>
                                                        </td>
                                                        <td>
                                                        <strong>CODIGO PARCELA </strong>
                                                        </td>
                                                        <td>
                                                        <strong>PREDIO </strong>
                                                        </td>
                                                        <td>
                                                        <strong>MUNICIPIO </strong>
                                                        </td>
                                                        <td>
                                                        <strong>SUP. TOTAL </strong>
                                                        </td>
                                                        <td>
                                                        <strong>TIPO DE PROPIEDAD </strong>
                                                        </td>
                                                        <td>
                                                        <strong>ACTIVIDAD </strong>
                                                        </td>
                                                        <td>
                                                        <strong>FECHA DE DIVISION </strong>
                                                        </td>
                                                        <td>
                                                        <strong>ESTADO </strong>
                                                        </td>
                                                        <td>
                                                        <strong>Imprimir Form 001</strong>
                                                        </td>
                                                    </tr>


                                                    <?php

                                                    $sqlidpadrediv = "select df.id_padre
                                                    from div_fus as df inner join r_general as r on df.id_padre = r.idregistro
                                                    where df.tipo = '1' and (df.id_padre = ".$codRegistro." or df.id_hijo = ". $codRegistro. " ) limit 1";
                                                    $resulidpadrediv =  $getSql->ejecutarSql($sqlidpadrediv);
                                                    $idpadredivision = pg_fetch_array($resulidpadrediv);
                                                    $numiddiv = pg_num_rows($resulidpadrediv);
                                                    $idpadrediv = $idpadredivision['id_padre'];


                                                    if($numiddiv > 0)
                                                    {

                                                      $sqlfus = "
                                                      select * from
                                                      (select r.idparcela, r.nombrepredio, r.municipio, r.suppredio,  r.".'"TipoProp"'." as tp, r.".'"Clasificacion"'." as cla, df.fecha,'Predio Antes de la Division'::text as p
                                                      from div_fus as df inner join r_general as r on df.id_padre = r.idregistro
                                                      where df.tipo = '1' and df.id_padre = ".$idpadrediv." limit 1) as x
                                                      union
                                                      (select  r.idparcela, r.nombrepredio, r.municipio, r.suppredio,  r.".'"TipoProp"'." as tp, r.".'"Clasificacion"'." as cla, df.fecha, 'Predio Dividido'::text as p
                                                      from div_fus as df inner join r_general as r on df.id_hijo = r.idregistro
                                                      where df.tipo = '1' and df.id_padre = ".$idpadrediv." )
                                                      order by p asc";


                                                      $resultadofus = $getSql->ejecutarSql($sqlfus);

                                                      $i = 1;
                                                      while ($registrofus = pg_fetch_array($resultadofus)) {
                                                      ?>


                                                                                                        <tr>

                                                                                                            <td >
                                                                                                                <?php echo $i; ?>
                                                                                                            </td>

                                                                                                            <td >
                                                                                                                <?php echo $registrofus["idparcela"]; ?>
                                                                                                            </td>

                                                                                                            <td >
                                                                                                                <?php echo $registrofus["nombrepredio"]; ?>
                                                                                                            </td>

                                                                                                            <td >
                                                                                                                <?php echo $registrofus["municipio"]; ?>
                                                                                                            </td>

                                                                                                            <td >
                                                                                                                <?php echo $registrofus["suppredio"]; ?>
                                                                                                            </td>

                                                                                                            <td >
                                                                                                                <?php echo $registrofus["tp"]; ?>
                                                                                                            </td>

                                                                                                             <td >
                                                                                                                <?php echo $registrofus["cla"]; ?>
                                                                                                            </td>

                                                                                                            <td >
                                                                                                               <?php echo $registrofus["fecha"]; ?>
                                                                                                           </td>

                                                                                                           <td bgcolor="#cc9933" >
                                                                                                             <STRONG>  <?php echo $registrofus["p"]; ?> </STRONG>
                                                                                                          </td>

                                                                                                          <td >
                                                                                                            <div style="text-align:center;">
                                                                                                                <form align = "middle" action="seguimiento_historial.php" method="post" name="form4">
                                                                                                                <input id='Imprimir' name='Imprimir' type='image' width="28" src="../images/logosdos/impresora2.png" value="Imprimir" alt="Imprimir">
                                                                                                                <input type="hidden" name="codpar" value="<?php echo $registrofus['idparcela']; ?>">
                                                                                                                </form>
                                                                                                            </div>
                                                                                                         </td>


                                                                                                        </tr>

                                                                                            <?php
                                                                                            $i = $i + 1;
                                                                                        }

                                                                                      }
                                                                                        ?>




                                                </table>
                                            </div>
</fieldset >

<fieldset > SEGUIMIENTO SOLICITUD DE FUSION
                                            <div class="CSSTable" >
                                                <table >
                                                    <tr>
                                                        <td>
                                                        <strong>N</strong>
                                                        </td>
                                                        <td>
                                                        <strong>Tipo de Solicitud </strong>
                                                        </td>
                                                        <td>
                                                        <strong>Detalle de la Solicitud </strong>
                                                        </td>
                                                        <td>
                                                        <strong>Fecha Recepcion Solicitud </strong>
                                                        </td>
                                                        <td>
                                                        <strong>N Nota de Derivacion </strong>
                                                        </td>
                                                        <td>
                                                        <strong>Fecha Derivacion </strong>
                                                        </td>
                                                        <td>
                                                        <strong>Remitente </strong>
                                                        </td>
														                            <td>
                                                        <strong>Proveido</strong>
                                                        </td>
                                                        <td>
                                                        <strong>Destinatario</strong>
                                                        </td>
                                                        <td>
                                                        <strong>Fecha de Recepcion</strong>
                                                        </td>
                                                    </tr>


                                                    <?php

                                                    $sqlsolext = "
                                                    select t.nombresolicitud || ' ' || coalesce(c.nombrecodificador,'')  as nombresolicitud,
                                                    s.fecharecepcion as fechanota,
                                                    s.observaciones,
                                                    der.fechaderivacion,
                                                    der.fecharecepcion,
                                                    d.idnotaext,
                                                    der.proveido,
                                                    f1.nomcompleto as remitente,
                                                     f2.nomcompleto as destinatario,
                                                     der.numderivado
                                                    from solicitudrecepcionada as s
                                                    inner join tiposolicitud as t on s.tiposolicitud = t.idsolicitud
                                                    inner join registro as r on r.idparcela = s.codigoparcela
                                                    full join detallenotaext as d on d.idsolicitudext = s.idsolicitudrecepcionada
                                                    left join codificadores as c on s.tipodictamen = c.idcodificadores
                                                    full join derivacionnotaext as der on der.idnotaext = d.idnotaext
                                                    full join v_funcionario_general as f1 on f1.idfuncionario = der.remitente
                                                    full join v_funcionario_general as f2 on f2.idfuncionario = der.destinatario
                                                    where idregistro = " . $codRegistro . " and (s.tiposolicitud = 10 )
                                                    order by d.idnotaext asc, der.numderivado asc, der.fecharecepcion
                                                    "   ;
                                                    $resultadoSolext = $getSql->ejecutarSql($sqlsolext);

                                                      $i = 1;
                                                      while ($registro9 = pg_fetch_array($resultadoSolext)) {
                                                      ?>


                                                                                                        <tr>

                                                                                                            <td >
                                                                                                                <?php echo $i; ?>
                                                                                                            </td>

                                                                                                            <td >
                                                                                                                <?php echo $registro9["nombresolicitud"]; ?>
                                                                                                            </td>

                                                                                                            <td >
                                                                                                                <?php echo $registro9["observaciones"]; ?>
                                                                                                            </td>

                                                                                                            <td >
                                                                                                                <?php echo $registro9["fechanota"]; ?>
                                                                                                            </td>

                                                                                                            <td >
                                                                                                                <?php echo $registro9["idnotaext"]; ?>
                                                                                                            </td>

                                                                                                             <td >
                                                                                                                <?php echo $registro9["fechaderivacion"]; ?>
                                                                                                            </td>

                                                                                                            <td >
                                                                                                               <?php echo $registro9["remitente"]; ?>
                                                                                                           </td>

                                                                                                            <td >
                                                                                                                <?php echo $registro9["proveido"]; ?>
                                                                                                            </td>

                                                                                                             <td >
                                                                                                              <?php echo $registro9["destinatario"]; ?>
                                                                                                             </td>

                                                                                                             <td>
                                                                                                              <?php echo $registro9["fecharecepcion"]; ?>
                                                                                                             </td>


                                                                                                        </tr>

                                                                                            <?php
                                                                                            $i = $i + 1;
                                                                                        }
                                                                                        ?>




                                                </table>
                                            </div>
</fieldset >
