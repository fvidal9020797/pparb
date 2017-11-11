<?php
session_start();
include "../Valid.php";

if (isset($_GET["c"]))
	{
		$campo=$_GET["c"];
		if(isset($_SESSION['arboles_existentes'])){unset($_SESSION['arboles_existentes']);}
	 }
elseif(isset($_POST["c"]))
	{
		$campo=$_POST["c"];
	}



	if (isset($_POST["submit"]))  /// busqueda de especies
	{
 	  $campo=$_POST["c"];

	 $look=strtoupper(trim($_POST["buscar"]));
	 $rs=sql_ejecutar($cn,"SELECT   especienombrecomun.idespecie, upper(especie.nombrecientifico) as nombrecientifico,
								especienombrecomun.nombrecomun, especienombrecomun.idespeciecomun
							FROM
								public.especie, public.especienombrecomun
							WHERE
								especie.idespecie = especienombrecomun.idespecie and (nombrecomun like '%$look%' OR upper(nombrecientifico) like '%$look%') Order by nombrecomun ASC LIMIT 5 ");
	}

	elseif (isset($_POST["submit2"])) // guardar especeis
	{

			$_SESSION['arboles_existentes']=$_POST;

					//echo ($_SESSION['arboles_existentes']['conteo']);

			if (trim($_SESSION['arboles_existentes']['conteo'])==0)
			{
				//trigger_error ("Debe existir al menos una especie existente", E_USER_ERROR);
				echo '<script>alert("Debe existir al menos una Especie")</script>';
			}
			else
			{
				$delete= "delete from censoarboles where idregistro =".	$_SESSION['arboles_existentes']['c'];
				$Result = pg_query($cn, $delete);

				for ( $i=1; $i <= $_SESSION['arboles_existentes']['conteo'] ; $i++) {

								 if(isset($_SESSION['arboles_existentes']['idespeciearbol'.$i]) && ($_SESSION['arboles_existentes']['idespeciearbol'.$i]!="")){

									$insertUSR2=sprintf("insert into censoarboles values(%s,%s,%s);",
																													GetSQLValueString($_SESSION['arboles_existentes']['c'], "int"),
																													GetSQLValueString($_SESSION['arboles_existentes']['idespeciearbol'.$i], "int"),
																													GetSQLValueString(trim($_SESSION['arboles_existentes']['cantidadespecie'.$i]), "text"));

									 $Result2 = pg_query($cn, $insertUSR2);
					 	 }
				}



				$sql_censo2 = "select c.*, e.nombrecomun from censoarboles as c inner join especienombrecomun as e on c.idespeciecomun = e.idespeciecomun where idregistro = ".$campo." order by cantidad asc";   /// order'
				$detallecenso2 = pg_query($cn,$sql_censo2);
				$row_detallencenso2 = pg_fetch_array ($detallecenso2);
				$total_row_detalle_censo2 = pg_num_rows($detallecenso2);

					$_SESSION['arboles_existentes']['conteo'] = $total_row_detalle_censo2;

				echo '<script>alert("Datos Guardados Exitosamente")</script>';
				if(isset($_SESSION['arboles_existentes'])){unset($_SESSION['arboles_existentes']);}
			}



			$rs=sql_ejecutar($cn," select   especienombrecomun.idespecie, upper(especie.nombrecientifico) as nombrecientifico,	especienombrecomun.nombrecomun, especienombrecomun.idespeciecomun
			FROM public.especie, public.especienombrecomun	WHERE especie.idespecie = especienombrecomun.idespecie Order by nombrecomun ASC LIMIT 5");

	}
	else  /// datos cargados por defecto
	{
			$rs=sql_ejecutar($cn," select   especienombrecomun.idespecie, upper(especie.nombrecientifico) as nombrecientifico,	especienombrecomun.nombrecomun, especienombrecomun.idespeciecomun
			FROM public.especie, public.especienombrecomun	WHERE especie.idespecie = especienombrecomun.idespecie Order by nombrecomun ASC LIMIT 5");
	}

	$sql_censo = "select c.*, e.nombrecomun from censoarboles as c inner join especienombrecomun as e on c.idespeciecomun = e.idespeciecomun where idregistro = ".$campo." order by cantidad asc";   /// order'
	$detallecenso = pg_query($cn,$sql_censo);
	$row_detallencenso = pg_fetch_array ($detallecenso);
	$total_row_detalle_censo = pg_num_rows($detallecenso);

?>

<HTML>
<HEAD><TITLE>Elegir Arboles Existentes</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK href="../css/mdryt.css" type=text/css rel=stylesheet>
<link rel="stylesheet" type="text/css" href="../css/button.css"/>
<link rel="stylesheet" type="text/css" href="../css/button.css" />
<link rel="stylesheet" href="../css/jquery-ui.css" />
 <script src="../libraries/jquery-1.10.3/jquery-1.10.2.min.js"></script>
<script src="../libraries/jquery-1.10.3/jquery-1.10.3.ui.min.js"></script>
<script language="JavaScript">

function cargarespecie(comun,id){
	addRow("arboles",comun,id);
}


function deleteRow1(tableID) {

	 try {
			 var table = document.getElementById(tableID);

			 var rowCount = table.rows.length;
			 for(var i=0; i<rowCount; i++)
			 		{
					 var row = table.rows[i];
					 var chkbox = row.cells[0].childNodes[0];

					 if(null != chkbox && true == chkbox.checked)
					 {
						 table.deleteRow(i);
						 rowCount--;
						 i--;
					 }
					}

		 }catch(e) {
			 alert(e);
		 }
}


function addRow(tableID,dato1,dato2) {   //nombrecomun,id

	var aux = document.getElementById("conteo");
	var num = parseInt(aux.value);
	var table = document.getElementById(tableID);
	var rowCount = num;
	var lastRow = table.rows.length;
	num = num+1;
	var row = table.insertRow(lastRow);

	var cell = row.insertCell(0);   //celda 1
	var element = document.createElement("input");
	element.type = "checkbox";
	cell.appendChild(element);

	var cell1 = row.insertCell(1);   //celda 2
	var element1 = document.createElement("input");
	element1.type = "text";
	element1.name = "nombreespecie" + num;
	element1.id = "nombreespecie" + num;
	element1.value = dato1;
	element1.setAttribute('class','boxBusqueda');
	element1.setAttribute('readonly','true');
	cell1.appendChild(element1);

	var cell2 = row.insertCell(2);   //celda 3
	var element2 = document.createElement("input");
	element2.type = "text";
	element2.name = "cantidadespecie" + num;
	element2.id = "cantidadespecie" + num;
	element2.setAttribute('class','boxBusqueda4');
	element2.setAttribute('onkeypress','blockNonNumbers(this, event, true, false)');
	element2.setAttribute('onkeyup','extractNumber(this,0,false)');
	cell2.appendChild(element2);

	var cell3 = row.insertCell(3);
	var element3 = document.createElement("input");
	element3.type = "hidden";
	element3.value = dato2;
	element3.name = "idespeciearbol" + num;
	element3.id = "idespeciearbol" + num;
	cell3.appendChild(element3);
	aux.value = num;
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

<form action="especiescenso.php" method="post" enctype="multipart/form-data" name="formulario" onSubmit="return valida(this);">


<table width="90%" border="0" class='taulaA' align="center" cellspacing="0">

	<tr >
			<td height="14" colspan="4" id='blau'><span class="taulaH">Buscar Árboles Existentes</span></td>
	</tr>

	<tr>
			<td id='blau'>

				<table width="100%" align="center" border="0" cellspacing="0" cellpadding="0" class="taulaA">
							 <tr>
									<td id="blau" align="right">Especie a Buscar: </td>
									<td><input type="text" class="boxBusqueda3m" name="buscar"></td>
									<td align="left"><input type="submit" name="submit" class="cabecera2" value="Buscar"></td>

									<td style="display:none"><input  name="c" id="c" type="text" class="boxBusqueda2" value="<?php echo $campo?>"   ></td >

							</tr>

							 <tr class="cabecera2">
								<td align="center" height="20">Nombre Comun</td>
								<td align="center" colspan="2">Nombre Cientifico</td>
							</tr>

							<?php while ($res=sql_fetch($rs)) {?>
							<tr>
								<td ><a href="javascript:cargarespecie('<?php echo trim($res["nombrecomun"])."','". trim($res["idespeciecomun"])?>')">  <?php echo $res["nombrecomun"];?>  </a></td>
								<td colspan="2" ><a href="javascript:cargarespecie('<?php echo trim($res["nombrecomun"])."','". trim($res["idespeciecomun"])?>')"> <?php echo $res["nombrecientifico"];?>  </a></td>

							</tr>
							<?php }?>
				</table>


			</td>
	 </tr>

	 <tr><td colspan="4"><hr></td></tr>

	 <tr>
			 <td height="14" colspan="4" id='blau'><span class="taulaH">Lista de Árboles Existentes</span></td>
	 </tr>



	 <tr>

			 <td height="14" colspan="4" id='blau' >

					 <table width="100%"  border="0">
					 <tr>
								 <td height="14" colspan="2">


									 <table width="100%" border="0">

													 <tr>
																	 <td align="middle" class="taulaA" id='blau2'>
																			 <input name="submit2" type="submit" class="cabecera2"  value="Guardar" >
																			 <input name="submit3" type="button" class='cabecera2' value="Eliminar Especie" onClick="deleteRow1('arboles')">
																	 </td>
													 </tr>



													 	<tr>
													 			<td>

																	<table id="arboles" border="1" class="taulaA">

																				<tr class="cabecera2" align="center">
																						<td width="2%"></td>
																						<td width="70%">NOMBRE COMUN </td>
																						<td width="28%">CANTIDAD </td>
																				</tr>



																				<?php
																				if(isset($_SESSION['arboles_existentes']['conteo']))
																				{
																					$num=$_SESSION['arboles_existentes']['conteo'];
																				}
																				else
																				{
																					$num=$total_row_detalle_censo;
																				}


																				for ($i = 1; $i <=$num ; $i++) {

																						//if(isset($_SESSION['datos_nota_ext']['idsolicitud'.$i]) || isset($row_detallenotaext['idnotaext'])){
																						?>
																						<tr>
																												<td height="2"><input type="checkbox" name="chk"/></td>
																												<td width="70%"><input name="<?php echo 'nombreespecie'.$i; ?>" type="text" class="boxBusqueda" readonly value="<?php echo isset($_SESSION['arboles_existentes']['nombreespecie'.$i]) ? htmlspecialchars($_SESSION['arboles_existentes']['nombreespecie'.$i]) : trim($row_detallencenso['nombrecomun']) ;?>"></td>
																												<td width="28%"><input name="<?php echo 'cantidadespecie'.$i; ?>" type="text" class="boxBusqueda4" value="<?php echo isset($_SESSION['arboles_existentes']['cantidadespecie'.$i]) ? htmlspecialchars($_SESSION['arboles_existentes']['cantidadespecie'.$i]) : trim($row_detallencenso['cantidad']) ;?>"></td>
																												<td style="display:none"><input  name="<?php echo 'idespeciearbol'.$i; ?>" id="<?php echo 'idespeciearbol'.$i; ?>" type="text" class="boxBusqueda2" readonly value="<?php echo isset($_SESSION['arboles_existentes']['idespeciearbol'.$i]) ? htmlspecialchars($_SESSION['arboles_existentes']['idespeciearbol'.$i]) : trim($row_detallencenso['idespeciecomun']) ?>"   ></td >
																						</tr>

																						<?php
																								if(!isset($_SESSION['arboles_existentes']['conteo']) && isset($row_detallencenso))
																								{
																									$row_detallencenso = pg_fetch_assoc($detallecenso);
																								}
																						//}
																			 } // end for

																					 ?>

																	</table>

																	<input type="hidden" name="conteo" id="conteo" value="<?php echo isset($_SESSION['arboles_existentes']['conteo']) ? htmlspecialchars($_SESSION['arboles_existentes']['conteo']) : $total_row_detalle_censo ?>">



 																</td>
  													 </tr>




										 </table>

								 </td>
					 </tr>
					 </table>
			 </td>
	</tr>









</table>



</form>




</BODY>
</HTML>
