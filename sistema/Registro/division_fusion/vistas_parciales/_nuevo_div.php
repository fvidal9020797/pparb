<script>
$(document).ready(function(){
    cargar_abt();cargar_vdra();cargar_municipios();
});
var lista_municipio;
function cargar_abt(){
	$.ajax({
		url:'vistas_parciales/c_ajax.php',
	    type:'POST',
	    data:{
	    	datos:"2:138",
	    },
	    success: function (data){
	       	var list_array=data.split("!");
	    	for (var i = 0; i < list_array.length-1; i++) {
	    		var array=list_array[i];
	    		array=array.split(":");
    		    var x = document.getElementById("select_abt");
			    var option = document.createElement("option");
			    option.value = array[0];
			    option.text = array[1];
			    x.add(option);
	    	}
	    }
	});
}
function cargar_vdra(){
	$.ajax({
		url:'vistas_parciales/c_ajax.php',
	    type:'POST',
	    data:{
	    	datos:"2:137",
	    },
	    success: function (data){
	    	var list_array=data.split("!");
	    	for (var i = 0; i < list_array.length-1; i++) {
	    		var array=list_array[i];
	    		array=array.split(":");
    		    var x = document.getElementById("select_vdra");
			    var option = document.createElement("option");
			    option.value = array[0];
			    option.text = array[1];
			    x.add(option);
	    	}
	    }
	});
}
function cargar_municipios(){
	$.ajax({
		url:'vistas_parciales/c_ajax.php',
	    type:'POST',
	    data:{
	    	datos:"6",
	    },
	    success: function (data){
	    	lista_municipio=data.split("!");
	    }
	});
}
$(function() {
	$("#fecha_fusion").datepicker({
        changeMonth: true,
        changeYear: true,
        maxDate: "+5y +1M +10D",
        dateFormat: "yy-mm-dd"
    });
});
function Buscar(){
	if(validar($("#txtCodigo").val().trim())==false){
		quitar_error_codigo();
		$.ajax({
			url:'vistas_parciales/c_ajax.php',
		    type:'POST',
		    data:{
		    	datos:"1:"+$("#txtCodigo").val(),
		    },
		    success: function (data){
		    	agregar_fila(data);
		    }
		});
	}
}
function agregar_fila(data){
	if(data!="0:::"){
		if(validacion_post(data.split(":")[3])==false){
			var array=data.split(":");
			var table = document.getElementById('tabla_adicion');
			var rowCount = table.rows.length;
		    var row = table.insertRow(rowCount);
		    row.setAttribute("id",rowCount);
		    var cell1 = row.insertCell(0);
		    var element1 = document.createElement("p");
		    element1.setAttribute("id",array[0].trim());
		    element1.innerHTML=array[0].trim();
		    element1.type = "text";
		    cell1.appendChild(element1);
		    var cell2 = row.insertCell(1);
		    var element2 = document.createElement("p");
		    element2.innerHTML=array[1].trim();
		    element2.type = "text";
		    cell2.appendChild(element2);

		    var cell3 = row.insertCell(2);
		    var element3 = document.createElement("p");
		    element3.innerHTML=array[2].trim();
		    element3.type = "text";
		    cell3.appendChild(element3);
		    var cell4 = row.insertCell(3);
		    var element4 = document.createElement("p");
		    element4.innerHTML=array[3].trim();
		    element4.type = "text";
		    cell4.appendChild(element4);
		    var cell5= row.insertCell(4);//DELETE.GIF
		    var element5 = document.createElement("input");
		    element5.setAttribute("src","../../images/DELETE.GIF");
		    element5.setAttribute("id","del"+rowCount);
		    element5.setAttribute("onclick","borrar_fila('"+rowCount+"')");
		    element5.type = "image";
		    cell5.appendChild(element5);
		}
	}else{
		$("#predio_no_encontrado").html("ERROR: No se puede encontrar el predio");
		$("#predio_no_encontrado").css({
			"display":"block"
		});
	}
}
function borrar_fila(id){
	var table = document.getElementById('tabla_adicion');
	document.getElementById(id).remove();
}
function quitar_error_codigo(){
	$("#predio_no_encontrado").css({
		"display":"none"
	});
}
function validar(id){
	var result=false;
	if(repetido(id)==true){
		$("#predio_no_encontrado").html("ERROR: El predio ya fue agregado para fusionar");
		$("#predio_no_encontrado").css({
		"display":"block"
		});
		result = true;
	}
	else if(vacio(id)==true){
		$("#predio_no_encontrado").html("ERROR: debe ingresar el codigo del predio");
		$("#predio_no_encontrado").css({
			"display":"block"
		});
		result = true;
	}
	return result;
}
function repetido(id){
	var result=false;
	$('#tabla_adicion tr td p').each(function(){
		if($(this).attr('id')!="undefined"){
			if(id==$(this).attr('id')){
				result = true;
			}
		}
	});
	return result;
}
function vacio(id){
	var result=false;
	if(id==""){
		result = true;
	}
	return result;
}
function guardar(){
	if(before_save()==false){
		document.getElementById("guardar").setAttribute("data-target","#myModal");
		document.getElementById("guardar").setAttribute("data-toggle","modal");
		$.ajax({
			url:'vistas_parciales/c_ajax.php',
			type:'POST',
			data:{
			   	datos:"3:"+$("#fecha_fusion").val()+":"+document.getElementById('select_abt').options[document.getElementById('select_abt').selectedIndex].value+":"+document.getElementById('select_vdra').options[document.getElementById('select_vdra').selectedIndex].value+":"+cargar_datos_enviar(),
			},
			success: function (data){
				alert(data);
			  	var lista=data.split(":");
			 	$("#id_parcela_list_ver").html(lista[0]);
			 	$("#id_parcela_list_nombre").html(lista[1]);
			}
		});	
	}
}
function cargar_datos_enviar(){
	var result="";
	$('#tabla_adicion tr td p').each(function(){
		if(typeof($(this).attr('id'))!="undefined"){
			result=result+($(this).attr('id'))+"¬";
		}
	});
	return result;
}
function vaciar_datos_tabla_lista_fusionados(){
	$("#id_parcela_list_ver").html('');
	$("#id_parcela_list_nombre").html('');
}
function validacion_post(estado){
	result = false;
	if(estado=="347"){
		$("#predio_no_encontrado").html("ERROR: predio cancelado");
		$("#predio_no_encontrado").css({
			"display":"block"
		});
		result = true;
	}else if(estado=="240"){
		$("#predio_no_encontrado").html("ERROR: predio suspencion temporal");
		$("#predio_no_encontrado").css({
			"display":"block"
		});
		result = true;
	}else if(estado=="360"){
		$("#predio_no_encontrado").html("ERROR: predio fusionado");
		$("#predio_no_encontrado").css({
			"display":"block"
		});
		result = true;
	}else if(estado=="167"){
		$("#predio_no_encontrado").html("ERROR: predio con Preliquidacion");
		$("#predio_no_encontrado").css({
			"display":"block"
		});
		result = true;
	}
	else if(estado=="136"){
		$("#predio_no_encontrado").html("ERROR: predio en Evaluacion");
		$("#predio_no_encontrado").css({
			"display":"block"
		});
		result = true;
	}

	return result;
}
function before_save(){
	var result=false;
	if($("#fecha_fusion").val().trim()==""){
		$("#fecha_fusion").focus();
		$("#predio_no_encontrado").html("ERROR: debe introducir la fecha de la fusión");
		$("#predio_no_encontrado").css({
			"display":"block"
		});
		result = true;
	}else if(document.getElementById('select_abt').options[document.getElementById('select_abt').selectedIndex].value==""){
		document.getElementById('select_abt').focus();
		$("#predio_no_encontrado").html("ERROR: debe seleccionar un funcionario ABT");
		$("#predio_no_encontrado").css({
			"display":"block"
		});
		result = true;
	}else if(document.getElementById('select_vdra').options[document.getElementById('select_vdra').selectedIndex].value==""){
		document.getElementById('select_vdra').focus();
		$("#predio_no_encontrado").html("ERROR: debe seleccionar un funcionario VDRA");
		$("#predio_no_encontrado").css({
			"display":"block"
		});
		result = true;
	}else if(document.getElementById('tabla_adicion').rows.length<3){
		document.getElementById('txtCodigo').focus();
		$("#predio_no_encontrado").html("ERROR: debe seleccionar por lo menos 2 predios para guardar");
		$("#predio_no_encontrado").css({
			"display":"block"
		});
		result = true;
	}
	return result;
}
function agregar_nueva_division(){
	var table = document.getElementById('tabla_adicion');
	var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);
    row.setAttribute("id",rowCount);
    var cell1 = row.insertCell(0);
    var element1 = document.createElement("p");
    element1.setAttribute("id",rowCount);
    element1.innerHTML="";
    element1.type = "text";
    cell1.appendChild(element1);
    var cell2 = row.insertCell(1);
    var element2 = document.createElement("textarea");
    element2.type = "text";
    cell2.appendChild(element2);
    var cell3 = row.insertCell(2);
    var element3 = document.createElement("input");
    element3.type = "text";
    cell3.appendChild(element3);

    var cell4 = row.insertCell(3);
    var element4 = document.createElement("select");
    element4.setAttribute("id","select_municipio"+rowCount);
    element4.type = "text";
    cell4.appendChild(element4);
    for (var i = 0; i < lista_municipio.length-1; i++) {
    	var data=lista_municipio[i].split(":");
    	var x = document.getElementById("select_municipio"+rowCount);
    	var option = document.createElement("option");
    	option.value=data[0];
    	option.text = data[1];
    	x.add(option); 
    };
    var cell5 = row.insertCell(4);//DELETE.GIF
    var element5 = document.createElement("input");
    element5.setAttribute("src","../../images/DELETE.GIF");
    element5.setAttribute("id","del"+rowCount);
    element5.setAttribute("onclick","borrar_fila('"+rowCount+"')");
    element5.type = "image";
    cell5.appendChild(element5);
}
</script>
<div style="text-align: -webkit-center;  height: auto;">
	<div class="container">
	<table border="0" class="table">
		<tr>
			<td align="center" colspan="2">
				Nueva Division
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<div id="predio_no_encontrado" style="display:none;margin-right: -300px; border-color: transparent; background-color: transparent; margin-top: -15px; margin-bottom: -15px; "class="alert alert-danger" role="alert">Error: no se encontro el predio</div>
			</td>
		</tr>	
		<tr>
			<td>
				<div class="input-group">
      				<input id="txtCodigo" onkeypress="quitar_error_codigo()" type="text" class="form-control" placeholder="Buscar Codigo Carpeta">
      				<span class="input-group-btn">
        				<button class="btn btn-default" type="button" onclick="Buscar()">Agregar</button>
      				</span>
    			</div>
			</td>
			<td>
				<div class="input-group">
      				<input type="text" id="fecha_fusion" class="form-control" placeholder="Fecha">
      				<span class="input-group-btn">
        				<button class="btn btn-default" type="button">Buscar</button>
      				</span>
    			</div><!-- /input-group -->
			</td>
		</tr>
		<tr>
			<td>
  				<select id="select_abt" class="form-control">
  					<option value="" selected disabled>Funcionario ABT</option>
				</select>
			</td>
			<td>
				<select id="select_vdra" class="form-control">
 					<option value="" selected disabled>Funcionario VDRA</option>
				</select>    			
			</td>
		</tr>
		<tr>
			<td valign="bottom">
				<h5>Lista de predios a dividir<span class="label label-default"></span></h5>
			</td>
			<td>
				<div style="float: right;margin-right: 50px;cursor: pointer;" onclick="agregar_nueva_division()">
					<span class="borderLblau">Nueva division
						<input type="image" onclick="" src="../../images/reg_adm.gif" alt="Agregar Persona" border="0">
					</span>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<table id="tabla_adicion"  class="table">
					<thead>
						<th>Codigo</th>
						<th>Nombre</th>
						<th>Superficie</th>
						<th>Municipio</th>
						<th>Quitar</th>	
					</thead>
					<tbody>
					</tbody>
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<button type="button" id="guardar" onclick="guardar()" class="btn btn-success">Guardar</button>
				<button type="button" onclick="cancel()" class="btn btn-success">Salir</button>
			</td>
		</tr>
	</table>
	</div>
</div>
<div class="container">
  	<!-- Modal -->
 	<div class="modal fade" id="myModal" role="dialog">
    	<div class="modal-dialog">
      		<!-- Modal content-->
      		<div class="modal-content">
        		<div class="modal-header">
          			<button type="button" class="close"  data-dismiss="modal" onclick="cancel()">&times;</button>
          			<h4 class="modal-title">Detalle de la fusión</h4>
        		</div>
        		<div class="modal-body">
          			<p>Código:<label  id="id_parcela_list_ver">Nombre</label></p>
          			<p>Nombre:<label id="id_parcela_list_nombre">Nombre</label></p>
        		</div>
        		<div class="modal-footer">
          			<button type="button" class="btn btn-default" data-dismiss="modal"  onclick="cancel()">Close</button>
        		</div> 
      		</div>
    	</div>
  	</div>
</div>