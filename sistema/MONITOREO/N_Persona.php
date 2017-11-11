<?php session_start();set_time_limit(5000); 
include_once('../scripts/error_handler.inc.php');
  // set to the user defined error handler
$old_error_handler = set_error_handler("ErrorHandler");

include "../Valid.php";

//inicializado datos
if(isset($_GET['id_persona'])){
  	// $id_persona=$_GET['id_persona']; 
	 $_SESSION['id_persona']=$_GET['id_persona'];
 }
 if(isset($_GET['ir'])){
    $pag_anterior=$_GET['ir'];
	 $_SESSION['pag_anterior']=$pag_anterior;
 }
$ci="";
//si existe el _post
if(isset($_POST['nombre1']))
{ //$datos_persona=$_POST;
  $_SESSION['datos_persona']=$_POST;
}
 
  if(isset($_POST['New_Predio']) && $_POST['New_Predio']=='Grabar'){
	
	//insertando todo en la base de datos	
		  if ($_SESSION['datos_persona']['nombre1'] =="" && $_SESSION['datos_persona']['idtipopersona'] ==56 )
          {  trigger_error ("Se Debe Especificar El primer Nombre de la Persona", E_USER_ERROR); }	
		  elseif ($_SESSION['datos_persona']['apellidopat'] =="")
          {  trigger_error ("Se Debe Especificar El Apellido Paterno o la Personeria Juridica Para El  Usuario", E_USER_ERROR); }
		  elseif ($_SESSION['datos_persona']['noidentidad']=="")
          {   trigger_error ("Se Debe Especificar El Documento de Identidad", E_USER_ERROR); }
		  elseif ($_SESSION['datos_persona']['direcciondom'] =="")
          {  trigger_error ("Se Debe Especificar La direccion De la Persona", E_USER_ERROR); }
		   elseif ( isset($_SESSION['datos_persona']['nfamilia']) && $_SESSION['datos_persona']['nfamilia'] =="" && $_SESSION['datos_persona']['tipoperjuridica']>17 )
          {  trigger_error ("Se Debe Especificar el numero de Familias de la comunidad", E_USER_ERROR); }
		   elseif ( isset($_SESSION['datos_persona']['nhombre']) && $_SESSION['datos_persona']['nhombre'] =="" && $_SESSION['datos_persona']['tipoperjuridica']>17 )
          {  trigger_error ("Se Debe Especificar el numero de varones de la comunidad", E_USER_ERROR); }
		   elseif ( isset($_SESSION['datos_persona']['nmujer']) && $_SESSION['datos_persona']['nmujer'] =="" && $_SESSION['datos_persona']['tipoperjuridica']>17 )
          {  trigger_error ("Se Debe Especificar el numero de mujeres de la comunidad", E_USER_ERROR); }
		   elseif ( isset($_SESSION['datos_persona']['supcomunal']) && $_SESSION['datos_persona']['supcomunal'] =="" && $_SESSION['datos_persona']['tipoperjuridica']>17 )
          {  trigger_error ("Se Debe Especificar la superficie comunal de la comunidad", E_USER_ERROR); }
		  elseif((!checkdate($_SESSION['datos_persona']['mesIni'],$_SESSION['datos_persona']['diaIni'],$_SESSION['datos_persona']['annoIni']))){
			$error = "La fecha '".$_SESSION['datos_persona']['diaIni'].'-'.$_SESSION['datos_persona']['mesIni'].'-'.$_SESSION['datos_persona']['annoIni']."' no es v&aacute;lida. intentelo nuevamente!!!";		
			trigger_error($error,E_USER_ERROR);
	      }
  
		if (!(isset($_SESSION['ErrorThrown']) && $_SESSION['ErrorThrown'] != ""))  
		{  
			$insertpersona2=sprintf("select * from crear_persona (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s);",
										 GetSQLValueString($_SESSION['id_persona'], "int"),
										 GetSQLValueString(trim($_SESSION['datos_persona']['noidentidad']), "text"),
										 GetSQLValueString(trim(strtoupper($_SESSION['datos_persona']['nombre1'])), "text"),
										 GetSQLValueString(trim(strtoupper($_SESSION['datos_persona']['nombre2'])), "text"),
										 GetSQLValueString(trim(strtoupper($_SESSION['datos_persona']['apellidopat'])), "text"),
										 GetSQLValueString(trim(strtoupper($_SESSION['datos_persona']['apellidomat'])), "text"),
										 GetSQLValueString($_SESSION['datos_persona']['idgenero'], "int"),
										 GetSQLValueString($_SESSION['datos_persona']['lugarci'], "int"),
									GetSQLValueString($_SESSION['datos_persona']['diaIni'].'-'.$_SESSION['datos_persona']['mesIni'].'-'.$_SESSION['datos_persona']['annoIni'], "date"),
										 GetSQLValueString(trim(strtoupper($_SESSION['datos_persona']['direcciondom'])), "text"),
										 GetSQLValueString(trim($_SESSION['datos_persona']['telefono']), "text"),
										 GetSQLValueString(trim($_SESSION['datos_persona']['email']), "text"),
										 GetSQLValueString(trim($_SESSION['datos_persona']['tipodocidentidad']), "int"),
										 GetSQLValueString(trim(strtoupper($_SESSION['datos_persona']['idtipopersona'])), "int"),
										 GetSQLValueString(isset($_SESSION['datos_persona']['tipoperjuridica'])? $_SESSION['datos_persona']['tipoperjuridica'] :"", "int"), 
										 GetSQLValueString(isset($_SESSION['datos_persona']['idpais'])? $_SESSION['datos_persona']['idpais'] :"", "int"),   
										 GetSQLValueString(isset($_SESSION['datos_persona']['nfamilia'])? $_SESSION['datos_persona']['nfamilia'] :"", "int"),  
										 GetSQLValueString(isset($_SESSION['datos_persona']['nhombre'])? $_SESSION['datos_persona']['nhombre'] :"", "int"),  
										 GetSQLValueString(isset($_SESSION['datos_persona']['nmujer'])? $_SESSION['datos_persona']['nmujer'] :"", "int"),
										 GetSQLValueString(isset($_SESSION['datos_persona']['supcomunal'])? $_SESSION['datos_persona']['supcomunal'] :"", "int"));
							
			  // echo $insertpersona2;
		     $Result2 = pg_query($cn, $insertpersona2);
			 $row_persona = pg_fetch_array ($Result2);
			 if($row_persona['crear_persona']>0){
			   	  //$id_persona=$row_persona['crear_persona'];
				  $_SESSION['id_persona']=$row_persona['crear_persona'];
				  $mensaje="Datos Registrados Exitosamente!!";
			  }
	}
	
} else{
	if(!isset($_SESSION['datos_persona'])){
		
		$sql_persona= "select * FROM persona as p where p.idpersona=".$_SESSION['id_persona'];
		$persona = pg_query($cn,$sql_persona) ;
		$row_persona = pg_fetch_array ($persona);
				
		$sql_datocomunidad= "select * FROM datocomunidad as dc where dc.idpersona=".$_SESSION['id_persona'];
		$datocomunidad = pg_query($cn,$sql_datocomunidad) ;
		$row_datocomunidad = pg_fetch_array ($datocomunidad);

	 }
	}
