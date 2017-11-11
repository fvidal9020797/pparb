 
var _ingresoItem_cnx1;


function limpiar(table) {
    
    $("#"+table).find("tr:gt(0)").remove();
    
    /*var d = document.getElementById(table);
   if(d !=null){
         while (d.hasChildNodes())
         d.removeChild(d.firstChild);
    }*/
}


function numero(txt) {
    if (txt.value != '') {
    var b = /^[0-9\-]*$/;
    return b.test(txt);
    }
} 


function testNumero(txt)
{
    v = numero(txt.value);
    if( v == 1 && txt.value >=0)
    {

    }else{
       //alert(txt.value); 
       txt.value = txt.value.substring(0, txt.value.length - 1);
    }
}

 
 function mensajeAlerta(msj) {
    smoke.signal(msj, function (e) {

    }, {
        duration: 2500,
        classname: "custom-class"
    });
}


function ClearSelect(id) {
   // alert('clear:' + id); 
	document.getElementById(id).options.length = 0;
}


function addItemCombo(nombre ,texto,valor)
{
   // alert('name='+nombre); 
    //  alert('entro cargar combo cl='+nombre+"--"+valor +" -"+ texto );
    var objOption = new Option(texto, valor);
     //alert('name='+nombre); 
     document.getElementById(nombre).add(objOption);
    //alert('entro cargar combo');
}


function seleccionarCombo(name,texto){

    lista = document.getElementById(name);
   // alert('entro:'+lista.options.length); 
    
    for (i=0; i<lista.options.length ;i++) {
     //alert(lista.options[i].text+'-'+texto);
      if(lista.options[i].text==texto){
        lista.selectedIndex =i;
        break;
       // alert('sii='+lista.options[i].text+'-'+texto);
      }
    }
   // alert('termino'); 

}


function seleccionarComboId(name,id){

    lista = document.getElementById(name);
 //  alert('entro:'+lista.options.length); 
    
    for (i=0; i<lista.options.length ;i++) {
    // alert(lista.options[i].value+'-'+id);
      if(lista.options[i].value==id){
        lista.selectedIndex =i;
     //  alert('sii '+name +'=='+lista.options[i].value+'-'+id);
      }
    }
   // alert('termino'); 
}




 function cargarcomboTodosDV(){
  
 
   // var nombregrupo=document.getElementById("nombreg").value;
    
    ClearSelect("cboPersonal");  
     
    // var idgrupo=document.getElementById("cbogrupo").value;   
  // alert(document.getElementById("idaccion1").innerHTML);
         var parametros = {
            "tarea" : "cargarcombosDevo" 
        };
        $.ajax({
                data:  parametros,
                url:   'page_registro_activo_Ajax.php',
                type:  'post',
                beforeSend: function () {
                      //  $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response1) {
                     eval(response1);
                       CargaEditarDevolucion();
                  
              }
        });
 
 }
 
 
 
 

 function cargarcombodpto(id){
  
 
   // var nombregrupo=document.getElementById("nombreg").value;
    ClearSelect("cbodpto");    
    // var idgrupo=document.getElementById("cbogrupo").value;   
  // alert(document.getElementById("idaccion1").innerHTML);
         var parametros = {
            "tarea" : "cargardpto", 
            "id" : id
        };
        $.ajax({
                data:  parametros,
                url:   'page_registro_activo_Ajax.php',
                type:  'post',
                beforeSend: function () {
                      //  $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response1) {
                     eval(response1);
                     
                  
              }
        });
 
 }
 
 function cargarcomboregional(id,iddpto){
  
 
   // var nombregrupo=document.getElementById("nombreg").value;
    ClearSelect("cboregional");    
    // var idgrupo=document.getElementById("cbogrupo").value;   
  // alert(document.getElementById("idaccion1").innerHTML);
         var parametros = {
            "tarea" : "cargarregional", 
            "id" : id,
            "iddpto" : iddpto
        };
        $.ajax({
                data:  parametros,
                url:   'page_registro_activo_Ajax.php',
                type:  'post',
                beforeSend: function () {
                      //  $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response1) {
                     eval(response1);
                     
                  
              }
        });
 
 }
 
 
 
 function guardarcomboAsignacion(tipo){
    // alert("tipoooo="+tipo);
     if(tipo=="dpto"){
         guardardpto();
     }
     
     if(tipo=="regional"){
         guardarregional();
     } 
     
  
     
 }
 function guardardpto(){
  
 
    var nombregrupo=document.getElementById("nombreg").value;
        
    // var idgrupo=document.getElementById("cbogrupo").value;
  
 
  // alert(document.getElementById("idaccion1").innerHTML);
         var parametros = {
            "tarea" : "dpto",
             "nombredpto" : nombregrupo,
             "accion" : document.getElementById("idaccion1").innerHTML,
             "id" : document.getElementById("cbogrupo").value
        };
        $.ajax({
                data:  parametros,
                url:   'page_registro_activo_Ajax.php',
                type:  'post',
                beforeSend: function () {
                      //  $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response1) {
                   // alert('resp:'+response1);
                   if(response1>0){
                       mensajeAlerta("Grupo Guardado Correctamente.!");
                       cargarcombodpto(response1);
                   cancelar5();
                   }else{
                       mensajeAlerta("Error al Guardar el Grupo.!");                   
                   }
                   
                  /*  response1 = response1.substring(0, response1.length - 1);
                    resultado1=response1.split("|");

                    for(i=0; i<resultado1.length;i++){
                        // alert(resultado1[i]);

                       if((resultado1[i]==1 && idperiodo==1) || (resultado1[i]==3 && idperiodo==2)){
                             if(document.getElementById("idbtn1")){
                                butt1 = document.getElementById("idbtn1");
                                butt1.disabled = false;
                                if(i==0 && document.getElementById('anhoActivo').value==0)  {
                                    document.getElementById('idbtn1').setAttribute('style', 'cursor:pointer; color:#000000;  background-color: #7fc345;padding: 8px 11px; ');
                                    document.getElementById('anhoActivo').value=resultado1[i];
                                    document.getElementById('anhoActivo_').value=resultado1[i];
                                }
                                document.getElementById('idbtn1').value=resultado1[i];
                                // document.getElementById('idbtn1').click();
                            }
                            
                        }*/
              }
        });
 
 }
 
 
 
  function guardarregional(){
  
 
    var nombresubgrupo=document.getElementById("nombreg").value;
    var iddpto=document.getElementById("cbodptonew").value;
     if(iddpto>0){
         var parametros = {
            "tarea" : "regional",
             "nombreregional" : nombresubgrupo,
             "accion" : document.getElementById("idaccion1").innerHTML,
             "id" : document.getElementById("cboregional").value,
             "iddpto" : iddpto
        };
        $.ajax({
                data:  parametros,
                url:   'page_registro_activo_Ajax.php',
                type:  'post',
                beforeSend: function () {
                      //  $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response1) {
                   // alert('resp:'+response1);
                   if(response1>0){
                       mensajeAlerta("Oficina Regional Guardado Correctamente.!");
                       cargarcomboregional(response1,iddpto);
                       
                       seleccionarComboId('cbodpto',iddpto);
                   cancelar5();
                   }else{
                       mensajeAlerta("Error al Guardar la Oficina Regional.!");                   
                   }
                   
               
              }
        });
    }else{
         mensajeAlerta("Debe Seleccionar un Departamento.!"); 
    }
 
 }
 
 
  
 
 
 
 
 //-- EMPIEZA VENTANA POP PUP SOBRESALIENTE-----

