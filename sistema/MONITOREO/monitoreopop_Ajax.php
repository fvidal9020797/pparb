<?php
 session_start();
include "../cabecera.php";

//$resultado = $_POST['idnotaext'] ;

  

    if (($_POST["tarea"] == "monitoreopop") )
   {
     $resutado_ ="";
     $resutado_ = $resutado_." Clearcombo('anho'); ";
       // $sql_mon= "select idmonitoreo,anho from monitoreo.monitoreo where  tipo=267 and estado = 1 and idregistro = ".$_SESSION['idreg']." order by anho asc";
        //$monitoreo1 = pg_query($cn,$sql_mon) ; 
        $idreg1=$_POST["idreg1"];//$_SESSION['idreg']."-";
       // while ($row_monitoreo1 = pg_fetch_assoc($monitoreo1)){
       //         $resultado11 =$resultado11.$row_monitoreo1['anho']."|";
       // }
     $sql_suscripcion = " select r.idregistro, fecharegistro, fechasuscripcion from registro as r full join fechasregistro as fr on r.idregistro = fr.idregistro
                where r.idregistro =".$idreg1;
 
     $resultSuscripcion = pg_query($cn,$sql_suscripcion) ;
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

     if ($periodo == 1){
        $resutado_ = $resutado_."addItemCombo('anho' ,'',0);";
        $resutado_ = $resutado_."addItemCombo('anho' ,'Año 2014',1);";
        $resutado_ = $resutado_."addItemCombo('anho' ,'Año 2015',2);";
        $resutado_ = $resutado_."addItemCombo('anho' ,'Año 2016',3);";
        $resutado_ = $resutado_."addItemCombo('anho' ,'Año 2017',4);";
        $resutado_ = $resutado_."addItemCombo('anho' ,'Año 2018',5);";
     }    
    if ($periodo == 2){
        $resutado_ = $resutado_."addItemCombo('anho' ,'',0);";
        $resutado_ = $resutado_."addItemCombo('anho' ,'Año 2016',3);";
        $resutado_ = $resutado_."addItemCombo('anho' ,'Año 2017',4);";
        $resutado_ = $resutado_."addItemCombo('anho' ,'Año 2018',5);";
        $resutado_ = $resutado_."addItemCombo('anho' ,'Año 2019',6);";
         $resutado_ = $resutado_."addItemCombo('anho' ,'Año 2020',7);";
     }        
     
     
     
     echo $resutado_;//$_SESSION['idreg'];
         
         
    }



?>
