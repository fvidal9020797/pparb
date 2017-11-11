<?php session_start();set_time_limit(5000);  
include "../Registro/destroy_predio.php";
include "../Valid.php";
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
///print_r($_SESSION);
///////////////$post

///////////////BUSQUEDA///////////////////
if ( isset($_POST['buscar1']))
	{		 
	    if (!(strrpos($_SESSION['MM_Rol'],'3')== false) || $_SESSION['MM_UserGroup']==188 || $_SESSION['MM_UserGroup']==189){ //Administrador o Ucab muestre todo listado
		    $sql_listado="Select * FROM v_parcela  where v_parcela.estado !='' ";
			if(trim($_POST["buscar1"])!=""){  $sql_listado=$sql_listado." and v_parcela.idparcela like '%".strtoupper(trim($_POST['buscar1']))."%'";}
			if(trim($_POST["buscar2"])!=""){  $sql_listado=$sql_listado." and v_parcela.nombre like '%".strtoupper(trim($_POST['buscar2']))."%'";}
			if(trim($_POST["buscar3"])!=""){  $sql_listado=$sql_listado." and v_parcela.fecharegistro like '%".trim($_POST['buscar3'])."%'";}
			if(trim($_POST["buscar40"])!=""){  $sql_listado=$sql_listado." and v_parcela.superficie>".$_POST['buscar40'];}
			if(trim($_POST["buscar41"])!=""){  $sql_listado=$sql_listado." and v_parcela.superficie<".$_POST['buscar41'];}
			if(trim($_POST["buscar5"])!=""){  $sql_listado=$sql_listado." and upper(v_parcela.nombrepolitico) like '%".strtoupper(trim($_POST['buscar5']))."%'";}
			if($_POST["buscar6"]!='0'){  $sql_listado=$sql_listado." and upper(v_parcela.\"TipoProp\") like '%".strtoupper(substr(trim($_POST['buscar6']),0,4))."%'";}
			if($_POST["buscar7"]!='0'){  $sql_listado=$sql_listado." and upper(v_parcela.\"Clasificacion\") like '%".strtoupper(trim($_POST['buscar7']))."%'";}
			if($_POST["buscar8"]!='0'){  $sql_listado=$sql_listado." and upper(v_parcela.\"SitJur\") like '%".strtoupper(trim($_POST['buscar8']))."%'";}
			if($_POST["buscar9"]!='0'){  $sql_listado=$sql_listado." and upper(v_parcela.estado) like '%".strtoupper(trim($_POST['buscar9']))."%'";}
		 }elseif($_SESSION['MM_UserGroup']==183){ ///los SIG muesta los registro q el haga y el registro del resto
		   $sql_listado="Select v_parcela.* FROM v_parcela,  funcionarioregistro
						  where v_parcela.idregistro = funcionarioregistro.idregistro AND funcionarioregistro.idfuncionario=".$_SESSION['MM_UserId'];
			if(trim($_POST["buscar1"])!=""){  $sql_listado=$sql_listado." and v_parcela.idparcela like '%".strtoupper(trim($_POST['buscar1']))."%'";}
			if(trim($_POST["buscar2"])!=""){  $sql_listado=$sql_listado." and v_parcela.nombre like '%".strtoupper(trim($_POST['buscar2']))."%'";}
			if(trim($_POST["buscar3"])!=""){  $sql_listado=$sql_listado." and v_parcela.fecharegistro like '%".trim($_POST['buscar3'])."%'";}
			if(trim($_POST["buscar40"])!=""){  $sql_listado=$sql_listado." and v_parcela.superficie>".$_POST['buscar40'];}
			if(trim($_POST["buscar41"])!=""){  $sql_listado=$sql_listado." and v_parcela.superficie<".$_POST['buscar41'];}
			if(trim($_POST["buscar5"])!=""){  $sql_listado=$sql_listado." and upper(v_parcela.nombrepolitico) like '%".strtoupper(trim($_POST['buscar5']))."%'";}
			if($_POST["buscar6"]!='0'){  $sql_listado=$sql_listado." and upper(v_parcela.\"TipoProp\") like '%".strtoupper(substr(trim($_POST['buscar6']),0,4))."%'";}
			if($_POST["buscar7"]!='0'){  $sql_listado=$sql_listado." and upper(v_parcela.\"Clasificacion\") like '%".strtoupper(trim($_POST['buscar7']))."%'";}
			if($_POST["buscar8"]!='0'){  $sql_listado=$sql_listado." and upper(v_parcela.\"SitJur\") like '%".strtoupper(trim($_POST['buscar8']))."%'";}
			$sql_listado=$sql_listado." and  v_parcela.estado='HABILITADO'";
					  
				
			$sql_listado=$sql_listado." UNION ";
			
			$sql_listado=$sql_listado." Select * FROM v_parcela  where v_parcela.estado !='' ";
			if(trim($_POST["buscar1"])!=""){  $sql_listado=$sql_listado." and v_parcela.idparcela like '%".strtoupper(trim($_POST['buscar1']))."%'";}
			if(trim($_POST["buscar2"])!=""){  $sql_listado=$sql_listado." and v_parcela.nombre like '%".strtoupper(trim($_POST['buscar2']))."%'";}
			if(trim($_POST["buscar3"])!=""){  $sql_listado=$sql_listado." and v_parcela.fecharegistro like '%".trim($_POST['buscar3'])."%'";}
			if(trim($_POST["buscar40"])!=""){  $sql_listado=$sql_listado." and v_parcela.superficie>".$_POST['buscar40'];}
			if(trim($_POST["buscar41"])!=""){  $sql_listado=$sql_listado." and v_parcela.superficie<".$_POST['buscar41'];}
			if(trim($_POST["buscar5"])!=""){  $sql_listado=$sql_listado." and upper(v_parcela.nombrepolitico) like '%".strtoupper(trim($_POST['buscar5']))."%'";}
			if($_POST["buscar6"]!='0'){  $sql_listado=$sql_listado." and upper(v_parcela.\"TipoProp\") like '%".strtoupper(substr(trim($_POST['buscar6']),0,4))."%'";}
			if($_POST["buscar7"]!='0'){  $sql_listado=$sql_listado." and upper(v_parcela.\"Clasificacion\") like '%".strtoupper(trim($_POST['buscar7']))."%'";}
			if($_POST["buscar8"]!='0'){  $sql_listado=$sql_listado." and upper(v_parcela.\"SitJur\") like '%".strtoupper(trim($_POST['buscar8']))."%'";}
			if($_POST["buscar9"]!='0'){  $sql_listado=$sql_listado." and upper(v_parcela.estado) like '%".strtoupper(trim($_POST['buscar9']))."%'";}
			
		 } else{ //resto registradores
			$sql_listado="Select v_parcela.* FROM v_parcela,  funcionarioregistro
						  where v_parcela.idregistro = funcionarioregistro.idregistro AND  funcionarioregistro.idfuncionario=".$_SESSION['MM_UserId'];
			if(trim($_POST["buscar1"])!=""){  $sql_listado=$sql_listado." and v_parcela.idparcela like '%".strtoupper(trim($_POST['buscar1']))."%'";}
			if(trim($_POST["buscar2"])!=""){  $sql_listado=$sql_listado." and v_parcela.nombre like '%".strtoupper(trim($_POST['buscar2']))."%'";}
			if(trim($_POST["buscar3"])!=""){  $sql_listado=$sql_listado." and v_parcela.fecharegistro like '%".trim($_POST['buscar3'])."%'";}
			if(trim($_POST["buscar40"])!=""){  $sql_listado=$sql_listado." and v_parcela.superficie>".$_POST['buscar40'];}
			if(trim($_POST["buscar41"])!=""){  $sql_listado=$sql_listado." and v_parcela.superficie<".$_POST['buscar41'];}
			if(trim($_POST["buscar5"])!=""){  $sql_listado=$sql_listado." and upper(v_parcela.nombrepolitico) like '%".strtoupper(trim($_POST['buscar5']))."%'";}
			if($_POST["buscar6"]!='0'){  $sql_listado=$sql_listado." and upper(v_parcela.\"TipoProp\") like '%".strtoupper(substr(trim($_POST['buscar6']),0,4))."%'";}
			if($_POST["buscar7"]!='0'){  $sql_listado=$sql_listado." and upper(v_parcela.\"Clasificacion\") like '%".strtoupper(trim($_POST['buscar7']))."%'";}
			if($_POST["buscar8"]!='0'){  $sql_listado=$sql_listado." and upper(v_parcela.\"SitJur\") like '%".strtoupper(trim($_POST['buscar8']))."%'";}
			if($_POST["buscar9"]!='0'){  $sql_listado=$sql_listado." and upper(v_parcela.estado) like '%".strtoupper(trim($_POST['buscar9']))."%'";}
			
	 	  }
		  $sql_listado=$sql_listado." ORDER BY  fecharegistro DESC LIMIT 20";
	 }
