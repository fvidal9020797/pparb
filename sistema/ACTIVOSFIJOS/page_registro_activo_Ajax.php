<?php
 session_start();
include "../cabecera.php";


//$resultado = $_POST['idnotaext'] ;

if (($_POST["tarea"] == "cargarcombosTodos") )
   {
       $resultado=" ";

       $sql_grupo = "select * from activofijo.grupo order by nombregrupo asc ;";
         $docres = pg_query($cn,$sql_grupo);
        // $totalRows = pg_num_rows($docres);

         // $sql_subgrupo = "select * from activofijo.subgrupo order by nombresubgrupo asc ;";
        // $docressub = pg_query($cn,$sql_subgrupo);

         $sql_obs = "select * from activofijo.observacion order by idobservacion asc ;";
         $docresobs = pg_query($cn,$sql_obs);

         $sql_estado = "select * from activofijo.estado order by idestado asc ;";
         $docresestado= pg_query($cn,$sql_estado);

          $sql_namea = "select * from activofijo.nombreactivo order by nombreactivo asc ;";
         $docresnamea= pg_query($cn,$sql_namea);


           $resultado =$resultado."addItemCombo('cbogrupo','Elegir..',0); ";
           $resultado =$resultado."addItemCombo('cbogruponew','Elegir..',0); ";
           $resultado =$resultado."addItemCombo('cbosubgrupo','Elegir..',0); ";
           $resultado =$resultado."addItemCombo('cbonameg','Elegir..',0); ";
           $resultado =$resultado."addItemCombo('cboObs','Elegir..',0); ";
            $resultado =$resultado."addItemCombo('cboestado','Elegir..',0); ";


        while ($row_documentacion = pg_fetch_assoc($docres)){
                 $resultado =$resultado."addItemCombo('cbogrupo','".$row_documentacion['nombregrupo']." (".$row_documentacion['codigo'].")',".$row_documentacion['idgrupo']."); ";
                 $resultado =$resultado."addItemCombo('cbogruponew','".$row_documentacion['nombregrupo']." (".$row_documentacion['codigo'].")',".$row_documentacion['idgrupo']."); ";
            }

      //  while ($row_sub= pg_fetch_assoc($docressub)){
       //      $resultado =$resultado."addItemCombo('cbosubgrupo','".$row_sub['nombresubgrupo']."',".$row_sub['idsubgrupo']."); ";
       // }

        while ($row_obs = pg_fetch_assoc($docresobs)){
             $resultado =$resultado."addItemCombo('cboObs','".$row_obs['nombreobservacion']."',".$row_obs['idobservacion']."); ";
        }

        while ($row_namea = pg_fetch_assoc($docresnamea)){
             $resultado =$resultado."addItemCombo('cbonameg','".$row_namea['nombreactivo']." (".$row_namea['codigo'].")',".$row_namea['idnombreactivo']."); ";
        }

         while ($row_estado = pg_fetch_assoc($docresestado)){
             $resultado =$resultado."addItemCombo('cboestado','".$row_estado['nombreestado']."',".$row_estado['idestado']."); ";
        }


       echo $resultado;

  }




