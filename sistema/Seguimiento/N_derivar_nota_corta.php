<?php
session_start();
set_time_limit(5000);

if (isset($_GET["c"]))
	{$campo=$_GET["c"];

		 }
elseif(isset($_POST["c"]))
	{$campo=$_POST["c"];

		 }


include "../Valid.php";
include_once('../scripts/error_handler.inc.php');
include "page_derivar_nota_corta.php";


//print_r($_SESSION);

$sql_predioinf = "Select p.idregistro, p.idparcela, p.nombre, s.idsolicitudrecepcionada, c.nombresolicitud
from v_parcela as p inner join solicitudrecepcionada as s on p.idparcela = s.codigoparcela
inner join tiposolicitud as c on c.idsolicitud = s.tiposolicitud where idsolicitudrecepcionada ='".$campo."'";

$predioinf = pg_query($cn, $sql_predioinf);
$row_predioinf = pg_fetch_array($predioinf);

?>
<HTML>
<HEAD><TITLE>Derivacion de Solicitudes</TITLE>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<LINK href="../css/mdryt.css" type=text/css rel=stylesheet>
	<link rel="stylesheet" type="text/css" href="../css/button.css"/>
	<script language="JavaScript" src="../scripts/funciones.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/button.css" />
	<link rel="stylesheet" href="../css/jquery-ui.css" />
	<script src="../libraries/jquery-1.10.3/jquery-1.10.2.min.js"></script>
	<script src="../libraries/jquery-1.10.3/jquery-1.10.3.ui.min.js"></script>



<script language="JavaScript">
$(function() {
		$("#fechader").datepicker({
				changeMonth: true,
				changeYear: true,
				maxDate: "+5y +1M +10D",
				dateFormat: "yy-mm-dd"
		});
});

</script>



<style type="text/css">
<!--
body {
	background-color: #DADADA;
}
-->
</style></HEAD>
<BODY >

	<div align="center" class="texto">

	    <b><big>  DERIVAR SOLICITUD</big></b>

	</div>




	<div align="center" class="texto">
<form action="N_derivar_nota_corta.php" method="POST" name="formulario" enctype="multipart/form-data" autocomplete="off" onSubmit="return valida(this);">
			<table>

				<tr>
						<td align="right" id="blau10">CODIGO PREDIO:</td>
						<td  align="left" id='blau3'>
								<?php echo $row_predioinf['idparcela']; ?>

						</td>
				</tr>

				<input type="hidden" name="codigopar" value="<?php echo $row_predioinf['idparcela']; ?>">
						<input type="hidden" name="idnota" value="<?php echo $idn; ?>">

				<tr>
						<td align="right" id="blau10">NOMBRE PREDIO:</td>
						<td  align="left" id='blau3'>
								<?php echo $row_predioinf['nombre']; ?>

						</td>
				</tr>

				<tr>
						<td align="right" id="blau10">TIPO SOLICITUD:</td>
						<td  align="left" id='blau3'>
								<?php echo $row_predioinf['nombresolicitud']; ?>
						</td>
				</tr>



				<tr>
						<td align="right" id="blau10">N° CITE:</td>
						<td  align="left" id='blau3'>
								<input name="cite"  type="text" class="boxBusqueda" id="cite" value="S/N" >

						</td>
				</tr>

				<tr>
						<td align="right" id="blau10">FECHA DERIVACION:</td>
						<td  align="left" id='blau3'>
								<input id="fechader" name="fechader" type="text" required="required" placeholder="" autofocus="" title=""
								value=""/>

						</td>
				</tr>





				<tr >

						<input type="hidden" name="idsolicitud" id="idsolicitud" value="<?php echo $campo; ?>">
						<td align="right"   id='blau10'>REMITENTE:</td>
						<td  align="left" id='blau3'>
								<?php
								echo $_SESSION['apellido'];
								?>

						</td>

				</tr>


				<tr>
						<td align="right" id="blau10">ACCION:</td>
						<td ><select required name="comboaccion" class="combos" id="comboaccion">
							<option value="">ELEGIR ...</option>
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


				<tr>
					<td align="right"   id='blau10'>DESTINATARIO:</td>

					<td  align="left" id='blau3'>

										<select required name="combodestinatario" class="combos" id="combodestinatario">
										<option value="">ELEGIR ...</option>
													<?php
										$sql_funcionario ="Select idfuncionario,nombre1,apellidopat From persona INNER JOIN funcionario ON persona.idpersona=funcionario.idpersona INNER JOIN codificadores ON funcionario.cargo=codificadores.idcodificadores Where estadofun='A' and idfuncionario > 0 and idfuncionario <> ". $_SESSION['MM_UserId']. " ORDER BY nombre1";
										$funcionario = pg_query($cn,$sql_funcionario) ;
										$row_funcionario = pg_fetch_array ($funcionario);

										do {   ?>
										<option value="<?php echo $row_funcionario['idfuncionario']?>"
										 > <?php echo $row_funcionario['nombre1']." ".$row_funcionario['apellidopat'] ?></option>
										<?php } while ($row_funcionario = pg_fetch_assoc($funcionario));	?>
									</select>

					</td>

				</tr>

				<tr>
						<td align="right" id="blau10">PROVEIDO:</td>
						<td colspan = "3">
								<input required="required" name="proveido"  type="text" class="boxBusqueda" id="proveido" value="">
						</td>
				</tr>


				<tr>
						<td align="right" id="blau10">OBSERVACION:</td>
						<td  align="left" id='blau3'>
								<textarea required="required" name="obsrecepcion" id="obsrecepcion" cols="40" rows="10"></textarea>
						</td>
				</tr>


				<tr>
						<td align="right" id="blau10">ESTADO SOLICITUD:</td>
						<td  align="left" id='blau3'>
										<select required name="comboestadosol" class="combos" id="comboestadosol">
										<option value="">Elegir... </option>
										<option value=2>FINALIZADO </option>
										<option value=1>EN PROCESO</option>
										</select>
						</td>
				</tr>



		</table>

		<input type="hidden" name="MM_insert" value="insertarnota" />
		<input name="submit" type="submit" class='boton verde formaBoton' value="Guardar" ;>



</form>
	</div>





</BODY>
</HTML>
