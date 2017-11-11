<?php
session_start();
set_time_limit(5000);
include "destroy_predio.php";
include "../reportes/reporte_predio_agricola.php";
include "../reportes/reporte_predio_ganadero.php";
include "../reportes/reporte_predio_mixto.php";
include "../reportes/reporte_predio_refcon.php";
include "../reportes/reporte_predio_rechazado.php";
include "../reportes/reporte_predio_avicola.php";
include "../reportes/reporte_predio_porcino.php";
include "../reportes/reporte_predio_agricola739.php";
include "../reportes/reporte_predio_ganadero739.php";
include "../reportes/reporte_predio_mixto739.php";
include "../reportes/reporte_predio_avicola739.php";
include "../reportes/reporte_predio_porcino739.php";
//require 'file';
include "../reportes/reporte_reprogramacion.php";

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
//print_r($_SESSION);
///////////////$post

///////////////BUSQUEDA///////////////////
if ( isset($_GET['buscar1']))
	{
	    if (!(strrpos($_SESSION['MM_Rol'],'3')== false) || $_SESSION['MM_UserGroup']==188 || $_SESSION['MM_UserGroup']==189){ //Administrador o Ucab muestre todo listado
		    $sql_listado="Select * FROM v_parcela  where v_parcela.estado !='' ";
			if(trim($_GET["buscar1"])!=""){  $sql_listado=$sql_listado." and v_parcela.idparcela like '%".strtoupper(trim($_GET['buscar1']))."%'";}
			if(trim($_GET["buscar2"])!=""){  $sql_listado=$sql_listado." and v_parcela.nombre like '%".strtoupper(trim($_GET['buscar2']))."%'";}
			//if(trim($_GET["buscar3"])!=""){  $sql_listado=$sql_listado." and v_parcela.fecharegistro like '%".trim($_GET['buscar3'])."%'";}
			if(trim($_GET["buscar40"])!=""){  $sql_listado=$sql_listado." and v_parcela.superficie>".$_GET['buscar40'];}
			if(trim($_GET["buscar41"])!=""){  $sql_listado=$sql_listado." and v_parcela.superficie<".$_GET['buscar41'];}
			if(trim($_GET["buscar5"])!=""){  $sql_listado=$sql_listado." and upper(v_parcela.nombrepolitico) like '%".strtoupper(trim($_GET['buscar5']))."%'";}
			if($_GET["buscar6"]!='0'){  $sql_listado=$sql_listado." and upper(v_parcela.\"TipoProp\") like '%".strtoupper(substr(trim($_GET['buscar6']),0,4))."%'";}
			if($_GET["buscar7"]!='0'){  $sql_listado=$sql_listado." and upper(v_parcela.\"Clasificacion\") like '%".strtoupper(trim($_GET['buscar7']))."%'";}
			if($_GET["buscar8"]!='0'){  $sql_listado=$sql_listado." and upper(v_parcela.\"SitJur\") like '%".strtoupper(trim($_GET['buscar8']))."%'";}
			if($_GET["buscar9"]!='0'){  $sql_listado=$sql_listado." and upper(v_parcela.estado) like '%".strtoupper(trim($_GET['buscar9']))."%'";}
		 }elseif($_SESSION['MM_UserGroup']==183){ ///los SIG muesta los registro q el haga y el registro del resto
		   $sql_listado="Select v_parcela.* FROM v_parcela,  funcionarioregistro
						  where v_parcela.idregistro = funcionarioregistro.idregistro AND funcionarioregistro.idfuncionario=".$_SESSION['MM_UserId'];
			if(trim($_GET["buscar1"])!=""){  $sql_listado=$sql_listado." and v_parcela.idparcela like '%".strtoupper(trim($_GET['buscar1']))."%'";}
			if(trim($_GET["buscar2"])!=""){  $sql_listado=$sql_listado." and v_parcela.nombre like '%".strtoupper(trim($_GET['buscar2']))."%'";}
			if(trim($_GET["buscar3"])!=""){  $sql_listado=$sql_listado." and v_parcela.fecharegistro like '%".trim($_GET['buscar3'])."%'";}
			if(trim($_GET["buscar40"])!=""){  $sql_listado=$sql_listado." and v_parcela.superficie>".$_GET['buscar40'];}
			if(trim($_GET["buscar41"])!=""){  $sql_listado=$sql_listado." and v_parcela.superficie<".$_GET['buscar41'];}
			if(trim($_GET["buscar5"])!=""){  $sql_listado=$sql_listado." and upper(v_parcela.nombrepolitico) like '%".strtoupper(trim($_GET['buscar5']))."%'";}
			if($_GET["buscar6"]!='0'){  $sql_listado=$sql_listado." and upper(v_parcela.\"TipoProp\") like '%".strtoupper(substr(trim($_GET['buscar6']),0,4))."%'";}
			if($_GET["buscar7"]!='0'){  $sql_listado=$sql_listado." and upper(v_parcela.\"Clasificacion\") like '%".strtoupper(trim($_GET['buscar7']))."%'";}
			if($_GET["buscar8"]!='0'){  $sql_listado=$sql_listado." and upper(v_parcela.\"SitJur\") like '%".strtoupper(trim($_GET['buscar8']))."%'";}
			$sql_listado=$sql_listado." and  v_parcela.estado='HABILITADO'";


			$sql_listado=$sql_listado." UNION ";

			$sql_listado=$sql_listado." Select * FROM v_parcela  where v_parcela.estado !='' ";
			if(trim($_GET["buscar1"])!=""){  $sql_listado=$sql_listado." and v_parcela.idparcela like '%".strtoupper(trim($_GET['buscar1']))."%'";}
			if(trim($_GET["buscar2"])!=""){  $sql_listado=$sql_listado." and v_parcela.nombre like '%".strtoupper(trim($_GET['buscar2']))."%'";}
			//if(trim($_GET["buscar3"])!=""){  $sql_listado=$sql_listado." and v_parcela.fecharegistro like '%".trim($_GET['buscar3'])."%'";}
			if(trim($_GET["buscar40"])!=""){  $sql_listado=$sql_listado." and v_parcela.superficie>".$_GET['buscar40'];}
			if(trim($_GET["buscar41"])!=""){  $sql_listado=$sql_listado." and v_parcela.superficie<".$_GET['buscar41'];}
			if(trim($_GET["buscar5"])!=""){  $sql_listado=$sql_listado." and upper(v_parcela.nombrepolitico) like '%".strtoupper(trim($_GET['buscar5']))."%'";}
			if($_GET["buscar6"]!='0'){  $sql_listado=$sql_listado." and upper(v_parcela.\"TipoProp\") like '%".strtoupper(substr(trim($_GET['buscar6']),0,4))."%'";}
			if($_GET["buscar7"]!='0'){  $sql_listado=$sql_listado." and upper(v_parcela.\"Clasificacion\") like '%".strtoupper(trim($_GET['buscar7']))."%'";}
			if($_GET["buscar8"]!='0'){  $sql_listado=$sql_listado." and upper(v_parcela.\"SitJur\") like '%".strtoupper(trim($_GET['buscar8']))."%'";}
			if($_GET["buscar9"]!='0'){  $sql_listado=$sql_listado." and upper(v_parcela.estado) like '%".strtoupper(trim($_GET['buscar9']))."%'";}

		 } else{ //resto registradores
			$sql_listado="Select v_parcela.* FROM v_parcela,  funcionarioregistro
						  where v_parcela.idregistro = funcionarioregistro.idregistro AND  funcionarioregistro.idfuncionario=".$_SESSION['MM_UserId'];
			if(trim($_GET["buscar1"])!=""){  $sql_listado=$sql_listado." and v_parcela.idparcela like '%".strtoupper(trim($_GET['buscar1']))."%'";}
			if(trim($_GET["buscar2"])!=""){  $sql_listado=$sql_listado." and v_parcela.nombre like '%".strtoupper(trim($_GET['buscar2']))."%'";}
			//if(trim($_GET["buscar3"])!=""){  $sql_listado=$sql_listado." and v_parcela.fecharegistro like '%".trim($_GET['buscar3'])."%'";}
			if(trim($_GET["buscar40"])!=""){  $sql_listado=$sql_listado." and v_parcela.superficie>".$_GET['buscar40'];}
			if(trim($_GET["buscar41"])!=""){  $sql_listado=$sql_listado." and v_parcela.superficie<".$_GET['buscar41'];}
			if(trim($_GET["buscar5"])!=""){  $sql_listado=$sql_listado." and upper(v_parcela.nombrepolitico) like '%".strtoupper(trim($_GET['buscar5']))."%'";}
			if($_GET["buscar6"]!='0'){  $sql_listado=$sql_listado." and upper(v_parcela.\"TipoProp\") like '%".strtoupper(substr(trim($_GET['buscar6']),0,4))."%'";}
			if($_GET["buscar7"]!='0'){  $sql_listado=$sql_listado." and upper(v_parcela.\"Clasificacion\") like '%".strtoupper(trim($_GET['buscar7']))."%'";}
			if($_GET["buscar8"]!='0'){  $sql_listado=$sql_listado." and upper(v_parcela.\"SitJur\") like '%".strtoupper(trim($_GET['buscar8']))."%'";}
			if($_GET["buscar9"]!='0'){  $sql_listado=$sql_listado." and upper(v_parcela.estado) like '%".strtoupper(trim($_GET['buscar9']))."%'";}

	 	  }
		  $sql_listado=$sql_listado." ORDER BY  fecharegistro DESC";
	 }
