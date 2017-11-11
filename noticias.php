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
	<script src="js/jquery-2.1.4.min.js"></script>
	<link rel="stylesheet" href="css/jquery.dataTables.min.css">
	<script src="js/jquery.dataTables.min.js"></script>
</head>
<body>
	<div class="container" align ="center" style="padding-left: 0px;padding-right: 0px;">
		<div class="col-sm-12">
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
				<div class="section-title text-center">
					<h3>Noticias</h3>
					<p align="justify" style="margin-left:20px;margin-right:20px">Noticias desarrolladas por el Programa de Produccion de Alimentos y Restitución de Bosques:</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<table id="example" class="display" cellspacing="0" width="100%">
				        <thead>
				            <tr>
				                <th style="color:#000;TEXT-ALIGN: CENTER;">FECHA NOTICIA</th>
				                <th style="color:#000; TEXT-ALIGN: CENTER;">TÍTULO DE LA NOTICIA</th>
				            </tr>
				        </thead>
				    </table>
				</div>
			</div>
		</div>
	<?php
		require 'footer.php';
	 ?>
	</div>
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
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/custom.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
		    listar();
		});
		function listar(){
			var table=$('#example').DataTable({
				"ajax":{
					'url':'ajaxnoticias.php',
					'type':'POST',
					"data":{
						"params":"1"
					}
				},
				"columns": [
		            { 'data': 'fecha_noticia'},
		            { 'data': 'titulo' }
			    ],
			    "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull) {
					$(nRow).attr("id",aData.id );
					$(nRow).attr("data-target",'#myModal' );
					$(nRow).attr("data-toggle",'modal' );
					return nRow;
				}
			});
			$('#example tbody').on( 'click', 'tr', function () {
				ver($(this).attr('id'));
			} );
		}
		function ver(id){
			$.ajax({
				url:'ajaxnoticias.php',
			    type:'POST',
			    data:{
			    	params:"2:"+id,
			    },
			    success: function (datas){
			    	mostrarModal(datas);
			    }
			});
		}
		function mostrarModal(datosJson){
			var obj = JSON.parse(datosJson);
			$("#titulo").html(obj.titulo);
			var ol = document.getElementById('ol-slider');
			for (var i = 0; i < obj.listaImg.length; i++) {
				var element = document.createElement("li");
				element.setAttribute("data-target","#myCarousel");
				element.setAttribute("data-slide-to",i);
				if(i==0){
					element.setAttribute("class","active");
				}
				ol.appendChild(element);
			};
			var div_slider = document.getElementById('div-slider');
			for (var i = 0; i < obj.listaImg.length; i++) {
				var element = document.createElement("div");
				if(i==0){
					element.setAttribute("class","item active");
				}else{
					element.setAttribute("class","item");
				}
				var element1 = document.createElement("img");
				element1.setAttribute("src","sistema/NOTICIAS/IMAGENES/"+obj.id+"/"+obj.listaImg[i]);
				element1.setAttribute("style","height:400px");
				element.appendChild(element1);
				div_slider.appendChild(element);
			};
			if(obj.listaImg.length==1){
				$(".carousel-control").css({
					"display":"none"
				});
				$("#ol-slider").css({
					"display":"none"
				});
			}
			$("#fecha").html(obj.fecha_noticia);
			$("#descripcion").html(obj.descripcion);
		}
		function vaciarModal(){
			$("#fecha").html("");
			$("#descripcion").html("");
			$("#titulo").html("");
			$('#ol-slider').empty();
			$('#div-slider').empty();
			$(".carousel-control").css({
				"display":"block"
			});
			$("#ol-slider").css({
				"display":"block2"
			});
		}
	</script>
	<script>
		$(document).ready(function(){
		   document.getElementsByTagName("label")[0].style.color = "black";
		   document.getElementsByTagName("label")[1].style.color = "black";
		});
	</script>
	<div class="modal fade" id="myModal" role="dialog" style="max-height:600px">
    	<div class="modal-dialog">
      		<!-- Modal content-->
      		<div class="modal-content">
        		<div class="modal-header">
          			<button type="button" class="close" onclick="vaciarModal()" data-dismiss="modal">&times;</button>
          			<h4 class="modal-title">Detalle de la Noticia</h4>
        		</div>
        		<div class="modal-body">
        			<div class="row" style="text-align:center" >
        				<div class="col-sm-12">
	        				<div class="row"  style="padding: 20px;">
	        					<span id="titulo"></span>
	        				</div>
	        				<div class="row" style="padding: 7px;">
	        					<div class="container" align="center" style="max-width:100%">
		        					<div id="myCarousel" class="carousel slide" data-ride="carousel">
										<ol id="ol-slider" class="carousel-indicators">
										</ol>
									  	<div id="div-slider" class="carousel-inner">
						  				</div>
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
	        				</div>
	        				<div class="row" style="padding: 20px;">
	        					<span id="fecha"></span>
	        				</div>
	        				<div class="row" align="justify"  style="padding: 20px; ">
	        					<span id="descripcion"></span>
	        				</div>
        				</div>
        			</div>
        		</div>
        		<div class="modal-footer">
          			<button type="button" class="btn btn-default" onclick="vaciarModal()" data-dismiss="modal">Cerrar</button>
        		</div>
      		</div>
    	</div>
  	</div>
</body>
</html>
