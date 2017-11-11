<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of codificadores
 *
 * @author jesus escobar ovando
 */

class GestorDataBase {
	protected $cn;
	protected $cn1;
    //put your code here
	function __construct() {
		require_once '/config/Conexion.php';
		$this->cn = Conexion::create();
		require_once '/config/Conexion1.php';
		$this->cn1 = Conexion1::create1();
	}
	
	function listartabla()
	{
		$sql="SELECT * FROM pg_tables WHERE schemaname = 'public' order by tablename" ;
		return $this->cn->ejecutarSql($sql);
	}

function guardarDataBase($parameter1,$parameter2){
$response="";
for ($i=1; $i <=$parameter2; $i++) { 
/* select table*/   
$val1=$this->function1( $parameter1[$i]);
			
$val2 = pg_num_rows($val1);
$val4 = pg_num_fields($val1);
if ($val2 > 0) {
	while ($val5 = pg_fetch_object($val1)) {
	$info_offset = 1;
	$info_columns = 0;
	$exist=$this->function3( $parameter1[$i],$val5);
		if ($exist=="") {
			$var12="INSERT INTO ".$parameter1[$i]." VALUES(";
			while ($info_offset <= $val4) {

			$n = pg_field_name($val1, $info_columns);
			$var7= pg_field_type($val1,$info_columns);
							
			$var12.= $this->function6($val5->$n, $var7);
				if ($info_offset < $val4) {
					$var12.=",";
				}
				$info_columns++ ;
				$info_offset++;
				}
			$var12.=")";
		} else{
			$var12="UPDATE ".$parameter1[$i]." SET ";
			$var13=" where ";
			$var8 = count($exist);
			$var9=1;
			while ($info_offset <= $val4) {
				$n = pg_field_name($val1, $info_columns);
				$var7= pg_field_type($val1,$info_columns);
		
				if (in_array($n, $exist)) {
					
				$var13.=$n."=". $this->function6($val5->$n, $var7);
				if  ($var9<$var8) {
				$var13.=" and ";
					}
				$var9++;
				} else {
				$var12.=$n."=". $this->function6($val5->$n, $var7);
				if ($info_offset < ($val4)) {
				$var12.=",";
					}
				}	
				$info_columns++ ;
				$info_offset++;
			}
	$var12.=" ".$var13;
						//$var12.=")";
}		

$this->cn1->ejecutarSql($var12);

}
}
}

return $response;
}

function function1($parameter1)
{

	$sql="select * from  ".$parameter1 ;

	return $this->cn->ejecutarSql($sql);
}
function function2($parameter1)
{

	$sql="SELECT * FROM information_schema.key_column_usage
	WHERE TABLE_NAME='".$parameter1."' AND constraint_name like '%pk%';" ;

	return $this->cn->ejecutarSql($sql);
}
function getNameFill($parameter1)
{

	$sql="select * from  ".$parameter1 ;

	return $this->cn->ejecutarSql($sql);
}



function function3($parameter1,$parameter2) {
	$val1=$this->function1( $parameter1);
	$val2=$this->function2( $parameter1);
	$return="";
	if (pg_num_rows($val2) > 0) {
		$var17="select * FROM ".$parameter1." where ";
		$i=0;
		while ($var16 = pg_fetch_object($val2)) {
			$n=$var16->column_name;
			$val3=pg_field_num ($val1 ,$n );
			$val3= pg_field_type($val1,$val3);
			if ($i>0) {
				$var17.=" and ";
			}
			$return[]=$n;      			
			$var17.=$n."=".$this->function6($parameter2->$n, $val3)." ";
			$i++;
		}

		$result=$this->cn1->ejecutarSql($var17);
		$num=pg_num_rows($result);
		if($num > 0) {

		}else{
			$return="";
		}

	}
	return $return;
}




function function6($var1, $var2, $var3 = "", $var4 = "") 
{
	$var1 = (!get_magic_quotes_gpc()) ? addslashes($var1) : $var1;

	switch ($var2) {
		case "text":
		$var1 = ($var1 != "") ? "'" . $var1 . "'" : "NULL";
		break; 
		case "varchar":
		$var1 = ($var1 != "") ? "'" . $var1 . "'" : "NULL";
		break; 
		case "bpchar":
		$var1 = ($var1 != "") ? "'" . $var1 . "'" : "NULL";
		break;   
		case "long":
		case "int":
		$var1 = ($var1 != "") ? $var1 : "NULL";
		break;
		case "int4":
		$var1 = ($var1 != "") ? $var1 : "NULL";
		case "float8":
		$var1 = ($var1 != "") ? $var1 : "NULL";
		break;
		case "float4":
		$var1 = ($var1 != "") ? $var1 : "NULL";
		break;
		
		case "double":
		$var1 = ($var1 != "") ? "'" . doubleval($var1) . "'" : "NULL";
		break;
		case "date":
		$var1 = ($var1 != "") ? "'" . $var1 . "'" : "NULL";
		break;
		case "defined":
		$var1 = ($var1 != "") ? $var3 : $var4;
		break;
	}
	return $var1;
}

}
?>
