<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/sistema/config/config.php';
require_once APPPATH . '/MONITOREO/gestorMonitoreo.php';
//include "../cabecera.php";
//print_r($_POST);

/// obteniendo periodo del predio
	$sql_fechas = "select r.idregistro, fecharegistro, fechasuscripcion
					from registro as r full join fechasregistro as fr on r.idregistro = fr.idregistro
					where r.idregistro =".$_SESSION['idreg'];
	$resultSuscripcion = pg_query($cn,$sql_fechas) ;
	$row_Suscripcion = pg_fetch_array ($resultSuscripcion);
	$fechasuscripcion = $row_Suscripcion['fechasuscripcion'];
	$periodo1_time = date($today="2015-09-29");

	$periodo=2;
	if ($fechasuscripcion!="") {
	    $predio_time = Date('Y-m-d', strtotime($fechasuscripcion));
	    if($periodo1_time > $predio_time){
		    $periodo=1;
	    }
	}


    $anhoActivo1=0;
    if ((isset($_POST["anhoActivo_1"])) && ($_POST["anhoActivo_1"] >0) ){
        $anhoActivo1=$_POST["anhoActivo_1"];
    }


	// OBTENIENDO DATOS DE LOS DOCUMENTOS DE EVALUACION GANADERA
    




    //---------------- EVALUACION GANADERA RCIA  -------------//


 
 /*   if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formevaluacionrcia") && ($_POST["submit"]))
{

	     $_SESSION['datos_eval_gan']=$_POST;

                    $sql_monitoreo = "select * from  monitoreo.monitoreo as m  where m.idregistro = ".$_SESSION['idreg']." and a.idmonitoreo > 0 ";                    	
                    $pmonit = pg_query($cn,$sql_monitoreo);
                    $row_monit = pg_fetch_array ($pmonit);
                    $idmonitoreo=$row_documentos['idmonitoreo'];
					/*if(isset($_SESSION['datos_eval_gan']['idnotaext']))
					{
						$id_monitoreo=$_SESSION['datos_eval_gan']['idnotaext'];
					}*/

                 //   if (true)
				//	{ trigger_error ("Debe Especificar el Remitente:".$idmonitoreo, E_USER_ERROR);}//longuitud tabla>1
					/*elseif ($_SESSION['datos_nota_ext']['combodestinatario'] ==0)
					{   trigger_error ("Debe Especificar el Destinatario", E_USER_ERROR); }
					elseif ($_SESSION['datos_nota_ext']['comboaccion'] ==0)
					{   trigger_error ("Debe Especificar la Accion de la Nota a Derivar", E_USER_ERROR); }
					elseif ($_SESSION['datos_nota_ext']['combodestinatario'] == $_SESSION['datos_nota_ext']['comboremitente'])
					{   trigger_error ("El Destinatario no puede ser el mismo del Remitente", E_USER_ERROR); }
					elseif (trim($_SESSION['datos_nota_ext']['conteo'])==0)
					{   trigger_error ("Debe existir al menos un Solicitud en la Nota", E_USER_ERROR); }*/

			//else{

						// INSERTAMOS LAS LOS DOCUMENTOS
						//$Resultdeletedoc = pg_query($cn, "delete from analisisdocumentacion where idnotaext=".$_SESSION['datos_nota_ext']['idnotaext']);

						/*for ($i = 1; $i <=$_SESSION['datos_eval_gan']['conteo'] ; $i++) {

							if(isset($_SESSION['datos_eval_gan']['chk'.$i]) && ($_SESSION['datos_eval_gan']['chk'.$i]!="")){

								 $insertUSR2=sprintf("insert into analisisdocumentacion values(%s,%s,%s);",
													 GetSQLValueString($_SESSION['datos_eval_gan']['idsolicitud'.$i], "int"),
                                                     GetSQLValueString($_SESSION['datos_eval_gan']['idsolicitud'.$i], "int"),
													 GetSQLValueString($_SESSION['datos_eval_gan']['idnotaext'], "int"),
													 GetSQLValueString(trim($_SESSION['datos_eval_gan']['observacionesr'.$i]), "text"));

								 $Result2 = pg_query($cn, $insertUSR2);

							 }

						}*/

						/*if (!(isset($_SESSION['ErrorThrown']) && $_SESSION['ErrorThrown'] != "")) {
							echo '<script>parent.document.location.href="MenuNotasExternas.php?aux=3&datosguardados=ok";</script>';
						}

					}
}*/

?>


 <script>
// funtion pestaña_ganadero(){
   //  window.location.href="#tabs-3";
 //} 

 </script>

