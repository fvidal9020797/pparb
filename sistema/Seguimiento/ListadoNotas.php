<?php
session_start();
set_time_limit(5000);
include "../Registro/destroy_predio.php";
include "../reportes/Formulario_Imp_Nota.php";
include "../reportes/Formulario_Imp_NotaINRA.php";
include "../reportes/Formulario_Imp_Nota_ABT.php";
include "../Valid.php";
//print_r($_POST);
//print_r($_SESSION);
///////////////BUSQUEDA MM_UserId///////////////////

$pageNum_registro=0;
$maxRows_registro = 20;

$startRow_registro = $pageNum_registro * $maxRows_registro;
if ( isset($_GET['buscar1']))
	{
		    $sql_listado="select
  ((((((COALESCE(p1.nombre1, ''::bpchar)::text || ' '::text) || COALESCE(p1.nombre2, ''::bpchar)::text) || ' '::text) || COALESCE(p1.apellidopat, ''::bpchar)::text) || ' '::text) || COALESCE(p1.apellidomat, ''::bpchar)::text) ::text AS remitente,
   ((((((COALESCE(p2.nombre1, ''::bpchar)::text || ' '::text) || COALESCE(p2.nombre2, ''::bpchar)::text) || ' '::text) || COALESCE(p2.apellidopat, ''::bpchar)::text) || ' '::text) || COALESCE(p2.apellidomat, ''::bpchar)::text) ::text AS destinatario,
  codificadores.nombrecodificador AS unidad, f1.financiamiento,
  nota.nnota,  nota.fechanota,  nota.fecharegnota,  nota.fecharecepcionado,nota.idnota,f1.idfuncionario as rem, nota.idregistrador as reg, nota.iddestinatario as dest, nota.idunidad as uni
FROM
  nota, funcionario f1, persona p1,  funcionario f2,  persona p2,  codificadores
WHERE
  nota.iddestinatario = f2.idfuncionario AND
  f1.idfuncionario = nota.idremitente AND
  p1.idpersona = f1.idpersona AND
  f2.idpersona = p2.idpersona AND
  codificadores.idcodificadores = nota.idunidad ";
		if(trim($_GET["buscar1"])!="" and $_GET["buscar1"]>0){  $sql_listado=$sql_listado." and nota.idunidad=".trim($_GET['buscar1']);}
		if(trim($_GET["buscar2"])!=""){  $sql_listado=$sql_listado." and LOWER(nota.nnota) like LOWER('%".strtoupper(trim($_GET['buscar2']))."%')";}
		if(trim($_GET["buscar3"])!="" and $_GET["buscar3"]>0 ){  $sql_listado=$sql_listado." and f1.idfuncionario =".trim($_GET['buscar3']);}
		if(trim($_GET["buscar4"])!="" and $_GET["buscar4"]>0 ) {  $sql_listado=$sql_listado." and nota.iddestinatario =".($_GET['buscar4']);}

	$sql_listado = $sql_listado." Order By  nota.fechanota desc";
	}
else
	{ if(isset($_GET['sql_listado'])){ $sql_listado=$_GET['sql_listado'];}
	  else{
			   $sql_listado="select
				  ((((((COALESCE(p1.nombre1, ''::bpchar)::text || ' '::text) || COALESCE(p1.nombre2, ''::bpchar)::text) || ' '::text) || COALESCE(p1.apellidopat, ''::bpchar)::text) || ' '::text) || COALESCE(p1.apellidomat, ''::bpchar)::text) ::text AS remitente,
				   ((((((COALESCE(p2.nombre1, ''::bpchar)::text || ' '::text) || COALESCE(p2.nombre2, ''::bpchar)::text) || ' '::text) || COALESCE(p2.apellidopat, ''::bpchar)::text) || ' '::text) || COALESCE(p2.apellidomat, ''::bpchar)::text) ::text AS destinatario,
				  codificadores.nombrecodificador AS unidad, f1.financiamiento,
				  nota.nnota,  nota.fechanota,  nota.fecharegnota,  nota.fecharecepcionado,nota.idnota ,f1.idfuncionario as rem, nota.idregistrador as reg, nota.iddestinatario as dest, nota.idunidad as uni
				FROM
				  nota, funcionario f1, persona p1,  funcionario f2,  persona p2,  codificadores
				WHERE
				  nota.iddestinatario = f2.idfuncionario AND
				  f1.idfuncionario = nota.idremitente AND
				  p1.idpersona = f1.idpersona AND
				  f2.idpersona = p2.idpersona AND
				  codificadores.idcodificadores = nota.idunidad  Order By  nota.fechanota desc";
		}
	}

	    	$_pagi_sql = $sql_listado;
        $_pagi_cuantos = 20;
        $_pagi_nav_num_enlaces = 10;
        include("../scripts/paginator.inc.php");