else
	{
	  if (!(strrpos($_SESSION['MM_Rol'],'3')== false) || $_SESSION['MM_UserGroup']==188 || $_SESSION['MM_UserGroup']==189){
		   $sql_listado="Select * FROM v_parcela order by v_parcela.nombre ";
		 }elseif($_SESSION['MM_UserGroup']==183){
		   $sql_listado="Select v_parcela.* FROM v_parcela, funcionarioregistro
		    where v_parcela.idregistro = funcionarioregistro.idregistro AND
						  funcionarioregistro.idfuncionario=".$_SESSION['MM_UserId']." UNION
Select * FROM v_parcela where ( v_parcela.estado='HABILITADO')  ORDER BY  fecharegistro DESC";
		}else{
			$sql_listado="Select * FROM v_parcela, funcionarioregistro
						  where  v_parcela.idregistro = funcionarioregistro.idregistro AND funcionarioregistro.idfuncionario=".$_SESSION['MM_UserId']." ORDER BY  fecharegistro DESC";
	 	  }

	}
	//echo $sql_listado;
		$_pagi_sql = $sql_listado;
        //cantidad de resultados por pagina (opcional, por defecto 20)
        $_pagi_cuantos = 20;
        $_pagi_nav_num_enlaces = 10;
        include("../scripts/paginator.inc.php");



