<?php 
require_once APPPATH . '/NOTICIAS/GestorNoticias.php';
$gestno=new GestorNoticias();
$gestno->eliminarNoticias($_GET['id']);
  include APPPATH . '/' . $mp . '/listar.php';

?>