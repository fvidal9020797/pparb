<?php	session_start();set_time_limit(5000);
//print_r($_POST);
if(isset($_POST['idreg'])){
	$idreg=$_POST['idreg'];
	$_SESSION['idreg']=$idreg;
}

if(isset($_POST['Actividad2'])){
	$Actividad=$_POST['Actividad2'];
	$_SESSION['Actividad']=$Actividad;
}
if(isset($_POST['Causal']) && !isset($_SESSION['Causal']) ){
	$Causal=$_POST['Causal'];
	$_SESSION['Causal']=$Causal;
}

//print_r($_SESSION);
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UCAB-PPARB</title>
<link href="../../css/mdryt.css" type="text/css" rel="stylesheet">
<style type="text/css">
    .demo {
    -moz-border-radius:0px 0px 15px 15px;
    -webkit-border-radius: 0px 0px 15px 15px;
	border-radius: 0px 0px 15px 15px;
	-moz-box-shadow: 0px 0px 1px 1px rgb(3, 44, 2);
	-webkit-box-shadow: 0px 0px 1px 1px rgb(3, 44, 2);
	box-shadow: 0px 0px 1px 1px rgba(36,161,207,0.9);
    }
	.demo2 {
    -moz-border-radius:15px 15px 0px 0px;
    -webkit-border-radius: 15px 15px 0px 0px;
	border-radius: 15px 15px 0px 0px;
	-moz-box-shadow: 0px 0px 1px 1px rgba(36,161,207,0.9);
	-webkit-box-shadow: 0px 0px 1px 1px rgba(36,161,207,0.9);
	box-shadow: 0px 0px 1px 1px rgba(36,161,207,0.9);
    }
	.demo3 {
    -moz-border-radius:10px 10px 10px 10px;
    -webkit-border-radius: 10px 10px 10px 10px;
	border-radius: 3px 3px 3px 3px;
	-moz-box-shadow: 1px 1px 1px 1px rgb(3, 44, 2);
	-webkit-box-shadow: 1px 1px 1px 1px rgb(3, 44, 2);
	box-shadow: 1px 1px 1px 1px rgb(3, 44, 2);
    }
	.mensajes {
	width:400px;
	height:100px;
	background:FF8822;
	color:#FF0000;
	padding:10px;
	margin:40px auto;
	text-align:center;
	font-family:Verdana, Arial;
	display:none;
	}
