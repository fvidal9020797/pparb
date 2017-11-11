<?php
//connect to database   
$hostname="localhost";
$username = "postgres";
$password="d3s4rr0l10";
$database="dbrestitucion";
$cn = @pg_connect(host=$hostname dbname=$database user=$username password=$password) or die ("Nao consegui conectar ao PostGres --> ");
$rs = pg_prepare($cn,"Query","select \"Id\",\"Nombre\" from \"Codificadores\"");
$rs = pg_execute($cn,"Query");
$result = array();
while($row = pg_fetch_object($rs))
	{array_push($result, $row);}

echo json_encode($result);
?>