else
	{
	  if (!(strrpos($_SESSION['MM_Rol'],'3')== false) || $_SESSION['MM_UserGroup']==188 || $_SESSION['MM_UserGroup']==189){
		   $sql_listado="Select * FROM v_parcela order by v_parcela.nombre LIMIT 20";
		 }elseif($_SESSION['MM_UserGroup']==183){
		   $sql_listado="Select v_parcela.* FROM v_parcela, funcionarioregistro
		    where v_parcela.idregistro = funcionarioregistro.idregistro AND
						  funcionarioregistro.idfuncionario=".$_SESSION['MM_UserId']." UNION
Select * FROM v_parcela where ( v_parcela.estado='HABILITADO')  ORDER BY  fecharegistro DESC LIMIT 20";
		}else{
			$sql_listado="Select * FROM v_parcela, funcionarioregistro
						  where  v_parcela.idregistro = funcionarioregistro.idregistro AND funcionarioregistro.idfuncionario=".$_SESSION['MM_UserId']." ORDER BY  fecharegistro DESC LIMIT 20";
	 	  }
	 
	}
	//echo $sql_listado;

if(isset($_REQUEST['Imprimir_y']))
{ 	
    $TipoPropiedad = $_REQUEST['tippro'];
    $CodParcelas = $_REQUEST['idp5'];
	$EstadoRegistroI = $_REQUEST['estparc'];
	
    echo $TipoPropiedad;
    echo $CodParcelas;
	
	
	if (strcmp($EstadoRegistroI, "RECHAZADO") == 0) { //PREDIO RECHAZADO
		ImprimirPredioRechazado($CodParcelas);
	}
    
	else{	//IMPRESION NORMAL
		switch ($TipoPropiedad) { 
		
		case "Agricola": 
			ImprimirPredioAgricola($CodParcelas);
		break; 
	   
		case "Ganadera": 
			ImprimirPredioGanadero($CodParcelas);
		break;
		
		case "Mixta Agropecuaria":
			ImprimirPredioMixto($CodParcelas);
		break; 
		
		case "Ganadera Lechera":
			ImprimirPredioMixto($CodParcelas);
		break;
		
		case "Reforestacion y/o Proteccion":
			ImprimirPredioRefCon($CodParcelas);
		break; 
		

		default:  
		}
	}
         
}	
	
	
?>
<HTML>
<HEAD><TITLE>listado</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<LINK href="../css/mdryt.css" type=text/css rel=stylesheet>
<script language="JavaScript" src="../scripts/funciones.js"></script>
<script language="JavaScript"> 
function pregunta(nombrep,copre){ 
   if (confirm('¿Estas seguro de elimimar la Parcela'+nombrep.value+' con codigo:'+copre.value+' ?'))
   	{document.form3.submit();return true;} 
   else
   	{alert("Tarea Cancelada");return false;}
} 
function pregunta2(nombrep,copre){ 
   if (confirm('¿Estas seguro de Habilitar para Edicion se bajara el estado a Evaluacion de la Parcela '+nombrep.value+' con codigo:'+copre.value+' ?'))
   	{document.form3.submit();return true;} 
   else
   	{alert("Tarea Cancelada");return false;}
} 
function pregunta3(nombrep,copre){ 
   if (confirm('¿Estas seguro de que desea cambiar el estado Habilitado la Parcela '+nombrep.value+' con codigo: '+copre.value+' ?'))
   	{document.form3.submit();return true;} 
   else
   	{alert("Tarea Cancelada");return false;}
} 
function pregunta4(){ 
   if (confirm('¿Estas seguro de Ingresar al Formulario de Pago la Parcela?'))
   	{	window.top.document.location.href="../Admin.php?id=5";return true;} 
   else
   	{alert("Tarea Cancelada");return false;}
	//parent.document.location.href="Admin.php?id=5";

} 
function pregunta5(nombrep,copre){ 
   if (alert('¿Estas seguro de que desea cambiar el codigo de la Parcela '+nombrep.value+' con codigo: '+copre.value+' ?'))
   	{window.open("cambiar_codpar.php?n=" + nombrep + "","Elegir Beneficiarios","width=500,height=600,scrollbars=yes,toolbar=no,status=no");} 
   else
   	{alert("No envio");return false;}
} 
</script> 

