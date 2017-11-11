<?php 
session_start();
include "../cabecera.php";
/*$campo="";
if (isset($_GET["c"]))
	{$campo=$_GET["c"]; }
elseif(isset($_POST["c"]))
	{$campo=$_POST["c"]; } */
//variables a destruir
if(isset($_SESSION['id_persona'])){
$buscar=$_SESSION['id_persona'];
unset($_SESSION['id_persona']);
}
if(isset($_SESSION['pag_anterior'])){unset($_SERVER['pag_anterior']);}  
if(isset($_SESSION['datos_persona'])){unset($_SESSION['datos_persona']);} 
//print_r($_SESSION);
?>
<HTML>
<HEAD><TITLE>Elegir Persona</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK href="../css/mdryt.css" type=text/css rel=stylesheet>
<script language="javascript"   type="text/javascript">
function addRow(tableID,dato1,dato2,dato3,idp) {   //nombre,idpersona,tipopersona,idtipopersona
	
	var aux = window.opener.document.getElementById("conteo"); 
	var num = parseInt(aux.value); 
	var table = window.opener.document.getElementById(tableID);   
	var rowCount = num;
	var lastRow = table.rows.length;
	num = num+1;
	var row = table.insertRow(lastRow); 
	  
	var cell1 = row.insertCell(0);   //celda 1
	var element1 = window.opener.document.createElement("input");
	element1.type = "text"; 
	element1.value =  dato3;
	element1.name = "nombrecodificador" + num;
	element1.setAttribute('class','boxBusqueda2');
	cell1.appendChild(element1);
	
	var cell2 = row.insertCell(0);   //celda 2
	var element2 = window.opener.document.createElement("input");
	element2.type = "text";
	element2.value = dato2;
	element2.name = "noidentidad" + num;
	element2.setAttribute('class','boxBusqueda2');
	cell2.appendChild(element2);
	
	var cell3 = row.insertCell(0);   //celda 3
	var element3 = window.opener.document.createElement("input");
	element3.type = "text";   
	element3.value = dato1;
	element3.name = "nombreben" + num;
	element3.setAttribute('class','boxBusqueda');
	cell3.appendChild(element3);
	
	var element4 = window.opener.document.createElement("input");
	element4.type = "hidden";   
	element4.value = idp;
	element4.name = "idp" + num;
	cell3.appendChild(element4);  
    
	var cell4 = row.insertCell(0);   //celda 4
	var element4 = window.opener.document.createElement("input");
	element4.type = "checkbox";   
	cell4.appendChild(element4); 
	
	aux.value = num;
       }
		
