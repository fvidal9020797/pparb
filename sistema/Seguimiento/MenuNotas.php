<?php

session_start();
set_time_limit(5000);
//print_r($_SESSION);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>UCAB MDRyT</title>
<link href="../../css/mdryt.css" type="text/css" rel="stylesheet">
<style type="text/css">
    .demo {
    -moz-border-radius:0px 0px 15px 15px;
    -webkit-border-radius: 0px 0px 15px 15px;
	border-radius: 0px 0px 15px 15px;
	-moz-box-shadow: 0px 0px 1px 1px rgba(36,161,207,0.9);
	-webkit-box-shadow: 0px 0px 1px 1px rgba(36,161,207,0.9);
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
	-moz-box-shadow: 1px 1px 1px 1px rgba(36,161,207,0.9);
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
<tr>
    <td>
        <table width="100%" border="0" cellspacing="3" cellpadding="0">

          <tr align="center">
              <?php
        	     include "../Valid.php";
        	    ?>

               <td bgcolor="<?php if(isset($_GET["aux"]) && $_GET["aux"]<=1) {echo "#032c02";} else {echo "#75af73";} ?>" class="demo3"><font color="#FFFFFF"><b><a href="MenuNotasInternas.php?aux=1">Notas de Remisión de Carpetas</a></b></font></td>

        	     <td bgcolor="<?php if(isset($_GET["aux"]) && $_GET["aux"]==2 ) {echo "#032c02";} else {echo "#75af73";} ?>" class="demo3"><font color="#FFFFFF"><b><a href="MenuNotasExternas.php?aux=1">Notas de Remisión de RCIAS, Solicitudes, Documentos Presentados</a></b></font></td>
          </tr>
        </table>
    </td>
</tr>

<tr><td class="taulaA">
<?php
if(isset($_GET['aux'])){
   $opc=$_GET["aux"];
}
else{
   $opc=0;
}
switch ($opc)
	{case 1: $m="MenuNotasInternas.php";break;   // Listado de Notas
	 case 2: $m="MenuNotasExternas.php";break; // devuelve una nueva nota
	 case 0: $m="inicio.php";
	}

?>

<iframe src="<?php echo $m; ?>" frameborder="0" width="100%" height="550"  marginheight="0" marginwidth="0" scrolling="auto"></iframe>
<span class="mensajes">
<?php if(isset($_GET['datosguardados'])){
echo '<script>alert("Datos Guardados Exitosamente")</script>';
}?>
</td></tr>
</table>
</body>
</html>
