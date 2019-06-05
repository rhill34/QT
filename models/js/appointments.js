$('#button').on('click', function () {
    var state = $('#stateId').val();
    var city = $('#cityId').val();

    $.post(
        "models/ajax/selects/drivertable.php",

        {city:city, state:state},

        function(results)
        {
            $('#results').html(results);
        }
    );
});