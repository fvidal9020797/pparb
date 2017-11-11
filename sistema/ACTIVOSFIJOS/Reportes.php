<?php
session_start();
set_time_limit(5000);
/*include "destroy_predio.php";*/
include "../valid.php";
ini_set('max_execution_time', 600);
?>
<!DOCTYPE html>
<HTML>
<HEAD><TITLE>Reporte</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/mdryt.css" type="text/css" rel="stylesheet">

<style type="text/css">

.demo {
border-radius: 0px 0px 2px 2px;
box-shadow: 0px 0px 0px 1px #75af73;
}

.demo2 {
border-radius: 5px 5px 1px 1px;
box-shadow: 0px 0px 0px 1px #032c02;
}
a:link {
color: #FFF;
text-decoration: none;
}
a:visited {
text-decoration: none;
color: #FFF;
}
a:hover {
text-decoration: underline;
color: #FFF;
}
a:active {
	text-decoration: none;
	color: #FFF;
}


</style>




<script language="JavaScript" src="../scripts/funciones.js"></script>
<script language="JavaScript">
function pregunta(nombrep,copre){
   if (confirm('¿Estas seguro de elimimar la Parcela'+nombrep.value+' con codigo:'+copre.value+' ?'))
   	{document.form3.submit();return true;}
   else
   	{alert("No envio");return false;}
}
function pregunta2(nombrep,copre){
   if (confirm('¿Estas seguro de Habilitar la Parcela'+nombrep.value+' con codigo:'+copre.value+' ?'))
   	{document.form3.submit();return true;}
   else
   	{alert("No envio");return false;}
}
function pregunta4(){
   if (confirm('¿Estas seguro de Habilitar la Parcela?'))
   	{	window.top.document.location.href="../Admin.php?id=5";return true;}
   else
   	{alert("No envio");return false;}
	//parent.document.location.href="Admin.php?id=5";

}

</script>
</head>
<BODY>
<div align="center">
<div id="oculto">
  <div class="ocultable" id="texto1">
    <div id="volanta"></div>
  </div>
</div>
<div align="center" class="texto">

</div>
 <table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr align="center">
        <?php
		//print_r($_GET);
		if (permisos($cn,"Report_Predios.php"))
			{
			?>
	        <td width="10%" bgcolor="<?php if($_GET["id"]==1) {echo "#032c02";} else {echo "#75af73";} ?>" class="<?php if($_GET["id"]==1) {echo "demo2";} else {echo "demo";} ?>">
    	    <strong><font color="#FFFFFF"><a href="Reportes.php?id=1">Predios</a></font></strong></td>
        <?php
        	}
                if (permisos($cn,"Report_Superficies.php"))
			{
			?>
        	<td width="10%" bgcolor="<?php if($_GET["id"]==2) {echo "#032c02";} else {echo "#75af73";} ?>" class="<?php if($_GET["id"]==2) {echo "demo2";} else {echo "demo";} ?>">
	        <strong><font color="#FFFFFF"><a href="Reportes.php?id=2">Superficies</a></font></strong></td>
      <?php
        	}
		if (permisos($cn,"Report_Pagos.php"))
			{
			?>
        	<td width="10%" bgcolor="<?php if($_GET["id"]==8) {echo "#032c02";} else {echo "#75af73";} ?>" class="<?php if($_GET["id"]==8) {echo "demo2";} else {echo "demo";} ?>">
	        <strong><font color="#FFFFFF"><a href="Reportes.php?id=8">Preliquidación</a></font></strong></td>
      <?php
        	}
		if (permisos($cn,"Report_Pagos.php"))
			{
			?>
        	<td width="10%" bgcolor="<?php if($_GET["id"]==3) {echo "#032c02";} else {echo "#75af73";} ?>" class="<?php if($_GET["id"]==3) {echo "demo2";} else {echo "demo";} ?>">
	        <strong><font color="#FFFFFF"><a href="Reportes.php?id=3">Pagos</a></font></strong></td>
      <?php
        	}
		if (permisos($cn,"Report_Especies.php"))
			{
			?>
            <td width="10%" bgcolor="<?php if($_GET["id"]==4) {echo "#032c02";} else {echo "#75af73";} ?>"  class="<?php if($_GET["id"]==4) {echo "demo2";} else {echo "demo";} ?>">
            <strong><font color="#FFFFFF"><a href="Reportes.php?id=4">Especies</a></font></strong></td>
            <?php
        	}
                if (permisos($cn,"Report_Cultivos.php"))
			{
			?>
            <td width="10%" bgcolor="<?php if($_GET["id"]==5) {echo "#032c02";} else {echo "#75af73";} ?>"  class="<?php if($_GET["id"]==5) {echo "demo2";} else {echo "demo";} ?>">
            <strong><font color="#FFFFFF"><a href="Reportes.php?id=5">Cultivos</a></font></strong></td>
            <?php
        	}
                    if (permisos($cn,"Report_Ganadera.php"))
			{
			?>
            <td width="10%" bgcolor="<?php if($_GET["id"]==6) {echo "#032c02";} else {echo "#75af73";} ?>"  class="<?php if($_GET["id"]==6) {echo "demo2";} else {echo "demo";} ?>">
            <strong><font color="#FFFFFF"><a href="Reportes.php?id=6">Ganadera</a></font></strong></td>
            <?php
        	}
			if (permisos($cn,"Report_Resumen.php"))
			{
		   ?>
            <td width="10%" bgcolor="<?php if($_GET["id"]==7) {echo "#032c02";} else {echo "#75af73";} ?>"  class="<?php if($_GET["id"]==7) {echo "demo2";} else {echo "demo";} ?>">
             <strong><font color="#FFFFFF"><a href="Reportes.php?id=7">Resumen</a></font></strong></td>
          <?php
        	}
		?>
        </tr>
        <tr><td class="taulaA" >
            <?php
            //include "Valid.php";
            if (!isset( $_GET["id"]))
                $opc =0;
            else
                $opc= $_GET["id"];
            switch ($opc)
                    {
                    case 1: $m="Report_Predios.php";break;
                    case 2: $m="Report_Superficies.php";break;
                    case 3: $m="Report_pagos.php";break;
                    case 4: $m="Report_Especies.php";break;
                    case 5: $m="Report_Cultivos.php";break;
                    case 6: $m="Report_Ganadera.php";break;
                    case 7: $m="Report_Resumen.php";break;
                    case 8: $m="Report_Preliquidacion.php";break;
                    case  0: $m="inicio.php";
                    }
            ?>
       </td>
        </tr>
        </table>
		 <iframe src="<?php echo $m; ?>" frameborder="0"  width="98%" height="600"  marginheight="0" marginwidth="0" hspace="0"  scrolling="Auto">

                 </iframe>

</div>

</body>
</html>
