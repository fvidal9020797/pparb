
   function cerosIzq(sVal, nPos){
    var sRes = sVal;
    for (var i = sVal.length; i < nPos; i++)
     sRes = "0" + sRes;
    return sRes;
   }
 
   function armaFecha(nDia, nMes, nAno){
    var sRes = cerosIzq(String(nAno), 4);
    sRes = sRes + "-" + cerosIzq(String(nMes), 2);
    sRes = sRes + "-" + cerosIzq(String(nDia), 2);
    return sRes;
   }
 
   function sumaMes(nDia, nMes, nAno, nSum){
    if (nSum >= 0){
     for (var i = 0; i < Math.abs(nSum); i++){
      if (nMes == 12){
       nMes = 1;
       nAno += 1;
      } else nMes += 1;
     }
    } else {
     for (var i = 0; i < Math.abs(nSum); i++){
      if (nMes == 1){
       nMes = 12;
       nAno -= 1;
      } else nMes -= 1;
     }
    }
    return armaFecha(nDia, nMes, nAno);
   }
 
   function calcula(fechaincial,nSum){ //fechainicial meses a sumar
   // var sFc0 = document.frm.fecha0.value; // Se asume válida
  // var nSum = parseInt(document.frm.meses.value); 
  
    var sFc1 = fechaincial;
     
     if (nSum>0){
	
	 var fecha=sFc1.split("-"); 
     var nDia = parseInt(fecha[2]);
     var nMes = parseInt(fecha[1]);
     var nAno = parseInt(fecha[0]);

     sFc1 = sumaMes(nDia, nMes, nAno, nSum);
    }
  //  document.frm.fecha1.value = sFc1;
     return sFc1;
   }



