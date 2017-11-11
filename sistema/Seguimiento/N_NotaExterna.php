
<?php
 session_start();

//print_r($_SESSION);

if(isset($_GET['nuevo'])){
  include "../Registro/destroy_predio.php";
  $_SESSION['habilitar']=0;
}

include "../cabecera.php";

include "page_nota_externa.php";
include "page_nota_rcia_puntaje.php";


include "../reportes/Formulario_Nota_Externa.php";


if(!isset($_SESSION['MM_Rol']))
{   $sql_roles = " Select idtarea From usuarios where idfuncionario=".$_SESSION['MM_UserId'];
    $roles = pg_query($cn,$sql_roles);
	$row_roles = pg_fetch_array ($roles);
	$MM_Rol="";
	do{
	$MM_Rol=$MM_Rol."-".$row_roles['idtarea'];
	} while ($row_roles = pg_fetch_assoc($roles));
	$_SESSION['MM_Rol']=$MM_Rol;
}


if(isset($_REQUEST['Imprimir']))
{
   $identificadorNota = intval($_REQUEST['idnotaext']);
   $_SESSION['datos_nota_ext']['idnotaext']=$identificadorNota;
   ImprimirNota($identificadorNota);
}

?>
<HTML>
<HEAD><TITLE>UCAB - PPARB</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<LINK href="../css/mdryt.css" type=text/css rel=stylesheet>
<link rel="stylesheet" type="text/css" href="../css/button.css"/>
<script language="JavaScript" src="../scripts/funciones.js"></script>
<link rel="stylesheet" type="text/css" href="../css/button.css" />
<link rel="stylesheet" href="../css/jquery-ui.css" />
 <script src="../libraries/jquery-1.10.3/jquery-1.10.2.min.js"></script>
<script src="../libraries/jquery-1.10.3/jquery-1.10.3.ui.min.js"></script>

<script language="JavaScript">
var rcia = 0;

function mostraropcionrcia(seleccion) { //es para la opcion de derivar rcia para evaluacion
	try
    {

		  if (seleccion.checked)
      {
			   document.getElementById("opcionrcia").style.display = "block";
		  }
      else
      {
        document.getElementById("opcionrcia").style.display = "none";
        //document.getElementById(identificador+'f1').checked = "";
      }
		}
    catch(e)
    {
			alert(e);
		}
	}


  function mostrartablarcia(seleccion) {
  	try
      {
        //alert(seleccion);
  		  if (seleccion.checked)
        {
            rcia = 1;
  			   document.getElementById("notasrcia").style.display = "block";
           document.getElementById("notasext").style.display = "none";
  		  }
        else
        {
            rcia = 0;
          document.getElementById("notasrcia").style.display = "none";
          document.getElementById("notasext").style.display = "block";
        }
  		}
      catch(e)
      {
  			alert(e);
  		}
  	}




/*function lanzarSubmenu()
		{

      if (document.getElementById('chkrciapuntaje').checked) {
          window.open("N_rcias_recibidos.php","Seleccionar RCIAS","width=1500,height=500,scrollbars=yes,toolbar=no,status=no");
      }
      else
      {
          window.open("N_SolicitudExt.php","Elegir Notas o Solitudes","width=1500,height=500,scrollbars=yes,toolbar=no,status=no");
      }
    }
*/
function lanzarSubmenu()
		{
      try{
        if (document.getElementById('chkrciapuntaje').checked) {

          var aaa = 0

          if (document.getElementById('puntajecampo').checked)
          {
            aaa = 1;
          }

          window.open("N_rcias_recibidos.php?tipocampo="+aaa,"Seleccionar RCIAS","width=1500,height=500,scrollbars=yes,toolbar=no,status=no");

        }
        else
        {
          window.open("N_SolicitudExt.php","Elegir Notas o Solitudes","width=1500,height=500,scrollbars=yes,toolbar=no,status=no");
        }
      }
      catch (err){
        window.open("N_SolicitudExt.php","Elegir Notas o Solitudes","width=1500,height=500,scrollbars=yes,toolbar=no,status=no");
      }

    }
    $(function() {
        $("#fechaderiv").datepicker({
            changeMonth: true,
            changeYear: true,
            maxDate: "+5y +1M +10D",
            dateFormat: "yy-mm-dd"
        });

    });

    $(function() {
        $("#fechanotarcia").datepicker({
            changeMonth: true,
            changeYear: true,
            maxDate: "+5y +1M +10D",
            dateFormat: "yy-mm-dd"
        });

    });



