<?php session_start();
 include "../cabecera.php";
 include "page_usuario.php";
//print_r($_SESSION);
?>
<HTML>
<HEAD><TITLE>Llenado de Datos Funcionario</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<LINK href="../css/mdryt.css" type=text/css rel=stylesheet>
<script language="JavaScript" src="../scripts/funciones.js"></script>

<script src="../libraries/jquery-1.10.3/jquery-1.10.2.min.js"></script>
<script src="../libraries/jquery-1.10.3/jquery-1.10.3.ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/button.css" />
<link rel="stylesheet" href="../css/jquery-ui.css" />
<LINK href="../css/mdryt.css" type=text/css rel=stylesheet>
<link rel="stylesheet" type="text/css" href="../css/button.css"/>

<script languaje="Javascript">

function onchekContra(name){

  if(name.checked){
  //  alert('sii');
    document.getElementById(String('password1')).readOnly =false;
    document.getElementById(String('password2')).readOnly =false;

  }else{
    //  alert('noi');
  //  alert(  document.getElementById(String('password2')).readOnly);
      document.getElementById("password1").value="";
      document.getElementById("password2").value="";
      document.getElementById(String('password1')).readOnly =true;
      document.getElementById(String('password2')).readOnly =true;
    //  alert(  document.getElementById(String('password2')).readOnly);
  }

  //document.getElementById("password1").disabled = true;
}

/*function habilitardocpresentado(seleccion,identificador) {  //TPFP =1 superficie es tpfp
	try {
		  if (seleccion.checked){
			   document.getElementById(String(identificador)).disabled=false;
			  // alert(document.getElementById(String(identificador)).value);
		  }else{ document.getElementById(String(identificador)).disabled=true;  }
		}catch(e) {
			alert(e);
		}
	}*/

<!--
  //alert('si');
/*  function habilitarDisable(name){
    var eleman = document.getElementById(name);
    alert('si');
    //eleman.setAttribute("disabled", false);
    eleman.setAttribute("editable", true);
    alert('si2');
  }

  function deshabilitarDisable(name){
  //  alert('no');
    document.getElementById("password1").disabled = true;
    //alert('no2');
  }*/

//  deshabilitarDisable("password1");
  // habilitarDisable('password2');

//-->
</script>



</head>
<?php
include_once('../scripts/body_handler.inc.php');
?>
<body>

