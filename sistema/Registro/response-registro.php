 <?php
 session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/sistema/config/config.php';
require_once APPPATH . '/registro/GestorRegistro.php';
if (is_ajax()) {
    if (isset($_POST["action"]) && !empty($_POST["action"])) { //Checks if action value exists
        $action = $_POST["action"];
        switch ($action) { //Switch case for value of action
           case "buscar": buscarRegistro();
                break;

                case "buscarespecies": buscarEspecies();
                     break;
                   case "guardar-ig": insertarInformacionGeneral();
                break;
            case "gettecnicos": getTecnicos();
                break;
            // case "guardar-funcionario": insertarFuncionario();
            //     break;
            // case "guardar-propietario": insertarPropietario();

            //     break;
                case 'agricola-rcia':guardarAgricolaRcia();
                  # code...
                  break;



        }
    }
}

//Function to check if the request is an AJAX request
function is_ajax() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}
 function eliminarPredio()
 {
 $response=array();
    $gestorpredio=new GestorPredio();
  $id=@$_POST["id"];
  $accion =@$_POST["action"];

$response=$gestorpredio->deletePredio($id);

header('Content-type: application/json; charset=utf-8');

echo json_encode($response,JSON_FORCE_OBJECT);
}


function buscarRegistro()
 {
     $response=array();
     $gestorregistro=new GestorRegistro();
     $codparcela =@$_POST["b_codigo"];
     $nombre =@$_POST["b_nombre"];

         $dpto = @$_POST["dpto"];
    $porciones = explode(",", $dpto);
    $id=$porciones[0];
    $departamento =$porciones[1];
     $ct_step =@$_POST["step"];
     $step =@$_POST["step"];

$response= $gestorregistro->getDatosPredioAllObject($codparcela,$nombre,$departamento);

header('Content-type: application/json; charset=utf-8');

echo json_encode($response,JSON_FORCE_OBJECT);
}



function buscarEspecies()
 {
     $response=array();
     var_dump($_POST);
     exit();

     $gestorregistro=new GestorRegistro();
     $comun =@$_POST["b_comun"];
     $cientifico =@$_POST["b_cientifico"];

  //  $dpto = @$_POST["dpto"];
  //   $porciones = explode(",", $dpto);
  //   $id=$porciones[0];
  //   $departamento =$porciones[1];
     $ct_step =@$_POST["step"];
     $step =@$_POST["step"];

$response= $gestorregistro->getDatosEspeciesAllObject($comun,$cientifico);

header('Content-type: application/json; charset=utf-8');

echo json_encode($response,JSON_FORCE_OBJECT);
}