if (($_POST["tarea"] == "cargargrupo") )
   {
       $resultado=" ";
      $id_=$_POST["id"];

       $sql_grupo = "select * from activofijo.grupo where estado=1 order by nombregrupo asc ;";
       //  echo "select * from activofijo.f_guardar_grupo(".$idgrupo.",'".$grupo."');";
         $docres = pg_query($cn,$sql_grupo);
         $totalRows = pg_num_rows($docres);

          $resultado =$resultado."addItemCombo('cbogrupo','Elegir..',0); ";
          $resultado =$resultado."addItemCombo('cbogruponew','Elegir..',0); ";

        while ($row_documentacion = pg_fetch_assoc($docres)){
                 $resultado =$resultado."addItemCombo('cbogrupo','".$row_documentacion['nombregrupo']." (".$row_documentacion['codigo'].")',".$row_documentacion['idgrupo']."); ";
                   $resultado =$resultado."addItemCombo('cbogruponew','".$row_documentacion['nombregrupo']." (".$row_documentacion['codigo'].")',".$row_documentacion['idgrupo']."); ";
            }

           $resultado =$resultado." seleccionarComboId('cbogrupo',".$id_."); ";
           $resultado =$resultado." seleccionarComboId('cbogruponew',".$id_."); ";
       echo $resultado;

  }



  if (($_POST["tarea"] == "cargarsubgrupo") )
   {
       $resultado=" ";
      $id_=$_POST["id"];
      $idg_=$_POST["idg"];

       $sql_grupo = "select * from activofijo.subgrupo where estado=1 and idgrupo=$idg_ order by nombresubgrupo asc ;";
         //  echo "con=".$sql_grupo."----=".$idg_;
         $docres = pg_query($cn,$sql_grupo);
         $totalRows = pg_num_rows($docres);

          $resultado =$resultado."addItemCombo('cbosubgrupo','Elegir..',0); ";

        while ($row_documentacion = pg_fetch_assoc($docres)){
                 $resultado =$resultado."addItemCombo('cbosubgrupo','".$row_documentacion['nombresubgrupo']." (".$row_documentacion['codigo'].")',".$row_documentacion['idsubgrupo']."); ";
            }

           $resultado =$resultado." seleccionarComboId('cbosubgrupo',".$id_."); ";
           $resultado =$resultado." seleccionarComboId('cbogrupo',".$idg_."); ";
       echo $resultado;

  }



   if (($_POST["tarea"] == "cargarestado") )
   {
       $resultado=" ";
      $id_=$_POST["id"];

       $sql_grupo = "select * from activofijo.estado where estado=1 order by idestado asc ;";
       //  echo "select * from activofijo.f_guardar_grupo(".$idgrupo.",'".$grupo."');";
         $docres = pg_query($cn,$sql_grupo);
         $totalRows = pg_num_rows($docres);

          $resultado =$resultado."addItemCombo('cboestado','Elegir..',0); ";

        while ($row_documentacion = pg_fetch_assoc($docres)){
                 $resultado =$resultado."addItemCombo('cboestado','".$row_documentacion['nombreestado']."',".$row_documentacion['idestado']."); ";
            }

           $resultado =$resultado." seleccionarComboId('cboestado',".$id_."); ";
       echo $resultado;

  }




   if (($_POST["tarea"] == "cargaranamea") )
   {
       $resultado=" ";
      $id_=$_POST["id"];

       $sql_grupo = "select * from activofijo.nombreactivo order by nombreactivo asc ;";
       //  echo "select * from activofijo.f_guardar_grupo(".$idgrupo.",'".$grupo."');";
     //  echo "connnn=".$sql_grupo;
         $docres = pg_query($cn,$sql_grupo);
         $totalRows = pg_num_rows($docres);
         $resultado =$resultado."addItemCombo('cbonameg','Elegir..',0); ";


        while ($row_documentacion = pg_fetch_assoc($docres)){
                 $resultado =$resultado."addItemCombo('cbonameg','".$row_documentacion['nombreactivo']."',".$row_documentacion['idnombreactivo']."); ";
            }

           $resultado =$resultado." seleccionarComboId('cbonameg',".$id_."); ";
       echo $resultado;

  }


     if (($_POST["tarea"] == "cargararea") )
   {
       $resultado=" ";
      $id_=$_POST["id"];

      $resultado =$resultado."addItemCombo('cboarea','Elegir..',0); ";

       $sql_grupo = "select * from activofijo.area order by nombrearea asc ;";
       //  echo "select * from activofijo.f_guardar_grupo(".$idgrupo.",'".$grupo."');";
         $docres = pg_query($cn,$sql_grupo);
         $totalRows = pg_num_rows($docres);


        while ($row_documentacion = pg_fetch_assoc($docres)){
                 $resultado =$resultado."addItemCombo('cboarea','".$row_documentacion['nombrearea']."',".$row_documentacion['idarea']."); ";
            }

           $resultado =$resultado." seleccionarComboId('cboarea',".$id_."); ";
       echo $resultado;

  }


  if (($_POST["tarea"] == "cargarobs") )
   {
       $resultado=" ";
      $id_=$_POST["id"];

       $sql_grupo = "select * from activofijo.observacion order by idobservacion asc ;";
       //  echo "select * from activofijo.f_guardar_grupo(".$idgrupo.",'".$grupo."');";
         $docres = pg_query($cn,$sql_grupo);
         $totalRows = pg_num_rows($docres);

          $resultado =$resultado."addItemCombo('cboObs','Elegir..',0); ";

        while ($row_documentacion = pg_fetch_assoc($docres)){
                 $resultado =$resultado."addItemCombo('cboObs','".$row_documentacion['nombreobservacion']."',".$row_documentacion['idobservacion']."); ";
            }

           $resultado =$resultado." seleccionarComboId('cboObs',".$id_."); ";
       echo $resultado;

  }



   if (($_POST["tarea"] == "grupo") )
   {
       $resultado=0;
       $grupo=$_POST["nombregrupo"];
       $idgrupo=$_POST["id"];
       $accion=$_POST["accion"];
       if($accion =="Nuevo"){
           $idgrupo=0;
       }

       $sql_grupo = "select * from activofijo.f_guardar_grupo(".$idgrupo.",'".$grupo."');";
       //  echo "select * from activofijo.f_guardar_grupo(".$idgrupo.",'".$grupo."');";
         $docres = pg_query($cn,$sql_grupo);
         $totalRows = pg_num_rows($docres);


         if($totalRows>0){
             if($accion =="Nuevo"){
                   $row_documentacion = pg_fetch_array ($docres);
                   $idd=$row_documentacion['f_guardar_grupo'];

                }else{

                   $idd =$idgrupo;
                }


             $resultado=$idd;
         }else{
             $resultado=0;
         }
        //   ego &= " seleccionarCombo('cboUbicacion','General'); "
         //$row_documentacion = pg_fetch_array ($docres);
        // $idderivacion3=$row_documentacion['iddocumentacion'];

        /* $sql_documentacion = "select * from monitoreo.documentacion where tipodocumento = 71 order by nombredocumentacion asc";
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
            echo $resultado;*/
       echo $resultado;
  }


    if (($_POST["tarea"] == "subgrupo") )
   {
       $resultado=0;
       $grupo=$_POST["nombresubgrupo"];
       $idgrupo=$_POST["id"];
       $accion=$_POST["accion"];
       $idg=$_POST["idgruponew"];

       if($accion =="Nuevo"){
           $idgrupo=0;
       }

       $sql_grupo = "select * from activofijo.f_guardar_subgrupo(".$idgrupo.",'".$grupo."',".$idg.");";
       //  echo "select * from activofijo.f_guardar_grupo(".$idgrupo.",'".$grupo."');";
      // echo "con=".$sql_grupo;
         $docres = pg_query($cn,$sql_grupo);
         $totalRows = pg_num_rows($docres);


         if($totalRows>0){
             if($accion =="Nuevo"){
                   $row_documentacion = pg_fetch_array ($docres);
                   $idd=$row_documentacion['f_guardar_subgrupo'];
                }else{
                   $idd =$idgrupo;
                }
             $resultado=$idd;
         }else{
             $resultado=0;
         }

       echo $resultado;
  }



     if (($_POST["tarea"] == "estado") )
   {
       $resultado=0;
       $grupo=$_POST["nombreestado"];
       $idgrupo=$_POST["id"];
       $accion=$_POST["accion"];
       if($accion =="Nuevo"){
           $idgrupo=0;
       }

       $sql_grupo = "select * from activofijo.f_guardar_estado(".$idgrupo.",'".$grupo."');";
         // echo "select * from activofijo.f_guardar_estado(".$idgrupo.",'".$grupo."');";
          $docres = pg_query($cn,$sql_grupo);
         $totalRows = pg_num_rows($docres);


         if($totalRows>0){
             if($accion =="Nuevo"){
                   $row_documentacion = pg_fetch_array ($docres);
                   $idd=$row_documentacion['f_guardar_estado'];
                }else{
                   $idd =$idgrupo;
                }
             $resultado=$idd;
         }else{
             $resultado=0;
         }

       echo $resultado;
  }


   if (($_POST["tarea"] == "area") )
   {
       $resultado=0;
       $grupo=$_POST["nombrearea"];
       $idgrupo=$_POST["id"];
       $accion=$_POST["accion"];
       if($accion =="Nuevo"){
           $idgrupo=0;
       }

       $sql_grupo = "select * from activofijo.f_guardar_area(".$idgrupo.",'".$grupo."');";
       //  echo "select * from activofijo.f_guardar_grupo(".$idgrupo.",'".$grupo."');";
         $docres = pg_query($cn,$sql_grupo);
         $totalRows = pg_num_rows($docres);


         if($totalRows>0){
             if($accion =="Nuevo"){
                   $row_documentacion = pg_fetch_array ($docres);
                   $idd=$row_documentacion['f_guardar_area'];
                }else{
                   $idd =$idgrupo;
                }
             $resultado=$idd;
         }else{
             $resultado=0;
         }

       echo $resultado;
  }



      if (($_POST["tarea"] == "obs") )
   {
       $resultado=0;
       $grupo=$_POST["nombreobs"];
       $idgrupo=$_POST["id"];
       $accion=$_POST["accion"];
       if($accion =="Nuevo"){
           $idgrupo=0;
       }

       $sql_grupo = "select * from activofijo.f_guardar_observacion(".$idgrupo.",'".$grupo."');";
         // echo "select * from activofijo.f_guardar_estado(".$idgrupo.",'".$grupo."');";
          $docres = pg_query($cn,$sql_grupo);
         $totalRows = pg_num_rows($docres);


         if($totalRows>0){
             if($accion =="Nuevo"){
                   $row_documentacion = pg_fetch_array ($docres);
                   $idd=$row_documentacion['f_guardar_observacion'];
                }else{
                   $idd =$idgrupo;
                }
             $resultado=$idd;
         }else{
             $resultado=0;
         }

       echo $resultado;
  }




      if (($_POST["tarea"] == "name") )
   {
       $resultado=0;
       $grupo=$_POST["nombrename"];
       $idgrupo=$_POST["id"];
       $accion=$_POST["accion"];
       if($accion =="Nuevo"){
           $idgrupo=0;
       }

       $sql_grupo = "select * from activofijo.f_guardar_nombreactivo(".$idgrupo.",'".$grupo."');";
         // echo "select * from activofijo.f_guardar_estado(".$idgrupo.",'".$grupo."');";
         //echo "consulta insertar:".$sql_grupo;
          $docres = pg_query($cn,$sql_grupo);
         $totalRows = pg_num_rows($docres);

         //echo "count=".$totalRows;
         if($totalRows>0){
             if($accion =="Nuevo"){
                   $row_documentacion = pg_fetch_array ($docres);
                   $idd=$row_documentacion['f_guardar_nombreactivo'];
                  // echo "row=".$idd;
                }else{
                   $idd =$idgrupo;
                }
             $resultado=$idd;
         }else{
             $resultado=0;
         }

       echo $resultado;
  }




 //----- guardar individual ----//
    if (($_POST["tarea"] == "guardarActivoIndividual") ){
       $resultado=0;
       $codigom=$_POST["codigom"];
       $idnombre=$_POST["idnombre"];
       $idgrupo=$_POST["idgrupo"];
       $idsubgrupo=$_POST["idsubgrupo"];
       $idestado=$_POST["idestado"];
       $idobs=$_POST["idobs"];
       $descripcion=$_POST["descripcion"];
       $fecha=$_POST["fecha"];

       $accion=$_POST["acciongral"];
       // echo "resss1=".$descripcion;
       $descripcion= str_replace("|", chr(10),  $descripcion);

      // echo "resss2=".$descripcion;
      //  Dim aString As String = Replace(obs, Chr(10), "!")
       $sql_grupo = "select * from activofijo.f_guardar_registro_activo_uno(".$accion
               .",'".$codigom."',".$idnombre.",'".$fecha."',".$idgrupo.",".$idsubgrupo.",".$idestado.",".$idobs
               .",'".$descripcion."');";
          //  echo "accion=".$sql_grupo;
       // echo "CONN=".$sql_grupo;

          $docres = pg_query($cn,$sql_grupo);
          $totalRows_ = pg_num_rows($docres);

          if($totalRows_>0){
             // echo "entroo";
             if($accion =="0"){
                   $row_documentacion = pg_fetch_array ($docres);
                   $idd=$row_documentacion['f_guardar_registro_activo_uno'];
                }else{
                   $idd =$accion;
                }
             $resultado=$idd;
         }else{
             $resultado=0;
         }


          echo $resultado;

    }

   /// --   FIN GUARDAR INDIVIDUAL ---




    if (($_POST["tarea"] == "cargarListadoActivo") )
   {
       $resultado=" ";
       $filtro=$_POST["filtro"];
       $paginaactual=$_POST["paginaactual"];
       $pagini=$_POST["paginaini"];
       $pagfin=$_POST["paginafin"];


       $sql_grupo = " select a.*,na.nombreactivo,g.nombregrupo,sg.nombresubgrupo,ob.nombreobservacion,e.nombreestado from activofijo.activofijo a join activofijo.grupo g on a.idgrupo=g.idgrupo
	join activofijo.subgrupo sg on sg.idsubgrupo=a.idsubgrupo
	join activofijo.observacion ob on ob.idobservacion=a.idobservacion
	join activofijo.estado e on e.idestado=a.idestado
	join activofijo.nombreactivo na on na.idnombreactivo=a.idnombreactivo
        where a.estado=1 ".$filtro." ;";

         //echo "con fultro=".$sql_grupo;
       $docres = pg_query($cn,$sql_grupo);
      $num_registro = pg_num_rows($docres);




          $registros=15;
          $nropagina=$paginaactual;//$_GET["num"];
	  if(isset($nropagina)){//$_GET["num"]
		$pagina=$nropagina;//$_GET["num"]
	  }else{
		$pagina="1";
	  }

        if(is_numeric($pagina))
            $inicio=(($pagina-1)*$registros);
        else
            $inicio=0;
        $paginas=  ceil($num_registro/$registros);



         $sql_grupo = " select a.*,na.nombreactivo,g.nombregrupo,sg.nombresubgrupo,ob.nombreobservacion,e.nombreestado from activofijo.activofijo a join activofijo.grupo g on a.idgrupo=g.idgrupo
	join activofijo.subgrupo sg on sg.idsubgrupo=a.idsubgrupo
	join activofijo.observacion ob on ob.idobservacion=a.idobservacion
	join activofijo.estado e on e.idestado=a.idestado
	join activofijo.nombreactivo na on na.idnombreactivo=a.idnombreactivo
        where a.estado=1  ".$filtro." order by  a.fecha desc  limit $registros  offset $inicio ;";
        // echo "con=".$sql_grupo;
        $docres = pg_query($cn,$sql_grupo);
        $num_registro = pg_num_rows($docres);
        $indicef=0;
           $indicef=0;
        $sw="true";

        while ($row_act = pg_fetch_assoc($docres)){

            $indicef =$indicef+1;
            //                                               indice,          idIngreso,              coducab,                      codmdryt,                           nombre_ ,                grupo,                             subgrupo,                   nombreobs ,                   nombreesta,      sw)
             $resultado  =$resultado." cargarFilaActivo(".$indicef.",".$row_act['idactivo'].",'".$row_act['codigoucab']."','".$row_act['codigomdryt']."','".$row_act['fecha']."','".$row_act['nombreactivo']."','".$row_act['nombregrupo']."','".$row_act['nombresubgrupo']."','".$row_act['nombreobservacion']."','".$row_act['nombreestado']."','".$sw."');  "   ;
            if($sw=="true"){$sw="false";}else{$sw="true";}
        }
     //   echo $resultado;
     // echo "pagina=".$pagina." - pagniass=".$paginas ;
        $resultado=$resultado."document.getElementById('idPaginado').innerHTML='';";
        // $resultado=$resultado." tr = document.createElement('div'); tr.innerHTML = ' 1 ';  document.getElementById('idPaginado').appendChild(tr); ";
            $maxpaginado=10;

            if($paginas<$maxpaginado){
                 $maxpaginado=$paginas;
            }

            if($pagini==0){
                $pagini=1;
            }
            if($pagfin==0){
                $pagfin=$maxpaginado;
            }



              // cantidad de paginas total= $paginas
            // pagina actual =$pagina
           // $pagfin=$pagina+($maxpaginado/2);
           // echo "paginaini va=".$pagini;
            // echo "paginafin va=".$pagfin;
            // echo "resul=2ss".($pagina+(round($maxpaginado/2)));
             // echo "resul=ss".($pagina+( Math.round($maxpaginado/2)));

            if( $pagina >( round($maxpaginado/2))){
                if( $pagina+( round($maxpaginado/2))<= $paginas ){
                    $pagfin=$pagina+( round($maxpaginado/2));
                    $pagini=$pagfin-( round($maxpaginado-1));
                }else{
                    $pagfin=$paginas;
                    $pagini=$pagfin-( round($maxpaginado-1));
                }
            }else{
                if($maxpaginado<=$paginas){
                    $pagfin=$maxpaginado;
                    $pagini=1;
                }else{
                    $pagfin=$paginas;
                    $pagini=1;
                }
                //if()
               /* $pagfin1=$maxpaginado;
                $pagini1=$pagfin-($maxpaginado-1);
                if($pagini1>=1){
                    $pagfin=$pagfin1;
                    $pagini=$pagini1;
                }*/
            }
            // echo "paginaini va=".$pagini;
             //echo "paginafin va=".$pagfin;

            $paginatotalaux;

              if($pagina>1){
                 //$resultado=$resultado."<a href='listadoperfiles.php?num=".($pagina-1)."&fechaini=".$fechaini."&fechafin=".$fechafin."&cantidad=".$cantidad."'>Anterior</a> ";
                if($maxpaginado>$paginas){$paginatotalaux=$paginas;}else{$paginatotalaux=$maxpaginado;}

                $resultado=$resultado."insertarPrimera('idPaginado',1,1,".$paginatotalaux.");";
                $resultado=$resultado."insertarAnterior('idPaginado',".($pagina-1).",".$pagini.",".$pagfin.");";
            }


            for ($cont = $pagini; $cont <= $pagfin; $cont++) {// for ($cont = 1; $cont <= $paginas; $cont++) {
                 if($cont==$pagina ){
                       $resultado=$resultado."insertarActual('idPaginado',".$cont.",".$pagini.",".$pagfin.");";
                 }
                  else{
                      $resultado=$resultado."insertarNumero('idPaginado',".$cont.",".$pagini.",".$pagfin.");";
                  }
            }

            if($pagina<$paginas){
                  //$resultado=$resultado."<a href='listadoperfiles.php?num=".($pagina+1)."&fechaini=".$fechaini."&fechafin=".$fechafin."&cantidad=".$cantidad."'>Siguiente</a> ";
                  $resultado=$resultado."insertarSiguiente('idPaginado',".($pagina+1).",".$pagini.",".$pagfin.");";
                   if($maxpaginado>$paginas){$paginatotalaux=$paginas;$pag=1;}else{$paginatotalaux=$paginas;$pag=($paginas-($maxpaginado-1));  }
                  $resultado=$resultado."insertarUltima('idPaginado',".($paginas).",".$pag.",".$paginatotalaux.");";
            }

           // $resultado=$resultado."</div>";

       echo $resultado;

  }



   //----- guardar GRUPAL ----//
    if (($_POST["tarea"] == "guardarActivoGrupal") ){
         $resultado=0;
       $cantidad=$_POST["cantidad"];
       $idnombre=$_POST["idnombre"];
       $idgrupo=$_POST["idgrupo"];
       $idsubgrupo=$_POST["idsubgrupo"];
       $idestado=$_POST["idestado"];
       $idobs=$_POST["idobs"];
       $descripcion=$_POST["descripcion"];
       $fecha=$_POST["fecha"];
       $accion=$_POST["acciongral"];
       // echo "resss1=".$descripcion;
       $descripcion= str_replace("|", chr(10),  $descripcion);

      // echo "resss2=".$descripcion;
      //  Dim aString As String = Replace(obs, Chr(10), "!")

      for ($index = 1; $index <= $cantidad; $index++) {
           $sql_grupo = "select * from activofijo.f_guardar_registro_activo_uno(".$accion
               .",' ',".$idnombre.",'".$fecha."',".$idgrupo.",".$idsubgrupo.",".$idestado.",".$idobs
               .",'".$descripcion."');";
         // echo "conss=".$sql_grupo;
          $docres = pg_query($cn,$sql_grupo);
           $totalRows_ = pg_num_rows($docres);
           if($totalRows_>0){
             // echo "entroo";
             if($accion =="Nuevo"){
                   $row_documentacion = pg_fetch_array ($docres);
                   $idd=$row_documentacion['f_guardar_registro_activo_uno'];
                }else{
                   $idd =$idgrupo;
                }
               $resultado=$idd;
            }else{
                $resultado=0;
            }


      }

      echo $resultado;
        // $totalRows = pg_num_rows($docres);

    }

  //----- FIN GUARDAR GRUPAL ----- //



    if (($_POST["tarea"] == "cargarcombosListadoTodos") )
   {
       $resultado=" ";

       $sql_grupo = "select * from activofijo.grupo order by nombregrupo asc ;";
         $docres = pg_query($cn,$sql_grupo);
        // $totalRows = pg_num_rows($docres);

          $sql_subgrupo = "select * from activofijo.subgrupo order by nombresubgrupo asc ;";
         $docressub = pg_query($cn,$sql_subgrupo);

          $sql_obs = "select * from activofijo.observacion order by idobservacion asc ;";
         $docresobs = pg_query($cn,$sql_obs);

          $sql_estado = "select * from activofijo.estado order by idestado asc ;";
         $docresestado= pg_query($cn,$sql_estado);



           $resultado =$resultado."addItemCombo('buscargrupo','Elegir..',0); ";
           $resultado =$resultado."addItemCombo('buscarsubgrupo','Elegir..',0); ";

           $resultado =$resultado."addItemCombo('buscarobs','Elegir..',0); ";
            $resultado =$resultado."addItemCombo('buscares','Elegir..',0); ";


        while ($row_documentacion = pg_fetch_assoc($docres)){
                 $resultado =$resultado."addItemCombo('buscargrupo','".$row_documentacion['nombregrupo']." (".$row_documentacion['codigo'].")',".$row_documentacion['idgrupo']."); ";
            }

        while ($row_sub= pg_fetch_assoc($docressub)){
             $resultado =$resultado."addItemCombo('buscarsubgrupo','".$row_sub['nombresubgrupo']." (".$row_sub['codigo'].")',".$row_sub['idsubgrupo']."); ";
        }

        while ($row_obs = pg_fetch_assoc($docresobs)){
             $resultado =$resultado."addItemCombo('buscarobs','".$row_obs['nombreobservacion']."',".$row_obs['idobservacion']."); ";
        }

         while ($row_estado = pg_fetch_assoc($docresestado)){
             $resultado =$resultado."addItemCombo('buscares','".$row_estado['nombreestado']."',".$row_estado['idestado']."); ";
        }


       echo $resultado;

  }



