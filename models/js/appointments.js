//set on click for seach button refining result by city/state
$('#search').on('click', function () {
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

//selects "book" buttons  of car that user wants to book
$('#results').on('click', '.book', function () {
    //contains driver id data
    var id = $(this).attr('value');
    //assign to modals div for future ajax request using index on session variable
    $('#driverIndex').attr('value', id);
});