<style type="text/css">
<!--
.bot_atras {font-size: x-small;
	color: #FFFFFF;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	background-color: #006699;
}
-->
</style>
<BODY>
<div align="center">
<div id="oculto">
  <div class="ocultable" id="texto1">
    <div id="volanta"></div>
  </div>
</div>
<div align="center" class="texto">

    <b><big>Lista de Predios Registrados</big></b>
 
</div>

<table width="96%" cellpadding="0" cellspacing="0" class="taulaA" border="1" align="center">
<form action="ListadoPrediosSeguimiento.php" name="form" method="post" enctype="multipart/form-data">
<tr align="center">
  
  <td colspan="11">
    <p style='text-indent: 11em' class="texto" >
      <input type="submit" name="submit" value="Buscar Registro" class="boton"> 
      <a href="N_Nota.php">Nueva Nota</a></p>  </td>
  </tr>
<tr class="cabecera2" align="center">
  <td rowspan="2"><strong>#</strong></td>
  <td><strong>CODIGO PARCELA
    
  </strong></td>
  <td><strong>NOMBRE PREDIO
    
  </strong></td>
  <td><strong>FECHA REGISTRO
    
  </strong></td>
  <td><strong>SUPERFICIE TOTAL
      
</strong></td>
  <td><strong>MUNICIPIO PREDIO<br>
  </strong></td>
  <td><strong>TIPO PROPIEDAD
      
  </strong></td>
  <td><strong>ACTIVIDAD PREDIO<br></strong></td>
  <td><strong>SITUACION JURIDICA
      
  </strong></td>
  <td><strong>ESTADO
    REGISTRO
      
  </strong></td>
  <td rowspan="2"><strong>EDITAR REGISTRO</strong></td>
  
  <?php if(!(strrpos($_SESSION['MM_Rol'],'3')== false)){ ?>
  <?php }?>
  </tr>
