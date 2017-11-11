
<?php session_start();
set_time_limit(5000);
include "../Registro/destroy_predio.php";
include "../Valid.php";


//print_r($_POST);
//print_r($_SESSION);
///////////////BUSQUEDA MM_UserId///////////////////

$pageNum_registro=0;
$maxRows_registro = 20;





$startRow_registro = $pageNum_registro * $maxRows_registro;
if ( isset($_GET['buscar1']))
	{
	$sql_listado="select * from preregistro.v_preregistro where codigo > 0  ";

		if(trim($_GET["buscar1"])!=""){  $sql_listado=$sql_listado." and codigo=".trim($_GET['buscar1']);}
                if(trim($_GET["buscarR"])!=""){  $sql_listado=$sql_listado." and codPreregistroRegional   like '%".strtoupper(trim($_GET['buscarR']))."%' ";}
		if(trim($_GET["buscar2"])!=""){  $sql_listado=$sql_listado." and LOWER(predio) like LOWER('%".strtoupper(trim($_GET['buscar2']))."%')";}
		if(trim($_GET["buscar3"])!=""){  $sql_listado=$sql_listado." and LOWER(municipio) like LOWER('%".strtoupper(trim($_GET['buscar3']))."%')";}
		if(trim($_GET["buscar5"])!=""){  $sql_listado=$sql_listado." and LOWER(beneficiario) like LOWER('%".strtoupper(trim($_GET['buscar5']))."%')";}
		if(trim($_GET["buscar6"])!=""){  $sql_listado=$sql_listado." and LOWER(agenteaux) like LOWER('%".strtoupper(trim($_GET['buscar6']))."%')";}
		if(trim($_GET["buscar7"])!=""){  $sql_listado=$sql_listado." and LOWER(funcionario) like LOWER('%".strtoupper(trim($_GET['buscar7']))."%')";}

	$sql_listado = $sql_listado." Order By  codigo desc";
	}
else
	{
		if(isset($_GET['sql_listado']))
			{
				$sql_listado=$_GET['sql_listado'];
			}
	  else
		  {
			   $sql_listado="select * from preregistro.v_preregistro where estado is null OR estado = 'U' ";
				 $sql_listado = $sql_listado." Order By  codigo desc";
		 }
	}
	//echo $sql_listado;

	    $_pagi_sql = $sql_listado;
        //cantidad de resultados por pagina (opcional, por defecto 20)
        $_pagi_cuantos = 20;
        $_pagi_nav_num_enlaces = 10;
        include("../scripts/paginator.inc.php");

?>

<HTML>
<HEAD><TITLE>LISTA DE CARPETAS EN PREREGISTRO</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<LINK href="../css/mdryt.css" type=text/css rel=stylesheet>
<link rel="stylesheet" type="text/css" href="../css/button.css"/>
<script language="JavaScript" src="../scripts/funciones.js"></script>

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

