//submit
$('#submitAppt').on('click', function () {
    var date = $('#date').val();
    var interest = $('#interest').val();
    var start = $('#timeIn').val();
    var end = $('#timeOut').val();
    var driver = $('#driverIndex').attr('value');

    $.post(
        "models/ajax/creates-posts/appointments.php",

        {date : date, interest : interest, start : start, end : end, id:driver},

        function(results)
        {
            $('#driverIndex').html(results);
            if($('#driverIndex').text()=="")
            {
                window.location.replace("http://mbritt.greenriverdev.com/328/final/profile");
            }
        }
    );
});

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
    $.post(
        "models/ajax/changePicture.php",

        {id:id},

        function(results)
        {
            $('#proPic').attr('src', results);
        }
    );
    $('#driverIndex').attr('value', id);
});



