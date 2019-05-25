$('#textbox1').val(this.checked);

$('#driver').change(function() {
    if(this.checked) {
        $('#next').html("Next");
    }
    else{
        $('#next').html("Submit");
    }
});