$(".derivar").click(function() {

	var ref=$(this).attr("h");
	window.open(ref,"Derivar Carpeta","width=550,height=500,scrollbars=yes,toolbar=no,status=no");

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
    <b><big>LISTA DE CARPETAS EN PREREGISTRO</big></b>
</div>


<div class="CSSTable"  >

<form action="ListarPreregistro.php" id="form" name="form" method="get" enctype="multipart/form-data" >



		   <table>
	 			<td rowspan = "2">
				<strong><a class="boton verde formaBoton" href="javascript:document.form.submit();">BUSCAR</a></strong>
				</td>
			</table >

			<table >
					<tr class="" >

					  <td>
					  <strong>Codigo Preregistro</strong>
					  <strong>
						<input type="text" class="boxBusqueda2" name="buscar1" value=" <?php if(isset($_GET['buscar1'])){ echo strtoupper( trim($_GET['buscar1']));}?> ">
					  </strong>
					  </td>

                                          	<td>
					  <strong>Codigo Preregistro Regional</strong>
					  <strong>
						<input type="text" class="boxBusqueda2" name="buscarR" value=" <?php if(isset($_GET['buscarR'])){ echo strtoupper( trim($_GET['buscarR']));}?> ">
					  </strong>
					  </td>

						<td>
					  <strong>Nombre del Predio</strong>
					  <strong>
						<input type="text" class="boxBusqueda2" name="buscar2" value=" <?php if(isset($_GET['buscar2'])){ echo strtoupper( trim($_GET['buscar2']));}?> ">
					  </strong>
					  </td>

						<td>
					  <strong>Municipio</strong>
					  <strong>
						<input type="text" class="boxBusqueda2" name="buscar3" value=" <?php if(isset($_GET['buscar3'])){ echo strtoupper( trim($_GET['buscar3']));}?> ">
					  </strong>
					  </td>

						<td>
						<strong>Sup. Total</strong>
						</td>

						<td>
						<strong>Fecha Recepcion</strong>
						</td>

						<td>
						<strong>Nombre del Propietario</strong>
						<strong>
						<input type="text" class="boxBusqueda2" name="buscar5" value=" <?php if(isset($_GET['buscar5'])){ echo strtoupper( trim($_GET['buscar5']));}?> ">
						</strong>
						</td>

						<td>
						<strong>Agente Auxiliar</strong>
						<strong>
						<input type="text" class="boxBusqueda2" name="buscar6" value=" <?php if(isset($_GET['buscar6'])){ echo strtoupper( trim($_GET['buscar6']));}?> ">
						</strong>
						</td>

						<td>
						<strong>Estado</strong>
						</td>

						<td>
						<strong>Derivado a Tecnico</strong>
						<strong>
						<input type="text" class="boxBusqueda2" name="buscar7" value=" <?php if(isset($_GET['buscar7'])){ echo strtoupper( trim($_GET['buscar7']));}?> ">
						</strong>
						</td>


						<td>
						<strong>Fecha Derivacion</strong>
						</td>

					  <td><strong>Editar Preregistro</strong></td>
						<td><strong>Derivar Carpeta Preregistro</strong></td>
		</form>


     <?php
		 ////////////////////////////////////////////////

			  //echo $sql_listado;
			$listado = pg_query($cn,$sql_listado);
			$row_listado = pg_fetch_array ($_pagi_result);
			$totalRows_listado = pg_num_rows($_pagi_result);
			$con=1;


	if($totalRows_listado>0){
				do {

				?>
			    <tr>
			      <td width="5%"> <?php echo trim($row_listado['codigo']);?> </td>
                              <td width="4%"> <?php echo trim($row_listado['codpreregistroregional']);?> </td>
			      <td width="25%"> <?php echo trim($row_listado['predio']);?> </td>
			      <td width="15%"> <?php echo trim($row_listado['municipio']);?> </td>
			      <td width="5%"> <?php echo trim($row_listado['superficietotal']);?> </td>
			      <td width="5%"> <?php echo trim($row_listado['fecharecepcion']);?> </td>
			      <td width="15%"> <?php echo trim($row_listado['beneficiario']);?> </td>
						<td width="15%"> <?php echo trim($row_listado['agenteaux']);?> </td>
						<td width="5%" <?php if (trim($row_listado['estadoregistro'])==1)	{ ?> bgcolor="#7fc345" <?php }else{	?>bgcolor="#f74d59"	<?php	}	?>	>
									<?php
									if (trim($row_listado['estadoregistro'])==1)
									{
										echo ('DOCUMENTACION COMPLETA');
									}
									else
									{
										echo ('FALTA DOCUMENTACION');
									}
									?>
						</td>
						<td width="15%"> <?php echo trim($row_listado['funcionario']);?> </td>
						<td width="15%"> <?php echo trim($row_listado['fechaderivacion']);?> </td>


			      <td align="center" width="5%">
							  <div style="text-align:center;">
						      <form action="N_Preregistro.php?hab=0" method="post" name="form1">
						         <input title="Editar Carpeta" type='image' width="28" src='../images/logosdos/editar.png' onClick="this.form1.submit()">
						         <input type="hidden" name="idprereg" value="<?php echo trim($row_listado['codigo']);?>">
						    	</form>
								</div>
						</td>


						<td  id='blau'>
								<div style="text-align:center;">
              			<a class="derivar" href="javascript:void(0)" h="derivar.php?c=<?php echo trim($row_listado['codigo']) ;?>"><img width="28" src='../images/logosdos/adjuntar.png'></img></a>
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
