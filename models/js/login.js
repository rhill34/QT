$('.carousel').carousel({
    interval: 3500
})


$('#btn').on('click', function () {
    var email = $('#emails').val();
    var pass = $('#pass').val();

    $.post(
        "models/ajax/login.php",

        {email:email, pass:pass},

        function(result)
        {
            $('#login').html(result);
            if($('#login').text()=="")
            {
                window.location.replace("http://mbritt.greenriverdev.com/328/final/profile");
            }
        }
    );
});

$('#pass').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){

        var email = $('#emails').val();
        var pass = $('#pass').val();

        $.post(
            "models/ajax/login.php",

            {email:email, pass:pass},

            function(result)
            {
                $('#login').html(result);
                if($('#login').text()=="")
                {
                    window.location.replace("http://mbritt.greenriverdev.com/328/final/profile");
                }
            }
        );
    }
});