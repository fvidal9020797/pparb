<?php
session_start();
?>
<html>
<head>
	<title></title>


	<script type="text/javascript">

		$(document).ready(function(){
			//isFuncionarioMonitoreo();
		   	mostrarActividades();
		   	mostrarsuperficies();
		});


///// FUNCION PARA MOSTRAR LOS TABS DE LAS ACTIVIDADES SEGUN CORRESPONDA //////
		function mostrarsuperficies()
		{
			//alert('aqui');

			$.ajax({
				url:'../Registro/controlador/superficiealimentos.php',
			    type:'POST',
			    data:{
			    	parametro:'1:'+idreg

			    },
			    success: function (json){

			    	//alert(json);
			    	var supalim = JSON.parse(json);


			    	document.getElementById("supagri").innerHTML= supalim[0].supagricola;
			    	document.getElementById("supgan").innerHTML= supalim[0].supganadera;
			    	document.getElementById("supganlegal").innerHTML= supalim[0].supganlegal;
			    	document.getElementById("supbarbecho").innerHTML= supalim[0].supbarbecho;
			    	document.getElementById("supdescanso").innerHTML= supalim[0].supdescanso;
			    				
			    }
			});

		}


		function mostrarActividades(){

			var ul = document.getElementById('ul_actividades');
			switch (actividad){
				
				case 'Agricola':
					var li = document.createElement("li");
					li.setAttribute("class","active");
					var a=document.createElement("a");
					a.setAttribute("data-toggle","tab");
					a.setAttribute("href","#agricola1");
					a.setAttribute("onclick","tag_vertical('1')");
					a.innerHTML= actividad;
					li.appendChild(a);
					ul.appendChild(li);
				break;

				case 'Ganadera':
					var li = document.createElement("li");
					li.setAttribute("class","active");
					var a=document.createElement("a");
					a.setAttribute("data-toggle","tab");
					a.setAttribute("href","#ganadera1");
					a.setAttribute("onclick","tag_vertical('2')");
					a.innerHTML= actividad;
					li.appendChild(a);
					ul.appendChild(li);
				break;

				case 'Ganadera Lechera':
					var li = document.createElement("li");
					li.setAttribute("class","active");
					var a=document.createElement("a");
					a.setAttribute("data-toggle","tab");
					a.setAttribute("href","#ganaderlechera1");
					a.setAttribute("onclick","tag_vertical('3')");
					a.innerHTML= actividad;
					li.appendChild(a);
					ul.appendChild(li);
				break;

				case 'Agricola-Avicola':
					var li = document.createElement("li");
					li.setAttribute("class","active");
					var a=document.createElement("a");
					a.setAttribute("data-toggle","tab");
					a.setAttribute("href","#agricolaavicola1");
					a.setAttribute("onclick","tag_vertical('4')");
					a.innerHTML= actividad;
					li.appendChild(a);
					ul.appendChild(li);
				break;

				case 'Agricola-Porcina':
					var li = document.createElement("li");
					li.setAttribute("class","active");
					var a=document.createElement("a");
					a.setAttribute("data-toggle","tab");
					a.setAttribute("href","#agricolaavicola1");
					a.setAttribute("onclick","tag_vertical('5')");
					a.innerHTML= actividad;
					li.appendChild(a);
					ul.appendChild(li);
				break;

				case 'Mixta Agropecuaria':


					for (var i = 0; i < 3; i++) {
						var li = document.createElement("li");
						if(i==0){
							li.setAttribute("class","active");
						}
						var a=document.createElement("a");
						a.setAttribute("data-toggle","tab");
						var lechera=true;
						switch (i){
							case 0:
								a.setAttribute("onclick","tag_vertical('1');");
								a.innerHTML="Agricola";
							break;
							case 1:
								a.setAttribute("onclick","tag_vertical('2');");
								a.innerHTML="Ganadera";
							break;
							case 2:
								a.setAttribute("onclick","tag_vertical('3');");
								a.innerHTML="Ganadera Lechera"
							break;

						};

						if(i==2 & lechera){
							li.appendChild(a);
							ul.appendChild(li);
						}else if(i!=2){
							li.appendChild(a);
							ul.appendChild(li);
						} 

					};
				break;
			}
		}


		function tag_vertical(tagid){

			ocultar_div_actividades();
			eliminarFilasTablas();
			

			switch (tagid){
				case '1':
					cargar_combo_cultivo_nc();
					tipoActividad=70;
					cargar_actividades_llenado_rcia();
					cargar_linea_base_agricola();
					cargar_cultivos_agricola();
					$("#div_llenado_agricola").css({"display":"block"});
					document.getElementById("actividades_a_monitorear").appendChild(document.getElementById("div_llenado_agricola"));
					//document.getElementById("ano_actividades_agricola").innerHTML= "AÑO " + anio ;
				break;

				case '2':
					tipoActividad=71;
					cargar_actividades_llenado_rcia();
					cargar_sistemas_produccion_linea_base();
					cargar_linea_base_compromiso_ano();
					$("#div_llenado_ganadero").css({"display":"block"});
					document.getElementById("actividades_a_monitorear").appendChild(document.getElementById("div_llenado_ganadero"));
				break;


				case '3':
					tipoActividad=101;
					cargar_actividades_llenado_rcia();
					cargar_sistemas_produccion_linea_base();
					cargar_linea_base_compromiso_ano();
					$("#div_llenado_ganadero_lechero").css({"display":"block"});
					document.getElementById("actividades_a_monitorear").appendChild(document.getElementById("div_llenado_ganadero_lechero"));
				break;


				case '4':
					tipoActividad=229;	
					cargar_sistemas_produccion_linea_base();
					$("#div_llenado_agricola_avicola").css({"display":"block"});
					document.getElementById("actividades_a_monitorear").appendChild(document.getElementById("div_llenado_agricola_avicola"));
					
				break;


				case '5':
					tipoActividad=230;	
					cargar_sistemas_produccion_linea_base();
					$("#div_llenado_agricola_porcino").css({"display":"block"});
					document.getElementById("actividades_a_monitorear").appendChild(document.getElementById("div_llenado_agricola_porcino"));
					
				break;




			}
		}



