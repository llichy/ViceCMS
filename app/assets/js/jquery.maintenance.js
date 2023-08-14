$(document).ready(function(){



    $("#sub_1").on('click', function(event){
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "./app/actions/loginm_noajax.php",
            data: "mailornick="+$("#pseudo_1").val()+"&password="+$("#password_1").val(),
            success: function(msg){
                if(msg == "ok") {
                    document.location.href="/me";
                }else {
                    
                }
            }
        });
    });



});