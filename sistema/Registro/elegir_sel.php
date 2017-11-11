<?php session_start();set_time_limit(5000);
if(isset($_GET["c"])){
  $campo=$_GET["c"]; 
}

?>
<HTML>
<HEAD><TITLE>Elegir Tipo SEL</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK href="../css/mdryt.css" type=text/css rel=stylesheet>
<script language="javascript"   type="text/javascript">
   function addRow(tableID,dato1,dato2,pas) {  //id,nombre 
	  	    var aux = window.opener.document.getElementById("conteoSEL"); 
			var num = parseInt(aux.value); 
			var table = window.opener.document.getElementById(tableID);   
 			var rowCount = num;
			var lastRow = table.rows.length;
			num = num+1;//alert(num);
			var row = table.insertRow(lastRow);
				
			var cell1 = row.insertCell(0);   //celda 4
			var element1 = window.opener.document.createElement("input");
			element1.type = "checkbox";   
			cell1.appendChild(element1); 		
				
			var cell2 = row.insertCell(1);   //celda 3
			var element2 = document.createElement("input");   
			element2.type = "text";
			element2.name ="nombsel"+String(num);//3"+String(rowCount + 1);
			element2.id="nombsel"+String(num);//3"+String(rowCount + 1); 
			element2.setAttribute('class','boxBusqueda');
			element2.setAttribute('readonly',true);
			element2.value=dato2;
			cell2.appendChild(element2);
			
			var cell3 = row.insertCell(2);   //celda 3
			var element3 = document.createElement("input");   
			element3.type = "text";
			element3.name ="supseltpfp"+String(num);//3"+String(rowCount + 1);
			element3.id="supseltpfp"+String(num);//3"+String(rowCount + 1); 
			element3.setAttribute('onBlur', 'extractNumber(this,4,false)');
			element3.setAttribute('onkeypress','blockNonNumbers(this, event, true, false)');
			element3.setAttribute('onkeyup','extractNumber(this,4,false)');
			element3.setAttribute('onchange','document.forms[0].submit()');//'cambiosels(this,1,1)');
			element3.setAttribute('class','boxBusqueda4');
			cell3.appendChild(element3); 
			
			var cell4 = row.insertCell(3);   //celda 3
			var element4 = document.createElement("input");   
			element4.type = "text";
			element4.name ="supseltum"+String(num);//3"+String(rowCount + 1);
			element4.id="supseltum"+String(num);//3"+String(rowCount + 1); 
			element4.setAttribute('onBlur', 'extractNumber(this,4,false)');
			element4.setAttribute('onkeypress','blockNonNumbers(this, event, true, false)');
			element4.setAttribute('onkeyup','extractNumber(this,4,false)');
			element4.setAttribute('onchange','document.forms[0].submit()');//'cambiosels(this,1,1)');
			element4.setAttribute('class','boxBusqueda4');
			cell4.appendChild(element4); 
			
			var element7 = window.opener.document.createElement("input");
			element7.type = "hidden";   
			element7.value = dato1;
			element7.name = "idtiposel" + num;
			cell4.appendChild(element7);
			
			if(pas==2){
				var cell5 = row.insertCell(4);   //celda 3
				var element5 = document.createElement("input");   
				element5.type = "text";
				element5.name ="supseltpfppas"+String(num);//3"+String(rowCount + 1);
				element5.id="supseltpfppas"+String(num);//3"+String(rowCount + 1); 
				element5.setAttribute('onBlur', 'extractNumber(this,4,false)');
				element5.setAttribute('onkeypress','blockNonNumbers(this, event, true, false)');
				element5.setAttribute('onkeyup','extractNumber(this,4,false)');
				element5.setAttribute('onchange','document.forms[0].submit()');//element4.setAttribute('onchange',,'submit()');//'cambiosels(this,1,2)');
				element5.setAttribute('class','boxBusqueda4');
				cell5.appendChild(element5); 
				
				var cell6 = row.insertCell(5);   //celda 3
				var element6 = document.createElement("input");   
				element6.type = "text";
				element6.name ="supseltumpas"+String(num);//3"+String(rowCount + 1);
				element6.id="supseltumpas"+String(num);//3"+String(rowCount + 1); 
				element6.setAttribute('onBlur', 'extractNumber(this,4,false)');
				element6.setAttribute('onkeypress','blockNonNumbers(this, event, true, false)');
				element6.setAttribute('onkeyup','extractNumber(this,4,false)');
				element6.setAttribute('onchange','document.forms[0].submit()');//element4.setAttribute('onchange',,'submit()');//'cambiosels(this,1,2)');
				element6.setAttribute('class','boxBusqueda4');
				cell6.appendChild(element6); 
								
				var cell8 = row.insertCell(6);   //celda0 
				var element8 = document.createElement("select");    
				element8.name ="tiposel"+String(num);
				element8.id="tiposel"+String(num);
				element8.options[0]=new Option("Restitucion","105"); element8.options[1]=new Option("Conservacion","106");
				element8.setAttribute('class','combos');
				element8.setAttribute('onchange','document.forms[0].submit()');
				cell8.appendChild(element8); 
			}else{
			  
			  	var cell8 = row.insertCell(4);   //celda0 
				var element8 = document.createElement("select");    
				element8.name ="tiposel"+String(num);
				element8.id="tiposel"+String(num);
				element8.options[0]=new Option("Restitucion","105"); element8.options[1]=new Option("Conservacion","106");
				element8.setAttribute('class','combos');
				element8.setAttribute('onchange','document.forms[0].submit()');
				cell8.appendChild(element8); 
				
			
			}
					
			
			
			aux.value = num;
       }
		
		
