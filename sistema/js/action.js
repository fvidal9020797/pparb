$(function() {

$('.delete').bind('click',function(){
 var a=$(this);  
      alertify.confirm("Desea Eliminar Predio con Codigo:"+ a.attr("id"), function (e) {
        if (e) {
      var action = {"action": "eliminar"};
      data =  "id=" + a.attr("id")+ "&" + $.param(action);
      location.href="index.php?"+data;
alertify.success("Success:Correcto");
      // $.post('./noticia-response.php',data, function(response){
      //      //done() es ejecutada cuándo se recibe la respuesta del servidor. response es el objeto JSON recibido
      //      if( response.success ) {
      //                     //alert(response.success);
      //                          // var output = "<h2>" + response.data.message + "</h2>";
      //                          //alert(response.data.message);
      //                          //$('#ct_dgp_codpredio').val(response.data.dato[0].f_predio);
      //                           //  alert(response.data.dato[0].f_predio);
      //                  var parent = a.parents().parents().get(0);
      //                 $(parent).remove();  
      //                   alertify.success("Success:"+ response.data.message);      
      //                           //Actualizamos el HTML del elemento con id="#response-container"
      //                         //  $("#response-container").html(output);

      //                     } else {
      //                           //response.success no es true
      //                           alertify.error("Error :" + response.data.message);
      //                          // $("#response-container").html('No ha habido suerte: ' + response.data.message);
      //                      }
      //                  }).fail(function() {

      //       // just in case posting your form failed
      //        alertify.error( "Posting failed." );

      //   });
          
        } else {
         alertify.error("Cancelado");
        }
      });
});
});