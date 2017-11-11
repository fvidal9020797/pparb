<?php
 session_start();
include "../cabecera.php";

//$resultado = $_POST['idnotaext'] ;

   if (($_POST["tarea"] == "agregarDocumento") )
   {
         $sql_documentacion = "select * from monitoreo.documentacion where tipodocumento = 71 order by nombredocumentacion asc";
         $documentacion = pg_query($cn,$sql_documentacion);
         $row_documentacion = pg_fetch_array ($documentacion);
         $idderivacion3=$row_documentacion['iddocumentacion'];
         $row_documentacion['nombredocumentacion'];
         $resultado="";
           if($idderivacion3>0){
            $resultado= $row_documentacion['nombredocumentacion']."|".$idderivacion3."*";
           }else{
             echo "null";
           }
            
            while ($row_documentacion = pg_fetch_assoc($documentacion)){
                 $resultado =$resultado.$row_documentacion['nombredocumentacion']."|".$row_documentacion['iddocumentacion']."*";
            }
            echo $resultado;
  }


    if (($_POST["tarea"] == "establecerAnos") )
   {
        //echo "<script>alert('asdasd');</script>";
        $sql_mon= "select idmonitoreo,anho from monitoreo.monitoreo where   tipo=269 and estado = 1 and idregistro = ".$_SESSION['idreg']." order by anho asc";
        //echo $sql_mon;
        $monitoreo1 = pg_query($cn,$sql_mon) ;
        //$row_monitoreo= pg_fetch_array ($monitoreo);       
       //  $totalRows_monitoreo = pg_num_rows($monitoreo);
        $resultado11="";//$_SESSION['idreg']."-";
        while ($row_monitoreo1 = pg_fetch_assoc($monitoreo1)){
                $resultado11 =$resultado11.$row_monitoreo1['anho']."|";
        }
         echo $resultado11;//$_SESSION['idreg'];
    }


?>
