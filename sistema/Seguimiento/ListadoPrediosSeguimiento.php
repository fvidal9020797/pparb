
<?php
session_start();
set_time_limit(5000);
include "../Registro/destroy_predio.php";

include "../reportes/reporte_predio_agricola.php";
include "../reportes/reporte_predio_ganadero.php";
include "../reportes/reporte_predio_mixto.php";
include "../reportes/reporte_predio_refcon.php";
include "../reportes/reporte_predio_rechazado.php";
include "../reportes/reporte_predio_avicola.php";
include "../reportes/reporte_predio_porcino.php";
include "../reportes/reporte_predio_agricola739.php";
include "../reportes/reporte_predio_ganadero739.php";
include "../reportes/reporte_predio_mixto739.php";
include "../reportes/reporte_predio_avicola739.php";
include "../reportes/reporte_predio_porcino739.php";


include "../Valid.php";
if (!isset($_SESSION['MM_Rol'])) {
    $sql_roles = " Select idtarea From usuarios where idfuncionario=" . $_SESSION['MM_UserId'];
    $roles = pg_query($cn, $sql_roles);
    $row_roles = pg_fetch_array($roles);
    $MM_Rol = "";
    do {
        $MM_Rol = $MM_Rol . "-" . $row_roles['idtarea'];
    } while ($row_roles = pg_fetch_assoc($roles));
    $_SESSION['MM_Rol'] = $MM_Rol;
}
//print_r($_SESSION);
//////////////////BUSQUEDA//////////////////////
 $sql_listado = "Select * FROM v_parcela  where v_parcela.estado !='' ";
