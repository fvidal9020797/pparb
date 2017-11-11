<?php
session_start();
set_time_limit(5000);
?>


<HTML>
<HEAD><TITLE>Seleccionar Notas o Solicitudes</TITLE>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK href="../css/mdryt.css" type=text/css rel=stylesheet>
<link rel="stylesheet" type="text/css" href="../css/button.css"/>
<link rel="stylesheet" href="../css/jquery-ui.css" />
<script language="JavaScript" src="../scripts/funciones.js"></script>
 <script src="../libraries/jquery-1.10.3/jquery-1.10.2.min.js"></script>
<script src="../libraries/jquery-1.10.3/jquery-1.10.3.ui.min.js"></script>



<script language="javascript"   type="text/javascript">

function addRow(tableID,dato1,dato2,dato3,dato4) {

	var aux = window.opener.document.getElementById("conteo");
	var num = parseInt(aux.value);
	var table = window.opener.document.getElementById(tableID);
	var rowCount = num;
	var lastRow = table.rows.length;
	num = num+1;
	var row = table.insertRow(lastRow);

        var cell = row.insertCell(0);


	var cell = row.insertCell(1);
	var element = window.opener.document.createElement("input");
	element.type = "checkbox";
	cell.appendChild(element);


	var cell0 = row.insertCell(2);   //celda 1
	var element0 = window.opener.document.createElement("input");
	element0.type = "text";
	element0.name = "idparcela" + num;
	element0.id = "idparcela" + num;
	element0.setAttribute('class','boxBusqueda2');
	element0.setAttribute('readonly','true');
	element0.value=dato1;
	cell0.appendChild(element0);

  var cell1=row.insertCell(3);
  var element1 = window.opener.document.createElement("input");
  element1.type = "text";
  element1.name = "nombre" + num;
  element1.id = "nombre" + num;
  element1.setAttribute('class','boxBusqueda');
  element1.setAttribute('readonly','true');
  element1.value=dato2;
  cell1.appendChild(element1);

	var cell2 = row.insertCell(4);   //celda 2
	var element2 = window.opener.document.createElement("input");
	element2.type = "textarea";
	element2.name = "estado" + num;
	element2.id = "estado" + num;
	element2.setAttribute('class','boxBusqueda');
	element2.setAttribute('readonly','true');
	element2.value=dato3;
	cell2.appendChild(element2);

	var cell3 = row.insertCell(5);   //celda 3
	var element3 = window.opener.document.createElement("input");
	element3.type = "textarea";
	element3.name = "observacionesr" + num;
	element3.id = "observacionesr" + num;
	element3.setAttribute('class','CSSTextArea');
	cell3.appendChild(element3);

  var cell4 = row.insertCell(6);
	var element4 = window.opener.document.createElement("input");
	element4.type = "hidden";
	element4.value = dato4;
	element4.name = "idsolicitud" + num;
	element4.id = "idsolicitud" + num;
	cell4.appendChild(element4);

	aux.value = num;

        window.opener.recontarIndice();
}
</script>


<script language="JavaScript">
function actualizaPadre(codpar,nombrepar,tiposol,idpre){
	addRow("segui",codpar,nombrepar,tiposol,idpre)
	window.close()
	//alert (cientifico);
}


$(function() {
    $("#buscar6").datepicker({
        changeMonth: true,
        changeYear: true,
        maxDate: "+5y +1M +10D",
        dateFormat: "yy-mm-dd"
    });

});

</script>


</HEAD>

<BODY >
<?php
include "../Valid.php";

$pageNum_registro=0;
$maxRows_registro = 20;

$startRow_registro = $pageNum_registro * $maxRows_registro;


if (isset($_POST["buscar1"]))
	{
	$sql_listado="
	select p.idregistro, p.idparcela, p.nombre as predio, UPPER(p.nombrepolitico) as municipio, s.cite, s.tiposolicitud, t.nombresolicitud  , s.anosolicitud,s.fecharecepcion, s.remitentes, s.idsolicitudrecepcionada
	from
	solicitudrecepcionada as s inner join tiposolicitud as t on t.idsolicitud = s.tiposolicitud
	inner join v_funcionario_general as f on f.idfuncionario = s.idfuncionario
	inner join v_parcela as p on p.idparcela = s.codigoparcela where p.idregistro > 0
	";

		if(trim($_POST["buscar1"])!=""){  $sql_listado=$sql_listado." and p.idparcela like '%".strtoupper(trim($_POST['buscar1']))."%'";}
		if(trim($_POST["buscar2"])!=""){  $sql_listado=$sql_listado." and p.nombre like '%".strtoupper(trim($_POST['buscar2']))."%'";}
		if(trim($_POST["buscar3"])!=""){  $sql_listado=$sql_listado." and UPPER(p.nombrepolitico) like '%".strtoupper(trim($_POST['buscar3']))."%'";}
		if(trim($_POST["buscar4"])!=""){  $sql_listado=$sql_listado." and s.cite like '%".strtoupper(trim($_POST['buscar4']))."%'";}
		if($_POST["buscar5"]!='0'){  $sql_listado=$sql_listado." and s.tiposolicitud =".$_POST['buscar5'];}
		if(trim($_POST["buscar6"])!=""){  $sql_listado=$sql_listado." and s.fecharecepcion = '".trim($_POST['buscar6'])."'";}
		if(trim($_POST["buscar7"])!=""){  $sql_listado=$sql_listado." and s.remitentes like '%".strtoupper(trim($_POST['buscar7']))."%'";}

    $sql_listado=$sql_listado." Order by fecharecepcion desc";

	}