$(document).ready(function(){  

	$(".monitoreox").click(function() { 
		                // recorremos todos los valores...
//document.getElementById("nombreg").value="";


  
		var   aCustomers=""  ;
		// var idaccion=$(this).attr("idaccion");
                  // alert('reg='+idreg);
                  // cargardatosPop1(idreg);
		// var  tipo=$(this).attr("id");
		 //	var actividad=$(this).attr("actividad");
    //  var nombrepredio = $(this).attr("nombre");
    //  var codigoparcela = $(this).attr("codigo");
 /*if(idaccion=="Editar"){//cbogrupo
     if(tipo=="grupo"){
      document.getElementById("nombreg").value=document.getElementById('cbogrupo').options[document.getElementById('cbogrupo').selectedIndex].text;
       
      
     }
     
     if(tipo=="subgrupo"){
      document.getElementById("nombreg").value=document.getElementById('cbosubgrupo').options[document.getElementById('cbosubgrupo').selectedIndex].text;
     }
     
     if(tipo=="estado"){
      document.getElementById("nombreg").value=document.getElementById('cboestado').options[document.getElementById('cboestado').selectedIndex].text;
     }
     
     if(tipo=="area"){
      document.getElementById("nombreg").value=document.getElementById('cboarea').options[document.getElementById('cboarea').selectedIndex].text;
     }
      if(tipo=="namea"){
      document.getElementById("nombreg").value=document.getElementById('cbonameg').options[document.getElementById('cbonameg').selectedIndex].text;
     }
     
      if(tipo=="obs"){
      document.getElementById("nombreg").value=document.getElementById('cboObs').options[document.getElementById('cboObs').selectedIndex].text;
     }
     
     
  }*/
        
		$("#idreg").val(1);
			//$("#codigorcia").val("codigoparcela");
			//$("#idaccion1").text(idaccion);
			//$("#tipo").val(tipo); 

		  $("#dialogo2").dialog({  
			width: 590,  
                        
			height: 450, 
			show: "scale", 
			hide: "scale", 
			resizable: "false", 
			position: "top",
			modal: "true", 
		opacity: 90,
		 closeOnEscape: false,
          open: function(event, ui) { $(".ui-dialog-titlebar-close").hide();}, 
      
		});  

	}); 
         
$("#b2").click(function() {
	$("#dialogo2").dialog({
			width: 610,
			height: 470,
			show: "scale",
			hide: "scale",
			resizable: "false",
			position: "center"
		});
	});
$("#b3").click(function() {
		$("#dialogo3").dialog({
			width: 610,
			height: 470,
			show: "blind",
			hide: "shake",
			resizable: "false",
			position: "center"
		});
	});
});

function cancelar(){
     $("#dialogo2").dialog("close"); 
}



//----- 2DA VENTANA  

 //-- EMPIEZA VENTANA POP PUP SOBRESALIENTE-----
  
$(document).ready(function(){  

	$(".monitoreo").click(function() { 
		                // recorremos todos los valores...
 document.getElementById("nombreg").value="";
 
		var   aCustomers=""  ;
		 var idaccion=$(this).attr("idaccion");
                  // alert('reg='+idreg);
                  // cargardatosPop1(idreg);
		  var  tipo=$(this).attr("id");
                 // alert('tipo javsc='+tipo);
		 //	var actividad=$(this).attr("actividad");
    //  var nombrepredio = $(this).attr("nombre");
    //  var codigoparcela = $(this).attr("codigo");
  if(tipo=="dpto"){
      document.getElementById("divdpto").style.display="none";
  }
  if(tipo=="regional"){
      document.getElementById("divdpto").style.display="block";
  }
        if(idaccion=="Editar"){//cbogrupo
            if(tipo=="dpto"){
             document.getElementById("nombreg").value=document.getElementById('cbodpto').options[document.getElementById('cbodpto').selectedIndex].text;
             
            }

            if(tipo=="regional"){
             
             document.getElementById("nombreg").value=document.getElementById('cboregional').options[document.getElementById('cboregional').selectedIndex].text;
             seleccionarComboId("cbodptonew", document.getElementById("cbodpto").value);
             
            }
 
        }
        
		//$("#idreg").val(1);
			//$("#codigorcia").val("codigoparcela");
                      //  alert(idaccion);
		 $("#idaccion1").text(idaccion);
		 $("#tipo").val(tipo); 

		  $("#dialogo5").dialog({  
			width: 590,  
                        
			height: 310, 
			show: "scale", 
			hide: "scale", 
			resizable: "false", 
			position: "top",
			modal: "true", 
		opacity: 90,
		 closeOnEscape: false,
          open: function(event, ui) { $(".ui-dialog-titlebar-close").hide();}, 
      
		});  

	}); 
         
$("#b2").click(function() {
	$("#dialogo5").dialog({
			width: 610,
			height: 330,
			show: "scale",
			hide: "scale",
			resizable: "false",
			position: "center"
		});
	});
$("#b3").click(function() {
		$("#dialogo3").dialog({
			width: 610,
			height: 330,
			show: "blind",
			hide: "shake",
			resizable: "false",
			position: "center"
		});
	});
}); 


 function cancelar5(){
     $("#dialogo5").dialog("close"); 
}



/// ventana subgrupo



            
$(document).ready(function(){
           
  //Ocultamos el menú al cargar la página
  $("#contextdpto").hide();      
     $("#btndpto").click(function(e) {
    $("#contextdpto").css({'display':'block', 'left':e.pageX, 'top':e.pageY});
   return false;
  });       
  //cuando hagamos click, el menú desaparecerá
  $(document).click(function(e){
    if(e.button == 0){
      $("#contextdpto").css("display", "none");
    }
  });
           
  //si pulsamos escape, el menú desaparecerá
  $(document).keydown(function(e){
    if(e.keyCode == 27){
      $("#contextdpto").css("display", "none");
    }
  });                    
});      


$(document).ready(function(){
           
  //Ocultamos el menú al cargar la página
  $("#contextregional").hide();      
     $("#btnregional").click(function(e) {
    $("#contextregional").css({'display':'block', 'left':e.pageX, 'top':e.pageY});
   return false;
  });       
  //cuando hagamos click, el menú desaparecerá
  $(document).click(function(e){
    if(e.button == 0){
      $("#contextregional").css("display", "none");
    }
  });
           
  //si pulsamos escape, el menú desaparecerá
  $(document).keydown(function(e){
    if(e.keyCode == 27){
      $("#contextregional").css("display", "none");
    }
  });                    
});  




 
 
 
      
  function eliminarGrupo(idGrupo) {
    smoke.confirm("¿Desea Eliminar El Grupo Seleccionado?", function (e) {
        if (e) {
           // eliminarDetalleTraspasoFilaSI(idDetalleTraspaso,idDetalleIngresoItem)            
        } else {

        }
    }, {
        ok: "Si",
        cancel: "No",
        classname: "custom-class",
        reverseButtons: true
    });
}


  function eliminarsubGrupo(idGrupo) {
    smoke.confirm("¿Desea Eliminar El Sub-Grupo Seleccionado?", function (e) {
        if (e) {
           // eliminarDetalleTraspasoFilaSI(idDetalleTraspaso,idDetalleIngresoItem)            
        } else {

        }
    }, {
        ok: "Si",
        cancel: "No",
        classname: "custom-class",
        reverseButtons: true
    });
}


 
 

 function nada(){
     
 }
 
 function cargarListadoActivo(paginaactual,pag_ini,pag_fin){
     limpiar("tableActivo") ;
 
 
   var filtro="";
        //-- FILTROS BUSCAR--
     bcoducab = document.getElementById('buscarcoducab').value;
     bcodm = document.getElementById('buscarcodm').value;
     bcodgrupo = document.getElementById('buscargrupo').value;
     bcodsub = document.getElementById('buscarsubgrupo').value;
     bcodobs = document.getElementById('buscarobs').value;
     bcodestado = document.getElementById('buscares').value; 
     bnombre = document.getElementById('buscarnombre').value;
        
        if(bcoducab.length>0){            
             filtro=filtro+" and  upper(a.codigoucab) like  '%'|| upper('"+bcoducab+"')||'%' ";   
        }
        if(bcodm >0){            
             filtro=filtro+"  and  upper(a.codigomdryt) like  '%'|| upper('"+bcodm+"')||'%' ";   
        } 
        if(bcodgrupo >0){            
             filtro=filtro+" and   a.idgrupo = "+bcodgrupo+" ";
        }
        
        if(bcodsub >0){            
             filtro=filtro+" and   a.idsubgrupo = "+bcodsub+" ";
        }
        
        if(bcodobs >0){            
             filtro=filtro+" and   a.idobservacion ="+bcodobs+" ";
        }
        
          if(bcodestado >0){            
             filtro=filtro+" and   a.idestado ="+bcodestado+" ";
        }
        
          if(bnombre.length>0){            
             filtro=filtro+"  and  upper(na.nombreactivo) like '%'|| upper('"+bnombre+"')||'%' ";  
        }
        
        
        var parametros = {
            "tarea" : "cargarListadoActivo" ,
             "filtro" : filtro ,
            "paginaactual" : paginaactual ,
            "paginaini" : pag_ini ,
            "paginafin" : pag_fin  
        };
        $.ajax({
                data:  parametros,
                url:   'page_registro_activo_Ajax.php',
                type:  'post',
                beforeSend: function () {
                      //  $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response1) {
                     eval(response1);
                     
                  
              }
        });   
 }
 
 
 
 
 
 
 
 