function guardarAgricolaRcia(){
  if(isset($_GET['idreg'])){
    $idreg=$_GET['idreg'];
    $_SESSION['idreg']=$idreg;
}
  $codpredio=@$_SESSION['idreg'];
  if ($codpredio!="" && $codpredio>0) {
    # code...
 $response=array();
var_dump($_POST);

        ///GUARDAMOS LOS DATOS AGRICOLAS

    if($_SESSION['datos_agricola']['num_cul0']>0 && $_SESSION['datos_agricola']['num_cul']>0){

      //////////////llenado del plan 5 años//////////////////////////////
      //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++/
        for ($i = 1; $i <=$_SESSION['datos_agricola']['num_cul'] ; $i++) {
      if(isset($_SESSION['datos_agricola']['cultivo'.$i])&& $_SESSION['datos_agricola']['cultivo'.$i]>0){
        if($_SESSION['datos_agricola']['cultivo'.$i]!=0){
          $insertaux=sprintf("insert into auxiliar values(%s, %s, %s);",
                     GetSQLValueString($_SESSION['idreg'], "int"),
                     GetSQLValueString("plancultivo", "text"),
                     GetSQLValueString('1,'.GetSQLValueString($_SESSION['datos_agricola']['cultivo'.$i],"int").','.$_SESSION['idreg'].','.  $_SESSION['datos_agricola']['SupVerano1'.$i].','.$_SESSION['datos_agricola']['SupInvierno1'.$i], "text"));
      $Result2 = pg_query($cn, $insertaux);
           $insertaux=sprintf("insert into auxiliar values(%s, %s, %s);",
                     GetSQLValueString($_SESSION['idreg'], "int"),
                     GetSQLValueString("plancultivo", "text"),
                     GetSQLValueString('2,'.GetSQLValueString($_SESSION['datos_agricola']['cultivo'.$i],"int").','.$_SESSION['idreg'].','. $_SESSION['datos_agricola']['SupVerano2'.$i].','. $_SESSION['datos_agricola']['SupInvierno2'.$i], "text"));
      $Result2 = pg_query($cn, $insertaux);
       $insertaux=sprintf("insert into auxiliar values(%s, %s, %s);",
                     GetSQLValueString($_SESSION['idreg'], "int"),
                     GetSQLValueString("plancultivo", "text"),
                     GetSQLValueString('3,'.GetSQLValueString($_SESSION['datos_agricola']['cultivo'.$i],"int").','.$_SESSION['idreg'].','.  $_SESSION['datos_agricola']['SupVerano3'.$i].','. $_SESSION['datos_agricola']['SupInvierno3'.$i], "text"));
      $Result2 = pg_query($cn, $insertaux);
          $insertaux=sprintf("insert into auxiliar values(%s, %s, %s);",
                     GetSQLValueString($_SESSION['idreg'], "int"),
                     GetSQLValueString("plancultivo", "text"),
                     GetSQLValueString('4,'.GetSQLValueString($_SESSION['datos_agricola']['cultivo'.$i],"int").','.$_SESSION['idreg'].','. $_SESSION['datos_agricola']['SupVerano4'.$i].','. $_SESSION['datos_agricola']['SupInvierno4'.$i], "text"));
      $Result2 = pg_query($cn, $insertaux);
          $insertaux=sprintf("insert into auxiliar values(%s, %s, %s);",
                     GetSQLValueString($_SESSION['idreg'], "int"),
                     GetSQLValueString("plancultivo", "text"),
                     GetSQLValueString('5,'.GetSQLValueString($_SESSION['datos_agricola']['cultivo'.$i],"int").','.$_SESSION['idreg'].','. $_SESSION['datos_agricola']['SupVerano5'.$i].','. $_SESSION['datos_agricola']['SupInvierno5'.$i], "text"));
      $Result2 = pg_query($cn, $insertaux);
         }
        }
       } //for
      ///////////////************fin*******************/////////

      $a="update registro set obsregistro='".$_SESSION['datos_agricola']['RObservacion']."' where idregistro=".$_SESSION['idreg'];
    //echo $a;
    $Result2 = pg_query($cn, $a);

    } ///if guardar datos agricolas


  $response["success"] = true;
   $response["data"] = array(
    'message' => 'Comprelte datos del predio'
    );

  }else{
 $response["success"] = false;
   $response["data"] = array(
    'message' => 'Comprelte datos del predio'
    );
  }
header('Content-type: application/json; charset=utf-8');

echo json_encode($response,JSON_FORCE_OBJECT);
}



