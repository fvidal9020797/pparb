
<?php session_start();
set_time_limit(5000);
include "../Registro/destroy_predio.php";

include "../reportes/Formulario_Nota_Externa.php";
include "../reportes/Formulario_Puntuacion.php";

include "../Valid.php";


//print_r($_POST);
//print_r($_SESSION);
///////////////BUSQUEDA MM_UserId///////////////////

$pageNum_registro=0;
$maxRows_registro = 20;
$startRow_registro = $pageNum_registro * $maxRows_registro;

if ( isset($_GET['buscar1']))
	{
		$sql_listado="select n.idnotaext, n.cite, n.fecharecepcion as fechanota, f1.nomcompleto as primerremitente, f2.nomcompleto as primerdestinatario,
									n.observaciones, d.remitente, d.destinatario, n.idregistrador, d.fecharecepcion, d.rcia
									 from notasexternas as n
									 inner join derivacionnotaext as d on n.idnotaext = d.idnotaext
									 inner join v_funcionario_general as f1 on f1.idfuncionario = d.remitente
									 inner join v_funcionario_general as f2 on f2.idfuncionario = d.destinatario
									 inner join v_funcionario_general as f3 on f3.idfuncionario = n.idregistrador
									 inner join codificadores as c on c.idcodificadores = d.accion
									 where numderivado = 1";

		if(trim($_GET["buscar1"])!=""){  $sql_listado=$sql_listado." and n.idnotaext=".trim($_GET['buscar1']);}
		if(trim($_GET["buscar2"])!=""){  $sql_listado=$sql_listado." and n.fecharecepcion= '".trim($_GET['buscar2'])."'";}
		if(trim($_GET["buscar3"])!=""){  $sql_listado=$sql_listado." and LOWER(f1.nomcompleto) like LOWER('%".strtoupper(trim($_GET['buscar3']))."%')";}
		if(trim($_GET["buscar4"])!=""){  $sql_listado=$sql_listado." and LOWER(f2.nomcompleto) like LOWER('%".strtoupper(trim($_GET['buscar4']))."%')";}
		if(trim($_GET["buscar5"])!=""){  $sql_listado=$sql_listado." and LOWER(n.cite) like LOWER('%".strtoupper(trim($_GET['buscar5']))."%')";}
	}
else
	{
		if(isset($_GET['sql_listado']))
			{
				$sql_listado=$_GET['sql_listado'];
			}
	  else
		  {
			   $sql_listado="select n.idnotaext, n.cite, n.fecharecepcion as fechanota, f1.nomcompleto as primerremitente,
				 							f2.nomcompleto as primerdestinatario, n.observaciones, d.remitente, d.destinatario, n.idregistrador, d.fecharecepcion, d.rcia
												from notasexternas as n
												inner join derivacionnotaext as d on n.idnotaext = d.idnotaext
												inner join v_funcionario_general as f1 on f1.idfuncionario = d.remitente
												inner join v_funcionario_general as f2 on f2.idfuncionario = d.destinatario
												inner join v_funcionario_general as f3 on f3.idfuncionario = n.idregistrador
												inner join codificadores as c on c.idcodificadores = d.accion
												where numderivado = 1";
		 }
	}

					 $sql_listado = $sql_listado." Order By  n.idnotaext desc";

	    $_pagi_sql = $sql_listado;
        $_pagi_cuantos = 20;
        $_pagi_nav_num_enlaces = 10;
        include("../scripts/paginator.inc.php");

				 // echo $sql_listado;
				 $listado = pg_query($cn,$sql_listado);
				 $row_listado = pg_fetch_array ($_pagi_result);
				 $totalRows_listado = pg_num_rows($_pagi_result);
				 $con=1;



				 if(isset($_REQUEST['Imprimir_y']))
				 {
				    $identificadorNota = intval($_REQUEST['idp5']);
						//echo $identificadorNota;
						$consulta = pg_query($cn,"select tiponota from monitoreo.notasmonitoreo where idnotaext = ".$identificadorNota);
						$row_notamoni = pg_fetch_array($consulta);
						$tiponotapunt = $row_notamoni['tiponota'];



						$ti = intval($_REQUEST['tipoimp']);

						if ($ti == 100)
						{
							ImprimirNotaPuntuacion($identificadorNota,$tiponotapunt);
						}
						else
						{
							ImprimirNota($identificadorNota);
						}


				 }