if (isset($_GET['buscar1'])) {
    // if (!(strrpos($_SESSION['MM_Rol'], '3') == false) || $_SESSION['MM_UserGroup'] == 188 || $_SESSION['MM_UserGroup'] == 189) { //Administrador o Ucab muestre todo listado

        if (trim($_GET["buscar1"]) != "") {
            $sql_listado = $sql_listado . " and v_parcela.idparcela like '%" . strtoupper(trim($_GET['buscar1'])) . "%'";
        }
        if (trim($_GET["buscar2"]) != "") {
            $sql_listado = $sql_listado . " and v_parcela.nombre like '%" . strtoupper(trim($_GET['buscar2'])) . "%'";
        }
        //if (trim($_GET["buscar3"]) != "") {
        //    $sql_listado = $sql_listado . " and v_parcela.fecharegistro like '%" . trim($_GET['buscar3']) . "%'";
      //  }
        if (trim($_GET["buscar40"]) != "") {
            $sql_listado = $sql_listado . " and v_parcela.superficie>" . $_GET['buscar40'];
        }
        if (trim($_GET["buscar41"]) != "") {
            $sql_listado = $sql_listado . " and v_parcela.superficie<" . $_GET['buscar41'];
        }
        if (trim($_GET["buscar5"]) != "") {
            $sql_listado = $sql_listado . " and upper(v_parcela.nombrepolitico) like '%" . strtoupper(trim($_GET['buscar5'])) . "%'";
        }
        if ($_GET["buscar6"] != '0') {
            $sql_listado = $sql_listado . " and upper(v_parcela.\"TipoProp\") like '%" . strtoupper(substr(trim($_GET['buscar6']), 0, 4)) . "%'";
        }
        if ($_GET["buscar7"] != '0') {
            $sql_listado = $sql_listado . " and upper(v_parcela.\"Clasificacion\") like '%" . strtoupper(trim($_GET['buscar7'])) . "%'";
        }
        if ($_GET["buscar8"] != '0') {
            $sql_listado = $sql_listado . " and upper(v_parcela.\"SitJur\") like '%" . strtoupper(trim($_GET['buscar8'])) . "%'";
        }
        if ($_GET["buscar9"] != '0') {
            $sql_listado = $sql_listado . " and upper(v_parcela.estado) like '%" . strtoupper(trim($_GET['buscar9'])) . "%'";
        }
 }

         $_pagi_sql = $sql_listado;
        //cantidad de resultados por pagina (opcional, por defecto 20)
        $_pagi_cuantos = 20;
        $_pagi_nav_num_enlaces = 10;
        include("../scripts/paginator.inc.php");


        if(isset($_REQUEST['Imprimir_y']))
        {
            $TipoPropiedad = $_REQUEST['tippro'];
            $CodParcelas = $_REQUEST['idp5'];
              $CodRegistro = $_REQUEST['idreg'];
        	$EstadoRegistroI = $_REQUEST['estparc'];
            // echo $TipoPropiedad;
            // echo $CodParcelas;
        	/* ################### verificacion de fechasuscripcion############# */
          $sql_suscripcion = "SELECT r.idregistro, fecharegistro, fechasuscripcion
        from registro as r full join fechasregistro as fr on r.idregistro = fr.idregistro
        where r.idregistro =".$CodRegistro;

            $resultSuscripcion = pg_query($cn,$sql_suscripcion) ;
          $row_Suscripcion = pg_fetch_array ($resultSuscripcion);
          // $today = date("Y-m-d");
        $fechasuscripcion = $row_Suscripcion['fechasuscripcion']; //from db
        echo "fecha subcripcion registro ".$fechasuscripcion;
        $periodo1_time = date($today="2015-09-29");


        $periodo=2;
        if ($fechasuscripcion!="") {
        $predio_time = Date('Y-m-d', strtotime($fechasuscripcion));
        if($periodo1_time > $predio_time){
          $periodo=1;
        }
        }

        	if (strcmp($EstadoRegistroI, "RECHAZADO") == 0) { //PREDIO RECHAZADO
        		if ($periodo==1) {
        			# code...
        			ImprimirPredioRechazado($CodParcelas);
        			}
        			if ($periodo==2) {
        			ImprimirPredioRechazado($CodParcelas);
        	}
        	}

        	else{	//IMPRESION NORMAL
        		switch ($TipoPropiedad) {

        		case "Agricola":
        		if ($periodo==1) {
        			ImprimirPredioAgricola($CodParcelas);
        				}
        		if ($periodo==2) {
        			ImprimirPredioAgricola739($CodParcelas);
        				}
        		break;

        		case "Ganadera":
        if ($periodo==1) {
        			ImprimirPredioGanadero($CodParcelas);
        		}
        		if ($periodo==2) {
        			ImprimirPredioGanadero739($CodParcelas);
        		}
        		break;

        		case "Mixta Agropecuaria":
        if ($periodo==1) {
        			ImprimirPredioMixto($CodParcelas);
        		}
        		if ($periodo==2) {
        			ImprimirPredioMixto739($CodParcelas);
        		}
        		break;

        		case "Ganadera Lechera":
        if ($periodo==1) {
        			ImprimirPredioMixto($CodParcelas);
        		}
        		if ($periodo==2) {
        			ImprimirPredioMixto739($CodParcelas);
        		}
        		break;

        		case "Reforestacion y/o Proteccion":
        		if ($periodo==1) {
        			ImprimirPredioRefCon($CodParcelas);
        		}
        		if ($periodo==2) {
        			ImprimirPredioRefCon($CodParcelas);
        		}
        		break;

        		case "Forestal":
        	if ($periodo==1) {
        			ImprimirPredioRefCon($CodParcelas);
        		}

        	if ($periodo==2) {
        			ImprimirPredioRefCon($CodParcelas);
        		}
        		break;

            case "Otras Actividades":
          if ($periodo==1) {
              ImprimirPredioRefCon($CodParcelas);
            }

          if ($periodo==2) {
              ImprimirPredioRefCon($CodParcelas);
            }
            break;

        		case "Agricola-Avicola":
        		if ($periodo==1) {
        			ImprimirPredioAvicola($CodParcelas);
        		}
        		if ($periodo==2) {
        			ImprimirPredioAvicola739($CodParcelas);
        		}
        		break;

        		case "Agricola-Porcina":
        		if ($periodo==1) {
        			ImprimirPredioPorcino($CodParcelas);
        		}
        		if ($periodo==2) {
        			ImprimirPredioPorcino739($CodParcelas);
        		}
        		break;

        		default:
        		}
        	}

        }



