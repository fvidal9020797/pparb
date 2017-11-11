<?php
    $hostname_mdryt = "localhost";
	$port = 5432;
	$database_mdryt = "dbrestitucion";
        
	if ((isset($_SESSION['MM_Username']) && trim($_SESSION['MM_Username'] != "")))  {
		$cn = pg_connect("host={$hostname_mdryt} port={$port} dbname={$database_mdryt} user={$_SESSION['MM_Username']} password={$_SESSION['MM_Password']}") or trigger_error("Nombre de Usuario o Contrase�a  no v�lidos.",FATAL);
	}
	elseif(isset($username_mdryt)) {
		$cn = pg_connect("host={$hostname_mdryt} port={$port} dbname={$database_mdryt} user={$username_mdryt} password={$password_mdryt}") or trigger_error("Nombre de Usuario o Contrase�a  no validos.",FATAL);
	}else{
	  include("logout.php");
	}
	
/////////////-----------------------------------------------
////////////

function permisos($cid,$pantalla)
	{$accesos[]="";$c=0;
	$sql_permisos="Select pantalla FROM pantalla INNER JOIN permiso ON permiso.idpantalla=pantalla.idpantalla INNER JOIN tarea ON tarea.idtarea=permiso.idtarea INNER JOIN usuarios ON usuarios.idtarea=permiso.idtarea INNER JOIN funcionario ON funcionario.idfuncionario=usuarios.idfuncionario WHERE funcionario.login='".$_SESSION["MM_Username"]."'";
	$rs=pg_query($cid,$sql_permisos);
	while ($res=pg_fetch_array($rs))
		{$accesos[$c]=$res[0];$c++;}
		// print_r($pantalla);
	if(in_array($pantalla,$accesos))
		{return true;}
	else
		{return false;} 
	}

function sql_ejecutar($cid,$sql_)
	{$result=pg_query($cid,$sql_) ;
	 return $result;
	}

function sql_fetch($rs_)
	{$res_=pg_fetch_array($rs_); // or die(exit("Error en odbc_exec"));
	 return $res_;
	}

function sql_lineas($rs_)
	{$num_=mysql_num_rows($rs_);
	 return $num_;
	}	

// FUNCIONES GENERALES DE APOYO A LA OPERACION DEL SISTEMA ************************************
function getIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP']) && $_SERVER['HTTP_CLIENT_IP']!="127.0.0.1")
        return $_SERVER['HTTP_CLIENT_IP'];
       
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_CLIENT_IP']!="127.0.0.1")
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
   
    return $_SERVER['REMOTE_ADDR'];
	} 


function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
?>