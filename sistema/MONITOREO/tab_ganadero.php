<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/sistema/config/config.php';
session_start();
include "../cabecera.php";
$mensaje = "";

include "../Clases/SuperficieRegistro.php";
include "page_ganaderaM.php";

?>
<!DOCTYPE html>
<HTML>
    <HEAD><TITLE>FORMULARIO RCIA GANADERO</TITLE>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<LINK href="../css/mdryt.css" type=text/css rel=stylesheet>
		<link rel="stylesheet" type="text/css" href="../css/button.css"/>
		<script language="JavaScript" src="../scripts/funciones.js"></script>
		<link rel="stylesheet" href="../css/jquery-ui.css" />
		<script src="../libraries/jquery-1.10.3/jquery-1.10.2.min.js"></script>
		<script src="../libraries/jquery-1.10.3/jquery-1.10.3.ui.min.js"></script>
		<link rel="stylesheet" media="screen" href="../css/validate/screen.css">
		<script src="../libraries/jquery-validate-1.13.1/jquery-validate-1.13.1.js"></script>
		<script type="text/javascript" src="<?php ECHO WEBPATH; ?>/scripts/monitoreo.form.js"></script>
		<link rel="stylesheet" href="<?php ECHO WEBPATH; ?>/libraries/alertify/themes/alertify.core.css" />
		<link rel="stylesheet" href="<?php ECHO WEBPATH; ?>/libraries/alertify/themes/alertify.default.css" id="toggleCSS" />
		<script src="<?php ECHO WEBPATH; ?>/libraries/alertify/lib/alertify.min.js"></script>

<script>
$(document).ready(function(){
    $('#form').submit(function(){
        // show that something is loading
        $('#response').html("");
    });

});

