
      <div class="line-2" align="center" >

   <label><strong>LISTA DE PREDIOS SELECCIONADOS PARA MUESTREO</strong> </label>

</div>

 <div  class="CSSTable1 center" style="width:95%;box-shadow: 0px 10px 0px #888888;" >
<table id= "mt1" >
<thead>
<tr class="header">
  <th><strong>#</strong></th>
  <th><strong>CODIGO
  </strong></th>
  <th><strong>NOMBRE DE PREDIO
  </strong></th>
   <th><strong>DEPARTAMENTO
  </strong></th>
<th>

  <a id="nuevo" href="javascript:;" class="boton verde formaBoton" >AGREGAR</a>

 </th>

  </tr>
  </thead>
<?php
$totalRows_listado=0;
if (@$_SESSION['ctform']['ct_id']>0) {
  # code...

    $sql_listado="Select * FROM noticia_imagen where noticias_id=".@$_SESSION['ctform']['ct_id'];

///////////////BUSQUEDA///////////////////
if ( isset($_GET['buscar1'])){

            $sql_listado="Select * FROM noticia_imagen where noticias_id=".@$_SESSION['ctform']['ct_id'];
}
    $_pagi_sql = $sql_listado;
        //cantidad de resultados por pagina (opcional, por defecto 20)
        $_pagi_cuantos = 20;
        $_pagi_nav_num_enlaces = 10;
        include("../scripts/paginator.inc.php");
    //echo $sql_listado;
 ////////////////////////////////////////////////
    // echo $sql_listado;
           $row_listado = pg_fetch_array($_pagi_result);
                    $totalRows_listado = pg_num_rows($_pagi_result);
$con=1;
  }
 if ($totalRows_listado > 0) {
do {



?>
<tr  align="center">
  <td width="2%"><?php echo trim($con);?></td>
  <td width="2%"><?php echo trim($row_listado['id']);?></td>
  <td width="10%"><?php echo trim($row_listado['nombre']);?></td>
  <td width="15%"><?php echo trim($row_listado['estado']);?></td>

  <td width="5%">
   <a TARGET="_blank" name="descargar" class="monitoreo" href="IMAGENES/<?php echo $row_listado['noticias_id'].'/'.$row_listado['nombre'];?>" ><image width="19"  src="../images/descargar.png"/></a>
   </td>
  </tr>
   <?php $con=$con+1; } while ($row_listado = pg_fetch_assoc($_pagi_result));
       } else {
                        ?>

                    <?php }
                    ?>
</table>

   <div id="green1" style="margin: auto;width:98%">
 </div>
</div>
<input type="hidden" name="cont" id="cont" value="0"/>
   <?php
 if ($totalRows_listado > 0) {
    echo "<p>" . $_pagi_navegacion . "</p>";
       }?>