</script>
<script language="JavaScript"> 
function actualizaPadre(id,sel,pas){ 
	addRow("sels",id,sel,pas)
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
<table width="100%" border="0">
  <tr>
    <td class="titulo1"><div align="center" class="celdaCelesteOscuro">Elegir Servidumbre Ecológica Legal</div></td>
  </tr>
  <tr>
    <td><?php 
include "../Valid.php";
	$sql_documento = "Select * From parcelas Where (idclasificacion=71 or idclasificacion=101 or idclasificacion=103) and idparcela='".$_SESSION['cod_parcela']."'";
    $documento = pg_query($cn,$sql_documento) ;
	$row_documento = pg_fetch_array ($documento);
	$num=pg_num_rows($documento);
	
	
$rs=sql_ejecutar($cn,"Select * FROM codificadores WHERE idclasificador=18 and idcodificadores<175 Order by idcodificadores");
while ($res=sql_fetch($rs))
	{echo "<tr><td id='blau'><a href=\"javascript:actualizaPadre('".$res["idcodificadores"]."','".trim($res["nombrecodificador"])."','".$_SESSION["Causal"]."')\"><font color='blue'>".$res["nombrecodificador"]."</font></a></td></tr>";}

if($num>0){
echo "<tr><td id='blau'> <div align='center' class='celdaCelesteOscuro'>Servidumbre Ecológica Legal Predios Ganaderos Instructivo ABT-DE-N 006/2013 </div></td></tr>";
    $selg = pg_query($cn,"Select * FROM codificadores WHERE idclasificador=18 and idcodificadores>175 Order by idcodificadores");
	$row_selg = pg_fetch_array ($selg);
    
do {
	echo "<tr><td id='blau'><a href=\"javascript:actualizaPadre('".$row_selg["idcodificadores"]."','".trim($row_selg["nombrecodificador"])."','".$_SESSION["Causal"]."')\"><font color='blue'>".$row_selg["nombrecodificador"]."</font></a></td></tr>";} while ($row_selg = pg_fetch_assoc($selg));
}
?>

</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
<table width="90%" align="center" cellpadding="1" cellspacing="1" class="taulaA"> 


</table>
</BODY>
</HTML>