function insertarPropietario(){

  $codpredio=@$_SESSION['ctform']['codpredio'];
  if ($codpredio!="" && $codpredio>0) {
    # code...
 $response=array();
$gestorpredio=new GestorPredio();
//PROPIETARIO
   $ct_idpersona=@$_POST["ct_idpersona"]=="" ? 0 : @$_POST["ct_idpersona"];
  $tipodoc =@$_POST["5"];
  $ct_ci =@$_POST["ct_ci"];
  $ct_lugarexp =@$_POST["42"];
  $genero =@$_POST["38"];
  $ct_apellido1 =@$_POST["ct_apellido1"];
  $ct_apellido2 =@$_POST["ct_apellido2"];
  $ct_apellido3 =@$_POST["ct_apellido3"];
  $ct_nombre1 =@$_POST["ct_nombre1"];
  $ct_nombre2 =@$_POST["ct_nombre2"];
  $lugarnaci =@$_POST["37"];
  $estatusjur =@$_POST["7"];
  $estatustrib =@$_POST["8"];
  $tipo_per =@$_POST["41"];
  $codpersoneria =@$_POST["40"];
  $ct_exencion =@$_POST["ct_exencion"];
  $localidad=@$_POST["ct_localidad"];
if ($tipo_per==241) {
  # code...
  $ct_apellido2 ="";
  $ct_nombre1 ="";
  $ct_nombre2 ="";
  $lugarnaci ="null";
  $genero="null";
  $localidad="";
} else if($tipo_per==240) {
  # code...
   $codpersoneria ="null";
}
$cont =@$_POST["cont"];
  $accion =@$_POST["action"];
  $step =@$_POST["step"];
$response= $gestorpredio->guardarPropietario($ct_idpersona, $tipodoc , $ct_ci, $ct_lugarexp  ,
 $ct_nombre1, $ct_nombre2 , $ct_apellido1 , $ct_apellido2, $lugarnaci, $tipo_per, $genero ,
  $codpredio, $estatusjur, $estatustrib, $ct_exencion, $codpersoneria ,$ct_apellido3,$localidad);
//REPRESENTANTE LEGAL
if (@$_POST["representante"]!="") {
 $ct_rep_idpersona = @$_POST["rep_idpersona"]=="" ? 0 : @$_POST["rep_idpersona"];
  $ct_rep_tipo_per = @$_POST["41_rep"];
  $ct_rep_apellido1 = @$_POST["rep_apellido1"];
  $ct_rep_apellido2 = @$_POST["rep_apellido2"];
   $ct_rep_apellido3 = @$_POST["rep_apellido3"];
  $ct_rep_nombre1 = @$_POST["rep_nombre1"];
  $ct_rep_nombre2 = @$_POST["rep_nombre2"];
  $ct_rep_tipodoc = @$_POST["5_rep"];
  $ct_rep_rep_ci = @$_POST["rep_ci"];
  $ct_rep_lugarexp= @$_POST["42_rep"];
 $ct_rep_genero= @$_POST ["38_rep"];
  $ct_rep_direccion = @$_POST["ct_rep_direccion"];
  $ct_rep_docpoder = @$_POST["ct_rep_docpoder"];
   $ct_rep_lugarnaci= @$_POST ["37_rep"];
  $response= $gestorpredio->guardarRepresentanteLegal($ct_rep_idpersona , $ct_rep_tipodoc  ,
   $ct_rep_rep_ci , $ct_rep_lugarexp, $ct_rep_nombre1, $ct_rep_nombre2, $ct_rep_apellido1 ,
    $ct_rep_apellido2 , $ct_rep_lugarnaci, $ct_rep_genero, $codpredio, $ct_rep_direccion ,
     $ct_rep_docpoder,$ct_rep_apellido3 );
}


// CO PROPIETARIOS
if ($cont>0) {
  $co_cantidad =@$_POST["co_cantidad"];
  $i=1;
  $gestorpredio->deleteCoPropietario($codpredio);
if ($co_cantidad!="") {
foreach ($co_cantidad as $key => $val) {
$ct_idpersona1 =@$_POST["ct_idpersona".$val];
  $tipodoc1 =@$_POST["5".$val];
  $ct_ci1 =@$_POST["ct_ci".$val];
  $ct_lugarexp1 =@$_POST["42".$val];
  $genero1 =@$_POST["38".$val];
  $ct_apellido11 =@$_POST["ct_apellido1".$val];
  $ct_apellido21 =@$_POST["ct_apellido2".$val];
  $ct_apellido31 =@$_POST["ct_apellido3".$val];
  $ct_nombre11 =@$_POST["ct_nombre1".$val];
  $ct_nombre21 =@$_POST["ct_nombre2".$val];
  $lugarnaci1 =@$_POST["37".$val];
    $tipo_per1 =@$_POST["41".$val];

    $response1=$gestorpredio->guardarCoPropietario($ct_idpersona1, $tipodoc1 , $ct_ci1, $ct_lugarexp1  ,
     $ct_nombre11, $ct_nombre21 , $ct_apellido11 , $ct_apellido21, $lugarnaci1, $tipo_per1, $genero1 , $codpredio,$ct_apellido31);
$a=$response1["data"] ["dato"][0]->crear_copropietario;
$response["data"] ["dato"][$i]=array('valor'=>$a,'id'=>"#ct_idpersona".$val);
$i++;
}
}
}

 }else{
 $response["success"] = false;
   $response["data"] = array(
    'message' => 'Comprelte datos del predio'
    );
  }
header('Content-type: application/json; charset=utf-8');

echo json_encode($response,JSON_FORCE_OBJECT);
}



