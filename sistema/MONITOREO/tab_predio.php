<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/sistema/config/config.php';
session_start();
include "../cabecera.php";
if(isset($_GET['idreg'])){
    $idreg=$_GET['idreg'];
    $_SESSION['idreg']=$idreg;
}
if(isset($_GET['Actividad2'])){
    $Actividad=$_GET['Actividad2'];
    $_SESSION['Actividad']=$Actividad;  
}
if(isset($_GET['Causal']) && !isset($_SESSION['Causal']) ){
    $Causal=$_GET['Causal'];
    $_SESSION['Causal']=$Causal;
}
include "page_prediosM.php";
 // var_dump( $_SESSION);
 // print_r($_SESSION);
?>
<HTML>
<HEAD><TITLE>UCAB - PPARB</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<LINK href="../css/mdryt.css" type=text/css rel=stylesheet>
<link rel="stylesheet" type="text/css" href="../css/button.css"/>
<script language="JavaScript" src="../scripts/funciones.js"></script>
<link rel="stylesheet" href="../css/jquery-ui.css" />
<script src="../libraries/jquery-1.10.3//jquery-1.10.2.min.js"></script>
<script src="../libraries/jquery-1.10.3/jquery-1.10.3.ui.min.js"></script>
  <link rel="stylesheet" media="screen" href="../css/validate/screen.css">
<script src="../libraries/jquery-validate-1.13.1/jquery-validate-1.13.1.js"></script>
 <script type="text/javascript" src="<?php ECHO WEBPATH; ?>/scripts/monitoreo.form.js"></script>
 <link rel="stylesheet" href="<?php ECHO WEBPATH; ?>/libraries/alertify/themes/alertify.core.css" />
 <link rel="stylesheet" href="<?php ECHO WEBPATH; ?>/libraries/alertify/themes/alertify.default.css" id="toggleCSS" />
 <script src="<?php ECHO WEBPATH; ?>/libraries/alertify/lib/alertify.min.js"></script>
<script language="JavaScript"> 
function lanzarSubmenu(campo)
	{window.open("personas.php?c=" + campo + "","Elegir Personas","width=550,height=500,scrollbars=yes,toolbar=no,status=no");}
function lanzarSubmenu1()
	{window.open("personas1.php","Elegir Beneficiarios","width=550,height=500,scrollbars=yes,toolbar=no,status=no");}  
function lanzarSubmenu3()
	{window.open("personas2.php","Elegir Beneficiarios","width=550,height=500,scrollbars=yes,toolbar=no,status=no");}  
function habilitardocpresentado(seleccion,identificador) {  //TPFP =1 superficie es tpfp 
	try {  
		  if (seleccion.checked){
			   document.getElementById(String(identificador)).disabled=false;
			  // alert(document.getElementById(String(identificador)).value);
		  }else{ document.getElementById(String(identificador)).disabled=true;  }
		}catch(e) {   
			alert(e);   
		}   
	}
function HabilitarComunidad(combo){
		  try {
				
				var valor=combo.options[combo.selectedIndex].value;
				if(valor==38){ 
				      document.getElementById("TAfiliados").style.visibility = 'visible';
				  }
				else{
				   	  document.getElementById("TAfiliados").style.visibility = 'hidden';
				 
				}
			   }catch(e) {   
				alert(e);   
			} 
		
		}
   
    
</script> 

