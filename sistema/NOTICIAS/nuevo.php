<?php 
include "../Valid.php";
include "../Registro/destroy_predio.php";


require_once $_SERVER['DOCUMENT_ROOT'] . '/sistema/config/config.php';

require_once APPPATH . '/scripts/Codificadores.php';
require_once APPPATH . '/NOTICIAS/GestorNoticias.php';
$codigicador=new Codificadores();

?>

<HTML>
<HEAD><TITLE>listado</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<LINK href="../css/mdryt.css" type=text/css rel=stylesheet>
<LINK href="../css/mdryt-jebus.css" type=text/css rel=stylesheet>
<script language="JavaScript" src="../scripts/funciones.js"></script>
<link rel="stylesheet" type="text/css" href="../css/button.css" />
<link rel="stylesheet" href="../css/jquery-ui.css" />
 <script src="../libraries/jquery-1.10.3/jquery-1.10.2.min.js"></script>
<script src="../libraries/jquery-1.10.3/jquery-1.10.3.ui.min.js"></script>
<link href="uploadfile.css" rel="stylesheet">
<script src="jquery.uploadfile.min.js"></script>
<script>
    $(function() {
        $("#ct_fecha").datepicker({
            changeMonth: true,
            changeYear: true,
            /*  minDate: 0,*/
            maxDate: "+5y +1M +10D",
            dateFormat: "yy-mm-dd"
        });

    });
</script>
<script>
$(window).keypress(function(e) {
    if(e.keyCode == 13) {
        //haz lo que quieras cuando presionene enter
      //  document.form.submit();
    }
});
</script>
  <?php
        process_si_nuevo_form(); // Process the form, if it was submitted
         process_si_edit_form();
         ?>
<BODY>

<div style="display:block;">
     <form   action="index.php" method="POST" name="login" id="form" >
                 
                <div  class="center" style="width:45%">
                <div align="center" ><strong>NOTICIAS</strong></div>
                  
                    
                    <div class="line" ></div>                 

            <div class="campo" style="width:90%">
            <label for="ct_titulo">TITULO</label>
            <?php echo @$_SESSION['ctform']['ct_titulo_error'] ?>
            <input id="ct_titulo" name="ct_titulo" type="text"
            required ="required" placeholder="" autofocus="" title=""
            value="<?php echo htmlspecialchars(@$_SESSION['ctform']['ct_titulo']) ?>"/>
                           </div>
                        <div class="line" ></div>
                               <div class="campo" style="width:90%">
            <label for="ct_descripcion">DESCRIPCION</label>
            <?php echo @$_SESSION['ctform']['ct_descripcion_error'] ?>            
       <textarea style="width: 539px; height: 120px; float: right;  resize: none;" id="ct_descripcion" name="ct_descripcion" > <?php echo htmlspecialchars(@$_SESSION['ctform']['ct_descripcion']) ?></textarea>
                    </div>
                        <div class="line" ></div>
                  
             <div class="campo" style="width:90%">
            <label for="ct_fecha">FECHA</label>
            <?php echo @$_SESSION['ctform']['ct_fecha_error'] ?>
            <input id="ct_fecha" name="ct_fecha" type="text"
            required="required" placeholder="" autofocus="" title=""
            value="<?php echo htmlspecialchars(@$_SESSION['ctform']['ct_fecha']) ?>"/>
       
                    </div>
                        <div class="line" ></div>
                                   <div class="campo" style="width:90%">
           <?php   echo $codigicador->getByClasificadorlabel(37, "required");?>
                    </div>
                        <div class="line" ></div>
                                   <div class="campo" style="width:90%">
            <label for="ct_nivel">NIVEL</label>
            <?php echo @$_SESSION['ctform']['ct_nivel_error'] ?>
            <select id="ct_nivel" name="ct_nivel" required>
            <option value=""></option>
            <option <?php if (  @$_SESSION['ctform']['ct_nivel']==1) {echo 'selected="true"'; }?> value="1">1</option>
            <option <?php if (  @$_SESSION['ctform']['ct_nivel']==2) {echo 'selected="true"'; }?> value="2">2</option>
            <option <?php if (  @$_SESSION['ctform']['ct_nivel']==3) {echo 'selected="true"'; }?> value="3">3</option>
            <option <?php if (  @$_SESSION['ctform']['ct_nivel']==4) {echo 'selected="true"'; }?> value="4">4</option>
            <option <?php if (  @$_SESSION['ctform']['ct_nivel']==5) {echo 'selected="true"'; }?> value="5">5</option>
            <option <?php if (  @$_SESSION['ctform']['ct_nivel']==6) {echo 'selected="true"'; }?> value="6">6</option>
            <option <?php if (  @$_SESSION['ctform']['ct_nivel']==7) {echo 'selected="true"';}?> value="7">7</option>
            <option <?php if (  @$_SESSION['ctform']['ct_nivel']==8) {echo 'selected="true"'; }?> value="8">8</option>
            <option <?php if (  @$_SESSION['ctform']['ct_nivel']==9) {echo 'selected="true"'; }?> value="9">9</option>
            <option <?php if (  @$_SESSION['ctform']['ct_nivel']==10) {echo 'selected="true"'; }?> value="10">10</option>
            </select>           
                    </div>
                        <div class="line" ></div>
          <div class="campo" style="width:90%">    
              <label >ESTADO</label>                          
              <input  <?php if (isset($_SESSION['ctform']['ct_estado'])&& $_SESSION['ctform']['ct_estado']==2) {echo 'checked="true"'; }?> style="display:inline;float:right;" type="radio" name="ct_estado"  value="2" id="ct_edi_option_2" required/>
              <label style="display:inline;float:right;" >Desactivado</label>
               <input <?php if (isset($_SESSION['ctform']['ct_estado']) && $_SESSION['ctform']['ct_estado']==1) {echo 'checked="true"'; }?> style="display:inline; float:right;" type="radio" name="ct_estado" value="1" id="ct_edi_option_1" required/>
              <label  style="display:inline;float:right;width: 60px;">Activado</label>
            </div>
                        <div class="line" ></div>
                        <div align="center">
                        <input type="hidden" name="action" value="guardar" />
                        <input type="hidden" id="ct_id"  name="ct_id" value="<?php echo htmlspecialchars(@$_SESSION['ctform']['ct_id']) ?>" />
                        <input class="boton verde" type="submit" value="GUARDAR" /></div>
                    </div>
             
                
                 
                </form>
  </div>
      <div class="line-2" align="center" >

   <label>LISTA DE IMAGENES</label>
  