if(isset($_REQUEST['Imprimir_y']))
{
    $TipoPropiedad = $_REQUEST['tippro'];
    $CodParcelas = $_REQUEST['idp5'];
      $CodRegistro = $_REQUEST['idreg'];
	$EstadoRegistroI = $_REQUEST['estparc'];

    // echo $TipoPropiedad;
    // echo $CodParcelas;
	/* ################### verificacion de fechasuscripcion############# */
  $sql_suscripcion = "SELECT r.idregistro, fecharegistro, fechasuscripcion
from registro as r full join fechasregistro as fr on r.idregistro = fr.idregistro
where r.idregistro =".$CodRegistro;

    $resultSuscripcion = pg_query($cn,$sql_suscripcion) ;
  $row_Suscripcion = pg_fetch_array ($resultSuscripcion);
  // $today = date("Y-m-d");
$fechasuscripcion = $row_Suscripcion['fechasuscripcion']; //from db
echo "fecha subcripcion registro ".$fechasuscripcion;
$periodo1_time = date($today="2015-09-29");


$periodo=2;
if ($fechasuscripcion!="") {
$predio_time = Date('Y-m-d', strtotime($fechasuscripcion));
if($periodo1_time > $predio_time){
  $periodo=1;
}
}

	if (strcmp($EstadoRegistroI, "RECHAZADO") == 0) { //PREDIO RECHAZADO
		if ($periodo==1) {
			# code...
			ImprimirPredioRechazado($CodParcelas);
			}
			if ($periodo==2) {
			ImprimirPredioRechazado($CodParcelas);
	}
	}

	else{	//IMPRESION NORMAL
		switch ($TipoPropiedad) {

		case "Agricola":
		if ($periodo==1) {
			ImprimirPredioAgricola($CodParcelas);
				}
		if ($periodo==2) {
			ImprimirPredioAgricola739($CodParcelas);
				}
		break;

		case "Ganadera":
if ($periodo==1) {
			ImprimirPredioGanadero($CodParcelas);
		}
		if ($periodo==2) {
			ImprimirPredioGanadero739($CodParcelas);
		}
		break;

		case "Mixta Agropecuaria":
if ($periodo==1) {
			ImprimirPredioMixto($CodParcelas);
		}
		if ($periodo==2) {
			ImprimirPredioMixto739($CodParcelas);
		}
		break;

		case "Ganadera Lechera":
if ($periodo==1) {
			ImprimirPredioMixto($CodParcelas);
		}
		if ($periodo==2) {
			ImprimirPredioMixto739($CodParcelas);
		}
		break;

		case "Reforestacion y/o Proteccion":
		if ($periodo==1) {
			ImprimirPredioRefCon($CodParcelas);
		}
		if ($periodo==2) {
			ImprimirPredioRefCon($CodParcelas);
		}
		break;

		case "Forestal":
	if ($periodo==1) {
			ImprimirPredioRefCon($CodParcelas);
		}

	if ($periodo==2) {
			ImprimirPredioRefCon($CodParcelas);
		}
		break;

    case "Otras Actividades":
  if ($periodo==1) {
      ImprimirPredioRefCon($CodParcelas);
    }

  if ($periodo==2) {
      ImprimirPredioRefCon($CodParcelas);
    }
    break;

		case "Agricola-Avicola":
		if ($periodo==1) {
			ImprimirPredioAvicola($CodParcelas);
		}
		if ($periodo==2) {
			ImprimirPredioAvicola739($CodParcelas);
		}
		break;

		case "Agricola-Porcina":
		if ($periodo==1) {
			ImprimirPredioPorcino($CodParcelas);
		}
		if ($periodo==2) {
			ImprimirPredioPorcino739($CodParcelas);
		}
		break;

		default:
		}
	}

}




