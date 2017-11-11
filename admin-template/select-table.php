   <?php

   /**
 * Description of codificadores
 *
 * @author jesus escobar ovando
 */

  include 'GestorDataBase.php';
                   $gestordatabase=new gestorDataBase();

                   $r= $gestordatabase->listartabla();
                   $result=  $gestordatabase->listartabla();
                   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Blog Single | Corlate</title>
    
    <!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
  
</head><!--/head-->

<body>

  
<section id="contact-page">
    <div class="container">
        <div class="center">        
            <h2>MIGRADO DE DATOS</h2>
            <p class="lead">Seleccione tablas para el migrado de datos</p>
        </div> 
        <div class="row contact-wrap">



            <div class="status alert alert-success" style="display: none"></div>
            <form id="main-selecttable-form" class="contact-form" name="contact-form" method="post" action="ControllerUpdateDatabase.php">
               
  <?php
                 
$col_1="";$col_2="";
$flag=true;
                   while ($row2 = pg_fetch_array($result)) {
if ($flag) {
     $col_1.= '   
                     <div class="form-group">
                        
                         <label id="label-' .$row2['tablename'] . '" for="' .$row2['tablename'] . '">' .$row2['tablename'] . '</label>
                         <input type="checkbox" value="' . $row2['tablename'] . '" id="'.$row2['tablename'] .'" name="tables[]" >
                       
                          
                    </div>';
                    $flag=false;
} else {
       $col_2.= '   
                     <div class="form-group">
                        
                         <label id="label-' .$row2['tablename'] . '" for="' .$row2['tablename'] . '">' .$row2['tablename'] . '</label>
                         <input type="checkbox" value="' . $row2['tablename'] . '" id="'.$row2['tablename'] .'" name="tables[]" >
                       
                          
                    </div>';
                    $flag=true;
}

                   
                 }
                ?>
               
                <div class="col-sm-5 col-sm-offset-1" style=" background: none repeat scroll 0 0 #FAAC58;">
                   
                    <?php
                   echo $col_1;
                    ?>
               
        </div><!--/.-->
         <div class="col-sm-5" style=" background: none repeat scroll 0 0 #FAAC58;">
            <?php
                   echo $col_2;
                    ?>
          </div><!--/.-->
  <div class="center">

                       <div class="form-group">
                        <input type="hidden" name="action" value="insertdatabase" >
                        <input type='hidden' id='cont' name='cont' 
     value="<?php echo htmlspecialchars(@$_SESSION['ctform']['cont']=='' ? 0 :@$_SESSION['ctform']['cont']) ?>" />
                            <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Siquiente</button>
                        </div>
                         </div>
    </form> 
 
</div><!--/.row-->
</div><!--/.container-->
<div id="loading-div-background">
            <div id="loading-div" class="ui-corner-all" >
              <img style="height:80px;margin:40px;" src="./images/loading.gif" alt="Loading.."/>
              <h2 style="color:gray;font-weight:normal;">Please wait....</h2>
        </div>
        </div>
</section><!--/#contact-page-->
   
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/jquery.isotope.min.js"></script>
<script src="js/main.js"></script>
<script src="js/wow.min.js"></script>
 <?php
      while ($row21 = pg_fetch_array($r)) {

                     echo ' <script type="text/javascript">
                            $(document).ready(function() { 
                            $(\'#' .$row21['tablename'] . '\').change(function() {
                                    var cont =parseInt($(\'#cont\').val());
                                    if (this.checked){            
                                        cont = cont + 1;
                                     $(\'#' .$row21['tablename'] . '\').attr(\'value\', cont+\'-'.$row21['tablename'] . '\');
                                  $(\'#label-' .$row21['tablename'] . '\').html(cont+\'.-'.$row21['tablename'] . '\');
                                 }else{
                                    cont = cont -1 ;
                                    $(\'#' .$row21['tablename'] . '\').attr(\'value\', \'' .$row21['tablename'] . '\');
                                     $(\'#label-' .$row21['tablename'] . '\').html(\'' .$row21['tablename'] . '\');
                                 }
                                $(\'#cont\').val(cont);
                             }) 
                            });
                            </script>';
        }
    ?>
</body>
</html>