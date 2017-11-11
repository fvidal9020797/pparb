<?php
//print_r($_SESSION);
?>


<script language="javascript"   type="text/javascript">

//var fruits = ["Banana", "Orange", "Apple", "Mango"];
var varEliminados = [];
//varEliminados.push("Kiwi");
//alert(varEliminados);

function deleteRow10(tableID) {    
    
tab = document.getElementById(tableID);
 
       var id_select="";
       var value_select="";
   $('#dataTable4 tbody tr').each(function (index2) {
       
       var pksw = $(this).find("td").eq(0).find("input").eq(0).is(':checked');
        var pk = $(this).find("td").eq(0).find("input").eq(0).attr("id");
        //var nombre = $(this).find("td").eq(1).html();
        var nombre = $(this).find("td").eq(1).find("select").eq(0).attr("id");
         
         if(pksw){
            // alert("si chekc");
            id_select= $(this).find("td").eq(1).find("select").eq(0).attr("id");
            value_select = $(this).find("td").eq(1).find("select").eq(0).val();
            //alert(value_select);
            varEliminados.push(value_select);
         }
       /* if (index2>=0){
            alert(pk);
            alert(nombre);             
        }*/
        
    }); 
        
  
    /*if( $('#chk1').is(':checked') ) {
      alert('Seleccionado');
    }*/  //attr("id");
 
	try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
            var indice=1;
            //for (var x = 1; x <= 2; x++) {

                      for(var i=0; i<rowCount; i++) {
                        
                                            var row = table.rows[i];
                                            var chkbox = row.cells[0].childNodes[0];
                                           // var chkbox1 = row.cells[i].childNodes[0];
                                         
                                          //  alert(chkbox1);
                                            row.cells
                                            if(null != chkbox && true == chkbox.checked) {
                                                   // alert(indice+"-"+i);
                                                     var cbocultivo = row.cells[1].childNodes[0];
                                                
                                                    table.deleteRow(i+1);
                                                    table.deleteRow(i);
                                                    rowCount = rowCount - 2;
                                                    i = i - 2;
                                                    indice=indice+1;
                                            }
                                     }  

            //	}

            }catch(e) {
                    alert(e);
            }