function cargarFilaActivo(indice,idIngreso, coducab, codmdryt, nombre_,idgrup , grupo, idsub, subgrupo,idobs ,nombreobs ,idestado,nombreesta,sw) {
// 12 item 
    // alert(idIngreso + '-' + coducab + '-' + codmdryt + '-' + nombre + '-' + idgrup + '-' + grupo+ '-' + idsub+ '-' + subgrupo+ '-' + idarea+ '-' + area );
     tabla = document.getElementById('tableActivo');
  var colorr;
    if(sw){colorr="#DBF7DB";
    }else{
        colorr="#ffffff";}
    
    tr = document.createElement('tr');
    tr.setAttribute('id', 'trn-' + idIngreso);
    
    tabla.appendChild(tr);
    
    td0 = document.createElement('td');  
    td0.setAttribute('id', 'tdid0-' + idIngreso);
    td0.innerHTML = indice; 
     td0.style.background=colorr;
    
    td1 = document.createElement('td');
    td1.setAttribute('id', 'tdid1-' + idIngreso);
     td1.style.background=colorr;
     
     
    optVer = document.createElement('img');
    optVer.setAttribute('id', 'idimg');
    optVer.setAttribute('alt', 'Edit');
    optVer.setAttribute('src', '../images/logosdos/editar.png');   
    optVer.setAttribute('style', ' margin-bottom:-6px;width:25px;height:25px; cursor:pointer; padding-bottom:-10px;');
    
    optVer.onclick = function () { window.location.href='registro_activo_uno.php?id=' + idIngreso; } //{CancelarFila()}    
    td1.appendChild(optVer);
     
    td2 = document.createElement('td');  
    td2.setAttribute('id', 'tdid2-' + idIngreso);
    td2.innerHTML = coducab; 
     td2.style.background=colorr;


    td3 = document.createElement('td');   
    td3.innerHTML = codmdryt; 
    td3.setAttribute('id', 'tdid3-' + idIngreso);
 td3.style.background=colorr;

    td4 = document.createElement('td');   
    td4.innerHTML = nombre_; 
    td4.setAttribute('id', 'tdid4-' + idIngreso);
  td4.style.background=colorr;


    td5 = document.createElement('td');
    td5.innerHTML = grupo; 
    td5.setAttribute('id', 'tdid5-' + idIngreso);
  td5.style.background=colorr;

    td6 = document.createElement('td');
    td6.innerHTML = subgrupo; 
    td6.setAttribute('id', 'tdid6-' + idIngreso);
    td6.style.background=colorr;
    
    
    td7 = document.createElement('td');
    td7.innerHTML = nombreobs; 
    td7.setAttribute('id', 'tdid7-' + idIngreso);
  td7.style.background=colorr;
  
    td8 = document.createElement('td');
    td8.innerHTML = nombreesta; 
    td8.setAttribute('id', 'tdid8-' + idIngreso);
    td8.style.background=colorr;
     
  
    tr.appendChild(td0);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(td4);
    tr.appendChild(td5);
    tr.appendChild(td6);
    tr.appendChild(td7);
    tr.appendChild(td8); 
   // tr.appendChild(td1); 
}





 function guardarGrupal(){
    idgrupo_= document.getElementById("cbogrupo").value;
    idsubgrupo_=document.getElementById("cbosubgrupo").value;
    idestado_=document.getElementById("cboestado").value;
    idobs_=document.getElementById("cboObs").value;
   // codigmdryt_=document.getElementById("idcodigomdryt").value;
    idnombre_=document.getElementById("cbonameg").value;
    descripcion_=document.getElementById("message").value;
    accion_=document.getElementById("idregistro").value;
    cant_=document.getElementById("idcantidad").value;
    
    // params += '&txtObs=' + txtObs.replace(/[+]/gi, '|');
     //lado del php
  //     Dim txtObs As String = Replace(Request.Form("txtObs"), "|", "+")

      descripcion_ = descripcion_.replace(String.fromCharCode(10),"|"); ///!/gi
    // alert(descripcion_);
   var error_1="Falta Ingresar o Seleccionar Datos en :  ";
  var error_="";
     if(idgrupo_==0  ){
      error_ += ",  Grupo "; 
     }
     if(idnombre_==0  ){
      error_ += ",  Nombre "; 
     }
      
     
      if(  idsubgrupo_==0  ){
        error_ +=",  Sub-Grupo ";
     }
     if( idestado_==0){
        error_ +=",  Estado ";
     }
     
     if(idobs_==0  ){
        error_  +=",  Observación ";
     }
     
      if(cant_.length<=0 ){
        error_  +=",  Cantidad ";
     }
     
    // alert(accion_);
       if(error_.length>0){
         
          mensajeAlerta(error_1+" "+error_);
         
      }else{
          //-----GUARDAR GRUPALL ---///
           var parametros = {
            "tarea" : "guardarActivoGrupal" ,
            "cantidad" : cant_ ,
            "idnombre" : idnombre_ ,
            "idgrupo" : idgrupo_ ,
            "idsubgrupo" :idsubgrupo_ ,
            "idestado" : idestado_ ,
            "idobs" : idobs_,
            "descripcion" : descripcion_ ,
            "acciongral" : accion_            
            };
            $.ajax({
                    data:  parametros,
                    url:   'page_registro_activo_Ajax.php',
                    type:  'post',
                    beforeSend: function () {
                          //  $("#resultado").html("Procesando, espere por favor...");
                        $('#btnguardarind').attr("disabled", true);
                        mensajeAlerta("Datos Guardado Correctamente.!")
                        setTimeout ('nada ()', 2000); 
                        location.href = 'listado_activo.php';
                    },
                    success:  function (response1) {
                         eval(response1);


                  }
            });
        
      }  
     
     
     
     
 }
 
 
 function buscaractivo(){
     
    // $("#".tablef).find("tr:gt(0)").remove();
      
 }
 
 
 
 function cargarcomboListadoDevolucion(){
  
 
   // var nombregrupo=document.getElementById("nombreg").value;
    ClearSelect("buscarpersonal");    
    
    
    
    // var idgrupo=document.getElementById("cbogrupo").value;   
  // alert(document.getElementById("idaccion1").innerHTML);
         var parametros = {
            "tarea" : "cargarcombosListadoDevo" 
        };
        $.ajax({
                data:  parametros,
                url:   'page_registro_activo_Ajax.php',
                type:  'post',
                beforeSend: function () {
                      //  $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response1) {
                     eval(response1);
                     
                  
              }
        });
 
 }
 
 
  function insertarAnterior(name, pagina ) {
    tabla = document.getElementById(name);
    a = document.createElement('a');
   // a.setAttribute('style', 'margin:6px;cursor:pointer;background-color:' + color);
    a.setAttribute('class','next');
    a.innerHTML = "<< Anterior";
    a.setAttribute('id', 'pagina' + pagina);
    a.onclick = function () { cargarListadoActivo(pagina); };
    tabla.appendChild(a);
}

  function insertarPrimera(name, pagina ,ini,fin) {
    tabla = document.getElementById(name);
    a = document.createElement('a');
   // a.setAttribute('style', 'margin:6px;cursor:pointer;background-color:' + color);
    a.setAttribute('class','next');
    a.innerHTML = "<< Priemra";
    a.setAttribute('id', 'pagina' + pagina);
    a.onclick = function () { cargarListadoActivo(pagina,ini,fin); };
    tabla.appendChild(a);
}



  function insertarSiguiente(name, pagina ,ini,fin) {
    tabla = document.getElementById(name);

    a = document.createElement('a');
   // a.setAttribute('style', 'margin:6px;cursor:pointer;background-color:' + color);
   a.setAttribute('class','next'); 
    a.innerHTML = "Siguiente >>";
    a.setAttribute('id', 'pagina' + pagina);
    a.onclick = function () { cargarListadoActivo(pagina,ini,fin); };
    tabla.appendChild(a);
}

