<?php 
include "../Valid.php";
include "../Registro/destroy_predio.php";


require_once $_SERVER['DOCUMENT_ROOT'] . '/sistema/config/config.php';

// require_once APPPATH . '/scripts/Codificadores.php';
require_once APPPATH . '/MUESTREO/GestorMuestreo.php';
// include  APPPATH . '/reportes/politico.php';
// $codigicador=new Codificadores();

// $politico=new politico();
?>

<HTML>
  <HEAD><TITLE>NUEVO</TITLE>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <LINK href="../css/mdryt.css" type=text/css rel=stylesheet>
    <link rel="stylesheet" type="text/css" href="../css/button.css" />
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/jquery.steps.css">
    <link rel="stylesheet" href="../css/jquery-ui.css" />
     <link href="../libraries/smartpaginator/smartpaginator.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../css/mdryt-jebus.css">
                <link rel="stylesheet" href="../css/CSSTable1.css">
    <script src="../lib/modernizr-2.6.2.min.js"></script>
     <script src="../libraries/jquery-1.10.3/jquery-1.10.2.min.js"></script>
<script src="../libraries/jquery-1.10.3/jquery-1.10.3.ui.min.js"></script>
<script src="../libraries/jquery-validate-1.13.1/jquery-validate-1.13.1.js"></script>
    <script src="../lib/jquery.cookie-1.3.1.js"></script>
    <script src="../build/jquery.steps.js"></script>
   
     
   <script src="../libraries/smartpaginator/smartpaginator.js" type="text/javascript"></script>
    <link rel="stylesheet" href="<?php ECHO WEBPATH; ?>/libraries/alertify/themes/alertify.core.css" />
 <link rel="stylesheet" href="<?php ECHO WEBPATH; ?>/libraries/alertify/themes/alertify.default.css" id="toggleCSS" />
 <script src="<?php ECHO WEBPATH; ?>/libraries/alertify/lib/alertify.min.js"></script> 

</head>
<BODY>

<?php

process_si_nuevo_form() ;
process_si_edit_form();
 ?>
<div align="center">
<div class="line-2" >
 <label> <strong>MUESTREO ALEATORIO ESTRATIFICADO SIMPLE</strong></label>

 </div>
<p></p>
<div class="line-2" align="left" >
<div class="texto center" style="width:75%">
 <label> <strong>I. DATOS GENERALES DEL MUESTREO</strong></label>
 </div>
 </div>
 <p></p>
<div class="texto center" style="width:70%">

 <div style="width:100%;float: left;">
  <div class="line" ></div>
              <div class="campo" style="width:93%;text-align:left;">
                <label align="left" for="ct_anho" style="text-align:left;">DESCRIPCIÓN:</label>
                 <?php echo $_SESSION['ctform']['ct_descripcion']  ?>
                             

    </div>
    </div>

 <div style="width:32%;float: left;">          
         <div class="line" ></div>
  <div class="campo" style="width:90%">
                <label for="ct_anho">DEPARTAMENTO:</label>
                <?php echo $_SESSION['ctform']['dpto_1']  ?>
                </div>
                 
              <div class="campo" style="width:90%">
                <label for="ct_anho">TIPO MUESTREO:</label>
        <?php echo $_SESSION['ctform']['ct_tipo']  ?>
        </div>
      </div>
    <div style="width:32%;float: left;">          
        

         <div class="line" ></div>
              <div class="campo" style="width:90%">
                <label for="ct_anho">FECHA:</label>
          <?php echo $_SESSION['ctform']['ct_fecha']  ?></div>

              <div class="line" ></div>
              <div class="campo" style="width:90%">
                <label for="ct_anho">TOTAL PREDIOS:</label>
          <?php echo $_SESSION['ctform']['ct_totalpredios']  ?></div>
       
