<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of politico
 *
 * @author INF-ABT
 */
class politico {
private $cn;
    //put your code here
    function __construct() {
         require_once './Conexion.php';
        $this->cn = Conexion::create();
    }

    function getDeptoByPais($idPais) {
        $sql_list3 = 'SELECT p2.idpolitico as iddepartamento, p2.nombrepolitico as Departamento from politico p1,politico p2
where 
p2.idpadre = p1.idpolitico
and p1.idpolitico=' . $idPais . ';';
        $list3 = pg_query($this->cn->getConexion(), $sql_list3);
//$row_list= pg_fetch_array ($list);
        $select_dpto = '<label for="dpto">DEPARTAMENTO:</label>';
        $select_dpto.= '<select id="dpto" name="dpto">';
        $select_dpto.='<option value="">Todos</option>';
        while ($row3 = pg_fetch_array($list3)) {
            $select_dpto.='<option value="' . $row3['iddepartamento'] .',' . $row3['departamento'] . '">' . $row3['departamento'] . '</option>';
        }
        $select_dpto.='</select>';
        return $select_dpto;
    }

    function getProvByDpto($idDpto) {
        $sql_list3 = 'SELECT p3.idpolitico as idprovincia, p3.nombrepolitico as provincia from politico p1,politico p2, politico p3
                    where 
                    p2.idpadre = p1.idpolitico and
                    p3.idpadre = p2.idpolitico and
                     p2.idpolitico=' . $idDpto . ';';
        $list3 = pg_query($this->cn->getConexion(), $sql_list3);
//$row_list= pg_fetch_array ($list);
        $select_dpto = '<label for="prov">PROVINCIA:</label>';
        $select_dpto.= '<select id="prov" name="prov">';
        $select_dpto.='<option value="">Todos</option>';
        while ($row3 = pg_fetch_array($list3)) {
            $select_dpto.='<option value="' . $row3['idprovincia'] . ',' . $row3['provincia'] . '">' . $row3['provincia'] . '</option>';
        }
        $select_dpto.='</select>';
        return $select_dpto;
    }
    function getMunByProv($idProv) {
        $sql_list3 = 'SELECT p5.idpolitico as idmunicipio, p5.nombrepolitico as municipio from politico p1,politico p2, politico p3 ,politico p4, politico p5
where 
p2.idpadre = p1.idpolitico and
p3.idpadre = p2.idpolitico and
p4.idpadre = p3.idpolitico and
p5.idpadre = p4.idpolitico and
 p3.idpolitico=' . $idProv . ';';
        $list3 = pg_query($this->cn->getConexion(), $sql_list3);
//$row_list= pg_fetch_array ($list);
        $select_dpto = '<label for="mun">MUNICIPIO:</label>';
        $select_dpto.= '<select  id="mun"  name="mun">';
        $select_dpto.='<option value="">Todos</option>';
        while ($row3 = pg_fetch_array($list3)) {
            $select_dpto.='<option value="' . $row3['idmunicipio'] . ',' . $row3['municipio'] .'">' . $row3['municipio'] . '</option>';
        }
        $select_dpto.='</select>';
        return $select_dpto;
    }
    
    
    
      function getRegisterByCargo($idDpto) {
        $sql_list3 = 'select v_funcionario.idfuncionario, v_funcionario.nomcompleto from  v_funcionario
where v_funcionario.cargo=' . $idDpto . ';';
        $list3 = pg_query($this->cn->getConexion(), $sql_list3);
//$row_list= pg_fetch_array ($list);
        $select_dpto = '<label for="register">NOMBRE REGISTRADOR:</label>';
        $select_dpto.= '<select id="register" name="register">';
        $select_dpto.='<option value="">Todos</option>';
        while ($row3 = pg_fetch_array($list3)) {
            $select_dpto.='<option value="' . $row3['idfuncionario'] . ',' . $row3['nomcompleto'] . '">' . $row3['nomcompleto'] . '</option>';
        }
        $select_dpto.='</select>';
        return $select_dpto;
    }

}
