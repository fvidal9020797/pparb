<?php
session_start();
set_time_limit(5000);
?>


<HTML>
<HEAD><TITLE>Busqueda avanzada</TITLE>

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
	var element = window.opener.document.createElement("input");
	element.type = "checkbox";
	cell.appendChild(element);


	var cell0 = row.insertCell(1);   //celda 1
	var element0 = window.opener.document.createElement("input");
	element0.type = "text";
	element0.name = "idparcela" + num;
	element0.id = "idparcela" + num;
	element0.setAttribute('class','boxBusqueda2');
	element0.setAttribute('readonly','true');
	element0.value=dato1;
	cell0.appendChild(element0);

  var cell1=row.insertCell(2);
  var element1 = window.opener.document.createElement("input");
  element1.type = "text";
  element1.name = "nombre" + num;
  element1.id = "nombre" + num;
  element1.setAttribute('class','boxBusqueda');
  element1.setAttribute('readonly','true');
  element1.value=dato2;
  cell1.appendChild(element1);

	var cell2 = row.insertCell(3);   //celda 2
	var element2 = window.opener.document.createElement("input");
	element2.type = "textarea";
	element2.name = "estado" + num;
	element2.id = "estado" + num;
	element2.setAttribute('class','boxBusqueda');
	element2.setAttribute('readonly','true');
	element2.value=dato3;
	cell2.appendChild(element2);

	var cell3 = row.insertCell(4);   //celda 3
	var element3 = window.opener.document.createElement("input");
	element3.type = "textarea";
	element3.name = "observacionesr" + num;
	element3.id = "observacionesr" + num;
	element3.setAttribute('class','CSSTextArea');
	cell3.appendChild(element3);

  var cell4 = row.insertCell(5);
	var element4 = window.opener.document.createElement("input");
	element4.type = "hidden";
	element4.value = dato4;
	element4.name = "idsolicitud" + num;
	element4.id = "idsolicitud" + num;
	cell4.appendChild(element4);

	aux.value = num;
}
</script>


<script language="JavaScript">
function actualizaPadre(codpar,nombrepar,tiposol,idpre){
	addRow("segui",codpar,nombrepar,tiposol,idpre)
	window.close()
	//alert (cientifico);
}


</script>


</HEAD>

<BODY >
<?php
include "../Valid.php";

$pageNum_registro=0;
$maxRows_registro = 20;

$startRow_registro = $pageNum_registro * $maxRows_registro;
//echo "post:".$_GET;

if (isset($_GET["buscar1"]))
	{
	$sql_listado="
    select p.idregistro,p.idparcela,p.nombre as nombrepredio ,p.superficie,UPPER(p.nombrepolitico) as nombremunicipio,pe.noidentidad,pe.lugarci,pe.telefono,pb.poblador ,p.estado,pe.nombre1,pe.nombre2,pe.apellidopat,pe.apellidomat
    from v_parcela p join  parcelabeneficiario pb on p.idparcela=pb.idparcela
    join persona pe on pe.idpersona=pb.idpersona
    where p.idregistro > 0
	";

		if(trim($_GET["buscar1"])!=""){  $sql_listado=$sql_listado." and p.idparcela like '%".strtoupper(trim($_GET['buscar1']))."%'";}
		if(trim($_GET["buscar2"])!=""){  $sql_listado=$sql_listado." and p.nombre like '%".strtoupper(trim($_GET['buscar2']))."%'";}
		if(trim($_GET["buscar3"])!=""){  $sql_listado=$sql_listado." and UPPER(pe.nombre1) like '%".strtoupper(trim($_GET['buscar3']))."%'";}
        if(trim($_GET["buscar4"])!=""){  $sql_listado=$sql_listado." and UPPER(pe.nombre2) like '%".strtoupper(trim($_GET['buscar4']))."%'";}
        if(trim($_GET["buscar5"])!=""){  $sql_listado=$sql_listado." and UPPER(pe.apellidopat) like '%".strtoupper(trim($_GET['buscar5']))."%'";}
        if(trim($_GET["buscar6"])!=""){  $sql_listado=$sql_listado." and UPPER(pe.apellidomat) like '%".strtoupper(trim($_GET['buscar6']))."%'";}
		if(trim($_GET["buscar7"])!=""){  $sql_listado=$sql_listado." and pe.noidentidad like '%".strtoupper(trim($_GET['buscar7']))."%'";}



        $sql_listado=$sql_listado." Order by fecharegistro desc";
	//	  echo $sql_listado;
	// $rs=sql_ejecutar($cn,$sql_listado);
    }
else
	{
		$sql_listado="
		 select p.idregistro,p.idparcela,p.nombre as nombrepredio ,p.superficie,UPPER(p.nombrepolitico) as nombremunicipio, pe.noidentidad,pe.lugarci,pe.telefono,pb.poblador,p.estado ,pe.nombre1,pe.nombre2,pe.apellidopat,pe.apellidomat
        from v_parcela p join  parcelabeneficiario pb on p.idparcela=pb.idparcela
        join persona pe on pe.idpersona=pb.idpersona
        where p.idregistro > 0  order by p.idparcela asc  ";

		//$rs=sql_ejecutar($cn,$sql_listado);

	}

	$_pagi_sql = $sql_listado;
		//cantidad de resultados por pagina (opcional, por defecto 20)
		$_pagi_cuantos = 10;
		$_pagi_nav_num_enlaces = 10;
		include("../scripts/paginator.inc.php");


