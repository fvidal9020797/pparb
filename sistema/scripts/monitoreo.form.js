$(function() {	
	/*
	if there are errors don't allow the user to submit
		*/
	$('#registerButton').bind('click',function(){
		if($('#formElem').data('errors')){
			alert('Please correct the errors in the Form');
			return false;
		}	
	});
	/*
	if there are errors don't allow the user to submit
		*/
		/*
	validates errors on all the fieldsets
	records if the Form has errors in $('#formElem').data()
	*/
	function validateStep1(){
		var FormErrors = false;		
		  // $("#formid").validate({
    //     rules: {
    //         name: { required: true, minlength: 2},
    //         lastname: { required: true, minlength: 2},
    //         email: { required:true, email: true},
    //         phone: { minlength: 2, maxlength: 15},
    //         years: { required: true},
    //         message: { required:true, minlength: 2}
    //     },
    //     messages: {
    //         name: "Debe introducir su nombre.",
    //         lastname: "Debe introducir su apellido.",
    //         email : "Debe introducir un email válido.",
    //         phone : "El número de teléfono introducido no es correcto.",
    //         years : "Debe introducir solo números.",
    //         message : "El campo Mensaje es obligatorio.",
    //     }
    // });

		// if(error == -1){
		// 	FormErrors = true;
		// 	$('#formElem').data('errors',FormErrors);
		// 	return false;	
		// }else{
			return true;
		// }	
	}
	// $('#guardarstep').bind('click',function(){
	function guardar(){
		var e = validateStep1();
		$('#guardarstep').hide();

		if(e){
		  // show that something is loading
		  $('#form-asignacion').validate ();
		  $("#loading-div-background").show();
		  var datastep = {"step":"informacion","action": "guardar-informacion"};
		  data = $('#form-asignacion').serialize() + "&" + $.param(datastep);

			alertify.error('Error :' +data);			
		  $.post('./response-monotoreo.php',data, function(response){
           //done() es ejecutada cuándo se recibe la respuesta del servidor. response es el objeto JSON recibido
           $("#loading-div-background").hide();
           $('#guardarstep').show();
           if( response.success ) {
                          //alert(response.success);
                               // var output = "<h2>" + response.data.message + "</h2>";
                               alertify.success('Success:' + response.data.message);
                               //$('#ct_dgp_codpredio').val(response.data.dato[0].f_predio);
                                //  alert(response.data.dato[0].f_predio);

                                $("#ct_dgp_codpredio" ).val(response.data.dato[0].f_predio);
                                //Actualizamos el HTML del elemento con id="#response-container"
                              //  $("#response-container").html(output);

                          } else {
                                //response.success no es true
                                 alertify.error('Error :' + response.data.message);
                               // $("#response-container").html('No ha habido suerte: ' + response.data.message);
                           }


                       }).fail(function() {

            // just in case posting your form failed
           alertify.error('Error : Posting failed.' );
            $("#loading-div-background").hide();
            $('#guardarstep').show();

        });

        // to prevent refreshing the whole page page
        return false;
    }else{
    	alertify.error('Error :Por favor corrija los errores');
    	$('#guardarstep').show();
    	return false;

    } 
};
// );

$('#guardarstep2').bind('click',function(){
	var e = validateStep1();
	$('#guardarstep2').hide();
	if(e){
		  // show that something is loading
		  $("#loading-div-background").show();
		  var datastep = {"step": current};
		  data = $(this).parent().parent().serialize() + "&" + $.param(datastep);

		  $.post('./catastro-response.php',data, function(response){
           //done() es ejecutada cuándo se recibe la respuesta del servidor. response es el objeto JSON recibido
           if( response.success ) {
                          //alert(response.success);
                               // var output = "<h2>" + response.data.message + "</h2>";
                                alertify.success('Success:' +response.data.message);
                               //$('#ct_dgp_codpredio').val(response.data.dato[0].f_predio);
                                //  alert(response.data.dato[0].f_predio);

                                $("#ct_dgp" ).val(response.data.dato[0].f_predio);
                                //Actualizamos el HTML del elemento con id="#response-container"
                              //  $("#response-container").html(output);

                          } else {
                                //response.success no es true
                                alertify.error('Error :' +  response.data.message);
                               // $("#response-container").html('No ha habido suerte: ' + response.data.message);
                           }
                       }).fail(function() {

            // just in case posting your form failed
            alertify.error('Error : Posting failed.' );

        });

                       $("#loading-div-background").hide();
                       $('#guardarstep2').show();
        // to prevent refreshing the whole page page
        return false;
    }else{
    	alertify.error('Error : Por favor corrija los errores');
    	$('#guardarstep2').show();
    	return false;

    } 
});


$('#guardarstep3').bind('click',function(){
	var e = validateStep1();
	$('#guardarstep3').hide();
	if(e){
		  // show that something is loading
		  $("#loading-div-background").show();
		  var datastep = {"step": current};
		  data = $(this).parent().parent().serialize() + "&" + $.param(datastep);

		  $.post('./catastro-response.php',data, function(response){
           //done() es ejecutada cuándo se recibe la respuesta del servidor. response es el objeto JSON recibido
           if( response.success ) {
                          //alert(response.success);
                               // var output = "<h2>" + response.data.message + "</h2>";
                               alertify.success('Success:'+response.data.message);
                               // alert(response.data.dato[1].valor);
                               //$('#ct_dgp_codpredio').val(response.data.dato[0].f_predio);
                                //  alert(response.data.dato[0].f_predio);

                                $("#ct_idpersona" ).val(response.data.dato[0].crear_propietario);
                                //Actualizamos el HTML del elemento con id="#response-container"
                              //  $("#response-container").html(output);                              

                              Things =response.data.dato;
                              //Things =JSON.stringify(Things);
                              	//var a=Things[1].id;
                              //	alert(a);
								//alert(Things.length);
								if (!Things)
								{
									//alert("No se encontraron registros para la cédula especificada");
									return;
								}

								var Thing;
								for (var idx in Things)
								{
									if (idx>0) {
										Thing =Things[idx];
										id =Thing.id;
										valor =Thing.valor;
										$(id).val(valor);
									};
								}


							} else {
                                //response.success no es true
                               alertify.error('Error :'+ response.data.message);
                               // $("#response-container").html('No ha habido suerte: ' + response.data.message);
                           }
                       }).fail(function() {

            // just in case posting your form failed
             alertify.error('Error : Posting failed.' );

        });

                       $("#loading-div-background").hide();
                       $('#guardarstep3').show();
        // to prevent refreshing the whole page page
        return false;
    }else{
    	 alertify.error('Error : Por favor corrija los errores');
    	$('#guardarstep3').show();
    	return false;

    } 
});

$('#guardarstep4').bind('click',function(){
	var e = validateStep1();
	$('#guardarstep4').hide();
	if(e){
		  // show that something is loading
		  $("#loading-div-background").show();
		  var datastep = {"step": current};
		  data = $(this).parent().parent().serialize() + "&" + $.param(datastep);

		  $.post('./catastro-response.php',data, function(response){
           //done() es ejecutada cuándo se recibe la respuesta del servidor. response es el objeto JSON recibido
           if( response.success ) {
                          //alert(response.success);
                               // var output = "<h2>" + response.data.message + "</h2>";
                               alertify.success('Success:'+response.data.message);
                               //$('#ct_dgp_codpredio').val(response.data.dato[0].f_predio);
                                //  alert(response.data.dato[0].f_predio);

                                $("#ct_dgp" ).val(response.data.dato[0].f_predio);
                                //Actualizamos el HTML del elemento con id="#response-container"
                              //  $("#response-container").html(output);

                          } else {
                                //response.success no es true
                                alertify.error('Error :' + response.data.message);
                               // $("#response-container").html('No ha habido suerte: ' + response.data.message);
                           }
                       }).fail(function() {

            // just in case posting your form failed
            alertify.error('Error :Posting failed.');

        });

                       $("#loading-div-background").hide();
                       $('#guardarstep4').show();
        // to prevent refreshing the whole page page
        return false;
    }else{
    	alertify.error('Error : Por favor corrija los errores');
    	$('#guardarstep4').show();
    	return false;

    } 
});


$('#guardarstep5').bind('click',function(){
	var e = validateStep1();
	$('#guardarstep5').hide();
	if(e){
		  // show that something is loading
		  $("#loading-div-background").show();
		  var datastep = {"step": current};
		  data = $(this).parent().parent().serialize() + "&" + $.param(datastep);

		  $.post('./catastro-response.php',data, function(response){
           //done() es ejecutada cuándo se recibe la respuesta del servidor. response es el objeto JSON recibido
           if( response.success ) {
                          //alert(response.success);
                               // var output = "<h2>" + response.data.message + "</h2>";
                              alertify.success('Success:'+response.data.message);
                               //$('#ct_dgp_codpredio').val(response.data.dato[0].f_predio);
                                //  alert(response.data.dato[0].f_predio);

                                $("#ct_dgp" ).val(response.data.dato[0].f_predio);
                                //Actualizamos el HTML del elemento con id="#response-container"
                              //  $("#response-container").html(output);

                          } else {
                                //response.success no es true
                                alertify.error('Error :' + response.data.message);
                               // $("#response-container").html('No ha habido suerte: ' + response.data.message);
                           }
                       }).fail(function() {

            // just in case posting your form failed
            alertify.error('Error : Posting failed.' );

        });

                       $("#loading-div-background").hide();
                       $('#guardarstep5').show();
        // to prevent refreshing the whole page page
        return false;
    }else{
    	alertify.error('Error :Por favor corrija los errores');
    	$('#guardarstep5').show();
    	return false;

    } 
});



$('#guardarstep6').bind('click',function(){
	var e = validateStep1();
	$('#guardarstep6').hide();
	if(e){
		  // show that something is loading
		  $("#loading-div-background").show();
		  var datastep = {"step": current};
		  data = $(this).parent().parent().serialize() + "&" + $.param(datastep);

		  $.post('./catastro-response.php',data, function(response){
           //done() es ejecutada cuándo se recibe la respuesta del servidor. response es el objeto JSON recibido
           if( response.success ) {
                          //alert(response.success);
                               // var output = "<h2>" + response.data.message + "</h2>";
                              alertify.success('Success:'+response.data.message);
                               //$('#ct_dgp_codpredio').val(response.data.dato[0].f_predio);
                                //  alert(response.data.dato[0].f_predio);

                                $("#ct_dgp" ).val(response.data.dato[0].f_predio);
                                //Actualizamos el HTML del elemento con id="#response-container"
                              //  $("#response-container").html(output);

                          } else {
                                //response.success no es true
                                 alertify.error('Error :' + response.data.message);
                               // $("#response-container").html('No ha habido suerte: ' + response.data.message);
                           }
                       }).fail(function() {

            // just in case posting your form failed
             alertify.error('Error : Posting failed.' );

        });

                       $("#loading-div-background").hide();
                       $('#guardarstep6').show();
        // to prevent refreshing the whole page page
        return false;
    }else{
    	 alertify.error('Error : Por favor corrija los errores');
    	$('#guardarstep6').show();
    	return false;

    } 
});

/* carasteristicas de la construcción*/

$('#guardarstep7').bind('click',function(){
	var e = validateStep1();
	$('#guardarstep7').hide();
	if(e){
		  // show that something is loading
		  $("#loading-div-background").show();
		  var datastep = {"step": current};
		  data = $(this).parent().parent().serialize() + "&" + $.param(datastep);

		  $.post('./catastro-response.php',data, function(response){
           //done() es ejecutada cuándo se recibe la respuesta del servidor. response es el objeto JSON recibido
           if( response.success ) {
                          //alert(response.success);
                               // var output = "<h2>" + response.data.message + "</h2>";
                               alertify.success('Success:'+response.data.message);
                               //$('#ct_dgp_codpredio').val(response.data.dato[0].f_predio);
                                //  alert(response.data.dato[0].f_predio);

                                $("#ct_dgp" ).val(response.data.dato[0].f_predio);
                                //Actualizamos el HTML del elemento con id="#response-container"
                              //  $("#response-container").html(output);

                          } else {
                                //response.success no es true
                                 alertify.error('Error :' + response.data.message);
                               // $("#response-container").html('No ha habido suerte: ' + response.data.message);
                           }
                       }).fail(function() {

            // just in case posting your form failed
             alertify.error('Error : Posting failed.' );

        });

                       $("#loading-div-background").hide();
                       $('#guardarstep7').show();
        // to prevent refreshing the whole page page
        return false;
    }else{
    	 alertify.error('Error :Por favor corrija los errores');
    	$('#guardarstep7').show();
    	return false;

    } 
});



$('#guardarstep8').bind('click',function(){
	var e = validateStep1();
	$('#guardarstep8').hide();
	if(e){
		  // show that something is loading
		  $("#loading-div-background").show();
		  var datastep = {"step": current};
		  data = $(this).parent().parent().serialize() + "&" + $.param(datastep);
		  $.post('./catastro-response.php',data, function(response){
           //done() es ejecutada cuándo se recibe la respuesta del servidor. response es el objeto JSON recibido
           if( response.success ) {
                          //alert(response.success);
                               // var output = "<h2>" + response.data.message + "</h2>";
                               alertify.success('Success:'+response.data.message);
                               //$('#ct_dgp_codpredio').val(response.data.dato[0].f_predio);
                                //  alert(response.data.dato[0].f_predio);

                                $("#ct" ).val(response.data.dato[0].f_caracteristicas_bloque);
                                //Actualizamos el HTML del elemento con id="#response-container"
                              //  $("#response-container").html(output);

                          } else {
                                //response.success no es true
                                alertify.error('Error :' +response.data.message);
                               // $("#response-container").html('No ha habido suerte: ' + response.data.message);
                           }
                       }).fail(function() {

            // just in case posting your form failed
             alertify.error('Error : Posting failed.' );

        });

                       $("#loading-div-background").hide();
                       $('#guardarstep8').show();
        // to prevent refreshing the whole page page
        return false;
    }else{
    	 alertify.error('Error :Por favor corrija los errores');
    	$('#guardarstep8').show();
    	return false;

    } 
});



$('#guardarstep9').bind('click',function(){
	var e = validateStep1();
	$('#guardarstep9').hide();
	if(e){
		  // show that something is loading
		  $("#loading-div-background").show();
		  var datastep = {"step": current};
		  data = $(this).parent().parent().serialize() + "&" + $.param(datastep);
		  $.post('./catastro-response.php',data, function(response){
           //done() es ejecutada cuándo se recibe la respuesta del servidor. response es el objeto JSON recibido
           if( response.success ) {
                          //alert(response.success);
                               // var output = "<h2>" + response.data.message + "</h2>";
                               alertify.success('Success:'+response.data.message);
                               //$('#ct_dgp_codpredio').val(response.data.dato[0].f_predio);
                                //  alert(response.data.dato[0].f_predio);

                                $("#ct" ).val(response.data.dato[0].f_caracteristicas_bloque);
                                //Actualizamos el HTML del elemento con id="#response-container"
                              //  $("#response-container").html(output);

                          } else {
                                //response.success no es true
                                alertify.error('Error :' + response.data.message);
                               // $("#response-container").html('No ha habido suerte: ' + response.data.message);
                           }
                       }).fail(function() {

            // just in case posting your form failed
            alertify.error('Error :Posting failed.');

        });

                       $("#loading-div-background").hide();
                       $('#guardarstep9').show();
        // to prevent refreshing the whole page page
        return false;
    }else{
    	 alertify.error('Error : Por favor corrija los errores');
    	$('#guardarstep9').show();
    	return false;

    } 
});


$('#guardarstep20').bind('click',function(){
	var e = validateStep1();
	$('#guardarstep').hide();
	if(e){
		  // show that something is loading
		  $("#loading-div-background").show();
		  var datastep = {"step": current};
		  data = $(this).parent().parent().serialize() + "&" + $.param(datastep);
		  $.post('./catastro-response.php',data, function(response){
           //done() es ejecutada cuándo se recibe la respuesta del servidor. response es el objeto JSON recibido
           if( response.success ) {
                          //alert(response.success);
                               // var output = "<h2>" + response.data.message + "</h2>";
                               alertify.success('Success:'+response.data.message);
                               //$('#ct_dgp_codpredio').val(response.data.dato[0].f_predio);
                                //  alert(response.data.dato[0].f_predio);

                                $("#ct" ).val(response.data.dato[0].f_caracteristicas_bloque);
                                //Actualizamos el HTML del elemento con id="#response-container"
                              //  $("#response-container").html(output);

                          } else {
                                //response.success no es true
                                alertify.error('Error :' + response.data.message);
                               // $("#response-container").html('No ha habido suerte: ' + response.data.message);
                           }
                       }).fail(function() {

            // just in case posting your form failed
             alertify.error('Error :Posting failed.' );

        });

                       $("#loading-div-background").hide();
                       $('#guardarstep20').show();
        // to prevent refreshing the whole page page
        return false;
    }else{
    	 alertify.error('Error : Por favor corrija los errores');
    	$('#guardarstep20').show();
    	return false;

    } 
});


$('#guardarstep21').bind('click',function(){
	var e = validateStep1();
	$('#guardarstep21').hide();
	if(e){
		  // show that something is loading
		  $("#loading-div-background").show();
		  var datastep = {"step": current};
		  data = $(this).parent().parent().serialize() + "&" + $.param(datastep);
		  $.post('./catastro-response.php',data, function(response){
           //done() es ejecutada cuándo se recibe la respuesta del servidor. response es el objeto JSON recibido
           if( response.success ) {
                          //alert(response.success);
                               // var output = "<h2>" + response.data.message + "</h2>";
                               alertify.success('Success:'+response.data.message);
                               //$('#ct_dgp_codpredio').val(response.data.dato[0].f_predio);
                                //  alert(response.data.dato[0].f_predio);

                                $("#ct" ).val(response.data.dato[0].f_caracteristicas_bloque);
                                //Actualizamos el HTML del elemento con id="#response-container"
                              //  $("#response-container").html(output);

                          } else {
                                //response.success no es true
                                 alertify.error('Error :' +response.data.message);
                               // $("#response-container").html('No ha habido suerte: ' + response.data.message);
                           }
                       }).fail(function() {

            // just in case posting your form failed
            alertify.error('Error : Posting failed.' );

        });

                       $("#loading-div-background").hide();
                       $('#guardarstep21').show();
        // to prevent refreshing the whole page page
        return false;
    }else{
    	 alertify.error('Error : Por favor corrija los errores');
    	$('#guardarstep21').show();
    	return false;

    } 
});

$('#guardarstep10').bind('click',function(){
	var e = validateStep1();
	$('#guardarstep').hide();
	if(e){
		  // show that something is loading
		  $("#loading-div-background").show();
		  var datastep = {"step": current};
		  data = $(this).parent().parent().serialize() + "&" + $.param(datastep);
		  $.post('./catastro-response.php',data, function(response){
           //done() es ejecutada cuándo se recibe la respuesta del servidor. response es el objeto JSON recibido
           if( response.success ) {
                          //alert(response.success);
                               // var output = "<h2>" + response.data.message + "</h2>";
                               alertify.success('Success:'+response.data.message);
                               //$('#ct_dgp_codpredio').val(response.data.dato[0].f_predio);
                                //  alert(response.data.dato[0].f_predio);

                                $("#ct" ).val(response.data.dato[0].f_caracteristicas_bloque);
                                //Actualizamos el HTML del elemento con id="#response-container"
                              //  $("#response-container").html(output);

                          } else {
                                //response.success no es true
                                 alertify.error('Error :' + response.data.message);
                               // $("#response-container").html('No ha habido suerte: ' + response.data.message);
                           }
                       }).fail(function() {

            // just in case posting your form failed
             alertify.error('Error : Posting failed.' );

        });

                       $("#loading-div-background").hide();
                       $('#guardarstep').show();
        // to prevent refreshing the whole page page
        return false;
    }else{
    	 alertify.error('Error :Por favor corrija los errores');
    	$('#guardarstep').show();
    	return false;

    } 
});


$('#guardarstep11').bind('click',function(){
	var e = validateStep1();
	$('#guardarstep').hide();
	if(e){
		  // show that something is loading
		  $("#loading-div-background").show();
		  var datastep = {"step": current};
		  data = $(this).parent().parent().serialize() + "&" + $.param(datastep);
		  $.post('./catastro-response.php',data, function(response){
           //done() es ejecutada cuándo se recibe la respuesta del servidor. response es el objeto JSON recibido
           if( response.success ) {
                          //alert(response.success);
                               // var output = "<h2>" + response.data.message + "</h2>";
                               alertify.success('Success:'+response.data.message);
                               //$('#ct_dgp_codpredio').val(response.data.dato[0].f_predio);
                                //  alert(response.data.dato[0].f_predio);

                                $("#ct" ).val(response.data.dato[0].f_caracteristicas_bloque);
                                //Actualizamos el HTML del elemento con id="#response-container"
                              //  $("#response-container").html(output);

                          } else {
                                //response.success no es true
                                 alertify.error('Error :' + response.data.message);
                               // $("#response-container").html('No ha habido suerte: ' + response.data.message);
                           }
                       }).fail(function() {

            // just in case posting your form failed
            alertify.error('Error :Posting failed.' );

        });

                       $("#loading-div-background").hide();
                       $('#guardarstep').show();
        // to prevent refreshing the whole page page
        return false;
    }else{
    	 alertify.error('Error :Por favor corrija los errores');
    	$('#guardarstep').show();
    	return false;

    } 
});


$('#guardarstep12').bind('click',function(){
	var e = validateStep1();
	$('#guardarstep').hide();
	if(e){
		  // show that something is loading
		  $("#loading-div-background").show();
		  var datastep = {"step": current};
		  data = $(this).parent().parent().serialize() + "&" + $.param(datastep);
		  $.post('./catastro-response.php',data, function(response){
           //done() es ejecutada cuándo se recibe la respuesta del servidor. response es el objeto JSON recibido
           if( response.success ) {
                          //alert(response.success);
                               // var output = "<h2>" + response.data.message + "</h2>";
                               alertify.success('Success:'+response.data.message);
                               //$('#ct_dgp_codpredio').val(response.data.dato[0].f_predio);
                                //  alert(response.data.dato[0].f_predio);

                                $("#ct" ).val(response.data.dato[0].f_caracteristicas_bloque);
                                //Actualizamos el HTML del elemento con id="#response-container"
                              //  $("#response-container").html(output);

                          } else {
                                //response.success no es true
                                 alertify.error('Error :' + response.data.message);
                               // $("#response-container").html('No ha habido suerte: ' + response.data.message);
                           }
                       }).fail(function() {

            // just in case posting your form failed
             alertify.error('Error :Posting failed.');

        });

                       $("#loading-div-background").hide();
                       $('#guardarstep').show();
        // to prevent refreshing the whole page page
        return false;
    }else{
    	 alertify.error('Error :Por favor corrija los errores');
    	$('#guardarstep').show();
    	return false;

    } 
});


$('#guardarstep13').bind('click',function(){
	var e = validateStep1();
	$('#guardarstep').hide();
	if(e){
		  // show that something is loading
		  $("#loading-div-background").show();
		  var datastep = {"step": current};
		  data = $(this).parent().parent().serialize() + "&" + $.param(datastep);
		  $.post('./catastro-response.php',data, function(response){
           //done() es ejecutada cuándo se recibe la respuesta del servidor. response es el objeto JSON recibido
           if( response.success ) {
                          //alert(response.success);
                               // var output = "<h2>" + response.data.message + "</h2>";
                               alertify.success('Success:'+response.data.message);
                               //$('#ct_dgp_codpredio').val(response.data.dato[0].f_predio);
                                //  alert(response.data.dato[0].f_predio);

                                $("#ct" ).val(response.data.dato[0].f_caracteristicas_bloque);
                                //Actualizamos el HTML del elemento con id="#response-container"
                              //  $("#response-container").html(output);

                          } else {
                                //response.success no es true
                                 alertify.error('Error :' + response.data.message);
                               // $("#response-container").html('No ha habido suerte: ' + response.data.message);
                           }
                       }).fail(function() {

            // just in case posting your form failed
             alertify.error('Error :Posting failed.' );

        });

                       $("#loading-div-background").hide();
                       $('#guardarstep').show();
        // to prevent refreshing the whole page page
        return false;
    }else{
    	 alertify.error('Error :Por favor corrija los errores');
    	$('#guardarstep').show();
    	return false;

    } 
});


$('#guardarstep14').bind('click',function(){
	var e = validateStep1();
	$('#guardarstep').hide();
	if(e){
		  // show that something is loading
		  $("#loading-div-background").show();
		  var datastep = {"step": current};
		  data = $(this).parent().parent().serialize() + "&" + $.param(datastep);
		  $.post('./catastro-response.php',data, function(response){
           //done() es ejecutada cuándo se recibe la respuesta del servidor. response es el objeto JSON recibido
           if( response.success ) {
                          //alert(response.success);
                               // var output = "<h2>" + response.data.message + "</h2>";
                              alertify.success('Success:'+response.data.message);
                               //$('#ct_dgp_codpredio').val(response.data.dato[0].f_predio);
                                //  alert(response.data.dato[0].f_predio);

                                $("#ct" ).val(response.data.dato[0].f_caracteristicas_bloque);
                                //Actualizamos el HTML del elemento con id="#response-container"
                              //  $("#response-container").html(output);

                          } else {
                                //response.success no es true
                                 alertify.error('Error :' + response.data.message);
                               // $("#response-container").html('No ha habido suerte: ' + response.data.message);
                           }
                       }).fail(function() {

            // just in case posting your form failed
            alertify.error('Error : Posting failed.' );

        });

                       $("#loading-div-background").hide();
                       $('#guardarstep').show();
        // to prevent refreshing the whole page page
        return false;
    }else{
    	 alertify.error('Error :Por favor corrija los errores');
    	$('#guardarstep').show();
    	return false;

    } 
});


$('#guardarstep15').bind('click',function(){
	var e = validateStep1();
	$('#guardarstep').hide();
	if(e){
		  // show that something is loading
		  $("#loading-div-background").show();
		  var datastep = {"step": current};
		  data = $(this).parent().parent().serialize() + "&" + $.param(datastep);
		  $.post('./catastro-response.php',data, function(response){
           //done() es ejecutada cuándo se recibe la respuesta del servidor. response es el objeto JSON recibido
           if( response.success ) {
                          //alert(response.success);
                               // var output = "<h2>" + response.data.message + "</h2>";
                               alertify.success('Success:'+response.data.message);
                               //$('#ct_dgp_codpredio').val(response.data.dato[0].f_predio);
                                //  alert(response.data.dato[0].f_predio);

                                $("#ct" ).val(response.data.dato[0].f_caracteristicas_bloque);
                                //Actualizamos el HTML del elemento con id="#response-container"
                              //  $("#response-container").html(output);

                          } else {
                                //response.success no es true
                                 alertify.error('Error :' + response.data.message);
                               // $("#response-container").html('No ha habido suerte: ' + response.data.message);
                           }
                       }).fail(function() {

            // just in case posting your form failed
             alertify.error('Error :Posting failed.' );

        });

                       $("#loading-div-background").hide();
                       $('#guardarstep').show();
        // to prevent refreshing the whole page page
        return false;
    }else{
    	 alertify.error('Error :Por favor corrija los errores');
    	$('#guardarstep').show();
    	return false;

    } 
});


$('#guardarstep16').bind('click',function(){
	var e = validateStep1();
	$('#guardarstep').hide();
	if(e){
		  // show that something is loading
		  $("#loading-div-background").show();
		  var datastep = {"step": current};
		  data = $(this).parent().parent().serialize() + "&" + $.param(datastep);
		  $.post('./catastro-response.php',data, function(response){
           //done() es ejecutada cuándo se recibe la respuesta del servidor. response es el objeto JSON recibido
           if( response.success ) {
                          //alert(response.success);
                               // var output = "<h2>" + response.data.message + "</h2>";
                               alertify.success('Success:'+response.data.message);
                               //$('#ct_dgp_codpredio').val(response.data.dato[0].f_predio);
                                //  alert(response.data.dato[0].f_predio);

                                $("#ct" ).val(response.data.dato[0].f_caracteristicas_bloque);
                                //Actualizamos el HTML del elemento con id="#response-container"
                              //  $("#response-container").html(output);

                          } else {
                                //response.success no es true
                                alertify.error('Error :' +response.data.message);
                               // $("#response-container").html('No ha habido suerte: ' + response.data.message);
                           }
                       }).fail(function() {

            // just in case posting your form failed
             alertify.error('Error :Posting failed.' );

        });

                       $("#loading-div-background").hide();
                       $('#guardarstep').show();
        // to prevent refreshing the whole page page
        return false;
    }else{
    	 alertify.error('Error :Por favor corrija los errores');
    	$('#guardarstep').show();
    	return false;

    } 
});


$('#guardarstep17').bind('click',function(){
	var e = validateStep1();
	$('#guardarstep').hide();
	if(e){
		  // show that something is loading
		  $("#loading-div-background").show();
		  var datastep = {"step": current};
		  data = $(this).parent().parent().serialize() + "&" + $.param(datastep);
		  $.post('./catastro-response.php',data, function(response){
           //done() es ejecutada cuándo se recibe la respuesta del servidor. response es el objeto JSON recibido
           if( response.success ) {
                          //alert(response.success);
                               // var output = "<h2>" + response.data.message + "</h2>";
                               alertify.success('Success:'+response.data.message);
                               //$('#ct_dgp_codpredio').val(response.data.dato[0].f_predio);
                                //  alert(response.data.dato[0].f_predio);

                                $("#ct" ).val(response.data.dato[0].f_caracteristicas_bloque);
                                //Actualizamos el HTML del elemento con id="#response-container"
                              //  $("#response-container").html(output);

                          } else {
                                //response.success no es true
                                 alertify.error('Error :' + response.data.message);
                               // $("#response-container").html('No ha habido suerte: ' + response.data.message);
                           }
                       }).fail(function() {

            // just in case posting your form failed
           alertify.error('Error :Posting failed.' );

        });

                       $("#loading-div-background").hide();
                       $('#guardarstep').show();
        // to prevent refreshing the whole page page
        return false;
    }else{
    	 alertify.error('Error :Por favor corrija los errores');
    	$('#guardarstep').show();
    	return false;

    } 
});


$('#guardarstep18').bind('click',function(){
	var e = validateStep1();
	$('#guardarstep').hide();
	if(e){
		  // show that something is loading
		  $("#loading-div-background").show();
		  var datastep = {"step": current};
		  data = $(this).parent().parent().serialize() + "&" + $.param(datastep);
		  $.post('./catastro-response.php',data, function(response){
           //done() es ejecutada cuándo se recibe la respuesta del servidor. response es el objeto JSON recibido
           if( response.success ) {
                          //alert(response.success);
                               // var output = "<h2>" + response.data.message + "</h2>";
                               alertify.success('Success:'+response.data.message);
                               //$('#ct_dgp_codpredio').val(response.data.dato[0].f_predio);
                                //  alert(response.data.dato[0].f_predio);

                                $("#ct" ).val(response.data.dato[0].f_caracteristicas_bloque);
                                //Actualizamos el HTML del elemento con id="#response-container"
                              //  $("#response-container").html(output);

                          } else {
                                //response.success no es true
                                 alertify.error('Error :' + response.data.message);
                               // $("#response-container").html('No ha habido suerte: ' + response.data.message);
                           }
                       }).fail(function() {

            // just in case posting your form failed
             alertify.error('Error :Posting failed.');

        });

                       $("#loading-div-background").hide();
                       $('#guardarstep').show();
        // to prevent refreshing the whole page page
        return false;
    }else{
    	 alertify.error('Error :Por favor corrija los errores');
    	$('#guardarstep').show();
    	return false;

    } 
});


$('#guardarstep19').bind('click',function(){
	var e = validateStep1();
	$('#guardarstep').hide();
	if(e){
		  // show that something is loading
		  $("#loading-div-background").show();
		  var datastep = {"step": current};
		  data = $(this).parent().parent().serialize() + "&" + $.param(datastep);
		  $.post('./catastro-response.php',data, function(response){
           //done() es ejecutada cuándo se recibe la respuesta del servidor. response es el objeto JSON recibido
           if( response.success ) {
                          //alert(response.success);
                               // var output = "<h2>" + response.data.message + "</h2>";
                              alertify.success('Success:'+response.data.message);
                               //$('#ct_dgp_codpredio').val(response.data.dato[0].f_predio);
                                //  alert(response.data.dato[0].f_predio);

                                $("#ct" ).val(response.data.dato[0].f_caracteristicas_bloque);
                                //Actualizamos el HTML del elemento con id="#response-container"
                              //  $("#response-container").html(output);

                          } else {
                                //response.success no es true
                                 alertify.error('Error :' + response.data.message);
                               // $("#response-container").html('No ha habido suerte: ' + response.data.message);
                           }
                       }).fail(function() {

            // just in case posting your form failed
             alertify.error('Error :Posting failed.');

        });

                       $("#loading-div-background").hide();
                       $('#guardarstep').show();
        // to prevent refreshing the whole page page
        return false;
    }else{
    	 alertify.error('Error :Por favor corrija los errores');
    	$('#guardarstep').show();
    	return false;

    } 
});




$('#guardarstep25').bind('click',function(){
	var e = validateStep1();
	$('#guardarstep').hide();
	if(e){
		  // show that something is loading
		  $("#loading-div-background").show();
		  var datastep = {"step": current};
		  data = $(this).parent().parent().serialize() + "&" + $.param(datastep);
		  $.post('./catastro-response.php',data, function(response){
           //done() es ejecutada cuándo se recibe la respuesta del servidor. response es el objeto JSON recibido
           if( response.success ) {
                          //alert(response.success);
                               // var output = "<h2>" + response.data.message + "</h2>";
                               alertify.success('Success:'+response.data.message);
                               //$('#ct_dgp_codpredio').val(response.data.dato[0].f_predio);
                                //  alert(response.data.dato[0].f_predio);

                                $("#ct12" ).val(response.data.dato[0].f_encuestas);
                                //Actualizamos el HTML del elemento con id="#response-container"
                              //  $("#response-container").html(output);

                          } else {
                                //response.success no es true
                                 alertify.error('Error :' +response.data.message);
                               // $("#response-container").html('No ha habido suerte: ' + response.data.message);
                           }
                       }).fail(function() {

            // just in case posting your form failed
             alertify.error('Error : Posting failed.' );

        });

                       $("#loading-div-background").hide();
                       $('#guardarstep').show();
        // to prevent refreshing the whole page page
        return false;
    }else{
    	 alertify.error('Error : Por favor corrija los errores');
    	$('#guardarstep').show();
    	return false;

    } 
});
});