if(isset($_REQUEST['Imprimirreprog_y']))
{
    $TipoPropiedad = $_REQUEST['tippro'];
    $CodParcelas = $_REQUEST['idp5'];
      $CodRegistro = $_REQUEST['idreg'];
	$EstadoRegistroI = $_REQUEST['estparc'];

    // echo $TipoPropiedad;
    // echo $CodParcelas;
	/* ################### verificacion de fechasuscripcion############# */
  $sql_suscripcion = "SELECT r.idregistro, fecharegistro, fechasuscripcion
from registro as r full join fechasregistro as fr on r.idregistro = fr.idregistro
where r.idregistro =".$CodRegistro;

    $resultSuscripcion = pg_query($cn,$sql_suscripcion) ;
  $row_Suscripcion = pg_fetch_array ($resultSuscripcion);
  // $today = date("Y-m-d");
$fechasuscripcion = $row_Suscripcion['fechasuscripcion']; //from db
echo "fecha subcripcion registro ".$fechasuscripcion;
$periodo1_time = date($today="2015-09-29");


$periodo=2;
if ($fechasuscripcion!="") {
$predio_time = Date('Y-m-d', strtotime($fechasuscripcion));
if($periodo1_time > $predio_time){
  $periodo=1;
}
}

//ImprimirPredioAgricola($CodParcelas);
imprimirformularioreprogramacion($CodParcelas,$TipoPropiedad,$periodo);

}









?>
<HTML>
<HEAD>
<TITLE>Listado</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<LINK href="../css/mdryt.css" type=text/css rel=stylesheet>
<link rel="stylesheet" type="text/css" href="../css/button.css"/>
<script language="JavaScript" src="../scripts/funciones.js"></script>

     <script src="../libraries/jquery-ui-1.10.2/jquery-1.9.1.js"></script>
    <script>
        $(window).keypress(function(e) {
        if(e.keyCode == 13) {
        //haz lo que quieras cuando presionene enter
        document.form.submit();
        }
        });
    </script>


<script language="JavaScript">



function pregunta(nombrep,copre){
   if (confirm('¿Estas seguro de elimimar la Parcela'+nombrep.value+' con codigo:'+copre.value+' ?'))
   	{document.form3.submit();return true;}
   else
   	{alert("Tarea Cancelada");return false;}
}