?>



<div class="CSSTable" >

<form action="ListadoPrediosSeguimiento_busqueda.php" method="get" enctype="multipart/form-data" name="form">

		   <table style="width:100%;"" >
               <tr style="width:100%;">
	 			<td rowspan = "2" style="width:100%;">
				      <input type="submit" name="submit" class="boton verde formaBoton" value="Buscar"></td>
				</tr>
			</table>

			<table>
                <tr>
				<td align="center">
					<strong>N°</strong>
				</td>

					  <td align="center">
							<strong>Codigo Parcela:</strong>
							 <strong><input style="width:100%;" type="text" class="boxBusqueda2" name="buscar1"  value="<?php if
                                                                                                                              (isset($_GET["buscar1"]) && ($_GET["buscar1"]!="")){echo $_GET["buscar1"];} ?>"></strong>
					  </td>

					  <td align="center">
					  <strong>Nombre de Predio:</strong>
					  <strong><input style="width:100%;" type="text" class="boxBusqueda2" name="buscar2" value="<?php if(isset($_GET["buscar2"]) && ($_GET["buscar2"]!="")){echo $_GET["buscar2"];} ?>" ></strong>
					  </td>

						 <td  >
						  <strong>Primer Nombre:</strong>
							<strong><input style="width:100%; " type="text" class="boxBusqueda2" name="buscar3" value="<?php if(isset($_GET["buscar3"]) && ($_GET["buscar3"]!="")){echo $_GET["buscar3"];} ?>"></strong>
						 </td>
                         <td  >
						  <strong>Segundo Nombre:</strong>
							<strong><input style="width:100%; " type="text" class="boxBusqueda2" name="buscar4" value="<?php if(isset($_GET["buscar4"]) && ($_GET["buscar4"]!="")){echo $_GET["buscar4"];} ?>"></strong>
						 </td>
                         <td  >
						  <strong>Apellido Paterno:</strong>
							<strong><input style="width:100%; " type="text" class="boxBusqueda2" name="buscar5" value="<?php if(isset($_GET["buscar5"]) && ($_GET["buscar5"]!="")){echo $_GET["buscar5"];} ?>"></strong>
						 </td>
                         <td  >
						  <strong>Apellido Materno:</strong>
							<strong><input style="width:100%; " type="text" class="boxBusqueda2" name="buscar6" value="<?php if(isset($_GET["buscar6"]) && ($_GET["buscar6"]!="")){echo $_GET["buscar6"];} ?>"></strong>
						 </td>

						<td>
                             <strong>C.I Beneficiario:</strong>
							<strong><input style="width:100%; " type="text" class="boxBusqueda2" name="buscar7" value="<?php if(isset($_GET["buscar7"]) && ($_GET["buscar7"]!="")){echo $_GET["buscar7"];} ?>" ></strong>
						</td>
				        <td align="center">
	                        <strong>Telefono Beneficiario</strong>
                        </td>
                        <td align="center">
	                        <strong>Superficie</strong>
                        </td>
                        <td align="center">
	                        <strong>Municipio</strong>
                        </td>
                        <td align="center">
	                        <strong>Estado</strong>
                        </td>
                        <td align="center">
                            <strong>Poblador</strong>
                        </td>
            <tr>

</form>


  <?php
	$listado = pg_query($cn,$sql_listado);
	//$row_listado = pg_fetch_array ($_pagi_result);
	$totalRows_listado = pg_num_rows($_pagi_result);
	$con=1;

    //echo " cantidad:".$totalRows_listado;
	if($totalRows_listado>0){


	while ($row_listado = pg_fetch_assoc($_pagi_result))
	{?>
  <tr>
			<td ><?php echo $con;?></td>
			<td ><?php echo $row_listado["idparcela"];?></td>
		    <td ><?php echo $row_listado["nombrepredio"];?></td>
			<td ><?php echo $row_listado["nombre1"];?></td>
            <td ><?php echo $row_listado["nombre2"];?></td>
            <td ><?php echo $row_listado["apellidopat"];?></td>
            <td ><?php echo $row_listado["apellidomat"];?></td>
			<td ><?php echo $row_listado["noidentidad"];?></td>
		    <td ><?php echo $row_listado["telefono"];?></td>
		    <td ><?php echo $row_listado["superficie"];?></td>
		    <td ><?php echo $row_listado["nombremunicipio"];?></td>
            <td ><?php echo $row_listado["estado"];?></td>
            <td ><?php if($row_listado["poblador"]==1){echo 'Comunario'; };?></td>
  </tr>

	<?php $con=$con+1; }
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
</HTML>
