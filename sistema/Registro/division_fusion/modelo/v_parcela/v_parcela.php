<?php
include_once('../../../config/Conexion.php');
class v_parcela{
	public $idregistro;
	public $idparcela;
	public $nombre;
	public $superficie;
	public $comp;
	public $nombrepolitico;
	public $TipoProp;
	public $SitJur;
	public $Clasificacion;
	public $idclasificacion;
	public $Oficina;
	public $estado;
	public $asesoramiento;
	public $fecharegistro;
	public $clasificacionprog;
	public $departamento;
	public $provincia;
	public $idpolitico;
	public $idtipoprop;
	public $idsituacionjuridica;
	public $idclasificacionprog;
	public $idasesoramiento;
	public $numregprof;
	public $idoficina;
	public $id_estado;
	public $idsectorproductivo;
	public $idsectorsocial;
	public $idprod;
	function Obtener(v_parcela $_v_parcela){
		$Con= Conexion::create();
		$cn=$Con->getConexion();
		$Sql="select * from v_parcela where idparcela='".$_v_parcela->idparcela."'";
		$Result=pg_query($cn,$Sql);
		if (pg_num_rows($Result) != 0) {
			while ($row = pg_fetch_row($Result)) {
				$_v_parcela=new v_parcela();
				$_v_parcela->idregistro=$row[0];
				$_v_parcela->idparcela=$row[1];
				$_v_parcela->nombre=$row[2];
				$_v_parcela->superficie=$row[3];
				$_v_parcela->comp=$row[4];
				$_v_parcela->nombrepolitico=$row[5];
				$_v_parcela->TipoProp=$row[6];
				$_v_parcela->SitJur=$row[7];
				$_v_parcela->Clasificacion=$row[8];
				$_v_parcela->idclasificacion=$row[9];
				$_v_parcela->Oficina=$row[10];
				$_v_parcela->estado=$row[11];
				$_v_parcela->asesoramiento=$row[12];
				$_v_parcela->fecharegistro=$row[13];
				$_v_parcela->clasificacionprog=$row[14];
				$_v_parcela->departamento=$row[15];
				$_v_parcela->provincia=$row[16];
				$_v_parcela->idpolitico=$row[17];
				$_v_parcela->idtipoprop=$row[18];
				$_v_parcela->idsituacionjuridica=$row[19];
				$_v_parcela->idclasificacionprog=$row[20];
				$_v_parcela->idasesoramiento=$row[21];
				$_v_parcela->numregprof=$row[22];
				$_v_parcela->id_estado=$row[23];
				$_v_parcela->idoficina=$row[24];
				$_v_parcela->idsectorproductivo=$row[25];
				$_v_parcela->idsectorsocial=$row[26];
				$_v_parcela->idprod=$row[27];		
			}
		}else{
			$_v_parcela->idparcela="0";
		}
		return $_v_parcela;
	}
	function Obtener_idregistro(v_parcela $_v_parcela){
		$Con= Conexion::create();
		$cn=$Con->getConexion();
		$Sql="select * from v_parcela where idregistro=".$_v_parcela->idregistro;
		$Result=pg_query($cn,$Sql);
		if (pg_num_rows($Result) != 0) {
			while ($row = pg_fetch_row($Result)) {
				$_v_parcela=new v_parcela();
				$_v_parcela->idregistro=$row[0];
				$_v_parcela->idparcela=$row[1];
				$_v_parcela->nombre=$row[2];
				$_v_parcela->superficie=$row[3];
				$_v_parcela->comp=$row[4];
				$_v_parcela->nombrepolitico=$row[5];
				$_v_parcela->TipoProp=$row[6];
				$_v_parcela->SitJur=$row[7];
				$_v_parcela->Clasificacion=$row[8];
				$_v_parcela->idclasificacion=$row[9];
				$_v_parcela->Oficina=$row[10];
				$_v_parcela->estado=$row[11];
				$_v_parcela->asesoramiento=$row[12];
				$_v_parcela->fecharegistro=$row[13];
				$_v_parcela->clasificacionprog=$row[14];
				$_v_parcela->departamento=$row[15];
				$_v_parcela->provincia=$row[16];
				$_v_parcela->idpolitico=$row[17];
				$_v_parcela->idtipoprop=$row[18];
				$_v_parcela->idsituacionjuridica=$row[19];
				$_v_parcela->idclasificacionprog=$row[20];
				$_v_parcela->idasesoramiento=$row[21];
				$_v_parcela->numregprof=$row[22];
				$_v_parcela->id_estado=$row[23];
				$_v_parcela->idoficina=$row[24];
				$_v_parcela->idsectorproductivo=$row[25];
				$_v_parcela->idsectorsocial=$row[26];
				$_v_parcela->idprod=$row[27];		
			}
		}else{
			$_v_parcela->idparcela="0";
		}
		return $_v_parcela;
	}
	////
	//este metodo obtiene los predios que no participaron en una fusion y los predios que no 
	//fueron divididos, por codigo de parcelas:: developer, Luis Fernando Vidal Salazar
	///
	function obtener_sin_div_fus(v_parcela $_v_parcela){
		$Con= Conexion::create();
		$cn=$Con->getConexion();
		$Sql="select * from v_parcela where idparcela='".$_v_parcela->idparcela."'";
		$Result=pg_query($cn,$Sql);
		if (pg_num_rows($Result) != 0) {
			while ($row = pg_fetch_row($Result)) {
				$_v_parcela=new v_parcela();
				$_v_parcela->idregistro=$row[0];
				$_v_parcela->idparcela=$row[1];
				$_v_parcela->nombre=$row[2];
				$_v_parcela->superficie=$row[3];
				$_v_parcela->comp=$row[4];
				$_v_parcela->nombrepolitico=$row[5];
				$_v_parcela->TipoProp=$row[6];
				$_v_parcela->SitJur=$row[7];
				$_v_parcela->Clasificacion=$row[8];
				$_v_parcela->idclasificacion=$row[9];
				$_v_parcela->Oficina=$row[10];
				$_v_parcela->estado=$row[11];
				$_v_parcela->asesoramiento=$row[12];
				$_v_parcela->fecharegistro=$row[13];
				$_v_parcela->clasificacionprog=$row[14];
				$_v_parcela->departamento=$row[15];
				$_v_parcela->provincia=$row[16];
				$_v_parcela->idpolitico=$row[17];
				$_v_parcela->idtipoprop=$row[18];
				$_v_parcela->idsituacionjuridica=$row[19];
				$_v_parcela->idclasificacionprog=$row[20];
				$_v_parcela->idasesoramiento=$row[21];
				$_v_parcela->numregprof=$row[22];
				$_v_parcela->id_estado=$row[23];
				$_v_parcela->idoficina=$row[24];
				$_v_parcela->idsectorproductivo=$row[25];
				$_v_parcela->idsectorsocial=$row[26];
				$_v_parcela->idprod=$row[27];		
			}
		}else{
			$_v_parcela->idparcela="0";
		}
		return $_v_parcela;
	}
	//este metodo obtiene los predios que no participaron en una fusion y los predios que no 
	//fueron divididos, por idregistro:: developer, Luis Fernando Vidal Salazar
	function Obtener_idregistro_sin_div_fus(v_parcela $_v_parcela){
		$Con= Conexion::create();
		$cn=$Con->getConexion();
		$Sql="select * from v_parcela where idregistro=".$_v_parcela->idregistro."";
		$Result=pg_query($cn,$Sql);
		if (pg_num_rows($Result) != 0) {
			while ($row = pg_fetch_row($Result)) {
				$_v_parcela=new v_parcela();
				$_v_parcela->idregistro=$row[0];
				$_v_parcela->idparcela=$row[1];
				$_v_parcela->nombre=$row[2];
				$_v_parcela->superficie=$row[3];
				$_v_parcela->comp=$row[4];
				$_v_parcela->nombrepolitico=$row[5];
				$_v_parcela->TipoProp=$row[6];
				$_v_parcela->SitJur=$row[7];
				$_v_parcela->Clasificacion=$row[8];
				$_v_parcela->idclasificacion=$row[9];
				$_v_parcela->Oficina=$row[10];
				$_v_parcela->estado=$row[11];
				$_v_parcela->asesoramiento=$row[12];
				$_v_parcela->fecharegistro=$row[13];
				$_v_parcela->clasificacionprog=$row[14];
				$_v_parcela->departamento=$row[15];
				$_v_parcela->provincia=$row[16];
				$_v_parcela->idpolitico=$row[17];
				$_v_parcela->idtipoprop=$row[18];
				$_v_parcela->idsituacionjuridica=$row[19];
				$_v_parcela->idclasificacionprog=$row[20];
				$_v_parcela->idasesoramiento=$row[21];
				$_v_parcela->numregprof=$row[22];
				$_v_parcela->id_estado=$row[23];
				$_v_parcela->idoficina=$row[24];
				$_v_parcela->idsectorproductivo=$row[25];
				$_v_parcela->idsectorsocial=$row[26];
				$_v_parcela->idprod=$row[27];		
			}
		}else{
			$_v_parcela->idparcela="0";
		}
		return $_v_parcela;
	}
}
?>