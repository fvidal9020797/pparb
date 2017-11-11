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
    <HEAD>
    <TITLE>listado</TITLE>
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
  <script type="text/javascript">

$(function() {

$('.delete').bind('click',function(){
 var a=$(this);
      alertify.confirm("Desea Eliminar Muestreo con Codigo:"+ a.attr("id")+" <br> Descripcion:"+ a.attr("data"), function (e) {
        if (e) {
      var action = {"action": "eliminar"};
      data =  "id=" + a.attr("id")+ "&" + $.param(action);
      location.href="index.php?"+data;
alertify.success("Success:Correcto");
      // $.post('./noticia-response.php',data, function(response){
      //      //done() es ejecutada cuándo se recibe la respuesta del servidor. response es el objeto JSON recibido
      //      if( response.success ) {
      //                     //alert(response.success);
      //                          // var output = "<h2>" + response.data.message + "</h2>";
      //                          //alert(response.data.message);
      //                          //$('#ct_dgp_codpredio').val(response.data.dato[0].f_predio);
      //                           //  alert(response.data.dato[0].f_predio);
      //                  var parent = a.parents().parents().get(0);
      //                 $(parent).remove();
      //                   alertify.success("Success:"+ response.data.message);
      //                           //Actualizamos el HTML del elemento con id="#response-container"
      //                         //  $("#response-container").html(output);

      //                     } else {
      //                           //response.success no es true
      //                           alertify.error("Error :" + response.data.message);
      //                          // $("#response-container").html('No ha habido suerte: ' + response.data.message);
      //                      }
      //                  }).fail(function() {

      //       // just in case posting your form failed
      //        alertify.error( "Posting failed." );

      //   });

        } else {
         alertify.error("Cancelado");
        }
      });
});
});
  </script>

    <script>
        $(window).keypress(function(e) {
        if(e.keyCode == 13) {
        //haz lo que quieras cuando presionene enter
        document.form.submit();
        }
        });
    </script>

    </HEAD>

    <BODY>
        <div align="center">
            <div id="oculto">
                <div class="ocultable" id="texto1">
                    <div id="volanta"></div>
                </div>
            </div>
            <div align="center" class="texto">


                <p>
                    <h1>LISTA DE MUESTREOS REALIZADOS</h1>
                     <a class="boton verde formaBoton" href="index.php?action=nuevo"> NUEVO MUESTREO</a></td>


                </p>
            </div>
            <div class="CSSTable1 center" style="width:80%">
                <table id="mt" >
                  <form action="index.php" name="form" method="get">
                        <input type="hidden" class="" name="action" value="listar">
                <thead>

                        <tr>
                            <th><strong>#</strong></th>
                            <th><strong>DESCRIPCION

                                </strong>
                                <strong>

                                </strong>
                            </th>
                            <th><strong>DEPARTAMENTO</strong>
                                <strong>

                                </strong>
                            </th>
                            <th><strong>AÑO</strong>

                            </th>
                            <th><strong>TIPO DE MUESTREO </strong>
                                <strong>
                                 </strong>



                            </th>
                            <th><strong>FECHA DE EJECUCION</strong>

                                <strong>
                                </strong>
                            </th>

                            <th><strong>TOTAL UNIVERSO</strong>
                                <strong>

                                </strong>
                            </th>
                            <th><strong>TOTAL MUESTRA</strong>
                                <strong>

                                </strong>

                            </th>

                            <th>
                            <strong>
                                IMPRIMIR
                            </strong>
                            </th>

                            <th>
                            <strong>
                                ELIMINAR
                            </strong>
                            </th>


                        </tr>

                    </thead>
                      </form>
                    <tbody>
                    <?php
///////<?php
  /* predio*/
  $gest=new GestorMuestreo();
  $con=1;
         $muestreos=$gest->getMuestreos();
         $muestreostotal=pg_num_rows( $muestreos);
         if ($muestreos!="") {

          while ($r = pg_fetch_array($muestreos)) {


?>
                            <tr  align="center">
                                <td ><?php echo trim($con); ?></td>
                                <td ><?php echo trim($r['descripcion']); ?></td>
                                <td ><?php echo trim(substr($r['departamento'], 0, 40)); ?></td>
                                <td ><?php echo trim($r['anho']); ?></td>
                                <td ><?php echo trim($r['tipo']); ?></td>
                                <td ><?php echo trim($r['fecha']); ?></td>
                                <td ><?php echo trim($r['totalpredios']); ?></td>
                                <td ><?php echo trim($r['totalmuestra']); ?></td>



                                <td align ="midle">
                                  <div style="text-align:center;">
                                  <a  href='<?php ECHO WEBPATH; ?>/reportes/muestreo-print.php?action=print-muestreo&outputtype=pdf&id=<?php echo $r['id'] ?>' id='<?php echo $r['id'] ?>' data="" class="" ><img style='height:25px;width:25px;' src='<?php ECHO WEBPATH; ?>/images/logosdos/impresora2.png' /></a>
                                  </div>
                                </td>

                                <td align ="midle">
                                  <div style="text-align:center;">
                                  <a  id='<?php echo $r['id'] ?>' data='<?php echo $r['descripcion'] ?>' class="delete"><img style='height:25px;width:25px;' src='<?php ECHO WEBPATH; ?>/images/delete.jpg' /></a>
                                  </div>
                                </td>




                            </tr>
                            <?php
                            $con = $con + 1;
                        }


                    } else {
                        ?>
                        <tr>
                            <td colspan="11" align="center" class="celdaRojo">
                                <?php echo "No se encuentra Datos para esta consulta!!"; ?>	 </td>
                        </tr>
                    <?php }
                    ?>

                    </tbody>
                </table>

   <div id="green" style="margin: auto;width:98%">
 </div>
            </div>


<script type="text/javascript">
<?php


    echo   "  $('#green').smartpaginator({ totalrecords: ".$muestreostotal.", recordsperpage: 20, datacontainer: 'mt', dataelement: 'tr', initval: 0,length: 8,  next: 'Next', prev: 'Prev', first: 'First', last: 'Last', theme: 'green' }); ";

?>

</script>
    </BODY>
