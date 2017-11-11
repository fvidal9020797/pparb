<?php
session_start();set_time_limit(5000);
if (isset($_GET["idfilapadre"]))
	{$campo=$_GET["idfilapadre"]; }
elseif(isset($_POST["idfilapadre"]))
	{$campo=$_POST["idfilapadre"];}
?>
<HTML>
<HEAD><TITLE>ELEGIR ESPECIE</TITLE>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<LINK href="../css/mdryt.css" type=text/css rel=stylesheet>

	<script language="JavaScript">
	function seleccionarEspecie(fila,comun,id)
	{
		//addRow("especiesM",cientifico,comun,id)
		var num = fila;

		//window.opener.document.setAttribute("conteoEspecie");
		window.opener.document.getElementById("nombrecomunejecutado" + num).setAttribute("value", comun);
		window.opener.document.getElementById("idespeciecomunreforestada" + num).setAttribute("value", id);
		window.close()
	}
	</script>

	<style type="text/css">
	<!-- body {
		background-color: #DADADA;
	}
	-->
	</style>
</HEAD>


<BODY>
<?php
include "../Valid.php";
?>
<div class="CSSTable" >

<form action="especiesM.php?idfilapadre=<?php echo $campo ?>" method="post" enctype="multipart/form-data" name="formulario">

			<table width="80%" align="center" border="0" cellspacing="0" cellpadding="0" class="taulaA">


				<tr class="cabecera2">
							<td>
								<strong>NOMBRE COMUN </strong>
						    <input type="text" class="boxBusqueda4" name="b_comun">
						  </td>
						  <td>
						    <strong>NOMBRE CIENTIFICO</strong>
						    <input type="text" class="" name="b_cientifico">
						  </td>
						  <td>
 									<input type="submit" name="submit" class="boton verde formaBoton" value="Buscar">
							</td>
				</tr>

				  	<?php
						if (isset($_POST["b_comun"]) OR isset($_POST["b_cientifico"]))
							{$look=strtoupper(trim($_POST["b_comun"]));
								$look2= trim($_POST["b_cientifico"]);
							 $rs=sql_ejecutar($cn,"select   especienombrecomun.idespecie, especie.nombrecientifico,
													  especienombrecomun.nombrecomun, especienombrecomun.idespeciecomun
													FROM
													  public.especie, public.especienombrecomun
													WHERE
													  especie.idespecie = especienombrecomun.idespecies and (nombrecomun like '%$look%' AND nombrecientifico like '%$look2%') Order by nombrecomun ASC LIMIT 15 ");
							}
						else
							{$rs=sql_ejecutar($cn,"SELECT   especienombrecomun.idespecie, especie.nombrecientifico,
													  especienombrecomun.nombrecomun, especienombrecomun.idespeciecomun
													FROM
													  public.especie, public.especienombrecomun
													WHERE
													  especie.idespecie = especienombrecomun.idespecie Order by nombrecomun ASC LIMIT 15");
							}
						?>

						  <?php while ($res=sql_fetch($rs)) {?>
						  <tr>
						    <td height="20"> <?php echo $res["nombrecomun"];?> </td>
						    <td > <?php echo $res["nombrecientifico"];?>  </td>
								<td> <a href="javascript:seleccionarEspecie('<?php echo $campo."','".trim($res["nombrecomun"])."','".trim($res["idespeciecomun"])?>')"> Seleccionar </a></td>
						  </tr>
						  <?php }?>


				</table>

</form>

<div>


</BODY>
</HTML>
