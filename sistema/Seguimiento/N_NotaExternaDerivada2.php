
<?php
 session_start();
//echo 'Versión actual de PHP: ' . phpversion();

//print_r($_SESSION);
include "../cabecera.php";
include "page_nota_externa_derivar.php";
include "page_nota_externa.php";


?>
<HTML>
<HEAD><TITLE>UCAB - PPARB</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<LINK href="../css/mdryt.css" type=text/css rel=stylesheet>
<link rel="stylesheet" type="text/css" href="../css/button.css"/>
<script language="JavaScript" src="../scripts/funciones.js"></script>
<link rel="stylesheet" type="text/css" href="../css/button.css" />
<link rel="stylesheet" href="../css/jquery-ui.css" />
 <script src="../libraries/jquery-1.10.3/jquery-1.10.2.min.js"></script>
<script src="../libraries/jquery-1.10.3/jquery-1.10.3.ui.min.js"></script>




<style type="text/css">
#principal
	{ 	position:relative;
		margin:10px auto;
	}
#derecha
	{   position:relative;
		color:#FFFFFF;
		z-index:200;
		top:300;
		width:250;
		background-color:#000000;
	}
</style>

</HEAD>
<?php
  include_once('../scripts/body_handler.inc.php');

?>

<BODY>

<div align="center">

  <div align="center" class="texto">
      <b><big>VER, RECEPCIONAR, DERIVAR NOTA</big></b>
  </div>

<form action="N_NotaExternaDerivada.php" method="POST" name="formulario" enctype="multipart/form-data" autocomplete="off" onSubmit="return valida(this);">