///// FUNCIONES PARA CARGAR LAS TABLAS DEL LLENADO DE RCIA 
		function cargar_actividades_llenado_rcia(){

			$.ajax({
				url:'controlador/codificadores.php',
			    type:'POST',
			    data:{
			    	parametro:'2:'+tipoActividad+':36'

			    },
			    success: function (json){

			    	construir_tabla_actividades_rcia(json,tipoActividad);
			    				
			    }
			});
		}


		function construir_tabla_actividades_rcia(json,actividad){

			var listActividad=JSON.parse(json); 

			var anio = parseInt(año)+2013;

			
			if (actividad == 70) 
			{
				var table = document.getElementById('table_actividades_agricola');
			}
			else if (actividad == 71)
			{
				var table = document.getElementById('table_actividades_ganadero');
			}
			else if (actividad == 101)
			{
				var table = document.getElementById('table_actividades_lechero');
			}


			

			for (var i = 0; i <= listActividad.length; i++) {

					var row = table.insertRow(table.rows.length);

					if (i==0) 
					{
						var cell01 = row.insertCell(0);
					    var element01 = document.createElement("label");
					    element01.innerHTML="ACTIVIDADES";
					    cell01.appendChild(element01);

					    var cell02 = row.insertCell(1);
					    var element02 = document.createElement("label");
					    element02.innerHTML="AÑO " + anio;
					    cell02.appendChild(element02);

					}
					else
					{
						var cell1 = row.insertCell(0);
					    var element1 = document.createElement("label");
					    element1.innerHTML=listActividad[i-1].nombrecodificador;
					    cell1.appendChild(element1);

					    var cell2 = row.insertCell(1); 
						var element2 = document.createElement("select");
						element2.name =listActividad[i-1].nombrecodificador+i;
						element2.id=listActividad[i-1].nombrecodificador+i;
						element2.options[0]=new Option("NO","0");
						element2.options[1]=new Option("SI","1");
						element2.setAttribute('required','required');
						cell2.appendChild(element2);

					}



			}  

		}


		///////
		function cargar_sistemas_produccion_linea_base(){

			var ta = 0;

			if (tipoActividad == 71) // es ganadero
			{
				ta = 13;
			}
			else if (tipoActividad == 101) // es lechero
			{
				ta = 27;
			}
			else if (tipoActividad == 229 ) // es avicola
			{
				ta = 29;
			}
			else if (tipoActividad == 230 ) // es porcino
			{
				ta = 30;
			}
			

			$.ajax({


				url:'../Registro/controlador/sistprodganadera.php',
			    type:'POST',
			    data:{
			    	parametro:'1:'+idreg+':'+ta

			    },
			    success: function (json){

			    	//alert(json);
			    	construir_tabla_sistemas_produccion_rcia(json,tipoActividad);
			    				
			    }
			});
		}


		function construir_tabla_sistemas_produccion_rcia(json,actividad){

			var listSistemas=JSON.parse(json); 

			var anio = parseInt(año)+2013;

			
			if (actividad == 71)
			{
				var table = document.getElementById('table_sistemas_ganadero');
			}
			else if (actividad == 101)
			{
				var table = document.getElementById('table_sistemas_lechero');
			}
			else if (actividad == 229)
			{
				var table = document.getElementById('table_sistemas_avicola');
			}
			else if (actividad == 230)
			{
				var table = document.getElementById('table_sistemas_porcino');
			}



			for (var i = 0; i <= listSistemas.length; i++) {

					var row = table.insertRow(table.rows.length);

					if (i==0) 
					{
						var cell01 = row.insertCell(0);
					    var element01 = document.createElement("label");
					    element01.innerHTML="SISTEMAS PRODUCTIVOS";
					    cell01.appendChild(element01);

					    var cell02 = row.insertCell(1);
					    var element02 = document.createElement("label");
					    element02.innerHTML="LINEA BASE";
					    cell02.appendChild(element02);

					    var cell03 = row.insertCell(2);
					    var element03 = document.createElement("label");
					    element03.innerHTML="AÑO " + anio;
					    cell03.appendChild(element03);

					}
					else
					{
						var cell1 = row.insertCell(0);
					    var element1 = document.createElement("label");
					    element1.innerHTML=listSistemas[i-1].nombrecodificador;
					    cell1.appendChild(element1);

					    var cell2 = row.insertCell(1); 
						var element2 = document.createElement("label");
						element2.innerHTML=listSistemas[i-1].cantidad;
						cell2.appendChild(element2);

						var cell3 = row.insertCell(2); 
						var element3 = document.createElement("input");
						element3.setAttribute("id","ejecutado_"+listSistemas[i-1].nombrecodificador);
						element3.setAttribute("onkeypress","return blockNonNumbers(this, 3, false)");
						element3.setAttribute("onkeyup","return extractNumber(this,event, 3, false)");
						element3.setAttribute("onkeypress","return blockNonNumbers(this,event,false,false)");
						cell3.appendChild(element3);
					}

			}  

		}





		///// compromisos linea base
			function cargar_linea_base_compromiso_ano(){

			if (tipoActividad == 71)
			{
			
				$.ajax({
				url:'../Registro/controlador/planproduccionganadera.php',
			    type:'POST',
			    data:{
			    	parametro:'2:'+idreg+':'+año

			    },
			    success: function (json){

			    	construir_tabla_linea_base_compromiso_ganadera(json);
			    				
			    }

				});


			}
			else if (tipoActividad == 101)
			{
				$.ajax({
				url:'../Registro/controlador/planganaderalechera.php',
			    type:'POST',
			    data:{
			    	parametro:'2:'+idreg+':'+año

			    },
			    success: function (json){
			    	
			    	construir_tabla_linea_base_compromiso_lechera(json);
			    				
			    }

				});


			}


		}



		function construir_tabla_linea_base_compromiso_ganadera(json){

			var lineacompromisoganadero=JSON.parse(json);


			var anio = parseInt(año)+2013;


			var table = document.getElementById('table_linea_base_ganadero'); 


			for (var i = 0; i <= lineacompromisoganadero.length; i++) {

					var row = table.insertRow(table.rows.length);



					if (i==0) 
					{
						var cell01 = row.insertCell(0);
					    var element01 = document.createElement("label");
					    element01.innerHTML="INDICADORES";
					    cell01.appendChild(element01);

					    var cell02 = row.insertCell(1);
					    var element02 = document.createElement("label");
					    element02.innerHTML="LINEA BASE";
					    cell02.appendChild(element02);


					    var cell03 = row.insertCell(2);
					    var element03 = document.createElement("label");
					    element03.innerHTML="COMPROMETIDO "+anio;
					    cell03.appendChild(element03);

					    var cell04 = row.insertCell(3);
					    var element04 = document.createElement("label");
					    element04.innerHTML="EJECUTADO "+anio;
					    cell04.appendChild(element04);
					}
					else
					{
						var cell1 = row.insertCell(0);
					    var element1 = document.createElement("label");
					    element1.innerHTML=lineacompromisoganadero[i-1].indicador;
					    cell1.appendChild(element1);

					    if (i==2)
					    {
					    	var cell2 = row.insertCell(1);
					    	var element2 = document.createElement("label");
					    	element2.innerHTML=Math.round(parseFloat(lineacompromisoganadero[i-1].lineabase) *10000)/10000;
					    	cell2.appendChild(element2);  
					    }
					    else
					    {
					    	var cell2 = row.insertCell(1);
					    var element2 = document.createElement("label");
					    element2.innerHTML= (lineacompromisoganadero[i-1].lineabase);
					    cell2.appendChild(element2);
	
					    }

						

						var cell3 = row.insertCell(2);
					    var element3 = document.createElement("label");
					    element3.innerHTML=lineacompromisoganadero[i-1].compromisoano;
					    cell3.appendChild(element3);


					    if (i==2)
					    {
					    	var cell4 = row.insertCell(3);
						    var element4 = document.createElement("input");
						    element4.setAttribute("id","ejecutado_"+lineacompromisoganadero[i-1].indicador);
							element4.setAttribute("onkeypress","return blockNonNumbers(this,event, true, false)");
							element4.setAttribute("onkeyup","return extractNumber(this, 4, false)");
						    cell4.appendChild(element4);

					    }


					    else if(i==1)
					    {
					    	var cell4 = row.insertCell(3);
						    var element4 = document.createElement("label");
						    element4.innerHTML="-";
						    cell4.appendChild(element4);
					    }

					    else
					    {	


					    	var cell4 = row.insertCell(3);
						    var element4 = document.createElement("input");
						    element4.setAttribute("id","g_ejecutado_"+lineacompromisoganadero[i-1].indicador);
							element4.setAttribute("onkeypress","return blockNonNumbers(this,event,false,false)");
						    cell4.appendChild(element4);

					    }



					}

			}  

		}





			function construir_tabla_linea_base_compromiso_lechera(json){

			var lineacompromisoganadero=JSON.parse(json);


			var anio = parseInt(año)+2013;


			var table = document.getElementById('table_linea_base_lechero'); 


			for (var i = 0; i <= lineacompromisoganadero.length; i++) {

					var row = table.insertRow(table.rows.length);



					if (i==0) 
					{
						var cell01 = row.insertCell(0);
					    var element01 = document.createElement("label");
					    element01.innerHTML="INDICADORES";
					    cell01.appendChild(element01);

					    var cell02 = row.insertCell(1);
					    var element02 = document.createElement("label");
					    element02.innerHTML="LINEA BASE";
					    cell02.appendChild(element02);


					    var cell03 = row.insertCell(2);
					    var element03 = document.createElement("label");
					    element03.innerHTML="COMPROMETIDO "+anio;
					    cell03.appendChild(element03);

					    var cell04 = row.insertCell(3);
					    var element04 = document.createElement("label");
					    element04.innerHTML="EJECUTADO "+anio;
					    cell04.appendChild(element04);
					}
					else
					{
						var cell1 = row.insertCell(0);
					    var element1 = document.createElement("label");
					    element1.innerHTML=lineacompromisoganadero[i-1].indicador;
					    cell1.appendChild(element1);

					    if (i==2)
					    {
					    	var cell2 = row.insertCell(1);
					    	var element2 = document.createElement("label");
					    	element2.innerHTML=Math.round(parseFloat(lineacompromisoganadero[i-1].lineabase) *10000)/10000;
					    	cell2.appendChild(element2);  
					    }
					    else
					    {
					    	var cell2 = row.insertCell(1);
					    var element2 = document.createElement("label");
					    element2.innerHTML= (lineacompromisoganadero[i-1].lineabase);
					    cell2.appendChild(element2);
	
					    }

						

						var cell3 = row.insertCell(2);
					    var element3 = document.createElement("label");
					    element3.innerHTML=lineacompromisoganadero[i-1].compromisoano;
					    cell3.appendChild(element3);


					    if (i==2)
					    {
					    	var cell4 = row.insertCell(3);
						    var element4 = document.createElement("input");
						    element4.setAttribute("id","ejecutado_"+lineacompromisoganadero[i-1].indicador);
							element4.setAttribute("onkeypress","return blockNonNumbers(this,event, true, false)");
							element4.setAttribute("onkeyup","return extractNumber(this, 4, false)");
						    cell4.appendChild(element4);

					    }
					    else if(i==1)
					    {
					    	var cell4 = row.insertCell(3);
						    var element4 = document.createElement("label");
						    element4.innerHTML="-";
						    cell4.appendChild(element4);
					    }

					    else
					    {	


					    	var cell4 = row.insertCell(3);
						    var element4 = document.createElement("input");
						    element4.setAttribute("id","l_ejecutado_"+lineacompromisoganadero[i-1].indicador);
							element4.setAttribute("onkeypress","return blockNonNumbers(this,event,false,false)");
						    cell4.appendChild(element4);

					    }



					}

			}  

		}


		function cargar_linea_base_agricola(){

				$.ajax({
				url:'../Registro/controlador/plancultivo.php',
			    type:'POST',
			    data:{
			    	parametro:'1:'+idreg+':0'

			    },
			    success: function (json){
			    	
			    	construir_tabla_linea_base_agricola(json);
			    				
			    }

				});

		}



		function construir_tabla_linea_base_agricola(json){

			var listLineaAgricola=JSON.parse(json); 

			var table = document.getElementById('table_linea_base_agricola');
			



			for (var i = 0; i <= listLineaAgricola.length; i++) {

					var row = table.insertRow(table.rows.length);

					if (i==0) 
					{
						var cell01 = row.insertCell(0);
					    var element01 = document.createElement("label");
					    element01.innerHTML="CULTIVO";
					    cell01.appendChild(element01);

					    var cell02 = row.insertCell(1);
					    var element02 = document.createElement("label");
					    element02.innerHTML="Sup. Cultivada Verano (Ha)";
					    cell02.appendChild(element02);

					    var cell03 = row.insertCell(2);
					    var element03 = document.createElement("label");
					    element03.innerHTML="Sup. Cultivada Invierno (Ha)";
					    cell03.appendChild(element03);

					}
					else
					{
						var cell1 = row.insertCell(0);
					    var element1 = document.createElement("label");
					    element1.innerHTML=listLineaAgricola[i-1].nombrecultivo;
					    cell1.appendChild(element1);

					    var cell2 = row.insertCell(1); 
						var element2 = document.createElement("label");
						element2.innerHTML=listLineaAgricola[i-1].supverano;
						cell2.appendChild(element2);

					    var cell3 = row.insertCell(2); 
						var element3 = document.createElement("label");
						element3.innerHTML=listLineaAgricola[i-1].supinvierno;
						cell3.appendChild(element3);
					}

			}  

		}


		/////

		function cargar_cultivos_agricola(){

				$.ajax({
				url:'../Registro/controlador/plancultivo.php',
			    type:'POST',
			    data:{
			    	parametro:'1:'+idreg+':'+año

			    },
			    success: function (json){
			    	//alert(json);
			    	construir_tabla_compromiso_agricola(json);
			    				
			    }

				});

		}


		function construir_tabla_compromiso_agricola(json){

			var listLcCultivosAgricola=JSON.parse(json); 

			var table = document.getElementById('table_cultivos_agricolas');
			



			for (var i = 0; i <= listLcCultivosAgricola.length; i++) {

					var row = table.insertRow(table.rows.length);

					if (i==0) 
					{
						var cell01 = row.insertCell(0);
					    var element01 = document.createElement("label");
					    element01.innerHTML="CULTIVO";
					    cell01.appendChild(element01);

					    var cell02 = row.insertCell(1);
					    var element02 = document.createElement("label");
					    element02.innerHTML="CULTIVO PEREMNE";
					    cell02.appendChild(element02);

					    var cell03 = row.insertCell(2);
					    var element03 = document.createElement("label");
					    element03.innerHTML="DESCRIPCION";
					    cell03.appendChild(element03);

					    var cell04 = row.insertCell(3);
					    var element04 = document.createElement("label");
					    element04.innerHTML="VERANO";
					    cell04.appendChild(element04);

					    var cell05 = row.insertCell(4);
					    var element05 = document.createElement("label");
					    element05.innerHTML="INVIERNO";
					    cell05.appendChild(element05);

					    var cell06 = row.insertCell(5);
					    var element06 = document.createElement("label");
					    element06.innerHTML="PERENNE";
					    cell06.appendChild(element06);

					}
					else
					{
						var cell1 = row.insertCell(0);
					    var element1 = document.createElement("label");
					    element1.innerHTML=listLcCultivosAgricola[i-1].nombrecultivo;
					    cell1.setAttribute("rowspan","4");
					    cell1.appendChild(element1);

					    var cell2 = row.insertCell(1);
					    var element2 = document.createElement("input");
					    element2.type="checkbox";
					    cell2.setAttribute("rowspan","4");
					    cell2.appendChild(element2);

						for (var j = 1; j <= 3; j++) {
					    	

								if (j==1) 
								{
									row = table.insertRow(table.rows.length);
									var cell01 = row.insertCell(0);
								    var element01 = document.createElement("label");
								    element01.innerHTML="COMPROMETIDO";
								    cell01.appendChild(element01);

								    var cell02 = row.insertCell(1);
								    var element02 = document.createElement("label");
								    element02.innerHTML=listLcCultivosAgricola[i-1].supverano;
								    cell02.appendChild(element02);

								    var cell03 = row.insertCell(2);
								    var element03 = document.createElement("label");
								    element03.innerHTML=listLcCultivosAgricola[i-1].supinvierno;
								    cell03.appendChild(element03);

								    var cell04 = row.insertCell(3);
								    var element04 = document.createElement("label");
								    element04.innerHTML="-";
								    cell04.appendChild(element04);
								}

								else
								{
									if(j==2)
									{
										row = table.insertRow(table.rows.length);
										var cell01 = row.insertCell(0);
									    var element01 = document.createElement("label");
									    element01.innerHTML="EJECUTADO";
									    cell01.appendChild(element01);
									}
									else if(j==3)
									{
										row = table.insertRow(table.rows.length);
										var cell01 = row.insertCell(0);
									    var element01 = document.createElement("label");
									    element01.innerHTML="PRODUCCION OBTENIDA EN KG.";
									    cell01.appendChild(element01);
									}

									    var cell02 = row.insertCell(1);
									    var element02 = document.createElement("input");
									    element02.setAttribute("onkeypress","return blockNonNumbers(this,event, true, false)");
										element02.setAttribute("onkeyup","return extractNumber(this, 4, false)");
									    cell02.appendChild(element02);

									    var cell03 = row.insertCell(2);
									    var element03 = document.createElement("input");
									    element03.setAttribute("onkeypress","return blockNonNumbers(this,event, true, false)");
										element03.setAttribute("onkeyup","return extractNumber(this, 4, false)");
									    cell03.appendChild(element03);

									    var cell04 = row.insertCell(3);
									    var element04 = document.createElement("input");
									    element04.setAttribute("onkeypress","return blockNonNumbers(this,event, true, false)");
										element04.setAttribute("onkeyup","return extractNumber(this, 4, false)");
									    cell04.appendChild(element04);

								}
								  

					    } 

					}

			}  

		}





	   	function ocultar_div_actividades() {
    		$("#div_llenado_agricola").css({"display":"none"});
    		$("#div_llenado_ganadero").css({"display":"none"});
    		$("#div_llenado_ganadero_lechero").css({"display":"none"});
    		$("#div_llenado_agricola_avicola").css({"display":"none"});
    		$("#div_llenado_agricola_porcino").css({"display":"none"});
    	}




    	function isFuncionarioMonitoreo(){
			$.ajax({
				url:'controlador/funcionarioMonitoreo.php',
			    type:'POST',
			    async:false,
			    data:{
			    	parametro:'1:'+idmonitoreo+':'+<?php echo $_SESSION['MM_UserId'];?>
			    },
			    success: function(json){
			    	var obj=JSON.parse(json);
			    	Object.keys(obj).length!=2 ? BotonesGuardado(true) : BotonesGuardado(false);
			    }
			});
    	}


    	function BotonesGuardado(guardar){
    		if(guardar){
				$("#btnGuardadoGanaderaLechera").css({"display":"block"});
				$("#btnGuardadoInforme").css({"display":"block"});
				$("#btnGenerarCite").css({"display":"block"});

			}else{
				$("#btnGuardadoGanaderaLechera").css({"display":"none"});
				$("#btnGuardadoInforme").css({"display":"none"});
				$("#btnGenerarCite").css({"display":"none"});
			}
    	}


    	function eliminarFilasTablas() {
    		$.each($('#table_actividades_agricola tbody tr'),function(){
    		   		$(this).remove();		
	    	});

    		$.each($('#table_actividades_ganadero tbody tr'),function(){
    		   		$(this).remove();			
	    	});

    		$.each($('#table_actividades_lechero tbody tr'),function(){
    		   		$(this).remove();		
	    	});

	    	$.each($('#table_sistemas_ganadero tbody tr'),function(){
    		   		$(this).remove();		
	    	});

	    	$.each($('#table_sistemas_lechero tbody tr'),function(){
    		   		$(this).remove();		
	    	});

	    	$.each($('#table_sistemas_avicola tbody tr'),function(){
    		   		$(this).remove();		
	    	});

	    	$.each($('#table_sistemas_porcino tbody tr'),function(){
    		   		$(this).remove();		
	    	});

	    	$.each($('#table_linea_base_ganadero tbody tr'),function(){
    		   		$(this).remove();		
	    	});

	    	$.each($('#table_linea_base_lechero tbody tr'),function(){
    		   		$(this).remove();		
	    	});

	    	$.each($('#table_linea_base_agricola tbody tr'),function(){
    		   		$(this).remove();		
	    	});

	    	$.each($('#table_cultivos_agricolas tbody tr'),function(){
    		   		$(this).remove();		
	    	});



    	}



    	function cargar_combo_cultivo_nc()
    	{
    		$.ajax({
				url:'../Registro/controlador/cultivo.php',
			    type:'POST',
			    data:{
			    	parametro:'2'

			    },
			    success: function (json){

			    	var listacultivos = JSON.parse(json);

			    	var combo = document.getElementById("combocultivonc");

					combo.options[0]=new Option("Elegir...","0");

					for(i=1;i<listacultivos.length ;i++)
        			{
						combo.options[i]= new Option(listacultivos[i-1].nombrecultivo,listacultivos[i-1].idcultivo); 
					}
			    				
			    }
			});

    	}

    	function agregar_cultivo_no_comprometido(num_fila) 
    	{


    		var table = document.getElementById("table_cultivos_agricolas_no_comprometidos");
 			var cantidadfilas = table.rows.length;
			var row = table.insertRow(cantidadfilas);

			
			//var oculto=document.getElementById(num_fila);
			var oculto=num_fila;
			oculto.value=parseInt(oculto.value)+1;


			var cell1 = row.insertCell(0);   //celda 1
			cell1.setAttribute("rowspan","2");
		    var element1 = document.createElement("input");
			element1.type = "checkbox";
	      	cell1.appendChild(element1); 


      		var cell2 = row.insertCell(1);   //celda2
			cell2.setAttribute("rowspan","2");
		  	var element2 = document.createElement("select");

			element2.setAttribute("class","combos");
			element2.name ="cultivonocomp"+String(oculto.value );
			element2.id="cultivonocomp"+String(oculto.value );
			for(i=0;i<document.getElementById('combocultivonc').length ;i++)
        	{
				element2.options[i]=new Option(document.getElementById('combocultivonc').options[i].text, document.getElementById('combocultivonc').options[i].value);
			}
		    element2.setAttribute('class','boxBusqueda3');
			//element2.setAttribute('onChange',"duplicado2(this,"+String(oculto.value)+')');
			cell2.appendChild(element2);


			var cell3 = row.insertCell(2);   //celda 3
			cell3.setAttribute("rowspan","2");
		    var element3 = document.createElement("input");
			element3.type = "checkbox";
	      	cell3.appendChild(element3); 


	      	var cell4 = row.insertCell(3);   
			var element4 = document.createElement("label");
			element4.innerHTML = "EJECUTADO";
			cell4.appendChild(element4);


			var cell5 = row.insertCell(4);  
			var element5 = CreateText("SupVeranoncE"+String(oculto.value ));
			element5.value = 0;
			cell5.appendChild(element5);

			var cell6 = row.insertCell(5);   //celda 3
			var element6 = CreateText("SupIviernoncE"+String(oculto.value ));
			element6.value = 0;
			cell6.appendChild(element6);

			var cell7 = row.insertCell(6);   //celda 3
			var element7 = CreateText("SupPeremnencE"+String(oculto.value ));
			element7.value = 0;
			cell7.appendChild(element7);



    		var table = document.getElementById("table_cultivos_agricolas_no_comprometidos");
 			var cantidadfilas = table.rows.length;

 			//alert(cantidadfilas);
			var row = table.insertRow(cantidadfilas);
			var oculto=num_fila+1;

			//alert(oculto);
			oculto.value=parseInt(oculto.value);  



			var cell1 = row.insertCell(0);   //cel
			cell1.setAttribute("style","display:none");

			var cell2 = row.insertCell(1);   //celda
			cell2.setAttribute("style","display:none");

			var cell3 = row.insertCell(2);   //celda
			cell3.setAttribute("style","display:none");


			var cell4 = row.insertCell(3);
			var element4 = document.createElement("label");
			element4.innerHTML = "PRODUCCION OBTENIDA EN KG.";
			cell4.appendChild(element4);



			var cell5 = row.insertCell(4);  
			var element5 = CreateText("Veranokgnc"+String(oculto.value ));
			element5.value = 0;
			cell5.appendChild(element5);

			var cell6 = row.insertCell(5);   //celda 3
			var element6 = CreateText("Inviernokgnc"+String(oculto.value ));
			element6.value = 0;
			cell6.appendChild(element6);

			var cell7 = row.insertCell(6);   //celda 3
			var element7 = CreateText("Peremnekgnc"+String(oculto.value ));
			element7.value = 0;
			cell7.appendChild(element7);




    	}


    	function CreateText(num1){
		    var element = document.createElement("input");
			element.type = "text";
			element.name =String(num1);//3"+String(rowCount + 1);
			element.id=String(num1);//3"+String(rowCount + 1);
			element.setAttribute('size', '15');
			element.setAttribute('onBlur', 'extractNumber(this,4,false)');
			element.setAttribute('onkeypress','blockNonNumbers(this, event, true, false)');
			element.setAttribute('onkeyup','extractNumber(this,4,false)');
			element.setAttribute('class','boxBusqueda4');
		     return element;
		   }



		 function eliminar_cultivo_no_compromedido(tableID) {    
    
			tab = document.getElementById(tableID);
			 
			       var id_select="";
			       var value_select="";
			   $('#dataTable4 tbody tr').each(function (index2) {
			       
			       var pksw = $(this).find("td").eq(0).find("input").eq(0).is(':checked');
			        var pk = $(this).find("td").eq(0).find("input").eq(0).attr("id");
			        var nombre = $(this).find("td").eq(1).find("select").eq(0).attr("id");
			         
			         if(pksw){
			            // alert("si chekc");
			            id_select= $(this).find("td").eq(1).find("select").eq(0).attr("id");
			            value_select = $(this).find("td").eq(1).find("select").eq(0).val();
			            //alert(value_select);
			            varEliminados.push(value_select);
			         }			        
			    }); 
			        
			 
				try {
			            var table = document.getElementById(tableID);
			            var rowCount = table.rows.length;
			            var indice=1;

			                      for(var i=0; i<rowCount; i++) {
			                        
			                                            var row = table.rows[i];
			                                            var chkbox = row.cells[0].childNodes[0];
			                                            row.cells
			                                            if(null != chkbox && true == chkbox.checked) {
			                                                     var cbocultivo = row.cells[1].childNodes[0];
			                                                
			                                                    table.deleteRow(i+1);
			                                                    table.deleteRow(i);
			                                                    rowCount = rowCount - 2;
			                                                    i = i - 2;
			                                                    indice=indice+1;
			                                            }
			                                     }  
			            }catch(e) {
			                    alert(e);
			            }



			//document.getElementById("celiminados").value=varEliminados;




			}



	</script>
