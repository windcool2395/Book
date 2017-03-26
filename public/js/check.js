//Check mail
$(document).ready(function(e) {
    $('#btnLuu').click(function() {
        var sEmail = $('#txtEmail').val();
        if ($.trim(sEmail).length == 0) {
            $('#error-email').html('Hãy nhập địa chỉ email');
            $('#error-email').css('color', 'red');
            e.preventDefault();
        }
        if (validateEmail(sEmail)) {
            $('#error-email').html('');
        }
        else {
            $('#error-email').html('Email không hợp lệ,hãy nhập lại');
            $('#error-email').css('color', 'red');
            $('#txtEmail').focus();
            e.preventDefault();
        }
    });
});

function validateEmail(sEmail) {
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(sEmail)) {
        return true;
    }
    else {
        return false;
    }
}
//Ckech pass
$(document).ready(function() {
    $('#btnLuu').click(function(event){
        var pass= $('#txtPassword').val();
        var pass2= $('#txtPassword2').val();
        if(pass.length < 6 || pass2.length < 6 )
        {
            $('#error-pass').html('Mật khẩu phải có ít nhất 6 ký tự');
            $('#error-pass').css('color', 'red');
            $('#txtPassword').focus();
            event.preventDefault();
        }
        if(pass != pass2)
        {
            $('#error-pass').html('Mật khẩu nhập không trùng khớp nhau');
            $('#error-pass').css('color', 'red');
            $('#txtPassword2').focus();
            event.preventDefault();
        }
        else {
            $('#error-pass').html('');
        }
    });
});

//Check phone
$(document).ready(function() {
    $('#btnLuu').click(function(e) {
        var phone= $('#txtPhone').val();
        if( phone == "" ){
            $('#error-phone').html('');
        }
        else{
            if (validatePhone('txtPhone')) {
                $('#error-phone').html('');
            }
            else {
                $('#error-phone').html('Số điện thoại không hợp lệ,hãy nhập lại..');
                $('#error-phone').css('color', 'red');
                $('#txtPhone').focus();
            }
        }
    });
});

function validatePhone(txtPhone) {
    var a = document.getElementById(txtPhone).value;
    var filter = /^[0-9-+]+$/;
    if (filter.test(a) && (a.length == 10 || a.length == 11)) {
        return true;
    }
    else {
        return false;
    }
}
//Ckech date
$(document).ready(function() {
    $('#txtPassword').change(function(event){
        $('#Pass').show();
    });
});