<div align="center" class="texto">
<form action="N_Usuario.php" method="POST" autocomplete="off" name="formulario" enctype="multipart/form-data" >
<br>
<b><big> ADMINISTRACION DE USUARIOS </big></b><br>
<table width="48%" border="0" class='taulaA' align="center">
  <tr>
    <td height="14"><hr></td>
  </tr>
  <tr class="texto_normal">
    <td id='blau4'><span class="taulaH">1. Datos de Persona:</span></td>
  </tr>
  <tr class="texto_normal">
    <td id='blau3'><table width="94%" border="0" class='taulaA'>
      <tr class="TituloCajaNegocios">
        <td width="54%" id="blau">CI: </td>
        <td width="27%" ><input name="noidentidad" type="text" class="boxBusqueda3" id="noidentidad"  onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php echo isset($_SESSION['datos_usuario']['noidentidad']) ? htmlspecialchars(trim($_SESSION['datos_usuario']['noidentidad'])) : trim($row_usr['noidentidad']) ?>" ></td>
        <td width="19%" id="blau"><select name="lugarci" class="combos" id="lugarci" >
          <?php
		  do {   ?>
          <option value="<?php echo $row_exp['idcodificadores']?>"
                 <?php  if(isset($_SESSION['datos_usuario']['lugarci']) && $_SESSION['datos_usuario']['lugarci']== $row_exp['idcodificadores']){
											echo " selected";
					    }elseif(isset($row_usr['lugarci']) && intval($row_usr['lugarci'])== $row_exp['idcodificadores']){	echo " selected";} ?>
                       > <?php echo $row_exp['nombrecodificador']?></option>
          <?php } while ($row_exp = pg_fetch_assoc($exp));	?>
        </select></td>
        </tr>
      <tr>
        <td id="blau">Primer Nombre:</td>
        <td ><input name="nombre1" type="text" class="boxBusqueda3" id="nombre1" value="<?php echo isset($_SESSION['datos_usuario']['nombre1']) ? htmlspecialchars(trim($_SESSION['datos_usuario']['nombre1'])) : trim($row_usr['nombre1']) ?>" ></td>
        <td id="blau5">&nbsp;</td>
        </tr>
      <tr class="TituloCajaNegocios">
        <td id="blau2">Segundo Nombre:</td>
        <td id="blau2" ><input name="nombre2" type="text" class="boxBusqueda3" id="nombre2" onKeyPress="return onKeyPressBlockNumbers(event,1)" value="<?php echo isset($_SESSION['datos_usuario']['nombre2']) ? htmlspecialchars($_SESSION['datos_usuario']['nombre2']) : $row_usr['nombre2'] ?>" ></td>
        <td id="blau2">&nbsp;</td>
        </tr>
      <tr>
        <td id="blau7">Apellido Paterno:</td>
        <td id="blau7" ><input name="apellidopat" type="text" class="boxBusqueda3" id="apellidopat" onKeyPress="return onKeyPressBlockNumbers(event,1)" value="<?php echo isset($_SESSION['datos_usuario']['apellidopat']) ? htmlspecialchars($_SESSION['datos_usuario']['apellidopat']) : $row_usr['apellidopat'] ?>" ></td>
        <td id="blau7">&nbsp;</td>
        </tr>
      <tr class="TituloCajaNegocios">
        <td id="blau6">Apellido Materno:</td>
        <td id="blau6" ><input name="apellidomat" type="text" class="boxBusqueda3" id="apellidomat" onKeyPress="return onKeyPressBlockNumbers(event,1)" value="<?php echo isset($_SESSION['datos_usuario']['apellidomat']) ? htmlspecialchars($_SESSION['datos_usuario']['apellidomat']) : $row_usr['apellidomat'] ?>" ></td>
        <td id="blau6">&nbsp;</td>
        </tr>
      <tr>
        <td id="blau">Fecha de Nacimiento:</td>
        <td colspan="2" id="blau" >

                <input  readonly class="boxBusqueda3" id="fechanac" name="fechanac" type="text"
                required="required" placeholder="" autofocus="" title=""
                value="<?php echo isset($_SESSION['datos_usuario']['fechanac']) ? htmlspecialchars($_SESSION['datos_usuario']['fechanac']) : $row_usr['fechanacimiento'] ?>"  />

