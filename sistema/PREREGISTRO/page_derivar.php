<?php
//print_r($_POST);


if ((isset($_POST["MM_insert_derivada"])) && ($_POST["MM_insert_derivada"] == "form2") && ($_POST["submit"]))
{
				$_SESSION['prereg_der']=$_POST;


					if ($_SESSION['prereg_der']['funderivado'] ==0)
					{
						 $mensaje="Se debe especificar a que funcionario se esta derivando la carpeta";
					 }

			else{

					$insertaux=sprintf("select * from preregistro.f_guardar_derivacion (%s, %s, %s, %s);",
												 GetSQLValueString(trim($_SESSION['prereg_der']['prereg']), "int"),
												 GetSQLValueString(trim($_SESSION['prereg_der']['funderivado']), "int"),
												 GetSQLValueString($_SESSION['prereg_der']['fechader'], "date"),
											 	 GetSQLValueString(trim(strtoupper($_SESSION['prereg_der']['obsder'])), "text"));

												//echo $insertaux;
					$Result2 = pg_query($cn, $insertaux);
					$row_parcela = pg_fetch_array ($Result2);
					$cod_parcela=$row_parcela['f_guardar_derivacion'];

						$mensaje="Datos Registrados Exitosamente!!";

						

					}

}






?>
