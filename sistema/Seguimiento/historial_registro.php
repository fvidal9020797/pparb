                                    <?php

                                    $sqlpre = "select 'RECEPCIONADO'::text as estado, pr.fecharecepcion as fecha, v.nomcompleto
                                    from preregistro.preregistro as pr
                                    inner join registro as r on r.idpreregistro = pr.idpreregistro inner join v_funcionario_general as v on v.idfuncionario = pr.funcionario
                                    where r.idregistro = " . $codRegistro . "
                                    UNION
                                    select 'DERIVADO'::text as estado, d.fechaderivacion as fecha, v.nomcompleto
                                    from preregistro.derivacionprereg as d inner join registro as r on r.idpreregistro = d.idpreregistro
                                    inner join v_funcionario_general as v on v.idfuncionario = d.idfuncionario
                                    where r.idregistro = " . $codRegistro . "
                                    order by fecha asc";

                                    $resultadoSqlpre = $getSql->ejecutarSql($sqlpre);

                                  ?>



                                                    <fieldset > PRE-REGISTRO
                                                                    <div class="CSSTable" >
                                                                        <table >
                                                                            <tr>
                                                                                <td>
                                                                                <strong>NUMERO</strong>
                                                                                </td>
                                                                                <td>
                                                                                <strong>ETAPA </strong>
                                                                                </td>
                                                                                <td>
                                                                                <strong>FECHA</strong>
                                                                                </td>
                                                                                <td>
                                                                                <strong>FUNCIONARIO</strong>
                                                                                </td>
                                                                            </tr>


                                                  <?php
                                                  $i = 1;
                                                  while ($registro8 = pg_fetch_array($resultadoSqlpre)) {
                                                  ?>


                                                                                                    <tr>

                                                                                                        <td class="d">
                                                                                                            <?php echo $i; ?>
                                                                                                        </td>

                                                                                                        <td class="d">
                                                                                                            <?php echo $registro8["estado"]; ?>
                                                                                                        </td>
                                                                                                         <td class="d">
                                                                                                            <?php echo $registro8["fecha"]; ?>
                                                                                                        </td>
                                                                                                           <td class="d">
                                                                                                            <?php echo $registro8["nomcompleto"]; ?>
                                                                                                        </td>


                                                                                                    </tr>

                                                                                        <?php
                                                                                        $i = $i + 1;
                                                                                    }
                                                                                    ?>
                                                							</table>
                                                  </div>
                                        </fieldset >






                                    <?php

                                    $sql2 = "

									(select '1'::Text as orden, A.idregistro, A.idparcela, 'Registro'::Text as ESTADO, A.fecharegistro as fecha, A.TecnicoBosques, B.TecnicoAlimentos
									from
									(select r.idregistro, r.idparcela, r.fecharegistro, v.nomcompleto as TecnicoBosques
									from Registro as r inner join funcionarioregistro as fr
									on r.idregistro = fr.idregistro inner join v_funcionario_general as v on fr.idfuncionario = v.idfuncionario
									where v.financiamiento like '%ABT%' and r.idregistro = " . $codRegistro . ") as A FULL JOIN
									(select r.idregistro, v.nomcompleto as TecnicoAlimentos
									from Registro as r inner join funcionarioregistro as fr
									on r.idregistro = fr.idregistro inner join v_funcionario_general as v on fr.idfuncionario = v.idfuncionario
									where v.nombrecargo like '%ALI%' and r.idregistro = " . $codRegistro . ") as B ON A.idregistro = B.idregistro)
									UNION
									(select '2'::Text as orden, idregistro,''::Text,'Boleta de Preliquidacion Emitida':: Text as Fecha, fechapreliquidacion,''::Text,''::Text
									from planpago
									where idregistro = " . $codRegistro . ")
									UNION
									(select '3'::Text as orden, idregistro,''::Text,'Firma de Compromiso':: Text as Fecha, fechasuscripcion,''::Text,''::Text
									from fechasregistro
									where idregistro = " . $codRegistro . ")
									order by orden asc";

                                    $resultadoSql2 = $getSql->ejecutarSql($sql2);

								                  ?>

                                        <fieldset > REGISTRO
                                            <div class="CSSTable" >
                                                <table >
                                                    <tr>
                                                        <td>
                                                        <strong>N�</strong>
                                                        </td>
                                                        <td>
                                                        <strong>ETAPA</strong>
                                                        </td>
                                                        <td>
                                                        <strong>FECHA</strong>
                                                        </td>
                                                        <td>
                                                        <strong>REGISTRADOR BOSQUES</strong>
                                                        </td>
                                                        <td>
                                                        <strong>REGISTRADOR ALIMENTOS</strong>
                                                        </td>
                                                    </tr>


  <?php

                                    while ($registro4 = pg_fetch_array($resultadoSql2)) {
                                        ?>


                                                    <tr>

                                                        <td class="d">
                                                            <?php echo $registro4["orden"]; ?>
                                                        </td>

                                                        <td class="d">
                                                            <?php echo $registro4["estado"]; ?>
                                                        </td>
                                                         <td class="d">
                                                            <?php echo $registro4["fecha"]; ?>
                                                        </td>
                                                           <td class="d">
                                                            <?php echo $registro4["tecnicobosques"]; ?>
                                                        </td>

                                                        <td class="d">
                                                            <?php echo $registro4["tecnicoalimentos"]; ?>
                                                        </td>


                                                    </tr>

                                        <?php
                                    }
                                    ?>
							</table>
                                            </div>
                                        </fieldset >




                                    <?php

                                    $sql1 = "
                                                    select
                                                        ((((((COALESCE(p1.nombre1, ''::bpchar)::text || ' '::text) || COALESCE(p1.nombre2, ''::bpchar)::text) || ' '::text) || COALESCE(p1.apellidopat, ''::bpchar)::text) || ' '::text) || COALESCE(p1.apellidomat, ''::bpchar)::text) ::text AS remitente,
                                                        ((((((COALESCE(p2.nombre1, ''::bpchar)::text || ' '::text) || COALESCE(p2.nombre2, ''::bpchar)::text) || ' '::text) || COALESCE(p2.apellidopat, ''::bpchar)::text) || ' '::text) || COALESCE(p2.apellidomat, ''::bpchar)::text) ::text AS destinatario,
                                                        n.idnota,
                                                        n.idunidad,
                                                        c.nombrecodificador as unidaddestino,
                                                        n.nnota,
                                                         n.fecharegnota,
                                                         n.fechanota,
                                                         dn.idregistro,
                                                         dn.observacionregistro
                                                         from detallenota dn, nota n , codificadores c,funcionario f1, persona p1,  funcionario f2,  persona p2
                                                        where dn.idnota= n.idnota and
                                                        n.iddestinatario = f2.idfuncionario AND
                                                        f1.idfuncionario = n.idremitente AND
                                                        p1.idpersona = f1.idpersona AND
                                                        f2.idpersona = p2.idpersona AND
                                                         dn.idregistro=" . $codRegistro . " and
                                                          n.idunidad= c.idcodificadores
                                                         order by n.fechanota asc"
                                    ;
                                    $resultadoSql1 = $getSql->ejecutarSql($sql1);

