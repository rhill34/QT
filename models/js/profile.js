
//cycles between driver and traveler divs to be displayed
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
//---------------------------------------------------------


//on modal submission validate and post to db car information
$('#btn').on('click', function () {
    var carmake = $('#carMake').val();
    var carmodel = $('#carModel').val();
    var carYear = $('#year').val();

    $.post(
        "models/ajax/edits/car.php",

        {carmake:carmake,carmodel:carmodel,carYear:carYear},

        function(result)
        {
            $('#carErr').html(result);

            if(result=="") {
                $('#make').text("Car Make:" + carmake);
                $('#model').text("Car Mode: " + carmodel);
                $('#years').text("Car Year"  +carYear);
                $('#carSuccess').html("Updated Successfully");
                $('#closeCar').click();
            }
        }
    );
});

//on modal submission validate and update db
$('#btn1').on('click', function () {
    var state = $('#stateId').val();
    var city = $('#cityId').val();
    var bios = $('#bios').val();

    $.post(
        "models/ajax/edits/driver.php",

        {state:state, city:city, bios:bios},

        function(result)
        {
            $('#proErr').html(result);

            if(result=="") {
                $('#city').text("City : " + city);
                $('#state').text("State : " +state);
                $('#bio').text("Bio:" + bios);
                $('#proSuccess').html("Updated Successfully");
                $('#proClose').click();
            }
        }
    );
});

//on modal submission update name
$('#btn2').on('click', function () {
    var first = $('#fname').val();
    var last = $('#lname').val();

    $.post(
        "models/ajax/edits/name.php",

        {first:first, last:last},

        function(result)
        {
            $('#nameErr').html(result);

            if(result=="") {
                $('#Names').text("Name:" +first +" " + last);
                $('#nameSuccess').html("Updated Successfully");
                $('#proClose').click();
            }
        }
    );
});

//on modal submission update email
$('#btn3').on('click', function () {
    var email = $('#formEmail').val();
    console.log(email);

    $.post(
        "models/ajax/edits/email.php",

        {email:email},

        function(result)
        {
            $('#emailErr').html(result);

            if(result=="") {
                $('#emails').text("Email:" + email);
                $('#emailSuccess').html("Updated Successfully");
                $('#emailClose').click();
            }
        }
    );
});


//on modal submission update password
$('#btn4').on('click', function () {
    var confirm = $('#confirmPass').val();
    var pass= $('#newPass').val();
    var pass2=$('#newPass2').val();

    $.post(
        "models/ajax/edits/password.php",

        {confirm:confirm, pass:pass, pass2:pass2},

        function(result)
        {
            $('#passErr').html(result);

            if(result=="") {
                $('#passSuccess').html("Updated Successfully");
                $('#passClose').click();
            }
        }
    );
});

