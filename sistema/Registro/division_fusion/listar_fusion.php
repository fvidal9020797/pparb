<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../../css/jquery.steps.css">
<script src="../../lib/jquery-1.9.1.min.js"></script>
<script src="../../libraries/jquery-1.10.3/jquery-1.10.2.min.js"></script>
<script src="../../libraries/jquery-1.10.3/jquery-1.10.3.ui.min.js"></script>
<link rel="stylesheet" href="../../css/jquery-ui.css" />
<link rel="stylesheet" href="../../css/bootstrap.min.css" />
<link rel="stylesheet" href="../../css/jquery.dataTables.min.css" />
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/jquery.dataTables.min.js"></script>
<script>
	$(document).ready(function(){
     	listar();
  	});
	function listar(){
		$.ajax({
			url:'vistas_parciales/_listar.php',
		    type:'POST',
		    success: function (data){
		    	$("#contenedor_principal").html(data);
		    	
		    }
		});
	}
	function nuevo(){
		$.ajax({
			url:'vistas_parciales/_nuevo.php',
		    type:'POST',
		    success: function (data){
		    	$("#contenedor_principal").html(data);
		    }
		});
	}
	function cancel(){
		$(".modal-backdrop").css({
			"display":"none"
		});
		$(".modal-open").css({
			"overflow":"auto"
		});
		listar();
	}
</script>
</head>
<body>
	<div id="contenedor_principal"</div>
</body>
</html>