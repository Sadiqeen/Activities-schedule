$(document).ready(function () {
    $('#user-table').DataTable( {
        "autoWidth" : false,
        "columnDefs": [
            {
              "targets": [ 0 ],
              "visible": false,
              "searchable": false
            },
            {
              "targets": [ 1,2,3,4,5],
              "className": "text-center",
            },
            {
                "width" : '20%',
              "targets": [ 6],
              "className": "text-center",
            }
        ],
        "processing": true,
        "serverSide": true,
        "responsive": true,
        "retrieve": true,
        "ajax": "./php/sub_admin_table_user.php/",
    } );

    $("#user-table tbody").on("click", "#cp", function () {
        var table = $('#user-table').DataTable().row( $(this).parents('tr')  ).data();
        $('#u_id').val(table['0']);
        $('#ch_pass').modal('show');
    });

    $("#user-table tbody").on("click", "#del", function () {
        var table = $('#user-table').DataTable().row( $(this).parents('tr')  ).data();
        $('#id_delete_user').val(table['0']);
        $('#modal-dluser').modal('show');
    });
});

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
        if (index == 0) {
            $("#dp").append('<option value="'+data[index]['id']+'" selected>'+data[index]['dname']+'</option>');
        } else {
            $("#dp").append('<option value="'+data[index]['id']+'">'+data[index]['dname']+'</option>');
        }
    }
    $('#activities-table').DataTable().ajax.url("./php/sub_admin_table_acti.php/?fc="+ $('#fc option:selected').val() + "&dp=" + $('#dp option:selected').val()).load();
}

function check_add_user() {
    event.preventDefault();
    if ($('#password').val() == $('#cpassword').val()) {
        add_user()
    } else {
        $('#perr').text('Password doesn\'t match');
    }
}

function add_user() {
    var name = $('#name').val();
    var email = $('#email').val();
    var pass = $("#cpassword").val();
    var position = $('#position').val();
    var dp = $('#dp option:selected').val()
    $.ajax({
        method: 'POST',
        url: './php/add_user.php',
        dataType: "json",
        data: {
            name :  name,
            email :  email,
            pass :  pass,
            position :  position,
            dp : dp,
        },
    }).done(function (data) {
        res_add_user(data)
    }).fail(function (jqXHR, ajaxOptions, thrownError) {
        console.log(jqXHR + ajaxOptions + thrownError);
    });
}

function res_add_user(data) {
    $('#modal-adduser').modal('hide');
    $('#name').val('');
    $('#email').val('');
    $("#cpassword").val('');
    $('#position').val('');
    if (data == 1) {
        $('#user-table').DataTable().ajax.reload();
        $.notify({
            message: 'Add user success.'
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
        url: './php/change_password_user.php',
        dataType: "json",
        data: {
            ps : $('#cps').val(),
            u_id : $('#u_id').val(),
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

function delete_user() {
    var u_id = $('#id_delete_user').val();
    $.ajax({
        method: 'POST',
        url: './php/delete_user.php',
        dataType: "json",
        data: {
            u_id : u_id,
        },
    }).done(function (data) {
        res_delete_user(data);
    }).fail(function (jqXHR, ajaxOptions, thrownError) {
        console.log(jqXHR + ajaxOptions + thrownError);
    });
}

function res_delete_user(data) {
    $('#modal-dluser').modal('hide');
    $('#user-table').DataTable().ajax.reload();
    if (data == 1) {
        $.notify({
            message: 'Delete user success.'
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