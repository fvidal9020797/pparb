<?php
//print_r($_GET);
if(isset($_GET['idreg'])){
    $idreg=$_GET['idreg'];
    $_SESSION['idreg']=$idreg;
}
if(isset($_GET['Actividad2'])){
    $Actividad=$_GET['Actividad2'];
    $_SESSION['Actividad']=$Actividad;
}
if(isset($_GET['Causal']) && !isset($_SESSION['Causal']) ){
    $Causal=$_GET['Causal'];
    $_SESSION['Causal']=$Causal;
}



 ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>jQeury.steps Demos</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/jquery.steps.css">
    <script src="../lib/modernizr-2.6.2.min.js"></script>
    <script src="../lib/jquery-1.9.1.min.js"></script>
    <script src="../lib/jquery.cookie-1.3.1.js"></script>
    <script src="../build/jquery.steps.js"></script>
</head>
<body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
            <![endif]-->

            <div class="content">

                <?php
                $idreg=@$_SESSION['idreg'];

                if ($idreg!="") {
                ?>
                    <script>
                        $(function ()
                        {
                            $("#wizard").steps({
                                headerTag: "h2",
                                bodyTag: "section",
                                transitionEffect: "slideLeft",
                                 enableAllSteps: true
                            });
                        });
                    </script>

                    <div id="wizard">
  <?php
    include "../Valid.php";
    if (permisos($cn,"N_Beneficiario.php"))
        {
        ?>
         <h2>Identificacion del Predio</h2>
        <section  data-mode="iframe" data-url="tab_predio.php">
         </section>
        <?php
        }
        /////////////////////si no hay causal de rechazo//////////////////////////////////
if(isset($_SESSION['idreg']) && $_SESSION['idreg']>0 && isset($_SESSION["Causal"]) && ($_SESSION["Causal"]==0 || $_SESSION["Causal"]==2) ) {
    if (permisos($cn,"N_Bosques.php") )
        {
        ?>
         <h2>Bosques</h2>
                        <section  data-mode="iframe" data-url="tab_bosques.php">

                        </section>
        <?php
        }
    if (permisos($cn,"N_Agricola.php") && isset($_SESSION['Actividad']) && ($_SESSION['Actividad']=="Agricola" || $_SESSION['Actividad']=="Mixta Agropecuaria" || $_SESSION['Actividad']=="Agricola-Avicola" || $_SESSION['Actividad']=="Agricola-Porcina") )
        {
        ?>
        <h2>Agricola</h2>
                        <section  data-mode="iframe" data-url="tab_agricola.php">
                            </section>
        <?php
        }
    if (permisos($cn,"N_Ganadera.php") && isset($_SESSION['Actividad']) && ($_SESSION['Actividad']=="Ganadera" || $_SESSION['Actividad']=="Mixta Agropecuaria"))
        {
        ?>


                        <h2>Ganadera</h2>
                        <section  data-mode="iframe" data-url="tab_ganadero.php">

                        </section>


        <?php
        }
    if (permisos($cn,"N_GanaderaLechero.php") && isset($_SESSION['Actividad']) && ($_SESSION['Actividad']=="Ganadera Lechera" || $_SESSION['Actividad']=="Mixta Agropecuaria"))
        {
        ?>
        <h2>Ganadera Lechera</h2>
                        <section  data-mode="iframe" data-url="tab_ganadero_lechero.php">

                        </section>
         <?php
        }
    if (permisos($cn,"N_Avicola.php") && isset($_SESSION['Actividad']) && ($_SESSION['Actividad']=="Agricola-Avicola"))
        {
        ?>
        <h2>Producción Avicola</h2>
                        <section  data-mode="iframe" data-url="tab_agricola_avicola.php">

                        </section>
         <?php
        }
    if (permisos($cn,"N_Porcina.php") && isset($_SESSION['Actividad']) && ($_SESSION['Actividad']=="Agricola-Porcina"))
        {
        ?>
        <h2>Producción</h2>
                        <section  data-mode="iframe" data-url="tab_agricola_porcina.php">

                        </section>
        <?php
        }

            }//ifidreg>0
                 ?>


                    </div>
                    <?php
                } else {
                    ?>

                    <form   action="index.php" method="POST" name="login" id="form" >

                      <table width="500" border="1" bordercolorlight="#6666FF" bordercolordark="#6666CC" cellpadding="1" cellspacing="0" class="taulaA" align="center">
                        <tr height="20">
                            <td colspan="2" align="center" valign="middle" class="cabecera2">INGRESE CODIGO DE PARCELA</td>
                        </tr>
                        <tr height="40">
                            <td width="38%" align="center" valign="middle">CODIGO DE PARCELA:</td>
                            <td width="62%" align="center" valign="middle"><input name="idparcela" type="text"  size="40" autocomplete="on"/></td>
                        </tr>
                    </table>
                    <p align="center">
                        <input name="" type="submit" class="boton" value="continuar" />
                    </p>
                </form>

                <?php
            }

            ?>

        </div>
    </body>
    </html>