//print_r($row_persona);
?>
<HTML>
<HEAD><TITLE>Llenado de Datos Contratos</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK href="../css/mdryt.css" type=text/css rel=stylesheet>
<script language="JavaScript" src="../scripts/funciones.js"></script>
<script language="JavaScript"> 
function lanzarSubmenu()
	{window.open("personas2.php?","Adicionar Personas","width=500,height=600,scrollbars=yes,toolbar=no,status=no");}
</script> 
<style type="text/css">
<!--
body {
	background-color: #DADADA;
}
-->
</style></HEAD>
<?php 
include_once('../scripts/body_handler.inc.php');
?>
<BODY>
<?php 
///............. consultas......................../////////////////////////
	$sql_exp= "select * FROM codificadores where idclasificador=5";
	$exp = pg_query($cn,$sql_exp) ;
	$row_exp = pg_fetch_array ($exp);

    $sql_genero= "select * FROM codificadores where idclasificador=6";
	$genero = pg_query($cn,$sql_genero) ;
	$row_genero = pg_fetch_array ($genero);
	
	$sql_tipodoc= "select * FROM codificadores where idclasificador=10";
	$tipodoc = pg_query($cn,$sql_tipodoc) ;
	$row_tipodoc = pg_fetch_array ($tipodoc);
    
	$sql_tipoper= "select * FROM codificadores where idclasificador=4";
	$tipoper = pg_query($cn,$sql_tipoper) ;
	$row_tipoper = pg_fetch_array ($tipoper);
	
	$sql_tipoperjur= "select * FROM codificadores where idclasificador=11";
	$tipoperjur = pg_query($cn,$sql_tipoperjur) ;
	$row_tipoperjur = pg_fetch_array ($tipoperjur);
	
	$sql_pais= "select idpolitico,nombrepolitico FROM politico where idpadre=0";
	$pais = pg_query($cn,$sql_pais) ;
	$row_pais = pg_fetch_array ($pais);   
	
