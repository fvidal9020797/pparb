<?php 
include "../Valid.php";
include "../Registro/destroy_predio.php";


require_once $_SERVER['DOCUMENT_ROOT'] . '/sistema/config/config.php';

require_once APPPATH . '/scripts/Codificadores.php';
$codigicador=new Codificadores();
require_once APPPATH . '/Registro/GestorRegistro.php';
$gestregistro=new GestorRegistro();

$DatosPredioAll=pg_fetch_array($gestregistro->getDatosPredioAll( $_GET['idreg']));

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
$(window).keypress(function(e) {
    if(e.keyCode == 13) {
        //haz lo que quieras cuando presionene enter
      //  document.form.submit();
    }
});
</script>
<BODY>
<div align="center">
 <div id="data" align="center">

 <div align="center" ><strong> INFORMACION GENERAL DEL PREDIO</strong></div>
 <div style="height:120px;" class="col plomo">
 <div class="left-half-content">
 <!-- <div class="left" ><strong> Información General</strong></div> -->
 <div class="line"></div>
<div class="left" >
 <div class="left-text" >C&oacute;digo Parcela:</div>
         <div class="right-text"><input name="Codigo" type="text" class="boxRojo"  id="Codigo" value="<?php echo $DatosPredioAll['ID PARCELA'] ?> " maxlength="10" readonly>
         <input name="idreg" type="hidden" class="boxRojo"  id="idreg" value="<?php echo $DatosPredioAll['ID REGISTRO'] ?> " maxlength="10" readonly></div>
 </div>
  <div class="line"></div>
  <div class="left" >
        <div class="left-text" >Nombre del Predio: </div>
        <div class="right-text"><?php echo  $DatosPredioAll['NOMBRE PREDIO']?> </div>
 </div>
   <div class="left" >
        <div class="left-text" >Representante legal: </div>
        <div class="right-text"><?php echo  $DatosPredioAll['REPRESENTANTE NOMBRE']?> </div>
 </div>
 <div class="line"></div>

  </div>
 <div class="right-half-content">
 <!-- <div class="left" ><strong> Información General</strong></div> -->
 <div class="line"></div>
 <div class="left" >
        <div class="left-text" >Ubicación: </div>
           <div class="right-text"><?php echo $DatosPredioAll['DEPARTAMENTO']."-".$DatosPredioAll['PROVINCIA']."-".$DatosPredioAll['MUNICIPIO'] ?> </div>
    </div>       
 <div class="line"></div>
     <div class="left-half">
        <div class="left-text" >Sup. Total del Predio :</div>
        <div class="right-text"><?php echo $DatosPredioAll['SUP TOTAL']."Ha." ?></div>
    </div>  
    <div class="right-half">
        <div class="left-text" >Actividad del Predio:</div>
           <div class="right-text"><?php echo $DatosPredioAll['ACTIVIDAD'] ?></div>
  </div>
  </div>

  </div>

</div>
<div align="center" class="texto">
<p>
   <h1>LISTA DE DOCUMENTOS ESCANEADOS</h1>
  
</p>
</div>
 <div class="CSSTable" > 
<table >
<form action="index.php" name="form" method="get">
<input type="hidden" class="" name="action" value="nuevo">
<tr>
  <td><strong>#</strong></td>
  <td><strong>ID
  </strong></td>
  <td><strong>NOMBRE
  </strong></td>
   <td><strong>TIPO
  </strong></td>
  <td><strong>FECHA DE CARGA
  </strong></td>
  
  <td> <a id="nuevo" href="javascript:;" class="boton verde formaBoton" >AGREGAR</a></td>
  </tr>
</form>
<?php 
     $sql_listado="Select d.*, c.nombrecodificador as tipo FROM documentos d, codificadores c where d.tipodocumento=c.idcodificadores and estado<>0 and idregistro=".$_GET['idreg'];
///////////////BUSQUEDA///////////////////
if ( isset($_GET['buscar1'])){
   
            $sql_listado="Select * FROM documentos";
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
 if ($totalRows_listado > 0) {
do { 



?>
<tr  align="center">
  <td width="2%"><?php echo trim($con);?></td>
  <td width="2%"><?php echo trim($row_listado['iddocumentos']);?></td>
  <td width="10%"><?php echo trim($row_listado['nombredocumento']);?></td>
  <td width="15%"><?php echo trim($row_listado['tipo']);?></td>
   <td width="4%"><?php echo trim($row_listado['fecharegistro']);?></td>
     
  <td width="5%">    
   <a TARGET="_blank" name="descargar" class="monitoreo" href="REGISTROS/<?php echo $row_listado['idregistro'].'/'.$row_listado['nombredocumento'];?>" ><image width="19"  src="../images/descargar.png"/></a>
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
location.href="index.php?action=nuevo&idreg="+$('#idreg').val();
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
                <div align="center" ><strong>CARGAR DOCUMENTOS ESCANEADOS</strong></div>
                    <div class="left-content" >
                    
                    <div class="line" ></div>
                    <div class="left" >

                    <?php   echo $codigicador->getByClasificador(34, "required");?>
                    </div>
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
    allowedTypes:"jpg,png,gif,doc,docx,pdf,zip", 
    returnType:"json",
     doneStr:"Cargado !",
  extErrorStr:"Solo puedes realizar carga de archivos! ",
  uploadErrorStr:"Ocurrio un error al carga. Intentelo de nuevo!",
 
     onSuccess:function(files,data,xhr)
    {
 $( "#34" ).val("");
      //  alert((data));
    },
    showDelete:true,
    onSubmit:function(s,t){
      var id=$('#idreg').val();
       var tipo=$( "#34" ).val();
      if (id=="") {
        return false;
      };
        if (tipo=="") {
          alert("Debe seleccionar tipo de documento");
        return false;
      };
        return true;
    },
    deleteCallback: function(data,pd)
    {
      var id=$('#idreg').val();
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
    var idreg=$('#idreg').val();
  var tipo=$( "#34" ).val();
    var data ={ key1: idreg, key2: tipo };
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
   <?php  echo "<p>" . $_pagi_navegacion . "</p>";
                    ?>
</BODY>
<?php
if(isset($_GET["msg"]))
    {$msg="<script>alert('Predio ";
     $msg=$msg.$_GET["msg"];
     $msg=$msg." Eliminado y toda su información relacionada')</script>";
     echo $msg; 
    }
if(isset($_GET["msg2"]))
    {$msg="<script>alert('Predio ";
     $msg=$msg.$_GET["msg2"];
     $msg=$msg." ha cambiado su estado')</script>";
     echo $msg; 
    }
?>