if (($_POST["tarea"] == "cargarEditarUno") )
   {
       $resultado=" ";
      $id_=$_POST["id"];

       $sql_grupo = "select * from activofijo.activofijo where idactivo=".$id_.";";
        //  echo "con=".$sql_grupo;
         $docres = pg_query($cn,$sql_grupo);
         $totalRows = pg_num_rows($docres);
         if($totalRows>0){
             $row_documentacion = pg_fetch_assoc($docres);

             $resultado =$resultado." document.getElementById('txtcoducab').value='".$row_documentacion['codigoucab']."';";
             $resultado =$resultado." document.getElementById('txtfecha').value='".$row_documentacion['fecha']."';";

             $resultado =$resultado." document.getElementById('idcodigomdryt').value='".$row_documentacion['codigomdryt']."';";
             $resultado =$resultado."seleccionarComboId('cbonameg',".$row_documentacion['idnombreactivo'].");";
             $resultado =$resultado."seleccionarComboId('cbonameg',".$row_documentacion['idnombreactivo'].");";
             $resultado =$resultado."seleccionarComboId('cbogrupo',".$row_documentacion['idgrupo'].");";
             //$resultado =$resultado."seleccionarComboId('cbosubgrupo',".$row_documentacion['idsubgrupo'].");";
             $resultado =$resultado."seleccionarComboId('cboestado',".$row_documentacion['idestado'].");";
             $resultado =$resultado."seleccionarComboId('cboObs',".$row_documentacion['idobservacion'].");";

              $resultado =$resultado."cargarcombosubgrupo(".$row_documentacion['idsubgrupo'].",".$row_documentacion['idgrupo'].");";

             $descripcion=$row_documentacion['caracteristicas'];
              $descripcion= str_replace( chr(10),"|",  $descripcion);

               $resultado =$resultado."cargarCaracteristicas('".$descripcion."');";


             //$row_documentacion['caracteristicas'];

         }

            // $resultado =$resultado." document.getElementById('cbogrupo').disabled = 'true'; ";
             //$resultado =$resultado." document.getElementById('cbosubgrupo').disabled = 'true' ;";

             //$resultado =$resultado." document.getElementById('cbogrupo').disabled = 'true' ;";

           /*  $resultado =$resultado." document.getElementById('btngrupo').disabled = 'true' ;";
             $resultado =$resultado." document.getElementById('btnsubgrupo').disabled = 'true' ;";

             $resultado =$resultado." document.getElementById('btngrupo').style.background = '#7F8C8D';";
             $resultado =$resultado." document.getElementById('btnsubgrupo').style.background = '#7F8C8D';";

             $resultado =$resultado."  $('#cbosubgrupo').prop('disabled', 'disabled'); ";
             $resultado =$resultado."  $('#cbogrupo').prop('disabled', 'disabled'); ";*/
         //  $resultado =$resultado."
       echo $resultado;

  }



///---------TAREAS DE ASIGNACION-----///

  if (($_POST["tarea"] == "cargarcombosAsignacion") )
   {
       $resultado=" ";


       $sql_area = "select * from activofijo.area order by idarea asc ;";
         $docarea = pg_query($cn,$sql_area);

       $sql_grupo = "select * from activofijo.departamento order by iddpto asc ;";
         $docres = pg_query($cn,$sql_grupo);
        // $totalRows = pg_num_rows($docres);

       $sql_grupo2 = "select * from activofijo.departamento order by iddpto asc ;";
         $docres2 = pg_query($cn,$sql_grupo2);

           $sql_subgrupo = " select f.idfuncionario,  coalesce(p.nombre1, '') || ' ' || coalesce(p.nombre2, '') || ' ' || coalesce(p.apellidopat, '')     AS nombre_nompleto
	from funcionario f join persona p on p.idpersona=f.idpersona where f.estadofun='A'  and (financiamiento='UCAB' or financiamiento='VDRA') order by p.nombre1 asc ;";
          $docressub = pg_query($cn,$sql_subgrupo);


           $resultado =$resultado."addItemCombo('cbodpto','Elegir..',0); ";
           $resultado =$resultado."addItemCombo('cbodptonew','Elegir..',0); ";
           $resultado =$resultado."addItemCombo('cboregional','Elegir..',0); ";
            $resultado =$resultado."addItemCombo('cboPersonal','Elegir..',0); ";
            $resultado =$resultado."addItemCombo('cboarea','Elegir..',0); ";

         while ($row_area = pg_fetch_assoc($docarea)){
                 $resultado =$resultado."addItemCombo('cboarea','".$row_area['nombrearea']."',".$row_area['idarea']."); ";
            }

        while ($row_documentacion = pg_fetch_assoc($docres)){
                 $resultado =$resultado."addItemCombo('cbodptonew','".$row_documentacion['nombredpto']."',".$row_documentacion['iddpto']."); ";
            }

        while ($row_documentacion = pg_fetch_assoc($docres2)){
           $resultado =$resultado."addItemCombo('cbodpto','".$row_documentacion['nombredpto']."',".$row_documentacion['iddpto']."); ";
      }

         while ($row_sub= pg_fetch_assoc($docressub)){
             $resultado =$resultado."addItemCombo('cboPersonal','".$row_sub['nombre_nompleto']."',".$row_sub['idfuncionario']."); ";
         }




       echo $resultado;

  }


   if (($_POST["tarea"] == "regional") )
   {
       $resultado=0;
       $grupo=$_POST["nombreregional"];
       $idgrupo=$_POST["id"];
       $accion=$_POST["accion"];
       $iddpto=$_POST["iddpto"];

       if($accion =="Nuevo"){
           $idgrupo=0;
       }

        $sql_grupo = "select * from activofijo.f_guardar_regionales(".$idgrupo.",'".$grupo."',".$iddpto.");";
         //  echo "select * from activofijo.f_guardar_grupo(".$idgrupo.",'".$grupo."');";
        // echo "cnnn=".$sql_grupo;
         $docres = pg_query($cn,$sql_grupo);
        $totalRows = pg_num_rows($docres);


         if($totalRows>0){
             if($accion =="Nuevo"){
                   $row_documentacion = pg_fetch_array ($docres);
                   $idd=$row_documentacion['f_guardar_regionales'];
                }else{
                   $idd =$idgrupo;
                }
             $resultado=$idd;
         }else{
             $resultado=0;
         }

       echo $resultado;
  }


  if (($_POST["tarea"] == "cargarregional") )
   {
       $resultado=" ";
      $id_=$_POST["id"];
      $iddpto_=$_POST["iddpto"];

       $sql_grupo = "select * from activofijo.regionales where iddpto=$iddpto_ order by idregional asc ;";
       //  echo "select * from activofijo.f_guardar_grupo(".$idgrupo.",'".$grupo."');";
         $docres = pg_query($cn,$sql_grupo);
         $totalRows = pg_num_rows($docres);

          $resultado =$resultado."addItemCombo('cboregional','Elegir..',0); ";
        while ($row_documentacion = pg_fetch_assoc($docres)){
                 $resultado =$resultado."addItemCombo('cboregional','".$row_documentacion['nombreregional']."',".$row_documentacion['idregional']."); ";
            }

           $resultado =$resultado." seleccionarComboId('cboregional',".$id_."); ";
       echo $resultado;

  }



