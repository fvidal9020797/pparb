<script type="text/javascript">


$(document).ready(function(){

$(".derivardoc").click(function() {

  var ref=$(this).attr("h");
  window.open(ref,"Derivar Documentacion","width=600,height=500,scrollbars=yes,toolbar=no,status=no");

});

$(".editardoc").click(function() {

  var ref=$(this).attr("h");
  window.open(ref,"Editar observacion y estado","width=600,height=500,scrollbars=yes,toolbar=no,status=no");

});


  });

</script>

<!--
<form action="seguimiento_historial.php" method="post" name="form1">
    <input type='image' width="28" src='../images/logosdos/consulta.png' onClick="this.form1.submit();">
    <input type="hidden" name="codParcela" value="<?php //echo $codParcela ?>">
    <input type="hidden" name="historial" value="">
    <input type="hidden" name="mostrartabla3" value="">
</form> -->


<fieldset > SEGUIMIENTO A SOLICITUDES

                                            <div class="CSSTable" >
                                                <table >
                                                    <tr>
                                                        <td>
                                                        <strong>N�</strong>
                                                        </td>
                                                        <td>
                                                        <strong>Tipo de Solicitud </strong>
                                                        </td>
                                                        <td>
                                                        <strong>N de Solicitud </strong>
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
                                                        <strong>Observacion</strong>
                                                        </td>
                                                        <td>
                                                        <strong>Estado</strong>
                                                        </td>
                                                        <td>
                                                        <strong>Derivar</strong>
                                                        </td>
                                                        <td>
                                                        <strong>Editar</strong>
                                                        </td>
                                                    </tr>


                                                    <?php
                                                    $sqlsolicitudes = "select s.* from solicitudrecepcionada as s inner join v_parcela as p on s.codigoparcela = p.idparcela
                                                    where idregistro = " . $codRegistro . " and (s.tiposolicitud <> 5 and s.tiposolicitud <> 12 and s.tiposolicitud <> 7 and s.tiposolicitud <> 10 and s.tiposolicitud <> 9) order by s.idsolicitudrecepcionada asc";
                                                    $resultadosoli = $getSql->ejecutarSql($sqlsolicitudes);

                                                    while ($solicitudes = pg_fetch_array($resultadosoli))
                                                    {

                                                      $idsolfila = $solicitudes["idsolicitudrecepcionada"];


                                                    /////// DESDE AQUI VA PARA UNA SOLICITUD
                                                    $sqlsolext = "
                                                    select *
                                              from
                                               (select
                                               s.idsolicitudrecepcionada,
                                               t.nombresolicitud   as nombresolicitud,
                                               s.fecharecepcion as fechanota,
                                               0::integer as idnotaext,
                                               s.fecharecepcion::date as fechaderivacion,
                                               'RECEPCIONADO'::text as proveido,
                                               s.remitentes as remitente,
                                               f1.nomcompleto as destinatario,
                                               0::integer as numderivado,
                                               s.observaciones as observacion,
                                               s.estado,
                                               s.recepcionadopor as destino,
                                               0::integer as origen
                                               from solicitudrecepcionada as s inner join registro as r on r.idparcela = s.codigoparcela
                                              inner join tiposolicitud as t on s.tiposolicitud = t.idsolicitud
                                                                      full join v_funcionario_general as f1 on f1.idfuncionario = s.recepcionadopor
                                               where (s.tiposolicitud <> 5 and s.tiposolicitud <> 12 and s.tiposolicitud <> 7 and s.tiposolicitud <> 10 and s.tiposolicitud <> 9) and s.idsolicitudrecepcionada = ".$idsolfila." and  idregistro = " . $codRegistro . ") as a
                                              union
                                              (select
                                              s.idsolicitudrecepcionada,
                                              t.nombresolicitud   as nombresolicitud,
                                              s.fecharecepcion as fechanota,
                                              d.idnotaext,
                                              der.fechaderivacion,
                                              der.proveido,
                                              f1.nomcompleto as remitente,
                                              f2.nomcompleto as destinatario,
                                              der.numderivado,
                                              d.observacion as observacion,
                                              s.estado,
                                              der.destinatario as destino,
                                              der.remitente as origen
                                              from solicitudrecepcionada as s
                                              inner join tiposolicitud as t on s.tiposolicitud = t.idsolicitud
                                              inner join registro as r on r.idparcela = s.codigoparcela
                                              full join detallenotaext as d on d.idsolicitudext = s.idsolicitudrecepcionada
                                              full join derivacionnotaext as der on der.idnotaext = d.idnotaext
                                              inner join v_funcionario_general as f1 on f1.idfuncionario = der.remitente
                                              inner join v_funcionario_general as f2 on f2.idfuncionario = der.destinatario
                                              where idregistro = " . $codRegistro . " and s.idsolicitudrecepcionada = ".$idsolfila." and (s.tiposolicitud <> 5 and s.tiposolicitud <> 12 and s.tiposolicitud <> 7 and s.tiposolicitud <> 10 and s.tiposolicitud <> 9)
                                              order by d.idnotaext asc, der.numderivado asc, der.fechaderivacion)
                                              order by nombresolicitud, fechaderivacion, idnotaext asc,numderivado
                                                    "   ;


                                                    $resultadoSolext = $getSql->ejecutarSql($sqlsolext);

                                                    $cantsol = pg_num_rows($resultadoSolext);

                                                    //echo($cantsol);






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



                                                                                                            <td  >
                                                                                                             <strong>
                                                                                                                 <?php echo $registro9["idsolicitudrecepcionada"]; ?>
                                                                                                             </strong>
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

                                                                                                             <td >
                                                                                                              <?php echo $registro9["observacion"]; ?>
                                                                                                             </td>

                                                                                                             <td >
                                                                                                              <?php if($registro9["estado"] == 1)
                                                                                                              {
                                                                                                                    echo ('EN PROCESO');                                                                                                              }
                                                                                                              else if ($registro9["estado"] == 2)
                                                                                                               {
                                                                                                                 echo ('FINALIZADO');
                                                                                                              }
                                                                                                               ?>

                                                                                                             </td>

                                                                                                             <td >
                                                                                                             <?php



                                                                                                             if( ($cantsol == $i) and ($registro9["destino"] == $_SESSION['MM_UserId'] ) and ($registro9["estado"]==1) ) //($control <> $controlant) and
                                                                                                             {
                                                                                                            ?>

                                                                                                            <div style="text-align:center;">
                                                                                                            <a class="derivardoc" href="javascript:void(0)" h="N_derivar_nota_corta.php?c=<?php echo trim($registro9["idsolicitudrecepcionada"]);?>"><img align="middle" width="28" src='../images/logosdos/adjuntar2.png'></img></a>
                                                                                                            </div>


                                                                                                              <?php
                                                                                                             }



                                                                                                             ?>
                                                                                                             </td>



                                                                                                             <td>
                                                                                                             <?php

                                                                                                             if ( ($cantsol == $i) and (($registro9["origen"] == $_SESSION['MM_UserId']) or ($registro9["destino"] == $_SESSION['MM_UserId']))   ) { //estado 1 en proceso // and ($registro9["estado"]==1) 
                                                                                                             ?>

                                                                                                             <div style="text-align:center;">
                                                                                                             <a class="editardoc" href="javascript:void(0)" h="N_editar_nota_corta.php?c=<?php echo trim($registro9["idsolicitudrecepcionada"]);?>&d=<?php echo trim($registro9["idnotaext"]);?>"><img align="middle" width="28" src='../images/logosdos/adjuntar2.png'></img></a>
                                                                                                             </div>

                                                                                                             <?php
                                                                                                             }

                                                                                                             ?>
                                                                                                             </td>





                                                                                                        </tr>

                                                                                            <?php
                                                                                            $i = $i + 1;
                                                                                        }   ////// hasta aqui divide un seguimiento a una solicitud
                                                                                           $i = 1;
                                                                                        }
                                                                                        ?>




                                                </table>
                                            </div>
</fieldset >
