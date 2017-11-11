<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of codificadores
 *
 * @author jesus escobar
 */

class GestorPersona {
	protected $cn;
    //put your code here
	function __construct() {
		require_once APPPATH.'/config/Conexion.php';
		$this->cn = Conexion::create();
	}

function guardarPersona($numfraccion , $idpredio , $valorbasico  , $supfraccion , $frentelote  , $esquina_f , $medio_f , $factormodificacion , $fondolote , $valortotalusd, $valorm2usd , $eliminar){
	$sql="select f_fraccion(".$numfraccion .",".$idpredio.",".$valorbasico.",".$supfraccion.",".$frentelote.",".$esquina_f.",".$medio_f.",'".$factormodificacion."',".$fondolote.",".$valortotalusd.",".$valorm2usd .",". $eliminar.")";

return $this->cn->ejecutarSqlObject($sql);
}
function obtenerPersonaId($id){
	$sql="select *from persona where idpersona=".$id;

return $this->cn->ejecutarSql($sql);
}
function obtenerAgenteId($id){
	$sql="select *from agenteauxiliar where numregprof='".$id."'";

return $this->cn->ejecutarSql($sql);
}
function obtenerFuncionarioId($id){
	$sql="select *from funcionario where idfuncionario=".$id;

return $this->cn->ejecutarSql($sql);
}

function listarPersona($fil1,$p1,$fil2,$p2,$fil3,$p3 ){
	$sql="select  nombre1 as value,num_doc as data   from persona where id_persona>0 ";
	if ($p1!="") {

		$sql.= " and".$fil1 ." like '%".$p1."%'";

	}
	if ($p2!="") {
		$sql.= " and".$fil2."=".$p2;
	}
	if ($p3 !="") {
		$sql.= " and".$fil3."=".$p3;
	}
return $this->cn->ejecutarSqlObject($sql);
}
function getDataPersona( $id ,$table){
	$sql="SELECT *FROM ".$table." where id_persona=".$id;
return $this->cn->ejecutarSql($sql);
}

function getDataFuncionarioTipo($tipo){
	$sql="SELECT f.idfuncionario,
            f.cargo,
            c.nombrecodificador AS nombrecargo,
            p.nomcompleto,
            p.telefono,
            p.email
           FROM funcionario f,
            v_persona p,
            codificadores c
          WHERE p.idpersona = f.idpersona AND f.cargo = ".$tipo." AND c.idcodificadores =".$tipo;
return $this->cn->ejecutarSql($sql);
}

function getDataFuncionarioTipoActivos($tipo){
	$sql="select
			f.idfuncionario,
			(nombre1 || ' ' || COALESCE(nombre2,'') || ' ' || apellidopat || ' ' || COALESCE(apellidomat,'')) as nombrecompleto,
			p.noidentidad,
			c.nombrecodificador
			from persona as p inner join funcionario as f on p.idpersona = f.idpersona inner join codificadores as c on c.idcodificadores = f.cargo
			where cargo = ".$tipo." and estadofun = 'A'
			order by nombrecompleto";
return $this->cn->ejecutarSql($sql);
}

function getDataFuncionarioTipoActivosAlimentos($tipo1,$tipo2){
	$sql="select
			f.idfuncionario,
			(nombre1 || ' ' || COALESCE(nombre2,'') || ' ' || apellidopat || ' ' || COALESCE(apellidomat,'')) as nombrecompleto,
			p.noidentidad,
			c.nombrecodificador
			from persona as p inner join funcionario as f on p.idpersona = f.idpersona inner join codificadores as c on c.idcodificadores = f.cargo
			where (cargo = ".$tipo1." or idunidad = ".$tipo2.")  and estadofun = 'A'
			order by nombrecompleto";
return $this->cn->ejecutarSql($sql);
}



}
