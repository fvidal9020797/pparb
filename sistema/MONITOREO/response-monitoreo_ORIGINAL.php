 <?php
 session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/sistema/config/config.php';
require_once APPPATH . '/MONITOREO/gestorMonitoreo.php';






if (is_ajax()) {
    if (isset($_POST["action"]) && !empty($_POST["action"])) { //Checks if action value exists
        $action = $_POST["action"];

    switch ($action)
		{ //Switch case for value of action

			     case "asignartecnico": asignartecnico();
                break;
            case "guardar-ig": insertarInformacionGeneral();
                break;
            case "gettecnicos": getTecnicos();
                break;
            case "guardar-funcionario": insertarFuncionario();
                 break;
            case "guardar-propietario": insertarPropietario();
                 break;
            case 'guardar-agricolarcia':guardarAgricolaRcia();
                  break;
            case 'guardar-docagricolarcia':guardarDocPresentadosAgricolaRcia();
                  break;
      			case 'guardar-ganaderarcia':guardarGanaderaRcia();
                  break;

            case 'guardar-docganaderarcia':guardarDocPresentadosGanaderaRcia();
                  break;
      			case 'guardar-bosquercia':guardarBosqueRcia();
                  break;
            case 'guardar-docbosquercia':guardarDocPresentadosBosqueRcia();
                  break;

            case 'guardar-analisisdocrcia':guardarAnalisisDocGanaderoRcia();
                  break;

            case 'guarda-analisisdoc_Agricola':guardaranalisisdocumentosAgricola();
                  break;

            case 'guarda-analisisdoc_bosques':guardarvaloracionbosques();
                  break;

              case 'guardar-analisisdoclecherarcia':guardarAnalisisDocGanaderoLecheraRcia();
                  break;

            case 'guardar-guardarstepganlechrcia':guardarGanaderaLecheraRcia();
                  break;
            case 'guardar-avicola':guardarAvicolaRcia();
                break;

            case 'guarda-analisisdoc_AgricolaC':guardaranalisisdocumentosAgricolaC();
                 break;


            case 'guardar-analisisdoc_GanaderoCampo':guardarAnalisisDocGanaderoRcia_campo();
               break;

            case 'guardarMon_Gabinete':guardarAnalisisDocMon_gabinete();
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


/////////////////////////////////////////// VENTANA INFORMACIÓN GENERAL //////////////////////////////////////////////////
 function insertarInformacionGeneral()
 {
 $response=array();
    $gestormonitoreo=new gestorMonitoreo();
    // echo $_POST['Codigo'];
    if(isset($_POST['Codigo'])){
  $datos_predio=$_POST;
  $_SESSION['datos_predio']=$datos_predio;
}

// var_dump( $_SESSION['datos_predio']);
      /////////////////validacion de datos obligatorios///////////////
    if(!(isset($_SESSION['datos_predio']['Codigo'])&& trim($_SESSION['datos_predio']['Codigo'])!=""))
	{
                 $response["success"] = false;
            $response["data"] = array('message' => 'Verifique su Formulario');
              // trigger_error ("NO Exsite codigo de parcela", E_USER_ERROR);
    }

	/*
	elseif(!( (isset($_SESSION['datos_predio']['51']) && trim($_SESSION['datos_predio']['51'])!="")  or
                (isset($_SESSION['datos_predio']['52']) && trim($_SESSION['datos_predio']['52'])!="") or
            (isset($_SESSION['datos_predio']['53']) && trim($_SESSION['datos_predio']['53'])!="") or
            (isset($_SESSION['datos_predio']['54']) && trim($_SESSION['datos_predio']['54'])!="") or
            (isset($_SESSION['datos_predio']['55']) && trim($_SESSION['datos_predio']['55'])!="") ))
	{
			$response["success"] = false;
            $response["data"] = array('message' => 'Verifique su Formulario');
    } */

    elseif ($_SESSION['datos_predio']['IdRepLegal'] ==0)
      {
    $response["success"] = false;
            $response["data"] = array('message' => 'Verifique su Formulario');
        // trigger_error ("Se Debe Especificar quien el es Representante Legal del Predio", E_USER_ERROR);
         }
      elseif (trim($_SESSION['datos_predio']['Notificacion']) =="")
      {
    $response["success"] = false;
            $response["data"] = array('message' => 'Verifique su Formulario');
       // trigger_error ("Se Debe Especificar La Direccion para Notificacion del Predio", E_USER_ERROR);
        }
      elseif ($_SESSION['datos_predio']['conteo'] ==0)
      {
    $response["success"] = false;
            $response["data"] = array('message' => 'Verifique su Formulario');
        // trigger_error ("Se Debe Especificar al menos un Beneficiario del Predio", E_USER_ERROR);
         }



      elseif ($_SESSION['datos_predio']['Mofrcia'] ==0)
      {
    $response["success"] = false;
            $response["data"] = array('message' => 'Verifique su Formulario');
       // trigger_error ("Se Debe Especificar la Oficina en la que se esta Registrando el Predio", E_USER_ERROR);
          }

   else{
           /////////////Guardar///////////////////

          $cod_par=$_SESSION['datos_predio']['Codigo'];
       /////////////borrar propietarios actuales////////////
          $Result2 = $gestormonitoreo->ejecute($sql= "delete from parcelabeneficiario where idparcela='".$cod_par."'");



           /////////////insertar a los propietarios actuales////////////
          for ($i = 1; $i <=$_SESSION['datos_predio']['conteo'] ; $i++) {
             if(isset($_SESSION['datos_predio']['idp'.$i]) && $_SESSION['datos_predio']['idp'.$i]!=""){
               $insertUSR2=sprintf("insert into parcelabeneficiario values(%s,%s,%s);",
                         GetSQLValueString($_SESSION['datos_predio']['idp'.$i], "int"),
                         GetSQLValueString($_SESSION['cod_parcela'], "text"),0);

               $Result2 = $gestormonitoreo->ejecute($sql= $insertUSR2);

             }
            }
            /////insertando a los miembros de la comunidad
            for ($i = 1; $i <=$_SESSION['datos_predio']['conteoA'] ; $i++) {
             if(isset($_SESSION['datos_predio']['idpA'.$i]) && $_SESSION['datos_predio']['idpA'.$i]!=""){
               $insertUSR2=sprintf("insert into parcelabeneficiario values(%s,%s,%s);",
                         GetSQLValueString($_SESSION['datos_predio']['idpA'.$i], "int"),
                         GetSQLValueString($_SESSION['cod_parcela'], "text"),1);

               $Result2 = $gestormonitoreo->ejecute($sql= $insertUSR2);
              // echo $insertUSR2;
             }
            }

            //insertando los documentos presentados
            /*$sql_documento = "Select idcodificadores From codificadores Where idclasificador=3 Order by idcodificadores";
            $documento = $gestormonitoreo->ejecute($sql= $sql_documento) ;
            $row_documento = pg_fetch_array ($documento);

            do{
              $i=$row_documento['idcodificadores'];
             if(isset($_SESSION['datos_predio'][$i])){
                 $insertaux=sprintf("select * from f_DocPresentado (%s, %s, %s, %s);",
                                   GetSQLValueString(trim($_SESSION['cod_parcela']), "text"),
                                   GetSQLValueString($i, "int"),
                                   GetSQLValueString(trim(strtoupper ($_SESSION['datos_predio'][$i])), "text"),1);
            }else{
               $insertaux=sprintf("select * from f_DocPresentado (%s, %s, %s, %s);",
                                   GetSQLValueString(trim($_SESSION['cod_parcela']), "text"),
                                   GetSQLValueString($i, "int"),
                                   GetSQLValueString(" ", "text"),0);

            }
            $Result2 = $gestormonitoreo->ejecute($sql=  $insertaux);
            }while ($row_documento = pg_fetch_assoc($documento));

            $sql_documento = "Select idcodificadores From \"codificadores\" Where \"idclasificador\"=7 Order by \"idcodificadores\"";
            $documento =$gestormonitoreo->ejecute($sql= $sql_documento) ;
            $row_documento = pg_fetch_array ($documento);

            do{
              $i=$row_documento['idcodificadores'];
             if(isset($_SESSION['datos_predio'][$i])){
                 $insertaux=sprintf("select * from f_CausalesRechazo (%s, %s, %s);",
                                   GetSQLValueString(trim($_SESSION['idreg']), "int"),
                                   GetSQLValueString($i, "int"),
                                   GetSQLValueString(trim(strtoupper ($_SESSION['datos_predio'][$i])), "text"));
                $Result2 = $gestormonitoreo->ejecute($sql= $insertaux);
            }
            }while ($row_documento = pg_fetch_assoc($documento));  */

            //insertando las superficies de rechazo total y parcial
            if(isset($_SESSION['datos_predio']['suprechazadaT'])){
               $insertaux=sprintf("select * from f_SupGeneral (%s, %s, %s);",
                           GetSQLValueString(259, "int"),
                           GetSQLValueString($_SESSION['idreg'], "int"),
                           GetSQLValueString($_SESSION['datos_predio']['suprechazadaT'], "double"));

              $Result2 = $gestormonitoreo->ejecute($sql=  $insertaux);
            }
              if(isset($_SESSION['datos_predio']['suprechazadaP'])){
                  $insertaux=sprintf("select * from f_SupGeneral (%s, %s, %s);",
                           GetSQLValueString(260, "int"),
                           GetSQLValueString($_SESSION['idreg'], "int"),
                           GetSQLValueString($_SESSION['datos_predio']['suprechazadaP'], "double"));
              $Result2 = $gestormonitoreo->ejecute($sql=  $insertaux);

            }
            //observaciones
              $step =@$_POST["step"];
              $obs=@$_POST["MObservacion"];
             $sql_mon = "SELECT *  FROM monitoreo.monitoreo m
              where   m.idregistro=".$_SESSION['idreg']." and m.tipo=266";
              // echo $sql_mon;
            $mon =$gestormonitoreo->ejecute($sql= $sql_mon) ;
            $row_mon= pg_fetch_array ($mon);
           $Result2 = $gestormonitoreo->guardarObs($row_mon['idmonitoreo'],$step=1, $obs,  $estado=1);
            if(isset($_SESSION['cod_par'])){session_unregister('cod_par');}

              $response["success"] = true;
            $response["data"] = array('message' => 'Guardado Exitoso');

          }

  if (isset($_SESSION['ErrorThrown']) && $_SESSION['ErrorThrown'] != "")
             {

            }

  $accion =@$_POST["action"];
    // $codpredio = @$_POST["ct_dgp_codpredio"]=="" ? 0 : @$_POST["ct_dgp_codpredio"];


header('Content-type: application/json; charset=utf-8');

echo json_encode($response,JSON_FORCE_OBJECT);
}

// ASIGNAR TECNICOS
 function asignartecnico()
 {
   $ct_idreg =@$_POST["idreg"];
   /////// OBTENEMOS EL PERIODO /////
   $response=array();
   $gestormonitoreo=new gestorMonitoreo();

/*   $resultSuscripcion = $gestormonitoreo->ejecute($sql= "select r.idregistro, fecharegistro, fechasuscripcion
              from registro as r full join fechasregistro as fr on r.idregistro = fr.idregistro
              where r.idregistro =".$ct_idreg);
   $row_Suscripcion = pg_fetch_array ($resultSuscripcion);
   $fechasuscripcion = $row_Suscripcion['fechasuscripcion'];
   $periodo1_time = date($today="2015-09-29");
   $periodo=2;
   if ($fechasuscripcion!="")
   {
     $predio_time = Date('Y-m-d', strtotime($fechasuscripcion));
     if($periodo1_time > $predio_time)
     {
       $periodo=1;
     }
   } */



 $response=array();
    $gestormonitoreo=new gestorMonitoreo();
    $ct_codigo =@$_POST["codigo"];
     $ct_nombre =@$_POST["nombre"];
     $ct_actividad =@$_POST["actividad"];
     $ct_tipo =@$_POST[33];
     $ct_anho =@$_POST["anho"];
     $ct_bosques =@$_POST["bosques"];
     $ct_alimentos =@$_POST["alimentos"];
     $ct_edi_option =@$_POST["ct_edi_option"];
     $ct_step =@$_POST["step"];
     $agenteauxiliar = @$_POST["agenteauxiliar"]=="" ? "NULL" : "'".@$_POST["agenteauxiliar"]."'";
     $idmonitoreo = @$_POST["ct_idmonitoreo"]=="" ? 0 : @$_POST["ct_idmonitoreo"];
     $oficina = @$_POST["20"]=="" ? "NULL": @$_POST["20"];
     $step =@$_POST["step"];
     $ano= 0;

  /*   if ($periodo == 1)
     {
       $ano =  $ct_anho;
     }
     elseif ($periodo==2)
     {
       $ano =  $ct_anho + 2;
     } */
 $ano =  $ct_anho;


     $tipo1=0;
     $tipo2=0;

    // echo "tipooo=".$ct_tipo;
if($ct_tipo==266){
    $tipo1=266;
    $tipo2=267;
}else{
    $tipo1=267;
    $tipo2=266;
}


$response= $gestormonitoreo->guardarMonitoreo(
    $idmonitoreo,
    $ct_idreg,
    $ano ,
    $tipo1 ,
    $ct_edi_option ,
    $nota=0 ,
    $valoracion=0 ,
    $agenteauxiliar,
    $oficina);

	$idmonitoreo=$response['data']['dato'][0]->ff_monitoreo;   		//servidor
	//$idmonitoreo=$response['data']['dato'][0]->id;				//local

	//echo $response;

$gestormonitoreo->asignarTecnicos($idmonitoreo, $ct_bosques,$ct_alimentos);
//$_SESSION['ctform']['idmonitoreo']= $idmonitoreo;


$response= $gestormonitoreo->guardarMonitoreo(
    $idmonitoreo,
    $ct_idreg,
    $ano ,
    $tipo2 ,
    $ct_edi_option ,
    $nota=0 ,
    $valoracion=0 ,
    $agenteauxiliar,
    $oficina);

	$idmonitoreo=$response['data']['dato'][0]->ff_monitoreo;   		//servidor
	//$idmonitoreo=$response['data']['dato'][0]->id;				//local

	//echo $response;

$gestormonitoreo->asignarTecnicos($idmonitoreo, $ct_bosques,$ct_alimentos);
$_SESSION['ctform']['idmonitoreo']= $idmonitoreo;



header('Content-type: application/json; charset=utf-8');
echo json_encode($response,JSON_FORCE_OBJECT);
}

 // OBTENER TECNICOS DEL MONITOREO
function getTecnicos()
 {
 $response=array();
    $gestormonitoreo=new gestorMonitoreo();
    $ct_codigo =@$_POST["Codigo"];
     $ct_idreg =@$_POST["idreg"];
     $ct_nombre =@$_POST["nombre"];
     $ct_actividad =@$_POST["actividad"];
     $ct_tipo =@$_POST[33];
     $ct_anho =@$_POST["anho"];
     $ct_bosques =@$_POST["bosques"];
     $ct_alimentos =@$_POST["alimentos"];
     $ct_step =@$_POST["step"];
  $agenteauxiliar = @$_POST["agenteauxiliar"]=="" ? "NULL" : "'".@$_POST["agenteauxiliar"]."'";
    $idmonitoreo = @$_POST["ct_idmonitoreo"]=="" ? 0 : @$_POST["ct_idmonitoreo"];
      $oficina = @$_POST["ct_oficina"]=="" ? "NULL": @$_POST["ct_oficina"];
  $step =@$_POST["step"];

$response= $gestormonitoreo->getTecnicos($ct_idreg,$ct_anho,$ct_tipo);

header('Content-type: application/json; charset=utf-8');

echo json_encode($response,JSON_FORCE_OBJECT);
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////



////////////////////////////////////////////// VENTANA RCIA AGRICOLA //////////////////////////////////////////////
function guardarAgricolaRcia(){

/////// OBTENEMOS EL PERIODO /////
$response=array();
$gestormonitoreo=new gestorMonitoreo();
$resultSuscripcion = $gestormonitoreo->ejecute($sql= "select r.idregistro, fecharegistro, fechasuscripcion
           from registro as r full join fechasregistro as fr on r.idregistro = fr.idregistro
           where r.idregistro =".$_SESSION['idreg']);
$row_Suscripcion = pg_fetch_array ($resultSuscripcion);
$fechasuscripcion = $row_Suscripcion['fechasuscripcion'];
$periodo1_time = date($today="2015-09-29");
$periodo=2;
if ($fechasuscripcion!="")
{
  $predio_time = Date('Y-m-d', strtotime($fechasuscripcion));
  if($periodo1_time > $predio_time)
  {
    $periodo=1;
  }
}


$response=array();
$anoperdos = 3;

for($j=1;$j<=5;$j++)
{
     $ano = 0;
     if ($periodo == 1)
     {
       $sql_mon = "select *  FROM monitoreo.monitoreo m where m.idregistro=".$_SESSION['idreg']." and m.tipo= 266 and anho=".$j;
       $ano = $j;
     }
     elseif ($periodo == 2)
     {
       $sql_mon = "select *  FROM monitoreo.monitoreo m where m.idregistro=".$_SESSION['idreg']." and m.tipo= 266 and anho=".$anoperdos;
       //$sql_mon_eval = "select *  FROM monitoreo.monitoreo m where m.idregistro=".$_SESSION['idreg']." and m.tipo= 267 and anho=".$anoperdos;
       $ano = $anoperdos;
     }


     $gestor=new gestorMonitoreo();
     $mon =$gestor->ejecute($sql= $sql_mon) ;
     $row_mon= pg_fetch_array ($mon);
     $monitoreo = $row_mon['idmonitoreo'];



     for ($codact=296;$codact<=299;$codact++)
     {
         $codactividad=$codact;
         $realiza = @$_POST[$codactividad."-comboacta".$j];
         $descr= '';

           if ($monitoreo!=null)
           {
             $response= $gestormonitoreo->guardar_actividad_rcia($codactividad,$realiza,$descr,$monitoreo,$ano);
                 $step =@$_POST["step"];
                 $obs=@$_POST["RAgricolaObservaciones"];
                 $Result2 = $gestor->guardarObs($monitoreo,$step=3, $obs,  $estado=1);
           }
     }
     $anoperdos = $anoperdos + 1;
}




///////////  GUARDAMOS EL MONITOREO DE LOS CULTIVOS NO COMPROMETIDOS //////
 $response=array();
 $cantcultnc = @$_POST["num_culnc"];

if($cantcultnc > 0)
{
    $anoperdos = 3;
  for($j=1;$j<=5;$j++) // para los años
  {

    $ano = 0;

    if ($periodo == 1)
    {
        $sql_mon = "select *  FROM monitoreo.monitoreo m where m.idregistro=".$_SESSION['idreg']." and m.tipo= 266 and anho=".$j;
        $sql_mon_eval = "select *  FROM monitoreo.monitoreo m where m.idregistro=".$_SESSION['idreg']." and m.tipo= 267 and anho=".$j;
        $ano = $j;
    }
    elseif($periodo == 2)
    {
        $sql_mon = "select *  FROM monitoreo.monitoreo m where m.idregistro=".$_SESSION['idreg']." and m.tipo= 266 and anho=".$anoperdos;
        $sql_mon_eval = "select *  FROM monitoreo.monitoreo m where m.idregistro=".$_SESSION['idreg']." and m.tipo= 267 and anho=".$anoperdos;
        $ano = $anoperdos;
    }

    $gestor=new gestorMonitoreo();
    $mon =$gestor->ejecute($sql= $sql_mon) ;
    $row_mon= pg_fetch_array ($mon);
    $monitoreo = $row_mon['idmonitoreo'];

    $gestor=new gestorMonitoreo();
    $mon =$gestor->ejecute($sql= $sql_mon_eval) ;
    $row_mon= pg_fetch_array ($mon);
    $monitoreo_Eval = $row_mon['idmonitoreo'];


    if($monitoreo!=null)
    {
          $sql_delete = "delete from monitoreo.plancultivo where idmonitoreo =".$monitoreo." and comprometido = 1";
          $del = $gestor->ejecute($sql=$sql_delete);

    }


    if ($monitoreo!=null)
    {
        $arrayElim=$_POST["celiminados"];
        $elementosElim=  split(",", $arrayElim);

        foreach ($elementosElim as  $valor) {

            if(strlen($valor)>0){
                 $sql_delete_nocomp = " delete from monitoreo.detallevalorcultivo
                where idtablavalorali in (select d.idtablavalorali from monitoreo.detallevalorcultivo d inner join monitoreo.valoracionalimentos v on d.idtablavalorali=v.idtablavaloracion
                inner join monitoreo.monitoreo m on m.idmonitoreo = v.idmonitoreo
                where m.idmonitoreo=".$monitoreo_Eval." and d.idcultivo=".$valor." and d.compromiso=0) and idcultivo=".$valor." ; ";
                $del = $gestor->ejecute($sql=$sql_delete_nocomp);

                $sql_delete_ponderacion = " delete from monitoreo.ponderacionevalagricola
                where  idmonitoreo=".$monitoreo_Eval." and  idcultivo=".$valor." and  compromiso=0  ; ";

                $del = $gestor->ejecute($sql=$sql_delete_ponderacion);

            }

        }

    }
////-----FINNNN  ----ELIMINADO-- -CULTIVOS DE EVALUACIONN.-----

     for($i=1;$i<=$cantcultnc;$i++)  //para los cultivos
     {
       $gestorpredio=new gestorMonitoreo();
       $cultivo=@$_POST["cultivonocomp".$i];
       $SupeVeranoE=@$_POST["SupVeranoncE".$j.$i];
       $SupeInviernoE=@$_POST["SupInviernoncE".$j.$i];
       $Veranokg=@$_POST["Veranokgnc".$j.$i];
       $Inviernokg=@$_POST["Inviernokgnc".$j.$i];
       $estado = 1;
       $comprometido=1;

       if ($monitoreo!=null)
       {
             if ($cultivo != null)
             {
               $response= $gestorpredio->guardar_produccion_agricola_rcia($cultivo,$ano,$monitoreo,$SupeVeranoE,$SupeInviernoE,$Veranokg,$Inviernokg,$comprometido,$estado);
             }
       }

     }
     $anoperdos = $anoperdos + 1;
  }

}
//////////////////////////////////////////////////////////

/////  GUARDAMOS EL MONITOREO DE LOS CULTIVOS //////
 $response=array();
 $cantcult = @$_POST["numerocultivos"];


     $anoperdos = 3;
   for($j=1;$j<=5;$j++)  //para los años
   {

     $comprometido=0;

     $ano = 0;
     if ($periodo == 1)
     {
         $sql_mon = "select *  FROM monitoreo.monitoreo m where m.idregistro=".$_SESSION['idreg']." and m.tipo= 266 and anho=".$j;
         $ano = $j;
     }
     elseif ($periodo == 2)
     {
         $sql_mon = "select *  FROM monitoreo.monitoreo m where m.idregistro=".$_SESSION['idreg']." and m.tipo= 266 and anho=".$anoperdos;
         $ano = $anoperdos;
     }

     $gestor=new gestorMonitoreo();
     $mon =$gestor->ejecute($sql= $sql_mon) ;
     $row_mon= pg_fetch_array ($mon);
     $monitoreo = $row_mon['idmonitoreo'];

     if ($monitoreo!=null)
     {
           $sql_delete = "delete from monitoreo.plancultivo where idmonitoreo =".$monitoreo." and comprometido = 0";
           $del = $gestor->ejecute($sql=$sql_delete);
     }


     for($i=1;$i<=$cantcult;$i++) // para los cultivos
     {

       $gestorpredio=new gestorMonitoreo();
       $cultivo=@$_POST["cultivocompromometido".$i];
       $SupeVeranoE=@$_POST["SupVeranoE".$j.$i];
       $SupeInviernoE=@$_POST["SupInviernoE".$j.$i];
       $Veranokg=@$_POST["Veranokg".$j.$i];
       $Inviernokg=@$_POST["Inviernokg".$j.$i];

       $VeranoComp=@$_POST["Verano".$j.$i];
       $InviernoComp=@$_POST["Invierno".$j.$i];
       $estado = 1;
       if ( ($VeranoComp == 0) and ($InviernoComp == 0) )
       {
         $estado = 0;
       }



     if ($monitoreo!=null)
     {

           $response= $gestorpredio->guardar_produccion_agricola_rcia($cultivo,$ano,$monitoreo,$SupeVeranoE,$SupeInviernoE,$Veranokg,$Inviernokg,$comprometido,$estado);

     }

     }
           $anoperdos = $anoperdos + 1;


     }


  header('Content-type: application/json; charset=utf-8');
  echo json_encode($response,JSON_FORCE_OBJECT);

}
////////////////////////////////////////////////////////////////////



/////////////////////// DOCUMENTOS PRESENTADOS RCIA AGRICOLA ///////////////////
function guardarDocPresentadosAgricolaRcia()
{

$response=array();
$gestormonitoreo=new gestorMonitoreo();
$resultSuscripcion = $gestormonitoreo->ejecute($sql= "select r.idregistro, fecharegistro, fechasuscripcion
           from registro as r full join fechasregistro as fr on r.idregistro = fr.idregistro
           where r.idregistro =".$_SESSION['idreg']);
$row_Suscripcion = pg_fetch_array ($resultSuscripcion);
$fechasuscripcion = $row_Suscripcion['fechasuscripcion'];
$periodo1_time = date($today="2015-09-29");
$periodo=2;
if ($fechasuscripcion!="")
{
  $predio_time = Date('Y-m-d', strtotime($fechasuscripcion));
  if($periodo1_time > $predio_time)
  {
    $periodo=1;
  }
}

$response=array();

  $anoperdos = 3;
  for($j=1;$j<=5;$j++)  //para los años
  {
        $ano = 0;

        if ($periodo == 1)
        {
          $sql_mon = "select *  FROM monitoreo.monitoreo m where m.idregistro=".$_SESSION['idreg']." and m.tipo= 266 and anho=".$j;
          $ano = $j;
        }
        elseif ($periodo == 2)
        {
          $sql_mon = "select *  FROM monitoreo.monitoreo m where m.idregistro=".$_SESSION['idreg']." and m.tipo= 266 and anho=".$anoperdos;
          $ano = $anoperdos;
        }

        $gestor=new gestorMonitoreo();
        $mon =$gestor->ejecute($sql= $sql_mon) ;
        $row_mon= pg_fetch_array ($mon);
        $monitoreo = $row_mon['idmonitoreo'];


        for ($codact=282;$codact<=286;$codact++)
        {
              $presenta = @$_POST["".$codact."-".$j];

              if ($monitoreo!=null)
              {
                $response= $gestormonitoreo->guardar_doc_presentados_rcia($codact,$presenta,$monitoreo,$ano,1); //1 por que es de tipo agricola
                    $step =@$_POST["step"];
                    $obs=@$_POST["ObservacionDocAgricolas"];
                    $Result2 = $gestor->guardarObs($monitoreo,$step=31, $obs,  $estado=1);
              }
        }

        if ($monitoreo!=null)
        {
        $response= $gestormonitoreo->guardar_doc_presentados_rcia(332,$presenta,$monitoreo,$ano,1);
        }

        $anoperdos = $anoperdos + 1;
  }

  header('Content-type: application/json; charset=utf-8');
  echo json_encode($response,JSON_FORCE_OBJECT);

}
//////////////////////////////////////////////////////////////////////////////



///////////////// VENTANA RCIA GANADERA ////////////////////////////
function guardarGanaderaRcia(){

  $response=array();
  $gestormonitoreo=new gestorMonitoreo();
  $resultSuscripcion = $gestormonitoreo->ejecute($sql= "select r.idregistro, fecharegistro, fechasuscripcion
          from registro as r full join fechasregistro as fr on r.idregistro = fr.idregistro
          where r.idregistro =".$_SESSION['idreg']);
    $row_Suscripcion = pg_fetch_array ($resultSuscripcion);
    $fechasuscripcion = $row_Suscripcion['fechasuscripcion'];
    $periodo1_time = date($today="2015-09-29");

    $periodo=2;
    if ($fechasuscripcion!="") {
    $predio_time = Date('Y-m-d', strtotime($fechasuscripcion));
    if($periodo1_time > $predio_time){
      $periodo=1;
   }
   }


  ///// GUARDAR SISTEMA GANADERA
  $response=array();

 for ($codact=75;$codact<=78;$codact++) //actividad
   {
        $anoperdos = 3;
       for($j=1;$j<=5;$j++) //año
       {
         $ano = 0;
         if ($periodo == 1)
         {
           $sql_mon = "select *  FROM monitoreo.monitoreo m where m.idregistro=".$_SESSION['idreg']." and m.tipo= 266 and anho=".$j;
           $ano = $j;
         }
         elseif ($periodo == 2)
         {
           $sql_mon = "select *  FROM monitoreo.monitoreo m where m.idregistro=".$_SESSION['idreg']." and m.tipo= 266 and anho=".$anoperdos;
           $ano = $anoperdos;
         }


         $gestor=new gestorMonitoreo();
         $mon =$gestor->ejecute($sql= $sql_mon) ;
         $row_mon= pg_fetch_array ($mon);
         $monitoreo = $row_mon['idmonitoreo'];

           $cantidadganado= @$_POST[$codact."-".$j];

             if ($monitoreo!=null)
             {
               $response= $gestormonitoreo->guardar_sistema_ganadero_rcia($codact,$monitoreo,$cantidadganado);
             }

        $anoperdos = $anoperdos + 1;
       }
 }


       $anoperdos = 3;
      for($j=1;$j<=5;$j++) //año
      {
        $ano = 0;
        if ($periodo == 1)
        {
          $sql_mon = "select *  FROM monitoreo.monitoreo m where m.idregistro=".$_SESSION['idreg']." and m.tipo= 266 and anho=".$j;
          $ano = $j;
        }
        elseif ($periodo == 2)
        {
          $sql_mon = "select *  FROM monitoreo.monitoreo m where m.idregistro=".$_SESSION['idreg']." and m.tipo= 266 and anho=".$anoperdos;
          $ano = $anoperdos;
        }


        $gestor=new gestorMonitoreo();
        $mon =$gestor->ejecute($sql= $sql_mon) ;
        $row_mon= pg_fetch_array ($mon);
        $monitoreo = $row_mon['idmonitoreo'];

          $cantidadganado= @$_POST["112-".$j];

            if ($monitoreo!=null)
            {
              $response= $gestormonitoreo->guardar_sistema_ganadero_rcia(112,$monitoreo,$cantidadganado);
            }

       $anoperdos = $anoperdos + 1;
      }





// GUARDAR DATOS DE ACTIVIDADES GANADERAS
 $response=array();
 //var_dump($_POST);
// exit();
$anoperdos = 3;

for($j=1;$j<=5;$j++)
{
      $ano = 0;
      if ($periodo == 1)
      {
        $sql_mon = "select *  FROM monitoreo.monitoreo m where m.idregistro=".$_SESSION['idreg']." and m.tipo= 266 and anho=".$j;
        $ano = $j;
      }
      elseif ($periodo == 2)
      {
        $sql_mon = "select *  FROM monitoreo.monitoreo m where m.idregistro=".$_SESSION['idreg']." and m.tipo= 266 and anho=".$anoperdos;
        $ano = $anoperdos;
      }


      $gestor=new gestorMonitoreo();
      $mon =$gestor->ejecute($sql= $sql_mon) ;
      $row_mon= pg_fetch_array ($mon);
      $monitoreo = $row_mon['idmonitoreo'];


      for ($codact=300;$codact<=302;$codact++)
      {
          $codactividad=$codact;
          $realiza = @$_POST[$codactividad."-comboact".$j];
          $descr= '';

            if ($monitoreo!=null)
            {
              $response= $gestormonitoreo->guardar_actividad_rcia($codactividad,$realiza,$descr,$monitoreo,$ano);
                  $step =@$_POST["step"];
                  $obs=@$_POST["RGanaderaObservaciones"];
                  $Result2 = $gestor->guardarObs($monitoreo,$step=4, $obs,  $estado=1);
            }
      }
      $anoperdos = $anoperdos + 1;
}


// VERIFICACION DE COMPROMISO GANADERO RCIA
	 $response=array();
$anoperdos = 3;
  for($j=1;$j<=5;$j++)
  {
        $spcn=0;
        $spce=@$_POST["suppastoejecutado".$j];
        $potre=@$_POST["potreroM".$j];
        $poza=@$_POST["pozasM".$j];
        $sal=@$_POST["salerosM".$j];
        $bebe=@$_POST["bebederosM".$j];
        $brete=@$_POST["breteM".$j];
        $corral=@$_POST["corralM".$j];
        $forra=@$_POST["forrajeM".$j];
        $compgan=@$_POST["compraganadoM".$j];
        $cantter=@$_POST["cantterneroM".$j];
        $cantgan=@$_POST["cantganadoM".$j];
        $cantpie=@$_POST["cantganadopieM".$j];
        $cantfai=@$_POST["cantganadofaineoM".$j];
        $prodcar=@$_POST["cantprodcarneM".$j];

        $ano = 0;
        if ($periodo == 1)
        {
          $sql_mon = "select *  FROM monitoreo.monitoreo m where m.idregistro=".$_SESSION['idreg']." and m.tipo= 266 and anho=".$j;
          $ano = $j;
        }
        elseif ($periodo == 2)
        {
          $sql_mon = "select *  FROM monitoreo.monitoreo m where m.idregistro=".$_SESSION['idreg']." and m.tipo= 266 and anho=".$anoperdos;
          $ano = $anoperdos;
        }

        $gestor=new gestorMonitoreo();
        $mon =$gestor->ejecute($sql= $sql_mon) ;
        $row_mon= pg_fetch_array ($mon);
        $monitoreo = $row_mon['idmonitoreo'];

        if ($monitoreo!=null)
        {
        $response= $gestor->guardar_produccion_ganadera_rcia($monitoreo,$spcn,$spce,$potre,$poza,$sal,$bebe,$brete,$corral,$forra,$compgan,$cantter,$cantgan,$cantpie,$cantfai,$prodcar,$ano);
        }
        $anoperdos = $anoperdos + 1;
  }


header('Content-type: application/json; charset=utf-8');

echo json_encode($response,JSON_FORCE_OBJECT);

}
/////////////////////////////////////////////////////////////////////////////////////





///////////////// VENTANA RCIA AVICOLA ////////////////////////////
function guardarAvicolaRcia(){

  $response=array();
  $gestormonitoreo=new gestorMonitoreo();
  $resultSuscripcion = $gestormonitoreo->ejecute($sql= "select r.idregistro, fecharegistro, fechasuscripcion
          from registro as r full join fechasregistro as fr on r.idregistro = fr.idregistro
          where r.idregistro =".$_SESSION['idreg']);
    $row_Suscripcion = pg_fetch_array ($resultSuscripcion);
    $fechasuscripcion = $row_Suscripcion['fechasuscripcion'];
    $periodo1_time = date($today="2015-09-29");

    $periodo=2;
    if ($fechasuscripcion!="") {
    $predio_time = Date('Y-m-d', strtotime($fechasuscripcion));
    if($periodo1_time > $predio_time){
      $periodo=1;
   }
   }

// GUARDAR DATOS DE ACTIVIDADES GANADERAS
 $response=array();
 //var_dump($_POST);
// exit();
$anoperdos = 3;

for($j=1;$j<=5;$j++)
{
      $ano = 0;
      if ($periodo == 1)
      {
        $sql_mon = "select *  FROM monitoreo.monitoreo m where m.idregistro=".$_SESSION['idreg']." and m.tipo= 266 and anho=".$j;
        $ano = $j;
      }
      elseif ($periodo == 2)
      {
        $sql_mon = "select *  FROM monitoreo.monitoreo m where m.idregistro=".$_SESSION['idreg']." and m.tipo= 266 and anho=".$anoperdos;
        $ano = $anoperdos;
      }


      $gestor=new gestorMonitoreo();
      $mon =$gestor->ejecute($sql= $sql_mon) ;
      $row_mon= pg_fetch_array ($mon);
      $monitoreo = $row_mon['idmonitoreo'];


      for ($codact=300;$codact<=302;$codact++)
      {
          $codactividad=$codact;
          $realiza = @$_POST[$codactividad."-comboact".$j];
          $descr= '';

            if ($monitoreo!=null)
            {
             // $response= $gestormonitoreo->guardar_actividad_rcia($codactividad,$realiza,$descr,$monitoreo,$ano);
                  $step =@$_POST["step"];
                  $obs=@$_POST["RGanaderaObservaciones"];
                  $response = $gestor->guardarObs($monitoreo,$step=4, $obs,  $estado=1);
            }
      }
      $anoperdos = $anoperdos + 1;
}


// VERIFICACION DE COMPROMISO GANADERO RCIA
	 //$response=array();
$anoperdos = 3;
  for($j=1;$j<=5;$j++)
  {
        $spcn=0;
        $ERegSanitario=@$_POST["ERegSanitario".$j];
        $Eeclosionpesadas=@$_POST["Eeclosionpesadas".$j];
        $Eeclosionlivianas=@$_POST["Eeclosionlivianas".$j];
        $Ecantpollobbventa=@$_POST["Ecantpollobbventa".$j];
        $Emortalidadparrillero=@$_POST["Emortalidadparrillero".$j];
        $Ecantpolloventa=@$_POST["Ecantpolloventa".$j];
        $Eposturaponedoras=@$_POST["Eposturaponedoras".$j];
        $Ecanthuevoventa=@$_POST["Ecanthuevoventa".$j];
        $ano = 0;
        if ($periodo == 1)
        {
          $sql_mon = "select *  FROM monitoreo.monitoreo m where m.idregistro=".$_SESSION['idreg']." and m.tipo= 266 and anho=".$j;
          $ano = $j;
        }
        elseif ($periodo == 2)
        {
          $sql_mon = "select *  FROM monitoreo.monitoreo m where m.idregistro=".$_SESSION['idreg']." and m.tipo= 266 and anho=".$anoperdos;
          $ano = $anoperdos;
        }

        $gestor=new gestorMonitoreo();
        $mon =$gestor->ejecute($sql= $sql_mon) ;
        $row_mon= pg_fetch_array ($mon);
        $monitoreo = $row_mon['idmonitoreo'];

        if ($monitoreo!=null){
             $response= $gestor->guardar_produccion_avicola_rcia($monitoreo,0,0,$ERegSanitario,$Eeclosionpesadas,$Eeclosionlivianas,$Emortalidadparrillero,$Eposturaponedoras,$Ecantpolloventa,$Ecanthuevoventa,$Ecantpollobbventa,$ano);
        }
        $anoperdos = $anoperdos + 1;
  }


header('Content-type: application/json; charset=utf-8');

echo json_encode($response,JSON_FORCE_OBJECT);

}
/////////////////////////////////////////////////////////////////////////////////////





/////////////////////// DOCUMENTOS PRESENTADOS RCIA GANADERA ///////////////////
function guardarDocPresentadosGanaderaRcia()
{

$response=array();
$gestormonitoreo=new gestorMonitoreo();
$resultSuscripcion = $gestormonitoreo->ejecute($sql= "select r.idregistro, fecharegistro, fechasuscripcion
           from registro as r full join fechasregistro as fr on r.idregistro = fr.idregistro
           where r.idregistro =".$_SESSION['idreg']);
$row_Suscripcion = pg_fetch_array ($resultSuscripcion);
$fechasuscripcion = $row_Suscripcion['fechasuscripcion'];
$periodo1_time = date($today="2015-09-29");
$periodo=2;
if ($fechasuscripcion!="")
{
  $predio_time = Date('Y-m-d', strtotime($fechasuscripcion));
  if($periodo1_time > $predio_time)
  {
    $periodo=1;
  }
}

$response=array();

  $anoperdos = 3;
  for($j=1;$j<=5;$j++)  //para los años
  {
        $ano = 0;

        if ($periodo == 1)
        {
          $sql_mon = "select *  FROM monitoreo.monitoreo m where m.idregistro=".$_SESSION['idreg']." and m.tipo= 266 and anho=".$j;
          $ano = $j;
        }
        elseif ($periodo == 2)
        {
          $sql_mon = "select *  FROM monitoreo.monitoreo m where m.idregistro=".$_SESSION['idreg']." and m.tipo= 266 and anho=".$anoperdos;
          $ano = $anoperdos;
        }

        $gestor=new gestorMonitoreo();
        $mon =$gestor->ejecute($sql= $sql_mon) ;
        $row_mon= pg_fetch_array ($mon);
        $monitoreo = $row_mon['idmonitoreo'];


        for ($codact=287;$codact<=291;$codact++)
        {
              $presenta = @$_POST["".$codact."-".$j];

              if ($monitoreo!=null)
              {
                $response= $gestormonitoreo->guardar_doc_presentados_rcia($codact,$presenta,$monitoreo,$ano,2); //2 POR QUE ES DE TIPO GANADERO
                    $step =@$_POST["step"];
                    $obs=@$_POST["ObservacionDocGanaderas"];
                    $Result2 = $gestor->guardarObs($monitoreo,$step=41, $obs,  $estado=1);
              }
        }

        for ($codact=333;$codact<=336;$codact++)
        {
              $presenta = @$_POST["".$codact."-".$j];

              if ($monitoreo!=null)
              {
                $response= $gestormonitoreo->guardar_doc_presentados_rcia($codact,$presenta,$monitoreo,$ano,2); //2 POR QUE ES DE TIPO GANADERO
              }
        }


        $anoperdos = $anoperdos + 1;
  }
  //echo $response.'holaaaaaaaaaaa';
  header('Content-type: application/json; charset=utf-8');
  echo json_encode($response,JSON_FORCE_OBJECT);

}
//////////////////////////////////////////////////////////////////////////////




////////////////////////////////////////////// VENTANA BOSQUES RCIA //////////////////////////////////////////////
function guardarBosqueRcia(){

//GUARDAR DATOS DE MONITOREO DE BOSQUES DE RCIA
 $response=array();
 //var_dump($_POST);
 //exit();
 $cantespe = @$_POST["numeroespecies"];

///// ESPECIES A RESTITUIR
 for($i=1;$i<=$cantespe;$i++){

    $gestorpredio=new gestorMonitoreo();


    $checkhab = @$_POST["chkhab".$i];

    if($checkhab == 'on')
    {
      $especiecomun=@$_POST["idespeciecomunreforestada".$i];
  		$ano=@$_POST["anorestituirejecutado".$i];
  		$tiporestitucion=@$_POST["idtiporestitucion".$i];
  		$suprest=@$_POST["supejecutada".$i];
  		$espaciamiento=@$_POST["idtipoesparcimientoejecutado".$i];
  		$cantplant=@$_POST["cantplantinejecutado".$i];
  		$obs=@$_POST["observacionesejecutado".$i];
      $idrest=@$_POST["idespecierestituida".$i];

  		$sql_mon = "select *  FROM monitoreo.monitoreo m where m.idregistro=".$_SESSION['idreg']." and m.tipo = 266 and estado = 1 order by idmonitoreo asc limit 1";
  		$gestor=new gestorMonitoreo();
  		$mon =$gestor->ejecute($sql= $sql_mon) ;
  		$row_mon= pg_fetch_array ($mon);
  		$monitoreo = $row_mon['idmonitoreo'];


  		if ($monitoreo!=null)
  		{
  		$response= $gestorpredio->guardar_restitucion_bosques_rcia($idrest,$monitoreo,$especiecomun,$ano,$tiporestitucion,$suprest,$espaciamiento,$cantplant,$obs);
  		}

    }

  }

///// SUPERFICIE SEL EJECUTADA
 $response=array();
 $cantsels = @$_POST["cantidadsels"];
 for($i=1;$i<=$cantsels;$i++)
 {
  $gestorpredio=new gestorMonitoreo();
  $idcompromiso=@$_POST["tiposel".$i];
  $idtiposel=@$_POST["idtiposel".$i];
  $suptpfpn=@$_POST["supseltpfpEjecutado".$i];
  $suptumn=@$_POST["supseltumEjecutado".$i];

  $suptpfppasn=0;
  $suptumpasn=0;
  if ($_SESSION['Causal']==2)
  {
  $suptpfppasn=@$_POST["supseltpfppasEjecutado".$i];
  $suptumpasn=@$_POST["supseltumpasEjecutado".$i];
  }

  $sql_mon = "select *  FROM monitoreo.monitoreo m where m.idregistro=".$_SESSION['idreg']." and m.tipo = 266 and estado = 1 order by idmonitoreo asc limit 1";
  $gestor=new gestorMonitoreo();
  $mon =$gestor->ejecute($sql= $sql_mon) ;
  $row_mon= pg_fetch_array ($mon);
  $monitoreo = $row_mon['idmonitoreo'];


  if ($monitoreo!=null)
  {
  $response= $gestorpredio->guardar_selsejecutado($monitoreo,$idcompromiso,$idtiposel,$suptpfpn,$suptumn,$suptpfppasn,$suptumpasn);
  }


 }

////////////////// GUARDAR SUPERFICIE MONITOREO
 $response=array();
 $gestorpredio=new gestorMonitoreo();

 $supreftpfpejec=@$_POST["supreftpfpEje"];
 $supreftpfpselejec=@$_POST["supreftpfpselEje"];
 $supreftumejec=@$_POST["supreftumEje"];
 $supreftumselejec=@$_POST["supreftumpselEje"];

 if ($_SESSION['Causal']==2)
 {
 $supreftpfpejecpas=@$_POST["supreftpfppasEje"];
 $supreftpfpselejecpas=@$_POST["supreftpfpselpasEje"];
 $supreftumejecpas=@$_POST["supreftumpasEje"];
 $supreftumselejecpas=@$_POST["supreftumpselpasEje"];
 }


 if ($monitoreo!=null)
 {
 $response= $gestorpredio->guardar_superficiemonitoreo($monitoreo,200,$supreftpfpejec);
 $response= $gestorpredio->guardar_superficiemonitoreo($monitoreo,201,$supreftpfpselejec);
 $response= $gestorpredio->guardar_superficiemonitoreo($monitoreo,202,$supreftumejec);
 $response= $gestorpredio->guardar_superficiemonitoreo($monitoreo,204,$supreftumselejec);

       if ($_SESSION['Causal']==2)
       {
         $response= $gestorpredio->guardar_superficiemonitoreo($monitoreo,211,$supreftpfpejecpas);
         $response= $gestorpredio->guardar_superficiemonitoreo($monitoreo,212,$supreftpfpselejecpas);
         $response= $gestorpredio->guardar_superficiemonitoreo($monitoreo,213,$supreftumejecpas);
         $response= $gestorpredio->guardar_superficiemonitoreo($monitoreo,215,$supreftumselejecpas);
       }

 }


//// OBSERVACIONES DE BOSQUES
			$response=array();
 			$sql_mon = "select *  FROM monitoreo.monitoreo m where   m.idregistro=".$_SESSION['idreg']." and m.tipo= 266 and estado = 1 order by idmonitoreo asc limit 1";
			$gestor=new gestorMonitoreo();
			$mon =$gestor->ejecute($sql= $sql_mon) ;
			$row_mon= pg_fetch_array ($mon);
			$monitoreo = $row_mon['idmonitoreo'];
			if ($monitoreo!=null)
			{
              $step =@$_POST["step"];
              $obs=@$_POST["RBosquesObservacion"];
			       $response = $gestor->guardarObs($monitoreo,$step=2, $obs,  $estado=1);
			}


header('Content-type: application/json; charset=utf-8');

echo json_encode($response,JSON_FORCE_OBJECT);

}

/////////////////////// DOCUMENTOS PRESENTADOS RCIA BOSQUES ///////////////////
function guardarDocPresentadosBosqueRcia()
{

$response=array();
$gestormonitoreo=new gestorMonitoreo();
$resultSuscripcion = $gestormonitoreo->ejecute($sql= "select r.idregistro, fecharegistro, fechasuscripcion
           from registro as r full join fechasregistro as fr on r.idregistro = fr.idregistro
           where r.idregistro =".$_SESSION['idreg']);
$row_Suscripcion = pg_fetch_array ($resultSuscripcion);
$fechasuscripcion = $row_Suscripcion['fechasuscripcion'];
$periodo1_time = date($today="2015-09-29");
$periodo=2;
if ($fechasuscripcion!="")
{
  $predio_time = Date('Y-m-d', strtotime($fechasuscripcion));
  if($periodo1_time > $predio_time)
  {
    $periodo=1;
  }
}

$response=array();

  $anoperdos = 3;
  for($j=1;$j<=5;$j++)  //para los años
  {
        $ano = 0;

        if ($periodo == 1)
        {
          $sql_mon = "select *  FROM monitoreo.monitoreo m where m.idregistro=".$_SESSION['idreg']." and m.tipo= 266 and anho=".$j;
          $ano = $j;
        }
        elseif ($periodo == 2)
        {
          $sql_mon = "select *  FROM monitoreo.monitoreo m where m.idregistro=".$_SESSION['idreg']." and m.tipo= 266 and anho=".$anoperdos;
          $ano = $anoperdos;
        }

        $gestor=new gestorMonitoreo();
        $mon =$gestor->ejecute($sql= $sql_mon) ;
        $row_mon= pg_fetch_array ($mon);
        $monitoreo = $row_mon['idmonitoreo'];


        for ($codact=292;$codact<=295;$codact++)
        {
              $presenta = @$_POST["".$codact."-".$j];

              if ($monitoreo!=null)
              {
                $response= $gestormonitoreo->guardar_doc_presentados_rcia($codact,$presenta,$monitoreo,$ano,3); //3 POR QUE ES DE TIPO BOSQUES
                    $step =@$_POST["step"];
                    $obs=@$_POST["ObservacionDocBosque"];
                    $Result2 = $gestor->guardarObs($monitoreo,$step=21, $obs,  $estado=1);
              }
        }

        if ($monitoreo!=null)
        {
        $response= $gestormonitoreo->guardar_doc_presentados_rcia(331,$presenta,$monitoreo,$ano,3);
        }

        $anoperdos = $anoperdos + 1;
  }

  header('Content-type: application/json; charset=utf-8');
  echo json_encode($response,JSON_FORCE_OBJECT);

}
//////////////////////////////////////////////////////////////////////////////





/////////////////////// GUARDAR ANALISIS DE DOCUMENTACION GANADERO////////////////////////////////

function guardarAnalisisDocGanaderoRcia()
{


    $response=array();
    $gestormonitoreo=new gestorMonitoreo();


    $response=array();
             $sql_and1="";
           //  $sql_and1="  and anho=4 ";
          //  if(isset($_SESSION['anhoActivo']) && ($_SESSION['anhoActivo']>0)){
           //     $sql_and1= " and anho=".$_SESSION['anhoActivo'];
          //  }
              if(isset($_POST['anhoActivo']) && ($_POST['anhoActivo']>0)){
                $sql_and1= " and anho=".$_POST['anhoActivo'];
            }

            //$sql_mon1= " select m.idmonitoreo from monitoreo.monitoreo m inner join monitoreo.analisisdocumentacion  a on a.idmonitoreo = m.idmonitoreo inner join monitoreo.documentacion d on d.idDocumentacion=a.idDocumentacion
             //where d.tipodocumento=71 and   tipo=267 and estado = 1 and idregistro = ".$_SESSION['idreg'].$sql_and1;
            // $monitoreo = pg_query($cn,$sql_mon) ;
             $sql_mon1= " select m.idmonitoreo from monitoreo.monitoreo m
             where   tipo=267 and estado = 1 and idregistro = ".$_SESSION['idreg'].$sql_and1;
            $monitoreo1 =$gestormonitoreo->ejecute($sql= $sql_mon1) ;
            $row_monitoreo1= pg_fetch_array ($monitoreo1);
            $totalRows_monitoreo = pg_num_rows($monitoreo1);
           // echo "ajax consulta=".$sql_mon1." --id mon=".$totalRows_monitoreo;
            if($totalRows_monitoreo>0){
                $idmonitoreo1=$row_monitoreo1["idmonitoreo"];
            }else{
                $idmonitoreo1=0;
            }



        //----------  eliminar documentos evaluacion ganadero
         $sql_mond= "delete from monitoreo.analisisdocumentacion  where  idmonitoreo = ".$idmonitoreo1."   and iddocumentacion in(select  iddocumentacion from  monitoreo.documentacion where tipodocumento=71) ";
         $monitoreod =$gestormonitoreo->ejecute($sql= $sql_mond) ;
         //$row_monitoreo= pg_fetch_array ($monitoreo);

        $cantFilas= $_POST["conteoC"];
        $codact=1;
        ///----- guardar documentos evaluacion ganadera
        while ( $codact<=$cantFilas)
        {

                  if ( isset($_POST["txtdetalle2-".$codact]) ) {
                    $iddoc =1; //-- razas mejoradas
                    $detallecontenido= $_POST["txtdetalle2-".$codact];
                    $monto_cant=  $_POST["txtmonto_cantidad2-".$codact];
                    $obse= $_POST["txtobs2-".$codact];
                    $response= $gestormonitoreo->guardar_doc_Analisis_evaluacion_rcia($idmonitoreo1,$iddoc,$detallecontenido,$monto_cant,$obse);
                  }
                  if ( isset($_POST["txtdetalle3-".$codact]) ) {
                    $iddoc =2; //-- ensilado de forraje
                    $detallecontenido= $_POST["txtdetalle3-".$codact];
                    $monto_cant=  $_POST["txtmonto_cantidad3-".$codact];
                    $obse= $_POST["txtobs3-".$codact];
                    $response= $gestormonitoreo->guardar_doc_Analisis_evaluacion_rcia($idmonitoreo1,$iddoc,$detallecontenido,$monto_cant,$obse);
                  }
                  if ( isset($_POST["txtdetalle4-".$codact]) ) {
                    $iddoc = 22; //-- USO DE ALIMENTOS SUPLEMENTARIOS
                    $detallecontenido= $_POST["txtdetalle4-".$codact];
                    $monto_cant=  $_POST["txtmonto_cantidad4-".$codact];
                    $obse= $_POST["txtobs4-".$codact];
                    $response= $gestormonitoreo->guardar_doc_Analisis_evaluacion_rcia($idmonitoreo1,$iddoc,$detallecontenido,$monto_cant,$obse);
                  }

                  if ( isset($_POST["txtdetalle5-".$codact]) ) {
                    $iddoc = 34; //-- IMPLEMENTACION DE PASTURAS
                    $detallecontenido= $_POST["txtdetalle5-".$codact];
                    $monto_cant=  $_POST["txtmonto_cantidad5-".$codact];
                    $obse= $_POST["txtobs5-".$codact];
                    $response= $gestormonitoreo->guardar_doc_Analisis_evaluacion_rcia($idmonitoreo1,$iddoc,$detallecontenido,$monto_cant,$obse);
                  }

                  if ( isset($_POST["txtdetalle6-".$codact]) ) {
                    $iddoc =3; //-- Potreros alambrados, Cercas Eléctricas, saleros
                    $detallecontenido= $_POST["txtdetalle6-".$codact];
                    $monto_cant=  $_POST["txtmonto_cantidad6-".$codact];
                    $obse= $_POST["txtobs6-".$codact];
                    $response= $gestormonitoreo->guardar_doc_Analisis_evaluacion_rcia($idmonitoreo1,$iddoc,$detallecontenido,$monto_cant,$obse);
                  }

                  if ( isset($_POST["txtdetalle7-".$codact]) ) {
                    $iddoc =4; //-- Atajados, pozos, noques, tanques, bebederos
                    $detallecontenido= $_POST["txtdetalle7-".$codact];
                    $monto_cant=  $_POST["txtmonto_cantidad7-".$codact];
                    $obse= $_POST["txtobs7-".$codact];
                    $response= $gestormonitoreo->guardar_doc_Analisis_evaluacion_rcia($idmonitoreo1,$iddoc,$detallecontenido,$monto_cant,$obse);
                  }

                  if ( isset($_POST["txtdetalle8-".$codact]) ) {
                    $iddoc =6; //-- Brete, Cepo, balanza, cargadero
                    $detallecontenido= $_POST["txtdetalle8-".$codact];
                    $monto_cant=  $_POST["txtmonto_cantidad8-".$codact];
                    $obse= $_POST["txtobs8-".$codact];
                    $response= $gestormonitoreo->guardar_doc_Analisis_evaluacion_rcia($idmonitoreo1,$iddoc,$detallecontenido,$monto_cant,$obse);
                  }
                  if ( isset($_POST["txtdetalle9-".$codact]) ) {
                    $iddoc =7; //-- Brete, Cepo, balanza, cargadero
                    $detallecontenido= $_POST["txtdetalle9-".$codact];
                    $monto_cant=  $_POST["txtmonto_cantidad9-".$codact];
                    $obse= $_POST["txtobs9-".$codact];
                    $response= $gestormonitoreo->guardar_doc_Analisis_evaluacion_rcia($idmonitoreo1,$iddoc,$detallecontenido,$monto_cant,$obse);
                  }
                  if ( isset($_POST["txtdetalle10-".$codact]) ) {
                    $iddoc =8; //-- Compra de Ganado
                    $detallecontenido= $_POST["txtdetalle10-".$codact];
                    $monto_cant=  $_POST["txtmonto_cantidad10-".$codact];
                    $obse= $_POST["txtobs10-".$codact];
                    $response= $gestormonitoreo->guardar_doc_Analisis_evaluacion_rcia($idmonitoreo1,$iddoc,$detallecontenido,$monto_cant,$obse);
                  }

                  if ( isset($_POST["txtdetalle11-".$codact]) ) {
                    $iddoc =9; //-- "Venta de Ganado"
                    $detallecontenido= $_POST["txtdetalle11-".$codact];
                    $monto_cant=  $_POST["txtmonto_cantidad11-".$codact];
                    $obse= $_POST["txtobs11-".$codact];
                    $response= $gestormonitoreo->guardar_doc_Analisis_evaluacion_rcia($idmonitoreo1,$iddoc,$detallecontenido,$monto_cant,$obse);
                  }

                  if ( isset($_POST["txtdetalle12-".$codact]) ) {
                    $iddoc =10; //--Insumos Agropecuarios
                    $detallecontenido= $_POST["txtdetalle12-".$codact];
                    $monto_cant=  $_POST["txtmonto_cantidad12-".$codact];
                    $obse= $_POST["txtobs12-".$codact];
                    $response= $gestormonitoreo->guardar_doc_Analisis_evaluacion_rcia($idmonitoreo1,$iddoc,$detallecontenido,$monto_cant,$obse);
                  }

                   if ( isset($_POST["txtdetalle13-".$codact]) ) {
                    $iddoc =11; //-- OTros
                    $detallecontenido= $_POST["txtdetalle13-".$codact];
                    $monto_cant=  $_POST["txtmonto_cantidad13-".$codact];
                    $obse= $_POST["txtobs13-".$codact];
                    $response= $gestormonitoreo->guardar_doc_Analisis_evaluacion_rcia($idmonitoreo1,$iddoc,$detallecontenido,$monto_cant,$obse);
                  }




             $codact++;
         }


         $tipoPredio=0;
         $tipoPredio= $_POST["idtipoPredio"];


         if ($tipoPredio==37 || $tipoPredio==38) //// es pequeña o comunidad
         {

               if(strlen($_POST["psuppastoscultivados"])>0){$suppastoscultivados=$_POST["psuppastoscultivados"];}else{$suppastoscultivados=0;}
              if(strlen($_POST["ptecnicas"])>0){$alimentosuple=$_POST["ptecnicas"];}else{$alimentosuple=0;}
              if(strlen($_POST["ppotreros"])>0){$razasmejoradas=$_POST["ppotreros"];}else{$razasmejoradas=0;}
              if(strlen($_POST["pcabezas"])>0){$enlisadosforraje=$_POST["pcabezas"];}else{$enlisadosforraje=0;}

               $response= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia2($idmonitoreo1,36,$suppastoscultivados,71);
               $response= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia2($idmonitoreo1,37,$alimentosuple,71);
               $response= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia2($idmonitoreo1,38,$razasmejoradas,71);
               $response= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia2($idmonitoreo1,39,$enlisadosforraje,71);


         }
         else
         {
                 if(strlen($_POST["suppastoscultivados"])>0){$suppastoscultivados=$_POST["suppastoscultivados"];}else{$suppastoscultivados=0;}
                if(strlen($_POST["alimentosuple"])>0){$alimentosuple=$_POST["alimentosuple"];}else{$alimentosuple=0;}
                if(strlen($_POST["razasmejoradas"])>0){$razasmejoradas=$_POST["razasmejoradas"];}else{$razasmejoradas=0;}
                if(strlen($_POST["enlisadosforraje"])>0){$enlisadosforraje=$_POST["enlisadosforraje"];}else{$enlisadosforraje=0;}
                if(strlen($_POST["potrerosalam"])>0){$potrerosalam=$_POST["potrerosalam"];}else{$potrerosalam=0;}
                if(strlen($_POST["atajados"])>0){$atajados=$_POST["atajados"];}else{$atajados=0;}
                if(strlen($_POST["corral"])>0){$corral=$_POST["corral"];}else{$corral=0;}
                if(strlen($_POST["brete"])>0){$brete=$_POST["brete"];}else{$brete=0;}
                if(strlen($_POST["certificadosenasag"])>0){$certificadosenasag=$_POST["certificadosenasag"];}else{$certificadosenasag=0;}
                if(strlen($_POST["compraventaganado"])>0){$compraventaganado=$_POST["compraventaganado"];}else{$compraventaganado=0;}
                if(strlen($_POST["insumospecuarios"])>0){$insumospecuarios=$_POST["insumospecuarios"];}else{$insumospecuarios=0;}


                 // tipo=1 = ganadero
                 $response= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia2($idmonitoreo1,1,$suppastoscultivados,71);
                 $response= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia2($idmonitoreo1,2,$alimentosuple,71);
                 $response= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia2($idmonitoreo1,3,$razasmejoradas,71);
                 $response= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia2($idmonitoreo1,4,$enlisadosforraje,71);
                 $response= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia2($idmonitoreo1,5,$potrerosalam,71);
                 $response= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia2($idmonitoreo1,6,$atajados,71);
                 $response= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia2($idmonitoreo1,7,$corral,71);
                 $response= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia2($idmonitoreo1,8,$brete,71);
                 $response= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia2($idmonitoreo1,9,$certificadosenasag,71);
                 $response= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia2($idmonitoreo1,10,$compraventaganado,71);
                 $response= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia2($idmonitoreo1,11,$insumospecuarios,71);
         }





         //-----  guardar evaluacion ponderaciones -----




 // echo "holaa=".$response;
  header('Content-type: application/json; charset=utf-8');
  echo json_encode($response,JSON_FORCE_OBJECT);

}






/////////////////////// GUARDAR ANALISIS DE DOCUMENTACION GANADERO////////////////////////////////

function guardarAnalisisDocGanaderoRcia_campo()
{
    $response=array();
    $gestormonitoreo=new gestorMonitoreo();


    $response=array();
             $sql_and1="";
           //  $sql_and1="  and anho=4 ";
          //  if(isset($_SESSION['anhoActivo']) && ($_SESSION['anhoActivo']>0)){
          //     $sql_and1= " and anho=".$_SESSION['anhoActivo'];
          //  }
            if(isset($_POST['anhoActivoG']) && ($_POST['anhoActivoG']>0)){
                $sql_and1= " and anho=".$_POST['anhoActivoG'];
            }

            //$sql_mon1= " select m.idmonitoreo from monitoreo.monitoreo m inner join monitoreo.analisisdocumentacion  a on a.idmonitoreo = m.idmonitoreo inner join monitoreo.documentacion d on d.idDocumentacion=a.idDocumentacion
             //where d.tipodocumento=71 and   tipo=267 and estado = 1 and idregistro = ".$_SESSION['idreg'].$sql_and1;
            // $monitoreo = pg_query($cn,$sql_mon) ;
             $sql_mon1= " select m.idmonitoreo from monitoreo.monitoreo m
             where   tipo=269 and estado = 1 and idregistro = ".$_SESSION['idreg'].$sql_and1;

            // echo "con269=".$sql_mon1;

            $monitoreo1 =$gestormonitoreo->ejecute($sql= $sql_mon1) ;
            $row_monitoreo1= pg_fetch_array ($monitoreo1);
            $totalRows_monitoreo = pg_num_rows($monitoreo1);
           // echo "ajax consulta=".$sql_mon1." --id mon=".$totalRows_monitoreo;
            if($totalRows_monitoreo>0){
                $idmonitoreo1=$row_monitoreo1["idmonitoreo"];
            }else{
                $idmonitoreo1=0;
            }



        //----------  eliminar documentos evaluacion ganadero
        // $sql_mond= "delete from monitoreo.analisisdocumentacion  where  idmonitoreo = ".$idmonitoreo1."   and iddocumentacion in(select  iddocumentacion from  monitoreo.documentacion where tipodocumento=71) ";
       //  $monitoreod =$gestormonitoreo->ejecute($sql= $sql_mond) ;
         //$row_monitoreo= pg_fetch_array ($monitoreo);

        $cantFilas= $_POST["conteoC"];
        $codact=1;
        ///----- guardar documentos evaluacion ganadera

 $response= $gestormonitoreo->guardarObs($idmonitoreo1,$_POST["anhoActivoG"],$_POST["RAgricolaObservacionesG"],1);

         //-----  guardar evaluacion ponderaciones -----

 if(strlen($_POST["suppastoscultivadosG"])>0){$suppastoscultivados=$_POST["suppastoscultivadosG"];}else{$suppastoscultivados=0;}
if(strlen($_POST["alimentosupleG"])>0){$alimentosuple=$_POST["alimentosupleG"];}else{$alimentosuple=0;}
if(strlen($_POST["razasmejoradasG"])>0){$razasmejoradas=$_POST["razasmejoradasG"];}else{$razasmejoradas=0;}
if(strlen($_POST["enlisadosforrajeG"])>0){$enlisadosforraje=$_POST["enlisadosforrajeG"];}else{$enlisadosforraje=0;}
if(strlen($_POST["potrerosalamG"])>0){$potrerosalam=$_POST["potrerosalamG"];}else{$potrerosalam=0;}
if(strlen($_POST["atajadosG"])>0){$atajados=$_POST["atajadosG"];}else{$atajados=0;}
if(strlen($_POST["corralG"])>0){$corral=$_POST["corralG"];}else{$corral=0;}
if(strlen($_POST["breteG"])>0){$brete=$_POST["breteG"];}else{$brete=0;}
if(strlen($_POST["certificadosenasagG"])>0){$certificadosenasag=$_POST["certificadosenasagG"];}else{$certificadosenasag=0;}


       // tipo=1 = ganadero
       $response= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia2($idmonitoreo1,1,$suppastoscultivados,71);
       $response= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia2($idmonitoreo1,2,$alimentosuple,71);
       $response= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia2($idmonitoreo1,3,$razasmejoradas,71);
       $response= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia2($idmonitoreo1,4,$enlisadosforraje,71);
       $response= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia2($idmonitoreo1,5,$potrerosalam,71);
       $response= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia2($idmonitoreo1,6,$atajados,71);
       $response= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia2($idmonitoreo1,7,$corral,71);
       $response= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia2($idmonitoreo1,8,$brete,71);
       $response= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia2($idmonitoreo1,30,$certificadosenasag,71);


 // echo "holaa=".$response;
  header('Content-type: application/json; charset=utf-8');
  echo json_encode($response,JSON_FORCE_OBJECT);

}




function guardarAnalisisDocMon_gabinete()
{
    $response=array();
    $gestormonitoreo=new gestorMonitoreo();


    $response=array();
             $sql_and1="";
           //  $sql_and1="  and anho=4 ";
          //  if(isset($_SESSION['anhoActivo']) && ($_SESSION['anhoActivo']>0)){
          //     $sql_and1= " and anho=".$_SESSION['anhoActivo'];
          //  }
            if(isset($_POST['anhoActivoMG']) && ($_POST['anhoActivoMG']>0)){
                $sql_and1= " and anho=".$_POST['anhoActivoMG'];
            }
           // echo "añoooooooooo=".$sql_and1;

            //$sql_mon1= " select m.idmonitoreo from monitoreo.monitoreo m inner join monitoreo.analisisdocumentacion  a on a.idmonitoreo = m.idmonitoreo inner join monitoreo.documentacion d on d.idDocumentacion=a.idDocumentacion
             //where d.tipodocumento=71 and   tipo=267 and estado = 1 and idregistro = ".$_SESSION['idreg'].$sql_and1;
            // $monitoreo = pg_query($cn,$sql_mon) ;
             $sql_mon1= " select m.idmonitoreo from monitoreo.monitoreo m
             where   tipo=268 and estado = 1 and idregistro = ".$_SESSION['idreg'].$sql_and1;

             // echo "con268=".$sql_mon1;

            $monitoreo1 =$gestormonitoreo->ejecute($sql= $sql_mon1) ;
            $row_monitoreo1= pg_fetch_array ($monitoreo1);
            $totalRows_monitoreo = pg_num_rows($monitoreo1);
           // echo "ajax consulta=".$sql_mon1." --id mon=".$totalRows_monitoreo;
            if($totalRows_monitoreo>0){
                $idmonitoreo1=$row_monitoreo1["idmonitoreo"];
            }else{
                $idmonitoreo1=0;
            }



        //----------  eliminar documentos evaluacion ganadero
        // $sql_mond= "delete from monitoreo.analisisdocumentacion  where  idmonitoreo = ".$idmonitoreo1."   and iddocumentacion in(select  iddocumentacion from  monitoreo.documentacion where tipodocumento=71) ";
       //  $monitoreod =$gestormonitoreo->ejecute($sql= $sql_mond) ;
         //$row_monitoreo= pg_fetch_array ($monitoreo);

     //   $cantFilas= $_POST["conteoC"];
        //guardar Imagen
        //$response= $gestormonitoreo->guardar_imagen_monitoreo(0, $idmonitoreo1,$_POST["imagen_dir"],1);
        $codact=1;
        ///----- guardar documentos evaluacion ganadera

        $response= $gestormonitoreo->guardarObs($idmonitoreo1,$_POST["anhoActivoMG"],$_POST["RObservacionesGanadero_gabinete"],1);


		$numinf = $_POST["correlativoinforme"];
		$fechainf = $_POST["fechainforme"];
		$sql_mon11= " update monitoreo.monitoreo set numeroinforme = '".$numinf."',fechainforme = '".$fechainf."' where idmonitoreo = ".$idmonitoreo1;
		$monitoreo11 =$gestormonitoreo->ejecute($sql= $sql_mon11) ;


      //  echo "asiii paso;";
         //-----  guardar evaluacion ponderaciones -----

 if(strlen(trim($_POST["comg1"]))>0){$comprometido1=$_POST["comg1"];}else{$comprometido1=0;}
 if(strlen(trim($_POST["cuantg1_1"]))>0){$cuantificado1=$_POST["cuantg1_1"];}else{$cuantificado1=0;}
if(strlen(trim($_POST["alcanzadoMG1"]))>0){$alcanzado1=$_POST["alcanzadoMG1"];}else{$alcanzado1=0;}
if(strlen(trim($_POST["fuentesMG1"]))>0){$fuentes1=$_POST["fuentesMG1"];}else{$fuentes1="";}

 if(strlen(trim($_POST["comg2"]))>0){$comprometido2=$_POST["comg2"];}else{$comprometido2=0;}
 if(strlen(trim($_POST["cuantg2_2"]))>0){$cuantificado2=$_POST["cuantg2_2"];}else{$cuantificado2=0;}
if(strlen(trim($_POST["alcanzadoMG2"]))>0){$alcanzado2=$_POST["alcanzadoMG2"];}else{$alcanzado2=0;}
if(strlen(trim($_POST["fuentesMG2"]))>0){$fuentes2=$_POST["fuentesMG2"];}else{$fuentes2= "";}


 if(strlen(trim($_POST["comg3"]))>0){$comprometido3=$_POST["comg3"];}else{$comprometido3=0;}
 if(strlen(trim($_POST["cuantg3_3"]))>0){$cuantificado3=$_POST["cuantg3_3"];}else{$cuantificado3=0;}
if(strlen(trim($_POST["alcanzadoMG3"]))>0){$alcanzado3=$_POST["alcanzadoMG3"];}else{$alcanzado3=0;}
if(strlen(trim($_POST["fuentesMG3"]))>0){$fuentes3=$_POST["fuentesMG3"];}else{$fuentes3="";}

 if(strlen(trim($_POST["comg4"]))>0){$comprometido4=trim($_POST["comg4"]); }else{$comprometido4=0; }
 if(strlen(trim($_POST["cuantg4_4"]))>0){$cuantificado4=$_POST["cuantg4_4"];}else{$cuantificado4=0;}
if(strlen(trim($_POST["alcanzadoMG4"]))>0){$alcanzado4=$_POST["alcanzadoMG4"];}else{$alcanzado4=0;}
if(strlen(trim($_POST["fuentesMG4"]))>0){$fuentes4=$_POST["fuentesMG4"];}else{$fuentes4="";}

 if(strlen(trim($_POST["comg5"]))>0){$comprometido5=$_POST["comg5"];}else{$comprometido5=0;}
 if(strlen(trim($_POST["cuantg5_5"]))>0){$cuantificado5=$_POST["cuantg5_5"];}else{$cuantificado5=0;}
if(strlen(trim($_POST["alcanzadoMG5"]))>0){$alcanzado5=$_POST["alcanzadoMG5"];}else{$alcanzado5=0;}
if(strlen(trim($_POST["fuentesMG5"]))>0){$fuentes5=$_POST["fuentesMG5"];}else{$fuentes5="";}


 if(strlen(trim($_POST["comg6"]))>0){$comprometido6=$_POST["comg6"];}else{$comprometido6=0;}
 if(strlen(trim($_POST["cuantg6_6"]))>0){$cuantificado6=$_POST["cuantg6_6"];}else{$cuantificado6=0;}
if(strlen(trim($_POST["alcanzadoMG6"]))>0){$alcanzado6=$_POST["alcanzadoMG6"];}else{$alcanzado6=0;}
if(strlen(trim($_POST["fuentesMG6"]))>0){$fuentes6=$_POST["fuentesMG6"];}else{$fuentes6="";}


 if(strlen(trim($_POST["comg7"]))>0){$comprometido7=$_POST["comg7"];}else{$comprometido7=0;}
 if(strlen(trim($_POST["cuantg7_7"]))>0){$cuantificado7=$_POST["cuantg7_7"];}else{$cuantificado7=0;}
if(strlen(trim($_POST["alcanzadoMG7"]))>0){$alcanzado7=$_POST["alcanzadoMG7"];}else{$alcanzado7=0;}
if(strlen(trim($_POST["fuentesMG7"]))>0){$fuentes7=$_POST["fuentesMG7"];}else{$fuentes7="";}




/*
 if(strlen($_POST["comg2"])>0){$comprometido1=$_POST["comg1"];}else{$comprometido1=0;}
 if(strlen($_POST["cuantg2_2"])>0){$cuantificado1=$_POST["cuantg2_2"];}else{$cuantificado1=0;}
if(strlen($_POST["alcanzadoMG2"])>0){$alcanzado=$_POST["alcanzadoMG2"];}else{$alcanzado=0;}
if(strlen($_POST["fuentesMG1"])>0){$fuentes=$_POST["fuentesMG2"];}else{$fuentes=0;}
*/


/*if(strlen($_POST["razasmejoradasG"])>0){$razasmejoradas=$_POST["razasmejoradasG"];}else{$razasmejoradas=0;}
if(strlen($_POST["enlisadosforrajeG"])>0){$enlisadosforraje=$_POST["enlisadosforrajeG"];}else{$enlisadosforraje=0;}
if(strlen($_POST["potrerosalamG"])>0){$potrerosalam=$_POST["potrerosalamG"];}else{$potrerosalam=0;}
if(strlen($_POST["atajadosG"])>0){$atajados=$_POST["atajadosG"];}else{$atajados=0;}
if(strlen($_POST["corralG"])>0){$corral=$_POST["corralG"];}else{$corral=0;}
if(strlen($_POST["breteG"])>0){$brete=$_POST["breteG"];}else{$brete=0;}
if(strlen($_POST["certificadosenasagG"])>0){$certificadosenasag=$_POST["certificadosenasagG"];}else{$certificadosenasag=0;}*/

//echo "comprometido4=".$comprometido4;

 $response= $gestormonitoreo->guardar_evaluacionMon_gabinete($idmonitoreo1,1,$comprometido1,$cuantificado1,$alcanzado1,$fuentes1);
 $response= $gestormonitoreo->guardar_evaluacionMon_gabinete($idmonitoreo1,2,$comprometido2,$cuantificado2,$alcanzado2,$fuentes2);
 $response= $gestormonitoreo->guardar_evaluacionMon_gabinete($idmonitoreo1,3,$comprometido3,$cuantificado3,$alcanzado3,$fuentes3);
 $response= $gestormonitoreo->guardar_evaluacionMon_gabinete($idmonitoreo1,4,$comprometido4,$cuantificado4,$alcanzado4,$fuentes4);
 $response= $gestormonitoreo->guardar_evaluacionMon_gabinete($idmonitoreo1,31,$comprometido5,$cuantificado5,$alcanzado5,$fuentes5);
 $response= $gestormonitoreo->guardar_evaluacionMon_gabinete($idmonitoreo1,32,$comprometido6,$cuantificado6,$alcanzado6,$fuentes6);
 $response= $gestormonitoreo->guardar_evaluacionMon_gabinete($idmonitoreo1,33,$comprometido7,$cuantificado7,$alcanzado7,$fuentes7);



    $response2= $gestormonitoreo->guardar_imagen_monitoreo(0, $idmonitoreo1,$_POST["imagen_dir"],1);

 // echo "holaa=".$response;
  header('Content-type: application/json; charset=utf-8');
  echo json_encode($response,JSON_FORCE_OBJECT);

}






/////////////////////// GUARDAR ANALISIS DE DOCUMENTACION AGRICOLA////////////////////////////////

function guardaranalisisdocumentosAgricola()
{
    $response=array();
    $gestormonitoreo=new gestorMonitoreo();


    $response=array();
            $sql_and1="";

       // if(isset($_SESSION['anhoActivo_']) && ($_SESSION['anhoActivo_']>0)){
        //    $sql_and1= " and anho=".$_SESSION['anhoActivo_'];
       // }
       // echo "anhooooo=".$_POST["anhoActivo"]." session=".$_SESSION['anhoActivo'];
        if(isset($_POST['anhoActivo']) && ($_POST['anhoActivo']>0)){
            $sql_and1= " and m.anho=".$_POST['anhoActivo'];
        }


       // $sql_mon1= "select m.idmonitoreo from monitoreo.monitoreo m inner join monitoreo.analisisdocumentacion  a on a.idmonitoreo = m.idmonitoreo inner join monitoreo.documentacion d on d.idDocumentacion=a.idDocumentacion
       // where d.tipodocumento=70 and tipo=267  and m.estado = 1 and m.idregistro = ".$_SESSION['idreg'].$sql_and1;
         $sql_mon1= " select m.idmonitoreo from monitoreo.monitoreo m
             where   tipo=267 and estado = 1 and idregistro = ".$_SESSION['idreg'].$sql_and1;

        //echo "axxx:".$sql_mon1;
        $monitoreo1 =$gestormonitoreo->ejecute($sql= $sql_mon1) ;
        $row_monitoreo1= pg_fetch_array ($monitoreo1);
        $totalRows_monitoreo = pg_num_rows($monitoreo1);

        $idmonitoreo1=$row_monitoreo1[0];


        //echo "idmo=".$idmonitoreo1;
        //----------  eliminar documentos evaluacion ganadero
        //$sql_mond= "delete from monitoreo.analisisdocumentacion  where  idmonitoreo = ".$idmonitoreo1;
        $sql_mond= "delete from monitoreo.analisisdocumentacion  where  idmonitoreo = ".$idmonitoreo1."   and iddocumentacion in(select  iddocumentacion from  monitoreo.documentacion where tipodocumento=70) ";

        $monitoreod =$gestormonitoreo->ejecute($sql= $sql_mond) ;
        //$row_monitoreo= pg_fetch_array ($monitoreo);

        $cantFilas= $_POST["conteoC"];
        $codact=1;
        ///----- guardar documentos evaluacion ganadera
//echo "antesssssss";
        $tipoPredio=0;
        $tipoPredio= $_POST["idtipoPredio"];

       // echo "TIOP_PERIODO=".$tipoPredio;


        while ( $codact<=$cantFilas)
        {
                if ( isset($_POST["txtdetalle1-".$codact]) ) {
                    $iddoc = 12; //-- USO DE ALIMENTOS SUPLEMENTARIOS
                    $detallecontenido= $_POST["txtdetalle1-".$codact];
                    $monto_cant=  $_POST["txtmonto_cantidad1-".$codact];
                    $obse= $_POST["txtobs1-".$codact];
                    $response= $gestormonitoreo->guardar_doc_Analisis_evaluacion_rcia($idmonitoreo1,$iddoc,$detallecontenido,$monto_cant,$obse);
                  }

                  if ( isset($_POST["txtdetalle2-".$codact]) ) {
                    $iddoc =13; //-- razas mejoradas
                    $detallecontenido= $_POST["txtdetalle2-".$codact];
                    $monto_cant=  $_POST["txtmonto_cantidad2-".$codact];
                    $obse= $_POST["txtobs2-".$codact];
                    $response= $gestormonitoreo->guardar_doc_Analisis_evaluacion_rcia($idmonitoreo1,$iddoc,$detallecontenido,$monto_cant,$obse);
                  }
                  if ( isset($_POST["txtdetalle3-".$codact]) ) {
                    $iddoc =14; //-- ensilado de forraje
                    $detallecontenido= $_POST["txtdetalle3-".$codact];
                    $monto_cant=  $_POST["txtmonto_cantidad3-".$codact];
                    $obse= $_POST["txtobs3-".$codact];
                    $response= $gestormonitoreo->guardar_doc_Analisis_evaluacion_rcia($idmonitoreo1,$iddoc,$detallecontenido,$monto_cant,$obse);
                  }
                  if ( isset($_POST["txtdetalle4-".$codact]) ) {
                    $iddoc =15; //-- Potreros alambrados, Cercas Eléctricas, saleros
                    $detallecontenido= $_POST["txtdetalle4-".$codact];
                    $monto_cant=  $_POST["txtmonto_cantidad4-".$codact];
                    $obse= $_POST["txtobs4-".$codact];
                    $response= $gestormonitoreo->guardar_doc_Analisis_evaluacion_rcia($idmonitoreo1,$iddoc,$detallecontenido,$monto_cant,$obse);
                  }
                  if ( isset($_POST["txtdetalle5-".$codact]) ) {
                    $iddoc =16; //-- Atajados, pozos, noques, tanques, bebederos
                    $detallecontenido= $_POST["txtdetalle5-".$codact];
                    $monto_cant=  $_POST["txtmonto_cantidad5-".$codact];
                    $obse= $_POST["txtobs5-".$codact];
                    $response= $gestormonitoreo->guardar_doc_Analisis_evaluacion_rcia($idmonitoreo1,$iddoc,$detallecontenido,$monto_cant,$obse);
                  }
                  if ( isset($_POST["txtdetalle6-".$codact]) ) {
                    $iddoc =17; //-- Corral
                    $detallecontenido= $_POST["txtdetalle6-".$codact];
                    $monto_cant=  $_POST["txtmonto_cantidad6-".$codact];
                    $obse= $_POST["txtobs6-".$codact];
                    $response= $gestormonitoreo->guardar_doc_Analisis_evaluacion_rcia($idmonitoreo1,$iddoc,$detallecontenido,$monto_cant,$obse);
                  }
                  if ( isset($_POST["txtdetalle7-".$codact]) ) {
                    $iddoc =18; //-- Brete, Cepo, balanza, cargadero
                    $detallecontenido= $_POST["txtdetalle7-".$codact];
                    $monto_cant=  $_POST["txtmonto_cantidad7-".$codact];
                    $obse= $_POST["txtobs7-".$codact];
                    $response= $gestormonitoreo->guardar_doc_Analisis_evaluacion_rcia($idmonitoreo1,$iddoc,$detallecontenido,$monto_cant,$obse);
                  }
                  if ( isset($_POST["txtdetalle8-".$codact]) ) {
                    $iddoc =19; //-- Brete, Cepo, balanza, cargadero
                    $detallecontenido= $_POST["txtdetalle8-".$codact];
                    $monto_cant=  $_POST["txtmonto_cantidad8-".$codact];
                    $obse= $_POST["txtobs8-".$codact];
                    $response= $gestormonitoreo->guardar_doc_Analisis_evaluacion_rcia($idmonitoreo1,$iddoc,$detallecontenido,$monto_cant,$obse);
                  }
                  if ( isset($_POST["txtdetalle9-".$codact]) ) {
                    $iddoc =20; //-- Compra de Ganado
                    $detallecontenido= $_POST["txtdetalle9-".$codact];
                    $monto_cant=  $_POST["txtmonto_cantidad9-".$codact];
                    $obse= $_POST["txtobs9-".$codact];
                    $response= $gestormonitoreo->guardar_doc_Analisis_evaluacion_rcia($idmonitoreo1,$iddoc,$detallecontenido,$monto_cant,$obse);
                  }

                  if ( isset($_POST["txtdetalle10-".$codact]) ) {
                    $iddoc =21; //-- "Venta de Ganado"
                    $detallecontenido= $_POST["txtdetalle10-".$codact];
                    $monto_cant=  $_POST["txtmonto_cantidad10-".$codact];
                    $obse= $_POST["txtobs10-".$codact];
                    $response= $gestormonitoreo->guardar_doc_Analisis_evaluacion_rcia($idmonitoreo1,$iddoc,$detallecontenido,$monto_cant,$obse);
                  }

 //echo "antesssssss";
             $codact++;
         }



         //-----  guardar evaluacion VALORACION DE ALIMENTOS-----


         $doccomerPonderacion=0;
        $compSemillaPonderacion=0;
        $adquInsumoPonderacion=0;
        $combusiblePonderacion=0;
        $aplicacionPonderacion=0;
        $maqHerraPonderacion=0;
        $abonoInsPonderacion=0;

// echo "problema maqErra=".$maqHerraPonderacion." -abono=".$abonoInsPonderacion;


       // tipo=2 = agricola
        if($tipoPredio==37 || $tipoPredio==38 ){// pequeños y comunidad if($tipoPredio==37 || $tipoPredio==38){


            $responseid1= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia($idmonitoreo1,34,$doccomerPonderacion,70);

            $responseid5= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia($idmonitoreo1,16,$aplicacionPonderacion,70);
            $responseid6= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia($idmonitoreo1,17,$maqHerraPonderacion,70);
            $responseid7= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia($idmonitoreo1,18,$abonoInsPonderacion,70);

        }else{

            $responseid1= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia($idmonitoreo1,12,$doccomerPonderacion,70);
            $responseid2= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia($idmonitoreo1,13,$compSemillaPonderacion,70);
            $responseid3= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia($idmonitoreo1,14,$adquInsumoPonderacion,70);
            $responseid4= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia($idmonitoreo1,15,$combusiblePonderacion,70);
            $responseid5= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia($idmonitoreo1,16,$aplicacionPonderacion,70);
            $responseid6= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia($idmonitoreo1,17,$maqHerraPonderacion,70);
            $responseid7= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia($idmonitoreo1,18,$abonoInsPonderacion,70);

        }

      // echo "dddddddddd";
      ///---  FIN GUARDAR VALORACION  DE ALIMENTOS --- //////


      //--GUARDAR LOS CULTIVOS


     //-------------------PARA SACAR LOS CULTIVOS CORRESPONDIENTES--------------------------
       /* $sql_and="";
        if(isset($_POST['anhoActivo_']) && ($_POST['anhoActivo_']>0)){
            $sql_and= " and anho=".$_POST['anhoActivo_']; $_SESSION['anhoActivo_']=$_POST['anhoActivo_'];
        }else{
            $sql_and=" order by anho asc  limit 1" ;$_SESSION['anhoActivo_']=0;
            }

         $sql_anho="select * from monitoreo.monitoreo m   where   m.estado = 1 and  m.idregistro = ".$_SESSION['idreg'].$sql_and;
        $mon_anho= pg_query($cn,$sql_anho);
       // $row_anho = pg_fetch_assoc($mon_anho);
        $anho=0;
        $anho=$row_anho["anho"];*/

       //-- COMPROMETIDOS   VERANOOOOO
       $sql_cultivos = "select c.idcultivo,c.nombrecultivo
		from monitoreo.monitoreo m inner join monitoreo.plancultivo p on p.idmonitoreo=m.idmonitoreo inner join cultivo c on c.idcultivo=p.idcultivo
        where supveranoejecutado>0  AND m.estado = 1 and p.estado = 1 and p.comprometido=0 and m.idregistro  = ".$_SESSION['idreg']."  and m.anho=".$_POST["anhoActivo"]." order by c.nombrecultivo asc" ;

        $totalRows_cultivos=0;
        $rcia_cultivos  =$gestormonitoreo->ejecute($sql=$sql_cultivos) ;
        $totalRows_cultivos= pg_num_rows($rcia_cultivos);
      //  $row_cultivos=pg_fetch_array($rcia_cultivos);
        ///--- FIN SACAR CULTIVOS
         //echo"consultaxxx=".$totalRows_cultivos." -  reeee=".$responseid1 ;
       if($tipoPredio==37 || $tipoPredio==38){ // pequeños y comunidad if($tipoPredio==37 || $tipoPredio==38){
        $row1 = pg_fetch_array($responseid1);
        //$row2 = pg_fetch_array($responseid2);
       // $row3 = pg_fetch_array($responseid3);
       // $row4 = pg_fetch_array($responseid4);
        $row5 = pg_fetch_array($responseid5);
        $row6 = pg_fetch_array($responseid6);
        $row7 = pg_fetch_array($responseid7);

        $inic=1;
            while ($row_cultivos=pg_fetch_array($rcia_cultivos) )
            {
               //  echo '-idcultio='.$row_cultivos["idcultivo"];
                 if($tipoPredio==37 || $tipoPredio==38){
                      if(strlen($_POST["doccomer".$inic])>0){$val1=$_POST["doccomer".$inic];}else{$val1=0;}
                         $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row1[0],$row_cultivos["idcultivo"],$val1,1,"verano");

                         if(strlen($_POST["aplicacion".$inic])>0){$val5=$_POST["aplicacion".$inic];}else{$val5=0;}
                         $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row5[0],$row_cultivos["idcultivo"],$val5,1,"verano");

                         if(strlen($_POST["maqHerra".$inic])>0){$val6=$_POST["maqHerra".$inic];}else{$val6=0;}
                        // echo "hhhhhhhh=".$val6;
                         $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row6[0],$row_cultivos["idcultivo"],$val6,1,"verano");

                        if(strlen($_POST["abonoIns".$inic])>0){$val7=$_POST["abonoIns".$inic];}else{$val7=0;}
                         $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row7[0],$row_cultivos["idcultivo"],$val7,1,"verano");

                     //ponderacion
                      if(strlen($_POST["superProd".$inic])>0){$val8=$_POST["superProd".$inic];}else{$val8=0;}
                      if(strlen($_POST["totalc".$inic])>0){$val9=$_POST["totalc".$inic];}else{$val9=0;}
                      if(strlen($_POST["porpon".$inic])>0){$val10=$_POST["porpon".$inic];}else{$val10=0;}


                      $response= $gestormonitoreo->guardar_ponderacioncultivo_agri_rcia($idmonitoreo1,$val8,$row_cultivos["idcultivo"],1,"verano",$val9,$val10);
                    //  echo "pasooo";
                    // exit();
                    // echo "ya no pasooo";
                 }else{



                          if(strlen($_POST["doccomer".$inic])>0){$val1=$_POST["doccomer".$inic];}else{$val1=0;}
                    $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row1[0],$row_cultivos["idcultivo"],$val1,1,"verano");

                      if(strlen($_POST["compSemilla".$inic])>0){$val2=$_POST["compSemilla".$inic];}else{$val2=0;}
                     $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row2[0],$row_cultivos["idcultivo"],$val2,1,"verano");

                    if(strlen($_POST["adquInsumo".$inic])>0){$val3=$_POST["adquInsumo".$inic];}else{$val3=0;}
                     $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row3[0],$row_cultivos["idcultivo"],$val3,1,"verano");

                       if(strlen($_POST["combusible".$inic])>0){$val4=$_POST["combusible".$inic];}else{$val4=0;}
                     $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row4[0],$row_cultivos["idcultivo"],$val4,1,"verano");

                     if(strlen($_POST["aplicacion".$inic])>0){$val5=$_POST["aplicacion".$inic];}else{$val5=0;}
                     $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row5[0],$row_cultivos["idcultivo"],$val5,1,"verano");

                     if(strlen($_POST["maqHerra".$inic])>0){$val6=$_POST["maqHerra".$inic];}else{$val6=0;}
                    // echo "hhhhhhhh=".$val6;
                     $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row6[0],$row_cultivos["idcultivo"],$val6,1,"verano");

                    if(strlen($_POST["abonoIns".$inic])>0){$val7=$_POST["abonoIns".$inic];}else{$val7=0;}
                     $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row7[0],$row_cultivos["idcultivo"],$val7,1,"verano");


                     //ponderacion
                      if(strlen($_POST["superProd".$inic])>0){$val8=$_POST["superProd".$inic];}else{$val8=0;}
                      if(strlen($_POST["totalc".$inic])>0){$val9=$_POST["totalc".$inic];}else{$val9=0;}
                      if(strlen($_POST["porpon".$inic])>0){$val10=$_POST["porpon".$inic];}else{$val10=0;}

                      $response= $gestormonitoreo->guardar_ponderacioncultivo_agri_rcia($idmonitoreo1,$val8,$row_cultivos["idcultivo"],1,"verano",$val9,$val10);

                 }


                $inic++;
            }


       }else{

            $row1 = pg_fetch_array($responseid1);
        $row2 = pg_fetch_array($responseid2);
        $row3 = pg_fetch_array($responseid3);
        $row4 = pg_fetch_array($responseid4);
        $row5 = pg_fetch_array($responseid5);
        $row6 = pg_fetch_array($responseid6);
        $row7 = pg_fetch_array($responseid7);

        $inic=1;
            while ($row_cultivos=pg_fetch_array($rcia_cultivos) )
            {

                if($tipoPredio==37 || $tipoPredio==38){
                         if(strlen($_POST["doccomer".$inic])>0){$val1=$_POST["doccomer".$inic];}else{$val1=0;}
                        $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row1[0],$row_cultivos["idcultivo"],$val1,1,"verano");


                         if(strlen($_POST["aplicacion".$inic])>0){$val5=$_POST["aplicacion".$inic];}else{$val5=0;}
                         $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row5[0],$row_cultivos["idcultivo"],$val5,1,"verano");

                         if(strlen($_POST["maqHerra".$inic])>0){$val6=$_POST["maqHerra".$inic];}else{$val6=0;}
                        // echo "hhhhhhhh=".$val6;
                         $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row6[0],$row_cultivos["idcultivo"],$val6,1,"verano");

                        if(strlen($_POST["abonoIns".$inic])>0){$val7=$_POST["abonoIns".$inic];}else{$val7=0;}
                         $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row7[0],$row_cultivos["idcultivo"],$val7,1,"verano");

                         //ponderacion
                          if(strlen($_POST["superProd".$inic])>0){$val8=$_POST["superProd".$inic];}else{$val8=0;}
                         if(strlen($_POST["totalc".$inic])>0){$val9=$_POST["totalc".$inic];}else{$val9=0;}
                         if(strlen($_POST["porpon".$inic])>0){$val10=$_POST["porpon".$inic];}else{$val10=0;}

                          $response= $gestormonitoreo->guardar_ponderacioncultivo_agri_rcia($idmonitoreo1,$val8,$row_cultivos["idcultivo"],1,"verano",$val9,$val10);

                }else{
                      if(strlen($_POST["doccomer".$inic])>0){$val1=$_POST["doccomer".$inic];}else{$val1=0;}
                        $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row1[0],$row_cultivos["idcultivo"],$val1,1,"verano");

                         if(strlen($_POST["compSemilla".$inic])>0){$val2=$_POST["compSemilla".$inic];}else{$val2=0;}
                        // Echo "val2==".$val2;
                         $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row2[0],$row_cultivos["idcultivo"],$val2,1,"verano");

                         if(strlen($_POST["adquInsumo".$inic])>0){$val3=$_POST["adquInsumo".$inic];}else{$val3=0;}
                         $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row3[0],$row_cultivos["idcultivo"],$val3,1,"verano");

                         if(strlen($_POST["combusible".$inic])>0){$val4=$_POST["combusible".$inic];}else{$val4=0;}
                         $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row4[0],$row_cultivos["idcultivo"],$val4,1,"verano");

                         if(strlen($_POST["aplicacion".$inic])>0){$val5=$_POST["aplicacion".$inic];}else{$val5=0;}
                         $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row5[0],$row_cultivos["idcultivo"],$val5,1,"verano");

                         if(strlen($_POST["maqHerra".$inic])>0){$val6=$_POST["maqHerra".$inic];}else{$val6=0;}
                        // echo "hhhhhhhh=".$val6;
                         $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row6[0],$row_cultivos["idcultivo"],$val6,1,"verano");

                        if(strlen($_POST["abonoIns".$inic])>0){$val7=$_POST["abonoIns".$inic];}else{$val7=0;}
                         $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row7[0],$row_cultivos["idcultivo"],$val7,1,"verano");

                         //ponderacion
                          if(strlen($_POST["superProd".$inic])>0){$val8=$_POST["superProd".$inic];}else{$val8=0;}
                            if(strlen($_POST["totalc".$inic])>0){$val9=$_POST["totalc".$inic];}else{$val9=0;}
                         if(strlen($_POST["porpon".$inic])>0){$val10=$_POST["porpon".$inic];}else{$val10=0;}

                          $response= $gestormonitoreo->guardar_ponderacioncultivo_agri_rcia($idmonitoreo1,$val8,$row_cultivos["idcultivo"],1,"verano",$val9,$val10);

                }
               // echo '-idcultio='.$row_cultivos["idcultivo"];


                $inic++;
            }

       }
      //-- FIN DE COMPROMETIDOS   VERANOOOO


      //-- NO NO COMPROMETIDOS -- //
       $sql_cultivos = "select c.idcultivo,c.nombrecultivo
		from monitoreo.monitoreo m inner join monitoreo.plancultivo p on p.idmonitoreo=m.idmonitoreo inner join cultivo c on c.idcultivo=p.idcultivo
        where supveranoejecutado>0   and m.estado = 1 and p.estado = 1 and p.comprometido=1 and m.idregistro  = ".$_SESSION['idreg']."  and m.anho=".$_POST["anhoActivo"]." order by c.nombrecultivo asc" ;
      // echo "NO COMPROMETIDO=".$sql_cultivos;
     //$totalRows_cultivos=0;
     $rcia_cultivos  =$gestormonitoreo->ejecute($sql=$sql_cultivos) ;
     $totalRows_cultivos= pg_num_rows($rcia_cultivos);
      //  $row_cultivos=pg_fetch_array($rcia_cultivos);
        ///--- FIN SACAR CULTIVOS
        //echo"consulta=".$totalRows_cultivos."-fin-idcul=".$row_cultivos["idcultivo"]."-fin";
    // ECHO "CANTIADD no c=".$totalRows_cultivos;

     if($tipoPredio==37 || $tipoPredio==38){// pequeños y comunidad if($tipoPredio==37 || $tipoPredio==38){

            if($totalRows_cultivos>0){
            $inic=1;
            while ($row_cultivos=pg_fetch_array($rcia_cultivos) )
            {
               if(strlen($_POST["doccomer".$inic."_no"])>0){$val1=$_POST["doccomer".$inic."_no"];}else{$val1=0;}
             // echo "ROW=".$row1[0]." - row cult=".$row_cultivos["idcultivo"]." -val1=".$val1;
               $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row1[0],$row_cultivos["idcultivo"],$val1,0,"verano");


               if(strlen($_POST["aplicacion".$inic."_no"])>0){$val5=$_POST["aplicacion".$inic."_no"];}else{$val5=0;}
               $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row5[0],$row_cultivos["idcultivo"],$val5,0,"verano");

               if(strlen($_POST["maqHerra".$inic."_no"])>0){$val6=$_POST["maqHerra".$inic."_no"];}else{$val6=0;}
              // echo "hhhhhhhh=".$val6;
               $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row6[0],$row_cultivos["idcultivo"],$val6,0,"verano");

              if(strlen($_POST["abonoIns".$inic."_no"])>0){$val7=$_POST["abonoIns".$inic."_no"];}else{$val7=0;}
               $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row7[0],$row_cultivos["idcultivo"],$val7,0,"verano");

               if(strlen($_POST["superProdNo".$inic])>0){$val8=$_POST["superProdNo".$inic];}else{$val8=0;}
               if(strlen($_POST["totalnoc".$inic])>0){$val9=$_POST["totalnoc".$inic];}else{$val9=0;}
               if(strlen($_POST["porpon_no".$inic])>0){$val10=$_POST["porpon_no".$inic];}else{$val10=0;}

               $response= $gestormonitoreo->guardar_ponderacioncultivo_agri_rcia($idmonitoreo1,$val8,$row_cultivos["idcultivo"],0,"verano",$val9,$val10);

               $inic++;
            }
      }


     }else{
             if($totalRows_cultivos>0){
            $inic=1;
             while ($row_cultivos=pg_fetch_array($rcia_cultivos) )
            {
               if(strlen($_POST["doccomer".$inic."_no"])>0){$val1=$_POST["doccomer".$inic."_no"];}else{$val1=0;}
             // echo "ROW=".$row1[0]." - row cult=".$row_cultivos["idcultivo"]." -val1=".$val1;
               $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row1[0],$row_cultivos["idcultivo"],$val1,0,"verano");

               if(strlen($_POST["compSemilla".$inic."_no"])>0){$val2=$_POST["compSemilla".$inic."_no"];}else{$val2=0;}
               $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row2[0],$row_cultivos["idcultivo"],$val2,0,"verano");

               if(strlen($_POST["adquInsumo".$inic."_no"])>0){$val3=$_POST["adquInsumo".$inic."_no"];}else{$val3=0;}
               $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row3[0],$row_cultivos["idcultivo"],$val3,0,"verano");

               if(strlen($_POST["combusible".$inic."_no"])>0){$val4=$_POST["combusible".$inic."_no"];}else{$val4=0;}
               $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row4[0],$row_cultivos["idcultivo"],$val4,0,"verano");

               if(strlen($_POST["aplicacion".$inic."_no"])>0){$val5=$_POST["aplicacion".$inic."_no"];}else{$val5=0;}
               $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row5[0],$row_cultivos["idcultivo"],$val5,0,"verano");

               if(strlen($_POST["maqHerra".$inic."_no"])>0){$val6=$_POST["maqHerra".$inic."_no"];}else{$val6=0;}
              // echo "hhhhhhhh=".$val6;
               $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row6[0],$row_cultivos["idcultivo"],$val6,0,"verano");

              if(strlen($_POST["abonoIns".$inic."_no"])>0){$val7=$_POST["abonoIns".$inic."_no"];}else{$val7=0;}
               $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row7[0],$row_cultivos["idcultivo"],$val7,0,"verano");

               if(strlen($_POST["superProdNo".$inic])>0){$val8=$_POST["superProdNo".$inic];}else{$val8=0;}
               if(strlen($_POST["totalnoc".$inic])>0){$val9=$_POST["totalnoc".$inic];}else{$val9=0;}
               if(strlen($_POST["porpon_no".$inic])>0){$val10=$_POST["porpon_no".$inic];}else{$val10=0;}

               $response= $gestormonitoreo->guardar_ponderacioncultivo_agri_rcia($idmonitoreo1,$val8,$row_cultivos["idcultivo"],0,"verano",$val9,$val10);

               $inic++;
            }
      }


     }





      //-- FIN DE NO COMRPOMETIDOS---
     //$row1["ff_guardar_evaluacionAlimentos_gan_rcia"]
   // echo "con2:".$row1[0]."-fin";
    // echo "holaaaaaaa:".$idmonitoreo1;



       //------ COMPROMETIDOS   INVIERNOOOOOOOooooooooo -----
       $sql_cultivos = "select c.idcultivo,c.nombrecultivo
		from monitoreo.monitoreo m inner join monitoreo.plancultivo p on p.idmonitoreo=m.idmonitoreo inner join cultivo c on c.idcultivo=p.idcultivo
        where supinviernoejecutado>0   AND m.estado = 1 and p.estado = 1 and p.comprometido=0 and m.idregistro  = ".$_SESSION['idreg']."  and m.anho=".$_POST["anhoActivo"]." order by c.nombrecultivo asc" ;

        $totalRows_cultivos=0;
        $rcia_cultivos  =$gestormonitoreo->ejecute($sql=$sql_cultivos) ;
        $totalRows_cultivos= pg_num_rows($rcia_cultivos);
      //  $row_cultivos=pg_fetch_array($rcia_cultivos);
        ///--- FIN SACAR CULTIVOS

      $inic=1;

       if($tipoPredio==37 || $tipoPredio==38){  // pequeños y comunidad if($tipoPredio==37 || $tipoPredio==38){

            while ($row_cultivos=pg_fetch_array($rcia_cultivos) )
            {
               // echo '-idcultio='.$row_cultivos["idcultivo"];
               if(strlen($_POST["doccomer_inv".$inic])>0){$val1=$_POST["doccomer_inv".$inic];}else{$val1=0;}
              $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row1[0],$row_cultivos["idcultivo"],$val1,1,"invierno");


               if(strlen($_POST["aplicacion_inv".$inic])>0){$val5=$_POST["aplicacion_inv".$inic];}else{$val5=0;}
               $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row5[0],$row_cultivos["idcultivo"],$val5,1,"invierno");

               if(strlen($_POST["maqHerra_inv".$inic])>0){$val6=$_POST["maqHerra_inv".$inic];}else{$val6=0;}
              // echo "hhhhhhhh=".$val6;
               $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row6[0],$row_cultivos["idcultivo"],$val6,1,"invierno");

              if(strlen($_POST["abonoIns_inv".$inic])>0){$val7=$_POST["abonoIns_inv".$inic];}else{$val7=0;}
               $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row7[0],$row_cultivos["idcultivo"],$val7,1,"invierno");

               if(strlen($_POST["superProdInv".$inic])>0){$val8=$_POST["superProdInv".$inic];}else{$val8=0;}
               if(strlen($_POST["totalInv".$inic])>0){$val9=$_POST["totalInv".$inic];}else{$val9=0;}
               if(strlen($_POST["porponinv".$inic])>0){$val10=$_POST["porponinv".$inic];}else{$val10=0;}

               $response= $gestormonitoreo->guardar_ponderacioncultivo_agri_rcia($idmonitoreo1,$val8,$row_cultivos["idcultivo"],1,"invierno",$val9,$val10);

                $inic++;
            }


      }else{
              while ($row_cultivos=pg_fetch_array($rcia_cultivos) )
            {
               // echo '-idcultio='.$row_cultivos["idcultivo"];
               if(strlen($_POST["doccomer_inv".$inic])>0){$val1=$_POST["doccomer_inv".$inic];}else{$val1=0;}
              $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row1[0],$row_cultivos["idcultivo"],$val1,1,"invierno");

               if(strlen($_POST["compSemilla_inv".$inic])>0){$val2=$_POST["compSemilla_inv".$inic];}else{$val2=0;}
              // Echo "val2==".$val2;
               $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row2[0],$row_cultivos["idcultivo"],$val2,1,"invierno");

               if(strlen($_POST["adquInsumo_inv".$inic])>0){$val3=$_POST["adquInsumo_inv".$inic];}else{$val3=0;}
               $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row3[0],$row_cultivos["idcultivo"],$val3,1,"invierno");

               if(strlen($_POST["combusible_inv".$inic])>0){$val4=$_POST["combusible_inv".$inic];}else{$val4=0;}
               $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row4[0],$row_cultivos["idcultivo"],$val4,1,"invierno");

               if(strlen($_POST["aplicacion_inv".$inic])>0){$val5=$_POST["aplicacion_inv".$inic];}else{$val5=0;}
               $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row5[0],$row_cultivos["idcultivo"],$val5,1,"invierno");

               if(strlen($_POST["maqHerra_inv".$inic])>0){$val6=$_POST["maqHerra_inv".$inic];}else{$val6=0;}
              // echo "hhhhhhhh=".$val6;
               $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row6[0],$row_cultivos["idcultivo"],$val6,1,"invierno");

              if(strlen($_POST["abonoIns_inv".$inic])>0){$val7=$_POST["abonoIns_inv".$inic];}else{$val7=0;}
               $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row7[0],$row_cultivos["idcultivo"],$val7,1,"invierno");

               if(strlen($_POST["superProdInv".$inic])>0){$val8=$_POST["superProdInv".$inic];}else{$val8=0;}
               if(strlen($_POST["totalInv".$inic])>0){$val9=$_POST["totalInv".$inic];}else{$val9=0;}
               if(strlen($_POST["porponinv".$inic])>0){$val10=$_POST["porponinv".$inic];}else{$val10=0;}

               $response= $gestormonitoreo->guardar_ponderacioncultivo_agri_rcia($idmonitoreo1,$val8,$row_cultivos["idcultivo"],1,"invierno",$val9,$val10);

                $inic++;
            }

      }

      //-- FIN DE COMPROMETIDOS   VERANOOOO






        //-- NO NO COMPROMETIDOS  inviernoooo-- //
       $sql_cultivos = "select c.idcultivo,c.nombrecultivo
		from monitoreo.monitoreo m inner join monitoreo.plancultivo p on p.idmonitoreo=m.idmonitoreo inner join cultivo c on c.idcultivo=p.idcultivo
        where supinviernoejecutado>0   and m.estado = 1 and p.estado = 1 and p.comprometido=1 and m.idregistro  = ".$_SESSION['idreg']."  and m.anho=".$_POST["anhoActivo"]." order by c.nombrecultivo asc" ;
      // echo "NO COMPROMETIDO=".$sql_cultivos;
     //$totalRows_cultivos=0;
     $rcia_cultivos  =$gestormonitoreo->ejecute($sql=$sql_cultivos) ;
     $totalRows_cultivos= pg_num_rows($rcia_cultivos);
      //  $row_cultivos=pg_fetch_array($rcia_cultivos);
        //--- FIN SACAR CULTIVOS   INVIERNOOOOOO

        //echo"consulta=".$totalRows_cultivos."-fin-idcul=".$row_cultivos["idcultivo"]."-fin";
    // ECHO "CANTIADD no c=".$totalRows_cultivos;
     if($totalRows_cultivos>0){
            $inic=1;
            while ($row_cultivos=pg_fetch_array($rcia_cultivos) )
            {


                  if($tipoPredio==37 || $tipoPredio==38){   // pequeños y comunidad if($tipoPredio==37 || $tipoPredio==38){
                      if(strlen($_POST["doccomer_no_inv".$inic."_no"])>0){$val1=$_POST["doccomer_no_inv".$inic."_no"];}else{$val1=0;}
                        // echo "ROW=".$row1[0]." - row cult=".$row_cultivos["idcultivo"]." -val1=".$val1;
                      $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row1[0],$row_cultivos["idcultivo"],$val1,0,"invierno");

                      if(strlen($_POST["aplicacion_no_inv".$inic."_no"])>0){$val5=$_POST["aplicacion_no_inv".$inic."_no"];}else{$val5=0;}
                      $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row5[0],$row_cultivos["idcultivo"],$val5,0,"invierno");

                      if(strlen($_POST["maqHerra_no_inv".$inic."_no"])>0){$val6=$_POST["maqHerra_no_inv".$inic."_no"];}else{$val6=0;}
                     // echo "hhhhhhhh=".$val6;
                      $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row6[0],$row_cultivos["idcultivo"],$val6,0,"invierno");

                     if(strlen($_POST["abonoIns_no_inv".$inic."_no"])>0){$val7=$_POST["abonoIns_no_inv".$inic."_no"];}else{$val7=0;}
                      $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row7[0],$row_cultivos["idcultivo"],$val7,0,"invierno");

                       if(strlen($_POST["superProdInv_no".$inic])>0){$val8=$_POST["superProdInv_no".$inic];}else{$val8=0;}
                       if(strlen($_POST["totalInvNo".$inic])>0){$val9=$_POST["totalInvNo".$inic];}else{$val9=0;}
                         if(strlen($_POST["porponinv_no".$inic])>0){$val10=$_POST["porponinv_no".$inic];}else{$val10=0;}

                      $response= $gestormonitoreo->guardar_ponderacioncultivo_agri_rcia($idmonitoreo1,$val8,$row_cultivos["idcultivo"],0,"invierno",$val9,$val10);

                  }else{
                      if(strlen($_POST["doccomer_no_inv".$inic."_no"])>0){$val1=$_POST["doccomer_no_inv".$inic."_no"];}else{$val1=0;}
                    // echo "ROW=".$row1[0]." - row cult=".$row_cultivos["idcultivo"]." -val1=".$val1;
                      $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row1[0],$row_cultivos["idcultivo"],$val1,0,"invierno");

                      if(strlen($_POST["compSemilla_no_inv".$inic."_no"])>0){$val2=$_POST["compSemilla_no_inv".$inic."_no"];}else{$val2=0;}
                      $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row2[0],$row_cultivos["idcultivo"],$val2,0,"invierno");

                      if(strlen($_POST["adquInsumo_no_inv".$inic."_no"])>0){$val3=$_POST["adquInsumo_no_inv".$inic."_no"];}else{$val3=0;}
                      $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row3[0],$row_cultivos["idcultivo"],$val3,0,"invierno");

                      if(strlen($_POST["combusible_no_inv".$inic."_no"])>0){$val4=$_POST["combusible_no_inv".$inic."_no"];}else{$val4=0;}
                      $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row4[0],$row_cultivos["idcultivo"],$val4,0,"invierno");

                      if(strlen($_POST["aplicacion_no_inv".$inic."_no"])>0){$val5=$_POST["aplicacion_no_inv".$inic."_no"];}else{$val5=0;}
                      $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row5[0],$row_cultivos["idcultivo"],$val5,0,"invierno");

                      if(strlen($_POST["maqHerra_no_inv".$inic."_no"])>0){$val6=$_POST["maqHerra_no_inv".$inic."_no"];}else{$val6=0;}
                     // echo "hhhhhhhh=".$val6;
                      $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row6[0],$row_cultivos["idcultivo"],$val6,0,"invierno");

                     if(strlen($_POST["abonoIns_no_inv".$inic."_no"])>0){$val7=$_POST["abonoIns_no_inv".$inic."_no"];}else{$val7=0;}
                      $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row7[0],$row_cultivos["idcultivo"],$val7,0,"invierno");

                       if(strlen($_POST["superProdInv_no".$inic])>0){$val8=$_POST["superProdInv_no".$inic];}else{$val8=0;}
                       if(strlen($_POST["totalInvNo".$inic])>0){$val9=$_POST["totalInvNo".$inic];}else{$val9=0;}
                       if(strlen($_POST["porponinv_no".$inic])>0){$val10=$_POST["porponinv_no".$inic];}else{$val10=0;}

                      $response= $gestormonitoreo->guardar_ponderacioncultivo_agri_rcia($idmonitoreo1,$val8,$row_cultivos["idcultivo"],0,"invierno",$val9,$val10);

                  }


                $inic++;
            }
      }
      //-- FIN DE NO COMRPOMETIDOS  INVIERNOOOOOOO---


      ///-------GUARDAR NRO DE CAMPAÑAS----///

          $idcampania_=0;
      if(isset($_POST["campania"]))
        {
          $idcampania_=1;
        }else{
           $idcampania_=0;
        }
      $response= $gestormonitoreo->guardarcampania($idmonitoreo1,$idcampania_);


  header('Content-type: application/json; charset=utf-8');
  echo json_encode($response,JSON_FORCE_OBJECT);

}