function insertarDerechoPropietario(){


  $codpredio=@$_SESSION['ctform']['codpredio'];
  if ($codpredio!="" && $codpredio>0) {
    # code...
 $response=array();
$gestorpredio=new GestorPredio();

   $ct_ddrr_matricula = @$_POST["ct_ddrr_matricula"]=="" ? "null" : @$_POST["ct_ddrr_matricula"];
  $ct_ddrr_ultimoasiento = @$_POST["ct_ddrr_ultimoasiento"]=="" ? "null" : @$_POST["ct_ddrr_ultimoasiento"];
  $ct_ddrr_fecha = @$_POST["ct_ddrr_fecha"]=="" ? "NULL" : "'".@$_POST["ct_ddrr_fecha"]."'";
  $ct_partida = @$_POST["ct_partida"]=="" ? "null" : @$_POST["ct_partida"];
  $ct_fojas = @$_POST["ct_fojas"]=="" ? "null" : @$_POST["ct_fojas"];
  $ct_nrotertimonio = @$_POST["ct_nrotertimonio"]=="" ? "null" : @$_POST["ct_nrotertimonio"];
  $ct_fecharegistro = @$_POST["ct_fecharegistro"]=="" ? "NULL" : "'".@$_POST["ct_fecharegistro"]."'";

 $ct_notario = @$_POST["ct_notario"]=="" ? "null" : @$_POST["ct_notario"];
  $ct_da_fecha =@$_POST["ct_da_fecha"];
  $ct_da_monto =@$_POST["ct_da_monto"];
  $ct_da_moneda =@$_POST["43"];
  $ct_da_clase =@$_POST["10"];
   $ct_da_supdoc = @$_POST["ct_da_supdoc"]=="" ? "null" : @$_POST["ct_da_supdoc"];
    $ct_da_ud = @$_POST["ct_da_ud"];
   $ct_da_tipodoc = @$_POST["9"]=="" ? "null" : @$_POST["9"];
    $ct_da_tipotendencia = @$_POST["11"]=="" ? "null" : @$_POST["11"];

if (@$_POST["ct_dp_option"]==1) {
  $ct_ddrr_matricula ="";
  $ct_ddrr_ultimoasiento = "";
  $ct_ddrr_fecha = "NULL";
$tipo_detalle=1;
} else if (@$_POST["ct_dp_option"]==2) {
    $ct_partida = "";
  $ct_fojas = "";
  $ct_nrotertimonio ="";
  $ct_fecharegistro ="NULL";
 $ct_notario ="";
 $tipo_detalle=2;
} else if (@$_POST["ct_dp_option"]==3) {
    $ct_ddrr_matricula = @$_POST["ct_ddrr_matricula"]=="";
  $ct_ddrr_ultimoasiento = "";
  $ct_ddrr_fecha = "NULL";
      $ct_partida = "";
  $ct_fojas = "";
  $ct_nrotertimonio ="";
  $ct_fecharegistro ="NULL";
 $ct_notario ="";
 $tipo_detalle=3;
  # code...
}else{

}

  $accion =@$_POST["action"];
  $step =@$_POST["step"];
$response= $gestorpredio->guardarDerechoPropietario($codpredio  , $ct_ddrr_matricula , $ct_ddrr_ultimoasiento ,
  $ct_ddrr_fecha, $ct_partida , $ct_fojas , $ct_nrotertimonio , $ct_fecharegistro  , $ct_notario , $ct_da_fecha,
   $ct_da_supdoc, $ct_da_monto , $ct_da_clase  , $ct_da_ud , $ct_da_tipotendencia  , $ct_da_tipodoc  , $ct_da_moneda ,$tipo_detalle );

 }else{
 $response["success"] = false;
   $response["data"] = array(
    'message' => 'Comprelte datos del predio'
    );
  }
header('Content-type: application/json; charset=utf-8');

echo json_encode($response,JSON_FORCE_OBJECT);
}



