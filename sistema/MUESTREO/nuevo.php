<?php
include "../Valid.php";
include "../Registro/destroy_predio.php";


require_once $_SERVER['DOCUMENT_ROOT'] . '/sistema/config/config.php';

require_once APPPATH . '/scripts/Codificadores.php';
require_once APPPATH . '/NOTICIAS/GestorNoticias.php';
include  APPPATH . '/politico/GestorPolitico.php';
$codigicador=new Codificadores();

$gestpolitico=new GestorPolitico();
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

   <script>
    $(function ()
    {
    var form = $("#example-advanced-form").show();

    form.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "slideLeft",
        onStepChanging: function (event, currentIndex, newIndex)
        {
            // Allways allow previous action even if the current form is not valid!
            if (currentIndex > newIndex)
            {
                return true;
            }
            // Forbid next action on "Warning" step if the user is to young
            if (newIndex === 3 && Number($("#age-2").val()) < 18)
            {
                return false;
            }
            // Needed in some cases if the user went back (clean up)
            if (currentIndex < newIndex)
            {
                // To remove error styles
                form.find(".body:eq(" + newIndex + ") label.error").remove();
                form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
            }
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onStepChanged: function (event, currentIndex, priorIndex)
        {
            // Used to skip the "Warning" step if the user is old enough.
            if (currentIndex === 2 && Number($("#age-2").val()) >= 18)
            {
                form.steps("next");
            }
            // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
            if (currentIndex === 2 && priorIndex === 3)
            {
                 form.steps("previous");
            }
        },
        onFinishing: function (event, currentIndex)
        {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function (event, currentIndex)
        {
           var cont =parseInt($('#cont').val());
if (cont>9) {
             alertify.confirm("Esta seguro que desea finalizar el muestreo?", function (e) {
        if (e) {
           $("#loading-div-background").show();
          form.submit();
          // alertify.success('Ejecutando Muestreo');
          $("#sms").html('CALCULANDO MUESTREO <br> Espere Por Favor');
        } else {
         alertify.error("Cancelado");
       }
      });

  }else{
   alertify.error("Se debe Agregar 10 Predios Como Minimo.");
  };

        }
    }).validate({
        errorPlacement: function errorPlacement(error, element) { element.before(error); },
        rules: {
            confirm: {
                equalTo: "#password-2"
            }
        }
    });


         });
            </script>