<table width="90%" border="0" class='taulaA' align="center" cellspacing="0">

		<tr >
			  <td height="14" colspan="4" id='blau'><span class="taulaH">1. Datos Generales de la Nota</span></td>
		</tr>

		<tr >
				<td id='blau'>
						<table width="100%" cellspacing="0"   border="0">


                <tr class="taulaA">
                    <td align="right" id='blau3'>CODIGO DE NOTA:</td>
                    <td width="60%" id='blau'><input name="idnotaext" type="text" class="boxRojo"  id="idnotaext"
                       value="<?php if(isset($_SESSION['datos_nota_ext']['idnotaext']) && $_SESSION['datos_nota_ext']['idnotaext']!="") {echo $_SESSION['datos_nota_ext']['idnotaext'];}else{echo "";}?> " maxlength="50" readonly>
                     </td>
                </tr>



								<tr class="taulaA"  id='blau3'>
										<td align="right" id="blau3">Fecha Nota:</td>
										<td colspan="3"  align="left" id='blau3'>
												<input id="fechaderiv" name="fechaderiv" type="text" disabled="true"
												value="<?php echo isset($_SESSION['datos_nota_ext']['fechaderiv']) ? htmlspecialchars($_SESSION['datos_nota_ext']['fechaderiv']) : "";?>"/>

										</td>
								</tr>

                <tr class="taulaA"  id='blau3' >
                      <td align="right" id="blau3">Observaciones</td>
                      <td ><textarea disabled name="neobservacion" id="neobservacion" cols="50" rows="1"><?php echo isset($_SESSION['datos_nota_ext']['neobservacion']) ? htmlspecialchars($_SESSION['datos_nota_ext']['neobservacion']) : "";?></textarea></td>
                </tr>



						</table>
				</td>
		</tr>

		<tr>
				<td height="14" colspan="4" id='blau'><span class="taulaH">2. Lista de Solicitud(es) o Nota(s)</span></td>
		</tr>

    <tr>

        <td height="38" colspan="2">
          <form></form>
          <form action="N_NotaExternaDerivada.php" method="POST" name="formulariodetalle" enctype="multipart/form-data" autocomplete="off" onSubmit="return valida(this);">
            <input type="hidden" id="btnguardardetalle" name="MM_insert3" value="formulariodetalle" />
            <input type="hidden" name="idnotaext" id="idnotaext" value="<?php if(isset($_SESSION['datos_nota_ext']['idnotaext']) && $_SESSION['datos_nota_ext']['idnotaext']!="") {echo $_SESSION['datos_nota_ext']['idnotaext'];}else{echo "";}?> "  >
            <table width="100%" height="63" border="0">

            <tr>
                  <td height="17" colspan="2">
                    <table width="100%" height="68" border="0">
                            <tr>
                                  <td width="80%" rowspan="2" >

                                        <table width="95%" id="segui" border="1" class="taulaA">
                                              <tr class="cabecera2" align="center">
                                                  <td width="13%">CODIGO PARCELA</td>
                                                  <td width="25%">NOMBRE PREDIO </td>
                                                  <td width="20%">TIPO DE SOLICITUD</td>
                                                  <td width="40%">ESTADO</td>
                                              </tr>

                                              <?php
                                              if(isset($_SESSION['datos_nota_ext']['conteo']))
                                              {$num=$_SESSION['datos_nota_ext']['conteo'];}
                                              else
                                              {$num=$total_row_detalle_nota;}


                                 		          for ($i = 1; $i <=$num ; $i++) {

                                                if(isset($_SESSION['datos_nota_ext']['idsolicitud'.$i]) || isset($row_detallenotaext['idnotaext'])){
                                              ?>
                                              <tr >
                                                          <td><input name="<?php echo 'idparcela'.$i; ?>" type="text" class="boxBusqueda" readonly value="<?php echo isset($_SESSION['datos_nota_ext']['idparcela'.$i]) ? htmlspecialchars($_SESSION['datos_nota_ext']['idparcela'.$i]) : trim($row_detallenotaext['idparcela']) ;?>"></td>

                                                          <td><input name="<?php echo 'nombre'.$i; ?>" type="text" readonly class="boxBusqueda2"  value="<?php echo isset($_SESSION['datos_nota_ext']['nombre'.$i]) ? htmlspecialchars($_SESSION['datos_nota_ext']['nombre'.$i]) : trim($row_detallenotaext['nombreparcela']) ;?>"></td>

                                                          <td><input name="<?php echo 'estado'.$i; ?>" type="text" class="boxBusqueda" readonly value="<?php echo isset($_SESSION['datos_nota_ext']['estado'.$i]) ? htmlspecialchars($_SESSION['datos_nota_ext']['estado'.$i]) : trim($row_detallenotaext['nombresolicitud']) ;?>"></td>

                                                          <td >
                                                          <textarea class="CSSTextArea" name="<?php echo 'observacionesr'.$i; ?>" id="<?php echo 'observacionesr'.$i; ?>" cols="55" rows="4"><?php echo isset($_SESSION['datos_nota_ext']['observacionesr'.$i]) ? htmlspecialchars(trim($_SESSION['datos_nota_ext']['observacionesr'.$i])) : trim($row_detallenotaext['observacion']);?></textarea>
                                                          </td>

                                                          <td style="display:none"><input  name="<?php echo 'idsolicitud'.$i; ?>" id="<?php echo 'idsolicitud'.$i; ?>" type="text" class="boxBusqueda2" readonly value="<?php echo isset($_SESSION['datos_nota_ext']['idsolicitud'.$i]) ? htmlspecialchars($_SESSION['datos_nota_ext']['idsolicitud'.$i]) : trim($row_detallenotaext['idsolicitudext']) ?>"   ></td >
                                              </tr>

                                              <?php

                                              if(!isset($_SESSION['datos_nota_ext']['conteo']) && isset($row_detallenotaext)){$row_detallenotaext = pg_fetch_assoc($detallenotaext);}
                                                 }}
                                               ?>
                                        </table>

                                            <input type="hidden" name="conteo" id="conteo" value="<?php echo isset($_SESSION['datos_nota_ext']['conteo']) ? htmlspecialchars($_SESSION['datos_nota_ext']['conteo']) : $total_row_detalle_nota ?>">

                                 </td>
                            </tr>


                      </table>
                    </td>
            </tr>


            </table>

          </form>
        </td>
   </tr>


    <tr><td colspan="4"><hr></td></tr>


    <tr>
        <td height="14" colspan="4" id='blau'><span class="taulaH">3. Lista de Derivaciones</span></td>
    </tr>


    <?php
    $sql_listado="select n.idnotaext,d.idderivado, d.remitente as idremitente,d.destinatario as iddestinatario,d.accion as idaccion,  f1.nomcompleto as remitente, f2.nomcompleto as destinatario, c.nombrecodificador as accion, d.fechaderivacion, d.fecharecepcion, d.numderivado, f3.nomcompleto as transcriptor, d.proveido
                   from notasexternas as n inner join derivacionnotaext as d on n.idnotaext = d.idnotaext
                   inner join v_funcionario_general as f1 on f1.idfuncionario = d.remitente
                   inner join v_funcionario_general as f2 on f2.idfuncionario = d.destinatario
                   inner join v_funcionario_general as f3 on f3.idfuncionario = n.idregistrador
                   inner join codificadores as c on c.idcodificadores = d.accion
                   where n.idnotaext = ".$_SESSION['datos_nota_ext']['idnotaext']." Order By  d.numderivado asc ";

                   $listado = pg_query($cn,$sql_listado);
                   $row_listado = pg_fetch_array ($listado);
                   $totalRows_listado = pg_num_rows($listado);
     ?>


     <tr>
          <td>
            <table  id="idtabladerivacion" class="taulaA"  align="center">
                  <tr class="cabecera2" align="center">
                    <td>
                    <strong>N° Derivacion</strong>
                    </td>

                    <td>
                    <strong>Remitente</strong>
                    </td>

                    <td>
                    <strong>Destinatario</strong>
                    </td>

                    <td>
                    <strong>Accion</strong>
                    </td>

                    <td>
                    <strong>Fecha</strong>
                    </td>
                    <td>
                    <strong>Fecha Recepción</strong>
                    </td>
                    <td>
                    <strong>Proveido</strong>
                    </td>
                    <td>
                    <strong>Editar</strong>
                    </td>
                  </tr>

                  <?php
                  if($totalRows_listado>0){
                       do {

                   ?>
                         <tr>
                           <td width="5%"> <?php echo trim($row_listado['numderivado']);?>  </td>
                           <td width="15%"> <?php echo trim($row_listado['remitente']);?>  <input id="<?php echo "remitente"; echo trim($row_listado['idderivado']);?>"   value="<?php echo trim($row_listado['idremitente']);?>"  type="hidden"></input> </td>
                           <td width="15%"> <?php echo trim($row_listado['destinatario']);?> <input id="<?php echo "destinatario"; echo trim($row_listado['idderivado']);?>" value="<?php echo trim($row_listado['iddestinatario']);?>"  type="hidden"></input> </td>
                           <td width="10%"> <?php echo trim($row_listado['accion']);?>  <input id="<?php echo "accion"; echo trim($row_listado['idderivado']);?>" value="<?php echo trim($row_listado['idaccion']);?>"  type="hidden"></input> </td>
                           <td width="8%" id="<?php echo "fechaderivacion"; echo trim($row_listado['idderivado']);?>" > <?php echo trim($row_listado['fechaderivacion']);?> </td>
                           <td width="8%" id="<?php echo "fecharecepcion"; echo trim($row_listado['idderivado']);?>" > <?php echo trim($row_listado['fecharecepcion']);?> </td>
                           <td width="8%" id="<?php echo "proveido"; echo trim($row_listado['idderivado']);?>" > <?php echo trim($row_listado['proveido']);?> </td>
                           <td width="4%">
                              <image <?php if((trim($row_listado['fecharecepcion'])==null)&& $_SESSION['MM_UserId']==$row_listado['idremitente']){echo " style='display:block' ";}else{echo " style='display:none' ";} ?> src='../images/editar.png'  value="<?php echo $row_listado['idderivado'];?>" title="Editar Derivacion"   width="28" <a style="color:#FFA500;"  onclick="Javascript:editarderivacion(<?php echo $row_listado['idderivado']; ?>);" >
                           </td>
                         </tr>

                            <?php
                          } while ($row_listado = pg_fetch_assoc($listado));

                     }
                           ?>
            </table>
          </td>
     </tr>

     <tr style="height:20px;">
             <td style="height:20px;" align="middle" class="taulaA" id='blau2'>
              <form></form>
              <table>
                <tr style="height:20px;">
                  <td>
                    <form id="formularior" action="N_NotaExternaDerivada.php" method="POST" name="formularior">
                       <input <?php if((isset($_SESSION['datos_nota_ext']['destinatario']) && ($_SESSION['MM_UserId']== $_SESSION['datos_nota_ext']['destinatario']) )&&(isset($valorDerivada)&&($valorDerivada>0) )){echo "style='display:block;height:25px;' ";}else{echo "style='display:none;height:25px;' ";} ?> name="btnrecepcion" type="submit" class='cabecera2' value="Recepcionar Nota"  >

                       <input type="hidden" name="idnotaext" id="idnotaext" value="<?php if(isset($_SESSION['datos_nota_ext']['idnotaext']) && $_SESSION['datos_nota_ext']['idnotaext']!="") {echo $_SESSION['datos_nota_ext']['idnotaext'];}else{echo "";}?> "  >

                        <input type="hidden"  id="idderivar" name="idderivar" value="1"  ></input>
                    </form>
                  </td>
                  <td>
                      <form>
                      <input id="btnDerivar" style="height:25px;" type="button" class='cabecera2' value=" Derivar Nota" onclick="javascript:aparecerDerivar();">
                     </form>
                  </td>
                </tr>
              </table>


             </td>
     </tr>
     <tr>
       <td colspan="4" <?php if(isset($mensaje)){echo "class='celdaVerde'";} ?>><?php if(isset($mensaje)){echo $mensaje;} ?></td>

     </tr>


     <tr >
         <td id='blau'>
           <form action="N_NotaExternaDerivada.php" method="POST" name="formularioDerivar" enctype="multipart/form-data" autocomplete="off" onSubmit="return valida(this);">


           <div id="iddivderivar" <?php    echo "style='display:none;'"; ?> >
             <table width="100%" cellspacing="0"   border="0">

                 <tr class="taulaA"  id='blau3'>
                     <td align="right" id="blau3">Fecha Derivacion:</td>
                     <td colspan="3"  align="left" id='blau3'>
                         <input id="fechaderivn" name="fechaderivn" type="text"
                         required="required" placeholder="" autofocus="" title=""
                         value=""/>

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
                         > <?php echo $row_funcionario['nombre1']." ".$row_funcionario['apellidopat'] ?></option>
                        <?php } while ($row_funcionario = pg_fetch_assoc($funcionario));	?>
                      </select></td>
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
                                                 > <?php echo $row_funcionario['nombre1']." ".$row_funcionario['apellidopat'] ?></option>
                        <?php } while ($row_funcionario = pg_fetch_assoc($funcionario));	?>
                      </select></td>
                  </tr>


                  <tr class="taulaA"  id='blau3'>
                      <td align="right" id="blau3">PROVEIDO:</td>
                      <td colspan="3"  align="left" id='blau3'>
                          <input id="proveido" name="proveido" type="text" value=""/>
                      </td>
                  </tr>
             </table>
           </div>
           <input type="hidden" name="MM_insert2" value="formularioDerivar" />
           <input name="idnotaext" type="hidden" class="boxRojo"  id="idnotaext"
              value="<?php if(isset($_SESSION['datos_nota_ext']['idnotaext']) && $_SESSION['datos_nota_ext']['idnotaext']!="") {echo $_SESSION['datos_nota_ext']['idnotaext'];}else{echo "";}?> " readonly>

         </form>

         </td>
     </tr>

     <tr>
       <td colspan="4" <?php if(isset($mensaje4)){echo "class='celdaVerde'";} ?>><?php if(isset($mensaje4)){echo $mensaje4;} ?></td>
     </tr>

     <tr>

       <td align="middle" class="taulaA" id='blau2' style="vertical-align:top;">
         <table>
          <tr style="height:35px;vertical-align:top;"> <td>
            <input id="btnguardarsolicitudnota" name="submit" type="button" onclick="formulariodetalle.submit()" class='cabecera2' value="Guardar Solicitud(es)" style="text-align:center; width:150px; height:25px; font-size:11px;"> </td>
            <td>
             <input id="btnguardarderiv" type="button" class='cabecera2' value="Guardar Derivacion" onclick="javascript:guardarDerivacion();"  style=" height:25px; font-size:11px;" >
             <input id="btnguardarderiv1" type="hidden" class='cabecera2' value="Guardar Derivacion 1" onclick="form1recargar.submit()"  >
           </td></tr>
         </table>
       </td>
     </tr>
     <tr>
       <td id="mensajeDerivacion" colspan="4"  class='celdaVerde' style='display:none;' >Derivacion Guardado Exitosa !!</td>
       <td colspan="4" <?php if(isset($mensaje3)){echo "class='celdaVerde'";} ?>><?php if(isset($mensaje3)){echo $mensaje3;} ?></td>


     </tr>

