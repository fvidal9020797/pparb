<?php
session_start();
set_time_limit(5000);


if (isset($_GET["tipocampo"]))
	{
		//echo ("NUEVO");
		$nc=$_GET["tipocampo"];

	 }
elseif(isset($_POST["tipocampo"]))
	{
		//echo ("BUSCAR");
		$nc=$_POST["tipocampo"];

	 }


?>


<HTML>
<HEAD><TITLE>Seleccionar RCIAS</TITLE>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK href="../css/mdryt.css" type=text/css rel=stylesheet>
<link rel="stylesheet" type="text/css" href="../css/button.css"/>
<link rel="stylesheet" href="../css/jquery-ui.css" />
<script language="JavaScript" src="../scripts/funciones.js"></script>
<script src="../libraries/jquery-1.10.3/jquery-1.10.2.min.js"></script>
<script src="../libraries/jquery-1.10.3/jquery-1.10.3.ui.min.js"></script>



<script language="javascript"   type="text/javascript">

function agregarrcia(tableID,dato1,dato2,dato3,dato4,dato5,dato6,dato7,dato8,dato9,dato10,dato11,dato12,ttablapun,idncc) {

		//agregarrcia("rciaspuntajes",codpar,nombrepar,ano,idpre,rciapres,ecp,ecr,gcp,gcr,ccp,ccr,obs)

	var aux = window.opener.document.getElementById("conteorcia");
	var num = parseInt(aux.value);
	var table = window.opener.document.getElementById(tableID);
	var rowCount = num;
	var lastRow = table.rows.length;
	num = num+1;
	var row = table.insertRow(lastRow);

  var cell = row.insertCell(0);




	var cell0 = row.insertCell(1);   //ID PARCELA
	var element0 = window.opener.document.createElement("input");
	element0.type = "text";
	element0.name = "idparcela" + num;
	element0.id = "idparcela" + num;
	element0.setAttribute('class','boxBusqueda2');
	element0.setAttribute('readonly','true');
	element0.value=dato1;
	cell0.appendChild(element0);

  var cell1=row.insertCell(2); // NOMBRE PREDIO
  var element1 = window.opener.document.createElement("input");
  element1.type = "text";
  element1.name = "nombre" + num;
  element1.id = "nombre" + num;
  element1.setAttribute('class','boxBusqueda');
  element1.setAttribute('readonly','true');
  element1.value=dato2;
  cell1.appendChild(element1);

	var cell2 = row.insertCell(3);   //GESTION
	var element2 = window.opener.document.createElement("input");
	element2.type = "text";
	element2.name = "gestion" + num;
	element2.id = "gestion" + num;
	element2.setAttribute('class','boxBusqueda4');
	element2.setAttribute('readonly','true');
	element2.value=dato3;
	cell2.appendChild(element2);

	/* var cell3 = row.insertCell(4);   // rcia presentado
	var element3 = window.opener.document.createElement("input");
	element3.type = "text";
	element3.name = "rciapresentado" + num;
	element3.id = "rciapresentado" + num;
	element3.setAttribute('class','boxBusqueda4');
	element3.value=dato5;
	cell3.appendChild(element3); */


	var cell3 = row.insertCell(4);   // rcia presentado
	var element3 = document.createElement("select");
	element3.name ="rciapresentado" + num;
	element3.id="rciapresentado" + num;
			element3.options[0]=new Option("Elegir...","1");
			element3.options[1]=new Option("PRIMER","1");
			element3.options[2]=new Option("SEGUNDO","2");
			element3.options[3]=new Option("TERCERO","3");
			element3.options[4]=new Option("CUARTO","4");
			element3.options[5]=new Option("QUINTO","5");
	element3.setAttribute('class','combos');
	//alert(dato5);
	element3.value = dato5;
	cell3.appendChild(element3);





	var cell4 = row.insertCell(5);   // eval cpa
	var element4 = window.opener.document.createElement("input");
	element4.type = "text";
	element4.name = "evalcpa" + num;
	element4.id = "evalcpa" + num;
	element4.setAttribute('class','boxBusqueda5');

	if (ttablapun==1) {
			element4.setAttribute('readonly','true');
	}

	element4.value = dato6;
	cell4.appendChild(element4);


	var cell5 = row.insertCell(6);   // eval crebo
	var element5 = window.opener.document.createElement("input");
	element5.type = "text";
	element5.name = "evalcrebo" + num;
	element5.id = "evalcrebo" + num;
	element5.setAttribute('class','boxBusqueda5');
	if (ttablapun==1) {
			element5.setAttribute('readonly','true');
	}
	element5.value = dato7;
	cell5.appendChild(element5);

	var cell6 = row.insertCell(7);   // gabinete cpa
	var element6 = window.opener.document.createElement("input");
	element6.type = "text";
	element6.name = "gabcpa" + num;
	element6.id = "gabcpa" + num;
	element6.setAttribute('class','boxBusqueda5');
	if (ttablapun==1) {
			element6.setAttribute('readonly','true');
	}
	element6.value = dato8;
	cell6.appendChild(element6);

	var cell7 = row.insertCell(8);   // gabinete crebo
	var element7 = window.opener.document.createElement("input");
	element7.type = "text";
	element7.name = "gabcrebo" + num;
	element7.id = "gabcrebo" + num;
	element7.setAttribute('class','boxBusqueda5');
	if (ttablapun==1) {
			element7.setAttribute('readonly','true');
	}
	element7.value = dato9;
	cell7.appendChild(element7);

	var cell8 = row.insertCell(9);   // campo cpa
	var element8 = window.opener.document.createElement("input");
	element8.type = "text";
	element8.name = "campcpa" + num;
	element8.id = "campcpa" + num;
	element8.setAttribute('class','boxBusqueda5');
	if (ttablapun==0) {
		//	element8.setAttribute('readonly','true');
	}
	element8.value = dato10;
	cell8.appendChild(element8);

	var cell9 = row.insertCell(10);   // campo crebo
	var element9 = window.opener.document.createElement("input");
	element9.type = "text";
	element9.name = "campcrebo" + num;
	element9.id = "campcrebo" + num;
	element9.setAttribute('class','boxBusqueda5');
	if (ttablapun==0) {
		//	element9.setAttribute('readonly','true');
	}
	element9.value = dato11;
	cell9.appendChild(element9);

	var cell10 = row.insertCell(11);   // estados
	var element10 = window.opener.document.createElement("div");

	var j = 1;
	var name = '';
	for (var i = 356; i <= 357; i++) {

		var divisor = window.opener.document.createElement("div");

		var elemencheck = window.opener.document.createElement("input");
		elemencheck.type = "checkbox";
		elemencheck.name = "obs" + num + i;
		elemencheck.id = "obs" + num + i;

		var elemenname = window.opener.document.createElement("label");
		elemenname.htmlFor = "idname";

		if(i==356)
		{
			name = 'CUMPLIMIENTO TOTAL';
		}
		else if (i==357) {
			name = 'CUMPLIMIENTO PARCIAL'
		}

		elemenname.appendChild(document.createTextNode(name));
		cell10.appendChild(elemencheck);
		cell10.appendChild(elemenname);

		divisor.setAttribute('class','boxBusqueda3');
		cell10.appendChild(divisor);

		j= j+1;
	}
	cell10.appendChild(element10);


	var cell11 = row.insertCell(12);   // observaciones
	var element11 = window.opener.document.createElement("input");
	element11.type = "text";
	element11.name = "observacionesr" + num;
	element11.id = "observacionesr" + num;

	element11.setAttribute('class','CSSTextArea');
	element11.value = dato12;
	cell11.appendChild(element11);



	var cell12 = row.insertCell(13); // check eliminar


					var ele1 = window.opener.document.createElement("input");
					ele1.type = "button";
					ele1.value = "Eliminar";
					ele1.name = "submit3";
					ele1.setAttribute('onclick','eliminarfilaspuntaje('+ num +', " ' + element1.value +' ",'+ element2.value+')');


					var ele2 = window.opener.document.createElement("input");
					ele2.type = "checkbox";
					ele2.id = "checkbox"+num;
					ele2.setAttribute('style','display:none');

					cell12.appendChild(ele2);
					cell12.appendChild(ele1);




	var cell13= row.insertCell(14); // id solicitud
	var element13 = window.opener.document.createElement("input");
	element13.type = "hidden";
	element13.value = dato4;
	element13.name = "idsolicitud" + num;
	element13.id = "idsolicitud" + num;
	cell13.appendChild(element13);


	var cell14= row.insertCell(15); // id nota puntaje campo
	var element14 = window.opener.document.createElement("input");
	element14.type = "hidden";
	element14.value = idncc;  /// dato 1111
	element14.name = "idnotacamp" + num;
	element14.id = "idnotacamp" + num;
	cell14.appendChild(element14);




	aux.value = num;

        window.opener.recontarIndice();
				window.opener.ponerfoco(num);




}
</script>