</HEAD>
        <?php
        process_si_nuevo_form(); // Process the form, if it was submitted
        process_si_edit_form();
        ?>
        <BODY>


 <div  class="center" style="width:75% ">
    <form id="example-advanced-form" action="#" method="post">
        <h3>DATOS GENERALES DEL MUESTREO</h3>
        <fieldset>
        <div class="line-2" ></div>
            <div align="center" ><strong>MUESTREO</strong></div>
     <div class="line" ></div>

            <div  class="center" style="width:45%">

              <div class="line" ></div>
              <div class="campo" style="width:90%">
                <label for="ct_descripcion">GRUPO DE MONITOREO</label>
                <?php echo @$_SESSION['ctform']['ct_descripcion_error'] ?>
                <textarea class="required" style=" height: 60px;  resize: none;" id="ct_descripcion" name="ct_descripcion" > <?php echo htmlspecialchars(@$_SESSION['ctform']['ct_descripcion']) ?></textarea>
              </div>
               <div class="line" ></div>
                 <div class="campo" style="width:90%">
               <?php   echo $codigicador->getDeptoByPais(1,"_1","required");?>
             </div>
             <div class="line" ></div>
              <div class="campo" style="width:90%">
                <label for="ct_anho">AÑO DE MONITOREO</label>
                <?php echo @$_SESSION['ctform']['ct_fecha_error'] ?>

                <select name="ct_anho" id="ct_anho" class="required">
                    <option value=""></option>
                    <option value="1">Año 1</option>
                    <option value="2">Año 2</option>
                    <option value="3">Año 3</option>
                    <option value="4">Año 4</option>
                    <option value="5">Año 5</option>
                </select>

              </div>
              <div class="line" ></div>
              <div class="campo" style="width:90%">
                <label for="ct_fecha">FECHA</label>
                <?php echo @$_SESSION['ctform']['ct_fecha_error'] ?>
                <input id="ct_fecha" name="ct_fecha" type="text"
                class="required" placeholder="" autofocus="" title=""
                value="<?php $hoy= date('Y-m-d H:i:s'); echo $hoy;?>" disabled="disabled"/>
              </div>
              <div class="line" ></div>
              <div class="campo" style="width:90%">
               <?php   echo $codigicador->getByClasificadorlabel(38, "required");?>
             </div>
             <div class="line" ></div>


             <!--  <div class="campo" style="width:90%">
                <label for="ct_observacion">OBSERVACION</label>
                <?php echo @$_SESSION['ctform']['ct_observacion_error'] ?>
                <textarea style=" height: 60px;  resize: none;" id="ct_observacion" name="ct_observacion" > <?php echo htmlspecialchars(@$_SESSION['ctform']['ct_observacion']) ?></textarea>
              </div> -->
             <!--    <div class="line" ></div>
            <div class="campo" style="width:90%">
              <label >ESTADO</label>
              <input  <?php if (isset($_SESSION['ctform']['ct_estado'])&& $_SESSION['ctform']['ct_estado']==2) {echo 'checked="true"'; }?> style="display:inline;float:right;" type="radio" name="ct_estado"  value="2" id="ct_edi_option_2" required/>
              <label style="display:inline;float:right;" >Desactivado</label>
              <input <?php if (isset($_SESSION['ctform']['ct_estado']) && $_SESSION['ctform']['ct_estado']==1) {echo 'checked="true"'; }?> style="display:inline; float:right;" type="radio" name="ct_estado" value="1" id="ct_edi_option_1" required/>
              <label  style="display:inline;float:right;width: 60px;">Activado</label>
            </div> -->
            <div class="line" ></div>
            </div>
        </fieldset>

        <h3>SELECCION DE PREDIOS PARA MUESTREO</h3>
        <fieldset>
           <!-- <div align="center" ><strong>Identificar Universo</strong></div> -->
         <?php
          include "./definiruniverso.php";
          ?>
                 <input id="action" name="action" value="guardar"  type="hidden" />
        </fieldset>

      <!--   <h3>Warning</h3>
        <fieldset>
            <legend>You are to young</legend>

            <p>Please go away ;-)</p>
        </fieldset>

        <h3>Finish</h3>
        <fieldset>
          <legend>Terms and Conditions</legend>

          <div class="campo" style="width:90%">
                <label for="">DESCRIPCION:</label>  <label for="">muestroe campo de los noscas</label>
          </div>
          <div class="line" ></div>
     <div class="campo" style="width:90%">
             <label for="acceptTerms-2">Estoy seguro y deseo finalizar </label><input id="acceptTerms-2" name="acceptTerms" type="checkbox" class="required">

    </div>
        </fieldset> -->
    </form>

</div>
<script type="text/javascript">
  $(document).ready(function() {
//

    $('#dpto_1').change(function() {
       var a= $(this).val();
         $('#dpto').attr('DISABLED', 'true');
         $("#dpto").val(a);
           buscar();
        if ($('#mt1 >tbody >tr').length > 0){
      // alertify.confirm("This is a confirm dialog", function (e) {
      //    if (e) {
      //         alertify.success('You ve clicked OK');
      //    } else {
        $("#mt1> tbody tr").remove();
         alertify.error("se quito los predios seleccionados.");

              $('#green1').smartpaginator({ totalrecords: 1, recordsperpage: 10, datacontainer: 'mt1', dataelement: 'tr', initval: 0,length: 8,  next: 'Next', prev: 'Prev', first: 'First', last: 'Last', theme: 'green' });
         $("#cont").val(0);
        // }
      // }
 }
        //var a= $(this).val();
    });





//

  });

</script>
<script>

