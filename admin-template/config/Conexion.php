<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * BASE DE DATOS ORIGEN
 *
 * @author JESUS
 */
class Conexion {

  private static $_instance;
  private $conexion;

    //put your code here
  private function __construct() {
    // $hostname_mdryt = "190.180.12.115";
   $hostname_mdryt = "localhost";
    $port = 5432;
   //$database_mdryt = "dbrestitucionconcepcion";
       $database_mdryt = "dbrestitucionconce";

    $cn = pg_connect("host={$hostname_mdryt} port={$port} dbname={$database_mdryt} user=postgres password=Insidei7.") or trigger_error("Nombre de Usuario o Contrase�a  no v�lidos.",FATAL);
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
  function ejecutarSql($sql) {
    $result="";
    $resultados = pg_query($this->conexion, $sql);

    if ($resultados != "") {
      $result=$resultados;
    }
    return $result;
  }

  function ejecutarSqlObject($sql){
   $jsondata =  array();
   if($result = pg_query($this->getConexion(), $sql)){
    if ($result != "") {

     $jsondata["success"] = true;
     $jsondata["data"]["message"] = sprintf("Correcto", pg_num_rows($result));
     $jsondata["data"]["dato"] = array();
     while( $row = pg_fetch_object($result) ) {
                                //$jsondata["data"]["users"][] es un array no asociativo. Tendremos que utilizar JSON_FORCE_OBJECT en json_enconde
                                //si no queremos recibir un array en lugar de un objeto JSON en la respuesta
                                //ver http://www.php.net/manual/es/function.json-encode.php para más info
      $jsondata["data"]["dato"][] = $row;
    }
  }else{


   $jsondata["success"] = false;
   $jsondata["data"] = array(
    'message' => 'No se encontró ningún resultado.'
    );

 }
}else{
 $jsondata["success"] = false;
 $jsondata["data"] = array(
  //$ei = $this->cn->errorInfo;
       // die("Function call failed with SQLSTATE " . $ei[0] . ", message " . $ei[2] . "\n");
  'message' =>  "Error al conectar: ".pg_last_error()
  // 'message' => "Function call failed with SQLSTATE "
   );
}

return $jsondata;

}


}
