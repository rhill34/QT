$("#driver").on("click", function() {
    $(".driver").removeClass("d-none");
    $(".traveler").addClass("d-none");
    $("#driver").addClass("active");
    $("#trav").removeClass("active");
});
$("#trav").on("click", function() {
    $(".driver").addClass("d-none");
    $(".traveler").removeClass("d-none");
    $("#driver").removeClass("active");
    $("#trav").addClass("active");
});


$('#btn').on('click', function () {
    var carmake = $('#carMake').val();
    var carmodel = $('#carModel').val();
    var carYear = $('#year').val();

    $.post(
        "models/ajax/car.php",

        {carmake:carmake,carmodel:carmodel,carYear:carYear},

        function(result)
        {
            $('#carErr').html(result);

            if(result=="") {
                $('#make').text(carmake);
                $('#model').text(carmodel);
                $('#years').text(carYear);
                $('#carErr').html("Updated Successfully");
            }
        }
    );
});


$('#btn1').on('click', function () {
    var state = $('#stateId').val();
    var city = $('#cityId').val();
    var bios = $('#bios').val();

    $.post(
        "models/ajax/driver.php",

        {state:state, city:city, bios:bios},

        function(result)
        {
            $('#carErr').html(result);

            if(result=="") {
                $('#make').text(carmake);
                $('#model').text(carmodel);
                $('#years').text(carYear);
                $('#proErr').html("Updated Successfully");
            }
        }
    );
});