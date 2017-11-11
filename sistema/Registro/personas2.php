<?php 
session_start();set_time_limit(5000);
if (isset($_GET["c"]))
	{$campo=$_GET["c"]; }
elseif(isset($_POST["c"]))
	{$campo=$_POST["c"]; }
include "../Valid.php";
//variables a destruir
if(isset($_SESSION['id_persona'])){
$buscar=$_SESSION['id_persona'];
unset($_SESSION['id_persona']);
}
if(isset($_SESSION['pag_anterior'])){unset($_SESSION['pag_anterior']);}  
if(isset($_SESSION['datos_persona'])){unset($_SESSION['datos_persona']);} 
//
//print_r($_SESSION);
?>
<HTML>
<HEAD><TITLE>Elegir Persona</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK href="../css/mdryt.css" type=text/css rel=stylesheet>
<script language="JavaScript"> 
//nombre,tel,dir,correo,idpersona,tipo persona,idcodificador
function addRow(tableID,dato1,idp) {   //nombre,idpersona,tipopersona,idtipopersona
	var table = window.opener.document.getElementById(tableID); 
	var lastRow = table.rows.length; 
	var aux = window.opener.document.getElementById("conteoA");  
	var num = parseInt(aux.value); 
	var rowCount = num;
	num = num+1;
	var row = table.insertRow(lastRow); 
	//alert(lastRow);
	var cell3 = row.insertCell(0);   //celda 3
	var element3 = window.opener.document.createElement("input");
	element3.type = "text";   
	element3.value = dato1;
	element3.name = "nombreafiliado" + num;
	element3.setAttribute('class','boxBusqueda');
	cell3.appendChild(element3);
	
	var element4 = window.opener.document.createElement("input");
	element4.type = "hidden";   
	element4.value = idp;
	element4.name = "idpA" + num;
	cell3.appendChild(element4);  
    
	var cell4 = row.insertCell(0);   //celda 4
	var element4 = window.opener.document.createElement("input");
	element4.type = "checkbox";   
	cell4.appendChild(element4); 
	
	aux.value = num;
       }
		
</script>
<script language="JavaScript"> 
function actualizaPadre(nombre,id){
 
	addRow("TComunidad",nombre,id);
	window.close();
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

<div align="center" class="texto">
  <table width="95%" border="0">
    <tr>
      <td width="26%" height="20"><form action="N_Persona.php?id_persona=-1&ir=personas2.php" method="post" name="form2">
        <span class="borderLBRgris">
        <input type='image' src='../images/reg_adm.gif' onClick="this.form2.submit()">
          NuevoRepr.</span>
      </form></td>
      <td width="74%" class="texto"><strong>Seleccionar Beneficiarios de la Comunidad, Agrupación</strong></td>
    </tr>
  </table>

</div>
<table width="95%" align="center" cellpadding="1" cellspacing="0" class="taulaA"> 
<?php
if (isset($_POST["buscar1"]))
{  $look1=strtoupper($_POST["buscar1"]); $look2=strtoupper($_POST["buscar2"]);$look3=strtoupper($_POST["buscar3"]);$look4=strtoupper($_POST["buscar4"]);$look5=strtoupper($_POST["buscar5"]);
	
	$sql="Select * FROM persona LEFT JOIN codificadores ON codificadores.idcodificadores=persona.tipoperjuridica WHERE idpersona NOT IN (Select idpersona FROM funcionario) ";
	if($_POST["buscar1"]){ $sql=$sql." and noidentidad like '%$look1%'";}
	if($_POST["buscar2"]){ $sql=$sql." and nombre1 like '%$look2%'";}
	if($_POST["buscar3"]){ $sql=$sql." and nombre2 like '%$look3%'";}
	if($_POST["buscar4"]){ $sql=$sql." and apellidopat like '%$look4%'";}
	if($_POST["buscar5"]){ $sql=$sql." and apellidomat like '%$look5%'";}
	 $sql=$sql." Order by nombre1,apellidopat limit 20";

 }
elseif(isset($buscar) && $buscar>0){
 $sql="Select * FROM persona LEFT JOIN codificadores ON codificadores.idcodificadores=persona.tipoperjuridica WHERE idpersona NOT IN (Select idpersona FROM funcionario) AND idpersona=".$buscar." LIMIT 20";
	
}
else
	{$sql="Select * FROM persona LEFT JOIN codificadores ON codificadores.idcodificadores=persona.tipoperjuridica WHERE idpersona NOT IN (Select idpersona FROM funcionario) Order by nombre1,apellidopat LIMIT 20";}
	
	$rs=sql_ejecutar($cn,$sql);
?>

    <tr class="cabecera2">
       <form action="personas2.php" method="post" enctype="multipart/form-data" autocomplete="off"  name="formulario">
      <td width="295" height="20" align="center"><p>Doc. de Identidad
          <input type="text" class="boxBusqueda4" name="buscar1">
        </p>
        </td>
      <td width="473" align="center"  ><p>Primer Nombre
       
          <input type="text" class="boxBusqueda4" name="buscar2">
        </p></td>
      <td width="474" align="center"  ><p>Segundo Nombre
       
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
    <?php while ($res=sql_fetch($rs)){ ?>
<tr> 
      <td height="20"><a href="javascript:actualizaPadre('<?php echo trim($res["nombre1"])." ".trim($res["nombre2"])." ".trim($res["apellidopat"])." ".trim($res["apellidomat"])."','".$res["idpersona"]; ?>')"><?php echo $res["noidentidad"];?></a></td>
      <td ><a href="javascript:actualizaPadre('<?php echo trim($res["nombre1"])." ".trim($res["nombre2"])." ".trim($res["apellidopat"])." ".trim($res["apellidomat"])."','".$res["idpersona"]; ?>')"><?php echo $res["nombre1"];?></a></td>
      <td ><a href="javascript:actualizaPadre('<?php echo trim($res["nombre1"])." ".trim($res["nombre2"])." ".trim($res["apellidopat"])." ".trim($res["apellidomat"])."','".$res["idpersona"]; ?>')"><?php echo $res["nombre2"];?></a></td>
      <td ><a href="javascript:actualizaPadre('<?php echo trim($res["nombre1"])." ".trim($res["nombre2"])." ".trim($res["apellidopat"])." ".trim($res["apellidomat"])."','".$res["idpersona"]; ?>')"><?php echo $res["apellidopat"];?></a></td>
      <td ><a href="javascript:actualizaPadre('<?php echo trim($res["nombre1"])." ".trim($res["nombre2"])." ".trim($res["apellidopat"])." ".trim($res["apellidomat"])."','".$res["idpersona"]; ?>')"><?php echo $res["apellidomat"];?></a></td>
    <td ><form action="<?php echo "N_Persona.php?ir=personas2.php&id_persona=".$res["idpersona"];?> " method="post" name="form2">
         <input type='image' src='../images/reg_adm.gif' onClick="this.form2.submit()">
       </form></td>
  </tr>
   <?php }?>
</table>
</BODY>
</HTML>