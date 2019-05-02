$(document).ready(function(){

    $.ajax({

        url: 'src/components/notaseinformes.php',
        type: "POST",
        dataType : "text",
        data: {},
        success : function(response) {
            $('#renderbody').html(response);
            
        },
    });
    
})