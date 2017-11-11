<?php
session_start();
//show_source("evaluacion.php");
?>
<html>
<head>
	<title></title>
	<script>
	$(function(){
		$("#fecha_evaluacion").datepicker({
	        changeMonth: true,
	        changeYear: true,
	        format: 'dd/mm/yyyy'
	    });
	});
	</script>
	<script type="text/javascript">
		var idinformeevaluacion=0;// idomforme de evaluacion
		var superficieAgricola=0;// superficie Agricola
		var superficieGanadera=0;// superficie Agricola
		$(document).ready(function(){
			//isFuncionarioMonitoreo();
		   	mostrarActividades();
		   	cargarOficina();
		});
		$(document).ready(function() {
			$('[data-toggle="toggle"]').change(function(){
				$(this).parents().next('.hide').toggle();
			});
		});
		function mostrarActividades(){
			var ul = document.getElementById('ul_actividades');
			switch (actividad){
				case 'Ganadera':
					var li = document.createElement("li");
					li.setAttribute("class","active");
					var a=document.createElement("a");
					a.setAttribute("data-toggle","tab");
					a.setAttribute("href","#ganadera1");
					a.setAttribute("onclick","tag_vertical('1')");
					a.innerHTML= actividad;
					li.appendChild(a);
					ul.appendChild(li);
				break;
				case 'Ganadera Lechera':
					var li = document.createElement("li");
					li.setAttribute("class","active");
					var a=document.createElement("a");
					a.setAttribute("data-toggle","tab");
					a.setAttribute("href","#ganadera1");
					a.setAttribute("onclick","tag_vertical('3')");
					a.innerHTML= actividad;
					li.appendChild(a);
					ul.appendChild(li);
				break;
				case 'Mixta Agropecuaria':
					for (var i = 0; i < 4; i++) {
						var li = document.createElement("li");
						if(i==0){
							li.setAttribute("class","active");
						}
						var a=document.createElement("a");
						a.setAttribute("data-toggle","tab");
						var lechera=false;
						switch (i){
							case 0:
								a.innerHTML="Agricola";
								a.setAttribute("onclick","tag_vertical('1');");
							break;
							case 1:
								a.innerHTML="Ganadera";
								a.setAttribute("onclick","tag_vertical('2');");
							break;
							case 2:
								if(isPlanProduccionGanaderaLechera()){
									a.innerHTML="Ganadera Lechera"
									a.setAttribute("onclick","tag_vertical('3');");
									lechera=true;
								}
							break;
							case 3:
								a.innerHTML=actividad;
								a.setAttribute("onclick","tag_vertical('4');");
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
			$("#div_eval_ganadera").css({"display":"none"});
			$("#div_eval_agricola").css({"display":"none"});
			$("#div_eval_mixta").css({"display":"none"});
			eliminarFilasTablas();
			switch (tagid){
				case '1':
					tipoActividad=70;//agricola
					cargar_tabla_evaluacion_agricola();
					$("#div_eval_agricola").css({"display":"block"});
					document.getElementById("idanexos").appendChild(document.getElementById("div_eval_agricola"));
				break;
				case '2':
					tipoActividad=71;//ganadera
					cargar_tabla_evaluacion_ganadera_lechera();
					$("#div_eval_ganadera").css({"display":"block"});
					document.getElementById("idanexos").appendChild(document.getElementById("div_eval_ganadera"));
				break;
				case '3':
					tipoActividad=101;//lechera
					cargar_tabla_evaluacion_ganadera_lechera();
					$("#div_eval_ganadera").css({"display":"block"});
					document.getElementById("idanexos").appendChild(document.getElementById("div_eval_ganadera"));
				break;
				case '4':
					cargar_evaluacion_mixta();
					$("#div_eval_mixta").css({"display":"block"});
					document.getElementById("idanexos").appendChild(document.getElementById("div_eval_mixta"));
				break;
			}
		}
		function cargar_evaluacion_mixta(){
			$.ajax({
				url:'controlador/e_puntuacion_informe_evaluacion.php',
			    type:'POST',
			    data:{
			    	parametro:'2:'+idinformeevaluacion
			    },
			    success: function (json){
			    	eliminarFilasTablas();
			    	var listObj=JSON.parse(json);
			    	var isGanaderaLechera=false;
			    	for (var i = 0; i < listObj.length; i++) { listObj[i].actividad=="101" ? isGanaderaLechera=true : isGanaderaLechera;};
			    	for (var i = 0; i < listObj.length; i++) {
			    		var table = document.getElementById('table_mixta');
			    		var rows0 = table.insertRow(table.rows.length);
			    		var cell = rows0.insertCell(0);
					    var element = document.createElement("label");
					    element.innerHTML=JSON.parse(obtenerCodificadores(listObj[i].actividad))[0].nombrecodificador;
					    cell.appendChild(element);
					    var cell = rows0.insertCell(1);
					    var element = document.createElement("label");
					    element.innerHTML=listObj[i].notaobtenida;
					    cell.appendChild(element);

					    if(listObj[i].actividad=="71" && isGanaderaLechera){
					    	var cell = rows0.insertCell(2);
					    	cell.setAttribute("rowspan","2");
							var element = document.createElement("label");
						    element.innerHTML=listObj[i].superficie;
						    cell.appendChild(element);
					    }else{
					    	if(listObj[i].actividad!="101"){
					    		var cell = rows0.insertCell(2);
								var element = document.createElement("label");
							    element.innerHTML=listObj[i].superficie;
							    cell.appendChild(element);	
						    }			    	
					    }
					    var element = document.createElement("label");
					    element.innerHTML=listObj[i].peso;
					    listObj[i].actividad=="101" ? rows0.insertCell(2).appendChild(element) : rows0.insertCell(3).appendChild(element);
					    var element = document.createElement("label");
					    element.innerHTML=listObj[i].valoracion;
					    listObj[i].actividad=="101" ? rows0.insertCell(3).appendChild(element) : rows0.insertCell(4).appendChild(element);
			    	};
			    }
			});
		}
		function cargar_tabla_evaluacion_ganadera_lechera(){
			$.ajax({
				url:'controlador/evaluacion_general.php',
			    type:'POST',
			    data:{
			    	parametro:'1:'+tipoPropiedad+":"+tipoActividad
			    },
			    success: function (json){
			    	obtenerSuperficieGanaderaLechera();
			    	construir_tabla_ganadera(json);
			    }
			});
		}
		function obtenerSuperficieGanaderaLechera(){
			$.ajax({
				url:'../Registro/controlador/superficiealimentos.php',
			    type:'POST',
			    data:{
			    	parametro:'1:'+idreg
			    },
			    success: function(json){
					var listObj=JSON.parse(json);
					superficieGanadera=listObj[0].supganadera;
			    }
			});
		}
		function cargar_tabla_evaluacion_agricola(){
			obtenerSuperficieAgricola();
			result=cargar_cabezera_tabla_evaluacion_agricola();
			cargar_cuerpos_tabla_evaluacion_agricola(result);
		}
		function obtenerSuperficieAgricola(){
			$.ajax({
				url:'controlador/ll_monitoreo_superficie_agricola.php',
			    type:'POST',
			    data:{
			    	parametro:'2:'+idmonitoreo
			    },
			    success: function(json){
					var listObj=JSON.parse(json);
					superficieAgricola=listObj[0].sup_prod_agricola;
			    }
			});
		}
		function cargar_cabezera_tabla_evaluacion_agricola(){
			var listaIdEspecifica=[];
			$.ajax({
	    		url:'controlador/evaluacion_general.php',
			    type:'POST',
			    async:false,
			    data:{
			    	parametro:'1:'+tipoPropiedad+":"+tipoActividad
			    },
			    success: function (json){
			    	$.blockUI({ css: { backgroundColor: '#f00', color: '#fff'} });
			    	eliminarFilasTablas();			
			    	var listObj=JSON.parse(json);
			    	var table = document.getElementById('tablaAgricola');
			    	var rows0 = table.insertRow(table.rows.length);
			    	for (var i = 0; i < 2; i++) {
						var cell = rows0.insertCell(i);
				    	cell.setAttribute("rowspan","3");
					    var element = document.createElement("label");
					    i==0 ? element.innerHTML="Campaña":element.innerHTML="Cultivo";
					    cell.appendChild(element);
			    	};
				    var cell = rows0.insertCell(2);
				    var element = document.createElement("label");
				    element.innerHTML="General";
				    cell.appendChild(element);
					var rows1 = table.insertRow(table.rows.length);
				    var cell = rows1.insertCell(0);
			    	cell.setAttribute("rowspan","2");
				    var element = document.createElement("label");
				    element.innerHTML="Espeficico";
				    var rows2 = table.insertRow(table.rows[2]);
				    cell.appendChild(element);
			    	for (var i = 0; i < listObj.length; i++) {
			    		var cell = rows0.insertCell(rows0.cells.length);
			    		cell.setAttribute("colspan",listObj[i].list_evaluacion_especifica.length);
					    var element = document.createElement("label");
					    element.setAttribute("class","labelAgricolaEvaluacionGeneral");
					    element.innerHTML=listObj[i].parametrogral;
					    cell.appendChild(element);
					    for (var j = 0; j < listObj[i].list_evaluacion_especifica.length; j++) {
					    	var cell = rows1.insertCell(rows1.cells.length);
						    var element = document.createElement("label");
						     element.setAttribute("class","labelAgricolaEvaluacionEspefica");
						  	element.innerHTML=listObj[i].list_evaluacion_especifica[j].parametroespecifico;
						    cell.appendChild(element);
						    var cell = rows2.insertCell(rows2.cells.length);
						    var element = document.createElement("label");
						  	element.innerHTML=listObj[i].list_evaluacion_especifica[j].valoracion;
						    cell.appendChild(element);
						  	listaIdEspecifica.push(new Array(listObj[i].list_evaluacion_especifica[j].idevaluacionespecifica,listObj[i].list_evaluacion_especifica[j].valoracion));
					    };
			    	};
			    	var cell = rows2.insertCell(rows2.cells.length);
				    var element = document.createElement("label");
				  	element.innerHTML="Ponderacion";
				    cell.appendChild(element);
			    }
			});	
			return listaIdEspecifica;
		}
		function cargar_cuerpos_tabla_evaluacion_agricola(listaIdEspecifica){
			$.ajax({
				url:'controlador/ll_monitoreo_agricola.php',
			    type:'POST',
			    async:false,
			    data:{
			    	parametro:'1:'+idmonitoreo+":"+año
			    },
			    success: function (json){
			    	$.blockUI({ css: { backgroundColor: '#f00', color: '#fff'} });
			    	var listObj=JSON.parse(json);
			    	var campañas=obtenerCampañas(listObj);
			    	var table = document.getElementById('tablaAgricola');
			    	for (var i = 0; i < campañas.length; i++) {
			    		var eBody=document.createElement("tbody");
			    		var row = table.insertRow(table.rows.length);
			    		var cell = row.insertCell(0);
			    		var eBtn=document.createElement("input");
			    		eBtn.setAttribute("type","button");
			    		switch(campañas[i][0]){
			    			case 'V':
			    				eBtn.setAttribute("value","Verano");
			    				eBtn.setAttribute("name",campañas[i][0]);
			    			break;
			    			case 'I':
			    				eBtn.setAttribute("value","Invierno");
			    				eBtn.setAttribute("name",campañas[i][0]);
			    			break;
			    			case 'P':
			    				eBtn.setAttribute("value","Perenne");
			    				eBtn.setAttribute("name",campañas[i][0]);
			    			break;
			    		}
			    		cell.appendChild(eBtn);
			    		row.appendChild(cell);
			    		eBody.appendChild(row);
			    		table.appendChild(eBody);
			    		var eBody=document.createElement("tbody");
						var tipo=EsComprometido(listObj, campañas[i][0]);
						for (var j = 0; j < tipo.length; j++) {
							var row = table.insertRow(table.rows.length);
		    				var element = document.createElement("label");
				    		var cell = row.insertCell(0);
				    		row.appendChild(cell);
				    		element.innerHTML=tipo[j].trim()+"omprometido";
				    		element.setAttribute("name",tipo[j].trim());
	 						cell.appendChild(element);
	 						row.appendChild(cell);
	 						eBody.appendChild(row);
	 						for (var m = 0; m < listObj.length; m++) {
	 							if(listObj[m].campana.trim()==campañas[i][0] && listObj[m].comprometido.trim()==tipo[j].trim()){
	 								var row = table.insertRow(table.rows.length);
						    		var cell = row.insertCell(0);
						    		cell.setAttribute("rowspan","3");
						    		row.appendChild(cell);
						    		var element = document.createElement("label");
						    		var cell = row.insertCell(1);
						    		cell.setAttribute("rowspan","3");
						    		var idCultivo=0;
						    		$.ajax({
							    		url:'../Registro/controlador/cultivo.php',
									    type:'POST',
									    async:false,
									    data:{
									    	parametro:'1:'+listObj[m].cultivo
									    },
									    success: function(json){
											var listObj1=JSON.parse(json);
											element.innerHTML=listObj1[0].nombrecultivo;
											element.setAttribute("name",listObj1[0].idcultivo+"_"+tipo[j].trim()+"_"+campañas[i][0]+"_"+campañas[i][1]);
											element.setAttribute("id",listObj1[0].idcultivo+"_"+tipo[j].trim()+"_"+campañas[i][0]);
											element.setAttribute("data-toggle","modal");
											element.setAttribute("data-target","#myModal");
											element.setAttribute("onclick","abrirModal(this)");
											idCultivo=listObj1[0].idcultivo;
									    }
							    	});
			 						cell.appendChild(element);
			 						row.appendChild(cell);
			 						eBody.appendChild(row);
			 						for (var n = 0; n < 3; n++) {
			 							var o=0;
			 							if(n!=0){
			 								var row = table.insertRow(table.rows.length);
			 							}
										if(n==0){
			 								var element = document.createElement("label");
			 								element.innerHTML="Ponderacion";
								    		var cell = row.insertCell(o);
								    		cell.appendChild(element);
					 						row.appendChild(cell);		
					 						eBody.appendChild(row);	
		 								}else if(n==1){
		 									var element = document.createElement("label");
			 								element.innerHTML="Fojas"
								    		var cell = row.insertCell(o);
								    		cell.appendChild(element);
					 						row.appendChild(cell);		
					 						eBody.appendChild(row);	
		 								}	else if(n==2){
		 									var element = document.createElement("label");
			 								element.innerHTML="Produccion";
								    		var cell = row.insertCell(o);
								    		cell.appendChild(element);
					 						row.appendChild(cell);		
					 						eBody.appendChild(row);	
		 								}
			 							else{
			 								o=2;
			 							}
			 							var primero=true;
			 							for (o+1 ; o < listaIdEspecifica.length; o++) {
			 								var element = document.createElement("input");
			 								element.setAttribute("type","text");
			 								switch(n){
			 									case 0:
			 										element.setAttribute("class","inputAgricolaPonderacion");
			 										element.setAttribute("id","pon_"+listaIdEspecifica[o][0]+"_"+idCultivo);
			 										element.setAttribute("onchange","actulizar_ponderaciones_tabla_agricola()");
			 										element.setAttribute("onkeypress","return isfloat(event, this,"+listaIdEspecifica[o][1]+")");

			 									break;
			 									case 1:
			 										element.setAttribute("class","inputAgricolaFojas");
			 										element.setAttribute("id","fojas_"+listaIdEspecifica[o][0]+"_"+idCultivo);
			 									break;
			 									case 2:
			 										element.setAttribute("class","inputAgricolaProduccion");
			 										element.setAttribute("id","prod_"+listaIdEspecifica[o][0]+"_"+idCultivo);
			 									break;
			 								}
			 								if(!primero && n==2){
			 									element.setAttribute("disabled","true");
			 								}								    		
			 								var cell = row.insertCell(o);
								    		cell.appendChild(element);
					 						row.appendChild(cell);		
					 						eBody.appendChild(row);
					 						primero=false;
					 						if(n==0 && o==listaIdEspecifica.length-1){
					 							var element = document.createElement("label");
					 							element.setAttribute("id","total_"+idCultivo);
					 							element.innerHTML="0";
					 							row.appendChild(element);
					 							eBody.appendChild(row);
					 						}
			 							};
			 						};
	 							}
	 						};
						};
			    		table.appendChild(eBody);
			    	};
			    	var row = table.insertRow(table.rows.length);
			    	var cell = row.insertCell(0);
			    	cell.setAttribute("colspan",listaIdEspecifica.length+3);
			   		var element = document.createElement("label");
					element.innerHTML="TOTAL";
					cell.appendChild(element);
					row.appendChild(cell);

					var cell = row.insertCell(1);
			   		var element = document.createElement("label");
			   		element.setAttribute("id","nota_total");
					element.innerHTML="00.0";
					cell.appendChild(element);
					row.appendChild(cell);
					eBody.appendChild(row);
				    cargarDatosTablaEvalGanadera();	
			    }
			});	
		}
		function construir_tabla_ganadera(json){
			var listObjGral=JSON.parse(json);
			var table = document.getElementById('table_eval_ganadera');
			for (var i = 0; i < listObjGral.length; i++) {
				if(listObjGral[i].list_evaluacion_especifica.length>1){
					var row = table.insertRow(table.rows.length);
				    var cell = row.insertCell(0);
				    var element = document.createElement("label");
				    element.innerHTML=listObjGral[i].parametrogral;
				    cell.setAttribute("rowspan",listObjGral[i].list_evaluacion_especifica.length);
				    cell.appendChild(element);
				    var cell = row.insertCell(1);
				    var element = document.createElement("label");
				    element.innerHTML=listObjGral[i].ponderacion;
				    cell.setAttribute("rowspan",listObjGral[i].list_evaluacion_especifica.length);
				    cell.appendChild(element);
					for (var j = 0; j < listObjGral[i].list_evaluacion_especifica.length; j++) {
						if(j!=0){
							row=table.insertRow(table.rows.length);
							var cell = row.insertCell(0);
						    var element = document.createElement("label");
						    element.innerHTML=listObjGral[i].list_evaluacion_especifica[j].parametroespecifico;
						    cell.appendChild(element);
						    if(i!=1){
						    	var cell = row.insertCell(1);
							    var element = document.createElement("label");
							    element.innerHTML=listObjGral[i].list_evaluacion_especifica[j].valoracion;
							    cell.appendChild(element);
							    var cell = row.insertCell(2);
							    var element = document.createElement("textarea");
							    element.setAttribute("id","txt_"+listObjGral[i].list_evaluacion_especifica[j].idevaluacionespecifica);
							    cell.appendChild(element);
							    var cell = row.insertCell(3);
							    var element = document.createElement("input");
							    element.setAttribute("id","porc_"+listObjGral[i].list_evaluacion_especifica[j].idevaluacionespecifica);
							    element.setAttribute("onkeypress","return isfloat(event, this,"+listObjGral[i].list_evaluacion_especifica[j].valoracion+")");
							    element.setAttribute("onchange","sumarDatosTabla()");
							    cell.appendChild(element);
							    var cell = row.insertCell(4);
							    var element = document.createElement("textarea");
							    element.setAttribute("id","obs_"+listObjGral[i].list_evaluacion_especifica[j].idevaluacionespecifica);
							    cell.appendChild(element);
						    }else{
						    	var cell = row.insertCell(1);
							    var element = document.createElement("textarea");
							    element.setAttribute("id","txt_"+listObjGral[i].list_evaluacion_especifica[j].idevaluacionespecifica);
							    cell.appendChild(element);
							    var cell = row.insertCell(2);
							    var element = document.createElement("input");
							    element.setAttribute("id","porc_"+listObjGral[i].list_evaluacion_especifica[j].idevaluacionespecifica);
							    element.setAttribute("onkeypress","return isfloat(event, this,"+parseInt(parseInt(listObjGral[i].list_evaluacion_especifica[0].valoracion)+parseInt(listObjGral[i].list_evaluacion_especifica[1].valoracion) + parseInt(listObjGral[i].list_evaluacion_especifica[2].valoracion))+","+true+")");
							    element.setAttribute("onchange","sumarDatosTabla()");
							    cell.appendChild(element);
							    var cell = row.insertCell(3);
							    var element = document.createElement("textarea");
							    element.setAttribute("id","obs_"+listObjGral[i].list_evaluacion_especifica[j].idevaluacionespecifica);
							    cell.appendChild(element);
						    }
						}else{
							var cell = row.insertCell(2);
						    var element = document.createElement("label");
						    element.innerHTML=listObjGral[i].list_evaluacion_especifica[j].parametroespecifico;
						    cell.appendChild(element);
						    if(i==1){
						    	var cell = row.insertCell(3);
						    	cell.setAttribute("rowspan","3");
							    var element = document.createElement("label");
							    element.innerHTML=parseInt(listObjGral[i].list_evaluacion_especifica[j].valoracion)+ parseInt(listObjGral[i].list_evaluacion_especifica[j+1].valoracion)+ parseInt(listObjGral[i].list_evaluacion_especifica[j+2].valoracion);
							    cell.appendChild(element);
						    }else{
						    	var cell = row.insertCell(3);
							    var element = document.createElement("label");
							    element.innerHTML=listObjGral[i].list_evaluacion_especifica[j].valoracion;
							    cell.appendChild(element);
						    };
						    var cell = row.insertCell(4);
						    var element = document.createElement("textarea");
						    element.setAttribute("id","txt_"+listObjGral[i].list_evaluacion_especifica[j].idevaluacionespecifica);
						    cell.appendChild(element);
						    var cell = row.insertCell(5);
						    var element = document.createElement("input");
						    element.setAttribute("id","porc_"+listObjGral[i].list_evaluacion_especifica[j].idevaluacionespecifica);
						    if(i!=1){
						    	element.setAttribute("onkeypress","return isfloat(event, this,"+listObjGral[i].list_evaluacion_especifica[j].valoracion+")");
							}else{
								element.setAttribute("onkeypress","return isfloat(event, this,"+parseInt(parseInt(listObjGral[i].list_evaluacion_especifica[j].valoracion)+parseInt(listObjGral[i].list_evaluacion_especifica[j+1].valoracion) + parseInt(listObjGral[i].list_evaluacion_especifica[j+2].valoracion))+","+true+")");
							}
							element.setAttribute("onchange","sumarDatosTabla()");
						    cell.appendChild(element);
						    var cell = row.insertCell(6);
						    var element = document.createElement("textarea");
						    element.setAttribute("id","obs_"+listObjGral[i].list_evaluacion_especifica[j].idevaluacionespecifica);
						    cell.appendChild(element);
						}
					};
				}else{
					var row = table.insertRow(table.rows.length);
				    var cell = row.insertCell(0);
				    var element = document.createElement("label");
				    element.innerHTML=listObjGral[i].parametrogral;
				    cell.appendChild(element);
				    var cell = row.insertCell(1);
				    var element = document.createElement("label");
				    element.innerHTML=listObjGral[i].ponderacion;
				    cell.appendChild(element);
				    var cell = row.insertCell(2);
				    var element = document.createElement("label");
				    element.innerHTML=listObjGral[i].list_evaluacion_especifica[0].parametroespecifico;
				    cell.appendChild(element);
				    var cell = row.insertCell(3);
				    var element = document.createElement("label");
				    element.innerHTML=listObjGral[i].list_evaluacion_especifica[0].valoracion;
				    cell.appendChild(element);
				    var cell = row.insertCell(4);
				    var element = document.createElement("textarea");
				    element.setAttribute("id","txt_"+listObjGral[i].list_evaluacion_especifica[0].idevaluacionespecifica);
				    cell.appendChild(element);
				    var cell = row.insertCell(5);
				    var element = document.createElement("input");
				    element.setAttribute("id","porc_"+listObjGral[i].list_evaluacion_especifica[0].idevaluacionespecifica);
				    element.setAttribute("onkeypress","return isfloat(event, this,"+listObjGral[i].list_evaluacion_especifica[0].valoracion+")");
				    element.setAttribute("onchange","sumarDatosTabla()");
				    cell.appendChild(element);
				    var cell = row.insertCell(6);
				    var element = document.createElement("textarea");
				    element.setAttribute("id","obs_"+listObjGral[i].list_evaluacion_especifica[0].idevaluacionespecifica);
				    cell.appendChild(element);
				}
			};
			var row = table.insertRow(table.rows.length);
		    var cell = row.insertCell(0);
		    cell.setAttribute("colspan",5);
		    var element = document.createElement("label");
		    element.innerHTML="Puntuacion Final";
	    	cell.appendChild(element);
	    	var cell = row.insertCell(1);
		    var element = document.createElement("label");
		    element.setAttribute("id","idPuntuacionFinal");
	    	cell.appendChild(element);
	    	cargarTablaValoracionPecAviPor();
		}
		function guardarDatosTablaGanLec(){
			var array="";
			 $.each($('#table_eval_ganadera tbody tr'),function(){
		        var txtarea = $(this).find("textarea");
		        var txtareaAux;
		        if(txtarea.length>0){
		        	txtareaAux=txtarea[1];
		        	array=array+txtarea.attr('id').split("_")[1]+"¬"+$(txtarea[0]).val()+"¬";
		        }
		        var txtinput = $(this).find("input");  
		        if(txtinput.length>0){
		        	if($(txtinput).val().trim()==""){
		        		$(txtinput).val("0");
		        	}
		        	array=array+$(txtinput).val()+"¬";
		        }
		        if(txtarea.length>0){
		        	array=array+$(txtareaAux).val()+":"
		        }
	    	});
			var subsplit=array.split(":");
			EliminarTablaValoracionPecAviPor();
			for (var i = 0; i < subsplit.length-1; i++) {
				var _subsplit=subsplit[i];
				insertarTablaValoracionPecAviPor(_subsplit.split("¬")[0],_subsplit.split("¬")[2],_subsplit.split("¬")[1],tipoActividad,_subsplit.split("¬")[3]);
			};
			guardarTotalActividades(tipoActividad, $("#idPuntuacionFinal").text(), superficieGanadera);
    	}
    	function cargarOficina(){
    		$.ajax({
				url:'controlador/codificadores.php',
			    type:'POST',
			    async:false,
			    data:{
			    	parametro:'1:'
			    },
			    success: function (json){
			    	var listObj=JSON.parse(json);
			    	var select = document.getElementById('select_oficina');
					for (var i = 0; i < listObj.length; i++) {
						var option=document.createElement("option");
						option.value=listObj[i].idcodificadores;
						option.text=listObj[i].nombrecodificador;
						select.add(option);
				    }
				    cargarInformeEvaluacion();
				}
			});
    	}
		function obtenerCodificadores(idcodificador){//idcodificador:busca por codificador
			var jjson;
    		$.ajax({
				url:'controlador/codificadores.php',
			    type:'POST',
			    async:false,
			    data:{
			    	parametro:'4:'+idcodificador
			    },
			    success: function (json){
			    	jjson=json;
				}
			});
			return jjson;
    	}
      	function insertarInformeEvaluacion(){
    		$.ajax({
				url:'controlador/e_informe_evaluacion_rcia.php',
			    type:'POST',
			    data:{
			    	parametro:'1:'+idmonitoreo+":"+document.getElementById("select_oficina").value+":123:"+$("#fecha_evaluacion").val()
			    },
			    success: function (json){
			    	cargarInformeEvaluacion();
			    }
			});
    	}
    	function cargarInformeEvaluacion(){
    		$.ajax({
				url:'controlador/e_informe_evaluacion_rcia.php',
			    type:'POST',
			    data:{
			    	parametro:'2:'+idmonitoreo
			    },
			    success: function (json){
			    	var obj=JSON.parse(json);
			    	if(Object.keys(obj).length!=2){
			    		$("#btnGenerarCite").css({"display":"none"});
						idinformeevaluacion=obj.idinformeevaluacion;
			    		var cite=document.getElementById("cite");
			    		cite.innerHTML=obj.cite;
			    		var fecha_evaluacion=document.getElementById("fecha_evaluacion");
			    		fecha_evaluacion.value=obj.fechainforme.split("-")[2]+"/"+obj.fechainforme.split("-")[1]+"/"+obj.fechainforme.split("-")[0];
			    		var select = document.getElementById('select_oficina');
						for (var i = 1; i < select.length; i++) {
							if(select.options[i].value==obj.idoficina){
								document.getElementById("select_oficina").selectedIndex = i;
								break;
							}
					    }
					    $("#check1").attr("disabled",false);
						$("#check2").attr("disabled",false);
						$("#check3").attr("disabled",false);
						$("#check4").attr("disabled",false);
			    	}else{
			    		//$("#btnGenerarCite").css({"display":"block"});
						$("#check1").attr("disabled",true);
						$("#check2").attr("disabled",true);
						$("#check3").attr("disabled",true);
						$("#check4").attr("disabled",true);
			    	}
			    }
			});
    	}
      	function insertarValoracion(){
    		$.ajax({
				url:'controlador/e_tablas_valoracion_pec_avi_por.php',
			    type:'POST',
			    data:{
			    	parametro:'1:'+idmonitoreo+":"+document.getElementById("select_oficina").value+":123:"+$("#fecha_evaluacion").val()
			    },
			    success: function (json){
			    	cargarInformeEvaluacion();
			    }
			});
    	}
    	function insertarTablaValoracionPecAviPor(id_eval_esp, ponderacion, fojas, tipoactividad,observacion){
    		$.ajax({
				url:'controlador/e_tablas_valoracion_pec_avi_por.php',
			    type:'POST',
			    data:{
			    	parametro:'1:'+idinformeevaluacion+":"+id_eval_esp+":"+ponderacion+":"+fojas+":"+tipoactividad+":"+observacion
			    },
			    success: function(json){
			    }
			});
    	}
    	function EliminarTablaValoracionPecAviPor(){
    		$.ajax({
				url:'controlador/e_tablas_valoracion_pec_avi_por.php',
			    type:'POST',
			    async:false,
			    data:{
			    	parametro:'3:'+idinformeevaluacion
			    },
			    success: function(json){
			    }
			});
    	}
    	function cargarTablaValoracionPecAviPor(){
    		$.ajax({
				url:'controlador/e_tablas_valoracion_pec_avi_por.php',
			    type:'POST',
			    data:{
			    	parametro:'2:'+idinformeevaluacion
			    },
			    success: function(json){
			    	var obj=JSON.parse(json);
			    	var idPuntuacionFinal=0;
			    	for (var i = 0; i < obj.length; i++) {
			    		$("#txt_"+obj[i].idevaluacionespecifica).val(obj[i].fojas);
			    		$("#porc_"+obj[i].idevaluacionespecifica).val(obj[i].ponderacion);
			    		$("#obs_"+obj[i].idevaluacionespecifica).val(obj[i].observacion);
			    		idPuntuacionFinal+=parseFloat(obj[i].ponderacion);
			    	};
			    	document.getElementById("idPuntuacionFinal").innerHTML=idPuntuacionFinal;
			    }
			});
    	}
    	function eliminarFilasTablas() {
    		try{//ganadera lechera
    		var i=0;
    		$.each($('#table_eval_ganadera tbody tr'),function(){
    			if(i>1){
    		   		$(this).remove();		
    			}
    			i++;
	    	});
    		}catch(err){}

			try{//agricola
				$.each($('#tablaAgricola tbody tr'),function(){
		   			$(this).remove();		
		    	});
			}catch(err){}

			try{//mixta
    		var i=0;
    		$.each($('#table_mixta tbody tr'),function(){
    			if(i>0){
    		   		$(this).remove();		
    			}
    			i++;
	    	});
    		}catch(err){}

    	}
    	function isfloat(event, element, limite, alt) {// funcionamiento normal
			event = event || window.event;
			var charCode = event.which || event.keyCode;
			if (charCode == 8 || charCode == 13 || element.value.indexOf('.') == -1 ? charCode == 46 : false){
				if(buscarnumeros(element.value)){
					return true;
				}else{
					return false;
				}
			}
			else if ((charCode < 48) || (charCode > 57)){
				return false;
			}
			if(ismenor(limite, element, event, alt)){
				return true;	
			}else{
				return false;
			}
		}
		function buscarnumeros(cadena){//tiene que haber al menos un numero para que deje colocar el "."
			var regex = /\d+/g;
			//var string = "you can enter maximum 500 choices";
			var matches = cadena.match(regex);  // creates array from matches
			if(matches==null){
				return false;
			}else{
				return true;
			}
		}
		function ismenor(limite, element, event, alt){//alt=alternativo
			if(!alt){
				if(parseFloat(element.value+parseFloat(event.key))<=parseFloat(limite)){
					return true;
				}else{
					return false;
				}	
			}else{
				var id=element.id.split("_")[1];
				if(tipoActividad==71){
					var a=$("#porc_2").val().trim()== "" ? "0.00" :$("#porc_2").val();
					var b=$("#porc_3").val().trim()== "" ? "0.00" :$("#porc_3").val();
					var c=$("#porc_4").val().trim()== "" ? "0.00" :$("#porc_4").val();
					switch (id){
						case "2":
							a=parseFloat(a)+parseFloat(event.key); 
						break;
						case "3":
							var b=parseFloat(b)+parseFloat(event.key);
						break;
						case "4":
							var c=parseFloat(c)+parseFloat(event.key);
						break;
					}
				}else{
					var a=$("#porc_20").val().trim()== "" ? "0.00" :$("#porc_20").val();
					var b=$("#porc_21").val().trim()== "" ? "0.00" :$("#porc_21").val();
					var c=$("#porc_22").val().trim()== "" ? "0.00" :$("#porc_22").val();
					switch (id){
						case "20":
							a=parseFloat(a)+""+parseFloat(event.key); 
						break;
						case "21":
							var b=parseFloat(b)+""+parseFloat(event.key);
						break;
						case "22":
							var c=parseFloat(c)+""+parseFloat(event.key);
						break;
					}
				}
				var valor=parseFloat(parseFloat(a)+parseFloat(b)+parseFloat(c));
				if(isMenorAux(valor,limite)){
					return true;
				}else{
					return false;
				}
			}
		}
		function isMenorAux(valor, limite){
			if(valor<=limite){
				return true;
			}else{
				return false;
			}
		}
		function sumarDatosTabla(){
			var suma=0;
			 $.each($('#table_eval_ganadera tbody tr'),function(){
		        var txtinput = $(this).find("input");  
		        if(txtinput.length>0){
		        	if($(txtinput).val().trim()!=""){
		        		suma+=parseFloat($(txtinput).val());
		        	}
		        }
	    	});
			document.getElementById("idPuntuacionFinal").innerHTML=suma;
    	}
    	function isPlanProduccionGanaderaLechera(){
			var result=false;
			$.ajax({
				url:'../Registro/controlador/planganaderalechera.php',
			    type:'POST',
			    async:false,
			    data:{
			    	parametro:'1:'+idreg
			    },
			    success: function(json){
			    	var obj=JSON.parse(json);
			    	Object.keys(obj).length!=2 ? result=true : result;
			    }
			});
			return result;
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
    	function obtenerCampañas(obj){
    		var array=[];
    		for (var i = 0; i < obj.length; i++) {
    			array.push(obj[i].campana);
    		};
    		array = array.filter((v, i, a) => a.indexOf(v) === i);
    		var arrayaux=[];
    		if(array.length==3){
    			for (var i = 0; i < array.length; i++) {
    				switch(array[i]){
    					case "V":
    						arrayaux.push(new Array(array[i],"0.5"));		
    					break;
    					case "I":
    						arrayaux.push(new Array(array[i],"0.5"));
    					break;
    					case "P":
    						arrayaux.push(new Array(array[i],"1"));
    					break;
    				}
    			};
    		}else if(array.length==2){
    			if(array[0]=="P" || array[1]=="P"){
    				for (var i = 0; i < array.length; i++) {
    					arrayaux.push(new Array(array[i],"1"));
    				};
    			}else{
    				for (var i = 0; i < array.length; i++) {
    					arrayaux.push(new Array(array[i],"0.5"));
    				};
    			}
    		}else if(array.length==1){
				arrayaux.push(new Array(array[0],"1"));
    		}
    		return arrayaux;
    	}
    	function EsComprometido(listObj, campaña){
    		var array=[];
    		for (var i = 0; i < listObj.length; i++) {
    			if(listObj[i].campana.trim()==campaña){
    				array.push(listObj[i].comprometido);
    			} 
    		};
    		return array= array.filter((v, i, a) => a.indexOf(v) === i);
    	}
    	function LeerTablaAgricola(){
    		var x=0;
    		var arrayMult=[];
    		$.each($('#tablaAgricola tbody tr'),function(){
    			x++;
    			if(x>3){
    				var listInput = $(this).find("input");
    				var listlabel = $(this).find("label");
    				if(listInput.length==1 && listlabel.length==0){
    					var array=[];
    					array.push($(listInput[0]).attr('name'));
    					arrayMult.push(array);
    				}else if(listInput.length==0 && listlabel.length==1){
    					var array=[];
    					array.push($(listlabel[0]).attr('name'));
    					arrayMult.push(array);
    				}else if(listInput.length>5 && listlabel.length==3 || listlabel.length==1 ){
    					if(listlabel.length==3){
    						var array=[];
	    					array.push($(listlabel[0]).attr('name').split("_")[0]);
	    					arrayMult.push(array);
    					}
						var array=[];
    					for (var i = 0; i < listInput.length; i++) {
	    					array.push($(listInput[i]).attr('id'));
    					};
    					arrayMult.push(array);
    				}
    			}
	    	});
			var arrayValoracion=[];
			var arrayPonderacion=[];
    		var indexCampaña=0;
    		var indexComprometido=0;
    		for (var i = 0; i < arrayMult.length; i++) {
    			var array=[];
    			if(arrayMult[i].length==1 && arrayMult[i+1].length==1 && arrayMult[i+2].length==1){
    				indexCampaña=i;
    				indexComprometido=i+1;
    				i=i+2;
    			}else if(arrayMult[i].length==1 && arrayMult[i+1].length==1 && arrayMult[i+2].length>1){
					indexComprometido=i;
					i=i+1;
    			}
    			array.push(arrayMult[indexCampaña][0]);
    			array.push(arrayMult[indexComprometido][0]);
				if(arrayMult[i].length==1 && arrayMult[i+1].length>1){
    				array.push(arrayMult[i][0].split("_")[0]);		
    			}
    			for (var j = 0; j < arrayMult[i+1].length; j++) {
    				var arrayaux=array.slice();
    				arrayaux.push(arrayMult[i+1][j].split("_")[1]);	
    				arrayaux.push($("#"+arrayMult[i+1][j]).val());
    				arrayaux.push($("#"+arrayMult[i+2][j]).val());
    				arrayaux.push($("#"+arrayMult[i+3][j]).val());
    				arrayValoracion.push(arrayaux);
    			};
    			i=i+3;
    		};
    		//Recoger datos  Ponderacion	
    		var arrayAux=[];
    		var arrayDatosPonderacion=[];
    		for (var i = 0; i < arrayValoracion.length; i++) arrayAux[i]=arrayValoracion[i][2];
    		arrayAux = arrayAux.filter((v, i, a) => a.indexOf(v) === i);
    		for (var i = 0; i < arrayAux.length; i++) {
    			var datosTotal=$("#total_"+arrayAux[i]).attr('name');
    			if(datosTotal!==undefined){
    				arrayDatosPonderacion.push(new Array(datosTotal.split("_")[0],datosTotal.split("_")[2],datosTotal.split("_")[1],$("#total_"+arrayAux[i]).text(),datosTotal.split("_")[3],datosTotal.split("_")[4]));
    			}	
    		};
    		guardarPonderacionAgricola(arrayDatosPonderacion);
    		guardarMonitoreoAgricola(arrayValoracion);
    		guardarTotalActividades(tipoActividad, $("#nota_total").text(), superficieAgricola);
    	}
    	function guardarTotalActividades(actividad, notaTotal, superficieActividad){
    		$.ajax({
				url:'controlador/e_puntuacion_informe_evaluacion.php',
			    type:'POST',
			    data:{
			    	parametro:'1:'+idinformeevaluacion+":"+tipoActividad+":"+notaTotal+":"+superficieActividad
			    },
			    success: function(json){
			    	debugger;
			    	console.log(json);
			    }
			});
    	}
    	function guardarMonitoreoAgricola(ListArray){
			eliminarMonitoreoAgricola();							
			for (var i = 0; i < ListArray.length; i++) {
    			$.ajax({
					url:'controlador/e_tabla_valoracion_agricola.php',
				    type:'POST',
				    data:{
				    	parametro:'1:'+idinformeevaluacion+":"+ListArray[i][3]+":"+ListArray[i][2]+":"+ListArray[i][4]+":"+ListArray[i][5]+":"+ListArray[i][6]+":"+ListArray[i][1]+":"+ListArray[i][0]
				    },
				    success: function(json){
				    	console.log(json);
				    }
				});
    		};	
    	}
    	function eliminarMonitoreoAgricola(){
			$.ajax({
				url:'controlador/e_tabla_valoracion_agricola.php',
			    type:'POST',
			    data:{
			    	parametro:'3:'+idinformeevaluacion
			    }
			});
    	}
    	function guardarPonderacionAgricola(arrayPonderacion){
    		for (var i = 0; i < arrayPonderacion.length; i++) {
	    		$.ajax({
					url:'controlador/e_tabla_ponderacion_agricola.php',
				    type:'POST',
				    async:false,
				    data:{
				    	parametro:'2:'+idinformeevaluacion+":"+arrayPonderacion[i][0]+":"+arrayPonderacion[i][1]+":"+arrayPonderacion[i][2]+":"+arrayPonderacion[i][3]+":"+arrayPonderacion[i][4]+":"+arrayPonderacion[i][5]
				    },
				    success: function(json){
				    	console.log(json);
				    }
				});
			};
    	}
    	function cargarDatosTablaEvalGanadera(){
    		$.blockUI({ css: { backgroundColor: '#f00', color: '#fff'} });
    		$.ajax({
				url:'controlador/e_tabla_valoracion_agricola.php',
			    type:'POST',
			    async:false,
			    data:{
			    	parametro:'2:'+idinformeevaluacion
			    },
			    success: function(json){
			    	var listObj=JSON.parse(json);
			    	for (var i = 0; i < listObj.length; i++) {
			    		$("#pon_"+listObj[i].idevaluacionespecif+"_"+listObj[i].idcultivo).val(listObj[i].puntuacion);
			    		$("#fojas_"+listObj[i].idevaluacionespecif+"_"+listObj[i].idcultivo).val(listObj[i].fojas);
			    		$("#prod_"+listObj[i].idevaluacionespecif+"_"+listObj[i].idcultivo).val(listObj[i].produccion);
			    		var x=document.getElementById("total_"+listObj[i].idcultivo).hasAttribute("name");
			    		if(!document.getElementById("total_"+listObj[i].idcultivo).hasAttribute("name")){
			    			$.blockUI({ css: { backgroundColor: '#f00', color: '#fff'} });
			    			$.ajax({
								url:'controlador/e_tabla_ponderacion_agricola.php',
							    type:'POST',
							    async:false,
							    data:{
							    	parametro:'1:'+idinformeevaluacion+":"+listObj[i].idcultivo+":"+listObj[i].campana+":"+listObj[i].comprometido
							    },
							    success: function(json_pond){
									var listObjAux=JSON.parse(json_pond);
									if(Object.keys(listObjAux).length!=2){
										document.getElementById("total_"+listObjAux[0].idcultivo).setAttribute("name",listObjAux[0].idcultivo+"_"+listObjAux[0].ponderacion+"_"+listObjAux[0].porcponderacion+"_"+listObjAux[0].campana+"_"+listObjAux[0].comprometido);
										document.getElementById(listObjAux[0].idcultivo+"_"+listObjAux[0].comprometido.trim()+"_"+listObjAux[0].campana.trim()).setAttribute("class","glyphicon glyphicon-ok");
									}
									$.unblockUI();
							    }
							});
			    		}
			    	};
			    	$.unblockUI();
			    }
			});
			actulizar_ponderaciones_tabla_agricola();
    	}
    	function guardarPuntuacionTotal(){

    	}
    	function abrirModal(element){
    		$.blockUI({ css: { backgroundColor: '#f00', color: '#fff'} });
    		vaciarModal();
    		$(element).attr('name').split("_")[1] == 'C' ?  $("#compro").text("Comprometido"): $("#compro").text("No Comprometido");
    		$("#idcamp").text($(element).attr('name').split("_")[2]);
    		$("#idcompr").text($(element).attr('name').split("_")[1]);
    		$("#sup_compro_agri").text(superficieAgricola);
    		switch ($(element).attr('name').split("_")[2]){
    			case 'V':
    				$("#camp").text("Verano");
    			break;
    			case 'I':
    				$("#camp").text("Invierno");
    			break;
    			case 'P':
    				$("#camp").text("Perenne");
    			break;
    		}
    		$("#cult").text($(element).attr('name').split("_")[1] == 'C' ?  $(element).text()+"(Comprometido)" :$(element).text()+ "(No Comprometido)");
    		$("#var_campa").text($(element).attr('name').split("_")[3]);
    		$.blockUI({ css: { backgroundColor: '#f00', color: '#fff'} });
    		$.ajax({
				url:'controlador/ll_monitoreo_agricola.php',
			    type:'POST',
			    async:false,
			    data:{
			    	parametro:'2:'+idmonitoreo+':'+$(element).attr('name').split("_")[0]+":"+año+":"+$(element).attr('name').split("_")[2]+":"+$(element).attr('name').split("_")[1]
			    },
			    success: function(json){
					var listObj=JSON.parse(json);
					$("#sup_ccultivo").text(listObj[0].supejecutada);

			    }
			});
			if($("#total_"+$(element).attr("name").split("_")[0]).attr("name")===undefined){
				$.ajax({
					url:'controlador/e_tabla_ponderacion_agricola.php',
				    type:'POST',
				    async:false,
				    data:{
				    	parametro:'1:'+idinformeevaluacion+":"+$(element).attr('name').split("_")[0]+":"+$(element).attr('name').split("_")[2]+":"+$(element).attr('name').split("_")[1]
				    },
				    success: function(json){
						var listObj=JSON.parse(json);
						if(Object.keys(listObj).length!=2){
							$("#porc_valoracion").val(listObj[0].ponderacion);
							$("#porc_pond").text(listObj[0].porcponderacion);
						}
				    }
				});
			}else{
				$("#porc_valoracion").val($("#total_"+$(element).attr("name").split("_")[0]).attr("name").split("_")[1]);
				$("#porc_pond").text($("#total_"+$(element).attr("name").split("_")[0]).attr("name").split("_")[2]);
			}
			$("#porc_sup").text(parseFloat(($("#sup_ccultivo").text())/parseFloat($("#sup_compro_agri").text())*100)+"%")
			document.getElementById("btnCalcularModal").setAttribute("onclick","calcularModal('"+$(element).attr('name')+"','"+$("#porc_valoracion").val()+"','"+$("#porc_pond").text()+"')"); 
			$.unblockUI();
    	}
    	function ActualizarPorcentaje(){
    		var por_sup=parseFloat($("#porc_sup").text());
    		var var_camp=parseFloat($("#var_campa").text());
    		var porc_valoracion=parseFloat($("#porc_valoracion").val());
    		var result=por_sup*var_camp*porc_valoracion/100/100;
    		$("#porc_pond").text(result);
    	}
    	function vaciarModal(){
		    $("#sup_ccultivo").text("");          		
		    $("#porc_sup").text("");          		
		    $("#porc_valoracion").val("");
		    $("#var_campa").text("");  
		}
		function actulizar_ponderaciones_tabla_agricola(){
			$.blockUI({ css: { backgroundColor: '#f00', color: '#fff'} });
			var x=0;
			$("#nota_total").text("0");
			$.each($('#tablaAgricola tbody tr'),function(){
    			x++;
    			if(x>3){
    				var listInput = $(this).find("input");
    				var primero=false;//coloca en 0 el cuadro total la primer vez 
    				for (var i = 0; i < listInput.length; i++) {
    					if($(listInput[i]).attr("id")!== undefined && $(listInput[i]).attr("id").split("_")[0]=="pon"){
    						if(i==0){
    							$("#total_"+$(listInput[i]).attr("id").split("_")[2]).text("0");
    						}
    						var val_in=$(listInput[i]).val();
    						var total_cult=$("#total_"+$(listInput[i]).attr("id").split("_")[2]).text();
    						$("#total_"+$(listInput[i]).attr("id").split("_")[2]).text(parseFloat(parseFloat(val_in)+parseFloat(total_cult)));
    						total_cult=$("#total_"+$(listInput[i]).attr("id").split("_")[2]).text();
    						if(i==listInput.length-1){
    							//$("#total_"+$(listInput[i]).attr('id').split('_')[2]).text("0");
    							var total_cul_name=$("#total_"+$(listInput[i]).attr('id').split('_')[2]).attr("name");		
    							if(total_cul_name===undefined){
    								$("#total_"+$(listInput[i]).attr('id').split('_')[2]).text("0");
    							}else{
									$("#total_"+$(listInput[i]).attr('id').split('_')[2]).text(parseFloat(total_cult*parseFloat(total_cul_name.split("_")[2]))); 								
    							}
    							total_cult=$("#total_"+$(listInput[i]).attr('id').split('_')[2]).text();
    							var nota_total=$("#nota_total").text();
    							if(parseFloat(nota_total)+parseFloat(total_cult)>100){
    								$("#nota_total").text("100");		
    							}else{
    								$("#nota_total").text(parseFloat(nota_total)+parseFloat(total_cult));
    							}
    						}
    					}
    				};
    			}
    			$.unblockUI();
	    	});
			
		}
		function calcularModal(name_element,porc_valoracion, porc_pond){
			document.getElementById("total_"+name_element.split("_")[0]).setAttribute("name",name_element.split("_")[0]+"_"+$("#porc_valoracion").val()+"_"+$("#porc_pond").text()+"_"+$("#idcamp").text()+"_"+$("#idcompr").text());
			document.getElementsByName(name_element)[0].setAttribute("class","glyphicon glyphicon-ok");
			actulizar_ponderaciones_tabla_agricola();
		}
	</script>
</head>
<body>
	<div class="container">
		<div class="col-sm-12"  style="border-style: solid;border-color: #000;">
			<div class="row" align="center">
				<h3>INFORME DE EVALUACION DEL REPORTE DE CUMPLIMIENTO INDIVIDUAL ANUAL</h3>
				<div class="row">
					<div class="col-sm-2">
						<label>Oficina</label>	
					</div>
					<div class="col-sm-5">
						<select id="select_oficina" class="form-control">
  							<option value="" selected disabled>Oficinas</option>
						</select>		
					</div>
					<div class="col-sm-2">
						<label>Cite</label>	
					</div>
					<div class="col-sm-2">
  						<label id="cite"></label>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-2">
						<label>Fecha</label>
					</div>
					<div class="col-sm-5">
						<input type="text" id="fecha_evaluacion" class="form-control" placeholder="Fecha">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<button id="btnGenerarCite" type="button" onclick="insertarInformeEvaluacion()" class="btn btn-primary">Generar</button>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-5">
					<div class="checkbox">
					    <label><input id="check1" type="checkbox" value="" data-toggle="collapse" data-target="#demo1" >Análisis Técnico de la Carpeta</label>
					</div>
				</div>
				<div class="col-sm-12">
					<div class="row">
						<div id="demo1" class="collapse out">
						  	<textarea style="width:100%" onkeypress="return isfloat(event, this, 10);" onchange="sumarDatosTabla()"></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="checkbox">
					    <label><input id="check2" type="checkbox" value=""  data-toggle="collapse" data-target="#demo2"  >Anexos</label>
					</div>
				</div>
				<div id="demo2" class="collapse out">
					<div class="col-sm-12">
						<div class="row">
					  		<div class="col-sm-2"  id="div_tag_anexos">
					            <ul id="ul_actividades" class="nav nav-tabs tabs-left" style="cursor: pointer;"></ul>
							</div>
							<div id="idanexos" class="col-sm-8" style="width: 82.66668%"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="checkbox">
					    <label><input id="check3" type="checkbox" value=""  data-toggle="collapse" data-target="#demo3"  >Análisis Técnico de la Carpeta</label>
					</div>
				</div>
				<div class="col-sm-12" >
					<div class="row">
						<div id="demo3" class="collapse out">
						  	<textarea style="width:100%" ></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="checkbox" >
					    <label><input id="check4" type="checkbox" value="" data-toggle="collapse" data-target="#demo4"  >Análisis Técnico de la Carpeta</label>
					</div>
				</div>
				<div class="col-sm-12" >
					<div class="row">
						<div id="demo4" class="collapse out">
						  	<textarea style="width:100%"></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<button id="btnGuardadoInforme" type="button" onclick="test11()" class="btn btn-primary">Guardarwsss</button>
			</div>
		</div>
	</div>
   	<div id="div_eval_ganadera" style="display:none;">
    	<table id="table_eval_ganadera" border="1">
			<tr>
				<td colspan="2">E. General</td>
				<td colspan="2">E. Especifica</td>
				<td rowspan="2">Folio</td>
				<td rowspan="2">%</td>
				<td rowspan="2">Observacion</td>
			</tr>
			<tr>
				<td>Parametro</td>
				<td>%</td>
				<td>Parametro</td>
				<td>%</td>
			</tr>
    	</table>
    	<button id="btnGuardadoGanaderaLechera" type="button" onclick="guardarDatosTablaGanLec()" class="btn btn-primary">Modificar y Guardar</button>
    </div>
    <div id="div_eval_mixta" class="" style="display:none">
    	<table id="table_mixta" border="1">
    		<tbody>
    			<tr>
					<td>Actividad</td>
					<td>Nota Obtenida</td>
					<td>Superficie</td>
					<td>Peso</td>
					<td>Valoracion</td>
    			</tr>
    		</tbody>
    	</table>
    </div>
    <div id="div_eval_agricola" style="display:none">
    	<table id="tablaAgricola" border="1"></table>
    	<button id="btnGuardadoAgricola" type="button" onclick=LeerTablaAgricola() class="btn btn-primary">Modificar y Guardar</button>  
    </div>
    <div class="modal fade" id="myModal" role="dialog">
	    <div class="modal-dialog">
	      	<div class="modal-content">
		        <div class="modal-header">
		          	<button type="button" class="close" data-dismiss="modal">&times;</button>
		          	<h4 id="cult" class="modal-title">Modal Header</h4>
		        </div>
		        <div class="modal-body">
		        	<input id="idcamp" type="text" class="hide"> 
		        	<input id="idcompr" type="text" class="hide"> 
		        	<div class="col-sm-6">
		        		<div>
		          			<label>Campaña</label>
		          		</div>
		          		<div>
		          			<label>Sup.Agricola Comprometida</label>
		          		</div>
		          		<div>
		          			<label>Superficie del Cultivo</label>
		          		</div>
		          		<div>
		          			<label>Porcentaje de Superficie</label>
		          		</div>
		          		<div>
		          			<label>Porcentaje de la Valoración</label>
		          		</div>
		          		<div>
		          			<label>Porcentaje Ponderacion</label>
		          		</div>
		          		<div class="">
		          			<label>Variable Campaña</label>
		          		</div>
		        	</div>
		        	<div class="col-sm-6">
		        		<div>
		          			<label id="camp"></label>
		          		</div>
		        		<div>
		          			<label id="sup_compro_agri"></label>
		          		</div>
		        		<div>
		          			<label id="sup_ccultivo"></label>
		          		</div>
		          		<div>
		          			<label id="porc_sup"></label>
		          		</div>
		          		<div>
		          			<input id="porc_valoracion" type="text" onkeypress="return isfloat(event, this, 100);ActualizarPorcentaje()" onchange="ActualizarPorcentaje()" ></input>
		          		</div>
		          		<div>
		          			<label id="porc_pond">0</label>
		          		</div>
		          		<div class="">
		          			<label id="var_campa"></label>
		          		</div>
		        	</div>
		        </div>	
		        <div class="modal-footer">
		          	<button type="button" id="btnCalcularModal" class="btn btn-default" data-dismiss="modal">Calcular</button>
		        </div>
	      	</div>
	    </div>
    </div>
</body>
</html>	