document.getElementById("celiminados").value=varEliminados;




}



		function addRow2(tableID,num_ben) {

			var table = document.getElementById(tableID);
 			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);
			var oculto=document.getElementById(num_ben);
			oculto.value=parseInt(oculto.value)+1;


			var cell1 = row.insertCell(0);   //celda 1
			cell1.setAttribute("rowspan","2");
	    var element1 = document.createElement("input");
		  element1.type = "checkbox";
      cell1.appendChild(element1);


      var cell2 = row.insertCell(1);   //celda2
			cell2.setAttribute("rowspan","2");
		  var element2 = document.createElement("select");
			element2.setAttribute("class","combos");
			element2.name ="cultivonocomp"+String(oculto.value );
			element2.id="cultivonocomp"+String(oculto.value );
			element2.options[0]=new Option("Elegir...","0");
			for(i=1;i<document.getElementById('combocultivo').length ;i++)
        	{
						element2.options[i]=new Option(document.getElementById('combocultivo').options[i].text, document.getElementById('combocultivo').options[i].value);
					}
      element2.setAttribute('class','boxBusqueda3');
						//element2.setAttribute('onChange',"duplicado2(this,"+String(oculto.value)+')');
			cell2.appendChild(element2);


										var cell3 = row.insertCell(2);   //celda 3
										var element3 = document.createTextNode("Ejecutado");
										cell3.appendChild(element3);


										var cell4 = row.insertCell(3);   //celda 3
										var element4 = CreateText("SupVeranoncE1"+String(oculto.value ));
										var av1 = document.getElementById('ano1').value;
										if(((av1 == 1)||(av1 == 3))==false)
										{
											element4.disabled = true;
										}
										element4.value = 0;
										cell4.appendChild(element4);

										var cell5 = row.insertCell(4);   //celda 3
										var element5 = CreateText("SupInviernoncE1"+String(oculto.value ));
										var ai1 = document.getElementById('ano1').value;
										if(((ai1 == 1)||(ai1 == 3))==false)
										{
											element5.disabled = true;
										}
										element5.value = 0;
										cell5.appendChild(element5);


										var cell6 = row.insertCell(5);   //celda 3
										var element6 = CreateText("SupVeranoncE2"+String(oculto.value ));
										var av2 = document.getElementById('ano2').value;
										if(((av2 == 2)||(av2 == 4))==false)
										{
											element6.disabled = true;
										}
										element6.value = 0;
										cell6.appendChild(element6);


										var cell7 = row.insertCell(6);   //celda 3
										var element7 = CreateText("SupInviernoncE2"+String(oculto.value));
										var ai2 = document.getElementById('ano2').value;
										if(((ai2 == 2)||(ai2 == 4))==false)
										{
											element7.disabled = true;
										}
										element7.value = 0;
										cell7.appendChild(element7);

										var cell8 = row.insertCell(7);   //celda 3
										var element8 = CreateText("SupVeranoncE3"+String(oculto.value));
										var ai3 = document.getElementById('ano3').value;
										if(((ai3 == 3)||(ai3 == 5))==false)
										{
											element8.disabled = true;
										}
										element8.value = 0;
										cell8.appendChild(element8);

										var cell9 = row.insertCell(8);   //celda 3
										var element9 = CreateText("SupInviernoncE3"+String(oculto.value ));
										var ai3 = document.getElementById('ano3').value;
										if(((ai3 == 3)||(ai3 == 5))==false)
										{
											element9.disabled = true;
										}
										element9.value = 0;
										cell9.appendChild(element9);


										var cell10 = row.insertCell(9);   //celda 3
										var element10 = CreateText("SupVeranoncE4"+String(oculto.value ));
										var ai4 = document.getElementById('ano4').value;
										if(((ai4 == 4)||(ai4 == 6))==false)
										{
											element10.disabled = true;
										}
										element10.value = 0;
										cell10.appendChild(element10);


										var cell11 = row.insertCell(10);   //celda 3
										var element11 = CreateText("SupInviernoncE4"+String(oculto.value ));
										var ai4 = document.getElementById('ano4').value;
										if(((ai4 == 4)||(ai4 == 6))==false)
										{
											element11.disabled = true;
										}
										element11.value = 0;
										cell11.appendChild(element11);


										var cell12 = row.insertCell(11);   //celda 3
										var element12 = CreateText("SupVeranoncE5"+String(oculto.value ));
										var ai5 = document.getElementById('ano5').value;
										if(((ai5 == 5)||(ai5 == 7))==false)
										{
											element12.disabled = true;
										}
										element12.value = 0;
										cell12.appendChild(element12);

										var cell13 = row.insertCell(12);   //celda 3
										var element13 = CreateText("SupInviernoncE5"+String(oculto.value ));
										var ai5 = document.getElementById('ano5').value;
										if(((ai5 == 5)||(ai5 == 7))==false)
										{
											element13.disabled = true;
										}
										element13.value = 0;
										cell13.appendChild(element13);




										var table = document.getElementById(tableID);
										var rowCount = table.rows.length;
										var row = table.insertRow(rowCount);
										var oculto=document.getElementById(num_ben);
										oculto.value=parseInt(oculto.value);



										var cell1 = row.insertCell(0);   //celda
										cell1.setAttribute("style","display:none");



										var cell2 = row.insertCell(1);   //celda
										cell2.setAttribute("style","display:none");



										var cell3 = row.insertCell(2);   //celda 3
										var element3 = document.createTextNode("Produccion obtenida en el Área Regularizada (Kg.)");
										cell3.appendChild(element3);


																	var cell4 = row.insertCell(3);   //celda 3
																	var element4 = CreateText("Veranokgnc1"+String(oculto.value ));
																	var av1k = document.getElementById('ano1').value;
																	if(((av1k == 1)||(av1k == 3))==false)
																	{
																		element4.disabled = true;
																	}
																	element4.value = 0;
																	cell4.appendChild(element4);

																	var cell5 = row.insertCell(4);   //celda 3
																	var element5 = CreateText("Inviernokgnc1"+String(oculto.value ));
																	var av1k = document.getElementById('ano1').value;
																	if(((av1k == 1)||(av1k == 3))==false)
																	{
																		element5.disabled = true;
																	}
																	element5.value = 0;
																	cell5.appendChild(element5);


																	var cell6 = row.insertCell(5);   //celda 3
																	var element6 = CreateText("Veranokgnc2"+String(oculto.value ));
																	var av2k = document.getElementById('ano2').value;
																	if(((av2k == 2)||(av2k == 4))==false)
																	{
																		element6.disabled = true;
																	}
																	element6.value = 0;
																	cell6.appendChild(element6);

																	var cell7 = row.insertCell(6);   //celda 3
																	var element7 = CreateText("Inviernokgnc2"+String(oculto.value));
																	var av2k = document.getElementById('ano2').value;
																	if(((av2k == 2)||(av2k == 4))==false)
																	{
																		element7.disabled = true;
																	}
																	element7.value = 0;
																	cell7.appendChild(element7);


																	var cell8 = row.insertCell(7);   //celda 3
																	var element8 = CreateText("Veranokgnc3"+String(oculto.value));
																	var ai3 = document.getElementById('ano3').value;
																	if(((ai3 == 3)||(ai3 == 5))==false)
																	{
																		element8.disabled = true;
																	}
																	element8.value = 0;
																	cell8.appendChild(element8);

																	var cell9 = row.insertCell(8);   //celda 3
																	var element9 = CreateText("Inviernokgnc3"+String(oculto.value ));
																	var ai3 = document.getElementById('ano3').value;
																	if(((ai3 == 3)||(ai3 == 5))==false)
																	{
																		element9.disabled = true;
																	}
																	element9.value = 0;
																	cell9.appendChild(element9);


																	var cell10 = row.insertCell(9);   //celda 3
																	var element10 = CreateText("Veranokgnc4"+String(oculto.value ));
																	var ai4 = document.getElementById('ano4').value;
																	if(((ai4 == 4)||(ai4 == 6))==false)
																	{
																		element10.disabled = true;
																	}
																	element10.value = 0;
																	cell10.appendChild(element10);

																	var cell11 = row.insertCell(10);   //celda 3
																	var element11 = CreateText("Inviernokgnc4"+String(oculto.value ));
																	var ai4 = document.getElementById('ano4').value;
																	if(((ai4 == 4)||(ai4 == 6))==false)
																	{
																		element11.disabled = true;
																	}
																	element11.value = 0;
																	cell11.appendChild(element11);

																	var cell12 = row.insertCell(11);   //celda 3
																	var element12 = CreateText("Veranokgnc5"+String(oculto.value ));
																	var ai5 = document.getElementById('ano5').value;
																	if(((ai5 == 5)||(ai5 == 7))==false)
																	{
																		element12.disabled = true;
																	}
																	element12.value = 0;
																	cell12.appendChild(element12);

																	var cell13 = row.insertCell(12);   //celda 3
																	var element13 = CreateText("Inviernokgnc5"+String(oculto.value ));
																	var ai5 = document.getElementById('ano5').value;
																	if(((ai5 == 5)||(ai5 == 7))==false)
																	{
																		element13.disabled = true;
																	}
																	element13.value = 0;
																	cell13.appendChild(element13);
	   }


	   function CreateText(num1){
		    var element = document.createElement("input");
			element.type = "text";
			element.name =String(num1);//3"+String(rowCount + 1);
			element.id=String(num1);//3"+String(rowCount + 1);
			element.setAttribute('onBlur', 'extractNumber(this,4,false)');
			element.setAttribute('onkeypress','blockNonNumbers(this, event, true, false)');
			element.setAttribute('onkeyup','extractNumber(this,4,false)');
			element.setAttribute('class','boxBusqueda4');
		     return element;
		   }

   function duplicado2(combo,posicion){
		  try {
				var miArray = new Array();
				var valor=combo.options[combo.selectedIndex].value;
				var numoculto=document.getElementById('num_culnc').value;

				var aux=""; var count=0;

				for(i=1;i<=numoculto ;i++)
			    {  if(document.getElementById('cultivonocomp'+i)!=null){
					   aux=document.getElementById('cultivonocomp'+i).value;
					   if(aux!=0){ miArray[i]=aux;document.getElementById('cultivo'+i).setAttribute('class','combos'); }
					   else{ document.getElementById('cultivonocomp'+i).setAttribute('class','comborojo');}
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

</script>

<div align="center" class="texto">

 <form action="agricola_rcia.php" method="POST" autocomplete="off" name="form-agrircia" id="form-agrircia" enctype="multipart/form-data" >

  <b><big>PRODUCCION AGRICOLA </big></b><br>
  <b class="texto">Predio: <?php echo $_SESSION['nombre_predio'];?> Código: <?php echo $_SESSION['cod_parcela'];?> </b>

  <table width="95%" border="0" class='taulaA' align="center">

    <tr id="blau" class="texto_normal">
      <td colspan="3" id='blau2'><span class="taulaH">Superficies para la Producci&oacute;n de Alimentos (Ha)</span></td>
    </tr>

    <tr id="blau" class="texto_normal">
      <td colspan="3" id='blau6'>

	  <table width="100%" border="1" cellspacing="0" class='taulaA'>

		<tr>
          <td rowspan="2" class="cabecera2" id="blau15"><div align="center">Sup. Total Predio</div></td>
          <td  rowspan="2" class="cabecera2" ><div align="center">Sup. Deforestada (Ha. ): </div></td>

		  <?php if($_SESSION['Causal']==2){ ?>
          <td  rowspan="2" class="cabecera2" ><div align="center">Sup. P.A.S. (ha.):</div></td>
		  <?php } ?>

          <td  rowspan="2" class="cabecera2" ><div align="center">Sup. Prod. Alimentos: </div></td>
          <td colspan="2" class="cabecera2" id="blau15"><div align="center">Prod Alimento Sup. Deforestada (ha.):            </div></td>

          <?php if($_SESSION['Causal']==2){ ?>
		  <td colspan="2" class="cabecera2"><div align="center">Prod Alimento Sup. P.A.S. (ha.):            </div></td>
		  <?php } ?>

		</tr>

        <tr>
          <td class="cabecera2" id="blau16"><div align="center">Sup. en T.P.F.P.</div></td>
          <td class="cabecera2" id="blau16"><div align="center">Sup. T.U.M.</div></td>
		  <?php if($_SESSION['Causal']==2){ ?>
          <td class="cabecera2" id="blau16"><div align="center">Sup. en T.P.F.P.</div></td>
          <td class="cabecera2" id="blau16"><div align="center">Sup. T.U.M.</div></td>
		  <?php } ?>
        </tr>

        <tr id="blau">
          <td id="blau15"><div align="center">
            <input name="Superficie" type="text" class="boxVerde" id="Superficie"  onFocus="siguienteCampo ='FechaFin'" maxlength="10" value="<?php echo isset($_SESSION['datos_bosque']['Superficie']) ? htmlspecialchars($_SESSION['datos_bosque']['Superficie']) : $row_predio['superficie'];?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly >
          </div>
		  </td>
          <td ><div align="center">
            <input type="text" name="supdefilegal" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie337']->get_suptotal();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supdefilegal">
          </div>
		  </td>

		  <?php if($_SESSION['Causal']==2){ ?>
          <td ><div align="center">
            <input type="text" name="suppas" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie502']->get_suptotal();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="suppas">
          </div>
		  </td>
		  <?php } ?>

          <td><div align="center">
            <input name="SupProdAli" type="text"  id="SupProdAli" class="boxVerde" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  maxlength="15"  value="<?php if(isset($_SESSION['Causal']) && $_SESSION['Causal']==2){echo $_SESSION['superficie337']->get_supproali()+$_SESSION['superficie502']->get_supproali();}else{ echo $_SESSION['superficie337']->get_supproali(); } ?>"  readonly>
          </div>
		  </td>
          <td height="22"  id="blau7"><div align="center">
            <input type="text" name="supalitpfp" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie337']->get_supalitpfp();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supalitpfp">
          </div>
		  </td>
          <td ><div align="center">
            <input type="text" name="supalitum" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie337']->get_supalitum();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supalitum">
          </div>
		  </td>

		  <?php if($_SESSION['Causal']==2){ ?>
          <td ><div align="center">
            <input type="text" name="supalitpfppas" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie502']->get_supalitpfp();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supalitpfppas">
          </div>
		  </td>
          <td  id="blau7"><div align="center">
            <input type="text" name="supalitumpas" class="boxBusqueda4m"  value="<?php echo $_SESSION['superficie502']->get_supalitum();?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" readonly id="supalitumpas">
          </div>
		  </td>
		  <?php } ?>

        </tr>

      </table>
	 </td>
    </tr>

  </table>

  <td >&nbsp;</td>


<?php
 if ($_SESSION['Actividad']=="Agricola" || $_SESSION['Actividad']=="Mixta Agropecuaria"){
 ?>

<table width="95%" border="0" class='taulaA' align="center">
      <tr class="texto_normal">
        <td width="55%" colspan="2" id='blau4'><span class="taulaH">Uso Actual en &aacute;reas deforestadas ilegales y/o con PAS. (Ha.)</span></td>
        <td width="45%" id='blau8' >&nbsp;</td>
      </tr>
      <tr class="texto_normal">
        <td colspan="3" id='blau13'><table width="86%" border="0" class='taulaA'>
          <tr id="blau3" >
            <td width="11%" id="blau11">Agricola: </td>
            <td width="20%" ><input name="SupActAgri" type="text" class="boxBusqueda4" id="SupActAgri" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_ganadero']['SupActAgri']) ? htmlspecialchars($_SESSION['datos_ganadero']['SupActAgri']) : $row_supali['supagricola'] ?>" maxlength="15" readonly></td>
            <td width="11%" id="blau11">Barbecho: </td>
            <td width="11%"><input name="SupActbar" type="text" class="boxBusqueda4" id="SupActbar" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_ganadero']['SupActbar']) ? htmlspecialchars($_SESSION['datos_ganadero']['SupActbar']) : $row_supali['supbarbecho']?>"  maxlength="15" readonly></td>
            <td width="11%" id="blau11">Descanso</td>
            <td width="11%"><input name="SupActDes" type="text" class="boxBusqueda4" id="SupActDes" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_ganadero']['SupActDes']) ? htmlspecialchars($_SESSION['datos_ganadero']['SupActDes']) : $row_supali['supdescanso']?>" maxlength="15" readonly></td>
            <td width="11%" id="blau11">Ganadera</td>
            <td width="11%"><input name="SupActGan" type="text" class="boxBusqueda4" id="SupActGan"onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_ganadero']['SupActGan']) ? htmlspecialchars($_SESSION['datos_ganadero']['SupActGan']) : $row_supali['supganadera'] ?>" maxlength="15" readonly ></td>
          </tr>
        </table></td>
      </tr>
</table>
<td >&nbsp;</td>



<table width="95%" border="0" class='taulaA' align="center">

 <tr class="texto_normal">
    <td id='blau12'>
      <table width="100%" border="0">
        <tr>
          <td width="60%"><span class="taulaH">ACTIVIDADES REALIZADAS EN LA SUPERFICIE DEFORESTADA SIN AUTORIZACION</span></td>
          <td width="40%" align="right"><span class="taulaH">Situacion Agricola &aacute;reas deforestadas ilegales y/o P.A.S - Línea Base:</span></td>
        </tr>
      </table>
    </td>
  </tr>

  <tr class="texto_normal">
    <td id='blau9'>

	<table width="100%" border="0">
      <tr>


        <td width="60%">

		<table width="100%" border="1" class='taulaA' id="dataTable5" >

      <tr>
        <td width="10%" align="center" class="cabecera2" id="blau">ACTIVIDAD</td>

      <?php
			 if($periodo == 1)
			 {
		  ?>
          <td width="7%" align="center" class="cabecera2" id="blau">Año 2014</td>
          <td width="7%" align="center" class="cabecera2" id="blau">Año 2015</td>
          <td width="7%" align="center" class="cabecera2" id="blau">Año 2016</td>
          <td width="7%" align="center" class="cabecera2" id="blau">Año 2017</td>
          <td width="7%" align="center" class="cabecera2" id="blau">Año 2018</td>
        <?php
  			 }
  			 elseif ($periodo == 2) {
  		  ?>
          <td width="7%" align="center" class="cabecera2" id="blau">Año 2016</td>
          <td width="7%" align="center" class="cabecera2" id="blau">Año 2017</td>
          <td width="7%" align="center" class="cabecera2" id="blau">Año 2018</td>
          <td width="7%" align="center" class="cabecera2" id="blau">Año 2019</td>
          <td width="7%" align="center" class="cabecera2" id="blau">Año 2020</td>
        <?php
          }
         ?>
        </tr>



		  <!-- ACTIVIDADES REALIZADAS EN LA SUPERFICIE DESMONTADA  -->
		  <?PHP
		  		$sql_actividad = "select * from codificadores where idcodificadores > 295 and idcodificadores < 300 order by idcodificadores asc";
				$actividad = pg_query($cn,$sql_actividad);
				$row_actividad = pg_fetch_array ($actividad);

        do {
		  ?>

        <tr>
            <td align="center" id="blau16">
			    <?php echo $row_actividad['nombrecodificador']?>
			     </td>

			<?php
			$cont = 1;
      if ($periodo == 1)
      {
        $anoacti = 1;
      }
      elseif ($periodo == 2)
      {
        $anoacti = 3;
      }
			do {
			?>
    			<td align="center" id="blau16">
            <?php
            $sql_ano_activo = "select anho from monitoreo.monitoreo where estado = 1 and idregistro = ".$_SESSION['idreg']."and anho =".$anoacti;
            $anoactivo = pg_query($cn,$sql_ano_activo) ;
            $row_ano = pg_fetch_array ($anoactivo);
            $totalRows_ano = pg_num_rows($anoactivo);
            $anoactivomon = 0;
            if($totalRows_ano>0)
            {
            $anoactivomon = $row_ano['anho'];
            }
            ?>

    					  <select name="<?php echo $row_actividad['idcodificadores'].'-comboacta'.$cont?>" class="combos"   <?php if ($anoactivomon==0) {?> disabled <?php }  ?>   id='<?php echo $row_actividad['idcodificadores'].'-comboacta'.$cont?>'>

    						<?php
    						$aux = $row_actrciaagricola['realizada'];
                $auxano = $row_actrciaagricola['anho'];

                if ($auxano == $anoacti)
                {
                      if ($aux != null)
                      {
                      ?>
                        <option value="0" <?php if( $aux=="0"){echo 'selected' ;}?>>NO </option>
                        <option value="1" <?php if( $aux=="1"){echo 'selected' ;}?>>SI</option>

                      <?php
                      }
                      else
                      {
                      ?>

                        <option value=0 >NO</option>
                        <option value=1 >SI</option>

                      <?php
                      }

                      	if(isset($row_actrciaagricola )){ $row_actrciaagricola = pg_fetch_assoc($rcia_act_agricola); }

                }
                else
                {
                  ?>
                  <option value=0 >NO</option>
                  <option value=1 >SI</option>
                 <?php
                }
                ?>

    					  </select>
    			</td>

    			<?php $cont = $cont + 1;
          $anoacti = $anoacti + 1;

			 } while ($cont <= 5 );

       } while ($row_actividad = pg_fetch_assoc($actividad));?>

		</tr>
		    <!-- ********************************************  -->
        </table>


		</td>


		<td width="40%"  align="right" id='blau6'>



		<table width="60%" border="1" class='taulaA' id="dataTable" >

			<tr>
			  <td width="19%" align="center" class="cabecera2" id="blau2" >Cultivo</td>
			  <td width="15%" align="center" class="cabecera2" id="blau2">Sup.Actual Cultivada Verano (Ha.): </td>
			  <td width="17%" align="center" class="cabecera2" id="blau2">Sup. Actual Cultivada Invierno (Ha.):</td>
			</tr>

			<?php
			 $SupTotVerano0=0;
			 $SupTotInvierno0=0;

			do {
			?>
			<tr>
			  <td align="center" id="blau3">
							<input disabled name="<?php echo 'combocultivoactual'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'combocultivoactual'.$i; ?>" value="<?php  echo $row_culinicial['nombrecultivo']; ?>" >
				</td>
			  <td align="center" id="blau3"><input name="<?php echo 'SupVerano0'.$i; ?>" type="text" class="boxBusqueda3"  id="<?php echo 'SupVerano0'.$i; ?>" value="<?php if(isset($_SESSION['datos_agricola']['SupVerano0'.$i])){ echo $_SESSION['datos_agricola']['SupVerano0'.$i];} else{ echo $row_culinicial['supverano']; $SupTotVerano0=$SupTotVerano0+$row_culinicial['supverano'];} ?>" readonly ></td>
			  <td align="center" id="blau3"><input name="<?php echo 'SupInvierno0'.$i; ?>" type="text" class="boxBusqueda3"  id="<?php echo 'SupInvierno0'.$i; ?>" value="<?php if(isset($_SESSION['datos_agricola']['SupInvierno0'.$i])){ echo $_SESSION['datos_agricola']['SupInvierno0'.$i];} else{ echo $row_culinicial['supinvierno']; $SupTotInvierno0=$SupTotInvierno0+$row_culinicial['supinvierno'];} ?>" readonly></td>

			</tr>

			<?php
				} while ($row_culinicial = pg_fetch_assoc($culinicial));
			?>


			<tr>
			  <td width="19%" align="center" id="blau2" >TOTAL </td>
			  <td width="15%" align="center" id="blau2"><input name="Sup0TotVer"  type="text" class="boxBusqueda3" id="Sup0TotVer" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_agricola']['Sup0TotVer']) ? htmlspecialchars($_SESSION['datos_agricola']['Sup0TotVer']) : $SupTotVerano0;?>" readonly></td>
			  <td width="17%" align="center" id="blau2"><input name="Sup0TotInv"  type="text" class="boxBusqueda3" id="Sup0TotInv" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="<?php echo isset($_SESSION['datos_agricola']['Sup0TotInv']) ? htmlspecialchars($_SESSION['datos_agricola']['Sup0TotInv']) : $SupTotInvierno0;?>" readonly></td>
			</tr>

		  </table>



		</td>

      </tr>
    </table>
    </td>
  </tr>



</table>

<table width="95%" border="1" class='taulaA' align="center">


	<?php
	////////////////////////
	if ($periodo == 1)
	{
		$sql_ano_1_activo = "select anho from monitoreo.monitoreo where estado = 1 and idregistro = ".$_SESSION['idreg']."and anho = 1";
		$ano1activo = pg_query($cn,$sql_ano_1_activo) ;
		$row_ano_1 = pg_fetch_array ($ano1activo);
		$ano_1 = $row_ano_1['anho'];

		$sql_ano_2_activo = "select anho from monitoreo.monitoreo where estado = 1 and idregistro = ".$_SESSION['idreg']."and anho = 2";
		$ano2activo = pg_query($cn,$sql_ano_2_activo) ;
		$row_ano_2 = pg_fetch_array ($ano2activo);
		$ano_2 = $row_ano_2['anho'];

		$sql_ano_3_activo = "select anho from monitoreo.monitoreo where estado = 1 and idregistro = ".$_SESSION['idreg']."and anho = 3";
		$ano3activo = pg_query($cn,$sql_ano_3_activo) ;
		$row_ano_3 = pg_fetch_array ($ano3activo);
		$ano_3 = $row_ano_3['anho'];

		$sql_ano_4_activo = "select anho from monitoreo.monitoreo where estado = 1 and idregistro = ".$_SESSION['idreg']."and anho = 4";
		$ano4activo = pg_query($cn,$sql_ano_4_activo) ;
		$row_ano_4 = pg_fetch_array ($ano4activo);
		$ano_4 = $row_ano_4['anho'];

		$sql_ano_5_activo = "select anho from monitoreo.monitoreo where estado = 1 and idregistro = ".$_SESSION['idreg']."and anho = 5";
		$ano5activo = pg_query($cn,$sql_ano_5_activo) ;
		$row_ano_5 = pg_fetch_array ($ano5activo);
		$ano_5 = $row_ano_5['anho'];
	}
	elseif ($periodo == 2)
	{
		$sql_ano_1_activo = "select anho from monitoreo.monitoreo where estado = 1 and idregistro = ".$_SESSION['idreg']."and anho = 3";
		$ano1activo = pg_query($cn,$sql_ano_1_activo) ;
		$row_ano_1 = pg_fetch_array ($ano1activo);
		$ano_1 = $row_ano_1['anho'];

		$sql_ano_2_activo = "select anho from monitoreo.monitoreo where estado = 1 and idregistro = ".$_SESSION['idreg']."and anho = 4";
		$ano2activo = pg_query($cn,$sql_ano_2_activo) ;
		$row_ano_2 = pg_fetch_array ($ano2activo);
		$ano_2 = $row_ano_2['anho'];

		$sql_ano_3_activo = "select anho from monitoreo.monitoreo where estado = 1 and idregistro = ".$_SESSION['idreg']."and anho = 5";
		$ano3activo = pg_query($cn,$sql_ano_3_activo) ;
		$row_ano_3 = pg_fetch_array ($ano3activo);
		$ano_3 = $row_ano_3['anho'];

		$sql_ano_4_activo = "select anho from monitoreo.monitoreo where estado = 1 and idregistro = ".$_SESSION['idreg']."and anho = 6";
		$ano4activo = pg_query($cn,$sql_ano_4_activo) ;
		$row_uno_4 = pg_fetch_array ($ano4activo);
		$ano_4 = $row_ano_4['anho'];

		$sql_ano_5_activo = "select anho from monitoreo.monitoreo where estado = 1 and idregistro = ".$_SESSION['idreg']."and anho = 7";
		$ano5activo = pg_query($cn,$sql_ano_5_activo) ;
		$row_ano_5 = pg_fetch_array ($ano5activo);
		$ano_5 = $row_ano_5['anho'];
	}
 ?>

		<input id="ano1" name="ano1"  type="hidden" value="<?php echo $ano_1 ?>" >
		<input id="ano2" name="ano2"  type="hidden" value="<?php echo $ano_2 ?>" >
		<input id="ano3" name="ano3"  type="hidden" value="<?php echo $ano_3 ?>" >
		<input id="ano4" name="ano4"  type="hidden" value="<?php echo $ano_4 ?>" >
		<input id="ano5" name="ano5"  type="hidden" value="<?php echo $ano_5 ?>" >
                
                <input id="celiminados" name="celiminados"  type="hidden" value="" >




   <tr class="texto_normal">
        <td colspan="2" id='blau4'><span class="taulaH">Superficie Cultivada y Resultados Alcanzados</span></td>
   </tr>


   <tr>

    <td height="38" colspan="2">

    <br>


<table width="100%" border="1" class='taulaA' id="dataTable3" >
        <tr>
          <td width="10%" align="center" class="cabecera2" id="blau">Cultivo</td>
          <td width="15%" align="center" class="cabecera2" id="blau">Descripcion</td>

          <?php
           if($periodo == 1)
           {
          ?>
              <td width="7%" align="center" class="cabecera2" id="blau">Ver. Año 2014</td>
              <td width="7%" align="center" class="cabecera2" id="blau">Inv. Año 2014</td>
              <td width="7%" align="center" class="cabecera2" id="blau">Ver. Año 2015</td>
              <td width="7%" align="center" class="cabecera2" id="blau">Inv. Año 2015</td>
              <td width="7%" align="center" class="cabecera2" id="blau">Ver. Año 2016</td>
              <td width="7%" align="center" class="cabecera2" id="blau">Inv. Año 2016</td>
              <td width="7%" align="center" class="cabecera2" id="blau">Ver. Año 2017</td>
              <td width="7%" align="center" class="cabecera2" id="blau">Inv. Año 2017</td>
              <td width="7%" align="center" class="cabecera2" id="blau">Ver. Año 2018</td>
              <td width="7%" align="center" class="cabecera2" id="blau">Inv. Año 2018</td>
            <?php
             }
             elseif ($periodo == 2) {
            ?>
              <td width="7%" align="center" class="cabecera2" id="blau">Ver. Año 2016</td>
              <td width="7%" align="center" class="cabecera2" id="blau">Inv. Año 2016</td>
              <td width="7%" align="center" class="cabecera2" id="blau">Ver. Año 2017</td>
              <td width="7%" align="center" class="cabecera2" id="blau">Inv. Año 2017</td>
              <td width="7%" align="center" class="cabecera2" id="blau">Ver. Año 2018</td>
              <td width="7%" align="center" class="cabecera2" id="blau">Inv. Año 2018</td>
              <td width="7%" align="center" class="cabecera2" id="blau">Ver. Año 2019</td>
              <td width="7%" align="center" class="cabecera2" id="blau">Inv. Año 2019</td>
              <td width="7%" align="center" class="cabecera2" id="blau">Ver. Año 2020</td>
              <td width="7%" align="center" class="cabecera2" id="blau">Inv. Año 2020</td>
            <?php
              }
             ?>
        </tr>

          <?php
		  $SupTotVerano1=0;
		 $SupTotInvierno1=0;$SupTotVerano2=0;
		 $SupTotInvierno2=0;$SupTotVerano3=0;
		 $SupTotInvierno3=0;$SupTotVerano4=0;
		 $SupTotInvierno4=0;$SupTotVerano5=0;
		 $SupTotInvierno5=0;

		if((isset($_SESSION['datos_agricola']['num_cul'])&&($_SESSION['datos_agricola']['num_cul']>0)) or (isset($num_culfinal) && $num_culfinal>0)){
		if(isset($_SESSION['datos_agricola']['num_cul'])&&($_SESSION['datos_agricola']['num_cul']>0))
		 {$num=$_SESSION['datos_agricola']['num_cul'];}
		 else
		 {$num=$num_culfinal;}  ?>

		 <input type="hidden" name="numerocultivos" id="numerocultivos" value="<?php echo $num; ?>"></td>

		  <?php



		 for ($i = 1; $i <=$num ; $i++) {
		  if(isset($_SESSION['datos_agricola']['cultivo'.$i])|| isset($row_culfinal['idcultivo'])){
		 ?>



          <tr>

          <td align="center" class="celdaRCIA" id="blau22" rowspan="3" >
              <?php
              $sql_compromisocultivo = "select * FROM cultivo as c where idcultivo =".$row_culfinal['idcultivo'];
              $compromisocultivo = pg_query($cn,$sql_compromisocultivo) ;
              $row_compromiso = pg_fetch_array ($compromisocultivo);
              ?>

              <input name="<?php echo 'cultivocompromometido'.$i; ?>" type="hidden" class="boxBusqueda4"  id="<?php echo 'cultivocompromometido'.$i; ?>" value="<?php  echo $row_compromiso['idcultivo']; ?>" >
              <input disabled name="<?php echo 'nombrecultivocomp'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'nombrecultivocomp'.$i; ?>" value="<?php  echo $row_compromiso['nombrecultivo']; ?>" >
          </td>

			      <td width="10%" align="center" class="celdaVerde" id="blau"> Comprometido</td>
            <td align="center" class="celdaVerde" id="blau23"><INPUT disabled name="<?php echo 'SupVerano1'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupVerano1'.$i; ?>" value="<?php if(isset($_SESSION['datos_agricola']['SupVerano1'.$i])){ echo $_SESSION['datos_agricola']['SupVerano1'.$i];} else{ echo $row_culfinal['supverano1']; $SupTotVerano1=$SupTotVerano1+$row_culfinal['supverano1'];} ?>" ></td>
            <td align="center" class="celdaVerde" id="blau23"><INPUT disabled name="<?php echo 'SupInvierno1'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupInvierno1'.$i; ?>"  value="<?php if(isset($_SESSION['datos_agricola']['SupInvierno1'.$i])){ echo $_SESSION['datos_agricola']['SupInvierno1'.$i];} else{ echo $row_culfinal['supinvierno1']; $SupTotInvierno1=$SupTotInvierno1+$row_culfinal['supinvierno1'];} ?>"></td>
            <td align="center" class="celdaVerde" id="blau23"><INPUT disabled name="<?php echo 'SupVerano2'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupVerano2'.$i; ?>"  value="<?php if(isset($_SESSION['datos_agricola']['SupVerano2'.$i])){ echo $_SESSION['datos_agricola']['SupVerano2'.$i];} else{ echo $row_culfinal['supverano2']; $SupTotVerano2=$SupTotVerano2+$row_culfinal['supverano2'];} ?>">            </td>
            <td align="center" class="celdaVerde" id="blau23"><INPUT disabled name="<?php echo 'SupInvierno2'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupInvierno2'.$i; ?>"  value="<?php if(isset($_SESSION['datos_agricola']['SupInvierno2'.$i])){ echo $_SESSION['datos_agricola']['SupInvierno2'.$i];} else{ echo $row_culfinal['supinvierno2']; $SupTotInvierno2=$SupTotInvierno2+$row_culfinal['supinvierno2'];} ?>" ></td>
            <td align="center" class="celdaVerde" id="blau23"><INPUT disabled name="<?php echo 'SupVerano3'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupVerano3'.$i; ?>"  value="<?php if(isset($_SESSION['datos_agricola']['SupVerano3'.$i])){ echo $_SESSION['datos_agricola']['SupVerano3'.$i];} else{ echo $row_culfinal['supverano3']; $SupTotVerano3=$SupTotVerano3+$row_culfinal['supverano3'];} ?>" ></td>
            <td align="center" class="celdaVerde" id="blau23"><INPUT disabled name="<?php echo 'SupInvierno3'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupInvierno3'.$i; ?>"  value="<?php if(isset($_SESSION['datos_agricola']['SupInvierno3'.$i])){ echo $_SESSION['datos_agricola']['SupInvierno3'.$i];} else{ echo $row_culfinal['supinvierno3']; $SupTotInvierno3=$SupTotInvierno3+$row_culfinal['supinvierno3'];} ?>"></td>
            <td align="center" class="celdaVerde" id="blau23"><INPUT disabled name="<?php echo 'SupVerano4'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupVerano4'.$i; ?>"  value="<?php if(isset($_SESSION['datos_agricola']['SupVerano4'.$i])){ echo $_SESSION['datos_agricola']['SupVerano4'.$i];} else{ echo $row_culfinal['supverano4']; $SupTotVerano4=$SupTotVerano4+$row_culfinal['supverano4'];} ?>" ></td>
            <td align="center" class="celdaVerde" id="blau23"><INPUT disabled name="<?php echo 'SupInvierno4'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupInvierno4'.$i; ?>"  value="<?php if(isset($_SESSION['datos_agricola']['SupInvierno4'.$i])){ echo $_SESSION['datos_agricola']['SupInvierno4'.$i];} else{ echo $row_culfinal['supinvierno4']; $SupTotInvierno4=$SupTotInvierno4+$row_culfinal['supinvierno4'];} ?>" ></td>
            <td align="center" class="celdaVerde" id="blau23"><INPUT disabled name="<?php echo 'SupVerano5'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupVerano5'.$i; ?>"  value="<?php if(isset($_SESSION['datos_agricola']['SupVerano5'.$i])){ echo $_SESSION['datos_agricola']['SupVerano5'.$i];} else{ echo $row_culfinal['supverano5']; $SupTotVerano5=$SupTotVerano5+$row_culfinal['supverano5'];} ?>"></td>
            <td align="center" class="celdaVerde" id="blau23"><INPUT disabled name="<?php echo 'SupInvierno5'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupInvierno5'.$i; ?>"  value="<?php if(isset($_SESSION['datos_agricola']['SupInvierno5'.$i])){ echo $_SESSION['datos_agricola']['SupInvierno5'.$i];} else{ echo $row_culfinal['supinvierno5']; $SupTotInvierno5=$SupTotInvierno5+$row_culfinal['supinvierno5'];} ?>"></td>


							<INPUT name="<?php echo 'Verano1'.$i; ?>" type="hidden" id="<?php echo 'Verano1'.$i; ?>" value="<?php if(isset($_SESSION['datos_agricola']['SupVerano1'.$i])){ echo $_SESSION['datos_agricola']['SupVerano1'.$i];} else{ echo $row_culfinal['supverano1']; $SupTotVerano1=$SupTotVerano1+$row_culfinal['supverano1'];} ?>" >
	            <INPUT name="<?php echo 'Invierno1'.$i; ?>" type="hidden" id="<?php echo 'Invierno1'.$i; ?>"  value="<?php if(isset($_SESSION['datos_agricola']['SupInvierno1'.$i])){ echo $_SESSION['datos_agricola']['SupInvierno1'.$i];} else{ echo $row_culfinal['supinvierno1']; $SupTotInvierno1=$SupTotInvierno1+$row_culfinal['supinvierno1'];} ?>">
	            <INPUT name="<?php echo 'Verano2'.$i; ?>" type="hidden" id="<?php echo 'Verano2'.$i; ?>"  value="<?php if(isset($_SESSION['datos_agricola']['SupVerano2'.$i])){ echo $_SESSION['datos_agricola']['SupVerano2'.$i];} else{ echo $row_culfinal['supverano2']; $SupTotVerano2=$SupTotVerano2+$row_culfinal['supverano2'];} ?>">
	            <INPUT name="<?php echo 'Invierno2'.$i; ?>" type="hidden" id="<?php echo 'Invierno2'.$i; ?>"  value="<?php if(isset($_SESSION['datos_agricola']['SupInvierno2'.$i])){ echo $_SESSION['datos_agricola']['SupInvierno2'.$i];} else{ echo $row_culfinal['supinvierno2']; $SupTotInvierno2=$SupTotInvierno2+$row_culfinal['supinvierno2'];} ?>" >
	            <INPUT name="<?php echo 'Verano3'.$i; ?>" type="hidden" id="<?php echo 'Verano3'.$i; ?>"  value="<?php if(isset($_SESSION['datos_agricola']['SupVerano3'.$i])){ echo $_SESSION['datos_agricola']['SupVerano3'.$i];} else{ echo $row_culfinal['supverano3']; $SupTotVerano3=$SupTotVerano3+$row_culfinal['supverano3'];} ?>" >
	            <INPUT name="<?php echo 'Invierno3'.$i; ?>" type="hidden" id="<?php echo 'Invierno3'.$i; ?>"  value="<?php if(isset($_SESSION['datos_agricola']['SupInvierno3'.$i])){ echo $_SESSION['datos_agricola']['SupInvierno3'.$i];} else{ echo $row_culfinal['supinvierno3']; $SupTotInvierno3=$SupTotInvierno3+$row_culfinal['supinvierno3'];} ?>">
	            <INPUT name="<?php echo 'Verano4'.$i; ?>" type="hidden" id="<?php echo 'Verano4'.$i; ?>"  value="<?php if(isset($_SESSION['datos_agricola']['SupVerano4'.$i])){ echo $_SESSION['datos_agricola']['SupVerano4'.$i];} else{ echo $row_culfinal['supverano4']; $SupTotVerano4=$SupTotVerano4+$row_culfinal['supverano4'];} ?>" >
	            <INPUT name="<?php echo 'Invierno4'.$i; ?>" type="hidden" id="<?php echo 'Invierno4'.$i; ?>"  value="<?php if(isset($_SESSION['datos_agricola']['SupInvierno4'.$i])){ echo $_SESSION['datos_agricola']['SupInvierno4'.$i];} else{ echo $row_culfinal['supinvierno4']; $SupTotInvierno4=$SupTotInvierno4+$row_culfinal['supinvierno4'];} ?>" >
	            <INPUT name="<?php echo 'Verano5'.$i; ?>" type="hidden" id="<?php echo 'Verano5'.$i; ?>"  value="<?php if(isset($_SESSION['datos_agricola']['SupVerano5'.$i])){ echo $_SESSION['datos_agricola']['SupVerano5'.$i];} else{ echo $row_culfinal['supverano5']; $SupTotVerano5=$SupTotVerano5+$row_culfinal['supverano5'];} ?>">
	            <INPUT name="<?php echo 'Invierno5'.$i; ?>" type="hidden" id="<?php echo 'Invierno5'.$i; ?>"  value="<?php if(isset($_SESSION['datos_agricola']['SupInvierno5'.$i])){ echo $_SESSION['datos_agricola']['SupInvierno5'.$i];} else{ echo $row_culfinal['supinvierno5']; $SupTotInvierno5=$SupTotInvierno5+$row_culfinal['supinvierno5'];} ?>">



				  </tr>


           <tr>




            <td align="center" class="celdaRCIAEjecutado" id="blau18" >Ejecutado</td>
            <td align="center" class="celdaRCIAEjecutado" id="blau19"><INPUT <?php if ((($ano_1 == 1)||($ano_1 == 3))==false){?> disabled <?php }?>  name="<?php echo 'SupVeranoE1'.$i; ?>" onblur="extractNumber(this,4,false);" type="text" class="boxBusqueda4" id="<?php echo 'SupVeranoE1'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value=" <?php  if($row_rciaagricola1['ve1'] == null){ echo ('0');} else{ echo $row_rciaagricola1['ve1']; } ?> "  ></td>
            <td align="center" class="celdaRCIAEjecutado" id="blau19"><INPUT <?php if ((($ano_1 == 1)||($ano_1 == 3))==false){?> disabled <?php }?>  name="<?php echo 'SupInviernoE1'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupInviernoE1'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value=" <?php if($row_rciaagricola1['ie1'] == null){ echo ('0');} else{ echo $row_rciaagricola1['ie1']; } ?> " ></td>
            <td align="center" class="celdaRCIAEjecutado" id="blau19"><INPUT <?php if ((($ano_2 == 2)||($ano_2 == 4))==false){?> disabled <?php }?>  name="<?php echo 'SupVeranoE2'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupVeranoE2'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php if($row_rciaagricola2['ve2'] == null){ echo ('0');} else{ echo $row_rciaagricola2['ve2']; }  ?> " ></td>
            <td align="center" class="celdaRCIAEjecutado" id="blau19"><INPUT <?php if ((($ano_2 == 2)||($ano_2 == 4))==false){?> disabled <?php }?>  name="<?php echo 'SupInviernoE2'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupInviernoE2'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value=" <?php  if($row_rciaagricola2['ie2'] == null){ echo ('0');} else{ echo $row_rciaagricola2['ie2']; } ?> " ></td>
            <td align="center" class="celdaRCIAEjecutado" id="blau19"><INPUT <?php if ((($ano_3 == 3)||($ano_3 == 5))==false){?> disabled <?php }?> name="<?php echo 'SupVeranoE3'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupVeranoE3'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value=" <?php   if($row_rciaagricola3['ve3'] == null){ echo ('0');} else{ echo $row_rciaagricola3['ve3']; }  ?> "  ></td>
            <td align="center" class="celdaRCIAEjecutado" id="blau19"><INPUT <?php if ((($ano_3 == 3)||($ano_3 == 5))==false){?> disabled <?php }?> name="<?php echo 'SupInviernoE3'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupInviernoE3'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value=" <?php if($row_rciaagricola3['ie3'] == null){ echo ('0');} else{ echo $row_rciaagricola3['ie3']; }  ?> " ></td>
            <td align="center" class="celdaRCIAEjecutado" id="blau19"><INPUT <?php if ((($ano_4 == 4)||($ano_4 == 6))==false){?> disabled <?php }?> name="<?php echo 'SupVeranoE4'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupVeranoE4'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value=" <?php  if($row_rciaagricola4['ve4'] == null){ echo ('0');} else{ echo $row_rciaagricola4['ve4']; } ?> "  ></td>
            <td align="center" class="celdaRCIAEjecutado" id="blau19"><INPUT <?php if ((($ano_4 == 4)||($ano_4 == 6))==false){?> disabled <?php }?> name="<?php echo 'SupInviernoE4'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupInviernoE4'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_rciaagricola4['ie4'] == null){ echo ('0');} else{ echo $row_rciaagricola4['ie4']; } ?> " ></td>
            <td align="center" class="celdaRCIAEjecutado" id="blau19"><INPUT <?php if ((($ano_5 == 5)||($ano_5 == 7))==false){?> disabled <?php }?> name="<?php echo 'SupVeranoE5'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupVeranoE5'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value=" <?php  if($row_rciaagricola5['ve5'] == null){ echo ('0');} else{ echo $row_rciaagricola5['ve5']; } ?> " ></td>
            <td align="center" class="celdaRCIAEjecutado" id="blau19"><INPUT <?php if ((($ano_5 == 5)||($ano_5 == 7))==false){?> disabled <?php }?> name="<?php echo 'SupInviernoE5'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupInviernoE5'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value=" <?php  if($row_rciaagricola5['ie5'] == null){ echo ('0');} else{ echo $row_rciaagricola5['ie5']; } ?> " ></td>
          </tr>


          <tr>
          <td align="center" class="celdaRCIAProduccion" id="blau7" >Produccion obtenida en el Área Regularizada (Kg.)</td>
					<td align="center" class="celdaRCIAProduccion" id="blau19"><INPUT <?php if ((($ano_1 == 1)||($ano_1 == 3))==false) {?> disabled <?php }?> name="<?php echo 'Veranokg1'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'Veranokg1'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value=" <?php if($row_rciaagricola1['pv1'] == null){ echo ('0');} else{ echo $row_rciaagricola1['pv1']; } ?> " ></td>
          <td align="center" class="celdaRCIAProduccion" id="blau19"><INPUT <?php if ((($ano_1 == 1)||($ano_1 == 3))==false) {?> disabled <?php }?> name="<?php echo 'Inviernokg1'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'Inviernokg1'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value=" <?php if($row_rciaagricola1['pi1'] == null){ echo ('0');} else{ echo $row_rciaagricola1['pi1']; } ?> " ></td>
						<td align="center" class="celdaRCIAProduccion" id="blau19"><INPUT <?php if ((($ano_2 == 2)||($ano_2 == 4))==false) {?> disabled <?php }?> name="<?php echo 'Veranokg2'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'Veranokg2'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value=" <?php if($row_rciaagricola2['pv2'] == null){ echo ('0');} else{ echo $row_rciaagricola2['pv2']; } ?> " ></td>
						<td align="center" class="celdaRCIAProduccion" id="blau19"><INPUT <?php if ((($ano_2 == 2)||($ano_2 == 4))==false) {?> disabled <?php }?> name="<?php echo 'Inviernokg2'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'Inviernokg2'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value=" <?php if($row_rciaagricola2['pi2'] == null){ echo ('0');} else{ echo $row_rciaagricola2['pi2']; } ?> " ></td>
	          <td align="center" class="celdaRCIAProduccion" id="blau19"><INPUT <?php if ((($ano_3 == 3)||($ano_3 == 5))==false) {?> disabled <?php }?> name="<?php echo 'Veranokg3'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'Veranokg3'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value=" <?php if($row_rciaagricola3['pv3'] == null){ echo ('0');} else{ echo $row_rciaagricola3['pv3']; } ?> " ></td>
	          <td align="center" class="celdaRCIAProduccion" id="blau19"><INPUT <?php if ((($ano_3 == 3)||($ano_3 == 5))==false) {?> disabled <?php }?> name="<?php echo 'Inviernokg3'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'Inviernokg3'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value=" <?php if($row_rciaagricola3['pi3'] == null){ echo ('0');} else{ echo $row_rciaagricola3['pi3']; }  ?> "  ></td>
	          <td align="center" class="celdaRCIAProduccion" id="blau19"><INPUT <?php if ((($ano_4 == 4)||($ano_4 == 6))==false) {?> disabled <?php }?> name="<?php echo 'Veranokg4'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'Veranokg4'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_rciaagricola4['pv4'] == null){ echo ('0');} else{ echo $row_rciaagricola4['pv4']; }  ?> " ></td>
	          <td align="center" class="celdaRCIAProduccion" id="blau19"><INPUT <?php if ((($ano_4 == 4)||($ano_4 == 6))==false) {?> disabled <?php }?> name="<?php echo 'Inviernokg4'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'Inviernokg4'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value=" <?php if($row_rciaagricola4['pi4'] == null){ echo ('0');} else{ echo $row_rciaagricola4['pi4']; }  ?> "  ></td>
	          <td align="center" class="celdaRCIAProduccion" id="blau19"><INPUT <?php if ((($ano_5 == 5)||($ano_5 == 7))==false) {?> disabled <?php }?> name="<?php echo 'Veranokg5'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'Veranokg5'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value=" <?php if($row_rciaagricola5['pv5'] == null){ echo ('0');} else{ echo $row_rciaagricola5['pv5']; }  ?> " ></td>
	          <td align="center" class="celdaRCIAProduccion" id="blau19"><INPUT <?php if ((($ano_5 == 5)||($ano_5 == 7))==false) {?> disabled <?php }?> name="<?php echo 'Inviernokg5'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'Inviernokg5'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value=" <?php if($row_rciaagricola5['pi5'] == null){ echo ('0');} else{ echo $row_rciaagricola5['pi5']; }  ?> " ></td>


          </tr>


     </td>

          <?php

		 }
    		 if(!isset($_SESSION['datos_agricola']['num_cul']) && isset($row_culfinal))
         {
           $row_culfinal = pg_fetch_assoc($culfinal);
           $row_rciaagricola1 = pg_fetch_assoc($rcia_agricola1);
           $row_rciaagricola2 = pg_fetch_assoc($rcia_agricola2);
           $row_rciaagricola3 = pg_fetch_assoc($rcia_agricola3);
           $row_rciaagricola4 = pg_fetch_assoc($rcia_agricola4);
           $row_rciaagricola5 = pg_fetch_assoc($rcia_agricola5);
           $row_actrciaagricolacult1 = pg_fetch_assoc($rcia_act_agricola_cult1);
           $row_actrciaagricolacult2 = pg_fetch_assoc($rcia_act_agricola_cult2);
           $row_actrciaagricolacult3 = pg_fetch_assoc($rcia_act_agricola_cult3);
           $row_actrciaagricolacult4 = pg_fetch_assoc($rcia_act_agricola_cult4);
           $row_actrciaagricolacult5 = pg_fetch_assoc($rcia_act_agricola_cult5);
         }
		 }
		}
		?>

</table>





<table width="100%" border="0" class='taulaA'>
      <tr>
        <td width="15%">
          <input name="submit5" type="button" class='cabecera2' value="Añadir Cultivo No Comprometido" onClick="addRow2('dataTable4','num_culnc')">
          <input id="num_culnc" name="num_culnc"  type="hidden" value="<?php echo isset($_SESSION['datos_agricola']['num_culnc']) ? htmlspecialchars($_SESSION['datos_agricola']['num_culnc']) : $num_cultnocomp ?>" >
          <input name="submit4" type="button" class='cabecera2' value="Eliminar Cultivo No Comprometido" onClick="deleteRow10('dataTable4');">
        </td>
      </tr>
</table>




<table width="100%" border="1" class='taulaA' id="dataTable4" >

	<tr>
		<td width="1%" align="center" class="cabecera2" id="blau"></td>
		<td width="6%" align="center" class="cabecera2" id="blau">Cultivo</td>
		<td width="13%" align="center" class="cabecera2" id="blau">Descripcion</td>


		<?php
		 if($periodo == 1)
		 {
		?>
				<td width="7%" align="center" class="cabecera2" id="blau">Ver. Año 2014</td>
				<td width="7%" align="center" class="cabecera2" id="blau">Inv. Año 2014</td>
				<td width="7%" align="center" class="cabecera2" id="blau">Ver. Año 2015</td>
				<td width="7%" align="center" class="cabecera2" id="blau">Inv. Año 2015</td>
				<td width="7%" align="center" class="cabecera2" id="blau">Ver. Año 2016</td>
				<td width="7%" align="center" class="cabecera2" id="blau">Inv. Año 2016</td>
				<td width="7%" align="center" class="cabecera2" id="blau">Ver. Año 2017</td>
				<td width="7%" align="center" class="cabecera2" id="blau">Inv. Año 2017</td>
				<td width="7%" align="center" class="cabecera2" id="blau">Ver. Año 2018</td>
				<td width="7%" align="center" class="cabecera2" id="blau">Inv. Año 2018</td>
			<?php
			 }
			 elseif ($periodo == 2) {
			?>
				<td width="7%" align="center" class="cabecera2" id="blau">Ver. Año 2016</td>
				<td width="7%" align="center" class="cabecera2" id="blau">Inv. Año 2016</td>
				<td width="7%" align="center" class="cabecera2" id="blau">Ver. Año 2017</td>
				<td width="7%" align="center" class="cabecera2" id="blau">Inv. Año 2017</td>
				<td width="7%" align="center" class="cabecera2" id="blau">Ver. Año 2018</td>
				<td width="7%" align="center" class="cabecera2" id="blau">Inv. Año 2018</td>
				<td width="7%" align="center" class="cabecera2" id="blau">Ver. Año 2019</td>
				<td width="7%" align="center" class="cabecera2" id="blau">Inv. Año 2019</td>
				<td width="7%" align="center" class="cabecera2" id="blau">Ver. Año 2020</td>
				<td width="7%" align="center" class="cabecera2" id="blau">Inv. Año 2020</td>
			<?php
				}
			 ?>
	</tr>


<!-- oculta el combo cultivo que carga en javascript -->
			<div style="display:none">
				<select name="combocultivo" onChange="" class="combos" id="combocultivo" disabled >
					<option value=0>ELEGIR ...</option>
					<?php
				do {   ?>
					<option value="<?php echo $row_combocultivo['idcultivo']?>"

						 > <?php echo $row_combocultivo['nombrecultivo']?></option>
					<?php
				} while ($row_combocultivo = pg_fetch_assoc($combocultivo));	?>
				</select>
			</div>
<!--  -->


    <?php
			if(isset($_SESSION['datos_agricola']['num_culnc'])&&($_SESSION['datos_agricola']['num_culnc']>0))
			 {
				 $numnc=$_SESSION['datos_agricola']['num_culnc'];
			 }
			 else
			 {
				 $numnc=$num_cultnocomp;
			 }
     ?>

    <?php

		 for ($i = 1; $i <=$numnc ; $i++)
     {

		 ?>
          <tr>

          <td id="blau7" rowspan = "2" ><input  type="checkbox" id="<?php echo 'chk'.$i; ?>" name="<?php echo 'chk'.$i; ?>" ></td>

          <td align="center" class="celdaRCIA" id="blau22" rowspan="2" >
            <select name="<?php echo 'cultivonocomp'.$i; ?>" class="combos" onChange="<?php echo 'duplicado2(this,'.$i.')'; ?>"  id="<?php echo 'cultivonocomp'.$i; ?>" >
              <option value=0>ELEGIR ...</option>
              <?php
            ///cambiar este codigo
             $sql_cultivo1 = "select * FROM cultivo as c Order by nombrecultivo";
             $cultivo1 = pg_query($cn,$sql_cultivo1) ;
             $row_cultivo1 = pg_fetch_array ($cultivo1);

            do {   ?>
                  <option value="<?php echo $row_cultivo1['idcultivo']?>"
                      <?php
  										if(isset($_SESSION['datos_agricola']['cultivo'.$i])&&($_SESSION['datos_agricola']['cultivo'.$i]== $row_cultivo1['idcultivo']))
											{
												echo "selected";
									    }
											elseif(isset($row_cultivonocomp['idcultivo']) && $row_cultivonocomp['idcultivo']== $row_cultivo1['idcultivo'])
											{
												echo "selected";
											}
											?>
			                > <?php echo $row_cultivo1['nombrecultivo']?>
										</option>
                  <?php
                } while ($row_cultivo1 = pg_fetch_assoc($cultivo1));?>
            </select>
          </td>

            <td align="center" class="celdaRCIAEjecutado" id="blau18" >Ejecutado</td>
            <td align="center" class="celdaRCIAEjecutado" id="blau19"><INPUT <?php if ((($ano_1 == 1)||($ano_1 == 3))==false) {?> disabled <?php }?> name="<?php echo 'SupVeranoncE1'.$i; ?>" type="text" class="boxBusqueda4" id="<?php echo 'SupVeranoncE1'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value=" <?php  if($row_rciaagricolanc1['ve1'] == null){ echo ('0');} else{ echo $row_rciaagricolanc1['ve1']; } ?> "  ></td>
            <td align="center" class="celdaRCIAEjecutado" id="blau19"><INPUT <?php if ((($ano_1 == 1)||($ano_1 == 3))==false) {?> disabled <?php }?> name="<?php echo 'SupInviernoncE1'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupInviernoncE1'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="  <?php if($row_rciaagricolanc1['ie1'] == null){ echo ('0');} else{ echo $row_rciaagricolanc1['ie1']; } ?>" ></td>
            <td align="center" class="celdaRCIAEjecutado" id="blau19"><INPUT <?php if ((($ano_2 == 2)||($ano_2 == 4))==false) {?> disabled <?php }?> name="<?php echo 'SupVeranoncE2'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupVeranoncE2'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php  if($row_rciaagricolanc2['ve2'] == null){ echo ('0');} else{ echo $row_rciaagricolanc2['ve2']; } ?>" ></td>
            <td align="center" class="celdaRCIAEjecutado" id="blau19"><INPUT <?php if ((($ano_2 == 2)||($ano_2 == 4))==false) {?> disabled <?php }?> name="<?php echo 'SupInviernoncE2'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupInviernoncE2'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value=" <?php if($row_rciaagricolanc2['ie2'] == null){ echo ('0');} else{ echo $row_rciaagricolanc2['ie2']; } ?> " ></td>
            <td align="center" class="celdaRCIAEjecutado" id="blau19"><INPUT <?php if ((($ano_3 == 3)||($ano_3 == 5))==false) {?> disabled <?php }?> name="<?php echo 'SupVeranoncE3'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupVeranoncE3'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value=" <?php  if($row_rciaagricolanc3['ve3'] == null){ echo ('0');} else{ echo $row_rciaagricolanc3['ve3']; } ?> "  ></td>
            <td align="center" class="celdaRCIAEjecutado" id="blau19"><INPUT <?php if ((($ano_3 == 3)||($ano_3 == 5))==false) {?> disabled <?php }?> name="<?php echo 'SupInviernoncE3'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupInviernoncE3'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value=" <?php if($row_rciaagricolanc3['ie3'] == null){ echo ('0');} else{ echo $row_rciaagricolanc3['ie3']; } ?> " ></td>
            <td align="center" class="celdaRCIAEjecutado" id="blau19"><INPUT <?php if ((($ano_4 == 4)||($ano_4 == 6))==false) {?> disabled <?php }?> name="<?php echo 'SupVeranoncE4'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupVeranoncE4'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value=" <?php  if($row_rciaagricolanc4['ve4'] == null){ echo ('0');} else{ echo $row_rciaagricolanc4['ve4']; } ?> "  ></td>
            <td align="center" class="celdaRCIAEjecutado" id="blau19"><INPUT <?php if ((($ano_4 == 4)||($ano_4 == 6))==false) {?> disabled <?php }?> name="<?php echo 'SupInviernoncE4'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupInviernoncE4'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php if($row_rciaagricolanc4['ie4'] == null){ echo ('0');} else{ echo $row_rciaagricolanc4['ie4']; } ?> " ></td>
            <td align="center" class="celdaRCIAEjecutado" id="blau19"><INPUT <?php if ((($ano_5 == 5)||($ano_5 == 7))==false) {?> disabled <?php }?> name="<?php echo 'SupVeranoncE5'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupVeranoncE5'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value=" <?php  if($row_rciaagricolanc5['ve5'] == null){ echo ('0');} else{ echo $row_rciaagricolanc5['ve5']; } ?> " ></td>
            <td align="center" class="celdaRCIAEjecutado" id="blau19"><INPUT <?php if ((($ano_5 == 5)||($ano_5 == 7))==false) {?> disabled <?php }?> name="<?php echo 'SupInviernoncE5'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'SupInviernoncE5'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value=" <?php if($row_rciaagricolanc5['ie5'] == null){ echo ('0');} else{ echo $row_rciaagricolanc5['ie5']; } ?> " ></td>
          </tr>

          <tr>
          <td align="center" class="celdaRCIAProduccion" id="blau7" >Produccion obtenida en el Área Regularizada (Kg.)</td>
          <td align="center" class="celdaRCIAProduccion" id="blau19"><INPUT <?php if ((($ano_1 == 1)||($ano_1 == 3))==false) {?> disabled <?php }?> name="<?php echo 'Veranokgnc1'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'Veranokgnc1'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value=" <?php if($row_rciaagricolanc1['pv1'] == null){ echo ('0');} else{ echo $row_rciaagricolanc1['pv1']; } ?> " ></td>
          <td align="center" class="celdaRCIAProduccion" id="blau19"><INPUT <?php if ((($ano_1 == 1)||($ano_1 == 3))==false) {?> disabled <?php }?> name="<?php echo 'Inviernokgnc1'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'Inviernokgnc1'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value=" <?php if($row_rciaagricolanc1['pi1'] == null){ echo ('0');} else{ echo $row_rciaagricolanc1['pi1']; } ?> " ></td>
          <td align="center" class="celdaRCIAProduccion" id="blau19"><INPUT <?php if ((($ano_2 == 2)||($ano_2 == 4))==false) {?> disabled <?php }?> name="<?php echo 'Veranokgnc2'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'Veranokgnc2'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value=" <?php if($row_rciaagricolanc2['pv2'] == null){ echo ('0');} else{ echo $row_rciaagricolanc2['pv2']; } ?>  " ></td>
          <td align="center" class="celdaRCIAProduccion" id="blau19"><INPUT <?php if ((($ano_2 == 2)||($ano_2 == 4))==false) {?> disabled <?php }?> name="<?php echo 'Inviernokgnc2'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'Inviernokgnc2'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value=" <?php if($row_rciaagricolanc2['pi2'] == null){ echo ('0');} else{ echo $row_rciaagricolanc2['pi2']; } ?> " ></td>
          <td align="center" class="celdaRCIAProduccion" id="blau19"><INPUT <?php if ((($ano_3 == 3)||($ano_3 == 5))==false) {?> disabled <?php }?> name="<?php echo 'Veranokgnc3'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'Veranokgnc3'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value=" <?php if($row_rciaagricolanc3['pv3'] == null){ echo ('0');} else{ echo $row_rciaagricolanc3['pv3']; } ?> " ></td>
          <td align="center" class="celdaRCIAProduccion" id="blau19"><INPUT <?php if ((($ano_3 == 3)||($ano_3 == 5))==false) {?> disabled <?php }?> name="<?php echo 'Inviernokgnc3'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'Inviernokgnc3'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value=" <?php if($row_rciaagricolanc3['pi3'] == null){ echo ('0');} else{ echo $row_rciaagricolanc3['pi3']; } ?> "  ></td>
          <td align="center" class="celdaRCIAProduccion" id="blau19"><INPUT <?php if ((($ano_4 == 4)||($ano_4 == 6))==false) {?> disabled <?php }?> name="<?php echo 'Veranokgnc4'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'Veranokgnc4'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"  value=" <?php if($row_rciaagricolanc4['pv4'] == null){ echo ('0');} else{ echo $row_rciaagricolanc4['pv4']; } ?> " ></td>
          <td align="center" class="celdaRCIAProduccion" id="blau19"><INPUT <?php if ((($ano_4 == 4)||($ano_4 == 6))==false) {?> disabled <?php }?> name="<?php echo 'Inviernokgnc4'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'Inviernokgnc4'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value="  <?php if($row_rciaagricolanc4['pi4'] == null){ echo ('0');} else{ echo $row_rciaagricolanc4['pi4']; } ?> "  ></td>
          <td align="center" class="celdaRCIAProduccion" id="blau19"><INPUT <?php if ((($ano_5 == 5)||($ano_5 == 7))==false) {?> disabled <?php }?> name="<?php echo 'Veranokgnc5'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'Veranokgnc5'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value=" <?php if($row_rciaagricolanc5['pv5'] == null){ echo ('0');} else{ echo $row_rciaagricolanc5['pv5']; } ?> " ></td>
          <td align="center" class="celdaRCIAProduccion" id="blau19"><INPUT <?php if ((($ano_5 == 5)||($ano_5 == 7))==false) {?> disabled <?php }?> name="<?php echo 'Inviernokgnc5'.$i; ?>" type="text" class="boxBusqueda4"  id="<?php echo 'Inviernokgnc5'.$i; ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" value=" <?php if($row_rciaagricolanc5['pi5'] == null){ echo ('0');} else{ echo $row_rciaagricolanc5['pi5']; } ?> " ></td>
          </tr>


          <?php

					if(!isset($_SESSION['datos_agricola']['num_cul']) && isset($row_cultivonocomp))
					{
						$row_cultivonocomp = pg_fetch_assoc($cultivoncomp);
						$row_rciaagricolanc1 = pg_fetch_assoc($rcia_agricolanc1);
						$row_rciaagricolanc2 = pg_fetch_assoc($rcia_agricolanc2);
						$row_rciaagricolanc3 = pg_fetch_assoc($rcia_agricolanc3);
						$row_rciaagricolanc4 = pg_fetch_assoc($rcia_agricolanc4);
						$row_rciaagricolanc5 = pg_fetch_assoc($rcia_agricolanc5);
					}



		 }

		?>

</table>







	  </td>
	</tr>





 </table>




<table border="0" width="95%" class="taulaA" align="center">
  <tr>
    <td width="11%"><span class="taulaH">5. Observaciones RCIA Agricola:</span></td>
	<td colspan="3" align="left" id='blau' ><textarea name="RAgricolaObservaciones" id="RAgricolaObservaciones" cols="110" rows="4" style="resize: none;" ><?php echo trim($obsagricolarcia['obs']);?></textarea></td>

  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>




<?php
 }
?>

<input id="guardarstepagrircia" class="boton verde formaBoton" type="submit" value="Guardar" name="guardarstepagrircia">



</form>
</div>
