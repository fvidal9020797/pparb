<?php
	session_start();
	set_time_limit(5000);	
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UCAB MDRyT</title>
<style type="text/css">
    .demo {
    -moz-border-radius:0px 0px 15px 15px;
    -webkit-border-radius: 0px 0px 15px 15px;
	border-radius: 0px 0px 15px 15px;
	-moz-box-shadow: 0px 0px 1px 1px rgba(36,161,207,0.9);
	-webkit-box-shadow: 0px 0px 1px 1px rgba(36,161,207,0.9);
	box-shadow: 0px 0px 1px 1px rgba(36,161,207,0.9);
    }
	.demo2 {
    -moz-border-radius:15px 15px 0px 0px;
    -webkit-border-radius: 15px 15px 0px 0px;
	border-radius: 15px 15px 0px 0px;
	-moz-box-shadow: 0px 0px 1px 1px rgba(36,161,207,0.9);
	-webkit-box-shadow: 0px 0px 1px 1px rgba(36,161,207,0.9);
	box-shadow: 0px 0px 1px 1px rgba(36,161,207,0.9);
    }
	.demo3 {
    -moz-border-radius:10px 10px 10px 10px;
    -webkit-border-radius: 10px 10px 10px 10px;
	border-radius: 3px 3px 3px 3px;
	-moz-box-shadow: 1px 1px 1px 1px rgba(36,161,207,0.9);
	-webkit-box-shadow: 1px 1px 1px 1px rgb(3, 44, 2);
	box-shadow: 1px 1px 1px 1px rgb(3, 44, 2);
    }
	.mensajes {
	width:400px;
	height:100px;
	background:FF8822;
	color:#FF0000;
	padding:10px;
	margin:40px auto;
	text-align:center;
	font-family:Verdana, Arial;
	display:none;
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
.taulaA { background : #E8F0E8; border : 0px solid rgba(36,161,207,0.9); font-family: Verdana, Arial, Helvetica, sans-serif; font-size : 10px; border-radius: 10px 1px 3px 3px;}
</style>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td>
    <table width="100%" border="0" cellspacing="3" cellpadding="0">
    <tr align="center">
    <?php
	include "../Valid.php";

	?>
    	<td bgcolor="<?php if(isset($_GET["aux1"]) && $_GET["aux1"]<=1) {echo "#032c02";} else {echo "#75af73";} ?>" class="demo3"><font color="#FFFFFF"><b><a href="gestion_division_fusion.php?aux1=1">Lista de Predios Fusionados</a></b></font></td>

    	<td bgcolor="<?php if(isset($_GET["aux1"]) && $_GET["aux1"]==2 ) {echo "#032c02";} else {echo "#75af73";} ?>" class="demo3"><font color="#FFFFFF"><b><a href="gestion_division_fusion.php?aux1=2">Lista de predios Divididos</a></b></font></td>
    </tr>
 </table>
<?php
if(isset($_GET['aux1'])){
   $opcc=$_GET["aux1"];
}
else{
   $opcc=99;
}
switch ($opcc)
	{
		case 1: $mm="division_fusion/listar_fusion.php";break;
	 	case 2: $mm="division_fusion/listar_division.php";break;
	}
if($opcc!=99){
?>
<iframe style="height:500px" src="<?php echo $mm; ?>" frameborder="0" width="100%"  ></iframe>
<?php
	}
?>