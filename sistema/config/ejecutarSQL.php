<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ejecutarSQL
 *
 * @author INF-ABT
 */
class ejecutarSQL {

    //put your code here
    private $cn;

    //put your code here
    function __construct() {
        require_once '../script/Conexion.php';
        $this->cn = Conexion::create();
    }

    function ejecutarConsulta($sql) {
        $result = "";
        $resultados = pg_query($this->cn->getConexion(), $sql);

        if ($resultados > 0) {
            $result = $resultados;
        }
        return $result;
    }
}
