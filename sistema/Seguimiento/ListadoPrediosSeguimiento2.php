<?php
session_start();
set_time_limit(5000);
include "../Registro/destroy_predio.php";
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
        if (trim($_GET["buscar3"]) != "") {
            $sql_listado = $sql_listado . " and v_parcela.fecharegistro like '%" . trim($_GET['buscar3']) . "%'";
        }
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
?>
<HTML>
    <HEAD>
    <TITLE>listado</TITLE>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../css/mdryt.css"/>
      <link rel="stylesheet" type="text/css" href="../css/button.css"/>
     <script src="../libraries/jquery-ui-1.10.2/jquery-1.9.1.js"></script>
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
                    <h1>SEGUIMIENTO DE CARPETAS REGISTRADAS</h1>


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
                            <td><strong>FECHA REGISTRO </strong>
                                <strong>
                                    <input type="text" class="boxBusqueda4" name="buscar3" readonly >
                                </strong>
                            </td>
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
                            <td><strong>MUNICIPIO PREDIO</strong>

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
                            <td><strong>ACTIVIDAD PREDIO</strong>
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
                            <td><strong>ESTADO REGISTRO   </strong>
                                <strong>
                                    <select name="buscar9" class="combos" id="buscar9" style="width:90px"  >
                                        <option value=0>ELEGIR ...</option>
                                        <?php
                                        $sql_clasificador = "Select * From codificadores Where idclasificador=21 Order by nombrecodificador";
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

                            <td> <strong> RECEPCIONAR DOCUMENTACION </strong> </td>


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
                                <td ><?php echo trim($row_listado['fecharegistro']); ?></td>
                                <td ><?php echo trim($row_listado['superficie']); ?></td>
                                <td ><?php echo trim($row_listado['nombrepolitico']); ?></td>
                                <td ><?php echo trim($row_listado['TipoProp']); ?></td>
                                <td ><?php echo trim($row_listado['Clasificacion']); ?></td>
                                <td ><?php echo trim($row_listado['SitJur']); ?></td>
                                <td ><?php echo trim($row_listado['estado']); ?></td>

                                <td >
                                        <form action="seguimiento_historial.php" method="post" name="form1">
                                            <input type='image' src='../images/historial.png' onClick="this.form1.submit()"><input type="hidden" name="Actividad2" value="<?php echo $row_listado['clasificacionprog']; ?>">
                                            <input type="hidden" name="idreg" value="<?php echo $row_listado['idregistro']; ?>">
                                            <input type="hidden" name="codParcela" value="<?php echo $row_listado['idparcela']; ?>">
                                            <input type="hidden" name="historial" value="">

                                        </form>
                                </td>


                                <td  colspan= "4" id='blau' align = "left">
                                  <a class="recepcionar" href="javascript:void(0)" h="N_Recepcionar_Doc.php?c=<?php echo trim($row_listado['idparcela']);?>"><img align="middle" width="18" src='../images/reenviar.png'></img></a>
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
            <?php  echo "<p>" . $_pagi_navegacion . "</p>";
                    ?>
    </BODY>
