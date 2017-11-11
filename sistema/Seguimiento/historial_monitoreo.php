<fieldset > SEGUIMIENTO RCIAS
                <div class="CSSTable" >
                    <table >
                        <tr>
                            <td>
                            <strong>N�</strong>
                            </td>
                            <td>
                            <strong>RCIA </strong>
                            </td>
                            <td>
                            <strong>Fecha Recepcion RCIA </strong>
                            </td>
                            <td>
                            <strong>N� de Nota de Derivacion </strong>
                            </td>
                            <td>
                            <strong>Fecha Derivacion Nota </strong>
                            </td>
                            <td>
                            <strong>Remitente</strong>
                            </td>
                            <td>
                            <strong>Proveido </strong>
                            </td>

                            <td>
                            <strong>Destinario</strong>
                            </td>
                            <td>
                            <strong>Observaci?n</strong>
                            </td>
                        </tr>


                        <?php

                        $sqlsolext = "
                        select *
                                                from
                                                 (select
                        			 s.anosolicitud,
                        			 t.nombresolicitud || ' A�O ' || (s.anosolicitud + 2013)::text  as nombresolicitud,
                                                 s.fecharecepcion as fechanota,
                                                 null::integer as idnotaext,
                                                 s.fecharecepcion::date as fechaderivacion,
                                                 'RECEPCIONADO'::text as proveido,
                                                 s.remitentes as remitente,
                                                 f1.nomcompleto as destinatario,
                                                  null::date as fecharecepcion,
                                                 0::integer as numderivado,
                                                 null::text as observacion,
                                                 0::integer as rcia
                                                 from solicitudrecepcionada as s inner join registro as r on r.idparcela = s.codigoparcela
                                                inner join tiposolicitud as t on s.tiposolicitud = t.idsolicitud
                                                                        full join v_funcionario_general as f1 on f1.idfuncionario = s.idfuncionario
                                                 where s.anosolicitud <> 0 and idregistro = " . $codRegistro . ") as a
                                                union
                                                (select
                                                s.anosolicitud,
                                                t.nombresolicitud || ' A�O ' || (s.anosolicitud + 2013)::text  as nombresolicitud,
                                                s.fecharecepcion as fechanota,
                                                d.idnotaext,
                                                der.fechaderivacion,
                                                der.proveido,
                                                f1.nomcompleto as remitente,
                                                f2.nomcompleto as destinatario,
                                                der.fecharecepcion,
                                                der.numderivado,
                                                d.observacion as observacion,
                                                der.rcia
                                                from solicitudrecepcionada as s
                                                inner join tiposolicitud as t on s.tiposolicitud = t.idsolicitud
                                                inner join registro as r on r.idparcela = s.codigoparcela
                                                full join detallenotaext as d on d.idsolicitudext = s.idsolicitudrecepcionada
                                                full join derivacionnotaext as der on der.idnotaext = d.idnotaext
                                                inner join v_funcionario_general as f1 on f1.idfuncionario = der.remitente
                                                inner join v_funcionario_general as f2 on f2.idfuncionario = der.destinatario
                                                where s.anosolicitud <> 0 and  idregistro = " . $codRegistro . " and (s.tiposolicitud = 5 or s.tiposolicitud = 12)
                                                order by d.idnotaext asc, der.numderivado asc, der.fecharecepcion)
                                                order by anosolicitud,nombresolicitud, fechaderivacion, idnotaext,numderivado"   ;


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


                                                                                <?php
                                                                                if ($registro9["numderivado"]==0) {
                                                                                ?>
                                                                                <td  >
                                                                                 <strong>
                                                                                     <?php echo $registro9["fechanota"]; ?>
                                                                                 </strong>
                                                                                </td>

                                                                                <?php
                                                                                }
                                                                                else
                                                                                {
                                                                                ?>
                                                                                <td > ---  </td>
                                                                                <?php
                                                                                }
                                                                                ?>



                                                                                <td >
                                                                                    <?php echo $registro9["idnotaext"]; ?>
                                                                                </td>

                                                                                 <td >
                                                                                    <?php echo $registro9["fechaderivacion"]; ?>
                                                                                </td>

                                                                                <td >
                                                                                    <?php echo $registro9["remitente"]; ?>
                                                                                </td>

                                                                                <td

                                                                                    <?php
                                                                                    if ($registro9["rcia"] == 269)
                                                                                        {
                                                                                    ?>
                                                                                        bgcolor="#ffcc66"
                                                                                    <?php
                                                                                        }
                                                                                    elseif($registro9["rcia"] == 268)
                                                                                    {
                                                                                    ?>
                                                                                        bgcolor="#f4f87d"
                                                                                    <?php
                                                                                    }

                                                                                    ?>






                                                                                 >
                                                                                   <?php

                                                                                   if ($registro9["rcia"] == 269)
                                                                                   {
                                                                                       echo 'VERIFICACION DE CAMPO';
                                                                                   }
                                                                                   elseif ($registro9["rcia"] == 268)
                                                                                   {
                                                                                       echo 'MONITOREO DE GABINETE';
                                                                                   }
                                                                                   else
                                                                                   {
                                                                                       echo $registro9["proveido"];
                                                                                   }

                                                                                   ?>
                                                                               </td>

                                                                                 <td >
                                                                                  <?php echo $registro9["destinatario"]; ?>
                                                                                 </td>

                                                                                 <td >
                                                                                  <?php echo $registro9["observacion"]; ?>
                                                                                 </td>


                                                                            </tr>

                                                                <?php
                                                                $i = $i + 1;
                                                            }
                                                            ?>




                    </table>
                </div>
