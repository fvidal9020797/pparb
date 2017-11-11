<?php session_start();
include "../cabecera.php";
$campo="";
include "../Registro/destroy_predio.php";

if (isset($_POST["buscar"]))
{$campo=$_POST["buscar"]; }

if(isset($_SESSION['id_usr'])){unset($_SESSION['id_usr']);}
if(isset($_SESSION['datos_usuario'])){unset($_SESSION['datos_usuario']);}
//print_r($_SESSION);

if(isset($_GET['id_usr'])){
     $insertUSR2=sprintf("select * from modif_pass (%s,%s,%s);",
									 GetSQLValueString($_GET['id_usr'], "int"),
									 GetSQLValueString(trim(""), "text"),
									 GetSQLValueString(trim("Ucab12345"), "text"));
		   //echo $insertUSR2;
		  $Result2 = pg_query($cn, $insertUSR2);
 }

?>
<HTML>
<HEAD><TITLE>Listado de Usuarios</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<LINK href="../css/mdryt.css" type=text/css rel=stylesheet>
<link rel="stylesheet" type="text/css" href="../css/button.css"/>
<script language="JavaScript" src="../scripts/funciones.js"></script>
<script languaje="Javascript">
<!--

function lanzarSubmenu(campo)
	{window.open("N_Roles.php?c=" + campo + "","Elegir Personas","width=500,height=600,scrollbars=yes,toolbar=no,status=no");}

function lanzarSubmenu1(campo)
	{window.open("N_Usuario.php?id_usr="+ campo + "","Elegir Funcionario","width=500,height=450,scrollbars=yes,toolbar=no,status=no");}

function lanzarSubmenu2(campo)
{window.open("N_Roles.php?id_usr="+ campo + "","Elegir Rol","width=400,height=500,scrollbars=yes,toolbar=no,status=no");}

function lanzarSubmenu3(campo,campologin)
{window.open("U_Password.php?id_usr="+ campo + "","Elegir Rol","width=500,height=300,scrollbars=yes,toolbar=no,status=no");}
//-->
</script>
</head>

<body>
<div align="center" class="texto"> <br>
    <strong>LISTA DE FUNCIONARIOS DEL PPARB</strong>
  <table width="90%" border="0">
      <tr>
        <td colspan="2"><hr></td>
      </tr>
      <tr>
        <td width="22%" height="27"><form action="N_Usuario.php?id_usr=-1" method="post" name="form2">
            <span class="borderLBRgris">
            <input type='image' src='../images/reg_adm.gif' onClick="this.form2.submit()">
              NuevoFuncionario.</span>
        </form></td>
        <td width="100%"><form action="ListadoUsuario.php" method="post" enctype="multipart/form-data" autocomplete="off"  name="formulario">
            <table width="100%" align="center" border="0" cellspacing="0" cellpadding="0" class="taulaA">
              <tr >
                <td id="blau" align="right"><Strong>DATOS A BUSCAR:</Strong> </td>
                <td><input type="text" class="boxBusqueda2" name="buscar"></td>
                <td align="left"><input type="submit" name="submit" class="boton verde formaBoton" value="Buscar">
                    <input type="hidden" name="c" value="<?php echo $campo; ?>">					</br></br></td>

            </table>
        </form></td>
      </tr>
      <tr>
        <td height="4" colspan="2"><hr></td>
      </tr>
    </table>
</div>

<div class="CSSTable" >

<table >
  <?php
if (isset($_POST["buscar"]))
	{$look=strtoupper($_POST["buscar"]);
	$sql="select p.idpersona,p.nombre1,p.nombre2,p.apellidopat,p.apellidomat,p.noidentidad,c.nombrecodificador,f.estadofun,f.idfuncionario,f.login FROM persona as p, funcionario as f,codificadores as c where f.cargo=c.idcodificadores and p.idpersona>0  and p.idpersona=f.idpersona AND (upper(nombre1) like '%' || upper('$look') ||'%' OR upper(apellidopat) like '%' || upper('$look') ||'%' OR upper(noidentidad) like '%' || upper('$look') ||'%'  OR upper(f.login) like '%' || upper('$look') ||'%' ) Order by nombre1,apellidopat LIMIT 30";
//echo $sql;
  $rs=sql_ejecutar($cn,$sql);
//echo $sql;
}

else{
 $sql="select p.idpersona,p.nombre1,p.nombre2,p.apellidopat,p.apellidomat,p.noidentidad,c.nombrecodificador,f.estadofun,f.idfuncionario,f.login FROM persona as p, funcionario as f,codificadores as c where f.cargo=c.idcodificadores and p.idpersona>0 and p.idpersona=f.idpersona  Order by nombre1,apellidopat LIMIT 30";
 	$rs=sql_ejecutar($cn,$sql);
}



?>
  <tr class="cabecera2">
    <td width="97"   align="center">Docu. de Identidad</td>
    <td width="356" align="center">Nombre</td>
    <td width="266" align="center">Nombre Usuario</td>
    <td align="center" width="134">Estado</td>
    <td align="center" width="80" >Cambiar Rol</td>
    <td align="center" width="91" >Modificar</td>
  </tr>
  <?php while ($res=sql_fetch($rs)){ ?>
  <tr>
    <td ><?php echo $res["noidentidad"];?></td>
    <td ><?php echo $res["nombre1"]." ".$res["nombre2"]." ".$res["apellidopat"]." ".$res["apellidomat"];?></td>
    <td align="center" ><?php if (trim($res["login"])==''){echo "--";}else{ echo $res["login"];} ?></td>
    <td align="center" ><?php if (trim($res["estadofun"])=='A'){echo "Habilitado";}else{ echo "Desahabilitado";} ?></td>
    <td ><?php if (trim($res["estadofun"])=="A"){ ?>
      <a href="ListadoUsuario.php>" onClick="<?php echo 'lanzarSubmenu2('.$res['idfuncionario'].'); return false;'; ?>">Roles</a>
      <?php }?></td>
    <td ><form action="<?php echo "ListadoUsuario.php" ?> " method="post" name="form2">
      <input type='image' src='../images/reg_adm.gif' onClick='<?php echo 'lanzarSubmenu1('.$res['idpersona'].'); return false;'; ?>'>

    </form>

	</td>
  </tr>
  <?php }?>
</table>
</DIV>
<?php include "../foot.php";?>
</BODY></HTML>