function recontarIndice() {

  var rciaaux = document.getElementById('esrcia');
  var aa = parseInt(rciaaux.value);

    if (aa == 100)
    {
          var table = document.getElementById('rciaspuntajes');
    }
    else
    {
          var table = document.getElementById('segui');
    }



    contador=1;

    for (var i = 0, row; row = table.rows[i]; i++) {
        for (var j = 0, col; col = row.cells[j]; j++) {
            if (i > 0) {
                col.innerHTML = contador;
                contador=contador+1;
            }
            break;
        }
    }



}



 function eliminarfilas() {

         var table = document.getElementById('segui');

         try {
              //alert(tableID);
             //var table = document.getElementById(tableID);
             var rowCount = table.rows.length;
             for(var i=0; i<rowCount; i++) {
                 var row = table.rows[i];
                 var chkbox = row.cells[1].childNodes[0];
                 if(null != chkbox && true == chkbox.checked) {
                   table.deleteRow(i);
                   rowCount--;
                   i--;
                 }
                }

           }catch(e)
            {
             alert(e);
           }

      recontarIndice();

}


function eliminarfilaspuntaje(fil,np,ar) {

  //alert('elimina');


  if (confirm('¿Esta Seguro que desea eliminar el RCIA del predio'+ np+' de la Gestion '+ar+' ?'))
   {

     var table = document.getElementById('rciaspuntajes');
     var ch = document.getElementById('checkbox'+fil);
     ch.setAttribute('checked','checked');

     try {
         var rowCount = table.rows.length;
         for(var i=0; i<rowCount; i++) {

             var row = table.rows[i];
             var chkbox = row.cells[13].childNodes[0];

             if(null != chkbox && true == chkbox.checked) {
               table.deleteRow(i);
               alert('RCIA Eliminado Exitosamente');
               //break;
               rowCount--;
               i--;
             }
            }

       }catch(e)
        {
         alert(e);
       }


  recontarIndice();


   }

  else
   {
     alert("Tarea Cancelada");
   }







}


</script>


<style type="text/css">
#principal
	{ 	position:relative;
		margin:10px auto;
	}
#derecha
	{   position:relative;
		color:#FFFFFF;
		z-index:200;
		top:300;
		width:250;
		background-color:#000000;
	}



</style>

</HEAD>
<?php
include_once('../scripts/body_handler.inc.php');
?>

<BODY>

<div align="center">

  <?php
  if  (isset($_SESSION['datos_nota_ext']['idnotaext']) && $_SESSION['datos_nota_ext']['idnotaext']!="")
  {
  ?>
      <div align="center" class="texto">
          <b><big>EDITAR NOTA</big></b>
      </div>
  <?php
} else {
  ?>
        <div align="center" class="texto">
            <b><big>NUEVA NOTA</big></b>
        </div>
  <?php
    }
  ?>



<form action="N_NotaExterna.php" method="POST" name="formulario" enctype="multipart/form-data" autocomplete="off" onSubmit="return valida(this);">

<div>

    <?php if(!(strrpos($_SESSION['MM_Rol'],'6')== false)){?>

    <div align="center" id="blau3">ENVIAR RCIAS EVALUADOS A LA UCAB (Rcias con Puntuacion):

    <input  style="width:20px; height:20px; vertical-align:top;" type="checkbox" id="chkrciapuntaje" name="chkrciapuntaje" value="check"
    onChange="mostrartablarcia(this);"
    <?php if (isset($_SESSION['datos_nota_rcia_puntaje']['chkrciapuntaje'])){ if (!(empty($_SESSION['datos_nota_rcia_puntaje']['chkrciapuntaje']))) { if($_SESSION['datos_nota_rcia_puntaje']['chkrciapuntaje']==100 ){ echo " checked='checked' ";}  }}  ?> >




    <input type="hidden" id="esrcia" name="esrcia" value="<?php echo  isset($_SESSION['datos_nota_rcia_puntaje']['chkrciapuntaje']) ? htmlspecialchars($_SESSION['datos_nota_rcia_puntaje']['chkrciapuntaje']) : ""; ?>">



    </div>
    <?php } ?>





  <?php
        include "N_tabla_notas_seleccionadas.php";

        include "N_tabla_rcias_puntaje.php";
  ?>

</div>






<SCRIPT>
    recontarIndice();
    </Script>

</form>
</div>
<?php include "../foot.php";?>

</BODY></HTML>
