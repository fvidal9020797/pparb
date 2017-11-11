<?php
session_start();
set_time_limit(5000);

if (isset($_GET["c"]))
	{$campo=$_GET["c"]; }
elseif(isset($_POST["c"]))
	{$campo=$_POST["c"]; }


include "../Valid.php";
include "page_Recepcionar_Doc.php";
include_once('../scripts/error_handler.inc.php');


//print_r($_SESSION);

$sql_predioinf = "Select * From v_parcela where idparcela ='".$campo."'";
$predioinf = pg_query($cn, $sql_predioinf);
$row_predioinf = pg_fetch_array($predioinf);

?>
<HTML>
<HEAD><TITLE>Recepcion de Documentacion</TITLE>
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
		$("#fecharec").datepicker({
				changeMonth: true,
				changeYear: true,
				/*  minDate: 0,*/
				maxDate: "+5y +1M +10D",
				dateFormat: "yy-mm-dd"
		});
});

</script>



<script language="JavaScript">

function mostrarcombo()
{
		tiposol = document.getElementById("idtiposolicitud").value;
		if (tiposol == 5)
			{
				document.getElementById("ano").style="display:true";
				document.getElementById("dictamen").style="display:none";
			}
		if (tiposol == 9)
				{
					document.getElementById("dictamen").style="display:true";
					document.getElementById("ano").style="display:none";
				}

		if (tiposol == 12)
						{
							document.getElementById("ano").style="display:true";
							document.getElementById("dictamen").style="display:none";
						}

	 if (tiposol != 9 && tiposol != 5 && tiposol != 12 )
		 				{
		 					document.getElementById("dictamen").style="display:none";
							document.getElementById("ano").style="display:none";
		 				}
}

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

	    <b><big>RECEPCIONAR NOTAS, SOLICITUDES, RCIAS, AGREGAR DICTAMENES Y OTROS </big></b>

	</div>




	<div align="center" class="texto">
<form action="N_Recepcionar_Doc.php" method="POST" name="formulario" enctype="multipart/form-data" autocomplete="off" onSubmit="return valida(this);">
			<table>



				<tr >

						<input type="hidden" name="prereg" id="prereg" value="<?php echo $campo; ?>">
						<td align="right"   id='blau10'>Registrado Por:</td>
						<td  align="left" id='blau3'>
								<?php
								echo $_SESSION['apellido'];
								?>

						</td>

				</tr>


				<tr>
					<td align="right"   id='blau10'>Codigo Parcela:</td>
					<td  align="left" id='blau3'>
								<?php echo $row_predioinf['idparcela']; ?>
					</td>
				</tr>



				<tr>
					<td align="right"   id='blau10'>Nombre Predio:</td>
					<td  align="left" id='blau3'>
								<?php echo $row_predioinf['nombre']; ?>
					</td>
				</tr>


				<tr>
					<td align="right"   id='blau10'>Recepcionado Por:</td>

					<td  align="left" id='blau3'>

										<select name="comboremitente" class="combos" id="comboremitente">
										<option value=0>ELEGIR ...</option>
													<?php
										$sql_funcionario ="Select idfuncionario,nombre1,apellidopat From persona INNER JOIN funcionario ON persona.idpersona=funcionario.idpersona INNER JOIN codificadores ON funcionario.cargo=codificadores.idcodificadores Where estadofun='A' and idfuncionario > 0 ORDER BY nombre1";
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
						<td align="right" id="blau10">N° de Cite o NURI:</td>
						<td  align="left" id='blau3'>
								<input name="cite"  type="text" class="boxBusqueda" id="cite" value="S/N" >

						</td>
				</tr>


				<tr>
						<td align="right" id="blau10">Fecha de Recepcion:</td>
						<td  align="left" id='blau3'>
								<input id="fecharec" name="fecharec" type="text" required="required" placeholder="" autofocus="" title=""
								value=""/>

						</td>
				</tr>


				<tr>
						<td align="right" id="blau10">Recibido de:</td>
						<td colspan = "3">
								<input required="required" name="nombreRecepcionado"  type="text" class="boxBusqueda" id="nombreRecepcionado" value="">
						</td>
				</tr>

				<tr>
						<td align="right" id="blau10">Tipo de Solicitud O Informe:</td>
					<td colspan = "3">
						<select name="idtiposolicitud" class="combos" id="idtiposolicitud" required="required" onChange="mostrarcombo();">
							<option value=0>ELEGIR ...</option>
							<?php
							$sql_solicitud ="select * from tiposolicitud where estado = 1";
							$tiposolicitud= pg_query($cn,$sql_solicitud) ;
							$row_tiposolicitud = pg_fetch_array ($tiposolicitud);

							do {   ?>
							<option value="<?php echo $row_tiposolicitud['idsolicitud']?>"
							> <?php echo $row_tiposolicitud['nombresolicitud'] ?></option>
							<?php } while ($row_tiposolicitud = pg_fetch_assoc($tiposolicitud));	?>
						</select>
					</td>
				</tr>



					<tr name = "ano" id="ano" style="display:none;" >
							<td align="right" id="blau10">Año de RCIA:</td>
							<td  colspan = "3">

								<?php
								$sql_suscripcion = "select r.idregistro, fecharegistro, fechasuscripcion from registro as r full join fechasregistro as fr on r.idregistro = fr.idregistro
							where r.idregistro =".$row_predioinf['idregistro'];

							    $resultSuscripcion = pg_query($cn,$sql_suscripcion) ;
							  $row_Suscripcion = pg_fetch_array ($resultSuscripcion);
							  // $today = date("Y-m-d");
							$fechasuscripcion = $row_Suscripcion['fechasuscripcion']; //from db
							$periodo1_time = date($today="2015-09-29");


							$periodo=2;
							if ($fechasuscripcion!="") {
							$predio_time = Date('Y-m-d', strtotime($fechasuscripcion));
							if($periodo1_time > $predio_time){
							  $periodo=1;
							}
							}


							if ($periodo==1) {
							?>
							<select name="anhorcia" class="combos" id="anhorcia" class="required"  >
									<option value="0">ELEGIR...</option>
									<option value="1">Año 2014</option>
									<option value="2">Año 2015</option>
									<option value="3">Año 2016</option>
									<option value="4">Año 2017</option>
									<option value="5">Año 2018</option>
						 </select>

						 <?php
					 		} if ($periodo==2) {
						  ?>
									<select name="anhorcia" class="combos" id="anhorcia" class="required"  >
											<option value="0">ELEGIR...</option>
											<option value="3">Año 2016</option>
											<option value="4">Año 2017</option>
											<option value="5">Año 2018</option>
											<option value="6">Año 2019</option>
											<option value="7">Año 2020</option>
								 </select>
						<?php
							}
						?>


							</td>
					</tr>


					<tr name = "dictamen" id="dictamen" style="display:none;" >
						<td align="right" id="blau10">Tipo de Dictamen:</td>
								<td colspan = "3">
									<select name="idtipodictamen" class="combos" id="idtipodictamen" required="required">
										<option value=0>ELEGIR ...</option>
										<?php
										$sql_dictamen ="select * from codificadores where idclasificador = 40";
										$tipodictamen= pg_query($cn,$sql_dictamen) ;
										$row_tipodictamen = pg_fetch_array ($tipodictamen);

										do {   ?>
										<option value="<?php echo $row_tipodictamen['idcodificadores']?>"
										> <?php echo $row_tipodictamen['nombrecodificador'] ?></option>
										<?php } while ($row_tipodictamen = pg_fetch_assoc($tipodictamen));	?>
									</select>
								</td>
					</tr>


				<tr>
						<td align="right" id="blau10">Observaciones:</td>
						<td  align="left" id='blau3'>
								<textarea name="obsrecepcion" id="obsrecepcion" cols="40" rows="10"></textarea>
						</td>
				</tr>

				<tr>
			 <td height="21" colspan="3" <?php if(isset($mensaje)){echo "class='celdaRojo'";} ?> ><?php if(isset($mensaje)){echo $mensaje;} ?></td>
			 </tr>





		</table>

		<input type="hidden" name="MM_insert" value="form2" />
		<input name="submit" type="submit" class='boton verde formaBoton' value="Guardar" ;>