</script>

 <script>
            $(function() {
                $("#tabs").tabs({
                });
                $("#tabs ul li a").click(function() {
                    document.getElementById("carga").innerHTML = '';
                });
                $("#send").click(function() {
                    document.getElementById("carga").innerHTML = '';
                });
            });

 </script>


  <script>
  function guardarganadero(){
    var e = true;
    $('#guardarstepganrcia').hide();

    if(e){
      // show that something is loading
      $('#form-ganaderarcia').validate ();
      $("#loading-div-background").show();
      var datastep = {"step":"ganaderarcia","action": "guardar-ganaderarcia"};
      data = $('#form-ganaderarcia').serialize() + "&" + $.param(datastep);


      $.post('./response-monitoreo.php',data, function(response){
           //done() es ejecutada cu�ndo se recibe la respuesta del servidor. response es el objeto JSON recibido
           $("#loading-div-background").hide();
           $('#guardarstepganrcia').show();
           if( response.success ) {
                          //alert(response.success);
                               // var output = "<h2>" + response.data.message + "</h2>";
							   //alert('Success:' + response.data.message);
                               alertify.success('Success:' + response.data.message);
                               //$('#ct_dgp_codpredio').val(response.data.dato[0].f_predio);
                                //  alert(response.data.dato[0].f_predio);

                                //$("#ct_dgp_codpredio" ).val(response.data.dato[0].id);
                                //Actualizamos el HTML del elemento con id="#response-container"
                              //  $("#response-container").html(output);

                          }
			else {
                                //response.success no es true
                                 alertify.error('Error :' + response.data.message);
                               // $("#response-container").html('No ha habido suerte: ' + response.data.message);
                           }


                       }).fail(function() {

            // just in case posting your form failed
           alertify.error('Error : Posting failed.' );
            $("#loading-div-background").hide();
            $('#guardarstepganrcia').show();

        });

        // to prevent refreshing the whole page page
        return false;
    }else{
      alertify.error('Error :Por favor corrija los errores');
      $('#guardarstepganrcia').show();
      return false;

    }
};
  // extend the current rules with new groovy ones

  // this one requires the text "buga", we define a default message, too
  $.validator.addMethod("buga", function(value) {
    return value == "buga";
  }, 'Please enter "buga"!');

  // this one requires the value to be the same as the first parameter
  $.validator.methods.equal = function(value, element, param) {
    return value == param;
  };

  $().ready(function() {
    var validator = $("#form-ganaderarcia").bind("invalid-form.validate", function() {
      // $("#summary").html("Your form contains " + validator.numberOfInvalids() + " errors, see details below.");
     alertify.error("Su formulario contiene " + validator.numberOfInvalids() + " error");
    }).validate({
      debug: true,
      errorElement: "em",
      errorContainer: $("#warning, #summary"),
      errorPlacement: function(error, element) {
        // error.appendTo(element.parent("div").next("div"));
          // element.css('background-color','#FFEDEF');
         // error.appendTo(element.parent("div").next("div"));

      },
      // highlight: function(element, errorClass) {
      //  $(element).addClass(errorClass).parent().prev().children("select").addClass(errorClass);
      // },
      submitHandler: function(form) {
        guardarganadero();
      },
      success: function(label) {

        // label.text("ok!").addClass("success");
      },
      rules: {
        alimentos: {
          required: true
        },
        33: {
          required: true
        },
        bosques: {
          required: true
        },
        secret: "buga",
        math: {
          equal: 11
        }
      }
    });

  });
  </script>


  <script>
  function guardardocumentosganadero(){
    var e = true;
    $('#guardarstepdocganarcia').hide();

    if(e){
      $('#form-docganarcia').validate ();
      $("#loading-div-background").show();
      var datastep = {"step":"ganaderarcia","action": "guardar-docganaderarcia"};
      data = $('#form-docganarcia').serialize() + "&" + $.param(datastep);


      $.post('./response-monitoreo.php',data, function(response){
           $("#loading-div-background").hide();
           $('#guardarstepdocganarcia').show();
           if( response.success ) {

                               alertify.success('Success:' + response.data.message);


                          }
			else {

                                 alertify.error('Error :' + response.data.message);

                           }


                       }).fail(function() {

           alertify.error('Error : Posting failed.' );
            $("#loading-div-background").hide();
            $('#guardarstepdocganarcia').show();

        });

        return false;
    }else{
      alertify.error('Error :Por favor corrija los errores');
      $('#guardarstepdocganarcia').show();
      return false;

    }
};
  $.validator.addMethod("buga", function(value) {
    return value == "buga";
  }, 'Please enter "buga"!');

  $.validator.methods.equal = function(value, element, param) {
    return value == param;
  };

  $().ready(function() {
    var validator = $("#form-docganarcia").bind("invalid-form.validate", function() {
     alertify.error("Su formulario contiene " + validator.numberOfInvalids() + " error");
    }).validate({
      debug: true,
      errorElement: "em",
      errorContainer: $("#warning, #summary"),
      errorPlacement: function(error, element) {


      },

      submitHandler: function(form) {
        guardardocumentosganadero();
      },
      success: function(label) {

      },
      rules: {
        alimentos: {
          required: true
        },
        33: {
          required: true
        },
        bosques: {
          required: true
        },
        secret: "buga",
        math: {
          equal: 11
        }
      }
    });

  });
  </script>


  <script>
  function guardaranalisisdocumentosganadero(){
    var e = true;
    $('#guardarAnalisisdocganarcia').hide();

    if(e){
      $('#form-evalganadrcia').validate ();
      $("#loading-div-background").show();
      var datastep = {"step":"ganaderarcia","action": "guardar-analisisdocrcia"};
      data = $('#form-evalganadrcia').serialize() + "&" + $.param(datastep);


      $.post('./response-monitoreo.php',data, function(response){
           $("#loading-div-background").hide();
           $('#guardarAnalisisdocganarcia').show();
           if( response.success ) {

                               alertify.success('Success:' + response.data.message);


                          }
			else {

                                 alertify.error('Error :' + response.data.message);

                           }


                       }).fail(function() {

           alertify.error('Error : Posting failed.' );
            $("#loading-div-background").hide();
            $('#guardarAnalisisdocganarcia').show();

        });

        return false;
    }else{
      alertify.error('Error :Por favor corrija los errores');
      $('#guardarAnalisisdocganarcia').show();
      return false;

    }
};
  $.validator.addMethod("buga", function(value) {
    return value == "buga";
  }, 'Please enter "buga"!');

  $.validator.methods.equal = function(value, element, param) {
    return value == param;
  };

  $().ready(function() {
    var validator = $("#form-evalganadrcia").bind("invalid-form.validate", function() {
     alertify.error("Su formulario contiene " + validator.numberOfInvalids() + " error");
    }).validate({
      debug: true,
      errorElement: "em",
      errorContainer: $("#warning, #summary"),
      errorPlacement: function(error, element) {


      },

      submitHandler: function(form) {
        guardaranalisisdocumentosganadero();
      },
      success: function(label) {

      },
      rules: {
        alimentos: {
          required: true
        },
        33: {
          required: true
        },
        bosques: {
          required: true
        },
        secret: "buga",
        math: {
          equal: 11
        }
      }
    });

  });
  </script>








  <script>
  function guardaranalisisdocumentosganaderoG(){
    var e = true;
    $('#guardarAnalisisdocganarciaG').hide();

    if(e){
      $('#form-evalganadrciaG').validate ();
      $("#loading-div-background").show();
      var datastep = {"step":"ganaderarcia","action": "guardar-analisisdoc_GanaderoCampo"};
      data = $('#form-evalganadrciaG').serialize() + "&" + $.param(datastep);


      $.post('./response-monitoreo.php',data, function(response){
           $("#loading-div-background").hide();
           $('#guardarAnalisisdocganarciaG').show();
           if( response.success ) {

                               alertify.success('Success:' + response.data.message);


                          }
			else {

                                 alertify.error('Error :' + response.data.message);

                           }


                       }).fail(function() {

           alertify.error('Error : Posting failed.' );
            $("#loading-div-background").hide();
            $('#guardarAnalisisdocganarciaG').show();

        });

        return false;
    }else{
      alertify.error('Error :Por favor corrija los errores');
      $('#guardarAnalisisdocganarciaG').show();
      return false;

    }
};
  $.validator.addMethod("buga", function(value) {
    return value == "buga";
  }, 'Please enter "buga"!');

  $.validator.methods.equal = function(value, element, param) {
    return value == param;
  };

  $().ready(function() {
    var validator = $("#form-evalganadrciaG").bind("invalid-form.validate", function() {
     alertify.error("Su formulario contiene " + validator.numberOfInvalids() + " error");
    }).validate({
      debug: true,
      errorElement: "em",
      errorContainer: $("#warning, #summary"),
      errorPlacement: function(error, element) {


      },

      submitHandler: function(form) {
        guardaranalisisdocumentosganaderoG();
      },
      success: function(label) {

      },
      rules: {
        alimentos: {
          required: true
        },
        33: {
          required: true
        },
        bosques: {
          required: true
        },
        secret: "buga",
        math: {
          equal: 11
        }
      }
    });

  });
  </script>









    <script>
  function guardarMon_Gabinete(){
    var e = true;
    $('#guardarMon_Gabinete').hide();

    if(e){
      $('#form-evalganadrciaMG').validate ();
      $("#loading-div-background").show();
      var datastep = {"step":"ganaderarcia","action": "guardarMon_Gabinete"};
      data = $('#form-evalganadrciaMG').serialize() + "&" + $.param(datastep);


      $.post('./response-monitoreo.php',data, function(response){
           $("#loading-div-background").hide();
           $('#guardarMon_Gabinete').show();
           if( response.success ) {

                               alertify.success('Success:' + response.data.message);


                          }
			else {

                                 alertify.error('Error :' + response.data.message);

                           }


                       }).fail(function() {

           alertify.error('Error : Posting failed.' );
            $("#loading-div-background").hide();
            $('#guardarMon_Gabinete').show();

        });

        return false;
    }else{
      alertify.error('Error :Por favor corrija los errores');
      $('#guardarMon_Gabinete').show();
      return false;

    }
};
  $.validator.addMethod("buga", function(value) {
    return value == "buga";
  }, 'Please enter "buga"!');

  $.validator.methods.equal = function(value, element, param) {
    return value == param;
  };

  $().ready(function() {
    var validator = $("#form-evalganadrciaMG").bind("invalid-form.validate", function() {
     alertify.error("Su formulario contiene " + validator.numberOfInvalids() + " error");
    }).validate({
      debug: true,
      errorElement: "em",
      errorContainer: $("#warning, #summary"),
      errorPlacement: function(error, element) {


      },

      submitHandler: function(form) {
        guardarMon_Gabinete();
      },
      success: function(label) {

      },
      rules: {
        alimentos: {
          required: true
        },
        33: {
          required: true
        },
        bosques: {
          required: true
        },
        secret: "buga",
        math: {
          equal: 11
        }
      }
    });

  });
  </script>
  <script>
  function AddAnalisisdocganarcia(){
    var e = true;
    $('#AddAnalisisdocganarcia').hide();

    if(e){
      $('#form-add-evalganadrcia').validate ();
      $("#loading-div-background").show();
      var datastep = {"step":"ganaderarcia","action": "add-docrciaganadero"};
      data = $('#form-add-evalganadrcia').serialize() + "&" + $.param(datastep);


      $.post('./response-monitoreo.php',data, function(response){
           $("#loading-div-background").hide();
           $('#AddAnalisisdocganarcia').show();
           if( response.success ) {
                               alertify.success('Success:' + response.data.message);
                          }
			else {
                                alertify.error('Error :' + response.data.message);
                           }
                       }).fail(function() {
           alertify.error('Error : Posting failed.' );
            $("#loading-div-background").hide();
            $('#AddAnalisisdocganarcia').show();

        });

        return false;
    }else{
      alertify.error('Error :Por favor corrija los errores');
      $('#AddAnalisisdocganarcia').show();
      return false;

    }
};
  $.validator.addMethod("buga", function(value) {
    return value == "buga";
  }, 'Please enter "buga"!');

  $.validator.methods.equal = function(value, element, param) {
    return value == param;
  };

  $().ready(function() {
    var validator = $("#form-add-evalganadrcia").bind("invalid-form.validate", function() {
     alertify.error("Su formulario contiene " + validator.numberOfInvalids() + " error");
    }).validate({
      debug: true,
      errorElement: "em",
      errorContainer: $("#warning, #summary"),
      errorPlacement: function(error, element) {


      },

      submitHandler: function(form) {
        AddAnalisisdocganarcia();
      },
      success: function(label) {

      },
      rules: {
        alimentos: {
          required: true
        },
        33: {
          required: true
        },
        bosques: {
          required: true
        },
        secret: "buga",
        math: {
          equal: 11
        }
      }
    });

  });
  </script>
    </head>

    <BODY>

         <div id="tabs">
            <ul>
                <li><a href="#tabs-1">FORMULARIO RCIA</a></li>
                <li><a href="#tabs-2">DOCUMENTOS PRESENTADOS RCIA</a></li>
		            <li onClick="javascript:recargar_anos();"><a href="#tabs-3" >EVALUACION DEL RCIA</a></li>
                <li onClick="javascript:recargar_anosMG2();"><a href="#tabs-4">MONITOREO EN GABINETE</a></li>
                <li onClick="javascript:recargar_anosVC()"><a href="#tabs-5">VERIFICACION DE CAMPO</a></li>
            </ul>



        <div id="tabs-1">
            <div class="menubar-main" align="center">


                <h1>FORMULARIO RCIA</h1>
							<?php
                            include "rcia_ganadero.php";
                            ?>


            <div id='response'>
                <h1 style="color: red"> <?php echo $mensaje; ?>  </h1>
            </div>
            </div>

        </div>


		<div id="tabs-2">
            <div class="menubar-main" align="center">


                <h1>DOCUMENTOS PRESENTADOS RCIA</h1>
				<?php
                            include "documentos_ganadero.php";
                 ?>


            <div id='response'>
                <h1 style="color: red"> <?php echo $mensaje; ?>  </h1>
            </div>
            </div>

        </div>


		<div id="tabs-3">
                    <div class="menubar-main" align="center">


                        <h1>EVALUACIÓN DEL RCIA GANADERO</h1>
                                        <?php
                                    include "evaluacion_ganadera_rcia.php";
                         ?>


                    <div id='response'>
                        <h1 style="color: red"> <?php echo $mensaje; ?>  </h1>
                    </div>
                    </div>

                </div>


                <div id="tabs-4">
                    <div class="menubar-main" align="center">
                        <h1>MONITOREO EN GABINETE</h1>
                                        <?php
                                     include "evaluacion_ganadera_rcia_mon_gabinete.php";
                         ?>
                    <div id='response'>
                        <h1 style="color: red"> <?php echo $mensaje; ?>  </h1>
                    </div>
                    </div>
                </div>

              
              <div id="tabs-5">
                    <div class="menubar-main" align="center">
                        <h1>VERIFICACIÓN EN CAMPO</h1>
                                        <?php
                                   include "evaluacion_ganadera_rcia_verificacioncampo.php";
                         ?>
                    <div id='response'>
                        <h1 style="color: red"><?php echo $mensaje; ?>  </h1>
                    </div>
                    </div>
                </div>
            <div id="carga" align="center">
                <h1 style="color: red"> <?php echo $mensaje; ?>  </h1>
            </div>
        </div>
</body>
</html>
