<html>
<head>
	<title></title>
	<script>
		$(document).ready(function(){
		    listar_padres();
		});
		function listar_padres(){
			$.ajax({
				url:'vistas_parciales/c_ajax.php',
			    type:'POST',
			    data:{
			    	datos:"4",
			    },
			    success: function(data){
			    	$("#contenedor_lista").html(data);
			    	paginacion();
    			}
			});
		}
		
		function ver(idparcela, nombre){
			$.ajax({
				url:'vistas_parciales/c_ajax.php',
			    type:'POST',
			    data:{
			    	datos:"5:"+idparcela,
			    },
			    success: function(data){
			    	vaciar_datos_tabla_lista_fusionados();
			    	$("#id_parcela_list_ver").html(idparcela);
			   		$("#id_parcela_list_nombre").html(nombre);
			       	var array=data.split("!");
					for (var i = 0; i < array.length-1; i++) {
						var data=array[i].split(":");
						var table = document.getElementById('lista_fusionados');
						var rowCount = table.rows.length;
					    var row = table.insertRow(rowCount);
					    row.setAttribute("id",rowCount);

					    var cell1 = row.insertCell(0);//##########
					    var element1 = document.createElement("p");
					    element1.setAttribute("id",array[0].trim());
					    element1.innerHTML=i+1;
					    element1.type = "text";
					    cell1.appendChild(element1);

					    var cell2 = row.insertCell(1);//Codigo
					    var element2 = document.createElement("p");
					    element2.innerHTML=data[0];
					    element2.type = "text";
					    cell2.appendChild(element2);

					    var cell3 = row.insertCell(2);// Nombre
					    var element3 = document.createElement("p");
					    element3.innerHTML=data[1];
					    element3.type = "text";
					    cell3.appendChild(element3);
					}
			    }
			});
		}
		function vaciar_datos_tabla_lista_fusionados(){
			$("#lista_fusionados tr").remove(); 
			$("#id_parcela_list_ver").html('');
			$("#id_parcela_list_nombre").html('');
		}
		function paginacion(){
		$('#lista').DataTable( {
	        initComplete: function () {
	            this.api().columns().every( function () {
	                var column = this;
	                var select = $('<select><option value=""></option></select>')
	                    .appendTo( $(column.footer()).empty() )
	                    .on( 'change', function () {
	                        var val = $.fn.dataTable.util.escapeRegex(
	                            $(this).val()
	                        );
	                        column
	                            .search( val ? '^'+val+'$' : '', true, false )
	                            .draw();
	                    } );
	                column.data().unique().sort().each( function ( d, j ) {
	                    select.append( '<option value="'+d+'">'+d+'</option>' )
	                });
	            });
	        }
	    });
	} 
	</script>
</head>
<body>
	<br/>
	<div style="float: right;margin-right: 50px;cursor: pointer;" onclick="nuevo()">
		<span class="borderLblau">Nueva Fusion
			<input type="image" onclick="" src="../../images/reg_adm.gif" alt="Agregar Persona" border="0">
		</span>
	</div>
	<br/>
	<div id="contenedor_lista" class="container"></div>
	<div class="container">
	 	<div class="modal fade" id="myModal" role="dialog">
	    	<div class="modal-dialog">
	      		<!-- Modal content-->
	      		<div class="modal-content">
	        		<div class="modal-header">
	          			<button type="button" class="close" onclick="vaciar_datos_tabla_lista_fusionados()" data-dismiss="modal">&times;</button>
	          			<h4 class="modal-title">Detalle de la fusión</h4>
	        		</div>
	        		<div class="modal-body">
	          			<p>Código Predio:<label  id="id_parcela_list_ver">Nombre</label></p>
	          			<p>Nombre Predio:<label id="id_parcela_list_nombre">Nombre</label></p>
	          			<p>Predios Fusionados</p>
	          			<table id="lista_fusionados" class="table">
							<thead>
								<th>#</th>
								<th>Código Parcela</th>
								<th>Nombre Predio</th>
							</thead>
						</table>
	        		</div>
	        		<div class="modal-footer">
	          			<button type="button" class="btn btn-default" onclick="vaciar_datos_tabla_lista_fusionados()" data-dismiss="modal">Close</button>
	        		</div>
	      		</div>
	    	</div>
	  	</div>
	</div>
</body>
</html>

