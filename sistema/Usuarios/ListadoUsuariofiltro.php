<?php session_start();
set_time_limit(5000);
 include "../Valid.php";
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1"))
{
  $msg="";
  if($_POST['submit']=='Guardar'){



	}//if guardar
} else{
		$sql_usuario= "select p.idpersona,p.nombre1,p.nombre2,p.apellidopat,p.apellidomat,p.noidentidad,c.nombrecodificador FROM persona as p, funcionario as f,codificadores as c where f.cargo=c.idcodificadores and p.idpersona=f.idpersona";
		$usuario = pg_query($cn,$sql_usuario) ;
		$row_usuario = pg_fetch_array ($usuario);
}

?>
<HTML>
<HEAD><TITLE>Llenado de Datos Agricola</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<LINK href="../css/mdryt.css" type=text/css rel=stylesheet>
<script language="JavaScript" src="../scripts/funciones.js"></script>
<script type="text/javascript">
  // Almaceno los datos de la tabla que leo, la primera posicion indica si se debe mostrar o no, y la segunda posicion contiene los datos de la fila
  var datos = new Array();
  // Almaceno la cabecera de la tabla
  var cabecera = new Array();
  // Columna seleccionada para ordenar
  var seleccionado = 0;
  // Si el orden es ascendente/descendente en cada columna
  var orden = new Array(true, true, true);
  // El contenido de cada uno de los filtros
  var filtros = new Array("", "", "");
  // Indice del filtro actual
  var filtrado = 0;

  // Lee la tabla y guarda los datos y modifica la cabecera para incluir el orden y el filtro
  function transformar() {
	// Obtengo la tabla
    var tabla = document.getElementById("tabla");

	// Almaceno y modifico la cabecera, añadiendo el orden y el filtro
	var cab = tabla.rows[0];
    for (var i=0; i<cab.cells.length; i++) {
		cabecera[i] = cab.cells[i].innerHTML;
		cab.cells[i].innerHTML = (i != seleccionado) ?
			'<a href="javascript:ordenar('+i+')">'+cab.cells[i].innerHTML+'<img src="ord-no.gif" alt="NO" /></a>' :
			(orden[i]? '<a href="javascript:ordenar('+i+')">'+cab.cells[i].innerHTML+'<img src="ord-des.gif" alt="DES" /></a>' :
			           '<a href="javascript:ordenar('+i+')">'+cab.cells[i].innerHTML+'<img src="ord-asc.gif" alt="ASC" /></a>');
		cab.cells[i].innerHTML += '<br /><input type="text" id="filtro'+i+'" class="filtro" maxlength="10" onkeyup="filtro(event, '+i+')" value="'+filtros[i]+'" autocomplete="off"/>';
	}

	// Guardo los datos de la tabla y marco filas alternas
    for (var i=1; i<tabla.rows.length; i++) {
      if (i%2 == 0) {
        tabla.rows[i].className = "par";
	  }
	  var aux = new Array();
	  for (var j=0; j<tabla.rows[i].cells.length; j++) {
	    aux[j] = tabla.rows[i].cells[j].innerHTML;
	  }
	  datos[datos.length] = new Array(true, aux);
    }
  }

	// Funcion que ordena las filas segun la columna que se haya pulsado
	function organizar(a, b) {
		var signo = orden[seleccionado]? 1:-1;
		return (a[1][seleccionado] > b[1][seleccionado]) ? signo : -signo;
	}


  // Ordena y dibuja la tabla
  function ordenar(i) {
    var tabla = document.getElementById("tabla");

	// si es la misma col se cambia el sentido
	if (seleccionado == i) {
		orden[seleccionado] = !orden[seleccionado];
	} else {
		orden[seleccionado] = true;
		seleccionado = i;
	}

	// Se ordena la tabla y se dibuja
	datos.sort(organizar);
	dibujarTabla();
  }


  // Filtra las filas segun el contenidos de los filtros de cada columna
  function filtro(evt, pos) {
	for (var i=0; i<datos.length; i++) {
		datos[i][0] = true;
		for (var j=0; j<datos[i][1].length; j++) {
			var txt = document.getElementById("filtro"+j).value;
			filtros[j] = txt;
			if (txt != "") {
				// Puede fallar si se usa una expresion regular incompleta
				try {
					datos[i][0] &= eval('datos[i][1][j].match(/'+txt+'/i) != null');
				} catch (error) {}
			}
		}
	}

	filtrado = pos;
	// dibujo la tabla
	dibujarTabla();
	// Selecciono la caja de texto del filtro actual
	var obj = document.getElementById("filtro"+filtrado);
	obj.focus();
	// Coloco el cursor al final de texto
	if (obj.createTextRange) {
		var r = obj.createTextRange();
		r.moveStart("character", obj.value.length+1);
		r.moveEnd("character", obj.value.length+1);
		r.select();
	} else if (obj.setSelectionRange) {
		obj.setSelectionRange(obj.value.length+1, obj.value.length+1);
	}

  }

  // Dibuja la tabla
  function dibujarTabla() {
    var _tabla = document.getElementById("tabla");

	// Me creo una copia de la tabla
	var tabla = document.createElement("TABLE");
	tabla.id = "tabla";
	tabla.border = "1";
	tabla.setAttribute("class","taulaA");
	tabla.setAttribute("align","center");
	tabla.setAttribute("width","100%");
	tabla.setAttribute("cellspacing","0");
	tabla.setAttribute("cellpadding", "2");

	// Creamos los THs
	var tr = document.createElement("TR");

	for (var i=0; i<3; i++) {
		var th = document.createElement("TH");
				th.innerHTML = ((i != seleccionado) ?
			'<a href="javascript:ordenar('+i+')">'+cabecera[i]+ '<img src="ord-no.gif" alt="NO" /></a>' :
			(orden[i]? '<a href="javascript:ordenar('+i+')">'+cabecera[i]+ '<img src="ord-des.gif" alt="DES" /></a>' :
			           '<a href="javascript:ordenar('+i+')">'+cabecera[i]+ '<img src="ord-asc.gif" alt="ASC" /></a>'));
		th.innerHTML += '<br /><input type="text" id="filtro'+i+'" class="filtro" maxlength="15" aling="right" class="boxBusqueda3" onkeyup="filtro(event, '+i+')" value="'+filtros[i]+'" autocomplete="off"/>';

		tr.appendChild(th);

		tr.setAttribute("class","taulaD");
	}

	tabla.appendChild(tr);

	// Creamos los TRs
	var cont = 0;
	for (var i=0; i<datos.length; i++) {
		if (datos[i][0]) {
			var tr = document.createElement("TR");
			tr.className = (cont%2==0)? "":"par";
			cont++;
			for (var j=0; j<datos[i][1].length; j++) {
				var td = document.createElement("TD");
			/*if(j==5){'<a href=N_Usuario.php?cod='+datos[i][1][j].' >';
				td.innerHTML = datos[i][1][j];
				'</a>';}
				else{*/
					td.innerHTML = datos[i][1][j];
				//	}
				td.setAttribute("id","blau");
				tr.appendChild(td);

			}
			tabla.appendChild(tr);
		}
	}

	// Reemplazo la tabla actual por la nueva
	var padre = _tabla.parentNode;
	padre.replaceChild(tabla, _tabla);

	// ¿¿PERO QUE ES ESTO?? SI NO LO HAGO NO FUNCIONA EN EL INTERNET EXPLORER
	padre.innerHTML=padre.innerHTML+"<div></div>";

	// Situo el fondo del filtro para saber en que estado está
	for (var i=0; i<filtros.length; i++) {
		var obj = document.getElementById("filtro"+i);
		if (filtros[i].length > 3) {
			obj.style.backgroundPosition = "88px -45px";
		} else {
			obj.style.backgroundPosition = "88px -"+(filtros[i].length*15)+"px";
		}
	}


  }