?>
<HTML>
    <HEAD>
    <TITLE>listado</TITLE>
        <link rel="stylesheet" type="text/css" href="../css/mdryt.css"/>
    <!-- <script src="../libraries/jquery-ui-1.10.2/jquery-1.9.1.js"></script>-->
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <LINK href="../css/mdryt.css" type=text/css rel=stylesheet>
    <LINK href="../css/mdryt-jebus.css" type=text/css rel=stylesheet>
    <script language="JavaScript" src="../scripts/funciones.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/button.css" />
    <link rel="stylesheet" href="../css/jquery-ui.css" />
    <script src="../libraries/jquery-1.10.3//jquery-1.10.2.min.js"></script>
    <script src="../libraries/jquery-1.10.3/jquery-1.10.3.ui.min.js"></script>
            <link rel="stylesheet" media="screen" href="../css/validate/screen.css">
    <script src="../libraries/jquery-validate-1.13.1/jquery-validate-1.13.1.js"></script>
      <script src="../scripts/monitoreo.js"></script>


    <script>
        $(window).keypress(function(e) {
        if(e.keyCode == 13) {
        //haz lo que quieras cuando presionene enter
        document.form.submit();
        }
        });
    </script>

    <script type="text/javascript">


    $(document).ready(function(){

    $(".recepcionar").click(function() {

    	var ref=$(this).attr("h");
    	window.open(ref,"Recepcionar Documentacion","width=600,height=700,scrollbars=yes,toolbar=no,status=no");

    });


    $(".imprimirrcia").click(function() {

      var ref=$(this).attr("h");
      window.open(ref,"Imprimir RCIA","width=600,height=700,scrollbars=yes,toolbar=no,status=no");

    });

    });

	  function lanzarSubmenu()
    { window.open("ListadoPrediosSeguimiento_busqueda.php", "Elegir Notas o Solitudes", "width=1200,height=500,scrollbars=yes,toolbar=no,status=no"); }


    </script>

    </HEAD>

    <BODY>
        <div align="center">
            <div id="oculto">
                <div class="ocultable" id="texto1">
                    <div id="volanta"></div>
                </div>
            </div>

            <div align="center" class="texto">


                <p>
                    <h1>SEGUIMIENTO DE CARPETAS</h1>


                </p>
            </div>
            <div class="CSSTable" >

				<form action="ListadoPrediosSeguimiento.php" id="form" name="form" method="get" >

				<table>
					<tr>
						<td><strong><a  class="boton verde formaBoton" href="javascript:document.form.submit();">BUSCAR</a></strong></td>
                        <td style="width:20%; text-align:left;   ">  <input name="submit3" type="button" class="boton verde formaBoton"  style=" font-size:11px; " value="IR A BUSQUEDA AVANZADA" onClick='lanzarSubmenu(); return false;'> </td>
					</tr>
				</table>


                <table >


                        <tr class="">
                            <td><strong>#</strong></td>
                            <td><strong>CODIGO PARCELA

                                </strong>
                                <strong>
                                    <input type="text" class="boxBusqueda4" name="buscar1" value=" <?php
                                    if (isset($_GET['buscar1'])) {
                                        echo trim($_GET['buscar1']);
                                    }
                                    ?> ">
                                </strong>
                            </td>
                            <td><strong>NOMBRE PREDIO </strong>
                                <strong>
                                    <input type="text" class="boxBusqueda2" name="buscar2" value=" <?php
                                    if (isset($_GET['buscar2'])) {
                                        echo trim($_GET['buscar2']);
                                    }
                                    ?> ">
                                </strong>
                            </td>

                            <!--
                            <td><strong>FECHA REGISTRO </strong>
                                <strong>
                                    <input type="text" class="boxBusqueda4" name="buscar3" readonly >
                                </strong>
                            </td>
                            -->

                            <td><strong>SUPERFICIE TOTAL </strong>
                                <br> <strong>
                                    de:
                                    <input type="text" class="boxBusqueda1" name="buscar40" value=" <?php
                                    if (isset($_GET['buscar40'])) {
                                        echo trim($_GET['buscar40']);
                                    }
                                    ?> " onKeyUp="extractNumber(this, 4, false);" onKeyPress="return blockNonNumbers(this, event, true, false);" >
                                    </strong>
                                 <br>
                                <strong>
                                    a  :
                                    <input type="text" class="boxBusqueda1" name="buscar41" value=" <?php
                                    if (isset($_GET['buscar41'])) {
                                        echo trim($_GET['buscar41']);
                                    }
                                    ?> " onKeyUp="extractNumber(this, 4, false);" onKeyPress="return blockNonNumbers(this, event, true, false);" >
                                </strong>

                            </td>
                            <td><strong>MUNICIPIO</strong>

                                <strong>
                                    <input type="text" class="boxBusqueda4" name="buscar5" value=" <?php
                                    if (isset($_GET['buscar5'])) {
                                        echo trim($_GET['buscar5']);
                                    }
                                    ?> ">
                                </strong>
                            </td>
                            <td><strong>TIPO PROPIEDAD </strong>
                                <strong>
                                    <select name="buscar6" class="combos" id="buscar6" style="width:90px" >
                                        <option value=0>ELEGIR ...</option>
                                        <?php
                                        $sql_clasificador = "Select * From codificadores Where idclasificador=1 Order by nombrecodificador";
                                        $clasificador = pg_query($cn, $sql_clasificador);
                                        $row_clasificador = pg_fetch_array($clasificador);

                                        do {
                                            ?>
                                            <option  value="<?php echo $row_clasificador['nombrecodificador'] ?>"   <?php
                                            if (isset($_GET['buscar6']) && strcasecmp($_GET['buscar6'], $row_clasificador['nombrecodificador']) == 0) {
                                                echo 'selected';
                                            }
                                            ?> ><?php echo $row_clasificador['nombrecodificador'] ?></option>
                                                 <?php } while ($row_clasificador = pg_fetch_assoc($clasificador)); ?>
                                    </select>
                                </strong>
                            </td>
                            <td><strong>ACTIVIDAD</strong>
                                <strong>
                                    <select name="buscar7" class="combos" id="buscar7" style="width:90px">
                                        <option value=0>ELEGIR ...</option>
                                        <?php
                                        $sql_clasificador = "Select * From codificadores Where idclasificador=8 Order by nombrecodificador";
                                        $clasificador = pg_query($cn, $sql_clasificador);
                                        $row_clasificador = pg_fetch_array($clasificador);
                                        do {
                                            ?>
                                            <option value="<?php echo $row_clasificador['nombrecodificador'] ?>"  <?php
                                            if (isset($_GET['buscar7']) && strcasecmp($_GET['buscar7'], $row_clasificador['nombrecodificador']) == 0) {
                                                echo 'selected';
                                            }
                                            ?> > <?php echo $row_clasificador['nombrecodificador'] ?> </option>
                                                <?php } while ($row_clasificador = pg_fetch_assoc($clasificador)); ?>
                                    </select>
                                </strong>
                            </td>
                            <td><strong>SITUACION JURIDICA </strong>
                                <strong>
                                    <select name="buscar8" class="combos" id="buscar8" style="width:90px"  >
                                        <option value=0>ELEGIR ...</option>
                                        <?php
                                        $sql_clasificador = "Select * From codificadores Where idclasificador=2 Order by nombrecodificador";
                                        $clasificador = pg_query($cn, $sql_clasificador);
                                        $row_clasificador = pg_fetch_array($clasificador);

                                        do {
                                            ?>
                                            < <?php
                                            if (isset($_GET['buscar8']) && strcasecmp($_GET['buscar8'], $row_clasificador['nombrecodificador']) == 0) {
                                                echo 'selected';
                                            }
                                            ?> > <?php echo $row_clasificador['nombrecodificador'] ?>< <?php
                                            if (isset($_GET['buscar8']) && strcasecmp($_GET['buscar8'], $row_clasificador['nombrecodificador']) == 0) {
                                                echo 'selected';
                                            }
                                            ?> > <?php echo $row_clasificador['nombrecodificador'] ?>< <?php
                                            if (isset($_GET['buscar8']) && strcasecmp($_GET['buscar8'], $row_clasificador['nombrecodificador']) == 0) {
                                                echo 'selected';
                                            }
                                            ?> > <?php echo $row_clasificador['nombrecodificador'] ?>< <?php
                                            if (isset($_GET['buscar8']) && strcasecmp($_GET['buscar8'], $row_clasificador['nombrecodificador']) == 0) {
                                                echo 'selected';
                                            }
                                            ?> > <?php echo $row_clasificador['nombrecodificador'] ?>< <?php
                                            if (isset($_GET['buscar8']) && strcasecmp($_GET['buscar8'], $row_clasificador['nombrecodificador']) == 0) {
                                                echo 'selected';
                                            }
                                            ?> > <?php echo $row_clasificador['nombrecodificador'] ?>< <?php
                                            if (isset($_GET['buscar8']) && strcasecmp($_GET['buscar8'], $row_clasificador['nombrecodificador']) == 0) {
                                                echo 'selected';
                                            }
                                            ?> > <?php echo $row_clasificador['nombrecodificador'] ?>< <?php
                                            if (isset($_GET['buscar8']) && strcasecmp($_GET['buscar8'], $row_clasificador['nombrecodificador']) == 0) {
                                                echo 'selected';
                                            }
                                            ?> > <?php echo $row_clasificador['nombrecodificador'] ?><option value="<?php echo $row_clasificador['nombrecodificador'] ?>" < <?php
                                            if (isset($_GET['buscar8']) && strcasecmp($_GET['buscar8'], $row_clasificador['nombrecodificador']) == 0) {
                                                echo 'selected';
                                            }
                                            ?> > <?php echo $row_clasificador['nombrecodificador'] ?></option>
                                                                                                      <?php } while ($row_clasificador = pg_fetch_assoc($clasificador)); ?>
                                    </select>
                                </strong>

                            </td>
                            <td><strong>ESTADO </strong>
                                <strong>
                                    <select name="buscar9" class="combos" id="buscar9" style="width:90px"  >
                                        <option value=0>ELEGIR ...</option>
                                        <?php
                                        $sql_clasificador = "Select * From codificadores Where idclasificador=21 and orden = 1 Order by nombrecodificador";
                                        $clasificador = pg_query($cn, $sql_clasificador);
                                        $row_clasificador = pg_fetch_array($clasificador);

                                        do {
                                            ?>
                                            <option value="<?php echo $row_clasificador['nombrecodificador'] ?>"  <?php
                                            if (isset($_GET['buscar9']) && strcasecmp($_GET['buscar9'], $row_clasificador['nombrecodificador']) == 0) {
                                                echo 'selected';
                                            }
                                            ?> > <?php echo $row_clasificador['nombrecodificador'] ?></option>
                                                <?php } while ($row_clasificador = pg_fetch_assoc($clasificador)); ?>
                                    </select>
                                </strong>
                            </td>


							              <td> <strong> VER HISTORIAL </strong> </td>

                            <td> <strong> IMPRIMIR FORM-001 </strong> </td>

                            <td> <strong> IMPRIMIR FORM-RCIA </strong> </td>

                            <td> <strong> RECEPCIONAR NOTAS, SOLICITUDES, RCIAS, AGREGAR DICTAMENES</strong> </td>


                        </tr>
                    </form>
                    <?php
