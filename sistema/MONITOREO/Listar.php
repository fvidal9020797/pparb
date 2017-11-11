<?php
include "../Valid.php";
include "../Registro/destroy_predio.php";

//include "../reportes/reporte_RCIA.php";
//include "../reportes/reporte_RCIA739.php";
$variable1=456;
 $_SESSION['idreg1']=12;
if(!isset($_SESSION['MM_Rol']))
{   $sql_roles = " Select idtarea From usuarios where idfuncionario=".$_SESSION['MM_UserId'];
    $roles = pg_query($cn,$sql_roles);
	$row_roles = pg_fetch_array ($roles);
	$MM_Rol="";
	do{
	$MM_Rol=$MM_Rol."-".$row_roles['idtarea'];
	} while ($row_roles = pg_fetch_assoc($roles));
	$_SESSION['MM_Rol']=$MM_Rol;
}


//print_r($_SESSION);


require_once $_SERVER['DOCUMENT_ROOT'] . '/sistema/config/config.php';

require_once APPPATH . '/scripts/Codificadores.php';
$codigicador=new Codificadores();
require_once APPPATH . '/Registro/GestorRegistro.php';
$gestregistro=new GestorRegistro();
require_once APPPATH . '/Persona/GestorPersona.php';
$gestorpersona=new GestorPersona();



if(isset($_REQUEST['Imprimir_y']))
{
    $CodParcelas = $_REQUEST['idp5'];
    $CodRegistro = $_REQUEST['idreg'];

    /* ################### verificacion de fechasuscripcion############# */
  $sql_suscripcion = " select r.idregistro, fecharegistro, fechasuscripcion from registro as r full join fechasregistro as fr on r.idregistro = fr.idregistro
  where r.idregistro =".$CodRegistro;

  $resultSuscripcion = pg_query($cn,$sql_suscripcion) ;
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

  if($periodo == 1)
  {
   ImprimirRCIA($CodParcelas);
  }
  elseif ($periodo == 2)
  {
   ImprimirRCIA739($CodParcelas);
  }


}




?>

</<!DOCTYPE html>
<html>
<head>
<TITLE>listado</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<LINK href="../css/mdryt.css" type=text/css rel=stylesheet>
<LINK href="../css/mdryt-jebus.css" type=text/css rel=stylesheet>
<script language="JavaScript" src="../scripts/funciones.js"></script>
<link rel="stylesheet" type="text/css" href="../css/button.css" />
<link rel="stylesheet" href="../css/jquery-ui.css" />
<script src="../libraries/jquery-1.10.3//jquery-1.10.2.min.js"></script>
<script src="../libraries/jquery-1.10.3/jquery-1.10.3.ui.min.js"></script>
	<link rel="stylesheet" media="screen" href="../css/validate/screen.css">
<script src="../libraries/jquery-validate-1.13.1/jquery-validate-1.13.1.js"></script>
  <script src="../scripts/monitoreo.js"></script>

      <script>
        $(window).keypress(function(e) {
        if(e.keyCode == 13) {
        //haz lo que quieras cuando presionene enter
        document.form.submit();
        }
        });
    </script>