</table>

</form>
</div>
 <input type="hidden" id="idderivado" value="0" >
 <form align = "middle" action="N_NotaExternaDerivada.php" method="post" name="form1recargar">
    <input type="hidden" name="idnotaext" value="<?php if(isset($_SESSION['datos_nota_ext']['idnotaext']) && $_SESSION['datos_nota_ext']['idnotaext']!="") {echo $_SESSION['datos_nota_ext']['idnotaext'];}else{echo "";}?> " >
    <input type="hidden" name="idguardarDerivacion" value="1" >
 </form>

<?php include "../foot.php";?>
<script>


function aparecerDerivar(){
  document.getElementById('iddivderivar').style.display='block';
}

$(function() {
    $("#fechaderivn").datepicker({
        changeMonth: true,
        changeYear: true,
        maxDate: "+5y +1M +10D",
        dateFormat: "yy-mm-dd"
    });

});



function recepcionar(){
  var reply=confirm("¿Seguro Desea Recepcionar la Nota?")

   if (reply==true) {
    //  alert("si entro ");
       document.getElementById("formulariod").submit();
    } else {
    } ;
//  $("#formulariod").submit();
}
/*  function derivar(){

  var reply=confirm("¿Seguro Desea Recepcionar la Nota?")
   if (reply==true) {
     alert("si entro ");
     document.getElementById("formDerivar").submit();
    } else {  } ;
  }*/
 //parent.document.location.href="MenuNotasExternas.php?aux=3&datosguardados=ok";

