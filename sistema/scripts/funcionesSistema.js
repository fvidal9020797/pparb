// *************************************************************************************
/////////// FUNCIONES PARA VALIDAR CARACTERES PERMITIDOS EN CAMPO DE TEXTO//////////////
// *************************************************************************************
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
			  var b=document.getElementById('suprestituir'+fila).value;
			 //formulario.Departamento.options[formulario.Departamento.selectedIndex].value
			  var a=document.getElementById('idtipoesparcimiento'+fila).selectedIndex;
			  var valor=combo.options[combo.selectedIndex].text;
			  var c=valor;//'4 x 7';
			  var c1=c.substring(0,1);
			  var c2=c.substring(4,5);
			  var cantidad=Math.round(10000*b/(c1*c2));
			  document.getElementById("cantplantin"+fila).value=cantidad;
			 SubtotalSupReforestar();
			 PrecioPlantin(fila);
			  
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
		
function habilitarmejoras(seleccion,identificador) {  //TPFP =1 superficie es tpfp 
		try {  
		      if (seleccion.checked){
				   document.getElementById(String(identificador)).disabled=false;
				// alert(nombre);
			   }else{
				   document.getElementById(String(identificador)).disabled=true;
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
		 { if(typeof document.getElementById('idtiporestitucion'+i) != 'undefined' && document.getElementById('idtiporestitucion'+i)!=null)
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
		    if(document.getElementById('suptpfprestsel').value>(parseInt(document.getElementById('supselstpfp').value)+parseInt(document.getElementById('supselstum').value)))
		    {alert("La suma de Superficie de especies a restituir en SEL es mayor q la superficie SEL a restituir");}
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
///////////////////////////////////Plan de Pagos//////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////

	
//////////////////////////calendario/////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
	
   
	  