</div>

 <div class="CSSTable center" style="width:45%"> 
<table >
<form action="index.php" name="form" method="get">
<input type="hidden" class="" name="action" value="nuevo">
<tr>
  <td><strong>#</strong></td>
  <td><strong>ID
  </strong></td>
  <td><strong>NOMBRE
  </strong></td>
   <td><strong>ESTADO
  </strong></td>

  <td> 
  <?php if (@$_SESSION['ctform']['ct_id']>0) {?>
  <a id="nuevo" href="javascript:;" class="boton verde formaBoton" >AGREGAR</a>
 <?php }?>
  </td>
  </tr>
</form>
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
                        <tr>
                            <td colspan="11" align="center" class="celdaRojo">
                                <?php echo "No Existe Datos para esta consulta!!"; ?>  </td>
                        </tr>
                    <?php }
                    ?>
</table>
    <script type="text/javascript"> 
    
        
$(document).ready(function(){ <!-- --------> ejecuta el script jquery cuando el documento ha terminado de cargarse -->
    
    $("#nuevo").click(function() { <!-- ------> al pulsar (.click) el boton 1 (#b1) -->
                        // recorremos todos los valores...
              var   aCustomers=""  ; 
        //  var idreg=$(this).attr("idreg");
        //  var  causal=$(this).attr("causal");
        //     var actividad=$(this).attr("actividad");         
        // a=$(this).parent().parent();
        //     $("#codigo").val(codigoparcela);
        //     $("#nombre").val(nombrepredio);
        //     $("#actividad").val(actividad);
        //     $("#33").val("");
        //     $("#anho").val("");
        // alert(codigoparcela);    alert(nombrepredio);   alert(actividad);    alert(idreg);
 
        $("#dialogo2").dialog({ <!--  ------> muestra la ventana  -->
            width: 690,  <!-- -------------> ancho de la ventana -->
            height: 520,<!--  -------------> altura de la ventana -->
            show: "scale", <!-- -----------> animación de la ventana al aparecer -->
            hide: "scale", <!-- -----------> animación al cerrar la ventana -->
            resizable: "false", <!-- ------> fija o redimensionable si ponemos este valor a "true" -->
            position: "top",<!--  ------> posicion de la ventana en la pantalla (left, top, right...) -->
            modal: "true", <!-- ------------> si esta en true bloquea el contenido de la web mientras la ventana esta activa (muy elegante) -->
        opacity: 0.9,
         closeOnEscape: false,
          open: function(event, ui) { $(".ui-dialog-titlebar-close").hide(); },
        buttons: {
"Cerrar": function () {
$(this).dialog("close");
location.href="index.php?action=editar&id="+$('#ct_id').val();
}
}
        });
        
    });
    $("#b1").click(function() { <!-- ------> al pulsar (.click) el boton 1 (#b1) -->
        $("#dialogo").dialog({ <!--  ------> muestra la ventana  -->
            width: 590,  <!-- -------------> ancho de la ventana -->
            height: 350,<!--  -------------> altura de la ventana -->
            show: "scale", <!-- -----------> animación de la ventana al aparecer -->
            hide: "scale", <!-- -----------> animación al cerrar la ventana -->
            resizable: "false", <!-- ------> fija o redimensionable si ponemos este valor a "true" -->
            position: "top",<!--  ------> posicion de la ventana en la pantalla (left, top, right...) -->
            modal: "true" <!-- ------------> si esta en true bloquea el contenido de la web mientras la ventana esta activa (muy elegante) -->
        });
        
    });
$("#b2").click(function() {
    $("#dialogo2").dialog({
            width: 590,
            height: 350,
            show: "scale",
            hide: "scale",
            resizable: "false",
            position: "center"      
        });
    });
$("#b3").click(function() {
        $("#dialogo3").dialog({
            width: 590,
            height: 350,
            show: "blind",
            hide: "shake",
            resizable: "false",
            position: "center"      
        });
    });
});
    
    
    </script>
<div id="dialogo" class="ventana" title="Dialogo Modal">
            
            
                
        </div>

        <div id="dialogo2" class="ventana" title="">
            
         <form   action="index.php" method="POST" name="login" id="form" >
                 
                <div id="data" align="center">
                <div class="col plomo" style="height:380px;" >
                <div align="center" ><strong>CARGAR IMAGENES</strong></div>
                    <div class="left-content" >
                    
            
                        <div class="line" ></div>
                    <div class="left" >
                        
                   Seleccionar Documento:

<div id="mulitplefileuploader">Subir</div>

<div id="status"></div>
<script>
$(document).ready(function()
{

var settings = {
    url: "upload.php",
    dragDrop:true,
    multiple:false,   
    fileName: "myfile",
    allowedTypes:"jpg,png,gif", 
    returnType:"json",
     doneStr:"Cargado !",
  extErrorStr:"Solo puedes realizar carga de Imagenes! ",
  uploadErrorStr:"Ocurrio un error al carga. Intentelo de nuevo!",
 
     onSuccess:function(files,data,xhr)
    {
 
       // alert((data));
    },
    showDelete:true,
    onSubmit:function(s,t){
      var id=$('#ct_id').val();
      if (id=="") {
        return false;
      };
        
        return true;
    },
    deleteCallback: function(data,pd)
    {
      var id=$('#ct_id').val();
    for(var i=0;i<data.length;i++)
    {
        $.post("delete.php",{op:"delete",name:data[i],key1:id},
        function(resp, textStatus, jqXHR)
        {
            //Show Message  
            $("#status").append("<div>File Deleted</div>");      
        });
     }      
    pd.statusbar.hide(); //You choice to hide/not.

},
 dynamicFormData: function()
{
    var idreg=$('#ct_id').val();
    var data ={ key1: idreg };
    return data;        
}
}
var uploadObj = $("#mulitplefileuploader").uploadFile(settings);

});
</script>
                       
                    </div>
                   
  
                    </div>
                </div>
                 
</div>
                 
                </form>
                
        </div>

</div>
   <?php 
 if ($totalRows_listado > 0) {
    echo "<p>" . $_pagi_navegacion . "</p>";
       }             ?>
</BODY>
<?php

// The form processor PHP code
function process_si_nuevo_form() {


    if ($_SERVER['REQUEST_METHOD'] == 'POST' && @$_POST['action'] == 'guardar') {
          $_SESSION['ctform'] = array(); // re-initialize the form session data
        // if the form has been submitted
        $ct_id = @$_POST['ct_id']=="" ?0:@$_POST['ct_id'];    // name from the form
        $ct_titulo = @$_POST['ct_titulo'];   // pasword from the form
        $ct_descripcion = @$_POST['ct_descripcion'];    // name from the form
        $ct_fecha = @$_POST['ct_fecha'];   // pasword from the form
        $tipo_noticia= @$_POST['37'];    // name from the form
        $ct_nivel = @$_POST['ct_nivel']; 
         $ct_estado = @$_POST['ct_estado']; 
        $errors = array();  // initialize empty error array
        if (isset($GLOBALS['DEBUG_MODE']) && $GLOBALS['DEBUG_MODE'] == false) {
            // only check for errors if the form is not in debug mode
           //   if (strlen($name) < 5) {
                // name too short, add error
           //       $errors['username_error'] = 'Requiere Nombre de Usuario valido';
            //  }
            //  if (strlen($password) < 5) {
                // no email address given
          //      $errors['password_error'] = 'Requiere pasword de Usuario valido';
            //  }
        }

        if (sizeof($errors) == 0) {
$gest=new GestorNoticias();
$result=pg_fetch_array($gest->guardarNoticias( $ct_id,    $ct_titulo ,    $ct_descripcion,    $ct_fecha_registro=date("Y-m-d H:i:s"),  $inimagen=NULL,      $ct_fecha,    $tipo_noticia ,    $ct_nivel , $ct_estado));
   $_SESSION['ctform']['ct_id'] = $result['id'];    // name from the form
          $_SESSION['ctform']['ct_titulo'] =  $ct_titulo;   // pasword from the form
         $_SESSION['ctform']['ct_descripcion'] =   $ct_descripcion;    // name from the form
         $_SESSION['ctform']['ct_fecha'] =   $ct_fecha;   // pasword from the form
          $_SESSION['ctform']['37'] =  $tipo_noticia;    // name from the form
         $_SESSION['ctform']['ct_nivel'] =   $ct_nivel; 
          $_SESSION['ctform']['ct_estado'] =   $ct_estado; 
            $_SESSION['ctform']['error'] = false;  // no error with form
            $_SESSION['ctform']['success'] = true; // message sent

        } else {
          // save the entries, this is to re-populate the form

          $_SESSION['ctform']['ct_id'] =  $ct_id;    // name from the form
          $_SESSION['ctform']['ct_titulo'] =  $ct_titulo;   // pasword from the form
         $_SESSION['ctform']['ct_descripcion'] =   $ct_descripcion;    // name from the form
         $_SESSION['ctform']['ct_fecha'] =   $ct_fecha;   // pasword from the form
          $_SESSION['ctform']['37'] =  $tipo_noticia;    // name from the form
         $_SESSION['ctform']['ct_nivel'] =   $ct_nivel; 
          $_SESSION['ctform']['ct_estado'] =   $ct_estado; 
            
            $_SESSION['ctform']['error'] = true; // set error floag
        }
    } // POST
}


function process_si_edit_form() {
    

    if ($_SERVER['REQUEST_METHOD'] == 'GET' && @$_GET['action'] == 'editar') {
      $_SESSION['ctform'] = array(); // re-initialize the form session data
        // if the form has been submitted
        $id = @$_GET['id'];    // name from the form
        $errors = array();  // initialize empty error array

        if (isset($GLOBALS['DEBUG_MODE']) && $GLOBALS['DEBUG_MODE'] == false) {
      
          }

          if (sizeof($errors) == 0) {
         $gestornoticia=new GestorNoticias();
         /* predio*/        
         $predio=$gestornoticia->getDataNoticias( $id ,"noticias");
         if ($predio!="") {
            $_SESSION['aux']=$id;
            while ($r = pg_fetch_array($predio)) {              
               
                   $_SESSION['ctform']['ct_id'] =  $r["id"];    // name from the form
          $_SESSION['ctform']['ct_titulo'] =  $r["titulo"];   // pasword from the form
         $_SESSION['ctform']['ct_descripcion'] =   $r["decripcion"];    // name from the form
         $_SESSION['ctform']['ct_fecha'] =   $r["fecha_noticia"];   // pasword from the form
          $_SESSION['ctform']['37'] =  $r["tipo"];    // name from the form
         $_SESSION['ctform']['ct_nivel'] =   $r["nivel"]; 
          $_SESSION['ctform']['ct_estado'] =   $r["estado"]; 
            }
        
            $_SESSION['ctform']['error'] = false;  // no error with form
            $_SESSION['ctform']['success'] = false; // message sent
             $_SESSION['ctform']['edit'] = true; // message sent
        
          }else{
            echo " <script type=\"text/javascript\">
          alertify.error(\"Error :no se encontro predio\");
          </script>";
            $_SESSION['ctform']['error'] = true;  // no error with form
            $_SESSION['ctform']['success'] = false; // message sent
             $_SESSION['ctform']['edit'] = false; // message sent
          }
          
         } else {
            // save the entries, this is to re-populate the form
            echo " <script type=\"text/javascript\">
          alertify.error(\"Error :corrija errores\");
          </script>";
            $_SESSION['ctform']['error'] = true; // set error floag
        }
      
    } // get

}

 unset($_SESSION['ctform']); // clear  value after running
// $_SESSION['ctform']['codpredio']=@$_SESSION['aux'];


?>