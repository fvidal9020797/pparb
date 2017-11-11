<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of codificadores
 *
 * @author INF-ABT
 */

class codificadores {
    protected $cn2;
    //put your code here
    function __construct() {
         require_once './Conexion.php';
        $this->cn2 = Conexion::create();
    }
    function getByClasificador($idClasificador) {
        
$sql_list2= 'select idcodificadores,nombrecodificador from codificadores
where idclasificador='.$idClasificador;
$list2 = pg_query($this->cn2->getConexion(), $sql_list2);
//$row_list= pg_fetch_array ($list);
$select_tipo = '<select id="'.$idClasificador.'" name="'.$idClasificador.'">';
$select_tipo.='<option value="">Todo</option>';
while ($row2 = pg_fetch_array($list2)) {
    $select_tipo.='<option value="' . $row2['nombrecodificador'] . '">' . $row2['nombrecodificador'] . '</option>';
}
$select_tipo.='</select>';
/* fin select estado */
return $select_tipo;
    }
   
      function getByRegistrador($idClasificador) {
  $sql_list3= 'select idcodificadores,nombrecodificador from codificadores
where idclasificador='.$idClasificador.' and idcodificadores=137'
        . ' union '
       . 'select idcodificadores,nombrecodificador from codificadores
where idclasificador='.$idClasificador.' and idcodificadores=138'
        ;
        $list3 = pg_query($this->cn2->getConexion(), $sql_list3);
//$row_list= pg_fetch_array ($list);
        $select_dpto = '<select id="19" name="19">';
        $select_dpto.='<option value="">Todos</option>';
        while ($row3 = pg_fetch_array($list3)) {
            $select_dpto.='<option value="' . $row3['idcodificadores'] . ',' . $row3['nombrecodificador'] . '">' . $row3['nombrecodificador'] . '</option>';
        }
        $select_dpto.='</select>';
        return $select_dpto;
    } 
    
}
