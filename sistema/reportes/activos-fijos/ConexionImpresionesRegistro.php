<?php

/**
 * Description of Conexion
 *
 * @author BILLY
 */
class ConexionImpresionesRegistro {

    private static $_instance;
	private $conexion;


    public function ConexionImpresionesRegistro() {

    }
	
	Public static function create() {

      if (!isset(self::$_instance)) {
            $c = __CLASS__;
            self::$_instance = new $c;
        }
        return self::$_instance;
}

	public function getConexion() {
		$cn= new JdbcConnection("org.postgresql.Driver","jdbc:postgresql://localhost:5432/dbrestitucion","postgres","Insidei7.");
		//$cn= new JdbcConnection("org.postgresql.Driver","jdbc:postgresql://localhost:5432/dbrestitucion","postgres","123");
		$this->conexion= $cn->getConnection();

		return $this->conexion;
	}


}