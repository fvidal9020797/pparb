<?php
session_start();set_time_limit(5000);
if (isset($_GET["c"]))
	{$campo=$_GET["c"]; }
elseif(isset($_POST["c"]))
	{$campo=$_POST["c"];}
?>
<HTML>
<HEAD><TITLE>Elegir Persona</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK href="../css/mdryt.css" type=text/css rel=stylesheet>
<script language="javascript"   type="text/javascript">
function addRow(tableID,dato1,dato2,dato3) {   //nombrecomun,nombrecientifico,id

	var aux = window.opener.document.getElementById("conteoEspecie");
	var num = parseInt(aux.value);
	var table = window.opener.document.getElementById(tableID);
	var rowCount = num;
	var lastRow = table.rows.length;
	num = num+1;//alert(num);
	var row = table.insertRow(lastRow);

	var cell = row.insertCell(0);   //celda 4
	var element = window.opener.document.createElement("input");
	element.type = "checkbox";
	cell.appendChild(element);

	var cell0=row.insertCell(1);
	var element0 = window.opener.document.createElement("input");
	element0.type = "image";
	element0.setAttribute('src',"../images/copiara.gif");
	element0.setAttribute('alt','Especies');
	element0.setAttribute('title','copiar fila');
	element0.setAttribute('border','1');
	element0.setAttribute('onClick','CopyRow('+num+');return false');
	cell0.appendChild(element0);


	var cell1 = row.insertCell(2);   //celda 1
	var element1 = document.createElement("select");
	element1.name = "anorestituir" + num;
	element1.id = "anorestituir" + num;
	element1.options[0]=new Option("Elegir..","0");
	element1.options[1]=new Option("2014","1");
	element1.options[2]=new Option("2015","2");
	element1.options[3]=new Option("2016","3");
	element1.options[4]=new Option("2017","4");
	element1.options[5]=new Option("2018","5");
	element1.setAttribute('class','combos');
	cell1.appendChild(element1);


	var cell2 = row.insertCell(3);   //celda 2
	var element2 = window.opener.document.createElement("input");
	element2.type = "text";
	element2.name = "mesini" + num;
	element2.id = "mesini" + num;
	element2.setAttribute('class','boxBusqueda5');
	element2.setAttribute('onkeypress','blockNonNumbers(this, event, true, false)');
	element2.setAttribute('onkeyup','extractNumber(this,0,false)');
	cell2.appendChild(element2);

	var cell3 = row.insertCell(4);   //celda 3
	var element3 = window.opener.document.createElement("input");
	element3.type = "text";
	element3.name = "mesfin" + num;
	element3.ids = "mesfin" + num;
	element3.setAttribute('class','boxBusqueda5');
	element3.setAttribute('onkeypress','blockNonNumbers(this, event, true, false)');
	element3.setAttribute('onkeyup','extractNumber(this,0,false)');
	cell3.appendChild(element3);

	var cell4 = row.insertCell(5);   //celda 4
	var element4 = window.opener.document.createElement("input");
	element4.type = "text";
	element4.name = "nombrecientifico" + num;
	element4.id = "nombrecientifico" + num;
	element4.value = dato1;
	element4.setAttribute('class','boxBusqueda');
	element4.setAttribute('readonly','true');
	cell4.appendChild(element4);

	var cell5 = row.insertCell(6);   //celda 5
	var element5 = window.opener.document.createElement("input");
	element5.type = "text";
	element5.name = "nombrecomun" + num;
	element5.id = "nombrecomun" + num;
	element5.value = dato2;
	element5.setAttribute('class','boxBusqueda2');
	element5.setAttribute('onkeyup','extractNumber(this,4,false)');
	element5.setAttribute('readonly','true');
	cell5.appendChild(element5);



	var cell6 = row.insertCell(7);   //celda 6
	var element6 = window.opener.document.createElement("input");
	element6.type = "text";
	element6.name = "suprestituir" + num;
	element6.id = "suprestituir" + num;
	element6.setAttribute('class','boxBusqueda1');
	element6.setAttribute('onkeypress','blockNonNumbers(this, event, true, false)');
	element6.setAttribute('onkeyup','extractNumber(this,4,false)');
	element6.setAttribute('onChange','CantPlantin(idtipoesparcimiento'+num+','+num+')');
	cell6.appendChild(element6);

	var cell7 = row.insertCell(8);   //celda2 CI
	var element7 = document.createElement("select");
	element7.name ="idtipoesparcimiento"+String(num);
	element7.id="idtipoesparcimiento"+String(num);
	for(i=0;i<document.getElementById('espaciamiento').length ;i++)
	{ element7.options[i]=new Option(document.getElementById('espaciamiento').options[i].text, document.getElementById('espaciamiento').options[i].value);
	}
	element7.setAttribute('class','combos');
	element7.setAttribute('onChange','CantPlantin(this,'+num+')');
	cell7.appendChild(element7);


	var cell8 = row.insertCell(9);   //celda 6
	var element8 = window.opener.document.createElement("input");
	element8.type = "text";
	element8.name = "cantplantin" + num;
	element8.id = "cantplantin" + num;
	element8.setAttribute('class','boxBusqueda1');
	element8.setAttribute('onkeypress','blockNonNumbers(this, event, true, false)');
	element8.setAttribute('onkeyup','extractNumber(this,2,false)');
	element8.setAttribute('onChange','CantPlantin(idtipoesparcimiento'+num+','+num+')');
	cell8.appendChild(element8);

	var cell9 = row.insertCell(10);   //celda 6
	var element9 = window.opener.document.createElement("input");
	element9.type = "text";
	element9.name = "precioplantin" + num;
	element9.id = "precioplantin" + num;
	element9.setAttribute('class','boxBusqueda1');
	element9.setAttribute('onkeypress','blockNonNumbers(this, event, true, false)');
	element9.setAttribute('onkeyup','extractNumber(this,2,false)');
	element9.setAttribute('onChange','PrecioPlantin('+num+')');
	cell9.appendChild(element9);

	var cell10 = row.insertCell(11);   //celda 6
	var element10 = window.opener.document.createElement("input");
	element10.type = "text";
	element10.name = "pretotalplantines" + num;
	element10.id = "pretotalplantines" + num;
	element10.setAttribute('class','boxBusqueda1');
	element10.setAttribute('onkeypress','blockNonNumbers(this, event, true, false)');
	element10.setAttribute('onkeyup','extractNumber(this,2,false)');
	cell10.appendChild(element10);

	var cell11 = row.insertCell(12);   //celda 6
	var element11 = window.opener.document.createElement("input");
	element11.type = "text";
	element11.name = "preciomo" + num;
	element11.id = "preciomo" + num;
	element11.setAttribute('class','boxBusqueda1');
	element11.setAttribute('onkeypress','blockNonNumbers(this, event, true, false)');
	element11.setAttribute('onkeyup','extractNumber(this,2,false)');
	element11.setAttribute('onchange','Subtotalplantin('+num+')');
	cell11.appendChild(element11);

	var cell12 = row.insertCell(13);   //celda 6
	var element12 = window.opener.document.createElement("input");
	element12.type = "text";
	element12.name = "preciomantenimiento" + num;
	element12.id = "preciomantenimiento" + num;
	element12.setAttribute('class','boxBusqueda1');
	element12.setAttribute('onkeypress','blockNonNumbers(this, event, true, false)');
	element12.setAttribute('onkeyup','extractNumber(this,2,false)');
	element12.setAttribute('onchange','Subtotalplantin('+num+')');
	cell12.appendChild(element12);

	var cell13 = row.insertCell(14);   //celda 6
	var element13= window.opener.document.createElement("input");
	element13.type = "text";
	element13.name = "precioseguimiento" + num;
	element13.id = "precioseguimiento" + num;
	element13.setAttribute('class','boxBusqueda1');
	element13.setAttribute('onkeypress','blockNonNumbers(this, event, true, false)');
	element13.setAttribute('onkeyup','extractNumber(this,2,false)');
	element13.setAttribute('onchange','Subtotalplantin('+num+')');
	cell13.appendChild(element13);

	var cell14 = row.insertCell(15);   //celda 6
	var element14= window.opener.document.createElement("input");
	element14.type = "text";
	element14.name = "preciootrogastos" + num;
	element14.id = "preciootrogastos" + num;
	element14.setAttribute('class','boxBusqueda1');
	element14.setAttribute('onkeypress','blockNonNumbers(this, event, true, false)');
	element14.setAttribute('onkeyup','extractNumber(this,2,false)');
	element14.setAttribute('onchange','Subtotalplantin('+num+')');
	cell14.appendChild(element14);


	var cell15 = row.insertCell(16);   //celda0
	var element15 = window.opener.document.createElement("select");
	element15.name ="idtiporestitucion"+String(num);
	element15.id="idtiporestitucion"+String(num);
	for(i=0;i<document.getElementById('tiporestitucion').length ;i++)
	{ element15.options[i]=new Option(document.getElementById('tiporestitucion').options[i].text, document.getElementById('tiporestitucion').options[i].value);
	}
	element15.setAttribute('class','combos');
	element15.setAttribute('onChange','SubtotalSupReforestar()');
	cell15.appendChild(element15);



	var cell16 = row.insertCell(17);   //celda 6
	var element16 = window.opener.document.createElement("input");
	element16.type = "text";
	element16.name = "presubtotal" + num;
	element16.id = "presubtotal" + num;
	element16.setAttribute('class','boxBusqueda1');
	element16.setAttribute('onkeypress','blockNonNumbers(this, event, true, false)');
	element16.setAttribute('onkeyup','extractNumber(this,2,false)');
	cell16.appendChild(element16);

	var cell17 = row.insertCell(18);
	var element17 = window.opener.document.createElement("input");
	element17.type = "hidden";
	element17.value = dato3;
	element17.name = "idespeciecomun" + num;
	element17.id = "idespeciecomun" + num;
	cell17.appendChild(element17);
	aux.value = num;
}
</script>
<script language="JavaScript">
function actualizaPadre(cientifico,comun,id){
	addRow("especies",cientifico,comun,id)
	window.close()
	//alert (cientifico);
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
//$cn=Conexion();
?>
<form action="especies.php" method="post" enctype="multipart/form-data" name="formulario">
<table width="80%" align="center" border="0" cellspacing="0" cellpadding="0" class="taulaA">
<tr>
<td id="blau" align="right">Especie  buscar: </td>
<td><input type="text" class="boxBusqueda3m" name="buscar"></td>
<td align="left"><input type="submit" name="submit" class="cabecera2" value="Buscar"></td>
</tr>
</table>
</form>

<table width="80%" align="center" cellpadding="1" cellspacing="0" class="taulaA">
  <?php

	//especie.idespecie = especienombrecomun.idespecie and especienombrecomun.idespeciecomun<>2073 and (nombrecomun like '%$look%' OR nombrecientifico like '%$look%') Order by nombrecomun ASC LIMIT 23 ");

if (isset($_POST["buscar"]))
	{$look=strtoupper(trim($_POST["buscar"]));
	 $rs=sql_ejecutar($cn,"SELECT   especienombrecomun.idespecie, especie.nombrecientifico,
							  especienombrecomun.nombrecomun, especienombrecomun.idespeciecomun
							FROM
							  public.especie, public.especienombrecomun
							WHERE
							  especie.idespecie = especienombrecomun.idespecie  and (nombrecomun like '%$look%' OR nombrecientifico like '%$look%') Order by nombrecomun ASC LIMIT 23 ");
	}
else
	{$rs=sql_ejecutar($cn,"SELECT   especienombrecomun.idespecie, especie.nombrecientifico,
							  especienombrecomun.nombrecomun, especienombrecomun.idespeciecomun
							FROM
							  public.especie, public.especienombrecomun
							WHERE
							  especie.idespecie = especienombrecomun.idespecie  Order by nombrecomun ASC LIMIT 23");}
?>
  <tr class="cabecera2">
    <td align="center"  height="20">Nombre Comun</td>
    <td align="center"  >Nombre Cientifico</td>
  </tr>
  <?php while ($res=sql_fetch($rs)) {?>
  <tr>
    <td height="20"><a href="javascript:actualizaPadre('<?php echo trim($res["nombrecientifico"])."','".trim($res["nombrecomun"])."','". trim($res["idespeciecomun"])?>')">  <?php echo $res["nombrecomun"];?>  </a></td>
    <td ><a href="javascript:actualizaPadre('<?php echo trim($res["nombrecientifico"])."','".trim($res["nombrecomun"])."','".trim($res["idespeciecomun"])?>')"> <?php echo $res["nombrecientifico"];?>  </a></td>
  </tr>
  <?php }?>
</table>

<p><div style="display:none"  >
       <select  name="espaciamiento" class="combos" id="espaciamiento">
         <?php
		  ///cambiar este codigo
		   $sql_clasificador ="Select * From codificadores Where idclasificador=9 and orden = 1 Order by nombrecodificador";
			$clasificador = pg_query($cn,$sql_clasificador) ;
			$row_clasificador = pg_fetch_array ($clasificador);

		  do {   ?>
         <option value="<?php echo $row_clasificador['idcodificadores']?>"

                 > <?php echo $row_clasificador['nombrecodificador']?></option>
         <?php } while ($row_clasificador = pg_fetch_assoc($clasificador));?>
       </select>
     </div> </p>



		 <p><div style="display:none"  >
		        <select  name="tiporestitucion" class="combos" id="tiporestitucion">
		          <?php
		 		  ///cambiar este codigo
					$sql_clasificador ="Select * From codificadores Where idclasificador=17 and orden = 1 Order by nombrecodificador ";
				$clasificador = pg_query($cn,$sql_clasificador) ;
				$row_clasificador = pg_fetch_array ($clasificador);
				?>
				<option value="0">Elegir...</option>
				<?php
		 		  do {   ?>
		          <option value="<?php echo $row_clasificador['idcodificadores']?>"
		                  > <?php echo $row_clasificador['nombrecodificador']?></option>
		          <?php } while ($row_clasificador = pg_fetch_assoc($clasificador));?>
		        </select>
		      </div> </p>



</BODY>
</HTML>
