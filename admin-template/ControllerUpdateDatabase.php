<?php
/**
 * Description of codificadores
 *
 * @author jesus escobar ovando
 */

session_start();
ini_set('max_execution_time', 600);
  include 'GestorDataBase.php';
     $action = $_POST["action"];
        switch ($action) { //Switch case for value of action
    case 'database':selectDataBase();
        break;
        case 'insertdatabase':insertDataBase();
        break;
    default:
        # code...
        break;
}

function selectDataBase()
{
$servidor1=@$_POST["servidor1"];
$basedatos1=@$_POST["basedatos1"];
$usuario1=@$_POST["usuario1"];
$passwor1=@$_POST["passwor1"];
$servidor2=@$_POST["servidor2"];
$basedatos2=@$_POST["basedatos2"];
$usuario2=@$_POST["usuario2"];
$password2=@$_POST["password2"];
if (1==1) {
    $_SESSION['ctform']['servidor1'] = $servidor1;  
    $_SESSION['ctform']['basedatos1'] = $basedatos1;  
    $_SESSION['ctform']['usuario1'] = $usuario1;  
    $_SESSION['ctform']['passwor1'] = $passwor1;  
    $_SESSION['ctform']['servidor2'] = $servidor2;  
    $_SESSION['ctform']['basedatos2'] = $basedatos2;  
    $_SESSION['ctform']['usuario2'] = $usuario2;  
    $_SESSION['ctform']['password2'] = $password2;
 header('Content-type: application/json'); 
$status = array(
        'type'=>'success',
        'message'=>'Correcto'
    );
    echo json_encode($status);
    die; ;


}else{
  header('Content-type: application/json'); 
$status = array(
        'type'=>'success',
        'message'=>'sfsfsfsf'
    );
    echo json_encode($status);
    die;  
}
}



function insertDataBase()
{
                    $var1 = @$_POST['tables'];
                    $var6 = @$_POST['cont'];
                    if ($var1 != "") {
                    $gestdatabase=new GestorDataBase();
                    $var2="";
                    foreach ($var1 as $key => $val) {
                    list($var4, $var3) = split('[-]', $val);
                    $var2[$var4]=$var3;
                    }
                     $gestdatabase->guardarDataBase($var2,$var6);  
                    }

    header('Content-type: application/json'); 
$status = array(
        'type'=>'success',
        'message'=>'Datos Migrados Correctamente'
    );
    echo json_encode($status);
    die;  
                }




