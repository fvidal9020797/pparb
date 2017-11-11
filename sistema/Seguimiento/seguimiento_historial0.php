<?php
session_start();
/* include "destroy_predio.php"; */
include "../valid.php";
$mensaje = "";

include "../reportes/sqlConsulta.php";
$getSql = new sqlConsulta();



/* inicio descargar en pdf */

if (isset($_REQUEST['historial'])) {
    $codParcela = $_REQUEST['codParcela'];
    $sql = "Select * FROM report_general  where \"ID PARCELA\"='" . $codParcela . "'";
    $resultadoSql = $getSql->ejecutarSql($sql);
    $codRegistro = "";
    ?>
    <!DOCTYPE html>
    <HTML>
        <HEAD><TITLE>Reporte</TITLE>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <link href="../css/mdryt.css" type="text/css" rel="stylesheet">
            <link rel="stylesheet" href="../css/jquery-ui.css">
            <script src="../libraries/jquery-ui-1.10.2/jquery-1.9.1.js"></script>
            <script src="../scripts/jquery-ui.js"></script>
            <link rel="stylesheet" href="/resources/demos/style.css">
            <script src="../libraries/jquery-ui-1.10.2/ui/jquery.ui.core.js"></script>
            <script src="../libraries/jquery-ui-1.10.2/ui/jquery.ui.widget.js"></script>
            <script src="../libraries/jquery-ui-1.10.2/ui/jquery.ui.datepicker.js"></script>
            <script src="../scripts/politico.js"></script>
            <script src="../scripts/checkall.js"></script>
            <link rel="stylesheet" type="text/css" href="../css/button.css" />
            <script>
                $(function() {
                    $("#inicio").datepicker({
                        changeMonth: true,
                        changeYear: true,
                        /*  minDate: 0,*/
                        maxDate: "+5y +1M +10D",
                        dateFormat: "yy-mm-dd"
                    });
                    $("#fin").datepicker({
                        changeMonth: true,
                        changeYear: true,
                        /* minDate: 0, */
                        maxDate: "+5y +1M +10D",
                        dateFormat: "yy-mm-dd"
                    });
                });
            </script>

            <script>
                $(document).ready(function() {
                    $('#form').submit(function() {
                        // show that something is loading
                        $('#response').html("");
                    });

                });

            </script>

            <script>
                $(function() {
                    $("#tabs").tabs({
                    });
                    $("#tabs ul li a").click(function() {
                        document.getElementById("carga").innerHTML = '';
                    });
                    $("#send").click(function() {
                        document.getElementById("carga").innerHTML = '';
                    });
                });

            </script>
        </head>

        <BODY>
            <div id="tabs">
                <ul>

                    <!--<li><a href="#tabs-1"></a></li>-->
                </ul>

                <div id="tabs-1">
                    <div class="menubar-main" align="center">
                        <h1></h1>
                        <div class="" align="center">

                            <div id="general_filter1">
                                <fieldset>

                                    <?php

                                    while ($registro = pg_fetch_array($resultadoSql)) {
                                        $codRegistro = $registro["ID REGISTRO"];

                                        ?>
                                        <div class="CSSTable" >
                                            <table >
                                                <tr>
                                                    <td>

                                                    </td>
                                                    <td >
                                                        <h1 align="center" style=" margin: 0px" >
                                                            DATOS DEL PREDIO
                                                        </h1 >
                                                    </td>
                                                    <td>

                                                    </td>
                                                    <td>

                                                    </td>
                                                </tr>
                                            </TABLE>
                                            <table >
                                                <tr>
                                                    <td>

                                                    </td>
                                                    <td>

                                                    </td>
                                                    <td>

                                                    </td>
                                                    <td>

                                                    </td>
                                                    <td>

                                                    </td>
                                                    <td>

                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="t" >
                                                        <STRONG>CODIGO:</STRONG>
                                                    </td>
                                                    <td class="d">
                                                        <?php echo $registro["ID PARCELA"]; ?>
                                                    </td>

                                                    <td class="t">
                                                        <STRONG>TIPO PROPIEDAD:</STRONG>
                                                    </td>
                                                    <td class="d">
                                                        <?php echo $registro["TIPO PROPIEDAD"]; ?>
                                                    </td>
                                                    <td class="t" >
                                                        <STRONG>SITUACION JURIDICA:</STRONG>
                                                    </td>
                                                    <td class="d">
                                                        <?php echo $registro["SITUACION JURIDICA"]; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="t" >
                                                        <STRONG>NOMBRE:</STRONG>
                                                    </td>
                                                    <td class="d">
                                                        <?php echo $registro["NOMBRE PREDIO"]; ?>
                                                    </td>
                                                    <td class="t">
                                                        <STRONG>ACTIVIDAD:</STRONG>
                                                    </td>
                                                    <td class="d">
                                                        <?php echo $registro["ACTIVIDAD"]; ?>
                                                    </td>
                                                    <td class="t">
                                                        <STRONG>DEPARTAMENTO:</STRONG>
                                                    </td>
                                                    <td class="d">
                                                        <?php echo $registro["DEPARTAMENTO"]; ?>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td class="t" >
                                                        <STRONG>FECHA REGISTRO:</STRONG>
                                                    </td>
                                                    <td class="d">
                                                        <?php echo $registro["FECHA REGISTRO"]; ?>
                                                    </td>
                                                    <td class="t">
                                                        <STRONG>TIPO PROPIEDAD:</STRONG>
                                                    </td>
                                                    <td class="d">
                                                        <?php echo $registro["TIPO PROPIEDAD"]; ?>
                                                    </td>
                                                    <td class="t">
                                                        <STRONG>PROVINCIA:</STRONG>
                                                    </td>
                                                    <td class="d">
                                                        <?php echo $registro["PROVINCIA"]; ?>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td class="t">
                                                        <STRONG>ESTADO DE PREDIO:</STRONG>
                                                    </td>

                                                    <td class="d"

                                                      <?php
                                                      if (trim($registro['ESTADO'])=="HABILITADO")
                                                      {
                                                      ?>
                                                        bgcolor="#7fc345"	<?php
                                                      }
                                                      elseif (trim($registro['ESTADO'])=="RECHAZADO")
                                                      {?>
                                                        bgcolor="#f74d59"	<?php
                                                      } elseif (trim($registro['ESTADO'])=="Boleta Preliquidacion Generada")
                                                      { ?>
                                                         bgcolor="#f4f87d" <?php
                                                       } elseif (trim($registro['ESTADO'])=="EN EVALUACION")
                                                        { ?>
                                                          bgcolor="#ffcc66" <?php
                                                        } elseif (trim($registro['ESTADO'])=="SUSPENSION TEMPORAL")
                                                         { ?>
                                                           bgcolor="#FE642E" <?php
                                                          } elseif (trim($registro['ESTADO'])=="CANCELADO")
                                                           { ?>
                                                              bgcolor="#FE2E2E" <?php
                                                            }

                                                            ?>
                                                            >
                                                            <?php
                                                            echo  $registro['ESTADO'];
                                                              ?>


                                                    </td>

                                                    <td class="t">
                                                        <STRONG>ASESORAMIENTO:</STRONG>
                                                    </td>
                                                    <td class="d">
                                                        <?php echo $registro["ASESORAMIENTO"]; ?>
                                                    </td>
                                                    <td class="t">
                                                        <STRONG>MUNICIPIO:</STRONG>
                                                    </td>
                                                    <td class="d">
                                                        <?php echo $registro["MUNICIPIO"]; ?>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td class="t">
                                                        <STRONG>SUPERFICIE TOTAL(Ha):</STRONG>
                                                    </td>
                                                    <td class="d">
                                                        <?php echo $registro["SUP TOTAL"]; ?>
                                                    </td>

                                                    <td class="t">
                                                        <STRONG>SUPERFICIE DEFORESTADA ILEGAL(Ha):</STRONG>
                                                    </td>
                                                    <td class="d">
                                                        <?php echo $registro["SUP DEFORESTADA ILEGAL"]; ?>
                                                    </td>
                                                    <td class="t">
                                                        <STRONG>SUPERFICIE PAS(Ha):</STRONG>
                                                    </td>
                                                    <td class="d">
                                                        <?php echo $registro["SUP PAS"]; ?>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td class="t">
                                                        <STRONG>REPRESENTANTE NOMBRE:</STRONG>
                                                    </td>
                                                    <td class="d">
                                                        <?php echo $registro["REPRESENTANTE NOMBRE"]; ?>
                                                    </td>

                                                    <td class="t">
                                                        <STRONG>REPRESENTANTE TELEFONO:</STRONG>
                                                    </td>
                                                    <td class="d">
                                                        <?php echo $registro["REPRESENTANTE TELEFONO"]; ?>
                                                    </td>
                                                    <td class="t">
                                                        <STRONG>REPRESENTANTE EMAIL:</STRONG>
                                                    </td>
                                                    <td class="d">
                                                        <?php echo $registro["REPRESENTANTE EMAIL"]; ?>
                                                    </td>

                                                </tr>
                                            </table>
                                        </div>

                                        <?php
                                    }
                                    ?>
                                </fieldset>


                                <fieldset >

                                    <legend align="center" >HISTORIAL CARPETA</legend>


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



                                                    <fieldset > ETAPA PRE - REGISTRO
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

                                        <fieldset > ETAPA REGISTRO
                                            <div class="CSSTable" >
                                                <table >
                                                    <tr>
                                                        <td>
                                                        <strong>Nº</strong>
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

                            <fieldset >
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


<fieldset > ETAPA DE MONITOREO Y EVALUACION
                <div class="CSSTable" >
                    <table >
                        <tr>
                            <td>
                            <strong>N°</strong>
                            </td>
                            <td>
                            <strong>RCIA </strong>
                            </td>
                            <td>
                            <strong>Fecha Recepcion RCIA </strong>
                            </td>
                            <td>
                            <strong>N° de Nota de Derivacion </strong>
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
                            <strong>Observaci�n</strong>
                            </td>
                        </tr>


                        <?php

                        $sqlsolext = "
                        select *
                                                from
                                                 (select
                        			 s.anosolicitud,
                        			 t.nombresolicitud || ' AÑO ' || (s.anosolicitud + 2013)::text  as nombresolicitud,
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
                                                t.nombresolicitud || ' AÑO ' || (s.anosolicitud + 2013)::text  as nombresolicitud,
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
                            <strong>CITE </strong>
                            </td>
                            <td>
                            <strong>Fecha</strong>
                            </td>
                            <td>
                            <strong>Grupo </strong>
                            </td>
                            <td>
                            <strong>Año RCIA</strong>
                            </td>
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
                            <td>
                            <strong>OBS.</strong>
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
                                  <?php echo $notarcia["cite"]; ?>
                              </td>

                              <td >
                                  <?php echo $notarcia["fechaderivacion"]; ?>
                              </td>

                              <td >
                                  <?php echo $notarcia["grupo"]; ?>
                              </td>

                              <td >
                                  <?php echo $notarcia["anosolicitud"]; ?>
                              </td>

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

                              <td >
                                  <?php echo $notarcia["observaciones"]; ?>
                              </td>

                          <?php } ?>



                      </table>
                  </div>
  </fieldset >





                            <fieldset > <?php //echo $sqlsolext;?> OTRAS NOTAS Y SOLICITUDES
                                            <div class="CSSTable" >
                                                <table >
                                                    <tr>
                                                        <td>
                                                        <strong>N°</strong>
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
                                                        <strong>N° Nota de Derivacion </strong>
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
                                                    where idregistro = " . $codRegistro . " and (s.tiposolicitud <> 5 and s.tiposolicitud <> 12 )
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


                                </fieldset>
                                <form  method="post" id="form" action="seguimiento_historial.php">

                                    <p >

                                        <input type="hidden" value="<?php echo $codParcela ?>" name="codParcela">
                                        <input type="hidden" class="boton verde formaBoton" type="submit" id="send" name="report" value="Imprimir Historial" class="">

                                    </p>

                                </form>
                            </div>
                            <!-- where the response will be displayed -->

                            <!-- where the response will be displayed -->


                        </div>
                        <div id='response'>
                            <h1 style="color: red"> <?php echo $mensaje; ?>  </h1>
                        </div>
                    </div>

                </div>

                <div id="carga" align="center">
                    <h1 style="color: red"> <?php echo $mensaje; ?>  </h1>
                </div>

            </div>
        </body>
    </html>
    <?php



}

else
 {

    echo $mensaje = "NO PERMITIDO";
}
?>