function insertarUltima(name, pagina ,ini,fin) {
    tabla = document.getElementById(name);

    a = document.createElement('a');
   // a.setAttribute('style', 'margin:6px;cursor:pointer;background-color:' + color);
   a.setAttribute('class','next'); 
    a.innerHTML = "Última >>";
    a.setAttribute('id', 'pagina' + pagina);
    a.onclick = function () { cargarListadoActivo(pagina,ini,fin); };
    tabla.appendChild(a);
}

 function insertarNumero(name, pagina,ini,fin) {
    tabla = document.getElementById(name);

    a = document.createElement('a');
    //a.setAttribute('style', 'margin:6px;cursor:pointer;background-color:' + color);
    a.innerHTML =" "+Number(pagina)+" ";
    a.setAttribute('id', 'pagina' + pagina);
    a.onclick = function () { cargarListadoActivo(pagina,ini,fin); };

    tabla.appendChild(a);
}

 function insertarActual(name, pagina,ini,fin) {
    tabla = document.getElementById(name);

    a = document.createElement('a');//class="active"
    //a.setAttribute('style', 'margin:6px;cursor:pointer;background-color:' + color);
    a.setAttribute('class','active');
    a.innerHTML =" "+Number(pagina)+" ";
    a.setAttribute('id', 'pagina' + pagina,ini,fin);
   // a.onclick = function () { cargarListadoActivo(pagina); };

    tabla.appendChild(a);
}





function blockNonNumbers_a(obj, e, allowDecimal, allowNegative)
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



     function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}




function CargaEditarUno(){

    var prodId = getParameterByName('id');
     if(prodId.length>0  ){
         document.getElementById("idregistro").value=prodId;
          document.getElementById("idtitulo").innerHTML="EDITAR";
         
     }else{
         document.getElementById("idregistro").value=0;
         document.getElementById("idtitulo").innerHTML="NUEVO";
     }
     
      if(prodId.length>0){
      //   alert(prodId); 
        var parametros = {
            "tarea" : "cargarEditarUno" ,
             "id" : prodId
        };
        $.ajax({
                data:  parametros,
                url:   'page_registro_activo_Ajax.php',
                type:  'post',
                beforeSend: function () {
                      //  $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response1) {
                     eval(response1);
                     
                  
              }
        });
 
 
 
          
          
          
          
          
          
      }
}


function cargarCaracteristicas(desc){
    descripcion_ = desc.replace("|",String.fromCharCode(10));
    document.getElementById('message').value=descripcion_;
    
}


function lanzaraddactivo(){  
   // alert('asds');
   idpers=document.getElementById('cboPersonal').value;
   np=document.getElementById('cboPersonal').options[document.getElementById('cboPersonal').selectedIndex].text;
    if(idpers>0 ){
        window.open("listado_devo_ext.php?idp="+idpers+"&np="+np,"Elegir Activos","width=1100,height=500,scrollbars=yes,toolbar=no,status=no");        
    }else{
        mensajeAlerta("Primero Seleccione un Personal.!");
    }
}





 
 function cargarListadoActivoD_ext(paginaactual,pag_ini,pag_fin){
     limpiar("tableActivo") ;
 
   idp=0;
   var filtro="";
        //-- FILTROS BUSCAR--
     bcoducab = document.getElementById('buscarcoducab').value;
     bcodm = document.getElementById('buscarcodm').value;
     bcodgrupo = document.getElementById('buscargrupo').value;
     bcodsub = document.getElementById('buscarsubgrupo').value;
     bcodobs = document.getElementById('buscarobs').value;
      
     bnombre = document.getElementById('buscarnombre').value;
        
        if(bcoducab.length>0){            
             filtro=filtro+" and  upper(a.codigoucab) like '%'|| upper('"+bcoducab+"')||'%' ";  
        }
        if(bcodm >0){            
             filtro=filtro+"  and  upper(a.codigomdryt) like '%'|| upper('"+bcodm+"')||'%' ";   
        } 
        if(bcodgrupo >0){            
             filtro=filtro+" and   a.idgrupo = "+bcodgrupo+" ";
        }
        
        if(bcodsub >0){            
             filtro=filtro+" and   a.idsubgrupo = "+bcodsub+" ";
        }
        
        if(bcodobs >0){            
             filtro=filtro+" and   a.idobservacion ="+bcodobs+" ";
        }
        
 
        
          if(bnombre.length>0){            
             filtro=filtro+"  and  upper(na.nombreactivo) like '%'|| upper('"+bnombre+"')||'%' ";   
        }
        
         var prodId = getParameterByName('idp');
           var namep = getParameterByName('np');
     if(prodId.length>0  ){
         idp=prodId;
          filtro=filtro+" and asi.idfuncionario ="+idp+" ";
          document.getElementById('idtp').innerHTML=namep;
          
           
     }
        
        var parametros = {
            "tarea" : "cargarListadoActivoD_ext" ,
             "filtro" : filtro ,
            "paginaactual" : paginaactual ,
            "paginaini" : pag_ini ,
            "paginafin" : pag_fin  ,
            "idp" : idp  
        };
        $.ajax({
                data:  parametros,
                url:   'page_registro_activo_Ajax.php',
                type:  'post',
                beforeSend: function () {
                      //  $("#resultado").html("Procesando, espere por favor...");
                        document.getElementById('div_load').style.display = 'block';
                        document.getElementById('div_load').innerHTML = 'Cargando...';
    
                },
                success:  function (response1) {
                     eval(response1);
                       document.getElementById('div_load').innerHTML = '';
                     document.getElementById('div_load').style.display = 'none';
 
                  
              }
        });   
 }
 
 
 function cargarFilaActivo_ext2(indice,idIngreso,iddetalleasignacion ,coducab, codmdryt, nombre_,idgrup , grupo, idsub, subgrupo,idobs ,nombreobs ,idestado,nombreesta ,sw1_) {
// 12 item 
    // alert(idIngreso + '-' + coducab + '-' + codmdryt + '-' + nombre + '-' + idgrup + '-' + grupo+ '-' + idsub+ '-' + subgrupo+ '-' + idarea+ '-' + area );
     tabla = document.getElementById('tableActivo');
      //alert('idetalleasig='+iddetalleasignacion);
      var colorr;
    if(sw1_=="true"){colorr="#DBF7DB";
    }else{
        colorr="#ffffff";}



    tr = document.createElement('tr');
    tr.setAttribute('id', 'trn-' + idIngreso);
    
    tabla.appendChild(tr);
    
    td0 = document.createElement('td');  
    td0.setAttribute('id', 'tdid0-' + idIngreso);
    //td0.innerHTML = indice; 
    td0a= document.createElement('a');   
    td0a.innerHTML = indice; //
    td0a.href="javascript:actualizaPadre("+idIngreso+","+iddetalleasignacion+",'"+coducab+"','"+codmdryt+"','"+nombre_+"')";
    td0a.style="color:#007326;";
    td0.appendChild(td0a);
    td0.style.background=colorr;
    
    td1 = document.createElement('td');
    td1.setAttribute('id', 'tdid1-' + idIngreso);
    
    optVer = document.createElement('img');
    optVer.setAttribute('id', 'idimg');
    optVer.setAttribute('alt', 'Edit');
    optVer.setAttribute('src', '../images/logosdos/editar.png');   
    optVer.setAttribute('style', ' margin-bottom:-6px;width:25px;height:25px; cursor:pointer; padding-bottom:-10px;');
    
    optVer.onclick = function () { window.location.href='registro_activo_uno.php?id=' + idIngreso; } //{CancelarFila()}    
    td1.appendChild(optVer);
     td1.style.background=colorr;
     
    td2 = document.createElement('td');  
    td2.setAttribute('id', 'tdid2-' + idIngreso);
   // td2.innerHTML = coducab; 
    td2a= document.createElement('a');   
    td2a.innerHTML = coducab; 
    td2a.href="javascript:actualizaPadre("+idIngreso+","+iddetalleasignacion+",'"+coducab+"','"+codmdryt+"','"+nombre_+"')";
    td2a.style="color:#007326; font-size: 11px;";
    td2.appendChild(td2a);
    td2.style.background=colorr;

    td3 = document.createElement('td');   
   // td3.innerHTML = codmdryt; 
    td3.setAttribute('id', 'tdid3-' + idIngreso);
    td3a= document.createElement('a');   
    td3a.innerHTML = codmdryt; 
    td3a.href="javascript:actualizaPadre("+idIngreso+","+iddetalleasignacion+",'"+coducab+"','"+codmdryt+"','"+nombre_+"')";
    td3a.style="color:#007326; font-size: 11px;";
    td3.appendChild(td3a);
    td3.style.background=colorr;
 

    td4 = document.createElement('td');   
   // td4.innerHTML = nombre_; 
    td4.setAttribute('id', 'tdid4-' + idIngreso);
    td4a= document.createElement('a');   
    td4a.innerHTML = nombre_; 
    td4a.href="javascript:actualizaPadre("+idIngreso+","+iddetalleasignacion+",'"+coducab+"','"+codmdryt+"','"+nombre_+"')";
    td4a.style="color:#007326;font-size: 11px;";
    td4.appendChild(td4a);
    td4.style.background=colorr;
  


    td5 = document.createElement('td');
   // td5.innerHTML = grupo; 
    td5.setAttribute('id', 'tdid5-' + idIngreso);
    td5.style="padding:0px;margin:0px;";
    td5a= document.createElement('a');   
    td5a.innerHTML = grupo; 
    td5a.href="javascript:actualizaPadre("+idIngreso+","+iddetalleasignacion+",'"+coducab+"','"+codmdryt+"','"+nombre_+"')";
    td5a.style="color:#007326; font-size: 11px;";
    td5.appendChild(td5a);
    td5.style.background=colorr;
  

    td6 = document.createElement('td');
   // td6.innerHTML = subgrupo; 
    td6.setAttribute('id', 'tdid6-' + idIngreso);
    td6.style="padding:0px;margin:0px;";
    td6a= document.createElement('a');   
    td6a.innerHTML = subgrupo; 
    td6a.href="javascript:actualizaPadre("+idIngreso+","+iddetalleasignacion+",'"+coducab+"','"+codmdryt+"','"+nombre_+"')";
    td6a.style="color:#007326; font-size: 11px;";
    td6.appendChild(td6a);
     td6.style.background=colorr;
    
    td7 = document.createElement('td');
   // td7.innerHTML = nombreobs; 
    td7.setAttribute('id', 'tdid7-' + idIngreso);
    td7a= document.createElement('a');   
    td7a.innerHTML = nombreobs; 
    td7a.href="javascript:actualizaPadre("+idIngreso+","+iddetalleasignacion+",'"+coducab+"','"+codmdryt+"','"+nombre_+"')";
    td7a.style="color:#007326; font-size: 11px;";
    td7.style.background=colorr;
    td7.appendChild(td7a);

  
    td8 = document.createElement('td');
   // td8.innerHTML = nombreesta; 
    td8.setAttribute('id', 'tdid8-' + idIngreso);
    td8a= document.createElement('a');   
    td8a.innerHTML = nombreesta; 
    td8a.href="javascript:actualizaPadre("+idIngreso+","+iddetalleasignacion+",'"+coducab+"','"+codmdryt+"','"+nombre_+"')";
    td8a.style="color:#007326; font-size: 11px;";
     td8.style.background=colorr;
    td8.appendChild(td8a);
    
     
  
    tr.appendChild(td0);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(td4);
    tr.appendChild(td5);
    tr.appendChild(td6);
    tr.appendChild(td7);
    tr.appendChild(td8); 
   // tr.appendChild(td1); 
}



 
 
