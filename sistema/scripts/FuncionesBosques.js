*********************************************************************************************************************/
/********************************************Funciones comunes********************************************************/
function deleteRow(tableID) {
	 {
			v table = document.getElementById(tableID);
			varwCount = table.rows.length;
			for(va=0; i<rowCount; i++) {
					var rowtable.rows[i];
					var chkboxrow.cells[0].childNodes[0];
					if(null != chx && true == chkbox.checked) {
						table.deleteRow;
						rowCount--;
					-;
					}
			   }
		}catch(e)
			aler);
		}
}function deleteEspecies(table {
	y {
		    var table = document.getElementBytableID);		var rowCount = table.rows.length;
  			for(var i=0<rowCount; i++) {
					var row = tablows[i];
					var chkbox = row.cells[0hildNodes[0];
					if(null != box && true == chkbox.checked) {
						table.dteRow(i);
						rowCount--;
						i--;
					}
	        }
			  SubtotalSupReestar();
			}catch {
				aler);
			}
/************************************************************************************************************/
/*****************************************funciones parte bosques***********************************************************/


function CantPlantin(combo,fila) {
	try {
			  var b=document.getElementById('suprestituir'+fila).value;
		      var a=documenetElemenId('idtipoesparcimiento'+fila).selectedIndex;

		//	alert('AQUI ENTRO');

			  var valor=combo.options[combo.selectedIndex].text;
			  if(valor!="Elegir.."){
				  var c=v.split('x');//'4 x 7';
				  var c1=c[0];//c.substring(0,1);
				  var c2=c[1];//c.substring(4,5);
				  var cantidad=Math.round(10000*b/(parseFloat(c1)*parseFloat(c2)));
				  document.getElementById("cantplantin"+fila).value=cantidad;

				  SubtotalSupReforestar();
				  PrecioPlantin(fila);
			  }else{
			  	alert('Elegir Tipo de Espaciamiento');
			  }

			}catch(e) {
				alert(e);
		}
}

function PrecioPlantin(fila) {
		try {
		      var b=documenElementById('canantin'+fila).va;
		/formulario.Departamento.options[formrio.Deparmento.selectedIndex].value
			  var a=document.getElementById('precioplantin'+fila).value;
			  var cantidad=Math.round(b*a*100)/100;
			  document.getElementById("pretotalplantines"+fila).value=cantidad;
			  document.getElementById("preciomo"+fila).value=Math.round(2.5*b*100)/100;
			  document.getElementById("preciomantenimiento"+fila).value=Math.round(25.6*b*100)/100;
			  document.getElementById("precioseguimiento"+fila).value=Math.round(1.92*b*100)/100;
			  Subtotalplantin(fila);
			}catch(e) {
				alert(e);
			}
}

function cambiotpfp() {
		try {
			var suptpfp = document.getElementById("suptpfp").value;
		  suptum = docut.getEentById("suptum").value;
			vsupselstp= document.getElementById("supselstpfp").value;
			var supstum = document.getElementById("supselstum").value;
			var supmejoras= document.getElementById("supmejoras").value;

			if(stpfp==""){suptpfp=0; document.getElementById("suptpfp").value=0;}		if(suptum==""){suptum=0; document.getElementById("suptum").value=
			if(supmejoras==""){supmejoras=0; document.getElementById("supmejoras").value=0;}
			if(supselstpfp==""){supselstpfp=0; document.getElementById("supselstpfp").value=0;}
			if(supselstum==""){supselstum=0; document.getElementById("supselstum").value=0;}

			var supdefilegal=(Math.round((parseFloat(suptpfp)+parseFloat(suptum))*10000)/10000);
			var supreftpfp=(Math.round((parseFloat(suptpfp)/10)*10000000);
			var supalitpfp = parseFloat(suptpfp)-(parseFloat(supreftpfp)+parseFloat(supselstpfp));
			var supalitum = parseFloat(suptum)-parseFloat(supselstum);
			supalitpfp =Math.round(supalitpfp*10000)/10000;
			supalitum=Math.round(supalitum*10000)/10000;

			document.getElementById("supdefilegal").value=supdefilegal;
			document.getElementById("supreftpf").value=supreftpfp;
			document.getElementById("slitpfp").value= supalitpfp;
			document.getElementById("supalit").value=supalitum;
			document.getElementById("supprodali").value=supalitpfp+supalitum-supmejoras;

			}catch(e) {
				alert(e);
			}
		}

function habilitarmejoras(seleccion,identificador,tipo) {  //TPFP =1 superficie es tpfp
		try {
		      if (seleccion.checked){

				   document.getElementById("supmejoratpfp"+String(identificador)).disabled=false;
				   document.getElementById("supmejoratum"+String(identificador)).disabled=false;
				   document.getElementById("supmejoratpfp"+String(identificador)).setAttribute('class','boxBusqueda4');
				   document.getElementById("supmejoratum"+String(identificador)).setAttribute('class','boxBusqueda4');
				   if (tipo==2){
					   document.getElementById("supmejoratpfppas"+String(identificador)).disabled=false;
					   document.getElementById("supmejoratumpas"+String(identificador)).disabled=false;
					   document.getElementById("supmejoratpfppas"+String(identificador)).setAttribute('class','boxBusqueda4');
				       document.getElementById("supmejoratumpas"+String(identificador)).setAttribute('class','boxBusqueda4');
				   }

			   }else{

				   document.getElementById("supmejoratpfp"+String(identificador)).disabled=true;
				   document.getElementById("supmejoratum"+String(identificador)).disabled=true;
				   document.getElementById("supmejoratpfp"+String(identificador)).setAttribute('class','boxBusqueda4m');
				   document.getElementById("supmejoratum"+String(identificador)).setAttribute('class','boxBusqueda4m');
				   if (tipo==2){
					   document.getElementById("supmejoratpfppas"+String(identificador)).disabled=true;
					   document.getElementById("supmejoratumpas"+String(identificador)).disabled=true;
					   document.getElementById("supmejoratpfppas"+String(identificador)).setAttribute('class','boxBusqueda4m');
				       document.getElementById("supmejoratumpas"+String(identificador)).setAttribute('class','boxBusqueda4m');
				   }
			   }
			}catch(e) {
				alert(e);
			}
}

function Subtotalplantin(fila) {
		try {
		      var b=parseFloat(document.getElementById('pretotalplantines'+fila).value);
			  var a=parseFloat(document.getElementById('preciomo'+fila).value);
			  var c=parseFloat(document.getElementById('preciomantenimiento'+fila).value);
			  var d=parseFloat(document.getElementById('precioseguimiento'+fila).value);
			  var e=parseFloat(document.getElementById('preciootrogastos'+fila).value);

			  if(isNaN(a)){a=0; }//document.getElementById("pretotalplantines"+fila).value=0;}
			  if(isNaN(b)){b=0; }//document.getElementById("preciomo"+fila).value=0;}
			  if(isNaN(c)){c=0; }//document.getElementById("preciomantenimiento"+fila).value=0;}
			  if(isNaN(d)){d=0; }//document.getElementById("precioseguimiento"+fila).value=0;}
			  if(isNaN(e)){e=0; }//document.getElementById("preciootrogastos"+fila).value=0;}
			// alert(e);
			  var cantidad=Math.round((a+b+c+d+e)*100)/100;
			  document.getElementById("presubtotal"+fila).value=cantidad;

			}catch(e) {
				alert(e);
			}
}
function SubtotalSupReforestar() {
		try {

			var Totaltpfp=0;
			var Totalsel=0;
			for(i=1;i<=document.getElementById('conteoEspecie').value ;i++)
			 {if(typeof document.getElementById('idtiporestitucion'+i) != 'undefined' && document.getElementById('idtiporestitucion'+i)!=null)
			   { if( document.getElementById('suprestituir'+i).value == ""){document.getElementById('suprestituir'+i).value=0;}
				 if(document.getElementById('idtiporestitucion'+i).value==113)
				  { Totaltpfp=Math.round((parseFloat(Totaltpfp)+parseFloat(document.getElementById('suprestituir'+i).value))*10000)/10000;}
				 else{
				   Totalsel=Math.round((parseFloat(Totalsel)+parseFloat(document.getElementById('suprestituir'+i).value))*10000)/10000;
				 }
			   }

			 }
			 document.getElementById('suptpfprest').value=Totaltpfp;
			 document.getElementById('suptpfprestsel').value=Totalsel;
			// if(document.getElementById('suptpfprest').value>document.getElementById('supreftpfp').value)
			//{alert("La suma de Superficie de especies a restituir en tpfp es mayor q la superficie TPFP a restituir");}
			//else{
			//	if(document.getElementById('suptpfprestsel').value>(parseInt(document.getElementById('supselstpfp').value)+parseInt(document.getElementById('supselstum').value)))
			//	{alert("La suma de Superficie de especies a restituir en SEL es mayor q la superficie SEL a restituir");}
			//}
	  }catch(e) {
		alert(e);
	  }
}

function CopyRow(fila) {
		try {

			ncientifico=document.getElementById('nombrecientifico'+fila).value;
			ncomun=document.getElementById('nombrecomun'+fila).value;
			superficie=document.getElementById('suprestituir'+fila).value;
			esparcimiento=document.getElementById('idtipoesparcimiento'+fila).value;
			cantplan=document.getElementById('cantplantin'+fila).value;
			pplantin=document.getElementById('precioplantin'+fila).value;
			ptplantin=document.getElementById('pretotalplantines'+fila).value;
			pmanodeobra=document.getElementById('preciomo'+fila).value;
			pmantenimiento=document.getElementById('preciomantenimiento'+fila).value;
			pseguimiento=document.getElementById('precioseguimiento'+fila).value;
			potrogasto=document.getElementById('preciootrogastos'+fila).value;
			tiporestitucion=document.getElementById('idtiporestitucion'+fila).value;
			idespecie=document.getElementById('idespeciecomun'+fila).value;
			psubtotal=document.getElementById('presubtotal'+fila).value;
			espe="especies"; //id de la tabla
			//alert(document.getElementById('idespeciecomun'+fila).value);
		addRowCopy(espe,ncientifico,ncomun,superficie,esparcimiento,cantplan,pplantin,ptplantin,pmanodeobra,pmantenimiento,pseguimiento,potrogasto,tiporestitucion,idespecie ,psubtotal)
		//addRowCopy(espe,ncientifico,ncomun,superficie,esparcimiento,cantplan,pplantin,ptplantin,pmanodeobra,pmantenimiento,pseguimiento,potrogasto,tiporestitucion,765 ,psubtotal)
		//alert(psubtotal);
			}catch(e) {
				alert(e);
			}
}

 function addRowCopy(tableID,ncientifico,ncomun,superficie,esparcimiento,cantplan,pplantin,ptplantin,pmanodeobra,pmantenimiento,pseguimiento,potrogasto,tiporestitucion,idespecie,psubtotal) {

	var aux = document.getElementById("conteoEspecie");
	var num = parseInt(aux.value);
	var table = document.getElementById(tableID);
	var rowCount = num;
	var lastRow = table.rows.length;
	num = num+1;//alert(num);
	var row = table.insertRow(lastRow);

	var cell1 = row.insertCell(0);   //celda 4
	var element1 = document.createElement("input");
	element1.type = "checkbox";
	cell1.appendChild(element1);

	var cell0=row.insertCell(1);
	var element0 = document.createElement("input");
	element0.type = "image";
	element0.setAttribute('src',"../images/copiara.gif");
	element0.setAttribute('alt','EspeciesCopy');
	element0.setAttribute('border','1');
    element0.setAttribute('onClick','CopyRow('+num+');return false');
	cell0.appendChild(element0);

	var cell1 = row.insertCell(2);   //celda 1
	var element1 = document.createElement("select");
	element1.name = "anorestituir" + num;
	element1.id = "anorestituir" + num;
	element1.options[0]=new Option("Elegir..","0");
	element1.options[1]=new Option("2014","1");
	//if(document.getElementById('comborestituir').options[i].value==esparcimiento ){element1.options[i].selected = true;}
	element1.options[2]=new Option("2015","2");
	element1.options[3]=new Option("2016","3");
	element1.options[4]=new Option("2017","4");
	element1.options[5]=new Option("2018","5");
	element1.setAttribute('class','combos');
	cell1.appendChild(element1);






	var cell2 = row.insertCell(3);   //celda 2
	var element2 = document.createElement("input");
	element2.type = "text";
	element2.name = "mesini" + num;
	element2.id = "mesini" + num;
	element2.setAttribute('class','boxBusqueda5');
	element2.setAttribute('onkeypress','blockNonNumbers(this, event, true, false)');
	element2.setAttribute('onkeyup','extractNumber(this,0,false)');
	cell2.appendChild(element2);

	var cell3 = row.insertCell(4);   //celda 3
	var element3 = document.createElement("input");
	element3.type = "text";
	element3.name = "mesfin" + num;
	element3.id = "mesfin" + num;
	element3.setAttribute('class','boxBusqueda5');
	element3.setAttribute('onkeypress','blockNonNumbers(this, event, true, false)');
	element3.setAttribute('onkeyup','extractNumber(this,0,false)');
	cell3.appendChild(element3);

	var cell4 = row.insertCell(5);   //celda 4
	var element4 = document.createElement("input");
	element4.type = "text";
	element4.name = "nombrecientifico" + num;
	element4.id = "nombrecientifico" + num;
	element4.value = ncientifico;
	element4.setAttribute('class','boxBusqueda');
	element4.setAttribute('readonly','true');
	cell4.appendChild(element4);

	var cell5 = row.insertCell(6);   //celda 5
	var element5 = document.createElement("input");
	element5.type = "text";
	element5.name = "nombrecomun" + num;
	element5.id = "nombrecomun" + num;
	element5.value = ncomun;
	element5.setAttribute('class','boxBusqueda4');
	element5.setAttribute('onkeyup','extractNumber(this,4,false)');
	element5.setAttribute('readonly','true');
	cell5.appendChild(element5);

	var cell6 = row.insertCell(7);   //celda 6
	var element6 = document.createElement("input");
	element6.type = "text";
	element6.name = "suprestituir" + num;
	element6.id = "suprestituir" + num;
	element6.value=superficie;
	element6.setAttribute('class','boxBusqueda1');
	element6.setAttribute('onkeypress','blockNonNumbers(this, event, true, false)');
	element6.setAttribute('onkeyup','extractNumber(this,4,false)');
	element6.setAttribute('onChange','CantPlantin(idtipoesparcimiento'+num+','+num+')');
	cell6.appendChild(element6);

	//esparcimiento

	var cell7 = row.insertCell(8);   //celda2 CI
	var element7 = document.createElement("select");
	element7.name ="idtipoesparcimiento"+String(num);
	element7.id="idtipoesparcimiento"+String(num);
	element7.options[0]=new Option("Elegir..","0");

	for(i=1;i<document.getElementById('espaciamiento').length ;i++)
	{  element7.options[i]=new Option(document.getElementById('espaciamiento').options[i].text, document.getElementById('espaciamiento').options[i].value);
		if(document.getElementById('espaciamiento').options[i].value==esparcimiento ){element7.options[i].selected = true;}
	}

	element7.setAttribute('class','combos');
	element7.setAttribute('onChange','CantPlantin(this,'+num+')');
	cell7.appendChild(element7);

	var cell8 = row.insertCell(9);   //celda 6
	var element8 = document.createElement("input");
	element8.type = "text";
	element8.name = "cantplantin" + num;
	element8.id = "cantplantin" + num;
	element8.value=cantplan;
	element8.setAttribute('class','boxBusqueda1');
	element8.setAttribute('readonly','true');
	cell8.appendChild(element8);

	var cell9 = row.insertCell(10);   //celda 6
	var element9 = document.createElement("input");
	element9.type = "text";
	element9.name = "precioplantin" + num;
	element9.id = "precioplantin" + num;
	element9.value=pplantin;
	element9.setAttribute('class','boxBusqueda1');
	element9.setAttribute('onkeypress','blockNonNumbers(this, event, true, false)');
	element9.setAttribute('onkeyup','extractNumber(this,2,false)');
	element9.setAttribute('onChange','PrecioPlantin('+num+')');
	cell9.appendChild(element9);

	var cell10 = row.insertCell(11);   //celda 6
	var element10 = document.createElement("input");
	element10.type = "text";
	element10.name = "pretotalplantines" + num;
	element10.id = "pretotalplantines" + num;
	element10.value=ptplantin;
	element10.setAttribute('class','boxBusqueda1');
	element10.setAttribute('onkeypress','blockNonNumbers(this, event, true, false)');
	element10.setAttribute('onkeyup','extractNumber(this,2,false)');
	cell10.appendChild(element10);

	var cell11 = row.insertCell(12);   //celda 6
	var element11 = document.createElement("input");
	element11.type = "text";
	element11.name = "preciomo" + num;
	element11.id = "preciomo" + num;
	element11.value=pmanodeobra;
	element11.setAttribute('class','boxBusqueda1');
	element11.setAttribute('onkeypress','blockNonNumbers(this, event, true, false)');
	element11.setAttribute('onkeyup','extractNumber(this,2,false)');
	element11.setAttribute('onchange','Subtotalplantin('+num+')');
	cell11.appendChild(element11);

	var cell12 = row.insertCell(13);   //celda 6
	var element12 = document.createElement("input");
	element12.type = "text";
	element12.name = "preciomantenimiento" + num;
	element12.id = "preciomantenimiento" + num;
	element12.value=pmantenimiento;
	element12.setAttribute('class','boxBusqueda1');
	element12.setAttribute('onkeypress','blockNonNumbers(this, event, true, false)');
	element12.setAttribute('onkeyup','extractNumber(this,2,false)');
	element12.setAttribute('onchange','Subtotalplantin('+num+')');
	cell12.appendChild(element12);

	var cell13 = row.insertCell(14);   //celda 6
	var element13= document.createElement("input");
	element13.type = "text";
	element13.name = "precioseguimiento" + num;
	element13.id = "precioseguimiento" + num;
	element13.value=pseguimiento;
	element13.setAttribute('class','boxBusqueda1');
	element13.setAttribute('onkeypress','blockNonNumbers(this, event, true, false)');
	element13.setAttribute('onkeyup','extractNumber(this,2,false)');
	element13.setAttribute('onchange','Subtotalplantin('+num+')');
	cell13.appendChild(element13);

	var cell14 = row.insertCell(15);   //celda 6
	var element14= document.createElement("input");
	element14.type = "text";
	element14.name = "preciootrogastos" + num;
	element14.id = "preciootrogastos" + num;
	element14.value=potrogasto;
	element14.setAttribute('class','boxBusqueda1');
	element14.setAttribute('onkeypress','blockNonNumbers(this, event, true, false)');
	element14.setAttribute('onkeyup','extractNumber(this,2,false)');
	element14.setAttribute('onchange','Subtotalplantin('+num+')');
	cell14.appendChild(element14);

	var cell15 = row.insertCell(16);   //celda0
	var element15 = document.createElement("select");
	element15.name ="idtiporestitucion"+String(num);
	element15.id="idtiporestitucion"+String(num);
	//element15.value=tiporestitucion;
	element15.options[0]=new Option("TPFP","113");element15.options[1]=new Option("SEL","114");
	element15.options[2]=new Option("UP-CAM","175");element15.options[3]=new Option("UP-CRV","176");
	element15.options[4]=new Option("UP-H","177");element15.options[5]=new Option("UP-L","178");
	element15.options[6]=new Option("UP-TP/S","179");element15.options[7]=new Option("UP-FPR","180");
	element15.setAttribute('onChange','SubtotalSupReforestar()');
	element15.setAttribute('class','combos');
	cell15.appendChild(element15);
	//idespecie,psubtotal

	var cell16 = row.insertCell(17);   //celda 6
	var element16 = document.createElement("input");
	element16.type = "text";
	element16.name = "presubtotal" + num;
	element16.id = "presubtotal" + num;
	element16.value=psubtotal;
	element16.setAttribute('class','boxBusqueda1');
	element16.setAttribute('onkeypress','blockNonNumbers(this, event, true, false)');
	element16.setAttribute('onkeyup','extractNumber(this,2,false)');
	cell16.appendChild(element16);

	var element17 = document.createElement("input");
	element17.type = "hidden";
	element17.value = idespecie;
	element17.name = "idespeciecomun" + num;
	element17.id = "idespeciecomun" + num;
	cell16.appendChild(element17);
	aux.value = num;
	SubtotalSupReforestar();/**/
}


//////////////////////////calendario/////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
