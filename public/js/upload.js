function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#imgAnh').attr('src', e.target.result).show();
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$(document).ready(function () {
    $("#image").change(function(){
        readURL(this);
        $('#UpImg').hide();
        $('#Anh').show();
    });
    $('#Anh').dblclick(function () {
        $('#UpImg').show();
    });
});