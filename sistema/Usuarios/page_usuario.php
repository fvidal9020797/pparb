<?php


 if(isset($_GET['id_usr'])){
     if(isset($_SESSION['datos_usuario'])){unset($_SESSION['datos_usuario']);}
	 $id_usr=$_GET['id_usr'];
	 $_SESSION['id_usr']=$id_usr;
 }

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1"))
{

  if($_POST['submit']=='Guardar'){

	$datos_usuario=$_POST;

	$_SESSION['datos_usuario']=$datos_usuario;




	//insertando todo en la base de datos
		$query_log = sprintf("SELECT f.login FROM funcionario as f, persona as p WHERE p.idpersona=f.idpersona and p.noidentidad!='%s'and f.login='%s'", $_SESSION['datos_usuario']['noidentidad'], $_SESSION['datos_usuario']['login']);
		$log = pg_query($cn,$query_log);
		$totalRows_log = pg_num_rows($log);

		  if ($_SESSION['datos_usuario']['noidentidad']=="")
          {   trigger_error ("Se Debe Especificar El Carnet De Identidad Para El Usuario", E_USER_ERROR); }
		   elseif ($_SESSION['datos_usuario']['nombre1'] =="")
          {  trigger_error ("Se Debe Especificar Un Nombre Para El  Usuario", E_USER_ERROR); }
		   elseif ($_SESSION['datos_usuario']['apellidopat'] =="")
          {  trigger_error ("Se Debe Especificar El Apellido Paterno Para El  Usuario", E_USER_ERROR); }

		   elseif ($_SESSION['datos_usuario']['direcciondom'] =="")
          {  trigger_error ("Se Debe Especificar La direccion para  El  Usuario", E_USER_ERROR); }
		   elseif ($_SESSION['datos_usuario']['telefono'] =="")
          {  trigger_error ("Se Debe Especificar al menos un telefono Para El  Usuario", E_USER_ERROR); }
		   elseif  ($_SESSION['datos_usuario']['login']== "")
          {   trigger_error ("Se Debe Especificar Un Login Para El Usuario", E_USER_ERROR); }
		   elseif( $totalRows_log >=1)
          {   trigger_error ("Ese login se encuentra registrado por favor ingrese un nuevo login", E_USER_ERROR);}

           elseif ($_SESSION['datos_usuario']['txtnombreCargo'] =="")
              {  trigger_error ("Se Debe Especificar Nombre del cargo para  El  Usuario", E_USER_ERROR); }

      /*  elseif ( ( $_SESSION['datos_usuario']['chkContra']==""  ))
            {  // echo $_SESSION['datos_usuario']['chkContra'];
            //  $_SESSION['datos_usuario']['chkContra']='of';
                echo "imprimir:";
                echo $_SESSION['datos_usuario']['chkContra'];
                //$_SESSION['datos_usuario']['chkContra'] =='on'
             }*/

		   /*elseif((!checkdate($_SESSION['datos_usuario']['mesIni'],$_SESSION['datos_usuario']['diaIni'],$_SESSION['datos_usuario']['annoIni']))){
			$error = "La fecha de nacimiento : ".$_SESSION['datos_usuario']['diaIni'].'-'.$_SESSION['datos_usuario']['mesIni'].'-'.$_SESSION['datos_usuario']['annoIni']." no es v&aacute;lida.";
			trigger_error($error,E_USER_ERROR);
    }*/
      //  $dato = explode("/", $fecha);
        elseif(  $_SESSION['datos_usuario']['fechanac']== "" ){
         $error = "La fecha de nacimiento : ".$_SESSION['datos_usuario']['fechanac']." no es v&aacute;lida.";
         trigger_error($error,E_USER_ERROR);
       }
       elseif ( !(empty( $_SESSION['datos_usuario']['chkContra'])) and ($_SESSION['datos_usuario']['password1'] ==""    ))
          {
                  trigger_error ("Se Debe Especificar Una Contrase&aacute;a  Para El  Usuario", E_USER_ERROR);
             }
       elseif ( !(empty( $_SESSION['datos_usuario']['chkContra'])) and ($_SESSION['datos_usuario']['password2'] ==""    ))
          {
                  trigger_error ("Se Debe Especificar Una Contrase&aacute;a  Para El  Usuario", E_USER_ERROR);
             }
        elseif ( !(empty( $_SESSION['datos_usuario']['chkContra'])) and (  $_SESSION['datos_usuario']['password1'] <> $_SESSION['datos_usuario']['password2']  ))
           {  trigger_error ("Las Contraseñas no coinciden Para El  Usuario", E_USER_ERROR); }


		  elseif (!(isset($_SESSION['ErrorThrown']) && $_SESSION['ErrorThrown'] != ""))
		{
      //  $_SESSION['datos_usuario']['chkContra']='of';
       if (empty( $_SESSION['datos_usuario']['chkContra'])){
        $_SESSION['datos_usuario']['chkContra']='of';
      }else{
        //$_SESSION['datos_usuario']['chkContra']='of';
      }
      //  echo "imprimir:";
      //  echo $_SESSION['datos_usuario']['chkContra'];

       $insertUSR2=sprintf("select * from crear_funcionario (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s);",
											 GetSQLValueString($_SESSION['id_usr'], "int"),
											 GetSQLValueString(trim($_SESSION['datos_usuario']['noidentidad']), "text"),
											 GetSQLValueString(trim(strtoupper($_SESSION['datos_usuario']['nombre1'])), "text"),
											 GetSQLValueString(trim(strtoupper($_SESSION['datos_usuario']['nombre2'])), "text"),
											 GetSQLValueString(trim(strtoupper($_SESSION['datos_usuario']['apellidopat'])), "text"),
											 GetSQLValueString(trim(strtoupper($_SESSION['datos_usuario']['apellidomat'])), "text"),
											 GetSQLValueString($_SESSION['datos_usuario']['idgenero'], "int"),
											 GetSQLValueString($_SESSION['datos_usuario']['lugarci'], "int"),
								       GetSQLValueString($_SESSION['datos_usuario']['fechanac'], "date"),
											 GetSQLValueString(trim(strtoupper($_SESSION['datos_usuario']['direcciondom'])), "text"),
											 GetSQLValueString(trim($_SESSION['datos_usuario']['telefono']), "text"),
											 GetSQLValueString(trim($_SESSION['datos_usuario']['email']), "text"),
											 GetSQLValueString(trim($_SESSION['datos_usuario']['cargo']), "int"),
											 GetSQLValueString(trim(strtoupper($_SESSION['datos_usuario']['estadofun'])), "text"),
											 GetSQLValueString(trim($_SESSION['datos_usuario']['login']), "text"),
                       GetSQLValueString(trim($_SESSION['datos_usuario']['cboUnidad']), "int"),
                      GetSQLValueString(trim(strtoupper($_SESSION['datos_usuario']['txtnombreCargo'])), "text"),
                      GetSQLValueString(trim($_SESSION['datos_usuario']['password1']), "text"),
                      GetSQLValueString(trim($_SESSION['datos_usuario']['chkContra']), "text"),
                        GetSQLValueString($_SESSION['datos_usuario']['cbofinan'], "text"));
				//  echo $insertUSR2;
                //  echo "-imprimir:".$insertUSR2;
                 // $mensaje=$insertUSR2;

				 $Result2 = pg_query($cn, $insertUSR2);


				  if (!(isset($_SESSION['ErrorThrown']) && $_SESSION['ErrorThrown'] != ""))
                  {
                      $mensaje="Registro Exitoso!!!!!";

				   }
		}

	}//if guardar
} else{
	if(!isset($_SESSION['datos_usuario'])){

		$sql_usr= "select * FROM persona as p, funcionario as f where p.idpersona=f.idpersona and p.idpersona=".$_SESSION['id_usr'];
    //echo $sql_usr;
    $usr = pg_query($cn,$sql_usr) ;
		$row_usr = pg_fetch_array ($usr);

	 }
}

////////////////////////////CONSULTAS//////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////
	$sql_exp= "select * FROM codificadores where idclasificador=5";
	$exp = pg_query($cn,$sql_exp) ;
	$row_exp = pg_fetch_array ($exp);
	//$totalRows_exp = pg_num_rows($exp);

    $sql_genero= "select * FROM codificadores where idclasificador=6";
	$genero = pg_query($cn,$sql_genero) ;
	$row_genero = pg_fetch_array ($genero);
	//$totalRows_genero = pg_num_rows($genero);
	$sql_cargo= "select * FROM codificadores where idclasificador=19";
	$cargo = pg_query($cn,$sql_cargo) ;
	$row_cargo = pg_fetch_array ($cargo);


  $sql_unidad= " select * from codificadores where idclasificador=32  ";
  $unidad = pg_query($cn,$sql_unidad) ;
  $row_unidad = pg_fetch_array ($unidad);

	//$totalRows_genero = pg_num_rows($genero);
?>