<tr class="cabecera2" align="center">
  <td><strong>
    <input type="text" class="boxBusqueda4" name="buscar1" value=" <?php if(isset($_POST['buscar1'])){ echo trim($_POST['buscar1']);}?> ">
  </strong></td>
  <td><strong>
    <input type="text" class="boxBusqueda2" name="buscar2" value=" <?php if(isset($_POST['buscar2'])){ echo trim($_POST['buscar2']);}?> ">
  </strong></td>
  <td><strong>
    <input type="text" class="boxBusqueda4" name="buscar3" readonly >
  </strong></td>
  <td><strong>
    de:
        <input type="text" class="boxBusqueda1" name="buscar40" value=" <?php if(isset($_POST['buscar40'])){ echo trim($_POST['buscar40']);}?> " onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" >
    - a:
    <input type="text" class="boxBusqueda1" name="buscar41" value=" <?php if(isset($_POST['buscar41'])){ echo trim($_POST['buscar41']);}?> " onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" >
  </strong></td>
  <td><strong>
    <input type="text" class="boxBusqueda4" name="buscar5" value=" <?php if(isset($_POST['buscar5'])){ echo trim($_POST['buscar5']);}?> ">
  </strong></td>
  <td><strong>
    <select name="buscar6" class="combos" id="buscar6" style="width:90px" >
      <option value=0>ELEGIR ...</option>
      <?php 
		$sql_clasificador ="Select * From codificadores Where idclasificador=1 Order by nombrecodificador";
		$clasificador = pg_query($cn,$sql_clasificador) ;
		$row_clasificador = pg_fetch_array ($clasificador);
		
		do {   ?>
      <option  value="<?php echo $row_clasificador['nombrecodificador']?>"   <?php if(isset($_POST['buscar6']) && strcasecmp($_POST['buscar6'],$row_clasificador['nombrecodificador'])==0){ echo 'selected';}?> ><?php echo $row_clasificador['nombrecodificador']?></option>
      <?php } while ($row_clasificador = pg_fetch_assoc($clasificador));	?>
    </select>
  </strong></td>
  <td><strong>
    <select name="buscar7" class="combos" id="buscar7" style="width:90px">
      <option value=0>ELEGIR ...</option>
      <?php 
		$sql_clasificador ="Select * From codificadores Where idclasificador=8 Order by nombrecodificador";
		$clasificador = pg_query($cn,$sql_clasificador) ;
		$row_clasificador = pg_fetch_array ($clasificador);
		do { ?>
      <option value="<?php echo $row_clasificador['nombrecodificador']?>"  <?php if(isset($_POST['buscar7']) && strcasecmp($_POST['buscar7'],$row_clasificador['nombrecodificador'])==0){ echo 'selected';}?> > <?php echo $row_clasificador['nombrecodificador']?> </option>
      <?php } while ($row_clasificador = pg_fetch_assoc($clasificador));?>
    </select>
  </strong></td>
  <td><strong>
    <select name="buscar8" class="combos" id="buscar8" style="width:90px"  >
      <option value=0>ELEGIR ...</option>
      <?php 
		$sql_clasificador ="Select * From codificadores Where idclasificador=2 Order by nombrecodificador";
		$clasificador = pg_query($cn,$sql_clasificador) ;
		$row_clasificador = pg_fetch_array ($clasificador);
		
		do {   ?>
      < <?php if(isset($_POST['buscar8']) && strcasecmp($_POST['buscar8'],$row_clasificador['nombrecodificador'])==0){ echo 'selected';}?> > <?php echo $row_clasificador['nombrecodificador']?>< <?php if(isset($_POST['buscar8']) && strcasecmp($_POST['buscar8'],$row_clasificador['nombrecodificador'])==0){ echo 'selected';}?> > <?php echo $row_clasificador['nombrecodificador']?>< <?php if(isset($_POST['buscar8']) && strcasecmp($_POST['buscar8'],$row_clasificador['nombrecodificador'])==0){ echo 'selected';}?> > <?php echo $row_clasificador['nombrecodificador']?>< <?php if(isset($_POST['buscar8']) && strcasecmp($_POST['buscar8'],$row_clasificador['nombrecodificador'])==0){ echo 'selected';}?> > <?php echo $row_clasificador['nombrecodificador']?>< <?php if(isset($_POST['buscar8']) && strcasecmp($_POST['buscar8'],$row_clasificador['nombrecodificador'])==0){ echo 'selected';}?> > <?php echo $row_clasificador['nombrecodificador']?>< <?php if(isset($_POST['buscar8']) && strcasecmp($_POST['buscar8'],$row_clasificador['nombrecodificador'])==0){ echo 'selected';}?> > <?php echo $row_clasificador['nombrecodificador']?>< <?php if(isset($_POST['buscar8']) && strcasecmp($_POST['buscar8'],$row_clasificador['nombrecodificador'])==0){ echo 'selected';}?> > <?php echo $row_clasificador['nombrecodificador']?><option value="<?php echo $row_clasificador['nombrecodificador']?>" < <?php if(isset($_POST['buscar8']) && strcasecmp($_POST['buscar8'],$row_clasificador['nombrecodificador'])==0){ echo 'selected';}?> > <?php echo $row_clasificador['nombrecodificador']?></option>
      <?php } while ($row_clasificador = pg_fetch_assoc($clasificador));	?>
    </select>
  </strong></td>
  <td><strong>
    <select name="buscar9" class="combos" id="buscar9" style="width:90px"  >
      <option value=0>ELEGIR ...</option>
      <?php 
		$sql_clasificador ="Select * From codificadores Where idclasificador=21 Order by nombrecodificador";
		$clasificador = pg_query($cn,$sql_clasificador) ;
		$row_clasificador = pg_fetch_array ($clasificador);
		
		do {   ?>
      <option value="<?php echo $row_clasificador['nombrecodificador']?>"  <?php if(isset($_POST['buscar9']) && strcasecmp($_POST['buscar9'],$row_clasificador['nombrecodificador'])==0){ echo 'selected';}?> > <?php echo $row_clasificador['nombrecodificador']?></option>
      <?php } while ($row_clasificador = pg_fetch_assoc($clasificador));	?>
    </select>
  </strong></td>