function guardarDerivacion(){
  id=document.getElementById("idnotaext").value;
  comboremitente=document.getElementById("comboremitente").value;
  combodestinatario=document.getElementById("combodestinatario").value;
  comboaccion=document.getElementById("comboaccion").value;
  fechaderivn=document.getElementById("fechaderivn").value;
  proveido=document.getElementById("proveido").value;
  idderivados=document.getElementById("idderivado").value;
  if (comboremitente ==0)
  { alert("Debe Especificar el Remitente");			}
  else if (combodestinatario ==0)
  {   alert("Debe Especificar el Destinatario"); }
  else if (comboaccion ==0)
  {   alert("Debe Especificar una Accion"); }
  else if (fechaderivn== "" )
  {   alert("Debe Especificar una Fecha"); }
  else if (combodestinatario== comboremitente)
  { alert("El Destinatario no puede ser el mismo del Remitente"); }
else{
  var parametros = {
               "tarea" : "guardarderivacion",
               "idnotaext" : id,
               "idderivacion" : idderivados,
               "comboremitente" : comboremitente,
               "combodestinatario" : combodestinatario,
               "comboaccion" : comboaccion,
               "fechaderivn" : fechaderivn,
               "proveido" : proveido
       };
       $.ajax({
               data:  parametros,
               url:   'page_nota_externa_derivarAjax.php',
               type:  'post',
               beforeSend: function () {
                       $("#resultado").html("Procesando, espere por favor...");
               },
               success:  function (response) {
                     //  $("#resultado").html(response);
                   //  document.getElementById("resultado").innerHTML =response;
                   //alert(response);
                   if(response>0){
                     document.getElementById("mensajeDerivacion").style.display="block";
                     document.getElementById("idderivado").value=response;
                    // alert('Derivacion Guardada Exitosa !!');
                    //  document.getElementById("form1recargar").submit();
                      document.getElementById("btnguardarderiv1").click();
                   }
               }
       });
     }
}

