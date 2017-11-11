<?php
	include_once('../../config/Conexion.php');
	include_once('error.php');


class planganaderalechera{
	public $idganaderalechera;
	public $idregistro;
	public $suppasnatural;
	public $suppassembrado;

	public $anoplanganadera;
	
	public $indicador;
	public $valor;
	public $lineabase;
	public $compromisoano;



	public function obtener(planganaderalechera $planganaderalechera){
		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$Sql="SELECT * FROM  planganaderalechera where idregistro=".$planganaderalechera->idregistro;
		$Result=pg_query($cn,$Sql);
		if(pg_num_rows($Result)>0){
			$index=0;
			$listObj=array();
			while($row = pg_fetch_row($Result)) {
				$planganaderalechera=new planganaderalechera();
				$planganaderalechera->idganaderalechera=$row[0];
				$planganaderalechera->idregistro=$row[1];
				$planganaderalechera->suppasnatural=$row[2];
				$planganaderalechera->suppassembrado=$row[3];
				$listObj[$index]=$planganaderalechera;
				$index++;
			}
			return json_encode($listObj,JSON_PRETTY_PRINT);
			return $listObj;
		}else{
			$error=new error();
			$error->codigo=204;
			$error->mensaje="no se ha encontrado coincidencias";
			return json_encode($error,JSON_PRETTY_PRINT);
		}
	}



		public function obtener_linea_base_compromiso(planganaderalechera $planganaderalechera){

		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$Sql="
		select x.n, x.indicador, x.valor as lineabase, y.valor as compromisoano from
		(select * from
		(select '1'::integer as n,'Sup. Pastos Naturales'::text as indicador, suppasnatural as valor, idregistro, anoplanganadera
		from planganaderalechera
		union
		select '2'::integer as n, 'Sup. Pastos Cultivados'::text as indicador, suppassembrado as valor, idregistro, anoplanganadera
		from planganaderalechera
		union
		select '3'::integer as n, 'Sistema Ordeño (Manual/Mecanico)'::text as indicador, sistemaordeno as valor, idregistro, anoplanganadera
		from planganaderalechera
		union
		select '4'::integer as n, 'Galpones (uni)'::text as indicador, galpon as valor, idregistro, anoplanganadera
		from planganaderalechera
		union
		select '5'::integer as n, 'Tanques Enfriamiento (uni)'::text as indicador, tanqueenfriamiento as valor, idregistro, anoplanganadera
		from planganaderalechera
		union
		select '6'::integer as n, 'Silo para Forraje (uni)'::text as indicador, siloforraje as valor, idregistro, anoplanganadera
		from planganaderalechera
		union
		select '7'::integer as n, 'Certificado Tuberculosis'::text as indicador, certtuberculosis::double precision as valor, idregistro, anoplanganadera
		from planganaderalechera
		union
		select '8'::integer as n, 'Certificado Brucelosis'::text as indicador, certbrucelosis::double precision as valor, idregistro, anoplanganadera
		from planganaderalechera
		union
		select '9'::integer as n, 'Cabezas Ganado Produccion (uni)'::text as indicador, cabganprod as valor, idregistro, anoplanganadera
		from planganaderalechera
		union
		select '10'::integer as n, 'Cabezas Ganado Descarte'::text as indicador, cabgandescar as valor, idregistro, anoplanganadera
		from planganaderalechera
		union
		select '11'::integer as n, 'Produccion Promedio de Carne (Kg/Hato)'::text as indicador, prodcarne as valor, idregistro, anoplanganadera
		from planganaderalechera
		union
		select '12'::integer as n, 'Produccion Promedio de Leche (Lt/Hato)'::text as indicador, prodleche as valor, idregistro, anoplanganadera
		from planganaderalechera
		union
		select '13'::integer as n, 'Producciòn Total de Leche (Lt/año)'::text as indicador, prodtotleche as valor, idregistro, anoplanganadera
		from planganaderalechera
		) as a
		where idregistro= ".$planganaderalechera->idregistro." and anoplanganadera = 0 ) as x
		inner join
		(select * from
		(select '1'::integer as n,'Sup. Pastos Naturales'::text as indicador, suppasnatural as valor, idregistro, anoplanganadera
		from planganaderalechera
		union
		select '2'::integer as n, 'Sup. Pastos Cultivados'::text as indicador, suppassembrado as valor, idregistro, anoplanganadera
		from planganaderalechera
		union
		select '3'::integer as n, 'Sistema Ordeño (Manual/Mecanico)'::text as indicador, sistemaordeno as valor, idregistro, anoplanganadera
		from planganaderalechera
		union
		select '4'::integer as n, 'Galpones (uni)'::text as indicador, galpon as valor, idregistro, anoplanganadera
		from planganaderalechera
		union
		select '5'::integer as n, 'Tanques Enfriamiento (uni)'::text as indicador, tanqueenfriamiento as valor, idregistro, anoplanganadera
		from planganaderalechera
		union
		select '6'::integer as n, 'Silo para Forraje (uni)'::text as indicador, siloforraje as valor, idregistro, anoplanganadera
		from planganaderalechera
		union
		select '7'::integer as n, 'Certificado Tuberculosis'::text as indicador, certtuberculosis::double precision as valor, idregistro, anoplanganadera
		from planganaderalechera
		union
		select '8'::integer as n, 'Certificado Brucelosis'::text as indicador, certbrucelosis::double precision as valor, idregistro, anoplanganadera
		from planganaderalechera
		union
		select '9'::integer as n, 'Cabezas Ganado Produccion (uni)'::text as indicador, cabganprod as valor, idregistro, anoplanganadera
		from planganaderalechera
		union
		select '10'::integer as n, 'Cabezas Ganado Descarte'::text as indicador, cabgandescar as valor, idregistro, anoplanganadera
		from planganaderalechera
		union
		select '11'::integer as n, 'Produccion Promedio de Carne (Kg/Hato)'::text as indicador, prodcarne as valor, idregistro, anoplanganadera
		from planganaderalechera
		union
		select '12'::integer as n, 'Produccion Promedio de Leche (Lt/Hato)'::text as indicador, prodleche as valor, idregistro, anoplanganadera
		from planganaderalechera
		union
		select '13'::integer as n, 'Producciòn Total de Leche (Lt/año)'::text as indicador, prodtotleche as valor, idregistro, anoplanganadera
		from planganaderalechera
		) as a
		where idregistro=".$planganaderalechera->idregistro." and anoplanganadera =".$planganaderalechera->anoplanganadera.") as y
		on x.n = y.n
		order by x.n asc
		";

		$Result=pg_query($cn,$Sql);


		if(pg_num_rows($Result)>0){
			$index=0;
			$listObj=array();
			while($row = pg_fetch_row($Result)) {
				$planganaderalechera=new planganaderalechera();
				$planganaderalechera->indicador=$row[1];
				$planganaderalechera->lineabase=$row[2];
				$planganaderalechera->compromisoano=$row[3];

			

				$listObj[$index]=$planganaderalechera;
				$index++;
			}
			return json_encode($listObj,JSON_PRETTY_PRINT);
			return $listObj;
		}else{
			$error=new error();
			$error->codigo=204;
			$error->mensaje="no se ha encontrado coincidencias";
			return json_encode($error,JSON_PRETTY_PRINT);
		}
	}




}
?>