</tr>
</form>
<?php
 ////////////////////////////////////////////////      
        

    // echo $sql_listado;
	$listado = pg_query($cn,$sql_listado);
	$row_listado = pg_fetch_array ($listado);
	$totalRows_listado = pg_num_rows($listado);
$con=1;
if($totalRows_listado>0){
do { 



?>
<tr  align="center">
  <td ><?php echo trim($con);?></td>
  <td ><?php echo trim($row_listado['idparcela']);?></td>
  <td ><?php echo trim($row_listado['nombre']);?></td>
  <td ><?php echo trim($row_listado['fecharegistro']);?></td>
  <td ><?php echo trim($row_listado['superficie']);?></td>
  <td ><?php echo trim($row_listado['nombrepolitico']);?></td>
  <td ><?php echo trim($row_listado['TipoProp']);?></td>
  <td ><?php echo trim($row_listado['Clasificacion']);?></td>
  <td ><?php echo trim($row_listado['SitJur']);?></td>
  <td ><?php echo trim($row_listado['estado']);?></td>
  <td >
  <?php if(trim($row_listado['estado'])!="HABILITADO" && trim($row_listado['estado'])!="RECHAZADO"){?>
    <form action="Formulario001.php" method="post" name="form1">
	 <input type='image' src='../images/editar.gif' onClick="this.form1.submit()"><input type="hidden" name="Actividad2" value="<?php echo $row_listado['clasificacionprog']; ?>">
     <input type="hidden" name="idreg" value="<?php echo $row_listado['idregistro']; ?>">
     <input type="hidden" name="Causal" value="<?php  if(strstr($row_listado['idparcela'], "R")==""){$a=0;}else{ $a=1;} echo $a; ?>">
    </form>
       <?php }?>     </td>
       
       <?php if(!(strrpos($_SESSION['MM_Rol'],'3')== false)){?>
    <?php }?>
  </tr>
   <?php $con=$con+1; } while ($row_listado = pg_fetch_assoc($listado));	
   }else{?>
   <tr>
   <td colspan="11" align="center" class="celdaRojo">
    <?php echo "No Existe Datos para esta consulta!!";?>	 </td>
     </tr>
   <?php }
   ?>
</table>
</BODY>
<?php
if(isset($_GET["msg"]))
	{$msg="<script>alert('Predio ";
	 $msg=$msg.$_GET["msg"];
	 $msg=$msg." Eliminado y toda su información relacionada')</script>";
	 echo $msg;	
	}
if(isset($_GET["msg2"]))
	{$msg="<script>alert('Predio ";
	 $msg=$msg.$_GET["msg2"];
	 $msg=$msg." ha cambiado su estado')</script>";
	 echo $msg;	
	}

?>