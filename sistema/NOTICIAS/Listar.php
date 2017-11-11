<?php
include "../Registro/destroy_predio.php";
include "../Valid.php";

                
         $_pagi_sql = $sql_listado="SELECT *FROM NOTICIAS where estado<>0";
        //cantidad de resultados por pagina (opcional, por defecto 20)
        $_pagi_cuantos = 20;
        $_pagi_nav_num_enlaces = 10;
        include("../scripts/paginator.inc.php");
?>
<HTML>
    <HEAD>
    <TITLE>listado</TITLE>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../css/mdryt.css"/>
      <link rel="stylesheet" type="text/css" href="../css/button.css"/>
       <script src="../libraries/jquery-1.10.3/jquery-1.10.2.min.js"></script>
<script src="../libraries/jquery-1.10.3/jquery-1.10.3.ui.min.js"></script>
 <link rel="stylesheet" href="<?php ECHO WEBPATH; ?>/libraries/alertify/themes/alertify.core.css" />
 <link rel="stylesheet" href="<?php ECHO WEBPATH; ?>/libraries/alertify/themes/alertify.default.css" id="toggleCSS" />
 <script src="<?php ECHO WEBPATH; ?>/libraries/alertify/lib/alertify.min.js"></script>
 <script type="text/javascript" src="<?php ECHO WEBPATH; ?>/js/action.js"></script>
  

    <script>
        $(window).keypress(function(e) {
        if(e.keyCode == 13) {
        //haz lo que quieras cuando presionene enter
        document.form.submit();
        }
        });
    </script>

    </HEAD>

    <BODY>
        <div align="center">
            <div id="oculto">
                <div class="ocultable" id="texto1">
                    <div id="volanta"></div>
                </div>
            </div>
            <div align="center" class="texto">

                
                <p>
                    <h1>LISTA DE NOTICIAS</h1>
                     <a class="boton verde formaBoton" href="index.php?action=nuevo"> NUEVO</a></td>

                   
                </p>  
            </div>
            <div class="CSSTable center" style="width:80%"> 
                <table >
                    <form action="index.php" name="form" method="get">
                        <input type="hidden" class="" name="action" value="listar">
                        <tr>
                            <td><strong>#</strong></td>
                            <td><strong>TITULO

                                </strong>
                                <strong>
                                  
                                </strong>
                            </td>
                            <td><strong>DESCRIPCION </strong>
                                <strong>
                               
                                </strong>
                            </td>
                            <td><strong>FECHA REGISTRO </strong>
                            
                            </td>
                            <td><strong>FECHA DE NOTICIA </strong>
                                <strong>
                                 </strong>
                                 
                              

                            </td>
                            <td><strong>TIPO DE NOTICIA</strong>

                                <strong>                                
                                </strong>
                            </td>
                           
                            <td><strong>NIVEL</strong>
                                <strong>
                                   
                                </strong>
                            </td>
                            <td><strong>ESTADO </strong>
                                <strong>
                                   
                                </strong>

                            </td>
                        
                            <td>
                            <strong>
                           
<a  class="boton verde formaBoton" href="javascript:document.form.submit();">BUSCAR</a>
                            </strong>
                            </td>
                        </tr>
                    </form>
                    <?php
////////////////////////////////////////////////      
// echo $sql_listado;
                  //  $listado = pg_query($cn, $sql_listado);
                    $row_listado = pg_fetch_array($_pagi_result);
                    $totalRows_listado = pg_num_rows($_pagi_result);
                    $con = 1;
                    if ($totalRows_listado > 0) {
                        do {
                            ?>
                            <tr  align="center">
                                <td ><?php echo trim($con); ?></td>
                                <td ><?php echo trim($row_listado['titulo']); ?></td>
                                <td ><?php echo trim(substr($row_listado['decripcion'], 0, 40)); ?></td>
                                <td ><?php echo trim($row_listado['fecha']); ?></td>
                                <td ><?php echo trim($row_listado['fecha_noticia']); ?></td>
                                <td ><?php echo trim($row_listado['tipo']); ?></td>
                                <td ><?php echo trim($row_listado['nivel']); ?></td>
                                <td ><?php echo trim($row_listado['estado']); ?></td>   
                                <td align ="midle">                                  
                                <!-- <a href="index.php?action=nuevo&id=<?php echo $row_listado['id']; ?>"> <img src="../images/ir.jpg"> </a> </td>  -->
                                 <a  href='<?php ECHO WEBPATH; ?>/NOTICIAS/index.php?action=editar&id=<?php echo $row_listado['id'] ?>' id='<?php echo $row_listado['id'] ?>' data="" class="edit" ><img style='height:25px;width:25px;' src='<?php ECHO WEBPATH; ?>/images/edit.jpg' /></a>  
                                <a  id='<?php echo $row_listado['id'] ?>' data="" class="delete"><img style='height:25px;width:25px;' src='<?php ECHO WEBPATH; ?>/images/delete.jpg' /></a>  </td>
                                      
                            </tr>
                            <?php
                            $con = $con + 1;
                        } while ($row_listado = pg_fetch_assoc($_pagi_result));
                        
                        
                    } else {
                        ?>
                        <tr>
                            <td colspan="11" align="center" class="celdaRojo">
                                <?php echo "No Existe Datos para esta consulta!!"; ?>	 </td>
                        </tr>
                    <?php }
                    ?>
                </table>
            </DIV>
            <?php  echo "<p>" . $_pagi_navegacion . "</p>";
                    ?>
    </BODY>
 
