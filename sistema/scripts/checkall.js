/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() { 
    $('#checkAll').change(function() {
        // alert('llego'); // $('#campos :checkbox').attr('checked', this.checked); 
       var div = document.getElementById("campos"); 
       //// var div = $(this).parent().parent().parent().parent().parent().parent(); 
       //// alert(data); 
       var inputs = div.getElementsByTagName("input"); 
       for (var i = 0, len = inputs.length; i < len; ++i) { 
           // alert(inputs[i].type); if (inputs[i].type == "checkbox") { 
          inputs[i].checked = this.checked; 
            } }) 
    });
    
    
    $(document).ready(function() { 
    $('#checkAll2').change(function() {
        // alert('llego'); // $('#campos :checkbox').attr('checked', this.checked); 
       var div = document.getElementById("campos2"); 
       //// var div = $(this).parent().parent().parent().parent().parent().parent(); 
       //// alert(data); 
       var inputs = div.getElementsByTagName("input"); 
       for (var i = 0, len = inputs.length; i < len; ++i) { 
           // alert(inputs[i].type); if (inputs[i].type == "checkbox") { 
          inputs[i].checked = this.checked; 
            } }) 
    });





