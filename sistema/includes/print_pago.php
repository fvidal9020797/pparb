<?php
session_start();
include "../Valid.php"; 
/// select datos predio///
    $sql_parcela = "select * FROM v_parcela where idregistro=".$_SESSION['idreg'];
	$parcela = pg_query($cn,$sql_parcela);
	$row_parcela = pg_fetch_array ($parcela);
	//$num_parcela=pg_num_rows($parcela);
///datos sup///
	$sql_suprest = "select suptpfp,suptum, supdefilegal  FROM suprestitucion where idregistro=".$_SESSION['idreg'];
	$suprest = pg_query($cn,$sql_suprest);
	$row_suprest = pg_fetch_array ($suprest);
/// monto pago por tipo de propiedad
	$sql_monprop = "SELECT   ufvtipoprop.tpfpplazos, ufvtipoprop.tpfpcontado,  ufvtipoprop.tumplazos,  ufvtipoprop.tumcontado
					FROM ufvtipoprop, parcelas, registro
     				WHERE  ufvtipoprop.idtipopropiedad = parcelas.idtipoprop AND  parcelas.idparcela = registro.idparcela AND  registro.idregistro =".$_SESSION['idreg'];
	$monprop = pg_query($cn,$sql_monprop);
	$row_monprop = pg_fetch_array ($monprop);
    //monto UFV
	$sql_ufv= "SELECT * FROM valoresufv order by fecha_ufv desc limit 1";
	$ufv = pg_query($cn,$sql_ufv);
	$row_ufv = pg_fetch_array ($ufv);
	//TIPO DE PAGO
	$sql_TipoPago= "select * FROM codificadores where idclasificador=14";
	$TipoPago = pg_query($cn,$sql_TipoPago);
	$row_TipoPago = pg_fetch_array ($TipoPago);
	$num_TipoPago=pg_num_rows($TipoPago);
	
	$nombre_parcela = strtoupper($row_parcela['nombre']);
$codigo_parcela = strtoupper($row_parcela['idparcela']);
$ubicacion = strtoupper($row_parcela['comp']);

$mar_sup = 0.6;

$mar_izq *= 144;
$mar_sup *= 144;
$mar_cent_der *= 144;
$mar_cent_inf *= 144;

$dezplazamiento = 1147;
$dezplazamiento += $mar_cent_inf;
$dezplazamiento += $mar_sup;
$escale = 1;

$impresora = printer_open($_SESSION['conf_print']['impresoras']);
printer_start_doc($impresora,'Codigo Parcela: '.$codigo_parcela.' '.date('Y-m-d  h:i:s')); 
printer_start_page($impresora);
printer_set_option($impresora, PRINTER_RESOLUTION_Y,20);
printer_set_option($impresora, PRINTER_RESOLUTION_x,20);
printer_set_option($impresora, PRINTER_COPIES,$_SESSION['conf_print']['copias']);

//da  la escala de impresion
//printer_set_option($impresora,PRINTER_SCALE,10);

/**
*dar ordenes de impresion
*/
/**
*pago
*/
$font = printer_create_font("Verdana", 55*$escale , 25*$escale , PRINTER_FW_THIN, false, false, false, 0);
printer_select_font($impresora, $font);

