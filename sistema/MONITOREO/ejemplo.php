<?php
  session_start();
 include "../cabecera.php";
 
function guardar_doc_Analisis_evaluacion_rcia(
$idmonitorio,
$iddoc,
$detallecontenido,
$monto_cant,
$obse
)
{
		$sql="select * from monitoreo.ff_guardar_docpresentados_rcia(".$idmonitorio .",".$iddoc .",'".$detallecontenido."','".$monto_cant ."','".$obse."');";

        echo "consilta:".$sql."<br>";
		return $this->cn->ejecutarSqlObject($sql);
}


function guardarObs(
    $idmonitoreo,
    $tipo ,
    $obs,
    $estado)
	{

		$sql="SELECT * from monitoreo.ff_obs(".$idmonitoreo.",".$tipo .",'"
			.$obs ."',".$estado.")";

            echo "consulta2:".$sql;
		return $this->cn->ejecutarSqlObject($sql);
 	}




echo "ini";
    echo "<br>";
$response=array();
 $obs='observacionessss';
  $Result2 = guardarObs($row_id=1,$step=1, $obs,  $estado=1);
  echo "fini";
 /* $idmonitorio=47;
  $iddoc=2;
  $detallecontenido='detalleeee';
  $monto_cant='10%';
  $obse='observacionessss';
  
    $response= guardar_doc_Analisis_evaluacion_rcia($idmonitorio,$iddoc,$detallecontenido,$monto_cant,$obse); 

    echo "bbb";
    echo "ejemplo:".$response;*/

?>