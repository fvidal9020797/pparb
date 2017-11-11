<?php
	$datos=$_POST['datos'];
	$array_datos=split(":", $datos);
	if($array_datos[0]=="1"){//Busqueda de parcela
		include_once('../modelo/v_parcela/v_parcela.php');
		$_v_parcela=new v_parcela();
		$_v_parcela->idparcela=$array_datos[1];
		$_v_parcela_resp=$_v_parcela->obtener_sin_div_fus($_v_parcela);
		echo $_v_parcela_resp->idparcela.":".$_v_parcela_resp->nombre.":".$_v_parcela_resp->superficie.":".$_v_parcela_resp->comp.":".$_v_parcela_resp->id_estado;	
	}else if($array_datos[0]=="2"){
		include_once('../modelo/v_funcionario/v_funcionario.php');
		$Result="";
		$_v_funcionario=new v_funcionario();
		$_v_funcionario->cargo=$array_datos[1];
		$list_v_funcionario=$_v_funcionario->Obtener($_v_funcionario);
		for ($i=0; $i <count($list_v_funcionario); $i++) { 
			$_v_funcionario=$list_v_funcionario[$i];
			$Result=$Result.$_v_funcionario->idfuncionario.":".$_v_funcionario->nombre."!";
		}
		echo $Result;
	}else if($array_datos[0]=="3"){
		include_once('../modelo/f_predio/f_predio.php');
		include_once('../modelo/t_registro/t_registro.php');
		include_once('../modelo/v_parcela/v_parcela.php');
		include_once('../modelo/t_representante/t_representante.php');
		include_once('../modelo/t_fecharegistro/t_fecharegistro.php');
		include_once('../modelo/t_div_fus/t_div_fus.php');
		$_v_parcela_max_puntuacion=new v_parcela();
		$_v_parcela_max_puntuacion_aux=new v_parcela();
		$combinacion_nombres="FUSION_";
		$fecha_suscripcion="2000-01-01";
		$sumatoria_superficie=0;
		$lista_registros="";
		$listaParcelas=array();
		$list_codigos=split("¬",$array_datos[4]);	
		for ($i=0; $i<count($list_codigos)-1;$i++) {
			$_v_parcela=new v_parcela();
			$_v_parcela->idparcela=$list_codigos[$i];
			$_v_parcela=$_v_parcela->Obtener($_v_parcela);
			$listaParcelas[$i]=$_v_parcela;
			if($i==0){
				$_v_parcela_max_puntuacion_aux=$_v_parcela;
			}
			else{
				if($_v_parcela_max_puntuacion_aux->superficie<$_v_parcela->superficie){
					$_v_parcela_max_puntuacion_aux=$_v_parcela;
				}
			}
			
			$_t_registro=new t_registro();
			$_t_registro->idregistro=$_v_parcela->idregistro;
			$_t_registro->estado=360;
			$_t_registro->modifica_estado($_t_registro);
			$lista_registros=$lista_registros.$_v_parcela->idregistro."¬";
			$combinacion_nombres=$combinacion_nombres.trim($_v_parcela->nombre)."_";
			$sumatoria_superficie=$sumatoria_superficie+$_v_parcela->superficie;
			$_t_fecharegistro=new t_fecharegistro();
			$_t_fecharegistro->idregistro=$_v_parcela->idregistro;
			$_t_fecharegistro=$_t_fecharegistro->Obtener($_t_fecharegistro);
			if($_t_fecharegistro->fechasuscripcion!=""){
				if(date($_t_fecharegistro->fechasuscripcion)>date($fecha_suscripcion)){
					$fecha_suscripcion=$_t_fecharegistro->fechasuscripcion;
				}	
			}
		}
		$predios_mismos_municipios=false;
		$suma_max=0;
		for ($i=0; $i <count($listaParcelas); $i++) { 
			$aux=new v_parcela();
			$aux=$listaParcelas[$i];
			for ($j=$i+1; $j<count($listaParcelas); $j++) { 
				$aux1=new v_parcela();
				$aux1=$listaParcelas[$j];
				if($aux->nombrepolitico==$aux1->nombrepolitico){
					$predios_mismos_municipios=true;
					if($suma_max==0){
						$suma_max=$aux->superficie+$aux1->superficie;
						if($aux->superficie>$aux1->superficie){
							$_v_parcela_max_puntuacion=$aux;
						}else{
							$_v_parcela_max_puntuacion=$aux1;
						}
					}else{
						if($aux->superficie+$aux1->superficie>$suma_max){
							$suma_max=$aux->superficie+$aux1->superficie;
							if($aux->superficie>$aux1->superficie){
								$_v_parcela_max_puntuacion=$aux;
							}else{
								$_v_parcela_max_puntuacion=$aux1;
							}
						}
					}
				}
			}
		}
		if($predios_mismos_municipios==false){
			$_v_parcela_max_puntuacion=$_v_parcela_max_puntuacion_aux;
		}
		$t_representante=new t_representante();
		$t_representante->idparcela=$_v_parcela_max_puntuacion->idparcela;
		$t_representante=$t_representante->Obtener($t_representante);

		$_f_predio=new f_predio();
		$_f_predio->cod="";
		$_f_predio->idpol=$_v_parcela_max_puntuacion->idpolitico;
		$_f_predio->nompredio=trim($combinacion_nombres);
		$_f_predio->sup=$sumatoria_superficie;
		$_f_predio->tipop=$_v_parcela_max_puntuacion->idtipoprop;
		$_f_predio->sit=$_v_parcela_max_puntuacion->idsituacionjuridica;
		$_f_predio->act=$_v_parcela_max_puntuacion->idclasificacionprog;
		$_f_predio->asesora=$_v_parcela_max_puntuacion->idasesoramiento;
		$_f_predio->idrep=$t_representante->idpersona;
		$_f_predio->dirnot=trim($t_representante->dirNotificacion);
		$_f_predio->numpod=$t_representante->num_doc_poder;
		$_f_predio->aaux=trim($_v_parcela_max_puntuacion->numregprof);
		$_f_predio->respabt=$array_datos[2];
		$_f_predio->respvdra=$array_datos[3];
		$_f_predio->esta=136;
		$_f_predio->idof=$_v_parcela_max_puntuacion->idoficina;
		$_f_predio->obser=trim($combinacion_nombres);
		$_f_predio->idreg=0;
		$_f_predio->productivo=$_v_parcela_max_puntuacion->idsectorproductivo;
		$_f_predio->social=$_v_parcela_max_puntuacion->idsectorsocial;
		$_f_predio->act2=$_v_parcela_max_puntuacion->idprod;
		$_f_predio->idpre=0;
		$_f_predio=$_f_predio->guardar($_f_predio);
		$_v_parcela=new v_parcela();
		$_v_parcela->idparcela=$_f_predio->cod;
		$_v_parcela=$_v_parcela->Obtener($_v_parcela);
		$_t_fecharegistro=new t_fecharegistro();
		$_t_fecharegistro->idregistro=$_v_parcela->idregistro;
		$_t_fecharegistro->fechasuscripcion="".$fecha_suscripcion;
		$_t_fecharegistro=$_t_fecharegistro->guardar($_t_fecharegistro);

		$array_lista_registros=split("¬", $lista_registros);
		for ($i=0; $i <count($array_lista_registros)-1; $i++) { 
			$_t_div_fus=new t_div_fus();
			$_t_div_fus->id_pardre=$_v_parcela->idregistro;
			$_t_div_fus->id_hijo=$array_lista_registros[$i];
			$_t_div_fus->fecha=date("Y"."/"."n"."/"."j");
			$_t_div_fus->tipo='0';
			$_t_div_fus->guardar($_t_div_fus);
		}
		echo $_v_parcela->idparcela.":".$_v_parcela->nombre;

	}else if($array_datos[0]=="4"){
		include_once('../modelo/t_div_fus/t_div_fus.php');
		include_once('../modelo/v_parcela/v_parcela.php');
		echo 
		"
			<table id='lista' class='table display' cellspacing='0' width='100%''>
			<thead>
				<tr>
					<th>#</th>
					<th>Código Parcela</th>
					<th>Nombre Predio</th>
					<th>Superficie Total</th>
					<th>Fecha</th>
					<th align='center'>Ver</th>
				</tr>
			</thead>
			<tbody>
		";
		$_t_div_fus=new t_div_fus();
		$List_t_div_fus=$_t_div_fus->listar_padres($_t_div_fus);
		for ($i=0; $i<count($List_t_div_fus); $i++) {
			$_t_div_fus=new t_div_fus();
			$_t_div_fus=$List_t_div_fus[$i];
			$_v_parcela=new v_parcela();
			$_v_parcela->idregistro=$_t_div_fus->id_padre;
			$_v_parcela=$_v_parcela->Obtener_idregistro($_v_parcela);
			echo "
				<tr>
					<td>
			";	
					echo $i+1;
			echo"	</td>
					<td>
			";	
					echo $_v_parcela->idparcela;
			echo"	</td>
					<td>
			";	
					echo $_v_parcela->nombre;
			echo"	</td>
					<td>
			";	
					echo $_v_parcela->superficie;
					$rows=$i+1;
			echo"	</td>
					<td>
			";	
					echo $_t_div_fus->fecha;
			echo"	</td>
					<td>
					<input src='../../images/ver.png' type='image' id=del('$rows') data-target='#myModal' width='20' height='12' data-toggle='modal' onclick=ver('$_v_parcela->idparcela','".str_replace(' ', '', $_v_parcela->nombre)."') style='margin-top:4px;'  />
			";	
			echo"	</td>
				</tr>
			";
		}
		echo "</tbody>
		</table>";
	}else if($array_datos[0]=="5"){
		include_once('../modelo/t_div_fus/t_div_fus.php');
		include_once('../modelo/v_parcela/v_parcela.php');
		$_v_parcela=new v_parcela();
		$_v_parcela->idparcela=$array_datos[1];
		$_v_parcela=$_v_parcela->Obtener($_v_parcela);
		$_t_div_fus=new t_div_fus();
		$_t_div_fus->id_padre=$_v_parcela->idregistro;
		$List_t_div_fus=$_t_div_fus->obtener_hijos($_t_div_fus);
		$result="";
		for ($i=0; $i<count($List_t_div_fus) ; $i++) { 
			$_t_div_fus=$List_t_div_fus[$i];
			$_v_parcela=new v_parcela();
			$_v_parcela->idregistro=$_t_div_fus->id_hijo;
			$_v_parcela=$_v_parcela->Obtener_idregistro($_v_parcela);
			$result=$result.$_v_parcela->idparcela.":".$_v_parcela->nombre."!";
		}
		echo $result;
	}else if($array_datos[0]=="6"){
		include_once('../modelo/v_politico/v_politico.php');
		$_v_politico=new v_politico();
		$list_v_politico=$_v_politico->listar();
		$Result="";
		for ($i=0; $i <count($list_v_politico); $i++) { 
			$_v_politico=new v_politico();
			$_v_politico=$list_v_politico[$i];
			$Result=$Result.trim($_v_politico->cod).":".trim($_v_politico->comp)."!";
		}
		echo $Result;
	}
?>