?>

<HTML>
<HEAD><TITLE>Listado de Notas </TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<LINK href="../css/mdryt.css" type=text/css rel=stylesheet>
<link rel="stylesheet" type="text/css" href="../css/button.css"/>
<script language="JavaScript" src="../scripts/funciones.js"></script>

<link rel="stylesheet" href="../css/jquery-ui.css" />
<script src="../libraries/jquery-1.10.3/jquery-1.10.2.min.js"></script>
<script src="../libraries/jquery-1.10.3/jquery-1.10.3.ui.min.js"></script>


<script language="JavaScript">
		$(window).keypress(function(e) {
 	 if(e.keyCode == 13) {
 	 //haz lo que quieras cuando presionene enter
 	 document.form.submit();
 	 }
 	 });


	 $(function() {
			 $("#buscar2").datepicker({
					 changeMonth: true,
					 changeYear: true,
					 maxDate: "+5y +1M +10D",
					 dateFormat: "yy-mm-dd"
			 });

	 });


</script>





<style type="text/css">
<!--
.bot_atras {font-size: x-small;
	color: #FFFFFF;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	background-color: #006699;
}
-->
</style>
<BODY>
<div align="center">
<div id="oculto">
  <div class="ocultable" id="texto1">
    <div id="volanta"></div>
  </div>
</div>
<div align="center" class="texto">
    <b><big>LISTADO DE NOTAS</big></b>
</div>



<div class="CSSTable" style="width:80%"   >