/////////////////////// GUARDAR ANALISISeval DE BOSQUES////////////////////////////////

function guardarvaloracionbosques()
{


    $response=array();
    $gestormonitoreo=new gestorMonitoreo();


    $response=array();
             $sql_and1="";
           //  $sql_and1="  and anho=4 ";
          //  if(isset($_SESSION['anhoActivo']) && ($_SESSION['anhoActivo']>0)){
           //     $sql_and1= " and anho=".$_SESSION['anhoActivo'];
          //  }
              if(isset($_POST['anhoActivo']) && ($_POST['anhoActivo']>0)){
                $sql_and1= " and anho=".$_POST['anhoActivo'];
            }

            //$sql_mon1= " select m.idmonitoreo from monitoreo.monitoreo m inner join monitoreo.analisisdocumentacion  a on a.idmonitoreo = m.idmonitoreo inner join monitoreo.documentacion d on d.idDocumentacion=a.idDocumentacion
             //where d.tipodocumento=71 and   tipo=267 and estado = 1 and idregistro = ".$_SESSION['idreg'].$sql_and1;
            // $monitoreo = pg_query($cn,$sql_mon) ;
             $sql_mon1= " select m.idmonitoreo from monitoreo.monitoreo m
             where   tipo=267 and estado = 1 and idregistro = ".$_SESSION['idreg'].$sql_and1;
           //  echo "CONNN=".$sql_mon1;
            $monitoreo1 =$gestormonitoreo->ejecute($sql= $sql_mon1) ;
            $row_monitoreo1= pg_fetch_array ($monitoreo1);
            $totalRows_monitoreo = pg_num_rows($monitoreo1);
           // echo "ajax consulta=".$sql_mon1." --id mon=".$totalRows_monitoreo;
            if($totalRows_monitoreo>0){
                $idmonitoreo1=$row_monitoreo1["idmonitoreo"];
            }else{
                $idmonitoreo1=0;
            }

        ///----- guardar documentos evaluacion bosques


        if(strlen($_POST["idarea"])>0){$idarea=$_POST["idarea"];}else{$idarea=0;}
        if(strlen($_POST["idespecies"])>0){$idespecies=$_POST["idespecies"];}else{$idespecies=0;}
        if(strlen($_POST["idcplantines"])>0){$idcplantines=$_POST["idcplantines"];}else{$idcplantines=0;}
        if(strlen($_POST["iddocrespaldo"])>0){$iddocrespaldo=$_POST["iddocrespaldo"];}else{$iddocrespaldo=0;}
        if(strlen($_POST["idotros"])>0){$idotros=$_POST["idotros"];}else{$idotros=0;}

       $response= $gestormonitoreo->guardarEvaluacionMonitoreo($idmonitoreo1,8,$idarea);
       $response= $gestormonitoreo->guardarEvaluacionMonitoreo($idmonitoreo1,9,$idespecies);
       $response= $gestormonitoreo->guardarEvaluacionMonitoreo($idmonitoreo1,10,$idcplantines);
       $response= $gestormonitoreo->guardarEvaluacionMonitoreo($idmonitoreo1,11,$iddocrespaldo);
       $response= $gestormonitoreo->guardarEvaluacionMonitoreo($idmonitoreo1,12,$idotros);


  //echo "holaaaahhhhhhhhhhhhhhhhhhhhhhhhhh";
  header('Content-type: application/json; charset=utf-8');
  echo json_encode($response,JSON_FORCE_OBJECT);

}