<script>
	function guardar(){
		var e = true;
		$('#guardarstep').hide();

		if(e){
		  // show that something is loading
		  $('#form-asignacion').validate ();
		  $("#loading-div-background").show();
		  var datastep = {"step":"asignartecnico","action": "asignartecnico"};
		  data = $('#form-asignacion').serialize() + "&" + $.param(datastep);


		  $.post('./response-monitoreo.php',data, function(response){
           //done() es ejecutada cuándo se recibe la respuesta del servidor. response es el objeto JSON recibido
           $("#loading-div-background").hide();
           $('#guardarstep').show();
           if( response.success ) {
                               alertify.success('Success:' + response.data.message);
                                $("#ct_dgp_codpredio" ).val(response.data.dato[0].id);
                          } else {
                                 alertify.error('Error :' + response.data.message);
                           }


                       }).fail(function() {

            // just in case posting your form failed
           alertify.error('Error : Posting failed.' );
            $("#loading-div-background").hide();
            $('#guardarstep').show();

        });

        // to prevent refreshing the whole page page
        return false;
    }else{
    	alertify.error('Error :Por favor corrija los errores');
    	$('#guardarstep').show();
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
		var validator = $("#form-asignacion").bind("invalid-form.validate", function() {
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
			// 	$(element).addClass(errorClass).parent().prev().children("select").addClass(errorClass);
			// },
			submitHandler: function(form) {
				guardar();
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
	<style>
	form.cmxform {

	}
	em.error {
		background:url("images/unchecked.gif") no-repeat 0px 0px;
		padding-left: 16px;
	}
	em.success {
		background:url("images/checked.gif") no-repeat 0px 0px;
		padding-left: 16px;
		color: red;
	}
	form.cmxform label.error {
		margin-left: auto;
		width: 250px;
	}
	em.error {
		color: red;
	}
	.error1 {
		background: red;
		border: red;
	}
	em.success {
		color: orange;
	}
	#warning {
		display: none;
	}
	select.error {
		border: 3px dotted red;
		background: #FFEDEF;
	}
	</style>
 <script type="text/javascript" src="<?php ECHO WEBPATH; ?>/scripts/monitoreo.form.js"></script>
 <link rel="stylesheet" href="<?php ECHO WEBPATH; ?>/libraries/alertify/themes/alertify.core.css" />
 <link rel="stylesheet" href="<?php ECHO WEBPATH; ?>/libraries/alertify/themes/alertify.default.css" id="toggleCSS" />
 <script src="<?php ECHO WEBPATH; ?>/libraries/alertify/lib/alertify.min.js"></script>
<script>
$(window).keypress(function(e) {
    if(e.keyCode == 13) {

    }
});
</script>
</head>
<body>
<div align="center">
<div align="center" class="texto">
<p>
   <h1>Lista de Predios Registrados Monitoreo</h1>

</p>
</div>
 <div class="CSSTable" >

<form action="index.php" name="form" id="form" method="get">

	<table >
   <td> <a  class="boton verde formaBoton" href="javascript:document.form.submit();">BUSCAR</a>  </td>
	</table >
<table >

<input type="hidden" class="" name="action" value="listar">
<tr>
  <td><strong>#</strong></td>
  <td><strong>CODIGO PARCELA
    <input type="text" class="boxBusqueda4" name="buscar1">
  </strong></td>
  <td>
  <strong>NOMBRE PREDIO</strong> </br>
    <input type="text" class="boxBusqueda4" name="buscar2">
  </td>

  <!--
  <td><strong>FECHA REGISTRO
    <input type="text" class="boxBusqueda4" name="buscar3" readonly>
  </strong></td> -->

  <td><strong>SUPERFICIE TOTAL<br>
    <input type="text" class="boxBusqueda4" name="buscar4" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" >
  </strong></td>
  <td><strong>MUNICIPIO<br>
    <input type="text" class="boxBusqueda4" name="buscar5">
  </strong></td>
  <td><strong>TIPO PROPIEDAD
    <input type="text" class="boxBusqueda4" name="buscar6">
  </strong></td>
  <td><strong>ACTIVIDAD <br>
    <input type="text" class="boxBusqueda4" name="buscar7">
  </strong></td>
  <td><strong>SITUACION JURIDICA
    <input type="text" class="boxBusqueda4" name="buscar8">
  </strong></td>
  <td><strong>ESTADO
      <input type="text" class="boxBusqueda4" name="buscar9">
  </strong>
  </td>


  <td>
	<strong>EDITAR</strong>
  </td>

<!--
  <td>
  <strong>IMP. FORM HAB REP.</strong>
  </td>

  <td>
  <strong>IMP. FICHA PUNTUACION.</strong>
  </td>
-->

  </tr>
</form>
<?php
///////////////BUSQUEDA///////////////////
if ( isset($_GET['buscar1']))
	{
	    if (!(strrpos($_SESSION['MM_Rol'],'6')== false))
      {
		    $sql_listado="Select *      FROM v_parcela  where v_parcela.estado !='' ";
			if($_GET["buscar1"]!=""){  $sql_listado=$sql_listado." and v_parcela.idparcela like '%".strtoupper(trim($_GET['buscar1']))."%'";}
			if($_GET["buscar2"]!=""){  $sql_listado=$sql_listado." and v_parcela.nombre like '%".strtoupper(trim($_GET['buscar2']))."%'";}
			//if($_GET["buscar3"]!=""){  $sql_listado=$sql_listado." and v_parcela.fecharegistro like '%".trim($_GET['buscar3'])."%'";}
			if($_GET["buscar4"]!=""){  $sql_listado=$sql_listado." and to_char(v_parcela.superficie,'FM9999999.9999')  like '%".trim($_GET['buscar4'])."%'";}
			if($_GET["buscar5"]!=""){  $sql_listado=$sql_listado." and upper(v_parcela.nombrepolitico) like '%".strtoupper(trim($_GET['buscar5']))."%'";}
			if($_GET["buscar6"]!=""){  $sql_listado=$sql_listado." and upper(v_parcela.\"TipoProp\") like '%".strtoupper(trim($_GET['buscar6']))."%'";}
			if($_GET["buscar7"]!=""){  $sql_listado=$sql_listado." and upper(v_parcela.\"Clasificacion\") like '%".strtoupper(trim($_GET['buscar7']))."%'";}
			if($_GET["buscar8"]!=""){  $sql_listado=$sql_listado." and upper(v_parcela.\"SitJur\") like '%".strtoupper(trim($_GET['buscar8']))."%'";}
			if($_GET["buscar9"]!=""){  $sql_listado=$sql_listado." and upper(v_parcela.estado) like '%".strtoupper(trim($_GET['buscar9']))."%'";}

		 }

     else
     {
			$sql_listado="Select vp.idregistro, vp.idparcela, vp.nombre, vp.superficie, vp.comp, vp.nombrepolitico, vp.".'"'."TipoProp".'"'.", vp.".'"'."SitJur".'"'.", vp.".'"'."Clasificacion".'"'.", vp.".'"'."Oficina".'"'.", vp.estado,
         vp.asesoramiento, vp.fecharegistro, vp.clasificacionprog, vp.departamento, vp.provincia, fm.idfuncionario, fm.tiporegistrador
              from v_parcela as vp inner join monitoreo.monitoreo as m on vp.idregistro = m.idregistro inner join monitoreo.funcionariomonitoreo as fm on fm.idmonitoreo = m.idmonitoreo
						  where  fm.idfuncionario = ".$_SESSION['MM_UserId'];
			if($_GET["buscar1"]!=""){  $sql_listado=$sql_listado." and vp.idparcela like '%".strtoupper(trim($_GET['buscar1']))."%'";}
			if($_GET["buscar2"]!=""){  $sql_listado=$sql_listado." and vp.nombre like '%".strtoupper(trim($_GET['buscar2']))."%'";}
			//if($_GET["buscar3"]!=""){  $sql_listado=$sql_listado." and vp.fecharegistro like '%".trim($_GET['buscar3'])."%'";}
			if($_GET["buscar4"]!=""){  $sql_listado=$sql_listado." and to_char(vp.superficie,'FM9999999.9999')  like '%".trim($_GET['buscar4'])."%'";}
			if($_GET["buscar5"]!=""){  $sql_listado=$sql_listado." and upper(vp.nombrepolitico) like '%".strtoupper(trim($_GET['buscar5']))."%'";}
			if($_GET["buscar6"]!=""){  $sql_listado=$sql_listado." and upper(vp.\"TipoProp\") like '%".strtoupper(trim($_GET['buscar6']))."%'";}
			if($_GET["buscar7"]!=""){  $sql_listado=$sql_listado." and upper(vp.\"Clasificacion\") like '%".strtoupper(trim($_GET['buscar7']))."%'";}
			if($_GET["buscar8"]!=""){  $sql_listado=$sql_listado." and upper(vp.\"SitJur\") like '%".strtoupper(trim($_GET['buscar8']))."%'";}
			if($_GET["buscar9"]!=""){  $sql_listado=$sql_listado." and upper(vp.estado) like '%".strtoupper(trim($_GET['buscar9']))."%'";}

      $sql_listado=$sql_listado."   group by vp.idregistro, vp.idparcela, vp.nombre, vp.superficie, vp.comp, vp.nombrepolitico, vp.".'"'."TipoProp".'"'.", vp.".'"'."SitJur".'"'.", vp.".'"'."Clasificacion".'"'.", vp.".'"'."Oficina".'"'.", vp.estado,
           vp.asesoramiento, vp.fecharegistro, vp.clasificacionprog, vp.departamento, vp.provincia, fm.idfuncionario, fm.tiporegistrador order by nombre";

	 	  }


	}
else
	{
	  if (!(strrpos($_SESSION['MM_Rol'],'6')== false)  ) //PARA ADMINISTRADOR DE MONITOREO
    {
		   $sql_listado="Select * FROM v_parcela order by v_parcela.nombre ";
		}

    else // PARA REGISTRADOR
    {
			$sql_listado=
              "Select vp.idregistro, vp.idparcela, vp.nombre, vp.superficie, vp.comp, vp.nombrepolitico, vp.".'"'."TipoProp".'"'.", vp.".'"'."SitJur".'"'.", vp.".'"'."Clasificacion".'"'.", vp.".'"'."Oficina".'"'.", vp.estado,
              	 vp.asesoramiento, vp.fecharegistro, vp.clasificacionprog, vp.departamento, vp.provincia, fm.idfuncionario, fm.tiporegistrador
              from v_parcela as vp inner join monitoreo.monitoreo as m on vp.idregistro = m.idregistro inner join monitoreo.funcionariomonitoreo as fm on fm.idmonitoreo = m.idmonitoreo
              where fm.idfuncionario = ".$_SESSION['MM_UserId']." and m.estado = 1
              group by vp.idregistro, vp.idparcela, vp.nombre, vp.superficie, vp.comp, vp.nombrepolitico, vp.".'"'."TipoProp".'"'.", vp.".'"'."SitJur".'"'.", vp.".'"'."Clasificacion".'"'.", vp.".'"'."Oficina".'"'.", vp.estado,
              	 vp.asesoramiento, vp.fecharegistro, vp.clasificacionprog, vp.departamento, vp.provincia, fm.idfuncionario, fm.tiporegistrador order by nombre";
	 	}

	}
    $_pagi_sql = $sql_listado;
        //cantidad de resultados por pagina (opcional, por defecto 20)
        $_pagi_cuantos = 20;
        $_pagi_nav_num_enlaces = 10;
        include("../scripts/paginator.inc.php");
	//echo $sql_listado;
 ////////////////////////////////////////////////
    // echo $sql_listado;
           $row_listado = pg_fetch_array($_pagi_result);
                    $totalRows_listado = pg_num_rows($_pagi_result);
$con=1;
 if ($totalRows_listado > 0) {
do {



?>
<tr  align="center">
  <td width="2%"><?php echo trim($con);?></td>
  <td width="10%"><?php echo trim($row_listado['idparcela']);?></td>
  <td width="20%"><?php echo trim($row_listado['nombre']);?></td>
 <!--  <td width="8%"><?php //echo trim($row_listado['fecharegistro']);?></td>  -->
  <td width="8%"><?php echo trim($row_listado['superficie']);?></td>
  <td width="15%"><?php echo trim($row_listado['nombrepolitico']);?></td>
  <td width="12%"><?php echo trim($row_listado['TipoProp']);?></td>
  <td width="10%"><?php echo trim($row_listado['Clasificacion']);?></td>
  <td width="15%"><?php echo trim($row_listado['SitJur']);?></td>
  <td width="15%"><?php echo trim($row_listado['estado']);?></td>

       <?php if(!(strrpos($_SESSION['MM_Rol'],'3')== false)){?>
    <?php }?>


  <td width="5%">
    <div style="text-align:center;">
		<form action="index.php" method="get" name="form4" style="display:inline;">
        <input  width="28" id='monitoreo' name='monitoreo' type='image' src="../images/logosdos/editar.png" value="monitoreo" alt="monitoreo">
         <input type="hidden" name="Actividad2" value="<?php echo $row_listado['clasificacionprog']; ?>">
     <input type="hidden" name="idreg" value="<?php echo $row_listado['idregistro']; ?>">
     <input type="hidden" name="Causal" value="<?php  if(strstr($row_listado['idparcela'], "R")==""){$a=0;}else{ $a=1;} echo $a; ?>">
     <input id='action'type="hidden"  name='action' value='nuevo' />
    </form>
    </div>
  </td>

<!--
  <td >
    <div style="text-align:center;">
    <form action="index.php" method="get" name="form4" style="display:inline;">
    <input id='Imprimir' name='Imprimir' type='image' width="28" src="../images/logosdos/impresora2.png" value="Imprimir" alt="Imprimir">
    <input type="hidden" name="idreg" value="<?php //echo $row_listado['idregistro']; ?>">
    <input type="hidden" name="idp5" value="<?php //echo $row_listado['idparcela']; ?>">
    <input id='action'type="hidden"  name='action' value='listar' />
    </form>
    </div>
 </td>


   <td >
    <div style="text-align:center;">
    <form action="index.php" method="get" name="form4" style="display:inline;">
    <input id='Imprimir' name='Imprimir' type='image' width="28" src="../images/logosdos/impresora2.png" value="Imprimir" alt="Imprimir">
    <input type="hidden" name="idreg" value="<?php //echo $row_listado['idregistro']; ?>">
    <input type="hidden" name="idp5" value="<?php //echo $row_listado['idparcela']; ?>">
    <input id='action'type="hidden"  name='action' value='listar' />
    </form>
    </div>
</td>
-->


  </tr>
   <?php $con=$con+1; } while ($row_listado = pg_fetch_assoc($_pagi_result));
       } else {
                        ?>
                        <tr>
                            <td colspan="13" align="center" class="celdaRojo">
                                <?php echo "No Existe Datos para esta consulta!!"; ?>  </td>
                        </tr>
                    <?php }
                    ?>
</table>


<script type="text/javascript">
 function Clearcombo(id)
{
	/*var selectObj = document.getElementById(id);
	if(selectObj!= null ){
	    var selectParentNode = selectObj.parentNode;
	    var newSelectObj = selectObj.cloneNode(false); // Make a shallow copy
	    selectParentNode.replaceChild(newSelectObj, selectObj);
	    return newSelectObj;
	}*/

        document.getElementById(id).options.length = 0;
}

function addItemCombo(nombre ,texto,valor)
{
    var objOption = new Option(texto, valor);
    document.getElementById(nombre).add(objOption);
}

function cargardatosPop1(idreg_){
        var parametros = {
            "tarea" : "monitoreopop",
            "idreg1" : idreg_
        };
            $.ajax({
                data:  parametros,
                url:   'monitoreopop_Ajax.php',
                type:  'post',
                beforeSend: function () {
                      //  $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response1) {
                   // alert('respuesta:'+response1);
                     eval(response1);

                }

    });
  // alert('res='+idreg_);

}

</script>


	<script type="text/javascript">



$(document).ready(function(){ <!-- --------> ejecuta el script jquery cuando el documento ha terminado de cargarse -->

	$(".monitoreo").click(function() { <!-- ------> al pulsar (.click) el boton 1 (#b1) -->
		                // recorremos todos los valores...

		var   aCustomers=""  ;
		 var idreg=$(this).attr("idreg");
                // alert('reg='+idreg);
                 cargardatosPop1(idreg);
		 var  causal=$(this).attr("causal");
		 	var actividad=$(this).attr("actividad");
      var nombrepredio = $(this).attr("nombre");
      var codigoparcela = $(this).attr("codigo");
		//a=$(this).parent().parent();
		//var codigoparcela= a.find('td').eq(1).html();
		// var nombrepredio= a.find('td').eq(2).html();

		$("#idreg").val(idreg);
			$("#codigo").val(codigoparcela);
			$("#nombre").val(nombrepredio);
			$("#actividad").val(actividad);
			$("#33").val("");
			$("#anho").val("");
			$("#alimentos").val("");
			$("#bosques").val("");

		$("#dialogo2").dialog({ <!--  ------> muestra la ventana  -->
			width: 590,  <!-- -------------> ancho de la ventana -->
			height: 450,<!--  -------------> altura de la ventana -->
			show: "scale", <!-- -----------> animación de la ventana al aparecer -->
			hide: "scale", <!-- -----------> animación al cerrar la ventana -->
			resizable: "false", <!-- ------> fija o redimensionable si ponemos este valor a "true" -->
			position: "top",<!--  ------> posicion de la ventana en la pantalla (left, top, right...) -->
			modal: "true", <!-- ------------> si esta en true bloquea el contenido de la web mientras la ventana esta activa (muy elegante) -->
		opacity: 90,
		 closeOnEscape: false,
          open: function(event, ui) { $(".ui-dialog-titlebar-close").hide(); },
        buttons: {
        	"Guardar": function () {
// location.href="index.php?action=nuevo&idreg="+$('#idreg').val();
 $('#form-asignacion').submit();
},
"Cerrar": function () {
$(this).dialog("close");
// location.href="index.php?action=nuevo&idreg="+$('#idreg').val();
}
}
		});

	});
	$("#b1").click(function() { <!-- ------> al pulsar (.click) el boton 1 (#b1) -->
		$("#dialogo").dialog({ <!--  ------> muestra la ventana  -->
			width: 590,  <!-- -------------> ancho de la ventana -->
			height: 400,<!--  -------------> altura de la ventana -->
			show: "scale", <!-- -----------> animación de la ventana al aparecer -->
			hide: "scale", <!-- -----------> animación al cerrar la ventana -->
			resizable: "false", <!-- ------> fija o redimensionable si ponemos este valor a "true" -->
			position: "top",<!--  ------> posicion de la ventana en la pantalla (left, top, right...) -->
			modal: "true" <!-- ------------> si esta en true bloquea el contenido de la web mientras la ventana esta activa (muy elegante) -->
		});

	});
$("#b2").click(function() {
	$("#dialogo2").dialog({
			width: 590,
			height: 350,
			show: "scale",
			hide: "scale",
			resizable: "false",
			position: "center"
		});
	});
$("#b3").click(function() {
		$("#dialogo3").dialog({
			width: 590,
			height: 350,
			show: "blind",
			hide: "shake",
			resizable: "false",
			position: "center"
		});
	});
});


	</script>



<!-- 	<div id="dialogo" class="ventana" title="Dialogo Modal">
	<p>INGRESE CODIGO DE PARCELA PARA REALIZAR MONITOREO</p>
		 <form   action="index.php" method="POST" name="login" id="form" >

                      <table width="500" border="1" bordercolorlight="#6666FF" bordercolordark="#6666CC" cellpadding="1" cellspacing="0" class="taulaA" align="center">
                        <tr height="20">
                            <td colspan="2" align="center" valign="middle" class="cabecera2">INGRESE CODIGO DE PARCELA</td>
                        </tr>
                        <tr height="40">
                            <td width="38%" align="center" valign="middle">CODIGO DE PARCELA:</td>
                            <td width="62%" align="center" valign="middle"><input name="idparcela" type="text"  size="40" autocomplete="on"/></td>
                        </tr>
                    </table>
                    <p align="center">
                        <input name="" type="submit" class="boton" value="continuar" />
                    </p>
         </form>
	</div>
 -->
		<div id="dialogo2" class="ventana" title="ASIGNACIÓN DE TÉCNICOS PARA MONITOREO">

		 <form   action="index.php" method="POST" name="form-asignacion" id="form-asignacion" class="cmxform" >

 				<div id="data" align="center">
				<div class="col plomo" style="height:340px;" ><!--
				<div align="center" ><strong>ASIGNACIÓN DE TÉCNICOS PARA MONITOREO</strong></div> -->
					<div class="left-content" >

 					<div class="line" ></div>
 					<div class="left" >
 						<div class="left-text" >C&oacute;digo Parcela:</div>
         				<div class="right-text"><input  id="codigo" name="codigo" type="text" value="" readonly=""></div>
 					</div>

 					<div class="line" ></div>
						<div class="left" >
 						<div class="left-text" >Nombre Parcela:</div>
         				<div class="right-text"><input  id="nombre" name="nombre" type="text" value="" readonly=""></div>
 					</div>
 					<div class="line" ></div>
					<div class="left" >
 						<div class="left-text" >Actividad Parcela:</div>
         				<div class="right-text"><input  id="actividad" name="actividad" type="text" value="" readonly=""></div>
 					</div>
	<div class="line-2" ></div>



 					<div class="left" >

					<?php 	echo $codigicador->getByClasificadordos(33, "required");?>
					<div></div>
 					</div>
 						<div class="line" ></div>

            <p align="center">
            <input  id="idreg" name="idreg" type="hidden" value="">
            </p>

					<div class="left" >
 						<div class="left-text" >Año Monitoreo:</div>
         				<div class="right-text">


                <?php
                $sql_suscripcion = " select r.idregistro, fecharegistro, fechasuscripcion from registro as r full join fechasregistro as fr on r.idregistro = fr.idregistro
                where r.idregistro =3061";

                $resultSuscripcion = pg_query($cn,$sql_suscripcion) ;
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



                if ($periodo == 1)
                {
                ?>
                <select name="anho" id="anho" required="required">
                  <option value=""></option>
                  <option value="1">Año 2014</option>
                  <option value="2">Año 2015</option>
                  <option value="3">Año 2016</option>
                  <option value="4">Año 2017</option>
                  <option value="5">Año 2018</option>
                </select>
                <?php
   					 		} if ($periodo==2) {
   						  ?>

         				<select name="anho" id="anho" required="required">
    							<option value=""></option>
    							<option value="3">Año 2016</option>
    							<option value="4">Año 2017</option>
    							<option value="5">Año 2018</option>
    							<option value="6">Año 2019</option>
    							<option value="7">Año 2020</option>
    						</select>
              <?php
                }
              ?>






                                </div>
                                <div></div>
                                </div>
                                <div class="line" ></div>
                                <div class="left" >
                                        <div class="left-text" >Tecnico Bosques:</div>
                                <div class="right-text">

         			<select name="bosques" id="bosques" required="required">
                                                <option value=""></option>
                                                <?php 	$bosques= $gestorpersona->getDataFuncionarioTipoActivos(138);

                                                        while ($datofun= pg_fetch_array($bosques)) {
                                                                echo "<option value='".$datofun['idfuncionario']."'>".$datofun['nombrecompleto']."</option>";

                                                        }
                                                ?>
						</select>
						 </div>
						 <div></div>
 					</div>
					<div class="line" ></div>
					<div class="left" >
 						<div class="left-text" >Tecnico Alimentos:</div>
         				<div class="right-text">

         			<select name="alimentos" id="alimentos" required="required">
							<option value=""></option>
							<?php 	$alimentos= $gestorpersona->getDataFuncionarioTipoActivosAlimentos(137,252);

								while ($datofun1= pg_fetch_array($alimentos)) {
									echo "<option value='".$datofun1['idfuncionario']."'>".$datofun1['nombrecompleto']."</option>";

								}
							?>
						</select>
         				</div>
         			<div></div>
 					</div>
 					<div class="line" ></div>
					<div class="left" >

					<?php 	echo $codigicador->getByClasificador(20, "required");?>
					<div></div>
 					</div>

 					<div class="line"></div>

      				<div class="left" >
 						<div class="left-text" >Edicion Monitoreo:</div>
					<div class="right-text">

        			<input type="radio" name="ct_edi_option" value="1" id="ct_edi_option_1" required/>

        			<label>Activado</label>
        			 &nbsp;&nbsp;
        			<input type="radio" name="ct_edi_option"  value="0" id="ct_edi_option_2" required/>
        			<label>Desactivado</label>
    				</div>
 					</div>

					</div>
				</div>

</div>

                </form>

		</div>

</div>
<div id="nav">
   <?php  echo "<p>" . $_pagi_navegacion . "</p>"; ?>
   </div>
</body>
</html>