////--- cargar  tabla actios externo---//

     if (($_POST["tarea"] == "cargarListadoActivo_ext") )
   {
       $resultado=" ";
       $filtro=$_POST["filtro"];
       $paginaactual=$_POST["paginaactual"];
       $pagini=$_POST["paginaini"];
       $pagfin=$_POST["paginafin"];


       $sql_grupo = " select a.*,na.nombreactivo,g.nombregrupo,sg.nombresubgrupo,ob.nombreobservacion,e.nombreestado from activofijo.activofijo a join activofijo.grupo g on a.idgrupo=g.idgrupo
	join activofijo.subgrupo sg on sg.idsubgrupo=a.idsubgrupo
	join activofijo.observacion ob on ob.idobservacion=a.idobservacion
	join activofijo.estado e on e.idestado=a.idestado
	join activofijo.nombreactivo na on na.idnombreactivo=a.idnombreactivo
        join activofijo.detalleasignacion dd on dd.idactivo=a.idactivo
	join activofijo.asignacion asi on asi.idasignacion=dd.idasignacion
	join activofijo.administrador ad on ad.idfuncionario=asi.idfuncionario
        where a.estado=1 and dd.estadoasignado=1 and a.idestado=1 and ad.estado=1 ".$filtro." ;";

     //  echo "con fultro=".$sql_grupo;
       $docres = pg_query($cn,$sql_grupo);
      $num_registro = pg_num_rows($docres);




          $registros=15;
          $nropagina=$paginaactual;//$_GET["num"];
	  if(isset($nropagina)){//$_GET["num"]
		$pagina=$nropagina;//$_GET["num"]
	  }else{
		$pagina="1";
	  }

        if(is_numeric($pagina))
            $inicio=(($pagina-1)*$registros);
        else
            $inicio=0;
        $paginas=  ceil($num_registro/$registros);



         $sql_grupo = " select a.*,na.nombreactivo,g.nombregrupo,sg.nombresubgrupo,ob.nombreobservacion,e.nombreestado from activofijo.activofijo a join activofijo.grupo g on a.idgrupo=g.idgrupo
	join activofijo.subgrupo sg on sg.idsubgrupo=a.idsubgrupo
	join activofijo.observacion ob on ob.idobservacion=a.idobservacion
	join activofijo.estado e on e.idestado=a.idestado
	join activofijo.nombreactivo na on na.idnombreactivo=a.idnombreactivo
        join activofijo.detalleasignacion dd on dd.idactivo=a.idactivo
	join activofijo.asignacion asi on asi.idasignacion=dd.idasignacion
	join activofijo.administrador ad on ad.idfuncionario=asi.idfuncionario
        where a.estado=1 and dd.estadoasignado=1  and ad.estado=1 and a.idestado=1 ".$filtro." order by  a.idactivo desc  limit $registros  offset $inicio ;";
        // echo "con=".$sql_grupo;
        $docres = pg_query($cn,$sql_grupo);
        $num_registro = pg_num_rows($docres);
        $indicef=0;
           $indicef=0;
        $sw1="true";

        while ($row_act = pg_fetch_assoc($docres)){

            $indicef =$indicef+1;
             $resultado  =$resultado." cargarFilaActivo_ext2(".$indicef.",".$row_act['idactivo'].",'".$row_act['codigoucab']."','".$row_act['codigomdryt']."','".$row_act['nombreactivo']."',".$row_act['idgrupo'].",'".$row_act['nombregrupo']."',".$row_act['idsubgrupo'].",'".$row_act['nombresubgrupo']."',".$row_act['idobservacion'].",'".$row_act['nombreobservacion']."',".$row_act['idestado'].",'".$row_act['nombreestado']."','".$sw1."');  "   ;
            if($sw1=="true"){$sw1="false";}else{$sw1="true";}
        }
        // echo $resultado;
     // echo "pagina=".$pagina." - pagniass=".$paginas ;
        $resultado=$resultado."document.getElementById('idPaginado').innerHTML='';";
        // $resultado=$resultado." tr = document.createElement('div'); tr.innerHTML = ' 1 ';  document.getElementById('idPaginado').appendChild(tr); ";
            $maxpaginado=10;

            if($paginas<$maxpaginado){
                 $maxpaginado=$paginas;
            }

            if($pagini==0){
                $pagini=1;
            }
            if($pagfin==0){
                $pagfin=$maxpaginado;
            }



              // cantidad de paginas total= $paginas
            // pagina actual =$pagina
           // $pagfin=$pagina+($maxpaginado/2);
           // echo "paginaini va=".$pagini;
            // echo "paginafin va=".$pagfin;
            // echo "resul=2ss".($pagina+(round($maxpaginado/2)));
             // echo "resul=ss".($pagina+( Math.round($maxpaginado/2)));

            if( $pagina >( round($maxpaginado/2))){
                if( $pagina+( round($maxpaginado/2))<= $paginas ){
                    $pagfin=$pagina+( round($maxpaginado/2));
                    $pagini=$pagfin-( round($maxpaginado-1));
                }else{
                    $pagfin=$paginas;
                    $pagini=$pagfin-( round($maxpaginado-1));
                }
            }else{
                if($maxpaginado<=$paginas){
                    $pagfin=$maxpaginado;
                    $pagini=1;
                }else{
                    $pagfin=$paginas;
                    $pagini=1;
                }
                //if()
               /* $pagfin1=$maxpaginado;
                $pagini1=$pagfin-($maxpaginado-1);
                if($pagini1>=1){
                    $pagfin=$pagfin1;
                    $pagini=$pagini1;
                }*/
            }
            // echo "paginaini va=".$pagini;
             //echo "paginafin va=".$pagfin;

            $paginatotalaux;

              if($pagina>1){
                 //$resultado=$resultado."<a href='listadoperfiles.php?num=".($pagina-1)."&fechaini=".$fechaini."&fechafin=".$fechafin."&cantidad=".$cantidad."'>Anterior</a> ";
                if($maxpaginado>$paginas){$paginatotalaux=$paginas;}else{$paginatotalaux=$maxpaginado;}

                $resultado=$resultado."insertarPrimera_ext('idPaginado',1,1,".$paginatotalaux.");";
                $resultado=$resultado."insertarAnterior_ext('idPaginado',".($pagina-1).",".$pagini.",".$pagfin.");";
            }


            for ($cont = $pagini; $cont <= $pagfin; $cont++) {// for ($cont = 1; $cont <= $paginas; $cont++) {
                 if($cont==$pagina ){
                       $resultado=$resultado."insertarActual_ext('idPaginado',".$cont.",".$pagini.",".$pagfin.");";
                 }
                  else{
                      $resultado=$resultado."insertarNumero_ext('idPaginado',".$cont.",".$pagini.",".$pagfin.");";
                  }
            }

            if($pagina<$paginas){
                  //$resultado=$resultado."<a href='listadoperfiles.php?num=".($pagina+1)."&fechaini=".$fechaini."&fechafin=".$fechafin."&cantidad=".$cantidad."'>Siguiente</a> ";
                  $resultado=$resultado."insertarSiguiente_ext('idPaginado',".($pagina+1).",".$pagini.",".$pagfin.");";
                   if($maxpaginado>$paginas){$paginatotalaux=$paginas;$pag=1;}else{$paginatotalaux=$paginas;$pag=($paginas-($maxpaginado-1));  }
                  $resultado=$resultado."insertarUltima_ext('idPaginado',".($paginas).",".$pag.",".$paginatotalaux.");";
            }

           // $resultado=$resultado."</div>";

       echo $resultado;

  }




   if (($_POST["tarea"] == "dpto") )
   {
       $resultado=0;
       $grupo=$_POST["nombredpto"];
       $idgrupo=$_POST["id"];
       $accion=$_POST["accion"];
       if($accion =="Nuevo"){
           $idgrupo=0;
       }

       $sql_grupo = "select * from activofijo.f_guardar_departamento(".$idgrupo.",'".$grupo."');";
       //  echo "select * from activofijo.f_guardar_grupo(".$idgrupo.",'".$grupo."');";
         $docres = pg_query($cn,$sql_grupo);
         $totalRows = pg_num_rows($docres);


         if($totalRows>0){
             if($accion =="Nuevo"){
                   $row_documentacion = pg_fetch_array ($docres);
                   $idd=$row_documentacion['f_guardar_departamento'];
                }else{

                   $idd =$idgrupo;
                }


             $resultado=$idd;
         }else{
             $resultado=0;
         }
        //   ego &= " seleccionarCombo('cboUbicacion','General'); "
         //$row_documentacion = pg_fetch_array ($docres);
        // $idderivacion3=$row_documentacion['iddocumentacion'];

        /* $sql_documentacion = "select * from monitoreo.documentacion where tipodocumento = 71 order by nombredocumentacion asc";
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
            echo $resultado;*/
       echo $resultado;
  }



  if (($_POST["tarea"] == "cargardpto") )
   {
       $resultado=" ";
      $id_=$_POST["id"];

       $sql_grupo = "select * from activofijo.departamento order by iddpto asc ;";
       //  echo "select * from activofijo.f_guardar_grupo(".$idgrupo.",'".$grupo."');";
         $docres = pg_query($cn,$sql_grupo);
         $totalRows = pg_num_rows($docres);

          $resultado =$resultado."addItemCombo('cbodpto','Elegir..',0); ";

        while ($row_documentacion = pg_fetch_assoc($docres)){
                 $resultado =$resultado."addItemCombo('cbodpto','".$row_documentacion['nombredpto']."',".$row_documentacion['iddpto']."); ";
            }

           $resultado =$resultado." seleccionarComboId('cbodpto',".$id_."); ";
       echo $resultado;

  }



 //----- guardar individual ----//
    if (($_POST["tarea"] == "guardarAsignacionActivo") ){
       $resultado=0;
       $fecha=$_POST["txtfecha_"];
       $idpersonal=$_POST["idpersonal_"];
       $iddpto=$_POST["iddpto_"];
       $idregional=$_POST["idregional_"];
       $ids=$_POST["ids"];
       $descripcion=$_POST["descripcion"];
       $idarea=$_POST["idarea"];

       $accion=$_POST["acciongral"];
       // echo "resss1=".$descripcion;
       $descripcion= str_replace("|", chr(10),  $descripcion);

        $listaids =explode("|", $ids);

       /*echo "id=".$ids;
       $listaids =explode("|", $ids);
       echo "listaid=".$listaids;
       echo "1=".$listaids[0];
       echo "2=".$listaids[1];
       echo "long=".(strlen($listaids[3]));
       echo "count=".count($listaids);*/

       //---------GUARDAR CABECERAA--------//
       $sql_grupo = "select * from activofijo.f_guardar_asignacion(".$accion
               .",'','".$fecha."',".$idpersonal.",".$iddpto.",".$idregional.",".$idarea.",'".$descripcion."');";
       $idd=0;
      //   ECHO "coninsert=".$sql_grupo;
         $docres = pg_query($cn,$sql_grupo);
          $totalRows_ = pg_num_rows($docres);
         // echo "total=".$totalRows_;
          if($totalRows_>0){
             // echo "entroo";
             if($accion =="0"){
                   $row_documentacion = pg_fetch_array ($docres);
                   $idd=$row_documentacion['f_guardar_asignacion'];
                }else{
                   $idd =$accion;
                }
             $resultado=$idd;
         }else{
             $resultado=0;
         }

        // echo "idd=".$idd;
       if($idd>0){
          // $aa=count($listaids);
          // echo "cant=".$aa;
          //  echo " elem0=". $listaids[0] ;
           // echo " elem1=". $listaids[1] ;
              $sqld_ = "select * from activofijo.f_eliminar_detalleasignacion(".$idd.");";
              $docresd = pg_query($cn,$sqld_);

            for ($index1 = 0; $index1 <= count($listaids); $index1++) {
               if(strlen($listaids[$index1])>0){
                     $sql_ = "select * from activofijo.f_guardar_detalleasignacion("."0"
                    .",".$idd.",".$listaids[$index1].",'".$fecha."',1);";

                    // echo "detalle=".$sql_;
                   $docres = pg_query($cn,$sql_);
               }
            }
       }
      // echo "resss2=".$descripcion;
      //  Dim aString As String = Replace(obs, Chr(10), "!")
     /*  $sql_grupo = "select * from activofijo.f_guardar_registro_activo_uno(".$accion
               .",'".$codigom."',".$idnombre.",".$idgrupo.",".$idsubgrupo.",".$idestado.",".$idobs
               .",'".$descripcion."');";
          //  echo "accion=".$accion;
          $docres = pg_query($cn,$sql_grupo);
          $totalRows_ = pg_num_rows($docres);
         // echo "total=".$totalRows_;
          if($totalRows_>0){
             // echo "entroo";
             if($accion =="0"){
                   $row_documentacion = pg_fetch_array ($docres);
                   $idd=$row_documentacion['f_guardar_registro_activo_uno'];
                }else{
                   $idd =$accion;
                }
             $resultado=$idd;
         }else{
             $resultado=0;
         }*/
         echo $resultado;

    }

   /// --   FIN GUARDAR INDIVIDUAL ---




    if (($_POST["tarea"] == "cargarListadoAsignacion") )
   {
       $resultado=" ";
       $filtro=$_POST["filtro"];
       $paginaactual=$_POST["paginaactual"];
       $pagini=$_POST["paginaini"];
       $pagfin=$_POST["paginafin"];


       $sql_grupo = " select a.*,coalesce(p.nombre1, '') || ' ' || coalesce(p.nombre2, '') || ' ' || coalesce(p.apellidopat, '') || ' ' || coalesce(p.apellidomat,'' , '')    AS nombre_nompleto
      ,d.nombredpto,r.nombreregional ,count(dd.iddetalleasignacion)as cantidad from activofijo.asignacion a join funcionario f on f.idfuncionario=a.idfuncionario join persona p on p.idpersona=f.idpersona
       join activofijo.departamento d on d.iddpto = a.iddpto join activofijo.regionales r on r.idregional=a.idregional join activofijo.detalleasignacion dd on dd.idasignacion=a.idasignacion
       where a.estado=1 ".$filtro." GROUP BY a.idasignacion,a.codigoasignacion,a.fechaasignacion,a.idfuncionario,a.iddpto,a.caracteristicas,a.estado,nombre_nompleto ,d.nombredpto,r.nombreregional
        order by a.idasignacion asc; ";


        //echo "con fultro=".$sql_grupo;
       $docres = pg_query($cn,$sql_grupo);
       $num_registro = pg_num_rows($docres);



          $registros=15;
          $nropagina=$paginaactual;//$_GET["num"];
	  if(isset($nropagina)){//$_GET["num"]
		$pagina=$nropagina;//$_GET["num"]
	  }else{
		$pagina="1";
	  }

        if(is_numeric($pagina))
            $inicio=(($pagina-1)*$registros);
        else
            $inicio=0;
        $paginas=  ceil($num_registro/$registros);



         $sql_grupo = " select a.*,coalesce(p.nombre1, '') || ' ' || coalesce(p.nombre2, '') || ' ' || coalesce(p.apellidopat, '') || ' ' || coalesce(p.apellidomat,'' , '')    AS nombre_nompleto
       ,d.nombredpto,r.nombreregional,ar.nombrearea,count(dd.iddetalleasignacion)as cantidad from activofijo.asignacion a join funcionario f on f.idfuncionario=a.idfuncionario join persona p on p.idpersona=f.idpersona
       join activofijo.departamento d on d.iddpto = a.iddpto join activofijo.regionales r on r.idregional=a.idregional
       join activofijo.detalleasignacion dd on dd.idasignacion=a.idasignacion
       join activofijo.area ar on ar.idarea=a.idarea
        where a.estado=1 ".$filtro."
         GROUP BY a.idasignacion,a.codigoasignacion,a.fechaasignacion,a.idfuncionario,a.iddpto,a.caracteristicas,a.estado,nombre_nompleto,d.nombredpto,r.nombreregional,ar.nombrearea
          order by  a.idasignacion desc  limit $registros  offset $inicio ;";
          //echo "con=".$sql_grupo;
        $docres = pg_query($cn,$sql_grupo);
        $num_registro = pg_num_rows($docres);
        $indicef=0;
        $sw="true";
        while ($row_act = pg_fetch_assoc($docres)){
             $descripcion1=$row_act['nombrearea'];
             // $descripcion1= str_replace( chr(10)," ",  $descripcion1);
            $indicef =$indicef+1;  //indice,idIngreso, coducab,                     fecha, nombrepersonal_,  depto_, regional_,obs)
             $resultado  =$resultado." cargarFilaAsignacion(".$indicef.",".$row_act['idasignacion'].",'".$row_act['codigoasignacion']."','".$row_act['fechaasignacion']."','".$row_act['nombre_nompleto']."','".$row_act['nombredpto']."','".$row_act['nombreregional']."','".$descripcion1."',".$row_act['cantidad'].",'".$sw."');  "   ;
             if($sw=="true"){$sw="false";}else{$sw="true";}
        }
     //   echo $resultado;
     // echo "pagina=".$pagina." - pagniass=".$paginas ;
        $resultado=$resultado."document.getElementById('idPaginado').innerHTML='';";
        // $resultado=$resultado." tr = document.createElement('div'); tr.innerHTML = ' 1 ';  document.getElementById('idPaginado').appendChild(tr); ";
            $maxpaginado=10;

            if($paginas<$maxpaginado){
                 $maxpaginado=$paginas;
            }

            if($pagini==0){
                $pagini=1;
            }
            if($pagfin==0){
                $pagfin=$maxpaginado;
            }



              // cantidad de paginas total= $paginas
            // pagina actual =$pagina
           // $pagfin=$pagina+($maxpaginado/2);
           // echo "paginaini va=".$pagini;
            // echo "paginafin va=".$pagfin;
            // echo "resul=2ss".($pagina+(round($maxpaginado/2)));
             // echo "resul=ss".($pagina+( Math.round($maxpaginado/2)));

            if( $pagina >( round($maxpaginado/2))){
                if( $pagina+( round($maxpaginado/2))<= $paginas ){
                    $pagfin=$pagina+( round($maxpaginado/2));
                    $pagini=$pagfin-( round($maxpaginado-1));
                }else{
                    $pagfin=$paginas;
                    $pagini=$pagfin-( round($maxpaginado-1));
                }
            }else{
                if($maxpaginado<=$paginas){
                    $pagfin=$maxpaginado;
                    $pagini=1;
                }else{
                    $pagfin=$paginas;
                    $pagini=1;
                }

            }
            // echo "paginaini va=".$pagini;
             //echo "paginafin va=".$pagfin;

            $paginatotalaux;

              if($pagina>1){
                 //$resultado=$resultado."<a href='listadoperfiles.php?num=".($pagina-1)."&fechaini=".$fechaini."&fechafin=".$fechafin."&cantidad=".$cantidad."'>Anterior</a> ";
                if($maxpaginado>$paginas){$paginatotalaux=$paginas;}else{$paginatotalaux=$maxpaginado;}

                $resultado=$resultado."insertarPrimeraAS('idPaginado',1,1,".$paginatotalaux.",".$pagini.",".$pagfin.");";
                $resultado=$resultado."insertarAnteriorAS('idPaginado',".($pagina-1).",".$pagini.",".$pagfin.");";
            }


            for ($cont = $pagini; $cont <= $pagfin; $cont++) {// for ($cont = 1; $cont <= $paginas; $cont++) {
                 if($cont==$pagina ){
                       $resultado=$resultado."insertarActualAS('idPaginado',".$cont.",".$pagini.",".$pagfin.");";
                 }
                else{
                      $resultado=$resultado."insertarNumeroAS('idPaginado',".$cont.",".$pagini.",".$pagfin.");";
                  }
            }

            if($pagina<$paginas){
                  //$resultado=$resultado."<a href='listadoperfiles.php?num=".($pagina+1)."&fechaini=".$fechaini."&fechafin=".$fechafin."&cantidad=".$cantidad."'>Siguiente</a> ";
                  $resultado=$resultado."insertarSiguienteAS('idPaginado',".($pagina+1).",".$pagini.",".$pagfin.");";
                   if($maxpaginado>$paginas){$paginatotalaux=$paginas;$pag=1;}else{$paginatotalaux=$paginas;$pag=($paginas-($maxpaginado-1));  }
                  $resultado=$resultado."insertarUltimaAS('idPaginado',".($paginas).",".$pag.",".$paginatotalaux.");";
            }

           // $resultado=$resultado."</div>";

       echo $resultado;

  }





    if (($_POST["tarea"] == "cargarcombosListadoAsignacion") )
   {
       $resultado=" ";

       $sql_grupo = "select * from activofijo.departamento order by iddpto asc ;";
         $docres = pg_query($cn,$sql_grupo);

         $sql_area = "select * from activofijo.area order by idarea asc ;";
         $docrea = pg_query($cn,$sql_area);

        // $totalRows = pg_num_rows($docres);

          $sql_subgrupo = "select * from activofijo.regionales order by iddpto asc ;";
         $docressub = pg_query($cn,$sql_subgrupo);

        $sql_obs = " select f.idfuncionario,  coalesce(p.nombre1, '') || ' ' || coalesce(p.nombre2, '') || ' ' || coalesce(p.apellidopat, '') || ' ' || coalesce(p.apellidomat,'' , '')    AS nombre_nompleto
 	from funcionario f join persona p on p.idpersona=f.idpersona where f.estadofun='A'  and (financiamiento='UCAB' or financiamiento='VDRA') order by p.nombre1 asc; ;";
        $docresobs = pg_query($cn,$sql_obs);

        $resultado =$resultado."addItemCombo('buscarpersonal','Elegir..',0); ";
        $resultado =$resultado."addItemCombo('buscardpto','Elegir..',0); ";
        $resultado =$resultado."addItemCombo('buscarregional','Elegir..',0); ";
        $resultado =$resultado."addItemCombo('buscararea','Elegir..',0); ";


         while ($row_area = pg_fetch_assoc($docrea)){
                 $resultado =$resultado."addItemCombo('buscararea','".$row_area['nombrearea']."',".$row_area['idarea']."); ";
            }

        while ($row_documentacion = pg_fetch_assoc($docres)){
                 $resultado =$resultado."addItemCombo('buscardpto','".$row_documentacion['nombredpto']."',".$row_documentacion['iddpto']."); ";
            }

       while ($row_sub= pg_fetch_assoc($docressub)){
             $resultado =$resultado."addItemCombo('buscarregional','".$row_sub['nombreregional']."',".$row_sub['idregional']."); ";
        }

         while ($row_obs = pg_fetch_assoc($docresobs)){
             $resultado =$resultado."addItemCombo('buscarpersonal','".$row_obs['nombre_nompleto']."',".$row_obs['idfuncionario']."); ";
        }



       echo $resultado;

  }



