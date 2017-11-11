<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/sistema/config/config.php';
require_once APPPATH . '/NOTICIAS/GestorNoticias.php';
 ?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>MDRyT-UCAB</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />
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
	<style>
 	</style>
</head>
<body>
<div class="container contener-principal" style="background-color: #75af73" align ="center" >
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
	<div class="row">
		<div class="col-sm-9" style="padding-right: 0px;">
	    	<div id="myCarousel" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
				<ol class="carousel-indicators">
				    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				    <li data-target="#myCarousel" data-slide-to="1"></li>
				    <li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>
			  	<div class="carousel-inner">
    				<div class="item active">
				      	<img src="images/slider/slider1.jpg" alt="Los Angeles">
				    </div>
			    	<div class="item">
			      		<img src="images/slider/slider2.jpg" alt="Chicago">
			    	</div>
    				<div class="item">
      					<img src="images/slider/slider3.jpg" alt="New York">
    				</div>
  				</div>
  				<!-- Left and right controls -->
				<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left"></span>
				    <span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right"></span>
				    <span class="sr-only">Next</span>
				</a>
			</div>
		</div>
		<div class="col-sm-3" style="padding-left: 20px;">
			<div id="fb-root"></div>
			<script>
				(function(d, s, id) {
  					var js, fjs = d.getElementsByTagName(s)[0];
  					if (d.getElementById(id)) return;
					js = d.createElement(s); js.id = id;
					js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.9";
					fjs.parentNode.insertBefore(js, fjs);
				}
				(document, 'script', 'facebook-jssdk'));
			</script>
			<div class="fb-page" data-href="https://www.facebook.com/UCAB.PPARB/" data-height="330" data-tabs="timeline" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
				<blockquote cite="https://www.facebook.com/UCAB.PPARB/" class="fb-xfbml-parse-ignore">
					<a href="https://www.facebook.com/UCAB.PPARB/">MDRyT - UCAB</a>
				</blockquote>
			</div>
			<div>
				<img style="width: 255px;height: 122px; margin-top: -20px;" src="images/bandera.jpg"/>
			</div>
			<div>
				<ul class="social-icons">
					<a target="_blank" href="https://www.facebook.com/UCAB.PPARB/" target="_blank"><img alt="Siguenos en Facebook" src="https://lh6.googleusercontent.com/-CYt37hfDnQ8/T3nNydojf_I/AAAAAAAAAr0/P5OtlZxV4rk/s32/facebook32.png" width=32 height=32  /></a>
					<a target="_blank" href="https://twitter.com/ucab_bolivia" target="_blank"><img src="https://lh6.googleusercontent.com/--aIk2uBwEKM/T3nN1x09jBI/AAAAAAAAAs8/qzDsbw3kEm8/s32/twitter32.png" width=32 height=32 alt="Síguenos en Twitter" /></a>
					<a target="_blank" href="https://www.youtube.com/channel/UCHFFBpGoM3uY1v5BJj7-3jg" target="_blank"><img alt="Siguenos en YouTube" src="images/youtube.png" width=32 height=32  /></a>
				</ul>
			</div>
		</div>
	</div>
	<div class="row" style="margin-left: 0px;margin-right: 0px;">
		<div class="col-sm-12">
			<div class="section-title text-center" style="margin-top: 70px;">
				<h2>ULTIMAS NOTICIAS</h2>
			</div>
			<div class="row">
				<?php
				$g1 = new GestorNoticias();
				$arraynoticiauno= $g1->listarNoticias(3);
				$cont=pg_num_rows($arraynoticiauno);
        echo ($cont);
				while($cont > 0){
					if($cont == 3)
					{
						$noticia1=pg_fetch_array($arraynoticiauno);
						$arraynoticiaunoimagen=$g1->listarImagenes( $noticia1['id'] ,1);
						$imagen1=pg_fetch_array($arraynoticiaunoimagen);

						if ($imagen1['id']>0)
						 {
						 ?>
						<div class="feature-full-1col">
							<div class="image" style="background-image: url(<?php echo WEBPATH."/NOTICIAS/IMAGENES/".$noticia1['id']."/". $imagen1['nombre'] ?>);">
								<div class="descrip text-center">
									<p><small> Fecha:</small><span><?php echo $noticia1['fecha_noticia'] ?></span></p>
							    </div>
							</div>
							<div class="desc" >
								<h3 style="color:#000"><?php echo $noticia1['titulo'] ?></h3>
								<p style="color:#000"><?php echo substr($noticia1['decripcion'],0,254)."..."  ?></p>
                                <p><a href="#" class="btn btn-primary btn-luxe-primary"  data-toggle="modal" data-target="#team-member-4" >LEER MAS <i class="ti-angle-right"></i></a></p>
                                <div class="modal fade contact-form" id="team-member-4" tabindex="-1" role="dialog" aria-labelledby="team-member-4" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
	                                        <div class="modal-body member-info">
	                                            <div class="row">
	                                                <div class="col-md-12 col-sm-12">
	                                                    <div class="description">
	                                                        <h3><strong class="bold-text" style="margin-right: 10px;" ><?php echo $noticia1['titulo'] ?></strong></h3>
	                                                        <div class="light-text"><img  class="image2"  src="<?php echo WEBPATH."/NOTICIAS/IMAGENES/".$noticia1['id']."/". $imagen1['nombre'] ?>" alt=""></div>
	                                                        <div class="about margin-top-medium">
	                                                            <p><?php echo  $noticia1['decripcion']; ?>  </p>
	                                                        </div>
	                                                    </div> <!-- *** end description *** -->
	                                                </div> <!-- *** end col-md-7 *** -->
	                                            </div> <!-- *** end row *** -->
	                                        </div> <!-- *** end modal-body *** -->
	                                    </div> <!-- *** end modal-content *** -->
	                                </div> <!-- *** end modal-dialog *** -->
	                        	</div>
							</div>
						</div>
				    <?php
						}
					}
					else
					{
						$c = 2;
						?>
						<div class="feature-full-2col" style="margin-bottom: 0px;">
						<?php
						while($c > 0)
						{
							$noticia1=pg_fetch_array($arraynoticiauno);
							$arraynoticiaunoimagen=$g1->listarImagenes( $noticia1['id'] ,1);
							$imagen1=pg_fetch_array($arraynoticiaunoimagen);
							if ($imagen1['id']>0)
						 	{
						?>
						<div class="f-hotel">
					  		<div class="image" style="background-image: url(<?php echo WEBPATH."/NOTICIAS/IMAGENES/".$noticia1['id']."/". $imagen1['nombre'] ?>);">
								<div class="descrip text-center">
								    <p><small> Fecha:</small><span><?php echo $noticia1['fecha_noticia'] ?></span></p>
								</div>
							</div>
							<div class="desc"  >
								<h3 style="color:#000"><?php echo $noticia1['titulo'] ?></h3>
								<p style="color:#000"><?php echo substr($noticia1['decripcion'],0,254)."..."  ?></p>
	                            <p><a href="#" class="btn btn-primary btn-luxe-primary" data-toggle="modal" data-target="#team-member-<?php echo $c;?>"  >LEER MAS...<i class="ti-angle-right"></i></a></p>
							</div>
		                    <div class="modal fade contact-form" id="team-member-<?php echo $c;?>" tabindex="-1" role="dialog" aria-labelledby="team-member-<?php echo $c;?>" aria-hidden="true" style="display: none;">
		                        <div class="modal-dialog modal-lg">
		                            <div class="modal-content">
		                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                                	<span aria-hidden="true">×</span>
		                                </button>
		                                <div class="modal-body member-info">
		                                    <div class="row">
	                                            <div class="col-md-12 col-sm-12">
	                                                <div class="description">
	                                                    <h3 style="margin-right: 5px;" ><strong class="bold-text"  ><?php echo $noticia1['titulo'] ?></strong></h3>
	                                                    <div class="light-text"><img  class="image2"  src="<?php echo WEBPATH."/NOTICIAS/IMAGENES/".$noticia1['id']."/". $imagen1['nombre'] ?>" alt=""></div>
	                                                    <div class="about margin-top-medium">
	                                                        <p ><?php echo  $noticia1['decripcion']; ?>  </p>
	                                                    </div>
	                                                </div> <!-- *** end description *** -->
		                                        </div> <!-- *** end col-md-7 *** -->
		                                    </div> <!-- *** end row *** -->
		                                </div> <!-- *** end modal-body *** -->
		                            </div> <!-- *** end modal-content *** -->
		                        </div> <!-- *** end modal-dialog *** -->
		                    </div>
						</div>
						 <?php
						 	}
						 	$c = $c - 1;
					 	}
						$cont = $cont - 2; ?>
						</div>
					<?php
					}
				 	$cont = $cont - 1;
			 		}
				 ?>
			</div>
		</div>
	</div>
	<!---->
	<div class="row" style="color: #52565b;">
		<div class="row" style="margin-top: 100px;">
			<div class="col-sm-12">
				<div class="section-title text-center">
					<h2>INSTITUCIONES QUE IMPLEMENTAN EL PROGRAMA</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="col-sm-3">
					<div class="testimony" align="center">
	        			<a target="_blank" href="http://ruralytierras.gob.bo">	<img src="images/logos/mdryt1.png" border="0" width="270" height="130"> </a>

	      			</div>
				</div>
				<div class="col-sm-3">
					<div class="testimony" align="center">
						<a target="_blank" href="http://vdra.ruralytierras.gob.bo/">	<img src="images/logos/vdra.png" border="0" > </a>

					</div>
				</div>
				<div class="col-sm-3">
					<div class="testimony" align="center">
		             	<a target="_blank" href="http://www.abt.gob.bo">	<img src="images/logos/abt.png" border="0" > </a>

	          		</div>
				</div>
				<div class="col-sm-3">
					<div class="testimony" align="center">
						<a target="_blank" href="http://www.inra.gob.bo">	<img src="images/logos/inra.png" border="0" > </a>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!--FOOTHER-->
	<div class="row" style="margin-top: 100px;">
		<?php include("footer.php"); ?>
	</div>
</div>

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

    <script language="javascript" type="text/javascript">
            function noticiaVentana(){

                document.getElementById('team-member-3').style.display = 'block';

            }
    </script>

<!-- <script src="snowstorm.js"></script> -->

</body>
</html>
