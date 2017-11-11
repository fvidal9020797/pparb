<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Conexion1
 *
 * @author JESUS
 */
class Conexion1 {

    private static $_instance1;
private $conexion1;

    //put your code here
    private function __construct() {
      $hostname_mdryt = "190.129.192.155";
	$port = 5432;
	$database_mdryt = "dbrestitucion";
        $cn1="";
	if ((isset($_SESSION['MM_Username']) && trim($_SESSION['MM_Username'] != "")))  {
		$cn1 = pg_connect("host={$hostname_mdryt} port={$port} dbname={$database_mdryt} user={$_SESSION['MM_Username']} password={$_SESSION['MM_Password']}") or trigger_error("Nombre de Usuario o Contrase�a  no v�lidos.",FATAL);
	}
	else {
		$cn1 = pg_connect("host={$hostname_mdryt} port={$port} dbname={$database_mdryt} user={$username_mdryt} password={$password_mdryt}") or trigger_error("Nombre de Usuario o Contrase�a  no validos.",FATAL);
	}
	$this->conexion1= $cn1;
    }
Public static function create1() {
//    if (!(self::$_instance1 instanceof self)) {
//        self::$_instance1=new self();
//        return self::$_instance1;
//        
//    }
      if (!isset(self::$_instance1)) {
            $c1 = __CLASS__;
            self::$_instance1 = new $c1;
        }
        return self::$_instance1;
}
public function getConexion1() {
    return $this->conexion1;
}


}