if (($_POST["tarea"] == "cargarEditarAsignacion") )
   {
       $resultado=" ";
      $id_=$_POST["id"];

       $sql_grupo = "select * from activofijo.asignacion  where idasignacion=".$id_.";";
        //  echo "con=".$sql_grupo;
         $docres = pg_query($cn,$sql_grupo);
         $totalRows = pg_num_rows($docres);
         if($totalRows>0){
             $row_documentacion = pg_fetch_assoc($docres);

             $resultado =$resultado." document.getElementById('txtcoducab').value='".$row_documentacion['codigoasignacion']."';";
             $resultado =$resultado." document.getElementById('txtfecha').value='".$row_documentacion['fechaasignacion']."';";

             $resultado =$resultado."seleccionarComboId('cboPersonal',".$row_documentacion['idfuncionario'].");";
             $resultado =$resultado."seleccionarComboId('cbodpto',".$row_documentacion['iddpto'].");";
             $resultado =$resultado."seleccionarComboId('cboarea',".$row_documentacion['idarea'].");";

           //  $resultado =$resultado."seleccionarComboId('cboregional',".$row_documentacion['idregional'].");";
             $resultado =$resultado."cargarcomboregional(".$row_documentacion['idregional'].",".$row_documentacion['iddpto']."); ";

             $descripcion=$row_documentacion['caracteristicas'];
              $descripcion= str_replace( chr(10),"|",  $descripcion);

               $resultado =$resultado."cargarCaracteristicas2('".$descripcion."');";


             //$row_documentacion['caracteristicas'];

         }
         //--- cargar detalle----
         $sql_det = "select d.*,n.nombreactivo,a.codigoucab,a.codigomdryt from  activofijo.detalleasignacion d join  activofijo.activofijo a on a.idactivo=d.idactivo
           join activofijo.nombreactivo n on n.idnombreactivo=a.idnombreactivo  where d.estado=1 and d.idasignacion=".$id_.";";
          $docdet = pg_query($cn,$sql_det);
         //$totalRows = pg_num_rows($docdet);
        // echo "aaaa=".$sql_det;
        while ($rowdet = pg_fetch_assoc($docdet)){
            if($rowdet['estadoasignado']==1){
                $estadoasgi="Asignado";
            }else{
                $estadoasgi="Devuelto";
            }

             $resultado =$resultado."cargarfilaDetalleEditar('".tableActivo."','".$rowdet['codigoucab']."','".$rowdet['codigomdryt']."','".$rowdet['nombreactivo']."',".$rowdet['idactivo'].",'".$estadoasgi."'); ";
             //echo "entro ";
        }
         //echo "bb=".$resultado;

         //  $resultado =$resultado."
       echo $resultado;

  }


/*if (($_POST["tarea"] == "cargardpto") )
   {
       $resultado=" ";
      $id_=$_POST["id"];

       $sql_grupo = "select * from activofijo.departamento order by iddpto asc ;";
       //  echo "select * from activofijo.f_guardar_grupo(".$idgrupo.",'".$grupo."');";
         $docres = pg_query($cn,$sql_grupo);
         $totalRows = pg_num_rows($docres);

          $resultado =$resultado."addItemCombo('cbodpto','Elegir..',0); ";

        while ($row_documentacion = pg_fetch_assoc($docres)){
                 $resultado =$resultado."addItemCombo('cbodpto','".$row_documentacion['nombredpto']."',".$row_documentacion['iddpto']."); ";
            }

           $resultado =$resultado." seleccionarComboId('cbodpto',".$id_."); ";
       echo $resultado;

  }*/



  ///--------HISTORIAL------//
     if (($_POST["tarea"] == "cargarcombosHistorialTodos") )
   {
       $resultado=" ";

       $sql_grupo = "select * from activofijo.grupo order by nombregrupo asc ;";
         $docres = pg_query($cn,$sql_grupo);
        // $totalRows = pg_num_rows($docres);

          $sql_subgrupo = "select * from activofijo.subgrupo order by nombresubgrupo asc ;";
         $docressub = pg_query($cn,$sql_subgrupo);


        $sql_estado = "select * from activofijo.estado order by idestado asc ;";
        $docresestado= pg_query($cn,$sql_estado);


        $sql_dpto = "select * from activofijo.departamento order by iddpto asc ;";
        $docdpto = pg_query($cn,$sql_dpto);
        // $totalRows = pg_num_rows($docres);

        $sql_reg = "select * from activofijo.regionales order by iddpto asc ;";
        $docreg= pg_query($cn,$sql_reg);

        $sql_per = " select f.idfuncionario,  coalesce(p.nombre1, '') || ' ' || coalesce(p.nombre2, '') || ' ' || coalesce(p.apellidopat, '') || ' ' || coalesce(p.apellidomat,'' , '')    AS nombre_nompleto
 	from funcionario f join persona p on p.idpersona=f.idpersona where f.estadofun='A'  and (financiamiento='UCAB' or financiamiento='VDRA') order by p.nombre1 asc; ;";
        $docper = pg_query($cn,$sql_per);

        $resultado =$resultado."addItemCombo('buscargrupo','Elegir..',0); ";
        $resultado =$resultado."addItemCombo('buscarsubgrupo','Elegir..',0); ";

        $resultado =$resultado."addItemCombo('buscarpersonal','Elegir..',0); ";
        $resultado =$resultado."addItemCombo('buscares','Elegir..',0); ";
        $resultado =$resultado."addItemCombo('buscarasig','Elegir..',-1); ";

        $resultado =$resultado."addItemCombo('buscardpto','Elegir..',-1); ";
        $resultado =$resultado."addItemCombo('buscarregional','Elegir..',-1); ";




        while ($row_documentacion = pg_fetch_assoc($docres)){
                 $resultado =$resultado."addItemCombo('buscargrupo','".$row_documentacion['nombregrupo']." (".$row_documentacion['codigo'].")',".$row_documentacion['idgrupo']."); ";
            }

        while ($row_sub= pg_fetch_assoc($docressub)){
             $resultado =$resultado."addItemCombo('buscarsubgrupo','".$row_sub['nombresubgrupo']." (".$row_sub['codigo'].")',".$row_sub['idsubgrupo']."); ";
        }


         while ($row_estado = pg_fetch_assoc($docresestado)){
             $resultado =$resultado."addItemCombo('buscares','".$row_estado['nombreestado']."',".$row_estado['idestado']."); ";
        }

        while ($row_dpto = pg_fetch_assoc($docdpto)){
               $resultado =$resultado."addItemCombo('buscardpto','".$row_dpto['nombredpto']."',".$row_dpto['iddpto']."); ";
          }

        while ($row_reg= pg_fetch_assoc($docreg)){
              $resultado =$resultado."addItemCombo('buscarregional','".$row_reg['nombreregional']."',".$row_reg['idregional']."); ";
         }

          while ($row_per = pg_fetch_assoc($docper)){
              $resultado =$resultado."addItemCombo('buscarpersonal','".$row_per['nombre_nompleto']."',".$row_per['idfuncionario']."); ";
         }




        $resultado =$resultado."addItemCombo('buscarasig','Asignado',1); ";
        $resultado =$resultado."addItemCombo('buscarasig','Devuelto',0); ";

       echo $resultado;

  }



      if (($_POST["tarea"] == "cargarListadoHistorial") )
   {
       $resultado=" ";
       $filtro=$_POST["filtro"];
       $filtro2=$_POST["filtro2"];
       $paginaactual=$_POST["paginaactual"];
       $pagini=$_POST["paginaini"];
       $pagfin=$_POST["paginafin"];
       //echo " filtro 1=".$filtro." -fin";
       //echo " filtro 2=".$filtro2." -fin";

       $sql_grupo = " select a.*,coalesce(p.nombre1, '') || ' ' || coalesce(p.nombre2, '') || ' ' || coalesce(p.apellidopat, '') || ' ' || coalesce(p.apellidomat,'' , '')    AS nombre_completo
      ,d.nombredpto,r.nombreregional ,ac.*,na.nombreactivo  ,dd.estadoasignado,g.nombregrupo,sg.nombresubgrupo,e.nombreestado
      from activofijo.asignacion a join funcionario f on f.idfuncionario=a.idfuncionario join persona p on p.idpersona=f.idpersona
       join activofijo.departamento d on d.iddpto = a.iddpto join activofijo.regionales r on r.idregional=a.idregional join activofijo.detalleasignacion dd on dd.idasignacion=a.idasignacion
       join activofijo.activofijo ac on ac.idactivo=dd.idactivo
       join activofijo.nombreactivo na on na.idnombreactivo=ac.idnombreactivo
       join activofijo.grupo g on ac.idgrupo=g.idgrupo
       join activofijo.subgrupo sg on sg.idsubgrupo=ac.idsubgrupo
       join activofijo.estado e on e.idestado=ac.idestado
       where a.estado=1 and ac.estado=1 and dd.estado=1  ".$filtro.
       "union select a.iddevolucion as idasignacion,a.codigodevolucion as codigoasignacion,a.fechadevolucion as fechaasignacion,a.idfuncionario,0 as iddpto,0 as idregional,0 as idarea,a.caracteristicas,a.contador,a.estado
        , coalesce(p.nombre1, '') || ' ' || coalesce(p.nombre2, '') || ' ' || coalesce(p.apellidopat, '') || ' ' || coalesce(p.apellidomat,'' , '')    AS nombre_nompleto
       ,'' as nombredpto ,'' as nombreregional,ac.* ,na.nombreactivo, 1 as estadoasignado,g.nombregrupo,sg.nombresubgrupo,e.nombreestado
        from activofijo.devolucion a join funcionario f on f.idfuncionario=a.idfuncionario join persona p on p.idpersona=f.idpersona
       join activofijo.detalledevolucion dd on dd.iddevolucion=a.iddevolucion
        join activofijo.activofijo ac on ac.idactivo=dd.idactivo
       join activofijo.nombreactivo na on na.idnombreactivo=ac.idnombreactivo
       join activofijo.grupo g on ac.idgrupo=g.idgrupo
       join activofijo.subgrupo sg on sg.idsubgrupo=ac.idsubgrupo
       join activofijo.estado e on e.idestado=ac.idestado
       where a.estado=1   ".$filtro2."  order by fechaasignacion desc, idasignacion desc ";



       $docres = pg_query($cn,$sql_grupo);
      $num_registro = pg_num_rows($docres);




          $registros=15;
          $nropagina=$paginaactual;//$_GET["num"];
	  if(isset($nropagina)){//$_GET["num"]
		$pagina=$nropagina;//$_GET["num"]
	  }else{
		$pagina="1";
	  }

        if(is_numeric($pagina))
            $inicio=(($pagina-1)*$registros);
        else
            $inicio=0;
        $paginas=  ceil($num_registro/$registros);



         $sql_grupo = " select a.*,coalesce(p.nombre1, '') || ' ' || coalesce(p.nombre2, '') || ' ' || coalesce(p.apellidopat, '') || ' ' || coalesce(p.apellidomat,'' , '')    AS nombre_completo
      ,d.nombredpto,r.nombreregional ,ac.*,na.nombreactivo  ,dd.estadoasignado,g.nombregrupo,sg.nombresubgrupo,e.nombreestado
      from activofijo.asignacion a join funcionario f on f.idfuncionario=a.idfuncionario join persona p on p.idpersona=f.idpersona
       join activofijo.departamento d on d.iddpto = a.iddpto join activofijo.regionales r on r.idregional=a.idregional join activofijo.detalleasignacion dd on dd.idasignacion=a.idasignacion
       join activofijo.activofijo ac on ac.idactivo=dd.idactivo
       join activofijo.nombreactivo na on na.idnombreactivo=ac.idnombreactivo
       join activofijo.grupo g on ac.idgrupo=g.idgrupo
       join activofijo.subgrupo sg on sg.idsubgrupo=ac.idsubgrupo
       join activofijo.estado e on e.idestado=ac.idestado
       where a.estado=1 and ac.estado=1 and dd.estado=1  ".$filtro.//order by  a.fechaasignacion desc  limit $registros  offset $inicio ;";
       " union select a.iddevolucion as idasignacion,a.codigodevolucion as codigoasignacion,a.fechadevolucion as fechaasignacion,a.idfuncionario,0 as iddpto,0 as idregional,0 as idarea,a.caracteristicas,a.contador,a.estado
        , coalesce(p.nombre1, '') || ' ' || coalesce(p.nombre2, '') || ' ' || coalesce(p.apellidopat, '') || ' ' || coalesce(p.apellidomat,'' , '')    AS nombre_nompleto
       ,'' as nombredpto ,'' as nombreregional,ac.* ,na.nombreactivo, 0 as estadoasignado,g.nombregrupo,sg.nombresubgrupo,e.nombreestado
        from activofijo.devolucion a join funcionario f on f.idfuncionario=a.idfuncionario join persona p on p.idpersona=f.idpersona
       join activofijo.detalledevolucion dd on dd.iddevolucion=a.iddevolucion
        join activofijo.activofijo ac on ac.idactivo=dd.idactivo
       join activofijo.nombreactivo na on na.idnombreactivo=ac.idnombreactivo
       join activofijo.grupo g on ac.idgrupo=g.idgrupo
       join activofijo.subgrupo sg on sg.idsubgrupo=ac.idsubgrupo
       join activofijo.estado e on e.idestado=ac.idestado
       where a.estado=1    ".$filtro2."  order by  fechaasignacion desc, idasignacion desc  limit $registros  offset $inicio "." ;";


  // echo "con=".$sql_grupo;
        $docres = pg_query($cn,$sql_grupo);
        $num_registro = pg_num_rows($docres);
        $indicef=0;
        $sw=true;
        while ($row_act = pg_fetch_assoc($docres)){

            $indicef =$indicef+1;
                    //   14   function cargarFilaHistorial
             $resultado  =$resultado." cargarFilaHistorial('".$row_act['codigoasignacion']."',".$indicef.",".$row_act['idactivo'].",'".$row_act['codigoucab']."','".$row_act['codigomdryt']."','".$row_act['fechaasignacion']."','".$row_act['nombreactivo']."','".$row_act['nombregrupo']."','".$row_act['nombresubgrupo']."','".$row_act['nombreestado']."','".$row_act['nombre_completo']."','".$row_act['nombredpto']."','".$row_act['nombreregional']."',".$row_act['estadoasignado'].",'".$sw."');  "   ;
              if($sw){$sw=false;}else{$sw=true;}
        }
     //   echo $resultado;
     // echo "pagina=".$pagina." - pagniass=".$paginas ;
        $resultado=$resultado."document.getElementById('idPaginado').innerHTML='';";
        // $resultado=$resultado." tr = document.createElement('div'); tr.innerHTML = ' 1 ';  document.getElementById('idPaginado').appendChild(tr); ";
            $maxpaginado=10;

            if($paginas<$maxpaginado){
                 $maxpaginado=$paginas;
            }

            if($pagini==0){
                $pagini=1;
            }
            if($pagfin==0){
                $pagfin=$maxpaginado;
            }



              // cantidad de paginas total= $paginas
            // pagina actual =$pagina
           // $pagfin=$pagina+($maxpaginado/2);
           // echo "paginaini va=".$pagini;
            // echo "paginafin va=".$pagfin;
            // echo "resul=2ss".($pagina+(round($maxpaginado/2)));
             // echo "resul=ss".($pagina+( Math.round($maxpaginado/2)));

            if( $pagina >( round($maxpaginado/2))){
                if( $pagina+( round($maxpaginado/2))<= $paginas ){
                    $pagfin=$pagina+( round($maxpaginado/2));
                    $pagini=$pagfin-( round($maxpaginado-1));
                }else{
                    $pagfin=$paginas;
                    $pagini=$pagfin-( round($maxpaginado-1));
                }
            }else{
                if($maxpaginado<=$paginas){
                    $pagfin=$maxpaginado;
                    $pagini=1;
                }else{
                    $pagfin=$paginas;
                    $pagini=1;
                }
                //if()
               /* $pagfin1=$maxpaginado;
                $pagini1=$pagfin-($maxpaginado-1);
                if($pagini1>=1){
                    $pagfin=$pagfin1;
                    $pagini=$pagini1;
                }*/
            }
            // echo "paginaini va=".$pagini;
             //echo "paginafin va=".$pagfin;

            $paginatotalaux;

              if($pagina>1){
                 //$resultado=$resultado."<a href='listadoperfiles.php?num=".($pagina-1)."&fechaini=".$fechaini."&fechafin=".$fechafin."&cantidad=".$cantidad."'>Anterior</a> ";
                if($maxpaginado>$paginas){$paginatotalaux=$paginas;}else{$paginatotalaux=$maxpaginado;}

                $resultado=$resultado."insertarPrimera('idPaginado',1,1,".$paginatotalaux.");";
                $resultado=$resultado."insertarAnterior('idPaginado',".($pagina-1).",".$pagini.",".$pagfin.");";
            }


            for ($cont = $pagini; $cont <= $pagfin; $cont++) {// for ($cont = 1; $cont <= $paginas; $cont++) {
                 if($cont==$pagina ){
                       $resultado=$resultado."insertarActual('idPaginado',".$cont.",".$pagini.",".$pagfin.");";
                 }
                  else{
                      $resultado=$resultado."insertarNumero('idPaginado',".$cont.",".$pagini.",".$pagfin.");";
                  }
            }

            if($pagina<$paginas){
                  //$resultado=$resultado."<a href='listadoperfiles.php?num=".($pagina+1)."&fechaini=".$fechaini."&fechafin=".$fechafin."&cantidad=".$cantidad."'>Siguiente</a> ";
                  $resultado=$resultado."insertarSiguiente('idPaginado',".($pagina+1).",".$pagini.",".$pagfin.");";
                   if($maxpaginado>$paginas){$paginatotalaux=$paginas;$pag=1;}else{$paginatotalaux=$paginas;$pag=($paginas-($maxpaginado-1));  }
                  $resultado=$resultado."insertarUltima('idPaginado',".($paginas).",".$pag.",".$paginatotalaux.");";
            }

           // $resultado=$resultado."</div>";

       echo $resultado;

  }