</head>



<body>
	<div class="container">
		<div class="col-sm-12"  style="border-style: solid;border-color: #000;">
			<div class="row" align="center">
				<h3>FORMULARIO DE REPORTE DE CUMPLIMIENTO INDIVIDUAL ANUAL (RCIA)</h3>
			</div>

			<div class="row">
				<div class="col-sm-12">
					    <label>USO ACTUAL EN ÁREAS DEFORESTADAS ILEGALES Y/O PAS. (Ha.)</label>
				</div>

				<div class="col-sm-12">
					<table cellspacing="0" border="1">
						<tr>
							<td>AGRICOLA : </td>
							<td><label id="supagri"></td>
							<td>GANADERO : </td>
							<td><label id="supgan"></td>
							<td>GANADERO TOTAL : </td>
							<td><label id="supganlegal"></td>
							<td>BARBECHO : </td>
							<td><label id="supbarbecho"></td>
							<td>DESCANSO : </td>
							<td><label id="supdescanso"></td>
						</tr>
					</table>
					
				</div>


			</div>


			<div class="row">
				<div class="col-sm-6">
					<div class="checkbox">
					    <label><input id="check2" type="checkbox" value=""  data-toggle="collapse" data-target="#demo2">ACTIVIDADES</label>
					</div>
				</div>

				<div id="demo2" class="collapse out">
					<div class="col-sm-12">
						<div class="row">
					  		<div class="col-sm-2"  id="div_tag_anexos">
					            <ul id="ul_actividades" class="nav nav-tabs tabs-left" style="cursor: pointer;"></ul>
							</div>
							<div id="actividades_a_monitorear" class="col-sm-8"></div>
						</div>
					</div>
				</div>

			</div>



			<div class="row">
				<div class="col-sm-6">
					    <label>OBSERVACIONES LLENADO RCIA</label>
				</div>

				<div class="col-sm-12" >
					<div class="row">
						<div id="demo1">
						  	<textarea style="width:100%" ></textarea>
						</div>
					</div>
				</div>

			</div>

			<div class="row">
				<button id="" type="button" onclick="" class="btn btn-primary">GUARDAR LLENADO</button>
			</div>
		</div>
	</div>



   	<div id="div_llenado_agricola" style="display:none">

   			<div class="row">
   				<h3>ACTIVIDAD AGRICOLA</h3> 

				<div class="col-sm-12">
					    <label>SITUACION AGRÍCOLA EN AREAS DEFORESTADAS ILEGALES Y/O P.A.S (Linea Base)</label>
					    		<table id="table_linea_base_agricola" border="1">
						    	</table>
				</div>

				<div class="col-sm-12">
					    <label>ACTIVIDADES REALIZADAS EN LA SUPERFICIE DEFORESTADA ILEGAL Y/O P.A.S</label>
					    		<table id="table_actividades_agricola" border="1">
						    	</table>
				</div>

				<div class="col-sm-12">
					    <label>SUPERFICIE CULTIVADA Y RESULTADOS ALCANZADOS</label>
					    
					    <div> 
					    	<table>
						    <td>
						    	Superficie Produccion Agricola para la Gestion:
						    </td>
						    <td>
						    	<input id='SuperficieAgricolaAno' name='SuperficieAgricolaAno' value='0' 
						    	onkeypress="return blockNonNumbers(this,event, true, false)"
						        onkeyup="return extractNumber(this, 4, false)"> </input>
						    </td>
						    </table>
					    </div>
					    
					    <div>
					    	<table id="table_cultivos_agricolas" border="1">
							</table>
					    </div>

					    	<br>
   					    <div>
					    	 <button id="" type="button" onclick="agregar_cultivo_no_comprometido(1);" class="btn btn-primary">Agregar Cultivo No Comprometido</button>
					    	 <button id="" type="button" onclick="eliminar_cultivo_no_compromedido('table_cultivos_agricolas_no_comprometidos')" class="btn btn-primary">Quitar Cultivo No Comprometido</button>
					    </div>

					    <div>
					    	<h6>CULTIVOS NO COMPROMETIDOS</h6>
					    	<table id="table_cultivos_agricolas_no_comprometidos" border="1">
					    		<tbody>
					    			<tr>
					    			   <td><label></label></td>
					    			   <td><label>CULTIVO</label></td>
					    			   <td><label>CULTIVO PEREMNE</label></td>
					    			   <td><label>DESCRIPCION</label></td>
					    			   <td><label>VERANO</label></td>
					    			   <td><label>INVIERNO</label></td>
					    			   <td><label>PERENNE</label></td>
					    			</tr>
					    		</tbody>
							</table>
					    </div>


					    






				</div>

			</div>

    </div>

     
    <div id="div_llenado_ganadero" style="display:none">

   			<div class="row">
   				<h3>ACTIVIDAD GANADERA</h3> 
				<div class="col-sm-12">
					    <label>CANTIDAD DE GANADO EXISTENTE EN EL PREDIO POR SISTEMA PRODUCTIVO LINEA BASE</label>
					    <table id="table_sistemas_ganadero" border="1">
						</table>
				</div>

				<div class="col-sm-12">
					    <label>ACTIVIDADES REALIZADAS EN LA SUPERFICIE DEFORESTADA DEFORESTADA ILEGAL Y/O P.A.S</label>

					        	<table id="table_actividades_ganadero" border="1">
						    	</table>
				</div>

				<div class="col-sm-12">
					    <label>RESULTADOS OBTENIDOS (Sistema de Cria, Recría y Engorde)</label>


									    	<table id="table_linea_base_ganadero" border="1">
										    </table>

				</div>

			</div>

    </div>


    <div id="div_llenado_ganadero_lechero" style="display:none">

   			<div class="row">
   				<h3>ACTIVIDAD LECHERA</h3> 
				<div class="col-sm-12">
					    <label>CANTIDAD DE GANADO EXISTENTE EN EL PREDIO POR SISTEMA PRODUCTIVO LINEA BASE</label>
					    <table id="table_sistemas_lechero" border="1">
						</table>
				</div>

				<div class="col-sm-12">
					    <label>ACTIVIDADES REALIZADAS EN LA SUPERFICIE DEFORESTADA ILEGAL Y/O P.A.S</label>
					    		
					    		<table id="table_actividades_lechero" border="1">
						    	</table>
				</div>

				<div class="col-sm-12">
					    <label>RESULTADOS OBTENIDOS (Sistema Intensivo, Semi Intensivo, Extensivo)</label>

					    		<table id="table_linea_base_lechero" border="1">
								</table>
				</div>

			</div>

    </div>


    <div id="div_llenado_agricola_avicola" style="display:none">

   			<div class="row">
   				<h3>AVICOLA</h3> 
				<div class="col-sm-12">
					    <label>LINEA BASE</label>
					    <table id="table_sistemas_avicola" border="1">
						</table>
				</div>

				<div class="col-sm-12">
					    <label>ACTIVIDADES REALIZADAS EN LA SUPERFICIE DEFORESTADA ILEGAL Y/O P.A.S</label>
				</div>

				<div class="col-sm-12">
					    <label>RESULTADOS ALCANZADOS</label>
				</div>

			</div>

    </div>


    <div id="div_llenado_agricola_porcino" style="display:none">

   			<div class="row">
   				<h3>PORCINO</h3> 
				<div class="col-sm-12">
					    <label>LINEA BASE</label>
					    <table id="table_sistemas_porcino" border="1">
						</table>
				</div>

				<div class="col-sm-12">
					    <label>ACTIVIDADES REALIZADAS EN LA SUPERFICIE ILEGAL Y/O P.A.S</label>
				</div>

				<div class="col-sm-12">
					    <label>RESULTADOS ALCANZADOS</label>
				</div>

			</div>

    </div>



    <div style="display:none" >
				<select name="combocultivonc" onChange="" id="combocultivonc" >
				</select>
	</div>











</body>
</html>