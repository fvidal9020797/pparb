<?php
include "../Clases/SuperficieRegistro.php";
session_start();
include "../cabecera.php";
include "page_agricola.php";
//print_r($_SESSION);
?>
<HTML>
<HEAD><TITLE>Llenado de Datos Agricola</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<LINK href="../css/mdryt.css" type=text/css rel=stylesheet>
<link rel="stylesheet" type="text/css" href="../css/button.css"/>
<script language="JavaScript" src="../scripts/funciones.js"></script>
<script language="javascript"   type="text/javascript">

	  	function addRowAgricola(tableID,num_ben) {
     	    var table = document.getElementById(tableID);
 			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);
			var oculto=document.getElementById(num_ben);
			oculto.value=parseInt(oculto.value)+1;

		    var cell1 = row.insertCell(0);   //celda 1
	        var element1 = document.createElement("input");
			element1.type = "checkbox";
            cell1.appendChild(element1);

            var cell2 = row.insertCell(1);   //celda2 CI
            var element2 = document.createElement("select");
  			element2.name ="cultivo0"+String(oculto.value);
			element2.id="cultivo0"+String(oculto.value);
			element2.options[0]=new Option("Elegir..","0");

            for(i=1;i<document.getElementById('Cultivo0').length ;i++)
        	{ element2.options[i]=new Option(document.getElementById('Cultivo0').options[i].text, document.getElementById('Cultivo0').options[i].value);
           	}

            element2.setAttribute('class','boxBusqueda3');
			element2.setAttribute('onChange',"duplicado(this,"+String(oculto.value)+')');
			cell2.appendChild(element2);

			var cell3 = row.insertCell(2);   //celda 3
			var element3 = document.createElement("input");
			element3.type = "text";
			element3.name ="SupVerano0"+String(oculto.value);
			element3.id="SupVerano0"+String(oculto.value);
			element3.setAttribute('onkeypress','blockNonNumbers(this, event, true, false)');
			element3.setAttribute('onkeyup','extractNumber(this,4,false)');
			element3.setAttribute('onchange','sumavertical()');
			element3.setAttribute('class','boxBusqueda3');
			cell3.appendChild(element3);

			var cell4 = row.insertCell(3);   //celda 3
			var element4 = document.createElement("input");
			element4.type = "text";
			element4.name ="SupInvierno0"+String(oculto.value );
			element4.id="SupInvierno0"+String(oculto.value );
			element4.setAttribute('onkeypress','blockNonNumbers(this, event, true, false)');
			element4.setAttribute('onchange','sumavertical()');
			element4.setAttribute('onkeyup','extractNumber(this,4,false)');
			element4.setAttribute('class','boxBusqueda3');
			cell4.appendChild(element4);
			//alert(oculto.value);
       }
		function addRow2(tableID,num_ben) {
	  	    var table = document.getElementById(tableID);
 			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);
			var oculto=document.getElementById(num_ben);
			oculto.value=parseInt(oculto.value)+1;
	        var cell1 = row.insertCell(0);   //celda 1
	        var element1 = document.createElement("input");
			element1.type = "checkbox";
            cell1.appendChild(element1);

            var cell2 = row.insertCell(1);   //celda2
		    var element2 = document.createElement("select");
			element2.name ="cultivo"+String(oculto.value );
			element2.id="cultivo"+String(oculto.value );
			element2.options[0]=new Option("Elegir..","0");

            for(i=1;i<document.getElementById('Cultivo0').length ;i++)
        	{ element2.options[i]=new Option(document.getElementById('Cultivo0').options[i].text, document.getElementById('Cultivo0').options[i].value);}

            element2.setAttribute('class','boxBusqueda3');
			element2.setAttribute('onChange',"duplicado2(this,"+String(oculto.value)+')');
			cell2.appendChild(element2);

			var cell3 = row.insertCell(2);   //celda 3
			var element3 = CreateText("SupVerano1"+String(oculto.value ));
			cell3.appendChild(element3);

			var cell4 = row.insertCell(3);   //celda 3
			var element4 = CreateText("SupInvierno1"+String(oculto.value ));
			cell4.appendChild(element4);

			var cell5 = row.insertCell(4);   //celda 3
			var element5 = CreateText("SupVerano2"+String(oculto.value ));
			cell5.appendChild(element5);

			var cell6 = row.insertCell(5);   //celda 3
			var element6 = CreateText("SupInvierno2"+String(oculto.value));
			cell6.appendChild(element6);

			var cell7 = row.insertCell(6);   //celda 3
			var element7 = CreateText("SupVerano3"+String(oculto.value));
			cell7.appendChild(element7);

			var cell8 = row.insertCell(7);   //celda 3
			var element8 = CreateText("SupInvierno3"+String(oculto.value ));
			cell8.appendChild(element8);

			var cell9 = row.insertCell(8);   //celda 3
			var element9 = CreateText("SupVerano4"+String(oculto.value ));
			cell9.appendChild(element9);

			var cell10 = row.insertCell(9);   //celda 3
			var element10 = CreateText("SupInvierno4"+String(oculto.value ));
			cell10.appendChild(element10);

			var cell11 = row.insertCell(10);   //celda 3
			var element11 = CreateText("SupVerano5"+String(oculto.value ));
			cell11.appendChild(element11);

			var cell12 = row.insertCell(11);   //celda 3
			var element12 = CreateText("SupInvierno5"+String(oculto.value ));
			cell12.appendChild(element12);

			//oculto.value=rowCount + 1;
			//alert(oculto.value);
	   }

	   function CreateText(num1){
		    var element = document.createElement("input");
			element.type = "text";
			element.name =String(num1);//3"+String(rowCount + 1);
			element.id=String(num1);//3"+String(rowCount + 1);
			element.setAttribute('onBlur', 'extractNumber(this,4,false)');
			element.setAttribute('onkeypress','blockNonNumbers(this, event, true, false)');
			element.setAttribute('onkeyup','extractNumber(this,4,false)');
			element.setAttribute('onchange','sumavertical2()');
			element.setAttribute('class','boxBusqueda4');
		     return element;
		   }

	   function duplicado(combo,posicion){
		  try {
				var miArray = new Array();
				var valor=combo.options[combo.selectedIndex].value;
				var numoculto=document.getElementById('num_cul0').value;
				//alert(posicion);
				var aux=""; var count=0;
				//var nombre='Cultivo01';
				for(i=1;i<=numoculto ;i++)
				 {  if(document.getElementById('cultivo0'+i)!=null){
				       aux=document.getElementById('cultivo0'+i).value;
					   if(aux!=0){ miArray[i]=aux; document.getElementById('cultivo0'+i).setAttribute('class','combos'); }
					   else{ document.getElementById('cultivo0'+i).setAttribute('class','comborojo');}
					  }
				 }
				 count=countElementInArray(valor,miArray);
				 if(count>1){document.getElementById('cultivo0'+posicion).setAttribute('class','comborojo'); alert("Existe elemento repetido");}
				 else{document.getElementById('cultivo0'+posicion).setAttribute('class','combos');}
				/* */

			  }catch(e) {
				alert(e);
			}

		}
		function duplicado2(combo,posicion){
		  try {
				var miArray = new Array();
				var valor=combo.options[combo.selectedIndex].value;
				var numoculto=document.getElementById('num_cul').value;

				var aux=""; var count=0;

				for(i=1;i<=numoculto ;i++)
			    {  if(document.getElementById('cultivo'+i)!=null){
					   aux=document.getElementById('cultivo'+i).value;
					   if(aux!=0){ miArray[i]=aux;document.getElementById('cultivo'+i).setAttribute('class','combos'); }
					   else{ document.getElementById('cultivo'+i).setAttribute('class','comborojo');}
				   }
				 }
				 count=countElementInArray(valor,miArray);
				 if(count>1){document.getElementById('cultivo'+posicion).setAttribute('class','comborojo'); alert("Existe elemento repetido");}
				 else{document.getElementById('cultivo'+posicion).setAttribute('class','combos');}

			  }catch(e) {
				alert(e);
			}

		}
		function countElementInArray(element, array){
		  var i, count = 0;
		  for(i in array){
			if(Object.prototype.hasOwnProperty.call(array, i)){
			  if(array[i] instanceof Array) count += countElementInArray(element, array[i]);
			  else if(array[i] === element) count++;
			}
		  }
		  return count;
		}

		function sumavertical(){
		  try {
			    var TotalVerano=0;
				var TotalInvierno=0;
				for(i=1;i<=document.getElementById('num_cul0').value ;i++)
        	     { if(typeof document.getElementById('cultivo0'+i) != 'undefined' && document.getElementById('cultivo0'+i)!=null)
				   { if(document.getElementById('cultivo0'+i).value==0){document.getElementById('cultivo0'+i).setAttribute('class','comborojo');}
				      else{document.getElementById('cultivo0'+i).setAttribute('class','combos');}
				     if( document.getElementById('SupVerano0'+i).value == ""){document.getElementById('SupVerano0'+i).value=0;}
				     if( document.getElementById('SupInvierno0'+i).value == ""){document.getElementById('SupInvierno0'+i).value=0;}
				     TotalVerano=Math.round((parseFloat(TotalVerano)+parseFloat(document.getElementById('SupVerano0'+i).value))*10000)/10000;
				     TotalInvierno=Math.round((parseFloat(TotalInvierno)+parseFloat(document.getElementById('SupInvierno0'+i).value))*10000)/10000;

				   }

				 }
				 document.getElementById('Sup0TotVer').value=TotalVerano;
				 document.getElementById('Sup0TotInv').value=TotalInvierno;
			  }catch(e) {
				alert(e);
			}

		}

		function sumavertical2(){
		  try {
			    var TotalVerano1=0;
				var TotalInvierno1=0;
				var TotalVerano2=0;
				var TotalInvierno2=0;
				var TotalVerano3=0;
				var TotalInvierno3=0;
				var TotalVerano4=0;
				var TotalInvierno4=0;
				var TotalVerano5=0;
				var TotalInvierno5=0;

				for(i=1;i<=document.getElementById('num_cul').value ;i++)
        	     {
				   if(typeof document.getElementById('cultivo'+i) != 'undefined' && document.getElementById('cultivo'+i)!=null)
				   {  //alert(document.getElementById('cultivo'+i).value);
				     if(document.getElementById('cultivo'+i).value==0){document.getElementById('cultivo'+i).setAttribute('class','comborojo');}
				     else{document.getElementById('cultivo'+i).setAttribute('class','combos');}

				     if( document.getElementById('SupVerano1'+i).value == ""){document.getElementById('SupVerano1'+i).value=0;}
				     if( document.getElementById('SupInvierno1'+i).value == ""){document.getElementById('SupInvierno1'+i).value=0;}
				     TotalVerano1=Math.round((parseFloat(TotalVerano1)+parseFloat(document.getElementById('SupVerano1'+i).value))*10000)/10000;
				     TotalInvierno1=Math.round((parseFloat(TotalInvierno1)+parseFloat(document.getElementById('SupInvierno1'+i).value))*10000)/10000;

					 if( document.getElementById('SupVerano2'+i).value == ""){document.getElementById('SupVerano2'+i).value=0;}
				     if( document.getElementById('SupInvierno2'+i).value == ""){document.getElementById('SupInvierno2'+i).value=0;}
				     TotalVerano2=Math.round((parseFloat(TotalVerano2)+parseFloat(document.getElementById('SupVerano2'+i).value))*10000)/10000;
				     TotalInvierno2=Math.round((parseFloat(TotalInvierno2)+parseFloat(document.getElementById('SupInvierno2'+i).value))*10000)/10000;

					 if( document.getElementById('SupVerano3'+i).value == ""){document.getElementById('SupVerano3'+i).value=0;}
				     if( document.getElementById('SupInvierno3'+i).value == ""){document.getElementById('SupInvierno3'+i).value=0;}
				     TotalVerano3=Math.round((parseFloat(TotalVerano3)+parseFloat(document.getElementById('SupVerano3'+i).value))*10000)/10000;
				     TotalInvierno3=Math.round((parseFloat(TotalInvierno3)+parseFloat(document.getElementById('SupInvierno3'+i).value))*10000)/10000;

					 if( document.getElementById('SupVerano4'+i).value == ""){document.getElementById('SupVerano4'+i).value=0;}
				     if( document.getElementById('SupInvierno4'+i).value == ""){document.getElementById('SupInvierno4'+i).value=0;}
				     TotalVerano4=Math.round((parseFloat(TotalVerano4)+parseFloat(document.getElementById('SupVerano4'+i).value))*10000)/10000;
				     TotalInvierno4=Math.round((parseFloat(TotalInvierno4)+parseFloat(document.getElementById('SupInvierno4'+i).value))*10000)/10000;

					 if( document.getElementById('SupVerano5'+i).value == ""){document.getElementById('SupVerano5'+i).value=0;}
				     if( document.getElementById('SupInvierno5'+i).value == ""){document.getElementById('SupInvierno5'+i).value=0;}
				     TotalVerano5=Math.round((parseFloat(TotalVerano5)+parseFloat(document.getElementById('SupVerano5'+i).value))*10000)/10000;
				     TotalInvierno5=Math.round((parseFloat(TotalInvierno5)+parseFloat(document.getElementById('SupInvierno5'+i).value))*10000)/10000;

				   }

				 }
				 document.getElementById('SupTotVer1').value=TotalVerano1;
				 document.getElementById('SupTotInv1').value=TotalInvierno1;
				 document.getElementById('SupTotVer2').value=TotalVerano2;
				 document.getElementById('SupTotInv2').value=TotalInvierno2;
				 document.getElementById('SupTotVer3').value=TotalVerano3;
				 document.getElementById('SupTotInv3').value=TotalInvierno3;
				 document.getElementById('SupTotVer4').value=TotalVerano4;
				 document.getElementById('SupTotInv4').value=TotalInvierno4;
				 document.getElementById('SupTotVer5').value=TotalVerano5;
				 document.getElementById('SupTotInv5').value=TotalInvierno5;
				  //alert(TotalInvierno2);
			  }catch(e) {
				alert(e);
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
<?php
include_once('../scripts/body_handler.inc.php');
?>
<body>


<div align="center" class="texto">
 <form action="N_Agricola.php" method="POST" autocomplete="off" name="formulario" enctype="multipart/form-data" >
  <b><big>III. PRODUCCION DE ALIMENTOS </big></b><br>

    <b class="texto">Predio: <?php echo $_SESSION['nombre_predio'];?> Código: <?php echo $_SESSION['cod_parcela'];?> </b>
<table width="90%" border="0" class='taulaA' align="center">
  <tr>
    <td height="14" colspan="4"><hr></td>
  </tr>
  <tr class="texto_normal">
    <td width="56%" id='blau'><span class="taulaH">1. Superficie para la Producci&oacute;n de Alimentos (Ha)</span></td>
    <td width="56%" align="right" id='blau'>&nbsp;</td>
    <td width="88%" colspan="2">&nbsp;</td>
  </tr>
  <tr class="texto_normal">
    <td colspan="4" id='blau'><table width="100%" border="1" cellspacing="0" class='taulaA'>
      <tr>
        <td rowspan="2" class="cabecera2" id="blau15"><div align="center">Sup. Total Predio</div></td>
        <td  rowspan="2" class="cabecera2" ><div align="center">Sup. Deforestada (Ha. ): </div></td>
        <?php if($_SESSION['Causal']==2){ ?>
        <td  rowspan="2" class="cabecera2" ><div align="center">Sup. P.A.S. (ha.):</div></td>
        <?php } ?>
        <td  rowspan="2" class="cabecera2" ><div align="center">Sup. Prod. Alimentos: </div></td>
        <td colspan="2" class="cabecera2" id="blau15"><div align="center">Prod Alimento Sup. Deforestada (ha.): </div></td>
        <?php if($_SESSION['Causal']==2){ ?>
        <td colspan="2" class="cabecera2"><div align="center">Prod Alimento Sup. P.A.S. (ha.): </div></td>
        <?php }?>
      </tr>
      <tr>
        <td class="cabecera2" id="blau16"><div align="center">Sup. en T.P.F.P.</div></td>
        <td class="cabecera2"><div align="center">Sup. T.U.M.</div></td>
        <?php if($_SESSION['Causal']==2){ ?>
        <td class="cabecera2" id="blau16"><div align="center">Sup. en T.P.F.P.</div></td>
        <td class="cabecera2"><div align="center">Sup. T.U.M.</div></td>
        <?php } ?>
      </tr>
      <tr id="blau4">
        <td id="blau15"><div align="center">
            <input name="Superficie" type="text" class="boxVerde" id="Superficie"  onFocus="siguienteCampo ='FechaFin'" maxlength="10" value="<?php echo isset($_SESSION['datos_bosque']['Superficie']) ? htmlspecialchars($_SESSION['datos_bosque']['Superficie']) : $row_predio['superficie'];?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly >
        </div></td>
        <td ><div align="center">
          <input type="text" name="supdefilegal" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie337']->get_suptotal();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supdefilegal">
        </div></td>
        <?php if($_SESSION['Causal']==2){ ?>
        <td ><div align="center">
            <input type="text" name="suppas" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie502']->get_suptotal();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="suppas">
        </div></td>
        <?php }?>
        <td ><div align="center">
            <input name="SupProdAli" type="text"  id="SupProdAli" class="boxVerde" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  maxlength="15"  value="<?php if(isset($_SESSION['Causal']) && $_SESSION['Causal']==2)
		                {echo $_SESSION['superficie337']->get_supproali()+$_SESSION['superficie502']->get_supproali();}
				 else{ echo $_SESSION['superficie337']->get_supproali(); } ?>"  readonly>
        </div></td>
        <td height="22"  id="blau9"><div align="center">
            <input type="text" name="supalitpfp" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie337']->get_supalitpfp();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supalitpfp">
        </div></td>
        <td ><div align="center">
            <input type="text" name="supalitum" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie337']->get_supalitum();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supalitum">
        </div></td>
        <?php if($_SESSION['Causal']==2){ ?>
        <td ><div align="center">
            <input type="text" name="supalitpfppas" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie502']->get_supalitpfp();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supalitpfppas">
        </div></td>
        <td  id="blau9"><div align="center">
            <input type="text" name="supalitumpas" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie502']->get_supalitum();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supalitumpas">
        </div></td>
        <?php } ?>
      </tr>
    </table></td>
  </tr>
</table>

<table width="90%" border="0" class='taulaA' align="center">
  <tr>
    <td height="14" colspan="2"><hr></td>
  </tr>
  <tr class="texto_normal">
    <td colspan="2" id='blau'><span class="taulaH">2. Uso Actual en &aacute;reas deforestadas ilegales y/o P.A.S (Ha:)</span></td>
  </tr>
  <tr class="texto_normal">
    <td colspan="2" id='blau'><table width="86%" border="0" class='taulaA'>
      <tr >
        <td width="11%" id="blau">Agricola: </td>
        <td width="20%" ><input name="SupActAgri" type="text" class="boxBusqueda4" id="SupActAgri" onChange="SupAlimentos()" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_agricola']['SupActAgri']) ? htmlspecialchars($_SESSION['datos_agricola']['SupActAgri']) :$row_supali['supagricola'] ?>" maxlength="15" ></td>
        <td width="11%" id="blau">Barbecho: </td>
        <td width="11%"><input name="SupActbar" type="text" class="boxBusqueda4" id="SupActbar" onChange="SupAlimentos()" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo  isset($_SESSION['datos_agricola']['SupActbar']) ? htmlspecialchars($_SESSION['datos_agricola']['SupActbar']) :$row_supali['supbarbecho']?>"  maxlength="15"  ></td>
        <td width="11%" id="blau">Descanso</td>
        <td width="11%"><input name="SupActDes" type="text" class="boxBusqueda4" id="SupActDes" onChange="SupAlimentos()" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo  isset($_SESSION['datos_agricola']['SupActDes']) ? htmlspecialchars($_SESSION['datos_agricola']['SupActDes']) :$row_supali['supdescanso']?>" maxlength="15" ></td>
        <td width="11%" id="blau">Ganadera</td>
        <td width="11%"><input name="SupActGan" type="text" class="boxBusqueda4m" id="SupActGan" onChange="SupAlimentos()" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_agricola']['SupActGan']) ? htmlspecialchars($_SESSION['datos_agricola']['SupActGan']) :$row_supali['supganadera'] ?>" maxlength="15"  ></td>
      </tr>
    </table></td>
  </tr>
  <tr class="texto_normal">
    <td colspan="2" id='blau'><span class="taulaH">3. Situacion Actual Agricola &aacute;reas deforestadas ilegales y/o P.A.S :</span></td>
  </tr>
  <tr class="texto_normal">
    <td width="18%" height="33" align="left" id='blau6'><table width="87%" border="0" class='taulaA'>
      <tr>
        <td width="13%" height="41" ><div style="display:none">
            <select name="Cultivo0" onChange="" class="combos" id="Cultivo0" disabled >
              <option value=0>ELEGIR ...</option>
              <?php
		  do {   ?>
              <option value="<?php echo $row_cultivo0['idcultivo']?>"

                 > <?php echo $row_cultivo0['nombrecultivo']?></option>
              <?php } while ($row_cultivo0 = pg_fetch_assoc($cultivo0));	?>
            </select>
        </div></td>
        <td width="54%"><input name="submit2" type="button" class='cabecera2' value="Añadir" onClick="addRowAgricola('dataTable','num_cul0')">
            <input id="num_cul0" name="num_cul0" type="hidden" value="<?php echo isset($_SESSION['datos_agricola']['num_cul0']) ? htmlspecialchars($_SESSION['datos_agricola']['num_cul0']) :$num_culinicial?>" /></td>
        <td width="33%"><input name="submit3" type="button" class='cabecera2' value="Eliminar" onClick="deleteRow('dataTable');sumavertical();"></td>
      </tr>
    </table></td>
    <td width="82%" rowspan="2" align="left" id='blau6'><table width="81%" border="1" class='taulaA' id="dataTable" >
        <tr>
          <td width="15%" class="cabecera2" id="blau2">&nbsp;</td>
          <td width="19%" align="center" class="cabecera2" id="blau2" >Cultivo</td>
          <td width="15%" align="center" class="cabecera2" id="blau2">Sup.Actual Cultivada Verano (Ha.): </td>
          <td width="17%" align="center" class="cabecera2" id="blau2">Sup. Actual Cultivada Invierno (Ha.):</td>
        </tr>
        <?php
         $SupTotVerano0=0;
		 $SupTotInvierno0=0;
		if((isset($_SESSION['datos_agricola']['num_cul0'])&&($_SESSION['datos_agricola']['num_cul0']>0))or (isset($num_culinicial)&& $num_culinicial>0)){
		if(isset($_SESSION['datos_agricola']['num_cul0'])&&($_SESSION['datos_agricola']['num_cul0']>0))
		 {$num=$_SESSION['datos_agricola']['num_cul0'];}
		 else
		 {$num=$num_culinicial;}

		 for ($i = 1; $i <=$num ; $i++) {
		 if(isset($_SESSION['datos_agricola']['cultivo0'.$i])|| isset($row_culinicial['idcultivo'])){

		?>
        <tr>
          <td id="blau3"><input type="checkbox" name="chk2"/></td>
          <td align="center" id="blau3"><select name="<?php echo 'cultivo0'.$i; ?>" onChange="<?php echo 'duplicado(this,'.$i.')'; ?>" class="combos" id="<?php echo 'cultivo0'.$i; ?>" >
              <option value=0 >ELEGIR ...</option>
              <?php
		  ///cambiar este codigo
		  $sql_cultivo0 = "select * FROM cultivo as c Order by nombrecultivo";
		  $cultivo0 = pg_query($cn,$sql_cultivo0) ;
		  $row_cultivo0 = pg_fetch_array ($cultivo0);
		  $totalRows_cultivo0 = pg_num_rows($cultivo0);

		  do {   ?>
              <option value="<?php echo $row_cultivo0['idcultivo']?>"
                <?php  if(isset($_SESSION['datos_agricola']['cultivo0'.$i]) && $_SESSION['datos_agricola']['cultivo0'.$i]== $row_cultivo0['idcultivo']){
											echo " selected";
					    }elseif(isset($row_culinicial['idcultivo']) && $row_culinicial['idcultivo']== $row_cultivo0['idcultivo']){	echo " selected";} ?>
                 > <?php echo $row_cultivo0['nombrecultivo']?></option>
              <?php } while ($row_cultivo0 = pg_fetch_assoc($cultivo0));	?>
          </select></td>
          <td align="center" id="blau3"><input name="<?php echo 'SupVerano0'.$i; ?>" type="text" class="boxBusqueda3"  id="<?php echo 'SupVerano0'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php if(isset($_SESSION['datos_agricola']['SupVerano0'.$i])){ echo $_SESSION['datos_agricola']['SupVerano0'.$i];} else{ echo $row_culinicial['supverano']; $SupTotVerano0=$SupTotVerano0+$row_culinicial['supverano'];} ?>" onChange="sumavertical()"  ></td>
          <td align="center" id="blau3"><input name="<?php echo 'SupInvierno0'.$i; ?>" type="text" class="boxBusqueda3"  id="<?php echo 'SupInvierno0'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value="<?php if(isset($_SESSION['datos_agricola']['SupInvierno0'.$i])){ echo $_SESSION['datos_agricola']['SupInvierno0'.$i];} else{ echo $row_culinicial['supinvierno']; $SupTotInvierno0=$SupTotInvierno0+$row_culinicial['supinvierno'];} ?>" onChange="sumavertical()"  >          </td>
        </tr>
        <?php
			 if(!isset($_SESSION['datos_agricola']['num_cul0']) && isset($row_culinicial)){$row_culinicial = pg_fetch_assoc($culinicial);}
			}
		  }
		 }
		?>
      </table>
      <table width="81%" border="1" class='taulaA' id="dataTable2" >
        <tr>
          <td width="15%" id="blau2">&nbsp;</td>
          <td width="19%" align="center" id="blau2" >TOTAL </td>
          <td width="15%" align="center" id="blau2"><input name="Sup0TotVer"  type="text" class="boxBusqueda3" id="Sup0TotVer" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_agricola']['Sup0TotVer']) ? htmlspecialchars($_SESSION['datos_agricola']['Sup0TotVer']) : $SupTotVerano0;?>" readonly></td>
          <td width="17%" align="center" id="blau2"><input name="Sup0TotInv"  type="text" class="boxBusqueda3" id="Sup0TotInv" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_agricola']['Sup0TotInv']) ? htmlspecialchars($_SESSION['datos_agricola']['Sup0TotInv']) : $SupTotInvierno0;?>" readonly></td>
        </tr>
      </table></td>
  </tr>
  <tr class="texto_normal">
    <td height="34" align="center" id='blau8'>&nbsp;</td>
  </tr>
  <tr class="texto_normal">
    <td colspan="2" id='blau'><span class="taulaH">4. Plan de Produccion Agricola para cinco años &aacute;reas deforestadas ilegales y/o P.A.S: </span></td>
  </tr>
  <tr>
    <td height="38" colspan="2"><table width="81%" border="0" class='taulaA'>
      <tr>
        <td width="11%" id="blau">&nbsp;</td>
        <td width="15%" >&nbsp;</td>
        <td width="15%"><input name="submit5" type="button" class='cabecera2' value="Añadir" onClick="addRow2('dataTable3','num_cul')">
          <input id="num_cul" name="num_cul" type="hidden" value="<?php echo isset($_SESSION['datos_agricola']['num_cul']) ? htmlspecialchars($_SESSION['datos_agricola']['num_cul']) : $num_culfinal ?>" /></td>
        <td width="15%"><input name="submit4" type="button" class='cabecera2' value="Eliminar" onClick="deleteRow('dataTable3');sumavertical2();"></td>
      </tr>
    </table>
      <br>
      <table width="100%" border="1" class='taulaA' id="dataTable3" >

        <tr>
          <td width="5%" class="cabecera2" id="blau">&nbsp;</td>
          <td width="15%" align="center" class="cabecera2" id="blau" >Cultivo</td>

		  <?php

			 if($periodo == 1)
			 {
		  ?>
          <td width="8%" align="center" class="cabecera2" id="blau">Ver. 2014</td>
          <td width="8%" align="center" class="cabecera2" id="blau">Inv. 2014</td>
          <td width="8%" align="center" class="cabecera2" id="blau">Ver. 2015</td>
          <td width="8%" align="center" class="cabecera2" id="blau">Inv. 2015</td>
          <td width="8%" align="center" class="cabecera2" id="blau">Ver. 2016</td>
          <td width="8%" align="center" class="cabecera2" id="blau">Inv. 2016</td>
          <td width="8%" align="center" class="cabecera2" id="blau">Ver. 2017</td>
          <td width="8%" align="center" class="cabecera2" id="blau">Inv. 2017</td>
          <td width="8%" align="center" class="cabecera2" id="blau">Ver. 2018</td>
          <td width="8%" align="center" class="cabecera2" id="blau">Inv. 2018</td>
		  <?php
			 }
			 elseif ($periodo == 2) {
		  ?>
		  <td width="8%" align="center" class="cabecera2" id="blau">Ver. 2016</td>
          <td width="8%" align="center" class="cabecera2" id="blau">Inv. 2016</td>
          <td width="8%" align="center" class="cabecera2" id="blau">Ver. 2017</td>
          <td width="8%" align="center" class="cabecera2" id="blau">Inv. 2017</td>
          <td width="8%" align="center" class="cabecera2" id="blau">Ver. 2018</td>
          <td width="8%" align="center" class="cabecera2" id="blau">Inv. 2018</td>
		  <td width="8%" align="center" class="cabecera2" id="blau">Ver. 2019</td>
          <td width="8%" align="center" class="cabecera2" id="blau">Inv. 2019</td>
		  <td width="8%" align="center" class="cabecera2" id="blau">Ver. 2020</td>
          <td width="8%" align="center" class="cabecera2" id="blau">Inv. 2020</td>

		 <?php
			 }
		  ?>


          </tr>
          <?php
		  $SupTotVerano1=0;$SupTotInvierno1=0;
		  $SupTotVerano2=0;$SupTotInvierno2=0;
		  $SupTotVerano3=0;$SupTotInvierno3=0;
		  $SupTotVerano4=0;$SupTotInvierno4=0;
		  $SupTotVerano5=0;$SupTotInvierno5=0;

		if((isset($_SESSION['datos_agricola']['num_cul'])&&($_SESSION['datos_agricola']['num_cul']>0)) or (isset($num_culfinal) && $num_culfinal>0)){
		if(isset($_SESSION['datos_agricola']['num_cul'])&&($_SESSION['datos_agricola']['num_cul']>0))
		 {$num=$_SESSION['datos_agricola']['num_cul'];}
		 else
		 {$num=$num_culfinal;}

		 for ($i = 1; $i <=$num ; $i++) {
		  if(isset($_SESSION['datos_agricola']['cultivo'.$i])|| isset($row_culfinal['idcultivo'])){
		 ?>
          <tr>
          <td id="blau7"><input type="checkbox" name="chk"/></td>
          <td align="center" id="blau7" ><select name="<?php echo 'cultivo'.$i; ?>" class="combos" onChange="<?php echo 'duplicado2(this,'.$i.')'; ?>"  id="<?php echo 'cultivo'.$i; ?>" >
            <option value=0>ELEGIR ...</option>
            <?php
		  ///cambiar este codigo
		   $sql_cultivo0 = "select * FROM cultivo as c Order by nombrecultivo";
		   $cultivo0 = pg_query($cn,$sql_cultivo0) ;
		   $row_cultivo0 = pg_fetch_array ($cultivo0);
		   $totalRows_cultivo0 = pg_num_rows($cultivo0);

		  do {   ?>
            <option value="<?php echo $row_cultivo0['idcultivo']?>"
                <?php  if(isset($_SESSION['datos_agricola']['cultivo'.$i])&&($_SESSION['datos_agricola']['cultivo'.$i]== $row_cultivo0['idcultivo'])){
											echo " selected";
						}elseif(isset($row_culfinal['idcultivo']) && $row_culfinal['idcultivo']== $row_cultivo0['idcultivo']){	echo " selected";}?>
                 > <?php echo $row_cultivo0['nombrecultivo']?></option>
            <?php } while ($row_cultivo0 = pg_fetch_assoc($cultivo0));?>
          </select>
		 </td>



		 <?php

		 if($periodo == 1)
			 {
		 ?>

          <td align="center" id="blau5"><INPUT name="<?php echo 'SupVerano1'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupVerano1'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php if(isset($_SESSION['datos_agricola']['SupVerano1'.$i])){ echo $_SESSION['datos_agricola']['SupVerano1'.$i];} else{ echo $row_culfinal['supverano1']; $SupTotVerano1=$SupTotVerano1+$row_culfinal['supverano1'];} ?>" onChange="sumavertical2()" ></td>
          <td align="center" id="blau5"><INPUT name="<?php echo 'SupInvierno1'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupInvierno1'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php if(isset($_SESSION['datos_agricola']['SupInvierno1'.$i])){ echo $_SESSION['datos_agricola']['SupInvierno1'.$i];} else{ echo $row_culfinal['supinvierno1']; $SupTotInvierno1=$SupTotInvierno1+$row_culfinal['supinvierno1'];} ?>" onChange="sumavertical2()"></td>

          <td align="center" id="blau5"><INPUT name="<?php echo 'SupVerano2'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupVerano2'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php if(isset($_SESSION['datos_agricola']['SupVerano2'.$i])){ echo $_SESSION['datos_agricola']['SupVerano2'.$i];} else{ echo $row_culfinal['supverano2']; $SupTotVerano2=$SupTotVerano2+$row_culfinal['supverano2'];} ?>" onChange="sumavertical2()"> </td>
          <td align="center" id="blau5"><INPUT name="<?php echo 'SupInvierno2'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupInvierno2'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php if(isset($_SESSION['datos_agricola']['SupInvierno2'.$i])){ echo $_SESSION['datos_agricola']['SupInvierno2'.$i];} else{ echo $row_culfinal['supinvierno2']; $SupTotInvierno2=$SupTotInvierno2+$row_culfinal['supinvierno2'];} ?>" onChange="sumavertical2()" ></td>

          <td align="center" id="blau5"><INPUT name="<?php echo 'SupVerano3'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupVerano3'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php if(isset($_SESSION['datos_agricola']['SupVerano3'.$i])){ echo $_SESSION['datos_agricola']['SupVerano3'.$i];} else{ echo $row_culfinal['supverano3']; $SupTotVerano3=$SupTotVerano3+$row_culfinal['supverano3'];} ?>" onChange="sumavertical2()" ></td>
          <td align="center" id="blau5"><INPUT name="<?php echo 'SupInvierno3'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupInvierno3'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php if(isset($_SESSION['datos_agricola']['SupInvierno3'.$i])){ echo $_SESSION['datos_agricola']['SupInvierno3'.$i];} else{ echo $row_culfinal['supinvierno3']; $SupTotInvierno3=$SupTotInvierno3+$row_culfinal['supinvierno3'];} ?>" onChange="sumavertical2()"></td>

          <td align="center" id="blau5"><INPUT name="<?php echo 'SupVerano4'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupVerano4'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php if(isset($_SESSION['datos_agricola']['SupVerano4'.$i])){ echo $_SESSION['datos_agricola']['SupVerano4'.$i];} else{ echo $row_culfinal['supverano4']; $SupTotVerano4=$SupTotVerano4+$row_culfinal['supverano4'];} ?>" onChange="sumavertical2()" ></td>
          <td align="center" id="blau5"><INPUT name="<?php echo 'SupInvierno4'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupInvierno4'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php if(isset($_SESSION['datos_agricola']['SupInvierno4'.$i])){ echo $_SESSION['datos_agricola']['SupInvierno4'.$i];} else{ echo $row_culfinal['supinvierno4']; $SupTotInvierno4=$SupTotInvierno4+$row_culfinal['supinvierno4'];} ?>" onChange="sumavertical2()" ></td>

          <td align="center" id="blau5"><INPUT name="<?php echo 'SupVerano5'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupVerano5'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php if(isset($_SESSION['datos_agricola']['SupVerano5'.$i])){ echo $_SESSION['datos_agricola']['SupVerano5'.$i];} else{ echo $row_culfinal['supverano5']; $SupTotVerano5=$SupTotVerano5+$row_culfinal['supverano5'];} ?>" onChange="sumavertical2()"></td>
          <td align="center" id="blau5"><INPUT name="<?php echo 'SupInvierno5'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupInvierno5'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php if(isset($_SESSION['datos_agricola']['SupInvierno5'.$i])){ echo $_SESSION['datos_agricola']['SupInvierno5'.$i];} else{ echo $row_culfinal['supinvierno5']; $SupTotInvierno5=$SupTotInvierno5+$row_culfinal['supinvierno5'];} ?>" onChange="sumavertical2()"></td>
          <?php
			 }
		 elseif ($periodo == 2) {
		  ?>
				<td align="center" id="blau5"><INPUT name="<?php echo 'SupVerano1'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupVerano1'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php if(isset($_SESSION['datos_agricola']['SupVerano1'.$i])){ echo $_SESSION['datos_agricola']['SupVerano1'.$i];} else{ echo $row_culfinal['supverano3']; $SupTotVerano1=$SupTotVerano1+$row_culfinal['supverano3'];} ?>" onChange="sumavertical2()" ></td>
				<td align="center" id="blau5"><INPUT name="<?php echo 'SupInvierno1'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupInvierno1'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php if(isset($_SESSION['datos_agricola']['SupInvierno1'.$i])){ echo $_SESSION['datos_agricola']['SupInvierno1'.$i];} else{ echo $row_culfinal['supinvierno3']; $SupTotInvierno1=$SupTotInvierno1+$row_culfinal['supinvierno3'];} ?>" onChange="sumavertical2()"></td>

				<td align="center" id="blau5"><INPUT name="<?php echo 'SupVerano2'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupVerano2'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php if(isset($_SESSION['datos_agricola']['SupVerano2'.$i])){ echo $_SESSION['datos_agricola']['SupVerano2'.$i];} else{ echo $row_culfinal['supverano4']; $SupTotVerano2=$SupTotVerano2+$row_culfinal['supverano4'];} ?>" onChange="sumavertical2()"> </td>
				<td align="center" id="blau5"><INPUT name="<?php echo 'SupInvierno2'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupInvierno2'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php if(isset($_SESSION['datos_agricola']['SupInvierno2'.$i])){ echo $_SESSION['datos_agricola']['SupInvierno2'.$i];} else{ echo $row_culfinal['supinvierno4']; $SupTotInvierno2=$SupTotInvierno2+$row_culfinal['supinvierno4'];} ?>" onChange="sumavertical2()" ></td>

				<td align="center" id="blau5"><INPUT name="<?php echo 'SupVerano3'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupVerano3'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php if(isset($_SESSION['datos_agricola']['SupVerano3'.$i])){ echo $_SESSION['datos_agricola']['SupVerano3'.$i];} else{ echo $row_culfinal['supverano5']; $SupTotVerano3=$SupTotVerano3+$row_culfinal['supverano5'];} ?>" onChange="sumavertical2()" ></td>
				<td align="center" id="blau5"><INPUT name="<?php echo 'SupInvierno3'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupInvierno3'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php if(isset($_SESSION['datos_agricola']['SupInvierno3'.$i])){ echo $_SESSION['datos_agricola']['SupInvierno3'.$i];} else{ echo $row_culfinal['supinvierno5']; $SupTotInvierno3=$SupTotInvierno3+$row_culfinal['supinvierno5'];} ?>" onChange="sumavertical2()"></td>

				<td align="center" id="blau5"><INPUT name="<?php echo 'SupVerano4'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupVerano4'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php if(isset($_SESSION['datos_agricola']['SupVerano4'.$i])){ echo $_SESSION['datos_agricola']['SupVerano4'.$i];} else{ echo $row_culfinal['supverano6']; $SupTotVerano4=$SupTotVerano4+$row_culfinal['supverano6'];} ?>" onChange="sumavertical2()" ></td>
				<td align="center" id="blau5"><INPUT name="<?php echo 'SupInvierno4'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupInvierno4'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php if(isset($_SESSION['datos_agricola']['SupInvierno4'.$i])){ echo $_SESSION['datos_agricola']['SupInvierno4'.$i];} else{ echo $row_culfinal['supinvierno6']; $SupTotInvierno4=$SupTotInvierno4+$row_culfinal['supinvierno6'];} ?>" onChange="sumavertical2()" ></td>

				<td align="center" id="blau5"><INPUT name="<?php echo 'SupVerano5'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupVerano5'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php if(isset($_SESSION['datos_agricola']['SupVerano5'.$i])){ echo $_SESSION['datos_agricola']['SupVerano5'.$i];} else{ echo $row_culfinal['supverano7']; $SupTotVerano5=$SupTotVerano5+$row_culfinal['supverano7'];} ?>" onChange="sumavertical2()"></td>
				<td align="center" id="blau5"><INPUT name="<?php echo 'SupInvierno5'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupInvierno5'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php if(isset($_SESSION['datos_agricola']['SupInvierno5'.$i])){ echo $_SESSION['datos_agricola']['SupInvierno5'.$i];} else{ echo $row_culfinal['supinvierno7']; $SupTotInvierno5=$SupTotInvierno5+$row_culfinal['supinvierno7'];} ?>" onChange="sumavertical2()"></td>

		  <?php
			 }
		  ?>


		  </tr>
          <?php

		 }
		 if(!isset($_SESSION['datos_agricola']['num_cul']) && isset($row_culfinal)){$row_culfinal = pg_fetch_assoc($culfinal); }
		 }
		}
		?>
     </table>
      <table width="100%" border="1" class='taulaA' id="dataTable4" >
         <tr>
          <td width="5%" id="blau">&nbsp;</td>
          <td width="15%" align="center" id="blau" >TOTAL </td>

          <td width="8%" align="center" id="blau"><input name="SupTotVer1"  type="text" class="boxBusqueda4" id="SupTotVer1" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_agricola']['SupTotVer1']) ? htmlspecialchars($_SESSION['datos_agricola']['SupTotVer1']) : $SupTotVerano1;?>" readonly></td>
          <td width="8%" align="center" id="blau"><input name="SupTotInv1"  type="text" class="boxBusqueda4" id="SupTotInv1" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_agricola']['SupTotInv1']) ? htmlspecialchars($_SESSION['datos_agricola']['SupTotInv1']) : $SupTotInvierno1;?>" readonly></td>

          <td width="8%" align="center" id="blau"><input name="SupTotVer2"  type="text" class="boxBusqueda4" id="SupTotVer2" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_agricola']['SupTotVer2']) ? htmlspecialchars($_SESSION['datos_agricola']['SupTotVer2']) : $SupTotVerano2;?>" readonly></td>
          <td width="8%" align="center" id="blau"><input name="SupTotInv2"  type="text" class="boxBusqueda4" id="SupTotInv2" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_agricola']['SupTotInv2']) ? htmlspecialchars($_SESSION['datos_agricola']['SupTotInv2']) : $SupTotInvierno2;?>" readonly></td>

          <td align="center" id="blau"><input name="SupTotVer3"  type="text" class="boxBusqueda4" id="SupTotVer3" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_agricola']['SupTotVer3']) ? htmlspecialchars($_SESSION['datos_agricola']['SupTotVer3']) : $SupTotVerano3;?>" readonly></td>
          <td align="center" id="blau"><input name="SupTotInv3"  type="text" class="boxBusqueda4" id="SupTotInv3" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_agricola']['SupTotInv3']) ? htmlspecialchars($_SESSION['datos_agricola']['SupTotInv3']) : $SupTotInvierno3;?>" readonly></td>

          <td width="8%" align="center" id="blau"><input name="SupTotVer4"  type="text" class="boxBusqueda4" id="SupTotVer4" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_agricola']['SupTotVer4']) ? htmlspecialchars($_SESSION['datos_agricola']['SupTotVer4']) : $SupTotVerano4;?>" readonly></td>
          <td width="8%" align="center" id="blau"><input name="SupTotInv4"  type="text" class="boxBusqueda4" id="SupTotInv4" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_agricola']['SupTotInv4']) ? htmlspecialchars($_SESSION['datos_agricola']['SupTotInv4']) : $SupTotInvierno4;?>" readonly></td>

          <td width="8%" align="center" id="blau"><input name="SupTotVer5"  type="text" class="boxBusqueda4" id="SupTotVer5" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_agricola']['SupTotVer5']) ? htmlspecialchars($_SESSION['datos_agricola']['SupTotVer5']) : $SupTotVerano5;?>" readonly></td>
          <td width="8%" align="center" id="blau"><input name="SupTotInv5"  type="text" class="boxBusqueda4" id="SupTotInv5" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_agricola']['SupTotInv5']) ? htmlspecialchars($_SESSION['datos_agricola']['SupTotInv5']) : $SupTotInvierno5;?>" readonly></td>




		</tr>
      </table>      </td>
  </tr>

  <tr class="texto_normal">
    <td colspan="2"><hr></td>
  </tr>
  <tr class="texto_normal">
    <td colspan="2" id='blau'><table width="100%" border="0">
      <tr>
        <td width="11%"><span class="taulaH">5. Observaciones:</span></td>
        <td width="89%" rowspan="2"><textarea name="RObservacion" id="RObservacion" cols="110" rows="4"><?php echo trim($row_obser['obsregistro']);?></textarea></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
<br>


<input name="submit" type="submit" class='boton verde formaBoton' value="Guardar">
</form>
<?php include "../foot.php";?>
</div>
</BODY></HTML>