//---- -devolucion ----
    if (($_POST["tarea"] == "cargarcombosDevo") )
   {
       $resultado=" ";

           $sql_subgrupo = " select f.idfuncionario,  coalesce(p.nombre1, '') || ' ' || coalesce(p.nombre2, '') || ' ' || coalesce(p.apellidopat, '') || ' ' || coalesce(p.apellidomat,'' , '')    AS nombre_nompleto
	from funcionario f join persona p on p.idpersona=f.idpersona where f.estadofun='A'  and (financiamiento='UCAB' or financiamiento='VDRA') order by p.nombre1 asc ;";
          $docressub = pg_query($cn,$sql_subgrupo);

            $resultado =$resultado."addItemCombo('cboPersonal','Elegir..',0); ";

         while ($row_sub= pg_fetch_assoc($docressub)){
             $resultado =$resultado."addItemCombo('cboPersonal','".$row_sub['nombre_nompleto']."',".$row_sub['idfuncionario']."); ";
         }




       echo $resultado;

  }


     if (($_POST["tarea"] == "cargarcombosListadoTodosD") )
   {
       $resultado=" ";

       $sql_grupo = "select * from activofijo.grupo order by nombregrupo asc ;";
         $docres = pg_query($cn,$sql_grupo);
        // $totalRows = pg_num_rows($docres);

          $sql_subgrupo = "select * from activofijo.subgrupo order by nombresubgrupo asc ;";
         $docressub = pg_query($cn,$sql_subgrupo);

          $sql_obs = "select * from activofijo.observacion order by idobservacion asc ;";
         $docresobs = pg_query($cn,$sql_obs);





          $resultado =$resultado."addItemCombo('buscargrupo','Elegir..',0); ";
           $resultado =$resultado."addItemCombo('buscarsubgrupo','Elegir..',0); ";

           $resultado =$resultado."addItemCombo('buscarobs','Elegir..',0); ";



        while ($row_documentacion = pg_fetch_assoc($docres)){
                 $resultado =$resultado."addItemCombo('buscargrupo','".$row_documentacion['nombregrupo']." (".$row_documentacion['codigo'].")',".$row_documentacion['idgrupo']."); ";
            }

        while ($row_sub= pg_fetch_assoc($docressub)){
             $resultado =$resultado."addItemCombo('buscarsubgrupo','".$row_sub['nombresubgrupo']." (".$row_sub['codigo'].")',".$row_sub['idsubgrupo']."); ";
        }

        while ($row_obs = pg_fetch_assoc($docresobs)){
             $resultado =$resultado."addItemCombo('buscarobs','".$row_obs['nombreobservacion']."',".$row_obs['idobservacion']."); ";
        }



       echo $resultado;

  }
    if (($_POST["tarea"] == "cargarListadoActivoD_ext") )
   {
       $resultado=" ";
       $filtro=$_POST["filtro"];
       $paginaactual=$_POST["paginaactual"];
       $pagini=$_POST["paginaini"];
       $pagfin=$_POST["paginafin"];
       $idp=$_POST["idp"];


       $sql_grupo = " select a.*,na.nombreactivo,g.nombregrupo,sg.nombresubgrupo,ob.nombreobservacion,e.nombreestado,dd.iddetalleasignacion from activofijo.activofijo a join activofijo.grupo g on a.idgrupo=g.idgrupo
	join activofijo.subgrupo sg on sg.idsubgrupo=a.idsubgrupo
	join activofijo.observacion ob on ob.idobservacion=a.idobservacion
	join activofijo.estado e on e.idestado=a.idestado
	join activofijo.nombreactivo na on na.idnombreactivo=a.idnombreactivo
        join activofijo.detalleasignacion dd on dd.idactivo=a.idactivo
	join activofijo.asignacion asi on asi.idasignacion=dd.idasignacion
        where a.estado=1 and dd.estadoasignado=1    ".$filtro." ;";

        //  echo "con fultro=".$sql_grupo;
       $docres = pg_query($cn,$sql_grupo);
      $num_registro = pg_num_rows($docres);




          $registros=15;
          $nropagina=$paginaactual;//$_GET["num"];
	  if(isset($nropagina)){//$_GET["num"]
		$pagina=$nropagina;//$_GET["num"]
	  }else{
		$pagina="1";
	  }

        if(is_numeric($pagina))
            $inicio=(($pagina-1)*$registros);
        else
            $inicio=0;
        $paginas=  ceil($num_registro/$registros);



         $sql_grupo = " select a.*,na.nombreactivo,g.nombregrupo,sg.nombresubgrupo,ob.nombreobservacion,e.nombreestado,dd.iddetalleasignacion from activofijo.activofijo a join activofijo.grupo g on a.idgrupo=g.idgrupo
	join activofijo.subgrupo sg on sg.idsubgrupo=a.idsubgrupo
	join activofijo.observacion ob on ob.idobservacion=a.idobservacion
	join activofijo.estado e on e.idestado=a.idestado
	join activofijo.nombreactivo na on na.idnombreactivo=a.idnombreactivo
        join activofijo.detalleasignacion dd on dd.idactivo=a.idactivo
	join activofijo.asignacion asi on asi.idasignacion=dd.idasignacion
        where a.estado=1 and dd.estadoasignado=1     ".$filtro." order by  a.idactivo desc  limit $registros  offset $inicio ;";
        // echo "con=".$sql_grupo;
        $docres = pg_query($cn,$sql_grupo);
        $num_registro = pg_num_rows($docres);
        $indicef=0;
           $indicef=0;
        $sw1="true";
           $textoLimpio="";
        while ($row_act = pg_fetch_assoc($docres)){
            $texto=$row_act['caracteristicas'];
            $find = array('/[^a-z0-9\-&lt;&gt;]/', '/[\-]+/', '/&lt;{^&gt;*&gt;/');

            $repl = array('', '-');

          //  $textoLimpio = $texto;
         //$textoLimpio = preg_replace('([^A-Za-z0-9_-ñÑ])', '', $texto);
            //$textoLimpio = preg_replace('([^ A-Za-z0-9_-ñÑ])' , '', $texto);
            //$textoLimpio =  str_replace("\r\n\t\0\r", "", $texto);
           //  $resultado  =$resultado." alert('$texto');";
           // $resultado  =$resultado." alert('$textoLimpio');";

           //  $textoLimpio = preg_replace($find, $repl, $texto);
          $cant=strlen($texto);
          //echo "cc=".strlen("abcd");
           // echo "cant=".$cant."in".$texto."f";
            for($i=0;$i<$cant;$i++){
              //  $resultado  =$resultado."alert('ini=".$i."');";
              // $resultado  =$resultado." alert('a=".ord($texto[$i])."');";
              // $resultado  =  $resultado."alert('".$texto[$i]."_".ord($texto[$i])."');";
               // if($cant>= $cant-2){
               // echo "".$texto[$i]."_".ord($texto[$i])."-";
              //  }
                if(ord($texto[$i])==10 or ord($texto[$i])==13){
                    //echo"espacio";
                }else{
                    $textoLimpio=$textoLimpio.$texto[$i];
                }
                //$textoLimpio=$textoLimpio.$texto[$i];
            }
           // echo "c=".$textoLimpio.";";
           // echo "si s ";
           // exit;

            $indicef =$indicef+1;// ,dd.iddetalleasignacion
             $resultado  =$resultado." cargarFilaActivo_ext2(".$indicef.",".$row_act['idactivo'].",".$row_act['iddetalleasignacion'].",'".$row_act['codigoucab']."','".$row_act['codigomdryt']."','".$row_act['nombreactivo']."',".$row_act['idgrupo'].",'".$row_act['nombregrupo']."',".$row_act['idsubgrupo'].",'".$row_act['nombresubgrupo']."',".$row_act['idobservacion'].",'".$row_act['nombreobservacion']."',".$row_act['idestado'].",'".$textoLimpio."','".$sw1."');  "   ;
            if($sw1=="true"){$sw1="false";}else{$sw1="true";}
        }
        // echo $resultado;
     // echo "pagina=".$pagina." - pagniass=".$paginas ;
        $resultado=$resultado."document.getElementById('idPaginado').innerHTML='';";
        // $resultado=$resultado." tr = document.createElement('div'); tr.innerHTML = ' 1 ';  document.getElementById('idPaginado').appendChild(tr); ";
            $maxpaginado=10;

            if($paginas<$maxpaginado){
                 $maxpaginado=$paginas;
            }

            if($pagini==0){
                $pagini=1;
            }
            if($pagfin==0){
                $pagfin=$maxpaginado;
            }



              // cantidad de paginas total= $paginas
            // pagina actual =$pagina
           // $pagfin=$pagina+($maxpaginado/2);
           // echo "paginaini va=".$pagini;
            // echo "paginafin va=".$pagfin;
            // echo "resul=2ss".($pagina+(round($maxpaginado/2)));
             // echo "resul=ss".($pagina+( Math.round($maxpaginado/2)));

            if( $pagina >( round($maxpaginado/2))){
                if( $pagina+( round($maxpaginado/2))<= $paginas ){
                    $pagfin=$pagina+( round($maxpaginado/2));
                    $pagini=$pagfin-( round($maxpaginado-1));
                }else{
                    $pagfin=$paginas;
                    $pagini=$pagfin-( round($maxpaginado-1));
                }
            }else{
                if($maxpaginado<=$paginas){
                    $pagfin=$maxpaginado;
                    $pagini=1;
                }else{
                    $pagfin=$paginas;
                    $pagini=1;
                }
                //if()
               /* $pagfin1=$maxpaginado;
                $pagini1=$pagfin-($maxpaginado-1);
                if($pagini1>=1){
                    $pagfin=$pagfin1;
                    $pagini=$pagini1;
                }*/
            }
            // echo "paginaini va=".$pagini;
             //echo "paginafin va=".$pagfin;

            $paginatotalaux;

              if($pagina>1){
                 //$resultado=$resultado."<a href='listadoperfiles.php?num=".($pagina-1)."&fechaini=".$fechaini."&fechafin=".$fechafin."&cantidad=".$cantidad."'>Anterior</a> ";
                if($maxpaginado>$paginas){$paginatotalaux=$paginas;}else{$paginatotalaux=$maxpaginado;}

                $resultado=$resultado."insertarPrimera_extD('idPaginado',1,1,".$paginatotalaux.");";
                $resultado=$resultado."insertarAnterior_extD('idPaginado',".($pagina-1).",".$pagini.",".$pagfin.");";
            }


            for ($cont = $pagini; $cont <= $pagfin; $cont++) {// for ($cont = 1; $cont <= $paginas; $cont++) {
                 if($cont==$pagina ){
                       $resultado=$resultado."insertarActual_extD('idPaginado',".$cont.",".$pagini.",".$pagfin.");";
                 }
                  else{
                      $resultado=$resultado."insertarNumero_extD('idPaginado',".$cont.",".$pagini.",".$pagfin.");";
                  }
            }

            if($pagina<$paginas){
                  //$resultado=$resultado."<a href='listadoperfiles.php?num=".($pagina+1)."&fechaini=".$fechaini."&fechafin=".$fechafin."&cantidad=".$cantidad."'>Siguiente</a> ";
                  $resultado=$resultado."insertarSiguiente_extD('idPaginado',".($pagina+1).",".$pagini.",".$pagfin.");";
                   if($maxpaginado>$paginas){$paginatotalaux=$paginas;$pag=1;}else{$paginatotalaux=$paginas;$pag=($paginas-($maxpaginado-1));  }
                  $resultado=$resultado."insertarUltima_extD('idPaginado',".($paginas).",".$pag.",".$paginatotalaux.");";
            }

           // $resultado=$resultado."</div>";

       echo $resultado;

  }


 //----- guardar devolucion ----//
    if (($_POST["tarea"] == "guardarDevolucionnActivo") ){
       $resultado=0;
       $fecha=$_POST["txtfecha_"];
       $idpersonal=$_POST["idpersonal_"];

       $ids=$_POST["ids"];
       $iddetasig=$_POST["iddetasig"];

       $descripcion=$_POST["descripcion"];

       $accion=$_POST["acciongral"];
       // echo "resss1=".$descripcion;
       $descripcion= str_replace("|", chr(10),  $descripcion);

        $listaids =explode("|", $ids);

        $listaiddetasig =explode("|", $iddetasig);


       //---------GUARDAR CABECERAA--------//
       $sql_grupo = "select * from activofijo.f_guardar_devolucion(".$accion
               .",'".$fecha."',".$idpersonal.",'".$descripcion."');";
       $idd=0;
           // ECHO "coninsert=".$sql_grupo;
         $docres = pg_query($cn,$sql_grupo);
          $totalRows_ = pg_num_rows($docres);
         // echo "total=".$totalRows_;
          if($totalRows_>0){
             // echo "entroo";
             if($accion =="0"){
                   $row_documentacion = pg_fetch_array ($docres);
                   $idd=$row_documentacion['f_guardar_devolucion'];
                }else{
                   $idd =$accion;
                }
             $resultado=$idd;
         }else{
             $resultado=0;
         }

        // echo "idd=".$idd;
       if($idd>0){
          // $aa=count($listaids);
          // echo "cant=".$aa;
          //  echo " elem0=". $listaids[0] ;
           // echo " elem1=". $listaids[1] ;
             // $sqld_ = "select * from activofijo.f_guardar_detalledevolucion(".$idd.");";
             // $docresd = pg_query($cn,$sqld_);

            for ($index1 = 0; $index1 <= count($listaids); $index1++) {
               if(strlen($listaids[$index1])>0){
                     $sql_ = "select * from activofijo.f_guardar_detalledevolucion("."0"
                    .",".$idd.",".$listaids[$index1].",".$listaiddetasig[$index1].",'".$fecha."',1);";

                   // echo "detalle=".$sql_;
                   $docres = pg_query($cn,$sql_);
               }
            }
       }

         echo $resultado;

    }

   /// --   FIN GUARDAR devo ---



    if (($_POST["tarea"] == "cargarcombosListadoDevo") )
   {
       $resultado=" ";



        $sql_obs = " select f.idfuncionario,  coalesce(p.nombre1, '') || ' ' || coalesce(p.nombre2, '') || ' ' || coalesce(p.apellidopat, '') || ' ' || coalesce(p.apellidomat,'' , '')    AS nombre_nompleto
 	from funcionario f join persona p on p.idpersona=f.idpersona where f.estadofun='A'  and (financiamiento='UCAB' or financiamiento='VDRA') order by p.nombre1 asc; ;";
        $docresobs = pg_query($cn,$sql_obs);

        $resultado =$resultado."addItemCombo('buscarpersonal','Elegir..',0); ";




         while ($row_obs = pg_fetch_assoc($docresobs)){
             $resultado =$resultado."addItemCombo('buscarpersonal','".$row_obs['nombre_nompleto']."',".$row_obs['idfuncionario']."); ";
        }



       echo $resultado;

  }




   if (($_POST["tarea"] == "cargarListadoDevolucion") )
   {
       $resultado=" ";
       $filtro=$_POST["filtro"];
       $paginaactual=$_POST["paginaactual"];
       $pagini=$_POST["paginaini"];
       $pagfin=$_POST["paginafin"];


       $sql_grupo = " select a.*,coalesce(p.nombre1, '') || ' ' || coalesce(p.nombre2, '') || ' ' || coalesce(p.apellidopat, '') || ' ' || coalesce(p.apellidomat,'' , '')    AS nombre_nompleto
       ,count(dd.iddetalledevolucion)as cantidad from activofijo.devolucion a join funcionario f on f.idfuncionario=a.idfuncionario join persona p on p.idpersona=f.idpersona
       join activofijo.detalledevolucion dd on dd.iddevolucion=a.iddevolucion
       where a.estado=1 ".$filtro." GROUP BY a.iddevolucion,a.codigodevolucion,a.fechadevolucion,a.idfuncionario,a.caracteristicas,a.estado,nombre_nompleto
        order by a.iddevolucion asc;  ";


       //  echo "con fultro=".$sql_grupo;
       $docres = pg_query($cn,$sql_grupo);
       $num_registro = pg_num_rows($docres);



          $registros=15;
          $nropagina=$paginaactual;//$_GET["num"];
	  if(isset($nropagina)){//$_GET["num"]
		$pagina=$nropagina;//$_GET["num"]
	  }else{
		$pagina="1";
	  }

        if(is_numeric($pagina))
            $inicio=(($pagina-1)*$registros);
        else
            $inicio=0;
        $paginas=  ceil($num_registro/$registros);



         $sql_grupo1 = " select a.*,coalesce(p.nombre1, '') || ' ' || coalesce(p.nombre2, '') || ' ' || coalesce(p.apellidopat, '') || ' ' || coalesce(p.apellidomat,'' , '')    AS nombre_nompleto
       ,count(dd.iddetalledevolucion)as cantidad from activofijo.devolucion a join funcionario f on f.idfuncionario=a.idfuncionario join persona p on p.idpersona=f.idpersona
       join activofijo.detalledevolucion dd on dd.iddevolucion=a.iddevolucion
       where a.estado=1  ".$filtro."
         GROUP BY a.iddevolucion,a.codigodevolucion,a.fechadevolucion,a.idfuncionario,a.caracteristicas,a.estado,nombre_nompleto
        order by a.iddevolucion desc   limit $registros  offset $inicio ;";
         // echo "con=".$sql_grupo1;
        $docres1 = pg_query($cn,$sql_grupo1);
        $num_registro = pg_num_rows($docres1);
        $indicef=0;
        //echo "cont=".$num_registro;
         $sw="true";
        while ($row_act = pg_fetch_assoc($docres1)){
             $descripcion1=$row_act['caracteristicas'];
              $descripcion1= str_replace( chr(10)," ",  $descripcion1);
            $indicef =$indicef+1;  //indice,idIngreso, coducab,                     fecha, nombrepersonal_,  depto_, regional_,obs)
             $resultado  =$resultado." cargarFilaDevolucion(".$indicef.",".$row_act['iddevolucion'].",'".$row_act['codigodevolucion']."','".$row_act['fechadevolucion']."','".$row_act['nombre_nompleto']."','".$descripcion1."',".$row_act['cantidad'].",'".$sw."');  "   ;
             if($sw=="true"){$sw="false";}else{$sw="true";}
        }
     //   echo $resultado;
     // echo "pagina=".$pagina." - pagniass=".$paginas ;
        $resultado=$resultado."document.getElementById('idPaginado').innerHTML='';";
        // $resultado=$resultado." tr = document.createElement('div'); tr.innerHTML = ' 1 ';  document.getElementById('idPaginado').appendChild(tr); ";
            $maxpaginado=10;

            if($paginas<$maxpaginado){
                 $maxpaginado=$paginas;
            }

            if($pagini==0){
                $pagini=1;
            }
            if($pagfin==0){
                $pagfin=$maxpaginado;
            }



              // cantidad de paginas total= $paginas
            // pagina actual =$pagina
           // $pagfin=$pagina+($maxpaginado/2);
           // echo "paginaini va=".$pagini;
            // echo "paginafin va=".$pagfin;
            // echo "resul=2ss".($pagina+(round($maxpaginado/2)));
             // echo "resul=ss".($pagina+( Math.round($maxpaginado/2)));

            if( $pagina >( round($maxpaginado/2))){
                if( $pagina+( round($maxpaginado/2))<= $paginas ){
                    $pagfin=$pagina+( round($maxpaginado/2));
                    $pagini=$pagfin-( round($maxpaginado-1));
                }else{
                    $pagfin=$paginas;
                    $pagini=$pagfin-( round($maxpaginado-1));
                }
            }else{
                if($maxpaginado<=$paginas){
                    $pagfin=$maxpaginado;
                    $pagini=1;
                }else{
                    $pagfin=$paginas;
                    $pagini=1;
                }

            }
            // echo "paginaini va=".$pagini;
             //echo "paginafin va=".$pagfin;

            $paginatotalaux;

              if($pagina>1){
                 //$resultado=$resultado."<a href='listadoperfiles.php?num=".($pagina-1)."&fechaini=".$fechaini."&fechafin=".$fechafin."&cantidad=".$cantidad."'>Anterior</a> ";
                if($maxpaginado>$paginas){$paginatotalaux=$paginas;}else{$paginatotalaux=$maxpaginado;}

                $resultado=$resultado."insertarPrimeraAS('idPaginado',1,1,".$paginatotalaux.",".$pagini.",".$pagfin.");";
                $resultado=$resultado."insertarAnteriorAS('idPaginado',".($pagina-1).",".$pagini.",".$pagfin.");";
            }


            for ($cont = $pagini; $cont <= $pagfin; $cont++) {// for ($cont = 1; $cont <= $paginas; $cont++) {
                 if($cont==$pagina ){
                       $resultado=$resultado."insertarActualAS('idPaginado',".$cont.",".$pagini.",".$pagfin.");";
                 }
                else{
                      $resultado=$resultado."insertarNumeroAS('idPaginado',".$cont.",".$pagini.",".$pagfin.");";
                  }
            }

            if($pagina<$paginas){
                  //$resultado=$resultado."<a href='listadoperfiles.php?num=".($pagina+1)."&fechaini=".$fechaini."&fechafin=".$fechafin."&cantidad=".$cantidad."'>Siguiente</a> ";
                  $resultado=$resultado."insertarSiguienteAS('idPaginado',".($pagina+1).",".$pagini.",".$pagfin.");";
                   if($maxpaginado>$paginas){$paginatotalaux=$paginas;$pag=1;}else{$paginatotalaux=$paginas;$pag=($paginas-($maxpaginado-1));  }
                  $resultado=$resultado."insertarUltimaAS('idPaginado',".($paginas).",".$pag.",".$paginatotalaux.");";
            }

           // $resultado=$resultado."</div>";

       echo $resultado;

  }