function actualizaPadre(id_,iddetasig_ ,coducab_, codm_, nombre_ ){
   var table = window.opener.document.getElementById('tableActivo');
   var sw_=false;
    var table =  window.opener.document.getElementById('tableActivo');
    var rowCount = table.rows.length;   
    for(var i=1; i<rowCount; i++) {   
                    var row = table.rows[i];   
                   // var chkbox = row.cells[1].childNodes[0];   
                    var chkbox2 = row.cells[1].childNodes[1];   
                    
                    //alert(chkbox.type);
                    if(chkbox2.value==id_){
                        sw_=true;
                    }
                    /*if(null != chkbox && true == chkbox.checked) {   
                           // table.deleteRow(i);   
                            rowCount--;   
                            i--;   
                    } */  
       }
                                   
    if(sw_==true){
        mensajeAlerta("Este Activo ya Fue Seleccionado .!");
    }else{
        addRow("tableActivo",coducab_,codm_,nombre_,id_,iddetasig_);
    window.close();
    }
   
	//alert (cientifico);
 }
 
 function addRow(tableID,dato1,dato2,dato3,dato4,iddetasig) {

	var aux = window.opener.document.getElementById("conteo");
       // alert(aux.value);
        
	var num = parseInt(aux.value);
	var table = window.opener.document.getElementById(tableID);
	var rowCount = num;
	var lastRow = table.rows.length;
	num = num+1;
	var row = table.insertRow(lastRow);
        
        var celln = row.insertCell(0);
        
	var cell = row.insertCell(1);
	var element = window.opener.document.createElement("input");
	element.type = "checkbox";
        element.style="transform: scale(1.5);  vertical-align: middle; text-align:center;    height:15px;  border:none font-size:15px; box-shadow: 0px 0px 0px rgba(0, 0, 0, 0); -webkit-box-shadow: 0px 0px 0px rgba(0, 0, 0, 0); -moz-box-shadow: 0px 0px 0px rgba(0, 0, 0, 0); ";
	cell.appendChild(element);
         var elemen4 = window.opener.document.createElement("input");
	elemen4.type = "hidden";	
	elemen4.name = "idactivo" + num;
	elemen4.id = "idactivo" + num;
        elemen4.value = dato4;
	cell.appendChild(elemen4);
        
        var elemen41 = window.opener.document.createElement("input");
	elemen41.type = "hidden";	
	elemen41.name = "iddeetalleasig" + num;
	elemen41.id = "iddeetalleasig" + num;
        elemen41.value = iddetasig;
	cell.appendChild(elemen41);
        


	var cell0 = row.insertCell(2);   //celda 1
	//var element0 = window.opener.document.createElement("input");
	cell0.type = "text";
	cell0.name = "idcoducab" + num;
	cell0.id = "idcoducab" + num;
	//element0.setAttribute('class','boxBusqueda2');
	//element0.setAttribute('readonly','true');
	cell0.innerHTML=dato1;
	//cell0.appendChild(element0);

  var cell1=row.insertCell(3);
 // var element1 = window.opener.document.createElement("input");
 // element1.type = "text";
  cell1.name = "idcondm" + num;
  cell1.id = "idcondm" + num;
  //element1.setAttribute('class','boxBusqueda');
 // element1.setAttribute('readonly','true');
  cell1.innerHTML=dato2;
  //cell1.appendChild(element1);

	var cell2 = row.insertCell(4);   //celda 2
	//var element2 = window.opener.document.createElement("input");
	//element2.type = "textarea";
	cell2.name = "idnombre" + num;
	cell2.id = "idnombre" + num;
	//element2.setAttribute('class','boxBusqueda');
	//element2.setAttribute('readonly','true');
	cell2.innerHTML=dato3;
	//cell2.appendChild(element2);

	/*var cell3 = row.insertCell(5);   //celda 3
	var element3 = window.opener.document.createElement("input");
	element3.type = "textarea";
	element3.name = "observacionesr" + num;
	element3.id = "observacionesr" + num;
	//element3.setAttribute('class','CSSTextArea');
	cell3.appendChild(element3);*/

 /* var cell4 = row.insertCell(6);
	var element4 = window.opener.document.createElement("input");
	element4.type = "hidden";
	element4.value = dato4;
	element4.name = "idsolicitud" + num;
	element4.id = "idsolicitud" + num;
	cell4.appendChild(element4);

	aux.value = num;*/
     
      /*var cell5 = row.insertCell(5);   
	cell5.name = "idestad" + num;
	cell5.id = "idesta" + num; 
	cell5.innerHTML="Actual";
        
         */
        aux.value = num
         window.opener.recontarIndice();
}



function recontarIndice() {
    var table = document.getElementById('tableActivo');

   // document.getElementById('ContentPlaceHolder1_Hidden_indice').value = 1;
   contador=1;
    for (var i = 0, row; row = table.rows[i]; i++) {
        for (var j = 0, col; col = row.cells[j]; j++) {
            // alert(col.innerHTML);
            if (i > 0) {
                col.innerHTML = contador; //document.getElementById('ContentPlaceHolder1_Hidden_indice').value;

                //var id = 0;
               // id = parseInt(document.getElementById('ContentPlaceHolder1_Hidden_indice').value);
                contador=contador+1;
                //id = id + 1;
               // document.getElementById('ContentPlaceHolder1_Hidden_indice').value = id;
            }
            break;
        }
    }
    
}