?>
<div align="center" class="texto">
<form action="N_Persona.php" method="POST" name="formulario"  autocomplete="off" enctype="multipart/form-data">

<p><strong>Datos de Persona</strong><br>
</p>
<table width="500" height="318" border="0"  align="center" cellspacing="0" class='taulaA'>
  <tr>
    <td height="19" colspan="3" id="blau"><div class="taulaH">1. Datos Persona</div></td>
  </tr>
  
  
  <tr  class="TituloCajaNegocios" >
    <td width="43%" height="21" id="blau">Primer Nombre:</td>
    <td width="40%" height="21"><input name="nombre1" type="text" class="boxBusqueda3" id="nombre1" value="<?php echo isset($_SESSION['datos_persona']['nombre1']) ? htmlspecialchars(trim($_SESSION['datos_persona']['nombre1'])) : trim($row_persona['nombre1']) ?>" onChange="document.forms[0].submit()" ></td>
    <td width="17%" height="21">&nbsp;</td>
  </tr>
  <tr>
    <td id="blau">Segundo Nombre</td>
    <td height="21"><input name="nombre2" type="text" class="boxBusqueda3" id="nombre2" onKeyPress="return onKeyPressBlockNumbers(event,1)" value="<?php echo isset($_SESSION['datos_persona']['nombre2']) ? htmlspecialchars(trim($_SESSION['datos_persona']['nombre2'])) : trim($row_persona['nombre2']) ?>" ></td>
    <td height="21">&nbsp;</td>
  </tr>
  <tr  class="TituloCajaNegocios" >
    <td id="blau"><p>Apellido Paterno o <br>
      Personeria Jurídica</p></td>
    <td height="21"><input name="apellidopat" type="text" class="boxBusqueda3" id="apellidopat"  value="<?php echo isset($_SESSION['datos_persona']['apellidopat']) ? htmlspecialchars(trim($_SESSION['datos_persona']['apellidopat'])) : trim($row_persona['apellidopat']) ?>" ></td>
    <td height="21">&nbsp;</td>
  </tr>
  <tr  >
    <td id="blau">Apellido Materno y/o Apellido de Casada</td>
    <td height="21"><input name="apellidomat" type="text" class="boxBusqueda3" id="apellidomat" onKeyPress="return onKeyPressBlockNumbers(event,1)" value="<?php echo isset($_SESSION['datos_persona']['apellidomat']) ? htmlspecialchars(trim($_SESSION['datos_persona']['apellidomat'])) : trim($row_persona['apellidomat']) ?>" ></td>
    <td height="21">&nbsp;</td>
  </tr>
  <tr  class="TituloCajaNegocios" >
    <td id="blau">Tipo de Documento de Identidad</td>
    <td height="21" colspan="2"><select name="tipodocidentidad" class="combos" id="
        tipodocidentidad" >
      <?php 	
		  do {   ?>
      <option value="<?php echo $row_tipodoc['idcodificadores']?>"
                 <?php  if(isset($_SESSION['datos_persona']['tipodocidentidad']) && $_SESSION['datos_persona']['tipodocidentidad']== $row_tipodoc['idcodificadores']){
											echo " selected";
					    }elseif(isset($row_persona['tipodocidentidad']) && $row_persona['tipodocidentidad']== $row_tipodoc['idcodificadores']){	echo " selected";} ?>
                 > <?php echo $row_tipodoc['nombrecodificador']?></option>
      <?php } while ($row_tipodoc = pg_fetch_assoc($tipodoc));	?>
    </select></td>
    </tr>
  <tr  >
    <td id="blau">Num. Documento de Identidad</td>
    <td height="21"><input name="noidentidad" type="text" class="boxBusqueda3" id="noidentidad" value="<?php echo isset($_SESSION['datos_persona']['noidentidad']) ? htmlspecialchars(trim($_SESSION['datos_persona']['noidentidad'])) : trim($row_persona['noidentidad']) ?>" ></td>
    <td height="21"><select name="lugarci" class="combos" id="lugarci" >
      <?php 	
		  do {   ?>
      <option value="<?php echo $row_exp['idcodificadores']?>"
                 <?php  if(isset($_SESSION['datos_persona']['lugarci']) && $_SESSION['datos_persona']['lugarci']== $row_exp['idcodificadores']){
											echo " selected";
					    }elseif(isset($row_persona['lugarci']) && (intval($row_persona['lugarci'])== $row_exp['idcodificadores'])){	echo " selected";} ?>
                 > <?php echo $row_exp['nombrecodificador']?></option>
      <?php } while ($row_exp = pg_fetch_assoc($exp));	?>
    </select></td>
  </tr>
  <tr  class="TituloCajaNegocios" >
    <td height="20" id="blau">Fecha de Documento (Fecha de Nacimiento):</td>
    <td id="blau" ><select name="diaIni" class="combos"  id="diaIni"  onChange="return dia_mes_ano('diaIni','mesIni','annoIni');" >
      <?php			 
			  $dia = 0;
			  if(isset($_SESSION['datos_persona']['diaIni'])){
			  	$nacimiento_dia = $_SESSION ['datos_persona']['diaIni'];
			  } elseif(isset($row_persona['fechanacimiento'])){
			    $fecha=explode("-", $row_persona['fechanacimiento']);
				$nacimiento_dia=$fecha[2];
			  }
			  do {  
					$dia++;
			   ?>
      <option value="<?php echo $dia?>"
			  	<?php 
				  if(isset($nacimiento_dia)) {
					  if($nacimiento_dia == $dia){
			  			echo " selected";
						}
					}?>><?php echo $dia?></option>
      <?php
				 } while ($dia < 31);
			   ?>
    </select>