////////////////////////////////////////////////
// echo $sql_listado;
                    $listado = pg_query($cn, $sql_listado);
                    $row_listado = pg_fetch_array($_pagi_result);
                    $totalRows_listado = pg_num_rows($_pagi_result);
                    $con = 1;
                    if ($totalRows_listado > 0) {
                        do {
                            ?>
                            <tr  align="center">
                                <td ><?php echo trim($con); ?></td>
                                <td ><?php echo trim($row_listado['idparcela']); ?></td>
                                <td ><?php echo trim($row_listado['nombre']); ?></td>
                                <!-- <td ><?php //echo trim($row_listado['fecharegistro']); ?></td> -->
                                <td ><?php echo trim($row_listado['superficie']); ?></td>
                                <td ><?php echo trim($row_listado['nombrepolitico']); ?></td>
                                <td ><?php echo trim($row_listado['TipoProp']); ?></td>
                                <td ><?php echo trim($row_listado['Clasificacion']); ?></td>
                                <td ><?php echo trim($row_listado['SitJur']); ?></td>
                                <td <?php if (trim($row_listado['estado'])=="HABILITADO")	{ ?> bgcolor="#7fc345"	<?php	} elseif (trim($row_listado['estado'])=="DIVIDIDO") {?>  bgcolor="#cc9933"	<?php	} elseif (trim($row_listado['estado'])=="FUSIONADO") {?>  bgcolor="#cc9999"	<?php	}  elseif (trim($row_listado['estado'])=="Habilitado para Modificar") {?>  bgcolor="#98f139"	<?php	} elseif (trim($row_listado['estado'])=="RECHAZADO") {?>  bgcolor="#f74d59"	<?php	} elseif (trim($row_listado['estado'])=="Boleta Preliquidacion Generada") { ?> bgcolor="#f4f87d" <?php	} elseif (trim($row_listado['estado'])=="EN EVALUACION") { ?> bgcolor="#ffcc66" <?php } elseif (trim($row_listado['estado'])=="SUSPENSION TEMPORAL") { ?> bgcolor="#FE642E" <?php } elseif (trim($row_listado['estado'])=="CANCELADO") { ?> bgcolor="#FE2E2E" <?php } ?>>
                                  <div style="text-align:center;">
                                   <strong> <?php echo trim($row_listado['estado']);?> </strong>
                                  </div>
                                </td>

                                <td >
                                    <div style="text-align:center;">
                                        <form action="seguimiento_historial.php" method="post" name="form1">
                                            <input type='image' width="28" src='../images/logosdos/consulta.png' onClick="this.form1.submit()">
                                            <input type="hidden" name="Actividad2" value="<?php echo $row_listado['clasificacionprog']; ?>">
                                            <input type="hidden" name="idreg" value="<?php echo $row_listado['idregistro']; ?>">
                                            <input type="hidden" name="codParcela" value="<?php echo $row_listado['idparcela']; ?>">
                                            <input type="hidden" name="historial" value="">

                                        </form>
                                    </div>
                                </td>

                                <td >
                                  <div style="text-align:center;">
                                      <form align = "middle" action="ListadoPrediosSeguimiento.php" method="post" name="form4">
                                      <input id='Imprimir' name='Imprimir' type='image' width="28" src="../images/logosdos/impresora2.png" value="Imprimir" alt="Imprimir">
                                      <input type="hidden" name="idreg" value="<?php echo $row_listado['idregistro']; ?>">
                                      <input type="hidden" name="idp5" value="<?php echo $row_listado['idparcela']; ?>">
                                      <input type="hidden" name="tippro" value="<?php echo trim($row_listado['clasificacionprog']); ?>">
                                      <input type="hidden" name="estparc" value="<?php echo trim($row_listado['estado']); ?>">
                                      </form>
                                  </div>
                               </td>




                               <td   id='blau' align = "left">
                                 <div style="text-align:center;">

									<?php if (trim($row_listado['estado'])=="HABILITADO")
									{
									?>
									<a name="monitoreo" class="monitoreo" href="javascript:;" nombre="<?php echo $row_listado['nombre']; ?>" codigo="<?php echo $row_listado['idparcela']; ?>" idreg="<?php echo $row_listado['idregistro']; ?>" actividad="<?php echo $row_listado['clasificacionprog']; ?>" causal="<?php  if(strstr($row_listado['idparcela'], "R")==""){$a=0;}else{ $a=1;} echo $a; ?>" ><image  width="28" src="../images/logosdos/impresorarcia.png"/></a>
									<?php
									}
									else
									{
									?>
									<a> -- </a>
									<?php
									}
									?>


								 </div>
                               </td>




                                <td  id='blau' align = "left">
                                  <div style="text-align:center;">
                                  <a class="recepcionar" href="javascript:void(0)" h="N_Recepcionar_Doc.php?c=<?php echo trim($row_listado['idparcela']);?>"><img align="middle" width="28" src='../images/logosdos/adjuntar2.png'></img></a>
                                  </div>
                              	</td>


                            </tr>
                            <?php
                            $con = $con + 1;
                        } while ($row_listado = pg_fetch_assoc($_pagi_result));


                    } else {
                        ?>
                        <tr>
                            <td colspan="11" align="center" class="celdaRojo">
                                <?php echo "No Existe Datos para esta consulta!!"; ?>	 </td>
                        </tr>
                    <?php }
                    ?>
                </table>
            </DIV>



            <script type="text/javascript">
 function Clearcombo(id)
{
	/*var selectObj = document.getElementById(id);
	if(selectObj!= null ){
	    var selectParentNode = selectObj.parentNode;
	    var newSelectObj = selectObj.cloneNode(false); // Make a shallow copy
	    selectParentNode.replaceChild(newSelectObj, selectObj);
	    return newSelectObj;
	}*/

        document.getElementById(id).options.length = 0;
}