function deleteRow1(tableID) {  
      
		try {   
				var table = document.getElementById(tableID);   
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
				  
			}catch(e) {   
				alert(e);   
			}   
                        
                        recontarIndice();
}


 function guardarDevolucion(){
    txtfecha_= document.getElementById("txtfecha").value;
    idpersonal_=document.getElementById("cboPersonal").value;
  
    descripcion_=document.getElementById("message").value;    
    accion_=document.getElementById("idregistro").value;
     
    
    // params += '&txtObs=' + txtObs.replace(/[+]/gi, '|');
     //lado del php
  //     Dim txtObs As String = Replace(Request.Form("txtObs"), "|", "+")
   descripcion_ = descripcion_.replace(String.fromCharCode(10),"|"); ///!/gi
    // alert(descripcion_);
    // RECORRER Y RECOGER LOS ID DE LOS ACCTIVOS SELECCIONADOS
    var cant_ =parseInt(document.getElementById("conteo").value);
    //alert('cantidad='+cant_);
    var ids="";
    for(i=1; i<=cant_ ;i++){
        if ( document.getElementById("idactivo"+i) ) {
            ids=ids+document.getElementById("idactivo"+i).value+"|";
        }
    }
    
    var iddetasig="";
    for(ii=1; ii<=cant_ ;ii++){
        if ( document.getElementById("iddeetalleasig"+ii) ) {
            iddetasig=iddetasig+document.getElementById("iddeetalleasig"+ii).value+"|";
        }
    }
    
   // alert(ids);
    
   var error_1="Falta Ingresar o Seleccionar Datos en :  ";
  var error_="";
     if(idpersonal_==0  ){
      error_ += ",  Personal "; 
     }
     
      
     
     if(txtfecha_.length==0  ){
        error_  +=",  Fecha ";
     }
     
     var nFilas = $("#tableActivo tr").length;
     if(nFilas <= 1  ){
        error_  +=",  Detalle de Activos ";
     }
     
    // alert(accion_);
       if(error_.length>0){         
          mensajeAlerta(error_1+" "+error_);         
      }else{
          //-----GUARDAR ASIGNACION ---///
           var parametros = {
            "tarea" : "guardarDevolucionnActivo" ,
            "txtfecha_" : txtfecha_ ,
            "idpersonal_" : idpersonal_ ,      
            "descripcion" : descripcion_ ,
            "ids" : ids,
            "iddetasig" : iddetasig,
            "acciongral" : accion_
            };
            $.ajax({
                    data:  parametros,
                    url:   'page_registro_activo_Ajax.php',
                    type:  'post',
                    beforeSend: function () {
                          //  $("#resultado").html("Procesando, espere por favor...");
                           $('#btnguardarind').attr("disabled", true);
                            $('#btnguardarimp').attr("disabled", true);
                             $("#btnguardarind").css({'background':'#A5A5A5'});
                             $("#btnguardarimp").css({'background':'#A5A5A5'});
                    },
                    success:  function (response1) {
                        // eval(response1);
                        if(response1>0){                            
                           document.getElementById("idregistro").value=response1;
                            // document.getElementById("btnguardarind").disabled = 'true';
                         //   $('#btnguardarind').attr("disabled", true);
                             $('#btnguardarind').attr("disabled", true);
                            $('#btnguardarimp').attr("disabled", true);
                             $("#btnguardarind").css({'background':'#A5A5A5'});
                             $("#btnguardarimp").css({'background':'#A5A5A5'});
                             
                        mensajeAlerta("Datos Guardado Correctamente.!")
                         setTimeout ('nada ()', 2000); 
                         location.href = 'listado_devoluciones.php';
                        }else{
                          $('#btnguardarind').attr("disabled", false);
                            $('#btnguardarimp').attr("disabled", false);
                              $("#btnguardarind").css({'background':'#27AE60'});
                             $("#btnguardarimp").css({'background':'#27AE60'});
                            mensajeAlerta("Error al Guardar los Datos.!")
                        }


                  }
            });
        
      }  
     
     
     
     
 }
 
 
 function guardarDevolucionimprimir(){
    txtfecha_= document.getElementById("txtfecha").value;
    idpersonal_=document.getElementById("cboPersonal").value;
  
    descripcion_=document.getElementById("message").value;    
    accion_=document.getElementById("idregistro").value;
     
    
    // params += '&txtObs=' + txtObs.replace(/[+]/gi, '|');
     //lado del php
  //     Dim txtObs As String = Replace(Request.Form("txtObs"), "|", "+")
   descripcion_ = descripcion_.replace(String.fromCharCode(10),"|"); ///!/gi
    // alert(descripcion_);
    // RECORRER Y RECOGER LOS ID DE LOS ACCTIVOS SELECCIONADOS
    var cant_ =parseInt(document.getElementById("conteo").value);
    //alert('cantidad='+cant_);
    var ids="";
    for(i=1; i<=cant_ ;i++){
        if ( document.getElementById("idactivo"+i) ) {
            ids=ids+document.getElementById("idactivo"+i).value+"|";
        }
    }
    
    var iddetasig="";
    for(ii=1; ii<=cant_ ;ii++){
        if ( document.getElementById("iddeetalleasig"+ii) ) {
            iddetasig=iddetasig+document.getElementById("iddeetalleasig"+ii).value+"|";
        }
    }
    
   // alert(ids);
    
   var error_1="Falta Ingresar o Seleccionar Datos en :  ";
  var error_="";
     if(idpersonal_==0  ){
      error_ += ",  Personal "; 
     }
     
      
     
     if(txtfecha_.length==0  ){
        error_  +=",  Fecha ";
     }
     var nFilas = $("#tableActivo tr").length;
     if(nFilas <= 1  ){
        error_  +=",  Detalle de Activos ";
     }
    // alert(accion_);
       if(error_.length>0){         
          mensajeAlerta(error_1+" "+error_);         
      }else{
          //-----GUARDAR ASIGNACION ---///
           var parametros = {
            "tarea" : "guardarDevolucionnActivo" ,
            "txtfecha_" : txtfecha_ ,
            "idpersonal_" : idpersonal_ ,      
            "descripcion" : descripcion_ ,
            "ids" : ids,
            "iddetasig" : iddetasig,
            "acciongral" : accion_
            };
            $.ajax({
                    data:  parametros,
                    url:   'page_registro_activo_Ajax.php',
                    type:  'post',
                    beforeSend: function () {
                          //  $("#resultado").html("Procesando, espere por favor...");
                            $('#btnguardarind').attr("disabled", true);
                            $('#btnguardarimp').attr("disabled", true);
                             $("#btnguardarind").css({'background':'#A5A5A5'});
                             $("#btnguardarimp").css({'background':'#A5A5A5'});
                    },
                    success:  function (response1) {
                        // eval(response1);
                        if(response1>0){                            
                           document.getElementById("idregistro").value=response1;
                            // document.getElementById("btnguardarind").disabled = 'true';
                            $('#btnguardarind').attr("disabled", true);
                        mensajeAlerta("Datos Guardado Correctamente.!")
                         setTimeout ('nada ()', 2000); 
                         location.href = 'listado_devoluciones.php?ida='+response1 ;
                        }else{
                           $('#btnguardarind').attr("disabled", false);
                            $('#btnguardarimp').attr("disabled", false);
                              $("#btnguardarind").css({'background':'#27AE60'});
                             $("#btnguardarimp").css({'background':'#27AE60'});
                            mensajeAlerta("Error al Guardar los Datos.!")
                        }


                  }
            });
        
      }  
     
     
     
     
 }
 
 

 function cargarListadoDevo(paginaactual,pag_ini,pag_fin){
     limpiar("tableAsignacion") ;
 
 
   var filtro="";
        //-- FILTROS BUSCAR--
     coda = document.getElementById('buscarcod').value;
     fechaa = document.getElementById('buscarfecha').value;
     personala = document.getElementById('buscarpersonal').value;
   
        
        if(coda.length>0){            
             filtro=filtro+" and  upper(a.codigodevolucion) like  '%'|| upper('"+coda+"')||'%' ";  
        }
         if(fechaa.length>0){            
             filtro=filtro+" and  a.fechadevolucion='"+fechaa+"' ";
        }
        if(personala >0){            
             filtro=filtro+"  and  a.idfuncionario="+personala+" ";
        } 
       
        
         
        
        var parametros = {
            "tarea" : "cargarListadoDevolucion" ,
            "filtro" : filtro ,
            "paginaactual" : paginaactual ,
            "paginaini" : pag_ini ,
            "paginafin" : pag_fin  
        };
        $.ajax({
                data:  parametros,
                url:   'page_registro_activo_Ajax.php',
                type:  'post',
                beforeSend: function () {
                        //$("#idloading").html("Procesando, espere por favor...");
                         document.getElementById('div_load').style.display = 'block';
                        document.getElementById('div_load').innerHTML = 'Cargando...';
                },
                success:  function (response1) {
                    eval(response1);
                     document.getElementById('div_load').innerHTML = '';
                     document.getElementById('div_load').style.display = 'none';
                  var idasig_ = getParameterByName('ida');
                 if(idasig_.length>0  ){
                    var  formu='form-'+ idasig_;
                    document.getElementById(formu).submit();  
                 }
              }
        });   
 }
 
 
 
  