<form action="ListarNotasExternas.php" id="form" name="form" method="get" enctype="multipart/form-data" >



		   <table >
	 			<td rowspan = "2" >
				<strong><a class="boton verde formaBoton" href="javascript:document.form.submit();">BUSCAR</a></strong>
				</td>
			</table >

			<table >

					<tr>

					  <td>
					  <strong>Num. Nota</strong>
					  <strong>
						<input type="text" class="boxBusqueda2" name="buscar1" value=" <?php if(isset($_GET['buscar1'])){ echo strtoupper( trim($_GET['buscar1']));}?> ">
					  </strong>
					  </td>

						<td>
						<strong>CITE</strong>
						<strong>
						<input type="text" class="boxBusqueda2" id="buscar5" name="buscar5" value=" <?php if(isset($_GET['buscar5'])){ echo strtoupper( trim($_GET['buscar5']));}?> ">
						</strong>
						</td>

						<td>
					  <strong>Fecha Nota</strong>
					  <strong>
						<input type="text" class="boxBusqueda2" id="buscar2" name="buscar2" value=" <?php if(isset($_GET['buscar2'])){ echo strtoupper( trim($_GET['buscar2']));}?> ">
					  </strong>
					  </td>

						<td>
					  <strong>Primer Remitente</strong>
					  <strong>
						<input type="text" class="boxBusqueda2" name="buscar3" value=" <?php if(isset($_GET['buscar3'])){ echo strtoupper( trim($_GET['buscar3']));}?> ">
					  </strong>
					  </td>

						<td>
						<strong>Primer Destinatario</strong>
						<strong>
						<input type="text" class="boxBusqueda2" name="buscar4" value=" <?php if(isset($_GET['buscar4'])){ echo strtoupper( trim($_GET['buscar4']));}?> ">
						</strong>
						</td>

						<!--
						<td>
						<strong>Observaciones</strong>
					</td> -->


						<td>
						<strong>Editar Nota </strong>
						</td>


						<td>
						<strong>Ver/Recepcionar/Derivar Nota</strong>
						</td>

						<td>
						<strong>Imprimir Nota</strong>
						</td>

						<td>
						<strong>Copiar Nota</strong>
						</td>


		</form>


     <?php

	if($totalRows_listado>0){
				do {

				?>
			    <tr>
			      <td width="10%" > <?php echo trim($row_listado['idnotaext']);?> </td>
						<td width="10%" > <?php echo trim($row_listado['cite']);?> </td>
			      <td width="15%"> <?php echo trim($row_listado['fechanota']);?> </td>
			      <td width="25%"> <?php echo trim($row_listado['primerremitente']);?> </td>
						<td width="25%"> <?php echo trim($row_listado['primerdestinatario']);?> </td>
			      <!--<td width="35%"> <?php //echo trim($row_listado['observaciones']);?> </td> -->


						<?php
						if ( (($row_listado['remitente'] ==  $_SESSION['MM_UserId']) || ($row_listado['idregistrador'] ==  $_SESSION['MM_UserId']))
							&& ($row_listado['fecharecepcion'] == null)
						)
						{
						?>
						<td width="5%">
							<div style="text-align:center;">
					      <form align = "middle" action="N_NotaExterna.php" method="post" name="form1">
					         <input title="Editar Nota" type='image' width="28" src='../images/logosdos/editar.png' alt="Editar Nota" onClick="this.form1.submit()">
					         <input type="hidden" name="idnotaext" value="<?php echo $row_listado['idnotaext'];?>">
							     <input type="hidden" name="idnotaextm" value="<?php echo $row_listado['idnotaext'];?>">
						    </form>
							</div>
						</td>
						<?php
						}
						 else
						{	?>	<td>--</td><?php
						}
						?>

						<td width="5%">
							<div style="text-align:center;">

								<?php
								 if (intval($row_listado['rcia']) <> 100)
								 {
								 ?>

					      <form align = "middle" action="N_NotaExternaDerivada.php" method="post" name="form1">
					         <input title="Ver Nota" type='image' width="28" src='../images/logosdos/consulta.png' onClick="this.form1.submit()" alt="Ver Nota">
					         <input type="hidden" name="idnotaext" value="<?php echo $row_listado['idnotaext'];?>">

						    </form>

								<?php  } ?>
							</div>
						</td>


						<td width="3%">
							<div style="text-align:center;">
				 			<form align = "middle" action="ListarNotasExternas.php" method="post" name="form1">
				 				<input title="Imprimir Nota" id='Imprimir' name='Imprimir' width="28" type='image' src='../images/logosdos/impresora2.png' value="Imprimir" alt="Imprimir">
				 				<input type="hidden" name="idp5" value="<?php echo $row_listado['idnotaext']; ?>">
								<input type="hidden" name="tipoimp" value="<?php echo $row_listado['rcia']; ?>">
				 			</form>
							</div>
			 			</td>


						<td width="5%">
							<div style="text-align:center;">

								 <?php
								 	if (intval($row_listado['rcia']) <> 100)
									{
								  ?>

						      <form align = "middle" action="N_NotaExterna.php" method="post" name="form1">
						         <input title="Copiar Nota" type='image' width="28" src='../images/logosdos/copy.png' onClick="this.form1.submit()" alt="Copiar Nota">
						         <input type="hidden" name="idnotaext" value="<?php echo $row_listado['idnotaext'];?>">
										 <input type="hidden" name="copia" value="1">
							    </form>

									<?php } ?>

							</div>
						</td>


			    </tr>


					   <?php $con=$con+1;
					 } while ($row_listado = pg_fetch_assoc($_pagi_result));

			}
			else
			{
			?>
					   <tr>
					   <td colspan="16" align="center" class="celdaRojo">
						<?php echo "No Existe Datos para esta consulta!!";?>	 </td>
						 </tr>
			<?php
			}
			?>
</table>


</DIV>





            <?php  echo "<p>" . $_pagi_navegacion . "</p>";
                    ?>



</BODY>
