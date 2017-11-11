<html>
 <head>
  <script language="JavaScript">
   
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
 
   function calcula(){
    var sFc0 = document.frm.fecha0.value; // Se asume válida
    var nSum = parseInt(document.frm.meses.value); 
    var sFc1 = sFc0;
    if (!isNaN(nSum)){
	 var fechainicial=sFc0.split("-"); 
     var nDia = parseInt(fechainicial[2]);
     var nMes = parseInt(fechainicial[1]);
     var nAno = parseInt(fechainicial[0]);
     sFc1 = sumaMes(nDia, nMes, nAno, nSum);
    }
    document.frm.fecha1.value = sFc1;
   }
  </script>
 </head>
 <body>
  <form name="frm">
   <table border="0">
    <tr>
     <td>
      <table border="1">
       <tr>
        <td align="right">
         Fecha inicial (dd/mm/aaaa)
        </td>
        <td>
         <input type="text" name="fecha0" value="2002-03-20">
        </td>
       </tr>
       <tr>
        <td align="right">
         Meses
        </td>
        <td>
         <input type="text" onChange="calcula()" name="meses" value="0">
        </td>
       </tr>
       <tr>
        <td align="right">
         Fecha final (dd/mm/aaaa)
        </td>
        <td>
         <input type="text" name="fecha1" readonly>
        </td>
       </tr>
      </table>
     </td>
    </tr>
    <tr>
     <td align="center">
      <input type="button" value="Calcular" onclick="calcula()">
     </td>
    </tr>
   </table>
  </form>
 </body>
</html>  