/////////////////////// GUARDAR ANALISIS DE DOCUMENTACION GANADERO  LECHERAAA ////////////////////////////////

function guardarAnalisisDocGanaderoLecheraRcia()
{


    $response=array();
    $gestormonitoreo=new gestorMonitoreo();


    $response=array();
             $sql_and1="";
           //  $sql_and1="  and anho=4 ";
          //  if(isset($_SESSION['anhoActivo']) && ($_SESSION['anhoActivo']>0)){
           //     $sql_and1= " and anho=".$_SESSION['anhoActivo'];
          //  }
              if(isset($_POST['anhoActivo']) && ($_POST['anhoActivo']>0)){
                $sql_and1= " and anho=".$_POST['anhoActivo'];
            }

            //$sql_mon1= " select m.idmonitoreo from monitoreo.monitoreo m inner join monitoreo.analisisdocumentacion  a on a.idmonitoreo = m.idmonitoreo inner join monitoreo.documentacion d on d.idDocumentacion=a.idDocumentacion
             //where d.tipodocumento=71 and   tipo=267 and estado = 1 and idregistro = ".$_SESSION['idreg'].$sql_and1;
            // $monitoreo = pg_query($cn,$sql_mon) ;
             $sql_mon1= " select m.idmonitoreo from monitoreo.monitoreo m
             where   tipo=267 and estado = 1 and idregistro = ".$_SESSION['idreg'].$sql_and1;
            $monitoreo1 =$gestormonitoreo->ejecute($sql= $sql_mon1) ;
            $row_monitoreo1= pg_fetch_array ($monitoreo1);
            $totalRows_monitoreo = pg_num_rows($monitoreo1);
           // echo "ajax consulta=".$sql_mon1." --id mon=".$totalRows_monitoreo;
            if($totalRows_monitoreo>0){
                $idmonitoreo1=$row_monitoreo1["idmonitoreo"];
            }else{
                $idmonitoreo1=0;
            }



        //----------  eliminar documentos evaluacion ganadero
         $sql_mond= "delete from monitoreo.analisisdocumentacion  where  idmonitoreo = ".$idmonitoreo1."   and iddocumentacion in(select  iddocumentacion from  monitoreo.documentacion where tipodocumento=101) ";
         $monitoreod =$gestormonitoreo->ejecute($sql= $sql_mond) ;
         //$row_monitoreo= pg_fetch_array ($monitoreo);

        $cantFilas= $_POST["conteoC"];
        $codact=1;
        ///----- guardar documentos evaluacion ganadera
        while ( $codact<=$cantFilas)
        {
                  if ( isset($_POST["txtdetalle1-".$codact]) ) {
                    $iddoc = 23; //-- USO DE ALIMENTOS SUPLEMENTARIOS
                    $detallecontenido= $_POST["txtdetalle1-".$codact];
                    $monto_cant=  $_POST["txtmonto_cantidad1-".$codact];
                    $obse= $_POST["txtobs1-".$codact];
                    $response= $gestormonitoreo->guardar_doc_Analisis_evaluacion_rcia($idmonitoreo1,$iddoc,$detallecontenido,$monto_cant,$obse);
                  }
                  if ( isset($_POST["txtdetalle2-".$codact]) ) {
                    $iddoc =24; //-- razas mejoradas
                    $detallecontenido= $_POST["txtdetalle2-".$codact];
                    $monto_cant=  $_POST["txtmonto_cantidad2-".$codact];
                    $obse= $_POST["txtobs2-".$codact];
                    $response= $gestormonitoreo->guardar_doc_Analisis_evaluacion_rcia($idmonitoreo1,$iddoc,$detallecontenido,$monto_cant,$obse);
                  }
                  if ( isset($_POST["txtdetalle3-".$codact]) ) {
                    $iddoc =25; //-- ensilado de forraje
                    $detallecontenido= $_POST["txtdetalle3-".$codact];
                    $monto_cant=  $_POST["txtmonto_cantidad3-".$codact];
                    $obse= $_POST["txtobs3-".$codact];
                    $response= $gestormonitoreo->guardar_doc_Analisis_evaluacion_rcia($idmonitoreo1,$iddoc,$detallecontenido,$monto_cant,$obse);
                  }
                  if ( isset($_POST["txtdetalle4-".$codact]) ) {
                    $iddoc =26; //-- Potreros alambrados, Cercas Eléctricas, saleros
                    $detallecontenido= $_POST["txtdetalle4-".$codact];
                    $monto_cant=  $_POST["txtmonto_cantidad4-".$codact];
                    $obse= $_POST["txtobs4-".$codact];
                    $response= $gestormonitoreo->guardar_doc_Analisis_evaluacion_rcia($idmonitoreo1,$iddoc,$detallecontenido,$monto_cant,$obse);
                  }
                  if ( isset($_POST["txtdetalle5-".$codact]) ) {
                    $iddoc =27; //-- Atajados, pozos, noques, tanques, bebederos
                    $detallecontenido= $_POST["txtdetalle5-".$codact];
                    $monto_cant=  $_POST["txtmonto_cantidad5-".$codact];
                    $obse= $_POST["txtobs5-".$codact];
                    $response= $gestormonitoreo->guardar_doc_Analisis_evaluacion_rcia($idmonitoreo1,$iddoc,$detallecontenido,$monto_cant,$obse);
                  }
                  if ( isset($_POST["txtdetalle6-".$codact]) ) {
                    $iddoc =28; //-- Corral
                    $detallecontenido= $_POST["txtdetalle6-".$codact];
                    $monto_cant=  $_POST["txtmonto_cantidad6-".$codact];
                    $obse= $_POST["txtobs6-".$codact];
                    $response= $gestormonitoreo->guardar_doc_Analisis_evaluacion_rcia($idmonitoreo1,$iddoc,$detallecontenido,$monto_cant,$obse);
                  }
                  if ( isset($_POST["txtdetalle7-".$codact]) ) {
                    $iddoc =29; //-- Brete, Cepo, balanza, cargadero
                    $detallecontenido= $_POST["txtdetalle7-".$codact];
                    $monto_cant=  $_POST["txtmonto_cantidad7-".$codact];
                    $obse= $_POST["txtobs7-".$codact];
                    $response= $gestormonitoreo->guardar_doc_Analisis_evaluacion_rcia($idmonitoreo1,$iddoc,$detallecontenido,$monto_cant,$obse);
                  }
                  if ( isset($_POST["txtdetalle8-".$codact]) ) {
                    $iddoc =30; //-- Brete, Cepo, balanza, cargadero
                    $detallecontenido= $_POST["txtdetalle8-".$codact];
                    $monto_cant=  $_POST["txtmonto_cantidad8-".$codact];
                    $obse= $_POST["txtobs8-".$codact];
                    $response= $gestormonitoreo->guardar_doc_Analisis_evaluacion_rcia($idmonitoreo1,$iddoc,$detallecontenido,$monto_cant,$obse);
                  }
                  if ( isset($_POST["txtdetalle9-".$codact]) ) {
                    $iddoc =31; //-- Compra de Ganado
                    $detallecontenido= $_POST["txtdetalle9-".$codact];
                    $monto_cant=  $_POST["txtmonto_cantidad9-".$codact];
                    $obse= $_POST["txtobs9-".$codact];
                    $response= $gestormonitoreo->guardar_doc_Analisis_evaluacion_rcia($idmonitoreo1,$iddoc,$detallecontenido,$monto_cant,$obse);
                  }

                  if ( isset($_POST["txtdetalle10-".$codact]) ) {
                    $iddoc =32; //-- "Venta de Ganado"
                    $detallecontenido= $_POST["txtdetalle10-".$codact];
                    $monto_cant=  $_POST["txtmonto_cantidad10-".$codact];
                    $obse= $_POST["txtobs10-".$codact];
                    $response= $gestormonitoreo->guardar_doc_Analisis_evaluacion_rcia($idmonitoreo1,$iddoc,$detallecontenido,$monto_cant,$obse);
                  }

                  if ( isset($_POST["txtdetalle11-".$codact]) ) {
                    $iddoc =33; //--Insumos Agropecuarios
                    $detallecontenido= $_POST["txtdetalle11-".$codact];
                    $monto_cant=  $_POST["txtmonto_cantidad11-".$codact];
                    $obse= $_POST["txtobs11-".$codact];
                    $response= $gestormonitoreo->guardar_doc_Analisis_evaluacion_rcia($idmonitoreo1,$iddoc,$detallecontenido,$monto_cant,$obse);
                  }



             $codact++;
         }


         //-----  guardar evaluacion ponderaciones -----

 if(strlen($_POST["suppastoscultivados"])>0){$suppastoscultivados=$_POST["suppastoscultivados"];}else{$suppastoscultivados=0;}
if(strlen($_POST["alimentosuple"])>0){$alimentosuple=$_POST["alimentosuple"];}else{$alimentosuple=0;}
if(strlen($_POST["razasmejoradas"])>0){$razasmejoradas=$_POST["razasmejoradas"];}else{$razasmejoradas=0;}
if(strlen($_POST["ensiladosforraje"])>0){$enlisadosforraje=$_POST["ensiladosforraje"];}else{$enlisadosforraje=0;}
if(strlen($_POST["aftosa"])>0){$aftosa=$_POST["aftosa"];}else{$aftosa=0;}
if(strlen($_POST["tuberculosis"])>0){$tuberculosis=$_POST["tuberculosis"];}else{$tuberculosis=0;}
if(strlen($_POST["bruce"])>0){$bruce=$_POST["bruce"];}else{$bruce=0;}
if(strlen($_POST["comerciolechera"])>0){$comerciolechera=$_POST["comerciolechera"];}else{$comerciolechera=0;}
if(strlen($_POST["vacunasenasag"])>0){$certificadosenasag=$_POST["vacunasenasag"];}else{$certificadosenasag=0;}
if(strlen($_POST["descarteganados"])>0){$descarte=$_POST["descarteganados"];}else{$descarte=0;}
if(strlen($_POST["insumospecuarios"])>0){$insumospecuarios=$_POST["insumospecuarios"];}else{$insumospecuarios=0;}
if(strlen($_POST["infraestructura"])>0){$infraestructura=$_POST["infraestructura"];}else{$infraestructura=0;}


       // tipo=1 = ganadero
       $response= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia2($idmonitoreo1,19,$suppastoscultivados,101);
       $response= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia2($idmonitoreo1,20,$alimentosuple,101);
       $response= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia2($idmonitoreo1,21,$razasmejoradas,101);
       $response= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia2($idmonitoreo1,22,$enlisadosforraje,101);
       $response= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia2($idmonitoreo1,23,$aftosa,101);
       $response= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia2($idmonitoreo1,24,$tuberculosis,101);
       $response= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia2($idmonitoreo1,25,$bruce,101);
       $response= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia2($idmonitoreo1,26,$comerciolechera,101);
       $response= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia2($idmonitoreo1,27,$certificadosenasag,101);
       $response= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia2($idmonitoreo1,35,$descarte,101);
       $response= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia2($idmonitoreo1,28,$insumospecuarios,101);
       $response= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia2($idmonitoreo1,29,$infraestructura,101);


  //echo "holaaaahhhhhhhhhhhhhhhhhhhhhhhhhh";
  header('Content-type: application/json; charset=utf-8');
  echo json_encode($response,JSON_FORCE_OBJECT);

}




