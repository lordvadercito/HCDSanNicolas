$(document).ready(function(){

    $.ajax({

        url: 'src/components/prensa.php',
        type: "POST",
        dataType : "text",
        data: {},
        success : function(response) {
            $('#rendernoticias').html(response);
            
        },
    });
    
})