</div>
  <div style="width:32%;float: left;">          
         <div class="line" ></div>
              <div class="campo" style="width:90%">
                <label for="ct_anho">AÑO:</label>
          <?php echo $_SESSION['ctform']['ct_anho']  ?></div>

       

              <div class="line" ></div>
              <div class="campo" style="width:90%">
                <label for="ct_anho">TOTAL MUESTRAS:</label>
          <?php echo $_SESSION['ctform']['ct_totalmuestras']  ?></div>
       
</div>
  </div>
<br><br>
<p></p>
<br>
<div class="line-2" align="left" >
<div class="texto center" style="width:75%">
 <label> <strong>II. FORMULAS UTILIZADAS</strong></label>
  </div>
 </div>
 <p></p>
<div class="texto center" style="width:95%">
<img style='height:250px;width:75%;' src='<?php ECHO WEBPATH; ?>/images/formulas.png' />
</div>



<p></p>
<div class="line-2" align="left" >
<div class="texto center" style="width:75%">
 <label><strong>III. LISTA DE PREDIOS SELECCIONADOS PARA EL MUESTREO</strong></label>
 </div>
 </div>
<p></p>
 <div  class="CSSTable1 center" style="width:75%;box-shadow: 0px 10px 0px #888888;"> 
<table id= "mt1" >
<thead>
<tr class="header">
  <th><strong>#</strong></th>
  <th><strong>CODIGO</strong></th>
  <th><strong>NOMBRE</strong></th>
   <th><strong>REPRESENTANTE NOMBRE</strong></th>
<th><strong>REPRESENTANTE DIRECCION</strong> </th>
 <th><strong>REPRESENTANTE TELEFONO</strong> </th>
 <th><strong>CP</strong> </th>
 <th><strong>SR</strong> </th>
 <th><strong>A</strong> </th>
 <th><strong>UG</strong> </th>
 <th><strong>TS</strong> </th>
   <th><strong>P</strong> </th>
 <th><strong>ESTRATO</strong> </th>
  </tr>
  </thead>
<?php 

  $row_listado1=$_SESSION['ctform']['listapredios'];
  //ESTRATO 1
   
 $totalRows_listadot=pg_num_rows( $row_listado1);

 if ($totalRows_listadot > 0) {
  $cont=1;
 while ( $row = pg_fetch_array($row_listado1)) {

?>
<tr  align="center" >
  <td width="2%"><?php echo trim($cont);?></td>
  <td width="2%"><?php echo trim($row['ID PARCELA']);?></td>
  <td width="15%"><?php echo trim($row['NOMBRE PREDIO']);?></td>
  <td width="10%"><?php echo trim($row['REPRESENTANTE NOMBRE']);?></td>
  <td width="10%"><?php echo trim($row['REPRESENTANTE DIRECCION']);?></td>
    <td width="5%"><?php echo trim($row['REPRESENTANTE TELEFONO']);?></td>
    <td width="2%"><?php echo trim(round($row['cp'], 2));?></td>
      <td width="2%"><?php echo trim(round($row['sr'], 2));?></td>
        <td width="2%"><?php echo trim(round($row['a'], 2));?></td>
          <td width="2%"><?php echo trim(round($row['ug'], 2));?></td>
            <td width="2%"><?php echo trim(round($row['ts'], 2));?></td>
   <td width="3%"> <?php echo trim(round($row['ponderacion'], 2));?></td>
  <td width="5%"> <?php echo trim($row['estrado']);?></td>  
    
  </tr>
   <?php $cont=$cont+1; } 

       } else {
                        ?>
                       
        <?php }    ?>
</table>
  
<div id="green1" style="margin: auto;width:98%">
</div>
   
 </div>
<script type="text/javascript">
<?php 


    echo   "  $('#green1').smartpaginator({ totalrecords: ".$totalRows_listadot.", recordsperpage: 10, datacontainer: 'mt1', dataelement: 'tr', initval: 0,length: 8,  next: 'Next', prev: 'Prev', first: 'First', last: 'Last', theme: 'green' }); ";
            
