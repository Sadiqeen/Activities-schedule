$(document).ready(function () {
    get_user_detail();
});

function get_user_detail() {
    $.ajax({
        method: 'POST',
        url: './php/get_user_detail.php',
        dataType: "json",
    }).done(function (data) {
        res_get_user_detail(data);
    }).fail(function (jqXHR, ajaxOptions, thrownError) {
        console.log(jqXHR + ajaxOptions + thrownError);
    });
}

function res_get_user_detail(data) {
    $('#name').val(data[0]['name']);
    $('#email').val(data[0]['email']);
    $('#fc').val(data[0]['faculty']);
    $('#dp_id').val(data[0]['department']);
    $('#fc_id').val(data[0]['faculty']);
    get_department();
}

function get_department() {
    $.ajax({
        method: 'POST',
        url: './php/get_department.php',
        dataType: "json",
        data: {
            id :  $('#fc option:selected').val(),
        },
    }).done(function (data) {
        res_get_department(data)
    }).fail(function (jqXHR, ajaxOptions, thrownError) {
        console.log(jqXHR + ajaxOptions + thrownError);
    });
}

function res_get_department(data) {
    $("#dp").empty();
    for (let index = 0; index < data.length; index++) {
        $("#dp").append(
            '<option value="'+data[index]['id']+'">'+data[index]['dname']+'</option>'
        );
    }
    if ($('#fc_id').val() == $('#fc').val()) {
        var dp_id = $('#dp_id').val();
        $('#dp').val(dp_id);
    }
}

function update(event) {
    event.preventDefault();
    var name = $('#name').val();
    var email = $('#email').val();
    var dp = $('#dp').val();
    $.ajax({
        method: 'POST',
        url: './php/update_profile.php',
        dataType: "json",
        data: {
            name :  name,
            email :  email,
            dp :  dp,
        },
    }).done(function (data) {
        res_update(data);
    }).fail(function (jqXHR, ajaxOptions, thrownError) {
        console.log(jqXHR + ajaxOptions + thrownError);
    });

}

function res_update(data) {
    if (data == 1) {
        $('#activities-table').DataTable().ajax.reload();
        $.notify({
            message: 'Update success.'
        },{
            type: 'success'
        });
    } else {
        $.notify({
            message: data
        },{
            type: 'danger'
        });
    }
}

function ch_pass(event) {
    event.preventDefault();
    if ($('#ps').val() == $('#cps').val() ) {
        change_pass();
    } else {
        $('#ch_pass').modal('hide');
        $('#ps').val('');
        $('#cps').val('');
        $.notify({
            message: 'Password doesn\'t match'
        },{
            type: 'danger'
        });
    }
}

function change_pass() {
    $.ajax({
        method: 'POST',
        url: './php/change_password.php',
        dataType: "json",
        data: {
            ps :   $('#cps').val(),
        },
    }).done(function (data) {
        $('#ch_pass').modal('hide');
        $('#ps').val('');
        $('#cps').val('');
        res_change_pass(data);
    }).fail(function (jqXHR, ajaxOptions, thrownError) {
        console.log(jqXHR + ajaxOptions + thrownError);
    });

}

function res_change_pass(data) {
    if (data == 1) {
        $.notify({
            message: 'Change password success.'
        },{
            type: 'success'
        });
    } else {
        $.notify({
            message: data
        },{
            type: 'danger'
        });
    }
}