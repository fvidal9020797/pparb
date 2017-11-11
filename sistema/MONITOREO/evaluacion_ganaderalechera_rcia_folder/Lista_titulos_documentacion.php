<?php
	$idMonitoreo=$_POST['monitoreo'];
	//echo "111111111111111111111111111111111111111111111111111111111".$idMonitoreo;
	include_once('class_documentacion.php');
	include_once('class_documentacion_analisis.php');
	$obj_documentacion=new documentacion();
	$lista_docuementacion=$obj_documentacion->listar();
?>
<table width="100%" border="1" id="table_a_d_g" class="taulaA">
	<thead>
		<tr id="tr1" class="cabecera2" align="center">
			<td style="display:none">id</td>
			<td style="width: 400px;">DETALLE</td>
			<td>MONTO/CANTIDAD</td>
			<td style="width: 450px;">OBSERVACIONES</td>
			<td></td>
		</tr>
		
	</thead>
	<tbody>
		<?php
			$tamaño=count($lista_docuementacion);
			for ($i=0; $i < count($lista_docuementacion); $i++) { 
			 	$obj_documentacion=$lista_docuementacion[$i];
			 	echo "
			 		<tr id='a_d_c_$i' class='cabecera2'>
			 			<td id='$obj_documentacion->iddocumentacion' style='display:none'>$obj_documentacion->iddocumentacion</td>
			 			<td align='center' colspan='3'>$obj_documentacion->nombredocumentacion</td>
			 			<td style='width: 1px'><input type='button' class='cabecera2' value='Agregar' onClick=addtest('a_d_c_$i','$tamaño','$obj_documentacion->iddocumentacion') ></td>
			 		</tr>";
			 		$analisis_documentacion=new analisis_documentacion();
			 		$analisis_documentacion->iddocumentacion=$obj_documentacion->iddocumentacion;
			 		$Lista=$analisis_documentacion->Obtener($analisis_documentacion,$idMonitoreo);
			 		if(count($Lista)>0){
			 			for ($j=0; $j < count($Lista); $j++) { 
			 				$analisis_documentacion=$Lista[$j];
			 				echo "	
			 					<tr id='g_$obj_documentacion->iddocumentacion'>
			 						<td id='g_$obj_documentacion->iddocumentacion' style='display:none'>$analisis_documentacion->id_analisis_documentacion</td>
			 						<td id='m_$obj_documentacion->iddocumentacion' align='center' colspan='1'>$analisis_documentacion->detalle_contenido</td>
			 						<td id='n_$obj_documentacion->iddocumentacion' align='center'> $analisis_documentacion->monto_cantidad</td>
			 						<td id='o_$obj_documentacion->iddocumentacion' align='center' >$analisis_documentacion->observaciones</td>
			 						<td id='g_$obj_documentacion->iddocumentacion' style='width: 1px'><input type='button' class='cabecera2' value='Eliminar' onClick=Eliminar_Fila_table_a_d_g(this)></td>
			 					</tr>
			 				";
			 			}
			 		}	
			} 
		?>
	</tbody>
</table>
