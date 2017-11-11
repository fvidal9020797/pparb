<?php
session_start();set_time_limit(5000);  
require_once $_SERVER['DOCUMENT_ROOT'] . '/sistema/config/config.php';
$mp = basename(dirname(__FILE__));
            $action = "inicio";
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                if (isset($_GET["action"])) {
                    $action = @$_GET["action"];
                }
                switch ($action) {
                    case "inicio":
                    include APPPATH . '/' . $mp . '/inicio.php';
                    break;
                    case "nuevo":
                    include APPPATH . '/' . $mp . '/nuevo.php';
                    break;
                    case "editar":
                    include APPPATH . '/' . $mp . '/nuevo.php';
                    break;
                    case "listar":
                    include APPPATH . '/' . $mp . '/listar.php';
                          break;
                       case "eliminar":
                        include APPPATH . '/' . $mp . '/eliminar.php';
                 
                    break;
                    default:
                    break;
                }
            } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $action = @$_POST["action"];
               
                switch ($action) {
                    case "guardar":
                     include APPPATH . '/' . $mp . '/nuevo.php';
                    break;
                    case "modificar":
                    break;
                    case "eliminar":
                    break;
                    default:
                    break;
                }
            }
            ?> 
        