
var _ingresoItem_cnx1;
var altura=0;
var tipo2="";

function limpiar(table) {
 $("#"+table).find("tr:gt(0)").remove();

   ar d = document.getElementById(table);
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


funtion testNumero(txt)
{
    v = numero(txt.value);
    if( v == 1 && txt.value >=0)
    {

    }else{
       //alert(txt.value);
       tt.value = txt.value.substring(0, txt.value.length - 1);
    }
}


 functionmensajeAlerta(msj) {
    smoke.signal(msj, function (e) {

    }, {
        duration: 2500,
        classname: "custom-class"
    });
}


function ClearSelect(id) {
   // alert('clear:' + id);
	document.etElementById(id).options.length = 0;
}


function addItemCombo(nombre ,texto,valor)
{
   // alert('name='+nombre);
    //  alet('entro cargar combo cl='+nombre+"--"+valor +" -"+ texto );
    var objOption = new Option(texto, valor);
     //alert('name='+nombre);
     documen.getElementById(nombre).add(objOption);
    //alert('entro cargar combo');
}


function seleccionarCombo(name,texto){

    lista = document.getElementById(name);
   // alert('entro:'+lista.options.length);

    for (i=; sta.options.length ;i++) {
     //alert(lista.options[i].text+'-'+texto);
      if(lista.options[i].text==texto){
        lista.selectedIndex =i;
        break;
       // alert('sii='+lista.options[i].text+'-'+texto);
      }
    }
   // alert('termino');

}


function eleccionarComboId(name,id){

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
                    // alert('resp:'+response1);
                   if(response1>0){
                       mensajeAlerta("Sub-Grupo Guardado Correctamente.!");
                       cargarcombosubgrupo(response1,document.getElementById("cbogrupo").value);
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



 /*
 function guardarIndividual(){
    idgrupo_= document.getElementById("cbogrupo").value;
    idsubgrupo_=document.getElementById("cbosubgrupo").value;
    idestado_=document.getElementById("cboestado").value;
    idobs_=document.getElementById("cboObs").value;
    codigmdryt_=document.getElementById("idcodigomdryt").value;
    idnombre_=document.getElementById("cbonameg").value;
    descripcion_=document.getElementById("message").value;
    accion_=document.getElementById("idregistro").value;

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
            "acciongral" : accion_
            };
            $.ajax({
                    data:  parametros,
                    url:   'page_registro_activo_Ajax.php',
                    type:  'post',
                    beforeSend: function () {
                          //  $("#resultado").html("Procesando, espere por favor...");
                    },
                    success:  function (response1) {
                        // eval(response1);
                        if(response1>0){
                           document.getElementById("idregistro").value=response1;
                            // document.getElementById("btnguardarind").disabled = 'true';
                            $('#btnguardarind').attr("disabled", true);
                        mensajeAlerta("Datos Guardado Correctamente.!")
                        setTimeout ('nada ()', 2000);
                        location.href = 'listado_activo.php';
                        }else{

                            mensajeAlerta("Error al Guardar los Datos.!")
                        }


                  }
            });

      }




 }
 */
 function nada(){

 }

 function cargarListadoHistorial(paginaactual,pag_ini,pag_fin){
     limpiar("tableHistorial") ;


   var filtro="";
    var filtro2="";
        //-- FILTROS BUSCAR--
     bcoducab = document.getElementById('buscarcoducab').value;
     bcodm = document.getElementById('buscarcodm').value;
      bfecha = document.getElementById('buscarfecha').value;
     bcodgrupo = document.getElementById('buscargrupo').value;
     bcodsub = document.getElementById('buscarsubgrupo').value;
     bcodestado = document.getElementById('buscares').value;
     bnombre = document.getElementById('buscarnombre').value;
      bpers = document.getElementById('buscarpersonal').value;
      bdpt = document.getElementById('buscardpto').value;
      bregg = document.getElementById('buscarregional').value;
    basig= document.getElementById('buscarasig').value;

        if(bcoducab.length>0){
             filtro=filtro+" and   upper(ac.codigoucab) like '%'|| upper('"+bcoducab+"')||'%' ";
             filtro2=filtro2+" and   upper(ac.codigoucab) like '%'|| upper('"+bcoducab+"')||'%' ";
        }
        if(bcodm >0){
             filtro=filtro+"  and  upper(ac.codigomdryt) like '%'|| upper('"+bcodm+"')||'%' ";
             filtro2=filtro2+"  and  upper(ac.codigomdryt) like '%'|| upper('"+bcodm+"')||'%' ";
        }
         if(bfecha.length>0){
             filtro=filtro+" and  a.fechaasignacion ='%"+bfecha+"%'";
             filtro2=filtro2+" and  a.fechadevolucion ='%"+bfecha+"%'";
        }

        if(bcodgrupo >0){
             filtro=filtro+" and   ac.idgrupo = "+bcodgrupo+" ";
            filtro2=filtro2+" and   ac.idgrupo = "+bcodgrupo+" ";
        }

        if(bcodsub >0){
             filtro=filtro+" and   ac.idsubgrupo = "+bcodsub+" ";
             filtro2=filtro2+" and   ac.idsubgrupo = "+bcodsub+" ";
        }

        if(bpers >0){
             filtro=filtro+" and   a.idfuncionario ="+bpers+" ";
             filtro2=filtro2+" and   a.idfuncionario ="+bpers+" ";
        }

          if(bcodestado >0){
             filtro=filtro+" and   ac.idestado ="+bcodestado+" ";
             filtro2=filtro2+" and   ac.idestado ="+bcodestado+" ";
        }

          if(bnombre.length>0){
             filtro=filtro+"  and  upper(na.nombreactivo) like  '%'|| upper('"+bnombre+"')||'%' ";
             filtro2=filtro2+"  and  upper(na.nombreactivo) like  '%'|| upper('"+bnombre+"')||'%' ";
        }
         if(basig >0){
             filtro=filtro+" and   a.estadoasignado ="+basig+" ";
        }

         if(bdpt >0){
             filtro=filtro+" and    a.iddpto ="+bdpt+" ";
        }
         if(bregg >0){
             filtro=filtro+" and    a.idregional ="+bregg+" ";
        }



        var parametros = {
            "tarea" : "cargarListadoHistorial" ,
             "filtro" : filtro ,
             "filtro2" : filtro2 ,
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
                success:  function (response1) {
                     eval(response1);

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



function cargarFilaHistorial(codigo,indice,idactivo, coducab, codmdryt, fecha_,nombreactivo_ ,  grupo_,  subgrupo_,nombreesta_ ,npersonal_ ,ndpto_ ,nregional_ , nasig_, sw) {
// 12 item
    // alert(idIngreso + '-' + coducab + '-' + codmdryt + '-' + nombre + '-' + idgrup + '-' + grupo+ '-' + idsub+ '-' + subgrupo+ '-' + idarea+ '-' + area );
    tabla = document.getElementById('tableHistorial');
    codigo2=codigo;
    codigo=codigo.substr(0,4);
   // alert(codigo);
   if(codigo=="DEVO"){
     colord="#FF7F7F";
    }else{
        colord="#7FFF7F";
    }


    var colorr;
    if(sw){colorr="#DBF7DB";
    }else{
        colorr="#ffffff";}

    tr = document.createElement('tr');
    tr.setAttribute('id', 'trn-' + idactivo);

    tabla.appendChild(tr);

    tda = document.createElement('td');
    tda.setAttribute('id', 'tdida-' + idactivo);
    tda.innerHTML = codigo2;
    tda.style.background=colord;

    td0 = document.createElement('td');
    td0.setAttribute('id', 'tdid0-' + idactivo);
    td0.innerHTML = indice;
    td0.style.background=colorr;


    td1 = document.createElement('td');
    td1.setAttribute('id', 'tdid1-' + idactivo);
    td1.style.background=colorr;

    optVer = document.createElement('img');
    optVer.setAttribute('id', 'idimg');
    optVer.setAttribute('alt', 'Edit');
    optVer.setAttribute('src', '../images/logosdos/editar.png');
    optVer.setAttribute('style', ' margin-bottom:-6px;width:25px;height:25px; cursor:pointer; padding-bottom:-10px;');

    optVer.onclick = function () { window.location.href='registro_activo_uno.php?id=' + idactivo; } //{CancelarFila()}
    td1.appendChild(optVer);





      td13 = document.createElement('td');
    td13.setAttribute('id', 'tdid1-' + idactivo);
    td13.style.background=colorr;

    frm1 = document.createElement('form');
    frm1.setAttribute('name', 'form-' + idactivo);
    frm1.setAttribute('id', 'form-' + idactivo);
    frm1.setAttribute('method', 'post' );
    frm1.setAttribute('action', 'imprimir_historial.php' );

    input02  = document.createElement('input');
    input02.setAttribute('type', 'hidden' );
    input02.setAttribute('value',idactivo  );
    input02.setAttribute('name','idasig'  );
    input02.setAttribute('id','idasig'  );

    optVer = document.createElement('img');
    optVer.setAttribute('id', 'idimg');
    optVer.setAttribute('alt', 'Edit');
    optVer.setAttribute('src', '../images/logosdos/impresora2.png');
    optVer.setAttribute('style', ' margin-bottom:-6px;width:25px;height:25px; cursor:pointer; padding-bottom:-10px;');

   var  formu='form-'+ idactivo;
    optVer.onclick = function () {  document.getElementById(formu).submit(); } //{CancelarFila()}
    td13.appendChild(frm1);
    frm1.appendChild(input02);
    frm1.appendChild(optVer);





    td2 = document.createElement('td');
    td2.setAttribute('id', 'tdid2-' + idactivo);
    td2.innerHTML = coducab;
    td2.style.background=colorr;



    td3 = document.createElement('td');
    td3.innerHTML = codmdryt;
    td3.setAttribute('id', 'tdid3-' + idactivo);
    td3.style.background=colorr;

    td4 = document.createElement('td');
    td4.innerHTML = fecha_ ;
    td4.setAttribute('id', 'tdid4-' + idactivo);
   td4.style.background=colorr;


    td5 = document.createElement('td');
    td5.innerHTML = nombreactivo_;
    td5.setAttribute('id', 'tdid5-' + idactivo);
   td5.style.background=colorr;

    td6 = document.createElement('td');
    td6.innerHTML = grupo_;
    td6.setAttribute('id', 'tdid6-' + idactivo);
    td6.style.background=colorr;

    td7 = document.createElement('td');
    td7.innerHTML = subgrupo_;
    td7.setAttribute('id', 'tdid7-' + idactivo);
     td7.style.background=colorr;


    td8 = document.createElement('td');
    td8.innerHTML = nombreesta_;
    td8.setAttribute('id', 'tdid8-' + idactivo);
     td8.style.background=colorr;

     td9 = document.createElement('td');
    td9.innerHTML = npersonal_;
    td9.setAttribute('id', 'tdid8-' + idactivo);
     td9.style.background=colorr;


     td10 = document.createElement('td');
    td10.innerHTML = ndpto_;
    td10.setAttribute('id', 'tdid8-' + idactivo);
     td10.style.background=colorr;

     td11 = document.createElement('td');
    td11.innerHTML = nregional_;
    td11.setAttribute('id', 'tdid8-' + idactivo);
     td11.style.background=colorr;

    if(nasig_==1){
        nasig_="Asignado";
    }else{
        nasig_="Devuelto";
    }
     td12 = document.createElement('td');
    td12.innerHTML = nasig_;
    td12.setAttribute('id', 'tdid8-' + idactivo);
    td12.style.background=colorr;



    tr.appendChild(td0);
    tr.appendChild(tda);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(td4);
    tr.appendChild(td5);
    tr.appendChild(td6);
    tr.appendChild(td7);
    tr.appendChild(td8);
    tr.appendChild(td9);
    tr.appendChild(td10);
    tr.appendChild(td11);
    tr.appendChild(td12);
    //tr.appendChild(td1);
    tr.appendChild(td13);
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



 function cargarcomboHistorialTodos(){


   // var nombregrupo=document.getElementById("nombreg").value;
    ClearSelect("buscargrupo");
    ClearSelect("buscarsubgrupo");
    ClearSelect("buscares");
    ClearSelect("buscarpersonal");
    ClearSelect("buscarasig");
    ClearSelect("buscardpto");
    ClearSelect("buscarregional");

    // var idgrupo=document.getElementById("cbogrupo").value;
  // alert(document.getElementById("idaccion1").innerHTML);
         var parametros = {
            "tarea" : "cargarcombosHistorialTodos"
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


  function insertarAnterior(name, pagina,ini,fin ) {
    tabla = document.getElementById(name);
    a = document.createElement('a');
   // a.setAttribute('style', 'margin:6px;cursor:pointer;background-color:' + color);
    a.setAttribute('class','next');
    a.innerHTML = "<< Anterior";
    a.setAttribute('id', 'pagina' + pagina);
    a.onclick = function () { cargarListadoHistorial(pagina,ini,fin); };
    tabla.appendChild(a);
}

  function insertarPrimera(name, pagina ,ini,fin) {
    tabla = document.getElementById(name);
    a = document.createElement('a');
   // a.setAttribute('style', 'margin:6px;cursor:pointer;background-color:' + color);
    a.setAttribute('class','next');
    a.innerHTML = "<< Priemra";
    a.setAttribute('id', 'pagina' + pagina);
    a.onclick = function () { cargarListadoHistorial(pagina,ini,fin); };
    tabla.appendChild(a);
}



  function insertarSiguiente(name, pagina ,ini,fin) {
    tabla = document.getElementById(name);

    a = document.createElement('a');
   // a.setAttribute('style', 'margin:6px;cursor:pointer;background-color:' + color);
   a.setAttribute('class','next');
    a.innerHTML = "Siguiente >>";
    a.setAttribute('id', 'pagina' + pagina);
    a.onclick = function () { cargarListadoHistorial(pagina,ini,fin); };
    tabla.appendChild(a);
}

function insertarUltima(name, pagina ,ini,fin) {
    tabla = document.getElementById(name);

    a = document.createElement('a');
   // a.setAttribute('style', 'margin:6px;cursor:pointer;background-color:' + color);
   a.setAttribute('class','next');
    a.innerHTML = "Última >>";
    a.setAttribute('id', 'pagina' + pagina);
    a.onclick = function () { cargarListadoHistorial(pagina,ini,fin); };
    tabla.appendChild(a);
}

 function insertarNumero(name, pagina,ini,fin) {
    tabla = document.getElementById(name);

    a = document.createElement('a');
    //a.setAttribute('style', 'margin:6px;cursor:pointer;background-color:' + color);
    a.innerHTML =" "+Number(pagina)+" ";
    a.setAttribute('id', 'pagina' + pagina);
    a.onclick = function () { cargarListadoHistorial(pagina,ini,fin); };

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