?>

                            <fieldset > POST-REGISTRO
                                            <div class="CSSTable" >
                                                <table >
                                                    <tr>
                                                        <td>
                                                        <strong>NRO. NOTA</strong>
                                                        </td>
                                                        <td>
                                                        <strong>UNIDAD</strong>
                                                        </td>
														                            <td>
                                                        <strong>FECHA DE REMISION</strong>
                                                        </td>
                                                        <td>
                                                        <strong>OBSERVACION</strong>
                                                        </td>
                                                        <td>
                                                        <strong>REMITENTE</strong>
                                                        </td>
                                                        <td>
                                                        <strong>DESTINATARIO</strong>
                                                        </td>


                                                    </tr>


  <?php

                                    while ($registro1 = pg_fetch_array($resultadoSql1)) {
                                        ?>


                                                    <tr>

                                                        <td >
                                                            <?php echo $registro1["nnota"]; ?>
                                                        </td>

                                                        <td >
                                                            <?php echo $registro1["unidaddestino"]; ?>
												        <td >
                                                            <?php echo $registro1["fechanota"]; ?>
                                                        </td>
                                                        </td>
                                                         <td >
                                                            <?php echo $registro1["observacionregistro"]; ?>
                                                        </td>
                                                           <td >
                                                            <?php echo $registro1["remitente"]; ?>
                                                        </td>
														</td>
                                                           <td >
                                                            <?php echo $registro1["destinatario"]; ?>
                                                        </td>




                                                    </tr>

                                        <?php
                                    }
                                    ?>
										</table>
                                            </div>
                                        </fieldset >





										 <?php

?>