<script language="JavaScript">
function actualizarlistarcia(codpar,nombrepar,ano,idpre,rciapres,ecp,ecr,gcp,gcr,ccp,ccr,obs,ti,idnc){
	//alert('entro quis');
	agregarrcia("rciaspuntajes",codpar,nombrepar,ano,idpre,rciapres,ecp,ecr,gcp,gcr,ccp,ccr,obs,ti,idnc)
	window.close();

}
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

		$nc = $_POST["tipocampo"];


		if($nc==0)
		{
			$sql_listado="
			select idsolicitudrecepcionada, codigoparcela, nombre, nombrepolitico as municipio, nombresolicitud, anosolicitud + 2013 as anosolicitud, p.estado,
			np.rciapresentado, evalcpa, evalcrebo, gabcpa, gabcrebo, campcpa, campcrebo, np.observaciones, np.numnotacamp, s.fecharecepcion
			from
			solicitudrecepcionada as s inner join tiposolicitud as t on t.idsolicitud = s.tiposolicitud
			inner join v_parcela as p on p.idparcela = s.codigoparcela
			full join monitoreo.notaspuntuacionrcia as np on np.idsolicitudrcia = s.idsolicitudrecepcionada
			where (tiposolicitud = 5 or tiposolicitud = 12) ";



				if(trim($_POST["buscar1"])!=""){  $sql_listado=$sql_listado." and p.idparcela like '%".strtoupper(trim($_POST['buscar1']))."%'";}
				if(trim($_POST["buscar2"])!=""){  $sql_listado=$sql_listado." and p.nombre like '%".strtoupper(trim($_POST['buscar2']))."%'";}
				if(trim($_POST["buscar3"])!=""){  $sql_listado=$sql_listado." and UPPER(p.nombrepolitico) like '%".strtoupper(trim($_POST['buscar3']))."%'";}
				if($_POST["buscar4"]!='0'){  $sql_listado=$sql_listado." and s.tiposolicitud =".$_POST['buscar4'];}

				$sql_listado=$sql_listado." Order by fecharecepcion desc";


		}
		elseif ($nc==1)
		{
			$sql_listado="
			select idsolicitudrecepcionada, codigoparcela, nombre, nombrepolitico as municipio, nombresolicitud, anosolicitud + 2013 as anosolicitud, p.estado,
			np.rciapresentado, evalcpa, evalcrebo, gabcpa, gabcrebo, campcpa, campcrebo, np.observaciones, np.numnotacamp, s.fecharecepcion
			from
			solicitudrecepcionada as s inner join tiposolicitud as t on t.idsolicitud = s.tiposolicitud
			inner join v_parcela as p on p.idparcela = s.codigoparcela
			inner join monitoreo.notaspuntuacionrcia as np on np.idsolicitudrcia = s.idsolicitudrecepcionada
			where (tiposolicitud = 5 or tiposolicitud = 12) ";



				if(trim($_POST["buscar1"])!=""){  $sql_listado=$sql_listado." and p.idparcela like '%".strtoupper(trim($_POST['buscar1']))."%'";}
				if(trim($_POST["buscar2"])!=""){  $sql_listado=$sql_listado." and p.nombre like '%".strtoupper(trim($_POST['buscar2']))."%'";}
				if(trim($_POST["buscar3"])!=""){  $sql_listado=$sql_listado." and UPPER(p.nombrepolitico) like '%".strtoupper(trim($_POST['buscar3']))."%'";}
				if($_POST["buscar4"]!='0'){  $sql_listado=$sql_listado." and s.tiposolicitud =".$_POST['buscar4'];}

				$sql_listado=$sql_listado." Order by fecharecepcion desc";

		}


	}

