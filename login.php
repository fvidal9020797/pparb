<?php
session_start();set_time_limit(5000);

$MM_redirectLoginSuccess='#';
$loginFormAction = $_SERVER['PHP_SELF'];
$PrevUrl=$_SERVER['PHP_SELF'];
$_SESSION['PrevUrl']=$PrevUrl;
if(isset($_SESSION['MM_Username']))
	{ unset($_SESSION);
	session_destroy();
	header('Location: login.php');
	}
else
	{
	include_once('sistema/scripts/error_handler.inc.php');
	// set to the user defined error handler
	$old_error_handler = set_error_handler("ErrorHandler");

	if (isset($_POST['formUsername']))
		{
		$loginUsername=$_POST['formUsername'];//nombre
		$password=$_POST['formPassword'];//pass
		$username_mdryt = $loginUsername;
		$password_mdryt = $password;
		include('sistema/valid.php');

		$MM_fldUserAuthorization = "nivel";
		$MM_redirectLoginFailed = "sistema/acceso.php?_failed=1";
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
					     header("Location:sistema/Admin.php");// . $MM_redirectLoginSuccess );
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

 <html class="no-js">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>MDRyT-UCAB</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />

  <!--
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE
	DESIGNED & DEVELOPED by FREEHTML5.CO

	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />


	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">
	<!-- <link href='https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700italic,900,700,900italic' rel='stylesheet' type='text/css'> -->

	<!-- Stylesheets -->
	<!-- Dropdown Menu -->
	<link rel="stylesheet" href="css/superfish.css">
	<!-- Owl Slider -->
	<!-- <link rel="stylesheet" href="css/owl.carousel.css"> -->
	<!-- <link rel="stylesheet" href="css/owl.theme.default.min.css"> -->
	<!-- Date Picker -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
	<!-- CS Select -->
	<link rel="stylesheet" href="css/cs-select.css">
	<link rel="stylesheet" href="css/cs-skin-border.css">

	<!-- Themify Icons -->
	<link rel="stylesheet" href="css/themify-icons.css">
	<!-- Flat Icon -->
	<link rel="stylesheet" href="css/flaticon.css">
	<!-- Icomoon -->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Style -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<link rel="stylesheet" href="css/style1.css">
	


</head>
<body>

	<div class="container" align ="center" >
		<div class="row">
			<div class="col-sm-12">
	  			<?php include("cabezera.php");?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<?php include("menu.php");?>
			</div>
		</div>
		<div class="row" style="margin-top:50px">
			<div class="col-sm-12">
				<div class="col-sm-6">
					<img style="width: 100%;" src="images/logos/sigpparb.png">
				</div>
				<div class="col-sm-6">
					<div class="row">
						<h3>SIGPPARB</h3>
						<p>INGRESO AL SISTEMA INTEGRADO DE GESTIÓN DEL PROGRAMA DE PRODUCCIÓN DE ALIMENTOS Y RESTITUCIÓN DE BOSQUES.</p>
					</div>
					<div class="row">
						<form   action="<?php echo $loginFormAction; ?>" method="POST" enctype="multipart/form-data" name="form_login" id="login_form" >
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-6">
										<div style="text-align: left;" class="form-group">
											<label>USUARIO:</label>
											<input type="text" name="formUsername" class="form-control" placeholder="Nombre de Usuario" required>
										</div>
									</div>
									<div style="text-align: left;" class="col-md-6">
										<div class="form-group">
											<label>CONTRASEÑA:</label>
											<input type="password" class="form-control" name="formPassword" placeholder="Contraseña" required>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group" style="text-align: left;">
											<input name="submitLogin" type="submit" value="Iniciar Sesion" class="btn btn-primary">
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="row" style="margin-top:50px">
			<?php include("footer.php"); ?>
		</div>
	</div>
	<script src="js/jquery-2.1.4.min.js"></script>
	<!-- Dropdown Menu -->
	<script src="js/hoverIntent.js"></script>
	<script src="js/superfish.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Counters -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Owl Slider -->
	<!-- // <script src="js/owl.carousel.min.js"></script> -->
	<!-- Date Picker -->
	<script src="js/bootstrap-datepicker.min.js"></script>
	<!-- CS Select -->
	<script src="js/classie.js"></script>
	<script src="js/selectFx.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<script src="js/custom.js"></script>

</body>
</html>
