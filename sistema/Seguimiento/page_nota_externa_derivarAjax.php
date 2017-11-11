<?php
 session_start();
include "../cabecera.php";

$resultado = $_POST['idnotaext'] ;

   if (($_POST["tarea"] == "guardarderivacion") )
   {
        // GUARDAMOS LA DERIVACION DE LA NOTA
        $fecharec = null;
        $numder = $_POST["idderivacion"];
        $insertaux3=sprintf("select * from f_derivar_nota_ext2 (%s, %s, %s, %s, %s, %s, %s, %s, %s);",
                    GetSQLValueString(trim($_POST['idnotaext']), "int"),
                    GetSQLValueString($_POST['comboremitente'], "int"),
                    GetSQLValueString($_POST['combodestinatario'], "int"),
                    GetSQLValueString($fecharec, "date"),
                    GetSQLValueString($_POST['fechaderivn'], "date"),
                    GetSQLValueString($_POST['comboaccion'], "int"),
                    GetSQLValueString(trim($numder), "int"),
                    GetSQLValueString($_POST['proveido'], "text"),
                    GetSQLValueString($_POST['comboaccionrcia'], "int"));

                //  echo $insertaux3;
          $Result3 = pg_query($cn, $insertaux3);
          $row_derivacion3 = pg_fetch_array ($Result3);
          $idderivacion3= $row_derivacion3['f_derivar_nota_ext2'];
        //  $_SESSION['datos_nota_ext_d']['idder']=$idderivacion3;
           if($idderivacion3>0){
            echo $idderivacion3;
           }else{
             echo "0";
           }

           //--- EMPEZAR A GUARDAR EL MONITOREO
          $chekRCIA=0;
          if (empty( $_POST['chekRCIA']))
          {
               $chekRCIA=$_POST['comboaccionrcia'];
	        }
          else
          {
               $chekRCIA=0;
	        }

          //echo "VALOR DEL CHECK : ".$chekRCIA;
          //exit;

         $idaccion=0;
	       //$idaccion=GetSQLValueString($_POST['chekRCIA'], "int");
         $idaccion=GetSQLValueString($_POST['comboaccion'], "int");



         if($chekRCIA<>0 && $idaccion==315){
            // echo "si entro a moni";
                $idnot=GetSQLValueString(trim($_POST['idnotaext']), "int");

                $sql_detalle_nota_externa = "select d.idsolicitudext, d.idnotaext, p.idparcela, p.nombre as nombreparcela, t.nombresolicitud || ' '|| (s.anosolicitud+2013)::text as nombresolicitud, d.observacion
                from detallenotaext as d inner join solicitudrecepcionada as s on d.idsolicitudext = s.idsolicitudrecepcionada
                inner join parcelas as p on p.idparcela = s.codigoparcela
                inner join tiposolicitud as t on t.idsolicitud = s.tiposolicitud
                WHERE d.idnotaext=".$idnot.
                "order by nombreparcela" ;

                $detallenotaext_ = pg_query($cn,$sql_detalle_nota_externa);
                // $row_detallenotaext = pg_fetch_array ($detallenotaext);
                //$total_row_detalle_nota = pg_num_rows($detallenotaext);
               //  echo "TOTAL DETALLES=".$total_row_detalle_nota;
                $idSol_=0;
                while ( $row_detallenotaext_ = pg_fetch_array ($detallenotaext_)  )
                {

                     $idSol_=$row_detallenotaext_["idsolicitudext"];

                    $insertUSR3= " select s.anosolicitud,p.idregistro from solicitudrecepcionada s inner join v_parcela as p on p.idparcela = s.codigoparcela where p.idregistro > 0 and s.idsolicitudrecepcionada=".$idSol_;
                    $Result3 = pg_query($cn, $insertUSR3);
                    $row_accion3 = pg_fetch_array ($Result3);
                    $anho_= 0;
                    $idReg_= 0;
                    $anho_= $row_accion3['anosolicitud']; // saco año de la solicitud
                    $idReg_= $row_accion3['idregistro'];

                    // sacar oficina del usuario destino
                    $oficina=0;
                    $iddest_=  GetSQLValueString($_POST['combodestinatario'], "int");
                    $insertUSR4= " select * from funcionario   where idfuncionario=".$iddest_;
                    $Result4 = pg_query($cn, $insertUSR4);
                    $row_accion4 = pg_fetch_array ($Result4);
                    $oficina = $row_accion4['oficina'];
                    $tipoFun_ = $row_accion4['cargo'];
                    $tipoFunres_ = $row_accion4['idunidad'];
                    //trigger_error ("consulta moni=".$insertUSR3, E_USER_ERROR);
                    $valoracion=0;
                    $idmonitoreo=0;
                    $nota=0;
                    $estado_=1;
                    $agenteauxiliar="null";
                    $fechainf="null";


                    if ($chekRCIA==266 || $chekRCIA==267)
                    {
                      //--GUARDAR MONITOREO TIPO 266 LLENADO DE RCIA CON SUS GUARDAR FUNCIOANRIOS
                      $sql5="SELECT * from monitoreo.ff_monitoreo(".$idmonitoreo.",".$idReg_ .","
                      .$anho_ .",266,".$estado_ .",".$nota .","
                      .$valoracion.",".$agenteauxiliar.",".$oficina.",".$fechainf.")";
                      $Result5 = pg_query($cn, $sql5);
                      $row_accion5 = pg_fetch_array ($Result5);
                      $idmon = $row_accion5[0];

                       $bosques_=0;
                       $alimentos=0 ;
                       if($tipoFun_==138){
                            $bosques_=$iddest_;
                       }else{
                           if($tipoFun_==137 || $tipoFunres_==252){
                             $alimentos=$iddest_;
                           }
                       }

                       $tiporegistrador=0;

                       if($bosques_!=0){
                           $tiporegistrador=137;
                           $sql6="SELECT * from monitoreo.ff_funcionariomonitoreo(".$idmon.",".$bosques_.",".$tiporegistrador.")";
                           $Result6 = pg_query($cn, $sql6);
                       }

                        if($alimentos!=0){
                           $tiporegistrador=138;
                           $sql7="SELECT * from monitoreo.ff_funcionariomonitoreo(".$idmon.",".$alimentos.",".$tiporegistrador.")";
                           $Result7_= pg_query($cn, $sql7);
                       }

                      // echo "Si termino";

                        //--GUARDAR MONITOREO TIPO 267 EVALUACION DE RCIA CON SUS GUARDAR FUNCIOANRIOS
                      $sql5="SELECT * from monitoreo.ff_monitoreo(".$idmonitoreo.",".$idReg_ .","
                      .$anho_ .",267,".$estado_ .",".$nota .","
                      .$valoracion.",".$agenteauxiliar.",".$oficina.",".$fechainf.")";
                      $Result5 = pg_query($cn, $sql5);
                      $row_accion5 = pg_fetch_array ($Result5);
                      $idmon = $row_accion5[0];

                       $bosques_=0;
                       $alimentos=0 ;
                       if($tipoFun_==138){
                            $bosques_=$iddest_;
                       }else{
                           if($tipoFun_==137 || $tipoFunres_==252){
                             $alimentos=$iddest_;
                           }
                       }

                       $tiporegistrador=0;
                        if($bosques_!=0){
                           $tiporegistrador=137;
                           $sql6="SELECT * from monitoreo.ff_funcionariomonitoreo(".$idmon.",".$bosques_.",".$tiporegistrador.")";
                           $Result6 = pg_query($cn, $sql6);
                        }
                        if($alimentos!=0){
                           $tiporegistrador=138;
                           $sql7="SELECT * from monitoreo.ff_funcionariomonitoreo(".$idmon.",".$alimentos.",".$tiporegistrador.")";
                           $Result7_= pg_query($cn, $sql7);
                        }

                    }

                    ///////// PARA DERIVAR MONITOREO DE GABINETE
                    if($chekRCIA==268 )
                    {
                          //--GUARDAR MONITOREO TIPO 268 MONITOREO DE GABINETE DE RCIA CON SUS GUARDAR FUNCIOANRIOS
                          $sql5="SELECT * from monitoreo.ff_monitoreo(".$idmonitoreo.",".$idReg_ .","
                          .$anho_ .",268,".$estado_ .",".$nota .","
                          .$valoracion.",".$agenteauxiliar.",".$oficina.",".$fechainf.")";
                          $Result5 = pg_query($cn, $sql5);
                          $row_accion5 = pg_fetch_array ($Result5);
                          $idmon = $row_accion5[0];

                           $bosques_=0;
                           $alimentos=0 ;
                           if($tipoFun_==138){
                                $bosques_=$iddest_;
                           }else{
                               if($tipoFun_==137 || $tipoFunres_==251){
                                 $alimentos=$iddest_;
                               }
                           }
                           $tiporegistrador=0;

                           if($bosques_!=0){
                               $tiporegistrador=137;
                               $sql6="SELECT * from monitoreo.ff_funcionariomonitoreo(".$idmon.",".$bosques_.",".$tiporegistrador.")";
                               $Result6 = pg_query($cn, $sql6);
                           }

                            if($alimentos!=0){
                               $tiporegistrador=138;
                               $sql7="SELECT * from monitoreo.ff_funcionariomonitoreo(".$idmon.",".$alimentos.",".$tiporegistrador.")";
                               $Result7_= pg_query($cn, $sql7);
                           }

                    }

                    /////// PARA DERIVAR VERIFICACION DE CAMPO
                    if($chekRCIA==269)
                    {
                          //--GUARDAR MONITOREO TIPO 268 LLENADO DE RCIA CON SUS GUARDAR FUNCIOANRIOS
                          $sql5="SELECT * from monitoreo.ff_monitoreo(".$idmonitoreo.",".$idReg_ .","
                          .$anho_ .",269,".$estado_ .",".$nota .","
                          .$valoracion.",".$agenteauxiliar.",".$oficina.",".$fechainf.")";
                          $Result5 = pg_query($cn, $sql5);
                          $row_accion5 = pg_fetch_array ($Result5);
                          $idmon = $row_accion5[0];

                           $bosques_=0;
                           $alimentos=0 ;
                           if($tipoFun_==138){
                                $bosques_=$iddest_;
                           }else{
                               if($tipoFun_==137 || $tipoFunres_==252){
                                 $alimentos=$iddest_;
                               }
                           }
                           $tiporegistrador=0;

                           if($bosques_!=0){
                               $tiporegistrador=137;
                               $sql6="SELECT * from monitoreo.ff_funcionariomonitoreo(".$idmon.",".$bosques_.",".$tiporegistrador.")";
                               $Result6 = pg_query($cn, $sql6);
                           }

                            if($alimentos!=0){
                               $tiporegistrador=138;
                               $sql7="SELECT * from monitoreo.ff_funcionariomonitoreo(".$idmon.",".$alimentos.",".$tiporegistrador.")";
                               $Result7_= pg_query($cn, $sql7);
                           }
                          $sql5="SELECT * from monitoreo.ff_monitoreo(".$idmonitoreo.",".$idReg_ .","
                          .$anho_ .",269,".$estado_ .",".$nota .","
                          .$valoracion.",".$agenteauxiliar.",".$oficina.",".$fechainf.")";
                          $Result5 = pg_query($cn, $sql5);
                          $row_accion5 = pg_fetch_array ($Result5);
                          $idmon = $row_accion5[0];
                    }



               }

         }


         else
         {
             //echo "noo entro a moni";
         }


  }




?>