else
	{


		if($nc==0)
		{
			$sql_listado="
			select idsolicitudrecepcionada, codigoparcela, nombre, nombrepolitico as municipio, nombresolicitud, anosolicitud + 2013 as anosolicitud, p.estado,
			np.rciapresentado, evalcpa, evalcrebo, gabcpa, gabcrebo, campcpa, campcrebo, np.observaciones, np.numnotacamp, s.fecharecepcion
			from
			solicitudrecepcionada as s inner join tiposolicitud as t on t.idsolicitud = s.tiposolicitud
			inner join v_parcela as p on p.idparcela = s.codigoparcela
			full join monitoreo.notaspuntuacionrcia as np on np.idsolicitudrcia = s.idsolicitudrecepcionada
			where (tiposolicitud = 5 or tiposolicitud = 12)";

		}
		elseif($nc==1)
		{
			$sql_listado="
			select idsolicitudrecepcionada, codigoparcela, nombre, nombrepolitico as municipio, nombresolicitud, anosolicitud + 2013 as anosolicitud, p.estado,
			np.rciapresentado, evalcpa, evalcrebo, gabcpa, gabcrebo, campcpa, campcrebo, np.observaciones, np.numnotacamp, s.fecharecepcion
			from
			solicitudrecepcionada as s inner join tiposolicitud as t on t.idsolicitud = s.tiposolicitud
			inner join v_parcela as p on p.idparcela = s.codigoparcela
			inner join monitoreo.notaspuntuacionrcia as np on np.idsolicitudrcia = s.idsolicitudrecepcionada
			where (tiposolicitud = 5 or tiposolicitud = 12)";

		}






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

<form action="N_rcias_recibidos.php" method="post" enctype="multipart/form-data" name="formulario">

		   <table>
	 					<td rowspan = "2">
				      	<input type="submit" name="submit" class="boton verde formaBoton" value="Buscar">
								<input type="hidden" name="tipocampo" value="<?php echo $nc; ?>">

						</td>
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


						<td><strong>Tipo de Monitoreo</strong>
								<select name="buscar4" class"combos" id="buscar4" required="required">
									<option value=0>ELEGIR ...</option>
									<?php
									$sql_solicitud ="select * from tiposolicitud where idsolicitud = 5 or idsolicitud = 12";
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

						<td>
						<strong>Fecha Recepcion</strong>
						</td>

						<td><strong>Estado</strong>

					</td>

</form>

  <?php
	if($totalRows_listado>0){


	do {


	?>
  <tr>
				<td> <a>  <?php echo $con;?>  </a></td>
				<td> <a href="javascript:actualizarlistarcia('<?php echo trim($row_listado["codigoparcela"])."','".trim($row_listado["nombre"])."','". trim($row_listado["anosolicitud"])."','". trim($row_listado["idsolicitudrecepcionada"])."','". trim($row_listado["rciapresentado"])."','".trim($row_listado["evalcpa"])."','".trim($row_listado["evalcrebo"])."','".trim($row_listado["gabcpa"])."','".trim($row_listado["gabcrebo"])."','".trim($row_listado["campcpa"])."','".trim($row_listado["campcrebo"])."','".trim($row_listado["observaciones"])."','".$nc."','".trim($row_listado["numnotacamp"])?>')" > <?php echo $row_listado["codigoparcela"];?> </a></td>
		    <td> <a href="javascript:actualizarlistarcia('<?php echo trim($row_listado["codigoparcela"])."','".trim($row_listado["nombre"])."','". trim($row_listado["anosolicitud"])."','". trim($row_listado["idsolicitudrecepcionada"])."','". trim($row_listado["rciapresentado"])."','".trim($row_listado["evalcpa"])."','".trim($row_listado["evalcrebo"])."','".trim($row_listado["gabcpa"])."','".trim($row_listado["gabcrebo"])."','".trim($row_listado["campcpa"])."','".trim($row_listado["campcrebo"])."','".trim($row_listado["observaciones"])."','".$nc."','".trim($row_listado["numnotacamp"])?>')" > <?php echo $row_listado["nombre"];?> </a></td>
				<td> <a href="javascript:actualizarlistarcia('<?php echo trim($row_listado["codigoparcela"])."','".trim($row_listado["nombre"])."','". trim($row_listado["anosolicitud"])."','". trim($row_listado["idsolicitudrecepcionada"])."','". trim($row_listado["rciapresentado"])."','".trim($row_listado["evalcpa"])."','".trim($row_listado["evalcrebo"])."','".trim($row_listado["gabcpa"])."','".trim($row_listado["gabcrebo"])."','".trim($row_listado["campcpa"])."','".trim($row_listado["campcrebo"])."','".trim($row_listado["observaciones"])."','".$nc."','".trim($row_listado["numnotacamp"])?>')" > <?php echo $row_listado["municipio"];?> </a></td>
				<td> <a href="javascript:actualizarlistarcia('<?php echo trim($row_listado["codigoparcela"])."','".trim($row_listado["nombre"])."','". trim($row_listado["anosolicitud"])."','". trim($row_listado["idsolicitudrecepcionada"])."','". trim($row_listado["rciapresentado"])."','".trim($row_listado["evalcpa"])."','".trim($row_listado["evalcrebo"])."','".trim($row_listado["gabcpa"])."','".trim($row_listado["gabcrebo"])."','".trim($row_listado["campcpa"])."','".trim($row_listado["campcrebo"])."','".trim($row_listado["observaciones"])."','".$nc."','".trim($row_listado["numnotacamp"])?>')" > <?php echo $row_listado["nombresolicitud"];?> </a></td>
        <td> <a href="javascript:actualizarlistarcia('<?php echo trim($row_listado["codigoparcela"])."','".trim($row_listado["nombre"])."','". trim($row_listado["anosolicitud"])."','". trim($row_listado["idsolicitudrecepcionada"])."','". trim($row_listado["rciapresentado"])."','".trim($row_listado["evalcpa"])."','".trim($row_listado["evalcrebo"])."','".trim($row_listado["gabcpa"])."','".trim($row_listado["gabcrebo"])."','".trim($row_listado["campcpa"])."','".trim($row_listado["campcrebo"])."','".trim($row_listado["observaciones"])."','".$nc."','".trim($row_listado["numnotacamp"])?>')" > <?php echo $row_listado["anosolicitud"];?> </a></td>
				<td> <a href="javascript:actualizarlistarcia('<?php echo trim($row_listado["codigoparcela"])."','".trim($row_listado["nombre"])."','". trim($row_listado["anosolicitud"])."','". trim($row_listado["idsolicitudrecepcionada"])."','". trim($row_listado["rciapresentado"])."','".trim($row_listado["evalcpa"])."','".trim($row_listado["evalcrebo"])."','".trim($row_listado["gabcpa"])."','".trim($row_listado["gabcrebo"])."','".trim($row_listado["campcpa"])."','".trim($row_listado["campcrebo"])."','".trim($row_listado["observaciones"])."','".$nc."','".trim($row_listado["numnotacamp"])?>')" > <?php echo $row_listado["fecharecepcion"];?> </a></td>
				<td> <a href="javascript:actualizarlistarcia('<?php echo trim($row_listado["codigoparcela"])."','".trim($row_listado["nombre"])."','". trim($row_listado["anosolicitud"])."','". trim($row_listado["idsolicitudrecepcionada"])."','". trim($row_listado["rciapresentado"])."','".trim($row_listado["evalcpa"])."','".trim($row_listado["evalcrebo"])."','".trim($row_listado["gabcpa"])."','".trim($row_listado["gabcrebo"])."','".trim($row_listado["campcpa"])."','".trim($row_listado["campcrebo"])."','".trim($row_listado["observaciones"])."','".$nc."','".trim($row_listado["numnotacamp"])?>')" > <?php echo $row_listado["estado"];?> </a></td>

  </tr>

	<?php $con=$con+1;
  } while ($row_listado = pg_fetch_assoc($_pagi_result));
	}

  else{?>
	<tr>
	<td colspan="16" align="center" class="celdaRojo">
 <?php echo "No Existen RCIAS Presentados";?>	 </td>
	</tr>
	<?php }
	?>

</table>

</DIV>

<?php  echo "<p>" . $_pagi_navegacion . "</p>";
				?>



</BODY>
</HTML>
