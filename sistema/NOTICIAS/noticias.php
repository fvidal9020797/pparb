<?php
	include_once('Conexion.php');
	class noticias{
		public $id;
		public $titulo;
		public $descripcion;
		public $fecha_noticia;
		public $listaImg;
		public function listar(){
			$Con= Conexion::create();
			$cn=$Con->getConexion();
			$Sql="select id, fecha_noticia, titulo from noticias where estado=1 ORDER BY fecha_noticia DESC";
			$Result=pg_query($cn,$Sql);
			$list_noticias = array();
			while ($row = pg_fetch_row($Result)) {
				$noticias=new noticias();
				$noticias->id=$row[0];
				$noticias->fecha_noticia=$row[1];
				$noticias->titulo=$row[2];
				$list_noticias["data"][]=$noticias;
			}
			$obJson=json_encode($list_noticias,JSON_PRETTY_PRINT);
			return $obJson;
		}
		public function obtener(noticias $noticias){
			$Con= Conexion::create();
			$cn=$Con->getConexion();
			$Sql="select id, fecha_noticia, titulo, decripcion from noticias where estado=1 and id=".$noticias->id." ORDER BY fecha_noticia DESC";
			$Result=pg_query($cn,$Sql);
			while ($row = pg_fetch_row($Result)) {
				$noticias=new noticias();
				$noticias->id=$row[0];
				$noticias->fecha_noticia=$row[1];
				$noticias->titulo=$row[2];
				$noticias->descripcion=$row[3];
				$noticias->listaImg=$noticias->obtenerImg($noticias);
				$obj_noticia["data"][]=$noticias;
			}
			$obJson=json_encode($noticias,JSON_PRETTY_PRINT);
			return $obJson;
		}
		function obtenerImg(noticias $noticias){
			$Con= Conexion::create();
			$cn=$Con->getConexion();
			$Sql="select nombre from noticia_imagen where noticias_id=".$noticias->id;
			$Result=pg_query($cn,$Sql);
			$list_noticias = array();
			$index=0;
			while ($row = pg_fetch_row($Result)) {
				$list_noticias[$index]=$row[0];
				$index++;
			}
			return $list_noticias;
		}
	}
?>
