<?php
session_start();set_time_limit(5000);
?>
<HTML>
<HEAD><TITLE>Elegir Persona</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK href="../css/mdryt.css" type=text/css rel=stylesheet>
<link rel="stylesheet" type="text/css" href="../css/button.css"/>
<script language="javascript"   type="text/javascript">
function addRow(tableID,dato1,dato2,dato3,dato4) {   //nombrecomun,nombrecientifico,id

	var aux = window.opener.document.getElementById("conteo");
	var num = parseInt(aux.value);
	var table = window.opener.document.getElementById(tableID);
	var rowCount = num;
	var lastRow = table.rows.length;
	num = num+1;
	var row = table.insertRow(lastRow);

	var cell = row.insertCell(0);   //celda 4
	var element = window.opener.document.createElement("input");
	element.type = "checkbox";
	cell.appendChild(element);

	var cell0=row.insertCell(1);
	var element0 = window.opener.document.createElement("input");
	element0.type = "text";
	element0.name = "nombre" + num;
	element0.id = "nombre" + num;
	element0.setAttribute('class','boxBusqueda');
	element0.setAttribute('readonly','true');
	element0.value=dato2;
	cell0.appendChild(element0);

	var cell1 = row.insertCell(2);   //celda 1
	var element1 = window.opener.document.createElement("input");
	element1.type = "text";
	element1.name = "idparcela" + num;
	element1.id = "idparcela" + num;
	element1.setAttribute('class','boxBusqueda2');
	element1.setAttribute('readonly','true');
	element1.value=dato1;
	cell1.appendChild(element1);

	var cell2 = row.insertCell(3);   //celda 2
	var element2 = window.opener.document.createElement("input");
	element2.type = "textarea";
	element2.name = "estado" + num;
	element2.id = "estado" + num;
	element2.setAttribute('class','boxBusqueda2');
	element2.setAttribute('readonly','true');
	element2.value=dato4;
	cell2.appendChild(element2);

	var cell3 = row.insertCell(4);   //celda 3
	var element3 = window.opener.document.createElement("input");
	element3.type = "textarea";
	element3.name = "observacionesr" + num;
	element3.id = "observacionesr" + num;
	//element3.setAttribute.('rows',55);
	//element3.setAttribute.('cols',15);
	//element3.cols=55;
	element3.setAttribute('class','CSSTextArea');
	cell3.appendChild(element3);

	var element4 = window.opener.document.createElement("input");
	element4.type = "hidden";
	element4.value = dato3;
	element4.name = "idreg" + num;
	element4.id = "idreg" + num;
	cell3.appendChild(element4);

	aux.value = num;


}
</script>
<script language="JavaScript">
function actualizaPadre(idp,nombrepar,id,codif){
	addRow("segui",idp,nombrepar,id,codif)
	window.close()
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
<?php
include "../Valid.php";


if (isset($_POST["buscar1"]))
	{
	$sql_listado="SELECT parcelas.idparcela,
	  parcelas.nombre,
	  parcelas.superficie,
	  registro.fecharegistro,
	  registro.idregistro,
	  codificadores.nombrecodificador,
	  b.*
FROM
	  public.parcelas,
	  public.registro left join ( SELECT
			  codificadores.nombrecodificador AS unidad,
			  f1.nomcompleto AS remitente,
			  f2.nomcompleto AS destinatario,
			  nota.nnota,
			  nota.fechanota,
			  nota.fecharecepcionado,
			  detallenota.idregistro as idregnota,
				detallenota.estado as estado
			FROM
			  public.detallenota,
			  public.nota,
			  public.v_funcionario_general f1,
			  public.codificadores,
			  public.v_funcionario_general f2
			WHERE
			  nota.idnota = detallenota.idnota AND
			  f1.idfuncionario = nota.idremitente AND
			  codificadores.idcodificadores = nota.idunidad AND
			  f2.idfuncionario = nota.iddestinatario AND detallenota.estado ='U' ) b ON registro.idregistro = b.idregnota,
	  public.codificadores
WHERE
							       parcelas.idparcela = registro.idparcela and registro.estado = codificadores.idcodificadores ";
		if(trim($_POST["buscar1"])!=""){  $sql_listado=$sql_listado." and registro.idparcela like '%".strtoupper(trim($_POST['buscar1']))."%'";}
		if(trim($_POST["buscar2"])!=""){  $sql_listado=$sql_listado." and parcelas.nombre like '%".strtoupper(trim($_POST['buscar2']))."%'";}
		if($_POST["buscar3"]!='0'){  $sql_listado=$sql_listado." and codificadores.idcodificadores =".$_POST['buscar3'];}

    $sql_listado=$sql_listado." Order by idparcela ASC LIMIT 23 ";
								 // echo $sql_listado;
	 $rs=sql_ejecutar($cn,$sql_listado);

	}
else
	{$rs=sql_ejecutar($cn,"SELECT parcelas.idparcela,
	  parcelas.nombre,
	  parcelas.superficie,
	  registro.fecharegistro,
	  registro.idregistro,
	  codificadores.nombrecodificador,
	  b.*
FROM
	  public.parcelas,
	  public.registro left join ( SELECT
			  codificadores.nombrecodificador AS unidad,
			  f1.nomcompleto AS remitente,
			  f2.nomcompleto AS destinatario,
			  nota.nnota,
			  nota.fechanota,
			  nota.fecharecepcionado,
			  detallenota.idregistro as idregnota,
				detallenota.estado as estado
			FROM
			  public.detallenota,
			  public.nota,
			  public.v_funcionario_general f1,
			  public.codificadores,
			  public.v_funcionario_general f2
			WHERE
			  nota.idnota = detallenota.idnota AND
			  f1.idfuncionario = nota.idremitente AND
			  codificadores.idcodificadores = nota.idunidad AND
			  f2.idfuncionario = nota.iddestinatario AND detallenota.estado ='U' ) b ON registro.idregistro = b.idregnota,
	  public.codificadores
WHERE  								  parcelas.idparcela = registro.idparcela AND
								  registro.estado = codificadores.idcodificadores
								  Order by idregistro ASC LIMIT 23");}

?>




<div class="CSSTable" >

<form action="N_Carpeta.php" method="post" enctype="multipart/form-data" name="formulario">

		   <table>
	 			<td rowspan = "2">
				      <input type="submit" name="submit" class="boton verde formaBoton" value="Buscar"></td>
				</td>
			</table >

			<table >


					  <td align="center">
							<strong>Codigo Parcela</strong>
							<strong><input type="text" class="boxBusqueda2" name="buscar1"> </strong>
					  </td>

					  <td align="center">
					  <strong>Nombre de Predio</strong>
					  <strong>
							 <input type="text" class="boxBusqueda2" name="buscar2">
					  </strong>
					  </td>

					 <td>
					  <strong>Superficie</strong>
					 </td>

					<td>
					<strong>Fecha de Registro: </strong>
				    </td>

					<td><strong>Estado</strong>
						<select name="buscar3" class="combos" id="buscar3">
						  <option value=0>ELEGIR ...</option>
						  <?php
										$sql_clasificador ="Select * From codificadores Where idclasificador=21  Order by nombrecodificador";
										$clasificador = pg_query($cn,$sql_clasificador) ;
										$row_clasificador = pg_fetch_array ($clasificador);

										do {   ?>
						  <option value="<?php echo $row_clasificador['idcodificadores']?>"
									<?php  if(isset($_POST['buscar3']) and $_POST['buscar3']==$row_clasificador['idcodificadores']){
																echo " selected";
											}?>
									 > <?php echo $row_clasificador['nombrecodificador']?></option>
						  <?php } while ($row_clasificador = pg_fetch_assoc($clasificador));	?>
						</select>
					</td>

					<td><strong>Ubicacion Actual</strong>
					<select name="buscar4" class="combos" id="buscar4">
					  <option value=0>ELEGIR ...</option>
					  <?php
									$sql_clasificador ="Select * From codificadores Where idclasificador=32  Order by nombrecodificador";
									$clasificador = pg_query($cn,$sql_clasificador) ;
									$row_clasificador = pg_fetch_array ($clasificador);

									do {   ?>
					  <option value="<?php echo $row_clasificador['idcodificadores']?>"
								<?php  if(isset($_POST['buscar4']) and $_POST['buscar4']==$row_clasificador['idcodificadores']){
															echo " selected";
										}?>
								 > <?php echo $row_clasificador['nombrecodificador']?></option>
					  <?php } while ($row_clasificador = pg_fetch_assoc($clasificador));	?>
					</select>
					</td>

					<td><strong>Nota</strong></td>

</form>

  <?php while ($res=sql_fetch($rs)) {?>
  <tr>
    <td ><a href="javascript:actualizaPadre('<?php echo trim($res["idparcela"])."','".trim($res["nombre"])."','". trim($res["idregistro"])."','". trim($res["nombrecodificador"])?>')">  <?php echo $res["idparcela"];?>  </a></td>
    <td ><a href="javascript:actualizaPadre('<?php echo trim($res["idparcela"])."','".trim($res["nombre"])."','". trim($res["idregistro"])."','". trim($res["nombrecodificador"])?>')"> <?php echo $res["nombre"];?>  </a></td>
	<td ><a href="javascript:actualizaPadre('<?php echo trim($res["idparcela"])."','".trim($res["nombre"])."','". trim($res["idregistro"])."','". trim($res["nombrecodificador"])?>')"> <?php echo $res["superficie"];?>  </a></td>
	<td ><a href="javascript:actualizaPadre('<?php echo trim($res["idparcela"])."','".trim($res["nombre"])."','". trim($res["idregistro"])."','". trim($res["nombrecodificador"])?>')"> <?php echo $res["fecharegistro"];?>  </a></td>
    <td ><a href="javascript:actualizaPadre('<?php echo trim($res["idparcela"])."','".trim($res["nombre"])."','". trim($res["idregistro"])."','". trim($res["nombrecodificador"])?>')"> <?php echo $res["nombrecodificador"];?>  </a></td>
    <td ><a href="javascript:actualizaPadre('<?php echo trim($res["idparcela"])."','".trim($res["nombre"])."','". trim($res["idregistro"])."','". trim($res["nombrecodificador"])?>')"><?php echo $res["unidad"];?></a></td>
    <td ><a href="javascript:actualizaPadre('<?php echo trim($res["idparcela"])."','".trim($res["nombre"])."','". trim($res["idregistro"])."','". trim($res["nombrecodificador"])?>')"><?php echo $res["remitente"]." Fecha Recepcion:".$res["fecharecepcionado"];?></a></td>
  </tr>
  <?php }?>

</table>



</DIV>


<p><div style="display:none"  >
       <select  name="espaciamiento" class="combos" id="espaciamiento">
         <?php
		  ///cambiar este codigo
		   $sql_clasificador ="Select * From codificadores Where idclasificador=9 Order by nombrecodificador";
			$clasificador = pg_query($cn,$sql_clasificador) ;
			$row_clasificador = pg_fetch_array ($clasificador);

		  do {   ?>
         <option value="<?php echo $row_clasificador['idcodificadores']?>"

                 > <?php echo $row_clasificador['nombrecodificador']?></option>
         <?php } while ($row_clasificador = pg_fetch_assoc($clasificador));?>
       </select>
     </div> </p>





</BODY>
</HTML>
