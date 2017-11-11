<?php session_start();
 include "../cabecera.php";
 if(isset($_GET['id_usr'])){
 $id_usr=$_GET['id_usr']; 
	 $_SESSION['id_usr']=$id_usr;
 }
    $sql_roles = " Select * From tarea";
    $roles = pg_query($cn,$sql_roles) ;
	$row_roles = pg_fetch_array ($roles);
    $totalRows_roles = pg_num_rows($roles);
	
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{ 
  if($_POST['submit']=='Guardar'){
	 $rol=$_POST;
     $_SESSION['rol']=$rol;
	//insertando todo en la base de datos	
	 $i=1;
		while($i<=$totalRows_roles)		
		 {  if(isset($_SESSION['rol']['chk'.$i]))		   
			{ 
			   $insertUSR = sprintf("select * from ModificarRol (%s, %s, %s);",
									   GetSQLValueString($_SESSION['id_usr'], "int"),
									   GetSQLValueString($i, "int"),
									   GetSQLValueString(1, "int"));
			}
			else{
				$insertUSR = sprintf("select * from ModificarRol (%s, %s, %s);",
									   GetSQLValueString($_SESSION['id_usr'], "int"),
									   GetSQLValueString($i, "int"),
									   GetSQLValueString(0, "int"));
			}
			//echo $insertUSR;
			$Result1 = pg_query($cn, $insertUSR);
			$mensaje="";
		   $i=$i+1;
		 }
		$datosexitosos=0;
		if (!(isset($_SESSION['ErrorThrown']) && $_SESSION['ErrorThrown'] != ""))  
		{   	
		  $datosexitosos=1;
		  
		  $mensaje="Los Roles del Beneficiario han sido Actualizados";
		}
	
	}//if guardar
} 
			

//print_r($_SESSION);

?>
<HTML>
<HEAD><TITLE>Administracion de Usuarios</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<LINK href="../css/mdryt.css" type=text/css rel=stylesheet>
<link rel="stylesheet" type="text/css" href="../css/button.css"/>
<script language="JavaScript" src="../scripts/funciones.js"></script>
<script languaje="Javascript">
<!--
document.write('<style type="text/css">div.ocultable{display: none;}</style>');
function MostrarOcultar(capa,enlace)
{
	if (document.getElementById)
	{
		var aux = document.getElementById(capa).style;
		aux.display = aux.display? "":"block";
	}
}

//-->
</script>
</head>
<?php 
include_once('../scripts/body_handler.inc.php');
?>
<body>
<div align="center" class="texto">
<form action="N_Roles.php" method="POST" name="formulario" enctype="multipart/form-data" >
<br>
<b><big> ADMINISTRACION DE USUARIOS </big></b><br>
<table width="90%" border="0" class='taulaA' align="center">
  <tr>
    <td height="14">&nbsp;</td>
  </tr>
  <tr class="texto_normal">
    <td width="56%" id='blau'><span class="taulaH">1. Asignación de Roles: </span></td>
  </tr>
  <tr>
    <td height="38"><table width="100%" border="0" class='taulaA'>
      <tr>
        <td width="50%" >
          <table width="100%" border="1" cellspacing="2" cellpadding="2">
            
            <tr>
            <?php 
	
			$sql_funcionario= "select (((((COALESCE(persona.apellidopat, ''::bpchar)::text || ' '::text) || COALESCE(persona.apellidomat, ''::bpchar)::text) || ' '::text) || COALESCE(persona.nombre1, ''::bpchar)::text) || ' '::text) || COALESCE(persona.nombre2, ''::bpchar)::text AS nomcompleto FROM persona , funcionario as f where persona.idpersona=f.idpersona and f.idfuncionario=".$_SESSION['id_usr'];
			$funcionario = pg_query($cn,$sql_funcionario);
			$row_funcionario = pg_fetch_array ($funcionario);
		 
		?>    <td colspan="3" class="celdaCelesteOscuro"><?php echo $row_funcionario['nomcompleto'];?></td>
             </tr>
             <tr>
              <td colspan="3" class="celdaCelesteOscuro">&nbsp;</td>
            </tr>
            <tr>
            <td colspan="2" class="cabecera2">ROLES</td>
            </tr>
            <?php 
	
	
do{   $valor=$row_roles['idtarea'];
	 if(!isset($_SESSION['datos_rol'])){
	    $sql_tarea = "SELECT * FROM usuarios 
					   WHERE  usuarios.idfuncionario=".$_SESSION['id_usr']." and usuarios.idtarea=".$valor;
		$tarea = pg_query($cn,$sql_tarea);
		$row_tarea = pg_fetch_array ($tarea);
		$totalRows_tarea = pg_num_rows($tarea);
	  }
    ?>
            <tr class="negre">
              <td width="197"><?php echo $row_roles['nombretarea'];?></td>
              <td width="192"><input type="checkbox"  <?php if(isset($_SESSION['datos_rol']["chk".$row_roles['idtarea']])){echo 'checked';}elseif(isset($totalRows_tarea) && $row_tarea['idtarea']==$row_roles['idtarea']){echo 'checked';}?>  name="<?php echo "chk".$row_roles['idtarea'];?>"/></td>
            </tr>
            <?php  } while ($row_roles = pg_fetch_assoc($roles));?>
          </table>         </td>
        </tr>
      <tr>
        <td <?php if(isset($mensaje)){echo "class='celdaVerde'";} ?>><?php if(isset($mensaje)){echo $mensaje;} ?></td>
      </tr>
      </table>
      <hr>
      <table width="100%" border="0">
        <tr>
          <td width="42%" height="38">&nbsp;</td>
          <td width="14%"><input type="hidden" name="MM_insert" value="form1" />
            <input name="submit" type="submit" class='boton verde formaBoton' value="Guardar"></td>
          <td width="44%"><p><br>
            <br>
            <br>
          </p></td>
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