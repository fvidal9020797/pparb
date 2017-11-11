<?php

$_pagi_nav_estilo_mod2="";

if(empty($_pagi_sql)){

die("<b>Error : </b>No se ha definido la variable \$_pagi_sql");
}

if(empty($_pagi_cuantos)){

$_pagi_cuantos = 20;
}

if(!isset($_pagi_mostrar_errores)){

$_pagi_mostrar_errores = true;
}

if(!isset($_pagi_conteo_alternativo)){

$_pagi_conteo_alternativo = false;
}

if(!isset($_pagi_separador)){

$_pagi_separador = " | ";
}

if(isset($_pagi_nav_estilo)){

$_pagi_nav_estilo_mod = "class=\"$_pagi_nav_estilo\"";
}else{
$_pagi_nav_estilo_mod = "";
}

if(!isset($_pagi_nav_anterior)){

$_pagi_nav_anterior = "&laquo; Anterior";
}

if(!isset($_pagi_nav_siguiente)){

$_pagi_nav_siguiente = "Siguiente &raquo;";
}

if(!isset($_pagi_nav_primera)){

$_pagi_nav_primera = "&laquo;&laquo; Primera";
}

if(!isset($_pagi_nav_ultima)){

$_pagi_nav_ultima = "&Uacute;ltima &raquo;&raquo;";
}
if (empty($_GET['_pagi_pg'])){

$_pagi_actual = 1;
}else{

$_pagi_actual = $_GET['_pagi_pg'];
}

if($_pagi_conteo_alternativo == false){
    
 //$con = pg_connect("host=".DB_HOST." port=5432 user=".DB_USER." password=".DB_PASSWD." dbname=".DB_NAME." ");
//  require_once '../reportes/Conexion.php';
//    $con = Conexion::create();
$_pagi_sqlConta = "SELECT COUNT(*) as a FROM (".$_pagi_sql.") as f";
$_pa2 =pg_query($cn,$_pagi_sqlConta);
$_pagi_result2 = pg_result($_pa2,"0","a");

if($_pagi_result2 == false && $_pagi_mostrar_errores == true){
//die (" parra Error en la consulta de conteo de registros: $_pagi_sqlConta. // xxxxxxxxxxx $_pagi_result2 xxxxxx postgres dijo: <b>".pg_result_error($_pa2)."</b>");
//falta mensaje cuando la  $_pagi_sqlConta=0
}
//echo"Cantidad de registros ".$_pagi_result2;
$cantRegistros="Cantidad de registros: ".$_pagi_result2;
$_pagi_totalReg=pg_result($_pa2,"0","a");
//echo"\ntotal de registros".$_pagi_totalReg;
$numToRegistros="\ntotal de registros".$_pagi_totalReg;

}else{
$_pagi_result3=pg_query($con,$_pagi_sql);

if($_pagi_result3 == false && $_pagi_mostrar_errores == true){
die (" Error en la consulta de conteo alternativo de registros: $_pagi_sql. eche dijo: <b>".pg_error($con)."</b>");
}
$_pagi_totalReg=pg_numrows($_pagi_result3);

}

$_pagi_totalPags = ceil($_pagi_totalReg / $_pagi_cuantos);


$_pagi_enlace = $_SERVER['PHP_SELF'];
$_pagi_query_string = "?";

if(!isset($_pagi_propagar)){

if (isset($_GET['_pagi_pg'])) unset($_GET['_pagi_pg']);
$_pagi_propagar = array_keys($_GET);
}elseif(!is_array($_pagi_propagar)){

die("<b>Error Paginator : </b>La variable \$_pagi_propagar debe ser un array");
}

foreach($_pagi_propagar as $var){
if(isset($GLOBALS[$var])){

$_pagi_query_string.= $var."=".$GLOBALS[$var]."&";
}elseif(isset($_REQUEST[$var])){

$_pagi_query_string.= $var."=".$_REQUEST[$var]."&";
}
}


$_pagi_enlace .= $_pagi_query_string;

