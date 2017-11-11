<?php
//hacemos la petición a la api via curl
$crebo='http://192.168.1.247/api/';
$moduloPagos='cuentas/pagos/';
$accionPagos="accion/resumen/";
$apiKey='CREBO-API-KEY/4hu4fWMCIhCXyq0U8TP0CMJ9waHkCGNcsrqok4zS';
$fechaInicio='01-05-2013';// dia-mes-año
$fechaFin='30-05-2017';// dia-mes-año
$p1='/FECHA_REGISTRO_PAGO_INICIO/'.$fechaInicio.'/';
$p2='FECHA_REGISTRO_PAGO_FIN/'.$fechaFin.'/';
//$p1="";
//$p2="";
$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_URL => $crebo.$moduloPagos.$accionPagos.$p1.$p2.$apiKey
));
$response = curl_exec($ch);
//echo($response);exit;
//como pedimos un json, debemos decodificarlo con json_decode para accederlo
$jsondecode = json_decode($response, true);
//echo $jsondecode[0]["ID_PARCELA"];
//exit;
  if($jsondecode['status'])
    {
       var_dump($jsondecode['data']);
    }
     
    else
    {
	echo	$jsondecode["error"];
	echo "<br>";
	echo  $jsondecode["message"];
    }

?>