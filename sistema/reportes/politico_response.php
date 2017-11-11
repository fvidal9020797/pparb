<?php

session_start();
/* include "destroy_predio.php"; */
include "../valid.php";
include './politico.php';
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
// decode JSON string to PHP object, 2nd param sets to associative array
//comprobamos que sea una petición ajax
//if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
//{
//    $idDpto=$_POST['dpto'];
//    echo $politico->getProvByDpto($idDpto);
//}else{
//    throw new Exception("Error Processing Request", 1);  
//}

if (is_ajax()) {
    if (isset($_POST["action"]) && !empty($_POST["action"])) { //Checks if action value exists
        $action = $_POST["action"];
        switch ($action) { //Switch case for value of action
            case "getProvincia": getProvincia_function();
                break;
            case "getMunicipio": getMunicipio_function();
                break;
            case "getRegister": getRegister_function();
                break;
        }
    }
}

//Function to check if the request is an AJAX request
function is_ajax() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

function getProvincia_function() {
///$return = $_POST;
//Do what you need to do with the info. The following are some examples.
//if ($return["favorite_beverage"] == ""){
// $return["favorite_beverage"] = "Coke";
//}
//$return["favorite_restaurant"] = "McDonald's";
///$return["json"] = json_encode($return);
///echo json_encode($return);
    $dpto = $_POST['dpto'];
    $porciones = explode(",", $dpto);
    $id=$porciones[0];
    if ($id == "") {
        echo '';
    } else {
        $politico = new politico();
        echo $politico->getProvByDpto($id);
    }
}

function getMunicipio_function() {
      $prov = $_POST['prov'];
    $porciones = explode(",", $prov);
    $id=$porciones[0];
    if ($id == "") {
        echo '';
    } else {
        $politico = new politico();
        echo $politico->getMunByProv($id);
    }
}
function getRegister_function() {
      $prov = $_POST['19'];
    $porciones = explode(",", $prov);
    $id=$porciones[0];
    if ($id == "") {
        echo '';
    } else {
        $politico = new politico();
        echo $politico->getRegisterByCargo($id);
    }
}