?>

</script>

<br>
<br>
<p></p>
<div class="line-2" align="left" >
<div class="texto center" style="width:75%">
 <label><strong>IV. RESULTADO DEL MUESTREO ALEATORIO ESTRATIFICADO SIMPLE</strong></label>
 </div>
  </div>
 <br> 
<p></p>
 <div  class="CSSTable1 center" style="width:75%;box-shadow: 0px 10px 0px #888888;"> 
<table id= "mt" >
<thead>
<tr class="header">
  <th><strong>#</strong></th>
  <th><strong>CODIGO</strong></th>
  <th><strong>NOMBRE</strong></th>
   <th><strong>REPRESENTANTE NOMBRE</strong></th>
<th><strong>REPRESENTANTE DIRECCION</strong> </th>
 <th><strong>REPRESENTANTE TELEFONO</strong> </th>
 <th><strong>CP</strong> </th>
 <th><strong>SR</strong> </th>
 <th><strong>A</strong> </th>
 <th><strong>UG</strong> </th>
 <th><strong>TS</strong> </th>
   <th><strong>P</strong> </th>
 <th><strong>ESTRATO</strong> </th>
  </tr>
  </thead>
<?php 

  $row_listado=$_SESSION['ctform']['listamuestras'];
  //ESTRATO 1
 
  
  $totalRows_listado1=pg_num_rows( $row_listado);
 if ($totalRows_listado1 > 0) {
   $con=1;
while ($r = pg_fetch_array($row_listado)) { 
 
?>
<tr  align="center" >
   <td width="2%"><?php echo trim($con);?></td>
  <td width="2%"><?php echo trim($r['ID PARCELA']);?></td>
  <td width="15%"><?php echo trim($r['NOMBRE PREDIO']);?></td>
  <td width="10%"><?php echo trim($r['REPRESENTANTE NOMBRE']);?></td>
  <td width="10%"><?php echo trim($r['REPRESENTANTE DIRECCION']);?></td>
    <td width="5%"><?php echo trim($r['REPRESENTANTE TELEFONO']);?></td>
    <td width="2%"><?php echo trim(round($r['cp'], 2));?></td>
      <td width="2%"><?php echo trim(round($r['sr'], 2));?></td>
        <td width="2%"><?php echo trim(round($r['a'], 2));?></td>
          <td width="2%"><?php echo trim(round($r['ug'], 2));?></td>
            <td width="2%"><?php echo trim(round($r['ts'], 2));?></td>
   <td width="3%"> <?php echo trim(round($r['ponderacion'], 2));?></td>
  <td width="5%"> <?php echo trim($r['estrado']);?></td>  
  </tr>
   <?php  $con=$con+1; } 

       } else {
                        ?>
                       
        <?php }    ?>

</table>
  
   <div id="green" style="margin: auto;width:98%">
 </div>
</div>


<script type="text/javascript">
<?php 

    echo   "  $('#green').smartpaginator({ totalrecords: ".$totalRows_listado1.", recordsperpage: 10, datacontainer: 'mt', dataelement: 'tr', initval: 0,length: 8,  next: 'Next', prev: 'Prev', first: 'First', last: 'Last', theme: 'green' }); ";
            
?>

</script>

<br>
<div class="center" style="width:70%">
         <a  href='<?php ECHO WEBPATH; ?>/reportes/muestreo-print.php?action=print-muestreo&outputtype=pdf&id=<?php echo $_SESSION['ctform']['ct_id'] ?>' id='<?php echo $_SESSION['ctform']['ct_id'] ?>' data="" class="" ><img style='height:45px;width:170px;' src='<?php ECHO WEBPATH; ?>/images/boton-pdf.png' /></a>  
                          
</div>
<br><br>
</div>
</BODY>
</html>

