 
var _ingresoItem_cnx1;
var altura=0;
var tipo2="";
var response2=null;
var idgrupogral=0;

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




 function cargarcomboTodos(){
  
 
   // var nombregrupo=document.getElementById("nombreg").value;
    ClearSelect("cbogrupo");    
    ClearSelect("cbogruponew"); 
    ClearSelect("cbosubgrupo");    
    ClearSelect("cboestado");    
    ClearSelect("cbonameg");    
    ClearSelect("cboObs"); 
    // var idgrupo=document.getElementById("cbogrupo").value;   
  // alert(document.getElementById("idaccion1").innerHTML);
         var parametros = {
            "tarea" : "cargarcombosTodos" 
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
                     CargaEditarUno();
                  
              }
        });
 
 }
 
 
             
 
 

 function cargarcombogrupo(id){
  
 
   // var nombregrupo=document.getElementById("nombreg").value;
    ClearSelect("cbogrupo");    
    ClearSelect("cbogruponew");    
    // var idgrupo=document.getElementById("cbogrupo").value;   
  // alert(document.getElementById("idaccion1").innerHTML);
         var parametros = {
            "tarea" : "cargargrupo", 
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
 
 function cargarcombosubgrupo(id,idg){
  
 
   // var nombregrupo=document.getElementById("nombreg").value;
    ClearSelect("cbosubgrupo");    
    // var idgrupo=document.getElementById("cbogrupo").value;   
  // alert(document.getElementById("idaccion1").innerHTML);
         var parametros = {
            "tarea" : "cargarsubgrupo", 
            "id" : id,
            "idg" : idg
        };
        $.ajax({
                data:  parametros,
                url:   'page_registro_activo_Ajax.php',
                type:  'post',
                beforeSend: function () {
                      //  $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response1) {
                   //  alert(response1);
                     eval(response1);
                     
                  
              }
        });
 
 }
 
 
 function cargarcomboestado(id){
  
 
   // var nombregrupo=document.getElementById("nombreg").value;
    ClearSelect("cboestado");    
    // var idgrupo=document.getElementById("cbogrupo").value;   
  // alert(document.getElementById("idaccion1").innerHTML);
         var parametros = {
            "tarea" : "cargarestado", 
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
 
 function cargarcomboarea(id){
  
 
   // var nombregrupo=document.getElementById("nombreg").value;
    ClearSelect("cboarea");    
    // var idgrupo=document.getElementById("cbogrupo").value;   
  // alert(document.getElementById("idaccion1").innerHTML);
         var parametros = {
            "tarea" : "cargararea", 
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
 
  function cargarcombonamea(id){
  
 
   // var nombregrupo=document.getElementById("nombreg").value;
    ClearSelect("cbonameg");    
    // var idgrupo=document.getElementById("cbogrupo").value;   
  // alert(document.getElementById("idaccion1").innerHTML);
         var parametros = {
            "tarea" : "cargaranamea", 
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
 
 
 function cargarcomboobs(id){  
   // var nombregrupo=document.getElementById("nombreg").value;
    ClearSelect("cboObs");    
    // var idgrupo=document.getElementById("cbogrupo").value;   
  // alert(document.getElementById("idaccion1").innerHTML);
         var parametros = {
            "tarea" : "cargarobs", 
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
 
 
 
 function guardarcombo(tipo){
    // alert("tipoooo="+tipo);
     if(tipo=="grupo"){
         guardargrupo();
     }
     
     if(tipo=="subgrupo"){
         guardarsubgrupo();
     }
     
     if(tipo=="estado"){
         guardarestado();
     }
     
     if(tipo=="obs"){
         guardarobs();
     }
        if(tipo=="namea"){
         guardarname();
     }
     
 }
 function guardargrupo(){
  
 
    var nombregrupo=document.getElementById("nombreg").value;
        
    // var idgrupo=document.getElementById("cbogrupo").value;
  
 
  // alert(document.getElementById("idaccion1").innerHTML);
         var parametros = {
            "tarea" : "grupo",
             "nombregrupo" : nombregrupo,
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
                       cargarcombogrupo(response1);
                       cargarcombosubgrupo(0,response1);
                        //document.getElementById("cbogrupo").disabled = false;
                        //document.getElementById("cbosubgrupo").disabled = false;
            
                   cancelar();
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
 
 
 
  function guardarsubgrupo(){
  
 
    var nombresubgrupo=document.getElementById("nombreg").value; 
     
         var parametros = {
            "tarea" : "subgrupo",
             "nombresubgrupo" : nombresubgrupo,
             "accion" : document.getElementById("idaccion1").innerHTML,
             "id" : document.getElementById("cbosubgrupo").value,
             "idgruponew" : document.getElementById("cbogruponew").value
        };
        $.ajax({
                data:  parametros,
                url:   'page_registro_activo_Ajax.php',
                type:  'post',
                beforeSend: function () {
                      //  $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response1) {
                    //  alert('resp:'+response1);
                   if(response1>0){
                       mensajeAlerta("Sub-Grupo Guardado Correctamente.!");
                       cargarcombosubgrupo(response1,document.getElementById("cbogruponew").value);
                      // seleccionarComboId("cbogrupo", document.getElementById("cbogruponew").value);
                       
                       
                   cancelar();
                   }else{
                       mensajeAlerta("Error al Guardar el Sub-Grupo.!");                   
                   }
                   
               
              }
        });
 
 }
 
 
  
  function guardarestado(){
  
 
    var nombreestado=document.getElementById("nombreg").value;
     
         var parametros = {
            "tarea" : "estado",
             "nombreestado" : nombreestado,
             "accion" : document.getElementById("idaccion1").innerHTML,
             "id" : document.getElementById("cboestado").value
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
                       mensajeAlerta("Estado Guardado Correctamente.!");
                       cargarcomboestado(response1);
                     cancelar();
                   }else{
                       mensajeAlerta("Error al Guardar el Estado.!");                   
                   }
                   
               
              }
        });
 
 }
 
 
  function guardarobs(){
  
 
    var nombreestado=document.getElementById("nombreg").value;
     
         var parametros = {
            "tarea" : "obs",
             "nombreobs" : nombreestado,
             "accion" : document.getElementById("idaccion1").innerHTML,
             "id" : document.getElementById("cboObs").value
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
                       mensajeAlerta("Observación Guardado Correctamente.!");
                       cargarcomboobs(response1);
                     cancelar();
                   }else{
                       mensajeAlerta("Error al Guardar la Observación.!");                   
                   }
                   
               
              }
        });
 
 }
 
 
 
 
  function guardararea(){
  
 
    var nombresubgrupo=document.getElementById("nombreg").value;
     
         var parametros = {
            "tarea" : "area",
             "nombrearea" : nombresubgrupo,
             "accion" : document.getElementById("idaccion1").innerHTML,
             "id" : document.getElementById("cboarea").value
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
                       mensajeAlerta("Area Guardado Correctamente.!");
                       cargarcomboarea(response1);
                   cancelar();
                   }else{
                       mensajeAlerta("Error al Guardar el Area.!");                   
                   }
                   
               
              }
        });
 
 }
 
 
  function guardarname(){
  
 
    var nombresubgrupo=document.getElementById("nombreg").value;
     
         var parametros = {
            "tarea" : "name",
             "nombrename" : nombresubgrupo,
             "accion" : document.getElementById("idaccion1").innerHTML,
             "id" : document.getElementById("cbonameg").value
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
                       mensajeAlerta("Nombre Guardado Correctamente.!");
                       cargarcombonamea(response1);
                   cancelar();
                   }else{
                       mensajeAlerta("Error al Guardar el Nombre.!");                   
                   }
                   
               
              }
        });
 
 }
 
 
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
		 //	var actividad=$(this).attr("actividad");
    //  var nombrepredio = $(this).attr("nombre");
    //  var codigoparcela = $(this).attr("codigo");
 if(idaccion=="Editar"){//cbogrupo
     if(tipo=="grupo"){
      nameg=document.getElementById('cbogrupo').options[document.getElementById('cbogrupo').selectedIndex].text;
        nameg =nameg.split(" ("); 
        document.getElementById("nombreg").value=nameg[0];
      
     }
     
     if(tipo=="subgrupo"){
      nameg =document.getElementById('cbosubgrupo').options[document.getElementById('cbosubgrupo').selectedIndex].text;
      nameg =nameg.split(" ("); 
        document.getElementById("nombreg").value=nameg[0];
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
     
     
  }else{
   
  }
  tipo2=tipo;
   if(tipo=="subgrupo"){
         altura=300;
         document.getElementById("divdpto").style.display="block";
         document.getElementById("recuadro").style.height="150px";
         seleccionarComboId("cbogruponew", document.getElementById("cbogrupo").value);
     }else{
         altura= 250; 
         document.getElementById("divdpto").style.display="none";
          document.getElementById("recuadro").style.height="100px";
     }
        
		$("#idreg").val(1);
			$("#codigorcia").val("codigoparcela");
			$("#idaccion1").text(idaccion);
			$("#tipo").val(tipo); 

		  $("#dialogo2").dialog({  
			width: 590,  
                        
			height: altura, 
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
			height: altura+20,
			show: "scale",
			hide: "scale",
			resizable: "false",
			position: "center"
		});
	});