if (($_POST["tarea"] == "cargarEditarDevo") )
   {
       $resultado=" ";
      $id_=$_POST["id"];

       $sql_grupo = "select * from activofijo.devolucion  where iddevolucion=".$id_.";";
        //  echo "con=".$sql_grupo;
         $docres = pg_query($cn,$sql_grupo);
         $totalRows = pg_num_rows($docres);
         if($totalRows>0){
             $row_documentacion = pg_fetch_assoc($docres);

             $resultado =$resultado." document.getElementById('txtcoducab').value='".$row_documentacion['codigodevolucion']."';";
             $resultado =$resultado." document.getElementById('txtfecha').value='".$row_documentacion['fechadevolucion']."';";

             $resultado =$resultado."seleccionarComboId('cboPersonal',".$row_documentacion['idfuncionario'].");";


             $descripcion=$row_documentacion['caracteristicas'];
              $descripcion= str_replace( chr(10),"|",  $descripcion);

               $resultado =$resultado."cargarCaracteristicasDevo('".$descripcion."');";


         }
         //--- cargar detalle----
         $sql_det = "select d.*,n.nombreactivo,a.codigoucab,a.codigomdryt from  activofijo.detalledevolucion d join  activofijo.activofijo a on a.idactivo=d.idactivo
           join activofijo.nombreactivo n on n.idnombreactivo=a.idnombreactivo  where d.estado=1 and d.iddevolucion=".$id_.";";
          $docdet = pg_query($cn,$sql_det);
         //$totalRows = pg_num_rows($docdet);
        // echo "aaaa=".$sql_det;
        while ($rowdet = pg_fetch_assoc($docdet)){
            /*if($rowdet['estadoasignado']==1){
                $estadoasgi="Asignado";
            }else{
                $estadoasgi="Devuelto";
            }*/

             $resultado =$resultado."cargarfilaDetalleEditar('".tableActivo."','".$rowdet['codigoucab']."','".$rowdet['codigomdryt']."','".$rowdet['nombreactivo']."',".$rowdet['idactivo']."); ";
             //echo "entro ";
        }
         //echo "bb=".$resultado;

         //  $resultado =$resultado."
       echo $resultado;

  }







  //--- - -imprimirrrr-----
  if (($_POST["tarea"] == "imprimirAsignacion") )
   {
      $id_=0;
       $resultado="si";
      $id_= $_POST["idasig"];
     // echo "entrooo1=".$id_;

        require('ConexionImpresionesRegistro.php');
        $filename = "Acta_asignacio.pdf";

       // echo "entrooo2=".$id_;
	//Llamando las librerias
	require_once('http://localhost:8080/JavaBridge/java/Java.inc');
	require('../reportes/php-jru/php-jru.php');
	//Llamando la funcion JRU de la libreria php-jru
	$jru=new JRU();
	//Ruta del reporte compilado Jasper generado por IReports
       // echo "entrooo3=".$id_;

	$Reporte='C://xampp//htdocs//PPARB//sistema//reportes//activos-fijos//acta_asignacion.jasper';
	//Ruta a donde deseo Guardar Mi archivo de salida Pdf
	$SalidaReporte='C://xampp//htdocs//PPARB//sistema//reportes//activos-fijos//'.$filename;
	//Parametro en caso de que el reporte no este parametrizado
	$Parametro=new java('java.util.HashMap');
 //echo "entrooo4=".$id_;

    //$Parametro->put('URL_IMG', realpath('mdryt.jpg'));
	$Parametro->put("idasignacion",  1);
 //echo "entrooo5=".$id_;
	$Cn= new ConexionImpresionesRegistro();
	$Conexion = $Cn->getConexion();

        // echo "entrooo6=".$id_;
        // echo "repor=".$Reporte;
        // echo "salrepor=".$SalidaReporte;
        // echo "para=".$Parametro;
        // echo "conx=".$Conexion;

	$jru->runReportToPdfFile($Reporte,$SalidaReporte,$Parametro,$Conexion);


 //echo "entrooo7=".$id_;

        $filename = "acta_asignacio.pdf";
        $file = "C:/xampp/htdocs/PPARB/sistema/reportes/activos-fijos/".$filename;

        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/force-download");
        header("Content-Length: 409600");
        header("Content-Transfer-Encoding: binary");
        readfile($file);



       //echo $resultado;

  }


