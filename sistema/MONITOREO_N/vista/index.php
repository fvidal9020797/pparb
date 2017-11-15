<?php
	//session_start();
	//echo $action = @$_GET["idreg"];
	//print_r($_SESSION);
?>
<html>
<head>
	<title></title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<link rel="stylesheet" href="vista/css/bootstrap.min.css">
	<link rel="stylesheet" href="vista/css/bootstrap.vertical-tabs.css">
	<link rel="stylesheet" href="vista/css/datepicker.css">
	<link rel="stylesheet" href="vista/css/style1.css">
	<script src="vista/js/jquery-2.1.4.min.js"></script>
	<script src="vista/js/bootstrap.min.js"></script>
	<script src="vista/js/bootstrap-datepicker.js"></script>
	<script src="vista/js/jquery.blockUI.js"></script>
	<script type="text/javascript" src="../scripts/funciones.js"></script>
	<script type="text/javascript">
		var año=0;// año del boton
		var actividad="";// actividad: mixta, agropecuaria
		var tipoPropiedad="";// mediana, empresarial, pequeña comunidad
		var tipoActividad=0;// 71:ganadera, 
		var idmonitoreo=0;// idmonitoreo, en particular
		var idreg=<?php echo @$_GET["idreg"];?>;// idregistro
		$(document).ready(function(){
		    obtener_r_general();
			obtener_fecharegistro();
		});
		function obtener_r_general(){
			$.ajax({
				url:'controlador/r_general.php',
			    type:'POST',
			    data:{
			    	parametro:"1:"+<?php echo trim(@$_GET["idreg"])?>
			    },
			    success: function (json){
			    	objson=json;
			    	var obj = JSON.parse(json);
			    	$("#nom_pre").html(obj.nombrepredio);
			    	$("#cod_reg").html(obj.idparcela);
			    	$("#sup_total").html(obj.subpredio);
			    	$("#sup_prod_alim").html(obj.supproali);
			    	$("#tipo_prop").html(obj.tipoProp);
			    	$("#tipo_act").html(obj.clasificacion);
			    	actividad=obj.clasificacion;
			    	tipoPropiedad=obj.tipoProp;
			    }
			});
		}
		function obtener_fecharegistro(){
			$.ajax({
				url:'controlador/fechasregistro.php',
			    type:'POST',
			    data:{
			    	parametro:"1:"+<?php echo trim(@$_GET["idreg"])?>
			    },
			    success: function (json){
			    	var obj = JSON.parse(json);
			    	if (obj.fechasuscripcion<'2015-09-29'){
			    		crear_anhos(1);//1 :2018
			    	}else{
			    		crear_anhos(2);//2 : 2020
			    	}
			    	mostraranhos();
			    }
			});
		}
		function crear_anhos(tipo){
			if(tipo==1){
				var table = document.getElementById('anhos');
			    var row = table.insertRow(table.rows.length);
			    for (var i = 0; i < 5; i++) {
			    	var cell = row.insertCell(i);
				    var btn = document.createElement("button");
				    btn.setAttribute("style","width:100%;");
				    btn.setAttribute("id","año"+parseInt(i+1));
				    btn.setAttribute("disabled",true);
				    btn.setAttribute("onclick","cambiar_Año('"+parseInt(i+1)+"'); año_activo();");
				    btn.innerHTML=parseInt(parseInt(2013)+parseInt(i+1));
				    cell.appendChild(btn);
			    };
			}else{
				var table = document.getElementById('anhos');
			    var row = table.insertRow(table.rows.length);
			    for (var i = 0; i < 5; i++) {
			    	var cell = row.insertCell(i);
				    var btn = document.createElement("button");
				    btn.setAttribute("style","width:100%;");
				    btn.setAttribute("id","año"+parseInt(i+3));
				    btn.setAttribute("disabled",true);
				    btn.setAttribute("onclick","cambiar_Año('"+parseInt(i+3)+"'); año_activo();");
				    btn.innerHTML=parseInt(parseInt(2013)+parseInt(i+3));
				    cell.appendChild(btn);
			    };
			}
		}
		function mostraranhos(){
			$.ajax({
				url:'controlador/monitoreo.php',
			    type:'POST',
			    data:{
			    	parametro:"1:"+<?php echo trim(@$_GET["idreg"])?>
			    },
			    success: function (json){
			    	if(json!="error"){
				    	var obj = JSON.parse(json);
				    	var primero=false;
				    	for (var i = 0; i < obj.length; i++) {
				    		switch(obj[i].año) {
							    case '1':
							        document.getElementById("año1").removeAttribute("disabled");
							        primero=true;
							        break;
							    case '2':
							         document.getElementById("año2").removeAttribute("disabled");
							         primero=true;
							        break;
							    case '3':
							         document.getElementById("año3").removeAttribute("disabled");
							         primero=true;
							        break;
							    case '4':
							         document.getElementById("año4").removeAttribute("disabled");
							         primero=true;
							        break;        
							    case '5':
							         document.getElementById("año5").removeAttribute("disabled");
							         primero=true;
							        break;
							    case '6':
							         document.getElementById("año5").removeAttribute("disabled");
							         primero=true;
							        break;  
							    case '7':
							         document.getElementById("año5").removeAttribute("disabled");
							         primero=true;
							        break;            
							}
							if(primero==true & i==0){
								cambiar_Año(obj[i].año);
								año_activo();
							}
				    	};
			    	}
			    }
			});
		}
		function año_activo(){//background-color: #f4f4f4;
			switch(año) {
			    case '1':
			    	$("#año1").attr("class","btn_focus_anho_monitoreo");
+			    	$("#año2").attr("class","btn_habilitado_anho_monitoreo");
+			    	$("#año3").attr("class","btn_habilitado_anho_monitoreo");
+			    	$("#año4").attr("class","btn_habilitado_anho_monitoreo");
+			    	$("#año5").attr("class","btn_habilitado_anho_monitoreo");
+			    	$("#año6").attr("class","btn_habilitado_anho_monitoreo");
+			    	$("#año7").attr("class","btn_habilitado_anho_monitoreo");
			        break;
			    case '2':
			    	$("#año2").attr("class","btn_focus_anho_monitoreo");
+			    	$("#año1").attr("class","btn_habilitado_anho_monitoreo");
+			    	$("#año3").attr("class","btn_habilitado_anho_monitoreo");
+			    	$("#año4").attr("class","btn_habilitado_anho_monitoreo");
+			    	$("#año5").attr("class","btn_habilitado_anho_monitoreo");
+			    	$("#año6").attr("class","btn_habilitado_anho_monitoreo");
+			    	$("#año7").attr("class","btn_habilitado_anho_monitoreo");
			        break;
			    case '3':
		    		$("#año3").attr("class","btn_focus_anho_monitoreo");
+			    	$("#año1").attr("class","btn_habilitado_anho_monitoreo");
+			    	$("#año2").attr("class","btn_habilitado_anho_monitoreo");
+			    	$("#año4").attr("class","btn_habilitado_anho_monitoreo");
+			    	$("#año5").attr("class","btn_habilitado_anho_monitoreo");
+			    	$("#año6").attr("class","btn_habilitado_anho_monitoreo");
+			    	$("#año7").attr("class","btn_habilitado_anho_monitoreo");
			        break;
			    case '4':
			    	$("#año4").attr("class","btn_focus_anho_monitoreo");
+			    	$("#año1").attr("class","btn_habilitado_anho_monitoreo");
+			    	$("#año2").attr("class","btn_habilitado_anho_monitoreo");
+			    	$("#año3").attr("class","btn_habilitado_anho_monitoreo");
+			    	$("#año5").attr("class","btn_habilitado_anho_monitoreo");
+			    	$("#año6").attr("class","btn_habilitado_anho_monitoreo");
+			    	$("#año7").attr("class","btn_habilitado_anho_monitoreo");
			        break;        
			    case '5':
			    	$("#año5").attr("class","btn_focus_anho_monitoreo");
+			    	$("#año1").attr("class","btn_habilitado_anho_monitoreo");
+			    	$("#año2").attr("class","btn_habilitado_anho_monitoreo");
+			    	$("#año3").attr("class","btn_habilitado_anho_monitoreo");
+			    	$("#año4").attr("class","btn_habilitado_anho_monitoreo");
+			    	$("#año6").attr("class","btn_habilitado_anho_monitoreo");
+			    	$("#año7").attr("class","btn_habilitado_anho_monitoreo");
			        break;   
			    case '6':
			    	$("#año6").attr("class","btn_focus_anho_monitoreo");
+			    	$("#año1").attr("class","btn_habilitado_anho_monitoreo");
+			    	$("#año2").attr("class","btn_habilitado_anho_monitoreo");
+			    	$("#año3").attr("class","btn_habilitado_anho_monitoreo");
+			    	$("#año4").attr("class","btn_habilitado_anho_monitoreo");
+			    	$("#año5").attr("class","btn_habilitado_anho_monitoreo");
+			    	$("#año7").attr("class","btn_habilitado_anho_monitoreo");
			        break;   
			    case '7':
			    	$("#año5").attr("class","btn_focus_anho_monitoreo");
+			    	$("#año1").attr("class","btn_habilitado_anho_monitoreo");
+			    	$("#año2").attr("class","btn_habilitado_anho_monitoreo");
+			    	$("#año3").attr("class","btn_habilitado_anho_monitoreo");
+			    	$("#año4").attr("class","btn_habilitado_anho_monitoreo");
+			    	$("#año5").attr("class","btn_habilitado_anho_monitoreo");
+			    	$("#año6").attr("class","btn_habilitado_anho_monitoreo");
			        break;   
			} 
		}
		function abrirLlenado(){
			$.ajax({
				url:'vista/parciales/llenadoRCIA.php',
			    type:'POST',
			    data:{
			    	param:año
			    },
			    success: function (data){
			    	$("#contenedorprincipal").html(data)
			    }
			});
		}
		function abrirEvaluacion(){
			$.ajax({
				url:'vista/parciales/evaluacion.php',
			    type:'POST',
			     data:{
			    	param:año
			    },
			    success: function (data){
			    	$("#contenedorprincipal").html(data);
			    }
			});
		}
		function cambiar_Año(getaño){
			li_ocultar_tabs();
			año=getaño;
			$.ajax({
				url:'controlador/monitoreo.php',
			    type:'POST',
			    data:{
			    	parametro:"2:"+<?php echo trim(@$_GET["idreg"])?>+":"+getaño
			    },
			    success: function (json){
			    	if(json!="error"){
				    	var obj = JSON.parse(json);
				    	var primero=false;
				    	var ul = document.getElementById('ul_tabls_monitoreo');
				    	for (var i = 0; i < obj.length; i++) {
				    		switch(obj[i].tipo) {
							    case '266':
							    	var li = document.createElement("li");
							    	li.setAttribute("id","li_llenado");
							    	li.setAttribute("onclick","abrirLlenado();li_class_active('li_llenado')");
							    	li.setAttribute("value",obj[i].idmonitoreo);
							    	var a=document.createElement("a");
							    	a.setAttribute("href","#");
							    	a.innerHTML="LLenado RCIA";
							    	li.appendChild(a);
							    	ul.appendChild(li);
							        if(primero==false){
							        	abrirLlenado();
										li_class_active("li_llenado");
							        }
							        primero=true;
							    	break;
							    case '267':
							    	var li = document.createElement("li");
							    	li.setAttribute("id","li_evaluacion");
							    	li.setAttribute("onclick","abrirEvaluacion();li_class_active('li_evaluacion')");
							    	li.setAttribute("value",obj[i].idmonitoreo);
							    	var a=document.createElement("a");
							    	a.setAttribute("href","#");
							    	a.innerHTML="Evaluacion";
							    	li.appendChild(a);
							    	ul.appendChild(li);
							        if(primero==false){
							        	abrirLlenado();
										li_class_active("li_evaluacion");
							        }
							        primero=true;
						        	break;
							    case '268':
							    	var li = document.createElement("li");
							    	li.setAttribute("id","li_gabinete");
							    	li.setAttribute("onclick","abrirLlenado();li_class_active('li_gabinete')");
							    	li.setAttribute("value",obj[i].idmonitoreo);
							    	var a=document.createElement("a");
							    	a.setAttribute("href","#");
							    	a.innerHTML="Gabinete";
							    	li.appendChild(a);
							    	ul.appendChild(li);
							        if(primero==false){
										li_class_active("li_gabinete");
							        }
							        primero=true;
							    	break;
							    case '269':
							    	var li = document.createElement("li");
							    	li.setAttribute("id","li_campo");
							    	li.setAttribute("onclick","abrirLlenado();li_class_active('li_campo')");
							    	li.setAttribute("value",obj[i].idmonitoreo);
							    	var a=document.createElement("a");
							    	a.setAttribute("href","#");
							    	a.innerHTML="Campo";
							    	li.appendChild(a);
							    	ul.appendChild(li);
							        if(primero==false){
										li_class_active("li_campo");
							        }
							        primero=true;
							    	break;        
							}
				    	};
				    }
				}	
			});
		}
		function li_class_active(id){
			try{
				document.getElementById("li_llenado").removeAttribute("class");
			}catch(err){}

			try{
				document.getElementById("li_evaluacion").removeAttribute("class");
			}catch(err){}
			try{
				document.getElementById("li_gabinete").removeAttribute("class");
			}catch(err){}
			try{
				document.getElementById("li_campo").removeAttribute("class");
			}catch(err){}
			document.getElementById(id).setAttribute("class","active");
			idmonitoreo=document.getElementById(id).value;
		}
		function li_ocultar_tabs(){
			var ul=document.getElementById("ul_tabls_monitoreo");
			try{
				var li=document.getElementById("li_llenado");
				ul.removeChild(li);
			}catch(e){}
			try{
				var li=document.getElementById("li_evaluacion");
				ul.removeChild(li);
			}catch(e){}
			try{
				var li=document.getElementById("li_gabinete");
				ul.removeChild(li);
			}catch(e){}

			try{
				var li=document.getElementById("li_campo");
				ul.removeChild(li);
			}catch(e){}
		}
	</script>
