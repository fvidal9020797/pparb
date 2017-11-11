<?php 
session_start();set_time_limit(5000);

?>
<HTML>
<HEAD><TITLE>Elegir Persona</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK href="../css/mdryt.css" type=text/css rel=stylesheet>
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
	element3.setAttribute('class','estilotextarea');
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
<table width="95%" align="center" border="1" cellpadding="1" cellspacing="0" class="taulaA">
  <?php
if (isset($_POST["buscar"]))
	{$look=strtoupper(trim($_POST["buscar"]));
	 $look1=$_POST['idestado'];

	 $rs=sql_ejecutar($cn,"SELECT parcelas.idparcela, 
							 	  parcelas.nombre, 
							  	  registro.idregistro, 
							  	  codificadores.nombrecodificador
							FROM 
								  public.parcelas, 
								  public.registro, 
								  public.codificadores
							WHERE 
							       parcelas.idparcela = registro.idparcela and registro.estado = codificadores.idcodificadores and (registro.idparcela like '%$look%' OR codificadores.idcodificadores=$look1) Order by idparcela ASC LIMIT 23 ");
	}
else
	{$rs=sql_ejecutar($cn,"SELECT parcelas.idparcela, 
							 	  parcelas.nombre, 
							  	  registro.idregistro, 
							  	  codificadores.nombrecodificador
							FROM 
								  public.parcelas, 
								  public.registro, 
								  public.codificadores
							WHERE 
								  parcelas.idparcela = registro.idparcela AND
								  registro.estado = codificadores.idcodificadores Order by idparcela ASC LIMIT 23 ");}
								
?>
  <tr class="cabecera2">
    <td  height="20" align="center">Código Parcela</td>
    <td align="center"  >Nombre predio</td>
    <td align="center"  >Estado</td>
  </tr>
  <form action="N_Carpeta.php" method="post" enctype="multipart/form-data" name="formulario">
  <tr class="cabecera2">
    <td width="19%"  height="20" align="center"><input type="text" class="boxBusqueda3" name="buscar"></td>
    <td width="48%" align="center"  ><input type="text" class="boxBusqueda3m" name="buscar2"></td>
    <td width="33%" align="center"  ><select name="idestado" class="combos" id="idestado">
      <option value=0>ELEGIR ...</option>
      <?php 
					$sql_clasificador ="Select * From codificadores Where idclasificador=2 and idcodificadores>230 Order by nombrecodificador";
					$clasificador = pg_query($cn,$sql_clasificador) ;
					$row_clasificador = pg_fetch_array ($clasificador);
					
					do {   ?>
      <option value="<?php echo $row_clasificador['idcodificadores']?>"
                <?php  if(isset($_POST['idestado']) and $_POST['idestado']==$row_clasificador['idcodificadores']){
											echo " selected";
					    }?>
                 > <?php echo $row_clasificador['nombrecodificador']?></option>
      <?php } while ($row_clasificador = pg_fetch_assoc($clasificador));	?>
    </select>
    <input type="submit" name="submit" class="cabecera2" value="Buscar"></td>
  </tr>
  </form>
  <?php while ($res=sql_fetch($rs)) {?>  
  <tr>
    <td height="20"><a href="javascript:actualizaPadre('<?php echo trim($res["idparcela"])."','".trim($res["nombre"])."','". trim($res["idregistro"])."','". trim($res["nombrecodificador"])?>')">  <?php echo $res["idparcela"];?>  </a></td>
    <td ><a href="javascript:actualizaPadre('<?php echo trim($res["idparcela"])."','".trim($res["nombre"])."','". trim($res["idregistro"])."','". trim($res["nombrecodificador"])?>')"> <?php echo $res["nombre"];?>  </a></td>
    <td ><a href="javascript:actualizaPadre('<?php echo trim($res["idparcela"])."','".trim($res["nombre"])."','". trim($res["idregistro"])."','". trim($res["nombrecodificador"])?>')"> <?php echo $res["nombrecodificador"];?>  </a></td>
  </tr>
  <?php }?>
</table>
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