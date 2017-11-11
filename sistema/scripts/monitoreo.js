/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 function gettecnicos(){
     var data = {"action": "gettecnicos"};
            data = $('#form-asignacion').serialize() + "&" + $.param(data);
           
         $.post('./response-monitoreo.php',data, function(response){
         
           if( response.success ) {                    
                            Things =response.data.dato;
                             
                                $('#alimentos').val("");
                                $('#bosques').val("");
                                document.getElementById("ct_edi_option_1").checked = false;
                                  document.getElementById("ct_edi_option_2").checked = false;
                                // $("#ct_edi_option_1").removeAttr("checked");
                                // $("#ct_edi_option_2").removeAttr("checked");
                                if (!Things)
                                {

                           
                                 // alertify.success("No se encontraron tecnicos");
                                    return;
                                } 
                                var sms=0;
                                var estado="no";
                                var Thing;
                                sms="No se encontraron tecnicos.";
                                for (var idx in Things)
                                {
                                if (idx>=0) {
                                    sms=1;
                                        Thing =Things[idx];
                                        id =Thing.idfuncionario;
                                        tipo =Thing.tiporegistrador;
                                        estado =Thing.estado;
                                    if (tipo==137) {
                                        $('#bosques').val(id);
                                   
                                        };
                                    if (tipo==138) {
                                        $('#alimentos').val(id);
                                  
                                        };  
                                                                                         
                                  
                                };
                                }


                                    if (estado==1) {
                                        // $("#ct_edi_option_1").attr('checked', 'true');
                                  document.getElementById("ct_edi_option_1").checked = true;
                                    }; 
                                    if (estado==0) {                                    
                                  document.getElementById("ct_edi_option_2").checked = true;
                                    };    
                                if (sms==1) {
                                      alertify.success("Ya cuenta con tecnicos."); 
                                } else{
                                    alertify.log("No se encontraron tecnicos.");
                                };
                              
                          } else {
                                //response.success no es true
                                 alertify.error('Error :' + response.data.message);
                         }


                       }).fail(function() {

            // just in case posting your form failed
           alertify.error('Error : Posting failed.' );
            // $("#loading-div-background").hide();
            // $('#guardarstep').show();

        });
        // to prevent refreshing the whole page page
        return false;
 }
$(document).ready(function(){
    $('#anho').change(function(){
    if ($('#anho').val()!="" && $('#33').val()!="") {
        gettecnicos();
        }else{
        $('#alimentos').val("");
        $('#bosques').val("");
        document.getElementById("ct_edi_option_1").checked = false;
        document.getElementById("ct_edi_option_2").checked = false;
        }
    });
});

$(document).ready(function(){
    $('#33').change(function(){
       if ($('#anho').val()!="" && $('#33').val()!="") {
       gettecnicos();
        }else{
        $('#alimentos').val("");
        $('#bosques').val("");
         document.getElementById("ct_edi_option_1").checked = false;
        document.getElementById("ct_edi_option_2").checked = false;
        }

    });
 
});
