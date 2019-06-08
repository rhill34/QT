//increases carousel speed
$('.carousel').carousel({
    interval: 3500
})

//chceck if email and password match in ajax request then redirects if no errors
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
                $('#route').click();
            }
        }
    );
});

//allows an enter key in the password field to start ajax request
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