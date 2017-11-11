<?php 
require_once APPPATH . '/MUESTREO/GestorMuestreo.php';
$gestno=new GestorMuestreo();
$gestno->eliminarMuestreo($_GET['id']);
  include APPPATH . '/' . $mp . '/listar.php';

?>