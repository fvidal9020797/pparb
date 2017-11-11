<?php
session_start();set_time_limit(5000);

if (isset($_GET["c"]))
	{$campo=$_GET["c"]; }
elseif(isset($_POST["c"]))
	{$campo=$_POST["c"]; }
include "../Valid.php";
include "page_derivar.php";

//print_r($_SESSION);
?>
<HTML>
<HEAD><TITLE>Derivar Carperta de Preregistro</TITLE>
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
				/*  minDate: 0,*/
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

	    <b><big>Derivar Carpeta a Registro</big></b>

	</div>

	<div align="center" class="texto">
<form action="derivar.php" method="POST" name="formulario" enctype="multipart/form-data" autocomplete="off" onSubmit="return valida(this);">
			<table>

				<tr>

						<input type="hidden" name="prereg" id="prereg" value="<?php echo $campo; ?>">

						<td align="right"   id='blau10'>Derivado a Tecnico:</td>
						<td ><select name="funderivado" class="combos" id="funderivado">
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


				<tr>
						<td align="right" id="blau10">Fecha de Derivacion:</td>
						<td  align="left" id='blau3'>
								<input id="fechader" name="fechader" type="text" required="required" placeholder="" autofocus="" title=""
								value=""/>

						</td>
				</tr>

				<tr>
						<td align="right" id="blau10">Observacion:</td>
						<td  align="left" id='blau3'>
								<input id="obsder" name="obsder" type="text"
								value=""/>
						</td>
				</tr>

				<tr>
			 <td height="21" colspan="3" <?php if(isset($mensaje)){echo "class='celdaVerde'";} ?> ><?php if(isset($mensaje)){echo $mensaje;} ?></td>
			 </tr>


		</table>

		<input type="hidden" name="MM_insert_derivada" value="form2" />
		<input name="submit" type="submit" class='boton verde formaBoton' value="Guardar Derivacion">
</form>
	</div>

	<div class="CSSTable" >
		<table >
				<tr class="" >

					<td>
					<strong>Derivado a:</strong>
					</td>

					<td>
					<strong>En Fecha:</strong>
					</td>

					<td>
					<strong>Observaciones</strong>
					</td>
				</tr>



		<?php

		if (isset($campo))
		{
			$sql_listadoderivado="select d.*, f.idfuncionario, p.nomcompleto
			from preregistro.derivacionprereg as d inner join funcionario as f on d.idfuncionario = f.idfuncionario inner join v_persona as p on p.idpersona = f.idpersona
			where idpreregistro = ".$campo ;
		}
		else
		{
			$sql_listadoderivado="select d.*, f.idfuncionario, p.nomcompleto
			from preregistro.derivacionprereg as d inner join funcionario as f on d.idfuncionario = f.idfuncionario inner join v_persona as p on p.idpersona = f.idpersona
			where idpreregistro = ".$_SESSION['prereg_der']['prereg'] ;
		}




		$sql_listadoderivado = $sql_listadoderivado ." Order By  fechaderivacion desc";
		$listadoderivado = pg_query($cn,$sql_listadoderivado);
		$row_listadoderivado = pg_fetch_array ($listadoderivado);
		$totalRows_derivado = pg_num_rows($listadoderivado);


 		if($totalRows_derivado>0){
			 do {
	  ?>
		<tr class="" >
		<td width="30%"> <?php echo trim($row_listadoderivado['nomcompleto']);?> </td>
		<td width="10%"> <?php echo trim($row_listadoderivado['fechaderivacion']);?> </td>
		<td width="60%"> <?php echo trim($row_listadoderivado['observacion']);?> </td>
		</tr >

	 <?php
		 } while ($row_listadoderivado = pg_fetch_assoc($listadoderivado));
		}
		?>
		</table>

	</div>


</BODY>
</HTML>
