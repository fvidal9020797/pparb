/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    $('#dpto').change(function(){
    
        // show that something is loading
        $('#response').html("<div><img src=\"../images/loading.gif\"/></div>");
         
        /*
         * 'post_receiver.php' - where you will pass the form data
         * $(this).serialize() - to easily read form data
         * function(data){... - data contains the response from post_receiver.php
         */
         var data = {"action": "getProvincia"};
            data = $(this).parent().parent().parent().parent().parent().serialize() + "&" + $.param(data);
           
              $.post('politico_response.php',data, function(data){
             if(data==""){
               $('#prov').html(data);
               $('#mun').html(data);
            }else{
            $('#prov').html(data);
        }
             $('#response').html("");
        }).fail(function() {
         
            // just in case posting your form failed
            alert( "Posting failed." );
             
        });
 
        // to prevent refreshing the whole page page
        return false;
 
    });
});

$(document).ready(function(){
    $('#prov').change(function(){
        // show that something is loading
        $('#response').html("<div><img src=\"../images/loading.gif\"/></div>");
         
        /*
         * 'post_receiver.php' - where you will pass the form data
         * $(this).serialize() - to easily read form data
         * function(data){... - data contains the response from post_receiver.php
         */        
         var data = {"action": "getMunicipio"};
             data = $(this).parent().parent().parent().parent().serialize() + "&" + $.param(data);            
        $.post('politico_response.php',data, function(data){
            // show the response       
             $('#mun').html(data);
             $('#response').html("");
        }).fail(function() {
         
            // just in case posting your form failed
            alert( "Posting failed." );
             
        });
 
        // to prevent refreshing the whole page page
        return false;
 
    });
 
});




$(document).ready(function(){
    $('#19').change(function(){
        // show that something is loading
        
        $('#response').html("<div><img src=\"../images/loading.gif\"/></div>");
         
        /*
         * 'post_receiver.php' - where you will pass the form data
         * $(this).serialize() - to easily read form data
         * function(data){... - data contains the response from post_receiver.php
         */        
         var data = {"action": "getRegister"};
           data = $(this).parent().parent().parent().parent().parent().serialize() + "&" + $.param(data);
 
        
        $.post('politico_response.php',data, function(data){
            // show the response       
             $('#register').html(data);
             $('#response').html("");
        }).fail(function() {
         
            // just in case posting your form failed
            alert( "Posting failed." );
             
        });
 
        // to prevent refreshing the whole page page
        return false;
 
    });
 
});