</td>
        </tr>
      <tr class="TituloCajaNegocios">
        <td height="14" id="blau">Genero:</td>
        <td id="blau" ><select name="idgenero" class="combos" id="idgenero" >
          <?php
		  do {   ?>
          <option value="<?php echo $row_genero['idcodificadores']?>"
                 <?php  if(isset($_SESSION['datos_usuario']['idgenero']) && $_SESSION['datos_usuario']['idgenero']== $row_genero['idcodificadores']){
											echo " selected";
					    }elseif(isset($row_usr['idgenero']) && $row_usr['idgenero']== $row_genero['idcodificadores']){	echo " selected";} ?>
                 > <?php echo $row_genero['nombrecodificador']?></option>
          <?php } while ($row_genero = pg_fetch_assoc($genero));	?>
        </select></td>
        <td id="blau" align="right">&nbsp;</td>
        </tr>
      <tr>
        <td id="blau">Direccion de Domicilio:</td>
        <td><input name="direcciondom" type="text" class="boxBusqueda3" id="direcciondom" value="<?php echo isset($_SESSION['datos_usuario']['direcciondom']) ? htmlspecialchars($_SESSION['datos_usuario']['direcciondom']) : $row_usr['direcciondom'] ?>" ></td>
        <td id="blau">&nbsp;</td>
        </tr>
      <tr class="TituloCajaNegocios">
        <td height="14" id="blau8">Telefono:</td>
        <td id="blau8" ><input name="telefono" type="text" class="boxBusqueda3" id="telefono" value="<?php echo isset($_SESSION['datos_usuario']['telefono']) ? htmlspecialchars($_SESSION['datos_usuario']['telefono']) : $row_usr['telefono'] ?>" ></td>
        <td id="blau8" align="right">&nbsp;</td>
        </tr>
      <tr>
        <td height="14" id="blau">email:</td>
        <td colspan="2" id="blau" ><input name="email" type="text" class="boxBusqueda3m" id="email" value="<?php echo isset($_SESSION['datos_usuario']['email']) ? htmlspecialchars($_SESSION['datos_usuario']['email']) : $row_usr['email'] ?>" ></td>
        </tr>
    </table></td>
  </tr>
  <tr class="texto_normal">
    <td width="56%" id='blau'><span class="taulaH">2. Datos Cargo:</span></td>
    </tr>
  <tr>
    <td height="38"><table width="94%" border="0" class='taulaA'>
      <tr class="TituloCajaNegocios">
        <td stye="width=200px;"  id="blau">Tipo: </td>
        <td stye="width=250px;" ><select name="cargo" class="combos" id="cargo" >
          <?php
		  do {   ?>
          <option value="<?php echo $row_cargo['idcodificadores']?>"
                 <?php  if(isset($_SESSION['datos_usuario']['cargo']) && $_SESSION['datos_usuario']['cargo']== $row_cargo['idcodificadores']){
											echo " selected";
					    }elseif(isset($row_usr['cargo']) && $row_usr['cargo']== $row_cargo['idcodificadores']){	echo " selected";} ?>
                 > <?php echo $row_cargo['nombrecodificador']?></option>
          <?php } while ($row_cargo = pg_fetch_assoc($cargo));	?>
        </select></td>
        <td stye="width=100px;" align="right" id="blau">Estado:</td>
        <td stye="width=200px;" ><select name="estadofun" class="combos" id="estadofun" >
          <option value="<?php echo 'D'?>"
                 <?php  if(isset($_SESSION['datos_usuario']['estadofun']) && trim($_SESSION['datos_usuario']['estadofun'])== 'D'){
											echo " selected";
					    }elseif(isset($row_usr['estadofun']) && trim($row_usr['estadofun'])== 'D'){	echo " selected";} ?>
                 > <?php echo 'DesHabilitado'?></option>
          <option value="<?php echo 'A'?>"
                 <?php  if(isset($_SESSION['datos_usuario']['estadofun']) && trim($_SESSION['datos_usuario']['estadofun'])== 'A'){
											echo " selected";
					    }elseif(isset($row_usr['estadofun']) && trim($row_usr['estadofun'])== 'A'){	echo " selected";} ?>
                 > <?php echo 'Habilitado'?></option>

        </select></td>
        </tr>
        <tr>
          <td id="blau">Login:</td>
          <td colspan="2" ><input name="login" type="text" class="boxBusqueda3m"  id="login" value="<?php echo isset($_SESSION['datos_usuario']['login']) ? htmlspecialchars($_SESSION['datos_usuario']['login']) : $row_usr['login'] ?>" ></td>
          <td>&nbsp;</td>
        </tr>
        <tr class="TituloCajaNegocios">
           <td >Contraseña:<input  onchange="onchekContra(this);" name="chkContra" id="chkContra" type="checkbox"   <?php if (!(empty( $_SESSION['datos_usuario']['chkContra']))) {
             if($_SESSION['datos_usuario']['chkContra']=="on"){ echo " checked='checked' ";}
           } ?>  /></td>
           <td> <input  readOnly="true" value="<?php echo isset($_SESSION['datos_usuario']['password1']) ? htmlspecialchars($_SESSION['datos_usuario']['password1']) : "" ?>"      style=" BORDER-RIGHT: #022402 1px solid; BORDER-TOP: #022402 1px solid; FONT-SIZE: 9px; VERTICAL-ALIGN: text-bottom; BORDER-LEFT: #022402 1px solid;   BORDER-BOTTOM: #022402 1px solid; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif; BACKGROUND-COLOR: #ffffff;" name="password1" id="password1" type="password"  size="26" autocomplete="off"/></td>
           <td >Repita Contraseña:</td>
           <td> <input readOnly ="true" value="<?php echo isset($_SESSION['datos_usuario']['password2']) ? htmlspecialchars($_SESSION['datos_usuario']['password2']) : "" ?>"   style=" BORDER-RIGHT: #022402 1px solid; BORDER-TOP: #022402 1px solid; FONT-SIZE: 9px; VERTICAL-ALIGN: text-bottom; BORDER-LEFT: #022402 1px solid;   BORDER-BOTTOM: #022402 1px solid; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif; BACKGROUND-COLOR: #ffffff;" name="password2" id="password2" type="password"  size="26" autocomplete="off"/></td>
        </tr>
        <tr>
           <td >Unidad:</td>
           <td   colspan="2"><select name="cboUnidad" class="combos" id="cboUnidad" style=" width:240px;" >
             <?php
         do {   ?>
             <option value="<?php echo $row_unidad['idcodificadores']?>"
                    <?php  if(isset($_SESSION['datos_usuario']['cboUnidad']) && $_SESSION['datos_usuario']['cboUnidad']== $row_unidad['idcodificadores']){
                    echo " selected";
                  }elseif(isset($row_usr['idunidad']) && $row_usr['idunidad']== $row_unidad['idcodificadores']){	echo " selected";} ?>

                    ><?php echo $row_unidad['nombrecodificador']?></option>
             <?php } while ($row_unidad = pg_fetch_assoc($unidad));	?>

           </select></td>



        </tr>
        <tr class="TituloCajaNegocios" >
           <td   >Nombre Cargo:</td>
           <td colspan="3"> <input  class="boxBusqueda3"    value="<?php echo isset($_SESSION['datos_usuario']['txtnombreCargo']) ? htmlspecialchars($_SESSION['datos_usuario']['txtnombreCargo']) :   $row_usr['nombrecargo'] ?>"     style=" min-width:430px; " name="txtnombreCargo" id="txtnombreCargo" type="text"   onKeyPress="return onKeyPressBlockNumbers(event,1)"  /></td>

        </tr>

        <tr>
             <td >Fuente Financiamiento:</td>
           <td   colspan="2"><select name="cbofinan" class="combos" id="cbofinan" style=" width:240px;" >              
             <option value="ABT"  <?php  if(isset($_SESSION['datos_usuario']['cbofinan']) && $_SESSION['datos_usuario']['cbofinan']=="ABT"){
                                             echo " selected";
                                         } else if(isset($row_usr['financiamiento']) && trim($row_usr['financiamiento'])== 'ABT'){	echo " selected";} ?> >ABT</option> 
             <option value="UCAB"  <?php  if(isset($_SESSION['datos_usuario']['cbofinan']) && $_SESSION['datos_usuario']['cbofinan']=="UCAB"){
                                              echo " selected";
                                          }else if(isset($row_usr['financiamiento']) && trim($row_usr['financiamiento'])== 'UCAB'){	echo " selected";} ?> >UCAB</option> 
             <option value="VDRA"  <?php  if(isset($_SESSION['datos_usuario']['cbofinan']) && $_SESSION['datos_usuario']['cbofinan']=="VDRA"){
                                              echo " selected";
                                          }else if(isset($row_usr['financiamiento']) && trim($row_usr['financiamiento'])== 'VDRA'){	echo " selected";} ?> >VDRA</option> 
         <option value="INRA"  <?php  if(isset($_SESSION['datos_usuario']['cbofinan']) && $_SESSION['datos_usuario']['cbofinan']=="INRA"){
                                          echo " selected";
                                      }else if(isset($row_usr['financiamiento']) && trim($row_usr['financiamiento'])== 'INRA'){	echo " selected";} ?> >INRA</option> 

           </select></td>

        </tr> 

      <tr>
        <td colspan="4" <?php if(isset($mensaje)){echo "class='celdaVerde'";} ?>><?php if(isset($mensaje)){echo $mensaje;} ?></td>
      </tr>
      </table>
      <table width="94%" border="0">
        <tr>
          <td width="16%" align="center" ><input type="hidden" name="MM_insert" value="form1" />
            <input name="submit" type="submit" class='cabecera2' value="Guardar"></td>
          </tr>
      </table></td>
    </tr>

</table>
<br>
</form>
<?php include "../foot.php";?>
</div>

<script language="JavaScript">

    $(function() {
        $("#fechanac").datepicker({
            changeMonth: true,
            changeYear: true,
            /*  minDate: 0,*/
            maxDate: "+5y +1M +10D",
            dateFormat: "yy-mm-dd"
        });

    });
</script>

</BODY></HTML>