$("#b3").click(function() {
		$("#dialogo3").dialog({
			width: 610,
			height: altura+20,
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







/// ventana subgrupo



            
$(document).ready(function(){
           
  //Ocultamos el menú al cargar la página
  $("#context").hide();      
     $("#btngrupo").click(function(e) {
    $("#context").css({'display':'block', 'left':e.pageX, 'top':e.pageY});
   return false;
  });       
  //cuando hagamos click, el menú desaparecerá
  $(document).click(function(e){
    if(e.button == 0){
      $("#context").css("display", "none");
    }
  });
           
  //si pulsamos escape, el menú desaparecerá
  $(document).keydown(function(e){
    if(e.keyCode == 27){
      $("#context").css("display", "none");
    }
  });                    
});      


$(document).ready(function(){
           
  //Ocultamos el menú al cargar la página
  $("#contextsub").hide();      
     $("#btnsubgrupo").click(function(e) {
    $("#contextsub").css({'display':'block', 'left':e.pageX, 'top':e.pageY});
   return false;
  });       
  //cuando hagamos click, el menú desaparecerá
  $(document).click(function(e){
    if(e.button == 0){
      $("#contextsub").css("display", "none");
    }
  });
           
  //si pulsamos escape, el menú desaparecerá
  $(document).keydown(function(e){
    if(e.keyCode == 27){
      $("#contextsub").css("display", "none");
    }
  });                    
});  





$(document).ready(function(){
           
  //Ocultamos el menú al cargar la página
  $("#contextestado").hide();      
     $("#btnestado").click(function(e) {
    $("#contextestado").css({'display':'block', 'left':e.pageX, 'top':e.pageY});
   return false;
  });       
  //cuando hagamos click, el menú desaparecerá
  $(document).click(function(e){
    if(e.button == 0){
      $("#contextestado").css("display", "none");
    }
  });
           
  //si pulsamos escape, el menú desaparecerá
  $(document).keydown(function(e){
    if(e.keyCode == 27){
      $("#contextestado").css("display", "none");
    }
  });                    
});  






$(document).ready(function(){
           
  //Ocultamos el menú al cargar la página
  $("#contextobs").hide();      
     $("#btnObs").click(function(e) {
    $("#contextobs").css({'display':'block', 'left':e.pageX, 'top':e.pageY});
   return false;
  });       
  //cuando hagamos click, el menú desaparecerá
  $(document).click(function(e){
    if(e.button == 0){
      $("#contextobs").css("display", "none");
    }
  });
           
  //si pulsamos escape, el menú desaparecerá
  $(document).keydown(function(e){
    if(e.keyCode == 27){
      $("#contextarea").css("display", "none");
    }
  });                    
});  




$(document).ready(function(){
           
  //Ocultamos el menú al cargar la página
  $("#contextnamea").hide();      
     $("#btnnamea").click(function(e) {
    $("#contextnamea").css({'display':'block', 'left':e.pageX, 'top':e.pageY});
   return false;
  });       
  //cuando hagamos click, el menú desaparecerá
  $(document).click(function(e){
    if(e.button == 0){
      $("#contextnamea").css("display", "none");
    }
  });
           
  //si pulsamos escape, el menú desaparecerá
  $(document).keydown(function(e){
    if(e.keyCode == 27){
      $("#contextnamea").css("display", "none");
    }
  });                    
});  


      


 

 function eliminarEstado(idGrupo) {
    smoke.confirm("¿Desea Eliminar El Estado Seleccionado?", function (e) {
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


 function eliminarArea(idGrupo) {
    smoke.confirm("¿Desea Eliminar El Area Seleccionado?", function (e) {
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
  function eliminarNombre() {
    smoke.confirm("¿Desea Eliminar El Nombre Seleccionado?", function (e) {
        if (e) {
           // eliminarDetalleTraspasoFilaSI(idDetalleTraspaso,idDetalleIngresoItem)   
           var idname_= document.getElementById("cbonameg").value;
            var parametros = {
            "tarea" : "eliminarNombre" , 
            "idnombre" : idname_ , 
            };
            $.ajax({
                    data:  parametros,
                    url:   'page_registro_activo_Ajax.php',
                    type:  'post',
                    beforeSend: function () {
                         
                    },
                    success:  function (response1) {
                        // eval(response1);
                       
                        
                        if(response1>0){         
                             cargarcombonamea(0);
                            mensajeAlerta("Eliminado Correctamente.!");
                            
                        }else{
                           
                            mensajeAlerta("No Puede eliminar este Nombre esta en uso.!")
                        }
                    }
              });
            
        } else {

        }
    }, {
        ok: "Si",
        cancel: "No",
        classname: "custom-class",
        reverseButtons: true
    });
}
 
 
   function eliminarGrupo() {
    smoke.confirm("¿Desea Eliminar El Grupo Seleccionado?", function (e) {
        if (e) {
           // eliminarDetalleTraspasoFilaSI(idDetalleTraspaso,idDetalleIngresoItem)   
           var idname_= document.getElementById("cbogrupo").value;
            var parametros = {
            "tarea" : "eliminargrupo" , 
            "idnombre" : idname_ , 
            };
            $.ajax({
                    data:  parametros,
                    url:   'page_registro_activo_Ajax.php',
                    type:  'post',
                    beforeSend: function () {
                         
                    },
                    success:  function (response1) {
                        // eval(response1);
                       
                        
                        if(response1>0){         
                             cargarcombogrupo(0);
                            mensajeAlerta("Eliminado Correctamente.!");
                            
                        }else{
                           
                            mensajeAlerta("No Puede eliminar este Grupo esta en uso.!")
                        }
                    }
              });
            
        } else {

        }
    }, {
        ok: "Si",
        cancel: "No",
        classname: "custom-class",
        reverseButtons: true
    });
}
 
 
    function eliminarsubGrupo() {
    smoke.confirm("¿Desea Eliminar El Sub-Grupo Seleccionado?", function (e) {
        if (e) {
           // eliminarDetalleTraspasoFilaSI(idDetalleTraspaso,idDetalleIngresoItem)   
           var idname_= document.getElementById("cbosubgrupo").value;
            var parametros = {
            "tarea" : "eliminarsubgrupo" , 
            "idnombre" : idname_ , 
            };
            $.ajax({
                    data:  parametros,
                    url:   'page_registro_activo_Ajax.php',
                    type:  'post',
                    beforeSend: function () {
                         
                    },
                    success:  function (response1) {
                        // eval(response1);
                       
                        
                        if(response1>0){         
                             cargarcombosubgrupo(0);
                            mensajeAlerta("Eliminado Correctamente.!");
                            
                        }else{
                           
                            mensajeAlerta("No Puede eliminar este Grupo esta en uso.!")
                        }
                    }
              });
            
        } else {

        }
    }, {
        ok: "Si",
        cancel: "No",
        classname: "custom-class",
        reverseButtons: true
    });
}
 
 
 function guardarIndividual(){
    idgrupo_= document.getElementById("cbogrupo").value;
    idsubgrupo_=document.getElementById("cbosubgrupo").value;
    idestado_=document.getElementById("cboestado").value;
    idobs_=document.getElementById("cboObs").value;
    codigmdryt_=document.getElementById("idcodigomdryt").value;
    idnombre_=document.getElementById("cbonameg").value;
    descripcion_=document.getElementById("message").value;
    accion_=document.getElementById("idregistro").value;
    fecha_=document.getElementById("txtfecha").value;
    
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
     
     if(fecha_.length==0  ){
        error_  +=",  Fecha de compra ";
     }
     
    // alert(accion_);
       if(error_.length>0){
         
          mensajeAlerta(error_1+" "+error_);
         
      }else{
          //-----GUARDAR INDIVIDUAL ---///
           var parametros = {
            "tarea" : "guardarActivoIndividual" ,
            "codigom" : codigmdryt_ ,
            "idnombre" : idnombre_ ,
            "idgrupo" : idgrupo_ ,
            "idsubgrupo" :idsubgrupo_ ,
            "idestado" : idestado_ ,
            "idobs" : idobs_,
            "descripcion" : descripcion_ ,
            "fecha" : fecha_ ,            
            "acciongral" : accion_
            };
            $.ajax({
                    data:  parametros,
                    url:   'page_registro_activo_Ajax.php',
                    type:  'post',
                    beforeSend: function () {
                          //  $("#resultado").html("Procesando, espere por favor...");
                          $('#btnguardarind').attr("disabled", true);
                           // $('#btnguardarimp').attr("disabled", true);
                             $("#btnguardarind").css({'background':'#A5A5A5'});
                            // $("#btnguardarimp").css({'background':'#A5A5A5'});
                    },
                    success:  function (response1) {
                        // eval(response1);
                        if(response1>0){                            
                           document.getElementById("idregistro").value=response1;
                            // document.getElementById("btnguardarind").disabled = 'true';
                            $('#btnguardarind').attr("disabled", true); 
                           // $('#btnguardarimp').attr("disabled", true);
                             $("#btnguardarind").css({'background':'#A5A5A5'});
                        mensajeAlerta("Datos Guardado Correctamente.!")
                        setTimeout ('nada ()', 2000); 
                        location.href = 'listado_activo.php';
                        }else{
                          $('#btnguardarind').attr("disabled", false);
                           $("#btnguardarind").css({'background':'#2ecc71'});
                            mensajeAlerta("Error al Guardar los Datos.!")
                        }


                  }
            });
        
      }  
     
     
     
     
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
     bfecha = document.getElementById('buscarfecha').value;
        
        if(bfecha.length>0){            
            filtro=filtro+" and  a.fecha='"+bfecha+"' ";
        }
        
         if(bcoducab.length>0){            
             filtro=filtro+" and  a.codigoucab like '%"+bcoducab+"%'";
        }
        
        if(bcodm >0){            
             filtro=filtro+"  and  a.codigomdryt like '%"+bcodm+"%'";
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
             filtro=filtro+"  and  na.nombreactivo like '%"+bnombre+"%'";
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
                        document.getElementById('div_load').style.display = 'block';
                        document.getElementById('div_load').innerHTML = 'Cargando...';
               
 
                },
                success:  function (response2) {
                     eval(response2);
                     
                   document.getElementById('div_load').innerHTML = '';
                     document.getElementById('div_load').style.display = 'none';
 
              }
        });   
 }
 
 
 
 
 
 
 

function ArmarCabeceraFilaActivo() {


    // alert ('armar fila');   
    tabla = document.getElementById('tableActivo');
    //------------------------------------

    tr = document.createElement('tr');
    tr.setAttribute('style', 'border:solid 0px; background-color:#878787;color:#FFFFFF;');

    tabla.appendChild(tr);
    //tabla.setAttribute('class','tablaPipeline');  
    tabla.setAttribute('style', ' cellspacing="0" cellpadding="0"; ');


    td11 = document.createElement('td');
    td11.setAttribute('style', 'border:solid 1px #C0C0C0;text-align: center; width:120px; font-weight:bold;');  //background-color:#A83435;color:#FFFFFF;
    td11.innerHTML = 'Nro Correlativo';  // &nbsp;

    //---
    td2 = document.createElement('td');
    td2.setAttribute('style', 'border:solid 1px #C0C0C0;text-align: center; width:100px; font-weight:bold;');  //background-color:#A83435;color:#FFFFFF;
    td2.innerHTML = 'Fecha Ingreso';  // &nbsp;

    td3 = document.createElement('td');
    td3.setAttribute('style', 'border:solid 1px #C0C0C0;text-align: center; width:70px; font-weight:bold;');  //background-color:#A83435;color:#FFFFFF;
    td3.innerHTML = 'Nro Reporte';  // &nbsp;


    td4 = document.createElement('td');
    td4.setAttribute('style', 'border:solid 1px #C0C0C0;text-align: center; width:160px; font-weight:bold;');  //background-color:#A83435;color:#FFFFFF;
    td4.innerHTML = 'Concepto';  // &nbsp;

    td6 = document.createElement('td');
    td6.setAttribute('style', 'border:solid 1px #C0C0C0;text-align: center; width:150px;  font-weight:bold;');  //background-color:#A83435;color:#FFFFFF;
    td6.innerHTML = 'Responsable Recepción';  // &nbsp;

    td7cab = document.createElement('td');
    td7cab.setAttribute('style', 'border:solid 1px #C0C0C0;text-align: center; width:150px;  font-weight:bold;');  //background-color:#A83435;color:#FFFFFF;
    td7cab.innerHTML = 'Responsable Entrega';  // &nbsp;




    td1 = document.createElement('td');
    td1.setAttribute('style', 'border:solid 1px #C0C0C0;text-align: center; width:110px;  ALIGN="CENTER";');
    optp = document.createElement('p');
    optp.setAttribute('style', ' width:110px; margin:0px; text-align: center; ALIGN="CENTER"; ');
    td1.appendChild(optp);

    optEditar = document.createElement('a');
    optEditar.setAttribute('id', 'optEditar');
    optEditar.setAttribute('href', 'Javascript:nuevoRegistro();');
//    optEditar.setAttribute('style', 'cursor:pointer;  ');
    optEditar.setAttribute('style', 'cursor:pointer; color:#C00000; width:120px; font-weight:bold; text-align: center; ALIGN="CENTER";');
    // optEditar.onclick = function(){nuevaFila()} 
    optEditar.innerHTML = 'Nuevo Registro';  // &nbsp;
    optp.appendChild(optEditar);


    tr.appendChild(td1);
    tr.appendChild(td11);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(td4);
    tr.appendChild(td6);
    tr.appendChild(td7cab);    
    


}

 
 
function cargarFilaActivo(indice,idIngreso, coducab, codmdryt,fechac_, nombre_ , grupo,  subgrupo,nombreobs ,nombreesta, sw) {
// 12 item 
    // alert(idIngreso + '-' + coducab + '-' + codmdryt + '-' + nombre + '-' + idgrup + '-' + grupo+ '-' + idsub+ '-' + subgrupo+ '-' + idarea+ '-' + area );
     tabla = document.getElementById('tableActivo');
    
      var colorr;
    if(sw=="true"){colorr="#DBF7DB";
    }else{
        colorr="#ffffff";}
    
    
     if(nombreesta=="DE ALTA"){
     colord=colorr;
    }else{
        colord="#FF7F7F";
    }
    
    
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
  
  td33 = document.createElement('td');   
    td33.innerHTML = fechac_; 
    td33.setAttribute('id', 'tdid33-' + idIngreso);
  td33.style.background=colorr;
  
  
  

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
    td8.style.background=colord;
     
  
    tr.appendChild(td0);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(td33);
    tr.appendChild(td4);
    tr.appendChild(td5);
    tr.appendChild(td6);
    tr.appendChild(td7);
    tr.appendChild(td8); 
    tr.appendChild(td1); 
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
     fecha_=document.getElementById("txtfecha").value;
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
      
     if(fecha_.length==0  ){
        error_  +=",  Fecha  de compra ";
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
            "fecha" : fecha_ ,
            
            "acciongral" : accion_            
            };
            $.ajax({
                    data:  parametros,
                    url:   'page_registro_activo_Ajax.php',
                    type:  'post',
                    beforeSend: function () {
                          //  $("#resultado").html("Procesando, espere por favor...");
                        $('#btnguardarind').attr("disabled", true);
                         $("#btnguardarind").css({'background':'#A5A5A5'});
                    },
                    success:  function (response1) {
                         eval(response1);
                          mensajeAlerta("Datos Guardado Correctamente.!")
                        setTimeout ('nada ()', 2000); 
                        location.href = 'listado_activo.php';  

                  }
            });
        
      }  
     
     
     
     
 }
 
 
 function buscaractivo(){
     
    // $("#".tablef).find("tr:gt(0)").remove();
      
 }
 
 
 
 function cargarcomboListadoTodos(){
  
 
   // var nombregrupo=document.getElementById("nombreg").value;
    ClearSelect("buscargrupo");    
    ClearSelect("buscarsubgrupo");    
    ClearSelect("buscares");      
    ClearSelect("buscarobs"); 
    
    // var idgrupo=document.getElementById("cbogrupo").value;   
  // alert(document.getElementById("idaccion1").innerHTML);
         var parametros = {
            "tarea" : "cargarcombosListadoTodos" 
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


///---- paginado del buscar ext ---

 
  function insertarAnterior_ext(name, pagina ) {
    tabla = document.getElementById(name);
    a = document.createElement('a');
   // a.setAttribute('style', 'margin:6px;cursor:pointer;background-color:' + color);
    a.setAttribute('class','next');
    a.innerHTML = "<< Anterior";
    a.setAttribute('id', 'pagina' + pagina);
    a.onclick = function () { cargarListadoActivo_ext(pagina,ini,fin);  };
    tabla.appendChild(a);
}

  function insertarPrimera_ext(name, pagina ,ini,fin) {
    tabla = document.getElementById(name);
    a = document.createElement('a');
   // a.setAttribute('style', 'margin:6px;cursor:pointer;background-color:' + color);
    a.setAttribute('class','next');
    a.innerHTML = "<< Priemra";
    a.setAttribute('id', 'pagina' + pagina);
    a.onclick = function () { cargarListadoActivo_ext(pagina,ini,fin); };
    tabla.appendChild(a);
}



  function insertarSiguiente_ext(name, pagina ,ini,fin) {
    tabla = document.getElementById(name);

    a = document.createElement('a');
   // a.setAttribute('style', 'margin:6px;cursor:pointer;background-color:' + color);
   a.setAttribute('class','next'); 
    a.innerHTML = "Siguiente >>";
    a.setAttribute('id', 'pagina' + pagina);
    a.onclick = function () { cargarListadoActivo_ext(pagina,ini,fin); };
    tabla.appendChild(a);
}

function insertarUltima_ext(name, pagina ,ini,fin) {
    tabla = document.getElementById(name);

    a = document.createElement('a');
   // a.setAttribute('style', 'margin:6px;cursor:pointer;background-color:' + color);
   a.setAttribute('class','next'); 
    a.innerHTML = "Última >>";
    a.setAttribute('id', 'pagina' + pagina);
    a.onclick = function () { cargarListadoActivo_ext(pagina,ini,fin); };
    tabla.appendChild(a);
}

 function insertarNumero_ext(name, pagina,ini,fin) {
    tabla = document.getElementById(name);

    a = document.createElement('a');
    //a.setAttribute('style', 'margin:6px;cursor:pointer;background-color:' + color);
    a.innerHTML =" "+Number(pagina)+" ";
    a.setAttribute('id', 'pagina' + pagina);
    a.onclick = function () { cargarListadoActivo(pagina,ini,fin); };

    tabla.appendChild(a);
}

 function insertarActual_ext(name, pagina,ini,fin) {
    tabla = document.getElementById(name);

    a = document.createElement('a');//class="active"
    //a.setAttribute('style', 'margin:6px;cursor:pointer;background-color:' + color);
    a.setAttribute('class','active');
    a.innerHTML =" "+Number(pagina)+" ";
    a.setAttribute('id', 'pagina' + pagina,ini,fin);
   // a.onclick = function () { cargarListadoActivo(pagina); };

    tabla.appendChild(a);
}



 function cargarcomboreporte(){
  
 
   // var nombregrupo=document.getElementById("nombreg").value;
    ClearSelect("cbogrupo");    
    ClearSelect("cboregional");    
    ClearSelect("cboPersonal");  
   // ClearSelect("cboPersonal2");  
    
     ClearSelect("cboregional2");  
     ClearSelect("cboactivo");  
    // var idgrupo=document.getElementById("cbogrupo").value;   
  // alert(document.getElementById("idaccion1").innerHTML);
         var parametros = {
            "tarea" : "cargarcombosreporte" 
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
                    // CargaEditarUno();
                  
              }
        });
 
 }
 
  
 function cargarcombosubgrupoReport(id,idg){
  
 
   // var nombregrupo=document.getElementById("nombreg").value;
    ClearSelect("cbosubgrupo");    
    // var idgrupo=document.getElementById("cbogrupo").value;   
  // alert(document.getElementById("idaccion1").innerHTML);
          
       
        
         var parametros = {
            "tarea" : "cargarsubgrupo", 
            "id" : id,
            "idg" : idg
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
                      namegrupo=document.getElementById('cbogrupo').options[document.getElementById('cbogrupo').selectedIndex].text;
                    
                      document.getElementById('namegrupo').value=namegrupo;
                      
              }
        });
 
 }
 
 
 
 function cargarnamesub(){
      namesub=document.getElementById('cbosubgrupo').options[document.getElementById('cbosubgrupo').selectedIndex].text;
     document.getElementById('namesub').value=namesub;
 }
 
 
 
 
 function bloquearcombos(){
     var idname_=document.getElementById('cbonameg').value;
     //if(idname_ > 0){
      //  document.getElementById("cbogrupo").disabled = 'true';
      //  document.getElementById("cbosubgrupo").disabled = 'true';
    // }else{
       document.getElementById("cbogrupo").disabled = false;
       document.getElementById("cbosubgrupo").disabled = false;
       
       document.getElementById("btngrupo").disabled = false;
       document.getElementById("btnsubgrupo").disabled = false;
       
       document.getElementById("btngrupo").style.background = "#27AE60";// #27AE60
       document.getElementById("btnsubgrupo").style.background = "#27AE60"; // #7F8C8D
        
        
     //}
     
     //--seleccionar combos correscpondiente
 
      if(idname_>0){
      //   alert(prodId); 
        var parametros = {
            "tarea" : "cargarEditarCombos" ,  
             "id" : idname_
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
 
 
 function cargarnameregional(){
     namep=document.getElementById('cboregional').options[document.getElementById('cboregional').selectedIndex].text;
     document.getElementById('nameregional').value=namep;
}

 function cargarnamepersonal(){
     namep=document.getElementById('cboPersonal').options[document.getElementById('cboPersonal').selectedIndex].text;
     document.getElementById('nameper').value=namep;
}

 function cargarnamepersonal2(){
     namep=document.getElementById('cboPersonal2').options[document.getElementById('cboPersonal2').selectedIndex].text;
     document.getElementById('nameper2').value=namep;
}


 function cargarnamea(){
     namep=document.getElementById('cboactivo').options[document.getElementById('cboactivo').selectedIndex].text;
     document.getElementById('namea').value=namep;
}




  
  function cargarregional2(){
      namesub=document.getElementById('cboregional2').options[document.getElementById('cboregional2').selectedIndex].text;
     document.getElementById('namereg2').value=namesub;
 }
 
 