</form>
	</div>


	<div align="center" class="texto">
	    <b><big>LISTADO DE NOTAS, SOLICITUDES, RCIAS PRESENTADOS</big></b>
	</div>




<div class="CSSTable" >
	<table >
			<tr class="" >

				<td>
				<strong>Tipo de Solicitud o Nota:</strong>
				</td>

				<td>
				<strong>Año (RCIA):</strong>
				</td>

				<td>
				<strong>Presentado Por:</strong>
				</td>

				<td>
				<strong>En Fecha:</strong>
				</td>


			</tr>



	<?php

	if (isset($campo))
	{
		$sql_listadoderivado="	select s.idsolicitudrecepcionada, p.nomcompleto, s.fecharecepcion, s.remitentes, t.nombresolicitud || ' ' || coalesce(c.nombrecodificador,'')  as nombresolicitud, s.anosolicitud
	from solicitudrecepcionada as s inner join funcionario as f on s.idfuncionario = f.idfuncionario inner join v_persona as p on p.idpersona = f.idpersona
	inner join tiposolicitud as t on t.idsolicitud = s.tiposolicitud
	left join codificadores as c on s.tipodictamen = c.idcodificadores
		where codigoparcela ='".$campo."' order by s.fecharecepcion asc";
	}
	else
	{
		$sql_listadoderivado=" select s.idsolicitudrecepcionada, p.nomcompleto, s.fecharecepcion, s.remitentes, t.nombresolicitud || ' ' || coalesce(c.nombrecodificador,'')  as nombresolicitud, s.anosolicitud
	from solicitudrecepcionada as s inner join funcionario as f on s.idfuncionario = f.idfuncionario inner join v_persona as p on p.idpersona = f.idpersona
	inner join tiposolicitud as t on t.idsolicitud = s.tiposolicitud
	left join codificadores as c on s.tipodictamen = c.idcodificadores
		where codigoparcela ='".$_SESSION['rec_doc']['prereg']."' order by s.fecharecepcion asc";
	}

	$listadoderivado = pg_query($cn,$sql_listadoderivado);
	$row_listadoderivado = pg_fetch_array ($listadoderivado);
	$totalRows_derivado = pg_num_rows($listadoderivado);

	if($totalRows_derivado>0){
		 do {
	?>
	<tr class="" >
		  <input type="hidden" name="idsolicitud" value="<?php echo $row_listadoderivado['idsolicitudrecepcionada']; ?>">

		  <td width="30%"> <?php echo trim($row_listadoderivado['nombresolicitud']);?> </td>

			<?php
			if ($row_listadoderivado["anosolicitud"]>0)
			{
			?>
			<td width="10%"> <?php echo trim($row_listadoderivado['anosolicitud']);?> </td>
			<?php
			}
			else
			{
			?>
				<td > --- </a></td>
				<?php
			}
			?>

			<td width="30%"> <?php echo trim($row_listadoderivado['remitentes']);?> </td>
			<td width="30%"> <?php echo trim($row_listadoderivado['fecharecepcion']);?> </td>

	</tr >

 <?php
	 } while ($row_listadoderivado = pg_fetch_assoc($listadoderivado));
	}
	?>
	</table>

</div>






</BODY>
</HTML>