<?php
// The form processor PHP code
function process_si_nuevo_form() {


  if ($_SERVER['REQUEST_METHOD'] == 'POST' && @$_POST['action'] == 'guardar') {
          $_SESSION['ctform'] = array(); // re-initialize the form session data
        // if the form has been submitted
        $ct_id = @$_POST['ct_id']=="" ?0:@$_POST['ct_id'];    // name from the form
        $ct_descripcion = @$_POST['ct_descripcion'];    // name from the form
          $dpto_1 = @$_POST['dpto_1'];    // name from the form
          list($dpto_1_id, $dpto_1_dato) = split('[,]', $dpto_1);
           $ct_anho = @$_POST['ct_anho']; 
        $ct_fecha = @$_POST['ct_fecha'];   // pasword from the form
        $tipo_muestreo= @$_POST['38'];    // name from the form
        $ct_observacion = @$_POST['observacion']; 
        $ct_estado = @$_POST['ct_estado']; 
         $codigos = @$_POST['codigos']; 
          $ct_fecha_registro=date("Y-m-d H:i:s");
        $errors = array();  // initialize empty error array
        if (isset($GLOBALS['DEBUG_MODE']) && $GLOBALS['DEBUG_MODE'] == false) {
            // only check for errors if the form is not in debug mode
           //   if (strlen($name) < 5) {
                // name too short, add error
           //       $errors['username_error'] = 'Requiere Nombre de Usuario valido';
            //  }
            //  if (strlen($password) < 5) {
                // no email address given
          //      $errors['password_error'] = 'Requiere pasword de Usuario valido';
            //  }
        }

        if (sizeof($errors) == 0) {
          $gest=new GestorMuestreo();
          $result=pg_fetch_array($gest->guardarMuestreo( $ct_id,    $ct_descripcion,$dpto_1_id,   $ct_anho,    $tipo_muestreo ,   $ct_fecha_registro,$estado=1 ));
          $result['id'];    // name from the form
         // $result1=pg_fetch_array($gest->getTipoMuestreo($tipo_muestreo ));
       
          $gest->getPonderacion($result['id'],$codigos,$tipo_muestreo);

        $muestreo=$gest->getDataMuestreo( $result["id"] );
      
         if ($muestreo!="") {
          $m = pg_fetch_array($muestreo);
  //datos generales del muestreo
         $_SESSION['ctform']['ct_id'] =  $m["id"];    // name from the form
            // pasword from the form
         $_SESSION['ctform']['ct_descripcion'] =   $m["descripcion"];    // name from the form
         $_SESSION['ctform']['dpto_1'] =$m["departamento"]; 
         $_SESSION['ctform']['ct_fecha'] =   $m["fecha"];   // pasword from the form
          $_SESSION['ctform']['ct_tipo'] =  $m["tipo"];    // name from the form
          $_SESSION['ctform']['ct_anho'] =   $m["anho"]; 
          $_SESSION['ctform']['ct_totalpredios'] =$m["totalpredios"]; 
          $_SESSION['ctform']['ct_totalmuestras'] =$m["totalmuestra"];
          $_SESSION['ctform']['ct_n'] =   $m["n"]; 
          $_SESSION['ctform']['ct_k'] =   $m["k"]; 
          $_SESSION['ctform']['ct_xxmin'] =   $m["xxmin"]; 
          $_SESSION['ctform']['ct_xxmax'] =   $m["xxmax"]; 
          $_SESSION['ctform']['ct_r'] =   $m["r"]; 
          $_SESSION['ctform']['ct_l'] =   $m["l"]; 

         $listapredios=$gest->getMuestraByMuestreo($m["id"],"");
          $listamuestras=$gest->getMuestraByMuestreo($m["id"],1);

          $_SESSION['ctform']['listapredios'] =   $listapredios; 
          $_SESSION['ctform']['listamuestras'] =$listamuestras; 
            $_SESSION['ctform']['error'] = false;  // no error with form
            $_SESSION['ctform']['success'] = true; // message sent
}
          } else {
          // save the entries, this is to re-populate the form

       $ct_id = @$_POST['ct_id']=="" ?0:@$_POST['ct_id'];    // name from the form
        $ct_descripcion = @$_POST['ct_descripcion'];    // name from the form
          $ct_descripcion = @$_POST['ct_anho'];    // name from the form
        $ct_fecha = @$_POST['ct_fecha'];   // pasword from the form
        $tipo_muestreo= @$_POST['38'];    // name from the form
        $ct_observacion = @$_POST['observacion']; 
        $ct_estado = @$_POST['ct_estado']; 

            $_SESSION['ctform']['error'] = true; // set error floag
          }
    } // POST
  }


  function process_si_edit_form() {


    if ($_SERVER['REQUEST_METHOD'] == 'GET' && @$_GET['action'] == 'editar') {
      $_SESSION['ctform'] = array(); // re-initialize the form session data
        // if the form has been submitted
        $id = @$_GET['id'];    // name from the form
        $errors = array();  // initialize empty error array

        if (isset($GLOBALS['DEBUG_MODE']) && $GLOBALS['DEBUG_MODE'] == false) {

        }

        if (sizeof($errors) == 0) {
         $gestormuestreo=new GestorMuestreo();
         /* predio*/        
         $muestreo=$gestormuestreo->getDataMuestreo( $id );
      
         if ($muestreo!="") {
          $m = pg_fetch_array($muestreo);
  //datos generales del muestreo
         $_SESSION['ctform']['ct_id'] =  $m["id"];    // name from the form
            // pasword from the form
         $_SESSION['ctform']['ct_descripcion'] =   $m["descripcion"];    // name from the form
         $_SESSION['ctform']['dpto_1'] =$m["departamento"]; 
         $_SESSION['ctform']['ct_fecha'] =   $m["fecha"];   // pasword from the form
          $_SESSION['ctform']['ct_tipo'] =  $m["tipo"];    // name from the form
          $_SESSION['ctform']['ct_anho'] =   $m["anho"]; 
          $_SESSION['ctform']['ct_totalpredios'] =$m["totalpredios"]; 
          $_SESSION['ctform']['ct_totalmuestras'] =$m["totalmuestra"];
          $_SESSION['ctform']['ct_n'] =   $m["n"]; 
          $_SESSION['ctform']['ct_k'] =   $m["k"]; 
          $_SESSION['ctform']['ct_xxmin'] =   $m["xxmin"]; 
          $_SESSION['ctform']['ct_xxmax'] =   $m["xxmax"]; 
          $_SESSION['ctform']['ct_r'] =   $m["r"]; 
          $_SESSION['ctform']['ct_l'] =   $m["l"]; 

         $listapredios=$gestormuestreo->getMuestraByMuestreo($m["id"],"");
          $listamuestras=$gestormuestreo->getMuestraByMuestreo($m["id"],1);

          $_SESSION['ctform']['listapredios'] =   $listapredios; 
          $_SESSION['ctform']['listamuestras'] =$listamuestras; 
             

            $_SESSION['ctform']['error'] = false;  // no error with form
            $_SESSION['ctform']['success'] = false; // message sent
             $_SESSION['ctform']['edit'] = true; // message sent

           }else{
            echo " <script type=\"text/javascript\">
            alertify.error(\"Error :no se encontro Monitoreo\");
          </script>";
            $_SESSION['ctform']['error'] = true;  // no error with form
            $_SESSION['ctform']['success'] = false; // message sent
             $_SESSION['ctform']['edit'] = false; // message sent
           }

         } else {
            // save the entries, this is to re-populate the form
          echo " <script type=\"text/javascript\">
          alertify.error(\"Error :corrija errores\");
        </script>";
            $_SESSION['ctform']['error'] = true; // set error floag
          }

    } // get

  }

 unset($_SESSION['ctform']); // clear  value after running
// $_SESSION['ctform']['codpredio']=@$_SESSION['aux'];


 ?>