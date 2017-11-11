<?php
$cn=Conexion();
if ($_SESSION["Usuario"] != "")
	{
	$User=$_SESSION["Usuario"];$Password=$_SESSION["Clave"];
	$sql5="Select * From usuario Where Nombre = '".$User."' And Password='".$Password."'";
	$rs5=sql_ejecutar($sql5);
	if ($result5=sql_fetch($rs5))
		{ 
		?>