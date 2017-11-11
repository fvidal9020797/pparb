<?php
session_start();set_time_limit(5000);

$MM_redirectLoginSuccess='#';
$loginFormAction = $_SERVER['PHP_SELF'];
$PrevUrl=$_SERVER['PHP_SELF'];
$_SESSION['PrevUrl']=$PrevUrl;
if(isset($_SESSION['MM_Username']))
	{ unset($_SESSION);
	session_destroy();
	header('Location: acceso.php');
	}
else
	{
	include_once('scripts/error_handler.inc.php');
	// set to the user defined error handler
	$old_error_handler = set_error_handler("ErrorHandler");

	if (isset($_POST['formUsername']))
		{
		$loginUsername=$_POST['formUsername'];//nombre
		$password=$_POST['formPassword'];//pass
		$username_mdryt = $loginUsername;
		$password_mdryt = $password;
		include('valid.php');

		$MM_fldUserAuthorization = "nivel";
		$MM_redirectLoginFailed = "acceso.php?_failed=1";
		$MM_redirecttoReferrer = false;

		$LoginRS__query="select f.idfuncionario,p.nombre1,p.apellidopat,p.apellidomat,f.cargo, f.idunidad from persona as p,funcionario as f where f.idpersona=p.idpersona and f.estadofun='A' and f.login = '".$loginUsername."'";
		// echo LoginRS__query;
		$LoginRS = pg_query($cn,$LoginRS__query);

		$LoginRS_row = pg_fetch_array($LoginRS,0);
		$loginFoundUser = pg_num_rows($LoginRS);

		pg_close($cn);

		if ($loginFoundUser)
		{
		$loginUserId = $LoginRS_row[0];//id
		$nombre = $LoginRS_row[1];
		$apellido_paterno   = $LoginRS_row[2];
		$apellido_materno   = $LoginRS_row[3];
		$loginStrGroup   = $LoginRS_row[4]; //grupo de usuario
		$unidad = $LoginRS_row[5];

		//declare three session variables and assign them

		$GLOBALS['MM_Username'] = $loginUsername;
		$GLOBALS['MM_UserGroup'] = $loginStrGroup;
		$GLOBALS['MM_UserId'] = $loginUserId;
		$GLOBALS['MM_Password'] = $password_mdryt;

		//register the session variables

		//session_register('control');
		$_SESSION["MM_Username"]= $loginUsername;
		$_SESSION["MM_UserGroup"] = $loginStrGroup;
		$_SESSION["MM_UserId"]= $loginUserId;
		$_SESSION["MM_Password"]= $password_mdryt;
		$_SESSION["MM_Unidad"]= $unidad;
		//pg_free_result($LoginRS);
		// redireciona a cierta pagina de acuerdo al tipo de usuario

		$_SESSION["apellido"]=$nombre." ".$apellido_paterno." ".$apellido_materno;
		//$MM_redirectLoginSuccess="Admin.php";
		//print_r($_SESSION);
		if (isset($_SESSION['PrevUrl']) && false)
			{  $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	}

		if (!(isset($_SESSION['ErrorThrown']) && $_SESSION['ErrorThrown'] != ""))
			{
					     header("Location:Admin.php");// . $MM_redirectLoginSuccess );
			}
		}
	else
		{
		trigger_error( "Nombre de Usuario o Contraseña  no válidos.",FATAL);
		//echo "hlaaaaaaaaaaaaa";
		//header("Location: ".$MM_redirectLoginFailed );
		}
	}
}
//print_r($_SESSION);
?>






<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="author" content="Estado Plurinacional de Bolivia" />
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
        <title>UCAB-PPARB</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<LINK href="./css/mdryt.css" type=text/css rel=stylesheet>
		<link rel="stylesheet" type="text/css" href="./css/button.css"/>
		<script language="JavaScript" src="scripts/funciones.js"></script>

        <link rel="stylesheet" href="../css/principal.css" type="text/css" />
        <link rel="stylesheet" href="../css/menucolor.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="../js/css/style3.css" type="text/css" media="screen" />
        <style type="text/css">@import url("../config/css/tablas.css");</style>
        <style type="text/css">@import url("../config/css/fb-buttons.css");</style>

        <script type="text/javascript" src="../js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="../js/jquery.form.2.85.js"></script>
        <script type="text/javascript" src="../js/jquery.easing.js"></script>
        <script type="text/javascript" src="../js/script.js"></script>
        <script type="text/javascript" src="../js/jquery.scrollTo.min.js"></script>
        <style>
        ul.lof-main-wapper li {
            position:relative;
        }

        iframe img {border:none !important;}
        </style>


</head>

<?php
include_once('scripts/body_handler.inc.php');
?>
<!-- Copyright � 2005. Spidersoft Ltd -->
<style>
A.applink:hover {border: 2px dotted #DCE6F4;padding:2px;background-color:#ffff00;color:green;text-decoration:none}
A.applink       {border: 2px dotted #DCE6F4;padding:2px;color:#2F5BFF;background:transparent;text-decoration:none}
A.info          {color:#2F5BFF;background:transparent;text-decoration:none}
A.info:hover    {color:green;background:transparent;text-decoration:underline}
</style>



			<body oncontextmenu="return false">

			<div class="CSSTable" >
			<form   action="<?php echo $loginFormAction; ?>" method="POST" enctype="multipart/form-data" name="form_login" id="login_form" >
					<table>
					<tr class="">
						<td colspan = "2"><strong>INICIO DE SESIÓN PARA EL SISTEMA INTEGRADO DE GESTIÓN DEL PPARB</strong></td>
					</tr>

					<tr>
					<td width="38%" align="center" ><p align="right"><Strong>NOMBRE DE USUARIO:</Strong></p></td>
					<td width="62%" align="center" valign="middle"><input name="formUsername" type="text"  size="40" autocomplete="off"/></td>
					</tr>

					<tr >
					<td align="center"><p align="right"><Strong>CONTRASEÑA:</Strong></p></td>
					<td align="center" valign="middle"><input name="formPassword" type="password"  size="40" autocomplete="off"/></td>
					</tr>

					<tr class="">
						<td colspan = "2">

							<p align="center">
							<input name="submitLogin" type="submit" class="boton verde formaBoton" value="<?php echo "Iniciar Sesión" ?>" />
							</p>

							&nbsp;
						</td>

					</tr>





					</table>


			</form>



			</div>


		</body>

</html>