</script>
<script language="JavaScript"> 
function actualizaPadre(nombre,ci,id,tipojur,id2){ 
	addRow("benef",nombre,ci,tipojur,id)
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

<div align="center" >
  <table width="95%" border="0">
 
  <tr>
    <td width="33%" height="20"><form action="N_Persona.php?id_persona=-1&ir=personas1.php" method="post" name="form2">
      <span class="borderLBRgris">
        <input type='image' src='../images/reg_adm.gif' onClick="this.form2.submit()">
        Nueva Persona</span>
    </form></td>
    
    <td width="67%" class="texto">   
      <strong>Seleccionar Persona</strong></td>
  </tr>
   
</table>

<table width="95%" align="center" cellpadding="1" cellspacing="0" class="taulaA"> 
<?php
if (isset($_POST["buscar1"]))
	{$look1=strtoupper($_POST["buscar1"]); $look2=strtoupper($_POST["buscar2"]);$look3=strtoupper($_POST["buscar3"]);$look4=strtoupper($_POST["buscar4"]);$look5=strtoupper($_POST["buscar5"]);
	
	$sql="Select * FROM persona LEFT JOIN codificadores ON codificadores.idcodificadores=persona.idtipopersona WHERE idpersona NOT IN (Select idpersona FROM funcionario) ";
	if($_POST["buscar1"]){ $sql=$sql." and noidentidad like '%$look1%'";}
	if($_POST["buscar2"]){ $sql=$sql." and nombre1 like '%$look2%'";}
	if($_POST["buscar3"]){ $sql=$sql." and nombre2 like '%$look3%'";}
	if($_POST["buscar4"]){ $sql=$sql." and apellidopat like '%$look4%'";}
	if($_POST["buscar5"]){ $sql=$sql." and apellidomat like '%$look5%'";}
	 $sql=$sql." Order by nombre1,apellidopat limit 20";
 }
elseif(isset($buscar) && $buscar>0){
 $sql="Select * FROM persona LEFT JOIN codificadores ON codificadores.idcodificadores=persona.idtipopersona  WHERE idpersona NOT IN (Select idpersona FROM funcionario) AND idpersona=".$buscar;
	
}else
	{$sql="Select * FROM persona LEFT JOIN codificadores ON codificadores.idcodificadores=persona.idtipopersona  WHERE idpersona NOT IN (Select idpersona FROM funcionario) Order by nombre1,apellidopat limit 20";}
	
	$rs=sql_ejecutar($cn,$sql);
	//echo $sql;
?>
  <tr class="cabecera2">
     <form action="personas1.php" method="post" enctype="multipart/form-data" autocomplete="off"  name="formulario">
      <td width="295" height="20" align="center"><p>Doc. de Identidad
          <input type="text" class="boxBusqueda4" name="buscar1">
        </p>
        </td>
      <td width="473" align="center"  ><p>Primer Nombre
       
          <input type="text" class="boxBusqueda4" name="buscar2">
        </p></td>
      <td width="474" align="center"  ><p>Segundo Nombre2
       
          <input type="text" class="boxBusqueda4" name="buscar3">
        </p></td>
      <td width="947" align="center"  ><p>Apellido Paterno
          <input type="text" class="boxBusqueda4" name="buscar4">
        </p></td>
      <td width="947" align="center"  ><p>Apellido Materno
        
          <input type="text" class="boxBusqueda4" name="buscar5"></p>
        </td>
      <td align="center" width="20"  ><input type="submit" name="submit" class="cabecera2" value="Buscar"></td>
      </form>
    </tr>
    <tr>
    <td height="4" colspan="6"><hr></td>
  </tr>
    <?php while ($res=sql_fetch($rs)){ ?>
<tr> 
      <td height="20"><a href="javascript:actualizaPadre('<?php echo trim($res["nombre1"])." ".trim($res["nombre2"])." ".trim($res["apellidopat"])." ".trim($res["apellidomat"])."','".$res["noidentidad"]."','".$res["idpersona"]."','".$res["nombrecodificador"]."','".$res["idcodificadores"]; ?>')"><?php echo $res["noidentidad"];?></a></td>

      <td ><a href="javascript:actualizaPadre('<?php echo trim($res["nombre1"])." ".trim($res["nombre2"])." ".trim($res["apellidopat"])." ".trim($res["apellidomat"])."','".$res["noidentidad"]."','".$res["idpersona"]."','".$res["nombrecodificador"]."','".$res["idcodificadores"]; ?>')"><?php echo $res["nombre1"];?></a></td>
      <td ><a href="javascript:actualizaPadre('<?php echo trim($res["nombre1"])." ".trim($res["nombre2"])." ".trim($res["apellidopat"])." ".trim($res["apellidomat"])."','".$res["noidentidad"]."','".$res["idpersona"]."','".$res["nombrecodificador"]."','".$res["idcodificadores"]; ?>')"><?php echo $res["nombre2"];?></a></td>
      <td ><a href="javascript:actualizaPadre('<?php echo trim($res["nombre1"])." ".trim($res["nombre2"])." ".trim($res["apellidopat"])." ".trim($res["apellidomat"])."','".$res["noidentidad"]."','".$res["idpersona"]."','".$res["nombrecodificador"]."','".$res["idcodificadores"]; ?>')"><?php echo $res["apellidopat"];?></a></td>
      <td ><a href="javascript:actualizaPadre('<?php echo trim($res["nombre1"])." ".trim($res["nombre2"])." ".trim($res["apellidopat"])." ".trim($res["apellidomat"])."','".$res["noidentidad"]."','".$res["idpersona"]."','".$res["nombrecodificador"]."','".$res["idcodificadores"]; ?>')"><?php echo $res["apellidomat"];?></a></td>
      <td ><form action="<?php echo "N_Persona.php?ir=personas1.php&id_persona=".$res["idpersona"];?> " method="post" name="form2">
         <input type='image' src='../images/reg_adm.gif' onClick="this.form2.submit()">
       </form></td>
  </tr>
   <?php }?>
</table>
</div>
<?php include "../foot.php";?>
</BODY>
</HTML>