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
            }
        }
    );
});