function addItemCombo(nombre ,texto,valor)
{
    var objOption = new Option(texto, valor);
    document.getElementById(nombre).add(objOption);
}

function cargardatosPop1(idreg_){
        var parametros = {
            "tarea" : "monitoreopop",
            "idreg1" : idreg_
        };
            $.ajax({
                data:  parametros,
                url:   'monitoreopop_Ajax.php',
                type:  'post',
                beforeSend: function () {
                      //  $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response1) {
                   // alert('respuesta:'+response1);
                     eval(response1);

                }

    });
  // alert('res='+idreg_);

}

</script>


	<script type="text/javascript">





$(document).ready(function(){ <!-- --------> ejecuta el script jquery cuando el documento ha terminado de cargarse -->

	$(".monitoreo").click(function() { <!-- ------> al pulsar (.click) el boton 1 (#b1) -->
		                // recorremos todos los valores...

		var   aCustomers=""  ;
		 var idreg=$(this).attr("idreg");
                  // alert('reg='+idreg);
                   cargardatosPop1(idreg);
		 var  causal=$(this).attr("causal");
		 	var actividad=$(this).attr("actividad");
      var nombrepredio = $(this).attr("nombre");
      var codigoparcela = $(this).attr("codigo");


		$("#idreg").val(idreg);
			$("#codigorcia").val(codigoparcela);
			$("#nombre").val(nombrepredio.trim());
			$("#actividad").val(actividad);
			$("#33").val("");
			$("#comboAno2").val("");

		  $("#dialogo2").dialog({ <!--  ------> muestra la ventana  -->
			width: 590,  <!-- -------------> ancho de la ventana -->
			height: 350,<!--  -------------> altura de la ventana -->
			show: "scale", <!-- -----------> animación de la ventana al aparecer -->
			hide: "scale", <!-- -----------> animación al cerrar la ventana -->
			resizable: "false", <!-- ------> fija o redimensionable si ponemos este valor a "true" -->
			position: "top",<!--  ------> posicion de la ventana en la pantalla (left, top, right...) -->
			modal: "true", <!-- ------------> si esta en true bloquea el contenido de la web mientras la ventana esta activa (muy elegante) -->
		opacity: 90,
		 closeOnEscape: false,
          open: function(event, ui) { $(".ui-dialog-titlebar-close").hide();},

		});

	});

	/*$("#b1").click(function() { <!-- ------> al pulsar (.click) el boton 1 (#b1) -->
		$("#dialogo").dialog({ <!--  ------> muestra la ventana  -->
			width: 590,  <!-- -------------> ancho de la ventana -->
			height: 400,<!--  -------------> altura de la ventana -->
			show: "scale", <!-- -----------> animación de la ventana al aparecer -->
			hide: "scale", <!-- -----------> animación al cerrar la ventana -->
			resizable: "false", <!-- ------> fija o redimensionable si ponemos este valor a "true" -->
			position: "top",<!--  ------> posicion de la ventana en la pantalla (left, top, right...) -->
			modal: "true" <!-- ------------> si esta en true bloquea el contenido de la web mientras la ventana esta activa (muy elegante) -->
		});

	});*/
$("#b2").click(function() {
	$("#dialogo2").dialog({
			width: 590,
			height: 370,
			show: "scale",
			hide: "scale",
			resizable: "false",
			position: "center"
		});
	});
$("#b3").click(function() {
		$("#dialogo3").dialog({
			width: 590,
			height: 370,
			show: "blind",
			hide: "shake",
			resizable: "false",
			position: "center"
		});
	});
});



function cancelar(){
     $("#dialogo2").dialog("close");
}
	</script>

        <div id="dialogo2" class="ventana" style="height:200px;" title="IMPRIMIR FORMULARIO RCIA">

            <form    id="form" action="../reportes/Report_Predios.php" method="POST" name="form-asignacion" id="form-asignacion" class="cmxform" >

 				<div id="data" align="center">
				<div class="col plomo" style="height:220px;" ><!--
				<div align="center" ><strong>ASIGNACIÓN DE TÉCNICOS PARA MONITOREO</strong></div> -->
					<div class="left-content" >

 					<div class="line" ></div>
 					<div class="left" >
 						<div class="left-text" >C&oacute;digo Parcela:</div>
                                                <div class="right-text"><input  style="background-color:#E1E1E1;" id="codigorcia" name="codigorcia" type="text" value="" readonly=""></div>
 					</div>

 					<div class="line" ></div>
						<div class="left" >
 						<div class="left-text" >Nombre Parcela:</div>
         				<div class="right-text"><input style="background-color:#E1E1E1;"  id="nombre" name="nombre" type="text" value="" readonly=""></div>
 					</div>
 					<div class="line" ></div>
					<div class="left" >
 						<div class="left-text" >Actividad Parcela:</div>
         				<div class="right-text"><input style="background-color:#E1E1E1;" id="actividad" name="actividad" type="text" value="" readonly=""></div>
 					</div>
                                   <div class="line-2" ></div>
					<div class="left" >
 						<div class="left-text" >Año Monitoreo:</div>
         				<div class="right-text">



                <?php
                $sql_suscripcion = " select r.idregistro, fecharegistro, fechasuscripcion from registro as r full join fechasregistro as fr on r.idregistro = fr.idregistro
                where r.idregistro =3061";

                $resultSuscripcion = pg_query($cn,$sql_suscripcion) ;
                $row_Suscripcion = pg_fetch_array ($resultSuscripcion);
                $fechasuscripcion = $row_Suscripcion['fechasuscripcion'];
                $periodo1_time = date($today="2015-09-29");


                $periodo=2;
                if ($fechasuscripcion!="") {
                $predio_time = Date('Y-m-d', strtotime($fechasuscripcion));
                if($periodo1_time > $predio_time){
                  $periodo=1;
                }
                }



                if ($periodo == 1)
                {
                ?>
                <select name="comboAno2" id="comboAno2" required="required">
                  <option value=""></option>
                  <option value="1">Año 2014</option>
                  <option value="2">Año 2015</option>
                  <option value="3">Año 2016</option>
                  <option value="4">Año 2017</option>
                  <option value="5">Año 2018</option>
                </select>
                <?php
                        } if ($periodo==2) {
                                ?>

                                  <select name="comboAno2" id="comboAno2" required="required">
                                      <option value=""></option>
                                      <option value="3">Año 2016</option>
                                      <option value="4">Año 2017</option>
                                      <option value="5">Año 2018</option>
                                      <option value="6">Año 2019</option>
                                      <option value="7">Año 2020</option>
                              </select>
                            <?php
                              }
                            ?>
                            </div>

			 </div>

                </div>
               </div>
            </div>

                   <div  style="text-align: right; margin-top:20px; ">
                        <div class="ui-dialog-buttonset">
                           <input type="submit" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" value="IMPRIMIR" name="rcia" id="printrcia">
                           <input  onclick="javascript:cancelar();"  id="cerrar" name="cerrar"  type="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" role="button" aria-disabled="false" value="Cerrar">

                        </div>
                    </div>
                </form>

		</div>




<script>



	function guardar(){
		var e = true;
		$('#guardarstep').hide();

		if(e){
		  // show that something is loading
		  $('#form-asignacion').validate ();
		  $("#loading-div-background").show();
		  var datastep = {"step":"imprimirRcia","action": "imprimirRcia"};
		  data = $('#form-asignacion').serialize() + "&" + $.param(datastep);


		  $.post('./response-seguimiento.php',data, function(response){
           //done() es ejecutada cuándo se recibe la respuesta del servidor. response es el objeto JSON recibido
           $("#loading-div-background").hide();
           $('#guardarstep').show();
           if( response.success ) {
                               alertify.success('Success:' + response.data.message);
                                $("#ct_dgp_codpredio" ).val(response.data.dato[0].id);
                          } else {
                                 alertify.error('Error :' + response.data.message);
                           }


                       }).fail(function() {

            // just in case posting your form failed
           alertify.error('Error : Posting failed.' );
            $("#loading-div-background").hide();
            $('#guardarstep').show();

        });

        // to prevent refreshing the whole page page
        return false;
    }else{
    	alertify.error('Error :Por favor corrija los errores');
    	$('#guardarstep').show();
    	return false;

    }
};
	// extend the current rules with new groovy ones

	// this one requires the text "buga", we define a default message, too
	$.validator.addMethod("buga", function(value) {
		return value == "buga";
	}, 'Please enter "buga"!');

	// this one requires the value to be the same as the first parameter
	$.validator.methods.equal = function(value, element, param) {
		return value == param;
	};

	$().ready(function() {
		var validator = $("#form-asignacion").bind("invalid-form.validate", function() {
			// $("#summary").html("Your form contains " + validator.numberOfInvalids() + " errors, see details below.");
		 alertify.error("Su formulario contiene " + validator.numberOfInvalids() + " error");
		}).validate({
			debug: true,
			errorElement: "em",
			errorContainer: $("#warning, #summary"),
			errorPlacement: function(error, element) {
				// error.appendTo(element.parent("div").next("div"));
					// element.css('background-color','#FFEDEF');
				 // error.appendTo(element.parent("div").next("div"));

			},
			// highlight: function(element, errorClass) {
			// 	$(element).addClass(errorClass).parent().prev().children("select").addClass(errorClass);
			// },
			submitHandler: function(form) {
				guardar();
			},
			success: function(label) {

				// label.text("ok!").addClass("success");
			},
			rules: {
				alimentos: {
					required: true
				},
				33: {
					required: true
				},
				bosques: {
					required: true
				},
				secret: "buga",
				math: {
					equal: 11
				}
			}
		});

	});
	</script>






            <?php  echo "<p>" . $_pagi_navegacion . "</p>";
                    ?>


    </BODY>