/**
*DATOS PERSONALES - DATOS PERSONA
*//*
if(isset($_SESSION['conf_print']['all']) || isset($_SESSION['conf_print_datos']['nombre'])){
	printer_draw_text($impresora, $nombre_conductor , (1230*$escale)+$mar_izq, (389*$escale) +$mar_sup);//ok
	printer_draw_text($impresora, $apellido_paterno.' ' , (650*$escale)+$mar_izq, (389*$escale) +$mar_sup);//ok
	printer_draw_text($impresora, $apellido_materno , (900*$escale)+$mar_izq, (389*$escale) +$mar_sup);//ok
}*/
/*
if(isset($_SESSION['conf_print']['all']) || isset($_SESSION['conf_print_datos']['lic_temp'])){
	printer_draw_text($impresora, $lic_temp , (2390*$escale)+$mar_izq, (27*$escale) +$mar_sup);//ok
}

if(isset($_SESSION['conf_print']['all']) || isset($_SESSION['conf_print_datos']['licanterior'])){
		printer_draw_text($impresora, $telef_p , (1955*$escale)+$mar_izq + $max_cent_der, (732*$escale)+$mar_sup);//ok
		printer_draw_text($impresora, $telef_g , (1955*$escale)+$mar_izq + $max_cent_der, (962*$escale)+$mar_sup);//ok
}

if(isset($_SESSION['conf_print']['all']) || isset($_SESSION['conf_print_datos']['carnet'])){
	printer_draw_text($impresora, $ci_conductor , (2028*$escale)+$mar_izq, (389*$escale) +$mar_sup);//ok
	//printer_draw_text($impresora, $ci_lugar , (790*$escale)+$mar_izq, (820*$escale) +$mar_sup);//ok
}	

if(isset($_SESSION['conf_print']['all']) || isset($_SESSION['conf_print_datos']['expedicion'])){
	printer_draw_text($impresora,$fil_lugar.' '.$fecha_expedicion , (685*$escale)+$mar_izq, (1074*$escale) +$mar_sup);//ok87897
}	
if(isset($_SESSION['conf_print']['all']) || isset($_SESSION['conf_print_datos']['edad'])){
	printer_draw_text($impresora, $edad .'años', (1910*$escale)+$mar_izq + $mar_cent_der, (504*$escale) +$mar_sup);//ok
}	
if(isset($_SESSION['conf_print']['all']) || isset($_SESSION['conf_print_datos']['nacionalidad'])){
	printer_draw_text($impresora, $nacionalidad , (500*$escale)+$mar_izq + $mar_cent_der, (504*$escale) +$mar_sup);//ok
}	
if(isset($_SESSION['conf_print']['all']) || isset($_SESSION['conf_print_datos']['estado'])){
	printer_draw_text($impresora, $e_civil , (400*$escale)+$mar_izq + $mar_cent_der, (614*$escale) +$mar_sup);//ok
}	
if(isset($_SESSION['conf_print']['all']) || isset($_SESSION['conf_print_datos']['profesion'])){
	printer_draw_text($impresora, $profesion , (1700*$escale)+$mar_izq + $mar_cent_der, (614*$escale) +$mar_sup);//ok
}	
if(isset($_SESSION['conf_print']['all']) || isset($_SESSION['conf_print_datos']['domicilio'])){
	printer_draw_text($impresora, $domicilio, (420*$escale)+$mar_izq + $mar_cent_der, (732*$escale) +$mar_sup);//ok
	printer_draw_text($impresora, $no_p , (1550*$escale)+$mar_izq + $mar_cent_der, (732*$escale) +$mar_sup);//ok8979875656456
}	
*/
/**
*DATOS PERSONALES - DATOS GARANTE
*/
/*
if(isset($_SESSION['conf_print']['all']) || isset($_SESSION['conf_print_datos']['nombre_g'])){
	printer_draw_text($impresora, $nombre_g , (750*$escale)+$mar_izq + $mar_cent_der,(846*$escale) +$mar_sup);//ok
}	
if(isset($_SESSION['conf_print']['all']) || isset($_SESSION['conf_print_datos']['ci_g'])){
	printer_draw_text($impresora, $ci_g , (1955*$escale)+$mar_izq + $mar_cent_der, (846*$escale) +$mar_sup);//ok
}	
if(isset($_SESSION['conf_print']['all']) || isset($_SESSION['conf_print_datos']['domicilio_g'])){
	printer_draw_text($impresora, $domicilio_g, (400*$escale)+$mar_izq + $mar_cent_der, (962*$escale) +$mar_sup);//ok
	printer_draw_text($impresora, $no_g , (1550*$escale)+$mar_izq + $mar_cent_der, (962*$escale) +$mar_sup);//ok97987897954654897
}


finaliza la impresion
*/
printer_delete_font($font);
printer_end_page($impresora);
printer_end_doc($impresora);
printer_close($impresora);
?>