/
<select name="mesIni" class="combos"  id="mesIni"  onChange="return dia_mes_ano('diaIni','mesIni','annoIni');">
  <?php 
			  $meses = array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");
			  $mes = 0;
			   if(isset($_SESSION ['datos_persona']['mesIni'])){
			  	$nacimiento_mes = $_SESSION ['datos_persona']['mesIni'];
			  } elseif(isset($row_persona['fechanacimiento'])){
			    $fecha=explode("-", $row_persona['fechanacimiento']);
				$nacimiento_mes=$fecha[1];
			  }
			 do {  $mes++;
			   ?>
  <option value="<?php echo $mes?>"
			  	<?php 
				  if(isset($nacimiento_mes)) {
					  if($nacimiento_mes == $mes){
			  			echo " selected";
						}
					}?>><?php echo $meses[$mes-1]?></option>
  <?php
				 } while ($mes < 12);
			   ?>
</select>
/
<select name="annoIni" class="combos"  id="annoIni" onChange="return dia_mes_ano('diaIni','mesIni','annoIni');">
  <?php
			  $anno = 1920;
			   if(isset($_SESSION ['datos_persona']['annoIni'])){
			  	$nacimiento_anno = $_SESSION ['datos_persona']['annoIni'];
			  } elseif(isset($row_persona['fechanacimiento'])){
			    $fecha=explode("-", $row_persona['fechanacimiento']);
				$nacimiento_anno=$fecha[0];
			  }
			 do {  
					$anno++;
			   ?>
  <option value="<?php echo $anno?>"
			  	<?php 
				  if(isset($nacimiento_anno)) {
					  if($nacimiento_anno == $anno){
			  			echo " selected";
						}
					}?>><?php echo $anno?></option>
  <?php
				 } while ($anno < 2014);
			   ?>
