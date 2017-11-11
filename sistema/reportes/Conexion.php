<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Conexion
 *
 * @author JESUS
 */
class Conexion {

    private static $_instance;
private $conexion;

    //put your code here
    private function __construct() {
      $hostname_mdryt = "190.129.192.155";
	$port = 5432;
	$database_mdryt = "dbrestitucion";
        $cn="";
	if ((isset($_SESSION['MM_Username']) && trim($_SESSION['MM_Username'] != "")))  {
		$cn = pg_connect("host={$hostname_mdryt} port={$port} dbname={$database_mdryt} user={$_SESSION['MM_Username']} password={$_SESSION['MM_Password']}") or trigger_error("Nombre de Usuario o Contrase�a  no v�lidos.",FATAL);
	}
	else {
		$cn = pg_connect("host={$hostname_mdryt} port={$port} dbname={$database_mdryt} user={$username_mdryt} password={$password_mdryt}") or trigger_error("Nombre de Usuario o Contrase�a  no validos.",FATAL);
	}
	$this->conexion= $cn;
    }
Public static function create() {
//    if (!(self::$_instance instanceof self)) {
//        self::$_instance=new self();
//        return self::$_instance;
//        
//    }
      if (!isset(self::$_instance)) {
            $c = __CLASS__;
            self::$_instance = new $c;
        }
        return self::$_instance;
}
public function getConexion() {
    return $this->conexion;
}


}
