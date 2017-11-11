<?php session_start(); print_r($_POST);
     include "../Valid.php";
	// **************************************************** CARGADO DE DATOS PARA EDICION DE CAMPOS *********************************************************

	if(isset($_POST['idp4'])){
		 $causal = pg_query($cn,"select * from eliminarparcela ('".$_POST["idp4"]."')");
		 echo "select * from eliminarparcela ('".$_POST["idp4"]."')";
		 $m=$_POST['n4']." Con Codigo:".$_POST["idp4"];
		 header('Location: ListadoPredios.php?msg='.$m);
	}
	/////////////habilitar parcelas
	elseif(isset($_POST['idp5']))
  {
		$causal = pg_query($cn,"select * from habilitarparcela ('".$_POST["idp5"]."',166)");
		 $m=$_POST['n7']." Con Codigo:".$_POST["idp7"];
		  header('Location: ListadoPredios.php?msg2='.$m);
	}
  elseif(isset($_POST['idp6']))
  {
		$causal = pg_query($cn,"select * from habilitarparcela ('".$_POST["idp6"]."',135)");
		echo "select * from habilitarparcela ('".$_POST["idp6"]."',135)";
		 $m=$_POST['n7']." Con Codigo:".$_POST["idp7"];
		 header('Location: ListadoPredios.php?msg2='.$m);
	}



?>