</script>
<script languaje="Javascript">
<!--

document.write('<style type="text/css">div.ocultable{display: none;}</style>');
function MostrarOcultar(capa,enlace)
{
	if (document.getElementById)
	{
		var aux = document.getElementById(capa).style;
		aux.display = aux.display? "":"block";
	}
}

//-->
</script>
</head>
<body onload="transformar()">

<div align="center" class="texto">
<form action="N_Usuario.php" method="POST" name="formulario" enctype="multipart/form-data" >
<br>
<b><big> ADMINISTRACION DE USUARIOS </big></b><br>
<table width="90%" border="0" class='taulaA' align="center">
  <tr>
    <td width="56%" height="14"><hr></td>
  </tr>
  <tr class="texto_normal">
    <td id='blau4'><span class="taulaH">1. Datos de Persona:</span></td>
  </tr>
  <tr class="texto_normal">
    <td id='blau3'><table width="100%" id="tabla" border="1" class='taulaA'>
      <tr class="taulaD">
        <td align="center" id="blau">CI: </td>
        <td align="">Nombre</td>
        <td align="center" id="blau">Cargo</td>
        </tr>
      <?php do{?>
      <tr>
        <td id="blau"><?php echo $row_usuario['noidentidad']; ?></td>
        <td id="blau"><?php echo $row_usuario['nombre1']."-".$row_usuario['nombre2']."-".$row_usuario['apellidopat']."-".$row_usuario['apellidomat']; ?></td>
        <td id="blau"><?php echo $row_usuario['nombrecodificador']; ?></td>
        </tr>
        <?php } while ($row_usuario = pg_fetch_assoc($usuario));?>
      </table></td>
  </tr>
  </table>
<br>
<input type="hidden" name="MM_insert" value="form1" />
<input name="submit" type="submit" class='cabecera2' value="Guardar">
</form>
<?php pg_close($cn);
?>
</div>
</BODY></HTML>