function insertarDetallePredio(){

  $codpredio=@$_SESSION['ctform']['codpredio'];
  if ($codpredio!="" && $codpredio>0) {
    # code...
 $response=array();
$gestorpredio=new GestorPredio();
$mejoras;
if (@$_POST["21"]=="" || @$_POST["13"]=="") {
  if (@$_POST["21"]!="") {
    $mejoras = @$_POST["21"];
  } else if (@$_POST["13"]!="") {
   $mejoras = @$_POST["13"];
  }

} else {
  $mejoras = array_merge(@$_POST["21"], @$_POST["13"]);
}

  $mejoras[]=@$_POST["14"];
  $mejoras[]=@$_POST["15"];
   $mejoras[] =@$_POST["16"];
  $mejoras[] =@$_POST["17"];
   $mejoras[]=@$_POST["18"];
  $mejoras[] =@$_POST["20"];


  $accion =@$_POST["action"];
  $step =@$_POST["step"];



  $ct_df_sup =@$_POST["ct_df_sup"];
  $ct_df_frente =@$_POST["ct_df_frente"];
  $ct_df_fondo =@$_POST["ct_df_fondo"];
$response= $gestorpredio->guardarFraccion(1 , $codpredio , $ct_df_sup , $ct_df_frente ,
 $ct_df_fondo , $eliminar=0);
$response= $gestorpredio->guardardetalleFraccion($codpredio,1,array_filter($mejoras));
$fraccion2=@$_POST["ct_fraccion2"];
/**/
if ($fraccion2==1) {
 $mejoras2;
if (@$_POST["21_2"]=="" || @$_POST["13_2"]=="") {
  if (@$_POST["21_2"]!="") {
    $mejoras2 = @$_POST["21_2"];
  } else if (@$_POST["13_2"]!="") {
   $mejoras2 = @$_POST["13_2"];
  }

} else {
  $mejoras2 = array_merge(@$_POST["21_2"], @$_POST["13_2"]);
}

  $mejoras2[]=@$_POST["14_2"];
    $mejoras2[]=@$_POST["15_2"];
   $mejoras2[] =@$_POST["16_2"];
  $mejoras2[] =@$_POST["17_2"];
   $mejoras2[]=@$_POST["18_2"];
  $mejoras2[] =@$_POST["20_2"];
  $ct_df_sup2 =@$_POST["ct_df_sup_2"];
  $ct_df_frente2 =@$_POST["ct_df_frente_2"];
  $ct_df_fondo2 =@$_POST["ct_df_fondo_2"];
$response= $gestorpredio->guardarFraccion(2, $codpredio , $ct_df_sup2 , $ct_df_frente2 ,
 $ct_df_fondo2 , $eliminar=0);
$response= $gestorpredio->guardardetalleFraccion($codpredio,2, array_filter($mejoras2));

}else{
  $gestorpredio->eliminarFraccion(2,$codpredio);
}
 $accion =@$_POST["action"];
  $step =@$_POST["step"];
 }else{
 $response["success"] = false;
   $response["data"] = array(
    'message' => 'Comprelte datos del predio'
    );
  }
header('Content-type: application/json; charset=utf-8');

echo json_encode($response,JSON_FORCE_OBJECT);
}

function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
