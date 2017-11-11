<?php
session_start();
set_time_limit(5000);

if (isset($_GET["c"]))
	{
		$campo=$_GET["c"];
		$idn = $_GET["d"];
	}
elseif(isset($_POST["c"]))
	{$campo=$_POST["c"];
		$idn = $_GET["d"];
	 }


include "../Valid.php";
include_once('../scripts/error_handler.inc.php');
include "page_derivar_nota_corta.php";


$sql_predioinf = "Select p.idregistro, p.idparcela, p.nombre, s.idsolicitudrecepcionada, c.nombresolicitud, s.estado, s.cite, s.fecharecepcion, s.remitentes, des.nomcompleto as destinatario, s.observaciones
from v_parcela as p inner join solicitudrecepcionada as s on p.idparcela = s.codigoparcela
inner join tiposolicitud as c on c.idsolicitud = s.tiposolicitud
inner join v_funcionario_general as des on des.idfuncionario = s.recepcionadopor
where idsolicitudrecepcionada ='".$campo."'";

//echo $sql_predioinf;

$predioinf = pg_query($cn, $sql_predioinf);
$row_predioinf = pg_fetch_array($predioinf);


$sql_dernota = "Select ne.idnotaext, ne.cite, de.fechaderivacion, rem.nomcompleto as remitente, dest.nomcompleto as destinatario, c.nombrecodificador as accion, de.proveido, dne.observacion
from notasexternas as ne inner join derivacionnotaext as de on ne.idnotaext = de.idnotaext inner join detallenotaext as dne on de.idnotaext = dne.idnotaext
inner join v_funcionario_general as rem on rem.idfuncionario = de.remitente
inner join v_funcionario_general as dest on dest.idfuncionario = de.destinatario
inner join codificadores as c on c.idcodificadores = de.accion
where ne.idnotaext = ".$idn ." and dne.idsolicitudext = ".$campo;

//echo $sql_dernota;
$notainf = pg_query($cn, $sql_dernota);
$row_notainf = pg_fetch_array($notainf);




?>
<HTML>
<HEAD><TITLE>Editar Derivacion</TITLE>
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

	    <b><big>  EDITAR SOLICITUD</big></b>

	</div>




	<div align="center" class="texto">
<form action="N_editar_nota_corta.php" method="POST" name="formulario" enctype="multipart/form-data" autocomplete="off" onSubmit="return valida(this);">
			<table>

				<tr>
						<td align="right" id="blau10">CODIGO PREDIO:</td>
						<td  align="left" id='blau3'>
								<?php echo $row_predioinf['idparcela']; ?>

						</td>
				</tr>

				<input type="hidden" name="codigopar" value="<?php echo $row_predioinf['idparcela']; ?>">

				<input type="hidden" name="idnota" value="<?php echo $idn; ?>">
				<input type="hidden" name="idsolicitud" value="<?php echo $campo; ?>">

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
								<?php

								if ($idn == 0)
								{
									echo $row_predioinf['cite'];
								}
								else
								{
									echo $row_notainf['cite'];
								}



								?>
						</td>
				</tr>

				<tr>
						<td align="right" id="blau10">FECHA DERIVACION:</td>
						<td  align="left" id='blau3'>
								<?php

								if ($idn == 0)
								{
									echo $row_predioinf['fecharecepcion'];
								}
								else
								{
									echo $row_notainf['fechaderivacion'];
								}



								?>

						</td>
				</tr>





				<tr >


						<td align="right"   id='blau10'>REMITENTE:</td>
						<td  align="left" id='blau3'>
								<?php


								if ($idn == 0)
								{
									echo $row_predioinf['remitentes'];
								}
								else
								{
										echo $row_notainf['remitente'];
								}



								?>

						</td>

				</tr>


				<tr>
						<td align="right" id="blau10">ACCION:</td>
						<td >
								<?php

								if ($idn == 0)
								{
									echo ("---");
								}
								else
								{
									echo $row_notainf['accion'];
								}


								 ?>
						</td>
				</tr>


				<tr>
					<td align="right"   id='blau10'>DESTINATARIO:</td>

					<td  align="left" id='blau3'>
							<?php
							if ($idn == 0)
							{
								echo $row_predioinf['destinatario'];
							}
							else
							{
								echo $row_notainf['destinatario'];
							}


							?>
					</td>

				</tr>

				<tr>
						<td align="right" id="blau10">PROVEIDO:</td>
						<td colspan = "3">
								<?php
								if ($idn == 0)
								{
									echo ("---");
								}
								else
								{
									echo $row_notainf['proveido'];
								}

								?>
						</td>
				</tr>


				<tr>
						<td align="right" id="blau10">OBSERVACION:</td>
						<td  align="left" id='blau3'>
								<textarea required="required" name="obsupdt" id="obsupdt" cols="40" rows="10">
									<?php

									if ($idn == 0)
									{
										echo $row_predioinf['observaciones'];
									}
									else
									{
										echo $row_notainf['observacion'];
									}


									?>


								</textarea>
						</td>
				</tr>


				<tr>
						<td align="right" id="blau10">ESTADO SOLICITUD:</td>
						<td  align="left" id='blau3'>
										<select required name="comboestadosol" class="combos" id="comboestadosol">

											<?php if ($row_predioinf["estado"] == 1)
											{
											?>
											<option value=1 selected="true">EN PROCESO</option>
											<option value=2 >FINALIZADO </option>
										  <?php
										   }
											 elseif ($row_predioinf["estado"] == 2)
											{
											?>
											<option value=2 selected="true">FINALIZADO </option>
											<option value=1 >EN PROCESO</option>
											<?php
										  }
											 ?>

										</select>
						</td>
				</tr>



		</table>

		<input type="hidden" name="MM_updt" value="guardarobs" />
		<input name="submitupdt" type="submit" class='boton verde formaBoton' value="Guardar" ;>



</form>
	</div>





</BODY>
</HTML>