function quitar2(tr){
   alertify.confirm("Esta seguro que desea quitar de la lista?", function (e) {
        if (e) {
      var cont =parseInt($('#cont').val());
       cont = cont - 1;
      tr.parent().parent().remove();
      $('#green1').smartpaginator({ totalrecords: cont, recordsperpage: 10, datacontainer: 'mt1', dataelement: 'tr', initval: 0,length: 8,  next: 'Next', prev: 'Prev', first: 'First', last: 'Last', theme: 'green' });
      $('#cont').val(cont);
      ordenarNumeracion();
          alertify.success('Concretado');
        } else {
         alertify.error("Cancelado");
       }
      });
}
function ordenarNumeracion(){
if ($('#mt1 >tbody >tr').length > 0){
       var cont =parseInt($('#cont').val());

for (var i = 1; i <= cont; i++) {
  var lnk=i-1;
    $('#mt1 >tbody').find('tr').eq(lnk).find('td').eq(0).html(i);
};


}
}
function existelista(cod){
  respuesta=false;
if ($('#mt1 >tbody >tr').length > 0){
       var cont =parseInt($('#cont').val());

for (var i = 1; i <= cont; i++) {
  var lnk=i-1;
    valor=$('#mt1 >tbody').find('tr').eq(lnk).find('td').eq(1).html();

if (valor==cod) {
  respuesta=true;
  return true;
};
};
};
return respuesta;
}
  function quitar(){
   divscript2= $("#divscript2");
 divscript2.html("<div>\<script\>"+
 "$(\".quitar\").unbind('click');"+
"$(\".quitar\").click(function() {"+
   "quitar2($(this));"+
       "  });"+
    "\<\/script\></div>");
};
  function buscar(){
    var e = true;
    $('#buscar').hide();
// TR1 =$("#mt tr:first-child");
 $("#mt> tbody tr").remove();
// $("#mt").children( 'tr:not(:first)' ).remove();
//   $("#mt" ).append(TR1);
    if(e){
      // show that something is loading
      // $('#form-ig').validate ();
       dpto= $('#dpto_1').val ();
      $("#loading-div-background").show();
      var datastep = {"step":"ig","action": "buscar","dpto":dpto};
      data = $('#search-form').serialize() + "&" + $.param(datastep);


      $.post('../registro/response-registro.php',data, function(response){
           //done() es ejecutada cuándo se recibe la respuesta del servidor. response es el objeto JSON recibido
           $("#loading-div-background").hide();
           $('#buscar').show();
           if( response.success ) {
                          //alert(response.success);
                               // var output = "<h2>" + response.data.message + "</h2>";
                               // alertify.success('Success:' + response.data.message);
                               //$('#ct_dgp_codpredio').val(response.data.dato[0].f_predio);
                                //  alert(response.data.dato[0].f_predio);
 registros =response.data.dato;
        //alert(JSON.stringify(registros));
            if (!registros)
            {
                alert("No se encontraron registros para la busqueda especificada");
                return;
            }
            // ahora, para cada registro que recuperamos
            var registro;
 var i=1;
  // $("#mt" ).append("<tr></tr>");

            for (var idx in registros)
            {
                registro = registros[idx];
                $("#mt" ).append("<tr><td class=''>" + i + "</td><td class=''>" + registro["ID PARCELA"] + "</td><td class=''>" + registro["NOMBRE PREDIO"] + "</td><td class=''>" + registro.DEPARTAMENTO + "</td><td class=''><a idreg='"+registro["ID REGISTRO"]+"' href='javascript:;' class='adicionar' style='color:blue;' >ADICIONAR</a></td></tr>");
           i++;
            }
            // if (i>11) {
             $('#green').smartpaginator({ totalrecords: i-1, recordsperpage: 10, datacontainer: 'mt', dataelement: 'tr', initval: 0,length: 8,  next: 'Next', prev: 'Prev', first: 'First', last: 'Last', theme: 'green' });
              // };
                                // $("#ct_dgp_codpredio" ).val(response.data.dato[0].id);
                                //Actualizamos el HTML del elemento con id="#response-container"
        divscript= $("#divscript");                        //  $("#response-container").html(output);
divscript.prepend("<div>\<script\>"+
"$(\".adicionar\").click(function() {"+
              "var   aCustomers=\"\"  ; "+
     "    a=$(this).parent().parent().clone();"+
       "cod= a.find('td').eq(1).html();"+
     "if(!existelista(cod)){"+
        "  var cont =parseInt($('#cont').val());"+
      "cont = cont + 1;"+
           " var idreg=$(this).attr(\"idreg\");  "+
      " a.find('td').eq(0).html(cont);"+
      " a.find('td').eq(4).html(\"<a id='cont' class='quitar' href='javascript:;' style='color:red;' >QUITAR</a><input name='codigos[]' value='\"\+cod\+\"'  type='hidden' />\");"+
    " $(\"#mt1\" ).append(a); "+
       "  $('#green1').smartpaginator({ totalrecords: cont, recordsperpage: 10, datacontainer: 'mt1', dataelement: 'tr', initval: 0,length: 8,  next: 'Next', prev: 'Prev', first: 'First', last: 'Last', theme: 'green' }); "+
             "  $('#cont').val(cont);  "+
             " alertify.success('Success:Predio Agregado correctamente.');"+
  "  }else{   alertify.error('Error : El predio ya se encuentra en la lista.' );};"+
          "  });"+


    "\<\/script\></div>");


                          } else {
                                //response.success no es true
                                 alertify.error('Error :' + response.data.message);
                               // $("#response-container").html('No ha habido suerte: ' + response.data.message);
                           }


                       }).fail(function() {

            // just in case posting your form failed
           alertify.error('Error : Posting failed.' );
            $("#loading-div-background").hide();
            $('#buscar').show();

        });

        // to prevent refreshing the whole page page
        return false;
    }else{
      alertify.error('Error :Por favor corrija los errores');
      $('#buscar').show();
      return false;

    }
};
</script>
  <script type="text/javascript">