</fieldset >



<fieldset > PUNTUACION DE RCIAS EVALUADOS
                <div class="CSSTable" >
                    <table >
                        <tr>
                            <td>
                            <strong>ID NOTA </strong>
                            </td>
                            <td>
                            <strong>CITE </strong>
                            </td>
                            <td>
                            <strong>Fecha</strong>
                            </td>
                            <td>
                            <strong>Grupo </strong>
                            </td>
                            <td>
                            <strong>Referencia </strong>
                            </td>
                            <td>
                            <strong>A�o RCIA</strong>
                            </td>
                            <td>
                            <strong>RCIA Presentado </strong>
                            </td>

                            <?php if(!(strrpos($_SESSION['MM_Rol'],'6')== false)){?>
                            <td>
                            <strong>Eval CPA </strong>
                            </td>
                            <td>
                            <strong>Eval CREBO</strong>
                            </td>
                            <td>
                            <strong>Gab. CPA </strong>
                            </td>
                            <td>
                            <strong>Gab. CREBO</strong>
                            </td>
                            <td>
                            <strong>Campo CPA </strong>
                            </td>
                            <td>
                            <strong>Campo CREBO</strong>
                            </td>
                            <?php } ?>


                            <td>
                            <strong>OBS.</strong>
                            </td>
                            <td>
                            <strong>NOTA FINAL</strong>
                            </td>

                        </tr>

                        <?php

                        $puntuacionrcia = "select * from
                        (select ne.idnotaext, ne.cite, de.fechaderivacion, nm.grupo, nm.referencia
                        from notasexternas as ne inner join derivacionnotaext as de on ne.idnotaext = de.idnotaext
                        inner join monitoreo.notasmonitoreo as nm on nm.idnotaext = ne.idnotaext) as a
                        inner join
                        (select v.idregistro, (r.anosolicitud)::numeric+2013 as anosolicitud, p.rciapresentado, p.evalcpa, p.evalcrebo, p.gabcpa,
                        p.gabcrebo, p.campcpa, p.campcrebo, p.observaciones, p.idnotasmonitoreo
                        from monitoreo.notaspuntuacionrcia as p inner join solicitudrecepcionada as r on p.idsolicitudrcia = r.idsolicitudrecepcionada
                        inner join v_parcela as v on r.codigoparcela = v.idparcela) as b on b.idnotasmonitoreo = a.idnotaext
                        where b.idregistro = " . $codRegistro . " order by anosolicitud";


                        $resultadopuntuacion = $getSql->ejecutarSql($puntuacionrcia);
                          while ($notarcia = pg_fetch_array($resultadopuntuacion)) {
                          ?>
                          <tr>
                              <td >
                                  <?php echo $notarcia["idnotaext"]; ?>
                              </td>

                              <td >
                                  <?php echo $notarcia["cite"]; ?>
                              </td>

                              <td >
                                  <?php echo $notarcia["fechaderivacion"]; ?>
                              </td>

                              <td >
                                  <?php echo $notarcia["grupo"]; ?>
                              </td>

                              <td >
                                  <?php echo $notarcia["referencia"]; ?>
                              </td>

                              <td >
                                  <?php echo $notarcia["anosolicitud"]; ?>
                              </td>

                              <td>
                                  <?php echo $notarcia["rciapresentado"]; ?>
                              </td>


                              <?php if(!(strrpos($_SESSION['MM_Rol'],'6')== false)){?>
                              <td >
                                  <?php echo $notarcia["evalcpa"]; ?>
                              </td>

                              <td >
                                  <?php echo $notarcia["evalcrebo"]; ?>
                              </td>

                              <td >
                                  <?php echo $notarcia["gabcpa"]; ?>
                              </td>

                              <td >
                                  <?php echo $notarcia["gabcrebo"]; ?>
                              </td>

                              <td >
                                  <?php echo $notarcia["campcpa"]; ?>
                              </td>

                              <td >
                                  <?php echo $notarcia["campcrebo"]; ?>
                              </td>
                              <?php } ?>

                              <td >
                                  <?php echo $notarcia["observaciones"]; ?>
                              </td>


                          <?php
                          $evalcpa = '';
                          $evalcrebo = '';
                          $evaltotal = '';

                          // evaluacion de RCIA CPA
                          if (intval($notarcia["evalcpa"]) > 0 && intval($notarcia["evalcpa"]) <= 30)
                          {
                            $evalcpa = 'IT'; //INCUMPLIMIENTO TOTAL
                          }
                          elseif (intval($notarcia["evalcpa"]) >= 31 && intval($notarcia["evalcpa"]) <= 69) {
                            $evalcpa = 'CP'; //CUMPLIMIENTO PARCIAL
                          }
                          elseif (intval($notarcia["evalcpa"]) >= 70) {
                            $evalcpa = 'CT'; // CUMPLIMIENTO TOTAL
                          }
                          elseif (trim($notarcia["evalcpa"]) == 'SC'  || trim($notarcia["evalcpa"]) == 'sc'
                                || trim($notarcia["evalcpa"]) == 'NC' || trim($notarcia["evalcpa"]) == 'nc'
                           ) {
                            //echo('entra a comparar ....');
                            $evalcrebo = 'CT'; //CUMPLIMIENTO TOTAL
                          }



                          // evaluacion de RCIA CREBO
                          if (intval($notarcia["evalcrebo"]) > 0 && intval($notarcia["evalcrebo"]) <= 30)
                          {
                            //echo('entra por INCUMPLIMIENTO total');
                            $evalcrebo = 'IT'; //INCUMPLIMIENTO TOTAL
                          }
                          elseif (intval($notarcia["evalcrebo"]) >= 31 && intval($notarcia["evalcrebo"]) <= 79) {
                            $evalcrebo = 'CP'; //CUMPLIMIENTO PARCIAL
                          }
                          elseif (intval($notarcia["evalcrebo"]) >= 80) {
                            $evalcrebo = 'CT'; //CUMPLIMIENTO TOTAL
                          }

                          elseif (trim($notarcia["evalcrebo"]) == 'SC'  || trim($notarcia["evalcrebo"]) == 'sc'
                                || trim($notarcia["evalcrebo"]) == 'NC' || trim($notarcia["evalcrebo"]) == 'nc'
                           ) {
                            //echo('entra a comparar ....');
                            $evalcrebo = 'CT'; //CUMPLIMIENTO TOTAL
                          }




                          // GABINETE de RCIA CPA
                          if (intval($notarcia["gabcpa"]) > 0 && intval($notarcia["gabcpa"]) <= 30)
                          {
                            $evalcpa = 'IT'; //INCUMPLIMIENTO TOTAL
                          }
                          elseif (intval($notarcia["gabcpa"]) >= 31 && intval($notarcia["gabcpa"]) <= 69) {
                            $evalcpa = 'CP'; //CUMPLIMIENTO PARCIAL
                          }
                          elseif (intval($notarcia["gabcpa"]) >= 70) {
                            $evalcpa = 'CT'; // CUMPLIMIENTO TOTAL
                          }
                          elseif (trim($notarcia["gabcpa"]) == 'SC'  || trim($notarcia["gabcpa"]) == 'sc'
                                || trim($notarcia["gabcpa"]) == 'NC' || trim($notarcia["gabcpa"]) == 'nc'
                           ) {
                            //echo('entra a comparar ....');
                            $evalcrebo = 'CT'; //CUMPLIMIENTO TOTAL
                          }



                          // GABINETE de RCIA CREBO
                          if (intval($notarcia["gabcrebo"]) > 0 && intval($notarcia["gabcrebo"]) <= 30)
                          {
                            //echo('entra por INCUMPLIMIENTO total');
                            $evalcrebo = 'IT'; //INCUMPLIMIENTO TOTAL
                          }
                          elseif (intval($notarcia["gabcrebo"]) >= 31 && intval($notarcia["gabcrebo"]) <= 79) {
                            $evalcrebo = 'CP'; //CUMPLIMIENTO PARCIAL
                          }
                          elseif (intval($notarcia["gabcrebo"]) >= 80) {
                            $evalcrebo = 'CT'; //CUMPLIMIENTO TOTAL
                          }

                          elseif (trim($notarcia["gabcrebo"]) == 'SC'  || trim($notarcia["gabcrebo"]) == 'sc'
                                || trim($notarcia["gabcrebo"]) == 'NC' || trim($notarcia["gabcrebo"]) == 'nc'
                           ) {
                            //echo('entra a comparar ....');
                            $evalcrebo = 'CT'; //CUMPLIMIENTO TOTAL
                          }




                          // CAMPO de RCIA CPA
                          if (intval($notarcia["campcpa"]) > 0 && intval($notarcia["campcpa"]) <= 30)
                          {
                            $evalcpa = 'IT'; //INCUMPLIMIENTO TOTAL
                          }
                          elseif (intval($notarcia["campcpa"]) >= 31 && intval($notarcia["campcpa"]) <= 69) {
                            $evalcpa = 'CP'; //CUMPLIMIENTO PARCIAL
                          }
                          elseif (intval($notarcia["campcpa"]) >= 70) {
                            $evalcpa = 'CT'; // CUMPLIMIENTO TOTAL
                          }
                          elseif (trim($notarcia["campcpa"]) == 'SC'  || trim($notarcia["campcpa"]) == 'sc'
                                || trim($notarcia["campcpa"]) == 'NC' || trim($notarcia["campcpa"]) == 'nc'
                           ) {
                            //echo('entra a comparar ....');
                            $evalcrebo = 'CT'; //CUMPLIMIENTO TOTAL
                          }



                          // CAMPO de RCIA CREBO
                          if (intval($notarcia["campcrebo"]) > 0 && intval($notarcia["campcrebo"]) <= 30)
                          {
                            //echo('entra por INCUMPLIMIENTO total');
                            $evalcrebo = 'IT'; //INCUMPLIMIENTO TOTAL
                          }
                          elseif (intval($notarcia["campcrebo"]) >= 31 && intval($notarcia["campcrebo"]) <= 79) {
                            $evalcrebo = 'CP'; //CUMPLIMIENTO PARCIAL
                          }
                          elseif (intval($notarcia["campcrebo"]) >= 80) {
                            $evalcrebo = 'CT'; //CUMPLIMIENTO TOTAL
                          }

                          elseif (trim($notarcia["campcrebo"]) == 'SC'  || trim($notarcia["campcrebo"]) == 'sc'
                                || trim($notarcia["campcrebo"]) == 'NC' || trim($notarcia["campcrebo"]) == 'nc'
                           ) {
                            //echo('entra a comparar ....');
                            $evalcrebo = 'CT'; //CUMPLIMIENTO TOTAL
                          }











                          if ($evalcpa=='CT' && $evalcrebo=='CT')
                          {
                              $evaltotal='CUMPLIMIENTO TOTAL';
                          }
                          elseif ($evalcpa=='IT' && $evalcrebo=='IT')
                          {
                            $evaltotal='INCUMPLIMIENTO TOTAL';
                          }
                          else
                          {
                            $evaltotal='CUMPLIMIENTO PARCIAL';
                          }


                          ?>


                         <td >
                             <?php echo $evaltotal; ?>
                         </td>

                           <?php } ?>


                      </table>
                  </div>
</fieldset>