else
	{
		$sql_listado="
		select p.idregistro, p.idparcela, p.nombre as predio, UPPER(p.nombrepolitico) as municipio, s.cite, t.nombresolicitud, s.anosolicitud, s.fecharecepcion, s.remitentes, s.idsolicitudrecepcionada
		from
		solicitudrecepcionada as s inner join tiposolicitud as t on t.idsolicitud = s.tiposolicitud
		inner join v_funcionario_general as f on f.idfuncionario = s.idfuncionario
		inner join v_parcela as p on p.idparcela = s.codigoparcela
		order by s.fecharecepcion desc ";

	}

  $_pagi_sql = $sql_listado;
    $_pagi_cuantos = 20;
    $_pagi_nav_num_enlaces = 10;
    include("../scripts/paginator.inc.php");

    $listado = pg_query($cn,$sql_listado);
    $row_listado = pg_fetch_array ($_pagi_result);
    $totalRows_listado = pg_num_rows($_pagi_result);
    $con=1;

?>



<div class="CSSTable" >

<form action="N_SolicitudExt.php" method="post" enctype="multipart/form-data" name="formulario">

		   <table>
	 			<td rowspan = "2">
				      <input type="submit" name="submit" class="boton verde formaBoton" value="Buscar"></td>
				</td>
			</table >

			<table >

				<td align="center">
					<strong>N°</strong>
				</td>

					  <td align="center">
							<strong>Codigo Parcela</strong>
							<strong><input type="text" class="boxBusqueda2" name="buscar1"></strong>
					  </td>

					  <td align="center">
					  <strong>Nombre de Predio</strong>
					  <strong><input type="text" class="boxBusqueda2" name="buscar2"></strong>
					  </td>

						 <td>
						  <strong>Municipio</strong>
							<strong><input type="text" class="boxBusqueda2" name="buscar3"></strong>
						 </td>

						<td>
						<strong>Cite o Nuri: </strong>
						<strong><input type="text" class="boxBusqueda2" name="buscar4"></strong>
					  </td>

						<td><strong>Tipo de Solicitud</strong>
								<select name="buscar5" class="combos" id="buscar5" required="required">
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

            <td>
            <strong>Año Solicitud</strong>
            </td>

					<td><strong>Fecha Recepcion</strong>
						<strong><input id="buscar6" name="buscar6" type="text" value=""/></strong>
					</td>

					<td><strong>Remitentes</strong>
					<strong><input type="text" class="boxBusqueda2" name="buscar7"></strong>
					</td>
</form>

  <?php
	if($totalRows_listado>0){


	do {

    $an = "";
    if ($row_listado["anosolicitud"] > 0)
    {
        $año_=intval($row_listado["anosolicitud"])+2013;
      $an = "Año ".$año_;
    }

	?>
  <tr>
				<td ><a >  <?php echo $con;?>  </a></td>
				<td ><a href="javascript:actualizaPadre('<?php echo trim($row_listado["idparcela"])."','".trim($row_listado["predio"])."','". trim($row_listado["nombresolicitud"]." ".$an)."','". trim($row_listado["idsolicitudrecepcionada"])?>')" >  <?php echo $row_listado["idparcela"];?>  </a></td>
		    <td ><a href="javascript:actualizaPadre('<?php echo trim($row_listado["idparcela"])."','".trim($row_listado["predio"])."','". trim($row_listado["nombresolicitud"]." ".$an)."','". trim($row_listado["idsolicitudrecepcionada"])?>')" > <?php echo $row_listado["predio"];?>  </a></td>
				<td ><a href="javascript:actualizaPadre('<?php echo trim($row_listado["idparcela"])."','".trim($row_listado["predio"])."','". trim($row_listado["nombresolicitud"]." ".$an)."','". trim($row_listado["idsolicitudrecepcionada"])?>')" > <?php echo $row_listado["municipio"];?>  </a></td>
				<td ><a href="javascript:actualizaPadre('<?php echo trim($row_listado["idparcela"])."','".trim($row_listado["predio"])."','". trim($row_listado["nombresolicitud"]." ".$an)."','". trim($row_listado["idsolicitudrecepcionada"])?>')" > <?php echo $row_listado["cite"];?>  </a></td>
		    <td ><a href="javascript:actualizaPadre('<?php echo trim($row_listado["idparcela"])."','".trim($row_listado["predio"])."','". trim($row_listado["nombresolicitud"]." ".$an)."','". trim($row_listado["idsolicitudrecepcionada"])?>')" > <?php echo $row_listado["nombresolicitud"];?>  </a></td>
        <?php
        if ($row_listado["anosolicitud"]>0)
        {
        ?>
        <td ><a href="javascript:actualizaPadre('<?php echo trim($row_listado["idparcela"])."','".trim($row_listado["predio"])."','". trim($row_listado["nombresolicitud"]." ".$an)."','". trim($row_listado["idsolicitudrecepcionada"])?>')" > <?php echo $row_listado["anosolicitud"]+2013;?>  </a></td>
        <?php
        }
        else
        {
        ?>
          <td > --- </a></td>
          <?php
        }
        ?>
        <td ><a href="javascript:actualizaPadre('<?php echo trim($row_listado["idparcela"])."','".trim($row_listado["predio"])."','". trim($row_listado["nombresolicitud"]." ".$an)."','". trim($row_listado["idsolicitudrecepcionada"])?>')" ><?php echo $row_listado["fecharecepcion"];?></a></td>
		    <td ><a href="javascript:actualizaPadre('<?php echo trim($row_listado["idparcela"])."','".trim($row_listado["predio"])."','". trim($row_listado["nombresolicitud"]." ".$an)."','". trim($row_listado["idsolicitudrecepcionada"])?>')" ><?php echo $row_listado["remitentes"];?></a></td>
  </tr>

	<?php $con=$con+1;
  } while ($row_listado = pg_fetch_assoc($_pagi_result));
	}

  else{?>
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
</HTML>
