$(document).ready(function(){

    $.ajax({

        url: 'src/components/bloques.php',
        type: "POST",
        dataType : "text",
        data: {},
        success : function(response) {
            $('#renderbloque').html(response);
            
        },
    });
    
})