function cargarFilaDevolucion(indice,idIngreso, coducab, fecha_, nombrepersonal_ ,obs,cant_,sw_) {
// 12 item 
    // alert(idIngreso + '-' + coducab + '-' + codmdryt + '-' + nombre + '-' + idgrup + '-' + grupo+ '-' + idsub+ '-' + subgrupo+ '-' + idarea+ '-' + area );
     tabla = document.getElementById('tableAsignacion');
         var colorr;
    if(sw_=="true"){colorr="#DBF7DB";
    }else{
        colorr="#ffffff";}
    
    
    tr = document.createElement('tr');
    tr.setAttribute('id', 'trn-' + idIngreso);
    
    tabla.appendChild(tr);
    
    td0 = document.createElement('td');  
    td0.setAttribute('id', 'tdid0-' + idIngreso);
    td0.innerHTML = indice; 
     td0.style.background=colorr;
    
     td1 = document.createElement('td');
    td1.setAttribute('id', 'tdid1-' + idIngreso);
     td1.style.background=colorr;
    optVer = document.createElement('img');
    optVer.setAttribute('id', 'idimg');
    optVer.setAttribute('alt', 'Edit');
    optVer.setAttribute('src', 'images/icono_ver.png');   
    optVer.setAttribute('style', ' margin-bottom:-6px;width:25px;height:25px; cursor:pointer; padding-bottom:-10px;');
    optVer.title="Ver Detalle de la Devolucion";
    
    optVer.onclick = function () { window.location.href='devolucion_activo.php?id=' + idIngreso; } //{CancelarFila()}    
    td1.appendChild(optVer); 
    
    
    
    
    

 td11 = document.createElement('td');
    td11.setAttribute('id', 'tdid1-' + idIngreso);
    td11.style.background=colorr;
    
    frm1 = document.createElement('form'); 
    frm1.setAttribute('name', 'form-' + idIngreso);
    frm1.setAttribute('id', 'form-' + idIngreso);
    frm1.setAttribute('method', 'post' );
    frm1.setAttribute('action', 'imprimir_acta_devolucion.php' );
    
    input02  = document.createElement('input'); 
    input02.setAttribute('type', 'hidden' );
    input02.setAttribute('value',idIngreso  );
    input02.setAttribute('name','idasig'  );
    input02.setAttribute('id','idasig'  );
    
    optVer = document.createElement('img');
    optVer.setAttribute('id', 'idimg');
    optVer.setAttribute('alt', 'Edit');
    optVer.setAttribute('src', '../images/logosdos/impresora2.png');   
    optVer.setAttribute('style', ' margin-bottom:-6px;width:25px;height:25px; cursor:pointer; padding-bottom:-10px;');
    
   var  formu='form-'+ idIngreso;
    optVer.onclick = function () {  document.getElementById(formu).submit(); } //{CancelarFila()}    
    td11.appendChild(frm1);
    frm1.appendChild(input02);
    frm1.appendChild(optVer);
    
    
     
    td2 = document.createElement('td');  
    td2.setAttribute('id', 'tdid2-' + idIngreso);
    td2.innerHTML = coducab; 
    td2.style.background=colorr;


    td3 = document.createElement('td');   
    td3.innerHTML = fecha_; 
    td3.setAttribute('id', 'tdid3-' + idIngreso);
  td3.style.background=colorr;

    td4 = document.createElement('td');   
    td4.innerHTML = nombrepersonal_; 
    td4.setAttribute('id', 'tdid4-' + idIngreso);
   td4.style.background=colorr;

 
    td7 = document.createElement('td');
    td7.innerHTML = obs; 
    td7.setAttribute('id', 'tdid7-' + idIngreso);
   td7.style.background=colorr;
   
    td8 = document.createElement('td');
    td8.innerHTML = cant_; 
    td8.setAttribute('id', 'tdid8-' + idIngreso);
    td8.style.background=colorr;
     
  
    tr.appendChild(td0);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(td4);
 
    tr.appendChild(td7); 
    tr.appendChild(td8); 
    tr.appendChild(td1); 
    tr.appendChild(td11); 
}


 function insertarAnteriorAS(name, pagina ,ini,fin) {
    tabla = document.getElementById(name);
    a = document.createElement('a');
   // a.setAttribute('style', 'margin:6px;cursor:pointer;background-color:' + color);
    a.setAttribute('class','next');
    a.innerHTML = "<< Anterior";
    a.setAttribute('id', 'pagina' + pagina);
    a.onclick = function () { cargarListadoDevo(pagina,ini,fin); };
    tabla.appendChild(a);
}

  function insertarPrimeraAS(name, pagina ,ini,fin) {
    tabla = document.getElementById(name);
    a = document.createElement('a');
   // a.setAttribute('style', 'margin:6px;cursor:pointer;background-color:' + color);
    a.setAttribute('class','next');
    a.innerHTML = "<< Priemra";
    a.setAttribute('id', 'pagina' + pagina);
    a.onclick = function () { cargarListadoDevo(pagina,ini,fin); };
    tabla.appendChild(a);
}


  function insertarSiguienteAS(name, pagina ,ini,fin) {
    tabla = document.getElementById(name);

    a = document.createElement('a');
   // a.setAttribute('style', 'margin:6px;cursor:pointer;background-color:' + color);
   a.setAttribute('class','next'); 
    a.innerHTML = "Siguiente >>";
    a.setAttribute('id', 'pagina' + pagina);
    a.onclick = function () { cargarListadoDevo(pagina,ini,fin); };
    tabla.appendChild(a);
}

function insertarUltimaAS(name, pagina ,ini,fin) {
    tabla = document.getElementById(name);

    a = document.createElement('a');
   // a.setAttribute('style', 'margin:6px;cursor:pointer;background-color:' + color);
   a.setAttribute('class','next'); 
    a.innerHTML = "Última >>";
    a.setAttribute('id', 'pagina' + pagina);
    a.onclick = function () { cargarListadoDevo(pagina,ini,fin); };
    tabla.appendChild(a);
}

 function insertarNumeroAS(name, pagina,ini,fin) {
    tabla = document.getElementById(name);

    a = document.createElement('a');
    //a.setAttribute('style', 'margin:6px;cursor:pointer;background-color:' + color);
    a.innerHTML =" "+Number(pagina)+" ";
    a.setAttribute('id', 'pagina' + pagina);
    a.onclick = function () { cargarListadoDevo(pagina,ini,fin); };

    tabla.appendChild(a);
}

 function insertarActualAS(name, pagina,ini,fin) {
    tabla = document.getElementById(name);

    a = document.createElement('a');//class="active"
    //a.setAttribute('style', 'margin:6px;cursor:pointer;background-color:' + color);
    a.setAttribute('class','active');
    a.innerHTML =" "+Number(pagina)+" ";
    a.setAttribute('id', 'pagina' + pagina,ini,fin);
   // a.onclick = function () { cargarListadoActivo(pagina); };

    tabla.appendChild(a);
}





 
 function cargarcomboListadoTodosD(){
  
 
   // var nombregrupo=document.getElementById("nombreg").value;
    ClearSelect("buscargrupo");    
    ClearSelect("buscarsubgrupo");    
       
    ClearSelect("buscarobs"); 
    
    // var idgrupo=document.getElementById("cbogrupo").value;   
  // alert(document.getElementById("idaccion1").innerHTML);
         var parametros = {
            "tarea" : "cargarcombosListadoTodosD" 
        };
        $.ajax({
                data:  parametros,
                url:   'page_registro_activo_Ajax.php',
                type:  'post',
                beforeSend: function () {
                      //  $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response1) {
                     eval(response1);
                     
                  
              }
        });
 
 }
 
 
 
 