<script>
  function guardar(){
    var e = true;
    $('#guardarstep').hide();

    if(e){
      // show that something is loading
      $('#form-ig').validate ();
      $("#loading-div-background").show();
      var datastep = {"step":"ig","action": "guardar-ig"};
      data = $('#form-ig').serialize() + "&" + $.param(datastep);

          
      $.post('./response-monitoreo.php',data, function(response){
           //done() es ejecutada cuándo se recibe la respuesta del servidor. response es el objeto JSON recibido
           $("#loading-div-background").hide();
           $('#guardarstep').show();
           if( response.success ) {
                          //alert(response.success);
                               // var output = "<h2>" + response.data.message + "</h2>";
                               alertify.success('Success:' + response.data.message);
                               //$('#ct_dgp_codpredio').val(response.data.dato[0].f_predio);
                                //  alert(response.data.dato[0].f_predio);

                                $("#ct_dgp_codpredio" ).val(response.data.dato[0].id);
                                //Actualizamos el HTML del elemento con id="#response-container"
                              //  $("#response-container").html(output);

                          } else {
                                //response.success no es true
                                 alertify.error('Error :' + response.data.message);
                               // $("#response-container").html('No ha habido suerte: ' + response.data.message);
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
    var validator = $("#form-ig").bind("invalid-form.validate", function() {
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

<style type="text/css">
#principal
	{ 	position:relative; 
		margin:10px auto; 
	} 
#derecha
	{   position:relative; 
		color:#FFFFFF; 
		z-index:200;
		top:300;
		width:250; 
		background-color:#000000; 
	} 
</style>
</HEAD>
<BODY>
<div align="center">
<form action="index.php" method="POST" id="form-ig" name="form-ig"  autocomplete="off" >
<b class="texto"><big>I. INFORMACION GENERAL</big></b><br>
<table width="90%" border="0" class='taulaA' align="center" cellspacing="0">
<tr >
  <td height="14" colspan="4" id='blau'><span class="taulaH">1. Datos del Predio</span></td>
</tr>
<tr>
  <td colspan="2" rowspan="2" id='blau'>
  <table width="102%" cellspacing="0"   border="0">
    <tr class="taulaA">
      <td width="28%" height="23" align="right" id='blau3'>Departamento(*):</td>
      <td colspan="3"  align="left" id='blau3'><select name="Departamento" class="combos"  id="Departamento" <?php if((isset($_SESSION['cod_parcela']) && $_SESSION['cod_parcela'] != "")){ echo 'disabled';} ?> >
      <option value=0>ELEGIR ...</option>
          <?php 

		  $sql_politico ="Select * From \"v_politico\" Order by \"comp\"";
		  $politico = pg_query($cn,$sql_politico) ;
		  $row_politico = pg_fetch_array ($politico);
		  
		do {   ?>
          <option value="<?php echo $row_politico['cod']?>"
                <?php  if(isset($_SESSION['datos_predio']['Departamento']) &&$_SESSION['datos_predio']['Departamento']== $row_politico['cod']){
											echo " selected"; 
					    }elseif(isset($_SESSION['Departamento']) &&$_SESSION['Departamento']== $row_politico['cod']){
											echo " selected"; 
					    }elseif(isset($row_predio['idpolitico']) && $row_predio['idpolitico']== $row_politico['cod']){	echo " selected"; $Departamento=$row_predio['idpolitico'];   $_SESSION['Departamento']=$Departamento;} ?>
                 > <?php echo $row_politico['comp']?></option>
          <?php } while ($row_politico = pg_fetch_assoc($politico));	?>
      </select>
        <input type="hidden" name="estado" id="estado" value="<?php echo isset($_SESSION['datos_predio']['estado']) ? htmlspecialchars($_SESSION['datos_predio']['estado']) : $row_predio['estado']; ?>"></td>
    </tr>
    <tr class="taulaA">
      <td align="right" id='blau3'>Nombre del Predio(*):</td>
      <td colspan="3"  align="left" id='blau3'><input name="NombrePredio"  type="text" class="boxBusqueda" disabled="disabled" id="NombrePredio" value="<?php echo isset($_SESSION['datos_predio']['NombrePredio']) ? htmlspecialchars($_SESSION['datos_predio']['NombrePredio']) : trim($row_predio['nombre']) ?>"></td>
    </tr>
    <tr class="taulaA">
      <td align="right" id='blau3'>Sup. Total del Predio (ha)(*):</td>
      <td colspan="3"  align="left" id='blau3'><input name="Superficie" type="text" class="boxBusqueda2"  disabled="disabled" id="Superficie"  onFocus="siguienteCampo ='FechaFin'" maxlength="10" value="<?php echo isset($_SESSION['datos_predio']['Superficie']) ? htmlspecialchars($_SESSION['datos_predio']['Superficie']) : $row_predio['superficie'];?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" ></td>
    </tr>
    <tr class="taulaA" id='blau3'>
      <td align="right" id='blau3'>Tipo de Propiedad (*):</td>
      <td width="17%"  align="left" id='blau3'><select name="TipoPredio" class="combos"  disabled="disabled" id="TipoPredio" onChange="<?php echo 'HabilitarComunidad(this)'; ?>">
          <option value=0>ELEGIR ...</option>
          <?php 
		$sql_clasificador ="Select * From codificadores Where idclasificador=1 Order by nombrecodificador";
		$clasificador = pg_query($cn,$sql_clasificador) ;
		$row_clasificador = pg_fetch_array ($clasificador);
		
		do {   ?>
          <option value="<?php echo $row_clasificador['idcodificadores']?>"
                <?php  if(isset($_SESSION['datos_predio']['TipoPredio']) && $_SESSION['datos_predio']['TipoPredio']== $row_clasificador['idcodificadores']){
											echo " selected";
					    }elseif(isset($row_predio['idtipoprop']) && $row_predio['idtipoprop']== $row_clasificador['idcodificadores']){	echo " selected";} ?>
                 > <?php echo $row_clasificador['nombrecodificador']?></option>
          <?php } while ($row_clasificador = pg_fetch_assoc($clasificador));	?>
      </select></td>
      <td width="23%" align="right">Situaci&oacute;n Jur&iacute;dica (*):</td>
      <td width="32%" align="left"><select name="Situacion" class="combos"  disabled="disabled"  id="Situacion"  >
          <option value=0>ELEGIR ...</option>
          <?php 
		$sql_clasificador ="Select * From codificadores Where idclasificador=2 Order by nombrecodificador";
		$clasificador = pg_query($cn,$sql_clasificador) ;
		$row_clasificador = pg_fetch_array ($clasificador);
		
		do {   ?>
          <option value="<?php echo $row_clasificador['idcodificadores']?>"
                <?php  if(isset($_SESSION['datos_predio']['Situacion']) && $_SESSION['datos_predio']['Situacion']== $row_clasificador['idcodificadores']){
											echo " selected";
					    }elseif(isset($row_predio['idsituacionjuridica']) && $row_predio['idsituacionjuridica']== $row_clasificador['idcodificadores']){	echo " selected";} ?>
                 > <?php echo $row_clasificador['nombrecodificador']?></option>
          <?php } while ($row_clasificador = pg_fetch_assoc($clasificador));	?>
      </select></td>
    </tr>
    <tr class="taulaA"  id='blau3'>
      <td align="right" id='blau3'>Actividad del Predio (*):</td>
      <td align="left" id='blau3'><select name="Actividad" class="combos"  disabled="disabled" id="Actividad">
          <option value=0>ELEGIR ...</option>
          <?php 
		$sql_clasificador ="Select * From codificadores Where idclasificador=8 Order by nombrecodificador";
		$clasificador = pg_query($cn,$sql_clasificador) ;
		$row_clasificador = pg_fetch_array ($clasificador);
		$Actividad=0;
		 do { ?>
          <option value="<?php echo $row_clasificador['idcodificadores']?>"
                <?php  if(isset($_SESSION['datos_predio']['Actividad']) && $_SESSION['datos_predio']['Actividad']== $row_clasificador['idcodificadores']){ $Actividad=$row_clasificador['nombrecodificador']; echo " selected";
					    }elseif(isset($row_predio['idclasificacion']) && $row_predio['idclasificacion']== $row_clasificador['idcodificadores']){ $Actividad=$row_clasificador['nombrecodificador'];	echo " selected";} ?>
                 > <?php echo $row_clasificador['nombrecodificador']?></option>
          <?php } while ($row_clasificador = pg_fetch_assoc($clasificador));	$_SESSION['Actividad']=$Actividad;?>
      </select></td>
      <td align="left"></td>
      <td align="left"></td>
    </tr>
    <tr class="taulaA">
      <td align="right" id="blau11"></td>
      <td align="left" id="blau11"></td>
      <td></td>
      <td></td>
    </tr>
    <tr class="taulaA">
      <td align="right" id="blau7">&nbsp;</td>
      <td colspan="3" align="left" id="blau7">&nbsp;</td>
    </tr>
    <tr class="taulaA"  id='blau3'>
      <td align="right" id="blau3">Asesoramiento (*):</td>
      <td align="left" id="blau3"><select name="Asesoramiento" class="combos"  disabled="disabled" id="Asesoramiento">
          <option value=0>ELEGIR ...</option>
          <?php 
		$sql_clasificador ="Select * From codificadores Where idclasificador=16 Order by nombrecodificador";
		$clasificador = pg_query($cn,$sql_clasificador) ;
		$row_clasificador = pg_fetch_array ($clasificador);
		
		do {   ?>
          <option value="<?php echo $row_clasificador['idcodificadores']?>"
                <?php  if(isset($_SESSION['datos_predio']['Asesoramiento']) && $_SESSION['datos_predio']['Asesoramiento']== $row_clasificador['idcodificadores']){
											echo " selected";
					    }elseif(isset($row_predio['idasesoramiento']) && $row_predio['idasesoramiento']== $row_clasificador['idcodificadores']){	echo " selected";} ?>
                 > <?php echo $row_clasificador['nombrecodificador']?></option>
          <?php } while ($row_clasificador = pg_fetch_assoc($clasificador));	?>
      </select></td>
      <td align="right" id='blau3'>Actividad Predio Programa(*):</td>
      <td  align="left" id='blau3'><select name="Actividad2" class="combos"  disabled="disabled" id="Actividad2">
        <option value=0>ELEGIR ...</option>
        <?php 
		$sql_clasificador ="Select * From codificadores Where idclasificador=8 Order by nombrecodificador";
		$clasificador = pg_query($cn,$sql_clasificador) ;
		$row_clasificador = pg_fetch_array ($clasificador);
		$Actividad=0;
		 do { ?>
        <option value="<?php echo $row_clasificador['idcodificadores']?>"
                <?php  if(isset($_SESSION['datos_predio']['Actividad2']) && $_SESSION['datos_predio']['Actividad2']== $row_clasificador['idcodificadores']){ $Actividad=$row_clasificador['nombrecodificador']; echo " selected";
					    }elseif(isset($row_predio['idclasificacionprog']) && $row_predio['idclasificacionprog']== $row_clasificador['idcodificadores']){ $Actividad=$row_clasificador['nombrecodificador'];	echo " selected";} ?>
                 > <?php echo $row_clasificador['nombrecodificador']?></option>
        <?php } while ($row_clasificador = pg_fetch_assoc($clasificador));	$_SESSION['Actividad']=$Actividad;?>
      </select></td>
    </tr>
    <tr class="taulaA" >
      <td align="right" id="blau3">Sector Productivo(*):</td>
      <td align="left" id="blau3"><select name="SectorProductivo" class="combos"  disabled="disabled" id="SectorProductivo">
          <option value=0>ELEGIR ...</option>
          <?php 
		$sql_clasificador ="Select * From codificadores Where idclasificador=25 Order by nombrecodificador";
		$clasificador = pg_query($cn,$sql_clasificador) ;
		$row_clasificador = pg_fetch_array ($clasificador);
		
		do {   ?>
          <option value="<?php echo $row_clasificador['idcodificadores']?>"
                <?php  if(isset($_SESSION['datos_predio']['SectorProductivo']) && $_SESSION['datos_predio']['SectorProductivo']== $row_clasificador['idcodificadores']){
											echo " selected";
					    }elseif(isset($row_predio['idsectorproductivo']) && $row_predio['idsectorproductivo']== $row_clasificador['idcodificadores']){	echo " selected";} ?>
                 > <?php echo $row_clasificador['nombrecodificador']?></option>
          <?php } while ($row_clasificador = pg_fetch_assoc($clasificador));	?>
      </select></td>
      <td id="blau3" align="right">Sector Social (*):</td>
      <td><select name="SectorSocial" class="combos"  disabled="disabled" id="SectorSocial">
          <option value=0>ELEGIR ...</option>
          <?php 
		$sql_clasificador ="Select * From codificadores Where idclasificador=26 Order by nombrecodificador";
		$clasificador = pg_query($cn,$sql_clasificador) ;
		$row_clasificador = pg_fetch_array ($clasificador);
		
		do {   ?>
          <option value="<?php echo $row_clasificador['idcodificadores']?>"
                <?php  if(isset($_SESSION['datos_predio']['SectorSocial']) && $_SESSION['datos_predio']['SectorSocial']== $row_clasificador['idcodificadores']){
											echo " selected";
					    }elseif(isset($row_predio['idsectorsocial']) && $row_predio['idsectorsocial']== $row_clasificador['idcodificadores']){	echo " selected";} ?>
                 > <?php echo $row_clasificador['nombrecodificador']?></option>
          <?php } while ($row_clasificador = pg_fetch_assoc($clasificador));	?>
      </select></td>
    </tr>
  </table>
</td>
 <td align="right" id='blau'>C&oacute;digo Parcela:</td>
 <td width="36%" id='blau'>
 <!-- <input type="text" name="Codigop"  class="boxRojo"  disabled="disabled"  id="Codigop" value="<?php if(isset($_SESSION['cod_parcela']) && $_SESSION['cod_parcela']!=""){echo $_SESSION['cod_parcela'];}elseif(isset($_SESSION['cod_par'])){ echo '';} ?>" maxlength="10"> -->
 <input id="Codigo" name="Codigo" class="boxRojo"  readonly="true" type="text" value="<?php echo @$_SESSION['cod_parcela'] ?>">
 </td>
</tr>
<tr>
  <td align="right" id='blau'><p>Doc. Presentados(*):</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p></td>
  <td align="left" id='blau'><table width="97%" class='taulaA' border="0" cellspacing="0" cellpadding="0">
    <?php 
	//listado de todos los doc
	$sql_documento = "Select * From codificadores Where idclasificador=3 Order by nombrecodificador";
    $documento = pg_query($cn,$sql_documento) ;
	$row_documento = pg_fetch_array ($documento);

do{

	  $valor=$row_documento['idcodificadores'];
	  if(isset($_SESSION['cod_parcela']) ){
	    //busca los doc q tiene la parcelas
	    $sql_docpresentado = "SELECT * FROM docpresentados as dc, codificadores as c 
					   			WHERE  c.idcodificadores=dc.idtipodedocumento and dc.idparcela='".$_SESSION['cod_parcela']."' and dc.idtipodedocumento=".$valor;
								
		$docpresentado = pg_query($cn,$sql_docpresentado);
		$row_docpresentado = pg_fetch_array ($docpresentado);
		$totalRows_docpresentado = pg_num_rows($docpresentado);
	    }
    ?>
    <tr  id='blau'>
      <td width="50%"><?php echo $row_documento['nombrecodificador'];?></td>
      <td width="50%"> <input type="checkbox" disabled onChange="habilitardocpresentado(this,'<?php echo $row_documento['idcodificadores'];?>')" <?php if(isset($_SESSION['datos_predio']["chk".$row_documento['idcodificadores']])){echo 'checked';}elseif(isset($totalRows_docpresentado) && $row_docpresentado['idtipodedocumento']==$row_documento['idcodificadores']){echo 'checked';}?>  name="<?php echo "chk".$row_documento['idcodificadores'];?>"/>
          <input type="text" disabled name="<?php echo $row_documento['idcodificadores'];?>" class="boxBusqueda3" <?php if( !(isset($_SESSION['datos_predio']["chk".$row_documento['idcodificadores']])) ) { if(isset($totalRows_docpresentado) && $row_docpresentado['idtipodedocumento']!=$row_documento['idcodificadores']){echo 'disabled';}elseif(!isset($totalRows_docpresentado) ){echo 'disabled';}}?>  id="<?php echo $row_documento['idcodificadores'];?>" value="<?php if(isset($_SESSION['datos_predio'][$valor])) { echo $_SESSION['datos_predio'][$valor];} elseif( isset($row_docpresentado['idtipodedocumento']) && $row_docpresentado['idtipodedocumento']==$row_documento['idcodificadores'] ){ echo $row_docpresentado['observaciones'];} ?>" ></td>
    </tr>
    <?php  } while ($row_documento = pg_fetch_assoc($documento));?>
  </table></td>
  </tr>


<tr><td colspan="4"><hr></td></tr>
<tr >
  <td colspan="3" id='blau'><span class="taulaH">2. Datos del Representante Legal y/o Propietario</span></td>
<td  id='blau'><span class="borderLblau">Agregar Representante <input type='image' onClick="lanzarSubmenu('ReprLegal');return false;" src='../images/reg_adm.gif' alt='Agregar Persona' border='1'></span></td>
</tr>
<tr >
<td width="15%" align="right" id='blau'>Nombre Completo (*):</td>
<td width="37%"><input name="ReprLegal" type="text" class="boxBusqueda" id="ReprLegal" value="<?php echo isset($_SESSION['datos_predio']['ReprLegal']) ? htmlspecialchars($_SESSION['datos_predio']['ReprLegal']) : trim($nombrerepresentate);?>" readonly></td>
<td width="12%" align="right" id='blau'>Direcci&oacute;n Domicilio:</td>
<td><input name="Direccion" type="text" class="boxBusqueda" id="Direccion" value="<?php echo isset($_SESSION['datos_predio']['Direccion']) ? htmlspecialchars($_SESSION['datos_predio']['Direccion']) : trim($row_representante['direcciondom']);?>" readonly>
  <input type="hidden" name="IdRepLegal" id="IdRepLegal" value="<?php echo isset($_SESSION['datos_predio']['IdRepLegal']) ? htmlspecialchars($_SESSION['datos_predio']['IdRepLegal']) : trim($row_representante['idpersona']) ?>"></td>
</tr>
 
<tr >
<td align="right" id="blau">Correo Electr&oacute;nico Para Notificacion:</td>
<td><input name="Email" type="text" class="boxBusqueda3m" id="Email" value="<?php echo isset($_SESSION['datos_predio']['Email']) ? htmlspecialchars($_SESSION['datos_predio']['Email']) : trim($row_representante['email']);?>" readonly></td>
<td id="blau" align="right">Tel&eacute;fono y/o celular:</td>
<td><input name="Telefono" type="text" class="boxBusqueda2" id="Telefono" value="<?php echo isset($_SESSION['datos_predio']['Telefono']) ? htmlspecialchars($_SESSION['datos_predio']['Telefono']) : trim($row_representante['telefono']);?>" readonly></td>
</tr>
<tr class="TituloCajaNegocios">
<td align="right" id="blau">No Testimonio Poder:</td>
<td><input name="NumPoder" type="text" class="boxBusqueda2" id="NumPoder" value="<?php echo isset($_SESSION['datos_predio']['NumPoder']) ? htmlspecialchars($_SESSION['datos_predio']['NumPoder']) : trim($row_representante['numdocpoder']);?>" maxlength="15"></td>
<td id="blau" align="right">Direcci&oacute;n para notificaci&oacute;n (*):</td>
<td><input name="Notificacion" type="text" class="boxBusqueda" id="Notificacion" value="<?php echo isset($_SESSION['datos_predio']['Notificacion']) ? htmlspecialchars($_SESSION['datos_predio']['Notificacion']) : trim($row_representante['direccionnotificacion']);?>"></td>
</tr>
<tr><td colspan="4"><hr></td></tr>
<tr >
  <td id='blau' colspan="4"><span class="taulaH">3. Datos de los Beneficiarios</span></td></tr>
<tr>
<td align="right" id='blau'>
<span class="borderLBRgris">Agregar Beneficiarios
<input type='image' src='../images/reg_adm.gif' alt='Beneficiarios' border='1' onClick='lanzarSubmenu1();return false;'></span></td>
<td colspan="3" rowspan="2">
<!-- iframe src="Beneficiarios.php" scrolling="auto" frameborder="0" width="100%" height="150" id="marco"></iframe -->

<table width="100%" border="0">
  <tr>
    <td width="58%">
    <table width="100%" id="benef" border="1" class="taulaA">
      <tr class="cabecera2" align="center">
        <td width="4%"></td>
        <td width="40%">NOMBRE</td>
        <td width="17%">CI</td>
        <td width="39%">TIPO</td>
      </tr>
      <?php  
		 $num=$totalRows_beneficiarios;
		
		 for ($i = 1; $i <=$num ; $i++) { 
		 if(isset($row_beneficiarios['idpersona'])){
   ?>
      <tr >
        <td height="24"><input type="checkbox" name="chk"/></td>
        <td><input name="<?php echo 'nombreben'.$i; ?>" type="text" readonly class="boxBusqueda"  value="<?php echo isset($_SESSION['datos_predio']['nombreben'.$i]) ? htmlspecialchars($_SESSION['datos_predio']['nombreben'.$i]) : trim($row_beneficiarios['nombre1'])." ".trim($row_beneficiarios['nombre2'])." ".trim($row_beneficiarios['apellidopat'])." ".trim($row_beneficiarios['apellidomat']) ;?> "></td>
        <td><input name="<?php echo 'noidentidad'.$i; ?>" type="text" class="boxBusqueda2" readonly value="<?php echo isset($_SESSION['datos_predio']['noidentidad'.$i]) ? htmlspecialchars($_SESSION['datos_predio']['noidentidad'.$i]) : trim($row_beneficiarios['noidentidad']) ?>"></td>
        <td><input name="<?php echo 'nombrecodificador'.$i; ?>" type="text" class="boxBusqueda2" readonly value="<?php echo isset($_SESSION['datos_predio']['nombrecodificador'.$i]) ? htmlspecialchars($_SESSION['datos_predio']['nombrecodificador'.$i]) : trim($row_beneficiarios['nombrecodificador']) ?>">
          <input type="hidden" name="<?php echo 'idp'.$i; ?>" id="<?php echo 'idp'.$i; ?>" value="<?php echo isset($_SESSION['datos_predio']['idp'.$i]) ? htmlspecialchars($_SESSION['datos_predio']['idp'.$i]) : trim($row_beneficiarios['idpersona']) ?>"></td>
      </tr> 
      <?php if(!isset($_SESSION['datos_predio']['conteo']) && isset($row_beneficiarios)){$row_beneficiarios = pg_fetch_assoc($beneficiarios);}
		 }} ?>
    </table>
      <input type="hidden" name="conteo" id="conteo" value="<?php echo isset($_SESSION['datos_predio']['conteo']) ? htmlspecialchars($_SESSION['datos_predio']['conteo']) : $totalRows_beneficiarios ?>"><br class="borderLBRgris"> 
      <span class="borderLBRgris">Nota: Si  se Registra a Una Comunidad y/o empresa en Beneficiario Registrar a la Comunidad y/o Empresa como Persona Jurídica. En el caso de Comunidad en el punto 3.1 Registrar a la Lista de Miembros de la Comunidad etc.</span></td>
    <td width="42%">
   
   <table width="100%" border="0" class='taulaA' cellspacing="0" cellpadding="0" id="TAfiliados" <?php  if((isset($_SESSION['datos_predio']['TipoPredio']) &&  ($_SESSION['datos_predio']['TipoPredio']==38 || $_SESSION['datos_predio']['TipoPredio']==35 )) ||(isset($row_predio['idtipoprop']) &&  ($row_predio['idtipoprop']==38 || $row_predio['idtipoprop']==35))){echo 'style="visibility:visible"';}else{echo 'style="visibility:hidden"';} ?> >
            
	
        <tr class="TituloCajaNegocios">
          <td colspan="2" id='blau6'><span class="taulaH">3.1 Lista de los Miembros de la Comunidad </span></td>
         </tr>
        
        <tr class="TituloCajaNegocios">
        <td width="16%" align="right" id='blau5'><span class="borderLBRgris">
          <input type='image' src='../images/reg_adm.gif' alt='Afiliados' border='1' onClick='lanzarSubmenu3();return false;'>
        </span></td>
        <td width="84%" rowspan="2"><table width="100%" id="TComunidad"  border="1" class="taulaA">
          <tr class="cabecera2" align="center">
            <td width="4%"></td>
            <td width="55%">NOMBRE</td>
          </tr>
          <?php  
		if(!isset($_SESSION['datos_predio']['conteoA'])){
		 $sql_afiliados = "Select * FROM parcelabeneficiario as pb,persona LEFT JOIN codificadores ON codificadores.idcodificadores=persona.idtipopersona WHERE  persona.idpersona=pb.idpersona and persona.idpersona NOT IN (Select idpersona FROM funcionario) AND pb.poblador=1  AND pb.idparcela='".$_SESSION['cod_parcela']."' Order by nombre1,apellidopat";
		$afiliados = pg_query($cn,$sql_afiliados);
		$row_afiliados = pg_fetch_array ($afiliados);
		$totalRows_afiliados = pg_num_rows($afiliados);
		}
		
		 if(isset($_SESSION['datos_predio']['conteoA']))
		 {$num=$_SESSION['datos_predio']['conteoA'];}
		 else
		 {$num=$totalRows_afiliados;}
		
		 for ($i = 1; $i <=$num ; $i++) { 
		  if(isset($_SESSION['datos_predio']['idpA'.$i])  || isset($row_afiliados['idpersona'])){

   ?>
          <tr >
            <td><input type="checkbox" name="chk3"/></td>
            <td><input name="<?php echo 'nombreafiliado'.$i; ?>" id="<?php echo 'nombreafiliado'.$i; ?>" type="text" readonly class="boxBusqueda"  value="<?php echo  isset($_SESSION['datos_predio']['nombreafiliado'.$i]) ? htmlspecialchars($_SESSION['datos_predio']['nombreafiliado'.$i]) : trim($row_afiliados['nombre1'])." ".trim($row_afiliados['nombre2'])." ".trim($row_afiliados['apellidopat'])." ".trim($row_afiliados['apellidomat']) ;?> ">
                <input type="hidden" name="<?php echo 'idpA'.$i; ?>" id="<?php echo 'idpA'.$i; ?>" value="<?php echo isset($_SESSION['datos_predio']['idpA'.$i]) ? htmlspecialchars($_SESSION['datos_predio']['idpA'.$i]) : trim($row_afiliados['idpersona']) ?>">            </td>
            <?php if(!isset($_SESSION['datos_predio']['conteoA']) && isset($row_afiliados)){$row_afiliados = pg_fetch_assoc($afiliados);}
		    }
		 }   ?>
          </tr>
        </table>
          <input type="hidden" name="conteoA" id="conteoA" value="<?php echo isset($_SESSION['datos_predio']['conteoA']) ? htmlspecialchars($_SESSION['datos_predio']['conteoA']) : $totalRows_afiliados ?>"></td>
        </tr>
      <tr class="TituloCajaNegocios">
        <td align="right" id='blau4'><input name="submit" type="button" class='cabecera2' value="Eliminar" onClick="deleteRow('TComunidad')"></td>
        </tr>
    </table>    </td>
  </tr>
</table></td>
</tr>
<tr>
<td align="right" id='blau'><p>
  <input name="submit3" type="button" class='cabecera2' value="Eliminar Beneficiarios" onClick="deleteRow('benef')">
</p>  </td>
</tr> 
<tr><td colspan="4"><hr></td></tr>

<tr>
  <td id='blau' colspan="4">

  <table width="100%" border="0">
    <tr>
      <td width="39%" rowspan="2"><span class="taulaH">4. Informacion General de Monitoreo RCIA: </span>
        <table width="98%"  border="0" cellpadding="0"  cellspacing="0" class='taulaA'>
        <!--   <tr>
            <td width="31%" height="45"  id="blau10">Reg. Agente Auxiliar: </td>
            <td width="69%" ><select name="Auxiliar" class="combos" id="Auxiliar">
                <option value=0>ELEGIR ...</option>
                <?php 
	$sql_auxiliar ="Select * from agenteauxiliar ORDER BY numregprof";
	$auxiliar = pg_query($cn,$sql_auxiliar) ;
	$row_auxiliar = pg_fetch_array ($auxiliar);
	
	do {   ?>
                <option value="<?php echo $row_auxiliar['numregprof']?>"
                <?php  if(isset($_SESSION['datos_predio']['Auxiliar']) && trim($_SESSION['datos_predio']['Auxiliar'])== trim($row_auxiliar['numregprof'])){
											echo " selected";
					    }?>
                 > <?php echo $row_auxiliar['numregprof']." ".$row_auxiliar['nombreaa'] ?></option>
                <?php }while ($row_auxiliar = pg_fetch_assoc($auxiliar));	?>
            </select></td>
          </tr> -->
          <tr>
            <td height="25" id='blau10' >Resp. T&eacute;cnico ABT (*):</td>
            <td ><select name="RespABT" class="combos"  disabled="disabled" id="RespABT">
                <option value=0>ELEGIR ...</option>
                <?php 
	$sql_funcionario ="Select idfuncionario,nombre1,apellidopat From persona INNER JOIN funcionario ON persona.idpersona=funcionario.idpersona INNER JOIN codificadores ON funcionario.cargo=codificadores.idcodificadores Where idcodificadores=138 or idcodificadores=183  ORDER BY nombre1";
	$funcionario = pg_query($cn,$sql_funcionario) ;
	$row_funcionario = pg_fetch_array ($funcionario);
	
	do {   ?>
                <option value="<?php echo $row_funcionario['idfuncionario']?>"
                <?php  if(isset($_SESSION['datos_predio']['RespABT']) && $_SESSION['datos_predio']['RespABT']== $row_funcionario['idfuncionario']){
											echo " selected";
					    }elseif(isset($row_funcabt['idfuncionario']) && $row_funcabt['idfuncionario']== $row_funcionario['idfuncionario']){	echo " selected";} ?>
                 > <?php echo $row_funcionario['nombre1']." ".$row_funcionario['apellidopat'] ?></option>
                <?php } while ($row_funcionario = pg_fetch_assoc($funcionario));	?>
            </select></td>
          </tr>
          <tr>
            <td height="25"  id='blau10'>Resp. T&eacute;cnico VDRA (*):</td>
            <td ><select name="RespVDRA" class="combos"  disabled="disabled"  id="RespVDRA">
                <option value=0>ELEGIR ...</option>
                <?php 
	$sql_funcionario ="Select idfuncionario,nombre1,apellidopat From persona INNER JOIN funcionario ON persona.idpersona=funcionario.idpersona INNER JOIN codificadores ON funcionario.cargo=codificadores.idcodificadores Where idcodificadores=137 ORDER BY nombre1";
	$funcionario = pg_query($cn,$sql_funcionario) ;
	$row_funcionario = pg_fetch_array ($funcionario);
	
	do {   ?>
                <option value="<?php echo $row_funcionario['idfuncionario']?>"
                <?php  if(isset($_SESSION['datos_predio']['RespVDRA']) && $_SESSION['datos_predio']['RespVDRA']== $row_funcionario['idfuncionario']){
											echo " selected";
					    }elseif(isset($row_funcvdra['idfuncionario']) && $row_funcvdra['idfuncionario']== $row_funcionario['idfuncionario']){	echo " selected";} ?>
                 > <?php echo $row_funcionario['nombre1']." ".$row_funcionario['apellidopat'] ?></option>
                <?php } while ($row_funcionario = pg_fetch_assoc($funcionario));	?>
            </select></td>
          </tr>
          <tr>
            <td height="25"  id='blau10'>Oficina de Registro(*):</td>
            <td >
            <select name="Mofrcia" class="combos" id="Mofrcia">
                <option value=0>ELEGIR ...</option>
                <?php 
	               $sql_clasificador ="Select * From codificadores Where idclasificador=20 Order by nombrecodificador";
	               $clasificador = pg_query($cn,$sql_clasificador) ;
	               $row_clasificador = pg_fetch_array ($clasificador);
	
	               do {   ?>
                <option value="<?php echo $row_clasificador['idcodificadores']?>"
                <?php if(  isset( $_SESSION['ofrcia']) && $_SESSION['ofrcia']== $row_clasificador['idcodificadores']){	echo " selected";} ?>
                 > <?php echo $row_clasificador['nombrecodificador']?></option>
                <?php } while ($row_clasificador = pg_fetch_assoc($clasificador));	?>
            </select>
            </td>
          </tr>
  </table>  
</td>



</tr>
</table>
</td>

</tr>
<tr>

<tr><td colspan="4"></td></tr>
<tr>
  <td align="left" id='blau'><span class="taulaH">5. Observaciones:</span>
    <p >&nbsp;</p>
    <p >&nbsp;</p>
  </td>
  <td colspan="3" align="left" id='blau' ><textarea name="MObservacion" id="MObservacion" cols="118" rows="4" style="resize: none;" ><?php echo trim($row_obser['obs']);?></textarea></td>
</tr>
</table>
</tr>
</table>
<input  id="guardarstep" class='boton verde formaBoton' name="guardarstep" type="submit" value="Guardar">
<!-- <button id="guardarstep" type="submit">GUARDAR</button> -->
<!-- <input name="New_Predio" type="submit" class='boton verde formaBoton' value="Guardar"> -->
<?php 
include "../foot.php";
unset($_SESSION['ErrorThrown']);
?>

</form>
  
</div>
</BODY></HTML>