</select></td>
    <td align="left" id="blau">&nbsp;</td>
  </tr>
  <tr  >
    <td id="blau">Pais de Emision Documento(Pais de Nacimiento)</td>
    <td height="21" colspan="2"><select name="idpais" class="combos" id="idpais" >
      <?php 	
		  do {   ?>
      <option value="<?php echo $row_pais['idpolitico']?>"
                 <?php  if(isset($_SESSION['datos_persona']['idpais']) && $_SESSION['datos_persona']['idpais']== $row_pais['idpolitico']){
											echo " selected";
					    }elseif(isset($row_persona['idpais']) && $row_persona['idpais']== $row_pais['idpolitico']){ echo " selected";} ?>
                 > <?php echo $row_pais['nombrepolitico']?></option>
      <?php } while ($row_pais = pg_fetch_assoc($pais));	?>
    </select></td>
    </tr>
  <tr  class="TituloCajaNegocios"  >
    <td id="blau">Genero:</td>
    <td height="21"><select name="idgenero" class="combos" id="idgenero" >
      <?php 	
		  do {   ?>
      <option value="<?php echo $row_genero['idcodificadores']?>"
                 <?php  if(isset($_SESSION['datos_persona']['idgenero']) && $_SESSION['datos_persona']['idgenero']== $row_genero['idcodificadores']){
											echo " selected";
					    }elseif(isset($row_persona['idgenero']) && $row_persona['idgenero']== $row_genero['idcodificadores']){	echo " selected";} ?>
                 > <?php echo $row_genero['nombrecodificador']?></option>
      <?php } while ($row_genero = pg_fetch_assoc($genero));	?>
    </select></td>
    <td height="21">&nbsp;</td>
  </tr>
  <tr>
    <td id="blau">Direccion de Domicilio:</td>
    <td><input name="direcciondom" type="text" class="boxBusqueda3" id="direcciondom" value="<?php echo isset($_SESSION['datos_persona']['direcciondom']) ? htmlspecialchars(trim($_SESSION['datos_persona']['direcciondom'])) : trim($row_persona['direcciondom']) ?>" ></td>
    <td height="21">&nbsp;</td>
  </tr>
  <tr  class="TituloCajaNegocios" >
    <td id="blau">Telefono:</td>
    <td id="blau" ><input name="telefono" type="text" class="boxBusqueda3" id="telefono" value="<?php echo isset($_SESSION['datos_persona']['telefono']) ? htmlspecialchars(trim($_SESSION['datos_persona']['telefono'])) : trim($row_persona['telefono']) ?>" ></td>
    <td height="21">&nbsp;</td>
  </tr>
  <tr>
    <td id="blau">email:</td>
    <td height="21" colspan="2"  ><input name="email" type="text" class="boxBusqueda3m" id="email" value="<?php echo isset($_SESSION['datos_persona']['email']) ? htmlspecialchars(trim($_SESSION['datos_persona']['email'])) : trim($row_persona['email']) ?>" onChange="document.forms[0].submit()"  ></td>
    </tr>
  <tr  class="TituloCajaNegocios" >
    <td id="blau"  >Tipo Persona:</td>
    <td id="blau" ><select name="idtipopersona" class="combos" id="idtipopersona" onBlur="document.forms[0].submit()" onChange="document.forms[0].submit()" >
        <?php 	
		  do {   ?>
        <option value="<?php echo $row_tipoper['idcodificadores']?>"
                 <?php  if(isset($_SESSION['datos_persona']['idtipopersona']) && $_SESSION['datos_persona']['idtipopersona']== $row_tipoper['idcodificadores']){
											echo " selected";
					    }elseif(isset($row_persona['idtipopersona']) && $row_persona['idtipopersona']== $row_tipoper['idcodificadores']){	echo " selected";} ?>
                 > <?php echo $row_tipoper['nombrecodificador']?></option>
        <?php } while ($row_tipoper = pg_fetch_assoc($tipoper));	?>
    </select></td>
    <td height="21">&nbsp;</td>
  </tr>
  <?php if( (isset($_SESSION['datos_persona']['idtipopersona'])&& $_SESSION['datos_persona']['idtipopersona']==57) || (isset($row_persona['idtipopersona']) && $row_persona['idtipopersona']==57)){ ?>
  <tr>
    <td id="blau">Tipo Persona Juridica:</td>
    <td height="21" colspan="2" id="blau" ><select name="tipoperjuridica" class="combos" id="tipoperjuridica" onChange="document.forms[0].submit()" >
        <?php 	
		  do {   ?>
        <option value="<?php echo $row_tipoperjur['idcodificadores']?>"
                 <?php  if(isset($_SESSION['datos_persona']['tipoperjuridica']) && $_SESSION['datos_persona']['tipoperjuridica']== $row_tipoperjur['idcodificadores']){
											echo " selected";
					    }elseif(isset($row_persona['tipoperjuridica']) && $row_persona['tipoperjuridica']== $row_tipoperjur['idcodificadores']){	echo " selected";} ?>
                 > <?php echo $row_tipoperjur['nombrecodificador']?></option>
        <?php } while ($row_tipoperjur = pg_fetch_assoc($tipoperjur));	?>
    </select></td>
    </tr>
   <?php if( (isset($_SESSION['datos_persona']['tipoperjuridica'])&& $_SESSION['datos_persona']['tipoperjuridica']>17) || (isset($row_persona['tipoperjuridica']) && $row_persona['tipoperjuridica']>17)){ ?>
  <tr   class="TituloCajaNegocios" >
    <td id="blau">Numero de Familias:</td>
    <td id="blau" ><input name="nfamilia" type="text" class="boxBusqueda3" id="nfamilia" value="<?php if (isset($_SESSION['datos_persona']['nfamilia'])) { echo $_SESSION['datos_persona']['nfamilia'];}elseif(isset($row_datocomunidad['nfamilia'])) { echo $row_datocomunidad['nfamilia'];} ?>" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"></td>
    <td height="21">&nbsp;</td>
  </tr>
  <tr>
    <td id="blau">Numero de Hombres:</td>
    <td id="blau" ><input name="nhombre" type="text" class="boxBusqueda3" id="nhombre" value="<?php if (isset($_SESSION['datos_persona']['nhombre'])) { echo $_SESSION['datos_persona']['nhombre'];}elseif(isset($row_datocomunidad['nhombre'])) { echo $row_datocomunidad['nhombre'];} ?>" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"></td>
    <td height="21">&nbsp;</td>
  </tr>
  <tr   class="TituloCajaNegocios" >
    <td id="blau">Numero de Mujeres:</td>
    <td height="21"><input name="nmujer" type="text" class="boxBusqueda3" id="nmujer" value="<?php if (isset($_SESSION['datos_persona']['nmujer'])) { echo $_SESSION['datos_persona']['nmujer'];}elseif(isset($row_datocomunidad['nmujer'])) { echo $row_datocomunidad['nmujer'];} ?>" onKeyUp="extractNumber(this,0,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"></td>
    <td height="21">&nbsp;</td>
  </tr>
      
	<tr   >
	  <td height="21" id="blau2">Sup. Area Comunal:</td>
	  <td height="21" id="blau2"><input name="supcomunal" type="text" class="boxBusqueda3" id="supcomunal" value="<?php if (isset($_SESSION['datos_persona']['supcomunal'])) { echo $_SESSION['datos_persona']['supcomunal'];}elseif(isset($row_datocomunidad['supcomunal'])) { echo $row_datocomunidad['supcomunal'];} ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"></td>
	  <td height="21">&nbsp;</td>
	  </tr>   
	   
	 <?php   } ?>
  
       <?php } 
	   ?>
     
     
     <tr>
    <td height="21" colspan="3" <?php if(isset($mensaje)){echo "class='celdaVerde'";} ?> ><?php if(isset($mensaje)){echo $mensaje;} ?></td>
    </tr>
</table>

<br>
  <input name="New_Predio" type="submit" class='cabecera2' value="Grabar">
  
        <span >
          <a href="<?php echo $_SESSION['pag_anterior']; ?> " class="borderTblau">Retornar a Lista</a></span>
</form>
<?php pg_close($cn);// print_r($_SESSION);?>
</div>
</BODY></HTML>