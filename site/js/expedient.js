
var tabla = $('#rendertable');


$(document).ready(function(){

    $.ajax({

        url: 'src/components/expedientes.php',
        type: "POST",
        dataType : "text",
        data: {},
        success : function(response) {
            $('#rendertable').html(response);
            
        },
    });
    
})