function pregunta2(nombrep,copre){
   if (confirm('¿Estas seguro de Habilitar para Modificacion la Parcela '+nombrep.value+' con codigo:'+copre.value+' ?'))
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
   //if (confirm('¿Estas seguro de Ingresar al Formulario de Pago la Parcela?'))
   	//{	window.top.document.location.href="../Admin.php?id=5";return true;}
   //else
   	//{alert("Tarea Cancelada");return false;}
	//parent.document.location.href="Admin.php?id=5";

}
function pregunta5(nombrep,copre){
   if (alert('¿Estas seguro de que desea cambiar el codigo de la Parcela '+nombrep.value+' con codigo: '+copre.value+' ?'))
   	{window.open("cambiar_codpar.php?n=" + nombrep + "","Elegir Beneficiarios","width=500,height=600,scrollbars=yes,toolbar=no,status=no");}
   else
   	{alert("No envio");return false;}
}


</script>




 </HEAD>



<BODY>
<div align="center">

	<div id="oculto">
	  <div class="ocultable" id="texto1">
		<div id="volanta"></div>
	  </div>
	</div>

	<div align="center" class="texto">
			<p>	<h1>LISTA DE CARPETAS REGISTRADAS</h1></p>
	</div>



<div class="CSSTable" >
     <form action="ListadoPredios.php" id="form" name="form" method="get" enctype="multipart/form-data">

		   <table>
	 			<td rowspan = "2">
				<strong><a class="boton verde formaBoton" href="javascript:document.form.submit();">BUSCAR</a></strong>
				</td>
			</table >


			<table >
					<tr class="" >
					  <td><strong>#</strong></td>

					  <td>
							<strong>CODIGO PARCELA</strong>
							<strong>
								<input type="text" class="boxBusqueda4" name="buscar1" value=" <?php if(isset($_GET['buscar1'])){ echo trim($_GET['buscar1']);}?> ">
							</strong>
					  </td>

					  <td>
							<strong>NOMBRE PREDIO</strong>
							<strong>
								<input type="text" class="boxBusqueda2" name="buscar2" value=" <?php if(isset($_GET['buscar2'])){ echo trim($_GET['buscar2']);}?> ">
							</strong>
					  </td>

					<!--  <td>
							<strong>FECHA REGISTRO</strong>
							<strong>
								<input type="text" class="boxBusqueda4" name="buscar3" readonly >
							</strong>
					  </td>
          -->

					  <td>
							<strong>SUPERFICIE TOTAL</strong>
								  <strong>
									   de:
										<input type="text" class="boxBusqueda1" name="buscar40" value=" <?php if(isset($_GET['buscar40'])){ echo trim($_GET['buscar40']);}?> " onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" >
									  - a:
									<input type="text" class="boxBusqueda1" name="buscar41" value=" <?php if(isset($_GET['buscar41'])){ echo trim($_GET['buscar41']);}?> " onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" >
								  </strong>
					  </td>


					  <td>
							<strong>MUNICIPIO</strong>
							<strong>
								<input type="text" class="boxBusqueda4" name="buscar5" value=" <?php if(isset($_GET['buscar5'])){ echo trim($_GET['buscar5']);}?> ">
							</strong>
					  </td>

					  <td>
							<strong>TIPO PROPIEDAD</strong>
							<strong>
							<select name="buscar6" class="combos" id="buscar6" style="width:90px" >
							  <option value=0>ELEGIR ...</option>
							  <?php
								$sql_clasificador ="Select * From codificadores Where idclasificador=1 Order by nombrecodificador";
								$clasificador = pg_query($cn,$sql_clasificador) ;
								$row_clasificador = pg_fetch_array ($clasificador);

								do {   ?>
							  <option  value="<?php echo $row_clasificador['nombrecodificador']?>"   <?php if(isset($_GET['buscar6']) && strcasecmp($_GET['buscar6'],$row_clasificador['nombrecodificador'])==0){ echo 'selected';}?> ><?php echo $row_clasificador['nombrecodificador']?></option>
							  <?php } while ($row_clasificador = pg_fetch_assoc($clasificador));	?>
							</select>
						    </strong>
					  </td>

					  <td>
							<strong>ACTIVIDAD PREDIO</strong>
							<strong>
							<select name="buscar7" class="combos" id="buscar7" style="width:90px">
							  <option value=0>ELEGIR ...</option>
							  <?php
								$sql_clasificador ="Select * From codificadores Where idclasificador=8 and orden = 1 Order by nombrecodificador";
								$clasificador = pg_query($cn,$sql_clasificador) ;
								$row_clasificador = pg_fetch_array ($clasificador);
								do { ?>
							  <option value="<?php echo $row_clasificador['nombrecodificador']?>"  <?php if(isset($_GET['buscar7']) && strcasecmp($_GET['buscar7'],$row_clasificador['nombrecodificador'])==0){ echo 'selected';}?> > <?php echo $row_clasificador['nombrecodificador']?> </option>
							  <?php } while ($row_clasificador = pg_fetch_assoc($clasificador));?>
							</select>
						    </strong>
					  </td>


					  <td>
							<strong>SITUACION JURIDICA</strong>
							<strong>
							<select name="buscar8" class="combos" id="buscar8" style="width:90px"  >
							  <option value=0>ELEGIR ...</option>
							  <?php
								$sql_clasificador ="Select * From codificadores Where idclasificador=2 Order by nombrecodificador";
								$clasificador = pg_query($cn,$sql_clasificador) ;
								$row_clasificador = pg_fetch_array ($clasificador);

								do {   ?>
							  < <?php if(isset($_GET['buscar8']) && strcasecmp($_GET['buscar8'],$row_clasificador['nombrecodificador'])==0){ echo 'selected';}?> >
							  <?php echo $row_clasificador['nombrecodificador']?><
							  <?php if(isset($_GET['buscar8']) && strcasecmp($_GET['buscar8'],$row_clasificador['nombrecodificador'])==0){ echo 'selected';}?> >
							  <?php echo $row_clasificador['nombrecodificador']?><
							  <?php if(isset($_GET['buscar8']) && strcasecmp($_GET['buscar8'],$row_clasificador['nombrecodificador'])==0){ echo 'selected';}?> >
							  <?php echo $row_clasificador['nombrecodificador']?>< <?php if(isset($_GET['buscar8']) && strcasecmp($_GET['buscar8'],$row_clasificador['nombrecodificador'])==0){ echo 'selected';}?> >
							  <?php echo $row_clasificador['nombrecodificador']?>< <?php if(isset($_GET['buscar8']) && strcasecmp($_GET['buscar8'],$row_clasificador['nombrecodificador'])==0){ echo 'selected';}?> >
							  <?php echo $row_clasificador['nombrecodificador']?>< <?php if(isset($_GET['buscar8']) && strcasecmp($_GET['buscar8'],$row_clasificador['nombrecodificador'])==0){ echo 'selected';}?> >
							  <?php echo $row_clasificador['nombrecodificador']?>< <?php if(isset($_GET['buscar8']) && strcasecmp($_GET['buscar8'],$row_clasificador['nombrecodificador'])==0){ echo 'selected';}?> >
							  <?php echo $row_clasificador['nombrecodificador']?><option value="<?php echo $row_clasificador['nombrecodificador']?>" < <?php if(isset($_GET['buscar8']) && strcasecmp($_GET['buscar8'],$row_clasificador['nombrecodificador'])==0){ echo 'selected';}?> > <?php echo $row_clasificador['nombrecodificador']?></option>
							  <?php } while ($row_clasificador = pg_fetch_assoc($clasificador));	?>
							</select>
						    </strong>
					  </td>

					  <td>
							<strong>ESTADO</strong>
							<strong>
							<select name="buscar9" class="combos" id="buscar9" style="width:90px"  >
							  <option value=0>ELEGIR ...</option>
							  <?php
								$sql_clasificador ="Select * From codificadores Where idclasificador=21 and orden = 1 Order by nombrecodificador";
								$clasificador = pg_query($cn,$sql_clasificador) ;
								$row_clasificador = pg_fetch_array ($clasificador);

								do {   ?>
							  <option value="<?php echo $row_clasificador['nombrecodificador']?>"  <?php if(isset($_GET['buscar9']) && strcasecmp($_GET['buscar9'],$row_clasificador['nombrecodificador'])==0){ echo 'selected';}?> > <?php echo $row_clasificador['nombrecodificador']?></option>
							  <?php } while ($row_clasificador = pg_fetch_assoc($clasificador));	?>
							</select>
						    </strong>
					  </td>

					  <td>
							<strong>EDITAR REG.</strong>
					  </td>



					  <td>
							<strong>HAB.</strong>
					  </td>

            <?php if(!(strrpos($_SESSION['MM_Rol'],'3')== false)){ ?>
					  <td>
							<strong>HAB. EDICION</strong>
					  </td>
					  <?php }?>
					  <td>
							<strong>IMPRIMIR FORM.</strong>
					  </td>

					  <td>
							<strong>BOLETA DE PAGO</strong>
					  </td>


            <td>
							<strong>REPRO GRAMACION</strong>
					  </td>

            <td>
              <strong>IMP. FORM. REPROG.</strong>
            </td>

			</form>
					<?php
					 ////////////////////////////////////////////////


						// echo $sql_listado;
						  $listado = pg_query($cn, $sql_listado);
										$row_listado = pg_fetch_array($_pagi_result);
										$totalRows_listado = pg_num_rows($_pagi_result);
										$con = 1;


					if($totalRows_listado>0){
					do {



					?>
					<tr  align="center">
					  <td ><?php echo trim($con);?></td>
					  <td ><?php echo trim($row_listado['idparcela']);?></td>
					  <td ><?php echo trim($row_listado['nombre']);?></td>
					  <!-- <td ><?php //echo trim($row_listado['fecharegistro']);?></td> -->
					  <td ><?php echo trim($row_listado['superficie']);?></td>
					  <td ><?php echo trim($row_listado['nombrepolitico']);?></td>
					  <td ><?php echo trim($row_listado['TipoProp']);?></td>
					  <td ><?php echo trim($row_listado['Clasificacion']);?></td>
					  <td ><?php echo trim($row_listado['SitJur']);?></td>
					  <td <?php if (trim($row_listado['estado'])=="HABILITADO")	{ ?> bgcolor="#7fc345"	<?php	}  elseif (trim($row_listado['estado'])=="Habilitado para Modificar") {?>  bgcolor="#98f139"	<?php	}  elseif (trim($row_listado['estado'])=="RECHAZADO") {?>  bgcolor="#f74d59"	<?php	} elseif (trim($row_listado['estado'])=="Boleta Preliquidacion Generada") { ?> bgcolor="#f4f87d" <?php	} elseif (trim($row_listado['estado'])=="EN EVALUACION") { ?> bgcolor="#ffcc66" <?php	} ?> >
              <div style="text-align:center;">
               <strong> <?php echo trim($row_listado['estado']);?> </strong>
              </div>
            </td>

					  <td >
              <div style="text-align:center;">
      					  <?php if(trim($row_listado['estado'])!="HABILITADO" ){?>
      						<form align = "middle" action="Formulario001.php" method="post" name="form1">
      						 <input type='image'  width="28" src='../images/logosdos/editar.png' onClick="this.form1.submit()"><input type="hidden" name="Actividad2" value="<?php echo $row_listado['clasificacionprog']; ?>">
      						 <input type="hidden" name="idreg" value="<?php echo $row_listado['idregistro']; ?>">
      						 <input type="hidden" name="Causal" value="<?php  if(strstr($row_listado['idparcela'], "R")==""){$a=0;}else{ $a=1;} echo $a; ?>">
      						</form>
      						   <?php }?>
                </div>
            </td>


						<td>
                <div style="text-align:center;">
               <?php if(trim($row_listado['estado'])=="Habilitado para Modificar" ){?>
							 <form align = "middle" action="eliminar_registro.php" method="post" name="form2" onSubmit="return pregunta3(n7,idp7)">
							   <input type='image'  width="28" src='../images/finalizar.png' onClick="this.form2.submit()">
							   <input type="hidden" name="idp6" value="<?php echo $row_listado['idregistro']; ?>">
							   <input type="hidden" name="idp7" value="<?php echo $row_listado['idparcela']; ?>">
							   <input type="hidden" name="n7" value="<?php echo trim($row_listado['nombre']); ?>">
							 </form>
						   <?php }?>
               </div>
            </td>


               <?php if(!(strrpos($_SESSION['MM_Rol'],'3')== false)){?>

						<td >
              <div style="text-align:center;">
    						 <?php if((trim($row_listado['estado'])!="EN EVALUACION" && trim($row_listado['estado'])!="Habilitado para Modificar" ) && trim($row_listado['estado'])!="RECHAZADO" && trim($row_listado['estado'])!="Boleta Preliquidacion Generada"){?>
    						 <form align = "middle" action="eliminar_registro.php" method="post" name="form2" onSubmit="return pregunta2(n7,idp7)">
    						   <input type='image'  width="28" src='../images/habilitaredicion.png' onClick="this.form2.submit()">
    						   <input type="hidden" name="idp5" value="<?php echo $row_listado['idregistro']; ?>">
    						<input type="hidden" name="idp7" value="<?php echo $row_listado['idparcela']; ?>">
    						 <input type="hidden" name="n7" value="<?php echo trim($row_listado['nombre']); ?>">
    					  </form>
    					  <?php }?>
              </div>
           </td>

					  <?php }?>

            <?php
                  $consulta = "select * from solicitudrecepcionada where tiposolicitud = 4 and codigoparcela ='".$row_listado['idparcela']."'";
                  $tienesolicitud = pg_query($cn, $consulta);
                  $row_tienesolicitud = pg_fetch_array($tienesolicitud);
            ?>


					  <td >
              <div style="text-align:center;">

                <?php

                if(trim($row_tienesolicitud['idsolicitudrecepcionada'])==null){?>
    						  <form align = "middle" action="ListadoPredios.php" method="post" name="form4">
    							<input id='Imprimir' name='Imprimir' type='image' width="28" src="../images/logosdos/impresora2.png" value="Imprimir" alt="Imprimir">
    							<input type="hidden" name="idreg" value="<?php echo $row_listado['idregistro']; ?>">
    							<input type="hidden" name="idp5" value="<?php echo $row_listado['idparcela']; ?>">
    							<input type="hidden" name="tippro" value="<?php echo trim($row_listado['clasificacionprog']); ?>">
    							<input type="hidden" name="estparc" value="<?php echo trim($row_listado['estado']); ?>">
    						  </form>

                  <?php
                  }
                  ?>

              </div>
					 </td>



					  <td>
              <div style="text-align:center;">


                  <?php //if(trim($row_listado['estado'])!="EN EVALUACION" && trim($row_listado['estado'])!="RECHAZADO"){?>

                    <?php if(!(strrpos($_SESSION['MM_Rol'],'3')== false)){?>

    					<form align = "middle" action="N_Recibo.php" method="post" name="form2" onSubmit="return pregunta4()">
    						  <input type='image' width="38" src='../images/logosdos/pagar.png' onClick="this.form2.submit()">
    						  <input type="hidden" name="New_Pago" value="Pagos">
    						  <input type="hidden" name="idreg" value="<?php echo $row_listado['idregistro']; ?>">
    						</form>
    						<?php }?>



             </div>
          </td>





          <td >
            <div style="text-align:center;">
                <?php

                if(trim($row_tienesolicitud['idsolicitudrecepcionada'])!=null){?>
                <form align = "middle" action="Formulario001.php" method="post" name="form1">
                 <input type='image'  width="28" src='../images/logosdos/editar.png' onClick="this.form1.submit()"><input type="hidden" name="Actividad2" value="<?php echo $row_listado['clasificacionprog']; ?>">
                 <input type="hidden" name="idreg" value="<?php echo $row_listado['idregistro']; ?>">
                 <input type="hidden" name="Causal" value="<?php  if(strstr($row_listado['idparcela'], "R")==""){$a=0;}else{ $a=1;} echo $a; ?>">
                </form>
                 <?php
                 }
                 ?>
            </div>
          </td>


          <td >
            <div style="text-align:center;">
              <?php if(trim($row_tienesolicitud['idsolicitudrecepcionada'])!=null){?>
                <form align = "middle" action="ListadoPredios.php" method="post" name="form4">
                <input id='Imprimirreprog' name='Imprimirreprog' type='image' width="28" src="../images/logosdos/impresora2.png" value="Imprimir" alt="Imprimir">
                <input type="hidden" name="idreg" value="<?php echo $row_listado['idregistro']; ?>">
                <input type="hidden" name="idp5" value="<?php echo $row_listado['idparcela']; ?>">
                <input type="hidden" name="tippro" value="<?php echo trim($row_listado['clasificacionprog']); ?>">
                <input type="hidden" name="estparc" value="<?php echo trim($row_listado['estado']); ?>">
                </form>
                <?php } ?>
            </div>
          </td>








					</tr>
					   <?php $con=$con+1; } while ($row_listado = pg_fetch_assoc($_pagi_result));
					   }else{?>
					   <tr>
					   <td colspan="16" align="center" class="celdaRojo">
						<?php echo "No Existe Datos para esta Consulta!";?>	 </td>
						 </tr>
					   <?php }
					   ?>
			</table>
</DIV>
            <?php  echo "<p>" . $_pagi_navegacion . "</p>";
                    ?>


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
