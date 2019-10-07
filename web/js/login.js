function login(event) {
    event.preventDefault();
    $('#password-helpId').text('');
    $('#email-helpId').text('');
    var email = $('#email').val();
    var pass = $('#password').val();
    $.ajax({
        method: 'POST',
        url: './php/login.php',
        dataType: "json",
        data: {
            'email': email,
            'pass': pass,
        },
    }).done(function (data) {
        respond_login(data);
    }).fail(function (jqXHR, ajaxOptions, thrownError) {
        console.log(jqXHR + ajaxOptions + thrownError);
    });
}

function respond_login(data) {
    if (data == 1) {
        window.location.href='./admin.php';
    } else if (data == 2) {
        $('#password-helpId').text('Password incorrect');
    } else {
        $('#email-helpId').text('Email doesn\'t  exist');
    }
}