</head> 
<body style="height: 75%;">
	<input id="idmonitoreo" type="hidden" value="">
	<div class="container" style="max-width:100%">
		<div class="col-sm-12">
			<div class="row">
				<fieldset class="for-panel">
		          	<div class="row">
		            	<div class="col-sm-6">
		             		<div class="form-horizontal">               
		                  		<label class="col-xs-5 control-label">Predio:</label>
		                  		<p class="form-control-static" id="nom_pre"></p>               
		                  		<label class="col-xs-5 control-label">Código:</label>
		                  		<p class="form-control-static" id="cod_reg"></p>               
		                    	<label class="col-xs-5 control-label">Superficie Total:</label>
		                    	<p class="form-control-static" id="sup_total"></p>                           
		              		</div>
		            	</div>
			            <div class="col-sm-6">
			              	<div class="form-horizontal">               
			                	<label class="col-xs-4 control-label">Superficie Alimentos: </label>
			                	<p class="form-control-static" id="sup_prod_alim"></p>             
			                	<label class="col-xs-4 control-label">Tipo de Propiedad:</label>
			                	<p class="form-control-static" id="tipo_prop" ></p>              
			                	<label class="col-xs-4 control-label">Tipo de actividad:</label>
			                	<p class="form-control-static" id="tipo_act"></p>             
			              </div>
			            </div>
		          	</div>
		        </fieldset>
			</div>
			<div class="row" align="center">
				<table id="anhos" style="width:100%; text-align: center;" border="1"></table>
			</div>
			<div class="row">
				<ul id="ul_tabls_monitoreo" class="nav nav-tabs">
				</ul>
			</div>
		</div>
	</div>
	<div id="contenedorprincipal" style="overflow-y: scroll;height: 100%;"></div>
</body>
</html>