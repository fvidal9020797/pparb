<?php
 session_start();
include "../cabecera.php";

//$resultado = $_POST['idnotaext'] ;

   


    if (($_POST["tarea"] == "establecerAnos") )
   {
        
        $sql_mon= "select idmonitoreo,anho from monitoreo.monitoreo where tipo=267 and estado = 1 and idregistro = ".$_SESSION['idreg']." order by anho asc";
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