function CargaEditarDevolucion(){

    var prodId = getParameterByName('id');
     if(prodId.length>0  ){
         document.getElementById("idregistro").value=prodId;
          document.getElementById("idtitulo").innerHTML="VER";
          
     document.getElementById("txtfecha").disabled="disabled";
     document.getElementById("cboPersonal").disabled="disabled";
     document.getElementById("btnadd").disabled="disabled";
     document.getElementById("btndel").disabled="disabled";
     document.getElementById("btnadd").style.display="none";
     document.getElementById("btndel").style.display="none";
     
     document.getElementById("btnguardarind").disabled="disabled";
     
     document.getElementById("btnguardarind").style.display="none";
     document.getElementById("btnguardarimp").style.display="none";
     
     document.getElementById("btnvolver").style.display="block";
     
     document.getElementById("message").readOnly = true;
     
          
         
     }else{
         document.getElementById("idregistro").value=0;
         document.getElementById("idtitulo").innerHTML="NUEVO";
     }
     
      if(prodId.length>0){
      //   alert(prodId); 
        var parametros = {
            "tarea" : "cargarEditarDevo" ,
             "id" : prodId
        };
        $.ajax({
                data:  parametros,
                url:   'page_registro_activo_Ajax.php',
                type:  'post',
                beforeSend: function () {
                      //  $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response1) {
                     eval(response1);
                     
                  
              }
        });
 
 
 
          
          
          
          
          
          
      }
}



function cargarCaracteristicasDevo(desc1){
    //alert(desc1);
    descripcion_ = desc1.replace("|",String.fromCharCode(10));
    descripcion_ = descripcion_.replace("|",String.fromCharCode(10));
    descripcion_ = descripcion_.replace("|",String.fromCharCode(10));
    descripcion_ = descripcion_.replace("|",String.fromCharCode(10));
    descripcion_ = descripcion_.replace("|",String.fromCharCode(10));
    document.getElementById('message').value=descripcion_;
  //  alert(descripcion_);
    
}


// addRow("tableActivo",coducab_,codm_,nombre_,id_);
  function cargarfilaDetalleEditar(tableID,dato1,dato2,dato3,dato4) {

	var aux =  document.getElementById("conteo");
       // alert(aux.value);
        
	var num = parseInt(aux.value);
	var table =  document.getElementById(tableID);
	var rowCount = num;
	var lastRow = table.rows.length;
	num = num+1;
	var row = table.insertRow(lastRow);
        
        var celln = row.insertCell(0);
        
	var cell = row.insertCell(1);
	var element = document.createElement("input");
	element.type = "checkbox";
        element.disabled="disabled";
        element.style="transform: scale(1.5);  vertical-align: middle; text-align:center;    height:15px;  border:none font-size:15px; box-shadow: 0px 0px 0px rgba(0, 0, 0, 0); -webkit-box-shadow: 0px 0px 0px rgba(0, 0, 0, 0); -moz-box-shadow: 0px 0px 0px rgba(0, 0, 0, 0); ";
	cell.appendChild(element);
         var elemen4 =  document.createElement("input");
	elemen4.type = "hidden";	
	elemen4.name = "idactivo" + num;
	elemen4.id = "idactivo" + num;
        elemen4.value = dato4;
	cell.appendChild(elemen4);


	var cell0 = row.insertCell(2);   //celda 1
	//var element0 = window.opener.document.createElement("input");
	cell0.type = "text";
	cell0.name = "idcoducab" + num;
	cell0.id = "idcoducab" + num;
	//element0.setAttribute('class','boxBusqueda2');
	//element0.setAttribute('readonly','true');
	cell0.innerHTML=dato1;
	//cell0.appendChild(element0);

  var cell1=row.insertCell(3);
 // var element1 = window.opener.document.createElement("input");
 // element1.type = "text";
  cell1.name = "idcondm" + num;
  cell1.id = "idcondm" + num;
  //element1.setAttribute('class','boxBusqueda');
 // element1.setAttribute('readonly','true');
  cell1.innerHTML=dato2;
  //cell1.appendChild(element1);

	var cell2 = row.insertCell(4);   //celda 2
	//var element2 = window.opener.document.createElement("input");
	//element2.type = "textarea";
	cell2.name = "idnombre" + num;
	cell2.id = "idnombre" + num;
	//element2.setAttribute('class','boxBusqueda');
	//element2.setAttribute('readonly','true');
	cell2.innerHTML=dato3;
	//cell2.appendChild(element2);
        
       /* var cell5 = row.insertCell(5);   
	cell5.name = "idestad" + num;
	cell5.id = "idesta" + num; 
	cell5.innerHTML=dato5;
        
        */
 
        aux.value = num
       recontarIndice();
}



///------   paginado busqeda ext------


 
  function insertarAnterior_extD(name, pagina ,ini,fin) {
    tabla = document.getElementById(name);
    a = document.createElement('a');
   // a.setAttribute('style', 'margin:6px;cursor:pointer;background-color:' + color);
    a.setAttribute('class','next');
    a.innerHTML = "<< Anterior";
    a.setAttribute('id', 'pagina' + pagina);
    a.onclick = function () { cargarListadoActivoD_ext(pagina,ini,fin); };
    tabla.appendChild(a);
}

  function insertarPrimera_extD(name, pagina ,ini,fin) {
    tabla = document.getElementById(name);
    a = document.createElement('a');
   // a.setAttribute('style', 'margin:6px;cursor:pointer;background-color:' + color);
    a.setAttribute('class','next');
    a.innerHTML = "<< Priemra";
    a.setAttribute('id', 'pagina' + pagina);
    a.onclick = function () { cargarListadoActivoD_ext(pagina,ini,fin); };
    tabla.appendChild(a);
}



  function insertarSiguiente_extD(name, pagina ,ini,fin) {
    tabla = document.getElementById(name);

    a = document.createElement('a');
   // a.setAttribute('style', 'margin:6px;cursor:pointer;background-color:' + color);
   a.setAttribute('class','next'); 
    a.innerHTML = "Siguiente >>";
    a.setAttribute('id', 'pagina' + pagina);
    a.onclick = function () { cargarListadoActivoD_ext(pagina,ini,fin); };
    tabla.appendChild(a);
}

function insertarUltima_extD(name, pagina ,ini,fin) {
    tabla = document.getElementById(name);

    a = document.createElement('a');
   // a.setAttribute('style', 'margin:6px;cursor:pointer;background-color:' + color);
   a.setAttribute('class','next'); 
    a.innerHTML = "Última >>";
    a.setAttribute('id', 'pagina' + pagina);
    a.onclick = function () { cargarListadoActivoD_ext(pagina,ini,fin); };
    tabla.appendChild(a);
}

 function insertarNumero_extD(name, pagina,ini,fin) {
    tabla = document.getElementById(name);

    a = document.createElement('a');
    //a.setAttribute('style', 'margin:6px;cursor:pointer;background-color:' + color);
    a.innerHTML =" "+Number(pagina)+" ";
    a.setAttribute('id', 'pagina' + pagina);
    a.onclick = function () { cargarListadoActivoD_ext(pagina,ini,fin); };

    tabla.appendChild(a);
}

 function insertarActual_extD(name, pagina,ini,fin) {
    tabla = document.getElementById(name);

    a = document.createElement('a');//class="active"
    //a.setAttribute('style', 'margin:6px;cursor:pointer;background-color:' + color);
    a.setAttribute('class','active');
    a.innerHTML =" "+Number(pagina)+" ";
    a.setAttribute('id', 'pagina' + pagina,ini,fin);
   // a.onclick = function () { cargarListadoActivo(pagina); };

    tabla.appendChild(a);
}


function volver(){
window.location.href='listado_devoluciones.php';     
}