//////////////////.................plan pagos///////////////////////
////////////////////////////////////////////////////////////////////
function numcuota(tipo,anno,mes,dia){
		
		/////datos tabla//////
		var table = document.getElementById("dataTable");    
		var rowCount = table.rows.length;   
	   
		//eliminar filas de tabla menos la primra q es la cabecera//
		
	   	for(var i=1; i<rowCount; i++) {   
			table.deleteRow(1);  
			//alert(i);
	   	}   
		
		var a=tipo.value;
		var ufv=document.getElementById('valor_ufv').value;
	
		var cTufv= document.getElementById('pcontadoufvT').value;
		var pTufv=document.getElementById('pplazoufvT').value;
		
		if(cTufv.trim==""){cTufv=0;}
		if(pTufv.trim==""){pTufv=0;}
		
		var cTbs=Math.round(parseFloat(cTufv)*parseFloat(ufv)*100)/100;
		var pTbs=Math.round(parseFloat(pTufv)*parseFloat(ufv)*100)/100;
		var montocuotas=0;
		var montocuotasbs=0;
		var montoini=0;
		var montoinibs=0;
		var fechainicio=anno+'-'+mes+'-'+dia;
		var cuota=0;
		var divfecha; //nuero de meses a sumar
		switch(a)
		{
			case '96': //mesual
			    cuota=25;
				montoini=Math.round(parseFloat(pTufv)/2*100)/100;
				montoinibs=Math.round(parseFloat(pTbs)/2*100)/100;
				montocuotas=Math.round(parseFloat(pTufv/2)/24*100)/100;
				montocuotasbs=Math.round(parseFloat(pTbs/2)/24*100)/100; 
				document.getElementById('montototal').value=pTufv;
				document.getElementById('montototalbs').value=pTbs;
				divfecha=1;
				break;
			case '97': //trimestral
				cuota=9;
				montoini=Math.round(parseFloat(pTufv)/2*100)/100;
				montoinibs=Math.round(parseFloat(pTbs)/2*100)/100;
				montocuotas=Math.round(parseFloat(pTufv/2)/8*100)/100;
				montocuotasbs=Math.round(parseFloat(pTbs/2)/8*100)/100; 
				document.getElementById('montototal').value=pTufv;
				document.getElementById('montototalbs').value=pTbs;
				divfecha=3;
				 break;
			 case '98': //semestral
				cuota=5;
				montoini=Math.round(parseFloat(pTufv)/2*100)/100;
				montoinibs=Math.round(parseFloat(pTbs)/2*100)/100;
				montocuotas=Math.round(parseFloat(pTufv/2)/4*100)/100;
				montocuotasbs=Math.round(parseFloat(pTbs/2)/4*100)/100; 
				document.getElementById('montototal').value=pTufv;
				document.getElementById('montototalbs').value=pTbs;
				divfecha=6;
				break;
			 case '99': //anual
				cuota=3;
				montoini=Math.round(parseFloat(pTufv)/2*100)/100;
				montoinibs=Math.round(parseFloat(pTbs)/2*100)/100;
				montocuotas=Math.round(parseFloat(pTufv/2)/2*100)/100;
				montocuotasbs=Math.round(parseFloat(pTbs/2)/2*100)/100; 
				document.getElementById('montototal').value=pTufv;
				document.getElementById('montototalbs').value=pTbs;
				divfecha=12;
				 break;
			 case '100': //pago unico
				cuota=1;
				montoini=Math.round(parseFloat(cTufv)/1*100)/100;
				montoinibs=Math.round(parseFloat(cTbs)/1*100)/100;
				montocuotas=0;
				montocuotasbs=0;
				document.getElementById('montototal').value=cTufv;
				document.getElementById('montototalbs').value=cTbs;
				divfecha=1;
				 break;
			 case '104': //dos pagos
				cuota=2;
				montoini=Math.round(parseFloat(pTufv)/2*100)/100;
				montoinibs=Math.round(parseFloat(pTbs)/2*100)/100;
				montocuotas=Math.round(parseFloat(pTufv/2)*100)/100;
				montocuotasbs=Math.round(parseFloat(pTbs/2)*100)/100; 
				document.getElementById('montototal').value=pTufv;
				document.getElementById('montototalbs').value=pTbs;
				divfecha=24;
				 break;
			default:
			    cuota=0;
				montoini=0;
				montoinibs=0;
				montocuotas=0;
				montocuotasbs=0;
				document.getElementById('montototal').value=0;
				document.getElementById('montototalbs').value=0;
				divfecha=1;
		}
		
	    rowCount=1;
		
		if(cuota>=0){
			var row = table.insertRow(rowCount); 
			var cell0 = row.insertCell(0);   //celda 1
	        var element0 = document.createElement("input");
			element0.type = "text";  
			element0.name="Cuota0";
			element0.value='1';
			element0.setAttribute('class','boxBusqueda3');
            cell0.appendChild(element0);
			
			var cell1 = row.insertCell(1);   //celda 3
			var element1 = document.createElement("input");   
			element1.type = "text";  
			element1.name ="montoinicial";
			element1.id="montoinicial";
			element1.value=montoini;
			element1.setAttribute('class','boxBusqueda3');
			cell1.appendChild(element1); 
			
			var cell2 = row.insertCell(2);   //celda 3
			var element2 = document.createElement("input");   
			element2.type = "text";  
			element2.name ="montoinicialbs";
			element2.id="montoinicialbs";
			element2.value=montoinibs;
			element2.setAttribute('class','boxBusqueda3');
			cell2.appendChild(element2); 
			
			var cell3 = row.insertCell(3);   //celda 3
			var element3 = document.createElement("input");   
			element3.type = "text";  
			element3.name ="fechacuota0";
			element3.id="fechacuota0";
			
			element3.value=fechainicio;
			element3.setAttribute('class','boxBusqueda3');
			cell3.appendChild(element3); 
		}
		
		var incremento=divfecha;
		for(var i=2; i<=cuota; i++) { 
			rowCount=rowCount+1;
			
			var row = table.insertRow(rowCount); 
			var cell0 = row.insertCell(0);   //celda 1
	        var element0 = document.createElement("input");
			element0.type = "text";  
			element0.name="numerocuota"+i;
			element0.id="numerocuota"+i;
			element0.value=i;
			element0.setAttribute('class','boxBusqueda3');
            cell0.appendChild(element0);
			
			var cell1 = row.insertCell(1);   //celda 3
			var element1 = document.createElement("input");   
			element1.type = "text";  
			element1.name ="montoxcuota"+i;
			element1.id="montoxcuota"+i;
			element1.value=montocuotas;
			element1.setAttribute('class','boxBusqueda3');
			cell1.appendChild(element1); 
			
			var cell2 = row.insertCell(2);   //celda 3
			var element2 = document.createElement("input");   
			element2.type = "text";  
			element2.name ="montoxcuotabs"+i;
			element2.id="montoxcuotabs"+i;
			element2.value=montocuotasbs;
			element2.setAttribute('class','boxBusqueda3');
			cell2.appendChild(element2); 
			
			var cell3 = row.insertCell(3);   //celda 3
			var element3 = document.createElement("input");   
			element3.type = "text";  
			element3.name ="fechacuota"+i;
			element3.id="fechacuota"+i;
			
			element3.value=calcula(fechainicio,incremento);
			element3.setAttribute('class','boxBusqueda3');
			cell3.appendChild(element3); 
			incremento=incremento+divfecha;
		 }
		   document.getElementById('num_pago').value=cuota;
		   document.getElementById('cuota').value=cuota;
		
		//alert(tipo.value);*/
	}
	