$_pagi_navegacion_temporal = array();
if ($_pagi_actual != 1){

$_pagi_url = 1;
$_pagi_navegacion_temporal[] = "<a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."_pagi_pg=".$_pagi_url."'>$_pagi_nav_primera</a>";


$_pagi_url = $_pagi_actual - 1;
$_pagi_navegacion_temporal[] = "<a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."_pagi_pg=".$_pagi_url."'>$_pagi_nav_anterior</a>";
}

if(!isset($_pagi_nav_num_enlaces)){

$_pagi_nav_desde = 1;
$_pagi_nav_hasta = $_pagi_totalPags;
}else{

$_pagi_nav_intervalo = ceil($_pagi_nav_num_enlaces/2) - 1;


$_pagi_nav_desde = $_pagi_actual - $_pagi_nav_intervalo;

$_pagi_nav_hasta = $_pagi_actual + $_pagi_nav_intervalo;




if($_pagi_nav_desde < 1){

$_pagi_nav_hasta -= ($_pagi_nav_desde - 1);

$_pagi_nav_desde = 1;
}

if($_pagi_nav_hasta > $_pagi_totalPags){

$_pagi_nav_desde -= ($_pagi_nav_hasta - $_pagi_totalPags);

$_pagi_nav_hasta = $_pagi_totalPags;

if($_pagi_nav_desde < 1){
$_pagi_nav_desde = 1;
}
}
}

for ($_pagi_i = $_pagi_nav_desde; $_pagi_i<=$_pagi_nav_hasta; $_pagi_i++){
if ($_pagi_i == $_pagi_actual) {

$_pagi_navegacion_temporal[] = "<span ".$_pagi_nav_estilo_mod.">$_pagi_i</span>";
}else{

$_pagi_navegacion_temporal[] = "<a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."_pagi_pg=".$_pagi_i."'>".$_pagi_i."</a>";
}
}


if ($_pagi_actual < $_pagi_totalPags){

$_pagi_url = $_pagi_actual + 1;
//$_pagi_navegacion_temporal[] = "<a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."_pagi_pg=".$_pagi_url."'>$_pagi_nav_siguiente</a>";

// Ademas de modificar los links para que solo apareciera la palabra siguiente

$_pagi_navegacion_temporal[] = "<a ".$_pagi_nav_estilo_mod2." href='".$_pagi_enlace."_pagi_pg=".$_pagi_url."'>$_pagi_nav_siguiente</a>";

$_pagi_url = $_pagi_totalPags;
//$_pagi_navegacion_temporal[] = "<a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."_pagi_pg=".$_pagi_url."'>$_pagi_nav_ultima</a>";

// Ademas de modificar los links para que solo apareciera la palabra siguiente

$_pagi_navegacion_temporal[] = "<a ".$_pagi_nav_estilo_mod2." href='".$_pagi_enlace."_pagi_pg=".$_pagi_url."'>$_pagi_nav_ultima</a>";
}
$_pagi_navegacion = implode($_pagi_separador, $_pagi_navegacion_temporal);

$_pagi_inicial = ($_pagi_actual-1) * $_pagi_cuantos;

$_pagi_sqlLim = $_pagi_sql." LIMIT $_pagi_cuantos OFFSET $_pagi_inicial";
$_pagi_result = pg_query($_pagi_sqlLim);

//echo $_pagi_result;
$_pagi_result;
if($_pagi_result == false && $_pagi_mostrar_errores == true){
die ("Error en la consulta limitada: $_pagi_sqlLim. Mysql dijo: <b>".pg_error($con)."</b>");
}

$_pagi_desde = $_pagi_inicial + 1;

$_pagi_hasta = $_pagi_inicial + $_pagi_cuantos;
if($_pagi_hasta > $_pagi_totalReg){

$_pagi_hasta = $_pagi_totalReg;
}

$_pagi_info = "desde el $_pagi_desde hasta el $_pagi_hasta de un total de $_pagi_totalReg";

?>