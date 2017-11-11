<?php	session_start();set_time_limit(5000);
//si es nuevo registro eliminar variables existentes
if(isset($_GET["id"]) && $_GET["id"]==1){
include "Registro/destroy_predio.php";

}
//print_r($_SESSION);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UCAB-PPARB </title>
<link href="css/mdryt.css" type="text/css" rel="stylesheet">
<style type="text/css">

.demo {
border-radius: 0px 0px 2px 2px;
box-shadow: 0px 0px 0px 1px #75af73;
}

.demo2 {
border-radius: 5px 5px 1px 1px;
box-shadow: 0px 0px 0px 1px #032c02;
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

body {
	background-color: #F2F2F2;
	background-image: url(images/bg0007.gif);
}
.taulaA { background : #E8F0E8; border : 2px solid #032603; font-family: Verdana, Arial, Helvetica, sans-serif; font-size : 10px; border-radius: 10px 1px 3px 3px;}
</style>


</head>
<body marginheight="0" topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<?php
include "Valid.php";
?>
<table width="100%" border="0"  cellspacing="0" cellpadding="0">
<tr>
	<td>
        <table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr align="left">
          <td colspan="2" rowspan="2" ><img src="images/logonuevo.png" width="500" height="50" /></td>
          <td >&nbsp;</td>
          <td >&nbsp;</td>
          <td >&nbsp;</td>
					<td >&nbsp;</td>
					<td >&nbsp;</td>
					<td >&nbsp;</td>
          <td rowspan="2" ><img src="images/mdryt.png" width="75" height="48" /></td>
        </tr>
        <tr align="left">
          <td colspan="3" align="right"  class="celdaCelesteOscuro">USUARIO: <?php echo $_SESSION['apellido'];?></td>
        </tr>
        <tr align="center">
        <?php
			if (permisos($cn,"MenuPreregistro.php"))
				{
				?>
					<td  bgcolor="<?php if(isset($_GET["id"]) && $_GET["id"]==14) {echo "#032c02";} else {echo "#75af73";} ?>"  class="<?php if($_GET["id"]==14) {echo "demo2";} else {echo "demo";} ?>">
					<strong><font color="#FFFFFF"><a href="Admin.php?id=14">PREREGISTRO</a></font></strong></td>
				<?php
				}


		if (permisos($cn,"ListadoPredios.php"))
			{
			?>
	        <td  bgcolor="<?php if(isset($_GET["id"]) && $_GET["id"]==4) {echo "#032c02";} else {echo "#75af73";} ?>" class="<?php if($_GET["id"]==4) {echo "demo2";} else {echo "demo";} ?>">
    	    <strong><font color="#FFFFFF"><a href="Admin.php?id=4">REGISTRO</a></font></strong></td>
        <?php
        	}

			if (permisos($cn,"N_Recibo.php"))
			{
		   ?>
            <td  bgcolor="<?php if(isset($_GET["id"]) && $_GET["id"]==5) {echo "#032c02";} else {echo "#75af73";} ?>"  class="<?php if($_GET["id"]==5) {echo "demo2";} else {echo "demo";} ?>">
			<strong><font color="#FFFFFF"><a href="Admin.php?id=5">RECIBO DE PAGO</a></font></strong></td>
          <?php
        	}
			if (permisos($cn,"ListadoPrediosSeguimiento.php"))
			{
		   ?>
            <td  bgcolor="<?php if(isset($_GET["id"]) && $_GET["id"]==7) {echo "#032c02";} else {echo "#75af73";} ?>"  class="<?php if($_GET["id"]==7) {echo "demo2";} else {echo "demo";} ?>">
			<strong><font color="#FFFFFF"><a href="Admin.php?id=7">SEGUIMIENTO</a></font></strong></td>
          <?php
        	}
		 if (permisos($cn,"MenuSeguimiento.php"))
			{
		   ?>
            <td  bgcolor="<?php if(isset($_GET["id"]) &&  $_GET["id"]==8) {echo "#032c02";} else {echo "#75af73";} ?>"  class="<?php if($_GET["id"]==8) {echo "demo2";} else {echo "demo";} ?>">
			<strong><font color="#FFFFFF"><a href="Admin.php?id=8">NOTAS</a></font></strong></td>
          <?php
      }

			//if (permisos($cn,"ListadoPredios.php"))
			//	{
				?>
				<!--			<td  bgcolor="<?php //if(isset($_GET["id"]) && $_GET["id"]==11) {echo "#032c02";} else {echo "#75af73";} ?>"  class="<?php //if($_GET["id"]==11) {echo "demo2";} else {echo "demo";} ?>">
				<strong><font color="#FFFFFF"><a href="Admin.php?id=11">ESCANEADOS</a></font></strong></td> -->
						<?php
			//			}

			 if (permisos($cn,"ListarMonitoreo.php"))
					{
				   ?>
		            <td  bgcolor="<?php if(isset($_GET["id"]) && $_GET["id"]==9) {echo "#032c02";} else {echo "#75af73";} ?>"  class="<?php if($_GET["id"]==9) {echo "demo2";} else {echo "demo";} ?>">
									<strong><font color="#FFFFFF"><a href="Admin.php?id=9">MONITOREO</a></font></strong></td>
		          <?php
		     	}

			 if (permisos($cn,"ListarMuestreo.php"))
						{
						?>
									<td  bgcolor="<?php if(isset($_GET["id"]) && $_GET["id"]==13) {echo "#032c02";} else {echo "#75af73";} ?>"  class="<?php if($_GET["id"]==13) {echo "demo2";} else {echo "demo";} ?>">
						<strong><font color="#FFFFFF"><a href="Admin.php?id=13">MUESTREO</a></font></strong></td>
								<?php
						}


  if (permisos($cn,"Listar.php"))
			{
			?>
            <td  bgcolor="<?php if(isset($_GET["id"]) &&  $_GET["id"]==12) {echo "#032c02";} else {echo "#75af73";} ?>"  class="<?php if($_GET["id"]==12) {echo "demo2";} else {echo "demo";} ?>">
			<strong><font color="#FFFFFF"><a href="Admin.php?id=12">NOTICIAS</a></font></strong></td>
          <?php
      }



				if (permisos($cn,"ListadoUsuario.php"))
					{
					?>
		            <td  bgcolor="<?php if(isset($_GET["id"]) &&  $_GET["id"]==3) {echo "#032c02";} else {echo "#75af73";} ?>"  class="<?php if($_GET["id"]==3) {echo "demo2";} else {echo "demo";} ?>">
		            <strong><font color="#FFFFFF"><a href="Admin.php?id=3">ADMINISTRACIÓN DE USUARIO</a></font></strong></td>
		            <?php
		        	}
				if (permisos($cn,"Reportes.php"))
					{
					?>
		            <td  bgcolor="<?php if(isset($_GET["id"]) && $_GET["id"]==6) {echo "#032c02";} else {echo "#75af73";} ?>"  class="<?php if($_GET["id"]==6) {echo "demo2";} else {echo "demo";} ?>">
		            <strong><font color="#FFFFFF"><a href="Admin.php?id=6">REPORTES</a></font></strong></td>
		            <?php
		        	}

                                if (permisos($cn,"listado_activo.php"))
				{
				?>
							<td  bgcolor="<?php if(isset($_GET["id"]) && $_GET["id"]==15) {echo "#032c02";} else {echo "#75af73";} ?>"  class="<?php if($_GET["id"]==15) {echo "demo2";} else {echo "demo";} ?>">
				<strong><font color="#FFFFFF"><a href="Admin.php?id=15">ACTIVOS FIJOS</a></font></strong></td>
						<?php
						}

		?>



        <td  bgcolor="#75af73"  >
            <strong><font color="#FFFFFF">
						<a href="Admin.php?id=10">SALIR</a></font></strong>

				</td>
        </tr>
        </table>
	</td>
</tr>

<tr>
<td class="taulaA" >
<?php
//include "Valid.php";
if (!isset( $_GET["id"]))
    $opc = 16;
else
    $opc= $_GET["id"];
switch ($opc)
	{
	case 1: $m="Registro/Formulario001.php";break;
	case 3: $m="Usuarios/ListadoUsuario.php";break;
 	case 4: $m="Registro/MenuRegistro.php";break;
	case 5: $m="Registro/N_Recibo.php";break;
	case 6: $m="Reportes/Reportes.php";break;
	case 7: $m="Seguimiento/ListadoPrediosSeguimiento.php";break;
	case 8: $m="Seguimiento/MenuNotas.php";break;
   	case 9: $m="Monitoreo_N/index.php?action=listar";break;
 	case 10: $m="logout.php";break;
   //case 11: $m="Documentos/index.php?action=listar";break;
	case 12: $m="NOTICIAS/index.php?action=listar";break;
	case 13: $m="MUESTREO/index.php?action=listar";break;
	case 14: $m="PREREGISTRO/MenuPreregistro.php";break;
   	case 15: $m="ACTIVOSFIJOS/listado_activo.php";break;
	default: $m="inicio.php";
	}
?>
<iframe src="<?php echo $m; ?>" frameborder="0"  width="100%" height="600"  marginheight="0" marginwidth="0" hspace="0"  scrolling="Auto"></iframe>
</td>
</tr>
<tr>
  <td align="center" bgcolor="#75af73"><strong><font color="#032c02">Sistema Integrado de  Gestión del Programa de Producción de Alimentos y Restitución de Bosques (UCAB)</font></strong></td>
</tr>
</table>
</body>
</html>
