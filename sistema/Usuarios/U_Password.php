<?php session_start();
 include "../Valid.php";
  
include_once('../scripts/error_handler.inc.php');
// set to the user defined error handler
$old_error_handler = set_error_handler("ErrorHandler");
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{ 
  $msg="";
  if($_POST['submit']=='Guardar'){
	 
	//insertando todo en la base de datos	
				
		 if($_POST['new_pass']=="")		   
			{ trigger_error("Ingrese el nuevo password ",FATAL);}
  		 elseif($_POST['conf_new_pass']=="")		   
			{ trigger_error("Debe Confirmar el nuevo password ",FATAL);}
		  elseif(trim($_POST['new_pass'])==trim($_POST['conf_new_pass']))		   
			{ 
			   $insertUSR = sprintf("select * from modif_pass (%s, %s, %s);",
									   GetSQLValueString($_SESSION['MM_UserId'], "int"),
									   GetSQLValueString($_SESSION['MM_Username'], "text"),
									   GetSQLValueString($_POST['conf_new_pass'], "text"));
				echo $insertUSR;
				//$Result1 = pg_query($cn, $insertUSR);
					
			}
			else
			{ $_SESSION['datos_cambiar']['conf_new_pass'] = " "; trigger_error("Por Favor Confirme nuevamente nuevo password ",FATAL); }
  
		if (!(isset($_SESSION['ErrorThrown']) && $_SESSION['ErrorThrown'] != ""))  
		{   $_SESSION['MM_Password']=$_POST['new_pass'];
		
		 
		}
	
	}//if guardar
} 

			
/*$sql_usr= "select f.login FROM funcionario as f where f.idpersona=".$_SESSION['MM_UserId'];
$usr = pg_query($cn,$sql_usr) ;
$row_usr = pg_fetch_array ($usr);*/



?>
<HTML>
<HEAD><TITLE>Llenado de Datos Agricola</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<LINK href="../css/mdryt.css" type=text/css rel=stylesheet>
<script language="JavaScript" src="../scripts/funciones.js"></script>

</head>
<?php 
include_once('../scripts/body_handler.inc.php');
?>
<body>
<div align="center" class="texto">
<form action="U_Password.php" method="POST" name="formulario" enctype="multipart/form-data" >
<br>
<b><big> ADMINISTRACION DE USUARIOS </big></b><br>
<table width="90%" border="0" class='taulaA' align="center">
  <tr>
    <td height="14"><hr></td>
  </tr>
  <tr class="texto_normal">
    <td width="56%" id='blau'><span class="taulaH">1. Actualizar Password:</span></td>
  </tr>
  <tr>
    <td height="38"><table width="100%" border="0" class='taulaA'>
      <tr>
        <td width="12%" id="blau" align="right">Login:</td>
        <td width="16%" ><input name="login" type="text" class="boxBusqueda3" id="login" disabled value="<?php echo $_SESSION['MM_Username']; ?>" ></td>
        </tr>
      <tr>
        <td height="14" id="blau" align="right">Password:</td>
        <td><input name="new_pass" type="password" id="new_pass" value="<?php echo  isset($_SESSION['datos_cambiar']['new_pass']) ? htmlspecialchars(trim($_SESSION['datos_cambiar']['new_pass'])) : '' ?>" size="32"></td>
        </tr>
      <tr>
        <td height="14" id="blau" align="right">Confirmar Password:</td>
        <td><input name="conf_new_pass" type="password" id="conf_new_pass" value="<?php echo  isset($_SESSION['datos_cambiar']['conf_new_pass']) ? htmlspecialchars(trim($_SESSION['datos_cambiar']['conf_new_pass'])) : '' ?>" size="32"></td>
        </tr>
      </table>
      <table width="100%" border="0">
        <tr>
          <td width="42%">&nbsp;</td>
          <td width="14%"><input type="hidden" name="MM_insert" value="form1" />
            <input name="submit" type="submit" class='cabecera2' value="Guardar"></td>
          <td width="44%">&nbsp;</td>
        </tr>
      </table></td>
    </tr>

</table>
<br>
</form>
<?php pg_close($cn);
?>
</div>
</BODY></HTML>