function guardarDerivacion1(){
//alert('Derivacion Guardada Exitosa !!');
    document.getElementById("btnguardarderiv1").click();
}

function seleccionarComboId(name, id) {

    lista = document.getElementById(name);
    //  alert('entro:'+lista.options.length);

    for (i = 0; i < lista.options.length; i++) {
        // alert(lista.options[i].value+'-'+id);
        if (lista.options[i].value == id) {
            lista.selectedIndex = i;
            //  alert('sii '+name +'=='+lista.options[i].value+'-'+id);
        }
    }
    // alert('termino');
}

</script>

<script>
var a=  "<?php echo isset($_SESSION['datos_nota_ext']['destinatario']) ?>";
var b=  "<?php echo $_SESSION['MM_UserId']== $_SESSION['datos_nota_ext']['destinatario'] ?>";
var c=  "<?php echo isset($valorDerivada)&&($valorDerivada==0) ?>";
//alert(a);
//alert(b);
//alert(c);
if(a=="1" && b=="1" && c=="1"){
  document.getElementById('btnDerivar').style.display = 'block';
  document.getElementById('btnguardarderiv').style.display = 'block';
  document.getElementById('btnguardarsolicitudnota').style.display = 'block';
}else{
   document.getElementById('btnDerivar').style.display = 'none';
   document.getElementById('btnguardarderiv').style.display = 'none';
   document.getElementById('btnguardarsolicitudnota').style.display = 'none';
}


function editarderivacion(idd){
  //alert('fechaderivacion'+idd);
  //alert(document.getElementById('fechaderivacion'+idd).innerHTML);
//  document.getElementById('fechaderivn').innerHTML="sdsdsd":
//  alert(document.getElementById('fechaderivacion'+idd).innerHTML);
  aparecerDerivar();
//  alert(document.getElementById('fechaderivacion'+idd).innerHTML);
  document.getElementById('fechaderivn').value=document.getElementById('fechaderivacion'+idd).innerHTML;
  document.getElementById('proveido').value=document.getElementById('proveido'+idd).innerHTML;
  seleccionarComboId('comboremitente',document.getElementById('remitente'+idd).value);
  seleccionarComboId('comboaccion',document.getElementById('accion'+idd).value);
  seleccionarComboId('combodestinatario',document.getElementById('destinatario'+idd).value);
  document.getElementById("idderivado").value=idd;

    document.getElementById('btnguardarderiv').style.display='block';

}
</script>



</BODY></HTML>