a:link {
	color: #FFF;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #FFF;
}
a:hover {
	text-decoration: underline;
	color: #FFF;
}
a:active {
	text-decoration: none;
	color: #FFF;
}
.taulaA { background : #E8F0E8; border : 0px solid rgba(36,161,207,0.9); font-family: Verdana, Arial, Helvetica, sans-serif; font-size : 10px; border-radius: 10px 1px 3px 3px;}
</style>
</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td>
    <table width="100%" border="0" cellspacing="3" cellpadding="0">
    <tr align="center">
    <?php
	include "../Valid.php";
	if (permisos($cn,"N_Beneficiario.php"))
		{
		?>
    	<td bgcolor="<?php if(isset($_GET["aux"]) && $_GET["aux"]<=1) {echo "#032c02";} else {echo "#75af73";} ?>" class="demo3"><font color="#FFFFFF"><b><a href="Formulario001.php?aux=1">Identificaci&oacute;n del Predio</a></b></font></td>
	    <?php
		}
		/////////////////////si no hay causal de rechazo//////////////////////////////////
if(isset($_SESSION['idreg']) && $_SESSION['idreg']>0 && isset($_SESSION["Causal"]) && ($_SESSION["Causal"]==0 || $_SESSION["Causal"]==2) ) {
	if (permisos($cn,"N_Bosques.php") )
		{
		?>
    	<td bgcolor="<?php if(isset($_GET["aux"]) && $_GET["aux"]==2 ) {echo "#032c02";} else {echo "#75af73";} ?>" class="demo3"><font color="#FFFFFF"><b><a href="Formulario001.php?aux=2">Restituci&oacute;n de Bosques</a></b></font></td>
	    <?php
		}
	if (permisos($cn,"N_Agricola.php") && isset($_SESSION['Actividad']) && ($_SESSION['Actividad']=="Agricola" || $_SESSION['Actividad']=="Mixta Agropecuaria" || $_SESSION['Actividad']=="Agricola-Avicola" || $_SESSION['Actividad']=="Agricola-Porcina") )
		{
		?>
	    <td bgcolor="<?php if(isset($_GET["aux"]) && $_GET["aux"]==3) {echo "#032c02";} else {echo "#75af73";} ?>" class="demo3"><font color="#FFFFFF"><b><a href="Formulario001.php?aux=3">Producci&oacute;n Agricola</a></b></font></td>
	    <?php
		}
	if (permisos($cn,"N_Ganadera.php") && isset($_SESSION['Actividad']) && ($_SESSION['Actividad']=="Ganadera" || $_SESSION['Actividad']=="Mixta Agropecuaria"))
		{
		?>
	    <td bgcolor="<?php if(isset($_GET["aux"]) && $_GET["aux"]==4) {echo "#032c02";} else {echo "#75af73";} ?>" class="demo3"><font color="#FFFFFF"><b><a href="Formulario001.php?aux=4">Producci&oacute;n Ganadera</a></b></font></td>
	    <?php
		}
	if (permisos($cn,"N_GanaderaLechero.php") && isset($_SESSION['Actividad']) && ($_SESSION['Actividad']=="Ganadera Lechera" || $_SESSION['Actividad']=="Mixta Agropecuaria"))
		{
		?>
	    <td bgcolor="<?php if(isset($_GET["aux"]) && $_GET["aux"]==5) {echo "#032c02";} else {echo "#75af73";} ?>" class="demo3"><font color="#FFFFFF"><b><a href="Formulario001.php?aux=5">Producci&oacute;n Ganadera Lechera</a></b></font></td>
         <?php
		}
	if (permisos($cn,"N_Avicola.php") && isset($_SESSION['Actividad']) && ($_SESSION['Actividad']=="Agricola-Avicola"))
		{
		?>
	    <td bgcolor="<?php if(isset($_GET["aux"]) && $_GET["aux"]==7) {echo "#032c02";} else {echo "#75af73";} ?>" class="demo3"><font color="#FFFFFF"><b><a href="Formulario001.php?aux=7">Producci&oacute;n Avicola</a></b></font></td>
         <?php
		}
	if (permisos($cn,"N_Porcina.php") && isset($_SESSION['Actividad']) && ($_SESSION['Actividad']=="Agricola-Porcina"))
		{
		?>
	    <td bgcolor="<?php if(isset($_GET["aux"]) && $_GET["aux"]==8) {echo "#032c02";} else {echo "#75af73";} ?>" class="demo3"><font color="#FFFFFF"><b><a href="Formulario001.php?aux=8">Producci&oacute;n Porcina</a></b></font></td>
	    <?php
		}
	if (permisos($cn,"N_Pago.php")&& isset($_SESSION['BoletaPago']) && $_SESSION['BoletaPago']=="ok")
		{
		?>
	    <td bgcolor="<?php if(isset($_GET["aux"]) && $_GET["aux"]==6) {echo "#032c02";} else {echo "#75af73";} ?>" class="demo3"><font color="#FFFFFF"><b><a href="Formulario001.php?aux=6">Plan de Pagos</a></b></font></td>
        <?php
		}
}//ifidreg>0
		?>
    </tr>
    </table>
</td></tr>
<tr><td class="taulaA">
<?php
if(isset($_GET['aux'])){
   $opc=$_GET["aux"];
}
else{
   $opc=1;
}
switch ($opc)
	{case 1: $m="N_Beneficiario.php";break;
	 case 2: $m="N_Bosques.php";break;
	 case 3: $m="N_Agricola.php";break;
	 case 4: $m="N_Ganadera.php";break;
	 case 5: $m="N_GanaderaLechero.php";break;
	 case 6: $m="N_Pago.php";break;
	 case 7: $m="N_Avicola.php";break;
	 case 8: $m="N_Porcina.php";break;
	 default: $m="N_Beneficiario.php";
	}

?>

<iframe src="<?php echo $m; ?>" frameborder="0" width="100%" height="550"  marginheight="0" marginwidth="0" scrolling="auto"></iframe>
<span class="mensajes">
<?php if(isset($_GET['datosguardados'])){
echo '<script>alert("Datos Guardados Exitosamente!!")</script>';
}?>
</td></tr>
</table>
</body>
</html>
