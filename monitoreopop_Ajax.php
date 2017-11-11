<?php
 //session_start();
//include "/sistema/cabecera.php";
//require_once $_SERVER['DOCUMENT_ROOT'] . '/sistema/config/config.php';
 
// require_once $_SERVER['DOCUMENT_ROOT'] . '/sistema/config/config.php';
// require_once APPPATH . '/sistema/NOTICIAS/GestorNoticias.php';
  require_once $_SERVER['DOCUMENT_ROOT'] . '/sistema/config/config.php';
  require_once APPPATH . '/NOTICIAS/GestorNoticias.php';
		
		
    if (($_POST["tarea"] == "monitoreopop") )
   {
     $resutado_ ="";
     $resutado_ = $resutado_." Clearcombo('comboAno2'); ";
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
      $msj="";
    if ($fechasuscripcion!="") {
        $predio_time = Date('Y-m-d', strtotime($fechasuscripcion));
        if($periodo1_time > $predio_time){
          $periodo=1;
        }
    }

     if ($periodo == 1){
        $resutado_ = $resutado_."addItemCombo('comboAno2' ,'',0);";
        $resutado_ = $resutado_."addItemCombo('comboAno2' ,'Año 2014',1);";
        $resutado_ = $resutado_."addItemCombo('comboAno2' ,'Año 2015',2);";
        $resutado_ = $resutado_."addItemCombo('comboAno2' ,'Año 2016',3);";
        $resutado_ = $resutado_."addItemCombo('comboAno2' ,'Año 2017',4);";
        $resutado_ = $resutado_."addItemCombo('comboAno2' ,'Año 2018',5);";
        $msj="no";
     }    
    if ($periodo == 2){
        $resutado_ = $resutado_."addItemCombo('comboAno2' ,'',0);";
        $resutado_ = $resutado_."addItemCombo('comboAno2' ,'Año 2016',1);";
        $resutado_ = $resutado_."addItemCombo('comboAno2' ,'Año 2017',2);";
        $resutado_ = $resutado_."addItemCombo('comboAno2' ,'Año 2018',3);";
        $resutado_ = $resutado_."addItemCombo('comboAno2' ,'Año 2019',4);";
         $resutado_ = $resutado_."addItemCombo('comboAno2' ,'Año 2020',5);";
          $msj="no";
     }        
     
   
     
     echo $resutado_;//$_SESSION['idreg'];
         
         
    }
    
     if (($_POST["tarea"] == "buscarreg") )
   {
         
         $msj="si";
         $resutado_ ="";
     $resutado_ = $resutado_." Clearcombo('comboAno2'); ";      
     $idreg1=$_POST["idreg1"];//$_SESSION['idreg']."-";
        
         $g=new GestorNoticias();
		$array=$g->buscarreg($idreg1);
		//$cont=pg_num_rows($array);
		//$noticia=pg_fetch_array($array);
		$num = 1;
               
       
       // $resultSuscripcion = pg_query($cn,$array) ;
        $row_Suscripcion = pg_fetch_array ($array);
        $fechasuscripcion = $row_Suscripcion['fechasuscripcion'];
        $periodo1_time = date($today="2015-09-29");

        $periodo=0;
        if ($fechasuscripcion!="") {
           $predio_time = Date('Y-m-d', strtotime($fechasuscripcion));
           if($periodo1_time > $predio_time){
             $periodo=1;
           }else{
               $periodo=2;
           }
        }

        if ($periodo == 1){
         //  $resutado_ = $resutado_."addItemCombo('comboAno2' ,'',0);";
           $resutado_ = $resutado_."addItemCombo('comboAno2' ,'Año 2014',1);";
           $resutado_ = $resutado_."addItemCombo('comboAno2' ,'Año 2015',2);";
           $resutado_ = $resutado_."addItemCombo('comboAno2' ,'Año 2016',3);";
           $resutado_ = $resutado_."addItemCombo('comboAno2' ,'Año 2017',4);";
           $resutado_ = $resutado_."addItemCombo('comboAno2' ,'Año 2018',5);";
            $msj="no";
        }    
       if ($periodo == 2){
          // $resutado_ = $resutado_."addItemCombo('comboAno2' ,'',0);";
           $resutado_ = $resutado_."addItemCombo('comboAno2' ,'Año 2016',1);";
           $resutado_ = $resutado_."addItemCombo('comboAno2' ,'Año 2017',2);";
           $resutado_ = $resutado_."addItemCombo('comboAno2' ,'Año 2018',3);";
           $resutado_ = $resutado_."addItemCombo('comboAno2' ,'Año 2019',4);";
            $resutado_ = $resutado_."addItemCombo('comboAno2' ,'Año 2020',5);";
             $msj="no";
        }        
        $resutado_ = $resutado_." document.getElementById('nombre').value='".rtrim($row_Suscripcion['nombre'])."'; ";
        $resutado_ = $resutado_." document.getElementById('actividad').value='".$row_Suscripcion['nombrecodificador']."'; ";
     
        if($msj=="si"){
          $resutado_ = $resutado_." document.getElementById('msjError').innerHTML ='No se Encuentra la Parcela con ese Código ';";
       } 
     
     echo $resutado_;
         
   }



?>