$(document).ready(function(){ <!-- --------> ejecuta el script jquery cuando el documento ha terminado de cargarse -->

    $("#nuevo").click(function() { <!-- ------> al pulsar (.click) el boton 1 (#b1) -->
                        // recorremos todos los valores...
              var   aCustomers=""  ;
        //  var idreg=$(this).attr("idreg");
        //  var  causal=$(this).attr("causal");
        //     var actividad=$(this).attr("actividad");
        // a=$(this).parent().parent();
        //     $("#codigo").val(codigoparcela);
        //     $("#nombre").val(nombrepredio);
        //     $("#actividad").val(actividad);
        //     $("#33").val("");
        //     $("#anho").val("");
        // alert(codigoparcela);    alert(nombrepredio);   alert(actividad);    alert(idreg);

        $("#dialogo2").dialog({ <!--  ------> muestra la ventana  -->
            width: 690,  <!-- -------------> ancho de la ventana -->
            height: 520,<!--  -------------> altura de la ventana -->
            show: "scale", <!-- -----------> animación de la ventana al aparecer -->
            hide: "scale", <!-- -----------> animación al cerrar la ventana -->
            resizable: "false", <!-- ------> fija o redimensionable si ponemos este valor a "true" -->
            position: "top",<!--  ------> posicion de la ventana en la pantalla (left, top, right...) -->
            modal: "true", <!-- ------------> si esta en true bloquea el contenido de la web mientras la ventana esta activa (muy elegante) -->
        opacity: 0.9,
         closeOnEscape: false,
          open: function(event, ui) { $(".ui-dialog-titlebar-close").hide(); },
        buttons: {
"Cerrar": function () {
  quitar();
$(this).dialog("close");
// location.href="index.php?action=editar&id="+$('#ct_id').val();
}
}
        });

    });

  $("#buscar").click(function() { <!-- ------> al pulsar (.click) el boton 1 (#b1) -->
                        // recorremos todos los valores...
              var   aCustomers=""  ;
              buscar();
        //  var idreg=$(this).attr("idreg");
        //  var  causal=$(this).attr("causal");
        //     var actividad=$(this).attr("actividad");
        // a=$(this).parent().parent();
        //     $("#codigo").val(codigoparcela);
        //     $("#nombre").val(nombrepredio);
        //     $("#actividad").val(actividad);
        //     $("#33").val("");
        //     $("#anho").val("");
        // alert(codigoparcela);    alert(nombrepredio);   alert(actividad);    alert(idreg);

    });


    $(window).keypress(function(e) {
    if(e.keyCode == 13) {
    //haz lo que quieras cuando presionene enter
    buscar();
    }
    });



});


    </script>




        <div id="dialogo2" class="ventana" title="">
 <form id="search-form" action="#">
      <div class="line-2" align="center" style="display:block" >

   <label><strong>LISTA DE PREDIOS HABILITADOS PARA MUESTREO</strong></label>

</div>

 <div  class="CSSTable1 center" style="width:97%">

<table id="mt" class="" >
<thead>
<tr class="header">
  <th><strong>#</strong></th>
  <th><strong>CODIGO DE PARCELA  <input id="b_codigo" name="b_codigo" type="text"
                class="required" placeholder="" autofocus="" title=""
                value="<?php echo htmlspecialchars(@$_SESSION['ctform']['b_codigo']) ?>"/>
  </strong></th>
  <th><strong>NOMBRE DE PREDIO<input id="b_nombre" name="b_nombre" type="text"
                class="required" placeholder="" autofocus="" title=""
                value="<?php echo htmlspecialchars(@$_SESSION['ctform']['b_nombre']) ?>"/>
  </strong></th>
   <th><strong><?php echo $gestpolitico->getDeptoByPais(1); ?>
  </strong></th>
<th><a id="buscar" href="javascript:;" class="boton verde formaBoton" > BUSCAR</a>
</th>

  </tr>
  </thead>
<!--  <tr></tr> -->

</table>
</form>

</div >
 <div id="green" style="margin: auto;width:98%">
 </div>
   <p id="naver"></p>
<div id="loading-div-background">
            <div id="loading-div" class="ui-corner-all" >
              <img style="height:80px;margin:40px;" src="<?php ECHO WEBPATH; ?>/images/loading.gif" alt="Loading.."/>
              <h2 style="color:gray;font-weight:normal;">Please wait....</h2>
        </div>
        </div>
        </div>
<div id="divscript">

</div>
<div id="divscript2">
</div>
<div id="loading-div-background">
            <div id="loading-div" class="ui-corner-all" >
              <img style="height:80px;margin:40px;" src="<?php ECHO WEBPATH; ?>/images/loading.gif" alt="Loading.."/>
              <h2 id="sms" style="color:gray;font-weight:normal;">Please wait....</h2>
        </div>
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
          $ct_descripcion = @$_POST['ct_anho'];    // name from the form
        $ct_fecha = @$_POST['ct_fecha'];   // pasword from the form
        $tipo_muestreo= @$_POST['38'];    // name from the form
        $ct_observacion = @$_POST['observacion'];
        $ct_estado = @$_POST['ct_estado'];
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
          $gest=new GestorNoticias();
          $result=pg_fetch_array($gest->guardarNoticias( $ct_id,    $ct_titulo ,    $ct_descripcion,    $ct_fecha_registro=date("Y-m-d H:i:s"),  $inimagen=NULL,      $ct_fecha,    $tipo_noticia ,    $ct_nivel , $ct_estado));
   $_SESSION['ctform']['ct_id'] = $result['id'];    // name from the form
        $ct_descripcion = @$_POST['ct_descripcion'];    // name from the form
          $ct_descripcion = @$_POST['ct_anho'];    // name from the form
        $ct_fecha = @$_POST['ct_fecha'];   // pasword from the form
        $tipo_muestreo= @$_POST['38'];    // name from the form
        $ct_observacion = @$_POST['observacion'];
        $ct_estado = @$_POST['ct_estado'];
            $_SESSION['ctform']['error'] = false;  // no error with form
            $_SESSION['ctform']['success'] = true; // message sent

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
         $gestornoticia=new GestorNoticias();
         /* predio*/
         $predio=$gestornoticia->getDataNoticias( $id ,"noticias");
         if ($predio!="") {
          $_SESSION['aux']=$id;
          while ($r = pg_fetch_array($predio)) {

                   $_SESSION['ctform']['ct_id'] =  $r["id"];    // name from the form
          $_SESSION['ctform']['ct_titulo'] =  $r["titulo"];   // pasword from the form
         $_SESSION['ctform']['ct_descripcion'] =   $r["decripcion"];    // name from the form
         $_SESSION['ctform']['ct_fecha'] =   $r["fecha_noticia"];   // pasword from the form
          $_SESSION['ctform']['37'] =  $r["tipo"];    // name from the form
          $_SESSION['ctform']['ct_nivel'] =   $r["nivel"];
          $_SESSION['ctform']['ct_estado'] =   $r["estado"];
        }

            $_SESSION['ctform']['error'] = false;  // no error with form
            $_SESSION['ctform']['success'] = false; // message sent
             $_SESSION['ctform']['edit'] = true; // message sent

           }else{
            echo " <script type=\"text/javascript\">
            alertify.error(\"Error :no se encontro predio\");
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
