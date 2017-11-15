// *************************************************************************************
/////////// FUNCIONES PARA VALIDAR CARACTERES PERMITIDOS EN CAMPO DE TEXTO//////////////
// *************************************************************************************

function onKeyPressBlockNumbers(e,type)
{
	var key = window.event ? e.keyCode : e.which;
	var keychar = String.fromCharCode(key);
	switch(type){
		case 1: //sin . , n�meros
			reg = /[\d<>!"�$%&\/\\()=?���|@#�'�,.\-;:_\*\+�`\[\]\{\}~~]/;
		break;
		case 2: //con . , / n�meros
			reg = /[<>!"�$%&\\()=?��|@�'�,\-;:_\*\+�`\[\]\{\}~~]/;
		break;
		case 3: //solo letras y n�meros
			reg = /[<>!"�$%&\\()=?���|@�'�,.\-;:_\*\+�`\[\]\{\}~~�\/�������������������������������������������]/;
		break;

		case 4: //solo letras sin espacio
			reg = /[ \d<>!"�$%&\\()=?���|@�'�,.\-;:_\*\+�`\[\]\{\}~~�\/�������������������������������������������]/;
		break;
		case 5: //solo letras y n�meros
			reg = /[<>!"�$%&\\()=?���|�'�,\;:\*\�`\[\]\/@#�{\}~~]/;
		break;
		case 6: //solo letras y n�meros
			reg = /[<>!"�$%&\\()=?���|�'�,\;:\*\�`\[\]\/._�^@#�{\}~~]/;
		break;
        case 7: //solo letras y n�meros
			reg = /[<>!"�$%&\\()=?���|�'�,\;:\*\�`\[\]\/#�{\}~~]/;
		break;
		case 8: //solo letras y n�meros
			reg = /[<>!"$%&\\()=?���|�'�,\;:\*\�`\[\]\/#�{\}~~]/;
		break;

		}
	return !reg.test(keychar);
}
function extractNumber(obj, decimalPlaces, allowNegative)
{
	var temp = obj.value;

	// avoid changing things if already formatted correctly
	var reg0Str = '[0-9]*';
	if (decimalPlaces > 0) {
		reg0Str += '\\.?[0-9]{0,' + decimalPlaces + '}';
	} else if (decimalPlaces < 0) {
		reg0Str += '\\.?[0-9]*';
	}
	reg0Str = allowNegative ? '^-?' + reg0Str : '^' + reg0Str;
	reg0Str = reg0Str + '$';
	var reg0 = new RegExp(reg0Str);
	if (reg0.test(temp)) return true;

	// first replace all non numbers
	var reg1Str = '[^0-9' + (decimalPlaces != 0 ? '.' : '') + (allowNegative ? '-' : '') + ']';
	var reg1 = new RegExp(reg1Str, 'g');
	temp = temp.replace(reg1, '');

	if (allowNegative) {
		// replace extra negative
		var hasNegative = temp.length > 0 && temp.charAt(0) == '-';
		var reg2 = /-/g;
		temp = temp.replace(reg2, '');
		if (hasNegative) temp = '-' + temp;
	}

	if (decimalPlaces != 0) {
		var reg3 = /\./g;
		var reg3Array = reg3.exec(temp);
		if (reg3Array != null) {
			// keep only first occurrence of .
			//  and the number of places specified by decimalPlaces or the entire string if decimalPlaces < 0
			var reg3Right = temp.substring(reg3Array.index + reg3Array[0].length);
			reg3Right = reg3Right.replace(reg3, '');
			reg3Right = decimalPlaces > 0 ? reg3Right.substring(0, decimalPlaces) : reg3Right;
			temp = temp.substring(0,reg3Array.index) + '.' + reg3Right;
		}
	}

	obj.value = temp;
}
function blockNonNumbers(obj, e, allowDecimal, allowNegative)
{
	var key;
	var isCtrl = false;
	var keychar;
	var reg;

	if(window.event) {
		key = e.keyCode;
		isCtrl = window.event.ctrlKey
	}
	else if(e.which) {
		key = e.which;
		isCtrl = e.ctrlKey;
	}

	if (isNaN(key)) return true;

	keychar = String.fromCharCode(key);

	// check for backspace or delete, or if Ctrl was pressed
	if (key == 8 || isCtrl)
	{
		return true;
	}

	reg = /\d/;
	var isFirstN = allowNegative ? keychar == '-' && obj.value.indexOf('-') == -1 : false;
	var isFirstD = allowDecimal ? keychar == '.' && obj.value.indexOf('.') == -1 : false;

	return isFirstN || isFirstD || reg.test(keychar);
}

// ******************************************************************************************
/////////////////// FUNCIONES PARA VALIDACION DE FORMULARIOS/////////////////////////////////
// ******************************************************************************************
function Validar(Cadena){
    var Fecha= new String(Cadena)   // Crea un string
    var RealFecha= new Date()   // Para sacar la fecha de hoy
    //Cadena A�o
    var Ano= new String(Fecha.substring(Fecha.lastIndexOf("-")+1,Fecha.length))
    // Cadena Mes
    var Mes= new String(Fecha.substring(Fecha.indexOf("-")+1,Fecha.lastIndexOf("-")))
    // Cadena D�a
    var Dia= new String(Fecha.substring(0,Fecha.indexOf("-")))

    // Valido el a�o
    if (isNaN(Ano) || Ano.length<4 || parseFloat(Ano)<1900 || Ano.length>4 || parseFloat(Ano)>2015){
            alert('Gestion invalida')
        return false
    }
    // Valido el Mes
    if (isNaN(Mes) || parseFloat(Mes)<1 || parseFloat(Mes)>12){
        alert('Mes invalido')
        return false
    }
    // Valido el Dia
    if (isNaN(Dia) || parseInt(Dia, 10)<1 || parseInt(Dia, 10)>31){
        alert('Dia invalido')
        return false
    }
    if (Mes==4 || Mes==6 || Mes==9 || Mes==11 || Mes==2) {
        if (Mes==2 && Dia > 28 || Dia>30) {
            alert('Dia invalido')
            return false
        }
    }
}

/****************************************************************************************************************/
/**********************Validar la fecha **********************************************************************/
function dia_mes_ano(campo_1,campo_2,campo_3)
{   //document.getElementById('Cultivo0').options[i].text
    var c1=document.getElementById(campo_1);//.selectedIndex;//parseInt(campo_1);
	var campo1=c1.options[c1.selectedIndex].value;
	var c2=document.getElementById(campo_2);//.selectedIndex;//parseInt(campo_1);
	var campo2=c2.options[c2.selectedIndex].value;
	var c3=document.getElementById(campo_3);//.selectedIndex;//parseInt(campo_1);
	var campo3=c3.options[c3.selectedIndex].value;

    if( campo1>30 && (campo2==4 || campo2==6 || campo2==9 || campo2==11))
      {alert("Recuerde: La fecha '"+campo1+"/"+campo2+"/"+campo3+"' no es valida, intentelo nuevamente!!!");
	   return false;}
	else
	 {if( campo1>31 && (campo2==1 || campo2==3 || campo2==5 || campo2==8 || campo2==10 || campo2==12))
	     {alert("Recuerde: La fecha '"+campo1+"/"+campo2+"/"+campo3+"' no es valida, intentelo nuevamente!!!");
	  	  return false;}
	   else
		  {if( campo2==2 && campo1>=29 && (campo3%4)!=0 )
	        {alert("Recuerde: La fecha '"+campo1+"/"+campo2+"/"+campo3+"' no es valida, intentelo nuevamente!!!");
	  	     return false;}
		    else
			  {if(campo2>12 || campo2<=0 )
			    {alert("Error: La fecha '"+campo1+"/"+campo2+"/"+campo3+"' no es valida, intentelo nuevamente!!!");
	  	      return false;
				 }
			   else{return true;}
			}
		}
	}
}

/*********************************************************************************************************************/
/********************************************Funciones comunes********************************************************/
function deleteRow(tableID) {
	try {
			var table = document.getElementById(tableID);
			var rowCount = table.rows.length;
			for(var i=0; i<rowCount; i++) {
					var row = table.rows[i];
					var chkbox = row.cells[0].childNodes[0];
					if(null != chkbox && true == chkbox.checked) {
						table.deleteRow(i);
						rowCount--;
						i--;
					}
			   }

		}catch(e) {
			alert(e);
		}
}

function deleteRow2(tableID) {
	try {
			var table = document.getElementById(tableID);
			var rowCount = table.rows.length;

			//for (var x = 1; x <= 2; x++) {

				for(var i=0; i<rowCount; i++) {
						var row = table.rows[i];
						var chkbox = row.cells[0].childNodes[0];
						if(null != chkbox && true == chkbox.checked) {
							table.deleteRow(i+1);
							table.deleteRow(i);
							rowCount = rowCount - 2;
							i = i - 2;
						}
					 }

		//	}



		}catch(e) {
			alert(e);
		}
}




function deleteRowEspecies(tableID) {
		try {
		    var table = document.getElementById(tableID);
			var rowCount = table.rows.length;
  			for(var i=0; i<rowCount; i++) {
					var row = table.rows[i];
					var chkbox = row.cells[0].childNodes[0];
					if(null != chkbox && true == chkbox.checked) {
						table.deleteRow(i);
						rowCount--;
						i--;
					}
	           }

			  SubtotalSupReforestar();
			}catch(e) {
				alert(e);
			}
}
/*********************************************************************************************************************/
/*****************************************funciones parte bosques***********************************************************/

function CantPlantin(combo,fila) {
	try {
				var x = document.getElementById('idtiporestitucion'+fila).value;

				if (x == 325 || x ==326 || x ==324 || x ==327)
				{
					//				alert('aqui1');
					var b=document.getElementById('cantplantin'+fila).value;
					var a=document.getElementById('idtipoesparcimiento'+fila).selectedIndex;

						var valor=combo.options[combo.selectedIndex].text;
						var c=valor.split('x');
						var c1=c[0];
						var c2=c[1];

						var cantidad=((parseFloat(c1)*parseFloat(c2)*b)/10000);
						document.getElementById("suprestituir"+fila).value=cantidad;
						SubtotalSupReforestar();
						PrecioPlantin(fila);
				}
				else
				{
					//alert('aqui2');
					var b=document.getElementById('suprestituir'+fila).value;
					var a=document.getElementById('idtipoesparcimiento'+fila).selectedIndex;

					var valor=combo.options[combo.selectedIndex].text;
					var c=valor.split('x');//'4 x 7';
					//alert(c);
					var c1=c[0];
					//alert(c1);
					var c2=c[1];
					//alert(c2);

					var cantidad=Math.round(10000*b/(parseFloat(c1)*parseFloat(c2)));
					document.getElementById("cantplantin"+fila).value=cantidad;

					SubtotalSupReforestar();
					PrecioPlantin(fila);

				}




			}catch(e) {
				alert(e);
		}
}





function PrecioPlantin(fila) {
		try {
		      var b=document.getElementById('cantplantin'+fila).value;
			 //formulario.Departamento.options[formulario.Departamento.selectedIndex].value
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
			var suptum = document.getElementById("suptum").value;
			var supselstpfp = document.getElementById("supselstpfp").value;
			var supselstum = document.getElementById("supselstum").value;
			var supmejoras= document.getElementById("supmejoras").value;

			if(suptpfp==""){suptpfp=0; document.getElementById("suptpfp").value=0;}
			if(suptum==""){suptum=0; document.getElementById("suptum").value=0;}
			if(supmejoras==""){supmejoras=0; document.getElementById("supmejoras").value=0;}
			if(supselstpfp==""){supselstpfp=0; document.getElementById("supselstpfp").value=0;}
			if(supselstum==""){supselstum=0; document.getElementById("supselstum").value=0;}

			var supdefilegal=(Math.round((parseFloat(suptpfp)+parseFloat(suptum))*10000)/10000);
			var supreftpfp=(Math.round((parseFloat(suptpfp)/10)*10000)/10000);
			var supalitpfp = parseFloat(suptpfp)-(parseFloat(supreftpfp)+parseFloat(supselstpfp));
			var supalitum = parseFloat(suptum)-parseFloat(supselstum);
			supalitpfp =Math.round(supalitpfp*10000)/10000;
			supalitum=Math.round(supalitum*10000)/10000;

			document.getElementById("supdefilegal").value=supdefilegal;
			document.getElementById("supreftpfp").value=supreftpfp;
			document.getElementById("supalitpfp").value= supalitpfp;
			document.getElementById("supalitum").value=supalitum;
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
		 {
			 if(typeof document.getElementById('idtiporestitucion'+i) != 'undefined' && document.getElementById('idtiporestitucion'+i)!=null)
		   { if( document.getElementById('suprestituir'+i).value == ""){document.getElementById('suprestituir'+i).value=0;}

				 if( (document.getElementById('idtiporestitucion'+i).value==113) || (document.getElementById('idtiporestitucion'+i).value==324) || (document.getElementById('idtiporestitucion'+i).value==325) || (document.getElementById('idtiporestitucion'+i).value==326) || (document.getElementById('idtiporestitucion'+i).value==327)  )
			   {
					 Totaltpfp=Math.round((parseFloat(Totaltpfp)+parseFloat(document.getElementById('suprestituir'+i).value))*10000)/10000;
			   }
			 else{
			   Totalsel=Math.round((parseFloat(Totalsel)+parseFloat(document.getElementById('suprestituir'+i).value))*10000)/10000;
			 }
		  }

		 }

		 document.getElementById('suptpfprest').value=Totaltpfp;
		 document.getElementById('suptpfprestsel').value=Totalsel;

		/*if(document.getElementById('suptpfprestsel').value>(parseInt(document.getElementById('supselstpfp').value)+parseInt(document.getElementById('supselstum').value)))
		   {
				 alert("La suma de Superficie de especies a restituir en SEL es mayor q la superficie SEL a restituir");
			 }
			 */

	  }
		catch(e)
		{
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

			addRowCopy(espe,ncientifico,ncomun,superficie,esparcimiento,cantplan,pplantin,ptplantin,pmanodeobra,pmantenimiento,pseguimiento,potrogasto,tiporestitucion,idespecie ,psubtotal)


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





/*****************************************************************.......****************************************************/
/*****************************************funciones parte Ganadera***********************************************************/

function cabezasganado(cab) {
		try {  //alert(cab);
		      var a=document.getElementById('SupActGan').value;
			  var b=document.getElementById('SupGanLegal').value;
			  if(cab>4171 && cab<4175)
			  {document.getElementById("CantGanDef").value=Math.round(a/5);
			  }else{
			  document.getElementById("CantGanDef").value=Math.round(a/2.5);
			  }document.getElementById("CantGanleg").value=Math.round(b/5);

			}catch(e) {
				alert(e);
			}
}

function SumaVerticalG() {
		try { nombre="suppastosembrado";
		     alert("hola");
		      var a=document.getElementById('nombre'+1).value;
			  var b=document.getElementById('nombre'+2).value;
			  var c=document.getElementById('nombre'+3).value;
			  var d=document.getElementById('nombre'+4).value;
			  var e=document.getElementById('nombre'+5).value;

			  if(isNaN(a)){a=0; }//document.getElementById("pretotalplantines"+fila).value=0;}
			  if(isNaN(b)){b=0; }//document.getElementById("preciomo"+fila).value=0;}
			  if(isNaN(c)){c=0; }//document.getElementById("preciomantenimiento"+fila).value=0;}
			  if(isNaN(d)){d=0; }//document.getElementById("precioseguimiento"+fila).value=0;}
			  if(isNaN(e)){e=0; }//document.getElementById("preciootrogastos"+fila).value=0;}

			  document.getElementById("nombre"+t).value=a+b+c+d+e;

			}catch(e) {
				alert(e);
			}
}
/**********************************************************************************************************/
/*****************************************Recibo***********************************************************/
/**********************************************************************************************************/

function addRowRecibo(tableID,nfila) {

	var table = document.getElementById(tableID);
	var rowCount = table.rows.length;
	var row = table.insertRow(rowCount);
	var oculto=document.getElementById("num_recibo");
	oculto.value=parseInt(oculto.value)+1;
	var num=oculto.value;
	var valor=0;

	var cell1 = row.insertCell(0);   //celda 4
	var element1 = document.createElement("input");
	element1.type = "checkbox";
	cell1.appendChild(element1);

	var cell2 = row.insertCell(1);   //celda2 CI
	var element2 = document.createElement("select");
	element2.name ="FechaPago"+String(oculto.value);
	element2.id="FechaPago"+String(oculto.value);
	for(i=0;i<document.getElementById('FechaPago0').length ;i++)
	{ element2.options[i]=new Option(document.getElementById('FechaPago0').options[i].text, document.getElementById('FechaPago0').options[i].value);
	}
   	element2.setAttribute('class','boxBusqueda3m');
	element2.setAttribute('onChange','actualizavalor('+num+')');
	cell2.appendChild(element2);

	var element3 = document.createElement("input");
	element3.type = "hidden";
	element3.value = valor;
	element3.name = "montoufv" + num;
	element3.id = "montoufv" + num;
	cell2.appendChild(element3);

	var cell3 = row.insertCell(2);   //celda 3
	var element4 = document.createElement("input");
	element4.type = "text";
	element4.name = "numerocuota" + num;
	element4.id = "numerocuota" + num;
	element4.setAttribute('class','boxBusqueda4');
	element4.setAttribute('maxlength','2');
	element4.setAttribute('onkeypress','blockNonNumbers(this, event, true, false)');
	element4.setAttribute('onkeyup','extractNumber(this,0,false)');
	cell3.appendChild(element4);

	var element5 = document.createElement("input");
	element5.type = "hidden";
	element5.value = num;
	element5.name = "fila";
	element5.id = "fila";
	cell3.appendChild(element5);

	var cell6 = row.insertCell(3);   //celda 3
	var element6 = document.createElement("input");
	element6.type = "text";
	element6.name = "nboleta" + num;
	element6.id = "nboleta" + num;
	element6.setAttribute('class','boxBusqueda3');
	cell6.appendChild(element6);

	var cell5 = row.insertCell(4);   //celda 3
	var element5 = document.createElement("input");
	element5.type = "text";
	element5.name = "montodeposito" + num;
	element5.id = "montodeposito" + num;
	element5.setAttribute('class','boxBusqueda4');
	element5.setAttribute('onkeypress','blockNonNumbers(this, event, true, false)');
	element5.setAttribute('onkeyup','extractNumber(this,2,false)');
	element5.setAttribute('onChange','actualizavalor('+num+')');
	cell5.appendChild(element5);

	var cell7 = row.insertCell(5);   //celda 3
	var element7 = document.createElement("input");
	element7.type = "text";
	element7.name = "paproxbs" + num;
	element7.id = "paproxbs" + num;
	element7.setAttribute('class','boxBusqueda4');
	element7.setAttribute('onkeypress','blockNonNumbers(this, event, true, false)');
	element7.setAttribute('onkeyup','extractNumber(this,2,false)');
	cell7.appendChild(element7);


	/*var cell8=row.insertCell(6);
	var element8 = document.createElement("input");
	element8.type = "image";
	element8.setAttribute('src',"../images/folder_close.gif");
	//element8.setAttribute('alt','EspeciesCopy');
	element8.setAttribute('name','Guardar');
    element8.setAttribute('onClick','this.formulario.submit()');
	cell8.appendChild(element8);*/


}

function actualizavalor(fila){
	    var idufv=document.getElementById('FechaPago'+fila).selectedIndex;
	    var valor=document.getElementById('FechaPago'+fila).options[idufv].text;
		var varufv=valor.split(':');
		var vufv=varufv[1];

		var monto_cancelado=document.getElementById('montodeposito'+fila).value;
		if(isNaN(monto_cancelado)){monto_cancelado=0; }
		document.getElementById('paproxbs'+fila).value=Math.round(parseFloat(monto_cancelado/vufv)*100000)/100000;

}
function Habilitar(seleccion,identificador) {  //TPFP =1 superficie es tpfp
		try {
		      if (seleccion.checked){
				   document.getElementById('TxtSist'+String(identificador)).disabled=false;
				// alert('TxtSist'+String(identificador));
			   }else{
				   document.getElementById('TxtSist'+String(identificador)).disabled=true; //alert("hola");
				  }
			}catch(e) {
				alert(e);
			}
}






function SumaVerticalG(nombre) {
		try { //nombre="suppastosembrado";

		      var a=document.getElementById(nombre+1).value;
			  var b=document.getElementById(nombre+2).value;
			  var c=document.getElementById(nombre+3).value;
			  var d=document.getElementById(nombre+4).value;
			  var e=document.getElementById(nombre+5).value;
  //alert(b);
			  if(a.trim()==""){a=0; }//document.getElementById("pretotalplantines"+fila).value=0;}
			  if(b.trim()==""){b=0; }//document.getElementById("preciomo"+fila).value=0;}
			  if(c.trim()==""){c=0; }//document.getElementById("preciomantenimiento"+fila).value=0;}
			  if(d.trim()==""){d=0; }//document.getElementById("precioseguimiento"+fila).value=0;}
			  if(e.trim()==""){e=0; }//document.getElementById("preciootrogastos"+fila).value=0;}

			  document.getElementById(nombre+'t').value=parseFloat(a)+parseFloat(b)+parseFloat(c)+parseFloat(d)+parseFloat(e);

			}catch(e) {
				alert(e);
			}
}
///////////////////////////////////BLOQUEAR Y DESBLOQUEAR PANTALLA//////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////

function bloquearPantalla(){
	//$.blockUI({ message: '<h1><img src="vista/images/giphy.gif" class="img_gif_please_wait" /> Just a moment...</h1>' });
	$.blockUI({
		css:{ 
			backgroundColor: '#f00', 
			color: '#fff',
			draggable:false
		},
		onOverlayClick: $.unblockUI
	});  
	
}
function desbloquearPantalla(){
	$.unblockUI();
}