if (($_POST["tarea"] == "cargarcombosreporte") )
   {
       $resultado=" ";

        $sql_ac = " SELECT * FROM  activofijo.nombreactivo  where estado=1  ;";
         $docresac = pg_query($cn,$sql_ac);


       $sql_grupo = "select * from activofijo.grupo order by idgrupo asc ;";
         $docres = pg_query($cn,$sql_grupo);
        // $totalRows = pg_num_rows($docres);
         $sql_grupo2 = "select * from activofijo.regionales order by idregional asc ;";
         $docres2 = pg_query($cn,$sql_grupo2);

         $docregi = pg_query($cn,$sql_grupo2);

        $sql_subgrupo = " select f.idfuncionario,  coalesce(p.nombre1, '') || ' ' || coalesce(p.nombre2, '') || ' ' || coalesce(p.apellidopat, '') || ' ' || coalesce(p.apellidomat,'' , '')    AS nombre_nompleto
	from funcionario f join persona p on p.idpersona=f.idpersona where f.estadofun='A'  and (financiamiento='UCAB' or financiamiento='VDRA') order by p.nombre1 asc ;";
          $docressub = pg_query($cn,$sql_subgrupo);
          //  $docressub2 = pg_query($cn,$sql_subgrupo);


        $resultado =$resultado."addItemCombo('cbogrupo','Elegir..',0); ";
         $resultado =$resultado."addItemCombo('cboregional','Elegir..',0); ";
        $resultado =$resultado."addItemCombo('cboPersonal','Elegir..',0); ";
        // $resultado =$resultado."addItemCombo('cboPersonal2','Elegir..',0); ";
      //   $resultado =$resultado."addItemCombo('cboregionalAS','Elegir..',0); ";

         $resultado =$resultado."addItemCombo('cboregional2','Elegir..',0); ";
         $resultado =$resultado."addItemCombo('cboactivo','Elegir..',0); ";

             while ($row_documentacion3 = pg_fetch_assoc($docregi)){
                 $resultado =$resultado."addItemCombo('cboregional2','".$row_documentacion3['nombreregional']."',".$row_documentacion3['idregional']."); ";
            }
             while ($row_documentaciona = pg_fetch_assoc($docresac)){
                 $resultado =$resultado."addItemCombo('cboactivo','".$row_documentaciona['nombreactivo']."',".$row_documentaciona['idnombreactivo']."); ";
            }


        while ($row_documentacion = pg_fetch_assoc($docres)){
                 $resultado =$resultado."addItemCombo('cbogrupo','".$row_documentacion['nombregrupo']." (".$row_documentacion['codigo'].")',".$row_documentacion['idgrupo']."); ";
            }

      while ($row_documentacion2 = pg_fetch_assoc($docres2)){
                 $resultado =$resultado."addItemCombo('cboregional','".$row_documentacion2['nombreregional']."',".$row_documentacion2['idregional']."); ";
               //  $resultado =$resultado."addItemCombo('cboregionalAS','".$row_documentacion2['nombreregional']."',".$row_documentacion2['idregional']."); ";
            }

       while ($row_sub= pg_fetch_assoc($docressub)){
             $resultado =$resultado."addItemCombo('cboPersonal','".$row_sub['nombre_nompleto']."',".$row_sub['idfuncionario']."); ";
             $resultado =$resultado."addItemCombo('cboPersonalAS','".$row_sub['nombre_nompleto']."',".$row_sub['idfuncionario']."); ";
       }




         /* while ($row_sub2= pg_fetch_assoc($docressub2)){
             $resultado =$resultado."addItemCombo('cboPersonal2','".$row_sub2['nombre_nompleto']."',".$row_sub2['idfuncionario']."); ";
         }*/

       echo $resultado;

  }



  if (($_POST["tarea"] == "cargarEditarCombos") )
   {
       $resultado=" ";
      $id_=$_POST["id"];

       $sql_grupo = "select * from activofijo.activofijo a
            join activofijo.nombreactivo n on n.idnombreactivo=a.idnombreactivo
            where n.idnombreactivo=".$id_.";";
        //  echo "con=".$sql_grupo;
         $docres = pg_query($cn,$sql_grupo);
         $totalRows = pg_num_rows($docres);
         if($totalRows>0){
             $resultado =$resultado." document.getElementById('cbogrupo').disabled = 'true'; ";
             $resultado =$resultado." document.getElementById('cbosubgrupo').disabled = 'true' ;";

             $resultado =$resultado." document.getElementById('btngrupo').disabled = 'true' ;";
             $resultado =$resultado." document.getElementById('btnsubgrupo').disabled = 'true' ;";

             $resultado =$resultado." document.getElementById('btngrupo').style.background = '#7F8C8D';";
             $resultado =$resultado." document.getElementById('btnsubgrupo').style.background = '#7F8C8D';";


             $row_documentacion = pg_fetch_assoc($docres);
             $resultado =$resultado."seleccionarComboId('cbogrupo',".$row_documentacion['idgrupo'].");";

              $resultado =$resultado."cargarcombosubgrupo(".$row_documentacion['idsubgrupo'].",".$row_documentacion['idgrupo'].");";

         }



         //  $resultado =$resultado."
       echo $resultado;

  }



   if (($_POST["tarea"] == "eliminarNombre") )
   {
       $resultado="";
      $id_=$_POST["idnombre"];

       $sql_grupo = "select *from activofijo.nombreactivo n
        join activofijo.activofijo ac on ac.idnombreactivo=n.idnombreactivo  where  n.idnombreactivo=".$id_.";";
            //echo "con=".$sql_grupo;
         $docres = pg_query($cn,$sql_grupo);
         $totalRows = pg_num_rows($docres);
         if($totalRows>0){
             $resultado=0;

         }else{

              $con= "select * from activofijo.f_delete_nombreactivo(".$id_.");";
              // echo "condelete=".$con;
               $docrese = pg_query($cn,$con);
              $resultado=1;
         }

       echo $resultado;

  }



    if (($_POST["tarea"] == "eliminargrupo") )
   {
       $resultado="";
      $id_=$_POST["idnombre"];

       $sql_grupo = " select *from activofijo.grupo g
        join activofijo.activofijo ac on ac.idgrupo=g.idgrupo  where  g.idgrupo=".$id_." ;";
            //echo "con=".$sql_grupo;
         $docres = pg_query($cn,$sql_grupo);
         $totalRows = pg_num_rows($docres);
         if($totalRows>0){
             $resultado=0;

         }else{

              $con= "select * from activofijo.f_delete_grupo(".$id_.");";
              // echo "condelete=".$con;
               $docrese = pg_query($cn,$con);
              $resultado=1;
         }

       echo $resultado;

  }





    if (($_POST["tarea"] == "eliminarsubgrupo") )
   {
       $resultado="";
      $id_=$_POST["idnombre"];

       $sql_grupo = "  select *from activofijo.subgrupo g
        join activofijo.activofijo ac on ac.idsubgrupo=g.idsubgrupo  where  g.idsubgrupo=".$id_." ;";
            //echo "con=".$sql_grupo;
         $docres = pg_query($cn,$sql_grupo);
         $totalRows = pg_num_rows($docres);
         if($totalRows>0){
             $resultado=0;

         }else{

              $con= "select * from activofijo.f_delete_subgrupo(".$id_.");";
              // echo "condelete=".$con;
               $docrese = pg_query($cn,$con);
              $resultado=1;
         }

       echo $resultado;

  }





?>