if(isset($_REQUEST['Imprimir_y']))
{
   $identificadorNota = intval($_REQUEST['idp5']);
   $tiponota = $_REQUEST['unidadimp'];
	 $finan = $_REQUEST['financiamiento'];

   if ($tiponota == 'Remision INRA')
   {
   ImprimirNotaINRA($identificadorNota);
   }
   elseif ($finan == 'ABT')
	 {
   	ImprimirNotaABT($identificadorNota);
   }
	 else
   {
   ImprimirNota($identificadorNota);
   }
}

?>
<HTML>
<HEAD><TITLE>listado</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<LINK href="../css/mdryt.css" type=text/css rel=stylesheet>
<link rel="stylesheet" type="text/css" href="../css/button.css"/>
<script language="JavaScript" src="../scripts/funciones.js"></script>



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


<div class="CSSTable" >

<form action="ListadoNotas.php" id="form" name="form" method="get" >



		   <table>
	 			<td rowspan = "2">
				<strong><a class="boton verde formaBoton" href="javascript:document.form.submit();">BUSCAR</a></strong>
				</td>
			</table >

			<table >
					<tr class="" >
					  <td><strong>#</strong></td>

					  <td>
							<strong>UNIDAD ACTUAL</br></strong>
							<strong>
					  				<select name="buscar1" class="combos" id="buscar1" >
									  <option value=0>ELEGIR ...</option>
									  <?php
										$sql_clasificador ="Select * From codificadores Where idclasificador=32  Order by nombrecodificador";
										$clasificador = pg_query($cn,$sql_clasificador) ;
										$row_clasificador = pg_fetch_array ($clasificador);

									   do {   ?>
									  <option  value="<?php echo $row_clasificador['idcodificadores']?>"
												<?php if(isset($_GET['buscar1']) && strcasecmp($_GET['buscar1'],$row_clasificador['idcodificadores'])==0){ echo 'selected';}?> >
												<?php echo $row_clasificador['nombrecodificador']?>
									  </option>
									  <?php } while ($row_clasificador = pg_fetch_assoc($clasificador));	?>
									</select>
							</strong>
					  </td>

					  <td>
					  <strong>NÚMERO DE NOTA</strong>
					  <strong>
						<input type="text" class="boxBusqueda2" name="buscar2" value=" <?php if(isset($_GET['buscar2'])){ echo strtoupper( trim($_GET['buscar2']));}?> ">
					  </strong>
					  </td>

					<td>
					  <strong>REMITENTE :</strong>
					  <select name=" buscar3" class="combos" id="buscar3">
						<option value=0>ELEGIR ...</option>
						<?php
						$sql_funcionario ="Select idfuncionario,nombre1,nombre2,apellidopat,apellidomat From persona INNER JOIN funcionario ON persona.idpersona=funcionario.idpersona INNER JOIN codificadores ON funcionario.cargo=codificadores.idcodificadores and persona.idpersona>0  where funcionario.estadofun = 'A' ORDER BY nombre1";
						$funcionario = pg_query($cn,$sql_funcionario) ;
						$row_funcionario = pg_fetch_array ($funcionario);

						do {
						?>
						<option value="<?php echo $row_funcionario['idfuncionario']?>"
						<?php if(isset($_GET['buscar3']) && strcasecmp($_GET['buscar3'],$row_funcionario['idfuncionario'])==0){
						echo 'selected';
						}
						?> >
						<?php echo $row_funcionario['nombre1']." ".$row_funcionario['nombre2']." ".$row_funcionario['apellidopat']?> </option>
						<?php } while ($row_funcionario = pg_fetch_assoc($funcionario));	?>
					  </select>
					 </td>

					<td>
					<strong>DESTINATARIO: </strong>
						  <select name="buscar4" class="combos" id="buscar4">
							<option value=0>ELEGIR ...</option>
							<?php
							$sql_funcionario1 ="Select idfuncionario,nombre1,nombre2,apellidopat,apellidomat From persona INNER JOIN funcionario ON persona.idpersona=funcionario.idpersona INNER JOIN codificadores ON funcionario.cargo=codificadores.idcodificadores and persona.idpersona>0 where funcionario.estadofun = 'A' ORDER BY nombre1";
							$funcionario1 = pg_query($cn,$sql_funcionario1) ;
							$row_funcionario1 = pg_fetch_array ($funcionario1);

							do {   ?>
							<option value="<?php echo $row_funcionario1['idfuncionario']?>"
							<?php if(isset($_GET['buscar4']) && strcasecmp($_GET['buscar4'],$row_funcionario1['idfuncionario'])==0){ echo 'selected';}?>
							><?php echo $row_funcionario1['nombre1']." ".$row_funcionario1['nombre2']." ".$row_funcionario1['apellidopat']?> </option>
							<?php } while ($row_funcionario1 = pg_fetch_assoc($funcionario1));	?>
						  </select>
				    </td>

					  <td><strong>FECHA NOTA</strong></td>
					  <td><strong>RECEPCIONAR NOTA</strong></td>
					  <td><strong>EDITAR NOTA</strong></td>
					  <td><strong>IMPRIMIR NOTA</strong></td>
					<!--	<td><strong>COPIAR NOTA</strong></td> -->

		</form>


     <?php
		 ////////////////////////////////////////////////

			// echo $sql_listado;
			$listado = pg_query($cn,$sql_listado);
			$row_listado = pg_fetch_array ($_pagi_result);
			$totalRows_listado = pg_num_rows($_pagi_result);
		$con=1;


	if($totalRows_listado>0){
		do {

	?>
    <tr>
      <td width="1%" ><?php echo trim($con);?></td>
      <td width="17%" ><?php echo trim($row_listado['unidad']);?></td>
      <td width="10%" ><?php echo strtoupper (trim($row_listado['nnota']));?></td>
      <td width="12%" ><?php echo trim($row_listado['remitente']);?></td>
      <td width="12%"><?php echo trim($row_listado['destinatario']);?></td>
      <td width="7%"><?php echo trim($row_listado['fechanota']);?></td>

      <td width="7%" ><?php if($row_listado['fecharecepcionado']=="" && ($row_listado['dest']==$_SESSION['MM_UserId'] || $row_listado['uni']==$_SESSION['MM_Unidad'])   ){ ?>
				<div style="text-align:center;">
			  <form align = "middle" action="N_Nota.php?hab=1" method="post" name="form1">
          <input title="Recepcionar Nota" type='image' width="28" src='../images/ok.png' onClick="this.form1.submit()">
          <input  type="hidden" name="idnot" value="<?php echo $row_listado['idnota'];?>">
          <input type="hidden" name="fecharecepcionado" value="<?php  echo date("Y-m-d");?>">
        </form>
        <?php }else{echo "--";} ?>
				</div>
			</td>

      <td width="7%"> <?php if($row_listado['fecharecepcionado']=="" && ( ($row_listado['reg']==$_SESSION['MM_UserId'] || $row_listado['rem']==$_SESSION['MM_UserId']) )){ ?>
				<div style="text-align:center;">
						<form align = "middle" action="N_Nota.php?hab=0" method="post" name="form1">
		         <input title="Editar Nota" type='image' width="28" src='../images/logosdos/editar.png' onClick="this.form1.submit()">
		         <input type="hidden" name="idnot" value="<?php echo $row_listado['idnota'];?>">
		         <input type="hidden" name="fecharecepcionado" value="<?php  echo $row_listado['fecharecepcionado'];?>">
		    		</form>
		    		<?php }else{echo "--";} ?>
				</div>
			</td>


      <td width="3%">
					<div style="text-align:center;">
			        <form align = "middle" action="ListadoNotas.php" method="post" name="form1">
			          <input id='Imprimir' name='Imprimir' width="28" type='image' src="../images/logosdos/impresora2.png" value="Imprimir" alt="Imprimir">
			          <input type="hidden" name="idp5" value="<?php echo $row_listado['idnota']; ?>">
					  		<input type="hidden" name="unidadimp" value="<?php echo  trim($row_listado['unidad']); ?>">
								<input type="hidden" name="financiamiento" value="<?php echo  trim($row_listado['financiamiento']); ?>">
			        </form>
					</div>
      </td>


			<!--
									<td style="text-align:center;" width="5%">
										<div >
									      <form align = "middle" action="N_Nota.php?hab=0" method="post" name="form1">
									         <input title="Copiar Nota" type='image' width="28" src='../images/logosdos/copy.png' onClick="this.form1.submit()" alt="Copiar Nota">
									         <input type="hidden" name="idnot" value="<?php //echo $row_listado['idnota'];?>">
													 <input type="hidden" name="copia" value="1">
													 <input type="hidden" name="fecharecepcionado" value="">
										    </form>
										</div>
									</td>
						-->

    </tr>


					   <?php $con=$con+1; } while ($row_listado = pg_fetch_assoc($_pagi_result));
					   }else{?>
					   <tr>
					   <td colspan="16" align="center" class="celdaRojo">
						<?php echo "No Existe Datos para esta consulta!!";?>	 </td>
						 </tr>
					   <?php }
					   ?>
</table>


</DIV>


            <?php  echo "<p>" . $_pagi_navegacion . "</p>";
                    ?>



</BODY>
