$(document).ready(function () {
    $('#color_pick').colorpicker();
    get_departments($('#fc_list>li.active').data('id'));
});

function change_department (env,f_id) {
    $('#fc_list>li.active').removeClass('active bg-primary');
    $(env).addClass('active bg-primary');
    get_departments(f_id);
}

function get_departments(f_id) {
    $.ajax({
        method: 'POST',
        url: './php/get_department.php',
        dataType: "json",
        data: {
            id :  f_id,
        },
    }).done(function (data) {
        if (data == 0) {
            $("#dp_list").empty();
            $("#dp_list").append(
                '<li class="text-center"><a>Don\'t have department</a></li><br>' +
                '<div class="form-group row">' +
                '<div class="col-md-9">' +
                '<input type="text" name="" id="dp_name" class="form-control" placeholder="Department name">' +
                '</div>' +
                '<div class="col-md-3">' +
                '<button class="btn btn-success btn-block" type="submit" onclick="check_add_depart();">Add department</button>' +
                '</div>' +
                '</div>'
            );
        } else {
            $("#color_pick_value").val(data[0]['color']);
            $("#color_pick_value").trigger('change');
            res_get_departments(data);
        }
    }).fail(function (jqXHR, ajaxOptions, thrownError) {
        console.log(jqXHR + ajaxOptions + thrownError);
    });
}

function res_get_departments(data) {
    $("#dp_list").empty();
    for (let index = 0; index < data.length; index++) {
        if (index == 0 && (data.length - 1) == 0) {
            $("#dp_list").append(
                '<li><a>'+ data[index]['dname'] +'</a></li>' +
                '<div class="form-group row">' +
                '<div class="col-md-9">' +
                '<input type="text" name="" id="dp_name" class="form-control" placeholder="Department name">' +
                '</div>' +
                '<div class="col-md-3">' +
                '<button class="btn btn-success btn-block" type="submit"  onclick="check_add_depart();">Add department</button>' +
                '</div>' +
                '</div>'
            );
        } else if ((data.length - 1) == index) {
            $("#dp_list").append(
                '<li><a>'+ data[index]['dname'] +'<button onclick="delete_departments('+ data[index]['id'] +');" class="btn btn-danger pull-right btn-xs">Delete</button></a></li><br>' +
                '<div class="form-group row">' +
                '<div class="col-md-9">' +
                '<input type="text" name="" id="dp_name" class="form-control" placeholder="Department name">' +
                '</div>' +
                '<div class="col-md-3">' +
                '<button class="btn btn-success btn-block" type="submit"  onclick="check_add_depart();">Add department</button>' +
                '</div>' +
                '</div>'
            );
        } else if (index == 0) {
            $("#dp_list").append(
                '<li><a>'+ data[index]['dname'] +'</a></li>'
            );
        } else {
            $("#dp_list").append(
                '<li><a>'+ data[index]['dname'] +'<button onclick="delete_departments('+ data[index]['id'] +');" class="btn btn-danger pull-right btn-xs">Delete</button></a></li>'
            );
        }
    }
}

function check_add_depart() {
    var dp_name = $('#dp_name').val();
    if ( $('#dp_name').val().length === 0)
    {
        $.notify({
            message: 'Please fill department name.'
        },{
            type: 'danger'
        });
    } else {
        add_depart(dp_name)
    }
}

function add_depart(dp_name) {
    $.ajax({
        method: 'POST',
        url: './php/add_department.php',
        dataType: "json",
        data: {
            dp_name :  dp_name,
            fc_id : $('#fc_list>li.active').data('id'),
        },
    }).done(function (data) {
        res_add_depart(data);
    }).fail(function (jqXHR, ajaxOptions, thrownError) {
        console.log(jqXHR + ajaxOptions + thrownError);
    });
}

function res_add_depart(data) {
    get_departments($('#fc_list>li.active').data('id'));
    if (data == 1) {
        $.notify({
            message: 'Add department success.'
        },{
            type: 'success'
        });
    } else {
        $.notify({
            message: 'Error occur'
        },{
            type: 'danger'
        });
    }
}

function delete_departments(dp_id) {
    $.ajax({
        method: 'POST',
        url: './php/delete_department.php',
        dataType: "json",
        data: {
            dp_id :  dp_id,
        },
    }).done(function (data) {
        res_delete_depart(data);
    }).fail(function (jqXHR, ajaxOptions, thrownError) {
        console.log(jqXHR + ajaxOptions + thrownError);
    });
}

function res_delete_depart(data) {
    get_departments($('#fc_list>li.active').data('id'));
    if (data == 1) {
        $.notify({
            message: 'Delete department success.'
        },{
            type: 'success'
        });
    } else {
        $.notify({
            message: 'Error occur'
        },{
            type: 'danger'
        });
    }
}