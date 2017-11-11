<?php
	include_once('../../config/Conexion.php');
	include_once('error.php');
class planproduccionganadera{
	public $idplanganadera;
	public $idregistro;
	public $suppastosembrado;
	public $suppastonatural;
	public $potrero;
	public $pozas;
	public $saleros;
	public $bebederos;
	public $brete;
	public $corral;
	public $forraje;
	public $compraganado;
	public $cantganado;
	public $cantternero;	
	public $cantganadofaineo;
	public $cantganadopie;
	public $cantprodcarne;
	public $anoprodganadera;
	
	public $indicador;
	public $valor;
	public $lineabase;
	public $compromisoano;



	public function obtener(planproduccionganadera $planproduccionganadera){

		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$Sql="SELECT * FROM  planproduccionganadera where idregistro=".$planproduccionganadera->idregistro." and anoprodganadera =".$planproduccionganadera->anoprodganadera;

		$Result=pg_query($cn,$Sql);
		if(pg_num_rows($Result)>0){
			$index=0;
			$listObj=array();
			while($row = pg_fetch_row($Result)) {
				$planproduccionganadera=new planproduccionganadera();
				$planproduccionganadera->idganaderalechera=$row[0];
				$planproduccionganadera->idregistro=$row[1];
				$planproduccionganadera->suppastosembrado=$row[2];
				$planproduccionganadera->suppastonatural=$row[3];
				$planproduccionganadera->potrero=$row[4];
				$planproduccionganadera->pozas=$row[5];
				$planproduccionganadera->saleros=$row[6];
				$planproduccionganadera->bebederos=$row[7];
				$planproduccionganadera->brete=$row[8];
				$planproduccionganadera->corral=$row[9];
				$planproduccionganadera->forraje=$row[10];
				$planproduccionganadera->compraganado=$row[11];
				$planproduccionganadera->cantganado=$row[12];
				$planproduccionganadera->cantternero=$row[13];
				$planproduccionganadera->cantganadofaineo=$row[14];
				$planproduccionganadera->cantganadopie=$row[15];
				$planproduccionganadera->cantprodcarne=$row[16];
				$planproduccionganadera->anoprodganadera=$row[17];
			

				$listObj[$index]=$planproduccionganadera;
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




	public function obtener_indicadores(planproduccionganadera $planproduccionganadera){

		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$Sql="
		select * from
		(select '1'::integer as n,'Sup. Pastos Naturales'::text as indicador, suppastonatural as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '2'::integer as n, 'Sup. Pastos Cultivados'::text as indicador, suppastosembrado as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '3'::integer as n, 'Potreros con Alambrada (uni)'::text as indicador, potrero as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '4'::integer as n, 'Aguada, Pozas, Atajados (uni)'::text as indicador, pozas as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '5'::integer as n, 'Saleros (uni)'::text as indicador, saleros as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '6'::integer as n, 'Bebederos (uni)'::text as indicador, bebederos as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '7'::integer as n, 'Brete (uni)'::text as indicador, brete as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '8'::integer as n, 'Corral (uni)'::text as indicador, corral as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '9'::integer as n, 'Silo para Forraje (uni)'::text as indicador, forraje as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '10'::integer as n, 'Compra de Ganado en cabezas(opcional)'::text as indicador, compraganado as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '11'::integer as n, 'Cabezas de Ternero'::text as indicador, cantternero as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '12'::integer as n, 'Cabezas de Ganado Mayor'::text as indicador, cantganado as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '13'::integer as n, 'Cant. de Ganado en pie para la Venta'::text as indicador, cantganadopie as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '14'::integer as n, 'Cant. Ganado para Faeneo'::text as indicador, cantganadofaineo as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '15'::integer as n, 'Produccion de Carne'::text as indicador, cantprodcarne as valor, idregistro, anoprodganadera
		from planproduccionganadera
		) as a
		where idregistro=".$planproduccionganadera->idregistro." and anoprodganadera =".$planproduccionganadera->anoprodganadera."
		order by n asc
		";

		$Result=pg_query($cn,$Sql);
		if(pg_num_rows($Result)>0){
			$index=0;
			$listObj=array();
			while($row = pg_fetch_row($Result)) {
				$planproduccionganadera=new planproduccionganadera();
				$planproduccionganadera->indicador=$row[1];
				$planproduccionganadera->valor=$row[2];
				$planproduccionganadera->idregistro=$row[3];
				$planproduccionganadera->anoprodganadera=$row[4];
			

				$listObj[$index]=$planproduccionganadera;
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






		public function obtener_linea_base_compromiso(planproduccionganadera $planproduccionganadera){

		$Con=Conexion::create();
		$cn=$Con->getConexion();
		$Sql="
		select x.n, x.indicador, x.valor as lineabase, y.valor as compromisoano from
		(select a.n, a.indicador, a.valor from
		(select '1'::integer as n,'Sup. Pastos Naturales'::text as indicador, suppastonatural as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '2'::integer as n, 'Sup. Pastos Cultivados'::text as indicador, suppastosembrado as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '3'::integer as n, 'Potreros con Alambrada (uni)'::text as indicador, potrero as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '4'::integer as n, 'Aguada, Pozas, Atajados (uni)'::text as indicador, pozas as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '5'::integer as n, 'Saleros (uni)'::text as indicador, saleros as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '6'::integer as n, 'Bebederos (uni)'::text as indicador, bebederos as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '7'::integer as n, 'Brete (uni)'::text as indicador, brete as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '8'::integer as n, 'Corral (uni)'::text as indicador, corral as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '9'::integer as n, 'Silo para Forraje (uni)'::text as indicador, forraje as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '10'::integer as n, 'Compra de Ganado en cabezas(opcional)'::text as indicador, compraganado as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '11'::integer as n, 'Cabezas de Ternero'::text as indicador, cantternero as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '12'::integer as n, 'Cabezas de Ganado Mayor'::text as indicador, cantganado as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '13'::integer as n, 'Cant. de Ganado en pie para la Venta'::text as indicador, cantganadopie as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '14'::integer as n, 'Cant. Ganado para Faeneo'::text as indicador, cantganadofaineo as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '15'::integer as n, 'Produccion de Carne'::text as indicador, cantprodcarne as valor, idregistro, anoprodganadera
		from planproduccionganadera
		) as a
		where idregistro = ".$planproduccionganadera->idregistro." and anoprodganadera = 0 ) as x
		inner join
		(select a.n, a.indicador, a.valor from
		(select '1'::integer as n,'Sup. Pastos Naturales'::text as indicador, suppastonatural as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '2'::integer as n, 'Sup. Pastos Cultivados'::text as indicador, suppastosembrado as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '3'::integer as n, 'Potreros con Alambrada (uni)'::text as indicador, potrero as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '4'::integer as n, 'Aguada, Pozas, Atajados (uni)'::text as indicador, pozas as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '5'::integer as n, 'Saleros (uni)'::text as indicador, saleros as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '6'::integer as n, 'Bebederos (uni)'::text as indicador, bebederos as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '7'::integer as n, 'Brete (uni)'::text as indicador, brete as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '8'::integer as n, 'Corral (uni)'::text as indicador, corral as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '9'::integer as n, 'Silo para Forraje (uni)'::text as indicador, forraje as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '10'::integer as n, 'Compra de Ganado en cabezas(opcional)'::text as indicador, compraganado as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '11'::integer as n, 'Cabezas de Ternero'::text as indicador, cantternero as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '12'::integer as n, 'Cabezas de Ganado Mayor'::text as indicador, cantganado as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '13'::integer as n, 'Cant. de Ganado en pie para la Venta'::text as indicador, cantganadopie as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '14'::integer as n, 'Cant. Ganado para Faeneo'::text as indicador, cantganadofaineo as valor, idregistro, anoprodganadera
		from planproduccionganadera
		union
		select '15'::integer as n, 'Produccion de Carne'::text as indicador, cantprodcarne as valor, idregistro, anoprodganadera
		from planproduccionganadera
		) as a
		where idregistro=".$planproduccionganadera->idregistro." and anoprodganadera =".$planproduccionganadera->anoprodganadera.") as y
		on x.n = y.n
		order by x.n asc
		";

		$Result=pg_query($cn,$Sql);


		if(pg_num_rows($Result)>0){
			$index=0;
			$listObj=array();
			while($row = pg_fetch_row($Result)) {
				$planproduccionganadera=new planproduccionganadera();
				$planproduccionganadera->indicador=$row[1];
				$planproduccionganadera->lineabase=$row[2];
				$planproduccionganadera->compromisoano=$row[3];

			
			
			

				$listObj[$index]=$planproduccionganadera;
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