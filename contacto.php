
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
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->



</head>
<body>

	<div id="fh5co-wrapper">


		<div align = "center" class="row" >
				<img src="images/portada2.jpg" href="http://www.ucab.gob.bo/" class="img-responsive" alt="Image" width="1300">
		</div>

	<div id="fh5co-page">


	<div id="fh5co-header">
		<header id="fh5co-header-section">

			<div class="container">
				<?php
		    require 'menu.php';
		     ?>
			</div>
		</header>
	</div>

	<!-- end:fh5co-header -->
	<div class="fh5co-parallax2" style="background-image: url(images/slider/portada.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
	</div>

	<div id="fh5co-contact-section" class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="col-sm-6">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3799.8044046745476!2d-63.17072428477133!3d-17.753852981857538!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa5f081a9de01e94d!2sMDRyT-UCAB!5e0!3m2!1ses-419!2sbo!4v1480366179999" width="600" height="580" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
				<div class="col-sm-6">
					<div class="col-md-12">
						<h3>Nuestra Dirección</h3>
						<ul class="contact-info">
							<li><i class="ti-map"></i>Av. Beni Calle Mapaiso Nº 57 Entre Tercer y Cuarto Anillo. Entre 3er. y 4to. Anillo.</li>
							<li><i class="ti-mobile"></i>800 101 081</li>
							<li><i class="ti-envelope"></i><a href="#">ucab.mdryt@gmail.com</a></li>
							<li><i class="ti-home"></i><a href="#">www.ucab.gob.bo</a></li>
						</ul>
					</div>
	        		<form name="form1" method="post" action="mailto:ucab.mdryt@gmail.com">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input  name="nombre" id="nombre" type="text" class="form-control" placeholder="Nombre">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input name="email" id="email" type="text" class="form-control" placeholder="Correo Electronico">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<textarea id="opinion" name="opinion" class="form-control" id="" cols="30" rows="7" placeholder="Mensaje"></textarea>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input type="submit" name="submit" value="Enviar Mensaje" class="btn btn-primary">
									</div>
								</div>
							</div>
						</div>
			        </form>
				</div>
			</div>
			
		</div>
	</div>



	<?php
  require 'institucionesimp.php';
	require 'footer.php';
	 ?>

	</div>
	<!-- END fh5co-page -->

	</div>
	<!-- END fh5co-wrapper -->

	<!-- Javascripts -->
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