///////////////// VENTANA RCIA GANADERA ////////////////////////////
function guardarGanaderaLecheraRcia(){

  $response=array();
  $gestormonitoreo=new gestorMonitoreo();
  $resultSuscripcion = $gestormonitoreo->ejecute($sql= "select r.idregistro, fecharegistro, fechasuscripcion
          from registro as r full join fechasregistro as fr on r.idregistro = fr.idregistro
          where r.idregistro =".$_SESSION['idreg']);
    $row_Suscripcion = pg_fetch_array ($resultSuscripcion);
    $fechasuscripcion = $row_Suscripcion['fechasuscripcion'];
    $periodo1_time = date($today="2015-09-29");

    $periodo=2;
    if ($fechasuscripcion!="") {
    $predio_time = Date('Y-m-d', strtotime($fechasuscripcion));
    if($periodo1_time > $predio_time){
      $periodo=1;
   }
   }


   // GUARDAR DATOS DE ACTIVIDADES GANADERAS
    $response=array();
    //var_dump($_POST);
   // exit();
   $anoperdos = 3;

   for($j=1;$j<=5;$j++)
   {
         $ano = 0;
         if ($periodo == 1)
         {
           $sql_mon = "select *  FROM monitoreo.monitoreo m where m.idregistro=".$_SESSION['idreg']." and m.tipo= 266 and anho=".$j;
           $ano = $j;
         }
         elseif ($periodo == 2)
         {
           $sql_mon = "select *  FROM monitoreo.monitoreo m where m.idregistro=".$_SESSION['idreg']." and m.tipo= 266 and anho=".$anoperdos;
           $ano = $anoperdos;
         }


         $gestor=new gestorMonitoreo();
         $mon =$gestor->ejecute($sql= $sql_mon) ;
         $row_mon= pg_fetch_array ($mon);
         $monitoreo = $row_mon['idmonitoreo'];


         for ($codact=328;$codact<=330;$codact++)
         {
             $codactividad=$codact;
             $realiza = @$_POST[$codactividad."-comboact".$j];
             $descr= '';

               if ($monitoreo!=null)
               {
                 $response= $gestormonitoreo->guardar_actividad_rcia($codactividad,$realiza,$descr,$monitoreo,$ano);
                     $step =@$_POST["step"];
                     $obs=@$_POST["RGanaderaLecheraObservaciones"];
                     $Result2 = $gestor->guardarObs($monitoreo,$step=5, $obs,  $estado=1);
               }
         }
         $anoperdos = $anoperdos + 1;
   }




  // VERIFICACION DE COMPROMISO GANADERO RCIA
   $response=array();
  $anoperdos = 3;
  for($j=1;$j<=5;$j++)
  {
        $spcn=0;
        $spce=@$_POST["suppasejecut".$j];
        $sistorde=@$_POST["sistemaordenoejec".$j];
        $galpon=@$_POST["galponejec".$j];
        $tanque=@$_POST["tanqueenfejec".$j];
        $silo=@$_POST["siloforrajeejec".$j];
        $certtuber=@$_POST["certtuberculosisejec".$j];
        $certbruce=@$_POST["certbrucelosisejec".$j];
        $cabganprod=@$_POST["cabganprodeje".$j];
        $cabgandesc=@$_POST["cabgandescareje".$j];
        $prodpromcarne=@$_POST["prodcarneeje".$j];
        $prodpromleche=@$_POST["prodlecheeje".$j];
        $prodtotalleche=@$_POST["prodtotlecheejec".$j];

        $ano = 0;
        if ($periodo == 1)
        {
          $sql_mon = "select *  FROM monitoreo.monitoreo m where m.idregistro=".$_SESSION['idreg']." and m.tipo= 266 and anho=".$j;
          $ano = $j;
        }
        elseif ($periodo == 2)
        {
          $sql_mon = "select *  FROM monitoreo.monitoreo m where m.idregistro=".$_SESSION['idreg']." and m.tipo= 266 and anho=".$anoperdos;
          $ano = $anoperdos;
        }

        $gestor=new gestorMonitoreo();
        $mon =$gestor->ejecute($sql= $sql_mon) ;
        $row_mon= pg_fetch_array ($mon);
        $monitoreo = $row_mon['idmonitoreo'];

        if ($monitoreo!=null)
        {
        $response= $gestor->guardar_produccion_ganadera_lechera_rcia($monitoreo,$spcn,$spce,$sistorde,$galpon,$tanque,$silo,$certtuber,$certbruce,$cabganprod,$cabgandesc,$prodpromcarne,$prodpromleche,$prodtotalleche,$ano);
        //var_dump($_POST);
        //exit();
        }
        $anoperdos = $anoperdos + 1;
  }


  header('Content-type: application/json; charset=utf-8');

  echo json_encode($response,JSON_FORCE_OBJECT);


}





/////////////////////// GUARDAR ANALISIS DE DOCUMENTACION AGRICOLA////////////////////////////////

function guardaranalisisdocumentosAgricolaC()
{
    $response=array();
    $gestormonitoreo=new gestorMonitoreo();


    $response=array();
            $sql_and1="";

       // if(isset($_SESSION['anhoActivo_']) && ($_SESSION['anhoActivo_']>0)){
        //    $sql_and1= " and anho=".$_SESSION['anhoActivo_'];
       // }
       // echo "anhooooo=".$_POST["anhoActivo"]." session=".$_SESSION['anhoActivo'];
            if(isset($_POST['anhoActivoC']) && ($_POST['anhoActivoC']>0)){
                $sql_and1= " and m.anho=".$_POST['anhoActivoC'];
            }

       // $sql_mon1= "select m.idmonitoreo from monitoreo.monitoreo m inner join monitoreo.analisisdocumentacion  a on a.idmonitoreo = m.idmonitoreo inner join monitoreo.documentacion d on d.idDocumentacion=a.idDocumentacion
       //      where d.tipodocumento=70 and tipo=267  and m.estado = 1 and m.idregistro = ".$_SESSION['idreg'].$sql_and1;
         $sql_mon1= " select m.idmonitoreo from monitoreo.monitoreo m
             where   tipo=269 and estado = 1 and idregistro = ".$_SESSION['idreg'].$sql_and1;

 //echo "axxx:".$sql_mon1;
        $monitoreo1 =$gestormonitoreo->ejecute($sql= $sql_mon1) ;
        $row_monitoreo1= pg_fetch_array ($monitoreo1);
        $totalRows_monitoreo = pg_num_rows($monitoreo1);

        $idmonitoreo1=$row_monitoreo1[0];

        //echo "idmo=".$idmonitoreo1;
        //----------  eliminar documentos evaluacion ganadero
         //$sql_mond= "delete from monitoreo.analisisdocumentacion  where  idmonitoreo = ".$idmonitoreo1;
        // $sql_mond= "delete from monitoreo.analisisdocumentacion  where  idmonitoreo = ".$idmonitoreo1."   and iddocumentacion in(select  iddocumentacion from  monitoreo.documentacion where tipodocumento=70) ";

       //  $monitoreod =$gestormonitoreo->ejecute($sql= $sql_mond) ;
         //$row_monitoreo= pg_fetch_array ($monitoreo);

        $cantFilas= $_POST["conteoC"];
        $codact=1;
        ///----- guardar documentos evaluacion ganadera

     $response= $gestormonitoreo->guardarObs($idmonitoreo1,$_POST["anhoActivoC"],$_POST["RAgricolaObservacionesC"],1);

         //-----  guardar evaluacion VALORACION DE ALIMENTOS-----

        if(strlen($_POST["doccomerPonderacionC"])>0){$doccomerPonderacion=$_POST["doccomerPonderacionC"];}else{$doccomerPonderacion=0;}
        if(strlen($_POST["compSemillaPonderacionC"])>0){$compSemillaPonderacion=$_POST["compSemillaPonderacionC"];}else{$compSemillaPonderacion=0;}
        if(strlen($_POST["adquInsumoPonderacionC"])>0){$adquInsumoPonderacion=$_POST["adquInsumoPonderacionC"];}else{$adquInsumoPonderacion=0;}
        if(strlen($_POST["combusiblePonderacionC"])>0){$combusiblePonderacion=$_POST["combusiblePonderacionC"];}else{$combusiblePonderacion=0;}
        if(strlen($_POST["aplicacionPonderacionC"])>0){$aplicacionPonderacion=$_POST["aplicacionPonderacionC"];}else{$aplicacionPonderacion=0;}
        if(strlen($_POST["maqHerraPonderacionC"])>0){$maqHerraPonderacion=$_POST["maqHerraPonderacionC"];}else{$maqHerraPonderacion=0;}
        if(strlen($_POST["abonoInsPonderacionC"])>0){$abonoInsPonderacion=$_POST["abonoInsPonderacionC"];}else{$abonoInsPonderacion=0;}
       // echo "problema maqErra=".$maqHerraPonderacion." -abono=".$abonoInsPonderacion;


       // tipo=2 = agricola

        $responseid1= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia($idmonitoreo1,12,$doccomerPonderacion,70);
       $responseid2= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia($idmonitoreo1,13,$compSemillaPonderacion,70);
       $responseid3= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia($idmonitoreo1,14,$adquInsumoPonderacion,70);
       $responseid4= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia($idmonitoreo1,15,$combusiblePonderacion,70);
       $responseid5= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia($idmonitoreo1,16,$aplicacionPonderacion,70);
       $responseid6= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia($idmonitoreo1,17,$maqHerraPonderacion,70);
       $responseid7= $gestormonitoreo->guardar_evaluacionAlimentos_gan_rcia($idmonitoreo1,18,$abonoInsPonderacion,70);

         ///---  FIN GUARDAR VALORACION  DE ALIMENTOS --- //////


      //--GUARDAR LOS CULTIVOS


     //-------------------PARA SACAR LOS CULTIVOS CORRESPONDIENTES--------------------------
       /* $sql_and="";
        if(isset($_POST['anhoActivo_']) && ($_POST['anhoActivo_']>0)){
            $sql_and= " and anho=".$_POST['anhoActivo_']; $_SESSION['anhoActivo_']=$_POST['anhoActivo_'];
        }else{
            $sql_and=" order by anho asc  limit 1" ;$_SESSION['anhoActivo_']=0;
            }

         $sql_anho="select * from monitoreo.monitoreo m   where   m.estado = 1 and  m.idregistro = ".$_SESSION['idreg'].$sql_and;
        $mon_anho= pg_query($cn,$sql_anho);
       // $row_anho = pg_fetch_assoc($mon_anho);
        $anho=0;
        $anho=$row_anho["anho"];*/

       //-- COMPROMETIDOS
       $sql_cultivos = "select c.idcultivo,c.nombrecultivo
		from monitoreo.monitoreo m inner join monitoreo.plancultivo p on p.idmonitoreo=m.idmonitoreo inner join cultivo c on c.idcultivo=p.idcultivo
        where  m.estado = 1 and p.estado = 1 and p.comprometido=0 and m.idregistro  = ".$_SESSION['idreg']."  and m.anho=".$_POST["anhoActivoC"]." order by c.nombrecultivo asc" ;
        // m.tipo=269  and
        $totalRows_cultivos=0;
        $rcia_cultivos  =$gestormonitoreo->ejecute($sql=$sql_cultivos) ;
        $totalRows_cultivos= pg_num_rows($rcia_cultivos);
      //  $row_cultivos=pg_fetch_array($rcia_cultivos);
        ///--- FIN SACAR CULTIVOS
        // echo"consulta=".$totalRows_cultivos."-fin";
       $row1 = pg_fetch_array($responseid1);
      $row2 = pg_fetch_array($responseid2);
      $row3 = pg_fetch_array($responseid3);
      $row4 = pg_fetch_array($responseid4);
      $row5 = pg_fetch_array($responseid5);
      $row6 = pg_fetch_array($responseid6);
      $row7 = pg_fetch_array($responseid7);
      $inic=1;
      while ($row_cultivos=pg_fetch_array($rcia_cultivos) )
      {
         if(strlen($_POST["doccomerC".$inic])>0){$val1=$_POST["doccomerC".$inic];}else{$val1=0;}
         $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row1[0],$row_cultivos["idcultivo"],$val1);

         if(strlen($_POST["compSemillaC".$inic])>0){$val2=$_POST["compSemillaC".$inic];}else{$val2=0;}
         $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row2[0],$row_cultivos["idcultivo"],$val2);

         if(strlen($_POST["adquInsumoC".$inic])>0){$val3=$_POST["adquInsumoC".$inic];}else{$val3=0;}
         $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row3[0],$row_cultivos["idcultivo"],$val3);

         if(strlen($_POST["combusibleC".$inic])>0){$val4=$_POST["combusibleC".$inic];}else{$val4=0;}
         $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row4[0],$row_cultivos["idcultivo"],$val4);

         if(strlen($_POST["aplicacionC".$inic])>0){$val5=$_POST["aplicacionC".$inic];}else{$val5=0;}
         $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row5[0],$row_cultivos["idcultivo"],$val5);

         if(strlen($_POST["maqHerraC".$inic])>0){$val6=$_POST["maqHerraC".$inic];}else{$val6=0;}
        // echo "hhhhhhhh=".$val6;
         $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row6[0],$row_cultivos["idcultivo"],$val6);

        if(strlen($_POST["abonoInsC".$inic])>0){$val7=$_POST["abonoInsC".$inic];}else{$val7=0;}
         $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row7[0],$row_cultivos["idcultivo"],$val7);

          $inic++;
      }
      //-- FIN DE COMPROMETIDOS


      //-- NO NO COMPROMETIDOS -- //
       $sql_cultivos = "select c.idcultivo,c.nombrecultivo
		from monitoreo.monitoreo m inner join monitoreo.plancultivo p on p.idmonitoreo=m.idmonitoreo inner join cultivo c on c.idcultivo=p.idcultivo
        where   ( p.supveranoejecutado>0 or p.supinviernoejecutado>0 )  and m.estado = 1 and p.estado = 1 and p.comprometido=1 and m.idregistro  = ".$_SESSION['idreg']."  and m.anho=".$_POST["anhoActivoC"]." order by c.nombrecultivo asc" ;
      // echo "NO COMPROMETIDO=".$sql_cultivos;
     //$totalRows_cultivos=0;
     $rcia_cultivos  =$gestormonitoreo->ejecute($sql=$sql_cultivos) ;
     $totalRows_cultivos= pg_num_rows($rcia_cultivos);
      //  $row_cultivos=pg_fetch_array($rcia_cultivos);
        ///--- FIN SACAR CULTIVOS
         //echo"consulta no=".$totalRows_cultivos."-fin-idcul=".$row_cultivos["idcultivo"]."-fin";
    // ECHO "CANTIADD no c=".$totalRows_cultivos;
     if($totalRows_cultivos>0){
            $inic=1;
            while ($row_cultivos=pg_fetch_array($rcia_cultivos) )
            {
               if(strlen($_POST["doccomerC".$inic."_no"])>0){$val1=$_POST["doccomerC".$inic."_no"];}else{$val1=0;}
             // echo "ROW=".$row1[0]." - row cult=".$row_cultivos["idcultivo"]." -val1=".$val1;
               $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row1[0],$row_cultivos["idcultivo"],$val1);

               if(strlen($_POST["compSemillaC".$inic."_no"])>0){$val2=$_POST["compSemillaC".$inic."_no"];}else{$val2=0;}
               $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row2[0],$row_cultivos["idcultivo"],$val2);

               if(strlen($_POST["adquInsumoC".$inic."_no"])>0){$val3=$_POST["adquInsumoC".$inic."_no"];}else{$val3=0;}
               $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row3[0],$row_cultivos["idcultivo"],$val3);

               if(strlen($_POST["combusibleC".$inic."_no"])>0){$val4=$_POST["combusibleC".$inic."_no"];}else{$val4=0;}
               $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row4[0],$row_cultivos["idcultivo"],$val4);

               if(strlen($_POST["aplicacionC".$inic."_no"])>0){$val5=$_POST["aplicacionC".$inic."_no"];}else{$val5=0;}
               $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row5[0],$row_cultivos["idcultivo"],$val5);

               if(strlen($_POST["maqHerraC".$inic."_no"])>0){$val6=$_POST["maqHerraC".$inic."_no"];}else{$val6=0;}
              // echo "hhhhhhhh=".$val6;
               $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row6[0],$row_cultivos["idcultivo"],$val6);

              if(strlen($_POST["abonoInsC".$inic."_no"])>0){$val7=$_POST["abonoInsC".$inic."_no"];}else{$val7=0;}
               $response= $gestormonitoreo->guardar_detallevalorcultivo_agri_rcia($row7[0],$row_cultivos["idcultivo"],$val7);

                $inic++;
            }
      }
      //-- FIN DE NO COMRPOMETIDOS---
     //$row1["ff_guardar_evaluacionAlimentos_gan_rcia"]
   // echo "con2:".$row1[0]."-fin";
    // echo "holaaaaaaa:".$idmonitoreo1;


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
