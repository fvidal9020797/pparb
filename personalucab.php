<?php
	session_start();
?>
<?php
     require_once $_SERVER['DOCUMENT_ROOT'] . '/sistema/config/config.php';
     require_once APPPATH . '/NOTICIAS/GestorNoticias.php';
     $g=new GestorNoticias();
     $array=$g->listarfuncionariosucab();
     $cont=pg_num_rows($array);
     $noticia=pg_fetch_array($array);
     $num = 1;
     $contador_filas=0;
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
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" href="css/superfish.css">
	<link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" href="css/cs-select.css">
	<link rel="stylesheet" href="css/cs-skin-border.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/flexslider.css">
	<link rel="stylesheet" href="css/style.css">
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
				<div class="row">
					<h3>FUNCIONARIOS UCAB</h3>
				</div>
				<div class="row">
					<img class="img1" style="width: 97%;" src="images/personal/ucab1.jpg"/>
				</div>
				
				<?php
                    if($cont>0){
                    	do {
                    		if($contador_filas==0){
                ?>				
                				<div class="row">
                <?php
                			}	
                ?>					
					                <div class="col-md-4" style="text-align: left;" >
										<div class="services">
											<span><i class="ti-user"></i></span>
											<div class="desc">
						                        <h3 style=" font-size: 21px; font-weight: bold; "><?php echo $num; $cont=$cont-1; $num=$num+1;?> <?php echo trim($noticia['nombre1'])." "; if(strlen(trim($noticia['nombre2']))){echo trim($noticia['nombre2'])." ";} if(strlen(trim($noticia['apellidopat']))){echo trim($noticia['apellidopat'])." ";}  if(strlen(trim($noticia['apellidomat']))){echo trim($noticia['apellidomat'])." ";} ?></h3>
						                        <p><?php echo trim($noticia['nombrecargo']); if($noticia['idfuncionario']==76){echo "<br><br>"; } ?></p>
											</div>
										</div>
									</div>
				<?php
							$contador_filas++;
							if($contador_filas==3){
				?>				
								</div>	
				<?php		
							}
				?>					
				<?php
						
						if($contador_filas==3){
							$contador_filas=0;
						}
                	    } while ($noticia = pg_fetch_assoc($array));

                    }

                ?>
				
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
