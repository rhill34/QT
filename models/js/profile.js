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
    var fd = new FormData();
    var files = $('#customFile')[0].files[0];
    fd.append('file', files);
    var carmake = $('#carMake').val();
    var carmodel = $('#carModel').val();
    var carYear = $('#year').val();
    var id = $('#id').text();

    $.post(
        "models/ajax/profile.php",

        {carmake:carmake,carmodel:carmodel,carYear:carYear, id:id},

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